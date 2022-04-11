-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 25 Mar 2022, 15:11:38
-- Sunucu sürümü: 10.4.8-MariaDB
-- PHP Sürümü: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `proje`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `twits`
--

CREATE TABLE `twits` (
  `id` int(11) NOT NULL,
  `twit_id` int(11) NOT NULL,
  `twit` varchar(500) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `twits`
--

INSERT INTO `twits` (`id`, `twit_id`, `twit`, `userid`) VALUES
(13, 102, 'a', 9),
(14, 103, 'b', 9),
(15, 104, 'c', 9),
(16, 105, 'd', 9),
(17, 106, 'e', 9),
(18, 107, 'f', 9),
(19, 108, 'g', 9),
(20, 109, 'h', 9),
(21, 110, 'i', 9),
(22, 111, 'j', 9),
(23, 112, 'k', 9),
(24, 113, 'l', 9);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`userid`, `username`, `email`, `password`) VALUES
(1, 'test', 'aa@hotmail.com', '123456'),
(2, 'test2', 'test2@hotmail.com', '123456'),
(3, 'test3', 'email@hotmail.com', '121'),
(4, 'testt', 'system@teknofix.com.', '123456'),
(7, 'mgoleli', 'muhammet@hotmail.com', '$2y$10$Md./76MtStDpv8xC/ICoJOj3iNpe3cZpbmtbPG0XLkkkL5rPtgRZG'),
(8, 'mehmet', 'mehmet@hotmail.com', '$2y$10$n3H2ZQ3aJu4SXAzU6Gpu5O.rwEc9fmWU0UX3ovf4yNUgcy89C43py'),
(9, 'Trever_Ledner10', 'leyla@hotmail.com', '$2y$10$prnsUKa9sz6iZX9siYaFGeWA57shzcZvQbQ8IYq0xQICnMmSO6uDa');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `twits`
--
ALTER TABLE `twits`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `twits`
--
ALTER TABLE `twits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
