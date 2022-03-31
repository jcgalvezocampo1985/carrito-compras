/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : carrito_compras

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 31/03/2022 01:38:44
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categorias
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categorias
-- ----------------------------
INSERT INTO `categorias` VALUES (1, 'Frutas y Verduras', '2022-03-29 15:50:59', '2022-03-29 18:16:23');
INSERT INTO `categorias` VALUES (2, 'Ropa', '2022-03-29 15:50:59', '2022-03-29 15:50:59');
INSERT INTO `categorias` VALUES (3, 'Tecnología', '2022-03-29 15:50:59', '2022-03-29 15:50:59');
INSERT INTO `categorias` VALUES (4, 'Muebles', '2022-03-29 15:50:59', '2022-03-29 15:50:59');
INSERT INTO `categorias` VALUES (14, 'asas', NULL, NULL);
INSERT INTO `categorias` VALUES (17, 'sss', '2022-03-29 20:14:41', '2022-03-29 20:14:41');
INSERT INTO `categorias` VALUES (18, 'Cajero', '2022-03-29 20:50:17', '2022-03-29 20:50:17');

-- ----------------------------
-- Table structure for compras
-- ----------------------------
DROP TABLE IF EXISTS `compras`;
CREATE TABLE `compras`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `precio` decimal(10, 2) NOT NULL,
  `impuesto` decimal(10, 2) NOT NULL,
  `impuesto_total` decimal(10, 2) NOT NULL,
  `total` decimal(10, 2) NOT NULL,
  `factura_id` bigint(20) UNSIGNED NOT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `compras_producto_id_foreign`(`producto_id`) USING BTREE,
  INDEX `compras_factura_id_foreign`(`factura_id`) USING BTREE,
  CONSTRAINT `compras_factura_id_foreign` FOREIGN KEY (`factura_id`) REFERENCES `facturas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `compras_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of compras
-- ----------------------------
INSERT INTO `compras` VALUES (1, 123.45, 5.00, 6.17, 129.62, 1, 1, '2022-03-31 04:28:25', '2022-03-31 04:28:25');
INSERT INTO `compras` VALUES (2, 39.73, 12.00, 4.77, 44.50, 1, 3, '2022-03-31 04:28:25', '2022-03-31 04:28:25');
INSERT INTO `compras` VALUES (3, 45.65, 15.00, 6.85, 52.50, 1, 2, '2022-03-31 04:28:25', '2022-03-31 04:28:25');
INSERT INTO `compras` VALUES (4, 45.65, 15.00, 6.85, 52.50, 1, 2, '2022-03-31 04:28:25', '2022-03-31 04:28:25');
INSERT INTO `compras` VALUES (5, 250.00, 8.00, 20.00, 270.00, 1, 4, '2022-03-31 04:28:25', '2022-03-31 04:28:25');
INSERT INTO `compras` VALUES (6, 250.00, 8.00, 20.00, 270.00, 1, 4, '2022-03-31 04:28:25', '2022-03-31 04:28:25');
INSERT INTO `compras` VALUES (7, 123.45, 5.00, 6.17, 129.62, 2, 1, '2022-03-31 05:25:02', '2022-03-31 05:25:02');
INSERT INTO `compras` VALUES (8, 250.00, 8.00, 20.00, 270.00, 2, 4, '2022-03-31 05:25:02', '2022-03-31 05:25:02');
INSERT INTO `compras` VALUES (9, 250.00, 8.00, 20.00, 270.00, 2, 4, '2022-03-31 05:25:02', '2022-03-31 05:25:02');
INSERT INTO `compras` VALUES (10, 250.00, 8.00, 20.00, 270.00, 2, 4, '2022-03-31 05:25:02', '2022-03-31 05:25:02');
INSERT INTO `compras` VALUES (11, 39.73, 12.00, 4.77, 44.50, 2, 3, '2022-03-31 05:25:02', '2022-03-31 05:25:02');
INSERT INTO `compras` VALUES (12, 39.73, 12.00, 4.77, 44.50, 2, 3, '2022-03-31 05:25:02', '2022-03-31 05:25:02');
INSERT INTO `compras` VALUES (13, 39.73, 12.00, 4.77, 44.50, 2, 3, '2022-03-31 05:25:02', '2022-03-31 05:25:02');
INSERT INTO `compras` VALUES (14, 39.73, 12.00, 4.77, 44.50, 2, 3, '2022-03-31 05:25:02', '2022-03-31 05:25:02');
INSERT INTO `compras` VALUES (15, 45.65, 15.00, 6.85, 52.50, 2, 2, '2022-03-31 05:25:02', '2022-03-31 05:25:02');
INSERT INTO `compras` VALUES (16, 45.65, 15.00, 6.85, 52.50, 2, 2, '2022-03-31 05:25:02', '2022-03-31 05:25:02');
INSERT INTO `compras` VALUES (17, 45.65, 15.00, 6.85, 52.50, 2, 2, '2022-03-31 05:25:02', '2022-03-31 05:25:02');
INSERT INTO `compras` VALUES (18, 59.35, 10.00, 5.94, 65.29, 2, 5, '2022-03-31 05:25:02', '2022-03-31 05:25:02');
INSERT INTO `compras` VALUES (19, 50.00, 15.00, 7.50, 57.50, 2, 6, '2022-03-31 05:25:02', '2022-03-31 05:25:02');

