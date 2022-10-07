const visible = document.querySelectorAll('.visible');
const navbar = document.querySelector('.sidebar');
const visib = document.querySelector('.visib');



navbar.addEventListener('mouseenter',()=>{
    visible.forEach(element => {
        setTimeout(function(){
            element.classList.add('displays');
        },500);
        
    });
    setTimeout(() => {
        visib.classList.toggle('visib2');   
    }, 500);
    
})
navbar.addEventListener('mouseleave',()=>{
    visible.forEach(element => {
        
        setTimeout(() => {
            if (element.classList.contains('displays')) {
                element.classList.add('displays2');
                setTimeout(() => {
                    
                    element.classList.remove('displays');
                    element.classList.remove('displays2');
                }, 250);
                    
            }
            
        },0);
        
    });
    if (visib.classList.contains('visib2')) {
        visib.classList.toggle('visib2');
    }
   
})
if(navbar.clientWidth <=120){
    console.log(navbar.clientWidth);
    visible.forEach(element => {
        if(element.classList.contains('displays')){
            element.classList.remove('displays');
        }

    });
}




















// navbar.addEventListener('mouseleave',()=>{
//     visible.forEach(element => {
//         if(element.classList.contains('displays')){
//             element.classList.remove('displays');
//         }
        
//     })
// })