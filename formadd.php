<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Add product example</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://image.winudf.com/v2/image/Y29tLm13Zy50aGVnaW9pZGlkb25nX2ljb25fdDB4d29jMGI/icon.png?w=170&fakeurl=1" alt="" width="72" height="72">
        <h2>Thêm phim</h2>
      </div>

      <div class="row">
        <div class="col-md order-md-1">
		  <?php
		  $id = $name = $TenPhim = $TheLoai = $DanhGia = $QuocGia = $NgayRaRap = $ThoiLuong = $ChatLuong = $HangSX = $LuotXem = $LinkPhim = $LinkPoster ='';
		  if (isset($_GET['id'])) {
			  // Edit
			  require('conn.php');
			  $sql = 'SELECT * FROM movie WHERE id = ' . $_GET['id'];
			  $result = $conn->query($sql);
			  if ($result->num_rows > 0) {
				  $row = $result->fetch_assoc();
				  $TenPhim = $row["TenPhim"];
          $DanhGia = $row["DanhGia"];
          $QuocGia = $row["QuocGia"];
          $NgayRaRap = $row["NgayRaRap"];
          $ThoiLuong = $row["ThoiLuong"];
          $ChatLuong = $row["ChatLuong"];
          $HangSX = $row["HangSX"];
          $LuotXem = $row["LuotXem"];
          $TheLoai = $row["TheLoai"];
          $LinkPhim = $row["LinkPhim"];
          $LinkPoster = $row["LinkPoster"];
				  $id = $_GET['id'];
			  }
		  }
		  ?>
          <form action="addproduct.php" method="POST" enctype="multipart/form-data">
		    <input type="hidden" name="id" value="<?= $id ?>" required>

            <div class="mb-3">
              <label for="name">Tên phim</label>
              <div class="input-group">
                <input type="text" class="form-control" id="TenPhim" name="TenPhim" value="<?= $TenPhim ?>" required>
              </div>
            </div>

            <div class="mb-3">
              <label for="name">Đánh giá</label>
              <div class="input-group">
                <input type="text" class="form-control" id="DanhGia" name="DanhGia" value="<?= $DanhGia ?>" required>
              </div>
            </div>

            <div class="mb-3">
              <label for="name">Quốc gia</label>
              <div class="input-group">
                <input type="text" class="form-control" id="QuocGia" name="QuocGia" value="<?= $QuocGia ?>" required>
              </div>
            </div>

            <div class="mb-3">
              <label for="name">Ngày ra rạp</label>
              <div class="input-group">
                <input type="text" class="form-control" id="NgayRaRap" name="NgayRaRap" value="<?= $NgayRaRap ?>" required>
              </div>
            </div>

            <div class="mb-3">
              <label for="name">Thời lượng</label>
              <div class="input-group">
                <input type="text" class="form-control" id="ThoiLuong" name="ThoiLuong" value="<?= $ThoiLuong ?>" required>
              </div>
            </div>

            <div class="mb-3">
              <label for="name">Chất lượng</label>
              <div class="input-group">
                <input type="text" class="form-control" id="ChatLuong" name="ChatLuong" value="<?= $ChatLuong ?>" required>
              </div>
            </div>

            <div class="mb-3">
              <label for="name">Hãng sản xuất</label>
              <div class="input-group">
                <input type="text" class="form-control" id="HangSX" name="HangSX" value="<?= $HangSX ?>" required>
              </div>
            </div>

            <div class="mb-3">
              <label for="name">Lượt xem</label>
              <div class="input-group">
                <input type="text" class="form-control" id="LuotXem" name="LuotXem" value="<?= $LuotXem ?>" required>
              </div>
            </div>

            <div class="mb-3">
              <label for="name">Link phim</label>
              <div class="input-group">
                <input type="text" class="form-control" id="LinkPhim" name="LinkPhim" value="<?= $LinkPhim ?>" required>
              </div>
            </div>

            <div class="mb-3">
              <label for="name">Link Poster</label>
              <div class="input-group">
                <input type="text" class="form-control" id="LinkPoster" name="LinkPoster" value="<?= $LinkPoster ?>" required>
              </div>
            </div>


			<div class="mb-3">
              <label for="name">The Loai</label>
              <div class="input-group">
                <select class="input-group" name="TheLoai">
					<option value="apple" <?php if ($TheLoai == 'apple') echo 'selected'; ?> >Apple</option>
					<option value="samsung" <?php if ($TheLoai == 'samsung') echo 'selected'; ?>>Samsung</option>
					<option value="oppo" <?php if ($TheLoai == 'oppo') echo 'selected'; ?>>Oppo</option>
					<option value="nokia" <?php if ($TheLoai == 'nokia') echo 'selected'; ?>>Nokia</option>
				</select>
              </div>
            </div>

			
			<div class="mb-3">
              <label for="fileUpload">Image</label>
              <div class="input-group">
                <input type="file" id="fileUpload" name="fileUpload" required>
              </div>
            </div>
			
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">
				<?php 
				if (isset($_GET['id'])) {
					echo 'Update';
				} else {
					echo 'Add';
				}
				?>
			</button>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2019 MOBILE WORLD</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>
    </div>

  </body>
</html>