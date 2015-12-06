// Create a raster item using the image source url
var userImage = new Raster('image');
var fixedImage = new Raster('img/frames/frame1.png');
// var userImage = new Raster(userImgUrl);
$('#image').remove();

// Move the raster to the center of the view
userImage.position = [300, 158];
fixedImage.position = [300, 157];

var vscale = 600 / userImage.width;
var hscale = 315 / userImage.height;

var scale = 1;
if (vscale > hscale) {
	scale = vscale;
} else {
	scale = hscale;
}

// Scale the raster by 50%
userImage.scale(scale);
// fixedImage.scale(1.1);

function onMouseDrag(event) {
    // Move the raster every time the mouse is dragged
	var hitResult = project.hitTest(event.point);

	if (hitResult.item == userImage) {
    	// userImage.position = event.point;
    }
}

$('#up').click(function(event) {
	userImage.position.y -= 10;
	/*$('#checker').show();
    $('#sender').hide();*/
	view.draw();
});

$('#down').click(function(event) {
	userImage.position.y += 10;
	/*$('#checker').show();
    $('#sender').hide();*/
	view.draw();
});

$('#left').click(function(event) {
	userImage.position.x -= 10;
	/*$('#checker').show();
    $('#sender').hide();*/
	view.draw();
});

$('#right').click(function(event) {
	userImage.position.x += 10;
	/*$('#checker').show();
    $('#sender').hide();*/
	view.draw();
});

$('#rotor').click(function(event) {
	userImage.rotate(90);
	/*$('#checker').show();
    $('#sender').hide();*/
	view.draw();
});

$('#increaser').click(function(event) {
	userImage.scale(1.05);
	/*$('#checker').show();
    $('#sender').hide();*/
	view.draw();
});

$('#decreaser').click(function(event) {
	userImage.scale(0.95);
	/*$('#checker').show();
    $('#sender').hide();*/
	view.draw();
});

$('.frame').click( function(event) {
	fixedImage.source = this.src;
	text.fillColor = this.getAttribute('color');

    if(this.getAttribute('color') == 'white'){
        $('#myMsgText').attr('style', 'color: #fff');
    } else {

        $('#myMsgText').attr('style', 'color: #000');
    }

	// console.log(this.getAttribute('color') );
	/*$('#checker').show();
    $('#sender').hide();*/
});

var text = new PointText(new Point(30, 275));
text.content = 'Volim da mesim jer...';
// text.justification = 'center';
text.fontFamily = 'Lobster';
text.fillColor = 'black';
text.fontWeight = 400;
text.fontSize = 24;

$('#myMsgText').on('keyup', function(event) {

	// text.content = $('#myMsgText').val();
	var msgText = $('#myMsgText').val();
	var words = msgText.split(' ');

    var linesCount =
        msgText.split('\n').length;
	var formatedText = '';
	text.content = '';

    // console.log(event.keyCode);

    if(linesCount == 2){
        $('#myMsgText').bind('keypress', function(e){
           if(e.keyCode == 13) return false;
        });
    } else {
        $('#myMsgText').unbind('keypress');
    }

	for (var i = 0; i < words.length; i++) {

        var wordSize = measureText(words[i], 'Open Sans', 24);

        if (wordSize > 500){
            // words[i] += ' \n';
            $('#myMsgText').popover('show');
            $('#myMsgText').attr(
                'maxlength', msgText.length-1);
            return;
        } else {
            $('#myMsgText').popover('hide');
            $('#myMsgText').attr('maxlength', 70);
        }

        var rowSize = measureText(
            formatedText + words[i], 'Open Sans', 24);

        // console.log(rowSize);

        if (rowSize > 500){

            formatedText += ' \n';
            text.content += formatedText;

            formatedText = words[i] + ' ';
            linesCount++;
        } else {
            formatedText += words[i] + ' ';
        }
	};

    text.content += formatedText;

    // console.log(formatedText.length);
    // console.log(linesCount);

    if(linesCount > 2) {
        // console.log(linesCount);
        $('#myMsgText').attr(
            'maxlength', msgText.length-1);
        return;
    } else {
        $('#myMsgText').attr('maxlength', 70);
    }

    // measureText(formatedText, 'Open Sans', 24);

    view.draw();
});

function measureText(text, font, size){
    var canvas = document.createElement('canvas');
    var context = canvas.getContext('2d');

    context.font = size + "px " + font;
    // return context.measureText(text).width;
    var width = context.measureText(text).width;
    // console.log(width.toFixed(2));
    return width.toFixed(2);
}
