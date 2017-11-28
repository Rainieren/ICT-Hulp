$(document).ready(function() {

    $("#showEffect").fadeIn(550);
    $('.btn-popover').popover({
        trigger: 'focus'
    })

});

tinymce.init({
    selector: '#custom-textarea',
    plugins: 'image imagetools code textcolor autolink codesample wordcount'
});