-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 19 Eyl 2023, 15:56:25
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
  `kategori` varchar(50) DEFAULT NULL,
  `duzenleme_tarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `odeme_tarihi` date DEFAULT NULL,
  `tutar` decimal(10,2) DEFAULT NULL,
  `odendi_mi` tinyint(1) NOT NULL,
  `daire_id` int NOT NULL,
  PRIMARY KEY (`aidat_id`),
  KEY `daire_id` (`daire_id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `aidatlar`
--

INSERT INTO `aidatlar` (`aidat_id`, `aciklama`, `kategori`, `duzenleme_tarihi`, `odeme_tarihi`, `tutar`, `odendi_mi`, `daire_id`) VALUES
(29, 'asdasdasd', 'asdasasd', '2023-09-05 13:29:20', '0000-00-00', '40.00', 1, 1),
(30, 'asdasdasd', 'asdasasd', '2023-09-05 12:40:55', '0000-00-00', '40.00', 0, 2),
(32, '111111111111', '1111111111', '2023-09-05 12:50:39', '0000-00-00', '111111.00', 0, 1),
(31, '111111111111', '1111111111', '2023-09-05 12:50:39', '0000-00-00', '111111.00', 0, 0),
(28, 'asdasdasd', 'asdasasd', '2023-09-05 12:40:55', '0000-00-00', '40.00', 0, 0),
(33, '111111111111', '1111111111', '2023-09-05 12:50:39', '0000-00-00', '111111.00', 0, 2),
(34, 'Eylül ayı aidatı', 'Aidat', '2023-09-11 07:23:10', '2023-10-01', '500.00', 1, 0),
(35, 'Eylül ayı aidatı', 'Aidat', '2023-09-08 12:49:40', '2023-10-01', '500.00', 1, 1),
(36, 'Eylül ayı aidatı', 'Aidat', '2023-09-05 14:25:59', '2023-10-01', '500.00', 0, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `daireler`
--

DROP TABLE IF EXISTS `daireler`;
CREATE TABLE IF NOT EXISTS `daireler` (
  `daire_id` int NOT NULL AUTO_INCREMENT,
  `blok_adi` varchar(10) DEFAULT NULL,
  `daire_no` varchar(10) DEFAULT NULL,
  `daire_tipi` varchar(50) DEFAULT NULL,
  `ev_sahibi_id` int DEFAULT NULL,
  `kiraci_id` int DEFAULT NULL,
  `kasa` decimal(10,2) NOT NULL,
  PRIMARY KEY (`daire_id`),
  KEY `ev_sahibi_id` (`ev_sahibi_id`),
  KEY `kiraci_id` (`kiraci_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `daireler`
--

INSERT INTO `daireler` (`daire_id`, `blok_adi`, `daire_no`, `daire_tipi`, `ev_sahibi_id`, `kiraci_id`, `kasa`) VALUES
(2, 'a', '2', '1', NULL, NULL, '40.00');

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
-- Tablo için tablo yapısı `ev_sahipleri`
--

DROP TABLE IF EXISTS `ev_sahipleri`;
CREATE TABLE IF NOT EXISTS `ev_sahipleri` (
  `ev_sahibi_id` int NOT NULL AUTO_INCREMENT,
  `ad_soyad` varchar(255) DEFAULT NULL,
  `kimlik_no` varchar(20) DEFAULT NULL,
  `telefon` varchar(20) DEFAULT NULL,
  `eposta` varchar(100) DEFAULT NULL,
  `sahip_oldugu_daireler` text,
  `kiralanan_daire_id` int DEFAULT NULL,
  PRIMARY KEY (`ev_sahibi_id`),
  KEY `kiralanan_daire_id` (`kiralanan_daire_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gelirler`
--

DROP TABLE IF EXISTS `gelirler`;
CREATE TABLE IF NOT EXISTS `gelirler` (
  `gelir_id` int NOT NULL AUTO_INCREMENT,
  `aciklama` varchar(255) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `tarih` date DEFAULT NULL,
  `tutar` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`gelir_id`)
) ENGINE=MyISAM AUTO_INCREMENT=259 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `gelirler`
--

INSERT INTO `gelirler` (`gelir_id`, `aciklama`, `kategori`, `tarih`, `tutar`) VALUES
(258, 'Daireye ait aidat ödemesi', 'Aidat Ödemesi', '2023-09-14', '500.00'),
(257, 'Daireye ait aidat ödemesi', 'Aidat Ödemesi', '2023-09-14', '40.00'),
(256, 'Daireye ait aidat ödemesi', 'Aidat Ödemesi', '2023-09-12', '500.00'),
(255, 'Daireye ait aidat ödemesi', 'Aidat Ödemesi', '2023-09-12', '40.00'),
(254, 'Daireye ait aidat ödemesi', 'Aidat Ödemesi', '2023-09-11', '500.00'),
(253, 'Daireye ait aidat ödemesi', 'Aidat Ödemesi', '2023-09-11', '40.00'),
(252, 'Daireye ait aidat ödemesi', 'Aidat Ödemesi', '2023-09-08', '500.00'),
(251, 'Daireye ait aidat ödemesi', 'Aidat Ödemesi', '2023-09-08', '40.00');

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
  KEY `fk_kategori` (`kategori_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `giderler`
--

INSERT INTO `giderler` (`gider_id`, `aciklama`, `son_odeme_tarihi`, `toplam_odenecek`, `odeme_durumu`, `kategori_id`) VALUES
(3, 'asdasdasd', '2009-02-20', '115.00', NULL, 2),
(4, 'asdasdasd', '2009-02-20', '115.00', NULL, 4),
(5, 'asdasdasd', '2009-02-20', '115.00', NULL, 4),
(6, 'asdasdasd', '2009-02-20', '115.00', NULL, 2),
(7, 'eylül ayı personel maaş ', '2023-09-09', '150.00', NULL, 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gider_kategorileri`
--

DROP TABLE IF EXISTS `gider_kategorileri`;
CREATE TABLE IF NOT EXISTS `gider_kategorileri` (
  `kategori_id` int NOT NULL AUTO_INCREMENT,
  `kategori_adi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `gider_kategorileri`
--

INSERT INTO `gider_kategorileri` (`kategori_id`, `kategori_adi`) VALUES
(5, '1111111111'),
(6, 'Su'),
(3, 'Personel Maaşları'),
(4, 'Vergi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hesaplar`
--

DROP TABLE IF EXISTS `hesaplar`;
CREATE TABLE IF NOT EXISTS `hesaplar` (
  `hesap_id` int NOT NULL AUTO_INCREMENT,
  `daire_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `hesap_turu` varchar(255) DEFAULT NULL,
  `kiraci_id` int DEFAULT NULL,
  `profil_id` int NOT NULL,
  `email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kullanici_adi` varchar(15) NOT NULL,
  `sifre` varchar(15) NOT NULL,
  `aktivasyon_kodu` int DEFAULT NULL,
  `hesap_onay` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reset_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`hesap_id`),
  KEY `daire_no` (`daire_id`(250)),
  KEY `kiraci_id` (`kiraci_id`),
  KEY `profil_id` (`profil_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `hesaplar`
--

INSERT INTO `hesaplar` (`hesap_id`, `daire_id`, `hesap_turu`, `kiraci_id`, `profil_id`, `email`, `kullanici_adi`, `sifre`, `aktivasyon_kodu`, `hesap_onay`, `created_at`, `reset_token`) VALUES
(1, '', '1', NULL, 0, 'aytug@email.com', 'aytug', '123', NULL, NULL, '2023-09-18 07:38:49', NULL),
(2, '', NULL, NULL, 0, 'k@mail.com', 'musteri', '123', NULL, NULL, '2023-09-18 07:38:49', NULL),
(3, '', NULL, NULL, 0, 'kerim@123.com', '', '$2y$10$qx7xGo3R', NULL, NULL, '2023-09-18 07:38:49', NULL),
(11, '', NULL, NULL, 0, 'testcimail2023@gmail.com', 'gercek', '$2y$10$bWK.w3gZ', NULL, NULL, '2023-09-18 07:38:49', NULL),
(9, '', NULL, NULL, 0, 'aasasd@gam.com', 'asdasdasd', '$2y$10$CdoLV6yg', NULL, NULL, '2023-09-18 07:38:49', NULL),
(10, '', NULL, NULL, 0, 'asdasdsdasdasd@mail.com', 'asdasd', '$2y$10$4TKpK8Va', NULL, NULL, '2023-09-18 07:38:49', NULL),
(12, '', '1', NULL, 0, 'aytuguzun4@gmail.com', 'aytuğ', '$2y$10$HsDTwk0t', 805525, 1, '2023-09-18 08:07:32', '2da1c7bd68afa5518cda8affee5edd12');

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
-- Tablo için tablo yapısı `kiracilar`
--

DROP TABLE IF EXISTS `kiracilar`;
CREATE TABLE IF NOT EXISTS `kiracilar` (
  `kiraci_id` int NOT NULL AUTO_INCREMENT,
  `ad_soyad` varchar(255) DEFAULT NULL,
  `kimlik_no` varchar(20) DEFAULT NULL,
  `telefon` varchar(20) DEFAULT NULL,
  `eposta` varchar(100) DEFAULT NULL,
  `kiralanan_daire_id` int DEFAULT NULL,
  PRIMARY KEY (`kiraci_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odeme_durumlari`
--

DROP TABLE IF EXISTS `odeme_durumlari`;
CREATE TABLE IF NOT EXISTS `odeme_durumlari` (
  `odeme_durumu_id` int NOT NULL AUTO_INCREMENT,
  `durum_adi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`odeme_durumu_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
