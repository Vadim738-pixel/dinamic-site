-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 24 2024 г., 14:31
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dinamic-site`
--

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(12) UNSIGNED NOT NULL,
  `id_user` int(12) UNSIGNED NOT NULL,
  `titel` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(4) UNSIGNED NOT NULL,
  `id_topic` int(12) UNSIGNED DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `id_user`, `titel`, `img`, `content`, `status`, `id_topic`, `created_date`) VALUES
(1, 1, 'Про ЗСУ, перспективи та реалії', 'AdPage_Wallpaper4.jpg', '<p>На Торецькому напрямку ворог активізував бойові дії за підтримки авіації та бронетехніки. Водночас на Покровському напрямку ситуація стабільно складається</p>', 1, 3, '2024-06-24 10:30:50'),
(2, 2, 'Про працевлаштування в Італії', 'IMG_20240426_145640.jpg', '<p>На сьогоднішній день, Італія являється однією із розвинутих країн Європи, і саме це являється тим критерієм, щоб працевлаштуватися у цій країні &nbsp;</p>', 1, 4, '2024-06-24 14:50:20'),
(3, 3, 'Про інтернет ресурси в різних країнах та середовищах', 'calculator.png', '<p>На сьогоднішній день постає багато нагальних питань та проблем які слід вирішити шляхом цілеспрямованого пізнання та дослідження</p>', 1, 1, '2024-06-24 15:05:36'),
(4, 1, 'Про математичний аналіз економічних завдань', 'calculator (1).ico', '<p>В статті розповідається про математичний аналіз економічних завдань шляхом побудови системи нерівностей&nbsp;</p>', 1, 2, '2024-06-24 15:21:12');

-- --------------------------------------------------------

--
-- Структура таблицы `topics`
--

CREATE TABLE `topics` (
  `id` int(12) UNSIGNED NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `topics`
--

INSERT INTO `topics` (`id`, `name`, `description`) VALUES
(1, 'ПРОГРАМУВАННЯ', '<p>У цій категорії озповідається про нові та сучасні ІТ технології у нашій країні та у всьому світі</p>'),
(2, 'МАТЕМАТИКА', '<p>У категорії розповідається про основні арифметичні операції, про види чисел, про дії над ними і багато чого іншого</p>'),
(3, 'ВІЙСЬКОВА СПРАВА', '<p>В цій категорії викладаються пости про те як формувалося та формується наше Українське військо</p>'),
(4, 'ПРОФЕСІЇ ТА РЕМЕСЛА', '<p>Розповідається про основні види професій, які поширені в Україні та у всьому світі&nbsp;</p>'),
(5, 'СПОРТ ТА ДОЗВІЛЛЯ', '<p>Стаття написана для тих людей, які люблять у вільний час займатися спортом, та хочуть мати активний відпочинок</p>');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(12) UNSIGNED NOT NULL,
  `admin` tinyint(20) UNSIGNED DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `admin`, `username`, `email`, `password`, `created`) VALUES
(1, 1, 'Vadim', 'Vadim@com', '1', '2024-06-24 10:56:55'),
(2, 1, 'Mukola', 'Mukola@com', '1', '2024-06-24 10:39:43'),
(3, 1, 'Sveta', 'Sveta@com', '1', '2024-06-24 10:55:31'),
(4, 1, 'Valdemary', 'Vadimary@com', '1', '2024-06-24 10:55:36'),
(5, 1, 'Chupacabry', 'Chupycabry@com', '$2y$10$2oBmLEvNTyUXubBxj9/Y/.UYlXtfuWiBqJjY1JudTZQBx5ZeOPTZ.', '2024-06-24 10:59:35');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_topic` (`id_topic`);

--
-- Индексы таблицы `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
