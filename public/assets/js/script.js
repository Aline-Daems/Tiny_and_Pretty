


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
            $('#logo-show').css({'display': 'block', 'transform': 'scale(1.3)'});
            $('.dropdown-menu').css({'top': '90%'});


        } else {
            $('#home-banner').css({'position': 'static', 'top': '0px'});
            $('#logo-show').css({'display': 'none'});
        }


    });

});

////////////////////////////////////////////////////////////////////////
let icones = document.getElementById('iconesJS');
if (window.location.href === "https://127.0.0.1:8000/qui/sommes/nous"
    ||
    window.location.href === "https://127.0.0.1:8000/faq"
    ||
    window.location.href === "https://127.0.0.1:8000/tailles"
    ||
    window.location.href === "https://127.0.0.1:8000/contact/user"
    ||
    window.location.href === "https://127.0.0.1:8000/livraisons/et/retours"
    ||
    window.location.href === "https://127.0.0.1:8000/login"
) {
    $('.hideHeaderJS').css({'display': 'none'});
    $('#search-formJS').replaceWith(icones);
}


// Ajax jquery avec le bundle axios sur le coeur de la wishlist

/*

function onClickBtnWish(event) {
    event.preventDefault();
    const url = this.href;
    const heart = this.querySelector('img');


    fetch(url).then(function () {

        console.log(url);

        if (heart.classList.contains('heart-wish')) {
            heart.classList.replace('heart-wish', 'heart-bold');
        } else {
            heart.classList.replace('heart-bold', 'heart-wish');
        }

        console.log(url);

    })
}

document.querySelectorAll('a.js-wish').forEach(function (link) {
    link.addEventListener('click', onClickBtnWish);
})


 */

/*
function onClickBtnWish(event) {
    event.preventDefault();
    const url = this.href;
    let yesWish = document.getElementById('Yes-wish');
    let noWish = document.getElementById('No-wish');


    axios.get(url).then(function () {
    if (yesWish){
        yesWish.replaceWith(noWish)
    }else{
        noWish.replaceWith(yesWish)
    }
        document.querySelectorAll('a.js-wish').forEach(function (link) {
            link.addEventListener('click', onClickBtnWish);
        })
    })}

 */

/* coeur test 1

$(function() {
    $(".heart").on("click", function() {
        $(this).toggleClass("is-active");
    });
});

 */
/*
let icon = document.querySelector('ion-icon');
icon.onclick = function(){
    icon.classList.toggle('active');
}

 */

// TEST COEUR A GARDER

let heartContainer = document.getElementsByClassName('icon-wrapper');

document.querySelectorAll('a.js-wish').forEach(function (link) {


    Object.keys(heartContainer).forEach(singleElement => {

      link.addEventListener('click', function Wish(event) {



            event.preventDefault();
            const url = this.href;
        fetch(url).then(function (response) {


                console.log(response);


                if (heartContainer[singleElement].classList.contains('liked')) {
                    heartContainer[singleElement].classList.add('unliked');
                    heartContainer[singleElement].classList.remove('liked');
                  setTimeout(unlikeRemover, 250);


                } else {
                    heartContainer[singleElement].classList.add('liked');
                    heartContainer[singleElement].classList.remove('unliked');
                }



               function unlikeRemover() {
                    heartContainer[singleElement].classList.remove('unliked');
                }



            });
        });
    });
});













