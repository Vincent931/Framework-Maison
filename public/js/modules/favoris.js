function favoris(){

     let tab = document.getElementsByClassName('bouton-prefere');
     
     for(let i=1; i <= tab.length; i++){
          
          let input = document.getElementById('valid'+i);
          let button = document.getElementById('bouton'+i);
          
          button.addEventListener("click", function() {
               
               let val = input.value;
               query(val);
               modal();
          })
     
     }
     
     let query = async (val) => {
         return await fetch(`./index.php?action=add-favori&id=${val}`);
     }
     
     function modal(){
          $('#myModal').modal('show');
     }
}
export default favoris;