var scroll =  function(){
    var keys = { 32: 1, 37: 1, 38: 1, 39: 1, 40: 1 };

    function preventDefault(e){
        e = e || window.event;
        e.preventDefault && e.preventDefault();
        e.returnValue = false;
    }

    function preventDefaultForScrollKeys(e){
        if(keys[e.keyCode]){
            preventDefault(e);
            return false;
        }
    }

    // 记录原来的事件函数，以便恢复
    var oldonwheel, oldonmousewheel1, oldonmousewheel2, oldontouchmove, oldonkeydown; /*oldontouchstart, oldontouchend*/
    var isDisabled;

    return {
        disableScroll: function(){
            if(window.addEventListener){ // older FF
                window.addEventListener('DOMMouseScroll', preventDefault, false);
            }

            oldonwheel = window.onwheel;
            window.onwheel = preventDefault; // modern standard

            oldonmousewheel1 = window.onmousewheel;
            window.onmousewheel = preventDefault; // older browsers, IE
            oldonmousewheel2 = document.onmousewheel;
            document.onmousewheel = preventDefault; // older browsers, IE

            oldontouchmove = window.ontouchmove;
            window.ontouchmove = preventDefault; // mobile

            oldonkeydown = document.onkeydown;
            document.onkeydown = preventDefaultForScrollKeys;

            $('body, html').css({
                'overflow': 'hidden'/*,
                 'padding-right': getScrollbarWidth() + 'px'*/
            });


            isDisabled = true;
        },
        enableScroll:  function(){
            if(isDisabled){
                return;
            }
            if(window.removeEventListener){
                window.removeEventListener('DOMMouseScroll', preventDefault, false);
            }

            window.onwheel = oldonwheel; // modern standard

            window.onmousewheel = oldonmousewheel1; // older browsers, IE
            document.onmousewheel = oldonmousewheel2; // older browsers, IE

            window.ontouchmove = oldontouchmove; // mobile

            document.onkeydown = oldonkeydown;

            $('body, html').css({
                'overflow': 'auto'
            });
            keys = null;
            isDisabled = false;
        }
    };
}