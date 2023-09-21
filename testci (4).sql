-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 21 Eyl 2023, 13:31:52
-- Sunucu sürümü: 8.0.31
-- PHP Sürümü: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `testci`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `aidatlar`
--

DROP TABLE IF EXISTS `aidatlar`;
CREATE TABLE IF NOT EXISTS `aidatlar` (
  `aidat_id` int NOT NULL AUTO_INCREMENT,
  `aciklama` varchar(255) DEFAULT NULL,
  `odeme_tarihi` date DEFAULT NULL,
  `tutar` decimal(10,2) DEFAULT NULL,
  `odendi_mi` tinyint(1) NOT NULL,
  `daire_id` int NOT NULL,
  PRIMARY KEY (`aidat_id`),
  KEY `daire_id` (`daire_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `daireler`
--

DROP TABLE IF EXISTS `daireler`;
CREATE TABLE IF NOT EXISTS `daireler` (
  `daire_id` int NOT NULL AUTO_INCREMENT,
  `blok_adi` varchar(10) DEFAULT NULL,
  `daire_no` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`daire_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `daireler`
--

INSERT INTO `daireler` (`daire_id`, `blok_adi`, `daire_no`) VALUES
(9, '1', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `daire_sakinleri`
--

DROP TABLE IF EXISTS `daire_sakinleri`;
CREATE TABLE IF NOT EXISTS `daire_sakinleri` (
  `sakin_id` int NOT NULL AUTO_INCREMENT,
  `ad_soyad` varchar(255) DEFAULT NULL,
  `tc_no` varchar(20) NOT NULL,
  `telefon` varchar(20) DEFAULT NULL,
  `daire_id` int DEFAULT NULL,
  `sakin_turu` enum('Daire Sahibi','Kiracı') NOT NULL,
  PRIMARY KEY (`sakin_id`),
  KEY `daire_id` (`daire_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `daire_sakinleri`
--

INSERT INTO `daire_sakinleri` (`sakin_id`, `ad_soyad`, `tc_no`, `telefon`, `daire_id`, `sakin_turu`) VALUES
(9, 'aytuğ talha uzun', '1122334455667780', '949392029', 9, 'Daire Sahibi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `duyurular`
--

DROP TABLE IF EXISTS `duyurular`;
CREATE TABLE IF NOT EXISTS `duyurular` (
  `duyuru_id` int NOT NULL AUTO_INCREMENT,
  `duyuru_basligi` varchar(255) DEFAULT NULL,
  `duyuru_metni` text,
  `blok_adi` varchar(50) DEFAULT NULL,
  `hesap_turu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`duyuru_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gelirler`
--

DROP TABLE IF EXISTS `gelirler`;
CREATE TABLE IF NOT EXISTS `gelirler` (
  `gelir_id` int NOT NULL AUTO_INCREMENT,
  `aciklama` varchar(255) DEFAULT NULL,
  `tarih` date DEFAULT NULL,
  `tutar` decimal(10,2) DEFAULT NULL,
  `kategori_id` int DEFAULT NULL,
  PRIMARY KEY (`gelir_id`),
  KEY `fk_gelir_kategorisi` (`kategori_id`)
) ENGINE=MyISAM AUTO_INCREMENT=259 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `gelirler`
--

INSERT INTO `gelirler` (`gelir_id`, `aciklama`, `tarih`, `tutar`, `kategori_id`) VALUES
(258, 'Daireye ait aidat ödemesi', '2023-09-14', '500.00', NULL),
(257, 'Daireye ait aidat ödemesi', '2023-09-14', '40.00', NULL),
(256, 'Daireye ait aidat ödemesi', '2023-09-12', '500.00', NULL),
(255, 'Daireye ait aidat ödemesi', '2023-09-12', '40.00', NULL),
(254, 'Daireye ait aidat ödemesi', '2023-09-11', '500.00', NULL),
(253, 'Daireye ait aidat ödemesi', '2023-09-11', '40.00', NULL),
(252, 'Daireye ait aidat ödemesi', '2023-09-08', '500.00', NULL),
(251, 'Daireye ait aidat ödemesi', '2023-09-08', '40.00', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gelir_kategorileri`
--

DROP TABLE IF EXISTS `gelir_kategorileri`;
CREATE TABLE IF NOT EXISTS `gelir_kategorileri` (
  `kategori_id` int NOT NULL AUTO_INCREMENT,
  `kategori_adi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `giderler`
--

DROP TABLE IF EXISTS `giderler`;
CREATE TABLE IF NOT EXISTS `giderler` (
  `gider_id` int NOT NULL AUTO_INCREMENT,
  `aciklama` varchar(255) DEFAULT NULL,
  `son_odeme_tarihi` date DEFAULT NULL,
  `toplam_odenecek` decimal(10,2) DEFAULT NULL,
  `odeme_durumu` tinyint(1) DEFAULT NULL,
  `kategori_id` int DEFAULT NULL,
  PRIMARY KEY (`gider_id`),
  KEY `kategori_id` (`kategori_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gider_kategorileri`
--

DROP TABLE IF EXISTS `gider_kategorileri`;
CREATE TABLE IF NOT EXISTS `gider_kategorileri` (
  `kategori_id` int NOT NULL AUTO_INCREMENT,
  `kategori_adi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hesaplar`
--

DROP TABLE IF EXISTS `hesaplar`;
CREATE TABLE IF NOT EXISTS `hesaplar` (
  `hesap_id` int NOT NULL AUTO_INCREMENT,
  `daire_id` int NOT NULL,
  `hesap_turu` varchar(255) DEFAULT NULL,
  `daire_sakini_id` int DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `sifre` varchar(15) NOT NULL,
  `aktivasyon_kodu` int DEFAULT NULL,
  `hesap_onay` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `reset_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`hesap_id`),
  KEY `daire_id` (`daire_id`),
  KEY `kullanici_id` (`daire_sakini_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `hesaplar`
--

INSERT INTO `hesaplar` (`hesap_id`, `daire_id`, `hesap_turu`, `daire_sakini_id`, `email`, `sifre`, `aktivasyon_kodu`, `hesap_onay`, `created_at`, `reset_token`) VALUES
(9, 9, '1', NULL, 'aytuguzun4@gmail.com', '123123', NULL, NULL, '2023-09-21 12:19:59', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kasalar`
--

DROP TABLE IF EXISTS `kasalar`;
CREATE TABLE IF NOT EXISTS `kasalar` (
  `kasa_id` int NOT NULL AUTO_INCREMENT,
  `kasa_adi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tarih` date DEFAULT NULL,
  `bakiye` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`kasa_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `kasalar`
--

INSERT INTO `kasalar` (`kasa_id`, `kasa_adi`, `tarih`, `bakiye`) VALUES
(1, 'main', '2023-09-14', '1700.00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personel`
--

DROP TABLE IF EXISTS `personel`;
CREATE TABLE IF NOT EXISTS `personel` (
  `personel_id` int NOT NULL AUTO_INCREMENT,
  `ad_soyad` varchar(255) DEFAULT NULL,
  `pozisyon` varchar(100) DEFAULT NULL,
  `kimlik_no` varchar(20) DEFAULT NULL,
  `telefon` varchar(20) DEFAULT NULL,
  `eposta` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`personel_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `profiller`
--

DROP TABLE IF EXISTS `profiller`;
CREATE TABLE IF NOT EXISTS `profiller` (
  `profil_id` int NOT NULL AUTO_INCREMENT,
  `ad_soyad` varchar(255) NOT NULL,
  `telefon` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tc_no` varchar(11) DEFAULT NULL,
  `daire_id` int DEFAULT NULL,
  PRIMARY KEY (`profil_id`),
  KEY `daire_id` (`daire_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `veriler`
--

DROP TABLE IF EXISTS `veriler`;
CREATE TABLE IF NOT EXISTS `veriler` (
  `daire_id` int NOT NULL AUTO_INCREMENT,
  `blok_adi` varchar(10) DEFAULT NULL,
  `daire_no` varchar(10) DEFAULT NULL,
  `daire_tipi` varchar(50) DEFAULT NULL,
  `ev_sahibi_id` int DEFAULT NULL,
  `kiraci_id` int DEFAULT NULL,
  `kasa` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`daire_id`),
  KEY `ev_sahibi_id` (`ev_sahibi_id`),
  KEY `kiraci_id` (`kiraci_id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `veriler`
--

INSERT INTO `veriler` (`daire_id`, `blok_adi`, `daire_no`, `daire_tipi`, `ev_sahibi_id`, `kiraci_id`, `kasa`) VALUES
(37, '12312', '231', '3123', 3123123, 1231231, '12123.00'),
(36, 'sad', '213', '2312312', 123123, 23123123, '213123.00'),
(35, '534', '234', '234', 1, 231, '123.00'),
(34, '45sad', 'asd', 'asd', 0, 0, '0.00'),
(33, '2', '3', '4', 5, NULL, '6.00'),
(32, '1', '1', '1', 1, 1, '1.00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `website_ayarlari`
--

DROP TABLE IF EXISTS `website_ayarlari`;
CREATE TABLE IF NOT EXISTS `website_ayarlari` (
  `ayar_id` int NOT NULL AUTO_INCREMENT,
  `site_basligi` varchar(255) DEFAULT NULL,
  `site_logosu` varchar(30) NOT NULL,
  `site_aciklamasi` text,
  `email_adresi` varchar(100) DEFAULT NULL,
  `telefon_numarasi` varchar(20) DEFAULT NULL,
  `ana_sayfa_mesaji` text,
  `sosyal_medya_linkleri` text,
  PRIMARY KEY (`ayar_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `website_ayarlari`
--

INSERT INTO `website_ayarlari` (`ayar_id`, `site_basligi`, `site_logosu`, `site_aciklamasi`, `email_adresi`, `telefon_numarasi`, `ana_sayfa_mesaji`, `sosyal_medya_linkleri`) VALUES
(1, 'sysnet', 'uploads/pngimg.com - php_PNG35', 'bos bos bos', 'email@email.com', '546454654654', 'siteye hos geldiniz', 'instagram facebook linkedin');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `website_yetkileri`
--

DROP TABLE IF EXISTS `website_yetkileri`;
CREATE TABLE IF NOT EXISTS `website_yetkileri` (
  `yetki_id` int NOT NULL AUTO_INCREMENT,
  `yetki_adi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`yetki_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yetkilendirme`
--

DROP TABLE IF EXISTS `yetkilendirme`;
CREATE TABLE IF NOT EXISTS `yetkilendirme` (
  `yetki_id` int NOT NULL AUTO_INCREMENT,
  `kullanici_id` int DEFAULT NULL,
  `yetki_adi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`yetki_id`),
  KEY `kullanici_id` (`kullanici_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
