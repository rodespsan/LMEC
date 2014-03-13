-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-03-2014 a las 16:53:30
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `lmec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_accesory`
--

CREATE TABLE IF NOT EXISTS `tbl_accesory` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tbl_accesory`
--

INSERT INTO `tbl_accesory` (`id`, `name`, `active`) VALUES
(1, 'Cargador hp', 1),
(2, 'Bateria', 1),
(3, 'Teclado', 1),
(4, 'Cargador Sony ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_accesory_order`
--

CREATE TABLE IF NOT EXISTS `tbl_accesory_order` (
  `order_id` int(10) unsigned NOT NULL,
  `accesory_id` int(10) unsigned NOT NULL,
  KEY `fk_tbl_accesory_order_tbl_order_idx` (`order_id`),
  KEY `fk_tbl_accesory_order_tbl_accesory_idx` (`accesory_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_accesory_order`
--

INSERT INTO `tbl_accesory_order` (`order_id`, `accesory_id`) VALUES
(2, 1),
(2, 2),
(1, 2),
(4, 3),
(3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_activity_guarantee`
--

CREATE TABLE IF NOT EXISTS `tbl_activity_guarantee` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_activity_spare_parts`
--

CREATE TABLE IF NOT EXISTS `tbl_activity_spare_parts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_activity_verification`
--

CREATE TABLE IF NOT EXISTS `tbl_activity_verification` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `service_type_id` int(10) unsigned NOT NULL,
  `activity` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_tbl_activity_verification_tbl_sevice_type_idx` (`service_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_activity_verification_order`
--

CREATE TABLE IF NOT EXISTS `tbl_activity_verification_order` (
  `order_id` int(10) unsigned NOT NULL,
  `activity_verification_id` int(10) unsigned NOT NULL,
  KEY `fk_activity_verification_order_tbl_order_idx` (`order_id`),
  KEY `fk_activity_verification_order_tbl_activity_verification_idx` (`activity_verification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_advance_payment`
--

CREATE TABLE IF NOT EXISTS `tbl_advance_payment` (
  `price` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_blog_guarantee`
--

CREATE TABLE IF NOT EXISTS `tbl_blog_guarantee` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `activity_guarantee_id` int(10) unsigned NOT NULL,
  `technician_user_id` int(10) unsigned NOT NULL,
  `date_hour` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_blog_guarantee_tbl_order_idx` (`order_id`),
  KEY `fk_tbl_blog_guarantee_tbl_activity_guarantee_idx` (`activity_guarantee_id`),
  KEY `fk_tbl_blog_guarantee_tbl_user_idx` (`technician_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_blog_order`
--

CREATE TABLE IF NOT EXISTS `tbl_blog_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `activity_guarantee_id` int(10) unsigned NOT NULL,
  `user_technical_id` int(10) unsigned NOT NULL,
  `date_hour` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_blog_order_tbl_order_idx` (`order_id`),
  KEY `fk_tbl_blog_order_tbl_activity_guarantee_idx` (`activity_guarantee_id`),
  KEY `fk_tbl_blog_order_tbl_user_idx` (`user_technical_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_blog_spare`
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
-- Estructura de tabla para la tabla `tbl_blog_status_order`
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
-- Estructura de tabla para la tabla `tbl_brand`
--

CREATE TABLE IF NOT EXISTS `tbl_brand` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tbl_brand`
--

INSERT INTO `tbl_brand` (`id`, `name`, `active`) VALUES
(1, 'DELL', 1),
(2, 'HP', 1),
(3, 'Sony', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_contact`
--

CREATE TABLE IF NOT EXISTS `tbl_contact` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cell_phone_number` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone_number_house` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone_number_office` varchar(35) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extension_office` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `name`, `email`, `cell_phone_number`, `telephone_number_house`, `telephone_number_office`, `extension_office`, `active`) VALUES
(1, 'contacto1', 'contacto1@uady.mx', '1231', '123', '123', '', 1),
(2, 'Contacto_1', 'contacto2@uady.mx', '99912345678', '1234567', '123', '12', 1),
(3, 'contacto_2', 'contacto3@live.com', '99912345678', '1234567', '123', '12', 1),
(4, 'yakzil', 'A10216383@alumnos.uady.mx', '9998765432', '', '', '', 1),
(5, 'contacto Nuevo', 'contacto@uady.mx', '99912345678', '12345678', '', '', 1),
(6, 'fmat_3', 'contacto@uady.mx', '1231', '1234567', '123', '12', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_customer`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `customer_type_id`, `name`, `address`, `dependence_id`, `active`) VALUES
(1, 1, 'Facultad de matematicas', 'fmat', 1, 1),
(2, 1, 'Facultad de Ingenieria', 'FI', 2, 1),
(3, 3, 'Izeth Lopez Jimenez', 'juan pablo', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_customer_contact`
--

CREATE TABLE IF NOT EXISTS `tbl_customer_contact` (
  `customer_id` int(10) unsigned NOT NULL,
  `contact_id` int(10) unsigned NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  KEY `fk_tbl_customer_contact_tbl_customer_idx` (`customer_id`),
  KEY `fk_tbl_customer_contact_tbl_contact_idx` (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_customer_contact`
--

INSERT INTO `tbl_customer_contact` (`customer_id`, `contact_id`, `active`) VALUES
(1, 1, 1),
(2, 2, 1),
(2, 3, 1),
(3, 4, 1),
(3, 5, 1),
(2, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_customer_type`
--

CREATE TABLE IF NOT EXISTS `tbl_customer_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tbl_customer_type`
--

INSERT INTO `tbl_customer_type` (`id`, `type`, `active`) VALUES
(1, 'interno', 1),
(2, 'Externo', 1),
(3, 'Semi Interno', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_dependence`
--

CREATE TABLE IF NOT EXISTS `tbl_dependence` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `telephone_number` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `extension` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbl_dependence`
--

INSERT INTO `tbl_dependence` (`id`, `name`, `address`, `telephone_number`, `extension`, `active`) VALUES
(1, 'Facultad de matematicas', 'fmat', '999', '', 1),
(2, 'Facultad de Ingenieria', 'FI', '1234567', '3', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_diagnostic`
--

CREATE TABLE IF NOT EXISTS `tbl_diagnostic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `service_type_id` int(10) unsigned NOT NULL,
  `date_hour` datetime NOT NULL,
  `observation` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_diagnostic_tbl_order_idx` (`order_id`),
  KEY `fk_tbl_diagnostic_tbl_user_idx` (`user_id`),
  KEY `fk_tbl_diagnostic_tbl_service_type_idx` (`service_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_equipment_status`
--

CREATE TABLE IF NOT EXISTS `tbl_equipment_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_equipment_status_tbl_order_idx` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_equipment_type`
--

CREATE TABLE IF NOT EXISTS `tbl_equipment_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbl_equipment_type`
--

INSERT INTO `tbl_equipment_type` (`id`, `type`, `active`) VALUES
(1, 'Laptop', 1),
(2, 'PC', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_equipment_type_accesory`
--

CREATE TABLE IF NOT EXISTS `tbl_equipment_type_accesory` (
  `equipment_type_id` int(10) unsigned NOT NULL,
  `accesory_id` int(10) unsigned NOT NULL,
  KEY `fk_tbl_equipment_type_accesory_tbl_equipment_type` (`equipment_type_id`),
  KEY `fk_tbl_equipment_type_accesory_tbl_accesory_idx` (`accesory_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_failure_description`
--

CREATE TABLE IF NOT EXISTS `tbl_failure_description` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_failure_description_tbl_order_idx` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_final_status`
--

CREATE TABLE IF NOT EXISTS `tbl_final_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_final_status_order`
--

CREATE TABLE IF NOT EXISTS `tbl_final_status_order` (
  `order_id` int(10) unsigned NOT NULL,
  `final_status_id` int(10) unsigned NOT NULL,
  KEY `fk_tbl_final_status_order_tbl_order_idx` (`order_id`),
  KEY `fk_tbl_final_status_order_tbl_final_status_idx` (`final_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_model`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tbl_model`
--

INSERT INTO `tbl_model` (`id`, `equipment_type_id`, `brand_id`, `name`, `active`) VALUES
(1, 1, 1, 'g42', 1),
(2, 1, 2, '283LA', 1),
(3, 2, 3, 'R34', 1),
(4, 2, 3, 'sony534', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_observation_order`
--

CREATE TABLE IF NOT EXISTS `tbl_observation_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `observation` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_observation_order_tbl_order_idx` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `tbl_observation_order`
--

INSERT INTO `tbl_observation_order` (`id`, `order_id`, `observation`) VALUES
(2, 2, 'Observacion de la Orden 2 \r\nSistema de control de mantenimiento de equipos de cómputo'),
(4, 4, 'prueba'),
(5, 3, 'hola'),
(6, 5, 'ninguna'),
(7, 6, 'ninguna observacion'),
(8, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_order`
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
  PRIMARY KEY (`id`),
  KEY `fk_tbl_order_tbl_customer_idx` (`customer_id`),
  KEY `fk_tbl_orden_tbl_contact_idx` (`contact_id`),
  KEY `fk_tbl_orden_tbl_user_idx` (`receptionist_user_id`),
  KEY `fk_tbl_orden_tbl_service_type_idx` (`service_type_id`),
  KEY `fk_tbl_orden_tbl_payment_type_idx` (`payment_type_id`),
  KEY `fk_tbl_order_tbl_model_idx` (`model_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `customer_id`, `contact_id`, `receptionist_user_id`, `service_type_id`, `payment_type_id`, `model_id`, `date_hour`, `advance_payment`, `serial_number`, `stock_number`, `name_deliverer_equipment`) VALUES
(1, 1, 1, 1, 1, 1, 1, '2013-08-21 11:50:01', '100.00', 'qwe123', '2A', 'usuario1'),
(2, 2, 2, 1, 2, 2, 2, '2013-08-23 00:00:00', '150.00', 'A350', 'ASD4', 'Facultad de Ingenieria'),
(3, 3, 5, 1, 2, 3, 3, '2013-08-21 11:26:15', '100.00', 'qwe123', '2B', 'usuario1'),
(4, 2, 6, 2, 1, 1, 4, '2013-10-23 07:25:06', '200.00', 'A209', 'AB123', 'usuario2'),
(5, 2, 3, 1, 2, 3, 1, '2013-08-21 11:50:01', '100.00', 'A209', 'AB123', 'usuario1'),
(6, 3, 5, 1, 2, 2, 2, '2013-08-12 00:00:00', '200.00', 'E500', 'AB123', 'usuario1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_out_order`
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
  UNIQUE KEY `order_id_2` (`order_id`),
  UNIQUE KEY `order_id_3` (`order_id`),
  KEY `fk_tbl_out_order_tbl_order_idx` (`order_id`),
  KEY `fk_tbl_out_order_tbl_user_idx` (`user_id`),
  KEY `contact_id` (`contact_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `tbl_out_order`
--

INSERT INTO `tbl_out_order` (`id`, `order_id`, `contact_id`, `user_id`, `date_hour`, `date_hour_print`, `total_price`, `name_receive_equipment`, `active`) VALUES
(4, 2, 3, 1, '2014-02-09 16:58:00', '2014-02-09 22:47:51', '2200.00', 'Mayte Chable', 1),
(6, 4, 6, 1, '2014-01-23 03:00:00', '2014-01-24 21:41:56', '2000.00', 'Izeth lopez', 0),
(7, 3, 5, 1, '0000-00-00 00:00:00', NULL, '600.00', '', 0),
(9, 6, 5, 1, '2014-02-14 00:54:00', NULL, '600.00', 'Rodrigo Esparza', 1),
(10, 1, 1, 1, '2014-03-03 19:38:00', NULL, '700.00', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_payment_type`
--

CREATE TABLE IF NOT EXISTS `tbl_payment_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `advance_payment` decimal(8,2) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tbl_payment_type`
--

INSERT INTO `tbl_payment_type` (`id`, `name`, `advance_payment`, `active`) VALUES
(1, 'Interno', '0.00', 1),
(2, 'Semi-Interno', '0.00', 1),
(3, 'Externo', '0.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_provider`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tbl_provider`
--

INSERT INTO `tbl_provider` (`id`, `name`, `contact_name`, `contact_email`, `contact_telephone_number`, `address`, `active`) VALUES
(1, 'proveedor1', 'proveedor', 'proveedor@uady.mx', '123', 'a', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_quotation`
--

CREATE TABLE IF NOT EXISTS `tbl_quotation` (
  `id` int(11) NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_quotation_order`
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
-- Estructura de tabla para la tabla `tbl_quotation_service`
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
-- Estructura de tabla para la tabla `tbl_quotation_spare_parts`
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
-- Estructura de tabla para la tabla `tbl_repair`
--

CREATE TABLE IF NOT EXISTS `tbl_repair` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_repair_tbl_order_idx` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_repair_work`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_role`
--

CREATE TABLE IF NOT EXISTS `tbl_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `url_initial` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `name`, `url_initial`, `priority`, `active`) VALUES
(1, 'administrador', 'user/admin', 100, 1),
(2, 'Tecnico', 'user/tecnico', 50, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_service`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbl_service`
--

INSERT INTO `tbl_service` (`id`, `code`, `service_type_id`, `name`, `price`, `active`) VALUES
(1, 'SERV', 1, 'servicio1', '200.00', 1),
(2, 'MANLAP', 2, 'Servicio de mantenimiento', '300.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_service_order`
--

CREATE TABLE IF NOT EXISTS `tbl_service_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `service_id` int(10) unsigned NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_service_order_tbl_order_idx` (`order_id`),
  KEY `fk_tbl_service_order_tbl_service_idx` (`service_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci PACK_KEYS=1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `tbl_service_order`
--

INSERT INTO `tbl_service_order` (`id`, `order_id`, `service_id`, `price`, `fecha`) VALUES
(1, 2, 2, '1300.00', '0000-00-00 00:00:00'),
(2, 4, 2, '500.00', '0000-00-00 00:00:00'),
(3, 4, 1, '600.00', '2013-11-21 16:03:12'),
(4, 3, 1, '600.00', '2013-09-22 16:21:30'),
(5, 1, 2, '700.00', '2013-11-21 00:00:00'),
(6, 5, 2, '300.00', '2013-11-21 00:00:00'),
(7, 6, 2, '600.00', '2013-11-21 16:03:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_service_performed_order`
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
-- Estructura de tabla para la tabla `tbl_service_type`
--

CREATE TABLE IF NOT EXISTS `tbl_service_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbl_service_type`
--

INSERT INTO `tbl_service_type` (`id`, `name`, `active`) VALUES
(1, 'Preventivo', 1),
(2, 'Correctivo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_spare_parts`
--

CREATE TABLE IF NOT EXISTS `tbl_spare_parts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `spare_parts_status_id` int(10) unsigned NOT NULL,
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
  KEY `category_id` (`category_id`),
  KEY `category_id_2` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tbl_spare_parts`
--

INSERT INTO `tbl_spare_parts` (`id`, `category_id`, `spare_parts_status_id`, `brand_id`, `provider_id`, `name`, `serial_number`, `price`, `date_hour`, `guarantee_period`, `invoice`, `description`, `active`) VALUES
(1, 2, 1, 2, 1, 'Tarjeta de video2', 'E500', '1000.00', '2013-11-01', '2014-10-07', NULL, NULL, 1),
(2, 2, 1, 1, 1, 'Tarjeta de video', 'A200', '900.00', '2013-11-22', '2014-10-13', NULL, NULL, 1),
(3, 1, 1, 3, 1, 'Memoria', NULL, '500.00', '2013-08-21', '2014-10-14', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_spare_parts_category`
--

CREATE TABLE IF NOT EXISTS `tbl_spare_parts_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbl_spare_parts_category`
--

INSERT INTO `tbl_spare_parts_category` (`id`, `code`, `name`) VALUES
(1, 'MEMORIAS', 'memorias de laptop'),
(2, 'TARVID', 'tarjetas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_spare_parts_order`
--

CREATE TABLE IF NOT EXISTS `tbl_spare_parts_order` (
  `order_id` int(10) unsigned NOT NULL,
  `spare_parts_id` int(10) unsigned NOT NULL,
  KEY `fk_tbl_spare_parts_order_tbl_order_idx` (`order_id`),
  KEY `fk_tbl_spare_parts_order_tbl_spare_idx` (`spare_parts_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_spare_parts_order`
--

INSERT INTO `tbl_spare_parts_order` (`order_id`, `spare_parts_id`) VALUES
(4, 3),
(2, 2),
(2, 1),
(4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_spare_parts_status`
--

CREATE TABLE IF NOT EXISTS `tbl_spare_parts_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tbl_spare_parts_status`
--

INSERT INTO `tbl_spare_parts_status` (`id`, `description`, `active`) VALUES
(1, 'en stock', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_status_order`
--

CREATE TABLE IF NOT EXISTS `tbl_status_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_technician_order`
--

CREATE TABLE IF NOT EXISTS `tbl_technician_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_technician_order_tbl_order_idx` (`order_id`),
  KEY `fk_tbl_technician_order_tbl_user_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_user`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `user`, `password`, `name`, `last_name`, `email`, `active`) VALUES
(1, 'admin', '$1$sU1.F.1.$UfAKa5WKamIL3pEZnSObS.', 'prueba', 'prueba', 'prueba@gmail.com', 1),
(2, 'tecnico', '$1$Wf/.nt5.$LQzYuHBg52shvGfD4OTdY1', 'tec_prueba', 'tec_prueba', 'tecnico@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_user_role`
--

CREATE TABLE IF NOT EXISTS `tbl_user_role` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  KEY `fk_tbl_user_role_tbl_user_idx` (`user_id`),
  KEY `fk_tbl_user_role_tbl_role_idx` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_user_role`
--

INSERT INTO `tbl_user_role` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_work`
--

CREATE TABLE IF NOT EXISTS `tbl_work` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `service_type_id` int(10) unsigned NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_tbl_work_tbl_service_type_idx` (`service_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbl_work`
--

INSERT INTO `tbl_work` (`id`, `service_type_id`, `name`, `description`, `active`) VALUES
(1, 1, 'Diagnostico', 'Limpieza de Laptop', 1),
(2, 2, 'Reparacion', 'Cambio de Memoria ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_work_order`
--

CREATE TABLE IF NOT EXISTS `tbl_work_order` (
  `order_id` int(10) unsigned NOT NULL,
  `work_id` int(10) unsigned NOT NULL,
  KEY `fk_tbl_work_order_tbl_order_idx` (`order_id`),
  KEY `fk_tbl_work_order_tbl_work_idx` (`work_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_work_order`
--

INSERT INTO `tbl_work_order` (`order_id`, `work_id`) VALUES
(2, 1),
(2, 2),
(1, 1),
(4, 2),
(3, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_accesory_order`
--
ALTER TABLE `tbl_accesory_order`
  ADD CONSTRAINT `fk_tbl_accesory_order_tbl_accesory` FOREIGN KEY (`accesory_id`) REFERENCES `tbl_accesory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_accesory_order_tbl_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_activity_verification`
--
ALTER TABLE `tbl_activity_verification`
  ADD CONSTRAINT `fk_tbl_activity_verification_tbl_sevice_type` FOREIGN KEY (`service_type_id`) REFERENCES `tbl_service_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_activity_verification_order`
--
ALTER TABLE `tbl_activity_verification_order`
  ADD CONSTRAINT `fk_activity_verification_order_tbl_activity_verification` FOREIGN KEY (`activity_verification_id`) REFERENCES `tbl_activity_verification` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_verification_order_tbl_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_blog_guarantee`
--
ALTER TABLE `tbl_blog_guarantee`
  ADD CONSTRAINT `fk_tbl_blog_guarantee_tbl_activity_guarantee` FOREIGN KEY (`activity_guarantee_id`) REFERENCES `tbl_activity_guarantee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_blog_guarantee_tbl_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_blog_guarantee_tbl_user` FOREIGN KEY (`technician_user_id`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_blog_order`
--
ALTER TABLE `tbl_blog_order`
  ADD CONSTRAINT `fk_tbl_blog_order_tbl_activity_guarantee` FOREIGN KEY (`activity_guarantee_id`) REFERENCES `tbl_activity_guarantee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_blog_order_tbl_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_blog_order_tbl_user` FOREIGN KEY (`user_technical_id`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_blog_spare`
--
ALTER TABLE `tbl_blog_spare`
  ADD CONSTRAINT `fk_tbl_blog_spare_tbl_activity_spare_parts` FOREIGN KEY (`activity_spare_parts_id`) REFERENCES `tbl_activity_spare_parts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_blog_spare_tbl_order` FOREIGN KEY (`orden_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_blog_spare_tbl_user` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_blog_status_order`
--
ALTER TABLE `tbl_blog_status_order`
  ADD CONSTRAINT `fk_tbl_blog_status_order_tbl_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_blog_status_order_tbl_status_order` FOREIGN KEY (`status_order_id`) REFERENCES `tbl_status_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_blog_status_order_tbl_user1` FOREIGN KEY (`user_who_assigned_id`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_blog_status_order_tbl_user2` FOREIGN KEY (`user_assigned_id`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD CONSTRAINT `fk_tbl_customer_tbl_customer_type` FOREIGN KEY (`customer_type_id`) REFERENCES `tbl_customer_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_customer_tbl_dependence` FOREIGN KEY (`dependence_id`) REFERENCES `tbl_dependence` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_customer_contact`
--
ALTER TABLE `tbl_customer_contact`
  ADD CONSTRAINT `fk_tbl_customer_contact_tbl_contact` FOREIGN KEY (`contact_id`) REFERENCES `tbl_contact` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_customer_contact_tbl_customer` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_diagnostic`
--
ALTER TABLE `tbl_diagnostic`
  ADD CONSTRAINT `fk_tbl_diagnostic_tbl_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_diagnostic_tbl_service_type` FOREIGN KEY (`service_type_id`) REFERENCES `tbl_service_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_diagnostic_tbl_user` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_equipment_status`
--
ALTER TABLE `tbl_equipment_status`
  ADD CONSTRAINT `fk_tbl_equipment_status_tbl_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_equipment_type_accesory`
--
ALTER TABLE `tbl_equipment_type_accesory`
  ADD CONSTRAINT `fk_tbl_equipment_type_accesory_tbl_accesory` FOREIGN KEY (`accesory_id`) REFERENCES `tbl_accesory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_equipment_type_accesory_tbl_equipment_type` FOREIGN KEY (`equipment_type_id`) REFERENCES `tbl_equipment_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_failure_description`
--
ALTER TABLE `tbl_failure_description`
  ADD CONSTRAINT `fk_tbl_failure_description_tbl_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_final_status_order`
--
ALTER TABLE `tbl_final_status_order`
  ADD CONSTRAINT `fk_tbl_final_status_order_tbl_final_status` FOREIGN KEY (`final_status_id`) REFERENCES `tbl_final_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_final_status_order_tbl_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_model`
--
ALTER TABLE `tbl_model`
  ADD CONSTRAINT `fk_tbl_model_tbl_brand` FOREIGN KEY (`brand_id`) REFERENCES `tbl_brand` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_model_tbl_equipment_type` FOREIGN KEY (`equipment_type_id`) REFERENCES `tbl_equipment_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_observation_order`
--
ALTER TABLE `tbl_observation_order`
  ADD CONSTRAINT `fk_tbl_observation_order_tbl_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `fk_tbl_orden_tbl_contact` FOREIGN KEY (`contact_id`) REFERENCES `tbl_contact` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_orden_tbl_payment_type` FOREIGN KEY (`payment_type_id`) REFERENCES `tbl_payment_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_orden_tbl_service_type` FOREIGN KEY (`service_type_id`) REFERENCES `tbl_service_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_orden_tbl_user` FOREIGN KEY (`receptionist_user_id`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_order_tbl_customer` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_order_tbl_model` FOREIGN KEY (`model_id`) REFERENCES `tbl_model` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_out_order`
--
ALTER TABLE `tbl_out_order`
  ADD CONSTRAINT `fk_tbl_out_order_tbl_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_out_order_tbl_user` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_out_order_ibfk_1` FOREIGN KEY (`contact_id`) REFERENCES `tbl_contact` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_quotation_order`
--
ALTER TABLE `tbl_quotation_order`
  ADD CONSTRAINT `fk_tbl_quotation_order_tbl_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_quotation_service`
--
ALTER TABLE `tbl_quotation_service`
  ADD CONSTRAINT `fk_tbl_tbl_quotation_service_tbl_quotation_order` FOREIGN KEY (`quotation_order_id`) REFERENCES `tbl_quotation_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_tbl_quotation_service_tbl_service` FOREIGN KEY (`service_id`) REFERENCES `tbl_service` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_quotation_spare_parts`
--
ALTER TABLE `tbl_quotation_spare_parts`
  ADD CONSTRAINT `fk_tbl_quotation_spare_parts_tbl_quotation_order` FOREIGN KEY (`quotation_order_id`) REFERENCES `tbl_quotation_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_repair`
--
ALTER TABLE `tbl_repair`
  ADD CONSTRAINT `fk_tbl_repair_tbl_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_repair_work`
--
ALTER TABLE `tbl_repair_work`
  ADD CONSTRAINT `fk_tbl_repair_work_tbl_repair` FOREIGN KEY (`repair_id`) REFERENCES `tbl_repair` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_repair_work_tbl_user` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_repair_work_tbl_work` FOREIGN KEY (`work_id`) REFERENCES `tbl_work` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD CONSTRAINT `fk_tbl_service_tbl_service_type` FOREIGN KEY (`service_type_id`) REFERENCES `tbl_service_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_service_order`
--
ALTER TABLE `tbl_service_order`
  ADD CONSTRAINT `fk_tbl_service_order_tbl_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_service_order_tbl_service` FOREIGN KEY (`service_id`) REFERENCES `tbl_service` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_service_performed_order`
--
ALTER TABLE `tbl_service_performed_order`
  ADD CONSTRAINT `fk_tbl_service_performed_order_tbl_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_service_performed_order_tbl_service` FOREIGN KEY (`service_id`) REFERENCES `tbl_service` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_spare_parts`
--
ALTER TABLE `tbl_spare_parts`
  ADD CONSTRAINT `fk_tbl_spare_parts_tbl_brand` FOREIGN KEY (`brand_id`) REFERENCES `tbl_brand` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_spare_parts_tbl_provider` FOREIGN KEY (`provider_id`) REFERENCES `tbl_provider` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_spare_parts_tbl_spare_parts_status` FOREIGN KEY (`spare_parts_status_id`) REFERENCES `tbl_spare_parts_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_spare_parts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_spare_parts_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_spare_parts_order`
--
ALTER TABLE `tbl_spare_parts_order`
  ADD CONSTRAINT `fk_tbl_spare_parts_order_tbl_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_spare_parts_order_tbl_spare` FOREIGN KEY (`spare_parts_id`) REFERENCES `tbl_spare_parts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_technician_order`
--
ALTER TABLE `tbl_technician_order`
  ADD CONSTRAINT `fk_tbl_technician_order_tbl_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_technician_order_tbl_user` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  ADD CONSTRAINT `fk_tbl_user_role_tbl_role` FOREIGN KEY (`role_id`) REFERENCES `tbl_role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_user_role_tbl_user` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_work`
--
ALTER TABLE `tbl_work`
  ADD CONSTRAINT `fk_tbl_work_tbl_service_type` FOREIGN KEY (`service_type_id`) REFERENCES `tbl_service_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_work_order`
--
ALTER TABLE `tbl_work_order`
  ADD CONSTRAINT `fk_tbl_work_order_tbl_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_work_order_tbl_work` FOREIGN KEY (`work_id`) REFERENCES `tbl_work` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
