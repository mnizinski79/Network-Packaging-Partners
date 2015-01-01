/* ## parallax #################################################### */    

var _globalSpeed = null;

function initParallax() {
    //duplicate and place an image tag
    var _targetContainer = $(".parallax"); 
    var _bgImg = _targetContainer.css("background-image");
    //var _bgURL = _bgImg.substring(_bgImg.indexOf("(")+1,_bgImg.lastIndexOf(")"));
    
    var _parallaxImg = "<div class='parallax-image-container'></div>";
    
    _targetContainer.append(_parallaxImg);
    
    function setParallaxSize(){
        var _headerOffset = $("header").css("position") === "relative" ? $("header").outerHeight() : 0;
        
        $(".parallax-image-container").css({
            "width" : _targetContainer.outerWidth(),
            "height" : _targetContainer.outerHeight() + _headerOffset,
            "backgroundImage" : _bgImg
        });
        
        $(".parallax-image-container").css("top",function(){
            var _headerOffset = 0;//$("header").css("position") === "relative" ? $("header").outerHeight() : 0;
            var _offset = $(this).offset();
            var _top = _offset.top;
            var _style = _top + _headerOffset;

            return _style;
        });
    }
    
    setParallaxSize();
    _targetContainer.removeAttr("style");//remove the original
    
    //bind to scroll
    //var _speed = 0.5;
    var _speed = _globalSpeed!==null ? _globalSpeed : 0.5;
    
    function handleScroll(){   
        var _headerOffset = 0;//$("header").css("position") === "relative" ? $("header").outerHeight() : 0;
        
        $(".parallax-image-container").css("top", function(){            
            var _newPos = (-($(window).scrollTop())*_speed) + _headerOffset;
            
            return _newPos;
        });
    }
    
    
    
    $(window).scroll( handleScroll );
    $(window).resize( setParallaxSize );
    
}

function getBackgroundPos(obj) {
    var pos = obj.css("background-position");
    if (pos === 'undefined' || pos === null) {
        pos = [obj.css("background-position-x"),obj.css("background-position-y")];//i hate IE!!
    } else {
        pos = pos.split(" ");
    }
    return {
        x: parseFloat(pos[0]),
        xUnit: pos[0].replace(/[0-9-.]/g, ""),
        y: parseFloat(pos[1]),
        yUnit: pos[1].replace(/[0-9-.]/g, "")
    };
}

function initPosMessage() {
    $(".branding-box").each(function(){
        var _this = $(this);
        
        var _origPos,
        _winWidth,
        _winHeight,
        //_ratio,
        _contentHeight,
        _imgHeight,
        _speed,
        _distance,
        _paralax;

        function handleResize(){
            _origPos = getBackgroundPos(_this).y;
            _winWidth = $(window).width();
            _winHeight = $(window).height();
            //_ratio = 505/1300;
            _contentHeight = _this.height();
            _imgHeight = 1.2*_contentHeight;
            _distance = _imgHeight - _contentHeight;
            _speed = _distance/_winHeight;
            _globalSpeed = _speed;

            if(_winWidth > _winHeight){
                _paralax = true;
            } else {
                _paralax = false;
            }
            
            
        }
        
        function handleScroll(){        
            if(_paralax === true){
                //var _newPos = "center " + -(($(window).scrollTop()*_globalSpeed)) + "px";
                var _newPosX = "50%";
                var _newPosY = -(($(window).scrollTop()*_globalSpeed)) + "px";
                
                _this.css({
                    "background-position-x": _newPosX,
                    "background-position-y": _newPosY
                });
            } else {
                _this.css({
                    "background-position-x": "40%",
                    "background-position-y": "50%"
                });
            }
        }
        
        handleScroll();
        handleResize();

        $(window).scroll( handleScroll );
        $(window).resize( handleResize );
        
    });
}

