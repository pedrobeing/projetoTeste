<?php  
/*
Template Name: Page
*/
get_header(); 
$page_title = $wp_query->post->post_title;
?>

<section class="page-404 py-5 infos-section">

    <div class="wrapper wrapper-1314 my-5">

        <h1 class="mb-4"><strong><?php echo $page_title;?></strong></h1>

        <?php the_content(); ?>

    </div>
    
</section>


<?php get_footer(); ?>