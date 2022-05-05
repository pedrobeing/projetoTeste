
<!-- Ínicio Section Footer -->
<footer class="footer">
    <div class="wrapper wrapper-1314">
        <div class="d-md-flex align-items-center justify-content-between">
            <div class="logos-footer">
                <figure>
                    <img class="responsive" src="<?php the_field('logo_-_rodape', 6);?>" alt="">
                </figure>
            </div>
            <div class="my-3">
                <a href="#" class="btn btn-azul-3 btn-381">GARANTIR MINHA VAGA</a>
            </div>
            <div class="infos-section d-block d-md-flex align-items-center">
                <p>Redes Sociais:</p>
                <ul class="redes-sociais">
                    <li><a href="<?php the_field('instagram')?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="<?php the_field('facebook')?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- Fim Section Footer-->

</main>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/deps.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/app.min.js"></script>
<!-- Footer Wordpress -->


<?php wp_footer(); ?>
</body>
</html>