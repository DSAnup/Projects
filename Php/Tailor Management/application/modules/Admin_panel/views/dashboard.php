<?php
$this->load->view('head');
$this->load->view('leftMenu');

?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url().'Admin/dashboard'?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
        
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                
                    <div class="inner">
                    <a href="<?=base_url()?>add_personal_info" style="color:#fff">
                        <h3>
                            Info
                        </h3>
                        <p>Personal Info</p>
                        </a>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="<?=base_url()?>add_personal_info" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
            </section>
        </div>

    </section>
</div>

<?php
$this->load->view('footer');
?>
