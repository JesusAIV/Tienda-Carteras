let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

// FUNCTION PARA QUE EL SLIDER AVANCE DE ACUERDO A UN INTERVALO DE TIEMPO
setInterval(function(){
    showSlides(slideIndex += 1);
}, 3500);

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
}

// SLIDER COMENTARIOS DE LOS CLIENTES
(function(){
    const slider = [...document.querySelectorAll('.slider__body')];
    const arrowNext = document.querySelector('#next');
    const arrowBefore = document.querySelector('#before');

    let value;

    arrowNext.addEventListener('click', ()=>changePosition(1));

    arrowBefore.addEventListener('click', ()=>changePosition(-1));

    function changePosition(change){
        const currentElement = Number(document.querySelector('.slider__body--show').dataset.id);

        value = currentElement;
        value+= change;

        if(value === 0 || value == slider.length+1){
            value = value === 0 ? slider.length : 1;
        }

        slider[currentElement-1].classList.toggle('slider__body--show');
        slider[value-1].classList.toggle('slider__body--show');
    }
})()