<?php

function convert_duration($duration) {
    $hour = NULL;
    $min = floor($duration / 60);
    $sec = floor($duration % 60);
    if ($min >= 60) {
        $hour = floor($min / 60);
        $min = floor($min % 60);
        if ($hour <= 0) {
            $hour = "";
        } else {
            if ($hour < 10 && $hour > 0) {
                $hour = "0" . $hour;
                $hour .=$hour . ":";
            }
        }
    }
    if ($min < 10) {
        $min = "0" . $min;
    }
    if ($sec < 10) {
        $sec = "0" . $sec;
    }
    return $hour . $min . ":" . $sec;
}

function load_movie_preview($player_id = 'player', $image_uri, $video_uri, $title = NULL, $autoplay = FALSE) {

    $CI = & get_instance();
    $template_uri_loc = $CI->config->item('template_uri');
    $image_uri_loc = $CI->config->item('images_uri');
    $return_data = '';
    $is_autoplay = (($autoplay)) ? 'TRUE' : 'FALSE';

    $return_data = "
      <script type=\"text/javascript\">
        flowplayer(\"" . $player_id . "\", {src: \"" . $template_uri_loc . "/media/video/flowplayer.3.2.11.swf\", wmode: \"transparent\"}, {
          clip: {
            provider: 'h264streaming',
            scaling : 'scale',
            autoPlay : '" . $is_autoplay . "' 
          },
          playlist: [
                  {
                        url: \"" . $image_uri . "\",
                        scaling: \"orig\"
                        //title: \"" . cleanHTML($title) . "\"
                    },

                   {
                        url: '" . $video_uri . "',
                        //title: '',
                        scaling: 'scale',
                        autoPlay: '" . $is_autoplay . "',
                        autoBuffering:false
                    }

                ],

          plugins: {
            h264streaming: {
              url: '" . $template_uri_loc . "/media/video/flowplayer.pseudostreaming-3.2.2.swf'
            },
            controls: {
              url: '" . $template_uri_loc . "/media/video/flowplayer.controls-3.2.11.swf',
              all:false,
              play:true,
              fastBackward: false,
              fastForward: false,
              slowForward: false,
              time : false,
              fullscreen:true,
              scrubber: true,
              volume: true,
              mute : true,
              backgroundGradient: 'none',
              backgroundColor: 'transparent',
              fontColor: '#ffffff',
              timeFontColor: '#333333'
            }
          },
          canvas: {
                backgroundColor: '#000000'
            },
          version: [9, 115],
          //  version: [10, 115],
          onFail: function()  {
                document.getElementById(\"info\").innerHTML = \"You need the latest Flash version to see MP4 movies. Your version is + this.getVersion()\";
            }
        });
        </script>
      ";
    return $return_data;
}

function load_movie_preview_openx($player_id = 'player', $image_uri, $video_uri, $title = NULL, $zone_id, $autoplay = FALSE) {

    $CI = & get_instance();
    $template_uri_loc = $CI->config->item('template_uri');
    $image_uri_loc = $CI->config->item('images_uri');
    $return_data = '';
    $is_autoplay = (($autoplay)) ? 'TRUE' : 'FALSE';

    $return_data = "
      <script type=\"text/javascript\">
        flowplayer(\"" . $player_id . "\", {src: \"" . $template_uri_loc . "/media/video/flowplayer.3.2.11.swf\", wmode: \"transparent\"}, {
          clip: {
            provider: 'h264streaming',
            scaling : 'scale',
            autoPlay : false
          },
          playlist: [
                  {
                        url: \"" . $image_uri . "\",
                        scaling: \"orig\"
                        //title: \"" . cleanHTML($title) . "\"
                    },

                   {
                        url: '" . $video_uri . "',
                        //title: '',
                        scaling: 'scale',
                        autoPlay: false,
                        autoBuffering:false
                    }

                ],

          plugins: {
            ova: {
               url: '" . $template_uri_loc . "/media/video/ova-trial.swf',
 
               \"autoPlay\": true,
 
               \"ads\": {
                   \"playOnce\": false,
                   \"servers\": [
                        {
                           \"type\": \"OpenX\",
                           \"apiAddress\": \"http://b.okezone.com/delivery/fc.php\"
                        }
                   ],
                   \"schedule\": [
                        {
                           \"zone\": \"" . $zone_id . "\",
                           \"position\": \"pre-roll\"
                        }
                   ]
               }
           },
            h264streaming: {
              url: '" . $template_uri_loc . "/media/video/flowplayer.pseudostreaming-3.2.2.swf'
            },            

            controls: {
              url: '" . $template_uri_loc . "/media/video/flowplayer.controls-3.2.11.swf',
              all:false,
              play:true,
              fastBackward: false,
              fastForward: false,
              slowForward: false,
              time : false,
              fullscreen:true,
              scrubber: true,
              volume: true,
              mute : true,
              backgroundGradient: 'none',
              backgroundColor: 'transparent',
              fontColor: '#ffffff',
              timeFontColor: '#333333'
            }
          },
          canvas: {
                backgroundColor: '#000000'
            },
          version: [9, 115],
          //  version: [10, 115],
          onFail: function()  {
                document.getElementById(\"info\").innerHTML = \"You need the latest Flash version to see MP4 movies. Your version is + this.getVersion()\";
            }
        });
        </script>
      ";
    return $return_data;
}

