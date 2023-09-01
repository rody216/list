-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-08-2023 a las 19:06:03
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `stock`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banking`
--

CREATE TABLE `banking` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `financial_entity` varchar(200) DEFAULT NULL,
  `product_type` varchar(200) DEFAULT NULL,
  `product_number` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `banking`
--

INSERT INTO `banking` (`id`, `employee_id`, `financial_entity`, `product_type`, `product_number`) VALUES
(1, 3, '2133123', '123123', '123123123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blood_types`
--

CREATE TABLE `blood_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `blood_types`
--

INSERT INTO `blood_types` (`id`, `name`) VALUES
(1, 'A +'),
(2, 'A-'),
(3, 'B +'),
(4, 'B-'),
(5, 'AB+'),
(6, 'AB-'),
(7, 'O+'),
(8, 'O-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `brands`
--

INSERT INTO `brands` (`id`, `name`, `active`) VALUES
(4, 'ABC Inc.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `civil_status`
--

CREATE TABLE `civil_status` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `civil_status`
--

INSERT INTO `civil_status` (`id`, `name`) VALUES
(1, 'Soltero(a)'),
(2, 'Casado(a)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `service_charge_value` varchar(255) NOT NULL,
  `vat_charge_value` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `currency` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `company`
--

INSERT INTO `company` (`id`, `company_name`, `service_charge_value`, `vat_charge_value`, `address`, `phone`, `country`, `message`, `currency`) VALUES
(1, 'ABC Inc.', '13', '10', '1234 Main St. Los Angeles, CA 98765 U.S.A.', '(123) 456-7890', 'United States of America', 'Sample message<br>', 'USD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'Colombia'),
(2, 'Ecuador'),
(3, 'Venezuela');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `departments`
--

INSERT INTO `departments` (`id`, `name`, `country_id`) VALUES
(1, 'Amazonas', 1),
(2, 'Antioquia', 1),
(3, 'Arauca', 1),
(4, 'Archipielago De San Andres Y Providencia', 1),
(5, 'Atlantico', 1),
(6, 'Bogota D.C', 1),
(7, 'Bolivar', 1),
(8, 'Boyaca', 1),
(9, 'Caldas', 1),
(10, 'Caqueta', 1),
(11, 'Casanare', 1),
(12, 'Cauca', 1),
(13, 'Cesar', 1),
(14, 'Choco', 1),
(15, 'Cordoba', 1),
(16, 'Cundinamarca', 1),
(17, 'Guainia', 1),
(18, 'Guaviare', 1),
(19, 'Huila', 1),
(20, 'La Guajira', 1),
(21, 'Magdalena', 1),
(22, 'Meta', 1),
(23, 'Narino', 1),
(24, 'Norte De Santander', 1),
(25, 'Putumayo', 1),
(26, 'Quindio', 1),
(27, 'Risaralda', 1),
(28, 'Santander', 1),
(29, 'Sucre', 1),
(30, 'Tolima', 1),
(31, 'Valle Del Cauca', 1),
(32, 'Vaupes', 1),
(33, 'Vichada', 1),
(34, 'Ambato', 2),
(35, 'Azuay', 2),
(36, 'Bolivar', 2),
(37, 'Canar', 2),
(38, 'Carchi', 2),
(39, 'Chimborazo', 2),
(40, 'Cotopaxi', 2),
(41, 'Ecuador', 2),
(42, 'El Oro', 2),
(43, 'Esmeraldas', 2),
(44, 'Galapagos', 2),
(45, 'Guayas', 2),
(46, 'Imbabura', 2),
(47, 'Loja', 2),
(48, 'Los Rios', 2),
(49, 'Manabi', 2),
(50, 'Morona Santiago', 2),
(51, 'Napo', 2),
(52, 'Orellana', 2),
(53, 'Pastaza', 2),
(54, 'Pichincha', 2),
(55, 'Quito', 2),
(56, 'Santa Elena', 2),
(57, 'Santo Domingo De Los Tsachilas', 2),
(58, 'Sucumbios', 2),
(59, 'Tungurahua', 2),
(60, 'Zamora Chinchipe', 2),
(61, 'Zonas No Delimitadas', 2),
(62, 'Amazonas', 3),
(63, 'Anzoategui', 3),
(64, 'Apure', 3),
(65, 'Aragua', 3),
(66, 'Barinas', 3),
(67, 'Bolivar', 3),
(68, 'Carabobo', 3),
(69, 'Caracas', 3),
(70, 'Cojedes', 3),
(71, 'Delta Amacuro', 3),
(72, 'Districo Capital', 3),
(73, 'Falcon', 3),
(74, 'Guarico', 3),
(75, 'Lara', 3),
(76, 'Merida', 3),
(77, 'Miranda', 3),
(78, 'Monogas', 3),
(79, 'Nueva Esparta', 3),
(80, 'Portuguesa', 3),
(81, 'Sucre', 3),
(82, 'Tachira', 3),
(83, 'Trujillo', 3),
(84, 'Vargas', 3),
(85, 'Venezuela', 3),
(86, 'Yaracuy', 3),
(87, 'Zulia', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `document_types`
--

CREATE TABLE `document_types` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `document_types`
--

INSERT INTO `document_types` (`id`, `name`) VALUES
(1, 'Registro Civíl de Nacimiento'),
(6, 'Tarjeta de Identidad'),
(7, 'Cédula de Ciudadanía'),
(8, 'Tarjeta de Extrajería'),
(9, 'Cedula de Extrajería'),
(10, 'Pasaporte'),
(11, 'Documento de Identificación Extranjero'),
(12, 'Carné Diplomático'),
(13, 'Permiso Especial de Permanencia (PEP)'),
(14, 'Permiso de Protección Temporal (PPT)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `employees`
--

INSERT INTO `employees` (`id`, `person_id`, `active`) VALUES
(3, 5, 1),
(5, 8, 1),
(6, 9, 1),
(7, 10, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `families`
--

CREATE TABLE `families` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `relationship_id` int(11) NOT NULL,
  `value` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `families`
--

INSERT INTO `families` (`id`, `employee_id`, `person_id`, `relationship_id`, `value`) VALUES
(1, 3, 6, 2, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `permission` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `permission`) VALUES
(1, 'Administrator', 'a:23:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:10:\"deleteUser\";i:4;s:11:\"createGroup\";i:5;s:11:\"updateGroup\";i:6;s:9:\"viewGroup\";i:7;s:11:\"deleteGroup\";i:8;s:18:\"createDocumentType\";i:9;s:18:\"updateDocumentType\";i:10;s:16:\"viewDocumentType\";i:11;s:18:\"deleteDocumentType\";i:12;s:14:\"createEmployee\";i:13;s:14:\"updateEmployee\";i:14;s:12:\"viewEmployee\";i:15;s:14:\"deleteEmployee\";i:16;s:14:\"createDocument\";i:17;s:14:\"updateDocument\";i:18;s:12:\"viewDocument\";i:19;s:14:\"deleteDocument\";i:20;s:11:\"viewReports\";i:21;s:11:\"viewProfile\";i:22;s:13:\"updateSetting\";}'),
(4, 'Owners', 'a:21:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:10:\"deleteUser\";i:4;s:11:\"createGroup\";i:5;s:11:\"updateGroup\";i:6;s:9:\"viewGroup\";i:7;s:11:\"deleteGroup\";i:8;s:18:\"createDocumentType\";i:9;s:18:\"updateDocumentType\";i:10;s:16:\"viewDocumentType\";i:11;s:18:\"deleteDocumentType\";i:12;s:14:\"createEmployee\";i:13;s:14:\"updateEmployee\";i:14;s:12:\"viewEmployee\";i:15;s:14:\"deleteEmployee\";i:16;s:14:\"createDocument\";i:17;s:12:\"viewDocument\";i:18;s:11:\"viewReports\";i:19;s:11:\"viewProfile\";i:20;s:13:\"updateSetting\";}'),
(5, 'Visit', 'a:3:{i:0;s:16:\"viewDocumentType\";i:1;s:12:\"viewEmployee\";i:2;s:12:\"viewDocument\";}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `judicial`
--

CREATE TABLE `judicial` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `processes_number` int(11) DEFAULT NULL,
  `date_issue` date DEFAULT NULL,
  `class` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `judicial`
--

INSERT INTO `judicial` (`id`, `employee_id`, `processes_number`, `date_issue`, `class`, `status`) VALUES
(1, 3, 12323, '2023-08-01', '567', '1232');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `simit`
--

CREATE TABLE `simit` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `comparendo` int(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `secretaria` varchar(45) DEFAULT NULL,
  `infraccion` varchar(45) DEFAULT NULL,
  `valor` float(20) DEFAULT NULL,
  `pdf` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `simit`
--

INSERT INTO `simit` (`id`, `employee_id`, `comparendo`, `date`, `secretaria`, `infraccion`, `valor`, `pdf`) VALUES
(1, 3, 12323, '2023-08-01', 'Montería', 'semaforo en rojo', '880.200', 'NULL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mmp`
--

CREATE TABLE `mmp` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date_issue` date DEFAULT NULL,
  `ubigeo_id` int(11) DEFAULT NULL,
  `article` varchar(45) DEFAULT NULL,
  `numeral` varchar(45) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `arguments` text DEFAULT NULL,
  `reconciliations` text DEFAULT NULL,
  `pdf` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `mmp`
--

INSERT INTO `mmp` (`id`, `employee_id`, `date_issue`, `ubigeo_id`, `article`, `numeral`, `detail`, `arguments`, `reconciliations`, `pdf`) VALUES
(1, 3, '0000-00-00', NULL, 'sd1223', '123', '123213', '213123', '123123', NULL),
(2, 7, '2023-08-15', NULL, '123456', '10', 'SE COMIO LA COMIDA DE LA MUJER Y AHORA ESTA EN GRANDES PROBLEMAS.', 'TENIA MUCHA HAMBRE', 'INVITARLA A COMER A KFC', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persons`
--

