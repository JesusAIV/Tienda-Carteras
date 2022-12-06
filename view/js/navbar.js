// NAVBAR RESPONSIVO
(function(){
    const listElement = document.querySelectorAll('.nav-item--show');
    const list = document.querySelector('.nav-links');
    const menu = document.querySelector('.menu-hamburguer');
    const nav = document.querySelector('.fixed-header');
    const menuIcon = document.querySelector('.menu-img');

    // EVENTO PARA HACER EL EFECTO AL HACER SCROLL
    window.addEventListener('scroll', function(){
        nav.classList.toggle('active', this.window.scrollY > 0);
    });

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


    menu.addEventListener('click', ()=>{
        list.classList.toggle('nav-links--show');
        menuIcon.classList.toggle('menu-img--color');
    })
    
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
    })
    
    
    if(window.innerHeight <= 768){
        addClick();
    }
})();