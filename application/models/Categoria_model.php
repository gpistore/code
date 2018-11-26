<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Categoria_model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    function listar(){
        $this->db->where("fgativo !=", '9');
        $query = $this->db->get("cod_categoria");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }

    function buscar($pid){
        if (is_null($pid)){
            return false;
        }
        $this->db->where("fgativo !=", '9')
            ->where("cdcategoria", $pid);
        $query = $this->db->get("cod_categoria");
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }

    function inserir($pdata) {
        if(!isset($pdata))
            return false;
        return $this->db->insert('cod_categoria', $pdata);
    }

    function alterar($pdata) {
        if(!isset($pdata)||is_null($pdata['cdcategoria']))
            return false;
        $this->db->where('cdcategoria', $pdata['cdcategoria']);
        return $this->db->update('cod_categoria', $pdata);
    }

    function excluir($pid) {
        if(is_null($pid))
            return false;
        $ldata = array('fgativo'=>'9');
        $this->db->where('cdcategoria', $pid);
        return $this->db->update('cod_categoria', $ldata);
    }


    public function seletor_categoria(){
        $this->db->from('cod_categoria');
        $this->db->where('fgativo', '1');
        $query = $this->db->get();
        foreach($query->result_array() as $row ){
            $array[$row['cdcategoria']] = $row['nmcategoria'];
        }
            return $array;
     }



}