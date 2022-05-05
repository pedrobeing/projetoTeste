<?php 
    $args_banners = array (
        'post_type' => 'banner',
        'tax_query' => array(
            array(
                'taxonomy' => 'categorias_banner',
                'field'    => 'slug', 
                'terms'    => '',
            ),
        )
    );
?>
<?php            
    $args_banners['tax_query'][0]['terms'] = 'estrutura-galeria';
    $header_estrutura_query = new WP_Query ( $args_banners );
    $banners_galeria_small = $header_estrutura_query->posts;
?>

    <!-- carrossel menor -->
    <div class="owl-carousel owl-galeria-small owl-theme">
        <?php foreach ($banners_galeria_small as $bannerSmall) { ?>
            <div class="item">
                <img src="<?php the_field('imagem', $bannerSmall->ID); ?>" alt="">
            </div>
        <?php }?> 
    <div>