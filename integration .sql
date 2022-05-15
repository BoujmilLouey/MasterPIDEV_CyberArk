-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2022 at 03:08 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `integration`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `allday` tinyint(1) NOT NULL,
  `background_color` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `boarder_color` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `texte_color` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `user_id`, `titre`, `start`, `end`, `description`, `allday`, `background_color`, `boarder_color`, `texte_color`) VALUES
(2, 1, 'aaaaaaa', '2022-04-29 00:00:00', '2022-05-06 00:00:00', 'ahahahahh', 1, '#000000', '#895d5d', '#000000'),
(3, 1, 'aaaaaaaaaaaaa', '2022-05-18 00:00:00', '2022-06-05 00:00:00', 'tiraalaakjakja', 1, '#000000', '#000000', '#000000');

-- --------------------------------------------------------

--
-- Table structure for table `calender`
--

CREATE TABLE `calender` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `all_day` tinyint(1) NOT NULL,
  `background_color` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `border_color` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_color` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calender`
--

INSERT INTO `calender` (`id`, `title`, `start`, `end`, `description`, `all_day`, `background_color`, `border_color`, `text_color`) VALUES
(1, 'aaaaa', '2022-03-17 03:04:00', '2022-03-12 15:14:00', 'zoyaiuazgriauzgfiuag', 1, '#000000', '#000000', '#000000'),
(2, 'promo', '2022-03-08 12:13:59', '2022-03-10 12:13:59', 'akjgfakgfayj', 1, '#000000', '#000000', '#000000');

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `label`, `color`) VALUES
(1, 'suivi22', '#b51f1f');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_commande` date NOT NULL,
  `montant_commande` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`id`, `user_id`, `date_commande`, `montant_commande`) VALUES
(1, 1, '2022-03-07', 665.3),
(2, 1, '2022-03-07', 665.3),
(3, 1, '2022-03-07', 665.3),
(4, 1, '2022-03-07', 665.3),
(45, 3, '2022-03-01', 1220),
(46, 3, '2022-03-01', 300),
(47, 3, '2022-03-01', 490),
(48, 3, '2022-03-01', 710),
(49, 3, '2022-03-02', 1730),
(50, 3, '2022-03-02', 1785),
(51, 3, '2022-03-02', 1825),
(52, 3, '2022-03-02', 1880),
(53, 3, '2022-03-02', 1880),
(54, 3, '2022-03-02', 2345),
(55, 3, '2022-03-04', 0),
(56, 3, '2022-03-04', 0),
(57, 3, '2022-03-04', 150),
(58, 3, '2022-03-04', 190),
(59, 3, '2022-03-04', 190),
(60, 3, '2022-03-04', 245),
(61, 3, '2022-03-04', 245),
(62, 3, '2022-03-04', 110),
(63, 3, '2022-03-05', 110),
(64, 1, '2022-03-06', 440),
(66, 1, '2022-03-07', 385),
(67, 1, '2022-03-07', 480),
(68, 1, '2022-03-08', 110),
(69, 1, '2022-03-08', 110),
(70, 1, '2022-03-08', 110),
(71, 1, '2022-03-08', 110),
(72, 1, '2022-03-08', 150),
(73, 1, '2022-03-08', 40),
(74, 1, '2022-03-08', 40),
(75, 1, '2022-03-08', 40),
(76, 1, '2022-03-08', 40),
(77, 1, '2022-03-08', 40),
(78, 1, '2022-03-08', 40),
(79, 1, '2022-03-08', 40),
(80, 1, '2022-03-08', 40),
(81, 1, '2022-03-08', 40),
(82, 1, '2022-03-08', 40),
(83, 1, '2022-03-08', 40),
(84, 1, '2022-03-08', 40),
(85, 1, '2022-03-08', 40),
(86, 1, '2022-03-08', 40),
(87, 1, '2022-03-08', 110),
(88, 1, '2022-03-08', 110),
(89, 1, '2022-03-08', 110),
(90, 1, '2022-03-08', 785),
(91, 1, '2022-03-08', 785),
(92, 1, '2022-03-08', 895),
(93, 1, '2022-05-14', 55),
(94, 1, '2022-05-14', 55),
(95, 1, '2022-05-14', 440),
(96, 1, '2022-05-14', 440),
(97, 1, '2022-05-14', 440),
(98, 1, '2022-05-14', 440),
(99, 1, '2022-05-15', 110),
(100, 12, '2022-05-15', 40),
(101, 12, '2022-05-15', 150),
(102, 12, '2022-05-15', 190),
(103, 12, '2022-05-15', 190),
(104, 12, '2022-05-15', 110),
(105, 12, '2022-05-15', 778.3),
(106, 12, '2022-05-15', 260),
(107, 12, '2022-05-15', 665.3);

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220307194824', '2022-03-07 20:48:28', 209),
('DoctrineMigrations\\Version20220307200719', '2022-03-07 21:07:26', 167),
('DoctrineMigrations\\Version20220308072901', '2022-03-08 08:29:06', 195),
('DoctrineMigrations\\Version20220514145304', '2022-05-14 16:53:14', 592),
('DoctrineMigrations\\Version20220515034613', '2022-05-15 05:46:27', 151);

-- --------------------------------------------------------

--
-- Table structure for table `events_reservation`
--

CREATE TABLE `events_reservation` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reservations` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events_reservation`
--

INSERT INTO `events_reservation` (`id`, `user_id`, `tel`, `reservations`) VALUES
(1, 1, '+21652260620', 1),
(2, 1, '+21652260620', 1),
(3, 1, '+21658413883', 1),
(4, 1, '+19802916904', 1),
(5, 1, '+19802916904', 1),
(6, 1, '+19802916904', 1),
(7, 1, '21658413883', 1),
(8, 1, '+216 58 413 883', 1),
(9, 1, '+21658413883', 1),
(10, 1, '+21658413883', 1),
(11, 1, '+216 58 413 883', 1),
(12, 1, '+216 58 413 883', 1),
(13, 1, '+21658413883', 1),
(14, 1, '+21658 413 883', 1),
(15, 1, '+216 58 413 883', 1),
(16, 1, '+216 58 413 883', 1),
(17, 1, '+216 25 289 753', 1),
(18, 1, '58413883', 1),
(19, 1, '+21658413883', 1),
(20, 1, '+1 980 291 6904', 1),
(21, 1, '+21658413883', 1);

-- --------------------------------------------------------

--
-- Table structure for table `events_reservation_calendar`
--

CREATE TABLE `events_reservation_calendar` (
  `events_reservation_id` int(11) NOT NULL,
  `calendar_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ligne_commande`
--

CREATE TABLE `ligne_commande` (
  `id` int(11) NOT NULL,
  `commande_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ligne_commande`
--

INSERT INTO `ligne_commande` (`id`, `commande_id`, `produit_id`, `quantite`, `price`) VALUES
(1, 1, 8, 1, 665.3),
(2, 2, 8, 1, 665.3),
(3, 3, 8, 1, 665.3),
(4, 4, 8, 1, 665.3),
(11, 45, 4, 1, 150),
(12, 45, 6, 2, 910),
(13, 45, 3, 2, 120),
(14, 45, 1, 1, 40),
(15, 46, 4, 1, 150),
(16, 46, 1, 1, 40),
(17, 46, 2, 1, 110),
(18, 47, 4, 2, 300),
(19, 47, 1, 2, 80),
(20, 47, 2, 1, 110),
(21, 48, 4, 2, 300),
(22, 48, 1, 2, 80),
(23, 48, 2, 3, 330),
(24, 49, 4, 2, 300),
(25, 49, 1, 2, 80),
(26, 49, 2, 4, 440),
(27, 49, 6, 2, 910),
(28, 50, 4, 2, 300),
(29, 50, 1, 2, 80),
(30, 50, 2, 4, 440),
(31, 50, 6, 2, 910),
(32, 50, 5, 1, 55),
(33, 51, 4, 2, 300),
(34, 51, 1, 3, 120),
(35, 51, 2, 4, 440),
(36, 51, 6, 2, 910),
(37, 51, 5, 1, 55),
(38, 52, 4, 2, 300),
(39, 52, 1, 3, 120),
(40, 52, 2, 4, 440),
(41, 52, 6, 2, 910),
(42, 52, 5, 2, 110),
(43, 53, 4, 2, 300),
(44, 53, 1, 3, 120),
(45, 53, 2, 4, 440),
(46, 53, 6, 2, 910),
(47, 53, 5, 2, 110),
(48, 54, 4, 4, 600),
(49, 54, 1, 3, 120),
(50, 54, 2, 5, 550),
(51, 54, 6, 2, 910),
(52, 54, 5, 3, 165),
(53, 57, 4, 1, 150),
(54, 58, 4, 1, 150),
(55, 58, 1, 1, 40),
(56, 59, 4, 1, 150),
(57, 59, 1, 1, 40),
(58, 60, 4, 1, 150),
(59, 60, 1, 1, 40),
(60, 60, 5, 1, 55),
(61, 61, 4, 1, 150),
(62, 61, 1, 1, 40),
(63, 61, 5, 1, 55),
(64, 62, 2, 1, 110),
(65, 63, 2, 1, 110),
(66, 64, 2, 4, 440),
(68, 66, 2, 3, 330),
(69, 66, 5, 1, 55),
(70, 67, 2, 3, 330),
(71, 67, 5, 2, 110),
(72, 67, 1, 1, 40),
(73, 68, 2, 1, 110),
(74, 69, 2, 1, 110),
(75, 70, 2, 1, 110),
(76, 71, 2, 1, 110),
(77, 72, 2, 1, 110),
(78, 72, 1, 1, 40),
(79, 73, 1, 1, 40),
(80, 74, 1, 1, 40),
(81, 75, 1, 1, 40),
(82, 76, 1, 1, 40),
(83, 77, 1, 1, 40),
(84, 78, 1, 1, 40),
(85, 79, 1, 1, 40),
(86, 80, 1, 1, 40),
(87, 81, 1, 1, 40),
(88, 82, 1, 1, 40),
(89, 83, 1, 1, 40),
(90, 84, 1, 1, 40),
(91, 85, 1, 1, 40),
(92, 86, 1, 1, 40),
(93, 87, 2, 1, 110),
(94, 88, 2, 1, 110),
(95, 89, 2, 1, 110),
(96, 90, 2, 3, 330),
(97, 90, 6, 1, 455),
(98, 91, 2, 3, 330),
(99, 91, 6, 1, 455),
(100, 92, 2, 4, 440),
(101, 92, 6, 1, 455),
(102, 93, 5, 1, 55),
(103, 94, 5, 1, 55),
(104, 95, 2, 4, 440),
(105, 96, 2, 4, 440),
(106, 97, 2, 4, 440),
(107, 98, 2, 4, 440),
(108, 99, 2, 1, 110),
(109, 100, 1, 1, 40),
(110, 101, 1, 1, 40),
(111, 101, 2, 1, 110),
(112, 102, 1, 2, 80),
(113, 102, 2, 1, 110),
(114, 103, 1, 2, 80),
(115, 103, 2, 1, 110),
(116, 104, 2, 1, 110),
(117, 105, 5, 1, 55),
(118, 105, 9, 1, 58),
(119, 105, 8, 1, 665.3),
(120, 106, 2, 2, 220),
(121, 106, 1, 1, 40),
(122, 107, 8, 1, 665.3);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,3) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datefin` date DEFAULT NULL,
  `datedeb` date DEFAULT NULL,
  `promo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `categorie_id`, `name`, `price`, `description`, `datefin`, `datedeb`, `promo`) VALUES
(1, 1, 'suivi', '233.000', 'hjjg', '2022-08-13', '2022-04-11', 1),
(3, 1, 'hhhhkhffggd', '231.000', 'ggdffd', '2022-03-17', '2022-03-16', 1),
(4, 1, 'aaa', '123.000', 'aa', '2022-05-16', '2022-05-28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `datefin` date DEFAULT NULL,
  `datedeb` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `image`, `price`, `datefin`, `datedeb`) VALUES
(1, 'PULL ', '', 40, NULL, NULL),
(2, 'CAM HD', '', 110, NULL, NULL),
(3, 'MICROPHONE GAMER ', '', 60, NULL, NULL),
(4, 'ECRAN GAMER', '', 150, NULL, NULL),
(5, 'MICRO', '', 55, NULL, NULL),
(6, 'CAMHD', '', 455, NULL, NULL),
(7, 'PULL BLEU', '', 54, NULL, NULL),
(8, 'CODE GAMING', '', 665.3, NULL, NULL),
(9, 'THR', '', 58, NULL, NULL),
(10, 'aaaaaa', 'aaaaaa', 123456, NULL, NULL),
(11, 'aaaaaa', 'aaaaaa', 123456, NULL, NULL),
(12, 'aaa', '12', 1212, NULL, NULL),
(13, 'iygfagaug', 'aihgaigaig', 123465, '2020-03-04', '2019-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `reset_password_request`
--

CREATE TABLE `reset_password_request` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `selector` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hashed_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requested_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `expires_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reset_password_request`
--

INSERT INTO `reset_password_request` (`id`, `user_id`, `selector`, `hashed_token`, `requested_at`, `expires_at`) VALUES
(3, 9, 'pcI5tSEUJ0KizHNcCEGM', 'foQgbgRbqZLGKeO3j2tEuyCIvvKh7a9ke0JNPoFDrBU=', '2022-04-25 22:48:10', '2022-04-25 23:48:10'),
(4, 1, 'LJQ5KWvfDUanzQxQPhcP', 'EmnPfnMfxnutLEgN5UHMzf6+di7+lJqguzI/L0w0E/A=', '2022-04-25 23:00:28', '2022-04-26 00:00:28'),
(5, 9, 'fqEIHldM7ry4dUsDia1E', 'MFIffyXCpFIHfOoiiyTWVyHCPDcjhX9ZSXom1Z8lbVE=', '2022-04-26 02:33:45', '2022-04-26 03:33:45');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `naissance` date NOT NULL,
  `is_banned` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `is_verified`, `username`, `fullname`, `naissance`, `is_banned`) VALUES
(1, 'louey.boujmil@esprit.tn', 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}', '$argon2id$v=19$m=65536,t=4,p=1$d0gzeTBWN21xMGxyWGdxQw$gnOmCm3QIVdMb2X5VxJKjhBO0RgSyD6Ks4WRjX7jxaM', 1, 'Louey', 'louey bouj', '2000-06-26', 0),
(2, 'aaa@aaa.com', 'a:0:{}', '$argon2id$v=19$m=65536,t=4,p=1$dUlJWUlDVVlFb29mTkx3cw$weupSLpGeqMjw9SuhLhNlR2KIzj4+MBij+u8Pr/nwZQ', 0, 'aaaaaa', 'aaaaaaaa aaaaa', '1950-01-01', 0),
(3, 'aaa@aaaa.com', 'a:0:{}', '$argon2id$v=19$m=65536,t=4,p=1$NmppanMzRTlWL3VMV2pZLg$euAKL2PFeoWFpplsgni/8VSeSN/6JSw+oZA2HqDbMvA', 0, 'aaaaaa', 'aaaaaaaa aaaaa', '1950-01-01', 0),
(4, 'aaa@aaaaa.com', 'a:0:{}', '$argon2id$v=19$m=65536,t=4,p=1$WWZNUHFBY0lSdGFBLy5aNg$s+7Rf57xkoaFaOMJyrc4fuuT87njvwdqjoYi+xdmseM', 0, 'aaaaaa', 'aaaaaaaa aaaaa', '1950-01-01', 0),
(5, 'aaaaa@aaaaa.com', 'a:0:{}', '$argon2id$v=19$m=65536,t=4,p=1$Zk85Smt6NFB0d09mYnJFZQ$ETkJ0/N7DnsI44/HEiZQBCQGP4KAYkDI7guf5hYSong', 0, 'aaaaaa', 'aaaaaaaa aaaaa', '1950-01-01', 0),
(6, 'aaa@aa.com', 'a:0:{}', '$argon2id$v=19$m=65536,t=4,p=1$QXFpMTNzQmlMSEtmMlBzcw$KIy71M305mv9+A4OGyzp8qLpugu3/D17Q4462Ro7Wbg', 0, 'a123', 'aaaaa aa', '1950-01-01', 0),
(7, 'aaaa@aazaa.com', 'a:0:{}', '$argon2id$v=19$m=65536,t=4,p=1$S2RyejhHazBpWUVQU2dJWA$+PnU53mjj28FKFWspb/d5AwTTWG9bSZThj+6Nj6a1NM', 0, 'a123', 'aaaaa aa', '1950-01-01', 0),
(9, 'xkarismo.99@gmail.com', 'a:0:{}', '$argon2id$v=19$m=65536,t=4,p=1$dUNULkdtRm5rRm9yeHdSNg$dHFapdULpjycr2weB29UspujcpwbQLOC+JLwzM+6wIQ', 1, 'test', 'aaaaa aaaaa', '1950-01-01', 1),
(10, 'rayenbrahim34@gmail.com', 'a:0:{}', '$argon2id$v=19$m=65536,t=4,p=1$ZXhhOE0vZkh6bXBMZldFcQ$G5Tly/XkfRhDrhpI5ANYAzZR6XQefsBvFmzAzvJ2nNg', 0, 'rayen', 'rayen brahim', '2007-07-12', 0),
(11, 'direction@sac-consulting.com', 'a:0:{}', '$argon2id$v=19$m=65536,t=4,p=1$eWt2cDZ1dzN6MzE0SDNZUA$VTTRilPORKYcmzVJBmvDD09Ik45QWgVr8fJ6NLnOSsc', 0, 'hassen', 'hassen brahim', '1963-07-16', 0),
(12, 'assil.maalel@esprit.tn', 'a:0:{}', '$argon2id$v=19$m=65536,t=4,p=1$OWdpOUhVL3VHR2JEODFXUw$habc9mmYHGdSv/NHHdbuR9ySOg+GlpN8zbB/F0zX+io', 0, 'assil', 'Assil Maalel', '1950-01-01', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6EA9A146A76ED395` (`user_id`);

