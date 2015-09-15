-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2014 at 09:00 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `knewdog`
--
CREATE DATABASE IF NOT EXISTS `knewdog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `knewdog`;

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

DROP TABLE IF EXISTS `advertisement`;
CREATE TABLE IF NOT EXISTS `advertisement` (
  `advertisement_id` int(11) NOT NULL AUTO_INCREMENT,
  `newsletter_keyword_id` text NOT NULL,
  `language_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `town` varchar(255) NOT NULL,
  `advertisement_script` text NOT NULL,
  `advertisement_image` varchar(255) NOT NULL,
  `advertisement_url` text NOT NULL,
  `advertisement_flag` enum('advertisement_script','advertisement_image') NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`advertisement_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`advertisement_id`, `newsletter_keyword_id`, `language_id`, `country_id`, `zip_code`, `town`, `advertisement_script`, `advertisement_image`, `advertisement_url`, `advertisement_flag`, `status`) VALUES
(1, '5,6', 0, 0, '', '', 'asdfasdf', '0', '', 'advertisement_script', 'Active'),
(2, '6,7', 0, 0, '', '', 'asdfasdfsdfa', '', '', 'advertisement_script', 'Active'),
(3, '5,6', 0, 0, '', '', 'asdfasdf', '', '', 'advertisement_script', 'Active'),
(4, '2,3', 0, 0, '', '', '0', '57acfda9fc277559e95842c96aefb493.jpg', '', 'advertisement_image', 'Active'),
(5, '2,3', 2, 7, '1214', 'town', 'ad', '', 'url', 'advertisement_script', 'Active'),
(6, '2,3', 2, 8, '', '', 'asdf', '', '', 'advertisement_script', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `ci_cookies`
--

DROP TABLE IF EXISTS `ci_cookies`;
CREATE TABLE IF NOT EXISTS `ci_cookies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cookie_id` varchar(255) DEFAULT NULL,
  `netid` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `orig_page_requested` varchar(120) DEFAULT NULL,
  `php_session_id` varchar(40) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('09c0962638b433fba476529083c2601e', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', 1397638547, 'a:12:{s:9:"user_data";s:0:"";s:18:"language_shortcode";s:2:"en";s:8:"username";s:5:"admin";s:7:"user_id";s:1:"1";s:18:"type_of_membership";s:4:"CAAD";s:12:"is_logged_in";b:1;s:17:"language_selected";N;s:22:"search_string_selected";N;s:5:"order";N;s:10:"order_type";N;s:13:"user_selected";N;s:16:"keyword_selected";N;}');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=240 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'US', 'United States'),
(2, 'CA', 'Canada'),
(3, 'AF', 'Afghanistan'),
(4, 'AL', 'Albania'),
(5, 'DZ', 'Algeria'),
(6, 'DS', 'American Samoa'),
(7, 'AD', 'Andorra'),
(8, 'AO', 'Angola'),
(9, 'AI', 'Anguilla'),
(10, 'AQ', 'Antarctica'),
(11, 'AG', 'Antigua and/or Barbuda'),
(12, 'AR', 'Argentina'),
(13, 'AM', 'Armenia'),
(14, 'AW', 'Aruba'),
(15, 'AU', 'Australia'),
(16, 'AT', 'Austria'),
(17, 'AZ', 'Azerbaijan'),
(18, 'BS', 'Bahamas'),
(19, 'BH', 'Bahrain'),
(20, 'BD', 'Bangladesh'),
(21, 'BB', 'Barbados'),
(22, 'BY', 'Belarus'),
(23, 'BE', 'Belgium'),
(24, 'BZ', 'Belize'),
(25, 'BJ', 'Benin'),
(26, 'BM', 'Bermuda'),
(27, 'BT', 'Bhutan'),
(28, 'BO', 'Bolivia'),
(29, 'BA', 'Bosnia and Herzegovina'),
(30, 'BW', 'Botswana'),
(31, 'BV', 'Bouvet Island'),
(32, 'BR', 'Brazil'),
(33, 'IO', 'British lndian Ocean Territory'),
(34, 'BN', 'Brunei Darussalam'),
(35, 'BG', 'Bulgaria'),
(36, 'BF', 'Burkina Faso'),
(37, 'BI', 'Burundi'),
(38, 'KH', 'Cambodia'),
(39, 'CM', 'Cameroon'),
(40, 'CV', 'Cape Verde'),
(41, 'KY', 'Cayman Islands'),
(42, 'CF', 'Central African Republic'),
(43, 'TD', 'Chad'),
(44, 'CL', 'Chile'),
(45, 'CN', 'China'),
(46, 'CX', 'Christmas Island'),
(47, 'CC', 'Cocos (Keeling) Islands'),
(48, 'CO', 'Colombia'),
(49, 'KM', 'Comoros'),
(50, 'CG', 'Congo'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'HR', 'Croatia (Hrvatska)'),
(54, 'CU', 'Cuba'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DK', 'Denmark'),
(58, 'DJ', 'Djibouti'),
(59, 'DM', 'Dominica'),
(60, 'DO', 'Dominican Republic'),
(61, 'TP', 'East Timor'),
(62, 'EC', 'Ecuador'),
(63, 'EG', 'Egypt'),
(64, 'SV', 'El Salvador'),
(65, 'GQ', 'Equatorial Guinea'),
(66, 'ER', 'Eritrea'),
(67, 'EE', 'Estonia'),
(68, 'ET', 'Ethiopia'),
(69, 'FK', 'Falkland Islands (Malvinas)'),
(70, 'FO', 'Faroe Islands'),
(71, 'FJ', 'Fiji'),
(72, 'FI', 'Finland'),
(73, 'FR', 'France'),
(74, 'FX', 'France, Metropolitan'),
(75, 'GF', 'French Guiana'),
(76, 'PF', 'French Polynesia'),
(77, 'TF', 'French Southern Territories'),
(78, 'GA', 'Gabon'),
(79, 'GM', 'Gambia'),
(80, 'GE', 'Georgia'),
(81, 'DE', 'Germany'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'ID', 'Indonesia'),
(101, 'IR', 'Iran (Islamic Republic of)'),
(102, 'IQ', 'Iraq'),
(103, 'IE', 'Ireland'),
(104, 'IL', 'Israel'),
(105, 'IT', 'Italy'),
(106, 'CI', 'Ivory Coast'),
(107, 'JM', 'Jamaica'),
(108, 'JP', 'Japan'),
(109, 'JO', 'Jordan'),
(110, 'KZ', 'Kazakhstan'),
(111, 'KE', 'Kenya'),
(112, 'KI', 'Kiribati'),
(113, 'KP', 'Korea, Democratic People''s Republic of'),
(114, 'KR', 'Korea, Republic of'),
(115, 'KW', 'Kuwait'),
(116, 'KG', 'Kyrgyzstan'),
(117, 'LA', 'Lao People''s Democratic Republic'),
(118, 'LV', 'Latvia'),
(119, 'LB', 'Lebanon'),
(120, 'LS', 'Lesotho'),
(121, 'LR', 'Liberia'),
(122, 'LY', 'Libyan Arab Jamahiriya'),
(123, 'LI', 'Liechtenstein'),
(124, 'LT', 'Lithuania'),
(125, 'LU', 'Luxembourg'),
(126, 'MO', 'Macau'),
(127, 'MK', 'Macedonia'),
(128, 'MG', 'Madagascar'),
(129, 'MW', 'Malawi'),
(130, 'MY', 'Malaysia'),
(131, 'MV', 'Maldives'),
(132, 'ML', 'Mali'),
(133, 'MT', 'Malta'),
(134, 'MH', 'Marshall Islands'),
(135, 'MQ', 'Martinique'),
(136, 'MR', 'Mauritania'),
(137, 'MU', 'Mauritius'),
(138, 'TY', 'Mayotte'),
(139, 'MX', 'Mexico'),
(140, 'FM', 'Micronesia, Federated States of'),
(141, 'MD', 'Moldova, Republic of'),
(142, 'MC', 'Monaco'),
(143, 'MN', 'Mongolia'),
(144, 'MS', 'Montserrat'),
(145, 'MA', 'Morocco'),
(146, 'MZ', 'Mozambique'),
(147, 'MM', 'Myanmar'),
(148, 'NA', 'Namibia'),
(149, 'NR', 'Nauru'),
(150, 'NP', 'Nepal'),
(151, 'NL', 'Netherlands'),
(152, 'AN', 'Netherlands Antilles'),
(153, 'NC', 'New Caledonia'),
(154, 'NZ', 'New Zealand'),
(155, 'NI', 'Nicaragua'),
(156, 'NE', 'Niger'),
(157, 'NG', 'Nigeria'),
(158, 'NU', 'Niue'),
(159, 'NF', 'Norfork Island'),
(160, 'MP', 'Northern Mariana Islands'),
(161, 'NO', 'Norway'),
(162, 'OM', 'Oman'),
(163, 'PK', 'Pakistan'),
(164, 'PW', 'Palau'),
(165, 'PA', 'Panama'),
(166, 'PG', 'Papua New Guinea'),
(167, 'PY', 'Paraguay'),
(168, 'PE', 'Peru'),
(169, 'PH', 'Philippines'),
(170, 'PN', 'Pitcairn'),
(171, 'PL', 'Poland'),
(172, 'PT', 'Portugal'),
(173, 'PR', 'Puerto Rico'),
(174, 'QA', 'Qatar'),
(175, 'RE', 'Reunion'),
(176, 'RO', 'Romania'),
(177, 'RU', 'Russian Federation'),
(178, 'RW', 'Rwanda'),
(179, 'KN', 'Saint Kitts and Nevis'),
(180, 'LC', 'Saint Lucia'),
(181, 'VC', 'Saint Vincent and the Grenadines'),
(182, 'WS', 'Samoa'),
(183, 'SM', 'San Marino'),
(184, 'ST', 'Sao Tome and Principe'),
(185, 'SA', 'Saudi Arabia'),
(186, 'SN', 'Senegal'),
(187, 'SC', 'Seychelles'),
(188, 'SL', 'Sierra Leone'),
(189, 'SG', 'Singapore'),
(190, 'SK', 'Slovakia'),
(191, 'SI', 'Slovenia'),
(192, 'SB', 'Solomon Islands'),
(193, 'SO', 'Somalia'),
(194, 'ZA', 'South Africa'),
(195, 'GS', 'South Georgia South Sandwich Islands'),
(196, 'ES', 'Spain'),
(197, 'LK', 'Sri Lanka'),
(198, 'SH', 'St. Helena'),
(199, 'PM', 'St. Pierre and Miquelon'),
(200, 'SD', 'Sudan'),
(201, 'SR', 'Suriname'),
(202, 'SJ', 'Svalbarn and Jan Mayen Islands'),
(203, 'SZ', 'Swaziland'),
(204, 'SE', 'Sweden'),
(205, 'CH', 'Switzerland'),
(206, 'SY', 'Syrian Arab Republic'),
(207, 'TW', 'Taiwan'),
(208, 'TJ', 'Tajikistan'),
(209, 'TZ', 'Tanzania, United Republic of'),
(210, 'TH', 'Thailand'),
(211, 'TG', 'Togo'),
(212, 'TK', 'Tokelau'),
(213, 'TO', 'Tonga'),
(214, 'TT', 'Trinidad and Tobago'),
(215, 'TN', 'Tunisia'),
(216, 'TR', 'Turkey'),
(217, 'TM', 'Turkmenistan'),
(218, 'TC', 'Turks and Caicos Islands'),
(219, 'TV', 'Tuvalu'),
(220, 'UG', 'Uganda'),
(221, 'UA', 'Ukraine'),
(222, 'AE', 'United Arab Emirates'),
(223, 'GB', 'United Kingdom'),
(224, 'UM', 'United States minor outlying islands'),
(225, 'UY', 'Uruguay'),
(226, 'UZ', 'Uzbekistan'),
(227, 'VU', 'Vanuatu'),
(228, 'VA', 'Vatican City State'),
(229, 'VE', 'Venezuela'),
(230, 'VN', 'Vietnam'),
(231, 'VG', 'Virigan Islands (British)'),
(232, 'VI', 'Virgin Islands (U.S.)'),
(233, 'WF', 'Wallis and Futuna Islands'),
(234, 'EH', 'Western Sahara'),
(235, 'YE', 'Yemen'),
(236, 'YU', 'Yugoslavia'),
(237, 'ZR', 'Zaire'),
(238, 'ZM', 'Zambia'),
(239, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `cpanel`
--

DROP TABLE IF EXISTS `cpanel`;
CREATE TABLE IF NOT EXISTS `cpanel` (
  `cpanel_id` int(11) NOT NULL AUTO_INCREMENT,
  `site_domain` varchar(255) NOT NULL,
  `site_skin` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`cpanel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cpanel`
--

INSERT INTO `cpanel` (`cpanel_id`, `site_domain`, `site_skin`, `username`, `password`) VALUES
(4, 'amutechnologies.com', 'x3', 'amuteyzj', 'aZUV0oESGhGZHVVP');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
CREATE TABLE IF NOT EXISTS `language` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_shortcode` varchar(255) NOT NULL,
  `language_longform` varchar(255) NOT NULL,
  `language_interface` text NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`language_id`, `language_shortcode`, `language_longform`, `language_interface`, `status`) VALUES
