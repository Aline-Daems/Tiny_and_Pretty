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
document.querySelectorAll('[class*="reveal-"]').forEach(function (r) {
    observer.observe(r)
})

/////////////////////////////////////////////////////////////////

$(document).ready(function () {
    $('#logo-show').css({'display': 'none'});
    $(window).scroll(function () {

        let headerH = $('.header-container').outerHeight(true);
        //  console.log(headerH);


//this will calculate header's full height, with borders, margins, paddings
        let scrollVal = $(this).scrollTop();
        if (scrollVal >= headerH) {
            $('#home-banner').css({'position': 'fixed', 'top': '0px'});
            $('#logo-show').css({'display': 'block', 'transform':'scale(1.3)'});
            $('.dropdown-menu').css({'top': '90%'});


        } else {
            $('#home-banner').css({'position': 'static', 'top': '0px'});
            $('#logo-show').css({'display': 'none'});
        }


    });

});

////////////////////////////////////////////////////////////////////////
let icones = document.getElementById('iconesJS');
if (window.location.href === "http://127.0.0.1:8000/qui/sommes/nous"
    ||
    window.location.href === "http://127.0.0.1:8000/faq"
    ||
    window.location.href === "http://127.0.0.1:8000/tailles"
    ||
window.location.href === "http://127.0.0.1:8000/contact/user"
    ||
    window.location.href === "http://127.0.0.1:8000/livraisons/et/retours"
    ||
    window.location.href === "http://127.0.0.1:8000/login"
) {
    $('.hideHeaderJS').css({'display': 'none'});
    $('#search-formJS').replaceWith(icones);
}


