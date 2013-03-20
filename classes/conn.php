<?php
require_once 'cfg/bs.php';
session_start('adv_login');

if(!file_exists('lang/'.$_SESSION['site_id'].'.php')) {
	require_once 'lang/MLB.php';
} else {
	require_once 'lang/'.$_SESSION['site_id'].'.php';
}

class Connection {
	var $query;
	var $link;

	
	public function Conecta($type_query) {
		if(!$this->link) {
			$this->link = mysql_connect(BD_HOST, BD_USER, BD_PASS) or die(mysql_error());
		}

		mysql_select_db(BD_BS, $this->link);
	}

	public function Desconecta()	{
		return mysql_close($this->link);
	}
	public function Query($query) {
		global $loja_id;

		$type_query = explode(' ', $query);
		$type_query = $type_query[0];
		$type_query = strtolower($type_query);

		$this->Conecta($type_query);
		
		$this->query = $query;

		if ($resultado = mysql_query($this->query, $this->link) or die(mysql_error())) {
			return $resultado;
		} else {
			return 0;
		}
	}
}

is_object($ObjConn);

function query_($query) {
	global $ObjConn;
	if(!$ObjConn) {
		$ObjConn = new Connection();
	}
    $sql = $ObjConn->Query($query);
    return $sql;
}
?>
