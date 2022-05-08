<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Instituto Conexo">
    <meta name="author" content="Instituto Conexo">

    <!-- <link rel="apple-touch-icon" sizes="57x57" href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/favicon/apple-icon-57x57.png"> -->

    <title><?php bloginfo('name'); ?></title>

    <!-- Header wordpress -->
    <?php wp_head(); ?>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/deps.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/app.min.css">


</head>

<body>

<?php
    $args_banners = array (
        'post_type' => 'banner',
        'order'   => 'ASC',
        'tax_query' => array(
            array(
                'taxonomy' => 'categorias_banner',
                'field'    => 'slug',
                'terms'    => '',
            ),
        )
    );

    $args_banners['tax_query'][0]['terms'] = 'banner-introducao';
    $header_query = new WP_Query ( $args_banners );
    $banners_topo = $header_query->posts;
?>

<!-- Ínicio Section Introdução -->
    <section class="s_intro_home infos-section" id="s-intro-home" style="background-image: url('<?php the_field('imagem_banner', $banners_topo[0]->ID); ?>')">

        <div class="max-400 descricao text-md-left text-center branco">
            <?php the_field('descricao_banner', $banners_topo[0]->ID); ?>
        </div>

    </section>
<!-- Fim Section Introdução -->



</header>

