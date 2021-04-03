-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.8-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para myfinances
CREATE DATABASE IF NOT EXISTS `myfinances` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `myfinances`;

-- Copiando estrutura para tabela myfinances.movimentacao
CREATE TABLE IF NOT EXISTS `movimentacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `tipo_movimentacao` varchar(10) DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela myfinances.movimentacao: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `movimentacao` DISABLE KEYS */;
INSERT INTO `movimentacao` (`id`, `nome`, `preco`, `tipo_movimentacao`, `categoria`) VALUES
	(1, 'Milk-shake', 10.30, 'saida', 'lanches'),
	(2, 'hamburguer', 15.00, 'saida', 'lanches'),
	(4, 'coxinha', 1.00, 'saida', 'lanches'),
	(5, 'manutencao de um pc da cliente', 80.00, 'entrada', 'freelance'),
	(6, 'instacao de um sistema', 90.00, 'entrada', 'freelance'),
	(9, 'bomba', 90.00, 'saida', 'lanche'),
	(10, 'esfirra', 8.00, 'saida', 'lanche'),
	(11, 'instalei photoshop para cliente', 110.00, 'entrada', 'dinheiro extra');
/*!40000 ALTER TABLE `movimentacao` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
