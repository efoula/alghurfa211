<?php

////////////////////////////////////////////////////////////////////////
// Theme styles and scripts
function add_theme_scripts() {
	wp_enqueue_script("jquery");
	wp_enqueue_style( 'style-dev', get_template_directory_uri() . '/style.css', array(), '1');
	wp_enqueue_style( 'output', get_template_directory_uri() . '/css/output.css', array(), '1');
	wp_enqueue_style( 'owl-carousel-min', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css');
	// wp_enqueue_style( 'cairo', 'https://fonts.googleapis.com/css2?family=Cairo&family=Noto+Sans+Arabic:wght@300;400;600;800&display=swap&family=Amiri&display=swap');
	wp_enqueue_script( 'fontawesome', 'https://kit.fontawesome.com/2c36e9b7b1.js');
	wp_enqueue_script( 'owl', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js');
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/script.js', array(), '1');
	wp_enqueue_script( 'ajaxjs', get_template_directory_uri() . '/js/ajax.js', array(), '1');

}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );
////////////////////////////////////////////////////////////////////////

// Get the bootstrap!
require_once __DIR__ . '/cmb2/init.php';
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
/////////// Translations Template
require_once (get_template_directory() . '/translations/translations.php');
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
// get static translation
// $field_id: is the CMB field ID in translations options page
function get_translation($field_id) {
  $translations = get_option('gh_translations');
  $translation = '';
  $lang = 'ar';
  $key = $field_id;

  if (!empty($lang) && $lang == 'ar') {
    $key = $field_id . '_' . $lang;
  }

  if (array_key_exists($key, $translations)) {
    $translation = $translations[$key];
  }

  return $translation;
}
////////////////////////////////////////////////////////////////////////

///////////////////////////////// Create WP Post Types
// Register Provisions Post Type
function register_book_provisions() {

	$labels = array(
		'name'                  => _x( 'نصوص', 'Post Type General Name', 'alghurfa' ),
		'singular_name'         => _x( 'نص', 'Post Type Singular Name', 'alghurfa' ),
		'menu_name'             => __( 'نصوص', 'alghurfa' ),
		'name_admin_bar'        => __( 'نصوص', 'alghurfa' ),
		'archives'              => __( 'أرشيف النصوص', 'alghurfa' ),
		'attributes'            => __( 'Provision Attributes', 'alghurfa' ),
		'parent_item_colon'     => __( 'Parent Item:', 'alghurfa' ),
		'all_items'             => __( 'جميع النصوص', 'alghurfa' ),
		'add_new_item'          => __( 'أضافة نص جديد', 'alghurfa' ),
		'add_new'               => __( 'أضافة جديد', 'alghurfa' ),
		'new_item'              => __( 'نص جديد', 'alghurfa' ),
		'edit_item'             => __( 'تعديل النص', 'alghurfa' ),
		'update_item'           => __( 'تحديث النص', 'alghurfa' ),
		'view_item'             => __( 'مشاهدة النص', 'alghurfa' ),
		'view_items'            => __( 'مشاهدة النصوص', 'alghurfa' ),
		'search_items'          => __( 'بحث النصوص', 'alghurfa' ),
		'not_found'             => __( 'Not found', 'alghurfa' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'alghurfa' ),
		'featured_image'        => __( 'Featured Image', 'alghurfa' ),
		'set_featured_image'    => __( 'Set featured image', 'alghurfa' ),
		'remove_featured_image' => __( 'Remove featured image', 'alghurfa' ),
		'use_featured_image'    => __( 'Use as featured image', 'alghurfa' ),
		'insert_into_item'      => __( 'Insert into Provision', 'alghurfa' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Provision', 'alghurfa' ),
		'items_list'            => __( 'Provisions list', 'alghurfa' ),
		'items_list_navigation' => __( 'Provisions list navigation', 'alghurfa' ),
		'filter_items_list'     => __( 'Filter Provisions list', 'alghurfa' ),
	);
	$args = array(
		'label'                 => __( 'Provision', 'alghurfa' ),
		'description'           => __( 'Book Provisions Post Type', 'alghurfa' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'provisions', $args );

}
add_action( 'init', 'register_book_provisions', 0 );
////////////////////////////////////////////////////////////////////////
// Register Private Profile Post Type
function register_book_privateprofile() {

	$labels = array(
		'name'                  => _x( 'ملفات خاصة', 'Post Type General Name', 'alghurfa' ),
		'singular_name'         => _x( 'ملف خاص', 'Post Type Singular Name', 'alghurfa' ),
		'menu_name'             => __( 'ملفات خاصة', 'alghurfa' ),
		'name_admin_bar'        => __( 'ملفات خاصة', 'alghurfa' ),
		'archives'              => __( 'أرشيف الملفات الخاصة', 'alghurfa' ),
		'attributes'            => __( 'Profile Attributes', 'alghurfa' ),
		'parent_item_colon'     => __( 'Parent Item:', 'alghurfa' ),
		'all_items'             => __( 'جميع الملفات الخاصة', 'alghurfa' ),
		'add_new_item'          => __( 'أضافة ملف جديد', 'alghurfa' ),
		'add_new'               => __( 'أضافة جديد', 'alghurfa' ),
		'new_item'              => __( 'ملف خاص جديد', 'alghurfa' ),
		'edit_item'             => __( 'تعديل الملف', 'alghurfa' ),
		'update_item'           => __( 'تحديث الملف', 'alghurfa' ),
		'view_item'             => __( 'مشاهدة الملف', 'alghurfa' ),
		'view_items'            => __( 'مشاهدة الملفات', 'alghurfa' ),
		'search_items'          => __( 'بحث الملفات', 'alghurfa' ),
		'not_found'             => __( 'Not found', 'alghurfa' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'alghurfa' ),
		'featured_image'        => __( 'Featured Image', 'alghurfa' ),
		'set_featured_image'    => __( 'Set featured image', 'alghurfa' ),
		'remove_featured_image' => __( 'Remove featured image', 'alghurfa' ),
		'use_featured_image'    => __( 'Use as featured image', 'alghurfa' ),
		'insert_into_item'      => __( 'Insert into Profile', 'alghurfa' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Profile', 'alghurfa' ),
		'items_list'            => __( 'Profiles list', 'alghurfa' ),
		'items_list_navigation' => __( 'Profiles list navigation', 'alghurfa' ),
		'filter_items_list'     => __( 'Filter Profiles list', 'alghurfa' ),
	);
	$args = array(
		'label'                 => __( 'Profile', 'alghurfa' ),
		'description'           => __( 'Book Profiles Post Type', 'alghurfa' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'privateprofile', $args );

}
add_action( 'init', 'register_book_privateprofile', 0 );
////////////////////////////////////////////////////////////////////////
// Register Correspondence Post Type
function register_book_correspondence() {

	$labels = array(
		'name'                  => _x( 'مراسلات', 'Post Type General Name', 'alghurfa' ),
		'singular_name'         => _x( 'مراسلات', 'Post Type Singular Name', 'alghurfa' ),
		'menu_name'             => __( 'مراسلات', 'alghurfa' ),
		'name_admin_bar'        => __( 'مراسلات', 'alghurfa' ),
		'archives'              => __( 'أرشيف المراسلات', 'alghurfa' ),
		'attributes'            => __( 'مراسلات Attributes', 'alghurfa' ),
		'parent_item_colon'     => __( 'Parent Item:', 'alghurfa' ),
		'all_items'             => __( 'جميع المراسلات', 'alghurfa' ),
		'add_new_item'          => __( 'أضافة مراسلات جديدة', 'alghurfa' ),
		'add_new'               => __( 'أضافة جديد', 'alghurfa' ),
		'new_item'              => __( 'مراسلة جديدة', 'alghurfa' ),
		'edit_item'             => __( 'تعديل المراسلة', 'alghurfa' ),
		'update_item'           => __( 'تحديث المراسلة', 'alghurfa' ),
		'view_item'             => __( 'مشاهدة المراسلة', 'alghurfa' ),
		'view_items'            => __( 'مشاهدة المراسلة', 'alghurfa' ),
		'search_items'          => __( 'بحث المراسلات', 'alghurfa' ),
		'not_found'             => __( 'Not found', 'alghurfa' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'alghurfa' ),
		'featured_image'        => __( 'Featured Image', 'alghurfa' ),
		'set_featured_image'    => __( 'Set featured image', 'alghurfa' ),
		'remove_featured_image' => __( 'Remove featured image', 'alghurfa' ),
		'use_featured_image'    => __( 'Use as featured image', 'alghurfa' ),
		'insert_into_item'      => __( 'Insert into Correspondence', 'alghurfa' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Correspondence', 'alghurfa' ),
		'items_list'            => __( 'Correspondence list', 'alghurfa' ),
		'items_list_navigation' => __( 'Correspondence list navigation', 'alghurfa' ),
		'filter_items_list'     => __( 'Filter Correspondence list', 'alghurfa' ),
	);
	$args = array(
		'label'                 => __( 'Correspondence', 'alghurfa' ),
		'description'           => __( 'Book Correspondence Post Type', 'alghurfa' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'correspondence', $args );

}
add_action( 'init', 'register_book_correspondence', 0 );
////////////////////////////////////////////////////////////////////////
// Register Documentations Post Type
function register_book_documentation() {

	$labels = array(
		'name'                  => _x( 'توثيقات', 'Post Type General Name', 'alghurfa' ),
		'singular_name'         => _x( 'توثيق', 'Post Type Singular Name', 'alghurfa' ),
		'menu_name'             => __( 'توثيقات', 'alghurfa' ),
		'name_admin_bar'        => __( 'توثيقات', 'alghurfa' ),
		'archives'              => __( 'أرشيف التوثيقات', 'alghurfa' ),
		'attributes'            => __( 'Documentation Attributes', 'alghurfa' ),
		'parent_item_colon'     => __( 'Parent Item:', 'alghurfa' ),
		'all_items'             => __( 'جميع التوثيقات', 'alghurfa' ),
		'add_new_item'          => __( 'أضافة توثيق جديد', 'alghurfa' ),
		'add_new'               => __( 'أضافة جديد', 'alghurfa' ),
		'new_item'              => __( 'توثيق جديد', 'alghurfa' ),
		'edit_item'             => __( 'تعديل التوثيق', 'alghurfa' ),
		'update_item'           => __( 'تحديث التوثيق', 'alghurfa' ),
		'view_item'             => __( 'مشاهدة التوثيق', 'alghurfa' ),
		'view_items'            => __( 'مشاهدة التوثيقات', 'alghurfa' ),
		'search_items'          => __( 'بحث التوثيقات', 'alghurfa' ),
		'not_found'             => __( 'Not found', 'alghurfa' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'alghurfa' ),
		'featured_image'        => __( 'Featured Image', 'alghurfa' ),
		'set_featured_image'    => __( 'Set featured image', 'alghurfa' ),
		'remove_featured_image' => __( 'Remove featured image', 'alghurfa' ),
		'use_featured_image'    => __( 'Use as featured image', 'alghurfa' ),
		'insert_into_item'      => __( 'Insert into Documentation', 'alghurfa' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Documentation', 'alghurfa' ),
		'items_list'            => __( 'Documentations list', 'alghurfa' ),
		'items_list_navigation' => __( 'Documentations list navigation', 'alghurfa' ),
		'filter_items_list'     => __( 'Filter Documentations list', 'alghurfa' ),
	);
	$args = array(
		'label'                 => __( 'Documentation', 'alghurfa' ),
		'description'           => __( 'Book Documentations Post Type', 'alghurfa' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'documentation', $args );

}
add_action( 'init', 'register_book_documentation', 0 );
////////////////////////////////////////////////////////////////////////
// Register Readings Post Type
function register_book_reading() {

	$labels = array(
		'name'                  => _x( 'قراءات', 'Post Type General Name', 'alghurfa' ),
		'singular_name'         => _x( 'قراءات', 'Post Type Singular Name', 'alghurfa' ),
		'menu_name'             => __( 'قراءات', 'alghurfa' ),
		'name_admin_bar'        => __( 'قراءات', 'alghurfa' ),
		'archives'              => __( 'أرشيف القراءات', 'alghurfa' ),
		'attributes'            => __( 'Reading Attributes', 'alghurfa' ),
		'parent_item_colon'     => __( 'Parent Item:', 'alghurfa' ),
		'all_items'             => __( 'جميع القراءات', 'alghurfa' ),
		'add_new_item'          => __( 'أضافة قراءة جديدة', 'alghurfa' ),
		'add_new'               => __( 'أضافة جديد', 'alghurfa' ),
		'new_item'              => __( 'قراءة جديدة', 'alghurfa' ),
		'edit_item'             => __( 'تعديل القراءة', 'alghurfa' ),
		'update_item'           => __( 'تحديث القراءة', 'alghurfa' ),
		'view_item'             => __( 'مشاهدة القراءة', 'alghurfa' ),
		'view_items'            => __( 'مشاهدة القراءات', 'alghurfa' ),
		'search_items'          => __( 'بحث القراءات', 'alghurfa' ),
		'not_found'             => __( 'Not found', 'alghurfa' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'alghurfa' ),
		'featured_image'        => __( 'Featured Image', 'alghurfa' ),
		'set_featured_image'    => __( 'Set featured image', 'alghurfa' ),
		'remove_featured_image' => __( 'Remove featured image', 'alghurfa' ),
		'use_featured_image'    => __( 'Use as featured image', 'alghurfa' ),
		'insert_into_item'      => __( 'Insert into Reading', 'alghurfa' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Reading', 'alghurfa' ),
		'items_list'            => __( 'Readings list', 'alghurfa' ),
		'items_list_navigation' => __( 'Readings list navigation', 'alghurfa' ),
		'filter_items_list'     => __( 'Filter Readings list', 'alghurfa' ),
	);
	$args = array(
		'label'                 => __( 'Reading', 'alghurfa' ),
		'description'           => __( 'Book Readings Post Type', 'alghurfa' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'reading', $args );

}
add_action( 'init', 'register_book_reading', 0 );
////////////////////////////////////////////////////////////////////////
// Register Perceptions Post Type
function register_book_perception() {

	$labels = array(
		'name'                  => _x( 'إدراكات', 'Post Type General Name', 'alghurfa' ),
		'singular_name'         => _x( 'إدراك', 'Post Type Singular Name', 'alghurfa' ),
		'menu_name'             => __( 'إدراكات', 'alghurfa' ),
		'name_admin_bar'        => __( 'إدراكات', 'alghurfa' ),
		'archives'              => __( 'أرشيف الإدراكات', 'alghurfa' ),
		'attributes'            => __( 'Perception Attributes', 'alghurfa' ),
		'parent_item_colon'     => __( 'Parent Item:', 'alghurfa' ),
		'all_items'             => __( 'جميع الإدراكات', 'alghurfa' ),
		'add_new_item'          => __( 'أضافة إدراك جديد', 'alghurfa' ),
		'add_new'               => __( 'أصافة جديد', 'alghurfa' ),
		'new_item'              => __( 'إدراك جديد', 'alghurfa' ),
		'edit_item'             => __( 'تعديل الأدراك', 'alghurfa' ),
		'update_item'           => __( 'تحديث الإدراك', 'alghurfa' ),
		'view_item'             => __( 'مشاهدة الإدراك', 'alghurfa' ),
		'view_items'            => __( 'مشاهدة الإدراكات', 'alghurfa' ),
		'search_items'          => __( 'Search Perception', 'alghurfa' ),
		'not_found'             => __( 'Not found', 'alghurfa' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'alghurfa' ),
		'featured_image'        => __( 'Featured Image', 'alghurfa' ),
		'set_featured_image'    => __( 'Set featured image', 'alghurfa' ),
		'remove_featured_image' => __( 'Remove featured image', 'alghurfa' ),
		'use_featured_image'    => __( 'Use as featured image', 'alghurfa' ),
		'insert_into_item'      => __( 'Insert into Perception', 'alghurfa' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Perception', 'alghurfa' ),
		'items_list'            => __( 'Perceptions list', 'alghurfa' ),
		'items_list_navigation' => __( 'Perceptions list navigation', 'alghurfa' ),
		'filter_items_list'     => __( 'Filter Perceptions list', 'alghurfa' ),
	);
	$args = array(
		'label'                 => __( 'Perception', 'alghurfa' ),
		'description'           => __( 'Book Perceptions Post Type', 'alghurfa' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'perception', $args );

}
add_action( 'init', 'register_book_perception', 0 );
////////////////////////////////////////////////////////////////////////
// Register Biography Post Type
function register_book_biography() {

	$labels = array(
		'name'                  => _x( 'سِيرات', 'Post Type General Name', 'alghurfa' ),
		'singular_name'         => _x( 'سيرة', 'Post Type Singular Name', 'alghurfa' ),
		'menu_name'             => __( 'سِيرات', 'alghurfa' ),
		'name_admin_bar'        => __( 'سِيرات', 'alghurfa' ),
		'archives'              => __( 'أرشيف السِيرات', 'alghurfa' ),
		'attributes'            => __( 'Perception Attributes', 'alghurfa' ),
		'parent_item_colon'     => __( 'Parent Item:', 'alghurfa' ),
		'all_items'             => __( 'جميع السِيرات', 'alghurfa' ),
		'add_new_item'          => __( 'أضافة سيرة جديد', 'alghurfa' ),
		'add_new'               => __( 'أصافة جديد', 'alghurfa' ),
		'new_item'              => __( 'سيرة جديد', 'alghurfa' ),
		'edit_item'             => __( 'تعديل السيرة', 'alghurfa' ),
		'update_item'           => __( 'تحديث السيرة', 'alghurfa' ),
		'view_item'             => __( 'مشاهدة السيرة', 'alghurfa' ),
		'view_items'            => __( 'مشاهدة السيرات', 'alghurfa' ),
		'search_items'          => __( 'Search Perception', 'alghurfa' ),
		'not_found'             => __( 'Not found', 'alghurfa' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'alghurfa' ),
		'featured_image'        => __( 'Featured Image', 'alghurfa' ),
		'set_featured_image'    => __( 'Set featured image', 'alghurfa' ),
		'remove_featured_image' => __( 'Remove featured image', 'alghurfa' ),
		'use_featured_image'    => __( 'Use as featured image', 'alghurfa' ),
		'insert_into_item'      => __( 'Insert into Perception', 'alghurfa' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Perception', 'alghurfa' ),
		'items_list'            => __( 'Perceptions list', 'alghurfa' ),
		'items_list_navigation' => __( 'Perceptions list navigation', 'alghurfa' ),
		'filter_items_list'     => __( 'Filter Perceptions list', 'alghurfa' ),
	);
	$args = array(
		'label'                 => __( 'Biographies', 'alghurfa' ),
		'description'           => __( 'Book Biographies Post Type', 'alghurfa' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'biography', $args );

}
add_action( 'init', 'register_book_biography', 0 );
////////////////////////////////////////////////////////////////////////
// Register Researches Post Type
function register_book_research() {

	$labels = array(
		'name'                  => _x( 'بحوث', 'Post Type General Name', 'alghurfa' ),
		'singular_name'         => _x( 'بحث', 'Post Type Singular Name', 'alghurfa' ),
		'menu_name'             => __( 'بحوث', 'alghurfa' ),
		'name_admin_bar'        => __( 'بحوث', 'alghurfa' ),
		'archives'              => __( 'أرشيف البحوث', 'alghurfa' ),
		'attributes'            => __( 'Perception Attributes', 'alghurfa' ),
		'parent_item_colon'     => __( 'Parent Item:', 'alghurfa' ),
		'all_items'             => __( 'جميع البحوث', 'alghurfa' ),
		'add_new_item'          => __( 'أضافة بحث جديد', 'alghurfa' ),
		'add_new'               => __( 'أصافة بحث', 'alghurfa' ),
		'new_item'              => __( 'بحث جديد', 'alghurfa' ),
		'edit_item'             => __( 'تعديل البحث', 'alghurfa' ),
		'update_item'           => __( 'تحديث البحث', 'alghurfa' ),
		'view_item'             => __( 'مشاهدة البحث', 'alghurfa' ),
		'view_items'            => __( 'مشاهدة البحوث', 'alghurfa' ),
		'search_items'          => __( 'Search Perception', 'alghurfa' ),
		'not_found'             => __( 'Not found', 'alghurfa' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'alghurfa' ),
		'featured_image'        => __( 'Featured Image', 'alghurfa' ),
		'set_featured_image'    => __( 'Set featured image', 'alghurfa' ),
		'remove_featured_image' => __( 'Remove featured image', 'alghurfa' ),
		'use_featured_image'    => __( 'Use as featured image', 'alghurfa' ),
		'insert_into_item'      => __( 'Insert into Perception', 'alghurfa' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Perception', 'alghurfa' ),
		'items_list'            => __( 'Perceptions list', 'alghurfa' ),
		'items_list_navigation' => __( 'Perceptions list navigation', 'alghurfa' ),
		'filter_items_list'     => __( 'Filter Perceptions list', 'alghurfa' ),
	);
	$args = array(
		'label'                 => __( 'Research', 'alghurfa' ),
		'description'           => __( 'Book Researches Post Type', 'alghurfa' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'research', $args );

}
add_action( 'init', 'register_book_research', 0 );
////////////////////////////////////////////////////////////////////////
// Register Dialogues Post Type
function register_book_dialogue() {

	$labels = array(
		'name'                  => _x( 'حوار', 'Post Type General Name', 'alghurfa' ),
		'singular_name'         => _x( 'حوار', 'Post Type Singular Name', 'alghurfa' ),
		'menu_name'             => __( 'حوارات', 'alghurfa' ),
		'name_admin_bar'        => __( 'حوارات', 'alghurfa' ),
		'archives'              => __( 'أرشيف الحوارات', 'alghurfa' ),
		'attributes'            => __( 'Perception Attributes', 'alghurfa' ),
		'parent_item_colon'     => __( 'Parent Item:', 'alghurfa' ),
		'all_items'             => __( 'جميع الحوارات', 'alghurfa' ),
		'add_new_item'          => __( 'أضافة حوار جديد', 'alghurfa' ),
		'add_new'               => __( 'أصافة حوار', 'alghurfa' ),
		'new_item'              => __( 'حوار جديد', 'alghurfa' ),
		'edit_item'             => __( 'تعديل الحوار', 'alghurfa' ),
		'update_item'           => __( 'تحديث الحوار', 'alghurfa' ),
		'view_item'             => __( 'مشاهدة الحوار', 'alghurfa' ),
		'view_items'            => __( 'مشاهدة الحوارات', 'alghurfa' ),
		'search_items'          => __( 'Search Perception', 'alghurfa' ),
		'not_found'             => __( 'Not found', 'alghurfa' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'alghurfa' ),
		'featured_image'        => __( 'Featured Image', 'alghurfa' ),
		'set_featured_image'    => __( 'Set featured image', 'alghurfa' ),
		'remove_featured_image' => __( 'Remove featured image', 'alghurfa' ),
		'use_featured_image'    => __( 'Use as featured image', 'alghurfa' ),
		'insert_into_item'      => __( 'Insert into Perception', 'alghurfa' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Perception', 'alghurfa' ),
		'items_list'            => __( 'Perceptions list', 'alghurfa' ),
		'items_list_navigation' => __( 'Perceptions list navigation', 'alghurfa' ),
		'filter_items_list'     => __( 'Filter Perceptions list', 'alghurfa' ),
	);
	$args = array(
		'label'                 => __( 'Dialogue', 'alghurfa' ),
		'description'           => __( 'Book Researches Post Type', 'alghurfa' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'dialogue', $args );

}
add_action( 'init', 'register_book_dialogue', 0 );
////////////////////////////////////////////////////////////////////////

// register custom taxonomy (issues)
$issues = array(
    'name'                          => __( 'الأعداد', 'alghurfa' ),
    'singular_name'                 => __( 'العدد', 'alghurfa' ),
    'search_items'                  => __( 'بحث الأعداد', 'alghurfa' ),
    'popular_items'                 => __( 'الأعداد', 'alghurfa' ),
    'all_items'                     => __( 'جميع الأعداد', 'alghurfa' ),
    'parent_item'                   => __( 'Parent Shop', 'alghurfa' ),
    'edit_item'                     => __( 'تعديل العدد', 'alghurfa' ),
    'update_item'                   => __( 'تحديث العدد', 'alghurfa' ),
    'add_new_item'                  => __( 'أضافة عدد جديد', 'alghurfa' ),
    'new_item_name'                 => __( 'عدد جديد', 'alghurfa' ),
    'separate_items_with_commas'    => __( 'Separate Issues with commas', 'alghurfa' ),
    'add_or_remove_items'           => __( 'Add or remove Issues', 'alghurfa' ),
    'choose_from_most_used'         => __( 'Choose from most used Issues', 'alghurfa' )
);
 
$issues_args = array(
    'labels'                        => $issues,
    'public'                        => true,
    'hierarchical'                  => true,
    'show_ui'                       => true,
    'show_in_nav_menus'             => true,
    'query_var'                     => true
);
 
register_taxonomy( 'issues', array('provisions','privateprofile', 'correspondence', 'documentation', 'reading', 'perception', 'biography', 'research', 'dialogue'), $issues_args );
////////////////////////////////////////////////////////////////////////


// register custom taxonomy (issues)
$collaborators = array(
    'name'                          => __( 'المشاركين', 'alghurfa' ),
    'singular_name'                 => __( 'المشارك', 'alghurfa' ),
    'search_items'                  => __( 'بحث المشاركين', 'alghurfa' ),
    'popular_items'                 => __( 'المشاركين', 'alghurfa' ),
    'all_items'                     => __( 'جميع المشاركين', 'alghurfa' ),
    'parent_item'                   => __( 'Parent Shop', 'alghurfa' ),
    'edit_item'                     => __( 'تعديل المشارك', 'alghurfa' ),
    'update_item'                   => __( 'تحديث المشارك', 'alghurfa' ),
    'add_new_item'                  => __( 'أضافة مشارك جديد', 'alghurfa' ),
    'new_item_name'                 => __( 'مشارك جديد', 'alghurfa' ),
    'separate_items_with_commas'    => __( 'Separate Issues with commas', 'alghurfa' ),
    'add_or_remove_items'           => __( 'Add or remove Issues', 'alghurfa' ),
    'choose_from_most_used'         => __( 'Choose from most used Issues', 'alghurfa' )
);
 
$collaborators_args = array(
    'labels'                        => $collaborators,
    'public'                        => true,
    'hierarchical'                  => true,
    'show_ui'                       => true,
    'show_in_nav_menus'             => true,
    'query_var'                     => true
);
 
register_taxonomy( 'collaborators', array('provisions','privateprofile', 'correspondence', 'documentation', 'reading', 'perception', 'biography', 'research', 'dialogue'), $collaborators_args );
////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////// Move media menu order to up
function wpse_233129_custom_menu_order() {
    return array( 'index.php', 'upload.php' );
}
add_filter( 'custom_menu_order', '__return_true' );
add_filter( 'menu_order', 'wpse_233129_custom_menu_order' );
////////////////////////////////////////////////////////////////////////

// hide adminbar from frontend
add_filter('show_admin_bar', '__return_false');
////////////////////////////////////////////////////////////////////////

////////// Show up featured image
add_theme_support( 'post-thumbnails' ); 
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////// Remove Unused Default WordPress Menus
// ************* Remove default Posts type since no blog *************
// Remove side menu
add_action( 'admin_menu', 'remove_default_post_type' );
function remove_default_post_type() {
    remove_menu_page( 'edit.php' );
}
// Remove +New post in top Admin Menu Bar
add_action( 'admin_bar_menu', 'remove_default_post_type_menu_bar', 999 );
function remove_default_post_type_menu_bar( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'new-post' );
}
// Remove Quick Draft Dashboard Widget
add_action( 'wp_dashboard_setup', 'remove_draft_widget', 999 );
function remove_draft_widget(){
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
}
// End remove post type
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

////////// Add Images Custom Sizes
add_image_size( 'prov_thumb', 450 , 220, true, array('center')  ); //Provision Thumbnail
add_image_size( 'portrait_thumb', 490, 566, true, array('center')  ); //Post Thumb Portrait
add_image_size( 'post_hero', 960 , 515, array('center')  ); //Post Hero
////////////////////////////////////////////////////////////////////////

//////////////////////////////// Remove WP Editor from homepage
function feh_remove_editor() {
   if (isset($_GET['post'])) {	
      $id = $_GET['post'];	
      $remove_editor_ids = array(44);
      foreach($remove_editor_ids as $remove_editor_id) {
         if (in_array($id, $remove_editor_ids)) {
            remove_post_type_support('page', 'editor');
         }
      }
   }
}
add_action('init', 'feh_remove_editor');
////////////////////////////////////////////////////////////////////////


//////////////////////////////// Add dynamic content (issue) cmb2 to homepage
function get_issues_names() {
	$return_issues = array();
	$issues = get_terms('issues', array("fields" => "ids", 'hide_empty' => true));
	foreach($issues as $issue) {
		$issue_name = get_term( $issue )->name;
		$return_issues[$issue] = $issue_name;
	}
	return $return_issues;
}

add_action( 'cmb2_admin_init', 'homepage_dynamic_content' );
function homepage_dynamic_content() {
  $prefix = '_hmdyncontent_';

  $home_cmb_content = new_cmb2_box( array(
    'id'           => $prefix . 'hmpgecont',
    'title'        => 'Dynamic Content',
    'object_types' => array( 'page' ),
    'context'      => 'normal',
    'show_names'   => true,
    'show_on' => array( 'key' => 'id', 'value' => array(44) ),
    'closed' => false
  ));


  $home_cmb_content->add_field( array(
    'name' => 'Default Issue',
    'desc' => 'Choose the default issue',
    'id'   => 'default_issue',
    'taxonomy'       => 'issues', //Enter Taxonomy Slug
    'type'           => 'select',
    'options' => get_issues_names(),
  ));

}
////////////////////////////////////////////////////////////////////////

//////////////////////////////// function get related post_types to issue term id
function get_posttypes_of_issue($issue_id){

	$posttypes_array = array();
	if($issue_id) {
		$term = get_term_by('term_id', $issue_id, 'issues');
		$posttypes = get_taxonomy( $term->taxonomy )->object_type;

		if($posttypes) {
			foreach($posttypes as $posttype) {
				$hasposts = get_posts(array(
				  'post_type' => $posttype,
				  'tax_query' => array(
				    array(
				      'taxonomy' => 'issues',
				      'field' => 'term_id', 
				      'terms' => $issue_id, /// Where term_id of Term 1 is "1".
				    )
				  )
				));

				// $hasposts = get_posts('post_type='.$posttype.'&tax_query=array(array('')))';
				if( !empty ( $hasposts ) ) {
					$posttypes_array[] = $posttype;
				}
				
			}
			return $posttypes_array;
		}
	}

}
//////////////////////////////////////////////////////////////////////////////////

//////////////////////////////// Add dynamic layout options cmb2 to issue (taxonomy)
add_action( 'cmb2_admin_init', 'issue_dynamic_layout' );
function issue_dynamic_layout() {
	$prefix = '_issuedynamiclayout_';

	$issue_cmb_dlayout = new_cmb2_box( array(
		'id'           => $prefix . 'isdynlay',
		'title'        => 'Dynamic Layout',
		'object_types' => array('term'), // Terms
		'taxonomies' => array('issues'), // Terms
		'context'      => 'normal',
		'show_names'   => true,
		'closed' => false
	));

	$get_url = get_bloginfo('url');
	$get_term_id = absint( $_REQUEST['tag_ID'] );
	if($get_term_id) {
		$issue_post_types = get_posttypes_of_issue($get_term_id);
		if($issue_post_types) {
			$issue_post_types_count = count($issue_post_types);
			foreach($issue_post_types as $issue_post_type) {

				////// get Arabic name of the post types
				$issue_post_type_ar_name = get_translation($issue_post_type);;
				//////////////////////////////////////////////////////////////

				$issue_cmb_dlayout->add_field( array(
					'name' =>  $issue_post_type_ar_name,
					'id'   => 'dlayout_' . $issue_post_type,
					'type' => 'radio_inline',
					'options' => array(
						'layout_1' => '<img src="'.$get_url.'/wp-content/themes/alghurfa/img/layout_1.png" width="150" height="auto" alt="Image 1" title="Image 1">',
						'layout_2' => '<img src="'.$get_url.'/wp-content/themes/alghurfa/img/layout_2.png" width="150" height="auto" alt="Image 2" title="Image 2">',
						'layout_3' => '<img src="'.$get_url.'/wp-content/themes/alghurfa/img/layout_3.png" width="150" height="auto" alt="Image 3" title="Image 3">',
						'layout_4' => '<img src="'.$get_url.'/wp-content/themes/alghurfa/img/layout_4.png" width="150" height="auto" alt="Image 4" title="Image 4">',
						'layout_5' => '<img src="'.$get_url.'/wp-content/themes/alghurfa/img/layout_5.png" width="150" height="auto" alt="Image 5" title="Image 5">',
						'layout_6' => '<img src="'.$get_url.'/wp-content/themes/alghurfa/img/layout_6.png" width="150" height="auto" alt="Image 6" title="Image 6">',
					),
				));
			}
		}
	}	
}
//////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
// Get long Arabic text titles
function get_long_titles($title) {
  if($title == 'provisions') {
  	return 'نصـــــــــــــــــــــــــ</br>ـــــــــــــــــــــــوص';
  } elseif($title == 'privateprofile') {
  	return 'ملـــــــــــــــــــــــــــــ<br>ــــــــف خـــــــــاص';
  } elseif($title == 'correspondence') {
  	return 'مراســــــــــــــــــــــ<br>ـــــــــــــــــــــــــلات';
  } elseif($title == 'documentation') {
  	return 'توثـــــــــــــــــــــــــ<br>ـــــــــــيــــــــــــــق';
  } elseif($title == 'reading') {
  	return 'قـــــــــــــــــــــــــرا<br>ءاتـــــــــــــــــــــــــ';
  } elseif($title == 'perception') {
  	return 'إدراكــــــــــــــــــــــ<br>ــــــــــــــــــــــــات';
  }
}
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
// Social Media Links
add_action( 'cmb2_admin_init', 'social_links_metabox_theme_options' );
function social_links_metabox_theme_options() {
  $cmb_options = new_cmb2_box( array(
    'id'           => 'social_links_metabox',
    'title'        => esc_html__( 'Social Media', 'cmb2' ),
    'object_types' => array( 'options-page' ),
    'option_key'      => 'social_links_theme_options', 
    'icon_url'        => 'dashicons-share', 
     'save_button'     => esc_html__( 'Save', 'cmb2' ),

  )); 
  $cmb_options->add_field( array(
    'name'    => esc_html__( 'Facebook', 'cmb2' ),
    'id'      => 'fb_link',
    'type'    => 'text_url'
  ) );

  $cmb_options->add_field( array(
    'name'    => esc_html__( 'Twitter', 'cmb2' ),
    'id'      => 'tw_link',
    'type'    => 'text_url'
  ) );

  $cmb_options->add_field( array(
    'name'    => esc_html__( 'Instgram', 'cmb2' ),
    'id'      => 'ig_link',
    'type'    => 'text_url'
  ) );
}
////////////////////////////////////////////////////////////////////////

///////////////////////////// add about page custom meta boxes
add_action( 'cmb2_admin_init', 'about_dynamic_content' );
function about_dynamic_content() {
  $prefix = '_aboutdcontent_';

  $about_cmb_content = new_cmb2_box( array(
    'id'           => $prefix . 'aboutdcont',
    'title'        => 'Publishers',
    'object_types' => array( 'page' ), // post type
    'show_on'      => array( 'key' => 'page-template', 'value' => 'templates/about.php' ),
    'context'      => 'normal',
    'show_names'   => true,
    'closed' => false
  ));

  $about_cmb_content->add_field( array(
    'name' => 'رئيس التحرير',
    'id'   => 'chiefs',
    'type' => 'text',
    'sortable'      => true,
    'repeatable'     => true,
    'repeatable_max' => 20
  ));

  $about_cmb_content->add_field( array(
    'name' => 'مدير التحرير',
    'id'   => 'managers',
    'type' => 'text',
    'sortable'      => true,
    'repeatable'     => true,
    'repeatable_max' => 20
  ));

  $about_cmb_content->add_field( array(
    'name' => 'غرافيك',
    'id'   => 'designers',
    'type' => 'text',
    'sortable'      => true,
    'repeatable'     => true,
    'repeatable_max' => 20
  ));

  $about_cmb_content->add_field( array(
    'name' => 'تصميم داخلي',
    'id'   => 'inner_designers',
    'type' => 'text',
    'sortable'      => true,
    'repeatable'     => true,
    'repeatable_max' => 20
  ));

  $about_cmb_content->add_field( array(
    'name' => 'لجنة استشارية',
    'id'   => 'consultants',
    'type' => 'text',
    'sortable'      => true,
    'repeatable'     => true,
    'repeatable_max' => 20
  ));

}
////////////////////////////////////////////////////////////////////////

//////////////////////////// Get all exisiting issue
function get_issues_exist() {
	$return_issues = array();
	$issues = get_terms('issues', array("fields" => "ids", 'hide_empty' => true));
	foreach($issues as $issue) {
		$issue_name = get_term( $issue )->name;
		$issue_id = get_term( $issue )->term_id;
		$return_issues[] = array('name' => $issue_name, 'id' => $issue_id);
	}
	return $return_issues;
}
////////////////////////////////////////////////////////////////////////

//////////////////////////// Get all exisiting collaborators
function get_collaborators_exist() {
	$return_collaborators = array();
	$collaborators = get_terms('collaborators', array("fields" => "ids", 'hide_empty' => true));
	foreach($collaborators as $collaborator) {
		$collaborator_name = get_term( $collaborator )->name;
		$collaborator_id = get_term( $collaborator )->term_id;
		$return_collaborators[] = array('name' => $collaborator_name, 'id' => $collaborator_id);
	}
	return $return_collaborators;
}
////////////////////////////////////////////////////////////////////////

/////////////////////////// Get all registered post types names
function get_all_posttypes() {
	$post_types_array = array();
	$args = array(
     'public'   => true,
     '_builtin' => false,
  );

  $output = 'names'; // names or objects, note names is the default
  $operator = 'and'; // 'and' or 'or'

  $post_types = get_post_types( $args, $output, $operator );
  
  foreach ( $post_types  as $post_type ) {

  		$post_args = new WP_Query(
	      array(
	        'post_type' => $post_type,
	        'post_status' => array('publish'),
	        'posts_per_page' => 1,
	        'fields' => 'ids',
	        'cache_results' => false,
	      )
	    );

	    $count = $post_args->post_count;
	    if($count > 0) {
	    	$post_types_array[] = $post_type;
	    }
  }
  $post_types_array = array_unique($post_types_array);
  return $post_types_array;
}
////////////////////////////////////////////////////////////////////////

/////////////////////////// Get all registered post types names
function get_all_posttypes_byissue($issue_id) {
	$post_types_array = array();
	$args = array(
     'public'   => true,
     '_builtin' => false,
  );

  $output = 'names'; // names or objects, note names is the default
  $operator = 'and'; // 'and' or 'or'

  $post_types = get_post_types( $args, $output, $operator );
  
  foreach ( $post_types  as $post_type ) {

  		$post_args = new WP_Query(
	      array(
	        'post_type' => $post_type,
	        'post_status' => array('publish'),
	        'posts_per_page' => 1,
	        'fields' => 'ids',
	        'cache_results' => false,
	        'tax_query' => array(
				    array(
					    'taxonomy' => 'issues',
					    'field' => 'term_id',
					    'terms' => $issue_id
				    )
				  )
	      )
	    );

	    $count = $post_args->post_count;
	    if($count > 0) {
	    	$post_types_array[] = $post_type;
	    }
  }
  $post_types_array = array_unique($post_types_array);
  return $post_types_array;
}
////////////////////////////////////////////////////////////////////////

/////////////////////////// Get all collaborators share the same posts with the issue
function get_all_collaborators_byissue($issue_id) {
	if($issue_id) {
		$get_collaborators = array();
		$post_types = get_all_posttypes_byissue($issue_id);
		$post_args = new WP_Query(
      array(
        'post_type' => $post_types,
        'post_status' => array('publish'),
        'posts_per_page' => -1,
        'fields' => 'ids',
        'cache_results' => false,
        'tax_query' => array(
        	'relation' => 'AND', //Must satisfy all taxonomy queries
			    array(
				    'taxonomy' => 'issues',
				    'field' => 'term_id',
				    'terms' => $issue_id
			    ),
			    array(
			    	'taxonomy'  => 'collaborators',
            'operator' => 'EXISTS',
			    )
			  )
      )
    );

    if ( $post_args->have_posts() ) :
	    while ( $post_args->have_posts() ) : $post_args->the_post();
	      $postID = get_the_id();
	      $get_collaborators[] = wp_get_post_terms($postID, 'collaborators', array('fields' => 'ids'));
	    endwhile;
	  endif;
	  wp_reset_query($post_args);
	}
	return $get_collaborators;
}
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
// include ajax functions
require_once('templates/ajax-functions.php');
////////////////////////////////////////////////////////////////////////

////////////////////////////////////// Get only all custom/registered post types
function get_registered_post_types() {
	$args = array(
     'public'   => true,
     '_builtin' => false,
  );
  $output = 'names'; // names or objects, note names is the default
  $operator = 'and'; // 'and' or 'or'
  $post_types = get_post_types( $args, $output, $operator );
  
  return $post_types;
}




?>