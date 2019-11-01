<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>STEBI Al-Muhsin</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url('assets/images/stebi_kecil.png');?>" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url('adminBSB/plugins/bootstrap/css/bootstrap.css');?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url('adminBSB/plugins/node-waves/waves.css');?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url('adminBSB/plugins/animate-css/animate.css');?>" rel="stylesheet" />

    <link href="<?php echo base_url('adminBSB/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css');?>" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="<?php echo base_url('adminBSB/plugins/waitme/waitMe.css');?>" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="<?php echo base_url('adminBSB/plugins/bootstrap-select/css/bootstrap-select.css');?>" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="<?php echo base_url('adminBSB/plugins/morrisjs/morris.css');?>" rel="stylesheet" />
    
    <!-- JQuery DataTable Css -->
    <link href="<?php echo base_url('adminBSB/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css');?>" rel="stylesheet">

    <!-- Custom Css -->
    <link href="<?php echo base_url('adminBSB/css/style.css');?>" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url('adminBSB/css/themes/all-themes.css');?>" rel="stylesheet" />

</head>

<body class="theme-blue">
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
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html" style="padding-top: 7px; padding-right: 0px; padding-bottom: 0px; padding-left: 10px;"><img src="<?php echo base_url()?>assets/images/stebi.png"></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Tasks -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">account_circle</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <?php
                            foreach($mahasiswa as $d){
                            ?>
                            <li><a href="javascript:void(0);"><?php echo $d->nama ?></a></li>
                            <?php } ?>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo site_url('mahasiswa/profil'); ?>"><i class="material-icons">person</i>Profil</a></li>
                            <!-- <li><a href="<?php echo site_url('mahasiswa/edt_pw'); ?>"><i class="material-icons">vpn_key</i>Ganti Password</a></li> -->
                            <li><a href="<?php echo site_url('login/logout'); ?>"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </li>
                    <!-- #END# Tasks -->
                    
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <?php
            foreach($mahasiswa as $d){
            ?>
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo base_url('assets/images/'.$d->foto);?>" width="65" height="65" alt="User" />
                </div>
                <div class="info-container" style="top: 10px;">
                    <div class="name"><b><?php echo $d->nama ?></b></div>
                    <div class="email"><?php echo $d->nim ?></div>
                </div>
            </div>
            <?php } ?>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="<?=$this->session->flashdata('home')?>">
                        <a href="<?php echo base_url()?>dosen/">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="<?=$this->session->flashdata('mhs')?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">school</i>
                            <span>Akademik</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?=$this->session->flashdata('mhs')?>">
                                <a href="<?php echo base_url()?>mahasiswa/khs">
                                    <span>Lihat KHS</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->

            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2018 <a href="javascript:void(0);">STEBI - Al-Muhsin</a>.
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>