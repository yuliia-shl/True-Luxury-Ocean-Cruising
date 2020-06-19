-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 20 2020 г., 00:22
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ocean`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `address` varchar(255) NOT NULL,
  `cruis_list` text NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address`, `cruis_list`, `status`) VALUES
(1, 6, 'bulv. Lesi Ukrainky 34, office 411', '{\"basket\":[{\"cruis_id\":\"5\",\"days\":6}]}', 0),
(2, 7, 'пр.Науки, 87', '{\"basket\":[{\"cruis_id\":\"2\",\"days\":\"8\"},{\"cruis_id\":\"1\",\"days\":\"14\"}]}', 0),
(3, 7, 'Киев, ул. Саксаганского 9', '{\"basket\":[{\"cruis_id\":\"6\",\"days\":12}]}', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
