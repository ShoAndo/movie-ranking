-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Host: db
-- Generation Time: 2016 年 7 月 15 日 06:04
-- サーバのバージョン： 5.5.48-MariaDB-1~wheezy
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie-ranking`
--

-- --------------------------------------------------------

--
-- テーブルの構造　users
--

-- CREATE TABLE `users` (
--   `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
--   `name` varchar(50) NOT NULL,
--   `email` varchar(50) NOT NULL,
--   `password` varchar(50) NOT NULL,
--   `role` int(1) DEFAULT 0
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, '管理ユーザー', 'spdtas0223+000@gmail.com', MD5('hiurvwosgwunsjhi'), 1),
(2, 'ユーザー1', 'spdtas0223+001@gmail.com', MD5('hiurvwosgwunsjhi'), 0),
(3, 'ユーザー2', 'spdtas0223+002@gmail.com', MD5('hiurvwosgwunsjhi'), 0),
(4, 'ユーザー3', 'spdtas0223+003@gmail.com', MD5('hiurvwosgwunsjhi'), 0);

-- -------------------------------------------------------------------

--
-- テーブル構造 rankings
--

CREATE TABLE `rankings` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `creator` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `limit_date` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  CONSTRAINT fk_user_id_ranking
    FOREIGN KEY (user_id)
    REFERENCES users (id)
    ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `rankings` (`id`, `name`, `creator`, `created_at`, `limit_date`, `user_id`) VALUES

(1, 'ランキング1', '配信者1', '2022-06-24 08:00:00', '2022-06-25 08:00:00', 1),
(2, 'ランキング2', '配信者2', '2022-06-24 08:00:00', '2022-06-25 08:00:00', 1),
(3, 'ランキング3', '配信者3', '2022-06-24 08:00:00', '2022-06-25 08:00:00', 2),
(4, 'ランキング4', '配信者4', '2022-06-24 08:00:00', '2022-06-25 08:00:00', 2),
(5, 'ランキング5', '配信者5', '2022-06-24 08:00:00', '2022-07-10 08:00:00', 1),
(6, 'ランキング6', '配信者6', '2022-06-24 08:00:00', '2022-07-10 08:00:00', 1),
(7, 'ランキング7', '配信者7', '2022-06-24 08:00:00', '2022-07-10 08:00:00', 2),
(8, 'ランキング8', '配信者8', '2022-06-24 08:00:00', '2022-07-10 08:00:00', 2);

-- --------------------------------------------------------------------------

