-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 02 Juin 2016 à 17:21
-- Version du serveur :  10.1.8-MariaDB
-- Version de PHP :  5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `afdg_sql1`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `cat_id` int(10) UNSIGNED NOT NULL,
  `cat_name` varchar(100) DEFAULT NULL,
  `cat_date_creation` datetime DEFAULT NULL,
  `cat_date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_date_creation`, `cat_date_update`) VALUES
(1, 'Science-Fiction', '2016-06-02 11:49:22', NULL),
(2, 'Comedie', '2016-06-02 11:49:22', NULL),
(3, 'Aventure', '2016-06-02 11:49:22', NULL),
(4, 'Thriller', '2016-06-02 11:49:22', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `movie`
--

CREATE TABLE `movie` (
  `mov_id` int(10) UNSIGNED NOT NULL,
  `Nationalite_nat_id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL,
  `sto_id` int(10) UNSIGNED NOT NULL,
  `mov_title` varchar(128) DEFAULT NULL,
  `mov_cast` text,
  `mov_synopsis` text,
  `mov_path` varchar(255) DEFAULT NULL,
  `mov_original_title` varchar(128) DEFAULT NULL,
  `mov_image` varchar(255) DEFAULT NULL,
  `mov_date_creation` datetime DEFAULT NULL,
  `mov_date_update` datetime DEFAULT NULL,
  `nat_id` int(10) UNSIGNED DEFAULT NULL,
  `mov_year` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `movie`
--

INSERT INTO `movie` (`mov_id`, `Nationalite_nat_id`, `cat_id`, `sto_id`, `mov_title`, `mov_cast`, `mov_synopsis`, `mov_path`, `mov_original_title`, `mov_image`, `mov_date_creation`, `mov_date_update`, `nat_id`, `mov_year`) VALUES
(1, 0, 3, 0, 'Indiana Jones and the Last crusade', 'Harrisson Ford', 'The story opens in Monument Valley, Utah, in 1912. A troop of Boy Scouts are exploring the area. One of the Scouts, Indiana Jones, finds a cave where where a party led by a mercenary wearing a fedora and leather jacket finds the cross of Coronado, a priceless Spanish American artifact. Indy, believing it belongs in a museum, takes it and is pursued, attempting to escape by horseback. He is followed by the mercenaries in autos, but boards a circus train to elude them. While on the train, he crawls through a car full of snakes (thereby providing the backstory for his reptilophobia) and then finds himself in a car with a lion, from whom he escapes by using a bullwhip he finds hanging on the wall, in which his first attempt backlashes and gives him a cut on his chin (explaining the origin of his scar, a real scar borne by actor Harrison Ford). After a few more dangerous encounters, including a near castration by the horn of a rhinoceros annoyed by the tussle on his roof, Indy escapes the train through a magician''s magic box and takes the cross home, where his father is busy working on drawing that looks like a stained glass window. When Indy excitedly tries to tell his father about it, his father rebuffs him, telling him to calm down by counting to 10 in Greek.', NULL, 'Indiana Jones and the last crusade', 'http://ia.media-imdb.com/images/M/MV5BMTQxMTUyODg2OF5BMl5BanBnXkFtZTcwNDM2MjAxNA@@._V1_SX300.jpg%22,', '2016-06-02 00:00:00', '2016-06-02 00:00:00', 0, '1989'),
(4, 0, 1, 0, 'The Dark World', 'Chris Hemworth', 'When Dr. Jane Foster gets cursed with a powerful entity known as the Aether, Thor is heralded of the cosmic event known as the Convergence and the genocidal Dark Elves. \r\n\r\n', NULL, 'The Dark World', 'http://ia.media-imdb.com/images/M/MV5BMTQyNzAwOTUxOF5BMl5BanBnXkFtZTcwMTE0OTc5OQ@@._V1_SY1000_SX700_AL_.jpg', '2016-06-02 00:00:00', '2016-06-02 00:00:00', 1, '2013'),
(5, 0, 2, 0, 'the vow', 'Chaning tatum', 'A car accident puts Paige in a coma, and when she wakes up with severe memory loss, her husband Leo works to win her heart again.\r\n\r\n', NULL, 'the vow', 'http://ia.media-imdb.com/images/M/MV5BMjE1OTU5MjU0N15BMl5BanBnXkFtZTcwMzI3OTU5Ng@@._V1_UX182_CR0,0,182,268_AL_.jpg', '2016-06-02 00:00:00', '2016-06-02 00:00:00', 1, '2012'),
(7, 0, 4, 0, 'twelve monkeys', 'Bruce Willis', 'Nous sommes en l''an 2035. Les quelques milliers d''habitants qui restent sur notre planète sont contraints de vivre sous terre. La surface du globe est devenue inhabitable à la suite d''un virus ayant décimé 99% de la population. Les survivants mettent tous leurs espoirs dans un voyage à travers le temps pour découvrir les causes de la catastrophe et la prévenir. C''est James Cole, hanté depuis des années par une image incompréhensible, qui est désigné pour cette mission.', NULL, 'twelve monkeys', 'http://ia.media-imdb.com/images/M/MV5BMTkwOTcxNzMzOV5BMl5BanBnXkFtZTgwODYxNjg0ODE@._V1_.jpg', '2016-06-02 00:00:00', '2016-06-02 00:00:00', NULL, '2015');

-- --------------------------------------------------------

--
-- Structure de la table `nationalite`
--

CREATE TABLE `nationalite` (
  `nat_id` int(10) UNSIGNED NOT NULL,
  `mov_nat` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `nationalite`
--

INSERT INTO `nationalite` (`nat_id`, `mov_nat`) VALUES
(2, 'BE'),
(3, 'DE'),
(1, 'FR'),
(4, 'PT'),
(5, 'UK');

-- --------------------------------------------------------

--
-- Structure de la table `storage`
--

CREATE TABLE `storage` (
  `sto_id` int(10) UNSIGNED NOT NULL,
  `sto_name` varchar(32) DEFAULT NULL,
  `sto_date_creation` datetime DEFAULT NULL,
  `sto_date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `storage`
--

INSERT INTO `storage` (`sto_id`, `sto_name`, `sto_date_creation`, `sto_date_update`) VALUES
(1, 'PC', '2016-06-02 12:05:24', NULL),
(2, 'Mac', '2016-06-02 12:05:24', NULL),
(3, 'Reseau', '2016-06-02 12:05:24', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_name` (`cat_name`);

--
-- Index pour la table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`mov_id`),
  ADD KEY `movie_FKIndex1` (`sto_id`),
  ADD KEY `movie_FKIndex2` (`cat_id`),
  ADD KEY `movie_FKIndex3` (`Nationalite_nat_id`);

--
-- Index pour la table `nationalite`
--
ALTER TABLE `nationalite`
  ADD PRIMARY KEY (`nat_id`),
  ADD UNIQUE KEY `mov_nat` (`mov_nat`);

--
-- Index pour la table `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`sto_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `movie`
--
ALTER TABLE `movie`
  MODIFY `mov_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `nationalite`
--
ALTER TABLE `nationalite`
  MODIFY `nat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `storage`
--
ALTER TABLE `storage`
  MODIFY `sto_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
