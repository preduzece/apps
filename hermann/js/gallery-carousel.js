
$(document).ready(function() {

    items = [];
    function loadCollection() {
        var serviceAPI = "serviceapi/getcollection/3";


        $.ajax({
            type: 'GET',
            url: serviceAPI,
            dataType: 'json',
            success: buildGallery
        });
    }
    /*
     <div class="item active">
     <img src="path/to/image/image1.png"/>
     </div>

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

            img = $('<img/>', {
                src: src
            });
            caption = $('<div>',{
                class: 'carousel-caption'
            }).append(
                $('<h3/>', {
                    text: name
                })
            ).append(
                $('<p/>', {
                    text: description
                })
            );


            $('<div/>', {
                class: item_class
            }).append(img).append(caption).appendTo('.carousel-inner');


            i++;
        });
        console.log(items.length)
    }

    loadCollection();
//#myCarousel > div > div.item.active

    $('#myCarousel > div > div.item.active').on('click', function(){
        console.log('hit');
        //$(this).addClass('big');
    })

});
