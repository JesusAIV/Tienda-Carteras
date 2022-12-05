// MENU RESPONSIVO EN PRODUCTOS CATEGORIAS
(function(){
    const menu = document.querySelector('.carteras__menu');
    const menu__caja1 = document.querySelector('.caja1');

    
    menu.addEventListener('click', ()=> menu__caja1.classList.toggle("menu__caja1--show"));
    
    const listElement = document.querySelectorAll('.nav-item--show');
    const list = document.querySelector('.nav-links');
    const nav = document.querySelector('.menu-hamburguer');
    // FUNCION PARA DESPLEGAR EL SUBMENU
    const addClick = ()=>{
        listElement.forEach(element => {
            element.addEventListener('click', ()=>{
                let subMenu = element.children[1];
                let height = 0;
                element.classList.toggle('nav-item--active')
    
                if(subMenu.clientHeight === 0){
                    height = subMenu.scrollHeight;
                }
    
                subMenu.style.height = `${height}px`;
            })
        })
    }

    const deleteStyle = ()=>{
        listElement.forEach(element =>{
            element.children[1].removeAttribute('style');
            element.children[1].removeAttribute('nav-item--active');
        });
    };


    nav.addEventListener('click', ()=>{
        list.classList.toggle('nav-links--show');
    });
    
    // SI LA PANTALLA ES MAYOR A 768, CERRAR MENU
    window.addEventListener('resize', ()=>{
        if(window.innerWidth > 768){
            deleteStyle();
            if(list.classList.contains('nav-links--show')){
                list.classList.remove('nav-links--show');
            }
        }else{
            addClick();
        }
    });
    
    
    if(window.innerWidth <= 768){
        addClick();
    }

})();

// NAVBAR RESPONSIVO


