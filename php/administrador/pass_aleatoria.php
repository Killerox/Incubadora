<?php

function passwordGenerator()
{
    $alfabeto = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array();
    $tamAlfabeto = strlen($alfabeto) - 1;

    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $tamAlfabeto);
        $pass[] = $alfabeto[$n];
    }
    return implode($pass);
}

function hashPassword($password)
{
  $hash = password_hash($password, PASSWORD_DEFAULT);
  return $hash;
}

function getEnvFromServer()
{
    echo getenv("ANDROID_HOME");
}

//getEnvFromServer();
//echo("password generada: ". passwordGenerator());

?>