function load_movie_play($player_id = 'player', $image_uri, $video_uri, $title = NULL, $autoplay = FALSE) {

    $CI = & get_instance();
    $template_uri_loc = $CI->config->item('template_uri');
    $image_uri_loc = $CI->config->item('images_uri');
    $return_data = '';
    $is_autoplay = (($autoplay)) ? 'TRUE' : 'FALSE';

    $return_data = "
      <script type=\"text/javascript\">
        flowplayer(\"" . $player_id . "\", {src: \"" . $template_uri_loc . "/media/video/flowplayer.3.2.11.swf\", wmode: \"transparent\"}, {
          clip: {
            provider: 'h264streaming',
            scaling : 'scale',
            autoPlay : '" . $is_autoplay . "' 
          },
          playlist: [
                  {
                        url: '" . $video_uri . "',
                        //title: '',
                        scaling: 'scale',
                        autoPlay: '" . $is_autoplay . "',
                        autoBuffering:false
                    }

                ],

          plugins: {
            h264streaming: {
              url: '" . $template_uri_loc . "/media/video/flowplayer.pseudostreaming-3.2.2.swf'
            },
            controls: {
              url: '" . $template_uri_loc . "/media/video/flowplayer.controls-3.2.11.swf',
              all:false,
              play:true,
              fastBackward: false,
              fastForward: false,
              slowForward: false,
              time : false,
              fullscreen:true,
              scrubber: true,
              volume: true,
              mute : true,
              backgroundGradient: 'none',
              backgroundColor: 'transparent',
              fontColor: '#ffffff',
              timeFontColor: '#333333'
            }
          },
          canvas: {
                backgroundColor: '#000000'
            },
          version: [9, 115],
          //  version: [10, 115],
          onFail: function()  {
                document.getElementById(\"info\").innerHTML = \"You need the latest Flash version to see MP4 movies. Your version is + this.getVersion()\";
            }
        });
        </script>
      ";
    return $return_data;
}

function load_movie_play_openx($player_id = 'player', $image_uri, $video_uri, $title = NULL, $zone_id, $autoplay = FALSE) {

    $CI = & get_instance();
    $template_uri_loc = $CI->config->item('template_uri');
    $image_uri_loc = $CI->config->item('images_uri');
    $return_data = '';
    $is_autoplay = (($autoplay)) ? 'TRUE' : 'FALSE';

    $return_data = "
      <script type=\"text/javascript\">
        flowplayer(\"" . $player_id . "\", {src: \"" . $template_uri_loc . "/media/video/flowplayer.3.2.11.swf\", wmode: \"transparent\"}, {
          clip: {
            provider: 'h264streaming',
            scaling : 'scale',
            autoPlay : '" . $is_autoplay . "'
          },
          playlist: [
                  {
                        url: \"" . $image_uri . "\",
                        scaling: \"orig\"
                        //title: \"" . cleanHTML($title) . "\"
                    },

                   {
                        url: '" . $video_uri . "',
                        //title: '',
                        scaling: 'scale',
                        autoPlay: '" . $is_autoplay . "',
                        autoBuffering:false
                    }

                ],

          plugins: {
            ova: {
               url: '" . $template_uri_loc . "/media/video/ova-trial.swf',
 
               \"autoPlay\": true,
 
               \"ads\": {
                   \"playOnce\": false,
                   \"servers\": [
                        {
                           \"type\": \"OpenX\",
                           \"apiAddress\": \"http://b.okezone.com/delivery/fc.php\"
                        }
                   ],
                   \"schedule\": [
                        {
                           \"zone\": \"" . $zone_id . "\",
                           \"position\": \"pre-roll\"
                        }
                   ]
               }
           },
            h264streaming: {
              url: '" . $template_uri_loc . "/media/video/flowplayer.pseudostreaming-3.2.2.swf'
            },            

            controls: {
              url: '" . $template_uri_loc . "/media/video/flowplayer.controls-3.2.11.swf',
              all:false,
              play:true,
              fastBackward: false,
              fastForward: false,
              slowForward: false,
              time : false,
              fullscreen:true,
              scrubber: true,
              volume: true,
              mute : true,
              backgroundGradient: 'none',
              backgroundColor: 'transparent',
              fontColor: '#ffffff',
              timeFontColor: '#333333'
            }
          },
          canvas: {
                backgroundColor: '#000000'
            },
          version: [9, 115],
          //  version: [10, 115],
          onFail: function()  {
                document.getElementById(\"info\").innerHTML = \"You need the latest Flash version to see MP4 movies. Your version is + this.getVersion()\";
            }
        });
        </script>
      ";
    return $return_data;
}