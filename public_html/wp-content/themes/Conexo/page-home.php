<?php  
/*
Template Name: Home
*/
get_header(); 
?>
    
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
    <section class="s-intro-home" id="s-intro-home" style="background-image: url('<?php the_field('imagem_banner', $banners_topo[0]->ID); ?>')"> 
            <div class="wrapper wrapper-1314">
                <div class="row justify-content-between align-items-center justify-content-center">
                    <div class="col-lg-6 mb-md-0 mb-4">
                        <div class="infos-section text-md-left text-center">
                        <?php the_field('descricao_banner', $banners_topo[0]->ID); ?>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="box-form" id="simulacao">
                            <div class="infos-section pt-0">
                                <p class="titulo_form"><?php echo strip_tags(get_field('descricao_formulario')); ?></p>
                            </div>
                            <?php echo do_shortcode('[contact-form-7 id="724" title="contato"]'); ?>                                             
                        </div>
                    </div>
                </div>
            </div>
    </section>
<!-- Fim Section Introdução -->

<!-- Ínicio Section Quem Somos -->
    <section class="s-quem-somos"> 
        <div class="wrapper wrapper-1314">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6">
                    <div class="img-quem-somos" style="background-image: url('<?php the_field('imagem_quem_somos'); ?>');"></div>
                 </div>
                 <div class="col-lg-6">
                   <article>
                      <h1><?php the_field('titulo_quem_somos'); ?></h1>
                      <p><?php the_field('descricao_quem_somos'); ?></p>
                   </article>
                 </div>
            </div>
        </div>
    </section>
<!-- Fim Section Quem Somos -->   
 
<?php get_footer(); ?>