-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 04 2023 г., 13:21
-- Версия сервера: 8.0.24
-- Версия PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `obviouscontrol`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `priceday` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`email`, `password`, `priceday`) VALUES
('qwertyu@ukr.net', 'qwertyui', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `user_id` int NOT NULL,
  `order_date` varchar(255) COLLATE utf8_bin NOT NULL,
  `order_status` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_date`, `order_status`) VALUES
(2, 1, '2022-10-21', 'Complete'),
(3, 7, '2022-11-11', 'Pending'),
(17, 21, '2022-11-19', 'Pending'),
(18, 21, '2022-11-19', 'Pending'),
(19, 23, '2022-11-19', 'Pending'),
(20, 24, '2022-11-19', 'Pending'),
(21, 21, '2022-11-19', 'Pending'),
(22, 21, '2022-11-19', 'Pending'),
(23, 21, '2022-11-19', 'Pending'),
(24, 28, '2022-11-19', 'Pending'),
(25, 29, '2022-11-19', 'Pending'),
(26, 29, '2022-11-19', 'Pending'),
(27, 31, '2022-11-19', 'Pending'),
(28, 32, '2022-11-19', 'Pending'),
(29, 33, '2022-11-19', 'Pending'),
(30, 33, '2022-11-19', 'Pending'),
(31, 35, '2022-11-19', 'Pending'),
(32, 36, '2022-11-19', 'Pending'),
(33, 36, '2022-11-19', 'Pending'),
(34, 36, '2022-11-19', 'Pending'),
(35, 39, '2022-11-19', 'Pending'),
(36, 40, '2022-11-19', 'Pending'),
(37, 40, '2022-11-19', 'Pending'),
(38, 42, '2022-11-19', 'Pending'),
(39, 43, '2022-12-09', 'Pending');

-- --------------------------------------------------------

--
-- Структура таблицы `payments`
--

CREATE TABLE `payments` (
  `payment_id` int NOT NULL,
  `user_id` int NOT NULL,
  `order_id` int NOT NULL,
  `payment_date` date NOT NULL,
  `payment_sum` double NOT NULL,
  `period` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `payments`
--

INSERT INTO `payments` (`payment_id`, `user_id`, `order_id`, `payment_date`, `payment_sum`, `period`) VALUES
(1, 8, 3, '2022-11-20', 40, 2),
(2, 1, 2, '2022-11-20', 121, 22),
(3, 1, 2, '2022-11-21', 2323, 23),
(4, 1, 2, '2022-11-30', 0, 2),
(5, 1, 2, '2022-12-01', 0, 9),
(6, 43, 39, '2022-12-09', 338, 19),
(7, 1, 2, '2023-02-02', 0, 3),
(8, 1, 2, '2023-02-02', 0, 3),
(9, 1, 2, '2023-02-02', 0, 2),
(10, 1, 2, '2023-02-02', 0, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `translations`
--

CREATE TABLE `translations` (
  `id` int NOT NULL,
  `language` varchar(3) COLLATE utf8_bin NOT NULL,
  `element_id` varchar(50) COLLATE utf8_bin NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `translations`
--

INSERT INTO `translations` (`id`, `language`, `element_id`, `content`) VALUES
(1, 'en', 'dashboard-title', 'Dashboard'),
(2, 'ua', 'dashboard-title', 'Головна'),
(3, 'en', 'customers-title', 'Customers'),
(4, 'ua', 'customers-title', 'Клієнти'),
(5, 'en', 'add-customer-title', 'Add Customer'),
(6, 'ua', 'add-customer-title', 'Додати клієнта'),
(7, 'en', 'orders-title', 'Orders'),
(8, 'ua', 'orders-title', 'Замовлення'),
(9, 'en', 'payments-title', 'Payments'),
(10, 'ua', 'payments-title', 'Платіжі'),
(11, 'en', 'documentation-title', 'Documentation'),
(12, 'ua', 'documentation-title', 'Документація'),
(13, 'en', 'settings-title', 'Settings'),
(14, 'ua', 'settings-title', 'Налаштування'),
(15, 'en', 'logout-title', 'Log Out'),
(16, 'ua', 'logout-title', 'Вийти із системи'),
(17, 'en', 'overview-customers-title', 'Overview Customers'),
(18, 'ua', 'overview-customers-title', 'Переглянути клієнтів'),
(19, 'en', 'overview-dashboard-title', 'Overview Dashboard'),
(20, 'ua', 'overview-dashboard-title', 'Переглянути Дошку'),
(21, 'en', 'overview-orders-title', 'Overview Orders'),
(22, 'ua', 'overview-orders-title', 'Переглянути Замовлення'),
(23, 'en', 'overview-payments-title', 'Overview Payments'),
(24, 'ua', 'overview-payments-title', 'Переглянути Платежі'),
(25, 'en', 'options-navbar-title', 'Options'),
(26, 'ua', 'options-navbar-title', 'Опції'),
(27, 'en', 'actions-navbar-title', 'Actions'),
(28, 'ua', 'actions-navbar-title', 'Дії'),
(29, 'en', 'filter-btn-title', 'Filter'),
(30, 'ua', 'filter-btn-title', 'Фільтрувати'),
(31, 'en', 'clear-btn-title', 'Clear'),
(32, 'ua', 'clear-btn-title', 'Скинути'),
(33, 'en', 'create-user-btn-title', 'Create user'),
(34, 'ua', 'create-user-btn-title', 'Створити користувача'),
(35, 'en', 'create-user-title', 'Create User'),
(36, 'ua', 'create-user-title', 'Створити Користувача'),
(37, 'en', 'contacts-label-title', 'Contacts'),
(38, 'ua', 'contacts-label-title', 'Контакти'),
(39, 'en', 'email-label-title', 'Email'),
(40, 'ua', 'email-label-title', 'Електронна Пошта'),
(41, 'en', 'address-label-title', 'Address'),
(42, 'ua', 'address-label-title', 'Адреса'),
(43, 'en', 'password-label-title', 'Password'),
(44, 'ua', 'password-label-title', 'Пароль'),
(45, 'en', 'block-label-title', 'Block'),
(46, 'ua', 'block-label-title', 'Заблокований'),
(47, 'en', 'datestart-label-title', 'Date Start'),
(48, 'ua', 'datestart-label-title', 'Дата Початку'),
(49, 'en', 'dateend-label-title', 'Date End'),
(50, 'ua', 'dateend-label-title', 'Дата Закінчення'),
(51, 'en', 'delete-btn-title', 'Delete'),
(52, 'ua', 'delete-btn-title', 'Видалити'),
(53, 'en', 'edit-btn-title', 'Edit'),
(54, 'ua', 'edit-btn-title', 'Редагувати'),
(55, 'en', 'date-btn-title', 'Date'),
(56, 'ua', 'date-btn-title', 'Дата'),
(57, 'en', 'status-label-title', 'Status'),
(58, 'ua', 'status-label-title', 'Статус'),
(59, 'en', 'home-landing-title', 'Home'),
(60, 'ua', 'home-landing-title', 'Головна'),
(61, 'en', 'about-landing-title', 'About'),
(62, 'ua', 'about-landing-title', 'Інформація'),
(63, 'en', 'opportunities-landing-title', 'Opportunities'),
(64, 'ua', 'opportunities-landing-title', 'Можливості'),
(65, 'en', 'purchase-landing-title', 'Purchase'),
(66, 'ua', 'purchase-landing-title', 'Придбати');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `contacts` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `username` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_address` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_email` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_pass` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_status` varchar(255) COLLATE utf8_bin NOT NULL,
  `datestart` varchar(255) COLLATE utf8_bin NOT NULL,
  `dateend` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `contacts`, `username`, `user_address`, `user_email`, `user_pass`, `user_status`, `datestart`, `dateend`) VALUES
(1, 'newcontactsa', 'user1', 'qqqqqqqadd', 'dragon-sword@ukr.net', 'qwertyui', 'Active', '2022-10-12', '2023-10-17'),
(2, 'dsfsdfsfd', 'user2', 'asd ajs bhdai nkas d', 'qwerty@ukrnet', 'qwertyu', 'Unactive', '2022-10-26', '1968'),
(4, 'Осипов Даasdadнил', 'user3', 'asdasda', 'dragon-sword@ukr.net', 'admin1', 'Unactive', '2022-10-15', '1968'),
(7, '1111', 'user5', 'asdasda', 'dragon-sword@ukr.net', 'admin1', 'Unactive', '2022-11-21', '1968'),
(21, 'undefined', 'user8', 'undefined', 'undefined', 'undefined', 'Unactive', 'undefined', '1968'),
(22, 'undefined', 'user22', 'undefined', 'undefined', 'undefined', 'Unactive', 'undefined', '1968'),
(23, 'sdch siuodv sgduyvs ', 'user23', 'asdasda', 'dragon-sword@ukr.net', 'admin1', 'Unactive', '2022-11-29', '1968'),
(24, '', 'user24', '', '', '', 'Unactive', '2022-11-29', '1968'),
(25, 'undefined', 'user25', 'undefined', 'undefined', 'undefined', 'Unactive', 'undefined', '1968'),
(26, 'undefined', 'user26', 'undefined', 'undefined', 'undefined', 'Unactive', 'undefined', '1968'),
(27, 'undefined', 'user27', 'undefined', 'undefined', 'undefined', 'Unactive', 'undefined', '1968'),
(28, 'Осипов Даasdadнил', 'user28', 'vjlvljvb', 'danylo.osypov@nure.ua', 'admin1', 'Unactive', '2022-11-29', '1968'),
(29, 'Осипов Даsadadнил', 'user29', 'eztxrdycfuvygibhln sdv', 'qwertyui@personal.example.com', 'admin1', 'Unactive', '2022-11-29', '1968'),
(30, 'Осипов Даsadadнил', 'user30', 'eztxrdycfuvygibhln sdv', 'qwertyui@personal.example.com', 'admin1', 'Unactive', '2022-11-29', '1968'),
(31, 'asdaibakdn', 'user31', 'vjlvljvb', 'danylo.osypov@nure.ua', 'qweqqeqw', 'Unactive', '2022-11-29', '1968'),
(32, 'sdch siuodv sgduyvs ', 'user32', 'eztxrdycfuvygibhln sdv', 'qwertyu@ukr.net', 'ada', 'Unactive', '2022-11-29', '1968'),
(33, 'dsfsfsf', 'user33', 'vjlvljvb', 'qwertyui@personal.example.com', 'asdadad', 'Unactive', '2022-11-29', '1968'),
(34, 'dsfsfsf', 'user34', 'vjlvljvb', 'qwertyui@personal.example.com', 'asdadad', 'Unactive', '2022-11-29', '1968'),
(35, 'оси пов', 'user35', 'asfafsaaf', 'zdxcfghvbn', 'ada', 'Unactive', '2022-11-29', '1968'),
(36, 'Осипов Даasdadнил', 'user36', 'asdasda', 'dragon-sword@ukr.net', 'admin', 'Unactive', '2022-11-29', '1968'),
(37, 'Осипов Даasdadнил', 'user37', 'asdasda', 'dragon-sword@ukr.net', 'admin', 'Unactive', '2022-11-29', '1968'),
(38, 'Осипов Даasdadнил', 'user38', 'asdasda', 'dragon-sword@ukr.net', 'admin', 'Unactive', '2022-11-29', '1968'),
(39, 'sdch siuodv sgduyvs ', 'user39', 'vjlvljvb', 'danylo.osypov@nure.ua', 'qweqewqeq', 'Unactive', '2022-11-29', '1968'),
(40, 'sdch siuodv sgduyvs ', 'user40', 'vjlvljvb', 'danylo.osypov@nure.ua', 'qwertyuio', 'Unactive', '2022-11-29', '1968'),
(41, 'sdch siuodv sgduyvs ', 'user41', 'vjlvljvb', 'danylo.osypov@nure.ua', 'qwertyuio', 'Unactive', '2022-11-29', '1968'),
(42, 'Осипов Даasdadнил', 'user42', 'eztxrdycfuvygibhln sdv', 'qwertyu@ukr.net', 'qweqwe', 'Unactive', '2022-11-29', '1968'),
(43, '1111', 'user43', 'Kharkiv,  Olimpiyskaya street,  31/39', 'dragon-sword@ukr.net', 'ada', 'Unactive', '2022-12-19', '2023-01-07');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Индексы таблицы `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Индексы таблицы `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT для таблицы `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
