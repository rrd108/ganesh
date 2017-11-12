-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Gép: localhost:3306
-- Létrehozás ideje: 2017. Okt 23. 16:21
-- Kiszolgáló verziója: 5.7.19-0ubuntu0.17.04.1
-- PHP verzió: 7.0.22-0ubuntu0.17.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `ganesh`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `activities`
--

CREATE TABLE `activities` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `festival_id` smallint(5) UNSIGNED NOT NULL,
  `department_id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `manpower` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `activities`
--

INSERT INTO `activities` (`id`, `festival_id`, `department_id`, `name`, `start`, `end`, `manpower`) VALUES
(3, 1, 1, 'főzés', '2018-07-10 08:00:00', '2018-07-10 17:00:00', 5),
(4, 1, 2, 'templomi vezetés', '2018-07-10 11:00:00', '2018-07-10 18:00:00', 3);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `activities_users`
--

CREATE TABLE `activities_users` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `user_id` char(36) NOT NULL,
  `activity_id` mediumint(8) UNSIGNED NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `fulltime` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cake_d_c_users_phinxlog`
--

CREATE TABLE `cake_d_c_users_phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `cake_d_c_users_phinxlog`
--

INSERT INTO `cake_d_c_users_phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20150513201111, 'Initial', '2017-10-17 06:50:10', '2017-10-17 06:50:10', 0),
(20161031101316, 'AddSecretToUsers', '2017-10-17 06:50:10', '2017-10-17 06:50:10', 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `departments`
--

CREATE TABLE `departments` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `place_id` smallint(5) UNSIGNED NOT NULL,
  `user_id` char(36) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `departments`
--

INSERT INTO `departments` (`id`, `place_id`, `user_id`, `name`) VALUES
(1, 1, 'fdd6d5b4-daa5-4384-af0e-250efd2137fa', 'konyha'),
(2, 1, 'abcaee8f-8d70-479b-a471-a984833b0f5c', 'vendégvezetés');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `festivals`
--

CREATE TABLE `festivals` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `place_id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `festivals`
--

INSERT INTO `festivals` (`id`, `place_id`, `name`, `start`, `end`) VALUES
(1, 1, 'Búcsú 2018', '2018-07-10 08:00:00', '2018-07-13 20:00:00'),
(2, 2, 'Gaszto nap', '2018-06-03 08:00:00', '2018-06-03 20:00:00');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `places`
--

CREATE TABLE `places` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `lat` float(10,6) DEFAULT NULL,
  `lng` float(10,6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `places`
--

INSERT INTO `places` (`id`, `name`, `address`, `lat`, `lng`) VALUES
(1, 'Krisna-völgy', '8699 Somogyvámos Gauranga tér 1', NULL, NULL),
(2, 'Budapest templom', '1039 Budapest, Lehel u. 15-17.', NULL, NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `social_accounts`
--

CREATE TABLE `social_accounts` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `reference` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `description` text,
  `link` varchar(255) NOT NULL,
  `token` varchar(500) NOT NULL,
  `token_secret` varchar(500) DEFAULT NULL,
  `token_expires` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `data` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` char(36) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `token_expires` datetime DEFAULT NULL,
  `api_token` varchar(255) DEFAULT NULL,
  `activation_date` datetime DEFAULT NULL,
  `secret` varchar(32) DEFAULT NULL,
  `secret_verified` tinyint(1) DEFAULT NULL,
  `tos_date` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `is_superuser` tinyint(1) NOT NULL DEFAULT '0',
  `role` varchar(255) DEFAULT 'user',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `token`, `token_expires`, `api_token`, `activation_date`, `secret`, `secret_verified`, `tos_date`, `active`, `is_superuser`, `role`, `created`, `modified`) VALUES
