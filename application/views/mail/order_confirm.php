<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equip="X-UA-Compatible" content="ie-dge">
</head>

<body  style="margin: 0 auto ; padding:0;color:#333333;max-width: 720px; padding: 0rem;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size: 15.5px;">
    <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" >
        <!-- HEADER  -->
        <tr align="center" width="95%"> 
            <td align="center" style="padding-top :20px;padding-bottom:20px;margin-bottom:10px">
                <img src="<?php echo 'https://cl.blogingenieria.site/assets/images/logos/logo-beurer.png' ?>" alt="logo-beurer" style="width:180px ; height:auto;display: block;">
            </td>
        </tr>
        <tr>
            <td>
                <table width="95%" height="210" style="margin:auto">
                    <tr>
                        <td align="center" style="padding:0px; position: relative; background-size: 100% 100%;margin: auto;" background="<?php echo 'https://cl.blogingenieria.site/assets/images/group_fondo.png' ?>">
                           
                            <span style="width:100%;font-weight:bold;padding:0px;font-size:45px;position: relative;top:0;left:0px; color: #fff;text-align: left">
                                <span style="display: block;padding: 0 50px;">Gracias por comprar  </span>
                                <span style="display: block; font-weight:bold;font-size: 45px;margin-top:20px;padding: 0 45px;color:#fff;text-decoration:none">en beurer<span style="display: inline;padding: 0;margin:0">.</span>pe</span> 
                            </span>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr align="center">
            <td style="display: block;color:#333333; padding-top:60px;padding-bottom: 18px ;text-align: center;font-size: 24px;">! Confiamos en que te gustará mucho nuestro producto !</td>
        </tr>

        <!-- aquí va el codigo de pedido -->
        <tr>
            <td style="text-align:center;color:#333333;font-weight:bold;padding-top: 30px ;font-size: 20px;">
                <b>Código de pedido</b>
                <b><?php echo $orders['cod_pedido']; ?></b>
                <hr style="height:.1px; background-color: #333333;" width="100%" align="center">
            </td>
        </tr>
        <!-- productos comprados -->
        <tr align="center" width="95%" style="margin:auto"> 
            <td>
                <tr>
                    <td align="center" style="padding:1rem;color:#C51152;font-weight:bold;text-align:center;font-size:20px;">
                        Detalle de tu pedido:
                    </td>
                </tr>
            </td>
            <!-- productos -->
            <td>
                <?php foreach ($orders['productos'] as $key => $value) { ?>
                    <table width=100% style="margin: auto;">
                        <tr>
                            <td width="50%" align="center">
                                <img width="120px" src="<?php echo 'https://cl.blogingenieria.site/'.$value['imagen'] ?>">
                            </td>
                            <td width="50%">
                                <span style="font-weight:bold;display: block; "><?php echo $value['nombre']; ?></span>
                                <span style="display: block; ">sku: <?php echo $value['producto_sku']; ?></span>
                                <span style="display: block; ">cantidad: <?php echo $value['cantidad']; ?></span>
                                <span style="display: block; ">precio : S/. <?php echo $value['precio_online']; ?></span>

                            </td>
                        </tr>
                    </table>
                <?php } ?>
            </td>
        </tr>

        <!-- montos  -->
        <tr>
            <td style="text-align:center;color:#333333;font-weight:bold;padding:16px">
                <table align="right"  style="margin-right: 14px;">
                    <tr>
                        <td align="right" style="padding-right:20px">Subtotal:</td>
                        <td align="left"><?php echo $orders['subtotal']; ?></td>
                    </tr>
                    <tr>
                        <td align="right" style="padding-right:20px">Envío:</td>
                        <td align="left"><?php echo $orders['envio']; ?></td>
                    </tr>
                    <tr>
                        <td align="right" style="padding-right:20px">Descuento:</td>
                        <td align="left"><?php echo $orders['descuento']; ?></td>
                    </tr>
                    <tr>
                        <td align="right" style="padding-right:20px">Total:</td>
                        <td align="left">S/. <?php echo $orders['total']; ?></td>
                    </tr>
                </table>
                <hr style="height:.1px; background-color: #333333;" width="100%" align="center">
            </td>
        </tr>
        <tr>
            <td  style="font-size:20px;text-align:center;color :#C51152;font-weight: bold; padding: 1rem; ">Información de entrega:</td>
         </tr>
        <tr width="100%" style="margin: 30px 0">
            <td>
                <table width="95%" align="center" border="0 " cellpadding="0 " cellspacing="0 ">
                    <tr>
                        <td>
                            <table cellpadding="0 " cellspacing="0 " width="100% ">
                                
                                <tr>
                                    <td style="padding: 5px 16px ">
                                        <b>Método de envío: </b>
                                        <span> <?php echo $orders['recojo']; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:5px 16px; ">
                                        <b>Dirección: </b>
                                        <span> <?php echo $orders['direccion']; ?> </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:5px 16px; ">
                                        <b>Cliente: </b>
                                        <span> <?php echo $orders['comprador']; ?> </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:5px 16px; ">
                                        <b>Correo: </b>
                                        <span  style="text-decoration:none;color:#333333"> <?php echo $orders['correo']; ?> </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:5px 16px; ">
                                        <b>Teléfono: </b>
                                        <span> <?php echo $orders['telefono']; ?> </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:5px 16px; ">
                                        <b><?php echo $orders['tipo_doc']; ?>: </b>
                                        <span> <?php echo $orders['number_doc']; ?> </span>
                                    </td>
                                </tr>
                                <?php if($orders['ruc']){ ?>
                                <tr>
                                    <td style="padding-bottom:5px; padding-top:20px;padding-left:16px;padding-right:16px">
                                        <b>RUC: </b>
                                        <span> <?php echo $orders['ruc']; ?> </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:5px 16px;">
                                        <b>Razon social: </b>
                                        <span> <?php echo $orders['r_social']; ?> </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom:20px; padding-top:5px;padding-left:16px;padding-right:16px">
                                        <b>Domicilio Fiscal: </b>
                                        <span> <?php echo $orders['r_fiscal']; ?> </span>
                                    </td>
                                </tr>
                              <?php }?> 
                                <tr>
                                    <td style="padding:30px 16px;">
                                        <b>Fecha de compra: </b>
                                        <span> <?php echo $orders['pedido_fecha']; ?> </span>
                                    </td>
                                </tr>
                               
                                <tr>
                                    <td style="padding:5px 16px; ">
                                        <b>Tipo de Pago: </b>
                                        <span><?php echo preg_match("/^P/", $orders['cod_pedido']) ? 'Pago Efectivo ': 'Pago con Tarjeta'; ?></span>
                                    </td>
                                </tr>
                                <?php if ($orders['recojo'] == 'Recojo en tienda') {?>
                                <tr>
                                     <td style="padding:5px 16px; padding-bottom:15px">
                                        <b>Para recoger su pedido en Tienda, debe tomar en cuenta las siguientes indicaciones: </b><br><br>
                                        <span>•	Compra realizada antes de las 3:00 pm: Podrá recogerlo al siguiente día hábil.</span><br>
                                        <span>•	Compra realizada después de las 3:00 pm: Podrá recogerlo a partir de dos días hábiles</span>
                                    </td>
                                </tr>       
                                <?php }?>
                            </table>
                        </td>
                    </tr>
     
                    <tr>
                        <td align="left" style="padding-top :20px;padding-bottom:20px;padding-left: 20px;padding-right:20px ; font-size: 10px;font-family:sans-serif; margin-top:20px">
                          
                            <b style="color:#333333;font-size: 10px ; font-weight: bold;">Para tu seguridad y privacidad:</b>
                            <br> Esta dirección de correo fue utilizada para realizar una compra en Beurer. Para dar de baja, cambiar tu dirección de correo o reportar el uso no autorizado de la misma, por favor contáctanos, en caso contrario entenderemos
                            que estás de acuerdo en que nos comuniquemos contigo en esta dirección de correo para cualquier asunto relacionado con tu compra en Beurer. Recuerda que en Beurer nunca te solicitaremos por ningún medio número de tarjeta o
                            claves personales. Por favor, no compartas esta información.
                            <br>
                            <br>
                            <b style="color:#333333; font-weight: bold;">Este mensaje podría contener información confidencial, si tú no eres el destinatario por favor reporta esta situación a los datos de contacto aquí descritos y bórralo sin retener copia alguna.
                            </b>
                        </td>
                    </tr>
                   
                </table>
                <hr style="height:.1px; background-color: #333333;" width="100%" align="center">
            </td>
        </tr>
        <tr width="100%" style="margin: 30px 0">
            <td align="center" style="font-size:20px;width:100%;color:#C51152;font-weight:bold;text-align:center; padding-top:12px">
                Estado de tu pedido:
            </td>
        </tr>
        <tr>
            <td>
                <table cellpadding="0" cellspacing="0" width="68%" align="center" border="0" style="margin:20px auto;color:#333333;padding: 20px;">
                    <tr>
                        <td width="25%">
                            <table cellpadding="0" cellspacing="0" width="100%" width="100%" align="center" border="0">
                                <tr>
                                    <td align="center">
                                        <img src='https://beurer.pe/assets/images/steps/paso1.png' alt="step-1" height="40" style="margin-top: 10px">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <p style="line-height:25px;width:25px;height:25px;color:#fff;font-size:16px;border-radius:50% ;font-weight: bold;background-color:#C51152">
                                            1
                                        </p>
                                    </td>
                                </tr>
                                <tr align="center">
                                    <td style="font-size:10px;font-weight:bold;width: 100%;">Orden generada</td>
                                </tr>
                            </table>
                        </td>
                        <td width="25%">
                            <table cellpadding="0" cellspacing="0" width="100%" width="100%" align="center" border="0">
                                <tr>
                                    <td align="center">
                                        <img src='https://beurer.pe/assets/images/steps/paso2.png' alt="step-2" height="40" style="margin-top: 10px">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <p style="line-height:25px;width:25px;height:25px;color:#fff;font-size:16px;border-radius:50% ;font-weight: bold;background-color:gray">
                                            2
                                        </p>
                                    </td>
                                </tr>
                                <tr align="center">
                                    <td style="font-size:10px;font-weight:bold;width: 100%;">Preparando Pedido</td>
                                </tr>
                            </table>
                        </td>
                        <td width="25%">
                            <table cellpadding="0" cellspacing="0" width="100%" align="center" border="0">
                                <tr>
                                    <td align="center">
                                        <img src='https://beurer.pe/assets/images/steps/paso3.png' alt="step-3" height="40" style="margin-top: 10px">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <p style="line-height:25px;width:25px;height:25px;color:#fff;font-size:16px;border-radius:50% ;font-weight: bold;background-color:gray">
                                            3
                                        </p>
                                    </td>
                                </tr>
                                <tr align="center">
                                    <td style="font-size:10px;font-weight:bold;width: 100%;">
                                        Envío en curso
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td width="25%">
                            <table cellpadding="0" cellspacing="0" width="100%" width="100%" align="center" border="0">
                                <tr>
                                    <td align="center">
                                        <img src='https://beurer.pe/assets/images/steps/paso4.png' alt="step-4" height="40" style="margin-top: 10px">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <p style="line-height:25px;width:25px;height:25px;color:#fff;font-size:16px;border-radius:50% ;font-weight: bold;background-color:gray">
                                            4
                                        </p>
                                    </td>
                                </tr>
                                <tr align="center">
                                    <td style="font-size:10px;font-weight:bold;width: 100%;">Pedido entregado</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <?php include 'tpl/footermail.php'; ?>

    </table>

</body>

</html>


