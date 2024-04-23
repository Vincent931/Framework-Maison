
function header(){
     
     window.addEventListener('scroll', function (){
          let header = document.querySelector('.bandeau');
          header.classList.toggle('scrollAdd', window.scrollY > 0);
          let banner = document.querySelector('.div_banner');
          banner.classList.toggle('scrollAdd', window.scrollY > 0);
          let ul = document.querySelector('ul');
          ul.classList.toggle('scrollAdd', window.scrollY > 0);
          let slogan = document.querySelector('.slogan');
          slogan.classList.toggle('scrollAdd', window.scrollY > 0);
     })
}
export default header;