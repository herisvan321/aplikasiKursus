-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2022 at 03:49 PM
-- Server version: 10.6.7-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kursus`
--

-- --------------------------------------------------------

--
-- Table structure for table `audios`
--

CREATE TABLE `audios` (
  `id_audios` bigint(20) NOT NULL,
  `id_sub_menu_tema` bigint(20) NOT NULL,
  `kondisi_audios` int(11) NOT NULL,
  `file_audio` longtext NOT NULL,
  `content` longtext NOT NULL,
  `status_audio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `audios`
--

INSERT INTO `audios` (`id_audios`, `id_sub_menu_tema`, `kondisi_audios`, `file_audio`, `content`, `status_audio`) VALUES
(1, 20, 0, 'https://www.learningcontainer.com/wp-content/uploads/2020/02/Kalimba.mp3', 'hdjdnnsks', 1),
(2, 21, 0, 'https://www.learningcontainer.com/wp-content/uploads/2020/02/Kalimba.mp3', 'ueuusu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_forum`
--

CREATE TABLE `data_forum` (
  `id_data_forum` bigint(20) NOT NULL,
  `id_sub_menu_kursus` bigint(20) NOT NULL,
  `judul_forum` longtext NOT NULL,
  `deskripsi` longtext NOT NULL,
  `status_forum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_forum`
--

INSERT INTO `data_forum` (`id_data_forum`, `id_sub_menu_kursus`, `judul_forum`, `deskripsi`, `status_forum`) VALUES
(1, 2, '1. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_kursus`
--

CREATE TABLE `data_kursus` (
  `id_kursus` bigint(20) NOT NULL,
  `judul` text NOT NULL,
  `deskripsi` longtext NOT NULL,
  `introduction` longtext NOT NULL,
  `ellgibilitty` longtext NOT NULL,
  `image` text NOT NULL,
  `status_kursus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_kursus`
--

INSERT INTO `data_kursus` (`id_kursus`, `judul`, `deskripsi`, `introduction`, `ellgibilitty`, `image`, `status_kursus`) VALUES
(1, 'World Englisshes', '<p>ini deskripsi<br></p>', '<p>English is now a globalised phenomenon and the numbers of English \r\nspeakers around the globe have risen dramatically. Today non native \r\nEnglish speakers outnumber native English speakers, and English has \r\nbecome the world\'s foremost lingua franca, dominating the world stage in\r\n a number of domains. The English language has transcended its original \r\nboundaries, resulting in more contact with other languages than any \r\nother language in the world. Of course, language change and variation is\r\n a natural occurrence and happens to all languages, but the spread of \r\nEnglish is a rather unique phenomenon. English language contact is \r\noccurring on a global platform due to is inextricable connection to \r\nglobalization, which is at the heart of the current spread of the \r\nlanguage and its rise as a worldwide lingua franca. There has been an \r\nexplosive growth in the number of English speakers, and this increased \r\nusage on a global level has resulted in innovations in its use as it is \r\nemployed by speakers from diverse linguistic and cultural backgrounds \r\nand assumes distinct functions and forms in different contexts. It is no\r\n longer relevant to associate English purely with native speaking \r\nnations; today, English is spoken by the global community and, \r\ntherefore, is a language with a global ownership.&nbsp;\r\n                            </p>', '<p>Pembelajaran Bahasa Inggris sebagai bahasa Internasional/ global melalui <i>Website</i>\r\n ini dapat diikuti oleh Guru-guru Bahasa Inggris, Peserta didik \r\nSMA/sederajat maupun mahasiswa serta umum atau memiliki kemampuan bahasa\r\n Inggris intermediate. Peserta dapat mengikuti kegiatan pembelajaran \r\nbaik secara sinkronus atau belajar mandiri secara asinkronus. Untuk \r\ninformasi lebih lanjut dapat menghubungi admin pada alamat berikut ini:\r\n                            </p>', '1642778384.jpg', 0),
(2, 'The Spread of English in the world', '<p>Lorem ipsum represents a long-held tradition for designers,\r\n                        typographers and the like. Some people hate it and argue for\r\n                        its demise, but others ignore the hate as they create awesome\r\n                        tools to help create filler text for everyone from bacon lovers\r\n                        to Charlie Sheen fans.\r\n                      </p><p><br></p>', '<p>Lorem ipsum represents a long-held tradition for designers,\r\n                        typographers and the like. Some people hate it and argue for\r\n                        its demise, but others ignore the hate as they create awesome\r\n                        tools to help create filler text for everyone from bacon lovers\r\n                        to Charlie Sheen fans.\r\n                      </p>', '<p>Lorem ipsum represents a long-held tradition for designers,\r\n                        typographers and the like. Some people hate it and argue for\r\n                        its demise, but others ignore the hate as they create awesome\r\n                        tools to help create filler text for everyone from bacon lovers\r\n                        to Charlie Sheen fans.\r\n                      </p>', '1643267953.png', 0),
(3, 'Varieties of English', '<p>Lorem ipsum represents a long-held tradition for designers,\r\n                        typographers and the like. Some people hate it and argue for\r\n                        its demise, but others ignore the hate as they create awesome\r\n                        tools to help create filler text for everyone from bacon lovers\r\n                        to Charlie Sheen fans.\r\n                      </p>', '<p>Lorem ipsum represents a long-held tradition for designers,\r\n                        typographers and the like. Some people hate it and argue for\r\n                        its demise, but others ignore the hate as they create awesome\r\n                        tools to help create filler text for everyone from bacon lovers\r\n                        to Charlie Sheen fans.\r\n                      </p>', '<p>Lorem ipsum represents a long-held tradition for designers,\r\n                        typographers and the like. Some people hate it and argue for\r\n                        its demise, but others ignore the hate as they create awesome\r\n                        tools to help create filler text for everyone from bacon lovers\r\n                        to Charlie Sheen fans.\r\n                      </p>', '1643267146.png', 0),
(4, 'English as Lingua Franca', '<p>Lorem ipsum represents a long-held tradition for designers,\r\n                        typographers and the like. Some people hate it and argue for\r\n                        its demise, but others ignore the hate as they create awesome\r\n                        tools to help create filler text for everyone from bacon lovers\r\n                        to Charlie Sheen fans.\r\n                      </p>', '<p>Lorem ipsum represents a long-held tradition for designers,\r\n                        typographers and the like. Some people hate it and argue for\r\n                        its demise, but others ignore the hate as they create awesome\r\n                        tools to help create filler text for everyone from bacon lovers\r\n                        to Charlie Sheen fans.\r\n                      </p>', '<p>Lorem ipsum represents a long-held tradition for designers,\r\n                        typographers and the like. Some people hate it and argue for\r\n                        its demise, but others ignore the hate as they create awesome\r\n                        tools to help create filler text for everyone from bacon lovers\r\n                        to Charlie Sheen fans.\r\n                      </p>', '1643267237.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_message`
--

CREATE TABLE `data_message` (
  `id_data_message` bigint(20) NOT NULL,
  `id_sub_menu_kursus` bigint(20) NOT NULL,
  `status_data_message` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_message`
--

INSERT INTO `data_message` (`id_data_message`, `id_sub_menu_kursus`, `status_data_message`) VALUES
(2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_ratings`
--

CREATE TABLE `data_ratings` (
  `id_data_ratings` bigint(20) NOT NULL,
  `id_sub_menu_kursus` bigint(20) NOT NULL,
  `status_data_rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_ratings`
--

INSERT INTO `data_ratings` (`id_data_ratings`, `id_sub_menu_kursus`, `status_data_rating`) VALUES
(5, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_tema`
--

CREATE TABLE `data_tema` (
  `id_data_tema` bigint(20) NOT NULL,
  `id_sub_menu_kursus` bigint(20) NOT NULL,
  `judul_data_tema` text NOT NULL,
  `status_data_tema` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_tema`
--

INSERT INTO `data_tema` (`id_data_tema`, `id_sub_menu_kursus`, `judul_data_tema`, `status_data_tema`) VALUES
(1, 3, '1. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor ', 0),
(2, 4, '2. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor ', 0),
(3, 5, '3. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor ', 0),
(4, 5, 'ini judul ke 2', 0),
(5, 4, 'ini judul ke', 0),
(6, 4, 'ini judul ke', 0),
(7, 4, 'ini judul ke 2', 0),
(8, 4, 'ini judul ke 2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_text`
--

CREATE TABLE `data_text` (
  `id_data_text` bigint(20) NOT NULL,
  `id_sub_menu_kursus` bigint(20) NOT NULL,
  `judul_data_text` text NOT NULL,
  `content` longtext NOT NULL,
  `data_file` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_text`
--

INSERT INTO `data_text` (`id_data_text`, `id_sub_menu_kursus`, `judul_data_text`, `content`, `data_file`) VALUES
(1, 8, 'Lorem ipsum represents a long-held tradition for designers', '<p>Lorem ipsum represents a long-held tradition for designers,\r\n                        typographers and the like. Some people hate it and argue for\r\n                        its demise, but others ignore the hate as they create awesome\r\n                        tools to help create filler text for everyone from bacon lovers\r\n                        to Charlie Sheen fans.\r\n                      </p>', '1643260465.docx'),
(2, 10, 'gy', 'gyy', '1655300315.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id_forum` bigint(20) NOT NULL,
  `id_data_forum` bigint(20) NOT NULL,
  `id_mentor` bigint(20) NOT NULL,
  `id_peserta` bigint(20) NOT NULL,
  `kondisi_pengirim` int(11) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_kuis`
--

CREATE TABLE `jawaban_kuis` (
  `id_jawaban_kuis` bigint(20) NOT NULL,
  `id_peserta_kuis` bigint(20) NOT NULL,
  `id_soal` bigint(20) NOT NULL,
  `jawaban` text NOT NULL,
  `kondisi` int(11) NOT NULL,
  `skor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kuis`
--

CREATE TABLE `kuis` (
  `id_kuis` bigint(20) NOT NULL,
  `id_sub_menu_tema` bigint(20) NOT NULL,
  `judul_kuis` longtext NOT NULL,
  `deskripsi` longtext DEFAULT NULL,
  `waktu` int(11) NOT NULL,
  `status_kuis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kuis`
--

INSERT INTO `kuis` (`id_kuis`, `id_sub_menu_tema`, `judul_kuis`, `deskripsi`, `waktu`, `status_kuis`) VALUES
(1, 15, 'kuis 1', '<p>ini adalah deskipsi </p>', 3, 1),
(2, 15, 'kuis 2', 'ini adalah', 17, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mentors`
--

CREATE TABLE `mentors` (
  `id_mentor` bigint(20) NOT NULL,
  `nama_lengkap` varchar(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `biografi` longtext NOT NULL,
  `img` text NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` text NOT NULL,
  `status_mentor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mentors`
--

INSERT INTO `mentors` (`id_mentor`, `nama_lengkap`, `username`, `biografi`, `img`, `email`, `password`, `status_mentor`) VALUES
(1, 'Sri Imelwaty', 'SriImelwaty', 'Sri Imelwaty is an Asscociate Professor in STKIP PGRI Sumatera Barat where she has been a faculty member since 2006. She is currently serving as a Vice Dean of Academic Affair. She completed her Ph.D. at Curtin University Western Australia. Her research interests lie in the area of ELT, EIL, ELF and Global Englishes and English teacher professional development. She has collaborated actively with researchers in several other disciplines of Education and Linguistics and Applied Linguistics.', 'sri_imelwaty.png', 'imelwati05@yahoo.com', '$2y$10$IoLN0jGqj9kabv/Opr28JOQkOQiiBVvdIxQM/NCDMJsjZwsWXyqeG', 1),
(2, 'Edwar Kemal, M.Hum', 'Edwar', 'Edwar Kemal, He is an associate Prof at STKIP PGRI Sumatera Barat, Padang, Indonesia. He is currently pursuing his Doctoral Degree in Universiti Malaysia Kelantan. His areas of interest are sociopragmatics, pragmatics, semantics, translation and discourse analysis. He has been writing for several books and modules and producing some copyrights and patent products. He is actively writing for journals both national and international with low, medium and high index.', 'edwar_kemal.png', 'edwarkemal@gmail.com', '12345678', 1),
(3, 'Suharni', 'Suharni', 'Suharni is a Senior Lecturer in STKIP PGRI Sumatera Barat, Padang, Indonesia. Prior to her current position, she served as Dean of English Education Study Program. She is currently pursuing her Doctoral Degree in Universiti Malaysia Kelantan. Her teaching and research interests include Language Teaching, Extensive Reading, Language Assessment, and Applied Linguistics. She has published research articles in various journals and authored several books.', 'suharni.jpg', 'suharnithalib5@email.com', '12345678', 1),
(4, 'Lili Perpisa', 'lili', 'Lili Perpisa is a Senior Lecturer in STKIP PGRI Sumatera Barat, Padang, Indonesia. She is currently pursuing his Doctoral Degree in Universitas Negeri Padang. Her teaching and research interests include Academic Writing, Research in Language Teaching and Use Technology in Language Teaching. She has published research articles in various journals and authored several books.', '122.jpeg', 'liliperpisa@gmail.com', '12345678', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mentor_kursus`
--

CREATE TABLE `mentor_kursus` (
  `id_mentor_kursus` bigint(20) NOT NULL,
  `id_mentor` bigint(20) NOT NULL,
  `id_sub_kursus` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mentor_kursus`
--

INSERT INTO `mentor_kursus` (`id_mentor_kursus`, `id_mentor`, `id_sub_kursus`) VALUES
(1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `menu_kursus`
--

CREATE TABLE `menu_kursus` (
  `id_menu_kursus` bigint(20) NOT NULL,
  `id_sub_kursus` bigint(20) NOT NULL,
  `judul_menu_kursus` text NOT NULL,
  `status_menu_kursus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_kursus`
--

INSERT INTO `menu_kursus` (`id_menu_kursus`, `id_sub_kursus`, `judul_menu_kursus`, `status_menu_kursus`) VALUES
(1, 3, 'Syllabus', 0),
(2, 3, 'Gathering', 0),
(3, 3, 'Teaching materials', 0),
(4, 3, 'Grade', 1),
(5, 3, 'Forum', 0),
(6, 3, 'Message', 0),
(8, 1, 'Syllabus', 0),
(9, 1, 'Gathering', 0),
(10, 1, 'Teaching materials', 0),
(11, 1, 'Grade', 0),
(12, 1, 'Forum', 0),
(13, 1, 'Message', 0),
(14, 2, 'Syllabus', 0),
(15, 2, 'Gathering', 0),
(16, 2, 'Teaching materials', 0),
(17, 2, 'Grade', 0),
(18, 2, 'Forum', 0),
(19, 2, 'Message', 0),
(20, 4, 'Syllabus', 0),
(21, 4, 'Gathering', 0),
(22, 4, 'Teaching materials', 0),
(23, 4, 'Grade', 0),
(24, 4, 'Forum', 0),
(25, 4, 'Message', 0),
(26, 5, 'Syllabus', 0),
(27, 5, 'Gathering', 0),
(28, 5, 'Teaching materials', 0),
(29, 5, 'Grade', 0),
(30, 5, 'Forum', 0),
(31, 5, 'Message', 0),
(32, 6, 'Syllabus', 0),
(33, 6, 'Gathering', 0),
(34, 6, 'Teaching materials', 0),
(35, 6, 'Grade', 0),
(36, 6, 'Forum', 0),
(37, 6, 'Message', 0),
(38, 7, 'Syllabus', 0),
(39, 7, 'Gathering', 0),
(40, 7, 'Teaching materials', 0),
(41, 7, 'Grade', 0),
(42, 7, 'Forum', 0),
(43, 7, 'Message', 0),
(44, 8, 'Syllabus', 0),
(45, 8, 'Gathering', 0),
(46, 8, 'Teaching materials', 0),
(47, 8, 'Grade', 0),
(48, 8, 'Forum', 0),
(49, 8, 'Message', 0),
(50, 9, 'Syllabus', 0),
(51, 9, 'Gathering', 0),
(52, 9, 'Teaching materials', 0),
(53, 9, 'Grade', 0),
(54, 9, 'Forum', 0),
(55, 9, 'Message', 0),
(56, 10, 'Syllabus', 0),
(57, 10, 'Gathering', 0),
(58, 10, 'Teaching materials', 0),
(59, 10, 'Grade', 0),
(60, 10, 'Forum', 0),
(61, 10, 'Message', 0),
(62, 11, 'Syllabus', 0),
(63, 11, 'Gathering', 0),
(64, 11, 'Teaching materials', 0),
(65, 11, 'Grade', 0),
(66, 11, 'Forum', 0),
(67, 11, 'Message', 0),
(68, 12, 'Syllabus', 0),
(69, 12, 'Gathering', 0),
(70, 12, 'Teaching materials', 0),
(71, 12, 'Grade', 0),
(72, 12, 'Forum', 0),
(73, 12, 'Message', 0),
(74, 3, 'reting', 0),
(75, 3, 'coba', 0),
(76, 3, 'coba 2', 0),
(77, 3, 'coba3', 0),
(78, 3, 'coba 3', 0),
(79, 3, 'cobalagi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_tema`
--

CREATE TABLE `menu_tema` (
  `id_menu_tema` bigint(20) NOT NULL,
  `id_data_tema` bigint(20) NOT NULL,
  `judul_menu_tema` text NOT NULL,
  `status_menu_tema` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_tema`
--

INSERT INTO `menu_tema` (`id_menu_tema`, `id_data_tema`, `judul_menu_tema`, `status_menu_tema`) VALUES
(1, 4, 'Course Overview', 0),
(2, 4, 'Overview of Tools & Processes of Data Analysis', 1),
(3, 4, 'MAXQDA', 1),
(4, 4, 'Review', 0),
(6, 4, 'coba', 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id_message` bigint(20) NOT NULL,
  `id_data_message` bigint(20) NOT NULL,
  `id_mentor` bigint(20) NOT NULL,
  `id_peserta` bigint(20) NOT NULL,
  `notif` int(11) NOT NULL,
  `kondisi_pengirim` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `tgl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id_message`, `id_data_message`, `id_mentor`, `id_peserta`, `notif`, `kondisi_pengirim`, `content`, `tgl`) VALUES
(3, 2, 1, 1, 0, 1, 'ini adalah pesan pertama', '2022-06-12 15:51:18'),
(4, 2, 1, 1, 0, 1, 'ini adalah pesan kedua', '2022-06-12 15:51:18');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesertas`
--

CREATE TABLE `pesertas` (
  `id_peserta` bigint(20) NOT NULL,
  `nama_lengkap` varchar(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` text NOT NULL,
  `status_peserta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesertas`
--

INSERT INTO `pesertas` (`id_peserta`, `nama_lengkap`, `username`, `email`, `password`, `status_peserta`) VALUES
(1, 'herisvan hendra', 'herisvan', 'herisvan321@gmail.com', '$2y$10$IoLN0jGqj9kabv/Opr28JOQkOQiiBVvdIxQM/NCDMJsjZwsWXyqeG', 1),
(2, 'Herisvan Hendra', 'herisvan321', 'herisvanhendra321211@gmail.com', '$2y$10$BPpc6eJSWZIejtfRBExhreHlFxCofm7zaykQdXqEOfKwOy3KGDctC', 1);

-- --------------------------------------------------------

--
-- Table structure for table `peserta_kuis`
--

CREATE TABLE `peserta_kuis` (
  `id_peserta_kuis` bigint(20) NOT NULL,
  `id_kuis` bigint(20) NOT NULL,
  `id_peserta` bigint(20) NOT NULL,
  `ujian_ke` text NOT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_berakhir` datetime DEFAULT NULL,
  `waktu_selesai` datetime DEFAULT NULL,
  `jml_benar` int(11) DEFAULT NULL,
  `jml_salah` int(11) DEFAULT NULL,
  `nilai` text DEFAULT NULL,
  `kondisi_peserta_kuis` int(11) NOT NULL,
  `status_kuis_peserta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `peserta_kursus`
--

CREATE TABLE `peserta_kursus` (
  `id_peserta_kursus` bigint(20) NOT NULL,
  `id_sub_kursus` bigint(20) NOT NULL,
  `id_peserta` bigint(20) NOT NULL,
  `waktu` datetime NOT NULL,
  `deadline` datetime NOT NULL,
  `bukti_pembayaran` text DEFAULT NULL,
  `tgl_pembayaran` datetime DEFAULT NULL,
  `kondisi` int(11) NOT NULL,
  `kondisi_notif` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta_kursus`
--

INSERT INTO `peserta_kursus` (`id_peserta_kursus`, `id_sub_kursus`, `id_peserta`, `waktu`, `deadline`, `bukti_pembayaran`, `tgl_pembayaran`, `kondisi`, `kondisi_notif`, `status`) VALUES
(4, 1, 1, '2022-04-03 06:09:29', '2022-04-10 00:00:00', NULL, NULL, 0, 0, 0),
(5, 3, 1, '2022-04-03 06:22:40', '2022-04-10 00:00:00', '62276493.jpg', '2022-06-07 08:54:22', 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id_ratings` bigint(20) NOT NULL,
  `id_data_ratings` bigint(20) NOT NULL,
  `id_peserta` bigint(20) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `readings`
--

CREATE TABLE `readings` (
  `id_readings` bigint(20) NOT NULL,
  `id_sub_menu_tema` bigint(20) NOT NULL,
  `kondisi_readings` int(11) NOT NULL,
  `type_readings` int(11) NOT NULL,
  `file_reading` longtext NOT NULL,
  `content` longtext NOT NULL,
  `status_readings` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `readings`
--

INSERT INTO `readings` (`id_readings`, `id_sub_menu_tema`, `kondisi_readings`, `type_readings`, `file_reading`, `content`, `status_readings`) VALUES
(1, 14, 0, 0, 'https://www.learningcontainer.com/wp-content/uploads/2020/02/Kalimba.mp3', 'jsjsjjskks', 0),
(2, 13, 0, 0, 'https://www.learningcontainer.com/wp-content/uploads/2020/02/Kalimba.mp3', '\\ejje', 0),
(3, 4, 1, 0, '1656095015.mp4', 'yyu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id_soal` bigint(20) NOT NULL,
  `id_kuis` bigint(20) NOT NULL,
  `no_soal` int(11) NOT NULL,
  `media_soal` longtext DEFAULT NULL,
  `type_media` text DEFAULT NULL,
  `content` longtext NOT NULL,
  `jml_jawaban` int(11) NOT NULL,
  `jawaban` text NOT NULL,
  `skor_soal` int(11) NOT NULL,
  `status_soal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `id_kuis`, `no_soal`, `media_soal`, `type_media`, `content`, `jml_jawaban`, `jawaban`, `skor_soal`, `status_soal`) VALUES
(8, 2, 1, '1656390043.mp3', 'audio', 'ini soal 1', 5, 'd', 40, 0),
(9, 2, 2, '1656390136.mp4', 'video', 'ini soal 2', 5, 'c', 20, 0),
(10, 2, 3, NULL, NULL, 'ini soal 3', 5, 'a', 40, 1);

-- --------------------------------------------------------

--
-- Table structure for table `step_tema`
--

CREATE TABLE `step_tema` (
  `id_step` bigint(20) NOT NULL,
  `id_peserta` bigint(20) NOT NULL,
  `id_sub_menu_tema` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `step_tema`
--

INSERT INTO `step_tema` (`id_step`, `id_peserta`, `id_sub_menu_tema`) VALUES
(1, 1, 3),
(2, 1, 6),
(3, 1, 4),
(4, 1, 5),
(5, 1, 7),
(6, 1, 12),
(7, 1, 13),
(8, 1, 14),
(9, 1, 18),
(10, 1, 19),
(11, 1, 20),
(12, 1, 21),
(13, 1, 16),
(15, 1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kursus`
--

CREATE TABLE `sub_kursus` (
  `id_sub_kursus` bigint(20) NOT NULL,
  `id_kursus` bigint(20) NOT NULL,
  `judul_sub_kursus` text NOT NULL,
  `deskripsi` longtext NOT NULL,
  `status_sub_kursus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_kursus`
--

INSERT INTO `sub_kursus` (`id_sub_kursus`, `id_kursus`, `judul_sub_kursus`, `deskripsi`, `status_sub_kursus`) VALUES
(1, 1, 'History of English; English Speaker', '<p>History of English; English Speaker</p>', 0),
(2, 1, 'Advantages and disadvantages of the spread of English', '<p>Advantages and disadvantages of the spread of English Advantages and disadvantages of the spread of English </p>', 0),
(3, 1, 'Issues related to the spread of English', '<p>Issues related to the spread of English Issues related to the spread of English</p>', 0),
(4, 2, 'History of English; English Speaker', '<p>History of English; English Speaker</p>', 0),
(5, 2, 'Advantages and disadvantages of the spread of English', '<p>Advantages and disadvantages of the spread of English Advantages and disadvantages of the spread of English </p>', 0),
(6, 2, 'Issues related to the spread of English', '<p>Issues related to the spread of English Issues related to the spread of English</p>', 0),
(7, 3, 'History of English; English Speaker', '<p>History of English; English Speaker</p>', 0),
(8, 3, 'Advantages and disadvantages of the spread of English', '<p>Advantages and disadvantages of the spread of English Advantages and disadvantages of the spread of English </p>', 0),
(9, 3, 'Issues related to the spread of English', '<p>Issues related to the spread of English Issues related to the spread of English</p>', 0),
(10, 4, 'History of English; English Speaker', '<p>History of English; English Speaker</p>', 0),
(11, 4, 'Advantages and disadvantages of the spread of English', '<p>Advantages and disadvantages of the spread of English Advantages and disadvantages of the spread of English </p>', 0),
(12, 4, 'Issues related to the spread of English', '<p>Issues related to the spread of English Issues related to the spread of English</p>', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu_kursus`
--

CREATE TABLE `sub_menu_kursus` (
  `id_sub_menu_kursus` bigint(20) NOT NULL,
  `id_menu_kursus` bigint(20) NOT NULL,
  `judul_sub_menu_kursus` text NOT NULL,
  `kondisi_sub_menu_kursus` int(11) NOT NULL,
  `status_sub_menu_kursus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_menu_kursus`
--

INSERT INTO `sub_menu_kursus` (`id_sub_menu_kursus`, `id_menu_kursus`, `judul_sub_menu_kursus`, `kondisi_sub_menu_kursus`, `status_sub_menu_kursus`) VALUES
(1, 6, 'Pesan', 3, 0),
(2, 5, 'Go To Forum', 2, 1),
(3, 2, 'Tema 1', 1, 0),
(4, 2, 'Tema 22', 1, 0),
(5, 2, 'Tema', 1, 0),
(6, 1, 'Go to Syllabuss', 5, 1),
(7, 3, 'Go to Materi', 6, 0),
(8, 6, 'test', 0, 1),
(9, 74, 'Rating', 4, 0),
(10, 76, 'ccf', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu_tema`
--

CREATE TABLE `sub_menu_tema` (
  `id_sub_menu_tema` bigint(20) NOT NULL,
  `id_menu_tema` bigint(20) NOT NULL,
  `judul_sub_menu_tema` text NOT NULL,
  `menit` int(11) NOT NULL,
  `kondisi_sub_menu_tema` int(11) NOT NULL,
  `status_sub_menu_tema` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_menu_tema`
--

INSERT INTO `sub_menu_tema` (`id_sub_menu_tema`, `id_menu_tema`, `judul_sub_menu_tema`, `menit`, `kondisi_sub_menu_tema`, `status_sub_menu_tema`) VALUES
(3, 1, 'Video: Lecture Welcome to the Course!', 2, 0, 0),
(4, 1, 'Reading : Course Outline and Grading Information 10 min', 10, 2, 1),
(5, 2, 'Video: Tools', 3, 0, 1),
(6, 2, 'Video: Processes', 2, 0, 1),
(7, 2, 'Reading: [Handouts] Tools & Processes of Data Analysis', 10, 2, 1),
(9, 3, 'Video: Greetings from MAXQDA!', 1, 0, 0),
(10, 3, 'Reading: [Prep] Download & Install MAXQDA', 5, 2, 0),
(11, 3, 'Reading: [Prep] Download Initial Data Files', 5, 2, 0),
(12, 3, 'Video: Getting Started in MAXQDA', 5, 0, 1),
(13, 3, 'Reading: Getting You Familiar with MAXQDA', 30, 2, 1),
(14, 3, 'Reading: [OPTIONAL] Transcribing with MAXQDA', 20, 2, 1),
(15, 4, 'Practice Quiz: Practice', 30, 3, 0),
(16, 4, 'Quiz: Week 1', 30, 3, 1),
(17, 4, 'Audio', 3, 1, 1),
(18, 3, 'sat', 1, 0, 1),
(19, 3, 'coba', 1, 2, 1),
(20, 3, 'audio', 10, 1, 1),
(21, 3, 'audio2', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'email', 'email@email.com', NULL, '$2y$10$1/KnueVsp3GSl6uWMwMRfe9P9IWf7zf4ijrFOLAf2Xmz5qHkSlwtC', 'PFq3CaniucF8lJFDYbScfXx65msjuvJZmflnchy1prek7W5nyQiyu9RhwpM4', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id_videos` bigint(20) NOT NULL,
  `id_sub_menu_tema` bigint(20) NOT NULL,
  `kondisi_videos` int(11) NOT NULL,
  `file_video` longtext NOT NULL,
  `content` longtext DEFAULT NULL,
  `status_video` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id_videos`, `id_sub_menu_tema`, `kondisi_videos`, `file_video`, `content`, `status_video`) VALUES
(1, 3, 0, 'https://www.youtube.com/embed/r9Tfbeqyu2U', 'https://www.youtube.com/embed/r9Tfbeqyu2U', 0),
(2, 9, 1, '1655874981.mp4', 'https://youtu.be/Dbrz3YBCzMo', 1),
(3, 12, 1, '1655876003.mp4', 'tgguughuudf', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audios`
--
ALTER TABLE `audios`
  ADD PRIMARY KEY (`id_audios`),
  ADD KEY `id_sub_menu_tema` (`id_sub_menu_tema`);

--
-- Indexes for table `data_forum`
--
ALTER TABLE `data_forum`
  ADD PRIMARY KEY (`id_data_forum`),
  ADD KEY `id_sub_menu_kursus` (`id_sub_menu_kursus`);

--
-- Indexes for table `data_kursus`
--
ALTER TABLE `data_kursus`
  ADD PRIMARY KEY (`id_kursus`);

--
-- Indexes for table `data_message`
--
ALTER TABLE `data_message`
  ADD PRIMARY KEY (`id_data_message`),
  ADD KEY `id_sub_menu_kursus` (`id_sub_menu_kursus`);

--
-- Indexes for table `data_ratings`
--
ALTER TABLE `data_ratings`
  ADD PRIMARY KEY (`id_data_ratings`),
  ADD KEY `id_sub_menu_kursus` (`id_sub_menu_kursus`);

--
-- Indexes for table `data_tema`
--
ALTER TABLE `data_tema`
  ADD PRIMARY KEY (`id_data_tema`),
  ADD KEY `id_sub_menu_kursus` (`id_sub_menu_kursus`);

--
-- Indexes for table `data_text`
--
ALTER TABLE `data_text`
  ADD PRIMARY KEY (`id_data_text`),
  ADD KEY `id_sub_menu_kursus` (`id_sub_menu_kursus`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id_forum`),
  ADD KEY `id_data_forum` (`id_data_forum`),
  ADD KEY `id_mentor` (`id_mentor`),
  ADD KEY `id_peserta` (`id_peserta`);

--
-- Indexes for table `jawaban_kuis`
--
ALTER TABLE `jawaban_kuis`
  ADD PRIMARY KEY (`id_jawaban_kuis`),
  ADD KEY `id_peserta_kuis` (`id_peserta_kuis`),
  ADD KEY `id_soal` (`id_soal`);

--
-- Indexes for table `kuis`
--
ALTER TABLE `kuis`
  ADD PRIMARY KEY (`id_kuis`),
  ADD KEY `id_sub_menu_tema` (`id_sub_menu_tema`);

--
-- Indexes for table `mentors`
--
ALTER TABLE `mentors`
  ADD PRIMARY KEY (`id_mentor`);

--
-- Indexes for table `mentor_kursus`
--
ALTER TABLE `mentor_kursus`
  ADD PRIMARY KEY (`id_mentor_kursus`),
  ADD KEY `id_mentor` (`id_mentor`),
  ADD KEY `id_sub_kursus` (`id_sub_kursus`);

--
-- Indexes for table `menu_kursus`
--
ALTER TABLE `menu_kursus`
  ADD PRIMARY KEY (`id_menu_kursus`),
  ADD KEY `id_sub_kursus` (`id_sub_kursus`);

--
-- Indexes for table `menu_tema`
--
ALTER TABLE `menu_tema`
  ADD PRIMARY KEY (`id_menu_tema`),
  ADD KEY `id_data_tema` (`id_data_tema`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `id_mentor` (`id_mentor`),
  ADD KEY `id_data_message` (`id_data_message`),
  ADD KEY `id_peserta` (`id_peserta`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pesertas`
--
ALTER TABLE `pesertas`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `peserta_kuis`
--
ALTER TABLE `peserta_kuis`
  ADD PRIMARY KEY (`id_peserta_kuis`),
  ADD KEY `id_kuis` (`id_kuis`),
  ADD KEY `id_peserta` (`id_peserta`);

--
-- Indexes for table `peserta_kursus`
--
ALTER TABLE `peserta_kursus`
  ADD PRIMARY KEY (`id_peserta_kursus`),
  ADD KEY `id_sub_kursus` (`id_sub_kursus`),
  ADD KEY `id_peserta` (`id_peserta`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id_ratings`),
  ADD KEY `id_data_ratings` (`id_data_ratings`),
  ADD KEY `id_peserta` (`id_peserta`);

--
-- Indexes for table `readings`
--
ALTER TABLE `readings`
  ADD PRIMARY KEY (`id_readings`),
  ADD KEY `id_sub_menu_tema` (`id_sub_menu_tema`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `id_kuis` (`id_kuis`);

--
-- Indexes for table `step_tema`
--
ALTER TABLE `step_tema`
  ADD PRIMARY KEY (`id_step`),
  ADD KEY `id_peserta` (`id_peserta`),
  ADD KEY `id_sub_menu_tema` (`id_sub_menu_tema`);

--
-- Indexes for table `sub_kursus`
--
ALTER TABLE `sub_kursus`
  ADD PRIMARY KEY (`id_sub_kursus`),
  ADD KEY `id_kursus` (`id_kursus`);

--
-- Indexes for table `sub_menu_kursus`
--
ALTER TABLE `sub_menu_kursus`
  ADD PRIMARY KEY (`id_sub_menu_kursus`),
  ADD KEY `id_menu_kursus` (`id_menu_kursus`);

--
-- Indexes for table `sub_menu_tema`
--
ALTER TABLE `sub_menu_tema`
  ADD PRIMARY KEY (`id_sub_menu_tema`),
  ADD KEY `id_menu_tema` (`id_menu_tema`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id_videos`),
  ADD KEY `videos_ibfk_1` (`id_sub_menu_tema`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audios`
--
ALTER TABLE `audios`
  MODIFY `id_audios` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_forum`
--
ALTER TABLE `data_forum`
  MODIFY `id_data_forum` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_kursus`
--
ALTER TABLE `data_kursus`
  MODIFY `id_kursus` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_message`
--
ALTER TABLE `data_message`
  MODIFY `id_data_message` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_ratings`
--
ALTER TABLE `data_ratings`
  MODIFY `id_data_ratings` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_tema`
--
ALTER TABLE `data_tema`
  MODIFY `id_data_tema` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `data_text`
--
ALTER TABLE `data_text`
  MODIFY `id_data_text` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id_forum` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jawaban_kuis`
--
ALTER TABLE `jawaban_kuis`
  MODIFY `id_jawaban_kuis` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kuis`
--
ALTER TABLE `kuis`
  MODIFY `id_kuis` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mentors`
--
ALTER TABLE `mentors`
  MODIFY `id_mentor` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mentor_kursus`
--
ALTER TABLE `mentor_kursus`
  MODIFY `id_mentor_kursus` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_kursus`
--
ALTER TABLE `menu_kursus`
  MODIFY `id_menu_kursus` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `menu_tema`
--
ALTER TABLE `menu_tema`
  MODIFY `id_menu_tema` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id_message` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pesertas`
--
ALTER TABLE `pesertas`
  MODIFY `id_peserta` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `peserta_kuis`
--
ALTER TABLE `peserta_kuis`
  MODIFY `id_peserta_kuis` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peserta_kursus`
--
ALTER TABLE `peserta_kursus`
  MODIFY `id_peserta_kursus` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id_ratings` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `readings`
--
ALTER TABLE `readings`
  MODIFY `id_readings` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `step_tema`
--
ALTER TABLE `step_tema`
  MODIFY `id_step` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sub_kursus`
--
ALTER TABLE `sub_kursus`
  MODIFY `id_sub_kursus` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sub_menu_kursus`
--
ALTER TABLE `sub_menu_kursus`
  MODIFY `id_sub_menu_kursus` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sub_menu_tema`
--
ALTER TABLE `sub_menu_tema`
  MODIFY `id_sub_menu_tema` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id_videos` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audios`
--
ALTER TABLE `audios`
  ADD CONSTRAINT `audios_ibfk_1` FOREIGN KEY (`id_sub_menu_tema`) REFERENCES `sub_menu_tema` (`id_sub_menu_tema`);

--
-- Constraints for table `data_forum`
--
ALTER TABLE `data_forum`
  ADD CONSTRAINT `data_forum_ibfk_1` FOREIGN KEY (`id_sub_menu_kursus`) REFERENCES `sub_menu_kursus` (`id_sub_menu_kursus`);

--
-- Constraints for table `data_message`
--
ALTER TABLE `data_message`
  ADD CONSTRAINT `data_message_ibfk_1` FOREIGN KEY (`id_sub_menu_kursus`) REFERENCES `sub_menu_kursus` (`id_sub_menu_kursus`);

--
-- Constraints for table `data_ratings`
--
ALTER TABLE `data_ratings`
  ADD CONSTRAINT `data_ratings_ibfk_1` FOREIGN KEY (`id_sub_menu_kursus`) REFERENCES `sub_menu_kursus` (`id_sub_menu_kursus`);

--
-- Constraints for table `data_tema`
--
ALTER TABLE `data_tema`
  ADD CONSTRAINT `data_tema_ibfk_1` FOREIGN KEY (`id_sub_menu_kursus`) REFERENCES `sub_menu_kursus` (`id_sub_menu_kursus`);

--
-- Constraints for table `data_text`
--
ALTER TABLE `data_text`
  ADD CONSTRAINT `data_text_ibfk_1` FOREIGN KEY (`id_sub_menu_kursus`) REFERENCES `sub_menu_kursus` (`id_sub_menu_kursus`);

--
-- Constraints for table `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `forum_ibfk_1` FOREIGN KEY (`id_data_forum`) REFERENCES `data_forum` (`id_data_forum`),
  ADD CONSTRAINT `forum_ibfk_2` FOREIGN KEY (`id_mentor`) REFERENCES `mentors` (`id_mentor`),
  ADD CONSTRAINT `forum_ibfk_3` FOREIGN KEY (`id_peserta`) REFERENCES `pesertas` (`id_peserta`);

--
-- Constraints for table `jawaban_kuis`
--
ALTER TABLE `jawaban_kuis`
  ADD CONSTRAINT `jawaban_kuis_ibfk_1` FOREIGN KEY (`id_peserta_kuis`) REFERENCES `peserta_kuis` (`id_peserta_kuis`),
  ADD CONSTRAINT `jawaban_kuis_ibfk_2` FOREIGN KEY (`id_soal`) REFERENCES `soal` (`id_soal`);

--
-- Constraints for table `kuis`
--
ALTER TABLE `kuis`
  ADD CONSTRAINT `kuis_ibfk_1` FOREIGN KEY (`id_sub_menu_tema`) REFERENCES `sub_menu_tema` (`id_sub_menu_tema`);

--
-- Constraints for table `mentor_kursus`
--
ALTER TABLE `mentor_kursus`
  ADD CONSTRAINT `mentor_kursus_ibfk_1` FOREIGN KEY (`id_mentor`) REFERENCES `mentors` (`id_mentor`),
  ADD CONSTRAINT `mentor_kursus_ibfk_2` FOREIGN KEY (`id_sub_kursus`) REFERENCES `data_kursus` (`id_kursus`);

--
-- Constraints for table `menu_kursus`
--
ALTER TABLE `menu_kursus`
  ADD CONSTRAINT `menu_kursus_ibfk_1` FOREIGN KEY (`id_sub_kursus`) REFERENCES `sub_kursus` (`id_sub_kursus`);

--
-- Constraints for table `menu_tema`
--
ALTER TABLE `menu_tema`
  ADD CONSTRAINT `menu_tema_ibfk_1` FOREIGN KEY (`id_data_tema`) REFERENCES `data_tema` (`id_data_tema`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`id_mentor`) REFERENCES `mentors` (`id_mentor`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`id_data_message`) REFERENCES `data_message` (`id_data_message`),
  ADD CONSTRAINT `message_ibfk_3` FOREIGN KEY (`id_peserta`) REFERENCES `pesertas` (`id_peserta`);

--
-- Constraints for table `peserta_kuis`
--
ALTER TABLE `peserta_kuis`
  ADD CONSTRAINT `peserta_kuis_ibfk_1` FOREIGN KEY (`id_kuis`) REFERENCES `kuis` (`id_kuis`),
  ADD CONSTRAINT `peserta_kuis_ibfk_2` FOREIGN KEY (`id_peserta`) REFERENCES `pesertas` (`id_peserta`);

--
-- Constraints for table `peserta_kursus`
--
ALTER TABLE `peserta_kursus`
  ADD CONSTRAINT `peserta_kursus_ibfk_1` FOREIGN KEY (`id_sub_kursus`) REFERENCES `sub_kursus` (`id_sub_kursus`),
  ADD CONSTRAINT `peserta_kursus_ibfk_2` FOREIGN KEY (`id_peserta`) REFERENCES `pesertas` (`id_peserta`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`id_data_ratings`) REFERENCES `data_ratings` (`id_data_ratings`),
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`id_peserta`) REFERENCES `pesertas` (`id_peserta`);

--
-- Constraints for table `readings`
--
ALTER TABLE `readings`
  ADD CONSTRAINT `readings_ibfk_1` FOREIGN KEY (`id_sub_menu_tema`) REFERENCES `sub_menu_tema` (`id_sub_menu_tema`);

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `soal_ibfk_1` FOREIGN KEY (`id_kuis`) REFERENCES `kuis` (`id_kuis`);

--
-- Constraints for table `sub_kursus`
--
ALTER TABLE `sub_kursus`
  ADD CONSTRAINT `sub_kursus_ibfk_1` FOREIGN KEY (`id_kursus`) REFERENCES `data_kursus` (`id_kursus`);

--
-- Constraints for table `sub_menu_kursus`
--
ALTER TABLE `sub_menu_kursus`
  ADD CONSTRAINT `sub_menu_kursus_ibfk_1` FOREIGN KEY (`id_menu_kursus`) REFERENCES `menu_kursus` (`id_menu_kursus`);

--
-- Constraints for table `sub_menu_tema`
--
ALTER TABLE `sub_menu_tema`
  ADD CONSTRAINT `sub_menu_tema_ibfk_1` FOREIGN KEY (`id_menu_tema`) REFERENCES `menu_tema` (`id_menu_tema`);

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`id_sub_menu_tema`) REFERENCES `sub_menu_tema` (`id_sub_menu_tema`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
