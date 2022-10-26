-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 26 oct. 2022 à 18:07
-- Version du serveur :  10.4.19-MariaDB
-- Version de PHP : 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbdbuild`
--

-- --------------------------------------------------------

--
-- Structure de la table `build`
--

CREATE TABLE `build` (
  `id` int(11) NOT NULL,
  `featured_image_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `build`
--

INSERT INTO `build` (`id`, `featured_image_id`, `title`, `slug`, `content`, `featured_text`, `created_at`, `updated_at`, `image`) VALUES
(1, NULL, 'Demogorgon Build', 'demo', '<div>Je suis le content du Build.<br><br></div>', 'Build Demo', '2022-10-26 15:59:49', NULL, 'dac-build-63593d55a86f9.png'),
(2, NULL, 'Huntress Build', 'huntress', '<div>Je suis le content d\'un Build pour la Huntress.</div>', 'Hunt', '2022-10-20 09:06:10', NULL, NULL),
(3, NULL, 'Freddy Build', 'freddy', '<div>Je suis le content d\'un Build de Freddy<br>avec pour but de toucher au corps à corps</div>', 'Freddy', '2022-10-20 11:57:06', NULL, NULL),
(5, NULL, 'Spectre Fun', 'spectre', '<div>zer ze v sqd i usqeiuoghmlsdugvsdf g liugsdqgvug;jug; zseg</div>', 'zaeaze', '2022-10-25 12:46:26', NULL, 'dac-build-6357be824de26.png'),
(14, NULL, 'TEST', 'test', '<div>test content</div>', 'aze', '2022-10-26 11:08:09', NULL, 'Choukados-6358f8f957c88.png'),
(15, NULL, 'Huntress Fun', 'huntress', 'huntress build fun text', 'aze', '2022-10-26 14:46:00', NULL, 'chou-de-noel-63592c08e1567.png'),
(17, NULL, 'azeazeazeazeazzeaezae', 'azeazeazeaze', 'azeazeazeaeazeazeazeazeae aze', 'aze', '2022-10-26 15:49:19', NULL, 'chou-de-noel-63593adf0b65a.png');

-- --------------------------------------------------------

--
-- Structure de la table `build_category`
--

