-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2015 at 10:05 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lmec`
--
CREATE DATABASE IF NOT EXISTS `lmec` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `lmec`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accesory`
--

CREATE TABLE IF NOT EXISTS `tbl_accesory` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accesory_order`
--

CREATE TABLE IF NOT EXISTS `tbl_accesory_order` (
  `order_id` int(10) unsigned NOT NULL,
  `accesory_id` int(10) unsigned NOT NULL,
  KEY `fk_tbl_accesory_order_tbl_order_idx` (`order_id`),
  KEY `fk_tbl_accesory_order_tbl_accesory_idx` (`accesory_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activity_guarantee`
--

CREATE TABLE IF NOT EXISTS `tbl_activity_guarantee` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activity_spare_parts`
--

CREATE TABLE IF NOT EXISTS `tbl_activity_spare_parts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activity_verification`
--

CREATE TABLE IF NOT EXISTS `tbl_activity_verification` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `service_type_id` int(10) unsigned NOT NULL,
  `equipment_type_id` int(10) unsigned NOT NULL,
  `activity` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_tbl_activity_verification_tbl_sevice_type_idx` (`service_type_id`),
  KEY `fk_tbl_activity_verification_tbl_equipment_type_idx` (`equipment_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activity_verification_order`
--

CREATE TABLE IF NOT EXISTS `tbl_activity_verification_order` (
  `order_id` int(10) unsigned NOT NULL,
  `activity_verification_id` int(10) unsigned NOT NULL,
  KEY `fk_activity_verification_order_tbl_order_idx` (`order_id`),
  KEY `fk_activity_verification_order_tbl_activity_verification_idx` (`activity_verification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_advance_payment`
--

CREATE TABLE IF NOT EXISTS `tbl_advance_payment` (
  `price` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog_guarantee`
--

