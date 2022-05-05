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
<section class="s-intro-home d-lg-flex d-none align-items-center"> 
    <?php            
        $args_banners['tax_query'][0]['terms'] = 'home-banner-topo';
        $header_query = new WP_Query ( $args_banners );
        $banners_topo = $header_query->posts;
    ?>
    <?php foreach ($banners_topo as $key => $banner_top) { ?>
        <div class="owl-carousel owl-theme owl-banner-big-top">
            <div class="bg-intro-home" style="background-image: url('<?php the_field('imagem_banner', $banner_top->ID); ?>')">
            </div>
    <?php } ?> 
</section>