<!-- ======================
  Панель навигации
 =======================-->

<ul class="nav">
   <li class="nav-item  <?php if($page == "home"){ echo 'active'; } ?>">
      <a class="nav-link" href="/admin">
          <i class="now-ui-icons design_app"></i>
          <p>Home</p>
      </a>
    </li>
  <li class="nav-item <?php if($page == "users"){ echo 'active'; } ?>">
    <a class="nav-link" href="/admin/users.php">
      <i class="now-ui-icons users_single-02"></i>
      <p>Users</p>
    </a>
  </li>
  <li class="nav-item <?php if($page == "request_info"){ echo 'active'; } ?>">
      <a class="nav-link" href="/admin/request_info.php">
          <i class="now-ui-icons ui-1_email-85"></i>
          <p>Request information</p>
      </a>
  </li>
  <li class="nav-item <?php if($page == "destinations"){ echo 'active'; } ?>">
    <a class="nav-link" href="/admin/destinations.php">
      <i class="now-ui-icons location_map-big"></i>
      <p>Destination</p>
    </a>
  </li>
  <li class="nav-item <?php if($page == "categories"){ echo 'active'; } ?>">
    <a class="nav-link" href="/admin/categories.php">
      <i class="now-ui-icons design_bullet-list-67"></i>
      <p>Categories</p>
    </a>
  </li>
  <li class="nav-item <?php if($page == "cruises"){ echo 'active'; } ?>">
    <a class="nav-link" href="/admin/cruises.php">
      <i class="now-ui-icons location_world"></i>
      <p>Cruises</p>
    </a>
  </li>
</ul>