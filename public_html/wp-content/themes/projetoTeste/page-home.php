<?php
/*
Template Name: Home
*/
get_header();
?>

<!-- Ínicio Section Formulario -->

    <section class="s_formulario" id="s_formulario">

        <div class="wrapper wrapper-1314">

            <div class="row justify-content-between justify-content-center">

                <div class="col-lg-6 mb-md-0 mb-4">

                    <div class="infos-section text-md-left text-center branco">
                        <div>

                            <?php the_field("descricao_se_inscreva") ?>

                        </div>

                        <img src="<?php echo the_field('imagem_se_inscreva'); ?>" alt="Inscreva-se" class="img_inscreva">

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

<!-- Fim Section Quem Somos -->


<!-- Ínicio Section Quem Somos -->

    <hr class="separador-section">
    <section class="s-quem-somos">

        <div class="wrapper wrapper-1314">

            <div class="row justify-content-center align-items-center">

                <div class="col-lg-6">

                    <div class="img-background" style="background-image: url('<?php the_field('imagem_quem_somos'); ?>');"></div>

                 </div>

                 <div class="col-lg-6">

                   <div class="box-quem-somos my-2 branco">

                        <?php the_field('titulo_quem_somos'); ?>
                        <p><?php the_field('descricao_quem_somos'); ?></p>

                    </div>

                 </div>
            </div>
        </div>
    </section>
    <hr class="separador-section">

<!-- Fim Section Quem Somos -->


<!-- Inicio da Sessão Por que Rocket -->
    <?php
        $args_banners = array (
            'post_type'         => 'banner',
            'posts_per_page'    => 9,
            'orderby'           => 'date',
            'order'             => 'ASC',
            'tax_query'         => array(
                array(
                    'taxonomy' => 'categorias_banner',
                    'field'    => 'slug',
                    'terms'    => '',
                ),
            )
        );

        $args_banners['tax_query'][0]['terms'] = 'por-que-a-rocket';
        $header_query = new WP_Query ( $args_banners );
        $banners_rocket = $header_query->posts;
    ?>

    <?php if(count($banners_rocket) > 0): ?>
        <section class="s_porque_rocket">

            <div class="wrapper wrapper-1314">

                <div class="infos-section text-center my-2 my-md-4 mb-3 branco">

                    <?php the_field('titulo_da_sessao_rocketseat'); ?>

                </div>

                <div class="row justify-content-center">

                    <?php foreach($banners_rocket as $key => $banner): ?>

                        <div class="col-lg-4 col-6 my-2">

                            <div>

                                <figure class="mx-1 mt-1">
                                    <img class="img-fluid max-50" src="<?php the_field('imagem_banner', $banner->ID); ?>" alt="<?php echo $banner->post_title; ?>" width="50" height="50">
                                </figure>

                                <div class="d-block infos-section mx-1">

                                    <div class="max-200 branco">
                                        <strong><?php echo $banner->post_title; ?></strong>
                                    </div>

                                    <span class="cinza"><?php the_field('descricao_banner', $banner->ID); ?></span>

                                </div>

                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

            </div>

        </section>
    <?php endif; ?>

<!-- Fim da Sessão Por que Rocket -->


<!-- Inicio da Nossos Números -->
    <hr class="separador-section">
    <section class="s_numeros">

        <div class="wrapper wrapper-1314 branco">

            <div class="infos-section text-left mb-4">

                <?php the_field("titulo_da_sessao_numeros"); ?>

            </div>

            <div class="row justify-content-center align-items-center infos-section">

                <div class="col-lg-3 col-6 px-1 px-sm-2 text-center">
                    <span class="verde roboto"><?php the_field('quantidade_de_clientes'); ?></span>
                    <hr class="separador-numeros">
                    <?php the_field('descricao_clientes'); ?>
                </div>

                <div class="col-lg-3 col-6 px-1 px-sm-2 text-center">
                    <span class="verde roboto"><?php the_field('quantidade_de_clientes_e_parceiros'); ?></span>
                    <hr class="separador-numeros">
                    <?php the_field('descricao_clientes_e_parceiros'); ?>
                </div>

                <div class="col-lg-3 col-6 px-1 px-sm-2 text-center">
                    <span class="verde roboto"><?php the_field('inscritos_youtube'); ?></span>
                    <hr class="separador-numeros">
                    <?php the_field('descricao_youtube'); ?>
                </div>

                <div class="col-lg-3 col-6 px-1 px-sm-2 text-center">
                    <span class="verde roboto"><?php the_field('quantidade_discord'); ?></span>
                    <hr class="separador-numeros">
                    <?php the_field('descricao_discord'); ?>
                </div>

            </div>

        </div>

    </section>
    <hr class="separador-section">

