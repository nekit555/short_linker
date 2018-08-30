$("form").submit(function () {
    $.ajax({
        type: "POST",
        url: "shorter.php",
        datatype: 'json',
        data: $(this).serialize()
    }).done(function (response) {
        link = $.parseJSON(response);
        if (link.error != 1) {

            result = location.host + '/' + link.short_link;
            $('.input_link').val("");
            $('.error').text("");

            $('.result-link').html('<a target="_blank" href="' + link.short_link + '">' + result + '</a>');
            $('.result').css('display', 'block');
            
            $("form").trigger("reset");

        } else {

            $('.error').text("Ошибка! Проверьте введенную ссылку и попытайтесь снова.");

        }
        
      })
    .fail(function() {
      $('.error').val('Ошибка! Проверьте внимательно ссылку и попробуйте снова.');
    })
    return false;

  });