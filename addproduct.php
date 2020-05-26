<?php
	$TenPhim = $_POST["TenPhim"];
	$DanhGia = $_POST["DanhGia"];
	$QuocGia = $_POST["QuocGia"];
	$NgayRaRap = $_POST["NgayRaRap"];
	$ThoiLuong = $_POST["ThoiLuong"];
	$ChatLuong = $_POST["ChatLuong"];
	$HangSX = $_POST["HangSX"];
	$LuotXem = $_POST["LuotXem"];
	$TheLoai = $_POST["TheLoai"];
	$LinkPhim = $_POST["LinkPhim"];
	$LinkPoster = $_POST["LinkPoster"];

	
	
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
	
	move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file);
	
	require('conn.php');
	
	if (empty($_POST['id'])) {
		// Add
		$sql = "INSERT INTO movie (TenPhim, DanhGia, QuocGia, NgayRaRap, ThoiLuong, ChatLuong, HangSX, LuotXem, TheLoai, LinkPhim, LinkPoster, image) 
		VALUES ('$TenPhim', '$DanhGia', '$QuocGia', '$NgayRaRap', '$ThoiLuong', '$ChatLuong', '$HangSX', '$LuotXem', '$TheLoai', '$LinkPhim', '$LinkPoster', '$target_file')";
	} else {
		$id = $_POST['id'];
		// Update
		$sql = "UPDATE movie
				SET TenPhim = '$TenPhim', DanhGia = '$DanhGia', QuocGia = '$QuocGia', NgayRaRap = '$NgayRaRap', ThoiLuong = '$ThoiLuong',
				ChatLuong = '$ChatLuong', HangSX = '$HangSX', LuotXem = '$LuotXem', TheLoai = '$TheLoai', 
				LinkPhim = '$LinkPhim', LinkPoster = '$LinkPoster', image = '$target_file'
				WHERE id = $id ";
	}
	
	if ($conn->query($sql) === TRUE) {
		header('location: list.php');
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>