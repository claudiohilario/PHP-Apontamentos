<?php

/**
 * Carregar Idioma
 *
 * @package     Hooks
 * @author      Cláudio Hilário <claudio.hilario@ontech.pt>
 * @link        http://www.ontech.pt
 */
class Carregar_idioma
{

    /**
     * Variavel coorespondente a instância do Codeigniter
     *
     * @var array
     */
    private $CI;

    /**
     * Variavel com os idiomas suportados
     *
     * @var array
     */
    private $idiomas_suportados = array('pt','en','fr');


    public function __construct()
    {
        $this->CI = &get_instance();

    }


    public function inicializar()
    {


        // Carrega o helper 'language'
        $this->CI->load->helper('language');
        /** Verifica se o primeiro elemento existe no array*/
        $idioma = '';
        if(in_array($this->CI->uri->segment(1),$this->idiomas_suportados)){
            $idioma = $this->CI->uri->segment(1);
        }else{
            //Verificar se o cookie lang está criado
            if(!is_null($this->CI->input->cookie('lang')))
            {
                $idioma = $this->CI->input->cookie('lang');
            }
            else
            {
                // Deteta o idioma do browser
                $idioma = $this->_detetar_idioma_browser();
            }
        }


        switch ($idioma) {
            case 'en':
                $idioma = 'english';
                break;

            default:
                $idioma = 'portugues';
                break;
        }


        $this->CI->lang->load(array(
            'calendar',
            'date',
            'db',
            'email',
            'form_validation',
            'ftp',
            'imglib',
            'migration',
            'number',
            'pagination',
            'profiler',
            'unit_test',
            'upload',
            'teste'
        ), $idioma);

        $this->CI->config->set_item('language', $idioma);

    }

    /**
     * _detetar_idioma_browser
     *
     * Permite detetar qual o idioma do browser
     * @return bool|string
     */
    private function _detetar_idioma_browser()
    {
        return substr($_SERVER["HTTP_ACCEPT_LANGUAGE"], 0, 2);
    }


}