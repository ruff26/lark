<!-- video.js 5 -->
<link href="{$smarty.const._URL2}/players/videojs5/video-js.css?v=1" rel="stylesheet">
<script src="{$smarty.const._URL2}/players/videojs5/video-js.js"></script>
<script src="{$smarty.const._URL2}/players/videojs5/videojs-contrib-hls.js"></script>
<script src="{$smarty.const._URL2}/players/videojs5/three.js"></script>

<!-- Common -->
<link href="{$smarty.const._URL2}/players/videojs5/videjs-panorama.css" rel="stylesheet">
<link href="{$smarty.const._URL2}/players/videojs5/resolution-switcher.css" rel="stylesheet">
<!-- video.js 5 -->
<script src="{$smarty.const._URL2}/players/videojs5/videojs-panorama.v5.js"></script>
<script src="{$smarty.const._URL2}/players/videojs5/resolution-switcher.js"></script>

<!-- videojs hotkeys -->
<script src="{$smarty.const._URL2}/players/videojs5/videojs.hotkeys.js"></script>

<div class="player_wrapper">
    <div class="player_container">
        <video id="videojs-panorama-player" class="video-js vjs-default-skin" poster="{$video_data.preview_image}"  crossorigin="anonymous" controls>
        </video>
    </div>
</div>
<script>
    function isMobile() {
        var check = false;
        (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);
        return check;
    }

    $(document).keydown(function(e) {
        if( e.keyCode === 27 ) {
            $('#help-hotkey-modal').modal('hide');
            $("#videojs-panorama-player").focus();
            return false;
        }
    });

    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, '\\$&');
        var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, ' '));
    }
    function parseTimeToSec(strtime) {
        if (!strtime) {
            return 0;
        }
        var arr = strtime.split(/h|m|s/);
        var h = Number(arr[0]);
        var m = Number(arr[1]);
        var s = Number(arr[2]);
        return h*360 + m*60 + s;
    }
    var timePoint = parseTimeToSec(getParameterByName('t'));
    (function(window, videojs) {
        var options = {
                autoplay: {$video_data.video_player_autoplay},
            controls: true,
            plugins: {
                videoJsResolutionSwitcher: {
                    default: '320',
                    dynamicLabel: true
                }
            },
            playbackRates: [0.5, 1, 1.5, 2]
    };
        var player = window.player = videojs('videojs-panorama-player', options, function () {
            window.addEventListener("resize", function () {
                var canvas = player.getChild('Canvas');
                if(canvas) canvas.handleResize();
            });
            player.updateSrc({$video_sources});
            player.on('resolutionchange', function(){
                console.info('Source changed to %s', player.src())
            })

        });
        player.width(650);
        player.height(400);
        if ({$video_data.is_panoramic}) {
            player.panorama({
                backToHorizonCenter: false,
                clickToToggle: (!isMobile()),
                clickAndDrag: true,
                autoMobileOrientation: true,
                initFov: 100,
                VREnable: isMobile(),
                NoticeMessage: (isMobile()) ? "please drag and drop the video" : "{/literal}{$lang.panoramic_notice}{literal}",
                callback: function () {
                    if (!isMobile()) player.play();
                }
            });
        }
        player.on("VRModeOn", function(){
            if(!player.isFullscreen())
                player.controlBar.fullscreenToggle.trigger("tap");
        });
        player.currentTime(timePoint);
        player.ready(function() {
            this.hotkeys({
                volumeStep: 0.1,
                seekStep: 5,
                enableModifiersForNumbers: false,
                enableMute: true,
                playPauseKey: function(e) {
                    return ((e.which === 75) || (e.which === 32));
                },
                customKeys: {
                    downPlaybackRates: {
                        key: function (e) {
                            return (e.which === 188);
                        },
                        handler: function (player, options, e) {
                            if (player.playbackRate() === 0.5) {
                                return true;
                            } else {
                                player.playbackRate(player.playbackRate() - 0.5)
                            }
                        }
                    },
                    upPlaybackRates: {
                        key: function (e) {
                            return (e.which === 190);
                        },
                        handler: function (player, options, e) {
                            if (player.playbackRate() === 2) {
                                return true;
                            } else {
                                player.playbackRate(player.playbackRate() + 0.5)
                            }
                        }
                    },
                    homeKey: {
                        key: function (e) {
                            return (e.which === 36);
                        },
                        handler: function (player, options, e) {
                            if (options.enableModifiersForNumbers || !(event.metaKey || event.ctrlKey || event.altKey)) {
                                player.currentTime(1);
                            }
                        }
                    },
                    endKey: {
                        key: function (e) {
                            return (e.which === 35);
                        },
                        handler: function (player, options, e) {
                            if (options.enableModifiersForNumbers || !(event.metaKey || event.ctrlKey || event.altKey)) {
                                player.currentTime(player.duration());
                            }
                        }
                    },
                    searchKey: {
                        key: function (e) {
                            return (e.which === 191);
                        },
                        handler: function (player, options, e) {
                            $("#appendedInputButton").focus();
                        }
                    },
                    helpHotKey: {
                        key: function (e) {
                            return (e.ctrlKey && e.which === 191);
                        },
                        handler: function (player, options, e) {
                            $('#help-hotkey-modal').modal();
                        }
                    },
                    seekForward: {
                        key: function (e) {
                            return (e.which === 73);
                        },
                        handler: function (player, options, e) {
                            wasPlaying = !player.paused();
                            if (wasPlaying) {
                                player.pause();
                            }
                            seekTime = player.currentTime() + 10;
                            if (seekTime >= player.duration()) {
                                seekTime = wasPlaying ? player.duration() - .001 : player.duration();
                            }
                            player.currentTime(seekTime);
                            if (wasPlaying) {
                                player.play();
                            }
                        }
                    },
                    seekBack: {
                        key: function (e) {
                            return (e.which === 74);
                        },
                        handler: function (player, options, e) {
                            wasPlaying = !player.paused();
                            if (wasPlaying) {
                                player.pause();
                            }
                            seekTime = player.currentTime() - 10;
                            if (seekTime <= 0) {
                                seekTime = 0;
                            }
                            player.currentTime(seekTime);
                            if (wasPlaying) {
                                player.play();
                            }
                        }
                    },
                    nextVideo: {
                        key: function (e) {
                            return (e.which === 78);
                        },
                        handler: function (player, options, e) {
                            if ($("a").is("#next-video")) {
                                $("#next-video")[0].click();
                            }

                        }
                    },
                    prevVideo: {
                        key: function (e) {
                            return (e.which === 80);
                        },
                        handler: function (player, options, e) {
                            if ($("a").is("#prev-video")) {
                                $("#prev-video")[0].click();
                            }
                        }
                    },
                }

            });
        });
    }(window, window.videojs));
</script>