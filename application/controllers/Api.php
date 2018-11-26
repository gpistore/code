<?php
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');


class Api extends REST_Controller {

    public function produto_get(){
        $lcdproduto = $this->get('id');

        $this->load->model("Produto_model");

        if($lcdproduto != NULL){
            $lListaProdutos = $this->Produto_model->buscar($lcdproduto);
        }else{
            $lListaProdutos = $this->Produto_model->listar();
        }

            if($lListaProdutos){
                $this->response($lListaProdutos , REST_Controller::HTTP_OK);
            }else{
                $this->response(array('status' => FALSE,'message' => 'Nenhum produto encontrado'), REST_Controller::HTTP_NOT_FOUND);
            }
    }
}