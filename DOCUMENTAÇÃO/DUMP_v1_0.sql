-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Jan-2023 às 23:35
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dropshippingproducts`
--
CREATE DATABASE IF NOT EXISTS `dropshippingproducts` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dropshippingproducts`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id_Fornecedor` int(10) NOT NULL,
  `nome_vendedor` varchar(75) NOT NULL,
  `email_vendedor` varchar(90) NOT NULL,
  `cnpj` varchar(50) NOT NULL,
  `razao_social` varchar(45) NOT NULL,
  `nome_fantasia` varchar(45) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `celular_vendedor` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id_Fornecedor`, `nome_vendedor`, `email_vendedor`, `cnpj`, `razao_social`, `nome_fantasia`, `telefone`, `celular_vendedor`) VALUES
(1, 'Guilherme Duarte Cenzi Dias', 'guilhermedcdias.2022@gmail.com', '1000000000000', 'Guilherme Comunicação', 'Guilherme Comunicação', '12974077685', '12974077685'),
(2, 'Adriana Daniel Duarte Dias', 'acontateste4512@gmail.com', '20000000000000', 'Marco Comunicação', 'MC', '12991714000', '1232097161'),
(3, 'Luiz Henrique Cenzi Dias', 'lucineiapereira@gmail.com', '300000000000000000000', 'Luci Pereira', 'DS Digital', '12998789987', '1232096969'),
(4, 'Ana clara Marques Portes', 'aclaramcpv@gmail.com', '33235100003', 'AC Consulltoria', 'AC Consultoria', '12985653254', '1236569887'),
(5, 'Júlio de Mesquita Filho', 'acontateste4512@gmail.com', '45454501110001', 'Julio Mequista', 'JM Modas', '1298745632', '1236632541'),
(6, 'Marcelo Junior', 'MarceloJunior@gmail.com', '122236500013', 'Marcelo Junior Limitada', 'Marcelo Faz Tudo', '1296547896', '1236502555'),
(7, 'Mirella Torres Quirino', 'Mirella.torres2005@gmail.com', '30023409800013', 'Mirella Torres Marketing Digital', 'MT Digital', '12987678876', '1232096565'),
(8, 'Marcelly Durães', 'MarcellyD@gmail.com', '23424200013', 'MD Designer', 'MD Unhas', '1298998765', '1232065478'),
(9, 'Marcello Rosa', 'acontateste4512@gmail.com', '96336985200013', 'Marcelo Rosa Ltda', 'Marcelo Rosa', '1298563214', '1233098565'),
(10, 'Maria Ferreira', 'lucineiapereira@gmail.com', '122369852000136', 'MF Modas', 'MF Modas', '12098758989', '1236065598'),
(11, 'Marta Garcia', 'Marta@gmail.com', '2302122501440001', 'Marta Modas', 'Luxie Modas', '1299875678', '1236529878'),
(12, 'Rafaela Torres Santos', 'acontateste4512@gmail.com', '63696500012', 'RM Modas', 'RM Modas', '1298745698', '1236587985'),
(19, 'Luiz Henrique Cenzi Dias', 'lhcenzi@gmail.com', '1222365200012', 'LH Limitada', 'LH Limitada', '1299856523448', '12336698525'),
(20, 'Caroline Faria', 'carol@gmail.com', '1233668800012', 'Caroline Modas', 'Carol Modas', '1233698563', '12666325548'),
(21, 'Ivan Garcia', 'acontateste4512@gmail.com', '233330200012', 'Ivan Alfaiataria', 'Luxo Alfaiate', '129985632254', '1233669985'),
(22, 'Roberto Carlos', 'roberto@gmail.com', '12222000312', 'Roberto Bar', 'Roberto Bar', '12996632541', '123366984255');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_Produto` int(11) NOT NULL,
  `id_Fornecedor` int(10) NOT NULL,
  `nome_produto` varchar(95) NOT NULL,
  `peso` float NOT NULL,
  `quantidade_estoque` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_Produto`, `id_Fornecedor`, `nome_produto`, `peso`, `quantidade_estoque`) VALUES
(1, 21, 'Arroz', 52, 10),
(2, 3, 'Feijão', 12, 25),
(3, 3, 'Tomate', 2.5, 10),
(4, 1, 'Feijão', 10, 80),
(5, 7, 'Leite Condensado', 0.2, 30),
(6, 19, 'Leite', 1, 50),
(7, 22, 'Cerveja', 2, 60),
(8, 1, 'Notebook', 6, 80),
(9, 7, 'Banner', 0.001, 90),
(10, 10, 'Calça', 0.003, 50),
(11, 1, 'Folha Sufite', 2, 50),
(12, 9, 'Bala', 0.5, 85),
(13, 8, 'Unha de Fibra de Vidro', 0.001, 60),
(14, 20, 'Sapato', 3, 50),
(15, 6, 'Martelo', 1, 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id_Fornecedor`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_Produto`),
  ADD KEY `fk_fornecedor_id` (`id_Fornecedor`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id_Fornecedor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_Produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_fornecedor_id` FOREIGN KEY (`id_Fornecedor`) REFERENCES `fornecedor` (`id_Fornecedor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
