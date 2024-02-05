<?php
/**
 * Код выполняемый при удалении плагина
 * 
 * @author Alexandr Toropov <toropovsite@yandex.ru>
 * @package WordPress
 */

// if uninstall.php is not called by WordPress, die
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    die;
}

delete_option( 'aic_plugin_options' );