<?php
defined('BASEPATH') OR exit('Eiits! Jangan coba coba Mblo!!!!');
?>
<!DOCTYPE html>
<html lang="id-ID" prefix="og: http://ogp.me/ns#">
<head>
	<title><?php echo $informasi["title"] ?></title>

     <meta name="viewport" content="width=device-width, initial-scale=1" />

     <meta name="description" content="<?php echo $informasi['meta_deskripsi']; ?>" />
     <meta name="keywords" content="<?php echo $informasi['meta_keyword']; ?>" />
     <meta name="author" content="<?php echo $informasi['author']; ?>" />

     <meta property="og:url" content="<?php echo $informasi['og-url'];  ?>" />
     <meta property="og:title" content="<?php echo $informasi['og-title']; ?>" />
     <meta property="og:description" content="<?php echo $informasi["og-description"]; ?>" />
     <meta property="og:site_name" content="<?php echo $informasi['og-site_name']; ?>" />
     <meta property="og:image" content="<?php echo $informasi['og-image']; ?>" />
     <meta property="og:image:type" content="image/jpeg" />
     <meta property="og:type" content="<?php echo $informasi['og-type']; ?>" />
<?php if($informasi["current_page"]=="detail-artikel"){ ?>
     <meta property="article:author" content="<?php echo $informasi['article-author']; ?>" />
     <meta property="article:publisher" content="<?php echo $informasi['article-publisher']; ?>" />
     <meta property="article:published_time" content="<?php echo $informasi['article-published_time']; ?>" />
<?php } ?>


	<link rel='shortcut icon' href='<?php echo $informasi['favicon'] ?>' />	
	<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css' />
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css' />

	<!--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" /> -->
  <link rel="stylesheet" type="text/css" href="<?php echo assets_url('font-awesome/css/font-awesome.min.css'); ?>" />


  <!--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" />-->
  <link rel="stylesheet" type="text/css" href="<?php echo assets_url('fancybox/source/jquery.fancybox.css'); ?>" />
  <link rel="stylesheet" type="text/css" href="<?php echo assets_url('fancybox/source/helpers/jquery.fancybox-buttons.css'); ?>" />
  <link rel="stylesheet" type="text/css" href="<?php echo assets_url('fancybox/source/helpers/jquery.fancybox-thumbs.css'); ?>" />


  <link rel="stylesheet" type="text/css" href="<?php echo assets_url('jQuery.TosRUs/src/css/jquery.tosrus.all.css'); ?>" /> 



  <!--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />-->
  <link rel="stylesheet" type="text/css" href="<?php echo assets_url('bootstrap/css/bootstrap.min.css'); ?>" />


	<!--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css" />-->
  <link rel="stylesheet" type="text/css" href="<?php echo assets_url('owl-carousel/owl.carousel.css'); ?>" />


	<!--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo assets_url('css/'); ?>" /> -->


	<link rel="stylesheet" type="text/css" href="<?php echo assets_url('css/slit-slider.css') ?>" />

	<!--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css" />-->
  <link rel="stylesheet" type="text/css" href="<?php echo assets_url('css/animate.css'); ?>" />


	<!--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/devicons/1.8.0/css/devicons.min.css" />-->
  <link rel="stylesheet" type="text/css" href="<?php echo assets_url('devicons/css/devicons.min.css'); ?>" />


  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.jssocials/1.1.0/jssocials.css" />

  <link rel="stylesheet" type="text/css"  href="https://cdn.jsdelivr.net/jquery.jssocials/1.1.0/jssocials-theme-flat.css" />

  <link rel="stylesheet" type="text/css"  href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.4.1/themes/prism.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo assets_url('css/main.css') ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo assets_url('css/custom.css') ?>" />

  <?php
    if($informasi['current_page'] == 'faq'){
    
      $schema = array();
      $schema['@context'] = "http://schema.org";
      $schema['@graph'] = array();

      foreach($faq as $f){
        $schema['@graph'][]= array(
          '@type' => 'Question',
          'text' => $f['pertanyaan'],
          'dateCreated' => $f['tanggal'],
          'acceptedAnswer' => array(
            '@type' => 'Answer',
            'text' => $f['jawaban'],
            'dateCreated' =>  $f['tanggal']
          ),
        );
      }

    echo '<script type="application/ld+json">';
    echo json_encode($schema,JSON_PRETTY_PRINT);
    echo '</script>';

    } else if($informasi['current_page'] == 'detail-faq'){
      $schema = array();
      $schema['@context'] = "http://schema.org";
      $schema['@graph'] = array();

      
        $schema['@graph'][]= array(
          '@type' => 'Question',
          'text' => $faq['pertanyaan'],
          'dateCreated' => $faq['tanggal'],
          'acceptedAnswer' => array(
            '@type' => 'Answer',
            'text' => $faq['jawaban'],
            'dateCreated' =>  $faq['tanggal']
          ),
        );
    

    echo '<script type="application/ld+json">';
    echo json_encode($schema,JSON_PRETTY_PRINT);
    echo '</script>';
    }
  ?>

	<style type="text/css">
		<?php echo $informasi["custom_css"]; ?>
	</style>


	<script src="<?php echo assets_url('js/modernizr-2.6.2.min.js') ?>"></script>



</head>
<body id="body" class="blue-one-page" >

		<!-- preloader -->
	<!--	<div id="preloader">
            <div class="loder-box">
            	<div class="battery"></div>
            </div>
		</div> -->
		<!-- end preloader -->


        <!--
        Fixed Navigation
        ==================================== -->
        <header id="navigation" class="navbar-inverse navbar-fixed-top animated-header">
            <div class="container">
                <div class="navbar-header">
                    <!-- responsive nav button -->
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
                    </button>
					<!-- /responsive nav button -->
					
					<!-- logo -->
					<h2 class="navbar-brand">
						<a href="<?php echo baseURL() ?>"><?php echo $informasi["nama"]; ?></a>
					</h2>
					<!-- /logo -->
                </div>

				<!-- main nav -->
                <nav class="collapse navbar-collapse navbar-right" role="navigation">
                    <ul id="nav" class="nav navbar-nav" itemscope itemtype="http://schema.org/SiteNavigationElement" >
                       <?php 

                       foreach ($menu_horizontal  AS $menu) {
                       echo "<li itemprop='name'>";
                       echo "<a  itemprop='url' href='$menu[url]' target='$menu[target]' >$menu[nama]</a>";
                       echo "</li>";
                       }

                       ?>
                    </ul>
                </nav>
				<!-- /main nav -->
				
            </div>
        </header>
        <!--
        End Fixed Navigation
        ==================================== -->


<main class="site-content" role="main">

<?php

//jika bukan halaman Home
if($informasi["current_page"]!='home'){

  echo "<div class='section' id='main-konten'>";
  echo "<div class='container'>";
  echo "<div class='row'>";
}

?>