--
-- Indexes for table `calender`
--
ALTER TABLE `calender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6EEAA67DA76ED395` (`user_id`);

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `events_reservation`
--
ALTER TABLE `events_reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D8A20356A76ED395` (`user_id`);

--
-- Indexes for table `events_reservation_calendar`
--
ALTER TABLE `events_reservation_calendar`
  ADD PRIMARY KEY (`events_reservation_id`,`calendar_id`),
  ADD KEY `IDX_E1F7873C1D8506ED` (`events_reservation_id`),
  ADD KEY `IDX_E1F7873CA40A2C8` (`calendar_id`);

--
-- Indexes for table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_3170B74B82EA2E54` (`commande_id`),
  ADD KEY `IDX_3170B74BF347EFB` (`produit_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D34A04ADBCF5E72D` (`categorie_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7CE748AA76ED395` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `calender`
--
ALTER TABLE `calender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `events_reservation`
--
ALTER TABLE `events_reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `calendar`
--
ALTER TABLE `calendar`
  ADD CONSTRAINT `FK_6EA9A146A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_6EEAA67DA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `events_reservation`
--
ALTER TABLE `events_reservation`
  ADD CONSTRAINT `FK_D8A20356A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `events_reservation_calendar`
--
ALTER TABLE `events_reservation_calendar`
  ADD CONSTRAINT `FK_E1F7873C1D8506ED` FOREIGN KEY (`events_reservation_id`) REFERENCES `events_reservation` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_E1F7873CA40A2C8` FOREIGN KEY (`calendar_id`) REFERENCES `calendar` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD CONSTRAINT `FK_3170B74B82EA2E54` FOREIGN KEY (`commande_id`) REFERENCES `commande` (`id`),
  ADD CONSTRAINT `FK_3170B74BF347EFB` FOREIGN KEY (`produit_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04ADBCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`);

--
-- Constraints for table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD CONSTRAINT `FK_7CE748AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
