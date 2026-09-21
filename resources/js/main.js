let links=document.querySelectorAll('.custom-link');

links.forEach((link)=>{
    link.addEventListener('click',()=>{
        if(!link.classList.contains('active')){
            link.classList.add('active');
        }
    })
})