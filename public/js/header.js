// determine currently active link
var URL = window.location.href

// get last path

var last = URL.split('/').reverse()

var link

if(last[0] === ''){
    link = document.getElementById('homeLink')
}
if(last[0] === 'hot.php'){
    link = document.getElementById('hotLink')
}

if(link){
    link.style.color='#736BF3'
    link.style.fontWeight='bold'
}

const dropdownEl = document.getElementById('dropdown')

dropdownEl && dropdownEl.addEventListener('click',function(e){
    document.getElementById('dropdownEl').classList.toggle('header__nav__dropdown__container--opened')
})

window.addEventListener('scroll', function(){
    if(window.scrollY > 20){
        document.getElementById('header').classList.add('header--trans')
    }
    else{
        document.getElementById('header').classList.remove('header--trans')
    }
})
