$(window).load(function() {
    $('#slider').nivoSlider({
        effect : 'fade',
        slices : 15,
        animSpeed : 500,
        pauseTime : 3000,
        startSlide : 0, //Set starting Slide (0 index)
        directionNav : false, //Next & Prev
        directionNavHide : false, //Only show on hover
        controlNav : false, //1,2,3...
        controlNavThumbs : false, //Use thumbnails for Control Nav
        controlNavThumbsSearch : '.jpg', //Replace this with...
        controlNavThumbsReplace : '_thumb.jpg', //...this in thumb Image src
        keyboardNav : false, //Use left & right arrows
        pauseOnHover : true, //Stop animation while hovering
        manualAdvance : false, //Force manual transitions
        captionOpacity : 0.8, //Universal caption opacity
        beforeChange: function(){},
        afterChange: function(){},
        slideshowEnd: function(){} //Triggers after all slides have been shown
    });
});