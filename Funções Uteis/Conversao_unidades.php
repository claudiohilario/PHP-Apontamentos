<?php

/**
 * Class Conversao_unidades
 * Class responsável por converter todas as unidades
 *
 *
 * @package     Helper
 * @author      Cláudio Hilário <claudio.hilario@ontech.pt>
 * @version     v.0.1 (25/04/2017)
 * @copyright   Copyright (c) 2017, Cláudio
 */


class Conversao_unidades{

    /**
     * Permite converter o peso, disponível para as seguintes unidades:
     *  'kg'  => Quilogramas
     *  'lbs' => Libras
     *  'st'  => Pedras
     *
     *
     * @version 1.0                     (25/04/2017)
     *
     * @param $valor                    Valor a ser convertido
     * @param $unidade_de               Unidades de
     * @param string $unidade_para      Unidades para
     * @param int $precisao             Precisão
     * @return array|mixed
     */
    public static function converter_peso($valor, $unidade_de, $unidade_para = 'all', $precisao = 4)
    {

        switch ($unidade_de)
        {
            case 'kg':
                break;
            case 'lbs':
                $valor = $valor * 0.45359237;
                break;
            case 'st':
                $valor = $valor * 6.35029318;
                break;
        }

        $conversao = array(
            'kg' =>   round($valor, $precisao),
            'lbs' => round($valor / 0.45359237,$precisao),
            'st' => round($valor / 6.35029318,$precisao)
        );

        switch ($unidade_para)
        {
            case 'all':
                return $conversao;
                break;
            case 'kg':
                return $conversao['kg'];
                break;
            case 'lbs':
                return $conversao['lbs'];
                break;
            case 'st':
                return $conversao['st'];
                break;

        }

    }


    /**
     * Permite converter a distância, disponível para as seguintes unidades:
     *  'km'  => Quilómetros
     *  'mi'  => Milhas
     *
     *
     * @version 1.0                     (25/04/2017)
     *
     * @param $valor                    Valor a ser convertido
     * @param $unidade_de               Unidades de
     * @param string $unidade_para      Unidades para
     * @param int $precisao             Precisão
     * @return array|mixed
     */
    public static function converter_distancia($valor, $unidade_de, $unidade_para = 'all', $precisao = 4){


        switch ($unidade_de)
        {
            case 'km':
                break;
            case 'mi':
                $valor = $valor * 1.6093439364;
                break;
        }

        $conversao = array(
            'km' =>   round($valor, $precisao),
            'mi' => round($valor * 0.6213712168,$precisao)
        );

        switch ($unidade_para)
        {
            case 'all':
                return $conversao;
                break;
            case 'km':
                return $conversao['km'];
                break;
            case 'mi':
                return $conversao['mi'];
                break;

        }

    }


    /**
     * Permite converter as Calorias, disponível para as seguintes unidades:
     *  'kcal'  => Quilocalorias
     *  'kj'    => Quilojoules
     *
     *
     * @version 1.0                     (25/04/2017)
     *
     * @param $valor                    Valor a ser convertido
     * @param $unidade_de               Unidades de
     * @param string $unidade_para      Unidades para
     * @param int $precisao             Precisão
     * @return array|mixed
     */
    public static function converter_calorias($valor, $unidade_de, $unidade_para = 'all', $precisao = 4){
        switch ($unidade_de)
        {
            case 'kcal':
                break;
            case 'kj':
                $valor = $valor / 4.184;
                break;
        }

        $conversao = array(
            'kcal' =>   round($valor, $precisao),
            'kj' => round($valor * 4.184,$precisao)
        );

        switch ($unidade_para)
        {
            case 'all':
                return $conversao;
                break;
            case 'kcal':
                return $conversao['kcal'];
                break;
            case 'kj':
                return $conversao['kj'];
                break;

        }

    }


    /**
     * Permite converter a Altura, disponível para as seguintes unidades:
     *  'm'     => Matros
     *  'cm'    => Centímetros
     *  'pol'   => Polegadas
     *
     *
     * @version 1.0                     (25/04/2017)
     *
     * @param $valor                    Valor a ser convertido
     * @param $unidade_de               Unidades de
     * @param string $unidade_para      Unidades para
     * @param int $precisao             Precisão
     * @return array|mixed
     */
    public static function converter_altura($valor, $unidade_de, $unidade_para = 'all', $precisao = 4){

        switch ($unidade_de)
        {
            case 'cm':
                break;
            case 'm':
                $valor = $valor * 100;
                break;
            case 'pol':
                $valor = $valor * 2.54;
                break;
        }

        $conversao = array(
            'cm' =>   round($valor, $precisao),
            'm' => round($valor / 100, $precisao),
            'pol' => round($valor / 2.54, $precisao)
        );

        switch ($unidade_para)
        {
            case 'all':
                return $conversao;
                break;
            case 'cm':
                return $conversao['cm'];
                break;
            case 'm':
                return $conversao['m'];
                break;
            case 'pol':
                return $conversao['pol'];
                break;

        }

    }

}

echo '<pre>';
var_dump(Conversao_unidades::converter_distancia(6, 'mi', 'km'));
echo '</pre>';