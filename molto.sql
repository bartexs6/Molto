-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Czas generowania: 18 Lis 2021, 09:41
-- Wersja serwera: 10.4.21-MariaDB-cll-lve
-- Wersja PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `krunkerp_mb1`
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
(1, 'ubrania', 'Zestaw ubrań', 'Mam do sprzedania zestaw ubrań  w świetnej cenie!', 30000, '1.PNG', '877-999-444', 'Zimbabwe', '2021-11-18 08:12:42', 1, 1),
(2, 'motoryzacja', 'BMW E46 330Ci', 'Witam. Mam do sprzedania moją Beatkę. Zadbana, nie bita, bez rdzy. Wsiadać i jechać.\r\nPrzebieg: 197680km\r\nMoc: 23KM', 23999, 'bmw1.jpg', '123-456-789', 'Nowy Sącz', '2021-11-18 08:14:34', 2, 2),
(3, 'ubrania', 'Ubranka dziecięce', 'Oferuje ubranka dla dziecka w dobrej cenie!', 100, 'ok.PNG', '877-999-444', 'Zjednoczone Em,iraty Arabskie', '2021-11-18 08:17:15', 1, 3),
(4, 'motoryzacja', 'Opel Corsa B', 'Do sprzedania Opel Corsa B\r\n1.2\r\n0 - 100km/h: TAK\r\n\r\n', 5999, 'corsa1.jpg', '123-456-789', 'Wielopole', '2021-11-18 08:19:35', 2, 4),
(5, 'ubrania', 'Majtki gucci', 'Piękne i zabójcze majtki, majtki gucci.\r\nRaz użyte przez męża.\r\nW dobrym stanie.\r\n', 2300, '3.PNG', '877-999-444', 'Zubrzyk', '2021-11-18 08:20:27', 1, 5),
(6, 'ubrania', 'Spodnie Zara', 'Spodnie w dobrym stanie,\r\npolecam\r\nZara będą', 29, '222.PNG', '877-999-444', 'Kraków', '2021-11-18 08:23:42', 1, 6),
(7, 'ubrania', 'Zestaw modnych rzecz', 'Sprzedam zestaw modnych rzeczy. Rozmiar S. Buty gumowe 37 r( nowe) . Sweaterki raz ubrane w stanie idealnym. Biały sweter nowy. Kurtka jesienna zimowa 42_44 r ( w dobrym stanie). Czapeczka gratis.Możliwość wysyłki.', 140, '11111.PNG', '877-999-444', 'Warszawa', '2021-11-18 08:29:07', 1, 7),
(8, 'rozrywka', 'Bramka do footbalu', 'Mam do sprzedania nową bramkę w wymiarach 2m x 5m firmy Wakanda Forever.', 1699, 'bra.PNG', '877-999-444', 'Lublin', '2021-11-18 09:05:08', 1, 8),
(9, 'elektronika', 'Samsung galaxy s8', 'Do sprzedania mam sprawny tel Samsung S8. Wymieniona bateria na oryginalną oraz założone szkło UV.\r\nW zestawie nie ma pudełka jest ładowarka.', 1200, '14313212.PNG', '877-999-444', 'Kraków', '2021-11-18 09:07:13', 1, 9),
(10, 'nieruchomosci', 'Dom, ul. Szeroka', 'Opis Powierzchnia użytkowa domu 422,40 m 2, plus piwnica i garaże 176 m 2 na działce o powierzchni 2100m2\r\nWitaj, skoro tu zaglądasz tzn że szukasz stabilnego biznesu o to on :\r\nWYJĄTKOWA OFERTA BEZ POŚREDNIKÓW SPRZEDAM BEZPOŚREDNIO- DOM W DOBRYM STANIE. bardzo dobra lokalizacja świetny dojazd do trasy S8 5 min. Najbliższa okolica się bardzo rozwija. ', 790000, '124123542355.PNG', '877-999-444', 'Poznań', '2021-11-18 09:10:51', 1, 10),
(11, 'motoryzacja', 'Nissan GT-R', 'sprzedam nissana gt-r\'a ludzie', 239000, 'nissan1.jpg', '123-456-789', 'Warszawa Bemowo', '2021-11-18 09:12:47', 2, 11),
(12, 'nieruchomosci', 'Dom z garażem', 'Dobre Nieruchomości polecają na sprzedaż bardzo zadbane mieszkanie 2 pokojowe, z pięknym dużym balkonem 9 m2.\r\n', 360000, 'dadad.PNG', '877-999-444', 'Zubrzyk', '2021-11-18 09:15:24', 1, 12),
(13, 'dom', 'Piła motorowa+', 'Piła spalinowa husqvarna 254 xp PROFESJONAŁ 4,1 KM', 1240, 'awdawbbaaw.PNG', '877-999-444', 'Gdańsk', '2021-11-18 09:20:49', 1, 13),
(14, 'dom', 'Altanka drewniana', 'Przedmiotem aukcji jest altana z BALA, niemalowana.\r\nAltana w całości wykonana z drewna sosnowego.\r\nKonstrukcje stanowią bale strugane ręcznie o średnicy ok. 25 cm, boki altany zabudowane do wysokości parapetu ok.90 cm.\r\n', 11000, 'adal.PNG', '877-999-444', 'Młodów', '2021-11-18 09:23:08', 1, 14),
(15, 'dom', '12m drewna bukowego', 'Drewno bez próchna oraz murszu. Polecam!', 1650, 'dwadaw.PNG', '877-999-444', 'Poznań', '2021-11-18 09:25:10', 1, 15),
(16, 'nieruchomosci', 'Dom ekipy friza', 'Dom ekipy w dobrym stanie. Cena do negocjacji.\r\n310 metrów kwadratowych\r\nSystem ochrony\r\nOgrzewanie pompą ciepła\r\nBasen 10x10x2m\r\n', 1600000, 'vaabqa.PNG', '877-999-444', 'Kraków', '2021-11-18 09:29:08', 1, 16),
(17, 'motoryzacja', 'Mustang (Mini majka)', 'Witam, mam na sprzedaz samochod pewnego karla z krakowa, zostal on skradziony wczorja pod domem niski przebieg  pozdrawiam', 345000, 'minimajkel.jpg', '877-999-444', 'Kraków', '2021-11-18 09:38:41', 1, 17),
(18, 'rozrywka', 'Piłka z euro', 'Dobry sprzedam pilke z euro 2020 NIE KARDZIONA zostala podarowana przez WIELKIEGO ROBERTA LEWANGOLSKIEGO W jego restaruacji podrawiam', 400, 'indeks.jpg', '877-999-444', 'Warszawa', '2021-11-18 09:41:28', 1, 18);

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
(1, '1.PNG', 'NULL', 'NULL'),
(2, 'bmw1.jpg', 'bmw2.jpg', 'bmw3.jpg'),
(3, 'ok.PNG', 'NULL', 'NULL'),
(4, 'corsa1.jpg', 'corsa2.jpg', 'corsa3.jpg'),
(5, '3.PNG', 'NULL', 'NULL'),
(6, '222.PNG', 'spod.PNG', 'NULL'),
(7, '11111.PNG', 'NULL', 'NULL'),
(8, 'bra.PNG', 'NULL', 'NULL'),
(9, '14313212.PNG', '222222222.PNG', 's8.PNG'),
(10, '124123542355.PNG', 'afafaffa.PNG', 'NULL'),
(11, 'nissan1.jpg', 'nissan2.jpg', 'nissan3.jpg'),
(12, 'dadad.PNG', 'faafafafafafaff.PNG', 'hałpa.PNG'),
(13, 'awdawbbaaw.PNG', 'dawbawbabwab.PNG', 'NULL'),
(14, 'adal.PNG', 'fafabfab.PNG', 'wabawbabawba.PNG'),
(15, 'dwadaw.PNG', 'NULL', 'NULL'),
(16, 'vaabqa.PNG', 'NULL', 'NULL'),
(17, 'minimajkel.jpg', 'auto.jpg', 'NULL'),
(18, 'indeks.jpg', 'NULL', 'NULL');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` text COLLATE utf8_polish_ci NOT NULL,
  `password` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `phone_number` tinytext COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `phone_number`) VALUES
(1, 'root', '70562ba9998fc2d970b806c3dc30269d', 'lisrafi16@gmail.com', '877-999-444'),
(2, 'admin', '70562ba9998fc2d970b806c3dc30269d', 'admin@admin.com', '123-456-789');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT dla tabeli `imgdata`
--
ALTER TABLE `imgdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
