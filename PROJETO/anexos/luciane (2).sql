-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 18/04/2012 às 20h58min
-- Versão do Servidor: 5.5.16
-- Versão do PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `luciane`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `assunto_msg`
--

CREATE TABLE IF NOT EXISTS `assunto_msg` (
  `id_assunto` int(11) NOT NULL AUTO_INCREMENT,
  `assunto` varchar(300) NOT NULL,
  PRIMARY KEY (`id_assunto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `assunto_msg`
--

INSERT INTO `assunto_msg` (`id_assunto`, `assunto`) VALUES
(1, 'Troca uma idéia'),
(2, 'Críticas =['),
(3, 'Dúvida');

-- --------------------------------------------------------

--
-- Estrutura da tabela `material_users`
--

CREATE TABLE IF NOT EXISTS `material_users` (
  `id_material` int(11) NOT NULL AUTO_INCREMENT,
  `nome_user_material` varchar(200) NOT NULL,
  `email_user_material` varchar(200) NOT NULL,
  `frase` varchar(500) NOT NULL,
  `data_material` datetime NOT NULL,
  PRIMARY KEY (`id_material`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE IF NOT EXISTS `mensagens` (
  `id_mensagem` int(11) NOT NULL AUTO_INCREMENT,
  `mensagem` text NOT NULL,
  `nome_user_msg` varchar(200) NOT NULL,
  `email_user_msg` varchar(300) NOT NULL,
  `assunto_msg` varchar(300) NOT NULL,
  `data_msg` datetime NOT NULL,
  PRIMARY KEY (`id_mensagem`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `mensagens`
--

INSERT INTO `mensagens` (`id_mensagem`, `mensagem`, `nome_user_msg`, `email_user_msg`, `assunto_msg`, `data_msg`) VALUES
(10, 'sdf', 'sdf', 'sdf', 'Dï¿½vida', '2012-04-18 19:55:07'),
(11, 'dasd', 'dsad', 'asd', 'Crï¿½ticas =[', '2012-04-18 19:57:55'),
(12, 'dffd', 'sadsad', 'dsa@dss.com', 'Dï¿½vida', '2012-04-18 19:58:32'),
(13, 'fds', 'qds', 'fdsf', 'Crï¿½ticas =[', '2012-04-18 20:02:28'),
(14, 'fdsdf', 'dasdas', 'dsada@das.com', 'Troca uma idï¿½ia', '2012-04-18 20:03:25'),
(15, 'Bom dia, nÃ³s da empresa corp e saude queriamos propor uma parceria de vida e amor entre nos, o corpo seria difundir um email par que posamos concatenar nossas ideias ok? eh tudo muito sobreo etc nos queremo s te te amar muitoa e te dar carinho para um futuro. Sem mais para o momento. Cevalinho da mamae', 'Daniel de Faria Pedro', 'mahaskate@gmail.com', 'Troca uma idï¿½ia', '2012-04-18 20:20:14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `foto_post` varchar(1000) NOT NULL,
  `data_post` datetime NOT NULL,
  PRIMARY KEY (`id_post`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id_post`, `foto_post`, `data_post`) VALUES
(25, 'http://dl.dropbox.com/u/51158120/PZ/patricinhasezumbisUntitled-122.jpg', '2012-04-18 00:43:34'),
(28, 'http://dl.dropbox.com/u/51158120/PZ/patricinhasezumbisUntitled-3.jpg', '2012-04-18 00:47:55'),
(29, 'http://dl.dropbox.com/u/51158120/PZ/patricinhasezumbisteste2.jpg', '2012-04-18 00:48:03'),
(30, 'http://dl.dropbox.com/u/51158120/PZ/patricinhasezumbisUntitled-4.jpg', '2012-04-18 00:48:10');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
