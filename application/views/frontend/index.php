<?php
    include 'src/includes/header.php';
?>
<style>
    .wrapper-footer{float:none;}
/* swiper */

.swiper-container {
    width: 100%;
    height: 100%;
}

.swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #fff;

    /* Center slide text vertically */
    display: -webkit-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    -webkit-justify-content: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    -webkit-align-items: center;
    align-items: center;
}
.cards-container {
    padding: 1rem;
    display: flex;
    align-items: center;
}

.cards-container>* {
    flex: 50%;
}

.cards {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
}

.cards>* {
    padding: 3px;
    width: 30px;
    flex: 33%
}

.wrapper-slide {
    /* border:1px solid red; */
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 1rem;
}

.content-slide>img {
    margin-right: 3rem
}

.content-slide,
.slider,
.phones {
    display: flex;
    justify-content: space-evenly;
}

.content-slide figure {
    font-size: .9rem!important;
    align-items: center;
    display: flex;
    justify-content: space-evenly;
    flex: 50%
}

.content-slide figure img {
    height: 85px;
}

.slider {
    flex-direction: column;
}

.phones {
    justify-content: space-evenly;
}

.container-banner {
    width: 90%!important;
    margin: 3rem auto;
    font-size: .9rem;
    
}

.container-banner .wrapper-slide {
    /* border:1px solid red; */
    padding: 0px;
}

.container-banner .content-slide>img {
    /* width:75px!important; */
    margin-right: 0rem
}

.container-banner .cards>* {
    padding: 3px;
    /* width: 45px; */
    flex: 33%
}

.container-banner .content-slide figure img {
    height: 66px !important;
}

.container-banner .content-slide figure {
    margin-top: 1rem;
    font-size: .95rem;
}

.container-banner>div>div:nth-child(2)::before {
    content: '';
    position: absolute;
    left: 0;
    top: 30%;
    width: 2px;
    background-color: #c51152;
    height: 60%;
    /* border: 1px solid red; */
}

.container-banner>div>div:nth-child(2)::after {
    content: '';
    position: absolute;
    right: 0;
    top: 30%;
    width: 2px;
    background-color: #c51152;
    height: 60%;
    /* border: 1px solid red; */
}

@media only screen and(max-width:480px) {
    .wrapper-slide {
        padding: 4rem !important;
    }
}

