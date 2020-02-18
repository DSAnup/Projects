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
                    General Information of <?= $c->name?>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url() . 'Admin_panel/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="<?= base_url() . 'Admin_panel/customer' ?>">Add Customer </a></li>
                    <li><a href="<?= base_url() . 'Admin_panel/add_measurement' ?>">Add Measurement </a></li>
                    
                </ol>
            </section>
            <style type="text/css">
            #hd {font-weight: bolder;}
            p {font-weight: bolder;}
            </style>

            <!-- Main content -->
            <section class="content">
              <div class="row" style="border: 1px solid grey;">
                <div class="col-md-5">
                  <h3><?= $c->name?></h3>
                  <p>ID: <small><?= $c->cust_number?></small></p>
                  <p>Phone: <small><?= $c->phone?></small></p>
                  <p>Email: <small><?= $c->email?></small></p>
                  <p>Sex: <small><?php if($c->sex==0){echo "Male";}else{echo "Woman";}?></small></p>
                </div>
                <div class="col-md-7" style="margin-top: 10px;  border-left: 1px solid grey;">
                  <p>Address: <small><?= $c->address?></small></p>
                  <p>Photo: <small>
                    <?php if($c->image == '' && $c->sex=='0'){?>
                        <img src="<?= base_url().'uploads/'.'noman.gif'?>" style="height: 50px; width: 80px;">            
                      <?php }elseif($c->image == '' && $c->sex=='1'){?>
                        <img src="<?= base_url().'uploads/'.'nowoman.jpg'?>" style="height: 50px; width: 80px;"> 
                      <?php }else{?>
                        <img src="<?= base_url().'uploads/customer/'.$c->image?>" style="height: 50px; width: 80px;">
                      <?php }?>
                  </small></p>
                  <p>Customer Created: <small><?= $c->date?></small></p>
                </div>
                  
              </div>

              <h2>Add / Update Measurement of <?= $c->name?></h2>
                <div class="row">
                    <div class="box">
                        <div class="box">
                            <div class="box-body">
                                <form action="<?=base_url()?>Admin_panel/update_measurement" method="post" enctype="multipart/form-data">
                                  <input type="hidden" name="id" value="<?= $c->id?>">
                                    <div class="col-xs-12 col-md-12">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Seat</label>
                                                <input type="text" name="seat" class="form-control" value="<?= $c->seat?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Back Length</label>
                                                <input type="text" name="back_lenght" class="form-control" value="<?= $c->back_lenght?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Vest</label>
                                                <input type="text" name="vest" class="form-control" value="<?= $c->vest?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Thigh</label>
                                                <input type="text" name="thigh" class="form-control" value="<?= $c->thigh?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Cuff</label>
                                                <input type="text" name="cuff" class="form-control" value="<?= $c->cuff?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Bottom</label>
                                                <input type="text" name="bottom" class="form-control" value="<?= $c->bottom?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Trouser Length</label>
                                                <input type="text" name="trouser_lenght" class="form-control" value="<?= $c->trouser_lenght?>">
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Front Length</label>
                                                <input type="text" name="front_lenght" class="form-control" value="<?= $c->front_lenght?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Shrot Sleeves</label>
                                                <input type="text" name="short_sleeves" class="form-control" value="<?= $c->short_sleeves?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Chest</label>
                                                <input type="text" name="chest" class="form-control" value="<?= $c->chest?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Belly</label>
                                                <input type="text" name="belly" class="form-control" value="<?= $c->belly?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Inseem</label>
                                                <input type="text" name="inseem" class="form-control" value="<?= $c->inseem?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Waist</label>
                                                <input type="text" name="waist" class="form-control" value="<?= $c->waist?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Neck</label>
                                                <input type="text" name="neck" class="form-control" value="<?= $c->neck?>">
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Top Coat</label>
                                                <input type="text" name="top_coat" class="form-control" value="<?= $c->top_coat?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Hips</label>
                                                <input type="text" name="hips" class="form-control" value="<?= $c->hips?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Shoulder</label>
                                                <input type="text" name="shoulder" class="form-control" value="<?= $c->shoulder?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Right Sleeves</label>
                                                <input type="text" name="right_sleeves" class="form-control" value="<?= $c->right_sleeves?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Knee</label>
                                                <input type="text" name="knee" class="form-control" value="<?= $c->knee?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Left Sleeves</label>
                                                <input type="text" name="left_sleeves" class="form-control" value="<?= $c->left_sleeves?>">
                                            </div>
                                            
                                        </div>

                                            <div class="form-group">
                                                <label></label>
                                                <input type="submit" class="btn btn-primary btn-block" value="Add / Update Measurement">
                                            </div>
                                    </div>
                                    
                                </form>
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
