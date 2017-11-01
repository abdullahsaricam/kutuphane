-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 01 Kas 2017, 20:59:11
-- Sunucu sürümü: 5.7.19
-- PHP Sürümü: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `abdullah_kutuphane`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `book_author` varchar(250) NOT NULL,
  `publisher` varchar(250) NOT NULL,
  `page` int(11) NOT NULL,
  `summary` text NOT NULL,
  `like_` int(11) NOT NULL,
  `disliking` int(11) NOT NULL,
  `language` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `book_date` datetime DEFAULT NULL,
  `register_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(250) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `register_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=388 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesaj`
--

DROP TABLE IF EXISTS `mesaj`;
CREATE TABLE IF NOT EXISTS `mesaj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gonderen_id` int(11) NOT NULL,
  `mesaj` text NOT NULL,
  `mesaj_tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `okundu` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_surname` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `password_md5` text NOT NULL,
  `eposta` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  `rank` int(11) NOT NULL,
  `register_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name_surname`, `username`, `password`, `password_md5`, `eposta`, `status`, `rank`, `register_date`, `update_date`, `delete_date`) VALUES
(65, 'sarıçam abdullah', 'admin', '123', '6116afedcb0bc31083935c1c262ff4c9', 'asaricam@gmail.com', 1, 0, '2017-09-18 14:38:01', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_book`
--

DROP TABLE IF EXISTS `user_book`;
CREATE TABLE IF NOT EXISTS `user_book` (
  `user_book_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `ubook_register_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delivery_date` datetime DEFAULT NULL,
  `userbook_status` int(11) NOT NULL,
  PRIMARY KEY (`user_book_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `user_book`
--

INSERT INTO `user_book` (`user_book_id`, `user_id`, `book_id`, `ubook_register_date`, `delivery_date`, `userbook_status`) VALUES
(14, 68, 9, '2017-09-23 01:19:26', '2017-09-26 15:35:01', 0),
(12, 68, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(11, 65, 10, '2017-09-18 16:56:25', '2017-09-20 21:48:27', 0),
(15, 65, 9, '2017-09-24 12:31:26', '2017-09-26 16:49:46', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
