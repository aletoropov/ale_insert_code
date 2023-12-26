<?php 
/**
 * Файл страницы параметров плагина
 */

//Регистрируем страницу настроек плагина в админ-панели
function aic_register_options_page() {
    add_menu_page('Ale Insert Code', 'Ale Insert Code', 'manage_options', 'aic_plugin', 'aic_setting_page', 'dashicons-format-chat');
}

add_action('admin_menu', 'aic_register_options_page');

function aic_setting_page() {
?>

<form method="post" action="options.php">
    <?php settings_fields('aic_plugin_options'); ?>
	<?php do_settings_sections('aic_plugin_options-main'); ?>
    <input type="submit" class="btn" value="<?php _e('Save Changes', 'plugin_aic');?>">
</form>

<?php 
} 

//Начинаем добавлять настройки
function aic_plugin_options_fields(){
    register_setting('aic_plugin_options', 'aic_plugin_options');
    add_settings_section('aic_plugin_section1', '', 'aic_plugin_section1_func', 'aic_plugin_options-main');
    add_settings_field('aic_body_code', 'Код в body', 'aic_insert_body_func', 'aic_plugin_options-main', 'aic_plugin_section1');
    add_settings_field('aic_head_code', 'Код в head', 'aic_insert_head_func', 'aic_plugin_options-main', 'aic_plugin_section1');
    add_settings_field('aic_footer_code', 'Код в footer', 'aic_insert_footer_func', 'aic_plugin_options-main', 'aic_plugin_section1');
    add_settings_field('aic_admin_code', 'Код в админ панели', 'aic_insert_admin_func', 'aic_plugin_options-main', 'aic_plugin_section1');
}
    
add_action('admin_init', 'aic_plugin_options_fields');
    
function aic_plugin_section1_func() {
    return '';
}
    
function aic_insert_body_func() {
    $options = get_option('aic_body_code');
    echo "<div><label>Code in BODY<texarea id='aic_body_code' name='aic_plugin_options[aic_body_code]'>{$options['aic_body_code']}</textarea></label></div>";
} 
    
function aic_insert_head_func() {
    $options = get_option('aic_head_code');
    echo "<div><label>Code in HEAD<texarea id='aic_head_code' name='aic_plugin_options[aic_head_code]'>{$options['aic_head_code']}</textarea></label></div>";
}

function aic_insert_footer_func() {
    $options = get_option('aic_footer_code');
    echo "<div><label>Code in FOOTER<texarea id='aic_footer_code' name='aic_plugin_options[aic_footer_code]'>{$options['aic_footer_code']}</textarea></label></div>";
}

function aic_insert_admin_func() {
    $options = get_option('aic_admin_code');
    echo "<div><label>Code in ADMIN PANEL<texarea id='aic_admin_code' name='aic_plugin_options[aic_admin_code]'>{$options['aic_admin_code']}</textarea></label></div>";
}