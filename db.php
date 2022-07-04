<?php
// http://localhost/module%202/school/index.php?controller=student&action=index
//THONG TIN CSDL
$host = 'localhost' ;
$username = 'root';
$password = '';
$database = 'school' ;

//KẾT NỐI CSDL
global $connect;
$connect = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);



