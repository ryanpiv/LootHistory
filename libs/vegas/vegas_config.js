$(document).ready(function() {
    Pace.on('done', function() {
        $('body').show();
        $(".vegas").vegas({
            slides: [
                {
                    src: "media/uldir/bfa_default.jpg",
                    video: {
                        src: [
                            "media/uldir/bfa_default.webm",
                            "media/uldir/bfa_default.mp4"
                        ],
                        loop: true,
                        mute: true
                    },
                    delay: 18000
                }
            ],
            //delay: 18000,
            //animation: 'random',
            overlay: 'libs/vegas/overlays/03.png',
            animationDuration: 18000
        });
    });

});
