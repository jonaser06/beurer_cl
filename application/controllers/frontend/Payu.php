<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Payu extends MY_Controller
{
    public function __construct()
	{
        parent::__construct();
       
    }
    function index(){

          
        // $mensajeLog = '';
        // $mensajeLog .= print_r($_POST,true) . "\r\n";
        // if(strlen($mensajeLog)>0){
        //     $filename = "payu_log.txt";
        //     $fp = @fopen($filename, "a");
        //     if($fp) {
        //         fwrite($fp, $mensajeLog, strlen($mensajeLog));
        //         fclose($fp);
        //     }
        //     return ;
        // }
        $resp = [
            'status'  => false,
            'code'    => 404,
            'message' => 'Metodo POST requerido',
        ];
        if(isset( $_GET['payu']) && $_GET['payu'] === 'true'){ 

                $id_productos = explode('-',$this->input->post('extra1'));
                $cantidades   = explode('-',$this->input->get('cantidades'));
                $subtotales   = explode('-',$this->input->get('subtotales'));
                $colores      = explode('-', $this->input->get('xratioColors'));
                $skus         = explode('-', $this->input->get('skus'));
                date_default_timezone_set("America/Lima");          
                  $data =[ 
                             'id_cliente' => $this->input->get('session'),
                             'codigo'   => $this->input->get('reference_sale'),
                             'nombres'   => $this->input->get('nombres'),
                             'apellidos' => $this->input->get('apellidos'),
                             'correo'    => $this->input->post('email_buyer'),
                             'telefono'    => $this->input->get('telefono'),
                             'tipo_documento'=> $this->input->get('tipo_documento'),
                             'numero_documento'=> $this->input->get('numero_documento'),
                             'provincia'=> $this->input->get('provincia'),
                             'distrito'=> $this->input->get('billing_city'),
                             'dir_envio'=> $this->input->post('shipping_address'),
                             'referencia'=> $this->input->get('referencia'),
                             'cupon_codigo'=> $this->input->get('cupon_codigo'),
                             'cupon_descuento'=> $this->input->get('cupon_descuento'),
                             'entrega_precio'=> floatval($this->input->get('entrega_precio')),
                             'productos_precio'=> floatval($this->input->post('value'))-floatval($this->input->get('entrega_precio')),
                             'pedido_fecha'=> date('y-m-d'),
                             'pedido_estado'=> 1 ,
                             'recojo'=> $this->input->get('d_envio') == 'recoger en tienda' ? 1 : 0
                        
                ];
    
                if($this->input->get('dest_nombres')) {
                    $data["dest_nombres"]    = $this->input->get('dest_nombres');
                    $data["dest_telefono"]   = $this->input->get('dest_telefono');
                    $data["dest_tipo_doc"]   = $this->input->get('dest_tipo_doc');
                    $data["dest_number_doc"] = $this->input->get('dest_number_doc');
                  };
                if($this->input->get('ruc')) {
                    $data["ruc"]    = $this->input->get('ruc');
                    $data["r_social"]  = $this->input->get('r_social');
                    $data["r_fiscal"]   = $this->input->get('r_fiscal');
                };
    
                $id_pedido = $this->savePedido($data);
                $pedido_estado = [
                    'id_pedido'        => $id_pedido,
                    'id_estado_pedido' => 1,
                    'observacion'      => 'pedido solicitado',
                    'fecha_estado'     => date('y-m-d')
                ];
                $this->dbInsert('pedido_estado',$pedido_estado);
    
                if($id_pedido) {
                    for ( $i = 0 ; $i < count($id_productos) ; $i++ ){
                        $datos = [
                            'id_pedido'   => (int)$id_pedido,
                            'id_producto' => (int)$id_productos[$i],
                            'producto_sku' => $skus[$i],
                            'cantidad'    => (int)$cantidades[$i],
                            'subtotal_precio' => $subtotales[$i],
                        ];
                        $response = $this->dbInsert('pedido_detalle',$datos);
                        
                        if($response){
                            // actualizo los detalles por producto : stock y si tiene un color actualizamos color y stock
                            
                            $productoDB = $this->get('productos',['id'=> (int) $id_productos[$i]]);
                            $stock = (int)$productoDB['stock'] - (int) $cantidades[$i];
                            #start colrs update
                            $color = $colores[$i];
                            if($color != 'none'){
                            $detalles = json_decode($productoDB['detalles-multimedia'],TRUE);
                            $detallesUpdate = [];
                            foreach($detalles as $detalle):
                                $stock_prod = (int)$detalle['stock'];
                                $detalle['stock'] = $detalle['color'] == $color ? ($stock_prod - (int) $cantidades[$i]): $stock_prod;
                                array_push($detallesUpdate , $detalle );
                            endforeach;
                            $this->dbUpdate(['detalles-multimedia' => json_encode($detallesUpdate) ],'productos',['id' => (int) $id_productos[$i]]);
                            }
    
                            #end colors update
                            $this->dbUpdate(['stock' => $stock ],'productos',['id' => (int) $id_productos[$i]]);
                            
                        }else{
                            $this->resp = [
                                'message' => 'error al guardar dato de pedido detalle'
                            ];
                            $this->output
                             ->set_content_type('application/json')
                             ->set_status_header(404)
                             ->set_output(json_encode($this->resp));
                             return;
                            }
                        };                        
                        echo '<script>
                            localStorage.setItem("id_pedido",'.$id_pedido.');
                           </script>';
                           
                    }else {
                    $resp = [
                        'status'  => false,
                        'code'    => 500 ,
                        'message' => 'Hubo problemas al almacenar los datos.',
                        'data'    => [
                            'pedido'       => false,
                            'state_pedido' => 0
                        ]
                    ];
                    $this->output
                        ->set_content_type('application/json')
                        ->set_status_header(500)
                        ->set_output(json_encode($resp));
                    return;
                }
                
          }else {
            $this->output
            ->set_content_type('application/json')
            ->set_status_header(404)
            ->set_output(json_encode($resp));
          }
        
    }
}