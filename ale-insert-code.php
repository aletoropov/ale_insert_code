<?php
/*
Plugin Name: Ale Insert Code
Description: Плагин для добавления произвольного кода в тему WordPress
Version: 1.0.0
Author: Toropov Aleksandr
Author URI: https://aletoropov.ru/
 */

/**
 * Действия при активации плагина
 */
register_activation_hook( __FILE__, 'ale_install' );
function ale_install() {
   // проверяем совместимость с версией WordPress
   if ( !is_wp_version_compatible( '5.2' )) {
      wp_die( __( 'This plugin reqires WordPress 5.2 or higter.', 'plugin_aic') );
   }
}

/**
 * Действия при деактивации плагина
 */
register_deactivation_hook( __FILE__, 'ale_deactivation' );
function ale_deactivation() {
   // действия при деактивации плагина
}

add_action( 'wp_head', 'aic_insert_head' );

/**
 * Добавление кода в head
 */
function aic_insert_head() {
   $code = get_option('aic_head_code');
   echo $code;
}

add_action( 'wp_footer', 'aic_insert_footer' );

/**
 * Добавление кода в footer
 */
function aic_insert_footer() {
   $code = get_option('aic_footer_code');
   echo $code;
}

add_action( 'wp_body_open', 'ale_insert_body_start' );

/**
 * Добавление кода после тега body
 */
function ale_insert_body_start() {
   $code = get_option('aic_body_code');
   echo $code;
}