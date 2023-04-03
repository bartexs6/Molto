-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2023 at 05:26 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `molto`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
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
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `category`, `title`, `description`, `value`, `img_link`, `contact`, `location`, `date`, `user_owner`, `img_id`) VALUES
(1, 'motoryzacja', 'Dodge RAM 1500 5.7 4x4', ' Sprzedam samochód Dodge RAM 1500 5.7 4x4 w doskonałym stanie technicznym i wizualnym. Auto z 2018 roku, przebieg 70 000 km. Silnik V8 HEMI 5.7 litra zapewnia znakomite osiągi i moc, a napęd 4x4 gwarantuje pewną i stabilną jazdę w każdych warunkach terenowych.\r\n\r\nDodatkowo auto wyposażone jest w wiele funkcjonalnych rozwiązań, takich jak: klimatyzacja, system nagłośnienia premium, podgrzewane fotele, elektrycznie regulowane fotele i lusterka, tempomat, system start-stop, system monitorowania martwego pola', 160000, '2019_Dodge_Ram_1500_Rebel_4x4,_front_11.10.19.jpg', '877-999-123', 'Kraków', '2023-03-22 14:46:00', 1, 1),
(2, 'motoryzacja', 'Opel Corsa 2018 rocznik', ' Do sprzedania Opel Corsa z 2018 roku w bardzo dobrym stanie technicznym i wizualnym. Auto jest w pełni sprawne, bezwypadkowe i posiada oryginalny przebieg 55 000 km. Posiada silnik benzynowy o pojemności 1.4 i mocy 90KM, co zapewnia świetną dynamikę jazdy i ekonomię paliwa.\r\n\r\nWyposażenie auta to m.in. klimatyzacja, system audio z radio CD/MP3, elektrycznie regulowane lusterka i szyby, centralny zamek z pilotem, tempomat, system kontroli trakcji oraz kurtyny powietrzne.\r\n\r\nAuto regularnie serwisowane.', 34000, '8c48e93b3132259089066e7318897b670382943c.jpeg', '877-999-123', 'Nowy Sącz', '2023-03-22 14:49:26', 1, 2),
(3, 'motoryzacja', 'Audi A3 NISKI przebieg!', ' Do sprzedania Audi A3 z niskim przebiegiem - tylko 41 000 km! Auto w doskonałym stanie technicznym i wizualnym, bezwypadkowe i zadbane. Posiada silnik benzynowy o mocy 125KM, co zapewnia świetną dynamikę jazdy i ekonomię paliwa.\r\n\r\nZapraszam do kontaktu!', 150000, 'audi-a3-sedan-3767-37285_v1.jpg', '877-999-123', 'Poznań', '2023-03-22 14:52:48', 1, 3),
(4, 'elektronika', 'Laptop DELL N5110', 'Do sprzedania laptop Dell N5110 w bardzo dobrym stanie technicznym i wizualnym. Posiada ekran o przekątnej 15,6 cala, procesor Intel Core i5 drugiej generacji, 6GB pamięci RAM oraz dysk twardy o pojemności 500GB.\r\n\r\nLaptop wyposażony jest w zintegrowaną kartę graficzną Intel HD Graphics, co pozwala na płynne przeglądanie stron internetowych oraz podstawową obróbkę zdjęć i wideo.\r\n\r\nDodatkowo laptop posiada wbudowany czytnik kart SD, porty USB 3.0 oraz HDMI, kamerę internetową oraz moduł WiFi i Bluetooth.', 1200, 'thumb_page_1639404807IMG_20211201_143000.jpg', '877-999-123', 'Kraków', '2023-03-22 14:57:17', 1, 4),
(5, 'elektronika', 'Monitor ASUS', 'Do sprzedania monitor Asus w idealnym stanie wizualnym i technicznym. Posiada matrycę LED o przekątnej 24 cale oraz rozdzielczości Full HD 1920x1080 pikseli.\r\n\r\nMonitor wyposażony jest w technologię ASUS Smart Contrast Ratio, co pozwala na wyświetlanie obrazów z dużą głębią kolorów oraz kontrastem. Posiada również łącza HDMI, DVI i VGA, co umożliwia podłączenie do wielu urządzeń, takich jak komputery, laptopy, konsolki czy odtwarzacze multimedialne.\r\n\r\nNiskiemu czasowi reakcji matrycy 1ms.', 500, '0742a83147d6b592dbe41d99d610.jpg', '877-999-123', 'Gdańsk', '2023-03-22 15:01:00', 1, 5),
(6, 'elektronika', 'Moniotor DELL 29', 'Do sprzedania monitor DELL w idealnym stanie wizualnym i technicznym. Posiada matrycę LED o przekątnej 24 cale oraz rozdzielczości Full HD 1920x1080 pikseli.\r\n\r\nMonitor wyposażony jest w technologię DELL Smart Contrast Ratio, co pozwala na wyświetlanie obrazów z dużą głębią kolorów oraz kontrastem. Posiada również łącza HDMI, DVI i VGA, co umożliwia podłączenie do wielu urządzeń, takich jak komputery, laptopy, konsolki czy odtwarzacze multimedialne.', 1000, '296074735_6080482998633779_3306385907982028725_n.jpg', '877-999-123', 'Kraków', '2023-03-22 15:02:57', 1, 6),
(7, 'ubrania', 'Spodnie męskie', ' Do sprzedania mam eleganckie spodnie męskie w kolorze szarym. Rozmiar to M/L. Spodnie są w bardzo dobrym stanie, noszone tylko kilka razy. Posiadają klasyczny krój.', 40, 'images_(1).jpg', '877-999-123', 'Nowy Sącz', '2023-03-22 15:06:49', 1, 7),
(8, 'ubrania', 'Skarpetki Nike', 'Mam do sprzedania oryginalne skarpetki Nike w rozmiarze 40-45. Posiadają wygodny elastyczny ściągacz oraz wentylację zapewniającą komfort noszenia. Są w idealnym stanie, nieużywane. Idealne dla fanów marki Nike.', 10, '0077.jpg', '877-999-123', 'Kraków', '2023-03-22 15:08:16', 1, 8),
(9, 'ubrania', 'Buty Adidas', 'Sprzedam oryginalne buty marki Adidas w rozmiarze 42. Są to modele sportowe, idealne na trening lub do biegania. Buty są w bardzo dobrym stanie, noszone tylko kilka razy. Posiadają amortyzację i wygodną wkładkę. Polecam dla miłośników marki Adidas.', 100, 'Buty-meskie-sportowe-Adidas-VS-Pace-B74494.jpg', '877-999-123', 'Kraków', '2023-03-22 15:11:23', 1, 9),
(10, 'dom', 'Bramka do piłki nożnej', ' Do sprzedania mam bramkę do piłki nożnej o wymiarach 240x150x90cm. Konstrukcja jest solidna, wykonana z trwałych materiałów, co gwarantuje długie użytkowanie. Bramka jest łatwa w montażu i demontażu, co umożliwia przechowywanie w niewielkim miejscu. Idealna do gry w ogrodzie lub na boisku.', 200, 'bramka-pilkarska-3m-x-155m.jpg', '877-999-123', 'Lublin', '2023-03-22 15:22:04', 1, 10),
(11, 'dom', 'Lampa wisząca', ' Mam do sprzedania elegancką lampę wiszącą w stylu nowoczesnym. Klosz jest wykonany z matowego szkła, co zapewnia delikatne i przyjemne rozproszenie światła. Lampa jest w idealnym stanie, nieużywana.', 3000, 'pompu-lampa-sufitowa-h3392249-0.jpg', '877-999-123', 'Nowy Sącz', '2023-03-22 15:24:59', 1, 11),
(12, 'dom', 'Sofa duża', 'Sprzedam dużą sofę w kolorze widocznym na zdjęciach, wymiary 240x100cm. Sofa jest w bardzo dobrym stanie, nie zniszczona, bez plam i przetarć. Posiada miękkie, wygodne poduszki siedziska i oparcia, a także stabilne drewniane nóżki. Idealna dla dużej rodziny lub w przestrzeniach biurowych.', 2320, '39466_1_2.jpg', '877-999-123', 'Kraków', '2023-03-22 15:27:06', 1, 12),
(13, 'nieruchomosci', 'Mieszkanie 40m2', 'Witam, mam na sprzedaż mieszkanie 40 metrów kwadratowych. Lokalizacja centrum Krakowa. Opłata miesięczna w cenie ogłoszenia', 4300, 'paradyz-wildland1.jpg', '877-999-123', 'Kraków', '2023-03-28 18:02:41', 1, 13),
(14, 'nieruchomosci', 'Mieszkanie Poznań', 'Witam, wynajme mieszkanie w centrum Poznania. Wymiary mieszkanai to 34 metry^2. W cene wchodzą rachunki za prąd oraz wodę. Zapraszam do kontaktu!', 3400, 'mieszkanie3.jpg', '877-999-123', 'Poznań', '2023-03-28 18:10:07', 1, 14),
(15, 'nieruchomosci', 'Wynajme Nowy Sącz', 'Wynajmę mieszkanie znajdujące się w Nowym Sączu na ulicy Lwowskiej. Mieszkanie zadbane i odremontowane. Cena za miesiąc najmu. Więcej informacji pod telefonem', 3000, 'm2.jpg', '877-999-123', 'Nowy Sącz', '2023-03-28 18:15:02', 1, 15),
(16, 'rozrywka', 'Piłka do nogi', 'Do sprzedania mam doskonałą jakościowo kopię piłki do nogi, wzorowaną na piłce używanej podczas Mistrzostw Świata w Katarze. Ta piłka to świetna okazja dla fanów piłki nożnej, którzy chcą poczuć ducha mistrzostw świata i trenować na piłce o podobnych parametrach jak ta używana przez najlepszych piłkarzy na świecie', 120, 'pilka2.jpg', '877-999-123', 'Lublin', '2023-03-28 18:19:01', 1, 16),
(17, 'rozrywka', 'Gitara', 'Do sprzedania gitara akustyczna w doskonałym stanie. Instrument jest idealny dla początkujących i zaawansowanych graczy. Brzmienie jest czyste i ciepłe. Gitara posiada wygodny i ergonomiczny kształt, który pozwala na długie i komfortowe granie. W zestawie etui i tuner. Cena do negocjacji. Idealna okazja dla miłośników muzyki!', 320, 'gitara2.jpg', '123-123-321', 'Kraków', '2023-03-28 18:21:36', 4, 17),
(18, 'rozrywka', 'Puzzle Rzym', 'Do sprzedania mam piękne puzzle przedstawiające Rzym, idealne dla miłośników podróży i architektury. Zestaw składa się z 1000 elementów, a po ułożeniu obrazek prezentuje wspaniałe widoki Wiecznego Miasta. Puzzle wykonane są z trwałego i odpornego materiału, co pozwala na wielokrotne ułożenie. W komplecie znajduje się obrazek przedstawiający gotowe puzzle, co ułatwia pracę. Cena do negocjacji. Idealna okazja na spędzenie wolnego czasu w klimatach rzymskich!', 34, 'puzzle2.jpg', '123-123-321', 'Gdańsk', '2023-03-28 18:25:36', 4, 18);