CREATE TABLE IF NOT EXISTS `tbl_blog_guarantee` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `activity_guarantee_id` int(10) unsigned NOT NULL,
  `technician_user_id` int(10) unsigned NOT NULL,
  `date_hour` datetime NOT NULL,
  `observation` text COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_tbl_blog_guarantee_tbl_order_idx` (`order_id`),
  KEY `fk_tbl_blog_guarantee_tbl_activity_guarantee_idx` (`activity_guarantee_id`),
  KEY `fk_tbl_blog_guarantee_tbl_user_idx` (`technician_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog_order`
--

CREATE TABLE IF NOT EXISTS `tbl_blog_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `activity` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `detailed_activity` text COLLATE utf8_unicode_ci,
  `user_technical_id` int(10) unsigned NOT NULL,
  `date_hour` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_blog_order_tbl_order_idx` (`order_id`),
  KEY `fk_tbl_blog_order_tbl_user_idx` (`user_technical_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog_spare`
--

CREATE TABLE IF NOT EXISTS `tbl_blog_spare` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `orden_id` int(10) unsigned NOT NULL,
  `activity_spare_parts_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `date_hour` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_blog_spare_tbl_order_idx` (`orden_id`),
  KEY `fk_tbl_blog_spare_tbl_activity_spare_parts_idx` (`activity_spare_parts_id`),
  KEY `fk_tbl_blog_spare_tbl_user_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog_status_order`
--

CREATE TABLE IF NOT EXISTS `tbl_blog_status_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `status_order_id` int(10) unsigned NOT NULL,
  `user_who_assigned_id` int(10) unsigned NOT NULL,
  `user_assigned_id` int(10) unsigned NOT NULL,
  `date_hour` datetime NOT NULL,
  `duration` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_blog_status_order_tbl_order_idx` (`order_id`),
  KEY `fk_tbl_blog_status_order_tbl_status_order_idx` (`status_order_id`),
  KEY `fk_tbl_blog_status_order_tbl_user1_idx` (`user_who_assigned_id`),
  KEY `fk_tbl_blog_status_order_tbl_user2_idx` (`user_assigned_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE IF NOT EXISTS `tbl_brand` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE IF NOT EXISTS `tbl_contact` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cell_phone_number` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone_number_house` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone_number_office` varchar(35) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extension_office` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_customer_id` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_type_id` int(10) unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dependence_id` int(10) unsigned DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_tbl_customer_tbl_customer_type_idx` (`customer_type_id`),
  KEY `fk_tbl_customer_tbl_dependence_idx` (`dependence_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_type`
--

CREATE TABLE IF NOT EXISTS `tbl_customer_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_customer_type`
--

INSERT INTO `tbl_customer_type` (`id`, `type`, `active`) VALUES
(1, 'Interno', 1),
(2, 'Semi-Interno', 1),
(3, 'Externo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dependence`
--

CREATE TABLE IF NOT EXISTS `tbl_dependence` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `telephone_number` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `extension` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diagnostic`
--

CREATE TABLE IF NOT EXISTS `tbl_diagnostic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `service_type_id` int(10) unsigned NOT NULL,
  `date_hour` datetime NOT NULL,
  `observation` text COLLATE utf8_unicode_ci,
  `finished` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `refection` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_tbl_diagnostic_tbl_order_idx` (`order_id`),
  KEY `fk_tbl_diagnostic_tbl_user_idx` (`user_id`),
  KEY `fk_tbl_diagnostic_tbl_service_type_idx` (`service_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diagnostic_work`
--

CREATE TABLE IF NOT EXISTS `tbl_diagnostic_work` (
  `diagnostic_id` int(10) unsigned NOT NULL,
  `work_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`diagnostic_id`,`work_id`),
  UNIQUE KEY `diagnostic_id` (`diagnostic_id`),
  KEY `work_id` (`work_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_equipment_status`
--

CREATE TABLE IF NOT EXISTS `tbl_equipment_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_equipment_status_tbl_order_idx` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_equipment_type`
--

CREATE TABLE IF NOT EXISTS `tbl_equipment_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_equipment_type_accesory`
--

CREATE TABLE IF NOT EXISTS `tbl_equipment_type_accesory` (
  `equipment_type_id` int(10) unsigned NOT NULL,
  `accesory_id` int(10) unsigned NOT NULL,
  KEY `fk_tbl_equipment_type_accesory_tbl_equipment_type` (`equipment_type_id`),
  KEY `fk_tbl_equipment_type_accesory_tbl_accesory_idx` (`accesory_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_failure_description`
--

CREATE TABLE IF NOT EXISTS `tbl_failure_description` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_failure_description_tbl_order_idx` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_final_status`
--

CREATE TABLE IF NOT EXISTS `tbl_final_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_final_status_order`
--

CREATE TABLE IF NOT EXISTS `tbl_final_status_order` (
  `order_id` int(10) unsigned NOT NULL,
  `final_status_id` int(10) unsigned NOT NULL,
  KEY `fk_tbl_final_status_order_tbl_order_idx` (`order_id`),
  KEY `fk_tbl_final_status_order_tbl_final_status_idx` (`final_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_model`
--

CREATE TABLE IF NOT EXISTS `tbl_model` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `equipment_type_id` int(10) unsigned NOT NULL,
  `brand_id` int(10) unsigned NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_tbl_model_tbl_equipment_type_idx` (`equipment_type_id`),
  KEY `fk_tbl_model_tbl_brand_idx` (`brand_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_observation_order`
--

CREATE TABLE IF NOT EXISTS `tbl_observation_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `observation` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_observation_order_tbl_order_idx` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE IF NOT EXISTS `tbl_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned NOT NULL,
  `contact_id` int(10) unsigned NOT NULL,
  `receptionist_user_id` int(10) unsigned NOT NULL,
  `service_type_id` int(10) unsigned NOT NULL,
  `payment_type_id` int(10) unsigned NOT NULL,
  `model_id` int(10) unsigned NOT NULL,
  `date_hour` datetime NOT NULL,
  `advance_payment` decimal(8,2) DEFAULT NULL,
  `serial_number` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stock_number` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_deliverer_equipment` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `technician_order_id` int(10) unsigned DEFAULT NULL,
  `status_order_id` int(10) unsigned NOT NULL DEFAULT '1',
  `observation` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_order_tbl_customer_idx` (`customer_id`),
  KEY `fk_tbl_orden_tbl_contact_idx` (`contact_id`),
  KEY `fk_tbl_orden_tbl_user_idx` (`receptionist_user_id`),
  KEY `fk_tbl_orden_tbl_service_type_idx` (`service_type_id`),
  KEY `fk_tbl_orden_tbl_payment_type_idx` (`payment_type_id`),
  KEY `fk_tbl_order_tbl_model_idx` (`model_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_out_order`
--

CREATE TABLE IF NOT EXISTS `tbl_out_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `contact_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `date_hour` datetime NOT NULL,
  `date_hour_print` datetime DEFAULT NULL,
  `total_price` decimal(7,2) NOT NULL,
  `name_receive_equipment` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_id` (`order_id`),
  KEY `fk_tbl_out_order_tbl_order_idx` (`order_id`),
  KEY `fk_tbl_out_order_tbl_user_idx` (`user_id`),
  KEY `contact_id` (`contact_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_type`
--

CREATE TABLE IF NOT EXISTS `tbl_payment_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `advance_payment` decimal(8,2) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_payment_type`
--

INSERT INTO `tbl_payment_type` (`id`, `name`, `advance_payment`, `active`) VALUES
(1, 'Interno', '0.00', 1),
(2, 'Semi-Interno', '0.00', 1),
(3, 'Externo', '100.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_provider`
--

CREATE TABLE IF NOT EXISTS `tbl_provider` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `contact_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `contact_email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_telephone_number` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quotation`
--

CREATE TABLE IF NOT EXISTS `tbl_quotation` (
  `id` int(11) NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quotation_order`
--

CREATE TABLE IF NOT EXISTS `tbl_quotation_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `quotation_text` text COLLATE utf8_unicode_ci NOT NULL,
  `total_price` decimal(7,2) NOT NULL,
  `data_hour` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_quotation_order_tbl_order_idx` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quotation_service`
--

CREATE TABLE IF NOT EXISTS `tbl_quotation_service` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quotation_order_id` int(10) unsigned NOT NULL,
  `service_id` int(10) unsigned NOT NULL,
  `price` decimal(7,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_tbl_quotation_service_tbl_quotation_order_idx` (`quotation_order_id`),
  KEY `fk_tbl_tbl_quotation_service_tbl_service_idx` (`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quotation_spare_parts`
--

CREATE TABLE IF NOT EXISTS `tbl_quotation_spare_parts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quotation_order_id` int(10) unsigned NOT NULL,
  `name_spare_parts` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(7,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_quotation_spare_parts_tbl_quotation_order_idx` (`quotation_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_repair`
--

CREATE TABLE IF NOT EXISTS `tbl_repair` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `finished` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_tbl_repair_tbl_order_idx` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_repair_work`
--

CREATE TABLE IF NOT EXISTS `tbl_repair_work` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `work_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `repair_id` int(10) unsigned NOT NULL,
  `date_hour` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_repair_work_tbl_work_idx` (`work_id`),
  KEY `fk_tbl_repair_work_tbl_user_idx` (`user_id`),
  KEY `fk_tbl_repair_work_tbl_repair_idx` (`repair_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE IF NOT EXISTS `tbl_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `url_initial` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `name`, `url_initial`, `priority`, `active`) VALUES
(1, 'administrador', 'user/admin', 100, 1),
(2, 'Tecnico', 'user/tecnico', 50, 1),
(3, 'Recepcionista', 'order/admin', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE IF NOT EXISTS `tbl_service` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `service_type_id` int(10) unsigned NOT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_tbl_service_tbl_service_type_idx` (`service_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=37 ;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`id`, `code`, `service_type_id`, `name`, `price`, `active`) VALUES
(1, '1', 1, 'Servicio Preventivo', '50.00', 1),
(2, '2', 2, 'Servicio Correctivo', '100.00', 1),
(3, '3', 1, 'Servicio de diagnóstico a PC', '150.00', 1),
(4, '4', 1, 'Servicio de diagnóstico de regulador', '50.00', 1),
(5, '5', 1, 'Servicio de diagnóstico de no break', '100.00', 1),
(6, '6', 1, 'Servicio de diagnóstico monitor', '150.00', 1),
(7, '7', 1, 'Servicio de diagnóstico impresora láser de color', '300.00', 1),
(8, '8', 1, 'Servicio de diagnóstico impresora multifuncional láser/inyección', '180.00', 1),
(9, '9', 1, 'Servicio de diagnóstico impresora laser/inyección de escritorio', '180.00', 1),
(10, '10', 1, 'Servicio de diagnóstico de impresora laser de trabajo pesado', '200.00', 1),
(11, '11', 1, 'Servicio de diagnóstico a laptop', '250.00', 1),
(12, '12', 1, 'Servicio de diagnóstico disco duro', '100.00', 1),
(13, '13', 1, 'Servicio de mantenimiento de teclado', '50.00', 1),
(14, '14', 1, 'Servicio de mantenimiento a PC', '200.00', 1),
(15, '15', 1, 'Servicio de mantenimiento de laptop', '300.00', 1),
(16, '16', 1, 'Servicio de mantenimiento de impresora láser de color', '350.00', 1),
(17, '17', 1, 'Servicio de mantenimiento de multifuncional láser/inyección', '300.00', 1),
(18, '18', 1, 'Servicio de mantenimiento de impresora de inyección de tinta profesional', '250.00', 1),
(19, '19', 1, 'Servicio de mantenimiento de impresora de inyección de tinta personal', '200.00', 1),
(20, '20', 1, 'Servicio de mantenimiento de impresora láser de trabajo pesado', '300.00', 1),
(21, '21', 1, 'Servicio de mantenimiento de impresora láser de escritorio', '250.00', 1),
(22, '22', 1, 'Servicio de respaldo de información', '250.00', 1),
(23, '23', 2, 'Servicio de eliminación de virus', '50.00', 1),
(24, '24', 2, 'Servicio de reparación de datos', '450.00', 1),
(25, '25', 2, 'Servicio de resoldado para chip de video', '800.00', 1),
(26, '26', 2, 'Servicio de reparación de regulador hasta de 1200 volts', '100.00', 1),
(27, '27', 2, 'Servicio de reparación a PC', '250.00', 1),
(28, '28', 2, 'Servicio de reparación de no-break', '170.00', 1),
(29, '29', 2, 'Servicio de reparación de monitor', '300.00', 1),
(30, '30', 2, 'Servicio de reparación de laptop', '350.00', 1),
(31, '31', 2, 'Servicio de reparación de multifuncional láser/inyección', '300.00', 1),
(32, '32', 2, 'Servicio de reparación de impresora de inyección de tinta profesional', '300.00', 1),
(33, '33', 2, 'Servicio de reparación de impresora de inyección de tinta personal', '200.00', 1),
(34, '34', 2, 'Servicio de reparación impresora láser de color', '450.00', 1),
(35, '35', 2, 'Servicio de reparación impresora láser de trabajo pesado', '350.00', 1),
(36, '36', 2, 'Servicio de reparación impresora láser de escritorio', '300.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_order`
--

CREATE TABLE IF NOT EXISTS `tbl_service_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `service_id` int(10) unsigned NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_service_order_tbl_order_idx` (`order_id`),
  KEY `fk_tbl_service_order_tbl_service_idx` (`service_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci PACK_KEYS=1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_performed_order`
--

CREATE TABLE IF NOT EXISTS `tbl_service_performed_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `service_id` int(10) unsigned NOT NULL,
  `price` decimal(7,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_service_performed_order_tbl_order_idx` (`order_id`),
  KEY `fk_tbl_service_performed_order_tbl_service_idx` (`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_type`
--

CREATE TABLE IF NOT EXISTS `tbl_service_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_service_type`
--

INSERT INTO `tbl_service_type` (`id`, `name`, `active`) VALUES
(1, 'Preventivo', 1),
(2, 'Correctivo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_spare_parts`
--

CREATE TABLE IF NOT EXISTS `tbl_spare_parts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `spare_parts_status_id` int(10) unsigned NOT NULL,
  `spare_parts_type_id` int(10) unsigned NOT NULL,
  `brand_id` int(10) unsigned NOT NULL,
  `provider_id` int(10) unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `serial_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(7,2) NOT NULL,
  `date_hour` date NOT NULL,
  `guarantee_period` date DEFAULT NULL,
  `invoice` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_tbl_spare_parts_tbl_spare_parts_status_idx` (`spare_parts_status_id`),
  KEY `fk_tbl_spare_parts_tbl_brand_idx` (`brand_id`),
  KEY `fk_tbl_spare_parts_tbl_provider_idx` (`provider_id`),
  KEY `fk_tbl_spare_parts_tbl_spare_parts_type_idx` (`spare_parts_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_spare_parts_category`
--

CREATE TABLE IF NOT EXISTS `tbl_spare_parts_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_spare_parts_order`
--

CREATE TABLE IF NOT EXISTS `tbl_spare_parts_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `spare_parts_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_spare_parts_order_tbl_order_idx` (`order_id`),
  KEY `fk_tbl_spare_parts_order_tbl_spare_idx` (`spare_parts_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_spare_parts_status`
--

CREATE TABLE IF NOT EXISTS `tbl_spare_parts_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_spare_parts_status`
--

INSERT INTO `tbl_spare_parts_status` (`id`, `description`, `active`) VALUES
(1, 'En stock', 1),
(2, 'Dañada', 1),
(3, 'Caduca', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_spare_parts_type`
--

CREATE TABLE IF NOT EXISTS `tbl_spare_parts_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status_order`
--

CREATE TABLE IF NOT EXISTS `tbl_status_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_status_order`
--

INSERT INTO `tbl_status_order` (`id`, `status`, `active`) VALUES
(1, 'Nuevo', 1),
(2, 'En espera de diagnóstico', 1),
(3, 'En diagnóstico', 1),
(4, 'Diagnóstico finalizado', 1),
(5, 'Requiere Refacción', 1),
(6, 'En Espera de cotización de refacción', 1),
(7, 'En espera de compra de refacción', 1),
(8, 'En espera de reparación', 1),
(9, 'En Reparación', 1),
(10, 'En garantia', 1),
(11, 'En espera de verificación', 1),
(12, 'En espera de validación', 1),
(13, 'Liberado', 1),
(14, 'Entregado', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `user`, `password`, `name`, `last_name`, `email`, `active`) VALUES
(1, 'admin', '$1$sU1.F.1.$UfAKa5WKamIL3pEZnSObS.', 'Usuario', 'Administrador', 'admin@example.org', 1),
(2, 'technician1', '$1$a24.b30.$sdUu7ICyxkMW97Z.jhFqv.', 'User', 'Technician1', 'technician1@example.org', 1),
(3, 'technician2', '$1$eD1.PP/.$psWFWUasazfgCI7ckLyJH1', 'User', 'Technician 2', 'technician2@example.org', 1),
(4, 'receptionist1', '$1$sJ0.FF1.$t5H1M30PhwqiiLjiliuku0', 'User', 'Receptionist 1', 'receptionist1@example.org', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_role`
--

CREATE TABLE IF NOT EXISTS `tbl_user_role` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  KEY `fk_tbl_user_role_tbl_user_idx` (`user_id`),
  KEY `fk_tbl_user_role_tbl_role_idx` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_user_role`
--

INSERT INTO `tbl_user_role` (`user_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 2),
(3, 2),
(4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_work`
--

CREATE TABLE IF NOT EXISTS `tbl_work` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `service_type_id` int(10) unsigned NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_tbl_work_tbl_service_type_idx` (`service_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_work_order`
--

CREATE TABLE IF NOT EXISTS `tbl_work_order` (
  `order_id` int(10) unsigned NOT NULL,
  `work_id` int(10) unsigned NOT NULL,
  KEY `fk_tbl_work_order_tbl_order_idx` (`order_id`),
  KEY `fk_tbl_work_order_tbl_work_idx` (`work_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_accesory_order`
--
ALTER TABLE `tbl_accesory_order`
  ADD CONSTRAINT `fk_tbl_accesory_order_tbl_accesory` FOREIGN KEY (`accesory_id`) REFERENCES `tbl_accesory` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_accesory_order_tbl_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_activity_verification`
--
ALTER TABLE `tbl_activity_verification`
  ADD CONSTRAINT `fk_tbl_activity_verification_tbl_sevice_type` FOREIGN KEY (`service_type_id`) REFERENCES `tbl_service_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_activity_verification_ibfk_1` FOREIGN KEY (`equipment_type_id`) REFERENCES `tbl_equipment_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_activity_verification_order`
--
ALTER TABLE `tbl_activity_verification_order`
  ADD CONSTRAINT `fk_activity_verification_order_tbl_activity_verification` FOREIGN KEY (`activity_verification_id`) REFERENCES `tbl_activity_verification` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_verification_order_tbl_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_blog_guarantee`
--
ALTER TABLE `tbl_blog_guarantee`
  ADD CONSTRAINT `fk_tbl_blog_guarantee_tbl_activity_guarantee` FOREIGN KEY (`activity_guarantee_id`) REFERENCES `tbl_activity_guarantee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_blog_guarantee_tbl_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_blog_guarantee_tbl_user` FOREIGN KEY (`technician_user_id`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_blog_order`
--
ALTER TABLE `tbl_blog_order`
  ADD CONSTRAINT `fk_tbl_blog_order_tbl_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_blog_order_tbl_user` FOREIGN KEY (`user_technical_id`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_blog_spare`
--
ALTER TABLE `tbl_blog_spare`
  ADD CONSTRAINT `fk_tbl_blog_spare_tbl_activity_spare_parts` FOREIGN KEY (`activity_spare_parts_id`) REFERENCES `tbl_activity_spare_parts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_blog_spare_tbl_order` FOREIGN KEY (`orden_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_blog_spare_tbl_user` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_blog_status_order`
--
ALTER TABLE `tbl_blog_status_order`
  ADD CONSTRAINT `fk_tbl_blog_status_order_tbl_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_blog_status_order_tbl_status_order` FOREIGN KEY (`status_order_id`) REFERENCES `tbl_status_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_blog_status_order_tbl_user1` FOREIGN KEY (`user_who_assigned_id`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_blog_status_order_tbl_user2` FOREIGN KEY (`user_assigned_id`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD CONSTRAINT `fk_contact_customer` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD CONSTRAINT `fk_tbl_customer_tbl_customer_type` FOREIGN KEY (`customer_type_id`) REFERENCES `tbl_customer_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_customer_tbl_dependence` FOREIGN KEY (`dependence_id`) REFERENCES `tbl_dependence` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_diagnostic`
--
ALTER TABLE `tbl_diagnostic`
  ADD CONSTRAINT `fk_tbl_diagnostic_tbl_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_diagnostic_tbl_service_type` FOREIGN KEY (`service_type_id`) REFERENCES `tbl_service_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_diagnostic_tbl_user` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_diagnostic_work`
--
ALTER TABLE `tbl_diagnostic_work`
  ADD CONSTRAINT `tbl_diagnostic_work_ibfk_1` FOREIGN KEY (`diagnostic_id`) REFERENCES `tbl_diagnostic` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_diagnostic_work_ibfk_2` FOREIGN KEY (`work_id`) REFERENCES `tbl_work` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_equipment_status`
--
ALTER TABLE `tbl_equipment_status`
  ADD CONSTRAINT `fk_tbl_equipment_status_tbl_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_equipment_type_accesory`
--
ALTER TABLE `tbl_equipment_type_accesory`
  ADD CONSTRAINT `fk_tbl_equipment_type_accesory_tbl_accesory` FOREIGN KEY (`accesory_id`) REFERENCES `tbl_accesory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_equipment_type_accesory_tbl_equipment_type` FOREIGN KEY (`equipment_type_id`) REFERENCES `tbl_equipment_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_failure_description`
--
ALTER TABLE `tbl_failure_description`
  ADD CONSTRAINT `fk_tbl_failure_description_tbl_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_final_status_order`
--
ALTER TABLE `tbl_final_status_order`
  ADD CONSTRAINT `fk_tbl_final_status_order_tbl_final_status` FOREIGN KEY (`final_status_id`) REFERENCES `tbl_final_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_final_status_order_tbl_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_model`
--
ALTER TABLE `tbl_model`
  ADD CONSTRAINT `fk_tbl_model_tbl_brand` FOREIGN KEY (`brand_id`) REFERENCES `tbl_brand` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_model_tbl_equipment_type` FOREIGN KEY (`equipment_type_id`) REFERENCES `tbl_equipment_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_observation_order`
--
ALTER TABLE `tbl_observation_order`
  ADD CONSTRAINT `fk_tbl_observation_order_tbl_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `fk_tbl_orden_tbl_contact` FOREIGN KEY (`contact_id`) REFERENCES `tbl_contact` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_orden_tbl_payment_type` FOREIGN KEY (`payment_type_id`) REFERENCES `tbl_payment_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_orden_tbl_service_type` FOREIGN KEY (`service_type_id`) REFERENCES `tbl_service_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_orden_tbl_user` FOREIGN KEY (`receptionist_user_id`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_order_tbl_customer` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_order_tbl_model` FOREIGN KEY (`model_id`) REFERENCES `tbl_model` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_out_order`
--
ALTER TABLE `tbl_out_order`
  ADD CONSTRAINT `fk_tbl_out_order_tbl_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_out_order_tbl_user` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_out_order_ibfk_1` FOREIGN KEY (`contact_id`) REFERENCES `tbl_contact` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_quotation_order`
--
ALTER TABLE `tbl_quotation_order`
  ADD CONSTRAINT `fk_tbl_quotation_order_tbl_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_quotation_service`
--
ALTER TABLE `tbl_quotation_service`
  ADD CONSTRAINT `fk_tbl_tbl_quotation_service_tbl_quotation_order` FOREIGN KEY (`quotation_order_id`) REFERENCES `tbl_quotation_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_tbl_quotation_service_tbl_service` FOREIGN KEY (`service_id`) REFERENCES `tbl_service` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_quotation_spare_parts`
--
ALTER TABLE `tbl_quotation_spare_parts`
  ADD CONSTRAINT `fk_tbl_quotation_spare_parts_tbl_quotation_order` FOREIGN KEY (`quotation_order_id`) REFERENCES `tbl_quotation_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_repair`
--
ALTER TABLE `tbl_repair`
  ADD CONSTRAINT `fk_tbl_repair_tbl_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_repair_work`
--
ALTER TABLE `tbl_repair_work`
  ADD CONSTRAINT `fk_tbl_repair_work_tbl_repair` FOREIGN KEY (`repair_id`) REFERENCES `tbl_repair` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_repair_work_tbl_user` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_repair_work_tbl_work` FOREIGN KEY (`work_id`) REFERENCES `tbl_work` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD CONSTRAINT `fk_tbl_service_tbl_service_type` FOREIGN KEY (`service_type_id`) REFERENCES `tbl_service_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_service_order`
--
ALTER TABLE `tbl_service_order`
  ADD CONSTRAINT `fk_tbl_service_order_tbl_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_service_order_tbl_service` FOREIGN KEY (`service_id`) REFERENCES `tbl_service` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_service_performed_order`
--
ALTER TABLE `tbl_service_performed_order`
  ADD CONSTRAINT `fk_tbl_service_performed_order_tbl_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_service_performed_order_tbl_service` FOREIGN KEY (`service_id`) REFERENCES `tbl_service` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_spare_parts`
--
ALTER TABLE `tbl_spare_parts`
  ADD CONSTRAINT `fk_tbl_spare_parts_tbl_brand` FOREIGN KEY (`brand_id`) REFERENCES `tbl_brand` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_spare_parts_tbl_provider` FOREIGN KEY (`provider_id`) REFERENCES `tbl_provider` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_spare_parts_tbl_spare_parts_status` FOREIGN KEY (`spare_parts_status_id`) REFERENCES `tbl_spare_parts_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_spare_parts_ibfk_2` FOREIGN KEY (`spare_parts_type_id`) REFERENCES `tbl_spare_parts_type` (`id`);

--
-- Constraints for table `tbl_spare_parts_order`
--
ALTER TABLE `tbl_spare_parts_order`
  ADD CONSTRAINT `fk_tbl_spare_parts_order_tbl_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_spare_parts_order_tbl_spare` FOREIGN KEY (`spare_parts_id`) REFERENCES `tbl_spare_parts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  ADD CONSTRAINT `fk_tbl_user_role_tbl_role` FOREIGN KEY (`role_id`) REFERENCES `tbl_role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_user_role_tbl_user` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_work`
--
ALTER TABLE `tbl_work`
  ADD CONSTRAINT `fk_tbl_work_tbl_service_type` FOREIGN KEY (`service_type_id`) REFERENCES `tbl_service_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_work_order`
--
ALTER TABLE `tbl_work_order`
  ADD CONSTRAINT `fk_tbl_work_order_tbl_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_work_order_tbl_work` FOREIGN KEY (`work_id`) REFERENCES `tbl_work` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
