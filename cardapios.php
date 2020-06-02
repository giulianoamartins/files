<?php
/**
* Cardápios da Intranet
*
* @package     cardapiosIntranet
* @author      Giuliano Martins
* @license     GPLv3
*
* @wordpress-plugin
* Plugin Name: Cardápios da Intranet
* Version: 2.0
* Description: Cadastro e edição de menus para exibição na Intranet Usiminas
* Author: Giuliano Martins
* Author URI: https://usiminas.com
* Plugin URI: https://usiminas.com
* Text Domain: cardapios-da-intranet
* Domain Path: /languages
* License: GPLv3
* License URI: http://www.gnu.org/licenses/gpl-3.0
*/

function my_admin_menu() {
    add_menu_page(
        __( 'Cardápios'),
        __( 'Cardápios'),
        'manage_options',
        'cardapios',
        'admin_page_sede',
        'dashicons-schedule',
        3
    );

    add_submenu_page(
        'cardapios',
        __( 'Cardápio Sede'), //page title
        __( 'Sede'), //menu title
        'edit_themes',   //capability,
        'sede',  //menu slug
        'admin_page_sede'  //callback function
    );

    add_submenu_page(
        'cardapios',
        __( 'Cardápio Ipatinga'), //page title
        __( 'Ipatinga'), //menu title
        'edit_themes',   //capability,
        'ipatinga',  //menu slug
        'admin_page_ipatinga'  //callback function
    );

    add_submenu_page(
        'cardapios',
        __( 'Cardápio Cubatão'), //page title
        __( 'Cubatão'), //menu title
        'edit_themes',   //capability,
        'cubatao',  //menu slug
        'admin_page_cubatao'  //callback function
    );

    unset($GLOBALS['submenu']['cardapios'][0]);
}
add_action( 'admin_menu', 'my_admin_menu' );


function admin_page_sede() {
    ?>
        <h1>
            <?php esc_html_e( 'Cardápio Sede', 'my-plugin-textdomain' ); print_r($plugins_url)?>
        </h1>
        <form method="POST" action="<?php echo plugins_url( 'form-submit.php', __FILE__ ); ?>" enctype="multipart/form-data">
            <input type="file" name="arquivo"><br><br>
            <input type="submit" value="enviar">
        </form>
    <?php
}
function admin_page_ipatinga() {
    ?>
        <h1>
            <?php esc_html_e( 'Cardápio Ipatinga', 'my-plugin-textdomain' ); ?>
        </h1>
    <?php
}
function admin_page_cubatao() {
    ?>
        <h1>
            <?php esc_html_e( 'Cardápio Cubatão.', 'my-plugin-textdomain' ); ?>
        </h1>
    <?php
}


/*
add_action('admin_menu', 'test_plugin_setup_menu');
 
function test_plugin_setup_menu(){
    add_menu_page( 'Cardápios Page', 'Cardápios Intranet', 'manage_options', 'cardapios-plugin', 'cardapios_init' );
    add_submenu_page( 'cardapios-plugin', 'Settings page title', 'Settings menu label', 'manage_options', 'theme-op-settings', 'wps_theme_func_settings');
    add_submenu_page( 'cardapios-plugin', 'FAQ page title', 'FAQ menu label', 'manage_options', 'theme-op-faq', 'wps_theme_func_faq');
}

add_action('admin_menu', 'wpdocs_register_my_custom_submenu_page');
 
function wpdocs_register_my_custom_submenu_page() {
    add_submenu_page(
        'tools.php',
        'My Custom Submenu Page',
        'My Custom Submenu Page',
        'manage_options',
        'my-custom-submenu-page',
        'wpdocs_my_custom_submenu_page_callback' );
}
 
function wpdocs_my_custom_submenu_page_callback() {
    echo '<div class="wrap"><div id="icon-tools" class="icon32"></div>';
        echo '<h2>My Custom Submenu Page</h2>';
    echo '</div>';
}
 
function cardapios_init(){
    echo "<h1>Hello World!</h1>";
}
*/