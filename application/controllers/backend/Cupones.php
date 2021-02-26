<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cupones extends MY_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("America/Lima");
        $this->load->model('backend/sistema');
        $this->load->model('frontend/Contenido','ContenidoModel');
        $this->load->helper('general');

        if ($this->session->has_userdata('manager')) {
            $this->manager = $this->session->userdata('manager');
        } else {
            redirect('manager');
        }
    } 
    
    public function index() {
        $user = $this->manager['user']['idperfil']; 
        $data['pags'] = $this->sistema->getPaginas();
        $data['mods'] = $this->sistema->getModulos($user);
        
        $key = null;
        foreach ($data['pags'] as $key => $pag0) {            
            $hijos = $this->sistema->getHijos($pag0['idpagina']);
            if ($hijos) {
                $data['pags'][$key]['hijos'] = $hijos;              
            }
        }
        foreach( $data['mods'] as $modu){
            $modulosjm[]=$modu['idmodulo'];
        }

        $data['modulosjm'] = isset( $modulosjm ) ? $modulosjm : [] ;
        $output = $this->load->view('backend/cupones', $data, TRUE);
        return $this->__output($output);
    }

    private function getCuponProd ( int $id ) {

        $cupon_prod = $this->get('cupon_producto', [ 'id_cupon' => (int) $id ] );

        if(!empty($cupon_prod)) {
             $prod_cupon = $this->get('productos', ['id' => $cupon_prod['id_producto']]);
            $cupon_prod['producto'] = $prod_cupon;
        }
        
        return $cupon_prod;
    }

    public function getCuponAll ()
    {
        $cupones = $this->dbSelect('*','cupon');
        $cupones = array_map(function ( $cupon ) {
            $cupon["detail"] = 
                (int)$cupon['tipo_cupon'] === 1 ? "subtotal"
            : ( (int)$cupon['tipo_cupon'] === 2 ? "subtotal"
            : ( (int)$cupon['tipo_cupon'] === 3 ? "producto":"producto")
            );
            return $cupon;
        }, $cupones ); 
        if($cupones) {
            return $this->output
            ->set_content_type('application/json')
            ->set_output( json_encode( ['data'=> $cupones ] ));          
        }
    }
    
    public function save (){
        $post = $this->input->post();
        
            $data = [
                'cupon_codigo' => $post['cupon']['cupon_codigo'],
                'tipo_cupon'   => (int)$post['cupon']['tipo_cupon'],
                'cupon_precio' => floatval($post['cupon']['cupon_precio']) ,
                'cupon_estado' => (int)$post['cupon']['cupon_estado'],
                'limite' => (int)$post['cupon']['limite'],
                'fecha_caducidad' => $post['cupon']['fecha_caducidad'],
                'fecha_creacion' => date('Y-m-d')
            ];
            $prod = [];
            
            $fecha_actual = strtotime(date("Y-m-d"));
            $fecha_entrada = strtotime($data['fecha_caducidad']);
    
            if($fecha_actual < $fecha_entrada ) {
                if( $data['tipo_cupon'] == 3 || $data['tipo_cupon'] == 4 ) {
        
                    $prod = $this->get('productos' , [ 'titulo' => $post['cupon']['cupon_product']]);
                    
                    if(!$prod || empty($post['cupon']['cupon_product']) ) {
                        $errores[]="nombre";
                        $jm[]="nombre";
                        $error = [
                            "mensaje"=>  "Elija un producto válido de la lista por favor.",
                            "tipo" => 2,
                            "errores"=>json_encode($errores),
                            "jm"=>json_encode($jm)  
                        ]; 
                        echo json_encode($error); 
                    }
                    else {
                       
                        if(empty($post['cupon']['id_cupon']) ){
                            $cuponDB = $this->get('cupon', ['cupon_codigo' => $post['cupon']['cupon_codigo']]);
                       
                            if( $cuponDB ) {
                                $errores[]="código cupon";
                                $jm[]="codigo";
                                $error = [
                                    "mensaje"=>  "Ya existe este código registrado intente con otro.",
                                    "tipo" => 2,
                                    "errores"=>json_encode($errores),
                                    "jm"=>json_encode($jm)  
                                ]; 
                                echo json_encode($error); 
                            }else {
        
                                $this->db->insert('cupon', $data );
                                $id_cupon = $this->db->insert_id();
                                $cupon_prod = [
                                    'id_cupon' => $id_cupon,
                                    'id_producto' => $prod['id']
                                ];
                                $this->db->insert('cupon_producto', $cupon_prod );
                                $cupon_prod_id = $this->db->insert_id();
                                if($cupon_prod_id) echo json_encode([ 
                                    'mensaje' => 'CUPÓN CREADO',
                                    'tipo'    => 1
                                ]);
                    
                            }
                        }else{
                            $this->db->where('id_cupon', (int) $post['cupon']['id_cupon']);
                            $this->db->update('cupon', $data );
                            echo json_encode([ 
                                'mensaje' => 'CUPÓN ACTUALIZADO',
                                'tipo'    => 1
                            ]);
                        }
                        
                        
                    }
                }else {
                    
                    if(empty($post['cupon']['id_cupon']) ){
                        $cuponDB = $this->get('cupon', ['cupon_codigo' => $post['cupon']['cupon_codigo']]);
                       
                            if( $cuponDB ) {
                                $errores[]="código cupon";
                                $jm[]="codigo";
                                $error = [
                                    "mensaje"=>  "Ya existe este código registrado intente con otro.",
                                    "tipo" => 2,
                                    "errores"=>json_encode($errores),
                                    "jm"=>json_encode($jm)  
                                ]; 
                                echo json_encode($error); 
                            }else {

                                $this->db->insert('cupon', $data );
                                $id_cupon = $this->db->insert_id();
                                if($id_cupon) echo json_encode([ 
                                    'mensaje' => 'CUPÓN ACTUALIZADO',
                                    'tipo'    => 1
                                ]);
                                
                            }
            
                    }else{
                        $this->db->where('id_cupon', (int) $post['cupon']['id_cupon']);
                        $this->db->update('cupon', $data );
                        echo json_encode([ 
                            'mensaje' => 'CUPÓN ACTUALIZADO',
                            'tipo'    => 1
                        ]);
                    }
        
                }
            }else {
                $errores[]="fecha_caducidad";
                $jm[]="fecha";
                $error = [
                    "mensaje"=>  "La fecha de caducidad debe de ser mayor a la fecha actual",
                    "tipo" => 2,
                    "errores"=>json_encode($errores),
                    "jm"=>json_encode($jm)  
                ]; 
                echo json_encode($error); 
            }
            
        
       
        
       
    }
    public function edit() {
        $id_cupon = $this->input->post('id_cupon', TRUE);
        $cupon = $this->get('cupon',['id_cupon' => (int)$id_cupon]);
        $cupon_prod = $this->getCuponProd((int)$cupon['id_cupon']);
        $data = array(
            'cupon' => $cupon 
        );
        if($cupon_prod) {
            $data['prod_cupon'] = $cupon_prod;
            
        }

        $output = $this->load->view('backend/popups/edit_cupon', $data, TRUE);
        return $this->__output($output);
        
    }

    public function get_search(string $name='')
	{
        $nameDecoded = urldecode($name);
        $names = explode(' ',$nameDecoded);
		$products = $this->ContenidoModel->search_product_cupon($names);
		
		foreach ($products as $product) {
			echo '<li class="item_prod">';
                echo '<div class="item_prod__container">';
                   echo "<p data-id='".$product['id']."'>".$product['titulo']."</p>"; 
                    echo "<img src='".base_url($product['imagen'])."' width='80'>";
                echo '</div>';
            echo '</li>';
		}

	}
    private function __output($html = NULL) {
        $this->output->set_output($html);
    }

}
