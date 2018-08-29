<?php
    require 'start.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Welcome Machine</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php require('partials/nav.php');
    if (!empty($_GET['message'])) {
        ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong><?= $_GET['message'] ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
<?php
    }
?>

      <!-- Login/Sign up form -->
      <div class="form-group">
          <form action="" class="form-signin">
              <img class="mb-4 img-fluid" src="img/presbyterian-logo-600.jpg" alt="Presbyterian Logo">
              <h1 class="h3 mb-3 font-weight-normal">Please sign in/sign up</h1>
              <label for="email">Email address</label>
              <input type="email"
                     class="form-control" name="email" id="email" placeholder="Enter your email address">
              <label for="password">Password</label>
              <input type="password"
                     class="form-control" name="password" id="password" placeholder="Enter your password">
              <button type="submit" class="btn btn-dark btn-block btn-lg">Login</button>
          </form>
      </div>
      <div id="success"></div>
    </div>
  </body>
</html>