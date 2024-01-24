<?php
/**
 * Код выполняемый при удалении плагина
 * 
 * @author Alexandr Toropov <toropovsite@yandex.ru>
 * @package WordPress
 */

// if uninstall.php is not called by WordPress, die
if (!defined( 'WP_UNINSTALL_PLUGIN')) {
    die;
}

delete_option('aic_body_code');
delete_option('aic_head_code');
delete_option('aic_footer_code');
delete_option('aic_admin_code');