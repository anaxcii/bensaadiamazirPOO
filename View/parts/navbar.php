<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand">MotoShop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <?php
                if (isset($_SESSION) && count($_SESSION) > 0) {
                    echo '<li class="nav-item"><a class="nav-link" href="View/user/logout.php">Déconnexion</a></li>';
                }
                ?>
            </li>
        </ul>
    </div>
</nav>
