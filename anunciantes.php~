<?
require_once "classes/conn.php";
$sql = query_("SELECT id, nome FROM anunciantes");

$jsonp = "anunciantesComplete(";
while($anunciantes = mysql_fetch_object($sql)) {
	$jsonp .= '["'.$anunciantes->nome.'"],';
}
$jsonp = rtrim($jsonp, ",");
$jsonp .= ")";
echo $jsonp;


#anunciantesComplete(["Azerbaijan"])
?>
