<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<style>
    body{
        padding-top: 50px;
    }
    table{

        text-align: center;
    }
    td{
        padding: 10px;
    }
    tr.item{
        border-top: 1px solid #5e5e5e;
        border-bottom: 1px solid #5e5e5e;
    }

    tr.item:hover{
        background-color: #d9edf7;
    }

    tr.item td{
        min-width: 150px;
    }

    tr.header{
        font-weight: bold;
    }

    a{
        text-decoration: none;
    }
    a:hover{
        color: deeppink;
        font-weight: bold;
    }
</style>


<script>
    $(document).ready(function () {


        $(".delete").click(function () {

            $('#myModal').modal({
                backdrop: 'static',
                keyboard: false
            });

        });


    });
</script>


<table cellpadding="10" cellspacing="10" border="0" style="border-collapse: collapse; margin: auto">

    <tr class="control" style="text-align: left; font-weight: bold; font-size: 20px">
        <td colspan="5">
            <a href="formadd.php">Thêm sản phẩm</a>
        </td>
    </tr>
    <tr class="header">
        <td>Image</td>
        <td>Name</td>
        <td>QuocGia</td>
        <td>NgayRaRap</td>
        <td>ThoiLuong</td>
        <td>TheLoai</td>
        <td>LinkPhim</td>
        <td>Action</td>
    </tr>
	<?php
	require('conn.php');
	$sql = "SELECT * FROM movie";
	$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
	?>
				<tr class="item">
					<td><img src="<?= $row['image'] ?>" style="max-height: 80px"></td>
					<td><?= $row["TenPhim"] ?></td>
					<td><?= $row["QuocGia"] ?></td>
					<td><?= $row["NgayRaRap"] ?></td>
                    <td><?= $row["ThoiLuong"] ?></td>
                    <td><?= $row["TheLoai"] ?></td>
                    <td><?= $row["LinkPhim"] ?></td>
					<td><a href="formadd.php?id=<?= $row['id'] ?>">Edit</a> | <a href="delete.php?id=<?= $row['id'] ?>" class="delete">Delete</a></td>
				</tr>
	<?php 	}
		}
	?>
    <tr class="control" style="text-align: right; font-weight: bold; font-size: 17px">
        <td colspan="5">
            <p>Số lượng sản phẩm: <?= $result->num_rows ?></p>
        </td>
    </tr>
</table>


<!-- Delete Confirm Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </div>

        </div>

    </div>
</div>


</body>
</html>