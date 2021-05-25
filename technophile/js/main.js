
// if (window.matchMedia('(min-width: 992px)').matches)
// {
//   $(document).ready(function(){
//   $("#nav").click(function(event){
      
//          event.preventDefault();
//   });
//         $('#nav').unbind('click');
//       window.scrollTo(0, 1350);   

// }); 
// }


 

// if (window.matchMedia('(max-width: 900px)').matches)
// {
    	
// 	$(document).ready(function(){
//   $("#nav").click(function(event){
//    		 event.preventDefault();
//   });
//   		$('#nav').unbind('click');
//   		window.scrollTo(0, 1000);
// }); 
// }


// if (window.matchMedia('(max-width: 740px)').matches)
// {
    	
// 	$(document).ready(function(){
//   $("#nav").click(function(event){
//    		 event.preventDefault();
//   });
//   		$('#nav').unbind('click');
//   		window.scrollTo(0, 2300);
// }); 
// }


function scrollFunction() {
    if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300 {
        document.getElementById("mybtn").style.display = "block";
    } else {
        document.getElementById("mybtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}




