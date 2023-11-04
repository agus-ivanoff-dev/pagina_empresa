<?php 
$server = "localhost";
$dbname = "pagina_empresa";
$username = "root"; 
$password = "";

try{
    $conn = new PDO("mysql:host=$server;dbname=$dbname",$username,$password);
    echo "La conexión se realizó correctamente";

}catch(Exception $error){
    echo $error->getMessage();
}

?>