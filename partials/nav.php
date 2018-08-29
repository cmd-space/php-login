<nav class="navbar navbar-expand navbar-light bg-light">
    <div class="nav navbar-nav">
        <a class="nav-item nav-link active" href="#">Home <?php if ($_SERVER['REQUEST_URI'] == '/index.php') { ?> <span class="sr-only">(current)</span> <?php } ?></a>
        <?php if ($_SERVER['REQUEST_URI'] == '/main.php') { ?><a class="nav-item nav-link" href="logout.php">Log out</a> <?php } ?>
    </div>
</nav>
