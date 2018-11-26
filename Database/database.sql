-- --------------------------------------------------------
-- Servidor:                     146.148.98.114
-- Versão do servidor:           5.5.62-0ubuntu0.14.04.1 - (Ubuntu)
-- OS do Servidor:               debian-linux-gnu
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para code
CREATE DATABASE IF NOT EXISTS `code` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `code`;

-- Copiando estrutura para tabela code.cod_categoria
CREATE TABLE IF NOT EXISTS `cod_categoria` (
  `cdcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nmcategoria` varchar(50) NOT NULL,
  `fgativo` enum('1','0','9') NOT NULL,
  PRIMARY KEY (`cdcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela code.cod_categoria: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `cod_categoria` DISABLE KEYS */;
INSERT INTO `cod_categoria` (`cdcategoria`, `nmcategoria`, `fgativo`) VALUES
	(1, 'Automotivo', '1'),
	(9, 'Eletrônicos', '1'),
	(10, 'Ferramentas', '1');
/*!40000 ALTER TABLE `cod_categoria` ENABLE KEYS */;

-- Copiando estrutura para tabela code.cod_produto
CREATE TABLE IF NOT EXISTS `cod_produto` (
  `cdproduto` int(11) NOT NULL AUTO_INCREMENT,
  `nmproduto` varchar(50) NOT NULL,
  `cdcategoria` int(11) NOT NULL,
  `fgativo` enum('1','0','9') NOT NULL,
  PRIMARY KEY (`cdproduto`),
  KEY `cdcategoria` (`cdcategoria`),
  CONSTRAINT `cdcategoria` FOREIGN KEY (`cdcategoria`) REFERENCES `cod_categoria` (`cdcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela code.cod_produto: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `cod_produto` DISABLE KEYS */;
INSERT INTO `cod_produto` (`cdproduto`, `nmproduto`, `cdcategoria`, `fgativo`) VALUES
	(1, 'Pneu', 1, '1'),
	(2, 'Roda', 1, '0'),
	(9, 'Celular', 9, '1'),
	(10, 'Martelo', 10, '1'),
	(11, 'Alicate', 10, '1');
/*!40000 ALTER TABLE `cod_produto` ENABLE KEYS */;

-- Copiando estrutura para tabela code.cod_usuario
CREATE TABLE IF NOT EXISTS `cod_usuario` (
  `cdusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nmusuario` varchar(50) NOT NULL,
  `nmlogin` varchar(15) NOT NULL,
  `nmsenha` varchar(50) NOT NULL,
  `fgativo` enum('1','0','9') NOT NULL,
  PRIMARY KEY (`cdusuario`),
  UNIQUE KEY `nmlogin` (`nmlogin`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela code.cod_usuario: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `cod_usuario` DISABLE KEYS */;
INSERT INTO `cod_usuario` (`cdusuario`, `nmusuario`, `nmlogin`, `nmsenha`, `fgativo`) VALUES
	(4, 'Gustavo Pistore', 'gustavo', 'd37a0463f17e98062bc9e46b7ce8a75b', '1'),
	(5, 'Rodrigo Rossa', 'rodrigo', 'd37a0463f17e98062bc9e46b7ce8a75b', '1');
/*!40000 ALTER TABLE `cod_usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
