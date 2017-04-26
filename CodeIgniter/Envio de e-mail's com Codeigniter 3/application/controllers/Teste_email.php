<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teste_email extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // Usar Profiler
        $this->output->enable_profiler(PROFILER);
    }

    public function index()
    {
        $this->load->helper('email');

        $dados = array(
            'assunto' => 'E-mail de Confirmação',
            'email_destino' => 'claudio.hilario@dominio.pt',
            'nome' => 'Cláudio Hilário',
            'nome_site' => 'Dominio',
            'link_confirmacao' => 'http://www.dominio.pt/activar/[chave_ativacao]',
        );

       var_dump(enviar_email('pt','ativar_utilizador',$dados));
    }

}
