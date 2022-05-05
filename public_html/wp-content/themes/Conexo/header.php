<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Instituto Conexo">
    <meta name="author" content="Instituto Conexo">

    <!-- <link rel="apple-touch-icon" sizes="57x57" href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/favicon/apple-icon-57x57.png"> -->
  
    <title><?php bloginfo('name'); ?></title>

    <!-- Header wordpress -->
    <?php wp_head(); ?>
    
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/deps.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/app.min.css">

    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1481317192266911');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1481317192266911&ev=PageView&noscript=1"/></noscript>
    <!-- End Facebook Pixel Code -->

</head>

<body>

<header class="header ">
    <div class="wrapper wrapper-1314">
        <figure class="logo <?php if(is_page('politica-de-privacidade') ) echo 'd-flex justify-content-center w-100';  ?>">
            <a href="/" title="pagina inicial"><img class="responsive" src="<?php the_field('logo_-_menu', 6)?>" alt=""></a>
        </figure>
    </div>
</header>

