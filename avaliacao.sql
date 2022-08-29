-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 29-Ago-2022 às 17:16
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `avaliacao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `fabricante_categoria`
--

DROP TABLE IF EXISTS `fabricante_categoria`;
CREATE TABLE IF NOT EXISTS `fabricante_categoria` (
  `ID_FC` int(11) NOT NULL AUTO_INCREMENT,
  `Nome_F` varchar(50) NOT NULL,
  `Nome_C1` varchar(20) NOT NULL,
  `Nome_C2` varchar(20) NOT NULL,
  `Nome_C3` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_FC`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fabricante_categoria`
--

INSERT INTO `fabricante_categoria` (`ID_FC`, `Nome_F`, `Nome_C1`, `Nome_C2`, `Nome_C3`) VALUES
(1, 'Nestle', 'Achocolatado', 'Cafe', 'Cereais'),
(2, 'Coca-Cola', 'Refrigerantes', 'Sucos', 'Agua');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `ID_P` int(11) NOT NULL AUTO_INCREMENT,
  `Nome_P` varchar(50) NOT NULL,
  `Nome_F` varchar(50) NOT NULL,
  `Categoria` varchar(30) NOT NULL,
  `Preco` int(11) NOT NULL,
  `ID_FC` int(11) NOT NULL,
  PRIMARY KEY (`ID_P`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`ID_P`, `Nome_P`, `Nome_F`, `Categoria`, `Preco`, `ID_FC`) VALUES
(3, 'Coca-Cola', 'Coca-Cola', 'Refrigerantes', 10, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
