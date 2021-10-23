-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 23 2021 г., 01:11
-- Версия сервера: 5.7.33
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `pizza`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orderpizza`
--

CREATE TABLE `orderpizza` (
  `id` int(11) NOT NULL,
  `timeOrder` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typeID` int(11) NOT NULL,
  `sizeID` int(11) NOT NULL,
  `sauceID` int(11) NOT NULL,
  `cost` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orderpizza`
--

INSERT INTO `orderpizza` (`id`, `timeOrder`, `typeID`, `sizeID`, `sauceID`, `cost`) VALUES
(1, '2021-10-23 00:30:42', 2, 2, 3, 29.34),
(2, '2021-10-23 00:49:31', 2, 1, 2, 22.44),
(3, '2021-10-23 00:49:52', 1, 1, 2, 20.69),
(4, '2021-10-23 00:58:14', 1, 2, 2, 27.59),
(5, '2021-10-23 01:09:50', 2, 3, 4, 35.44);

-- --------------------------------------------------------

--
-- Структура таблицы `saucepizza`
--

CREATE TABLE `saucepizza` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `saucepizza`
--

INSERT INTO `saucepizza` (`id`, `name`, `cost`) VALUES
(1, 'Без соуса', 0),
(2, 'сырный', 1.2),
(3, 'кисло-сладкий', 1.2),
(4, 'чесночный', 1.2),
(5, 'барбекю', 1.2);

-- --------------------------------------------------------

--
-- Структура таблицы `sizepizza`
--

CREATE TABLE `sizepizza` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `cost` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sizepizza`
--

INSERT INTO `sizepizza` (`id`, `name`, `cost`) VALUES
(1, 21, 15.99),
(2, 26, 22.89),
(3, 31, 28.99),
(4, 45, 33.39);

-- --------------------------------------------------------

--
-- Структура таблицы `typepizza`
--

CREATE TABLE `typepizza` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `typepizza`
--

INSERT INTO `typepizza` (`id`, `name`, `cost`) VALUES
(1, 'Пепперони', 3.5),
(2, 'Деревенская', 5.25),
(3, 'Гавайская', 4.15),
(4, 'Грибная', 7);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orderpizza`
--
ALTER TABLE `orderpizza`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `saucepizza`
--
ALTER TABLE `saucepizza`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sizepizza`
--
ALTER TABLE `sizepizza`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `typepizza`
--
ALTER TABLE `typepizza`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orderpizza`
--
ALTER TABLE `orderpizza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `saucepizza`
--
ALTER TABLE `saucepizza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `sizepizza`
--
ALTER TABLE `sizepizza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `typepizza`
--
ALTER TABLE `typepizza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
