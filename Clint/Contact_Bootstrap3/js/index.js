 $(function(){


    $(".contact-form").submit(function(e){
        var form = this;
        $("input").blur();
        if (form.checkValidity() == false) {
            e.preventDefault();
            e.stopPropagation();
          }
         
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

  
                           
                            //clint side validation
                            var NoError=true;
                        if( $(this).attr('required'))
                            {
                                NoError=    CheckError(this,$(this).val().length > 0 ) ;       
                            }
                        if(NoError && $(this).attr('pattern'))
                            {
                                var patt = new RegExp( $(this).attr('pattern'), "i");
                                NoError=    CheckError(this, patt.test($(this).val()) ) ;    
                            }
                        if( NoError && $(this).attr('required')=="required")
                            {
                                NoError=    CheckError(this,$(this).val().length > 0 ) ;    
                            }
                         

                    });

                    function CheckError(Elmment,Condition)
                    {
                        var Divparent=  $(Elmment).parent()
                        if(Condition)
                         {
                             Divparent.addClass("has-success").removeClass("has-error");
                             Divparent.find(".glyphicon").addClass("glyphicon-ok").removeClass("glyphicon-remove");
                             Divparent.find(".alert-custom").fadeOut(300).remove();
                            return true;
                         }
                       
                        else{
                         Divparent.addClass("has-error").removeClass("has-success");
                         Divparent.find(".glyphicon").addClass("glyphicon-remove").removeClass("glyphicon-ok");
                        var  NOFalert=Divparent.find(".alert-custom").length;
                        
                         if(NOFalert==0)
                             {

                             var   Div_alert=$(`
                                 <div class="alert alert-danger alert-dismissible alert-custom" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <strong>Warning!</strong> Better check yourself, you're not looking too good.
                                  </div>
                                    `);
                                 Divparent.append(Div_alert);
                                 Div_alert.fadeIn(300);
 
                             }
                             return false;
                         
                        }
                      
                    }

                




    });
