(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
jQuery(document).ready(function($) {
	$("#lightgallery").lightGallery({
    	selector: '.kira'
    });
	var dai = $(document).width();
	if(dai > 1000){
		var cao = $('.category-box').height();
		$('.carousel-inner img').height(cao);
	}
	var maxHeight = function(elems){
	    return Math.max.apply(null, elems.map(function ()
	    {
	        return $(this).innerHeight();
	    }).get());
	}
	var chieucao = maxHeight($(".detail-pro"));
	//if(dai < 600){
		$('.detail-pro').height(chieucao);
	//}
	var keu = $('.list-news').height();
	var caoimg = $('.detail-pro .post-img img').width();
	$('.detail-pro .post-img img').height(caoimg);

	var caobig = $('.big-img img').width();
		$('.big-img img').height(caobig*0.84);
	$('.content-review').height(keu-40);
	$('.owl-carousel').owlCarousel({
	    loop:true,
	    margin:0,
	    dots: false,
	    nav:true,
	    navText: ['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
	    responsive:{
	        0:{
	            items:1
	        },
	        600:{
	            items:1
	        },
	        1000:{
	            items:1
	        }
	    }
	});
	// totop
	var offset = 220;
	var duration = 500;
	jQuery(window).scroll(function() {
	    if (jQuery(this).scrollTop() > offset) {
	      jQuery('.back-to-top').fadeIn(duration);
	    } else {
	      jQuery('.back-to-top').fadeOut(duration);
	    }
	});
	jQuery('.back-to-top').click(function(event) {
	    event.preventDefault();
	    jQuery('html, body').animate({
	      scrollTop: 0
	    }, duration);
	    return false;
	});
	$('.down-menu').click(function() {
		$(this).next('ul').slideToggle(300);
	});
	$('.click-menu').click(function(event) {
		$('.main-menu').slideToggle(300);
	});
});