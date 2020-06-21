-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 21 2020 г., 10:24
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(1, 'SUMMER OF SOLO', '2020-06-29', 15, 750, 10, '9.jpg'),
(2, 'ENGLISH SUNSETS', '2020-07-22', 9, 450, 3, '8.jpg'),
(3, 'BRITISH IMMERSION', '2020-06-29', 7, 1300, 3, '25.jpg'),
(4, 'SUNSETS', '2020-07-22', 11, 550, 5, '24.jpg'),
(5, 'SUMMER LIFE', '2020-06-29', 15, 650, 7, '26.jpg'),
(6, 'AMERICAN SUNSETS', '2020-07-22', 8, 400, 7, '25.jpg'),
(7, 'IRLAND IMMERSION', '2020-06-29', 14, 500, 3, '9.jpg'),
(8, 'WILD OCEAN', '2020-07-22', 14, 800, 6, '8.jpg'),
(32, 'SUN SUMMER', '2020-06-19', 12, 450, 8, '7.jpg'),
(33, 'SUMMER LIFE', '2020-06-19', 11, 700, 13, '7.jpg');

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
(14, 3, 'China', 'Korea'),
(16, 1, 'France', 'Europe');

-- --------------------------------------------------------

--
-- Структура таблицы `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phone` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `Time` datetime NOT NULL,
  `options` varchar(150) NOT NULL,
  `Status` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `phone`, `email`, `text`, `Time`, `options`, `Status`) VALUES
(50, 9, 'Виктория', '09876543221', 'ww555@i.ua', 'Hello!How can i call you?', '2020-06-19 19:09:57', '', 'NEW'),
(53, 18, 'Igor Petrov', '0987865456', '11@i.ua', 'Hello there!I need a cruise in march 2021!Please call me!', '2020-06-20 10:18:14', '', 'DONE'),
(57, 19, 'Olena', '0987776665', 'olena@i.ua', 'Hi!Can your manager contact me?', '2020-06-20 12:52:49', '', 'NEW'),
(61, 22, 'Oleg Ivanov', '0987654321', 'oleg@i.ua', '\"Hello!I wold like to tlk with your agent about my future cruise!Please dont message me,but call!Im interested about siles and prices on february 2021 in Canada.We  are 4 person and 2kids,the room should be on deck 5-6 with a balcony.The tours im not inte', '2020-06-20 19:12:09', '', 'DONE'),
(62, 23, 'Oleg Olegovich', '0987654321', 'ol@i.ua', 'Hello!Can you contact me?', '2020-06-20 19:42:11', '', 'NEW'),
(63, 25, 'Vasiliy', '+38 (050) 112-96-25', 'vasya@i.ua', 'Hello. Do you have a cruise for January 2021 to Australia? I need for 2 adults and 1 child.\r\nThank you.', '2020-06-20 22:50:04', '', 'DONE');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `address` varchar(255) NOT NULL,
  `cruis_list` text NOT NULL,
  `time` datetime NOT NULL,
  `status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address`, `cruis_list`, `time`, `status`) VALUES
(1, 5, 'Одесса,улица Семена Палия 68,кв.45', '{\"basket\":[{\"cruis_id\":\"2\",\"days\":\"14\"},{\"cruis_id\":\"3\",\"days\":\"20\"}]}', '2020-05-26 11:56:31', 1),
(2, 17, 'Одесса', '{\"basket\":[{\"cruis_id\":\"1\",\"days\":\"15\"},{\"cruis_id\":\"2\",\"days\":33},{\"cruis_id\":\"3\",\"days\":\"20\"},{\"cruis_id\":\"4\",\"days\":\"15\"}]}', '2020-06-11 16:42:07', 0),
(3, 6, 'Одесса,улица Семена ', '{\"basket\":[{\"cruis_id\":\"1\",\"days\":\"15\"},{\"cruis_id\":\"3\",\"days\":\"20\"}]}', '2020-06-13 09:36:14', 0),
(4, 11, 'Одесса,Кирова 45', '{\"basket\":[{\"cruis_id\":\"2\",\"days\":11},{\"cruis_id\":\"3\",\"days\":\"7\"}]}', '2020-06-15 21:56:50', 0),
(5, 25, '', '{\"basket\":[{\"cruis_id\":\"8\",\"days\":7},{\"cruis_id\":\"33\",\"days\":14},{\"cruis_id\":\"6\",\"days\":21}]}', '2020-06-17 18:07:12', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `rating` int(11) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `review`
--

INSERT INTO `review` (`id`, `name`, `email`, `date`, `rating`, `message`) VALUES
(4, 'Olga', 'qwerty@i.ua', '2020-06-20 13:45:00', 4, 'super'),
(11, 'Ivan', 'qwerty@i.ua', '2020-06-20 14:22:00', 4, 'All perfect!!Thank you guys!!'),
(12, 'Виктория', 'qwerty@i.ua', '2020-06-20 14:29:00', 5, 'Super'),
(13, 'Виктория', 'qwerty@i.ua', '2020-06-20 15:20:00', 4, 'fantastic!!');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `verifided` int(11) NOT NULL DEFAULT 0,
  `confirm_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`, `verifided`, `confirm_code`) VALUES
(5, 'Vicky Something', '0987755443', 'vi@i.ua', '373633ec8af28e5afaf6e5f4fd87469b', 1, ''),
(6, 'Elena Kirova', '909876543213', 'elena@i.ua', '373633ec8af28e5afaf6e5f4fd87469b', 0, 'wnGGM315r8rNR4iTv6lN'),
(11, 'Anastasiia Polunina', '0897656453', 'nas3@i.ua', '6512bd43d9caa6e02c990b0a82652dca', 0, 'ddaQ3xbcfOs6FDuVDJem'),
(17, 'Olga Petrova', '380987678765', 'olga@mail.ru', '099b3b060154898840f0ebdfb46ec78f', 1, ''),
(23, '', '0987654321', 'ol@i.ua', '', 0, ''),
(24, 'Yulia Aleksandrovna', '+380507771100', 'yu@i.ua', '202cb962ac59075b964b07152d234b70', 0, 'TpO9jhNqzuqBPYqhEDKH'),
(25, 'Vasiliy Petrenko', '+38 (050) 112-96-25', 'vasya@i.ua', '202cb962ac59075b964b07152d234b70', 1, '');

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
-- Индексы таблицы `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблицы `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
