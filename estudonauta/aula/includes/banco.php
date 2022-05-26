<?php
$banco = mysqli_connect('localhost','root','','db_games');

if ($banco->connect_errno)
{
    echo "<h1>Encontrei um erro </h1>";
    die();
}
$busca = $banco->query("select * from genero");
$banco->query("set names 'utf8'");
$banco->query("set character_set_connection='utf8'");
$banco->query("set character_set_client='utf8'");
$banco->query("set character_set_results='utf8'");

?>