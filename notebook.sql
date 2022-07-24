-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 25 2022 г., 02:17
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `api_base`
--

-- --------------------------------------------------------

--
-- Структура таблицы `notebook`
--

CREATE TABLE `notebook` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `mdname` text NOT NULL,
  `company` text NOT NULL,
  `email` text NOT NULL,
  `number` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `notebook`
--

INSERT INTO `notebook` (`id`, `name`, `surname`, `mdname`, `company`, `email`, `number`, `date`) VALUES
(1, 'Иван', 'Иванов', 'Иванович', 'Яндекс', 'Ivan2000@mail.ru', '+7-900-555-35-35', '10.01.2000'),
(2, 'Андрей', 'Андреев', 'Андреевич', 'Яндекс', 'AndreyMen2@gmail.com', '+7-900-345-34-21', '05.06.2002'),
(3, 'Вячеслав', 'Тарасов', 'Вячеславович', 'Google', 'SlavaTrue@mail.ru', '+7-900-566-36-36', '17.09.1998');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `notebook`
--
ALTER TABLE `notebook`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `notebook`
--
ALTER TABLE `notebook`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
