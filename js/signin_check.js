$(document).ready(function() {
    $("#login_form").submit(function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'signin_check.php',
            data: $(this).serialize(),
            success: function(data)
            {
                if (data === 'Success') {
                    window.location = 'index.php';
                }
                else if(data === 'Login_already_exist'){
                    alert('Login deja existant');
                }
                else if(data === 'Password_duo_failed'){
                    alert('Les deux mot de passe ne sont pas identique');
                }
            }
        });
    });
});