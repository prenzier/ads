<?php
require "template/header.php";
?>
	<div class="ch-box-lite">
		<?php
		if($_GET['login']) {
			echo "<div class='ch-box-information'>".$msgLogin."</div>";
		}
		?>
		<h2>Briefings</h2>
		<a href='cadastro_briefing.php' class="ch-btn-skin ch-btn-small">Novo</a>
	</div>

<?php
require "template/footer.php";
?>