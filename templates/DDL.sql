CREATE TABLE `cadastro`.`cliente` 
  ( 
     `id`               INT(11) NOT NULL auto_increment PRIMARY KEY, 
     `nome`             VARCHAR(255), 
     `tipo`             VARCHAR(255), 
     `tempo`            VARCHAR(255), 
     `id_colecionador`  VARCHAR(255), 
     `detalhes`         VARCHAR(255), 
     `quantidade`       VARCHAR(255)
  ) 
engine = innodb 