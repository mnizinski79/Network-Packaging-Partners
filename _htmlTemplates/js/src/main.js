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

function initMobileTrigger() {
    $(".nav-trigger").click(function(e) {
        e.preventDefault();
        $("body").toggleClass("mobile-nav-open");
    });
}

function initCarousel() {
    $(".carousel").each(function(index){
        //set some vars
        var _this = $(this);
        var _items = _this.find(".carousel-item");
        var _itemCount = _items.length;
        var _pageCount = 1;
        var _itemsPerPage = 1;
        var _parentSection = _this.parent();
        
        var _wrapperWidth, _itemWidth, _itemPadding, _carouselWidth, _navDots = "";
        
        //create a wrapper
        var _carouselID = "carousel_" + index;
        var _wrapper = "<div class='carousel-wrapper' id='" + _carouselID + "'></div>";
        
        //place carousel into wrapper
        _this.wrap(_wrapper);
         
        var _setSize = function(){
            _wrapperWidth = _this.parent().outerWidth();
            
            if($(window).outerWidth() < 620){//small
                _itemPadding = _wrapperWidth * 0.02;
                _itemWidth = _wrapperWidth * 0.9 + _itemPadding;
                _carouselWidth = _itemWidth * _itemCount;
                
                _itemsPerPage = 1;
                
            } else {//medium, large and ex-large
                _itemPadding = _wrapperWidth * 0.02;
                _itemWidth = _wrapperWidth/3 + _itemPadding/3;
                _carouselWidth = _itemWidth * _itemCount;
                
                _itemsPerPage = 3;
            }
            
            _pageCount = Math.ceil(_itemCount/_itemsPerPage);
            
            //set carousel width and item width 
            _items.each(function(){
                $(this).css({
                    "width": _itemWidth,
                    "paddingRight": _itemPadding
                }); 
            });
            
            _this.width(_carouselWidth);
        };
        
        _setSize();
        
        //create the number of dots
		for (var i=0; i<_pageCount; i++){
			if (i === 0) {
				_navDots += "<span class='nav-dot-current' data-index='" + i + "'></span>";
			} else {
				_navDots += "<span data-index='" + i + "'></span>";
			}
		}
        
        //create controls
        $("<div class='scrollControls'><div class='scroll-btn-prev' data-carousel='" + _carouselID + "'><span>prev</span></div><div class='scroll-btn-next' data-carousel='" + _carouselID + "'><span>next</span></div></div>").appendTo(_parentSection);
        $("<div class='nav-dots'>" + _navDots + "</div>").appendTo(_parentSection);
        
        //set arrow clicks
        $(".scroll-btn-prev").click(function(e){
            e.preventDefault();
            
            var _target = $(this).attr("data-carousel");
            var _targetObj = $("#" + _target).find(".carousel").first();
            var _distance = parseInt(_itemWidth * _itemsPerPage);
            var _currentPos = parseInt(_targetObj.css("left"));
            
            if(_currentPos < 0){
                var _newPos = _currentPos + _distance;
                _targetObj.css({
                    "left": _newPos
                });
            }
        });
        
        $(".scroll-btn-next").click(function(e){
            e.preventDefault();
            
            var _target = $(this).attr("data-carousel");
            var _targetObj = $("#" + _target).find(".carousel").first();
            var _distance = parseInt(_itemWidth * _itemsPerPage);
            var _currentPos = parseInt(_targetObj.css("left"));
            var _maxScroll = _distance * (_pageCount-1);
            
            if(_currentPos > -(_maxScroll)){
                var _newPos = _currentPos - _distance;
                _targetObj.css({
                    "left": _newPos
                });
            }
        });
        
        $(window).resize( _setSize ).trigger("resize");
        
    });
}

// jquery is ready
$(document).ready(function(){
    
    initParalax();
    initMobileTrigger();
    initCarousel();
    
});