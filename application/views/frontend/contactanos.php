<!DOCTYPE html>
<html lang="en">

<?php
    include 'src/includes/header.php'
?>
<style>
    .form__label-content {
        position: relative !important;
    }
    .form__input {
        padding: 10px 20px!important;
    }
</style>
    <main class="main-contact-us">
        <section class="sct-banner-int pos-rel" id="section0">
            <img src="<?php echo base_url($contenido['contacto_img']); ?>" alt="" class="img-cover">
            <div class="container content-title-banner">
                <h1 class="title-banner font-nexaheavy text-uppercase"><?php echo $contenido['titulo_imagen'] ?></h1>
            </div>
        </section>
        <section class="sct-form-contact">
            <div class="container">
                <div class="row animatedParent animateOnce">
                    <div class="col-xs-12 col-md-6 animated fadeInLeftShort">
                        <div class="row">
                            <div class="col-xs-12 col-md-11">
                                <h2 class="title-border text-uppercase font-nexaheavy"><?php echo $contenido['titulo'] ?></h2>
                                <p class="p-internas"><?php echo $contenido['contenido'] ?></p>
                                <div class="wrapper-info-form col-xs-12 px-0">
                                    <div class="row">
                                        <div class="info-form col-xs-6 col-sm-6">
                                            <h3 class="titles-info-form font-nexaheavy">Síguenos:</h3>
                                            <div class="rds-form">
                                                <a href="<?php echo $contenido['face']; ?>" class="icon-rs-form icon-facebook"></a>
                                                <a href="<?php echo $contenido['inst']; ?>" class="icon-rs-form icon-instagram"></a>
                                                <a href="<?php echo $contenido['you']; ?>" class="icon-rs-form icon-youtube"></a>
                                            </div>
                                        </div>
                                        <div class="info-form col-xs-6 col-sm-6">
                                            <h3 class="titles-info-form font-nexaheavy">Correo:</h3>
                                            <a href="#" class="p-internas"><?php echo $contenido['correo']; ?></a>
                                        </div>
                                        <div class="info-form col-xs-6 col-sm-6">
                                            <h3 class="titles-info-form font-nexaheavy">Ubícanos en:</h3>
                                            <p class="p-internas"><?php echo $contenido['direcct']; ?></p>
                                        </div>
                                        <div class="info-form col-xs-6 col-sm-6">
                                            <h3 class="titles-info-form font-nexaheavy">Teléfono:</h3>
                                            <a href="#" class="p-internas"><?php echo $contenido['telef']; ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 animated fadeInRightShort">
                        <form action="form/enviar" class="form row" method="post" id="form-contact-us">
                        <!-- <form action="form/enviar" class="form row" method="post" id="form-contact-us"> -->
                            <div class="col-xs-12">
                                <div class="row">
                                    <div class="form__wrapper col-xs-12">

                                        <label class="">
                                            <span class="form__label-content">Nombres</span>
                                        </label>
                                        <input type="text" class="form__input bg-input" id="name" name="name" placeholder="Ingrese su nombre">
                                        
                                    </div>
                                    <div class="form__wrapper col-xs-12">
                                        <label class="">
                                            <span class="form__label-content">Apellidos</span>
                                        </label>
                                        <input type="text" class="form__input bg-input" id="last-name" name="lastname" placeholder="Ingrese sus apellidos">
                                        <!-- <label class="form__label">
                                            <span class="form__label-content">Apellidos</span>
                                        </label> -->
                                    </div>
                                    <div class="form__wrapper col-xs-12">
                                        <label class="">
                                            <span class="form__label-content">Dirección</span>
                                        </label>
                                        <input type="text" class="form__input bg-input" id="direction" name="direction" placeholder="Ingrese una dirección">
                                       <!--  <label class="form__label">
                                            <span class="form__label-content">Dirección</span>
                                        </label> -->
                                    </div>
                                    <div class="form__wrapper col-xs-12 col-sm-6">
                                        <label class="">
                                            <span class="form__label-content">Teléfono</span>
                                        </label>
                                        <input type="text" class="form__input bg-input" id="phone" name="phone" placeholder="Ingrese n° de teléfono">
                                        <!-- <label class="form__label">
                                            <span class="form__label-content">Teléfono</span>
                                        </label>
 -->                                    </div>
                                    <div class="form__wrapper col-xs-12 col-sm-6">
                                        <label class="">
                                            <span class="form__label-content">Correo</span>
                                        </label>
                                        <input type="email" class="form__input bg-input" id="email" name="email" placeholder="Ingrese correo electrónico">
                                       <!--  <label class="form__label">
                                            <span class="form__label-content">Correo</span>
                                        </label> -->
                                    </div>
                                    <div class="form__wrapper col-xs-12">
                                        <label class="">
                                            <span class="form__label-content">Mensaje</span>
                                        </label>
                                        <textarea class="form__input form_textarea bg-input" id="textarea"
                                            name="textarea" placeholder="Escriba su mensaje"></textarea>
                                        <!-- <label class="form__label">
                                            <span class="form__label-content">Mensaje</span>
                                        </label> -->
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="checkbox">
                                            <label class="font-light label-pol">
                                                <input type="checkbox" name="agree" /><i class="helper"></i><span>He leído y acepto
                                                    las <a href="<?php echo base_url('politicas-de-privacidad'); ?>" class="span-pol color-primary">Políticas de
                                                        Privacidad.</a></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <button style="margin-top:1.2rem;"type="submit" class="font-nexaheavy btn-send"
                                                id="btn-send-form">ENVIAR</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="map-beurer">
                    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1950.4907676532623!2d-76.99343005794609!3d-12.11341581285309!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c7ec37a6d22d%3A0x12293e9ad3f61963!2sAv.%20Caminos%20del%20Inca%20257%2C%20Lima%2015038!5e0!3m2!1ses-419!2spe!4v1579623677859!5m2!1ses-419!2spe" height="500" frameborder="0" style="border:0;" allowfullscreen=""></iframe> -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.5372631136115!2d-74.04980568573681!3d4.676252343172355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNMKwNDAnMzQuNSJOIDc0wrAwMic1MS40Ilc!5e0!3m2!1ses-419!2spe!4v1588784641683!5m2!1ses-419!2spe" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </section>

    </main>
    <?php
        include 'src/includes/footer.php'
    ?>

    <script src="assets/js/libraries/jquery.validate.min.js"></script>
    <script src="assets/js/form.js"></script>


</body>

</html>