var zcNoScroll = false;
(function ($) {

    //These variables can be changed
    var smoothScroll = 5;

    //Do not change these variables
    var curShotDimensions;
    var curZoomDimensions;
    var moveInterval = null;
    var mx, my;
    var targetZoom;
    var currentShotIndex = 0;
    var maxPortraitImageWidth = 315;
    var maxLandscapeImageWidth = 385;
    var orientation = "portrait";
    var totalImages = 0;
    var thumbNailsLoaded = 0;
    var navStartIndex = 0;
    var navLiMargin = 16;
    var isCarouselScrolling = false;

    var methods = {
        ///////////////////////Init/////////////////////
        init: function () {

            var zoomComponent = this;
            //Can't initialise this component until the first shot image is loaded
            //but - we need to check if the image is already cached. If it is, the loaded event wont fire
            //so - call the same initZoomComponents method if the image is cached or if not, call it when the image
            //is loaded.
            $(".ShotView img").each(function () {

                //If the image isn't cached, only call initZoomComponents when it is loaded 
                if (!this.complete) {
                    $(this).load(function () {

                        methods.initZoomComponents(zoomComponent, $(this));
                    });
                    //Else, the image is cached, proceed..
                } else {

                    methods.initZoomComponents(zoomComponent, $(this));
                }
            });
        },

        isMobile: function () {

            if (navigator.userAgent.match(/iPhone/i)) {
                return true;
            }

            //List mobile agents
            var agents = ['android', 'webos', 'iphone', 'blackberry'];
            //Check is user is on mobile device
            for (i in agents) {
                if (navigator.userAgent.match('../' + agents[i] + '/i')) {
                    return true;
                }
            }
            return false;
        },


        initZoomComponents: function (zoomComponent, defaultImage) {


            //Get defualt image dimensions and set orientation
            var imgObj = methods.getImageDimensions(defaultImage);

            //set total images and make sure we can check that they have all loaded
            totalImages = $(".ThumbNailNav ul img").size();
            thumbNailsLoaded = 0;



            $(".ThumbNailNav ul img").each(function () {
                if (!this.complete) {
                    $(this).load(function () {
                        thumbNailsLoaded++;
                    });
                    //Else, the image is cached, proceed..
                } else {
                    thumbNailsLoaded++;
                }
            });



            //Set orientation and position carousel navigation accordingly
            if (imgObj.width > imgObj.height) {



                zoomComponent.addClass("Landscape");
                zoomComponent.removeClass("Portrait");
                var tn = zoomComponent.find(".ThumbNailNav");

                zoomComponent.append(tn);

                orientation = "landscape";

                methods.setLandscapeNavSize();

                if (imgObj.width > maxLandscapeImageWidth) {

                    var heightFactor = imgObj.width / imgObj.height;
                    imgObj.width = maxLandscapeImageWidth;
                    imgObj.height = imgObj.width / heightFactor;

                    $(".ShotView img").height(imgObj.height);
                    $(".ShotView img").width(imgObj.width);
                }



            } else {

                methods.setPortraitNavSize();

                //Now check that the image isn't too wide
                //If it is, resize it to max width and set height by the same factor
                if (imgObj.width > maxPortraitImageWidth) {

                    var heightFactor = imgObj.width / imgObj.height;
                    imgObj.width = maxPortraitImageWidth;
                    imgObj.height = imgObj.width / heightFactor;
                    $(".ShotView img").height(imgObj.height);
                    $(".ShotView img").width(imgObj.width);
                }

                zoomComponent.addClass("Portrait");
                zoomComponent.removeClass("Landscape");
                var tn = zoomComponent.find(".ThumbNailNav");
                zoomComponent.prepend(tn);

                orientation = "portrait";
            }



            //Set height of shot view based on image dimensions
            var shotView = zoomComponent.find(".ShotView")
            shotView.height(imgObj.height);

            $(".shotWrapper").height(imgObj.height);

            //Store current image dimensions
            curShotDimensions = imgObj;

            //Store target zoom img
            targetZoom = zoomComponent.find(".ThumbNailNav ul li a").first().attr("rel");

            //Create click handlers for carousel
            zoomComponent.find(".ThumbNailNav ul li").each(function () {
                $(this).find("a").bind('click', function () {

                    //If image is already selected, cancel the request
                    if ($(this).parent().hasClass("selected")) {
                        //return false;
                    }

                    //Pass href/path of new shot image to updateShotImage
                    methods.updateShotImage($(this).attr("href"));

                    //set new target image
                    targetZoom = $(this).attr("rel");

                    //Update selected image styling
                    $(".ThumbNailNav li").removeClass("selected");
                    $(this).parent().addClass("selected");

                    //Store current shot index (to allow us to page from elsewhere)
                    currentShotIndex = $(this).parent().index();

                    //If the zoom box is already opened, call the expandZoomBox method which will take care
                    //of loading the required zoom image
                    if ($(".zoomBoxWrapper").hasClass("expanded")) {
                        methods.expandZoomBox();
                    }
                    return false;
                });
            });

            //Add some handlers
            if (methods.isMobile()) {
                methods.buildForMobile();
            } else {
                methods.addShotHandlers();
                //methods.buildForMobile();
            }




            methods.addShotControlHandlers();
            methods.addCarouselScrolling();


            // Close SuperZoom or Zoom on esc key.
            $(document).keyup(function (event) {
                if (event.keyCode == 27) {
                    if ($(".SuperZoom").css("opacity") == 1) {
                        $(".SuperZoomBox").click();
                    } else if ($(".zoomBoxWrapper").hasClass("expanded")) {
                        $(".ZoomComponent .close").click();
                    }
                }
            });

        },
        buildForMobile: function () {

            var superZoomOpen = $(".ZoomComponent .SuperZoomOpen");
            superZoomOpen.css("display", "none");

            var phoneZoomOpen = $("<a class=\"phoneZoomOpen\">Zoom</a>");

            $(".ShotView").append(phoneZoomOpen);

            phoneZoomOpen.click(function () {
                methods.openPhoneZoom();
            });


            $(".ZoomComponent .ShotView").bind("click", function (e) {
                methods.openPhoneZoom();
            });
        },
        /////Update image in shot view /////////////////////////////////
        updateShotImage: function (path, callback) {

            //Dynamically load new shot image
            var img = $("<img/>").load(function () {

                //Get dimensions of new image once it's loaded
                var imgObj = methods.getImageDimensions($(this));

                //As above - limit width of shot image
                if (orientation == "portrait") {
                    if (imgObj.width > maxPortraitImageWidth) {

                        var heightFactor = imgObj.width / imgObj.height;
                        imgObj.width = maxPortraitImageWidth;
                        imgObj.height = imgObj.width / heightFactor;

                        $(img).height(imgObj.height);
                        $(img).width(imgObj.width);
                    }
                }

                if (orientation == "landscape") {
                    if (imgObj.width > maxLandscapeImageWidth) {

                        var heightFactor = imgObj.width / imgObj.height;
                        imgObj.width = maxLandscapeImageWidth;
                        imgObj.height = imgObj.width / heightFactor;

                        $(img).height(imgObj.height);
                        $(img).width(imgObj.width);
                    }
                }


                //Hide the image
                $(img).css("display", "none");
                curShotDimensions = imgObj;

                var shotViewImg = $(".ZoomComponent .ShotView img");
                var sOffset = $(shotViewImg).offset();

                //Fade out the current/exisiting image
                $(".ZoomComponent .ShotView img").fadeOut(300, function () {
                    //Once complete, remove from DOM
                    $(this).remove();


                    //Animate height of shot view
                    $(".ZoomComponent .ShotView, .ZoomComponent .shotWrapper").animate(
                    {
                        height: imgObj.height
                    }, 300, 'easeOutCubic', function () {
                        $(".ZoomComponent .ShotView").append(img);
                        $(img).fadeIn(300);

                        if (imgObj.height > 472) {
                            $(".zoomBoxWrapper").removeClass("");
                        }

                        if (callback) {
                            callback();
                        }

                        try {
                            if (ProductPage) {
                                ProductPage.Positioning.ResizeItemScroller();
                            }
                        } catch (err) { }
                    });
                });

                //Reposition loupe to make sure it stays within the shot view - unless mouse is already over shotview
                if (!$(".ZoomComponent .ShotView").hasClass("shotViewHover")) {
                    var loupe = $(".ZoomComponent .loupe");
                    if (loupe.length) {
                        $(loupe).offset({ left: sOffset.left, top: sOffset.top });
                    }
                }



            }).attr('src', path);
        },
        //////////////////////This function allows images to be added 'externally' to the control
        //////////////////////e.g. $("#ZoomComponent").ZoomComponent('addZoomItem', 'shot.jpg', 'zoom.jpg');
        addZoomItem: function (shotPath, zoomPath, thumbnailPath, callBack) {

            methods.updateShotImage(shotPath, callBack);
            targetZoom = zoomPath;
            if ($(".zoomBoxWrapper").hasClass("expanded")) {
                methods.expandZoomBox();
            }

        },

        ///////////////////////Add event handlers for the shot view/////////////////////
        addShotHandlers: function () {
            var shotView = $(".ZoomComponent .ShotView");
            var shotImage = $(".ZoomComponent .ShotView img");
            //Add loupe element
            var loupe = $("<div class=\"loupe\" />");
            $(shotView).append(loupe);


            if (!isTouchEnabled) {
                //Shotview click - toggle loupe and zoom item
                $(shotView).bind("click", function (e) {
                    if ($(".zoomBoxWrapper").hasClass("locked")) {
                        return false;
                    }

                    //Position loupe to mouse
                    $(".loupe").offset({ left: e.pageX - 25, top: e.pageY - 25 });

                    //Toggle between zoom on/off
                    if ($(shotView).hasClass("magOn")) {
                        $(shotView).removeClass("magOn");
                        $(shotView).find(".loupe").fadeOut(300);

                        methods.collapseZoomBox();
                    } else {
                        $(".shotWrapper").addClass("live");
                        $(shotView).addClass("magOn");
                        $(shotView).find(".loupe").fadeIn(300);
                        methods.expandZoomBox();
                    }

                });

                //Mouse move
                $(shotView).bind('mousemove', this, function (e) {
                    mx = e.pageX;
                    my = e.pageY;
                });

                //Mouse hover/leave
                $(shotView).hover(
            function () {
                $(shotView).addClass("shotViewHover");
                moveInterval = setTimeout(function () { methods.moveLoupe(); }, 30);
                methods.toggleShotControls(true);
            },
            function () {
                $(shotView).removeClass("shotViewHover");
                clearTimeout(moveInterval);
                methods.toggleShotControls(false);
            });

        } else {//touch enabled devices
                var ipadShotView = document.getElementById("ShotView");
                function handlePointerDown(e) {                    
                    $(".loupe").offset({ left: e.pageX - 25, top: e.pageY - 25 });

                    mx = e.pageX;
                    my = e.pageY;

                    if ($(ipadShotView).hasClass("magOn")) {
                        return false;
                    }

                    $(".shotWrapper").addClass("live");
                    $(ipadShotView).addClass("magOn");
                    $(ipadShotView).find(".loupe").fadeIn(300);
                    methods.expandZoomBox();
                    moveInterval = setTimeout(function () { methods.moveLoupe(); }, 30);
                    $(shotView).addClass("shotViewHover");
                }
                function handlePointerMove(e) {
                    mx = e.pageX;
                    my = e.pageY;
                }
                
                if (navigator.maxTouchPoints > 0) {//ie11 touch device
                    ipadShotView.addEventListener('pointerdown', function (e) {
                        $('.ShotView').css({ "touch-action": "none" });
                        handlePointerDown(e);
                    });
                    ipadShotView.addEventListener('pointermove', function (e) {
                        handlePointerMove(e);
                    }, false);
                }
                else if (navigator.msMaxTouchPoints > 0) {//IE10 touch device
                    ipadShotView.addEventListener('MSPointerDown', function (e) {
                        $('.ShotView').css({ "-ms-touch-action": "none" });
                        handlePointerDown(e);
                    });
                    ipadShotView.addEventListener('MSPointerMove', function (e) {
                        handlePointerMove(e);
                    }, false);
                }
                else {//Else - is iPad                   

                    ipadShotView.addEventListener('touchstart', function (e) {

                        $(".loupe").offset({ left: e.changedTouches[0].pageX - 25, top: e.changedTouches[0].pageY - 25 });

                        mx = e.targetTouches[0].pageX;
                        my = e.targetTouches[0].pageY;

                        if ($(ipadShotView).hasClass("magOn")) {
                            return false;
                        }

                        $(".shotWrapper").addClass("live");
                        $(ipadShotView).addClass("magOn");
                        $(ipadShotView).find(".loupe").fadeIn(300);
                        methods.expandZoomBox();
                        moveInterval = setTimeout(function () { methods.moveLoupe(); }, 30);
                        $(shotView).addClass("shotViewHover");

                    });
                    //                ipadShotView.addEventListener('touchend', function (e) {
                    //                    $(shotView).removeClass("magOn");
                    //                    $(shotView).find(".loupe").fadeOut(300);
                    //                    methods.collapseZoomBox();
                    //                    clearTimeout(moveInterval);
                    //                    $(shotView).removeClass("shotViewHover");
                    //                }, false);


                    ipadShotView.addEventListener('touchmove', function (e) {
                        e.preventDefault();
                        mx = e.targetTouches[0].pageX;
                        my = e.targetTouches[0].pageY;
                    }, false);
                }
            }
        },

        //////////////////////////Move magnifying glass when user moves over shot view/////////////////////////////
        moveLoupe: function () {
            //Set loupeValue here - quicker than measuring 
            var loupeWidth = 85;
            var loupeHeight = 85;

            //Set the target position for the loupe to follow mouse position - and then centre the lopue around mouse position
            var shotViewImg = $(".ZoomComponent .ShotView img");

            //User may be navigating using left/right arrows - there will some instances where the image hasn't yet loaded
            //but the user is still over the shotview - need to check that the image is loaded before we can position loupe
            if ($(shotViewImg).length) {

                var targetX = mx - loupeWidth / 2;
                var targetY = my - loupeHeight / 2;

                //Limit loupe to only move within shot view
                if (targetX < $(shotViewImg).offset().left) {
                    targetX = $(shotViewImg).offset().left;
                }

                if (targetY < $(shotViewImg).offset().top) {
                    targetY = $(shotViewImg).offset().top;
                }


                if (targetX > ($(shotViewImg).offset().left + curShotDimensions.width - loupeWidth)) {
                    targetX = $(shotViewImg).offset().left + curShotDimensions.width - loupeWidth;
                }

                if (targetY > ($(shotViewImg).offset().top + curShotDimensions.height - loupeHeight)) {
                    targetY = $(shotViewImg).offset().top + curShotDimensions.height - loupeHeight;
                }

                //Need to round  the position - positioning an element to 0.5 accuracy in IE 
                //casues it to wobble - IE can't decide where to place the element so it randomly rounds up or 
                //down the positioning causing the wobble
                targetX = Math.round(targetX);
                targetY = Math.round(targetY);

                //Positon the loupe
                $(".loupe").offset({ left: targetX, top: targetY });

                //Check if we have a zoomed image to position
                var zoomImg = $(".zoomBox").find(".zoomBoxImage");

                if (zoomImg.length) {
                    //Need to map loupe movement to zoom image movement
                    //Caluculate 1% of zoom image dimensions
                    var widthFactor = (curZoomDimensions.width / 100);
                    var heightFactor = (curZoomDimensions.height / 100);


                    //Get loupe position
                    var loupeOffsetX = targetX - $(shotViewImg).offset().left;
                    //Get loupe position as a percentage
                    var percentX = loupeOffsetX / ((curShotDimensions.width - loupeWidth) / 100);
                    //Same as above for Y axis
                    var loupeOffsetY = targetY - $(shotViewImg).offset().top;
                    var percentY = loupeOffsetY / ((curShotDimensions.height - loupeHeight) / 100);

                    //Get current zoom position
                    var curZoomLeft = zoomImg.position().left;
                    var curZoomTop = zoomImg.position().top;

                    //Set zoom window dimensions
                    var zoomBoxWidth = 550;
                    var zoomBoxHeight = 472;

                    if (orientation == "landscape") {
                        zoomBoxHeight = 466;
                    }

                    //Set the position the zoom image should move to to match loupe position
                    var targetZoomLeft = 0 - (percentX * widthFactor) + (zoomBoxWidth / 100 * percentX);
                    var targetZoomTop = 0 - (percentY * heightFactor) + (zoomBoxHeight / 100 * percentY);

                    //Calculate how far zoom image needs to move to get to target position
                    var difLeft = Math.floor(curZoomLeft - targetZoomLeft);
                    var difTop = Math.floor(curZoomTop - targetZoomTop);

                    //Now divide required distance by a given number to give the delayed movement effect.
                    //As this function calls itself while the mouse is over the shot view, the image will continue to move while
                    //the mouse is not moving, gradually slowing down as it reaches the correct position
                    var left = Math.floor(curZoomLeft - (difLeft / smoothScroll));
                    var top = Math.floor(curZoomTop - (difTop / smoothScroll));
                    //Position the zoom image
                    $(zoomImg).css("left", left).css("top", top);
                }
            }

            //If the mouse is still over the shot view, call this method again in a given timespan
            if ($(".ShotView").hasClass("shotViewHover")) {
                moveInterval = setTimeout(function () { methods.moveLoupe(); }, 30);
            }
        },

        bindZoomBoxImage: function (img, additionalPadding) {

            var zoomBox = $(".zoomBox");
            var zoomBoxWrapper = $(".zoomBoxWrapper");
            var shotView = $(".ZoomComponent .ShotView");

            $(zoomBox).show();
            $(zoomBoxWrapper).show();

            //When zoom image is loaded, set its display to none so we can fade it in
            $(img).css("display", "none");
            //Add identifier class
            $(img).addClass("zoomBoxImage");
            //Add image to zoom box
            $(zoomBox).append(img);
            //set its starting co-ordinates
            $(img).css("top", 0).css("left", 0);
            //Get and set variable to store image dimensions
            //                curZoomDimensions = {
            //                    height: $(zoomImage).height(),
            //                    width: $(zoomImage).width()
            //                };

            curZoomDimensions = methods.getImageDimensions(img);

            // If the zoom area isn't yet expanded, set its hidden/initial state
            if (!$(zoomBoxWrapper).hasClass("expanded")) {
                $(zoomBoxWrapper).width(0);
                $(zoomBoxWrapper).height(curShotDimensions.height + additionalPadding);
                $(zoomBox).css("opacity", 0);
            }
            //Animate width
            $(zoomBoxWrapper).animate({
                width: 552
            }, 500, 'easeOutCubic', function () {

                var zoomBoxHeight = zoomBox.outerHeight();

                //If the shot view is smaller than the requierd zoom area, animate height as well
                if (curShotDimensions.height < zoomBoxHeight) {

                    $(zoomBoxWrapper).addClass("stage2");

                    $(zoomBoxWrapper).animate({
                        height: zoomBoxHeight//466 + additionalPadding
                    }, 500, 'easeOutCubic', function () {

                        $(img).fadeIn(500);
                        $(zoomBox).animate({ opacity: 1 }, 500);
                        $(zoomBoxWrapper).removeClass("locked").addClass("expanded");

                    });

                } else {
                    $(img).fadeIn(500);
                    $(zoomBox).animate({ opacity: 1 }, 500);
                    $(zoomBoxWrapper).removeClass("locked").addClass("expanded");
                }
            });


        },
        ///////////////////////Expand the zoom box/////////////////////
        expandZoomBox: function () {

            //Create zoom area if it doesn't already exist
            var zoomBox = $(".zoomBox");
            var zoomBoxWrapper = $(".zoomBoxWrapper");
            var shotView = $(".ZoomComponent .ShotView");

            var additionalPadding = 0;
            //Need to account for slightly different design of landscape container box having a slight padding
            if (orientation == "landscape") {
                additionalPadding = 10;
            }

            //Fade out any existing image
            if (zoomBox.find("img").length) {
                zoomBox.find("img").fadeOut(200, function () {
                    $(this).remove();
                });
            }

            ////Lock the box to prevent starting other animations while we animate
            $(zoomBoxWrapper).addClass("locked");

            //Load required zoom image
            var zoomImage = new Image();

            var zoomImagePath = targetZoom;


            //This fixes cached images not showing in IE8 and below
            if ($.browser.msie && $.browser.version < 9) {
                zoomImagePath += "?rnd=" + Math.random().toString(36).substring(7);
                zoomImage.src = zoomImagePath;
            }
            //When the image loads, pass to the binding method
            $(zoomImage).load(function () {
                methods.bindZoomBoxImage(zoomImage, additionalPadding);
            }).attr('src', zoomImagePath);
        },

        ///////////////////////Close the zoom box/////////////////////
        collapseZoomBox: function () {

            var additionalPadding = 0;
            //Need to account for slightly different design of landscape container box having a slight padding
            if (orientation == "landscape") {
                additionalPadding = 10;
            }



            var zoomBox = $(".ZoomComponent .zoomBox");
            var zoomBoxWrapper = $(".ZoomComponent .zoomBoxWrapper")

            $(zoomBoxWrapper).addClass("locked");

            $(zoomBox).animate({ opacity: 0 }, 500);

            $(zoomBox).find("img").fadeOut(300, function () {
                $(zoomBox).find("img").remove();
            });


            var heightAnimateTime = 500;

            if ($(zoomBoxWrapper).height() == curShotDimensions.height) {
                heightAnimateTime = 0;
            }

            $(zoomBoxWrapper).animate({
                height: curShotDimensions.height + additionalPadding
            }, heightAnimateTime, 'easeOutCubic', function () {
                $(zoomBoxWrapper).removeClass("stage2");
                $(zoomBoxWrapper).animate({
                    width: 0
                }, 500, 'easeOutCubic', function () {

                    $(zoomBoxWrapper).removeClass("expanded").removeClass("locked");
                    $(zoomBox).hide();
                    $(zoomBoxWrapper).hide();
                    $(".shotWrapper").removeClass("live");
                });

            });


        },

        toggleShotControls: function (display) {

            var opacityAnimationSpeed = 300;

            if ($.browser.msie && $.browser.version < 9) {
                opacityAnimationSpeed = 0;
            }

            if (display) {

                $(".ZoomComponent .SuperZoomOpen .Text").stop();

                $(".ZoomComponent .SuperZoomOpen").stop().animate({ opacity: 1 }, 200, function () {
                    $(".ZoomComponent .SuperZoomOpen").stop().animate({ width: 105 }, 400, 'easeOutBack', function () {
                        $(".ZoomComponent .SuperZoomOpen .Text").stop().animate({ opacity: 1 }, 200);
                    });
                });

                $(".ZoomComponent .shotNavPrev").stop().animate({ opacity: 1 }, opacityAnimationSpeed);
                $(".ZoomComponent .shotNavNext").stop().animate({ opacity: 1 }, opacityAnimationSpeed);

            } else {

                $(".ZoomComponent .SuperZoomOpen").stop();

                $(".ZoomComponent .SuperZoomOpen .Text").stop().animate({ opacity: 0 }, 200, function () {
                    $(".ZoomComponent .SuperZoomOpen").stop().animate({ width: 24 }, 400, 'easeInBack', function () {
                        $(".ZoomComponent .SuperZoomOpen").stop().animate({ opacity: 0 }, 200);
                    });
                });

                $(".ZoomComponent .shotNavPrev").stop().animate({ opacity: 0 }, opacityAnimationSpeed);
                $(".ZoomComponent .shotNavNext").stop().animate({ opacity: 0 }, opacityAnimationSpeed);
            }

        },
        //////////////////Add shot controls functionality///////////////////
        addShotControlHandlers: function () {

            var superZoomOpen = $(".ZoomComponent .SuperZoomOpen");
            var shotNavPrev = $(".ZoomComponent .shotNavPrev");
            var shotNavNext = $(".ZoomComponent .shotNavNext");
            var shotView = $(".ZoomComponent .ShotView");
            var closeZoomBox = $(".ZoomComponent .close");
            var itemCount = $(".ThumbNailNav li").size();


            if (itemCount < 2) {
                $(shotNavNext).hide();
                $(shotNavPrev).hide();
            }


            $(shotNavPrev).bind("click", function (event) {
                //Stop click bubbling to shotview
                event.stopPropagation();
                //Increment current shot index
                currentShotIndex--;
                //Limit current shotindex to 0, if reached, go to end
                if (currentShotIndex < 0) {
                    currentShotIndex = itemCount - 1;
                }

                //Find the target thumbnail to set it to live
                var targetLI = $(".ThumbNailNav li").eq(currentShotIndex);

                //Fire the a click on that item
                $(targetLI).find("a").click();

                //If we're in portrait mode
                if (orientation == "portrait") {

                    //If the thumbnail we've just set live is outside of clipping region
                    //move the carousel - either up of down
                    if ($(targetLI).offset().top < $("#ZoomNavStart").offset().top) {
                        methods.carouselScroll("down", true);
                    }

                    if ($(targetLI).offset().top > $("#ZoomNavEnd").offset().top) {
                        methods.carouselScroll("up", true);
                    }

                } else {
                    //Else - we're in landscape mode, do the same as above for left and right
                    if ($(targetLI).offset().left < $("#ZoomNavStart").offset().left) {
                        methods.carouselScroll("right", true);
                    }

                    if (($(targetLI).offset().left + $(targetLI).width()) > $("#ZoomNavEnd").offset().left) {
                        methods.carouselScroll("left", true);
                    }

                }
            });

            //Exactly the same as above, but for the "next" shotview control button
            $(shotNavNext).bind("click", function (event) {
                event.stopPropagation();
                currentShotIndex++;
                if (currentShotIndex > itemCount - 1) {
                    currentShotIndex = 0;
                }

                var targetLI = $(".ThumbNailNav li").eq(currentShotIndex);
                $(targetLI).find("a").click();

                if (orientation == "portrait") {

                    if ($(targetLI).offset().top < $("#ZoomNavStart").offset().top) {
                        methods.carouselScroll("down", true);
                    }


                    if ($(targetLI).offset().top > $("#ZoomNavEnd").offset().top) {
                        methods.carouselScroll("up", true);
                    }

                } else {

                    if ($(targetLI).offset().left < $("#ZoomNavStart").offset().left) {
                        methods.carouselScroll("right", true);
                    }

                    if (($(targetLI).offset().left + $(targetLI).width()) > $("#ZoomNavEnd").offset().left) {

                        methods.carouselScroll("left", true);
                    }

                }

            });

            $(closeZoomBox).bind("click", function (event) {
                event.stopPropagation();
                event.preventDefault();
                methods.collapseZoomBox();
                $(shotView).removeClass("magOn");
                $(shotView).find(".loupe").fadeOut(300);
            });




            $(superZoomOpen).bind("click", function (event) {
                event.stopPropagation();
                methods.openSuperZoom();
            });

        },
        setLandscapeNavSize: function () {



            //Check all thumbnails have loaded before we set the navigation
            if (totalImages > thumbNailsLoaded) {

                setTimeout(function () { methods.setLandscapeNavSize(); }, 100);
                return false;
            }



            var totalWidth = 0;
            $(".ZoomComponent .ThumbNailNav ul li").each(function () {
                //TODO - Calculate border and margin - rather than 2 + 8
                totalWidth += $(this).width() + 2 + 8;
            });



            if (totalWidth < 350) {
                $(".ZoomComponent .ThumbNailNav a.carouselPrevious, .ZoomComponent .ThumbNailNav a.carouselNext").addClass("disabled");
            }



            $(".ZoomComponent .ThumbNailNav ul").width(totalWidth + 5);


            if ($("#lastItemImageGrab").length) {
                if (ProductPage) {
                    ProductPage.Positioning.ResizeItemScroller();
            }
            }

        },
        /////// Resize clipped nav region on a portrait layout ////////////////////
        setPortraitNavSize: function () {

            //Check all thumbnails have loaded before we measure the navigation
            if (totalImages > thumbNailsLoaded) {
                setTimeout(function () { methods.setPortraitNavSize(); }, 100);
                return false;
            }

            //Now that all images have loaded, we can measure the carousel navigation
            //The point of doing this is that we may have differently sized thumbnails in the navigation
            //so we can't just set imageHeight * 4, for example
            var ulHeight = $(".ZoomComponent .ThumbNailNav ul").height();

            //Limit to set height 
            if (ulHeight > 420) {
                ulHeight = 420;
            } else {
                //The list of items didn't extend beyond the page limit, we wont need scrolling
                $(".ZoomComponent .ThumbNailNav a.carouselPrevious, .ZoomComponent .ThumbNailNav a.carouselNext").addClass("disabled");


            }

            //resize the clipping region
            $(".ZoomComponent .ThumbNailNavClip").height(ulHeight);

            $(".ZoomComponent .ThumbNailNav").height(ulHeight + 60);

            if ($("#lastItemImageGrab").length) {
                if (ProductPage) {
                    ProductPage.Positioning.ResizeItemScroller();
            }
            }

        },

        ///////This function handles carousel navigation scrolling
        carouselScroll: function (direction, keepLiveItemVisible) {

            if (isCarouselScrolling) {
                return false;
            }
            isCarouselScrolling = true;

            var easing = "easeOutCubic";
            var animationTime = 400;

            if (keepLiveItemVisible) {
                easing = "linear";
                animationTime = 200;
            }

            switch (direction) {

                case "up":

                    var navControl = $(".ZoomComponent .ThumbNailNav a.carouselNext");

                    if ($(navControl).hasClass("disabled") & !keepLiveItemVisible) {
                        isCarouselScrolling = false;
                        return false;
                    }

                    $(".ZoomComponent .ThumbNailNav a.carouselPrevious").removeClass("disabled");

                    var currentStartItem = $(".ThumbNailNav li").eq(navStartIndex);
                    //TODO - Calculate bottom margin
                    var itemHeight = $(currentStartItem).outerHeight() + navLiMargin;
                    //Added step function to check where we are in the list.  Stops the list from infinite looping and allowing double clicks 
                    //to move past the end points
                    $(".ZoomComponent .ThumbNailNav ul").animate({ top: "-=" + itemHeight },
                    {
                        duration: animationTime,
                        easing: easing,
                        complete: function () {
                            isCarouselScrolling = false;

                        var lastItemOffset = $("#lastZoomNavItem").offset().top;
                        var navEndOffset = $("#ZoomNavEnd").offset().top;

                        if (lastItemOffset < navEndOffset) {
                            $(".ZoomComponent .ThumbNailNav a.carouselNext").addClass("disabled");
                        } else {
                            $(".ZoomComponent .ThumbNailNav a.carouselNext").removeClass("disabled");
                        }

                        //If required, we need to keep the live item visible in the carousel nav
                        if (keepLiveItemVisible) {
                            var targetLI = $(".ZoomComponent .ThumbNailNav ul li.selected");

                            if ($(targetLI).offset().top < $("#ZoomNavStart").offset().top) {
                                methods.carouselScroll("down", true);
                            }

                            if ($(targetLI).offset().top > $("#ZoomNavEnd").offset().top) {
                                methods.carouselScroll("up", true);
                            }

                        }

                        }
                    });

                    navStartIndex++;
                    break;

                case "down":

                    var navControl = $(".ZoomComponent .ThumbNailNav a.carouselPrevious");

                    if ($(navControl).hasClass("disabled") || navStartIndex == 0) {
                        isCarouselScrolling = false;
                        return false;
                    }

                    $(".ZoomComponent .ThumbNailNav a.carouselNext").removeClass("disabled");

                    var currentStartItem = $(".ThumbNailNav li").eq(navStartIndex - 1);
                    //TODO - Calculate bottom margin
                    var itemHeight = $(currentStartItem).outerHeight() + navLiMargin;
                    //Added step function to check where we are in the list.  Stops the list from infinite looping and allowing double clicks 
                    //to move past the end points
                    $(".ZoomComponent .ThumbNailNav ul").animate({ top: "+=" + itemHeight },
                    {
                        duration: animationTime,
                        easing: easing,
                        complete: function () {
                            isCarouselScrolling = false;

                            var lastItemOffset = $(".ZoomComponent .ThumbNailNav ul li").offset().top;
                            var navEndOffset = $("#ZoomNavStart").offset().top;

                            if (lastItemOffset > navEndOffset) {
                                $(".ZoomComponent .ThumbNailNav a.carouselPrevious").addClass("disabled");
                        } else {
                                $(".ZoomComponent .ThumbNailNav a.carouselPrevious").removeClass("disabled");
                        }

                        //If required, we need to keep the live item visible in the carousel nav
                        if (keepLiveItemVisible) {
                            var targetLI = $(".ZoomComponent .ThumbNailNav ul li.selected");

                            if ($(targetLI).offset().top < $("#ZoomNavStart").offset().top) {

                                methods.carouselScroll("down", true);
                            }

                            if ($(targetLI).offset().top > $("#ZoomNavEnd").offset().top) {

                                methods.carouselScroll("up", true);
                            }
                        }

                            if (navStartIndex == 0) {
                                $(".ZoomComponent .ThumbNailNav a.carouselPrevious").addClass("disabled");
                            }

                        }
                    });

                    navStartIndex--;

                    break;

                case "left":

                    var navControl = $(".ZoomComponent .ThumbNailNav a.carouselNext");

                    if ($(navControl).hasClass("disabled") & !keepLiveItemVisible) {
                        isCarouselScrolling = false;
                        return false;
                    }

                    $(".ZoomComponent .ThumbNailNav a.carouselPrevious").removeClass("disabled");

                    var currentStartItem = $(".ThumbNailNav li").eq(navStartIndex);
                    //TODO - Calculate border and bottom margin
                    var itemWidth = $(currentStartItem).width() + 2 + 8;
                    //Added step function to check where we are in the list.  Stops the list from infinite looping and allowing double clicks 
                    //to move past the end points
                    $(".ZoomComponent .ThumbNailNav ul").animate({ left: "-=" + itemWidth },
                        {
                            duartion: animationTime,
                            easing: easing,
                            complete: function () {
                                isCarouselScrolling = false;

                        var lastItemOffset = $("#lastZoomNavItem").offset().left;
                        var navEndOffset = $("#ZoomNavEnd").offset().left;

                        if (lastItemOffset < navEndOffset) {
                            $(".ZoomComponent .ThumbNailNav a.carouselNext").addClass("disabled");
                        } else {
                            $(".ZoomComponent .ThumbNailNav a.carouselNext").removeClass("disabled");
                        }

                        //If required, we need to keep the live item visible in the carousel nav
                        if (keepLiveItemVisible) {
                            var targetLI = $(".ZoomComponent .ThumbNailNav ul li.selected");

                            if ($(targetLI).offset().left < $("#ZoomNavStart").offset().left) {

                                methods.carouselScroll("right", true);
                            }

                            if (($(targetLI).offset().left + $(targetLI).width()) > $("#ZoomNavEnd").offset().left) {

                                methods.carouselScroll("left", true);
                            }
                        }

                            }
                    });

                    navStartIndex++;

                    break;

                case "right":

                    var navControl = $(".ZoomComponent .ThumbNailNav a.carouselPrevious");

                    if ($(this).hasClass("disabled") || navStartIndex == 0) {
                        isCarouselScrolling = false;
                        return false;
                    }

                    $(".ZoomComponent .ThumbNailNav a.carouselNext").removeClass("disabled");

                    var currentStartItem = $(".ThumbNailNav li").eq(navStartIndex - 1);
                    //TODO - Calculate border and bottom margin
                    var itemWidth = $(currentStartItem).width() + 2 + 8;
                    //Added step function to check where we are in the list.  Stops the list from infinite looping and allowing double clicks 
                    //to move past the end points
                    $(".ZoomComponent .ThumbNailNav ul").animate({ left: "+=" + itemWidth },
                        {
                            duration: animationTime,
                            easing: easing,
                            complete: function () {
                                isCarouselScrolling = false;

                        var lastItemOffset = $("#lastZoomNavItem").offset().left;
                        var navEndOffset = $("#ZoomNavEnd").offset().left;

                        if (lastItemOffset < navEndOffset) {
                            $(".ZoomComponent .ThumbNailNav a.carouselNext").addClass("disabled");
                        } else {
                            $(".ZoomComponent .ThumbNailNav a.carouselNext").removeClass("disabled");
                        }

                        //If required, we need to keep the live item visible in the carousel nav
                        if (keepLiveItemVisible) {
                            var targetLI = $(".ZoomComponent .ThumbNailNav ul li.selected");

                            if ($(targetLI).offset().left < $("#ZoomNavStart").offset().left) {

                                methods.carouselScroll("right", true);
                            }

                            if (($(targetLI).offset().left + $(targetLI).width()) > $("#ZoomNavEnd").offset().left) {

                                methods.carouselScroll("left", true);
                            }
                        }

                                if (navStartIndex == 0) {
                                    $(".ZoomComponent .ThumbNailNav a.carouselPrevious").addClass("disabled");
                                }


                            }
                    });

                    navStartIndex--;

                    break;

            }

        },

        //Add carousel nav controls event handlers
        addCarouselScrolling: function () {


            switch (orientation) {
                case "portrait":

                    $(".ZoomComponent .ThumbNailNav a.carouselPrevious").bind("click", function () {
                        methods.carouselScroll("down");
                    });

                    $(".ZoomComponent .ThumbNailNav a.carouselNext").bind("click", function () {
                        methods.carouselScroll("up");
                    });

                    break;

                case "landscape":

                    $(".ZoomComponent .ThumbNailNav a.carouselPrevious").bind("click", function () {
                        methods.carouselScroll("right");
                    });

                    $(".ZoomComponent .ThumbNailNav a.carouselNext").bind("click", function () {
                        methods.carouselScroll("left");
                    });

                    break;

            }

        },
        openSuperZoom: function () {
            //Clean up shot view settings
            moveInterval = null;
            methods.collapseZoomBox();
            $(".ShotView").removeClass("magOn");
            $(".ShotView").find(".loupe").fadeOut(300);
            $(".zoomBoxWrapper").removeClass("locked")

            //Pass the carousel nav to the superzoom for re-use
            var $superZoomNav = $(".ThumbNailNav").clone();
            $superZoomNav.removeClass("ThumbNailNav")
                            .addClass("SuperThumbNailNav")
                            .height("")
                            .css("visibility", "hidden");

            $superZoomNav.find(".ThumbNailNavClip > ul").css("left", "");

            methods.addCarouselScrolling();

            var $superZoomDiv = $("<div class=\"SuperZoom\" />");
            $superZoomDiv.append($superZoomNav);

            var params = { defaultImage: targetZoom };

            $superZoomNav.SuperZoomComponent(params);

            $("body").css("overflow", "hidden");
            $("html").css("overflow", "hidden");
            zcNoScroll = true;
            $("body").live('mousewheel', function(e) { 
            	if( (zcNoScroll) ) { e.preventDefault();}
           	});
            $("body").live('keydown', function(e) { 
            	if(!zcNoScroll) return;
            	if(e.keyCode < 41 && e.keyCode > 31) {
                    e.preventDefault();
                }
           	});

            var targetHeight = $(window).height() - 10;
            var targetWidth = $(window).width() - 10;

            if (targetWidth > 1917) {
                targetWidth = 1917;
            }

            if (targetHeight > 2700) {
                targetHeight = 2700;
            }

            $superZoomDiv.css("opacity", 0).css({
                "top": $(document).scrollTop() + 5,
                "width": targetWidth,
                "height": targetHeight
            });



            $("#innerShot").append($superZoomDiv);

            $superZoomDiv.animate({ opacity: 1 }, 300);

            if (isTouchEnabled) {
                if (navigator.maxTouchPoints > 0 || navigator.msMaxTouchPoints > 0) {
                    $(superZoomNav).SuperZoomComponent("initForWin8"); //for Surface device
                }
                else {
                    $(superZoomNav).SuperZoomComponent("initForIpad");
                }
            }
        },
        openPhoneZoom: function () {

            var phoneZoomWrapper = $("<div class=\"phoneZoomWrapper\" />");


            phoneZoomWrapper.click(function () {
                $(".phoneZoomWrapper").remove();
                $("body").css("overflow-x", "");
            });

            var phoneZoomCloser = $("<a class=\"phoneZoomCloser\" >Done</a>");
            phoneZoomWrapper.append(phoneZoomCloser);

            phoneZoomCloser.click(function () {
                $(".phoneZoomWrapper").remove();
                $("body").css("overflow-x", "");
            });

            var img = $("<img/>").load(function () {

                //Get dimensions of new image once it's loaded
                var imgObj = methods.getImageDimensions($(this));

                phoneZoomWrapper.append($(this));

                phoneZoomWrapper.width(imgObj.width);
                phoneZoomWrapper.height(imgObj.height);

                $("#innerShot").append(phoneZoomWrapper);

                $("body").css("overflow-x", "auto");


            }).attr('src', targetZoom);



        },

        ///////////////////////Get Object Dimensions/////////////////////
        getImageDimensions: function (image) {

            var oldIE = false;
            if ($.browser.msie && $.browser.version < 9) {
                oldIE = true;
            }

            //Different browsers require different treatment for measuring dynamically loaded images
            //Chrome stuggles to measure images if they are already cached, earlier versions of IE don't support
            //naturalHeight/width - need to try a few different methods to ensure we get a result

            //First try to get image dimensions using naturalHeight/width
            var imgHeight = $(image).prop('naturalHeight');
            var imgWidth = $(image).prop('naturalWidth');

            //If that doesn't work, try to measure the image the 'standard' jQuery way
            if (imgHeight == undefined || imgHeight == 0) {
                imgHeight = $(image).height();
                imgWidth = $(image).width();

            }

            //If we still have no dimensions, bind a hidden copy of the image to the body and measure that
            if (imgHeight == undefined || imgHeight == 0 || oldIE) {
                var img = $(image).clone();
                $(img).css("display", "none");
                $("body").append(img);
                imgHeight = $(img).height();
                imgWidth = $(img).width();
                $(img).remove();

            }

            //Finally, if we still have no dimensions (and we 99.99% should by now), hard code the most common dimensions
            if (imgHeight == undefined || imgHeight == 0) {
                imgHeight = 472;
                imgWidth = 315;

            }


            var imgObj = {
                height: imgHeight,
                width: imgWidth
            };

            return imgObj;
        }

    };

    $.fn.ZoomComponent = function (method) {

        // Method calling 
        if (methods[method]) {
            return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return methods.init.apply(this, arguments);
        } else {
            $.error('Method ' + method + ' does not exist on jQuery.ZoomComponent');
        }

    };

})(jQuery);

