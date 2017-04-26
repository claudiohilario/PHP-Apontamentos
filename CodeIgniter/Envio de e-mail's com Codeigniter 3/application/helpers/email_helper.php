<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Email Helper
 *
 * @package     GFitness
 * @subpackage  Helpers
 * @category    Helpers
 * @author      Cláudio Hilário <claudio.hilario@ontech.pt>
 *
 */

define('EXT', '.php');
// ------------------------------------------------------------------------

if( ! function_exists('enviar_email'))
{
    /**
     * Enviar Email
     *
     * Permite enviar e-mails em situações como:
     *  - Após o registo de utilizador
     *  - Recuperação de password
     *  - Avisos em determinadas situações
     *
     * @param $idioma Indica o Idioma (pt,en,fr)
     * @param $modelo Indica o template do e-mail
     * @param $dados Indica todos os dados para o envio do e-mail
     *
     * @return bool
     */
    function enviar_email( $idioma, $modelo, $dados )
    {
        //Instância do CodeIgniter
        $CI = & get_instance();

        /* Load da Biblioteca Parse */
        $CI->load->library('parser');

        /* Load da Biblioteca E-mail */
        $CI->load->library('email');

        $CI->email->from('info@dominio.pt','Dominio');
        $CI->email->subject($dados['assunto']);
        $CI->email->to($dados['email_destino']);


        // Exemplo: modelo_email/ativar_conta/ativar_conta_pt
        $view = 'modelo_email/'.$modelo.'/'.$modelo.'_'.$idioma;


        // Se a view não existir
        if (!file_exists(APPPATH.'views/'.$view.EXT))
        {
           return false;
        }

        $mensagem = $CI->parser->parse( $view, $dados, true);

        $CI->email->message($mensagem);
        if($CI->email->send())
        {
            return true;
        }
        else
        {
            return false;
            //return $CI->email->print_debugger();
        }

    }

}