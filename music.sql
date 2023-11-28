-- Database: `webmusic`
--
CREATE DATABASE IF NOT EXISTS `webmusic` DEFAULT CHARACTER SET utf8 COLLATE utf8_persian_ci;
USE `webmusic`;

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

DROP TABLE IF EXISTS `albums`;
CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8_persian_ci NOT NULL,
  `image` varchar(512) COLLATE utf8_persian_ci DEFAULT NULL,
  `singers_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `name`, `image`, `singers_id`, `time`) VALUES
(1, 'Afsaneh Cheshmanat', 'img\\albums\\1.jpg', 2, '2022-07-21 16:56:46'),
(2, 'Every Day , Every Night', 'img\\albums\\2.jpg', 1, '2022-07-21 16:56:47'),
(3, 'Che Haale Khobie', 'img\\albums\\3.jpg', 9, '2022-07-21 17:14:04'),
(5, 'Khomar', 'img\\track\\9.jpg', 4, '2022-07-21 17:14:06'),
(6, 'Saat Haft', 'img\\albums\\6.jpg', 6, '2022-07-21 17:14:07'),
(7, 'Santoori', 'img\\albums\\7.jpg', 7, '2022-07-21 17:14:08'),
(8, 'Tasvir', 'img\\albums\\8.jpg', 10, '2022-07-21 17:14:09'),
(37, 'Shahrzad', 'img/albums/2022-07-27 08-49-209.jpg', 7, '2022-07-27 08:49:20');

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

DROP TABLE IF EXISTS `music`;
CREATE TABLE IF NOT EXISTS `music` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8_persian_ci NOT NULL,
  `image` varchar(512) COLLATE utf8_persian_ci DEFAULT NULL,
  `album_id` int(11) DEFAULT NULL,
  `singer_id` int(11) NOT NULL,
  `mp3` varchar(512) COLLATE utf8_persian_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`id`, `name`, `image`, `album_id`, `singer_id`, `mp3`, `time`) VALUES
(1, 'Afsaneh cheshmanat', 'img\\track\\7.jpg', 1, 2, 'mp3/afsaneye.chashmhayat.mp3', '2022-07-22 16:52:46'),
(2, 'Afsoos', 'img\\track\\7.jpg', 1, 2, 'mp3/Afsoos.mp3', '2022-07-22 16:52:46'),
(3, 'Bikhabi', 'img\\track\\7.jpg', 1, 2, 'mp3/Bikhabi.mp3', '2022-07-22 16:52:46'),
(5, 'Shah Beyt', 'img\\albums\\2.jpg', 2, 1, 'mp3/ShahBeyt.mp3', '2022-07-22 17:00:59'),
(6, 'Tamoome In Shahr', 'img\\track\\13.jpg', 2, 1, 'mp3/TamoomeInShahr.mp3', '2022-07-22 17:01:49'),
(7, 'Chatr', 'img\\track\\12.jpg', 2, 1, 'mp3/Chatr.mp3', '2022-07-22 17:01:49'),
(8, 'Che hale Khobie', 'img\\track\\8.jpg', 3, 9, 'mp3/CheHaaleKhoobie.mp3', '2022-07-22 17:09:11'),
(9, 'Az Dele Bighararam', 'img\\track\\14.jpg', 3, 9, 'mp3/AzDeleBiGharaaram.mp3', '2022-07-22 17:09:11'),
(10, 'Kamand', 'img\\track\\10.jpg', 5, 4, 'mp3/kamand.mp3', '2022-07-22 17:19:48'),
(11, 'Khomar', 'img\\track\\9.jpg', 5, 4, 'mp3/Een o un Band Khomar.mp3', '2022-07-22 17:19:48'),
(12, 'Zolfe Yaar', 'img\\track\\11.jpg', 5, 4, 'mp3/Een O Un Band Zolfe Yar.mp3', '2022-07-22 17:19:48'),
(13, 'Deltangi', 'img\\track\\2.jpg', 6, 6, 'mp3/Deltangi.mp3', '2022-07-22 17:22:59'),
(14, 'Tamana', 'img\\track\\15.jpg', 6, 6, 'mp3/Tamana.mp3', '2022-07-22 17:22:59'),
(15, 'Eteraf', 'img\\albums\\8.jpg', 8, 10, 'mp3/Eteraf.mp3', '2022-07-22 17:26:22'),
(16, 'Ye Ghafas', 'img\\albums\\8.jpg', 8, 10, 'mp3/YeGhafas.mp3', '2022-07-22 17:26:22'),
(17, 'Man Ba To Khosham', 'img\\albums\\7.jpg', 7, 7, 'mp3/ManBaToKhosham.mp3', '2022-07-22 17:29:03'),
(18, 'Sange Saboor', 'img\\albums\\7.jpg', 7, 7, 'mp3/SangehSaboor.mp3', '2022-07-22 17:29:03'),
(27, 'Kojaee', 'img/track/2022-07-27 09-38-0016.jpg', 37, 7, 'mp3/2022-07-27 09-38-00Mohsen Chavoshi & Sina Sarlak - Kojaei ( Shahrzad ) [128].mp3', '2022-07-27 09:38:00');

-- --------------------------------------------------------

--
-- Table structure for table `singers`
--

DROP TABLE IF EXISTS `singers`;
CREATE TABLE IF NOT EXISTS `singers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8_persian_ci NOT NULL,
  `image` varchar(512) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `singers`
--

INSERT INTO `singers` (`id`, `name`, `image`) VALUES
(1, 'Arash&Masih', 'img\\singers\\arash&masih.jpg'),
(2, 'Alireza Ghorbani', 'img/singers/alireza_qorbani.jpg'),
(3, 'Hoorosh Band', 'img/singers/hooroshband.jpg'),
(4, 'Een o Un Band', 'img/singers/inoon-band.jpg'),
(5, 'Mazyar Falahi', 'img/singers/mazyar.jpg'),
(6, 'Mehdi Ahmadvand', 'img/singers/mehdi_ahmadvand'),
(7, 'Mohsen Chavoshi', 'img/singers/mohsen_chavoshi.jpg'),
(8, 'Emo Band', 'img/singers/emoband.jpg'),
(9, 'Saman Jalili', 'img/singers/saman_jalili'),
(10, 'Shadmehr Aghili', 'img/singers/shadmehr_aghili'),
(11, 'Bijan Yaar', 'img\\singers\\Bijan-Yaar.jpg'),
(12, 'Siavash Ghomayshi', 'img\\singers\\siyavash.jpg');
