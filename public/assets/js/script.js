$(document).ready(function () {
    // executes when HTML-Document is loaded and DOM is ready

// breakpoint and up
    $(window).resize(function () {
        if ($(window).width() >= 980) {

            // when you hover a toggle show its dropdown menu
            $(".navbar .dropdown-toggle").hover(function () {
                $(this).parent().toggleClass("show");
                $(this).parent().find(".dropdown-menu").toggleClass("show");
            });

            // hide the menu when the mouse leaves the dropdown
            $(".navbar .dropdown-menu").mouseleave(function () {
                $(this).removeClass("show");
            });

            // do something here
        }
    });
});
///////////////////////////////////////////////////////////////////////////////////////////////////

/*window.onload = function() {
    $(".background-coming-soon").addClass('zoom');
};

 */
/*
window.addEventListener('DOMContentLoaded', setup);

const threshold = .1
function setup() {
    const options = {
        root: null,
        rootMargin: '0px',
        threshold
    }

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            console.log('fonction OK');
            if(entry.intersectionRatio > threshold) {
                entry.target.classList.add('show');
                console.log(entry.intersectionRatio)
                observer.unobserve(entry.target);
            }

        })
    }, options);

    const h1 = document.querySelector('h1');
    observer.observe(h1);

   /*const h3 = document.querySelector('h3');
    observer.observe(h3);*/
/*
const h5 = document.querySelector('h5');
observer.observe(h5);

*/
/*
    const paras = document.querySelectorAll('p');
    paras.forEach(p => observer.observe(p));

}

*/
/*


const ratio =  1
const options2 = {
    root: null,
    rootMargin: '0px',
    threshold: ratio
}
const handleIntersect = function (entries, observer){
    entries.forEach(function (entry){
        if (entry.intersectionRatio > ratio){
            console.log(entry.intersectionRatio)
     entry.target.classList.add('reveal-visible')
         //   observer.unobserve(entry.target)
    }
    })
}

const observer = new IntersectionObserver(handleIntersect, options2)
observer.observe(document.querySelector('.reveal'))

*/
/*
if (document.getElementById)
{
    if(document.all)
        widthe = document.body.clientWidth;
    else
        widthe = window.innerWidth;
    document.getElementById("webaddress").style.left=widthe;
    document.getElementById("webaddress").style.visibility="visible";
}

function moveit()
{
    if (widthe>15)
    {
        document.getElementById("webaddress").style.left=widthe;
        widthe -= 10;
    }
    else{
        document.getElementById("webaddress").style.fontStyle="normal"
        document.getElementById("webaddress").style.left= widthe + 10;
        clearInterval(moving)
    }
}
if (document.getElementById)
    moving=setInterval("moveit()",1);

*/
/*
let callButton = document.getElementById("reveal");

var decallage = 100; // nombre de px de decallage voulue
callButton.addEventListener("onscroll", function() { // ajout d'un evenement onclick
    callButton.style.left = callButton.style.left - decallage;
})

 */
/////////////////////////////////////////////////////////////////////////////////////////////
const ratio = .1
const options = {
    root: null,
    rootMargin: '0px',
    threshold: .1
}

const handleIntersect = function (entries, observer) {
    entries.forEach(function (entry) {
       if (entry.intersectionRatio > ratio) {
         entry.target.classList.add('reveal-visible')
          observer.unobserve(entry.target)
       }
    })

}

const observer = new IntersectionObserver(handleIntersect, options);
document.querySelectorAll('[class*="reveal-"]').forEach(function(r) {
    observer.observe(r)
})

/////////////////////////////////////////////////////////////////

$(document).ready(function() {
    $('#logo-show').css({'display': 'none'});
    $(window).scroll(function() {

        let headerH = $('.header-container').outerHeight(true);
      //  console.log(headerH);



//this will calculate header's full height, with borders, margins, paddings
        let scrollVal = $(this).scrollTop();
        if ( scrollVal >= headerH ) {
            $('#home-banner').css({'position':'fixed','top' :'0px'});
            $('#logo-show').css({'display': 'block'});



        } else  {
            $('#home-banner').css({'position':'static','top':'0px'});
            $('#logo-show').css({'display': 'none'});
        }


    });

});


