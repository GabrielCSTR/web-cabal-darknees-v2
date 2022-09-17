/* ---------------------------------------------
 Contact form
 --------------------------------------------- */
$(document).ready(function(){
    $("#submit_btn").click(function(){

        //get input field values
        var user_name = $('input[name=txtname]').val();
        var user_username = $('input[name=txtusername]').val();
        var user_email = $('input[name=txtemail]').val();
        var user_password = $('input[name=txtpassword]').val();
        var user_rpassword = $('input[name=rpassword]').val();
        var user_chave = $('input[name=txtchave]').val();
        var user_Token = $('input[name=Token]').val();
        var user_TokenForm = $('input[name=_token]').val();
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;
        if (user_name == "") {
            $('input[name=txtname]').css('border-color', '#e41919');
            proceed = false;
        }
		if (user_username == "") {
            $('input[name=txtusername]').css('border-color', '#e41919');
            proceed = false;
        }
        if (user_email == "") {
            $('input[name=txtemail]').css('border-color', '#e41919');
            proceed = false;
        }
		if (user_password == "") {
            $('input[name=txtpassword]').css('border-color', '#e41919');
            proceed = false;
        }
		if (user_rpassword == "") {
            $('input[name=rpassword]').css('border-color', '#e41919');
            proceed = false;
        }
		if (user_chave == "") {
            $('input[name=txtchave]').css('border-color', '#e41919');
            proceed = false;
        }

		if (user_password != user_rpassword) {
			$('input[name=txtpassword]').css('border-color', '#e41919');
            $('input[name=rpassword]').css('border-color', '#e41919');

			output = '<div class="error">Os campos de Senha não estão iguais, verifique sua senha e tente novamente.!</div>';
			$("#result").hide().html(output).slideDown();
            proceed = false;
        }

        //everything looks good! proceed...
        if (proceed) {
            //data to be sent to server
            post_data = {
                '_token': user_TokenForm,
                'userName': user_name,
                'userID': user_username,
                'userEmail': user_email,
                'userPassword': user_password,
                'userRPassword': user_rpassword,
                'userToken': user_Token,
                'userChave': user_chave
            };

            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '/register',
                dataType: 'JSON',
                data: post_data,
                success: function (response) {
                    console.log(response);

                    if (response.status == 'error') {
                        output = '<div class="error">' + response.msg + '</div>';
                    }
                    else
                    {
                        output = '<div class="success">' + response.msg + '</div>';
                    }

                    $("#result").hide().html(output).slideDown();
                },
                error: function (response) {
                    console.log('Error:', response);
                }
            });

            //Ajax post data to server
            // $.post('/register', post_data, function(response){
            //     console.log(response);
            //     alert(response);
            //     //load json data from server and output message
            //     if (response.type == 'error') {
            //         output = '<div class="error">' + response.text + '</div>';
            //     }
            //     else {

            //         output = '<div class="success">' + response.text + '</div>';

            //         //reset values in all input fields
            //         $('#register_form input').val('');
            //     }

            //     $("#result").hide().html(output).slideDown();
            // }, 'json');

        }

        return false;
    });

    //reset previously set border colors and hide all message on .keyup()
    $("#register_form input, #register_form textarea").keyup(function(){
        $("#register_form input, #register_form textarea").css('border-color', '');
        $("#result").slideUp();
    });

});
