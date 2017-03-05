$(document).ready(function(){
   $('textarea').autogrow();

	$('.owl-carousel').owlCarousel({
		navigation: false,
		singleItem: true,
		autoPlay: true,
		responsive: true
	});
});



$(document).ready(function(){

    /**
     * This object controls the nav bar. Implement the add and remove
     * action over the elements of the nav bar that we want to change.
     *
     * @type {{flagAdd: boolean, elements: string[], add: Function, remove: Function}}
     */
    var myNavBar = {

        flagAdd: true,

        elements: [],

        init: function (elements) {
            this.elements = elements;
        },

        add : function() {
            if(this.flagAdd) {
                for(var i=0; i < this.elements.length; i++) {
                    document.getElementById(this.elements[i]).className += " scroll";
                }
                this.flagAdd = false;
            }
        },

        remove: function() {
            for(var i=0; i < this.elements.length; i++) {
                document.getElementById(this.elements[i]).className =
                        document.getElementById(this.elements[i]).className.replace( /(?:^|\s)scroll(?!\S)/g , '' );
            }
            this.flagAdd = true;
        }

    };

    /**
     * Init the object. Pass the object the array of elements
     * that we want to change when the scroll goes down
     */
    myNavBar.init(  [
        "header"
    ]);

    /**
     * Function that manage the direction
     * of the scroll
     */
    function offSetManager(){

        var yOffset = 50;
        var currYOffSet = window.pageYOffset;

        if(yOffset < currYOffSet) {
            myNavBar.add();
        }
        else if(currYOffSet < yOffset){
            myNavBar.remove();
        }

    }

    /**
     * bind to the document scroll detection
     */
    window.onscroll = function(e) {
        offSetManager();
    }

    /**
     * We have to do a first detectation of offset because the page
     * could be load with scroll down set.
     */
    offSetManager();
});


// initialize Masonry for the news page
var $newsMasonryContainer = $( '.news-masonry' ).masonry( { 
    itemSelector: '.news-block'
});
// layout Masonry again after all images have loaded
$newsMasonryContainer.imagesLoaded(function () {
    $newsMasonryContainer.masonry();
});


// initialize Masonry
var $masonryContainer = $( '.masonry' ).masonry( { 
    itemSelector: '.partner'
});
// layout Masonry again after all images have loaded
$masonryContainer.imagesLoaded(function () {
    $masonryContainer.masonry();
});