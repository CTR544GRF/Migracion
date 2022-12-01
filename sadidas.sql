-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2022 a las 11:38:45
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sadidas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '001_10_28_041505_create_tbl_articulos_table', 1),
(2, '002_11_21_052519_create_permission_tables', 1),
(3, '004_10_29_041509_create_users_table', 1),
(4, '005_10_29_041704_create_tbl_empresas_table', 1),
(5, '006_10_29_041715_create_tbl_totalfactura_table', 1),
(6, '006_10_29_041723_create_tbl_facturas_table', 1),
(7, '007_10_29_145826_create_tbl_registros_table', 1),
(8, '008_29_150107_create_tbl_inventarios_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin.home', 'web', '2022-11-28 15:11:43', '2022-11-28 15:11:43'),
(2, 'admin.usuarios.create', 'web', '2022-11-28 15:11:44', '2022-11-28 15:11:44'),
(3, 'admin.usuarios.index', 'web', '2022-11-28 15:11:44', '2022-11-28 15:11:44'),
(4, 'admin.usuarios.edit', 'web', '2022-11-28 15:11:44', '2022-11-28 15:11:44'),
(5, 'admin.usuarios.destroy', 'web', '2022-11-28 15:11:44', '2022-11-28 15:11:44'),
(6, 'admin.usuarios.csv', 'web', '2022-11-28 15:11:44', '2022-11-28 15:11:44'),
(7, 'admin.usuarios.xlsx', 'web', '2022-11-28 15:11:44', '2022-11-28 15:11:44'),
(8, 'admin.usuarios.pdf', 'web', '2022-11-28 15:11:44', '2022-11-28 15:11:44'),
(9, 'admin.usuarios.print', 'web', '2022-11-28 15:11:44', '2022-11-28 15:11:44'),
(10, 'admin.articulos.create', 'web', '2022-11-28 15:11:44', '2022-11-28 15:11:44'),
(11, 'admin.articulos.index', 'web', '2022-11-28 15:11:44', '2022-11-28 15:11:44'),
(12, 'admin.articulos.edit', 'web', '2022-11-28 15:11:44', '2022-11-28 15:11:44'),
(13, 'admin.articulos.destroy', 'web', '2022-11-28 15:11:44', '2022-11-28 15:11:44'),
(14, 'admin.articulos.csv', 'web', '2022-11-28 15:11:44', '2022-11-28 15:11:44'),
(15, 'admin.articulos.xlsx', 'web', '2022-11-28 15:11:45', '2022-11-28 15:11:45'),
(16, 'admin.articulos.pdf', 'web', '2022-11-28 15:11:45', '2022-11-28 15:11:45'),
(17, 'admin.articulos.print', 'web', '2022-11-28 15:11:45', '2022-11-28 15:11:45'),
(18, 'admin.empresas.create', 'web', '2022-11-28 15:11:45', '2022-11-28 15:11:45'),
(19, 'admin.empresas.index', 'web', '2022-11-28 15:11:46', '2022-11-28 15:11:46'),
(20, 'admin.empresas.edit', 'web', '2022-11-28 15:11:46', '2022-11-28 15:11:46'),
(21, 'admin.empresas.destroy', 'web', '2022-11-28 15:11:46', '2022-11-28 15:11:46'),
(22, 'admin.empresas.csv', 'web', '2022-11-28 15:11:46', '2022-11-28 15:11:46'),
(23, 'admin.empresas.xlsx', 'web', '2022-11-28 15:11:46', '2022-11-28 15:11:46'),
(24, 'admin.empresas.pdf', 'web', '2022-11-28 15:11:46', '2022-11-28 15:11:46'),
(25, 'admin.empresas.print', 'web', '2022-11-28 15:11:46', '2022-11-28 15:11:46'),
(26, 'admin.entradas.create', 'web', '2022-11-28 15:11:46', '2022-11-28 15:11:46'),
(27, 'admin.entradas.index', 'web', '2022-11-28 15:11:46', '2022-11-28 15:11:46'),
(28, 'admin.entradas.edit', 'web', '2022-11-28 15:11:46', '2022-11-28 15:11:46'),
(29, 'admin.entradas.destroy', 'web', '2022-11-28 15:11:46', '2022-11-28 15:11:46'),
(30, 'admin.entradas.csv', 'web', '2022-11-28 15:11:46', '2022-11-28 15:11:46'),
(31, 'admin.entradas.xlsx', 'web', '2022-11-28 15:11:46', '2022-11-28 15:11:46'),
(32, 'admin.entradas.pdf', 'web', '2022-11-28 15:11:46', '2022-11-28 15:11:46'),
(33, 'admin.entradas.print', 'web', '2022-11-28 15:11:46', '2022-11-28 15:11:46'),
(34, 'admin.facturas.create', 'web', '2022-11-28 15:11:46', '2022-11-28 15:11:46'),
(35, 'admin.facturas.index', 'web', '2022-11-28 15:11:46', '2022-11-28 15:11:46'),
(36, 'admin.facturas.edit', 'web', '2022-11-28 15:11:46', '2022-11-28 15:11:46'),
(37, 'admin.facturas.destroy', 'web', '2022-11-28 15:11:46', '2022-11-28 15:11:46'),
(38, 'admin.facturas.csv', 'web', '2022-11-28 15:11:46', '2022-11-28 15:11:46'),
(39, 'admin.facturas.xlsx', 'web', '2022-11-28 15:11:46', '2022-11-28 15:11:46'),
(40, 'admin.facturas.pdf', 'web', '2022-11-28 15:11:46', '2022-11-28 15:11:46'),
(41, 'admin.facturas.print', 'web', '2022-11-28 15:11:46', '2022-11-28 15:11:46'),
(42, 'admin.inventarios.index', 'web', '2022-11-28 15:11:47', '2022-11-28 15:11:47'),
(43, 'admin.inventarios.csv', 'web', '2022-11-28 15:11:47', '2022-11-28 15:11:47'),
(44, 'admin.inventarios.xlsx', 'web', '2022-11-28 15:11:47', '2022-11-28 15:11:47'),
(45, 'admin.inventarios.pdf', 'web', '2022-11-28 15:11:47', '2022-11-28 15:11:47'),
(46, 'admin.inventarios.print', 'web', '2022-11-28 15:11:47', '2022-11-28 15:11:47'),
(47, 'admin.salidas.create', 'web', '2022-11-28 15:11:47', '2022-11-28 15:11:47'),
(48, 'admin.salidas.index', 'web', '2022-11-28 15:11:47', '2022-11-28 15:11:47'),
(49, 'admin.salidas.edit', 'web', '2022-11-28 15:11:47', '2022-11-28 15:11:47'),
(50, 'admin.salidas.destroy', 'web', '2022-11-28 15:11:47', '2022-11-28 15:11:47'),
(51, 'admin.salidas.csv', 'web', '2022-11-28 15:11:47', '2022-11-28 15:11:47'),
(52, 'admin.salidas.xlsx', 'web', '2022-11-28 15:11:47', '2022-11-28 15:11:47'),
(53, 'admin.salidas.pdf', 'web', '2022-11-28 15:11:47', '2022-11-28 15:11:47'),
(54, 'admin.salidas.print', 'web', '2022-11-28 15:11:47', '2022-11-28 15:11:47'),
(55, 'admin.reportes.index', 'web', '2022-11-28 15:11:47', '2022-11-28 15:11:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'web', '2022-11-28 15:11:43', '2022-11-28 15:11:43'),
(2, 'Almacenista', 'web', '2022-11-28 15:11:43', '2022-11-28 15:11:43'),
(3, 'Contador', 'web', '2022-11-28 15:11:43', '2022-11-28 15:11:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(17, 2),
(18, 1),
(18, 3),
(19, 1),
(19, 3),
(20, 1),
(20, 3),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(25, 3),
(26, 1),
(26, 2),
(27, 1),
(27, 2),
(28, 1),
(28, 2),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(33, 2),
(34, 1),
(34, 3),
(35, 1),
(35, 3),
(36, 1),
(36, 3),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(41, 3),
(42, 1),
(42, 3),
(43, 1),
(43, 3),
(44, 1),
(44, 3),
(45, 1),
(45, 3),
(46, 1),
(46, 3),
(47, 1),
(47, 2),
(48, 1),
(48, 2),
(49, 1),
(49, 2),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(54, 2),
(55, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_articulos`
--

CREATE TABLE `tbl_articulos` (
  `cod_articulo` int(11) NOT NULL,
  `tipo_articulo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_articulo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material_articulo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `talla_articulo` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linea` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unidad_medida` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_articulo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion_articulo` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_articulos`
--

INSERT INTO `tbl_articulos` (`cod_articulo`, `tipo_articulo`, `nom_articulo`, `material_articulo`, `talla_articulo`, `linea`, `unidad_medida`, `color_articulo`, `descripcion_articulo`, `created_at`, `updated_at`) VALUES
(1, 'Productos', 'Pantalon', 'Jean', 'S', 'Adultos', 'metros', 'azul', NULL, NULL, NULL),
(2, 'Productos', 'Camisa', 'Algodon', 'S', 'Adultos', 'metros', 'Verde', NULL, NULL, NULL),
(3, 'Productos', 'Chaqueta', 'impermeable', 'S', 'Adultos', 'metros', 'rojo', NULL, NULL, NULL),
(4, 'Productos', 'Medias', 'algodon', 'S', 'Adultos', 'metros', 'aguamarina', NULL, NULL, NULL),
(5, 'Materia Prima', 'Tela', 'lafayet', NULL, 'Adultos', 'metros', 'verde', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empresas`
--

CREATE TABLE `tbl_empresas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nit_empresa` int(11) NOT NULL,
  `nom_empresa` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel_empresa` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion_empresa` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_empresa` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_empresas`
--

INSERT INTO `tbl_empresas` (`id`, `nit_empresa`, `nom_empresa`, `tel_empresa`, `direccion_empresa`, `email_empresa`, `nombre`, `rol`, `created_at`, `updated_at`) VALUES
(1, 10035410, 'Cortes.LTDA', '3126184366', 'cll 25# 14-32', 'cortespepito@gmail.com', 'Andres LLLL', 'Cliente', NULL, NULL),
(2, 10035411, 'Comfort.ltda', '3142659879', 'cll 185# 22-12', 'comfexltda@gmail.com', 'Andres ssssss', 'Cliente', NULL, NULL),
(3, 10035412, 'CortesFernadez.SAS', '5185555698', 'cra 68# 54-33', 'facoltelas@gmail.com', 'Andres aaaaaa', 'Proveedor', NULL, NULL),
(4, 10035413, 'ElTelar.SAS', '3114455661', 'cra 15# 34-11', 'eltelar@gmail.com', 'Andres Adasdsa', 'Proveedor', NULL, NULL),
(5, 10035414, 'Hilosyagujas.SAS', '3154685791', 'cll 155# 88-55', 'hilosyagujas@gmail.com', 'Juan ami', 'Cliente', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_facturas`
--

CREATE TABLE `tbl_facturas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `num_factura` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `tipo_factura` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor_unitario` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `iva_producto` int(11) NOT NULL,
  `descripcion` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_articulo` int(11) NOT NULL,
  `id_empresa` bigint(20) UNSIGNED DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_facturas`
--

INSERT INTO `tbl_facturas` (`id`, `num_factura`, `fecha`, `tipo_factura`, `valor_unitario`, `cantidad`, `iva_producto`, `descripcion`, `cod_articulo`, `id_empresa`, `id_user`, `created_at`, `updated_at`) VALUES
(1, '1', '2022-05-27', 'compra', 1000, 50, 19, 'registro uno', 2, 10035410, 1, '2022-11-28 15:14:08', '2022-11-28 15:14:08'),
(2, '2', '1985-10-15', 'compra', 10000, 50, 19, 'compra 50 pantalones', 1, 10035413, 3, '2022-11-28 15:16:54', '2022-11-28 15:16:54'),
(3, '3', '2023-01-22', 'compra', 5000, 25, 19, 'compra 25 chaquetas', 3, 10035412, 4, '2022-11-28 15:17:54', '2022-11-28 15:17:54'),
(4, '4', '2011-05-07', 'venta', 2000, 10, 19, 'venta 10 pantalones', 1, 10035411, 2, '2022-11-28 15:18:55', '2022-11-28 15:18:55'),
(5, '505', '2022-11-09', 'venta', 20000, 10, 19, 'venta 10 camisas', 2, 10035411, 1, '2022-11-28 15:20:02', '2022-11-28 15:20:02'),
(6, '606', '2022-11-28', 'venta', 10000, 10, 19, 'venta 3 chaquetas', 3, 10035412, 3, '2022-11-28 15:20:55', '2022-11-28 15:20:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_inventarios`
--

CREATE TABLE `tbl_inventarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `cod_articulo` int(11) NOT NULL,
  `tipo_articulo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion_articulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `existencias` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_inventarios`
--

INSERT INTO `tbl_inventarios` (`id`, `cod_articulo`, `tipo_articulo`, `descripcion_articulo`, `existencias`) VALUES
(3, 2, 'Productos', NULL, 40.00),
(4, 1, 'Productos', NULL, 40.00),
(5, 3, 'Productos', NULL, 15.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_registros`
--

CREATE TABLE `tbl_registros` (
  `cod_registro` int(11) NOT NULL,
  `tipo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `causal` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_factura` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cod_articulo` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_registros`
--

INSERT INTO `tbl_registros` (`cod_registro`, `tipo`, `cantidad`, `causal`, `num_factura`, `cod_articulo`, `created_at`, `updated_at`) VALUES
(5, 'Entrada', 50, 'Factura de compra - Materia prima o insumos', '1', 2, '2022-11-28 15:35:38', '2022-11-28 15:35:38'),
(6, 'Entrada', 50, 'Factura de compra - Materia prima o insumos', '2', 1, '2022-11-28 15:35:56', '2022-11-28 15:35:56'),
(7, 'Entrada', 25, 'Factura de compra - Materia prima o insumos', '3', 3, '2022-11-28 15:36:11', '2022-11-28 15:36:11'),
(8, 'Salida', 10, 'Factura de venta - producto', '4', 1, '2022-11-28 15:36:56', '2022-11-28 15:36:56'),
(9, 'Salida', 10, 'Factura de venta - producto', '505', 2, '2022-11-28 15:37:09', '2022-11-28 15:37:09'),
(10, 'Salida', 10, 'Factura de venta - producto', '606', 3, '2022-11-28 15:37:28', '2022-11-28 15:37:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_totalfacturas`
--

CREATE TABLE `tbl_totalfacturas` (
  `id` int(11) NOT NULL,
  `num_factura` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iva` double NOT NULL,
  `sub_total` bigint(20) UNSIGNED NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_totalfacturas`
--

INSERT INTO `tbl_totalfacturas` (`id`, `num_factura`, `iva`, `sub_total`, `total`, `created_at`, `updated_at`) VALUES
(1, '1', 9500, 50000, 59500, '2022-11-28 15:14:08', '2022-11-28 15:14:08'),
(2, '2', 95000, 500000, 595000, '2022-11-28 15:16:54', '2022-11-28 15:16:54'),
(3, '3', 23750, 125000, 148750, '2022-11-28 15:17:54', '2022-11-28 15:17:54'),
(4, '4', 3800, 20000, 23800, '2022-11-28 15:18:55', '2022-11-28 15:18:55'),
(5, '505', 38000, 200000, 238000, '2022-11-28 15:20:02', '2022-11-28 15:20:02'),
(6, '606', 19000, 100000, 119000, '2022-11-28 15:20:55', '2022-11-28 15:20:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cedula` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_user` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos_user` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `telefono_user` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion_user` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_rol` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `cedula`, `email`, `password`, `nom_user`, `apellidos_user`, `fecha_ingreso`, `telefono_user`, `direccion_user`, `cod_rol`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 10035410, 'camilo1003diaz@gmail.com', '$2y$10$WxiFr.1iGbosFoOMqx0mlOG.SP9NOPuEx1tSrGKbjqkLv2hW0G6S6', 'Juan Camilo', 'Diaz Florez', '2022-11-02', '1234567891', 'calle 23', 1, NULL, '2022-11-28 15:11:47', '2022-11-28 15:11:47'),
(2, 10035411, 'jecatro648@misena.edu.co', '$2y$10$opWXj7Xbcfo4QibfDllkXeadnPftzT361S.HCox2ps8Go/o6b9GsK', 'Jeison Esteban', 'Castro Carvajal', '2022-11-02', '1234567891', 'calle 24', 2, NULL, '2022-11-28 15:11:47', '2022-11-28 15:11:47'),
(3, 10035412, 'yury.gutierrez1@misena.edu.co', '$2y$10$OMDzl9JUNRrgzgM0LLzUAeep6J5NYosKcUW/DJdaeLYjelfIEnXye', 'Yury Natalia', 'Gutierrez Hernandez', '2022-11-03', '1234567891', 'calle 25', 3, NULL, '2022-11-28 15:11:47', '2022-11-28 15:11:47'),
(4, 10035413, 'suescunandres23@gmail.com', '$2y$10$DX4nYwpokVmHfCEFEATg.OtZeamSbeLPFo3chFH5zLZmKmfsWhCIC', 'Jualian Andres', 'Suescun', '2022-11-04', '1234567891', 'calle 26', 3, NULL, '2022-11-28 15:11:48', '2022-11-28 15:11:48'),
(5, 10035414, 'warasdamos176@misena.edu.co', '$2y$10$tk04Wcw/hxNrNG1x9P3DEexU1EaK2gZomi5QhkZlEdehZ4dninT9C', 'William Andres', 'Ramos Quiñones', '2022-11-05', '1234567891', 'calle 27', 3, NULL, '2022-11-28 15:11:48', '2022-11-28 15:11:48');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `tbl_articulos`
--
ALTER TABLE `tbl_articulos`
  ADD PRIMARY KEY (`cod_articulo`);

--
-- Indices de la tabla `tbl_empresas`
--
ALTER TABLE `tbl_empresas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_empresas_nit_empresa_unique` (`nit_empresa`);

--
-- Indices de la tabla `tbl_facturas`
--
ALTER TABLE `tbl_facturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_facturas_cod_articulo_foreign` (`cod_articulo`),
  ADD KEY `tbl_facturas_id_user_foreign` (`id_user`);

--
-- Indices de la tabla `tbl_inventarios`
--
ALTER TABLE `tbl_inventarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_registros`
--
ALTER TABLE `tbl_registros`
  ADD PRIMARY KEY (`cod_registro`),
  ADD KEY `tbl_registros_cod_articulo_foreign` (`cod_articulo`);

--
-- Indices de la tabla `tbl_totalfacturas`
--
ALTER TABLE `tbl_totalfacturas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_cedula_unique` (`cedula`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_cod_rol_foreign` (`cod_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_articulos`
--
ALTER TABLE `tbl_articulos`
  MODIFY `cod_articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_empresas`
--
ALTER TABLE `tbl_empresas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_facturas`
--
ALTER TABLE `tbl_facturas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_inventarios`
--
ALTER TABLE `tbl_inventarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_registros`
--
ALTER TABLE `tbl_registros`
  MODIFY `cod_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tbl_totalfacturas`
--
ALTER TABLE `tbl_totalfacturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tbl_facturas`
--
ALTER TABLE `tbl_facturas`
  ADD CONSTRAINT `tbl_facturas_cod_articulo_foreign` FOREIGN KEY (`cod_articulo`) REFERENCES `tbl_articulos` (`cod_articulo`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_facturas_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `tbl_registros`
--
ALTER TABLE `tbl_registros`
  ADD CONSTRAINT `tbl_registros_cod_articulo_foreign` FOREIGN KEY (`cod_articulo`) REFERENCES `tbl_articulos` (`cod_articulo`) ON DELETE SET NULL;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_cod_rol_foreign` FOREIGN KEY (`cod_rol`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
