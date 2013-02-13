SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `cedir_bd` DEFAULT CHARACTER SET utf8 ;
USE `cedir_bd` ;

-- -----------------------------------------------------
-- Table `cedir_bd`.`cliente`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cedir_bd`.`cliente` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(50) NOT NULL ,
  `sexo` CHAR(1) NULL DEFAULT NULL ,
  `data_nascimento` DATE NULL DEFAULT NULL ,
  `cpf_cnpj` INT(11) NULL DEFAULT NULL ,
  `data_hora_cadastro` TIMESTAMP NULL DEFAULT NULL ,
  `email` VARCHAR(50) NOT NULL ,
  `login` VARCHAR(30) NOT NULL ,
  `senha` VARCHAR(12) NOT NULL ,
  `tipo_pessoa` CHAR(1) NOT NULL DEFAULT 'F' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cedir_bd`.`atendimento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cedir_bd`.`atendimento` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT ,
  `cliente_id` INT(10) UNSIGNED NOT NULL ,
  `protocolo` BIGINT(20) NULL DEFAULT NULL ,
  `data_abertura` TIMESTAMP NULL DEFAULT NULL ,
  `data_finalizacao` TIMESTAMP NULL DEFAULT NULL ,
  `motivo` VARCHAR(30) NULL DEFAULT NULL ,
  `situacacao` CHAR(1) NULL DEFAULT 'A' ,
  `chamada` TEXT NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `atendimento_FKIndex1` (`cliente_id` ASC) ,
  CONSTRAINT `atendimento_ibfk_1`
    FOREIGN KEY (`cliente_id` )
    REFERENCES `cedir_bd`.`cliente` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cedir_bd`.`departamento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cedir_bd`.`departamento` (
  `id` SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `descricao` VARCHAR(50) NOT NULL ,
  `indic_habilitado` CHAR(1) NOT NULL DEFAULT 'S' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cedir_bd`.`banner`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cedir_bd`.`banner` (
  `id` SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `departamento_id` SMALLINT(5) UNSIGNED NOT NULL ,
  `path` VARCHAR(100) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `banner_FKIndex1` (`departamento_id` ASC) ,
  CONSTRAINT `banner_ibfk_1`
    FOREIGN KEY (`departamento_id` )
    REFERENCES `cedir_bd`.`departamento` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cedir_bd`.`departamento_item`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cedir_bd`.`departamento_item` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `departamento_id` SMALLINT(5) UNSIGNED NOT NULL ,
  `descricao` VARCHAR(50) NOT NULL ,
  `indic_habilitado` CHAR(1) NOT NULL DEFAULT 'S' ,
  PRIMARY KEY (`id`) ,
  INDEX `item_FKIndex1` (`departamento_id` ASC) ,
  CONSTRAINT `departamento_item_ibfk_1`
    FOREIGN KEY (`departamento_id` )
    REFERENCES `cedir_bd`.`departamento` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cedir_bd`.`endereco`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cedir_bd`.`endereco` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `cliente_id` INT(10) UNSIGNED NOT NULL ,
  `descricao` VARCHAR(30) NOT NULL ,
  `rua` VARCHAR(80) NOT NULL ,
  `numero` INT(10) UNSIGNED NULL DEFAULT NULL ,
  `complemento` VARCHAR(50) NULL DEFAULT NULL ,
  `bairro` VARCHAR(50) NULL DEFAULT NULL ,
  `cidade` VARCHAR(50) NULL DEFAULT NULL ,
  `uf` VARCHAR(2) NULL DEFAULT NULL ,
  `cep` INT(10) UNSIGNED NULL DEFAULT NULL ,
  `referencia` VARCHAR(120) NULL DEFAULT NULL ,
  `indic_principal` CHAR(1) NULL DEFAULT 'N' ,
  PRIMARY KEY (`id`) ,
  INDEX `endereco_FKIndex1` (`cliente_id` ASC) ,
  CONSTRAINT `endereco_ibfk_1`
    FOREIGN KEY (`cliente_id` )
    REFERENCES `cedir_bd`.`cliente` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cedir_bd`.`pedido`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cedir_bd`.`pedido` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT ,
  `cliente_id` INT(10) UNSIGNED NOT NULL ,
  `data_hora` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
  `total` DOUBLE(5,2) NOT NULL DEFAULT '0.00' ,
  `forma_pagamento` VARCHAR(5) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `pedido_FKIndex1` (`cliente_id` ASC) ,
  CONSTRAINT `pedido_ibfk_1`
    FOREIGN KEY (`cliente_id` )
    REFERENCES `cedir_bd`.`cliente` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cedir_bd`.`entrega`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cedir_bd`.`entrega` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT ,
  `endereco_id` INT(10) UNSIGNED NOT NULL ,
  `pedido_id` BIGINT(20) NOT NULL ,
  `data_entrega` DATE NOT NULL ,
  `valor_frete` DOUBLE(5,2) NOT NULL DEFAULT '0.00' ,
  PRIMARY KEY (`id`) ,
  INDEX `entrega_FKIndex1` (`pedido_id` ASC) ,
  INDEX `entrega_FKIndex2` (`endereco_id` ASC) ,
  CONSTRAINT `entrega_ibfk_1`
    FOREIGN KEY (`pedido_id` )
    REFERENCES `cedir_bd`.`pedido` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `entrega_ibfk_2`
    FOREIGN KEY (`endereco_id` )
    REFERENCES `cedir_bd`.`endereco` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cedir_bd`.`usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cedir_bd`.`usuario` (
  `id` SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `login` VARCHAR(30) NOT NULL ,
  `senha` VARCHAR(12) NOT NULL ,
  `tipo_usuario` CHAR(1) NOT NULL ,
  `nome` VARCHAR(50) NOT NULL ,
  `data_hora` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cedir_bd`.`log_usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cedir_bd`.`log_usuario` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT ,
  `usuario_id` SMALLINT(5) UNSIGNED NOT NULL ,
  `acao` CHAR(1) NOT NULL ,
  `entidade` VARCHAR(30) NOT NULL ,
  `data_hora` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
  PRIMARY KEY (`id`) ,
  INDEX `log_usuario_FKIndex1` (`usuario_id` ASC) ,
  CONSTRAINT `log_usuario_ibfk_1`
    FOREIGN KEY (`usuario_id` )
    REFERENCES `cedir_bd`.`usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cedir_bd`.`marca`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cedir_bd`.`marca` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `descriao` VARCHAR(30) NOT NULL ,
  `indic_habilitado` CHAR(1) NOT NULL DEFAULT 'S' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cedir_bd`.`observacao`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cedir_bd`.`observacao` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT ,
  `usuario_id` SMALLINT(5) UNSIGNED NOT NULL ,
  `atendimento_id` BIGINT(20) NOT NULL ,
  `descricao` TEXT NULL DEFAULT NULL ,
  `data_hora` TIMESTAMP NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `chamada_FKIndex1` (`atendimento_id` ASC) ,
  INDEX `observacao_FKIndex2` (`usuario_id` ASC) ,
  CONSTRAINT `observacao_ibfk_1`
    FOREIGN KEY (`atendimento_id` )
    REFERENCES `cedir_bd`.`atendimento` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `observacao_ibfk_2`
    FOREIGN KEY (`usuario_id` )
    REFERENCES `cedir_bd`.`usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cedir_bd`.`pedido_item`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cedir_bd`.`pedido_item` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT ,
  `pedido_id` BIGINT(20) NOT NULL ,
  `descricao` VARCHAR(50) NOT NULL ,
  `quantidade` SMALLINT(5) UNSIGNED NOT NULL DEFAULT '1' ,
  `valor` DOUBLE(5,2) NOT NULL DEFAULT '0.00' ,
  PRIMARY KEY (`id`) ,
  INDEX `pedido_item_FKIndex1` (`pedido_id` ASC) ,
  CONSTRAINT `pedido_item_ibfk_1`
    FOREIGN KEY (`pedido_id` )
    REFERENCES `cedir_bd`.`pedido` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cedir_bd`.`pedido_status`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cedir_bd`.`pedido_status` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `pedido_id` BIGINT(20) NOT NULL ,
  `situacao` CHAR(1) NULL DEFAULT NULL ,
  `data_hora` TIMESTAMP NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `pedido_status_FKIndex1` (`pedido_id` ASC) ,
  CONSTRAINT `pedido_status_ibfk_1`
    FOREIGN KEY (`pedido_id` )
    REFERENCES `cedir_bd`.`pedido` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cedir_bd`.`produto`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cedir_bd`.`produto` (
  `id` INT(10) UNSIGNED NOT NULL ,
  `departamento_item_id` INT(10) UNSIGNED NOT NULL ,
  `marca_id` INT(10) UNSIGNED NOT NULL ,
  `descricao` VARCHAR(50) NOT NULL ,
  `quantidade` SMALLINT(5) UNSIGNED NOT NULL DEFAULT '0' ,
  `valor` DOUBLE(5,2) NOT NULL DEFAULT '0.00' ,
  `num_venda` INT(10) UNSIGNED NULL DEFAULT '0' ,
  `indic_habilitado` CHAR(1) NULL DEFAULT 'S' ,
  PRIMARY KEY (`id`) ,
  INDEX `produto_FKIndex1` (`marca_id` ASC) ,
  INDEX `produto_FKIndex2` (`departamento_item_id` ASC) ,
  CONSTRAINT `produto_ibfk_1`
    FOREIGN KEY (`marca_id` )
    REFERENCES `cedir_bd`.`marca` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `produto_ibfk_2`
    FOREIGN KEY (`departamento_item_id` )
    REFERENCES `cedir_bd`.`departamento_item` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cedir_bd`.`produto_caracteristica`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cedir_bd`.`produto_caracteristica` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT ,
  `produto_id` INT(10) UNSIGNED NOT NULL ,
  `caracteristica` VARCHAR(30) NOT NULL ,
  `descricao` TEXT NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `produto_caracteristica_FKIndex1` (`produto_id` ASC) ,
  CONSTRAINT `produto_caracteristica_ibfk_1`
    FOREIGN KEY (`produto_id` )
    REFERENCES `cedir_bd`.`produto` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cedir_bd`.`produto_comentario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cedir_bd`.`produto_comentario` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT ,
  `cliente_id` INT(10) UNSIGNED NOT NULL ,
  `produto_id` INT(10) UNSIGNED NOT NULL ,
  `comentario` TEXT NOT NULL ,
  `data_hora` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
  `avaliacao` SMALLINT(5) UNSIGNED NOT NULL DEFAULT '0' ,
  PRIMARY KEY (`id`) ,
  INDEX `produto_comentario_FKIndex1` (`produto_id` ASC) ,
  INDEX `produto_comentario_FKIndex2` (`cliente_id` ASC) ,
  CONSTRAINT `produto_comentario_ibfk_1`
    FOREIGN KEY (`produto_id` )
    REFERENCES `cedir_bd`.`produto` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `produto_comentario_ibfk_2`
    FOREIGN KEY (`cliente_id` )
    REFERENCES `cedir_bd`.`cliente` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cedir_bd`.`produto_dimensao`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cedir_bd`.`produto_dimensao` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT ,
  `produto_id` INT(10) UNSIGNED NOT NULL ,
  `dimensao` VARCHAR(30) NULL DEFAULT NULL ,
  `descricao` VARCHAR(20) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `produto_dimensao_FKIndex1` (`produto_id` ASC) ,
  CONSTRAINT `produto_dimensao_ibfk_1`
    FOREIGN KEY (`produto_id` )
    REFERENCES `cedir_bd`.`produto` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cedir_bd`.`produto_espec_tecnica`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cedir_bd`.`produto_espec_tecnica` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT ,
  `produto_id` INT(10) UNSIGNED NOT NULL ,
  `especificacao` VARCHAR(30) NOT NULL ,
  `descricao` TEXT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `produto_espec_tecnica_FKIndex1` (`produto_id` ASC) ,
  CONSTRAINT `produto_espec_tecnica_ibfk_1`
    FOREIGN KEY (`produto_id` )
    REFERENCES `cedir_bd`.`produto` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cedir_bd`.`produto_imagem`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cedir_bd`.`produto_imagem` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT ,
  `produto_id` INT(10) UNSIGNED NOT NULL ,
  `path` VARCHAR(100) NOT NULL ,
  `indic_principal` CHAR(1) NOT NULL DEFAULT 'N' ,
  PRIMARY KEY (`id`) ,
  INDEX `produto_imagem_FKIndex1` (`produto_id` ASC) ,
  CONSTRAINT `produto_imagem_ibfk_1`
    FOREIGN KEY (`produto_id` )
    REFERENCES `cedir_bd`.`produto` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cedir_bd`.`promocao`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cedir_bd`.`promocao` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT ,
  `data_inicio` DATE NULL DEFAULT NULL ,
  `data_fim` DATE NULL DEFAULT NULL ,
  `descricao` VARCHAR(50) NULL DEFAULT NULL ,
  `tipo_promocao` CHAR(2) NULL DEFAULT 'DI' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cedir_bd`.`promocao_item`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cedir_bd`.`promocao_item` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT ,
  `departamento_id` SMALLINT(5) UNSIGNED NOT NULL ,
  `promocao_id` BIGINT(20) NOT NULL ,
  `produto_id` INT(10) UNSIGNED NOT NULL ,
  `valor` DOUBLE(5,2) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `promocao_item_FKIndex1` (`produto_id` ASC) ,
  INDEX `promocao_item_FKIndex2` (`promocao_id` ASC) ,
  INDEX `promocao_item_FKIndex3` (`departamento_id` ASC) ,
  CONSTRAINT `promocao_item_ibfk_1`
    FOREIGN KEY (`produto_id` )
    REFERENCES `cedir_bd`.`produto` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `promocao_item_ibfk_2`
    FOREIGN KEY (`promocao_id` )
    REFERENCES `cedir_bd`.`promocao` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `promocao_item_ibfk_3`
    FOREIGN KEY (`departamento_id` )
    REFERENCES `cedir_bd`.`departamento` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

USE `cedir_bd` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
