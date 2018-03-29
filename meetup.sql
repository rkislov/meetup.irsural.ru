-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 29 2018 г., 17:00
-- Версия сервера: 5.5.57-MariaDB
-- Версия PHP: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `meetup`
--

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_06_18_040826_create_table_pages', 1),
('2016_06_18_040905_create_table_services', 1),
('2016_06_18_040935_create_table_portfolios', 1),
('2016_06_18_041340_create_table_peoples', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `name`, `alias`, `text`, `images`, `created_at`, `updated_at`) VALUES
(1, 'MeetUp', 'meet', '<h2>Самое <big><strong>крутое событие </strong></big>в мире информацинной безопасности.</h2>\r\n\r\n<p>с 23 по 25 мая в Екатеринбурге пройдет первая&nbsp;на Урале конференция по&nbsp;информационной безопасности. Мы покажем Вам как&nbsp;&nbsp;использовать Astra Linux. Как удобно&nbsp;пользоваться компьютерами серии&nbsp;ICL RAY&nbsp; с предустановленным отечественной ОС Astra Linux. Мы поделимся опытом внедрения, расскажем с какими труднястями столкнулись и как легко из них вышли. Для Вас&nbsp;подготовили серию докладов,&nbsp;сделаи кучу стендов.&nbsp;</p>', 'astralinux.png', '2016-01-05 17:59:57', '2018-03-27 15:03:19'),
(2, 'О нас', 'aboutUs', '<p><strong>ООО &laquo;Институт Радиоэлектронных Систем&raquo;</strong> является интегратором решений в области защиты государственной тайны, конфиденциальной информации и персональных данных. Мы готовы провести плавный переход информационных систем Вашего предприятия на решения с применением отечественной, сертифицированной по новым требованиям ФСТЭК России, операционной системы &laquo;Astra Linux Special Edition&raquo;. Модельный ряд компьютеров ICL RAY с предустановленной операционной системой &laquo;Astra Linux Special Edition&raquo; компании АйСиЭл максимально упростит процесс перехода.</p>\r\n\r\n<p>Все наши решения мы готовы аттестовать по требованиям информационной безопасности таким как:</p>\r\n\r\n<p>- защита госудаственной тайны;</p>\r\n\r\n<p>&nbsp;- защита критической информационной инфраструктуры (по требованиям 187-ФЗ);</p>\r\n\r\n<p>- защита государственных информационных систем (по требованиям 17 приказа ФСТЭК России);</p>\r\n\r\n<p>-защита информационных систем по обработке персональных данных (по требованиям 21 приказа ФСТЭК России);</p>\r\n\r\n<p>-защиты конфиденциальной информации (по требованиям СТР-К)</p>\r\n\r\n<p>В учебном центре ООО &laquo;Институт Радиоэлектронных Систем&raquo; мы готовим специалистов по защите информации. В нашем учебном центре имеются стенды на базе современных компьютеров компании АйСиЭл из модельного ряда ICL RAY с предустановленной операционной системой &laquo;Astar Linux Special Edition&raquo;.</p>\r\n\r\n<p>&nbsp;</p>', 'ирс2.png', '2016-01-05 18:01:40', '2018-03-27 10:04:21');

-- --------------------------------------------------------

--
-- Структура таблицы `partners`
--

CREATE TABLE `partners` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `href` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `partners`
--

INSERT INTO `partners` (`id`, `name`, `images`, `href`, `created_at`, `updated_at`) VALUES
(2, 'Microsoft', 'microsoft.png', 'https://microsoft.com', '2018-03-28 10:01:59', '2018-03-28 10:12:08');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `peoples`
--

CREATE TABLE `peoples` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `peoples`
--

INSERT INTO `peoples` (`id`, `name`, `position`, `images`, `text`, `created_at`, `updated_at`) VALUES
(4, 'Гильмияров Роман', 'генеральный директор ООО \"ИРС\"', 'director.jpg', '<p>Очень буду рад видеть Вас на нашем мероприятии</p>', '2018-03-28 08:05:12', '2018-03-28 09:06:33');

-- --------------------------------------------------------

--
-- Структура таблицы `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `filter` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `portfolios`
--

INSERT INTO `portfolios` (`id`, `name`, `images`, `filter`, `created_at`, `updated_at`) VALUES
(10, 'Опыт внедрения Astra Linux на объектах ОПК', 'astraLin.jpg', 'AstraLinux', '2018-03-29 06:19:23', '2018-03-29 06:20:12');

-- --------------------------------------------------------

--
-- Структура таблицы `registrations`
--

CREATE TABLE `registrations` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `organisation` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `registrations`
--

INSERT INTO `registrations` (`id`, `name`, `organisation`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Роман Кислов', 'ООО \"ИРС\"', 'roman@kislovs.ru', '2018-03-29 05:14:19', '2018-03-29 05:14:19');

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`id`, `name`, `text`, `icon`, `created_at`, `updated_at`) VALUES
(7, 'Astra Linux Domain', '<p>Служба&nbsp;<big>Astra Linux Directory (ALD)</big>&nbsp;представляет собой систему управления ЕПП. Таким образом,&nbsp;<big>ALD</big>&nbsp;является надстройкой над технологиями&nbsp;<big>LDAP</big>,&nbsp;<big>Kerberos 5</big>,&nbsp;<big>CIFS</big>&nbsp;и обеспечивает автоматическую настройку всех необходимых файлов конфигурации служб, реализующих перечисленные технологии, а так же предоставляет интерфейс управления и администрирования.</p>', 'ALD', '2018-03-27 14:19:53', '2018-03-27 14:19:53');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `role`, `updated_at`, `created_at`) VALUES
(1, 'user', 'user@mail.ru', '$2y$10$zRl9atNN.vZdo5I/zvntieLNZtlX2iBY4XJtfTsifcWrMZH8.44AK', 'yNlSBYhjLyWyzrq85fhMl7pMrSNWcCAHiNoSJdw1hRiJRhyHz02vdbGBlRxG', 'user', '2018-03-29 11:24:24', '2018-03-25 05:51:38'),
(2, 'admin', 'admin@admin.ru', '$2y$10$uoxpfJynvaQgtWv.KKyXDeNMq0O/wFmvghWT6N9IYJCdnmPjsm2..', 'SjTAAKk9Fhah5BFckt9LB2AC4nLH547omknfi4eoidKfYvzHk7sRMrFcASHA', 'admin', '2018-03-29 11:03:10', '2018-03-27 12:58:29');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Индексы таблицы `peoples`
--
ALTER TABLE `peoples`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `peoples`
--
ALTER TABLE `peoples`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
