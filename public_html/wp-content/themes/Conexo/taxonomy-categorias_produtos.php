<?php
/*
Template Name: Taxonomia Produtos
*/
get_header();
$term = get_queried_object();
$argsTaxProd = array('taxonomy' => 'categorias_produtos');
$slugProdutos = get_the_terms( $post->ID, 'categorias_produtos' ); 
$argsTaxProd = get_terms(array('slug' => $term->slug ));
$camposExtras = get_term_meta( $argsTaxProd[0]->term_id);
$img_1 = wp_get_attachment_image_src( $camposExtras['img_background'][0], 'full' );
$img_2 = wp_get_attachment_image_src( $camposExtras['img_secundaria'][0], 'full' );
$img_3 = wp_get_attachment_image_src( $camposExtras['img_last'][0], 'full' );
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
			<h1>Produto</h1>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="/produtos">Produtos</a></li>
					<li class="breadcrumb-item active" aria-current="page"><?php single_cat_title( '', true ); ?></li>
				</ol>
			</nav>
		</div>
	</article>
</section>

<!-- Lista Produtos -->
<section class="s_categoria_prod">
    <section class="wrapper wrapper-1360">
        <div class="row">
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
        
            <?php else: ?>
                 <p>Desculpe, não encontramos nenhum produto :(</p>
            <?php endif; ?>
        </div>
    </section>
</section>

<?php get_footer(); ?>
