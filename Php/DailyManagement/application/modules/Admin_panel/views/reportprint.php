<!DOCTYPE html>
<html>
<head>
	<title>Reports Print</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
	 @media print {
  @page { margin: 0; }
  body { margin: 1.6cm; }
  #click {display: none;}
  #footer{display: none;}
}
</style>
</head>
<body>

	<div class="container">
		<div class="row clearfix" id="img">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                	<?php $dd = $this->uri->segment(2); if($dd=='reportsPrintByDate'){?>
                        <div class="header">
                            <h2 style="text-align: center; font-weight: bolder;">
                                Summary Of <?php echo $date = date('d M, Y', strtotime($startDate)) ;?> To
                                <?php echo $date = date('d M, Y', strtotime($endDate)) ;?>
                            </h2>
                            <a href="" onclick="doPrint()" id="click" return false;>Print</a>
                        </div>
                    <?php } if($dd=='reportsPrintByMonth'){?>
                        <div class="header">
                            <h2 style="text-align: center; font-weight: bolder;">
                                Summary Of <?php echo $date = date('M, Y', strtotime($monthYear)) ;?>
                                
                            </h2>
                            <a href="" onclick="doPrint()" id="click" return false;>Print</a>
                        </div>
                    
                    <?php } if($dd=='reportsPrintByYear'){?>
                        <div class="header">
                            <h2 style="text-align: center; font-weight: bolder;">
                                Summary Of Year <?php echo $year ;?>
                                
                            </h2>
                            <a href="" onclick="doPrint()" id="click" return false;>Print</a>
                        </div>
                    <?php }?>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover ">
                                    <thead>
                                        <tr>
                                            <th>Total Earning</th>
                                            <td><?= $earnReportSum->eAmount;?></td>
                                        </tr>
                                        <tr>
                                            <th>Total Expense</th>
                                            <td><?= $expenseReportSum->exAmount;?></td>
                                        </tr>
                                        <tr>
                                            <th> Total Borrow (Balance Only)</th>
                                            <td><?= $dateReportBorrowBalanceSum->borrowBalance;?></td>
                                        </tr>
                                        <tr>
                                            <th> Total Lend (Balance Only)</th>
                                            <td><?= $dateReportLendBalanceSum->lendBalance;?></td>
                                        </tr>
                                            
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                        <div class="header">
                            <h2>
                                Earn List
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover ">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Purpose</th>
                                            <th> Date</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; foreach ($earnReport as $s) {?>
                                        <tr>
                                            <td><?= ++$i;?></td>
                                            <?php if($s->purId == 0){?>
                                                <td><?= $s->earnPurpose?></td>
                                            <?php }else{ foreach($purpose as $p){ if($p->id == $s->purId){?>
                                                <td><?= $p->purpose?></td>
                                            <?php } } }?>
                                            <td><?php echo $date = date('d M, Y', strtotime($s->eDate)) ;?></td>
                                            <td><?= $s->eAmount;?></td>
                                            
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3">Total Earn Amount</th>
                                            <td><?= $earnReportSum->eAmount;?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    
                        <div class="card">
                        <div class="header">
                            <h2>
                                Expense List
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover ">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Purpose</th>
                                            <th> Date</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; foreach ($expenseReport as $s) {?>
                                        <tr>
                                            <td><?= ++$i;?></td>
                                            <?php if($s->purId == 0){?>
                                                <td><?= $s->exPurpose?></td>
                                            <?php }else{ foreach($purpose as $p){ if($p->id == $s->purId){?>
                                                <td><?= $p->purpose?></td>
                                            <?php } } }?>
                                            <td><?php echo $date = date('d M, Y', strtotime($s->exDate)) ;?></td>
                                            <td><?= $s->exAmount;?></td>
                                            
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3">Total Amount</th>
                                            <td><?= $expenseReportSum->exAmount;?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                        <div class="header">
                            <h2>
                                Borrow List
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover ">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Borrow Form</th>
                                            <th>Date</th>
                                            <th>Borrow Amount</th>
                                            <th>Borrow Give</th>
                                            <th>Borrow Balance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; foreach ($borrowReport as $s) {?>
                                        <tr>
                                            <td><?= ++$i;?></td>
                                            <td><?= $s->borrowFrom;?></td>
                                            <td><?php echo $date = date('d M, Y', strtotime($s->bDate)) ;?></td>
                                            <td><?= $s->borrowAmount;?></td>
                                            <td><?= $s->borrowGive;?></td>
                                            <td><?= $s->borrowBalance;?></td>
                                            
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3">Total </th>
                                            <td><?= $dateReportBorrowAmountSum->borrowAmount;?></td>
                                            <td><?= $dateReportBorrowGiveSum->borrowGive;?></td>
                                            <td><?= $dateReportBorrowBalanceSum->borrowBalance;?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                        <div class="header">
                            <h2>
                                Lend List
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover ">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Lend To</th>
                                            <th>Date</th>
                                            <th>Lend Amount</th>
                                            <th>Lend Back</th>
                                            <th>Lend Balance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; foreach ($dateReportLend as $s) {?>
                                        <tr>
                                            <td><?= ++$i;?></td>
                                            <td><?= $s->lendTo;?></td>
                                            <td><?php echo $date = date('d M, Y', strtotime($s->lDate)) ;?></td>
                                            <td><?= $s->lendAmount;?></td>
                                            <td><?= $s->lendReturn;?></td>
                                            <td><?= $s->lendBalance;?></td>
                                            
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3">Total </th>
                                            <td><?= $dateReportLendAmountSum->lendAmount;?></td>
                                            <td><?= $dateReportLendGiveSum->lendReturn;?></td>
                                            <td><?= $dateReportLendBalanceSum->lendBalance;?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>

        </div>
		
	</div>
</body>
</html>
<script type="text/javascript">
	function doPrint() {
    window.print();  
    history.go(-2);           
}

</script>