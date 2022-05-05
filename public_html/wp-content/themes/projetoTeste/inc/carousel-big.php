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
    $banners_estrutura_topo = $header_estrutura_query->posts;
?>

    <!-- carrossel maior -->
    <div class="owl-carousel owl-galeria-big owl-theme">
        <?php foreach ($banners_estrutura_topo as $bannerBig) { ?>
            <div class="item">
                <img src="<?php the_field('imagem', $bannerBig->ID); ?>" alt="">
            </div>
        <?php }?> 
    <div>