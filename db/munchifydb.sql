-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Már 02. 21:34
-- Kiszolgáló verziója: 10.4.27-MariaDB
-- PHP verzió: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `munchifydb`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `email_jovahagyas`
--

CREATE TABLE `email_jovahagyas` (
  `id` varchar(30) NOT NULL,
  `felhasznalonev` varchar(100) NOT NULL,
  `vezeteknev` varchar(100) NOT NULL,
  `keresztnev` varchar(100) NOT NULL,
  `jelszo` varchar(64) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mikor` datetime NOT NULL,
  `kesz` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jelszo_valtoztatas`
--

CREATE TABLE `jelszo_valtoztatas` (
  `id` varchar(30) NOT NULL,
  `email` text NOT NULL,
  `mikor` datetime NOT NULL,
  `kesz` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rendelesek`
--

CREATE TABLE `rendelesek` (
  `rendeles_id` int(6) NOT NULL COMMENT 'adott rendelés id-ja',
  `felhasznalo_id` int(5) NOT NULL COMMENT 'rendelést leadó felhasználó id-ja',
  `rendeles_tartalom` text NOT NULL COMMENT 'rendelés tartalma ;-vel elválasztva',
  `arak_teteles` text NOT NULL COMMENT 'az akkor aktuáluis árak tételesen ;-vel elválasztva',
  `rendeles_leadas` datetime NOT NULL COMMENT 'rendelés leadásának időpontja',
  `total` int(10) NOT NULL COMMENT 'rendelés végösszege'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `termekek`
--

CREATE TABLE `termekek` (
  `termek_id` int(5) NOT NULL,
  `termek_kep` varchar(70) NOT NULL COMMENT 'termék képének az elérési útvonala van eltárolva',
  `termek_ar` int(5) NOT NULL COMMENT 'termék ára',
  `termek_nev` varchar(60) NOT NULL COMMENT 'termék megnevezése',
  `termek_leiras` varchar(500) NOT NULL COMMENT 'termék leírása'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `felhasznalonev` varchar(100) NOT NULL,
  `jelszo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `vezeteknev` text NOT NULL,
  `keresztnev` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `rendelesek`
--
ALTER TABLE `rendelesek`
  ADD PRIMARY KEY (`rendeles_id`);

--
-- A tábla indexei `termekek`
--
ALTER TABLE `termekek`
  ADD PRIMARY KEY (`termek_id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `rendelesek`
--
ALTER TABLE `rendelesek`
  MODIFY `rendeles_id` int(6) NOT NULL AUTO_INCREMENT COMMENT 'adott rendelés id-ja';

--
-- AUTO_INCREMENT a táblához `termekek`
--
ALTER TABLE `termekek`
  MODIFY `termek_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
