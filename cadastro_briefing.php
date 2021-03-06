<?php
require "template/header.php";
require "classes/system.php";
require "classes/meli.php";

$system = new Query();

switch ($_POST['step']){
    case '1':
        if($_POST['briefing_id'] > 0){
#            update_passo1
            echo "UPDATE 1";
            $system->updateStep1();
        }
        else{
#            insert_passo1
            echo "INSERT 1";
            $system->insertStep1();
        }
    break;
    case '2':
        if($_POST['briefing_id'] > 0){
#            update_passo2
            echo "UPDATE 3";
            $system->updateStep2();
        }
    break;
    case '3':
        if($_POST['briefing_id'] > 0){
#            update_passo2
            echo "UPDATE 3";
            $system->updateStep3();
        }
    break;
    default:
    break;

}

switch ($_GET['briefing_step']) {
	case '1':
		$wizard1 = '<li class="ch-wizard-current">Step 1</li>';
		$wizard2 = '<li class="ch-wizard-step">Step 2</li>';
		$wizard3 = '<li class="ch-wizard-step">Step 3</li>';
		$style1 = ' style="display: block"';
		$style2 = ' style="display: none"';
		$style3 = ' style="display: none"';
		break;
	case '2':
		$wizard1 = '<li><a href="#1">Step 1</a></li>';
		$wizard2 = '<li class="ch-wizard-current">Step 2</li>';
		$wizard3 = '<li class="ch-wizard-step">Step 3</li>';
		$style1 = ' style="display: none"';
		$style2 = ' style="display: block"';
		$style3 = ' style="display: none"';
		break;
	case '3':
		$wizard1 = '<li><a href="#1">Step 1</a></li>';
		$wizard2 = '<li><a href="#2">Step 2</a></li>';
		$wizard3 = '<li class="ch-wizard-current">Step 3</li>';
		$style1 = ' style="display: none"';
		$style2 = ' style="display: none"';
		$style3 = ' style="display: block"';
		break;

	default:
		$wizard1 = '<li class="ch-wizard-current">Step 1</li>';
		$wizard2 = '<li class="ch-wizard-step">Step 2</li>';
		$wizard3 = '<li class="ch-wizard-step">Step 3</li>';
		$style1 = ' style="display: block"';
		$style2 = ' style="display: none"';
		$style3 = ' style="display: none"';
		break;
}
?>
	<div class="ch-box-lite">
		<h2>Briefing para criação de Campanhas</h2>
		<div class="ch-wizard">
			<ol class="ch-wizard-breadcrumb ch-steps-three">
				<?php echo $wizard1;?>
				<?php echo $wizard2;?>
				<?php echo $wizard3;?>
			</ol>

			<form id="step1" class="ch-form"<?php echo $style1;?> action="cadastro_briefing.php" method="post">
				<div class="ch-box-container">
					<h2>Primeiro passo</h2>
				</div>
				<fieldset>
					<p class="ch-form-row">
						<label for="data_do_briefing">
							Data do briefing:
						</label>
						<input type="text" id="data_do_briefing" name="data_do_briefing" class="myDatePicker" placeholder="DD/MM/YYYY" readonly="true">
					</p>
					<div class="clear"></div>
	  				<div class="ch-form-row ch-form-required">
						<label for="email_executivo_id">
							E-mail Executivo Responsável: <em>*</em>
						</label>
						<select class="required-option" id="email_executivo_id" name="email_executivo_id" required="required" pattern="[^-1]">
							<option value="">Selecione uma opção</option>
							<?php
							$sql = $system->getExecutivos();
							while($executivos = mysql_fetch_object($sql)) {
								echo "<option value='$executivos->id'>$executivos->email</option>";
							}
							?>
						</select>
					</div>
					<div class="ch-list-options ch-form-required radio2 required-option">
						<h4 class="ch-form-subtitle">Tipo de cliente: <em>*</em></h4>
						<ul>
							<li class="ch-form-row">
								<input type="radio" value="1" id="tipo_cliente1" name="tipo_cliente">
								<label for="tipo_cliente1">
									Cliente novo
								</label>
							</li>
							<li class="ch-form-row">
								<input type="radio" value="2" id="tipo_cliente2" name="tipo_cliente">
								<label for="tipo_cliente2">
									Interno (calhau)
								</label>
							</li>

						</ul>
					</div>
					<p class="ch-form-row ch-form-line-two ch-form-required">
						<label for="autocomplete">
							Anunciante: <em>*</em>
						</label>
						<input type="text" class="autoCompleteAnunciantes required" id="autoCompleteAnunciantes" placeholder="Digite o nickname do anunciante" name='anunciante' />
						<input type="hidden" name="anunciante_id" id="anunciante_id" value="">
					</p>
					<p class="ch-form-row ch-form-line-two ch-form-required">
						<label for="autocomplete">
							Agẽncia: <em>*</em>
						</label>
						<input type="text" class="autoCompleteAgencias required" id="autoCompleteAgencias" placeholder="Digite o nome da agencia" name='agencia' />
						<input type="hidden" name="agencia_id" id="agencia_id" value="">
					</p>

					<h5>Contato comercial</h5>
                    <input type="hidden" name="contato_comercial_id" id="contato_comercial_id" value="<?=$contato_comercial_id;?> ">

					<p class="ch-form-row ch-form-line-four ch-form-required">
						<label for="autocomplete">
							Nome completo: <em>*</em>
						</label>
						<input type="text" class="autoCompleteComercial required" id="autoCompleteComercial" placeholder="Digite o nome do contato" name='comercial_contato_first_name' />
					</p>

					<p class="ch-form-row ch-form-line-four ch-form-required">
						<label for="autocomplete">
							Email: <em>*</em>
						</label>
						<input type="text" class="autoCompleteComercialEmail required-email-comercial" id="autoCompleteComercialEmail" placeholder="Digite o nome do contato" name='comercial_contato_email' />
					</p>

					<p class="ch-form-row ch-form-line-four ch-form-required">
						<label for="autocomplete">
							Telefone: <em>*</em>
						</label>
						<input type="text" class="required" placeholder="(11) 99999-9999" name='comercial_contato_telefone' />
					</p>
					<p class="ch-form-row ch-form-line-four ch-form-required">
						<label for="autocomplete">
							Telefone celular:
						</label>
						<input type="text" placeholder="(11) 99999-9999" name='comercial_contato_celular' />
					</p>


					<div class="ch-list-options ch-form-required radio3 required-option">
						<h4 class="ch-form-subtitle">O contato operacional é o mesmo que o Contato comercial? <em>*</em></h4>
						<ul>
							<li class="ch-form-row">
								<input type="radio" value="1" id="mesmoContatoSim" name="mesmo_contato">
								<label for="mesmoContatoSim">
									Sim
								</label>
							</li>
							<li class="ch-form-row">
								<input type="radio" value="0" id="mesmoContatoNao" name="mesmo_contato">
								<label for="mesmoContatoNao">
									Não
								</label>
							</li>
						</ul>
					</div>

                <div id="div_contato_operacional">
					<h5>Contato operacional</h5>
                    <input type="hidden" name="contato_operacional_id" id="contato_operacional_id" value="<?=$contato_operacional_id;?> ">

					<p class="ch-form-row ch-form-line-four ch-form-required">
						<label for="autocomplete">
							Nome completo: <em>*</em>
						</label>
						<input type="text" class="autoCompleteOperacional required" id="autoCompleteOperacional" placeholder="Digite o nome do contato" name='operacional_contato_first_name' />
					</p>

					<p class="ch-form-row ch-form-line-four ch-form-required">
						<label for="autocomplete">
							Email: <em>*</em>
						</label>
						<input type="text" class="autoCompleteOperacionalEmail required-email-operacional" id="autoCompleteOperacionalEmail" placeholder="Digite o nome do contato" name='operacional_contato_email' />
					</p>

					<p class="ch-form-row ch-form-line-four ch-form-required">
						<label for="autocomplete">
							Telefone: <em>*</em>
						</label>
						<input type="text" class="required" placeholder="(11) 99999-9999" name='operacional_contato_telefone' id='operacional_contato_telefone' />
					</p>
					<p class="ch-form-row ch-form-line-four ch-form-required">
						<label for="autocomplete">
							Telefone celular:
						</label>
						<input type="text" placeholder="(11) 99999-9999" name='operacional_contato_celular' id='operacional_contato_celular'/>
					</p>
                </div>

					<p class="ch-form-row ch-form-required">
						<label for="autocomplete">
							Anexar PI (assinado!): <em>*</em>
						</label>
						<input type="file" name='file_pi' class='required-file' />
					</p>

				</fieldset>
				<div class="ch-actions">
    				<input type="hidden" name="action" id="action" value="<?=$action;?>">
				    <input type="hidden" name="briefing_id" id="briefing_id" value="<?=$briefing_id;?>">
				    <input type="hidden" name="step" id="step" value="1">
					<input type='submit' class="ch-btn" value='Próximo' />
					<a href="#">Voltar</a>
				</div>
			</form>

			<form id="step2" class="ch-form"<?php echo $style2;?>>
				<div class="ch-box-container">
					<h2>Segundo passo</h2>
				</div>
				<fieldset>
					<div class="ch-list-options ch-form-required radio2 required-option">
						<h4 class="ch-form-subtitle">Fará parte da campanha:</h4>
						<ul>
							<li class="ch-form-row">
								<input type="checkbox" value="1" id="fara_parte_campanha_ads1" name="fara_parte_campanha_ads">
								<label for="fara_parte_campanha_ads1">
									MercadoAds
								</label>
							</li>
							<li class="ch-form-row">
								<input type="checkbox" value="1" id="fara_parte_campanha_display1" name="fara_parte_campanha_display">
								<label for="fara_parte_campanha_display1">
									Display
								</label>
							</li>

						</ul>
					</div>
					<div class="ch-list-options ch-form-required radio2 required-option">
						<h4 class="ch-form-subtitle">Objetivo da campanha:</h4>
						<ul class='label-igual'>
							<li class="ch-form-row">
								<input type="radio" value="1" id="objetivo_campanha1" name="objetivo_campanha">
								<label for="objetivo_campanha1">
									vendas
								</label>
							</li>
							<li class="ch-form-row">
								<input type="radio" value="2" id="objetivo_campanha2" name="objetivo_campanha">
								<label for="objetivo_campanha2">
									pré-vendas
								</label>
							</li>
							<li class="ch-form-row">
								<input type="radio" value="3" id="objetivo_campanha3" name="objetivo_campanha">
								<label for="objetivo_campanha3">
									leads
								</label>
							</li>
							<li class="ch-form-row">
								<input type="radio" value="4" id="objetivo_campanha4" name="objetivo_campanha">
								<label for="objetivo_campanha4">
									cliques
								</label>
							</li>
							<div class="clear"></div>
							<li class="ch-form-row">
								<input type="radio" value="5" id="objetivo_campanha5" name="objetivo_campanha">
								<label for="objetivo_campanha5">
									CTR%
								</label>
							</li>
							<li class="ch-form-row">
								<input type="radio" value="6" id="objetivo_campanha6" name="objetivo_campanha">
								<label for="objetivo_campanha6">
									lançamento
								</label>
							</li>
							<li class="ch-form-row">
								<input type="radio" value="7" id="objetivo_campanha7" name="objetivo_campanha">
								<label for="objetivo_campanha7">
									promoção
								</label>
							</li>
							<li class="ch-form-row">
								<input type="radio" value="8" id="objetivo_campanha8" name="objetivo_campanha">
								<label for="objetivo_campanha8">
									branding
								</label>
							</li>
						</ul>
					</div>
					<p class="ch-form-row  ch-form-required">
						<label for="autocomplete" style='width: 200px'>
							Dê mais informações sobre a campaha e seus objetivos: <em>*</em>
						</label>
						<textarea name='informacoes_adicionais' cols='60' rows='5'></textarea>
					</p>

				</fieldset>
				<div class="ch-actions">
    				<input type="hidden" name="action" id="action" value="<?=$action;?>">
				    <input type="hidden" name="briefing_id" id="briefing_id" value="<?=$briefing_id;?>">
				    <input type="hidden" name="step" id="step" value="2">
					<input type='submit' class="ch-btn" value='Próximo' />
					<a href="#">Voltar</a>
				</div>
			</form>

			<form id="step3" class="ch-form"<?php echo $style3;?>>
				<div class="ch-box-container">
					<h2>Ultimo passo</h2>
				</div>
				<fieldset>
					<div class="ch-list-options ch-form-required radio2 required-option">
						<h4 class="ch-form-subtitle">Tipo de links patrocinados:</h4>
						<ul>
							<li class="ch-form-row">
								<input type="checkbox" value="1" id="tipo_link1" name="tipo_link">
								<label for="tipo_link1">
									MercadoAds
								</label>
							</li>
							<li class="ch-form-row">
								<input type="checkbox" value="1" id="tipo_link2" name="tipo_link">
								<label for="tipo_link2">
									QCat
								</label>
							</li>

						</ul>
					</div>
					<h5>MercadoAds</h5>


					<p class="ch-form-row ch-form-line-four ch-form-required">
						<label for="autocomplete">
							Valor: <em>*</em>
						</label>
						<input type="text" class="required" id="mads_valor" placeholder="Valor campanha MercadoAds" name='mads_valor' />
					</p>

					<div class="ch-form-row ch-form-line-four ch-form-required required-option">
						<label class="ch-form-subtitle">Periodo determinado:<em>*</em></label>
						<ul>
							<li class="ch-form-row">
								<input type="radio" value="1" id="mads_periodo1" name="mads_periodo">
								<label for="mads_periodo1">
									Sim
								</label>
							</li>
							<li class="ch-form-row">
								<input type="radio" value="0" id="mads_periodo2" name="mads_periodo">
								<label for="mads_periodo2">
									Não
								</label>
							</li>
						</ul>
					</div>
					<div class="ch-form-row ch-form-line-four ch-form-required required-option">
						<label class="ch-form-subtitle">Podemos antecipar consumo:<em>*</em></label>
						<ul>
							<li class="ch-form-row">
								<input type="radio" value="1" id="mads_consumo1" name="mads_consumo">
								<label for="mads_consumo1">
									Sim
								</label>
							</li>
							<li class="ch-form-row">
								<input type="radio" value="0" id="mads_consumo2" name="mads_consumo">
								<label for="mads_consumo2">
									Não
								</label>
							</li>
						</ul>
					</div>
					<div class="ch-form-row ch-form-line-four">
						<label class="">Brand Recognition:</label>
						<ul>
							<li class="ch-form-row">
								<input type="radio" value="1" id="brand_recognition1" name="brand_recognition">
								<label for="brand_recognition1">
									Sim
								</label>
							</li>
							<li class="ch-form-row">
								<input type="radio" value="0" id="brand_recognition2" name="brand_recognition">
								<label for="brand_recognition2">
									Não
								</label>
							</li>
						</ul>
					</div>
					<p class="ch-form-row">
						<label for="mads_inicio">
							Data inicio:
						</label>
						<input type="date" id="mads_inicio" class="myDatePicker" placeholder="DD/MM/YYYY" readonly="true">
					</p>
					<div class="clear"></div>
					<p class="ch-form-row">
						<label for="mads_fim">
							Data fim:
						</label>
						<input type="date" id="mads_fim" class="myDatePicker" placeholder="DD/MM/YYYY" readonly="true">
					</p>
					<h5>QCat</h5>


					<p class="ch-form-row ch-form-line-four ch-form-required">
						<label for="autocomplete">
							Valor: <em>*</em>
						</label>
						<input type="text" class="required" id="qcat_valor" placeholder="Valor campanha MercadoAds" name='qcat_valor' />
					</p>

					<div class="ch-form-row ch-form-line-four ch-form-required required-option">
						<label class="ch-form-subtitle">Periodo determinado:<em>*</em></label>
						<ul>
							<li class="ch-form-row">
								<input type="radio" value="1" id="qcat_periodo1" name="qcat_periodo">
								<label for="qcat_periodo1">
									Sim
								</label>
							</li>
							<li class="ch-form-row">
								<input type="radio" value="0" id="qcat_periodo2" name="qcat_periodo">
								<label for="qcat_periodo2">
									Não
								</label>
							</li>
						</ul>
					</div>
					<div class="ch-form-row ch-form-line-four ch-form-required required-option">
						<label class="ch-form-subtitle">Podemos antecipar consumo:<em>*</em></label>
						<ul>
							<li class="ch-form-row">
								<input type="radio" value="1" id="qcat_consumo1" name="qcat_consumo">
								<label for="qcat_consumo1">
									Sim
								</label>
							</li>
							<li class="ch-form-row">
								<input type="radio" value="0" id="qcat_consumo2" name="qcat_consumo">
								<label for="qcat_consumo2">
									Não
								</label>
							</li>
						</ul>
					</div>
					<p class="ch-form-row">
						<label for="qcat_inicio">
							Data inicio:
						</label>
						<input type="date" id="qcat_inicio" class="myDatePicker" placeholder="DD/MM/YYYY" readonly="true">
					</p>
					<div class="clear"></div>
					<p class="ch-form-row">
						<label for="qcat_fim">
							Data fim:
						</label>
						<input type="date" id="qcat_fim" class="myDatePicker" placeholder="DD/MM/YYYY" readonly="true">
					</p>
					<div class="ch-list-options ch-form-required radio2 required-option">
						<h4 class="ch-form-subtitle">Estimativa da Campanha se mantém a mesma?</h4>
						<ul>
							<li class="ch-form-row">
								<input type="radio" value="1" id="estimativa_campanha1" name="estimativa_campanha">
								<label for="estimativa_campanha1">
									Sim
								</label>
							</li>
							<li class="ch-form-row">
								<input type="radio" value="1" id="estimativa_campanha2" name="estimativa_campanha">
								<label for="estimativa_campanha2">
									Não
								</label>
							</li>

						</ul>
					</div>
					<p class="ch-form-row ch-form-required">
						<label for="autocomplete" style="width: 250px;text-align: left;padding-left:20px">
							Anexar planilha de CPCs p/ MAds e QCat de acordo com a nova estimativa:
						</label>
						<input type="file" name='cpcs_mads_qcat' class='required-file' />
					</p>


					<h5>Display</h5>
					<div class="ch-list-options ch-form-required radio2 required-option">
						<h4 class="ch-form-subtitle">Objetivo da campanha:</h4>
						<ul class='lista-vertical'>
							<li class="ch-form-row">
								<input type="radio" value="1" id="formatos_display_campanha1" name="formatos_display_campanha">
								<label for="formatos_display_campanha1">
									Descontos do Dia (DOD)
								</label>
							</li>
							<li class="ch-form-row">
								<input type="radio" value="2" id="formatos_display_campanha2" name="formatos_display_campanha">
								<label for="formatos_display_campanha2">
									Destaque Home - Estrela
								</label>
							</li>
							<li class="ch-form-row">
								<input type="radio" value="3" id="formatos_display_campanha3" name="formatos_display_campanha">
								<label for="formatos_display_campanha3">
									Mundo
								</label>
							</li>
							<li class="ch-form-row">
								<input type="radio" value="4" id="formatos_display_campanha4" name="formatos_display_campanha">
								<label for="formatos_display_campanha4">
									Super Banner "Meu cadastro"
								</label>
							</li>
							<li class="ch-form-row">
								<input type="radio" value="5" id="formatos_display_campanha5" name="formatos_display_campanha">
								<label for="formatos_display_campanha5">
									180x150 "Meu cadastro" - Vendedores
								</label>
							</li>
							<li class="ch-form-row">
								<input type="radio" value="6" id="formatos_display_campanha6" name="formatos_display_campanha">
								<label for="formatos_display_campanha6">
									Arroba Banner "Home Categorias"
								</label>
							</li>
							<li class="ch-form-row">
								<input type="radio" value="7" id="formatos_display_campanha7" name="formatos_display_campanha">
								<label for="formatos_display_campanha7">
									Arraba Banner e Banner 590x120 - "Home classificados autos"
								</label>
							</li>
							<li class="ch-form-row">
								<input type="radio" value="8" id="formatos_display_campanha8" name="formatos_display_campanha">
								<label for="formatos_display_campanha8">
									Super Banner "Free Vips"
								</label>
							</li>
							<li class="ch-form-row">
								<input type="radio" value="9" id="formatos_display_campanha9" name="formatos_display_campanha">
								<label for="formatos_display_campanha9">
									Arroba Banner "Free Vips"
								</label>
							</li>
							<li class="ch-form-row">
								<input type="radio" value="10" id="formatos_display_campanha10" name="formatos_display_campanha">
								<label for="formatos_display_campanha10">
									Super Banner E-mail Mkt - Base/Segmentada/Vendedores
								</label>
							</li>
							<li class="ch-form-row">
								<input type="radio" value="11" id="formatos_display_campanha11" name="formatos_display_campanha">
								<label for="formatos_display_campanha11">
									Patrocínio Classificados
								</label>
							</li>
							<li class="ch-form-row">
								<input type="radio" value="12" id="formatos_display_campanha12" name="formatos_display_campanha">
								<label for="formatos_display_campanha12">
									Products ADS
								</label>
							</li>
						</ul>
					</div>
					<h5>Desconto do Dia (DOD)</h5>
					<p class="ch-form-row ch-form-required">
						<label for="desconto_do_dia_diarias">
							Diárias: <em>*</em>
						</label>
						<input type="text" id="desconto_do_dia_diarias" class="number required" placeholder="1">
					</p>
					<div class="clear"></div>
					<p class="ch-form-row">
						<label for="data_do_briefing">
							Data inserção:
						</label>
						<input type="text" id="desconto_do_dia_data_insercao" class="myDatePicker" placeholder="DD/MM/YYYY" readonly="true">
					</p>
					<p class="ch-form-row  ch-form-required">
						<label for="autocomplete" style='width: 200px'>
							Especifique as das de inserção dos DODs: <em>*</em>
						</label>
						<textarea name='desconto_do_dia_especifica_datas' cols='60' rows='5' class='required'></textarea>
					</p>
					<h5>Destaque Home - Estrela e Mundo</h5>
					<div class="ch-form-row ch-form-line-four ch-form-required">
						<label for="qcat_fim">
							Data inicio - Estrela: <em>*</em>
						</label>
						<input type="date" id="destaque_home_data_inicio_estrela" class="myDatePicker required" placeholder="DD/MM/YYYY" readonly="true">
					</div>
					<div class="ch-form-row ch-form-line-four ch-form-required">
						<label for="qcat_fim">
							Data fim - Estrela: <em>*</em>
						</label>
						<input type="date" id="destaque_home_data_fim_estrela" class="myDatePicker required" placeholder="DD/MM/YYYY" readonly="true">
					</div>
					<div class="ch-form-row ch-form-line-four ch-form-required">
						<label for="autocomplete" style='width: 140px'>
							Observações - Estrela: <em>*</em>
						</label>
						<textarea name='destaque_home_obs_estrela' cols='50' rows='3'></textarea>
					</div>
					<div class="clear"></div>
					<div class="ch-form-row ch-form-line-four ch-form-required">
						<label for="qcat_fim">
							Data inicio - Mundo: <em>*</em>
						</label>
						<input type="date" id="destaque_home_data_inicio_mundo" class="myDatePicker required" placeholder="DD/MM/YYYY" readonly="true">
					</div>
					<div class="ch-form-row ch-form-line-four ch-form-required">
						<label for="qcat_fim">
							Data fim - Mundo: <em>*</em>
						</label>
						<input type="date" id="destaque_home_data_fim_mundo" class="myDatePicker required" placeholder="DD/MM/YYYY" readonly="true">
					</div>
					<div class="ch-form-row ch-form-line-four ch-form-required">
						<label for="autocomplete" style='width: 140px'>
							Observações - Mundo: <em>*</em>
						</label>
						<textarea name='destaque_home_obs_mundo' cols='50' rows='3'></textarea>
					</div>

					<h5>Super Banner "Meu cadastro"</h5>
					<div class="ch-form-row ch-form-line-four ch-form-required">
						<label for="qcat_fim">
							Qde Impressões: <em>*</em>
						</label>
						<input type="text" name="super_banner_qte_impressoes_mc" class="required number" placeholder="Quantidade (Número)">
					</div>
					<div class="ch-form-row ch-form-line-four ch-form-required">
						<label for="qcat_fim">
							CPM: <em>*</em>
						</label>
						<input type="text" name="super_banner_cpm_mc" class="required real" placeholder="R$">
					</div>
					<div class="ch-form-row ch-form-line-four">
						<label for="qcat_fim">
							Data inicio:
						</label>
						<input type="date" id="super_banner_data_inicio_mc" class="myDatePicker" placeholder="DD/MM/YYYY" readonly="true">
					</div>
					<div class="ch-form-row ch-form-line-four">
						<label for="qcat_fim">
							Data fim:
						</label>
						<input type="date" id="super_banner_data_fim_mc" class="myDatePicker" placeholder="DD/MM/YYYY" readonly="true">
					</div>

					<div class="ch-list-options ch-form-required radio2 required-option">
						<h4 class="ch-form-subtitle">Segmentação Super Banner "Meu cadastro" (selecione as opções que se aplicam):</h4>
						<ul class='label-igual maior'>
							<li class="ch-form-row">
								<input type="radio" value="1" id="super_banner_segmentacao1" name="super_banner_segmentacao">
								<label for="super_banner_segmentacao1">
									Geotargeting
								</label>
							</li>
							<li class="ch-form-row">
								<input type="radio" value="2" id="super_banner_segmentacao2" name="super_banner_segmentacao">
								<label for="super_banner_segmentacao2">
									Perfil Comparadores
								</label>
							</li>
							<li class="ch-form-row">
								<input type="radio" value="3" id="super_banner_segmentacao3" name="super_banner_segmentacao">
								<label for="super_banner_segmentacao3">
									Perfil Vendedores
								</label>
							</li>
							<li class="ch-form-row">
								<input type="radio" value="4" id="super_banner_segmentacao4" name="super_banner_segmentacao">
								<label for="super_banner_segmentacao4">
									Perfil Misto
								</label>
							</li>
							<li class="ch-form-row">
								<input type="radio" value="5" id="super_banner_segmentacao5" name="super_banner_segmentacao">
								<label for="super_banner_segmentacao5">
									Behavioral Targeting (somente autos)
								</label>
							</li>
							<div class="clear"></div>
							<li class="ch-form-row">
								<input type="radio" value="6" id="super_banner_segmentacao6" name="super_banner_segmentacao">
								<label for="super_banner_segmentacao6">
									sem segmentação
								</label>
							</li>
						</ul>
					</div>
					<div class="ch-form-row ch-form-line-four ch-form-required">
						<label for="autocomplete" style='width:280px'>
							Observações - Super Banner "Meu cadastro": <em>*</em>
						</label>
						<textarea name='super_banner_obs' cols='50' rows='3'></textarea>
					</div>


					<h5>180x150 "Meu cadastro" - Vendedores</h5>
					<div class="ch-form-row ch-form-line-four ch-form-required">
						<label for="qcat_fim">
							Qde Impressões: <em>*</em>
						</label>
						<input type="text" name="180150_mc_qte_impressoes" class="required number" placeholder="Quantidade (Número)">
					</div>
					<div class="ch-form-row ch-form-line-four ch-form-required">
						<label for="qcat_fim">
							CPM Retângulo: <em>*</em>
						</label>
						<input type="text" name="180150_mc_cpm_retangulo" class="required real" placeholder="R$">
					</div>
					<div class="ch-form-row ch-form-line-four">
						<label for="qcat_fim">
							Data inicio:
						</label>
						<input type="date" id="180150_mc_data_inicio" class="myDatePicker" placeholder="DD/MM/YYYY" readonly="true">
					</div>
					<div class="ch-form-row ch-form-line-four">
						<label for="qcat_fim">
							Data fim:
						</label>
						<input type="date" id="180150_mc_data_inicio" class="myDatePicker" placeholder="DD/MM/YYYY" readonly="true">
					</div>
					<div class="clear"></div>
					<div class="ch-form-row ch-form-line-four ch-form-required">
						<label for="autocomplete" style='width:330px'>
							Observações - 180x150 "Meu cadastro" - Vendedores: <em>*</em>
						</label>
						<textarea name='180150_mc_obs' cols='50' rows='3'></textarea>
					</div>

					<h5>Arroba Banner "Home Categorias"</h5>
					<div class="ch-list-options ch-form-required radio2">
						<h4 class="ch-form-subtitle">Categorias contratadas para o Arroba Banner:</h4>
						<ul class='label-igual'>
							<?php
							$x = 0;
							$categorias = curl_f('https://api.mercadolibre.com/sites/MLB');
							foreach($categorias->categories as $categoria) {
								?>
								<li class="ch-form-row">
									<input type="checkbox" value="<?php echo $categoria->id;?>" id="arroba_banner_hc_categorias<?php echo $x;?>" name="arroba_banner_hc_categorias">
									<label for="arroba_banner_hc_categorias<?php echo $x;?>" style='width: 300px !important'>
										<?php echo $categoria->name;?>
									</label>
								</li>
								<div class="clear"></div>
								<?php
								$x++;
							}
							?>

						</ul>
					</div>
					<div class="ch-form-row ch-form-line-four ch-form-required">
						<label for="qcat_fim">
							Valor CPM do Patrocínio "HC": <em>*</em>
						</label>
						<input type="text" name="arroba_banner_hc_valor" class="required real" placeholder="R$">
					</div>
					<div class="ch-form-row ch-form-line-four">
						<label for="qcat_fim">
							Data inicio:
						</label>
						<input type="date" id="arroba_banner_hc_data_inicio" class="myDatePicker" placeholder="DD/MM/YYYY" readonly="true">
					</div>
					<div class="ch-form-row ch-form-line-four">
						<label for="qcat_fim">
							Data fim:
						</label>
						<input type="date" id="arroba_banner_hc_data_inicio" class="myDatePicker" placeholder="DD/MM/YYYY" readonly="true">
					</div>
					<div class="clear"></div>
					<div class="ch-form-row ch-form-line-four ch-form-required">
						<label for="autocomplete" style='width:310px'>
							Observações - Arroba Banner "Home Categorias": <em>*</em>
						</label>
						<textarea name='arroba_banner_hc_obs' cols='50' rows='3'></textarea>
					</div>

					<h5>Arroba Banner e Banner 590x120 - "Home Classificados Autos"</h5>
					<div class="ch-form-row ch-form-line-four ch-form-required">
						<label for="qcat_fim">
							Qde Impressões: <em>*</em>
						</label>
						<input type="text" name="arroba_banner_hca_qte_impressoes" class="required number" placeholder="Quantidade (Número)">
					</div>
					<div class="ch-form-row ch-form-line-four ch-form-required">
						<label for="qcat_fim">
							CPM: <em>*</em>
						</label>
						<input type="text" name="arroba_banner_hca_cpm" class="required real" placeholder="R$">
					</div>
					<div class="ch-form-row ch-form-line-four">
						<label for="qcat_fim">
							Data inicio:
						</label>
						<input type="date" id="arroba_banner_hca_data_inicio" class="myDatePicker" placeholder="DD/MM/YYYY" readonly="true">
					</div>
					<div class="ch-form-row ch-form-line-four">
						<label for="qcat_fim">
							Data fim:
						</label>
						<input type="date" id="arroba_banner_hca_data_fim" class="myDatePicker" placeholder="DD/MM/YYYY" readonly="true">
					</div>
					<h5>Super Banner "Free Vips"</h5>
					<div class="ch-form-row ch-form-line-four ch-form-required">
						<label for="qcat_fim">
							Qde Impressões: <em>*</em>
						</label>
						<input type="text" name="super_banner_freevips_qte_impressoes" class="required number" placeholder="Quantidade (Número)">
					</div>
					<div class="ch-form-row ch-form-line-four ch-form-required">
						<label for="qcat_fim">
							CPM: <em>*</em>
						</label>
						<input type="text" name="super_banner_freevips_cpm" class="required real" placeholder="R$">
					</div>
					<div class="ch-form-row ch-form-line-four">
						<label for="qcat_fim">
							Data inicio:
						</label>
						<input type="date" id="super_banner_freevips_data_inicio" class="myDatePicker" placeholder="DD/MM/YYYY" readonly="true">
					</div>
					<div class="ch-form-row ch-form-line-four">
						<label for="qcat_fim">
							Data fim:
						</label>
						<input type="date" id="super_banner_freevips_data_fim" class="myDatePicker" placeholder="DD/MM/YYYY" readonly="true">
					</div>
					<h5>Arroba Banner "Free Vips"</h5>
					<div class="ch-form-row ch-form-line-four ch-form-required">
						<label for="qcat_fim">
							Qde Impressões: <em>*</em>
						</label>
						<input type="text" name="arroba_banner_freevips_qte_impressoes" class="required number" placeholder="Quantidade (Número)">
					</div>
					<div class="ch-form-row ch-form-line-four ch-form-required">
						<label for="qcat_fim">
							CPM: <em>*</em>
						</label>
						<input type="text" name="arroba_banner_freevips_cpm" class="required real" placeholder="R$">
					</div>
					<div class="ch-form-row ch-form-line-four">
						<label for="qcat_fim">
							Data inicio:
						</label>
						<input type="date" id="arroba_banner_freevips_data_inicio" class="myDatePicker" placeholder="DD/MM/YYYY" readonly="true">
					</div>
					<div class="ch-form-row ch-form-line-four">
						<label for="qcat_fim">
							Data fim:
						</label>
						<input type="date" id="arroba_banner_freevips_data_fim" class="myDatePicker" placeholder="DD/MM/YYYY" readonly="true">
					</div>


					<h5>Patrocínio Classificados</h5>
					<div class="ch-form-row ch-form-line-four ch-form-required">
						<label for="qcat_fim">
							Valor do patrocínio: <em>*</em>
						</label>
						<input type="text" name="patrocinio_valor" class="required real" placeholder="R$">
					</div>
					<div class="ch-form-row ch-form-line-four">
						<label for="qcat_fim">
							Data inicio:
						</label>
						<input type="date" id="patrocinio_data_inicio" class="myDatePicker" placeholder="DD/MM/YYYY" readonly="true">
					</div>
					<div class="ch-form-row ch-form-line-four">
						<label for="qcat_fim">
							Data fim:
						</label>
						<input type="date" id="patrocinio_data_fim" class="myDatePicker" placeholder="DD/MM/YYYY" readonly="true">
					</div>






					<h5>Product ADS</h5>
					<div class="ch-form-row ch-form-line-four ch-form-required">
						<label for="qcat_fim">
							CPC: <em>*</em>
						</label>
						<div class="clear"></div>
						<input type="text" name="product_ads_cpc" class="required real" placeholder="R$">
					</div>
					<div class="ch-form-row ch-form-line-four ch-form-required">
						<label for="qcat_fim">
							Budget diário: <em>*</em>
						</label>
						<input type="text" name="product_ads_budget_diario" class="required real" placeholder="R$">
					</div>
					<div class="ch-form-row ch-form-line-four ch-form-required">
						<label for="qcat_fim">
							Valor total: <em>*</em>
						</label>
						<input type="text" name="product_ads_valor_total" class="required real" placeholder="R$">
					</div>
					<div class="clear"></div>
					<div class="ch-form-row ch-form-line-four">
						<label for="qcat_fim">
							Data inicio:
						</label>
						<input type="date" id="product_ads_data_inicio" class="myDatePicker" placeholder="DD/MM/YYYY" readonly="true">
					</div>
					<div class="ch-form-row ch-form-line-four">
						<label for="qcat_fim">
							Data fim:
						</label>
						<input type="date" id="product_ads_data_fim" class="myDatePicker" placeholder="DD/MM/YYYY" readonly="true">
					</div>





					<h5>Patrocínio Super Banner - Email Marketing (DMAC) - Base vendedores</h5>
					<div class="ch-form-row ch-form-line-four ch-form-required">
						<label for="qcat_fim">
							Qde de disparos: <em>*</em>
						</label>
						<input type="text" name="dmac_qte_disparos_base_vendedores" class="required number" placeholder="Quantidade (Número)">
					</div>
					<div class="ch-form-row ch-form-line-four ch-form-required">
						<label for="qcat_fim">
							Valor do disparo: <em>*</em>
						</label>
						<input type="text" name="dmac_valor_base_vendedores" class="required real" placeholder="R$">
					</div>
					<div class="ch-form-row ch-form-line-four">
						<label for="autocomplete">
							Data dos disparos:
						</label>
						<textarea name='dmac_datas_disparos_base_vendedores' cols='50' rows='3'></textarea>
					</div>

					<div class="clear"></div>
					<div class="ch-form-row ch-form-line-four">
						<label for="autocomplete">
							Observações - GERAIS:
						</label>
						<textarea name='outras_informacoes' cols='50' rows='3'></textarea>
					</div>

				</fieldset>

				<div class="ch-actions">
    				<input type="hidden" name="action" id="action" value="<?=$action;?>">
				    <input type="hidden" name="briefing_id" id="briefing_id" value="<?=$briefing_id;?>">
				    <input type="hidden" name="step" id="step" value="3">
					<input type='submit' class="ch-btn" value='Concluir' />
					<a href="#">Voltar</a>
				</div>
			</form>

		</div>
	</div>

	<script src="template/js/jquery.js"></script>
	<script src="template/js/chico-min-0.13.1.js"></script>
	<script type="text/javascript">

		var message = (function (message, value) {

			var messages = {
				'option': 'Escolha uma opção.',
				'requiredCheck': 'Accept the Terms of Use.',
				'link': 'Fill in this information. <a href="#double">Chico UI</a>.'
			};

			return function (message, value) {
				var message = messages[message] || message;
				if(value){
					return message.replace('{#num#}',value)
				}
				return message;
			}

		}());

		$('.required-option').required(message('option'));

		$('.required-file').required(message('Por favor anexe o arquivo'));

		$('.required').required();

		$('.required-email-comercial').required().and().email();
		$('.required-email-operacional').required().and().email();


		$("#mesmoContatoSim").click(function() {
            $("#div_contato_operacional").hide();

            $("#autoCompleteOperacional").attr('disabled','disabled');
            $("#autoCompleteOperacionalEmail").attr('disabled','disabled');
            $("#operacional_contato_telefone").attr('disabled','disabled');
            $("#operacional_contato_celular").attr('disabled','disabled');

        });

        $("#mesmoContatoNao").click(function() {
            $("#div_contato_operacional").show();

            $("#autoCompleteOperacional").removeAttr('disabled');
            $("#autoCompleteOperacionalEmail").removeAttr('disabled');
            $("#operacional_contato_telefone").removeAttr('disabled');
            $("#operacional_contato_celular").removeAttr('disabled');
        });


		var	datePicker = $("#data_do_briefing").datePicker({
			"selected": "2011/11/15",
			"to": "today"
		});
		var	datePicker = $("#mads_inicio").datePicker({
			"selected": "2011/11/15",
			"to": "today"
		});
		var	datePicker = $("#mads_fim").datePicker({
			"selected": "2011/11/15",
			"to": "today"
		});

		var	datePicker = $("#qcat_inicio").datePicker({
			"selected": "2011/11/15",
			"to": "today"
		});

		var	datePicker = $("#qcat_fim").datePicker({
			"selected": "2011/11/15",
			"to": "today"
		});

		var	datePicker = $("#desconto_do_dia_data_insercao").datePicker({
			"selected": "2011/11/15",
			"to": "today"
		});


		var	datePicker = $("#destaque_home_data_inicio_estrela").datePicker({
			"selected": "2011/11/15",
			"to": "today"
		});
		var	datePicker = $("#destaque_home_data_fim_estrela").datePicker({
			"selected": "2011/11/15",
			"to": "today"
		});
		var	datePicker = $("#destaque_home_data_inicio_mundo").datePicker({
			"selected": "2011/11/15",
			"to": "today"
		});
		var	datePicker = $("#destaque_home_data_fim_mundo").datePicker({
			"selected": "2011/11/15",
			"to": "today"
		});
		var	datePicker = $("#super_banner_data_inicio_mc").datePicker({
			"selected": "2011/11/15",
			"to": "today"
		});
		var	datePicker = $("#super_banner_data_fim_mc").datePicker({
			"selected": "2011/11/15",
			"to": "today"
		});
		var	datePicker = $("#180150_mc_data_inicio").datePicker({
			"selected": "2011/11/15",
			"to": "today"
		});
		var	datePicker = $("#180150_mc_data_fim").datePicker({
			"selected": "2011/11/15",
			"to": "today"
		});
		var	datePicker = $("#arroba_banner_hca_data_inicio").datePicker({
			"selected": "2011/11/15",
			"to": "today"
		});
		var	datePicker = $("#arroba_banner_hca_data_fim").datePicker({
			"selected": "2011/11/15",
			"to": "today"
		});

		var	datePicker = $("#super_banner_freevips_data_inicio").datePicker({
			"selected": "2011/11/15",
			"to": "today"
		});
		var	datePicker = $("#super_banner_freevips_data_fim").datePicker({
			"selected": "2011/11/15",
			"to": "today"
		});
		var	datePicker = $("#arroba_banner_freevips_data_inicio").datePicker({
			"selected": "2011/11/15",
			"to": "today"
		});
		var	datePicker = $("#arroba_banner_freevips_data_fim").datePicker({
			"selected": "2011/11/15",
			"to": "today"
		});


		var	datePicker = $("#patrocinio_data_inicio").datePicker({
			"selected": "2011/11/15",
			"to": "today"
		});
		var	datePicker = $("#patrocinio_data_fim").datePicker({
			"selected": "2011/11/15",
			"to": "today"
		});
		var	datePicker = $("#product_ads_data_inicio").datePicker({
			"selected": "2011/11/15",
			"to": "today"
		});
		var	datePicker = $("#product_ads_data_fim").datePicker({
			"selected": "2011/11/15",
			"to": "today"
		});




		// AutoComplete

		function anunciantesComplete(data) {
			autoCompleteAnunciantes.suggest(data);
		}

		var autoCompleteAnunciantes = $(".autoCompleteAnunciantes").autoComplete({
			"url": "anunciantes.php?q=",
			"jsonpCallback": "anunciantesComplete"
		});

		function agenciasComplete(data) {
		    alert(data);
			autoCompleteAgencias.suggest(data);
		}

		var autoCompleteAgencias = $(".autoCompleteAgencias").autoComplete({
			"url": "agencias.php?q=",
			"jsonpCallback": "agenciasComplete"
		});

		function comercialComplete(data) {
			autoCompleteComercial.suggest(data);
		}

		var autoCompleteComercial = $(".autoCompleteComercial").autoComplete({
			"url": "comercial_json.php?q=",
			"jsonpCallback": "comercialComplete"
		});

		function comercialCompleteEmail(data) {
			autoCompleteComercialEmail.suggest(data);
		}

		var autoCompleteComercialEmail = $(".autoCompleteComercialEmail").autoComplete({
			"url": "comercial_email_json.php?q=",
			"jsonpCallback": "comercialCompleteEmail"
		});


		function operacionalComplete(data) {
			autoCompleteOperacional.suggest(data);
		}

		var autoCompleteOperacional = $(".autoCompleteOperacional").autoComplete({
			"url": "operacional_json.php?q=",
			"jsonpCallback": "operacionalComplete"
		});

		function operacionalCompleteEmail(data) {
			autoCompleteOperacionalEmail.suggest(data);
		}

		var autoCompleteOperacionalEmail = $(".autoCompleteOperacionalEmail").autoComplete({
			"url": "operacional_email_json.php?q=",
			"jsonpCallback": "operacionalCompleteEmail"
		});
	</script>
<?php
require "template/footer.php";
?>