CREATE TABLE `build_category` (
  `build_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `build_category`
--

INSERT INTO `build_category` (`build_id`, `category_id`) VALUES
(1, 1),
(1, 3),
(2, 2),
(3, 1),
(5, 1),
(14, 1),
(15, 2),
(17, 3);

-- --------------------------------------------------------

--
-- Structure de la table `build_killer`
--

CREATE TABLE `build_killer` (
  `build_id` int(11) NOT NULL,
  `killer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `build_killer`
--

INSERT INTO `build_killer` (`build_id`, `killer_id`) VALUES
(1, 2),
(2, 3),
(3, 1),
(5, 7),
(14, 7),
(15, 3),
(17, 11);

-- --------------------------------------------------------

--
-- Structure de la table `build_perk`
--

CREATE TABLE `build_perk` (
  `build_id` int(11) NOT NULL,
  `perk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `build_perk`
--

INSERT INTO `build_perk` (`build_id`, `perk_id`) VALUES
(1, 1),
(1, 7),
(1, 8),
(1, 9);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `color`) VALUES
(1, 'CAC', 'cac', '#ff0000'),
(2, 'Distance', 'Distance', '#21c0b5'),
(3, 'Dash', 'dash', '#f1ff2e');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `build_id` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `build_id`, `content`, `created_at`, `user_id`) VALUES
(7, 1, 'commentaire', '2022-10-21 13:35:29', 1),
(8, 1, 'Closed', '2022-10-26 09:56:03', 3);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `killer`
--

CREATE TABLE `killer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `killer`
--

INSERT INTO `killer` (`id`, `name`, `slug`) VALUES
(1, 'Freddy', 'freddy'),
(2, 'Demogorgon', 'demogorgon'),
(3, 'Huntress', 'huntress'),
(4, 'Trickster', 'trickster'),
(7, 'Spectre', 'spectre'),
(11, 'test', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `killer_category`
--

CREATE TABLE `killer_category` (
  `killer_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `killer_category`
--

INSERT INTO `killer_category` (`killer_id`, `category_id`) VALUES
(1, 1),
(2, 3),
(3, 2),
(4, 2),
(7, 1),
(11, 2);

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `build_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `page_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_order` int(11) DEFAULT NULL,
  `is_visible` tinyint(1) NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `menu_menu`
--

CREATE TABLE `menu_menu` (
  `menu_source` int(11) NOT NULL,
  `menu_target` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `option`
--

CREATE TABLE `option` (
  `id` int(11) NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `perk`
--

CREATE TABLE `perk` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `perk`
--

INSERT INTO `perk` (`id`, `name`, `description`, `image`, `slug`, `category`) VALUES
(1, 'Deerstalker', '<div><strong>Deerstalker description <br>info complémentaire : </strong><a href=\"https://deadbydaylight.fandom.com/wiki/Deerstalker\"><strong>Deerstalker</strong></a><strong>&nbsp;</strong></div>', 'Deerstalker.jpg', 'deerstalker', 'Killer'),
(2, 'test recomposé', 'test pour la 3eme fois', NULL, 'test', 'Killer'),
(4, 'Victoire', 'parce que tu es le meilleur', NULL, 'victoire', 'Killer'),
(7, 'Thanatophobia', '<div>Thanatophobia</div>', 'Thanatophobia.jpg', 'thanatophobia', 'Killer'),
(8, 'Stridor', '<div>Stridor</div>', 'Stridor.png', 'stridor', 'Killer'),
(9, 'Vocation de l\'Infirmière', '<div>Vocation de l\'Infirmière</div>', 'A-Nurses-Calling.jpg', 'vocation-de-linfirmiere', 'Killer');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `name`, `first_name`, `adresse`, `cp`, `city`, `image`) VALUES
(1, 'aze@aze.fr', '[]', '$2y$13$bKJB6dKyDfevwJO3OIzkx.BqRscZLYxW11BFrc9cy4QvwcPJ1bLSi', 'sarrazin', 'michael', '12 rue des rageboys', 78000, 'MANTES', NULL),
(2, 'j.shourde@aze.com', '[]', '$2y$13$fykF7zJmkssx6ySgwqwZlOnY0/s8OAtBL/Q/qoNX9hT63FoAGs7xa', 'shourde', 'joe', NULL, NULL, NULL, NULL),
(3, 'admin@admin.com', '[\"ROLE_ADMIN\"]', '$2y$13$Lf.3yLtJ6s5AirINke7gv.4z/FBA/wGYLKuIFfmQeHd1UuIkUJOIO', 'admin', 'admin', 'avenu des admins', 40404, 'admincity', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `build`
--
ALTER TABLE `build`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_BDA0F2DB3569D950` (`featured_image_id`);

--
-- Index pour la table `build_category`
--
ALTER TABLE `build_category`
  ADD PRIMARY KEY (`build_id`,`category_id`),
  ADD KEY `IDX_E26F43B717C13F8B` (`build_id`),
  ADD KEY `IDX_E26F43B712469DE2` (`category_id`);

--
-- Index pour la table `build_killer`
--
ALTER TABLE `build_killer`
  ADD PRIMARY KEY (`build_id`,`killer_id`),
  ADD KEY `IDX_46FDBFF417C13F8B` (`build_id`),
  ADD KEY `IDX_46FDBFF4CD5FD5FF` (`killer_id`);

--
-- Index pour la table `build_perk`
--
ALTER TABLE `build_perk`
  ADD PRIMARY KEY (`build_id`,`perk_id`),
  ADD KEY `IDX_C472B80517C13F8B` (`build_id`),
  ADD KEY `IDX_C472B805DF084E33` (`perk_id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9474526C17C13F8B` (`build_id`),
  ADD KEY `IDX_9474526CA76ED395` (`user_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `killer`
--
ALTER TABLE `killer`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `killer_category`
--
ALTER TABLE `killer_category`
  ADD PRIMARY KEY (`killer_id`,`category_id`),
  ADD KEY `IDX_CD39F56FCD5FD5FF` (`killer_id`),
  ADD KEY `IDX_CD39F56F12469DE2` (`category_id`);

--
-- Index pour la table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7D053A9317C13F8B` (`build_id`),
  ADD KEY `IDX_7D053A9312469DE2` (`category_id`),
  ADD KEY `IDX_7D053A93C4663E4` (`page_id`);

--
-- Index pour la table `menu_menu`
--
ALTER TABLE `menu_menu`
  ADD PRIMARY KEY (`menu_source`,`menu_target`),
  ADD KEY `IDX_B54ACADD8CCD27AB` (`menu_source`),
  ADD KEY `IDX_B54ACADD95287724` (`menu_target`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `option`
--
ALTER TABLE `option`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `perk`
--
ALTER TABLE `perk`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `build`
--
ALTER TABLE `build`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `killer`
--
ALTER TABLE `killer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `option`
--
ALTER TABLE `option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `perk`
--
ALTER TABLE `perk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `build`
--
ALTER TABLE `build`
  ADD CONSTRAINT `FK_BDA0F2DB3569D950` FOREIGN KEY (`featured_image_id`) REFERENCES `media` (`id`);

--
-- Contraintes pour la table `build_category`
--
ALTER TABLE `build_category`
  ADD CONSTRAINT `FK_E26F43B712469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_E26F43B717C13F8B` FOREIGN KEY (`build_id`) REFERENCES `build` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `build_killer`
--
ALTER TABLE `build_killer`
  ADD CONSTRAINT `FK_46FDBFF417C13F8B` FOREIGN KEY (`build_id`) REFERENCES `build` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_46FDBFF4CD5FD5FF` FOREIGN KEY (`killer_id`) REFERENCES `killer` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `build_perk`
--
ALTER TABLE `build_perk`
  ADD CONSTRAINT `FK_C472B80517C13F8B` FOREIGN KEY (`build_id`) REFERENCES `build` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_C472B805DF084E33` FOREIGN KEY (`perk_id`) REFERENCES `perk` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526C17C13F8B` FOREIGN KEY (`build_id`) REFERENCES `build` (`id`),
  ADD CONSTRAINT `FK_9474526CA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `killer_category`
--
ALTER TABLE `killer_category`
  ADD CONSTRAINT `FK_CD39F56F12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_CD39F56FCD5FD5FF` FOREIGN KEY (`killer_id`) REFERENCES `killer` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `FK_7D053A9312469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_7D053A9317C13F8B` FOREIGN KEY (`build_id`) REFERENCES `build` (`id`),
  ADD CONSTRAINT `FK_7D053A93C4663E4` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`);

--
-- Contraintes pour la table `menu_menu`
--
ALTER TABLE `menu_menu`
  ADD CONSTRAINT `FK_B54ACADD8CCD27AB` FOREIGN KEY (`menu_source`) REFERENCES `menu` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_B54ACADD95287724` FOREIGN KEY (`menu_target`) REFERENCES `menu` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
