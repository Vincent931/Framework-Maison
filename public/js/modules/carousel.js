function carousel(){
     
     $(document).ready(function(){
     	$('.slider').slick({
     	  speed: 300,
     	  centerMode: true,
     	  centerPadding: '0px',
     	  rtl: true,
     	  lazyLoad: 'ondemand',
     	  infinite: true,
     	  slidesToShow: 1,
     	  slidesToScroll: 4,
     	  arrows: true,
     	  dots: true,
     	  appendArrows:$('.arrow'),
     	  prevArrow:$('.prev'),
     	  nextArrow:$('.aft'),
     	  appendDots:$('.points'),
     	  dotsClass:'points'
     	})
     });
}
export default carousel;