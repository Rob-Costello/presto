<?php

///////////////////////////////////////////////////
//////////// REMOVE WHAT YOU DONT NEED ////////////
///////////////////////////////////////////////////


///////////////////////////////////////////////////
////////////////// NICE TO HAVES //////////////////
///////////////////////////////////////////////////

add_action('login_head', 'addCustomLoginLogo'); // custom admin login logo


///////////////////////////////////////////////////
////////////////// USEFUL EXTRAS //////////////////
///////////////////////////////////////////////////

add_image_size('custom-image', 1200, 800, true); // Additional image size ( (string)size name, (int)width, (int)height, (bool)true/false true = cropped )add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );

///////////////////////////////////////////////////
////////////////// DEFAULTS BELOW /////////////////
///////////////////////////////////////////////////

add_action('after_setup_theme', 'stickyMediaThemeSetup');

function stickyMediaThemeSetup()
{

    add_theme_support('post-thumbnails'); // Add featured images to posts
    add_post_type_support('page', 'excerpt'); // Add excerpt to pages

    //Add actions
    add_action('init', 'addDefaultThemeMenus'); // Add default menus for theme
    add_action('wp_print_styles', 'pm_remove_all_styles', 100);
    add_action('wp_print_scripts', 'pm_remove_all_scripts', 100);
    add_action('wp_enqueue_scripts', 'addDefaultThemeStyles');// Add default theme stylesheets
    add_action('admin_menu', 'removeDefaultAdminMenuOptions'); // Remove menu items
    add_action( 'admin_menu', 'changePluginMenu' ); // Modify admin plugin link to default to active
    add_action( 'wp_footer', 'deregisterEmbedScripts' ); // Removes wp-embed.min.js from footer (this file is needed to embed video)
    add_action( 'widgets_init', 'arphabet_widgets_init' );

    //Add filters
    add_filter('body_class', 'addSlugToBodyClass'); // Adds slug name to body class for styling and targeting
    add_filter('admin_footer_text', 'addLinkAdminFooter'); // Add company link to admin footer
    add_filter('nav_menu_css_class', 'cleanMenu', 100, 1); // Remove IDs from menu classes
    add_filter('nav_menu_item_id', 'cleanMenu', 100, 1); // Remove IDs from menu items
    add_filter('page_css_class', 'cleanMenu', 100, 1); // Remove IDs from page classes
    add_filter('the_content', 'removePtagsFromImages'); // Remove the <p> from around imgs
    add_filter( 'views_plugins', 'changePluginViews' ); // Modify plugin page views to only show active
    add_filter('rest_enabled', '_return_false');

    // Remove actions from header
    remove_action('wp_head', 'parent_post_rel_link', 10, 0); // prev link
    remove_action('wp_head', 'start_post_rel_link', 10, 0); // start link
    remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
    remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
    remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
    remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file
    remove_action('wp_head', 'index_rel_link'); // index link
    remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post
    remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
    remove_action('wp_head', 'print_emoji_detection_script', 7 ); // Removes emoji code from header (required to display emojis)
    remove_action('wp_print_styles', 'print_emoji_styles' ); // Removes emoji code from header (required to display emojis)
    remove_action('wp_head', 'rest_output_link_wp_head', 10 ); // Removes REST API from headers in site (required for using API)
    remove_action('wp_head', 'wp_oembed_add_discovery_links', 10 ); // Removes REST API from headers in site (required for using API)

}

function arphabet_widgets_init() {

    register_sidebar( 
        array(
        'name'          => 'Blog',
        'id'            => 'blog'
        )
    );

    register_sidebar( 
        array(
        'name'          => 'Footer 1',
        'id'            => 'footer_1'
        )
    );
    register_sidebar( 
        array(
        'name'          => 'Footer 2',
        'id'            => 'footer_2'
        )
    );
    register_sidebar( 
        array(
        'name'          => 'Footer 3',
        'id'            => 'footer_3'
        ) 
    );

}

function pm_remove_all_scripts() {
    global $wp_scripts;
    //$wp_scripts->queue = array();
}

function pm_remove_all_styles() {
    global $wp_styles;
    $wp_styles->queue = array('main-stylesheet', 'woocommerce-smallscreen');
}


// Remove wp-embed scripts
function deregisterEmbedScripts(){
    wp_deregister_script( 'wp-embed' );
}

// Add default theme stylesheets to header
function addDefaultThemeStyles()
{

    wp_register_style('main-stylesheet', get_template_directory_uri() . '/style.css', array(), null, 'all');
    wp_enqueue_style('main-stylesheet');

}

// Add default menus
function addDefaultThemeMenus()
{

    register_nav_menus(
        array(
            'main-menu' => __('Main Menu'),
            'footer-menu' => __('Footer Menu')
        )
    );

}

// Remove menu items from admin
function removeDefaultAdminMenuOptions()
{

    remove_menu_page('edit-comments.php');

}

