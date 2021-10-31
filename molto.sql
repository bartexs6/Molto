-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 31 Paź 2021, 19:58
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
(1, 'motoryzacja', 'Opel Corsa C NOWOSC', 'asdsadsadsadsadsa', 12, 'brak.jpg', 'asdasd', 'sadsadas', '2021-10-28 14:33:22', 1),
(2, 'motoryzacja', 'Opel Corsa C rocznik 2003', 'asdsadsadsadsadsa', 4510, 'opel1.jpg', 'asdasd', 'sadsadas', '2021-10-28 14:33:22', 1),
(3, 'motoryzacja', 'Opel Corsa C bezwypadkowy niemiec plakal', 'asdsadsadsadsadsa', 1999, 'opel2.jpg', 'asdasd', 'sadsadas', '2021-10-28 14:33:22', 1),
(4, 'motoryzacja', 'Opel Corsa C 2003 dziala', 'asdsadsadsadsadsa', 87, 'opel3.jpg', 'asdasd', 'sadsadas', '2021-10-28 14:33:22', 1),
(5, 'motoryzacja', 'Opel Corsa C na czesci', 'asdsadsadsadsadsa', 12, 'opel4.jpg', 'asdasd', 'sadsadas', '2021-10-23 14:32:12', 1),
(6, 'motoryzacja', 'Opel Corsa C sprzedam', 'asdsadsadsadsadsa', 65, 'opel5.jpg', 'asdasd', 'sadsadas', '2021-10-11 12:54:23', 1),
(7, 'dom', 'Ksiazki', 'asfdsasafdsfds', 21, ',Uzywane-ksiazki--Gdzie-kupic-ksiazki-z-drugiej-rek.jpg', '123-123-123', 'Nowy Sacz', '2021-10-31 19:38:50', 1);

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
(5, '//', '4124bc0a9335c27f086f24ba207a4912', 'aa'),
(6, 'aa', '4124bc0a9335c27f086f24ba207a4912', 'aa'),
(7, 'aa', '4124bc0a9335c27f086f24ba207a4912', 'aa@a.pl'),
(8, 'gg', 'd41d8cd98f00b204e9800998ecf8427e', 'aa@a.pl'),
(9, 'gg', '2f7e54fe9de9db73067f562bc22d6eae', 'a@a.pl'),
(10, 'gg2', '2f7e54fe9de9db73067f562bc22d6eae', 'a2@a.pl'),
(11, 'gg2d', '2f7e54fe9de9db73067f562bc22d6eae', 'a2a@a.pl'),
(12, 'abc', '900150983cd24fb0d6963f7d28e17f72', 'abc@abc.pl');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
