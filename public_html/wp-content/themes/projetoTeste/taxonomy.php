<?php  
/*
Template Name: Taxonomia
*/
get_header(); 
$page_title = $wp_query->post->post_title;
?>
<main>
<!-- Breadcrumb nome página -->

<?php echo $page_title;?>
<!-- FimBreadcrumb nome página -->

<section class="page-geral">
    <div class="container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; endif; ?>
    </div>
</section>


<?php get_footer(); ?>