-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2024 at 11:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calendario`
--

-- --------------------------------------------------------

--
-- Table structure for table `evento`
--

CREATE TABLE `evento` (
  `ID` int(11) NOT NULL,
  `titolo` varchar(40) DEFAULT NULL,
  `descrizione` text DEFAULT NULL,
  `creatore` int(11) DEFAULT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evento`
--

INSERT INTO `evento` (`ID`, `titolo`, `descrizione`, `creatore`, `data`) VALUES
(5, 'Fare la Spesa', 'Comprare: uova, latte, pane.', 3, '2024-05-03'),
(6, 'TestEvento', 'Aggiungere evento tramite pagina php', 4, '1999-02-12'),
(10, 'test2', 'Test aggiungi tramite nome utente', 3, '2024-05-01'),
(13, 'TestAgg', 'test aggiunzione', 4, '2024-05-01'),
(14, 'TestNuovoUtente', 'Aggiungi a nuovo utente creato tramite php', 6, '2024-05-01'),
(16, 'Fare ramen', 'Io e ale facciamo ramen', 6, '2024-05-02'),
(17, 'Aggiunto dopo login', 'Creazione di un evento senza specificare l\'utente. Usando le informazioni di login', 3, '2024-05-03'),
(18, 'Test Aggiunzione dopo login 2', 'Secondo test di questo tipo', 6, '2024-05-03'),
(20, 'Check', 'Controllo dove vengo reindirizzato dopo aver aggiunto un evento', 3, '2024-05-05'),
(60, 'TestIndietro', 'Controllo se dopo la creazione di un evento mi riporta indietro', 4, '2024-05-05'),
(62, '15 e 18 quanto fa?', 'Non fa 36', 3, '2020-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `utente`
--

CREATE TABLE `utente` (
  `ID` int(11) NOT NULL,
  `nome` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utente`
--

INSERT INTO `utente` (`ID`, `nome`, `password`) VALUES
(3, 'Ale', '1234'),
(4, 'user', '1234'),
(6, 'Laurita', '1234'),
(8, 'user2', '1000'),
(14, '', '0'),
(19, 'TestNonInteri', '0'),
(20, 'TestUtentePassStringa', 'Cicciogamer89');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `Evento_fk0` (`creatore`);

--
-- Indexes for table `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evento`
--
ALTER TABLE `evento`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `utente`
--
ALTER TABLE `utente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `Evento_fk0` FOREIGN KEY (`creatore`) REFERENCES `utente` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
