
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

    if ($(window).width() > 999){
        console.log('>999');
    $('#logo-show').css({'display': 'none'});
    $(window).scroll(function () {

        let headerH = $('.header-container').outerHeight(true);
        //  console.log(headerH);
//this will calculate header's full height, with borders, margins, paddings
        let scrollVal = $(this).scrollTop();
        if (scrollVal >= headerH) {
            console.log('scroll');
            $('#home-banner').css({'position': 'fixed', 'top': '0px'});
            $('#logo-show').css({'display': 'block'});
            $('.dropdown-menu').css({'top': '90%'});
        }

        else {
            console.log('else');
            $('#home-banner').css({'position': 'static', 'top': '0px'});
            $('#logo-show').css({'display': 'none'});
        }


    });

} else if ($(window).width() <= 998){
        console.log('<=998');
        $('.header-container').css({'display': 'none'});
        $('#home-banner').css({'position': 'fixed', 'top': '0px'});
        $('#logo-show').css({'display': 'block'});
        $('.dropdown-menu').css({'top': '90%'});
    }

});
//////////NAVBAR MIX ENTRE AFFICHAGE MOBILE ET DESKTOP SUIVANT LES PAGES

////////////////////////////////////////////////////////////////////////
$('.simple-nav-mobile').css({'display': 'none'});
let icones = document.getElementById('iconesJS');
let nav2SpecialMobile = document.getElementsByClassName('simple-nav-mobile');
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
    ||
    window.location.href === "https://127.0.0.1:8000/conditions/generales"
    && $(window).width() > 992
) {
    $('.hideHeaderJS').css({'display': 'none'});
    $('#search-formJS').replaceWith(icones);
    $('.simple-nav-mobile').css({'display': 'none'});

}
if ($(window).width() < 768
&&
    window.location.href === "https://127.0.0.1:8000/qui/sommes/nous"
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
    ||
    window.location.href === "https://127.0.0.1:8000/conditions/generales"

){
    $('.simple-nav-mobile').css({'display': 'block'});
}

//////////////////////////////////////////////////////////////////


/////////////////////////////////////////////////////////////////////


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

    $('#nouveautes').owlCarousel({
     items: 4,
        loop: true,
        autoplay: true,
        responsiveClass:true,
        responsive: {
         0: {
             items: 1
         },
          768: {
             items: 2,
              margin: 30
          },
          980: {
             items: 3,
              margin: 30
          },
            1240: {
                items: 4,
                margin: 30
            }
        }
    });


$('#indispensables').owlCarousel({
    items: 4,
    loop: true,
    autoplay: true,
    responsiveClass:true,
    responsive: {
        0: {
            items: 1
        },
        768: {
            items: 2,
            margin: 30
        },
        980: {
            items: 3,
            margin: 30
        },
        1240: {
            items: 4,
            margin: 5
        }
    }
});
$('#automne').owlCarousel({
    items: 4,
    autoplay: true,
    responsiveClass:true,
    responsive: {
        0: {
            items: 1
        },
        768: {
            items: 2,
            margin: 30
        },
        980: {
            items: 3,
            margin: 30
        },
        1240: {
            items: 4,
            margin: 5
        }
    }
});

$('#collection').owlCarousel({
    items: 1,
    margin: 5,
    loop: true,
    autoplay: true,
})


// Refresh de la page au click du selecteur de taille


let sizeContainer = document.getElementsByClassName('size-wrapper');

document.querySelectorAll('a.js-link-size').forEach(function (link) {
    Object.keys(sizeContainer).forEach(singleElement => {

        link.addEventListener('click', function refreshSize(event) {
                event.preventDefault();
                const url = this.href;
                fetch(url).then(function (response){
                location.reload();
                });
        });
    });
});
// function selectElement(){
//
//
//     let size = document.querySelectorAll('#js-size');
//
//     size.addEventListener("click", function(){
//         size.className = 'select-size';
//         size.classList.add('select-size');
//
//
//    })
// }
//
//
// let size = document.getElementsByClassName('size-border');
//
// document.querySelectorAll('a.js-link-size').forEach(function (linkSize) {
//
//
//     Object.keys(size).sort(linkElement => {
//
//         linkSize.addEventListener('click', function Size(event) {
//
//
//             event.preventDefault();
//             const url = this.href;
//             fetch(url).then(function (response) {
//
//
//                 console.log(response);
//
//                 if (size[linkElement].classList.contains('size-blue')) {
//                     size[linkElement].classList.add('border-size');
//                     size[linkElement].classList.remove('size-blue');
//                     setTimeout(unlikeRemover, 250);
//
//
//                 } else {
//                     size[linkElement].classList.add('size-blue');
//                     size[linkElement].classList.remove('border-size');
//                 }
//
//
//                 function unlikeRemover() {
//                     size[linkElement].classList.remove('border-size');
//                 }
//
//             });
//         });
//     });
// });



//  function onClickBtnSize(event) {
//      event.preventDefault();
//
//  }
// //     const url = this.href
// //
// //     let size = this.getElementsByClassName('size-border')
// //     console.log(size)
// //     fetch(url).then(function (response) {
// //
// //         console.log(response)
// //         if (size.classList.contains("size-border")) {
// //             size.classList.add("size-blue")
// //             size.classList.remove("size-border")
// //         } else if (size.classList.contains("size-blue")) {
// //
// //             size.classList.remove("size-blue")
// //             size.classList.add("size-border")
// //         }
// //     })
// //
// //
// // }
// //
// //
// document.querySelectorAll("#size-link").forEach(function (sizelink) {
//
//     sizelink.addEventListener('click', onClickBtnSize);
//
//
// })
//


