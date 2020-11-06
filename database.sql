/*
SQLyog Community v11.52 (32 bit)
MySQL - 10.0.21-MariaDB-1~wheezy-log : Database - mzounko
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mzounko` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `mzounko`;

/*Table structure for table `acl_classes` */

DROP TABLE IF EXISTS `acl_classes`;

CREATE TABLE `acl_classes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class_type` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_69DD750638A36066` (`class_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `acl_classes` */

/*Table structure for table `acl_entries` */

DROP TABLE IF EXISTS `acl_entries`;

CREATE TABLE `acl_entries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class_id` int(10) unsigned NOT NULL,
  `object_identity_id` int(10) unsigned DEFAULT NULL,
  `security_identity_id` int(10) unsigned NOT NULL,
  `field_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ace_order` smallint(5) unsigned NOT NULL,
  `mask` int(11) NOT NULL,
  `granting` tinyint(1) NOT NULL,
  `granting_strategy` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `audit_success` tinyint(1) NOT NULL,
  `audit_failure` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_46C8B806EA000B103D9AB4A64DEF17BCE4289BF4` (`class_id`,`object_identity_id`,`field_name`,`ace_order`),
  KEY `IDX_46C8B806EA000B103D9AB4A6DF9183C9` (`class_id`,`object_identity_id`,`security_identity_id`),
  KEY `IDX_46C8B806EA000B10` (`class_id`),
  KEY `IDX_46C8B8063D9AB4A6` (`object_identity_id`),
  KEY `IDX_46C8B806DF9183C9` (`security_identity_id`),
  CONSTRAINT `FK_46C8B8063D9AB4A6` FOREIGN KEY (`object_identity_id`) REFERENCES `acl_object_identities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_46C8B806DF9183C9` FOREIGN KEY (`security_identity_id`) REFERENCES `acl_security_identities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_46C8B806EA000B10` FOREIGN KEY (`class_id`) REFERENCES `acl_classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `acl_entries` */

/*Table structure for table `acl_object_identities` */

DROP TABLE IF EXISTS `acl_object_identities`;

CREATE TABLE `acl_object_identities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_object_identity_id` int(10) unsigned DEFAULT NULL,
  `class_id` int(10) unsigned NOT NULL,
  `object_identifier` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `entries_inheriting` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_9407E5494B12AD6EA000B10` (`object_identifier`,`class_id`),
  KEY `IDX_9407E54977FA751A` (`parent_object_identity_id`),
  CONSTRAINT `FK_9407E54977FA751A` FOREIGN KEY (`parent_object_identity_id`) REFERENCES `acl_object_identities` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `acl_object_identities` */

/*Table structure for table `acl_object_identity_ancestors` */

DROP TABLE IF EXISTS `acl_object_identity_ancestors`;

CREATE TABLE `acl_object_identity_ancestors` (
  `object_identity_id` int(10) unsigned NOT NULL,
  `ancestor_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`object_identity_id`,`ancestor_id`),
  KEY `IDX_825DE2993D9AB4A6` (`object_identity_id`),
  KEY `IDX_825DE299C671CEA1` (`ancestor_id`),
  CONSTRAINT `FK_825DE2993D9AB4A6` FOREIGN KEY (`object_identity_id`) REFERENCES `acl_object_identities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_825DE299C671CEA1` FOREIGN KEY (`ancestor_id`) REFERENCES `acl_object_identities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `acl_object_identity_ancestors` */

/*Table structure for table `acl_security_identities` */

DROP TABLE IF EXISTS `acl_security_identities`;

CREATE TABLE `acl_security_identities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `identifier` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `username` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8835EE78772E836AF85E0677` (`identifier`,`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `acl_security_identities` */

/*Table structure for table `annonce` */

DROP TABLE IF EXISTS `annonce`;

