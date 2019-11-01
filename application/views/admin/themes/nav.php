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
                            foreach($admin as $a){
                            ?>
                            <li><a href="javascript:void(0);"><?php echo $a->nama_admin?></a></li>
                            <?php } ?>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profil</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">vpn_key</i>Ganti Password</a></li>
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
            foreach($admin as $d){
            ?>
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo base_url()?>adminBSB/images/user.png" width="65" height="65" alt="User" />
                </div>
                <div class="info-container" style="top: 10px;">
                    <div class="name"><b><?php echo $d->username ?></b></div>
                    <div class="email"><?php echo $d->nama_admin ?></div>
                </div>
            </div>
            <?php } ?>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="<?=$this->session->flashdata('home')?>">
                        <a href="<?php echo base_url()?>admin/">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="<?=$this->session->flashdata('master')?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">storage</i>
                            <span>Master Data</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?=$this->session->flashdata('admin')?>">
                                <a href="<?php echo base_url()?>admin/data_admin">
                                    <span>Data Admin</span>
                                </a>
                            </li>
                            <li class="<?=$this->session->flashdata('dosen')?>">
                                <a href="<?php echo base_url()?>admin/data_dosen">
                                    <span>Data Dosen</span>
                                </a>
                            </li>
                            <li class="<?=$this->session->flashdata('mhs')?>">
                                <a href="<?php echo base_url()?>admin/data_mhs">
                                    <span>Data Mahasiswa</span>
                                </a>
                            </li>
                            <li class="<?=$this->session->flashdata('matkul')?>">
                                <a href="<?php echo base_url()?>admin/data_matkul">
                                    <span>Data Matakuliah</span>
                                </a>
                            </li>
                            <li class="<?=$this->session->flashdata('kelas')?>">
                                <a href="<?php echo base_url()?>admin/data_kelas">
                                    <span>Data Kelas</span>
                                </a>
                            </li>
                            <li class="<?=$this->session->flashdata('prodi')?>">
                                <a href="<?php echo base_url()?>admin/data_prodi">
                                    <span>Data Prodi</span>
                                </a>
                            </li>
                            <li class="<?=$this->session->flashdata('fakul')?>">
                                <a href="<?php echo base_url()?>admin/data_fakul">
                                    <span>Data Fakultas</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?=$this->session->flashdata('manipulasi')?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">view_module</i>
                            <span>Transaksi</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?=$this->session->flashdata('mengampu')?>">
                                <a href="<?php echo base_url()?>admin/data_ampu">
                                    <span>Data Ampu Matakuliah</span>
                                </a>
                            </li>
                            <li class="<?=$this->session->flashdata('mengambil')?>">
                                <a href="<?php echo base_url()?>admin/data_ambil">
                                    <span>Data Absensi</span>
                                </a>
                            </li>
                            <li class="<?=$this->session->flashdata('nilai')?>">
                                <a href="<?php echo base_url()?>admin/data_nilai">
                                    <span>Data Nilai</span>
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
        <!-- Right Sidebar -->
    </section>