('605aee8f-8d70-479b-a471-a984833b0f5c', 'rrd', 'rrd@krisna.hu', '$2y$10$7Qyi7YY2/C6.1qJlFmCrXOFUMRGr6QyLGpD8jEHe4xoTCzr2n59tm', '', '', '', NULL, '', NULL, '', 1, NULL, 1, 1, 'superuser', '2017-10-23 13:47:54', '2017-10-23 13:47:54'),
('6af07176-bad7-491b-8a1d-047a9705fb9b', 'bálint', 'balint.kovacs@sehol.se', '$2y$10$7Qyi7YY2/C6.1qJlFmCrXOFUMRGr6QyLGpD8jEHe4xoTCzr2n59tm', 'Kovács', 'Bálint', 'a688bf2a18c72d021b96dc14a44ba352', '2017-10-23 15:17:48', NULL, '2017-10-23 00:00:00', NULL, 1, '2017-10-23 14:17:48', 1, 0, 'user', '2017-10-23 14:17:48', '2017-10-23 14:17:48'),
('7af07176-bad7-491b-8a1d-047a9705fb9b', 'dorka', 'dorka@sehol.se', '$2y$10$7Qyi7YY2/C6.1qJlFmCrXOFUMRGr6QyLGpD8jEHe4xoTCzr2n59tm', 'Szabó', 'Dorka', '', '2017-10-23 15:17:48', NULL, '2017-10-23 00:00:00', NULL, 1, '2017-10-23 14:17:48', 1, 0, 'user', '2017-10-23 14:17:48', '2017-10-23 14:17:48'),
('abcaee8f-8d70-479b-a471-a984833b0f5c', 'kldd', 'kldd@krisna.hu', '$2y$10$7Qyi7YY2/C6.1qJlFmCrXOFUMRGr6QyLGpD8jEHe4xoTCzr2n59tm', 'Kundalata', 'dd', NULL, NULL, NULL, '2017-10-23 00:00:00', NULL, 1, NULL, 1, 0, 'manager', '2017-10-23 00:00:00', '2017-10-23 00:00:00'),
('fdd6d5b4-daa5-4384-af0e-250efd2137fa', 'rvd', 'rvd@krisna.hu', '$2y$10$7Qyi7YY2/C6.1qJlFmCrXOFUMRGr6QyLGpD8jEHe4xoTCzr2n59tm', 'Radha-vallabha', 'd', '', NULL, '', NULL, '', 1, NULL, 1, 0, 'manager', '2017-10-23 13:48:32', '2017-10-23 13:48:32'),
('raf07176-bad7-491b-8a1d-047a9705fb9b', 'bella', 'bella@sehol.se', '$2y$10$7Qyi7YY2/C6.1qJlFmCrXOFUMRGr6QyLGpD8jEHe4xoTCzr2n59tm', 'Fehér', 'Bella', '', '2017-10-23 15:17:48', NULL, '2017-10-23 00:00:00', NULL, 1, '2017-10-23 14:17:48', 1, 0, 'user', '2017-10-23 14:17:48', '2017-10-23 14:17:48');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_activities_departments1_idx` (`department_id`),
  ADD KEY `fk_activities_festivals1_idx` (`festival_id`);

--
-- A tábla indexei `activities_users`
--
ALTER TABLE `activities_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_people_has_activities_activities1_idx` (`activity_id`),
  ADD KEY `fk_activities_users_users1_idx` (`user_id`);

--
-- A tábla indexei `cake_d_c_users_phinxlog`
--
ALTER TABLE `cake_d_c_users_phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- A tábla indexei `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_departments_places1_idx` (`place_id`),
  ADD KEY `fk_departments_users1_idx` (`user_id`);

--
-- A tábla indexei `festivals`
--
ALTER TABLE `festivals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_festivals_places_idx` (`place_id`);

--
-- A tábla indexei `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- A tábla indexei `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `activities`
--
ALTER TABLE `activities`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT a táblához `activities_users`
--
ALTER TABLE `activities_users`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `departments`
--
ALTER TABLE `departments`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT a táblához `festivals`
--
ALTER TABLE `festivals`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT a táblához `places`
--
ALTER TABLE `places`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `fk_activities_departments1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activities_festivals1` FOREIGN KEY (`festival_id`) REFERENCES `festivals` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Megkötések a táblához `activities_users`
--
ALTER TABLE `activities_users`
  ADD CONSTRAINT `fk_activities_users_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_people_has_activities_activities1` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Megkötések a táblához `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `fk_departments_places1` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_departments_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Megkötések a táblához `festivals`
--
ALTER TABLE `festivals`
  ADD CONSTRAINT `fk_festivals_places` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Megkötések a táblához `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD CONSTRAINT `social_accounts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
