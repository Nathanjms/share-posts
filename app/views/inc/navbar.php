<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container">
      <a class="navbar-brand" href="<?= URLROUTE; ?>"><?= SITENAME; ?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?= URLROUTE; ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= URLROUTE; ?>/pages/about">About</a>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto mb-2 mb-md-0">
          <?php if(isLoggedIn()) : ?>
            <li class="nav-item">
              <span class="nav-link">Welcome <?= $_SESSION['user_name']; ?></span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= URLROUTE; ?>/users/logout">Log Out</a>
            </li>
          <?php else : ?>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="<?= URLROUTE; ?>/users/register">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= URLROUTE; ?>/users/login">Login</a>
            </li>
            <?php endif; ?>
        </ul>
      </div>
    </div>
</nav>