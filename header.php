 
<!DOCTYPE html> 
<html>
  <head>  
    <meta name="google-site-verification" content="va58e3AMdPvJJ80C0fc8zHQa99Tv2v7UlR7nPrKswPo" />
    <?php wp_head(); ?>
  </head>
  <body>
    <header class="site-header"> 
    <div class="container">
      <span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="false"></i></span>
      <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
      <img style = "width: 6.5%; height:6.5%; padding-left:1%;padding-top:-2% " src= <?php echo get_theme_file_uri('/images/logo1.png') ?> />
      <img style = "width: 6.5%; height:6.5%; padding-left:1%;padding-top:-2% " src= <?php echo get_theme_file_uri('/images/logo2.png') ?> />
      <img style = "width: 6.5%; height:6.5%; padding-left:1%;padding-top:-2%" src= <?php echo get_theme_file_uri('/images/logo3.png') ?> />
      <div class="site-header__menu group" style="padding-left: 45%">
        <nav class="main-navigation">
          <ul class = "min-list group" >
            <li><a  href="<?php echo site_url()?>">Home page</a></li>
            <li><a href="<?php echo site_url('/slicer-roadmap') ?>">3D Slicer architecture</a></li>
            <li><a href="<?php echo site_url('/igt-module')?>">IGT module development</a></li>
            <li><a href="<?php echo site_url('/igt-demo')?>">Examples and demonstrations</a></li>
            <li><a href="<?php echo site_url('/create-module')?>">Create your own module</a></li>
          </ul>
        </nav>
        <div class="site-header__util">
          <!--
          <a href="#" class="btn btn--small btn--orange float-left push-right">Login</a>
          <a href="#" class="btn btn--small  btn--dark-orange float-left">Sign Up</a>-->
       <!--    <span class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="false"></i></span> -->
        </div>
      </div>
    </div>
  </header>
    	