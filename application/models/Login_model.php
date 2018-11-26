<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model
{
    /**
     * Método Construtor
     */
    function __construct()
    {
        parent::__construct();
    }

    function validar($pLogin, $pSenha){
        $this->db->where("nmlogin", $pLogin);
        $this->db->where("nmsenha", md5($pSenha));
        $this->db->where("fgativo", '1');
        //var_dump($this->db);
        $lUsuario = $this->db->get("cod_usuario")->row_array();
        return $lUsuario;
    }


}
