function appear(){
     
     const ratio=.1;
     const options = {
       root: null,
       rootMargin: '0px',
       threshold: ratio
     }
     /* apparait de la gauche*/
     const handleIntersectL = function(entries,observerL){
     	entries.forEach(function(entry){
     		if(entry.intersectionRatio > ratio){
     			entry.target.classList.add('reveal-visibleL');
     			observerL.unobserve(entry.target);
     		}
     	})
     }
     
     const observerL = new IntersectionObserver(handleIntersectL, options);
     
     document.querySelectorAll('.revealL').forEach(function(l){
     	observerL.observe(l);
     })
     /*apparait de la droite*/
     const handleIntersectR = function(entries,observerR){
     	entries.forEach(function(entry){
     		if(entry.intersectionRatio > ratio){
     			entry.target.classList.add('reveal-visibleR');
     			observerR.unobserve(entry.target);
     		}
     	})
     }
     
     const observerR = new IntersectionObserver(handleIntersectR, options);
     
     document.querySelectorAll('.revealR').forEach(function(r){
     	observerR.observe(r);
     })
}
export default appear;