CREATE TABLE `annonce` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `type_annonce_id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `categorie_id` bigint(20) NOT NULL,
  `phase_id` bigint(20) NOT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantite` bigint(20) NOT NULL,
  `prix_unitaire` bigint(20) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F65593E595067D0A` (`type_annonce_id`),
  KEY `IDX_F65593E5A76ED395` (`user_id`),
  KEY `IDX_F65593E5BCF5E72D` (`categorie_id`),
  KEY `IDX_F65593E599091188` (`phase_id`),
  CONSTRAINT `FK_F65593E595067D0A` FOREIGN KEY (`type_annonce_id`) REFERENCES `type_annonce` (`id`),
  CONSTRAINT `FK_F65593E599091188` FOREIGN KEY (`phase_id`) REFERENCES `phase` (`id`),
  CONSTRAINT `FK_F65593E5A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user_user` (`id`),
  CONSTRAINT `FK_F65593E5BCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `annonce` */

insert  into `annonce`(`id`,`type_annonce_id`,`user_id`,`categorie_id`,`phase_id`,`libelle`,`description`,`quantite`,`prix_unitaire`,`date`) values (1,1,3,1,2,'Metaux usés','Meteaux usés lourd',100,200,'2015-09-08 00:00:00'),(2,1,3,4,2,'Bouteilles plastiques usées','Bouteilles plastiques de possotomè usées',1000,100,'2015-09-12 00:00:00'),(3,1,3,6,1,'Chargeur Apple usé','Chargeur Apple usé',2,1000,'2015-09-09 00:00:00'),(4,1,3,3,1,'Battéries usagées','Battéries 12V et 6V usagées',150,2000,'2015-09-02 00:00:00'),(5,2,2,6,1,'HP probook usé','HP probook usé avec carte mère fonctionnelle',1,15000,'2015-09-02 00:00:00');

/*Table structure for table `categorie` */

DROP TABLE IF EXISTS `categorie`;

