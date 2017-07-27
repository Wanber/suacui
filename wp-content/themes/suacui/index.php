<!DOCTYPE html>
<!--[if IE 7]><html id="ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html id="ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />

	<link href='http://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="wp-content/themes/suacui/bootstrap.min.css">

	<script src="wp-content/themes/suacui/js/jquery.min.js"></script>
	<script src="wp-content/themes/suacui/js/bootstrap.min.js"></script>

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>

<?php
function PegarMeioStr($in, $fim, $str)
{
    @$ex = explode($in, $str);
    @$ex2 = explode($fim, $ex[1]);
    return $ex2[0];
}
if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['mensagem'])) {

    $admin_email = "";

    query_posts('showposts=1&category_name=email');
    while (have_posts()) : the_post();
        $admin_email = get_the_content();
    endwhile;

    $nome = trim(@$_POST['nome']);
    $email = trim(@$_POST['email']);
    $mensagem = trim(@$_POST['mensagem']);
    $headers = 'From: '.$nome.' <'.$email.'>' . "\r\n";
    if(wp_mail($admin_email, 'Contato via Web', $mensagem, $headers)) {
        echo '
            <script>
                $(function() {
                    $("#myModalLabel").html("Contato");
                    $("#myModalText").html("Mensagem enviada!");
                    $("#btn-modal").trigger("click");
                });
            </script>

        ';
    } else {
        echo '
            <script>
                $(function() {
                    $("#myModalLabel").html("Contato");
                    $("#myModalText").html("Não foi possível enviar a mensagem.");
                    $("#btn-modal").trigger("click");
                });
            </script>

        ';
    }
}
?>

	<div id="wrap" class="wrap"><!--amarra o site-->

		<!--cabecalho so site, menu e logo-->
		<header class="cabecalho">

			<div class="content-header">
				<a href="#wrap"><img src="wp-content/themes/suacui/img/logo.png" class="logo" />
					<h1 class="nome-logo">Farmácia Suaçui</h1></a>

				<nav class="menu">
					<ul>
						<li><a href="#sobre">SOBRE NOS</a></li>
						<li><a href="#produtos">PRODUTOS</a></li>
						<li><a href="#vantagens">VANTAGENS</a></li>
						<li><a href="#contato" class="contact">CONTATO</a></li>
					</ul>
				</nav>
			</div>

		</header>

        <div class="slider">

			<?php echo do_shortcode("[huge_it_slider id='1']"); ?>

		</div>


		<!--comeca section sobre a empresa, historia e pilares-->
		<a name="sobre"></a>
		<section class="sobre">
            <?php query_posts('showposts=1&category_name=quem-somos');
            while (have_posts()) : the_post(); ?>
			<h1 class="title-section"><?php echo get_the_title(); ?></h1>

			<div class="content-geral">

				<p class="content-sobre">
				<?php echo get_the_content(); ?>
				</p>
            <?php endwhile; ?>

            <?php query_posts('showposts=1&category_name=nossos-pilares');
            while (have_posts()) : the_post(); ?>

				<div class="pilares">
					<h1 class="title-pilares"><?php echo get_the_title(); ?></h1>

					<?php echo get_the_content(); ?>
				</div>

			</div>

			<?php endwhile; ?>

		</section>
		<!--FIM section sobre a empresa, historia e pilares-->

		<a name="produtos"></a>
		<section class="produtos">
			<h1 class="title-section">NOSSOS PRODUTOS</h1>

			<div class="content-geral-2 clearfix">
					<div class="prod clearfix">

						<?php query_posts('showposts=3&category_name=produtos');
                        while (have_posts()) : the_post(); ?>

                            <ul class="feature-prod">
                                <li class="title-feature"><?php echo get_the_title() ?></li>
                                <?php echo str_replace(array("<ul>", "</ul>"), "", get_the_content()); ?>
                                <li class="feature-dif">E muito mais...</li>
                            </ul>

						<?php endwhile; ?>

					</div>
			</div>

		</section>



		<section class="vantagens">
		<a name="vantagens"></a>
			<H1 class="title-section-2">PORQUE COMPRAR NA FARMÁCIA SUAÇUI?</H1>

			<div class="content-geral">

				<?php query_posts('showposts=4&category_name=diferencial');
				$cont = 1;
				while (have_posts()) : the_post();
				$img = PegarMeioStr(' src="', '"', get_the_content());?>

					<div class="feature-vantagens<?php if($cont == 4) echo ' fv-dif'; ?>">
						<img src="<?php echo $img ?>">
						<h2 class="title-fv"><?php echo get_the_title() ?></h2>
					</div>

				<?php $cont++; endwhile; ?>

			</div>
		</section>


		<a name="contato"></a>
		<section class="contato">

			<H1 class="title-section">CONTATO</H1>

			<div class="content-geral clearfix">

				<form class="form-contato" action="" method="post">
					<input type="text" name="nome" placeholder="Nome" required>
					<input type="email" name="email" placeholder="Email" required>
					<textarea name="mensagem" placeholder="Mensagem" required></textarea>

					<input type="submit" class="enviar">
				</form>
				<div class="fb">
					<?php query_posts('showposts=1&category_name=telefone');
					while (have_posts()) : the_post(); ?>
						<p class="tel"><?php echo get_the_title().": ".get_the_content(); ?></p>
					<?php endwhile; ?>
					<?php query_posts('showposts=1&category_name=email');
					while (have_posts()) : the_post(); ?>
						<p class="tel"><?php echo get_the_title().": ".get_the_content(); ?></p>
					<?php endwhile; ?>
					<?php query_posts('showposts=1&category_name=endereco');
					while (have_posts()) : the_post(); ?>
						<p class="end"><?php echo get_the_title().": ".get_the_content(); ?></p>
					<?php endwhile; ?></div>
			</div>

				<div class="map"><?php echo do_shortcode('[put_wpgm id=1]'); ?></div>

		</section>

		<footer>
			<div class="content-footer">
				<p><img src="wp-content/themes/suacui/img/logo.png"></p>
			</div>

		</footer>

	</div>

<?php get_footer(); ?>