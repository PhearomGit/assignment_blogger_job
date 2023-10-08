<!-- header -->
<nav class="navbar navbar-expand-lg bg-body-tertiary shadow position-sticky top-0 z-3">
    <div class="container-fluid top-menu">
        <img src="../img/logo.png" alt="">
      <div class="collapse navbar-collapse d-flex" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 flex-grow-1 justify-content-center">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../user/">Home</a>
          </li>
          <li class="nav-item d-flex align-items-center">
            <i class="fa-solid fa-city fa-beat ms-3"></i>
            <a class="nav-link" href="#">CompanyList</a>
          </li>
          <li class="nav-item d-flex align-items-center">
            <i class="fas fa-location fa-spin ms-2 fs-4"></i>
            <a class="nav-link" aria-current="page" href="#">Location</a>
          </li>
          <li class="sp1 nav-item d-flex align-items-center">
            <div class="d-flex align-items-center">
              <a>Job Category</a>
              <i class="fa-solid fa-chevron-down ms-1"></i>
            </div>
            <ul>
              <?php
              $selectCategory = "SELECT * FROM `job_category`";
              $resultCategory = mysqli_query($conn,$selectCategory);
              while($rowCategory = mysqli_fetch_assoc($resultCategory)){
          ?>
              <li><a href="./listByCateg.php?category_name=<?php echo $rowCategory['category_name']; ?>"><?php echo $rowCategory['category_name']; ?></a></li>
              <?php } ?>
            </ul>
          </li>
        </ul>
        <form class="d-flex" role="search" method="post" action="../user/userSearchPage.php">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="position_name">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <div class="welcome z-2 d-flex flex-column justify-content-center align-items-center">
        <h1 class="text-white z-3" data-aos="fade-up" data-aos-duration="3000">Welcome to Job Website</h1>
        <div class="d-flex align-items-center mt-4" data-aos="fade-down" data-aos-duration="3000">
            <i class="fa-brands fa-github fa-bounce fs-2" style="color: #ffbb00;"></i>
            <i class="fa-brands fa-youtube fa-shake fs-2 mx-3" style="color: #ff7300;"></i>
            <i class="fa-brands fa-facebook-f fa-beat fs-2" style="color: #ff00ae;"></i>
            <i class="fa-brands fa-twitter fa-beat-fade mx-3 fs-2" style="color: #d4ff00;"></i>
        </div>
  </div>