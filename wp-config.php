<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'bd_suacui');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '/)u+<Wpg{GB*b%b0JKuc$^w[)eIoVuam;Sp)hSP];/S<Ubk:D^W74%-G*#}jSF*Q');
define('SECURE_AUTH_KEY',  'um66$c<XnM,*1HT;_N$uSok%(JqN,)4H?{Eh<O8g?.^S0gZjxhWCtL5MfQOmFJaq');
define('LOGGED_IN_KEY',    'B`1MCC0_#mn-v_C0[Q)Z@YHX.6J0bW:)Pwn/FiHTfO`a,A@~AOn}S>Kr2{]ZDXcs');
define('NONCE_KEY',        'C9n^%~nX|t5O?x ii}Nj.LG$W^jQAWw :~?ES#k8zl)mPVK9l<j^Q--M~_(mznQA');
define('AUTH_SALT',        ' .aEvM; @zAL(ZdQ(08|s~xxQ{&nh4}KFElprO.4WWN8NM}T,db&0OK0EdIVu`My');
define('SECURE_AUTH_SALT', 'UZujh)*iy~DC0}/(U2k)jB~?]3]<V K} wg9t)y.~k+^?tpVj;z-VNblWt9.e6/g');
define('LOGGED_IN_SALT',   '~kmvZc@4^PljNF83rGmnRg%m:q7_kmQy6mWzpp@::~|{!woe1WbBQ[ZKA%S5]3N7');
define('NONCE_SALT',       '(9Ys|Yo0{*yhklf*[Q @:fM/>p_VP?O9/b1S.Mpe??Z_fB#-P=AfDL>b#M&}Ku3I');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';


/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
