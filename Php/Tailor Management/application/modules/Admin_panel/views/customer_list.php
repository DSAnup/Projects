<?php $this->load->view('head');
$this->load->view('leftMenu');?>
    <div class="wrapper">

        <<!-- ?php
        $this->load->view('leftMenu');
        ?> -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Customer List
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url() . 'Admin_panel/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="<?= base_url() . 'Admin_panel/customer' ?>">Add Customer </a></li>
                    <li><a href="<?= base_url() . 'Admin_panel/customer_list' ?>"> Customer List</a></li>
                    
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box">
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div class="col-md-12" style="color: #79a0e0">
                                            
                                        </div>
                                        <table id="example1" class="table table-bordered table-striped" border="1">
                                            <thead style="background-color: #79a0e0">
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Customer ID</th>
                                                    <th>Name</th>
                                                    <th>Phone</th>
                                                    <th>Images</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="itembody">
                                              <?php $i=0; foreach ($customer as $s) {?>
                                                <tr align="center">
                                                  <td><?= ++$i;?></td>
                                                  <td><?= $s->cust_number?></td>
                                                  <td><?= $s->name;?></td>
                                                  <td><?= $s->phone;?></td>
                                                  <td><?php if($s->image == '' && $s->sex=='0'){?>
                                                    <img src="<?= base_url().'uploads/'.'noman.gif'?>" style="height: 50px; width: 80px;">            
                                                  <?php }elseif($s->image == '' && $s->sex=='1'){?>
                                                    <img src="<?= base_url().'uploads/'.'nowoman.jpg'?>" style="height: 50px; width: 80px;"> 
                                                  <?php }else{?>
                                                  <img src="<?= base_url().'uploads/customer/'.$s->image?>" style="height: 50px; width: 80px;">
                                                 <?php }?> 
                                                </td>
                                                  <td><button class="btn btn-info"  value="<?php echo $s->id; ?>" onclick="ss(this.value)"  data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i></button>
                                                    <a href="<?=base_url().'Admin_panel/Pdf_Controller/makepdf/'.$s->id?>" class="btn btn-success"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                                    <a href="<?=base_url().'Admin_panel/print_customer_details/'.$s->id?>" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i> 
                                                    <?php 
                                                    $ci = & get_instance();
                                                    $ci->load->model('Rest_model');
                                                    $userID = $this->session->userdata('userID');
                                                    $dd= $this->Rest_model->SelectData_1('admin_waps','*',array('type'=>'1','id'=>$userID));
                                                    $ddd= $this->Rest_model->SelectData_1('admin_waps','*',array('permission'=>'1','id'=>$userID));

                                                    if($dd==true || $ddd== true){
                                                      ?>
                                                    <a href="<?=base_url().'Admin_panel/edit_customer/'.$s->id?>" class="btn btn-warning"><i class="fa fa-edit"></i> <a href="<?=base_url().'Admin_panel/del_customer/'.$s->id?>" class="btn btn-danger " onclick="return confirm('are you sure?')"><i class="fa fa-trash"></i>
                                                    <?php }?>
                                                    </td>
                                              </tr>
                                              <?php } ?>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                  </section>
                  <!-- /.content -->
              </div>

          </div>
          <!-- ./wrapper -->

<?php
$this->load->view('footer');
?>
<script type="text/javascript">
  function ss(id){
                // alert(id);
                
                $.ajax({
                  url:'<?= base_url()?>Admin_panel/view_customer',
                  type: 'post',
                  dataType: 'json',
                  data: {val: id},

                  success: function(data){
                  var d ='<?= base_url()?>uploads/customer/';
                  $('#productname').html(data.name);
                  $('#name').html(data.name);
                  $('#phone').html(data.phone);
                  $('#email').html(data.email);
                  $('#address').html(data.address);
                  $('#cust_number').html(data.cust_number);
                  $("#imgalign").html('<img src="'+ d + data.image + '" class="img-responsive"/>');
                  $('#name2').html(data.name);
                  if(data.sex == 0){$('#sex').html("Male")}else{$('#sex').html("Female")};
                  $('#date').html(data.date);
                  $('#seat').html(data.seat);
                  $('#back_lenght').html(data.back_lenght);
                  $('#vest').html(data.vest);
                  $('#thigh').html(data.thigh);
                  $('#cuff').html(data.cuff);
                  $('#bottom').html(data.bottom);
                  $('#trouser_lenght').html(data.trouser_lenght);
                  $('#front_lenght').html(data.front_lenght);
                  $('#short_sleeves').html(data.short_sleeves);
                  $('#chest').html(data.chest);
                  $('#belly').html(data.belly);
                  $('#inseem').html(data.inseem);
                  $('#waist').html(data.waist);
                  $('#neck').html(data.neck);
                  $('#top_coat').html(data.top_coat);
                  $('#hips').html(data.hips);
                  $('#shoulder').html(data.shoulder);
                  $('#right_sleeves').html(data.right_sleeves);
                  $('#knee').html(data.knee);
                  $('#left_sleeves').html(data.left_sleeves);
                  $('#name3').html(data.name);   
                }

            });
            }
        </script>
<style type="text/css">
  p {font-weight: bolder;
    font-size: 14px;
  }
  span {font-size: 12px;}
  .col-md-4 p{
    border: 1px solid lightgrey;
    padding: 3px;
    text-align: center;
  }
</style>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="productname"></h4>
      </div>
      <div class="modal-body">
        <h3>General Information of <span id="name"></span></h3>
        <hr style="border: 2px solid lightgrey;">
        <div class="row">
          <div class="col-md-5" style="border: 1px solid lightgrey;margin-left: 5px;">
            <p>Customer ID : <span id="cust_number"></span></p>
            <p>Name : <span id="name2"></span></p>
            <p>Phone : <span id="phone"></span></p>
            <p>Email : <span id="email"></span></p>
            <p>Address : <span id="address"></span></p>
            <p>Gender : <span id="sex"></span></p>
          </div>
          <div class="col-md-6">
            <div id="imgalign"></div>
            <p> Join Date : <span id="date"></span></p>
          </div>
        </div>
        <h3>Measurement Information of <span id="name3"></span></h3>
        <hr style="border: 2px solid lightgrey;">
        <div class="row">
          <div class="col-md-4">
            <p>Seat : <span id="seat"></span></p>
            <p>Back Length : <span id="back_lenght"></span></p>
            <p>Vest : <span id="vest"></span></p>
            <p>Thigh : <span id="thigh"></span></p>
            <p>Cuff : <span id="cuff"></span></p>
            <p>Bottom : <span id="bottom"></span></p>
            <p>Trouser Length : <span id="trouser_lenght"></span></p>
          </div>
          <div class="col-md-4">
            <p>Front Lenght : <span id="front_lenght"></span></p>
            <p>Short Sleeves : <span id="short_sleeves"></span></p>
            <p>Chest : <span id="chest"></span></p>
            <p>Belly : <span id="belly"></span></p>
            <p>Inseem : <span id="inseem"></span></p>
            <p>Waist : <span id="waist"></span></p>
            <p>Neck : <span id="neck"></span></p>
          </div>
          <div class="col-md-4">
            <p>Top Coat : <span id="top_coat"></span></p>
            <p>Hips : <span id="hips"></span></p>
            <p>Shoulder : <span id="shoulder"></span></p>
            <p>Right Sleeves : <span id="right_sleeves"></span></p>
            <p>Knee : <span id="knee"></span></p>
            <p>Left Sleeves : <span id="left_sleeves"></span></p>
            <!-- <p>Gender : <span id="sex"></span></p> -->
          </div>
        </div>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>