(1, 'en', 'English', '', 'Active'),
(2, 'de', 'German', '', 'Active'),
(5, 'fr', 'Français', '', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `language_keyword`
--

DROP TABLE IF EXISTS `language_keyword`;
CREATE TABLE IF NOT EXISTS `language_keyword` (
  `language_keyword_id` int(11) NOT NULL AUTO_INCREMENT,
  `location` text NOT NULL,
  `language_define` varchar(255) NOT NULL,
  `en` text NOT NULL,
  `de` text NOT NULL,
  `fr` text NOT NULL,
  PRIMARY KEY (`language_keyword_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `language_keyword`
--

INSERT INTO `language_keyword` (`language_keyword_id`, `location`, `language_define`, `en`, `de`, `fr`) VALUES
(1, 'Menu', 'HOME', 'Home', 'Zuhause', 'maison'),
(2, 'Menu', 'SIGN_UP', 'Sign Up', 'Registrieren', 'Inscrivez-vous'),
(3, 'Menu', 'FREE', 'Free', 'Kostenlos', 'Gratuit'),
(4, 'Menu', 'NEWSLETTERS', 'Newsletters', 'Newsletters', 'Newsletters'),
(5, 'Menu', 'BLOG', 'Blog', 'Blog', 'Blog'),
(6, 'Menu', 'HELP', 'Help', 'Hilfe', 'aider'),
(7, 'Menu', 'MY_KNEWDOG', 'My Knewdog', 'Meine Knewdog', 'mon Knewdog'),
(8, 'Menu', 'LOGIN', 'Login', 'Anmelden', 'Connexion'),
(9, 'Header', 'HEADER_TITLE', 'The World''s Safest<br/>Newsletter Library', 'Sicherste der Welt<br/>Newsletter-Bibliothek', 'La plus sûre du monde<br/>bulletin Bibliothèque'),
(10, 'Header', 'SIGN_IN_WITH', 'Sign in with', 'Anmeldung mit', 'Connectez-vous avec'),
(11, 'Header', 'FACEBOOK', 'Facebook', 'Facebook', 'Facebook'),
(12, 'Header', 'GOOGLE', 'Google', 'Google', 'Google'),
(13, 'Footer', 'ACCOUNTS', 'Accounts', 'Konten', 'comptes'),
(14, 'Footer', 'SIGN_UP_F', 'Sign Up (0€!)', 'Registrieren (0 €!)', 'Inscrivez-vous (0 €!)'),
(15, 'Footer', 'LOGIN_F', 'Login', 'Anmelden', 'Connexion'),
(16, 'Footer', 'LEARN_MORE', 'Learn More', 'Erfahren Sie mehr', 'En savoir plus'),
(17, 'Footer', 'UPGRADE_TO_PRO', 'Upgrade to Pro', 'Upgrade auf Pro', 'Upgrade to Pro'),
(18, 'Footer', 'ABOUT', 'About', '', ''),
(19, 'Footer', 'WHAT_FOR', 'What for?', '', ''),
(20, 'Footer', 'BLOG_F', 'Blog', '', ''),
(21, 'Footer', 'CONTACT_US', 'Contact Us', '', ''),
(22, 'Footer', 'SUPPORT_US', 'Support Us', '', ''),
(23, 'Footer', 'HELP_F', 'Help', '', ''),
(24, 'Footer', 'GETTING_STARTED', 'Getting Started', '', ''),
(25, 'Footer', 'FAQ', 'FAQ', '', ''),
(26, 'Footer', 'FOLLOW_US', 'Follow us...', '', ''),
(27, 'Footer', 'COPYRIGHT', '&copy; 2013 knewdog! all rights reserved', '', ''),
(28, 'Footer', 'LEGAL', 'Legal', '', ''),
(29, 'Home page', 'HOME_HEAD_TEXT', 'Subscribe to any newsletter of the world without giving your email address away!', '', ''),
(30, 'Home page', 'HOME_SUB_TEXT', 'It’s like your own dog trained to bring your newsletters when you need them, to the place you want them…', '', ''),
(32, 'Home page', 'QUICK_SING_UP', 'Quick sign up with your e-mail address.', '', ''),
(33, 'Home page', 'FOR_A_FREE_ACCOUNT', 'for a free account', '', ''),
(34, 'Home page', 'AND_FROM_NOW', 'And from now on knewdog! will protect your mailbox from spam and virus.', '', ''),
(35, 'Home page', 'LEARN_MORE_H', 'Learn more', '', ''),
(36, 'Header small', 'HEADER_TITLE_SMALL', 'The World''s Safest Newsletter Library', '', ''),
(37, 'Signup', 'SIGNUP_TITLE1', 'You want to get newsletters without giving your email address away?', '', ''),
(38, 'Signup', 'SIGNUP_NOW', 'Sign up now and get a 3 months Pro account', '', ''),
(39, 'Signup', 'FOR_FREE', 'FOR FREE', '', ''),
(40, 'Signup', 'SIGN_IN_WITH_SIGNUP', 'Sign in with', '', ''),
(41, 'Signup', 'QUICK_SING_UP_SIGNUP', 'Quick sign up with your e-mail address', '', ''),
(42, 'Signup', 'USERNAME', 'Username', '', ''),
(43, 'Signup', 'YOUR_EMAIL_ADD', 'Your e-mail address', '', ''),
(44, 'Signup', 'BY_CLICKING', 'By clicking “Sign Up!”, you are indicating you have read and agreed to knewdogs Terms of Use', '', ''),
(45, 'Signup', 'ITS_FREE', 'it''s FREE', '', ''),
(46, 'Signup', 'HOW_DOES', 'How does it work', '', ''),
(47, 'Signup', 'SIGNUP_WITH_YOUR', 'Sign up with your e-mail or your preferred social account. It’s free!', '', ''),
(48, 'Signup', 'BROWSE_OUR', 'Browse our extensive newsletter library online!', '', ''),
(49, 'Signup', 'READ_THE_NEWSLETTERS', 'Read the newsletters you like online.', '', ''),
(50, 'Signup', 'DID_NOT_FIND', 'Did not find your favourite newsletter? We will order it for you.', '', ''),
(51, 'Signup', 'OUR_PROMISE', 'Our promise: No newsletter provider will ever get access to your e-mail address!', '', ''),
(52, 'Signup', 'NEW_FEATURES', 'New features to be coming up!', '', ''),
(53, 'Signup', 'GET_ALL_YOUR', 'Get all your favourite newsletters in one single e-mail.', '', ''),
(54, 'Signup', 'CHOOSE_DATE', 'Choose date and time when you want to get your newsletters.', '', ''),
(55, 'Signup', 'SELECT_INDIVIDUAL', 'Select individual e-mail address for different newsletter topics (e.g. work e-mail address for work related topics)', '', ''),
(56, 'Signup', 'THE_FEEDBACK', 'The feedback of other users will help you find the best newsletter for your needs.', '', ''),
(57, 'Signup', 'QUICK_AND_EASY', 'Quick and easy newsletter ordering on any site you are surfing on.', '', ''),
(58, 'Signup', 'COMPANY_ACCOUNTS', 'Company accounts optimise the information flow for every employee through effective newsletter management.', '', ''),
(59, 'login', 'LOGIN_POPUP', 'LogIn', '', ''),
(60, 'login', 'QUICK_SIGN_IN_POPUP', 'Quick sign In with your Username and Password.', '', ''),
(61, 'login', 'USERNAME_LOGIN', 'Username', '', ''),
(62, 'login', 'PASSWORD_LOGIN', 'Password', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE IF NOT EXISTS `newsletter` (
  `newsletter_id` int(11) NOT NULL AUTO_INCREMENT,
  `newsletter_rand_id` varchar(255) NOT NULL,
  `sn` varchar(255) NOT NULL,
  `newsletter_relation` enum('parent','child') NOT NULL DEFAULT 'parent',
  `newsletter_email` varchar(255) NOT NULL,
  `blacklist_index` int(11) NOT NULL,
  `blacklist_flag` enum('YES','NO') NOT NULL DEFAULT 'NO',
  `newsletter_name` varchar(255) NOT NULL,
  `headline` text NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `about_author` text NOT NULL,
  `author_country` varchar(255) NOT NULL,
  `author_zipcode` varchar(255) NOT NULL,
  `author_city` varchar(255) NOT NULL,
  `newsletter_type` varchar(255) NOT NULL,
  `language_id` int(11) NOT NULL,
  `newsletter_category_id` varchar(255) NOT NULL,
  `newsletter_keyword_id` varchar(255) NOT NULL,
  `adult_content` enum('YES','NO') NOT NULL DEFAULT 'NO',
  `email` varchar(255) NOT NULL,
  `website_url` varchar(255) NOT NULL,
  `video` text NOT NULL,
  `screenshot` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `i_firstname` varchar(255) NOT NULL,
  `i_lastname` varchar(255) NOT NULL,
  `i_company_name` varchar(255) NOT NULL,
  `i_town` varchar(255) NOT NULL,
  `i_zip_code` int(11) NOT NULL,
  `i_country` varchar(255) NOT NULL,
  `user_comments` text NOT NULL,
  `ratings` text NOT NULL,
  `frequency` varchar(255) NOT NULL,
  `publisher_account_id` int(11) NOT NULL,
  `last_updated_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `added_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`newsletter_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`newsletter_id`, `newsletter_rand_id`, `sn`, `newsletter_relation`, `newsletter_email`, `blacklist_index`, `blacklist_flag`, `newsletter_name`, `headline`, `author_name`, `about_author`, `author_country`, `author_zipcode`, `author_city`, `newsletter_type`, `language_id`, `newsletter_category_id`, `newsletter_keyword_id`, `adult_content`, `email`, `website_url`, `video`, `screenshot`, `description`, `i_firstname`, `i_lastname`, `i_company_name`, `i_town`, `i_zip_code`, `i_country`, `user_comments`, `ratings`, `frequency`, `publisher_account_id`, `last_updated_date`, `added_date`, `status`) VALUES
(17, 'APR1446463N', 'APR1446463N140415125550', 'parent', '', 0, 'NO', 'demo', 'demo', 'Hardik', '', '', '', '', '', 0, '5', '', 'NO', '', 'http://www.knewdog.com', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '2014-04-15 12:55:50', '2014-04-15 11:40:30', 'Active'),
(18, 'APR1495111N', 'APR1495111N140415131303', 'parent', '', 0, 'NO', 'demo', 'demo', 'Hardik', '', '', '', '', '', 0, '5', '2', 'NO', '', 'http://www.knewdog.com', 'asdf@@@asdf', '', '', '', '', '', '', 0, '', '', '', '', 0, '2014-04-15 13:13:03', '2014-04-15 13:13:03', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_category`
--

DROP TABLE IF EXISTS `newsletter_category`;
CREATE TABLE IF NOT EXISTS `newsletter_category` (
  `newsletter_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`newsletter_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `newsletter_category`
--

INSERT INTO `newsletter_category` (`newsletter_category_id`, `category_name`, `status`) VALUES
(1, 'category 1', 'Inactive'),
(5, 'category 2', 'Active'),
(6, 'category 3', 'Active'),
(7, 'category 4', 'Active'),
(8, 'category 5', 'Active'),
(9, 'category 6', 'Active'),
(10, 'category 7', 'Active'),
(11, 'category 8', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_email`
--

DROP TABLE IF EXISTS `newsletter_email`;
CREATE TABLE IF NOT EXISTS `newsletter_email` (
  `newsletter_email_id` int(11) NOT NULL AUTO_INCREMENT,
  `newsletter_id` int(11) NOT NULL,
  `newsletter_rand_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`newsletter_email_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `newsletter_email`
--

INSERT INTO `newsletter_email` (`newsletter_email_id`, `newsletter_id`, `newsletter_rand_id`, `email`, `password`) VALUES
(8, 44, 'MAR1470666N', 'mar1470666n@amutechnologies.com', 'LBTMJtEV5c1TEVVP'),
(9, 45, 'MAR1419766N', 'mar1419766n@amutechnologies.com teWUpHZB', 'kdkVYZFWCl0VrlUP'),
(10, 46, 'MAR1478782N', 'mar1478782n@amutechnologies.com', 'WhkUTdVVWFWTHVVP'),
(12, 48, 'MAR1417316N', 'mar1417316n@amutechnologies.com', 'ThkQQZlaSJlWrNXP'),
(13, 49, 'MAR1474278N', 'mar1474278n@amutechnologies.com', 'hBTMSVmVap2VXtWP'),
(14, 50, 'MAR1410895N', 'mar1410895n@amutechnologies.com', 'ipmVQRmRwlnWr1UP'),
(20, 17, 'APR1446463N', 'apr1446463n@amutechnologies.com', 'OBjTZl1a1sWVslVP'),
(21, 18, 'APR1495111N', 'apr1495111n@amutechnologies.com', 'XpGaSJGMWJnTzkVP');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_keyword`
--

DROP TABLE IF EXISTS `newsletter_keyword`;
CREATE TABLE IF NOT EXISTS `newsletter_keyword` (
  `newsletter_keyword_id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword_define` text NOT NULL,
  `en` text NOT NULL,
  `de` text NOT NULL,
  `fr` text NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`newsletter_keyword_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `newsletter_keyword`
--

INSERT INTO `newsletter_keyword` (`newsletter_keyword_id`, `keyword_define`, `en`, `de`, `fr`, `status`) VALUES
(2, 'KEYWORD_1', 'keyword 1 for english', '', '', 'Active'),
(3, 'KEYWORD_3', 'keywod 3 in english', '', '', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(40) DEFAULT NULL,
  `stock` double DEFAULT NULL,
  `cost_price` double DEFAULT NULL,
  `sell_price` double DEFAULT NULL,
  `manufacture_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `description`, `stock`, `cost_price`, `sell_price`, `manufacture_id`) VALUES
(1, 'this is chocolatge', 200, 20, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `site_language`
--

DROP TABLE IF EXISTS `site_language`;
CREATE TABLE IF NOT EXISTS `site_language` (
  `site_language_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_shortcode` varchar(255) NOT NULL,
  `language_longform` varchar(255) NOT NULL,
  `language_flag` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`site_language_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `site_language`
--

INSERT INTO `site_language` (`site_language_id`, `language_shortcode`, `language_longform`, `language_flag`, `status`) VALUES
(1, 'en', 'English', '89a7319f2709900a7f6e482442c0ed10.png', 'Active'),
(2, 'de', 'German', '70799cd534455b1d8c9b82cc2aaf8b85.png', 'Active'),
(5, 'fr', 'French', '257e6542e3837d1b971c30c3938c8d97.png', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_rand_id` bigint(11) NOT NULL,
  `fb_id` varchar(255) NOT NULL,
  `google_id` varchar(255) NOT NULL,
  `type_of_membership` varchar(4) NOT NULL,
  `type_of_user` varchar(255) NOT NULL,
  `company_account_id` int(11) NOT NULL,
  `publisher_account_id` int(11) NOT NULL,
  `date_of_registration` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `username` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `privacy` enum('YES','NO') NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `town` varchar(255) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `language_id` int(11) NOT NULL,
  `language_interface` text NOT NULL,
  `user_interests` text NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `primary_email` varchar(255) NOT NULL,
  `additional_email1` varchar(255) NOT NULL,
  `additional_email2` varchar(255) NOT NULL,
  `i_firstname` varchar(255) NOT NULL,
  `i_lastname` varchar(255) NOT NULL,
  `i_company_name` varchar(255) NOT NULL,
  `i_street` text NOT NULL,
  `i_town` varchar(255) NOT NULL,
  `i_zip_code` int(11) NOT NULL,
  `i_country` varchar(255) NOT NULL,
  `scheduling_datasets` text NOT NULL,
  `scheduling_information` text NOT NULL,
  `mail_address` varchar(255) NOT NULL,
  `ids_of_newsletters` text NOT NULL,
  `sn_of_last_newsletter` int(11) NOT NULL,
  `next_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `no_ads` enum('YES','NO') NOT NULL DEFAULT 'NO',
  `adult_content` enum('YES','NO') NOT NULL DEFAULT 'NO',
  `privacy_settings` enum('YES','NO') NOT NULL DEFAULT 'NO',
  `private_knewdog_email` varchar(255) NOT NULL,
  `primary_email_2` varchar(255) NOT NULL,
  `spam_folder` text NOT NULL,
  `account_confirmed` enum('YES','NO') NOT NULL DEFAULT 'NO',
  `invoice_address` text NOT NULL,
  `invoice_numbers` text NOT NULL,
  `end_of_term` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_rand_id`, `fb_id`, `google_id`, `type_of_membership`, `type_of_user`, `company_account_id`, `publisher_account_id`, `date_of_registration`, `username`, `password`, `privacy`, `avatar`, `gender`, `firstname`, `lastname`, `town`, `zip_code`, `country`, `language_id`, `language_interface`, `user_interests`, `last_login`, `primary_email`, `additional_email1`, `additional_email2`, `i_firstname`, `i_lastname`, `i_company_name`, `i_street`, `i_town`, `i_zip_code`, `i_country`, `scheduling_datasets`, `scheduling_information`, `mail_address`, `ids_of_newsletters`, `sn_of_last_newsletter`, `next_datetime`, `no_ads`, `adult_content`, `privacy_settings`, `private_knewdog_email`, `primary_email_2`, `spam_folder`, `account_confirmed`, `invoice_address`, `invoice_numbers`, `end_of_term`, `status`) VALUES
(1, 0, '', '', 'CAAD', '', 0, 0, '0000-00-00 00:00:00', 'admin', '0192023a7bbd73250516f069df18b500', '', '', 'Male', 'Admin', '', '', 0, '0', 0, '1', '', '2014-04-08 13:22:32', 'mail@mail.com', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, '0000-00-00 00:00:00', 'NO', 'NO', 'NO', '', '', '', 'NO', '', '', '', 'Active'),
(7, 0, '', '', 'PRE1', '', 0, 0, '0000-00-00 00:00:00', 'hardik1', '0192023a7bbd73250516f069df18b500', 'YES', '6f0a3fb064471847160dc9f280b81e45.png', 'Male', 'Hardik1', 'Joshi', 'asdf', 1245, '12455', 0, '2', '', '2014-04-08 13:15:18', 'mail2@mail.com', '', '', 'demo', 'dmeoq', 'demo', '', 'demo', 1233, 'contry', '', '', '', '', 0, '0000-00-00 00:00:00', 'NO', 'NO', 'NO', '', '', '', 'NO', '', '', '', 'Active'),
(9, 0, '', '', 'FREE', '', 0, 0, '2014-04-08 14:36:06', 'admin1', '0192023a7bbd73250516f069df18b500', 'YES', '', 'Neutral', 'name', 'lastname', 'town', 123456, '99', 0, '1', '2,3', '2014-04-15 14:44:53', 'name@mail.com', 'mail@mail.com', 'mail@mail.com', 'name', 'last', 'comapny', '', 'town', 125, '99', '', '', '', '', 0, '0000-00-00 00:00:00', 'NO', 'NO', 'NO', '', '', '', 'NO', '', '', '', 'Active'),
(10, 341706455, '', '', 'FREE', '', 0, 0, '2014-04-16 06:26:19', 'admin11', '0192023a7bbd73250516f069df18b500', 'YES', '', 'Male', 'name', '', '', 0, '3', 5, '2', '', '2014-04-16 06:28:02', 'name1@mail.com', '', '', '', '', '', '', '', 0, '3', '', '', '', '', 0, '0000-00-00 00:00:00', 'NO', 'NO', 'NO', '', '', '', 'YES', '', '', '', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `user_role_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`user_role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`user_role_id`, `user_id`, `user_role`, `status`) VALUES
(1, 1, 'power_admin', 'Active');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
