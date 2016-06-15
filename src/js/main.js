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

        setContentTopMargin();
    });

    window.addEventListener('resize', setContentTopMargin);
    document.addEventListener( 'click', closeMenu);
    document.addEventListener( 'touchstart', closeMenu);



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
    function inViewport(element)
    {
        if(element == undefined) {
            return false;
        }

        var boundingBox = element.getBoundingClientRect();
        var windowHeight = document.documentElement.clientHeight;

        if(boundingBox.bottom < windowHeight && boundingBox.top > 0) {
            return true;
        }
    }


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

})();
