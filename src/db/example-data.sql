/* Example data */

--
-- Volcado de datos para la tabla `tbl_service`
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

--
-- Volcado de datos para la tabla `tbl_service`
--

INSERT INTO `tbl_service` (`id`, `status`, `active`) VALUES
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