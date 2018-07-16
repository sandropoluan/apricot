<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
function path_adm(){echo base_url()."an-theme/admin";}
function rpath_adm(){return base_url()."an-theme/admin";}

$name=$this->session->userdata('name_user');
$levela=($user_level=='1')?"Super Admin":"Admin";


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    
    <link href="<?php path_adm() ?>/dist/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php path_adm() ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />     
    <!-- Font Awesome Icons -->
     <link href="<?php path_adm() ?>/plugins/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
     <link href="<?php path_adm() ?>/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
     <link href="<?php path_adm() ?>/dist/css/AdminLTE.css" rel="stylesheet" type="text/css" />



   <!-- DATATABLES -->
   <link href="<?php path_adm() ?>/plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />   

   <link href="<?php path_adm() ?>/plugins/datatables/extensions/Responsive/css/responsive.dataTables.css" rel="stylesheet" type="text/css" />
     <!-- DATATABLES -->


  <link href="<?php path_adm() ?>/datepicker/css/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" type="text/css" />    
   
    <link href="<?php path_adm() ?>/dist/css/skins/skin-yellow.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php path_adm() ?>/dist/codemirror/lib/codemirror.css" rel="stylesheet" type="text/css" />
    <link href="<?php path_adm() ?>/dist/codemirror/theme/3024-day.css" rel="stylesheet" type="text/css" />

   <link href="<?php path_adm() ?>/dist/css/ando_admin.css" rel="stylesheet" type="text/css" />

 <?php if($npage==10){ ?>
 <link href='<?php path_adm()?>/plugins/jquery-ui-1.11.4/jquery-ui.min.css' rel='stylesheet' type='text/css'> 
<?php
 } 

 ?>
 
  
   

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body class="skin-yellow sidebar-mini">


 <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="<?php echo base_url() ?>" target="_blank" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">A<span style='color:#00c0ef'><b>CMS</b></span></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">Apricot <span style='color:#00c0ef'><b>CMS</b></span></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
             <!-- <li class='status_koneksi'><a href='#' class='koneksi_stat'></a></li>-->


<!-------------------------------------------------------------------------------------------------->


<!-------------------------------------------------------------------------------------------------->

              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="<?php echo $path_avatar; ?>" class="user-image" alt="User Image"/>
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?php echo $user; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="<?php echo $path_avatar; ?>" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $name ?> <br> <?php echo $levela ?>
                      <small></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#"> </a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#"> </a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#"> </a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url() ?>admin/profil_user" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url() ?>admin/logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>

<!-------------------------------------------------------------------------------------------------->



<!-------------------------------------------------------------------------------------------------->

            </ul>
          </div> <!--End .navbar-custom-menu -->
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

  <!-------------------------------------------------------------------------------------------------->        <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo $path_avatar; ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $user; ?></p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
<!-------------------------------------------------------------------------------------------------->
          <!-- search form (Optional) -->
        <!--  <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form> -->
          <!-- /.search form -->
