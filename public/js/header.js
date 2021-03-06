// determine currently active link
var URL = window.location.href

// get last path

var last = URL.split('/').reverse()

var link

if(last[0] === ''){
    link = document.getElementById('homeLink')
}
if(last[0] === 'jobs.php'){
    link = document.getElementById('jobLink')
}

if(link){
    link.style.color='#3e64ff'
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
