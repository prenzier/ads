<?php
class Query {
	public function getExecutivos() {
		return query_("SELECT * FROM executivos");
	}
	public function insertFormStep1(){
        return true;
	}

	public function insertStep1(){
	    print_r ($_POST);

#[tipo_cliente] => 1
#[anunciante] => Akrotiri
#[comercial_contato_first_name] => Comercial
#[comercial_contato_email] => bruno@elia.com.br
#[comercial_contato_telefone] => 1233456789
#[comercial_contato_celular] => 123456789
#[mesmo_contato] => 1
#[file_pi] => adv_MLB.jpg

#id
#created_at
#data_do_briefing
#email_executivo_id
#tipo_cliente
#anunciante_id
#agencia_id
#contato_comercial_id
#contato_operacional_id
#file_pi

#[action] =>
#[briefing_id] =>
#[step] => 1 )


    $contato_id = insertContato(array("first_email" => $_POST['comercial_contato_first_name'],"email" => $_POST['comercial_contato_email'],"telefone" => $_POST['comercial_contato_telefone'],"celular" => $_POST['comercial_contato_celular']));


#ULTIMA PARTE
        $insert  = "INSERT INTO briefing SET ";
        $insert .= "created_at = NOW() ";
        $insert .= "data_do_briefing = '".$_POST['data_do_briefing']."' ";
        $insert .= "email_executivo_id = '".$_POST['email_executivo_id']."' ";
        $insert .= "tipo_cliente = '".$_POST['tipo_cliente']."' ";
        $insert .= "anunciante_id = '".$_POST['anunciante']."' ";
        $insert .= "agencia_id = '".$_POST['agencia']."' ";
        $insert .= "contato_comercial_id = '".$_POST['']."' ";
        $insert .= "contato_operacional_id = '".$_POST['']."' ";
        $insert .= "file_pi = '".$_POST['file_pi']."' ";
#	    query_("INSERT INTO briefing SET data_do_briefing = .");

        return true;
	}
	public function updateStep1(){
    	print_r ($_POST);
        return true;
	}
	public function updateStep2(){
    	print_r ($_POST);
        return true;
	}
	public function updateStep3(){
    	print_r ($_POST);
        return true;
	}

	public function insertContato($contato){

	    $sql  = "INSERT INTO contatos SET ";
	    $sql .= " contato_comercial_first_name = ".$contato['first_name'];
	    $sql .= " contato_comercial_email = ".$contato['email'];
	    $sql .= " contato_comercial_telefone = ".$contato['telefone'];
	    $sql .= " contato_comercial_celular = ".$contato['celular'];

	    $result = query_($sql);

	    print_r($result);

	    return mysql_insert_id();
	}

	public function updateContato($contato){

	    $sql  = "UPDATE contatos SET ";
	    $sql .= " contato_comercial_first_name = ".$contato['first_name'];
	    $sql .= " contato_comercial_email = ".$contato['email'];
	    $sql .= " contato_comercial_telefone = ".$contato['telefone'];
	    $sql .= " contato_comercial_celular = ".$contato['celular'];
	    $sql .= " WHERE id = ".$contato['id'];

        if($contato['id'] && $contato['first_name'] && $contato['email']){

            $result = query_($sql);

            print_r($result);

            return true;
        }
	    return false;
	}

}
?>
