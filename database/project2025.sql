-- ============================================================
-- Base de données : project2025
-- Site de vente de produits Apple d'occasion (CodeIgniter 4)
--
-- Contient la structure complète + des données de démonstration.
-- Compte de démo : demo@example.com / Demo1234!
-- ============================================================

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
SET NAMES utf8mb4;

-- ------------------------------------------------------------
-- Table `gamme`
-- ------------------------------------------------------------
CREATE TABLE `gamme` (
  `id_gamme` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(255) NOT NULL,
  `modele` varchar(255) NOT NULL,
  `annee` int(11) NOT NULL,
  PRIMARY KEY (`id_gamme`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ------------------------------------------------------------
-- Table `personne`
-- ------------------------------------------------------------
CREATE TABLE `personne` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `visible` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Compte de démonstration (mot de passe haché en bcrypt : Demo1234!)
INSERT INTO `personne` (`id`, `email`, `password`, `visible`) VALUES
(1, 'demo@example.com', '$2y$10$/phlqFnjo9rXtvcPvWvTceVze8FHBX8KmnS/ALoMuDylgCNi/uAn2', 1);

-- ------------------------------------------------------------
-- Table `produit`
-- ------------------------------------------------------------
CREATE TABLE `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(50) NOT NULL,
  `modele` varchar(100) NOT NULL,
  `annee` int(11) NOT NULL,
  `personne_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_personne_id` (`personne_id`),
  CONSTRAINT `fk_personne_id` FOREIGN KEY (`personne_id`) REFERENCES `personne` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Annonces de démonstration
INSERT INTO `produit` (`id`, `categorie`, `modele`, `annee`, `personne_id`) VALUES
(1, 'Téléphone',  'iPhone 13',          2021, 1),
(2, 'Téléphone',  'iPhone XS',          2018, 1),
(3, 'Ordinateur', 'MacBook Air M1',     2020, 1),
(4, 'Tablette',   'iPad 9e génération', 2021, 1),
(5, 'Accessoire', 'AirPods Pro',        2019, 1);

-- ------------------------------------------------------------
-- Table `produit_detail`
-- ------------------------------------------------------------
CREATE TABLE `produit_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produit_id` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_produit_id` (`produit_id`),
  CONSTRAINT `fk_produit_id` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `produit_detail` (`id`, `produit_id`, `prix`, `description`) VALUES
(1, 1, 500, 'iPhone 13 en parfait état, avec boîte et chargeur.'),
(2, 2, 220, 'iPhone XS 64 Go, quelques micro-rayures, batterie à 85 %.'),
(3, 3, 650, 'MacBook Air M1 8 Go / 256 Go, très bon état.'),
(4, 4, 250, 'iPad 9e génération 64 Go Wi-Fi, avec housse.'),
(5, 5, 120, 'AirPods Pro avec boîtier de charge, fonctionnent parfaitement.');

COMMIT;
