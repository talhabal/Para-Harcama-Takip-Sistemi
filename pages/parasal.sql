-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 17 Oca 2021, 13:30:34
-- Sunucu sürümü: 10.4.6-MariaDB
-- PHP Sürümü: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `parasal`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_kadi` varchar(500) NOT NULL,
  `admin_sifre` varchar(500) NOT NULL,
  `son_giris_tarih` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip_addr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_kadi`, `admin_sifre`, `son_giris_tarih`, `ip_addr`) VALUES
(1, 'admin1', '1234567', '2021-01-01 15:51:37', '::1'),
(2, 'admin17', '12345', '2021-01-01 15:46:14', '::1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `harcama`
--

CREATE TABLE `harcama` (
  `harcama_id` int(11) NOT NULL,
  `harcama_adi` varchar(500) NOT NULL,
  `harcama_miktar` mediumtext NOT NULL,
  `harcama_birim` varchar(50) NOT NULL,
  `harcama_tarih` timestamp NOT NULL DEFAULT current_timestamp(),
  `harcama_adres` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `harcama`
--

INSERT INTO `harcama` (`harcama_id`, `harcama_adi`, `harcama_miktar`, `harcama_birim`, `harcama_tarih`, `harcama_adres`) VALUES
(29, 'Anafartalr Market', '100', '€', '2021-01-01 15:42:03', 'Çanakkale'),
(30, 'Ahmet Bakkal', '500', '€', '2021-01-01 15:42:24', 'KEMLAPAŞA'),
(31, 'Petrol Ofisi', '500', 'tl', '2021-01-01 15:42:47', 'Bursa'),
(32, 'Anadolu Hastanesi', '100', 'tl', '2021-01-01 15:43:07', 'Troya Caddesi'),
(33, 'Ahmet Bakkal', '100', '₺', '2021-01-01 15:53:46', 'Bursa'),
(34, 'Petrol Ofisi', '500', 'dolar', '2021-01-01 15:54:14', 'Troya Caddesi'),
(35, 'Anadolu Hastanesi', '1000', 'euro', '2021-01-01 15:54:36', 'Çanakkale');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hesap_form`
--

CREATE TABLE `hesap_form` (
  `hesap_id` int(11) NOT NULL,
  `hesap_adi` varchar(500) NOT NULL,
  `hesap_turu` varchar(500) NOT NULL,
  `miktar` mediumtext NOT NULL,
  `birim` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_adi` varchar(500) NOT NULL,
  `kategori_tl` mediumtext NOT NULL,
  `kategori_dolar` mediumtext NOT NULL,
  `kategori_euro` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_adi`, `kategori_tl`, `kategori_dolar`, `kategori_euro`) VALUES
(1, 'market', '200', '700', '600'),
(2, 'akaryakit', '1000', '800', '400'),
(3, 'saglik', '100', '1500', '1000');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Tablo için indeksler `harcama`
--
ALTER TABLE `harcama`
  ADD PRIMARY KEY (`harcama_id`);

--
-- Tablo için indeksler `hesap_form`
--
ALTER TABLE `hesap_form`
  ADD PRIMARY KEY (`hesap_id`);

--
-- Tablo için indeksler `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `harcama`
--
ALTER TABLE `harcama`
  MODIFY `harcama_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Tablo için AUTO_INCREMENT değeri `hesap_form`
--
ALTER TABLE `hesap_form`
  MODIFY `hesap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Tablo için AUTO_INCREMENT değeri `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
