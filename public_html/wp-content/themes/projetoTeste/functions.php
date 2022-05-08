<?php

// Funções para Limpar o Header
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'start_post_rel_link', 10, 0 );
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');



add_theme_support( 'post-thumbnails' );
the_post_thumbnail( 'thumbnail' );
function register_my_menus() {
	register_nav_menus(
	  array(
		'menu-principal' => esc_html__( 'Menu Principal', 'theme-textdomain' ),
		'menu-footer1' => esc_html__( 'Menu Footer', 'theme-textdomain' ),
	  )
	);
  }
  add_action( 'init', 'register_my_menus' );

require get_template_directory() . '/bootstrap-navwalker.php';


// Login Personalizado
function my_custom_login() {
  echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/login/login-style.css" />';
}
add_action('login_head', 'my_custom_login');

add_image_size( 'pequena', 200, 150, true );


// Definir o que o Cliente pode ver

if ( current_user_can('editor') ) {
	function my_remove_menu_pages() {
		remove_menu_page('index.php');
		// remove_menu_page('edit.php');
		remove_menu_page('edit-comments.php');
		remove_menu_page('tools.php');
	}
	add_action( 'admin_menu', 'my_remove_menu_pages' );

// Retira o Símbolo do Wordpress e dos comentários

	function annointed_admin_bar_remove() {
		global $wp_admin_bar;
		$wp_admin_bar->remove_menu('wp-logo');
		$wp_admin_bar->remove_menu('comments');
	}

	add_action('wp_before_admin_bar_render', 'annointed_admin_bar_remove', 0);

}

// Allow editors to see Appearance menu
$role_object = get_role( 'editor' );
$role_object->add_cap( 'edit_theme_options' );
function hide_menu() {

    // Hide theme selection page
    remove_submenu_page( 'themes.php', 'themes.php' );

    // Hide customize page
    remove_submenu_page( 'themes.php', 'customize.php' );

    // Hide customize page
    global $submenu;
    unset($submenu['themes.php'][6]);

}


add_action('admin_head', 'hide_menu');


// Corrige a questão das colunas no dashboard

function wpse126301_dashboard_columns() {
		add_screen_option(
			'layout_columns',
			array(
				'max'		=> 2,
				'default'	=> 1
			)
		);
}
add_action( 'admin_head-index.php', 'wpse126301_dashboard_columns' );

// Remove link das imagens inseridas com o editor

function rkv_imagelink_setup() {
	$image_set = get_option( 'image_default_link_type' );

	if ($image_set !== 'none') {
		update_option('image_default_link_type', 'none');
	}
}
add_action('admin_init', 'rkv_imagelink_setup', 10);

