CREATE DATABASE  IF NOT EXISTS `idarraga_arino_karmel_dwes06` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `idarraga_arino_karmel_dwes06`;

--
-- Table structure for table `pistas`
--

DROP TABLE IF EXISTS `pistas`;

CREATE TABLE `pistas` (
  `id_pista` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(75) DEFAULT NULL,
  `tipo` varchar(15) DEFAULT NULL,
  `disponibilidad` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_pista`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pistas`
--

INSERT INTO `pistas` VALUES (1,'Pista Alfredo Garbisu - Central','cristal',0),(2,'Pista Ignacio Arana','cristal',0),(3,'Pista Julio Alegria','cristal',0),(4,'Pista Fernando Belasteguin','cristal',1),(5,'Pista Mariano Lasaigues','muro',1),(6,'Pista Gaby Reca','muro',1),(7,'Pista Juan Martin Diaz','muro',1);


--
-- Table structure for table `socios`
--

DROP TABLE IF EXISTS `socios`;

CREATE TABLE `socios` (
  `id_socio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `nivel` decimal(2,1) DEFAULT NULL,
  `antiguedad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_socio`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Dumping data for table `socios`
--


INSERT INTO `socios` VALUES (1,'Iker Arana',32,4.5,2014),(2,'Karmel Idarraga',43,3.2,1997),(3,'Gorka Cengotita',34,3.9,2002);


--
-- Table structure for table `reservas`
--

DROP TABLE IF EXISTS `reservas`;

CREATE TABLE `reservas` (
  `id_reserva` int(11) NOT NULL AUTO_INCREMENT,
  `id_pista` int(11) NOT NULL,
  `id_socio` int(11) NOT NULL,
  `fecha_reserva` date DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `jugador2_nombre` varchar(75) DEFAULT NULL,
  `jugador2_edad` int(11) DEFAULT NULL,
  `jugador2_nivel` decimal(2,1) DEFAULT NULL,
  `jugador3_nombre` varchar(75) DEFAULT NULL,
  `jugador3_edad` int(11) DEFAULT NULL,
  `jugador3_nivel` decimal(2,1) DEFAULT NULL,
  `jugador4_nombre` varchar(75) DEFAULT NULL,
  `jugador4_edad` int(11) DEFAULT NULL,
  `jugador4_nivel` decimal(2,1) DEFAULT NULL,
  `fecha_alta` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_confirmacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_reserva`),
  KEY `FK_Reservas_pista` (`id_pista`),
  KEY `FK_Reservas_socio` (`id_socio`),
  CONSTRAINT `FK_Reservas_pista` FOREIGN KEY (`id_pista`) REFERENCES `pistas` (`id_pista`),
  CONSTRAINT `FK_Reservas_socio` FOREIGN KEY (`id_socio`) REFERENCES `socios` (`id_socio`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Dumping data for table `reservas`
--


INSERT INTO `reservas` VALUES (1,1,2,'2024-02-07','14:00:00','16:00:00','confirmada','Jose Buces',44,3.5,'Koldo Olabarri',34,3.7,'Asier Garabieta',44,3.1,'2023-12-22 07:47:18','2023-12-22 09:47:18'),(2,2,1,'2024-02-07','18:00:00','19:00:00','confirmada','Ander Labayru',38,4.3,'Mikel Alonso',47,4.7,'Julen Campos',24,4.9,'2023-12-22 07:47:18','2023-12-22 09:47:18'),(3,2,1,'2024-02-07','16:00:00','17:00:00','pendiente',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-02-07 08:01:19',NULL),(4,2,1,'2024-02-07','19:00:00','20:00:00','pendiente',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-02-07 08:02:06',NULL);

--
-- Table structure for table `jugadores`
--

DROP TABLE IF EXISTS `jugadores`;
CREATE TABLE `jugadores` (
  `id_jugador` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `nivel` decimal(2,1) DEFAULT NULL,
  PRIMARY KEY (`id_jugador`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Dumping data for table `jugadores`
--

INSERT INTO `jugadores` VALUES (1,'Karmel Idarraga',43,5.2),(2,'Paula Gorostiza',40,4.2),(3,'Asier Garabieta',45,5.2),(4,'Alejandro Bilbao',15,3.7),(5,'Nuria Lander',45,2.2),(6,'Javier Bilbao',48,2.2);
