-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 04 Lis 2021, 18:07
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
  `user_owner` int(11) NOT NULL,
  `img_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `announcement`
--

INSERT INTO `announcement` (`id`, `category`, `title`, `description`, `value`, `img_link`, `contact`, `location`, `date`, `user_owner`, `img_id`) VALUES
(1, 'motoryzacja', 'Opel Corsa C NOWOSC', 'asdsadsadsadsadsa', 12, 'brak.jpg', 'asdasd', 'sadsadas', '2021-10-28 14:33:22', 1, 1),
(2, 'motoryzacja', 'Opel Corsa C rocznik 2003', 'asdsadsadsadsadsa', 4510, 'opel1.jpg', 'asdasd', 'sadsadas', '2021-10-28 14:33:22', 1, 1),
(3, 'motoryzacja', 'Opel Corsa C bezwypadkowy niemiec plakal', 'asdsadsadsadsadsa', 1999, 'opel2.jpg', 'asdasd', 'sadsadas', '2021-10-28 14:33:22', 1, 1),
(4, 'motoryzacja', 'Opel Corsa C 2003 dziala', 'asdsadsadsadsadsa', 87, 'opel3.jpg', 'asdasd', 'sadsadas', '2021-10-28 14:33:22', 1, 1),
(5, 'motoryzacja', 'Opel Corsa C na czesci', 'asdsadsadsadsadsa', 12, 'opel4.jpg', 'asdasd', 'sadsadas', '2021-10-23 14:32:12', 1, 1),
(6, 'motoryzacja', 'Opel Corsa C sprzedam', 'asdsadsadsadsadsa', 65, 'opel5.jpg', 'asdasd', 'sadsadas', '2021-10-11 12:54:23', 1, 1);

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
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `img_data` FOREIGN KEY (`img_id`) REFERENCES `imgdata` (`id`),
  ADD CONSTRAINT `owner_id` FOREIGN KEY (`user_owner`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
