-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 17 2020 г., 19:20
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
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` tinyint(3) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'Northern Europe'),
(2, 'North America'),
(3, 'Asia');

-- --------------------------------------------------------

--
-- Структура таблицы `cruises`
--

CREATE TABLE `cruises` (
  `id` tinyint(5) NOT NULL,
  `title` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `days` tinyint(3) NOT NULL,
  `price` int(4) NOT NULL,
  `destinations_id` tinyint(1) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cruises`
--

INSERT INTO `cruises` (`id`, `title`, `data`, `days`, `price`, `destinations_id`, `images`) VALUES
(1, 'SUMMER OF SOL', '2020-06-29', 14, 100, 3, '9.jpg'),
(2, 'SPANISH SUNSETS', '2020-07-22', 8, 127, 5, '8.jpg'),
(3, 'BRITISH IMMERSION', '2020-06-29', 20, 200, 3, '25.jpg'),
(4, 'SUNSETS', '2020-07-22', 89, 300, 5, '24.jpg'),
(5, 'SUMMER LIFE', '2020-06-29', 50, 384, 7, '26.jpg'),
(6, 'American SUNSETS', '2020-07-22', 8, 1000, 7, '25.jpg'),
(7, 'IRLAND IMMERSION', '2020-06-29', 30, 500, 3, '9.jpg'),
(8, 'SUNSETS', '2020-07-22', 18, 800, 6, '8.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `destinations`
--

CREATE TABLE `destinations` (
  `id` tinyint(10) NOT NULL,
  `categori_id` tinyint(3) NOT NULL,
  `departure` varchar(255) NOT NULL,
  `arrival` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `destinations`
--

INSERT INTO `destinations` (`id`, `categori_id`, `departure`, `arrival`) VALUES
(3, 1, 'Ireland', 'Norway'),
(4, 1, 'Sweden', 'Ireland'),
(5, 1, 'Spain', 'Norway'),
(6, 1, 'NorwayUnited Kingdom', 'Ireland'),
(7, 2, 'Washington', 'California'),
(8, 2, 'Manitoba', 'California'),
(9, 2, 'Nunavut', 'Manitoba'),
(10, 2, 'Florida', 'Cuba'),
(11, 3, 'Thailand', 'Vietnam'),
(12, 3, 'Vietnam', 'Thailand'),
(13, 3, 'India', 'Myanmar'),
(14, 3, 'China', 'Korea');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cruises`
--
ALTER TABLE `cruises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cruises_ibfk_1` (`destinations_id`);

--
-- Индексы таблицы `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categori_id` (`categori_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `cruises`
--
ALTER TABLE `cruises`
  MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cruises`
--
ALTER TABLE `cruises`
  ADD CONSTRAINT `cruises_ibfk_1` FOREIGN KEY (`destinations_id`) REFERENCES `destinations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
