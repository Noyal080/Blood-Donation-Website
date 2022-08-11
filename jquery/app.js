var acc=document.getElementsByClassName('accordion');
var i;
var len = acc.length;
for(i = 0; i<len ;i++){
    acc[i].addEventListener('click', functiom(){
    this.classList.toggle('active');
    var panel = this.nextElementSibling;
    if(panel.style.maxHeight){
            panel.stylemaxHeight = null;
    }
    else{
        panel.style.naxHEight=panel.scrollHeight + 'px'
    }
    }
}
)
}
