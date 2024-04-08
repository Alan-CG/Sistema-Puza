-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 08-04-2024 a las 17:12:42
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_puza`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `IDcliente` int NOT NULL COMMENT 'Esta variable se encarga de almacenar el id de cada cliente que se registre en la base de datos',
  `RFC_cliente` varchar(13) NOT NULL COMMENT 'Esta variable se encarga de almacenar el RFC correspondiente al cliente',
  `NombreCliente` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar el nombre del cliente que es registrado en la base de datos',
  `TelefonoCliente` varchar(15) NOT NULL COMMENT 'Esta variable se encarga de almacenar el telefono de cada cliente que se registra en la base de datos',
  `CorreoCliente` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar el correo electrónico de cada cliente que se registra en la base de datos',
  `CalleCliente` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar el nombre de la calle de la dirección física del cliente',
  `ColoniaCliente` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar el nombre de la colonia de la dirección fisica del cliente',
  `CodigopostalCliente` int NOT NULL COMMENT 'Esta variable se encarga de almacenar el codigo postal de la dirección física del cliente',
  `IDestado` int NOT NULL COMMENT 'Esta variable funciona como llave foranea para relacionar con la tabla estados',
  `EstadoCliente` int NOT NULL COMMENT 'Esta variable se encarga de almacenar el estado del cliente, para poder ocultar o mostrar los resultados'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `ID_Compra` int NOT NULL COMMENT 'Esta variable se encarga de almacenar el ID de cada registro de la tabla',
  `ID_Materia` int NOT NULL COMMENT 'Esta variable funciona como llave secundaria para relacionar la compra con la materia prima',
  `Fecha_Entrada` date NOT NULL COMMENT 'Esta variable se encarga de almacenar la fecha en la que ingresa la compra',
  `Cantidad_Compra` int NOT NULL COMMENT 'Esta variable se encarga de almacenar la cantidad de materias primas que se adquirieron'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `ID_estado` int NOT NULL COMMENT 'Esta variable es el ID de la tabla estados',
  `Estado` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Esta variable almacena el nombre de los estados'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`ID_estado`, `Estado`) VALUES
(1, 'Aguascalientes'),
(2, 'Baja California'),
(3, 'Baja California Sur'),
(4, 'Campeche'),
(5, 'Chiapas'),
(6, 'Chihuahua'),
(7, 'Coahuila'),
(8, 'Colima'),
(9, 'Ciudad de México'),
(10, 'Durango'),
(11, 'Guanajuato'),
(12, 'Guerrero'),
(13, 'Hidalgo'),
(14, 'Jalisco'),
(15, 'México'),
(16, 'Michoacán'),
(17, 'Morelos'),
(18, 'Nayarit'),
(19, 'Nuevo León'),
(20, 'Oaxaca'),
(21, 'Puebla'),
(22, 'Querétaro'),
(23, 'Quintana Roo'),
(24, 'San Luis Potosí'),
(25, 'Sinaloa'),
(26, 'Sonora'),
(27, 'Tabasco'),
(28, 'Tamaulipas'),
(29, 'Tlaxcala'),
(30, 'Veracruz'),
(31, 'Yucatán'),
(32, 'Zacatecas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formula_producto`
--

