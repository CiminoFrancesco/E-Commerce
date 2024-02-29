-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versione server:              10.4.28-MariaDB - mariadb.org binary distribution
-- S.O. server:                  Win64
-- HeidiSQL Versione:            12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dump della struttura del database ordini
CREATE DATABASE IF NOT EXISTS `ordini` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `ordini`;

-- Dump della struttura di tabella ordini.clienti
CREATE TABLE IF NOT EXISTS `clienti` (
  `cliente_id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `cap` varchar(10) DEFAULT NULL,
  `citta` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cliente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella ordini.clienti: ~10 rows (circa)
INSERT INTO `clienti` (`cliente_id`, `nome`, `cognome`, `cap`, `citta`) VALUES
	(1, 'Mario', 'Rossi', '00123', 'Roma'),
	(2, 'Anna', 'Bianchi', '20145', 'Milano'),
	(3, 'Luigi', 'Verdi', '40132', 'Bologna'),
	(4, 'Elena', 'Neri', '10100', 'Torino'),
	(5, 'Giovanni', 'Gialli', '30100', 'Venezia'),
	(6, 'Laura', 'Marroni', '50123', 'Firenze'),
	(7, 'Roberto', 'Blu', '60145', 'Milano'),
	(8, 'Francesca', 'Arancioni', '70132', 'Milano'),
	(9, 'Paolo', 'Rosa', '80100', 'Bologna'),
	(10, 'Giulia', 'Viola', '90100', 'Parma');

-- Dump della struttura di tabella ordini.ordini
CREATE TABLE IF NOT EXISTS `ordini` (
  `numero_ordine` char(3) NOT NULL,
  `data_ordine` date NOT NULL,
  `codice_cliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`numero_ordine`),
  KEY `codice_cliente` (`codice_cliente`),
  CONSTRAINT `ordini_ibfk_1` FOREIGN KEY (`codice_cliente`) REFERENCES `clienti` (`cliente_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella ordini.ordini: ~6 rows (circa)
INSERT INTO `ordini` (`numero_ordine`, `data_ordine`, `codice_cliente`) VALUES
	('001', '2023-01-10', 1),
	('002', '2023-02-15', 3),
	('003', '2023-03-20', 5),
	('004', '2023-04-25', 2),
	('005', '2023-05-30', 4),
	('006', '2023-06-05', 3);

-- Dump della struttura di tabella ordini.righe_ordine
CREATE TABLE IF NOT EXISTS `righe_ordine` (
  `riga_id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_ordine` char(3) DEFAULT NULL,
  `descrizione_articolo` varchar(100) NOT NULL,
  `quantita` int(11) NOT NULL,
  `prezzo_unitario` decimal(10,2) NOT NULL,
  PRIMARY KEY (`riga_id`),
  KEY `numero_ordine` (`numero_ordine`),
  CONSTRAINT `righe_ordine_ibfk_1` FOREIGN KEY (`numero_ordine`) REFERENCES `ordini` (`numero_ordine`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella ordini.righe_ordine: ~23 rows (circa)
INSERT INTO `righe_ordine` (`riga_id`, `numero_ordine`, `descrizione_articolo`, `quantita`, `prezzo_unitario`) VALUES
	(1, '001', 'Pasta', 2, 2.99),
	(2, '001', 'Olio Extra Vergine di Oliva', 1, 9.99),
	(3, '001', 'Pomodori in Scatola', 3, 1.99),
	(4, '001', 'Parmigiano Reggiano', 5, 5.99),
	(5, '001', 'Prosciutto Crudo', 4, 7.99),
	(6, '002', 'Riso Arborio', 3, 3.99),
	(7, '002', 'Sugo di Pomodoro', 2, 1.49),
	(8, '002', 'Formaggio Grattugiato', 1, 4.99),
	(9, '002', 'Melanzane', 4, 2.99),
	(10, '002', 'Mozzarella di Bufala', 6, 6.99),
	(11, '003', 'Pane integrale', 2, 1.99),
	(12, '003', 'Salame', 3, 8.99),
	(13, '003', 'Formaggio Cheddar', 1, 6.49),
	(14, '003', 'Insalata', 4, 2.49),
	(15, '003', 'Salmone Affumicato', 5, 12.99),
	(16, '004', 'Spaghetti', 2, 2.49),
	(17, '004', 'Salsa Alfredo', 3, 3.99),
	(18, '004', 'Pollo Grigliato', 1, 7.99),
	(19, '004', 'Insalata Cesare', 4, 4.49),
	(20, '004', 'Tiramisù', 2, 5.99),
	(21, '005', 'Prosciutto crudo intero', 1, 180.00),
	(22, '005', 'Parmigiano Reggiano', 1, 16.50),
	(23, '006', 'Mozzarella di Bufala', 1, 6.00),
	(24, '006', 'Prosciutto Crudo', 2, 6.50);

-- Dump della struttura di tabella ordini.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_type` enum('admin','user') DEFAULT 'user',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- Dump dei dati della tabella ordini.users: ~2 rows (circa)
INSERT INTO `users` (`id`, `username`, `password`, `account_type`) VALUES
	(3, 'Carlo', '1234567890', 'admin'),
	(4, 'Luigi', 'abcdef', 'user');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
