(function($){
    jQuery.fn.boutique=function(bC){
        var ba=$.extend({
            starter : 1,
            speed : 600,
            hovergrowth : 0.08,
            behind_opac : 0.4,
            back_opac : 0.15,
            behind_size : 0.7,
            back_size : 0.4,
            autoplay : false,
            autointerval : 3000,
            freescroll : true,
            easing : 'easeInOutQuad',
            move_twice_easein : 'easeInCirc',
            move_twice_easeout : 'easeOutCirc'
        },bC);

        $(this).each(function(){
            var b,easingplugin,header,hoverspeed,$newitem1,$newitem2,$newitem3,$newitem4,$newitem5,eazing,zpeed,next,iegrow,container_height;
            var c=$(this).attr('id');
            var d=c+'_item1';
            var e=c+'_item2';
            var f=c+'_item3';
            var g=c+'_item4';
            var h=c+'_item5';
            var i=false;
            var j=ba.starter;
            var k=$(this).find(' li').length;
            var l=false;
            var m=false;
            if($.browser.msie){
                l=true;
                if($.browser.version=='6.0'){m=true}
            }
            if(ba.hoverspeed){hoverspeed=ba.hoverspeed}
            else{hoverspeed=(ba.speed/4)}

            if(ba.starter>k){ba.starter=k}
            if($.easing.def){easingplugin=true;$.easing.def=ba.easing}
            else{easingplugin=false}
            var n=$(this);
            var o=$('li',n);
            var x=1;
            var p=new Array();

            o.each(function(){
                $(this).addClass('li'+x);
                header=$(this).find('img').attr('alt');

                if(!$(this).find('span').length){
                    if($(this).find('a').length){$(this).children('a').append('')}
                    else{$(this).append('')}
                    if(header==''){$(this).find('span').hide()}
                }
                $(this).find('span').prepend(header);
                if(header==''){
                    $(this).find('h6').hide()
                }
                p[x]=$('.li'+x,n);x++}
            );
            if(k==1){
                p[1].clone().attr('id',d).prependTo(n);
                p[1].clone().attr('id',e).prependTo(n)
            }else if(ba.starter==2){
                p[1].clone().attr('id',e).prependTo(n);
                p[k].clone().attr('id',d).prependTo(n)
            }else if(ba.starter==1){
                p[k-1].clone().attr('id',d).prependTo(n);
                p[k].clone().attr('id',e).prependTo(n)
            }else{
                p[ba.starter-1].clone().attr('id',e).prependTo(n);
                p[ba.starter-2].clone().attr('id',d).prependTo(n)
            }
            p[ba.starter].clone().attr('id',f).prependTo(n);
            if(k==1){
                p[1].clone().attr('id',g).prependTo(n);
                p[1].clone().attr('id',h).prependTo(n)
            }else if(ba.starter==(k-1)){
                p[k].clone().attr('id',g).prependTo(n);
                p[1].clone().attr('id',h).prependTo(n)
            }else if(ba.starter==k){
                p[1].clone().attr('id',g).prependTo(n);
                p[2].clone().attr('id',h).prependTo(n)
            }else{
                p[ba.starter+1].clone().attr('id',g).prependTo(n);
                p[ba.starter+2].clone().attr('id',h).prependTo(n)
            }
            var q=$('#'+d);
            var r=$('#'+e);
            var s=$('#'+f);
            var t=$('#'+g);
            var u=$('#'+h);

            q.show().animate({opacity:0},0).addClass('back');
            r.show().animate({opacity:0},0).addClass('behind');
            s.show().animate({opacity:0},0).addClass('front');
            t.show().animate({opacity:0},0).addClass('behind');
            u.show().animate({opacity:0},0).addClass('back');

            var v=$('.back',n);
            var w=$('.behind',n);
            var y=$('.front',n);
            var z=parseInt(n.css('width'));
            var A=parseInt(o.css('borderLeftWidth'));
            var B=parseInt(o.css('padding-left'));
            var C=parseInt($('img',y).css('width'));
            var D=parseInt($('img',y).css('height'));
            var E=$('h6',y).css('font-size');
            var F=$('span',y).css('font-size');
            var G=y.css('margin-top');
            var H=parseInt($('img',y).css('margin-left'));
            var I=Math.round(C+(H*2)+(B*2)+(A*2));
            var J=Math.round(D+(H*2)+(B*2)+(A*2));
            var K=Math.round(C*ba.behind_size);
            var L=Math.round(D*ba.behind_size);
            var M=$('h6',w).css('font-size');
            var N=$('span',w).css('font-size');
            var O=w.css('margin-top');
            var P=parseInt($('img',w).css('margin-left'));
            var Q=Math.round(K+(P*2)+(B*2)+(A*2));
            var R=Math.round(L+(P*2)+(B*2)+(A*2));
            var S=Math.round(C*ba.back_size);
            var T=Math.round(D*ba.back_size);
            var U=$('h6',v).css('font-size');
            var V=$('span',v).css('font-size');
            var W=v.css('margin-top');
            var X=parseInt($('img',v).css('margin-left'));
            var Y=Math.round(S+(X*2)+(B*2)+(A*2));
            var Z=Math.round(T+(X*2)+(B*2)+(A*2));
            var bb=Math.round((z/4)-(Q/2));
            var bc=Math.round((z/2)-(I/2));
            var bd=(z-bb-Q);
            var be=(z-Y);

            v.removeClass('back');
            w.removeClass('behind');
            y.removeClass('front');

            var bf=$('span',o).css('padding-top');
            var bg=$('span',o).css('padding-right');
            var bh=$('span',o).css('padding-bottom');
            var bi=$('span',o).css('padding-left');
            var bj=Math.round(parseInt(bf)*0.8)+'px';
            var bk=Math.round(parseInt(bg)*0.8)+'px';
            var bl=Math.round(parseInt(bh)*0.8)+'px';
            var bm=Math.round(parseInt(bi)*0.8)+'px';
            var bn=Math.round(parseInt(bf)*0.6)+'px';
            var bo=Math.round(parseInt(bg)*0.6)+'px';
            var bp=Math.round(parseInt(bh)*0.6)+'px';
            var bq=Math.round(parseInt(bi)*0.6)+'px';
            var br={
                'font-size':F,
                'padding-top':bf,
                'padding-right':bg,
                'padding-bottom':bh,
                'padding-left':bi
            };
            var bs={
                'font-size':N,
                'padding-top':bj,
                'padding-right':bk,
                'padding-bottom':bl,
                'padding-left':bm
            };
            var bt={
                'font-size':V,
                'padding-top':bn,
                'padding-right':bo,
                'padding-bottom':bp,
                'padding-left':bq
            };

            if(m){
                var bu=(parseInt($('span:visible',y).css('margin-left'))+parseInt($('span:visible',y).css('margin-right')));
                var bv=(parseInt($('span:visible',w).css('margin-left'))+parseInt($('span:visible',w).css('margin-right')));
                var bw=(parseInt($('span:visible',v).css('margin-left'))+parseInt($('span:visible',v).css('margin-right')));
                var bx=$.extend({width:I-parseInt(bg)-parseInt(bi)-bu-(A*2)},br);
                var by=$.extend({width:Q-parseInt(bk)-parseInt(bm)-bv-(A*2)},bs);
                var bz=$.extend({width:Y-parseInt(bo)-parseInt(bq)-bw-(A*2)},bt)
            }
            var bA=(J+parseInt(G));
            var bB=(R+parseInt(O));
            var bD=(Z+parseInt(W));

            if(bA>bB&&bA>bD){container_height=bA}
            else if(bB>bA&&bB>bD){container_height=bB}
            else{container_height=bD}
            
            n.height(container_height);
            q.css({left:0,top:W}).animate({
                opacity : ba.back_opac
            },0).find('img').animate({
                width:S+'px',
                height:T+'px',
                margin:X+'px',
                opacity:1
            },0).siblings('span:visible').css(bt).children('h6:visible').css({'font-size':U});
            
            r.css({
                left:bb+'px',
                top:O,
                'z-index':2
            }).animate({
                opacity:ba.behind_opac
            },0).find('img').animate({
                width:K+'px',
                height:L+'px',
                margin:P+'px',
                opacity:1
            },0).siblings('span:visible').css(bs).children('h6:visible').css({'font-size':M});
            
            s.css({
                left:bc+'px',
                top:G,'z-index':3
            }).animate({opacity:1},0).find('a *').css({cursor:'pointer'}).end().find('img').animate({width:C+'px',height:D+'px',margin:H+'px',opacity:1},0).siblings('span:visible').css(br).children('h6:visible').css({'font-size':E});
            
            t.css({left:bd+'px',top:O,'z-index':2}).animate({opacity:ba.behind_opac},0).find('img').animate({width:K+'px',height:L+'px',margin:P+'px',opacity:1},0).siblings('span:visible').css(bs).children('h6:visible').css({'font-size':M});
            u.css({left:be+'px',top:W}).animate({opacity:ba.back_opac},0).find('img').animate({width:S+'px',height:T+'px',margin:X+'px',opacity:1},0).siblings('span:visible').css(bt).children('h6:visible').css({'font-size':U});
            if(m){
                $('span:visible',v).css(bz);
                $('span:visible',w).css(by);$('span:visible',y).css(bx)
            }
            
            function stopInterval(){
                if(b){
                    clearInterval(b);
                    b=false
                }
            }
            function startInterval(){
                if(b){stopInterval()}
                b=setInterval("$('#"+g+"').click()",ba.autointerval)
            }
            function moveRight(a){
                i=true;
                eazing='';
                zpeed=ba.speed;
                if(easingplugin){
                    if(a=='twice'){
                        eazing=ba.move_twice_easein;
                        zpeed=Math.round(ba.speed*0.5)
                    }else if(a=='twice_end'){
                        eazing=ba.move_twice_easeout
                    }else{eazing=ba.easing}
                }if(ba.autoplay){
                    stopInterval()
                }if(j==(k-2)){next=1}
                else if(j==(k-1)){
                    next=2;
                    if(next>k){next=1}
                }else if(j==k){
                    next=3;
                    if(next>k){next=1}
                }else{next=(j+3)}

                $('#'+d).removeAttr('id','').addClass('remove').css('z-index',-1);
                $newitem1=$('#'+e);
                $newitem1.attr('id',d).stop().animate({
                    opacity:ba.back_opac,
                    left:0,
                    top:W
                },zpeed,eazing).find('img').stop().animate({
                    width:S+'px',
                    height:T+'px',
                    margin:X+'px',
                    opacity:1
                },zpeed,eazing).end().find('h6:visible').stop().animate({
                    'font-size':U
                },zpeed,eazing);
                
                if(m){$newitem1.find('span:visible').stop().animate(bz,zpeed,eazing)}
                else{$newitem1.find('span').stop().animate(bt,zpeed,eazing)}
                
                setTimeout(function(){
                    $newitem1.css('z-index',1)
                },(zpeed/4));

                $newitem2=$('#'+f);
                $newitem2.attr('id',e).stop().animate({
                    opacity:ba.behind_opac,
                    left:bb+'px',top:O
                },zpeed,eazing).find('img').stop().animate({
                    width:K+'px',
                    height:L+'px',
                    margin:P+'px',opacity:1
                },zpeed,eazing).end().find('h6:visible').stop().animate({'font-size':M},zpeed,eazing);
                
                if(m){$newitem2.find('span:visible').stop().animate(by,zpeed,eazing)}
                else{$newitem2.find('span').stop().animate(bs,zpeed,eazing)}
                
                setTimeout(function(){
                    $newitem2.css('z-index',2)
                },(zpeed/4));

                $newitem3=$('#'+g);$newitem3.attr('id',f).stop().animate({opacity:1,left:bc+'px',top:G},zpeed,eazing).find('img').stop().animate({width:C+'px',height:D+'px',margin:H+'px',opacity:1},zpeed,eazing).end().find('h6:visible').stop().animate({'font-size':E},zpeed,eazing);
                if(m){$newitem3.find('span:visible').stop().animate(bx,zpeed,eazing)}
                else{$newitem3.find('span').stop().animate(br,zpeed,eazing)}
                
                setTimeout(function(){$newitem3.css('z-index',3)},(zpeed/4));
                $newitem4=$('#'+h);
                $newitem4.attr('id',g).stop().animate({opacity:ba.behind_opac,left:bd+'px',top:O},zpeed,eazing).find('img').stop().animate({width:K+'px',height:L+'px',margin:P+'px',opacity:1},zpeed,eazing).end().find('h6:visible').stop().animate({'font-size':M},zpeed,eazing);
                if(m){$newitem4.find('span:visible').stop().animate(by,zpeed,eazing)}
                else{$newitem4.find('span').stop().animate(bs,zpeed,eazing)}

                setTimeout(function(){$newitem4.css('z-index',2)},(zpeed/4));p[next].clone().attr('id',h).prependTo(n).show().animate({opacity:0,left:be+'px',top:W},0).animate({opacity:ba.back_opac},zpeed,function(){
                    $('#'+e+' a *').css({cursor:'default'});

                    if(ba.autoplay){startInterval()}
                    if(a=='twice'){moveRight('twice_end')}
                    else{$('#'+f+' a *').css({cursor:'pointer'})}
                    
                    if(!$('#'+f).is(":animated")){
                        i=false;
                        $('.remove').stop().fadeOut(zpeed,function(){$(this).remove()})
                    }
                }).find('img').animate({width:S+'px',height:T+'px',margin:X+'px',opacity:1},0).end().find('h6:visible').css({'font-size':U});
                if(m){$('#'+h).find('span:visible').animate(bz,0)}else{$('#'+h).find('span').animate(bt,0)}$('.remove').fadeOut(zpeed,function(){$(this).remove()});if(j==k){j=1}else{j=(j+1)}}function moveLeft(a){i=true;eazing='';zpeed=ba.speed;if(easingplugin){if(a=='twice'){eazing=ba.move_twice_easein;zpeed=Math.round(ba.speed*0.5)}else if(a=='twice_end'){eazing=ba.move_twice_easeout}else{eazing=ba.easing}}if(ba.autoplay){stopInterval()}if(j==3){next=k}else if(j==2){next=(k-1);if(next<1){next=k}}else if(j==1){next=(k-2);if(next<1){next=k}}else{next=(j-3)}$('#'+h).removeAttr('id').addClass('remove').css('z-index',-1);$newitem5=$('#'+g);$newitem5.attr('id',h).stop().animate({opacity:ba.back_opac,left:be+'px',top:W},zpeed,eazing).find('img').stop().animate({width:S+'px',height:T+'px',margin:X+'px',opacity:1},zpeed,eazing).end().find('h6:visible').stop().animate({'font-size':U},zpeed,eazing);if(m){$newitem5.find('span:visible').stop().animate(bz,zpeed,eazing)}else{$newitem5.find('span').stop().animate(bt,zpeed,eazing)}setTimeout(function(){$newitem5.css('z-index',1)},(zpeed/4));$newitem4=$('#'+f);$newitem4.attr('id',g).stop().animate({opacity:ba.behind_opac,left:bd+'px',top:O},zpeed,eazing).find('img').stop().animate({width:K+'px',height:L+'px',margin:P+'px',opacity:1},zpeed,eazing).end().find('h6:visible').stop().animate({'font-size':M},zpeed,eazing);if(m){$newitem4.find('span:visible').stop().animate(by,zpeed,eazing)}else{$newitem4.find('span').stop().animate(bs,zpeed,eazing)}setTimeout(function(){$newitem4.css('z-index',2)},(zpeed/4));$newitem3=$('#'+e);$newitem3.attr('id',f).stop().animate({opacity:1,left:bc+'px',top:G},zpeed,eazing).find('img').stop().animate({width:C+'px',height:D+'px',margin:H+'px',opacity:1},zpeed,eazing).end().find('h6:visible').stop().animate({'font-size':E},zpeed,eazing);if(m){$newitem3.find('span:visible').stop().animate(bx,zpeed,eazing)}else{$newitem3.find('span').stop().animate(br,zpeed,eazing)}setTimeout(function(){$newitem3.css('z-index',3)},(zpeed/4));$newitem2=$('#'+d);$newitem2.attr('id',e).stop().animate({opacity:ba.behind_opac,left:bb+'px',top:O},zpeed,eazing).find('img').stop().animate({width:K+'px',height:L+'px',margin:P+'px',opacity:1},zpeed,eazing).end().find('h6:visible').stop().animate({'font-size':M},zpeed,eazing);if(m){$newitem2.find('span:visible').stop().animate(by,zpeed,eazing)}else{$newitem2.find('span').stop().animate(bs,zpeed,eazing)}setTimeout(function(){$newitem2.css('z-index',2)},(zpeed/4));p[next].clone().attr('id',d).prependTo(n).show().animate({opacity:0,left:0,top:W},0).animate({opacity:ba.back_opac},zpeed,function(){$('#'+g+' a *').css({cursor:'default'});if(ba.autoplay){startInterval()}if(a=='twice'){moveLeft('twice_end')}else{$('#'+f+' a *').css({cursor:'pointer'})}if(!$('#'+f).is(":animated")){i=false;$('.remove').stop().fadeOut(zpeed,function(){$(this).remove()})}}).find('img').animate({width:S+'px',height:T+'px',margin:X+'px',opacity:1},0).end().find('h6:visible').css({'font-size':U});if(m){$('#'+d).find('span:visible').animate(bz,0)}else{$('#'+d).find('span').animate(bt,0)}$('.remove').fadeOut(zpeed,function(){$(this).remove()});if(j==1){j=k}else{j=(j-1)}}$('#'+d).live('click',function(){if(ba.freescroll||!i){moveLeft('twice')}});$('#'+e).live('click',function(){if(ba.freescroll||!i){moveLeft()}});$('#'+g).live('click',function(){if(ba.freescroll||!i){moveRight()}});$('#'+h).live('click',function(){if(ba.freescroll||!i){moveRight('twice')}});$('#'+f).live('hover',function(a){if(a.type=='mouseover'&&!i){if(ba.autoplay){stopInterval()}$(this).addClass('zoomed').stop(true,true).animate({left:'-='+(C*(ba.hovergrowth/2))+'px',top:'-='+(D*ba.hovergrowth)+'px'},hoverspeed).find('img').stop().animate({width:(C*(1+ba.hovergrowth))+'px',height:(D*(1+ba.hovergrowth))+'px'},hoverspeed);$('#'+e).stop(true,true).animate({left:'-='+(K*ba.hovergrowth)+'px'},hoverspeed);$('#'+g).stop(true,true).animate({left:'+='+(K*ba.hovergrowth)+'px'},hoverspeed);if(m){iegrow=Math.round(ba.hovergrowth*C);$(this).find('span:visible').animate({width:'+='+iegrow},hoverspeed)}}else if(!i){if(ba.autoplay){startInterval()}$(this).stop().animate({left:bc+'px',top:G},hoverspeed).find('img').stop().animate({width:C+'px',height:D+'px'},hoverspeed,function(){$('#'+f).removeClass('zoomed')});$('#'+e).stop().animate({left:bb},hoverspeed);$('#'+g).stop().animate({left:bd},hoverspeed);if(m){iegrow=Math.round(ba.hovergrowth*C);n.find('.zoomed span:visible').animate({width:'-='+iegrow},hoverspeed)}}});if(!l){$('#'+f+':not(.zoomed)').live('mousemove',function(){$('#'+f).mouseover()})}$('#'+d+' a, #'+e+' a, #'+g+' a, #'+h+' a').live('click',function(a){a.preventDefault()});$(document).keydown(function(a){if(a.keyCode==13){$('#'+g).click()}if(a.keyCode==32){a.preventDefault();$('#'+g).click()}if(a.keyCode==37){a.preventDefault();$('#'+e).click()}if(a.keyCode==39){a.preventDefault();$('#'+g).click()}});if(ba.autoplay){startInterval()}})}})(jQuery);








