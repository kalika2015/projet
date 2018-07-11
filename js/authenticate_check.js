$(document).ready(function() {
    $("#login_form").submit(function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'authenticate_check.php',
            data: $(this).serialize(),
            success: function(data)
            {
                if (data === 'Success') {
                    window.location = 'gestion.php';
                }
                else {
                    alert('Mot de passe ou login invalide');
                }
            }
        });
    });
});