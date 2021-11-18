<?php

namespace Onde\widgets;

use WP_Widget;

class SocialMediaWidget extends WP_Widget
{


    public function __construct()
    {
        $icons = require_once __DIR__ . DIRECTORY_SEPARATOR . 'social_media_icons.php';

        parent::__construct('social_media_widget', 'social media widget', $icons);
    }

    public function widget($args, $instance)
    {
        $social_media = $instance['social_icon'] ?? '';
        $icon_img = $this->get_social_icon($social_media);
        $url = $instance['social_url'] ?? '';

       if(!is_null($icon_img)) {

        echo '<a class="onde-social-widget" href="' . esc_url($url) . '" title="'. esc_attr($social_media) .'" target="_blank">
        <img width="20px" height="20px" alt="'. esc_attr(__('Icone résaux social ' . $social_media )) .'" src="'. esc_url($icon_img) .'" title="'. esc_attr(__('Icone résaux social ' . $social_media )) .'" />
        </a>';
       }

    }

    public function form($instance)
    {
        $social_url = $instance['social_url'] ?? '';
        $social_icon = $instance['social_icon'] ?? '';
        
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
            <label for="<?= $this->get_field_id('social_icon');?>">Icone réseaux sociaux</label>
            <select name="<?= $this->get_field_name('social_icon');?>" id="<?= $this->get_field_id('social_icon');?>">
                <option value="<?= $social_icon!== '' ? esc_attr($social_icon) : '';?>"><?= $social_icon!== '' ? $social_icon : '--Choisir une icone--';?></option>
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
        $social_icons = $this->widget_options;
       foreach($social_icons as $k => $social_icon) {
           if(strtolower($k) === (strtolower($name) . '_img')) {
               $icon = $social_icon;
               return $icon;
           }
           
       }
    }
}