<!-------------------------------------------------------------------------------------------------->
<!-----------------------------------------MULAI MENU------------------------------------------------->
<!-------------------------------------------------------------------------------------------------->
          
          <ul class="sidebar-menu">


            <li class="header">Navigasi</li>
            <li class='<?php if($npage==1){ echo'active';} ?>'><a href="<?php echo $burl; ?>"><i class='fa fa-dashboard'></i> <span>Halaman Utama</span></a> </li>
            
            <li class='treeview  <?php if(($npage==6) OR( $npage==7)){ echo'active';} ?>'>
              <a href='#'><i class='fa fa-pencil-square'></i><span>Artikel</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class='treeview-menu'>
                <li class='<?php if($npage==7){ echo'active';} ?>'><a href='<?php echo $burl; ?>/all_artikel'><i class='fa fa-circle-o'></i><span>Semua Artikel</span></a></li>
                <li class='<?php if($npage==6){ echo'active';} ?>'><a href='<?php echo $burl; ?>/artikel'><i class='fa fa-circle-o'></i><span>Artikel Baru</span></a></li>
              </ul>
            </li>

            <li class='treeview <?php if($npage=='14' OR $npage=='15') { echo "active"; } ?>'>
              <a href='#'><i class='fa fa-camera'></i><span>Galeri Foto</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class='treeview-menu'>
                <li class="<?php if($npage==15){ echo "active";} ?>"><a href='<?php echo $burl ?>/all_galeri'><i class='fa fa-circle-o'></i><span>Tampilkan Galeri</span></a></li>
                <li class="<?php if($npage==14){ echo "active";} ?>"><a href='<?php echo $burl; ?>/galeri'><i class='fa fa-circle-o'></i><span>Buat Galeri</span></a></li>
              </ul>
            </li>

            <?php if($user_level=='1'){ ?>
            <li class='treeview <?php if($npage==12 || $npage==13){ echo'active';} ?>'>
              <a href='#'><i class='fa fa-file-text'></i><span>Page</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class='treeview-menu'>
                <li class="<?php if($npage==13){ echo'active';} ?>"><a href="<?php echo $burl; ?>/all_page"><i class='fa fa-circle-o'></i><span>Semua Page</span></a></li>
                <li class="<?php if($npage==12){ echo'active';} ?>"><a href="<?php echo $burl; ?>/page"><i class='fa fa-circle-o'></i><span>Buat Page</span></a></li>
              </ul>
            </li>
            <?php } ?>


           <li class='treeview <?php if($npage==26 || $npage==27){ echo'active';} ?>'><a href="#"><i class='fa fa-flag-checkered'></i><span>Agenda</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">                
                <li class='<?php if($npage==27){ echo'active';} ?>'><a href="<?php echo $burl; ?>/semua_agenda"><i class='fa fa-circle-o'></i><span>Semua Agenda</span></a></li>
                <li class='<?php if($npage==26){ echo'active';} ?>'><a href="<?php echo $burl; ?>/agenda"><i class='fa fa-circle-o'></i><span>Agenda baru</span></a></li>
                
              </ul>
            </li>


            <li class='treeview <?php if($npage==28 || $npage==29){ echo'active';} ?>'><a href="#"><i class='fa fa-cloud-download'></i><span>Download</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">                
                <li class='<?php if($npage==28){ echo'active';} ?>'><a href="<?php echo $burl; ?>/semua_download"><i class='fa fa-circle-o'></i><span>Semua File</span></a></li>
                <li class='<?php if($npage==29){ echo'active';} ?>'><a href="<?php echo $burl; ?>/download"><i class='fa fa-circle-o'></i><span>File baru</span></a></li>
                
              </ul>
            </li>


            <li class='treeview <?php if($npage==9){ echo'active';} ?>'><a href="#"><i class='fa  fa-image'></i><span>Media</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">                
                <li class='<?php if($npage==9){ echo'active';} ?>'><a href="<?php echo $burl; ?>/media"><i class='fa fa-circle-o'></i><span>Semua</span></a></li>
                <li class='pop-up-upload'><a href='#'><i class='fa fa-circle-o'></i><span>Pup Up Upload</span></a></li>
                
              </ul>
            </li>

            <li class='<?php if($npage==21){ echo'active';} ?>'><a href="<?php echo base_url('admin/news_ticker'); ?>"><i class='fa fa-list-alt'></i><span>News Ticker</span></a></li>


            <li class='treeview <?php if($npage==34 || $npage==35){ echo'active';} ?>'><a href="#"><i class='fa  fa-question'></i><span>FAQ</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">                
                <li class='<?php if($npage==34){ echo'active';} ?>'><a href="<?php echo $burl; ?>/semua_faq"><i class='fa fa-circle-o'></i><span>Semua</span></a></li>
                <li class='<?php if($npage==35){ echo'active';} ?>'><a href='<?php echo $burl; ?>/faq'><i class='fa fa-circle-o'></i><span>FAQ baru</span></a></li>
                
              </ul>
            </li>


            <li class='treeview <?php if($npage==36 || $npage==37){ echo'active';} ?>'><a href="#"><i class='fa  fa-image'></i><span>Group banner</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">                
                <li class='<?php if($npage==36){ echo'active';} ?>'><a href="<?php echo $burl; ?>/group_banner"><i class='fa fa-circle-o'></i><span>Semua</span></a></li>
                <li class='<?php if($npage==37){ echo'active';} ?>'><a href='<?php echo $burl; ?>/banner'><i class='fa fa-circle-o'></i><span>Group baru</span></a></li>
                
              </ul>
            </li>

            <li class='header'>Pengaturan</li>

           <?php if($user_level=='1'){    ?>

  
             <li class='treeview <?php if($npage==2 || $npage==18 || $npage==19){ echo'active';} ?>'>
              <a href="#"><i class='fa fa-navicon'></i> <span>Kategori</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class='treeview-menu'>
               <li class='treeview <?php if($npage==2){ echo'active';} ?>' ><a href='<?php echo $burl; ?>/kategori'><i class='fa fa-circle-o'></i><span>Artikel</span></a></li>
               <li class='treeview <?php if($npage==18){ echo'active';} ?>'><a href='<?php echo $burl; ?>/kategori_galeri'><i class='fa fa-circle-o'></i><span>Galeri</span></a></li>
               <li class='treeview <?php if($npage==19){ echo'active';} ?>'><a href='<?php echo $burl; ?>/kategori_produk'><i class='fa fa-circle-o'></i><span>Produk</span></a></li>
              </ul>
            </li>


                  <?php } ?>        

            <li class='<?php if($npage==8){ echo'active';} ?>'><a href="<?php echo $burl; ?>/tags"><i class='fa fa-tag'></i> <span>Tags</span></a> </li>
        

           <?php if($user_level=='1'){    ?>
             
               <li class='<?php if($npage==17 || $npage==16){ echo'active';} ?>'><a href='<?php echo $burl; ?>/all_menu'><i class='fa fa-th-list'></i><span>Pengaturan Menu</span></a></li>
             
                <?php }                
               ?>      

            <li class='treeview <?php if(($npage==3) OR( $npage==4) OR ($npage==5)){ echo'active';} ?>'>
              <a href="#"><i class='fa fa-user'></i><span>User</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class='treeview-menu'>
                <?php if($user_level=='1'){
                  ?>
               <li class='<?php if($npage==4){ echo'active';} ?>'><a href='<?php echo $burl; ?>/all_user'><i class='fa fa-circle-o'></i><span>Managemen User</span></a></li>
               <li class='<?php if($npage==3){ echo'active';} ?>'><a href='<?php echo $burl; ?>/user_baru'><i class='fa fa-circle-o'></i><span>User Baru</span></a></li>
                <?php }
               ?>               
               <li class='<?php if($npage==5){ echo'active';} ?>'><a href='<?php echo $burl; ?>/profil_user'><i class='fa fa-circle-o'></i><span>Profil</span></a></li>
              </ul>
            </li>

            <li class='treeview <?php if($npage==10 OR $npage==11 OR $npage==20 OR $npage==22){ echo'active';} ?>'>
              <a href="#"><i class='fa fa-toggle-on'></i><span>Pengaturan Web</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class='treeview-menu'>
               <li class='<?php if($npage==10){ echo'active';} ?>'><a href='<?php echo $burl; ?>/informasi'><i class='fa fa-circle-o'></i><span>Informasi Web</span></a></li>
               <li class='<?php if($npage==11){ echo'active';} ?>'><a href='<?php echo $burl; ?>/biodata'><i class='fa fa-circle-o'></i><span>Biodata</span></a></li>

               <li class='<?php if($npage==22){ echo'active';} ?>'><a href='<?php echo $burl; ?>/pihak_ketiga'><i class='fa fa-circle-o'></i><span>Pihak ketiga</span></a></li>

               <li class='<?php if($npage==20){ echo'active';} ?>'><a href='<?php echo $burl; ?>/banner_depan'><i class='fa fa-circle-o'></i><span>Banner Depan</span></a></li>
              </ul>
            </li>

             <li class='treeview <?php if($npage==24 || $npage==25){ echo'active';} ?>'>
              <a href="#"><i class='fa  fa-desktop'></i><span>Tema</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class='treeview-menu'>
               <li class='<?php if($npage==25){ echo'active';} ?>'><a href='<?php echo $burl; ?>/pengaturan_tema'><i class='fa fa-circle-o'></i><span>Pengaturan Tema</span></a></li>
               <li class='<?php if($npage==24){ echo'active';} ?>'><a href='<?php echo $burl; ?>/distribusi_tema'><i class='fa fa-circle-o'></i><span>Buat/Distribusi Tema</span></a></li>
               
              </ul>
            </li>


           <li class="header">Informasi</li>

       <li class='<?php if($npage==23){ echo'active';} ?>'><a href="<?php echo $burl; ?>/kontak_masuk"><i class='fa fa-paper-plane-o'></i> <span>Kotak Masuk</span></a> </li>

              <?php if($user_level=='1'){
                  ?>
       <li class='<?php if($npage==32){ echo'active';} ?>'><a href="<?php echo $burl; ?>/smtp_email"><i class='fa fa-paper-plane-o'></i> <span>SMTP Email</span></a> </li>
                <?php }
               ?>      

                 <li class="header">Cache</li>
                 <li>
                  <div id="clear-cache" class="btn btn-sm btn-warning" style="margin: 5px 5px 0 15px">Clear Cache</div>
                 </li>
          </ul><!-- /.sidebar-menu -->
          <br><br>
        </section>
        <!-- /.sidebar -->
      </aside>

