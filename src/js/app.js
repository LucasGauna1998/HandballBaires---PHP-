// Variables 

const btnMenu = document.querySelector('.menu-responsive');
const menu = document.querySelector('.menu');
const btnSubMenu = document.querySelectorAll('.btn-sub-menu');
const subMenu = document.querySelector('.sub-menu');
const header = document.querySelector('.site-header');
const body = document.querySelector('body');


document.addEventListener( 'DOMContentLoaded', () => {
    btnMenu.addEventListener('click', mostrarMenu);
    // btnSubMenu.addEventListener('click', mostrarSubMenu);
    mostrarSubMenu();
    scrollNav();
  
});

function mostrarMenu () {
    
    menu.classList.toggle('mostrar');

}

function mostrarSubMenu () {

    
    
    

    btnSubMenu.forEach( menu => {
        menu.addEventListener( 'click', (event) => {
            const subMenuLinks = event.target.nextElementSibling;
           
            // let claseAnterior = document.querySelector('.visible');
            // if (claseAnterior) {
            //     claseAnterior.classList.remove('visible');
               
            // }
            
            subMenuLinks.classList.toggle('visible');
            if(document.querySelectorAll('.visible').length > 1) {
                removerClase();
            }
        } )
    })
    
}

function removerClase() {
    // let claseAnterior = document.querySelectorAll('.visible');
    // console.log(claseAnterior);
    // claseAnterior.forEach( clase => {
    //     clase.classList.remove('visible');
    // })

    let claseAnterior = document.querySelector('.visible');

    claseAnterior.classList.remove('visible');
}








function scrollNav() {
    window.addEventListener( 'scroll', navegacionFija );
}



function navegacionFija(){
    const hero = document.querySelector('.hero');

    if (hero.getBoundingClientRect().bottom < 0) {
        body.classList.add('scroll-body');
        header.classList.add('fijo');
    }else {
        body.classList.remove('scroll-body');
        header.classList.remove('fijo');
    }
}