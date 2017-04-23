<?php
/**
 * Esta função permite formatar um texto para criar um url amigável
 *
 * @param $string
 * @return mixed|string
 */
function url_amigavel( $string )
{
    $url_amigavel = preg_replace('#\s+#', '-', $string);
    $url_amigavel = strtolower(iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $url_amigavel));
    $url_amigavel = preg_replace('#[^a-z0-9_-]+#', '', $url_amigavel);

    return $url_amigavel;
}