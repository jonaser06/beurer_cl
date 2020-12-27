<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Novedades extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('backend/sistema');
        $this->load->model('backend/mnovedades');
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
        $output = $this->load->view('backend/novedades', $data, TRUE);
        return $this->__output($output);
    }
    public function getNovedades(){
        $this->db->select('nombres ,apellidos ,correo ,id_session, COUNT(correo) as checked');
        $this->db->group_by([ 'correo','id_session','nombres','apellidos']);
        $result = $this->db->get('clientes_ofertas')->result_array();
        
        // var_dump($result);exit();
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output( json_encode( ['data'=> $result ] ));             
    }
    
    
    private function __output($html = NULL) {
        $this->output->set_output($html);
    }

}