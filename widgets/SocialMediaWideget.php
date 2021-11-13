<?php

namespace Onde\widgets;

use WP_Widget;

class SocialMediaWidget extends WP_Widget
{

    public function __construct()
    {
        $options = require_once __DIR__ . DIRECTORY_SEPARATOR . 'social_media_icons.php';
        parent::__construct('social_media_widget', 'social media widget', $options);
    }

    public function widget($args, $instance)
    {
        $social_media_name = $instance['social_icons'] ?? '';
        $social_icon = $this->get_social_icon($social_media_name);

        echo $args['before_widget'];
        echo '<article id="onde-social-media-widget" class="onde-widget social-media-widget container-flex-sc">';
        if(isset($instance['social_icons'])) {
            echo '<img class="onde-widget social-media-icon" src="' . $social_icon . '">';
        }
        if(isset($instance['social_url'])) {
            $url = $instance['social_url'];
            echo '<a href="' . $url . '" target="_blank">Retrouvez nous sur:' . $social_media_name . '</a>';
        }
        echo '</article>';
        echo $args['after_widget'];
    }

    public function form($instance)
    {
        $social_url = $instance['social_url'] ?? '';
        
        ?>
        <p>
            Ce widget permet d'inserer un lien vers vos reseaux sociaux
        </p>
        <p>
            <label for="<?= $this->get_field_id('social_url')?>">url</label>
            <input class="widefat" 
                type="text" 
                name="<?=$this->get_field_name('social_url'); ?>" 
                id="<?= $this->get_field_id('social_url');?>"
                value="<?= esc_attr($social_url);?>"
            >    
        </p>
        <p>
            <label for="<?= $this->get_field_id('social_icons');?>">Réseaux sociaux</label>
            <select name="<?= $this->get_field_name('social_icons');?>" id="<?= $this->get_field_id('social_icons');?>">
                <option value="">--Choisir une icone--</option>
                <option value="Facebook">Facebook</option>
                <option value="Instagram">Instagram</option>
                <option value="Youtube">Youtube</option>
                <option value="Odysee">Odysee</option>
                <option value="Tipeee">Tipeee</option>
            </select>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance): array
    {
        return $new_instance;
    }

    protected function get_social_icon($name):?string {
        $social_icons = $this->widget_options['social_icons_array'];
       foreach($social_icons as $k => $social_icon) {
           if(strtolower($k) === (strtolower($name) . '_icon')) {
               $icon = $social_icon;
               return $icon;
           }
           
       }
    }
}
