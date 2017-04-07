(function () {
    'use strict';

    window.addEventListener('DOMContentLoaded', function () {

        // Small screen menu open
        document.getElementsByClassName('menu-open')[0]
            .addEventListener('click', function(e) {
                document.getElementsByClassName('main-nav-wrapper')[0].classList.add('open');
            });


        // Small screen menu close 
        document.getElementsByClassName('menu-close')[0]
            .addEventListener('click', function(e) {
                e.preventDefault();
                document.getElementsByClassName('main-nav-wrapper')[0].classList.remove('open');
            });

        // Disable the google map iframe from capturing scroll until clicked.
        document.addEventListener('click', function() {
            var map = document.getElementById('google-map');

            if(map == undefined) {
                return true;
            }

            document.getElementById('google-map').classList.remove('scrolloff');
        });

        // Disable the google map iframe from capturing scroll until clicked.
        document.addEventListener('click', function() {
            var map = document.getElementById('google-map');

            if(map == undefined) {
                return true;
            }

            document.getElementById('google-map').classList.remove('scrolloff');
        });

        // Toggle header class if scrolled
        if ( document.body.scrollTop !== 0 ) {
            document.getElementsByClassName('header-wrapper')[0].classList.remove('at-top');
        } else {
            document.getElementsByClassName('header-wrapper')[0].classList.add('at-top');
        }

        iosCusomize();
    });

    //window.addEventListener('resize', setContentTopMargin);
    document.addEventListener( 'click', closeMenu);
    document.addEventListener( 'touchstart', closeMenu);

    /**
     *  Close the the main nav if clicking or tapping outside of the nav on small screens.
     *
     * @param event
     * @returns {boolean}
     */
    function closeMenu(event)
    {
        //var container = document.getElementById( 'site-navigation' );
        var container = document.getElementById('site-navigation');
        
        if ( ! container ) {
            return false;
        }
        
        if( event.target === container || isChild( event.target, container )) {
            return false;
        }

        document.getElementsByClassName('main-nav-wrapper')[0].classList.remove('open');
    }


    /**
     * iOS-specific customizations.
     */
    function iosCusomize() {
        var iOS = /iPad|iPhone|iPod|CriOS/.test(navigator.userAgent) && !window.MSStream;

        if (!iOS) {
            return;
        }

        // Change fixed background images from fixed to inherit.
        var fixedBgs = document.getElementsByClassName('fixed');

        if (fixedBgs !== undefined) {
            for(var i = 0; i < fixedBgs.length; ++i) {
                fixedBgs[i].style.backgroundAttachment = 'inherit';
            }
        }

    }

})();


/**
 * Add enough margin to the content to push it below the header
 * since the header is fixed.
 */
function setContentTopMargin()
{
    document.getElementById('content').style.marginTop =
        document.getElementById('masthead').clientHeight + 'px';
}


/**
 * Check if an element is within the window viewport.
 */
function inViewport(element, padding)
{
    if(element == undefined) {
        return false;
    }

    padding = padding || 0;
    var boundingBox = element.getBoundingClientRect();
    var windowHeight = document.documentElement.clientHeight;
    var topLimit = padding;
    var bottomLimit = windowHeight - padding;

    if ( ( boundingBox.top > topLimit || boundingBox.bottom > topLimit ) &&
        ( boundingBox.top < bottomLimit || boundingBox.bottom < bottomLimit ) ) {
        return true;
    }

}


/**
 * Is the given node a child of the supplied parent?
 *
 * @param node
 * @param parent
 * @returns {boolean}
 */
function isChild(node, parent)
{
    while ( node.parentNode !== null ) {
        if ( node === parent ) {
            return true;
        }

        node = node.parentNode;
    }

    return false;
}