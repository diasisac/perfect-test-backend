/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : perfectpay

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-06-18 14:35:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `clientes`
-- ----------------------------
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of clientes
-- ----------------------------

-- ----------------------------
-- Table structure for `produtos`
-- ----------------------------
DROP TABLE IF EXISTS `produtos`;
CREATE TABLE `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `preco` float(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of produtos
-- ----------------------------

-- ----------------------------
-- Table structure for `vendas`
-- ----------------------------
DROP TABLE IF EXISTS `vendas`;
CREATE TABLE `vendas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_venda` date DEFAULT NULL,
  `quantidade_produto` int(10) DEFAULT NULL,
  `desconto` int(10) DEFAULT NULL,
  `status_venda` varchar(255) DEFAULT NULL,
  `fk_produto` int(11) DEFAULT NULL,
  `fk_cliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_produto` (`fk_produto`),
  KEY `fk_cliente` (`fk_cliente`),
  CONSTRAINT `fk_cliente` FOREIGN KEY (`fk_cliente`) REFERENCES `clientes` (`id`),
  CONSTRAINT `fk_produto` FOREIGN KEY (`fk_produto`) REFERENCES `produtos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of vendas
-- ----------------------------

-- ----------------------------
-- View structure for `clientess`
-- ----------------------------
DROP VIEW IF EXISTS `clientess`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `clientess` AS select `p`.`nome` AS `nome`,`v`.`data_venda` AS `data_venda`,`p`.`preco` AS `preco`,`v`.`status_venda` AS `status_venda`,`v`.`quantidade_produto` AS `quantidade_produto` from ((`vendas` `v` join `produtos` `p`) join `clientes` `c`) where `v`.`fk_produto` = `p`.`id` and `c`.`id` = `v`.`fk_cliente` and `v`.`fk_cliente` = 1 ;
