-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 04 Lis 2021, 20:34
-- Wersja serwera: 10.4.20-MariaDB
-- Wersja PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `molto`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `category` enum('motoryzacja','elektronika','ubrania','dom','nieruchomosci','rozrywka') COLLATE utf8_polish_ci NOT NULL,
  `title` tinytext COLLATE utf8_polish_ci NOT NULL,
  `description` text COLLATE utf8_polish_ci NOT NULL,
  `value` float NOT NULL,
  `img_link` text COLLATE utf8_polish_ci NOT NULL,
  `contact` text COLLATE utf8_polish_ci NOT NULL,
  `location` tinytext COLLATE utf8_polish_ci NOT NULL,
  `date` datetime NOT NULL,
  `user_owner` int(11) NOT NULL,
  `img_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `announcement`
--

INSERT INTO `announcement` (`id`, `category`, `title`, `description`, `value`, `img_link`, `contact`, `location`, `date`, `user_owner`, `img_id`) VALUES
(1, 'nieruchomosci', 'Dom z panelami', 'Sprzedam', 890000, 'image3.jpg', '112-997-998', 'Nowy Sącz', '2021-11-04 20:20:55', 2, 1),
(2, 'motoryzacja', 'BMW e61', 'Sprzedam bmw', 22500, 'bmw3.jpg', '123-123-123', 'Nowy Sącz', '2021-11-04 20:24:38', 2, 2),
(3, 'motoryzacja', 'Citroen c3', 'Sprzedam c3', 7299, 'c3.jpg', '233-233-233', 'Stary Sącz', '2021-11-04 20:26:17', 2, 3),
(4, 'dom', 'Meble', 'Meble, meble, meble', 3900, 'm3.jpg', '333-333-234', 'Limanowa', '2021-11-04 20:27:43', 2, 4),
(5, 'rozrywka', 'Wzmacniacz gitarowy', 'Sprzedam wzmacniacz', 9900, 'w3.jpg', '323-323-321', 'Wielogłowy', '2021-11-04 20:29:56', 2, 5),
(6, 'motoryzacja', 'Ładowarka tele', 'Dorbze', 79000, 'l3.jpg', '777-775-345', 'Nowy Sącz', '2021-11-04 20:32:44', 2, 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `imgdata`
--

CREATE TABLE `imgdata` (
  `id` int(11) NOT NULL,
  `first_img_link` text COLLATE utf8_polish_ci NOT NULL,
  `second_img_link` text COLLATE utf8_polish_ci NOT NULL,
  `third_img_link` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `imgdata`
--

INSERT INTO `imgdata` (`id`, `first_img_link`, `second_img_link`, `third_img_link`) VALUES
(1, 'image3.jpg', 'image2.jpg', 'image.jpg'),
(2, 'bmw3.jpg', 'bmw2.jpg', 'bmw.jpg'),
(3, 'c3.jpg', 'c2.jpg', 'c1.jpg'),
(4, 'm3.jpg', 'm2.jpg', 'm.jpg'),
(5, 'w3.jpg', 'w2.jpg', 'w1.jpg'),
(6, 'l3.jpg', 'l2.jpg', 'l.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` text COLLATE utf8_polish_ci NOT NULL,
  `password` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`) VALUES
(1, 'tomek1332', 'asd', 'a@a.pl'),
(2, 'ada', '098f6bcd4621d373cade4e832627b4f6', 'bp@bp.pl'),
(3, 'test', '098f6bcd4621d373cade4e832627b4f6', 'email@email.pl');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `userdata`
--

CREATE TABLE `userdata` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_polish_ci NOT NULL,
  `surname` text COLLATE utf8_polish_ci NOT NULL,
  `location` text COLLATE utf8_polish_ci NOT NULL,
  `phone_number` text COLLATE utf8_polish_ci NOT NULL,
  `ann_list` text COLLATE utf8_polish_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_id` (`user_owner`),
  ADD KEY `img_data` (`img_id`);

--
-- Indeksy dla tabeli `imgdata`
--
ALTER TABLE `imgdata`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `imgdata`
--
ALTER TABLE `imgdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `img_data` FOREIGN KEY (`img_id`) REFERENCES `imgdata` (`id`),
  ADD CONSTRAINT `owner_id` FOREIGN KEY (`user_owner`) REFERENCES `user` (`id`);

--
-- Ograniczenia dla tabeli `userdata`
--
ALTER TABLE `userdata`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
