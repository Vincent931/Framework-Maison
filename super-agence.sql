-- phpMyAdmin SQL Dump
-- version 5.2.1deb1ubuntu0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 23 avr. 2024 à 14:11
-- Version du serveur : 8.0.35-0ubuntu0.23.04.1
-- Version de PHP : 8.1.12-1ubuntu4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `super-agence`
--

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `id` int NOT NULL,
  `id_product` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`id`, `id_product`, `user_id`) VALUES
(101, 54, 40);

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `name`, `description`) VALUES
(2, 'appart.jpg', 'appartement'),
(3, 'background.jpg', 'image de background'),
(6, 'bande-floue.png', 'bande flouttée'),
(7, 'error.gif', 'gif error'),
(8, 'error.jpg', 'img error'),
(9, 'id1.png', 'image id1'),
(10, 'id2.png', 'image vincent'),
(11, 'id3.png', 'image id3'),
(12, 'journal.png', 'image journal'),
(13, 'logo.png', 'image logo'),
(14, 'maison.jpg', 'image maison 1'),
(15, 'maison2.jpg', 'image maison 2'),
(16, 'opengraph-img.jpg', 'image réseaux sociaux'),
(17, 'quotes.png', 'image quote'),
(18, 'slider-01.jpg', 'slide 1'),
(19, 'slider-02.jpg', 'slide2'),
(20, 'slider-03.jpg', 'slide 3'),
(21, 'slider-04.jpg', 'slide 4'),
(22, 'success.gif', 'gif success'),
(23, 'success.png', 'image succes'),
(24, 'tour.jpg', 'image tour');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int NOT NULL,
  `ref` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL,
  `pieces` varchar(10) NOT NULL,
  `garage` varchar(5) NOT NULL,
  `SdB` varchar(10) NOT NULL,
  `prix` int NOT NULL,
  `charges` int NOT NULL,
  `notaire` int NOT NULL,
  `explic` text NOT NULL,
  `img_p` varchar(255) NOT NULL,
  `img_1` varchar(255) NOT NULL,
  `img_2` varchar(255) NOT NULL,
  `img_3` varchar(255) NOT NULL,
  `img_4` varchar(255) NOT NULL,
  `adress1` varchar(255) NOT NULL,
  `adress2` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `ZIP` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `ref`, `type`, `pieces`, `garage`, `SdB`, `prix`, `charges`, `notaire`, `explic`, `img_p`, `img_1`, `img_2`, `img_3`, `img_4`, `adress1`, `adress2`, `ville`, `ZIP`, `date`) VALUES
