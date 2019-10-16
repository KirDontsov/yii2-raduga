-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 16 2019 г., 09:54
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `viewed` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `article`
--

INSERT INTO `article` (`id`, `title`, `description`, `content`, `date`, `image`, `viewed`, `user_id`, `status`, `category_id`) VALUES
(1, '111', '111', '<p>111</p>\r\n', '2012-12-12', '', 1, 1, 1, 2),
(2, '111', '111', '<p>111</p>\r\n', '2019-08-15', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `article_tag`
--

CREATE TABLE `article_tag` (
  `id` int(11) NOT NULL,
  `article_id` int(11) DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `article_tag`
--

INSERT INTO `article_tag` (`id`, `article_id`, `tag_id`) VALUES
(2, 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `blog_category`
--

CREATE TABLE `blog_category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `blog_category`
--

INSERT INTO `blog_category` (`id`, `title`) VALUES
(1, 'Первая категория'),
(2, 'Вторая категория');

-- --------------------------------------------------------

--
-- Структура таблицы `blog_user`
--

CREATE TABLE `blog_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `isAdmin` int(11) DEFAULT 0,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `parent_id`, `name`, `keywords`, `description`) VALUES
(1, 0, 'Квартиры', 'Квартиры', 'Квартиры'),
(2, 0, 'Дома', 'Дома', 'Дома'),
(3, 0, 'Таунхаусы', 'Таунхаусы', 'Таунхаусы'),
(4, 0, 'Гостиницы', 'Гостиницы', 'Гостиницы'),
(5, 0, 'Земельные участки', 'Земельные участки', 'Земельные участки');

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`id`, `name`, `slug`) VALUES
(1, 'Геленджик', 'gelendzik'),
(2, 'Геленджик, с. Возрождение', 'gelendzik-s-vozrozdenie'),
(3, 'Геленджик, с. Дивноморское', 'gelendzik-s-divnomorskoe'),
(4, 'Геленджик, с. Кабардинка', 'gelendzik-s-kabardinka'),
(5, 'Геленджик, Широкая щель', 'gelendzik-sirokaa-sel'),
(6, 'Геленджик, с. Светлое', 'gelendzik-s-svetloe'),
(7, 'Геленджик, с. Виноградное', 'gelendzik-s-vinogradnoe'),
(8, 'Геленджик, х. Джанхот', 'gelendzik-h-dzanhot'),
(9, 'Геленджик, с. Прасковеевка', 'gelendzik-s-praskoveevka');

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `text` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `article_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `filePath` varchar(400) NOT NULL,
  `itemId` int(11) DEFAULT NULL,
  `isMain` tinyint(1) DEFAULT NULL,
  `modelName` varchar(150) NOT NULL,
  `urlAlias` varchar(400) NOT NULL,
  `name` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`id`, `filePath`, `itemId`, `isMain`, `modelName`, `urlAlias`, `name`) VALUES
(13, 'Articles/Article2/adecf4.jpg', 2, 0, 'Article', '344698634a-3', ''),
(14, 'Articles/Article2/e5fd08.jpg', 2, 0, 'Article', '5da05c095b-2', ''),
(15, 'Articles/Article2/eb4043.jpg', 2, 1, 'Article', 'da0735900d-1', ''),
(17, 'Products/Product15/107cce.png', 15, 0, 'Product', '971b166763-3', ''),
(18, 'Products/Product15/7647a0.jpg', 15, 0, 'Product', '73868b598f-2', ''),
(19, 'Products/Product15/30575a.jpg', 15, 1, 'Product', 'e7af32a267-1', ''),
(20, 'Products/Product16/e3788d.jpg', 16, 1, 'Product', 'c288163d2b-1', ''),
(21, 'Products/Product17/69a360.jpg', 17, 1, 'Product', 'c8d1c614cb-1', ''),
(22, 'Products/Product18/a15800.jpg', 18, 1, 'Product', 'e51d11930c-1', ''),
(24, 'Products/Product2/9316f6.jpg', 2, 1, 'Product', '659cc12237-1', ''),
(25, 'Products/Product1/c43d23.jpg', 1, 1, 'Product', '50e9e6af3b-1', ''),
(26, 'Products/Product3/f9e1ad.jpg', 3, 1, 'Product', '17f9e5c875-1', ''),
(27, 'Products/Product4/e4685d.png', 4, 1, 'Product', 'c5b9d9a55d-1', ''),
(28, 'Products/Product5/b253f8.jpg', 5, 1, 'Product', '0433f3e81d-1', ''),
(29, 'Products/Product19/47c498.jpg', 19, 1, 'Product', '45301e9916-1', ''),
(30, 'Products/Product20/4f7d9a.jpg', 20, 1, 'Product', 'd45cb57286-1', ''),
(31, 'Products/Product21/4bfefa.jpg', 21, 1, 'Product', '91268caeae-1', ''),
(32, 'Products/Product22/200131.jpg', 22, 1, 'Product', '55d292f3ac-1', ''),
(34, 'Products/Product25/903edb.jpg', 25, 1, 'Product', '2862df8287-1', ''),
(35, 'Products/Product25/e6c03a.jpg', 25, NULL, 'Product', 'ccf1fefd28-2', ''),
(36, 'Products/Product25/049f56.jpg', 25, NULL, 'Product', '95aa307f4c-3', ''),
(37, 'Products/Product25/683ea9.jpg', 25, NULL, 'Product', '745245f4f6-4', ''),
(38, 'Products/Product25/6c619b.jpg', 25, NULL, 'Product', '74ed479409-5', ''),
(39, 'Products/Product25/88940f.jpg', 25, NULL, 'Product', 'a476cfccfb-6', ''),
(40, 'Products/Product25/cecd53.jpg', 25, NULL, 'Product', '57f5b7c320-7', ''),
(41, 'Products/Product25/5d8351.jpg', 25, NULL, 'Product', '9f33ad2063-8', ''),
(54, 'Products/Product23/7d5419.jpg', 23, 1, 'Product', '3e3b779388-1', ''),
(55, 'Products/Product23/01d496.jpg', 23, NULL, 'Product', '7073efbc9d-2', ''),
(56, 'Products/Product23/ac1ebc.jpg', 23, NULL, 'Product', '9e8d12a0ef-3', ''),
(57, 'Products/Product23/6e740a.jpg', 23, NULL, 'Product', 'c6d87f3344-4', ''),
(58, 'Products/Product24/17742c.jpg', 24, 1, 'Product', '688228471f-1', ''),
(59, 'Products/Product24/39a1b5.jpg', 24, NULL, 'Product', '00423b6e75-8', ''),
(60, 'Products/Product24/ad7aee.jpg', 24, NULL, 'Product', 'c96fa98a9a-9', ''),
(61, 'Products/Product24/dda830.jpg', 24, NULL, 'Product', '4a7172888b-10', ''),
(62, 'Products/Product24/3b7d10.jpg', 24, NULL, 'Product', '55162f4b54-11', ''),
(63, 'Products/Product24/98c74e.jpg', 24, NULL, 'Product', '4987d354a3-12', '');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1565707686),
('m170124_021553_create_article_table', 1565707689),
('m170124_021601_create_blog_category_table', 1565707689),
('m170124_021608_create_tag_table', 1565707689),
('m170124_021613_create_blog_user_table', 1565707689),
('m170124_021622_create_comment_table', 1565707690),
('m170124_021633_create_article_tag_table', 1565707693),
('m170207_135744_add_date_to_comment', 1565707693);

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `qty` int(10) NOT NULL,
  `sum` float NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

CREATE TABLE `order_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `qty_item` int(11) NOT NULL,
  `sum_item` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `name`, `price`, `qty_item`, `sum_item`) VALUES