-- ----------------------------
-- Table structure for facturas
-- ----------------------------
DROP TABLE IF EXISTS `facturas`;
CREATE TABLE `facturas`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `facturas_user_id_foreign`(`user_id`) USING BTREE,
  CONSTRAINT `facturas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of facturas
-- ----------------------------
INSERT INTO `facturas` VALUES (1, 1, '2022-03-31 04:28:25', '2022-03-31 04:28:25');
INSERT INTO `facturas` VALUES (2, 1, '2022-03-31 05:25:02', '2022-03-31 05:25:02');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2022_03_29_143208_create_categorias_table', 1);
INSERT INTO `migrations` VALUES (6, '2022_03_29_143248_create_productos_table', 1);
INSERT INTO `migrations` VALUES (7, '2022_03_29_143329_create_facturas_table', 1);
INSERT INTO `migrations` VALUES (8, '2022_03_29_143340_create_compras_table', 1);
INSERT INTO `migrations` VALUES (9, '2022_03_29_144518_create_roles_table', 1);
INSERT INTO `migrations` VALUES (10, '2022_03_29_144618_add_rol_to_users_table', 1);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for productos
-- ----------------------------
DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` double(10, 2) NOT NULL,
  `impuesto` double(10, 2) NOT NULL,
  `stock_actual` int(11) NOT NULL,
  `stock_minimo` int(11) NOT NULL,
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `productos_categoria_id_foreign`(`categoria_id`) USING BTREE,
  CONSTRAINT `productos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of productos
-- ----------------------------
INSERT INTO `productos` VALUES (1, 'Manzana', 123.45, 5.00, 98, 20, 1, '2022-03-29 15:50:59', '2022-03-31 05:25:02');
INSERT INTO `productos` VALUES (2, 'Pantalón', 45.65, 15.00, 95, 20, 2, '2022-03-29 15:50:59', '2022-03-31 05:25:02');
INSERT INTO `productos` VALUES (3, 'Tablet', 39.73, 12.00, 95, 20, 3, '2022-03-29 15:50:59', '2022-03-31 05:25:02');
INSERT INTO `productos` VALUES (4, 'Silla', 250.00, 8.00, 95, 20, 4, '2022-03-29 15:50:59', '2022-03-31 05:25:02');
INSERT INTO `productos` VALUES (5, 'Pera', 59.35, 10.00, 99, 20, 1, '2022-03-29 15:50:59', '2022-03-31 05:25:02');
INSERT INTO `productos` VALUES (6, 'Computadora', 50.00, 15.00, 14, 5, 3, '2022-03-29 20:37:28', '2022-03-31 05:25:02');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'Administrador', '2022-03-29 15:51:00', '2022-03-29 15:51:00');
INSERT INTO `roles` VALUES (2, 'Cliente', '2022-03-29 15:51:00', '2022-03-29 15:51:00');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE,
  INDEX `users_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Juan Carlos', 'jcgalvezocampo@gmail.com', NULL, '$2y$10$dvKxqh3OuyTMziHSavcLw.K7Viyei9.X6Zxt.8HLfsteezaa75aJe', 1, 'ggOTjHiPxtqTCr6yd0rQQRvK4EJJJqXMWUKmv1CMhAvx1QLIaQwpKa1HGqcf', '2022-03-29 15:51:00', '2022-03-29 15:51:00');
INSERT INTO `users` VALUES (2, 'Cliente', 'cliente@gmail.com', NULL, '$2y$10$4wfHMLxs1rv8cA0CeKX46uAt/I/038fiUZ5wRhvrQWLkZYKjVt4qy', 2, 'CkI3K5Nl8itXUbdipgS0NSuKgNQuj6dTFX1RPfTasf6YYA7fjIi3M41TNZlr', '2022-03-29 15:51:00', '2022-03-29 15:51:00');
INSERT INTO `users` VALUES (4, 'Juan Perez', 'jperez@gmail.com', NULL, '$2y$10$xDv5aoR7b82Ds/kJtm1sXeKrvkOD8Dclj0H/kCnSDXGg3IpY60vQy', 2, NULL, '2022-03-29 23:31:20', '2022-03-29 23:31:20');

SET FOREIGN_KEY_CHECKS = 1;
