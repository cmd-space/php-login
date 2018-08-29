$(function() {
    $('.btn-dark').click(function(e) {
        e.preventDefault();
        // grab creds from input fields
        var email = $('input#email').val();
        var password = $('input#password').val();

        // disable button until call is complete
        $('.btn-dark').prop('disabled', true);

        // make AJAX call
        $.post(
            "./login.php",
            {
                email: email,
                password: password
            },
            function(data) {
                if (data == 'no entry') {
                    window.location.replace('/index.php?message=Your email/password combination did not match our records.');
                } else {
                    window.location.replace('/main.php');
                }
            }
        );
        return false;
    })
})