CREATE TABLE `categorie` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unite` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `categorie` */

insert  into `categorie`(`id`,`name`,`unite`,`date`) values (1,'Métal','kg','2015-09-12 00:00:00'),(2,'Sachet plastique','kg','2015-09-01 00:00:00'),(3,'Chimique','Unité','2015-09-01 00:00:00'),(4,'Bouteille plastique',' Unité','2015-09-02 00:00:00'),(5,'Verre',' Unité','2015-09-12 00:00:00'),(6,'Electronique',' Unité','2015-09-01 00:00:00'),(7,'Papier','kg','2015-09-02 00:00:00'),(8,'Huile','L','2015-09-04 00:00:00');

/*Table structure for table `evenement` */

DROP TABLE IF EXISTS `evenement`;

CREATE TABLE `evenement` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `evenement` */

/*Table structure for table `fos_user_group` */

DROP TABLE IF EXISTS `fos_user_group`;

CREATE TABLE `fos_user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_583D1F3E5E237E06` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `fos_user_group` */

/*Table structure for table `fos_user_user` */

DROP TABLE IF EXISTS `fos_user_user`;

CREATE TABLE `fos_user_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `date_of_birth` datetime DEFAULT NULL,
  `firstname` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `biography` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timezone` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_uid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_data` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  `twitter_uid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_data` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  `gplus_uid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gplus_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gplus_data` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  `token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `two_step_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `credit` int(11) NOT NULL,
  `gcmid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_C560D76192FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_C560D761A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `fos_user_user` */

insert  into `fos_user_user`(`id`,`username`,`username_canonical`,`email`,`email_canonical`,`enabled`,`salt`,`password`,`last_login`,`locked`,`expired`,`expires_at`,`confirmation_token`,`password_requested_at`,`roles`,`credentials_expired`,`credentials_expire_at`,`created_at`,`updated_at`,`date_of_birth`,`firstname`,`lastname`,`website`,`biography`,`gender`,`locale`,`timezone`,`phone`,`facebook_uid`,`facebook_name`,`facebook_data`,`twitter_uid`,`twitter_name`,`twitter_data`,`gplus_uid`,`gplus_name`,`gplus_data`,`token`,`two_step_code`,`latitude`,`longitude`,`credit`,`gcmid`) values (1,'admin','admin','tandjeseno@yahoo.fr','tandjeseno@yahoo.fr',1,'rm33c8g7vtccw8g0scww80kgssw804s','QvPVV//5LmGb0MWyOd1EoyewCXXeX+AkpNSyhryrjuqd0JlUkNId0niwLiEmmnUbjbBUlumPGc8lld+Kr2p1sQ==','2015-09-12 23:34:41',0,0,NULL,NULL,NULL,'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}',0,NULL,'2015-09-12 10:04:04','2015-09-12 23:34:41',NULL,NULL,NULL,NULL,NULL,'u',NULL,NULL,NULL,NULL,NULL,'null',NULL,NULL,'null',NULL,NULL,'null',NULL,NULL,6.388,2.454,10,NULL),(2,'Vendeur','vendeur','vendeur@vendeur.com','vendeur@vendeur.com',1,'t5bidus9sv4kcgwswok8gccoocg8440','pswqYhaTbcV2q1/HfeDaihM/q5muiCfFizSdZzhLsMMN6TQgqyMvGLHeUSpO90c4IGtLKXEZq5qfyJrwr/Xfow==','2015-09-13 08:45:45',0,0,NULL,NULL,NULL,'a:0:{}',0,NULL,'2015-09-12 17:22:30','2015-09-13 08:45:45','1985-02-01 00:00:00','vendeur','Vendeur',NULL,NULL,'m',NULL,NULL,NULL,NULL,NULL,'null',NULL,NULL,'null',NULL,NULL,'null',NULL,NULL,6.4667,2.4433,10,NULL),(3,'Acheteur','acheteur','acheteur@acheteur.com','acheteur@acheteur.com',1,'fay6o9xsshwgs8gcssw44ossc4w80cs','7qYCIEqIAInVSerXJqgo+tSaJQONNmwvYAUvB+Sx6pDnQ8lKliYfcjI5+fNgpjd04gVZ6peIaP096cKxosUCQQ==','2015-09-13 10:45:19',0,0,NULL,NULL,NULL,'a:0:{}',0,NULL,'2015-09-12 17:55:11','2015-09-13 10:45:19','1993-03-02 00:00:00','Acheteur','Acheteur',NULL,NULL,'f',NULL,NULL,'97080825',NULL,NULL,'null',NULL,NULL,'null',NULL,NULL,'null',NULL,NULL,6.3634,2.4475,10,NULL);

/*Table structure for table `fos_user_user_group` */

DROP TABLE IF EXISTS `fos_user_user_group`;

CREATE TABLE `fos_user_user_group` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `IDX_B3C77447A76ED395` (`user_id`),
  KEY `IDX_B3C77447FE54D947` (`group_id`),
  CONSTRAINT `FK_B3C77447A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_B3C77447FE54D947` FOREIGN KEY (`group_id`) REFERENCES `fos_user_group` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `fos_user_user_group` */

/*Table structure for table `image` */

DROP TABLE IF EXISTS `image`;

CREATE TABLE `image` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `annonce_id` bigint(20) DEFAULT NULL,
  `reponse_id` bigint(20) DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C53D045F8805AB2F` (`annonce_id`),
  KEY `IDX_C53D045FCF18BB82` (`reponse_id`),
  CONSTRAINT `FK_C53D045F8805AB2F` FOREIGN KEY (`annonce_id`) REFERENCES `annonce` (`id`),
  CONSTRAINT `FK_C53D045FCF18BB82` FOREIGN KEY (`reponse_id`) REFERENCES `reponse` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `image` */

/*Table structure for table `paie` */

DROP TABLE IF EXISTS `paie`;

