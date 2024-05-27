-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 26-05-2024 a las 18:17:22
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
  `NombreCliente` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar el nombre del cliente que es registrado en la base de datos',
  `TelefonoCliente` varchar(15) NOT NULL COMMENT 'Esta variable se encarga de almacenar el telefono de cada cliente que se registra en la base de datos',
  `CorreoCliente` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar el correo electrónico de cada cliente que se registra en la base de datos',
  `CalleCliente` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar el nombre de la calle de la dirección física del cliente',
  `ColoniaCliente` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar el nombre de la colonia de la dirección fisica del cliente',
  `CodigopostalCliente` int NOT NULL COMMENT 'Esta variable se encarga de almacenar el codigo postal de la dirección física del cliente',
  `IDestado` int NOT NULL COMMENT 'Esta variable funciona como llave foranea para relacionar con la tabla estados',
  `EstadoCliente` int NOT NULL COMMENT 'Esta variable se encarga de almacenar el estado del cliente, para poder ocultar o mostrar los resultados'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras_materias`
--

CREATE TABLE `compras_materias` (
  `IDCompra_materia` int NOT NULL COMMENT 'Esta variable se encarga de almacenar el ID de cada registro de la tabla',
  `IDregistro_compra` int NOT NULL,
  `ID_Materia` int NOT NULL COMMENT 'Esta variable funciona como llave secundaria para relacionar la compra con la materia prima',
  `Cantidad_Compra` int NOT NULL COMMENT 'Esta variable se encarga de almacenar la cantidad de materias primas que se adquirieron',
  `EstadoCompraMat` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `ID_estado` int NOT NULL COMMENT 'Esta variable es el ID de la tabla estados',
  `Estado` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Esta variable almacena el nombre de los estados'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias_primas`
--

