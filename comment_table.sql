-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 6 月 23 日 03:48
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
-- テーブルの構造 `comment_table`
--

CREATE TABLE `comment_table` (
  `id` int(12) NOT NULL,
  `comment_text` varchar(128) NOT NULL,
  `post_id` int(12) NOT NULL,
  `comment_created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `comment_table`
--

INSERT INTO `comment_table` (`id`, `comment_text`, `post_id`, `comment_created_at`) VALUES
(1, 'hoge', 11, '2021-06-22 16:39:08'),
(2, 'hoge', 11, '2021-06-22 16:40:29'),
(14, 'ほっていいね', 12, '2021-06-22 18:53:15'),
(15, 'コメントありがとうございます', 12, '2021-06-22 18:53:26'),
(16, 'コメントありがとうございます', 12, '2021-06-22 19:04:02'),
(17, 'いいですね', 12, '2021-06-22 22:20:44'),
(18, 'いい言葉ですね', 12, '2021-06-22 22:23:52'),
(19, 'デザート買いにいきます', 12, '2021-06-22 22:25:33');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `comment_table`
--
ALTER TABLE `comment_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `comment_table`
--
ALTER TABLE `comment_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
