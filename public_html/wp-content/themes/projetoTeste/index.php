<?php  
/*
Template Name: Index
*/
get_header(); 
$page_title = $wp_query->post->post_title;

    $search_query = get_search_query();
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
    $args_banners['tax_query'][0]['terms'] = 'banner-titulo';
    $header_query = new WP_Query ( $args_banners );
    $banner_title = $header_query->posts;

?>

<section class="s-title-padrao" style="background-image: url('<?php the_field('imagem_banner', $banner_title[0]->ID);?>');">
	<article>
		<div class="wrapper wrapper-1360 d-md-flex justify-content-between align-items-center">
			<h1><?php 
						if(trim($search_query) != ''):
					?>
						Resultados da pesquisa para " <strong><?php the_search_query(); ?></strong> ".
					<?php endif;?></h1>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page"><?php the_search_query(); ?></li>
				</ol>
			</nav>
		</div>
	</article>
</section>

<section class="s_page_geral infos-section">
    <div class="wrapper wrapper-1360">
        <div class="row justify-content-center">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="col-lg-3 col-md-4">
                    <a href="<?php the_permalink(); ?>">
                        <div class="item_produto">
                            <figure>
                                <img src="<?php the_field('imagem_produto'); ?>" alt="" class="m-0 responsive">
                                <figcaption class="infos-section text-center">
                                    <h3><?php echo get_the_title();?></h3>
                                    <?php 
                                        echo $descProduto =  substr(get_field('descricao_produto'),0,60) . ((strlen(get_field('descricao_produto'))>60)?'...':'');   
                                    ?>
                                    <div class="mt-4">
                                        <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-192">saiba mais</a>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </a>
                </div>
            <?php endwhile; ?>
                    <div class="col-md-12">
                        <div class="nav_blog">
                            <?php if(function_exists('wp_simple_pagination')) {
                                wp_simple_pagination();
                            } ?> 
                        </div>
                    </div>
            </div>
            <?php else : ?>
                <p class="playdisplay_regular fs-16 preto_1">Ainda não há conteúdo para ser mostrado.</p>
            <?php endif; ?>	
    </div>
</section>



<?php get_footer(); ?>