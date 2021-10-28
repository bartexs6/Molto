-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Paź 2021, 10:56
-- Wersja serwera: 10.4.17-MariaDB
-- Wersja PHP: 8.0.2

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
  `category` enum('motoryzacja','elektronika','ubrania','dom','nieruchmosci','rozrywka') COLLATE utf8_polish_ci NOT NULL,
  `title` tinytext COLLATE utf8_polish_ci NOT NULL,
  `description` text COLLATE utf8_polish_ci NOT NULL,
  `value` float NOT NULL,
  `img_link` text COLLATE utf8_polish_ci NOT NULL,
  `contact` text COLLATE utf8_polish_ci NOT NULL,
  `location` tinytext COLLATE utf8_polish_ci NOT NULL,
  `date` datetime NOT NULL,
  `user_owner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `announcement`
--

INSERT INTO `announcement` (`id`, `category`, `title`, `description`, `value`, `img_link`, `contact`, `location`, `date`, `user_owner`) VALUES
(1, 'elektronika', 'test', 'asdsadsadsadsadsa', 10, '/brak.png', 'asdasd', 'sadsadas', '2020-09-01 00:00:00', 1),
(2, 'elektronika', 'asda', 'dgfdsgd', 13, '/brak.png', 'asdsadad', 'dsfdsfdsf', '2021-10-10 00:00:00', 1),
(3, 'elektronika', 'aaa', 'asdsadas', 12, '/brak.png', 'sadsadsa', 'sadsad', '2021-09-09 00:00:00', 1),
(4, 'elektronika', 'asda', 'dgfdsgd', 13, '/brak.png', 'asdsadad', 'dsfdsfdsf', '2021-10-10 00:00:00', 1),
(5, 'motoryzacja', 'asdsad', 'csotam', 122, '/brak.png', 'asfdfds', 'vbvbvb', '2021-10-28 10:48:59', 1),
(6, 'motoryzacja', 'asdsad', 'csotam', 122, '/brak.png', 'asfdfds', 'vbvbvb', '2021-10-28 10:49:30', 1),
(7, 'motoryzacja', 'asdsad', 'csotam', 122, '/brak.png', 'asfdfds', 'vbvbvb', '2021-10-28 10:51:03', 1),
(8, 'motoryzacja', 'asdsad', 'csotam', 122, '/brak.png', 'asfdfds', 'vbvbvb', '2021-10-28 10:51:03', 1),
(9, 'motoryzacja', 'asdsad', 'csotam', 122, '/brak.png', 'asfdfds', 'vbvbvb', '2021-10-28 10:51:03', 1),
(10, 'motoryzacja', 'asdsad', 'csotam', 122, '/brak.png', 'asfdfds', 'vbvbvb', '2021-10-28 10:51:03', 1),
(11, 'motoryzacja', 'asdsad', 'csotam', 122, '/brak.png', 'asfdfds', 'vbvbvb', '2021-10-28 10:51:03', 1);

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
(1, 'tomek1332', 'asd', 'a@a.pl');

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
  ADD KEY `owner_id` (`user_owner`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
