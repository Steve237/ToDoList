-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 13 fév. 2021 à 18:11
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `todolist`
--

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20201228094110', '2020-12-28 09:41:28', 1097),
('DoctrineMigrations\\Version20201228102422', '2020-12-28 10:24:48', 272),
('DoctrineMigrations\\Version20201228104530', '2020-12-28 10:45:42', 401),
('DoctrineMigrations\\Version20201228185449', '2020-12-28 18:55:03', 3026);

-- --------------------------------------------------------

--
-- Structure de la table `task`
--

DROP TABLE IF EXISTS `task`;
CREATE TABLE IF NOT EXISTS `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_done` tinyint(1) NOT NULL,
  `username_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_527EDB25ED766068` (`username_id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `task`
--

INSERT INTO `task` (`id`, `created_at`, `title`, `content`, `is_done`, `username_id`) VALUES
(9, '2020-12-15 00:00:00', 'apprendre PHP unit pour le projet', 'finir le cours sur PHP UNIT sur Openclassroom', 1, NULL),
(10, '2020-12-14 00:00:00', 'réaliser les test unitaires', 'Mettre en place les test unitaires au sein du site', 1, NULL),
(11, '2021-01-09 16:41:18', 'Nouvelle tâche', 'Ceci est une tâche crée par un test', 1, 10),
(12, '2021-01-09 16:43:33', 'Modification de tache', 'Je modifie une tache', 1, 10),
(15, '2021-01-09 16:53:49', 'Modification de tache', 'Je modifie une tache', 1, 10),
(19, '2021-01-09 17:35:25', 'Nouvelle tâche', 'Ceci est une tâche crée par un test', 0, 12),
(20, '2021-01-09 17:37:44', 'Nouvelle tâche', 'Ceci est une tâche crée par un test', 1, 10),
(21, '2021-01-09 17:37:45', 'Nouvelle tâche', 'Ceci est une tâche crée par un test', 0, 12),
(22, '2021-01-09 17:40:06', 'Nouvelle tâche', 'Ceci est une tâche', 1, 10),
(23, '2021-01-09 17:40:06', 'Nouvelle tâche', 'Ceci est une tâche crée par un test', 0, 12),
(24, '2021-01-09 17:40:31', 'Nouvelle tâche', 'Ceci est une tâche crée par un test', 0, 10),
(29, '2021-01-13 22:04:25', 'Nouvelle tâche', 'Ceci est une tâche crée par un test', 0, 12),
(31, '2021-01-13 22:13:25', 'Nouvelle tâche', 'Ceci est une tâche crée par un test', 0, 12),
(32, '2021-01-14 07:26:56', 'Nouvelle tâche', 'Ceci est une tâche crée par un test', 0, 10),
(33, '2021-01-14 07:26:56', 'Nouvelle tâche', 'Ceci est une tâche crée par un test', 0, 12),
(34, '2021-01-14 07:28:15', 'Nouvelle tâche', 'Ceci est une tâche crée par un test', 0, 10),
(35, '2021-01-14 07:28:16', 'Nouvelle tâche', 'Ceci est une tâche crée par un test', 0, 12),
(36, '2021-01-14 07:29:53', 'Nouvelle tâche', 'Ceci est une tâche crée par un test', 0, 10),
(37, '2021-01-14 07:29:54', 'Nouvelle tâche', 'Ceci est une tâche crée par un test', 0, 12),
(38, '2021-01-14 07:51:26', 'Nouvelle tâche', 'Ceci est une tâche crée par un test', 0, 10),
(39, '2021-01-14 07:51:27', 'Nouvelle tâche', 'Ceci est une tâche crée par un test', 0, 12),
(40, '2021-01-14 09:07:19', 'Nouvelle tâche', 'Ceci est une tâche crée par un test', 0, 10),
(41, '2021-01-14 09:07:19', 'Nouvelle tâche', 'Ceci est une tâche crée par un test', 0, 12),
(47, '2021-01-14 11:41:17', 'Nouvelle tâche', 'Ceci est une tâche crée par un test', 0, 12),
(55, '2021-02-08 13:05:55', 'comparaison audit de performance', 'comparaison creation de tache', 0, 12),
(56, '2021-02-08 19:27:06', 'Nouvelle tâche', 'Ceci est une tâche crée par un test', 0, 12),
(57, '2021-02-09 05:30:29', 'Nouvelle tâche', 'Ceci est une tâche crée par un test', 0, 12),
(58, '2021-02-09 05:44:14', 'Nouvelle tâche', 'Ceci est une tâche crée par un test', 0, 27),
(59, '2021-02-09 05:44:18', 'Nouvelle tâche', 'Ceci est une tâche crée par un test', 0, 12),
(60, '2021-02-09 05:55:11', 'Nouvelle tâche', 'Ceci est une tâche crée par un test', 0, 27),
(61, '2021-02-09 05:55:14', 'Nouvelle tâche', 'Ceci est une tâche crée par un test', 0, 12),
(62, '2021-02-09 06:04:53', 'Nouvelle tâche', 'Ceci est une tâche crée par un test', 0, 27),
(63, '2021-02-09 06:04:56', 'Nouvelle tâche', 'Ceci est une tâche crée par un test', 0, 12),
(64, '2021-02-09 06:08:22', 'Nouvelle tâche', 'Ceci est une tâche crée par un test', 0, 27),
(65, '2021-02-09 06:08:25', 'Nouvelle tâche', 'Ceci est une tâche crée par un test', 0, 12),
(66, '2021-02-09 06:36:10', 'Nouvelle tâche', 'Ceci est une tâche crée par un test', 0, 27),
(67, '2021-02-09 06:36:14', 'Nouvelle tâche', 'Ceci est une tâche crée par un test', 0, 12),
(68, '2021-02-09 06:42:36', 'Nouvelle tâche', 'Ceci est une tâche crée par un test', 0, 27),
(69, '2021-02-09 06:42:39', 'Nouvelle tâche', 'Ceci est une tâche crée par un test', 0, 12),
(70, '2021-02-09 06:51:34', 'Nouvelle tâche', 'Ceci est une tâche crée par un test', 0, 27),
(71, '2021-02-09 06:51:36', 'Nouvelle tâche', 'Ceci est une tâche crée par un test', 0, 12),
(72, '2021-02-09 07:36:38', 'Nouvelle tâche', 'Ceci est une tâche crée par un test', 0, 27),
(73, '2021-02-09 07:36:41', 'Nouvelle tâche', 'Ceci est une tâche crée par un test', 0, 12);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `roles`) VALUES
(10, 'Espirito2956', '$argon2id$v=19$m=65536,t=4,p=1$Y1RKbEJkNEYuM1BiUjNXQw$6a9SOzoAP1zj7dkD1hbO+VBq/edza4UGU0VUj+98B40', 'editeduser99@example.org', '[]'),
(12, 'Essama', '$argon2id$v=19$m=65536,t=4,p=1$Lk5xdTVneHo3YjE0RHRmbA$ZLWKFJysfGM9SlxDkKAWfxGFye+X13RrLOHD1cZK9L4', 'adouessono@yahoo.fr', '[\"ROLE_ADMIN\"]'),
(15, 'kinglion988', '$argon2id$v=19$m=65536,t=4,p=1$T3BzMThSSEo4SldRbmplOQ$K+M+Z3MyyRaPbSZsFUigDmKK8ByJbBYeYT5OLFiKsHs', 'newuser@example995.org', '[]'),
(17, 'kinglion195', '$argon2id$v=19$m=65536,t=4,p=1$Z3VpeHg2TmRZeXRWRlFneQ$O0DE070QQMIyBVNMarU8h0YGO/ipB8irlMA0XOLNfOU', 'newuser@example195.org', '[]'),
(18, 'kinglion199', '$argon2id$v=19$m=65536,t=4,p=1$LmFyNXBWbGhwVUE0N3dMZg$6RUv8OSrRfQszQEthz4U5695krIlwpT7yF3XsCA33z0', 'newuser@example199.org', '[]'),
(19, 'kingdukamer350', '$argon2id$v=19$m=65536,t=4,p=1$Y2xpVHgyUXczUm84dkJVdQ$EpNNcXq8twaeXPwngSSits1k0BmmQuH4ba9/KXsiKFM', 'newuser@example350.org', '[]'),
(23, 'king776', '$argon2id$v=19$m=65536,t=4,p=1$dUMvZ3d2a3B6M2NWek9XOQ$sTGYJp7tYp/PQjW2aZyp5W7ocrsTjioPCO/2zBccZ7A', 'newuser@example154.org', '[]'),
(24, 'kamerleking237', '$argon2id$v=19$m=65536,t=4,p=1$cTFpSldNWGlDQnpldGEuSg$hEwVKK+gBYEeTIlDknqdTSwfJX9DYo0M5bK4XjWYuBQ', 'espirito237@gmail.com', '[]'),
(25, 'Sergio237', '$argon2id$v=19$m=65536,t=4,p=1$VmxMZC5lYnVyVmpMMC41Mg$swW3FdXZiAP0lW1cuXWtxGuxRUU5H9PZZ9vSTdK3Byo', 'sergio237@gmail.com', '[]'),
(26, 'Bernardo', '$argon2id$v=19$m=65536,t=4,p=1$WGl5RWxWRGpqbWE4dEpRTg$aSRiKV5DiEYIS6uEM7s/i8BBKvPtnTrCBBhaJI7uwIs', 'essonoadou545@gmail.com', '[]'),
(27, 'Steven450', '$argon2id$v=19$m=65536,t=4,p=1$SS9XZm5SZlNkbXh1MmNYLw$jirQwndQw0XtWlWQV0aUqz0u8tpxn3DvAoez7TFH640', 'essonoadou69852@gmail.com', '[]'),
(28, 'king999', '$argon2id$v=19$m=65536,t=4,p=1$bXFWMU5ORjNwODhZVVc4SQ$CVZXVTGTAX99RylEHX7gsASfv83ToCpsHExRNK7D+G0', 'newuser96@example154.org', '[]'),
(29, 'kingdukamer7799', '$argon2id$v=19$m=65536,t=4,p=1$ZWpVVzQzSE4yMnVBa1djag$jIZ460Gti/YTMAscNr+OZihjb1vP21WT0MMus+poRD4', 'newkamer237@example154.org', '[]'),
(30, 'kingdukamer54', '$argon2id$v=19$m=65536,t=4,p=1$S1FubFZBQkFVU1hLcWhlVw$G4EbBzD0b58RYPyy5H4rh30JdJdZbin+anud3sfTssI', 'newkamer54@example154.org', '[]'),
(31, 'kingdukamer457', '$argon2id$v=19$m=65536,t=4,p=1$WmN6bUJVcGNmVzBVZGFTbw$92vm0DmiInP958md1uQKySX1nd0Kz4qfLgssi43xZQ4', 'newkamer39@example154.org', '[]'),
(32, 'kingdukamer775', '$argon2id$v=19$m=65536,t=4,p=1$NkZ3RWVkbnNpNHVrbFZlTw$Kut35nK4/iCqxF0GbkMbRv2Mn6+zkHaEl+GxALttuxM', 'newkamer7@example154.org', '[]'),
(36, 'kingdukamer932', '$argon2id$v=19$m=65536,t=4,p=1$QW13YXFJdzZhc0gvN3NBTg$kgt9lXOMTIizlBwjI1DBXwgZrIrqGh07XTjfpSJMXJA', 'newkamer932@example154.org', '[]'),
(37, 'Essama7764', '$argon2id$v=19$m=65536,t=4,p=1$ekVxUEI5S1VXQ3dYdGR6MA$wIFVjq5/g6hZNEFocTXOBW5EN5ZJ/6ew7JrL4qtDGpc', 'adouessono995@yahoo.fr', '[]'),
(38, 'Essama858', '$argon2id$v=19$m=65536,t=4,p=1$RFJ5NnVXNXhFMHV5QkRaUw$DcqRAC0OlZmnlueW+hvTdZDH/Ub3M0jb2MtedRV+Ud4', 'adouessono99878@yahoo.fr', '[]'),
(39, 'stevedubled237', '$argon2id$v=19$m=65536,t=4,p=1$NnJ5UVRISXUzakF1UGl1dA$jC3cAZyZUI82/Df+395kvAlgSR3YIpWqDrGRNUB6bmI', 'espirito237556@gmail.com', '[]');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `FK_527EDB25ED766068` FOREIGN KEY (`username_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
