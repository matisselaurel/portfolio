
/*

Tera JS
Version 2.0
Made by Themanoid

*/


(function($) {

    "use strict"; // Strict mode

    /* 
        Portfolio scripts 
    */

    //  Define the portfolio grid
    var $grid = $('#grid');

    //  Show filter options on trigger click
    $('#filter-trigger').on('tap', function(){
        $('#filter-trigger').fadeOut(200, function(){
             $('#filters').fadeIn(500);
        });
    });

    //  On filter click, filter grid
    $('#filters').on( 'tap', 'button', function(e) {
        e.stopPropagation();
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({ filter: filterValue });
        $('.item').addClass('visible');
        e.preventDefault();
    });

    // Back to top button

    var $toTop = $('<div class="back-to-top"></div>');
    $('body').append($toTop);
    $('body').on('tap', '.back-to-top', function(e){
        $('html,body').animate({scrollTop : 0});
        e.preventDefault();
    });

    //  Scroll effects
    $(window).scroll(function(){
        var scrolled = $(window).scrollTop();
        var scrolledPercentage = (100-(scrolled/$(window).height()*100))/100;
        $('.jumbotron').css('opacity', scrolledPercentage);
        if(scrolled > 200)
            $toTop.addClass('active'); // Back to top button
        else
            $toTop.removeClass('active');
    });

    $(window).load(function(){
        resizeJumbotron(); // Get the right jumbotron size on pageload
        $('.container-fluid').addClass('loaded'); // Initialize the container
        $grid.isotope(); // Set the grid to isotope

        $('.item').waypoint(function(){
            $(this).addClass('visible'); // Show items
            $grid.isotope(); // Reload isotope items
        }, {offset : '70%'});

        $('.fadeIn').waypoint(function(){ // Fade in every .fadeIn class element
            $(this).addClass('visible');
        }, {offset : '70%'});

        var scrolled = $(window).scrollTop();
        if(scrolled > 200)
            $toTop.addClass('active'); // Back to top button
    });

    $('header').affix(); // Affix the header

    $('.trigger').on('tap', function(e){
        e.stopPropagation();
        $('#navigation').toggleClass('active'); // Toggle responsive menu
    });

    $('#navigation').on('tap', 'a', function(e){
        e.stopPropagation();
    });

    $('html').on('tap', function(){
        // Used to hide the responsive navigation on click outside
        $('#navigation').removeClass('active');
    });

    // Fade effect on navigation / header links
    $('header a, a.inner, a.transition, a.blog-item').on('tap', function(e){ 
        var href = $(this).attr('href');
        if(href != '#' && !$(this).hasClass('lightbox')){
            $('body').fadeOut(400, function(){
                window.location = href; // Go to url after smooth transition
            });
            e.preventDefault();
        }
    })

    // Get the right size for the jumbotron, based on viewport sizes
    function resizeJumbotron(){
        if($(window).height() > 800 && $(window).width() < 1400)
            $('.jumbotron').height($(window).height()-200); // 200px offset from bottom
        else
            $('.jumbotron').height($(window).height()); 
        $('.jumbotron.small').height(300);
    }

    // Call functions on resize
    $(window).resize(function(){
        resizeJumbotron();
        sliderResize();
    });

    /*
        Tera Slider
    */

    var $slider = $('.slider'); // Define the slider

    // For each slider
    $slider.each(function(){
        var controls = $('<div class="prev-slide"></div><div class="next-slide"></div>');
        $(this).append(controls); // Add slide controls
        var index = 0;
        $(this).find('li.slide').each(function(){ // For each slide
            $(this).attr('data-index',index); // Add index to element
            if(index == 0)
                $(this).addClass('active'); // Add the active state to the first slide
            index++;
        });
        var $curSlide = $(this).find('.active');
        if($curSlide.hasClass('dark')) // Set dark mode if available for the first slide
            $('body').addClass('dark-slide');
        sliderResize();
    });

    function sliderResize(){
        $slider.each(function(){ // Resize functions for each slider
            var slideCount = $(this).find('li.slide').length;
            var $sliderWidth = $(this).width();
            var $slides = $(this).find('ul.slides');
            var $curSlide = parseInt($slides.find('.active').attr('data-index'));
            $slides.width($sliderWidth*slideCount);
            $slides.css('margin-left', -$sliderWidth*($curSlide)+'px');
            $(this).find('li.slide').width(100/slideCount+'%');
        });
    }

    $('body').on('tap', '.next-slide, .prev-slide', function(){
        // Slide controls
        var $sliderWidth = $(this).parent().width();
        var $slides = $(this).parent().find('ul.slides');
        var $slideCount = $slides.find('li').length;
        var $activeSlide = $slides.find('.active');
        var $activeSlideIndex = parseInt($activeSlide.attr('data-index'));
        var $newSlide;
        // If clicked on next slide
        if($(this).hasClass('next-slide')){
            if(($slideCount-1) == $activeSlideIndex)
                $newSlide = 0; 
            else
                $newSlide = $activeSlideIndex+1; 
        }
        // If clicked on previous slide
        else {
            if(0 == $activeSlideIndex)
                $newSlide = ($slideCount-1); 
            else
                $newSlide = $activeSlideIndex-1; 
        }
        $slides.find('li').removeClass('active'); // First remove all active classes
        $slides.find('[data-index='+$newSlide+']').addClass('active'); // Set the current slide to active
        if($slides.find('.active').hasClass('dark')) // If the current slide is dark
            $('body').addClass('dark-slide'); // Set dark mode
        else
            $('body').removeClass('dark-slide'); // Unset dark mode
        $slides.css('margin-left','-'+$sliderWidth*($newSlide)+'px'); // Slide animation on css propert change
        setTimeout(sliderResize, 400);
    });

    /*
        Tera Lightbox
    */

    var $lightboxContainer = $('<div id="lightbox"><div class="controls"><div class="galleryPrev"><</div><div class="galleryNext">></div><div class="galleryClose">x</div></div>');
    if($('.lightbox').length)
        $('body').append($lightboxContainer);
    var $gallery = [];
    var $galleryIndex = 0;
    $('.lightbox').each(function(){ // For each lightbox link
        var href = $(this).attr('href');
        $gallery.push(href); // Push the img url to the gallery array
        $(this).attr('data-index', $galleryIndex);
        $galleryIndex++; // Next index
        $(this).on('tap', function(e){
            e.stopImmediatePropagation();
            var $index = $(this).attr('data-index');
            var $img = $('<img src="'+href+'" data-index="'+$index+'"/>').load(function(){
                $lightboxContainer.find('img').remove(); // Remove current image after new one is loaded
                $lightboxContainer.append($(this)).fadeIn(); // Fade in lightbox
                $img.delay(500).fadeIn(900); // Fade in image
            });
            e.preventDefault();
        });
    });

    $('body').on('tap', '.galleryClose', function(e) {
        $lightboxContainer.fadeOut(1000); // Fade out lightbox
    });

    // Lightbox controls
    $('body').on('tap', '.galleryNext, .galleryPrev', function(e){
        e.preventDefault();
        e.stopImmediatePropagation();
        var curIndex = $lightboxContainer.find('img').attr('data-index');
        var newIndex;
        if($(this).hasClass('galleryNext'))
            newIndex = parseInt(curIndex)+1; // New index will be the next one
        else
            newIndex = parseInt(curIndex)-1; // New index will be the previous one
        if($gallery.length == newIndex) // If the last item is reached
            newIndex = 0; // Set index to the first one
        if(newIndex == -1) // If the first item is reached 
            newIndex = $gallery.length-1; // Set it to the last item
        $('#lightbox img').fadeOut(500, function(){
            $(this).attr('data-index', newIndex); // Give the image a new index
            $(this).attr('src', $gallery[newIndex]).load(function(){
                $(this).fadeIn(); // Fade in new image after it's loaded
            });
        });
    });

         


})(jQuery);

