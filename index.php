<!DOCTYPE html>
<html lang="en">
<head>
    <title>Web Design</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/style.css" rel="stylesheet" media="screen,print"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


</head>

<body>

    <div class="column">
        <div class="left">
            <a id ="myIcon" href="index.php"><p><i class="fas fa-film"></i></p></a>
            <p id="show">MOVIES</p>

            <form>
                <input type="text" name="search" placeholder="Search..">
                <i style="cursor: pointer;" class="fas fa-search"></i>
            </form>


          


            <div id="myNav" class="overlay">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav('myNav')">&times;</a>
                <div class="overlay-content">
                  <a href="#">About</a>
                  <a href="#">Services</a>
                  <a href="#">Clients</a>
                  <a href="#">Contact</a>
                </div>
              </div>

              <div id="myNation" class="overlay">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav('myNation')">&times;</a>
                <div class="overlay-content">
                  <a href="#">Japan</a>
                  <a href="#">Chinese</a>
                  <a href="#">VietNamese</a>
                  <a href="#">USA</a>
                </div>
              </div>

            <div class="content">
                <a href="index.php"><p>HOME</p></a>
                <a href="#"><p><span>CATEGORY</span></p></a>
                <a href="#"><p><span onclick="openNav('myNation')">NATION</span></p></a>
                <a href="#"><p><span onclick="openNav('myNav')">MORE</span></p></a>
            </div>
            

            <div class="contact">
                <a id="fb" href="#"><i class="fab fa-facebook-square"></i></a>
                <a id="ins" href="#"><i class="fab fa-instagram"></i></a>
                <a id="square" href="#"><i class="fas fa-envelope-square"></i></a>
            </div>
            
        </div>

        
        <div class="right">

          <div class="slideshow-container">

            <div class="mySlides fade">
              <img src="images\film1.jpg" style="width: 80%" alt="First slide">
            </div>
            
            <div class="mySlides fade">
              <img src="images\film2.jpg" style="width:80%" alt="Second slide">
            </div>
            
            <div class="mySlides fade">
              <img src="images\film2.jpg" style="width:80%" alt="Third slide">
            </div>
            
            </div>
            <br>
            
            <div style="text-align:center">
              <span class="dot"></span> 
              <span class="dot"></span> 
              <span class="dot"></span> 
            </div>
            <hr>

            
            <?php
			require('conn.php');
			
			$sql = "SELECT * FROM movie";
			
			if (isset($_GET['TheLoai'])) {
				$TheLoai = $_GET['TheLoai'];
				$sql = $sql . ' WHERE TheLoai = "' . $TheLoai . '"';
				// select * from product where category = "apple"
      }
      
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
      ?>

				<div class="columnContent">
					<div class="listLeft">
            <a href="#"><img id="imgList" src="<?= $row['image'] ?>" alt=""></a>
          </div>

					  <div class="listR">
						<p id="name">
						  <a href="detail.php" class="Title"><?= $row['TenPhim'] ?></a>
            </p>
						<p id="text-content"><?= $row['QuocGia'] ?></p>
            </div>
  
          </div>

			<?php	
				}
			}
      ?>
      
            <div class="listNoiBat">
                <h4 id="contentNoiBat">Phim Nổi Bật</h4><hr>
            <div>

            
         
        </div>

     



  </div>
</body>


<script>
  function openNav(index) {
    document.getElementById(index).style.width = "20%";
  }
  
  function closeNav(index) {
    document.getElementById(index).style.width = "0%";
  }

  /* slide banner*/

  var slideIndex = 0;
  showSlides();

  function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
  }

</script>



</html>