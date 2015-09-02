-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02-Set-2015 às 17:19
-- Versão do servidor: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `easypark`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `parks`
--

CREATE TABLE IF NOT EXISTS `parks` (
`id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `preco` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `parks`
--

INSERT INTO `parks` (`id`, `nome`, `descricao`, `preco`, `latitude`, `longitude`) VALUES
(1, 'MG Park', 'Estacione com segurança e amor', '2,50/H', '-19.928580', '-43.937926'),
(3, 'BH Park', 'Amor, paz, alegria', '5,60/H', '-19.926744', '-43.938043'),
(7, 'IOF MG', 'DASDSD Imprensa', '', '-19.923863', '-43.938655');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parks`
--
ALTER TABLE `parks`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parks`
--
ALTER TABLE `parks`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
