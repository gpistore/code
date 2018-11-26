<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends CI_Controller {

	public function listar()
	{
        if(!$this->session->sUsuario){
            redirect('/login', 'refresh');
        }

        if($this->session->flashdata('sMsgAlerta')!=NULL){
            $lArgs['msgalerta'] = $this->session->flashdata('sMsgAlerta');
        }

        if($this->session->flashdata('sMsgSucesso')!=NULL){
            $lArgs['msgsucesso'] = $this->session->flashdata('sMsgSucesso');
        }

        $this->load->model("Produto_model");
        $lListaProdutos = $this->Produto_model->listar();

        $lArgs['dados'] = $lListaProdutos;
        $lArgs['view'] = 'produto/listagem';
        $lArgs['titulo'] = 'Produtos - Listagem';

        $this->load->view('template',$lArgs);
	}

    public function adicionar(){

        if ($this->input->post() != NULL) {

            $this->load->model("Produto_model");
            $this->Produto_model->inserir($this->input->post());

            $this->session->set_flashdata('sMsgSucesso','Produto cadastrado com sucesso.');
            redirect(site_url('produto'), 'refresh');

        }

        $this->load->model("Categoria_model");
        $lListaCategorias = $this->Categoria_model->seletor_categoria();
        $lArgs['categorias'] = $lListaCategorias;
        $lArgs['titulo'] = 'Adicionar Produto';
        $lArgs['view'] = 'produto/cadastro';
        $this->load->view('template',$lArgs);
     }

    public function editar()
    {
        $this->load->model("Produto_model");
        if ($this->input->post() != NULL) {
            $this->Produto_model->alterar($this->input->post());
            $this->session->set_flashdata('sMsgSucesso','Produto editado com sucesso.');
            redirect(site_url('produto'), 'refresh');
        }
        if($this->uri->segment(3) != NULL) {

            $lProduto = $this->Produto_model->buscar($this->uri->segment(3));
            $lArgs['alter'] =$lProduto;

            $this->load->model("Categoria_model");
            $lListaCategorias = $this->Categoria_model->seletor_categoria();
            $lArgs['categorias'] = $lListaCategorias;

            $lArgs['view'] = 'produto/cadastro';
            $lArgs['titulo'] = 'Editar Produto '.$this->uri->segment(3);
            $this->load->view('template',$lArgs);
        }else{
            $this->session->set_flashdata('sMsgAlerta','Não foi possível editar o Produto');
            redirect(site_url('produto'), 'refresh');
        }
    }

    public function excluir(){

        if($this->uri->segment(3) != NULL){
            $this->load->model("Produto_model");
            $this->Produto_model->excluir($this->uri->segment(3));
            $this->session->set_flashdata('sMsgSucesso','Produto excluído com sucesso.');
        }else{
            $this->session->set_flashdata('sMsgAlerta','Não foi possível excluír o produto');
        }
        redirect(site_url('produto'), 'refresh');

    }

}
