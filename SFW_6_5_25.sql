-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Počítač: localhost
-- Vytvořeno: Úte 06. kvě 2025, 12:05
-- Verze serveru: 5.7.11
-- Verze PHP: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `sfw_projekt`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `drugs`
--

CREATE TABLE `drugs` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `recepie_id` int(11) NOT NULL,
  `sell_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `effects`
--

CREATE TABLE `effects` (
  `id` int(11) NOT NULL,
  `effect` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `effect_strength` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `effects`
--

INSERT INTO `effects` (`id`, `effect`, `effect_strength`) VALUES
(1, 'Euforie', 4),
(2, 'Calming', 5),
(3, 'Energy', 8),
(4, 'Relaxing', 5),
(5, 'Athletic', 8),
(6, 'Focused', 7);

-- --------------------------------------------------------

--
-- Struktura tabulky `effect_drug`
--

CREATE TABLE `effect_drug` (
  `effect_id` int(11) NOT NULL,
  `drug_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `nickname` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `rank` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `ingame_time` int(99) NOT NULL,
  `num_achievment` int(99) NOT NULL,
  `money` int(99) NOT NULL,
  `location` varchar(45) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `players`
--

INSERT INTO `players` (`id`, `nickname`, `rank`, `ingame_time`, `num_achievment`, `money`, `location`) VALUES
(1, 'Prokop Dveře', '3', 6, 4, 5000, 'Smegma Farma'),
(2, 'Arina Kushleva', '1', 2, 2, 300, 'Rusko'),
(3, 'Dominik Železné Kladivo', '69', 1000, 13, 4000000, 'Pod Jarovem 24'),
(4, 'Kamil Železné Kladivo', '96', 1001, 12, 3500000, 'Pod Jarovem 24,5'),
(5, 'Martin Venglář', '420', 4, 13, 69000000, 'Pod Jarovem 26');

-- --------------------------------------------------------

--
-- Struktura tabulky `player_drugs`
--

CREATE TABLE `player_drugs` (
  `player_id` int(11) NOT NULL,
  `drug_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `cost` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `product`
--

INSERT INTO `product` (`id`, `name`, `cost`) VALUES
(1, 'Cuke', 3),
(2, 'Donut', 2),
(3, 'BlueBull', 6),
(4, 'Gasoline', 8),
(5, 'Viagra', 10);

-- --------------------------------------------------------

--
-- Struktura tabulky `recepie`
--

CREATE TABLE `recepie` (
  `id` int(11) NOT NULL,
  `produt_id` int(99) NOT NULL,
  `weed_id` int(99) NOT NULL,
  `production_cost` int(99) NOT NULL,
  `avg_cost` int(99) NOT NULL,
  `Dealers_cut` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `recepie`
--

INSERT INTO `recepie` (`id`, `produt_id`, `weed_id`, `production_cost`, `avg_cost`, `Dealers_cut`) VALUES
(1, 1, 3, 18, 30, 5),
(2, 2, 4, 17, 30, 5),
(3, 3, 1, 26, 40, 5),
(4, 5, 2, 40, 60, 10),
(5, 5, 4, 25, 40, 5);

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `address` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `weed_quality_requieremt` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `addiction` int(11) NOT NULL,
  `pref_effect` varchar(45) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `weed_quality_requieremt`, `addiction`, `pref_effect`) VALUES
(1, 'John Doe', '123 Main St', 'High', 2, 'Energy'),
(2, 'Lada Čiháková', 'Prokopova 69', 'Low', 9, 'Homosexual'),
(3, 'Filip Dvořák', 'Kácov 24', 'Medium ', 4, 'Calming'),
(4, 'Pochman Lokop', 'Jezero Lochness 12', 'Low', 34, 'Smelly Crack'),
(5, 'Vojtěch Kábrt', 'U Kladenské Krysy 45', 'Medium', 66, 'Agresion'),
(6, 'Bilbo Pytlík', 'Pod kopečkem 48', 'High', 40, 'Levitation'),
(7, 'Kuhbar Allah Sengal', 'Pakistánská 911', 'Low', 30, 'Explosive'),
(8, 'Ying Bing Ching', 'Chinatown 12', 'Medium', 60, 'Levitation');

-- --------------------------------------------------------

--
-- Struktura tabulky `user_drug`
--

CREATE TABLE `user_drug` (
  `user_id` int(11) NOT NULL,
  `drug_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `weed`
--

CREATE TABLE `weed` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `prod_cost` int(11) NOT NULL,
  `water_needs` int(11) NOT NULL,
  `grow_difficulty` int(11) NOT NULL,
  `light_needs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `weed`
--

INSERT INTO `weed` (`id`, `name`, `prod_cost`, `water_needs`, `grow_difficulty`, `light_needs`) VALUES
(1, 'og kush', 20, 3, 2, 3),
(2, 'granddaddy purple', 30, 4, 4, 5),
(3, 'Sour Diesel', 15, 5, 5, 4),
(4, 'Green Crack', 15, 2, 3, 4);

-- --------------------------------------------------------

--
-- Struktura tabulky `workers`
--

CREATE TABLE `workers` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `type` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `level` int(99) NOT NULL,
  `cost_per_H` int(99) NOT NULL,
  `address` varchar(45) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `workers`
--

INSERT INTO `workers` (`id`, `name`, `type`, `level`, `cost_per_H`, `address`) VALUES
(1, 'Prokop Cihak', 'Dealer', 47, 10, 'u Baziny 108'),
(2, 'Daniel Lochmann', 'Chemic', 99, 25, 'Uzená 48'),
(3, 'Lada Cihakova', 'Dealer', 86, 10, 'Prokopova 69'),
(4, 'Deniz Tekin Gagin', 'Financial Manager', 88, 20, 'chánova 57'),
(5, 'Adam Miščík', 'Botanik', 54, 15, 'Prokopova 15'),
(6, 'Matej Adamec', 'Asistant', 1, 5, 'Chudáků 32'),
(7, 'Bohumil Skočdopole', 'Cleaner', 61, 15, 'Železná 9'),
(8, 'Prokop Dveře', 'Supplier', 34, 25, 'Dveřová 40'),
(9, 'Vašek Flašek', 'Botanic', 61, 25, 'Taškova 22');

-- --------------------------------------------------------

--
-- Struktura tabulky `worker_player`
--

CREATE TABLE `worker_player` (
  `worker_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `worker_player`
--

INSERT INTO `worker_player` (`worker_id`, `player_id`) VALUES
(1, 1),
(2, 1),
(6, 2),
(1, 3),
(2, 3),
(4, 3),
(5, 3),
(1, 4),
(2, 4),
(3, 4),
(7, 4),
(9, 4),
(1, 5),
(2, 5),
(4, 5),
(6, 5),
(8, 5);

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `drugs`
--
ALTER TABLE `drugs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`),
  ADD KEY `fk_drugs_recepie` (`recepie_id`),
  ADD KEY `fk_drugs_selling` (`sell_id`);

