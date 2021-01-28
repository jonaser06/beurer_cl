<?php
    include 'src/includes/header.php'
?>
    <main class="main-dtll top-subcategoria">
        <section class="sct-banner-dtll pos-rel">
            <div class="bg-degrde"></div>
            <?php if ( isset($contenido['t_salud_img']) ){ ?>
                <img src="<?= base_url($contenido['imagen_salud']); ?>" alt="" class="img-cover">
            <?php }  ?>

            <?php if ( isset($contenido['t_bienestar_img']) ){ ?>
                <img src="<?= base_url($contenido['imagen_bienestar']); ?>" alt="" class="img-cover">
            <?php }  ?>

            <?php if ( isset($contenido['t_belleza_img']) ){ ?>
                <img src="<?= base_url($contenido['imagen_belleza']); ?>" alt="" class="img-cover">
            <?php }  ?>

            <?php if ( isset($contenido['t_actividad_img']) ){ ?>
                <img src="<?= base_url($contenido['imagen_actividad']); ?>" alt="" class="img-cover">
            <?php }  ?>

            <?php if ( isset($contenido['t_linea_bebe_img']) ){ ?>
                <img src="<?= base_url($contenido['imagen_linea_bebe']); ?>" alt="" class="img-cover">
            <?php }  ?>

            <div class="container content-title-banner">

                 <?php if ( isset($contenido['t_salud_img']) ){ ?>
                    <h2 class="title-peq-bproducts font-bold text-uppercase" style="margin-bottom:0px"><?= $contenido['t_salud_img'] ?></h3>
                    <h2 class="title-b-products font-bold text-uppercase" style="margin-top:0px"><?= $contenido['st_salud_img'] ?></h2>
                 <?php }  ?>

                <?php if ( isset($contenido['t_bienestar_img']) ){ ?>
                    <<h2 class="title-peq-bproducts font-bold text-uppercase" style="margin-bottom:0px"><?= $contenido['t_bienestar_img'] ?></h3>
                    <h2 class="title-b-products font-bold text-uppercase" style="margin-top:0px"><?= $contenido['st_bienestar_img'] ?></h2>
                <?php }  ?>

                <?php if ( isset($contenido['t_belleza_img']) ){ ?>
                    <h2 class="title-peq-bproducts font-bold text-uppercase" style="margin-bottom:0px"><?= $contenido['t_belleza_img'] ?></h3>
                    <h2 class="title-b-products font-bold text-uppercase" style="margin-top:0px"><?= $contenido['st_belleza_img'] ?></h2>
                <?php }  ?>

                <?php if ( isset($contenido['t_actividad_img']) ){ ?>
                    <h2 class="title-peq-bproducts font-bold text-uppercase" style="margin-bottom:0px"><?= $contenido['t_actividad_img'] ?></h3>
                    <h2 class="title-b-products font-bold text-uppercase" style="margin-top:0px"><?= $contenido['st_actividad_img'] ?></h2>
                <?php }  ?>

                <?php if ( isset($contenido['t_linea_bebe_img']) ){ ?>
                    <h2 class="title-peq-bproducts font-bold text-uppercase" style="margin-bottom:0px"><?= $contenido['t_linea_bebe_img'] ?></h3>
                    <h2 class="title-b-products font-bold text-uppercase" style="margin-top:0px"><?= $contenido['st_linea_bebe_img'] ?></h2>
                <?php }  ?>

            </div>
            <ol class="breadcrumb bread-products container">
                <li class="item-bradcrumb"><a href="#" class="link-bradcrumb">Productos</a></li>
                <li class="item-bradcrumb"><a href="<?= base_url($pagina['url']) ?>" class="link-bradcrumb"><?= ucfirst(mb_strtolower($pagina['pagina']))?></a></li>
                <li class="item-bradcrumb"><a href="<?= base_url($pagina['url'].'/'.$category[0]['url']); ?>" class="link-bradcrumb bienestar active"><?= ucfirst(mb_strtolower($category[0]['titulo'])) ?></a></li class="item-bradcrumb">
            </ol>
        </section>
        <!-- NAV TABS -->

        <section class="sct-info-subproduct">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-md-3 sticky-sidebar">
                        <div class="info-subproduct animatedParent animateOnce" data-sequence='500'>
                            <h2 class="ttl-info-subproducts color-<?= $this->uri->segment(1); ?> font-nexaheavy text-uppercase animated fadeInLeftShort" data-id="1"><?= $category[0]['titulo']; ?>
                            </h2>
                            <h4 class="font-bold animated fadeInLeftShort" data-id="2"><?= $category[0]['subtitle']; ?></h4>
                            <p class="p-internas animated fadeInLeftShort" data-id="3"><?= $category[0]['contenido']; ?></p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-9">
                        <div class="row animatedParent animateOnce" data-sequence='500'>
                            <!-- List Products -->
                            <?php foreach ($products as $row) { ?>
                            <?php if ($row['active'] == 1): ?>
                                <div class="col-xs-6 col-md-4 px-0 animated fadeInLeftShort" data-id="1">
                                    <div class="wrapper-cards-products dtll card-prd-salud">
                                        <a class="linkabsolute" href="<?= base_url($pagina['url'].'/'.$category[0]['url'].'/').$row['prod_url'] ?>"></a>
                                        <div class="content-img-card
                                            <?php echo  $row['stock'] == 0 ? 'content-stock-tag' : '' ?>
                                                content-descuento-tag content-delivery-tag" >
                                                <?php if (isset($row['imagen']) == 1) { ?>
                                                <img src="<?= base_url($row['imagen'][0]); ?>" alt="" class="img-cnt">

                                                <?php } ?>
                                                <?php if( $row['stock'] == 0 ) { ?>
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
                                                <?php if( $row['tipo_descuento'] != 0 && ($row['precio'] !== $row['precio_anterior']) ) {
                                                    $price_desc = $row['precio_anterior']- $row['precio'];
                                                    $porc_desc  = number_format( ( ($price_desc / $row['precio_anterior'])*100) , 2);
                                                    ?>
                                                    
                                                    <div class="tag-descuento">- <?php echo $row['tipo_descuento'] == 2 ? ($porc_desc).'%' : 'S/ '.($price_desc) ?></div>
                                                    <style>
                                                        .content-descuento-tag {
                                                            position: relative;
                                                        }
                                                        .tag-descuento{
                                                            opacity: .7;
                                                            font-size:.8rem;
                                                            padding: 5px 10px;
                                                            border-radius: 0 0 10px 10px;
                                                            background-color: red;
                                                            color: #fff;
                                                            position: absolute;
                                                            top: 5%;
                                                            right: 5%;
                                                            transform: translate(-50%, -50%);
                                                        }
                                                    </style>
                                                <?php } ?>
                                                <?php if( (int)$row['delivery_free'] == 1 ) { ?>
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
                                                            margin-left: 10px;
                                                        }
                                                        .img-delivery {
                                                            
                                                            width: 50%!important;
                                                            height: auto;
                                                        }
                                                        .tag-delivery {

                                                            height: 14%;
                                                            width: 33%;
                                                            display: flex;
                                                            justify-content: flex-start;
                                                            align-items: center;
                                                            opacity: .9;
                                                            font-size:.8rem;
                                                            padding: 4px 12px ;
                                                            border-radius: 16px 0 0 16px;
                                                            background-color: red;
                                                            color: #fff;
                                                            position: absolute;
                                                            top: 10%;
                                                            right: 3%;
                                                        }
                                                        .text-delivery {
                                                                font-size: .64rem !important;
                                                            }
                                                        @media (max-width:480px) {
                                                            .img-delivery {
                                                            padding: 2px;
                                                             }
                                                            .tag-delivery {
                                                                height: 18%!important; 
                                                                width: 45% !important; 
                                                                font-size: .4rem !important;
                                                            }
                                                            .text-delivery {
                                                                font-size: .55rem !important;
                                                            }
                                                            .btnAddCarrito {
                                                                font-size: .7rem !important;
                                                            }
                                                        }
                                                        @media (max-width: 575px) and (min-width: 481px)  {
                                                            .tag-delivery {
                                                                padding: 5px!important;
                                                                height: 17%!important; 
                                                                width: 36% !important; 
                                                            }
                                                            .text-delivery {
                                                                font-size: .6rem !important;
                                                            }
                                                            
                                                        }
                                                        @media (max-width: 991px) and (min-width: 768px)  {
                                                            .tag-delivery {
                                                                height: 15%;
                                                                 width: 26%;
                                                            }
                                                            .text-delivery {
                                                                font-size: .6rem !important;
                                                            }
                                                            
                                                        }
                                                    </style>
                                                <?php } ?>

                                        </div>
                                        <div class="content-title-card">
                                            <h2 class="h2-title font-nexaheavy"><?= $row['titulo']; ?></h2>
                                            <b class="d-block font-nexheavy h2-title "
                                            >
                                                <span class=" <?php echo $row['tipo_descuento'] != 0 && ($row['precio'] !== $row['precio_anterior'])? 'price-throw' : '' ?>"> <?php echo 'S/ '.$row['precio_anterior']; ?></span>
                                                <?php if( (int)$row['tipo_descuento'] !== 0 && ($row['precio'] !== $row['precio_anterior']) ) {?>
                                                    <br>
                                                    <b  style="color: red; font-size:1rem;" class="d-block font-nexheavy ">S/. <?php echo $row['precio'] ?></b>
                                                <?php }?> 
                                            </b>
                                            <div class="btn-vp">
                                            <?php if( $row['stock'] > 0 ) { ?>
                                                <a href=""
                                                    data-title="<?php echo $row['titulo']?>"
                                                    data-currentstock = "<?php echo $row['stock'] ?>"
                                                    data-id="<?php echo $row['id']?>"
                                                    data-precio="<?php echo $row['precio_anterior']?>"
                                                    data-producto_sku="<?php echo $row['producto_sku']?>"
                                                    data-precio_online="<?php echo $row['precio']  ?>"
                                                    data-img="<?= $row['imagen'][0]?>" 
                                                    data-peso="<?= $row['peso'] ?>"
                                                    data-volumen="<?php echo (int)$row['delivery_free']== 0 ? 0 :($row['volumen']) ?>"
                                                    data-cantidad="1"
                                                    data-stock=<?php echo $row['stock'] ?> 
                                                    data-subtotal=<?=  floatval($row['precio']) ?> 
                                                    class="a-btn font-nexaheavy addShop">agregar al carrito</a>
                                            <?php } else { ?>
                                                <a 
                                                    href="<?= base_url($pagina['url'].'/'.$category[0]['url'].'/').$row['prod_url'] ?>"
                                                    class="a-btn font-nexaheavy">ver producto</a>
                                            <?php }?>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>
                            
                            <?php } ?>
                            <!-- End List Products -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php
        include 'src/includes/footer.php'
    ?>


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

                        <div style="display:block;"> <img
                                style="text-align:left;display:inline-block;width:7vh;height:5vh;margin-right:3%;padding-bottom:4%;"
                                src="<?= base_url(); ?>assets/images/precio-online.png">
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
                <a href="<?= base_url(uri_string()) ?>"
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
</div>

   <style>
   .wrapper-cards-products.dtll {
    padding-bottom: 58px;
}
   </style>
</body>

</html>
