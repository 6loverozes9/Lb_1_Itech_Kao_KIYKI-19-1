-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июл 12 2022 г., 15:59
-- Версия сервера: 10.4.24-MariaDB
-- Версия PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `internet_magazin`
--
CREATE DATABASE IF NOT EXISTS `internet_magazin` DEFAULT CHARACTER SET cp1251 COLLATE cp1251_general_ci;
USE `internet_magazin`;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL,
  `name` text NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id_category`, `name`) VALUES
(1, 'gamer'),
(2, 'office');

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id_items` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `quality` text NOT NULL,
  `fid_vendors` int(11) NOT NULL,
  `fid_category` int(11) NOT NULL,
  PRIMARY KEY (`id_items`),
  KEY `fk_items_1` (`fid_vendors`),
  KEY `fk_items_2` (`fid_category`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id_items`, `name`, `price`, `quantity`, `quality`, `fid_vendors`, `fid_category`) VALUES
(1, 'HP Pavilion Gaming 15-ec2024ua', 64000, 8, 'new', 1, 1),
(2, 'Lenovo Legion 5 15ACH6H', 53000, 10, 'new', 3, 1),
(3, 'ASUS TUF Gaming F15 FX506HCB-HN161', 59000, 0, 'new', 2, 1),
(4, 'ASUS Laptop X515JA-EJ1815', 15500, 3, 'new', 2, 2),
(5, 'Apple MacBook Pro M1 ', 240000, 23, 'new', 4, 2),
(6, 'Apple MacBook Air M1', 57500, 2, 'new', 4, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `vendors`
--

CREATE TABLE IF NOT EXISTS `vendors` (
  `id_vendors` int(11) NOT NULL,
  `name` text NOT NULL,
  PRIMARY KEY (`id_vendors`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `vendors`
--

INSERT INTO `vendors` (`id_vendors`, `name`) VALUES
(1, 'Hp'),
(2, 'Asus'),
(3, 'Lenovo'),
(4, 'Macbook');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `fk_items_1_v` FOREIGN KEY (`fid_vendors`) REFERENCES `vendors` (`id_vendors`),
  ADD CONSTRAINT `fk_items_2_c` FOREIGN KEY (`fid_category`) REFERENCES `category` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