(1, 2, 6, 'Кардиган Levi\'s Icy Grey Heather M', 100, 1, 100),
(2, 3, 6, 'Кардиган Levi\'s Icy Grey Heather M', 100, 1, 100),
(3, 4, 2, 'Джинсы MR520 MR 227  р Синие', 56, 1, 56),
(4, 4, 3, 'Блуза Mango 53005681-05 M Бежевая', 20, 1, 20),
(5, 4, 4, 'Блуза Tom Tailor TT  M Зелёная', 70, 1, 70),
(6, 5, 2, 'Джинсы MR520 MR 227  р Синие', 56, 1, 56),
(7, 6, 2, 'Джинсы MR520 MR 227  р Синие', 56, 1, 56),
(8, 6, 3, 'Блуза Mango 53005681-05 M Бежевая', 20, 1, 20),
(9, 6, 4, 'Блуза Tom Tailor TT  M Зелёная', 70, 1, 70),
(10, 6, 5, 'Блузка Kira Plastinina 17-16 S', 0, 1, 0),
(11, 6, 6, 'Кардиган Levi\'s Icy Grey Heather M', 100, 1, 100),
(12, 7, 2, 'Джинсы MR520 MR 227  р Синие', 56, 1, 56),
(13, 7, 3, 'Блуза Mango 53005681-05 M Бежевая', 20, 1, 20),
(14, 8, 2, 'Джинсы MR520 MR 227  р Синие', 56, 1, 56),
(15, 9, 2, 'Джинсы MR520 MR 227  р Синие', 56, 1, 56),
(16, 10, 2, 'Джинсы MR520 MR 227  р Синие', 56, 2, 112),
(17, 10, 3, 'Блуза Mango 53005681-05 M Бежевая', 20, 1, 20),
(18, 10, 4, 'Блуза Tom Tailor TT  M Зелёная', 70, 1, 70),
(19, 11, 6, 'Кардиган Levi\'s Icy Grey Heather M', 100, 1, 100),
(20, 12, 2, 'Джинсы MR520 MR 227  р Синие', 56, 2, 112),
(21, 13, 3, 'Блуза Mango 53005681-05 M Бежевая', 20, 1, 20),
(22, 13, 4, 'Блуза Tom Tailor TT  M Зелёная', 70, 1, 70),
(23, 13, 2, 'Джинсы MR520 MR 227  р Синие', 56, 1, 56),
(24, 13, 5, 'Блузка Kira Plastinina 17-16 S', 0, 1, 0),
(25, 14, 3, 'Блуза Mango 53005681-05 M Бежевая', 20, 1, 20),
(26, 14, 4, 'Блуза Tom Tailor TT  M Зелёная', 70, 1, 70),
(27, 14, 2, 'Джинсы MR520 MR 227  р Синие', 56, 1, 56),
(28, 14, 5, 'Блузка Kira Plastinina 17-16 S', 0, 1, 0),
(29, 15, 6, 'Кардиган Levi\'s Icy Grey Heather M', 100, 1, 100),
(30, 15, 2, 'Джинсы MR520 MR 227  р Синие', 56, 2, 112),
(31, 15, 3, 'Блуза Mango 53005681-05 M Бежевая', 20, 1, 20),
(32, 16, 6, 'Кардиган Levi\'s Icy Grey Heather M', 100, 1, 100),
(33, 16, 2, 'Джинсы MR520 MR 227  р Синие', 56, 2, 112),
(34, 16, 3, 'Блуза Mango 53005681-05 M Бежевая', 20, 1, 20),
(35, 17, 6, 'Кардиган Levi\'s Icy Grey Heather M', 100, 1, 100),
(36, 17, 2, 'Джинсы MR520 MR 227  р Синие', 56, 2, 112),
(37, 17, 3, 'Блуза Mango 53005681-05 M Бежевая', 20, 1, 20),
(38, 18, 6, 'Кардиган Levi\'s Icy Grey Heather M', 100, 1, 100),
(39, 18, 2, 'Джинсы MR520 MR 227  р Синие', 56, 2, 112),
(40, 18, 3, 'Блуза Mango 53005681-05 M Бежевая', 20, 1, 20),
(41, 19, 6, 'Кардиган Levi\'s Icy Grey Heather M', 100, 1, 100),
(42, 19, 2, 'Джинсы MR520 MR 227  р Синие', 56, 2, 112),
(43, 19, 3, 'Блуза Mango 53005681-05 M Бежевая', 20, 1, 20),
(44, 20, 6, 'Кардиган Levi\'s Icy Grey Heather M', 100, 1, 100),
(45, 20, 2, 'Джинсы MR520 MR 227  р Синие', 56, 2, 112),
(46, 20, 3, 'Блуза Mango 53005681-05 M Бежевая', 20, 1, 20),
(47, 21, 6, 'Кардиган Levi\'s Icy Grey Heather M', 100, 1, 100),
(48, 21, 2, 'Джинсы MR520 MR 227  р Синие', 56, 2, 112),
(49, 21, 3, 'Блуза Mango 53005681-05 M Бежевая', 20, 1, 20),
(50, 22, 6, 'Кардиган Levi\'s Icy Grey Heather M', 100, 1, 100),
(51, 22, 2, 'Джинсы MR520 MR 227  р Синие', 56, 2, 112),
(52, 22, 3, 'Блуза Mango 53005681-05 M Бежевая', 20, 1, 20),
(53, 23, 6, 'Кардиган Levi\'s Icy Grey Heather M', 100, 1, 100),
(54, 23, 2, 'Джинсы MR520 MR 227  р Синие', 56, 2, 112),
(55, 23, 3, 'Блуза Mango 53005681-05 M Бежевая', 20, 1, 20),
(56, 24, 6, 'Кардиган Levi\'s Icy Grey Heather M', 100, 1, 100),
(57, 24, 2, 'Джинсы MR520 MR 227  р Синие', 56, 2, 112),
(58, 24, 3, 'Блуза Mango 53005681-05 M Бежевая', 20, 1, 20),
(59, 25, 6, 'Кардиган Levi\'s Icy Grey Heather M', 100, 1, 100),
(60, 25, 2, 'Джинсы MR520 MR 227  р Синие', 56, 2, 112),
(61, 25, 3, 'Блуза Mango 53005681-05 M Бежевая', 20, 2, 40),
(62, 26, 3, 'Блуза Mango 53005681-05 M Бежевая', 20, 1, 20),
(63, 26, 4, 'Блуза Tom Tailor TT  M Зелёная', 70, 1, 70),
(64, 27, 3, 'Блуза Mango 53005681-05 M Бежевая', 20, 1, 20),
(65, 27, 4, 'Блуза Tom Tailor TT  M Зелёная', 70, 1, 70),
(66, 28, 1, 'Джинсы Garcia р Серо-синие', 10, 1, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `price` float NOT NULL DEFAULT 0,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT 'no-image.png',
  `hit` enum('0','1') NOT NULL DEFAULT '0',
  `new` enum('0','1') NOT NULL DEFAULT '0',
  `square` varchar(255) NOT NULL,
  `code` smallint(6) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `floor` tinyint(4) NOT NULL,
  `h_number` smallint(6) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `rooms` tinyint(4) NOT NULL,
  `h_condition` varchar(255) NOT NULL,
  `latitude` float(10,8) NOT NULL,
  `longitude` float(10,8) NOT NULL,
  `street_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `is_checked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `content`, `price`, `keywords`, `description`, `img`, `hit`, `new`, `square`, `code`, `contact`, `floor`, `h_number`, `phone`, `rooms`, `h_condition`, `latitude`, `longitude`, `street_id`, `city_id`, `is_checked`) VALUES
