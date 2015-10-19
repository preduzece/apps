
$(document).ready(function() {

    items = [];
    function loadCollection() {
        var serviceAPI = "serviceapi/getcollection/2";


        $.ajax({
            type: 'GET',
            url: serviceAPI,
            dataType: 'json',
            success: buildGallery
        });
    }
    /*
     <article>
     <div class="text-content">
     <h2>Boats by the bay</h2>
     <p>This summer there were, surprise surprise, boats on the bay! Often the sun will shine and when it's partially cloudy we get the 'God' or 'Holy Light' effect. It's pretty cool huh? I wonder what it's pointing to... treasure? Bitcoins?</p>
     <a href="#!" class="button-link read-more">read more</a>
     </div>
     <div class="image-content"><img src="img/image-1.jpg" alt="demo1_1"></div>
     </article>

     background: url(assets/img/slide3blur.jpg);
     background-size: cover;
     -moz-background-size: cover;
     */

    function buildGallery(data) {
        i = 0;
        $.each(data, function (key, val) {
            items.push(val);
            id = 'img_' + i;
            name = val.name;
            description = val.description;
            src = 'uploads/' + val.image;

            // Build Tags for images listing
            item_class = (i==0)?'item active':'item';


            article = $('<article/>');
            content = $('<div/>', {
                class: 'text-content'
            }).append($('<h2/>', {
                text: name
            }))
            content.append($('<p/>', {
                text: description
            }));
            content.append('<a/>', {
                class: 'button-link',
                href: '#',
                html: 'Lire plus'
            })
            article.append(content);
           article.append($('<div/>', {
               class: 'image-content'
           }).append($('<img />', {
               src: src
           }))).appendTo('#gallery');


            i++;
        });
        //console.log(items.length)
    }

    //loadCollection();

   /* $gallery = jQuery('#gallery').slippry({
            // general elements & wrapper
            slippryWrapper: '<div class="sy-box news-slider" />', // wrapper to wrap everything, including pager
            elements: 'article', // elments cointaining slide content

            // options
            adaptiveHeight: false, // height of the sliders adapts to current
            captions: true,

            // pager
            pagerClass: 'news-pager',

            // transitions
            transition: 'horizontal', // fade, horizontal, kenburns, false
            speed: 1200,
            pause: 8000,

            // slideshow
            autoDirection: 'prev',
            refresh: true
    });

    $gallery.reloadSlider();
    $gallery.refresh();
*/
});
