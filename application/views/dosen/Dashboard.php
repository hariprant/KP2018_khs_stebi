<html>
  <head>
    <title>Login MultiLevel</title>
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
  <style>
  body {
    min-height: 2000px;
    padding-top: 70px;
  }
  </style>
  </head>
  <body>
     <!-- Fixed navbar -->
     <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
       <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Cyberprant</a>
       </div>
       <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
         <li class="active"><a href="<?php echo base_url('dosen/dosen/');?>">Beranda</a></li>
         <li><a href="http://localhost/project_one/dosen/dosen/input">Masukan mahasiswa</a></li>
         <li><a href="http://localhost/project_one/dosen/dosen/data">Lihat Data mahasiswa</a></li>
         <li><a href="http://localhost/project_one/dosen/dosen/upnilai">Upload Nilai</a></li>
        </ul>
       </div><!--/.nav-collapse -->
      </div>
     </nav>

    <div class="container">
    <div class="col-md-3">
    </div>
      <center>
        <h1>Membuat Login MultiLevel Menggunakan Session Codeigniter</h1><br />
        <h2>SELAMAT DATANG ANDA TELAH BERHASIL LOGIN SEBAGAI DOSEN</h2>
        <h3> Username Anda Adalah <?php echo $this->session->userdata('username'); ?></h3><br /><br />
        <a href="<?php echo site_url('authentication/auth/logout'); ?>">Keluar</a>
      </center>
  </div>
  </body>
</html>