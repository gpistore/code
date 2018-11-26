<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/* Controller de Login */
	public function index(){
        $lArgs = array();
	    if ($this->input->post() != NULL) {
            $lLogin = $this->input->post("txtlogin");
            $lSenha = $this->input->post("txtsenha");
            $this->load->model("login_model");
            $usuario = $this->login_model->validar($lLogin, $lSenha);
            if ($usuario) {
                $this->session->set_userdata("sUsuario", $usuario);
                redirect(site_url('produto'), 'refresh');
            } else {
                $this->session->set_flashdata('sMsgLogin', 'Login ou senha incorretos.');
                redirect(site_url('login'), 'refresh');
            }
        }

        if($this->session->flashdata('sMsgLogin')!=NULL){
            $lArgs['msg'] = $this->session->flashdata('sMsgLogin');
        }
        $this->load->view('login/login', $lArgs);
    }

    public function logout(){
        $this->session->unset_userdata('sUsuario');
        redirect('/login/index', 'refresh');
    }
}
