<body>
    <header>
      <div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="#">HOTEL 666</a>
      <form class="ml-auto">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <h5 class="nav-link disabled" style="font-style: oblique;"><strong>~ Selamat Datang <?php echo $role ?> ~</strong></h5>
        </li>
        <li class="nav-item">
          <?php if ($role == 'admin') : ?>
          <a class="nav-link" href="<?php echo site_url('admin/admin_room'); ?>">Kamar |</a>

        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('admin/admin_fasilitas'); ?>">Fasilitas |</a>
                    <?php endif ?>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('Auth/logout'); ?>">logout</a>
        </li>
      </ul>
      </form>
    </div>
  </div>
</nav>
</div>
    </header>