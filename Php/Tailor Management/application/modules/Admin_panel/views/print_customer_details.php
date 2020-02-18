<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
	.row {
		border: 1px solid lightgrey;
		margin-top: 50px;
	}
	table {
		font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    /*border: 1px solid lightgrey;*/
		margin-top: 50px;

}

	th, td{
		padding-left:   10px;
		border:1px solid lightgrey;
	}
	
	</style>
</head>

<body>
	<div class="container">

		
			<button onclick="myFunction()" style="float:  right;"><i class="fa fa-print" aria-hidden="true"></i></button>
			
		<table>
			<tr>
				<th colspan="6" style="text-align: center; font-weight: bolder; font-size: 14px;">General Information</th>
			</tr>
			<tr>
				<th>Customer ID</th>
				<td><?= $c->cust_number?></th>
				<th>Name</th>
				<td><?= $c->name?></td>
				<!-- <th></th> -->
				<td rowspan="3" colspan="3">
					<?php if($c->image == '' && $c->sex=='0'){?>
                        <img src="<?= base_url().'uploads/'.'noman.gif'?>" alt="" border=3 height=80 width=80>            
                      <?php }elseif($c->image == '' && $c->sex=='1'){?>
                        <img src="<?= base_url().'uploads/'.'nowoman.jpg'?>" alt="" border=3 height=80 width=80>
                      <?php }else{?>
                        <img src="<?= base_url().'uploads/customer/'.$c->image?>" alt="" border=3 height=80 width=80>
                      <?php }?>
                      <br>
                      <?= $c->date?>
                  </td>
			</tr>
			<tr>
				<th>Phone</th>
				<td><?= $c->phone?></td>
				<th>Email</th>
				<td><?= $c->email?></td>

				
			</tr>
			<tr>
				
				<th>Sex</th>
				<td><?php if ($c->sex=='0'){echo "Male";}else{echo "Female";}?></td>
				<th>Address</th>
				<td><?= $c->address?></td>
				
				
			</tr>
		</table>
		<table>
			<tr>
				<th colspan="8" style="text-align: center; font-weight: bolder; font-size: 14px;">Measurement Information</th>
			</tr>
			<tr>
				<th>Seat</th>
				<td><?= $c->seat?></th>
				<th>Back Length</th>
				<td><?= $c->back_lenght?></td>
				<th>Vest</th>
				<td><?= $c->vest?></td>
				<th>Thigh</th>
				<td><?= $c->thigh?></td>
				
			</tr>
			<tr>
				<th>Cuff</th>
				<td><?= $c->cuff?></td>
				<th>Bottom</th>
				<td><?= $c->bottom?></td>
				<th>Trouser Length</th>
				<td><?= $c->trouser_lenght?></td>
				<th>Front Length</th>
				<td><?= $c->front_lenght?></td>

				
			</tr>
			<tr>
				<th>Short Sleeves</th>
				<td><?= $c->short_sleeves?></td>
				<th>Chest</th>
				<td><?= $c->chest?></td>
				<th>Belly</th>
				<td><?= $c->belly?></td>
				<th>Inseem</th>
				<td><?= $c->inseem?></td>

				
			</tr>
			<tr>
				<th>Waist</th>
				<td><?= $c->waist?></td>
				<th>Neck</th>
				<td><?= $c->neck?></td>
				<th>Top Coat</th>
				<td><?= $c->top_coat?></td>
				<th>Hips</th>
				<td><?= $c->hips?></td>

				
			</tr>
			<tr>
				<th>Shoulder</th>
				<td><?= $c->shoulder?></td>
				<th>Right Sleeves</th>
				<td><?= $c->right_sleeves?></td>
				<th>Knee</th>
				<td><?= $c->knee?></td>
				<th>Left Sleeves</th>
				<td><?= $c->left_sleeves?></td>

				
			</tr>
		</table>
		
	</div>
</body>
</html>
<script>
function myFunction() {
    window.print();
}
</script>