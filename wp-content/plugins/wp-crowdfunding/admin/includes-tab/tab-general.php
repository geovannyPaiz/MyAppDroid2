<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
global $wp_roles;
$pages = wpneo_get_published_pages();
$page_array = array();
if (count($pages)>0) {
    foreach ($pages as $page) {
        $page_array[$page->ID] = $page->post_title;
    }
}
$pages = $page_array;

$campaign_creator    = array();
$roles  = get_editable_roles();

if (count($roles)){
    foreach( $roles as $key=>$role ){
        $campaign_creator[] = $key;
    }
}

$arr =  array(
    // #General Seperator
    array(
        'type'      => 'seperator',
        'label'     => __('General Settings','wp-crowdfunding'),
        'top_line'  => 'true',
    ),

    // #Funds Manager
    array(
        'id'        => 'vendor_type',
        'type'      => 'dropdown',
        'option'    => array(
            'woocommerce' => __('Woocommerce','wp-crowdfunding'),
        ),
        'label'     => __('Funds Manager','wp-crowdfunding'),
        'desc'      => __('Define the system you want to use to receive and manage the funds raised for your campaigns','wp-crowdfunding'),
    ),

    // #Default Campaign Status
    array(
        'id'        => 'wpneo_default_campaign_status',
        'type'      => 'dropdown',
        'option'    => array(
            'publish'    => __('Published','wp-crowdfunding'),
            'pending'    => __('Pending Review','wp-crowdfunding'),
            'draft'      => __('Draft','wp-crowdfunding'),
        ),
        'label'     => __('Default Campaign Status','wp-crowdfunding'),
        'desc'      => __('Default status of a campaign added by a user','wp-crowdfunding'),
    ),

    // #Enable Minimum Price
    array(
        'id'        => 'wpneo_show_min_price',
        'type'      => 'checkbox',
        'value'     => 'true',
        'label'     => __('Enable Minimum Price','wp-crowdfunding'),
        'desc'      => __('Enable minimum price option on the campaign submission form','wp-crowdfunding'),
    ),

    // #Enable Maximum Price
    array(
        'id'        => 'wpneo_show_max_price',
        'type'      => 'checkbox',
        'value'     => 'true',
        'label'     => __('Enable Maximum Price','wp-crowdfunding'),
        'desc'      => __('Enable maximum price option on the campaign submission form','wp-crowdfunding'),
    ),

    // #Enable Recommended Price
    array(
        'id'        => 'wpneo_show_recommended_price',
        'type'      => 'checkbox',
        'value'     => 'true',
        'label'     => __('Enable Recommended Price','wp-crowdfunding'),
        'desc'      => __('Enable recommended price option on the campaign submission form','wp-crowdfunding'),
    ),

    // #Show Target Goal
    array(
        'id'        => 'wpneo_show_target_goal',
        'type'      => 'checkbox',
        'value'     => 'true',
        'label'     => __('Enable/Disable','wp-crowdfunding'),
        'desc'      => __('Show Target Goal','wp-crowdfunding'),
    ),

    // #Show Target Date
    array(
        'id'        => 'wpneo_show_target_date',
        'type'      => 'checkbox',
        'value'     => 'true',
        'label'     => __('Enable/Disable','wp-crowdfunding'),
        'desc'      => __('Show Target Date','wp-crowdfunding'),
    ),

    // #Show Target Goal & Date
    array(
        'id'        => 'wpneo_show_target_goal_and_date',
        'type'      => 'checkbox',
        'value'     => 'true',
        'label'     => __('Enable/Disable','wp-crowdfunding'),
        'desc'      => __('Show Target Goal & Date','wp-crowdfunding'),
    ),

    // #Show Campaign Never End
    array(
        'id'        => 'wpneo_show_campaign_never_end',
        'type'      => 'checkbox',
        'value'     => 'true',
        'label'     => __('Enable/Disable','wp-crowdfunding'),
        'desc'      => __('Show Campaign Never End','wp-crowdfunding'),
    ),

    // #Select Dashboard Page
    array(
        'id'        => 'wpneo_crowdfunding_dashboard_page_id',
        'type'      => 'dropdown',
        'option'    => $pages,
        'label'     => __('Select Dashboard Page','wp-crowdfunding'),
        'desc'      => __('Select a page for access crowdfunding frontend dashboard','wp-crowdfunding'),
    ),

    // #Select Campaign Submit Form
    array(
        'id'        => 'wpneo_form_page_id',
        'type'      => 'dropdown',
        'option'    => $pages,
        'label'     => __('Select Campaign Submit Form','wp-crowdfunding'),
        'desc'      => __('Select a predefined WooCommerce campaign submission form page','wp-crowdfunding'),
    ),

    // #User Role Selector Option
    array(
        'id'        => 'wpneo_user_role_selector',
        'type'      => 'multiple',
        'multiple'  => 'true',
        'option'    => $campaign_creator,
        'label'     => __('Campaign Creator','wp-crowdfunding'),
        'desc'      => __('Select roles which can enable front end campaign submission form','wp-crowdfunding'),
    ),

    // #Save Function
    array(
        'id'        => 'wpneo_crowdfunding_admin_tab',
        'type'      => 'hidden',
        'value'     => 'tab_general',
    ),
);
echo wpneo_crowdfunding_settings_generate_field( $arr );
?>