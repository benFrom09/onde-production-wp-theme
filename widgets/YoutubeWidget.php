<?php
class YoutubeWidget extends WP_Widget
{
    public function __construct() {
        parent::__construct('youtube_widget','youtube widget');
    }

    public function widget($args,$instance) {
        echo $args['before_widget'];
        if(isset($instance['title'])) {
            $title = apply_filters('widget_title',$instance['title']);
             echo $args['before_title'] .$title . $args['after_title'];
        }
        if(isset($instance['youtube'])) {
            require get_template_directory() . '/inc/class/YoutubeFeeder.php';
            $feeder = new YoutubeFeeder($instance['youtube']);
            $videos = $feeder->get_last_video(1);
            foreach($videos as $video) {
                echo $video; 
            }
        }
        echo $args['after_widget'];
    }

    public function form($instance) {
        $title = $instance['title'] ?? '';
        $youtube_id = $instance['youtube'] ?? '';
        ?>
            <p>
                <label for="<?= $this->get_field_id('title')?>">Titre:</label>
                <input class="widefat" 
                type="text" 
                name="<?=$this->get_field_name('title'); ?>" 
                id="<?= $this->get_field_id('title');?>"
                value="<?= esc_attr($title);?>">    
        </p>
        <p>
                <label for="<?= $this->get_field_id('youte')?>">ID youtube:</label>
                <input class="widefat" 
                type="text" 
                name="<?=$this->get_field_name('youtube'); ?>" 
                id="<?= $this->get_field_id('youtube');?>"
                value="<?= esc_attr($youtube_id);?>">    
        </p>
        <?php
    }

    public function update($new_instance,$old_instance):array {
        return $new_instance;
    }
}