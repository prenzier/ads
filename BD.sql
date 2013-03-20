CREATE TABLE executivos (
id integer auto_increment not null,
email varchar(255),
PRIMARY KEY(id));

CREATE TABLE anunciantes (
id integer auto_increment not null,
nome varchar(255),
PRIMARY KEY(id));

CREATE TABLE agencias (
id integer auto_increment not null,
nome varchar(255),
PRIMARY KEY(id));

CREATE TABLE contatos (
id integer auto_increment not null,
contato_first_name varchar(200) not null,
contato_last_name varchar(200) not null,
contato_email varchar(255) not null,
contato_telefone varchar(11) not null,
contato_celular varchar(11),
PRIMARY KEY(id));

CREATE TABLE briefing (
id integer auto_increment not null,
created_at datetime not null,
data_do_briefing datetime not null,
email_executivo_id integer not null,
tipo_cliente integer(1) not null,
anunciante_id integer not null,
agencia_id integer not null,
contato_comercial_id integer not null,
contato_operacional_id integer not null,
file_pi varchar(255) not null,
fara_parte_campanha_ads integer not null,
fara_parte_campanha_display integer not null,
objetivo_campanha integer not null,
informacoes_adicionais text,
tipo_link integer,
mads_valor float(10,2),
mads_periodo boolean,
mads_consumo boolean,
brand_recognition boolean,
mads_inicio date,
mads_fim date,
qcat_valor float(10,2),
qcat_periodo boolean,
qcat_consumo boolean,
qcat_inicio date,
qcat_fim date,
estimativa_campanha boolean,
cpcs_mads_qcat varchar(255),


// DISPLAY
formatos_display_campanha integer,

// DESCONTO DO DIA
desconto_do_dia_diarias integer,
desconto_do_dia_data_insercao date,
desconto_do_dia_especifica_datas text,

// DESTAQUE HOME
destaque_home_data_inicio_estrela date,
destaque_home_data_fim_estrela date,
destaque_home_obs_estrela text,
destaque_home_data_inicio_mundo date,
destaque_home_data_fim_mundo date,
destaque_home_obs_mundo text,

// SUPER BANNER
super_banner_qte_impressoes_mc varchar(100),
super_banner_cpm_mc decimal(10,2),
super_banner_data_inicio_mc date,
super_banner_data_fim_mc date,
super_banner_segmentacao varchar(255),
super_banner_obs text,

// 180x180x MC
180150_mc_qte_impressoes varchar(255),
180150_mc_cpm_retangulo float(10,2),
180150_mc_data_inicio date,
180150_mc_data_fim date,
180150_mc_obs text,

// ARROBA BANNER HC (HOME CATEGORIAS)
arroba_banner_hc_categorias varchar(50),
arroba_banner_hc_valor float(10,2),
arroba_banner_hc_data_inicio date,
arroba_banner_hc_data_fim date,
arroba_banner_hc_obs text,

// ARROBA BANNER E BANNER 590_120 HCA (HOME CLASSIFICADOS AUTOS)
arroba_banner_hca_qte_impressoes integer,
arroba_banner_hca_cpm float(10,2),
arroba_banner_hca_data_inicio date,
arroba_banner_hca_data_fim date,

// SUPER BANNER FREE VIPS
super_banner_freevips_qte_impressoes integer,
super_banner_freevips_cpb float(10,2),
super_banner_freevips_data_inicio date,
super_banner_freevips_data_fim date,

// ARROBA BANNER FREE VIPS
arroba_banner_freevips_qte_impressoes integer,
arroba_banner_freevips_cpb float(10,2),
arroba_banner_freevips_data_inicio date,
arroba_banner_freevips_data_fim date,

// Patrocionio classificados
patrocinio_valor float(10,2),
patrocinio_data_inicio date,
patrocinio_data_fim date,

// Product Ads
product_ads_cpc integer,
product_ads_budget_diario float(10,2),
product_ads_valor_total float(10,2),
product_ads_data_inicio date,
product_ads_data_fim date,

// dmac 
dmac_qte_disparos_base_vendedores integer,
dmac_datas_disparos_base_vendedores text,
dmac_valor_base_vendedores float(10,2),

outras_informacoes text,
FOREIGN KEY (email_executivo_id) REFERENCES executivos(id),
FOREIGN KEY (anunciante_id) REFERENCES anunciantes(id),
FOREIGN KEY (agencia_id) REFERENCES agencias(id),
FOREIGN KEY (contato_comercial_id) REFERENCES contatos(id),
FOREIGN KEY (contato_operacional_id) REFERENCES contatos(id),
PRIMARY KEY(id));