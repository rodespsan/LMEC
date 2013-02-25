SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `LMEC` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `LMEC` ;

-- -----------------------------------------------------
-- Table `LMEC`.`tbl_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_user` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_user` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `user` VARCHAR(20) NOT NULL ,
  `password` VARCHAR(35) NOT NULL ,
  `name` VARCHAR(100) NOT NULL ,
  `last_name` VARCHAR(100) NOT NULL ,
  `email` VARCHAR(100) NOT NULL ,
  `active` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_role` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_role` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `role` VARCHAR(45) NOT NULL ,
  `active` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_order_status`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_order_status` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_order_status` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `state` VARCHAR(45) NOT NULL ,
  `active` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_equipment_type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_equipment_type` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_equipment_type` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `type` VARCHAR(45) NOT NULL ,
  `active` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_model`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_model` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_model` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `equipment_type_id` INT UNSIGNED NOT NULL ,
  `model` VARCHAR(200) NOT NULL ,
  `active` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_tbl_model_tbl_equipment_type` (`equipment_type_id` ASC) ,
  CONSTRAINT `fk_tbl_model_tbl_equipment_type`
    FOREIGN KEY (`equipment_type_id` )
    REFERENCES `LMEC`.`tbl_equipment_type` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_brand`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_brand` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_brand` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `model_id` INT UNSIGNED NOT NULL ,
  `brand` VARCHAR(100) NOT NULL ,
  `active` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_tbl_brand_tbl_model` (`model_id` ASC) ,
  CONSTRAINT `fk_tbl_brand_tbl_model`
    FOREIGN KEY (`model_id` )
    REFERENCES `LMEC`.`tbl_model` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_customer_type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_customer_type` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_customer_type` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `type` VARCHAR(45) NOT NULL ,
  `active` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_contact`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_contact` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_contact` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  `email` VARCHAR(100) NOT NULL ,
  `cell_phone_number` VARCHAR(15) NULL ,
  `telephone_number_house` VARCHAR(15) NULL ,
  `telephone_number_office` VARCHAR(15) NULL ,
  `extension_office` VARCHAR(5) NULL ,
  `active` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_customer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_customer` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_customer` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `customer_type_id` INT UNSIGNED NOT NULL ,
  `contact_id` INT UNSIGNED NOT NULL ,
  `address` VARCHAR(200) NULL ,
  `active` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_tbl_customer_tbl_customer_type` (`customer_type_id` ASC) ,
  INDEX `fk_tbl_customer_tbl_contact` (`contact_id` ASC) ,
  CONSTRAINT `fk_tbl_customer_tbl_customer_type`
    FOREIGN KEY (`customer_type_id` )
    REFERENCES `LMEC`.`tbl_customer_type` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_customer_tbl_contact`
    FOREIGN KEY (`contact_id` )
    REFERENCES `LMEC`.`tbl_contact` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_dependence`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_dependence` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_dependence` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `customer_id` INT UNSIGNED NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `address` VARCHAR(45) NOT NULL ,
  `telephone_number` VARCHAR(15) NOT NULL ,
  `active` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_tbl_dependence_tbl_customer` (`customer_id` ASC) ,
  CONSTRAINT `fk_tbl_dependence_tbl_customer`
    FOREIGN KEY (`customer_id` )
    REFERENCES `LMEC`.`tbl_customer` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_payment_type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_payment_type` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_payment_type` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `type` VARCHAR(45) NOT NULL ,
  `active` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_service_type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_service_type` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_service_type` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `type` VARCHAR(500) NOT NULL ,
  `active` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_order`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_order` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_order` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `customer_id` INT UNSIGNED NOT NULL ,
  `receptionist_user_id` INT UNSIGNED NOT NULL ,
  `payment_type_id` INT UNSIGNED NOT NULL ,
  `model_id` INT UNSIGNED NOT NULL ,
  `service_type_id` INT UNSIGNED NOT NULL ,
  `date_hour` DATETIME NOT NULL ,
  `advance_payment` DECIMAL(7,2) NULL ,
  `serial_number` VARCHAR(45) NULL ,
  `stock_number` VARCHAR(45) NULL ,
  `name_deliverer _equipment` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_tbl_orden_tbl_customer` (`customer_id` ASC) ,
  INDEX `fk_tbl_orden_tbl_payment_type` (`payment_type_id` ASC) ,
  INDEX `fk_tbl_orden_tbl_user` (`receptionist_user_id` ASC) ,
  INDEX `fk_tbl_orden_tbl_service_type` (`service_type_id` ASC) ,
  INDEX `fk_tbl_orden_tbl_model` (`model_id` ASC) ,
  CONSTRAINT `fk_tbl_orden_tbl_customer`
    FOREIGN KEY (`customer_id` )
    REFERENCES `LMEC`.`tbl_customer` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_orden_tbl_payment_type`
    FOREIGN KEY (`payment_type_id` )
    REFERENCES `LMEC`.`tbl_payment_type` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_orden_tbl_user`
    FOREIGN KEY (`receptionist_user_id` )
    REFERENCES `LMEC`.`tbl_user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_orden_tbl_service_type`
    FOREIGN KEY (`service_type_id` )
    REFERENCES `LMEC`.`tbl_service_type` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_orden_tbl_model`
    FOREIGN KEY (`model_id` )
    REFERENCES `LMEC`.`tbl_model` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_service`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_service` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_service` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `service_type_id` INT UNSIGNED NOT NULL ,
  `name` VARCHAR(500) NOT NULL ,
  `price` DECIMAL(7,2) NOT NULL ,
  `active` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_tbl_service_tbl_service_type` (`service_type_id` ASC) ,
  CONSTRAINT `fk_tbl_service_tbl_service_type`
    FOREIGN KEY (`service_type_id` )
    REFERENCES `LMEC`.`tbl_service_type` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_blog_status_order`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_blog_status_order` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_blog_status_order` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `order_id` INT UNSIGNED NOT NULL ,
  `order_status_id` INT UNSIGNED NOT NULL ,
  `user_who_assigned_id` INT UNSIGNED NOT NULL ,
  `user_assigned_id` INT UNSIGNED NOT NULL ,
  `date_hour` DATETIME NOT NULL ,
  `duration` DATETIME NOT NULL ,
  INDEX `fk_tbl_blog_status_order_tbl_order` (`order_id` ASC) ,
  INDEX `fk_tbl_blog_status_order_tbl_status_order` (`order_status_id` ASC) ,
  INDEX `fk_tbl_blog_status_order_tbl_user1` (`user_who_assigned_id` ASC) ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_tbl_blog_status_order_tbl_user2` (`user_assigned_id` ASC) ,
  CONSTRAINT `fk_tbl_blog_status_order_tbl_order`
    FOREIGN KEY (`order_id` )
    REFERENCES `LMEC`.`tbl_order` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_blog_status_order_tbl_status_order`
    FOREIGN KEY (`order_status_id` )
    REFERENCES `LMEC`.`tbl_order_status` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_blog_status_order_tbl_user1`
    FOREIGN KEY (`user_who_assigned_id` )
    REFERENCES `LMEC`.`tbl_user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_blog_status_order_tbl_user2`
    FOREIGN KEY (`user_assigned_id` )
    REFERENCES `LMEC`.`tbl_user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_service_order`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_service_order` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_service_order` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `order_id` INT UNSIGNED NOT NULL ,
  `service_id` INT UNSIGNED NOT NULL ,
  `price` DECIMAL(7,2) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_tbl_servicio_orden_tbl_orden` (`order_id` ASC) ,
  INDEX `fk_tbl_servicio_orden_tbl_servicio` (`service_id` ASC) ,
  CONSTRAINT `fk_tbl_service_order_tbl_order`
    FOREIGN KEY (`order_id` )
    REFERENCES `LMEC`.`tbl_order` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_service_order_tbl_service`
    FOREIGN KEY (`service_id` )
    REFERENCES `LMEC`.`tbl_service` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
