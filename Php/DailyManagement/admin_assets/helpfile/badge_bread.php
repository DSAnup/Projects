<?php $this->load->view('header');?>

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
        <div class="container-fluid">
            <div class="block-header">
                <h2>BADGES</h2>
            </div>
            <!-- Button Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                BUTTON EXAMPLES
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                    <button class="btn btn-success btn-lg btn-block waves-effect" type="button">SUCCESS <span class="badge">4</span></button>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                    <button class="btn btn-primary btn-lg btn-block waves-effect" type="button">PRIMARY <span class="badge">10+</span></button>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                    <button class="btn btn-danger btn-lg btn-block waves-effect" type="button">DANGER <span class="badge">8</span></button>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                    <button class="btn btn-warning btn-lg btn-block waves-effect" type="button">WARNING <span class="badge">3</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Button Examples -->
            <!-- With Material Design Colors -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                BUTTON EXAMPLES WITH MATERIAL DESIGN COLORS
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                    <button class="btn bg-green btn-lg btn-block waves-effect" type="button">GREEN <span class="badge">2</span></button>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                    <button class="btn bg-blue btn-lg btn-block waves-effect" type="button">BLUE <span class="badge">10+</span></button>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                    <button class="btn bg-red btn-lg btn-block waves-effect" type="button">RED <span class="badge">12</span></button>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                    <button class="btn bg-orange btn-lg btn-block waves-effect" type="button">ORANGE <span class="badge">5</span></button>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                    <button class="btn bg-pink btn-lg btn-block waves-effect" type="button">PINK <span class="badge">14</span></button>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                    <button class="btn bg-cyan btn-lg btn-block waves-effect" type="button">CYAN <span class="badge">99+</span></button>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                    <button class="btn bg-teal btn-lg btn-block waves-effect" type="button">TEAL <span class="badge">26</span></button>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                    <button class="btn bg-purple btn-lg btn-block waves-effect" type="button">PURPLE <span class="badge">47</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# With Material Design Colors -->
            <!-- List Example -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                LIST EXAMPLE
                                <small>You can also put badge to list and use the material design colors which example classes are <code>.bg-pink, bg-green</code></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="list-group">
                                <a href="javascript:void(0);" class="list-group-item">
                                    <span class="badge bg-pink">14 New</span> Cras justo odio
                                </a>
                                <a href="javascript:void(0);" class="list-group-item">
                                    <span class="badge bg-cyan">99 Unread</span>Dapibus ac facilisis in
                                </a>
                                <a href="javascript:void(0);" class="list-group-item">
                                    <span class="badge bg-teal">99+</span>Morbi leo risus
                                </a>
                                <a href="javascript:void(0);" class="list-group-item">
                                    <span class="badge bg-orange">21</span>Porta ac consectetur ac
                                </a>
                                <a href="javascript:void(0);" class="list-group-item">
                                    <span class="badge bg-purple">18</span>Vestibulum at eros
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# List Example -->
            <div class="block-header">
                <h2>BREADCRUMBS</h2>
            </div>
            <div class="row clearfix">
                <!-- Basic Examples -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                BASIC EXAMPLES
                                <small>Separators are automatically added in CSS through <code>:before</code> and <code>content</code>.</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <ol class="breadcrumb">
                                <li class="active">Home</li>
                            </ol>
                            <ol class="breadcrumb">
                                <li><a href="javascript:void(0);">Home</a></li>
                                <li class="active">Library</li>
                            </ol>
                            <ol class="breadcrumb">
                                <li><a href="javascript:void(0);">Home</a></li>
                                <li><a href="javascript:void(0);">Library</a></li>
                                <li class="active">Data</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- #END# Basic Examples -->
                <!-- With Icons -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                WITH ICONS
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="material-icons">home</i> Home
                                </li>
                            </ol>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="javascript:void(0);">
                                        <i class="material-icons">home</i> Home
                                    </a>
                                </li>
                                <li class="active">
                                    <i class="material-icons">library_books</i> Library
                                </li>
                            </ol>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="javascript:void(0);">
                                        <i class="material-icons">home</i> Home
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <i class="material-icons">library_books</i> Library
                                    </a>
                                </li>
                                <li class="active">
                                    <i class="material-icons">archive</i> Data
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- #END# With Icons -->
            </div>

            <div class="row clearfix">
                <!-- With Material Design Colors -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                WITH MATERIAL DESIGN COLORS
                                <small>You can use material design colors which examples are <code>.breadcrumb-col-pink, .breadcrumb-col-teal</code>.</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <ol class="breadcrumb breadcrumb-col-pink">
                                <li><a href="javascript:void(0);">Home</a></li>
                                <li class="active">Library</li>
                            </ol>
                            <ol class="breadcrumb breadcrumb-col-cyan">
                                <li><a href="javascript:void(0);">Home</a></li>
                                <li><a href="javascript:void(0);">Library</a></li>
                                <li class="active">Data</li>
                            </ol>
                            <ol class="breadcrumb breadcrumb-col-teal">
                                <li><a href="javascript:void(0);">Home</a></li>
                                <li><a href="javascript:void(0);">Library</a></li>
                                <li><a href="javascript:void(0);">Data</a></li>
                                <li class="active">File</li>
                            </ol>
                            <ol class="breadcrumb breadcrumb-col-orange">
                                <li><a href="javascript:void(0);">Home</a></li>
                                <li><a href="javascript:void(0);">Library</a></li>
                                <li><a href="javascript:void(0);">Data</a></li>
                                <li><a href="javascript:void(0);">File</a></li>
                                <li class="active">Extensions</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- #END# With Material Design Colors -->
                <!-- With Icons & Material Design Colors -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                WITH ICONS & MATERIAL DESIGN COLORS
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <ol class="breadcrumb breadcrumb-col-pink">
                                <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
                                <li class="active"><i class="material-icons">library_books</i> Library</li>
                            </ol>
                            <ol class="breadcrumb breadcrumb-col-cyan">
                                <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Library</a></li>
                                <li class="active"><i class="material-icons">archive</i> Data</li>
                            </ol>
                            <ol class="breadcrumb breadcrumb-col-teal">
                                <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Library</a></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">archive</i> Data</a></li>
                                <li class="active"><i class="material-icons">attachment</i> File</li>
                            </ol>
                            <ol class="breadcrumb breadcrumb-col-orange">
                                <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Library</a></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">archive</i> Data</a></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">attachment</i> File</a></li>
                                <li class="active"><i class="material-icons">extension</i> Extensions</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- #END# With Icons & Material Design Colors -->
            </div>

            <!-- Alignments -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ALIGNMENTS
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="font-bold">Align Left</div>
                            <ol class="breadcrumb breadcrumb-bg-pink">
                                <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
                                <li class="active"><i class="material-icons">library_books</i> Library</li>
                            </ol>

                            <div class="align-center m-t-15 font-bold">Align Center</div>
                            <ol class="breadcrumb breadcrumb-bg-cyan align-center">
                                <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Library</a></li>
                                <li class="active"><i class="material-icons">archive</i> Data</li>
                            </ol>

                            <div class="align-right m-t-15 font-bold">Align Right</div>
                            <ol class="breadcrumb breadcrumb-bg-teal align-right">
                                <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Library</a></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">archive</i> Data</a></li>
                                <li class="active"><i class="material-icons">attachment</i> File</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Alignments -->
        </div>
    </section>

   <?php $this->load->view('footern');?>