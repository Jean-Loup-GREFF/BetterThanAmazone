-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 22 nov. 2019 à 16:11
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bamazone`
--

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` double DEFAULT NULL,
  `billing_adress_id` int(10) UNSIGNED DEFAULT NULL,
  `delivery_adress_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `IDX_user_billing_adress` (`billing_adress_id`),
  KEY `IDX_user_delivery_adress` (`delivery_adress_id`),
  KEY `IDX_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `type`, `status`, `amount`, `billing_adress_id`, `delivery_adress_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'CART', 'CART', 8030000, 1, 2, '2019-11-08 13:30:05', '2019-11-08 13:30:05'),
(2, 2, 'CART', 'CART', 16000000, 3, 4, '2019-11-08 13:30:05', '2019-11-08 13:30:05'),
(3, 3, 'CART', 'CART', 0, 5, 5, '2019-11-22 17:06:24', '2019-11-22 17:06:24');

-- --------------------------------------------------------

--
-- Structure de la table `order_addresses`
--

DROP TABLE IF EXISTS `order_addresses`;
CREATE TABLE IF NOT EXISTS `order_addresses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `human_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_one` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_two` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `order_addresses`
--

INSERT INTO `order_addresses` (`id`, `human_name`, `address_one`, `address_two`, `postal_code`, `city`, `country`, `created_at`, `updated_at`) VALUES
(1, 'Fred Eric', '2 impasse Duvet', '3ieme étage', '59000', 'Lille', 'FRANCE', '2019-11-08 13:30:05', '2019-11-08 13:30:05'),
(2, 'Fred Eric', '120 Boulevard Vaubant', 'B506', '59000', 'Lille', 'FRANCE', '2019-11-08 13:30:05', '2019-11-08 13:30:05'),
(3, 'Fred Eric', '2 impasse Duvet', '3ieme étage', '59000', 'Lille', 'FRANCE', '2019-11-08 13:30:05', '2019-11-08 13:30:05'),
(4, 'Fred Eric', '120 Boulevard Vaubant', 'B506', '59000', 'Lille', 'FRANCE', '2019-11-08 13:30:05', '2019-11-08 13:30:05');

-- --------------------------------------------------------

--
-- Structure de la table `order_products`
--

DROP TABLE IF EXISTS `order_products`;
CREATE TABLE IF NOT EXISTS `order_products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `quantity` int(3) UNSIGNED NOT NULL,
  `unit_price` double DEFAULT NULL,
  `rating` int(10) UNSIGNED DEFAULT NULL,
  `comment` longtext COLLATE utf8_unicode_ci,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `IDX_order_product` (`order_id`),
  KEY `IDX_product_order` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `quantity`, `unit_price`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 8000000, NULL, 'tres amical', '2019-11-08 13:30:05', '2019-11-08 13:30:05'),
(2, 1, 2, 2, 15000, NULL, 'tres dangereux', '2019-11-08 13:30:05', '2019-11-08 13:30:05'),
(3, 2, 1, 2, 8000000, NULL, NULL, '2019-11-08 13:30:05', '2019-11-08 13:30:05');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `supplier` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'Bamazone',
  `unit_price` double DEFAULT NULL,
  `range_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `IDX_product_range` (`range_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `description`, `supplier`, `unit_price`, `range_id`, `created_at`, `updated_at`) VALUES
