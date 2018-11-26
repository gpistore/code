<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller {

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

        $this->load->model("Categoria_model");
        $lListaCategorias = $this->Categoria_model->listar();

        $lArgs['dados'] = $lListaCategorias;
        $lArgs['view'] = 'categoria/listagem';
        $lArgs['titulo'] = 'Categoria - Listagem';

        $this->load->view('template',$lArgs);
    }

    public function adicionar()
    {
        if ($this->input->post() != NULL) {

            $this->load->model("Categoria_model");
            $this->Categoria_model->inserir($this->input->post());

            $this->session->set_flashdata('sMsgSucesso','Categoria cadastrada com sucesso.');
            redirect(site_url('categoria'), 'refresh');

        }
        $lArgs['titulo'] = 'Adicionar Categoria';
        $lArgs['view'] = 'categoria/cadastro';
        $this->load->view('template',$lArgs);
    }

    public function editar()
    {
        $this->load->model("Categoria_model");
        if ($this->input->post() != NULL) {
            $this->Categoria_model->alterar($this->input->post());
            $this->session->set_flashdata('sMsgSucesso','Categoria editada com sucesso.');
            redirect(site_url('categoria'), 'refresh');
        }
        if($this->uri->segment(3) != NULL) {

            $lCategoria = $this->Categoria_model->buscar($this->uri->segment(3));
            $lArgs['alter'] =$lCategoria;
            $lArgs['view'] = 'categoria/cadastro';
            $lArgs['titulo'] = 'Editar Categoria '.$this->uri->segment(3);
            $this->load->view('template',$lArgs);
        }else{
            $this->session->set_flashdata('sMsgAlerta','Não foi possível editar a categoria');
            redirect(site_url('categoria'), 'refresh');
        }
    }

    public function excluir(){

        if($this->uri->segment(3) != NULL){
            $this->load->model("Categoria_model");
            $this->Categoria_model->excluir($this->uri->segment(3));
            $this->session->set_flashdata('sMsgSucesso','Categoria excluída com sucesso.');
        }else{
            $this->session->set_flashdata('sMsgAlerta','Não foi possível excluír a categoria');
        }
        redirect(site_url('categoria'), 'refresh');
    }
}