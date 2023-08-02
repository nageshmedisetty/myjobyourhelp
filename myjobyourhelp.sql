-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2023 at 11:04 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myjobyourhelp`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `userId` int(11) NOT NULL,
  `reciverId` int(11) NOT NULL,
  `message` text NOT NULL,
  `read_msg` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `datetime`, `userId`, `reciverId`, `message`, `read_msg`, `status`) VALUES
(1, '2023-02-07 08:45:27', 6, 5, 'Hi', 1, 1),
(2, '2023-02-07 08:45:27', 6, 5, 'My Name is Bhavya', 1, 1),
(3, '2023-02-07 08:45:27', 6, 5, 'I need Your Help', 1, 1),
(4, '2023-01-06 11:00:00', 6, 1, 'Hello', 1, 1),
(5, '2023-02-06 11:10:00', 6, 1, 'Can you update your profile now', 1, 1),
(6, '2023-02-07 08:45:27', 5, 6, 'Ok', 1, 1),
(7, '2023-02-07 08:45:27', 5, 6, 'When we can meet', 1, 1),
(8, '2023-02-07 08:45:27', 6, 5, 'Today Evening', 1, 1),
(9, '2023-02-07 08:45:27', 5, 6, 'Ok the call me eving at 5:00 Pm', 1, 1),
(10, '2023-02-07 08:45:27', 6, 5, 'your phone number ?? Please...', 1, 1),
(11, '2023-02-07 08:45:27', 5, 6, 'My Phone Number is 9177012346', 1, 1),
(12, '2023-02-07 08:45:27', 6, 5, 'Ok Thank You', 1, 1),
(13, '2023-02-07 08:45:27', 6, 1, 'Hello Mr. Nagesh Medisetty', 1, 1),
(14, '2023-02-07 16:45:27', 1, 6, 'Hello Bhavya', 1, 1),
(15, '2023-02-07 17:45:27', 1, 6, 'How are you', 1, 1),
(16, '2023-02-07 15:56:52', 6, 1, 'Fine', 1, 1),
(17, '2023-02-07 15:56:52', 5, 1, 'HI', 1, 1),
(18, '2023-02-07 16:11:59', 5, 6, 'Same To You', 1, 1),
(19, '2023-02-07 16:12:21', 5, 1, 'Hello Nagesh', 1, 1),
(20, '2023-02-07 16:12:28', 5, 1, 'How r u', 1, 1),
(21, '2023-03-28 13:32:39', 5, 4, 'hu', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_countrys`
--

