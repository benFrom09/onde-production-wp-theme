<?php


class YoutubeFeeder {

    protected $id;

    public function __construct($id) {
        $this->id = $id;
    }

    public function get_last_video(int $number =10):array {
        $url = 'https://www.youtube.com/feeds/videos.xml?channel_id=' .$this->id;
        $xml = simplexml_load_file($url);
        $video = [];
        for($i = 0; $i < $number; $i++) {
            $link = $xml->entry[$i]->id;
            $link = str_replace('yt:video:','',$link);
            $video[]= '<figure><iframe id="video-51-1_youtube_iframe" 
            frameborder="0" allowfullscreen="1" allow="accelerometer; 
            autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
            title="YouTube video player" src="https://www.youtube.com/embed/' . $link . '?controls=0&amp;
            rel=0&amp;disablekb=1&amp;showinfo=0&amp;modestbranding=0&amp;html5=1&amp;iv_load_policy=3&amp;
            autoplay=0&amp;end=0&amp;loop=0&amp;playsinline=0&amp;start=0&amp;nocookie=false&amp;
            enablejsapi=1&amp;origin=http%3A%2F%2Flocalhost&amp;widgetid=1" width="227.625" height="128.0390625">
            </iframe></figure>';
        }
       return $video;
    }
}