CREATE TABLE `persons` (
  `id` int(11) NOT NULL,
  `document_type_id` int(11) NOT NULL,
  `document_number` varchar(15) NOT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `civil_status_id` int(11) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `ubigeous_birth` char(8) DEFAULT NULL,
  `ubigeous_residence` char(8) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `blood_type_id` int(11) DEFAULT NULL,
  `telephone` varchar(200) DEFAULT NULL,
  `mobile_phone` varchar(200) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `persons`
--

INSERT INTO `persons` (`id`, `document_type_id`, `document_number`, `first_name`, `last_name`, `civil_status_id`, `birthdate`, `ubigeous_birth`, `ubigeous_residence`, `address`, `blood_type_id`, `telephone`, `mobile_phone`, `email`) VALUES
(5, 1, '77128391', 'Aurora Soledad', 'Guerra Ugas', 1, '1995-06-30', '1', '4', 'ASASAS', 7, '', '', ''),
(6, 1, '05325931', 'Doris Mariela', 'Ugas Arevalo', 2, '0000-00-00', NULL, '1', '\"Urbanizacion Santa Rosa Mz I lt 18\"', 7, '', '', ''),
(8, 1, '11111110', '12312312', '21312321', 1, '2023-08-04', '1', '1', '21312', 1, '1231', '12321', ''),
(9, 1, '11111111', '23123', '123123', 1, '2023-08-01', '1', '1', '', 1, '', '', ''),
(10, 6, 'AN8770175', 'RODOLFO', 'ALVAREZ', 2, '1970-01-21', NULL, NULL, 'LA MISMA', 7, '', '1234567891', 'elmismo@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `photo` varchar(45) DEFAULT NULL,
  `photo_date` date DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `photos`
--

INSERT INTO `photos` (`id`, `person_id`, `photo`, `photo_date`, `updated_date`) VALUES
(2, 9, 'assets/images/person_image/64cef94e96bb6.jpg', '2023-08-01', NULL),
(3, 10, 'assets/images/person_image/64daae07bf294.jpg', '2023-08-13', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ponal`
--

CREATE TABLE `ponal` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date_issue` date DEFAULT NULL,
  `time_issue` text DEFAULT NULL,
  `results` text DEFAULT NULL,
  `update_date` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `ponal`
--

INSERT INTO `ponal` (`id`, `employee_id`, `date_issue`, `time_issue`, `results`, `update_date`) VALUES
(1, 3, '2023-08-04', '02:12', 'Para crear múltiples páginas en un PDF generado con TCPDF y contenido proveniente de un archivo HTML externo, necesitarás dividir el contenido del archivo HTML en las diferentes páginas de', '2023-08-06 08:06:27'),
(2, 7, '2023-08-22', '10:00', 'TODO LO ANTERIOR', '2023-08-23 16:14:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procuradoria`
--

CREATE TABLE `procuradoria` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `certificate_number` int(11) DEFAULT NULL,
  `date_issue` date DEFAULT NULL,
  `time_issue` time DEFAULT NULL,
  `results` text DEFAULT NULL,
  `siri` int(11) DEFAULT NULL,
  `sanction` text DEFAULT NULL,
  `providence` varchar(200) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `procuradoria`
--

INSERT INTO `procuradoria` (`id`, `employee_id`, `certificate_number`, `date_issue`, `time_issue`, `results`, `siri`, `sanction`, `providence`, `update_date`) VALUES
(1, 3, 12321323, '2023-08-01', '23:05:00', '123213', 213123, '123213', '213123', '2023-08-02 04:04:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `office` varchar(250) DEFAULT NULL,
  `plate` varchar(45) DEFAULT NULL,
  `pdf` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `properties`
--

INSERT INTO `properties` (`id`, `employee_id`, `city`, `office`, `plate`, `pdf`) VALUES
(1, 3, '23123', '213123', '213123', NULL),
(2, 3, 'adsd', 'asdasd', 'rggdfdf', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provinces`
--

CREATE TABLE `provinces` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `department_id`, `country_id`) VALUES
(1, 'El Encanto', 1, 1),
(2, 'La Chorrera', 1, 1),
(3, 'La Pedrera', 1, 1),
(4, 'La Victoria', 1, 1),
(5, 'Leticia', 1, 1),
(6, 'Miriti  ( Paraná)', 1, 1),
(7, 'Puerto Alegría', 1, 1),
(8, 'Puerto Arica', 1, 1),
(9, 'Puerto Nariño', 1, 1),
(10, 'Puerto Santander', 1, 1),
(11, 'Tarapacá', 1, 1),
(12, 'Abejorral', 2, 1),
(13, 'Abriaquí', 2, 1),
(14, 'Alejandría', 2, 1),
(15, 'Amagá', 2, 1),
(16, 'Amalfi', 2, 1),
(17, 'Andes', 2, 1),
(18, 'Angelópolis', 2, 1),
(19, 'Angostura', 2, 1),
(20, 'Anorí', 2, 1),
(21, 'Anza', 2, 1),
(22, 'Apartadó', 2, 1),
(23, 'Arboletes', 2, 1),
(24, 'Argelia', 2, 1),
(25, 'Armenia', 2, 1),
(26, 'Barbosa', 2, 1),
(27, 'Bello', 2, 1),
(28, 'Belmira', 2, 1),
(29, 'Betania', 2, 1),
(30, 'Betulia', 2, 1),
(31, 'Briceño', 2, 1),
(32, 'Buriticá', 2, 1),
(33, 'Cáceres', 2, 1),
(34, 'Caicedo', 2, 1),
(35, 'Caldas', 2, 1),
(36, 'Campamento', 2, 1),
(37, 'Cañasgordas', 2, 1),
(38, 'Caracolí', 2, 1),
(39, 'Caramanta', 2, 1),
(40, 'Carepa', 2, 1),
(41, 'Carolina', 2, 1),
(42, 'Caucasia', 2, 1),
(43, 'Chigorodó', 2, 1),
(44, 'Cisneros', 2, 1),
(45, 'Ciudad Bolívar', 2, 1),
(46, 'Cocorná', 2, 1),
(47, 'Concepción', 2, 1),
(48, 'Concordia', 2, 1),
(49, 'Copacabana', 2, 1),
(50, 'Dabeiba', 2, 1),
(51, 'Don Matías', 2, 1),
(52, 'Ebéjico', 2, 1),
(53, 'El Bagre', 2, 1),
(54, 'El Carmen De Viboral', 2, 1),
(55, 'El Santuario', 2, 1),
(56, 'Entrerrios', 2, 1),
(57, 'Envigado', 2, 1),
(58, 'Fredonia', 2, 1),
(59, 'Frontino', 2, 1),
(60, 'Giraldo', 2, 1),
(61, 'Girardota', 2, 1),
(62, 'Gómez Plata', 2, 1),
(63, 'Granada', 2, 1),
(64, 'Guadalupe', 2, 1),
(65, 'Guarne', 2, 1),
(66, 'Guatape', 2, 1),
(67, 'Heliconia', 2, 1),
(68, 'Hispania', 2, 1),
(69, 'Itagui', 2, 1),
(70, 'Ituango', 2, 1),
(71, 'Jardín', 2, 1),
(72, 'Jericó', 2, 1),
(73, 'La Ceja', 2, 1),
(74, 'La Estrella', 2, 1),
(75, 'La Pintada', 2, 1),
(76, 'La Unión', 2, 1),
(77, 'Liborina', 2, 1),
(78, 'Maceo', 2, 1),
(79, 'Marinilla', 2, 1),
(80, 'Medellín', 2, 1),
(81, 'Montebello', 2, 1),
(82, 'Murindó', 2, 1),
(83, 'Mutatá', 2, 1),
(84, 'Nariño', 2, 1),
(85, 'Nechí', 2, 1),
(86, 'Necoclí', 2, 1),
(87, 'Olaya', 2, 1),
(88, 'Peñol', 2, 1),
(89, 'Peque', 2, 1),
(90, 'Pueblorrico', 2, 1),
(91, 'Puerto Berrío', 2, 1),
(92, 'Puerto Nare', 2, 1),
(93, 'Puerto Triunfo', 2, 1),
(94, 'Remedios', 2, 1),
(95, 'Retiro', 2, 1),
(96, 'Rionegro', 2, 1),
(97, 'Sabanalarga', 2, 1),
(98, 'Sabaneta', 2, 1),
(99, 'Salgar', 2, 1),
(100, 'San Andrés', 2, 1),
(101, 'San Antonio de Prado', 2, 1),
(102, 'San Carlos', 2, 1),
(103, 'San Francisco', 2, 1),
(104, 'San Jerónimo', 2, 1),
(105, 'San José De La Montaña', 2, 1),
(106, 'San Juan De Urabá', 2, 1),
(107, 'San Luis', 2, 1),
(108, 'San Pedro', 2, 1),
(109, 'San Pedro De Urabá', 2, 1),
(110, 'San Rafael', 2, 1),
(111, 'San Roque', 2, 1),
(112, 'San Vicente', 2, 1),
(113, 'Santa Bárbara', 2, 1),
(114, 'Santa Rosa De Osos', 2, 1),
(115, 'Santafé De Antioquia', 2, 1),
(116, 'Santo Domingo', 2, 1),
(117, 'Segovia', 2, 1),
(118, 'Sonson', 2, 1),
(119, 'Sopetrán', 2, 1),
(120, 'Támesis', 2, 1),
(121, 'Tarazá', 2, 1),
(122, 'Tarso', 2, 1),
(123, 'Titiribí', 2, 1),
(124, 'Toledo', 2, 1),
(125, 'Turbo', 2, 1),
(126, 'Uramita', 2, 1),
(127, 'Urrao', 2, 1),
(128, 'Valdivia', 2, 1),
(129, 'Valparaíso', 2, 1),
(130, 'Vegachí', 2, 1),
(131, 'Venecia', 2, 1),
(132, 'Vigía Del Fuerte', 2, 1),
(133, 'Yalí', 2, 1),
(134, 'Yarumal', 2, 1),
(135, 'Yolombó', 2, 1),
(136, 'Yondó', 2, 1),
(137, 'Zaragoza', 2, 1),
(138, 'Arauca', 3, 1),
(139, 'Arauquita', 3, 1),
(140, 'Cravo Norte', 3, 1),
(141, 'Fortul', 3, 1),
(142, 'Puerto Rondón', 3, 1),
(143, 'Saravena', 3, 1),
(144, 'Tame', 3, 1),
(145, 'Con Willemstad Antillas', 4, 1),
(146, 'Providencia', 4, 1),
(147, 'San Andrés', 4, 1),
(148, 'Baranoa', 5, 1),
(149, 'Barranquilla', 5, 1),
(150, 'Campo De La Cruz', 5, 1),
(151, 'Candelaria', 5, 1),
(152, 'Caracolí', 5, 1),
(153, 'Galapa', 5, 1),
(154, 'Juan De Acosta', 5, 1),
(155, 'Luruaco', 5, 1),
(156, 'Malambo', 5, 1),
(157, 'Manatí', 5, 1),
(158, 'Palmar De Varela', 5, 1),
(159, 'Piojó', 5, 1),
(160, 'Polonuevo', 5, 1),
(161, 'Ponedera', 5, 1),
(162, 'Puerto Colombia', 5, 1),
(163, 'Repelón', 5, 1),
(164, 'Sabanagrande', 5, 1),
(165, 'Sabanalarga', 5, 1),
(166, 'Santa Lucía', 5, 1),
(167, 'Santo Tomás', 5, 1),
(168, 'Soledad', 5, 1),
(169, 'Suan', 5, 1),
(170, 'Tubará', 5, 1),
(171, 'Usiacurí', 5, 1),
(172, 'Bogotá', 6, 1),
(173, 'Achí', 7, 1),
(174, 'Altos Del Rosario', 7, 1),
(175, 'Arenal', 7, 1),
(176, 'Arjona', 7, 1),
(177, 'Arroyohondo', 7, 1),
(178, 'Barranco De Loba', 7, 1),
(179, 'Calamar', 7, 1),
(180, 'Cantagallo', 7, 1),
(181, 'Cartagena', 7, 1),
(182, 'Cicuco', 7, 1),
(183, 'Clemencia', 7, 1),
(184, 'Córdoba', 7, 1),
(185, 'El Carmen De Bolívar', 7, 1),
(186, 'El Guamo', 7, 1),
(187, 'El Peñón', 7, 1),
(188, 'Hatillo De Loba', 7, 1),
(189, 'Magangué', 7, 1),
(190, 'Mahates', 7, 1),
(191, 'Margarita', 7, 1),
(192, 'María La Baja', 7, 1),
(193, 'Mompós', 7, 1),
(194, 'Montecristo', 7, 1),
(195, 'Morales', 7, 1),
(196, 'NOROSI', 7, 1),
(197, 'Pinillos', 7, 1),
(198, 'Regidor', 7, 1),
(199, 'Río Viejo', 7, 1),
(200, 'San Cristóbal', 7, 1),
(201, 'San Estanislao', 7, 1),
(202, 'San Fernando', 7, 1),
(203, 'San Jacinto', 7, 1),
(204, 'San Jacinto Del Cauca', 7, 1),
(205, 'San Juan Nepomuceno', 7, 1),
(206, 'San Martín De Loba', 7, 1),
(207, 'San Pablo', 7, 1),
(208, 'Santa Catalina', 7, 1),
(209, 'Santa Rosa', 7, 1),
(210, 'Santa Rosa Del Sur', 7, 1),
(211, 'Simití', 7, 1),
(212, 'Soplaviento', 7, 1),
(213, 'Talaigua Nuevo', 7, 1),
(214, 'Tiquisio', 7, 1),
(215, 'Turbaco', 7, 1),
(216, 'Turbaná', 7, 1),
(217, 'Villanueva', 7, 1),
(218, 'Zambrano', 7, 1),
(219, 'Almeida', 8, 1),
(220, 'Aquitania', 8, 1),
(221, 'Arcabuco', 8, 1),
(222, 'Belén', 8, 1),
(223, 'Berbeo', 8, 1),
(224, 'Betéitiva', 8, 1),
(225, 'Boavita', 8, 1),
(226, 'Boyacá', 8, 1),
(227, 'Briceño', 8, 1),
(228, 'Buenavista', 8, 1),
(229, 'Busbanzá', 8, 1),
(230, 'Caldas', 8, 1),
(231, 'Campohermoso', 8, 1),
(232, 'Cerinza', 8, 1),
(233, 'Chinavita', 8, 1),
(234, 'Chiquinquirá', 8, 1),
(235, 'Chíquiza', 8, 1),
(236, 'Chiscas', 8, 1),
(237, 'Chita', 8, 1),
(238, 'Chitaraque', 8, 1),
(239, 'Chivatá', 8, 1),
(240, 'Chivor', 8, 1),
(241, 'Ciénega', 8, 1),
(242, 'Cómbita', 8, 1),
(243, 'Coper', 8, 1),
(244, 'Corrales', 8, 1),
(245, 'Covarachía', 8, 1),
(246, 'Cubará', 8, 1),
(247, 'Cucaita', 8, 1),
(248, 'Cuítiva', 8, 1),
(249, 'Duitama', 8, 1),
(250, 'El Cocuy', 8, 1),
(251, 'El Espino', 8, 1),
(252, 'Firavitoba', 8, 1),
(253, 'Floresta', 8, 1),
(254, 'Gachantivá', 8, 1),
(255, 'Gameza', 8, 1),
(256, 'Garagoa', 8, 1),
(257, 'Guacamayas', 8, 1),
(258, 'Guateque', 8, 1),
(259, 'Guayatá', 8, 1),
(260, 'Güicán', 8, 1),
(261, 'Iza', 8, 1),
(262, 'Jenesano', 8, 1),
(263, 'Jericó', 8, 1),
(264, 'La Capilla', 8, 1),
(265, 'La Uvita', 8, 1),
(266, 'La Victoria', 8, 1),
(267, 'Labranzagrande', 8, 1),
(268, 'Macanal', 8, 1),
(269, 'Maripí', 8, 1),
(270, 'Miraflores', 8, 1),
(271, 'Mongua', 8, 1),
(272, 'Monguí', 8, 1),
(273, 'Moniquirá', 8, 1),
(274, 'Motavita', 8, 1),
(275, 'Muzo', 8, 1),
(276, 'Nobsa', 8, 1),
(277, 'Nuevo Colón', 8, 1),
(278, 'Oicatá', 8, 1),
(279, 'Otanche', 8, 1),
(280, 'Pachavita', 8, 1),
(281, 'Páez', 8, 1),
(282, 'Paipa', 8, 1),
(283, 'Pajarito', 8, 1),
(284, 'Panqueba', 8, 1),
(285, 'Pauna', 8, 1),
(286, 'Paya', 8, 1),
(287, 'Paz De Río', 8, 1),
(288, 'Pesca', 8, 1),
(289, 'Pisba', 8, 1),
(290, 'Puerto Boyacá', 8, 1),
(291, 'Quípama', 8, 1),
(292, 'Ramiriquí', 8, 1),
(293, 'Ráquira', 8, 1),
(294, 'Rondón', 8, 1),
(295, 'Saboyá', 8, 1),
(296, 'Sáchica', 8, 1),
(297, 'Samacá', 8, 1),
(298, 'San Eduardo', 8, 1),
(299, 'San José De Pare', 8, 1),
(300, 'San Luis De Gaceno', 8, 1),
(301, 'San Mateo', 8, 1),
(302, 'San Miguel De Sema', 8, 1),
(303, 'San Pablo De Borbur', 8, 1),
(304, 'Santa María', 8, 1),
(305, 'Santa Rosa De Viterbo', 8, 1),
(306, 'Santa Sofía', 8, 1),
(307, 'Santana', 8, 1),
(308, 'Sativanorte', 8, 1),
(309, 'Sativasur', 8, 1),
(310, 'Siachoque', 8, 1),
(311, 'Soatá', 8, 1),
(312, 'Socha', 8, 1),
(313, 'Socotá', 8, 1),
(314, 'Sogamoso', 8, 1),
(315, 'Somondoco', 8, 1),
(316, 'Sora', 8, 1),
(317, 'Soracá', 8, 1),
(318, 'Sotaquirá', 8, 1),
(319, 'Susacón', 8, 1),
(320, 'Sutamarchán', 8, 1),
(321, 'Sutatenza', 8, 1),
(322, 'Tasco', 8, 1),
(323, 'Tenza', 8, 1),
(324, 'Tibaná', 8, 1),
(325, 'Tibasosa', 8, 1),
(326, 'Tinjacá', 8, 1),
(327, 'Tipacoque', 8, 1),
(328, 'Toca', 8, 1),
(329, 'Togüí', 8, 1),
(330, 'Tópaga', 8, 1),
(331, 'Tota', 8, 1),
(332, 'Tunja', 8, 1),
(333, 'Tununguá', 8, 1),
(334, 'Turmequé', 8, 1),
(335, 'Tuta', 8, 1),
(336, 'Tutazá', 8, 1),
(337, 'Umbita', 8, 1),
(338, 'Ventaquemada', 8, 1),
(339, 'Villa De Leyva', 8, 1),
(340, 'Viracachá', 8, 1),
(341, 'Zetaquira', 8, 1),
(342, 'Aguadas', 9, 1),
(343, 'Anserma', 9, 1),
(344, 'Aranzazu', 9, 1),
(345, 'Belalcázar', 9, 1),
(346, 'Chinchiná', 9, 1),
(347, 'Filadelfia', 9, 1),
(348, 'La Dorada', 9, 1),
(349, 'La Merced', 9, 1),
(350, 'Manizales', 9, 1),
(351, 'Manzanares', 9, 1),
(352, 'Marmato', 9, 1),
(353, 'Marquetalia', 9, 1),
(354, 'Marulanda', 9, 1),
(355, 'Neira', 9, 1),
(356, 'Norcasia', 9, 1),
(357, 'Pácora', 9, 1),
(358, 'Palestina', 9, 1),
(359, 'Pensilvania', 9, 1),
(360, 'Riosucio', 9, 1),
(361, 'Risaralda', 9, 1),
(362, 'Salamina', 9, 1),
(363, 'Samaná', 9, 1),
(364, 'San José', 9, 1),
(365, 'Supía', 9, 1),
(366, 'Victoria', 9, 1),
(367, 'Villamaría', 9, 1),
(368, 'Viterbo', 9, 1),
(369, 'Albania', 10, 1),
(370, 'Belén De Los Andaquies', 10, 1),
(371, 'Cartagena Del Chairá', 10, 1),
(372, 'Curillo', 10, 1),
(373, 'El Doncello', 10, 1),
(374, 'El Paujil', 10, 1),
(375, 'Florencia', 10, 1),
(376, 'La Montañita', 10, 1),
(377, 'Milán', 10, 1),
(378, 'Morelia', 10, 1),
(379, 'Puerto Rico', 10, 1),
(380, 'San José Del Fragua', 10, 1),
(381, 'San Vicente Del Caguán', 10, 1),
(382, 'Solano', 10, 1),
(383, 'Solita', 10, 1),
(384, 'Valparaíso', 10, 1),
(385, 'Aguazul', 11, 1),
(386, 'Chameza', 11, 1),
(387, 'Hato Corozal', 11, 1),
(388, 'La Salina', 11, 1),
(389, 'Maní', 11, 1),
(390, 'Monterrey', 11, 1),
(391, 'Nunchía', 11, 1),
(392, 'Orocué', 11, 1),
(393, 'Paz De Ariporo', 11, 1),
(394, 'Pore', 11, 1),
(395, 'Recetor', 11, 1),
(396, 'Sabanalarga', 11, 1),
(397, 'Sácama', 11, 3),
(398, 'San Luis De Palenque', 11, 1),
(399, 'Támara', 11, 1),
(400, 'Tauramena', 11, 1),
(401, 'Trinidad', 11, 1),
(402, 'Villanueva', 11, 1),
(403, 'Yopal', 11, 1),
(404, 'Almaguer', 12, 1),
(405, 'Argelia', 12, 1),
(406, 'Balboa', 12, 1),
(407, 'Bolívar', 12, 1),
(408, 'Buenos Aires', 12, 1),
(409, 'Cajibío', 12, 1),
(410, 'Caldono', 12, 1),
(411, 'Caloto', 12, 1),
(412, 'Corinto', 12, 1),
(413, 'El Tambo', 12, 1),
(414, 'Florencia', 12, 1),
(415, 'GUACHENE', 12, 1),
(416, 'Guapi', 12, 1),
(417, 'Inzá', 12, 1),
(418, 'Jambaló', 12, 1),
(419, 'La Sierra', 12, 1),
(420, 'La Vega', 12, 1),
(421, 'López', 12, 1),
(422, 'Mercaderes', 12, 1),
(423, 'Miranda', 12, 1),
(424, 'Morales', 12, 1),
(425, 'Padilla', 12, 1),
(426, 'Paez', 12, 1),
(427, 'Patía', 12, 1),
(428, 'Piamonte', 12, 1),
(429, 'Piendamó', 12, 1),
(430, 'Popayán', 12, 1),
(431, 'Puerto Tejada', 12, 1),
(432, 'Puracé', 12, 1),
(433, 'Rosas', 12, 1),
(434, 'San Sebastián', 12, 1),
(435, 'Santa Rosa', 12, 1),
(436, 'Santander De Quilichao', 12, 1),
(437, 'Silvia', 12, 1),
(438, 'Sotara', 12, 1),
(439, 'Suárez', 12, 1),
(440, 'Sucre', 12, 1),
(441, 'Timbío', 12, 1),
(442, 'Timbiquí', 12, 1),
(443, 'Toribio', 12, 1),
(444, 'Totoró', 12, 1),
(445, 'Villa Rica', 12, 1),
(446, 'Aguachica', 13, 1),
(447, 'Agustín Codazzi', 13, 1),
(448, 'Astrea', 13, 1),
(449, 'Becerril', 13, 1),
(450, 'Bosconia', 13, 1),
(451, 'Chimichagua', 13, 1),
(452, 'Chiriguaná', 13, 1),
(453, 'Curumaní', 13, 1),
(454, 'El Copey', 13, 1),
(455, 'El Paso', 13, 1),
(456, 'Gamarra', 13, 1),
(457, 'González', 13, 1),
(458, 'La Gloria', 13, 1),
(459, 'La Jagua De Ibirico', 13, 1),
(460, 'La Paz', 13, 1),
(461, 'Manaure', 13, 1),
(462, 'Pailitas', 13, 1),
(463, 'Pelaya', 13, 1),
(464, 'Pueblo Bello', 13, 1),
(465, 'Río De Oro', 13, 1),
(466, 'San Alberto', 13, 1),
(467, 'San Diego', 13, 1),
(468, 'San Martín', 13, 1),
(469, 'Tamalameque', 13, 1),
(470, 'Valledupar', 13, 1),
(471, 'Acandí', 14, 1),
(472, 'Alto Baudo', 14, 1),
(473, 'Atrato', 14, 1),
(474, 'Bagadó', 14, 1),
(475, 'Bahía Solano', 14, 1),
(476, 'Bajo Baudó', 14, 1),
(477, 'Belén De Bajirá', 14, 1),
(478, 'Bojaya', 14, 1),
(479, 'Carmen Del Darien', 14, 1),
(480, 'Cértegui', 14, 1),
(481, 'Condoto', 14, 1),
(482, 'El Cantón Del San Pablo', 14, 1),
(483, 'El Carmen De Atrato', 14, 1),
(484, 'El Litoral Del San Juan', 14, 1),
(485, 'Istmina', 14, 1),
(486, 'Juradó', 14, 1),
(487, 'Lloró', 14, 1),
(488, 'Medio Atrato', 14, 1),
(489, 'Medio Baudó', 14, 1),
(490, 'Medio San Juan', 14, 1),
(491, 'Nóvita', 14, 1),
(492, 'Nuquí', 14, 1),
(493, 'Quibdó', 14, 1),
(494, 'Río Iro', 14, 1),
(495, 'Río Quito', 14, 1),
(496, 'Riosucio', 14, 1),
(497, 'San José Del Palmar', 14, 1),
(498, 'Sipí', 14, 1),
(499, 'Tadó', 14, 1),
(500, 'Unguía', 14, 1),
(501, 'Unión Panamericana', 14, 1),
(502, 'Ayapel', 15, 1),
(503, 'Buenavista', 15, 1),
(504, 'Canalete', 15, 1),
(505, 'Cereté', 15, 1),
(506, 'Chimá', 15, 1),
(507, 'Chinú', 15, 1),
(508, 'Ciénaga De Oro', 15, 1),
(509, 'Cotorra', 15, 1),
(510, 'La Apartada', 15, 1),
(511, 'Lorica', 15, 1),
(512, 'Los Córdobas', 15, 1),
(513, 'Momil', 15, 1),
(514, 'Montelíbano', 15, 1),
(515, 'Montería', 15, 1),
(516, 'Moñitos', 15, 1),
(517, 'Planeta Rica', 15, 1),
(518, 'Pueblo Nuevo', 15, 1),
(519, 'Puerto Escondido', 15, 1),
(520, 'Puerto Libertador', 15, 1),
(521, 'Purísima', 15, 1),
(522, 'Sahagún', 15, 1),
(523, 'San Andrés de Sotavento', 15, 1),
(524, 'San Andrés Sotavento', 15, 1),
(525, 'San Antero', 15, 1),
(526, 'San Bernardo Del Viento', 15, 1),
(527, 'San Carlos', 15, 1),
(528, 'San José De Uré', 15, 1),
(529, 'San Pelayo', 15, 1),
(530, 'Tierralta', 15, 1),
(531, 'Tuchín', 15, 1),
(532, 'Valencia', 15, 1),
(533, 'Agua De Dios', 16, 1),
(534, 'Albán', 16, 1),
(535, 'Anapoima', 16, 1),
(536, 'Anolaima', 16, 1),
(537, 'Apulo', 16, 1),
(538, 'Arbeláez', 16, 1),
(539, 'Beltrán', 16, 1),
(540, 'Bituima', 16, 1),
(541, 'Bojacá', 16, 1),
(542, 'Cabrera', 16, 1),
(543, 'Cachipay', 16, 1),
(544, 'Cajicá', 16, 1),
(545, 'Caparrapí', 16, 1),
(546, 'Caqueza', 16, 1),
(547, 'Carmen De Carupa', 16, 1),
(548, 'Chaguaní', 16, 1),
(549, 'Chía', 16, 1),
(550, 'Chipaque', 16, 1),
(551, 'Choachí', 16, 1),
(552, 'Chocontá', 16, 1),
(553, 'Cogua', 16, 1),
(554, 'Cota', 16, 1),
(555, 'Cucunubá', 16, 1),
(556, 'El Colegio', 16, 1),
(557, 'El Peñón', 16, 1),
(558, 'El Rosal', 16, 1),
(559, 'Facatativá', 16, 1),
(560, 'Fomeque', 16, 1),
(561, 'Fontibon', 16, 1),
(562, 'Fosca', 16, 1),
(563, 'Funza', 16, 1),
(564, 'Fúquene', 16, 1),
(565, 'Fusagasugá', 16, 1),
(566, 'Gachala', 16, 1),
(567, 'Gachancipá', 16, 1),
(568, 'Gachetá', 16, 1),
(569, 'Gama', 16, 1),
(570, 'Girardot', 16, 1),
(571, 'Granada', 16, 1),
(572, 'Guachetá', 16, 1),
(573, 'Guaduas', 16, 1),
(574, 'Guasca', 16, 1),
(575, 'Guataquí', 16, 1),
(576, 'Guatavita', 16, 1),
(577, 'Guayabal De Siquima', 16, 1),
(578, 'Guayabetal', 16, 1),
(579, 'Gutiérrez', 16, 1),
(580, 'Jerusalén', 16, 1),
(581, 'Junín', 16, 1),
(582, 'La Calera', 16, 1),
(583, 'La Mesa', 16, 1),
(584, 'La Palma', 16, 1),
(585, 'La Peña', 16, 1),
(586, 'La Vega', 16, 1),
(587, 'Lenguazaque', 16, 1),
(588, 'Macheta', 16, 1),
(589, 'Madrid', 16, 1),
(590, 'Manta', 16, 1),
(591, 'Medina', 16, 1),
(592, 'Mosquera', 16, 1),
(593, 'Nariño', 16, 1),
(594, 'Nemocón', 16, 1),
(595, 'Nilo', 16, 1),
(596, 'Nimaima', 16, 1),
(597, 'Nocaima', 16, 1),
(598, 'Pacho', 16, 1),
(599, 'Paime', 16, 1),
(600, 'Pandi', 16, 1),
(601, 'Paratebueno', 16, 1),
(602, 'Pasca', 16, 1),
(603, 'Puerto Salgar', 16, 1),
(604, 'Pulí', 16, 1),
(605, 'Quebradanegra', 16, 1),
(606, 'Quetame', 16, 1),
(607, 'Quipile', 16, 1),
(608, 'Ricaurte', 16, 1),
(609, 'San Antonio Del Tequendama', 16, 1),
(610, 'San Bernardo', 16, 1),
(611, 'San Cayetano', 16, 1),
(612, 'San Francisco', 16, 1),
(613, 'San Juan De Río Seco', 16, 1),
(614, 'Sasaima', 16, 1),
(615, 'Sesquilé', 16, 1),
(616, 'Sibaté', 16, 1),
(617, 'Silvania', 16, 1),
(618, 'Simijaca', 16, 1),
(619, 'Soacha', 16, 1),
(620, 'Sopó', 16, 1),
(621, 'Subachoque', 16, 1),
(622, 'Suesca', 16, 1),
(623, 'Supatá', 16, 1),
(624, 'Susa', 16, 1),
(625, 'Sutatausa', 16, 1),
(626, 'Tabio', 16, 1),
(627, 'Tausa', 16, 1),
(628, 'Tena', 16, 1),
(629, 'Tenjo', 16, 1),
(630, 'Tibacuy', 16, 1),
(631, 'Tibirita', 16, 1),
(632, 'Tocaima', 16, 1),
(633, 'Tocancipá', 16, 1),
(634, 'Topaipí', 16, 1),
(635, 'Ubalá', 16, 1),
(636, 'Ubaque', 16, 1),
(637, 'Une', 16, 1),
(638, 'Útica', 16, 1),
(639, 'Venecia', 16, 1),
(640, 'Vergara', 16, 1),
(641, 'Vianí', 16, 1),
(642, 'Villa De San Diego De Ubate', 16, 1),
(643, 'Villagómez', 16, 1),
(644, 'Villapinzón', 16, 1),
(645, 'Villeta', 16, 1),
(646, 'Viotá', 16, 1),
(647, 'Yacopí', 16, 1),
(648, 'Zipacón', 16, 1),
(649, 'Zipaquirá', 16, 1),
(650, 'Barranco Minas', 17, 1),
(651, 'Cacahual', 17, 1),
(652, 'Inírida', 17, 1),
(653, 'La Guadalupe', 17, 1),
(654, 'Mapiripana', 17, 1),
(655, 'Morichal', 17, 1),
(656, 'Pana Pana', 17, 1),
(657, 'Puerto Colombia', 17, 1),
(658, 'San Felipe', 17, 1),
(659, 'Calamar', 18, 1),
(660, 'El Retorno', 18, 1),
(661, 'Miraflores', 18, 1),
(662, 'San José Del Guaviare', 18, 1),
(663, 'Acevedo', 19, 1),
(664, 'Agrado', 19, 1),
(665, 'Aipe', 19, 1),
(666, 'Algeciras', 19, 1),
(667, 'Altamira', 19, 1),
(668, 'Baraya', 19, 1),
(669, 'Campoalegre', 19, 1),
(670, 'Colombia', 19, 1),
(671, 'Elías', 19, 1),
(672, 'Garzón', 19, 1),
(673, 'Gigante', 19, 1),
(674, 'Guacarí', 19, 1),
(675, 'Guadalupe', 19, 1),
(676, 'Hobo', 19, 1),
(677, 'Iquira', 19, 1),
(678, 'Isnos', 19, 1),
(679, 'La Argentina', 19, 1),
(680, 'La Plata', 19, 1),
(681, 'Nátaga', 19, 1),
(682, 'Neiva', 19, 1),
(683, 'Oporapa', 19, 1),
(684, 'Paicol', 19, 1),
(685, 'Palermo', 19, 1),
(686, 'Palestina', 19, 1),
(687, 'Pital', 19, 1),
(688, 'Pitalito', 19, 1),
(689, 'Rivera', 19, 1),
(690, 'Saladoblanco', 19, 1),
(691, 'San Agustín', 19, 1),
(692, 'Santa María', 19, 1),
(693, 'Suaza', 19, 1),
(694, 'Tarqui', 19, 1),
(695, 'Tello', 19, 1),
(696, 'Teruel', 19, 1),
(697, 'Tesalia', 19, 1),
(698, 'Timaná', 19, 1),
(699, 'Villavieja', 19, 1),
(700, 'Yaguará', 19, 1),
(701, 'Albania', 20, 1),
(702, 'Arriba', 20, 1),
(703, 'Barrancas', 20, 1),
(704, 'Dibulla', 20, 1),
(705, 'Distracción', 20, 1),
(706, 'El Molino', 20, 1),
(707, 'Fonseca', 20, 1),
(708, 'Hatonuevo', 20, 1),
(709, 'La Jagua Del Pilar', 20, 1),
(710, 'Maicao', 20, 1),
(711, 'Manaure', 20, 1),
(712, 'Riohacha', 20, 1),
(713, 'San Juan Del Cesar', 20, 1),
(714, 'Uribia', 20, 1),
(715, 'Urumita', 20, 1),
(716, 'Villanueva', 20, 1),
(717, 'Algarrobo', 21, 1),
(718, 'Aracataca', 21, 1),
(719, 'Ariguaní', 21, 1),
(720, 'Cerro de San Antonio', 21, 1),
(721, 'Cerro San Antonio', 21, 1),
(722, 'Chibolo', 21, 1),
(723, 'Ciénaga', 21, 1),
(724, 'Concordia', 21, 1),
(725, 'El Banco', 21, 1),
(726, 'El Piñón', 21, 1),
(727, 'El Retén', 21, 1),
(728, 'Fundación', 21, 1),
(729, 'Guamal', 21, 1),
(730, 'Nueva Granada', 21, 1),
(731, 'Palermo', 21, 1),
(732, 'Pedraza', 21, 1),
(733, 'Pijiño Del Carmen', 21, 1),
(734, 'Pivijay', 21, 1),
(735, 'Plato', 21, 1),
(736, 'Puebloviejo', 21, 1),
(737, 'Remolino', 21, 1),
(738, 'Sabanas De San Angel', 21, 1),
(739, 'Salamina', 21, 1),
(740, 'San Sebastián De Buenavista', 21, 1),
(741, 'San Zenón', 21, 1),
(742, 'Santa Ana', 21, 1),
(743, 'Santa Bárbara De Pinto', 21, 1),
(744, 'Santa Marta', 21, 1),
(745, 'Sitionuevo', 21, 1),
(746, 'Tenerife', 21, 1),
(747, 'Zapayán', 21, 1),
(748, 'Zona Bananera', 21, 1),
(749, 'Acacías', 22, 1),
(750, 'Barranca De Upía', 22, 1),
(751, 'Cabuyaro', 22, 1),
(752, 'Castilla La Nueva', 22, 1),
(753, 'Costa Rica', 22, 1),
(754, 'Cubarral', 22, 1),
(755, 'Cumaral', 22, 1),
(756, 'El Calvario', 22, 1),
(757, 'El Castillo', 22, 1),
(758, 'El Dorado', 22, 1),
(759, 'Fuente De Oro', 22, 1),
(760, 'Granada', 22, 1),
(761, 'Guamal', 22, 1),
(762, 'La Macarena', 22, 1),
(763, 'Lejanías', 22, 1),
(764, 'Mapiripán', 22, 1),
(765, 'Mesetas', 22, 1),
(766, 'Puerto Concordia', 22, 1),
(767, 'Puerto Gaitán', 22, 1),
(768, 'Puerto Lleras', 22, 1),
(769, 'Puerto López', 22, 1),
(770, 'Puerto Rico', 22, 1),
(771, 'Restrepo', 22, 1),
(772, 'San Carlos De Guaroa', 22, 1),
(773, 'San Juan De Arama', 22, 1),
(774, 'San Juanito', 22, 1),
(775, 'San Martín', 22, 1),
(776, 'Uribe', 22, 1),
(777, 'Villavicencio', 22, 1),
(778, 'Vistahermosa', 22, 1),
(779, 'Albán', 23, 1),
(780, 'Aldana', 23, 1),
(781, 'Ancuyá', 23, 1),
(782, 'Arboleda', 23, 1),
(783, 'Barbacoas', 23, 1),
(784, 'Belén', 23, 1),
(785, 'Buesaco', 23, 1),
(786, 'Chachagüí', 23, 1),
(787, 'Colón', 23, 1),
(788, 'Consaca', 23, 1),
(789, 'Contadero', 23, 1),
(790, 'Córdoba', 23, 1),
(791, 'Cuaspud', 23, 1),
(792, 'Cumbal', 23, 1),
(793, 'Cumbitara', 23, 1),
(794, 'El Charco', 23, 1),
(795, 'El Peñol', 23, 1),
(796, 'El Rosario', 23, 1),
(797, 'El Tablón De Gómez', 23, 1),
(798, 'El Tambo', 23, 1),
(799, 'Francisco Pizarro', 23, 1),
(800, 'Funes', 23, 1),
(801, 'Guachucal', 23, 1),
(802, 'Guaitarilla', 23, 1),
(803, 'Gualmatán', 23, 1),
(804, 'Iles', 23, 1),
(805, 'Imués', 23, 1),
(806, 'Ipiales', 23, 1),
(807, 'La Cruz', 23, 1),
(808, 'La Florida', 23, 1),
(809, 'La Llanada', 23, 1),
(810, 'La Tola', 23, 1),
(811, 'La Unión', 23, 1),
(812, 'Leiva', 23, 1),
(813, 'Linares', 23, 1),
(814, 'Los Andes', 23, 1),
(815, 'Magüi', 23, 1),
(816, 'Mallama', 23, 1),
(817, 'Mosquera', 23, 1),
(818, 'Nariño', 23, 1),
(819, 'Olaya Herrera', 23, 1),
(820, 'Ospina', 23, 1),
(821, 'Pasto', 23, 1),
(822, 'Policarpa', 23, 1),
(823, 'Potosí', 23, 1),
(824, 'Providencia', 23, 1),
(825, 'Puerres', 23, 1),
(826, 'Pupiales', 23, 1),
(827, 'Ricaurte', 23, 1),
(828, 'Roberto Payán', 23, 1),
(829, 'Samaniego', 23, 1),
(830, 'San Bernardo', 23, 1),
(831, 'San Lorenzo', 23, 1),
(832, 'San Pablo', 23, 1),
(833, 'San Pedro De Cartago', 23, 1),
(834, 'Sandoná', 23, 1),
(835, 'Santa Bárbara', 23, 1),
(836, 'Santacruz', 23, 1),
(837, 'Sapuyes', 23, 1),
(838, 'Taminango', 23, 1),
(839, 'Tangua', 23, 1),
(840, 'Tumaco', 23, 1),
(841, 'Túquerres', 23, 1),
(842, 'Yacuanquer', 23, 1),
(843, 'Abrego', 24, 1),
(844, 'Arboledas', 24, 1),
(845, 'Bochalema', 24, 1),
(846, 'Bucarasica', 24, 1),
(847, 'Cachirá', 24, 1),
(848, 'Cácota', 24, 1),
(849, 'Chinácota', 24, 1),
(850, 'Chitagá', 24, 1),
(851, 'Convención', 24, 1),
(852, 'Cúcuta', 24, 1),
(853, 'Cucutilla', 24, 1),
(854, 'Durania', 24, 1),
(855, 'El Carmen', 24, 1),
(856, 'El Tarra', 24, 1),
(857, 'El Zulia', 24, 1),
(858, 'Gramalote', 24, 1),
(859, 'Hacarí', 24, 1),
(860, 'Herrán', 24, 1),
(861, 'La Esperanza', 24, 1),
(862, 'La Playa', 24, 1),
(863, 'La Vega', 24, 1),
(864, 'Labateca', 24, 1),
(865, 'Los Patios', 24, 1),
(866, 'Lourdes', 24, 1),
(867, 'Mutiscua', 24, 1),
(868, 'Ocaña', 24, 1),
(869, 'Pamplona', 24, 1),
(870, 'Pamplonita', 24, 1),
(871, 'Puerto Santander', 24, 1),
(872, 'Ragonvalia', 24, 1),
(873, 'Salazar', 24, 1),
(874, 'San Calixto', 24, 1),
(875, 'San Cayetano', 24, 1),
(876, 'Santiago', 24, 1),
(877, 'Sardinata', 24, 1),
(878, 'Silos', 24, 1),
(879, 'Teorama', 24, 1),
(880, 'Tibú', 24, 1),
(881, 'Toledo', 24, 1),
(882, 'Villa Caro', 24, 1),
(883, 'Villa Del Rosario', 24, 1),
(884, 'Colón', 25, 1),
(885, 'Mocoa', 25, 1),
(886, 'Orito', 25, 1),
(887, 'Puerto Asís', 25, 1),
(888, 'Puerto Caicedo', 25, 1),
(889, 'Puerto Guzmán', 25, 1),
(890, 'Puerto Leguizamo', 25, 1),
(891, 'San Francisco', 25, 1),
(892, 'San Miguel', 25, 1),
(893, 'Santiago', 25, 1),
(894, 'Sibundoy', 25, 1),
(895, 'Valle Del Guamuez', 25, 1),
(896, 'Villagarzón', 25, 1),
(897, 'Armenia', 26, 1),
(898, 'Buenavista', 26, 1),
(899, 'Calarca', 26, 1),
(900, 'Circasia', 26, 1),
(901, 'Córdoba', 26, 1),
(902, 'Filandia', 26, 1),
(903, 'Génova', 26, 1),
(904, 'La Tebaida', 26, 1),
(905, 'Montenegro', 26, 1),
(906, 'Pijao', 26, 1),
(907, 'Quimbaya', 26, 1),
(908, 'Salento', 26, 1),
(909, 'Apía', 27, 1),
(910, 'Balboa', 27, 1),
(911, 'Belén De Umbría', 27, 1),
(912, 'Dosquebradas', 27, 1),
(913, 'Guática', 27, 1),
(914, 'La Celia', 27, 1),
(915, 'La Virginia', 27, 1),
(916, 'Marsella', 27, 1),
(917, 'Mistrató', 27, 1),
(918, 'Pereira', 27, 1),
(919, 'Pueblo Rico', 27, 1),
(920, 'Quinchía', 27, 1),
(921, 'Santa Rosa De Cabal', 27, 1),
(922, 'Santuario', 27, 1),
(923, 'Aguada', 28, 1),
(924, 'Albania', 28, 1),
(925, 'Aratoca', 28, 1),
(926, 'Barbosa', 28, 1),
(927, 'Barichara', 28, 1),
(928, 'Barrancabermeja', 28, 1),
(929, 'Betulia', 28, 1),
(930, 'Bolívar', 28, 1),
(931, 'Bucaramanga', 28, 1),
(932, 'Cabrera', 28, 1),
(933, 'California', 28, 1),
(934, 'Capitanejo', 28, 1),
(935, 'Carcasí', 28, 1),
(936, 'Cepitá', 28, 1),
(937, 'Cerrito', 28, 1),
(938, 'Charalá', 28, 1),
(939, 'Charta', 28, 1),
(940, 'Chima', 28, 1),
(941, 'Chipatá', 28, 1),
(942, 'Cimitarra', 28, 1),
(943, 'Concepción', 28, 1),
(944, 'Confines', 28, 1),
(945, 'Contratación', 28, 1),
(946, 'Coromoro', 28, 1),
(947, 'Curití', 28, 1),
(948, 'El Carmen De Chucurí', 28, 1),
(949, 'El Guacamayo', 28, 1),
(950, 'El Peñón', 28, 1),
(951, 'El Playón', 28, 1),
(952, 'Encino', 28, 1),
(953, 'Enciso', 28, 1),
(954, 'Florián', 28, 1),
(955, 'Floridablanca', 28, 1),
(956, 'Galán', 28, 1),
(957, 'Gambita', 28, 1),
(958, 'Girón', 28, 1),
(959, 'Guaca', 28, 1),
(960, 'Guadalupe', 28, 1),
(961, 'Guapotá', 28, 1),
(962, 'Guavatá', 28, 1),
(963, 'Güepsa', 28, 1),
(964, 'Hato', 28, 1),
(965, 'Jesús María', 28, 1),
(966, 'Jordán', 28, 1),
(967, 'La Belleza', 28, 1),
(968, 'La Paz', 28, 1),
(969, 'Landázuri', 28, 1),
(970, 'Lebríja', 28, 1),
(971, 'Los Santos', 28, 1),
(972, 'Macaravita', 28, 1),
(973, 'Málaga', 28, 1),
(974, 'Matanza', 28, 1),
(975, 'Mogotes', 28, 1),
(976, 'Molagavita', 28, 1),
(977, 'Ocamonte', 28, 1),
(978, 'Oiba', 28, 1),
(979, 'Onzaga', 28, 1),
(980, 'Palmar', 28, 1),
(981, 'Palmas Del Socorro', 28, 1),
(982, 'Páramo', 28, 1),
(983, 'Piedecuesta', 28, 1),
(984, 'Pinchote', 28, 1),
(985, 'Puente Nacional', 28, 1),
(986, 'Puerto Parra', 28, 1),
(987, 'Puerto Wilches', 28, 1),
(988, 'Rionegro', 28, 1),
(989, 'Sabana De Torres', 28, 1),
(990, 'San Andrés', 28, 1),
(991, 'San Benito', 28, 1),
(992, 'San Gil', 28, 1),
(993, 'San Joaquín', 28, 1),
(994, 'San José De Miranda', 28, 1),
(995, 'San Miguel', 28, 1),
(996, 'San Vicente De Chucurí', 28, 1),
(997, 'Santa Bárbara', 28, 1),
(998, 'Santa Helena Del Opón', 28, 1),
(999, 'Silos', 28, 1),
(1000, 'Simacota', 28, 1),
(1001, 'Socorro', 28, 1),
(1002, 'Suaita', 28, 1),
(1003, 'Sucre', 28, 1),
(1004, 'Suratá', 28, 1),
(1005, 'Tona', 28, 1),
(1006, 'Valle De San José', 28, 1),
(1007, 'Vélez', 28, 1),
(1008, 'Vetas', 28, 1),
(1009, 'Villanueva', 28, 1),
(1010, 'Zapatoca', 28, 1),
(1011, 'Buenavista', 29, 1),
(1012, 'Caimito', 29, 1),
(1013, 'Chalán', 29, 1),
(1014, 'Coloso', 29, 1),
(1015, 'Corozal', 29, 1),
(1016, 'Coveñas', 29, 1),
(1017, 'El Roble', 29, 1),
(1018, 'Galeras', 29, 1),
(1019, 'Guaranda', 29, 1),
(1020, 'La Unión', 29, 1),
(1021, 'Los Palmitos', 29, 1),
(1022, 'Majagual', 29, 1),
(1023, 'Morroa', 29, 1),
(1024, 'Ovejas', 29, 1),
(1025, 'Palmito', 29, 1),
(1026, 'Sampués', 29, 1),
(1027, 'San Benito Abad', 29, 1),
(1028, 'San Juan De Betulia', 29, 1),
(1029, 'San Marcos', 29, 1),
(1030, 'San Onofre', 29, 1),
(1031, 'San Pedro', 29, 1),
(1032, 'Santiago De Tolú', 29, 1),
(1033, 'Sincé', 29, 1),
(1034, 'Sincelejo', 29, 1),
(1035, 'Sucre', 29, 1),
(1036, 'Tolú Viejo', 29, 1),
(1037, 'Alpujarra', 30, 1),
(1038, 'Alvarado', 30, 1),
(1039, 'Ambalema', 30, 1),
(1040, 'Anzoátegui', 30, 1),
(1041, 'Armero', 30, 1),
(1042, 'Ataco', 30, 1),
(1043, 'Cajamarca', 30, 1),
(1044, 'Carmen De Apicalá', 30, 1),
(1045, 'Carmen de Aplicalá', 30, 1),
(1046, 'Casabianca', 30, 1),
(1047, 'Chaparral', 30, 1),
(1048, 'Coello', 30, 1),
(1049, 'Coyaima', 30, 1),
(1050, 'Cunday', 30, 1),
(1051, 'Dolores', 30, 1),
(1052, 'Espinal', 30, 1),
(1053, 'Falan', 30, 1),
(1054, 'Flandes', 30, 1),
(1055, 'Fresno', 30, 1),
(1056, 'Guamo', 30, 1),
(1057, 'Herveo', 30, 1),
(1058, 'Honda', 30, 1),
(1059, 'Ibagué', 30, 1),
(1060, 'Icononzo', 30, 1),
(1061, 'Lérida', 30, 1),
(1062, 'Líbano', 30, 1),
(1063, 'Mariquita', 30, 1),
(1064, 'Melgar', 30, 1),
(1065, 'Murillo', 30, 1),
(1066, 'Natagaima', 30, 1),
(1067, 'Ortega', 30, 1),
(1068, 'Palocabildo', 30, 1),
(1069, 'Piedras', 30, 1),
(1070, 'Planadas', 30, 1),
(1071, 'Prado', 30, 1),
(1072, 'Purificación', 30, 1),
(1073, 'Rioblanco', 30, 1),
(1074, 'Roncesvalles', 30, 1),
(1075, 'Rovira', 30, 1),
(1076, 'Saldaña', 30, 1),
(1077, 'San Antonio', 30, 1),
(1078, 'San Luis', 30, 1),
(1079, 'Santa Isabel', 30, 1),
(1080, 'Suárez', 30, 1),
(1081, 'Valle De San Juan', 30, 1),
(1082, 'Venadillo', 30, 1),
(1083, 'Villahermosa', 30, 1),
(1084, 'Villarrica', 30, 1),
(1085, 'Alcalá', 31, 1),
(1086, 'Andalucía', 31, 1),
(1087, 'Ansermanuevo', 31, 1),
(1088, 'Argelia', 31, 1),
(1089, 'Bolívar', 31, 1),
(1090, 'Buenaventura', 31, 1),
(1091, 'Buga', 31, 1),
(1092, 'Bugalagrande', 31, 1),
(1093, 'Caicedonia', 31, 1),
(1094, 'Cali', 31, 1),
(1095, 'Calima', 31, 1),
(1096, 'Calima Darien', 31, 1),
(1097, 'Candelaria', 31, 1),
(1098, 'Carrito', 31, 1),
(1099, 'Cartago', 31, 1),
(1100, 'Dagua', 31, 1),
(1101, 'El Águila', 31, 1),
(1102, 'El Cairo', 31, 1),
(1103, 'El Cerrito', 31, 1),
(1104, 'El Dovio', 31, 1),
(1105, 'Florida', 31, 1),
(1106, 'Ginebra', 31, 1),
(1107, 'Guacarí', 31, 1),
(1108, 'Jamundí', 31, 1),
(1109, 'La Cumbre', 31, 1),
(1110, 'La Unión', 31, 1),
(1111, 'La Victoria', 31, 1),
(1112, 'Obando', 31, 1),
(1113, 'Palmira', 31, 1),
(1114, 'Paso Ancho', 31, 1),
(1115, 'Plandas', 31, 1),
(1116, 'Pradera', 31, 1),
(1117, 'Restrepo', 31, 1),
(1118, 'Riofrío', 31, 1),
(1119, 'Roldanillo', 31, 1),
(1120, 'Rosario', 31, 1),
(1121, 'San Pedro', 31, 1),
(1122, 'Sevilla', 31, 1),
(1123, 'Tambo', 31, 1),
(1124, 'Toro', 31, 1),
(1125, 'Trujillo', 31, 1),
(1126, 'Tuluá', 31, 1),
(1127, 'Ulloa', 31, 1),
(1128, 'Versalles', 31, 1),
(1129, 'Vijes', 31, 1),
(1130, 'Yotoco', 31, 1),
(1131, 'Yumbo', 31, 1),
(1132, 'Zarzal', 31, 1),
(1133, 'Caruru', 32, 1),
(1134, 'Mitú', 32, 1),
(1135, 'Pacoa', 32, 1),
(1136, 'Papunaua', 32, 1),
(1137, 'Taraira', 32, 1),
(1138, 'Yavaraté', 32, 1),
(1139, 'Cumaribo', 33, 1),
(1140, 'La Primavera', 33, 1),
(1141, 'Puerto Carreño', 33, 1),
(1142, 'Santa Rosalía', 33, 1),
(1143, 'Ambato', 34, 2),
(1144, 'Camilo Ponce Enríquez', 35, 2),
(1145, 'Chordeleg', 35, 2),
(1146, 'Cuenca', 35, 2),
(1147, 'Elpan', 35, 2),
(1148, 'Girón', 35, 2),
(1149, 'Guachapala', 35, 2),
(1150, 'Gualaceo', 35, 2),
(1151, 'Nabon', 35, 2),
(1152, 'Oña', 35, 2),
(1153, 'Paute', 35, 2),
(1154, 'Pucara', 35, 2),
(1155, 'San Fernando', 35, 2),
(1156, 'Santa Isabel', 35, 2),
(1157, 'Sevilla De Oro', 35, 2),
(1158, 'Sigsig', 35, 2),
(1159, 'Caluma', 36, 2),
(1160, 'Chillanes', 36, 2),
(1161, 'Chimbo', 36, 2),
(1162, 'Echeandia', 36, 2),
(1163, 'Guaranda', 36, 2),
(1164, 'Las Naves', 36, 2),
(1165, 'San Miguel', 36, 2),
(1166, 'Azogues', 37, 2),
(1167, 'Biblian', 37, 2),
(1168, 'Cañar', 37, 2),
(1169, 'Deleg', 37, 2),
(1170, 'El Tambo', 37, 2),
(1171, 'Latroncal', 37, 2),
(1172, 'Suscal', 37, 2),
(1173, 'Bolivar', 38, 2),
(1174, 'Espejo', 38, 2),
(1175, 'Mira', 38, 2),
(1176, 'Montufar', 38, 2),
(1177, 'San Pedro De Huaca', 38, 2),
(1178, 'Tulcan', 38, 2),
(1179, 'Alausi', 39, 2),
(1180, 'Chambo', 39, 2),
(1181, 'Chunchi', 39, 2),
(1182, 'Colta', 39, 2),
(1183, 'Cumanda', 39, 2),
(1184, 'Guamote', 39, 2),
(1185, 'Guano', 39, 2),
(1186, 'Pallatanga', 39, 2),
(1187, 'Penipe', 39, 2),
(1188, 'Riobamba', 39, 2),
(1189, 'La Mana', 40, 2),
(1190, 'Latacunga', 40, 2),
(1191, 'Pangua', 40, 2),
(1192, 'Pujili', 40, 2),
(1193, 'Salcedo', 40, 2),
(1194, 'Saquisili', 40, 2),
(1195, 'Sigchos', 40, 2),
(1196, 'Ecuador', 41, 2),
(1197, 'Arenillas', 42, 2),
(1198, 'Atahualpa', 42, 2),
(1199, 'Balsas', 42, 2),
(1200, 'Chilla', 42, 2),
(1201, 'El Guabo', 42, 2),
(1202, 'Huaquillas', 42, 2),
(1203, 'Las Lajas', 42, 2),
(1204, 'Machala', 42, 2),
(1205, 'Marcabeli', 42, 2),
(1206, 'Pasaje', 42, 2),
(1207, 'Piñas', 42, 2),
(1208, 'Portovelo', 42, 2),
(1209, 'Santa Rosa', 42, 2),
(1210, 'Zaruma', 42, 2),
(1211, 'Atacames', 43, 2),
(1212, 'Eloy Alfaro', 43, 2),
(1213, 'Esmeraldas', 43, 2),
(1214, 'La Concordia', 43, 2),
(1215, 'Muisne', 43, 2),
(1216, 'Quininde', 43, 2),
(1217, 'Rioverde', 43, 2),
(1218, 'San Lorenzo', 43, 2),
(1219, 'Valdez (Limones)', 43, 2),
(1220, 'Isabela', 44, 2),
(1221, 'Puerto Baquerizo Moreno', 44, 2),
(1222, 'San Cristobal', 44, 2),
(1223, 'Santa Cruz', 44, 2),
(1224, 'Alfredo Baquerizo Moreno (Jujan)', 45, 2),
(1225, 'Balao', 45, 2),
(1226, 'Balzar', 45, 2),
(1227, 'Colimes', 45, 2),
(1228, 'Coronel Marcelino Maridueña', 45, 2),
(1229, 'Daule', 45, 2),
(1230, 'Duran', 45, 2),
(1231, 'El Triunfo', 45, 2),
(1232, 'Elempalme', 45, 2),
(1233, 'General Antonio Elizalde', 45, 2),
(1234, 'Guayaquil', 45, 2),
(1235, 'Isidro Ayora', 45, 2),
(1236, 'Lomas De Sargentillo', 45, 2),
(1237, 'Milagro', 45, 2),
(1238, 'Naranjal', 45, 2),
(1239, 'Naranjito', 45, 2),
(1240, 'Nobol', 45, 2),
(1241, 'Palestina', 45, 2),
(1242, 'Pedro Carbo', 45, 2),
(1243, 'Playas', 45, 2),
(1244, 'Salitre (Urbina Jado)', 45, 2),
(1245, 'Samborondon', 45, 2),
(1246, 'San Jacinto De Yaguachi', 45, 2),
(1247, 'Santa Lucia', 45, 2),
(1248, 'Simon Bolivar', 45, 2),
(1249, 'Antonio Ante', 46, 2),
(1250, 'Cotacachi', 46, 2),
(1251, 'Ibarra', 46, 2),
(1252, 'Otavalo', 46, 2),
(1253, 'Pimampiro', 46, 2),
(1254, 'San Miguel De Urcuqui', 46, 2),
(1255, 'Calvas', 47, 2),
(1256, 'Catamayo', 47, 2),
(1257, 'Celica', 47, 2),
(1258, 'Chaguarpamba', 47, 2),
(1259, 'Espindola', 47, 2),
(1260, 'Gonzanama', 47, 2),
(1261, 'Loja', 47, 2),
(1262, 'Macara', 47, 2),
(1263, 'Olmedo', 47, 2),
(1264, 'Paltas', 47, 2),
(1265, 'Pindal', 47, 2),
(1266, 'Puyango', 47, 2),
(1267, 'Quilanga', 47, 2),
(1268, 'Saraguro', 47, 2),
(1269, 'Sozoranga', 47, 2),
(1270, 'Zapotillo', 47, 2),
(1271, 'Baba', 48, 2),
(1272, 'Babahoyo', 48, 2),
(1273, 'Buena Fe', 48, 2),
(1274, 'Mocache', 48, 2),
(1275, 'Montalvo', 48, 2),
(1276, 'Palenque', 48, 2),
(1277, 'Puebloviejo', 48, 2),
(1278, 'Quevedo', 48, 2),
(1279, 'Quinsaloma', 48, 2),
(1280, 'Urdaneta', 48, 2),
(1281, 'Valencia', 48, 2),
(1282, 'Ventanas', 48, 2),
(1283, 'Vinces', 48, 2),
(1284, '24 De Mayo', 49, 2),
(1285, 'Bolivar', 49, 2),
(1286, 'Chone', 49, 2),
(1287, 'El Carmen', 49, 2),
(1288, 'Flavio Alfaro', 49, 2),
(1289, 'Jama', 49, 2),
(1290, 'Jaramijo', 49, 2),
(1291, 'Jipijapa', 49, 2),
(1292, 'Junin', 49, 2),
(1293, 'Manta', 49, 2),
(1294, 'Montecristi', 49, 2),
(1295, 'Pajan', 49, 2),
(1296, 'Pedernales', 49, 2),
(1297, 'Pichincha', 49, 2),
(1298, 'Portoviejo', 49, 2),
(1299, 'Puerto Lopez', 49, 2),
(1300, 'Rocafuerte', 49, 2),
(1301, 'San Vicente', 49, 2),
(1302, 'Santa Ana', 49, 2),
(1303, 'Sucre', 49, 2),
(1304, 'Tosagua', 49, 2),
(1305, 'Canton Tiwintza', 50, 2),
(1306, 'Gualaquiza', 50, 2),
(1307, 'Huamboya', 50, 2),
(1308, 'Limon Indanza', 50, 2),
(1309, 'Logroño', 50, 2),
(1310, 'Macas', 50, 2),
(1311, 'Morona', 50, 2),
(1312, 'Pablo Sexto', 50, 2),
(1313, 'Palora', 50, 2),
(1314, 'San Juan Bosco', 50, 2),
(1315, 'Santiago', 50, 2),
(1316, 'Sucua', 50, 2),
(1317, 'Taisha', 50, 2),
(1318, 'Archidona', 51, 2),
(1319, 'Carlos Julio Arosemena Tola', 51, 2),
(1320, 'El Chaco', 51, 2),
(1321, 'Quijos', 51, 2),
(1322, 'Tena', 51, 2),
(1323, 'Aguarico', 52, 2),
(1324, 'La Joya De Los Sachas', 52, 2),
(1325, 'Loreto', 52, 2),
(1326, 'Orellana', 52, 2),
(1327, 'Puerto Francisco De Orellana', 52, 2),
(1328, 'Arajuno', 53, 2),
(1329, 'Mera', 53, 2),
(1330, 'Pastaza', 53, 2),
(1331, 'Puyo', 53, 2),
(1332, 'Santaclara', 53, 2),
(1333, 'Cayambe', 54, 2),
(1334, 'Mejia', 54, 2),
(1335, 'Pedro Moncayo', 54, 2),
(1336, 'Pedro Vicente Maldonado', 54, 2),
(1337, 'Puerto Quito', 54, 2),
(1338, 'Quito', 54, 2),
(1339, 'Rumiñahui', 54, 2),
(1340, 'San Miguel De Los Bancos', 54, 2),
(1341, 'Quito', 55, 2),
(1342, 'La Libertad', 56, 2),
(1343, 'Salinas', 56, 2),
(1344, 'Santa Elena', 56, 2),
(1345, 'Santo Domingo', 57, 2),
(1346, 'Cascales', 58, 2),
(1347, 'Cuyabeno', 58, 2),
(1348, 'Gonzalo Pizarro', 58, 2),
(1349, 'Lagoagrio', 58, 2),
(1350, 'Putumayo', 58, 2),
(1351, 'Shushufindi', 58, 2),
(1352, 'Sucumbios', 58, 2),
(1353, 'Ambato', 59, 2),
(1354, 'Baños De Agua Santa', 59, 2),
(1355, 'Cevallos', 59, 2),
(1356, 'Mocha', 59, 2),
(1357, 'Patate', 59, 2),
(1358, 'Quero', 59, 2),
(1359, 'San Pedro De Pelileo', 59, 2),
(1360, 'Santiago De Pillaro', 59, 2),
(1361, 'Tisaleo', 59, 2),
(1362, 'Centinela Del Condor', 60, 2),
(1363, 'Chinchipe', 60, 2),
(1364, 'Elpangui', 60, 2),
(1365, 'Nangaritza', 60, 2),
(1366, 'Palanda', 60, 2),
(1367, 'Paquisha', 60, 2),
(1368, 'Yacuambi', 60, 2),
(1369, 'Yantzaza(Yanzatza)', 60, 2),
(1370, 'Zamora', 60, 2),
(1371, 'Zonas No Delimitadas', 61, 2),
(1372, 'Alto Orinoco (La Esmeralda)', 62, 3),
(1373, 'Atabapo (San Fernando De Atabapo)', 62, 3),
(1374, 'Atures (Puerto Ayacucho)', 62, 3),
(1375, 'Autana (Isla Ratón)', 62, 3),
(1376, 'Ayacucho', 62, 3),
(1377, 'Manapiare (San Juan De Manapiare)', 62, 3),
(1378, 'Maroa (Maroa)', 62, 3),
(1379, 'Río Negro (San Carlos De Río Negro)', 62, 3),
(1380, 'Anaco (Anaco)', 63, 3),
(1381, 'Aragua (Aragua De Barcelona)', 63, 3),
(1382, 'Ayacucho', 63, 3),
(1383, 'Bolívar (Barcelona)', 63, 3),
(1384, 'Bruzual (Clarines)', 63, 3),
(1385, 'Cajigal (Onoto)', 63, 3),
(1386, 'Caracas', 63, 3),
(1387, 'Carvajal (Valle De Guanape)', 63, 3),
(1388, 'Diego Bautista Urbaneja (Lechería)', 63, 3),
(1389, 'Freites (Cantaura)', 64, 3),
(1390, 'Guanipa (El Tigrito) (San José de Guanipa)', 63, 3),
(1391, 'Guanta (Guanta)', 63, 3),
(1392, 'Independencia (Soledad)', 63, 3),
(1393, 'Libertad (San Mateo)', 64, 3),
(1394, 'Mcgregor (El Chaparro)', 63, 3),
(1395, 'Miranda (Pariaguán)', 63, 3),
(1396, 'Monagas (San Diego De Cabrutica)', 63, 3),
(1397, 'Peñalver (Puerto Píritu)', 63, 3),
(1398, 'Píritu (Píritu)', 63, 3),
(1399, 'Santa Ana (Santa Ana)', 63, 3),
(1400, 'Simón Rodriguez (El Tigre)', 63, 3),
(1401, 'Sotillo (Puerto La Cruz)', 63, 3),
(1402, 'Achaguas (Achaguas)', 64, 3),
(1403, 'Apure', 64, 3),
(1404, 'Biruaca (Biruaca)', 64, 3),
(1405, 'Muñoz (Bruzual)', 64, 3),
(1406, 'Páez (Guasdualito)', 64, 3),
(1407, 'Pedro Camejo (San Juan De Payara)', 64, 3),
(1408, 'Rómulo Gallegos (Elorza)', 64, 3),
(1409, 'San Fernando (San Fernando De Apure)', 64, 3),
(1410, 'Bolívar (San Mateo)', 65, 3),
(1411, 'Camatagua (Camatagua)', 65, 3),
(1412, 'Francisco Linares Alcántara (Santa Rita)', 65, 3),
(1413, 'Girardot (Maracay)', 65, 3),
(1414, 'José Ángel Lamas (Santa Cruz)', 65, 3),
(1415, 'José Félix Ribas (La Victoria)', 65, 3),
(1416, 'José Rafael Revenga (El Consejo)', 65, 3),
(1417, 'Libertador (Palo Negro)', 65, 3),
(1418, 'Mario Briceño Iragorry (El Limón)', 65, 3),
(1419, 'Ocumare De La Costa De Oro', 65, 3),
(1420, 'San Casimiro (San Casimiro)', 65, 3),
(1421, 'San Sebastián De Los Reyes', 65, 3),
(1422, 'Santiago Mariño (Turmero)', 65, 3),
(1423, 'Santos Michelena (Las Tejerías)', 65, 3),
(1424, 'Sucre (Cagua)', 65, 3),
(1425, 'Tovar (Colonia Tovar)', 65, 3),
(1426, 'Urdaneta (Barbacoas)', 65, 3),
(1427, 'Zamora (Villa De Cura)', 65, 3),
(1428, 'Alberto Arvelo Torrealba (Sabaneta)', 66, 3),
(1429, 'Andrés Eloy Blanco (El Cantón)', 66, 3),
(1430, 'Antonio José De Sucre (Socopó)', 66, 3),
(1431, 'Arismendi (Arismendi)', 66, 3),
(1432, 'Barinas (Barinas)', 66, 3),
(1433, 'Bolívar (Barinitas)', 66, 3),
(1434, 'Cruz Paredes (Barrancas)', 66, 3),
(1435, 'Ezequiel Zamora (Santa Bárbara)', 66, 3),
(1436, 'Obispos (Obispos)', 66, 3),
(1437, 'Pedraza (Ciudad Bolivia)', 66, 3),
(1438, 'Rojas (Libertad)', 66, 3),
(1439, 'Sosa (Ciudad De Nutrias)', 66, 3),
(1440, 'Caroní (Ciudat Guayana)', 67, 3),
(1441, 'Cedeño (Caicara Del Orinoco)', 67, 3),
(1442, 'El Callao (El Callao)', 67, 3),
(1443, 'Gran Sabana (Santa Elena De Uairén)', 67, 3),
(1444, 'Heres (Ciudat Bolívar)', 67, 3),
(1445, 'Padre Pedro Chen (El Palmar)', 67, 3),
(1446, 'Piar (Upata)', 67, 3),
(1447, 'Raúl Leoni (Ciudad Piar)', 67, 3),
(1448, 'Roscio (Guasipati)', 67, 3),
(1449, 'Sifontes (Tumeremo)', 67, 3),
(1450, 'Sucre (Maripa)', 67, 3),
(1451, 'Bejuma (Bejuma)', 68, 3),
(1452, 'Carlos Arvelo (Güigüe)', 68, 3),
(1453, 'Diego Ibarra (Mariara)', 68, 3),
(1454, 'Guacara (Guacara)', 68, 3),
(1455, 'Juan José Mora (Morón)', 68, 3),
(1456, 'Libertador (Tocuyito)', 68, 3),
(1457, 'Los Guayos (Los Guayos)', 68, 3),
(1458, 'Miranda (Miranda)', 68, 3),
(1459, 'Montalbán (Montalbán)', 68, 3),
(1460, 'Naguanagua (Naguanagua)', 68, 3),
(1461, 'Puerto Cabello (Puerto Cabello)', 68, 3),
(1462, 'San Diego (San Diego)', 68, 3),
(1463, 'San Joaquín (San Joaquín)', 68, 3),
(1464, 'Valencia', 68, 3),
(1465, 'Caracas', 69, 3),
(1466, 'Anzoátegui (Cojedes)', 70, 3),
(1467, 'Falcón (Tinaquillo)', 70, 3),
(1468, 'Girardot (El Baúl)', 70, 3),
(1469, 'Lima Blanco (Macapo)', 70, 3),
(1470, 'Pao De San Juan Bautista (El Pao)', 70, 3),
(1471, 'Ricaurte (Libertad)', 70, 3),
(1472, 'Rómulo Gallegos (Las Vegas)', 70, 3),
(1473, 'San Carlos (San Carlos)', 70, 3),
(1474, 'Tinaco (Tinaco)', 70, 3),
(1475, 'Antonio Díaz (Curiapo)', 71, 3),
(1476, 'Casacoima (Sierra Imataca)', 71, 3),
(1477, 'Pedernales (Pedernales)', 71, 3),
(1478, 'Tucupita (Tucupita)', 71, 3),
(1479, 'Districo Capital', 72, 3),
(1480, 'Acosta (San Juan De Los Cayos)', 73, 3),
(1481, 'Bolívar (San Luis)', 73, 3),
(1482, 'Buchivacoa (Capatárida)', 73, 3),
(1483, 'Cacique Manaure (Yaracal)', 73, 3),
(1484, 'Carirubana (Punto Fijo)', 73, 3),
(1485, 'Colina (La Vela De Coro)', 73, 3),
(1486, 'Dabajuro (Dabajuro)', 73, 3),
(1487, 'Democracia (Pedregal)', 73, 3),
(1488, 'Falcón (Pueblo Nuevo)', 73, 3),
(1489, 'Federación (Churuguara)', 73, 3),
(1490, 'Jacura (Jacura)', 73, 3),
(1491, 'Los Taques (Santa Cruz De Los Taques)', 73, 3),
(1492, 'Mauroa (Mene De Mauroa)', 73, 3),
(1493, 'Miranda (Santa Ana De Coro)', 73, 3),
(1494, 'Monseñor Iturriza (Chichiriviche)', 73, 3),
(1495, 'Palmasola (Palmasola)', 73, 3),
(1496, 'Petit (Cabure)', 73, 3),
(1497, 'Píritu (Píritu)', 73, 3),
(1498, 'Punta Cardon', 73, 3),
(1499, 'San Francisco (Mirimire)', 73, 3),
(1500, 'Silva (Tucacas)', 73, 3),
(1501, 'Sucre (La Cruz De Taratara)', 73, 3),
(1502, 'Tocópero (Tocópero)', 73, 3),
(1503, 'Unión (Santa Cruz De Bucaral)', 73, 3),
(1504, 'Urumaco (Urumaco)', 73, 3),
(1505, 'Zamora (Puerto Cumarebo)', 73, 3),
(1506, 'Camaguán (Camaguán)', 74, 3),
(1507, 'Chaguaramas (Chaguaramas)', 74, 3),
(1508, 'El Socorro (El Socorro)', 74, 3),
(1509, 'Francisco De Miranda (Calabozo)', 74, 3),
(1510, 'José Félix Ribas (Tucupido)', 74, 3),
(1511, 'José Tadeo Monagas', 74, 3),
(1512, 'Juan Germán Roscio', 74, 3),
(1513, 'Julián Mellado (El Sombrero)', 74, 3),
(1514, 'Las Mercedes (Las Mercedes)', 74, 3),
(1515, 'Leonardo Infante (Valle De La Pascua)', 74, 3),
(1516, 'Ortíz (Ortíz)', 74, 3),
(1517, 'Pedro Zaraza (Zaraza)', 74, 3),
(1518, 'San Gerónimo De Guayabal (Guayabal)', 74, 3),
(1519, 'San José De Guaribe', 74, 3),
(1520, 'Santa María De Ipire', 74, 3),
(1521, 'Andrés Eloy Blanco (Sanare)', 75, 3),
(1522, 'Crespo (Duaca)', 75, 3),
(1523, 'Iribarren (Barquisimeto)', 75, 3),
(1524, 'Jiménez (Quibor)', 75, 3),
(1525, 'Morán (El Tocuyo)', 75, 3),
(1526, 'Palavecino (Cabudare)', 75, 3),
(1527, 'Simón Planas (Sarare)', 75, 3),
(1528, 'Torres (Carora)', 75, 3),
(1529, 'Urdaneta (Siquisique)', 75, 3),
(1530, 'Alberto Adriani (El Vigía)', 76, 3),
(1531, 'Andrés Bello (La Azulita)', 76, 3),
(1532, 'Antonio Pinto Salinas', 76, 3),
(1533, 'Aricagua (Aricagua)', 76, 3),
(1534, 'Arzobispo Chacón (Canaguá)', 76, 3),
(1535, 'Campo Elías (Ejido)', 76, 3),
(1536, 'Caracciolo Parra Olmedo (Tucaní)', 76, 3),
(1537, 'Cardenal Quintero (Santo Domingo)', 76, 3),
(1538, 'Guaraque (Guaraque)', 76, 3),
(1539, 'Julio César Salas (Arapuey)', 76, 3),
(1540, 'Justo Briceño (Torondoy)', 76, 3),
(1541, 'Libertador (Merida)', 76, 3),
(1542, 'Miranda (Timotes)', 76, 3),
(1543, 'Obispo Ramos De Lora', 76, 3),
(1544, 'Padre Norega (Santa María De Caparo)', 76, 3),
(1545, 'Pueblo Llano (Pueblo Llano)', 76, 3),
(1546, 'Rangel (Mucuchíes)', 76, 3),
(1547, 'Rivas Dávila (Bailadores)', 76, 3),
(1548, 'Santos Marquina (Tabay)', 76, 3),
(1549, 'Sucre (Lagunillas)', 76, 3),
(1550, 'Tovar (Tovar)', 76, 3),
(1551, 'Tulio Febres Cordero (Nueva Bolivia)', 76, 3),
(1552, 'Zea (Zea)', 76, 3),
(1553, 'Acevedo (Caucagua)', 77, 3),
(1554, 'Andrés Bello', 77, 3),
(1555, 'Baruta (Baruta)', 77, 3),
(1556, 'Brión (Higuerote)', 77, 3),
(1557, 'Buroz (Mamporal)', 77, 3),
(1558, 'Carrizal (Carrizal)', 77, 3),
(1559, 'Chacao (Chacao)', 77, 3),
(1560, 'Cristóbal Rojas (Charallave)', 77, 3),
(1561, 'El Hatillo (El Hatillo)', 77, 3),
(1562, 'Guaicaipuro (Los Teques)', 77, 3),
(1563, 'Independencia (Santa Teresa Del Tuy)', 77, 3),
(1564, 'Lander (Ocumare Del Tuy)', 77, 3),
(1565, 'Los Salias (San Antonio De Los Altos)', 77, 3),
(1566, 'Páez (Río Chico)', 77, 3),
(1567, 'Paz Castillo (Santa Lucía)', 77, 3),
(1568, 'Pedro Gual (Cúpira)', 77, 3),
(1569, 'Plaza (Guarenas)', 77, 3),
(1570, 'Simón Bolívar', 77, 3),
(1571, 'Sucre (Petare)', 77, 3),
(1572, 'Urdaneta (Cúa)', 77, 3),
(1573, 'Zamora (Guatire)', 77, 3),
(1574, 'Acosta (San Antonio De Capayacuar)', 78, 3),
(1575, 'Aguasay (Aguasay)', 78, 3),
(1576, 'Bolívar (Caripito)', 78, 3),
(1577, 'Caripe (Caripe)', 78, 3),
(1578, 'Cedeño (Caicara)', 78, 3),
(1579, 'Ezequiel Zamora (Punta De Mata)', 78, 3),
(1580, 'Libertador (Temblador)', 78, 3),
(1581, 'Maturín (Maturín)', 78, 3),
(1582, 'Piar (Aragua)', 78, 3),
(1583, 'Punceres (Quiriquire)', 78, 3),
(1584, 'Santa Bárbara (Santa Bárbara)', 78, 3),
(1585, 'Sotillo (Barrancas Del Orinco)', 78, 3),
(1586, 'Uracoa (Uracoa)', 78, 3),
(1587, 'Antolín Del Campo', 79, 3),
(1588, 'Arismendi (La Asunción)', 79, 3),
(1589, 'Díaz (San Juan Bautista)', 79, 3),
(1590, 'García (El Valle Del Espíritu Santo)', 79, 3),
(1591, 'Gómez (Santa Ana)', 79, 3),
(1592, 'Maneiro (Pampatar)', 79, 3),
(1593, 'Marcano (Juan Griego)', 79, 3),
(1594, 'Mariño (Porlamar)', 79, 3),
(1595, 'Península De Macanao (Boca De Río)', 79, 3),
(1596, 'Tubores (Punta De Piedras)', 79, 3),
(1597, 'Villalba (San Pedro De Coche)', 79, 3),
(1598, 'Agua Blanca (Agua Blanca)', 80, 3),
(1599, 'Araure (Araure)', 80, 3),
(1600, 'Esteller (Píritu)', 80, 3),
(1601, 'Guanare (Guanare)', 80, 3),
(1602, 'Guanarito (Guanarito)', 80, 3),
(1603, 'Monseñor José Vicenti De Unda', 80, 3),
(1604, 'Ospino (Ospino)', 80, 3),
(1605, 'Páez (Acarigua)', 80, 3),
(1606, 'Papelón (Papelón)', 80, 3),
(1607, 'San Genaro De Boconoíto', 80, 3),
(1608, 'San Rafael De Onoto', 80, 3),
(1609, 'Santa Rosalía (El Playón)', 80, 3),
(1610, 'Sucre (Biscucuy)', 80, 3),
(1611, 'Turén (Villa Bruzual)', 80, 3),
(1612, 'Andrés Eloy Blanco (Casanay)', 81, 3),
(1613, 'Andrés Mata (San José De Aerocuar)', 81, 3),
(1614, 'Arismendi (Río Caribe)', 81, 3),
(1615, 'Benítez (El Pilar)', 81, 3),
(1616, 'Beremúdez (Carúpano)', 81, 3),
(1617, 'Bolívar (Marigüitar)', 81, 3),
(1618, 'Cajigal (Yaguaraparo)', 81, 3),
(1619, 'Cruz Salmerón Acosta (Araya)', 81, 3),
(1620, 'Libertador (Tunapuy)', 81, 3),
(1621, 'Mariño(Irapa)', 81, 3),
(1622, 'Mejía (San Antonio Del Golfo)', 81, 3),
(1623, 'Montes (Cumanacoa)', 81, 3),
(1624, 'Ribero (Cariaco)', 81, 3),
(1625, 'Sucre (Cumaná)', 81, 3),
(1626, 'Valdez (Güiria)', 81, 3),
(1627, 'Andrés Bello(Cordero)', 82, 3),
(1628, 'Antonio Rómulo Costa (Las Mesas)', 82, 3),
(1629, 'Ayacucho (Colón)', 82, 3),
(1630, 'Bolívar (San Antonio Del Táchira)', 82, 3),
(1631, 'Cárdenas (Táriba)', 82, 3),
(1632, 'Córdoba (Santa Ana De Táchira)', 82, 3),
(1633, 'Fernández Feo (San Rafael Del Piñal)', 82, 3),
(1634, 'Francisco De Miranda', 82, 3),
(1635, 'García De Hevia (La Fría)', 82, 3),
(1636, 'Guásimos (Palmira)', 82, 3),
(1637, 'Independencia (Capacho Nuevo)', 82, 3),
(1638, 'Jáuregui (La Grita)', 82, 3),
(1639, 'José María Vargas (El Cobre)', 82, 3),
(1640, 'Junín (Rubio)', 82, 3),
(1641, 'Libertad (Capacho Viejo)', 82, 3),
(1642, 'Libertador (Abejales)', 82, 3),
(1643, 'Lobatera (Lobatera)', 82, 3),
(1644, 'Michelena (Michelena)', 82, 3),
(1645, 'Panamericano (Coloncito)', 82, 3),
(1646, 'Pedro María Ureña (Ureña)', 82, 3),
(1647, 'Rafael Urdaneta (Delicias)', 82, 3),
(1648, 'Samuel Darío Maldonado (La Tendida)', 82, 3),
(1649, 'San Cristobal', 82, 3),
(1650, 'San Cristóbal (San Cristóbal)', 82, 3),
(1651, 'Seboruco (Seboruco)', 82, 3),
(1652, 'Simón Rodríguez (San Simón)', 82, 3),
(1653, 'Andrés Bello', 83, 3),
(1654, 'Boconó (Boconó)', 83, 3),
(1655, 'Bolívar (Sabana Grande)', 83, 3),
(1656, 'Candelaria (Chejendé)', 83, 3),
(1657, 'Carache (Carache)', 83, 3),
(1658, 'Escuque (Escuque)', 83, 3),
(1659, 'José Felipe Márquez Cañizalez', 83, 3),
(1660, 'Juan Vicente Campos Elías', 83, 3),
(1661, 'La Ceiba (Santa Apolonia)', 83, 3),
(1662, 'Miranda (El Dividive)', 83, 3),
(1663, 'Monte Carmelo (Monte Carmelo)', 83, 3),
(1664, 'Motatán (Motatán)', 83, 3),
(1665, 'Pampán (Pampán)', 83, 3),
(1666, 'Pampanito (Pampanito)', 83, 3),
(1667, 'Rafael Rangel (Betijoque)', 83, 3),
(1668, 'San Rafael De Carvajal', 83, 3),
(1669, 'Sucre (Queniquea)', 83, 3),
(1670, 'Sucre (Sabana De Mendoza)', 83, 3),
(1671, 'Trujillo (Trujillo)', 83, 3),
(1672, 'Urdaneta (La Quebrada)', 83, 3),
(1673, 'Valera (Valera)', 83, 3),
(1674, 'Torbes (San Josecito)', 84, 3),
(1675, 'Vargas (La Guaira)', 84, 3),
(1676, 'Venezuela', 85, 3),
(1677, 'Arístides Bastidas (San Pablo)', 86, 3),
(1678, 'Bolívar (Aroa)', 86, 3),
(1679, 'Bruzual (Chivacoa)', 86, 3),
(1680, 'Cocorote (Cocorote)', 86, 3),
(1681, 'Independencia (Independencia)', 86, 3),
(1682, 'José Antonio Páez', 86, 3),
(1683, 'La Trinidad (Boraure)', 86, 3),
(1684, 'Manuel Monge (Yumare)', 86, 3),
(1685, 'Nirgua (Nirgua)', 86, 3),
(1686, 'Peña (Yaritagua)', 86, 3),
(1687, 'San Felipe (San Felipe)', 86, 3),
(1688, 'Sucre (Guama)', 86, 3),
(1689, 'Urachiche (Urachiche)', 86, 3),
(1690, 'Uribante (Pregonero)', 86, 3),
(1691, 'Veroes (Farriar)', 86, 3),
(1692, 'Almirante Padilla (El Toro)', 87, 3),
(1693, 'Asunción', 87, 3),
(1694, 'Baralt (San Timoteo)', 87, 3),
(1695, 'Cabimas (Cabimas)', 87, 3),
(1696, 'Catatumbo (Encontrados)', 87, 3),
(1697, 'Colón (San Carlos Del Zulia)', 87, 3),
(1698, 'El Zulia Venezuela', 87, 3),
(1699, 'Francisco Javier Pulgar', 87, 3),
(1700, 'Jesús Enrique Losada (La Concepción)', 87, 3),
(1701, 'Jesús María Semprún (Casigua El Cubo)', 87, 3),
(1702, 'La Cañada De Urdaneta (Concepción)', 87, 3),
(1703, 'Lagunillas (Ciudat Ojeda)', 87, 3),
(1704, 'Machiques De Perijá (Machiques)', 87, 3),
(1705, 'Mara (San Rafael Del Moján)', 87, 3),
(1706, 'Maracaibo (Maracaibo)', 87, 3),
(1707, 'Miranda (Los Puertos De Altagracia)', 87, 3),
(1708, 'Páez (Sinamaica)', 87, 3),
(1709, 'Rosario De Perijá (La Villa Del Rosario)', 87, 3),
(1710, 'San Francisco (San Francisco)', 87, 3),
(1711, 'San Judas Tadeo (Umoquena)', 87, 3),
(1712, 'Santa Rita (Santa Rita)', 87, 3),
(1713, 'Simón Bolívar (Tía Juana)', 87, 3),
(1714, 'Sucre (Bobures)', 87, 3),
(1715, 'Valmore Rodríguez (Bachaquero)', 87, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relationship`
--

CREATE TABLE `relationship` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `relationship`
--

INSERT INTO `relationship` (`id`, `name`) VALUES
(1, 'Padre'),
(2, 'Madre'),
(3, 'Hijo(a)'),
(4, 'Hermano(a)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rnmc`
--

CREATE TABLE `rnmc` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `file_number` varchar(45) DEFAULT NULL,
  `date_issue` date DEFAULT NULL,
  `ubigeo_id` varchar(45) DEFAULT NULL,
  `article` varchar(45) DEFAULT NULL,
  `numeral` varchar(45) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `arguments` text DEFAULT NULL,
  `measures` text DEFAULT NULL,
  `pdf` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `rnmc`
--

INSERT INTO `rnmc` (`id`, `employee_id`, `file_number`, `date_issue`, `ubigeo_id`, `article`, `numeral`, `detail`, `arguments`, `measures`, `pdf`) VALUES
(1, 7, '21323', '0000-00-00', '1', '21323wewewe', '123', '23123', '123123', '123123', '<p>You did not select a file to upload.</p>'),
(4, 6, '123213', '2023-08-01', '1', '123123', '21312', '123123', '123', '123', 'assets/images/file_documents/64cf0ba07d7f9.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `spoa`
--

CREATE TABLE `spoa` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `notice_number` varchar(45) DEFAULT NULL,
  `quality` varchar(45) DEFAULT NULL,
  `crime` varchar(45) DEFAULT NULL,
  `date_issue` varchar(45) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `pdf` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `spoa`
--

INSERT INTO `spoa` (`id`, `employee_id`, `notice_number`, `quality`, `crime`, `date_issue`, `detail`, `pdf`) VALUES
(1, 3, '12323', '213', '213213we', '2023-07-26', '12323', NULL),
(2, 6, '123123213', '12312321', '123123', '2023-08-02', 'sdasdasdas', 'assets/images/file_documents/64cf039b6d2ee.pdf'),
(3, 7, '123456', 'BARRANQUILLA', 'HURTO CALIFICADO', '2023-08-07', 'SSGGS SSSSSS SSSSSSSSSSSSSSSSSSSSSSSSSSSSSS SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS SDDDDDDDDDDDDDDDDDDDDDD SDDDDDDDDDDDDDDD FFFFFFFFF FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF', 'assets/images/file_documents/64dab1211c52c.jpg'),
(4, 7, '147258', 'MONTERIA', 'COBRAR MUY POCO', '2023-08-21', 'NUNCA COBRA LO QUE DEBE', 'assets/images/file_documents/64e4e6a7eb9dc.jpg'),
(5, 7, '963', 'imputado', 'abandono de hogar', '2023-08-23', 'le quedo grande el pote de leche de los niños', 'assets/images/file_documents/64e66f28035bb.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubigeos`
--

CREATE TABLE `ubigeos` (
  `id` int(11) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL,
  `ubigeo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `ubigeos`
--

INSERT INTO `ubigeos` (`id`, `country_id`, `department_id`, `province_id`, `ubigeo`) VALUES
(1, 1, 1, 1, '05001'),
(2, 1, 1, 2, '08001'),
(3, 1, 1, 3, '11001'),
(4, 2, 4, 4, '1701'),
(5, 2, 4, 5, '0901'),
(6, 2, 4, 6, '0101'),
(7, 3, 7, 7, '0201'),
(8, 3, 7, 8, '0401'),
(9, 3, 7, 9, '1501');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `phone`, `gender`) VALUES
(1, 'admin', '$2y$10$FquFKdw5VWfVgojB9XuvcOc4dTL2G7mgXmFRQJ4DADzySRleFoqdO', 'rody216@gmail.com', 'Rodolfo', 'Alvarez', '3122636422', 1),
(2, 'david', '$2y$10$4AAzNz75umHxeXipWWtQtO1si0MHnjEQ/5iEdUY17JJ/bnDVA68de', 'david@gmail.com', 'david', 'alvarez montes', '3008001128', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_group`
--

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `user_group`
--

INSERT INTO `user_group` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `vehicle_type_id` int(11) DEFAULT NULL,
  `plate` varchar(45) DEFAULT NULL,
  `model` varchar(45) DEFAULT NULL,
  `mark` varchar(45) DEFAULT NULL,
  `line` varchar(45) DEFAULT NULL,
  `traffic_secretary` varchar(200) DEFAULT NULL,
  `pdf` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `vehicles`
--

INSERT INTO `vehicles` (`id`, `employee_id`, `vehicle_type_id`, `plate`, `model`, `mark`, `line`, `traffic_secretary`, `pdf`) VALUES
(2, 3, NULL, '123', '123', '12312', '21321', '123123', 'assets/images/file_documents/64cf14f05776c.pdf'),
(3, 3, NULL, '23213', '213123', '123123', '213123', '123213', '<p>You did not select a file to upload.</p>'),
(4, 7, NULL, 'KDI213', '2024', 'SUSUKI', 'ENDURO', 'PLANETA RICA', 'assets/images/file_documents/64dafa3ba55b0.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehicle_types`
--

CREATE TABLE `vehicle_types` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `vehicle_types`
--

INSERT INTO `vehicle_types` (`id`, `name`) VALUES
(1, 'Moto'),
(2, 'Automovil'),
(3, 'Camioneta'),
(4, 'Camión'),
(5, 'Volqueta'),
(6, 'Retroescabadora');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banking`
--
ALTER TABLE `banking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banking_employee_id_foreign_idx` (`employee_id`);

--
-- Indices de la tabla `blood_types`
--
ALTER TABLE `blood_types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `civil_status`
--
ALTER TABLE `civil_status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indices de la tabla `document_types`
--
ALTER TABLE `document_types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_person_id_foreign_idx` (`person_id`);

--
-- Indices de la tabla `families`
--
ALTER TABLE `families`
  ADD PRIMARY KEY (`id`),
  ADD KEY `families_employee_id_foreign_idx` (`employee_id`),
  ADD KEY `families_person_id_foreign_idx` (`person_id`),
  ADD KEY `families_relationship_id_foreign_idx` (`relationship_id`);

--
-- Indices de la tabla `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `judicial`
--
ALTER TABLE `judicial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `judicial_employee_id_foreign_idx` (`employee_id`);


--
-- Indices de la tabla `simit`
--
ALTER TABLE `simit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `simit_employee_id_foreign_idx` (`employee_id`);

--
-- Indices de la tabla `mmp`
--
ALTER TABLE `mmp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mmp_employee_id_foreign_idx` (`employee_id`);

--
-- Indices de la tabla `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `persons_document_type_id_foreign_idx` (`document_type_id`),
  ADD KEY `persons_civil_status_id_foreign_idx` (`civil_status_id`),
  ADD KEY `persons_blood_type_id_foreign_idx` (`blood_type_id`);

--
-- Indices de la tabla `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photos_person_id_foreign_idx` (`person_id`);

--
-- Indices de la tabla `ponal`
--
ALTER TABLE `ponal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ponal_employee_id_foreign_idx` (`employee_id`);

--
-- Indices de la tabla `procuradoria`
--
ALTER TABLE `procuradoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `procuradoria_employee_id_foreign_idx` (`employee_id`);

--
-- Indices de la tabla `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `properties_employee_id_foreign_idx` (`employee_id`);

--
-- Indices de la tabla `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indices de la tabla `relationship`
--
ALTER TABLE `relationship`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rnmc`
--
ALTER TABLE `rnmc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rnmc_employee_id_foreign_idx` (`employee_id`);

--
-- Indices de la tabla `spoa`
--
ALTER TABLE `spoa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spoa_employee_id_foreign_idx` (`employee_id`);

--
-- Indices de la tabla `ubigeos`
--
ALTER TABLE `ubigeos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `province_id` (`province_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicles_vehicicle_type_id_foreign_idx` (`vehicle_type_id`),
  ADD KEY `vehicles_employee_id_foreign_idx` (`employee_id`);

--
-- Indices de la tabla `vehicle_types`
--
ALTER TABLE `vehicle_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banking`
--
ALTER TABLE `banking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `blood_types`
--
ALTER TABLE `blood_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `civil_status`
--
ALTER TABLE `civil_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT de la tabla `document_types`
--
ALTER TABLE `document_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `families`
--
ALTER TABLE `families`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `judicial`
--
ALTER TABLE `judicial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `mmp`
--
ALTER TABLE `mmp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `persons`
--
ALTER TABLE `persons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ponal`
--
ALTER TABLE `ponal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `procuradoria`
--
ALTER TABLE `procuradoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1716;

--
-- AUTO_INCREMENT de la tabla `relationship`
--
ALTER TABLE `relationship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rnmc`
--
ALTER TABLE `rnmc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `spoa`
--
ALTER TABLE `spoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ubigeos`
--
ALTER TABLE `ubigeos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `vehicle_types`
--
ALTER TABLE `vehicle_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `banking`
--
ALTER TABLE `banking`
  ADD CONSTRAINT `banking_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Filtros para la tabla `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_person_id_foreign` FOREIGN KEY (`person_id`) REFERENCES `persons` (`id`);

--
-- Filtros para la tabla `families`
--
ALTER TABLE `families`
  ADD CONSTRAINT `families_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `families_person_id_foreign` FOREIGN KEY (`person_id`) REFERENCES `persons` (`id`),
  ADD CONSTRAINT `families_relationship_id_foreign` FOREIGN KEY (`relationship_id`) REFERENCES `relationship` (`id`);

--
-- Filtros para la tabla `judicial`
--
ALTER TABLE `judicial`
  ADD CONSTRAINT `judicial_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mmp`
--
ALTER TABLE `mmp`
  ADD CONSTRAINT `mmp_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persons`
--
ALTER TABLE `persons`
  ADD CONSTRAINT `persons_blood_type_id_foreign` FOREIGN KEY (`blood_type_id`) REFERENCES `blood_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `persons_civil_status_id_foreign` FOREIGN KEY (`civil_status_id`) REFERENCES `civil_status` (`id`),
  ADD CONSTRAINT `persons_document_type_id_foreign` FOREIGN KEY (`document_type_id`) REFERENCES `document_types` (`id`);

--
-- Filtros para la tabla `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_person_id_foreign` FOREIGN KEY (`person_id`) REFERENCES `persons` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ponal`
--
ALTER TABLE `ponal`
  ADD CONSTRAINT `ponal_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);

--
-- Filtros para la tabla `procuradoria`
--
ALTER TABLE `procuradoria`
  ADD CONSTRAINT `procuradoria_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);

--
-- Filtros para la tabla `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);

--
-- Filtros para la tabla `provinces`
--
ALTER TABLE `provinces`
  ADD CONSTRAINT `provinces_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `provinces_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Filtros para la tabla `rnmc`
--
ALTER TABLE `rnmc`
  ADD CONSTRAINT `rnmc_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);

--
-- Filtros para la tabla `spoa`
--
ALTER TABLE `spoa`
  ADD CONSTRAINT `spoa_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ubigeos`
--
ALTER TABLE `ubigeos`
  ADD CONSTRAINT `ubigeos_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `ubigeos_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `ubigeos_ibfk_3` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`);

--
-- Filtros para la tabla `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `vehicles_vehicle_type_id_foreign` FOREIGN KEY (`vehicle_type_id`) REFERENCES `vehicle_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
