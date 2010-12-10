var Portfolio=new(function(){

    /* PRIVATE PROPERTIES
     **************************************************************************/
     var _index=0;
     var _step=2;
     var _temp=false;
     var _break=false;

    /* CONSTRUCTOR
     **************************************************************************/
    $(document).ready(function(e){

        /*  SLIDER CLIENTES   [INICIO]
         ***************************************/
        var parent = $('#slider1');
        var slide = parent.find('ul');
        var w = slide.find('li').innerWidth();
        var count = slide.find('li').length;
        var wcont = parent.find('.cont').width();

        slide.css('width', w*count+'px');

        parent.find('.next').click(function(e){
            e.preventDefault();

            if( !_break ){
                _index++;
                clearInterval(_temp);                
                slide.stop().animate({
                    left : '-='+w*_step
                }, 500, function(){
                    clearInterval(_temp);
                });
                _temp = setInterval(function(){
                    if( (slide.innerWidth() + parseInt(slide.css('left'))) <= wcont ){
                        slide.stop();
                        _break=true;
                        slide.css('left', '-'+(slide.innerWidth()-wcont)+'px');
                        clearInterval(_temp);
                    }
                }, 50);
            }

            return false;
        });

        parent.find('.prev').click(function(e){
            e.preventDefault();

            if( _index>0 ){
                _index--;
                clearInterval(_temp);
                slide.stop().animate({
                    left : '+='+w*_step
                }, 500, function(){
                    clearInterval(_temp);
                    _break=false;
                });
                /*_temp = setInterval(function(){
                    if( parseInt(slide.css('left')) <=0 ){
                        slide.stop();
                        clearInterval(_temp);
                        slide.css('left', 0);
                        _break=false;
                        _index=0;
                    }
                }, 50);*/
            }

            return false;
        });
        /*  SLIDER CLIENTES   [FIN]
         ***************************************/


        /*  PORTFOLIO   [INICIO]
         ***************************************/
         $('#portfolio-list li .message').each(function(){
             var t=$(this);
             t.data('top', t.parent().height()+'px');
             t.data('top2', t.parent().height()-t.innerHeight()+'px');
             t.css({
                 top     : t.data('top'),
                 opacity : '0.8'
             });
         });
         var sel = $.browser.msie ? '#portfolio-list li img' : '#portfolio-list li .info';
         $(sel).hover(function(){
             var t=$(this);
             var a = t.is('img') ? t.parent().find('.message') : t.find('.message');
                 a.show().show().animate({
                     top    : a.data('top2')
                 });

         }, function(){
             var t=$(this);
             var a = t.is('img') ? t.parent().find('.message') : t.find('.message');
                 a.show().animate({
                     top    : a.data('top')
                 });
         });

        // Filter initiall on pageload
        _filterByHash();

        // Re-filter when a tag is selected
        $('#portfolio-filter a').click(function(){
            _filterByHash($(this).attr('href').substr(1));
            return false;
        });
        
        return false;
    });
    


    /* PRIVATE METHODS
     **************************************************************************/
    var _filterByHash = function(tag) {
        // Cache the portfolio items
        var portfolioItems = $('#portfolio-list li');
        // And the tag links
        var portfolioFilters = $('#portfolio-filter a');

        // De-select all the filter links
        portfolioFilters.removeClass('current');

        if (tag) {
            if (tag == 'all' || tag == '') {
                // Show all the items
                portfolioItems.animate({width: 'show', opacity: 'show'});
                // Highlight the 'All' tag
                $(portfolioFilters).filter('.all').addClass('current');
            } else {
                // Show the desired items and hide the rest
                $('#portfolio-list li.' + tag).animate({width: 'show', opacity: 'show'});
                $('#portfolio-list li:not(.' + tag + ')').animate({width: 'hide', opacity: 'hide'});
                // Highlight the tag
                portfolioFilters.filter('a[href$=' + tag + ']').addClass('current');
            }
        } else {
            // Use the url hash if a tag wasn't passed in
            tag = location.hash.substr(1);

            if (tag == 'all' || tag == '') {
                // Highlight the 'All' tag
                $(portfolioFilters).filter('.all').addClass('current');
            } else {
                // Hide the undesired ones
                $('#portfolio-list li:not(.' + tag + ')').hide();
                // Highlight the tag
                portfolioFilters.filter('a[href$=' + tag + ']').addClass('current');
            }
        }
    }

});