function initFooter() {
    var _origPos,
    _winWidth,
    _winHeight,
    _ratio,
    _contentHeight,
    _imgHeight,
    _speed,
    _distance,
    _paralax;

    function handleResize(){
        _origPos = getBackgroundPos($(".sub-footer")).y;
        _winWidth = $(window).width();
        _winHeight = $(window).height();
        _ratio = 1350/1200;
        _contentHeight = $("#container").height();
        _imgHeight = _ratio*_winWidth;
        _distance = _imgHeight - _winHeight;
        _speed = _distance/_contentHeight;

        if(_winWidth > _winHeight){
            _paralax = true;
        } else {
            _paralax = false;
        }
    }

    function handleScroll(){        
        if(_paralax === true){
            
            var _newPosX = "50%";
            var _newPosY = -(($(window).scrollTop()*_speed)) + "px";

            $(".sub-footer").css({
                "background-position-x": _newPosX,
                "background-position-y": _newPosY
            });
            
            /*
            var _newPos = "center " + -(($(window).scrollTop()*_speed)) + "px";

            $(".sub-footer").css({
                "background-position": _newPos
            });
            */
        }
    }
    
    handleScroll();
    handleResize();
    
    $(window).scroll( handleScroll );
    $(window).resize( handleResize );
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
        var _currentPage = 1;
        
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
                _itemWidth = _wrapperWidth/4 + _itemPadding/4;
                _carouselWidth = _itemWidth * _itemCount;
                
                _itemsPerPage = 4;
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
            _this.css("left",0);
            _currentPage = 1;
        };
        
        //_setSize();
        
        function navigateItem(event){
            var _arg = event.data.directive;
            var _caller = event.target;
            
            var _target;
            
            if(event.data.swipeTarget){
                _target = event.data.swipeTarget;
            } else {
                _target = $(_caller).attr("data-carousel");
            }
            
            var _targetObj = $("#" + _target).find(".carousel").first();
            var _distance = parseInt(_itemWidth * _itemsPerPage);
            var _currentPos = parseInt(_targetObj.css("left"));
            var _maxScroll = _distance * (_pageCount-1);
            var _index = $(_caller).attr("data-index");
            var _newPos;
            
            if(_arg === "moveNext"){
                if(_currentPos > -(_maxScroll)){
                    _newPos = _currentPos - _distance;
                    _targetObj.css({
                        "left": _newPos
                    });

                    _currentPage += 1;
                    updateNavDots();
                }
            } else if(_arg === "movePrev"){
                if(_currentPos < 0){
                    _newPos = _currentPos + _distance;
                    _targetObj.css({
                        "left": _newPos
                    });

                    _currentPage -= 1;
                    updateNavDots();
                }
            } else if(_arg === "jump"){
                _newPos = -(_distance*_index);
                _targetObj.css({
                    "left": _newPos
                });

                _currentPage = parseInt(_index) + 1;
                updateNavDots();
            }
        }
        
        //create the number of dots
        function drawNavDots(){
            $("#navDots_" + _carouselID).remove();
            
            _navDots = "";
            
            for (var i=0; i<_pageCount; i++){
                if (i === 0) {
                    _navDots += "<span class='nav-dot-current' data-index='" + i + "' data-carousel='" + _carouselID + "'></span>";
                } else {
                    _navDots += "<span data-index='" + i + "' data-carousel='" + _carouselID + "'></span>";
                }
            }
            
            $("<div id='navDots_" + _carouselID + "' class='nav-dots'>" + _navDots + "</div>").appendTo(_parentSection);
            $("#navDots_" + _carouselID).find("span").click({directive:"jump"},navigateItem);
        }
        
        //drawNavDots();
        
        //create controls
        $("<div id='scrollControls_" + _carouselID + "' class='scrollControls'><div class='scroll-btn-prev' data-carousel='" + _carouselID + "'><span>prev</span></div><div class='scroll-btn-next' data-carousel='" + _carouselID + "'><span>next</span></div></div>").appendTo(_parentSection);
        
        //set swipe
		var _swipeArea = $("#" + _carouselID).hammer();
		_swipeArea.on("swipeleft",{directive:"moveNext",swipeTarget:_carouselID},navigateItem);
		_swipeArea.on("swiperight",{directive:"movePrev",swipeTarget:_carouselID},navigateItem);
		
		_swipeArea.on("touch", function(ev) {
			ev.gesture.preventDefault();
		});
        
        //set arrow clicks
        $("#scrollControls_" + _carouselID).find(".scroll-btn-prev").click({directive:"movePrev"},navigateItem);
        $("#scrollControls_" + _carouselID).find(".scroll-btn-next").click({directive:"moveNext"},navigateItem);
        
        //update the nav dots
        function updateNavDots(){
            $("#navDots_" + _carouselID).find("span").each(function(){
                var _this = $(this);
                
                $(this).removeClass("nav-dot-current");
                
                if(parseInt(_this.attr("data-index")) === parseInt(_currentPage-1)){
                    _this.addClass("nav-dot-current");
                }
            });
        }
        
        $(window).resize( function(){
            _setSize();
            drawNavDots();
        }).trigger("resize");
        
    });
}

function initSearchToggle() {
    $("#secondary-nav li.btn-search a").wrapInner("<span></span>");
    
    $("#secondary-nav li.btn-search a").click(function(e){
        
        e.preventDefault();
        
        //remove the event handlers
        $(document).off();
        $("#primary-search").off();
        
        if($("body").hasClass("mobile-nav-open")){
            $("body").removeClass("mobile-nav-open");
            
            setTimeout(function(){
                $("body").toggleClass("search-open");
            },500);
            
        } else {
            $("body").toggleClass("search-open");
            
            if($("body").hasClass("search-open")){
                $("#primary-search input:first").focus();
            } else {
                $("#primary-search input:first").blur();
            }
        }
        
        if($(window).outerWidth() < 980){
            $(document).click(function() {
                $("body").removeClass("search-open");
            });

            $("#primary-search").click(function(e){
                 e.stopPropagation();//make sure it doesn't close on iteself
            });
        }
        
    });
}

function initDatePicker(){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();

    if(dd<10) {
        dd='0'+dd;
    } 

    if(mm<10) {
        mm='0'+mm;
    } 

    var newdate = mm + "-" + dd + "-" + yyyy;
    
    $("#date-picker").DatePicker({
        flat: true,
        date: newdate,
        current: newdate,
        format: "m-d-Y",
        calendars: 1,
        starts: 0,
        prev: "",
        next: "",
        onChange: function(formated){
            $('#date-select').val(formated);
        }
    });
}

