<?php
    include("../connect/connect.php");
    $position_id = $_GET['position_id'];
    $str = "SELECT * FROM position pos INNER JOIN company_partner cp ON pos.company_id = cp.company_id WHERE pos.position_id = $position_id";
    $result = mysqli_query($conn,$str);
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/user.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<style>
  .sp1 {
    margin-left: 10px;
    cursor: pointer;
    position: relative;
  }

  .sp1>ul {
    display: none;
    list-style: none;
    position: absolute;
    margin: 0;
    padding: 0;
    top: 100%;
    background-color: gray;
    padding: 10px;
    border-radius: 5px;
  }

  .sp1:hover ul {
    display: block;
  }

  .sp1>ul>li {
    line-height: 30px;
  }

  .sp1>ul>li>a {
    text-decoration: none;
    color: white;
  }
</style>

<body>
  <?php include("./component/top-menu.php") ?>

  <div class="w-75 mx-auto d-flex justify-content-center align-items-center py-3">
    <img src="../img/<?php echo $row['logo']; ?>" class="img-fluid" style="width: 15%;" alt="">
    <div class="ms-4">
      <h1 class="fs-3"><?php echo $row['company_name']; ?></h1>
      <h3 class="text-start text-danger fs-5"><?php echo $row['position_name']; ?></h3>
    </div>
  </div>
  <div class="bg-danger" style="height: 1vh;">.</div>

  <div class="w-50 mt-5 mx-auto d-flex flex-column">
    <div class="d-flex justify-content-between p-3 bg-danger">
      <h5 class="m-0 p-0 text-light">Announcement Description</h5>
      <a href="#" style="text-decoration: none; color:rgb(47, 255, 0);cursor: pointer;">Apply Now>></a>
    </div>

    <p class="p-0 m-0 my-3" style="text-align: justify;"><?php echo $row['description']; ?></p>

      <div class="p-3 bg-danger">
        <h5 class="m-0 p-0 text-light">Announcement Positions</h5>
      </div>
      <ul class="mt-3" style="">
        <li>LOCATION : <?php echo $row['location']; ?></li>
        <li>SALARY : <?php echo $row['salary']; ?></li>
        <li>Salary: $3,000 $4,000 (based qualification)</li>
      </ul>

      <div class="p-3 bg-danger">
        <h5 class="m-0 p-0 text-light">Requirement</h5>
      </div>
      <ul class="mt-3" style="">
      <?php
          $strrequierment = "SELECT * FROM requirement rt INNER JOIN position pos ON pos.position_id = rt.position_id WHERE pos.position_id = $position_id";
          $resultRequirement = mysqli_query($conn,$strrequierment);
          while($rowRequierment = mysqli_fetch_assoc($resultRequirement)){
      ?>
        <li><?php echo $rowRequierment['description']; ?></li>
        <?php } ?>
      </ul>
      <div class="p-3 bg-danger">
        <h5 class="m-0 p-0 text-light">Benift</h5>
      </div>
      <ul class="mt-3" style="">
      <?php
          $strBenefit = "SELECT * FROM job_benefit jb INNER JOIN position pos ON jb.position_id = pos.position_id WHERE pos.position_id = $position_id";
          $resultBenefit = mysqli_query($conn,$strBenefit);
          while($rowBenefit = mysqli_fetch_assoc($resultBenefit)){
      ?>
        <li><?php echo $rowBenefit['description']; ?></li>
        <?php } ?>
      </ul>
  </div>





  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
    var swiper = new Swiper(".slide1>.mySwiper", {
      pagination: {
        el: ".swiper-pagination",
        type: "progressbar",
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      autoplay: {
        delay: 2500,
        disableOnInteraction: true,
      },
    });
  </script>
</body>

</html>