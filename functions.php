<?
//if(session_id() == '') session_start();
//show_admin_bar(true);
if (function_exists('add_theme_support')) {
    add_theme_support('menus');
}

// Подключение скриптов и стилей
function lotus_styles() {
    // подключение стилей
    wp_enqueue_style( 'head_style', get_stylesheet_directory_uri() . '/style/style.css', array(), null );
    wp_enqueue_style( 'ls_style', get_stylesheet_directory_uri() . '/style/zabuto_calendar.min.css', array(), null );
    wp_enqueue_style( 'fa_style', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css', array(), null );
    // подключение скриптов 
    wp_enqueue_script('main_scripts', get_template_directory_uri().'/js/scripts.js', ['jquery'], 1, true);
}
add_action( 'wp_enqueue_scripts', 'lotus_styles' );


if ( ! function_exists( 'lotus_setup' ) ) :

	function lotus_setup() {

		add_theme_support( 'title-tag' );
	}
endif;
add_action( 'after_setup_theme', 'lotus_setup' );


function true_register_wp_sidebars() {
 
	/* В боковой колонке - первый сайдбар */
	register_sidebar(
		array(
			'id' => 'true_side', // уникальный id
			'name' => 'Боковая колонка', // название сайдбара
			'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', // описание
			'before_widget' => '<div id="%1$s" class="side widget %2$s">', // по умолчанию виджеты выводятся <li>-списком
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">', // по умолчанию заголовки виджетов в <h2>
			'after_title' => '</h3>'
		)
	);
 
	/* В подвале - второй сайдбар */
	register_sidebar(
		array(
			'id' => 'true_foot',
			'name' => 'Футер',
			'description' => 'Перетащите сюда виджеты, чтобы добавить их в футер.',
			'before_widget' => '<div id="%1$s" class="foot widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
}
 
add_action( 'widgets_init', 'true_register_wp_sidebars' );