--
-- Klíče pro tabulku `effects`
--
ALTER TABLE `effects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Klíče pro tabulku `effect_drug`
--
ALTER TABLE `effect_drug`
  ADD PRIMARY KEY (`effect_id`,`drug_id`),
  ADD KEY `drug_id` (`drug_id`);

--
-- Klíče pro tabulku `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `player_drugs`
--
ALTER TABLE `player_drugs`
  ADD PRIMARY KEY (`player_id`,`drug_id`),
  ADD KEY `drug_id` (`drug_id`);

--
-- Klíče pro tabulku `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Klíče pro tabulku `recepie`
--
ALTER TABLE `recepie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `fk_recepie_product` (`produt_id`),
  ADD KEY `fk_recepie_weed` (`weed_id`);

--
-- Klíče pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Klíče pro tabulku `user_drug`
--
ALTER TABLE `user_drug`
  ADD PRIMARY KEY (`user_id`,`drug_id`),
  ADD KEY `drug_id` (`drug_id`);

--
-- Klíče pro tabulku `weed`
--
ALTER TABLE `weed`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Klíče pro tabulku `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Klíče pro tabulku `worker_player`
--
ALTER TABLE `worker_player`
  ADD PRIMARY KEY (`worker_id`,`player_id`),
  ADD KEY `player_id` (`player_id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `drugs`
--
ALTER TABLE `drugs`
  ADD CONSTRAINT `fk_drugs_recepie` FOREIGN KEY (`recepie_id`) REFERENCES `recepie` (`id`);

--
-- Omezení pro tabulku `effect_drug`
--
ALTER TABLE `effect_drug`
  ADD CONSTRAINT `effect_drug_ibfk_1` FOREIGN KEY (`effect_id`) REFERENCES `effects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `effect_drug_ibfk_2` FOREIGN KEY (`drug_id`) REFERENCES `drugs` (`id`) ON DELETE CASCADE;

--
-- Omezení pro tabulku `player_drugs`
--
ALTER TABLE `player_drugs`
  ADD CONSTRAINT `player_drugs_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`),
  ADD CONSTRAINT `player_drugs_ibfk_2` FOREIGN KEY (`drug_id`) REFERENCES `drugs` (`id`);

--
-- Omezení pro tabulku `recepie`
--
ALTER TABLE `recepie`
  ADD CONSTRAINT `fk_recepie_product` FOREIGN KEY (`produt_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_recepie_weed` FOREIGN KEY (`weed_id`) REFERENCES `weed` (`id`) ON DELETE CASCADE;

--
-- Omezení pro tabulku `user_drug`
--
ALTER TABLE `user_drug`
  ADD CONSTRAINT `user_drug_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_drug_ibfk_2` FOREIGN KEY (`drug_id`) REFERENCES `drugs` (`id`) ON DELETE CASCADE;

--
-- Omezení pro tabulku `worker_player`
--
ALTER TABLE `worker_player`
  ADD CONSTRAINT `worker_player_ibfk_1` FOREIGN KEY (`worker_id`) REFERENCES `workers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `worker_player_ibfk_2` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
