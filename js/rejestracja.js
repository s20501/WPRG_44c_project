$(document).ready(function(){

    $("#submit").click(function()
    {
        if($("#haslo1").val() == $("#haslo2").val()
          && $("#haslo1").val() != "" && $("#haslo2").val() != "" && $("#login").val() != ""
        && $("#haslo1").val().length >= 6 && $("#login").val().length <= 14 && $("#login").val().length >=3)
        {
            $("#form").submit();
        }
        else
        {
            $("#error").text("Bład przy wypełnianiu");
        }
    });


});