-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 27 2023 г., 12:33
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lotus`
--

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `called` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `tel`, `called`) VALUES
(1, 'Джон', '', 1),
(2, '11', '613614', 0),
(3, '11', '613614', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `kurses`
--

CREATE TABLE `kurses` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `n-week` int NOT NULL,
  `daysweek` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `kurses`
--

INSERT INTO `kurses` (`id`, `name`, `n-week`, `daysweek`, `price`, `active`) VALUES
(1, '2Раз в будни', 1, 'Пн-Пт', '5000Р', 1),
(2, 'Nike', 3, 'СБ, ПН, ВТ', '15000Р', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `text` text NOT NULL,
  `img` text NOT NULL,
  `adress` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Новости на главной странице';

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `name`, `text`, `img`, `adress`, `date`) VALUES
(1, 'ЦВЕТЕНИЕ САКУРЫ В ЯПОНИИ', 'Каждую весну жизнь в Японии ненадолго замирает: офисные клерки, школьники, молодые семьи и пенсионеры бросают свои дела, берут плед и идут в парк на ханами. Это традиционный праздник цветения сакуры, символизирующий начало весны и новой жизни. Цветение происходит с марта до начала мая — в каждом регионе по-разному. В Токио вишнёвое дерево обычно расцветает в середине апреля.\n\n', 'https://avatars.mds.yandex.net/get-vertis-journal/3934100/aj-McsNra2VRQQ-unsplash.jpg_1682340730848/1920x1920', 'https://travel.yandex.ru/journal/cvetenie-sakury-v-yaponi/', '2023-04-12'),
(2, 'C новым годом!', 'А вот и закончился 2022 год! Мы всё ещё существуем!', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/Ded_Moroz.jpg/270px-Ded_Moroz.jpg', 'https://7days.ru/lifestyle/family/staryy-novyy-god-istoriya-traditsii-i-idei-dlya-prazdnika.htm', '2022-12-31'),
(3, 'Инфляция в Японии достигла трёхмесячного максимум', 'В Японии темпы роста потребительских цен ускорились до самого высокого уровня за три месяца в 3,3% в октябре с 3% в сентябре, согласно официальным правительственным данным. Аналитики же ожидали, что в октябре инфляция составит 3,2%. ', 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIAFwAXAMBIgACEQEDEQH/xAAbAAACAwEBAQAAAAAAAAAAAAABAgADBAUGB//EADQQAAEDAwIEBQMDAgcAAAAAAAECAxEABCESMQUTQVEGImFxkQcygRQjobHxFRYzQkNSYv/EABkBAQEBAQEBAAAAAAAAAAAAAAABAgQFA//EACMRAQEBAAEDAwUBAAAAAAAAAAABEQISUaExQWITITJCUgP/2gAMAwEAAhEDEQA/APkkY7CpAFPpMkEGegAqLQWllDgKFpwUqwR7g5r2XEG0iTRAOARH5otpLpCG0lxZ2SjJP4FFSSUByDoVhKjsY3z1oEIzA32oHb3ppgHANDBigXPUUoTNMTNEYVQIoHc0IqyO1KRmopYBMEUhSRTwd6gSTRdaEkpKSkgEGZJ9ZrsueJ+LLQULeajJJ5QmDOPbJ+a5aUbQJPtWm64dfWZCru1fbClONpK07lBKV/BBn2PanKT3Zlq53xJxR0oUq5B0K1p/aTgwpPbspVC545xC9tl21w6lTS9IPkAwDPT2FZ37K5t1JS7bOJUplLwGj/YoSFe0ZpBau6h+y4CdhoM/09ak48S8qzHrj+aCon37VoDK9OotrgYnTiTsPiDWqy4PxC/cW1Z2jzrrY1KSlMFPTM7VrZjLlkR9uTRA3mtJt3ohTLg2OUESNh80Rbupzy1jHRJqzFtZtJA9TQia1fp1Qs8tcNiV+Uwn37UFWzxVpQy4pUwQlBJB3om1kUOlRMAZq82zyioJZdOkebyHHv23HzVZt30qKSy6CNwWzI/is2xqS', 'https://eadaily.com/ru/news/2023/11/25/inflyaciya-v-yaponii-dostigla-tryohmesyachnogo-maksimuma', '2023-11-25');

-- --------------------------------------------------------

--
-- Структура таблицы `parthers`
--

CREATE TABLE `parthers` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `parthers`
--

INSERT INTO `parthers` (`id`, `name`, `description`, `img`) VALUES
(1, 'Школа «Tokyo Kogakuin »', 'Школа Tokyo Kogakuin Japanese Language School находится в Сибуя, самом центре Токио, и имеет огромный опыт в обучении японскому языку. Это одна из самых уважаемых языковых школ в Японии.\r\n\r\n', 'https://gaku.ru/_engine/picture/8/141.jpg'),
(2, 'Школа «TLS»', 'Школа \"TOYO\" (TLS) является частью корпорации \"Дзикэй\", которая объединяет 68 колледжей по всей Японии.\r\n\r\n', 'https://gaku.ru/_engine/picture/6/309.jpg'),
(3, 'Школа «SAKURA »', 'Школа японского языка SAKURA International Academy предлагает обучение в 3 городах! Токио, Хаги и Симоносэки.\r\n\r\n', 'https://gaku.ru/_engine/picture/10/128.jpeg'),
(4, 'Школа «Nichiei Tokyo »', 'Школа японского языка Nichiei Tokyo обеспечивает высокое качество образования и приглашает на учебу студентов, которые поставили своей целью поступление в университет или колледж Японии.\r\n\r\n', 'https://gaku.ru/_engine/picture/8/954.png'),
(5, 'Лотос', 'Школа японского языка лотос из Москвы имеет ещё и онлайн школу!', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d3/Nelumno_nucifera_open_flower_-_botanic_garden_adelaide2.jpg/275px-Nelumno_nucifera_open_flower_-_botanic_garden_adelaide2.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int NOT NULL,
  `iduser` int DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `reviews` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `iduser`, `name`, `reviews`) VALUES
(1, 3, 'a', '1234123'),
(2, 5, 'Воека', 'Ну всё пацаны, БАН'),
(3, 2, 'Данила', 'АААА! Всё плохо! Здесь учат плохо!Зря потратил деньги и время!'),
(4, 5, 'Nike', 'NOWEDIDNT');

-- --------------------------------------------------------

--
-- Структура таблицы `teachers`
--

CREATE TABLE `teachers` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `img`) VALUES
(1, 'Голомидов Кирилл1', 'https://kinolift.com/media/users/54388/994670_n.jpg'),
(2, 'Леонард Милютин', 'https://kinolift.com/media/users/54381/805966_n.jpg'),
(3, 'Ульяна Скобелева', 'https://kinolift.com/media/users/54390/805579_n.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user',
  `email` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `fam` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `dabirh` date NOT NULL,
  `img` text NOT NULL,
  `kurse` text NOT NULL,
  `lesson1` text NOT NULL,
  `lesson2` text NOT NULL,
  `lesson3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `role`, `email`, `fam`, `name`, `sname`, `tel`, `dabirh`, `img`, `kurse`, `lesson1`, `lesson2`, `lesson3`) VALUES
