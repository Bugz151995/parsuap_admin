<?php  
$uri = service('uri');
$page = $uri->getSegment(1);
?>
<div class="app-sidebar sidebar-shadow bg-night-sky sidebar-text-light">
  <!-- HEADER BRAND -->
  <div class="app-header__logo">
    <div class="logo-src"></div>
    <div class="header__pane ml-auto">
      <div>
        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </button>
      </div>
    </div>
  </div>
  <div class="app-header__mobile-menu">
    <div>
      <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
      </button>
    </div>
  </div>
  <div class="app-header__menu">
    <span>
      <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
        <span class="btn-icon-wrapper">
          <i class="fa fa-ellipsis-v fa-w-6"></i>
        </span>
      </button>
    </span>
  </div>  

  <div class="scrollbar-sidebar">
    <div class="app-sidebar__inner">
      <ul class="vertical-nav-menu">
        <li class="app-sidebar__heading">Menu</li>
          <li>
            <a href="<?= site_url()?>" <?= ($page == '') ? 'class="mm-active"' : '' ?>>
              <i class="metismenu-icon pe-7s-home"></i>
              Dashboard
            </a>
            <a href="<?= site_url()?>announcements" <?= ($page == 'announcements') ? 'class="mm-active"' : '' ?>>
              <i class="metismenu-icon pe-7s-speaker"></i>
              Announcements
            </a>
            <a href="<?= site_url()?>careers" <?= ($page == 'careers') ? 'class="mm-active"' : '' ?>>
              <i class="metismenu-icon pe-7s-portfolio"></i>
              Careers
            </a>
            <a href="<?= site_url()?>events" <?= ($page == 'events') ? 'class="mm-active"' : '' ?>>
              <i class="metismenu-icon pe-7s-date"></i>
              Events
            </a>
          </li>
          
        <li class="app-sidebar__heading">User Management</li>
          <li>
            <a href="<?= site_url()?>request" <?= ($page == 'request') ? 'class="mm-active"' : '' ?>>
              <i class="metismenu-icon pe-7s-check"></i>
              User Requests
            </a>
          </li>
          <li>
            <a href="<?= site_url()?>users" <?= ($page == 'users') ? 'class="mm-active"' : '' ?>>
              <i class="metismenu-icon pe-7s-users"></i>
              User List
            </a>
          </li>
        
        <li class="app-sidebar__heading">Archive Management</li>
          <li>
            <a href="<?= site_url()?>archives" <?= ($page == 'archives') ? 'class="mm-active"' : '' ?>>
              <i class="metismenu-icon pe-7s-box1"></i>
              Archive List
            </a>
          </li>

        <li class="app-sidebar__heading">Forum Management</li>
          <li>
            <a href="<?= site_url()?>threads" <?= ($page == 'threads') ? 'class="mm-active"' : '' ?>>
              <i class="metismenu-icon pe-7s-comment">
              </i>Forum Threads
            </a>
          </li>
      </ul>
    </div>
  </div>
</div>    