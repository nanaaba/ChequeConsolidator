/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//Also add 



$('#loginForm').on('submit', function (e) {
    e.preventDefault();
    var formData = $(this).serialize();

    console.log(formData);

    $('input:submit').attr("disabled", true);
  $('#loaderModal').modal('show');
    $.ajax({
        url: 'index.php?r=login/authenticateuser',
        type: "GET",
        data: formData,
       // dataType:"json",
        success: function (data) {
            console.log(data);
              $('#loaderModal').modal('hide');
            if(data == "1"){
                
                 window.location = "index.php?r=site/dashboard";
            }else{
                $('#alert').show();
                $('#alert').html(data);
            }
          
        },
        error: function (request, status, error) {
            console.log(request.responseText);
        }
    });



});