function excerpt($limit, $post = null) {
    $excerpt = explode(' ', get_the_excerpt($post), $limit);
    if (count($excerpt)>=$limit) {
      array_pop($excerpt);
      $excerpt = implode(" ",$excerpt).'...';
    } else {
      $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
    return $excerpt;
}

// Single Page para Categorias criadas no wordpress
add_filter('single_template', 'check_for_category_single_template');
function check_for_category_single_template( $t )
{
  foreach( (array) get_the_category() as $cat )
  {
    if ( file_exists(get_stylesheet_directory() . "/single-category-{$cat->slug}.php") ) return get_stylesheet_directory() . "/single-category-{$cat->slug}.php";
    if($cat->parent)
    {
      $cat = get_the_category_by_ID( $cat->parent );
      if ( file_exists(get_stylesheet_directory() . "/single-category-{$cat->slug}.php") ) return get_stylesheet_directory() . "/single-category-{$cat->slug}.php";
    }
  }
  return $t;
}

// Paginação

// -- Ínicio Paginação -- //

function my_pagination() {
	global $wp_query;
	$current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;

	echo paginate_links( array(
		'base' => str_replace( 9999999999999, '%#%', esc_url( get_pagenum_link( 9999999999999 ) ) ),
		'format' => '?paged=%#%',
		'add_args' => true,
		'type' => 'list',
		'current' => max( 1, $current_page ),
		'total' => $wp_query->max_num_pages,
		'prev_text' => '←',
		'next_text' => '→',
		'type' => 'list',
		'end_size' => 3,
		'mid_size' => 3,
	) );
}

// -- Fim Paginação -- //

// -- Ínicio Corrigir a Url para a Páginação -- //
// prioritetize pagination over displaying custom post type content
add_action('init', function() {
	add_rewrite_rule('(.?.+?)/page/?([0-9]{1,})/?$', 'index.php?pagename=$matches[1]&paged=$matches[2]', 'top');
});
// -- Fim Corrigir a Url para a Páginação -- //

// Filtros
function wpshock_search_filter( $query ) {
    if ( $query->is_search ) {
        $query->set( 'post_type', array('produto') );
    }
    return $query;
}
add_filter('pre_get_posts','wpshock_search_filter');;

// Fim Filtros

// Custom Post Types

// Custom Type Banner
add_action('init', 'register_banner');
function register_banner() {

	register_post_type('banner', array(
		'label' => 'banner',
		'description' => 'Banner',
		'public' => true,
		'menu_icon'   => 'dashicons-images-alt',
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'map_meta_cap' => true,
		'hierarchical' => false,
        'numberposts' => -1,
		'rewrite' => array('slug' => 'banner', 'with_front' => true),

		'query_var' => true,
		'supports' => array('title', 'page-attributes','post-formats'),

		'labels' => array (
			'name' => 'Banners',
			'singular_name' => 'Banner',
			'menu_name' => 'Banners',
			'add_new' => 'Adicionar Novo',
			'add_new_item' => 'Adicionar Novo Banner',
			'edit' => 'Editar',
			'edit_item' => 'Editar Banner',
			'new_item' => 'Novo Banner',
			'view' => 'Ver Banner',
			'view_item' => 'Ver Banner',
			'search_items' => 'Procurar Banner',
			'not_found' => 'Nenhum Banner Encontrado',
			'not_found_in_trash' => 'Nenhum Banner Encontrado no Lixo',
			'parent' => 'Parent Banner',
		)
	));
}

// Método para o registro da Custom Taxonomy Tipo Banner

function custom_tax_banner(){
    $custom_tax_nome = 'categorias_banner';
	$custom_post_type_nome = 'banner';

	$labels = array(
		'name' => 'Categorias',
		'singular_name' => 'Categoria',
		'menu_name' => 'Categoria',
		'add_new' => 'Adicionar Nova',
		'all-items' => 'Todas as Categorias',
		'add_new_item' => 'Adicionar Novo Banner',
		'edit' => 'Editar',
		'edit_item' => 'Editar Banner',
		'new_item' => 'Novo Banner',
		'view' => 'Ver Banner',
		'view_item' => 'Ver Banner',
		'search_items' => 'Procurar Banner',
		'not_found' => 'Nenhum Banner Encontrado',
		'not_found_in_trash' => 'Nenhum Banner Encontrado no Lixo',
		'parent' => 'Parent Banner',
	);
    $args = array(
        'label' => __('Categorias de banners'),
        'hierarchical' => true,
    );
    register_taxonomy( $custom_tax_nome, $custom_post_type_nome, $args );
}
add_action( 'init', 'custom_tax_banner' );


add_action('init', 'register_empresas');
	function register_empresas() {
		register_post_type('empresas', array(
			'label' => 'Empresas',
			'description' => 'Empresas',
			'public' => true,
			'menu_icon'   => 'dashicons-networking',
			'show_ui' => true,
			'show_in_menu' => true,
			'capability_type' => 'post',
			'map_meta_cap' => true,
			'hierarchical' => false,
			'numberposts' => -1,
			'show_in_rest' => true,
			'rewrite' => array('slug' => 'empresas', 'with_front' => true),
			'query_var' => true,
			'supports' => array('title', 'page-attributes','post-formats'),
			'labels' => array (
				'name' => 'Empresas',
				'singular_name' => 'Empresa',
				'menu_name' => 'Empresas',
				'add_new' => 'Adicionar Novo',
				'add_new_item' => 'Adicionar Nova Empresa',
				'edit' => 'Editar',
				'edit_item' => 'Editar Empresa',
				'new_item' => 'Nova Empresa',
				'view' => 'Ver Empresa',
				'view_item' => 'Ver Empresa',
				'search_items' => 'Procurar Empresas',
				'not_found' => 'Nenhuma Empresa Encontrada',
				'not_found_in_trash' => 'Nenhuma Empresa Encontrado no Lixo',
				'parent' => 'Parent Empresa',
			)
		));
	}


function my_meta_box_cb () {
	add_meta_box( MY_POST_TYPE . '_details' , 'Galeria', 'my_meta_box_details', MY_POST_TYPE, 'normal', 'high' );
}

function my_meta_box_details () {
	global $post;
	$post_ID = $post->ID; // global used by get_upload_iframe_src
	printf( "<iframe frameborder='0' src=' %s ' style='width: 100%%; height: 400px;'> </iframe>", get_upload_iframe_src('media') );
}