--
-- テーブルの構造 posts
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `ranking_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  CONSTRAINT fk_user_id_posts
    FOREIGN KEY (user_id)
    REFERENCES users (id)
    ON DELETE SET NULL ON UPDATE CASCADE,
  
  CONSTRAINT fk_ranking_id_posts
    FOREIGN KEY (ranking_id)
    REFERENCES rankings (id)
    ON DELETE SET NULL ON UPDATE CASCADE
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `posts` (`id`, `title`, `url`, `created_at`, `ranking_id`, `user_id`) VALUES

(1, 'タイトル1', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 1, 1),
(2, 'タイトル2', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 1, 1),
(3, 'タイトル3', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 1, 1),
(4, 'タイトル4', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 1, 2),
(5, 'タイトル5', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 1, 2),
(6, 'タイトル6', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 1, 2),

(7, 'タイトル1', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 2, 1),
(8, 'タイトル2', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 2, 1),
(9, 'タイトル3', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 2, 1),
(10, 'タイトル4', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 2, 2),
(11, 'タイトル5', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 2, 2),
(12, 'タイトル6', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 2, 2),

(13, 'タイトル1', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 3, 1),
(14, 'タイトル2', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 3, 1),
(15, 'タイトル3', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 3, 1),
(16, 'タイトル4', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 3, 2),
(17, 'タイトル5', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 3, 2),
(18, 'タイトル6', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 3, 2),

(19, 'タイトル1', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 4, 1),
(20, 'タイトル2', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 4, 1),
(21, 'タイトル3', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 4, 1),
(22, 'タイトル4', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 4, 2),
(23, 'タイトル5', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 4, 2),
(24, 'タイトル6', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 4, 2),

(25, 'タイトル1', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 5, 1),
(26, 'タイトル2', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 5, 1),
(27, 'タイトル3', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 5, 1),
(28, 'タイトル4', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 5, 2),
(29, 'タイトル5', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 5, 2),
(30, 'タイトル6', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 5, 2),

(31, 'タイトル1', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 6, 1),
(32, 'タイトル2', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 6, 1),
(33, 'タイトル3', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 6, 1),
(34, 'タイトル4', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 6, 2),
(35, 'タイトル5', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 6, 2),
(36, 'タイトル6', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 6, 2),

(37, 'タイトル1', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 7, 1),
(38, 'タイトル2', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 7, 1),
(39, 'タイトル3', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 7, 1),
(40, 'タイトル4', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 7, 2),
(41, 'タイトル5', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 7, 2),
(42, 'タイトル6', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 7, 2),

(43, 'タイトル1', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 8, 1),
(44, 'タイトル2', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 8, 1),
(45, 'タイトル3', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 8, 1),
(46, 'タイトル4', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 8, 2),
(47, 'タイトル5', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 8, 2),
(48, 'タイトル6', 'https://youtube.com/embed/TbSxQp22NJU', '2022-06-24 12:00:00', 8, 2);

-- ------------------------------------------------------------------------------------

--
-- テーブルの構造 votes
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,

  CONSTRAINT fk_user_id_votes
    FOREIGN KEY (user_id)
    REFERENCES users (id)
    ON DELETE SET NULL ON UPDATE CASCADE,
  
  CONSTRAINT fk_post_id_votes
    FOREIGN KEY (post_id)
    REFERENCES posts (id)
    ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `votes` (`id`, `post_id`, `user_id`) VALUES 
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 1),
(6, 2, 2),
(7, 2, 3),
(8, 3, 1),
(9, 3, 2),
(10, 4, 1),
(11, 5, 1),
(12, 6, 1),

(13, 7, 1),
(14, 7, 2),
(15, 7, 3),
(16, 7, 4),
(17, 8, 1),
(18, 8, 2),
(19, 8, 3),
(20, 9, 1),
(21, 9, 2),
(22, 10, 1),
(23, 11, 1),
(24, 12, 1),

(25, 13, 1),
(26, 13, 2),
(27, 13, 3),
(28, 13, 4),
(29, 14, 1),
(30, 14, 2),
(31, 14, 3),
(32, 15, 1),
(33, 15, 2),
(34, 16, 1),
(35, 17, 1),
(36, 18, 1),

(37, 19, 1),
(38, 19, 2),
(39, 19, 3),
(40, 19, 4),
(41, 20, 1),
(42, 20, 2),
(43, 20, 3),
(44, 21, 1),
(45, 21, 2),
(46, 22, 1),
(47, 23, 1),
(48, 24, 1),

(49, 25, 1),
(50, 25, 2),
(51, 25, 3),
(52, 25, 4),
(53, 26, 1),
(54, 26, 2),
(55, 26, 3),
(56, 27, 1),
(57, 27, 2),
(58, 28, 1),
(59, 29, 1),
(60, 30, 1),

(61, 31, 1),
(62, 31, 2),
(63, 31, 3),
(64, 31, 4),
(65, 32, 1),
(66, 32, 2),
(67, 32, 3),
(68, 33, 1),
(69, 33, 2),
(70, 34, 1),
(71, 35, 1),
(72, 36, 1),

(73, 37, 1),
(74, 37, 2),
(75, 37, 3),
(76, 37, 4),
(77, 38, 1),
(78, 38, 2),
(79, 38, 3),
(80, 39, 1),
(81, 39, 2),
(82, 40, 1),
(83, 41, 1),
(84, 42, 1),

(85, 43, 1),
(86, 43, 2),
(87, 43, 3),
(88, 43, 4),
(89, 44, 1),
(90, 44, 2),
(91, 44, 3),
(92, 45, 1),
(93, 45, 2),
(94, 46, 1),
(95, 47, 1),
(96, 48, 1);

-- ----------

--
-- テーブルの構造　`comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `content` text NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,

  CONSTRAINT fk_user_id_comments
    FOREIGN KEY (user_id)
    REFERENCES users (id)
    ON DELETE SET NULL ON UPDATE CASCADE,
  
  CONSTRAINT fk_post_id_comments
    FOREIGN KEY (post_id)
    REFERENCES posts (id)
    ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `comments` (`id`, `content`, `post_id`, `user_id`) VALUES
