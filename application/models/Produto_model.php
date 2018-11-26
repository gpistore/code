<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Produto_model extends CI_Model {
    // Variável que define o nome da tabela
    var $table = "";

    function __construct()
    {
        parent::__construct();
    }

    function listar(){
        $this->db->where("cod_produto.fgativo !=", '9')
        ->join("cod_categoria", "cod_categoria.cdcategoria=cod_produto.cdcategoria");
        $query = $this->db->get("cod_produto");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }

    function buscar($pid)
    {
        if (is_null($pid)){
            return false;
        }
        $this->db->where("cod_produto.fgativo !=", '9')
            ->where("cdproduto", $pid)
            ->join("cod_categoria", "cod_categoria.cdcategoria=cod_produto.cdcategoria");
        $query = $this->db->get("cod_produto");
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }

    function inserir($pdata) {
        if(!isset($pdata))
            return false;
        return $this->db->insert('cod_produto', $pdata);
    }

    function alterar($pdata) {
        if(!isset($pdata)||is_null($pdata['cdproduto']))
            return false;
        $this->db->where('cdproduto', $pdata['cdproduto']);
        return $this->db->update('cod_produto', $pdata);
    }

    function excluir($pid) {
        if(is_null($pid))
            return false;
        $ldata = array('fgativo'=>'9');
        $this->db->where('cdproduto', $pid);
        return $this->db->update('cod_produto', $ldata);
    }

}