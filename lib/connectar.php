<?php
function connectar()
{
	mysql_connect("mysql5.000webhost.com","a2639528_xml","xml2014"); // Connexió servidor Mysql
	mysql_select_db("a2639528_xml"); // Escollim Base de Dades
}
function loginar($usuari,$password)
{
	$sql = "SELECT * FROM usuaris WHERE usuari='$usuari' and contrasenya= MD5('$password') ";
	echo $sql ;
	$result = mysql_query($sql);
	if (mysql_num_rows($result) >0)  return 1;
	else return 0 ;

}
function logout()
{
	session_start();
	unset($_SESSION["usuari"]);
	session_unset();
	header('location: index.html?accio=');
}
?>