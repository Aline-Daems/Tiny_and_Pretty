


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
            $('#logo-show').css({'display': 'block'});
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

//////////////////////////////////////////CAROUSEL

/*
    Carousel
*/
/*
$('#multi-item-example').carousel({
    interval: 10000
})

$('.carousel .carousel-item').each(function(){
    let minPerSlide = 3;
    let next = $(this).next();
    if (!next.length) {
        next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));

    for (let i=0;i<minPerSlide;i++) {
        next=next.next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }

        next.children(':first-child').clone().appendTo($(this));
    }
});

 */
/*
$('#multi-item-example').on('slide.bs.carousel', function (e) {

    let $e = $(e.relatedTarget);
    let idx = $e.index();
    let itemsPerSlide = 4;
    let totalItems = $('.carousel-item').length;

    if (idx >= totalItems-(itemsPerSlide-1)) {
        let it = itemsPerSlide - (totalItems - idx);
        for (let i=0; i<it; i++) {
            // append slides to end
            if (e.direction=="left") {
                $('.carousel-item').eq(i).appendTo('.carousel-inner');
            }
            else {
                $('.carousel-item').eq(0).appendTo('.carousel-inner');
            }
        }
    }
});

 */
// Instantiate the Bootstrap carousel
$('.multi-item-carousel').carousel({
    interval: false
});

// for every slide in carousel, copy the next slide's item in the slide.
// Do the same for the next, next item.
$('.multi-item-carousel .item').each(function(){
    let next = $(this).next();
    if (!next.length) {
        next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));

    if (next.next().length>0) {
        next.next().children(':first-child').clone().appendTo($(this));
    } else {
        $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
    }
});













