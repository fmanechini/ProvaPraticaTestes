

CREATE TABLE IF NOT EXISTS `cadastro`.`Colecionador` (
  `idColecionador` INT NOT NULL AUTO_INCREMENT,
  `nome_completo` VARCHAR(100) NOT NULL,
  `idade` INT NOT NULL,
  `data_nascimento` DATE NOT NULL,
  `celular` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `CPF` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idColecionador`)
);


CREATE TABLE IF NOT EXISTS `cadastro`.`Colecionavel` (
  `idColecionavel` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  `tempo` INT NOT NULL,
  `id_colecionador` INT NOT NULL,
  `detalhes` VARCHAR(300) NOT NULL,
  `quantidade` INT NOT NULL,
  PRIMARY KEY (`idColecionavel`),
  CONSTRAINT `id_colecionador`
    FOREIGN KEY (`id_colecionador`)
    REFERENCES `cadastro`.`Colecionador` (`idColecionador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);