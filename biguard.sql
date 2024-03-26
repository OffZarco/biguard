-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 26 mars 2024 à 04:22
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `biguard`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '(DC2Type:json)' CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `roles`, `password`) VALUES
(1, 'admin', '[\"ROLE_ADMIN\"]', '$2y$13$aoeUARsfI.CcfMmkqjs2hezwUpxYwqSFXpPdzL/RXAkkNufN3rywq');

-- --------------------------------------------------------

--
-- Structure de la table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '(DC2Type:json)' CHECK (json_valid(`content`)),
  `type_phone` varchar(255) NOT NULL,
  `onlyfan_account` varchar(255) NOT NULL,
  `hours_day` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contact_form`
--

INSERT INTO `contact_form` (`id`, `name`, `age`, `ville`, `content`, `type_phone`, `onlyfan_account`, `hours_day`, `email`, `instagram`) VALUES
(1, 'Alexandre', 18, 'Ales', '[\"lingerie_bikini\",\"top_less\",\"nude\"]', 'iphone 14', 'yes', '2', 'acousin.pro@gmail.com', '@alexandre_csin');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20231020135541', '2024-03-15 15:37:37', 56),
('DoctrineMigrations\\Version20231024010950', '2024-03-15 15:37:37', 5),
('DoctrineMigrations\\Version20231025010246', '2024-03-15 15:37:37', 9),
('DoctrineMigrations\\Version20231025015102', '2024-03-15 15:37:37', 7),
('DoctrineMigrations\\Version20240321203112', '2024-03-21 20:31:33', 40);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id`, `title`, `description`) VALUES
(1, 'Pourquoi avez vous besoin d\'une agence ?', 'Il est important de souligner que vous n\'avez pas besoin d\'agence pour vous lancer. Cependant, si vous aspirez à générer des revenus de manière exponentielle, Biguard est là pour vous accompagner et vous offrir la visibilité qui pourrait être difficile, voire impossible à atteindre sans expertise dans le domaine'),
(3, 'Combien cela va t-il me coûter ?', 'La rémunération de l\'agence se fait en fonction de vos résultats, plus vous faites de revenus, mieux nous sommes rémunérés. Cette méthode nous pousse à avoir de meilleurs résultats avec nos modèles.'),
(4, 'Je n\'ai aucune expérience dans le mannequinat', 'Aucun problème. La plupart de nos modèles ne sont pas des professionnels du mannequinat et pourtant nous savons comment optimiser vos photos pour qu\'elles augmentent le plus possible vos revenus.'),
(5, 'Qu\'est ce que je dois faire ?', 'Pour l\'instant, vous n\'avez qu\'à nous contacter via l\'onglet contact de notre site. Nous vous proposerons une solution personnalisée qui répondra à vos besoins. En fonction de ce que vous voulez faire, nous nous adapterons.'),
(6, 'Je n\'ai pas de compte MYM ou OnlyFans', 'Ne vous inquiétez pas, si vous avez une communauté mais pas encore de compte, nous nous chargeons de créer le compte pour vous et pour qu\'il soit optimisé au maximum. Si jamais vous n\'avez pas encore de communauté, notre équipe se chargera de la création des comptes de A à Z selon vos souhaits.'),
(7, 'Quelles conditions dois-je remplir ?', 'Pour rejoindre une agence mym et OnlyFans, les conditions ne sont pas nombreuses. Vous pouvez nous rejoindre si vous êtes majeur.\n\nEn ce qui nous concerne, notre condition principal, c\'est votre motivation ainsi que votre capacité à créer du contenu.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_880E0D76F85E0677` (`username`);

--
-- Index pour la table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_7A777FB0E7927C74` (`email`),
  ADD UNIQUE KEY `UNIQ_7A777FB084A87EC3` (`instagram`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
