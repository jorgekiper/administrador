<?php
global $General;
#$get_config_site = $General->getConfigSite(array("*"));
?>
<!DOCTYPE html>
<html lang="es-MX">
    <head>
        
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <?php global $General; ?>
        <title>Intranet AxisKG</title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="author" content="<?php echo PATH_ROOT; ?>humans.txt">
        <meta name="robots" content="noindex, nofollow">
        <link rel="alternate" hreflang="es-mx" href="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">                    
                    
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo PATH_ROOT; ?>favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo PATH_ROOT; ?>favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo PATH_ROOT; ?>favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo PATH_ROOT; ?>favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo PATH_ROOT; ?>favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo PATH_ROOT; ?>favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo PATH_ROOT; ?>favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo PATH_ROOT; ?>favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo PATH_ROOT; ?>favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo PATH_ROOT; ?>favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo PATH_ROOT; ?>favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo PATH_ROOT; ?>favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo PATH_ROOT; ?>favicon/favicon-16x16.png">
        
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo PATH_ROOT; ?>favicon.ico">
        <link rel="apple-touch-icon" href="<?php echo PATH_ROOT; ?>apple-touch-icon.png">
        <link rel="icon" type="image/png" href="<?php echo PATH_ROOT; ?>favicon.png">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo PATH_ROOT; ?>favicon.ico">

        <!-- S T Y L E S - G E N E R A L -->
        
        <?php echo $General->includeHeadStyle('vendor/bootstrap/dist/css/bootstrap.min'); ?>
        <?php echo $General->includeHeadStyle('css/style.min'); ?>
        <?php echo $General->includeHeadStyle('css/vendor/animate'); ?>
        <?php echo $General->includeHeadStyle('css/vendor/hover-min'); ?>
        
        
        
            
        <?php if(MOD_AMBIENT == "Production"){ ?>
            <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
            <!--<script>
                (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
                function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
                e=o.createElement(i);r=o.getElementsByTagName(i)[0];
                e.src='//www.google-analytics.com/analytics.js';
                r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
                ga('create','UA-XXXXX-X','auto');ga('send','pageview');
            </script>-->
        <?php } ?>
        
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <?php echo $General->includeHeadScript("vendor/jquery/dist/jquery.min"); ?>
        
    </head>
    
    <body class="">
    
        <header class="g-header">
          <div class="container-fluid">
            <div class="row align-items-center">
              <div class="col-6 col-md-3 col-lg-3">
                <div class="brand">
                  <a href="">
                    <img src="<?php echo PATH_ROOT; ?>img/logos/logo.png" alt="">
                    <h1 class="site-title">Intranet AXISKG</h1>
                  </a>
                </div>
              </div>
              <div class="col-6 col-md-6 col-lg-5">
                <div class="menuMain">
                  <nav class="l-nav">
                    <!--<ul class="menu-main" id="md">
                      <li><a href="">Home</a></li>
                      <li><a href="">Convocatoria</a></li>
                      <li><a href="">Inscripción</a></li>
                      <li><a href="">Jurado</a></li>
                      <li><a href="">AMAPRO 2018</a></li>
                      <li><a href="">Noticias</a></li>
                    </ul>-->
                  </nav>
                  <button type="button" id="openMenuMobile" class="menu-mobile-btn" onClick="menuMobile()" data-menu-expand="false">
                    <span></span>
                  </button>
                </div>
              </div>
              <div class="d-none d-sm-block col-md-3 col-lg-4">
                <div class="toolsHead">
                  <div class="socialesHead">
                    <?php if(isset($get_config_site["url_facebook"]) && !empty($get_config_site["url_facebook"])){ ?>
                        <a href="<?php echo $get_config_site["url_facebook"]; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                    <?php } ?>
                    <?php if(isset($get_config_site["url_twitter"]) && !empty($get_config_site["url_twitter"])){ ?>
                        <a href="<?php echo $get_config_site["url_twitter"]; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                    <?php } ?>
                    <?php if(isset($get_config_site["url_linkedin"]) && !empty($get_config_site["url_linkedin"])){ ?>
                        <a href="<?php echo $get_config_site["url_linkedin"]; ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
                    <?php } ?>
                    <?php if(isset($get_config_site["url_instagram"]) && !empty($get_config_site["url_instagram"])){ ?>
                        <a href="<?php echo $get_config_site["url_instagram"]; ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                    <?php } ?>
                  </div>
                  <!-- <div class="loginCont">
                    <a class="btn-fx" href="" data-btn="Login"><span>Login</span></a>
                    <a class="btn-fx" href="" data-btn="Resgístrate"><span>Regístrate</span></a>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </header><!-- end.Header -->

        <!-- MenuMobile -->
        <div id="mm" class="cont-menu-mobile" data-menu-expand="false">
          <div id="contListMenu" class="mnuContMob">

          </div>
        </div>

        <main>
          <div id="primary" class="content-area">
            <?php 
            
            $General->content(); ?>
          </div>
        </main><!-- end.Main -->

        <footer class="g-footer">
          <div class="container"> 
            <div class="row">
              <div class="col-lg-2">
                <div class="navFooter">
                  <!--<ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Inscripción</a></li>
                    <li><a href="">Jurado</a></li>
                    <li><a href="">Historia</a></li>
                    <li><a href="">Noticias</a></li>
                  </ul>-->
                </div>
              </div>
              <div class="col-lg-2">
                <div class="navFooter">
                 <!-- <ul>
                    <li><a href="">Prensa</a></li>
                    <li><a href="">Contacto</a></li>
                    <li><a href="">Descargables</a></li>
                    <li><a href="">Patrocinadores</a></li>
                  </ul> -->
                </div>
              </div>
              <div class="col-lg-2">
                <div class="navFooter">
                    <?php if( (isset($get_config_site["telefono_1"]) && !empty($get_config_site["telefono_1"])) || 
                              (isset($get_config_site["telefono_2"]) && !empty($get_config_site["telefono_2"])) || 
                              (isset($get_config_site["telefono_3"]) && !empty($get_config_site["telefono_3"]))  ){ ?>
                        <ul>
                            <li>Teléfonos:</li>
                                <?php if(isset($get_config_site["telefono_1"]) && !empty($get_config_site["telefono_1"])){ ?>
                                    <li><a href="tel:+<?php echo $get_config_site["action_telefono_1"]; ?>" target="_blank"><?php echo $get_config_site["telefono_1"]; ?></a></li>
                                <?php } ?>
                                <?php if(isset($get_config_site["telefono_2"]) && !empty($get_config_site["telefono_2"])){ ?>
                                    <li><a href="tel:+<?php echo $get_config_site["action_telefono_2"]; ?>" target="_blank"><?php echo $get_config_site["telefono_2"]; ?></a></li>
                                <?php } ?>
                                <?php if(isset($get_config_site["telefono_3"]) && !empty($get_config_site["telefono_3"])){ ?>
                                    <li><a href="tel:+<?php echo $get_config_site["action_telefono_3"]; ?>" target="_blank"><?php echo $get_config_site["telefono_3"]; ?></a></li>
                                <?php } ?>
                        </ul>
                    <?php } ?>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="direccion">
                    <?php if(isset($get_config_site["direccion"]) && !empty($get_config_site["direccion"])){ ?>
                        <p><?php echo $get_config_site["direccion"]; ?></p>
                    <?php } ?>
                  
                  <div class="socialesFooter">
                      
                    <?php if(isset($get_config_site["url_facebook"]) && !empty($get_config_site["url_facebook"])){ ?>
                        <a href="<?php echo $get_config_site["url_facebook"]; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                    <?php } ?>
                    <?php if(isset($get_config_site["url_twitter"]) && !empty($get_config_site["url_twitter"])){ ?>
                        <a href="<?php echo $get_config_site["url_twitter"]; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                    <?php } ?>
                    <?php if(isset($get_config_site["url_linkedin"]) && !empty($get_config_site["url_linkedin"])){ ?>
                        <a href="<?php echo $get_config_site["url_linkedin"]; ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
                    <?php } ?>
                    <?php if(isset($get_config_site["url_instagram"]) && !empty($get_config_site["url_instagram"])){ ?>
                        <a href="<?php echo $get_config_site["url_instagram"]; ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="row"></div>
            <div class="row"></div>
          </div>
        </footer><!-- end.Footer -->
        
        <?php echo $General->includeHeadScript("vendor/popper.js/dist/umd/popper.min"); ?>
        <?php echo $General->includeHeadScript("vendor/bootstrap/dist/js/bootstrap.min"); ?>
        <?php echo $General->includeHeadScript("js/vendor/jquery.easing.1.3"); ?>
        <?php echo $General->includeHeadScript("vendor/greensock/dist/TweenMax"); ?>
        <?php echo $General->includeHeadScript("js/plugins/jquery.validate.min"); ?>
        <?php echo $General->includeHeadScript("js/plugins/additional-methods.min"); ?>
        <?php echo $General->includeHeadScript("js/plugins/wow.min"); ?>
        <?php echo $General->includeHeadScript("js/plugins/slick.min"); ?>
        <?php echo $General->includeHeadScript("js/plugins/tilt.jquery.min"); ?>
        <?php echo $General->includeHeadScript("js/scripts/layoutScripts.min"); ?>
        
        
        <?php echo $General->includeHeadScript("js/scripts/".THIS_CONTROLLER); ?>
        
    </body>
</html>
        