$(document).ready(function() {

    $('#cargo').keyup(function() {
      var query = $(this).val();

      if (query != '') {
        $.ajax({
          url: "../php/buscador.php",
          method: "POST",
          data: {query:query},

          success: function(data) {
            $('#cargo_list').fadeIn();
            $('#cargo_list').html(data);

          }
        });
      } else {
        $('#cargo_list').fadeOut();
        $('#cargo_list').html("");
      }
    });
    $(document).on('click', 'li', function(){
      $('#cargo').val($(this).text());
      $('#cargo_list').fadeOut();
    });
  });

