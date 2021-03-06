<?php

/**
 * Função retorna a hash da password
 *
 * @param $password Password
 * @return bool|string
 */
function get_hash_password($password)
{
    return password_hash($password, PASSWORD_BCRYPT);
}


/**
 * Função permite verificar se a hash corresponde à password
 *
 * @param $password Password
 * @param $password_hash Password Hash
 * @return bool
 */
function verify_hash_password($password, $password_hash)
{
    return password_verify($password, $password_hash) ? true : false;
}
