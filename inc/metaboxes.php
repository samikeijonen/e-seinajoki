<?php
/**
 * CMB2 metaboxes used by the plugin from wordpress.org.
 *
 * @package Asioi_Seinäjoki
 */

/**
 * Define the metabox and field configurations for Front Page Info Boxes.
 *
 * @since 1.0.0
 */
function e_seinajoki_front_page_info() {
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_e_seinajoki_';

	/**
	* Repeatable Field Groups
	*/
	$cmb_group = new_cmb2_box( array(
		'id'           => $prefix . 'fp_infos',
		'title'        => esc_html__( 'Info', 'e-seinajoki' ),
		'object_types' => array( 'page', ),
		'show_on'      => array( 'key' => 'page-template', 'value' => 'templates/front-page.php' ),
	) );

	// $group_field_id is the field id string, so in this case: $prefix . 'fp_infos'
	$group_field_id = $cmb_group->add_field( array(
		'id'          => $prefix . 'fp_infos',
		'type'        => 'group',
		'description' => esc_html__( 'Info boxes', 'e-seinajoki' ),
		'options'     => array(
			'group_title'   => esc_html__( 'Info box {#}', 'e-seinajoki' ), // {#} gets replaced by row number
			'add_button'    => esc_html__( 'Add Another Info box', 'e-seinajoki' ),
			'remove_button' => esc_html__( 'Remove Info box', 'e-seinajoki' ),
			'sortable'      => true, // beta
		),
	) );

	/**
	* Group fields works the same, except ids only need
	* to be unique to the group. Prefix is not needed.
	*
	* The parent field's id needs to be passed as the first argument.
	*/

	$cmb_group->add_group_field( $group_field_id, array(
		'name'        => esc_html__( 'Image', 'e-seinajoki' ),
		'description' => esc_html__( 'Image size 880 x 495', 'e-seinajoki' ),
		'id'          => 'image',
		'type'        => 'file',
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name' => esc_html__( 'Title', 'e-seinajoki' ),
		'id'   => 'title',
		'type' => 'text',
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name'     => esc_html__( 'Title color', 'e-seinajoki' ),
		'id'       => 'title_color',
		'type'     => 'select',
		'default'  => '0099ab',
		'options'  => array(
			'0099ab' => __( 'Turquoise (#0099ab)', 'e-seinajoki' ),
			'ffc425' => __( 'Yellow (#ffc425)', 'e-seinajoki' ),
			'e50e63' => __( 'Pink (#e50e63)', 'e-seinajoki' ),
		),
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name' => esc_html__( 'Content', 'e-seinajoki' ),
		'id'   => 'content',
		'type' => 'wysiwyg',
	) );

}
add_action( 'cmb2_admin_init', 'e_seinajoki_front_page_info' );

/**
 * Define the metabox and field configurations for Front Page Footer.
 *
 * @since 1.0.0
 */
function e_seinajoki_front_page_footer() {
	// Start with an underscore to hide fields from custom fields list.
	$prefix = '_e_seinajoki_';

	/**
	 * Initiate the metabox
	 */
	$metaboxes = new_cmb2_box( array(
		'id'           => $prefix . 'footer',
		'title'        => esc_html__( 'Footer Info', 'e-seinajoki' ),
		'object_types' => array( 'page', ),
		'show_on'      => array( 'key' => 'page-template', 'value' => 'templates/front-page.php' ),
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
	) );

	// Regular text field.
	$metaboxes->add_field( array(
		'name' => esc_html__( 'Left column title', 'e-seinajoki' ),
		'id'   => $prefix . 'footer_cl_1_title',
		'type' => 'text',
	) );

	// Regular wysiwyg field.
	$metaboxes->add_field( array(
		'name' => esc_html__( 'Left column', 'e-seinajoki' ),
		'id'   => $prefix . 'footer_cl_1_text',
		'type' => 'wysiwyg',
	) );

	// Regular text field.
	$metaboxes->add_field( array(
		'name' => esc_html__( 'Right column title', 'e-seinajoki' ),
		'id'   => $prefix . 'footer_cl_2_title',
		'type' => 'text',
	) );

	// Regular wysiwyg field.
	$metaboxes->add_field( array(
		'name' => esc_html__( 'Right column', 'e-seinajoki' ),
		'id'   => $prefix . 'footer_cl_2_text',
		'type' => 'wysiwyg',
	) );

	// Regular text field.
	$metaboxes->add_field( array(
		'name' => esc_html__( 'Social media title', 'e-seinajoki' ),
		'id'   => $prefix . 'footer_social_title',
		'type' => 'text',
	) );
}
add_action( 'cmb2_admin_init', 'e_seinajoki_front_page_footer' );

/**
 * Define the metabox and field configurations for Front Page Info Boxes.
 *
 * @since 1.0.0
 */
function e_seinajoki_email_fields_footer() {
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_e_seinajoki_';

	/**
	* Repeatable Field Groups
	*/
	$cmb_group = new_cmb2_box( array(
		'id'           => $prefix . 'footer_emails',
		'title'        => esc_html__( 'Footer emails', 'e-seinajoki' ),
		'object_types' => array( 'page', ),
		'show_on'      => array( 'key' => 'page-template', 'value' => 'templates/front-page.php' ),
	) );

	// $group_field_id is the field id string, so in this case: $prefix . 'footer_emails'
	$group_field_id = $cmb_group->add_field( array(
		'id'          => $prefix . 'footer_emails',
		'type'        => 'group',
		'description' => esc_html__( 'Email fields', 'e-seinajoki' ),
		'options'     => array(
			'group_title'   => esc_html__( 'Email {#}', 'e-seinajoki' ), // {#} gets replaced by row number
			'add_button'    => esc_html__( 'Add Another Email', 'e-seinajoki' ),
			'remove_button' => esc_html__( 'Remove Email', 'e-seinajoki' ),
			'sortable'      => false, // beta
		),
	) );

	/**
	* Group fields works the same, except ids only need
	* to be unique to the group. Prefix is not needed.
	*
	* The parent field's id needs to be passed as the first argument.
	*/

	$cmb_group->add_group_field( $group_field_id, array(
		'name' => esc_html__( 'Email', 'e-seinajoki' ),
		'id'   => 'email',
		'type' => 'text_email',
	) );
}
add_action( 'cmb2_admin_init', 'e_seinajoki_email_fields_footer' );
