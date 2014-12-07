<?php
//connexió BD del servidor
//mysql_connect("mysql5.000webhost.com","a2639528_xml","xml2014"); // Connexió servidor Mysql 
//mysql_select_db("a2639528_xml"); // Escollim Base de Dades
include "lib/connectar.php";
connectar();


$res=mysql_query("SELECT * FROM pavellons Where coordenades  like '%,%' "   ); // consulta SQL 
 
// Capçalera fitxer XML a generar

$t = '<?xml version="1.0" encoding="utf-8" ?>' .chr(13).chr(10) ;
$t .= '<kml xmlns="http://www.opengis.net/kml/2.2">' . chr(13) . chr(10) ; // etiqueta arrel
$t .= '<Document>' . chr(13) . chr(10) ; // etiqueta Document
$t .= '<name>Lliga ACB </name> ' .  chr(13) . chr(10) ;
$t .= '<description><![CDATA[ Descripció del fitxer ]]></description>' . chr(13) . chr(10) ;
$t .= '<Folder>' . chr(13) . chr(10) ;
$t .= '<name>Pavellons ACB</name>' . chr(13) . chr(10) ;

// A partir de la consulta anirem omplint cada node
for($x=0; $x < mysql_num_rows($res);$x++) // Bucle per recorrer tots els registres
{
$t .= '<Placemark>' . chr(13) . chr(10) ; // Obrim node de cada lloc
$t .= "<styleUrl>#basket</styleUrl> " . chr(13) . chr(10) ; // defineix l'estil de l'icona del lloc 
$t .= '<name>'. utf8_encode(mysql_result($res,$x,"club")) . "</name>" . chr(13) . chr(10) ;
$t .="<description><![CDATA[". utf8_encode(mysql_result($res,$x,"descripcio")) . "]]></description>" . chr(13) . chr(10) ;
$t .= '<Point>';
$t .= '<coordinates>'. utf8_encode(mysql_result($res,$x,"coordenades")) . "</coordinates>" . chr(13) . chr(10) ;
$t .= '</Point>' . chr(13) . chr(10) ;
$t .= '</Placemark>' . chr(13) . chr(10) ;
}
$t .= '</Folder>' . chr(13) . chr(10) ;

// Estil de la icona
$t .= "<Style id='basket'>"  . chr(13) . chr(10) ;
$t .= "<IconStyle>"   . chr(13) . chr(10) ;
$t .= "<scale>1.1</scale>"  . chr(13) . chr(10) ;
$t .= "<Icon>"  . chr(13) . chr(10) ;
$t .= "<href>http://tallerxmlrce.comuf.com/web/images/basket.png</href>"  . chr(13) . chr(10) ;
$t .= "</Icon>"  . chr(13) . chr(10) ;
$t .= "</IconStyle>"  . chr(13) . chr(10) ;
$t .= "</Style>"  . chr(13) . chr(10) ;
$t .= '</Document>' . chr(13) . chr(10) ; // etiqueta Document
$t .= '</kml>';

header("Content-type: text/xml; charset=utf-8"); // Capçalera de fitxer XML
echo $t ;
?>