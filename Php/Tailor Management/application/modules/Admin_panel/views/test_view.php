
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
                    Add New Order
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url() . 'Admin_panel/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="<?= base_url() . 'Admin_panel/order' ?>">Add order </a></li>
                    
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                  <div class="col-md-12">
                    <table id="example1" class="table table-bordered table-striped" border="1">
                      <thead style="background-color: #79a0e0">
                        <tr>
                          <th>SL</th>
                          <th>Customer ID</th>
                          
                        </tr>
                      </thead>
                      <tbody id="itembody">
                        <?php foreach($this->cart->contents() as $items){?>
                        <tr>
                          <td id="custID"><?= $items["id"]?></td>
                          <td id=""><?= $items["name"]?></td>
                          <td><button type="button" name="remove" id="submit_cart" class="btn btn-danger btn-xs remove_inventory">Remove</button></td>
                        </tr>
                      <?php }?>
                      </tbody>
                    </table>
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

