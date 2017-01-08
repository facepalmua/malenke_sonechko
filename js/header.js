$.fn.extend({
	hoverDelay: function(handlerIn, handlerOut, delay) {
		this.hover(function(ev) {
			window.clearTimeout(this.hoverTimeout);
			var el = this;
			this.hoverTimeout = window.setTimeout(function() { handlerIn.call(el, ev);}, delay);
		}, function(ev) {
			window.clearTimeout(this.hoverTimeout);
			var el = this;
			this.hoverTimeout = window.setTimeout(function() {handlerOut.call(el, ev);}, delay);
		});
	}
});

$(function() {
	var meganavDelay = 150 //milliseconds
	var ua = navigator.userAgent;
    var ds2event = (ua.match(/iPad/i) || ua.match(/iPhone/i)) ? "touchstart" : "hover";
	var msVersion = navigator.userAgent.match(/MSIE ([0-9]{1,}[\.0-9]{0,})/);
    var msie = !!msVersion

	$(".meganav li").hover(function() {
		// preload meganav content for each department
		var tabOffset = $(this).offset().left - $(this).parent().offset().left;
		var tabWidth = $(this).outerWidth();
		var ctnr = $(this).find(".ctnr");
		var target = ctnr.find(".placeholder");
		if (target.length > 0) {
			$.ajax({
				url: meganavURL,
				data: {dept: $(this).data("dept")},
				success: function(data) {
					target.replaceWith(data);
					var totalWidth = 0;
					ctnr.find(".styleideas, .column, .image").each(function() {
						totalWidth += $(this).outerWidth(true);
					});
					if (totalWidth < 900) {
						ctnr.addClass("small");
						ctnr.width(totalWidth + 20);
						var targetLeft = tabOffset - 50;
						/*if (tabOffset + tabWidth > ctnr.width()) {
							ctnr.offset({left: tabOffset - ctnr.width() / 2  + tabWidth / 2});
						}*/
						if (targetLeft < 50) {
							targetLeft = 0;
							ctnr.css("border-left", "none");
						}
						if (targetLeft + ctnr.outerWidth() > 900) {
							//ctnr.css("border-right", "none");
							targetLeft = 964 - ctnr.outerWidth();
						}
						if (ctnr.is(":visible")) {
							ctnr.hide();
							ctnr.offset({left: targetLeft});
							ctnr.show();
						} else {
							ctnr.offset({left: targetLeft});
						}
					}
					ctnr.find(".collection:first-child").addClass("active");
				}
			});
		}
	}).hoverDelay(function(e){
		    $(this).find(".ctnr").show();
			$(this).addClass("active");
	}, function() {
			$(this).find(".ctnr").hide();
			$(this).removeClass("active");
	}, meganavDelay);
	

$(".choose").click(function () {
$(".choose").addClass("active");
$(".choose > .icon").addClass("active");
$(".pay").removeClass("active");
$(".wrap").removeClass("active");
$(".ship").removeClass("active");
$(".pay > .icon").removeClass("active");
$(".wrap > .icon").removeClass("active");
$(".ship > .icon").removeClass("active");
$("#line").addClass("one");
$("#line").removeClass("two");
$("#line").removeClass("three");
$("#line").removeClass("four");
})

// 	var linc2 = $('.linc2'),
//     timeoutId;
// $('.content-hover').hover(function(){
//     clearTimeout(timeoutId);
//     linc2.show();
// }, function(){
//     timeoutId = setTimeout($.proxy(linc2,'hide'), 1000)
// });
// linc2.mouseenter(function(){
//     clearTimeout(timeoutId); 
// }).mouseleave(function(){
//     linc2.hide();
// }); 

// 	var linc3 = $('.linc3'),
//     timeoutId;
// $('.content-hover2').hover(function(){
//     clearTimeout(timeoutId);
//     linc3.show();
// }, function(){
//     timeoutId = setTimeout($.proxy(linc3,'hide'), 1000)
// });
// linc2.mouseenter(function(){
//     clearTimeout(timeoutId); 
// }).mouseleave(function(){
//     linc3.hide();
// }); 

	
});