$('.teaser').click(function(){
    $(this).hide();
    $(this).next().show();
});

$('.fulldescription').click(function(){
    $(this).hide();
    $(this).prev().show();
});

$('.teaser').mouseover(function() {
    $(this.children).css({"color": "blue", "text-decoration": "underline"});
});

$('.teaser').mouseout(function() {
    $(".dots").css({"color": "black" , "text-decoration": "none"});
});

$('.fulldescription').mouseover(function() {
    $(this.children).css({"color": "blue", "text-decoration": "underline"});
});

$('.fulldescription').mouseout(function() {
    $(".arrow").css({"color": "black" , "text-decoration": "none"});
});