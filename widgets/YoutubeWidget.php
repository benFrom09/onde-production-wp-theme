<?php
namespace Onde\widgets;

use WP_Widget;
use Onde\widgets\YoutubeFeeder;

class YoutubeWidget extends WP_Widget
{
    public function __construct() {
        parent::__construct('youtube_widget','youtube widget');
    }

    public function widget($args,$instance) {

        $number = (isset($instance['video_number']) && intval($instance['video_number'])) ? intval($instance['video_number']) : 1;

        echo $args['before_widget'];

        if(isset($instance['title'])) {
            $title = apply_filters('widget_title',$instance['title']);
             echo $args['before_title'] .$title . $args['after_title'];
        }
        if(isset($instance['redirect_link'])) {
           echo '<p><a target="_blank" href="' . esc_url_raw($instance['redirect_link']) .'">' . $instance['redirect_link_name'] . '</a><p>';
        }
        echo '<article id="onde-youtube-widget" class="onde-widget youtube-widget container-flex-we">';
        if(isset($instance['youtube'])) {
            require get_template_directory() . '/widgets/YoutubeFeeder.php';
            $feeder = new YoutubeFeeder($instance['youtube']);
            $videos = $feeder->get_last_video($number);
            foreach($videos as $video) {
                echo $video; 
            }
        }
        echo '</article>';
        echo $args['after_widget'];
    }

    public function form($instance) {
        $title = $instance['title'] ?? '';
        $redirect_link = $instance['redirect_link'] ?? '';
        $redirect_link_name = $instance['redirect_link_name'] ?? '';
        $youtube_id = $instance['youtube'] ?? '';
        $video_number = $instance['video_number'] ?? 1;
        ?>  <p>Ce widget permet de récuperer les dernières publications de votre chaine youtube</p>
            <p>
                <label for="<?= $this->get_field_id('title')?>">Titre:</label>
                <input class="widefat" 
                type="text" 
                name="<?=$this->get_field_name('title'); ?>" 
                id="<?= $this->get_field_id('title');?>"
                value="<?= esc_attr($title);?>">    
        </p>
            <p>
            <label for="<?= $this->get_field_id('redirect_link_name')?>">Nom du lien:</label>
                <input class="widefat" 
                type="text" 
                name="<?=$this->get_field_name('redirect_link_name'); ?>" 
                id="<?= $this->get_field_id('redirect_link_name');?>"
                value="<?= esc_attr($redirect_link_name);?>">     
            <label for="<?= $this->get_field_id('redirect_link')?>">Url du lien:</label>
                <input class="widefat" 
                type="text" 
                name="<?=$this->get_field_name('redirect_link'); ?>" 
                id="<?= $this->get_field_id('redirect_link');?>"
                value="<?= esc_attr($redirect_link);?>">    
            </p>
        <p>
                <label for="<?= $this->get_field_id('youtube')?>">ID chaine youtube:</label>
                <input class="widefat" 
                type="text" 
                name="<?=$this->get_field_name('youtube'); ?>" 
                id="<?= $this->get_field_id('youtube');?>"
                value="<?= esc_attr($youtube_id);?>">    
        </p>
        <p>
                <label for="<?= $this->get_field_id('video_number')?>">Nombre de vidéo:</label>
                <input class="widefat" 
                type="text" 
                name="<?=$this->get_field_name('video_number'); ?>" 
                id="<?= $this->get_field_id('video_number');?>"
                value="<?= esc_attr($video_number);?>">    
        </p>
        <?php
    }

    public function update($new_instance,$old_instance):array {
        return $new_instance;
    }
}