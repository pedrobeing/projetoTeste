<?php
/*
Template Name: Taxonomia Solucoes
*/
get_header();
$term = get_queried_object();
$argsTaxSolucao = array('taxonomy' => 'categorias_solucoes');
$slugSolucoes = get_the_terms( $post->ID, 'categorias_solucoes' ); 
$argsTaxSolucao = get_terms(array('slug' => $term->slug ));
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
			<h1><?php the_title(); ?></h1>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
				</ol>
			</nav>
		</div>
	</article>
</section>


<section class="s_page_geral _solucao">
    <div class="wrapper wrapper-1360">
        <div class="row">
            <?php if (have_posts()) : while (have_posts()) : the_post(); 
                if($cont % 2 == 0){
                    $dataLeft = 'fade-up';
                }else{
                    $dataLeft = 'fade-down';
                }        
            ?>       
                <div class="col-lg-4 col-md-6">
                    <div class="item_cat_produto">
                        <a href="<?php the_permalink(); ?>">
                            <div class="bg-cat-prod" style="background-image: url('<?php the_field('imagem_solucao', $argsTaxProd[0]);?>');"></div>
                            <div class="infos-section text-center">
                                <h2><?php the_title(); ?></h2>
                                <?php the_field('descricao_completa'); ?>
                                <div class="mt-4 pt-md-1">
                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-192">saiba mais</a>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>          
                
            <?php  $cont++; endwhile; ?>

        </div>
        
            <?php else: ?>
            <p>Desculpe, não encontramos nenhum produto :(</p>
            <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
