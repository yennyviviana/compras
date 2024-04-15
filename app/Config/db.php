<?php

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'modulo_compras';


//funcion que nos conecta a mysql
$conexion = mysqli_connect($host,$username,$password) or die('No se conecto a mysql');

//conectar a la base de datos
mysqli_select_db($conexion, $dbname) or die('no se conecto a la base de datos modulo_compras');

//utf8 para todos los simbolos salgan bien
mysqli_set_charset($conexion, 'utf8');

?>