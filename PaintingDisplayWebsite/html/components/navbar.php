<style>
  nav {
    background-color: #333333;
  }
  nav.navbar .nav-link {
    color: #f5f5f5 !important;
  }
  nav.navbar .nav-item.active .nav-link {
    color: #f5f5f5 !important; /* Reset font color for active link */
  }
</style>

<nav class="navbar navbar-expand-lg navbar-light">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="../../index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../html/artists.php">Artists <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../html/paintings.php">Paintings <span class="sr-only">(current)</span></a>
        </li>
        <li class ="nav-item">
            <a class="nav-link" href="../html/contact.php">Contact <span class="sr-only">(current)</span></a>
        </li>
      </ul>

      
      <!-- search button -->
      <?php include('navbar_search.php'); ?>

  </div>
</nav>