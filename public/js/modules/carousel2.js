function carousel2(){

     $(document).ready(function(){
     	$('.slider2').slick({
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
     	  appendArrows:$('.arrow2'),
     	  prevArrow:$('.prev2'),
     	  nextArrow:$('.aft2'),
     	  appendDots:$('.points2'),
     	  dotsClass:'points2'
     	})
     });

}
export default carousel2;