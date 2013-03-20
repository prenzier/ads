<?php
require "template/header.php";
if($_SESSION['site_id']) {
	header('Location: dash.php');
	exit;
}
?>
	<div class="ch-box-lite ch-centerelement">
		<div class="ch-box-information">Sistema interno</div>
		<h2>Autenticação de usuários: </h2>
		<p class='ch-centerelement' style='width: 128px'><a href="https://auth.mercadolibre.com/authorization?response_type=code&client_id=<?php echo CLIENT_ID;?>&redirect_uri=<?php echo REDIRECT_URL;?>" class="ch-btn ch-btn-big">Login MELI</a></p>
	</div>
<?php
require "template/footer.php";
?>