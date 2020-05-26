SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
create table `TheLoai`(
    `MaTL` int(11) NOT NULL AUTO_INCREMENT,
    `TenTL` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	PRIMARY KEY (`MaTL`)
)   ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

insert into `TheLoai`(`TenTL`) values
('Hành động'),
('Hài hước'),
('Cổ trang'),
('Chính kịch'),
('Viễn tưởng'),
('Võ thuật'),
('Thần thoại'),
('Thể thao'),
('Âm nhạc'),
('Chiến tranh'),
('Kinh dị'),
('Tâm lý'),
('Gia đình'),
('Hình sự'),
('Hồi hộp'),
('Tài liệu'),
('Hoạt hình'),
('Phiêu lưu'),
('Bí ẩn'),
('Tình cảm');

CREATE TABLE `user` (
  `Username` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Email` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Tag` int(11) DEFAULT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

insert into `user`(`Username`,`Password`,`Email`,`Tag`) values
('admin01','admin01','',1),
('admin02','admin02','',1),
('user01','user01','ahihi@gmail.com',2);


CREATE TABLE `movie` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `TenPhim` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DanhGia` double DEFAULT NULL,
  `QuocGia` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `NgayRaRap` datetime DEFAULT NULL,
  `ThoiLuong` int(11) NOT NULL,
  `ChatLuong` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `HangSX` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `LuotXem` int(11) NOT NULL,
  `TheLoai` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `LinkPhim` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `LinkPoster` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;


CREATE TABLE `comment` (
  `CommentID` INT(11) NOT NULL AUTO_INCREMENT,
  `NoiDung` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Username` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MaPhim` INT(11),
  PRIMARY KEY (`CommentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;


CREATE TABLE `trailer` (
  `TrailerID` int(11) NOT NULL AUTO_INCREMENT ,
  `LinkTrailer` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MaPhim` INT(11),
  PRIMARY KEY (`TrailerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;


CREATE TABLE `celeb` (
  `CelebID` int(11) NOT NULL AUTO_INCREMENT ,
  `Ten` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `QuocTich` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Tag` int(11) DEFAULT NULL,
  PRIMARY KEY (`CelebID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;


CREATE TABLE `quocgia` (
	`MaQG` INT(11) NOT NULL AUTO_INCREMENT , 
	`TenQG` VARCHAR(32) NOT NULL , 
	PRIMARY KEY (`MaQG`)
) ENGINE = InnoDB;

INSERT INTO `quocgia`(`TenQG`) values
('Việt Nam'),
('Hàn Quốc'),
('Nhật Bản'),
('Âu Mỹ'),
('Thái Lan'),
('Ấn Độ');

CREATE TABLE `chatluong` (
	`MaCL` INT(11) NOT NULL AUTO_INCREMENT , 
	`TenCL` VARCHAR(32) NOT NULL , 
	PRIMARY KEY (`MaCL`)
) ENGINE = InnoDB;

INSERT INTO `chatluong`(`TenCL`) values
('480p'),
('720p HD'),
('1080 FullHD');

ALTER TABLE `comment` 
	ADD CONSTRAINT `FK_UserComment` FOREIGN KEY (`Username`)
	REFERENCES `user`(`Username`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `comment` 
	ADD CONSTRAINT `FK_CommentMovie` FOREIGN KEY (`MaPhim`)
	REFERENCES `movie`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `trailer` 
	ADD CONSTRAINT `FK_TrailerMovie` FOREIGN KEY (`MaPhim`)
	REFERENCES `movie`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;




  <select class="input-group" name="TheLoai">
					<option value="apple" <?php if ($TheLoai == 'apple') echo 'selected'; ?> >Apple</option>
					<option value="samsung" <?php if ($TheLoai == 'samsung') echo 'selected'; ?>>Samsung</option>
					<option value="oppo" <?php if ($TheLoai == 'oppo') echo 'selected'; ?>>Oppo</option>
					<option value="nokia" <?php if ($TheLoai == 'nokia') echo 'selected'; ?>>Nokia</option>
				</select>