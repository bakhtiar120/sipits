
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo site_url('beranda'); ?>">Beranda</a></li>
        <li><a href="<?php echo site_url('beranda/informasi'); ?>">Informasi</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Pendaftaran <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('pendaftaran/daftar_kp'); ?>">KP</a></li>
            <li><a href="<?php echo site_url('pendaftaran/daftar_pap'); ?>">PAP</a></li>
            <li><a href="<?php echo site_url('pendaftaran/daftar_kmpi'); ?>">KMPI</a></li>
            <li><a href="<?php echo site_url('pendaftaran/daftar_p3i'); ?>">P3I</a></li>
          </ul>
        </li>
        
        <li><a href="<?php echo site_url('beranda/tentang'); ?>">Tentang</a></li>
       
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <!-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
        <li><a href="<?php echo site_url('login'); ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

