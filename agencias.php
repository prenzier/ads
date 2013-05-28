<?
require_once "classes/conn.php";
$sql = query_("SELECT id, nome FROM agencias");

$jsonp = "agenciasComplete(";
while($agencias = mysql_fetch_object($sql)) {
	$jsonp .= '[ id: "'.$agencias->id.'", nome: "'.$agencias->nome.'"],';
}
$jsonp = rtrim($jsonp, ",");
$jsonp .= ")";
echo $jsonp;


#agenciasComplete(["Akrotiri"])
?>
