<?php
include_once "lib/connectar.php";
connectar();
$sql = "SELECT equip_local,punts_local,equip_visitant,punts_visitant FROM calendari where jornada=24";
$res = mysql_query($sql);

$t  ='<table border="1" width="500"> ';
$t .='<caption><h2 class="title"> Jornada 24 </h2><br /><p class="byline"><small>Posted on December, 2014 by Robert</small></p></caption>';
$t .='<tbody>';
$t .='<th class="normal">Equip Local</th>';
$t .='<th class="petit"></th>';
$t .='<th class="normal">Equip Visitant</th> ';
$t .='<th class="petit"></th>';
$t .='</tbody>';

for($x=0; $x < mysql_num_rows($res);$x++)
{
$t .='<tr>';
for ($y=0; $y < mysql_num_fields($res);$y++)
{
$t .= '<td>'.mysql_result($res,$x,$y).'</td>';
} 
$t .= '</tr>' ;
}

$t .='</table>';
echo $t ;
?>