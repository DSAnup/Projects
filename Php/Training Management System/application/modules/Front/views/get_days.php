<select class="form-control" id="daysID" onchange="get_slot()">
            <option>Select Days</option>
            <?php
            	foreach ($days as $k) {
            ?>
			<option value="<?=$k->id?>"><?=$k->days?></option>
            <?php } ?>
          </select>