-- --------------------------------------------------------

--
-- Table structure for table `imgdata`
--

CREATE TABLE `imgdata` (
  `id` int(11) NOT NULL,
  `first_img_link` text COLLATE utf8_polish_ci NOT NULL,
  `second_img_link` text COLLATE utf8_polish_ci NOT NULL,
  `third_img_link` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `imgdata`
--

INSERT INTO `imgdata` (`id`, `first_img_link`, `second_img_link`, `third_img_link`) VALUES
(1, '2019_Dodge_Ram_1500_Rebel_4x4,_front_11.10.19.jpg', '7051d050-1822-4bc1-aa7d-b8ec938f8d44.jpg', 'dodge-ram-1500--1200x720.jpg'),
(2, '8c48e93b3132259089066e7318897b670382943c.jpeg', 'maxresdefault.jpg', 'z22170344Q,Opel-Corsa-S-2017.jpg'),
(3, 'audi-a3-sedan-3767-37285_v1.jpg', 'audi-a3-sedan-3767-37286_v2.jpg', 'b85e5afefc95525b2c237aa59af5fb38.jpg'),
(4, 'thumb_page_1639404807IMG_20211201_143000.jpg', 'thumb_page_1639404839IMG_20211201_143010.jpg', 'NULL'),
(5, '0742a83147d6b592dbe41d99d610.jpg', '20220604_194114-removebg-preview-1.png', 'monitor-asus-vw197d-185470cm-1366x768.jpg'),
(6, '296074735_6080482998633779_3306385907982028725_n.jpg', 'images.jpg', 'NULL'),
(7, 'images_(1).jpg', 'product_302665.jpg', 'NULL'),
(8, '0077.jpg', 'NULL', 'NULL'),
(9, 'Buty-meskie-sportowe-Adidas-VS-Pace-B74494.jpg', 'pol_pl_Buty-Adidas-COAST-STAR-EE9699-2698_3.jpg', 'NULL'),
(10, 'bramka-pilkarska-3m-x-155m.jpg', 'pol_pl_Bramka-do-pilki-noznej-5x2-m-typ-3-przenosna-202354_1.jpg', 'NULL'),
(11, 'pompu-lampa-sufitowa-h3392249-0.jpg', 'pompu-lampa-wiszaca-h3458037-0.jpg', 'NULL'),
(12, '39466_1_2.jpg', '39466_2_2.jpg', 'NULL'),
(13, 'paradyz-wildland1.jpg', 'paradyz-wildland2.jpg', 'NULL'),
(14, 'mieszkanie3.jpg', 'mieszkanie2.jpg', 'mieszkanie1.jpg'),
(15, 'm2.jpg', 'm1.jpg', 'NULL'),
(16, 'pilka2.jpg', 'pilka1.jpg', 'NULL'),
(17, 'gitara2.jpg', 'gitara1.jpg', 'NULL'),
(18, 'puzzle2.jpg', 'puzzle1.jpg', 'NULL');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` text COLLATE utf8_polish_ci NOT NULL,
  `password` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `phone_number` tinytext COLLATE utf8_polish_ci NOT NULL,
  `favorites` tinytext COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `phone_number`, `favorites`) VALUES
(1, 'root', '63a9f0ea7bb98050796b649e85481845', 'root@molto.pl', '877-999-123', ''),
(2, 'admin', '70562ba9998fc2d970b806c3dc30269d', 'admin@admin.com', '123-456-789', ''),
(3, 'test', '63a9f0ea7bb98050796b649e85481845', 'test@test.pl', '123-123-123', ''),
(4, 'bartek', '098f6bcd4621d373cade4e832627b4f6', 'bp@pl.pl', '123-123-321', ''),
(5, 'lukasz', '81dc9bdb52d04dc20036dbd8313ed055', 'lukasz@lukasz.pl', '987-543-231', ''),
(6, 'piotr', '81dc9bdb52d04dc20036dbd8313ed055', 'piotr@p.pl', '123-321-777', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_id` (`user_owner`),
  ADD KEY `img_data` (`img_id`);

--
-- Indexes for table `imgdata`
--
ALTER TABLE `imgdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `imgdata`
--
ALTER TABLE `imgdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `img_data` FOREIGN KEY (`img_id`) REFERENCES `imgdata` (`id`),
  ADD CONSTRAINT `owner_id` FOREIGN KEY (`user_owner`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