</style>

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <main class="main-home" id="fullpage" style="background-color: #fff;">
        <div class="popup-ini" id="login">
          <div class="popup-inner">
           <img id="img-popup" src="<?php echo base_url($confif['popup']); ?>" class="img-responsive" alt="">
            <!--button type="reset" class="aspa acordion_cerrar close" style="width: 34px!important;top: 5px;right: 5px;"> <i></i> </button-->
            <button type="button" class="close"><span aria-hidden="true">&times;</span></button>
          </div>
        </div> 

        <section class="section sct-video-home pos-rel">
        
                <video data-autoplay loop muted src="<?= base_url($contenido['video']); ?>" class="video hidden-xs hidden-sm"></video>
            
            <div class="text-center title-banner-home hidden-xs hidden-sm">
                <h2 class="title-b-products font-nexaheavy">#SaludYBienestar</h2>
            </div>
            <?php
                $slide_show = array(
                    $contenido['box_img_salud'],
                    $contenido['box_img_bienestar'],
                    $contenido['box_img_belleza'],
                    $contenido['box_img_actividad'],
                    $contenido['box_img_linea-bebe']
                );

                $slide_link = array(
                    base_url('salud'),
                    base_url('bienestar'),
                    base_url('belleza'),
                    base_url('actividad'),
                    base_url('linea-bebe'),
                );

                $slide_txt = array(
                    'Salud',
                    'Bienestar',
                    'Belleza',
                    'Actividad',
                    'Linea Bebe',
                );
                $slide_bg = array(
                    'bg-salud',
                    'bg-bienestar',
                    'bg-belleza',
                    'bg-actividad',
                    'bg-linea-bb',
                );
            ?>
            <div class="slider-home visible-xs visible-sm">
                <?php for ($i=0; $i<count($slide_show); $i++){ ?>
                <div class="item-slider-home">
                    <figure>
                        <img src="<?= $slide_show[$i] ?>" alt="">
                    </figure>
                    <div class="name-prod-slider">
                        <h2 class="title-slider-h"><?= $slide_txt[$i]  ?></h2>
                        <a href="<?= $slide_link[$i]  ?>" class="btn-slider-h <?= $slide_bg[$i]  ?>">ver más</a>
                    </div>
                    <div class="degradado"></div>
                </div>
                <?php } ?>
           
            </div>
            
        </section>
        <section class="swiper-container"  id="slider" style="display:none;">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="col-md-12" style="text-align:center;height:25vh; display: table; height:200px;">
                        <div class="wrapper-slide beneficios-txt">

                            <h3 class="divisor__title --small" style="font-size:22pt;">Atención al Cliente</h3>

                            <div class="content-slide" style="flex-direction:column">
                                <img style="width:100px;margin:auto" src="assets/svg/user.svg" alt="">
                                <div class="slider">
                                    <p>Te asesoramos en tu compra</p>
                                    <article class="phones">
                                        <img style="width:45px" src="assets/svg/recurso.svg" alt="">
                                        <div class="phones-numbers">
                                            920 198 522 <br>
                                            978 440 034
                                        </div>
                                    </article>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="col-md-12" style="text-align:center;height:25vh; display: table; height:200px;">
                        <div class="wrapper-slide beneficios-txt">

                            <h3 class="divisor__title --small" style="font-size:22pt;">Medios de pago</h3>

                            <div class="content-slide cards-container" style="flex-direction:column"> 
                                <div class="cards">
                                    <img src="assets/svg/visa@3x.png" alt="visa">
                                    <img src="assets/svg/master@3x.png" alt="master">
                                    <img src="assets/svg/expres@3x.png" alt="expres">
                                    <img src="assets/svg/club@3x.png" alt="club">
                                    <img src="assets/svg/efectivo@3x.png" alt="efectivo">
                                    <img src="assets/svg/shop.svg" alt="">
                                </div>
                                <p>Aceptamos todos los <br> medios de pago y/o Transferencias</p>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="col-md-12" style="text-align:center;height:25vh; display: table; height:200px;">
                        <div width="100%" class="wrapper-slide beneficios-txt">

                            <h3 class="divisor__title --small" style="font-size:22pt;">Pedido</h3>

                            <div class="content-slide" style="flex-direction:column;">
                                <figure style="display: flex; flex-direction:column ;align-items:center">
                                    <img style="height:60px"src="assets/svg/send.svg" alt="">
                                    <p style="font-size:1rem">¡Envíos a todo el Perú!</p>
                                </figure>
                                <br>
                                <figure style="display: flex; flex-direction:column ;align-items:center">
                                    <img style="height:60px" src="assets/svg/car.svg" alt="">
                                    <p style="font-size:1rem">Retiro gratis en<br> nuestra tienda</p>
                                </figure>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </section>
        <section class="container-banner section fp-auto-height">
            <div class="row" id="banner">

                <div class="col-md-4" style="text-align:center;height:19vh; display: table; height:200px;">
                    <div class="wrapper-slide beneficios-txt">

                        <h3 class="divisor__title --small" style="font-size:20pt;">Atención al Cliente</h3>

                        <div class="content-slide">
                            <img style="width:90px" src="assets/svg/user.svg" alt="">
                            <div class="slider">
                                <p>Te acesoramos en tu compra</p>
                                <article class="phones">
                                    <img style="width:45px" src="assets/svg/recurso.svg" alt="">
                                    <div class="phones-numbers">
                                        920 198 522 <br>
                                        978 440 034
                                    </div>
                                </article>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-4" style="text-align:center;height:19vh;height:200px">
                    <div class="wrapper-slide beneficios-txt">

                        <h3 class="divisor__title --small" style="font-size:20pt;">Medios de pago</h3>

                        <div class="content-slide cards-container">
                            <div class="cards">
                                <img src="assets/svg/visa@3x.png" alt="visa">
                                <img src="assets/svg/master@3x.png" alt="master">
                                <img src="assets/svg/expres@3x.png" alt="expres">
                                <img src="assets/svg/club@3x.png" alt="club">
                                <img src="assets/svg/efectivo@3x.png" alt="efectivo">
                                <img src="assets/svg/shop.svg" alt="">
                            </div>
                            <p>Aceptamos todos los <br> medios de pago y/o Transferencias</p>
                        </div>


                    </div>
                </div>
                <div class="col-md-4" style="text-align:center;height:19vh;">
                    <div width="100%" class="wrapper-slide beneficios-txt">

                        <h3 class="divisor__title --small" style="font-size:20pt;">Pedido</h3>

                        <div class="content-slide">
                            <figure  style="display: flex;flex-direction:column ; justify-content:flex-start;">
                                <img src="assets/svg/send.svg" alt="">
                                <p>¡Envíos a todo el Perú!</p>
                            </figure>

                            <figure style="display: flex;flex-direction:column ; justify-content:flex-start;">
                                <img width="60" src="assets/svg/car.svg" alt="">
                                <p >Retiro gratis en<br> nuestra tienda</p>
                            </figure>

                        </div>


                    </div>
                </div>
            </div>
        </section>
        <section class="section sct-four-home">
            <div class="container-fluid h100">
                <div class="row h100">                    
                    <div class="col-exe">
                        <figure class="effect-selena bgc-celeste">
                            <a href="<?= base_url('salud'); ?>"></a>
                            <img src="<?= base_url($contenido['box_img_salud']); ?>" alt="salud"/>
                            <figcaption>
                                <h2 class="cceleste">SALUD</h2>
                                <p><?= $getbox[0]['valor']; ?></p>
                            </figcaption>           
                        </figure>
                    </div>
                    <div class="col-exe">
                        <figure class="effect-selena bgc-naranja">
                            <a href="<?= base_url('bienestar'); ?>"></a>
                            <img src="<?= base_url($contenido['box_img_bienestar']); ?>" alt="salud"/>
                            <figcaption>
                                <h2 class="cnaranja">BIENESTAR</h2>
                                <p><?= $getbox[1]['valor']; ?></p>
                            </figcaption>           
                        </figure>
                    </div>
                    <div class="col-exe">
                        <figure class="effect-selena bgc-morado">
                            <a href="<?= base_url('belleza'); ?>"></a>
                            <img src="<?= base_url($contenido['box_img_belleza']); ?>" alt="salud"/>
                            <figcaption>
                                <h2 class="cmorado">BELLEZA</h2>
                                <p><?= $getbox[2]['valor']; ?></p>
                            </figcaption>           
                        </figure>
                    </div>
                    <div class="col-exe">
                        <figure class="effect-selena bgc-verde">
                            <a href="<?= base_url('actividad'); ?>"></a>
                            <img src="<?= base_url($contenido['box_img_actividad']); ?>" alt="salud"/>
                            <figcaption>
                                <h2 class="cverde">ACTIVIDAD</h2>
                                <p><?= $getbox[3]['valor']; ?></p>
                            </figcaption>           
                        </figure>
                    </div>
                    <div class="col-exe">
                        <figure class="effect-selena bgc-amarillo">
                            <a href="<?= base_url('linea-bebe'); ?>"></a>
                            <img src="<?= base_url($contenido['box_img_linea-bebe']); ?>" alt="salud"/>
                            <figcaption>
                                <h2 class="camarillo">LÍNEA BEBÉ</h2>
                                <p><?= $getbox[4]['valor']; ?></p>
                            </figcaption>           
                        </figure>
                    </div>
                </div>
            </div>
        </section>
        <!-- CARROSUEL PRODUCTOS DESTACADOS -->
        <section class="section sct-two-home" >
            <h2 class="ttl-prd-dst text-center font-nexaheavy">PRODUCTOS DESTACADOS</h2>
            <div class="container">
                <div class="row">
                    
                    <div class="carousel-home-general">
                        <?php foreach ($dstcd as $row): ?>
                        <?php if ($row['active'] == 1): ?>
                            <div class="item-carosuel">
                                <div class="container">
                                    <div class="info-slider-home">
                                        <!--button class="trans-info name-product bg-belleza font-nexaregular  bg-pink"><?php $row['pagina'] ?></button-->
                                        <h2 class="trans-info title-big-slider font-nexaheavy"><?= $row['titulo'] ?></h2>
                                        <span class="trans-info subtile-slider text-uppercase font-nexaregular"><?= $row['subtitulo'] ?></span>
                                        <p class="trans-info description-slider font-nexaregular"><?= $row['contenido'] ?></p>
                                        <a href="<?= base_url($row['cat_url'].'/'.$row['subcat_url'].'/'.$row['prod_url']); ?>" class="trans-info btn-slider bg-pink">VER PRODUCTO</a>
                                    </div>
                                    <div class="img-slider-h">
                                    <a href="<?= base_url($row['cat_url'].'/'.$row['subcat_url'].'/'.$row['prod_url']); ?>">
                                            <img src="<?= base_url($row['imagen']); ?>" alt="">
                                    </a>
                                    </div>
                                </div>
                            </div>    
                        <?php endif ?>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </section>

       
       
        <section class="section sct-three-home">
            <div class="container-fluid">
                <div class="row">
                    <div class="carrosuel-two-home">
                        <?php foreach ($slideme as  $low): ?>
                        <?php if ($low['active'] == 1): ?>
                            <div class="wrapper-cards-products">
                                <a class="linkabsolute" href="<?= base_url($low['cat_url'].'/'.$low['subcat_url'].'/'.$low['prod_url']); ?>"></a>
                                <div 
                                    class="content-img-card 
                                    <?php echo  $low['stock'] == 0 ? 'content-stock-tag' : '' ?>
                                    content-descuento-tag
                                    content-delivery-tag
                                    ">

                                    <img src="<?= base_url($low['imagen']); ?>" alt="" class="img-cnt">

                                    <?php if( $low['stock'] == 0 ) { ?>
                                        <div class="tag-stock">AGOTADO</div>
                                        <style>
                                            .content-stock-tag {
                                                position: relative;
                                                opacity: .7;
                                            }
                                            .tag-stock{
                                                font-size:.7rem;
                                                padding: 7px 16px;
                                                border-radius: 1rem;
                                                background-color: rgba(0,0,0,.8);
                                                color: #fff;
                                                position: absolute;
                                                top: 50%;
                                                left: 50%;
                                                transform: translate(-50%, -50%);
                                            }
                                        </style>
                                    <?php } ?>
                                    <?php if( ( $low['tipo_descuento'] != 0 && ($low['precio'] !== $low['precio_anterior'])) && (int)$low['stock'] !== 0 ) {
                                        $price_desc = $low['precio_anterior']- $low['precio'];
                                        $porc_desc  = number_format( ( ($price_desc / $low['precio_anterior'])*100) , 2);
                                        ?>
                                        
                                        <div class="tag-descuento">- <?php echo $low['tipo_descuento'] == 2 ? ((int)$porc_desc).'%' : 'S/ '.($price_desc) ?></div>
                                        <style>
                                            .content-descuento-tag {
                                                position: relative;
                                            }
                                            .tag-descuento{
                                                opacity: 1;
                                                font-size:.8rem;
                                                padding: 5px 10px;
                                                border-radius: 10px 0 0 10px;
                                                background-color: #c51152;
                                                color: #fff;
                                                position: absolute;
                                                top: 5%;
                                                right: -0%;
                                                transform: translate(-0%, -50%);
                                            }
                                        </style>
                                    <?php } ?>
                                    <?php if( ((int)$low['delivery_free'] == 1 ) && (int)$low['stock'] !== 0)  { ?>
                                        <div class="tag-delivery">
                                            <img class ="img-delivery" src="<?= base_url('assets/svg/carr.svg')?>" alt="tag-delivery">
                                            <span class="text-delivery">ENVÍO <br> GRATIS</span>
                                        </div>
                                        <style>
                                            .content-delivery-tag {
                                                position: relative;
                                            }
                                            .tag-delivery .text-delivery {
                                                font-size:11px;
                                                width: 50%;
                                                margin-left: 0px;
                                            }
                                            .img-delivery {
                                                width: 38%!important;
                                                height: auto;
                                            }
                                            .tag-delivery {

                                                height: 10%;
                                                width: 37%;
                                                display: flex;
                                                justify-content: center;
                                                align-items: center;
                                                opacity: 1;
                                                font-size:.8rem;
                                                padding: 2px ;
                                                border-radius: 16px 0 0 16px;
                                                background-color: #c51152;
                                                color: #fff;
                                                position: absolute;
                                                top: 10%;
                                                right: 0%;

                                            }
                                            .text-delivery {
                                                display: flex;
                                                align-items: center;
                                                 font-size: .60rem !important;
                                            }
                                            @media (max-width:480px) {
                                                .tag-delivery {
                                                    height: 18%!important; 
                                                    width: 50% !important; 
                                                }
                                                .btnAddCarrito {
                                                    font-size: .7rem !important;
                                                }
                                            }
                                            @media (max-width: 575px) and (min-width: 481px)  {
                                                .tag-delivery {
                                                    height: 22%!important; 
                                                    width: 45% !important; 
                                                }
                                                
                                            }
                                            @media (min-width:1200px) {
                                                .img-delivery {
                                               
                                               margin-left: 10px;
                                            }
                                            .text-delivery {
                                                line-height: 13px;
                                                display: flex;
                                                align-items: center;justify-content: center;
                                                padding: 0;
                                                 font-size: .5rem !important;
                                            }
                                            .tag-delivery {
                                                
                                                height: 9.5%;
                                                /* width: 37%; */
                                                display: flex;
                                                justify-content: flex-start;
                                                align-items: center;
                                                opacity: 1;
                                                font-size:.8rem;
                                                padding: 2px 5px ;
                                                border-radius: 16px 0 0 16px;
                                                background-color: #c51152;
                                                color: #fff;
                                                position: absolute;
                                                top: 10%;
                                                right: 0%;
                                            }
                                            }
                                        </style>
                                    <?php } ?>
                                    <?php if(  ((int)$low['nuevo']== 1 ) && (int)$low['stock'] > 0 ) { ?>
                                                    <div class="tag-new">
                                                    <img  
                                                    class="start__message"
                                                    src="<?php echo  base_url('assets/images/targetnew.png') ?>" alt="">

                                                    </div>
                                                    <style>
                                                        .content-new-tag {
                                                            position: relative;
                                                        }
                                                        .start__message {
                                                            width: 90px!important;
                                                            height: auto!important;
                                                            z-index: 10;
                                                            position: absolute;
                                                            color: #C51152;
                                                            /* font-size: .8rem; */
                                                            /* font-weight: 600; */
                                                            top:70%;
                                                            left:10%
                                                            
                                                        }
                                                        /* @media (max-width:320px) {
                                                            .wrapper-cards-products .content-title-card .btn-vp .a-btn {
                                                                font-size: .5rem!important;
                                                            }
                                                        }
                                                        @media (max-width:480px) {
                                                            .start__message  {
                                                                width: 75px!important;
                                                                left: 10px;
                                                            }
                                                        }
                                                        @media (max-width: 575px) and (min-width: 481px)  {
                                                            .start__message  {
                                                                top:60%;
                                                                width: 70px!important;
                                                                left: 10px;
                                                            }
                                                        } */

                                                        
                                                    </style>
                                                <?php } ?>
                                </div>
                                
                                <div class="content-title-card">
                                    <h2 class="h2-title font-nexaheavy"><?= $low['titulo'] ?></h2>
                                    <!-- <span class="d-block subtitle-card"><?= $low['subtitulo'] ?></span> -->
                                    <b class="d-block font-nexheavy h2-title "
                                    >
                                         <span class=" <?php echo $low['tipo_descuento'] != 0 && ($low['precio'] !== $low['precio_anterior'])? 'price-throw' : '' ?>"> <?php echo 'S/ '.$low['precio_anterior']; ?></span>
                                         <?php if( (int)$low['tipo_descuento'] !== 0 && ($low['precio'] !== $low['precio_anterior']) ) {?>
                                            <br>
                                            <b  style="color: #C51152;opacity:1; font-size:1rem;" class="d-block font-nexheavy ">S/. <?php echo $low['precio'] ?></b>
                                         <?php }?> 
                                    </b>
                                    <div class="btn-vp" style="z-index: 3;">
                                        <?php if( $low['stock'] > 0 ) { ?>
                                            <a href=""
                                                data-title="<?php echo $low['titulo']?>"
                                                data-currentstock = "<?php echo $low['stock'] ?>"
                                                data-id="<?php echo $low['id']?>"
                                                data-precio="<?php echo $low['precio_anterior']?>"
                                                data-producto_sku="<?php echo $low['producto_sku']?>"
                                                data-precio_online="<?php echo $low['precio']  ?>"
                                                data-img="<?= $low['imagen']?>" 
                                                data-peso="<?= $low['peso'] ?>"
                                                data-volumen="<?php echo (int)$low['delivery_free']== 1 ? 0 :($low['ancho']*$low['largo']* $low['alto']) ?>"
                                                data-cantidad="1"
                                                data-stock=<?php echo $low['stock'] ?> 
                                                data-subtotal=<?=  floatval($low['precio']) ?> 
                                                class="a-btn font-nexaheavy addShop">agregar al carrito</a>
                                        <?php } else { ?>
                                            <a 
                                                href="<?php echo base_url($low['cat_url'].'/'.$low['subcat_url'].'/'.$low['prod_url']) ?>"
                                                class="a-btn font-nexaheavy">ver detalles</a>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>    
                        <?php endif ?>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </section>

       
        <section class="section fp-auto-height">
        
            <?php
                include 'src/includes/footer.php'
            ?>
        </section>
    </main>
    
    
    <script src="assets/js/libraries/fullpage.js"></script>

    <!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>

        let swiper = new Swiper('.swiper-container', {
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
        
        if (screen && screen.width > 1300) {
            let fullpageDiv = $('#fullpage');
            if (fullpageDiv.length) {
                fullpageDiv.fullpage({
                    scrollBar: true,
                    scrollOverflow: true,
                    verticalCentered: true,
                    afterRender: function () {
                    }
                });
            }
        }

        <?php if ($confif['popup_check'] == 1): ?>
            $('#login').fadeIn();
        <?php else: ?>
            $('.popup-ini').css('display', 'none');
        <?php endif ?>

    </script>
    <script>

  
        $(".popup-btn").click(function () {
                    var target = $(this).attr("href");
                    $(target).fadeIn();
         });
         
        $(".popup-ini .close").click(function () {
                    $(".popup-ini").fadeOut();
         });
        

         
if (screen && screen.width > 992) {
    $(".div-search").mouseover(function (event) {
        $(".input-search").css({
            'width': '18.5vw',
            'border-color': '#c51152',
            'border-radius': '15px',
            'box-shadow': '4px 4px #ccc',

        })
        $(".input-search::placeholder").css({
            'opacity': '1',
            'color': '#fff',

        })
    });
    $(".div-search").mouseout(function (event) {
        $(".input-search").css({
            'width': '0',
            'border-color': 'transparent',
            'border-radius': '0',
            'box-shadow': '0px 0px #ccc',
            //'padding': '0'
        })
    });
} else {
    $(".div-search").mouseover(function (event) {
        $(".input-search").css({
            'width': '18.5vw',
            'border-color': '#c51152',
            'border-radius': '15px',
            'box-shadow': '4px 4px #ccc',
        })

        $(".input-search::placeholder").css({
            'opacity': '1',
            'color': '#fff',
        })
    });

    $(".div-search").click(function () {
        $(".input-search").css({
            "top": "0", //modificamos el bottom a 0
            "box-shadow": '0px 0px #ccc',
        });
        $(".bsc-btn").css({
            // "opacity": "1",
            // "z-index": "10000"
        })
    });
    $(".div-search").mouseout(function () {
        $(".input-search").css({
            // "top" : "-100%" //modificamos el bottom a 0
            'width': '0',
            'border-color': 'transparent',
            'border-radius': '0',
            'box-shadow': '0px 0px #ccc',
        });

    });
}

    </script>
    
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css" id="theme-styles">

</body>
<div class="modal fade" id="addCarr" tabindex="1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="width:100%; padding:1%;padding-top:0px;border-radius:5%;padding:4%;">
            <div class="modal-header" style=" color:#c51152; border-bottom:0 none;padding-bottom:1%;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top:-25px;">
                    <span aria-hidden="true" style="color:#c51152;font-weight:bold;font-size:1.5em;">&times;</span>
                </button>

                <div style="display:block;text-align:center;">
                    <div style="display:inline-block">
                        <img src="<?= base_url(); ?>assets/images/icono-comprobar.svg" id="img-check"
                            style="width:1.5rem;height:auto;">
                    </div>
                    <div style="display:inline-block;vertical-align:middle;margin-left:1.5%;">
                        <h2 class="modal-title" id="txt-exito"
                            style="font-size:1.7rem;vertical-align:middle;font-family:'nexaheavyuploaded_file';text-align:center;">
                            Producto añadido con éxito</h2>
                    </div>
                </div>

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5 col-xs-5">
                        <img class="img-modal imgAdd" src=""
                            alt="" style="width:100%; height:auto;text-align:left;">
                    </div>
                    <div class="col-md-7 col-xs-7" style=" display: flex;
                    justify-content: center;
                    align-content: center;
                    flex-direction: column;">
                        <h2 class="modal-title" id="titleAdd" style="font-size:1.3rem;font-weight:bold;">
                        
                        </h2>
                        <div class="font-nexaheav cantidadModal"
                            style="text-align:left;font-size:1.3em;font-family:'nexaregularuploaded_file';font-weight:100">
                            Cantidad: 1
                        </div>

                        <div style="display:block;">
                         <!-- <img style="text-align:left;display:inline-block;width:7vh;height:5vh;margin-right:3%;padding-bottom:4%;"
                                src="<?= base_url(); ?>assets/images/precio-online.png"> -->
                            <div class="font-nexaheav priceOfertAdd"
                                style="text-align:left;display:inline-block;color:#c51152;font-weight:bold; font-size: 1.2rem;font-family:'nexaregularuploaded_file';">
                                </div>
                        </div>
                        <div class="font-nexaheav priceAdd price-throw"
                            style="text-decoration: line-through;font-weight:100;text-align:left;font-size:1.1em;font-family:'nexaregularuploaded_file';">
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer"
                style="text-align:center;border-top:0 none;padding-top:7px;border-bottom:1px solid #c3c3c3;padding-bottom:35px;">

                <a href="<?php echo base_url('carrito'); ?>"><button type="button" class="btn  btn-cmn"
                        style="width:75%!important;text-align:center;font-size:1.2rem!important;padding-top:7px;padding-bottom:7px; padding-left:0px;padding-right:0px; ">IR
                        AL CARRO</button></a>
                <br>
                <br>
                <a href="<?= base_url()?>"
                    style="font-size: 0.95rem;font-weight:bold;text-decoration-line:underline;">Seguir comprando</a>
            </div>         
            <div class="modal-header" style="text-align:center;border-bottom:0 none;">
                <h4 class="modal-title  title-sugeridos font-nexaheavy" id="exampleModalLongTitle"
                        style="font-size:2.4vh;color:#c51152;">
                        
                </h4>
            </div>

            <div class="modal-body" style="padding:0px;">
                <div class="row" style="margin:0px;">
                    <div class="col-md-12 ">
                        <div class="row relacionados-products" style="margin:0px;">
                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<style>
@media (max-width: 480px){
body {
       font-size: 72.5%!important;
       
   }
}
     
     
</style>

</html>