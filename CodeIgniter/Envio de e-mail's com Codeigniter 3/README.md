## Envio de e-mail's com Codeigniter 3

Este é um exemplo de envio de e-mails através do Codeigniter 3. Neste caso criei o Helper e-mail que tem como parâmetros de entrada:
- Idioma - Onde indica o idioma Ex. pt, fr, es etc
- Modelo - Onde indica o nome do modelo do e-mail
- Dados  - Passa um array com os dados obrigatórios (assunto e email_destino) e outros dados específicos consoante o modelo para serem mostrados

Configuração de e-mail - /config/email.php

```php
<?php

/**
 * Configuração de e-mail
 */

$config['smtp_host'] = 'ssl://mail.dominio.pt';
$config['smtp_port'] = 465;
$config['smtp_user'] = 'info@dominio.pt';
$config['smtp_pass'] = '******';
$config['protocol']  = 'smtp';
$config['validate']  = TRUE;
$config['mailtype']  = 'html';
$config['charset']   = 'utf-8';
$config['newline']   = "\r\n";
```

Helper - /helpers/email_helper.php
```php
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
```

Controller Teste - /controller/Teste_email.php
```php
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
            'email_destino' => 'claudio.hilario@live.com.pt',
            'nome' => 'Cláudio Hilário',
            'nome_site' => 'Dominio',
            'link_confirmacao' => 'http://www.dominio.pt/activar/[chave_ativacao]',
        );

       var_dump(enviar_email('pt','ativar_utilizador',$dados));
    }

}

```




