<?php

/**
 * @package onde-production
 */

 class OndeMenuPage {

    const GROUP = 'player_options';

     public static function register() {
         add_action('admin_menu',[self::class,'addMenu']);
         add_action('admin_init',[self::class,'register_settings']);
     }

     public static function addMenu() {
         add_options_page('Gestion du player','player audio','manage_options',self::GROUP,[self::class,'render']);
     }

     public static function render() {
        ?>
        <h1>Gestion du player</h1>
        <form action="options.php" method="post">
            <?php settings_fields(self::GROUP); ?>
            <?php do_settings_sections(self::GROUP); ?>
            <?php submit_button(); ?>
        </form>
        <?php
     }

     public static function register_settings() {
         register_setting(self::GROUP,'player_list');
         add_settings_section('player_options_section','Parametres',function() {
            echo "Vous pouvez ici gerer les parametres lié au player";
         },self::GROUP);
         add_settings_field('player_options_list','Pistes audio',function() {

         },self::GROUP,'player_options_section');
     }
 }