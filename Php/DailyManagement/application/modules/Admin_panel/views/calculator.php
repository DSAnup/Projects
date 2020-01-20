<?php $this->load->view('header');?>
<!-- <link href="<?= base_url().'admin_assets/'?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet"> -->
   <script src="<?= base_url().'admin_assets/'?>plugins/jquery/jquery.min.js"></script>
       

   
   <link rel="stylesheet" href="<?= base_url().'admin_assets/'?>plugins/simplecalculator/SimpleCalculadorajQuery.css">
   <script src="<?= base_url().'admin_assets/'?>plugins/simplecalculator/SimpleCalculadorajQuery.js"></script>
<?php $userID = $this->session->userdata('userID');;?>
<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <?php $this->load->view('topbar');?>
    <section>
        <?php $this->load->view('leftsidebar');?>
        <?php $this->load->view('rightsidebar');?>
    </section>

        <section class="content">
        <div class="container">
      <div class="row">
          
          
          
          
        <div class="col-md-6 col-md-offset-2" >
          <div id="micalc"></div>
        </div>
          
      </div>
    </div>
    
    <script>
         $("#idCalculadora").Calculadora();
         $("#micalc").Calculadora({'EtiquetaBorrar':'Clear',TituloHTML:'<a class="btn-block btn3d btn btn-success" href="#" target="_blank">Calculator</a>'});
        
        $("#CalcOptoins").Calculadora({
            EtiquetaBorrar:'Clear',
            ClaseBtns1: 'warning', /* Color Numbers*/
            ClaseBtns2: 'success', /* Color Operators*/
            ClaseBtns3: 'primary', /* Color Clear*/
            TituloHTML:'<h2>Calculator</h2>',
            Botones:["+","-","*","/","0","1","2","3","4","5","6","7","8","9",".","="]

            
        });
         
        
    </script>
    </section>

   <?php $this->load->view('footern');?>
  