function initPageLeads(){
    $(".page-lead:nth-child(3n+3)").attr("data-orientation","right");
    $(".page-lead:nth-child(3n+2)").attr("data-orientation","center");
    $(".page-lead:nth-child(3n+1)").attr("data-orientation","left");
    
    $(".page-lead").hover(function(){
        $("#page-modal-wrapper").delay(200).fadeOut(300,function(){
            $(this).remove();
        });
        
        var _this = $(this);
        var _title = _this.attr("data-title");
        var _desc = _this.attr("data-content");
        var _offset = _this.offset();
        var _orientation = _this.attr("data-orientation");
        //var _itemOffset = _this.offset();
        var _img = _this.find("img");
        var _src = _img.attr("src");
        var _hoverSrc = _src.substring(0,_src.lastIndexOf("."));
        var _fileExt =  _src.substring(_src.lastIndexOf("."));
        
        //console.log(_fileExt);
        _img.attr("src",_hoverSrc + "-hover" + _fileExt);
        
        var _modalContent = "<div id='page-info-modal' class='" + _orientation + "'><h3>" + _title + "</h3><p>" + _desc + "</p></div>";
        
        $(_modalContent).prependTo("body").wrapAll("<div id='page-modal-wrapper'></div>").css({
            "opacity":0,
            "display":"block",
            "top": (_offset.top + _this.outerHeight()) - 50
        }).delay(200).animate({
            "top": (_offset.top + _this.outerHeight()) - 30,
            "opacity":1
        },850,'easeOutExpo');
        
        
        function isElementInViewport (el) {

            //special bonus for those using jQuery
            if (typeof jQuery === "function" && el instanceof jQuery) {
                el = el[0];
            }

            var rect = el.getBoundingClientRect();

            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) && /*or $(window).height() */
                rect.right <= (window.innerWidth || document.documentElement.clientWidth) /*or $(window).width() */
            );
        }
        
        var _el = $("#page-info-modal");

        if ( !isElementInViewport(_el) ) {
            if (typeof jQuery === "function" && _el instanceof jQuery) {
                _el = _el[0];
            }
            
            var rect = _el.getBoundingClientRect();
            
           $("htm,body").animate({
                scrollTop: $(window).scrollTop() + Math.abs(rect.bottom - $(window).innerHeight()) + 40
            }, 550);
            
            //console.log($(window).innerHeight);
        }
        
    }, function(){
        var _this = $(this);
        var _img = _this.find("img");
        var _src = _img.attr("src");
        var _origSrc = _src.replace("-hover","");
        
        //console.log(_fileExt);
        _img.attr("src",_origSrc);
        
        $("#page-modal-wrapper").delay(200).fadeOut(150,function(){
            $(this).remove();
        });
        
    });
}

function initFormUpload() {
    $(".form-file").each(function(){
        var _this = $(this);

        //add a new label
        var _label = $("<label for='" + _this.attr("id") + "'>Select a File (.JPG, .RTF, or .PDF)</label>");
        _label.insertBefore(_this);

        _label.addClass("form-control");

        //hide form file initial
        _this.addClass("file-upload-hide");
        
        //add a cap image to appear as a button
        function appendCap(){
            var _capContent = "<div class='form-upload-cap'></div>'";
            var _cap = $(_capContent);
            _cap.appendTo(_label);
        }
        
        appendCap();

        _this.change(function(){
            _label.text(_this.val().substr(_this.val().lastIndexOf("\\")+1));
            appendCap();
        });
    });

}

// ## Share functions #########################################
function initShareLinks(){
    $(".share-box a").click(function(){ 
        
        var _shareDir = $(this).attr("data-share");
        var _softURL = window.location.href;
        
        var _fullURL;
        
        if(_shareDir === "twitter") {
            _fullURL = encodeURI("https://twitter.com/intent/tweet?url=" + String(_softURL));
            openShareWin(_fullURL);
        } else if(_shareDir === "facebook"){
            _fullURL = encodeURI("http://www.facebook.com/sharer/sharer.php?u=" + String(_softURL));
            openShareWin(_fullURL);
        } else if(_shareDir === "linkedin") {
            _fullURL = encodeURI("http://www.linkedin.com/shareArticle?mini=true&url=" + String(_softURL));
            openShareWin(_fullURL);
        } else if(_shareDir === "googleplus") {
            _fullURL = encodeURI("https://plus.google.com/share?url=" + String(_softURL));
            openShareWin(_fullURL);
        } 
        
        return false;     
    });
    
    function openShareWin(_shareURL){
        var config; 
        window.open(_shareURL,"Share This",config="height=440,width=520,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no,directories=no,status=no"); 
    }
}


// jquery is ready
$(document).ready(function(){
    
    initMobileTrigger();
    initCarousel();
    initSearchToggle();
    initPageLeads();
    initDatePicker();
    initFormUpload();
    initShareLinks();
    
    initPosMessage();
    initParallax();
    initFooter();
    
    $(".secondary-content select").chosen();
    
});