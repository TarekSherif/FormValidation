      // Example starter JavaScript for disabling form submissions if there are invalid fields



$(function(){

    $("#needs-validation").submit(function(e){
        var form = this;
        if (form.checkValidity() == false) {
            e.preventDefault();
            e.stopPropagation();
          }
          $(form).addClass("was-validated");
    });
                $(":input[placeholder!='']")
                     .focus(function () {

                         if ($(this).attr("placeholder") != "")
                         {
                             $(this).attr("title", $(this).attr("placeholder"));
                            $(this).attr("placeholder", "")
                         }


                    })
                     .blur(function () {
                            // show placeholder
                           if ($(this).val() == "")
                            { $(this).attr("placeholder", $(this).attr("title")); }

                        })
                           
    });
