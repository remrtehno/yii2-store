-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 10 2019 г., 13:31
-- Версия сервера: 8.0.15
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `appstore`
--

-- --------------------------------------------------------

--
-- Структура таблицы `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` text NOT NULL,
  `description` text NOT NULL,
  `img` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `title`) VALUES
(1, 0, 'T-Shirt'),
(2, 0, 'Blazers'),
(3, 0, 'Sunglass'),
(4, 0, 'Kids'),
(5, 0, 'Polo shirt'),
(6, 2, 'Subcategory'),
(7, 2, 'Sub SUB'),
(8, 3, 'SubNAV'),
(9, 3, 'SubNAV3333');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `user_id`, `status`) VALUES
(14, 2, 8, 'pending'),
(15, 2, 1, 'pending'),
(16, 5, 1, 'pending'),
(17, 2, 1, 'pending'),
(18, 2, 1, 'pending'),
(19, 2, 1, 'pending'),
(20, 2, 1, 'pending'),
(21, 2, 1, 'pending'),
(22, 2, 1, 'pending'),
(23, 2, 1, 'pending'),
(24, 5, 1, 'pending'),
(25, 5, 1, 'pending');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cat_id` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `img` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` text NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `recommended` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `cat_id`, `img`, `title`, `sub_title`, `description`, `price`, `recommended`) VALUES
(1, '0', '/images/home/product1.jpg', 'Easy Polo Black Edition', '', 'descriptiom vlowiweoijfwoeifjw', 56, 1),
(2, '0', '/images/home/product2.jpg', 'Easy Polo Black Edition', '', 'wrcwercwer werwe rwerwe werw e', 59, 0),
(3, '0', '/images/home/product3.jpg', 'Easy Polo Black Edition', '', 'wrcwercwer werwe rwerwe werw e wrcwercwer werwe rwerwe werw e wrcwercwer werwe rwerwe werw e wrcwercwer werwe rwerwe werw ewrcwercwer werwe rwerwe werw e', 88, 1),
(4, '0', '/images/home/product4.jpg', 'Easy Polo Black Edition', '', '3123122 1 213 d fw fwe fwef wefw ef32v14 5134 534 ', 562, 1),
(5, '1,2,3', 'images/home/gallery1.jpg', 'Easy Polo Black Edition', '', '  	Easy Polo Black Editio  	Easy Polo Black Editio  	Easy Polo Black Editio  	Easy Polo Black Editio  	Easy Polo Black Editio  	Easy Polo Black Editio', 56, 0),
(6, '1,3', 'images/home/gallery2.jpg', 'Easy Polo Black Edition', '', '  	Easy Polo Blacerwr Editio  	Easy Polo Black Editio  	Easy Polo Black Editio  	Easy Polo Black Editio  	Easy Polo Black Editio  	Easy Polo Black Editio', 22, 0),
(7, '1,4', 'images/home/gallery3.jpg', 'Test3', '', '  	Earwerwesy Polo Black Editio  	Easy Polo Black Editio  	Easy Polo Black Editio  	Easy Polo Black Editio  	Easy Polo Black Editio  	Easy Polo Black Editio', 75404, 1),
(8, '1,4,2,5', 'images/home/gallery3.jpg', 'Test22', '', '  	Easeqweqweqy Polo Black Editio  	Easy Polo Black Editio  	Easy Polo Black Editio  	Easy Polo Black Editio  	Easy Polo Black Editio  	Easy Polo Black Editio', 754, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `paasword` varchar(50) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `paasword`, `role`) VALUES
(1, 'admin', 're@mail.ru', '2', ''),
(4, '1', '', '1', ''),
(6, '', '', '', ''),
(7, '321', '', '', ''),
(8, 'User', 'admin@admin.com', '12', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT для таблицы `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