<!-- Fim da Sessão Nossos Números -->


<!-- Inicio da Sessão Feedback Clientes -->

    <?php
        $args_banners = array (
            'post_type'         => 'banner',
            'posts_per_page'    => 9,
            'orderby'           => 'date',
            'order'             => 'ASC',
            'tax_query'         => array(
                array(
                    'taxonomy' => 'categorias_banner',
                    'field'    => 'slug',
                    'terms'    => '',
                ),
            )
        );

        $args_banners['tax_query'][0]['terms'] = 'feedback-clientes';
        $header_query = new WP_Query ( $args_banners );
        $banners_comentarios = $header_query->posts;
    ?>

    <?php if(count($banners_comentarios) > 0): ?>

        <section class="s_feedback">

            <div class="wrapper wrapper-1314 infos-section branco">

                <div class="text-left my-2 my-md-4 mb-3 max-500">

                    <?php the_field('titulo_feedback_clientes'); ?>

                </div>


                <div class="row justify-content-center">

                    <?php foreach($banners_comentarios as $key => $banner): ?>

                        <div class="col-lg-6">

                            <div class="max-520 mt-5">
                                <?php the_field('comentario_cliente', $banner->ID); ?>
                            </div>

                            <div class="d-flex align-items-center">
                                <figure class="mx-1 mt-1">
                                    <img class="img-cliente max-50" src="<?php the_field('imagem_cliente', $banner->ID); ?>" alt="<?php echo $banner->post_title; ?>" width="64" height="64">
                                </figure>

                                <div class="mx-2">
                                    <strong><?php echo $banner->post_title; ?></strong>
                                    <?php the_field('funcao_cliente', $banner->ID); ?>
                                </div>
                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

            </div>

        </section>

    <?php endif; ?>

<!-- Fim da Sessão Feedback Clientes -->


<!-- Inicio da Sessão Empresas -->

    <?php
        $args_empresas = array (
            'post_type'         => 'empresas',
            'posts_per_page'    => 10,
            'orderby'           => 'date',
            'order'             => 'ASC'
        );

        $empresa_query = new WP_Query ( $args_empresas );
        $empresas = $empresa_query->posts;
    ?>

    <?php if(count($empresas) > 0): ?>

        <hr class="separador-section">
        <section class="s_empresas">

            <div class="wrapper wrapper-1314 infos-section branco">

                <div class="d-flex flex-column align-items-center  mb-4 mb-md-4">

                    <div class="max-600 text-center"><?php the_field("titulo_da_sessao_empresas") ?></div>

                    <div class="max-600 text-center"><?php the_field("descricao_da_sessao_empresas") ?></div>

                </div>

                <div class="row justify-content-center">

                    <?php foreach($empresas as $key => $empresa): ?>

                        <div class="col-lg-3 col-sm-4 col-6 my-3">

                            <img src="<?php the_field('imagem_empresa', $empresa->ID); ?>" alt="<?php echo $empresa->post_title; ?>" width="auto" height="auto">

                        </div>

                    <?php endforeach; ?>

                </div>

            </div>

        </section>
        <hr class="separador-section">
    <?php endif; ?>

<!-- Fim da Sessão Empresas -->


<!-- Inicio da Sessão Comecar Agora -->

    <section class="s_comece">

        <div class="wrapper wrapper-1314 infos-section branco">

            <div class="row justify-content-center align-items-center">

                <div class="col-md-6 order-1 order-md-0">

                    <div class="img-background-2" style="background-image: url('<?php the_field('imagem_comece_agora'); ?>');"></div>

                </div>


                <div class="col-md-6 order-0 order-md-1 max-550">

                    <?php the_field("titulo_comece_agora"); ?>

                    <?php the_field("descricao_comece_agora"); ?>

                    <a href="#s_formulario" class="btn btn-218 btn-outline-roxo my-4"><strong>COMEÇAR AGORA</strong></a>

                </div>

            </div>

        </div>

    </section>

<!-- Fim da Sessão Comecar Agora -->

<?php get_footer(); ?>