CREATE TABLE `tbl_countrys` (
  `id` int(11) NOT NULL,
  `code` varchar(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_countrys`
--

INSERT INTO `tbl_countrys` (`id`, `code`, `name`, `is_active`) VALUES
(1, 'IN', 'India', 1),
(2, 'US', 'United States', 1),
(3, 'AF', 'Afghanistan', 1),
(4, 'AX', 'Aland Islands', 1),
(5, 'AL', 'Albania', 1),
(6, 'DZ', 'Algeria', 1),
(7, 'AS', 'American Samoa', 1),
(8, 'AD', 'Andorra', 1),
(9, 'AO', 'Angola', 1),
(10, 'AI', 'Anguilla', 1),
(11, 'AQ', 'Antarctica', 1),
(12, 'AG', 'Antigua and Barbuda', 1),
(13, 'AR', 'Argentina', 1),
(14, 'AM', 'Armenia', 1),
(15, 'AW', 'Aruba', 1),
(16, 'AU', 'Australia', 1),
(17, 'AT', 'Austria', 1),
(18, 'AZ', 'Azerbaijan', 1),
(19, 'BS', 'Bahamas', 1),
(20, 'BH', 'Bahrain', 1),
(21, 'BD', 'Bangladesh', 1),
(22, 'BB', 'Barbados', 1),
(23, 'BY', 'Belarus', 1),
(24, 'BE', 'Belgium', 1),
(25, 'BZ', 'Belize', 1),
(26, 'BJ', 'Benin', 1),
(27, 'BM', 'Bermuda', 1),
(28, 'BT', 'Bhutan', 1),
(29, 'BO', 'Bolivia', 1),
(30, 'BQ', 'Bonaire, Sint Eustatius and Sa', 1),
(31, 'BA', 'Bosnia and Herzegovina', 1),
(32, 'BW', 'Botswana', 1),
(33, 'BV', 'Bouvet Island', 1),
(34, 'BR', 'Brazil', 1),
(35, 'IO', 'British Indian Ocean Territory', 1),
(36, 'BN', 'Brunei Darussalam', 1),
(37, 'BG', 'Bulgaria', 1),
(38, 'BF', 'Burkina Faso', 1),
(39, 'BI', 'Burundi', 1),
(40, 'KH', 'Cambodia', 1),
(41, 'CM', 'Cameroon', 1),
(42, 'CA', 'Canada', 1),
(43, 'CV', 'Cape Verde', 1),
(44, 'KY', 'Cayman Islands', 1),
(45, 'CF', 'Central African Republic', 1),
(46, 'TD', 'Chad', 1),
(47, 'CL', 'Chile', 1),
(48, 'CN', 'China', 1),
(49, 'CX', 'Christmas Island', 1),
(50, 'CC', 'Cocos (Keeling) Islands', 1),
(51, 'CO', 'Colombia', 1),
(52, 'KM', 'Comoros', 1),
(53, 'CG', 'Congo', 1),
(54, 'CD', 'Congo, Democratic Republic of ', 1),
(55, 'CK', 'Cook Islands', 1),
(56, 'CR', 'Costa Rica', 1),
(57, 'CI', 'Cote D\'Ivoire', 1),
(58, 'HR', 'Croatia', 1),
(59, 'CU', 'Cuba', 1),
(60, 'CW', 'Curacao', 1),
(61, 'CY', 'Cyprus', 1),
(62, 'CZ', 'Czech Republic', 1),
(63, 'DK', 'Denmark', 1),
(64, 'DJ', 'Djibouti', 1),
(65, 'DM', 'Dominica', 1),
(66, 'DO', 'Dominican Republic', 1),
(67, 'EC', 'Ecuador', 1),
(68, 'EG', 'Egypt', 1),
(69, 'SV', 'El Salvador', 1),
(70, 'GQ', 'Equatorial Guinea', 1),
(71, 'ER', 'Eritrea', 1),
(72, 'EE', 'Estonia', 1),
(73, 'ET', 'Ethiopia', 1),
(74, 'FK', 'Falkland Islands (Malvinas)', 1),
(75, 'FO', 'Faroe Islands', 1),
(76, 'FJ', 'Fiji', 1),
(77, 'FI', 'Finland', 1),
(78, 'FR', 'France', 1),
(79, 'GF', 'French Guiana', 1),
(80, 'PF', 'French Polynesia', 1),
(81, 'TF', 'French Southern Territories', 1),
(82, 'GA', 'Gabon', 1),
(83, 'GM', 'Gambia', 1),
(84, 'GE', 'Georgia', 1),
(85, 'DE', 'Germany', 1),
(86, 'GH', 'Ghana', 1),
(87, 'GI', 'Gibraltar', 1),
(88, 'GR', 'Greece', 1),
(89, 'GL', 'Greenland', 1),
(90, 'GD', 'Grenada', 1),
(91, 'GP', 'Guadeloupe', 1),
(92, 'GU', 'Guam', 1),
(93, 'GT', 'Guatemala', 1),
(94, 'GG', 'Guernsey', 1),
(95, 'GN', 'Guinea', 1),
(96, 'GW', 'Guinea-Bissau', 1),
(97, 'GY', 'Guyana', 1),
(98, 'HT', 'Haiti', 1),
(99, 'HM', 'Heard Island and Mcdonald Isla', 1),
(100, 'VA', 'Holy See (Vatican City State)', 1),
(101, 'HN', 'Honduras', 1),
(102, 'HK', 'Hong Kong', 1),
(103, 'HU', 'Hungary', 1),
(104, 'IS', 'Iceland', 1),
(105, 'IN', 'India', 1),
(106, 'ID', 'Indonesia', 1),
(107, 'IR', 'Iran, Islamic Republic of', 1),
(108, 'IQ', 'Iraq', 1),
(109, 'IE', 'Ireland', 1),
(110, 'IM', 'Isle of Man', 1),
(111, 'IL', 'Israel', 1),
(112, 'IT', 'Italy', 1),
(113, 'JM', 'Jamaica', 1),
(114, 'JP', 'Japan', 1),
(115, 'JE', 'Jersey', 1),
(116, 'JO', 'Jordan', 1),
(117, 'KZ', 'Kazakhstan', 1),
(118, 'KE', 'Kenya', 1),
(119, 'KI', 'Kiribati', 1),
(120, 'KP', 'Korea, Democratic People\'s Rep', 1),
(121, 'KR', 'Korea, Republic of', 1),
(122, 'XK', 'Kosovo', 1),
(123, 'KW', 'Kuwait', 1),
(124, 'KG', 'Kyrgyzstan', 1),
(125, 'LA', 'Lao People\'s Democratic Republ', 1),
(126, 'LV', 'Latvia', 1),
(127, 'LB', 'Lebanon', 1),
(128, 'LS', 'Lesotho', 1),
(129, 'LR', 'Liberia', 1),
(130, 'LY', 'Libyan Arab Jamahiriya', 1),
(131, 'LI', 'Liechtenstein', 1),
(132, 'LT', 'Lithuania', 1),
(133, 'LU', 'Luxembourg', 1),
(134, 'MO', 'Macao', 1),
(135, 'MK', 'Macedonia, the Former Yugoslav', 1),
(136, 'MG', 'Madagascar', 1),
(137, 'MW', 'Malawi', 1),
(138, 'MY', 'Malaysia', 1),
(139, 'MV', 'Maldives', 1),
(140, 'ML', 'Mali', 1),
(141, 'MT', 'Malta', 1),
(142, 'MH', 'Marshall Islands', 1),
(143, 'MQ', 'Martinique', 1),
(144, 'MR', 'Mauritania', 1),
(145, 'MU', 'Mauritius', 1),
(146, 'YT', 'Mayotte', 1),
(147, 'MX', 'Mexico', 1),
(148, 'FM', 'Micronesia, Federated States o', 1),
(149, 'MD', 'Moldova, Republic of', 1),
(150, 'MC', 'Monaco', 1),
(151, 'MN', 'Mongolia', 1),
(152, 'ME', 'Montenegro', 1),
(153, 'MS', 'Montserrat', 1),
(154, 'MA', 'Morocco', 1),
(155, 'MZ', 'Mozambique', 1),
(156, 'MM', 'Myanmar', 1),
(157, 'NA', 'Namibia', 1),
(158, 'NR', 'Nauru', 1),
(159, 'NP', 'Nepal', 1),
(160, 'NL', 'Netherlands', 1),
(161, 'AN', 'Netherlands Antilles', 1),
(162, 'NC', 'New Caledonia', 1),
(163, 'NZ', 'New Zealand', 1),
(164, 'NI', 'Nicaragua', 1),
(165, 'NE', 'Niger', 1),
(166, 'NG', 'Nigeria', 1),
(167, 'NU', 'Niue', 1),
(168, 'NF', 'Norfolk Island', 1),
(169, 'MP', 'Northern Mariana Islands', 1),
(170, 'NO', 'Norway', 1),
(171, 'OM', 'Oman', 1),
(172, 'PK', 'Pakistan', 1),
(173, 'PW', 'Palau', 1),
(174, 'PS', 'Palestinian Territory, Occupie', 1),
(175, 'PA', 'Panama', 1),
(176, 'PG', 'Papua New Guinea', 1),
(177, 'PY', 'Paraguay', 1),
(178, 'PE', 'Peru', 1),
(179, 'PH', 'Philippines', 1),
(180, 'PN', 'Pitcairn', 1),
(181, 'PL', 'Poland', 1),
(182, 'PT', 'Portugal', 1),
(183, 'PR', 'Puerto Rico', 1),
(184, 'QA', 'Qatar', 1),
(185, 'RE', 'Reunion', 1),
(186, 'RO', 'Romania', 1),
(187, 'RU', 'Russian Federation', 1),
(188, 'RW', 'Rwanda', 1),
(189, 'BL', 'Saint Barthelemy', 1),
(190, 'SH', 'Saint Helena', 1),
(191, 'KN', 'Saint Kitts and Nevis', 1),
(192, 'LC', 'Saint Lucia', 1),
(193, 'MF', 'Saint Martin', 1),
(194, 'PM', 'Saint Pierre and Miquelon', 1),
(195, 'VC', 'Saint Vincent and the Grenadin', 1),
(196, 'WS', 'Samoa', 1),
(197, 'SM', 'San Marino', 1),
(198, 'ST', 'Sao Tome and Principe', 1),
(199, 'SA', 'Saudi Arabia', 1),
(200, 'SN', 'Senegal', 1),
(201, 'RS', 'Serbia', 1),
(202, 'CS', 'Serbia and Montenegro', 1),
(203, 'SC', 'Seychelles', 1),
(204, 'SL', 'Sierra Leone', 1),
(205, 'SG', 'Singapore', 1),
(206, 'SX', 'Sint Maarten', 1),
(207, 'SK', 'Slovakia', 1),
(208, 'SI', 'Slovenia', 1),
(209, 'SB', 'Solomon Islands', 1),
(210, 'SO', 'Somalia', 1),
(211, 'ZA', 'South Africa', 1),
(212, 'GS', 'South Georgia and the South Sa', 1),
(213, 'SS', 'South Sudan', 1),
(214, 'ES', 'Spain', 1),
(215, 'LK', 'Sri Lanka', 1),
(216, 'SD', 'Sudan', 1),
(217, 'SR', 'Suriname', 1),
(218, 'SJ', 'Svalbard and Jan Mayen', 1),
(219, 'SZ', 'Swaziland', 1),
(220, 'SE', 'Sweden', 1),
(221, 'CH', 'Switzerland', 1),
(222, 'SY', 'Syrian Arab Republic', 1),
(223, 'TW', 'Taiwan, Province of China', 1),
(224, 'TJ', 'Tajikistan', 1),
(225, 'TZ', 'Tanzania, United Republic of', 1),
(226, 'TH', 'Thailand', 1),
(227, 'TL', 'Timor-Leste', 1),
(228, 'TG', 'Togo', 1),
(229, 'TK', 'Tokelau', 1),
(230, 'TO', 'Tonga', 1),
(231, 'TT', 'Trinidad and Tobago', 1),
(232, 'TN', 'Tunisia', 1),
(233, 'TR', 'Turkey', 1),
(234, 'TM', 'Turkmenistan', 1),
(235, 'TC', 'Turks and Caicos Islands', 1),
(236, 'TV', 'Tuvalu', 1),
(237, 'UG', 'Uganda', 1),
(238, 'UA', 'Ukraine', 1),
(239, 'AE', 'United Arab Emirates', 1),
(240, 'GB', 'United Kingdom', 1),
(241, 'US', 'United States', 1),
(242, 'UM', 'United States Minor Outlying I', 1),
(243, 'UY', 'Uruguay', 1),
(244, 'UZ', 'Uzbekistan', 1),
(245, 'VU', 'Vanuatu', 1),
(246, 'VE', 'Venezuela', 1),
(247, 'VN', 'Viet Nam', 1),
(248, 'VG', 'Virgin Islands, British', 1),
(249, 'VI', 'Virgin Islands, U.s.', 1),
(250, 'WF', 'Wallis and Futuna', 1),
(251, 'EH', 'Western Sahara', 1),
(252, 'YE', 'Yemen', 1),
(253, 'ZM', 'Zambia', 1),
(254, 'ZW', 'Zimbabwe', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_requests`
--

CREATE TABLE `tbl_requests` (
  `tbl_request_id` int(11) NOT NULL,
  `request_seq_code` varchar(60) NOT NULL COMMENT 'REQ000001',
  `request_brief_description` text DEFAULT NULL,
  `request_technologies` text DEFAULT NULL,
  `request_details` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_date` datetime DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT current_timestamp(),
  `phone_request` int(11) NOT NULL,
  `whatsapp_request` int(11) NOT NULL,
  `email_request` int(11) NOT NULL,
  `chat_request` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_requests`
--

INSERT INTO `tbl_requests` (`tbl_request_id`, `request_seq_code`, `request_brief_description`, `request_technologies`, `request_details`, `status`, `is_active`, `created_date`, `created_by`, `updated_by`, `updated_date`, `phone_request`, `whatsapp_request`, `email_request`, `chat_request`) VALUES
(2, 'REQ000002', 'How do we create our corpus examples?', 'JAVA,REACT,MYSQL', 'The examples have been automatically selected from a section of our corpus. We use this multi-billion word collection of texts to research language usage and change over time. The corpus is a rich source of words in action from a wide variety of genres, allowing us to base our dictionaries on language as it is actually used. For example, evidence from the corpus shows that:\r\n\r\nNowadays, the word kith almost never appears by itself; practically all modern citations in the corpus come from the phrase kith and kin\r\nUsage of the words Brexit, vape, hygge and selfie have all increased dramatically over the past few years\r\nThe way we use wireless has changed – in the past we listened to the wireless, but now it’s most commonly used alongside words like broadband, internet and Bluetooth.\r\nAlthough the corpus examples were extracted using an algorithm and have not been editorially reviewed, we hope that you find the extra context a helpful addition to the main dictionary entry.\r\n\r\nAll Wikipedia examples retrieved in 2015. We acknowledge that the Wikipedia content may vary or update from time to time. If you discover any Wikipedia source that does not appear up to date, please notify us and we will address accordingly.\r\n\r\nIf you’d like to try some corpus research for yourself, why not have a look at Wordbanks Online and sign up for a free trial!', 1, 1, '2022-12-31 01:10:02', 1, 1, '2023-01-29 08:04:40', 0, 0, 0, 0),
(3, 'REQ000003', 'Convert Array to comma separated String in JavaScript', 'JAVASCRIPT,JQUERY', 'Join Together Array Items as a String in JavaSript\r\nOne of JavaScript’s most helpful built-in array methods is .join() (Array.prototype.join()), which returns a string primitive.\r\n\r\n“The join() method creates and returns a new string by concatenating all of the elements in an array (or an array-like object), separated by commas or a specified separator string.” — MDN Docs\r\n\r\nYou can use any separator you want. In fact, the separator string can be anything at all, of any number of characters.\r\n\r\nThat means it’s easy to turn your JavaScript array into a comma-separated list format, whether you’d like to add just a comma or a comma and a space.', 1, 1, '2022-12-31 01:10:02', 2, NULL, NULL, 0, 0, 0, 0),
(6, 'REQ000006', 'brief description', 'WORK,END', 'A report was published in 1959, containing a gazetteer and brief description of the survivors; since then, more detailed catalogues have appeared.\r\nTimes, Sunday Times\r\nSend us your details, a brief description of your find (use our format) and, if possible, a picture of yourself and your tasty treat.\r\nST\r\nWhen the app recognises what it sees, it displays a brief description.\r\nTimes, Sunday Times\r\nOnline letting websites allow homeowners to enter brief description of their rooms or properties along with photographs.\r\nTimes, Sunday Times', 1, 1, '2022-12-31 01:25:47', 3, NULL, NULL, 0, 0, 0, 0),
(7, 'REQ000007', '1234567', '12345', '2345678', 1, 1, '2022-12-31 01:32:39', 4, NULL, NULL, 0, 0, 0, 0),
(8, 'REQ000008', 'Shriram City Union Finance Limited - Service Provider of corporate finance advisory, banking finance services & financial consultancy services in Visakhapatnam, Andhra Pradesh.', 'Java,React Js,Mysql', 'Shriram City Union Finance Limited\r\nPlot No. 106, 6Th Lay Out Sramasakthinagar, Chinamushidiwada, Pendurthi, Visakhapatnam, Andhra Pradesh, India', 1, 1, '2023-01-22 08:11:31', 5, NULL, '2023-01-22 12:41:31', 0, 0, 0, 0),
(9, 'REQ000009', 'NAGESWARA RAO MEDISETTY is popularly known as NAGESH ELECTRICAL AND PLUMBING WORKS. It is a Proprietorship with its office registered in Telangana . The company carries out its major operations from Telangana.\r\n\r\nThe company got registered under GST on December 1, 2021 and was allotted 36ATIPM1637N1Z9 as the GST Number. The status of this GSTIN is Active. This company is a Regular taxpayer .', 'HTML,JAVASCRIPT,CSS', 'GST Number of NAGESWARA RAO MEDISETTY', 1, 1, '2023-01-29 12:12:49', 5, NULL, '2023-01-29 16:42:49', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request_approvels`
--

CREATE TABLE `tbl_request_approvels` (
  `id` int(11) NOT NULL,
  `reqId` int(11) NOT NULL,
  `provId` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` int(11) NOT NULL,
  `whatsapp` int(11) NOT NULL,
  `chat` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 5,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_request_approvels`
--

INSERT INTO `tbl_request_approvels` (`id`, `reqId`, `provId`, `phone`, `email`, `whatsapp`, `chat`, `date`, `status`, `is_active`) VALUES
(1, 8, 1, 2, 1, 2, 0, '2023-01-29 17:16:09', 2, 1),
(2, 8, 2, 2, 1, 2, 0, '2023-02-06 11:42:35', 2, 1),
(3, 8, 3, 2, 1, 2, 0, '2023-02-06 11:44:01', 2, 1),
(4, 9, 4, 2, 1, 2, 0, '2023-02-06 12:09:52', 7, 1),
(5, 6, 1, 1, 1, 0, 0, '2023-03-31 16:09:14', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request_images`
--

CREATE TABLE `tbl_request_images` (
  `request_image_id` int(11) NOT NULL,
  `request_image` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `request_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_request_images`
--

INSERT INTO `tbl_request_images` (`request_image_id`, `request_image`, `is_active`, `request_id`) VALUES
(2, '56902.jpg', 1, 3),
(4, 'd15c8.jpg', 1, 6),
(5, 'a9554.jpg', 1, 7),
(6, 'a0fa9.jpg', 1, 2),
(7, '42ce3.jpg', 1, 2),
(8, '272c9.jpg', 1, 2),
(9, '5e500.jpg', 1, 8),
(10, 'd9cc3.jpg', 1, 2),
(11, 'f6301.jpg', 1, 9),
(12, '63423.jpg', 1, 9),
(13, '04f68.jpg', 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request_providers`
--

CREATE TABLE `tbl_request_providers` (
  `id` int(11) NOT NULL,
  `requestId` int(11) NOT NULL,
  `providerId` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_request_providers`
--

INSERT INTO `tbl_request_providers` (`id`, `requestId`, `providerId`, `status`) VALUES
(1, 8, 1, 1),
(4, 6, 1, 1),
(5, 3, 1, 1),
(6, 8, 2, 1),
(7, 8, 3, 1),
(8, 9, 4, 1),
(9, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reviews`
--

CREATE TABLE `tbl_reviews` (
  `id` int(11) NOT NULL,
  `reqId` int(11) NOT NULL,
  `provId` int(11) NOT NULL,
  `requesterId` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `description` text NOT NULL,
  `rating` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_reviews`
--

INSERT INTO `tbl_reviews` (`id`, `reqId`, `provId`, `requesterId`, `date`, `description`, `rating`, `status`, `created_by`) VALUES
(1, 9, 4, 5, '2023-02-06 19:18:21', 'Now the employee can be joined back after he has rejected his offer upon modification of the code in', 2, 1, 5),
(2, 9, 4, 5, '2023-02-06 19:18:50', 'ertyuiop', 3, 1, 5),
(3, 9, 4, 5, '2023-02-06 19:19:42', 'Started working on this code. Madde some changes in employee state and progress bar.', 1, 1, 5),
(4, 9, 4, 5, '2023-02-06 19:20:30', 'After the rejection of employee, the emp is moved to inactive records and should be moved to active.', 5, 1, 5),
(5, 9, 4, 5, '2023-03-28 12:34:48', 'This This is good review', 4, 1, 5),
(6, 9, 4, 5, '2023-03-28 12:41:50', 'Nice', 3, 1, 5),
(7, 8, 1, 5, '2023-03-28 12:55:27', 'sssssssssssss', 5, 1, 5),
(8, 8, 2, 5, '2023-03-28 12:55:37', 'qqqqqqqqqqqqqqq', 3, 1, 5),
(9, 8, 3, 5, '2023-03-28 12:55:49', 'trewqwe', 2, 1, 5),
(10, 9, 4, 5, '2023-07-06 12:38:52', 'Four Star', 4, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `status_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `color` varchar(15) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`status_id`, `name`, `class`, `color`, `status`) VALUES
(1, 'Open', 'badge badge-pill bg-success-light', '00ff49', 1),
(2, 'Close', 'badge badge-pill bg-danger-light', 'ff0000', 1),
(3, 'Assigned to me', 'badge badge-pill bg-info-light', 'ff2e2e', 1),
(4, 'Assigned to others', 'badge badge-pill bg-secondary', 'ff2e2e', 1),
(5, 'Not Assigned Yet', 'badge badge-pill bg-success', '34eb64', 1),
(6, 'Un Assign', 'badge badge-pill bg-success', 'ff2e2e', 1),
(7, 'Assigned', 'badge badge-pill bg-info-light', '06fffa', 1),
(8, 'Previously assigned', 'badge badge-pill bg-success-light', 'ff2e2e', 1),
(9, 'No Response Yet', 'badge badge-pill bg-success-light', 'ff2e2e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_details`
--

CREATE TABLE `tbl_user_details` (
  `tbl_user_id` int(11) NOT NULL,
  `tbl_user_code` varchar(15) NOT NULL,
  `tbl_user_first_name` varchar(60) NOT NULL,
  `tbl_user_last_name` varchar(60) NOT NULL,
  `tbl_user_email` text NOT NULL,
  `tbl_user_user_name` varchar(120) NOT NULL,
  `tbl_user_password` text NOT NULL,
  `tbl_user_moble` varchar(10) NOT NULL,
  `tbl_user_cuountry_code` varchar(6) NOT NULL,
  `tbl_user_provider` tinyint(1) NOT NULL COMMENT '1->Help Provider, 0-> Non-Provider ',
  `tbl_user_whatapp_no` varchar(10) DEFAULT NULL,
  `tbl_user_address` text DEFAULT NULL,
  `tbl_user_city` varchar(60) DEFAULT NULL,
  `tbl_user_state` varchar(60) DEFAULT NULL,
  `tbl_user_pin_code` varchar(6) DEFAULT NULL,
  `tbl_user_contry` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `user_image` text DEFAULT NULL,
  `tbl_technologies` text DEFAULT NULL,
  `phone_request` int(11) NOT NULL,
  `whatsapp_request` int(11) NOT NULL,
  `email_request` int(11) NOT NULL,
  `chat_request` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_details`
--

INSERT INTO `tbl_user_details` (`tbl_user_id`, `tbl_user_code`, `tbl_user_first_name`, `tbl_user_last_name`, `tbl_user_email`, `tbl_user_user_name`, `tbl_user_password`, `tbl_user_moble`, `tbl_user_cuountry_code`, `tbl_user_provider`, `tbl_user_whatapp_no`, `tbl_user_address`, `tbl_user_city`, `tbl_user_state`, `tbl_user_pin_code`, `tbl_user_contry`, `is_active`, `created_date`, `created_by`, `user_image`, `tbl_technologies`, `phone_request`, `whatsapp_request`, `email_request`, `chat_request`, `description`) VALUES
(1, 'MJYH000001', 'Nagesh', 'Medisetty', 'nageshvb2028@gmail.com', 'nagesh', 'fb0eec58ddc2c6caaa5e5c33d6a25ece', '9247916929', ' +91', 1, '9177012346', 'D.No.18-441/1, Santhapalem, Chinnagadhili', 'Dellass', 'Newyork', '530040', 1, 1, '2022-12-19 14:20:58', 1, '1f7f3.jpg', 'REACT JS,PHP,KOTLIN,JAVA', 0, 0, 0, 0, 'We\'re a friendly, industry-focused community of developers, IT pros, digital marketers, and technology enthusiasts meeting, networking, learning, and sharing knowledge.'),
(2, 'MJYH000002', 'Rajesh', 'Alluri', 'rajesh_alluri@gmail.com', 'rajesh', 'fb0eec58ddc2c6caaa5e5c33d6a25ece', '9247916929', ' +91', 1, '9247916929', 'Maddilapalem', 'VSKP', 'AP', '530040', 1, 1, '2022-12-19 14:24:18', 2, 'd0a6e.jpg', 'HTML, CSS', 0, 0, 0, 0, 'We\'re a friendly, industry-focused community of developers, IT pros, digital marketers, and technology enthusiasts meeting, networking, learning, and sharing knowledge.'),
(3, 'MJYH000003', 'kurma', 'Medisetty', 'kurma@vowerp.com', 'kurma', 'fb0eec58ddc2c6caaa5e5c33d6a25ece', '9885611220', ' +91', 1, '9247916929', 'Maddilapalem', 'VSKP', 'AP', '530040', 1, 1, '2023-01-03 22:19:16', 3, '067a9.jpg', 'JAVA, REACT JS, NODE JS', 0, 0, 0, 0, 'We\'re a friendly, industry-focused community of developers, IT pros, digital marketers, and technology enthusiasts meeting, networking, learning, and sharing knowledge.'),
(4, 'MJYH000004', 'Goush', 'Baba', 'goushbaba@gmail.com', 'goush', 'fb0eec58ddc2c6caaa5e5c33d6a25ece', '9292556300', ' +91', 1, '9632587410', 'Maddilapalem', 'VSKP', 'AP', '530040', 1, 1, '2023-01-03 22:35:50', 4, 'c4cba.jpg', '', 0, 0, 0, 0, 'We\'re a friendly, industry-focused community of developers, IT pros, digital marketers, and technology enthusiasts meeting, networking, learning, and sharing knowledge.'),
(5, 'MJYH000005', 'Krishna', 'Bandi', 'krishna@vowerp.com', 'krishna', 'fb0eec58ddc2c6caaa5e5c33d6a25ece', '9632587410', ' +91', 1, '9177012346', 'Maddilapalem', 'Visakhapatnam', 'AP', '530040', 1, 1, '2023-01-22 12:33:16', 5, '04507.jpg', 'JAVA,REACT JS,MYSQL', 0, 0, 0, 0, 'We\'re a friendly, industry-focused community of developers, IT pros, digital marketers, and technology enthusiasts meeting, networking, learning, and sharing knowledge.'),
(6, 'MJYH000006', 'Bhavya', 'Vow', 'bhavya@vowerp.com', 'bhavya', 'fb0eec58ddc2c6caaa5e5c33d6a25ece', '987546320', ' +91', 1, '987546320', 'Bellandure', 'Benguluru', 'Karnataka', '580034', 1, 1, '2023-02-07 12:20:37', 6, '8ef9d.jpg', 'React Js,Html,Css,JQuery,Javascript,Node Js,No Sql,Mysql,Sql Server', 0, 0, 0, 0, 'This is My description '),
(9, 'MJYH000009', 'Lakshmi', 'Bujji', 'bujji809@gmail.com', 'bujji809', 'fb0eec58ddc2c6caaa5e5c33d6a25ece', '9014455188', ' +91', 1, '9014455188', '', 'VSKP', 'AP', '', 1, 1, '2023-04-18 13:12:27', 9, '0225d.jpg', '', 0, 0, 0, 0, ''),
(10, 'MJYH000010', 'Munna', 'K', 'nagesh_m_2000@yahoo.com', 'munna', 'fb0eec58ddc2c6caaa5e5c33d6a25ece', '9632587418', ' +91', 1, '0000000000', '', 'Hyd', 'TS', '', 1, 1, '2023-04-18 13:28:32', 10, '1d3b8.jpg', '', 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_technologies`
--

CREATE TABLE `tbl_user_technologies` (
  `tbl_user_technologies_id` int(11) NOT NULL,
  `tbl_user_id` int(11) NOT NULL,
  `user_tech_name` varchar(60) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_technologies`
--

INSERT INTO `tbl_user_technologies` (`tbl_user_technologies_id`, `tbl_user_id`, `user_tech_name`, `is_active`) VALUES
(1, 1, 'REACT JS', 1),
(2, 1, 'PHP', 1),
(3, 1, 'KOTLIN', 1),
(4, 1, 'JAVA', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_tbl_requests`
-- (See below for the actual view)
--
CREATE TABLE `view_tbl_requests` (
`tbl_request_id` int(11)
,`request_seq_code` varchar(60)
,`request_brief_description` text
,`request_technologies` text
,`request_details` text
,`status` tinyint(1)
,`is_active` tinyint(1)
,`created_date` datetime
,`created_by` int(11)
,`updated_by` int(11)
,`updated_date` datetime
,`phone_request` int(11)
,`whatsapp_request` int(11)
,`email_request` int(11)
,`chat_request` int(11)
,`providerId` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `view_tbl_requests`
--
DROP TABLE IF EXISTS `view_tbl_requests`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_tbl_requests`  AS SELECT `tbl_requests`.`tbl_request_id` AS `tbl_request_id`, `tbl_requests`.`request_seq_code` AS `request_seq_code`, `tbl_requests`.`request_brief_description` AS `request_brief_description`, `tbl_requests`.`request_technologies` AS `request_technologies`, `tbl_requests`.`request_details` AS `request_details`, `tbl_requests`.`status` AS `status`, `tbl_requests`.`is_active` AS `is_active`, `tbl_requests`.`created_date` AS `created_date`, `tbl_requests`.`created_by` AS `created_by`, `tbl_requests`.`updated_by` AS `updated_by`, `tbl_requests`.`updated_date` AS `updated_date`, `tbl_requests`.`phone_request` AS `phone_request`, `tbl_requests`.`whatsapp_request` AS `whatsapp_request`, `tbl_requests`.`email_request` AS `email_request`, `tbl_requests`.`chat_request` AS `chat_request`, `tbl_request_providers`.`providerId` AS `providerId` FROM (`tbl_requests` left join `tbl_request_providers` on(`tbl_requests`.`tbl_request_id` = `tbl_request_providers`.`requestId`)) ORDER BY `tbl_requests`.`tbl_request_id` ASC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_countrys`
--
ALTER TABLE `tbl_countrys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_requests`
--
ALTER TABLE `tbl_requests`
  ADD PRIMARY KEY (`tbl_request_id`);

--
-- Indexes for table `tbl_request_approvels`
--
ALTER TABLE `tbl_request_approvels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_request_images`
--
ALTER TABLE `tbl_request_images`
  ADD PRIMARY KEY (`request_image_id`);

--
-- Indexes for table `tbl_request_providers`
--
ALTER TABLE `tbl_request_providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reviews`
--
ALTER TABLE `tbl_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `tbl_user_details`
--
ALTER TABLE `tbl_user_details`
  ADD PRIMARY KEY (`tbl_user_id`);

--
-- Indexes for table `tbl_user_technologies`
--
ALTER TABLE `tbl_user_technologies`
  ADD PRIMARY KEY (`tbl_user_technologies_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_countrys`
--
ALTER TABLE `tbl_countrys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT for table `tbl_requests`
--
ALTER TABLE `tbl_requests`
  MODIFY `tbl_request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_request_approvels`
--
ALTER TABLE `tbl_request_approvels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_request_images`
--
ALTER TABLE `tbl_request_images`
  MODIFY `request_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_request_providers`
--
ALTER TABLE `tbl_request_providers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_reviews`
--
ALTER TABLE `tbl_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_user_details`
--
ALTER TABLE `tbl_user_details`
  MODIFY `tbl_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_user_technologies`
--
ALTER TABLE `tbl_user_technologies`
  MODIFY `tbl_user_technologies_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
