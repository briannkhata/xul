/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 8.0.21 : Database - xuls
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`xuls` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `xuls`;

/*Table structure for table `academic_students` */

DROP TABLE IF EXISTS `academic_students`;

CREATE TABLE `academic_students` (
  `user_id` int NOT NULL,
  `grade_level_id` int NOT NULL,
  `section_id` int NOT NULL,
  `academic_year_id` int NOT NULL,
  `term_id` int NOT NULL,
  `date_registered` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`,`grade_level_id`,`section_id`,`academic_year_id`,`term_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `academic_students` */

insert  into `academic_students`(`user_id`,`grade_level_id`,`section_id`,`academic_year_id`,`term_id`,`date_registered`) values 
(61,1,1,0,3,'2021-09-02 17:41:42'),
(61,1,1,3,3,'2021-09-02 17:42:42'),
(61,2,1,3,0,'2021-09-03 08:48:59');

/*Table structure for table `academic_years` */

DROP TABLE IF EXISTS `academic_years`;

CREATE TABLE `academic_years` (
  `academic_year_id` int NOT NULL AUTO_INCREMENT,
  `academic_year` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  `starts` datetime DEFAULT NULL,
  `ends` datetime DEFAULT NULL,
  PRIMARY KEY (`academic_year_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `academic_years` */

insert  into `academic_years`(`academic_year_id`,`academic_year`,`deleted`,`starts`,`ends`) values 
(2,'Sept 2015 - July 2016',1,NULL,NULL),
(3,'2020 | 2021 - ',0,'2021-01-04 00:00:00','2021-12-24 00:00:00');

/*Table structure for table `assesment_marks` */

DROP TABLE IF EXISTS `assesment_marks`;

CREATE TABLE `assesment_marks` (
  `assesment_mark_id` int NOT NULL AUTO_INCREMENT,
  `assesment_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `mark_obtained` int DEFAULT NULL,
  `grade_level_id` int DEFAULT NULL,
  PRIMARY KEY (`assesment_mark_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

/*Data for the table `assesment_marks` */

insert  into `assesment_marks`(`assesment_mark_id`,`assesment_id`,`user_id`,`mark_obtained`,`grade_level_id`) values 
(1,2,2,78,2),
(2,2,81,77,2),
(3,2,91,98,2),
(4,2,101,98,2),
(5,2,111,76,2),
(6,2,121,76,2),
(7,2,281,55,2),
(8,2,291,45,2),
(9,2,301,67,2),
(10,2,311,54,2),
(11,2,321,77,2),
(12,2,331,53,2),
(13,2,341,98,2),
(14,2,351,65,2),
(15,2,361,76,2),
(16,2,371,77,2),
(17,2,381,98,2),
(18,2,391,67,2),
(19,2,401,55,2),
(20,NULL,6669,56,NULL),
(21,NULL,6668,67,NULL),
(22,NULL,6667,88,NULL),
(23,NULL,6666,60,NULL),
(24,NULL,761,56,NULL),
(25,NULL,3571,79,NULL),
(26,NULL,3661,78,NULL),
(27,NULL,6669,45,NULL),
(28,NULL,6668,78,NULL),
(29,NULL,6667,87,NULL),
(30,NULL,6666,88,NULL),
(31,1,6669,56,1),
(32,1,6668,89,1),
(33,1,6667,77,1),
(34,1,6666,67,1),
(35,1,4001,44,1),
(36,1,3881,67,1),
(37,1,3081,75,1),
(38,1,981,89,1),
(39,1,61,54,1),
(40,1,51,65,1),
(41,3,4031,40,3),
(42,3,4021,43,3),
(43,3,4011,47,3),
(44,3,4001,40,3),
(45,3,3991,30,3),
(46,3,3971,46,3),
(47,3,3961,46,3),
(48,3,3951,46,3),
(49,3,3941,43,3),
(50,3,3931,43,3),
(51,3,3921,34,3),
(52,3,3911,43,3),
(53,3,3901,32,3);

/*Table structure for table `assesment_types` */

DROP TABLE IF EXISTS `assesment_types`;

CREATE TABLE `assesment_types` (
  `assesment_type_id` int NOT NULL AUTO_INCREMENT,
  `assesment_type` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`assesment_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `assesment_types` */

insert  into `assesment_types`(`assesment_type_id`,`assesment_type`,`deleted`) values 
(1,'Test',0),
(2,'Home work',0),
(3,'Weekly Test',0);

/*Table structure for table `assesments` */

DROP TABLE IF EXISTS `assesments`;

CREATE TABLE `assesments` (
  `assesment_id` int NOT NULL AUTO_INCREMENT,
  `subject_id` int DEFAULT NULL,
  `due_date` datetime NOT NULL,
  `total_marks` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_assigned` datetime DEFAULT NULL,
  `term_id` int DEFAULT NULL,
  `assesment_type_id` int DEFAULT NULL,
  `added_by` int DEFAULT NULL,
  `grade_level_id` int DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `academic_year_id` int DEFAULT NULL,
  PRIMARY KEY (`assesment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `assesments` */

insert  into `assesments`(`assesment_id`,`subject_id`,`due_date`,`total_marks`,`date_assigned`,`term_id`,`assesment_type_id`,`added_by`,`grade_level_id`,`deleted`,`title`,`academic_year_id`) values 
(1,1,'2020-12-29 00:00:00','70','2020-12-20 00:00:00',3,1,1,1,0,'Second Assesment',2),
(2,1,'2021-09-12 00:00:00','100','2021-09-12 00:00:00',3,3,1,2,0,'First Assesment',2),
(3,1,'2021-09-26 00:00:00','50','2021-09-26 00:00:00',3,3,1,3,0,'Assesment 1',2);

/*Table structure for table `attendance_codes` */

DROP TABLE IF EXISTS `attendance_codes`;

CREATE TABLE `attendance_codes` (
  `attendance_code_id` int NOT NULL AUTO_INCREMENT,
  `attendance_code` varchar(50) DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  `comment` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`attendance_code_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `attendance_codes` */

insert  into `attendance_codes`(`attendance_code_id`,`attendance_code`,`deleted`,`comment`) values 
(1,'A',0,'ABSENT'),
(2,'P',0,'PRESENT');

/*Table structure for table `attendances` */

DROP TABLE IF EXISTS `attendances`;

CREATE TABLE `attendances` (
  `attendance_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `attendance_code_id` int DEFAULT NULL COMMENT '0 undefined , 1 present , 2  absent',
  `comment` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `attendance_date` date DEFAULT NULL,
  `term_id` int DEFAULT NULL,
  `academic_year_id` int DEFAULT NULL,
  `added_by` int DEFAULT NULL,
  `grade_level_id` int DEFAULT NULL,
  `section_id` int DEFAULT NULL,
  PRIMARY KEY (`attendance_id`)
) ENGINE=InnoDB AUTO_INCREMENT=423 DEFAULT CHARSET=utf8;

/*Data for the table `attendances` */

insert  into `attendances`(`attendance_id`,`user_id`,`attendance_code_id`,`comment`,`attendance_date`,`term_id`,`academic_year_id`,`added_by`,`grade_level_id`,`section_id`) values 
(2,4241,2,'','2021-01-16',3,3,1,1,NULL),
(3,4251,2,'','2021-01-16',3,3,1,1,NULL),
(4,4261,2,'','2021-01-16',3,3,1,1,NULL),
(5,4271,2,'','2021-01-16',3,3,1,1,NULL),
(6,4231,1,'','2021-01-16',3,3,1,1,NULL),
(7,11,1,'sick','2021-01-16',3,3,1,1,1),
(8,21,2,'','2021-01-16',3,3,1,1,1),
(9,31,2,'','2021-01-16',3,3,1,1,1),
(10,41,2,'','2021-01-16',3,3,1,1,1),
(11,51,1,'uniform','2021-01-16',3,3,1,1,1),
(12,4231,1,'','2021-09-26',3,2,1,1,NULL),
(13,4241,2,'','2021-09-26',3,2,1,1,NULL),
(14,4251,1,'','2021-09-26',3,2,1,1,NULL),
(15,4261,1,'','2021-09-26',3,2,1,1,NULL),
(16,4271,2,'','2021-09-26',3,2,1,1,NULL),
(17,4281,2,'','2021-09-26',3,2,1,1,NULL),
(18,4031,1,'','2021-09-26',3,3,1,3,1),
(19,4021,1,'','2021-09-26',3,3,1,3,1),
(20,4011,1,'','2021-09-26',3,3,1,3,1),
(21,4001,1,'','2021-09-26',3,3,1,3,1),
(22,3991,1,'','2021-09-26',3,3,1,3,1),
(23,3971,1,'','2021-09-26',3,3,1,3,1),
(24,3961,1,'','2021-09-26',3,3,1,3,1),
(25,3951,1,'','2021-09-26',3,3,1,3,1),
(26,3941,1,'','2021-09-26',3,3,1,3,1),
(27,3931,1,'','2021-09-26',3,3,1,3,1),
(28,3921,1,'','2021-09-26',3,3,1,3,1),
(29,3911,1,'','2021-09-26',3,3,1,3,1),
(30,3901,1,'','2021-09-26',3,3,1,3,1),
(31,3891,1,'','2021-09-26',3,3,1,3,1),
(32,3881,1,'','2021-09-26',3,3,1,3,1),
(33,3871,1,'','2021-09-26',3,3,1,3,1),
(34,3861,1,'','2021-09-26',3,3,1,3,1),
(35,3851,1,'','2021-09-26',3,3,1,3,1),
(36,3841,1,'','2021-09-26',3,3,1,3,1),
(37,3831,1,'','2021-09-26',3,3,1,3,1),
(38,3821,1,'','2021-09-26',3,3,1,3,1),
(39,3811,2,'','2021-09-26',3,3,1,3,1),
(40,3801,2,'','2021-09-26',3,3,1,3,1),
(41,271,2,'','2021-09-26',3,3,1,3,1),
(42,4231,2,'','2021-09-26',3,3,1,3,NULL),
(43,4241,2,'','2021-09-26',3,3,1,3,NULL),
(44,4251,2,'','2021-09-26',3,3,1,3,NULL),
(45,4261,2,'','2021-09-26',3,3,1,3,NULL),
(46,4271,2,'','2021-09-26',3,3,1,3,NULL),
(47,4281,2,'','2021-09-26',3,3,1,3,NULL),
(48,6669,1,'','2021-09-27',3,3,1,1,1),
(49,6668,1,'','2021-09-27',3,3,1,1,1),
(50,6667,1,'','2021-09-27',3,3,1,1,1),
(51,6666,1,'','2021-09-27',3,3,1,1,1),
(52,4221,1,'','2021-09-27',3,3,1,1,1),
(53,4211,1,'','2021-09-27',3,3,1,1,1),
(54,4201,1,'','2021-09-27',3,3,1,1,1),
(55,4191,1,'','2021-09-27',3,3,1,1,1),
(56,4181,1,'','2021-09-27',3,3,1,1,1),
(57,4171,1,'','2021-09-27',3,3,1,1,1),
(58,4161,1,'','2021-09-27',3,3,1,1,1),
(59,4151,1,'','2021-09-27',3,3,1,1,1),
(60,4141,1,'','2021-09-27',3,3,1,1,1),
(61,4131,1,'','2021-09-27',3,3,1,1,1),
(62,4121,1,'','2021-09-27',3,3,1,1,1),
(63,4111,1,'','2021-09-27',3,3,1,1,1),
(64,4101,1,'','2021-09-27',3,3,1,1,1),
(65,4091,1,'','2021-09-27',3,3,1,1,1),
(66,4081,1,'','2021-09-27',3,3,1,1,1),
(67,4071,1,'','2021-09-27',3,3,1,1,1),
(68,4061,1,'','2021-09-27',3,3,1,1,1),
(69,4051,1,'','2021-09-27',3,3,1,1,1),
(70,4041,1,'','2021-09-27',3,3,1,1,1),
(71,3791,1,'','2021-09-27',3,3,1,1,1),
(72,3781,1,'','2021-09-27',3,3,1,1,1),
(73,3771,1,'','2021-09-27',3,3,1,1,1),
(74,3761,1,'','2021-09-27',3,3,1,1,1),
(75,3751,1,'','2021-09-27',3,3,1,1,1),
(76,3741,1,'','2021-09-27',3,3,1,1,1),
(77,3731,1,'','2021-09-27',3,3,1,1,1),
(78,3721,1,'','2021-09-27',3,3,1,1,1),
(79,3711,1,'','2021-09-27',3,3,1,1,1),
(80,3701,1,'','2021-09-27',3,3,1,1,1),
(81,3691,1,'','2021-09-27',3,3,1,1,1),
(82,3681,1,'','2021-09-27',3,3,1,1,1),
(83,3671,1,'','2021-09-27',3,3,1,1,1),
(84,3661,1,'','2021-09-27',3,3,1,1,1),
(85,3651,1,'','2021-09-27',3,3,1,1,1),
(86,3641,1,'','2021-09-27',3,3,1,1,1),
(87,3631,1,'','2021-09-27',3,3,1,1,1),
(88,3621,1,'','2021-09-27',3,3,1,1,1),
(89,3611,1,'','2021-09-27',3,3,1,1,1),
(90,3601,1,'','2021-09-27',3,3,1,1,1),
(91,3591,1,'','2021-09-27',3,3,1,1,1),
(92,3581,1,'','2021-09-27',3,3,1,1,1),
(93,3571,1,'','2021-09-27',3,3,1,1,1),
(94,3561,1,'','2021-09-27',3,3,1,1,1),
(95,3551,1,'','2021-09-27',3,3,1,1,1),
(96,3541,1,'','2021-09-27',3,3,1,1,1),
(97,3531,1,'','2021-09-27',3,3,1,1,1),
(98,3521,1,'','2021-09-27',3,3,1,1,1),
(99,3511,1,'','2021-09-27',3,3,1,1,1),
(100,3501,1,'','2021-09-27',3,3,1,1,1),
(101,3491,1,'','2021-09-27',3,3,1,1,1),
(102,3481,1,'','2021-09-27',3,3,1,1,1),
(103,3471,1,'','2021-09-27',3,3,1,1,1),
(104,3461,1,'','2021-09-27',3,3,1,1,1),
(105,3451,1,'','2021-09-27',3,3,1,1,1),
(106,3441,1,'','2021-09-27',3,3,1,1,1),
(107,3431,1,'','2021-09-27',3,3,1,1,1),
(108,3421,1,'','2021-09-27',3,3,1,1,1),
(109,3411,1,'','2021-09-27',3,3,1,1,1),
(110,3401,1,'','2021-09-27',3,3,1,1,1),
(111,3391,1,'','2021-09-27',3,3,1,1,1),
(112,3381,1,'','2021-09-27',3,3,1,1,1),
(113,3371,1,'','2021-09-27',3,3,1,1,1),
(114,3361,1,'','2021-09-27',3,3,1,1,1),
(115,3351,1,'','2021-09-27',3,3,1,1,1),
(116,3341,1,'','2021-09-27',3,3,1,1,1),
(117,3331,1,'','2021-09-27',3,3,1,1,1),
(118,3321,1,'','2021-09-27',3,3,1,1,1),
(119,3311,1,'','2021-09-27',3,3,1,1,1),
(120,3301,1,'','2021-09-27',3,3,1,1,1),
(121,3291,1,'','2021-09-27',3,3,1,1,1),
(122,3281,1,'','2021-09-27',3,3,1,1,1),
(123,3271,1,'','2021-09-27',3,3,1,1,1),
(124,3261,1,'','2021-09-27',3,3,1,1,1),
(125,3251,1,'','2021-09-27',3,3,1,1,1),
(126,3241,1,'','2021-09-27',3,3,1,1,1),
(127,3231,1,'','2021-09-27',3,3,1,1,1),
(128,3221,1,'','2021-09-27',3,3,1,1,1),
(129,3211,1,'','2021-09-27',3,3,1,1,1),
(130,3201,1,'','2021-09-27',3,3,1,1,1),
(131,3191,1,'','2021-09-27',3,3,1,1,1),
(132,3181,1,'','2021-09-27',3,3,1,1,1),
(133,3171,1,'','2021-09-27',3,3,1,1,1),
(134,3161,1,'','2021-09-27',3,3,1,1,1),
(135,3151,1,'','2021-09-27',3,3,1,1,1),
(136,3141,1,'','2021-09-27',3,3,1,1,1),
(137,3131,1,'','2021-09-27',3,3,1,1,1),
(138,3121,1,'','2021-09-27',3,3,1,1,1),
(139,3111,1,'','2021-09-27',3,3,1,1,1),
(140,3101,1,'','2021-09-27',3,3,1,1,1),
(141,3091,1,'','2021-09-27',3,3,1,1,1),
(142,3081,1,'','2021-09-27',3,3,1,1,1),
(143,3071,1,'','2021-09-27',3,3,1,1,1),
(144,3061,1,'','2021-09-27',3,3,1,1,1),
(145,3051,1,'','2021-09-27',3,3,1,1,1),
(146,3041,1,'','2021-09-27',3,3,1,1,1),
(147,3021,1,'','2021-09-27',3,3,1,1,1),
(148,3011,1,'','2021-09-27',3,3,1,1,1),
(149,3001,1,'','2021-09-27',3,3,1,1,1),
(150,2991,1,'','2021-09-27',3,3,1,1,1),
(151,2981,1,'','2021-09-27',3,3,1,1,1),
(152,2971,1,'','2021-09-27',3,3,1,1,1),
(153,2961,1,'','2021-09-27',3,3,1,1,1),
(154,2951,1,'','2021-09-27',3,3,1,1,1),
(155,2941,1,'','2021-09-27',3,3,1,1,1),
(156,2931,1,'','2021-09-27',3,3,1,1,1),
(157,2921,1,'','2021-09-27',3,3,1,1,1),
(158,2911,1,'','2021-09-27',3,3,1,1,1),
(159,2901,1,'','2021-09-27',3,3,1,1,1),
(160,2891,1,'','2021-09-27',3,3,1,1,1),
(161,2861,1,'','2021-09-27',3,3,1,1,1),
(162,2851,1,'','2021-09-27',3,3,1,1,1),
(163,2841,1,'','2021-09-27',3,3,1,1,1),
(164,2831,1,'','2021-09-27',3,3,1,1,1),
(165,2821,1,'','2021-09-27',3,3,1,1,1),
(166,2811,1,'','2021-09-27',3,3,1,1,1),
(167,2801,1,'','2021-09-27',3,3,1,1,1),
(168,2791,1,'','2021-09-27',3,3,1,1,1),
(169,2781,1,'','2021-09-27',3,3,1,1,1),
(170,2771,1,'','2021-09-27',3,3,1,1,1),
(171,2761,1,'','2021-09-27',3,3,1,1,1),
(172,2741,1,'','2021-09-27',3,3,1,1,1),
(173,2731,1,'','2021-09-27',3,3,1,1,1),
(174,2721,1,'','2021-09-27',3,3,1,1,1),
(175,2711,1,'','2021-09-27',3,3,1,1,1),
(176,2701,1,'','2021-09-27',3,3,1,1,1),
(177,2691,1,'','2021-09-27',3,3,1,1,1),
(178,2681,1,'','2021-09-27',3,3,1,1,1),
(179,2671,1,'','2021-09-27',3,3,1,1,1),
(180,2661,1,'','2021-09-27',3,3,1,1,1),
(181,2641,1,'','2021-09-27',3,3,1,1,1),
(182,2631,1,'','2021-09-27',3,3,1,1,1),
(183,2621,1,'','2021-09-27',3,3,1,1,1),
(184,2611,1,'','2021-09-27',3,3,1,1,1),
(185,2601,1,'','2021-09-27',3,3,1,1,1),
(186,2591,1,'','2021-09-27',3,3,1,1,1),
(187,2581,1,'','2021-09-27',3,3,1,1,1),
(188,2571,1,'','2021-09-27',3,3,1,1,1),
(189,2561,1,'','2021-09-27',3,3,1,1,1),
(190,2551,1,'','2021-09-27',3,3,1,1,1),
(191,2541,1,'','2021-09-27',3,3,1,1,1),
(192,2531,1,'','2021-09-27',3,3,1,1,1),
(193,2521,1,'','2021-09-27',3,3,1,1,1),
(194,2511,1,'','2021-09-27',3,3,1,1,1),
(195,2501,1,'','2021-09-27',3,3,1,1,1),
(196,2491,1,'','2021-09-27',3,3,1,1,1),
(197,2481,1,'','2021-09-27',3,3,1,1,1),
(198,2471,1,'','2021-09-27',3,3,1,1,1),
(199,2461,1,'','2021-09-27',3,3,1,1,1),
(200,2451,1,'','2021-09-27',3,3,1,1,1),
(201,2441,1,'','2021-09-27',3,3,1,1,1),
(202,2431,1,'','2021-09-27',3,3,1,1,1),
(203,2421,1,'','2021-09-27',3,3,1,1,1),
(204,2411,1,'','2021-09-27',3,3,1,1,1),
(205,2401,1,'','2021-09-27',3,3,1,1,1),
(206,2391,1,'','2021-09-27',3,3,1,1,1),
(207,2381,1,'','2021-09-27',3,3,1,1,1),
(208,2371,1,'','2021-09-27',3,3,1,1,1),
(209,2361,1,'','2021-09-27',3,3,1,1,1),
(210,2351,1,'','2021-09-27',3,3,1,1,1),
(211,2341,1,'','2021-09-27',3,3,1,1,1),
(212,2331,1,'','2021-09-27',3,3,1,1,1),
(213,2321,1,'','2021-09-27',3,3,1,1,1),
(214,2311,1,'','2021-09-27',3,3,1,1,1),
(215,2301,1,'','2021-09-27',3,3,1,1,1),
(216,2291,1,'','2021-09-27',3,3,1,1,1),
(217,2281,1,'','2021-09-27',3,3,1,1,1),
(218,2271,1,'','2021-09-27',3,3,1,1,1),
(219,2261,1,'','2021-09-27',3,3,1,1,1),
(220,2251,1,'','2021-09-27',3,3,1,1,1),
(221,2231,1,'','2021-09-27',3,3,1,1,1),
(222,2221,1,'','2021-09-27',3,3,1,1,1),
(223,2211,1,'','2021-09-27',3,3,1,1,1),
(224,2201,1,'','2021-09-27',3,3,1,1,1),
(225,2191,1,'','2021-09-27',3,3,1,1,1),
(226,2181,1,'','2021-09-27',3,3,1,1,1),
(227,2171,1,'','2021-09-27',3,3,1,1,1),
(228,2161,1,'','2021-09-27',3,3,1,1,1),
(229,2151,1,'','2021-09-27',3,3,1,1,1),
(230,2141,1,'','2021-09-27',3,3,1,1,1),
(231,2131,1,'','2021-09-27',3,3,1,1,1),
(232,2121,1,'','2021-09-27',3,3,1,1,1),
(233,2111,1,'','2021-09-27',3,3,1,1,1),
(234,2101,1,'','2021-09-27',3,3,1,1,1),
(235,2091,1,'','2021-09-27',3,3,1,1,1),
(236,2071,1,'','2021-09-27',3,3,1,1,1),
(237,2061,1,'','2021-09-27',3,3,1,1,1),
(238,2051,1,'','2021-09-27',3,3,1,1,1),
(239,2041,1,'','2021-09-27',3,3,1,1,1),
(240,2031,1,'','2021-09-27',3,3,1,1,1),
(241,2021,1,'','2021-09-27',3,3,1,1,1),
(242,2011,1,'','2021-09-27',3,3,1,1,1),
(243,2001,1,'','2021-09-27',3,3,1,1,1),
(244,1991,1,'','2021-09-27',3,3,1,1,1),
(245,1981,1,'','2021-09-27',3,3,1,1,1),
(246,1971,1,'','2021-09-27',3,3,1,1,1),
(247,1961,1,'','2021-09-27',3,3,1,1,1),
(248,1951,1,'','2021-09-27',3,3,1,1,1),
(249,1941,1,'','2021-09-27',3,3,1,1,1),
(250,1931,1,'','2021-09-27',3,3,1,1,1),
(251,1921,1,'','2021-09-27',3,3,1,1,1),
(252,1911,1,'','2021-09-27',3,3,1,1,1),
(253,1901,1,'','2021-09-27',3,3,1,1,1),
(254,1891,1,'','2021-09-27',3,3,1,1,1),
(255,1881,1,'','2021-09-27',3,3,1,1,1),
(256,1871,1,'','2021-09-27',3,3,1,1,1),
(257,1861,1,'','2021-09-27',3,3,1,1,1),
(258,1851,1,'','2021-09-27',3,3,1,1,1),
(259,1821,1,'','2021-09-27',3,3,1,1,1),
(260,1811,1,'','2021-09-27',3,3,1,1,1),
(261,1801,1,'','2021-09-27',3,3,1,1,1),
(262,1791,1,'','2021-09-27',3,3,1,1,1),
(263,1781,1,'','2021-09-27',3,3,1,1,1),
(264,1771,1,'','2021-09-27',3,3,1,1,1),
(265,1761,1,'','2021-09-27',3,3,1,1,1),
(266,1751,1,'','2021-09-27',3,3,1,1,1),
(267,1741,1,'','2021-09-27',3,3,1,1,1),
(268,1731,1,'','2021-09-27',3,3,1,1,1),
(269,1721,1,'','2021-09-27',3,3,1,1,1),
(270,1711,1,'','2021-09-27',3,3,1,1,1),
(271,1701,1,'','2021-09-27',3,3,1,1,1),
(272,1691,1,'','2021-09-27',3,3,1,1,1),
(273,1681,1,'','2021-09-27',3,3,1,1,1),
(274,1671,1,'','2021-09-27',3,3,1,1,1),
(275,1661,1,'','2021-09-27',3,3,1,1,1),
(276,1651,1,'','2021-09-27',3,3,1,1,1),
(277,1641,1,'','2021-09-27',3,3,1,1,1),
(278,1631,1,'','2021-09-27',3,3,1,1,1),
(279,1621,1,'','2021-09-27',3,3,1,1,1),
(280,1611,1,'','2021-09-27',3,3,1,1,1),
(281,1601,1,'','2021-09-27',3,3,1,1,1),
(282,1591,1,'','2021-09-27',3,3,1,1,1),
(283,1581,1,'','2021-09-27',3,3,1,1,1),
(284,1571,1,'','2021-09-27',3,3,1,1,1),
(285,1561,1,'','2021-09-27',3,3,1,1,1),
(286,1551,1,'','2021-09-27',3,3,1,1,1),
(287,1541,1,'','2021-09-27',3,3,1,1,1),
(288,1531,1,'','2021-09-27',3,3,1,1,1),
(289,1521,1,'','2021-09-27',3,3,1,1,1),
(290,1511,1,'','2021-09-27',3,3,1,1,1),
(291,1501,1,'','2021-09-27',3,3,1,1,1),
(292,1491,1,'','2021-09-27',3,3,1,1,1),
(293,1481,1,'','2021-09-27',3,3,1,1,1),
(294,1471,1,'','2021-09-27',3,3,1,1,1),
(295,1461,1,'','2021-09-27',3,3,1,1,1),
(296,1441,1,'','2021-09-27',3,3,1,1,1),
(297,1431,1,'','2021-09-27',3,3,1,1,1),
(298,1421,1,'','2021-09-27',3,3,1,1,1),
(299,1411,1,'','2021-09-27',3,3,1,1,1),
(300,1401,1,'','2021-09-27',3,3,1,1,1),
(301,1391,1,'','2021-09-27',3,3,1,1,1),
(302,1381,1,'','2021-09-27',3,3,1,1,1),
(303,1371,1,'','2021-09-27',3,3,1,1,1),
(304,1361,1,'','2021-09-27',3,3,1,1,1),
(305,1351,1,'','2021-09-27',3,3,1,1,1),
(306,1341,1,'','2021-09-27',3,3,1,1,1),
(307,1321,1,'','2021-09-27',3,3,1,1,1),
(308,1311,1,'','2021-09-27',3,3,1,1,1),
(309,1301,1,'','2021-09-27',3,3,1,1,1),
(310,1291,1,'','2021-09-27',3,3,1,1,1),
(311,1281,1,'','2021-09-27',3,3,1,1,1),
(312,1271,1,'','2021-09-27',3,3,1,1,1),
(313,1261,1,'','2021-09-27',3,3,1,1,1),
(314,1251,1,'','2021-09-27',3,3,1,1,1),
(315,1241,1,'','2021-09-27',3,3,1,1,1),
(316,1231,1,'','2021-09-27',3,3,1,1,1),
(317,1221,1,'','2021-09-27',3,3,1,1,1),
(318,1211,1,'','2021-09-27',3,3,1,1,1),
(319,1201,1,'','2021-09-27',3,3,1,1,1),
(320,1191,1,'','2021-09-27',3,3,1,1,1),
(321,1171,1,'','2021-09-27',3,3,1,1,1),
(322,1161,1,'','2021-09-27',3,3,1,1,1),
(323,1141,1,'','2021-09-27',3,3,1,1,1),
(324,1131,1,'','2021-09-27',3,3,1,1,1),
(325,1121,1,'','2021-09-27',3,3,1,1,1),
(326,1111,1,'','2021-09-27',3,3,1,1,1),
(327,1101,1,'','2021-09-27',3,3,1,1,1),
(328,1091,1,'','2021-09-27',3,3,1,1,1),
(329,1071,1,'','2021-09-27',3,3,1,1,1),
(330,1061,1,'','2021-09-27',3,3,1,1,1),
(331,1051,1,'','2021-09-27',3,3,1,1,1),
(332,1041,1,'','2021-09-27',3,3,1,1,1),
(333,1031,1,'','2021-09-27',3,3,1,1,1),
(334,1021,1,'','2021-09-27',3,3,1,1,1),
(335,1011,1,'','2021-09-27',3,3,1,1,1),
(336,1001,1,'','2021-09-27',3,3,1,1,1),
(337,991,1,'','2021-09-27',3,3,1,1,1),
(338,981,1,'','2021-09-27',3,3,1,1,1),
(339,971,1,'','2021-09-27',3,3,1,1,1),
(340,961,1,'','2021-09-27',3,3,1,1,1),
(341,951,1,'','2021-09-27',3,3,1,1,1),
(342,941,1,'','2021-09-27',3,3,1,1,1),
(343,931,1,'','2021-09-27',3,3,1,1,1),
(344,921,1,'','2021-09-27',3,3,1,1,1),
(345,911,1,'','2021-09-27',3,3,1,1,1),
(346,901,1,'','2021-09-27',3,3,1,1,1),
(347,891,1,'','2021-09-27',3,3,1,1,1),
(348,881,1,'','2021-09-27',3,3,1,1,1),
(349,871,1,'','2021-09-27',3,3,1,1,1),
(350,861,1,'','2021-09-27',3,3,1,1,1),
(351,851,1,'','2021-09-27',3,3,1,1,1),
(352,841,1,'','2021-09-27',3,3,1,1,1),
(353,831,1,'','2021-09-27',3,3,1,1,1),
(354,821,1,'','2021-09-27',3,3,1,1,1),
(355,811,1,'','2021-09-27',3,3,1,1,1),
(356,801,1,'','2021-09-27',3,3,1,1,1),
(357,791,1,'','2021-09-27',3,3,1,1,1),
(358,781,1,'','2021-09-27',3,3,1,1,1),
(359,771,1,'','2021-09-27',3,3,1,1,1),
(360,761,1,'','2021-09-27',3,3,1,1,1),
(361,751,1,'','2021-09-27',3,3,1,1,1),
(362,731,1,'','2021-09-27',3,3,1,1,1),
(363,721,1,'','2021-09-27',3,3,1,1,1),
(364,711,1,'','2021-09-27',3,3,1,1,1),
(365,701,1,'','2021-09-27',3,3,1,1,1),
(366,691,1,'','2021-09-27',3,3,1,1,1),
(367,681,1,'','2021-09-27',3,3,1,1,1),
(368,671,1,'','2021-09-27',3,3,1,1,1),
(369,651,1,'','2021-09-27',3,3,1,1,1),
(370,641,1,'','2021-09-27',3,3,1,1,1),
(371,631,1,'','2021-09-27',3,3,1,1,1),
(372,621,1,'','2021-09-27',3,3,1,1,1),
(373,611,1,'','2021-09-27',3,3,1,1,1),
(374,601,1,'','2021-09-27',3,3,1,1,1),
(375,591,1,'','2021-09-27',3,3,1,1,1),
(376,581,1,'','2021-09-27',3,3,1,1,1),
(377,571,1,'','2021-09-27',3,3,1,1,1),
(378,561,1,'','2021-09-27',3,3,1,1,1),
(379,551,1,'','2021-09-27',3,3,1,1,1),
(380,541,1,'','2021-09-27',3,3,1,1,1),
(381,531,1,'','2021-09-27',3,3,1,1,1),
(382,521,1,'','2021-09-27',3,3,1,1,1),
(383,511,1,'','2021-09-27',3,3,1,1,1),
(384,501,1,'','2021-09-27',3,3,1,1,1),
(385,491,1,'','2021-09-27',3,3,1,1,1),
(386,481,1,'','2021-09-27',3,3,1,1,1),
(387,471,1,'','2021-09-27',3,3,1,1,1),
(388,461,1,'','2021-09-27',3,3,1,1,1),
(389,451,1,'','2021-09-27',3,3,1,1,1),
(390,441,1,'','2021-09-27',3,3,1,1,1),
(391,431,1,'','2021-09-27',3,3,1,1,1),
(392,421,1,'','2021-09-27',3,3,1,1,1),
(393,411,1,'','2021-09-27',3,3,1,1,1),
(394,61,1,'','2021-09-27',3,3,1,1,1),
(395,51,1,'','2021-09-27',3,3,1,1,1),
(396,41,1,'','2021-09-27',3,3,1,1,1),
(397,31,1,'','2021-09-27',3,3,1,1,1),
(398,21,1,'','2021-09-27',3,3,1,1,1),
(399,4031,2,'','2021-09-27',3,3,1,3,1),
(400,4021,1,'','2021-09-27',3,3,1,3,1),
(401,4011,2,'','2021-09-27',3,3,1,3,1),
(402,4001,2,'','2021-09-27',3,3,1,3,1),
(403,3991,2,'','2021-09-27',3,3,1,3,1),
(404,3971,1,'','2021-09-27',3,3,1,3,1),
(405,3961,1,'','2021-09-27',3,3,1,3,1),
(406,3951,1,'','2021-09-27',3,3,1,3,1),
(407,3941,1,'','2021-09-27',3,3,1,3,1),
(408,3931,2,'','2021-09-27',3,3,1,3,1),
(409,3921,1,'','2021-09-27',3,3,1,3,1),
(410,3911,1,'','2021-09-27',3,3,1,3,1),
(411,3901,1,'','2021-09-27',3,3,1,3,1),
(412,3891,1,'','2021-09-27',3,3,1,3,1),
(413,3881,1,'','2021-09-27',3,3,1,3,1),
(414,3871,1,'','2021-09-27',3,3,1,3,1),
(415,3861,1,'','2021-09-27',3,3,1,3,1),
(416,3851,1,'','2021-09-27',3,3,1,3,1),
(417,3841,1,'','2021-09-27',3,3,1,3,1),
(418,3831,1,'','2021-09-27',3,3,1,3,1),
(419,3821,1,'','2021-09-27',3,3,1,3,1),
(420,3811,1,'','2021-09-27',3,3,1,3,1),
(421,3801,1,'','2021-09-27',3,3,1,3,1),
(422,271,1,'','2021-09-27',3,3,1,3,1);

/*Table structure for table `book_categories` */

DROP TABLE IF EXISTS `book_categories`;

CREATE TABLE `book_categories` (
  `book_category_id` int NOT NULL AUTO_INCREMENT,
  `book_category` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`book_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `book_categories` */

insert  into `book_categories`(`book_category_id`,`book_category`,`deleted`) values 
(1,'Novel',0);

/*Table structure for table `book_missings` */

DROP TABLE IF EXISTS `book_missings`;

CREATE TABLE `book_missings` (
  `book_missing_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `grade_level_id` int DEFAULT NULL,
  `lost_date` datetime DEFAULT NULL,
  `added_by` int DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  `book_id` int DEFAULT NULL,
  `replaced` int NOT NULL DEFAULT '0',
  `fine` double DEFAULT NULL,
  `date_replaced` datetime DEFAULT NULL,
  PRIMARY KEY (`book_missing_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `book_missings` */

insert  into `book_missings`(`book_missing_id`,`user_id`,`grade_level_id`,`lost_date`,`added_by`,`deleted`,`book_id`,`replaced`,`fine`,`date_replaced`) values 
(3,21,NULL,'2021-01-14 00:00:00',1,0,1,1,NULL,'2021-01-13 10:37:00'),
(4,1,1,'2021-01-06 00:00:00',11,1,1,0,NULL,NULL);

/*Table structure for table `book_receivings` */

DROP TABLE IF EXISTS `book_receivings`;

CREATE TABLE `book_receivings` (
  `book_receiving_id` int NOT NULL AUTO_INCREMENT,
  `book_id` int DEFAULT NULL,
  `comment` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `added_by` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `arrival_date` datetime DEFAULT NULL,
  `price` double DEFAULT NULL,
  `total_cost` double DEFAULT NULL,
  PRIMARY KEY (`book_receiving_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `book_receivings` */

insert  into `book_receivings`(`book_receiving_id`,`book_id`,`comment`,`date`,`added_by`,`quantity`,`arrival_date`,`price`,`total_cost`) values 
(5,2,'school bought','2021-09-01 00:00:00',11,20,'2021-09-01 00:00:00',4500,90000),
(6,3,'MINISTRY OF EDUCTAION','2021-09-20 00:00:00',1,20,'2021-09-12 00:00:00',4500,90000);

/*Table structure for table `book_rentouts` */

DROP TABLE IF EXISTS `book_rentouts`;

CREATE TABLE `book_rentouts` (
  `book_rentout_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `grade_level_id` int DEFAULT NULL,
  `borrow_date` datetime DEFAULT NULL,
  `due_date` datetime DEFAULT NULL,
  `added_by` int DEFAULT NULL,
  `book_id` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '1 - YES, 2 - NO , 3 - LOST',
  `fine` double DEFAULT NULL,
  `date_returned` datetime DEFAULT NULL,
  `date_replaced` datetime DEFAULT NULL,
  `date_lost` datetime DEFAULT NULL,
  PRIMARY KEY (`book_rentout_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `book_rentouts` */

insert  into `book_rentouts`(`book_rentout_id`,`user_id`,`grade_level_id`,`borrow_date`,`due_date`,`added_by`,`book_id`,`status`,`fine`,`date_returned`,`date_replaced`,`date_lost`) values 
(1,21,1,'0000-00-00 00:00:00','2021-01-28 00:00:00',1,1,1,NULL,'2021-01-12 05:48:00',NULL,NULL),
(2,11,1,'2021-01-12 04:41:00','2021-01-14 00:00:00',1,2,1,NULL,'2021-01-12 05:19:00',NULL,NULL),
(3,21,1,'2021-01-12 04:43:00','2021-01-14 00:00:00',1,2,0,6000,'2021-01-17 05:03:00',NULL,NULL),
(4,11,1,'2021-01-12 04:45:00','2021-01-21 00:00:00',1,1,0,0,'2021-09-20 09:08:00',NULL,NULL),
(5,11,NULL,'2021-01-13 10:20:00',NULL,1,1,1,0,'0000-00-00 00:00:00','2021-09-26 06:58:00',NULL),
(6,21,2,'2021-01-17 05:16:00','2021-01-20 00:00:00',11,1,3,0,'2021-09-20 09:43:00',NULL,'2021-09-26 07:44:00'),
(7,11,1,'2021-09-21 07:46:00','2021-09-23 00:00:00',1,3,1,NULL,NULL,NULL,NULL),
(8,51,1,'2021-09-21 08:47:00','2021-09-21 00:00:00',1,3,1,NULL,NULL,NULL,NULL);

/*Table structure for table `book_shelfs` */

DROP TABLE IF EXISTS `book_shelfs`;

CREATE TABLE `book_shelfs` (
  `book_shelf_id` int NOT NULL AUTO_INCREMENT,
  `book_shelf` varchar(100) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`book_shelf_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `book_shelfs` */

insert  into `book_shelfs`(`book_shelf_id`,`book_shelf`,`code`,`deleted`) values 
(1,'ENGLISH','EA',0),
(2,'mathematics section','mat10',0);

/*Table structure for table `books` */

DROP TABLE IF EXISTS `books`;

CREATE TABLE `books` (
  `book_id` int NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `author` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `grade_level_id` int DEFAULT NULL,
  `instock` int NOT NULL DEFAULT '1',
  `deleted` int NOT NULL DEFAULT '0',
  `isbn` varchar(100) DEFAULT NULL,
  `edition` varchar(100) DEFAULT NULL,
  `book_category_id` int DEFAULT NULL,
  `added_by` int DEFAULT NULL,
  `book_shelf_id` int DEFAULT NULL,
  `subject_id` int DEFAULT NULL,
  `publisher` varchar(100) DEFAULT NULL,
  `date_published` varchar(100) DEFAULT NULL,
  `place_published` varchar(100) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `books` */

insert  into `books`(`book_id`,`title`,`author`,`grade_level_id`,`instock`,`deleted`,`isbn`,`edition`,`book_category_id`,`added_by`,`book_shelf_id`,`subject_id`,`publisher`,`date_published`,`place_published`,`date_added`,`quantity`) values 
(1,'Introduction to programming','		brian,kankuz																													',1,361,0,'1234','3',1,1,56,6,'claim','2021-01-14','BT','2021-01-12 04:10:16',0),
(2,'GEOGRAPHY','	DD,KK,BB,MM																														',3,1146,0,'1234#','4TH',1,1,56,7,'claim','2021-01-28','BT','2021-01-12 04:26:14',0),
(3,'Excell and Succeed','Excell and Succeed',1,19,0,'ok','4TH',1,1,1,1,'claim mabuku','2021-05-05','BT','2021-09-20 10:44:09',0);

/*Table structure for table `charge_types` */

DROP TABLE IF EXISTS `charge_types`;

CREATE TABLE `charge_types` (
  `charge_type_id` int NOT NULL AUTO_INCREMENT,
  `charge_type` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `amount` decimal(15,4) DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  `comment` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`charge_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `charge_types` */

insert  into `charge_types`(`charge_type_id`,`charge_type`,`amount`,`deleted`,`comment`) values 
(1,'Uniform',10000.0000,0,''),
(11,'TUITION FEES',20000.0000,0,'TUITION FEES'),
(12,'Boarding fee',40000.0000,0,'boarding');

/*Table structure for table `charges` */

DROP TABLE IF EXISTS `charges`;

CREATE TABLE `charges` (
  `charge_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `term_id` int DEFAULT NULL,
  `academic_year_id` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `charge_type_id` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `amount` int DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  `balance` int DEFAULT NULL,
  PRIMARY KEY (`charge_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

/*Data for the table `charges` */

insert  into `charges`(`charge_id`,`user_id`,`term_id`,`academic_year_id`,`charge_type_id`,`amount`,`deleted`,`balance`) values 
(1,421,3,'3','11',20000,1,20000),
(2,411,3,'3','11',20000,1,0),
(3,401,3,'3','11',20000,1,0),
(4,391,3,'3','11',20000,1,0),
(5,381,3,'3','11',20000,1,0),
(6,371,3,'3','11',20000,1,0),
(7,361,3,'3','11',20000,1,20000),
(8,351,3,'3','11',20000,1,0),
(9,341,3,'3','11',20000,1,0),
(10,331,3,'3','11',20000,1,0),
(11,321,3,'3','11',20000,1,0),
(12,311,3,'3','11',20000,1,0),
(13,301,3,'3','11',20000,1,0),
(14,291,3,'3','11',20000,1,0),
(15,281,3,'3','11',20000,1,0),
(16,271,3,'3','11',20000,1,0),
(17,271,3,'3','12',40000,1,0),
(18,281,3,'3','12',40000,1,0),
(19,291,3,'3','12',40000,1,0),
(20,301,3,'3','12',40000,1,0),
(21,311,3,'3','12',40000,1,0),
(22,321,3,'3','12',40000,1,0),
(23,331,3,'3','12',40000,1,0),
(24,341,3,'3','12',40000,1,0),
(25,351,3,'3','12',40000,1,0),
(26,361,3,'3','12',40000,1,0),
(27,371,3,'3','12',40000,1,0),
(28,381,3,'3','12',40000,1,0),
(29,391,3,'3','12',40000,1,0),
(30,401,3,'3','12',40000,1,0),
(31,411,3,'3','12',40000,1,0),
(32,421,3,'3','12',40000,1,0),
(33,271,3,'3','1',10000,0,10000),
(34,281,3,'3','1',10000,0,10000),
(35,291,3,'3','1',10000,0,10000),
(36,301,3,'3','1',10000,0,10000),
(37,311,3,'3','1',10000,0,10000),
(38,321,3,'3','1',10000,0,10000),
(39,331,3,'3','1',10000,0,10000),
(40,341,3,'3','1',10000,0,10000),
(41,351,3,'3','1',10000,0,10000),
(42,361,3,'3','1',10000,0,10000),
(43,371,3,'3','1',10000,0,10000),
(44,381,3,'3','1',10000,0,10000),
(45,391,3,'3','1',10000,0,10000),
(46,401,3,'3','1',10000,0,10000),
(47,411,3,'3','1',10000,0,10000),
(48,421,3,'3','1',10000,0,10000);

/*Table structure for table `departments` */

DROP TABLE IF EXISTS `departments`;

CREATE TABLE `departments` (
  `department_id` int NOT NULL AUTO_INCREMENT,
  `department` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `departments` */

insert  into `departments`(`department_id`,`department`,`deleted`) values 
(1,'Science',0),
(2,'Languages',0);

/*Table structure for table `disciplines` */

DROP TABLE IF EXISTS `disciplines`;

CREATE TABLE `disciplines` (
  `discipline_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `offence` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `resolution` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `offence_date` varchar(100) DEFAULT NULL,
  `academic_year_id` int DEFAULT NULL,
  `added_by` int DEFAULT NULL,
  `grade_level_id` int DEFAULT NULL,
  `presiding_team` text,
  `deleted` int NOT NULL DEFAULT '0',
  `presiding_date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`discipline_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `disciplines` */

insert  into `disciplines`(`discipline_id`,`user_id`,`offence`,`resolution`,`offence_date`,`academic_year_id`,`added_by`,`grade_level_id`,`presiding_team`,`deleted`,`presiding_date`) values 
(1,21,'																									waba																																					','								apite kwao																							','2020-11-30',3,1,1,'																	ine ine																																													',0,'2020-12-22');

/*Table structure for table `duties` */

DROP TABLE IF EXISTS `duties`;

CREATE TABLE `duties` (
  `duty_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `week_no` int DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  `term_id` int DEFAULT NULL,
  `academic_year_id` int DEFAULT NULL,
  `comment` text,
  PRIMARY KEY (`duty_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `duties` */

/*Table structure for table `emails` */

DROP TABLE IF EXISTS `emails`;

CREATE TABLE `emails` (
  `email_id` int NOT NULL AUTO_INCREMENT,
  `receiver_email` varchar(100) DEFAULT NULL,
  `sender_email` varchar(100) DEFAULT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `subject` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_sent` datetime NOT NULL,
  `role` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`email_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `emails` */

insert  into `emails`(`email_id`,`receiver_email`,`sender_email`,`message`,`subject`,`date_sent`,`role`) values 
(1,'briannkhata@gmail.com',NULL,'wwwwwwwww','TESTING EMAILS','2021-10-16 07:56:40',NULL),
(2,'briannkhata@gmail.com',NULL,'wwwwwwwww','TESTING EMAILS','2021-10-16 07:57:40',NULL),
(3,'briannkhata@gmail.com','info@focxuls.com','wwwwwwwww','TESTING EMAILS','2021-10-16 07:58:07',NULL);

/*Table structure for table `examination_marks` */

DROP TABLE IF EXISTS `examination_marks`;

CREATE TABLE `examination_marks` (
  `examination_mark_id` int NOT NULL AUTO_INCREMENT,
  `examination_paper_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `mark_obtained` int NOT NULL DEFAULT '0',
  `examination_id` int DEFAULT NULL,
  `grade_level_id` int DEFAULT NULL,
  `added_by` int DEFAULT NULL,
  `points` int DEFAULT NULL,
  `average_mark` int DEFAULT NULL,
  `subject_id` int DEFAULT NULL,
  `average_point` int DEFAULT NULL,
  PRIMARY KEY (`examination_mark_id`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8;

/*Data for the table `examination_marks` */

insert  into `examination_marks`(`examination_mark_id`,`examination_paper_id`,`user_id`,`mark_obtained`,`examination_id`,`grade_level_id`,`added_by`,`points`,`average_mark`,`subject_id`,`average_point`) values 
(1,2,21,67,2,1,1,4,0,2,NULL),
(2,2,31,66,2,1,1,4,0,2,NULL),
(3,2,41,57,2,1,1,6,0,2,NULL),
(4,2,51,55,2,1,1,6,0,2,NULL),
(5,2,61,62,2,1,1,5,0,2,NULL),
(6,10,21,88,2,1,1,1,0,2,1),
(7,10,31,66,2,1,1,4,0,2,3),
(8,10,41,67,2,1,1,4,0,2,3),
(9,10,51,74,2,1,1,3,0,2,3),
(10,10,61,78,2,1,1,3,0,2,1),
(11,3,21,57,2,1,1,6,0,1,3),
(12,3,31,76,2,1,1,3,0,1,3),
(13,3,41,67,2,1,1,4,0,1,3),
(14,3,51,77,2,1,1,3,0,1,1),
(15,3,61,78,2,1,1,3,0,1,4),
(16,9,21,88,2,1,1,1,0,1,3),
(17,9,31,67,2,1,1,4,0,1,3),
(18,9,41,78,2,1,1,3,0,1,3),
(19,9,51,94,2,1,1,1,0,1,1),
(20,9,61,57,2,1,1,6,0,1,4),
(21,6,21,58,2,1,1,6,0,9,6),
(22,6,31,88,2,1,1,1,0,9,1),
(23,6,41,78,2,1,1,3,0,9,3),
(24,6,51,59,2,1,1,6,0,9,6),
(25,6,61,77,2,1,1,3,0,9,3),
(26,7,21,68,2,1,1,4,0,10,4),
(27,7,31,77,2,1,1,3,0,10,3),
(28,7,41,78,2,1,1,3,0,10,3),
(29,7,51,73,2,1,1,3,0,10,3),
(30,7,61,66,2,1,1,4,0,10,4),
(31,4,21,83,2,1,1,1,0,6,1),
(32,4,31,35,2,1,1,9,0,6,9),
(33,4,41,67,2,1,1,4,0,6,4),
(34,4,51,55,2,1,1,6,0,6,6),
(35,4,61,67,2,1,1,4,0,6,4),
(36,8,21,78,2,1,1,3,0,11,3),
(37,8,31,67,2,1,1,4,0,11,4),
(38,8,41,77,2,1,1,3,0,11,3),
(39,8,51,78,2,1,1,3,0,11,3),
(40,8,61,56,2,1,1,6,0,11,6),
(41,12,21,67,2,1,1,4,0,8,4),
(42,12,31,77,2,1,1,3,0,8,3),
(43,12,41,89,2,1,1,1,0,8,1),
(44,12,51,67,2,1,1,4,0,8,4),
(45,12,61,77,2,1,1,3,0,8,3),
(46,5,21,68,2,1,1,4,NULL,5,NULL),
(47,5,31,89,2,1,1,1,NULL,5,NULL),
(48,5,41,85,2,1,1,1,NULL,5,NULL),
(49,5,51,87,2,1,1,1,NULL,5,NULL),
(50,5,61,56,2,1,1,6,NULL,5,NULL),
(51,11,21,67,2,1,1,4,0,5,3),
(52,11,31,68,2,1,1,4,0,5,1),
(53,11,41,88,2,1,1,1,0,5,1),
(54,11,51,78,2,1,1,3,0,5,1),
(55,11,61,89,2,1,1,1,0,5,3),
(56,2,4161,67,2,1,1,4,0,2,NULL),
(57,2,4171,67,2,1,1,4,0,2,NULL),
(58,2,4181,60,2,1,1,5,0,2,NULL),
(59,2,4191,50,2,1,1,6,0,2,NULL),
(60,2,4201,58,2,1,1,6,0,2,NULL),
(61,2,4211,67,2,1,1,4,0,2,NULL),
(62,2,2701,55,2,1,1,6,NULL,2,NULL),
(63,2,6666,70,2,1,1,3,0,2,NULL),
(64,2,6667,50,2,1,1,6,0,2,NULL),
(65,2,6668,50,2,1,1,6,0,2,NULL),
(66,2,6669,40,2,1,1,8,0,2,NULL),
(67,2,71,76,2,1,1,3,0,2,NULL),
(68,2,81,78,2,1,1,3,0,2,NULL),
(69,2,91,77,2,1,1,3,0,2,NULL),
(70,2,101,80,2,1,1,1,0,2,NULL),
(71,5,2,55,2,1,1,6,NULL,5,NULL),
(72,5,6669,56,2,1,1,6,NULL,5,NULL),
(73,5,6668,88,2,1,1,1,NULL,5,NULL),
(74,5,6667,88,2,1,1,1,NULL,5,NULL),
(75,5,6666,76,2,1,1,3,NULL,5,NULL),
(76,5,4221,67,2,1,1,4,NULL,5,NULL),
(77,5,4211,54,2,1,1,6,NULL,5,NULL),
(78,5,4201,66,2,1,1,4,NULL,5,NULL),
(79,5,4191,45,2,1,1,7,NULL,5,NULL),
(80,5,4181,87,2,1,1,1,NULL,5,NULL),
(81,5,4171,56,2,1,1,6,NULL,5,NULL),
(82,5,4161,78,2,1,1,3,NULL,5,NULL),
(83,5,4151,67,2,1,1,4,NULL,5,NULL),
(84,5,4141,97,2,1,1,1,NULL,5,NULL),
(85,5,4131,65,2,1,1,4,NULL,5,NULL),
(86,5,4121,55,2,1,1,6,NULL,5,NULL),
(87,5,4111,66,2,1,1,4,NULL,5,NULL),
(88,5,4101,55,2,1,1,6,NULL,5,NULL),
(89,5,4091,55,2,1,1,6,NULL,5,NULL),
(90,5,4081,56,2,1,1,6,NULL,5,NULL),
(91,5,4071,56,2,1,1,6,NULL,5,NULL),
(92,5,4061,88,2,1,1,1,NULL,5,NULL),
(93,5,4051,76,2,1,1,3,NULL,5,NULL),
(94,5,4041,65,2,1,1,4,NULL,5,NULL),
(95,5,4031,56,2,1,1,6,NULL,5,NULL),
(96,5,4021,76,2,1,1,3,NULL,5,NULL),
(97,5,4011,76,2,1,1,3,NULL,5,NULL),
(98,5,4001,77,2,1,1,3,NULL,5,NULL),
(99,5,3991,68,2,1,1,4,NULL,5,NULL),
(100,5,3971,54,2,1,1,6,NULL,5,NULL),
(101,5,3961,65,2,1,1,4,NULL,5,NULL),
(102,5,3951,55,2,1,1,6,NULL,5,NULL),
(103,5,3941,65,2,1,1,4,NULL,5,NULL),
(104,5,3931,76,2,1,1,3,NULL,5,NULL),
(105,5,3921,97,2,1,1,1,NULL,5,NULL),
(106,5,3911,88,2,1,1,1,NULL,5,NULL),
(107,5,3901,77,2,1,1,3,NULL,5,NULL),
(108,5,3891,67,2,1,1,4,NULL,5,NULL),
(109,5,3881,77,2,1,1,3,NULL,5,NULL),
(110,2,6666,56,2,1,1,6,NULL,2,NULL),
(111,2,6666,78,2,1,1,3,NULL,2,NULL),
(112,2,6667,77,2,1,1,3,NULL,2,NULL),
(113,2,6667,56,2,1,1,6,NULL,2,NULL),
(114,2,51,78,2,1,1,3,NULL,2,NULL),
(115,2,51,69,2,1,1,4,NULL,2,NULL),
(116,2,2701,78,2,1,1,3,NULL,2,NULL),
(117,2,4221,56,2,1,1,6,NULL,2,NULL);

/*Table structure for table `examination_papers` */

DROP TABLE IF EXISTS `examination_papers`;

CREATE TABLE `examination_papers` (
  `examination_paper_id` int NOT NULL AUTO_INCREMENT,
  `examination_paper` varchar(100) DEFAULT NULL,
  `subject_id` int DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  `total_marks` int DEFAULT NULL,
  PRIMARY KEY (`examination_paper_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `examination_papers` */

insert  into `examination_papers`(`examination_paper_id`,`examination_paper`,`subject_id`,`deleted`,`total_marks`) values 
(2,'English Paper I',2,0,70),
(3,'Mathematics Paper I',1,0,100),
(4,'Geography',6,0,100),
(5,'Chichewa Paper I',5,0,90),
(6,'Chemistry',9,0,100),
(7,'Physics',10,0,100),
(8,'Computer Studies',11,0,100),
(9,'Mathematics Paper II',1,0,100),
(10,'English Paper II',2,0,100),
(11,'Chichewa Paper II',5,0,100),
(12,'Life Skills',8,0,100);

/*Table structure for table `examinations` */

DROP TABLE IF EXISTS `examinations`;

CREATE TABLE `examinations` (
  `examination_id` int NOT NULL AUTO_INCREMENT,
  `examination` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `academic_year_id` int DEFAULT NULL,
  `starts` varchar(100) DEFAULT NULL,
  `ends` varchar(100) DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  `active` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`examination_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `examinations` */

insert  into `examinations`(`examination_id`,`examination`,`academic_year_id`,`starts`,`ends`,`deleted`,`active`) values 
(2,'Term II Examinations',3,'2020-12-20','2020-12-26',0,0);

/*Table structure for table `expense_types` */

DROP TABLE IF EXISTS `expense_types`;

CREATE TABLE `expense_types` (
  `expense_type_id` int NOT NULL AUTO_INCREMENT,
  `expense_type` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`expense_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

/*Data for the table `expense_types` */

insert  into `expense_types`(`expense_type_id`,`expense_type`,`deleted`) values 
(4,'UPDATE `accounts` SET `name` = \'Fanny Kasonda\', `birthday` = \'1991-03-01\', `phone` = \'0884426640\', `email` = \'frank@m-technologiesmw.com\', `sex` = \'f\', `position` = \'Bursar\', `is_super_accountant` = 0, `qualifications` = \' \', `postal_address` = \'Matindi\', `physical_address` = \'\' WHERE `accounts_id` =  \'12\'',2147483647),
(5,'UPDATE `accounts` SET `name` = \'Fanny Kasonda\', `birthday` = \'1991-03-01\', `phone` = \'0884426640\', `email` = \'fannykasonda@yahoo.com\', `sex` = \'f\', `position` = \'Bursar\', `is_super_accountant` = 0, `qualifications` = \' \', `postal_address` = \'\', `physical_address` = \'\' WHERE `accounts_id` =  \'12\'',2147483647),
(6,'UPDATE `admin` SET `name` = \'Clara Mpombera\', `birthday` = \'1990-03-27\', `phone` = \'0888195892\', `email` = \'frank@m-technologiesmw.com\', `sex` = \'f\', `position` = \'Assistant Administrator\', `qualifications` = \'\', `postal_address` = \' \', `physical_address` = \'\' WHERE `admin_id` =  \'12\'',2147483647),
(7,'UPDATE `admin` SET `name` = \'Clara Mpombera\', `birthday` = \'1990-03-27\', `phone` = \'0888195892\', `email` = \'ctisungempombera@gmail.com\', `sex` = \'f\', `position` = \'Assistant Administrator\', `qualifications` = \'\', `postal_address` = \' \', `physical_address` = \'\' WHERE `admin_id` =  \'12\'',2147483647),
(8,'SELECT *\nFROM (`term`)\nWHERE `termID` =  \'2\'',2147483647),
(9,'UPDATE `settings` SET `description` = 0 WHERE `type` =  \'text_align\'',2147483647),
(14,'UPDATE `academic_year` SET `acadName` = \'\', `acadDescription` = \'Academic year\' WHERE `acadID` =  \'2\'',2147483647),
(15,'UPDATE `academic_year` SET `acadName` = \'Sept 2015 - July 2016\', `acadDescription` = \'Academic year\' WHERE `acadID` =  \'2\'',2147483647),
(16,'UPDATE `term` SET `termName` = \'2nd Term\', `termDesc` = \'Second term\', `acadID` = \'2\', `ldm` = \'2016-01-20 07:25:30\', `last_modified_by` = \'1\' WHERE `termID` =  \'2\'',2147483647),
(17,'UPDATE `parent` SET `name` = \'Mr Kadzombe\', `email` = \'frank@m-technologiesmw.com\', `phone` = \'0994684710\', `postal_address` = \'															\', `physical_address` = \'															\', `profession` = \'\', `employer_name` = \'\', `employer_phone` = \'\', `employer_email` = \'\', `employer_postal_address` = \'															\', `employer_physical_address` = \'															\' WHERE `parent_id` =  \'1011\'',2147483647),
(23,'Goodies',0);

/*Table structure for table `expenses` */

DROP TABLE IF EXISTS `expenses`;

CREATE TABLE `expenses` (
  `expense_id` int unsigned NOT NULL AUTO_INCREMENT,
  `date_added` datetime DEFAULT NULL,
  `expense_date` varchar(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `added_by` int DEFAULT NULL,
  `comment` text,
  `deleted` int NOT NULL DEFAULT '0',
  `expense_type_id` int DEFAULT NULL,
  PRIMARY KEY (`expense_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `expenses` */

insert  into `expenses`(`expense_id`,`date_added`,`expense_date`,`amount`,`added_by`,`comment`,`deleted`,`expense_type_id`) values 
(1,'2021-01-15 05:16:39','2021-01-06',40000,1,'Nsomba',0,23);

/*Table structure for table `final_grades` */

DROP TABLE IF EXISTS `final_grades`;

CREATE TABLE `final_grades` (
  `user_id` int DEFAULT NULL,
  `mark_obtained` int NOT NULL,
  `examination_id` int DEFAULT NULL,
  `grade_level_id` int DEFAULT NULL,
  `points` int DEFAULT NULL,
  `subject_id` int DEFAULT NULL,
  `final_grade_id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`final_grade_id`)
) ENGINE=InnoDB AUTO_INCREMENT=432 DEFAULT CHARSET=utf8;

/*Data for the table `final_grades` */

insert  into `final_grades`(`user_id`,`mark_obtained`,`examination_id`,`grade_level_id`,`points`,`subject_id`,`final_grade_id`) values 
(41,89,2,1,1,8,2),
(31,88,2,1,1,9,3),
(21,83,2,1,1,6,6),
(41,78,2,1,3,9,8),
(21,78,2,1,3,11,9),
(61,67,2,1,4,1,10),
(51,78,2,1,3,11,11),
(41,78,2,1,3,10,12),
(51,85,2,1,1,1,14),
(61,77,2,1,3,8,15),
(61,77,2,1,3,9,16),
(31,77,2,1,3,10,17),
(31,77,2,1,3,8,18),
(41,77,2,1,3,11,19),
(31,71,2,1,3,1,21),
(51,73,2,1,3,10,23),
(21,68,2,1,4,10,26),
(31,67,2,1,4,11,27),
(51,67,2,1,4,8,28),
(21,67,2,1,4,8,29),
(41,72,2,1,3,1,33),
(41,67,2,1,4,6,35),
(61,67,2,1,4,6,36),
(61,66,2,1,4,10,38),
(51,59,2,1,6,9,41),
(21,57,2,1,6,9,43),
(21,72,2,1,3,1,45),
(61,56,2,1,6,11,47),
(51,55,2,1,6,6,49),
(31,35,2,1,9,6,55),
(3921,51,2,1,6,5,244),
(4141,51,2,1,6,5,245),
(4061,46,2,1,7,5,249),
(3911,46,2,1,7,5,252),
(101,0,2,1,9,5,257),
(81,0,2,1,9,5,264),
(3881,40,2,1,8,5,266),
(91,0,2,1,9,5,269),
(4001,40,2,1,8,5,270),
(3901,40,2,1,8,5,273),
(4051,40,2,1,8,5,275),
(4011,40,2,1,8,5,276),
(4021,40,2,1,8,5,277),
(71,0,2,1,9,5,279),
(3931,40,2,1,8,5,280),
(6666,40,2,1,8,5,283),
(3991,35,2,1,9,5,285),
(3891,35,2,1,9,5,293),
(4161,41,2,1,8,5,295),
(4151,35,2,1,9,5,298),
(4111,34,2,1,9,5,300),
(4041,34,2,1,9,5,304),
(3961,34,2,1,9,5,305),
(3941,34,2,1,9,5,306),
(4131,34,2,1,9,5,307),
(4181,45,2,1,7,5,309),
(4201,34,2,1,9,5,311),
(21,71,2,1,3,5,313),
(41,91,2,1,1,5,314),
(4081,29,2,1,9,5,315),
(4071,29,2,1,9,5,316),
(4031,29,2,1,9,5,318),
(4171,29,2,1,9,5,319),
(61,76,2,1,3,5,320),
(2,28,2,1,9,5,322),
(4121,28,2,1,9,5,323),
(4101,28,2,1,9,5,324),
(4091,28,2,1,9,5,325),
(4221,35,2,1,9,5,326),
(51,86,2,1,1,5,328),
(3951,28,2,1,9,5,329),
(3971,28,2,1,9,5,330),
(4211,28,2,1,9,5,331),
(6668,46,2,1,7,5,332),
(6667,46,2,1,7,5,334),
(4191,23,2,1,9,5,335),
(6669,29,2,1,9,5,336),
(31,82,2,1,1,5,337),
(3921,0,2,1,9,2,338),
(4141,0,2,1,9,2,339),
(4061,0,2,1,9,2,343),
(3911,0,2,1,9,2,346),
(101,47,2,1,7,2,351),
(81,45,2,1,7,2,358),
(3881,0,2,1,9,2,360),
(91,45,2,1,7,2,363),
(4001,0,2,1,9,2,364),
(3901,0,2,1,9,2,367),
(4051,0,2,1,9,2,369),
(4011,0,2,1,9,2,370),
(4021,0,2,1,9,2,371),
(71,44,2,1,8,2,373),
(3931,0,2,1,9,2,374),
(6666,41,2,1,8,2,377),
(3991,0,2,1,9,2,379),
(3891,0,2,1,9,2,387),
(4161,39,2,1,9,2,389),
(4151,0,2,1,9,2,392),
(4111,0,2,1,9,2,394),
(4041,0,2,1,9,2,398),
(3961,0,2,1,9,2,399),
(3941,0,2,1,9,2,400),
(4131,0,2,1,9,2,401),
(4181,35,2,1,9,2,403),
(4201,34,2,1,9,2,405),
(21,91,2,1,1,2,407),
(41,72,2,1,3,2,408),
(4081,0,2,1,9,2,409),
(4071,0,2,1,9,2,410),
(4031,0,2,1,9,2,412),
(4171,39,2,1,9,2,413),
(61,82,2,1,1,2,414),
(2,0,2,1,9,2,416),
(4121,0,2,1,9,2,417),
(4101,0,2,1,9,2,418),
(4091,0,2,1,9,2,419),
(4221,32,2,1,9,2,420),
(51,75,2,1,3,2,422),
(3951,0,2,1,9,2,423),
(3971,0,2,1,9,2,424),
(4211,39,2,1,9,2,425),
(6668,29,2,1,9,2,426),
(6667,29,2,1,9,2,428),
(4191,29,2,1,9,2,429),
(6669,23,2,1,9,2,430),
(31,77,2,1,3,2,431);

/*Table structure for table `final_grades2` */

DROP TABLE IF EXISTS `final_grades2`;

CREATE TABLE `final_grades2` (
  `user_id` int DEFAULT NULL,
  `mark_obtained` int NOT NULL,
  `examination_id` int DEFAULT NULL,
  `grade_level_id` int DEFAULT NULL,
  `points` int DEFAULT NULL,
  `subject_id` int DEFAULT NULL,
  `final_grade_id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`final_grade_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

/*Data for the table `final_grades2` */

insert  into `final_grades2`(`user_id`,`mark_obtained`,`examination_id`,`grade_level_id`,`points`,`subject_id`,`final_grade_id`) values 
(21,83,2,1,1,6,1),
(21,78,2,1,3,11,2),
(21,72,2,1,3,1,3),
(21,71,2,1,3,5,4),
(21,68,2,1,4,10,5),
(31,88,2,1,1,9,6),
(31,82,2,1,1,5,7),
(31,77,2,1,3,10,8),
(31,77,2,1,3,8,9),
(31,71,2,1,3,1,10),
(41,91,2,1,1,5,11),
(41,89,2,1,1,8,12),
(41,78,2,1,3,9,13),
(41,78,2,1,3,10,14),
(41,77,2,1,3,11,15),
(51,86,2,1,1,5,16),
(51,85,2,1,1,1,17),
(51,78,2,1,3,11,18),
(51,73,2,1,3,10,19),
(51,67,2,1,4,8,20),
(61,77,2,1,3,8,21),
(61,77,2,1,3,9,22),
(61,76,2,1,3,5,23),
(61,67,2,1,4,1,24),
(61,67,2,1,4,6,25),
(21,91,2,1,1,2,26),
(31,77,2,1,3,2,27),
(41,72,2,1,3,2,28),
(51,75,2,1,3,2,29),
(61,82,2,1,1,2,30),
(71,44,2,1,8,2,31),
(81,45,2,1,7,2,32),
(91,45,2,1,7,2,33),
(101,47,2,1,7,2,34),
(4161,39,2,1,9,2,35),
(4171,39,2,1,9,2,36),
(4181,35,2,1,9,2,37),
(4191,29,2,1,9,2,38),
(4201,34,2,1,9,2,39),
(4211,39,2,1,9,2,40),
(4221,32,2,1,9,2,41),
(6666,41,2,1,8,2,42),
(6667,29,2,1,9,2,43),
(6668,29,2,1,9,2,44),
(6669,23,2,1,9,2,45);

/*Table structure for table `grade_groups` */

DROP TABLE IF EXISTS `grade_groups`;

CREATE TABLE `grade_groups` (
  `grade_group_id` int NOT NULL AUTO_INCREMENT,
  `grade_group` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  `point_based` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`grade_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `grade_groups` */

insert  into `grade_groups`(`grade_group_id`,`grade_group`,`deleted`,`point_based`) values 
(1,'MSCE',0,1),
(2,'JSCE',0,0),
(3,'IGCE',0,0);

/*Table structure for table `grade_levels` */

DROP TABLE IF EXISTS `grade_levels`;

CREATE TABLE `grade_levels` (
  `grade_level_id` int NOT NULL AUTO_INCREMENT,
  `grade_level` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `numeric` int DEFAULT NULL COMMENT '1-Grade, 2-Point',
  `deleted` int NOT NULL DEFAULT '0',
  `grade_group_id` int DEFAULT NULL,
  PRIMARY KEY (`grade_level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `grade_levels` */

insert  into `grade_levels`(`grade_level_id`,`grade_level`,`numeric`,`deleted`,`grade_group_id`) values 
(1,'Form I',3,0,2),
(2,'Form II',4,0,2),
(3,'Form III',1,0,1),
(4,'Form IV',2,0,1),
(5,'Form V',5,0,3),
(6,'Form VI',6,0,3);

/*Table structure for table `grade_points` */

DROP TABLE IF EXISTS `grade_points`;

CREATE TABLE `grade_points` (
  `grade_point_id` int NOT NULL AUTO_INCREMENT,
  `grade_group_id` int DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `grade_point` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `mark_from` int DEFAULT NULL,
  `mark_upto` int DEFAULT NULL,
  `comment` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  `academic_year_id` int DEFAULT NULL,
  PRIMARY KEY (`grade_point_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Data for the table `grade_points` */

insert  into `grade_points`(`grade_point_id`,`grade_group_id`,`name`,`grade_point`,`mark_from`,`mark_upto`,`comment`,`deleted`,`academic_year_id`) values 
(4,1,'F','3',70,79,'STRONG CREDIT',0,NULL),
(5,1,'A','1',85,100,'DISTINCTION',0,3),
(6,1,'A','1',80,84,'DISTINCTION',0,NULL),
(7,1,'B','4',65,69,'STRONG CREDIT',0,NULL),
(8,1,'C','5',60,64,'CREDIT',0,NULL),
(9,1,'F','6',50,59,'CREDIT',0,NULL),
(10,1,'D','7',45,49,'PASS',0,NULL),
(11,1,'D','8',40,44,'PASS',0,NULL),
(12,1,'F','9',0,39,'FAIL',0,NULL),
(13,2,'EXCELLENT','A',80,100,'EXCELLENT',0,NULL),
(14,2,'VERY GOOD','B',66,79,'VERY GOOD',0,NULL),
(15,2,'GOOD','C',50,65,'GOOD',0,NULL),
(16,2,'AVERAGE','D',40,49,'AVERAGE',0,NULL),
(17,2,'FAIL','F',0,39,'FAIL',0,NULL);

/*Table structure for table `grade_remarks` */

DROP TABLE IF EXISTS `grade_remarks`;

CREATE TABLE `grade_remarks` (
  `grade_remark_id` int NOT NULL AUTO_INCREMENT,
  `grade_group_id` int DEFAULT NULL,
  `grade_remark` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `mark_from` int DEFAULT NULL,
  `mark_upto` int DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  `grade_comment` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `headmaster` text,
  `classteacher` text,
  PRIMARY KEY (`grade_remark_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `grade_remarks` */

insert  into `grade_remarks`(`grade_remark_id`,`grade_group_id`,`grade_remark`,`mark_from`,`mark_upto`,`deleted`,`grade_comment`,`headmaster`,`classteacher`) values 
(5,1,'VERY GOOD,KEEP IT UP, DON\'T RELAX THOUGH',6,20,0,'PASSED',NULL,NULL),
(6,1,'BETTER BUT NEED IMPROVEMENT',21,24,0,'PASSED',NULL,NULL),
(7,1,'NEED TO IMPROVE',25,36,0,'PASSED',NULL,NULL),
(8,1,'FAILED AND NEED TO WORK EXTRA HARD',37,100,0,'FAILED',NULL,NULL);

/*Table structure for table `hostel_prefects` */

DROP TABLE IF EXISTS `hostel_prefects`;

CREATE TABLE `hostel_prefects` (
  `hostel_prefect_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `academic_year_id` int NOT NULL,
  `date_assigned` datetime NOT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  `hostel_id` int DEFAULT NULL,
  PRIMARY KEY (`hostel_prefect_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `hostel_prefects` */

insert  into `hostel_prefects`(`hostel_prefect_id`,`user_id`,`academic_year_id`,`date_assigned`,`deleted`,`hostel_id`) values 
(12,0,19910301,'0000-00-00 00:00:00',1,NULL),
(13,31,3,'2021-09-29 00:00:00',0,2),
(14,51,3,'2021-09-29 00:00:00',0,1),
(15,81,3,'2021-09-29 00:00:00',0,3);

/*Table structure for table `hostel_types` */

DROP TABLE IF EXISTS `hostel_types`;

CREATE TABLE `hostel_types` (
  `hostel_type_id` int NOT NULL AUTO_INCREMENT,
  `hostel_type` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`hostel_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `hostel_types` */

insert  into `hostel_types`(`hostel_type_id`,`hostel_type`,`deleted`) values 
(1,'Uniform',1),
(11,'Female',0),
(12,'Male',0);

/*Table structure for table `hostels` */

DROP TABLE IF EXISTS `hostels`;

CREATE TABLE `hostels` (
  `hostel_id` int NOT NULL AUTO_INCREMENT,
  `hostel_type_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  `name` varchar(100) DEFAULT NULL,
  `capacity` int DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`hostel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `hostels` */

insert  into `hostels`(`hostel_id`,`hostel_type_id`,`deleted`,`name`,`capacity`,`location`) values 
(1,'12',0,'KOYI',0,''),
(2,'11',0,'MUMBA',0,''),
(3,'12',0,'CHILEMBWE',0,'');

/*Table structure for table `income_types` */

DROP TABLE IF EXISTS `income_types`;

CREATE TABLE `income_types` (
  `income_type_id` int NOT NULL AUTO_INCREMENT,
  `income_type` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`income_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `income_types` */

insert  into `income_types`(`income_type_id`,`income_type`,`deleted`) values 
(1,'fees',0),
(2,'grounds',0);

/*Table structure for table `incomes` */

DROP TABLE IF EXISTS `incomes`;

CREATE TABLE `incomes` (
  `income_id` int NOT NULL AUTO_INCREMENT,
  `income_date` datetime DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `comment` text,
  `added_by` int DEFAULT NULL,
  `date_added` date DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  `income_type_id` int DEFAULT NULL,
  PRIMARY KEY (`income_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `incomes` */

insert  into `incomes`(`income_id`,`income_date`,`amount`,`comment`,`added_by`,`date_added`,`deleted`,`income_type_id`) values 
(1,'2021-01-15 00:00:00',40000,'dddd',1,'2021-01-15',0,2);

/*Table structure for table `lab_item_receivings` */

DROP TABLE IF EXISTS `lab_item_receivings`;

CREATE TABLE `lab_item_receivings` (
  `lab_item_receiving_id` int NOT NULL AUTO_INCREMENT,
  `lab_item_id` int DEFAULT NULL,
  `comment` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `added_by` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `arrival_date` datetime DEFAULT NULL,
  `price` double DEFAULT NULL,
  `total_cost` double DEFAULT NULL,
  PRIMARY KEY (`lab_item_receiving_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `lab_item_receivings` */

insert  into `lab_item_receivings`(`lab_item_receiving_id`,`lab_item_id`,`comment`,`date`,`added_by`,`quantity`,`arrival_date`,`price`,`total_cost`) values 
(5,2,'school bought','2021-09-01 00:00:00',11,20,'2021-09-01 00:00:00',4500,90000),
(6,3,'MINISTRY OF EDUCTAION','2021-09-20 00:00:00',1,20,'2021-09-12 00:00:00',4500,90000),
(7,1,'nan','2021-10-15 06:39:00',1,50,'2021-10-15 00:00:00',6000,300000),
(8,1,'ggggggggggg','2021-10-15 06:42:00',1,34,'2021-10-15 00:00:00',6000,204000);

/*Table structure for table `lab_items` */

DROP TABLE IF EXISTS `lab_items`;

CREATE TABLE `lab_items` (
  `lab_item_id` int NOT NULL AUTO_INCREMENT,
  `lab_item` varchar(100) DEFAULT NULL,
  `lab_type_id` int DEFAULT NULL,
  `lab_shelf_id` int DEFAULT NULL,
  `description` text,
  `qty` int DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  `expiry_date` datetime DEFAULT NULL,
  `item_code` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`lab_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `lab_items` */

insert  into `lab_items`(`lab_item_id`,`lab_item`,`lab_type_id`,`lab_shelf_id`,`description`,`qty`,`deleted`,`expiry_date`,`item_code`) values 
(1,'item 1',1,2,'	ok bla\r\nbla																														',34,0,'2021-10-15 00:00:00','code1');

/*Table structure for table `lab_shelfs` */

DROP TABLE IF EXISTS `lab_shelfs`;

CREATE TABLE `lab_shelfs` (
  `lab_shelf_id` int NOT NULL AUTO_INCREMENT,
  `lab_shelf` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`lab_shelf_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `lab_shelfs` */

insert  into `lab_shelfs`(`lab_shelf_id`,`lab_shelf`,`code`,`deleted`) values 
(1,'ENGLISH','EA',0),
(2,'mathematics section','mat10',0);

/*Table structure for table `lab_types` */

DROP TABLE IF EXISTS `lab_types`;

CREATE TABLE `lab_types` (
  `lab_type_id` int NOT NULL AUTO_INCREMENT,
  `lab_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`lab_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `lab_types` */

insert  into `lab_types`(`lab_type_id`,`lab_type`,`deleted`) values 
(1,'PERISHABLES',0);

/*Table structure for table `message` */

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `message_id` int NOT NULL AUTO_INCREMENT,
  `message_thread_code` longtext NOT NULL,
  `message` longtext NOT NULL,
  `sender` longtext NOT NULL,
  `timestamp` longtext NOT NULL,
  `read_status` int NOT NULL DEFAULT '0' COMMENT '0 unread 1 read',
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `message` */

/*Table structure for table `message_thread` */

DROP TABLE IF EXISTS `message_thread`;

CREATE TABLE `message_thread` (
  `message_thread_id` int NOT NULL AUTO_INCREMENT,
  `message_thread_code` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sender` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `reciever` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_message_timestamp` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`message_thread_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `message_thread` */

/*Table structure for table `parent` */

DROP TABLE IF EXISTS `parent`;

CREATE TABLE `parent` (
  `parent_id` int NOT NULL,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password2` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `profession` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `postal_address` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `physical_address` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `employer_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `employer_phone` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `employer_email` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `employer_postal_address` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `employer_physical_address` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `added_by` int NOT NULL,
  `date_added` date DEFAULT NULL,
  `ldm` date DEFAULT NULL,
  `last_modified_by` int NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `chat_status` tinyint(1) NOT NULL DEFAULT '0',
  `mail_sent` tinyint(1) NOT NULL DEFAULT '0',
  `logged` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`parent_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `parent` */

insert  into `parent`(`parent_id`,`name`,`password`,`password2`,`phone`,`email`,`profession`,`postal_address`,`physical_address`,`employer_name`,`employer_phone`,`employer_email`,`employer_postal_address`,`employer_physical_address`,`active`,`added_by`,`date_added`,`ldm`,`last_modified_by`,`status`,`chat_status`,`mail_sent`,`logged`) values 
(1,'Jummah Nicks','','F9FDD1E7A98BAFBEED853AEAE4568B08','0999311340','leezbabi@gmail.com','','','','','','','','',1,0,NULL,NULL,0,1,0,1,1),
(11,'Mr Peter Kagona','KJgqut60r0yvlt2rWkF9djowBube0U0q9Tu8lCTTF9H5XQvYU10Ftki8wHkP564Lvhxj1pnk3aJbv6Wg3b8zNA==','DCD1111BD98642EF9A0A96BBFACD4ACF','0999260464','petrokagona@gmail.com','','','','','','','','',1,0,NULL,NULL,0,1,0,1,0),
(21,'Mr Lapken Sitima','','0665080659F9A6CF340756B5D8EA0FA3','0999460708','lapkensitima@yahoo.com','','','','','','','','',1,0,NULL,NULL,0,1,0,1,0),
(31,'Kondwani Chirwa','','E6F80EA7F61C61F616C1EEDB1670A2BC','0881831716','chirwahko@gmail.com','','','','','','','','',1,0,NULL,NULL,0,1,0,1,0),
(41,'Mr Stanley Chilumbu','','F5BE18A9B52782C6AFC0243846F1FC59','0888188600','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(51,'MR L. MPINGANJIRA','','2EFCAEADC86EAD6C93EE8B842CC45E0F','0888368122','lloydmpinganjira31@gmail.com','','','','','','','','',1,0,NULL,NULL,12,1,0,1,0),
(61,'Mr Nkhoma','','C42328CFB448D46F1535EE8AB6FA0939','0999249513','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(71,'Mr Wilson Piston','','BAC648DB7600D821C35A9E2A743935E6','0996109025','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(81,'Mr Mdwazika','','A009D53AE058A487210065848FD0BAD6','0888843260','fmdwazika@rbm.mw','','','','','','','','',1,0,NULL,NULL,0,1,0,1,0),
(91,'Lameck Adam','','012052908D8DE2C8E3737B9A803D936C','0888301183','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(101,'ALEXANDER MKANDAWIRE','','6C2129654F7AF2B23F93CC7481C7864C','0993995426','jessiengwira@yahoo.com','','','','','','','','',1,0,NULL,NULL,1,1,0,1,0),
(111,'Mrs Chifomboti','','1288A04719F70E7D1DFF271EA4E32137','0888696977','mchifomboti@natbankmw.com','','','','','','','','',1,0,NULL,NULL,0,1,0,1,0),
(121,'Mr. F Mndeleman','','6C1F4295C04087BAF54D1EB5F0B53A36','0884113508','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(131,'MRS B. KAZUNGUZA','','A1AF4592E47E0447FFF8D4D16835A590','088862997','fkazunguza@gmail.com','','','','','','','','',1,0,NULL,NULL,12,1,0,1,0),
(141,'Mr J. Chigaru','','54E9A4213BDC47FEBD335B38E483B90E','0999394055','chigarujames@gmail.com','','','','','','','','',1,0,NULL,NULL,0,1,0,1,0),
(151,'Mr M.  Mutero','','3B4363A8A42B0712884BA062609EDF56','0888867541',' ','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(161,'Mr Lipenga','','77F29D88463A912A0442993C86FCB63C','0995245007','plipenga@sdi.ac.mw','','','','','','','','',1,0,NULL,NULL,0,1,0,1,0),
(171,'Mr George','','B3A219807BA9D38D017DAE9C9321C247','0993384510','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(181,'Mrs Nalikungwi','','8BD65E7D70F16FBA97DBDDAA77184499','0995451300','rnalikugwi@ymail.com','','','','','','','','',1,0,NULL,NULL,0,1,0,1,0),
(191,'Mrs M.  Parker','','8810F1001ABA6A82C8987C8031CA9841','0993960636','malaikahparkergmail.com','','','','','','','','',1,0,NULL,NULL,0,1,0,1,0),
(201,'Mr. Kumpukwe','','127A2080E274C6D85C0CCC15FADAD73C','0888529221','patrickkumpukwe@gmail.com','','','','','','','','',1,0,NULL,NULL,0,1,0,1,0),
(211,'Mrs Makauluni','','9AE725CAB1F3CE36E8459BDFF67CA78A','0999222791','chikondimakuluni@gmai.com','','','','','','','','',1,0,NULL,NULL,0,1,0,1,0),
(221,'Mrs G. Chirwa','','094CBEAFDCB948CA55F2CF5F91BA9E22','0888862628','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(231,'Mr. Kaunda','','CE5328AEC0DE16D7F8656B891A76D549','0999919615','ckaunda@escom.mw','','','','','','','','',1,0,NULL,NULL,0,1,0,1,0),
(241,'Mr Mtonga','','A866CD1ABA39A7397C8A118AC31A745C','0888897262','youngsmtonga@gmail.com','','','','','','','','',1,0,NULL,NULL,0,1,0,1,0),
(251,'I.M Kamanga','','FCBCAD6C0120406A787EA14E4B687528','0995442345','marykamanga32@yahoo.com','','','','','','','','',1,0,NULL,NULL,0,1,0,1,0),
(261,'MR. LACKSON','KJmr2uudemmcv0GmW9qC72zUOrpXW7byXvoSwfobarGrZeguzigxB/9r0MRLSFOAU88yA/F0IiPWM+rrSwK14Q==','D696A8726DAF24896B2AA7CF487B95DD','0881406304','marklackson@gmail.com','','','','','','','','',1,0,NULL,NULL,12,1,0,1,0),
(271,'Mr. Khambadza','','2BE69B93F7620697C36BBF09C7D2DE75','0888851156','mkhambadzaa@illovo.co.za','','','','','','','','',1,0,NULL,NULL,0,1,0,1,0),
(281,'Mr. Mukiwa','','9B1FE9B2194592DEFBCC41B30A129260','0884070556','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(291,'Mr. Chikanda','','A6AA55A760A456E53AC262F9DDF7ECA8','0888440576','mecksonchikanda@gmail.com','','','','','','','','',1,0,NULL,NULL,0,1,0,1,0),
(301,'Mrs Wisiki','','6B70B85E354D096E5484C463387782D1','0999136165','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(311,'Mr. Masamba','','3E42437AA3F5BC00BC54CD2F0EF1EC19','0888505500','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(321,'Mr. Gondwa','','20EFFCF276459045BD608B23B00E149A','0888838947','festertaulo@gmail.com','','','','','','','','',1,0,NULL,NULL,0,1,0,1,0),
(331,'Mr. Kaulele','','BC41A0B4281080005422634318720B77','0888777730','bkaulele@gmail.com','','','','','','','','',1,0,NULL,NULL,0,1,0,1,0),
(341,'Mr. Banda','','887303D3D6D99A1BF66AA5D02174DB5F','0888568058','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(351,'Mr G.  Kachilika','','D1712928A09E0C96018B804D77C2AD5C','0888317790','Goeffrey_Kachilika@aon-mw.com','','','','','','','','',1,0,NULL,NULL,0,1,0,1,0),
(361,'Mr Ntambala','','EA3619CFC3229E88526F6B105EE3B1C3','0888699442','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(371,'Mr. Kaunda','','59087042D9BDEA1CF1D1D77AE6583E0C','0888843648','bbazalesfsbtmw.com','','','','','','','','',1,0,NULL,NULL,0,1,0,1,0),
(381,'Mr Muheka','','F0434C069F41342937F440394548B365','0888752116','brighterapvtschools@gmail.com','','','','','','','','',1,0,NULL,NULL,0,1,0,1,0),
(391,'Mr. Nantchengwa','','C7EAE4D9C75ED17ADF8091757F60636B','099738555','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(401,'MRS CHIKWEZGA','','BEA416A5259915474873EF3228230EFA','0881027576','','','','','','','','','',1,0,NULL,NULL,1,1,0,0,0),
(411,'Mr. Phikira','','A24B942F48015DF0B9B3524DE2AE99FC','0999356930','m.phikira@gmail.com','','','','','','','','',1,0,NULL,NULL,0,1,0,1,0),
(421,'Mr. Chisesa','','CDDD3E5623C016B2447D9266AA628219','','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(431,'Mrs Witikhe','','F5971F9AA0528C21C9ACF7ECD43D6414','0888353620','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(441,'Mr. Juma','','133D31F5BB8826D932FBD29854C5D9C8','0996051980','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(451,'Mr. Adam','sUm1ttArS89Hmg+X+gRUn42kVOHFMct6sYUVvjelKl4LOF81xabMO6DBrCQvVUbNkXOGxtFpecDiBDauBENeYQ==','8A59A538EF08D2ADA86F827CB7EF6F0F','0991002078','lameck_adam@mal.salvationarmy.org','','','','','','','','',1,0,NULL,NULL,0,1,0,1,0),
(461,'Mr. E Kamwendo','','FB357DDA566CA2C3B5BC558BB8730EB2','0999286743','kamwendoedson@yahoo.com','','','','','','','','',1,0,NULL,NULL,0,1,0,1,0),
(471,'MR. P MAGOMBO','','AB810204397798E359A961E86D7E3FC3','0888548685','','','','','','','','','',1,0,NULL,NULL,12,1,0,0,0),
(481,'Mr K. Mnthuzi','','90C36C981242049BEB258F7426215349','0888828973','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(491,'MR. KAMOYO','','9D49DF18B1A438F0CC2861A92089E660','0888510054','','','','','','','','','',1,0,NULL,NULL,12,1,0,0,0),
(501,'Mr. S. Mwale','','275FA78AC4AFB923418BB8B58711E694','0999325812','shepherd_mwale@yahoo.com','','','','','','','','',1,0,NULL,NULL,0,1,0,1,0),
(511,'Mr. Katuluza','','0A89E5E62B3616838610316855F50F69','0999442824','francis.katuluza@tavelport.mw','','','','','','','','',1,0,NULL,NULL,0,1,0,1,0),
(521,'MR. CHIMESYA','','C2FEAA30AEFA8C8C8147DBDA207668C4','0888504757','stanleychimesya@gmai.com','','','','','','','','',1,0,NULL,NULL,12,1,0,1,0),
(541,'ORLA CROWE','','91C4FEA172B9E9F95F54940A0DEBDE4E','0997614022','pkalulu@mra.mw','','','','','','','','',1,0,NULL,NULL,12,1,0,1,0),
(551,'MR. MANDA','','DEF3B31958674CE2812AEABB41A5C4DE','','dyson.samuel@mw.ey.com','','','','','','','','',1,0,NULL,NULL,12,1,0,1,0),
(561,'Dr Kanyenda','','DCE99073DEC794F6BB1EC1288066E57E','0991001939','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(571,'Mrs. Kambanje','','326DF8E986ED1A8B866F577895932146','0994651300','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(581,'Mrs Bazale','','4C4FDCB2E716A405BD9D666F13579F18','0888128341','ebhua@yahoo.com','','','','','','','','',1,0,NULL,NULL,0,1,0,1,0),
(591,'MR. CHIMTENGO','','1F61DEE78EB53EC23694180B838CDD33','0882254186','','','','','','','','','',1,0,NULL,NULL,1,1,0,0,0),
(601,'Mr. H.W Gondwe','','4E33FC7935839BA5B42250138C78C84A','0888877403','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(611,'Mrs Nthani','','133D31F5BB8826D932FBD29854C5D9C8','0884455331','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(621,'Mrs Kamanga','','3B1D5591841C7D6693D4F9032DE92383','0882211371','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(631,'Mr Makwinja','','31216AEC797ED02CAA91A02157AB9E8A','0888693262','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(641,'Mr Kainja','','509A3264F4DEF238CBAE1F4813AA418D','0888514803','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(651,'Mr. Kainja','','E192C07F3AF9500451A420B91E8A098D','0888514803','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(1051,'Mrs Saukira','','F64CBCF90FB400B37B56757CFD2FFAEC','0999404555','meffasaukila@gmail.com','','','','','','','','',1,12,'2015-09-09',NULL,0,1,0,1,0),
(671,'Mr Goodwell','','45515036622385AF31F0DF97591BF7F3','00258862152985','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(681,'Mr. Msimuko','','F0F71415A4A3419894B0AA3890BFC00C','0888308306','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(691,'Miss Lemani','','AC3B5DB15CE3737CC076DB47514AB27D','099950839','machebesa@yahoo.co.uk','','','','','','','','',1,0,NULL,NULL,0,1,0,1,0),
(701,'Mr Mwalabu','','2620CDA7035CE68C47AD547102074904','0888302530','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(711,'Tidzi Chalamba','','F9985FA811BCE1E3045B5C863DF0A5B3','099989123','Hlupi.Chalanba.airtel.com','','','','','','','','',1,0,NULL,NULL,0,1,0,1,0),
(721,'Mr Salema','','176782F382363BB2C6DC037770D4C9E1','08847899489','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(731,'Mr Chiwaya','','AF3B476F6D083F4F61A6FF028FCD8B28','0888702660','virginiachiwaya@gmail.com','','','','','','','','',1,0,NULL,NULL,0,1,0,1,0),
(741,'MRS ZULUMBA','','354E6EB947E55154E15566B0CD96911E','0888506679','','','','','','','','','',1,0,NULL,NULL,12,1,0,0,0),
(751,'Mr Phiri','','AA9C5AE33A4460A29E78CA4C478A6AF9','0884615257','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(761,'MR MIDIAN','','074D483AF97C76A9B0E67A345DBB3FF4','0999586706','ezeckiel82@gmaial.com','','','','','','','','',1,0,NULL,NULL,12,1,0,1,0),
(771,'Mr Kamasa','','45AB137EC13D3AE0673E73421A320139','0888388000','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(781,'M Macheso','','61090C5D34E15E618C3AD4068E1B45C6','0888868122','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(791,'Mr. F. Namisawo','','B7BA0CFD6B314C037E9D467A31DA0CD7','0888246099','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(801,'Mr Kaunda','','D2AA2FBF5BB61F69B56EFB61C536AF5C','0888843648','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(811,'N.I Ngapemba','','5B8441D2D0E15D7D43710CE7DFA8D5B1','0888878276','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(821,'Mr Mponya','','A8626BC79F7E9338C84FD6177197B1F3','0999290205','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(831,'Mr. S Gomani','','B0547518AA717EB5DE1159BE594B89E9','0991461226','sgomani@poly.ac.mw','','','','','','','','',1,0,NULL,NULL,0,1,0,1,0),
(841,'Mr Banda','','949B9076019A94EF5A5C841CFB6A1063','0882245512','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(851,'Mr. Yahaya','','3216749629C83CBA6F9781DF65A55E54','0888569555','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(861,'Mr Samu','','186B16858C574EA2EF31A366B5A03574','0888626054','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(871,'Mr. Samu','','7356F3AF3C11501669B8B3B3D4734FDC','0888626054','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(881,'Mr Chingamuka','','7B764E39B4F31D5D279A493F1C4A570A','','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(891,'Mr. Manezo','','FA244948A8E90BCF3B8D04E550279BBE','0888836757','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(901,'Madziakapita','','73A19920F0DA41315EAFBA7E11C790C8','0888657146','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(911,'Patrick Chagwirira','aP0YKl0Nd7EsTdfP0LSfVh9GyaeFwoSLG9Gq08ff96BVzPlCw+fR83gCRgf1ZkjTKuWkIRWfRXUaHunMd7RPeA==','8CE20312E2A2DF265537ECBEE407358B','0999466858','patchagwirira@yahoo.com','','','','','','','','',1,0,NULL,NULL,0,1,0,1,0),
(921,'Mrs Kabudula','','A8CE2B910C4962F4A9A50A30675FD95F','0999110793','peterkakatela@yahoo.com','','','','','','','','',1,0,NULL,NULL,0,1,0,1,0),
(931,'Mrs Chimala','','398572DB9E5CEA19C8960A3979E0804A','','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(951,'Mr Nantharo','','997A52E43116DC3E6049F94E8A2C714D','0999232036','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(961,'Mrs Chibalaka Phiri','','D34D622237B46515AED7D5C2A6DF4736','0888368664','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(971,'Mrs Chibalaka','','9CFC9761804D774B5B531406D2E0E0F7','0888368664','h.phiri@yahoo.com','','','','','','','','',1,0,NULL,NULL,0,1,0,1,0),
(981,'Mrs Jumapili','','A9C44C043333BD8580D130CB78718306','0882652012','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(991,'Mr Kaselera','','E95CFFF234573AA09323D28765B56269','0881916361','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(1001,'Mr Kanjoma','','7B6183B4D7991681F5DD1C3F1DC99CBA','088562372','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(1011,'Mr Kadzombe','','271B260FE42FA158C8AB572E31D5292A','0994684710','','','															','															','','','','															','															',1,0,NULL,NULL,0,1,0,0,1),
(1021,'Mr Kadzombe','','DCC7BEDA0EAEA78D3D5BCA56492B3394','0994684710','','','','','','','','','',1,0,NULL,NULL,0,1,0,0,0),
(1031,'Mrs Bande','','1881DB5014BD8A4AEE2AFFD2F4296880','0999254555','bandegodwin@gmail.com','','','','','','','','',1,0,NULL,NULL,0,1,0,1,0),
(1041,'Mr Mlanga','','947389F314D94390014BF8499A7B1631','0999468012','rankenmlanga@gmail.com','','','','','','','','',1,0,NULL,NULL,0,1,0,1,0),
(1061,'Mr Kamwaza','','B95C3E62F8C1071EF4243BCB8B186F92','0888877190','','','','','','','','','',1,12,'2015-09-09',NULL,0,1,0,0,0),
(1071,'Mr Mandili','','3D9302160E343B09968EFD510E1A3EB9','0888614054','','','','','','','','','',1,12,'2015-09-09',NULL,0,1,0,0,0),
(1081,'Mr Makwakwa','','A6910B5892DD227658B762067ABB4A70','0999461545','','','','','','','','','',1,12,'2015-09-09',NULL,0,1,0,0,0),
(1091,'Mr Nyirenda','','F3978DA8769E49D012F1F0C47B1E472B','0888320195','kondowerichard@yahoo.com','','','','','','','','',1,12,'2015-09-09',NULL,0,1,0,1,0),
(1101,'Mr Saliwa','','A982B45C1F1B341A35D96207D624E117','0999411160','precioussaliwa@gmail.com','','','','','','','','',1,12,'2015-09-09',NULL,0,1,0,1,0),
(1111,'Mr Mondela','','CFFD33E592FF567FEB4D0BA1A5115564','','','','','','','','','','',1,12,'2015-09-09',NULL,0,1,0,0,0),
(1131,'Mr Manja','','429B17E0BE12C0873FE81DD3E29C114C','','','','','','','','','','',1,12,'2015-09-09',NULL,0,1,0,0,0),
(1141,'Mr Ngoloma','','010650DFBB0C0A5C3796A4E24B0D6157','','','','','','','','','','',1,12,'2015-09-09',NULL,0,1,0,0,0),
(1151,'Mr Shuva','','C3FCF4E2CC44F543EEC097C8C6C232EB','0885528249','','','','','','','','','',1,12,'2015-09-09',NULL,0,1,0,0,0),
(1161,'Mr E Phiri','','0D657AF18AE020A5A9C7F0AAEDEAA9ED','0998126040','','','','','','','','','',1,12,'2015-09-09',NULL,0,1,0,0,0),
(1171,'Mr Nyirenda','','4155C56252448523494085BBABA24F95','0888543096','norwick@prowako.com','','','','','','','','',1,12,'2015-09-09',NULL,0,1,0,1,0),
(1181,'Mr Chimtengo','','7DB047060476C3B08B516E948B27CFBE','0888106357','mukhunaeric@gmail.com','','','','','','','','',1,12,'2015-09-09',NULL,0,1,0,1,0),
(1191,'Mr S Chileka','','673759527BC93416A98F7C6FF02BD222','0881587842','','','','','','','','','',1,12,'2015-09-09',NULL,0,1,0,0,0),
(1201,'Mr. M. Mughogho','','E542E803F3234D2060EECFB5A55A4440','0995455469','mathews@global.net','','','','','','','','',1,12,'2015-09-09',NULL,0,1,0,1,0),
(1211,'Mr Chisamba','','B6F43A8522E14187AC547176D707D02A','','andchisamba@yahoo.com','','','','','','','','',1,12,'2015-09-09',NULL,0,1,0,1,0),
(1221,'Mr Maloto','','BAC3DF41A64D81E838A02E180C8FD59E','0888369033','','','','','','','','','',1,12,'2015-09-09',NULL,0,1,0,0,0),
(1231,'Mr Kachala','','1B5DC4E6E74FEE2AB2E0D570914747A9','0881118653','','','','','','','','','',1,12,'2015-09-09',NULL,0,1,0,0,0),
(1241,'Mrs G. Bwanali','','C99CA1D7C78D434A75A307D9B7E61686','0888600444','paddy.bwanali@gmail.com','','','','','','','','',1,12,'2015-09-10',NULL,0,1,0,1,0),
(1251,'Mr Makangala','','713517FDA5C1F521F58A97C877177EC7','0888288902','','','','','','','','','',1,12,'2015-09-10',NULL,0,1,0,0,0),
(1261,'J Koreia','','20C91E819B0F1C5D2B1C9813A23FD667','0888288902','','','','','','','','','',1,12,'2015-09-10',NULL,0,1,0,0,0),
(1271,'J Koreia','','007AD01AE1BA6B4A234A785EB5792AAA','0888288902','','','','','','','','','',1,12,'2015-09-10',NULL,0,1,0,0,0),
(1281,'J Koreia','','D6E5D4F3663D0E3CE9E734662944A9EB','0888288902','','','','','','','','','',1,12,'2015-09-10',NULL,0,1,0,0,0),
(1291,'Mrs Kamyata','','BA430F9E47D5DAD1656FBA83E947271D','0884988365','','','','','','','','','',1,12,'2015-09-10',NULL,0,1,0,0,0),
(1301,'J Koreia','','35F0DC0A740C32CD274DBB883706DC8C','0888288902','','','','','','','','','',1,12,'2015-09-10',NULL,0,1,0,0,0),
(1311,'C. Bazale','','EE09192584C7559B77E7063D78390E46','0884949156','chifundobazale@gmail.com','','','','','','','','',1,12,'2015-09-10',NULL,0,1,0,1,0),
(1321,'Mr Makuluni','','786389F861C254DF3C10EBC500D96746','0993048498','','','','','','','','','',1,12,'2015-09-10',NULL,0,1,0,0,0),
(1331,'Mr Alamundo','','3E42437AA3F5BC00BC54CD2F0EF1EC19','088857845','','','','','','','','','',1,12,'2015-09-10',NULL,0,1,0,0,0),
(1341,'Mr Alumando','','2115DD38D6B1ED067E098B2BBC56AC85','088857845','','','','','','','','','',1,12,'2015-09-10',NULL,0,1,0,0,0),
(1351,'Mrs Luka','','B583ABF3C5BD03E95CBFBD1DAF93A1BD','0888515871','','','','','','','','','',1,12,'2015-09-10',NULL,0,1,0,0,0),
(1361,'Mr Palanda','','23D8FF32693D6C79D82C2F5DC22E4D19','0888407102','','','','','','','','','',1,12,'2015-09-10',NULL,0,1,0,0,0),
(1371,'Mr L. Chirwa','','61C35949E99D72574939DA22B83B95E4','0999957778','','','','','','','','','',1,12,'2015-09-10',NULL,0,1,0,0,0),
(1381,'Mrs Malunga','','B820EF3F17EE9F5FD3E8EAC023149500','0888702007','','','','','','','','','',1,12,'2015-09-10',NULL,0,1,0,0,0),
(1391,'Mr Chibwana','','7DB5D190CA8352C323C16B93A26B1EC2','0884550724','','','','','','','','','',1,12,'2015-09-10',NULL,0,1,0,0,0),
(1401,'MR JEBE','','F0DC317B3BDD7978945FDBC7927703B2','0884404040','','','','','','','','','',1,12,'2015-09-11',NULL,12,1,0,0,0),
(1411,'J Koreia','','22132534004D09794FE372641EBBDD55','0888288902','','','','','','','','','',1,12,'2015-09-11',NULL,0,1,0,0,0),
(1421,'J Koreia','','8C15E8EB35E18BE418C855E783A53643','0888288902','','','','','','','','','',1,12,'2015-09-11',NULL,0,1,0,0,0),
(1431,'Mr Forpence','','2AABB090F6280A7A345B63BAE3A45675','0993995426','forpence@yahoo.com','','','','','','','','',1,12,'2015-09-11',NULL,0,1,0,1,0),
(1451,'Mr Taulo','','257B2B23654C1C9A12AD9523BA989C27','0888100171','','','','','','','','','',1,12,'2015-09-11',NULL,0,1,0,0,0),
(1461,'Mr Mtegha','','BB76BBA6E3C1F998D865FEE76B332386','0884628340','','','','','','','','','',1,12,'2015-09-11',NULL,0,1,0,0,0),
(1471,'MRS CHATEPA','','5BE22521CDE36D4726DC587C990920A3','0999326556','','','','','','','','','',1,12,'2015-09-11',NULL,12,1,0,0,0),
(1481,'Mr Kachitsa','','9B566C7CBA97C84B80BDDFD3A4870EBC','0882009795','','','','','','','','','',1,12,'2015-09-11',NULL,0,1,0,0,0),
(1491,'Mr. Mwakalenga','','66D90DA258EBA1DDFE3DFA8142AA14D0','08888357000','','','','','','','','','',1,12,'2015-09-11',NULL,0,1,0,0,0),
(1501,'Mr Mandowa','','1B597102E12E48CD9CB6CB3D026E0AA0','0999342386','','','','','','','','','',1,12,'2015-09-11',NULL,0,1,0,0,0),
(1511,'Mr Kaphala','','832D88F44B6EF7679102CB625463ADAD','0888676396','','','','','','','','','',1,12,'2015-09-11',NULL,0,1,0,0,0),
(1521,'Mr Paul','','A086CBE322A16F059CC3919D56236BAF','0888311111','','','','','','','','','',1,12,'2015-09-11',NULL,0,1,0,0,0),
(1531,'Mr Basikolo','','2B49FC33D3662E37E369957705230A75','0996395882','','','','','','','','','',1,12,'2015-09-11',NULL,0,1,0,0,0),
(1541,'Mr Dafter','','14EACA69BEB8AECFD1D847099AD9942A','0888645217','','','','','','','','','',1,12,'2015-09-11',NULL,0,1,0,0,0),
(1551,'Mr Kasakula','','475AE3B7FFD3E7E832FE5B8E87767360','0885777667','','','','','','','','','',1,12,'2015-09-11',NULL,0,1,0,0,0),
(1561,'Mr Kasakula','','6A5DFB687F092AED9C2F6526EE9A66F7','0885777667','','','','','','','','','',1,12,'2015-09-11',NULL,0,1,0,0,0),
(1571,'Mr Malunga','','75D4E2FE1E6543809CB898E280CFF4B3','0991807569','','','','','','','','','',1,12,'2015-09-11',NULL,0,1,0,0,0),
(1581,'Mr Mbombera','','1B052720D7804723B2C273431AB4F811','0881453258','','','','','','','','','',1,12,'2015-09-11',NULL,0,1,0,0,0),
(1591,'Mr Harawa','','80D87324D3E4F995071ED7F9F78E92D9','0999352803','','','','','','','','','',1,12,'2015-09-11',NULL,0,1,0,0,0),
(1601,'MRS NCHESI','','F7AFDFBFE5BBE63732CA69199486CEED','0884699672','','','','','','','','','',1,12,'2015-09-11',NULL,12,1,0,0,0),
(1611,'Mr Chikuse','','BFE0B4F64E60FA2AE136624E7446ABF0','0884103497','','','','','','','','','',1,12,'2015-09-11',NULL,0,1,0,0,0),
(1621,'Mr Muziwo','','1E4A734BC7B10A703233C59DB8BA5191','0881916703','','','','','','','','','',1,12,'2015-09-11',NULL,0,1,0,0,0),
(1631,'Mr Manford','','2E23A3508A478F169FE9F2EA34324A45','0881021442','','','','','','','','','',1,12,'2015-09-11',NULL,0,1,0,0,0),
(1641,'Mr Kamasa','','01A08C38229D2330064A059F196887F5','0882508566','','','','','','','','','',1,12,'2015-09-11',NULL,0,1,0,0,0),
(1651,'Mr Kampeni','','B32548FC6434AD877F97A0270AD37E93','0888871282','','','','','','','','','',1,12,'2015-09-11',NULL,0,1,0,0,0),
(1661,'Mr Kandaya','','A607A6E5948CB1F6C1256BE5DEB61586','0888293395','','','','','','','','','',1,12,'2015-09-11',NULL,0,1,0,0,0),
(1671,'Mrs Nemachena','','F18B11CEE7774B0F4530F8E04B3496CC','+258825956200','','','','','','','','','',1,12,'2015-09-11',NULL,0,1,0,0,0),
(1681,'Mrs Nemachena','','08E6751E5C20CED1B2B6E7B81EB585B3','+258825956200','','','','','','','','','',1,12,'2015-09-11',NULL,0,1,0,0,0),
(1691,'Mrs Jorge','','8A87C13A92D0C15EC7F22C44D4A3D85D','+258825956200','','','','','','','','','',1,12,'2015-09-11',NULL,0,1,0,0,0),
(1701,'Mr Kachule','','461CABC78E619B0FE8A3D6335ED3D2C9','0881428888','','','','','','','','','',1,12,'2015-09-11',NULL,0,1,0,0,0),
(1711,'Mrs Ndelemani','','FC8505059E57678D4EFBC43EFFDF757D','0885552857','','','','','','','','','',1,12,'2015-09-11',NULL,0,1,0,0,0),
(1721,'Mr Mwanza','','138E35AA500C0B3CB85D1A340FCE263F','0881320620','','','','','','','','','',1,12,'2015-09-11',NULL,0,1,0,0,0),
(1731,'Mr Kachiwiya','','DF61DFD6DA0D9B0084F83CC858DC8EFE','0999222694','','','','','','','','','',1,12,'2015-09-11',NULL,0,1,0,0,0),
(1741,'Mr H. Valantim','','7E005B8A224AAC7F602B2BDB5A836E1C','0881568199','hvalantini@ymail.com','','','','','','','','',1,12,'2015-09-11',NULL,0,1,0,1,0),
(1751,'Mr D. Njunga','','65EDEDB19AF0D250C11D84C5154A2BE4','0882494940','','','','','','','','','',1,12,'2015-09-12',NULL,0,1,0,0,0),
(1761,'MR TEMBO','','C6DB23658D1D5FB7BF4E5231A74BAFA9','0888597642','mathewmathewmtembo@hotmail.com','','','','','','','','',1,12,'2015-09-12',NULL,12,1,0,1,0),
(1771,'MR MPHALALO','','48643FBD1F8E3391B4006A1035D33BBF','0999196668','','','','','','','','','',1,12,'2015-09-12',NULL,12,1,0,0,0),
(1781,'Mr Muwaza','','87F6858D8868A4B75DAD66B3F0B1A387','0882987285','','','','','','','','','',1,12,'2015-09-12',NULL,0,1,0,0,0),
(1791,'MR MPHALARO','','10007337ED326D4875331AD508FDC557','0999196668','','','','','','','','','',1,12,'2015-09-12',NULL,12,1,0,0,0),
(1801,'Mr Emmanuel','','0F0702B48F1EC539A3C97B80B4395BD5','','','','','','','','','','',1,12,'2015-09-12',NULL,0,1,0,0,0),
(1811,'Mr Anthony','','37907C2C75FECBACEF1F70BDE2501443','0999193831','','','','','','','','','',1,12,'2015-09-12',NULL,0,1,0,0,0),
(1821,'Mrs Kanko','','AC52785F1EA9947451EBAC5BC8EB5067','0999423010','','','','','','','','','',1,12,'2015-09-12',NULL,0,1,0,0,0),
(1831,'Mr Robson','','2A10B2B6D05C77DCDF9232D04ABB3652','','','','','','','','','','',1,12,'2015-09-12',NULL,0,1,0,0,0),
(1841,'MR KHOMBE','','ED2D1895809CA641C9FE6ED704A3502C','0888951472','','','','','','','','','',1,12,'2015-09-12',NULL,12,1,0,0,0),
(1851,'MR JUMA','','34C58904951F28A3B38B1428EC045B1A','0999849657','','','','','','','','','',1,12,'2015-09-12',NULL,12,1,0,0,0),
(1861,'MR KATHUMBA','','0B473FE0CC513946DEA35A5F6A890F8A','0881667928','','','','','','','','','',1,12,'2015-09-12',NULL,12,1,0,0,0),
(1871,'Mr Bauleni','','755A29B499C52B6A345DDE74950ED358','','','','','','','','','','',1,12,'2015-09-12',NULL,0,1,0,0,0),
(1881,'Mrs Fosko','','320E2D03D233CE9F52D4BC5ABC7CAC1C','0997730536','','','','','','','','','',1,12,'2015-09-12',NULL,0,1,0,0,0),
(1891,'Mrs Suleman','','4C3A2A4924545576572E74EB22D7E818','0888669936','','','','','','','','','',1,12,'2015-09-12',NULL,0,1,0,0,0),
(1901,'Mr Salanje','','96A9F5341B0500F192DE2B4524983684','','','','','','','','','','',1,12,'2015-09-12',NULL,0,1,0,0,0),
(1911,'Mrs Mpita','','4BE559AFBDD42D007BF914649E98C5F2','0884289444','','','','','','','','','',1,12,'2015-09-12',NULL,0,1,0,0,0),
(1921,'Mrs Chikhoyo','','153C5A7E8E28BC0C453C72C67326E9B8','','','','','','','','','','',1,12,'2015-09-12',NULL,0,1,0,0,0),
(1931,'MR MWALE','','755784B4CEA005564A4AF21963D81C19','','stanleymwale.sm@gmail.com','','','','','','','','',1,12,'2015-09-12',NULL,12,1,0,1,0),
(1941,'Mr Chipoka','','A59586F94786E4827481624C673B1713','0888605121','','','','','','','','','',1,12,'2015-09-12',NULL,0,1,0,0,0),
(1951,'Mrs Ndelamani','','EE179F4D41AC9FF584297E4CA7BAE63E','0885552857','','','','','','','','','',1,12,'2015-09-12',NULL,0,1,0,0,0),
(1961,'Mr Chaima','','C5F1AEF3006EC1B36649FADB3C446DE9','0882423090','','','','','','','','','',1,12,'2015-09-12',NULL,0,1,0,0,0),
(1971,'MR MAINGI','','8E55974B0EF835809945AE911D913C80','','','','','','','','','','',1,12,'2015-09-12',NULL,12,1,0,0,0),
(1981,'Mr Mashalubu','','599B52B1B200DE138D6F83D117D6953B','0881944533','','','','','','','','','',1,12,'2015-09-12',NULL,0,1,0,0,0),
(1991,'MR P. KANDONJE','','70CFE6B021A6D4FA81EBEED23D991BB1','0999921271','patterson.kandonje@gmail.com','','','','','','','','',1,12,'2015-09-14',NULL,12,1,0,1,0),
(2001,'J Chimbalanga','','10297E0E672024ADC3AC5CD24728DA30','0999244210','jchimbalanga@gmail.com','','','','','','','','',1,12,'2015-09-14',NULL,0,1,0,1,0),
(2011,'C. Kalambalika','','E7774D1DD48336F32D7A9D68BAFB54F0','0999373348','','','','','','','','','',1,12,'2015-09-14',NULL,0,1,0,0,0),
(2021,'J Chimbalanga','','7D3DB8E66E69C137C5E86653445461BA','0999244210','jchimbalanga@gmail.com','','','','','','','','',1,12,'2015-09-14',NULL,0,1,0,1,0),
(2031,'Mrs E. Chabwera','','6DBA883124C7BCA61545A934690B3FAA','099512808','jane-jay@rocketmail.com','','','','','','','','',1,12,'2015-09-14',NULL,0,1,0,1,0),
(2041,'G Mwalughali','','DE9AB8F3B4FB8F346C1305BEBB5850FA','0999438073','gmwaluhali@yahoo.com','','','','','','','','',1,12,'2015-09-15',NULL,0,1,0,1,0),
(2051,'G Mwalughali','','EB0D810C082E6701409F0AD6C5953C7E','0999438073','gmwalighali@yahoo.com','','','','','','','','',1,12,'2015-09-15',NULL,0,1,0,1,0),
(2061,'Mr Msiska','','61A28F2CEBB8505620A60DF7C525F966','','','','','','','','','','',1,12,'2015-09-16',NULL,0,1,0,0,0),
(2071,'Mr Ndalira','','67B5382340B2DCEFE09272D0D22B1A6D','','','','','','','','','','',1,12,'2015-09-16',NULL,0,1,0,0,0),
(2081,'Mr Mulera','','E31B88670C68AD30EF5D14E56BD8FF9C','0994102749','','','','','','','','','',1,12,'2015-09-16',NULL,0,1,0,0,0),
(2091,'Mr Kazembe','','A453B60DBA4A621C512D6A401141E719','0999213388','','','','','','','','','',1,12,'2015-09-16',NULL,0,1,0,0,0),
(2101,'Mr Chafunya','','BAA12F78928F0621BA66B36B7380D727','0888669900','','','','','','','','','',1,12,'2015-09-16',NULL,0,1,0,0,0),
(2111,'Mr Umali','','5F0265A278E9990A6BBD96AA09AFC286','0884224750','','','','','','','','','',1,12,'2015-09-16',NULL,0,1,0,0,0),
(2121,'Mrs Masakha','','F8E2A6DB82964804BCFFFD03FCD43C9D','0888566738','','','','','','','','','',1,12,'2015-09-16',NULL,0,1,0,0,0),
(2131,'Mrs Kadamanja','','8DBC97B309AEF387095340AC4918F7CC','0995656733','','','','','','','','','',1,12,'2015-09-16',NULL,0,1,0,0,0),
(2141,'Mr Selemani','','C8E17E6570F9A47DF51270E6A5B6A6B2','088899490','','','','','','','','','',1,12,'2015-09-16',NULL,0,1,0,0,0),
(2151,'Mr Banda','','D6ADA24171277D176923D58527CB6AF3','08882356693','','','','','','','','','',1,12,'2015-09-16',NULL,0,1,0,0,0),
(2161,'Mr Makanjira','','C248C8AA2B7BF376180ECEAAE357B877','0999194841','','','','','','','','','',1,12,'2015-09-16',NULL,0,1,0,0,0),
(2171,'Mr Kumwenda','','1BA88C360CE0184110F4AFB792EF09B2','0888333436','','','','','','','','','',1,12,'2015-09-16',NULL,0,1,0,0,0),
(2181,'Mrs Sandalamu','','1D5641B24A68FF7CA3B4149EFC839E48','0888411673','','','','','','','','','',1,12,'2015-09-16',NULL,0,1,0,0,0),
(2191,'Mrs Gaya','','40A1EEFFAE8F18DF042BE9FC1FFD3305','','','','','','','','','','',1,12,'2015-09-16',NULL,0,1,0,0,0),
(2201,'Mr Milimo','','7FC89CAC7223DC1FD14254F945F3F4DD','0212233224','','','','','','','','','',1,12,'2015-09-16',NULL,0,1,0,0,0),
(2211,'Mr Majawa','','8FFA702CFC88561B5C23066F1108C562','','','','','','','','','','',1,12,'2015-09-16',NULL,0,1,0,0,0),
(2221,'Mr Tilibe','','0FA3B0EAF386875C815E2BCE231C131A','','','','','','','','','','',1,12,'2015-09-16',NULL,0,1,0,0,0),
(2231,'Mr Zupile','','32BDDB837DF4D3894F7655CF2B02129F','0999657296','','','','','','','','','',1,12,'2015-09-16',NULL,0,1,0,0,0),
(2241,'Mr Chabwera','','5BE22521CDE36D4726DC587C990920A3','0999512808','','','','','','','','','',1,12,'2015-09-16',NULL,0,1,0,0,0),
(2251,'Rapheal','','D8E82DCEBC72A58BEFDCFEB3E8AC03B3','','','','','','','','','','',1,12,'2015-09-16',NULL,0,1,0,0,0),
(2261,'MR MASIMBE','','00D5B81EF9748FE7DF9985738FDB96C7','0888514116','pmasimbe@carlsbergmalawi.com','','','','','','','','',1,12,'2015-09-16',NULL,12,1,0,1,0),
(2271,'Mr Gama','','461CABC78E619B0FE8A3D6335ED3D2C9','','','','','','','','','','',1,12,'2015-09-16',NULL,0,1,0,0,0),
(2281,'Mr Harawa','','86F0161B591AC1798BAAE5EA8A6314D8','0888647792','','','','','','','','','',1,12,'2015-09-16',NULL,0,1,0,0,0),
(2291,'Hassan','','ACEC9857D524A31DC67A914EB6F8386C','0992066312','','','','','','','','','',1,12,'2015-09-16',NULL,0,1,0,0,0),
(2301,'Mr Chlunga','','B27BDB1C25A739EA3582D4173A08E290','0882424709','','','','','','','','','',1,12,'2015-09-16',NULL,0,1,0,0,0),
(2311,'Mr Ndanga','','E09DE514C6FA7D15655A6E21064D762B','09992401006','','','','','','','','','',1,12,'2015-09-16',NULL,0,1,0,0,0),
(2321,'Mr Kadzombe','','21712206F0E34C8ABF92E1CFF61E4B81','0999340529','','','','','','','','','',1,12,'2015-09-16',NULL,0,1,0,0,0),
(2331,'Mr Mthawanji','','AC0F117732FAE6294FD1E9925362C3A6','0993982174','','','','','','','','','',1,12,'2015-09-16',NULL,0,1,0,0,0),
(2341,'Mr Selemani','','69369BB38E4879EA51643CADB6CF2B60','0999918393','','','','','','','','','',1,12,'2015-09-16',NULL,0,1,0,0,0),
(2351,'Mr Kazako','','4886CDD16BD316DC5825AE279A259BFE','','','','','','','','','','',1,12,'2015-09-16',NULL,0,1,0,0,0),
(2361,'Mr Mawido','','F352FBB209BBE6FDC967C1E9AC267F8E','0884341540','','','','','','','','','',1,12,'2015-09-17',NULL,0,1,0,0,0),
(2371,'Mr P. Jere','','113D4DBF87FAF6F0758509122F95FD50','0881216833','','','','','','','','','',1,12,'2015-09-17',NULL,0,1,0,0,0),
(2381,'MR. NKUZIONA','','CB84B4D4C602F58B99373E0121E87ED4','0999932606','margret29@gmail.com','','','','','','','','',1,12,'2015-09-17',NULL,12,1,0,1,0),
(2391,'Mr Kamulole','','9ECFAE182100A72EBFAD8EB2853CA18E','0991609033','','','','','','','','','',1,12,'2015-09-18',NULL,0,1,0,0,0),
(2401,'Mr Nasiyaya','','64D026DAE5FD467D7BCA4F92CCDD386C','0888642225','','','','','','','','','',1,12,'2015-09-18',NULL,0,1,0,0,0),
(2411,'Mr Chilunga','','8BBB552A8ACAAE6B63D06CCEE96CBEF6','','','','','','','','','','',1,12,'2015-09-18',NULL,0,1,0,0,0),
(2421,'Mr Ndala','','A2E03A6B8D5F9DDE431751FF2C9CA4FD','0995621255','','','','','','','','','',1,12,'2015-09-18',NULL,0,1,0,0,0),
(2431,'Mr Pascal','','40AE6DAD578A5E45435659E23CD43BF8','','','','','','','','','','',1,12,'2015-09-18',NULL,0,1,0,0,0),
(2441,'Mr Katumbi','','E5E77E54B3C0561CACB4CB30FC7DA2AA','088486629','','','','','','','','','',1,12,'2015-09-18',NULL,0,1,0,0,0),
(2451,'Mr Chafulumira','','3D7CA5853FC07D0628F9EC80E18BB55E','0999953782','','','','','','','','','',1,12,'2015-09-18',NULL,0,1,0,0,0),
(2481,'Mr nicholus','','D6E66E5C9C77186E626AF80F370A6105','0888370763','','','','','','','','','',1,12,'2015-09-18',NULL,0,1,0,0,0),
(2491,'Mrs Mikoko','','F823ED42D2139B20CCA7990D524C6E30','0881592540','','','','','','','','','',1,12,'2015-09-18',NULL,0,1,0,0,0),
(2501,'Mr Chilunga','','FE623FF18D23A87BE4B51DDCA2611E7C','','','','','','','','','','',1,12,'2015-09-18',NULL,0,1,0,0,0),
(2511,'Mr Phiri','','7899CA8E3679856A2BD882C062599391','0888292445','','','','','','','','','',1,12,'2015-09-18',NULL,0,1,0,0,0),
(2521,'MR MBEWE','','B4DEC4C99727C3F3C74BF920E0D518BF','0888557251','','','','','','','','','',1,12,'2015-09-20',NULL,12,1,0,0,0),
(2531,'Mr Chipwanya','','D464EB5B54E13678F0CBBAFF31968870','0888854144','','','','','','','','','',1,12,'2015-09-20',NULL,0,1,0,0,0),
(2541,'Mr Kapito','','91809E8D187EA983B384D7160D755BEA','0884798245','','','','','','','','','',1,12,'2015-09-20',NULL,0,1,0,0,0),
(2551,'Mr Mangani','','38F3735E5A44A8AC249D368FF0CFB932','','','','','','','','','','',1,12,'2015-09-20',NULL,0,1,0,0,0),
(2561,'Mr Nkumba','','E63DD94DCD779919555D95539239F5FA','','','','','','','','','','',1,12,'2015-09-20',NULL,0,1,0,0,0),
(2571,'Mr Kavalo','','5B0B871A04F5699E6D1698D6C9532237','','','','','','','','','','',1,12,'2015-09-20',NULL,0,1,0,0,0),
(2581,'Mr. Phiri','','2CA3D37EB73F6F91C19CBD404C743A74','','','','','','','','','','',1,12,'2015-09-20',NULL,0,1,0,0,0),
(2591,'Mr. Chinandidya','','FD8D34194C1E113D96C483B4D5E2A83C','','','','','','','','','','',1,12,'2015-09-20',NULL,0,1,0,0,0),
(2601,'Mr. Nanjiwa','','711FC024145AAF4E06D750E658C3E35A','','','','','','','','','','',1,12,'2015-09-20',NULL,0,1,0,0,0),
(2611,'Mr Nambera','','1E4882FA485972322ECD862D06D9248A','','','','','','','','','','',1,12,'2015-09-20',NULL,0,1,0,0,0),
(2631,'Mr Gaya','','B2983A27775DDB6B410D8EDFA023DC17','','','','','','','','','','',1,12,'2015-09-20',NULL,0,1,0,0,0),
(2641,'A. Phiri','','9405C4973B05D9B7A9885479AD60D728','0995463881','achiephiri@yahoo.com','','																														','																														','','','','																														','																														',1,12,'2015-09-21',NULL,0,1,0,1,0),
(2651,'Mr Ayub','','4BC1A2AA5BC296B7766CA7051EC0FB21','0999090304','','','','','','','','','',1,12,'2015-09-22',NULL,0,1,0,0,0),
(2661,'Mr Jimu','','280909F6B9398A6F901866261433CF7D','0888876052','','','','','','','','','',1,12,'2015-09-23',NULL,0,1,0,0,0),
(2671,'W. Fazili','','AA18A3A72F2CB852F9106D8C9C0729F2','0882575101','','','','','','','','','',1,12,'2015-09-23',NULL,0,1,0,0,0),
(2681,'S. Mussa','UjcS6uS9vHNc67oI1u/dAmulPKHp66kKgXLvsoT8ysl/NWh34JfNLH0tCCkbdzWZu2AOPCMhynSlJCPWFXXDPQ==','038275B003AF3489FF38B45793037F98','0881250904','elliephiri@gmail.com','','','','','','','','',1,12,'2015-09-23',NULL,0,1,0,1,0),
(2691,'M. Kataika','','6AEC2C2AACB6E27629BDC625F813CA0D','0884695910','','','','','','','','','',1,12,'2015-09-23',NULL,0,1,0,0,0),
(2701,'Mr S. Chandikana','','6669C70B8DBB271097C00ED816AC948D','0888188294','schandikana@gmail.com','','','','','','','','',1,12,'2015-09-24',NULL,0,1,0,1,0),
(2711,'MR MADZIAKAPITA','','FAAC869D48571923C2F5CBBDC3A9CA21','','','','','','','','','','',1,12,'2015-09-29',NULL,12,1,0,0,0),
(2721,'Mr Chiomba','','6BBC89812BDFFE8C9CCB7419DE7C07B1','0888737545','','','','','','','','','',1,12,'2015-09-30',NULL,0,1,0,0,0),
(2731,'Mr Mwandira','','DB0FAAF67C2211763FFE877BEF6B35FC','0999879382','mwandira@stansfieldmotors.com','','','','','','','','',1,12,'2015-09-30',NULL,0,1,0,1,0),
(2741,'Mr Chibwana','','05E29DE6454C903C90F95097EB29E7CD','','','','','','','','','','',1,12,'2015-10-06',NULL,0,1,0,0,0),
(2751,'Mr Kabango','','DCE2C7AAF60A648A7D0CBA8F3E935D66','','','','','','','','','','',1,12,'2015-10-06',NULL,0,1,0,0,0),
(2761,'Mr Kamanga','','4DB6CFAD9CA6B9DEBC1035C19D172294','','','','','','','','','','',1,12,'2015-10-06',NULL,0,1,0,0,0),
(2771,'Mr Sulyman','','09351E6494BED64915D6121927355409','','','','','','','','','','',1,12,'2015-10-06',NULL,0,1,0,0,0),
(2781,'Mr Juma','','F9DD00D4B66801E76E8B504F63A1A1DA','','','','','','','','','','',1,12,'2015-10-06',NULL,0,1,0,0,0),
(2791,'Mr Ndovi','','62CABD3E6BB2E71DBA993EBBE3B378D6','','','','','','','','','','',1,12,'2015-10-06',NULL,0,1,0,0,0),
(2801,'Mr Mgona','','F8CA6CA9A2DD10E280BFF7D4A4733B8D','','','','','','','','','','',1,12,'2015-10-06',NULL,0,1,0,0,0),
(2811,'Mr Placid','','75A8EEDBED073847F77823A42A09DDB2','','','','','','','','','','',1,12,'2015-10-06',NULL,0,1,0,0,0),
(2821,'Mr Moses','','2D60F53913BD4F7E03EE18F9509FD9F0','','','','','','','','','','',1,12,'2015-10-06',NULL,0,1,0,0,0),
(2831,'Mr Kamundi','','275259D69D77E2335C62D7504390F093','','','','','','','','','','',1,12,'2015-10-06',NULL,0,1,0,0,0),
(2841,'Mr Kamundi','','DAB65B471EC9A8E47A57E2F7FEF27008','','','','','','','','','','',1,12,'2015-10-06',NULL,0,1,0,0,0),
(2851,'Mrs Khonyongwa','','DB92B124FBEF9DBED2EA7DCE75F206C1','','','','','','','','','','',1,12,'2015-10-06',NULL,0,1,0,0,0),
(2861,'Mbwana','','3D7CA5853FC07D0628F9EC80E18BB55E','','','','','','','','','','',1,12,'2015-10-06',NULL,0,1,0,0,0),
(2871,'Mr Mtonga','','564C1C4286902C30B6492471BBA9F150','','','','','','','','','','',1,12,'2015-10-06',NULL,0,1,0,0,0),
(2881,'Mr Buleya','','D257083A47BE611F08888EB0BF86D9C3','','','','','','','','','','',1,12,'2015-10-06',NULL,0,1,0,0,0),
(2891,'Mr Kuipa','','E8B3D8530F37A7B04DBBBD1A4EBF5A56','','','','','','','','','','',1,12,'2015-10-06',NULL,0,1,0,0,0),
(2901,'Mr Gondwe','','E1B875FFD105BC2902B10DA25FF39122','','','','','','','','','','',1,12,'2015-10-06',NULL,0,1,0,0,0),
(2911,'Mr Bwanali','','7BD0D7102B86B160FD4A963818239E73','','','','','','','','','','',1,12,'2015-10-06',NULL,0,1,0,0,0),
(2921,'Mr Phiri','','606FD05A7CB1A0AC0CF42A61C2F1D6B2','','','','','','','','','','',1,12,'2015-10-06',NULL,0,1,0,0,0),
(2931,'Mr Namongo','','5DA9EFA78E9FE1F77B9C7205D54872E7','','','','','','','','','','',1,12,'2015-10-06',NULL,0,1,0,0,0),
(2941,'Miss Chiwale','','78A5E4951C11BDB8DCE878890E000E8A','','','','','','','','','','',1,12,'2015-10-06',NULL,0,1,0,0,0),
(2951,'Mr Kampira','','C15ACB52E85DEA679B3224827D54A19A','','','','','','','','','','',1,12,'2015-10-06',NULL,0,1,0,0,0),
(2961,'Mr Misolo','','6298F3357DDD7826AA11B164434F222E','0888315751','','','','','','','','','',1,12,'2015-10-07',NULL,0,1,0,0,0),
(2971,'Mr J. Masamba','','533FE9F3F569890114E0016CA94E61BE','0888899072','john.masamba@gmail.com','','','','','','','','',1,12,'2015-10-13',NULL,0,1,0,1,0),
(2981,'F. Bwanali','','CAD0DF575D3A0DEDAD2A81F832A31732','0999662165','nelsonbwanali24@gmail.com','','','','','','','','',1,12,'2015-10-13',NULL,0,1,0,1,0),
(2991,'Mr Ajinga','','8A2BF2D692B29AB288691D9B5622F55E','0881506143','','','','','','','','','',1,12,'2015-10-13',NULL,0,1,0,0,0),
(3001,'Mr Chamaimba','','2A10B2B6D05C77DCDF9232D04ABB3652','0881864758','fchimamimba@rockeymail.com','','','','','','','','',1,12,'2015-10-21',NULL,0,1,0,1,0),
(3011,'Mr Ndalama','','0BD841C2854E32A3936AE6AAF12EB1F8','0888591752','','','','','','','','','',1,12,'2015-10-21',NULL,0,1,0,0,0),
(3021,'Chaphuka','','82A06C72AB21B9BC75962B0EC0E43497','','','','','','','','','','',1,12,'2015-10-22',NULL,0,1,0,0,0),
(3031,'Mr Maweru','','FB1A6B9989812E20EA5D1A4B351383C7','','','','','','','','','','',1,12,'2015-10-22',NULL,0,1,0,0,0),
(3041,'Mrs P.K. Banda','','BB6BF2931C72E49DB4AB4AF43DEE6BA3','0999935886','','','','','','','','','',1,1,'2015-10-22',NULL,0,1,0,0,0),
(3051,'Mr Paul','','47C0FBABF9BCC2B8A9D91AFBD5880D8A','088523601','','','','','','','','','',1,12,'2015-10-22',NULL,0,1,0,0,0),
(3061,'Mr B. Ndoma','aC1YiPXuZ1XenpGvKjdM6OfIyBXNdYzzGmSGaO6wHUK8hKKCYREPAp3+G3vV9wUOgxYlSU6rXq0S9Z9kvWFRUA==','E13970725D4FF6796C230E46F7E9E957','0999938732','ndomamathiasbruno@yahoo.com','','','','','','','','',1,12,'2015-10-22',NULL,0,1,0,1,0),
(3071,'Mr E.C Phiri','','B0D5D1647399382AE39822BB30332ABD','0888546774','ecphiri@gmail.com','','','','','','','','',1,12,'2015-10-22',NULL,0,1,0,1,0),
(3081,'Mr F. Mwafongo','','623784313CCA6463CC977DB6627004D0','0999955929','','','','','','','','','',1,12,'2015-10-22',NULL,0,1,0,0,0),
(3091,'Hbija Kahanju','','C0F6B2E1E99D93C14764370D7742FFA9','0995996047','','','','','','','','','',1,12,'2015-10-22',NULL,0,1,0,0,0),
(3101,'Juma Said Fundi','','6345D3A75655522574B31FE2A0A38B33','0999430028','','','','','','','','','',1,12,'2015-10-22',NULL,0,1,0,0,0),
(3111,'Mr H. Matemba','','B37E9698480E79F2906C3BBCAA263915','0999298567','matembah@yahoo.com','','','','','','','','',1,12,'2015-10-22',NULL,0,1,0,1,0),
(3121,'Angella Shaibu','','302A7FF08A0ADBDD691DD5393FCC6456','0888541105','','','','','','','','','',1,12,'2015-10-22',NULL,0,1,0,0,0),
(3131,'Mr Gaduka','','A5EB6ABD709E3DF8A2BD7500539CFC98','0881181453','joybetula7@gmail.com','','','','','','','','',1,12,'2015-10-22',NULL,0,1,0,1,0),
(3141,'Mrs D. Makwinja Mnozi','','6ED929F85732F49C4AE8BD439D1AE7B1','0888600487','','','','','','','','','',1,12,'2015-10-22',NULL,0,1,0,0,0),
(3151,'Mr E. Kamwendo','','5F0265A278E9990A6BBD96AA09AFC286','0999286743','','','','','','','','','',1,12,'2015-10-22',NULL,0,1,0,0,0),
(3161,'Mr Dambuleni','','1A3B7DD58876AFF3BA462B4042439848','','','','','','','','','','',1,12,'2015-10-22',NULL,0,1,0,0,0),
(3171,'Mr Liver','','A668E223D7FFAD33CFEBABBC207E0B72','','','','','','','','','','',1,12,'2015-10-22',NULL,0,1,0,0,0),
(3181,'Mr Nkhata','','D1AF91549F76470E1595FEDE6FD78228','','','','','','','','','','',1,12,'2015-10-22',NULL,0,1,0,0,0),
(3191,'Mr Kanjo','','93E92590A9F26896671DE269B4726C47','','','','','','','','','','',1,12,'2015-10-22',NULL,0,1,0,0,0),
(3201,'Mr Simwawa','','501D959E41285368158481D6CDB862DD','','','','','','','','','','',1,12,'2015-10-22',NULL,0,1,0,0,0),
(3211,'Mr Malisita','','35F0DC0A740C32CD274DBB883706DC8C','','','','','','','','','','',1,12,'2015-10-22',NULL,0,1,0,0,0),
(3221,'Mr Majawa','','1D5641B24A68FF7CA3B4149EFC839E48','','','','','','','','','','',1,12,'2015-10-22',NULL,0,1,0,0,0),
(3231,'Mr Ngamiza','','50CC71521A573998BAE8295DCC6795FE','','','','','','','','','','',1,12,'2015-10-22',NULL,0,1,0,0,0),
(3241,'Mr Staubi','','3C2C438695567CF12E2B1F4FF5A3D200','','','','','','','','','','',1,12,'2015-10-22',NULL,0,1,0,0,0),
(3251,'Mr Chibwana','','176782F382363BB2C6DC037770D4C9E1','','','','','','','','','','',1,12,'2015-10-22',NULL,0,1,0,0,0),
(3261,'Mrs Makwangwala','','78CDBEF3CBD34B960169A049B1CA456D','','','','','','','','','','',1,12,'2015-10-22',NULL,0,1,0,0,0),
(3271,'Mrs Bento','','AFFD2E4ED6CDC8F987701F96BAA91137','','','','','','','','','','',1,12,'2015-10-22',NULL,0,1,0,0,0),
(3281,'Mr Maula','','0B88B3BF6961B24236CFFD857A9ABFAA','','','','','','','','','','',1,12,'2015-10-22',NULL,0,1,0,0,0),
(3291,'Mr Kachepa','','D1CB7D4435FF5AE9359CDEFB68F929F0','','','','','','','','','','',1,12,'2015-10-22',NULL,0,1,0,0,0),
(3301,'Mr Chawanda','','42E9AAD320FD1C685B76A39F3F2BB644','','','','','','','','','','',1,12,'2015-10-22',NULL,0,1,0,0,0),
(3311,'Msomba','','FF9C8517C6C0A6DC3B043A11F893A043','','','','','','','','','','',1,12,'2015-10-22',NULL,0,1,0,0,0),
(3321,'David E. Dymon','','0AEABCCD49D9377B0314B88C11A87D98','0888881035','dymondavide@yahoo.com','','','','','','','','',1,12,'2015-10-26',NULL,0,1,0,1,0),
(3331,'T.G Chilanga','','AABEFA76842F49A8A18624E324E84BDB','0999557618','','','','','','','','','',1,12,'2015-10-26',NULL,0,1,0,0,0),
(3341,'Mr Maluwa','','89D25B9D2C730D463AB99A0C02B25D2E','0888861566','','','','','','','','','',1,12,'2015-10-26',NULL,0,1,0,0,0),
(3351,'Mr Bakali','','DFFA7BE0278E2824CF2DAC5A68D1BCA2','','','','','','','','','','',1,12,'2015-10-26',NULL,0,1,0,0,0),
(3361,'Mr Mankhwanda','','12B2774E6D27841028048CF7275CB0DE','','','','','','','','','','',1,12,'2015-10-26',NULL,0,1,0,0,0),
(3371,'Mr M\'bwana','','361971AD041EF80555C5E21005012B75','','','','','','','','','','',1,12,'2015-10-26',NULL,0,1,0,0,0),
(3381,'Mr S Kunje','','53318AF4490B3525BC129A0425AA262B','0888725980','rodneykunje@yahoo.co.uk','','','','','','','','',1,12,'2015-10-27',NULL,0,1,0,1,0),
(3391,'Mr Mtuwana','','447BB48C429CBD322257B3760A1D3647','0888939503','mbanawosibuilds@gmail.com','','','','','','','','',1,12,'2015-10-27',NULL,0,1,0,1,0),
(3401,'Mr Kaufulu','','1EF12677463FD26E4E653F2AB1C04275','','','','','','','','','','',1,12,'2015-10-27',NULL,0,1,0,0,0),
(3411,'Mr Kachitsa','','2EFDB5BC1DE2286A0BDE7D95B9E8C449','','','','','','','','','','',1,12,'2015-10-27',NULL,0,1,0,0,0),
(3421,'G BANDA','','7C8DDCE4402116F511394EAB4680F99D','0999551635','getumadi@yahoo.com','','','','','','','','',1,12,'2015-10-28',NULL,12,1,0,1,0),
(3431,'Mr Anthony','','DC5E34DF421B341A85ABB1CC099A21EC','','','','','','','','','','',1,12,'2015-10-29',NULL,0,1,0,0,0),
(3441,'R. Sadyalunda','','B1A657ADC1292F66DC78B0F8DF2A7819','0888832341','sadyalundarose@yahoo.com','','','','','','','','',1,12,'2015-11-02',NULL,0,1,0,1,0),
(3451,'Mr D. Kamwendo','','9E988D6CAF937A24D2709487A4C68E21','0888646687','duncankay19@gmail.com','','','','','','','','',1,12,'2015-11-02',NULL,0,1,0,1,0),
(3461,'Mr Muheka','','A9918C6ED9E8E81875B0DD09D8F0379E','888752116','.','.',',',',',',',',',',',',',',',1,12,'2016-01-26','0000-00-00',0,1,0,0,0),
(3471,'Mrs Matechanga','','0FD48135B6465038795DFA6439DF0FC4','0999512421','','.','P.O Box 14\r\nChikhwawa','Chikhwawa','.','.','.','.','.',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3481,'Mr Kamthunzi','','17F363C9A7A87568CE486B9CAA32E035','0884661730','','','Escom\r\nBox 2047\r\nBlantyre','Namiwawa','','','','','',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3491,'Mr Chilunga','','9AE725CAB1F3CE36E8459BDFF67CA78A','','','','','','','','','','',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3501,'Mr Bemeyani','','6B267D9C273C923CA4E8A472EB977A33','0888425929','','','','','','','','','',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3511,'Mercy Mazyopa','kZ8Ws0tHZE1KZn9LWOjllMaYtROSyWZxrnWHpt9vu0ElA+dyH2cL6F5MpHEb1IH2QQy5nDISM2b+RYuVsRySkA==','3BEE21DFD2EC2FD2BE57FFC638BD8F14','0996854578','mercymazyopa@gmail.com','','','','','','','','',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3521,'Mr Bemeyani','','1F0DA4B81EA3E8F74921512C25135E82','0999120890','','','Box 5\r\nThyolo','Thyolo','','','','','',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3531,'Mr Bemeyani','','760761655AACD2E5519D634FA73AD4C6','','','','','','','','','','',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3541,'Mr Jere','','0FA3B0EAF386875C815E2BCE231C131A','','','','','','','','','','',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3551,'Mrs Matechanga','','DD70E4B6376A8D1AB3294798F217B746','','','','Box 14\r\nChikhwawa','Chikhwawa','','','','','',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3561,'Mr J Mdwazika','','EDD34F16F3FEA4BBF8398B555C8E1C59','0995607041','jmdwazika@gmail.com','','P/Bag 360\r\nBlantyre\r\n','','College of Medicine','','','P/Bag 360\r\nBlantyre\r\n','Blantyre',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3571,'Mr Juma','','4BE559AFBDD42D007BF914649E98C5F2','','','','','','','','','','',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3581,'Bob Banda','','F45921E5276AE0F66C2FD2B084AAC635','0999202194','mtongabob@yahoo.com','','Box 5743','Greencorner','','','','','',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3591,'Mr Maluwa','','1C3F9B574BFA6C86362311B287F443E4','','','','Goliath Primary School\r\nBox 21\r\nThyolo','Thyolo','','','','','',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3601,'Mrs Kamwendo','','A982B45C1F1B341A35D96207D624E117','','','','','','','','','','',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3611,'Mable Mbewe','','167CA034F051FB7B30067AF62932208F','0999355709','','','Mr Tcheza\r\nLimbe Leaf Company\r\nBoc 40044, Lilongwe','Lilongwe','Limbe Leaf','','','Limbe Leaf Company\r\nBoc 40044, Lilongwe','Lilongwe',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3621,'Mr Chidziwitso','','8C62CDF78A0DA125EE49E5397DD36CF7','0888384965','','','','Chitawira','','','','','',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3631,'Mrs Lungu','','FA0BE7697046C9B9F4B1946DB02A66DA','','','','','','','','','','',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3641,'Mr Banda','','AB51CF016F7CE4A63E61D11E5ECE3B10','','','','','','','','','','',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3651,'Mr Mulenga','','4FC6612075A45971D60421B76B48142C','0882832270','','','','Mulanje','','','','','',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3661,'Mrs H. Mkandawire','','995BA15B7FED7FB09EBB1B75D8F27F9D','0888769034','','','','Machinjiri area 10','','','','','',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3671,'G.T Chizauni','','0A89E5E62B3616838610316855F50F69','','','','','Liongwe','','','','','',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3681,'Mrs Chitsuro','','D61564B79510A7652A1AFA995716B234','','','','','Chilomoni','','','','','',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3691,'Mrs Chitsiro','','F10965F6C5229051DE13E0A4DF5BBE14','','','','','Chilomoni','','','','','',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3701,'Mr Madziayenda','','2509BA1DA27093700B5BE3ED437087D3','','','','','','','','','','',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3711,'Mr Kalua','','E8AE62AE89EB3E1BB0E9A37C2337AD33','','','','','','','','','','',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3721,'Mr Kalua','','E1A527786681B99B1309951FE4EB4121','','','','','','','','','','',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3731,'Mr Mwatibu','','A59E8638ED912CB17520E8468AFE97F0','0888771111','lyson.mwatibu@nbs.mw','','NBS BANK\r\nBox 32251\r\nBlantyre 3','Manja','NBS','01876222','','NBS BANK\r\nBox 32251\r\nBlantyre 3','Blantyre',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3741,'Mr Chavula','','DE079D626FE7AD6AE1C7DF9DD33472F2','','','','','Chileka','','','','','',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3751,'Mrs Mwamtobe','','C569476A2561BA4E36276D34EB51E4CD','0999779284','','','Box 1093\r\nBlantyre','','','','','','',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3761,'Regina Amosi','','858E3DA07F842C2D76300E02DC157B83','088838126','','','Box 3014\r\nBlantyre','Mbayani','','','','','',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3771,'Fatch Binauli','qAsfHJqLqzb9VGeNvC7h0D0gFIsLP7iEocB4LT84Iu0qvRQpxawzoc/O78UuJ86Wo1BtzCEoMKD4oOa3jTLoPA==','369E8AAD4FF6A7078203730F5B5254A3','0882335300','universalfarmers@gmail.com','','Box 291\r\nBalaka','','','','','','',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3781,'Mr Chakwana','','09C43E13BF5B64DD0D5BB4ED2460E1EC','','','','','','','','','','',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3791,'Mr Matapila','','445F3D82E3B6C223849C7FD4C57EAEFE','','','','','','Illovo','','','','',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3801,'Mr Maneka','','7B57C0C5E8D7E718AD06D0D31936EAB2','','','','','','','','','','',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3811,'Mr Kadosa','','ED52195182762FB8205B866C57AFF1BB','','','','','','','','','','',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3821,'P Majonanga','','8EE7ED747033C47D465656805E98EB58','0888873270','moetmalawicharity@yahoo.co.uk','','Box 328\r\nMangochi','Mangochi','MOET','','moetmalawicharity@yahoo.co.uk','Moet\r\nBox 328\r\nMangochu','Mangochi',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3831,'Mr Chikuse','','1C2AE1BB24A0809E9E3404023C2D60C5','','','','','','','','','','',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3841,'Mr Mzumara','','7F1484F9CAA8CB6803D1021DD6B5EE49','','','','','','','','','','',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3861,'HT Phiri','','54E9A4213BDC47FEBD335B38E483B90E','0888016200','','','Box 72\r\nZomba','Matawale\r\nZomba','MTL','','','MTL\r\nBox 72\r\nZomba','Zomba',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3871,'Mr Sululu','','7C5675CC6B4419F52FF96D642DA30E4A','','','','','','','','','','',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3881,'Mr Sikelo','','81AD5D481295BFB9EEDCB35A00DFEAE5','','','','','','','','','','',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3891,'Mr Mkumba','','FAC262BDAB9E32A527FBCD2ED64B1F24','','','','','','','','','','',1,12,'2016-01-27','0000-00-00',0,1,0,0,0),
(3901,'Mr Kalemba','','E0B11ADAFECC776361DF29C8CA39B9B0','','','','','','','','','','',1,12,'2016-01-28','0000-00-00',0,1,0,0,0),
(3911,'Mr Mlinde','','2CFF2E49BD19AD61819396247E21C8EE','','','','','','','','','','',1,12,'2016-01-28','0000-00-00',0,1,0,0,0),
(3921,'Mrs S. Mponela','','42E1A4A58764CC960485C22DB0A21721','0888851100','','','P/BAG 303\r\nBT','Chitawira KS791','Polytechnic','','','P/Bag 303\r\nChichiri\r\nBT 3','Chichiri',1,12,'2016-01-28','0000-00-00',0,1,0,0,0),
(3931,'Mr Phiri','','460F2E60CE3BE6D125B8654BDA6383C6','0881209478','','','','','','','','','',1,12,'2016-01-28','0000-00-00',0,1,0,0,0),
(3941,'Mr Phiri','','A70EFBE8F64FC7479197A087C628D3B0','','','','','','','','','','',1,12,'2016-01-28','0000-00-00',0,1,0,0,0),
(3951,'Mrs Masakha','','1E0001DDBE8670A40A6EC6B2B0BBD7CB','','','','','','','','','','',1,12,'2016-01-28','0000-00-00',0,1,0,0,0),
(3961,'Mr Bwanali','','53647561D953577FDDBA23496E74FA28','','','','','Mchinji','','','','','',1,12,'2016-01-28','0000-00-00',0,1,0,0,0),
(3971,'Mr Mmangisa','','583A248CE221E5451C17E1A449CA65F9','','','','','','','','','','',1,12,'2016-01-28','0000-00-00',0,1,0,0,0),
(3981,'Mr Palanda','','F3F98156B2BC5AB4E8CC07A42947EAD3','','','','','','','','','','',1,12,'2016-01-28','0000-00-00',0,1,0,0,0),
(3991,'Mr Chitupe','','118CD85D90416CC6DAD41285246F5B88','','','','','','','','','','',1,12,'2016-01-28','0000-00-00',0,1,0,0,0),
(4001,'Mrs Mphanga','','4FC6612075A45971D60421B76B48142C','','','','','','NICO','','','','',1,12,'2016-01-28','0000-00-00',0,1,0,0,0),
(4011,'Mr Kamwaza','','1AA77ABA6FA7A3B0191D626FD1FDA6B4','','','','','','','','','','',1,12,'2016-01-28','0000-00-00',0,1,0,0,0),
(4021,'Mr Mmangitsa','','9F0041EAD9823463619DF70F3C0FC077','','','','','','','','','','',1,12,'2016-01-28','0000-00-00',0,1,0,0,0),
(4031,'Mr Windo','','81905E1CBC3D630D2529D1B6AE44FBB2','','','','','','','','','','',1,12,'2016-01-28','0000-00-00',0,1,0,0,0),
(4041,'Mr Chapolera','','75B54FE96229E3DA742F7359ECD074FE','','','','','','','','','','',1,12,'2016-01-28','0000-00-00',0,1,0,0,0),
(4051,'Mr Fikilini','','C018FF3ACFD9E0A7ED017D02233557DD','0999564886','','','','','','','','','',1,12,'2016-01-28','0000-00-00',0,1,0,0,0),
(4061,'Mrs Cassim','','DDA75F49C77F137D9CF7E9DD8D9C3932','088157420','','','Namilango Primary\r\nBox 247\r\nBT','Chirimba','','','','','',1,12,'2016-01-28','0000-00-00',0,1,0,0,0),
(4071,'Mr Issa','','42E1A4A58764CC960485C22DB0A21721','','','','','','','','','','',1,12,'2016-01-28','0000-00-00',0,1,0,0,0),
(4081,'Mr M Yobe','','085B613F1830115F93E7BD26BB8A98F4','088855484','','','124\r\nBT','','','','','','',1,12,'2016-01-28','0000-00-00',0,1,0,0,0),
(4091,'Mr Ndovi','','F9D235E44670677B0474DDF835D7A162','0888897109','','','','','','','','','',1,12,'2016-01-29','0000-00-00',0,1,0,0,0),
(4101,'Mr Gama','','508D5A9ADACDEB9291683A6D23145428','','','','','','','','','','',1,12,'2016-01-29','0000-00-00',0,1,0,0,0),
(4111,'Mr Kwengere','','4DE22011D0F905F13538E6AF4040ECDE','','','','','','','','','','',1,12,'2016-01-29','0000-00-00',0,1,0,0,0),
(4121,'Mr Chitsime','','13B718D90163584AB1B9220EA32D745A','0881118601','','','Box 31174\r\nChichiri\r\nBlantyre','Ngumbe','','','','','',1,12,'2016-01-29','0000-00-00',0,1,0,0,0),
(4131,'Elizabeth Banda','','7FC89CAC7223DC1FD14254F945F3F4DD','088898902','','','Tasty Take Away\r\nBox 30663\r\nLL','','','','','','',1,12,'2016-01-29','0000-00-00',0,1,0,0,0),
(4141,'Mrs Mfungula','','D4CEFFC449506A26200EDDC7FF1A63EB','','','','','','','','','','',1,12,'2016-01-29','0000-00-00',0,1,0,0,0),
(4151,'Mrs Jones','','FDA8FEED9F87561262E3B801522BE17D','','','','','','','','','','',1,12,'2016-01-29','0000-00-00',0,1,0,0,0),
(4161,'Mr Ntchito','','0295F5BAA3FB68311F2ECC032B8C68D2','','','','','','','','','','',1,12,'2016-01-29','0000-00-00',0,1,0,0,0);

/*Table structure for table `parent_siblings` */

DROP TABLE IF EXISTS `parent_siblings`;

CREATE TABLE `parent_siblings` (
  `pr_id` int NOT NULL AUTO_INCREMENT,
  `parent_id` int DEFAULT NULL,
  `student_id` int DEFAULT NULL,
  `relationship` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`pr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=433 DEFAULT CHARSET=latin1;

/*Data for the table `parent_siblings` */

insert  into `parent_siblings`(`pr_id`,`parent_id`,`student_id`,`relationship`) values 
(4,1,1,'Brother'),
(5,11,11,'Daughter'),
(6,21,21,'Son'),
(7,31,31,'Brother'),
(8,41,41,'Daughter'),
(9,51,51,'Parent'),
(10,61,61,'Daughter'),
(11,71,71,'Daughter'),
(12,81,81,'Daughter'),
(13,91,91,'Daughter'),
(14,101,101,'Brother'),
(15,111,111,'Parent'),
(16,121,121,'Parent'),
(17,131,131,'Parent'),
(18,141,141,'parent'),
(19,151,151,'Parent'),
(20,161,161,'Parent'),
(21,171,171,'Parent'),
(22,181,181,'Parent'),
(23,191,191,'Brother'),
(24,201,201,'Parent'),
(25,211,211,'Grandson'),
(26,221,221,'Parent'),
(27,231,231,'Parent'),
(28,241,241,'Parent'),
(29,251,251,'Parent'),
(30,261,261,'Guardian'),
(31,271,271,'Parent'),
(32,281,281,'Parent'),
(33,291,291,'Parent'),
(34,301,301,'Parent'),
(35,311,311,'Parent'),
(36,321,321,'Parent'),
(37,331,331,'Parent'),
(38,341,341,'Parent'),
(39,351,351,'Parent'),
(40,361,361,'Parent'),
(41,371,371,'Parent'),
(42,3121,381,'Guardian'),
(43,3111,391,'Parent'),
(44,3211,401,'Parent'),
(45,3071,411,'Parent'),
(46,3101,421,'Parent'),
(47,3091,431,'Guardian'),
(48,3081,441,'Parent'),
(49,3061,451,'Parent'),
(50,3311,461,'Parent'),
(51,1481,471,'Parent'),
(52,3131,481,'Parent'),
(53,3281,491,'Parent'),
(54,3041,501,'Parent'),
(55,3051,511,'Parent'),
(56,3141,521,'Parent'),
(57,3201,531,'Parent'),
(58,3181,541,'Parent'),
(59,3301,551,'Parent'),
(60,1431,561,'Parent'),
(61,3251,571,'Parent'),
(62,3151,581,'Parent'),
(63,381,591,'Parent'),
(64,391,601,'Parent'),
(65,401,611,'Parent'),
(66,411,621,'Parent'),
(67,421,631,'Guardian'),
(68,431,641,'Parent'),
(69,441,651,'Parent'),
(132,1071,1281,'Parent'),
(71,461,671,'Parent'),
(72,471,681,'Parent'),
(73,481,691,'Parent'),
(74,491,701,'Parent'),
(75,501,711,'Parent'),
(76,511,721,'Parent'),
(77,521,731,'Parent'),
(133,1081,1291,'Parent'),
(79,541,751,'Guardian'),
(80,551,761,'Parent'),
(81,561,771,'Parent'),
(82,571,781,'Parent'),
(83,581,791,'Parent'),
(84,591,801,'Parent'),
(85,601,811,'Parent'),
(86,611,821,'Parent'),
(87,621,831,'Parent'),
(88,631,841,'Parent'),
(89,641,851,'Parent'),
(90,651,861,'Parent'),
(91,661,871,'Parent'),
(92,671,881,'Parent'),
(93,681,891,'Guardian'),
(94,691,901,'Parent'),
(95,701,911,'Parent'),
(96,711,921,'Guardian'),
(97,721,931,'Parents'),
(98,731,941,'Parent'),
(99,741,951,'Parent'),
(100,751,961,'Parent'),
(101,761,971,'Parent'),
(102,771,981,'Parent'),
(103,781,991,'Parent'),
(104,791,1001,'Parent'),
(105,801,1011,'Parent'),
(106,811,1021,'Parent'),
(107,821,1031,'Parent'),
(108,831,1041,'Guardian'),
(109,841,1051,'Parent'),
(110,851,1061,'Parent'),
(111,861,1071,'Paren'),
(130,1051,1261,'Parent'),
(113,881,1091,'Parent'),
(114,891,1101,'Parent'),
(115,901,1111,'Parent'),
(116,911,1121,'Parent'),
(117,921,1131,'Grandmother'),
(118,931,1141,'Parent'),
(120,951,1161,'Parent'),
(121,961,1171,'Guardian'),
(131,1061,1271,'Parent'),
(123,981,1191,'Parent'),
(124,991,1201,'Parent'),
(125,1001,1211,'Parent'),
(126,1011,1221,'Parent'),
(127,1021,1231,'Parent'),
(128,1031,1241,'Parent'),
(129,1041,1251,'Brother'),
(134,3191,1301,'Parent'),
(135,3231,1311,'Parent'),
(136,3171,1321,'Parent'),
(138,101,1341,'Parent'),
(139,3221,1351,'Parent'),
(140,101,1361,'Parent'),
(141,3271,1371,'Parent'),
(142,3161,1381,'Parent'),
(143,3241,1391,'Parent'),
(144,101,1401,'Parent'),
(145,3261,1411,'Parent'),
(146,1091,1421,'Parent'),
(147,1101,1431,'Guardian'),
(148,1111,1441,'Parent'),
(150,1131,1461,'Parent'),
(151,1141,1471,'Parent'),
(152,1151,1481,'Parent'),
(153,1161,1491,'Parent'),
(154,1171,1501,'Parent'),
(155,1181,1511,'Parent'),
(156,1191,1521,'Parent'),
(157,1201,1531,'Parent'),
(158,1211,1541,'Parent'),
(159,1221,1551,'Parent'),
(160,1231,1561,'Parent'),
(161,1241,1571,'Parent'),
(162,1251,1581,'Parent'),
(163,1261,1591,'Guardian'),
(164,1271,1601,'Guardian'),
(165,1281,1611,'Guardian'),
(166,1291,1621,'Parent'),
(167,1301,1631,'Guardian'),
(168,1311,1641,'Parent'),
(169,1321,1651,'Parent'),
(170,1331,1661,'Brother'),
(171,1341,1671,'Brother'),
(172,1351,1681,'Parent'),
(173,1361,1691,'Parent'),
(174,1371,1701,'Guardian'),
(175,1381,1711,'Aunt'),
(176,1391,1721,'Parent'),
(177,1401,1731,'Parent'),
(178,1411,1741,'Guardian'),
(179,1421,1751,'Guardian'),
(180,1261,1761,'Guardian'),
(181,1261,1771,'Guardian'),
(182,1261,1781,'Guardian'),
(183,1261,1791,'Guardian'),
(184,1261,1801,'Guardian'),
(185,1261,1811,'Guardian'),
(186,1261,1821,'Guardian'),
(187,1431,1831,'Parent'),
(189,1451,1851,'Parent'),
(190,1461,1861,'Parent'),
(191,1471,1871,'Parent'),
(192,1491,1881,'Parent'),
(193,1501,1891,'Parent'),
(194,1511,1901,'Parent'),
(195,1521,1911,'Parent'),
(196,1531,1921,'Parent'),
(197,1541,1931,'Parent'),
(198,1551,1941,'Parent'),
(199,1561,1951,'Parent'),
(200,1571,1961,'Parent'),
(201,1581,1971,'Parent'),
(202,1591,1981,'Parent'),
(203,1601,1991,'Parent'),
(204,1611,2001,'Parent'),
(205,1621,2011,'Parent'),
(206,1631,2021,'Parent'),
(207,1641,2031,'Parent'),
(208,1651,2041,'Parent'),
(209,1661,2051,'Parent'),
(210,1671,2061,'Parent'),
(211,1681,2071,'Parent'),
(212,1691,2081,'Parent'),
(213,1701,2091,'Parent'),
(214,1711,2101,'Parent'),
(215,1721,2111,'Parent'),
(216,1731,2121,'Parent'),
(217,1741,2131,'Parent'),
(218,1751,2141,'Parent'),
(219,1761,2151,'Parent'),
(220,1771,2161,'Parent'),
(221,1781,2171,'Parent'),
(222,1791,2181,'Parent'),
(223,1801,2191,'Parent'),
(224,1811,2201,'Parent'),
(225,1821,2211,'Parent'),
(226,1831,2221,'Parent'),
(227,1841,2231,'Parent'),
(228,1851,2241,'Parent'),
(229,1861,2251,'Parent'),
(230,1871,2261,'Parent'),
(231,1881,2271,'Parent'),
(232,1891,2281,'Parent'),
(233,1901,2291,'Parent'),
(234,1911,2301,'Parent'),
(235,1921,2311,'Parent'),
(236,1931,2321,'Parent'),
(237,1941,2331,'Parent'),
(238,1951,2341,'Parent'),
(239,1961,2351,'Parent'),
(240,1971,2361,'Parent'),
(241,1981,2371,'Parent'),
(242,1991,2381,'Parent'),
(243,2001,2391,'Parent'),
(244,2011,2401,'Parent'),
(245,2021,2411,'Parent'),
(246,2031,2421,'Parent'),
(247,2041,2431,'Parent'),
(248,2051,2441,'Parent'),
(249,1261,2451,'Guardian'),
(250,3291,2461,'Parent'),
(251,2061,2471,'Parent'),
(252,2071,2481,'Parent'),
(253,2081,2491,'Parent'),
(254,2091,2501,'Parent'),
(255,2101,2511,'Parent'),
(256,2111,2521,'Parent'),
(257,2121,2531,'Parent'),
(258,2131,2541,'Parent'),
(259,2141,2551,'Parent'),
(260,2151,2561,'Parent'),
(261,2161,2571,'Parent'),
(262,2171,2581,'Parent'),
(263,2181,2591,'Parent'),
(264,2191,2601,'Parent'),
(265,2201,2611,'Parent'),
(266,2211,2621,'Parent'),
(267,2221,2631,'Parent'),
(268,2231,2641,'Parent'),
(269,2241,2651,'Parent'),
(270,2251,2661,'Parent'),
(271,2261,2671,'Parent'),
(272,2271,2681,'Parent'),
(273,2281,2691,'Parent'),
(274,2291,2701,'Parent'),
(275,2301,2711,'Parent'),
(276,2311,2721,'Parent'),
(277,2321,2731,'Parent'),
(278,2331,2741,'Parent'),
(280,2351,2761,'Parent'),
(281,2361,2771,'Parent'),
(282,2371,2781,'Parent'),
(283,2381,2791,'Parent'),
(284,2391,2801,'Parent'),
(285,2401,2811,'Parent'),
(286,2411,2821,'Parent'),
(287,2421,2831,'Parent'),
(288,2431,2841,'Parent'),
(289,2441,2851,'Parent'),
(290,2451,2861,'Parent'),
(293,2481,2891,'Parent'),
(294,2491,2901,'Parent'),
(295,2501,2911,'Parent'),
(296,2511,2921,'Parent'),
(297,2521,2931,'Parent'),
(298,2531,2941,'Parent'),
(299,2541,2951,'Parent'),
(300,2551,2961,'Parent'),
(301,2561,2971,'Parent'),
(302,2571,2981,'Parent'),
(303,2581,2991,'Parent'),
(304,2591,3001,'Parent'),
(305,2601,3011,'Parent'),
(306,2611,3021,'Parent'),
(308,2631,3041,'Parent'),
(309,2641,3051,'Parent'),
(310,2651,3061,'Parent'),
(311,2661,3071,'Parent'),
(312,2671,3081,'Parent'),
(313,2681,3091,'Parent'),
(314,2691,3101,'Guardian'),
(315,2701,3111,'Parent'),
(316,2711,3121,'Parent'),
(317,2721,3131,'Parent'),
(318,2731,3141,'Parent'),
(319,2741,3151,'Parent'),
(320,2751,3161,'Parent'),
(321,2761,3171,'Parent'),
(322,2771,3181,'Parent'),
(323,2781,3191,'Parent'),
(324,2791,3201,'Parent'),
(325,2801,3211,'Paren'),
(326,2811,3221,'Parent'),
(327,2821,3231,'Paren'),
(328,2831,3241,'Parent'),
(329,2841,3251,'Parent'),
(330,2851,3261,'Parent'),
(331,2861,3271,'Parent'),
(332,2871,3281,'Parent'),
(333,2881,3291,'Parent'),
(334,2891,3301,'Parent'),
(335,2901,3311,'Parent'),
(336,2911,3321,'Parent'),
(337,2921,3331,'Parent'),
(338,2931,3341,'Parent'),
(339,2941,3351,'Parent'),
(340,2951,3361,'Parent'),
(341,2961,3371,'Parent'),
(342,2971,3381,'Parent'),
(343,2981,3391,'Parent'),
(344,2991,3401,'Parent'),
(345,3001,3411,'Parent'),
(346,3011,3421,'Parent'),
(347,3021,3431,'Parent'),
(348,3031,3441,'Parent'),
(349,3321,3451,'Parent'),
(350,3331,3461,'Parent'),
(351,3341,3471,'Parent'),
(352,3351,3481,'Parent'),
(353,3361,3491,'Parent'),
(354,3371,3501,'Parent'),
(355,3381,3511,'Parent'),
(356,3391,3521,'Parent'),
(357,3401,3531,'Parent'),
(358,3411,3541,'Parent'),
(359,3421,3551,'Guardian'),
(360,3431,3561,'Parent'),
(361,3441,3571,'Parent'),
(362,3451,3581,'Guardian'),
(363,3461,3591,'Son'),
(364,3471,3601,'Son'),
(365,3481,3611,'Son'),
(366,3491,3621,'Son'),
(367,3501,3631,'Son'),
(368,3511,3641,'Guardian'),
(369,3521,3651,'Son'),
(370,3531,3661,'Son'),
(371,3541,3671,'Daughter'),
(372,3551,3681,'Son'),
(373,3561,3691,'Daughter'),
(374,3571,3701,'Son'),
(375,3581,3711,'Son'),
(376,3591,3721,'Daughter'),
(377,3601,3731,'Son'),
(378,3611,3741,'Son'),
(379,3621,3751,'Daughter'),
(380,3631,3761,'Daughter'),
(381,3641,3771,'Son'),
(382,3651,3781,'Daughter'),
(383,3661,3791,'Daughter'),
(384,3671,3801,'Son'),
(385,3681,3811,'Daughter'),
(386,3691,3821,'Daughter'),
(387,3701,3831,'Son'),
(388,3711,3841,'Son'),
(389,4091,3851,'Son'),
(390,3731,3861,'Son'),
(391,3741,3871,'Daughter'),
(392,3751,3881,'Son'),
(393,3761,3891,'Son'),
(394,3771,3901,'Son'),
(395,3781,3911,'Son'),
(396,3791,3921,'Daughter'),
(397,3801,3931,'Daughter'),
(398,3811,3941,'Son'),
(399,3821,3951,'Son'),
(400,3831,3961,'Son'),
(401,3841,3971,'Son'),
(402,3851,3981,'Son'),
(403,3861,3991,'Son'),
(404,3871,4001,'Son'),
(405,3881,4011,'Son'),
(406,3891,4021,'Daughter'),
(407,3901,4031,'Son'),
(408,3911,4041,'Son'),
(409,3921,4051,'Son'),
(410,3931,4061,'Son'),
(411,3941,4071,'Son'),
(412,3951,4081,'Daughter'),
(413,3961,4091,'Son'),
(414,3971,4101,'Son'),
(415,3981,4111,'Son'),
(416,3991,4121,'Daughter'),
(417,4001,4131,'Son'),
(418,4011,4141,'Son'),
(419,4021,4151,'Son'),
(420,4031,4161,'Daughter'),
(421,4041,4171,'Son'),
(422,4051,4181,'Son'),
(423,4061,4191,'Son'),
(424,4071,4201,'Daughter'),
(425,4081,4211,'Daughter'),
(426,4101,4221,'Son'),
(427,4111,4231,'Son'),
(428,4121,4241,'Son'),
(429,4131,4251,'Son'),
(430,4141,4261,'Son'),
(431,4151,4271,'Daughter'),
(432,4161,4281,'Daughter');

/*Table structure for table `payment_method` */

DROP TABLE IF EXISTS `payment_method`;

CREATE TABLE `payment_method` (
  `payment_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `payment_method` */

insert  into `payment_method`(`payment_id`,`name`) values 
(1,'Cash'),
(2,'Cheque'),
(3,'Deposit Slip');

/*Table structure for table `payments` */

DROP TABLE IF EXISTS `payments`;

CREATE TABLE `payments` (
  `payment_id` int NOT NULL AUTO_INCREMENT,
  `date_paid` datetime DEFAULT NULL,
  `payment_mode` varchar(100) DEFAULT NULL,
  `added_by` int DEFAULT NULL,
  `charge_id` int DEFAULT NULL,
  `amount_paid` int DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8;

/*Data for the table `payments` */

insert  into `payments`(`payment_id`,`date_paid`,`payment_mode`,`added_by`,`charge_id`,`amount_paid`) values 
(27,'2021-10-05 09:14:28','',1,2,8000),
(28,'2021-10-05 09:14:36','',1,3,10000),
(29,'2021-10-05 09:14:47','',1,4,15500),
(34,'2021-10-05 11:32:35',NULL,1,2,4),
(35,'2021-10-05 11:32:35',NULL,1,3,0),
(36,'2021-10-05 11:32:35',NULL,1,4,0),
(37,'2021-10-05 11:32:35',NULL,1,5,0),
(38,'2021-10-05 11:32:35',NULL,1,6,0),
(39,'2021-10-05 11:32:35',NULL,1,8,0),
(40,'2021-10-05 11:32:35',NULL,1,9,0),
(41,'2021-10-05 11:32:35',NULL,1,10,0),
(42,'2021-10-05 11:32:35',NULL,1,11,0),
(43,'2021-10-05 11:32:35',NULL,1,12,0),
(44,'2021-10-05 11:32:35',NULL,1,13,0),
(45,'2021-10-05 11:32:35',NULL,1,14,0),
(46,'2021-10-05 11:32:35',NULL,1,15,0),
(47,'2021-10-05 11:32:35',NULL,1,16,0),
(48,'2021-10-05 11:32:35',NULL,1,17,0),
(49,'2021-10-05 11:32:35',NULL,1,18,0),
(50,'2021-10-05 11:32:35',NULL,1,19,0),
(51,'2021-10-05 11:32:35',NULL,1,20,0),
(52,'2021-10-05 11:32:35',NULL,1,21,0),
(53,'2021-10-05 11:32:35',NULL,1,22,0),
(54,'2021-10-05 11:32:35',NULL,1,23,0),
(55,'2021-10-05 11:32:35',NULL,1,24,0),
(56,'2021-10-05 11:32:35',NULL,1,25,0),
(57,'2021-10-05 11:32:35',NULL,1,26,0),
(58,'2021-10-05 11:32:35',NULL,1,27,0),
(59,'2021-10-05 11:32:35',NULL,1,28,0),
(60,'2021-10-05 11:32:35',NULL,1,29,0),
(61,'2021-10-05 11:32:35',NULL,1,30,0),
(62,'2021-10-05 11:32:35',NULL,1,31,0),
(63,'2021-10-05 11:32:35',NULL,1,32,0),
(64,'2021-10-05 11:33:29',NULL,1,2,11996),
(65,'2021-10-05 11:33:29',NULL,1,3,10000),
(66,'2021-10-05 11:33:29',NULL,1,4,4500),
(67,'2021-10-05 11:33:29',NULL,1,5,20000),
(68,'2021-10-05 11:33:29',NULL,1,6,20000),
(69,'2021-10-05 11:33:29',NULL,1,8,20000),
(70,'2021-10-05 11:33:29',NULL,1,9,20000),
(71,'2021-10-05 11:33:29',NULL,1,10,20000),
(72,'2021-10-05 11:33:29',NULL,1,11,20000),
(73,'2021-10-05 11:33:29',NULL,1,12,20000),
(74,'2021-10-05 11:33:29',NULL,1,13,20000),
(75,'2021-10-05 11:33:29',NULL,1,14,20000),
(76,'2021-10-05 11:33:29',NULL,1,15,20000),
(77,'2021-10-05 11:33:29',NULL,1,16,20000),
(78,'2021-10-05 11:33:29',NULL,1,17,40000),
(79,'2021-10-05 11:33:29',NULL,1,18,40000),
(80,'2021-10-05 11:33:29',NULL,1,19,40000),
(81,'2021-10-05 11:33:29',NULL,1,20,40000),
(82,'2021-10-05 11:33:29',NULL,1,21,40000),
(83,'2021-10-05 11:33:29',NULL,1,22,40000),
(84,'2021-10-05 11:33:29',NULL,1,23,40000),
(85,'2021-10-05 11:33:29',NULL,1,24,40000),
(86,'2021-10-05 11:33:29',NULL,1,25,40000),
(87,'2021-10-05 11:33:29',NULL,1,26,40000),
(88,'2021-10-05 11:33:29',NULL,1,27,40000),
(89,'2021-10-05 11:33:29',NULL,1,28,40000),
(90,'2021-10-05 11:33:29',NULL,1,29,40000),
(91,'2021-10-05 11:33:29',NULL,1,30,40000),
(92,'2021-10-05 11:33:29',NULL,1,31,40000),
(93,'2021-10-05 11:33:29',NULL,1,32,40000);

/*Table structure for table `responsibilities` */

DROP TABLE IF EXISTS `responsibilities`;

CREATE TABLE `responsibilities` (
  `responsibility_id` int NOT NULL AUTO_INCREMENT,
  `responsibility` varchar(200) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `academic_year_id` int DEFAULT NULL,
  `date_assigned` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  `description` text,
  PRIMARY KEY (`responsibility_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `responsibilities` */

insert  into `responsibilities`(`responsibility_id`,`responsibility`,`user_id`,`academic_year_id`,`date_assigned`,`deleted`,`description`) values 
(1,'Sports Prefect',11,NULL,'2020-12-24',0,'	Sports																														'),
(12,'Lab tech',31,3,'2020-12-26',0,'	lab tech																														'),
(13,NULL,21,3,NULL,0,NULL);

/*Table structure for table `rights` */

DROP TABLE IF EXISTS `rights`;

CREATE TABLE `rights` (
  `sms_id` int NOT NULL AUTO_INCREMENT,
  `sms_body` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `sender` year DEFAULT NULL,
  `receiver` varchar(100) DEFAULT NULL,
  `date_sent` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`sms_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `rights` */

insert  into `rights`(`sms_id`,`sms_body`,`sender`,`receiver`,`date_sent`) values 
(1,'adm',2001,'1',1),
(2,'adm',2012,'1',1),
(3,'teacher',2001,'0',0),
(4,'teacher',2002,'0',0);

/*Table structure for table `scholarship_types` */

DROP TABLE IF EXISTS `scholarship_types`;

CREATE TABLE `scholarship_types` (
  `scholarship_type_id` int NOT NULL AUTO_INCREMENT,
  `scholarship_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `description` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`scholarship_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

/*Data for the table `scholarship_types` */

insert  into `scholarship_types`(`scholarship_type_id`,`scholarship_type`,`description`,`deleted`) values 
(1,'AAMA','AAMA																															',0),
(2,'12','',1),
(12,'32','Form 3',1),
(22,'22','',1),
(32,'42','',1),
(33,'UNICEF','UNICEF',0),
(34,'MAJETE','MEJETE',0);

/*Table structure for table `sections` */

DROP TABLE IF EXISTS `sections`;

CREATE TABLE `sections` (
  `section_id` int NOT NULL AUTO_INCREMENT,
  `section` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `sections` */

insert  into `sections`(`section_id`,`section`,`deleted`) values 
(1,'A',0),
(2,'B',0);

/*Table structure for table `settings` */

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `app` varchar(100) DEFAULT NULL,
  `school` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `sending_phone` varchar(100) DEFAULT NULL,
  `head_sign` varchar(100) DEFAULT NULL,
  `motto` varchar(200) DEFAULT NULL,
  `sending_email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `settings` */

insert  into `settings`(`id`,`app`,`school`,`phone`,`email`,`address`,`sending_phone`,`head_sign`,`motto`,`sending_email`) values 
(1,'Focxulz','Chapananga Secondary School',NULL,NULL,'Private Bag 1,Chikhwawa,\r\nBantyre.','0888015904',NULL,NULL,'info@focxuls.com');

/*Table structure for table `sms` */

DROP TABLE IF EXISTS `sms`;

CREATE TABLE `sms` (
  `sms_id` int NOT NULL AUTO_INCREMENT,
  `sms_body` varchar(100) DEFAULT NULL,
  `receiver` int DEFAULT NULL,
  `date_sent` datetime DEFAULT NULL,
  `sending_phone` varchar(100) DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  `receiver_phone` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`sms_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `sms` */

insert  into `sms`(`sms_id`,`sms_body`,`receiver`,`date_sent`,`sending_phone`,`deleted`,`receiver_phone`) values 
(1,'ok man am gud																															',131,'2020-12-31 04:12:49','0888015904',0,''),
(2,'ok man am gud																															',141,'2020-12-31 04:12:49','0888015904',0,''),
(3,'ok man am gud																															',151,'2020-12-31 04:12:49','0888015904',0,''),
(4,'ok man am gud																															',161,'2020-12-31 04:12:49','0888015904',0,''),
(5,'ok man am gud																															',171,'2020-12-31 04:12:49','0888015904',0,''),
(6,'ok man am gud																															',181,'2020-12-31 04:12:49','0888015904',0,''),
(7,'ok man am gud																															',191,'2020-12-31 04:12:49','0888015904',0,''),
(8,'ok man am gud																															',201,'2020-12-31 04:12:49','0888015904',0,''),
(9,'ok man am gud																															',211,'2020-12-31 04:12:49','0888015904',0,''),
(10,'ok man am gud																															',221,'2020-12-31 04:12:49','0888015904',0,'');

/*Table structure for table `staff_types` */

DROP TABLE IF EXISTS `staff_types`;

CREATE TABLE `staff_types` (
  `staff_type_id` int NOT NULL AUTO_INCREMENT,
  `staff_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`staff_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `staff_types` */

insert  into `staff_types`(`staff_type_id`,`staff_type`,`deleted`) values 
(1,'Temporary',0),
(2,'Permanent',0);

/*Table structure for table `student_bank` */

DROP TABLE IF EXISTS `student_bank`;

CREATE TABLE `student_bank` (
  `sb_id` int NOT NULL,
  `student_id` int DEFAULT NULL,
  `transaction_type` int DEFAULT NULL,
  `debit` decimal(11,2) NOT NULL DEFAULT '0.00',
  `credit` decimal(11,2) NOT NULL DEFAULT '0.00',
  `remarks` longtext,
  `date_created` datetime DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `ldm` datetime DEFAULT NULL,
  `luid` int DEFAULT NULL,
  `term_id` int DEFAULT NULL,
  `cs_id` int DEFAULT NULL,
  PRIMARY KEY (`sb_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `student_bank` */

/*Table structure for table `student_hostels` */

DROP TABLE IF EXISTS `student_hostels`;

CREATE TABLE `student_hostels` (
  `user_id` int NOT NULL,
  `hostel_id` int NOT NULL,
  `academic_year_id` int NOT NULL,
  `date_assigned` datetime DEFAULT NULL,
  `assigned_by` int DEFAULT NULL,
  PRIMARY KEY (`user_id`,`hostel_id`,`academic_year_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `student_hostels` */

insert  into `student_hostels`(`user_id`,`hostel_id`,`academic_year_id`,`date_assigned`,`assigned_by`) values 
(2,1,3,'2021-09-29 11:29:54',21),
(31,1,3,'2021-09-29 11:29:54',21),
(41,1,3,'2021-09-29 11:29:54',21),
(51,3,3,'2021-09-29 11:29:54',21),
(61,2,3,'2021-09-29 11:29:54',21),
(81,3,3,'2021-09-29 11:29:54',21),
(91,2,3,'2021-09-29 11:29:54',21),
(101,1,3,'2021-09-29 11:29:54',21),
(111,1,3,'2021-09-29 11:29:54',21),
(121,2,3,'2021-09-29 11:29:54',21),
(271,3,3,'2021-09-29 11:29:54',21),
(281,1,3,'2021-09-29 11:29:54',21),
(291,1,3,'2021-09-29 11:29:54',21),
(301,3,3,'2021-09-29 11:29:54',21),
(311,3,3,'2021-09-29 11:29:54',21),
(321,1,3,'2021-09-29 11:29:54',21),
(331,3,3,'2021-09-29 11:29:54',21),
(341,3,3,'2021-09-29 11:29:54',21),
(351,3,3,'2021-09-29 11:29:54',21),
(361,3,3,'2021-09-29 11:29:54',21),
(371,1,3,'2021-09-29 11:29:54',21),
(381,3,3,'2021-09-29 11:29:54',21),
(391,3,3,'2021-09-29 11:29:54',21),
(401,2,3,'2021-09-29 11:29:54',21),
(411,1,3,'2021-09-29 11:29:54',21),
(421,2,3,'2021-09-29 11:29:54',21),
(431,1,3,'2021-09-29 11:29:54',21),
(441,3,3,'2021-09-29 11:29:54',21),
(451,2,3,'2021-09-29 11:29:54',21),
(461,1,3,'2021-09-29 11:29:54',21),
(471,1,3,'2021-09-29 11:29:54',21),
(481,2,3,'2021-09-29 11:29:54',21),
(491,2,3,'2021-09-29 11:29:54',21),
(501,2,3,'2021-09-29 11:29:54',21),
(511,2,3,'2021-09-29 11:29:54',21),
(521,3,3,'2021-09-29 11:29:54',21),
(531,3,3,'2021-09-29 11:29:54',21),
(541,3,3,'2021-09-29 11:29:54',21),
(551,2,3,'2021-09-29 11:29:54',21),
(561,3,3,'2021-09-29 11:29:54',21),
(571,1,3,'2021-09-29 11:29:54',21),
(581,3,3,'2021-09-29 11:29:54',21),
(591,2,3,'2021-09-29 11:29:54',21),
(601,1,3,'2021-09-29 11:29:54',21),
(611,3,3,'2021-09-29 11:29:54',21),
(621,3,3,'2021-09-29 11:29:54',21),
(631,3,3,'2021-09-29 11:29:54',21),
(641,3,3,'2021-09-29 11:29:54',21),
(651,1,3,'2021-09-29 11:29:54',21),
(671,2,3,'2021-09-29 11:29:54',21),
(681,2,3,'2021-09-29 11:29:54',21),
(691,1,3,'2021-09-29 11:29:54',21),
(701,2,3,'2021-09-29 11:29:54',21),
(711,2,3,'2021-09-29 11:29:54',21),
(721,3,3,'2021-09-29 11:29:54',21),
(731,2,3,'2021-09-29 11:29:54',21),
(751,2,3,'2021-09-29 11:29:54',21),
(761,3,3,'2021-09-29 11:29:54',21),
(771,2,3,'2021-09-29 11:29:54',21),
(781,2,3,'2021-09-29 11:29:54',21),
(791,3,3,'2021-09-29 11:29:54',21),
(801,2,3,'2021-09-29 11:29:54',21),
(811,2,3,'2021-09-29 11:29:54',21),
(821,2,3,'2021-09-29 11:29:54',21),
(831,3,3,'2021-09-29 11:29:54',21),
(841,2,3,'2021-09-29 11:29:54',21),
(851,2,3,'2021-09-29 11:29:54',21),
(861,3,3,'2021-09-29 11:29:54',21),
(871,3,3,'2021-09-29 11:29:54',21),
(881,3,3,'2021-09-29 11:29:54',21),
(891,2,3,'2021-09-29 11:29:54',21),
(901,1,3,'2021-09-29 11:29:54',21),
(911,2,3,'2021-09-29 11:29:54',21),
(921,2,3,'2021-09-29 11:29:54',21),
(931,3,3,'2021-09-29 11:29:54',21),
(941,2,3,'2021-09-29 11:29:54',21),
(951,1,3,'2021-09-29 11:29:54',21),
(961,1,3,'2021-09-29 11:29:54',21),
(971,2,3,'2021-09-29 11:29:54',21),
(981,2,3,'2021-09-29 11:29:54',21),
(991,3,3,'2021-09-29 11:29:54',21),
(1001,3,3,'2021-09-29 11:29:54',21),
(1011,3,3,'2021-09-29 11:29:54',21),
(1021,1,3,'2021-09-29 11:29:54',21),
(1031,1,3,'2021-09-29 11:29:54',21),
(1041,3,3,'2021-09-29 11:29:54',21),
(1051,2,3,'2021-09-29 11:29:54',21),
(1061,2,3,'2021-09-29 11:29:54',21),
(1071,1,3,'2021-09-29 11:29:54',21),
(1091,3,3,'2021-09-29 11:29:54',21),
(1101,2,3,'2021-09-29 11:29:54',21),
(1111,3,3,'2021-09-29 11:29:54',21),
(1121,1,3,'2021-09-29 11:29:54',21),
(1131,3,3,'2021-09-29 11:29:54',21),
(1141,2,3,'2021-09-29 11:29:54',21),
(1161,2,3,'2021-09-29 11:29:54',21),
(1171,1,3,'2021-09-29 11:29:54',21),
(1191,2,3,'2021-09-29 11:29:54',21),
(1201,1,3,'2021-09-29 11:29:54',21),
(1211,3,3,'2021-09-29 11:29:54',21),
(1221,1,3,'2021-09-29 11:29:54',21),
(1231,2,3,'2021-09-29 11:29:54',21),
(1241,2,3,'2021-09-29 11:29:54',21),
(1251,2,3,'2021-09-29 11:29:54',21),
(1261,1,3,'2021-09-29 11:29:54',21),
(1271,3,3,'2021-09-29 11:29:54',21),
(1281,2,3,'2021-09-29 11:29:54',21),
(1291,1,3,'2021-09-29 11:29:54',21),
(1301,3,3,'2021-09-29 11:29:54',21),
(1311,2,3,'2021-09-29 11:29:54',21),
(1321,3,3,'2021-09-29 11:29:54',21),
(1341,1,3,'2021-09-29 11:29:54',21),
(1351,1,3,'2021-09-29 11:29:54',21),
(1361,1,3,'2021-09-29 11:29:54',21),
(1371,3,3,'2021-09-29 11:29:54',21),
(1381,3,3,'2021-09-29 11:29:54',21),
(1391,3,3,'2021-09-29 11:29:54',21),
(1401,2,3,'2021-09-29 11:29:54',21),
(1411,1,3,'2021-09-29 11:29:54',21),
(1421,2,3,'2021-09-29 11:29:54',21),
(1431,3,3,'2021-09-29 11:29:54',21),
(1441,2,3,'2021-09-29 11:29:54',21),
(1461,1,3,'2021-09-29 11:29:54',21),
(1471,1,3,'2021-09-29 11:29:54',21),
(1481,3,3,'2021-09-29 11:29:54',21),
(1491,2,3,'2021-09-29 11:29:54',21),
(1501,3,3,'2021-09-29 11:29:54',21),
(1511,3,3,'2021-09-29 11:29:54',21),
(1521,3,3,'2021-09-29 11:29:54',21),
(1531,1,3,'2021-09-29 11:29:54',21),
(1541,1,3,'2021-09-29 11:29:54',21),
(1551,2,3,'2021-09-29 11:29:54',21),
(1561,2,3,'2021-09-29 11:29:54',21),
(1571,1,3,'2021-09-29 11:29:54',21),
(1581,2,3,'2021-09-29 11:29:54',21),
(1591,2,3,'2021-09-29 11:29:54',21),
(1601,3,3,'2021-09-29 11:29:54',21),
(1611,1,3,'2021-09-29 11:29:54',21),
(1621,2,3,'2021-09-29 11:29:54',21),
(1631,3,3,'2021-09-29 11:29:54',21),
(1641,3,3,'2021-09-29 11:29:54',21),
(1651,1,3,'2021-09-29 11:29:54',21),
(1661,2,3,'2021-09-29 11:29:54',21),
(1671,3,3,'2021-09-29 11:29:54',21),
(1681,1,3,'2021-09-29 11:29:54',21),
(1691,3,3,'2021-09-29 11:29:54',21),
(1701,1,3,'2021-09-29 11:29:54',21),
(1711,2,3,'2021-09-29 11:29:54',21),
(1721,2,3,'2021-09-29 11:29:54',21),
(1731,3,3,'2021-09-29 11:29:54',21),
(1741,1,3,'2021-09-29 11:29:54',21),
(1751,2,3,'2021-09-29 11:29:54',21),
(1761,2,3,'2021-09-29 11:29:54',21),
(1771,1,3,'2021-09-29 11:29:54',21),
(1781,1,3,'2021-09-29 11:29:54',21),
(1791,1,3,'2021-09-29 11:29:54',21),
(1801,1,3,'2021-09-29 11:29:54',21),
(1811,2,3,'2021-09-29 11:29:54',21),
(1821,1,3,'2021-09-29 11:29:54',21),
(1851,1,3,'2021-09-29 11:29:54',21),
(1861,2,3,'2021-09-29 11:29:54',21),
(1871,3,3,'2021-09-29 11:29:54',21),
(1881,2,3,'2021-09-29 11:29:54',21),
(1891,2,3,'2021-09-29 11:29:54',21),
(1901,1,3,'2021-09-29 11:29:54',21),
(1911,2,3,'2021-09-29 11:29:54',21),
(1921,1,3,'2021-09-29 11:29:54',21),
(1931,1,3,'2021-09-29 11:29:54',21),
(1941,2,3,'2021-09-29 11:29:54',21),
(1951,1,3,'2021-09-29 11:29:54',21),
(1961,1,3,'2021-09-29 11:29:54',21),
(1971,1,3,'2021-09-29 11:29:54',21),
(1981,1,3,'2021-09-29 11:29:54',21),
(1991,1,3,'2021-09-29 11:29:54',21),
(2001,3,3,'2021-09-29 11:29:54',21),
(2011,1,3,'2021-09-29 11:29:54',21),
(2021,1,3,'2021-09-29 11:29:54',21),
(2031,3,3,'2021-09-29 11:29:54',21),
(2041,1,3,'2021-09-29 11:29:54',21),
(2051,2,3,'2021-09-29 11:29:54',21),
(2061,1,3,'2021-09-29 11:29:54',21),
(2071,3,3,'2021-09-29 11:29:54',21),
(2091,2,3,'2021-09-29 11:29:54',21),
(2101,2,3,'2021-09-29 11:29:54',21),
(2111,1,3,'2021-09-29 11:29:54',21),
(2121,2,3,'2021-09-29 11:29:54',21),
(2131,3,3,'2021-09-29 11:29:54',21),
(2141,2,3,'2021-09-29 11:29:54',21),
(2151,3,3,'2021-09-29 11:29:54',21),
(2161,1,3,'2021-09-29 11:29:54',21),
(2171,2,3,'2021-09-29 11:29:54',21),
(2181,1,3,'2021-09-29 11:29:54',21),
(2191,1,3,'2021-09-29 11:29:54',21),
(2201,2,3,'2021-09-29 11:29:54',21),
(2211,1,3,'2021-09-29 11:29:54',21),
(2221,3,3,'2021-09-29 11:29:54',21),
(2231,2,3,'2021-09-29 11:29:54',21),
(2251,2,3,'2021-09-29 11:29:54',21),
(2261,2,3,'2021-09-29 11:29:54',21),
(2271,3,3,'2021-09-29 11:29:54',21),
(2281,2,3,'2021-09-29 11:29:54',21),
(2291,1,3,'2021-09-29 11:29:54',21),
(2301,2,3,'2021-09-29 11:29:54',21),
(2311,2,3,'2021-09-29 11:29:54',21),
(2321,3,3,'2021-09-29 11:29:54',21),
(2331,1,3,'2021-09-29 11:29:54',21),
(2341,3,3,'2021-09-29 11:29:54',21),
(2351,3,3,'2021-09-29 11:29:54',21),
(2361,1,3,'2021-09-29 11:29:54',21),
(2371,2,3,'2021-09-29 11:29:54',21),
(2381,3,3,'2021-09-29 11:29:54',21),
(2391,3,3,'2021-09-29 11:29:54',21),
(2401,2,3,'2021-09-29 11:29:54',21),
(2411,1,3,'2021-09-29 11:29:54',21),
(2421,2,3,'2021-09-29 11:29:54',21),
(2431,3,3,'2021-09-29 11:29:54',21),
(2441,3,3,'2021-09-29 11:29:54',21),
(2451,3,3,'2021-09-29 11:29:54',21),
(2461,2,3,'2021-09-29 11:29:54',21),
(2471,3,3,'2021-09-29 11:29:54',21),
(2481,1,3,'2021-09-29 11:29:54',21),
(2491,2,3,'2021-09-29 11:29:54',21),
(2501,1,3,'2021-09-29 11:29:54',21),
(2511,2,3,'2021-09-29 11:29:54',21),
(2521,2,3,'2021-09-29 11:29:54',21),
(2531,3,3,'2021-09-29 11:29:54',21),
(2541,3,3,'2021-09-29 11:29:54',21),
(2551,1,3,'2021-09-29 11:29:55',21),
(2561,1,3,'2021-09-29 11:29:55',21),
(2571,1,3,'2021-09-29 11:29:55',21),
(2581,2,3,'2021-09-29 11:29:55',21),
(2591,2,3,'2021-09-29 11:29:55',21),
(2601,3,3,'2021-09-29 11:29:55',21),
(2611,1,3,'2021-09-29 11:29:55',21),
(2621,1,3,'2021-09-29 11:29:55',21),
(2631,1,3,'2021-09-29 11:29:55',21),
(2641,1,3,'2021-09-29 11:29:55',21),
(2661,1,3,'2021-09-29 11:29:55',21),
(2671,1,3,'2021-09-29 11:29:55',21),
(2681,1,3,'2021-09-29 11:29:55',21),
(2691,3,3,'2021-09-29 11:29:55',21),
(2701,3,3,'2021-09-29 11:29:55',21),
(2711,1,3,'2021-09-29 11:29:55',21),
(2721,3,3,'2021-09-29 11:29:55',21),
(2731,1,3,'2021-09-29 11:29:55',21),
(2741,3,3,'2021-09-29 11:29:55',21),
(2761,2,3,'2021-09-29 11:29:55',21),
(2771,2,3,'2021-09-29 11:29:55',21),
(2781,1,3,'2021-09-29 11:29:55',21),
(2791,3,3,'2021-09-29 11:29:55',21),
(2801,3,3,'2021-09-29 11:29:55',21),
(2811,1,3,'2021-09-29 11:29:55',21),
(2821,2,3,'2021-09-29 11:29:55',21),
(2831,3,3,'2021-09-29 11:29:55',21),
(2841,3,3,'2021-09-29 11:29:55',21),
(2851,1,3,'2021-09-29 11:29:55',21),
(2861,2,3,'2021-09-29 11:29:55',21),
(2891,3,3,'2021-09-29 11:29:55',21),
(2901,3,3,'2021-09-29 11:29:55',21),
(2911,1,3,'2021-09-29 11:29:55',21),
(2921,2,3,'2021-09-29 11:29:55',21),
(2931,3,3,'2021-09-29 11:29:55',21),
(2941,2,3,'2021-09-29 11:29:55',21),
(2951,2,3,'2021-09-29 11:29:55',21),
(2961,1,3,'2021-09-29 11:29:55',21),
(2971,2,3,'2021-09-29 11:29:55',21),
(2981,3,3,'2021-09-29 11:29:55',21),
(2991,2,3,'2021-09-29 11:29:55',21),
(3001,1,3,'2021-09-29 11:29:55',21),
(3011,1,3,'2021-09-29 11:29:55',21),
(3021,1,3,'2021-09-29 11:29:55',21),
(3041,3,3,'2021-09-29 11:29:55',21),
(3051,1,3,'2021-09-29 11:29:55',21),
(3061,3,3,'2021-09-29 11:29:55',21),
(3071,1,3,'2021-09-29 11:29:55',21),
(3081,1,3,'2021-09-29 11:29:55',21),
(3091,3,3,'2021-09-29 11:29:55',21),
(3101,1,3,'2021-09-29 11:29:55',21),
(3111,2,3,'2021-09-29 11:29:55',21),
(3121,2,3,'2021-09-29 11:29:55',21),
(3131,2,3,'2021-09-29 11:29:55',21),
(3141,2,3,'2021-09-29 11:29:55',21),
(3151,1,3,'2021-09-29 11:29:55',21),
(3161,1,3,'2021-09-29 11:29:55',21),
(3171,1,3,'2021-09-29 11:29:55',21),
(3181,1,3,'2021-09-29 11:29:55',21),
(3191,3,3,'2021-09-29 11:29:55',21),
(3201,2,3,'2021-09-29 11:29:55',21),
(3211,2,3,'2021-09-29 11:29:55',21),
(3221,3,3,'2021-09-29 11:29:55',21),
(3231,3,3,'2021-09-29 11:29:55',21),
(3241,3,3,'2021-09-29 11:29:55',21),
(3251,3,3,'2021-09-29 11:29:55',21),
(3261,3,3,'2021-09-29 11:29:55',21),
(3271,3,3,'2021-09-29 11:29:55',21),
(3281,3,3,'2021-09-29 11:29:55',21),
(3291,3,3,'2021-09-29 11:29:55',21),
(3301,3,3,'2021-09-29 11:29:55',21);

/*Table structure for table `student_transfers` */

DROP TABLE IF EXISTS `student_transfers`;

CREATE TABLE `student_transfers` (
  `transfer_id` int NOT NULL AUTO_INCREMENT,
  `from_class` int DEFAULT NULL,
  `to_class` int DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `acadID` int DEFAULT NULL,
  PRIMARY KEY (`transfer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `student_transfers` */

/*Table structure for table `student_transport_list` */

DROP TABLE IF EXISTS `student_transport_list`;

CREATE TABLE `student_transport_list` (
  `student_transport_list_id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  PRIMARY KEY (`student_transport_list_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `student_transport_list` */

/*Table structure for table `students` */

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `student_id` int NOT NULL AUTO_INCREMENT,
  `cs_id` int DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `sex` varchar(1) DEFAULT NULL,
  `registration_no` int DEFAULT NULL,
  `admit_date` longtext,
  `email` longtext,
  `phone` longtext,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_swedish_ci DEFAULT NULL,
  `mode_of_study` int DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `students` */

/*Table structure for table `study_modes` */

DROP TABLE IF EXISTS `study_modes`;

CREATE TABLE `study_modes` (
  `study_mode_id` int NOT NULL AUTO_INCREMENT,
  `study_mode` varchar(50) DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`study_mode_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `study_modes` */

insert  into `study_modes`(`study_mode_id`,`study_mode`,`deleted`) values 
(1,'Day',0),
(2,'Border',0),
(3,'Open',0);

/*Table structure for table `subjects` */

DROP TABLE IF EXISTS `subjects`;

CREATE TABLE `subjects` (
  `subject_id` int NOT NULL AUTO_INCREMENT,
  `subject` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(20) DEFAULT NULL,
  `key_subject` int NOT NULL DEFAULT '0',
  `deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `subjects` */

insert  into `subjects`(`subject_id`,`subject`,`code`,`key_subject`,`deleted`) values 
(1,'Mathematics','MAT- 002',0,0),
(2,'English','ENG',1,0),
(3,'Bible Knowledge','BK',0,0),
(4,'Social Studies','SOC',0,0),
(5,'Chichewa','CHICH',0,0),
(6,'Geography','GEOG',0,0),
(7,'History','HIS',0,0),
(8,'Life Skills','LS',0,0),
(9,'Chemistry','CHEM',0,0),
(10,'Physics','PHI',0,0),
(11,'Computer Studies','COM',0,0);

/*Table structure for table `tbl_generator` */

DROP TABLE IF EXISTS `tbl_generator`;

CREATE TABLE `tbl_generator` (
  `tbl_name` varchar(20) DEFAULT NULL,
  `next_val` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_generator` */

insert  into `tbl_generator`(`tbl_name`,`next_val`) values 
('sync',12),
('standard_charges',12),
('22',12),
('academic_year',12),
('student',3592),
('parent',3462),
('admin',12),
('accounts',12),
('term',22),
('class',62),
('class_sub',42),
('student_account',12),
('student_bank',12),
('sync',12),
('standard_charges',12),
('22',12),
('academic_year',12),
('student',3592),
('parent',3462),
('admin',12),
('accounts',12),
('term',22),
('class',62),
('class_sub',42),
('student_account',12),
('student_bank',12),
('sync',12),
('standard_charges',12),
('22',12),
('academic_year',12),
('student',3592),
('parent',3462),
('admin',12),
('accounts',12),
('term',22),
('class',62),
('class_sub',42),
('student_account',12),
('student_bank',12);

/*Table structure for table `terms` */

DROP TABLE IF EXISTS `terms`;

CREATE TABLE `terms` (
  `term_id` int NOT NULL AUTO_INCREMENT,
  `term` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `starts` datetime DEFAULT NULL,
  `ends` datetime DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  `academic_year_id` int DEFAULT NULL,
  PRIMARY KEY (`term_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `terms` */

insert  into `terms`(`term_id`,`term`,`starts`,`ends`,`deleted`,`academic_year_id`) values 
(3,'Term II of 2020/2021','2021-08-30 00:00:00','2021-08-31 00:00:00',0,3);

/*Table structure for table `transfer_details` */

DROP TABLE IF EXISTS `transfer_details`;

CREATE TABLE `transfer_details` (
  `td_id` int NOT NULL AUTO_INCREMENT,
  `transfer_id` int DEFAULT NULL,
  `student_id` int DEFAULT NULL,
  PRIMARY KEY (`td_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `transfer_details` */

/*Table structure for table `transport` */

DROP TABLE IF EXISTS `transport`;

CREATE TABLE `transport` (
  `transport_id` int NOT NULL AUTO_INCREMENT,
  `route_name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `number_of_vehicle` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `route_fare` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`transport_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `transport` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `password` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `role` varchar(20) DEFAULT NULL,
  `gender` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `postal_address` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `physical_address` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `phone` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `nationality` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `added_by` int NOT NULL,
  `date_added` datetime DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  `reg_no` varchar(50) DEFAULT NULL,
  `dob` varchar(50) DEFAULT NULL,
  `allergies` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `photo` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `grade_level_id` int DEFAULT NULL,
  `academic_year_id` int DEFAULT NULL,
  `section_id` int DEFAULT NULL,
  `term_id` int DEFAULT NULL,
  `date_registered` datetime DEFAULT NULL,
  `department_id` int DEFAULT NULL,
  `staff_type_id` int DEFAULT NULL,
  `previous_school` varchar(200) DEFAULT NULL,
  `national_id` varchar(30) DEFAULT NULL,
  `study_mode_id` int DEFAULT NULL,
  `graduated` int NOT NULL DEFAULT '0',
  `date_graduated` datetime DEFAULT NULL,
  `disability` text,
  `generic` int NOT NULL DEFAULT '1',
  `orphan` int NOT NULL DEFAULT '0',
  `scholarship_type_id` int DEFAULT NULL,
  `child_id` int DEFAULT NULL,
  `relation` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `student_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6670 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`user_id`,`name`,`username`,`password`,`role`,`gender`,`postal_address`,`physical_address`,`phone`,`email`,`nationality`,`added_by`,`date_added`,`deleted`,`reg_no`,`dob`,`allergies`,`photo`,`grade_level_id`,`academic_year_id`,`section_id`,`term_id`,`date_registered`,`department_id`,`staff_type_id`,`previous_school`,`national_id`,`study_mode_id`,`graduated`,`date_graduated`,`disability`,`generic`,`orphan`,`scholarship_type_id`,`child_id`,`relation`) values 
(1,'Brian Nkhata','admin','admin','admin','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2,'Ruth','ruth','ruth','student','f','','',NULL,NULL,'Malawian',0,NULL,0,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(11,'Memory  Kagona','library','library','library','f','','',NULL,NULL,'Malawian',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(21,'JAYLOS','hostel','hostel','hostel','male','BOX 7,MABULABO','BOX 7,MABULABO',NULL,NULL,'Malawian',0,'2021-09-01 07:09:04',0,'5818','2021-09-09','					fffffffffffffffffff																										','logoBeat.jpeg',1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(31,'JAYLOS','briannkhata@gmail.com','61972f9d46e392ba0442bd87fc736596','student','female','Box 1,\r\nChikwawa','BOX 147,\r\nMabulabo',NULL,NULL,'Malawian',0,'2021-09-01 07:09:11',0,'1128','2021-09-05','																															','logoBeat.jpeg',1,2020,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,NULL,NULL,1,1,34,NULL,NULL),
(41,'JAYLOS','Briannkhata@gmail.com','61972f9d46e392ba0442bd87fc736596','student','fem','BOX 7,MABULABO','BOX 7,MABULABO',NULL,NULL,'Malawian',0,'2021-08-31 08:08:29',0,'1036',NULL,'ZOONA																															','logoBeat.jpeg',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,NULL,NULL,1,1,1,NULL,NULL),
(51,'Brian','briannkhata@gmail.com','c775ee295657e2630d423b3c4609dc41','student','','																																Blantyre																														','																																Blantyre																														',NULL,NULL,'Malawian',0,'2021-09-01 08:09:15',0,'9791','2021-08-31','																																							sdffffffffffffffffffffffff																																																						','logoBeat.jpeg',1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,NULL,NULL,1,1,NULL,NULL,NULL),
(61,'Brian','bnkhata@gmail.com','c775ee295657e2630d423b3c4609dc41','student','female','																																Blantyre																														','																																Mzimba																														',NULL,NULL,'Malawian',0,'2021-09-01 08:09:08',0,'7868','2021-09-01','																																					NONE																																																								',NULL,1,3,1,3,'2021-09-03 08:48:59',NULL,NULL,NULL,NULL,1,0,NULL,NULL,1,1,33,NULL,NULL),
(81,'Martha  Mdwazika','0D94C1D712C1EDAA5503122167A8ECF1','','student','f','','',NULL,NULL,'Malawian',0,NULL,0,NULL,NULL,NULL,NULL,2,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,NULL,NULL,1,1,NULL,NULL,NULL),
(91,'Chifundo  Adam','0D94C1D712C1EDAA5503122167A8ECF1','','student','f','','',NULL,NULL,'Malawian',0,NULL,0,NULL,NULL,NULL,NULL,2,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,NULL,NULL,1,1,NULL,NULL,NULL),
(101,'Wezi  Mkandawire','0D94C1D712C1EDAA5503122167A8ECF1','','student','f','','',NULL,NULL,'Malawian',0,NULL,0,NULL,NULL,NULL,NULL,2,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,NULL,NULL,1,1,NULL,NULL,NULL),
(111,'Timothy  Chifomboti','0D94C1D712C1EDAA5503122167A8ECF1','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,2,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,NULL,NULL,1,1,NULL,NULL,NULL),
(121,'Philmon  Mndeleman','0D94C1D712C1EDAA5503122167A8ECF1','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,2,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,NULL,NULL,1,1,NULL,NULL,NULL),
(131,'Yamikani  Kazunguza','briannkhata@gmail.com','61972f9d46e392ba0442bd87fc736596','parent','','																																																						ok																																					','																																ok2																																																													','0888015904','briannkhata@gmail.com','Malawi',0,NULL,0,NULL,NULL,NULL,NULL,2,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,NULL,NULL,1,1,NULL,91,'Son'),
(141,'Calorine  Chigaru','0D94C1D712C1EDAA5503122167A8ECF1','','parent','f','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,2,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,NULL,NULL,1,1,NULL,NULL,NULL),
(151,'Mutero  Albert','0D94C1D712C1EDAA5503122167A8ECF1','','parent','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,2,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,NULL,NULL,1,1,NULL,NULL,NULL),
(161,'Shephard  Lipenga','0D94C1D712C1EDAA5503122167A8ECF1','','parent','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,2,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,NULL,NULL,1,1,NULL,NULL,NULL),
(171,'Jamiah  George','0D94C1D712C1EDAA5503122167A8ECF1','','parent','f','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,2,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,NULL,NULL,1,1,NULL,NULL,NULL),
(181,'Wezzi  Mpeni','0D94C1D712C1EDAA5503122167A8ECF1','','parent','f','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,2,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,NULL,NULL,1,1,NULL,NULL,NULL),
(191,'Titani Ibrahim Malota','0D94C1D712C1EDAA5503122167A8ECF1','','parent','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,2,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,NULL,NULL,1,1,NULL,NULL,NULL),
(201,'Patrick  Kumpukwe','0D94C1D712C1EDAA5503122167A8ECF1','','parent','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,2,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,NULL,NULL,1,1,NULL,NULL,NULL),
(211,'Talandira Obadiah Makuluni','0D94C1D712C1EDAA5503122167A8ECF1','','parent','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,2,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,NULL,NULL,1,1,NULL,NULL,NULL),
(221,'Alexander Timothy Banda','0D94C1D712C1EDAA5503122167A8ECF1','','parent','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,2,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,NULL,NULL,1,1,NULL,NULL,NULL),
(231,'Chancy  Kaunda','0D94C1D712C1EDAA5503122167A8ECF1','','parent','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,2,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,NULL,NULL,1,1,NULL,NULL,NULL),
(241,'Memory  Mtonga','0D94C1D712C1EDAA5503122167A8ECF1','','parent','f','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,3,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,NULL,NULL,1,1,NULL,NULL,NULL),
(251,'Lester  Nyali','0D94C1D712C1EDAA5503122167A8ECF1','','parent','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,3,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,0,NULL,NULL,1,1,NULL,NULL,NULL),
(261,'Annie  Lackson','0D94C1D712C1EDAA5503122167A8ECF1','','parent','f','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,3,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,0,NULL,NULL,1,1,NULL,NULL,NULL),
(271,'Chimwemwe  Khambadza','0D94C1D712C1EDAA5503122167A8ECF1','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,3,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,0,NULL,NULL,1,1,NULL,NULL,NULL),
(281,'Edward  Mukiwa','0D94C1D712C1EDAA5503122167A8ECF1','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,2,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,0,NULL,NULL,1,1,NULL,NULL,NULL),
(291,'Victoria  Chikanda','0D94C1D712C1EDAA5503122167A8ECF1','','student','f','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,2,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,0,NULL,NULL,1,1,NULL,NULL,NULL),
(301,'Sharon  Wisiki','0D94C1D712C1EDAA5503122167A8ECF1','','student','f','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,2,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,0,NULL,NULL,1,1,NULL,NULL,NULL),
(311,'Mathews  Masamba','0D94C1D712C1EDAA5503122167A8ECF1','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,2,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,0,NULL,NULL,1,1,NULL,NULL,NULL),
(321,'Elvin  Gondwa','0D94C1D712C1EDAA5503122167A8ECF1','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,2,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,0,NULL,NULL,1,1,NULL,NULL,NULL),
(331,'Yamikani  Kaulele','0D94C1D712C1EDAA5503122167A8ECF1','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,2,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,0,NULL,NULL,1,1,NULL,NULL,NULL),
(341,'Thomson Alex Banda','0D94C1D712C1EDAA5503122167A8ECF1','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,2,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,0,NULL,NULL,1,1,NULL,NULL,NULL),
(351,'Owen  Kachilika','0D94C1D712C1EDAA5503122167A8ECF1','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,2,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,0,NULL,NULL,1,1,NULL,NULL,NULL),
(361,'Blessings  Ntambala','0D94C1D712C1EDAA5503122167A8ECF1','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,2,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,0,NULL,NULL,1,1,NULL,NULL,NULL),
(371,'Micheal  Kaunda','0D94C1D712C1EDAA5503122167A8ECF1','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,2,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,0,NULL,NULL,1,1,NULL,NULL,NULL),
(381,'Amidu Shaibu Labana','0D94C1D712C1EDAA5503122167A8ECF1','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,2,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,0,NULL,NULL,1,1,NULL,NULL,NULL),
(391,'Mario  Matemba','0D94C1D712C1EDAA5503122167A8ECF1','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,2,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,0,NULL,NULL,1,1,NULL,NULL,NULL),
(401,'Fumwe  Malisita','0D94C1D712C1EDAA5503122167A8ECF1','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,2,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,0,NULL,NULL,1,1,NULL,NULL,NULL),
(411,'Natasha  Phiri','0D94C1D712C1EDAA5503122167A8ECF1','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,0,NULL,NULL,1,1,NULL,NULL,NULL),
(421,'Ebglebetha  Juma','0D94C1D712C1EDAA5503122167A8ECF1','','student','f','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,0,NULL,NULL,1,1,NULL,NULL,NULL),
(431,'Hamisi  Hemedy','0D94C1D712C1EDAA5503122167A8ECF1','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(441,'Marietha  Mwafongo','0D94C1D712C1EDAA5503122167A8ECF1','','student','f','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(451,'Beatrice  Ndoma','0D94C1D712C1EDAA5503122167A8ECF1','','student','f','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(461,'Webster  Msomba','0D94C1D712C1EDAA5503122167A8ECF1','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(471,'Wonderful  Kachitsa','0D94C1D712C1EDAA5503122167A8ECF1','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(481,'Precious Betala Gaduka','0D94C1D712C1EDAA5503122167A8ECF1','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(491,'Steven  Maula','0D94C1D712C1EDAA5503122167A8ECF1','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(501,'Tadala  Banda','0D94C1D712C1EDAA5503122167A8ECF1','','student','f','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(511,'Blessings  Paul','0D94C1D712C1EDAA5503122167A8ECF1','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(521,'Rolland Kris Mnozi','0D94C1D712C1EDAA5503122167A8ECF1','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(531,'Daniel  Simwawa','0D94C1D712C1EDAA5503122167A8ECF1','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(541,'Chimwemwe  Nkhata','0D94C1D712C1EDAA5503122167A8ECF1','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(551,'Tamandani  Chawanda','0D94C1D712C1EDAA5503122167A8ECF1','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(561,'Victor  Forpence','0D94C1D712C1EDAA5503122167A8ECF1','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(571,'Mervin  Chibwana','0D94C1D712C1EDAA5503122167A8ECF1','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(581,'Rodney  Kamwendo','0D94C1D712C1EDAA5503122167A8ECF1','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(591,'Muheka Vinamiyo Gabriel','0D94C1D712C1EDAA5503122167A8ECF1','','student','m','','',NULL,NULL,'',0,'0000-00-00 00:00:00',0,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(601,'Carlolyne Dziwani Nantchengwa','0D94C1D712C1EDAA5503122167A8ECF1','','student','f','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(611,'Grace  Kumwenda','0D94C1D712C1EDAA5503122167A8ECF1','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(621,'Chisomo  Alfred','0D94C1D712C1EDAA5503122167A8ECF1','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(631,'Agness  Gwaza','0D94C1D712C1EDAA5503122167A8ECF1','','student','f','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(641,'Willy  Witikhe','0D94C1D712C1EDAA5503122167A8ECF1','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(651,'Grace  Juma','0D94C1D712C1EDAA5503122167A8ECF1','','student','f','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(671,'Violet  Kamwendo','0D94C1D712C1EDAA5503122167A8ECF1','','student','f','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(681,'John Post Magombo','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(691,'Carlos  Mnthuzi','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(701,'Sheera  Kamoyo','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(711,'Emmanuel  Mwale','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(721,'Eustazio  Katuluza','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(731,'Elizabeth  Chimesya','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(751,'Hastings  Tchinga','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(761,'Yohane  Manda','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(771,'Lucius  Kanyenda','0D94C1D712C1EDAA5503122167A8ECF1','','student','m','','',NULL,NULL,'Malawian',0,NULL,0,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(781,'Christina  Kambanje','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(791,'Daniel  Bazale','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(801,'Omar  Chimtengo','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(811,'Limbani  Gondwe','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(821,'Chifuniro  Nthani','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(831,'Ted  Kamanga','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(841,'Annie  Makwinja','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(851,'Dyson  Kainja','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(861,'Victoria  Kainja','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(871,'James  Khanje','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(881,'Sarah  Goodwell','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(891,'Sonia  Kasanga','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(901,'Nakari  Nanthuru','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(911,'Dalitso  Mwalabu','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(921,'Esther  Gassa','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(931,'Lonjezo  Salema','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(941,'Ian  Chiwaya','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(951,'Tamandani  Zulumba','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(961,'Christian  Phiri','0D94C1D712C1EDAA5503122167A8ECF1','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(971,'Dean  Midian','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(981,'Brian  Kamasa','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(991,'Chitedze  Solomon','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1001,'Sharon  Namisawo','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1011,'Joshua Elvin Kaunda','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1021,'Chifundo  Ngapemba','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1031,'Yamikani  Mponya','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1041,'Andrew  Machinjiri','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1051,'Phillip  Banda','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1061,'Hannif  Yahaya','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1071,'Atupele  Samu','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1091,'Jeromy  Chingamuka','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1101,'Memory  Manezo','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1111,'Halord  Msale','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1121,'Tamandani  Chagwirira','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1131,'Innocent  Polera','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1141,'Angel  Chimala','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1161,'Kondwani  Nantharo','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1171,'Dalitso  Chazima','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1191,'Blessings  Kadzongwe','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1201,'Rashid  Kaselera','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1211,'Barbara  Kanjoma','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1221,'Benandetta  Kadzombe','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1231,'Grace  Kadzombe','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1241,'Chikondi  Bande','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1251,'Ivy  Mlanga','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',0,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1261,'Teddy  Mtongolo','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-09 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1271,'Semu  Kamwaza','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-09 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1281,'Felix  Mandili','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-09 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1291,'Vincent  Makwakwa','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-09 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1301,'Chrispine  Kanjo','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-09 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1311,'John  Ngamiza','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-09 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1321,'Calorine  Liver','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-09 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1341,'Amiss  Emedi','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-09 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1351,'Hezekiah  Majawa','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-09 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1361,'David  Mbukwa','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-09 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1371,'Rapheal  Bento','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-09 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1381,'Brandon  Dambuleni','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-09 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1391,'Mary  Staubi','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-09 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1401,'Fateema  Juma','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-09 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1411,'Mervis  Makwangwala','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-09 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1421,'Madalitso  Nyirenda','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-09 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1431,'Benson  Gwiriza','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-09 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1441,'Lydia  Mondela','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-09 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1461,'Leonard  Manja','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-09 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1471,'Andrew  Ngoloma','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-09 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1481,'Blessings  Shuva','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-09 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1491,'Atupele Mkalemwa Phiri','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-09 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1501,'Welani  Nyirenda','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-09 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1511,'Flora  Chimtengo','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-09 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1521,'Chikondi Bridget Chileka','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-09 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1531,'Lawrence  Zeka','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-09 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1541,'Victoria  Chisamba','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-09 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1551,'Evance  Maloto','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-09 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1561,'Blessings  Kachala','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-09 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1571,'Neema  Bwanali','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-10 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1581,'Yamikani  Makangala','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-10 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1591,'Christian  Nylon','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-10 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1601,'Patuma  Pofera','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-10 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1611,'Solomon  Feriji','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-10 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1621,'Grace  Kamyata','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-10 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1631,'Eliza  Abraham','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-10 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1641,'Chisomo  Bazale','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-10 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1651,'Ivy  Makuluni','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-10 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1661,'Liness  Alumando','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-10 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1671,'Memory  Alumando','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-10 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1681,'Grace  Luka','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-10 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1691,'Ethel  Palanda','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-10 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1701,'Johnson  Chirwa','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-10 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1711,'Clara  Bulamaele','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-10 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1721,'Chisomo  Chibwana','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-10 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1731,'Aubrey  Jere','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1741,'Paul  Sankhulani','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1751,'Solomon  Felichi','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1761,'Josephy  Donweck','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1771,'Rejoice  Selemani','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1781,'Paul  James','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1791,'Tiyanjane  Chiutsi','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1801,'Gloria Pias James','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1811,'Gift  Bakali','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1821,'Christina  Nylon','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1851,'Elvin  Taulo','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1861,'Davie    Mtegha','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1871,'Francis  Chatepa','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1881,'Lusayo  Mwakalenga','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1891,'Paul  Mandowa','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1901,'Jacob  Kaphala','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1911,'Steven  Paul','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1921,'Nelly  Basikolo','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1931,'Shabani  Dafter','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1941,'Langson  Kasakula','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1951,'Joseph  Kasakula','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1961,'Desire  Malunga','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1971,'Chimwemwe  Mbombera','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1981,'Robbie  Harawa','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(1991,'Chikondi Nkosana Nchessi','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2001,'Themba  Chikuse','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2011,'Blessings  Muziwo','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2021,'Soza  Manford','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2031,'Fredrick  Kamasa','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2041,'Andrew  Kampeni','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2051,'Innocent  Kandaya','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2061,'Kudakwache  Nemachena','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2071,'Ceacer  Jorge','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2091,'Alfred  Kachule','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2101,'Blessings  Ndelemani','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2111,'Mike  Mwanza','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2121,'Grace  Kachiwiya','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2131,'Aquilla  Valantim','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-11 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2141,'Faith  Njunga','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-12 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2151,'Jane Mathews Tembo','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-12 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2161,'Omega  Tsambalikagwa','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-12 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2171,'Mphatso  Muwaza','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-12 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2181,'Wezi  Tsambalikagwa','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-12 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2191,'Lossa  Emmanuel','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-12 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2201,'Victoria  Anthony','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-12 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2211,'Alefa  Kanko','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-12 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2221,'Bridget  Robson','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-12 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2231,'Thandi  Khombe','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-12 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2251,'Linly  Kathumba','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-12 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2261,'Jane  Bauleni','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-12 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2271,'Olive  Fosko','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-12 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2281,'Faliza  Sulemani','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-12 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2291,'Aluwa  Salanje','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-12 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2301,'Tamandani  Mpita','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-12 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2311,'Rabecca  Chikhoyo','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-12 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2321,'Thokozani  Mwale','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-12 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2331,'Rabecca  Chipoka','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-12 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2341,'Ruth  Mwale','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-12 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2351,'Omega  Chaima','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-12 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2361,'Uyvonne  Maingi','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-12 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2371,'Precious Mary Mashalubu','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-12 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2381,'Morris  Kandonje','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-14 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2391,'Macdonald Peace Gwedeza','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-14 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2401,'Charles  Kalambalika','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-14 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2411,'John Rabson Das','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-14 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2421,'Ray  Chabwera','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-14 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2431,'Foster  Banda','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-15 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2441,'Loyce  Mwalughali','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-15 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2451,'Charles  Selemani','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-15 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2461,'Stuart Eric Kachepa','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-15 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2471,'Lucky  Msiska','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-16 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2481,'Andrew  Ndalira','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-16 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2491,'Shadreck  Mulera','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-16 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2501,'Thokozani  Kazembe','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-16 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2511,'Lucky  Chafunya','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-16 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2521,'Hatings  Umali','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-16 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2531,'Blessings  Masakha','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-16 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2541,'Chiyanjano  Kadamanja','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-16 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2551,'Innocent  Selemani','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-16 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2561,'Hastings  Banda','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-16 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2571,'Innocent  Makanjira','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-16 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2581,'Christopher  Ngosa','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-16 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2591,'Yamikani  Sandalamu','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-16 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2601,'David  Gaya','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-16 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2611,'Phillimon  Milimo','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-16 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2621,'Antony  Majawa','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-16 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2631,'Blessings  Tilibe','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-16 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2641,'Josephy  Zupile','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-16 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2661,'Morris  Rapheal','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-16 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2671,'Andrew  Masimbe','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-16 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2681,'Ongani  Gama','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-16 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2691,'Peter  Harawa','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-16 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2701,'Suleman  Hassan','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-16 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2711,'Aubrey  Chilunga','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-16 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2721,'Dan  Ndanga','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-16 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2731,'Claudio  Kadzombe','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-16 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2741,'Micheal  Mthawanji','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-16 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2761,'Kondwani  Kazako','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-16 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2771,'Lucy  Mawindo','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-17 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2781,'Prince  Jere','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-17 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2791,'Eliza  Nkuziona','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-17 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2801,'Judith  Kamulole','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-18 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2811,'Triza  Nasiyaa','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-18 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2821,'Frida  Ndala','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-18 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2831,'Alena  Filiasi','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-18 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2841,'Yacinta  Pascal','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-18 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2851,'Nina  Katumbi','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-18 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2861,'Chisomo  Chafulumira','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-18 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2891,'Modesta  Nicholus','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-18 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2901,'Tadala  Mikoko','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-18 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2911,'Mary  Chilunga','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-18 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2921,'Shafina  Phiri','0D94C1D712C1EDAA5503122167A8ECF1','','student','f','','',NULL,NULL,'',12,'2015-09-18 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2931,'Tchulani  Mbewe','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-20 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2941,'Lucky  Chiphwanya','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-20 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2951,'Calvin  Kapita','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-20 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2961,'Asante  Mangani','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-20 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2971,'Pemphero  Nkumba','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-20 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2981,'Nelson  Kavalo','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-20 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(2991,'Pemphero  Phiri','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-20 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3001,'January  Chinandidya','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-20 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3011,'Holman  Nanjiwa','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-20 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3021,'Bonface  Nambera','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-20 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3041,'David  Gaya','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-20 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3051,'Mervis  Mainga','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-21 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3061,'Dado  Ayub','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-22 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3071,'Agness  Jimu','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-23 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3081,'Brian Issa Fazili','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-23 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3091,'Monica  Mussa','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-23 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3101,'Emily  Ndazamo','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-23 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3111,'Daniel  Chandikana','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-24 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3121,'Deborah  Custom','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-09-29 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3131,'Isabel  Chiomba','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-30 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3141,'Anganile Hendrina Mfune','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-09-30 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3151,'Jesca  Chibwana','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-10-06 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3161,'Trevor  Kabango','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-10-06 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3171,'Wongani  Kamanga','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-10-06 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3181,'Muhamad  Sulyman','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-10-06 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3191,'Alice  Juma','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-10-06 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3201,'Lusayo  Ndovi','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-10-06 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3211,'Bridget  Mgona','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-10-06 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3221,'Ishimwe  Placid','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-10-06 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3231,'Belita  Moses','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-10-06 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3241,'Portia  Kamundi','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-10-06 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3251,'Charlotte  Kamundi','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-10-06 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3261,'Joel  Khonyongwa','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-10-06 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3271,'Fazil  Mbwana','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-10-06 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3281,'Dumisani  Mtonga','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-10-06 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3291,'Fyson  Buleya','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-10-06 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3301,'Omar  Kuipa','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-10-06 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3311,'Chikondi  Gondwe','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-10-06 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3321,'Rapheal  Bwanali','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-10-06 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3331,'Alex  Phiri','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-10-06 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3341,'Magret  Namongo','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-10-06 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3351,'Harrison  Khwenyegwe','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-10-06 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3361,'Phemiya  Kasamba','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-10-06 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3371,'Atupele  Misolo','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-10-07 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3381,'Upile  Masamba','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-10-13 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3391,'Marino  Alves','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-10-13 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3401,'Sauda  Ajinga','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-10-13 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3411,'Alinafe  Chimaimba','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-10-21 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3421,'Jacqueline  Ndalama','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-10-21 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3431,'Noel  Chaphuka','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-10-22 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3441,'Chrisipine  Maweru','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-10-22 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3451,'Grace  Nguluwe','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-10-26 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3461,'Kelvin  Chilanga','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-10-26 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3471,'Elisa  Maluwa','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-10-26 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3481,'Micheal  Bakali','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-10-26 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3491,'Charles  Mankwanda','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-10-26 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3501,'Maxford  Wasili','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-10-26 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3511,'Chinsinsi  Kunje','40B0B20A20DA49A73F3713564FFC5DC6','','student','f','','',NULL,NULL,'',12,'2015-10-27 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3521,'Cuthbert  Mtuwana','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-10-27 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3531,'Ian  Kaufulu','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-10-27 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3541,'Abigail  Kachitsa','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-10-27 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3551,'Razack  MMadi','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-10-28 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3561,'Reghan  Anthony','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-10-29 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3571,'Young Chimkaka Sadyalunda','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-11-02 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3581,'Osman  Njoka','40B0B20A20DA49A73F3713564FFC5DC6','','student','m','','',NULL,NULL,'',12,'2015-11-02 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3591,'Paul . Muheka','B236B943EF1F789BCF792117E5264C4E','','student','m','.','.',NULL,NULL,'Malawian',12,'2016-01-26 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3601,'John . Matechanga','DFFD3EAD16A10A7437DB01505104C785','','student','m','Box 14\r\nChikhwawa\r\n','Chikhwawa',NULL,NULL,'Malawian',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3611,'Madalitso  Kamthuzi','971EC56E2A5027C2624FC592D9151A92','','student','m','Escom\r\nBox 2047\r\nBlantyre','Mombo Road\r\nNamiwawa',NULL,NULL,'Malawian',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3621,'Soviet  Chilunga','02E0ECC7106B25522DD05ACA63198B69','','student','m','','',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3631,'Jones  Bemeyani','B963E570844A5016F320C317A3C198DC','','student','m','','Thyolo',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3641,'Jammila  Issa ','C75BC8C450E61A29B93EC71400EE95E7','','student','f','Police Traning School Limbe , Box 5299, Limbe','',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3651,'Alick  Bemeyani','2068A48BFE20272550658062DB9FF9F2','','student','m','Box 2\r\nThyolo','Thyolo',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3661,'Yowabu  Bemeyani','AD840FE80E7F47CEC9AEFA1C027FC9EE','','student','m','','',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3671,'Sharon  Jere','DC6D48B6C75AA242DE31BC4023E4D61F','','student','f','','',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3681,'John  Matechanga','E726D656E32A5C65AFAF2C20B66E036E','','student','m','Box 14\r\nChikhwawa','Chikhwawa',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3691,'Memory Chisomo Maunde','96725AFAC02D602840B02EEECAF20CBB','','student','f','P/Bag 360\r\nBlantyre','',NULL,NULL,'Malawian',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3701,'Muhammad  Juma','4C0D04BCA0A947F377C6D98AF9F387B2','','student','m','','',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3711,'Waza  Banda','3AAC66C8233EF03EBD77DD5482CA1916','','student','m','Box 5743\r\nLimbe','Greencorner',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3721,'Talandira  Maluwa','BFA1AA99726E6FAAB01C650D285E876A','','student','f','Box 21 \r\nMikolongwe','Thyolo',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3731,'Jociah  Kamwendo','7FED14B20833A4E02707BED0FFA539D0','','student','m','','',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3741,'Francis  Tcheza','D66D6E3BE54658BAB207A1706738546D','','student','m','Box 40044\r\nLilongwe','Lilongwe area 25',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3751,'Blessings  Chidziwitso','D73AD836235E90F6498649D1BA3840C2','','student','m','','Chitawira',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3761,'Angela  Lungu','2816370AE0D950CA765B5D61137FE38E','','student','f','','',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3771,'Patric Moses Banda','DD70C1876C55E48FA5327778D952BBA0','','student','m','','',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3781,'Olive  Mulenga','C4B017497FB73D34D215FCABDBD80577','','student','f','','Mulange',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3791,'Thokozani  Mkandawire','CFD78CF8AB1325341F319EEC45826B0F','','student','f','','Machinjiri Area 10',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3801,'Joseph  Chizauni','857943B1A6BCCF103FBB6B82052FFBB6','','student','m','','Lilongwe',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3811,'Hezel  Chitsiru','FE159D1582593D9C32F72E5F4663CFB1','','student','f','','Chilomoni',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3821,'Hezel  Chitsuro','1153B5E50D830B8A0CCF271D3CC1231A','','student','f','','Chilomoni',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3831,'Clement  Madziakayenda','FEAD7C313535CB95E306766ECA545440','','student','m','','',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3841,'Harry  Kalua','0C1B752DD689600CD764945424303704','','student','m','','',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3851,'Barrettie  Kondowe','507ACC2FA0EC06D4A7A5CB56CE4F54F4','','student','m','Box 47\r\nLilongwe','',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3861,'Stoic  Mwatibu','1B09ABBE1356A3AA321ACE848503C1DD','','student','m','Box 32251\r\nBlantyre 3','Manja',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3871,'Kwangu  Chavula','6213FD47D3C12E5F95BCF2F8DC7A9455','','student','f','','Chileka',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3881,'Brian  Banda','83ACFE1A6DB8C84AE699666E835158AD','','student','m','Box 1093\r\nBlantyre','',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3891,'Kelvin  Likoswe','181A4E8D246F21022705532381BFDE97','','student','m','','Mbayani',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3901,'Owen  Binauli','65B7E7A61B3F747D90B4BC9EB47B0417','','student','m','Box 291\r\nBalaka','Balaka',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3911,'Yamikani  Chakwana','C80660FBC06B024998D4AC04C0CE57B2','','student','m','','',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3921,'Abgail  Matapila','1799D69494C233B995948BD486119DBF','','student','f','','',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3931,'Alinafe  Maneka','CD4E1A8D86E4F8EEE4A811D694B6B2D0','','student','f','','',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3941,'Henry  Kadosa','836721081C5CCA4263AF9C1F5FC5A131','','student','m','','',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3951,'Micheal  Majonanga','7A28E914FFA4A7174CED6DAA000A08F1','','student','m','Box 328\r\nMangochi','Mangochi',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3961,'Ivan  Chikuse','E9D35682065E6B91E98134118603CC69','','student','m','','',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3971,'Chikondi  Mzumara','29E56A8D3E8299F31CA6256632680CBF','','student','m','','',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(3991,'Harry  Chikwakwa','D564E990EA15CB3F137F961C5A1269E4','','student','m','Box 72\r\nZomba','Zomba. Matawale',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(4001,'Brian  Sululu','EB46199C94F34756A96B1FB6869D7F5D','','student','m','','',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(4011,'Timothy  Sikelo','3795C8F57781F189991206CBDDC3EECB','','student','m','','',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(4021,'Lonjezo  Mkumba','6DA47E1498FCE63AA8AA59254AE9C8F6','','student','f','','',NULL,NULL,'',12,'2016-01-27 00:00:00',0,NULL,NULL,NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(4031,'Macdonald  Kalemba','D9B4B736B2AF96BEFAFCFB225E587DE6','','student','m','','',NULL,NULL,'',12,'2016-01-28 00:00:00',0,NULL,NULL,NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(4041,'Timothy  Mlinde','EF322D2DD75BFFF9FB8ABBA743074422','','student','m','','',NULL,NULL,'',12,'2016-01-28 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(4051,'Mponela  Stan','89E8956CF974117E176B88066BB68E33','','student','m','Box 303\r\nChichiri\r\nBT3','Chitawira KS 791',NULL,NULL,'',12,'2016-01-28 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(4061,'Bouycott  Phiri','3EBB677B855B6798CAD4C7ECABC7EE89','','student','m','','',NULL,NULL,'',12,'2016-01-28 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(4071,'Chawezi  Phiri','FC876A4CE7552FF7584B71631F438006','','student','m','','',NULL,NULL,'',12,'2016-01-28 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(4081,'Yankho  Masakha','B250BADAE36D0475EF4A3EE7B9AF7E95','','student','f','','',NULL,NULL,'',12,'2016-01-28 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(4091,'Jafalli  Bwanali','FE1FD497C620001E242ACFF4DEE7FC03','','student','m','','',NULL,NULL,'',12,'2016-01-28 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(4101,'Chrispine  Mmangisa','CFBBE22005BC442599772FB6814983E4','','student','m','','',NULL,NULL,'',12,'2016-01-28 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(4111,'Moses  Palanda','AC04AC61D0D026E60A49A642E704E3AC','','student','m','','',NULL,NULL,'',12,'2016-01-28 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(4121,'Catherine  Chitupe','2E70C198AAB72509687AC8FE1A198942','','student','m','','',NULL,NULL,'',12,'2016-01-28 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(4131,'Davlin  Mkulichi','DE1102FBA81CF147FBA2AE6DA15A1A66','','student','m','','',NULL,NULL,'',12,'2016-01-28 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(4141,'Bester  Kamwaza','8073C5391EFFC15A6A0FE054BD71E0FE','','student','m','','',NULL,NULL,'',12,'2016-01-28 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(4151,'Samsom Felix Mmangitsa','1643EE0BB269A92ADA460D2D10389261','','student','m','','',NULL,NULL,'',12,'2016-01-28 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(4161,'Martha  Windo','2E489045E35770B0729061A688D32774','','student','m','','',NULL,NULL,'',12,'2016-01-28 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(4171,'Esau  Chapolera','803BB22FD94BAEC1965DF8DD4B807A4B','','student','m','','',NULL,NULL,'',12,'2016-01-28 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(4181,'Peter  Fikilini','EB10B4B401224B96D333CEBF0CD62B31','','student','m','','',NULL,NULL,'',12,'2016-01-28 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(4191,'John Shaddin Cassim','A4B3A6DF387A047954C3B51AAD7A08D4','','student','m','Box 247\r\nBT','Chirimba',NULL,NULL,'',12,'2016-01-28 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(4201,'Rehema  Issa','19831EC30C624901ABAA35FBFA38D976','','student','f','','',NULL,NULL,'',12,'2016-01-28 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(4211,'Sherine  Yobe','04A977D72EEABAFB0ED376D9AD067C73','','student','m','','',NULL,NULL,'',12,'2016-01-28 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(4221,'Hassan  Gama','222F3A406780DA781E1CB2F6E941E0D8','','student','m','','',NULL,NULL,'',12,'2016-01-29 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(4231,'Kawaye  Kwengwere','DBB9E43A0215CF600B0C68DD7B6F4810','','staff','m','','',NULL,NULL,'',12,'2016-01-29 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(4241,'Glenn Paul Chitsime','21AB3DED42C9197FF6712B5F03EF73F8','','staff','m','Box 31174\r\nChichiri\r\nBlantyre','',NULL,NULL,'',12,'2016-01-29 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(4251,'Rodric Vanilla Jossam','DB0E4D438525AD93AD0FCCAF511839CF','','staff','m','','',NULL,NULL,'',12,'2016-01-29 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(4261,'Martin  Mfungula','4F19EF8BA5140300A15DA2DE23850203','','staff','m','','',NULL,NULL,'',12,'2016-01-29 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(4271,'Maggie  Jones','C9E006E3683973EF019906C8257E7B25','','staff','m','','',NULL,NULL,'',12,'2016-01-29 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(4281,'Thandi  Ntchito','7F46A58D5642DF795EB055BF44589172','','staff','f','','',NULL,NULL,'',12,'2016-01-29 00:00:00',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(6666,'BrianNKHATAFOURTEENS','briannkhata@gmail.com','c775ee295657e2630d423b3c4609dc41','student','female','Blantyre','Blantyre',NULL,NULL,'Malawian',0,'2021-09-01 08:09:25',0,'7474','2021-09-23','malngo,malngo																															','logoBeat.jpeg',1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(6667,'BrianNKHATAFOURTEENS','briannkhata@gmail.com','c775ee295657e2630d423b3c4609dc41','student','female','Blantyre','Blantyre',NULL,NULL,'Malawian',0,'2021-09-01 08:09:23',0,'7474','2021-09-23','malngo,malngo																															','logoBeat.jpeg',1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(6668,'BrianNKHATAFOURTEENS','briannkhata@gmail.com','c775ee295657e2630d423b3c4609dc41','student','female','Blantyre','Blantyre',NULL,NULL,'Malawian',0,'2021-09-01 08:09:45',0,'6777','2021-09-23','malngo,malngo																															','logoBeat.jpeg',1,3,NULL,3,'2021-09-03 08:48:59',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL),
(6669,'BrianNKHATAFOURTEENS','briannkhata@gmail.com','c775ee295657e2630d423b3c4609dc41','student','female','Blantyre','Blantyre',NULL,NULL,'Malawian',0,'2021-09-01 08:09:11',0,'6777','2021-09-23','malngo,malngo																															','logoBeat.jpeg',1,3,NULL,3,'2021-09-03 08:48:59',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,1,NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
