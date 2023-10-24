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
          <a class="nav-link" href="../html/main.php">Home <span class="sr-only">(current)</span></a>
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

      
<?php
// Get the current script filename
$currentScript = $_SERVER['SCRIPT_FILENAME'];

// Check if the script filename is "artists.php"
if (basename($currentScript) === 'artists.php') {
    // The current URL corresponds to artists.php
    include('navbar_search_artist.php');
} else {
    // The current URL is not artists.php
    include('navbar_search.php');
}
?>

    <a href="../html/signup.php" class="btn btn-primary ml-4">Login</a>


  </div>
</nav>