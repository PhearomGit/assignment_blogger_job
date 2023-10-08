<?php
    
    include("../connect/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<style>
  .sp1{
    margin-left: 10px;
    cursor: pointer;
    position: relative;
  }
  .sp1>ul{
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
  .sp1:hover ul{
      display: block;
  }
  .sp1>ul>li{
    line-height: 30px;
  }
  .sp1>ul>li>a{
    text-decoration: none;
    color: white;
  }
  .footer{
    position: absolute;
    bottom: 0;
    background-color: red;
  }
</style>
<body>
    <?php include("./component/top-menu.php") ?>


      <!-- slide -->
      <div class="slide1 w-75 mx-auto mt-3 bg-danger">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide"><img src="../img/slide-img1.png" alt=""></div>
              <div class="swiper-slide"><img src="../img/slide-img2.png" alt=""></div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
          </div>
      </div>


      <div class="w-75 mx-auto mt-4">
        <div class="w-25 d-flex justify-content-center align-items-center flex-column" style="float: left;">
            <img src="../img/ads1.gif" class="w-75" alt="">
            <img src="../img/ads2.gif" class="w-75 mt-2" alt="">
        </div>

        <?php
            $str = "SELECT * FROM position pos INNER JOIN company_partner cp ON pos.company_id = cp.company_id";
            $result = mysqli_query($conn,$str);
            while($row = mysqli_fetch_assoc($result)){
        ?>
        <div class="d-flex border border-1 rounded p-3 w-75 mt-2" style="cursor: pointer;float: right;">
          <img src="../img/<?php echo $row['logo']; ?>" class="img-fluid w-25" alt="">
          <div class="w-50 px-3">
              <div class="fs-6 sp2"><a href="Job_detail.php?position_id=<?php echo $row['position_id']; ?>" style="display:block;color:green;"><?php echo $row['position_name']; ?></a></div>
              <div><small><?php echo $row['company_name']; ?></small></div>
              <div class="d-flex align-items-center">
                  <i class="fas fa-calendar"></i>
                  <p class="ms-2 p-0 m-0"><?php echo $row['dateTime']; ?></p>
              </div>
              <div class="d-flex align-items-center">
                <i class="fa-solid fa-dollar-sign" style="color: #ffce1f;"></i>
                <p class="ms-1 p-0 m-0 fs-4 text-success"><?php echo $row['salary']; ?></p>
            </div>
          </div>
      </div>
      <?php } ?>
      </div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
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