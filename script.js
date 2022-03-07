//starting animation on load
window.onload = function() {
    window.scrollTo(0,0);
    document.getElementById("bouton_go_nav").animate([
        {transform: 'translateY(90%)',opacity:'0%'},
        {transform: 'translateY(90%)',opacity:'0%'},
        {transform: 'translateY(0)', opacity:'100%'}
    ], {
        duration:3000,
        iterations:1
    }
    );
    document.getElementById("bouton_go_nav").style.opacity = '100%'
    document.getElementById("bouton_go_nav").addEventListener("click",backToNav)
}

let position = 'pres';
let numProject = 0;
const totalProject = 3;

function backToNav() {

    document.getElementById("bouton_go_nav").animate(
        [
            {opacity:'100%',transform: 'translateY(0)'},
            {opacity:'0%',transform:'translateY(90%)'}
        ], {
            duration:500,
        }
    )
    document.getElementById("bouton_go_nav").style.opacity = '0%'

    document.getElementById('bureau').style.transform = 'scale(0.25) translate(-50%,-50%)'
    document.getElementById("bouton_go_nav").style.cursor = 'default'
    document.body.style.backgroundColor = '#F5EFD9';

    for(i=0;i<document.getElementsByClassName('bouton_onglets').length;i++) {
        document.getElementsByClassName('bouton_onglets')[i].style.display = 'flex'
        document.getElementsByClassName('bouton_onglets')[i].style.opacity = '100%'
        document.getElementsByClassName('bouton_onglets')[i].animate(
            [
                {opacity:'0%'},
                {opacity:'100%'}
            ], {
                duration:500
            }
        )
    }
    
    setTimeout(() => {
        document.getElementById('bouton_go_nav').getElementsByTagName('span')[0].innerHTML = 'Retour'
        document.getElementById('bouton_go_nav').style.display = 'none'
    },500)

    document.getElementById('bouton_pres').addEventListener('click',goToPres)
    document.getElementById('bouton_cv').addEventListener('click',goToCV)
    document.getElementById('reals_fermé').addEventListener('click',goToReals)
    document.getElementById('bouton_contact').addEventListener('click',goToContact)

    if(position == 'cv') {
        window.scrollTo(0,0)
        document.body.style.overflow = 'hidden'
        document.getElementById('bouton_go_nav').style.top = '180px'
    } else if(position == 'reals') {
        document.getElementById('reals_fermé').style.display = 'flex'
        document.getElementById('couv_reals').getElementsByClassName('double_page')[parseInt(numProject)].style.display = 'none'
    } else;

    position = 'nav'

    document.getElementById("bouton_go_nav").removeEventListener("click",backToNav)

}




function goInPage() {

    for(i=0;i<document.getElementsByClassName('bouton_onglets').length;i++) {
        document.getElementsByClassName('bouton_onglets')[i].style.display = 'flex'
        document.getElementsByClassName('bouton_onglets')[i].style.opacity = '0%'
        document.getElementsByClassName('bouton_onglets')[i].animate(
            [
                {opacity:'100%'},
                {opacity:'0%'}
            ], {
                duration:500
            }
        )
    }
    setTimeout(() => {
        if(position != 'nav') {
            document.getElementById("bouton_go_nav").style.display = 'flex'
            for(i=0;i<document.getElementsByClassName('bouton_onglets').length;i++) {
                document.getElementsByClassName('bouton_onglets')[i].style.display = 'none'
            }
        }
    },500)

    document.getElementById("bouton_go_nav").style.display = 'flex'
    document.getElementById("bouton_go_nav").style.opacity = '100%'
    document.getElementById("bouton_go_nav").style.cursor= 'pointer'

    document.getElementById("bouton_go_nav").animate([
        {transform: 'translateY(90%)',opacity:'0%'},
        {transform: 'translateY(90%)',opacity:'0%'},
        {transform: 'translateY(0)', opacity:'100%'}
    ], {
        duration:1000,
        iterations:1
    }
    );

    document.getElementById("bouton_go_nav").addEventListener("click",backToNav)
    document.getElementById("reals_fermé").removeEventListener("click",goToReals)
}


function goToPres() {
    position = 'pres'
    document.getElementById('bureau').style.transform = 'scale(0.9) translate(-50%,-50%)'
    document.getElementById('bouton_go_nav').style.backgroundColor = '#F5EFD9'
    document.body.style.backgroundColor = '#BD701E';
    goInPage()
}



function goToCV() {
    position = 'cv'
    document.getElementById('bureau').style.transform = 'scale(0.8) translate(-640px,-1330px)'
    document.getElementById('bouton_go_nav').style.backgroundColor = '#BD701E'
    document.getElementById('bouton_go_nav').style.top = '610px'
    document.body.style.overflowY = 'auto'
    goInPage()
}

function goToReals() {
    position = 'reals'
    document.getElementById('bureau').style.transform = 'scale(0.6) translate(-3170px,-570px)'
    document.getElementById('reals_fermé').style.display = 'none'
    document.getElementById('couv_reals').getElementsByClassName('double_page')[numProject].style.display = 'flex'
    document.getElementById('bouton_go_nav').style.backgroundColor = '#BD701E'
    for(i=0;i<totalProject;i++) {
        document.getElementsByClassName('container_right_arrow_page')[i].getElementsByTagName('div')[0].addEventListener('click',switchRight)
        document.getElementsByClassName('container_left_arrow_page')[i].getElementsByTagName('div')[0].addEventListener('click',switchLeft)
    }
    goInPage()
    testArrows()
}

function goToContact() {
    position = 'contact'
    document.getElementById('bureau').style.transform = 'scale(0.9) translate(-3450px,-1790px)'
    document.getElementById('bouton_go_nav').style.backgroundColor = '#BD701E'
    goInPage()
}

function switchLeft() {

    if(numProject == 0) {
        return;
    }

    document.getElementById('couv_reals').getElementsByClassName('double_page')[numProject].style.display = 'none'
    numProject -= 1;
    document.getElementById('couv_reals').getElementsByClassName('double_page')[numProject].style.display = 'flex'
    testArrows()
}

function switchRight() {
    if(numProject+1 == totalProject) {
        return;
    }
    document.getElementById('couv_reals').getElementsByClassName('double_page')[numProject].style.display = 'none'
    numProject += 1;
    document.getElementById('couv_reals').getElementsByClassName('double_page')[numProject].style.display = 'flex'
    testArrows()
}

function testArrows() {
    if(numProject == 0) {
        console.dir()
        document.getElementById('couv_reals').getElementsByClassName('double_page')[numProject].getElementsByClassName('container_left_arrow_page')[0].style.display = "none"
    } else {
        document.getElementById('couv_reals').getElementsByClassName('double_page')[numProject].getElementsByClassName('container_left_arrow_page')[0].style.display = "block"
    }

    if(numProject+1 == totalProject) {
        document.getElementById('couv_reals').getElementsByClassName('double_page')[numProject].getElementsByClassName('container_right_arrow_page')[0].style.display = "none"
    } else {
        document.getElementById('couv_reals').getElementsByClassName('double_page')[numProject].getElementsByClassName('container_right_arrow_page')[0].style.display = "block"
    }

}