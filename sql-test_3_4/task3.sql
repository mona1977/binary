CREATE TABLE IF NOT EXISTS `tbl_user` (
    `userid` int(11) NOT NULL AUTO_INCREMENT,
     `username` varchar(10) NOT NULL,
      `pass` varchar(5) NOT NULL,
)
CREATE TABLE IF NOT EXISTS `tbl-employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  'userid'  int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `ssn` varchar(32) NOT NULL,
  `is_current` tinyint(1) NOT NULL DEFAULT '1',
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO `tbl_employees` (`id`, 'userid',`name`, `birthday`, `ssn`, `is_current`, `email`, `phone`, `address`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 10,'surendra gupta', '1990-04-12', '123-55-9876', 1, 'test@test.com', '+18952562', 'st-2, new delhi, india', 'test56', '2020-01-10 11:55:33', 'test56', '2020-01-10 11:57:23');

CREATE TABLE IF NOT EXISTS `tbl_employee_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL DEFAULT '1',
  `language_id` int(11) NOT NULL DEFAULT '1',
  `info_type_id` int(11) NOT NULL DEFAULT '1',
  `text` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_id` (`employee_id`),
  KEY `language_id` (`language_id`),
  KEY `info_type_id` (`info_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

INSERT INTO `tbl_employee_info` (`id`, `employee_id`, `language_id`, `info_type_id`, `text`) VALUES
(1, 1, 1, 1, 'Introduction english text'),
(2, 1, 3, 1, 'Introduction texte français'),
(3, 1, 2, 1, 'Introducción texto en español'),
(4, 1, 1, 2, 'Previous work experience'),
(5, 1, 2, 2, 'Experiencia de trabajo previa'),
(6, 1, 3, 2, 'Précédente expérience professionnelle'),
(7, 1, 1, 3, 'Education information'),
(8, 1, 2, 3, 'Información sobre Educación'),
(9, 1, 3, 3, 'Informations sur l''éducation');

CREATE TABLE IF NOT EXISTS `tbl_info_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO `tbl_info_type` (`id`, `title`) VALUES
(1, 'Introduction'),
(2, 'Previous work experience'),
(3, 'Education information');

CREATE TABLE IF NOT EXISTS `tbl_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) CHARACTER SET latin1 NOT NULL,
  `code` varchar(4) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO `insly_languages` (`id`, `title`, `code`) VALUES
(1, 'English', 'en'),
(2, 'Spanish', 'sp'),
(3, 'French', 'fr');

ALTER TABLE `tbl_employee_info`
  ADD CONSTRAINT `tbl_employee_info_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `tbl_employees` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_employee_info_ibfk_2` FOREIGN KEY (`language_id`) REFERENCES `tbl_languages` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_employee_info_ibfk_3` FOREIGN KEY (`info_type_id`) REFERENCES `tbl_info_type` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;