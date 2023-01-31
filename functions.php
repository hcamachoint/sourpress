<?php
require_once('bs4navwalker.php');

register_nav_menu('top', 'Top menu');

function twentyseventeen_widgets_init() {

	// Nueva Zona Agregada
	register_sidebar( array(
		'name'          => __( 'Footer Widgets Center', 'twentyseventeen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your header.', 'twentyseventeen' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Header Widgets right', 'twentyseventeen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		/*'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',*/
	) );
}
add_action( 'widgets_init', 'twentyseventeen_widgets_init' );

//add_action( 'init', 'register_my_menus' );	//Registra el menu del navbar (wp_bootstrap_navwalker.php)
add_filter( 'show_admin_bar', '__return_false' ); //Oculta la barra del administrador
add_theme_support( 'custom-header' );		//Permite editar el header
remove_filter ('the_content',  'wpautop');	//Remueve el filtro de los <p></p> automaticos
remove_filter ('comment_text', 'wpautop');	//Remueve el filtro de los <p></p> automaticos

function wpbootstrap_scripts()
{
  wp_enqueue_style('sf_css', get_template_directory_uri(). '/css/theme.css');

  wp_enqueue_script( 'wpbootstrap-fontawesome', get_template_directory_uri() . '/js/fontawesome-all.js', array(), '1.0.0', true);
	wp_enqueue_script('wpbootstrap-parallax',  get_template_directory_uri() . '/js/parallax.min.js', array(), '1.0.0', true);
  wp_enqueue_script('wpbootstrap-theme',  get_template_directory_uri() . '/js/theme.js', array(), '1.0.0', true);
}

add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts' );

// Customize Appearance Options
function customizable_colors( $wp_customize ) {

  $wp_customize->add_section('lwp_standard_colors', array(
		'title' => __('Tema Colores', 'LearningWordPress'),
		'priority' => 30,
	));

	$wp_customize->add_setting('bg-nav', array(
		'default' => '#006ec3',
		'transport' => 'refresh',
	));

  $wp_customize->add_setting('bg-nav-a', array(
		'default' => '#999',
		'transport' => 'refresh',
	));

  $wp_customize->add_setting('bg-nav-ah', array(
		'default' => '#000',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('bg-footer', array(
		'default' => '#d8d8d8',
		'transport' => 'refresh',
	));

  $wp_customize->add_setting('bg-subheader', array(
		'default' => '#000',
		'transport' => 'refresh',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lwp_nav_color_control', array(
		'label' => __('Navbar Color', 'LearningWordPress'),
		'section' => 'lwp_standard_colors',
		'settings' => 'bg-nav',
	) ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lwp_tab_color_control', array(
		'label' => __('Navbar Tab Color', 'LearningWordPress'),
		'section' => 'lwp_standard_colors',
		'settings' => 'bg-nav-a',
	) ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lwp_tabhover_color_control', array(
		'label' => __('Navbar Tab Hover Color', 'LearningWordPress'),
		'section' => 'lwp_standard_colors',
		'settings' => 'bg-nav-ah',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lwp_footer_color_control', array(
		'label' => __('Footer Color', 'LearningWordPress'),
		'section' => 'lwp_standard_colors',
		'settings' => 'bg-footer',
	) ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lwp_bgfa_color_control', array(
		'label' => __('Subheader background Color', 'LearningWordPress'),
		'section' => 'lwp_standard_colors',
		'settings' => 'bg-subheader',
	) ) );

  //BLOQUE DE TEXTOS
  $wp_customize->add_panel( 'text_blocks', array(
      'priority'=>500,
      'theme_supports'=>'',
      'title'=> __( 'Tema Textos', 'LearningWordPress' ),
      'description'=> __( 'Set editable text for certain content.', 'LearningWordPress' ),
    )
  );

  //BLOCK 1
  $wp_customize->add_section( 'custom_header_text' , array(
      'title'=> __('Change Header Text','LearningWordPress'),
      'panel'=>'text_blocks',
      'priority'=>10
     )
  );

  $wp_customize->add_setting( 'header_text_block', array(
      'default'=> __( '', 'LearningWordPress' ),
    )
  );

  $wp_customize->add_control( new WP_Customize_Control(
      $wp_customize,
      'custom_header_text',
      array(
      'label'=> __( 'Header Text', 'LearningWordPress' ),
      'section'=>'custom_header_text',
      'settings'=>'header_text_block',
      'type'=>'text'
      )
    )
  );

  //BLOCK 2
  $wp_customize->add_section( 'custom_navbar_text_size' , array(
      'title'=> __('Change Header Text Size','LearningWordPress'),
      'panel'=>'text_blocks',
      'priority'=>10
     )
  );

  $wp_customize->add_setting( 'navbar_text_size', array(
      'default'=> __( '15', 'LearningWordPress' ),
    )
  );

  $wp_customize->add_control( new WP_Customize_Control(
      $wp_customize,
      'custom_navbar_text_size',
      array(
      'label'=> __( 'NavBar link size', 'LearningWordPress' ),
      'section'=>'custom_navbar_text_size',
      'settings'=>'navbar_text_size',
      'type'=>'text'
      )
    )
  );

  //BLOCK 3
  $wp_customize->add_section( 'custom_subheader_content' , array(
      'title'=> __('Change Sub Header Content','LearningWordPress'),
      'panel'=>'text_blocks',
      'priority'=>10
     )
  );

  $wp_customize->add_setting( 'subheader_content', array(
      'default'=> __( '', 'LearningWordPress' ),
    )
  );

  $wp_customize->add_control( new WP_Customize_Control(
      $wp_customize,
      'custom_subheader_content',
      array(
      'label'=> __( 'Custom Sub Header Content', 'LearningWordPress' ),
      'section'=>'custom_subheader_content',
      'settings'=>'subheader_content',
      'type'=>'text'
      )
    )
  );


}

add_action('customize_register', 'customizable_colors');

// Output Customize CSS
function learningWordPress_customize_css() { ?>

	<style type="text/css">
		.bg-nav {
			background: <?php echo get_theme_mod('bg-nav'); ?>!important;
		}

    .bg-footer {
			background: <?php echo get_theme_mod('bg-footer'); ?>!important;
      height: auto!important;
		}

    .menu-item a {
      color: <?php echo get_theme_mod('bg-nav-a'); ?>!important;
      transition: ease-in-out color .15s;
      font-size: <?php echo get_theme_mod('navbar_text_size'); ?>px!important;
    }
    .menu-item a:hover {
      color: <?php echo get_theme_mod('bg-nav-ah'); ?>!important;
      text-decoration: none;
    }



		.navbar-toggler .iconi{
			color: <?php echo get_theme_mod('bg-nav-ah'); ?>;
		}



		@media (max-width:575px){
		  #bs4navbar{
		    border-top: 3px solid <?php echo get_theme_mod('bg-nav-ah'); ?>;
		    border-bottom: 3px solid <?php echo get_theme_mod('bg-nav-ah'); ?>;
		  }
		}

    /*.navbar-toggler{
        background-color: <?php echo get_theme_mod('bg-nav-ah'); ?>;
        border:none;
    }*/


	</style>

<?php }

add_action('wp_head', 'learningWordPress_customize_css');

?>
