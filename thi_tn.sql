-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 16, 2019 lúc 09:38 AM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `thi_tn`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `answer_tab`
--

CREATE TABLE `answer_tab` (
  `id_a` int(255) NOT NULL,
  `answer` text NOT NULL,
  `true_answer` int(1) NOT NULL,
  `id_q` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `question_tab`
--

CREATE TABLE `question_tab` (
  `id_q` int(255) NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `set_time_down`
--

CREATE TABLE `set_time_down` (
  `id` int(10) NOT NULL,
  `set_time` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `set_time_down`
--

INSERT INTO `set_time_down` (`id`, `set_time`) VALUES
(1, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `class` varchar(255) NOT NULL,
  `count_test` int(15) NOT NULL,
  `points` int(2) NOT NULL,
  `rules` int(2) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`username`, `password`, `fullname`, `email`, `class`, `count_test`, `points`, `rules`, `status`) VALUES
('12', '12', 'Quang Khuc', 'khucquang2112@gmail.com', 'PT14311-WEB', 0, 0, 0, 1),
('123', '123', 'Quang Khuc', 'khucquang2112@gmail.com', '123', 0, 0, 0, 1),
('1234', '1234', 'Quang Khuc', 'khucquang2112@gmail.com', 'PT14311-WEB', 0, 0, 0, 1),
('12345', '12345', 'Quang Khuc', 'khucquang2112@gmail.com', 'PT14311-WEB', 0, 0, 0, 1),
('admin', 'admin', 'Khúc Thành Quang', 'khucquang2112@gmail.com', 'lop1', 3, 0, 1, 1),
('huonggiang', 'giang123', 'Hoàng Hương Giang', 'giang@gmail.com', 'PT14311-ƯD', 15, 8, 0, 1),
('khucquang2112', 'quang123', 'Quang khúc', 'khucquang2112@yahoo.com', 'PT14311-WEB', 0, 0, 0, 1),
('khucthanhquang', 'quang123', 'Khúc Thành Quang', 'khucquang2112@gmail.com', 'PT14311-WEB', 15, 10, 0, 1),
('long_oc', 'long1234', 'LOng', 'khucquang@gmail.com', 'PT14311-WEB', 0, 0, 0, 1),
('quang1', 'quang123', 'quang', 'khucquang2112@gmail.com', 'PT14311-WEB', 0, 0, 0, 1),
('quang123', 'quang1234', 'quang', 'khucquang2112@gmail.com', 'PT14311-WEB', 8, 0, 0, 1),
('quang1234', 'quang1234', 'Quang Khuc', 'dad@gmail.cda', 'PT14311-WEB', 15, 5, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_online`
--

CREATE TABLE `user_online` (
  `time_online` int(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `links` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user_online`
--

INSERT INTO `user_online` (`time_online`, `ip`, `links`) VALUES
(1571208867, 'admin', '/project_fb/answer_question.php'),
(1571208869, 'admin', '/project_fb/answer_question.php'),
(1571208870, 'admin', '/project_fb/answer_question.php'),
(1571208871, 'admin', '/project_fb/answer_question.php'),
(1571208873, 'admin', '/project_fb/answer_question.php'),
(1571208875, 'admin', '/project_fb/answer_question.php'),
(1571208877, 'admin', '/project_fb/answer_question.php'),
(1571208878, 'admin', '/project_fb/answer_question.php');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `answer_tab`
--
ALTER TABLE `answer_tab`
  ADD PRIMARY KEY (`id_a`),
  ADD KEY `id_q` (`id_q`);

--
-- Chỉ mục cho bảng `question_tab`
--
ALTER TABLE `question_tab`
  ADD PRIMARY KEY (`id_q`);

--
-- Chỉ mục cho bảng `set_time_down`
--
ALTER TABLE `set_time_down`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `user_online`
--
ALTER TABLE `user_online`
  ADD PRIMARY KEY (`time_online`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `answer_tab`
--
ALTER TABLE `answer_tab`
  MODIFY `id_a` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `question_tab`
--
ALTER TABLE `question_tab`
  MODIFY `id_q` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `set_time_down`
--
ALTER TABLE `set_time_down`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `answer_tab`
--
ALTER TABLE `answer_tab`
  ADD CONSTRAINT `answer_tab_ibfk_1` FOREIGN KEY (`id_q`) REFERENCES `question_tab` (`id_q`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
