/* ## parallax #################################################### */    

function initParalax(){
    var _winHeight;
    var _speed = 0.5;
    
    var _headerHeight = $("header").css("position") === "fixed" ? $("header").outerHeight() : 0;
    
    function setBGPos(){
        $(".parallax").css("background-position",function(){
            var _offset = $(this).offset() + _headerHeight;
            var _top = _offset.top;
            var _style = "center " + -($(window).scrollTop()-(_top))*_speed + "px";

            return _style;
        });
    }
    
    //resize events
    function handleResize() {
        _winHeight = $(window).height(); 
        if($(".covers").height() < _winHeight){
            $(".covers").height(_winHeight*0.8);
        }
        
        setBGPos();
    }
    
    //bind to scroll
    
    function handleScroll(){          
        $(".parallax").css("background-position", function(){            
            var _offset = $(this).offset();
            var _top = _offset.top;
            var _newPos = "center " + -($(window).scrollTop()-(_top))*_speed + "px";
            
            return _newPos;
        });
    }
    
    $(window).scroll( handleScroll );
    $(window).resize( handleResize ).trigger("resize");   
}

// jquery is ready
$(document).ready(function(){
    
    initParalax();
    
});