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
                <h2>
                    SORTABLE & NESTABLE
                    <small>Taken by <a href="https://github.com/dbushell/Nestable" target="_blank">github.com/dbushell/Nestable</a></small>
                </h2>
            </div>
            <div class="row clearfix">
                <!-- Default Example -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DEFAULT EXAMPLE
                                <small>Drag & drop hierarchical list with mouse and touch compatibility</small>
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
                            <div class="clearfix m-b-20">
                                <div class="dd">
                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="1">
                                            <div class="dd-handle">Item 1</div>
                                        </li>
                                        <li class="dd-item" data-id="2">
                                            <div class="dd-handle">Item 2</div>
                                            <ol class="dd-list">
                                                <li class="dd-item" data-id="3">
                                                    <div class="dd-handle">Item 3</div>
                                                </li>
                                                <li class="dd-item" data-id="4">
                                                    <div class="dd-handle">Item 4</div>
                                                </li>
                                                <li class="dd-item" data-id="5">
                                                    <div class="dd-handle">Item 5</div>
                                                    <ol class="dd-list">
                                                        <li class="dd-item" data-id="6">
                                                            <div class="dd-handle">Item 6</div>
                                                        </li>
                                                        <li class="dd-item" data-id="7">
                                                            <div class="dd-handle">Item 7</div>
                                                        </li>
                                                        <li class="dd-item" data-id="8">
                                                            <div class="dd-handle">Item 8</div>
                                                        </li>
                                                    </ol>
                                                </li>
                                                <li class="dd-item" data-id="9">
                                                    <div class="dd-handle">Item 9</div>
                                                </li>
                                                <li class="dd-item" data-id="10">
                                                    <div class="dd-handle">Item 10</div>
                                                </li>
                                            </ol>
                                        </li>
                                        <li class="dd-item" data-id="11">
                                            <div class="dd-handle">Item 11</div>
                                        </li>
                                        <li class="dd-item" data-id="12">
                                            <div class="dd-handle">Item 12</div>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                            <b>Output JSON</b>
                            <textarea cols="30" rows="3" class="form-control no-resize" readonly>[{"id":1},{"id":2,"children":[{"id":3},{"id":4},{"id":5,"children":[{"id":6},{"id":7},{"id":8}]},{"id":9},{"id":10}]},{"id":11},{"id":12}]</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DEFAULT EXAMPLE
                                <small>Drag & drop hierarchical list with mouse and touch compatibility</small>
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
                            <div class="clearfix m-b-20">
                                <div class="dd nestable-dark-theme">
                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="1">
                                            <div class="dd-handle">Item 1</div>
                                        </li>
                                        <li class="dd-item" data-id="2">
                                            <div class="dd-handle">Item 2</div>
                                            <ol class="dd-list">
                                                <li class="dd-item" data-id="3">
                                                    <div class="dd-handle">Item 3</div>
                                                </li>
                                                <li class="dd-item" data-id="4">
                                                    <div class="dd-handle">Item 4</div>
                                                </li>
                                                <li class="dd-item" data-id="5">
                                                    <div class="dd-handle">Item 5</div>
                                                    <ol class="dd-list">
                                                        <li class="dd-item" data-id="6">
                                                            <div class="dd-handle">Item 6</div>
                                                        </li>
                                                        <li class="dd-item" data-id="7">
                                                            <div class="dd-handle">Item 7</div>
                                                        </li>
                                                        <li class="dd-item" data-id="8">
                                                            <div class="dd-handle">Item 8</div>
                                                        </li>
                                                    </ol>
                                                </li>
                                                <li class="dd-item" data-id="9">
                                                    <div class="dd-handle">Item 9</div>
                                                </li>
                                                <li class="dd-item" data-id="10">
                                                    <div class="dd-handle">Item 10</div>
                                                </li>
                                            </ol>
                                        </li>
                                        <li class="dd-item" data-id="11">
                                            <div class="dd-handle">Item 11</div>
                                        </li>
                                        <li class="dd-item" data-id="12">
                                            <div class="dd-handle">Item 12</div>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                            <b>Output JSON</b>
                            <textarea cols="30" rows="3" class="form-control no-resize" readonly>[{"id":1},{"id":2,"children":[{"id":3},{"id":4},{"id":5,"children":[{"id":6},{"id":7},{"id":8}]},{"id":9},{"id":10}]},{"id":11},{"id":12}]</textarea>
                        </div>
                    </div>
                </div>
                <!-- #END# Default Example -->
            </div>
            <!-- Draggable Handles -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DRAGGABLE HANDLES
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
                            <div class="clearfix m-b-20">
                                <div class="dd nestable-with-handle">
                                    <ol class="dd-list">
                                        <li class="dd-item dd3-item" data-id="13">
                                            <div class="dd-handle dd3-handle"></div>
                                            <div class="dd3-content">Item 13</div>
                                        </li>
                                        <li class="dd-item dd3-item" data-id="14">
                                            <div class="dd-handle dd3-handle"></div>
                                            <div class="dd3-content">Item 14</div>
                                        </li>
                                        <li class="dd-item dd3-item" data-id="15">
                                            <div class="dd-handle dd3-handle"></div>
                                            <div class="dd3-content">Item 15</div>
                                            <ol class="dd-list">
                                                <li class="dd-item dd3-item" data-id="16">
                                                    <div class="dd-handle dd3-handle"></div>
                                                    <div class="dd3-content">Item 16</div>
                                                </li>
                                                <li class="dd-item dd3-item" data-id="17">
                                                    <div class="dd-handle dd3-handle"></div>
                                                    <div class="dd3-content">Item 17</div>
                                                </li>
                                                <li class="dd-item dd3-item" data-id="18">
                                                    <div class="dd-handle dd3-handle"></div>
                                                    <div class="dd3-content">Item 18</div>
                                                </li>
                                            </ol>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                            <b>Output JSON</b>
                            <textarea cols="30" rows="3" class="form-control no-resize" readonly>[{"id":13},{"id":14},{"id":15,"children":[{"id":17},{"id":16},{"id":18}]}]</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Draggable Handles -->
        </div>
    </section>


   <?php $this->load->view('footern');?>
   <!-- <script src="<?= base_url().'admin_assets/'?>js/pages/ui/dialogs.js"></script> -->