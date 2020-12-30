<!DOCTYPE html>
<html lang="en" id="principal" style="background-color:rgba(255,255,255,0.5);">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BEURER - <?php if(isset($product['titulo'])){ echo ucfirst(mb_strtolower($product['titulo'])); } if ($varify_product == 1) { echo $product['pagetitle']; }elseif($varify_product == 0){ echo $pagina['pagetitle']; }else{ echo $category[0]['titulo']; } ?>
    </title>
    <!-- <meta name="description"
        content="<?php if ($varify_product == 1) { echo $product['meta_description']; }elseif($varify_product == 0){ echo $pagina['meta_description']; } ?>" />
    <meta name="keywords"
        content="<?php if ($varify_product == 1) { echo $product['meta_keyword']; }elseif($varify_product == 0){ echo $pagina['meta_keyword']; } ?>" />
    <meta property="og:title"
        content="<?php if ($varify_product == 1) { echo $product['og_title']; }elseif($varify_product == 0){ echo $pagina['og_title']; } ?>" />
    <meta property="og:description"
        content="<?php if ($varify_product == 1) { echo $product['og_description']; }elseif($varify_product == 0){ echo $pagina['og_description']; } ?>" />
    <meta property="og:image"
        content="<?php if ($varify_product == 1) { echo $product['og_image']; }elseif($varify_product == 0){ echo $pagina['og_imagen']; } ?>" /> -->

        <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:image" content="" />                     

    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/images/logos/favicon.ico'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/app_nuevo.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-147139498-4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-147139498-4');
    </script>
</head>
<style>
/* menu nav */
#primary-nav{
    bottom: -10px;
    background-color: #fff;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    -webkit-box-shadow: 0 -1px 3px rgba(0,0,0,0.2);
    box-shadow: 0 -1px 3px rgba(0,0,0,0.2);
    color: rgba(0,0,0,0.6);
    padding-top: 10px;
    list-style: none;
    position: fixed;
    z-index: 100;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    width: 100%;
    height: 62px;
}
#primary-nav .nav-item {
    -webkit-box-flex: 1;
    -ms-flex: 1;
    flex: 1;
    font-size: 0.9rem;
    font-weight: 400;
    font-weight: normal;
    text-align: center;
}
.boton-btn{
    border: navajowhite;
    background: none;
}
.login-mdl, .login-menu{
    width: 80%;
    /* height: 300px; */
    background: #fff;
    margin: 100px auto;
    border-radius: 10px;
    overflow: hidden;
}
.login-menu{
    margin: 200px auto;
}
.option-menu{
    display: block;
    padding: 10px;
    text-align: center;
}
#primary-nav{
    display: none;
}
@media only screen and (max-width: 767px) {
    #primary-nav{
        display: flex;
    }
}