(1, 'admin', '0ffe1abd1a08215353c233d6e009613e95eec4253832a761af28ff37ac5a150c', 'admin', 'voeka2@gmail.com', 'Клочков1 ', 'Данила', 'Валерьевич', '+7(966)085-39-38', '2003-12-22', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcThVa80orhQw_r_RkvxUQAtPsyscm9unfURU3Dvrz6gOD1adutH_d31eWk9Dsk&s', '5 за 300', 'с утра в пятницу', '123', '5'),
(3, 'a@mail.ru', '0ffe1abd1a08215353c233d6e009613e95eec4253832a761af28ff37ac5a150c', 'user', 'a@mail.ru', 'a', 'a', '', '+7 (977) 678-67-64', '2023-11-08', '', '', '', '', '2'),
(4, 'ItAteMyMom@AOT.ru', '4bab7347dc2c4df3d03e695b5af800fe2879774e808ee50b7ae85c934dbfa334', 'user', 'ItAteMyMom@AOT.ru', 'Йегерь', 'Эрен', '', '+7 (777) 469-06-75', '2004-06-07', '', '', '', '', ''),
(5, 'dsada@dsa.ru', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'user', 'dsada@dsa.ru', 'Йегерь', 'Nike', 'LOL ', '+7 (777) 469-06-75', '2023-11-08', '', '', '', '', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `kurses`
--
ALTER TABLE `kurses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `parthers`
--
ALTER TABLE `parthers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `teachers`
--
ALTER TABLE `teachers`
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
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `kurses`
--
ALTER TABLE `kurses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `parthers`
--
ALTER TABLE `parthers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