CREATE TABLE `formula_producto` (
  `ID_Formula` int NOT NULL COMMENT 'Esta variable funciona como ID para cada registro en la tabla',
  `ID_Materia` int NOT NULL COMMENT 'Esta variable funciona como llave secundaria para hacer referencia a la materia prima empleada para la formula del producto',
  `ID_Producto` int NOT NULL COMMENT 'Esta variable funciona como llave secundaria para relaciona la formula con el producto al que corresponde',
  `Cantidad_insumo` float NOT NULL COMMENT 'Esta variable se encarga de almacenar las cantidades necesarias de cada materia para realizar el producto '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `formula_producto`
--

INSERT INTO `formula_producto` (`ID_Formula`, `ID_Materia`, `ID_Producto`, `Cantidad_insumo`) VALUES
(1, 4, 6, 20),
(2, 2, 7, 4),
(3, 3, 7, 20),
(4, 4, 7, 4),
(5, 5, 7, 2),
(6, 2, 8, 2),
(7, 4, 8, 4),
(8, 3, 9, 50),
(9, 5, 9, 5),
(10, 3, 10, 20),
(11, 2, 11, 5),
(12, 4, 11, 10),
(13, 3, 11, 10),
(14, 3, 12, 3),
(15, 3, 13, 3),
(16, 2, 13, 1),
(17, 2, 14, 1),
(18, 3, 14, 5),
(19, 2, 15, 1),
(20, 3, 15, 5),
(21, 4, 15, 2),
(22, 2, 16, 1),
(23, 3, 16, 5),
(24, 4, 16, 2),
(25, 2, 17, 2),
(26, 3, 17, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias_primas`
--

CREATE TABLE `materias_primas` (
  `IDmateriaprima` int NOT NULL COMMENT 'Esta variable se encarga de almacenar el id de las distintas materias primas que se registren en la base de datos',
  `NombreMateria` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar el nombre de la materia prima',
  `DescripcionMateria` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar la breve descripción de la materia prima',
  `IDproveedor` int NOT NULL COMMENT 'Esta variable sirve como llave foranea para relacionar cada materia prima con su proveedor',
  `CostoMateria` float NOT NULL COMMENT 'Esta variable se encarga de almacenar el precio de cada materia prima',
  `ExistenciasMateria` int NOT NULL COMMENT 'Esta variable se encarga de almacenar las existencias de cada materia prima que se ingrese',
  `Fecha_entradaMateria` date NOT NULL COMMENT 'Esta variable se encarga de almacenar la fecha de entrada de cada materia prima',
  `EstadoMateria` int NOT NULL COMMENT 'Esta variable se encarga de almacenar el estado del producto, para poder ocultarlo en caso de que se "elimine"'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `materias_primas`
--

INSERT INTO `materias_primas` (`IDmateriaprima`, `NombreMateria`, `DescripcionMateria`, `IDproveedor`, `CostoMateria`, `ExistenciasMateria`, `Fecha_entradaMateria`, `EstadoMateria`) VALUES
(2, 'Tablón', 'Tablón con unas dimensiones de 2 x 2 Metros', 1, 100, 50, '2024-04-05', 1),
(3, 'Tornillos', 'Tornillos para ensamble', 1, 50, 100, '2024-04-05', 1),
(4, 'Tubos de Acero', 'Tubos de acero de una pulgada para ensamble de mobiliario', 1, 100, 20, '2024-04-05', 1),
(5, 'Pintura', 'Pintura metalica', 1, 50, 50, '2024-04-05', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `ID_Municipio` int NOT NULL COMMENT 'Esta variable funciona como ID de cada registro en la tabla',
  `ID_Estado` int NOT NULL COMMENT 'Esta variable funciona como llave secundaria para relacionar los municipios con el estado al que pertenecen',
  `NombreMunicipio` int NOT NULL COMMENT 'Esta variable se encarga de almacenar el nombre del municipio'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `ID_Pedido` int NOT NULL COMMENT 'Esta variable guarda el ID correspondiente a cada registro de la tabla',
  `ID_Usuario` int NOT NULL COMMENT 'Esta variable funciona como llave secundaria para relaciona los pedidos con el ID del usuario que los registró',
  `ID_Producto` int NOT NULL COMMENT 'Esta variable funciona como llave secundaria para relacionar el pedido con los productos que contiene el mismo',
  `Cantidad_producto` int NOT NULL COMMENT 'Esta variable se encarga de almacenar la cantidad de productos que conforman el pedido',
  `ID_Cliente` int NOT NULL COMMENT 'Esta variable funciona como llave secundaria para relacionar el pedido con el cliente que lo realizó'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `IDproducto` int NOT NULL COMMENT 'Esta variable se encarga de almacenar el id de cada producto terminado que se registra',
  `NombreProducto` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar el nombre de cada producto terminado que se registra en la base de datos',
  `DescripcionProducto` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar una pequeña descripción de cada producto terminado que se registra en la base de datos',
  `PrecioCosto` int NOT NULL COMMENT 'Esta variable se encarga de almacenar el costo de producir el producto',
  `PrecioProducto` float NOT NULL COMMENT 'Esta variable se encarga de almacenar el precio de venta al público del producto',
  `EstadoProducto` int NOT NULL COMMENT 'Esta variable se encarga de almacenar el valor del estado de visualización del producto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`IDproducto`, `NombreProducto`, `DescripcionProducto`, `PrecioCosto`, `PrecioProducto`, `EstadoProducto`) VALUES
(1, 'Mesabanco', 'Mesabanco escolar de tamaño mediano', 100, 100, 1),
(2, 'Mesa', 'Mesa hecha de madera', 100, 100, 1),
(3, 'Locker', 'Locker metálico', 100, 100, 1),
(4, 'Mesa escolar', 'Mesa escolar de 1.20 m x 2 m', 100, 100, 1),
(5, 'Mesa escolar', 'Mesa escolar de 1.20 m x 2 m', 100, 100, 1),
(6, 'Locker', 'Locker metálico', 100, 100, 1),
(7, 'Mesa escolar', 'Mesa escolar de 1.20 m x 2 m', 100, 100, 1),
(8, 'Mueble', 'Mueble prueba', 100, 100, 1),
(9, 'Mueble 2', 'Mueble prueba 2', 100, 100, 1),
(10, 'Silla', 'Silla de prueba', 100, 100, 1),
(11, 'Mueble Prueba', 'Mueble Prueba 3', 500, 100, 1),
(12, 'Mueble', 'Mueble Prueba 4', 150, 100, 1),
(13, 'Mueble', 'Mueble Prueba 5', 100, 100, 1),
(14, 'Mueble', 'Mueble Prueba 6', 350, 100, 1),
(15, 'Mueble', 'Mueble Prueba 7', 550, 100, 1),
(16, 'Mueble', 'Mueble Prueba 8', 550, 0, 1),
(17, 'Mueble', 'Mueble Prueba 9', 2700, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `IDproveedor` int NOT NULL COMMENT 'Esta variable se encarga de almacenar el id de cada proveedor registrado en la base de datos',
  `RFC_proveedor` varchar(13) NOT NULL COMMENT 'Esta variable se encarga de almacenar el RFC del proveedor',
  `NombreProveedor` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar el nombre del proveedor',
  `Nombre_representante` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar el nombre del representante del proveedor',
  `TelefonoProveedor` bigint NOT NULL COMMENT 'Esta variable se encarga de almacenar el número de telefono del proveedor',
  `CorreoProveedor` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar el número de teléfono',
  `CalleProveedor` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar el nombre de la calle donde se ubica físicamente el proveedor',
  `ColoniaProveedor` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar el nombre de la colonia donde se ubica físicamente el proveedor',
  `CodigopostalProveedor` int NOT NULL COMMENT 'Esta variable se encarga de almacenar el código postal de la dirección física donde se ubica el proveedor',
  `IDestado` int NOT NULL COMMENT 'Esta variable funciona como llave foranea para relacionar la tabla estados',
  `EstadoProveedor` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`IDproveedor`, `RFC_proveedor`, `NombreProveedor`, `Nombre_representante`, `TelefonoProveedor`, `CorreoProveedor`, `CalleProveedor`, `ColoniaProveedor`, `CodigopostalProveedor`, `IDestado`, `EstadoProveedor`) VALUES
(1, '', 'Alan', 'alan', 9811870735, 'coso@gmail.com', 'asdasdd', 'asdassd', 24023, 9, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IDusuario` int NOT NULL COMMENT 'Esta variable es el ID de cada usuario del sistema web',
  `Nombre` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar el nombre del empleado que ha creado su usuario',
  `Nombre_usuario` varchar(60) NOT NULL COMMENT 'Esta variable se encarga de almacenar el el nombre de usuario que ha elegido el empleado para acceder al sistema',
  `Contraseña` varchar(30) NOT NULL COMMENT 'Esta variable se encarga de almacenar la contraseña que usará el usuario para acceder al sistema web',
  `Fecha_creacion` date NOT NULL COMMENT 'Esta variable se encarga de guardar la fecha de creación del usuario',
  `Fecha_acceso` date NOT NULL COMMENT 'Esta variable se encarga de guardar la fecha de acceso del usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`IDcliente`),
  ADD KEY `fkidestado` (`IDestado`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`ID_Compra`),
  ADD KEY `fkidmateria` (`ID_Materia`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`ID_estado`);

--
-- Indices de la tabla `formula_producto`
--
ALTER TABLE `formula_producto`
  ADD PRIMARY KEY (`ID_Formula`),
  ADD KEY `fkidmateria` (`ID_Materia`),
  ADD KEY `fkidproducto` (`ID_Producto`);

--
-- Indices de la tabla `materias_primas`
--
ALTER TABLE `materias_primas`
  ADD PRIMARY KEY (`IDmateriaprima`),
  ADD KEY `fkidproveedor` (`IDproveedor`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`ID_Municipio`),
  ADD KEY `fkidestado` (`ID_Estado`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`ID_Pedido`),
  ADD KEY `fkidusuario` (`ID_Usuario`),
  ADD KEY `fkidproducto` (`ID_Producto`),
  ADD KEY `fkidcliente` (`ID_Cliente`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`IDproducto`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`IDproveedor`),
  ADD KEY `fkidestado` (`IDestado`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IDusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `IDcliente` int NOT NULL AUTO_INCREMENT COMMENT 'Esta variable se encarga de almacenar el id de cada cliente que se registre en la base de datos';

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `ID_Compra` int NOT NULL AUTO_INCREMENT COMMENT 'Esta variable se encarga de almacenar el ID de cada registro de la tabla';

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `ID_estado` int NOT NULL AUTO_INCREMENT COMMENT 'Esta variable es el ID de la tabla estados', AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `formula_producto`
--
ALTER TABLE `formula_producto`
  MODIFY `ID_Formula` int NOT NULL AUTO_INCREMENT COMMENT 'Esta variable funciona como ID para cada registro en la tabla', AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `materias_primas`
--
ALTER TABLE `materias_primas`
  MODIFY `IDmateriaprima` int NOT NULL AUTO_INCREMENT COMMENT 'Esta variable se encarga de almacenar el id de las distintas materias primas que se registren en la base de datos', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `ID_Municipio` int NOT NULL AUTO_INCREMENT COMMENT 'Esta variable funciona como ID de cada registro en la tabla';

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `ID_Pedido` int NOT NULL AUTO_INCREMENT COMMENT 'Esta variable guarda el ID correspondiente a cada registro de la tabla';

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `IDproducto` int NOT NULL AUTO_INCREMENT COMMENT 'Esta variable se encarga de almacenar el id de cada producto terminado que se registra', AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `IDproveedor` int NOT NULL AUTO_INCREMENT COMMENT 'Esta variable se encarga de almacenar el id de cada proveedor registrado en la base de datos', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IDusuario` int NOT NULL AUTO_INCREMENT COMMENT 'Esta variable es el ID de cada usuario del sistema web', AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`IDestado`) REFERENCES `estados` (`ID_estado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`ID_Materia`) REFERENCES `materias_primas` (`IDmateriaprima`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `formula_producto`
--
ALTER TABLE `formula_producto`
  ADD CONSTRAINT `formula_producto_ibfk_1` FOREIGN KEY (`ID_Materia`) REFERENCES `materias_primas` (`IDmateriaprima`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formula_producto_ibfk_2` FOREIGN KEY (`ID_Producto`) REFERENCES `productos` (`IDproducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `materias_primas`
--
ALTER TABLE `materias_primas`
  ADD CONSTRAINT `materias_primas_ibfk_1` FOREIGN KEY (`IDproveedor`) REFERENCES `proveedores` (`IDproveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD CONSTRAINT `municipios_ibfk_1` FOREIGN KEY (`ID_Estado`) REFERENCES `estados` (`ID_estado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`IDusuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`ID_Producto`) REFERENCES `productos` (`IDproducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_3` FOREIGN KEY (`ID_Cliente`) REFERENCES `clientes` (`IDcliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD CONSTRAINT `proveedores_ibfk_1` FOREIGN KEY (`IDestado`) REFERENCES `estados` (`ID_estado`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
