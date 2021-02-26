<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Load extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('backend/sistema');
        $this->load->model('backend/mpedidos');
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
        $output = $this->load->view('backend/productos-carga', $data, TRUE);
        return $this->__output($output);
    }
    private function is_headers ( array $headers = []) {
        $_HEADERS = ['id', 'nombre','sku','precio online','precio normal', 'stock'];
        $compare = array_diff($_HEADERS , $headers);
        return empty($compare) ? TRUE : FALSE ;
    }
    public function import () {

        if( is_array($_FILES['files'] ) && count($_FILES['files'] ) >0 ) {
            require_once APPPATH.'third_party/phpExcel/Classes/PHPExcel.php';
            $tempFname = $_FILES['files']['tmp_name'];
          
            $readExcel = PHPExcel_IOFactory::createReaderForFile($tempFname); 
            $obj_excel = $readExcel->load($tempFname);
            $hoja = $obj_excel->getSheet(0);
            $files = $hoja->getHighestRow();
            
            $ID            = $hoja->getCell('A1')->getValue(); 
            $NOMBRE        = $hoja->getCell('B1')->getValue(); 
            $SKU           = $hoja->getCell('C1')->getValue(); 
            $PRECIO_ONLINE = $hoja->getCell('D1')->getValue(); 
            $PRECIO        = $hoja->getCell('E1')->getValue(); 
            $STOCK         = $hoja->getCell('F1')->getValue(); 
            $headers = [$ID,$NOMBRE,$SKU,$PRECIO_ONLINE,$PRECIO,$STOCK];
            $is_headers_error = $this->is_headers($headers);   

            if(! $is_headers_error){
                $resp = [
                    'status' => false,
                    'message' => 'DEBE ENVIAR UN FORMATO VÁLIDO'
                ];
                $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($resp));
                return;
            }
            #INSERTS OR UPDATE
            $resp =[
                'status' => true,
                
            ];
            
            for ($i = 2; $i <= $files ; $i++) {
                $id = $hoja->getCell('A'.$i)->getValue(); 
                if($id !== '' && is_numeric($id)){
                    $prodDB = $this->get('productos', ['id' => (int) $id]);
                    $data = [
                        'id'               => $id ,
                        'titulo'           => $hoja->getCell('B'.$i)->getValue(),
                        'producto_sku'     => $hoja->getCell('C'.$i)->getValue(),
                        'precio'           => $hoja->getCell('D'.$i)->getValue(),
                        'precio_anterior'  => $hoja->getCell('E'.$i)->getValue(),
                        'stock'            => $hoja->getCell('F'.$i)->getValue(),
                        'prod_url'         => $this->string_sanitize($this->seo_url($hoja->getCell('B'.$i)->getValue()))
                    ];
                    if(empty ( $prodDB )) {
                        $data['active'] = 0;
                        $data['categoria_id'] = 3;

                        $this->db->insert('productos', $data );
                        $id_prodDB = $this->db->insert_id();
                        $this->setImagenProducts($id_prodDB);
                        $resp['message'] = 'datos insertados' ;
                    }else {
                        $this->dbUpdate($data , 'productos',['id' => (int) $id]);
                        $resp['message'] = 'datos actualizados' ;
                    }
                } 
            }
            
            $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($resp));
                return;

        }
    } 

    public function products(){
        $products = $this->get('productos');
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output( json_encode( ['data'=> $products ] ));             
    }
    private function setImagenProducts( int $id )
    {
     
        $this->db->insert('imagenes', array('imagen' => 'assets/sources/no-imagen.jpg', 'producto_id'=> $id ));
    }
   
    private function __output($html = NULL) {
        $this->output->set_output($html);
    }
    private function string_sanitize($string, $force_lowercase = true, $anal = false) {

	    $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",

	                   "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",

	                   "â€”", "â€“", ",", "<", ".", ">", "/", "?");

	    $clean = trim(str_replace($strip, "", strip_tags($string)));

	    $clean = preg_replace('/\s+/', "-", $clean);

	    $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;

	    return ($force_lowercase) ?

	        (function_exists('mb_strtolower')) ?

	            mb_strtolower($clean, 'UTF-8') :

	            strtolower($clean) :

	        $clean;

	}
    private function seo_url($cadena){

	    $cadena= utf8_decode($cadena);

	    //$cadena = str_replace(' ', '-', $cadena);

	    $cadena = str_replace('?', '', $cadena);

	    $cadena = str_replace('+', '', $cadena);

	    $cadena = str_replace(':', '', $cadena);

	    $cadena = str_replace('??', '', $cadena);

	    $cadena = str_replace('`', '', $cadena);

	    $cadena = str_replace('!', '', $cadena);

	    $cadena = str_replace('¿', '', $cadena);

	    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ??';

	    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';

	    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);

	   

	    return $cadena;
	}
}
