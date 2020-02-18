<?php
$this->load->view('head');
?>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <?php
        $this->load->view('leftmenu');
        ?>
        <aside class="right-side">

            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="fa fa-fw ti-move"></i> Trainer List
                            </h3>
                            <span class="pull-right">
                                <i class="fa fa-fw ti-angle-up clickable"></i>
                                <i class="fa fa-fw ti-close removepanel clickable"></i>
                            </span>
                        </div>
                        <?php
                        $se=$this->session->userdata('update');
                        if(isset($se)){
                            $s='yes';
                        }else{
                            $s='no';
                        }

                        ?>
                        <div style="display: <?php if($s=='no'){ echo 'none'; } ?>">
                            <div class="panel" >
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw ti-move"></i> Edit Workshop
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw ti-angle-up clickable"></i>
                                        <i class="fa fa-fw ti-close removepanel clickable"></i>
                                    </span>
                                </div>
                                <form class="form-horizontal" action="<?=base_url().'Admin/update_trainer'?>" method="post" role="form" enctype="multipart/form-data">
                                

                                    <div class="form-group">
                                        <label for="input-text" class="col-sm-2 control-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name" value="<?php if(isset($q)){ echo $q->name;} ?>" id="input-text" placeholder="Your Name Here" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword" class="col-sm-2 control-label">Designation</label>
                                        <div class="col-sm-10">
                                            <input type="text" value="<?php if(isset($q)){ echo $q->designation;} ?>" name="designation" class="form-control" id="inputPassword" placeholder="Designation">
                                        </div>
                                    </div>                                                   
                                    <div class="form-group">
                                        <label for="input-text-has-success" class="col-sm-2 control-label">Exprience</label>
                                        <div class="col-sm-10">
                                            <input type="text" value="<?php if(isset($q)){ echo $q->experience;} ?>" name="experience" class="form-control" id="input-text-has-success"placeholder="Exprience">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input-text-has-warning" class="col-sm-2 control-label">
                                            Address
                                        </label>
                                        <div class="col-sm-10 col-md-10">
                                            <textarea rows="4" name="address" class="form-control resize_vertical" placeholder="Address Here"><?php if(isset($q)){ echo $q->address;} ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input-text-has-warning" class="col-sm-2 control-label">
                                            Contact
                                        </label>
                                        <div class="col-sm-10 col-md-10">
                                            <textarea rows="4" name="contact" class="form-control resize_vertical" placeholder="Contact information goes Here"><?php if(isset($q)){ echo $q->contact;} ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Type</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="type">
                                                <option>Select Type</option>
                                                <option value="Full Time" <?php if($q->type=='Full Time'){ echo 'selected';} ?>>Full Time</option>
                                                <option value="Part Time" <?php if($q->type=='Part Time'){ echo 'selected';} ?>>Part Time</option>
                                                <option value="Guest" <?php if($q->type=='Guest'){ echo 'selected';} ?>>Guest</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">
                                            Skills
                                        </label>
                                        <div class="col-sm-10 col-md-10">
                                            <textarea rows="4" name="skills" class="form-control resize_vertical" placeholder="Skills"><?php if(isset($q)){ echo $q->skills;} ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">
                                            Discription
                                        </label>
                                        <div class="col-sm-10 col-md-10">
                                            <textarea rows="4" name="description" class="form-control resize_vertical" placeholder="Discription"><?php if(isset($q)){ echo $q->description;} ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">
                                            Photo
                                        </label>
                                        <div class="col-sm-10 col-md-10">
                                        <img src="<?php if(isset($q)){ echo base_url().'trainers/'.$q->photo;} ?>" height="60" width="55">
                                            <input type="file" name="userfile" class="alert alert-info" id="input-21">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">
                                            Social Link
                                        </label>
                                        <div class="col-sm-10 col-md-10">
                                            <table class="table table-bordered" >
                                            <tbody id="social_link1">
                                            <?php
                                            $ii=0;
                                            foreach ($links as $l) {
                                                $ii+=1;
                                            ?>
                                                    <tr id="<?=$ii?>">
                                                        <td>
                                                        
                                                            <select name="icon[]" class="form-control">
                                                                <option value="facebook" <?php if($l->icon=='facebook'){ echo 'selected';} ?>>Facebook</option>
                                                                <option value="twitter" <?php if($l->icon=='twitter'){ echo 'selected';} ?>>Twitter</option>
                                                                <option value="google" <?php if($l->icon=='google'){ echo 'selected';} ?>>Google Plus</option>
                                                            </select>
                                                        </td>
                                                        <td colspan="2"><input value="<?php echo $l->link ?>" type="text" name="link[]" class="form-control"></td>
                                                        <td><a class="btn btn-danger" onclick="removeItem1('<?=$ii?>')">-</td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="3">
                                                        <input type="text" name="count" value="<?=$ii?>" id="counts">
                                                        <input type="hidden" name="id" value="<?=$id?>">
                                                            <a  class="btn btn-primary" onclick="itemappends()">+</a>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input-text" class="col-sm-2 control-label"> </label>
                                        <div class="col-sm-10">                          
                                            <input type="Submit" name="" class="col-xs-12 btn btn-primary btn-load btn-" value="Submit">
                                        </div>                      
                                    </div>

                                </form>
                            </div>

                        </div>


                    </div>

                </aside>
                <div id="qn"></div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                <script src="https://cdn.jsdelivr.net/g/bootstrap@3.3.7,bootstrap.switch@3.3.2,jquery.nicescroll@3.6.0"></script>
                <script src="<?=base_url().'admins/'?>js/app.js" type="text/javascript"></script>
                <!-- end of global js -->

                <!-- begining of page level js -->
                <!--Sparkline Chart-->
                <script type="text/javascript" src="<?=base_url().'admins/'?>js/custom_js/sparkline/jquery.flot.spline.js"></script>
<!-- flip --->
<script type="text/javascript" src="vendors/flip/js/jquery.flip.min.js"></script>
<script type="text/javascript" src="vendors/lcswitch/js/lc_switch.min.js"></script>
<!--flot chart-->
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flotchart/js/jquery.flot.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flotchart/js/jquery.flot.resize.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flotchart/js/jquery.flot.stack.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flotspline/js/jquery.flot.spline.min.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flot.tooltip/js/jquery.flot.tooltip.js"></script>
<!--swiper-->
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/swiper/js/swiper.min.js"></script>
<!--chartjs-->
<script src="<?=base_url().'admins/'?>vendors/chartjs/js/Chart.js"></script>
<!--nvd3 chart-->
<script type="text/javascript" src="<?=base_url().'admins/'?>js<?=base_url().'admins/'?>/nvd3/d3.v3.min.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/nvd3/js/nv.d3.min.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/moment/js/moment.min.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/advanced_newsTicker/js/newsTicker.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>js/dashboard1.js"></script>
<!-- end of page level js -->
<script type="text/javascript">
var i=0;
    function itemappend(){
        var html='<tr id="'+i+'">'
        html+='<td>'
        html+='<select name="icon[]" class="form-control">'
        html+='<option value="facebook">Facebook</option>'
        html+='<option value="twitter">Twitter</option>'
        html+='<option value="google">Google Plus</option>'
        html+='</select>'
        html+='</td>'
        html+='<td><input type="text" name="link[]" class="form-control"></td>'
        html+='<td><a class="btn btn-danger" onclick="removeItem('+i+')">-</td>'
        html+='</tr>'
        $('#social_link').append(html)
        $('#count').val(++i)
    }
    function removeItem(id){
        var co=$('#count').val()
        $('#count').val(--co)
        $('#'+id).remove();
    }
    function itemappends(){
        var ii=$('#counts').val()
        var html='<tr id="'+ii+'">'
        html+='<td>'
        html+='<select name="icon[]" class="form-control">'
        html+='<option value="facebook">Facebook</option>'
        html+='<option value="twitter">Twitter</option>'
        html+='<option value="google">Google Plus</option>'
        html+='</select>'
        html+='</td>'
        html+='<td><input type="text" name="link[]" class="form-control"></td>'
        html+='<td><a class="btn btn-danger" onclick="removeItem1('+ii+')">-</td>'
        html+='</tr>'
        $('#social_link1').append(html)
        $('#counts').val(++ii)
    }
    function removeItem1(id){
        var co=$('#counts').val()
        $('#counts').val(--co)
        $('#'+id).remove();
    }
</script>
</body>

</html>