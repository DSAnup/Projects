<select class="form-control" name="batch">
            <option>Select Batch</option>
            <?php
            	foreach ($batch as $k) {
            ?>
			<option value="<?=$k->id?>"><?=$k->batch_name?></option>
            <?php } ?>
          </select>