-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Maio-2019 às 02:12
-- Versão do servidor: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `integracao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `ID` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `LIVRO` varchar(64) NOT NULL,
  `AUTOR` varchar(32) NOT NULL,
  `EDITORA` varchar(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


-- --------------------------------------------------------



CREATE TABLE `tb_emprestimo` (
  `ID` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `LIVRO_EMPRESTADO` varchar(64) NOT NULL,
  `NOME_PESSOA` varchar(32) NOT NULL,
  `ENDERECO` varchar(64) NOT NULL,
  `TELEFONE` char(15) NOT NULL,
  `EMAIL` varchar(64) NOT NULL,
  `DATA` datetime NOT NULL,
  `ativo` char(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_emprestimo`
--