/////////////////////// Super Zoom ////////////////////////////////////

(function ($) {

    var list;
    var mx, my;
    var superMoveInterval = null;
    var currentZoomImageDimensions;
    var smoothScroll = 5;
    var curTopNavItemIndex = 0;
    var startDragX, startDragY;
    var startImageOffsetX, startImageOffsetY;
    var isSuperZoomDragging = false;
    var mx2, my2;
    var isSuperZoomZooming = false;
    var startZoomX, startZoomY;
    var startZoomPointsDistance;
    var currentScale = 1;
    var lastUsedScale = 1;
    var navLiMargin = 16;
    var carouselScrollAnimationSpeed = 300;
    var isCarouselScrolling = false;

    var methods = {

        ///////////////////////Init////////////////////////////////////
        init: function (params) {

            var ul = this.find("ul");
            //Reset width and height of ul
            $(ul).width(51);

            setTimeout(function () {
                methods.setSuperNavHeight(ul);
            }, 500);

            methods.buildSuperZoomBox(this, params.defaultImage);
            methods.addNavEventHandlers(this);

            window.onresize = function(){
                var $superZoom = $(".SuperZoom");
                var $superZoomBox = $superZoom.find(".SuperZoomBox");
                var $superThumbnailNav = $superZoom.find(".SuperThumbNailNav");    
                var $thumbnailNavNavClip = $superZoom.find(".ThumbNailNavClip");   

                $superZoom.css({
                    "width": $(window).width() - 10,
                    "height": $(window).height() - 10
                });                           

                $superZoomBox.css({
                    "width": $superZoom.width() - $superThumbnailNav.outerWidth(),
                    "height": $superZoom.height()
                });

//                $superThumbnailNav.css({                    
//                    "height": $(window).height() - 30
//                });  

//                $thumbnailNavNavClip.css({                    
//                    "height": $superThumbnailNav.height() - 50
//                });

                methods.setSuperNavHeight($thumbnailNavNavClip.find("ul"));
                
            };

        },

        setSuperNavHeight: function (ul) {

            var $ul = $(ul);
            var $superZoom = $(".SuperZoom");
            var $ThumbNailNavClip = $superZoom.find(".ThumbNailNavClip");
            var $SuperThumbNailNav = $superZoom.find(".SuperThumbNailNav");
            var $carouselPrevious = $superZoom.find(".carouselPrevious");
            var $carouselNext = $superZoom.find(".carouselNext");

            var ulHeight = $ul.height();

            var containerHeight = $superZoom.height();
            var maxClipHeight = $(window).height() - 100;

            $carouselPrevious.addClass("disabled");

            if (maxClipHeight < ulHeight) {
                $ThumbNailNavClip.height(maxClipHeight);
                $carouselNext.removeClass("disabled");
            } else {
                $ThumbNailNavClip.height("");
                $SuperThumbNailNav.height("");
                $carouselNext.addClass("disabled");
            }

            $SuperThumbNailNav.css("visibility","visible");

        },
        ////////////////////Build Super Zoom Box ////////////////////////
        buildSuperZoomBox: function (nav, defaultImage) {

            //Create new element
            var SuperZoomBox = $("<div class=\"SuperZoomBox\" id=\"SuperZoomBoxDiv\" />");

            //Set initial target dimensions
            var targetHeight = $(window).height();
            var targetWidth = $(window).width();

            //Limit dimensions and account for navigation
            if (targetWidth > 1917) {
                targetWidth = 1800;
            } else {
                targetWidth -= 80 //navigation width
            }

            if (targetHeight > 2700) {
                targetHeight = 2680;
            } else {
                targetHeight -= 10;
            }

            if (isTouchEnabled) {
                targetWidth -= 20;
            } else {
                targetWidth -= 5;
            }

            //Set dimensions
            $(SuperZoomBox).css({
                "width": targetWidth,
                "height": targetHeight
            });

            //Add the super zoom box
            $(nav).after(SuperZoomBox);

            //Build close button html
            var $closeBtn = $("<a/>")
                                .addClass("close")
                                .text("x")
                                .attr("href","#");
            $(SuperZoomBox).append($closeBtn);



            if (defaultImage) {
                methods.loadSuperZoomImage(defaultImage);
            } else {
                //If an image is already selected in the nav, load it into the superzoom
                var selectedItem = $(nav).find("ul li.selected");
                if (selectedItem.length) {
                    var targetPath = $(selectedItem).find("a").attr("rel");
                    methods.loadSuperZoomImage(targetPath);
                }
            }


            if (!isTouchEnabled) {
                //Close superzoom on click
                $(SuperZoomBox).bind("click", function (e) {
                    e.stopPropagation();
                    methods.closeSuperZoom();
                });

                //Capture mouse move
                $(SuperZoomBox).bind('mousemove', this, function (e) {
                    mx = e.pageX;
                    my = e.pageY;
                });

                //Mouse hover/leave
                $(SuperZoomBox).hover(
                    function () {
                        $(SuperZoomBox).addClass("SuperZoomBoxHover");
                        superMoveInterval = setTimeout(function () { methods.superMove(); }, 30);
                        //methods.toggleShotControls(true);
                    },
                    function () {
                        $(SuperZoomBox).removeClass("SuperZoomBoxHover");
                        clearTimeout(superMoveInterval);
                        //methods.toggleShotControls(false);
                    });

            }

            methods.addControlHandlers($closeBtn);

        },
        initForIpad: function () {

            var superZoomBoxDiv = document.getElementById("SuperZoomBoxDiv");

            superZoomBoxDiv.parentNode.addEventListener('touchmove', function (e) {
                e.preventDefault();
            }, false);

            superZoomBoxDiv.addEventListener('touchstart', function (e) {

                $("#SuperZoomBoxDiv").addClass("SuperZoomBoxHover");

                mx = e.targetTouches[0].pageX;
                my = e.targetTouches[0].pageY;

                methods.superIpadMove();


                //superMoveInterval = setTimeout(function () { methods.superMove(); }, 30);
                // methods.superMove();

            }, false);

            superZoomBoxDiv.addEventListener('touchmove', function (e) {

                e.preventDefault();

                mx = e.targetTouches[0].pageX;
                my = e.targetTouches[0].pageY;

                methods.superIpadMove();

                //                        if(e.targetTouches[1]){
                //                            mx2 = e.targetTouches[1].pageX;
                //                            my2 = e.targetTouches[1].pageY;
                //                            methods.superIpadZoom();
                //                        }else{
                //                            isSuperZoomZooming = false;
                //                            lastUsedScale = currentScale;
                //                        }

            }, false);

            superZoomBoxDiv.addEventListener('touchend', function (e) {

                $("#SuperZoomBoxDiv").removeClass("SuperZoomBoxHover");
                //clearTimeout(superMoveInterval);
                isSuperZoomDragging = false;
                lastUsedScale = currentScale;

            }, false);
        },
        initForWin8: function() {            
            var superZoomBoxDiv = document.getElementById("SuperZoomBoxDiv");   
            if(navigator.maxTouchPoints > 0){//IE11
                $(superZoomBoxDiv).css({ "touch-action": "none" });
            }   
            else if(navigator.msMaxTouchPoints > 0){//IE10
                $(superZoomBoxDiv).css({ "-ms-touch-action": "none" });
            }            

            var superZoomBox = $(".SuperZoomBox");
            var superZoomImage = $(".SuperZoomBox img");

            var superZoomBoxWidth = $(superZoomBox).width();
            var superZoomBoxHeigh = $(superZoomBox).height();  
                            
            var superZoomImgWidth=$(superZoomImage).width();
            var superZoomImgHeight=$(superZoomImage).height();

            if(navigator.maxTouchPoints > 0){//IE11
                superZoomBoxDiv.parentNode.addEventListener('pointermove', function (e) {
                    e.preventDefault();
                }, false);
            }   
            else if(navigator.msMaxTouchPoints > 0){//IE10
                superZoomBoxDiv.parentNode.addEventListener('MSPointerMove', function (e) {
                    e.preventDefault();
                }, false);
            }               
            
            if(navigator.maxTouchPoints > 0){//IE11
                superZoomBoxDiv.addEventListener('pointerdown',function(e){
                    if(e.pointerType){
                        switch(e.pointerType){
                            case "touch": 
                                handlePointerDown(e);                                          
                                break;
                            case "mouse":                            
                                break;
                            case "pen":
                                break;
                        }
                    }                
                },false);
                superZoomBoxDiv.addEventListener('pointermove',function(e){                
                    if(e.pointerType){
                        switch(e.pointerType){
                            case "touch":                         
                               handlePointerMove(e);
                                break;
                            case "mouse":
                            
                                break;
                            case "pen":
                                break;
                        }
                    }
                },false);          
                superZoomBoxDiv.addEventListener('pointerup',function(e){ 
                    if(e.pointerType){
                        switch(e.pointerType){
                            case "touch":                            
                                handlePointerUp(e);                       
                                break;
                            case "mouse":                             
                                break;
                            case "pen":
                                break;
                        }
                    }
                },false);  
            }
            else if(navigator.msMaxTouchPoints > 0){//IE10
                superZoomBoxDiv.addEventListener('MSPointerDown',function(e){
                    if(e.pointerType){
                        switch(e.pointerType){
                            case e.MSPOINTER_TYPE_TOUCH: 
                                superZoomBoxWidth = $(superZoomBox).width();
                                superZoomBoxHeight = $(superZoomBox).height();  

                                superZoomImage = $(".SuperZoomBox img");
                            
                                superZoomImgWidth = $(superZoomImage).width();
                                superZoomImgHeight = $(superZoomImage).height();                                                      
                             
                                mx = e.pageX;
                                my = e.pageY;                                                     
                                methods.superWin8Move(superZoomBox,superZoomImage,superZoomBoxWidth,superZoomBoxHeight,superZoomImgWidth,superZoomImgHeight);                                  
                                break;
                            case e.MSPOINTER_TYPE_MOUSE:    
                                return false;                        
                                break;
                            case e.MSPOINTER_TYPE_PEN:
                                return false;
                                break;
                        }
                    }                
                },false);
                superZoomBoxDiv.addEventListener('MSPointerMove',function(e){                
                    if(e.pointerType){
                        switch(e.pointerType){
                            case e.MSPOINTER_TYPE_TOUCH:                         
                                mx = e.pageX;
                                my = e.pageY;   
                            
                                methods.superWin8Move(superZoomBox,superZoomImage,superZoomBoxWidth,superZoomBoxHeight,superZoomImgWidth,superZoomImgHeight); 
                                break;
                            case e.MSPOINTER_TYPE_MOUSE:   
                                return false;                         
                                break;
                            case e.MSPOINTER_TYPE_PEN:
                                return false;
                                break;
                        }
                    }
                },false);          
                superZoomBoxDiv.addEventListener('MSPointerUp',function(e){ 
                    if(e.pointerType){
                        switch(e.pointerType){
                            case e.MSPOINTER_TYPE_TOUCH:                            
                                isSuperZoomDragging = false;            
                                break;
                            case e.MSPOINTER_TYPE_MOUSE:
                                return false;                             
                                break;
                            case e.MSPOINTER_TYPE_PEN:
                                return false;
                                break;
                        }
                    }
                },false);  
            }

            function handlePointerDown(e){
                superZoomBoxWidth = $(superZoomBox).width();
                superZoomBoxHeight = $(superZoomBox).height();  

                superZoomImage = $(".SuperZoomBox img");
                            
                superZoomImgWidth = $(superZoomImage).width();
                superZoomImgHeight = $(superZoomImage).height();                                                      
                             
                mx = e.pageX;
                my = e.pageY;                                                     
                methods.superWin8Move(superZoomBox,superZoomImage,superZoomBoxWidth,superZoomBoxHeight,superZoomImgWidth,superZoomImgHeight);       
            }
            function handlePointerMove(e){
                mx = e.pageX;
                my = e.pageY;   
                            
                methods.superWin8Move(superZoomBox,superZoomImage,superZoomBoxWidth,superZoomBoxHeight,superZoomImgWidth,superZoomImgHeight); 
            }
            function handlePointerUp(e){
                isSuperZoomDragging = false;
            }
        },
        addControlHandlers: function (closeZoomBox) {

            //Add click handler for close button
            $(closeZoomBox).bind("click", function (event) {
                event.stopPropagation();
                event.preventDefault();
                methods.closeSuperZoom();
            });
        },
        closeSuperZoom: function () {

            //Close the super zoom box
            $(".SuperZoom").fadeOut(300, function () {
                $(".SuperZoom").remove();
                superMoveInterval = null;
                $("body").css("overflow", "");
                $("html").css("overflow", "");
                zcNoScroll = false;
            });

        },
        resizeSuperZoom: function () {
            
        },
        superMove: function () {

            var superZoomBox = $(".SuperZoomBox");
            var superZoomImage = $(".SuperZoomBox img");

            if ($(superZoomImage).length) {

                var superZoomBoxWidth = $(superZoomBox).width();
                var superZoomBoxHeight = $(superZoomBox).height();

                var mousePercentX = (mx - $(superZoomBox).offset().left) / (superZoomBoxWidth / 100);
                var mousePercentY = (my - $(superZoomBox).offset().top) / (superZoomBoxHeight / 100);

                var currentImageX = $(superZoomImage).offset().left;
                var currentImageY = $(superZoomImage).offset().top;

                var superImageFactorX = currentZoomImageDimensions.width / 100;
                var superImageFactorY = currentZoomImageDimensions.height / 100;

                var endTargetX = 0 - (superImageFactorX * mousePercentX) + (superZoomBoxWidth * mousePercentX / 100) + $(superZoomBox).offset().left;
                var endTargetY = 0 - (superImageFactorY * mousePercentY) + (superZoomBoxHeight * mousePercentY / 100) + $(superZoomBox).offset().top;

                var difX = currentImageX - endTargetX;
                var difY = currentImageY - endTargetY;

                var targetX = currentImageX - (difX / smoothScroll);
                var targetY = currentImageY - (difY / smoothScroll);


                targetX = Math.round(targetX);
                targetY = Math.round(targetY);


                $(superZoomImage).offset({ left: targetX, top: targetY });

            }


            if ($(superZoomBox).hasClass("SuperZoomBoxHover")) {
                superMoveInterval = setTimeout(function () { methods.superMove(); }, 30);
            }

        },

        ///////////////iPad super move///////////////////////////
        initDragParams: function () {

            startDragX = mx;
            startDragY = my;

            var superZoomImage = $(".SuperZoomBox img");
            startImageOffsetX = $(superZoomImage).position().left;
            startImageOffsetY = $(superZoomImage).position().top;            
        },
        superIpadMove: function () {
            var superZoomBox = $(".SuperZoomBox");
            var superZoomImage = $(".SuperZoomBox img");

            if ($(superZoomImage).length) {

                if (!isSuperZoomDragging) {
                    methods.initDragParams();
                    isSuperZoomDragging = true;
                }                             
                
                var superZoomBoxWidth = $(superZoomBox).width();
                var superZoomBoxHeight = $(superZoomBox).height();

                // currentZoomImageDimensions.width;
                // currentZoomImageDimensions.height;

                //var currentImageOffsetX = $(superZoomImage).position().left;
                //var currentImageOffsetY = $(superZoomImage).position().top;

                var mouseDiffX = mx - startDragX;
                var mouseDiffY = my - startDragY;

                //var imageDiffX = currentImageOffsetX - startImageOffsetX;
                // var imageDiffY = currentImageOffsetY - startImageOffsetY;

                var targetMoveX = mouseDiffX + startImageOffsetX;
                var targetMoveY = mouseDiffY + startImageOffsetY;

                if (targetMoveX > 0) {
                    targetMoveX = 0;
                }

                if (targetMoveY > 0) {
                    targetMoveY = 0;
                }

                var minX = 0 - ($(superZoomImage).width() - superZoomBoxWidth);
                var minY = 0 - ($(superZoomImage).height() - superZoomBoxHeight);



                if (targetMoveX < minX) {
                    targetMoveX = minX;
                }

                if (targetMoveY < minY) {
                    targetMoveY = minY;
                }

                if ($(superZoomImage).width() < superZoomBoxWidth) {
                    targetMoveX = 0;
                }

                if ($(superZoomImage).height() < superZoomBoxHeight) {
                    targetMoveY = 0;
                }

                // targetMoveX += (mx * lastUsedScale)/2;
                // targetMoveY += (my * lastUsedScale)/2;

                var cssString = 'translate3d(' + targetMoveX + 'px ,' + targetMoveY + 'px,0)';                
                // cssString += 'scale(' + lastUsedScale + ')';

                $(superZoomImage).css('-webkit-transform', cssString);
                $(superZoomImage).css('-moz-transform', cssString);
                $(superZoomImage).css('transform', cssString);

            }            
        }, 
        initWin8DragParams: function (superZoomImage) {
            
            startDragX = mx;
            startDragY = my;           
            
            startImageOffsetX = $(superZoomImage).position().left;
            startImageOffsetY = $(superZoomImage).position().top;              
        },               
        superWin8Move: function (superZoomBox,superZoomImage,superZoomBoxWidth,superZoomBoxHeight,superZoomImgWidth,superZoomImgHeight) {           
        
            if ($(superZoomImage).length) {

                if (!isSuperZoomDragging) {
                    methods.initWin8DragParams(superZoomImage);
                    isSuperZoomDragging = true;
                }                          

                var mouseDiffX = mx - startDragX;
                var mouseDiffY = my - startDragY;                

                var targetMoveX = mouseDiffX + startImageOffsetX;
                var targetMoveY = mouseDiffY + startImageOffsetY;

                if (targetMoveX > 0) {
                    targetMoveX = 0;
                }

                if (targetMoveY > 0) {
                    targetMoveY = 0;
                }

                var minX = 0 - (superZoomImgWidth - superZoomBoxWidth);
                var minY = 0 - (superZoomImgHeight - superZoomBoxHeight);

                if (targetMoveX < minX) {
                    targetMoveX = minX;
                }

                if (targetMoveY < minY) {
                    targetMoveY = minY;
                }

                if (superZoomImgWidth < superZoomBoxWidth) {
                    targetMoveX = 0;
                }

                if (superZoomImgHeight < superZoomBoxHeight) {
                    targetMoveY = 0;
                }

                var cssString = 'translate3d(' + targetMoveX + 'px ,' + targetMoveY + 'px,0)';                            

                $(superZoomImage).css('-webkit-transform', cssString);
                $(superZoomImage).css('-moz-transform', cssString);
                $(superZoomImage).css('transform', cssString);                
            }            
        },
        superIpadZoom: function () {

            if ($(".SuperZoomBox img").length) {


                if (!isSuperZoomZooming) {
                    methods.superIpadZoomInit();
                    isSuperZoomZooming = true;
                }

                var point1 = { "x": mx, "y": my };
                var point2 = { "x": mx2, "y": my2 };
                var distance = methods.getTouchPointsDistance(point1, point2);

                //  var distanceDiff = distance - startZoomPointsDistance;

                var scaleFactor = distance / startZoomPointsDistance;

                //currentScale = scaleFactor;

                currentScale = scaleFactor * lastUsedScale;


                //Zoom origin
                var centrePointX = mx + (mx2 - mx) / 2;
                var centrePointY = my + (my2 - my) / 2;



                var superZoomImageOffset = $(".SuperZoomBox img").offset();

                var imageLeft = superZoomImageOffset.left + $(".SuperZoomBox img").width;



                var originX = 0;
                var originY = 0;
                var originXperc = 50;
                var originYperc = 50;
                if (centrePointX > superZoomImageOffset.left && centrePointX < (superZoomImageOffset.left + $(".SuperZoomBox img").width())) {
                    originXpx = centrePointX - superZoomImageOffset.left;
                    originXperc = originXpx / ($(".SuperZoomBox img").width() / 100)
                }

                if (centrePointY > superZoomImageOffset.top && centrePointY < (superZoomImageOffset.top + $(".SuperZoomBox img").height())) {
                    originYpx = centrePointY - superZoomImageOffset.top;
                    originYperc = originYpx / ($(".SuperZoomBox img").height() / 100)
                }

                var cssString = 'scale(' + currentScale + ') ';
                var originString = Math.floor(originXperc) + '% ' + Math.floor(originYperc) + '%';



                $(".SuperZoomBox img").css("top", "")
                                          .css("left", "")
                                          .css('-webkit-transform', cssString)
                                           .css('-webkit-transform-origin', originString);


                // -moz-transform: scale(0.5);
            }

        },
        getTouchPointsDistance: function (point1, point2) {

            var xs = 0;
            var ys = 0;

            xs = point2.x - point1.x;
            xs = xs * xs;

            ys = point2.y - point1.y;
            ys = ys * ys;

            return Math.sqrt(xs + ys);

        },
        superIpadZoomInit: function () {

            //startZoomX = mx2;
            //startZoomY = my2;

            var point1 = { "x": mx, "y": my };



            var point2 = { "x": mx2, "y": my2 };

            startZoomPointsDistance = methods.getTouchPointsDistance(point1, point2);

            //var mx2, my2;
            //var isSuperZoomZooming = false;
            //var startZoomX, startZoomY;
        },
        ////////////////////Add nav handler ////////////////////////
        addNavEventHandlers: function (nav) {

            var $nav = $(nav);

            //Nav item selection
            $nav.find("li").each(function () {
                $(this).find("a").bind("click", function () {
                    methods.loadSuperZoomImage($(this).attr("rel"));
                    $(this).closest("ul").find("li").removeClass("selected");
                    $(this).parent().addClass("selected");
                    return false;
                });
            });

            //Nav scrolling
            $nav.find("a.carouselNext").bind("click", function () {

                if ($(this).hasClass("disabled")
                    ||isCarouselScrolling) {
                    return false;
                }

                isCarouselScrolling = true;

                $(nav).find("a.carouselPrevious").removeClass("disabled");

                var ul = $(nav).find("ul");
                var topVisibleItem = $(ul).find("li").eq(curTopNavItemIndex);
                var distance = $(topVisibleItem).outerHeight() + navLiMargin;
                curTopNavItemIndex++;
                $(ul).animate({top: "-=" + distance}, 
                    {
                        duration: carouselScrollAnimationSpeed,
                        complete: function () {
                            isCarouselScrolling = false;

                            var lastItemOffset = ul.find("li:last-child").offset().top + distance; 
                            var navEndOffset = $(".SuperThumbNailNav #ZoomNavEnd").offset().top;

                            if (lastItemOffset < navEndOffset) {
                                $(nav).find("a.carouselNext").addClass("disabled");
                            }

                        }
                    });
            });

            //Nav scrolling
            $nav.find("a.carouselPrevious").bind("click", function () {

                if ($(this).hasClass("disabled")
                    || isCarouselScrolling) {
                    return false;
                }

                isCarouselScrolling = true;

                $(nav).find("a.carouselNext").removeClass("disabled");

                var ul = $(nav).find("ul");
                var topVisibleItem = $(ul).find("li").eq(curTopNavItemIndex-1);
                var distance = $(topVisibleItem).outerHeight() + navLiMargin;
                curTopNavItemIndex--;
                $(ul).animate({top: "+=" + distance}, 
                    {
                        duration: carouselScrollAnimationSpeed,
                        complete: function () {
                            
                            isCarouselScrolling = false;                          

                            if (curTopNavItemIndex <= 0) {
                    $(nav).find("a.carouselPrevious").addClass("disabled");
                }
                        }
                    });
            });

        },
        /////Bind an image to the superzoom container and set image dimensions
        bindSuperZoomImage: function (img) {

            var superZoomBox = $(".SuperZoom .SuperZoomBox");

            //Fade out any existing super zoom image
            $(superZoomBox).find("img").fadeOut(200, function () {
                $(this).remove();
            });

            //Initially hide the new image so we can fade it in
            $(img).hide();
            //Append the image to the superzoom container
            $(superZoomBox).append(img);
            //Fade image in
            $(img).fadeIn(300);
            //Set initial position - the dynamic position will kick in immediately so this 
            //is just a starting point
            $(img).css("top", 0).css("left", 0);
            
            //Store the new image dimensions
            currentZoomImageDimensions = methods.getImageDimensions(img);


        },
        //////////////////Load Super Zoom Image///////////////////////
        loadSuperZoomImage: function (path) {


            //Create new image
            var tmpImg = new Image();

            //This fixes cached images not showing in IE8 and below
            if ($.browser.msie && $.browser.version < 9) {
                path += "?rnd=" + Math.random().toString(36).substring(7);
                tmpImg.src = path;
            }

            //On image load, pass to the binding method
            $(tmpImg).load(function () {
                methods.bindSuperZoomImage(tmpImg);
            }).attr("src", path);

            return false;

        },

        ///////////////////////Get Object Dimensions/////////////////////
        getImageDimensions: function (image) {

            //Different browsers require different treatment for measuring dynamically loaded images
            //Chrome stuggles to measure images if they are already cached, earlier versions of IE don't support
            //naturalHeight/width - need to try a few different methods to ensure we get a result

            //First try to get image dimensions using naturalHeight/width
            var imgHeight = $(image).prop('naturalHeight');
            var imgWidth = $(image).prop('naturalWidth');

            //If that doesn't work, try to measure the image the 'standard' jQuery way
            if (imgHeight == undefined || imgHeight == 0) {
                imgHeight = $(image).height();
                imgWidth = $(image).width();
            }

            //Finally, if we still have no dimensions, bind a hidden copy of the image to the body and measure that
            if (imgHeight == undefined || imgHeight == 0) {
                var img = $(image).clone();
                $(img).css("display", "none");
                $("body").append(img);
                imgHeight = $(img).height();
                imgWidth = $(img).width();
                $(img).remove();
            }


            var imgObj = {
                height: imgHeight,
                width: imgWidth
            };

            return imgObj;
        }
    };

    $.fn.SuperZoomComponent = function (method) {

        // Method calling 
        if (methods[method]) {
            return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return methods.init.apply(this, arguments);
        } else {
            $.error('Method ' + method + ' does not exist on jQuery.SuperZoomComponent');
        }

    };

})(jQuery);