(1, 'Dragon', 'dragon.jpg', 'permis de possession dragon', 'Bamazone', 80000, 2, '2019-11-08 13:30:05', '2019-11-08 13:30:05'),
(2, 'Licorne volante', 'licorne.jpg', 'fonction couteau suisse de poche', 'Bamazone', 4500, 3, '2019-11-08 13:30:05', '2019-11-08 13:30:05'),
(3, 'Griffon', 'griffon.jpg', 'Vole, marche et nage', 'Bamazone', 65000, 2, '2019-11-22 15:17:17', '2019-11-22 15:17:17'),
(4, 'Leviathan', 'leviathan.jpg', 'Monstre biblique marin. Necessite d\'avoir un grand enclos.', 'Bamazone', 100000, 2, '2019-11-22 15:18:56', '2019-11-22 15:18:56'),
(5, 'Tanuki', 'tanuki.jpg', 'Origine: Japon. Prend de multiples formes.Reputes pour la taille de leurs testicules.', 'Bamazone', 1000, 3, '2019-11-22 15:22:10', '2019-11-22 15:22:10'),
(6, 'Nain', 'nain.jpg', 'Petit, se range partout.', 'Bamazone', 110, 9, '2019-11-22 15:23:54', '2019-11-22 15:23:54'),
(7, 'Lutin', 'lutin.jpg', 'Ideal pour les fetes de Nowel', 'Bamazone', 300, 9, '2019-11-22 15:28:34', '2019-11-22 15:28:34'),
(8, 'Homme poisson', 'hommepoisson.jpg', 'Un vrai barman.', 'Bamazone', 999, 3, '2019-11-22 15:30:42', '2019-11-22 15:30:42'),
(9, 'Elfe de Maison', 'elfedemaison.jpg', 'Pour toutes les taches de menages et pour faire vos courses. A nourrir avec les restes de votre repas.', 'Bamazone', 453, 9, '2019-11-22 15:33:07', '2019-11-22 15:33:07'),
(10, 'Ornithorynque', 'ornithorynque.jpg', 'L\'Ornithorynque (Ornithorhynchus anatinus) est un animal semi-aquatique endemique de l\'est de l\'Australie, y compris la Tasmanie. C\'est l\'une des cinq especes de l\'ordre des monotremes, seul ordre de mammiferes qui pond des oeufs au lieu de donner naissance a des petits completement formes (les quatre autres especes sont des echidnes). C\'est la seule espece actuelle de la famille des Ornithorhynchidae et du genre Ornithorhynchus bien qu\'un grand nombre de fragments d\'especes fossiles de cette famille et de ce genre aient ete decouverts', 'Bamazone', 135, 9, '2019-11-22 15:35:57', '2019-11-22 15:35:57'),
(11, 'Masamune', 'masamune.jpg', 'Origine: Japon', 'Bamazone', 229, 5, '2019-11-22 15:40:31', '2019-11-22 15:40:31'),
(12, 'Flute de hantise', 'flutedehantise.jpg', 'Hante vos adversaires de tristesse et de desespoire.', 'Bamazone', 20, 5, '2019-11-22 15:43:08', '2019-11-22 15:43:08'),
(13, 'Epee Durandil', 'epeedurantil.jpg', 'Les epees Durandil sont forgees dans les mines par les Nains\r\nAvec ça c\'est facile de tuer un troll avec une seule main\r\nPas besoin d\'super entrainement ni de niveau 28\r\nQuand tu sors l\'instrument c\'est l\'ennemi qui prend la fuite !', 'Bamazone', 178, 5, '2019-11-22 15:46:08', '2019-11-22 15:46:08'),
(14, 'Dague du roi demon', 'dague.jpg', 'Made in RPC', 'Bamazone', 90, 5, '2019-11-22 15:48:02', '2019-11-22 15:48:02'),
(15, 'Papier toilette ensorcelle', 'papiertoilette.jpg', 'Essuyage automatique', 'Bamazone', 30, 8, '2019-11-22 15:52:15', '2019-11-22 15:52:15'),
(16, 'Larme d\'yggdrasil', 'larmedyggdrasil.jpg', 'Les larmes sont constituees de liquide lacrymal qui deborde de l\'oeil. Elles sont salees, secretees par les glandes lacrymales au niveau des yeux.\r\n\r\nElles se presentent sous forme de gouttes qui coulent le long des joues : le verbe qui designe la production de larmes est pleurer (ou parfois larmoyer).\r\n\r\nUne production (reflexe) accrue de larmes est activee par certains stimuli, par exemple si le systeme nerveux detecte un danger au niveau de la cornee tel qu\'un contact avec un objet ou un acide (ex : le 1-sulfinylpropane qui attaque l\'oeil quand on epluche un oignon ; dans ce cas larmoyer permet de diluer la molecule et de la chasser de la paroi oculaire).\r\n\r\nLes larmes trahissent le plus souvent un etat de desespoir, de tristesse ou de douleur, mais peuvent aussi apparaitre en d\'autres circonstances emotionnelles : joie, rire, rage… Pleurer est normalement un acte reflexe, mais certains comediens peuvent produire des larmes en evoquant interieurement des circonstances provoquant la tristesse.', 'Bamazone', 125, 6, '2019-11-22 15:55:53', '2019-11-22 15:55:53'),
(17, 'Elixir', 'elixir.jpg', 'Le terme pharmaceutique d\'elixir est tombe en desuetude. Il pouvait designer, dans son acception la plus generale, toute liqueur medicamenteuse, dans une acception plus specifique une preparation a base de sirop de sucre dissous dans l\'alcool ou chez les romantiques une drogue censee posseder des vertus magiques comme l\'elixir de longue vie ou d\'amour.', 'Bamazone', 45, 6, '2019-11-22 15:58:13', '2019-11-22 15:58:13'),
(18, 'Venin de Jackalope', 'venindujackalope.jpg', 'Le jackalope est un animal imaginaire du folklore americain, melange entre un lievre (jackrabbit) et une antilope (antelope). Il est habituellement represente comme un lievre avec des bois. On l\'appelle aussi parfois « lapin cornu » (horny bunny), ce qui rejoint le nom scientifique Lepus cornutus que donnaient les naturalistes a ce qu\'ils pensaient etre jusqu\'au xviiie siecle une espece reelle.', 'Bamazone', 124, 6, '2019-11-22 16:01:20', '2019-11-22 16:01:20'),
(19, 'Sang purifie de Vampire', 'sangpurifie.jpg', 'Sang purifie de Vampire issu de la collecte du don du sang. Appellation d\'origine protegee.\r\nGroupe A\r\nRhesus +', 'Bamazone', 20, 6, '2019-11-22 16:06:50', '2019-11-22 16:06:50'),
(20, 'Baguette de Campagne', 'baguettedecampagne.jpg', 'Baguette indispensable pour les campagnes militaires.', 'Bamazone', 234, 7, '2019-11-22 16:08:24', '2019-11-22 16:08:24'),
(21, 'Baguette tradition', 'baguettetradition.jpg', 'Baguette traditionnelle de sorcier. Conforme au programme d\'education du ministere de la magie.', 'Bamazone', 99, 7, '2019-11-22 16:10:05', '2019-11-22 16:10:05'),
(22, 'Collier de l\'oubli', 'collierdeloubli.jpg', 'A mettre a vos animaux de compagnie fantastique pour eviter d\'oublier de les nourrir.', 'Bamazone', 34, 8, '2019-11-22 16:15:23', '2019-11-22 16:15:23'),
(23, 'Sac sans fond', 'sacsansfond.jpg', 'Pour faire votre shopping dans les magasins physique de la marque Bamazone. Vous pourrez y mettre vos creatures.', 'Bamazone', 28, 8, '2019-11-22 16:18:28', '2019-11-22 16:18:28'),
(24, 'Pierre magique', 'pierremagique.jpg', 'Pierres issues de carriere geree dans le respect de l\'environnement et des milieux magiques.', 'Bamazone', 67, 8, '2019-11-22 16:20:22', '2019-11-22 16:20:22'),
(25, 'Boussole', 'bousole.jpg', 'Indique la direction (et le prix) de notre produit que vous desirez le plus.', 'Bamazone', 167, 8, '2019-11-22 16:21:54', '2019-11-22 16:21:54'),
(26, 'Magie Noire pour les nuls', 'parchemin.jpg', 'Tout ce que vous devez savoir sur la magie noire se trouve dans ce livre.\r\nEdition Achette', 'Bamazone', 208, 8, '2019-11-22 16:24:25', '2019-11-22 16:24:25');

