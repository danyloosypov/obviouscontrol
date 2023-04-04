<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo" href="index.php"><img src="assets/images/logo1.png" alt="logo" /></a>
    <a class="navbar-brand brand-logo-mini" href="index.php"><img src="assets/images/logo-mini1.png" alt="logo" /></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>
    <ul class="navbar-nav navbar-nav-right">
      <select name=""  class="form-control" id="language-switcher">
        <option value="en">EN</option>
        <option value="ua">UA</option>
      </select>

      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
          <div class="nav-profile-img">
            <img src="assets/images/admin.png" alt="image">
          </div>
          <div class="nav-profile-text">
            <p class="mb-1 text-black">Administrator</p>
          </div>
        </a>
        <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="profileDropdown" data-x-placement="bottom-end">
          <div class="p-3 text-center bg-primary">
            <img class="img-avatar img-avatar48 img-avatar-thumb" src="assets/images/admin.png" alt="">
          </div>
          <div class="p-2">
            <h5 class="dropdown-header text-uppercase pl-2 text-dark"><?php echo $translations['options-btn-title']['content'] ?></h5>
            <a href="index.php?settings" class="dropdown-item py-1 d-flex align-items-center justify-content-between" data-toggle="modal" data-target="#staticBackdrop">
              <span class="menu-title"><?php echo $translations['settings-btn-title']['content'] ?></span>
              <i class="mdi mdi-settings"></i>
            </a>
            <div role="separator" class="dropdown-divider"></div>
            <h5 class="dropdown-header text-uppercase  pl-2 text-dark mt-2"><?php echo $translations['actions-btn-title']['content'] ?></h5>
            <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="logout.php">
              <span><?php echo $translations['logout-btn-title']['content'] ?></span>
              <i class="mdi mdi-logout ml-1"></i>
            </a>
          </div>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>