PACK_KEYS = 1;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_provider`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_provider` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_provider` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `provider_name` VARCHAR(45) NOT NULL ,
  `contact_name` VARCHAR(45) NOT NULL ,
  `contact_email` VARCHAR(45) NULL ,
  `contact_telephone_number` VARCHAR(15) NULL ,
  `address` VARCHAR(45) NULL ,
  `active` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_spare_parts_status`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_spare_parts_status` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_spare_parts_status` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `description` VARCHAR(200) NOT NULL ,
  `active` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_spare_parts`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_spare_parts` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_spare_parts` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `brand_id` INT UNSIGNED NOT NULL ,
  `spare_parts_status_id` INT UNSIGNED NOT NULL ,
  `provider_id` INT UNSIGNED NOT NULL ,
  `name_spare` VARCHAR(100) NOT NULL ,
  `serial_number` VARCHAR(50) NULL ,
  `price` DECIMAL(7,2) NOT NULL ,
  `date_hour` DATE NOT NULL ,
  `guarantee_period` DATE NULL ,
  `invoice_number` INT NULL ,
  `description` VARCHAR(500) NULL ,
  `active` TINYINT(1) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_tbl_spare_parts_tbl_spare_parts_status` (`spare_parts_status_id` ASC) ,
  INDEX `fk_tbl_spare_parts_tbl_brand` (`brand_id` ASC) ,
  INDEX `fk_tbl_spare_parts_tbl_provider` (`provider_id` ASC) ,
  CONSTRAINT `fk_tbl_spare_parts_tbl_spare_parts_status`
    FOREIGN KEY (`spare_parts_status_id` )
    REFERENCES `LMEC`.`tbl_spare_parts_status` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_spare_parts_tbl_brand`
    FOREIGN KEY (`brand_id` )
    REFERENCES `LMEC`.`tbl_brand` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_spare_parts_tbl_provider`
    FOREIGN KEY (`provider_id` )
    REFERENCES `LMEC`.`tbl_provider` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_final_status`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_final_status` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_final_status` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `status` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_failure_description`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_failure_description` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_failure_description` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `order_id` INT UNSIGNED NOT NULL ,
  `description` TEXT NOT NULL ,
  INDEX `fk_tbl_failure_description_tbl_order` (`order_id` ASC) ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_tbl_failure_description_tbl_order`
    FOREIGN KEY (`order_id` )
    REFERENCES `LMEC`.`tbl_order` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_diagnostic`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_diagnostic` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_diagnostic` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `order_id` INT UNSIGNED NOT NULL ,
  `user_id` INT UNSIGNED NOT NULL ,
  `service_type_id` INT UNSIGNED NOT NULL ,
  `date_hour` DATETIME NOT NULL ,
  `observation` TEXT NULL ,
  INDEX `fk_tbl_diagnostic_tbl_order` (`order_id` ASC) ,
  INDEX `fk_tbl_diagnostico_tbl_user` (`user_id` ASC) ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_tbl_diagnostic_tbl_service_type` (`service_type_id` ASC) ,
  CONSTRAINT `fk_tbl_diagnostic_tbl_order`
    FOREIGN KEY (`order_id` )
    REFERENCES `LMEC`.`tbl_order` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_diagnostic_tbl_user`
    FOREIGN KEY (`user_id` )
    REFERENCES `LMEC`.`tbl_user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_diagnostic_tbl_service_type`
    FOREIGN KEY (`service_type_id` )
    REFERENCES `LMEC`.`tbl_service_type` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_repair`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_repair` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_repair` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `order_id` INT UNSIGNED NOT NULL ,
  `description` TEXT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_tbl_reparacion_tbl_orden` (`order_id` ASC) ,
  CONSTRAINT `fk_tbl_repair_tbl_order`
    FOREIGN KEY (`order_id` )
    REFERENCES `LMEC`.`tbl_order` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_accesory`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_accesory` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_accesory` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  `active` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_equipment_type_accesory`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_equipment_type_accesory` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_equipment_type_accesory` (
  `equipment_type_id` INT UNSIGNED NOT NULL ,
  `accesory_id` INT UNSIGNED NOT NULL ,
  INDEX `fk_tbl_equipment_type_accesory_tbl_accesory` (`accesory_id` ASC) ,
  INDEX `fk_tbl_tipo_equipo_accesorio_tbl_tipo_equipo` (`equipment_type_id` ASC) ,
  CONSTRAINT `fk_tbl_equipment_type_accesory_tbl_equipment_type`
    FOREIGN KEY (`equipment_type_id` )
    REFERENCES `LMEC`.`tbl_equipment_type` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_equipment_type_accesory_tbl_accesory`
    FOREIGN KEY (`accesory_id` )
    REFERENCES `LMEC`.`tbl_accesory` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_accesory_order`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_accesory_order` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_accesory_order` (
  `order_id` INT UNSIGNED NOT NULL ,
  `accesory_id` INT UNSIGNED NOT NULL ,
  INDEX `fk_tbl_accesory_order_tbl_accesory` (`accesory_id` ASC) ,
  INDEX `fk_tbl_accesorio_orden_tbl_orden` (`order_id` ASC) ,
  CONSTRAINT `fk_tbl_accesory_order_tbl_order`
    FOREIGN KEY (`order_id` )
    REFERENCES `LMEC`.`tbl_order` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_accesory_order_tbl_accesory`
    FOREIGN KEY (`accesory_id` )
    REFERENCES `LMEC`.`tbl_accesory` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_equipment_status`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_equipment_status` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_equipment_status` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `order_id` INT UNSIGNED NOT NULL ,
  `description` TEXT NULL ,
  INDEX `fk_tbl_equipment_status_tbl_order` (`order_id` ASC) ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_tbl_equipment_status_tbl_order`
    FOREIGN KEY (`order_id` )
    REFERENCES `LMEC`.`tbl_order` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_out_order`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_out_order` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_out_order` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `order_id` INT UNSIGNED NOT NULL ,
  `user_id` INT UNSIGNED NOT NULL ,
  `date_hour` DATETIME NOT NULL ,
  `date_hour_print` DATETIME NOT NULL ,
  `total_price` DECIMAL(7,2) NOT NULL ,
  `name_receive_equipment` VARCHAR(100) NOT NULL ,
  INDEX `fk_tbl_out_order_tbl_order` (`order_id` ASC) ,
  INDEX `fk_tbl_out_order_tbl_user` (`user_id` ASC) ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_tbl_out_order_tbl_order`
    FOREIGN KEY (`order_id` )
    REFERENCES `LMEC`.`tbl_order` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_out_order_tbl_user`
    FOREIGN KEY (`user_id` )
    REFERENCES `LMEC`.`tbl_user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_final_status_order`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_final_status_order` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_final_status_order` (
  `order_id` INT UNSIGNED NOT NULL ,
  `final_status_id` INT UNSIGNED NOT NULL ,
  INDEX `fk_tbl_final_status_order_tbl_order` (`order_id` ASC) ,
  INDEX `fk_tbl_final_status_order_tbl_final_status` (`final_status_id` ASC) ,
  CONSTRAINT `fk_tbl_final_status_order_tbl_order`
    FOREIGN KEY (`order_id` )
    REFERENCES `LMEC`.`tbl_order` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_final_status_order_tbl_final_status`
    FOREIGN KEY (`final_status_id` )
    REFERENCES `LMEC`.`tbl_final_status` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_observation_order`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_observation_order` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_observation_order` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `order_id` INT UNSIGNED NOT NULL ,
  `observation` TEXT NULL ,
  INDEX `fk_tbl_observation_order_tbl_order` (`order_id` ASC) ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_tbl_observation_order_tbl_order`
    FOREIGN KEY (`order_id` )
    REFERENCES `LMEC`.`tbl_order` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_service_performed_order`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_service_performed_order` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_service_performed_order` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `order_id` INT UNSIGNED NOT NULL ,
  `service_id` INT UNSIGNED NOT NULL ,
  `price` DECIMAL(7,2) NOT NULL ,
  INDEX `fk_tbl_service_performed_order_tbl_order` (`order_id` ASC) ,
  INDEX `fk_tbl_service_performed_order_tbl_service` (`service_id` ASC) ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_tbl_service_performed_order_tbl_order`
    FOREIGN KEY (`order_id` )
    REFERENCES `LMEC`.`tbl_order` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_service_performed_order_tbl_service`
    FOREIGN KEY (`service_id` )
    REFERENCES `LMEC`.`tbl_service` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_spare_parts_order`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_spare_parts_order` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_spare_parts_order` (
  `order_id` INT UNSIGNED NOT NULL ,
  `spare_parts_id` INT UNSIGNED NOT NULL ,
  INDEX `fk_tbl_spare_parts_order_tbl_order` (`order_id` ASC) ,
  INDEX `fk_tbl_spare_parts_order_tbl_spare` (`spare_parts_id` ASC) ,
  CONSTRAINT `fk_tbl_spare_parts_order_tbl_order`
    FOREIGN KEY (`order_id` )
    REFERENCES `LMEC`.`tbl_order` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_spare_parts_order_tbl_spare`
    FOREIGN KEY (`spare_parts_id` )
    REFERENCES `LMEC`.`tbl_spare_parts` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_work`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_work` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_work` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `service_type_id` INT UNSIGNED NOT NULL ,
  `name_work` VARCHAR(200) NOT NULL ,
  `description` VARCHAR(500) NOT NULL ,
  `active` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_tbl_trabajo_tbl_tipo_servicio` (`service_type_id` ASC) ,
  CONSTRAINT `fk_tbl_work_tbl_service_type`
    FOREIGN KEY (`service_type_id` )
    REFERENCES `LMEC`.`tbl_service_type` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_work_order`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_work_order` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_work_order` (
  `order_id` INT UNSIGNED NOT NULL ,
  `work_id` INT UNSIGNED NOT NULL ,
  INDEX `fk_tbl_work_order_tbl_order` (`order_id` ASC) ,
  INDEX `fk_tbl_work_order_tbl_work` (`work_id` ASC) ,
  CONSTRAINT `fk_tbl_work_order_tbl_order`
    FOREIGN KEY (`order_id` )
    REFERENCES `LMEC`.`tbl_order` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_work_order_tbl_work`
    FOREIGN KEY (`work_id` )
    REFERENCES `LMEC`.`tbl_work` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_activity_guarantee`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_activity_guarantee` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_activity_guarantee` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `description` TEXT NOT NULL ,
  `active` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_technical_order`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_technical_order` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_technical_order` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `order_id` INT UNSIGNED NOT NULL ,
  `user_id` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_tbl_technical_order_tbl_order` (`order_id` ASC) ,
  INDEX `fk_tbl_technical_order_tbl_user` (`user_id` ASC) ,
  CONSTRAINT `fk_tbl_technical_order_tbl_order`
    FOREIGN KEY (`order_id` )
    REFERENCES `LMEC`.`tbl_order` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_technical_order_tbl_user`
    FOREIGN KEY (`user_id` )
    REFERENCES `LMEC`.`tbl_user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_blog_guarantee`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_blog_guarantee` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_blog_guarantee` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `order_id` INT UNSIGNED NOT NULL ,
  `activity_guarantee_id` INT UNSIGNED NOT NULL ,
  `technician_user__id` INT UNSIGNED NOT NULL ,
  `date_hour` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_tbl_blog_guarantee_tbl_order` (`order_id` ASC) ,
  INDEX `fk_tbl_blog_guarantee_tbl_activity_guarantee` (`activity_guarantee_id` ASC) ,
  INDEX `fk_tbl_blog_guarantee_tbl_user` (`technician_user__id` ASC) ,
  CONSTRAINT `fk_tbl_blog_guarantee_tbl_order`
    FOREIGN KEY (`order_id` )
    REFERENCES `LMEC`.`tbl_order` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_blog_guarantee_tbl_activity_guarantee`
    FOREIGN KEY (`activity_guarantee_id` )
    REFERENCES `LMEC`.`tbl_activity_guarantee` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_blog_guarantee_tbl_user`
    FOREIGN KEY (`technician_user__id` )
    REFERENCES `LMEC`.`tbl_user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_repair_work`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_repair_work` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_repair_work` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `work_id` INT UNSIGNED NOT NULL ,
  `user_id` INT UNSIGNED NOT NULL ,
  `repair_id` INT UNSIGNED NOT NULL ,
  `date_hour` DATETIME NOT NULL ,
  INDEX `fk_tbl_repair_work_tbl_work` (`work_id` ASC) ,
  INDEX `fk_tbl_repair_work_tbl_user` (`user_id` ASC) ,
  INDEX `fk_tbl_repair_work_tbl_repair` (`repair_id` ASC) ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_tbl_repair_work_tbl_work`
    FOREIGN KEY (`work_id` )
    REFERENCES `LMEC`.`tbl_work` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_repair_work_tbl_user`
    FOREIGN KEY (`user_id` )
    REFERENCES `LMEC`.`tbl_user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_repair_work_tbl_repair`
    FOREIGN KEY (`repair_id` )
    REFERENCES `LMEC`.`tbl_repair` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_activity_verification`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_activity_verification` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_activity_verification` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `service_type_id` INT UNSIGNED NOT NULL ,
  `activity` VARCHAR(100) NOT NULL ,
  `description` VARCHAR(500) NULL ,
  `active` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_tbl_activity_verification_tbl_sevice_type` (`service_type_id` ASC) ,
  CONSTRAINT `fk_tbl_activity_verification_tbl_sevice_type`
    FOREIGN KEY (`service_type_id` )
    REFERENCES `LMEC`.`tbl_service_type` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_activity_verification_order`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_activity_verification_order` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_activity_verification_order` (
  `order_id` INT UNSIGNED NOT NULL ,
  `activity_verification_id` INT UNSIGNED NOT NULL ,
  INDEX `fk_activity_verification_order_tbl_order` (`order_id` ASC) ,
  INDEX `fk_activity_verification_order_tbl_activity_verification` (`activity_verification_id` ASC) ,
  CONSTRAINT `fk_activity_verification_order_tbl_order`
    FOREIGN KEY (`order_id` )
    REFERENCES `LMEC`.`tbl_order` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_activity_verification_order_tbl_activity_verification`
    FOREIGN KEY (`activity_verification_id` )
    REFERENCES `LMEC`.`tbl_activity_verification` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_activity_spare_parts`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_activity_spare_parts` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_activity_spare_parts` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `activity` VARCHAR(200) NOT NULL ,
  `active` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_blog_spare`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_blog_spare` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_blog_spare` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `orden_id` INT UNSIGNED NOT NULL ,
  `activity_spare_parts_id` INT UNSIGNED NOT NULL ,
  `user_id` INT UNSIGNED NOT NULL ,
  `date_hour` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_tbl_blog_spare_tbl_order` (`orden_id` ASC) ,
  INDEX `fk_tbl_blog_spare_tbl_activity_spare_parts` (`activity_spare_parts_id` ASC) ,
  INDEX `fk_tbl_blog_spare_tbl_user` (`user_id` ASC) ,
  CONSTRAINT `fk_tbl_blog_spare_tbl_order`
    FOREIGN KEY (`orden_id` )
    REFERENCES `LMEC`.`tbl_order` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_blog_spare_tbl_activity_spare_parts`
    FOREIGN KEY (`activity_spare_parts_id` )
    REFERENCES `LMEC`.`tbl_activity_spare_parts` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_blog_spare_tbl_user`
    FOREIGN KEY (`user_id` )
    REFERENCES `LMEC`.`tbl_user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_quotation_order`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_quotation_order` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_quotation_order` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `order_id` INT UNSIGNED NOT NULL ,
  `quotation_text` TEXT NOT NULL ,
  `total_price` DECIMAL(7,2) NOT NULL ,
  `data_hour` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_tbl_quotation_order_tbl_order` (`order_id` ASC) ,
  CONSTRAINT `fk_tbl_quotation_order_tbl_order`
    FOREIGN KEY (`order_id` )
    REFERENCES `LMEC`.`tbl_order` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_quotation`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_quotation` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_quotation` (
  `id` INT NOT NULL ,
  `text` TEXT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_quotation_spare`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_quotation_spare` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_quotation_spare` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `quotation_order_id` INT UNSIGNED NOT NULL ,
  `name_spare` VARCHAR(100) NOT NULL ,
  `price` DECIMAL(7,2) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_tbl_quotation_spare_tbl_quotation_order` (`quotation_order_id` ASC) ,
  CONSTRAINT `fk_tbl_quotation_spare_tbl_quotation_order`
    FOREIGN KEY (`quotation_order_id` )
    REFERENCES `LMEC`.`tbl_quotation_order` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_quotation_service`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_quotation_service` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_quotation_service` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `quotation_order_id` INT UNSIGNED NOT NULL ,
  `service_id` INT UNSIGNED NOT NULL ,
  `price` DECIMAL(7,2) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_tbl_tbl_quotation_service_tbl_quotation_order` (`quotation_order_id` ASC) ,
  INDEX `fk_tbl_tbl_quotation_service_tbl_service` (`service_id` ASC) ,
  CONSTRAINT `fk_tbl_tbl_quotation_service_tbl_quotation_order`
    FOREIGN KEY (`quotation_order_id` )
    REFERENCES `LMEC`.`tbl_quotation_order` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_tbl_quotation_service_tbl_service`
    FOREIGN KEY (`service_id` )
    REFERENCES `LMEC`.`tbl_service` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_blog_order`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_blog_order` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_blog_order` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `order_id` INT UNSIGNED NOT NULL ,
  `activity_guarantee_id` INT UNSIGNED NOT NULL ,
  `user_technical_id` INT UNSIGNED NOT NULL ,
  `date_hour` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_tbl_blog_order_tbl_order` (`order_id` ASC) ,
  INDEX `fk_tbl_blog_order_tbl_activity_guarantee` (`activity_guarantee_id` ASC) ,
  INDEX `fk_tbl_blog_order_tbl_user` (`user_technical_id` ASC) ,
  CONSTRAINT `fk_tbl_blog_order_tbl_order`
    FOREIGN KEY (`order_id` )
    REFERENCES `LMEC`.`tbl_order` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_blog_order_tbl_activity_guarantee`
    FOREIGN KEY (`activity_guarantee_id` )
    REFERENCES `LMEC`.`tbl_activity_guarantee` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_blog_order_tbl_user`
    FOREIGN KEY (`user_technical_id` )
    REFERENCES `LMEC`.`tbl_user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_user_role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_user_role` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_user_role` (
  `user_id` INT UNSIGNED NOT NULL ,
  `role_id` INT UNSIGNED NOT NULL ,
  INDEX `fk_tbl_user_role_tbl_user` (`user_id` ASC) ,
  INDEX `fk_tbl_user_role_tbl_role` (`role_id` ASC) ,
  CONSTRAINT `fk_tbl_user_role_tbl_user`
    FOREIGN KEY (`user_id` )
    REFERENCES `LMEC`.`tbl_user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_user_role_tbl_role`
    FOREIGN KEY (`role_id` )
    REFERENCES `LMEC`.`tbl_role` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LMEC`.`tbl_customer_contact`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LMEC`.`tbl_customer_contact` ;

CREATE  TABLE IF NOT EXISTS `LMEC`.`tbl_customer_contact` (
  `customer_id` INT UNSIGNED NOT NULL ,
  `contact_id` INT UNSIGNED NOT NULL ,
  `active` TINYINT(1) NOT NULL ,
  INDEX `fk_tbl_customer_contact_tbl_customer` (`customer_id` ASC) ,
  INDEX `fk_tbl_customer_contact_tbl_contact` (`contact_id` ASC) ,
  CONSTRAINT `fk_tbl_customer_contact_tbl_customer`
    FOREIGN KEY (`customer_id` )
    REFERENCES `LMEC`.`tbl_customer` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_customer_contact_tbl_contact`
    FOREIGN KEY (`contact_id` )
    REFERENCES `LMEC`.`tbl_contact` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