-- --------------------------------------------------------

--
-- Structure de la table `ranges`
--

DROP TABLE IF EXISTS `ranges`;
CREATE TABLE IF NOT EXISTS `ranges` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `IDX_range_parent` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `ranges`
--

INSERT INTO `ranges` (`id`, `name`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Creatures', NULL, '2019-11-08 13:30:05', '2019-11-08 13:30:05'),
(2, 'Creatures Monstres', 1, '2019-11-08 13:30:05', '2019-11-08 13:30:05'),
(3, 'Creatures Magiques', 1, '2019-11-08 13:30:05', '2019-11-08 13:30:05'),
(4, 'Objets magiques', NULL, '2019-11-22 14:15:07', '2019-11-22 14:15:07'),
(5, 'Armes', 4, '2019-11-22 14:17:30', '2019-11-22 14:17:30'),
(6, 'Potions', 4, '2019-11-22 14:18:09', '2019-11-22 14:18:09'),
(7, 'Baguettes', 4, '2019-11-22 14:19:36', '2019-11-22 14:19:36'),
(8, 'Autres objets magiques', 4, '2019-11-22 14:20:54', '2019-11-22 14:20:54'),
(9, 'Petits trucs', 1, '2019-11-22 14:22:08', '2019-11-22 14:22:08');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_adress_id` int(10) UNSIGNED DEFAULT NULL,
  `delivery_adress_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `IDX_user_billing_adress` (`billing_adress_id`),
  KEY `IDX_user_delivery_adress` (`delivery_adress_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `color`, `email`, `password`, `billing_adress_id`, `delivery_adress_id`, `created_at`, `updated_at`) VALUES
(1, '', '', 'Fred Eric', 0, 'fred.eric@example.com', 'password', 1, 2, '2019-11-08 13:30:05', '2019-11-08 13:30:05'),
(2, '', '', 'Frederic', 0, 'frederic@example.com', 'password', 3, 4, '2019-11-08 13:30:05', '2019-11-08 13:30:05'),
(3, 'Gabriel', 'Desmullier', 'Gabriel', 0, 'gabriel.desmullier@gmail.com', 'gabriel', 5, 5, '2019-11-22 13:30:14', '2019-11-22 13:30:14');

-- --------------------------------------------------------

--
-- Structure de la table `user_addresses`
--

DROP TABLE IF EXISTS `user_addresses`;
CREATE TABLE IF NOT EXISTS `user_addresses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `human_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_one` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_two` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user_addresses`
--

INSERT INTO `user_addresses` (`id`, `human_name`, `address_one`, `address_two`, `postal_code`, `city`, `country`, `created_at`, `updated_at`) VALUES
(1, 'Fred Eric', '2 impasse Duvet', '3ieme étage', '59000', 'Lille', 'FRANCE', '2019-11-08 13:30:05', '2019-11-08 13:30:05'),
(2, 'Eric Fred', '12 route Pleine', 'chez mon oncle', '59000', 'Lille', 'FRANCE', '2019-11-08 13:30:05', '2019-11-08 13:30:05'),
(3, 'Frederic', '239 rue de Douai', NULL, '59000', 'Lille', 'FRANCE', '2019-11-08 13:30:05', '2019-11-08 13:30:05'),
(4, 'Epicfred', '3 sans idée', 'oui oui', '59000', 'Lille', 'FRANCE', '2019-11-08 13:30:05', '2019-11-08 13:30:05'),
(5, 'Gabriel', '21 allÃ©e des chÃ¢taigniers', '', '59229', 'TÃ©teghem', 'FRANCE', '2019-11-22 13:30:14', '2019-11-22 13:30:14');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
