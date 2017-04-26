<?php
/**
 * detetar_idioma_browser
 * Esta função permite detetar o idioma do browser
 * Devolve ex:. pt, br, es etc
 *
 * @return bool|string
 */
function detetar_idioma_browser()
{
        return substr( $_SERVER["HTTP_ACCEPT_LANGUAGE"], 0, 2 );
}

echo '<pre>';
var_dump(detetar_idioma_browser());
echo '</pre>';