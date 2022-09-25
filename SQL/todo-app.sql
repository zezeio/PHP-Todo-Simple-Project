-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 25 Eyl 2022, 17:16:19
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `todo-app`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `todo_list`
--

CREATE TABLE `todo_list` (
  `id` int(11) NOT NULL,
  `T_Title` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `T_UserID` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT 'False'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `todo_list`
--

INSERT INTO `todo_list` (`id`, `T_Title`, `T_UserID`, `status`) VALUES
(79, 'go to the market', '8', 'True'),
(80, 'buy 2 kg of apples', '8', 'True'),
(81, 'buy 3 kilos of pepper', '8', 'True'),
(82, 'go home', '8', 'False'),
(84, 'take your dog for a walk', '8', 'False'),
(85, 'be a good person', '9', 'False'),
(86, 'study your lessons', '9', 'False'),
(87, 'take a walk', '9', 'True'),
(88, 'don&#039;t forget to eat', '9', 'True');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Username` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `Password` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `FirstName` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `LastName` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `Mail` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `Username`, `Password`, `FirstName`, `LastName`, `Mail`) VALUES
(6, 'mustafa', 'NTU1NDY0Njc5Nzk=', 'soydan', 'zeze', 'mesad@gmail.com'),
(7, 'zezeagfaf', 'YXNkc2dyZWRo', 'zezeagfaf', 'zezeagfaf', 'zezeagfaf@gmailcom'),
(8, 'zeze', 'MTIzNDU2', 'Mustafa', 'Soydan', 'email@try@gmail.com'),
(9, 'JD', 'MTIzNjU0', 'John', 'Doe', 'John@doe@gmail.com');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `todo_list`
--
ALTER TABLE `todo_list`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `todo_list`
--
ALTER TABLE `todo_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