CREATE TABLE `materias_primas` (
  `IDmateriaprima` int NOT NULL COMMENT 'Esta variable se encarga de almacenar el id de las distintas materias primas que se registren en la base de datos',
  `NombreMateria` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar el nombre de la materia prima',
  `DescripcionMateria` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar la breve descripción de la materia prima',
  `IDproveedor` int NOT NULL COMMENT 'Esta variable sirve como llave foranea para relacionar cada materia prima con su proveedor',
  `CostoMateria` float NOT NULL COMMENT 'Esta variable se encarga de almacenar el precio de cada materia prima',
  `ExistenciasMateria` int NOT NULL COMMENT 'Esta variable se encarga de almacenar las existencias de cada materia prima que se ingrese',
  `Fecha_entradaMateria` date NOT NULL COMMENT 'Esta variable se encarga de almacenar la fecha de entrada de cada materia prima',
  `EstadoMateria` int NOT NULL COMMENT 'Esta variable se encarga de almacenar el estado del producto, para poder ocultarlo en caso de que se "elimine"'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `ID_Municipio` int NOT NULL COMMENT 'Esta variable funciona como ID de cada registro en la tabla',
  `ID_Estado` int NOT NULL COMMENT 'Esta variable funciona como llave secundaria para relacionar los municipios con el estado al que pertenecen',
  `NombreMunicipio` int NOT NULL COMMENT 'Esta variable se encarga de almacenar el nombre del municipio'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `IDPedido` int NOT NULL COMMENT 'Esta variable guarda el ID correspondiente a cada registro de la tabla',
  `Folio` varchar(20) NOT NULL COMMENT 'Esta columna almacena el folio de cada pedido',
  `FechaPedido` date NOT NULL COMMENT 'Esta columna almacena la fecha en la que se ha realizado el pedido',
  `IDCliente` int NOT NULL COMMENT 'Esta variable funciona como llave secundaria para relacionar el pedido con el cliente que lo realizó',
  `TotalPedido` float NOT NULL COMMENT 'Esta columna se encarga de almacenar el total del pedido realizado por cliente',
  `EstadoPedido` int NOT NULL DEFAULT '0' COMMENT 'Esta columna almacena el estado del pedido, siendo 0 un estado que indica que aún no se ha fabricado el pedido y 1 indicará que el pedido ya se ha completado de producir'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_productos`
--

CREATE TABLE `pedidos_productos` (
  `IDPedidoProducto` int NOT NULL COMMENT 'Almacena el id para el control de la tabla',
  `ID_Pedido` int NOT NULL COMMENT 'Funciona como llave foranea para relacionar el registro con la id del pedido al que pertenece',
  `ID_Producto` int NOT NULL COMMENT 'Funciona como llave foránea para hacer la relación con el producto que se está pidiendo',
  `Cantidad` int NOT NULL COMMENT 'Se encarga de almacenar la cantidad de productos que se han pedido',
  `EstadoPedidoProducto` int NOT NULL DEFAULT '0' COMMENT 'Esta variable sirve para indicar el estado del registro, cuando está en 0 indica que no se ha producido aún, cuando cambia a 1 indica que ya se ha producido y se ha almacenado en el almacen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `IDproducto` int NOT NULL COMMENT 'Esta variable se encarga de almacenar el id de cada producto terminado que se registra',
  `NombreProducto` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar el nombre de cada producto terminado que se registra en la base de datos',
  `DescripcionProducto` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar una pequeña descripción de cada producto terminado que se registra en la base de datos',
  `PrecioCosto` int NOT NULL COMMENT 'Esta variable se encarga de almacenar el costo de producir el producto',
  `PrecioProducto` float NOT NULL COMMENT 'Esta variable se encarga de almacenar el precio de venta al público del producto',
  `EstadoProducto` int NOT NULL COMMENT 'Esta variable se encarga de almacenar el valor del estado de visualización del producto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_terminados`
--

CREATE TABLE `productos_terminados` (
  `IDProductoTerminado` int NOT NULL,
  `ID_pedido_producto` int NOT NULL,
  `EstadoProductoTerminado` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `IDproveedor` int NOT NULL COMMENT 'Esta variable se encarga de almacenar el id de cada proveedor registrado en la base de datos',
  `RFC_proveedor` varchar(13) NOT NULL COMMENT 'Esta variable se encarga de almacenar el RFC del proveedor',
  `Razon_social_nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Esta variable almacena el valor de la razón social del proveedor en caso de tenerlo',
  `Nombre_representante` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar el nombre del representante del proveedor',
  `TelefonoProveedor` bigint NOT NULL COMMENT 'Esta variable se encarga de almacenar el número de telefono del proveedor',
  `CorreoProveedor` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar el número de teléfono',
  `CalleProveedor` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar el nombre de la calle donde se ubica físicamente el proveedor',
  `Num_exterior` int NOT NULL COMMENT 'Esta variable almacena el numero exterior de la dirección del proveedor',
  `ColoniaProveedor` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar el nombre de la colonia donde se ubica físicamente el proveedor',
  `CodigopostalProveedor` int NOT NULL COMMENT 'Esta variable se encarga de almacenar el código postal de la dirección física donde se ubica el proveedor',
  `IDestado` int NOT NULL COMMENT 'Esta variable funciona como llave foranea para relacionar la tabla estados',
  `EstadoProveedor` int NOT NULL,
  `Municipio` varchar(60) NOT NULL COMMENT 'Esta variable se encarga de almacenar el municipio del proveedor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_compra`
--

CREATE TABLE `registro_compra` (
  `IDRegistro_compra` int NOT NULL,
  `Folio` varchar(20) NOT NULL,
  `ID_proveedor` int NOT NULL,
  `Fecha_Entrada` date NOT NULL,
  `Total_compra` float NOT NULL,
  `Estado_Compra` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `IDtipo_usuario` int NOT NULL COMMENT 'Esta variable sirve como id del tipo de usario',
  `Tipo` text NOT NULL COMMENT 'Esta variable almacena el nombre del tipo de usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`IDtipo_usuario`, `Tipo`) VALUES
(1, 'Administrador'),
(2, 'Almacenista'),
(3, 'Ventas'),
(4, 'Producción');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IDusuario` int NOT NULL COMMENT 'Esta variable es el ID de cada usuario del sistema web',
  `IDtipousuario` int NOT NULL COMMENT 'Esta variable funciona como llave foránea para relacionar el usuario con el tipo de usuario',
  `Nombre` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar el nombre del empleado que ha creado su usuario',
  `Nombre_usuario` varchar(60) NOT NULL COMMENT 'Esta variable se encarga de almacenar el el nombre de usuario que ha elegido el empleado para acceder al sistema',
  `Contraseña` varchar(30) NOT NULL COMMENT 'Esta variable se encarga de almacenar la contraseña que usará el usuario para acceder al sistema web',
  `Fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Esta variable se encarga de almacenar la fecha en la que se ha creado el usuario',
  `EstadoUsuario` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IDusuario`, `IDtipousuario`, `Nombre`, `Nombre_usuario`, `Contraseña`, `Fecha_creacion`, `EstadoUsuario`) VALUES
(2, 1, 'Alan Virgilio Castillo Gomez', 'admin', '12345', '2024-05-07 03:08:35', 1),
(3, 2, 'Jesus Alberto Pech Pech', 'jesus', '123', '2024-05-07 03:08:35', 1),
(4, 3, 'Getse Kineret Martinez Perez', 'getse', '123', '2024-05-07 03:08:35', 1),
(5, 4, 'Alan Virgilio Castillo Gomez', 'alan', '123', '2024-05-07 03:08:35', 1),
(6, 3, 'Carla', 'carla', '123', '2024-05-07 04:11:29', 1),
(7, 2, 'to delete', 'delete', '123', '2024-05-07 20:22:47', 0),
(8, 4, 'to delete 2', 'delete2', '123', '2024-05-07 20:23:02', 0),
(9, 2, 'oerez', 'deletethis', '123', '2024-05-25 20:58:31', 0);

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
-- Indices de la tabla `compras_materias`
--
ALTER TABLE `compras_materias`
  ADD PRIMARY KEY (`IDCompra_materia`),
  ADD KEY `fkidmateria` (`ID_Materia`),
  ADD KEY `fk_idregistro_compra` (`IDregistro_compra`);

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
  ADD PRIMARY KEY (`IDPedido`),
  ADD KEY `fkidcliente` (`IDCliente`);

--
-- Indices de la tabla `pedidos_productos`
--
ALTER TABLE `pedidos_productos`
  ADD PRIMARY KEY (`IDPedidoProducto`),
  ADD KEY `fk_idpedido` (`ID_Pedido`),
  ADD KEY `fk_idproducto` (`ID_Producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`IDproducto`);

--
-- Indices de la tabla `productos_terminados`
--
ALTER TABLE `productos_terminados`
  ADD PRIMARY KEY (`IDProductoTerminado`),
  ADD KEY `fk_idpedido_producto` (`ID_pedido_producto`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`IDproveedor`),
  ADD KEY `fkidestado` (`IDestado`);

--
-- Indices de la tabla `registro_compra`
--
ALTER TABLE `registro_compra`
  ADD PRIMARY KEY (`IDRegistro_compra`),
  ADD KEY `fk_idproveedor_compra` (`ID_proveedor`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`IDtipo_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IDusuario`),
  ADD KEY `fk_id_tipo_usuario` (`IDtipousuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `IDcliente` int NOT NULL AUTO_INCREMENT COMMENT 'Esta variable se encarga de almacenar el id de cada cliente que se registre en la base de datos', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `compras_materias`
--
ALTER TABLE `compras_materias`
  MODIFY `IDCompra_materia` int NOT NULL AUTO_INCREMENT COMMENT 'Esta variable se encarga de almacenar el ID de cada registro de la tabla', AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `ID_estado` int NOT NULL AUTO_INCREMENT COMMENT 'Esta variable es el ID de la tabla estados', AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `formula_producto`
--
ALTER TABLE `formula_producto`
  MODIFY `ID_Formula` int NOT NULL AUTO_INCREMENT COMMENT 'Esta variable funciona como ID para cada registro en la tabla', AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `materias_primas`
--
ALTER TABLE `materias_primas`
  MODIFY `IDmateriaprima` int NOT NULL AUTO_INCREMENT COMMENT 'Esta variable se encarga de almacenar el id de las distintas materias primas que se registren en la base de datos', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `ID_Municipio` int NOT NULL AUTO_INCREMENT COMMENT 'Esta variable funciona como ID de cada registro en la tabla';

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `IDPedido` int NOT NULL AUTO_INCREMENT COMMENT 'Esta variable guarda el ID correspondiente a cada registro de la tabla', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `pedidos_productos`
--
ALTER TABLE `pedidos_productos`
  MODIFY `IDPedidoProducto` int NOT NULL AUTO_INCREMENT COMMENT 'Almacena el id para el control de la tabla', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `IDproducto` int NOT NULL AUTO_INCREMENT COMMENT 'Esta variable se encarga de almacenar el id de cada producto terminado que se registra', AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `productos_terminados`
--
ALTER TABLE `productos_terminados`
  MODIFY `IDProductoTerminado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `IDproveedor` int NOT NULL AUTO_INCREMENT COMMENT 'Esta variable se encarga de almacenar el id de cada proveedor registrado en la base de datos', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `registro_compra`
--
ALTER TABLE `registro_compra`
  MODIFY `IDRegistro_compra` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `IDtipo_usuario` int NOT NULL AUTO_INCREMENT COMMENT 'Esta variable sirve como id del tipo de usario', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IDusuario` int NOT NULL AUTO_INCREMENT COMMENT 'Esta variable es el ID de cada usuario del sistema web', AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`IDestado`) REFERENCES `estados` (`ID_estado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `compras_materias`
--
ALTER TABLE `compras_materias`
  ADD CONSTRAINT `compras_materias_ibfk_1` FOREIGN KEY (`ID_Materia`) REFERENCES `materias_primas` (`IDmateriaprima`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compras_materias_ibfk_2` FOREIGN KEY (`IDregistro_compra`) REFERENCES `registro_compra` (`IDRegistro_compra`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `pedidos_ibfk_3` FOREIGN KEY (`IDCliente`) REFERENCES `clientes` (`IDcliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos_productos`
--
ALTER TABLE `pedidos_productos`
  ADD CONSTRAINT `pedidos_productos_ibfk_1` FOREIGN KEY (`ID_Pedido`) REFERENCES `pedidos` (`IDPedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_productos_ibfk_2` FOREIGN KEY (`ID_Producto`) REFERENCES `productos` (`IDproducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos_terminados`
--
ALTER TABLE `productos_terminados`
  ADD CONSTRAINT `productos_terminados_ibfk_1` FOREIGN KEY (`ID_pedido_producto`) REFERENCES `pedidos_productos` (`IDPedidoProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD CONSTRAINT `proveedores_ibfk_1` FOREIGN KEY (`IDestado`) REFERENCES `estados` (`ID_estado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `registro_compra`
--
ALTER TABLE `registro_compra`
  ADD CONSTRAINT `registro_compra_ibfk_1` FOREIGN KEY (`ID_proveedor`) REFERENCES `proveedores` (`IDproveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`IDtipousuario`) REFERENCES `tipo_usuario` (`IDtipo_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
