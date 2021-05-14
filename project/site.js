$(function(){
    $(".dropdown-item").click(function(){
        var icon_text= $(this).html();
        $(".dropdown-toggle").html(icon_text)
    })
})