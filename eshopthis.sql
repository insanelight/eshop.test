-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 15 2018 г., 07:23
-- Версия сервера: 5.5.53
-- Версия PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `eshopthis`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(13) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort_order` int(13) NOT NULL,
  `status` int(13) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `sort_order`, `status`) VALUES
(1, 'Телефоны', 1, 1),
(2, 'Компьютеры', 2, 1),
(3, 'Ноутбуки', 5, 1),
(4, 'Планшеты', 3, 1),
(7, 'Игровые приставки', 7, 1),
(8, 'production', 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(13) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(13) NOT NULL,
  `code` int(13) NOT NULL,
  `price` float NOT NULL,
  `availability` int(13) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_new` int(13) NOT NULL,
  `is_recommended` int(13) NOT NULL,
  `status` int(13) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `code`, `price`, `availability`, `brand`, `image`, `description`, `is_new`, `is_recommended`, `status`) VALUES
(2, 'Galaxy s6', 1, 5521, 250, 1, 'Samsung', 'images/mobile/1.jpg', 'this is samsung desc', 1, 1, 1),
(3, 'Nokia N7', 1, 13234, 50, 1, 'Nokia', 'images/mobile/1.jpg', 'this is nokia desc', 1, 0, 1),
(4, 'Iphone 5s', 1, 2734, 300, 1, 'Apple', 'images/mobile/1.jpg', 'this is apple desc', 1, 1, 1),
(5, 'Iphone 7s', 1, 2734, 1000, 0, 'Apple', 'images/mobile/1.jpg', 'iPhone 7 и iPhone 7 Plus — смартфоны корпорации Apple, использующие процессор Apple A10 Fusion и операционную систему iOS 10, представленные 7 сентября 2016 года[2][6]. Диагональ экрана и разрешение была оставлена такой же по сравнению с предыдущими моделями: iPhone 6s и iPhone 6s Plus. Толщина телефона — 7,1—7,3 мм, без учета модуля камеры, немного выступающей за пределы (двух камер в iPhone 7 Plus). Смартфоны используют только порт Lightning, лишившись традиционного разъёма TRRS mini-jack (3,5 мм) для подключения проводных наушников. Также телефоны получили защиту от воды и пыли на уровне IP67.', 1, 1, 1),
(6, 'Thinkpad e560', 3, 8594, 750, 1, 'Lenovo', 'images/notebook/1.jpg', 'Lenovo Thinkpad e560', 1, 1, 1),
(7, 'MacBook Pro', 3, 1940, 2250, 1, 'Apple', 'images/notebook/2.jpg', 'apple mac', 0, 1, 1),
(9, 'Galaxy Tab 10', 4, 9021, 280, 1, 'Samsung', 'images/pl/2.jpg', 'this is galaxy tab X', 0, 0, 1),
(10, 'PC XZL', 2, 94999, 1850, 1, 'Lightning', 'images/pc/1.jpg', 'this is maximum performance pc', 1, 1, 1),
(11, 'Zend PC', 2, 3829, 1200, 0, 'ZendFr', 'images/pc/2.jpg', 'Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. Вдали над осталось составитель однажды своих толку реторический журчит, моей, семантика меня раз пустился. Запятой сих но, заглавных единственное деревни!', 0, 0, 1),
(12, 'SonyXL2PS', 2, 128390, 3000, 1, 'Sony', '', 'this is sony', 1, 1, 1),
(13, 'SonyCoreXL', 2, 123893, 3200, 1, 'Sony', '', 'this is ultra new ps4', 1, 1, 1),
(14, 'Ipad2ProEdition', 4, 27489, 300, 1, 'Apple', '', 'ipadProthis', 0, 0, 1),
(15, 'Playstation 4', 7, 98421, 400, 1, 'Sony', '', 'this is most powerfull game station of the world!', 0, 0, 1),
(17, 'PlayStation 5', 7, 9999, 600, 1, 'Sony', '', 'sony5inno', 1, 1, 1),
(18, 'Nokia N10', 1, 214378, 1000, 1, 'Nokia', '', '', 0, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product_order`
--

CREATE TABLE `product_order` (
  `id` int(13) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_comment` text NOT NULL,
  `user_id` int(13) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `products` text NOT NULL,
  `status` int(13) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_order`
--

INSERT INTO `product_order` (`id`, `user_name`, `user_phone`, `user_comment`, `user_id`, `date`, `products`, `status`) VALUES
(1, 'jaksldjklajsd', '12831903', 'asdjkalsjd', 0, '2017-11-12 20:35:15', '{\"5\":4,\"4\":1}', 4),
(3, 'Арсли', '12039123', 'asdkasd', 0, '2017-11-13 18:42:04', '{\"14\":4,\"9\":1,\"7\":1,\"6\":1}', 3),
(4, 'Light2', '4772660', 'yes', 3, '2017-11-13 19:44:48', '{\"11\":1,\"12\":1,\"13\":1}', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(13) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Light', 'k@ANu.ru', '1231421432', ''),
(2, 'Light', 'k@AN2u.ru', '1231421432', ''),
(3, 'Light', 'light@god.com', '1234567890', 'admin'),
(4, 'arsli', 'arsli@mail.ru', '11111111', 'admin'),
(5, 'unholy', 'bloodparty@mail.ru', '123456', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT для таблицы `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
