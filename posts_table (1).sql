-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 6 月 22 日 07:40
-- サーバのバージョン： 10.4.19-MariaDB
-- PHP のバージョン: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `team_php`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `posts_table`
--

CREATE TABLE `posts_table` (
  `post_id` int(12) NOT NULL,
  `post_text` varchar(128) NOT NULL,
  `post_lat` varchar(20) NOT NULL,
  `post_lng` varchar(20) NOT NULL,
  `post_image` varchar(128) DEFAULT NULL,
  `post_created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `posts_table`
--

INSERT INTO `posts_table` (`post_id`, `post_text`, `post_lat`, `post_lng`, `post_image`, `post_created_at`) VALUES
(1, 'hoge', '', '', NULL, '2021-06-19 21:26:38'),
(2, 'hoge', '', '', NULL, '2021-06-19 21:27:10'),
(3, 'hoge', '', '', '../image/202106200850357676efec84d6e435dd05e541f434b16b.png', '2021-06-20 15:50:35'),
(5, 'hoge4', '', '', '../image/202106211420034ccca1ff03bf4ebc3acb2275ba01d593.png', '2021-06-21 21:20:03'),
(6, 'hoge5', '', '', '../image/202106211434094ccca1ff03bf4ebc3acb2275ba01d593.png', '2021-06-21 21:34:09'),
(7, 'hoge6', '', '', '../image/202106211438084ccca1ff03bf4ebc3acb2275ba01d593.png', '2021-06-21 21:38:08'),
(8, 'hoge7', '', '', '../image/202106211440004ccca1ff03bf4ebc3acb2275ba01d593.png', '2021-06-21 21:40:00'),
(9, 'hoge8', '', '', '../image/202106211441314ccca1ff03bf4ebc3acb2275ba01d593.png', '2021-06-21 21:41:31'),
(10, 'hoge10', '', '', '../image/202106211444514ccca1ff03bf4ebc3acb2275ba01d593.png', '2021-06-21 21:44:51'),
(11, 'hoge11', '', '', '../image/202106211447554ccca1ff03bf4ebc3acb2275ba01d593.png', '2021-06-21 21:47:55'),
(12, 'hoge11', '33.5852078', '130.3943871', '../image/202106211452444ccca1ff03bf4ebc3acb2275ba01d593.png', '2021-06-21 21:52:44');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `posts_table`
--
ALTER TABLE `posts_table`
  ADD PRIMARY KEY (`post_id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `posts_table`
--
ALTER TABLE `posts_table`
  MODIFY `post_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
