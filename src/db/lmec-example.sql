-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2015 at 10:07 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET FOREIGN_KEY_CHECKS = 0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lmec`
--
USE `lmec`;

--
-- Dumping data for table `tbl_accessory`
--

INSERT INTO `tbl_accessory` (`id`, `name`, `active`) VALUES
(1, 'Ratón', 1),
(2, 'Teclado', 1),
(3, 'Cable de corriente', 1),
(4, 'Maletín', 1),
(5, 'Disquetera externa', 1);

--
-- Dumping data for table `tbl_accessory_order`
--

INSERT INTO `tbl_accessory_order` (`order_id`, `accessory_id`) VALUES
(2, 3),
(2, 4),
(3, 1),
(4, 1),
(5, 1),
(1, 1),
(1, 2),
(1, 3),
(6, 3);

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`id`, `name`, `active`) VALUES
(1, 'Acer', 1),
(2, 'Asus', 1),
(3, 'Compaq', 1),
(4, 'Dell', 1),
(5, 'Lenovo', 1),
(6, 'Toshiba', 1);

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `customer_id`, `name`, `email`, `cell_phone_number`, `telephone_number_house`, `telephone_number_office`, `extension_office`, `active`) VALUES
(1, 1, 'Contacto 1 de Cliente 1', 'contacto1cliente1@example.org', '(cel) 111 1111', '(cas) 111 1111', '(ofi) 111 1111', '111', 1),
(2, 2, 'Contacto 1 del Cliente Interno 2', 'contacto1clienteinterno2@example.org', '', '', '(ofi) 222 2222', '222', 1),
(3, 3, 'Contacto 1 del Cliente Interno 3', 'contacto1clienteinterno3@example.org', '', '', '', '', 1),
(4, 4, 'Contacto 1 del Cliente Semi-Interno 1', 'contacto1clientesemi-interno1@example.org', '(cel) 111 1111', '(cas) 111 1111', '(ofi) 111 1111', '111', 1),
(5, 5, 'Contacto 1 del Cliente Semi-Interno 2', 'contacto1clientesemi-interno2@example.org', '', '', '', '', 1),
(6, 6, 'Contacto 1 del Cliente Semi-Interno 3', 'contacto1clientesemi-interno3@example.org', '', '', '', '', 1),
(7, 7, 'Contacto 1 del Cliente Externo 1', 'contacto1clienteexterno1@example.org', '(999) 999 9999 ', '', '', '', 1),
(8, 1, 'Contacto 2 de Cliente Interno 1', 'contacto2clienteinterno1@example.org', '', '', '', '', 1),
(9, 2, 'Contacto 2 de Cliente Interno 2', 'contacto2clienteinterno2@example.org', '', '', '', '', 1),
(10, 3, 'Contacto 2 de Cliente Interno 3', 'contacto2clienteinterno3@example.org', '', '', '', '', 1),
(11, 3, 'Contacto 3 de Cliente Interno 3', 'contacto3clienteinterno3@example.org', '', '', '', '', 1);

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `customer_type_id`, `name`, `address`, `dependence_id`, `active`) VALUES
(1, 1, 'Cliente Interno 1', 'Dirección del Cliente 1', 1, 1),
(2, 1, 'Cliente Interno 2', '', 1, 1),
(3, 1, 'Cliente Interno 3', 'Dirección del Cliente Interno 3', 2, 1),
(4, 2, 'Cliente Semi-Interno 1', 'Dirección del cliente Semi-Interno 1', 3, 1),
(5, 2, 'Cliente Semi-Interno 2', '', 3, 1),
(6, 2, 'Cliente Semi-Interno 3', '', 3, 1),
(7, 3, 'Cliente Externo 1', 'Dirección del Cliente Externo 1', NULL, 1);

--
-- Dumping data for table `tbl_dependence`
--

INSERT INTO `tbl_dependence` (`id`, `name`, `address`, `telephone_number`, `extension`, `active`) VALUES
(1, 'Dependencia 1', 'Dirección de dependencia 1', '(111) 111 11 11', '999', 1),
(2, 'Dependencia 2', 'Dirección de dependencia 2', '222 222 22 22', '222', 1),
(3, 'Dependencia 3', 'Dirección de dependencia 3', '(333) 333 33 33', '', 1),
(4, 'Dependencia 4', 'Dirección de dependencia 4', '(444) 444 44 44', '44444', 1),
(5, 'Dependencia 5', 'Dirección de dependencia 5', '(555) 555 55 55', '55', 1),
(6, 'Dependencia 6', 'Dirección de dependencia 6', '(666) 666 66 66', '66666', 1),
(7, 'Dependencia 7', 'Dirección de dependencia 7', '(777) 777 77 77', '7', 1),
(8, 'Dependencia 8', 'Dirección de dependencia 8', '(888) 888 88 88', '', 1),
(9, 'Dependencia 9', 'Dirección de dependencia 9', '(999) 999 99 99', '', 1),
(10, 'Dependencia 10', 'Dirección de dependencia 10', '(000) 000 00 00', '0', 1),
(11, 'Dependencia 11', 'Dirección de dependencia 11', '(111) 111 11 11', '111', 1),
(12, 'Dependencia 12', 'Dirección de dependencia 12', '(222) 222 22 22', '', 1),
(13, 'Dependencia 13', 'Dirección de dependencia 13', '(333) 333 33 33', '333', 1),
(14, 'Dependencia 14', 'Dirección de dependencia 14', '(444) 444 44 44', '', 1),
(15, 'Dependencia 15', 'Dirección de dependencia 15', '(555) 555 55 55', '', 1),
(16, 'Dependencia 16', 'Dirección de dependencia 16', '(666) 666 66 66', '666', 1),
(17, 'Dependencia 17', 'Dirección de dependencia 17', '(777) 777 77 77', '77777', 1),
(18, 'Dependencia 18', 'Dirección de dependencia 18', '(888) 888 88 88', '8', 1);

--
-- Dumping data for table `tbl_diagnostic`
--

INSERT INTO `tbl_diagnostic` (`id`, `order_id`, `user_id`, `service_type_id`, `date_hour`, `observation`, `finished`, `refection`) VALUES
(1, 1, 1, 1, '2015-02-04 18:13:37', 'Diagnóstico', 0, 0),
(2, 2, 1, 1, '2015-02-06 18:37:53', 'Diagnóstico de prueba', 0, 0);

--
-- Dumping data for table `tbl_diagnostic_work`
--

INSERT INTO `tbl_diagnostic_work` (`diagnostic_id`, `work_id`) VALUES
(1, 1),
(2, 1);

--
-- Dumping data for table `tbl_equipment_status`
--

INSERT INTO `tbl_equipment_status` (`id`, `order_id`, `description`) VALUES
(1, 1, 'Dañado\r\nDañado\r\nDañado\r\nDañado\r\nDañado\r\nDañado'),
(2, 2, 'Visagra izquierda quebrada'),
(3, 3, 'En buen estado'),
(4, 4, 'En buen estado'),
(5, 5, 'En buen estado'),
(6, 6, 'En buen estado');

--
-- Dumping data for table `tbl_equipment_type`
--

INSERT INTO `tbl_equipment_type` (`id`, `type`, `active`) VALUES
(1, 'Laptop', 1),
(2, 'PC de Escritorio', 1),
(3, 'Impresora', 1),
(4, 'Escaner', 1);

--
-- Dumping data for table `tbl_failure_description`
--

INSERT INTO `tbl_failure_description` (`id`, `order_id`, `description`) VALUES
(1, 2, 'Se realentiza un poco la computadora.'),
(2, 3, 'Ninguna'),
(3, 4, 'Ninguna'),
(4, 5, 'Ninguna'),
(5, 1, 'Fallaaaaaaaaaaaa\r\nmucho\r\nmucho\r\nmucho\r\nmucho\r\nmucho\r\nmucho\r\nmucho\r\nmucho'),
(6, 6, 'Ninguna');

--
-- Dumping data for table `tbl_model`
--

INSERT INTO `tbl_model` (`id`, `equipment_type_id`, `brand_id`, `name`, `active`) VALUES
(1, 1, 1, 'Aspire R7', 1),
(2, 1, 1, 'Aspire S7', 1),
(3, 1, 1, 'Aspire S5', 1),
(4, 1, 2, 'Asus VivoBook', 1),
(5, 1, 2, 'Asus Transformer Book', 1),
(6, 1, 4, 'Latitude 14 de la serie 3000', 1),
(7, 1, 4, 'Latitude 15 de la serie 3000', 1),
(8, 2, 4, 'OptiPlex 3020', 1),
(9, 2, 4, 'OptiPlex 3020 Micro', 1);

--
-- Dumping data for table `tbl_observation_order`
--

INSERT INTO `tbl_observation_order` (`id`, `order_id`, `observation`) VALUES
(1, 6, 'Independiente de la observación de entrada.');

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `customer_id`, `contact_id`, `receptionist_user_id`, `service_type_id`, `payment_type_id`, `model_id`, `date_hour`, `advance_payment`, `serial_number`, `stock_number`, `name_deliverer_equipment`, `active`, `technician_order_id`, `status_order_id`, `observation`) VALUES
(1, 1, 1, 1, 1, 1, 7, '2014-10-24 17:17:46', '50.00', '12345', '54321', 'Contacto 1 de Cliente 1', 1, 1, 2, 'Requiere limpieza interna'),
(2, 1, 1, 1, 1, 1, 1, '2015-02-04 17:04:11', '50.00', '12323131231sdadasda231213', '312312asasda', 'Pepe Sánchez', 1, 1, 8, 'Para iniciar sesión, se debe utilizar el usuario admin y la contraseña 12345678'),
(3, 1, 8, 1, 1, 1, 5, '2015-02-06 17:07:05', '50.00', 'aa', 'bb', 'Juan Pérez', 1, 0, 1, 'Solo requiere limpieza'),
(4, 1, 8, 1, 2, 1, 5, '2015-02-06 17:07:05', '50.00', 'aa', 'bb', 'Juan Pérez', 1, 3, 8, 'Solo requiere limpieza'),
(5, 1, 8, 1, 1, 1, 5, '2015-02-06 17:07:05', '50.00', 'aa', 'bb', 'Juan Pérez', 1, 2, 13, 'Solo requiere limpieza'),
(6, 7, 7, 1, 1, 3, 5, '2015-02-20 18:42:10', '200.00', '1234', '321', 'Rodrigo Esparza', 1, 2, 5, 'Requiere limpieza interior y exterior.');

--
-- Dumping data for table `tbl_out_order`
--

INSERT INTO `tbl_out_order` (`id`, `order_id`, `contact_id`, `user_id`, `date_hour`, `date_hour_print`, `total_price`, `name_receive_equipment`, `active`) VALUES
(1, 6, 7, 1, '2015-02-20 12:41:00', NULL, '700.00', 'Rodrigo Esparza', 1);

--
-- Dumping data for table `tbl_provider`
--

INSERT INTO `tbl_provider` (`id`, `name`, `contact_name`, `contact_email`, `contact_telephone_number`, `address`, `active`) VALUES
(1, 'Absolute PC', 'Juan Pérez', 'juan@perez.com', '999999999', 'Dirección #', 1);

--
-- Dumping data for table `tbl_repair`
--

INSERT INTO `tbl_repair` (`id`, `order_id`, `description`, `finished`) VALUES
(1, 1, 'sadkasdñas\r\naskdaskdkjal\r\naslkjdlaksd', 0),
(2, 2, 'asasaadfaf\r\nsdfsda\r\nfsd\r\nsfda\r\nsdaf\r\naf\r\na', 0);

--
-- Dumping data for table `tbl_repair_work`
--

INSERT INTO `tbl_repair_work` (`id`, `work_id`, `user_id`, `repair_id`, `date_hour`) VALUES
(1, 2, 1, 1, '2015-02-04 18:14:31'),
(2, 2, 1, 2, '2015-02-11 19:27:12');

--
-- Dumping data for table `tbl_service_order`
--

INSERT INTO `tbl_service_order` (`id`, `order_id`, `service_id`, `price`, `date`) VALUES
(1, 1, 11, '250.00', '2014-10-24 18:01:47'),
(2, 2, 11, '250.00', '2014-10-24 19:01:47'),
(3, 3, 11, '250.00', '2014-10-24 20:01:47'),
(4, 4, 24, '450.00', '2014-10-24 21:01:47'),
(5, 5, 11, '250.00', '2015-02-06 17:42:25'),
(6, 6, 14, '300.00', '2015-02-20 18:43:28');

--
-- Dumping data for table `tbl_spare_parts`
--

INSERT INTO `tbl_spare_parts` (`id`, `spare_parts_status_id`, `spare_parts_type_id`, `brand_id`, `provider_id`, `name`, `serial_number`, `price`, `date_hour`, `guarantee_period`, `invoice`, `description`, `assigned`, `active`) VALUES
(1, 1, 1, 6, 1, 'HD 500GB 2.5in 5400rpm SAS', '123', '400.00', '2015-02-20', '2016-02-20', '512', 'Disco duro', 1, 1);

--
-- Dumping data for table `tbl_spare_parts_order`
--

INSERT INTO `tbl_spare_parts_order` (`id`, `order_id`, `spare_parts_id`) VALUES
(1, 6, 1);

--
-- Dumping data for table `tbl_spare_parts_type`
--

INSERT INTO `tbl_spare_parts_type` (`id`, `type`, `active`) VALUES
(1, 'Disco Duro', 1),
(2, 'Memoria RAM', 1);

--
-- Dumping data for table `tbl_work`
--

INSERT INTO `tbl_work` (`id`, `service_type_id`, `name`, `description`, `active`) VALUES
(1, 1, 'Prueba', 'Prueba', 1),
(2, 2, 'Prueba 2', 'prueba 2', 1);

--
-- Dumping data for table `tbl_work_order`
--

INSERT INTO `tbl_work_order` (`order_id`, `work_id`) VALUES
(1, 1),
(1, 2),
(6, 1),
(6, 2);

SET FOREIGN_KEY_CHECKS = 1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