// Adds slug name to body class
function addSlugToBodyClass($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

/**
 * Removes width and height attributes from image tags
 *
 * @param string $html
 *
 * @return string
 */
function remove_image_size_attributes( $html ) {
    return preg_replace( '/(width|height)="\d*"/', '', $html );
}

// Remove image size attributes from post thumbnails
add_filter( 'post_thumbnail_html', 'remove_image_size_attributes' );

// Remove image size attributes from images added to a WordPress post
add_filter( 'image_send_to_editor', 'remove_image_size_attributes' );



// Add company link to admin footer
function addLinkAdminFooter()
{
    echo "Site by <a href='http://www.stickymedia.co/'>Sticky Media</a>";
}

// Remove all injected IDs from menu
function cleanMenu($var)
{
    return is_array($var) ? array() : '';
}

// Remove paragraph tags from images
function removePtagsFromImages($content)
{
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

// Custom admin login logo
function addCustomLoginLogo()
{
    echo '<style type="text/css">
	h1 a { background-image: url( ' . get_bloginfo('template_directory') . '/images/custom-login-logo.svg ) !important; }
	</style>';
}

// Modify admin menu to only display active plugins
function changePluginMenu() {
    global $menu;
    if(DEVELOPER == ''){
        $menu[65][2] = 'plugins.php?plugin_status=active';

    }
}

function changePluginViews( $views ) {

    if(DEVELOPER == '') {
        $pluginViews['active'] = $views['active'];
        return $pluginViews;
    }

    return $views;
}

remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);

// Remove the sorting dropdown from Woocommerce
remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_catalog_ordering', 30 );
// Remove the result count from WooCommerce
remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );

add_filter( 'woocommerce_widget_cart_is_hidden', 'always_show_cart', 40, 0 );
function always_show_cart() {
    return false;
}

function shopping_cart() {
  
    global $woocommerce;
    ?>
        <hr />
    
        <a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="View your shopping carts" class="cart-contents">
            <span class="amount"><?php echo $woocommerce->cart->get_cart_total(); ?></span>
            <span class="cart"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count); ?></span>
        </a>

        <hr />
    
    <?php
}

/**
 * Add quantity field on the archive page.
 */
function custom_quantity_field_archive() {
    $product = wc_get_product( get_the_ID() );
    if ( ! $product->is_sold_individually() && 'variable' != $product->product_type && $product->is_purchasable() ) {
        woocommerce_quantity_input( array( 'min_value' => 1, 'max_value' => $product->backorders_allowed() ? '' : $product->get_stock_quantity() ) );
    }
}
add_action( 'woocommerce_after_shop_loop_item', 'custom_quantity_field_archive', 0, 9 );
/**
 * Add requires JavaScript.
 */

function my_custom_flush_rewrite_rules() {
    flush_rewrite_rules();
}

add_action( 'after_switch_theme', 'my_custom_flush_rewrite_rules' );

function my_custom_my_account_menu_items( $items ) {
    $items = array(
        'dashboard'         => __( 'Dashboard', 'woocommerce' ),
        'orders'            => __( 'Orders', 'woocommerce' ),
        //'downloads'       => __( 'Downloads', 'woocommerce' ),
        'edit-address'    => __( 'Addresses', 'woocommerce' ),
        'payment-methods' => __( 'Payment Methods', 'woocommerce' ),
        'edit-account'      => __( 'Edit Account', 'woocommerce' ),
        'reward-tagz'      => 'Reward Tagz',
        'customer-logout'   => __( 'Logout', 'woocommerce' ),
    );

    return $items;
}

add_filter( 'woocommerce_account_menu_items', 'my_custom_my_account_menu_items' );

function my_custom_endpoint_content() {
    include 'woocommerce/myaccount/reward-tagz.php'; 
}

add_action( 'woocommerce_account_reward-tagz_endpoint', 'my_custom_endpoint_content' );

add_filter( 'woocommerce_checkout_fields' , 'alter_woocommerce_checkout_fields' );
function alter_woocommerce_checkout_fields( $fields ) {
// unset($fields[‘billing’][‘billing_first_name’]); // remove the customer’s First Name for billing
// unset($fields[‘billing’][‘billing_last_name’]); // remove the customer’s last name for billing
unset($fields['billing']['billing_company']); // remove the option to enter in a company
// unset($fields[‘billing’][‘billing_address_1’]); // remove the first line of the address
// unset($fields[‘billing’][‘billing_address_2’]); // remove the second line of the address
// unset($fields[‘billing’][‘billing_city’]); // remove the billing city
// unset($fields[‘billing’][‘billing_postcode’]); // remove the ZIP / postal code field
// unset($fields[‘billing’][‘billing_country’]); // remove the billing country
// unset($fields[‘billing’][‘billing_state’]); // remove the billing state
// unset($fields[‘billing’][‘billing_email’]); // remove the billing email address – note that the customer may not get a receipt!
// unset($fields[‘billing’][‘billing_phone’]); // remove the option to enter in a billing phone number
// unset($fields[‘shipping’][‘shipping_first_name’]);
// unset($fields[‘shipping’][‘shipping_last_name’]);
// unset($fields[‘shipping’][‘shipping_company’]);
// unset($fields[‘shipping’][‘shipping_address_1’]);
// unset($fields[‘shipping’][‘shipping_address_2’]);
// unset($fields[‘shipping’][‘shipping_city’]);
// unset($fields[‘shipping’][‘shipping_postcode’]);
// unset($fields[‘shipping’][‘shipping_country’]);
// unset($fields[‘shipping’][‘shipping_state’]);
// unset($fields[‘account’][‘account_username’]); // removing this or the two fields below would prevent users from creating an account, which you can do via normal WordPress + Woocommerce capabilities anyway
// unset($fields[‘account’][‘account_password’]);
// unset($fields[‘account’][‘account_password-2’]);
// unset($fields[‘order’][‘order_comments’]); // removes the order comments / notes field
return $fields;
}