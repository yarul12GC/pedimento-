-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2024 a las 22:48:12
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pedimentocenca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenteaduanal`
--

CREATE TABLE `agenteaduanal` (
  `idagente` int(11) NOT NULL,
  `nombreagente` varchar(255) DEFAULT NULL,
  `apellidoP` varchar(255) DEFAULT NULL,
  `apellidoM` varchar(255) DEFAULT NULL,
  `curp` varchar(18) DEFAULT NULL,
  `rfc` varchar(13) DEFAULT NULL,
  `nacionalidad` varchar(50) DEFAULT NULL,
  `tipo_domicilio` varchar(255) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `localidad` varchar(100) DEFAULT NULL,
  `codigo_postal` varchar(10) DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apendice1`
--

CREATE TABLE `apendice1` (
  `idapendice1` int(11) NOT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apendice2`
--

CREATE TABLE `apendice2` (
  `idapendice2` int(11) NOT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apendice3`
--

CREATE TABLE `apendice3` (
  `idapendice3` int(11) NOT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apendice4`
--

CREATE TABLE `apendice4` (
  `idapendice4` int(11) NOT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apendice5`
--

CREATE TABLE `apendice5` (
  `idapendice5` int(11) NOT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apendice6`
--

CREATE TABLE `apendice6` (
  `idapendice6` int(11) NOT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apendice7`
--

CREATE TABLE `apendice7` (
  `idapendice7` int(11) NOT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apendice8`
--

CREATE TABLE `apendice8` (
  `idapendice8` int(11) NOT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apendice9`
--

CREATE TABLE `apendice9` (
  `idapendice9` int(11) NOT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apendice10`
--

CREATE TABLE `apendice10` (
  `idapendice10` int(11) NOT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apendice11`
--

CREATE TABLE `apendice11` (
  `idapendice11` int(11) NOT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apendice12`
--

CREATE TABLE `apendice12` (
  `idapendice12` int(11) NOT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apendice13`
--

CREATE TABLE `apendice13` (
  `idapendice13` int(11) NOT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apendice14`
--

CREATE TABLE `apendice14` (
  `idapendice14` int(11) NOT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apendice15`
--

CREATE TABLE `apendice15` (
  `idapendice15` int(11) NOT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apendice16`
--

CREATE TABLE `apendice16` (
  `idapendice16` int(11) NOT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apendice17`
--

CREATE TABLE `apendice17` (
  `idapendice17` int(11) NOT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apendice18`
--

CREATE TABLE `apendice18` (
  `idapendice18` int(11) NOT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apendice19`
--

CREATE TABLE `apendice19` (
  `idapendice19` int(11) NOT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apendice20`
--

CREATE TABLE `apendice20` (
  `idapendice20` int(11) NOT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apendice21`
--

CREATE TABLE `apendice21` (
  `idapendice21` int(11) NOT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apendice22`
--

CREATE TABLE `apendice22` (
  `idapendice22` int(11) NOT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apendice23`
--

CREATE TABLE `apendice23` (
  `idapendice23` int(11) NOT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `complementos`
--

CREATE TABLE `complementos` (
  `idcomplemento` int(11) NOT NULL,
  `claveComplemento` varchar(255) DEFAULT NULL,
  `complemnto1` varchar(255) DEFAULT NULL,
  `complemento2` varchar(255) DEFAULT NULL,
  `complemento3` varchar(255) DEFAULT NULL,
  `idpedimentoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `complementosp`
--

CREATE TABLE `complementosp` (
  `idcomplementop` int(11) NOT NULL,
  `idapendice8` int(11) DEFAULT NULL,
  `complemento1` varchar(255) DEFAULT NULL,
  `complemento2` varchar(255) DEFAULT NULL,
  `complemento3` varchar(255) DEFAULT NULL,
  `idpedimentoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contribuciones`
--

CREATE TABLE `contribuciones` (
  `idcontribuciones` int(11) NOT NULL,
  `idapendice12` int(11) DEFAULT NULL,
  `tasa` varchar(255) DEFAULT NULL,
  `tt` varchar(255) DEFAULT NULL,
  `fp` varchar(255) DEFAULT NULL,
  `importe` varchar(255) DEFAULT NULL,
  `idpedimentoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuadrodeliquidacion`
--

CREATE TABLE `cuadrodeliquidacion` (
  `idliquidacion` int(11) NOT NULL,
  `idapendice12` int(11) DEFAULT NULL,
  `idapendice13` int(11) DEFAULT NULL,
  `importe` decimal(10,2) DEFAULT NULL,
  `idpedimentoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dembarque`
--

CREATE TABLE `dembarque` (
  `idembarque` int(11) NOT NULL,
  `numeroembarque` varchar(255) DEFAULT NULL,
  `nconocimiento` varchar(255) DEFAULT NULL,
  `nhouse` varchar(255) DEFAULT NULL,
  `idpedimentoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dmonetarios`
--

CREATE TABLE `dmonetarios` (
  `iddmonetarios` int(11) NOT NULL,
  `numfactura` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `idapendice14` int(11) DEFAULT NULL,
  `idapendice15` int(11) DEFAULT NULL,
  `fact` varchar(255) DEFAULT NULL,
  `valmonfact` varchar(255) DEFAULT NULL,
  `factormonfact` varchar(255) DEFAULT NULL,
  `valdolares` decimal(10,2) DEFAULT NULL,
  `idpedimentoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dpedimento`
--

CREATE TABLE `dpedimento` (
  `idpedimento` int(11) NOT NULL,
  `Nopedimento` varchar(255) DEFAULT NULL,
  `Toper` varchar(255) DEFAULT NULL,
  `idapendice2` int(11) DEFAULT NULL,
  `idapendice16` int(11) DEFAULT NULL,
  `idpedimentoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fechas`
--

CREATE TABLE `fechas` (
  `idfechas` int(11) NOT NULL,
  `entrada` date DEFAULT NULL,
  `pago` date DEFAULT NULL,
  `idpedimentoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `importadorexportador`
--

CREATE TABLE `importadorexportador` (
  `idExportador` int(11) NOT NULL,
  `tipoIE` varchar(255) DEFAULT NULL,
  `nombreE` varchar(255) DEFAULT NULL,
  `apellidoP` varchar(255) DEFAULT NULL,
  `apellidoM` varchar(255) DEFAULT NULL,
  `curp` varchar(18) DEFAULT NULL,
  `rfc` varchar(13) DEFAULT NULL,
  `nacionalidad` varchar(50) DEFAULT NULL,
  `tipo_domicilio` varchar(255) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `localidad` varchar(100) DEFAULT NULL,
  `codigo_postal` varchar(10) DEFAULT NULL,
  `idpedimentoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mandato`
--

CREATE TABLE `mandato` (
  `idmandato` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apelidoP` varchar(255) DEFAULT NULL,
  `apellidoM` varchar(255) DEFAULT NULL,
  `rfc` varchar(13) DEFAULT NULL,
  `curp` varchar(18) DEFAULT NULL,
  `idpedimentoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observaciones`
--

CREATE TABLE `observaciones` (
  `idobservacion` int(11) NOT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `idpedimentoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observacionesnp`
--

CREATE TABLE `observacionesnp` (
  `idobservacionesnp` int(11) NOT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `idpedimentoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagoelectronico`
--

CREATE TABLE `pagoelectronico` (
  `idpago` int(11) NOT NULL,
  `patente` varchar(255) DEFAULT NULL,
  `pedimento` varchar(255) DEFAULT NULL,
  `aduana` varchar(255) DEFAULT NULL,
  `banco` varchar(255) DEFAULT NULL,
  `lineaC` varchar(255) DEFAULT NULL,
  `importePago` varchar(255) DEFAULT NULL,
  `fechapago` date DEFAULT NULL,
  `noperacionbancar` varchar(255) DEFAULT NULL,
  `ntransaccionS` varchar(255) DEFAULT NULL,
  `mPresentacion` varchar(255) DEFAULT NULL,
  `MedioRecepcion` varchar(255) DEFAULT NULL,
  `idpedimentoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partida1`
--

CREATE TABLE `partida1` (
  `idpartida1` int(11) NOT NULL,
  `fraccionA` varchar(255) DEFAULT NULL,
  `nico` varchar(255) DEFAULT NULL,
  `vinc` varchar(255) DEFAULT NULL,
  `metval` varchar(255) DEFAULT NULL,
  `umc` varchar(255) DEFAULT NULL,
  `cantumc` varchar(255) DEFAULT NULL,
  `umt` varchar(255) DEFAULT NULL,
  `cant` varchar(255) DEFAULT NULL,
  `idapendice4` int(11) DEFAULT NULL,
  `pod` varchar(255) DEFAULT NULL,
  `idpedimentoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partida2`
--

CREATE TABLE `partida2` (
  `idpartida2` int(11) NOT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `idpedimentoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partida3`
--

CREATE TABLE `partida3` (
  `idpartida3` int(11) NOT NULL,
  `valaduusd` varchar(255) DEFAULT NULL,
  `imppreciopag` varchar(255) DEFAULT NULL,
  `preciounitario` varchar(255) DEFAULT NULL,
  `valoragregado` varchar(255) DEFAULT NULL,
  `idpedimentoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedimentocompleto`
--

CREATE TABLE `pedimentocompleto` (
  `idpedimentoc` int(11) NOT NULL,
  `idagente` int(11) DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisop`
--

CREATE TABLE `permisop` (
  `idpermisop` int(11) NOT NULL,
  `idapendice9` int(11) DEFAULT NULL,
  `numpermiso` int(11) DEFAULT NULL,
  `firmapermiso` varchar(255) DEFAULT NULL,
  `valcomdls` varchar(255) DEFAULT NULL,
  `cantidadumt` varchar(255) DEFAULT NULL,
  `idpedimentoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `idpermisos` int(11) NOT NULL,
  `aviso_electronico` int(11) DEFAULT NULL,
  `idapendice1` int(11) DEFAULT NULL,
  `nBultos` int(11) DEFAULT NULL,
  `marca` varchar(255) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `idpedimentoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provedorocomprador`
--

CREATE TABLE `provedorocomprador` (
  `idproveedor` int(11) NOT NULL,
  `tipopoc` varchar(255) DEFAULT NULL,
  `idfiscal` varchar(255) DEFAULT NULL,
  `nombreDORS` varchar(255) DEFAULT NULL,
  `nacionalidad` varchar(255) DEFAULT NULL,
  `entidadF` varchar(255) DEFAULT NULL,
  `localidad` varchar(100) DEFAULT NULL,
  `codigo_postal` varchar(10) DEFAULT NULL,
  `calle` varchar(255) DEFAULT NULL,
  `nointerior` varchar(50) DEFAULT NULL,
  `noexterior` varchar(50) DEFAULT NULL,
  `vinculacion` varchar(255) DEFAULT NULL,
  `idpedimentoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasapedimento`
--

CREATE TABLE `tasapedimento` (
  `idtasap` int(11) NOT NULL,
  `contrib` varchar(255) DEFAULT NULL,
  `idapendice18` int(11) DEFAULT NULL,
  `tasa` decimal(10,2) DEFAULT NULL,
  `idpedimentoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuarios`
--

CREATE TABLE `tipousuarios` (
  `tipoUsuarioID` int(11) NOT NULL,
  `Rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `total`
--

CREATE TABLE `total` (
  `idtotales` int(11) NOT NULL,
  `idliquidacion` int(11) DEFAULT NULL,
  `efectivo` int(11) DEFAULT NULL,
  `otros` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `idpedimentoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones`
--

CREATE TABLE `transacciones` (
  `idtransacciones` int(11) NOT NULL,
  `idapendice15` int(11) DEFAULT NULL,
  `tipoCambio` varchar(255) DEFAULT NULL,
  `peso_bruto` varchar(255) DEFAULT NULL,
  `idapendice1` int(11) DEFAULT NULL,
  `idpedimentoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transporte`
--

CREATE TABLE `transporte` (
  `idtransporte` int(11) NOT NULL,
  `entrtadaSalida` varchar(255) DEFAULT NULL,
  `arribo` varchar(255) DEFAULT NULL,
  `salida` varchar(255) DEFAULT NULL,
  `Campo` varchar(255) DEFAULT NULL,
  `idapendice3` int(11) DEFAULT NULL,
  `idpedimentoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuarioID` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `tipoUsuarioID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valordecrementable`
--

CREATE TABLE `valordecrementable` (
  `iddecrement` int(11) NOT NULL,
  `VsegurosD` int(11) DEFAULT NULL,
  `segurosD` int(11) DEFAULT NULL,
  `fletesD` int(11) DEFAULT NULL,
  `embalajesD` int(11) DEFAULT NULL,
  `otrosDecrement` int(11) DEFAULT NULL,
  `idpedimentoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoresp`
--

CREATE TABLE `valoresp` (
  `idvalores` int(11) NOT NULL,
  `valorDolares` int(11) DEFAULT NULL,
  `valorAduna` int(11) DEFAULT NULL,
  `precioPagado` int(11) DEFAULT NULL,
  `idpedimentoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valorincrementable`
--

CREATE TABLE `valorincrementable` (
  `idincrementable` int(11) NOT NULL,
  `Vseguros` int(11) DEFAULT NULL,
  `seguros` int(11) DEFAULT NULL,
  `fletes` int(11) DEFAULT NULL,
  `embalajes` int(11) DEFAULT NULL,
  `otrosincrement` int(11) DEFAULT NULL,
  `idpedimentoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agenteaduanal`
--
ALTER TABLE `agenteaduanal`
  ADD PRIMARY KEY (`idagente`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `apendice1`
--
ALTER TABLE `apendice1`
  ADD PRIMARY KEY (`idapendice1`);

--
-- Indices de la tabla `apendice2`
--
ALTER TABLE `apendice2`
  ADD PRIMARY KEY (`idapendice2`);

--
-- Indices de la tabla `apendice3`
--
ALTER TABLE `apendice3`
  ADD PRIMARY KEY (`idapendice3`);

--
-- Indices de la tabla `apendice4`
--
ALTER TABLE `apendice4`
  ADD PRIMARY KEY (`idapendice4`);

--
-- Indices de la tabla `apendice5`
--
ALTER TABLE `apendice5`
  ADD PRIMARY KEY (`idapendice5`);

--
-- Indices de la tabla `apendice6`
--
ALTER TABLE `apendice6`
  ADD PRIMARY KEY (`idapendice6`);

--
-- Indices de la tabla `apendice7`
--
ALTER TABLE `apendice7`
  ADD PRIMARY KEY (`idapendice7`);

--
-- Indices de la tabla `apendice8`
--
ALTER TABLE `apendice8`
  ADD PRIMARY KEY (`idapendice8`);

--
-- Indices de la tabla `apendice9`
--
ALTER TABLE `apendice9`
  ADD PRIMARY KEY (`idapendice9`);

--
-- Indices de la tabla `apendice10`
--
ALTER TABLE `apendice10`
  ADD PRIMARY KEY (`idapendice10`);

--
-- Indices de la tabla `apendice11`
--
ALTER TABLE `apendice11`
  ADD PRIMARY KEY (`idapendice11`);

--
-- Indices de la tabla `apendice12`
--
ALTER TABLE `apendice12`
  ADD PRIMARY KEY (`idapendice12`);

--
-- Indices de la tabla `apendice13`
--
ALTER TABLE `apendice13`
  ADD PRIMARY KEY (`idapendice13`);

--
-- Indices de la tabla `apendice14`
--
ALTER TABLE `apendice14`
  ADD PRIMARY KEY (`idapendice14`);

--
-- Indices de la tabla `apendice15`
--
ALTER TABLE `apendice15`
  ADD PRIMARY KEY (`idapendice15`);

--
-- Indices de la tabla `apendice16`
--
ALTER TABLE `apendice16`
  ADD PRIMARY KEY (`idapendice16`);

--
-- Indices de la tabla `apendice17`
--
ALTER TABLE `apendice17`
  ADD PRIMARY KEY (`idapendice17`);

--
-- Indices de la tabla `apendice18`
--
ALTER TABLE `apendice18`
  ADD PRIMARY KEY (`idapendice18`);

--
-- Indices de la tabla `apendice19`
--
ALTER TABLE `apendice19`
  ADD PRIMARY KEY (`idapendice19`);

--
-- Indices de la tabla `apendice20`
--
ALTER TABLE `apendice20`
  ADD PRIMARY KEY (`idapendice20`);

--
-- Indices de la tabla `apendice21`
--
ALTER TABLE `apendice21`
  ADD PRIMARY KEY (`idapendice21`);

--
-- Indices de la tabla `apendice22`
--
ALTER TABLE `apendice22`
  ADD PRIMARY KEY (`idapendice22`);

--
-- Indices de la tabla `apendice23`
--
ALTER TABLE `apendice23`
  ADD PRIMARY KEY (`idapendice23`);

--
-- Indices de la tabla `complementos`
--
ALTER TABLE `complementos`
  ADD PRIMARY KEY (`idcomplemento`),
  ADD KEY `idpedimentoc` (`idpedimentoc`);

--
-- Indices de la tabla `complementosp`
--
ALTER TABLE `complementosp`
  ADD PRIMARY KEY (`idcomplementop`),
  ADD KEY `idapendice8` (`idapendice8`),
  ADD KEY `idpedimentoc` (`idpedimentoc`);

--
-- Indices de la tabla `contribuciones`
--
ALTER TABLE `contribuciones`
  ADD PRIMARY KEY (`idcontribuciones`),
  ADD KEY `idapendice12` (`idapendice12`),
  ADD KEY `idpedimentoc` (`idpedimentoc`);

--
-- Indices de la tabla `cuadrodeliquidacion`
--
ALTER TABLE `cuadrodeliquidacion`
  ADD PRIMARY KEY (`idliquidacion`),
  ADD KEY `idpedimentoc` (`idpedimentoc`);

--
-- Indices de la tabla `dembarque`
--
ALTER TABLE `dembarque`
  ADD PRIMARY KEY (`idembarque`),
  ADD KEY `idpedimentoc` (`idpedimentoc`);

--
-- Indices de la tabla `dmonetarios`
--
ALTER TABLE `dmonetarios`
  ADD PRIMARY KEY (`iddmonetarios`),
  ADD KEY `idpedimentoc` (`idpedimentoc`),
  ADD KEY `idapendice14` (`idapendice14`),
  ADD KEY `idapendice15` (`idapendice15`);

--
-- Indices de la tabla `dpedimento`
--
ALTER TABLE `dpedimento`
  ADD PRIMARY KEY (`idpedimento`),
  ADD KEY `idapendice2` (`idapendice2`),
  ADD KEY `idapendice16` (`idapendice16`),
  ADD KEY `idpedimentoc` (`idpedimentoc`);

--
-- Indices de la tabla `fechas`
--
ALTER TABLE `fechas`
  ADD PRIMARY KEY (`idfechas`),
  ADD KEY `idpedimentoc` (`idpedimentoc`);

--
-- Indices de la tabla `importadorexportador`
--
ALTER TABLE `importadorexportador`
  ADD PRIMARY KEY (`idExportador`),
  ADD KEY `idpedimentoc` (`idpedimentoc`);

--
-- Indices de la tabla `mandato`
--
ALTER TABLE `mandato`
  ADD PRIMARY KEY (`idmandato`),
  ADD KEY `idpedimentoc` (`idpedimentoc`);

--
-- Indices de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  ADD PRIMARY KEY (`idobservacion`),
  ADD KEY `idpedimentoc` (`idpedimentoc`);

--
-- Indices de la tabla `observacionesnp`
--
ALTER TABLE `observacionesnp`
  ADD PRIMARY KEY (`idobservacionesnp`),
  ADD KEY `idpedimentoc` (`idpedimentoc`);

--
-- Indices de la tabla `pagoelectronico`
--
ALTER TABLE `pagoelectronico`
  ADD PRIMARY KEY (`idpago`),
  ADD KEY `idpedimentoc` (`idpedimentoc`);

--
-- Indices de la tabla `partida1`
--
ALTER TABLE `partida1`
  ADD PRIMARY KEY (`idpartida1`),
  ADD KEY `idapendice4` (`idapendice4`),
  ADD KEY `idpedimentoc` (`idpedimentoc`);

--
-- Indices de la tabla `partida2`
--
ALTER TABLE `partida2`
  ADD PRIMARY KEY (`idpartida2`),
  ADD KEY `idpedimentoc` (`idpedimentoc`);

--
-- Indices de la tabla `partida3`
--
ALTER TABLE `partida3`
  ADD PRIMARY KEY (`idpartida3`),
  ADD KEY `idpedimentoc` (`idpedimentoc`);

--
-- Indices de la tabla `pedimentocompleto`
--
ALTER TABLE `pedimentocompleto`
  ADD PRIMARY KEY (`idpedimentoc`),
  ADD KEY `idagente` (`idagente`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `permisop`
--
ALTER TABLE `permisop`
  ADD PRIMARY KEY (`idpermisop`),
  ADD KEY `idapendice9` (`idapendice9`),
  ADD KEY `idpedimentoc` (`idpedimentoc`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idpermisos`),
  ADD KEY `idpedimentoc` (`idpedimentoc`),
  ADD KEY `idapendice1` (`idapendice1`);

--
-- Indices de la tabla `provedorocomprador`
--
ALTER TABLE `provedorocomprador`
  ADD PRIMARY KEY (`idproveedor`),
  ADD KEY `idpedimentoc` (`idpedimentoc`);

--
-- Indices de la tabla `tasapedimento`
--
ALTER TABLE `tasapedimento`
  ADD PRIMARY KEY (`idtasap`),
  ADD KEY `idpedimentoc` (`idpedimentoc`);

--
-- Indices de la tabla `tipousuarios`
--
ALTER TABLE `tipousuarios`
  ADD PRIMARY KEY (`tipoUsuarioID`);

--
-- Indices de la tabla `total`
--
ALTER TABLE `total`
  ADD PRIMARY KEY (`idtotales`),
  ADD KEY `idliquidacion` (`idliquidacion`),
  ADD KEY `idpedimentoc` (`idpedimentoc`);

--
-- Indices de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  ADD PRIMARY KEY (`idtransacciones`),
  ADD KEY `idpedimentoc` (`idpedimentoc`),
  ADD KEY `idapendice15` (`idapendice15`),
  ADD KEY `idapendice1` (`idapendice1`);

--
-- Indices de la tabla `transporte`
--
ALTER TABLE `transporte`
  ADD PRIMARY KEY (`idtransporte`),
  ADD KEY `idapendice3` (`idapendice3`),
  ADD KEY `idpedimentoc` (`idpedimentoc`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuarioID`),
  ADD KEY `FK_tipoUsuario` (`tipoUsuarioID`);

--
-- Indices de la tabla `valordecrementable`
--
ALTER TABLE `valordecrementable`
  ADD PRIMARY KEY (`iddecrement`),
  ADD KEY `idpedimentoc` (`idpedimentoc`);

--
-- Indices de la tabla `valoresp`
--
ALTER TABLE `valoresp`
  ADD PRIMARY KEY (`idvalores`),
  ADD KEY `idpedimentoc` (`idpedimentoc`);

--
-- Indices de la tabla `valorincrementable`
--
ALTER TABLE `valorincrementable`
  ADD PRIMARY KEY (`idincrementable`),
  ADD KEY `idpedimentoc` (`idpedimentoc`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agenteaduanal`
--
ALTER TABLE `agenteaduanal`
  MODIFY `idagente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `apendice1`
--
ALTER TABLE `apendice1`
  MODIFY `idapendice1` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `apendice2`
--
ALTER TABLE `apendice2`
  MODIFY `idapendice2` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `apendice3`
--
ALTER TABLE `apendice3`
  MODIFY `idapendice3` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `apendice4`
--
ALTER TABLE `apendice4`
  MODIFY `idapendice4` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `apendice5`
--
ALTER TABLE `apendice5`
  MODIFY `idapendice5` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `apendice6`
--
ALTER TABLE `apendice6`
  MODIFY `idapendice6` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `apendice7`
--
ALTER TABLE `apendice7`
  MODIFY `idapendice7` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `apendice8`
--
ALTER TABLE `apendice8`
  MODIFY `idapendice8` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `apendice9`
--
ALTER TABLE `apendice9`
  MODIFY `idapendice9` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `apendice10`
--
ALTER TABLE `apendice10`
  MODIFY `idapendice10` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `apendice11`
--
ALTER TABLE `apendice11`
  MODIFY `idapendice11` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `apendice12`
--
ALTER TABLE `apendice12`
  MODIFY `idapendice12` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `apendice13`
--
ALTER TABLE `apendice13`
  MODIFY `idapendice13` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `apendice14`
--
ALTER TABLE `apendice14`
  MODIFY `idapendice14` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `apendice15`
--
ALTER TABLE `apendice15`
  MODIFY `idapendice15` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `apendice16`
--
ALTER TABLE `apendice16`
  MODIFY `idapendice16` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `apendice17`
--
ALTER TABLE `apendice17`
  MODIFY `idapendice17` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `apendice18`
--
ALTER TABLE `apendice18`
  MODIFY `idapendice18` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `apendice19`
--
ALTER TABLE `apendice19`
  MODIFY `idapendice19` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `apendice20`
--
ALTER TABLE `apendice20`
  MODIFY `idapendice20` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `apendice21`
--
ALTER TABLE `apendice21`
  MODIFY `idapendice21` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `apendice22`
--
ALTER TABLE `apendice22`
  MODIFY `idapendice22` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `apendice23`
--
ALTER TABLE `apendice23`
  MODIFY `idapendice23` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `complementos`
--
ALTER TABLE `complementos`
  MODIFY `idcomplemento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `complementosp`
--
ALTER TABLE `complementosp`
  MODIFY `idcomplementop` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contribuciones`
--
ALTER TABLE `contribuciones`
  MODIFY `idcontribuciones` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cuadrodeliquidacion`
--
ALTER TABLE `cuadrodeliquidacion`
  MODIFY `idliquidacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dembarque`
--
ALTER TABLE `dembarque`
  MODIFY `idembarque` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dmonetarios`
--
ALTER TABLE `dmonetarios`
  MODIFY `iddmonetarios` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dpedimento`
--
ALTER TABLE `dpedimento`
  MODIFY `idpedimento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fechas`
--
ALTER TABLE `fechas`
  MODIFY `idfechas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `importadorexportador`
--
ALTER TABLE `importadorexportador`
  MODIFY `idExportador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mandato`
--
ALTER TABLE `mandato`
  MODIFY `idmandato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  MODIFY `idobservacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `observacionesnp`
--
ALTER TABLE `observacionesnp`
  MODIFY `idobservacionesnp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagoelectronico`
--
ALTER TABLE `pagoelectronico`
  MODIFY `idpago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `partida1`
--
ALTER TABLE `partida1`
  MODIFY `idpartida1` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `partida2`
--
ALTER TABLE `partida2`
  MODIFY `idpartida2` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `partida3`
--
ALTER TABLE `partida3`
  MODIFY `idpartida3` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedimentocompleto`
--
ALTER TABLE `pedimentocompleto`
  MODIFY `idpedimentoc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permisop`
--
ALTER TABLE `permisop`
  MODIFY `idpermisop` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idpermisos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `provedorocomprador`
--
ALTER TABLE `provedorocomprador`
  MODIFY `idproveedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tasapedimento`
--
ALTER TABLE `tasapedimento`
  MODIFY `idtasap` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `total`
--
ALTER TABLE `total`
  MODIFY `idtotales` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  MODIFY `idtransacciones` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `transporte`
--
ALTER TABLE `transporte`
  MODIFY `idtransporte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuarioID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `valordecrementable`
--
ALTER TABLE `valordecrementable`
  MODIFY `iddecrement` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `valoresp`
--
ALTER TABLE `valoresp`
  MODIFY `idvalores` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `valorincrementable`
--
ALTER TABLE `valorincrementable`
  MODIFY `idincrementable` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agenteaduanal`
--
ALTER TABLE `agenteaduanal`
  ADD CONSTRAINT `agenteaduanal_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`usuarioID`);

--
-- Filtros para la tabla `complementos`
--
ALTER TABLE `complementos`
  ADD CONSTRAINT `complementos_ibfk_1` FOREIGN KEY (`idpedimentoc`) REFERENCES `pedimentocompleto` (`idpedimentoc`);

--
-- Filtros para la tabla `complementosp`
--
ALTER TABLE `complementosp`
  ADD CONSTRAINT `complementosp_ibfk_1` FOREIGN KEY (`idapendice8`) REFERENCES `apendice8` (`idapendice8`),
  ADD CONSTRAINT `complementosp_ibfk_2` FOREIGN KEY (`idpedimentoc`) REFERENCES `pedimentocompleto` (`idpedimentoc`);

--
-- Filtros para la tabla `contribuciones`
--
ALTER TABLE `contribuciones`
  ADD CONSTRAINT `contribuciones_ibfk_1` FOREIGN KEY (`idapendice12`) REFERENCES `apendice12` (`idapendice12`),
  ADD CONSTRAINT `contribuciones_ibfk_2` FOREIGN KEY (`idpedimentoc`) REFERENCES `pedimentocompleto` (`idpedimentoc`);

--
-- Filtros para la tabla `cuadrodeliquidacion`
--
ALTER TABLE `cuadrodeliquidacion`
  ADD CONSTRAINT `cuadrodeliquidacion_ibfk_1` FOREIGN KEY (`idpedimentoc`) REFERENCES `pedimentocompleto` (`idpedimentoc`);

--
-- Filtros para la tabla `dembarque`
--
ALTER TABLE `dembarque`
  ADD CONSTRAINT `dembarque_ibfk_1` FOREIGN KEY (`idpedimentoc`) REFERENCES `pedimentocompleto` (`idpedimentoc`);

--
-- Filtros para la tabla `dmonetarios`
--
ALTER TABLE `dmonetarios`
  ADD CONSTRAINT `dmonetarios_ibfk_1` FOREIGN KEY (`idpedimentoc`) REFERENCES `pedimentocompleto` (`idpedimentoc`),
  ADD CONSTRAINT `dmonetarios_ibfk_2` FOREIGN KEY (`idapendice14`) REFERENCES `apendice14` (`idapendice14`),
  ADD CONSTRAINT `dmonetarios_ibfk_3` FOREIGN KEY (`idapendice15`) REFERENCES `apendice15` (`idapendice15`);

--
-- Filtros para la tabla `dpedimento`
--
ALTER TABLE `dpedimento`
  ADD CONSTRAINT `dpedimento_ibfk_1` FOREIGN KEY (`idapendice2`) REFERENCES `apendice2` (`idapendice2`),
  ADD CONSTRAINT `dpedimento_ibfk_2` FOREIGN KEY (`idapendice16`) REFERENCES `apendice16` (`idapendice16`),
  ADD CONSTRAINT `dpedimento_ibfk_3` FOREIGN KEY (`idpedimentoc`) REFERENCES `pedimentocompleto` (`idpedimentoc`);

--
-- Filtros para la tabla `fechas`
--
ALTER TABLE `fechas`
  ADD CONSTRAINT `fechas_ibfk_1` FOREIGN KEY (`idpedimentoc`) REFERENCES `pedimentocompleto` (`idpedimentoc`);

--
-- Filtros para la tabla `importadorexportador`
--
ALTER TABLE `importadorexportador`
  ADD CONSTRAINT `importadorexportador_ibfk_1` FOREIGN KEY (`idpedimentoc`) REFERENCES `pedimentocompleto` (`idpedimentoc`);

--
-- Filtros para la tabla `mandato`
--
ALTER TABLE `mandato`
  ADD CONSTRAINT `mandato_ibfk_1` FOREIGN KEY (`idpedimentoc`) REFERENCES `pedimentocompleto` (`idpedimentoc`);

--
-- Filtros para la tabla `observaciones`
--
ALTER TABLE `observaciones`
  ADD CONSTRAINT `observaciones_ibfk_1` FOREIGN KEY (`idpedimentoc`) REFERENCES `pedimentocompleto` (`idpedimentoc`);

--
-- Filtros para la tabla `observacionesnp`
--
ALTER TABLE `observacionesnp`
  ADD CONSTRAINT `observacionesnp_ibfk_1` FOREIGN KEY (`idpedimentoc`) REFERENCES `pedimentocompleto` (`idpedimentoc`);

--
-- Filtros para la tabla `pagoelectronico`
--
ALTER TABLE `pagoelectronico`
  ADD CONSTRAINT `pagoelectronico_ibfk_1` FOREIGN KEY (`idpedimentoc`) REFERENCES `pedimentocompleto` (`idpedimentoc`);

--
-- Filtros para la tabla `partida1`
--
ALTER TABLE `partida1`
  ADD CONSTRAINT `partida1_ibfk_1` FOREIGN KEY (`idapendice4`) REFERENCES `apendice4` (`idapendice4`),
  ADD CONSTRAINT `partida1_ibfk_2` FOREIGN KEY (`idpedimentoc`) REFERENCES `pedimentocompleto` (`idpedimentoc`);

--
-- Filtros para la tabla `partida2`
--
ALTER TABLE `partida2`
  ADD CONSTRAINT `partida2_ibfk_1` FOREIGN KEY (`idpedimentoc`) REFERENCES `pedimentocompleto` (`idpedimentoc`);

--
-- Filtros para la tabla `partida3`
--
ALTER TABLE `partida3`
  ADD CONSTRAINT `partida3_ibfk_1` FOREIGN KEY (`idpedimentoc`) REFERENCES `pedimentocompleto` (`idpedimentoc`);

--
-- Filtros para la tabla `pedimentocompleto`
--
ALTER TABLE `pedimentocompleto`
  ADD CONSTRAINT `pedimentocompleto_ibfk_1` FOREIGN KEY (`idagente`) REFERENCES `agenteaduanal` (`idagente`),
  ADD CONSTRAINT `pedimentocompleto_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`usuarioID`);

--
-- Filtros para la tabla `permisop`
--
ALTER TABLE `permisop`
  ADD CONSTRAINT `permisop_ibfk_1` FOREIGN KEY (`idapendice9`) REFERENCES `apendice9` (`idapendice9`),
  ADD CONSTRAINT `permisop_ibfk_2` FOREIGN KEY (`idpedimentoc`) REFERENCES `pedimentocompleto` (`idpedimentoc`);

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`idpedimentoc`) REFERENCES `pedimentocompleto` (`idpedimentoc`),
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`idapendice1`) REFERENCES `apendice1` (`idapendice1`);

--
-- Filtros para la tabla `provedorocomprador`
--
ALTER TABLE `provedorocomprador`
  ADD CONSTRAINT `provedorocomprador_ibfk_1` FOREIGN KEY (`idpedimentoc`) REFERENCES `pedimentocompleto` (`idpedimentoc`);

--
-- Filtros para la tabla `tasapedimento`
--
ALTER TABLE `tasapedimento`
  ADD CONSTRAINT `tasapedimento_ibfk_1` FOREIGN KEY (`idpedimentoc`) REFERENCES `pedimentocompleto` (`idpedimentoc`);

--
-- Filtros para la tabla `total`
--
ALTER TABLE `total`
  ADD CONSTRAINT `total_ibfk_1` FOREIGN KEY (`idliquidacion`) REFERENCES `cuadrodeliquidacion` (`idliquidacion`),
  ADD CONSTRAINT `total_ibfk_2` FOREIGN KEY (`idpedimentoc`) REFERENCES `pedimentocompleto` (`idpedimentoc`);

--
-- Filtros para la tabla `transacciones`
--
ALTER TABLE `transacciones`
  ADD CONSTRAINT `transacciones_ibfk_1` FOREIGN KEY (`idpedimentoc`) REFERENCES `pedimentocompleto` (`idpedimentoc`),
  ADD CONSTRAINT `transacciones_ibfk_2` FOREIGN KEY (`idapendice15`) REFERENCES `apendice15` (`idapendice15`),
  ADD CONSTRAINT `transacciones_ibfk_3` FOREIGN KEY (`idapendice1`) REFERENCES `apendice1` (`idapendice1`);

--
-- Filtros para la tabla `transporte`
--
ALTER TABLE `transporte`
  ADD CONSTRAINT `transporte_ibfk_1` FOREIGN KEY (`idapendice3`) REFERENCES `apendice3` (`idapendice3`),
  ADD CONSTRAINT `transporte_ibfk_2` FOREIGN KEY (`idpedimentoc`) REFERENCES `pedimentocompleto` (`idpedimentoc`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `FK_tipoUsuario` FOREIGN KEY (`tipoUsuarioID`) REFERENCES `tipousuarios` (`tipoUsuarioID`);

--
-- Filtros para la tabla `valordecrementable`
--
ALTER TABLE `valordecrementable`
  ADD CONSTRAINT `valordecrementable_ibfk_1` FOREIGN KEY (`idpedimentoc`) REFERENCES `pedimentocompleto` (`idpedimentoc`);

--
-- Filtros para la tabla `valoresp`
--
ALTER TABLE `valoresp`
  ADD CONSTRAINT `valoresp_ibfk_1` FOREIGN KEY (`idpedimentoc`) REFERENCES `pedimentocompleto` (`idpedimentoc`);

--
-- Filtros para la tabla `valorincrementable`
--
ALTER TABLE `valorincrementable`
  ADD CONSTRAINT `valorincrementable_ibfk_1` FOREIGN KEY (`idpedimentoc`) REFERENCES `pedimentocompleto` (`idpedimentoc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
