<?php
// Theme Options CMB
add_action( 'cmb2_admin_init', 'gh_register_theme_options_metabox' );
/**
 * Hook in and register a metabox to handle a theme options page and adds a menu item.
 */
function gh_register_theme_options_metabox() {

  /**
   * Translation
   */
  $cmb_translations = new_cmb2_box( array(
    'id'           => 'gh_translations_metabox',
    'title'        => esc_html__( 'Translations', 'cmb2' ),
    'object_types' => array( 'options-page' ),
    'option_key'      => 'gh_translations', 
    'icon_url'        => 'dashicons-edit', 
    'save_button'     => esc_html__( 'Save Translations', 'cmb2' ), 
  ));

  $cmb_translations->add_field( array(
    'name'    => esc_html__( 'provisions', 'cmb2' ),
    'id'      => 'provisions',
    'type' => 'text'
  ) );

  $cmb_translations->add_field( array(
    'name'    => esc_html__( 'provisions (Ar)', 'cmb2' ),
    'id'      => 'provisions_ar',
    'type' => 'text'
  ) );

  $cmb_translations->add_field( array(
    'name'    => esc_html__( 'privateprofile', 'cmb2' ),
    'id'      => 'privateprofile',
    'type' => 'text'
  ) );

  $cmb_translations->add_field( array(
    'name'    => esc_html__( 'privateprofile (Ar)', 'cmb2' ),
    'id'      => 'privateprofile_ar',
    'type' => 'text'
  ) );

  $cmb_translations->add_field( array(
    'name'    => esc_html__( 'correspondence', 'cmb2' ),
    'id'      => 'correspondence',
    'type' => 'text'
  ) );

  $cmb_translations->add_field( array(
    'name'    => esc_html__( 'correspondence (Ar)', 'cmb2' ),
    'id'      => 'correspondence_ar',
    'type' => 'text'
  ) );

  $cmb_translations->add_field( array(
    'name'    => esc_html__( 'documentation', 'cmb2' ),
    'id'      => 'documentation',
    'type' => 'text'
  ) );

  $cmb_translations->add_field( array(
    'name'    => esc_html__( 'documentation (Ar)', 'cmb2' ),
    'id'      => 'documentation_ar',
    'type' => 'text'
  ) );

  $cmb_translations->add_field( array(
    'name'    => esc_html__( 'reading', 'cmb2' ),
    'id'      => 'reading',
    'type' => 'text'
  ) );

  $cmb_translations->add_field( array(
    'name'    => esc_html__( 'reading (Ar)', 'cmb2' ),
    'id'      => 'reading_ar',
    'type' => 'text'
  ) );

  $cmb_translations->add_field( array(
    'name'    => esc_html__( 'perception', 'cmb2' ),
    'id'      => 'perception',
    'type' => 'text'
  ) );

  $cmb_translations->add_field( array(
    'name'    => esc_html__( 'perception (Ar)', 'cmb2' ),
    'id'      => 'perception_ar',
    'type' => 'text'
  ) );

  $cmb_translations->add_field( array(
    'name'    => esc_html__( 'biography', 'cmb2' ),
    'id'      => 'biography',
    'type' => 'text'
  ) );

  $cmb_translations->add_field( array(
    'name'    => esc_html__( 'biography (Ar)', 'cmb2' ),
    'id'      => 'biography_ar',
    'type' => 'text'
  ) );

  $cmb_translations->add_field( array(
    'name'    => esc_html__( 'research', 'cmb2' ),
    'id'      => 'research',
    'type' => 'text'
  ) );

  $cmb_translations->add_field( array(
    'name'    => esc_html__( 'research (Ar)', 'cmb2' ),
    'id'      => 'research_ar',
    'type' => 'text'
  ) );

  $cmb_translations->add_field( array(
    'name'    => esc_html__( 'dialogue', 'cmb2' ),
    'id'      => 'dialogue',
    'type' => 'text'
  ) );

  $cmb_translations->add_field( array(
    'name'    => esc_html__( 'dialogue (Ar)', 'cmb2' ),
    'id'      => 'dialogue_ar',
    'type' => 'text'
  ) );
}
?>