CREATE TABLE `paie` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `reponse_id` bigint(20) DEFAULT NULL,
  `annonce_id` bigint(20) DEFAULT NULL,
  `montant` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8A899BAECF18BB82` (`reponse_id`),
  KEY `IDX_8A899BAE8805AB2F` (`annonce_id`),
  CONSTRAINT `FK_8A899BAE8805AB2F` FOREIGN KEY (`annonce_id`) REFERENCES `annonce` (`id`),
  CONSTRAINT `FK_8A899BAECF18BB82` FOREIGN KEY (`reponse_id`) REFERENCES `reponse` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `paie` */

/*Table structure for table `payement` */

DROP TABLE IF EXISTS `payement`;

CREATE TABLE `payement` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `payement` */

insert  into `payement`(`id`,`name`,`description`,`date`) values (1,'Mobile','Monaie mobile','2015-09-12 00:00:00'),(2,'Carte de crédit','Carte de crédit','2015-09-09 00:00:00'),(3,'Espèce','Espèce','2015-09-01 00:00:00'),(4,'Chèque','Chèque','2015-09-03 00:00:00'),(5,'Banque','Virement bancaire','2015-09-08 00:00:00');

/*Table structure for table `phase` */

DROP TABLE IF EXISTS `phase`;

CREATE TABLE `phase` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `phase` */

insert  into `phase`(`id`,`name`,`description`,`date`) values (1,'Nouveau','Nouvelle offre','2015-09-02 00:00:00'),(2,'En cours','Offre en cours','2015-09-12 00:00:00'),(3,'Fermé','Fermé','2015-09-12 00:00:00');

/*Table structure for table `reponse` */

DROP TABLE IF EXISTS `reponse`;

CREATE TABLE `reponse` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `annonce_id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phase_id` bigint(20) NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantite` bigint(20) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5FB6DEC78805AB2F` (`annonce_id`),
  KEY `IDX_5FB6DEC7A76ED395` (`user_id`),
  KEY `IDX_5FB6DEC799091188` (`phase_id`),
  CONSTRAINT `FK_5FB6DEC78805AB2F` FOREIGN KEY (`annonce_id`) REFERENCES `annonce` (`id`),
  CONSTRAINT `FK_5FB6DEC799091188` FOREIGN KEY (`phase_id`) REFERENCES `phase` (`id`),
  CONSTRAINT `FK_5FB6DEC7A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `reponse` */

insert  into `reponse`(`id`,`annonce_id`,`user_id`,`phase_id`,`message`,`quantite`,`date`) values (1,1,2,1,'je vend',50,'2015-09-12 23:53:03'),(2,1,2,1,'Ah moi j\'en ai 15 kg',15,'2015-09-13 03:31:58'),(3,2,3,1,'J\'en ai dix à vendre.',10,'2015-09-13 10:47:18'),(4,2,3,1,'Je dispose de 50 Bouteilles plastiques de possotomè usées',45,'2015-09-13 11:03:39'),(5,2,3,1,'Je sur moi depuis un certains temps, 100 bouteilles. Je suis prêt à les vendre.',100,'2015-09-13 11:06:31'),(6,2,3,1,'J\'ai une petite collection de 50 à vendre',50,'2015-09-13 11:19:06'),(7,2,3,1,'J\'en possède 10. Ça vous intéresse ?',10,'2015-09-13 11:21:54'),(8,2,3,1,'Bon, ma mère en achête souvent après des ménages. Je peux lui en soutirer une dizaine.',10,'2015-09-13 11:25:02'),(9,2,3,1,'50 à vendre.',50,'2015-09-13 11:33:05'),(10,2,3,1,'Une trentaine, ça vous dit ?',30,'2015-09-13 11:45:13'),(11,2,3,1,'10 à vendre',10,'2015-09-13 12:02:01'),(12,2,3,1,'Une centaine à vendre',100,'2015-09-13 12:07:07');

/*Table structure for table `type_annonce` */

DROP TABLE IF EXISTS `type_annonce`;

CREATE TABLE `type_annonce` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `type_annonce` */

insert  into `type_annonce`(`id`,`name`,`description`,`date`) values (1,'Achat','Acheter un déchet','2015-09-12 00:00:00'),(2,'Vente','Vendre un déchet','2015-09-01 00:00:00'),(3,'Collection','Colleter les déchet','2015-09-02 00:00:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