(1, 'コメント1', 1, 1),
(2, 'コメント2', 1, 2),
(3, 'コメント1', 2, 1),
(4, 'コメント2', 2, 2),
(5, 'コメント1', 3, 1),
(6, 'コメント2', 3, 2),
(7, 'コメント1', 4, 1),
(8, 'コメント2', 4, 2),
(9, 'コメント1', 5, 1),
(10, 'コメント2', 5, 2),
(11, 'コメント1', 6, 1),
(12, 'コメント2', 6, 2),
(13, 'コメント1', 7, 1),
(14, 'コメント2', 7, 2),
(15, 'コメント1', 8, 1),
(16, 'コメント2', 8, 2),
(17, 'コメント1', 9, 1),
(18, 'コメント2', 9, 2),
(19, 'コメント1', 10, 1),
(20, 'コメント2', 10, 2),
(21, 'コメント1', 11, 1),
(22, 'コメント2', 11, 2),
(23, 'コメント1', 12, 1),
(24, 'コメント2', 12, 2),
(25, 'コメント1', 13, 1),
(26, 'コメント2', 13, 2),
(27, 'コメント1', 14, 1),
(28, 'コメント2', 14, 2),
(29, 'コメント1', 15, 1),
(30, 'コメント2', 15, 2),
(31, 'コメント1', 16, 1),
(32, 'コメント2', 16, 2),
(33, 'コメント1', 17, 1),
(34, 'コメント2', 17, 2),
(35, 'コメント1', 18, 1),
(36, 'コメント2', 18, 2),
(37, 'コメント1', 19, 1),
(38, 'コメント2', 19, 2),
(39, 'コメント1', 20, 1),
(40, 'コメント2', 20, 2),
(41, 'コメント1', 21, 1),
(42, 'コメント2', 21, 2),
(43, 'コメント1', 22, 1),
(44, 'コメント2', 22, 2),
(45, 'コメント1', 23, 1),
(46, 'コメント2', 23, 2),
(47, 'コメント1', 24, 1),
(48, 'コメント2', 24, 2),
(49, 'コメント1', 25, 1),
(50, 'コメント2', 25, 2),
(51, 'コメント1', 26, 1),
(52, 'コメント2', 26, 2),
(53, 'コメント1', 27, 1),
(54, 'コメント2', 27, 2),
(55, 'コメント1', 28, 1),
(56, 'コメント2', 28, 2),
(57, 'コメント1', 29, 1),
(58, 'コメント2', 29, 2),
(59, 'コメント1', 30, 1),
(60, 'コメント2', 30, 2),
(61, 'コメント1', 31, 1),
(62, 'コメント2', 31, 2),
(63, 'コメント1', 32, 1),
(64, 'コメント2', 32, 2),
(65, 'コメント1', 33, 1),
(66, 'コメント2', 33, 2),
(67, 'コメント1', 34, 1),
(68, 'コメント2', 34, 2),
(69, 'コメント1', 35, 1),
(70, 'コメント2', 35, 2),
(71, 'コメント1', 36, 1),
(72, 'コメント2', 36, 2),
(73, 'コメント1', 37, 1),
(74, 'コメント2', 37, 2),
(75, 'コメント1', 38, 1),
(76, 'コメント2', 38, 2),
(77, 'コメント1', 39, 1),
(78, 'コメント2', 39, 2),
(79, 'コメント1', 40, 1),
(80, 'コメント2', 40, 2),
(81, 'コメント1', 41, 1),
(82, 'コメント2', 41, 2),
(83, 'コメント1', 42, 1),
(84, 'コメント2', 42, 2),
(85, 'コメント1', 43, 1),
(86, 'コメント2', 43, 2),
(87, 'コメント1', 44, 1),
(88, 'コメント2', 44, 2),
(89, 'コメント1', 45, 1),
(90, 'コメント2', 45, 2),
(91, 'コメント1', 46, 1),
(92, 'コメント2', 46, 2),
(93, 'コメント1', 47, 1),
(94, 'コメント2', 47, 2),
(95, 'コメント1', 48, 1),
(96, 'コメント2', 48, 2);

















