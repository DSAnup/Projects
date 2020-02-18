<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * set of functions for the sql executor
 *
 * @package PhpMyAdmin
 */
use PMA\libraries\DisplayResults;
use PMA\libraries\Message;
use PMA\libraries\Table;
use PMA\libraries\Response;
use PMA\libraries\URL;
use PMA\libraries\Bookmark;

/**
 * Parses and analyzes the given SQL query.
 *
 * @param string $sql_query SQL query
 * @param string $db        DB name
 *
 * @return mixed
 */
function PMA_parseAndAnalyze($sql_query, $db = null)
{
    if (($db === null) && (!empty($GLOBALS['db']))) {
        $db = $GLOBALS['db'];
    }

    include_once 'libraries/parse_analyze.lib.php';
    list($analyzed_sql_results,,) = PMA_parseAnalyze($sql_query, $db);

    return $analyzed_sql_results;
}

/**
 * Handle remembered sorting order, only for single table query
 *
 * @param string $db                    database name
 * @param string $table                 table name
 * @param array  &$analyzed_sql_results the analyzed query results
 * @param string &$full_sql_query       SQL query
 *
 * @return void
 */
function PMA_handleSortOrder(
    $db, $table, &$analyzed_sql_results, &$full_sql_query
) {
    $pmatable = new Table($table, $db);

    if (empty($analyzed_sql_results['order'])) {

        // Retrieving the name of the column we should sort after.
        $sortCol = $pmatable->getUiProp(Table::PROP_SORTED_COLUMN);
        if (empty($sortCol)) {
            return;
        }

        // Remove the name of the table from the retrieved field name.
        $sortCol = str_replace(
            PMA\libraries\Util::backquote($table) . '.',
            '',
            $sortCol
        );

        // Create the new query.
        $full_sql_query = PhpMyAdmin\SqlParser\Utils\Query::replaceClause(
            $analyzed_sql_results['statement'],
            $analyzed_sql_results['parser']->list,
            'ORDER BY ' . $sortCol
        );

        // TODO: Avoid reparsing the query.
        $analyzed_sql_results = PhpMyAdmin\SqlParser\Utils\Query::getAll($full_sql_query);
    } else {
        // Store the remembered table into session.
        $pmatable->setUiProp(
            Table::PROP_SORTED_COLUMN,
            PhpMyAdmin\SqlParser\Utils\Query::getClause(
                $analyzed_sql_results['statement'],
                $analyzed_sql_results['parser']->list,
                'ORDER BY'
            )
        );
    }
}

/**
 * Append limit clause to SQL query
 *
 * @param array &$analyzed_sql_results the analyzed query results
 *
 * @return string limit clause appended SQL query
 */
function PMA_getSqlWithLimitClause(&$analyzed_sql_results)
{
    return PhpMyAdmin\SqlParser\Utils\Query::replaceClause(
        $analyzed_sql_results['statement'],
        $analyzed_sql_results['parser']->list,
        'LIMIT ' . $_SESSION['tmpval']['pos'] . ', '
        . $_SESSION['tmpval']['max_rows']
    );
}

/**
 * Verify whether the result set has columns from just one table
 *
 * @param array $fields_meta meta fields
 *
 * @return boolean whether the result set has columns from just one table
 */
function PMA_resultSetHasJustOneTable($fields_meta)
{
    $just_one_table = true;
    $prev_table = '';
    foreach ($fields_meta as $one_field_meta) {
        if ($one_field_meta->table != ''
            && $prev_table != ''
            && $one_field_meta->table != $prev_table
        ) {
            $just_one_table = false;
        }
        if ($one_field_meta->table != '') {
            $prev_table = $one_field_meta->table;
        }
    }
    return $just_one_table && $prev_table != '';
}

/**
 * Verify whether the result set contains all the columns
 * of at least one unique key
 *
 * @param string $db          database name
 * @param string $table       table name
 * @param array  $fields_meta meta fields
 *
 * @return boolean whether the result set contains a unique key
 */
function PMA_resultSetContainsUniqueKey($db, $table, $fields_meta)
{
    $resultSetColumnNames = array();
    foreach ($fields_meta as $oneMeta) {
        $resultSetColumnNames[] = $oneMeta->name;
    }
    foreach (PMA\libraries\Index::getFromTable($table, $db) as $index) {
        if ($index->isUnique()) {
            $indexColumns = $index->getColumns();
            $numberFound = 0;
            foreach ($indexColumns as $indexColumnName => $dummy) {
                if (in_array($indexColumnName, $resultSetColumnNames)) {
                    $numberFound++;
                }
            }
            if ($numberFound == count($indexColumns)) {
                return true;
            }
        }
    }
    return false;
}

/**
 * Get the HTML for relational column dropdown
 *