</style>
<body style='background-color:rgba(255,255,255,0);'>
    <ol id="primary-nav">
        <li class="nav-item">
            <a href="<?= base_url('carrito'); ?>"><img class="img_nav" style="width: 29px;" src="<?= base_url('assets/images/nuevo/carrito.png'); ?>" alt=""></a>
            <div class="icon_nav">Carrito</div>
        </li>
        <li class="nav-item">
            <button class="boton-btn" type="button" data-toggle="modal" data-target="#login-modal" data-title="test">
                <a href="#"><img class="img_nav" style="width: 19px;" src="<?= base_url('assets/images/nuevo/login.png'); ?>" alt=""></a>
            </button>
            <div class="icon_nav">Mi Cuenta</div></li>
        <li class="nav-item">
            <a href="<?= base_url('estado-pedido'); ?>"><img class="img_nav" style="width: 40px;" src="<?= base_url('assets/images/nuevo/delivery.png'); ?>" alt=""></a>
            <div class="icon_nav">Tracking</div>
        </li>
    </ol>

    <!-- <div class="modal fade" id="login-modal" tabindex="1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <?php  $sesion = ( isset($_SESSION['status']) && $_SESSION['status'])?true:false; ?>
        <?php if ( !$sesion ): ?>
        <div class="login-mdl">
            <h2 class="login-header" style="padding: 10px">INICIA SESIÓN</h2>
            <form class="login-container" >
                <p><input type="text" id="username_" style="text-align:center;" placeholder="Email"></p>
                <p><input type="password" id="pasword_" style="text-align:center;" placeholder="Contraseña"></p>
                <p class="response_sesion"></p>
                <div class="checkbox" style=" text-align:left; padding-left:5px;">
                    <label class="font-light label-pol" style="display:inline;">
                    <input type="checkbox" id="remember_"/>
                    <i class="helper"></i>
                    </label>
                    <div style="display:inline-block; font-size:.9em;">Recuérdame</div>
                </div>
                <p style="padding-top:0px !important;margin-top:0px;">
                    <input class="btn btn-primary1" type="submit" value="Iniciar sesión" style="padding:0;">
                </p>
                <p><a href="<?php echo base_url('recovery'); ?>">¿Ha olvidado la contraseña?</a></p>
                <hr style="margin-top:0px;">
                <div style="text-align:center;">
                    <a class="btn btn-primary1" href="<?php echo base_url('registro'); ?>" style="color:white;"> Deseo registrarme</a>
                </div>
            </form>
        </div>
        <?php endif; ?>
        <?php if ( $sesion ): ?>
        <div class="login-menu">
            <div class="option-menu"><a href="<?= base_url('myaccount'); ?>">Mi Cuenta</a></div>
            <div class="option-menu"><a href="<?= base_url('ajax/logout'); ?>">Cerrar Sesión</a></div>
        </div>
        <?php endif; ?>
    </div> -->

    <?php  $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));     ?>
    <div class="wrapper-header" id="cabecera" <?php echo (isset($carrito) && $carrito )?'style="display:none;"':''; ?> >
        <header class="header">
            <div class="container-fluid menu-one px-0">
                <div class="container" style="width:100% !important; padding-left:5%;">
                    <div class="row">
                        <div class="col-md-5 col-sm-3 col-xs-3 hidden-sm hidden-xs izquierdo">
                            <ul class="list-rs">
                                <li class="">
                                    <a href="<?php echo $confif['facebook']; ?>" class="icn icon-h icon-facebook" target="_blank"></a>
                                    <a href="<?php echo $confif['instagram'] ?>" class="instg icon-h" target="_blank"><img src="<?= base_url('assets/images/icons/instagram.svg'); ?>" alt="" class="icn icon-instg"></a>
                                    <a href="<?php echo $confif['youtube'] ?>" class="icn icon-h icon-youtube" target="_blank"></a>
                                </li>
                                <li class="">
                                    <a href="https://api.whatsapp.com/send?phone=+57<?php echo trim($confif['whatsapp'])  ?>" class="icon-h icon-wts" target="_blank"></a>
                                    <span class="font-nexaregular n-phone visible-lg number"><?php echo $confif['numero_t']; ?></span>
                                </li> 
                            </ul>
                        </div>
                        <div class="col-xs-4 col-sm-3 col-md-3 pos-mob" style="margin-left:-3%;">
                            <div class="img-logo">
                                <a href="<?= base_url(); ?>"><img src="<?= base_url('assets/images/logos/logo-beurer.svg'); ?>" alt="" style="max-width:225px;"></a>
                            </div>
                        </div>
                        <div class="col-xs-8 col-sm-5 pos-inh box-search">
                            <div class="text-right txt-mob derecho" style="margin-right:-3%;">
                                <form class="div-search d-in-block" method="POST" action="<?= base_url('productos/resultado/') ?>">
                                    <input type="text" class="input-search search_get" name="search_get" placeholder="¿Qué estas buscando?" autocomplete="off" style="font-size:0.9em; text-align:center; width:0px;">
                                    <span class="icon-h icon-lupa btn-search"></span>
                                    <button type="submit" class="bsc-btn hidden-md hidden-lg font-nexaregular">BUSCAR</button>
                                </form>
                                <i id="button-menu" class="icon-hamb-open"></i>
                                <div class="result_buscador">
                                    <ul id="show_result"></ul>
                                </div>
                            </div>

                        </div>
                        <div class="col-xs-3 col-sm-4 col-md-4 pos-mob hidden-xs">
                            <div class="utl1">
                                <a href="<?= base_url('carrito') ?>"><img src="<?= base_url('assets/images/nuevo/carrito.png'); ?>" alt="" style="max-width:36px;"></a>
                            </div>
                            <div class="utl2">
                                <a onclick="ObjMain.login()"><img src="<?= base_url('assets/images/nuevo/login.png'); ?>" alt="" style="max-width:26px;"></a>
                            </div>
                            <div class="utl3">    
                                <a href="<?= base_url('estado-pedido')?>"><img src="<?= base_url('assets/images/nuevo/delivery.png'); ?>" alt="" style="max-width:48px;"></a>
                            </div>
                        </div>
                        <div class="menu-hamb" style=" justify-content:right; display:grid; right:70%; padding-right:2%;">                            
                            <div class="row">
                                <div class="col-md-3 offset-md-6" style="width:auto; top:-6%;">
                                    <?php  $sesion = ( isset($_SESSION['status']) && $_SESSION['status'])?true:false; ?>
                                    <?php if ( !$sesion ): ?>
                                    <!-- inicio de sesion -->
                                    <div class="login" style="display:none;">
                                        <h2 class="login-header">INICIA SESIÓN</h2>
                                        <form class="login-container" >
                                            <p><input type="text" id="username_" style="text-align:center;" placeholder="Email"></p>
                                            <p><input type="password" id="pasword_" style="text-align:center;" placeholder="Contraseña"></p>
                                            <p class="response_sesion"></p>
                                            <div class="checkbox" style=" text-align:left; padding-left:5px;">
                                                <label class="font-light label-pol" style="display:inline;">
                                                <input type="checkbox" id="remember_"/>
                                                <i class="helper"></i>
                                                </label>
                                                <div style="display:inline-block; font-size:.9em;">Recuérdame</div>
                                            </div>
                                            <p style="padding-top:0px !important;margin-top:0px;">
                                                <input class="btn btn-primary1" type="submit" value="Iniciar sesión" style="padding:0;">
                                            </p>
                                            <p><a href="<?php echo base_url('recovery'); ?>">¿Ha olvidado la contraseña?</a></p>
                                            <hr style="margin-top:0px;">
                                            <div style="text-align:center;">
                                                <a class="btn btn-primary1" href="<?php echo base_url('registro'); ?>" style="color:white;"> Deseo registrarme</a>
                                            </div>
                                        </form>
                                    </div>
                                    <?php endif; ?>
                                    <?php if ( $sesion ): ?>
                                    <!-- sesion iniciada -->
                                    <div class="login user_menu" style="display:none;">
                                        <ul>
                                            <li><a href="<?= base_url('myaccount'); ?>">Mi Cuenta</a></li>
                                            <li><a href="<?= base_url('ajax/logout'); ?>">Cerrar Sesión</a></li>
                                        </ul>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="menu-hamb" style="display:none;">
                            <div class="container">
                                <div class="row">
                                    <ul class="col-xs-12 col-md-5 visible-md visible-lg">
                                        <li><a href="<?= base_url('salud'); ?>" class="link-menu-hamb font-nexaheavy">salud</a></li>
                                        <li><a href="<?= base_url('bienestar'); ?>" class="link-menu-hamb font-nexaheavy">bienestar</a></li>
                                        <li><a href="<?= base_url('belleza'); ?>" class="link-menu-hamb font-nexaheavy">belleza</a></li>
                                        <li><a href="<?= base_url('actividad'); ?>" class="link-menu-hamb font-nexaheavy">actividad</a></li>
                                        <li><a href="<?= base_url('linea-bebe'); ?>" class="link-menu-hamb font-nexaheavy">línea bebé</a></li>
                                    </ul>
                                    <ul class="col-xs-12 col-md-5 visible-md visible-lg">
                                        <li><a href="<?php echo base_url('nosotro'); ?>s" class="link-menu-hamb font-nexaheavy">quienes somos</a></li>
                                        <li><a href="<?php echo base_url('contactanos'); ?>" class="link-menu-hamb font-nexaheavy">Contacto</a></li>
                                        <li><a href="#" class="font-nexaheavy nolink">Ayuda al cliente</a>
                                            <ul class="sub-m">
                                                <li><a href="<?php echo base_url('preguntas-frecuentes'); ?>" class="link-subm-hamb font-nexaregular">FAQ</a></li>
                                                <!-- <li><a href="<?php echo base_url('instrucciones-de-uso'); ?>" class="link-subm-hamb font-nexaregular">Instrucciones de uso</a> </li>-->
                                                <li><a href="<?php echo base_url(''); ?>centro-de-descargas" class="link-subm-hamb font-nexaregular">Centro de descargas</a></li>
                                                <li><a href="<?php echo base_url('terminos-y-condiciones'); ?>"class="link-subm-hamb font-nexaregular">Términos y condiciones</a></li>
                                                <li><a href="<?php echo base_url('politicas-de-privacidad'); ?>" class="link-subm-hamb font-nexaregular">Políticas de privacidad</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <div class="menu-mobile container-fluid visible-xs visible-sm">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <ul class="list-unstyled">
                                                    <!-- MENU MOBILE - SALUD -->
                                                    <?php 
                                                        $icon = array('', 'icon-salud', 'icon-bienestar', 'icon-belleza', 'icon-actividad', 'icon-linea-bb');
                                                        $menu_bg = array('', 'menu-salud', 'menu-bienestar', 'menu-belleza', 'menu-actividad', 'menu-bebe');
                                                        $link = array('', 'salud/', 'bienestar/', 'belleza/', 'actividad/', 'linea-bebe/');
                                                        $num = 1;
                                                        if ($menu['menu_list']) {
                                                            foreach ($menu['menu_list'] as $row) {    
                                                    ?>
                                                    <li class="nav-header">
                                                        <a href="#" data-toggle="collapse"
                                                            data-target="#<?= $menu_bg[$num]; ?>">
                                                            <h5 class="name-prod"><i
                                                                    class="icon-mob <?= $icon[$num]; ?>"></i><?= $row['cat']; ?>
                                                                <i class="icon-arrow-m-mobile"></i></h5>
                                                        </a>
                                                        <ul class="subm-nav-header collapse"
                                                            id="<?= $menu_bg[$num]; ?>">
                                                            <?php if ( isset($row['subcat']) ): ?>
                                                            <?php foreach ($row['subcat'] as $value): ?>
                                                            <li class="item-subm-nav">
                                                                <a class="link-subm-nav"
                                                                    href="<?php echo base_url($link[$num].$value['url']); ?>"
                                                                    data-toggle="collapse"
                                                                    data-target="#<?php echo $value['url'] ?>">
                                                                    <?= $value['titulo']; ?>
                                                                </a>
                                                            </li>
                                                            <?php endforeach ?>
                                                            <?php endif ?>


                                                        </ul>
                                                    </li>
                                                    <?php  
                                                            $num++;
                                                           }
                                                        }
                                                    ?>

                                                    <li class="item-nav-enl font-nexaheavy"
                                                        style="font-size: 20px;text-transform: uppercase;margin-top: 11px;text-align: center;">
                                                        <a href="<?php echo base_url('contactanos') ?>">CONTACTO</a>
                                                    </li>


                                                </ul>
                                            </div>
                                            <!-- OTROS ENLACES -->
                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <h2 class="font-nexaheavy ttl-enl"><a href="#">OTROS ENLACES <i
                                                                class="icon-arrow-m-mobile"></i></a></h2>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="menu-enl">
                                            <h2><i class="icon-arrow-regresar"></i>&nbsp;</h2>
                                            <ul class="nav-enl">
                                                <li class="item-nav-enl font-nexaheavy"><a
                                                        href="<?php echo base_url('nosotros'); ?>">Quienes Somos</a>
                                                </li>
                                                <!--li class="item-nav-enl font-nexaheavy"><a href="<?php echo base_url('contactanos') ?>">Contacto</a></li-->
                                                <li class="item-nav-enl font-nexaheavy"><a
                                                        href="<?php echo base_url('ayuda') ?>">Ayuda al Cliente</a>
                                                    <ul>
                                                        <li class="subm-nav-enl font-nexaregular"><a
                                                                href="<?php echo base_url('preguntas-frecuentes'); ?>">FAQ</a>
                                                        </li>
                                                        <!-- <li class="subm-nav-enl font-nexaregular"><a href="<?php echo base_url('instrucciones-de-uso'); ?>">Instrucciones de Uso</a></li> -->
                                                        <li class="subm-nav-enl font-nexaregular"><a
                                                                href="<?php echo base_url('centro-de-descargas'); ?>">Centro
                                                                de descargas</a></li>
                                                        <li class="subm-nav-enl font-nexaregular"><a
                                                                href="<?php echo base_url('terminos-y-condiciones'); ?>">Términos
                                                                y condiciones</a></li>
                                                        <li class="subm-nav-enl font-nexaregular"><a
                                                                href="<?php echo base_url('politicas-de-privacidad'); ?>">Políticas
                                                                de privacidad</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid px-0">
                <nav class="content-nav">
                    <ul class="list-nav h100 hidden-xs">
                        <?php
                            $icon = array('', 'icon-salud', 'icon-bienestar', 'icon-belleza', 'icon-actividad', 'icon-linea-bb');
                            $menu_bg = array('', 'menu-salud', 'menu-bienestar', 'menu-belleza', 'menu-actividad', 'menu-linea-bb');
                            $link = array('', 'salud/', 'bienestar/', 'belleza/', 'actividad/', 'linea-bebe/');
                            $num = 1;
                            if ($menu['menu_list']) {
                                # code...
                            
                                foreach ($menu['menu_list'] as $row) {
                        ?>
                        <li class="item-nav d-menu d-menu<?= $num; ?> text-uppercase font-nexabold ">
                            <a href="<?= base_url('salud'); ?>" class="link-nav"><span
                                    class="icon-nav <?= $icon[$num]; ?>"></span><?= $row['cat']; ?></a>
                            <ul class="submenu- ">
                                <li>
                                    <div class="menus <?= $menu_bg[$num] ?> col-xs-12 ">
                                        <div class="info-subm">
                                            <div class="container cont-menudesplegable">
                                                <div class="row">
                                                    <?php 
                                                    if($row['subcat']){
                                                        foreach ($row['subcat'] as $low) {
                                                            if($low['cantidad']>0) {
                                                                ?>
                                                    <div class=" item-desplegable mm-<?= $low['cantidad'] ?>"><a
                                                            href="<?= base_url($link[$num]) . $low['url']; ?>"><?= $low['titulo']; ?></a>
                                                    </div>
                                                    <?php
                                                            }else { ?>
                                                    <?php if($low['url'] == $this->uri->segment(2)){ ?>
                                                    <script type="text/javascript">
                                                        location.href = "/";
                                                    </script>
                                                    <?php } ?>
                                                    <?php }
                                                        }
                                                    } 
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <?php
                                $num++;
                                }
                            }
                        ?>
                    </ul>
                    <ul class="carrousel-header visible-xs">
                        <li class="item-carrosuel-h font-bold"><a href="<?= base_url('salud'); ?>"><i
                                    class="icon-h-cars icon-salud"></i> salud</a></li>
                        <li class="item-carrosuel-h font-bold"><a href="<?= base_url('bienestar'); ?>"><i
                                    class="icon-h-cars icon-bienestar"></i> bienestar</a></li>
                        <li class="item-carrosuel-h font-bold"><a href="<?= base_url('belleza'); ?>"><i
                                    class="icon-h-cars icon-belleza"></i> belleza</a></li>
                        <li class="item-carrosuel-h font-bold"><a href="<?= base_url('actividad'); ?>"><i
                                    class="icon-h-cars icon-actividad"></i> actividad</a></li>
                        <li class="item-carrosuel-h font-bold"><a href="<?= base_url('linea-bebe'); ?>"><i
                                    class="icon-h-cars icon-linea-bb"></i> linea bebé</a></li>
                    </ul>
                </nav>
            </div>
        </header>
    </div>