(1, '#1', 'location', 'T1', 'oui', '1', 120000, 10000, 12000, 'texte', 'maison.jpg', 'maison2.jpg', 'slider-01.jpg', 'slider-02.jpg', 'appart.jpg', 'adresse1', 'adresse2', 'Angers', '49000', '2022-02-13'),
(2, '#2', 'location', 'T4', 'non', '2', 625, 128, 0, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'maison2.jpg', 'slider-01.jpg', 'slider-02.jpg', 'tour.jpg', 'appart.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(3, '#3', 'location', 'T2', 'non', '1', 690, 128, 0, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'slider-01.jpg', 'slider-02.jpg', 'tour.jpg', 'appart.jpg', 'maison.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(4, '#4', 'achat', 'T3', 'non', '1', 125000, 0, 12000, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'slider-02.jpg', 'tour.jpg', 'appart.jpg', 'maison.jpg', 'maison2.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(5, '#5', 'location', 'T4', 'non', '1', 707, 128, 0, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'tour.jpg', 'appart.jpg', 'maison.jpg', 'maison2.jpg', 'slider-01.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(6, '#6', 'achat', 'T5', 'non', '1', 125000, 0, 12000, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'appart.jpg', 'maison.jpg', 'maison2.jpg', 'slider-01.jpg', 'slider-02.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(7, '#7', 'location', 'T55', 'non', '1', 724, 128, 0, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'maison.jpg', 'maison2.jpg', 'slider-01.jpg', 'slider-02.jpg', 'tour.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(8, '#8', 'achat', 'T1', 'non', '1', 125000, 0, 12000, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'maison2.jpg', 'slider-01.jpg', 'slider-02.jpg', 'tour.jpg', 'appart.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(9, '#9', 'location', 'T1 bis', 'non', '1', 741, 128, 0, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'slider-01.jpg', 'slider-02.jpg', 'tour.jpg', 'appart.jpg', 'maison.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(10, '#10', 'achat', 'T2', 'non', '1', 125000, 0, 12000, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'slider-02.jpg', 'tour.jpg', 'appart.jpg', 'maison.jpg', 'maison2.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(11, '#11', 'location', 'T3', 'non', '1', 758, 128, 0, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'tour.jpg', 'appart.jpg', 'maison.jpg', 'maison2.jpg', 'slider-01.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(12, '#12', 'achat', 'T4', 'non', '1', 125000, 0, 12000, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'appart.jpg', 'maison.jpg', 'maison2.jpg', 'slider-01.jpg', 'slider-02.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(13, '#13', 'location', 'T5', 'non', '1', 775, 128, 0, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'maison.jpg', 'maison2.jpg', 'slider-01.jpg', 'slider-02.jpg', 'tour.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(14, '#14', 'achat', 'T55', 'non', '1', 125000, 0, 12000, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'maison2.jpg', 'slider-01.jpg', 'slider-02.jpg', 'tour.jpg', 'appart.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(15, '#15', 'location', 'T1', 'non', '1', 792, 128, 0, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'slider-01.jpg', 'slider-02.jpg', 'tour.jpg', 'appart.jpg', 'maison.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(16, '#16', 'achat', 'T1 bis', 'non', '1', 125000, 0, 12000, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'slider-02.jpg', 'tour.jpg', 'appart.jpg', 'maison.jpg', 'maison2.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(17, '#17', 'location', 'T2', 'non', '1', 809, 128, 0, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'tour.jpg', 'appart.jpg', 'maison.jpg', 'maison2.jpg', 'slider-01.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(18, '#18', 'achat', 'T3', 'non', '1', 125000, 0, 12000, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'appart.jpg', 'maison.jpg', 'maison2.jpg', 'slider-01.jpg', 'slider-02.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(19, '#19', 'location', 'T4', 'non', '1', 826, 128, 0, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'maison.jpg', 'maison2.jpg', 'slider-01.jpg', 'slider-02.jpg', 'tour.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(20, '#20', 'achat', 'T5', 'non', '1', 125000, 0, 12000, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'maison2.jpg', 'slider-01.jpg', 'slider-02.jpg', 'tour.jpg', 'appart.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(21, '#21', 'location', 'T55', 'non', '1', 843, 128, 0, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'slider-01.jpg', 'slider-02.jpg', 'tour.jpg', 'appart.jpg', 'maison.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(22, '#22', 'achat', 'T1', 'non', '1', 125000, 0, 12000, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'slider-02.jpg', 'tour.jpg', 'appart.jpg', 'maison.jpg', 'maison2.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(23, '#23', 'location', 'T1 bis', 'non', '1', 860, 128, 0, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'tour.jpg', 'appart.jpg', 'maison.jpg', 'maison2.jpg', 'slider-01.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(24, '#24', 'achat', 'T2', 'non', '1', 125000, 0, 12000, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'appart.jpg', 'maison.jpg', 'maison2.jpg', 'slider-01.jpg', 'slider-02.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(25, '#25', 'location', 'T3', 'non', '1', 877, 128, 0, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'maison.jpg', 'maison2.jpg', 'slider-01.jpg', 'slider-02.jpg', 'tour.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(26, '#26', 'achat', 'T4', 'non', '1', 125000, 0, 12000, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'maison2.jpg', 'slider-01.jpg', 'slider-02.jpg', 'tour.jpg', 'appart.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(27, '#27', 'location', 'T5', 'non', '1', 894, 128, 0, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'slider-01.jpg', 'slider-02.jpg', 'tour.jpg', 'appart.jpg', 'maison.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(28, '#28', 'achat', 'T55', 'non', '1', 125000, 0, 12000, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'slider-02.jpg', 'tour.jpg', 'appart.jpg', 'maison.jpg', 'maison2.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(29, '#29', 'location', 'T1', 'non', '1', 911, 128, 0, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'tour.jpg', 'appart.jpg', 'maison.jpg', 'maison2.jpg', 'slider-01.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(30, '#30', 'achat', 'T1 bis', 'non', '1', 125000, 0, 12000, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'appart.jpg', 'maison.jpg', 'maison2.jpg', 'slider-01.jpg', 'slider-02.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(31, '#31', 'location', 'T2', 'non', '1', 928, 128, 0, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'maison.jpg', 'maison2.jpg', 'slider-01.jpg', 'slider-02.jpg', 'tour.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(32, '#32', 'achat', 'T3', 'non', '1', 125000, 0, 12000, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'maison2.jpg', 'slider-01.jpg', 'slider-02.jpg', 'tour.jpg', 'appart.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(33, '#33', 'location', 'T4', 'non', '1', 945, 128, 0, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'slider-01.jpg', 'slider-02.jpg', 'tour.jpg', 'appart.jpg', 'maison.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(34, '#34', 'achat', 'T5', 'non', '1', 125000, 0, 12000, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'slider-02.jpg', 'tour.jpg', 'appart.jpg', 'maison.jpg', 'maison2.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(35, '#35', 'location', 'T55', 'non', '1', 962, 128, 0, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'tour.jpg', 'appart.jpg', 'maison.jpg', 'maison2.jpg', 'slider-01.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(36, '#36', 'achat', 'T1', 'non', '1', 125000, 0, 12000, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'appart.jpg', 'maison.jpg', 'maison2.jpg', 'slider-01.jpg', 'slider-02.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(37, '#37', 'location', 'T1 bis', 'non', '1', 979, 128, 0, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'maison.jpg', 'maison2.jpg', 'slider-01.jpg', 'slider-02.jpg', 'tour.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(38, '#38', 'achat', 'T2', 'non', '1', 125000, 0, 12000, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'maison2.jpg', 'slider-01.jpg', 'slider-02.jpg', 'tour.jpg', 'appart.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(39, '#39', 'location', 'T3', 'non', '1', 996, 128, 0, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'slider-01.jpg', 'slider-02.jpg', 'tour.jpg', 'appart.jpg', 'maison.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(40, '#40', 'achat', 'T4', 'non', '1', 125000, 0, 12000, 'Location disponible le 2/06/2022<br>Vue imprenable sur le château d\'Angers<br>A voir absolument<br>Visite le Jeudi à 17h00', 'slider-02.jpg', 'tour.jpg', 'appart.jpg', 'maison.jpg', 'maison2.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(41, '#41', 'location', 'T5', 'non', '1', 1013, 128, 0, 'Location disponible le 2/06/2022&lt;br&gt;Vue imprenable sur le château d\'Angers&lt;br&gt;A voir absolument&lt;br&gt;Visite le Jeudi à 17h00', 'tour.jpg', 'appart.jpg', 'maison.jpg', 'maison2.jpg', 'slider-01.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(42, '#42', 'achat', 'T55', 'non', '1', 125000, 0, 12000, 'Location disponible le 2/06/2022&lt;br&gt;Vue imprenable sur le château d\'Angers&lt;br&gt;A voir absolument&lt;br&gt;Visite le Jeudi à 17h00', 'appart.jpg', 'maison.jpg', 'maison2.jpg', 'slider-01.jpg', 'slider-02.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(43, '#43', 'location', 'T1', 'non', '1', 1030, 128, 0, 'Location disponible le 2/06/2022&lt;br&gt;Vue imprenable sur le château d\'Angers&lt;br&gt;A voir absolument&lt;br&gt;Visite le Jeudi à 17h00', 'maison.jpg', 'maison2.jpg', 'slider-01.jpg', 'slider-02.jpg', 'tour.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(44, '#44', 'achat', 'T1 bis', 'non', '1', 125000, 0, 12000, 'Location disponible le 2/06/2022&lt;br&gt;Vue imprenable sur le château d\'Angers&lt;br&gt;A voir absolument&lt;br&gt;Visite le Jeudi à 17h00', 'maison2.jpg', 'slider-01.jpg', 'slider-02.jpg', 'tour.jpg', 'appart.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(45, '#45', 'location', 'T2', 'non', '1', 1047, 128, 0, 'Location disponible le 2/06/2022&lt;br&gt;Vue imprenable sur le château d\'Angers&lt;br&gt;A voir absolument&lt;br&gt;Visite le Jeudi à 17h00', 'slider-01.jpg', 'slider-02.jpg', 'tour.jpg', 'appart.jpg', 'maison.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(46, '#46', 'achat', 'T3', 'non', '1', 125000, 0, 12000, 'Location disponible le 2/06/2022&lt;br&gt;Vue imprenable sur le château d\'Angers&lt;br&gt;A voir absolument&lt;br&gt;Visite le Jeudi à 17h00', 'slider-02.jpg', 'tour.jpg', 'appart.jpg', 'maison.jpg', 'maison2.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(47, '#47', 'location', 'T4', 'non', '1', 1064, 128, 0, 'Location disponible le 2/06/2022&lt;br&gt;Vue imprenable sur le château d\'Angers&lt;br&gt;A voir absolument&lt;br&gt;Visite le Jeudi à 17h00', 'tour.jpg', 'appart.jpg', 'maison.jpg', 'maison2.jpg', 'slider-01.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(48, '#48', 'achat', 'T5', 'non', '1', 125000, 0, 12000, 'Location disponible le 2/06/2022&lt;br&gt;Vue imprenable sur le château d\'Angers&lt;br&gt;A voir absolument&lt;br&gt;Visite le Jeudi à 17h00', 'appart.jpg', 'maison.jpg', 'maison2.jpg', 'slider-01.jpg', 'slider-02.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(49, '#49', 'location', 'T55', 'non', '1', 1081, 128, 0, 'Location disponible le 2/06/2022&lt;br&gt;Vue imprenable sur le château d\'Angers&lt;br&gt;A voir absolument&lt;br&gt;Visite le Jeudi à 17h00', 'maison.jpg', 'maison2.jpg', 'slider-01.jpg', 'slider-02.jpg', 'tour.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(50, '#50', 'achat', 'T1', 'non', '1', 125000, 0, 12000, 'Location disponible le 2/06/2022&lt;br&gt;Vue imprenable sur le château d\'Angers&lt;br&gt;A voir absolument&lt;br&gt;Visite le Jeudi à 17h00', 'maison2.jpg', 'slider-01.jpg', 'slider-02.jpg', 'tour.jpg', 'appart.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(51, '#51', 'location', 'T1 bis', 'non', '1', 1098, 128, 0, 'Location disponible le 2/06/2022&lt;br&gt;Vue imprenable sur le château d&#039;Angers&lt;br&gt;A voir absolument&lt;br&gt;Visite le Jeudi à 17h00', 'slider-01.jpg', 'slider-02.jpg', 'tour.jpg', 'appart.jpg', 'maison.jpg', '12 rue des ventes', 'lieu dit ViviJean', 'Angers', '49000', '2022-02-13'),
(54, '#52', 'achat', 'T4', 'oui', '2', 150000, 0, 15000, 'Texte', 'maison.jpg', 'maison2.jpg', 'slider-01.jpg', 'slider-02.jpg', 'appart.jpg', '49 rue des vignes', 'apt 451', 'Angers', '49000', '2022-02-13');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(39, 'Dupond', 'Vincent', 'dupond@gmail.com', '$2y$10$Ui1N3ZM/T.nVr0lUdbizAOEkKVeauaDTkRY0j0RAzjHMzKmCDzsR.', 'user', '2022-06-03 18:16:49', '2022-06-03 18:16:49'),
(40, 'Dupont', 'Vincent', 'dupont@gmail.com', '$2y$10$T518FHgerghRYm2OR/b6auvJi6AV850ib46GVf.gYcOAtVjmE9ezm', 'admin', '2023-02-14 11:36:34', '2023-02-14 11:36:34');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user` (`user_id`),
  ADD KEY `FK_product` (`id_product`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `FK_product` FOREIGN KEY (`id_product`) REFERENCES `produits` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
