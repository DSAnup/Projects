
<div class="wrapper">

  <header class="main-header">
    <a href="<?= base_url().'Control/dashboard'?>" class="logo">
      <span class="logo-mini"><b>STK</b></span>
      <span class="logo-lg" style="text-transform: uppercase"><b><?php if($_SESSION['role']=='front'){ echo "front desk";}else{ echo "Accounts Panel";} {
        # code...
      } ?></b></span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>


      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li><a href="<?= base_url()?>" target="_blank"><i class="fa fa-globe"></i></a></li>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?= base_url() . 'admin_file/admin/' ?>dist/img/avatar5.png" class="user-image"
              alt="User Image">
              <span class="hidden-xs">
                <?php
                echo $this->session->userdata('admin_name');
                ?>
              </span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="<?= base_url() . 'admin_file/admin/' ?>dist/img/avatar5.png" class="img-circle"
                alt="User Image">

                <p>
                  <?php
                  echo $this->session->userdata('admin_name');
                  ?>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                  </div>
                  <div class="col-xs-4 text-center">
                  </div>
                  <div class="col-xs-4 text-center">
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">                               
                </div>
                <div class="pull-right">
                  <a href="<?= base_url() . 'Control/signout' ?>"
                   class="btn btn-default btn-flat">Sign out</a>
                 </div>
               </li>
             </ul>
           </li>
           <!-- Control Sidebar Toggle Button -->
           <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview <?php
        if ($_SESSION['menu'] == 'dashboard') {
          echo "active";
        }
        ?>">
        <a href="#">
          <i class="fa fa-wpexplorer fa-2x"></i> <span> &nbsp;&nbsp; Dashboard</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="<?= base_url() . 'Control/dashboard' ?>"><i class="fa fa-circle-o"></i>
            Dashboard </a></li>
          </ul>
        </li>
        <li class="treeview <?php
        if ($_SESSION['menu'] == 'pay') {
          echo "active";
        }
        ?>">
        <a href="#">
          <i class="fa fa-clone"></i> <span>Payroll</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="<?= base_url() . 'Control/salary_advice' ?>"><i class="fa fa-list-alt"></i>Salary Advice Note</a>
          </li>
          <li class="active"><a href="<?= base_url() . 'Control/salary_sheet' ?>"><i class="fa fa-list-alt"></i>Salary Sheet</a>
          </li>
          <li class="active"><a href="<?= base_url() . 'Control/provident_fund' ?>"><i class="fa fa-list-alt"></i>Security Fund</a>
          </li>
          <li class="active"><a href="<?= base_url() . 'Control/pf_punishment' ?>"><i class="fa fa-list-alt"></i>SF Punishment</a>
          </li>
          <li class="active"><a href="<?= base_url() . 'Control/pf_reserve' ?>"><i class="fa fa-list-alt"></i>SF Reserve</a>
          </li>
          <li class="active"><a href="<?= base_url() . 'Control/withdrawal' ?>"><i class="fa fa-list-alt"></i>Withdrawal </a>
          </li>
          <li class="active"><a href="<?= base_url() . 'Control/bonus' ?>"><i class="fa fa-list-alt"></i>Bonus</a>
          </li>
          <li class="active"><a href="<?= base_url() . 'Control/attendance_report' ?>"><i class="fa fa-list-alt"></i>Attendance Report</a>
          </li>
          <li class="active"><a href="<?= base_url() . 'Control/attendance' ?>"><i class="fa fa-list-alt"></i>Attendance </a></li>
          <li class="active"><a href="<?= base_url() . 'Control/employee_list' ?>"><i class="fa fa-list-alt"></i>
            Employee List </a></li>
            <li class="active"><a href="<?= base_url() . 'Update_Control/employee' ?>"><i class="fa fa-list-alt"></i>
            New Employee </a></li>
            <li class="active"><a href="<?= base_url() . 'Update_Control/employee_listNew' ?>"><i class="fa fa-list-alt"></i>
            New Employee List </a></li>
          </ul>
        </li>
        <li class="treeview <?php
        if ($_SESSION['menu'] == 'patient') {
          echo "active";
        }
        ?>">
        <a href="#">
          <i class="fa fa-clone"></i> <span>Patients</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="<?= base_url() . 'Control/patient_ladger' ?>"><i class="fa fa-list-alt"></i>Patient Ladger </a></li>
          <!-- <li class="active"><a href="<?= base_url() . 'Control/patient_list' ?>"><i class="fa fa-list-alt"></i>
            Patient List </a></li> -->
            <li class="active"><a href="<?= base_url() . 'Control/register_patient_list' ?>"><i class="fa fa-list-alt"></i>
            Register Patient List </a></li>
            <li class="active"><a href="<?= base_url() . 'Control/marketing_patient_list' ?>"><i class="fa fa-list-alt"></i>
            Marketing Patient List </a></li>
            <li class="active"><a href="<?= base_url() . 'Control/non_register_patient_list' ?>"><i class="fa fa-list-alt"></i>
            Non Register Patient List </a></li>
            <li class="active"><a href="<?= base_url() . 'Update_Control/patient' ?>"><i class="fa fa-list-alt"></i>
            Add Patient New </a></li>
            <li class="active"><a href="<?= base_url() . 'Update_Control/patientList' ?>"><i class="fa fa-list-alt"></i>
             Patient New List</a></li>
          </ul>
        </li>
        <li class="treeview <?php
        if ($_SESSION['menu'] == 'dr') {
          echo "active";
        }
        ?>">
        <a href="#">
          <i class="fa fa-clone"></i> <span>Doctors</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="<?= base_url() . 'Control/dr_fee' ?>"><i class="fa fa-list-alt"></i>Doctor's Fee </a></li>
          <li class="active"><a href="<?= base_url() . 'Control/dr_list' ?>"><i class="fa fa-list-alt"></i>
            Doctors List </a></li>
          </ul>
        </li>
        <li class="treeview <?php
        if ($_SESSION['menu'] == 'out_lab') {
          echo "active";
        }
        ?>">
        <a href="#">
          <i class="fa fa-clone"></i> <span>Out Lab Test</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="<?= base_url() . 'Control/out_lab_test_entry' ?>"><i class="fa fa-list-alt"></i>Out Lab Test Entry </a></li>
          <li class="active"><a href="<?= base_url() . 'Control/lab_list' ?>"><i class="fa fa-list-alt"></i>
            Lab List </a></li>
            <li class="active"><a href="<?= base_url() . 'Control/out_lab_payment' ?>"><i class="fa fa-list-alt"></i>
              Payments </a></li>
              <li class="active"><a href="<?= base_url() . 'Control/out_lab_ledger' ?>"><i class="fa fa-list-alt"></i>
              Out Lab Ledger </a></li>
            </ul>
          </li>
          <li class="treeview <?php
          if ($_SESSION['menu'] == 'short') {
            echo "active";
          }
          ?>">
          <a href="#">
            <i class="fa fa-clone"></i> <span>Short Item</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?= base_url() . 'Control/short_item_purchase' ?>"><i class="fa fa-list-alt"></i>Short Item Purchase </a></li>
          </ul>
        </li>
        <li class="treeview <?php
        if ($_SESSION['menu'] == 'reagent') {
          echo "active";
        }
        ?>">
        <a href="#">
          <i class="fa fa-clone"></i> <span>Lab Products</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="<?= base_url() . 'Control/reagent_stock_out' ?>"><i class="fa fa-list-alt"></i>Stock Out </a></li>
          <li class="active"><a href="<?= base_url() . 'Control/reagent_purchase' ?>"><i class="fa fa-list-alt"></i>Stock In </a></li>
          <li class="active"><a href="<?= base_url() . 'Control/reagent_stock' ?>"><i class="fa fa-list-alt"></i>Stock </a></li>
          <li class="active"><a href="<?= base_url() . 'Control/reagent_stock_summery' ?>"><i class="fa fa-list-alt"></i>Stock Summery </a></li>
          <li class="active"><a href="<?= base_url() . 'Control/reagent_stock_month' ?>"><i class="fa fa-list-alt"></i>Stock Month wise </a></li>
          <li class="active"><a href="<?= base_url() . 'Control/reagent_list' ?>"><i class="fa fa-list-alt"></i>
            Lab Product List </a></li>
          </ul>
        </li>
        <li class="treeview <?php
        if ($_SESSION['menu'] == 'product') {
          echo "active";
        }
        ?>">
        <a href="#">
          <i class="fa fa-clone"></i> <span>Products</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="<?= base_url() . 'Control/product_sale' ?>"><i class="fa fa-list-alt"></i>
            Product Sale  </a></li>
            <li class="active"><a href="<?= base_url() . 'Control/free_product_sale' ?>"><i class="fa fa-list-alt"></i>
              Free Product Entry  </a></li>
              <li class="active"><a href="<?= base_url() . 'Control/product_purchase' ?>"><i class="fa fa-list-alt"></i>
                Stock In   </a></li>
                <li class="active"><a href="<?= base_url() . 'Control/product_stock' ?>"><i class="fa fa-list-alt"></i>
                  Product Stock  </a></li>
                  <li class="active"><a href="<?= base_url() . 'Control/product_list' ?>"><i class="fa fa-list-alt"></i>
                  Product List  </a></li>
                  <li class="active"><a href="<?= base_url() . 'Update_Control/fixedassetname' ?>"><i class="fa fa-list-alt"></i>
                  Add Fixed Asset Product  </a></li>
                  <li class="active"><a href="<?= base_url() . 'Update_Control/fixed_asset' ?>"><i class="fa fa-list-alt"></i>
                  Add Fixed Asset Quantity  </a></li>
                  <li class="active"><a href="<?= base_url() . 'Update_Control/fixed_asset_adj' ?>"><i class="fa fa-list-alt"></i>
                  Fixed Asset Management  </a></li>
                  <li class="active"><a href="<?= base_url() . 'Update_Control/fixed_asset_number' ?>"><i class="fa fa-list-alt"></i>
                  Fixed Asset Number  </a></li>
                </ul>
              </li>
              <?php if($_SESSION['role']=='manager' || $_SESSION['role']=='developer'){ ?>
              <li class="treeview <?php
              if ($_SESSION['menu'] == 'supplier') {
                echo "active";
              }
              ?>">
              <a href="#">
                <i class="fa fa-clone"></i> <span>Supplier</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="<?= base_url() . 'Control/supplier_list' ?>"><i class="fa fa-list-alt"></i>
                  Supplier List  </a>
                </li>
                <li class="active"><a href="<?= base_url() . 'Control/supplier_payment_pharmacy' ?>"><i class="fa fa-list-alt"></i>
                  Pharmacy Supplier Payment </a>
                <li class="active"><a href="<?= base_url() . 'Control/supplier_payment' ?>"><i class="fa fa-list-alt"></i>
                  Pathology Supplier Payment </a>
                </li>
              </ul>
            </li>
            <?php } ?>
            <li class="treeview <?php
            if ($_SESSION['menu'] == 'lab') {
              echo "active";
            }
            ?>">
            <a href="#">
              <i class="fa fa-clone"></i> <span>Tests</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

              <li class="active"><a href="<?= base_url() . 'Control/test_sale' ?>"><i class="fa fa-list-alt"></i>
                Test Sale  </a></li>
                <li class="active"><a href="<?= base_url() . 'Control/upload_test' ?>"><i class="fa fa-list-alt"></i>
                  Upload Test   </a></li>
                  <li class="active"><a href="<?= base_url() . 'Control/test_list' ?>"><i class="fa fa-list-alt"></i>
                  Test List  </a></li>
                  <li class="active"><a href="<?= base_url() . 'Update_Control/test_package' ?>"><i class="fa fa-list-alt"></i>
                  Test Package  </a></li>
                </ul>
              </li>
              <?php if($_SESSION['role']=='manager' || $_SESSION['role']=='developer'){ ?>

              <li class="treeview <?php
              if ($_SESSION['menu'] == 'extra') {
                echo "active";
              }
              ?>">
              <a href="#">
                <i class="fa fa-clone"></i> <span>Extra</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="<?= base_url() . 'Control/total_due' ?>"><i class="fa fa-list-alt"></i>
                  Dues </a>
                </li>
                <?php if($_SESSION['role']=='manager' || $_SESSION['role']=='developer'){ ?>

                <li class="treeview <?php
                if (@$_SESSION['new'] == 'borrow') {
                  echo "active";
                }
                ?>">
                <a href="#">
                  <i class="fa fa-clone"></i> <span> Borrow</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li class="active"><a href="<?= base_url() . 'Control/borrow_paid' ?>"><i class="fa fa-list-alt"></i>
                    Borrow Paid</a></li>
                    <li class="active"><a href="<?= base_url() . 'Control/borrow' ?>"><i class="fa fa-list-alt"></i>
                      Borrow </a></li>
                      <li class="active"><a href="<?= base_url() . 'Control/borrower' ?>"><i class="fa fa-list-alt"></i>
                        Borrower List  </a></li>
                      </ul>
                    </li>
                    <li class="treeview <?php
                    if (@$_SESSION['new'] == 'lend') {
                      echo "active";
                    }
                    ?>">
                    <a href="#">
                      <i class="fa fa-clone"></i> <span> Lend</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li class="active"><a href="<?= base_url() . 'Control/lend_return' ?>"><i class="fa fa-list-alt"></i>
                        Lend Return</a></li>
                        <li class="active"><a href="<?= base_url() . 'Control/lend' ?>"><i class="fa fa-list-alt"></i>
                          Lend </a></li>
                          <li class="active"><a href="<?= base_url() . 'Control/lend_person' ?>"><i class="fa fa-list-alt"></i>
                            Person List  </a></li>
                          </ul>
                        </li>
                      </li>
                      <?php } ?>
                    </ul>
                  </li>
                  <li class="treeview <?php
                  if ($_SESSION['menu'] == 'ex_category') {
                    echo "active";
                  }
                  ?>">
                  <a href="#">
                    <i class="fa fa-clone"></i> <span>Expense</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li class="active"><a href="<?= base_url() . 'Control/add_expense' ?>"><i class="fa fa-list-alt"></i>
                      Add Expense  </a></li>
                      <li class="active"><a href="<?= base_url() . 'Control/expense_sub_category' ?>"><i class="fa fa-list-alt"></i>
                        Expense Sub Category  </a></li>
                        <li class="active"><a href="<?= base_url() . 'Control/expense_category' ?>"><i class="fa fa-list-alt"></i>
                          Expense Category  </a></li>
                        <li class="active"><a href="<?= base_url() . 'Update_Control/bank_deposit' ?>"><i class="fa fa-list-alt"></i>
                          Bank Deposit  </a></li>
                        </ul>
                      </li>
                      <?php } ?>
                      <li class="treeview <?php
                      if ($_SESSION['menu'] == 'pharmacy') {
                        echo "active";
                      }
                      ?>">
                      <a href="#">
                        <i class="fa fa-clone"></i> <span>Pharmacy</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        <li class="active"><a href="<?= base_url() . 'Control/medicine_receive' ?>"><i class="fa fa-list-alt"></i>Medicine Receive</a></li>
                        <?php if($_SESSION['role']=='manager' || $_SESSION['role']=='developer'){ ?>
                        <li class="active"><a href="<?= base_url() . 'Control/cash_receive' ?>"><i class="fa fa-list-alt"></i>Cash Receive</a></li>
                        <li class="active"><a href="<?= base_url() . 'Control/pharmacy_supplier_ledger' ?>"><i class="fa fa-list-alt"></i>Pharmacy Supplier Ledger</a></li>
                        <?php } ?>
                      </ul>
                    </li>
                    <?php if($_SESSION['role']=='manager' || $_SESSION['role']=='developer'){ ?>

                    <li class="treeview <?php
                    if ($_SESSION['menu'] == 'report') {
                      echo "active";
                    }
                    ?>">
                    <a href="#">
                      <i class="fa fa-clone"></i> <span>Reports</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">

                      <li class="active"><a href="<?= base_url() . 'Control/stock' ?>"><i class="fa fa-list-alt"></i>Monthly S.R.S</a>
                      </li>
                      <li class="active"><a href="<?= base_url() . 'Control/monthly_payment_bill' ?>"><i class="fa fa-list-alt"></i>Monthly Payment Bill(A)</a>
                      </li>
                      <li class="active"><a href="<?= base_url() . 'Control/book_through_income_expense' ?>"><i class="fa fa-list-alt"></i>Income-Expense- Balance </a>
                        <li class="active"><a href="<?= base_url() . 'Control/report_cash_out_chart' ?>"><i class="fa fa-list-alt"></i>Cash out Chart </a>
                        </li>
                        <li class="active"><a href="<?= base_url() . 'Control/reception_statement' ?>"><i class="fa fa-list-alt"></i>Reception Statement</a>
                          <li class="active"><a href="<?= base_url() . 'Control/report_monthly_cash_flow' ?>"><i class="fa fa-list-alt"></i>Monthly Cash Flow </a>
                          </li>
                          <li class="active"><a href="<?= base_url() . 'Control/report_monthly_due_paid_consider' ?>"><i class="fa fa-list-alt"></i>Due Paid Consider </a>
                          </li>
                          <li class="active"><a href="<?= base_url() . 'Control/report_patient_visiting' ?>"><i class="fa fa-list-alt"></i>Patient Visiting Report </a>
                          </li>
                        </ul>
                      </li>

                      <?php } ?>
                      <?php if($_SESSION['role']=='manager' || $_SESSION['role']=='developer'){ ?>
                      <li class="treeview <?php
                      if ($_SESSION['menu'] == 'admin') {
                        echo "active";
                      }
                      ?>">
                      <a href="#">
                        <i class="fa fa-clone"></i> <span>Admin</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        <li class="active"><a href="<?= base_url() . 'Control/admin_list' ?>"><i class="fa fa-list-alt"></i>
                          Admin List </a></li>
                          <li class="active"><a href="<?= base_url() . 'Update_Control/plan_list' ?>"><i class="fa fa-list-alt"></i>
                          Work Plan </a></li>
                        </ul>
                      </li>

                      <?php } ?>
                      
                      <li class="treeview <?php
                      if ($_SESSION['menu'] == 'work_plan') {
                        echo "active";
                      }
                      ?>">
                      <a href="#">
                        <i class="fa fa-clone"></i> <span>Work Perfomance </span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        <li class="active"><a href="<?= base_url() . 'Update_Control/work_plan' ?>"><i class="fa fa-list-alt"></i>Work Performance & Future Plan </a></li>
                        
                        </ul>
                      </li>
                    </section>
                    <!-- /.sidebar -->
                  </aside>
