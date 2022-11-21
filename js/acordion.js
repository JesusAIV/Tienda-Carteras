const acordion = document.querySelector('detail__paragraph');

const acordionLista = document.querySelector('detail__item');

let height = 0;

acordionLista.addEventListener('click', ()=>{

    if(!height){
        height = acordion.scrollHeight;
    }else{
        height = 0;
    }

    acordion.style.height = `${height}px`;
});
