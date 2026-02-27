-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 13, 2020 alle 10:49
-- Versione del server: 10.4.11-MariaDB
-- Versione PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alternanza1`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `associazione_pt`
--

CREATE TABLE `associazione_pt` (
  `CodTutor` int(11) NOT NULL,
  `CodPeriodo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `associazione_pt`
--

INSERT INTO `associazione_pt` (`CodTutor`, `CodPeriodo`) VALUES
(21, 11),
(22, 11),
(23, 13),
(23, 15),
(24, 14),
(26, 12),
(27, 13),
(29, 12),
(29, 14),
(30, 15);

-- --------------------------------------------------------

--
-- Struttura della tabella `associazione_sd`
--

CREATE TABLE `associazione_sd` (
  `CodScuola` int(11) NOT NULL,
  `CodDocente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `associazione_sd`
--

INSERT INTO `associazione_sd` (`CodScuola`, `CodDocente`) VALUES
(11, 24),
(11, 26),
(11, 29),
(12, 27),
(12, 28),
(12, 29),
(13, 21),
(13, 25),
(13, 29),
(14, 28),
(14, 30);

-- --------------------------------------------------------

--
-- Struttura della tabella `azienda`
--

CREATE TABLE `azienda` (
  `IdAzienda` int(11) NOT NULL,
  `NomeA` varchar(30) NOT NULL,
  `Indirizzo` varchar(30) NOT NULL,
  `SitoWeb` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `azienda`
--

INSERT INTO `azienda` (`IdAzienda`, `NomeA`, `Indirizzo`, `SitoWeb`, `Email`) VALUES
(11, 'GTSistemi', 'Via Ferrara', 'www.gtsistemi.com', 'info@gtsistemi.com'),
(12, 'Cassrstech', 'Viale Europa 104', 'www.cassrs-tech.it', 'cassinf_1963@libero.it'),
(13, 'Plan Studios', 'Via A di Sangiuliano', 'www.planstudios.it', 'info@planstudios.it'),
(14, 'SFWEB - Web Agency', 'Via Josemaria Escrivà', 'www.sfweb.it', 'info@sfweb.it'),
(15, 'Multi Professional S.r.l.s.', 'VIA TOSCANA', 'www.forsecercavi.it', 'info@multi.it');

-- --------------------------------------------------------

--
-- Struttura della tabella `docente`
--

CREATE TABLE `docente` (
  `IdDocente` int(11) NOT NULL,
  `NomeD` varchar(200) NOT NULL,
  `CognomeD` varchar(200) NOT NULL,
  `Datanascita` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `docente`
--

INSERT INTO `docente` (`IdDocente`, `NomeD`, `CognomeD`, `Datanascita`) VALUES
(21, 'tqzQ6dXT2s0=', 'yaTP2ubO', 'oHyYo6GVoZmnkw=='),
(22, 'sLHI2ODG', 'saTT1dXT0d7W', 'oHyXqKGVo5mnlA=='),
(23, 'sqzP7d3G', 'vKTU1tXXzQ==', 'oHyYo6GVn5mmkw=='),
(24, 'tqzQ6dXT2s0=', 'sqTR4uLT0eDp0g==', 'oHyXqqGWnJmnkw=='),
(25, 'sLHF5dnG', 'vKTK4uDO2ts=', 'oHyYqKGVo5mnlQ=='),
(26, 'tLHT3NfU', 'uKTE4uTO2tU=', 'oHyYo6GVn5mnmA=='),
(27, 'taTD3OM=', 'vKTT593T1Q==', 'oHyYqKGVoZmmlQ=='),
(28, 'wazE1tXX0Ns=', 'tqzC1tfN0eDpzA==', 'oHyYqaGVnpmmmA=='),
(29, 'wazV1A==', 'v6jT3OLO', 'oHyYqqGVoJmnkw=='),
(30, 'tqzP4g==', 'w6jN393T1Q==', 'oHyXo6GVnpmnlA==');

-- --------------------------------------------------------

--
-- Struttura della tabella `formazione`
--

CREATE TABLE `formazione` (
  `CodStudente` int(11) NOT NULL,
  `CodPeriodo` int(11) NOT NULL,
  `Valutazione` int(11) NOT NULL,
  `Ore` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `formazione`
--

INSERT INTO `formazione` (`CodStudente`, `CodPeriodo`, `Valutazione`, `Ore`) VALUES
(33, 12, 8, 40),
(34, 13, 7, 30),
(35, 14, 7, 50),
(36, 15, 8, 60),
(37, 12, 10, 60),
(37, 14, 8, 40),
(38, 13, 8, 50),
(39, 12, 8, 50),
(39, 13, 8, 50),
(40, 11, 9, 60),
(40, 13, 7, 60),
(41, 13, 7, 40),
(42, 12, 7, 60),
(43, 13, 8, 40),
(44, 11, 8, 40),
(44, 13, 10, 60),
(45, 11, 8, 40),
(45, 15, 8, 40),
(46, 11, 8, 50),
(46, 13, 7, 50),
(47, 11, 8, 60),
(47, 15, 9, 50);

-- --------------------------------------------------------

--
-- Struttura della tabella `periodoformativo`
--

CREATE TABLE `periodoformativo` (
  `IdPeriodo` int(11) NOT NULL,
  `Descrizione` varchar(100) NOT NULL,
  `Argomento` varchar(100) NOT NULL,
  `Datainizio` varchar(50) NOT NULL,
  `Datafine` varchar(50) NOT NULL,
  `ModalitaSvolgimento` varchar(100) NOT NULL,
  `CodDocente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `periodoformativo`
--

INSERT INTO `periodoformativo` (`IdPeriodo`, `Descrizione`, `Argomento`, `Datainizio`, `Datafine`, `ModalitaSvolgimento`, `CodDocente`) VALUES
(11, 'Smart City', 'Gestione di piattaforme web mobile', '2018-06-10', '2019-05-11', 'DAD', 21),
(12, 'Red Sound', 'Fisica acustica ', '2019-04-12', '2020-07-14', 'In presenza', 26),
(13, 'Programmazione Web', 'Sistemi informatici nella protezione civile', '2018-02-14', '2019-06-17', 'In presenza', 21),
(14, 'EEE', 'Studio dei raggi cosmici', '2019-05-18', '2020-04-17', 'In presenza', 30),
(15, 'Programmazione Mobile', 'Guida', '2018-02-16', '2019-06-10', 'In presenza', 29);

-- --------------------------------------------------------

--
-- Struttura della tabella `scuola`
--

CREATE TABLE `scuola` (
  `IdScuola` int(11) NOT NULL,
  `NomeS` varchar(30) NOT NULL,
  `Via` varchar(30) NOT NULL,
  `CAP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `scuola`
--

INSERT INTO `scuola` (`IdScuola`, `NomeS`, `Via`, `CAP`) VALUES
(11, 'Ls Archimede', 'Via L. Ariosto ', 95024),
(12, 'Majorana', 'Via Paradiso ', 95024),
(13, 'Iti G. Ferraris', 'Via Trapani ', 95024),
(14, 'Lc Gulli e Pennisi', 'Via Mario Arcidiacono', 95024);

-- --------------------------------------------------------

--
-- Struttura della tabella `studenti`
--

CREATE TABLE `studenti` (
  `IdStudente` int(11) NOT NULL,
  `Nome` varchar(200) NOT NULL,
  `Cognome` varchar(200) NOT NULL,
  `Codicefiscale` varchar(200) NOT NULL,
  `Datanascita` varchar(200) NOT NULL,
  `CodScuola` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `studenti`
--

INSERT INTO `studenti` (`IdStudente`, `Nome`, `Cognome`, `Codicefiscale`, `Datanascita`, `CodScuola`) VALUES
(33, 'tqzQ6dXT2tU=', 'srLR3NU=', 'tpmvtsS0nJ3BlJasoniSzQ==', 'oXORpKGVo5mmlg==', 11),
(34, 'sKfT3NXT2w==', 'ta/Q5d3J1c0=', 'tY+zt8aznJ3HlJmsoniSxg==', 'oXORpKGWnJmmmQ==', 12),
(35, 'wqjT2t3U', 's6yBw+bO2ds=', 's5OzxsasnJ3Hk5ysoniStw==', 'oXORpKGWnJmlnA==', 14),
(36, 'wbLD2ObZ2w==', 'v6zC', 'v4yixca5nJ3Bk5esoniSuw==', 'oXORpKGVo5mllw==', 11),
(37, 'wqzO4uLK', 'sbLP3OLG', 'sZGvxsGznJ25k5qsoniSxg==', 'oXORpKGVoJmlmg==', 13),
(38, 'sK/G5ufG2tDn0g==', 'wqTT1NfO2ts=', 'wpWkv8eznJ3Fk5msoniStA==', 'oXORpKGVpZmlmQ==', 12),
(39, 'wqTN6dXZ297a', 'vKTP1unY2w==', 'vJGkxsq5nJ26lJasoniSwA==', 'oXORpKGVpJmmmw==', 14),
(40, 'tajF2ObOz9s=', 'v7XG6d3Z1Q==', 'v5W3ucaonJ25lJusoniSvg==', 'oXORpKGVoJmmmw==', 13),
(41, 'sK/H5dnJ2w==', 'tqTO6O7fzQ==', 'tpC7v8apnJ3Fk5WsoniSxg==', 'oXORpKGVpZmllQ==', 11),
(42, 's6zG2uM=', 'uKjN4g==', 'u4ymt7uunJ3Fk5ysoniSxg==', 'oXORpKGVpZmlnA==', 12),
(43, 'tqzQ5dvO2w==', 'tqTO1d3T2w==', 'tpCjusasnJ26k5qsoniSvw==', 'oXORpKGVnZmmlw==', 13),
(44, 'tqTD5d3K2NE=', 'w7XC49XT1Q==', 'w5WxusaxnJ3Bk5isoniSwg==', 'oXORpKGVo5mlmA==', 14),
(45, 'xqTN59nX', 'tqjP593R0Q==', 'tpG1ysi3nJ3ClJWsoniSuQ==', 'oXORpKGVoJmlmA==', 12),
(46, 'tbXC4dfK38/k', 'w7LT5d3Y1Q==', 'w5WzwMamnJ29k5msoniStw==', 'oXORpKGVn5mlmg==', 11),
(47, 'tbXC4dfK38/k', 'u6zE3OjXzQ==', 'j4+kx7qzr5ymq5SdsnaWpME=', 'oXORpKGVnpmllA==', 13);

-- --------------------------------------------------------

--
-- Struttura della tabella `tutor`
--

CREATE TABLE `tutor` (
  `IdTutor` int(11) NOT NULL,
  `NomeT` varchar(30) NOT NULL,
  `CognomeT` varchar(30) NOT NULL,
  `UsernameT` varchar(40) NOT NULL,
  `PasswordT` varchar(40) NOT NULL,
  `CodAzienda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `tutor`
--

INSERT INTO `tutor` (`IdTutor`, `NomeT`, `CognomeT`, `UsernameT`, `PasswordT`, `CodAzienda`) VALUES
(21, 'tqzW5tnV3NE=', 'vLjU5uM=', 'tqzW5tnV3NE=', 'tqzW5tnV3NXj0g==', 12),
(22, 'vKTT3NU=', 'sqjT5dXZ2w==', 'vKTT3NU=', 'vKTT3NnR2M0=', 13),
(23, 'sLHF5dnG', 'tajT5dnX2w==', 'sLHF5dnG', 'sLHF5dnO2ts=', 11),
(24, 'vKTT1uOF', 'xazC5dnT09s=', 'vKTT1uM=', 'vKTT1unY', 14),
(25, 'tbXC4dfK38/k', 'tazC5ufU', 'tbXC4dfK38/k', 'tbXC4dfK38/dzA==', 12),
(26, 'sK/G5ufG2tDn0g==', 'wbLU5uM=', 'sK/G5ufG2tDn0g==', 'sK/G5ufG2tDnzNs=', 11),
(27, 'tqzQ6dXT2tU=', 'tqTN3+M=', 'tqzQ6dXT2tU=', 'tqzQ6dXT2tXt', 13),
(28, 'wbLD2ObZ2w==', 'sazC4dfU', 'wbLD2ObZ2w==', 'sajV593T2w==', 14),
(29, 'u7jE1JQ=', 'waTX3OPRzQ==', 'u7jE1A==', 'u7jE293T2w==', 12),
(30, 'sLHV4uLO2w==', 'srLP590=', 'sLHV4uLO2w==', 'srLP593T2w==', 11);

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `IdUtente` int(11) NOT NULL,
  `UsernameU` varchar(100) NOT NULL,
  `PasswordU` varchar(100) NOT NULL,
  `Ruolo` varchar(100) NOT NULL,
  `CodDocente` int(11) DEFAULT NULL,
  `CodStudente` int(11) DEFAULT NULL,
  `CodTutor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`IdUtente`, `UsernameU`, `PasswordU`, `Ruolo`, `CodDocente`, `CodStudente`, `CodTutor`) VALUES
(1, 'tqzQ6dXT2s0=', 'tqzQ6dXT2s2jlJWc', 'Docente', 21, NULL, NULL),
(2, 'sLHI2ODG', 'sLHI2ODGmp6olw==', 'Docente', 22, NULL, NULL),
(3, 'sqzP7d3G', 'sqzP7d3Gmp+pmA==', 'Docente', 23, NULL, NULL),
(4, 'tqzQ6dXT2s0=', 'tqzQ6dXT2s2jl5if', 'Docente', 24, NULL, NULL),
(5, 'sLHF5dnG', 'sLHF5dnGmqGrmg==', 'Docente', 25, NULL, NULL),
(6, 'tLHT3NfU', 'tLHT3NfUmqKsmw==', 'Docente', 26, NULL, NULL),
(7, 'taTD3OM=', 'taTD3OOTo6Su', 'Docente', 27, NULL, NULL),
(8, 'wazE1tXX0Ns=', 'wazE1tXX0Nujmpui', 'Docente', 28, NULL, NULL),
(9, 'wazV1A==', 'wazV1KKdpZ2l', 'Docente', 29, NULL, NULL),
(10, 'tqzP4g==', 'tqzP4qKenZymlA==', 'Docente', 30, NULL, NULL),
(16, 'tqzQ6dXT2tU=', 'tqzQ6dXT2tXj0g==', 'Studente', NULL, 33, NULL),
(17, 'sKfT3NXT2w==', 'ta/Q5d3J1eQ=', 'Studente', NULL, 34, NULL),
(18, 'wqjT2t3U', 'vrDP3Nba3w==', 'Studente', NULL, 35, NULL),
(19, 'wbLD2ObZ2w==', 'sajV5+M=', 'Studente', NULL, 36, NULL),
(20, 'wqzO4uLK', 'sbLP3Ozf', 'Studente', NULL, 37, NULL),
(21, 'sK/G5ufG2tDn0g==', 'vrbC5dXI1do=', 'Studente', NULL, 38, NULL),
(22, 'wqTN6dXZ297a', 'vKTP1unY1Q==', 'Studente', NULL, 39, NULL),
(23, 'tajF2ObOz9s=', 'v7XK6d3Z0d7W', 'Studente', NULL, 40, NULL),
(24, 'sK/H5dnJ2w==', 'tqTO1enf5s0=', 'Studente', NULL, 41, NULL),
(25, 's6zG2uM=', 's6zG2t3d', 'Studente', NULL, 42, NULL),
(26, 'tqzQ5dvO2w==', 'tqzQ5dvO5A==', 'Studente', NULL, 43, NULL),
(28, 'xqTN59nX', 'xqTN59nX1eQ=', 'Studente', NULL, 45, NULL),
(29, 'tbXC4dfK38/k', 'tbXC4dfK4d8=', 'Studente', NULL, 46, NULL),
(30, 'tbXC4dfK38/k', 'u6zE3OjX1eQ=', 'Studente', NULL, 47, NULL),
(31, 'tqzW5tnV3NE=', 'tqzW5tnV3NXj0g==', 'Tutor', NULL, NULL, 21),
(32, 'vKTT3NU=', 'vKTT3NnR2M0=', 'Tutor', NULL, NULL, 22),
(33, 'sLHF5dnG', 'sLHF5dnO2ts=', 'Tutor', NULL, NULL, 23),
(34, 'vKTT1uM=', 'vKTT1unY', 'Tutor', NULL, NULL, 24),
(35, 'tbXC4dfK38/k', 'tbXC4dfK38/dzA==', 'Tutor', NULL, NULL, 25),
(36, 'sK/G5ufG2tDn0g==', 'sK/G5ufG2tDnzNs=', 'Tutor', NULL, NULL, 26),
(37, 'tqzQ6dXT2tU=', 'tqzQ6dXT2tXt', 'Tutor', NULL, NULL, 27),
(38, 'wbLD2ObZ2w==', 'sajV593T2w==', 'Tutor', NULL, NULL, 28),
(39, 'u7jE1A==', 'u7jE293T2w==', 'Tutor', NULL, NULL, 29),
(40, 'sLHV4uLO2w==', 'srLP593T2w==', 'Tutor', NULL, NULL, 30);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `associazione_pt`
--
ALTER TABLE `associazione_pt`
  ADD PRIMARY KEY (`CodTutor`,`CodPeriodo`),
  ADD KEY `CodPeriodo` (`CodPeriodo`);

--
-- Indici per le tabelle `associazione_sd`
--
ALTER TABLE `associazione_sd`
  ADD PRIMARY KEY (`CodScuola`,`CodDocente`),
  ADD KEY `CodDocente` (`CodDocente`);

--
-- Indici per le tabelle `azienda`
--
ALTER TABLE `azienda`
  ADD PRIMARY KEY (`IdAzienda`);

--
-- Indici per le tabelle `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`IdDocente`);

--
-- Indici per le tabelle `formazione`
--
ALTER TABLE `formazione`
  ADD PRIMARY KEY (`CodStudente`,`CodPeriodo`),
  ADD KEY `CodPeriodo` (`CodPeriodo`);

--
-- Indici per le tabelle `periodoformativo`
--
ALTER TABLE `periodoformativo`
  ADD PRIMARY KEY (`IdPeriodo`),
  ADD KEY `CodDocente` (`CodDocente`);

--
-- Indici per le tabelle `scuola`
--
ALTER TABLE `scuola`
  ADD PRIMARY KEY (`IdScuola`);

--
-- Indici per le tabelle `studenti`
--
ALTER TABLE `studenti`
  ADD PRIMARY KEY (`IdStudente`),
  ADD KEY `CodScuola` (`CodScuola`);

--
-- Indici per le tabelle `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`IdTutor`),
  ADD KEY `CodAzienda` (`CodAzienda`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`IdUtente`),
  ADD KEY `CodDocente` (`CodDocente`),
  ADD KEY `CodStudente` (`CodStudente`),
  ADD KEY `CodTutor` (`CodTutor`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `azienda`
--
ALTER TABLE `azienda`
  MODIFY `IdAzienda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT per la tabella `docente`
--
ALTER TABLE `docente`
  MODIFY `IdDocente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT per la tabella `periodoformativo`
--
ALTER TABLE `periodoformativo`
  MODIFY `IdPeriodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT per la tabella `scuola`
--
ALTER TABLE `scuola`
  MODIFY `IdScuola` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT per la tabella `studenti`
--
ALTER TABLE `studenti`
  MODIFY `IdStudente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT per la tabella `tutor`
--
ALTER TABLE `tutor`
  MODIFY `IdTutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `IdUtente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `associazione_pt`
--
ALTER TABLE `associazione_pt`
  ADD CONSTRAINT `associazione_pt_ibfk_1` FOREIGN KEY (`CodTutor`) REFERENCES `tutor` (`IdTutor`),
  ADD CONSTRAINT `associazione_pt_ibfk_2` FOREIGN KEY (`CodPeriodo`) REFERENCES `periodoformativo` (`IdPeriodo`);

--
-- Limiti per la tabella `associazione_sd`
--
ALTER TABLE `associazione_sd`
  ADD CONSTRAINT `associazione_sd_ibfk_1` FOREIGN KEY (`CodScuola`) REFERENCES `scuola` (`IdScuola`),
  ADD CONSTRAINT `associazione_sd_ibfk_2` FOREIGN KEY (`CodDocente`) REFERENCES `docente` (`IdDocente`),
  ADD CONSTRAINT `associazione_sd_ibfk_3` FOREIGN KEY (`CodDocente`) REFERENCES `docente` (`IdDocente`);

--
-- Limiti per la tabella `formazione`
--
ALTER TABLE `formazione`
  ADD CONSTRAINT `formazione_ibfk_2` FOREIGN KEY (`CodPeriodo`) REFERENCES `periodoformativo` (`IdPeriodo`),
  ADD CONSTRAINT `formazione_ibfk_3` FOREIGN KEY (`CodPeriodo`) REFERENCES `periodoformativo` (`IdPeriodo`),
  ADD CONSTRAINT `formazione_ibfk_4` FOREIGN KEY (`CodStudente`) REFERENCES `studenti` (`IdStudente`);

--
-- Limiti per la tabella `periodoformativo`
--
ALTER TABLE `periodoformativo`
  ADD CONSTRAINT `periodoformativo_ibfk_1` FOREIGN KEY (`CodDocente`) REFERENCES `docente` (`IdDocente`),
  ADD CONSTRAINT `periodoformativo_ibfk_2` FOREIGN KEY (`CodDocente`) REFERENCES `docente` (`IdDocente`),
  ADD CONSTRAINT `periodoformativo_ibfk_3` FOREIGN KEY (`CodDocente`) REFERENCES `docente` (`IdDocente`);

--
-- Limiti per la tabella `studenti`
--
ALTER TABLE `studenti`
  ADD CONSTRAINT `studenti_ibfk_1` FOREIGN KEY (`CodScuola`) REFERENCES `scuola` (`IdScuola`);

--
-- Limiti per la tabella `tutor`
--
ALTER TABLE `tutor`
  ADD CONSTRAINT `tutor_ibfk_1` FOREIGN KEY (`CodAzienda`) REFERENCES `azienda` (`IdAzienda`);

--
-- Limiti per la tabella `utenti`
--
ALTER TABLE `utenti`
  ADD CONSTRAINT `utenti_ibfk_1` FOREIGN KEY (`CodDocente`) REFERENCES `docente` (`IdDocente`),
  ADD CONSTRAINT `utenti_ibfk_2` FOREIGN KEY (`CodStudente`) REFERENCES `studenti` (`IdStudente`),
  ADD CONSTRAINT `utenti_ibfk_3` FOREIGN KEY (`CodTutor`) REFERENCES `tutor` (`IdTutor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