(1, 4, 'Кемпински 5*', '<div class=\"composite__item\" style=\"margin-top: 0px; padding-top: 0px; color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif;\">\r\n<p>Цены на номера</p>\r\n</div>\r\n\r\n<div class=\"composite__item\" style=\"margin-top: 26px; color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif;\">\r\n<div class=\"composite composite_gap_m composite_separated_no\">\r\n<div class=\"composite__item\" style=\"margin-top: 0px; padding-top: 0px;\">\r\n<div class=\"text-container typo typo_text_m typo_line_m\" style=\"line-height: 17px; overflow-wrap: break-word;\">Химчистка, бассейн, номера для некурящих, частный пляж, обслуживание номеров, переговорная, прачечная, бар у бассейна, мини-бар, дата реконструкции 2012, парковка автомобиля персоналом, парковка, игровая комната, лифт, номеров 379, ускоренная регистрация заезда/отъезда, детская площадка, банкомат, удобства для людей с ограниченными возможностями, массаж, барбекю, сейф, количество ресторанов 2, круглосуточная стойка регистрации, камера хранения, трансфер, фен, чай/кофе в номерах, телевизор в номере, баня, бизнес-центр, кафе, услуги няни, салон красоты, оплата картой, джакузи, сад, халат, тапочки, сауна, бар, ресторан, утюг, уборка, конференц-зал, детский клуб, кондиционер в номере, солярий, консьерж-сервис, дата постройки 2010, Wi-Fi, отопление, совмещённые номера, детский бассейн, терраса, аниматоры, тренажёрный зал, цена номера от 11400 ₽/ночь, spa, обмен валюты.</div>\r\n</div>\r\n</div>\r\n</div>\r\n', 10000000, 'гостиница', 'гостиница', 'product1.jpg', '1', '0', '145', 1001, 'Вася', 5, 42, '89829816767', 2, 'Убогое', 44.56114197, 38.07680893, 70, 1, 1),
(2, 4, 'Alean Family Resort & SPA Biarritz 4* ', '<div class=\"composite__item\" style=\"margin-top: 0px; padding-top: 0px; color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif;\">\r\n<div class=\"text-container typo typo_text_m typo_line_m\" style=\"line-height: 17px; overflow-wrap: break-word;\">Бассейн, прачечная, тренажёрный зал, лифт, оплата картой, ресторан, кондиционер в номере, цена номера от 3600 ₽/ночь, химчистка, Wi-Fi, аниматоры, мини-бар, трансфер, дата реконструкции 2017, сауна, салон красоты, парковка, номеров 313, детская площадка.</div>\r\n</div>\r\n\r\n<div class=\"composite__item\" style=\"margin-top: 26px; color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif;\">\r\n<ul style=\"list-style-type:none\">\r\n	<li><strong>Питание</strong>ультра всё включено</li>\r\n	<li><strong>Тип гостиницы</strong>бизнес-отель, спа-отель</li>\r\n	<li><strong>Цена номера</strong>от 3600 ₽/ночь</li>\r\n	<li><strong>Дата реконструкции</strong>2017</li>\r\n	<li><strong>Тип пляжа</strong>галечный</li>\r\n	<li><strong>Номеров</strong>313</li>\r\n	<li><strong>Пляжная линия</strong>2-я линия</li>\r\n	<li><strong>Количество звёзд</strong>4 звезды</li>\r\n</ul>\r\n</div>\r\n', 8000000, 'Alean Family Resort & SPA Biarritz 4* ', 'Alean Family Resort & SPA Biarritz 4* ', 'no-image.png', '1', '1', '243', 1002, 'Петя', 1, 32, '89829816767', 4, 'Евро ремонт', 44.56114197, 38.07680893, 10, 1, 1),
(3, 2, '138 м² с участком 4 сотки', '<p><span style=\"color:rgba(0, 0, 0, 0.92); font-family:ys text,helvetica neue,arial,sans-serif; font-size:16px\">Продам НОВЫЙ, Шикарный монолитно-каркасный дом. &quot;Средиземноморье 1&quot; с ЕВРОРЕМОНТОМ! г. Геленджик. СНТ Леник 1, ул Новочеркасская 14а. 12:40:0305003:457. ПРОПИСКА ВОЗМОЖНО! Все документы готовы. Экологически чистое место с уникальным микроклиматом. В 500 метрах от участка сосновый лес, речка. До открытого моря 10 минут пешком (благоустроенный пляж). Не далеко (800м.) автобусная остановка, магазин 150м. До города 5 км., до ближайшей школы 5 км или 3 остановки на автобусе, до садика и поликлиники 2 км. На участке газонная травка. С участка открывается прекрасный вид на горы. Идеальное место, как для постоянного проживания, так и для летнего отдыха (соседи проживают постоянно). Вода: Своя скважина (глубина 81 м.), Электричество: три фазы. 25кв. Газ: центральный.ПОДКЛЮЧЕН! Канализация: септик 4 метра. Фундамент: ленточный на подушке, глубина 2 м., ширина 40 см, Бетон 350, начинка арматура 14. Цоколь h 40-70см. Материал дома: толщина стен 33см. блок 20 см., теплоизоляция &laquo;полипропилен&raquo;, кароед, покраска 13 см. Окна: ПВХ Elex, форнитура: Axor, цвет: золотой дуб. Крыша: металлочерепица, утеплитель Изовер (три слоя), теплопароизоляция двухсторонняя. Двор: Благоустроен тротуарной плиткой, и зонами для зеленых насаждении. Забор: с трех сторон профнастиль (шоколад), фасад: дерево, ворота выкатные на роликах. Полное фото-видео история с фундамента до крыш. СОБСТВЕННИК!</span></p>\r\n', 6900000, '138 м² с участком 4 сотки', '138 м² с участком 4 сотки', 'no-image.png', '0', '0', '', 0, '', 0, 20, '', 0, 'Евро ремонт', 44.56114197, 38.07680893, 11, 1, 1),
(4, 2, '400 м² с участком 4 сотки', '', 23500000, '400 м² с участком 4 сотки', '400 м² с участком 4 сотки', 'no-image.png', '0', '0', '145', 0, 'Федя', 0, 15, '', 0, 'Убогое', 44.56114197, 38.07680893, 58, 1, 1),
(5, 3, '110 м² с участком 1 сотка', '', 2550000, '110 м² с участком 1 сотка', '110 м² с участком 1 сотка', 'no-image.png', '0', '0', '', 0, '', 0, 1, '', 0, 'Евро ремонт', 44.58230591, 38.02035904, 15, 2, 1),
(19, 1, '1-комнатная квартира', '<div class=\"OfferTextDescription OfferDescription__section\" style=\"margin-bottom: 24px; padding-top: 24px; border-top: 1px solid rgba(0, 0, 0, 0.08);\">\r\n<p>Квартира с видом на море! Большaя светлая oднoкoмнатная квартиpа в нoвом дoме с eвро рeмoнтoм нeдaлeко от лучшего пляжа &quot;Cады моpей&quot; (дeсять минут медленным шагoм) и гостиницы &quot;Кемпинcки&quot;. Ecть всё неoбхoдимoe для кoмфортногo пpоживaния. Кухня массив - цвет слоновая кость, стол кухонный цвет слоновая кость - массив, стулья массив, вытяжка, газовая плита 4-х комф. Холодильник (сухая заморозка). Мебель - диваны чёрный, белый - французский механизм, раскладной на 2-х чел. эко кожа 2 сплит системы. Кровать 2-х спальная (цвет слоновая кость) массив. Ортопедический матрац. Комод для белья Шкаф - купе с зеркалами. М/п окна , занавески , ламбрекен Унитаз, душевая кабина , Мебель для ванной комнаты Тёплые полы ( кухня, прихожая, ванна) Плитка полированный керамогранит. Полоток натяжной. Автономное отопление (газовый котёл) (aктуaльно в мeжcезонье). Безлимитный интернет (оптиковолокно). Магазины в соседних домах и рынок в пешей доступности. Рядом вновь построенная набережная и сквер &quot;На круче&quot; с детскими и спортивными площадками. Парковка во дворе со шлагбаумом. Идеально подходит для семейного отдыха Квартира видовая! Окна двор и вид на море. Доп. описание: санузел раздельный, пластиковые окна, в доме есть: детская площадка, открытый двор, наземный паркинг, лифт пассажирский, , современный ремонт, также имеются: телефон, интернет, кабельное телевидение, счетчики холодной и горячей воды, домофон, железная дверь, Номер в базе: 2391643. Район: Геленджик&nbsp;</p>\r\n</div>\r\n', 4900000, '1-комнатная квартира 41,8 м², 11/11 этаж  ', '1-комнатная квартира 41,8 м², 11/11 этаж  ', 'no-image.png', '1', '0', '48', 0, 'Вася', 0, 2, '', 0, '', 44.58092499, 38.06938171, 57, 2, 1),
(20, 4, '1111', '<p>1111</p>\r\n', 10000000, 'гостиница', 'гостиница', 'no-image.png', '0', '0', '', 0, '', 0, 7, '', 0, 'Евро ремонт', 44.60103607, 38.02505875, 17, 3, 1),
(21, 4, '1111', '<p>1111</p>\r\n', 10000000, 'гостиница', 'гостиница', 'no-image.png', '0', '0', '98', 0, '', 0, 8, '', 0, 'Евро ремонт', 44.60158157, 38.02379227, 18, 4, 1),
(22, 1, 'Кемпински 5*', '', 11111, '111', '111', 'no-image.png', '0', '0', '74', 0, '', 0, 160, '', 4, 'Евро ремонт', 44.56849289, 38.17410660, 19, 5, 1),
(23, 1, '111', '', 1111, '', '', 'no-image.png', '0', '0', '76', 0, '', 0, 7, '', 0, 'Евро ремонт', 44.57392120, 38.02098846, 20, 6, 1),
(24, 5, 'Участок', '<p><span style=\"color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif; font-size:17px\">Химчистка, бассейн, номера для некурящих, частный пляж, обслуживание номеров, переговорная, прачечная, бар у бассейна, мини-бар, дата реконструкции 2012, парковка автомобиля персоналом, парковка, игровая комната, лифт, номеров 379, ускоренная регистрация заезда/отъезда, детская площадка, банкомат, удобства для людей с ограниченными возможностями, массаж, барбекю, сейф, количество ресторанов 2, круглосуточная стойка регистрации, камера хранения, трансфер, фен, чай/кофе в номерах, телевизор в номере, баня, бизнес-центр, кафе, услуги няни, салон красоты, оплата картой, джакузи, сад, халат, тапочки, сауна, бар, ресторан, утюг, уборка, конференц-зал, детский клуб, кондиционер в номере, солярий, консьерж-сервис, дата постройки 2010, Wi-Fi, отопление, совмещённые номера, детский бассейн, терраса, аниматоры, тренажёрный зал, цена номера от 11400 ₽/ночь, spa, обмен валюты.</span></p>\r\n', 2000000, 'Участок', 'Участок', 'no-image.png', '1', '0', '1000', 1003, 'Федя', 0, 42, '89819861167', 0, 'Убогое', 44.55353546, 38.09276199, 21, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `street`
--

CREATE TABLE `street` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `street`
--

INSERT INTO `street` (`id`, `city_id`, `name`, `slug`) VALUES
(1, 1, '1-й пер.', '1-j-per'),
(2, 1, '1-й Родниковый пер.', '1-j-rodnikovyj-per'),
(3, 1, '1-й пер. Рублева', '1-j-per-rubleva'),
(4, 1, '1-й Санаторный пер.', '1-j-sanatornyj-per'),
(5, 1, '1-й пер. Стрижевой', '1-j-per-strizevoj'),
(6, 1, '2-й пер. Волнухина', '2-j-per-volnuhina'),
(7, 1, '2-й Родниковый пер.', '2-j-rodnikovyj-per'),
(8, 1, '2-й пер. Рублева', '2-j-per-rubleva'),
(9, 1, '2-й Санаторный пер.', '2-j-sanatornyj-per'),
(10, 1, '2-й пер. Стрижевой', '2-j-per-strizevoj'),
(11, 1, '3-й пер.', '3-j-per'),
(12, 1, '3-й пер. Рублева', '3-j-per-rubleva'),
(13, 1, '3-й Санаторный пер.', '3-j-sanatornyj-per'),
(14, 1, '4-й пер.', '4-j-per'),
(15, 1, 'улица 40 лет Октября', 'ulica-40-let-oktabra'),
(16, 1, '5-й пер.', '5-j-per'),
(17, 1, '6-й пер.', '6-j-per'),
(18, 1, '7-й пер.', '7-j-per'),
(19, 1, 'улица 78 причал Тонкий мыс', 'ulica-78-prical-tonkij-mys'),
(20, 1, 'улица 9 Мая', 'ulica-9-maa'),
(21, 1, 'пер. Блока', 'per-bloka'),
(22, 1, 'ул. Блока', 'ul-bloka'),
(23, 1, 'ул. Вельяминова', 'ul-velaminova'),
(24, 1, 'ул. Губрия', 'ul-gubria'),
(25, 1, 'Абинская ул.', 'abinskaa-ul'),
(26, 1, 'Абрикосовая ул.', 'abrikosovaa-ul'),
(27, 1, 'Агатовая ул.', 'agatovaa-ul'),
(28, 1, 'Аграрная ул.', 'agrarnaa-ul'),
(29, 1, 'Адлеровская ул.', 'adlerovskaa-ul'),
(30, 1, 'Адлерская ул.', 'adlerskaa-ul'),
(31, 1, 'Адлерский пер.', 'adlerskij-per'),
(32, 1, 'ул. Адмирала Проценко', 'ul-admirala-procenko'),
(33, 1, 'ул. Адмирала Серебрякова', 'ul-admirala-serebrakova'),
(34, 1, 'ул. Адмирала Холостякова', 'ul-admirala-holostakova'),
(35, 1, 'ул. Айвазовского', 'ul-ajvazovskogo'),
(36, 1, 'ул. Академика Ширшова', 'ul-akademika-sirsova'),
(37, 1, 'ул. Алексея Вельяминова', 'ul-aleksea-velaminova'),
(38, 1, 'ул. Аллея Памяти', 'ul-allea-pamati'),
(39, 1, 'Алычевая ул.', 'alycevaa-ul'),
(40, 1, 'Анапская ул.', 'anapskaa-ul'),
(41, 1, 'ул. Ангулем', 'ul-angulem'),
(42, 1, 'Античная ул.', 'anticnaa-ul'),
(43, 1, 'Армавирская ул.', 'armavirskaa-ul'),
(44, 1, 'Армавирский пер.', 'armavirskij-per'),
(45, 1, '2-й Армавирский пер.', '2-j-armavirskij-per'),
(46, 1, 'Архиологическая ул.', 'arhiologiceskaa-ul'),
(47, 1, 'пер. Ахматовой', 'per-ahmatovoj'),
(48, 1, 'Аэродромная ул.', 'aerodromnaa-ul'),
(49, 1, 'ул. Литвинчука', 'ul-litvincuka'),
(50, 1, 'Базарный пер.', 'bazarnyj-per'),
(51, 1, 'Базовый пер.', 'bazovyj-per'),
(52, 1, 'Баргузинская ул.', 'barguzinskaa-ul'),
(53, 1, 'ул. Белинского', 'ul-belinskogo'),
(54, 1, 'Березовый пер.', 'berezovyj-per'),
(55, 1, 'ул. Бобрукова щель', 'ul-bobrukova-sel'),
(56, 1, 'Бобрукова щель Светлая ул.', 'bobrukova-sel-svetlaa-ul'),
(57, 1, 'Больничный пер.', 'bolnicnyj-per'),
(58, 1, 'ул. Бориса Пастернака', 'ul-borisa-pasternaka'),
(59, 1, 'Борисовская ул.', 'borisovskaa-ul'),
(60, 1, 'Борисовский пер.', 'borisovskij-per'),
(61, 1, 'ул. Ботылева', 'ul-botyleva'),
(62, 1, 'Буковая ул.', 'bukovaa-ul'),
(63, 1, 'Васильковая ул.', 'vasilkovaa-ul'),
(64, 1, 'ул. Васнецова', 'ul-vasnecova'),
(65, 1, 'ул. Ватутина', 'ul-vatutina'),
(66, 1, 'Вербовая ул.', 'verbovaa-ul'),
(67, 1, 'ул. Верхняя', 'ul-verhnaa'),
(68, 1, 'ул. Веры Белик', 'ul-very-belik'),
(69, 1, 'Весенний пер.', 'vesennij-per'),
(70, 1, 'ул. Весенняя', 'ul-vesennaa'),
(71, 1, 'Взлетная ул.', 'vzletnaa-ul'),
(72, 1, 'пер. Вильямса', 'per-vilamsa'),
(73, 1, 'ул. Вильямса', 'ul-vilamsa'),
(74, 1, 'Виноградная ул.', 'vinogradnaa-ul'),
(75, 1, 'Виноградный пер.', 'vinogradnyj-per'),
(76, 1, 'ул. Виноградорь', 'ul-vinogrador'),
(77, 1, 'Витражный пер.', 'vitraznyj-per'),
(78, 1, 'Вишневая ул.', 'visnevaa-ul'),
(79, 1, 'Вишневый пер.', 'visnevyj-per'),
(80, 1, 'ул. Вишнякова', 'ul-visnakova'),
(81, 1, 'Военный пер.', 'voennyj-per'),
(82, 1, 'Вокзальный пер.', 'vokzalnyj-per'),
(83, 1, 'ул. Волнухина', 'ul-volnuhina'),
(84, 1, '1-й пер. Волнухина', '1-j-per-volnuhina'),
(85, 1, '3-й пер. Волнухина', '3-j-per-volnuhina'),
(86, 1, 'Восточный пер.', 'vostocnyj-per'),
(87, 1, 'Высокая ул.', 'vysokaa-ul'),
(88, 1, 'ул. Гагарина', 'ul-gagarina'),
(89, 1, 'Геленджикская ул.', 'gelendzikskaa-ul'),
(90, 1, 'ул. Генерала Кармалина', 'ul-generala-karmalina'),
(91, 1, 'ул. Генерала Петрова', 'ul-generala-petrova'),
(92, 1, 'ул. Генерала Раевского', 'ul-generala-raevskogo'),
(93, 1, 'ул. Генерала Рашпиля', 'ul-generala-raspila'),
(94, 1, 'Геофизическая ул.', 'geofiziceskaa-ul'),
(95, 1, 'ул. Героев Черноморцев', 'ul-geroev-cernomorcev'),
(96, 1, 'ул. Герцена', 'ul-gercena'),
(97, 1, 'Гефсиманская ул.', 'gefsimanskaa-ul'),
(98, 1, 'ул. Глебова', 'ul-glebova'),
(99, 1, 'ул. Гоголя', 'ul-gogola'),
(100, 1, 'ул. Голубая Бухта', 'ul-golubaa-buhta'),
(101, 1, 'Горная ул.', 'gornaa-ul'),
(102, 1, 'ул. Горького', 'ul-gorkogo'),
(103, 1, 'Гранатовая ул.', 'granatovaa-ul'),
(104, 1, 'ул. Графини Фирсовой', 'ul-grafini-firsovoj'),
(105, 1, 'Греческая ул.', 'greceskaa-ul'),
(106, 1, 'ул. Грибоедова', 'ul-griboedova'),
(107, 1, 'ул. Грина', 'ul-grina'),
(108, 1, 'ул. Гринченко', 'ul-grincenko'),
(109, 1, 'Грушовая ул.', 'grusovaa-ul'),
(110, 1, 'Гурзуфская ул.', 'gurzufskaa-ul'),
(111, 1, 'ул. Дальняя', 'ul-dalnaa'),
(112, 1, 'Дачная ул.', 'dacnaa-ul'),
(113, 1, 'ул. Декабристов', 'ul-dekabristov'),
(114, 1, 'Десантная ул.', 'desantnaa-ul'),
(115, 1, 'Джанхотская ул.', 'dzanhotskaa-ul'),
(116, 1, 'ул. Дзержинского', 'ul-dzerzinskogo'),
(117, 1, 'Дивноморская ул.', 'divnomorskaa-ul'),
(118, 1, 'Динская ул.', 'dinskaa-ul'),
(119, 1, 'ул. Дмитрия Сабинина', 'ul-dmitria-sabinina'),
(120, 1, 'ДНТ Волчья падь', 'dnt-volca-pad'),
(121, 1, 'ул. ДНТ Садовод-1', 'ul-dnt-sadovod-1'),
(122, 1, 'ул. Добролюбова', 'ul-dobrolubova'),
(123, 1, 'ул. Доктора Сульжинского', 'ul-doktora-sulzinskogo'),
(124, 1, 'Долинная ул.', 'dolinnaa-ul'),
(125, 1, 'ул. Дружбы', 'ul-druzby'),
(126, 1, 'Евпаториевская ул.', 'evpatorievskaa-ul'),
(127, 1, 'Европейская ул.', 'evropejskaa-ul'),
(128, 1, 'Ейская ул.', 'ejskaa-ul'),
(129, 1, 'Еловая ул.', 'elovaa-ul'),
(130, 1, 'ул. Ермолия Берхмана', 'ul-ermolia-berhmana'),
(131, 1, 'Железноводская ул.', 'zeleznovodskaa-ul'),
(132, 1, 'Жемчужная ул.', 'zemcuznaa-ul'),
(133, 1, 'ул. Жигуленко', 'ul-zigulenko'),
(134, 1, 'ул. Жуковского', 'ul-zukovskogo'),
(135, 1, 'пер. Жуковского', 'per-zukovskogo'),
(136, 1, 'Западная ул.', 'zapadnaa-ul'),
(137, 1, 'Западный пер.', 'zapadnyj-per'),
(138, 1, 'Заречная ул.', 'zarecnaa-ul'),
(139, 1, 'Заречный пер.', 'zarecnyj-per'),
(140, 1, 'Заставная ул.', 'zastavnaa-ul'),
(141, 1, 'Звездная ул.', 'zvezdnaa-ul'),
(142, 1, 'Зеленая ул.', 'zelenaa-ul'),
(143, 1, 'Зеленый пер.', 'zelenyj-per'),
(144, 1, 'Златодолинская ул.', 'zlatodolinskaa-ul'),
(145, 1, 'ул. Знаменской', 'ul-znamenskoj'),
(146, 1, 'Золотодолинская ул.', 'zolotodolinskaa-ul'),
(147, 1, 'пер. Папанина', 'per-papanina'),
(148, 1, 'ул. Папанина', 'ul-papanina'),
(149, 1, 'Изумрудная ул.', 'izumrudnaa-ul'),
(150, 1, 'Кабардинская ул.', 'kabardinskaa-ul'),
(151, 1, 'Кавказская ул.', 'kavkazskaa-ul'),
(152, 1, 'Казачий пер.', 'kazacij-per'),
(153, 1, 'ул. Казачья', 'ul-kazaca'),
(154, 1, 'ул. Калинина', 'ul-kalinina'),
(155, 1, 'Калиновая ул.', 'kalinovaa-ul'),
(156, 1, 'Калиновая ул.', 'kalinovaa-ul'),
(157, 1, 'Калиновый пер.', 'kalinovyj-per'),
(158, 1, 'ул. Калистратова', 'ul-kalistratova'),
(159, 1, 'Камчатская ул.', 'kamcatskaa-ul'),
(160, 1, 'Керченская ул.', 'kercenskaa-ul'),
(161, 1, 'Киевская ул.', 'kievskaa-ul'),
(162, 1, 'Кизиловая ул.', 'kizilovaa-ul'),
(163, 1, 'Кипарисовая ул.', 'kiparisovaa-ul'),
(164, 1, 'Кипарисовый пер.', 'kiparisovyj-per'),
(165, 1, 'ул. Кирова', 'ul-kirova'),
(166, 1, 'Кисловодская ул.', 'kislovodskaa-ul'),
(167, 1, 'Кленовая ул.', 'klenovaa-ul'),
(168, 1, 'Клубничная ул.', 'klubnicnaa-ul'),
(169, 1, 'Колхозная ул.', 'kolhoznaa-ul'),
(170, 1, 'Комсомольская ул.', 'komsomolskaa-ul'),
(171, 1, 'Конечная ул.', 'konecnaa-ul'),
(172, 1, 'ул. Константина Паустовского', 'ul-konstantina-paustovskogo'),
(173, 1, 'ул. Кончаловского', 'ul-koncalovskogo'),
(174, 1, 'Корабельная ул.', 'korabelnaa-ul'),
(175, 1, 'ул. Короленко', 'ul-korolenko'),
(176, 1, 'Короткий пер.', 'korotkij-per'),
(177, 1, 'ул. Котовского', 'ul-kotovskogo'),
(178, 1, 'ул. Кравцова', 'ul-kravcova'),
(179, 1, 'ул. Крамского', 'ul-kramskogo'),
(180, 1, 'Красивая ул.', 'krasivaa-ul'),
(181, 1, 'Красная ул.', 'krasnaa-ul'),
(182, 1, 'Красноармейская ул.', 'krasnoarmejskaa-ul'),
(183, 1, 'Красногвардейская ул.', 'krasnogvardejskaa-ul'),
(184, 1, 'Краснодарская ул.', 'krasnodarskaa-ul'),
(185, 1, 'Краснодонская ул.', 'krasnodonskaa-ul'),
(186, 1, 'ул. Красных Партизан', 'ul-krasnyh-partizan'),
(187, 1, 'Кропоткинская ул.', 'kropotkinskaa-ul'),
(188, 1, 'ул. Крупской', 'ul-krupskoj'),
(189, 1, 'ул. Крылова', 'ul-krylova'),
(190, 1, 'Крымская ул.', 'krymskaa-ul'),
(191, 1, 'ул. Ксении Ярцевой', 'ul-ksenii-arcevoj'),
(192, 1, 'Кубанская ул.', 'kubanskaa-ul'),
(193, 1, 'ул. Кузнецова', 'ul-kuznecova'),
(194, 1, 'ул. Куйбышева', 'ul-kujbyseva'),
(195, 1, 'ул. Куникова', 'ul-kunikova'),
(196, 1, 'ул. Куприна', 'ul-kuprina'),
(197, 1, 'ул. Куприянова щель', 'ul-kuprianova-sel'),
(198, 1, 'Курганная ул.', 'kurgannaa-ul'),
(199, 1, 'Курзальная ул.', 'kurzalnaa-ul'),
(200, 1, 'Курортная ул.', 'kurortnaa-ul'),
(201, 1, 'ул. Кустодиева', 'ul-kustodieva'),
(202, 1, 'ул. Кутузова', 'ul-kutuzova'),
(203, 1, 'Лабинская ул.', 'labinskaa-ul'),
(204, 1, 'Лавровая ул.', 'lavrovaa-ul'),
(205, 1, 'Лазаревская ул.', 'lazarevskaa-ul'),
(206, 1, 'Лазурная ул.', 'lazurnaa-ul'),
(207, 1, 'ул. Левитана', 'ul-levitana'),
(208, 1, 'ул. Левицкого', 'ul-levickogo'),
(209, 1, 'ул. Ленина', 'ul-lenina'),
(210, 1, 'Ленкоранская ул.', 'lenkoranskaa-ul'),
(211, 1, 'ул. Леселидзе', 'ul-leselidze'),
(212, 1, 'Лесная ул.', 'lesnaa-ul'),
(213, 1, 'ул. Лесник', 'ul-lesnik'),
(214, 1, 'Летний пер.', 'letnij-per'),
(215, 1, 'ул. Летняя', 'ul-letnaa'),
(216, 1, 'Липовая ул.', 'lipovaa-ul'),
(217, 1, 'ул. Ломоносова', 'ul-lomonosova'),
(218, 1, 'ул. Луначарского', 'ul-lunacarskogo'),
(219, 1, 'Любимая ул.', 'lubimaa-ul'),
(220, 1, 'ул. Борисова', 'ul-borisova'),
(221, 1, 'Магистральная ул.', 'magistralnaa-ul'),
(222, 1, 'Магнитная ул.', 'magnitnaa-ul'),
(223, 1, 'Магнитный пер.', 'magnitnyj-per'),
(224, 1, 'ул. Магнолия', 'ul-magnolia'),
(225, 1, 'Майкопская ул.', 'majkopskaa-ul'),
(226, 1, 'Майская ул.', 'majskaa-ul'),
(227, 1, 'Малахитовая ул.', 'malahitovaa-ul'),
(228, 1, 'ул. Малевича', 'ul-malevica'),
(229, 1, 'ул. Малевича', 'ul-malevica'),
(230, 1, 'Малиновая ул.', 'malinovaa-ul'),
(231, 1, 'Малиновый пер.', 'malinovyj-per'),
(232, 1, 'Малоземельская ул.', 'malozemelskaa-ul'),
(233, 1, 'Малый пер.', 'malyj-per'),
(234, 1, 'ул. Маршала Жукова', 'ul-marsala-zukova'),
(235, 1, 'ул. Маршала Жукова', 'ul-marsala-zukova'),
(236, 1, 'ул. Матросова', 'ul-matrosova'),
(237, 1, 'ул. Маяк', 'ul-maak'),
(238, 1, 'ул. Маяковского', 'ul-maakovskogo'),
(239, 1, 'Маячная ул.', 'maacnaa-ul'),
(240, 1, 'ул. Мира', 'ul-mira'),
(241, 1, 'Мирная ул.', 'mirnaa-ul'),
(242, 1, 'Михайловская ул.', 'mihajlovskaa-ul'),
(243, 1, 'ул. Мичурина', 'ul-micurina'),
(244, 1, 'ул. Можарова щель', 'ul-mozarova-sel'),
(245, 1, 'Можжевеловая ул.', 'mozzevelovaa-ul'),
(246, 1, 'Молодежная ул.', 'molodeznaa-ul'),
(247, 1, 'Морская ул.', 'morskaa-ul'),
(248, 1, 'ул. Морских Геологов', 'ul-morskih-geologov'),
(249, 1, 'Мостовая ул.', 'mostovaa-ul'),
(250, 1, 'Музейная ул.', 'muzejnaa-ul'),
(251, 1, 'Мускатная ул.', 'muskatnaa-ul'),
(252, 1, 'Набережная ул.', 'nabereznaa-ul'),
(253, 1, 'ул. Нахимова', 'ul-nahimova'),
(254, 1, 'ул. Некрасова', 'ul-nekrasova'),
(255, 1, 'Новая ул.', 'novaa-ul'),
(256, 1, 'Новороссийская ул.', 'novorossijskaa-ul'),
(257, 1, 'ул. НСОТ Виноградарь', 'ul-nsot-vinogradar'),
(258, 1, 'ул. НСТ Бетта', 'ul-nst-betta'),
(259, 1, 'ул. Трабша', 'ul-trabsa'),
(260, 1, 'ул. Трабша', 'ul-trabsa'),
(261, 1, 'Обзорная ул.', 'obzornaa-ul'),
(262, 1, 'Объездная ул.', 'obezdnaa-ul'),
(263, 1, 'Овражная ул.', 'ovraznaa-ul'),
(264, 1, 'Одесская ул.', 'odesskaa-ul'),
(265, 1, 'Озерная ул.', 'ozernaa-ul'),
(266, 1, 'Озерный пер.', 'ozernyj-per'),
(267, 1, 'ул. Океанологов', 'ul-okeanologov'),
(268, 1, 'Октябрьская ул.', 'oktabrskaa-ul'),
(269, 1, 'Ольховая ул.', 'olhovaa-ul'),
(270, 1, 'ул. Орджоникидзе', 'ul-ordzonikidze'),
(271, 1, 'Ореховая ул.', 'orehovaa-ul'),
(272, 1, 'ул. Осенняя', 'ul-osennaa'),
(273, 1, 'ул. Островского', 'ul-ostrovskogo'),
(274, 1, 'Панорамная ул.', 'panoramnaa-ul'),
(275, 1, 'Парковая ул.', 'parkovaa-ul'),
(276, 1, 'Парусная ул.', 'parusnaa-ul'),
(277, 1, 'Первомайская ул.', 'pervomajskaa-ul'),
(278, 1, 'Первомайский пер.', 'pervomajskij-per'),
(279, 1, 'Персиковая ул.', 'persikovaa-ul'),
(280, 1, 'ул. Пилотов', 'ul-pilotov'),
(281, 1, 'Пионерская ул.', 'pionerskaa-ul'),
(282, 1, 'ул. Писарева', 'ul-pisareva'),
(283, 1, 'ул. Победы', 'ul-pobedy'),
(284, 1, 'Пограничная ул.', 'pogranicnaa-ul'),
(285, 1, 'Подгорная ул.', 'podgornaa-ul'),
(286, 1, 'ул. Покровского', 'ul-pokrovskogo'),
(287, 1, 'Полевая ул.', 'polevaa-ul'),
(288, 1, 'ул. Поленова', 'ul-polenova'),
(289, 1, 'Портовая ул.', 'portovaa-ul'),
(290, 1, 'ул. Портовый Спуск', 'ul-portovyj-spusk'),
(291, 1, 'Почтовая ул.', 'poctovaa-ul'),
(292, 1, 'Прасковеевская ул.', 'praskoveevskaa-ul'),
(293, 1, 'Предгорная ул.', 'predgornaa-ul'),
(294, 1, 'Прибойная ул.', 'pribojnaa-ul'),
(295, 1, 'Прибрежная ул.', 'pribreznaa-ul'),
(296, 1, 'Прибрежный пер.', 'pribreznyj-per'),
(297, 1, 'Приветливая ул.', 'privetlivaa-ul'),
(298, 1, 'Придорожная ул.', 'pridoroznaa-ul'),
(299, 1, 'Придорожный пер.', 'pridoroznyj-per'),
(300, 1, 'Приморская ул.', 'primorskaa-ul'),
(301, 1, 'Пролетарская ул.', 'proletarskaa-ul'),
(302, 1, 'Просторная ул.', 'prostornaa-ul'),
(303, 1, 'Просторный пер.', 'prostornyj-per'),
(304, 1, 'Прохладная ул.', 'prohladnaa-ul'),
(305, 1, 'Прохладный пер.', 'prohladnyj-per'),
(306, 1, 'ул. Проценко', 'ul-procenko'),
(307, 1, 'ул. ПСК Пищевик', 'ul-psk-pisevik'),
(308, 1, 'ул. Пушкина', 'ul-puskina'),
(309, 1, 'Пятигорская ул.', 'patigorskaa-ul'),
(310, 1, 'Пятигорский пер.', 'patigorskij-per'),
(311, 1, 'ул. Никольской', 'ul-nikolskoj'),
(312, 1, 'Радужная ул.', 'raduznaa-ul'),
(313, 1, 'Радужный пер.', 'raduznyj-per'),
(314, 1, 'Революционная ул.', 'revolucionnaa-ul'),
(315, 1, 'ул. Репина', 'ul-repina'),
(316, 1, 'Родниковая ул.', 'rodnikovaa-ul'),
(317, 1, 'Рождественский пер.', 'rozdestvenskij-per'),
(318, 1, 'Розовая ул.', 'rozovaa-ul'),
(319, 1, 'ул. Розы Люксембург', 'ul-rozy-luksemburg'),
(320, 1, 'ул. Рокотова', 'ul-rokotova'),
(321, 1, 'Ромашковая ул.', 'romaskovaa-ul'),
(322, 1, 'Ромашковый пер.', 'romaskovyj-per'),
(323, 1, 'Российская ул.', 'rossijskaa-ul'),
(324, 1, 'Ростовский пер.', 'rostovskij-per'),
(325, 1, 'Рубиновый пер.', 'rubinovyj-per'),
(326, 1, 'ул. Рублева', 'ul-rubleva'),
(327, 1, 'пер. Рублева', 'per-rubleva'),
(328, 1, 'Ручейная ул.', 'rucejnaa-ul'),
(329, 1, 'Рыбацкая ул.', 'rybackaa-ul'),
(330, 1, 'ул. Есенина', 'ul-esenina'),
(331, 1, 'Савицкая ул.', 'savickaa-ul'),
(332, 1, 'Садовая ул.', 'sadovaa-ul'),
(333, 1, 'ул. Саинкова', 'ul-sainkova'),
(334, 1, 'пер. Саинкова', 'per-sainkova'),
(335, 1, 'Санаторная ул.', 'sanatornaa-ul'),
(336, 1, '4-й Санаторный пер.', '4-j-sanatornyj-per'),
(337, 1, 'ул. Свердлова', 'ul-sverdlova'),
(338, 1, 'Светлая ул.', 'svetlaa-ul'),
(339, 1, 'Светлый пер.', 'svetlyj-per'),
(340, 1, 'пер. Связистов', 'per-svazistov'),
(341, 1, 'Севастопольская ул.', 'sevastopolskaa-ul'),
(342, 1, 'Северная ул.', 'severnaa-ul'),
(343, 1, 'Северный пер.', 'severnyj-per'),
(344, 1, 'Североморская ул.', 'severomorskaa-ul'),
(345, 1, 'ул. Серафимовича', 'ul-serafimovica'),
(346, 1, 'ул. Серова', 'ul-serova'),
(347, 1, 'ул. Серомашина щель', 'ul-seromasina-sel'),
(348, 1, 'Сибирская ул.', 'sibirskaa-ul'),
(349, 1, '1-й Сибирский пер.', '1-j-sibirskij-per'),
(350, 1, '2-й Сибирский пер.', '2-j-sibirskij-per'),
(351, 1, 'ул. Сипягина', 'ul-sipagina'),
(352, 1, 'Славянская ул.', 'slavanskaa-ul'),
(353, 1, 'Сменная ул.', 'smennaa-ul'),
(354, 1, 'Советская ул.', 'sovetskaa-ul'),
(355, 1, 'Советский пер.', 'sovetskij-per'),
(356, 1, 'Совхозная ул.', 'sovhoznaa-ul'),
(357, 1, 'Совхозный пер.', 'sovhoznyj-per'),
(358, 1, 'Солнечная ул.', 'solnecnaa-ul'),
(359, 1, 'Солнцедарская ул.', 'solncedarskaa-ul'),
(360, 1, 'Солнцедарская ул.', 'solncedarskaa-ul'),
(361, 1, 'Солнцедарская ул.', 'solncedarskaa-ul'),
(362, 1, 'Сосновая ул.', 'sosnovaa-ul'),
(363, 1, 'Сосновый пер.', 'sosnovyj-per'),
(364, 1, 'Сочинская ул.', 'socinskaa-ul'),
(365, 1, 'Спортивная ул.', 'sportivnaa-ul'),
(366, 1, 'ул. Средняя', 'ul-srednaa'),
(367, 1, 'ул. Старшинова', 'ul-starsinova'),
(368, 1, 'ул. Степана Эрьзи', 'ul-stepana-erzi'),
(369, 1, 'Степная ул.', 'stepnaa-ul'),
(370, 1, 'Стрежевая ул.', 'strezevaa-ul'),
(371, 1, 'ул. Суворова', 'ul-suvorova'),
(372, 1, 'ул. Сурикова', 'ul-surikova'),
(373, 1, 'ул. Макаровой', 'ul-makarovoj'),
(374, 1, 'Таманская ул.', 'tamanskaa-ul'),
(375, 1, 'Тбилисский пер.', 'tbilisskij-per'),
(376, 1, 'ул. Тельмана', 'ul-telmana'),
(377, 1, 'Темрюкская ул.', 'temrukskaa-ul'),
(378, 1, 'Темрюкский пер.', 'temrukskij-per'),
(379, 1, 'Тенистая ул.', 'tenistaa-ul'),
(380, 1, 'ул. Тимирязева', 'ul-timirazeva'),
(381, 1, 'Тиссовая ул.', 'tissovaa-ul'),
(382, 1, 'Тихорецкая ул.', 'tihoreckaa-ul'),
(383, 1, 'ул. Толбухина', 'ul-tolbuhina'),
(384, 1, 'ул. Толстого', 'ul-tolstogo'),
(385, 1, 'ул. Тонкий мыс', 'ul-tonkij-mys'),
(386, 1, 'Тополиная ул.', 'topolinaa-ul'),
(387, 1, 'Трехпрудная ул.', 'trehprudnaa-ul'),
(388, 1, 'Туапсинская ул.', 'tuapsinskaa-ul'),
(389, 1, 'ул. Тургенева', 'ul-turgeneva'),
(390, 1, 'Туристическая ул.', 'turisticeskaa-ul'),
(391, 1, 'Ульяновская ул.', 'ulanovskaa-ul'),
(392, 1, 'Уральская ул.', 'uralskaa-ul'),
(393, 1, 'ул. Рубахо', 'ul-rubaho'),
(394, 1, 'ул. Щербины', 'ul-serbiny'),
(395, 1, 'ул. Фадеева', 'ul-fadeeva'),
(396, 1, 'Феодосийская ул.', 'feodosijskaa-ul'),
(397, 1, 'Фисташковая ул.', 'fistaskovaa-ul'),
(398, 1, 'Фруктовая ул.', 'fruktovaa-ul'),
(399, 1, 'ул. Фрунзе', 'ul-frunze'),
(400, 1, 'ул. Фурманова', 'ul-furmanova'),
(401, 1, 'ул. Халтурина', 'ul-halturina'),
(402, 1, 'Херсонская ул.', 'hersonskaa-ul'),
(403, 1, 'ул. Ходенко', 'ul-hodenko'),
(404, 1, 'Цветочная ул.', 'cvetocnaa-ul'),
(405, 1, 'ул. Циолковского', 'ul-ciolkovskogo'),
(406, 1, 'ул. Чайковского', 'ul-cajkovskogo'),
(407, 1, 'ул. Чапаева', 'ul-capaeva'),
(408, 1, 'ул. Череватенко', 'ul-cerevatenko'),
(409, 1, 'Черниговская ул.', 'cernigovskaa-ul'),
(410, 1, 'Черноморская ул.', 'cernomorskaa-ul'),
(411, 1, 'ул. Черноморцев', 'ul-cernomorcev'),
(412, 1, 'ул. Чернышевского', 'ul-cernysevskogo'),
(413, 1, 'ул. Черняховского', 'ul-cernahovskogo'),
(414, 1, 'ул. Чехова', 'ul-cehova'),
(415, 1, 'ул. Чкалова', 'ul-ckalova'),
(416, 1, 'ул. Шевченко', 'ul-sevcenko'),
(417, 1, 'ул. Шереметьева', 'ul-seremeteva'),
(418, 1, 'ул. Шишкина', 'ul-siskina'),
(419, 1, 'Школьная ул.', 'skolnaa-ul'),
(420, 1, 'Школьный пер.', 'skolnyj-per'),
(421, 1, 'ул. Шмидта', 'ul-smidta'),
(422, 1, 'Шоссейная ул.', 'sossejnaa-ul'),
(423, 1, 'ул. Энгельса', 'ul-engelsa'),
(424, 1, 'Южная ул.', 'uznaa-ul'),
(425, 1, 'Южный пер.', 'uznyj-per'),
(426, 1, 'Ялтинская ул.', 'altinskaa-ul'),
(427, 1, 'ул. Янина щель', 'ul-anina-sel'),
(428, 1, 'Янтарная ул.', 'antarnaa-ul'),
(429, 1, 'Ясеневая ул.', 'asenevaa-ul'),
(430, 1, 'Ясная ул.', 'asnaa-ul'),
(431, 1, 'мкр. Парус', 'mkr-parus'),
(432, 1, 'Солнечный проезд', 'solnecnyj-proezd'),
(433, 1, 'Казачий проезд', 'kazacij-proezd'),
(434, 2, 'Спортивная ул.', 'sportivnaa-ul'),
(435, 2, 'Таманская ул.', 'tamanskaa-ul'),
(436, 2, 'Лесной пер.', 'lesnoj-per'),
(437, 2, 'ул. Мира', 'ul-mira'),
(438, 2, 'ул. Дзержинского', 'ul-dzerzinskogo'),
(439, 2, 'Совхозная ул.', 'sovhoznaa-ul'),
(440, 2, 'Таманский пр-д', 'tamanskij-pr-d'),
(441, 2, 'ул. Мягкая щель', 'ul-magkaa-sel'),
(442, 2, 'Заречная ул.', 'zarecnaa-ul'),
(443, 3, 'Курортная ул.', 'kurortnaa-ul'),
(444, 3, 'Мускатная ул.', 'muskatnaa-ul'),
(445, 3, 'Дивная ул.', 'divnaa-ul'),
(446, 3, 'Приморская ул.', 'primorskaa-ul'),
(447, 3, 'Светлый пер.', 'svetlyj-per'),
(448, 3, 'ул. Кирова', 'ul-kirova'),
(449, 3, 'ул. Ленина', 'ul-lenina'),
(450, 3, 'Солнечный пер.', 'solnecnyj-per'),
(451, 3, 'Черноморская ул.', 'cernomorskaa-ul'),
(452, 3, 'Виноградная ул.', 'vinogradnaa-ul'),
(453, 3, 'Черноморский пер.', 'cernomorskij-per'),
(454, 3, 'Партизанская ул.', 'partizanskaa-ul'),
(455, 3, 'ул. Мичурина', 'ul-micurina'),
(456, 3, 'Октябрьская ул.', 'oktabrskaa-ul'),
(457, 3, 'Горная ул.', 'gornaa-ul'),
(458, 3, 'Пионерская ул.', 'pionerskaa-ul'),
(459, 3, 'Голубодальская ул.', 'golubodalskaa-ul'),
(460, 3, 'Южный пер.', 'uznyj-per'),
(461, 3, 'ул. Светлинского', 'ul-svetlinskogo'),
(462, 3, 'ул. Короленко', 'ul-korolenko'),
(463, 3, 'ул. Олега Кошевого', 'ul-olega-kosevogo'),
(464, 3, 'Северная ул.', 'severnaa-ul'),
(465, 3, 'Полевая ул.', 'polevaa-ul'),
(466, 3, 'Каштановая ул.', 'kastanovaa-ul'),
(467, 3, 'Платановая ул.', 'platanovaa-ul'),
(468, 3, 'Березовая ул.', 'berezovaa-ul'),
(469, 3, 'Кленовая ул.', 'klenovaa-ul'),
(470, 3, 'Дивный пер.', 'divnyj-per'),
(471, 3, 'СНТ Строитель', 'snt-stroitel'),
(472, 3, 'СНТ Восход', 'snt-voshod'),
(473, 3, 'СНТ Лесное', 'snt-lesnoe'),
(474, 3, 'ул. Героев', 'ul-geroev'),
(475, 3, 'СНТ Парус', 'snt-parus'),
(476, 4, 'ул. Капитана Котанова', 'ul-kapitana-kotanova'),
(477, 4, 'Черноморская ул.', 'cernomorskaa-ul'),
(478, 4, 'ул. Мира', 'ul-mira'),
(479, 4, 'Квартал Кедровая Роща', 'kvartal-kedrovaa-rosa'),
(480, 4, 'Революционная ул.', 'revolucionnaa-ul'),
(481, 4, 'Греческая ул.', 'greceskaa-ul'),
(482, 4, 'Бестужева ул.', 'bestuzeva-ul'),
(483, 4, 'Партизанская ул.', 'partizanskaa-ul'),
(484, 4, 'Степная ул.', 'stepnaa-ul'),
(485, 4, 'Луговая ул.', 'lugovaa-ul'),
(486, 4, 'Янтарная ул.', 'antarnaa-ul'),
(487, 4, 'Солнечная ул.', 'solnecnaa-ul'),
(488, 4, 'Восточный пер.', 'vostocnyj-per'),
(489, 4, 'Коллективная ул.', 'kollektivnaa-ul'),
(490, 4, 'Геленджикская ул.', 'gelendzikskaa-ul'),
(491, 4, 'Восточная ул.', 'vostocnaa-ul'),
(492, 4, 'Южный пер.', 'uznyj-per'),
(493, 4, 'Пролетарская ул.', 'proletarskaa-ul'),
(494, 4, 'Горная ул.', 'gornaa-ul'),
(496, 4, 'Совхозная ул.', 'sovhoznaa-ul'),
(497, 4, 'Школьная ул.', 'skolnaa-ul'),
(498, 4, 'Спортивная ул.', 'sportivnaa-ul'),
(499, 4, 'ул. Дружбы', 'ul-druzby'),
(500, 4, 'ул. Генерала Корецкого', 'ul-generala-koreckogo'),
(501, 4, 'Ягодная ул.', 'agodnaa-ul'),
(502, 4, 'Родниковая ул.', 'rodnikovaa-ul'),
(503, 4, 'Пионерская ул.', 'pionerskaa-ul'),
(504, 4, 'Лазурный пер.', 'lazurnyj-per'),
(505, 4, 'Акварельная ул.', 'akvarelnaa-ul'),
(506, 4, 'Горный пер.', 'gornyj-per'),
(507, 4, 'ул. Советов', 'ul-sovetov'),
(508, 4, 'ул. Корницкого', 'ul-kornickogo'),
(509, 4, 'Новороссийская ул.', 'novorossijskaa-ul'),
(510, 4, 'Зеленая ул.', 'zelenaa-ul'),
(511, 4, 'ул. Гайдара', 'ul-gajdara'),
(512, 4, 'Октябрьская ул.', 'oktabrskaa-ul'),
(513, 4, 'Новая ул.', 'novaa-ul'),
(514, 4, 'Дообская ул.', 'doobskaa-ul'),
(515, 4, 'Олимпийский пер.', 'olimpijskij-per'),
(516, 4, 'Абрикосовая ул.', 'abrikosovaa-ul'),
(517, 4, 'Тихий пер.', 'tihij-per'),
(518, 4, 'Приветливая ул.', 'privetlivaa-ul'),
(519, 4, 'Надымский пер.', 'nadymskij-per'),
(520, 4, 'Кабардинский пер.', 'kabardinskij-per'),
(521, 4, 'Ореховая ул.', 'orehovaa-ul'),
(522, 4, 'Каштановая ул.', 'kastanovaa-ul'),
(523, 4, 'ул. Кизиловая', 'ul-kizilovaa'),
(524, 4, 'Вишневый пер.', 'visnevyj-per'),
(525, 3, 'Виноградная ул.', 'vinogradnaa-ul'),
(526, 4, 'Радужная ул.', 'raduznaa-ul'),
(527, 5, 'Садовое товарищество Садовод', 'sadovoe-tovarisestvo-sadovod'),
(528, 5, 'Заречная ул.', 'zarecnaa-ul'),
(529, 5, 'Кирпичная ул.', 'kirpicnaa-ul'),
(530, 5, 'ул. Кирова', 'ul-kirova'),
(531, 5, 'Сибирская ул.', 'sibirskaa-ul'),
(532, 6, 'Шоссейная ул.', 'sossejnaa-ul'),
(533, 6, 'Подгорная ул.', 'podgornaa-ul'),
(534, 6, 'ул. Мира', 'ul-mira'),
(535, 6, 'Новая ул.', 'novaa-ul'),
(536, 6, 'Садовый пер.', 'sadovyj-per'),
(537, 6, 'Садовая ул.', 'sadovaa-ul'),
(538, 6, 'Ореховая ул.', 'orehovaa-ul'),
(539, 6, 'Заречная ул.', 'zarecnaa-ul'),
(540, 6, 'Школьный пер.', 'skolnyj-per'),
(541, 6, 'Дружный пер.', 'druznyj-per'),
(542, 6, 'Ближний пер.', 'bliznij-per'),
(543, 6, 'Лунная ул.', 'lunnaa-ul'),
(544, 6, 'Персиковая ул.', 'persikovaa-ul'),
(545, 6, 'Кипарисовая ул.', 'kiparisovaa-ul'),
(546, 6, 'Пчелиная ул.', 'pcelinaa-ul'),
(547, 7, 'Центральная ул.', 'centralnaa-ul'),
(548, 7, 'ул. Ленина', 'ul-lenina'),
(549, 7, 'Восточная ул.', 'vostocnaa-ul'),
(550, 8, 'Лесной просп.', 'lesnoj-prosp'),
(551, 8, 'Черноморская ул.', 'cernomorskaa-ul'),
(552, 8, 'ул. Короленко', 'ul-korolenko'),
(553, 8, 'Джанхотский пер.', 'dzanhotskij-per'),
(554, 8, 'Морской пер.', 'morskoj-per'),
(555, 9, 'Нагорная ул.', 'nagornaa-ul'),
(556, 9, 'Подгорная ул.', 'podgornaa-ul'),
(557, 9, 'ул. Кукушкина', 'ul-kukuskina'),
(558, 9, 'Морская ул.', 'morskaa-ul'),
(559, 9, 'ул. Кизириди', 'ul-kiziridi'),
(560, 9, 'Заречная ул.', 'zarecnaa-ul'),
(561, 9, 'Партизанская ул.', 'partizanskaa-ul'),
(562, 9, 'Кедровая ул.', 'kedrovaa-ul'),
(563, 9, 'Молодежная ул.', 'molodeznaa-ul'),
(564, 9, 'ул. Романтиков', 'ul-romantikov'),
(565, 9, 'ул. Ветеранов', 'ul-veteranov'),
(566, 9, 'Лесная ул.', 'lesnaa-ul'),
(567, 9, 'Речная ул.', 'recnaa-ul'),
(568, 9, 'ул. Энтузиастов', 'ul-entuziastov'),
(569, 9, 'Виноградная ул.', 'vinogradnaa-ul'),
(570, 9, 'Светлая ул.', 'svetlaa-ul'),
(571, 9, 'Совхозная ул.', 'sovhoznaa-ul'),
(572, 9, 'Резервная ул.', 'rezervnaa-ul'),
(573, 9, 'Ореховая ул.', 'orehovaa-ul'),
(574, 9, 'Абрикосовая ул.', 'abrikosovaa-ul'),
(575, 9, 'Горная ул.', 'gornaa-ul'),
(576, 9, 'Прохладная ул.', 'prohladnaa-ul'),
(577, 9, 'Тенистая ул.', 'tenistaa-ul');

-- --------------------------------------------------------

--
-- Структура таблицы `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tag`
--

INSERT INTO `tag` (`id`, `title`) VALUES
(1, '1'),
(2, '2'),
(3, '3');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`username`, `password`, `auth_key`, `id`) VALUES
('admin', '$2y$13$dY6RIpHD7PQ2B7puXAFnF.kVaEGLZZa1p15liOMbangmKL93ySZWW', 'wvtfjCDpunyba2LHB_varnrzHDLONTz2', '0');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `article_tag`
--
ALTER TABLE `article_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_article_article_id` (`article_id`),
  ADD KEY `idx_tag_id` (`tag_id`);

--
-- Индексы таблицы `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `blog_user`
--
ALTER TABLE `blog_user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-post-user_id` (`user_id`),
  ADD KEY `idx-article_id` (`article_id`);

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `street`
--
ALTER TABLE `street`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-street-city_id` (`city_id`);

--
-- Индексы таблицы `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `article_tag`
--
ALTER TABLE `article_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `blog_user`
--
ALTER TABLE `blog_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `street`
--
ALTER TABLE `street`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=578;

--
-- AUTO_INCREMENT для таблицы `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `article_tag`
--
ALTER TABLE `article_tag`
  ADD CONSTRAINT `fk-tag_id` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tag_article_article_id` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk-article_id` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-post-user_id` FOREIGN KEY (`user_id`) REFERENCES `blog_user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
