<?php
try{
$server="localhost";
$link=new pdo("mysql:host=$server;dbname=firstpract","root","");
$link->setAttribute(pdo::ATTR_ERRMODE,pdo::ERRMODE_EXCEPTION);
//echo "success..........";
}catch(pdoexception $e){
    echo "error...".$e->getexception();
}

?>