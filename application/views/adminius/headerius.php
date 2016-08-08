<html xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="<?php  echo base_url('assets/front/js/jquery.min.js');?>"></script>
    <script type="text/javascript" src="<?php  echo base_url('assets/front/js/bootstrap.min.js');?>"></script>
    <script type="text/javascript" src="<?php  echo base_url('assets/adminius/bootstrap/js/bs_leftnavi.js');?>"></script>
    
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <link href="<?php  echo base_url('assets/front/css/font-awesome.min.css');?>"
          rel="stylesheet" type="text/css">
    <link href="<?php  echo base_url('assets/front/css/bootstrap.css');?>"
          rel="stylesheet" type="text/css">
    <link href="<?php  echo base_url('assets/adminius/bootstrap/css/bs_leftnavi.css');?>"
          rel="stylesheet" type="text/css">
    <link href="<?php  echo base_url('assets/adminius/bootstrap/css/style.css');?>"
          rel="stylesheet" type="text/css">

</head>

<body>
<div class="navbar navbar-default navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="<?php echo base_url('adminius/main')?>" class="navbar-brand"><span>Adminius</span></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
            <ul class="nav navbar-nav navbar-left">
                <li class="active">
                    <a href="<?php echo base_url()?>"><i class="fa fa-fw fa-home"></i>Front</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-left">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-expanded="false"><i class="fa et-down fa-cogs"></i> Configius <i class="fa et-down fa-chevron-down"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="<?php echo base_url('adminius/settings')?>">Settings</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-expanded="false"><i class="fa et-down fa-user"></i> <?php echo $this->myfunctions->getUinfo('login')?> <i class="fa et-down fa-chevron-down"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="<?php  echo base_url('adminius/main/userprofile');?>">Profile</a>
                        </li>
                        <li>
                            <a href="<?php  echo base_url('adminius/main/logout')?>">logout</a>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</div>
<div class="section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#">Library</a>
                    </li>
                    <li class="active">Data</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="gw-sidebar">
                    <div id="gw-sidebar" class="gw-sidebar">
                        <div class="nano-content">
                            <ul class="gw-nav gw-nav-list">
                                <li class="init-un-active"> <a href="<?php  echo base_url('adminius/main/')?>"> <span class="gw-menu-text">Dashboard</span> </a> </li>
                                <li class="init-arrow-down"> <a href="javascript:void(0)"> <span class="gw-menu-text">Menu</span> <b class="gw-arrow icon-arrow-up8"></b> </a>
                                    <ul class="gw-submenu">
                                        <li> <a href="<?php  echo base_url('adminius/main/menu')?>">Create menu</a> </li>
                                        <li> <a href="<?php  echo base_url('adminius/main/menulist')?>">Menu list</a> </li>
                                    </ul>
                                </li>
                                <li class="init-arrow-down"> <a href="javascript:void(0)"> <span class="gw-menu-text">Category</span> <b></b> </a>
                                    <ul class="gw-submenu">
                                        <li> <a href="<?php  echo base_url('adminius/main/categoria')?>">Create category</a> </li>
                                        <li> <a href="<?php  echo base_url('adminius/main/categorialist')?>">Category list</a> </li>
                                    </ul>
                                </li>
                                <li class="init-arrow-down"> <a href="javascript:void(0)"> <span class="gw-menu-text">Content</span> <b></b> </a>
                                    <ul class="gw-submenu">
                                        <li> <a href="<?php  echo base_url('adminius/main/editor')?>">Create content</a> </li>
                                        <li> <a href="<?php  echo base_url('adminius/main/contentList')?>">Content list</a> </li>
                                    </ul>
                                </li>
                                <li class="init-arrow-down"> <a href="javascript:void(0)"> <span class="gw-menu-text">Users</span> <b class="gw-arrow"></b> </a>
                                    <ul class="gw-submenu">
                                        <li> <a href="<?php echo base_url('adminius/main/adduser')?>">Add User</a> </li>
                                        <li> <a href="<?php echo base_url('adminius/main/userlist')?>">User List</a> </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
