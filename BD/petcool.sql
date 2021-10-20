-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Out 03, 2012 as 03:29 
-- Versão do Servidor: 5.1.41
-- Versão do PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `petcool`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade`
--

CREATE TABLE IF NOT EXISTS `atividade` (
  `idatividade` int(11) NOT NULL AUTO_INCREMENT,
  `idtipo_acao` int(11) DEFAULT NULL,
  `data_acao` date NOT NULL,
  `hora_acao` time NOT NULL,
  `idcadastro` int(11) NOT NULL,
  PRIMARY KEY (`idatividade`),
  KEY `fk_idcadastro` (`idcadastro`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `atividade`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

CREATE TABLE IF NOT EXISTS `cadastro` (
  `idcadastro` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `senha` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `bicho` tinyint(1) NOT NULL,
  `bicho_data` date NOT NULL,
  `bicho_hora` time NOT NULL,
  `nome` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `qtd_acesso` int(4) NOT NULL,
  KEY `idcadastro` (`idcadastro`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `cadastro`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `historico_acesso`
--

CREATE TABLE IF NOT EXISTS `historico_acesso` (
  `id_hist_acess` int(11) NOT NULL AUTO_INCREMENT,
  `idcadastro` int(11) NOT NULL,
  `data_acesso` date NOT NULL,
  `hora_acesso` time NOT NULL,
  PRIMARY KEY (`id_hist_acess`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `historico_acesso`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_acao`
--

CREATE TABLE IF NOT EXISTS `tipo_acao` (
  `idtipo_acao` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`idtipo_acao`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `tipo_acao`
--

INSERT INTO `tipo_acao` (`idtipo_acao`, `descricao`) VALUES
(1, 'Comida'),
(2, 'Banho'),
(3, 'Brincar'),
(4, 'Remédio');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
