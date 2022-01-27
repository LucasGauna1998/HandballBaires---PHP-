// Variables Slider


const slider = document.querySelector('.contenido-slider');

const btnRight = document.querySelector('#right');

const btnLeft = document.querySelector('#left');

const imagenes = document.querySelectorAll('.slider-img');


const ultimaImagen = imagenes[imagenes.length - 1];

slider.insertAdjacentElement('afterbegin', ultimaImagen);



btnLeft.addEventListener('click', Prev); 

btnRight.addEventListener('click' , Next );





function Next() {
  
    let primeraImagen = document.querySelectorAll('.slider-img')[0];

    
    slider.style.marginLeft = '-200%';
    slider.style.transition = 'all .5s';

    setTimeout( function() {
        slider.style.transition = 'none';
        slider.insertAdjacentElement('beforeend', primeraImagen);
        slider.style.marginLeft = '-100%';
    }, 500)

}


function Prev() {
   
    let sliderImagenes = document.querySelectorAll('.slider-img');

    let ultimaImagen = sliderImagenes[sliderImagenes.length - 1];

    
    slider.style.marginLeft = '0%';
    slider.style.transition = 'all .5s';


    setTimeout( function() {
        
        slider.style.transition = 'none';
        slider.insertAdjacentElement('afterbegin', ultimaImagen);
        slider.style.marginLeft = '-100%';
    }, 500)


}


function sliderAutomatico () {
    setInterval(() => {
        Next();
    }, 4000);
}

sliderAutomatico();