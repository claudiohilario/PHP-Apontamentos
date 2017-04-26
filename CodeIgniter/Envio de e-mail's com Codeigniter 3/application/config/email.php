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