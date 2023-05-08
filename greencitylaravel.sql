-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 08, 2023 at 06:46 AM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `greencitylaravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `mobile`, `designation`, `address`, `email_verified_at`, `password`, `publish`, `created_at`, `updated_at`) VALUES
(5, 'Developer Account', 'developer@f9tech.com', NULL, NULL, NULL, NULL, '$2y$10$3cFfSOQNm/o2GvUtuS/cIu1C3wDsFtz7ax38lqXd4LoYIAz0p11Ui', 1, '2023-01-19 11:41:46', '2023-01-19 11:41:46'),
(6, 'F9 admin', 'qa@f9tech.com', '797-804-1849', NULL, NULL, NULL, '$2y$10$WBMtG9hrzBX8ZI1Rrkf2XOLId2g9vrLmaf1.uRELuLuIMeg4JtBJq', 1, '2023-01-19 11:44:39', '2023-01-19 11:44:39');

-- --------------------------------------------------------

--
-- Table structure for table `application_settings`
--

CREATE TABLE `application_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `field_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `position` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'application-settings',
  `options` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `application_settings`
--

INSERT INTO `application_settings` (`id`, `field_name`, `slug`, `input_type`, `value`, `position`, `created_at`, `updated_at`, `category_id`, `type`, `options`) VALUES
(1, 'Logo', 'logo', 'file', '3zh4furrt.png', 2, '2022-11-27 20:34:31', '2023-05-08 00:18:22', 2, 'application-settings', NULL),
(2, 'Favicon', 'favicon', 'file', 'ijs74m3lc.webp', 4, '2022-11-27 20:39:17', '2023-05-08 00:18:22', 2, 'application-settings', NULL),
(3, 'Site Name', 'site-name', 'textbox', 'Green City Em School – Green City, Visakhapatnam', 1, '2022-11-27 20:40:30', '2023-05-08 00:18:22', 2, 'application-settings', NULL),
(18, 'Banner Image Width', 'banner-image-width', 'textbox', '1920', 15, '2022-12-01 21:28:53', '2023-05-08 00:18:03', NULL, 'developer-settings', NULL),
(19, 'Banner height', 'banner-height', 'textbox', '810', 14, '2022-12-01 22:23:27', '2023-05-08 00:18:03', NULL, 'developer-settings', NULL),
(30, 'Google recaptcha Settings', 'google-recaptcha-settings', 'heading', NULL, 6, NULL, '2023-05-08 00:18:22', NULL, 'general-settings', NULL),
(31, 'Google reCAPTCHA Site Key', 'google-recaptcha-site-key', 'textbox', '6LfYMCkaAAAAAJgNMXHqliCChLpZf3jnbDLBaCgk', 7, NULL, '2023-05-08 00:18:22', NULL, 'general-settings', NULL),
(32, 'Google reCAPTCHA Secret Key', 'google-recaptcha-secret-key', 'textbox', '6LfYMCkaAAAAAFGxo_MFOZjXd182Cfv6AiqyDlEI', 8, NULL, '2023-05-08 00:18:22', NULL, 'general-settings', NULL),
(33, 'Payment Settings', 'payment-settings', 'heading', NULL, 9, NULL, '2023-05-08 00:18:22', NULL, 'general-settings', NULL),
(34, 'Payment Mode', 'payment-mode', 'select', 'Live', 10, NULL, '2023-05-08 00:18:22', NULL, 'general-settings', 'Sandbox,Live'),
(39, 'Member Image Size', 'member-image-size', 'textbox', '100000', 11, '2022-12-28 00:20:09', '2023-05-08 00:18:03', 2, 'developer-settings', NULL),
(40, 'Banner Image Size', 'banner-image-size', 'textbox', '50000', 12, '2023-01-01 01:16:17', '2023-05-08 00:18:03', 2, 'developer-settings', NULL),
(41, 'Admin Mail', 'admin-mail', 'textbox', 'info@chicagoandhra.org', 13, '2023-01-03 01:10:11', '2023-05-08 00:18:03', 2, 'general-settings', NULL),
(42, 'Event Image Size', 'event-image-size', 'textbox', '5000', 5, '2023-01-03 19:33:51', '2023-05-08 00:18:22', 2, 'developer-settings', NULL),
(48, 'Logo Caption', 'logo-caption', 'textbox', 'Green City Em School', 3, '2023-04-15 05:50:06', '2023-05-08 00:18:22', 2, 'application-settings', NULL),
(49, 'address', 'address', 'textarea', '<p>Green City EM School</p>', 0, '2023-05-08 00:29:52', '2023-05-08 00:38:56', 1, 'general-settings', NULL),
(50, 'Primary Phone Number', 'primary-phone-number', 'textbox', '999-999-9999', 0, '2023-05-08 00:49:08', '2023-05-08 00:49:39', 1, 'general-settings', NULL),
(51, 'Primary Email', 'primary-email', 'textbox', 'greencityemschool@io', 0, '2023-05-08 00:53:49', '2023-05-08 00:54:25', 1, 'general-settings', NULL),
(52, 'Welcome Title', 'welcome-title', 'textbox', '<span>About</span>Green City Em School', 0, '2023-05-08 00:56:03', '2023-05-08 00:57:24', 6, 'home-page-blocks', NULL),
(53, 'Welcome Description', 'welcome-description', 'textarea', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam cursus tristique odio, in mollis enim ornare at. Nulla fringilla turpis nec libero feugiat, nec pellentesque dolor imperdiet. Vestibulum volutpat libero non magna dapibus fermentum. Sed molestie felis elementum, sodales massa a, tempus sem. Sed accumsan ex ligula, id sagittis justo consectetur et. Fusce fermentum laoreet diam in blandit. Nunc vestibulum nibh vel volutpat interdum. Donec elit turpis, gravida non placerat nec, laoreet sit amet dolor. Donec volutpat dui in felis lobortis porta.</p>', 0, '2023-05-08 00:58:44', '2023-05-08 00:59:38', 6, 'home-page-blocks', NULL),
(54, 'Welcome Blocks', 'welcome-blocks', 'heading', NULL, 0, '2023-05-08 01:00:59', '2023-05-08 01:01:25', 6, 'home-page-blocks', NULL),
(55, 'Welcome Block One Image', 'welcome-block-one-image', 'file', 'd4a5fz6jb.jpg', 0, '2023-05-08 01:08:03', '2023-05-08 01:10:22', 6, 'home-page-blocks', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Contact Details', '2022-11-30 18:49:20', '2022-11-30 18:49:20'),
(2, 'General', '2022-12-01 00:27:52', '2022-12-01 00:27:52'),
(6, 'Home Blocks', '2022-12-12 16:49:00', '2022-12-12 16:49:00');

-- --------------------------------------------------------

--
-- Table structure for table `child_details`
--

CREATE TABLE `child_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `child_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_tagline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `gallery` text COLLATE utf8mb4_unicode_ci,
  `seo_title` text COLLATE utf8mb4_unicode_ci,
  `seo_keywords` text COLLATE utf8mb4_unicode_ci,
  `seo_description` text COLLATE utf8mb4_unicode_ci,
  `main_menu` tinyint(4) NOT NULL DEFAULT '0',
  `top_menu` tinyint(4) NOT NULL DEFAULT '0',
  `side_menu` tinyint(4) NOT NULL DEFAULT '0',
  `footer_menu` tinyint(4) NOT NULL DEFAULT '0',
  `publish` tinyint(4) NOT NULL DEFAULT '1',
  `position` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `title`, `slug`, `parent`, `custom_url`, `banner_image`, `banner_title`, `banner_tagline`, `short_description`, `content`, `gallery`, `seo_title`, `seo_keywords`, `seo_description`, `main_menu`, `top_menu`, `side_menu`, `footer_menu`, `publish`, `position`, `created_at`, `updated_at`, `type`) VALUES
(1, 'About', 'about', 'root', NULL, 'k9pb0zch8.jpg', NULL, NULL, NULL, NULL, NULL, 'F9 Product', 'F9 Product', 'F9 Product', 1, 0, 0, 1, 1, 0, '2022-11-30 16:43:36', '2023-04-15 01:13:18', 'nopage'),
(13, 'Events', 'events', 'root', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 1, 0, '2022-11-30 20:21:14', '2023-04-18 04:50:24', 'nopage'),
(14, 'Latest Events', 'latest-events', '13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1, 0, '2022-11-30 20:23:38', '2023-01-04 23:47:32', 'pageview'),
(15, 'Past Events', 'past-events', '13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1, 0, '2022-11-30 20:26:58', '2022-11-30 20:26:58', NULL),
(16, 'Ongoing Events', 'ongoing-events', '13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1, 0, '2022-11-30 20:27:39', '2023-01-10 04:41:34', 'pageview'),
(21, 'Gallery', 'gallery', 'root', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 1, 1, 0, '2022-11-30 23:38:54', '2023-04-15 01:56:58', 'nopage'),
(22, 'Photos', 'photos', '21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1, 0, '2022-11-30 23:39:39', '2022-12-12 20:05:27', 'pageview'),
(23, 'Videos', 'videos', '21', NULL, NULL, 'Video Gallery', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1, 0, '2022-11-30 23:40:25', '2022-11-30 23:42:49', NULL),
(27, 'Terms and Conditions', 'terms-and-conditions', 'root', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1, 1, 0, '2023-01-11 13:37:45', '2023-01-11 13:37:45', 'pageview'),
(29, 'VPL Education Society', 'vpl-education-society', '1', NULL, NULL, NULL, NULL, NULL, '<section class=\"about-top\">\r\n<div class=\"container\">\r\n<div class=\"row align-items-center\">\r\n<div class=\"col-md-5 pic\">\r\n<figure class=\"pic-radius \"><img alt=\"GREEN CITY SCHOO\" src=\"http://127.0.0.1:8000/images/media/pk0g9bt29.jpg\" width=\"100%\" /></figure>\r\n</div>\r\n\r\n<div class=\"col-md-7 description\">\r\n<h2>WHY GREEN CITY SCHOOL ?</h2>\r\n\r\n<p>We intend to provide children with flexibility in learning. Allowing self-development by nurturing creativity. Following up on children&rsquo;s interests and enhance their learning. Provide Enough opportunities to develop skills and confidence. Allowing the children to use their own initiative.</p>\r\n\r\n<ol class=\"inner-list\">\r\n	<li>A Top class education on par with the best anywhere.</li>\r\n	<li>A great ambience to work hard and to develop all personality traits.</li>\r\n	<li>A position in society that will grant you pride and respect.</li>\r\n</ol>\r\n\r\n<h5 class=\"color-primary font-weight-700\">Campus features :</h5>\r\n\r\n<p>Fully equipped labs, Library with huge number of books, Swimming pool, Basket ball, table tennis, shuttle courts, Football ground, Well organized Transportation facility, CBSE Syllabus/NCERT Books</p>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n\r\n<section class=\"background-primary text-light text-center\">\r\n<div class=\"container\">\r\n<h2 class=\"font-weight-700 h1\">Affiliated to Central Board of Secondary Education, New Delhi vide affiliation number 130384 up to Secondary Level.</h2>\r\n</div>\r\n</section>\r\n\r\n<section class=\"mission-vision\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-md-6 missin-left\">\r\n<div class=\"inner\">\r\n<div class=\"text\">\r\n<h2 class=\"h1\">Mission</h2>\r\n\r\n<p>We, the Members and Team of the DPSE-Society acquire a Charter Excellence in Education, Social Service and Advanced Development of Human Values with a commitment</p>\r\n\r\n<p>We, the Members and Team of the DPSE-Society acquire a Excellence in Education, Social Service and Advanced Development of Human Values with a commitment Advanced Development of Human Values with a commitment</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-6 missin-right\">\r\n<div class=\"inner\">\r\n<div class=\"text\">\r\n<h2 class=\"h1\">Vision</h2>\r\n\r\n<p>We, the Members and Team of the DPSE-Society acquire a Charter Excellence in Education, Social Service and Advanced Development of Human Values with a commitment We, the Members and Team of the DPSE-Society acquire a Excellence in Education, Social Service and Advanced Development of Human Values with a commitment Advanced Development of Human Values with a commitment DPSE-Society acquire a Excellence in Education, Social Service and Advanced Development of Human Values with a commitment</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n\r\n<section class=\"our-goal background-image text-light\" style=\"background-image:url(\'http://127.0.0.1:8000/images/media/rf4v35dzj.jpg\');\">\r\n<div class=\"container\">\r\n<h2 class=\"text-center h1\">Our Goal</h2>\r\n\r\n<h3 class=\"text-center m-b-70\">We, the Members and Team of the DPSE-Society acquire a Charter of Excellence in Education, Social Service and Advanced Development of Human Values with a commitment:</h3>\r\n\r\n<ul class=\"inner-list list-large list-two-columns\">\r\n	<li>D.P.S Educational Society</li>\r\n	<li>Encourage every child to work to the best of his/her ability</li>\r\n	<li>Aims to offer world class educational training and learning activities.</li>\r\n	<li>To promote quality education through technological advancement.</li>\r\n	<li>Standardize education system with stress free and wholesome environment.</li>\r\n	<li>Best in Class Curriculum.</li>\r\n	<li>The D.P.S Educational Society</li>\r\n	<li>Encourage every child to work to the best of his/her ability.</li>\r\n	<li>Best in Class Curriculum.</li>\r\n	<li>The D.P.S Educational Society</li>\r\n	<li>Encourage every child to work to the best of his/her ability.</li>\r\n	<li>Best in Class Curriculum.</li>\r\n	<li>The D.P.S Educational Society</li>\r\n</ul>\r\n</div>\r\n</section>\r\n\r\n<section class=\"national-society\">\r\n<div class=\"container\">\r\n<div class=\"row align-items-center\">\r\n<div class=\"col-md-6 description mob-order-2\">\r\n<h2 class=\"inner-title\">The National Education Society</h2>\r\n\r\n<p>The enlightening world of streamlined education, where excellence has been redefined by the comprehensive efforts of the competent professionals and visionary management. We promise you a rewarding and mutually enriching experience that will lead you to the unchallenged and unexplored zenith of success.</p>\r\n\r\n<p>The National Education Society, Sarigam welcome you to the enlightening world of streamlined education, where excellence has been redefined by the comprehensive efforts of the competent professionals and visionary management. We promise you a rewarding and mutually enriching experience that will lead you to the unchallenged and unexplored zenith of success.</p>\r\n\r\n<p>The goal fo the school is to provide quality education and circulate the best standards of learning among children, with excellence. Focus is given on individual potential and each student is believed to be unique. The method of teaching is child-oriented and the atmosphere is warm and friendly. Inculcating values through practice helps to mould the children into responsible citizens of tomorrow.</p>\r\n</div>\r\n\r\n<div class=\"col-md-6 pic mob-order-1\">\r\n<figure class=\"pic-radius\"><img alt=\"GREEN CITY SCHOOl\" src=\"http://127.0.0.1:8000/images/media/5lfr3ckpa.jpg\" /></figure>\r\n</div>\r\n</div>\r\n</div>\r\n</section>', NULL, NULL, NULL, NULL, 1, 0, 0, 1, 1, 0, '2023-04-15 01:14:11', '2023-05-06 05:46:25', 'pageview'),
(30, 'Founder', 'founder', '1', NULL, NULL, NULL, NULL, NULL, '<section class=\"sidebar-left founder\" id=\"page-content\">\r\n                    <div class=\"container\">\r\n                    <div class=\"row\"><!-- content -->\r\n                    <div class=\"content col-lg-9\"><!-- Blog -->\r\n                    <div class=\"single-post\" id=\"blog\"><!-- Post single item-->\r\n                    <div class=\"post-item\">\r\n                    <div class=\"post-item-wrap\">\r\n                    <div class=\"post-item-description\">\r\n                    <h2 class=\"h1 color-primary\">Sri Bandi Suresh Kumar</h2>\r\n                    \r\n                    <div class=\"post-meta\"><span class=\"post-meta-comments\">VPL Group  Founder</span></div>\r\n                    \r\n                    <p><span class=\"color-primary font-weight-600\">The VPL Group</span> and VPL Educational Society was started by a young technocrat Mr Bandi Suresh Kumar with an engineering back ground. Over the last 25 years of the VPL Group journey he along with his team had expanded the businesses into Manufacturing of Steel, Special Steels, Power Plants, Logistics & Warehouses Infrastructure Services, Real Estate ,IT Steel Portal Services and CSR activities. Under <span class=\"color-primary font-weight-600\">Mr. Suresh Kumar\'s</span> leadership as MD of Vizag Profiles Pvt Ltd along with the other Directors the VPL Group has diversified and created good operating assets related in the City of Destiny Visakhapatnam.</p>\r\n                    \r\n        \r\n                    \r\n                    <p><span class=\"color-primary font-weight-600\">Mr. Bandi Suresh Kumar</span> is having expertise in Marketing & Sales, Raw Material Procurement, Financing and Administration. He has previously worked at the Sirpur Paper Mills Limited before venturing into Steel Trading. He has more than 25 years of experience in Steel & Logistics Industry. He holds a B.E. in Mechanical Engineering from Amravati University, Maharashtra.                                                                           As a part of the VPL Group CSR activities being done at all the Group companies in the last 25 years.                                            To promote education and other social services for all sections of the people VPL Group had constructed a Green City English Medium School in the Green City with all the required academic and sports infrastructure and good quality teachers had been operating for the last 15 years with the CBSE accreditation and syllabus from LKG to 10 th Standard and now planning and expanding upto 12th standard. Apart from school education VPL Educational Society is planning to start other training areas in the fields of Digital & Information Technologies for capacity building and applications development by incubations of small startups with ideations. VPL Educational Society and VPL Group is committed for CSR and serve for all the needy and society at large.</p>\r\n                    </div>\r\n                    <!-- Comments --></div>\r\n                    </div>\r\n                    <!-- end: Post single item--></div>\r\n                    </div>\r\n                    <!-- end: content --><!-- Sidebar-->\r\n                    \r\n                    <div class=\"sidebar sticky-sidebar col-lg-3\"><!--widget newsletter-->\r\n                    <figure><img alt=\"#\" src=\"http://127.0.0.1:8000/images/media/dszv7om4m.jpg\" width=\"100%\" /></figure>\r\n                    <!--end: widget tags --></div>\r\n                    <!-- end: Sidebar--></div>\r\n                    </div>\r\n                    </section>', NULL, NULL, NULL, NULL, 1, 0, 0, 0, 1, 0, '2023-04-15 01:15:40', '2023-05-03 03:54:08', 'pageview'),
(31, 'Advisors', 'advisors', '1', NULL, NULL, NULL, NULL, NULL, '<div class=\"static-content bio-page\">\r\n<div class=\"item\">\r\n<div class=\"row align-items-center\">\r\n<div class=\"col-md-5 pic\">\r\n<figure><img alt=\"GREEN CITY SCHOO\" src=\"http://127.0.0.1:8000/images/media/gr774nbq8.jpg\" width=\"100%\" /></figure>\r\n</div>\r\n\r\n<div class=\"col-md-7 description\">\r\n<h2 class=\"h1 color-primary\">Dr. Emandi Sankara Rao (Dr. ESR)</h2>\r\n\r\n<p>Dr. Emandi Sankara Rao (Dr. ESR) <a href=\"https://www.sankararao.com/index.html\" target=\"_blank\">www.sankararao.com</a> was born and brought up in Visakhapatnam, the city of Destiny on the East Coast of India in Andhra Pradesh. Had his primary education at St.Aloysius School and secondary education Matriculation at V T College in 1974 and then went to prestigious Mrs. AVN College and did Intermediate during 1974-76. Having an interest in engineering &amp; technology, had done graduation in Electrical Engineering with specialisation in Electrical &amp; Electronics Engineering from the reputed College of Engineering, Andhra University.</p>\r\n\r\n<p>With GATE good score went for a post-graduation in M.Tech Systems Reliability Engineering, a new specialisation offered at IIT Kharagpur, and had done a project in DRDO-NSTL on Torpedos recorder systems reliability and maintainability in 1984. At IIT Bombay done Doctoral degree Ph.D on Telecom Infrastructure Services Project Finance &amp; Technology titled &quot; Techno-Economic Framework For Sensitivity &amp; Risk Analysis Towards Network Effectiveness &quot; using the Stochastic and Artificial Intelligence - ANN simulation models on International Digital Telecom Services Networks having a innovative technological combination of PCM TDM Class 5 Switching Systems and Transmission through evolving IP Networks and linking the Hybrid Networks through Satellite C-Band transponders . While pursuing Ph.D he has also done PGDBA in Management from Pondicherry Central University in year 2002 .</p>\r\n</div>\r\n\r\n<div class=\"col-md-12 pic\">\r\n<p>In the first 10 years of career served in Telecom and Power Sectors. Subsequently in the last 25 years migrated into Developmental Banking &amp; Finance Sector and served in prestigious Govt of India, All India Development Financial Institutions at various levels in IDBI, IDFC Group, IIFCL Group and MD &amp; CEO of IFCI Group Ltd including Stock Holding Corporation of India Ltd and served in Infrastructure &amp; Industry, Banking &amp; Finance, Equity &amp; Debt Funds, Top Business Management Schools and CSR sectors. For last 12 years serving as Whole Time &amp; Independent Director at Board Level Management and Institutional Development. Also served as Chairman of Board of Governors of reputed Top Business Schools MDI Gurgaon &amp; Murshidabad and ILD Jaipur.</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<h3 class=\"inner-title\">Academics Exposure:</h3>\r\n\r\n<h4 class=\"color-primary\">Academics from prestigious National Educational Institutions platforms viz:</h4>\r\n\r\n<ul class=\"list-icon list-icon-circle list-icon-colored m-t-20\">\r\n	<li>IIT - Bombay a Ph.D in Project Finance &amp; Management of Asset Network Effectiveness by Risk &amp; Sensitivity using the Stochastic &amp; Artificial Intelligence ANN Simulation Models</li>\r\n	<li>IIT-Kharagpur - M.Tech in Systems Reliability, Risk and Quality Engg. &amp; Management</li>\r\n	<li>Pondicherry Central University- PGDBA in Management</li>\r\n	<li>Institution of Engineers India - Chartered Engineer (Valuations)</li>\r\n	<li>Andhra University &ndash; B.E in Electrical &amp; Electronics Engineering</li>\r\n</ul>\r\n\r\n<h3 class=\"inner-title\">Spectrum of Interests :</h3>\r\n\r\n<h4 class=\"color-primary\">Business &amp; Functional Expertise :</h4>\r\n\r\n<ul class=\"list-icon list-icon-circle list-icon-colored m-t-20\">\r\n	<li>Corporate &amp; Project Finance, Structured Finance, Investment Banking and Policy Making.</li>\r\n	<li>Domestic &amp; Forex Resources Raising , Risk Management and IT Systems.</li>\r\n</ul>\r\n\r\n<h4 class=\"color-primary\">Innovation &amp; Passionate Interests:</h4>\r\n\r\n<ul class=\"list-icon list-icon-circle list-icon-colored m-t-20\">\r\n	<li>Startup&rsquo;s Mentoring &amp; Skill Development.</li>\r\n	<li>Innovation, Strategy and AI &amp; Digital.</li>\r\n	<li>CSR Inclusive Activities and Rural Development.</li>\r\n</ul>\r\n\r\n<h3 class=\"inner-title\">Leadership &amp; Institutional Development:</h3>\r\n\r\n<h4 class=\"color-primary\">1997- 2011 at Industrial Development Bank of India (IDBI) and Infrastructure Development Finance Company LTD (IDFC):</h4>\r\n\r\n<ul class=\"list-icon list-icon-circle list-icon-colored m-t-20\">\r\n	<li>IDBI as Deputy General Manager in Project Appraisal, Project &amp; Corporate Finance</li>\r\n	<li>IDFC as Director Business Development, Project Finance, Structured Finance &amp; Investment Banking</li>\r\n</ul>\r\n\r\n<h4 class=\"color-primary\">2011- 2017 at India Infrastructure Finance Company Ltd (IIFCL): Transformed IIFCL into IIFCL Group with Subsidiaries:</h4>\r\n\r\n<ul class=\"list-icon list-icon-circle list-icon-colored m-t-20\">\r\n	<li>Founder Whole-time Director &amp; CEO of IIFCL - Infra Debt Fund (Mutual Fund) and CEO of IIFCL Projects Ltd (IPL).</li>\r\n	<li>IIFCL Nominee Director on Board of DMICDC now know as NICDC.</li>\r\n</ul>\r\n\r\n<h4 class=\"color-primary\">2017 &ndash;2020 at Industrial Finance Corporation of India Ltd (IFCI) &amp; Subsidiaries:</h4>\r\n\r\n<ul class=\"list-icon list-icon-circle list-icon-colored m-t-20\">\r\n	<li>Govt of India ACC appointed Whole Time Director and MD &amp; CEO of IFCI.</li>\r\n	<li>Non-Exec Chairman of Stock Holding Corporation of India Ltd.</li>\r\n	<li>Chairman Board of Governors of Management Development Institute and ILD Jaipur.</li>\r\n	<li>Non-Exec Chairman on Boards of IFCI Venture Funds, IFCI Factors &amp; IFCI Infrastructure.</li>\r\n</ul>\r\n\r\n<h4 class=\"color-primary\">2021 Onwards Current Directorship :</h4>\r\n\r\n<ul class=\"list-icon list-icon-circle list-icon-colored m-t-20\">\r\n	<li>Independent Director on few Boards of Infrastructure &amp; Manufacturing sector corporates.\r\n	<ul class=\"m-t-20\">\r\n		<li>Delhi International Airport Ltd.</li>\r\n		<li>GMR Airports Infra Ltd.</li>\r\n		<li>GMR Power and Urban Infra Ltd.</li>\r\n		<li>GMR Energy Trading Limited</li>\r\n		<li>Coastal Corporation India Ltd.</li>\r\n		<li>Visakha Pharmacity Ltd.</li>\r\n		<li>Vizag Profiles Private Ltd.</li>\r\n		<li>Presently offering services as Professor in Andhra University School of International Business and also Chairman - AU Alumina Association</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n</div>', NULL, NULL, NULL, NULL, 1, 0, 0, 0, 1, 0, '2023-04-15 01:16:03', '2023-05-03 04:38:06', 'pageview'),
(32, 'Principal', 'principal', '1', NULL, NULL, 'Principal | From the Principal’s Desk', NULL, NULL, '<section class=\"sidebar-right founder\" id=\"page-content\">\r\n<div class=\"container\">\r\n<div class=\"row\"><!-- content -->\r\n<div class=\"content col-lg-9\"><!-- Blog -->\r\n<div class=\"single-post\" id=\"blog\"><!-- Post single item-->\r\n<div class=\"post-item\">\r\n<div class=\"post-item-wrap\">\r\n<div class=\"post-item-description1\">\r\n<h2 class=\"h1 color-primary inner-title\">Principal&rsquo;s Message</h2>\r\n\r\n<h5 class=\"font-weight-600 color-black\">Our Policy Of Education</h5>\r\n\r\n<p>Green City International School, Visakhapatnam, the Abode of Education, is established to offer ample opportunities to carve the young minds to be the National and International Heroes in various fields such as Science and Technology, Humanities, Politics, Art etc., We are providing Infrastructural and Instructional Quality in Education to accomplish moral and ethical values and to give a delightful stay at school for all the long hours of learning.</p>\r\n\r\n<h4 class=\"font-weight-600 color-primary\">Our Motto is:</h4>\r\n\r\n<ul class=\"list-icon list-icon-check list-icon-colored inner-list \">\r\n	<li>to ignite the tender minds of young ones to have the beautiful dreams of life.<span style=\"color:#ff0000\">*</span></li>\r\n	<li>to fill the confidence in the children to bring their dreams into reality.<span style=\"color:#ff0000\">*</span></li>\r\n	<li>to inculcate boldness to face any challenge in every walk of one&rsquo;s life.<span style=\"color:#ff0000\">*</span></li>\r\n	<li>to let the children learn to &lsquo;how to learn&rsquo;.<span style=\"color:#ff0000\">*</span></li>\r\n</ul>\r\n\r\n<p>Our dedication to the Institution itself is a promise to one and all of the parents who have great belief in us. We are committed to draw out the innate abilities of the children. We shall strive hard for the betterment of their skills by inculcating culture and civilization along with discipline.</p>\r\n\r\n<p>It&rsquo;s our delight to provide a good Teaching and Learning Environment and work for the glory of children&rsquo;s life in this Heaven of Education, Green City School.</p>\r\n\r\n<div class=\"author\"><span>Principal</span> Green City EM School</div>\r\n</div>\r\n<!-- Comments --></div>\r\n</div>\r\n<!-- end: Post single item--></div>\r\n</div>\r\n<!-- end: content --><!-- Sidebar-->\r\n\r\n<div class=\"sidebar sticky-sidebar col-lg-3\"><!--widget newsletter-->\r\n<figure><img alt=\"#\" src=\"http://127.0.0.1:8000/images/media/dszv7om4m.jpg\" width=\"100%\" /></figure>\r\n<!--end: widget tags --></div>\r\n<!-- end: Sidebar--></div>\r\n</div>\r\n</section>', NULL, NULL, NULL, NULL, 1, 0, 0, 0, 1, 0, '2023-04-15 01:16:24', '2023-05-03 04:55:34', 'pageview'),
(33, 'Infrastructure Facilities', 'infrastructure-facilities', 'root', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 1, 0, '2023-04-15 01:17:19', '2023-04-15 01:17:29', 'nopage'),
(34, 'Amenities', 'amenities', '33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 1, 0, '2023-04-15 01:19:11', '2023-05-06 07:33:01', 'pageview'),
(35, 'Computer Lab', 'computer-lab', '34', NULL, NULL, NULL, NULL, NULL, '<div class=\"static-content\">\r\n<div class=\"item\">\r\n<div class=\"row align-items-center\">\r\n<div class=\"col-md-5 pic\">\r\n<figure class=\"pic-radius\"><img alt=\"GREEN CITY SCHOO\" src=\"http://127.0.0.1:8000/images/media/lahxjhqth.jpg\" /></figure>\r\n</div>\r\n\r\n<div class=\"col-md-7 description\">\r\n<h2 class=\"h1 \">Computer Lab</h2>\r\n\r\n<p>Our school&#39;s computer lab is a hub for digital innovation and creativity. Equipped with the latest technology and software, our lab provides a platform for learning, exploring and creating. Our knowledgeable staff are always available to offer guidance and support. From coding to digital learning, our lab has everything required to pursue the interests and hone the skills of the students.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', NULL, NULL, NULL, NULL, 1, 0, 0, 0, 1, 0, '2023-04-15 01:20:38', '2023-05-06 07:42:53', 'pageview'),
(36, 'Science Lab', 'science-lab', '34', NULL, NULL, NULL, NULL, NULL, '<div class=\"static-content\">\r\n<div class=\"item\">\r\n<div class=\"row align-items-center\">\r\n<div class=\"col-md-5 pic\">\r\n<figure class=\"pic-radius\"><img alt=\"GREEN CITY SCHOO\" src=\"http://127.0.0.1:8000/images/media/lahxjhqth.jpg\" /></figure>\r\n</div>\r\n\r\n<div class=\"col-md-7 description\">\r\n<h2 class=\"h1 \">Science Lab</h2>\r\n\r\n<p>Our lab is fully equipped with state-of-the-art technology, tools, and resources to help students learn and conduct hands-on experiments. Our knowledgeable staff are always available to guide and assist them</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', NULL, NULL, NULL, NULL, 1, 0, 0, 0, 1, 0, '2023-04-15 01:27:35', '2023-05-06 07:43:11', 'pageview'),
(37, 'Library', 'library', '34', NULL, NULL, NULL, NULL, NULL, '<div class=\"static-content\">\r\n<div class=\"item\">\r\n<div class=\"row align-items-center\">\r\n<div class=\"col-md-5 pic\">\r\n<figure class=\"pic-radius\"><img alt=\"GREEN CITY SCHOO\" src=\"http://127.0.0.1:8000/images/media/lahxjhqth.jpg\" /></figure>\r\n</div>\r\n\r\n<div class=\"col-md-7 description\">\r\n<h2 class=\"h1 \">Library</h2>\r\n\r\n<p>Our library is more than just a book lending centre. Whether the students are looking for a quiet spot to study, a place to explore new ideas, or resources to complete their assignments, our library has them covered.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', NULL, NULL, NULL, NULL, 1, 0, 0, 0, 1, 0, '2023-04-15 01:28:05', '2023-05-06 07:45:15', 'pageview'),
(38, 'Smart Class', 'smart-class', '34', NULL, NULL, NULL, NULL, NULL, '<div class=\"static-content\">\r\n<div class=\"item\">\r\n<div class=\"row align-items-center\">\r\n<div class=\"col-md-5 pic\">\r\n<figure class=\"pic-radius\"><img alt=\"GREEN CITY SCHOO\" src=\"http://127.0.0.1:8000/images/media/lahxjhqth.jpg\"></figure>\r\n</div>\r\n\r\n<div class=\"col-md-7 description\">\r\n<h2 class=\"h1 \">Smart class</h2>\r\n\r\n<p>Our school is equipped with all smart class that makes learning super easy and fun. With interactive tools and digital resources, the students will understand even the most complex concepts in no time. Our teachers are top-notch and make the classes engaging and interactive, inspiring you to excel in your studies.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', NULL, NULL, NULL, NULL, 1, 0, 0, 0, 1, 0, '2023-04-15 01:28:36', '2023-05-06 07:47:10', 'pageview'),
(39, 'Sports', 'sports', '33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 1, 0, '2023-04-15 01:30:40', '2023-04-15 01:30:40', 'pageview'),
(40, 'Shuttle Court', 'shuttle-court', '39', NULL, NULL, NULL, NULL, NULL, '<div class=\"static-content\">\r\n<div class=\"item\">\r\n<div class=\"row align-items-center\">\r\n<div class=\"col-md-5 pic\">\r\n<figure class=\"pic-radius\"><img alt=\"GREEN CITY SCHOO\" src=\"http://127.0.0.1:8000/images/media/lahxjhqth.jpg\" /></figure>\r\n</div>\r\n\r\n<div class=\"col-md-7 description\">\r\n<h2 class=\"h1 \">Shuttle Court</h2>\r\n\r\n<p>Our school&#39;s computer lab is a hub for digital innovation and creativity. Equipped with the latest technology and software, our lab provides a platform for learning, exploring and creating. Our knowledgeable staff are always available to offer guidance and support. From coding to digital learning, our lab has everything required to pursue the interests and hone the skills of the students.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1, 0, '2023-04-15 01:33:17', '2023-05-07 23:32:09', 'pageview'),
(41, 'Swimming Pool', 'swimming-pool', '39', NULL, NULL, NULL, NULL, NULL, '<div class=\"static-content\">\r\n<div class=\"item\">\r\n<div class=\"row align-items-center\">\r\n<div class=\"col-md-5 pic\">\r\n<figure class=\"pic-radius\"><img alt=\"GREEN CITY SCHOO\" src=\"http://127.0.0.1:8000/images/media/lahxjhqth.jpg\" /></figure>\r\n</div>\r\n\r\n<div class=\"col-md-7 description\">\r\n<h2 class=\"h1 \">Swimming Pool</h2>\r\n\r\n<p>The swimming pool is a key infrastructure within our educational institution, providing a full range of aquatic activities for students and staff. It is a pristine facility that is regularly maintained to ensure a clean and safe environment for all. The pool offers opportunities for beginners and experienced swimmers alike to refine their skills and stay physically fit. \r\n</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', NULL, NULL, NULL, NULL, 1, 0, 0, 0, 1, 0, '2023-04-15 01:33:49', '2023-05-07 23:33:36', 'pageview'),
(42, 'Table Tennis', 'table-tennis', '39', NULL, NULL, NULL, NULL, NULL, '<div class=\"static-content\">\r\n<div class=\"item\">\r\n<div class=\"row align-items-center\">\r\n<div class=\"col-md-5 pic\">\r\n<figure class=\"pic-radius\"><img alt=\"GREEN CITY SCHOO\" src=\"http://127.0.0.1:8000/images/media/lahxjhqth.jpg\" /></figure>\r\n</div>\r\n\r\n<div class=\"col-md-7 description\">\r\n<h2 class=\"h1 \">Table Tennis</h2>\r\n\r\n<p>The table tennis facility is a valuable resource for students and staff, providing a dedicated space for indoor play. The facility is carefully maintained to ensure a safe and clean environment, allowing students to enhance their hand-eye coordination, reflexes, and physical fitness.\r\n</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', NULL, NULL, NULL, NULL, 1, 0, 0, 0, 1, 0, '2023-04-15 01:38:22', '2023-05-07 23:35:00', 'pageview'),
(43, 'Volleyball', 'volleyball', '39', NULL, NULL, NULL, NULL, NULL, '<div class=\"static-content\">\r\n<div class=\"item\">\r\n<div class=\"row align-items-center\">\r\n<div class=\"col-md-5 pic\">\r\n<figure class=\"pic-radius\"><img alt=\"GREEN CITY SCHOO\" src=\"http://127.0.0.1:8000/images/media/lahxjhqth.jpg\" /></figure>\r\n</div>\r\n\r\n<div class=\"col-md-7 description\">\r\n<h2 class=\"h1 \">Volleyball</h2>\r\n\r\n<p>Our school boasts a well-maintained volleyball court, providing students and staff with an ideal space to engage in this popular sport. The court is designed to provide a safe and challenging environment that enables students to enhance their coordination, teamwork, and physical fitness. Volleyball is a popular activity among our students, and the court is often buzzing with activity as students engage in friendly competition or participate in physical education classes. \r\n</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', NULL, NULL, NULL, NULL, 1, 0, 0, 0, 1, 0, '2023-04-15 01:41:51', '2023-05-07 23:36:44', 'pageview'),
(44, 'Skating', 'skating', '39', NULL, NULL, NULL, NULL, NULL, '<div class=\"static-content\">\r\n<div class=\"item\">\r\n<div class=\"row align-items-center\">\r\n<div class=\"col-md-5 pic\">\r\n<figure class=\"pic-radius\"><img alt=\"GREEN CITY SCHOO\" src=\"http://127.0.0.1:8000/images/media/lahxjhqth.jpg\" /></figure>\r\n</div>\r\n\r\n<div class=\"col-md-7 description\">\r\n<h2 class=\"h1 \">Skating</h2>\r\n\r\n<p>Our school also provides a designated space for students to skate, offering them an opportunity to develop their skating skills while staying physically active. The basketball court is transformed into a skating area, where students can skate freely and safely under the supervision of the school staff. \r\n</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1, 0, '2023-04-15 01:45:43', '2023-05-07 23:38:09', 'pageview'),
(45, 'Ideation Hall - Centre For Excellence', 'ideation-hall---centre-for-excellence', '33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 1, 0, '2023-04-15 01:56:06', '2023-04-15 01:56:06', 'pageview'),
(46, 'Awards', 'awards', 'root', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 1, 0, '2023-04-15 04:31:24', '2023-04-15 04:31:24', 'pageview'),
(47, 'Academics', 'academics', 'root', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 1, 0, '2023-04-15 04:33:32', '2023-04-15 04:34:07', 'nopage'),
(48, 'CBSE', 'cbse', '47', NULL, NULL, NULL, NULL, NULL, '<div class=\"static-content\">\r\n<div class=\"item\">\r\n<div class=\"row align-items-center\">\r\n<div class=\"col-md-5 pic\">\r\n<figure class=\"pic-radius\"><img alt=\"GREEN CITY SCHOO\" src=\"http://127.0.0.1:8000/images/media/lahxjhqth.jpg\" /></figure>\r\n</div>\r\n\r\n<div class=\"col-md-7 description\">\r\n<h2 class=\"h1 color-primary\">CBSE Curriculum</h2>\r\n\r\n<p>CBSE, a broad curriculum, provides the extra benefit of learning more for competitive examinations such as the IIT - JEE, AIEE, NEET and AIMS etc.</p>\r\n\r\n<p>CBSE is a great option for parents who have a flexible working system and get transferred to various cities. CBSE schools work on an easy accessibility approach and are available in every big and small city of the country.</p>\r\n\r\n<p>Offering analytical learning in subjects like science and maths, the CBSE focuses on curricular and extracurricular activities and helps to pursue their passions in other areas of their interest.</p>\r\n\r\n<p>Thus, the CBSE curriculum not only offers superior education but also ensures a student&#39;s mental and physical development.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1, 0, '2023-04-15 04:33:55', '2023-05-02 00:05:19', 'pageview'),
(49, 'Classes', 'classes', '47', NULL, NULL, 'CLASSROOM', NULL, NULL, '<div class=\"class-room\">\r\n<div class=\"blockquote card\">\r\n<p class=\"h5\">The classroom should be an entrance into the world, not an escape from it.</p>\r\n<small class=\"h6\">by <cite class=\"color-primary\">-John Ciardi.</cite></small></div>\r\n\r\n<p class=\"h4 text-center m-t-70\">We know a fundamental part of any child&#39;s life is Education and the most important years of a child are spent in the classroom with others. Keeping this in view, here, our GCEMS classrooms are designed with adequate digital equipment for providing interactive learning full of activities. Classes certainly hold the attention of the learners and welcome them for joyful learning.</p>\r\n</div>', NULL, NULL, NULL, NULL, 1, 0, 0, 0, 1, 0, '2023-04-15 04:34:57', '2023-05-07 23:50:56', 'pageview'),
(50, 'Special Coaching IIT', 'special-coaching-iit', '47', NULL, NULL, NULL, NULL, NULL, '<div class=\"static-content\">\r\n<div class=\"item\">\r\n<div class=\"row align-items-center\">\r\n<div class=\"col-md-7 description\">\r\n<h2 class=\"h1 color-primary\">IIT Foundation</h2>\r\n\r\n<p>IIT Foundation Course plays a vital role in nurturing the minds of the students from an early age and helps the students in building a strong logical foundation, connect concepts, application of formulas, and solving equations.</p>\r\n\r\n<h4>A teacher leader thinks beyond the walls of their Classroom to what their impact can be.</h4>\r\n\r\n<p>An uncompromising system of management with hardworking faculty members is the highway to achieving the child&#39;s goals.</p>\r\n</div>\r\n\r\n<div class=\"col-md-5 pic\">\r\n<figure class=\"pic-radius\"><img alt=\"GREEN CITY SCHOO\" src=\"http://127.0.0.1:8000/images/media/lahxjhqth.jpg\" /></figure>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', NULL, NULL, NULL, NULL, 1, 0, 0, 0, 1, 0, '2023-04-15 04:35:16', '2023-05-03 03:46:30', 'pageview'),
(51, 'NCC', 'ncc', '47', NULL, NULL, NULL, NULL, NULL, '<div class=\"static-content\">\r\n<div class=\"item\">\r\n<div class=\"row align-items-center\">\r\n<div class=\"col-md-5 pic\">\r\n<figure class=\"pic-radius\"><img alt=\"GREEN CITY SCHOO\" src=\"http://127.0.0.1:8000/images/media/lahxjhqth.jpg\" /></figure>\r\n</div>\r\n\r\n<div class=\"col-md-7 description\">\r\n<h2 class=\"h1 color-primary\">National Cadet Corps (NCC)</h2>\r\n\r\n<p>The &lsquo;Aims&rsquo; of the NCC laid out in 1988 have stood the test of time and continue to meet the requirements expected of it in the current socio&ndash;economic scenario of the country. The NCC aims at developing character, comradeship, discipline, a secular outlook, the spirit of adventure and ideals of selfless service amongst young citizens. Further, it aims at creating a pool of organized, trained and motivated youth with leadership qualities from all walks of life, who will serve the Nation regardless of which career they choose.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', NULL, NULL, NULL, NULL, 1, 0, 0, 0, 1, 0, '2023-04-15 04:35:31', '2023-05-03 03:48:10', 'pageview'),
(52, 'Certifications and Accreditations', 'certifications-and-accreditations', 'root', NULL, NULL, NULL, NULL, NULL, '<p><iframe height=\"500px\" src=\"https://greencityemschool.in/wp-content/uploads/2022/05/smc-26-5-22.pdf\" width=\"100%\"></iframe></p>', NULL, NULL, NULL, NULL, 1, 0, 0, 0, 1, 0, '2023-04-15 04:36:06', '2023-04-18 23:41:49', 'pageview');

-- --------------------------------------------------------

--
-- Table structure for table `committee_categories`
--

CREATE TABLE `committee_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `committee_category_type_id` bigint(20) UNSIGNED NOT NULL,
  `publish` tinyint(4) NOT NULL DEFAULT '1',
  `position` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `committee_categories`
--

INSERT INTO `committee_categories` (`id`, `name`, `committee_category_type_id`, `publish`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Trustees', 2, 1, 0, '2022-12-08 20:14:09', '2023-01-07 07:02:12'),
(2, 'Executive Committee', 1, 1, 0, '2022-12-08 21:28:20', '2022-12-08 21:28:20'),
(3, 'Board Members', 1, 1, 0, '2022-12-08 21:28:36', '2022-12-08 21:28:36'),
(4, 'CAF Organization Structure', 1, 1, 0, '2022-12-08 21:28:50', '2023-01-11 13:50:53'),
(6, 'CAF', 1, 0, 0, '2023-01-07 07:02:38', '2023-01-11 13:51:01'),
(7, 'Operational Committees', 1, 1, 0, '2023-01-07 07:03:11', '2023-01-07 07:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `committee_category_types`
--

CREATE TABLE `committee_category_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `committee_category_types`
--

INSERT INTO `committee_category_types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, '2016 Organisation Structure', '2022-12-02 23:23:46', '2023-01-07 06:55:10'),
(2, 'Founders', '2023-01-07 06:55:16', '2023-01-07 06:55:16');

-- --------------------------------------------------------

--
-- Table structure for table `committee_members`
--

CREATE TABLE `committee_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `position` tinyint(4) NOT NULL DEFAULT '0',
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caf_designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `committee_members`
--

INSERT INTO `committee_members` (`id`, `name`, `email`, `phone`, `gender`, `member_type`, `member_photo`, `city`, `state`, `address`, `description`, `created_at`, `updated_at`, `position`, `designation`, `caf_designation`) VALUES
(1, 'Vara Prasad', 'ux@f9tech.com', '999-999-9999', NULL, NULL, '8gvhgmenb.png', NULL, NULL, NULL, NULL, '2023-05-06 04:39:41', '2023-05-06 04:39:41', 0, 'President', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `committee_member_active_lists`
--

CREATE TABLE `committee_member_active_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `committee_member_id` int(11) NOT NULL,
  `committee_category_id` int(11) NOT NULL,
  `active` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `committee_member_active_lists`
--

INSERT INTO `committee_member_active_lists` (`id`, `committee_member_id`, `committee_category_id`, `active`, `created_at`, `updated_at`) VALUES
(34, 24, 1, 1, '2023-01-07 07:12:33', '2023-01-07 07:12:33'),
(35, 25, 1, 1, '2023-01-07 07:14:19', '2023-01-07 07:14:19'),
(36, 26, 1, 1, '2023-01-07 07:15:12', '2023-01-07 07:15:12'),
(37, 27, 1, 1, '2023-01-07 07:15:42', '2023-01-07 07:15:42'),
(38, 28, 1, 1, '2023-01-07 07:16:18', '2023-01-07 07:16:18'),
(39, 29, 1, 1, '2023-01-07 07:16:48', '2023-01-07 07:16:48'),
(40, 30, 1, 1, '2023-01-07 07:17:43', '2023-01-07 07:17:43'),
(41, 31, 1, 1, '2023-01-07 07:18:13', '2023-01-07 07:18:13'),
(42, 32, 1, 1, '2023-01-07 07:18:41', '2023-01-07 07:18:41'),
(48, 23, 2, 1, '2023-01-07 07:26:03', '2023-01-07 07:26:03'),
(49, 23, 3, 1, '2023-01-07 07:26:03', '2023-01-07 07:26:03'),
(61, 6, 2, 1, '2023-01-07 07:32:05', '2023-01-07 07:32:05'),
(62, 6, 3, 1, '2023-01-07 07:32:05', '2023-01-07 07:32:05'),
(65, 17, 3, 1, '2023-01-07 07:36:28', '2023-01-07 07:36:28'),
(67, 22, 3, 1, '2023-01-07 07:37:09', '2023-01-07 07:37:09'),
(68, 5, 3, 1, '2023-01-07 07:37:24', '2023-01-07 07:37:24'),
(69, 12, 3, 1, '2023-01-07 07:37:39', '2023-01-07 07:37:39'),
(70, 7, 3, 1, '2023-01-07 07:37:55', '2023-01-07 07:37:55'),
(71, 13, 3, 1, '2023-01-07 07:38:08', '2023-01-07 07:38:08'),
(72, 11, 3, 1, '2023-01-07 07:38:39', '2023-01-07 07:38:39'),
(73, 8, 3, 1, '2023-01-07 07:38:57', '2023-01-07 07:38:57'),
(74, 10, 3, 1, '2023-01-07 07:39:11', '2023-01-07 07:39:11'),
(75, 21, 3, 1, '2023-01-07 07:39:26', '2023-01-07 07:39:26'),
(76, 33, 2, 1, '2023-01-07 07:41:17', '2023-01-07 07:41:17'),
(77, 33, 3, 1, '2023-01-07 07:41:17', '2023-01-07 07:41:17'),
(82, 18, 3, 1, '2023-01-07 07:48:44', '2023-01-07 07:48:44'),
(101, 15, 2, 1, '2023-01-12 21:25:51', '2023-01-12 21:25:51'),
(102, 15, 3, 1, '2023-01-12 21:25:51', '2023-01-12 21:25:51'),
(123, 16, 2, 1, '2023-01-12 21:31:26', '2023-01-12 21:31:26'),
(124, 16, 3, 1, '2023-01-12 21:31:26', '2023-01-12 21:31:26'),
(125, 16, 4, 1, '2023-01-12 21:31:26', '2023-01-12 21:31:26'),
(126, 16, 6, 1, '2023-01-12 21:31:26', '2023-01-12 21:31:26'),
(127, 9, 2, 1, '2023-01-12 21:31:54', '2023-01-12 21:31:54'),
(128, 9, 3, 1, '2023-01-12 21:31:54', '2023-01-12 21:31:54'),
(129, 9, 4, 1, '2023-01-12 21:31:54', '2023-01-12 21:31:54'),
(130, 9, 6, 1, '2023-01-12 21:31:54', '2023-01-12 21:31:54'),
(131, 19, 2, 1, '2023-01-12 21:33:31', '2023-01-12 21:33:31'),
(132, 19, 3, 1, '2023-01-12 21:33:31', '2023-01-12 21:33:31'),
(133, 19, 4, 1, '2023-01-12 21:33:31', '2023-01-12 21:33:31'),
(134, 19, 6, NULL, '2023-01-12 21:33:31', '2023-01-12 21:33:31'),
(135, 14, 2, 1, '2023-01-12 21:33:56', '2023-01-12 21:33:56'),
(136, 14, 3, 1, '2023-01-12 21:33:56', '2023-01-12 21:33:56'),
(137, 14, 4, 1, '2023-01-12 21:33:56', '2023-01-12 21:33:56'),
(138, 14, 6, NULL, '2023-01-12 21:33:56', '2023-01-12 21:33:56'),
(139, 20, 2, 1, '2023-01-12 21:34:22', '2023-01-12 21:34:22'),
(140, 20, 3, 1, '2023-01-12 21:34:22', '2023-01-12 21:34:22'),
(141, 20, 4, 1, '2023-01-12 21:34:22', '2023-01-12 21:34:22'),
(142, 20, 6, 1, '2023-01-12 21:34:22', '2023-01-12 21:34:22'),
(144, 1, 1, 1, '2023-05-06 04:52:21', '2023-05-06 04:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `communication_details`
--

CREATE TABLE `communication_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `facebook` tinyint(4) NOT NULL DEFAULT '0',
  `twitter` tinyint(4) NOT NULL DEFAULT '0',
  `instagram` tinyint(4) NOT NULL DEFAULT '0',
  `whatsapp` tinyint(4) NOT NULL DEFAULT '0',
  `email` tinyint(4) NOT NULL DEFAULT '0',
  `terms_and_conditions` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `communication_details`
--

INSERT INTO `communication_details` (`id`, `user_id`, `facebook`, `twitter`, `instagram`, `whatsapp`, `email`, `terms_and_conditions`, `created_at`, `updated_at`) VALUES
(1, 10032, 0, 0, 0, 0, 0, 1, NULL, NULL),
(2, 10042, 0, 0, 0, 0, 0, 1, NULL, NULL),
(4, 10062, 0, 0, 0, 0, 0, 1, NULL, NULL),
(6, 10067, 0, 0, 0, 0, 0, 1, NULL, NULL),
(8, 10080, 0, 0, 0, 0, 0, 1, NULL, NULL),
(10, 10086, 0, 0, 0, 0, 0, 1, NULL, NULL),
(11, 20092, 0, 0, 0, 0, 0, 1, NULL, NULL),
(12, 20097, 0, 0, 0, 0, 0, 1, NULL, NULL),
(13, 20101, 0, 0, 0, 0, 0, 1, NULL, NULL),
(15, 20106, 0, 0, 0, 0, 0, 1, NULL, NULL),
(16, 20111, 0, 0, 0, 0, 0, 1, NULL, NULL),
(17, 20118, 0, 0, 0, 0, 0, 1, NULL, NULL),
(19, 20131, 0, 0, 0, 0, 0, 1, NULL, NULL),
(20, 20134, 0, 0, 0, 0, 0, 1, NULL, NULL),
(21, 20138, 0, 0, 0, 0, 0, 1, NULL, NULL),
(23, 20144, 0, 0, 0, 0, 0, 1, NULL, NULL),
(24, 20147, 0, 0, 0, 0, 0, 1, NULL, NULL),
(25, 20150, 0, 0, 0, 0, 0, 1, NULL, NULL),
(27, 20154, 0, 0, 0, 0, 0, 1, NULL, NULL),
(28, 20159, 0, 0, 0, 0, 0, 1, NULL, NULL),
(29, 20162, 0, 0, 0, 0, 0, 1, NULL, NULL),
(30, 20170, 0, 0, 0, 0, 0, 1, NULL, NULL),
(31, 20173, 0, 0, 0, 0, 0, 1, NULL, NULL),
(32, 20174, 0, 0, 0, 0, 0, 1, NULL, NULL),
(33, 20179, 0, 0, 0, 0, 0, 1, NULL, NULL),
(37, 20202, 0, 0, 0, 0, 0, 1, NULL, NULL),
(38, 20203, 0, 0, 0, 0, 0, 1, NULL, NULL),
(39, 20204, 0, 0, 0, 0, 0, 1, NULL, NULL),
(40, 20207, 0, 0, 0, 0, 0, 1, NULL, NULL),
(42, 20210, 0, 0, 0, 0, 0, 1, NULL, NULL),
(44, 20225, 0, 0, 0, 0, 0, 1, NULL, NULL),
(45, 20227, 0, 0, 0, 0, 0, 1, NULL, NULL),
(46, 20228, 0, 0, 0, 0, 0, 1, NULL, NULL),
(47, 20229, 0, 0, 0, 0, 0, 1, NULL, NULL),
(48, 20230, 0, 0, 0, 0, 0, 1, NULL, NULL),
(49, 20237, 0, 0, 0, 0, 0, 1, NULL, NULL),
(50, 20241, 0, 0, 0, 0, 0, 1, NULL, NULL),
(51, 20243, 0, 0, 0, 0, 0, 1, NULL, NULL),
(52, 20255, 0, 0, 0, 0, 0, 1, NULL, NULL),
(53, 20258, 0, 0, 0, 0, 0, 1, NULL, NULL),
(56, 20266, 0, 0, 0, 0, 0, 1, NULL, NULL),
(57, 20267, 0, 0, 0, 0, 0, 1, NULL, NULL),
(58, 20269, 0, 0, 0, 0, 0, 1, NULL, NULL),
(60, 20272, 0, 0, 0, 0, 0, 1, NULL, NULL),
(61, 20276, 0, 0, 0, 0, 0, 1, NULL, NULL),
(62, 20278, 0, 0, 0, 0, 0, 1, NULL, NULL),
(64, 20286, 0, 0, 0, 0, 0, 1, NULL, NULL),
(65, 20289, 0, 0, 0, 0, 0, 1, NULL, NULL),
(66, 20292, 0, 0, 0, 0, 0, 1, NULL, NULL),
(68, 20307, 0, 0, 0, 0, 0, 1, NULL, NULL),
(69, 20311, 0, 0, 0, 0, 0, 1, NULL, NULL),
(72, 20353, 0, 0, 0, 0, 0, 1, NULL, NULL),
(73, 20364, 0, 0, 0, 0, 0, 1, NULL, NULL),
(77, 20388, 0, 0, 0, 0, 0, 1, NULL, NULL),
(78, 20398, 0, 0, 0, 0, 0, 1, NULL, NULL),
(79, 20406, 0, 0, 0, 0, 0, 1, NULL, NULL),
(80, 20411, 0, 0, 0, 0, 0, 1, NULL, NULL),
(81, 20417, 0, 0, 0, 0, 0, 1, NULL, NULL),
(83, 20429, 0, 0, 0, 0, 0, 1, NULL, NULL),
(90, 20511, 0, 0, 0, 0, 0, 1, NULL, NULL),
(91, 20517, 0, 0, 0, 0, 0, 1, NULL, NULL),
(92, 20518, 0, 0, 0, 0, 0, 1, NULL, NULL),
(94, 20520, 0, 0, 0, 0, 0, 1, NULL, NULL),
(95, 20521, 0, 0, 0, 0, 1, 1, NULL, '2023-01-15 19:23:53'),
(99, 20547, 0, 0, 0, 0, 0, 1, NULL, NULL),
(100, 20548, 0, 0, 0, 0, 0, 1, NULL, NULL),
(103, 20552, 0, 0, 0, 0, 0, 1, NULL, NULL),
(107, 20556, 0, 0, 0, 0, 0, 1, NULL, NULL),
(109, 20558, 0, 0, 0, 0, 0, 1, NULL, NULL),
(111, 20560, 0, 0, 0, 0, 0, 1, NULL, NULL),
(113, 20562, 0, 0, 0, 0, 0, 1, NULL, NULL),
(116, 20565, 0, 0, 0, 0, 0, 1, NULL, NULL),
(118, 20567, 0, 0, 0, 0, 0, 1, NULL, NULL),
(119, 20568, 0, 0, 0, 0, 0, 1, NULL, NULL),
(120, 20569, 0, 0, 0, 0, 0, 1, NULL, NULL),
(121, 20570, 0, 0, 0, 0, 0, 1, NULL, NULL),
(124, 20575, 0, 0, 0, 0, 0, 1, NULL, NULL),
(125, 20579, 0, 0, 0, 0, 0, 1, NULL, NULL),
(126, 20582, 0, 0, 0, 0, 0, 1, NULL, NULL),
(127, 20583, 0, 0, 0, 0, 0, 1, NULL, NULL),
(128, 20584, 0, 0, 0, 0, 0, 1, NULL, NULL),
(137, 20600, 0, 0, 0, 0, 0, 1, NULL, NULL),
(138, 20601, 0, 0, 0, 0, 0, 1, NULL, NULL),
(139, 20603, 0, 0, 0, 0, 0, 1, NULL, NULL),
(141, 20605, 0, 0, 0, 0, 0, 1, NULL, NULL),
(148, 20614, 0, 0, 0, 0, 0, 1, NULL, NULL),
(150, 20616, 0, 0, 0, 0, 0, 1, NULL, NULL),
(155, 20621, 0, 0, 0, 0, 0, 1, NULL, NULL),
(156, 20641, 0, 0, 0, 0, 0, 1, NULL, NULL),
(164, 20665, 0, 0, 0, 0, 0, 1, NULL, NULL),
(165, 20666, 0, 0, 0, 0, 0, 1, NULL, NULL),
(166, 20671, 0, 0, 0, 0, 0, 1, NULL, NULL),
(168, 20673, 0, 0, 0, 0, 0, 1, NULL, NULL),
(171, 20683, 0, 0, 0, 0, 0, 1, NULL, NULL),
(173, 20685, 0, 0, 0, 0, 0, 1, NULL, NULL),
(174, 20686, 0, 0, 0, 0, 0, 1, NULL, NULL),
(175, 20687, 0, 0, 0, 0, 0, 1, NULL, NULL),
(176, 20688, 0, 0, 0, 0, 0, 1, NULL, NULL),
(177, 20689, 0, 0, 0, 0, 0, 1, NULL, NULL),
(180, 20692, 0, 0, 0, 0, 0, 1, NULL, NULL),
(182, 20695, 0, 0, 0, 0, 0, 1, NULL, NULL),
(183, 20696, 0, 0, 0, 0, 0, 1, NULL, NULL),
(184, 20697, 0, 0, 0, 0, 0, 1, NULL, NULL),
(186, 20700, 0, 0, 0, 0, 0, 1, NULL, NULL),
(187, 20701, 0, 0, 0, 0, 0, 1, NULL, NULL),
(189, 20703, 0, 0, 0, 0, 0, 1, NULL, NULL),
(190, 20704, 0, 0, 0, 0, 0, 1, NULL, NULL),
(191, 20705, 0, 0, 0, 0, 0, 1, NULL, NULL),
(194, 20708, 0, 0, 0, 0, 0, 1, NULL, NULL),
(195, 20713, 0, 0, 0, 0, 0, 1, NULL, NULL),
(196, 20714, 0, 0, 0, 0, 0, 1, NULL, NULL),
(198, 20721, 0, 0, 0, 0, 0, 1, NULL, NULL),
(200, 20727, 0, 0, 0, 0, 0, 1, NULL, NULL),
(202, 20729, 0, 0, 0, 0, 0, 1, NULL, NULL),
(204, 20731, 0, 0, 0, 0, 0, 1, NULL, NULL),
(207, 20735, 0, 0, 0, 0, 0, 1, NULL, NULL),
(208, 20737, 0, 0, 0, 0, 0, 1, NULL, NULL),
(209, 20738, 0, 0, 0, 0, 0, 1, NULL, NULL),
(211, 20743, 0, 0, 0, 0, 0, 1, NULL, NULL),
(213, 20745, 0, 0, 0, 0, 0, 1, NULL, NULL),
(215, 20747, 0, 0, 0, 0, 0, 1, NULL, NULL),
(217, 20749, 0, 0, 0, 0, 0, 1, NULL, NULL),
(223, 20757, 0, 0, 0, 0, 0, 1, NULL, NULL),
(224, 20758, 0, 0, 0, 0, 0, 1, NULL, NULL),
(225, 20761, 0, 0, 0, 0, 0, 1, NULL, NULL),
(226, 20766, 0, 0, 0, 0, 0, 1, NULL, NULL),
(227, 20770, 0, 0, 0, 0, 0, 1, NULL, NULL),
(228, 20771, 0, 0, 0, 0, 0, 1, NULL, NULL),
(229, 20772, 0, 0, 0, 0, 0, 1, NULL, NULL),
(230, 20773, 0, 0, 0, 0, 0, 1, NULL, NULL),
(231, 20775, 0, 0, 0, 0, 0, 1, NULL, NULL),
(232, 20776, 0, 0, 0, 0, 0, 1, NULL, NULL),
(233, 20777, 0, 0, 0, 0, 0, 1, NULL, NULL),
(235, 20779, 0, 0, 0, 0, 0, 1, NULL, NULL),
(236, 20780, 0, 0, 0, 0, 0, 1, NULL, NULL),
(237, 20782, 0, 0, 0, 0, 0, 1, NULL, NULL),
(239, 20784, 0, 0, 0, 0, 0, 1, NULL, NULL),
(240, 20785, 0, 0, 0, 0, 0, 1, NULL, NULL),
(241, 20786, 0, 0, 0, 0, 0, 1, NULL, NULL),
(243, 20788, 0, 0, 0, 0, 0, 1, NULL, NULL),
(244, 20789, 0, 0, 0, 0, 0, 1, NULL, NULL),
(245, 20791, 0, 0, 0, 0, 0, 1, NULL, NULL),
(246, 20793, 0, 0, 0, 0, 0, 1, NULL, NULL),
(247, 20794, 0, 0, 0, 0, 0, 1, NULL, NULL),
(248, 20796, 0, 0, 0, 0, 0, 1, NULL, NULL),
(249, 20797, 0, 0, 0, 0, 0, 1, NULL, NULL),
(250, 20798, 0, 0, 0, 0, 0, 1, NULL, NULL),
(251, 20799, 0, 0, 0, 0, 0, 1, NULL, NULL),
(252, 20801, 0, 0, 0, 0, 0, 1, NULL, NULL),
(253, 20802, 0, 0, 0, 0, 0, 1, NULL, NULL),
(254, 20803, 0, 0, 0, 0, 0, 1, NULL, NULL),
(255, 20804, 0, 0, 0, 0, 0, 1, NULL, NULL),
(256, 20805, 0, 0, 0, 0, 0, 1, NULL, NULL),
(257, 20806, 0, 0, 0, 0, 0, 1, NULL, NULL),
(258, 20807, 0, 0, 0, 0, 0, 1, NULL, NULL),
(259, 20808, 0, 0, 0, 0, 0, 1, NULL, NULL),
(260, 20809, 0, 0, 0, 0, 0, 1, NULL, NULL),
(261, 20810, 0, 0, 0, 0, 0, 1, NULL, NULL),
(262, 20811, 0, 0, 0, 0, 0, 1, NULL, NULL),
(263, 20812, 0, 0, 0, 0, 0, 1, NULL, NULL),
(266, 20815, 0, 0, 0, 0, 0, 1, NULL, NULL),
(267, 20816, 0, 0, 0, 0, 0, 1, NULL, NULL),
(268, 20817, 0, 0, 0, 0, 0, 1, NULL, NULL),
(270, 20819, 0, 0, 0, 0, 0, 1, NULL, NULL),
(271, 20820, 0, 0, 0, 0, 0, 1, NULL, NULL),
(273, 20822, 0, 0, 0, 0, 0, 1, NULL, NULL),
(274, 20823, 0, 0, 0, 0, 0, 1, NULL, NULL),
(276, 20825, 0, 0, 0, 0, 0, 1, NULL, NULL),
(278, 20827, 0, 0, 0, 0, 0, 1, NULL, NULL),
(279, 20828, 0, 0, 0, 0, 0, 1, NULL, NULL),
(280, 20829, 0, 0, 0, 0, 0, 1, NULL, NULL),
(281, 20830, 0, 0, 0, 0, 0, 1, NULL, NULL),
(282, 20832, 0, 0, 0, 0, 0, 1, NULL, NULL),
(285, 20835, 0, 0, 0, 0, 0, 1, NULL, NULL),
(286, 20836, 0, 0, 0, 0, 0, 1, NULL, NULL),
(288, 20838, 0, 0, 0, 0, 0, 1, NULL, NULL),
(289, 20839, 0, 0, 0, 0, 0, 1, NULL, NULL),
(292, 20842, 0, 0, 0, 0, 0, 1, NULL, NULL),
(293, 20843, 0, 0, 0, 0, 0, 1, NULL, NULL),
(296, 20847, 0, 0, 0, 0, 0, 1, NULL, NULL),
(297, 20848, 0, 0, 0, 0, 0, 1, NULL, NULL),
(298, 20849, 0, 0, 0, 0, 0, 1, NULL, NULL),
(299, 20850, 0, 0, 0, 0, 0, 1, NULL, NULL),
(300, 20851, 0, 0, 0, 0, 0, 1, NULL, NULL),
(302, 20853, 0, 0, 0, 0, 0, 1, NULL, NULL),
(304, 20855, 0, 0, 0, 0, 0, 1, NULL, NULL),
(305, 20856, 0, 0, 0, 0, 0, 1, NULL, NULL),
(307, 20858, 0, 0, 0, 0, 0, 1, NULL, NULL),
(308, 20864, 0, 0, 0, 0, 0, 1, NULL, NULL),
(309, 20865, 0, 0, 0, 0, 0, 1, NULL, NULL),
(310, 20866, 0, 0, 0, 0, 0, 1, NULL, NULL),
(311, 20867, 0, 0, 0, 0, 0, 1, NULL, NULL),
(314, 20870, 0, 0, 0, 0, 0, 1, NULL, NULL),
(315, 20871, 0, 0, 0, 0, 0, 1, NULL, NULL),
(317, 20875, 0, 0, 0, 0, 0, 1, NULL, NULL),
(318, 20876, 0, 0, 0, 0, 0, 1, NULL, NULL),
(319, 20877, 0, 0, 0, 0, 0, 1, NULL, NULL),
(320, 20878, 0, 0, 0, 0, 0, 1, NULL, NULL),
(321, 20879, 0, 0, 0, 0, 0, 1, NULL, NULL),
(322, 20880, 0, 0, 0, 0, 0, 1, NULL, NULL),
(323, 20881, 0, 0, 0, 0, 0, 1, NULL, NULL),
(326, 20885, 0, 0, 0, 0, 0, 1, NULL, NULL),
(329, 20888, 0, 0, 0, 0, 0, 1, NULL, NULL),
(330, 20889, 0, 0, 0, 0, 0, 1, NULL, NULL),
(333, 20893, 0, 0, 0, 0, 0, 1, NULL, NULL),
(334, 20897, 0, 0, 0, 0, 0, 1, NULL, NULL),
(335, 20898, 0, 0, 0, 0, 0, 1, NULL, NULL),
(336, 20899, 0, 0, 0, 0, 0, 1, NULL, NULL),
(337, 20900, 0, 0, 0, 0, 0, 1, NULL, NULL),
(338, 20901, 0, 0, 0, 0, 0, 1, NULL, NULL),
(340, 20903, 0, 0, 0, 0, 0, 1, NULL, NULL),
(342, 20908, 0, 0, 0, 0, 0, 1, NULL, NULL),
(343, 20910, 0, 0, 0, 0, 0, 1, NULL, NULL),
(344, 20911, 0, 0, 0, 0, 0, 1, NULL, NULL),
(345, 20912, 0, 0, 0, 0, 0, 1, NULL, NULL),
(346, 20913, 0, 0, 0, 0, 0, 1, NULL, NULL),
(347, 20914, 0, 0, 0, 0, 0, 1, NULL, NULL),
(350, 20917, 0, 0, 0, 0, 0, 1, NULL, NULL),
(351, 20918, 0, 0, 0, 0, 0, 1, NULL, NULL),
(352, 20949, 0, 0, 0, 0, 0, 1, NULL, NULL),
(353, 20955, 0, 0, 0, 0, 0, 1, NULL, NULL),
(354, 20972, 0, 0, 0, 0, 0, 1, NULL, NULL),
(355, 20973, 0, 0, 0, 0, 0, 1, NULL, NULL),
(356, 20974, 0, 0, 0, 0, 0, 1, NULL, NULL),
(357, 20975, 0, 0, 0, 0, 0, 1, NULL, NULL),
(358, 20979, 0, 0, 0, 0, 0, 1, NULL, NULL),
(359, 20987, 0, 0, 0, 0, 0, 1, NULL, NULL),
(360, 20988, 0, 0, 0, 0, 0, 1, NULL, NULL),
(361, 20989, 0, 0, 0, 0, 0, 1, NULL, NULL),
(362, 20990, 0, 0, 0, 0, 0, 1, NULL, NULL),
(363, 20991, 0, 0, 0, 0, 0, 1, NULL, NULL),
(364, 20992, 0, 0, 0, 0, 0, 1, NULL, NULL),
(365, 20993, 0, 0, 0, 0, 0, 1, NULL, NULL),
(366, 20994, 0, 0, 0, 0, 0, 1, NULL, NULL),
(367, 20995, 0, 0, 0, 0, 0, 1, NULL, NULL),
(368, 20996, 0, 0, 0, 0, 0, 1, NULL, NULL),
(369, 20997, 0, 0, 0, 0, 0, 1, NULL, NULL),
(370, 20998, 0, 0, 0, 0, 0, 1, NULL, NULL),
(371, 20999, 0, 0, 0, 0, 0, 1, NULL, NULL),
(372, 21000, 0, 0, 0, 0, 0, 1, NULL, NULL),
(373, 21001, 0, 0, 0, 0, 0, 1, NULL, NULL),
(374, 21002, 0, 0, 0, 0, 0, 1, NULL, NULL),
(375, 21003, 0, 0, 0, 0, 0, 1, NULL, NULL),
(376, 21004, 0, 0, 0, 0, 0, 1, NULL, NULL),
(377, 21005, 0, 0, 0, 0, 0, 1, NULL, NULL),
(379, 21007, 0, 0, 0, 0, 0, 1, NULL, NULL),
(380, 21008, 0, 0, 0, 0, 0, 1, NULL, NULL),
(381, 21009, 0, 0, 0, 0, 0, 1, NULL, NULL),
(382, 21010, 0, 0, 0, 0, 0, 1, NULL, NULL),
(383, 21012, 0, 0, 0, 0, 0, 1, NULL, NULL),
(384, 21013, 0, 0, 0, 0, 0, 1, NULL, NULL),
(385, 21014, 0, 0, 0, 0, 0, 1, NULL, NULL),
(386, 21015, 0, 0, 0, 0, 0, 1, NULL, NULL),
(387, 21016, 0, 0, 0, 0, 0, 1, NULL, NULL),
(388, 21017, 0, 0, 0, 0, 0, 1, NULL, NULL),
(389, 21018, 0, 0, 0, 0, 0, 1, NULL, NULL),
(390, 21019, 0, 0, 0, 0, 0, 1, NULL, NULL),
(391, 21020, 0, 0, 0, 0, 0, 1, NULL, NULL),
(392, 21021, 0, 0, 0, 0, 0, 1, NULL, NULL),
(394, 21023, 0, 0, 0, 0, 0, 1, NULL, NULL),
(395, 21031, 0, 0, 0, 0, 0, 1, NULL, NULL),
(396, 21046, 0, 0, 0, 0, 0, 1, NULL, NULL),
(397, 21047, 0, 0, 0, 0, 0, 1, NULL, NULL),
(398, 21274, 0, 0, 0, 0, 0, 1, NULL, NULL),
(399, 21275, 0, 0, 0, 0, 0, 1, NULL, NULL),
(400, 21279, 0, 0, 0, 0, 0, 1, NULL, NULL),
(401, 21280, 0, 0, 0, 0, 0, 1, NULL, NULL),
(403, 21284, 0, 0, 0, 0, 0, 1, NULL, NULL),
(404, 21285, 0, 0, 0, 0, 0, 1, NULL, NULL),
(406, 21287, 0, 0, 0, 0, 0, 1, NULL, NULL),
(407, 21291, 0, 0, 0, 0, 0, 1, NULL, NULL),
(408, 21292, 0, 0, 0, 0, 0, 1, NULL, NULL),
(409, 21293, 0, 0, 0, 0, 0, 1, NULL, NULL),
(410, 21294, 0, 0, 0, 0, 0, 1, NULL, NULL),
(411, 21296, 0, 0, 0, 0, 0, 1, NULL, NULL),
(412, 21299, 0, 0, 0, 0, 0, 1, NULL, NULL),
(413, 31509, 0, 0, 0, 0, 0, 1, NULL, NULL),
(414, 31522, 0, 0, 0, 0, 0, 1, NULL, NULL),
(415, 31525, 0, 0, 0, 0, 0, 1, NULL, NULL),
(416, 41603, 0, 0, 0, 0, 0, 1, NULL, NULL),
(417, 51656, 0, 0, 0, 1, 1, 1, NULL, '2023-01-16 01:08:05'),
(418, 52086, 0, 0, 0, 0, 0, 1, NULL, NULL),
(419, 52110, 0, 0, 0, 0, 0, 1, NULL, NULL),
(420, 52123, 0, 0, 0, 0, 0, 1, NULL, NULL),
(421, 52126, 0, 0, 0, 0, 0, 1, NULL, NULL),
(423, 62816, 0, 0, 0, 0, 0, 1, NULL, NULL),
(426, 62831, 0, 0, 0, 0, 0, 1, NULL, NULL),
(427, 62832, 0, 0, 0, 0, 0, 1, NULL, NULL),
(429, 73097, 0, 0, 0, 0, 0, 1, NULL, NULL),
(430, 73150, 0, 0, 0, 0, 0, 1, NULL, NULL),
(431, 73151, 0, 0, 0, 0, 0, 1, NULL, NULL),
(432, 73152, 0, 0, 0, 0, 0, 1, NULL, NULL),
(433, 83210, 0, 0, 0, 0, 0, 1, NULL, NULL),
(435, 83217, 0, 0, 0, 0, 0, 1, NULL, NULL),
(436, 83218, 0, 0, 0, 0, 0, 1, NULL, NULL),
(437, 83219, 0, 0, 0, 0, 0, 1, NULL, NULL),
(438, 83220, 0, 0, 0, 0, 0, 1, NULL, NULL),
(439, 83221, 0, 0, 0, 0, 0, 1, NULL, NULL),
(440, 83222, 0, 0, 0, 0, 0, 1, NULL, NULL),
(441, 83223, 0, 0, 0, 0, 0, 1, NULL, NULL),
(442, 83224, 0, 0, 0, 0, 0, 1, NULL, NULL),
(443, 83228, 0, 0, 0, 0, 0, 1, NULL, NULL),
(444, 83229, 0, 0, 0, 0, 0, 1, NULL, NULL),
(445, 83230, 0, 0, 0, 0, 0, 1, NULL, NULL),
(446, 83231, 0, 0, 0, 0, 0, 1, NULL, NULL),
(447, 83232, 0, 0, 0, 0, 0, 1, NULL, NULL),
(448, 83233, 0, 0, 0, 0, 0, 1, NULL, NULL),
(449, 83234, 0, 0, 0, 0, 0, 1, NULL, NULL),
(450, 83235, 0, 0, 0, 0, 0, 1, NULL, NULL),
(451, 83296, 0, 0, 0, 0, 0, 1, NULL, NULL),
(452, 83299, 0, 0, 0, 0, 0, 1, NULL, NULL),
(453, 83336, 0, 0, 0, 0, 0, 1, NULL, NULL),
(454, 83348, 0, 0, 0, 0, 0, 1, NULL, NULL),
(455, 83394, 0, 0, 0, 0, 0, 1, NULL, NULL),
(456, 83837, 0, 0, 0, 0, 0, 1, NULL, NULL),
(457, 83862, 0, 0, 0, 0, 0, 1, NULL, NULL),
(458, 83875, 0, 0, 0, 0, 0, 1, NULL, NULL),
(459, 83883, 0, 0, 0, 0, 0, 1, NULL, NULL),
(460, 94107, 0, 0, 0, 0, 0, 1, NULL, NULL),
(462, 94113, 0, 0, 0, 0, 0, 1, NULL, NULL),
(463, 94114, 0, 0, 0, 0, 0, 1, NULL, NULL),
(464, 94116, 0, 0, 0, 0, 0, 1, NULL, NULL),
(465, 94117, 0, 0, 0, 0, 0, 1, NULL, NULL),
(466, 94118, 0, 0, 0, 0, 0, 1, NULL, NULL),
(467, 94119, 0, 0, 0, 0, 0, 1, NULL, NULL),
(468, 94121, 0, 0, 0, 0, 0, 1, NULL, NULL),
(469, 94122, 0, 0, 0, 0, 0, 1, NULL, NULL),
(470, 94123, 0, 0, 0, 0, 0, 1, NULL, NULL),
(471, 94124, 0, 0, 0, 0, 0, 1, NULL, NULL),
(472, 94125, 0, 0, 0, 0, 0, 1, NULL, NULL),
(473, 94126, 0, 0, 0, 0, 0, 1, NULL, NULL),
(474, 94131, 0, 0, 0, 0, 0, 1, NULL, NULL),
(475, 94132, 0, 0, 0, 0, 0, 1, NULL, NULL),
(476, 94136, 0, 0, 0, 0, 0, 1, NULL, NULL),
(477, 94137, 0, 0, 0, 0, 0, 1, NULL, NULL),
(478, 94138, 0, 0, 0, 0, 0, 1, NULL, NULL),
(479, 94139, 0, 0, 0, 0, 0, 1, NULL, NULL),
(480, 94141, 0, 0, 0, 0, 0, 1, NULL, NULL),
(481, 94142, 0, 0, 0, 0, 0, 1, NULL, NULL),
(482, 94145, 0, 0, 0, 0, 0, 1, NULL, NULL),
(483, 94147, 0, 0, 0, 0, 0, 1, NULL, NULL),
(484, 94148, 0, 0, 0, 0, 0, 1, NULL, NULL),
(485, 94149, 0, 0, 0, 0, 0, 1, NULL, NULL),
(486, 94154, 0, 0, 0, 0, 0, 1, NULL, NULL),
(487, 94155, 0, 0, 0, 0, 0, 1, NULL, NULL),
(488, 94156, 0, 0, 0, 0, 0, 1, NULL, NULL),
(489, 94157, 0, 0, 0, 0, 0, 1, NULL, NULL),
(490, 94158, 0, 0, 0, 0, 0, 1, NULL, NULL),
(491, 94159, 0, 0, 0, 0, 0, 1, NULL, NULL),
(492, 94161, 0, 0, 0, 0, 0, 1, NULL, NULL),
(493, 94162, 0, 0, 0, 0, 0, 1, NULL, NULL),
(494, 94163, 0, 0, 0, 0, 0, 1, NULL, NULL),
(495, 94164, 0, 0, 0, 0, 0, 1, NULL, NULL),
(496, 94166, 0, 0, 0, 0, 0, 1, NULL, NULL),
(497, 94167, 0, 0, 0, 0, 0, 1, NULL, NULL),
(498, 94168, 0, 0, 0, 0, 0, 1, NULL, NULL),
(499, 94170, 0, 0, 0, 0, 0, 1, NULL, NULL),
(500, 94171, 0, 0, 0, 0, 0, 1, NULL, NULL),
(501, 94172, 0, 0, 0, 0, 0, 1, NULL, NULL),
(502, 94173, 0, 0, 0, 0, 0, 1, NULL, NULL),
(503, 94174, 0, 0, 0, 0, 0, 1, NULL, NULL),
(504, 94175, 0, 0, 0, 0, 0, 1, NULL, NULL),
(505, 94176, 0, 0, 0, 0, 0, 1, NULL, NULL),
(506, 94177, 0, 0, 0, 0, 0, 1, NULL, NULL),
(507, 94178, 0, 0, 0, 0, 0, 1, NULL, NULL),
(508, 94179, 0, 0, 0, 0, 0, 1, NULL, NULL),
(509, 94180, 0, 0, 0, 0, 0, 1, NULL, NULL),
(510, 94181, 0, 0, 0, 0, 0, 1, NULL, NULL),
(511, 94182, 0, 0, 0, 0, 0, 1, NULL, NULL),
(512, 94183, 0, 0, 0, 0, 0, 1, NULL, NULL),
(513, 94184, 0, 0, 0, 0, 0, 1, NULL, NULL),
(514, 94185, 0, 0, 0, 0, 0, 1, NULL, NULL),
(515, 94186, 0, 0, 0, 0, 0, 1, NULL, NULL),
(516, 94187, 0, 0, 0, 0, 0, 1, NULL, NULL),
(517, 94188, 0, 0, 0, 0, 0, 1, NULL, NULL),
(518, 94190, 0, 0, 0, 0, 0, 1, NULL, NULL),
(519, 94191, 0, 0, 0, 0, 0, 1, NULL, NULL),
(520, 94192, 0, 0, 0, 0, 0, 1, NULL, NULL),
(521, 94193, 0, 0, 0, 0, 0, 1, NULL, NULL),
(522, 94195, 0, 0, 0, 0, 0, 1, NULL, NULL),
(523, 94196, 0, 0, 0, 0, 0, 1, NULL, NULL),
(524, 94197, 0, 0, 0, 0, 0, 1, NULL, NULL),
(525, 94198, 0, 0, 0, 0, 0, 1, '2023-01-12 02:06:38', '2023-01-12 02:06:38'),
(526, 94199, 0, 0, 0, 1, 0, 1, '2023-01-12 04:21:29', '2023-01-12 04:21:29'),
(527, 94202, 0, 0, 0, 0, 1, 1, '2023-01-13 14:25:35', '2023-01-13 14:25:35'),
(529, 94204, 0, 0, 0, 0, 1, 1, '2023-01-13 18:52:28', '2023-01-13 18:52:28'),
(530, 94205, 0, 0, 0, 0, 1, 1, '2023-01-13 19:00:57', '2023-01-13 19:00:57'),
(531, 94209, 0, 0, 0, 0, 0, 1, '2023-01-15 01:02:36', '2023-01-15 01:02:36'),
(532, 94212, 0, 0, 0, 1, 1, 1, '2023-01-15 23:44:28', '2023-01-15 23:44:28'),
(533, 94214, 0, 0, 0, 0, 1, 1, '2023-01-16 21:05:44', '2023-01-16 21:05:44'),
(534, 94216, 0, 0, 0, 1, 1, 1, '2023-01-18 11:08:32', '2023-01-18 11:08:32'),
(535, 94219, 0, 0, 0, 0, 0, 1, '2023-01-19 20:05:03', '2023-01-19 20:05:03'),
(536, 94220, 0, 0, 0, 0, 0, 1, '2023-01-20 14:56:48', '2023-01-20 14:56:48'),
(537, 94221, 0, 0, 0, 0, 1, 1, '2023-01-20 19:47:09', '2023-01-20 19:47:09'),
(538, 94222, 0, 0, 0, 0, 0, 1, '2023-01-20 21:53:53', '2023-01-20 21:53:53'),
(539, 94223, 0, 0, 0, 0, 0, 1, '2023-01-20 23:24:22', '2023-01-20 23:24:22'),
(540, 94224, 0, 0, 0, 0, 1, 1, '2023-01-21 06:16:58', '2023-01-21 06:16:58'),
(541, 94227, 0, 0, 0, 1, 1, 1, '2023-01-21 23:06:14', '2023-01-21 23:06:14'),
(542, 94228, 0, 0, 0, 0, 1, 1, '2023-01-22 05:11:16', '2023-01-22 05:11:16'),
(543, 94229, 0, 0, 0, 0, 0, 1, '2023-01-22 17:21:11', '2023-01-22 17:21:11'),
(544, 94230, 0, 0, 0, 0, 0, 1, '2023-01-23 12:53:47', '2023-01-23 12:53:47'),
(545, 94232, 0, 0, 0, 0, 1, 1, '2023-01-23 20:09:46', '2023-01-23 20:09:46'),
(546, 94236, 0, 0, 0, 0, 1, 1, '2023-01-25 17:29:02', '2023-01-25 17:29:02'),
(547, 94238, 0, 0, 0, 1, 1, 1, '2023-01-26 19:25:45', '2023-01-26 19:25:45'),
(548, 94241, 0, 0, 1, 1, 1, 1, '2023-01-27 23:02:00', '2023-01-27 23:02:00'),
(549, 94242, 0, 0, 0, 0, 0, 1, '2023-01-28 17:23:20', '2023-01-28 17:23:20'),
(550, 94243, 0, 0, 0, 0, 0, 1, '2023-01-28 18:32:29', '2023-01-28 18:32:29'),
(551, 94244, 0, 0, 0, 0, 0, 1, '2023-01-28 20:45:43', '2023-01-28 20:45:43'),
(552, 94247, 0, 0, 0, 0, 0, 1, '2023-01-29 05:37:22', '2023-01-29 05:37:22'),
(553, 94251, 0, 0, 0, 0, 0, 1, '2023-01-29 22:30:40', '2023-01-29 22:30:40'),
(554, 94252, 0, 0, 0, 1, 1, 1, '2023-01-29 23:44:07', '2023-01-29 23:44:07'),
(555, 94256, 0, 0, 0, 0, 1, 1, '2023-01-30 19:43:21', '2023-01-30 19:43:21'),
(556, 94257, 0, 0, 0, 0, 0, 1, '2023-01-31 00:03:20', '2023-01-31 00:03:20'),
(557, 94258, 0, 0, 0, 0, 0, 1, '2023-01-31 03:26:53', '2023-01-31 03:26:53'),
(558, 94260, 0, 0, 0, 0, 0, 1, '2023-01-31 21:59:18', '2023-01-31 21:59:18'),
(559, 94261, 0, 0, 0, 0, 1, 1, '2023-01-31 22:13:02', '2023-01-31 22:13:02'),
(560, 94263, 0, 0, 0, 1, 1, 1, '2023-02-01 16:37:57', '2023-02-01 16:37:57'),
(561, 94264, 0, 0, 0, 0, 0, 1, '2023-02-01 17:21:43', '2023-02-01 17:21:43');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `donation_amount` double NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `donation_category_id` bigint(20) UNSIGNED NOT NULL,
  `publish` tinyint(4) NOT NULL DEFAULT '1',
  `position` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mailsent` tinyint(4) DEFAULT NULL,
  `donation_cause_other` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donation_categories`
--

CREATE TABLE `donation_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `donation_cause` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` tinyint(4) NOT NULL DEFAULT '1',
  `position` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donation_categories`
--

INSERT INTO `donation_categories` (`id`, `donation_cause`, `publish`, `position`, `created_at`, `updated_at`) VALUES
(3, 'Chicago Andhra Foundation', 1, 1, '2022-12-03 08:13:28', '2023-01-20 14:19:17'),
(10011, 'Annadanam', 1, 1, '2022-12-04 08:13:28', '2023-01-20 14:19:15'),
(10012, 'Children\'s Education', 1, 1, '2022-12-05 08:13:28', '2023-01-20 14:19:22'),
(10013, 'Nurse Support for Challenged Kids', 13, 1, '2022-12-06 08:13:28', '2022-12-06 08:13:28'),
(10014, 'Women Empowerment - Sewing Machine Project', 1, 1, '2022-12-07 08:13:28', '2023-01-20 14:18:54'),
(10015, 'Girls Hygiene Support', 0, 1, '2022-12-08 08:13:28', '2023-01-13 13:22:55'),
(10016, 'Sewing Machine', 0, 0, '2022-12-09 08:13:28', '2023-01-13 13:22:52'),
(10018, 'Senior Service', 0, 1, '2022-12-10 08:13:28', '2023-01-13 13:22:51'),
(10019, 'Village Water Management Support', 0, 1, '2022-12-11 08:13:28', '2023-01-13 13:22:50'),
(10020, 'Women Empowerment - Chula', 0, 0, '2022-12-12 08:13:28', '2023-01-13 13:22:48'),
(10021, 'Women Empowerment - Embroidery', 0, 0, '2022-12-13 08:13:28', '2023-01-13 13:22:47'),
(10022, 'Repalle Community Development Project', 0, 1, '2022-12-14 08:13:28', '2023-01-13 13:22:46'),
(10023, 'Beddings for Asha Jyothi children', 0, 1, '2022-12-15 08:13:28', '2023-01-13 13:22:46'),
(10024, 'Blankets for the Needy', 0, 1, '2022-12-16 08:13:28', '2023-01-13 13:22:45'),
(10025, 'Other', 1, 1, '2022-12-17 08:13:28', '2023-01-20 14:18:21');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_category_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `members_only` tinyint(4) NOT NULL DEFAULT '0',
  `additional_fields` text COLLATE utf8mb4_unicode_ci,
  `registration_enabled` tinyint(4) NOT NULL DEFAULT '0',
  `reg_start_date` datetime NOT NULL,
  `reg_end_date` datetime NOT NULL,
  `is_guest_adult` tinyint(4) NOT NULL DEFAULT '0',
  `guest_adult_amount` double DEFAULT NULL,
  `is_guest_child` tinyint(4) NOT NULL DEFAULT '0',
  `guest_child_amount` double DEFAULT NULL,
  `is_adult` tinyint(4) NOT NULL DEFAULT '0',
  `adult_amount` double DEFAULT NULL,
  `is_child` tinyint(4) NOT NULL DEFAULT '0',
  `child_amount` double DEFAULT NULL,
  `event_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_note` text COLLATE utf8mb4_unicode_ci,
  `page_title` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `top_line` text COLLATE utf8mb4_unicode_ci,
  `publish` tinyint(4) NOT NULL DEFAULT '1',
  `position` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_category_id`, `start_date`, `end_date`, `location`, `city`, `state`, `zipcode`, `contact_email`, `image`, `members_only`, `additional_fields`, `registration_enabled`, `reg_start_date`, `reg_end_date`, `is_guest_adult`, `guest_adult_amount`, `is_guest_child`, `guest_child_amount`, `is_adult`, `adult_amount`, `is_child`, `child_amount`, `event_description`, `registration_note`, `page_title`, `meta_description`, `meta_keywords`, `top_line`, `publish`, `position`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Sankranthi Sambaralu 15th January 2024', 1, '2024-01-13 14:08:00', '2024-01-20 14:09:00', 'California', 'California', 'USA', '54321', 'ux@f9tech.com', 'm0b5g13uo.jpg', 0, '{\"field_1\":{\"field_name\":null,\"field_type\":null,\"field_options\":null},\"field_2\":{\"field_name\":null,\"field_type\":null,\"field_options\":null}}', 1, '2023-08-10 14:08:00', '2024-01-10 14:09:00', 1, 150, 1, 25, 1, 100, 1, 50, '<p>Sankranthi Sambaralu - Please join us to celebrate one the biggest festivals of our Telugu states Sankrathi the harvest festival on Sunday 15th January @veerabhadra swamy temple Coachella California. The Andhra JanmaBhoomi Association based in California celebrated Sankranti, the harvest festival of Andhra Pradesh and Telangana, with great enthusiasm and zeal. The event was attended by members of the association, along with their families and friends.The celebration started with a pooja, followed by the traditional kite-flying ritual. The members were seen enjoying the activity, displaying their kite-flying skills, and competing with each other. The highlight of the event was the food festival, featuring traditional Telugu cuisine, including sweet dishes like ariselu and savory items like pulihora and garelu. The food festival was a hit among the attendees, who relished the authentic flavors of Telugu cuisine. The event also featured cultural programs, including music and dance performances, showcasing the rich cultural heritage of Andhra Pradesh and Telangana. The audience was entertained by the lively performances, which added to the festive spirit of the celebration. The Andhra JanmaBhoomi Association aims to promote Telugu culture and traditions among the Telugu community residing in California. The Sankranti celebration was a successful endeavor in bringing the community together and fostering a sense of camaraderie and belongingness.</p>', '<p>Sankranthi Sambaralu: 15th January 2024</p>', 'Sankranthi Sambaralu', 'Sankranthi Sambaralu', 'Sankranthi Sambaralu', 'Sankranthi Sambaralu', 1, 0, '2023-03-21 03:11:27', '2023-03-31 04:19:19', 'sankranthi-sambaralu-15th-january-2024'),
(2, 'New Year 2023', 2, '2023-07-06 14:13:00', '2024-01-13 14:14:00', 'Cambridge', 'Cambridge', 'USA', '53545', 'ux@f9tech.com', '8kvbt5243.jpg', 1, '{\"field_1\":{\"field_name\":\"Cambridge\",\"field_type\":\"textbox\",\"field_options\":null},\"field_2\":{\"field_name\":\"Cambridge\",\"field_type\":\"select\",\"field_options\":\"Cambridge\"}}', 1, '2023-07-01 14:13:00', '2024-01-06 14:14:00', 0, NULL, 0, NULL, 0, NULL, 0, NULL, '<h4>1st January 2024</h4>\r\n\r\n<h6>Wish you all a Happy New Year 2024</h6>\r\n\r\n<p>Celebrate your New Year&rsquo;s with Andhra JanmaBhoomi Association The Andhra JanmaBhoomi Association in California celebrated the New Year with great zeal and enthusiasm. The event was attended by members of the association, along with their families and friends, who came together to usher in the new year and celebrate the start of a new decade. The celebration began with a pooja, followed by cultural programs showcasing the rich Telugu heritage. The highlight of the event was the food festival, featuring traditional Telugu cuisine, including biryani, dosa, and other delicious dishes. The attendees were also treated to a range of fun activities, including games, music, and dance. The event provided an opportunity for the community to come together, socialize, and connect with each other. The Andhra JanmaBhoomi Association aims to promote Telugu culture and traditions among the Telugu community residing in California. The New Year celebration was a successful endeavor in bringing the community together and fostering a sense of camaraderie and belongingness. The association plans to organize more such events in the future to keep the Telugu community connected and engaged.</p>', '<h2>&nbsp;Event Description</h2>', NULL, NULL, NULL, NULL, 1, 0, '2023-03-21 03:16:53', '2023-03-21 03:16:53', 'new-year-2023'),
(3, 'Mothers day celebration', 2, '2023-12-31 14:19:00', '2024-01-02 14:20:00', 'USA', 'USA', 'USA', '53334', 'ux@f9tech.com', 'm6g2j9gai.jpg', 0, '{\"field_1\":{\"field_name\":null,\"field_type\":null,\"field_options\":null},\"field_2\":{\"field_name\":null,\"field_type\":null,\"field_options\":null}}', 1, '2023-03-22 14:19:00', '2023-12-30 14:20:00', 1, 100, 1, 100, 1, 100, 1, 100, '<p>The Andhra JanmaBhoomi Association (AJA), a non-profit organization based in California that promotes and supports the culture and language of Telugu people, celebrated Mother&#39;s Day with great enthusiasm and love. The event was organized to honor and celebrate the contribution of mothers and mother figures in the Telugu community. The association&#39;s members, along with their families, participated in the event to express their gratitude and appreciation towards their mothers.The event started with a welcome speech by the President of the AJA, who emphasized the importance of mothers in our lives and the need to celebrate them. This was followed by a cultural program, where children and adults performed traditional Telugu songs, dances, and skits to entertain the audience. A highlight of the event was a panel discussion where mothers from the community shared their experiences and insights on motherhood, highlighting the challenges and joys of raising children in a foreign country while preserving their cultural identity. The event concluded with a special lunch, where members enjoyed traditional Telugu cuisine and spent quality time with their families and friends. The Mother&#39;s Day celebration at the AJA was a great success, bringing together the Telugu community to celebrate the spirit of motherhood and the contribution of mothers in our lives. The event also served as a platform to showcase the rich Telugu culture and traditions, while strengthening the bonds of the community. The AJA&#39;s efforts in organizing such events not only help to preserve the Telugu heritage but also serve as an inspiration to other organizations to celebrate and promote the role of mothers and mother figures in our lives.</p>', NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-03-21 03:21:58', '2023-03-31 04:19:53', 'mothers-day-celebration-');

-- --------------------------------------------------------

--
-- Table structure for table `event_categories`
--

CREATE TABLE `event_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` tinyint(4) NOT NULL DEFAULT '1',
  `position` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_categories`
--

INSERT INTO `event_categories` (`id`, `name`, `publish`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Cultural Events', 1, 0, NULL, NULL),
(2, 'Community Events', 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_registrations`
--

CREATE TABLE `event_registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adult_count` int(11) DEFAULT NULL,
  `child_count` int(11) DEFAULT NULL,
  `guest_adult_count` int(11) DEFAULT NULL,
  `guest_child_count` int(11) DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `additional_fields` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` tinyint(4) NOT NULL DEFAULT '1',
  `position` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mailsent` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mail_templates`
--

CREATE TABLE `mail_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` tinyint(4) NOT NULL DEFAULT '1',
  `position` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mail_templates`
--

INSERT INTO `mail_templates` (`id`, `heading`, `subject`, `mail_type`, `description`, `publish`, `position`, `created_at`, `updated_at`) VALUES
(3, 'Thank you for giving donation', 'Thank you for giving donation - CAA', 'auto', '<table align=\"center\" bgcolor=\"#F2F2F2\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\"><!-- top space -->\r\n	<tbody>\r\n		<tr height=\"15\">\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<!-- main -->\r\n		<tr>\r\n			<td>\r\n			<table align=\"center\" bgcolor=\"#F2F2F2\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n				<tbody>\r\n					<tr><!-- left space -->\r\n						<td width=\"15\">&nbsp;</td>\r\n						<!--  content -->\r\n						<td>\r\n						<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"><!-- header -->\r\n							<tbody>\r\n								<tr height=\"140\">\r\n									<td align=\"center\" bgcolor=\"#FF6000\"><img height=\"88\" src=\"https://chicagoandhra.org/images/media/1zccc6wjn.png\" style=\"line-height: 1px; border: none;\" width=\"342\" /></td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n									<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"text-align: center;\" width=\"100%\">\r\n										<tbody>\r\n											<tr>\r\n												<td width=\"15\">&nbsp;</td>\r\n												<td align=\"center\">\r\n												<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n													<tbody>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr height=\"120\">\r\n															<td align=\"center\"><img height=\"92\" src=\"https://i.postimg.cc/BZxqkkKR/volunteer-activism.png\" style=\"line-height: 1px; border: none;\" width=\"82\" /></td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 24px; line-height: 26px; font-weight: normal; color: #000000; text-align: center;\">Dear <span style=\"color:#2D6FD1\">[Full Name],</span></td>\r\n														</tr>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; line-height: 32px; font-weight: normal; color: #000000; text-align: center;\">Thank you for your Donation.<br />\r\n															Please find your donation details below.</td>\r\n														</tr>\r\n														<tr height=\"30\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr>\r\n															<td>\r\n															<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"70%\">\r\n																<tbody>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #181818; \" width=\"200\">First Name</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[First Name]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #181818; \" width=\"200\">Last Name</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Last Name]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #181818; \" width=\"200\">Donation Program</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Donation Program]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #181818; \" width=\"200\">Payment Date</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Payment Date]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color:#181818; \" width=\"200\">Amount</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Amount]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color:#181818; \" width=\"200\">Payment Status</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Payment Status]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color:#181818; \" width=\"200\">Payment Method</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Payment Method]</td>\r\n																	</tr>\r\n																</tbody>\r\n															</table>\r\n															</td>\r\n														</tr>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n												<td width=\"15\">&nbsp;</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n								<!-- footer -->\r\n								<tr>\r\n									<td bgcolor=\"#FF6000\">\r\n									<table align=\"center\" bgcolor=\"#FF6000\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n										<tbody>\r\n											<tr height=\"100\">\r\n												<td width=\"15\">&nbsp;</td>\r\n												<td>\r\n												<table align=\"center\" bgcolor=\"#FF6000\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n													<tbody>\r\n														<tr>\r\n															<td align=\"left\">\r\n															<p style=\"margin: 0 0 10px 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; line-height: 22px; font-weight: bold; color: #ffffff;\">Thanking You</p>\r\n\r\n															<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 18px;  color: #ffffff;\">Chicago Andhra Association</p>\r\n															</td>\r\n															<td align=\"right\"><a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/NFVzy9wM/Twitter.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/FFnqCqJ4/Instagram.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/FRTq4CW0/Facebook.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/prySXQ44/Youtube.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a></td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n												<td width=\"15\">&nbsp;</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n						<!-- right space -->\r\n						<td width=\"15\">&nbsp;</td>\r\n					</tr>\r\n					<!-- site map -->\r\n					<tr>\r\n						<td height=\"30\">&nbsp;</td>\r\n						<td height=\"30\">&nbsp;</td>\r\n						<td height=\"30\">&nbsp;</td>\r\n					</tr>\r\n					<!-- site map -->\r\n					<tr>\r\n						<td width=\"15\">&nbsp;</td>\r\n						<td style=\"text-align: center;\">\r\n						<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center;\"><a href=\"mailto:info@chicagoandhra.org\" style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center; text-decoration: none; text-align: center;\">info@chicagoandhra.org</a> | <a href=\"tel:630-881-7859\" style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center; text-decoration: none;\">630-881-7859</a></p>\r\n\r\n						<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center;\">Copyright &copy;2022 Chicago Andhra Association. All rights reserved.</p>\r\n<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center;\"><a href=\"http://eepurl.com/gf65vn\">Sign up for our emails!</a></p>\r\n						</td>\r\n						<td width=\"15\">&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<!-- bottom space -->\r\n		<tr height=\"30\">\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 1, 0, '2022-12-27 16:58:31', '2023-01-16 11:06:07'),
(5, 'Event registration - Paid', 'Event registration details', 'auto', '<table align=\"center\" bgcolor=\"#F2F2F2\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\"><!-- top space -->\r\n	<tbody>\r\n		<tr height=\"15\">\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<!-- main -->\r\n		<tr>\r\n			<td>\r\n			<table align=\"center\" bgcolor=\"#F2F2F2\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n				<tbody>\r\n					<tr><!-- left space -->\r\n						<td width=\"15\">&nbsp;</td>\r\n						<td bgcolor=\"#ffffff\">\r\n						<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"><!-- header -->\r\n							<tbody>\r\n								<tr height=\"140\">\r\n									<td bgcolor=\"#FF6000\" width=\"15px\">&nbsp;</td>\r\n									<td align=\"center\" bgcolor=\"#FF6000\"><img height=\"88\" src=\"https://chicagoandhra.org/images/media/1zccc6wjn.png\" style=\"line-height: 1px; border: none;\" width=\"342\" /></td>\r\n									<td bgcolor=\"#FF6000\" width=\"15px\">&nbsp;</td>\r\n								</tr>\r\n								<!-- email body -->\r\n								<tr>\r\n									<td bgcolor=\"#ffffff\" width=\"15px\">&nbsp;</td>\r\n									<td>\r\n									<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n										<tbody>\r\n											<tr height=\"120\">\r\n												<td align=\"center\"><img height=\"92\" src=\"https://i.postimg.cc/zDbBcsPw/event-available.png\" style=\"line-height: 1px; border: none;\" width=\"82\" /></td>\r\n											</tr>\r\n											<tr>\r\n												<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 24px; line-height: 26px; font-weight: normal; color: #181818; text-align: center;\">Dear <span style=\"color:#2D6FD1\">[Full Name],</span></td>\r\n											</tr>\r\n											<tr height=\"20\">\r\n												<td>&nbsp;</td>\r\n											</tr>\r\n											<tr>\r\n												<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; line-height: 32px; font-weight: normal; color:#181818; text-align: center;\">Welcome to Chicago Andhra Association.<br />\r\n												Thank you for your Registration to:</td>\r\n											</tr>\r\n											<tr>\r\n												<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; line-height: 32px;  color: #2D6FD1; text-align: center; \">[EVENTNAME]</td>\r\n											</tr>\r\n											<tr height=\"40\">\r\n												<td>&nbsp;</td>\r\n											</tr>\r\n											<tr>\r\n												<td bgcolor=\"#F2F2F2\" height=\"1\" width=\"100%\">&nbsp;</td>\r\n											</tr>\r\n											<tr height=\"40\">\r\n												<td>&nbsp;</td>\r\n											</tr>\r\n											<tr>\r\n												<td>\r\n												<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n													<tbody>\r\n														<tr>\r\n															<td style=\"margin: 0; padding:0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; font-weight:normal; line-height: 167%px;  color: #000000; \">Event Details</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space -->\r\n														<tr height=\"15px\">\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space ebd -->\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: 400; line-height: 30px;  color: #000000; \" width=\"200\">Event Name</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[EventName]</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Date</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Date]</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Location</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Location]</td>\r\n														</tr>\r\n														<!-- space -->\r\n														<tr height=\"30px\">\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space ebd -->\r\n														<tr>\r\n															<td style=\"margin: 0; padding:0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; font-weight:normal; line-height: 167%px;  color: #000000; \">User Details</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space -->\r\n														<tr height=\"15px\">\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space ebd -->\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Registration ID</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Registration ID]</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">First Name</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[First Name]</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Last Name</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Last Name]</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Email</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Email]</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Mobile</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Mobile]</td>\r\n														</tr>\r\n														<!-- space -->\r\n														<tr height=\"30px\">\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space ebd -->\r\n														<tr>\r\n															<td style=\"margin: 0; padding:0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; font-weight:normal; line-height: 167%px;  color: #000000; \">Tickets Info</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space -->\r\n														<tr height=\"15px\">\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space ebd --><!-- space -->\r\n														<tr height=\"15px\">\r\n															<td colspan=\"3\">\r\n															<table 100=\"\" cellpadding=\" width=\" cellspacing=\"0\">\r\n																<tbody>\r\n																	<tr>\r\n																		<td>\r\n																		<table 100=\"\" cellpadding=\" width=\" cellspacing=\"0\">\r\n																			<tbody>\r\n																				<tr>\r\n																					<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \">Adults</td>\r\n																					<td align=\"center\" width=\"30\">:</td>\r\n																					<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Adults]</td>\r\n																				</tr>\r\n																				<tr>\r\n																					<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \">Children</td>\r\n																					<td align=\"center\" width=\"30\">:</td>\r\n																					<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Children]</td>\r\n																				</tr>\r\n																			</tbody>\r\n																		</table>\r\n																		</td>\r\n																		<td width=\"90\">&nbsp;</td>\r\n																		<td>\r\n																		<table 100=\"\" cellpadding=\" width=\" cellspacing=\"0\">\r\n																			<tbody>\r\n																				<tr>\r\n																					<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \">Guests</td>\r\n																					<td align=\"center\" width=\"30\">:</td>\r\n																					<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Guests]</td>\r\n																				</tr>\r\n																				<tr>\r\n																					<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \">Guest Children</td>\r\n																					<td align=\"center\" width=\"30\">:</td>\r\n																					<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[GuestChildren]</td>\r\n																				</tr>\r\n																			</tbody>\r\n																		</table>\r\n																		</td>\r\n																	</tr>\r\n																</tbody>\r\n															</table>\r\n															</td>\r\n														</tr>\r\n														<!-- space ebd --><!-- space -->\r\n														<tr height=\"30px\">\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space ebd -->\r\n														<tr>\r\n															<td style=\"margin: 0; padding:0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; font-weight:normal; line-height: 167%px;  color: #000000; \">Payment Details</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space -->\r\n														<tr height=\"15px\">\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space ebd -->\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Amount</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Amount]</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Payment Status</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Paid]</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Transaction Id</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Transaction ID]</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Payment Method</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Payment Method]</td>\r\n														</tr>\r\n														<!-- space -->\r\n														<tr height=\"30px\">\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space ebd -->\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n									<td bgcolor=\"#ffffff\" width=\"15px\">&nbsp;</td>\r\n								</tr>\r\n								<!-- footer -->\r\n								<tr height=\"100\">\r\n									<td bgcolor=\"#FF6000\" width=\"15px\">&nbsp;</td>\r\n									<td align=\"center\" bgcolor=\"#FF6000\">\r\n									<table align=\"center\" bgcolor=\"#FF6000\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n										<tbody>\r\n											<tr>\r\n												<td align=\"left\">\r\n												<p style=\"margin: 0 0 10px 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; line-height: 22px; font-weight: bold; color: #ffffff;\">Thanking You</p>\r\n\r\n												<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 18px;  color: #ffffff;\">Chicago Andhra Association</p>\r\n												</td>\r\n												<td align=\"right\"><a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/NFVzy9wM/Twitter.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/FFnqCqJ4/Instagram.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/FRTq4CW0/Facebook.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/prySXQ44/Youtube.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a></td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n									<td bgcolor=\"#FF6000\" width=\"15px\">&nbsp;</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n						<!-- right space -->\r\n						<td width=\"15\">&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<!-- site map -->\r\n		<tr>\r\n			<td style=\"text-align: center;\">\r\n			<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center;\"><a href=\"mailto:info@chicagoandhra.org\" style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center; text-decoration: none; text-align: center;\">info@chicagoandhra.org</a> | <a href=\"tel:630-881-7859\" style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center; text-decoration: none;\">630-881-7859</a></p>\r\n\r\n			<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center;\">Copyright &copy;2022 Chicago Andhra Association. All rights reserved.</p>\r\n<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center;\"><a href=\"http://eepurl.com/gf65vn\">Sign up for our emails!</a></p>\r\n			</td>\r\n		</tr>\r\n		<!-- Bottom space -->\r\n		<tr height=\"15\">\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 1, 0, '2022-12-27 17:18:39', '2023-01-16 11:06:51'),
(6, 'Event registration - Unpaid', 'Event registration details', 'auto', '<table align=\"center\" bgcolor=\"#F2F2F2\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\"><!-- top space -->\r\n	<tbody>\r\n		<tr height=\"15\">\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<!-- main -->\r\n		<tr>\r\n			<td>\r\n			<table align=\"center\" bgcolor=\"#F2F2F2\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n				<tbody>\r\n					<tr><!-- left space -->\r\n						<td width=\"15\">&nbsp;</td>\r\n						<td bgcolor=\"#ffffff\">\r\n						<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"><!-- header -->\r\n							<tbody>\r\n								<tr height=\"140\">\r\n									<td bgcolor=\"#FF6000\" width=\"15px\">&nbsp;</td>\r\n									<td align=\"center\" bgcolor=\"#FF6000\"><img height=\"88\" src=\"https://chicagoandhra.org/images/media/1zccc6wjn.png\" style=\"line-height: 1px; border: none;\" width=\"342\" /></td>\r\n									<td bgcolor=\"#FF6000\" width=\"15px\">&nbsp;</td>\r\n								</tr>\r\n								<!-- email body -->\r\n								<tr>\r\n									<td bgcolor=\"#ffffff\" width=\"15px\">&nbsp;</td>\r\n									<td>\r\n									<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n										<tbody>\r\n											<tr height=\"120\">\r\n												<td align=\"center\"><img height=\"92\" src=\"https://i.postimg.cc/zDbBcsPw/event-available.png\" style=\"line-height: 1px; border: none;\" width=\"82\" /></td>\r\n											</tr>\r\n											<tr>\r\n												<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 24px; line-height: 26px; font-weight: normal; color: #181818; text-align: center;\">Dear <span style=\"color:#2D6FD1\">[Full Name],</span></td>\r\n											</tr>\r\n											<tr height=\"30\">\r\n												<td>&nbsp;</td>\r\n											</tr>\r\n											<tr>\r\n												<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; line-height: 32px; font-weight: normal; color:#181818; text-align: center;\">Welcome to Chicago Andhra Association.<br />\r\n												Thank you for your Registration to:</td>\r\n											</tr>\r\n											<tr>\r\n												<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; line-height: 32px;  color: #2D6FD1; text-align: center; \">[EVENTNAME]</td>\r\n											</tr>\r\n											<tr height=\"40\">\r\n												<td>&nbsp;</td>\r\n											</tr>\r\n											<tr>\r\n												<td bgcolor=\"#F2F2F2\" height=\"1\" width=\"100%\">&nbsp;</td>\r\n											</tr>\r\n											<tr height=\"40\">\r\n												<td>&nbsp;</td>\r\n											</tr>\r\n											<tr>\r\n												<td>\r\n												<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n													<tbody>\r\n														<tr>\r\n															<td style=\"margin: 0; padding:0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; font-weight:normal; line-height: 167%px;  color: #000000; \">Event Details</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space -->\r\n														<tr height=\"15px\">\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space ebd -->\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: 400; line-height: 30px;  color: #000000; \" width=\"200\">Event Name</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[EventName]</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Date</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Date]</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Location</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Location]</td>\r\n														</tr>\r\n														<!-- space -->\r\n														<tr height=\"30px\">\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space ebd -->\r\n														<tr>\r\n															<td style=\"margin: 0; padding:0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; font-weight:normal; line-height: 167%px;  color: #000000; \">User Details</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space -->\r\n														<tr height=\"15px\">\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space ebd -->\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Registration ID</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Registration ID]</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">First Name</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[First Name]</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Last Name</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Last Name]</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Email</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Email]</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Mobile</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Mobile]</td>\r\n														</tr>\r\n														<!-- space -->\r\n														<tr height=\"30px\">\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space ebd -->\r\n														<tr>\r\n															<td style=\"margin: 0; padding:0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; font-weight:normal; line-height: 167%px;  color: #000000; \">Tickets Info</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space -->\r\n														<tr height=\"15px\">\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space ebd --><!-- space -->\r\n														<tr height=\"15px\">\r\n															<td colspan=\"3\">\r\n															<table 100=\"\" cellpadding=\" width=\" cellspacing=\"0\">\r\n																<tbody>\r\n																	<tr>\r\n																		<td>\r\n																		<table 100=\"\" cellpadding=\" width=\" cellspacing=\"0\">\r\n																			<tbody>\r\n																				<tr>\r\n																					<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \">Adults</td>\r\n																					<td align=\"center\" width=\"30\">:</td>\r\n																					<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Adults]</td>\r\n																				</tr>\r\n																				<tr>\r\n																					<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \">Children</td>\r\n																					<td align=\"center\" width=\"30\">:</td>\r\n																					<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Children]</td>\r\n																				</tr>\r\n																			</tbody>\r\n																		</table>\r\n																		</td>\r\n																		<td width=\"90\">&nbsp;</td>\r\n																		<td>\r\n																		<table 100=\"\" cellpadding=\" width=\" cellspacing=\"0\">\r\n																			<tbody>\r\n																				<tr>\r\n																					<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \">Guests</td>\r\n																					<td align=\"center\" width=\"30\">:</td>\r\n																					<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Guests]</td>\r\n																				</tr>\r\n																				<tr>\r\n																					<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \">Guest Children</td>\r\n																					<td align=\"center\" width=\"30\">:</td>\r\n																					<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[GuestChildren]</td>\r\n																				</tr>\r\n																			</tbody>\r\n																		</table>\r\n																		</td>\r\n																	</tr>\r\n																</tbody>\r\n															</table>\r\n															</td>\r\n														</tr>\r\n														<tr height=\"40px\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space ebd --><!-- space --><!-- space ebd -->\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n									<td bgcolor=\"#ffffff\" width=\"15px\">&nbsp;</td>\r\n								</tr>\r\n								<!-- footer -->\r\n								<tr height=\"100\">\r\n									<td bgcolor=\"#FF6000\" width=\"15px\">&nbsp;</td>\r\n									<td align=\"center\" bgcolor=\"#FF6000\">\r\n									<table align=\"center\" bgcolor=\"#FF6000\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n										<tbody>\r\n											<tr>\r\n												<td align=\"left\">\r\n												<p style=\"margin: 0 0 10px 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; line-height: 22px; font-weight: bold; color: #ffffff;\">Thanking You</p>\r\n\r\n												<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 18px;  color: #ffffff;\">Chicago Andhra Association</p>\r\n												</td>\r\n												<td align=\"right\"><a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/NFVzy9wM/Twitter.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/FFnqCqJ4/Instagram.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/FRTq4CW0/Facebook.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/prySXQ44/Youtube.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a></td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n									<td bgcolor=\"#FF6000\" width=\"15px\">&nbsp;</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n						<!-- right space -->\r\n						<td width=\"15\">&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<!-- site map -->\r\n		<tr>\r\n			<td style=\"text-align: center;\">\r\n			<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center;\"><a href=\"mailto:info@chicagoandhra.org\" style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center; text-decoration: none; text-align: center;\">info@chicagoandhra.org</a> | <a href=\"tel:630-881-7859\" style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center; text-decoration: none;\">630-881-7859</a></p>\r\n\r\n			<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center;\">Copyright &copy;2022 Chicago Andhra Association. All rights reserved.</p>\r\n<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center;\"><a href=\"http://eepurl.com/gf65vn\">Sign up for our emails!</a></p>\r\n			</td>\r\n		</tr>\r\n		<!-- Bottom space -->\r\n		<tr height=\"15\">\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 1, 0, '2022-12-27 17:19:13', '2023-01-16 11:07:20');
INSERT INTO `mail_templates` (`id`, `heading`, `subject`, `mail_type`, `description`, `publish`, `position`, `created_at`, `updated_at`) VALUES
(7, 'Forgot Password', 'Password Retrieval to Login in Chicago Andhra Association', 'auto', '<table align=\"center\" bgcolor=\"#F2F2F2\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\"><!-- top space -->\r\n	<tbody>\r\n		<tr height=\"15\">\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<!-- main -->\r\n		<tr>\r\n			<td>\r\n			<table align=\"center\" bgcolor=\"#F2F2F2\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n				<tbody>\r\n					<tr><!-- left space -->\r\n						<td width=\"15\">&nbsp;</td>\r\n						<!--  content -->\r\n						<td>\r\n						<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"><!-- header -->\r\n							<tbody>\r\n								<tr height=\"140\">\r\n									<td align=\"center\" bgcolor=\"#FF6000\"><img height=\"88\" src=\"https://chicagoandhra.org/images/media/1zccc6wjn.png\" style=\"line-height: 1px; border: none\" width=\"342\" /></td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n									<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"text-align: center\" width=\"100%\">\r\n										<tbody>\r\n											<tr>\r\n												<td width=\"15\">&nbsp;</td>\r\n												<td align=\"center\">\r\n												<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n													<tbody>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr height=\"120\">\r\n															<td align=\"center\"><img height=\"92\" src=\"https://i.postimg.cc/MTTH0DTd/lock.png\" style=\"line-height: 1px; border: none\" width=\"82\" /></td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"\r\n                                margin: 0;\r\n                                padding: 0;\r\n                                font-family: Arial, Helvetica, sans-serif;\r\n                                font-size: 24px;\r\n                                line-height: 26px;\r\n                                font-weight: normal;\r\n                                color: #000000;\r\n                                text-align: center;\r\n                              \">Dear <span style=\"color: #2d6fd1\">[Full Name],</span></td>\r\n														</tr>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"\r\n                                margin: 0;\r\n                                padding: 0;\r\n                                font-family: Arial, Helvetica, sans-serif;\r\n                                font-size: 20px;\r\n                                line-height: 32px;\r\n                                font-weight: normal;\r\n                                color: #000000;\r\n                                text-align: center;\r\n                              \">Seems like you forgot your password, click below<br />\r\n															to reset your password</td>\r\n														</tr>\r\n														<tr height=\"10\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr height=\"120\">\r\n															<td align=\"center\"><a href=\"[RESETURL]\" target=\"_blank\"><img height=\"40px\" src=\"https://i.postimg.cc/Wb368hX4/Reset-Password-button.png\" style=\"line-height: 1px; border: none\" width=\"174px\" /></a></td>\r\n														</tr>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n												<td width=\"15\">&nbsp;</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n								<!-- footer -->\r\n								<tr>\r\n									<td bgcolor=\"#FF6000\">\r\n									<table align=\"center\" bgcolor=\"#FF6000\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n										<tbody>\r\n											<tr height=\"100\">\r\n												<td width=\"15\">&nbsp;</td>\r\n												<td>\r\n												<table align=\"center\" bgcolor=\"#FF6000\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n													<tbody>\r\n														<tr>\r\n															<td align=\"left\">\r\n															<p style=\"\r\n                                  margin: 0 0 10px 0;\r\n                                  padding: 0;\r\n                                  font-family: Arial, Helvetica, sans-serif;\r\n                                  font-size: 20px;\r\n                                  line-height: 22px;\r\n                                  font-weight: bold;\r\n                                  color: #ffffff;\r\n                                \">Thanking You</p>\r\n\r\n															<p style=\"\r\n                                  margin: 0;\r\n                                  padding: 0;\r\n                                  font-family: Arial, Helvetica, sans-serif;\r\n                                  font-size: 16px;\r\n                                  line-height: 18px;\r\n                                  color: #ffffff;\r\n                                \">Chicago Andhra Association</p>\r\n															</td>\r\n															<td align=\"right\"><a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/NFVzy9wM/Twitter.png\" style=\"line-height: 1px; border: none\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/FFnqCqJ4/Instagram.png\" style=\"line-height: 1px; border: none\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/FRTq4CW0/Facebook.png\" style=\"line-height: 1px; border: none\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/prySXQ44/Youtube.png\" style=\"line-height: 1px; border: none\" width=\"35\" /></a></td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n												<td width=\"15\">&nbsp;</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n						<!-- right space -->\r\n						<td width=\"15\">&nbsp;</td>\r\n					</tr>\r\n					<!-- site map -->\r\n					<tr>\r\n						<td height=\"30\">&nbsp;</td>\r\n						<td height=\"30\">&nbsp;</td>\r\n						<td height=\"30\">&nbsp;</td>\r\n					</tr>\r\n					<!-- site map -->\r\n					<tr>\r\n						<td width=\"15\">&nbsp;</td>\r\n						<td style=\"text-align: center\">\r\n						<p style=\"\r\n                margin: 0;\r\n                padding: 0;\r\n                font-family: Arial, Helvetica, sans-serif;\r\n                font-size: 11px;\r\n                line-height: 22px;\r\n                color: #958e8e;\r\n                text-align: center;\r\n              \"><a href=\"mailto:info@chicagoandhra.org\" style=\"\r\n                  margin: 0;\r\n                  padding: 0;\r\n                  font-family: Arial, Helvetica, sans-serif;\r\n                  font-size: 11px;\r\n                  line-height: 22px;\r\n                  color: #958e8e;\r\n                  text-align: center;\r\n                  text-decoration: none;\r\n                  text-align: center;\r\n                \">info@chicagoandhra.org</a> | <a href=\"tel:630-881-7859\" style=\"\r\n                  margin: 0;\r\n                  padding: 0;\r\n                  font-family: Arial, Helvetica, sans-serif;\r\n                  font-size: 11px;\r\n                  line-height: 22px;\r\n                  color: #958e8e;\r\n                  text-align: center;\r\n                  text-decoration: none;\r\n                \">630-881-7859</a></p>\r\n\r\n						<p style=\"\r\n                margin: 0;\r\n                padding: 0;\r\n                font-family: Arial, Helvetica, sans-serif;\r\n                font-size: 11px;\r\n                line-height: 22px;\r\n                color: #958e8e;\r\n                text-align: center;\r\n              \">Copyright &copy;2022 Chicago Andhra Association. All rights reserved.</p>\r\n<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center;\"><a href=\"http://eepurl.com/gf65vn\">Sign up for our emails!</a></p>\r\n						</td>\r\n						<td width=\"15\">&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<!-- bottom space -->\r\n		<tr height=\"30\">\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 1, 0, '2022-12-27 17:19:51', '2023-01-16 11:07:52'),
(8, 'Membership Ends Reminder', 'Chicago Andhra Association [MEMBERID] - Membership Ends [DAYS]', 'auto', '<table align=\"center\" bgcolor=\"#F2F2F2\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\"><!-- top space -->\r\n	<tbody>\r\n		<tr height=\"15\">\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<!-- main -->\r\n		<tr>\r\n			<td>\r\n			<table align=\"center\" bgcolor=\"#F2F2F2\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n				<tbody>\r\n					<tr><!-- left space -->\r\n						<td width=\"15\">&nbsp;</td>\r\n						<!--  content -->\r\n						<td>\r\n						<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"><!-- header -->\r\n							<tbody>\r\n								<tr height=\"140\">\r\n									<td align=\"center\" bgcolor=\"#FF6000\"><img height=\"88\" src=\"https://chicagoandhra.org/images/media/1zccc6wjn.png\" style=\"line-height: 1px; border: none;\" width=\"342\" /></td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n									<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"text-align: center;\" width=\"100%\">\r\n										<tbody>\r\n											<tr>\r\n												<td width=\"15\">&nbsp;</td>\r\n												<td align=\"center\">\r\n												<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n													<tbody>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr height=\"120\">\r\n															<td align=\"center\"><img height=\"90\" src=\"https://i.postimg.cc/sfktd4W8/hourglass-bottom.png\" style=\"line-height: 1px; border: none;\" width=\"80\" /></td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 24px; line-height: 26px; font-weight: normal; color: #000000; text-align: center;\">Dear <span style=\"color:#2D6FD1\">[Full Name],</span></td>\r\n														</tr>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; line-height: 32px; font-weight: normal; color: #000000; text-align: center;\">Your membership is ending soon...</td>\r\n														</tr>\r\n														<tr height=\"30\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr>\r\n															<td>\r\n															<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"321px\">\r\n																<tbody>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px; align: center; color: #000000; \" width=\"200\">Your Membership ID</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[MEMBERID]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Your Membership Type</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[MTYPE]</td>\r\n																	</tr>\r\n																</tbody>\r\n															</table>\r\n															</td>\r\n														</tr>\r\n														<tr height=\"40\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 22px; color: #958E8E; text-align: center;\">\r\n															<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 22px; color: #000000;text-align: center;\">If you already renewed, ignore this or if you have any questions contact or mail us.</p>\r\n															</td>\r\n														</tr>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n												<td width=\"15\">&nbsp;</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n								<!-- footer -->\r\n								<tr>\r\n									<td bgcolor=\"#FF6000\">\r\n									<table align=\"center\" bgcolor=\"#FF6000\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n										<tbody>\r\n											<tr height=\"100\">\r\n												<td width=\"15\">&nbsp;</td>\r\n												<td>\r\n												<table align=\"center\" bgcolor=\"#FF6000\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n													<tbody>\r\n														<tr>\r\n															<td align=\"left\">\r\n															<p style=\"margin: 0 0 10px 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; line-height: 22px; font-weight: bold; color: #ffffff;\">Thanking You</p>\r\n\r\n															<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 18px;  color: #ffffff;\">Chicago Andhra Association</p>\r\n															</td>\r\n															<td align=\"right\"><a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/NFVzy9wM/Twitter.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/FFnqCqJ4/Instagram.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/FRTq4CW0/Facebook.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/prySXQ44/Youtube.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a></td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n												<td width=\"15\">&nbsp;</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n						<!-- right space -->\r\n						<td width=\"15\">&nbsp;</td>\r\n					</tr>\r\n					<!-- site map -->\r\n					<tr>\r\n						<td height=\"30\">&nbsp;</td>\r\n						<td height=\"30\">&nbsp;</td>\r\n						<td height=\"30\">&nbsp;</td>\r\n					</tr>\r\n					<!-- site map -->\r\n					<tr>\r\n						<td width=\"15\">&nbsp;</td>\r\n						<td style=\"text-align: center;\">\r\n						<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center;\"><a href=\"mailto:info@chicagoandhra.org\" style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center; text-decoration: none; text-align: center;\">info@chicagoandhra.org</a> | <a href=\"tel:630-881-7859\" style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center; text-decoration: none;\">630-881-7859</a></p>\r\n\r\n						<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center;\">Copyright &copy;2022 Chicago Andhra Association. All rights reserved.</p>\r\n<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center;\"><a href=\"http://eepurl.com/gf65vn\">Sign up for our emails!</a></p>\r\n						</td>\r\n						<td width=\"15\">&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<!-- bottom space -->\r\n		<tr height=\"30\">\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 1, 0, '2022-12-27 17:23:20', '2023-01-16 11:08:20'),
(9, 'Invitation To Renewal Member', 'Chicago Andhra Association[MEMBERID] - Become Member', 'auto', '<table align=\"center\" bgcolor=\"#F2F2F2\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\"><!-- top space -->\r\n	<tbody>\r\n		<tr height=\"15\">\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<!-- main -->\r\n		<tr>\r\n			<td>\r\n			<table align=\"center\" bgcolor=\"#F2F2F2\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" height=\"600\" width=\"100%\">\r\n				<tbody>\r\n					<tr><!-- left space -->\r\n						<td width=\"15\">&nbsp;</td>\r\n						<!--  content -->\r\n						<td>\r\n						<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"><!-- header -->\r\n							<tbody>\r\n								<tr height=\"140\">\r\n									<td align=\"center\" bgcolor=\"#FF6000\"><img height=\"88\" src=\"https://chicagoandhra.org/images/media/1zccc6wjn.png\" style=\"line-height: 1px; border: none\" width=\"342\" /></td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n									<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"text-align: center\" width=\"100%\">\r\n										<tbody>\r\n											<tr>\r\n												<td width=\"15\">&nbsp;</td>\r\n												<td align=\"center\">\r\n												<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n													<tbody>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr height=\"120\">\r\n															<td align=\"center\"><img height=\"91.37px\" src=\"https://i.postimg.cc/pTD7xkSk/check-circle.png\" style=\"line-height: 1px; border: none\" width=\"91.3px\" /></td>\r\n														</tr>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"\r\n                                margin: 0;\r\n                                padding: 0;\r\n                                font-family: Arial, Helvetica, sans-serif;\r\n                                font-size: 24px;\r\n                                line-height: 26px;\r\n                                font-weight: normal;\r\n                                color: #000000;\r\n                                text-align: center;\r\n                              \">Dear <span style=\"color: #2d6fd1\">[Full Name],</span></td>\r\n														</tr>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"\r\n                                margin: 0;\r\n                                padding: 0;\r\n                                font-family: Arial, Helvetica, sans-serif;\r\n                                font-size: 20px;\r\n                                line-height: 32px;\r\n                                font-weight: normal;\r\n                                color: #000000;\r\n                                text-align: center;\r\n                              \">Thank you for renewing your membership.</td>\r\n														</tr>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"\r\n                                margin: 0;\r\n                                padding: 0;\r\n                                font-family: Arial, Helvetica, sans-serif;\r\n                                font-size: 20px;\r\n                                line-height: 32px;\r\n                                font-weight: normal;\r\n                                color: #000000;\r\n                                text-align: center;\r\n                              \">Please find your membership details below:</td>\r\n														</tr>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr>\r\n															<td>\r\n															<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"321px\">\r\n																<tbody>\r\n																	<tr height=\"20\">\r\n																		<td colspan=\"3\">&nbsp;</td>\r\n																	</tr>\r\n																</tbody>\r\n															</table>\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td>\r\n															<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"90%\">\r\n																<tbody>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 31px;  color: #000000; \" width=\"200\">First Name</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[First Name]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Last Name</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[LastName]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Member ID</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[MemberID]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Member Type</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Member Type]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Payment Date</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Payment Date]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Transaction ID</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Transaction ID]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Amount</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Amount]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Payment Status</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Payment Status]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Payment Method</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Payment Method]</td>\r\n																	</tr>\r\n																</tbody>\r\n															</table>\r\n															</td>\r\n														</tr>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n												<td width=\"15\">&nbsp;</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n								<!-- footer -->\r\n								<tr>\r\n									<td bgcolor=\"#FF6000\">\r\n									<table align=\"center\" bgcolor=\"#FF6000\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n										<tbody>\r\n											<tr height=\"100\">\r\n												<td width=\"15\">&nbsp;</td>\r\n												<td>\r\n												<table align=\"center\" bgcolor=\"#FF6000\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n													<tbody>\r\n														<tr>\r\n															<td align=\"left\">\r\n															<p style=\"\r\n                                  margin: 0 0 10px 0;\r\n                                  padding: 0;\r\n                                  font-family: Arial, Helvetica, sans-serif;\r\n                                  font-size: 20px;\r\n                                  line-height: 22px;\r\n                                  font-weight: bold;\r\n                                  color: #ffffff;\r\n                                \">Thanking You</p>\r\n\r\n															<p style=\"\r\n                                  margin: 0;\r\n                                  padding: 0;\r\n                                  font-family: Arial, Helvetica, sans-serif;\r\n                                  font-size: 16px;\r\n                                  line-height: 18px;\r\n                                  color: #ffffff;\r\n                                \">Chicago Andhra Association</p>\r\n															</td>\r\n															<td align=\"right\"><a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/NFVzy9wM/Twitter.png\" style=\"line-height: 1px; border: none\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/FFnqCqJ4/Instagram.png\" style=\"line-height: 1px; border: none\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/FRTq4CW0/Facebook.png\" style=\"line-height: 1px; border: none\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/prySXQ44/Youtube.png\" style=\"line-height: 1px; border: none\" width=\"35\" /></a></td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n												<td width=\"15\">&nbsp;</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n						<!-- right space -->\r\n						<td width=\"15\">&nbsp;</td>\r\n					</tr>\r\n					<!-- site map -->\r\n					<tr>\r\n						<td height=\"30\">&nbsp;</td>\r\n						<td height=\"30\">&nbsp;</td>\r\n						<td height=\"30\">&nbsp;</td>\r\n					</tr>\r\n					<!-- site map -->\r\n					<tr>\r\n						<td width=\"15\">&nbsp;</td>\r\n						<td style=\"text-align: center\">\r\n						<p style=\"\r\n                margin: 0;\r\n                padding: 0;\r\n                font-family: Arial, Helvetica, sans-serif;\r\n                font-size: 11px;\r\n                line-height: 22px;\r\n                color: #958e8e;\r\n                text-align: center;\r\n              \"><a href=\"mailto:info@chicagoandhra.org\" style=\"\r\n                  margin: 0;\r\n                  padding: 0;\r\n                  font-family: Arial, Helvetica, sans-serif;\r\n                  font-size: 11px;\r\n                  line-height: 22px;\r\n                  color: #958e8e;\r\n                  text-align: center;\r\n                  text-decoration: none;\r\n                  text-align: center;\r\n                \">info@chicagoandhra.org</a> | <a href=\"tel:630-881-7859\" style=\"\r\n                  margin: 0;\r\n                  padding: 0;\r\n                  font-family: Arial, Helvetica, sans-serif;\r\n                  font-size: 11px;\r\n                  line-height: 22px;\r\n                  color: #958e8e;\r\n                  text-align: center;\r\n                  text-decoration: none;\r\n                \">630-881-7859</a></p>\r\n\r\n						<p style=\"\r\n                margin: 0;\r\n                padding: 0;\r\n                font-family: Arial, Helvetica, sans-serif;\r\n                font-size: 11px;\r\n                line-height: 22px;\r\n                color: #958e8e;\r\n                text-align: center;\r\n              \">Copyright &copy;2022 Chicago Andhra Association. All rights reserved.</p>\r\n<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center;\"><a href=\"http://eepurl.com/gf65vn\">Sign up for our emails!</a></p>\r\n						</td>\r\n						<td width=\"15\">&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<!-- bottom space -->\r\n		<tr height=\"30\">\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 1, 0, '2022-12-27 17:24:16', '2023-01-16 11:09:15'),
(10, 'Member Registration for admin', 'We have a new Member Registration', 'manual', '<table align=\"center\" bgcolor=\"#F2F2F2\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\"><!-- top space -->\r\n	<tbody>\r\n		<tr height=\"15\">\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<!-- main -->\r\n		<tr>\r\n			<td>\r\n			<table align=\"center\" bgcolor=\"#F2F2F2\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n				<tbody>\r\n					<tr><!-- left space -->\r\n						<td width=\"15\">&nbsp;</td>\r\n						<!--  content -->\r\n						<td>\r\n						<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"><!-- header -->\r\n							<tbody>\r\n								<tr height=\"140\">\r\n									<td align=\"center\" bgcolor=\"#FF6000\"><img height=\"88\" src=\"https://chicagoandhra.org/images/media/1zccc6wjn.png\" style=\"line-height: 1px; border: none;\" width=\"342\" /></td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n									<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"text-align: center;\" width=\"100%\">\r\n										<tbody>\r\n											<tr>\r\n												<td width=\"15\">&nbsp;</td>\r\n												<td align=\"center\">\r\n												<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n													<tbody>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr height=\"120\">\r\n															<td align=\"center\"><img height=\"67\" src=\"https://i.postimg.cc/fRDYgC7D/person-add.png\" style=\"line-height: 1px; border: none;\" width=\"102\" /></td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 24px; line-height: 26px; font-weight: normal; color: #000000; text-align: center;\">Dear Admin,</td>\r\n														</tr>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; line-height: 32px; font-weight: normal; color: #000000; text-align: center;\">You have a new member registration.<br />\r\n															Please find the member details below.</td>\r\n														</tr>\r\n														<tr height=\"30\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr>\r\n															<td>\r\n															<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"70%\">\r\n																<tbody>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #181818; \" width=\"200\">Member ID</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[MemberID]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #181818; \" width=\"200\">Membership Type</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Membership Type]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #181818; \" width=\"200\">First Name</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[First Name]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #181818; \" width=\"200\">Last Name</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Last Name]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color:#181818; \" width=\"200\">Email</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Email]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color:#181818; \" width=\"200\">Mobile</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Mobile]</td>\r\n																	</tr>\r\n																</tbody>\r\n															</table>\r\n															</td>\r\n														</tr>\r\n														<tr height=\"40\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n												<td width=\"15\">&nbsp;</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n								<!-- footer -->\r\n								<tr>\r\n									<td bgcolor=\"#FF6000\">\r\n									<table align=\"center\" bgcolor=\"#FF6000\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n										<tbody>\r\n											<tr height=\"100\">\r\n												<td width=\"15\">&nbsp;</td>\r\n												<td>\r\n												<table align=\"center\" bgcolor=\"#FF6000\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n													<tbody>\r\n														<tr>\r\n															<td align=\"left\">\r\n															<p style=\"margin: 0 0 10px 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; line-height: 22px; font-weight: bold; color: #ffffff;\">Thanking You</p>\r\n\r\n															<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 18px;  color: #ffffff;\">Chicago Andhra Association</p>\r\n															</td>\r\n															<td align=\"right\"><a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/NFVzy9wM/Twitter.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/FFnqCqJ4/Instagram.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/FRTq4CW0/Facebook.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/prySXQ44/Youtube.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a></td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n												<td width=\"15\">&nbsp;</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n						<!-- right space -->\r\n						<td width=\"15\">&nbsp;</td>\r\n					</tr>\r\n					<!-- site map -->\r\n					<tr>\r\n						<td height=\"30\">&nbsp;</td>\r\n						<td height=\"30\">&nbsp;</td>\r\n						<td height=\"30\">&nbsp;</td>\r\n					</tr>\r\n					<!-- site map -->\r\n					<tr>\r\n						<td width=\"15\">&nbsp;</td>\r\n						<td style=\"text-align: center;\">\r\n						<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center;\"><a href=\"mailto:info@chicagoandhra.org\" style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center; text-decoration: none; text-align: center;\">info@chicagoandhra.org</a> | <a href=\"tel:630-881-7859\" style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center; text-decoration: none;\">630-881-7859</a></p>\r\n\r\n						<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center;\">Copyright &copy;2022 Chicago Andhra Association. All rights reserved.</p>\r\n						</td>\r\n						<td width=\"15\">&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<!-- bottom space -->\r\n		<tr height=\"30\">\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 1, 0, '2022-12-27 17:44:34', '2023-01-10 06:44:12');
INSERT INTO `mail_templates` (`id`, `heading`, `subject`, `mail_type`, `description`, `publish`, `position`, `created_at`, `updated_at`) VALUES
(11, 'New Donatioin - Admin', 'New Donation from Chicago Andhra Association', 'manual', '<table align=\"center\" bgcolor=\"#F2F2F2\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\"><!-- top space -->\r\n	<tbody>\r\n		<tr height=\"15\">\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<!-- main -->\r\n		<tr>\r\n			<td>\r\n			<table align=\"center\" bgcolor=\"#F2F2F2\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n				<tbody>\r\n					<tr><!-- left space -->\r\n						<td width=\"15\">&nbsp;</td>\r\n						<!--  content -->\r\n						<td>\r\n						<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"><!-- header -->\r\n							<tbody>\r\n								<tr height=\"140\">\r\n									<td align=\"center\" bgcolor=\"#FF6000\"><img height=\"88\" src=\"https://chicagoandhra.org/images/media/1zccc6wjn.png\" style=\"line-height: 1px; border: none;\" width=\"342\" /></td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n									<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"text-align: center;\" width=\"100%\">\r\n										<tbody>\r\n											<tr>\r\n												<td width=\"15\">&nbsp;</td>\r\n												<td align=\"center\">\r\n												<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n													<tbody>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr height=\"120\">\r\n															<td align=\"center\"><img height=\"93\" src=\"https://i.postimg.cc/Mp8B45Sd/volunteer-activism-1.png\" style=\"line-height: 1px; border: none;\" width=\"95\" /></td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 24px; line-height: 26px; font-weight: normal; color: #000000; text-align: center;\">Dear Admin,</td>\r\n														</tr>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; line-height: 32px; font-weight: normal; color: #000000; text-align: center;\">You have a new Donation.<br />\r\n															Please find the Donor details below.</td>\r\n														</tr>\r\n														<tr height=\"30\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr>\r\n															<td>\r\n															<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"70%\">\r\n																<tbody>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #181818; \" width=\"200\">First Name</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[First Name]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #181818; \" width=\"200\">Last Name</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Last Name]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #181818; \" width=\"200\">Donation Program</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Donation Program]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #181818; \" width=\"200\">Payment Date</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Payment Date]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color:#181818; \" width=\"200\">Transaction ID</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Transaction ID]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color:#181818; \" width=\"200\">Amount</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Amount]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color:#181818; \" width=\"200\">Payment Status</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Payment Status]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #181818; \" width=\"200\">Payment Method</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Payment Method]</td>\r\n																	</tr>\r\n																</tbody>\r\n															</table>\r\n															</td>\r\n														</tr>\r\n														<tr height=\"40\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n												<td width=\"15\">&nbsp;</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n								<!-- footer -->\r\n								<tr>\r\n									<td bgcolor=\"#FF6000\">\r\n									<table align=\"center\" bgcolor=\"#FF6000\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n										<tbody>\r\n											<tr height=\"100\">\r\n												<td width=\"15\">&nbsp;</td>\r\n												<td>\r\n												<table align=\"center\" bgcolor=\"#FF6000\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n													<tbody>\r\n														<tr>\r\n															<td align=\"left\">\r\n															<p style=\"margin: 0 0 10px 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; line-height: 22px; font-weight: bold; color: #ffffff;\">Thanking You</p>\r\n\r\n															<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 18px;  color: #ffffff;\">Chicago Andhra Association</p>\r\n															</td>\r\n															<td align=\"right\"><a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/NFVzy9wM/Twitter.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/FFnqCqJ4/Instagram.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/FRTq4CW0/Facebook.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/prySXQ44/Youtube.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a></td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n												<td width=\"15\">&nbsp;</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n						<!-- right space -->\r\n						<td width=\"15\">&nbsp;</td>\r\n					</tr>\r\n					<!-- site map -->\r\n					<tr>\r\n						<td height=\"30\">&nbsp;</td>\r\n						<td height=\"30\">&nbsp;</td>\r\n						<td height=\"30\">&nbsp;</td>\r\n					</tr>\r\n					<!-- site map -->\r\n					<tr>\r\n						<td width=\"15\">&nbsp;</td>\r\n						<td style=\"text-align: center;\">\r\n						<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center;\"><a href=\"mailto:info@chicagoandhra.org\" style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center; text-decoration: none; text-align: center;\">info@chicagoandhra.org</a> | <a href=\"tel:630-881-7859\" style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center; text-decoration: none;\">630-881-7859</a></p>\r\n\r\n						<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center;\">Copyright &copy;2022 Chicago Andhra Association. All rights reserved.</p>\r\n						</td>\r\n						<td width=\"15\">&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<!-- bottom space -->\r\n		<tr height=\"30\">\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 1, 0, '2022-12-27 17:45:39', '2023-01-10 06:44:43'),
(12, 'New enquiry from user to admin', 'User Enquiry from Chicago Andhra Association', 'manual', '<table align=\"center\" bgcolor=\"#F2F2F2\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\"><!-- top space -->\r\n	<tbody>\r\n		<tr height=\"15\">\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<!-- main -->\r\n		<tr>\r\n			<td>\r\n			<table align=\"center\" bgcolor=\"#F2F2F2\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n				<tbody>\r\n					<tr><!-- left space -->\r\n						<td width=\"15\">&nbsp;</td>\r\n						<!--  content -->\r\n						<td>\r\n						<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"><!-- header -->\r\n							<tbody>\r\n								<tr height=\"140\">\r\n									<td align=\"center\" bgcolor=\"#FF6000\"><img height=\"88\" src=\"https://chicagoandhra.org/images/media/1zccc6wjn.png\" style=\"line-height: 1px; border: none;\" width=\"342\" /></td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n									<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"text-align: center;\" width=\"100%\">\r\n										<tbody>\r\n											<tr>\r\n												<td width=\"15\">&nbsp;</td>\r\n												<td align=\"center\">\r\n												<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n													<tbody>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr height=\"120\">\r\n															<td align=\"center\"><img height=\"93\" src=\"https://i.postimg.cc/sgqXB9j5/live-help.png\" style=\"line-height: 1px; border: none;\" width=\"95\" /></td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 24px; line-height: 26px; font-weight: normal; color: #000000; text-align: center;\">Dear <span style=\"color:#2D6FD1\">[Full Name],</span></td>\r\n														</tr>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; line-height: 32px; font-weight: normal; color: #000000; text-align: center;\">Welcome to Chicago Andhra Association.</td>\r\n														</tr>\r\n														<tr height=\"30\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr>\r\n															<td>\r\n															<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n																<tbody>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">QUERY</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[QUERY]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Reply</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Reply]</td>\r\n																	</tr>\r\n																</tbody>\r\n															</table>\r\n															</td>\r\n														</tr>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr>\r\n															<td bgcolor=\"#cccccc\" height=\"1\" width=\"100%\">&nbsp;</td>\r\n														</tr>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr>\r\n															<td colspan=\"3\" style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 22px; color: #958E8E; text-align: center;\">Your account has been Renewed and your transaction details posted to Chicago Andhra Association Authorized Administrator.</td>\r\n														</tr>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 22px; color: #958E8E; text-align: center;\">\r\n															<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 22px; color: #958E8E; text-align: center;\">If you have any issues or have any questions or comments,</p>\r\n\r\n															<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 22px; color: #958E8E; text-align: center;\">please feel free to contact or email us.</p>\r\n															</td>\r\n														</tr>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n												<td width=\"15\">&nbsp;</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n								<!-- footer -->\r\n								<tr>\r\n									<td bgcolor=\"#FF6000\">\r\n									<table align=\"center\" bgcolor=\"#FF6000\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n										<tbody>\r\n											<tr height=\"100\">\r\n												<td width=\"15\">&nbsp;</td>\r\n												<td>\r\n												<table align=\"center\" bgcolor=\"#FF6000\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n													<tbody>\r\n														<tr>\r\n															<td align=\"left\">\r\n															<p style=\"margin: 0 0 10px 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; line-height: 22px; font-weight: bold; color: #ffffff;\">Thanking You</p>\r\n\r\n															<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 18px;  color: #ffffff;\">Chicago Andhra Association</p>\r\n															</td>\r\n															<td align=\"right\"><a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/NFVzy9wM/Twitter.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/FFnqCqJ4/Instagram.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/FRTq4CW0/Facebook.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/prySXQ44/Youtube.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a></td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n												<td width=\"15\">&nbsp;</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n						<!-- right space -->\r\n						<td width=\"15\">&nbsp;</td>\r\n					</tr>\r\n					<!-- site map -->\r\n					<tr>\r\n						<td height=\"30\">&nbsp;</td>\r\n						<td height=\"30\">&nbsp;</td>\r\n						<td height=\"30\">&nbsp;</td>\r\n					</tr>\r\n					<!-- site map -->\r\n					<tr>\r\n						<td width=\"15\">&nbsp;</td>\r\n						<td style=\"text-align: center;\">\r\n						<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center;\"><a href=\"mailto:info@chicagoandhra.org\" style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center; text-decoration: none; text-align: center;\">info@chicagoandhra.org</a> | <a href=\"tel:630-881-7859\" style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center; text-decoration: none;\">630-881-7859</a></p>\r\n\r\n						<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center;\">Copyright &copy;2022 Chicago Andhra Association. All rights reserved.</p>\r\n						</td>\r\n						<td width=\"15\">&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<!-- bottom space -->\r\n		<tr height=\"30\">\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 1, 0, '2022-12-27 17:49:48', '2023-01-10 06:45:06'),
(13, 'Event Registrations for Admin - Paid', 'New Event Registration -- Chicago Andhra Association', 'auto', '<table align=\"center\" bgcolor=\"#F2F2F2\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\"><!-- top space -->\r\n	<tbody>\r\n		<tr height=\"15\">\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<!-- main -->\r\n		<tr>\r\n			<td>\r\n			<table align=\"center\" bgcolor=\"#F2F2F2\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n				<tbody>\r\n					<tr><!-- left space -->\r\n						<td width=\"15\">&nbsp;</td>\r\n						<td bgcolor=\"#ffffff\">\r\n						<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"><!-- header -->\r\n							<tbody>\r\n								<tr height=\"140\">\r\n									<td bgcolor=\"#FF6000\" width=\"15px\">&nbsp;</td>\r\n									<td align=\"center\" bgcolor=\"#FF6000\"><img height=\"88\" src=\"https://chicagoandhra.org/images/media/1zccc6wjn.png\" style=\"line-height: 1px; border: none;\" width=\"342\" /></td>\r\n									<td bgcolor=\"#FF6000\" width=\"15px\">&nbsp;</td>\r\n								</tr>\r\n								<!-- email body -->\r\n								<tr>\r\n									<td bgcolor=\"#ffffff\" width=\"15px\">&nbsp;</td>\r\n									<td>\r\n									<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n										<tbody>\r\n											<tr height=\"120\">\r\n												<td align=\"center\"><img height=\"93\" src=\"https://i.postimg.cc/zDbBcsPw/event-available.png\" style=\"line-height: 1px; border: none;\" width=\"95\" /></td>\r\n											</tr>\r\n											<tr>\r\n												<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 24px; line-height: 26px; font-weight: normal; color: #181818; text-align: center;\">Dear <span style=\"color:#2D6FD1\">Admin,</span></td>\r\n											</tr>\r\n											<tr height=\"30\">\r\n												<td>&nbsp;</td>\r\n											</tr>\r\n											<tr>\r\n												<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; line-height: 32px; font-weight: normal; color:#181818; text-align: center;\">You have a new event registration.<br />\r\n												Please find the member details below.</td>\r\n											</tr>\r\n											<tr height=\"40\">\r\n												<td>&nbsp;</td>\r\n											</tr>\r\n											<tr>\r\n												<td bgcolor=\"#F2F2F2\" height=\"1\" width=\"100%\">&nbsp;</td>\r\n											</tr>\r\n											<tr height=\"40\">\r\n												<td>&nbsp;</td>\r\n											</tr>\r\n											<tr>\r\n												<td>\r\n												<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n													<tbody>\r\n														<tr>\r\n															<td style=\"margin: 0; padding:0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; font-weight:normal; line-height: 167%px;  color: #000000; \">Event Details</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space -->\r\n														<tr height=\"15px\">\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space ebd -->\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: 400; line-height: 30px;  color: #000000; \" width=\"200\">Event Name</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[EventName]</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Date</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Date]</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Location</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Location]</td>\r\n														</tr>\r\n														<!-- space -->\r\n														<tr height=\"30px\">\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space ebd -->\r\n														<tr>\r\n															<td style=\"margin: 0; padding:0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; font-weight:normal; line-height: 167%px;  color: #000000; \">User Details</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space -->\r\n														<tr height=\"15px\">\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space ebd -->\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Registration ID</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Registration ID]</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">First Name</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[First Name]</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Last Name</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Last Name]</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Email</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Email]</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Mobile</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Mobile]</td>\r\n														</tr>\r\n														<!-- space -->\r\n														<tr height=\"30px\">\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space ebd -->\r\n														<tr>\r\n															<td style=\"margin: 0; padding:0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; font-weight:normal; line-height: 167%px;  color: #000000; \">Tickets Info</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space -->\r\n														<tr height=\"15px\">\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space ebd --><!-- space -->\r\n														<tr height=\"15px\">\r\n															<td colspan=\"3\">\r\n															<table 100=\"\" cellpadding=\" width=\" cellspacing=\"0\">\r\n																<tbody>\r\n																	<tr>\r\n																		<td>\r\n																		<table 100=\"\" cellpadding=\" width=\" cellspacing=\"0\">\r\n																			<tbody>\r\n																				<tr>\r\n																					<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \">Adults</td>\r\n																					<td align=\"center\" width=\"30\">:</td>\r\n																					<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Adults]</td>\r\n																				</tr>\r\n																				<tr>\r\n																					<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \">Children</td>\r\n																					<td align=\"center\" width=\"30\">:</td>\r\n																					<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Children]</td>\r\n																				</tr>\r\n																			</tbody>\r\n																		</table>\r\n																		</td>\r\n																		<td width=\"90\">&nbsp;</td>\r\n																		<td>\r\n																		<table 100=\"\" cellpadding=\" width=\" cellspacing=\"0\">\r\n																			<tbody>\r\n																				<tr>\r\n																					<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \">Guests</td>\r\n																					<td align=\"center\" width=\"40\">:</td>\r\n																					<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Guests]</td>\r\n																				</tr>\r\n																				<tr>\r\n																					<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \">Guest Children</td>\r\n																					<td align=\"center\" width=\"30\">:</td>\r\n																					<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[GuestChildren]</td>\r\n																				</tr>\r\n																			</tbody>\r\n																		</table>\r\n																		</td>\r\n																	</tr>\r\n																</tbody>\r\n															</table>\r\n															</td>\r\n														</tr>\r\n														<!-- space ebd --><!-- space -->\r\n														<tr height=\"30px\">\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space ebd -->\r\n														<tr>\r\n															<td style=\"margin: 0; padding:0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; font-weight:normal; line-height: 167%px;  color: #000000; \">Payment Details</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space -->\r\n														<tr height=\"15px\">\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space ebd -->\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Amount</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Amount]</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Payment Status</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Paid]</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Transaction Id</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Transaction ID]</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Payment Method</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Payment Method]</td>\r\n														</tr>\r\n														<!-- space -->\r\n														<tr height=\"30px\">\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space ebd -->\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n									<td bgcolor=\"#ffffff\" width=\"15px\">&nbsp;</td>\r\n								</tr>\r\n								<!-- footer -->\r\n								<tr height=\"100\">\r\n									<td bgcolor=\"#FF6000\" width=\"15px\">&nbsp;</td>\r\n									<td align=\"center\" bgcolor=\"#FF6000\">\r\n									<table align=\"center\" bgcolor=\"#FF6000\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n										<tbody>\r\n											<tr>\r\n												<td align=\"left\">\r\n												<p style=\"margin: 0 0 10px 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; line-height: 22px; font-weight: bold; color: #ffffff;\">Thanking You</p>\r\n\r\n												<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 18px;  color: #ffffff;\">Chicago Andhra Association</p>\r\n												</td>\r\n												<td align=\"right\"><a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/NFVzy9wM/Twitter.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/FFnqCqJ4/Instagram.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/FRTq4CW0/Facebook.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/prySXQ44/Youtube.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a></td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n									<td bgcolor=\"#FF6000\" width=\"15px\">&nbsp;</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n						<!-- right space -->\r\n						<td width=\"15\">&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<!-- site map -->\r\n		<tr>\r\n			<td style=\"text-align: center;\">\r\n			<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center;\"><a href=\"mailto:info@chicagoandhra.org\" style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center; text-decoration: none; text-align: center;\">info@chicagoandhra.org</a> | <a href=\"tel:630-881-7859\" style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center; text-decoration: none;\">630-881-7859</a></p>\r\n\r\n			<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center;\">Copyright &copy;2022 Chicago Andhra Association. All rights reserved.</p>\r\n			</td>\r\n		</tr>\r\n		<!-- Bottom space -->\r\n		<tr height=\"15\">\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 1, 0, '2022-12-27 17:52:26', '2023-01-13 08:48:24');
INSERT INTO `mail_templates` (`id`, `heading`, `subject`, `mail_type`, `description`, `publish`, `position`, `created_at`, `updated_at`) VALUES
(14, 'Event Registrations for Admin -Unpaid', 'New Event Registration -- Chicago Andhra Association', 'auto', '<table align=\"center\" bgcolor=\"#F2F2F2\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\"><!-- top space -->\r\n	<tbody>\r\n		<tr height=\"15\">\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<!-- main -->\r\n		<tr>\r\n			<td>\r\n			<table align=\"center\" bgcolor=\"#F2F2F2\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n				<tbody>\r\n					<tr><!-- left space -->\r\n						<td width=\"15\">&nbsp;</td>\r\n						<td bgcolor=\"#ffffff\">\r\n						<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"><!-- header -->\r\n							<tbody>\r\n								<tr height=\"140\">\r\n									<td bgcolor=\"#FF6000\" width=\"15px\">&nbsp;</td>\r\n									<td align=\"center\" bgcolor=\"#FF6000\"><img height=\"88\" src=\"https://chicagoandhra.org/images/media/1zccc6wjn.png\" style=\"line-height: 1px; border: none;\" width=\"342\" /></td>\r\n									<td bgcolor=\"#FF6000\" width=\"15px\">&nbsp;</td>\r\n								</tr>\r\n								<!-- email body -->\r\n								<tr>\r\n									<td bgcolor=\"#ffffff\" width=\"15px\">&nbsp;</td>\r\n									<td>\r\n									<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n										<tbody>\r\n											<tr height=\"120\">\r\n												<td align=\"center\"><img height=\"92\" src=\"https://i.postimg.cc/zDbBcsPw/event-available.png\" style=\"line-height: 1px; border: none;\" width=\"95\" /></td>\r\n											</tr>\r\n											<tr>\r\n												<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 24px; line-height: 26px; font-weight: normal; color: #181818; text-align: center;\">Dear <span style=\"color:#2D6FD1\">Admin,</span></td>\r\n											</tr>\r\n											<tr height=\"20\">\r\n												<td>&nbsp;</td>\r\n											</tr>\r\n											<tr>\r\n												<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; line-height: 32px; font-weight: normal; color:#181818; text-align: center;\">You have a new event registration.<br />\r\n												Please find the member details below.</td>\r\n											</tr>\r\n											<tr height=\"40\">\r\n												<td>&nbsp;</td>\r\n											</tr>\r\n											<tr>\r\n												<td bgcolor=\"#F2F2F2\" height=\"1\" width=\"100%\">&nbsp;</td>\r\n											</tr>\r\n											<tr height=\"40\">\r\n												<td>&nbsp;</td>\r\n											</tr>\r\n											<tr>\r\n												<td>\r\n												<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n													<tbody>\r\n														<tr>\r\n															<td style=\"margin: 0; padding:0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; font-weight:normal; line-height: 167%px;  color: #000000; \">Event Details</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space -->\r\n														<tr height=\"15px\">\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space ebd -->\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: 400; line-height: 30px;  color: #000000; \" width=\"200\">Event Name</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[EventName]</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Date</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Date]</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Location</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Location]</td>\r\n														</tr>\r\n														<!-- space -->\r\n														<tr height=\"30px\">\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space ebd -->\r\n														<tr>\r\n															<td style=\"margin: 0; padding:0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; font-weight:normal; line-height: 167%px;  color: #000000; \">User Details</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space -->\r\n														<tr height=\"15px\">\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space ebd -->\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Registration ID</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Registration ID]</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">First Name</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[First Name]</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Last Name</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Last Name]</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Email</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Email]</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Mobile</td>\r\n															<td align=\"center\" width=\"30\">:</td>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Mobile]</td>\r\n														</tr>\r\n														<!-- space -->\r\n														<tr height=\"30px\">\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space ebd -->\r\n														<tr>\r\n															<td style=\"margin: 0; padding:0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; font-weight:normal; line-height: 167%px;  color: #000000; \">Tickets Info</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space -->\r\n														<tr height=\"15px\">\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space ebd --><!-- space -->\r\n														<tr height=\"15px\">\r\n															<td colspan=\"3\">\r\n															<table 100=\"\" cellpadding=\" width=\" cellspacing=\"0\">\r\n																<tbody>\r\n																	<tr>\r\n																		<td>\r\n																		<table 100=\"\" cellpadding=\" width=\" cellspacing=\"0\">\r\n																			<tbody>\r\n																				<tr>\r\n																					<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \">Adults</td>\r\n																					<td align=\"center\" width=\"30\">:</td>\r\n																					<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Adults]</td>\r\n																				</tr>\r\n																				<tr>\r\n																					<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \">Children</td>\r\n																					<td align=\"center\" width=\"30\">:</td>\r\n																					<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Children]</td>\r\n																				</tr>\r\n																			</tbody>\r\n																		</table>\r\n																		</td>\r\n																		<td width=\"90\">&nbsp;</td>\r\n																		<td>\r\n																		<table 100=\"\" cellpadding=\" width=\" cellspacing=\"0\">\r\n																			<tbody>\r\n																				<tr>\r\n																					<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \">Guests</td>\r\n																					<td align=\"center\" width=\"30\">:</td>\r\n																					<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Guests]</td>\r\n																				</tr>\r\n																				<tr>\r\n																					<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \">Guest Children</td>\r\n																					<td align=\"center\" width=\"30\">:</td>\r\n																					<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[GuestChildren]</td>\r\n																				</tr>\r\n																			</tbody>\r\n																		</table>\r\n																		</td>\r\n																	</tr>\r\n																</tbody>\r\n															</table>\r\n															</td>\r\n														</tr>\r\n														<!-- space ebd --><!-- space -->\r\n														<tr height=\"30px\">\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<!-- space ebd --><!-- space ebd -->\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n									<td bgcolor=\"#ffffff\" width=\"15px\">&nbsp;</td>\r\n								</tr>\r\n								<!-- footer -->\r\n								<tr height=\"100\">\r\n									<td bgcolor=\"#FF6000\" width=\"15px\">&nbsp;</td>\r\n									<td align=\"center\" bgcolor=\"#FF6000\">\r\n									<table align=\"center\" bgcolor=\"#FF6000\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n										<tbody>\r\n											<tr>\r\n												<td align=\"left\">\r\n												<p style=\"margin: 0 0 10px 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; line-height: 22px; font-weight: bold; color: #ffffff;\">Thanking You</p>\r\n\r\n												<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 18px;  color: #ffffff;\">Chicago Andhra Association</p>\r\n												</td>\r\n												<td align=\"right\"><a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/NFVzy9wM/Twitter.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/FFnqCqJ4/Instagram.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/FRTq4CW0/Facebook.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/prySXQ44/Youtube.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a></td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n									<td bgcolor=\"#FF6000\" width=\"15px\">&nbsp;</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n						<!-- right space -->\r\n						<td width=\"15\">&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<!-- site map -->\r\n		<tr>\r\n			<td style=\"text-align: center;\">\r\n			<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center;\"><a href=\"mailto:info@chicagoandhra.org\" style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center; text-decoration: none; text-align: center;\">info@chicagoandhra.org</a> | <a href=\"tel:630-881-7859\" style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center; text-decoration: none;\">630-881-7859</a></p>\r\n\r\n			<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center;\">Copyright &copy;2022 Chicago Andhra Association. All rights reserved.</p>\r\n			</td>\r\n		</tr>\r\n		<!-- Bottom space -->\r\n		<tr height=\"15\">\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 1, 0, '2022-12-27 17:53:30', '2023-01-13 08:48:54'),
(15, 'Renewal Membership Admin', 'Membership Renewal Details -- Chicago Andhra Association', 'auto', '<table align=\"center\" bgcolor=\"#F2F2F2\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\"><!-- top space -->\r\n	<tbody>\r\n		<tr height=\"15\">\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<!-- main -->\r\n		<tr>\r\n			<td>\r\n			<table align=\"center\" bgcolor=\"#F2F2F2\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n				<tbody>\r\n					<tr><!-- left space -->\r\n						<td width=\"15\">&nbsp;</td>\r\n						<!--  content -->\r\n						<td>\r\n						<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"><!-- header -->\r\n							<tbody>\r\n								<tr height=\"140\">\r\n									<td align=\"center\" bgcolor=\"#FF6000\"><img height=\"88\" src=\"https://chicagoandhra.org/images/media/1zccc6wjn.png\" style=\"line-height: 1px; border: none;\" width=\"342\" /></td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n									<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"text-align: center;\" width=\"100%\">\r\n										<tbody>\r\n											<tr>\r\n												<td width=\"15\">&nbsp;</td>\r\n												<td align=\"center\">\r\n												<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n													<tbody>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr height=\"120\">\r\n															<td align=\"center\"><img height=\"91\" src=\"https://i.postimg.cc/pTD7xkSk/check-circle.png\" style=\"line-height: 1px; border: none;\" width=\"91\" /></td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 24px; line-height: 26px; font-weight: normal; color: #000000; text-align: center;\">Dear Admin</td>\r\n														</tr>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; line-height: 32px; font-weight: normal; color: #000000; text-align: center;\">You have a new membership renewal.<br />\r\n															Please find the details below.</td>\r\n														</tr>\r\n														<tr height=\"30\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr>\r\n															<td>\r\n															<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"80%\">\r\n																<tbody>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">First Name</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[First Name]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Last Name</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[LastName]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Member ID</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[MemberID]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Payment Date</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Payment Date]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Transaction ID</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Transaction ID]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Amount</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Amount]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Payment Status</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Payment Status]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Payment Method</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Payment Method]</td>\r\n																	</tr>\r\n																</tbody>\r\n															</table>\r\n															</td>\r\n														</tr>\r\n														<tr height=\"40\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n												<td width=\"15\">&nbsp;</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n								<!-- footer -->\r\n								<tr>\r\n									<td bgcolor=\"#FF6000\">\r\n									<table align=\"center\" bgcolor=\"#FF6000\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n										<tbody>\r\n											<tr height=\"100\">\r\n												<td width=\"15\">&nbsp;</td>\r\n												<td>\r\n												<table align=\"center\" bgcolor=\"#FF6000\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n													<tbody>\r\n														<tr>\r\n															<td align=\"left\">\r\n															<p style=\"margin: 0 0 10px 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; line-height: 22px; font-weight: bold; color: #ffffff;\">Thanking You</p>\r\n\r\n															<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 18px;  color: #ffffff;\">Chicago Andhra Association</p>\r\n															</td>\r\n															<td align=\"right\"><a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/NFVzy9wM/Twitter.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/FFnqCqJ4/Instagram.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/FRTq4CW0/Facebook.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/prySXQ44/Youtube.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a></td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n												<td width=\"15\">&nbsp;</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n						<!-- right space -->\r\n						<td width=\"15\">&nbsp;</td>\r\n					</tr>\r\n					<!-- site map -->\r\n					<tr>\r\n						<td height=\"30\">&nbsp;</td>\r\n						<td height=\"30\">&nbsp;</td>\r\n						<td height=\"30\">&nbsp;</td>\r\n					</tr>\r\n					<!-- site map -->\r\n					<tr>\r\n						<td width=\"15\">&nbsp;</td>\r\n						<td style=\"text-align: center;\">\r\n						<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center;\"><a href=\"mailto:info@chicagoandhra.org\" style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center; text-decoration: none; text-align: center;\">info@chicagoandhra.org</a> | <a href=\"tel:630-881-7859\" style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center; text-decoration: none;\">630-881-7859</a></p>\r\n\r\n						<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center;\">Copyright &copy;2022 Chicago Andhra Association. All rights reserved.</p>\r\n						</td>\r\n						<td width=\"15\">&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<!-- bottom space -->\r\n		<tr height=\"30\">\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 1, 0, '2022-12-27 18:00:06', '2023-01-10 06:50:41'),
(16, 'Reset Password', 'Password reset to login into Chicago Andhra Association', 'manual', '<table align=\"center\" bgcolor=\"#F2F2F2\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\"><!-- top space -->\r\n	<tbody>\r\n		<tr height=\"15\">\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<!-- main -->\r\n		<tr>\r\n			<td>\r\n			<table align=\"center\" bgcolor=\"#F2F2F2\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n				<tbody>\r\n					<tr><!-- left space -->\r\n						<td width=\"15\">&nbsp;</td>\r\n						<!--  content -->\r\n						<td>\r\n						<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"><!-- header -->\r\n							<tbody>\r\n								<tr height=\"140\">\r\n									<td align=\"center\" bgcolor=\"#FF6000\"><img height=\"88\" src=\"https://chicagoandhra.org/images/media/1zccc6wjn.png\" style=\"line-height: 1px; border: none;\" width=\"342\" /></td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n									<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"text-align: center;\" width=\"100%\">\r\n										<tbody>\r\n											<tr>\r\n												<td width=\"15\">&nbsp;</td>\r\n												<td align=\"center\">\r\n												<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n													<tbody>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr height=\"120\">\r\n															<td align=\"center\"><img height=\"90\" src=\"https://i.postimg.cc/MTTH0DTd/lock.png\" style=\"line-height: 1px; border: none;\" width=\"80\" /></td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 24px; line-height: 26px; font-weight: normal; color: #000000; text-align: center;\">Dear <span style=\"color:#2D6FD1\">[Full Name],</span></td>\r\n														</tr>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; line-height: 32px; font-weight: normal; color: #000000; text-align: center;\">A request has been received to change the password of your account.</td>\r\n														</tr>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; line-height: 32px; font-weight: normal; color: #000000; text-align: center;\">Click on the below button to set new password.</td>\r\n														</tr>\r\n														<tr height=\"80\">\r\n															<td align=\"center\"><img height=\"40px\" src=\"https://i.postimg.cc/7YW1WwWn/Set-new-Password-button.png\" style=\"line-height: 1px; border: none;\" width=\"176px\" /></td>\r\n														</tr>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n												<td width=\"15\">&nbsp;</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n								<!-- footer -->\r\n								<tr>\r\n									<td bgcolor=\"#FF6000\">\r\n									<table align=\"center\" bgcolor=\"#FF6000\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n										<tbody>\r\n											<tr height=\"100\">\r\n												<td width=\"15\">&nbsp;</td>\r\n												<td>\r\n												<table align=\"center\" bgcolor=\"#FF6000\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n													<tbody>\r\n														<tr>\r\n															<td align=\"left\">\r\n															<p style=\"margin: 0 0 10px 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; line-height: 22px; font-weight: bold; color: #ffffff;\">Thanking You</p>\r\n\r\n															<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 18px;  color: #ffffff;\">Chicago Andhra Association</p>\r\n															</td>\r\n															<td align=\"right\"><a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/NFVzy9wM/Twitter.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/FFnqCqJ4/Instagram.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/FRTq4CW0/Facebook.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/prySXQ44/Youtube.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a></td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n												<td width=\"15\">&nbsp;</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n						<!-- right space -->\r\n						<td width=\"15\">&nbsp;</td>\r\n					</tr>\r\n					<!-- site map -->\r\n					<tr>\r\n						<td height=\"30\">&nbsp;</td>\r\n						<td height=\"30\">&nbsp;</td>\r\n						<td height=\"30\">&nbsp;</td>\r\n					</tr>\r\n					<!-- site map -->\r\n					<tr>\r\n						<td width=\"15\">&nbsp;</td>\r\n						<td style=\"text-align: center;\">\r\n						<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center;\"><a href=\"mailto:info@chicagoandhra.org\" style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center; text-decoration: none; text-align: center;\">info@chicagoandhra.org</a> | <a href=\"tel:630-881-7859\" style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center; text-decoration: none;\">630-881-7859</a></p>\r\n\r\n						<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center;\">Copyright &copy;2022 Chicago Andhra Association. All rights reserved.</p>\r\n						</td>\r\n						<td width=\"15\">&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<!-- bottom space -->\r\n		<tr height=\"30\">\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 1, 0, '2022-12-27 18:06:21', '2023-01-10 06:51:01'),
(17, 'Thank You For Becoming A Member', 'CAA Member Registration Confirmation', 'auto', '<table align=\"center\" bgcolor=\"#F2F2F2\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\"><!-- top space -->\r\n	<tbody>\r\n		<tr height=\"15\">\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<!-- main -->\r\n		<tr>\r\n			<td>\r\n			<table align=\"center\" bgcolor=\"#F2F2F2\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n				<tbody>\r\n					<tr><!-- left space -->\r\n						<td width=\"15\">&nbsp;</td>\r\n						<!--  content -->\r\n						<td>\r\n						<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"><!-- header -->\r\n							<tbody>\r\n								<tr height=\"140\">\r\n									<td align=\"center\" bgcolor=\"#FF6000\"><img height=\"88\" src=\"https://chicagoandhra.org/images/media/1zccc6wjn.png\" style=\"line-height: 1px; border: none;\" width=\"342\" /></td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n									<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"text-align: center;\" width=\"100%\">\r\n										<tbody>\r\n											<tr>\r\n												<td width=\"15\">&nbsp;</td>\r\n												<td align=\"center\">\r\n												<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n													<tbody>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr height=\"120\">\r\n															<td align=\"center\"><img height=\"100\" src=\"https://i.postimg.cc/pTD7xkSk/check-circle.png\" style=\"line-height: 1px; border: none;\" width=\"100\" /></td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 24px; line-height: 26px; font-weight: normal; color: #000000; text-align: center;\">Dear <span style=\"color:#2D6FD1\">[Full Name],</span></td>\r\n														</tr>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; line-height: 33px; font-weight: normal; color: #000000; text-align: center;\">Welcome to Chicago Andhra Association.<br />\r\n															Thank you for registering as a member.</td>\r\n														</tr>\r\n														<tr height=\"30\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr>\r\n															<td>\r\n															<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n																<tbody>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #181818; text-align: center; \">Your Membership ID</td>\r\n																	</tr>\r\n																</tbody>\r\n															</table>\r\n															</td>\r\n														</tr>\r\n														<tr height=\"15px\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr>\r\n															<td>\r\n															<p style=\"font-family: Arial, Helvetica, sans-serif; font-weight: 500; font-size: 24px; color: #FFFFFF; background: #FF6000; padding: 14px 0; max-width: 300px; margin: 0 auto; text-align: center; \">[MEMBER ID]</p>\r\n															</td>\r\n														</tr>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr>\r\n															<td>\r\n															<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n																<tbody>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; line-height: 30px;  color: #181818; text-align: center; \">Your account has been created and your details<br />\r\n																		posted to Chicago Andhra Association Authorized<br />\r\n																		Administrator.</td>\r\n																	</tr>\r\n																</tbody>\r\n															</table>\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td bgcolor=\"#cccccc\" height=\"1\" width=\"100%\">&nbsp;</td>\r\n														</tr>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 22px; color: #958E8E; text-align: center;\">\r\n															<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 22px; color: #958E8E; text-align: center;\">However, if you run into any issues or have questions, feel free to email us at <a href=\"mailto:info@chicagoandhra.org\" style=\"color:#958E8E\">info@chicagoandhra.org</a></p>\r\n															</td>\r\n														</tr>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n												<td width=\"15\">&nbsp;</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n								<!-- footer -->\r\n								<tr>\r\n									<td bgcolor=\"#FF6000\">\r\n									<table align=\"center\" bgcolor=\"#FF6000\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n										<tbody>\r\n											<tr height=\"100\">\r\n												<td width=\"15\">&nbsp;</td>\r\n												<td>\r\n												<table align=\"center\" bgcolor=\"#FF6000\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n													<tbody>\r\n														<tr>\r\n															<td align=\"left\">\r\n															<p style=\"margin: 0 0 10px 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; line-height: 22px; font-weight: bold; color: #ffffff;\">Thanking You</p>\r\n\r\n															<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 18px;  color: #ffffff;\">Chicago Andhra Association</p>\r\n															</td>\r\n															<td align=\"right\"><a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/NFVzy9wM/Twitter.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/FFnqCqJ4/Instagram.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/FRTq4CW0/Facebook.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/prySXQ44/Youtube.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a></td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n												<td width=\"15\">&nbsp;</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n						<!-- right space -->\r\n						<td width=\"15\">&nbsp;</td>\r\n					</tr>\r\n					<!-- site map -->\r\n					<tr>\r\n						<td height=\"30\">&nbsp;</td>\r\n						<td height=\"30\">&nbsp;</td>\r\n						<td height=\"30\">&nbsp;</td>\r\n					</tr>\r\n					<!-- site map -->\r\n					<tr>\r\n						<td width=\"15\">&nbsp;</td>\r\n						<td style=\"text-align: center;\">\r\n						<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center;\"><a href=\"mailto:info@chicagoandhra.org\" style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center; text-decoration: none; text-align: center;\">info@chicagoandhra.org</a> | <a href=\"tel:630-881-7859\" style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center; text-decoration: none;\">630-881-7859</a></p>\r\n\r\n						<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center;\">Copyright &copy;2022 Chicago Andhra Association. All rights reserved.</p>\r\n<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center;\"><a href=\"http://eepurl.com/gf65vn\">Sign up for our emails!</a></p>\r\n						</td>\r\n						<td width=\"15\">&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<!-- bottom space -->\r\n		<tr height=\"30\">\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 1, 0, '2022-12-27 20:16:04', '2023-01-16 11:10:07');
INSERT INTO `mail_templates` (`id`, `heading`, `subject`, `mail_type`, `description`, `publish`, `position`, `created_at`, `updated_at`) VALUES
(18, 'Member Registration', 'Thank you for registering - CAA', 'auto', '<table align=\"center\" bgcolor=\"#F2F2F2\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\"><!-- top space -->\r\n	<tbody>\r\n		<tr height=\"15\">\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<!-- main -->\r\n		<tr>\r\n			<td>\r\n			<table align=\"center\" bgcolor=\"#F2F2F2\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n				<tbody>\r\n					<tr><!-- left space -->\r\n						<td width=\"15\">&nbsp;</td>\r\n						<!--  content -->\r\n						<td>\r\n						<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"><!-- header -->\r\n							<tbody>\r\n								<tr height=\"140\">\r\n									<td align=\"center\" bgcolor=\"#FF6000\"><img height=\"88\" src=\"https://chicagoandhra.org/images/media/1zccc6wjn.png\" style=\"line-height: 1px; border: none;\" width=\"342\" /></td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n									<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"text-align: center;\" width=\"100%\">\r\n										<tbody>\r\n											<tr>\r\n												<td width=\"15\">&nbsp;</td>\r\n												<td align=\"center\">\r\n												<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n													<tbody>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr height=\"120\">\r\n															<td align=\"center\"><img height=\"91.37px\" src=\"https://i.postimg.cc/pTD7xkSk/check-circle.png\" style=\"line-height: 1px; border: none;\" width=\"91.37px\" /></td>\r\n														</tr>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 24px; line-height: 26px; font-weight: normal; color: #181818; text-align: center;\">Dear <span style=\"color:#2D6FD1\">[Full Name],</span></td>\r\n														</tr>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; line-height: 33px; font-weight: normal; color:#181818; text-align: center;\">Welcome to Chicago Andhra Association.<br />\r\n															Your account payment is confirmed.</td>\r\n														</tr>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr>\r\n															<td>\r\n															<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n																<tbody>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #181818; text-align: center; \">Please find the registration details below:</td>\r\n																	</tr>\r\n																</tbody>\r\n															</table>\r\n															</td>\r\n														</tr>\r\n														<tr height=\"30\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr>\r\n															<td>\r\n															<table align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"70%\">\r\n																<tbody>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 31px;  color: #000000; \" width=\"200\">First Name</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[First Name]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Last Name</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[LastName]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Member ID</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[MemberID]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Member Type</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Member Type]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Payment Date</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Payment Date]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Transaction ID</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Transaction ID]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Amount</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Amount]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Payment Status</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Payment Status]</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #000000; \" width=\"200\">Payment Method</td>\r\n																		<td align=\"center\" width=\"30\">:</td>\r\n																		<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px;  color: #2D6FD1; \">[Payment Method]</td>\r\n																	</tr>\r\n																</tbody>\r\n															</table>\r\n															</td>\r\n														</tr>\r\n														<tr height=\"15px\">\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr bgcolor=\"#FF6000\" height=\"58px\">\r\n															<td colspan=\"3\" style=\" margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 27px; font-weight: normal; color:#181818 ;text-align: center; color: #ffffff;\">You can login with your Login ID (Email ID) and Password<br />\r\n															to avail all the Membership benefits.</td>\r\n														</tr>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr>\r\n															<td bgcolor=\"#cccccc\" height=\"1\" width=\"100%\">&nbsp;</td>\r\n														</tr>\r\n														<tr height=\"30\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 22px; color: #958E8E; text-align: center;\">\r\n															<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 22px; color: #958E8E; text-align: center;\">However, if you run into any issues or have questions, feel free to email us at <a href=\"mailto:info@chicagoandhra.org\" style=\"color:#958E8E\">info@chicagoandhra.org</a></p>\r\n															</td>\r\n														</tr>\r\n														<tr height=\"20\">\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n												<td width=\"15\">&nbsp;</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n								<!-- footer -->\r\n								<tr>\r\n									<td bgcolor=\"#FF6000\">\r\n									<table align=\"center\" bgcolor=\"#FF6000\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n										<tbody>\r\n											<tr height=\"100\">\r\n												<td width=\"15\">&nbsp;</td>\r\n												<td>\r\n												<table align=\"center\" bgcolor=\"#FF6000\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n													<tbody>\r\n														<tr>\r\n															<td align=\"left\">\r\n															<p style=\"margin:0 0 10px 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 20px; line-height: 22px; font-weight: bold; color: #ffffff;\">Thanking You</p>\r\n\r\n															<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 18px;  color: #ffffff;\">Chicago Andhra Association</p>\r\n															</td>\r\n															<td align=\"right\"><a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/NFVzy9wM/Twitter.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/FFnqCqJ4/Instagram.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/FRTq4CW0/Facebook.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a> <a href=\"#\" target=\"_blank\"><img height=\"35\" src=\"https://i.postimg.cc/prySXQ44/Youtube.png\" style=\"line-height: 1px; border: none;\" width=\"35\" /></a></td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n												<td width=\"15\">&nbsp;</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n						<!-- right space -->\r\n						<td width=\"15\">&nbsp;</td>\r\n					</tr>\r\n					<!-- site map -->\r\n					<tr>\r\n						<td height=\"30\">&nbsp;</td>\r\n						<td height=\"30\">&nbsp;</td>\r\n						<td height=\"30\">&nbsp;</td>\r\n					</tr>\r\n					<!-- site map -->\r\n					<tr>\r\n						<td width=\"15\">&nbsp;</td>\r\n						<td style=\"text-align: center;\">\r\n						<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center;\"><a href=\"mailto:info@chicagoandhra.org\" style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center; text-decoration: none; text-align: center;\">info@chicagoandhra.org</a> | <a href=\"tel:630-881-7859\" style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center; text-decoration: none;\">630-881-7859</a></p>\r\n\r\n						<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center;\">Copyright &copy;2022 Chicago Andhra Association. All rights reserved.</p>\r\n<p style=\"margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 22px; color: #958E8E; text-align: center;\"><a href=\"http://eepurl.com/gf65vn\">Sign up for our emails!</a></p>\r\n						</td>\r\n						<td width=\"15\">&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<!-- bottom space -->\r\n		<tr height=\"30\">\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 1, 0, '2022-12-29 21:40:33', '2023-01-16 11:10:33');

-- --------------------------------------------------------

--
-- Table structure for table `membership_types`
--

CREATE TABLE `membership_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `membership_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `lifetime` tinyint(4) NOT NULL DEFAULT '0',
  `months` int(11) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `publish` tinyint(4) NOT NULL DEFAULT '1',
  `position` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `validity_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `membership_types`
--

INSERT INTO `membership_types` (`id`, `membership_name`, `price`, `lifetime`, `months`, `expiry_date`, `publish`, `position`, `created_at`, `updated_at`, `validity_type`) VALUES
(2, '2022 Annual Family Membership', 103, 0, NULL, '2022-12-31', 0, 0, '2022-12-20 23:37:43', '2022-12-20 23:37:43', 'expirydate'),
(3, 'Life Membership', 1030, 1, NULL, NULL, 1, 0, '2022-12-20 23:38:08', '2022-12-20 23:38:08', 'lifetime'),
(4, '2022 Annual Single Membership', 63, 0, NULL, '2022-12-31', 0, 0, '2022-12-20 23:38:24', '2022-12-20 23:38:24', 'expirydate'),
(5, 'Annual Student Membership - 2018', 40, 0, 12, NULL, 0, 0, '2022-12-21 23:38:24', '2022-12-21 23:38:24', 'months'),
(6, 'Renew Annual Single Membership', 60, 0, NULL, '2020-12-31', 0, 0, '2022-12-22 23:38:24', '2022-12-22 23:38:24', 'expirydate'),
(7, 'Renew Family Membership', 100, 0, NULL, '2019-12-31', 0, 0, '2022-12-23 23:38:24', '2022-12-23 23:38:24', 'expirydate'),
(9, 'Renew Family Membership 2020', 103, 0, NULL, '2020-12-31', 0, 0, '2022-12-24 23:38:24', '2022-12-24 23:38:24', 'expirydate'),
(10, '2022 Annual Senior Family Membership', 83, 0, NULL, '2022-12-31', 0, 0, '2022-12-25 23:38:24', '2022-12-25 23:38:24', 'expirydate'),
(11, '2023 Annual Family Membership', 100, 0, NULL, '2023-12-31', 1, 0, '2022-12-26 23:38:24', '2023-01-10 02:32:01', 'expirydate'),
(12, '2023 Annual Senior Family Membership', 80, 0, NULL, '2023-12-31', 1, 0, '2022-12-27 23:38:24', '2023-01-10 02:32:26', 'expirydate'),
(13, '2023 Annual Single Membership', 60, 0, NULL, '2023-12-31', 1, 0, '2022-12-28 23:38:24', '2023-01-10 02:32:47', 'expirydate'),
(14, 'Test Membership', 1, 0, 1, NULL, 0, 0, '2023-01-10 12:42:52', '2023-01-10 18:17:09', 'months'),
(15, 'BOD-2025', 300, 0, NULL, '2025-12-31', 0, 0, '2023-01-30 18:45:16', '2023-01-31 03:26:51', 'expirydate');

-- --------------------------------------------------------

--
-- Table structure for table `member_interests`
--

CREATE TABLE `member_interests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `interests` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` tinyint(4) NOT NULL DEFAULT '1',
  `position` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_interests`
--

INSERT INTO `member_interests` (`id`, `interests`, `publish`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Chicago AndhraVani (Magazine)', 1, 0, '2023-01-07 07:31:31', '2023-01-07 07:31:31'),
(2, 'Cultural', 1, 0, '2023-01-07 07:31:40', '2023-01-07 07:31:40'),
(3, 'Decorations', 1, 0, '2023-01-07 07:31:50', '2023-01-07 07:31:50'),
(4, 'Digital Assests', 1, 0, '2023-01-07 07:31:58', '2023-01-07 07:31:58'),
(5, 'Food', 1, 0, '2023-01-07 07:32:07', '2023-01-07 07:32:07'),
(6, 'Communications', 1, 0, '2023-01-07 07:32:18', '2023-01-07 07:32:18'),
(7, 'Hospitality', 1, 0, '2023-01-07 07:32:25', '2023-01-07 07:32:25'),
(8, 'Logistics', 1, 0, '2023-01-07 07:32:32', '2023-01-07 07:32:32'),
(9, 'Media Relations', 1, 0, '2023-01-07 07:32:38', '2023-01-07 07:32:38'),
(10, 'Seniors', 1, 0, '2023-01-07 07:32:44', '2023-01-07 07:32:44'),
(11, 'Sports', 1, 0, '2023-01-07 07:32:52', '2023-01-07 07:32:52'),
(12, 'Technology', 1, 0, '2023-01-07 07:32:58', '2023-01-07 07:32:58'),
(13, 'Web', 1, 0, '2023-01-07 07:33:04', '2023-01-07 07:33:04'),
(14, 'Chicago Andhra Foundation (Service Wing)', 1, 0, '2023-01-07 07:33:10', '2023-01-07 07:33:10'),
(15, 'Chicago Andhra Civic Engagement', 1, 0, '2023-01-07 07:33:17', '2023-01-07 07:33:17'),
(16, 'Registration & Memberships', 1, 0, '2023-01-07 07:33:22', '2023-01-07 07:33:22'),
(17, 'Youth', 1, 0, '2023-01-07 07:33:28', '2023-01-07 07:33:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_08_041133_create_permission_tables', 1),
(6, '2022_11_15_064314_add_type_to_permissions_table', 1),
(7, '2022_11_18_060950_create_application_settings_table', 1),
(8, '2022_11_19_064547_create_categories_table', 1),
(9, '2022_11_19_070316_add_category_id_to_application_settings_table', 1),
(10, '2022_11_28_121627_create_admins_table', 1),
(11, '2022_11_28_162712_create_cms_table', 1),
(12, '2022_11_29_053126_create_sliders_table', 1),
(13, '2022_12_01_064358_create_committee_category_types_table', 1),
(14, '2022_12_01_073206_create_committee_categories_table', 1),
(15, '2022_12_01_121351_create_committee_members_table', 1),
(16, '2022_12_02_050224_add_type_to_application_settings_table', 1),
(17, '2022_12_02_053921_add_type_to_cms_table', 1),
(18, '2022_12_03_074710_create_photo_gallery_categories_table', 1),
(19, '2022_12_03_110304_create_photo_galleries_table', 1),
(20, '2022_12_03_125638_create_video_gallery_categories_table', 1),
(21, '2022_12_03_135436_create_video_galleries_table', 1),
(22, '2022_12_03_181358_create_sponsor_categories_table', 1),
(23, '2022_12_05_061638_create_news_table', 1),
(24, '2022_12_05_100201_create_news_coverage_categories_table', 1),
(25, '2022_12_05_134826_create_sponsors_table', 1),
(26, '2022_12_06_115345_create_committee_member_active_lists_table', 1),
(27, '2022_12_07_031558_create_news_coverages_table', 1),
(28, '2022_12_07_071106_add_sort_to_committee_members_table', 1),
(29, '2022_12_07_092235_create_enquiries_table', 1),
(30, '2022_12_08_051910_add_publish_position_to_photo_galleries_table', 1),
(31, '2022_12_08_072239_create_membership_types_table', 1),
(32, '2022_12_08_094652_create_member_interests_table', 1),
(33, '2022_12_08_104118_create_personal_details_table', 1),
(34, '2022_12_08_122020_create_donation_categories_table', 1),
(35, '2022_12_09_053830_add_publish_position_to_video_galleries_table', 1),
(36, '2022_12_09_081755_create_donations_table', 1),
(37, '2022_12_09_090830_create_event_categories_table', 1),
(38, '2022_12_09_111235_create_events_table', 1),
(39, '2022_12_13_070127_add_validity_type_to_membership_types_table', 1),
(40, '2022_12_15_040117_add_personal_details_to_users_table', 1),
(41, '2022_12_15_041133_create_child_details_table', 1),
(42, '2022_12_15_041411_create_communication_details_table', 1),
(43, '2022_12_15_104555_create_event_registrations_table', 1),
(44, '2022_12_17_045938_create_payment_methods_table', 1),
(45, '2022_12_18_113824_remove_name_address_add_expiry_to_users_table', 1),
(46, '2022_12_18_162008_create_transactions_table', 1),
(47, '2022_12_22_054033_create_mail_templates_table', 1),
(48, '2022_12_22_152227_add_options_to_application_settings_table', 1),
(49, '2022_12_27_124409_change_field_type_to_events_table', 1),
(50, '2023_01_01_045815_add_mail_sent_field_to_users_table', 1),
(51, '2023_01_02_134026_add_renewal_mail_sent_fields_to_users_table', 1),
(52, '2023_01_03_072806_change_field_type_to_sponsors_table', 1),
(53, '2023_01_05_113600_change_field_nullable_to_event_registrations_table', 1),
(54, '2023_01_05_115028_add_and_change_fields_to_transactions_table', 1),
(55, '2023_01_07_063846_add_designation_to_committee_members_table', 1),
(56, '2023_01_07_125920_change_field_nullable_to_transactions_table', 2),
(57, '2023_01_09_104412_change_fields_nullable_to_personal_details_table', 3),
(58, '2023_01_10_061821_add_donation_id_field_to_transactions_table', 3),
(59, '2023_01_10_071305_change_donation_fields_to_donations_table', 3),
(60, '2023_01_10_114618_add_mailsent_field_to_donations_table', 4),
(61, '2023_01_13_051156_add_caf_designation_field_to_committee_members_table', 5),
(62, '2023_04_28_061459_change_title_field_to_photo_galleries_table', 6),
(63, '2023_04_28_082403_change_image_url_field_to_photo_galleries_table', 7),
(64, '2023_04_28_084344_change_year_field_to_photo_gallery_categories_table', 8),
(65, '2023_04_28_094630_change_title_and_description_field_to_video_galleries_table', 9),
(66, '2023_04_28_095204_change_year_field_to_video_gallery_categories_table', 10),
(67, '2023_05_04_060737_create_service_categories_table', 11),
(68, '2023_05_04_060738_create_services_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(3, 'App\\Models\\Admin', 2),
(2, 'App\\Models\\Admin', 3),
(4, 'App\\Models\\Admin', 4),
(1, 'App\\Models\\Admin', 5),
(2, 'App\\Models\\Admin', 6),
(3, 'App\\Models\\Admin', 7),
(6, 'App\\Models\\Admin', 8);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` tinyint(4) NOT NULL DEFAULT '1',
  `position` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news_coverages`
--

CREATE TABLE `news_coverages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `news_coverage_category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` tinyint(4) NOT NULL DEFAULT '1',
  `position` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news_coverage_categories`
--

CREATE TABLE `news_coverage_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `publish` tinyint(4) NOT NULL DEFAULT '1',
  `position` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('Yeluri05@yahoo.com', '$2y$10$IpVqTFi1Q4iylSy0oWo16OkhBGpiZvdsPTQVfNSoKCG3kWzsqUQTm', '2023-01-18 22:08:51'),
('treasurer@chicagoandhra.org', '$2y$10$T8ZmhijFegqRtA9UGGt16.RoD9INdJleSsToqgOvbouDeI350Qms.', '2023-01-22 00:15:09'),
('pavithrak@yahoo.com', '$2y$10$9uGrRbVwoqOy.FvsDA4Auu3O7wKbFDzn8V9ioVoIc/rZxeNsyuWgi', '2023-01-29 14:10:37'),
('rajdurga@hotmail.com', '$2y$10$p2NEi/uaZREUP8bsXcqwg.w7dewLZAd6dso4vsc6Mxxk0DbZ1upZS', '2023-01-29 16:52:27'),
('mad.mon575@gmail.com', '$2y$10$n//jYUjyjwn7xdQgHJ1Hre1CyP4o9wiqiNWJCkWOHTGZN5kOK1GOS', '2023-01-30 19:45:48'),
('mvrks@hotmail.com', '$2y$10$ZJ6TVj2.8d4lhuCOS.kCDum1ikMzJFq0tbxW2STMuMaPT0L.7aVpi', '2023-01-30 23:35:20'),
('pmutyala@gmail.com', '$2y$10$CPzGvPKrsNNXtidycUixBOYainGhnm81BT3igYBbwpXBE/.aWz1JS', '2023-01-31 22:41:19'),
('anettem9@gmail.com', '$2y$10$PIPKCv7EfiPrSwogJncEPu07UgyAH8hj..FJq3O54WzE9X/mtxwT2', '2023-02-01 19:32:46');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_method_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sandbox_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sandbox_secret` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `live_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `live_secret` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish` tinyint(4) NOT NULL DEFAULT '1',
  `position` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `payment_method_name`, `display_name`, `slug`, `sandbox_key`, `sandbox_secret`, `live_key`, `live_secret`, `publish`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Stripe', 'Card Payment', 'stripe', 'pk_test_51MFWfSIF27vR0q9LT74HhFmhs8a2FRC4cFv9f0U0nPSzWVwNPfhxLvhcFwWD2cOvUogTThH3G9V01LlbidxMT8wq006uFizQVc', 'sk_test_51MFWfSIF27vR0q9LV6i4BQrPcLLEjDXVTXmQbpPeHC55UyagFaiEWhizHlLMuVSVlFoAyoUzxQB98UkDGNpD6S1T009bouNfc9', 'pk_live_51MO3DkCuFwKXMCOwTljffOMrP01xk23b6o6MPjgGz0oRomVM4P6pAo0ppiXxNQikgTItBbHUtfSR9T10EQfcjnwh002FAysDHa', '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', 1, 1, NULL, '2023-01-10 13:58:57'),
(2, 'Cheque', 'Cheque Payment', 'cheque', NULL, NULL, NULL, NULL, 1, 2, NULL, NULL),
(3, 'Paypal', 'Paypal', 'paypal', 'AX1_KnOyqDJL11xaOcgxYvAbFnbKqzyXvHyZyPf7o-DPdpS9XXqtLbdf64vjWkJEbVGznLxwFsPr0S2H', 'EG1iZGgerEsd0bTT-IWENHYIz3gAVxcksC5AxWYOXVljxaaEQt53OCrDpLmNshI3_zawxYv4RY7iX6Sw', 'Aaj0Lb-ErtLuIFNgglNbpCX7pYenBH-kvHrtQ3Ia-mkJyI_Xql6BUlOfJUPGS9NzhVSR3Eec125nhDhp', 'EOHNFk2UqX6ogKRPiOLKqHNxOvoFHO8aYbI8OrgHRd-UQImBNGNDbhppgLxXSzL5VSI8k2k5iap-WScR', 1, 3, NULL, '2023-01-10 15:30:34'),
(4, 'Quickpay', 'QuickPay / Zelle', 'quickpay', NULL, NULL, NULL, NULL, 1, 4, NULL, '2023-01-11 07:20:15');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `type`) VALUES
(1, 'developer-settings-categories', 'admin', '2023-01-12 02:34:01', '2023-01-12 02:34:01', 1),
(2, 'add-developer-settings-categories', 'admin', '2023-01-12 02:34:01', '2023-01-12 02:34:01', 0),
(3, 'edit-developer-settings-categories', 'admin', '2023-01-12 02:34:01', '2023-01-12 02:34:01', 0),
(4, 'delete-developer-settings-categories', 'admin', '2023-01-12 02:34:01', '2023-01-12 02:34:01', 0),
(5, 'view-developer-settings-categories', 'admin', '2023-01-12 02:34:01', '2023-01-12 02:34:01', 0),
(6, 'publish-developer-settings-categories', 'admin', '2023-01-12 02:34:01', '2023-01-12 02:34:01', 0),
(7, 'developer-settings-list', 'admin', '2023-01-12 02:34:12', '2023-01-12 02:34:12', 1),
(8, 'add-developer-settings-list', 'admin', '2023-01-12 02:34:12', '2023-01-12 02:34:12', 0),
(9, 'edit-developer-settings-list', 'admin', '2023-01-12 02:34:12', '2023-01-12 02:34:12', 0),
(10, 'delete-developer-settings-list', 'admin', '2023-01-12 02:34:12', '2023-01-12 02:34:12', 0),
(11, 'view-developer-settings-list', 'admin', '2023-01-12 02:34:12', '2023-01-12 02:34:12', 0),
(12, 'publish-developer-settings-list', 'admin', '2023-01-12 02:34:12', '2023-01-12 02:34:12', 0),
(13, 'developer-settings', 'admin', '2023-01-12 02:34:28', '2023-01-12 02:34:28', 1),
(14, 'add-developer-settings', 'admin', '2023-01-12 02:34:28', '2023-01-12 02:34:28', 0),
(15, 'edit-developer-settings', 'admin', '2023-01-12 02:34:28', '2023-01-12 02:34:28', 0),
(16, 'delete-developer-settings', 'admin', '2023-01-12 02:34:28', '2023-01-12 02:34:28', 0),
(17, 'view-developer-settings', 'admin', '2023-01-12 02:34:28', '2023-01-12 02:34:28', 0),
(18, 'publish-developer-settings', 'admin', '2023-01-12 02:34:28', '2023-01-12 02:34:28', 0),
(19, 'permissions', 'admin', '2023-01-12 02:34:37', '2023-01-12 02:34:37', 1),
(20, 'add-permissions', 'admin', '2023-01-12 02:34:37', '2023-01-12 02:34:37', 0),
(21, 'edit-permissions', 'admin', '2023-01-12 02:34:37', '2023-01-12 02:34:37', 0),
(22, 'delete-permissions', 'admin', '2023-01-12 02:34:37', '2023-01-12 02:34:37', 0),
(23, 'view-permissions', 'admin', '2023-01-12 02:34:37', '2023-01-12 02:34:37', 0),
(24, 'publish-permissions', 'admin', '2023-01-12 02:34:37', '2023-01-12 02:34:37', 0),
(25, 'roles', 'admin', '2023-01-12 02:34:41', '2023-01-12 02:34:41', 1),
(26, 'add-roles', 'admin', '2023-01-12 02:34:41', '2023-01-12 02:34:41', 0),
(27, 'edit-roles', 'admin', '2023-01-12 02:34:41', '2023-01-12 02:34:41', 0),
(28, 'delete-roles', 'admin', '2023-01-12 02:34:41', '2023-01-12 02:34:41', 0),
(29, 'view-roles', 'admin', '2023-01-12 02:34:41', '2023-01-12 02:34:41', 0),
(30, 'publish-roles', 'admin', '2023-01-12 02:34:41', '2023-01-12 02:34:41', 0),
(31, 'dashboard', 'admin', '2023-01-12 02:34:58', '2023-01-12 02:34:58', 1),
(32, 'add-dashboard', 'admin', '2023-01-12 02:34:58', '2023-01-12 02:34:58', 0),
(33, 'edit-dashboard', 'admin', '2023-01-12 02:34:58', '2023-01-12 02:34:58', 0),
(34, 'delete-dashboard', 'admin', '2023-01-12 02:34:58', '2023-01-12 02:34:58', 0),
(35, 'view-dashboard', 'admin', '2023-01-12 02:34:58', '2023-01-12 02:34:58', 0),
(36, 'publish-dashboard', 'admin', '2023-01-12 02:34:58', '2023-01-12 02:34:58', 0),
(37, 'admin-management', 'admin', '2023-01-12 02:35:08', '2023-01-12 02:35:08', 1),
(38, 'add-admin-management', 'admin', '2023-01-12 02:35:08', '2023-01-12 02:35:08', 0),
(39, 'edit-admin-management', 'admin', '2023-01-12 02:35:08', '2023-01-12 02:35:08', 0),
(40, 'delete-admin-management', 'admin', '2023-01-12 02:35:08', '2023-01-12 02:35:08', 0),
(41, 'view-admin-management', 'admin', '2023-01-12 02:35:08', '2023-01-12 02:35:08', 0),
(42, 'publish-admin-management', 'admin', '2023-01-12 02:35:08', '2023-01-12 02:35:08', 0),
(43, 'event-categories', 'admin', '2023-01-12 02:35:50', '2023-01-12 02:35:50', 1),
(44, 'add-event-categories', 'admin', '2023-01-12 02:35:50', '2023-01-12 02:35:50', 0),
(45, 'edit-event-categories', 'admin', '2023-01-12 02:35:50', '2023-01-12 02:35:50', 0),
(46, 'delete-event-categories', 'admin', '2023-01-12 02:35:50', '2023-01-12 02:35:50', 0),
(47, 'view-event-categories', 'admin', '2023-01-12 02:35:50', '2023-01-12 02:35:50', 0),
(48, 'publish-event-categories', 'admin', '2023-01-12 02:35:51', '2023-01-12 02:35:51', 0),
(49, 'events', 'admin', '2023-01-12 02:35:58', '2023-01-12 02:35:58', 1),
(50, 'add-events', 'admin', '2023-01-12 02:35:58', '2023-01-12 02:35:58', 0),
(51, 'edit-events', 'admin', '2023-01-12 02:35:58', '2023-01-12 02:35:58', 0),
(52, 'delete-events', 'admin', '2023-01-12 02:35:58', '2023-01-12 02:35:58', 0),
(53, 'view-events', 'admin', '2023-01-12 02:35:58', '2023-01-12 02:35:58', 0),
(54, 'publish-events', 'admin', '2023-01-12 02:35:58', '2023-01-12 02:35:58', 0),
(55, 'event-registrations', 'admin', '2023-01-12 02:36:06', '2023-01-12 02:36:06', 1),
(56, 'add-event-registrations', 'admin', '2023-01-12 02:36:06', '2023-01-12 02:36:06', 0),
(57, 'edit-event-registrations', 'admin', '2023-01-12 02:36:06', '2023-01-12 02:36:06', 0),
(58, 'delete-event-registrations', 'admin', '2023-01-12 02:36:06', '2023-01-12 02:36:06', 0),
(59, 'view-event-registrations', 'admin', '2023-01-12 02:36:06', '2023-01-12 02:36:06', 0),
(60, 'publish-event-registrations', 'admin', '2023-01-12 02:36:06', '2023-01-12 02:36:06', 0),
(61, 'membership-types', 'admin', '2023-01-12 02:36:23', '2023-01-12 02:36:23', 1),
(62, 'add-membership-types', 'admin', '2023-01-12 02:36:23', '2023-01-12 02:36:23', 0),
(63, 'edit-membership-types', 'admin', '2023-01-12 02:36:23', '2023-01-12 02:36:23', 0),
(64, 'delete-membership-types', 'admin', '2023-01-12 02:36:23', '2023-01-12 02:36:23', 0),
(65, 'view-membership-types', 'admin', '2023-01-12 02:36:23', '2023-01-12 02:36:23', 0),
(66, 'publish-membership-types', 'admin', '2023-01-12 02:36:23', '2023-01-12 02:36:23', 0),
(67, 'membership-interests', 'admin', '2023-01-12 02:36:32', '2023-01-12 02:36:32', 1),
(68, 'add-membership-interests', 'admin', '2023-01-12 02:36:32', '2023-01-12 02:36:32', 0),
(69, 'edit-membership-interests', 'admin', '2023-01-12 02:36:32', '2023-01-12 02:36:32', 0),
(70, 'delete-membership-interests', 'admin', '2023-01-12 02:36:33', '2023-01-12 02:36:33', 0),
(71, 'view-membership-interests', 'admin', '2023-01-12 02:36:33', '2023-01-12 02:36:33', 0),
(72, 'publish-membership-interests', 'admin', '2023-01-12 02:36:33', '2023-01-12 02:36:33', 0),
(73, 'members', 'admin', '2023-01-12 02:36:40', '2023-01-12 02:36:40', 1),
(74, 'add-members', 'admin', '2023-01-12 02:36:40', '2023-01-12 02:36:40', 0),
(75, 'edit-members', 'admin', '2023-01-12 02:36:40', '2023-01-12 02:36:40', 0),
(76, 'delete-members', 'admin', '2023-01-12 02:36:40', '2023-01-12 02:36:40', 0),
(77, 'view-members', 'admin', '2023-01-12 02:36:40', '2023-01-12 02:36:40', 0),
(78, 'publish-members', 'admin', '2023-01-12 02:36:40', '2023-01-12 02:36:40', 0),
(79, 'committee-category-types', 'admin', '2023-01-12 02:36:59', '2023-01-12 02:36:59', 1),
(80, 'add-committee-category-types', 'admin', '2023-01-12 02:36:59', '2023-01-12 02:36:59', 0),
(81, 'edit-committee-category-types', 'admin', '2023-01-12 02:36:59', '2023-01-12 02:36:59', 0),
(82, 'delete-committee-category-types', 'admin', '2023-01-12 02:36:59', '2023-01-12 02:36:59', 0),
(83, 'view-committee-category-types', 'admin', '2023-01-12 02:36:59', '2023-01-12 02:36:59', 0),
(84, 'publish-committee-category-types', 'admin', '2023-01-12 02:36:59', '2023-01-12 02:36:59', 0),
(85, 'committee-categories', 'admin', '2023-01-12 02:37:10', '2023-01-12 02:37:10', 1),
(86, 'add-committee-categories', 'admin', '2023-01-12 02:37:10', '2023-01-12 02:37:10', 0),
(87, 'edit-committee-categories', 'admin', '2023-01-12 02:37:10', '2023-01-12 02:37:10', 0),
(88, 'delete-committee-categories', 'admin', '2023-01-12 02:37:10', '2023-01-12 02:37:10', 0),
(89, 'view-committee-categories', 'admin', '2023-01-12 02:37:10', '2023-01-12 02:37:10', 0),
(90, 'publish-committee-categories', 'admin', '2023-01-12 02:37:10', '2023-01-12 02:37:10', 0),
(91, 'committee-members', 'admin', '2023-01-12 02:37:17', '2023-01-12 02:37:17', 1),
(92, 'add-committee-members', 'admin', '2023-01-12 02:37:17', '2023-01-12 02:37:17', 0),
(93, 'edit-committee-members', 'admin', '2023-01-12 02:37:17', '2023-01-12 02:37:17', 0),
(94, 'delete-committee-members', 'admin', '2023-01-12 02:37:17', '2023-01-12 02:37:17', 0),
(95, 'view-committee-members', 'admin', '2023-01-12 02:37:17', '2023-01-12 02:37:17', 0),
(96, 'publish-committee-members', 'admin', '2023-01-12 02:37:17', '2023-01-12 02:37:17', 0),
(97, 'donation-categories', 'admin', '2023-01-12 02:37:31', '2023-01-12 02:37:31', 1),
(98, 'add-donation-categories', 'admin', '2023-01-12 02:37:31', '2023-01-12 02:37:31', 0),
(99, 'edit-donation-categories', 'admin', '2023-01-12 02:37:31', '2023-01-12 02:37:31', 0),
(100, 'delete-donation-categories', 'admin', '2023-01-12 02:37:31', '2023-01-12 02:37:31', 0),
(101, 'view-donation-categories', 'admin', '2023-01-12 02:37:31', '2023-01-12 02:37:31', 0),
(102, 'publish-donation-categories', 'admin', '2023-01-12 02:37:31', '2023-01-12 02:37:31', 0),
(103, 'donations', 'admin', '2023-01-12 02:37:37', '2023-01-12 02:37:37', 1),
(104, 'add-donations', 'admin', '2023-01-12 02:37:37', '2023-01-12 02:37:37', 0),
(105, 'edit-donations', 'admin', '2023-01-12 02:37:37', '2023-01-12 02:37:37', 0),
(106, 'delete-donations', 'admin', '2023-01-12 02:37:37', '2023-01-12 02:37:37', 0),
(107, 'view-donations', 'admin', '2023-01-12 02:37:37', '2023-01-12 02:37:37', 0),
(108, 'publish-donations', 'admin', '2023-01-12 02:37:37', '2023-01-12 02:37:37', 0),
(109, 'photo-categories', 'admin', '2023-01-12 02:38:47', '2023-01-12 02:38:47', 1),
(110, 'add-photo-categories', 'admin', '2023-01-12 02:38:47', '2023-01-12 02:38:47', 0),
(111, 'edit-photo-categories', 'admin', '2023-01-12 02:38:47', '2023-01-12 02:38:47', 0),
(112, 'delete-photo-categories', 'admin', '2023-01-12 02:38:47', '2023-01-12 02:38:47', 0),
(113, 'view-photo-categories', 'admin', '2023-01-12 02:38:47', '2023-01-12 02:38:47', 0),
(114, 'publish-photo-categories', 'admin', '2023-01-12 02:38:47', '2023-01-12 02:38:47', 0),
(115, 'photo-gallery', 'admin', '2023-01-12 02:38:53', '2023-01-12 02:38:53', 1),
(116, 'add-photo-gallery', 'admin', '2023-01-12 02:38:53', '2023-01-12 02:38:53', 0),
(117, 'edit-photo-gallery', 'admin', '2023-01-12 02:38:53', '2023-01-12 02:38:53', 0),
(118, 'delete-photo-gallery', 'admin', '2023-01-12 02:38:53', '2023-01-12 02:38:53', 0),
(119, 'view-photo-gallery', 'admin', '2023-01-12 02:38:53', '2023-01-12 02:38:53', 0),
(120, 'publish-photo-gallery', 'admin', '2023-01-12 02:38:53', '2023-01-12 02:38:53', 0),
(121, 'video-categories', 'admin', '2023-01-12 02:39:00', '2023-01-12 02:39:00', 1),
(122, 'add-video-categories', 'admin', '2023-01-12 02:39:00', '2023-01-12 02:39:00', 0),
(123, 'edit-video-categories', 'admin', '2023-01-12 02:39:00', '2023-01-12 02:39:00', 0),
(124, 'delete-video-categories', 'admin', '2023-01-12 02:39:00', '2023-01-12 02:39:00', 0),
(125, 'view-video-categories', 'admin', '2023-01-12 02:39:00', '2023-01-12 02:39:00', 0),
(126, 'publish-video-categories', 'admin', '2023-01-12 02:39:00', '2023-01-12 02:39:00', 0),
(127, 'video-gallery', 'admin', '2023-01-12 02:39:06', '2023-01-12 02:39:06', 1),
(128, 'add-video-gallery', 'admin', '2023-01-12 02:39:06', '2023-01-12 02:39:06', 0),
(129, 'edit-video-gallery', 'admin', '2023-01-12 02:39:06', '2023-01-12 02:39:06', 0),
(130, 'delete-video-gallery', 'admin', '2023-01-12 02:39:06', '2023-01-12 02:39:06', 0),
(131, 'view-video-gallery', 'admin', '2023-01-12 02:39:06', '2023-01-12 02:39:06', 0),
(132, 'publish-video-gallery', 'admin', '2023-01-12 02:39:06', '2023-01-12 02:39:06', 0),
(133, 'news-coverage-categories', 'admin', '2023-01-12 02:39:23', '2023-01-12 02:39:23', 1),
(134, 'add-news-coverage-categories', 'admin', '2023-01-12 02:39:23', '2023-01-12 02:39:23', 0),
(135, 'edit-news-coverage-categories', 'admin', '2023-01-12 02:39:23', '2023-01-12 02:39:23', 0),
(136, 'delete-news-coverage-categories', 'admin', '2023-01-12 02:39:23', '2023-01-12 02:39:23', 0),
(137, 'view-news-coverage-categories', 'admin', '2023-01-12 02:39:23', '2023-01-12 02:39:23', 0),
(138, 'publish-news-coverage-categories', 'admin', '2023-01-12 02:39:23', '2023-01-12 02:39:23', 0),
(139, 'news-coverage', 'admin', '2023-01-12 02:39:29', '2023-01-12 02:39:29', 1),
(140, 'add-news-coverage', 'admin', '2023-01-12 02:39:29', '2023-01-12 02:39:29', 0),
(141, 'edit-news-coverage', 'admin', '2023-01-12 02:39:29', '2023-01-12 02:39:29', 0),
(142, 'delete-news-coverage', 'admin', '2023-01-12 02:39:29', '2023-01-12 02:39:29', 0),
(143, 'view-news-coverage', 'admin', '2023-01-12 02:39:30', '2023-01-12 02:39:30', 0),
(144, 'publish-news-coverage', 'admin', '2023-01-12 02:39:30', '2023-01-12 02:39:30', 0),
(145, 'home-page-slider', 'admin', '2023-01-12 02:40:13', '2023-01-12 02:40:13', 1),
(146, 'add-home-page-slider', 'admin', '2023-01-12 02:40:13', '2023-01-12 02:40:13', 0),
(147, 'edit-home-page-slider', 'admin', '2023-01-12 02:40:13', '2023-01-12 02:40:13', 0),
(148, 'delete-home-page-slider', 'admin', '2023-01-12 02:40:13', '2023-01-12 02:40:13', 0),
(149, 'view-home-page-slider', 'admin', '2023-01-12 02:40:13', '2023-01-12 02:40:13', 0),
(150, 'publish-home-page-slider', 'admin', '2023-01-12 02:40:13', '2023-01-12 02:40:13', 0),
(151, 'home-page-blocks', 'admin', '2023-01-12 02:40:19', '2023-01-12 02:40:19', 1),
(152, 'add-home-page-blocks', 'admin', '2023-01-12 02:40:19', '2023-01-12 02:40:19', 0),
(153, 'edit-home-page-blocks', 'admin', '2023-01-12 02:40:19', '2023-01-12 02:40:19', 0),
(154, 'delete-home-page-blocks', 'admin', '2023-01-12 02:40:19', '2023-01-12 02:40:19', 0),
(155, 'view-home-page-blocks', 'admin', '2023-01-12 02:40:19', '2023-01-12 02:40:19', 0),
(156, 'publish-home-page-blocks', 'admin', '2023-01-12 02:40:20', '2023-01-12 02:40:20', 0),
(157, 'pages', 'admin', '2023-01-12 02:40:28', '2023-01-12 02:40:28', 1),
(158, 'add-pages', 'admin', '2023-01-12 02:40:28', '2023-01-12 02:40:28', 0),
(159, 'edit-pages', 'admin', '2023-01-12 02:40:28', '2023-01-12 02:40:28', 0),
(160, 'delete-pages', 'admin', '2023-01-12 02:40:28', '2023-01-12 02:40:28', 0),
(161, 'view-pages', 'admin', '2023-01-12 02:40:28', '2023-01-12 02:40:28', 0),
(162, 'publish-pages', 'admin', '2023-01-12 02:40:28', '2023-01-12 02:40:28', 0),
(163, 'media', 'admin', '2023-01-12 02:40:35', '2023-01-12 02:40:35', 1),
(164, 'add-media', 'admin', '2023-01-12 02:40:35', '2023-01-12 02:40:35', 0),
(165, 'edit-media', 'admin', '2023-01-12 02:40:35', '2023-01-12 02:40:35', 0),
(166, 'delete-media', 'admin', '2023-01-12 02:40:35', '2023-01-12 02:40:35', 0),
(167, 'view-media', 'admin', '2023-01-12 02:40:35', '2023-01-12 02:40:35', 0),
(168, 'publish-media', 'admin', '2023-01-12 02:40:35', '2023-01-12 02:40:35', 0),
(169, 'sponsor-categories', 'admin', '2023-01-12 02:40:48', '2023-01-12 02:40:48', 1),
(170, 'add-sponsor-categories', 'admin', '2023-01-12 02:40:48', '2023-01-12 02:40:48', 0),
(171, 'edit-sponsor-categories', 'admin', '2023-01-12 02:40:48', '2023-01-12 02:40:48', 0),
(172, 'delete-sponsor-categories', 'admin', '2023-01-12 02:40:48', '2023-01-12 02:40:48', 0),
(173, 'view-sponsor-categories', 'admin', '2023-01-12 02:40:48', '2023-01-12 02:40:48', 0),
(174, 'publish-sponsor-categories', 'admin', '2023-01-12 02:40:48', '2023-01-12 02:40:48', 0),
(175, 'sponsors', 'admin', '2023-01-12 02:40:53', '2023-01-12 02:40:53', 1),
(176, 'add-sponsors', 'admin', '2023-01-12 02:40:53', '2023-01-12 02:40:53', 0),
(177, 'edit-sponsors', 'admin', '2023-01-12 02:40:53', '2023-01-12 02:40:53', 0),
(178, 'delete-sponsors', 'admin', '2023-01-12 02:40:53', '2023-01-12 02:40:53', 0),
(179, 'view-sponsors', 'admin', '2023-01-12 02:40:53', '2023-01-12 02:40:53', 0),
(180, 'publish-sponsors', 'admin', '2023-01-12 02:40:53', '2023-01-12 02:40:53', 0),
(181, 'news', 'admin', '2023-01-12 02:40:58', '2023-01-12 02:40:58', 1),
(182, 'add-news', 'admin', '2023-01-12 02:40:58', '2023-01-12 02:40:58', 0),
(183, 'edit-news', 'admin', '2023-01-12 02:40:58', '2023-01-12 02:40:58', 0),
(184, 'delete-news', 'admin', '2023-01-12 02:40:58', '2023-01-12 02:40:58', 0),
(185, 'view-news', 'admin', '2023-01-12 02:40:59', '2023-01-12 02:40:59', 0),
(186, 'publish-news', 'admin', '2023-01-12 02:40:59', '2023-01-12 02:40:59', 0),
(187, 'application-settings', 'admin', '2023-01-12 02:41:14', '2023-01-12 02:41:14', 1),
(188, 'add-application-settings', 'admin', '2023-01-12 02:41:14', '2023-01-12 02:41:14', 0),
(189, 'edit-application-settings', 'admin', '2023-01-12 02:41:14', '2023-01-12 02:41:14', 0),
(190, 'delete-application-settings', 'admin', '2023-01-12 02:41:14', '2023-01-12 02:41:14', 0),
(191, 'view-application-settings', 'admin', '2023-01-12 02:41:14', '2023-01-12 02:41:14', 0),
(192, 'publish-application-settings', 'admin', '2023-01-12 02:41:14', '2023-01-12 02:41:14', 0),
(193, 'general-settings', 'admin', '2023-01-12 02:41:20', '2023-01-12 02:41:20', 1),
(194, 'add-general-settings', 'admin', '2023-01-12 02:41:20', '2023-01-12 02:41:20', 0),
(195, 'edit-general-settings', 'admin', '2023-01-12 02:41:20', '2023-01-12 02:41:20', 0),
(196, 'delete-general-settings', 'admin', '2023-01-12 02:41:20', '2023-01-12 02:41:20', 0),
(197, 'view-general-settings', 'admin', '2023-01-12 02:41:20', '2023-01-12 02:41:20', 0),
(198, 'publish-general-settings', 'admin', '2023-01-12 02:41:20', '2023-01-12 02:41:20', 0),
(199, 'payment-methods', 'admin', '2023-01-12 02:41:42', '2023-01-12 02:41:42', 1),
(200, 'add-payment-methods', 'admin', '2023-01-12 02:41:42', '2023-01-12 02:41:42', 0),
(201, 'edit-payment-methods', 'admin', '2023-01-12 02:41:42', '2023-01-12 02:41:42', 0),
(202, 'delete-payment-methods', 'admin', '2023-01-12 02:41:42', '2023-01-12 02:41:42', 0),
(203, 'view-payment-methods', 'admin', '2023-01-12 02:41:42', '2023-01-12 02:41:42', 0),
(204, 'publish-payment-methods', 'admin', '2023-01-12 02:41:42', '2023-01-12 02:41:42', 0),
(205, 'transactions', 'admin', '2023-01-12 02:41:46', '2023-01-12 02:41:46', 1),
(206, 'add-transactions', 'admin', '2023-01-12 02:41:46', '2023-01-12 02:41:46', 0),
(207, 'edit-transactions', 'admin', '2023-01-12 02:41:46', '2023-01-12 02:41:46', 0),
(208, 'delete-transactions', 'admin', '2023-01-12 02:41:46', '2023-01-12 02:41:46', 0),
(209, 'view-transactions', 'admin', '2023-01-12 02:41:46', '2023-01-12 02:41:46', 0),
(210, 'publish-transactions', 'admin', '2023-01-12 02:41:46', '2023-01-12 02:41:46', 0),
(211, 'mail-templates', 'admin', '2023-01-12 02:42:01', '2023-01-12 02:42:01', 1),
(212, 'add-mail-templates', 'admin', '2023-01-12 02:42:01', '2023-01-12 02:42:01', 0),
(213, 'edit-mail-templates', 'admin', '2023-01-12 02:42:01', '2023-01-12 02:42:01', 0),
(214, 'delete-mail-templates', 'admin', '2023-01-12 02:42:01', '2023-01-12 02:42:01', 0),
(215, 'view-mail-templates', 'admin', '2023-01-12 02:42:01', '2023-01-12 02:42:01', 0),
(216, 'publish-mail-templates', 'admin', '2023-01-12 02:42:01', '2023-01-12 02:42:01', 0),
(217, 'enquiries', 'admin', '2023-01-18 00:49:16', '2023-01-18 00:49:16', 1),
(218, 'add-enquiries', 'admin', '2023-01-18 00:49:16', '2023-01-18 00:49:16', 0),
(219, 'edit-enquiries', 'admin', '2023-01-18 00:49:16', '2023-01-18 00:49:16', 0),
(220, 'delete-enquiries', 'admin', '2023-01-18 00:49:16', '2023-01-18 00:49:16', 0),
(221, 'view-enquiries', 'admin', '2023-01-18 00:49:16', '2023-01-18 00:49:16', 0),
(222, 'publish-enquiries', 'admin', '2023-01-18 00:49:16', '2023-01-18 00:49:16', 0),
(223, 'send-mail', 'admin', '2023-01-18 00:49:35', '2023-01-18 00:49:35', 1),
(224, 'add-send-mail', 'admin', '2023-01-18 00:49:35', '2023-01-18 00:49:35', 0),
(225, 'edit-send-mail', 'admin', '2023-01-18 00:49:35', '2023-01-18 00:49:35', 0),
(226, 'delete-send-mail', 'admin', '2023-01-18 00:49:35', '2023-01-18 00:49:35', 0),
(227, 'view-send-mail', 'admin', '2023-01-18 00:49:35', '2023-01-18 00:49:35', 0),
(228, 'publish-send-mail', 'admin', '2023-01-18 00:49:35', '2023-01-18 00:49:35', 0);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_details`
--

CREATE TABLE `personal_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `wedding_anniversary` date DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `native_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `native_district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `native_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_date_of_birth` date DEFAULT NULL,
  `spouse_native_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_native_district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_native_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_interests` text COLLATE utf8mb4_unicode_ci,
  `spouse_interests` text COLLATE utf8mb4_unicode_ci,
  `child_interests` text COLLATE utf8mb4_unicode_ci,
  `membership_type_id` bigint(20) UNSIGNED NOT NULL,
  `publish` tinyint(4) NOT NULL DEFAULT '1',
  `position` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photo_galleries`
--

CREATE TABLE `photo_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo_gallery_category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `publish` tinyint(4) NOT NULL DEFAULT '1',
  `position` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photo_galleries`
--

INSERT INTO `photo_galleries` (`id`, `photo_gallery_category_id`, `title`, `image`, `image_url`, `created_at`, `updated_at`, `publish`, `position`) VALUES
(1, 1, NULL, 'a0l3xnrqi.png', NULL, '2023-03-20 03:08:21', '2023-04-28 03:07:32', 1, 0),
(17, 1, NULL, 'c7lhf02zl.png', NULL, '2023-04-28 02:58:46', '2023-04-28 02:58:46', 1, 0),
(18, 1, NULL, 'k8ktov81a.png', NULL, '2023-04-28 02:58:54', '2023-04-28 02:58:54', 1, 0),
(19, 1, NULL, '198poy02r.png', NULL, '2023-04-28 02:59:03', '2023-04-28 02:59:03', 1, 0),
(20, 2, NULL, 'o8bsso4il.png', NULL, '2023-04-28 03:09:13', '2023-04-28 03:09:14', 1, 0),
(21, 2, NULL, 'g8ennvm16.png', NULL, '2023-04-28 03:10:07', '2023-04-28 03:10:07', 1, 0),
(22, 2, NULL, 'pyb9m0htk.png', NULL, '2023-04-28 03:10:16', '2023-04-28 03:10:16', 1, 0),
(23, 2, NULL, 'nqjgr5wjz.png', NULL, '2023-04-28 03:10:24', '2023-04-28 03:10:24', 1, 0),
(24, 2, NULL, 'atoms0mvt.png', NULL, '2023-04-28 03:10:32', '2023-04-28 03:10:32', 1, 0),
(25, 2, NULL, '3rozdy981.png', NULL, '2023-04-28 03:10:39', '2023-04-28 03:10:39', 1, 0),
(26, 2, NULL, '8tkp0s0h4.png', NULL, '2023-04-28 03:10:46', '2023-04-28 03:10:47', 1, 0),
(27, 2, NULL, 'etc5ydunq.png', NULL, '2023-04-28 03:10:53', '2023-04-28 03:10:54', 1, 0),
(28, 2, NULL, '9h0lxindu.png', NULL, '2023-04-28 03:11:01', '2023-04-28 03:11:01', 1, 0),
(29, 2, NULL, 'gvq5qntsf.png', NULL, '2023-04-28 03:11:17', '2023-04-28 03:11:17', 1, 0),
(30, 2, NULL, 'ojnf8if6w.png', NULL, '2023-04-28 03:11:25', '2023-04-28 03:11:25', 1, 0),
(31, 2, NULL, 'nl28uaxsl.png', NULL, '2023-04-28 03:11:33', '2023-04-28 03:11:33', 1, 0),
(32, 2, NULL, 't85oz6404.png', NULL, '2023-04-28 03:11:42', '2023-04-28 03:11:42', 1, 0),
(33, 2, NULL, 'bkny00qxi.png', NULL, '2023-04-28 03:11:50', '2023-04-28 03:11:50', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `photo_gallery_categories`
--

CREATE TABLE `photo_gallery_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) DEFAULT NULL,
  `publish` tinyint(4) NOT NULL DEFAULT '1',
  `position` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photo_gallery_categories`
--

INSERT INTO `photo_gallery_categories` (`id`, `name`, `year`, `publish`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Home Page', NULL, 1, 0, '2023-03-20 03:07:49', '2023-04-28 03:16:03'),
(2, 'Gallery', NULL, 1, 0, '2023-03-20 03:14:33', '2023-04-28 03:16:07');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Developer Admin', 'admin', '2023-01-12 03:29:05', '2023-01-12 03:29:05'),
(2, 'Super Admin', 'admin', '2023-01-19 11:08:51', '2023-01-19 11:08:51'),
(3, 'Admin', 'admin', '2023-01-19 11:15:36', '2023-01-19 11:15:36'),
(4, 'Treasurer', 'admin', '2023-01-19 11:24:58', '2023-01-19 11:24:58'),
(5, 'CMS Admin', 'admin', '2023-01-19 11:31:22', '2023-01-19 11:31:22'),
(6, 'View only', 'admin', '2023-01-19 11:33:53', '2023-01-19 11:33:53');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(110, 1),
(111, 1),
(112, 1),
(113, 1),
(114, 1),
(116, 1),
(117, 1),
(118, 1),
(119, 1),
(120, 1),
(122, 1),
(123, 1),
(124, 1),
(125, 1),
(126, 1),
(128, 1),
(129, 1),
(130, 1),
(131, 1),
(132, 1),
(134, 1),
(135, 1),
(136, 1),
(137, 1),
(138, 1),
(140, 1),
(141, 1),
(142, 1),
(143, 1),
(144, 1),
(146, 1),
(147, 1),
(148, 1),
(149, 1),
(150, 1),
(152, 1),
(153, 1),
(154, 1),
(155, 1),
(156, 1),
(158, 1),
(159, 1),
(160, 1),
(161, 1),
(162, 1),
(164, 1),
(165, 1),
(166, 1),
(167, 1),
(168, 1),
(170, 1),
(171, 1),
(172, 1),
(173, 1),
(174, 1),
(176, 1),
(177, 1),
(178, 1),
(179, 1),
(180, 1),
(182, 1),
(183, 1),
(184, 1),
(185, 1),
(186, 1),
(188, 1),
(189, 1),
(190, 1),
(191, 1),
(192, 1),
(194, 1),
(195, 1),
(196, 1),
(197, 1),
(198, 1),
(200, 1),
(201, 1),
(202, 1),
(203, 1),
(204, 1),
(206, 1),
(207, 1),
(208, 1),
(209, 1),
(210, 1),
(212, 1),
(213, 1),
(214, 1),
(215, 1),
(216, 1),
(218, 1),
(219, 1),
(220, 1),
(221, 1),
(222, 1),
(224, 1),
(225, 1),
(226, 1),
(227, 1),
(228, 1),
(35, 2),
(38, 2),
(39, 2),
(40, 2),
(41, 2),
(42, 2),
(44, 2),
(45, 2),
(46, 2),
(47, 2),
(48, 2),
(50, 2),
(51, 2),
(52, 2),
(53, 2),
(54, 2),
(56, 2),
(57, 2),
(58, 2),
(59, 2),
(60, 2),
(62, 2),
(63, 2),
(64, 2),
(65, 2),
(66, 2),
(68, 2),
(69, 2),
(70, 2),
(71, 2),
(72, 2),
(74, 2),
(75, 2),
(76, 2),
(77, 2),
(78, 2),
(80, 2),
(81, 2),
(82, 2),
(83, 2),
(84, 2),
(86, 2),
(87, 2),
(88, 2),
(89, 2),
(90, 2),
(92, 2),
(93, 2),
(94, 2),
(95, 2),
(96, 2),
(98, 2),
(99, 2),
(100, 2),
(101, 2),
(102, 2),
(104, 2),
(105, 2),
(106, 2),
(107, 2),
(108, 2),
(110, 2),
(111, 2),
(112, 2),
(113, 2),
(114, 2),
(116, 2),
(117, 2),
(118, 2),
(119, 2),
(120, 2),
(122, 2),
(123, 2),
(124, 2),
(125, 2),
(126, 2),
(128, 2),
(129, 2),
(130, 2),
(131, 2),
(132, 2),
(134, 2),
(135, 2),
(136, 2),
(137, 2),
(138, 2),
(140, 2),
(141, 2),
(142, 2),
(143, 2),
(144, 2),
(146, 2),
(147, 2),
(148, 2),
(149, 2),
(150, 2),
(152, 2),
(153, 2),
(154, 2),
(155, 2),
(156, 2),
(158, 2),
(159, 2),
(160, 2),
(161, 2),
(162, 2),
(164, 2),
(165, 2),
(166, 2),
(167, 2),
(168, 2),
(170, 2),
(171, 2),
(172, 2),
(173, 2),
(174, 2),
(176, 2),
(177, 2),
(178, 2),
(179, 2),
(180, 2),
(182, 2),
(183, 2),
(184, 2),
(185, 2),
(186, 2),
(188, 2),
(189, 2),
(190, 2),
(191, 2),
(192, 2),
(194, 2),
(195, 2),
(196, 2),
(197, 2),
(198, 2),
(200, 2),
(201, 2),
(202, 2),
(203, 2),
(204, 2),
(206, 2),
(207, 2),
(208, 2),
(209, 2),
(210, 2),
(212, 2),
(213, 2),
(214, 2),
(215, 2),
(216, 2),
(218, 2),
(219, 2),
(220, 2),
(221, 2),
(222, 2),
(224, 2),
(225, 2),
(226, 2),
(227, 2),
(228, 2),
(35, 3),
(44, 3),
(45, 3),
(46, 3),
(47, 3),
(48, 3),
(50, 3),
(51, 3),
(52, 3),
(53, 3),
(54, 3),
(56, 3),
(57, 3),
(58, 3),
(59, 3),
(60, 3),
(62, 3),
(63, 3),
(64, 3),
(65, 3),
(66, 3),
(68, 3),
(69, 3),
(70, 3),
(71, 3),
(72, 3),
(74, 3),
(75, 3),
(76, 3),
(77, 3),
(78, 3),
(80, 3),
(81, 3),
(82, 3),
(83, 3),
(84, 3),
(86, 3),
(87, 3),
(88, 3),
(89, 3),
(90, 3),
(92, 3),
(93, 3),
(94, 3),
(95, 3),
(96, 3),
(98, 3),
(99, 3),
(100, 3),
(101, 3),
(102, 3),
(104, 3),
(105, 3),
(106, 3),
(107, 3),
(108, 3),
(110, 3),
(111, 3),
(112, 3),
(113, 3),
(114, 3),
(116, 3),
(117, 3),
(118, 3),
(119, 3),
(120, 3),
(122, 3),
(123, 3),
(124, 3),
(125, 3),
(126, 3),
(128, 3),
(129, 3),
(130, 3),
(131, 3),
(132, 3),
(134, 3),
(135, 3),
(136, 3),
(137, 3),
(138, 3),
(140, 3),
(141, 3),
(142, 3),
(143, 3),
(144, 3),
(146, 3),
(147, 3),
(148, 3),
(149, 3),
(150, 3),
(152, 3),
(153, 3),
(154, 3),
(155, 3),
(156, 3),
(158, 3),
(159, 3),
(160, 3),
(161, 3),
(162, 3),
(164, 3),
(165, 3),
(166, 3),
(167, 3),
(168, 3),
(170, 3),
(171, 3),
(172, 3),
(173, 3),
(174, 3),
(176, 3),
(177, 3),
(178, 3),
(179, 3),
(180, 3),
(182, 3),
(183, 3),
(184, 3),
(185, 3),
(186, 3),
(188, 3),
(189, 3),
(190, 3),
(191, 3),
(192, 3),
(194, 3),
(195, 3),
(196, 3),
(197, 3),
(198, 3),
(200, 3),
(201, 3),
(202, 3),
(203, 3),
(204, 3),
(206, 3),
(207, 3),
(208, 3),
(209, 3),
(210, 3),
(212, 3),
(213, 3),
(214, 3),
(215, 3),
(216, 3),
(218, 3),
(219, 3),
(220, 3),
(221, 3),
(222, 3),
(224, 3),
(225, 3),
(226, 3),
(227, 3),
(228, 3),
(35, 4),
(57, 4),
(59, 4),
(75, 4),
(77, 4),
(78, 4),
(104, 4),
(105, 4),
(107, 4),
(207, 4),
(209, 4),
(35, 5),
(50, 5),
(51, 5),
(53, 5),
(54, 5),
(56, 5),
(57, 5),
(59, 5),
(60, 5),
(80, 5),
(81, 5),
(83, 5),
(84, 5),
(86, 5),
(87, 5),
(89, 5),
(90, 5),
(92, 5),
(93, 5),
(95, 5),
(96, 5),
(110, 5),
(111, 5),
(113, 5),
(114, 5),
(116, 5),
(117, 5),
(119, 5),
(120, 5),
(122, 5),
(123, 5),
(125, 5),
(126, 5),
(128, 5),
(129, 5),
(131, 5),
(132, 5),
(134, 5),
(135, 5),
(137, 5),
(138, 5),
(140, 5),
(141, 5),
(143, 5),
(144, 5),
(146, 5),
(147, 5),
(149, 5),
(150, 5),
(152, 5),
(153, 5),
(155, 5),
(156, 5),
(158, 5),
(159, 5),
(161, 5),
(162, 5),
(164, 5),
(165, 5),
(167, 5),
(168, 5),
(170, 5),
(171, 5),
(173, 5),
(174, 5),
(176, 5),
(177, 5),
(179, 5),
(180, 5),
(182, 5),
(183, 5),
(185, 5),
(186, 5),
(224, 5),
(225, 5),
(227, 5),
(35, 6),
(47, 6),
(53, 6),
(59, 6),
(65, 6),
(71, 6),
(77, 6),
(83, 6),
(89, 6),
(95, 6),
(101, 6),
(107, 6),
(113, 6),
(119, 6),
(125, 6),
(131, 6),
(137, 6),
(143, 6),
(149, 6),
(155, 6),
(161, 6),
(167, 6),
(173, 6),
(179, 6),
(185, 6),
(191, 6),
(197, 6),
(203, 6),
(209, 6),
(215, 6),
(221, 6),
(227, 6);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_alt_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `custom_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_window` tinyint(4) DEFAULT NULL,
  `gallery` text COLLATE utf8mb4_unicode_ci,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_iframe` text COLLATE utf8mb4_unicode_ci,
  `page_title` text COLLATE utf8mb4_unicode_ci,
  `seo_title` text COLLATE utf8mb4_unicode_ci,
  `seo_keywords` text COLLATE utf8mb4_unicode_ci,
  `seo_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_category_id`, `title`, `slug`, `sub_title`, `icon`, `image`, `image_alt_text`, `short_description`, `description`, `custom_url`, `new_window`, `gallery`, `video_url`, `video_iframe`, `page_title`, `seo_title`, `seo_keywords`, `seo_description`, `created_at`, `updated_at`) VALUES
(6, 3, 'Swimming Pool', NULL, NULL, NULL, 'p1dgq1aey.png', 'Swimming Pool', '<p>The swimming pool is a key infrastructure within our educational institution, providing a full range of aquatic activities for students and staff. It is a pristine facility that is regularly maintained to ensure a clean and safe environment for all. The pool offers opportunities for beginners and experienced swimmers alike to refine their skills and stay physically fit.</p>', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-04 23:56:40', '2023-05-05 00:00:04'),
(7, 3, 'Table Tennis', NULL, NULL, NULL, 'isxp8ryft.png', 'Table Tennis', '<p>The table tennis facility is a valuable resource for students and staff, providing a dedicated space for indoor play. The facility is carefully maintained to ensure a safe and clean environment, allowing students to enhance their hand-eye coordination, reflexes, and physical fitness.</p>', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-04 23:58:32', '2023-05-04 23:58:32'),
(8, 3, 'Volleyball', NULL, NULL, NULL, 'ec0czluyl.png', NULL, '<p>Our school boasts a well-maintained volleyball court, providing students and staff with an ideal space to engage in this popular sport. The court is designed to provide a safe and challenging environment that enables students to enhance their coordination, teamwork, and physical fitness. Volleyball is a popular activity among our students, and the court is often buzzing with activity as students engage in friendly competition or participate in physical education classes.</p>', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-05 00:02:22', '2023-05-05 00:02:23'),
(9, 3, 'Skating', NULL, NULL, NULL, 'hsqlp2akm.jpg', NULL, '<p>Our school also provides a designated space for students to skate, offering them an opportunity to develop their skating skills while staying physically active. The basketball court is transformed into a skating area, where students can skate freely and safely under the supervision of the school staff.</p>', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-05 00:03:34', '2023-05-06 06:26:08'),
(10, 3, 'Library', NULL, NULL, NULL, '6hd14qd7i.png', NULL, '<p>Our library is more than just a book lending centre. Whether the students are looking for a quiet spot to study, a place to explore new ideas, or resources to complete their assignments, our library has them covered.</p>', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-05 00:04:09', '2023-05-05 00:04:10'),
(11, 3, 'Computer Lab', NULL, NULL, NULL, 'rsmgoww0y.jpg', NULL, '<p>Our school&#39;s computer lab is a hub for digital innovation and creativity. Equipped with the latest technology and software, our lab provides a platform for learning, exploring and creating. Our knowledgeable staff are always available to offer guidance and support. From coding to digital learning, our lab has everything required to pursue the interests and hone the skills of the students.</p>', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-05 00:05:14', '2023-05-06 06:26:33'),
(12, 3, 'Science Lab', NULL, NULL, NULL, '51fn4lejp.jpg', NULL, '<p>Our lab is fully equipped with state-of-the-art technology, tools, and resources to help students learn and conduct hands-on experiments. Our knowledgeable staff are always available to guide and assist them.</p>', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-05 00:06:30', '2023-05-06 06:27:00'),
(13, 3, 'Smart class', NULL, NULL, NULL, 'e44ywav9n.jpg', NULL, '<p>Our school is equipped with all smart class that makes learning super easy and fun. With interactive tools and digital resources, the students will understand even the most complex concepts in no time. Our teachers are top-notch and make the classes engaging and interactive, inspiring you to excel in your studies.</p>', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-05 00:07:42', '2023-05-06 06:16:30'),
(14, 3, 'Shuttle Court', NULL, NULL, NULL, 'i32mslvaj.jpg', 'Shuttle Court', '<p>The shuttle court is a prized infrastructure to our educational institution, providing a dedicated space for students and staff to engage in badminton, a popular and challenging sport. The court is meticulously maintained to ensure a safe and competitive environment, where students can hone their skills, improve their agility, and strengthen their physical fitness. Our school is proud to offer such a first-rate shuttle court that is used for a variety of activities, including physical education classes, intramural competitions, and school-wide events.</p>', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-06 06:14:21', '2023-05-06 06:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

CREATE TABLE `service_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_alt_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `tagline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_categories`
--

INSERT INTO `service_categories` (`id`, `name`, `display_name`, `image`, `image_alt_text`, `icon`, `description`, `tagline`, `created_at`, `updated_at`) VALUES
(3, 'Amenities', '<span>Our</span>Amenities', 'paxzlpg6r.webp', NULL, NULL, NULL, NULL, '2023-05-04 03:52:02', '2023-05-04 06:55:56');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tagline` text COLLATE utf8mb4_unicode_ci,
  `button_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish` tinyint(4) NOT NULL DEFAULT '1',
  `position` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `title`, `tagline`, `button_name`, `button_url`, `publish`, `position`, `created_at`, `updated_at`) VALUES
(12, '106pgddjs.jpg', 'Welcome to  <br>Green City Em School', 'Green City Em Shool Visakhapatnam is an international day and boarding school located in a Steel city.\r\nOur state-of-the-art campus and amenities make the perfect home away from', 'Read More', '#', 1, 0, '2022-12-01 22:17:35', '2023-05-06 00:22:22');

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sponsor_category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish` tinyint(4) NOT NULL DEFAULT '1',
  `position` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`id`, `sponsor_category_id`, `title`, `image`, `url`, `publish`, `position`, `created_at`, `updated_at`) VALUES
(1, 1, 'M', 'bpw1ezma9.png', '#', 1, 0, '2023-03-20 03:35:55', '2023-03-20 03:35:55'),
(2, 1, 'A', '9fal60pe3.png', '#', 1, 0, '2023-03-20 03:36:08', '2023-03-20 03:36:08'),
(3, 1, 'B', '1h8x7vwxg.png', '#', 1, 0, '2023-03-20 03:36:23', '2023-03-20 03:36:23'),
(4, 1, 'B0', 'db7ll0s05.png', '#', 1, 0, '2023-03-20 03:37:03', '2023-03-20 03:37:03'),
(5, 1, 'aws', 'bz5vhwsmr.png', '#', 1, 0, '2023-03-20 03:37:15', '2023-03-20 03:37:15');

-- --------------------------------------------------------

--
-- Table structure for table `sponsor_categories`
--

CREATE TABLE `sponsor_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` tinyint(4) NOT NULL DEFAULT '1',
  `position` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sponsor_categories`
--

INSERT INTO `sponsor_categories` (`id`, `category_name`, `publish`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Sponsors', 1, 0, '2022-12-09 21:22:11', '2022-12-12 18:47:14'),
(2, 'Media Partners', 1, 0, '2022-12-11 17:05:37', '2022-12-11 17:05:37');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `transaction_date` date DEFAULT NULL,
  `payment_method_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `event_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_comment` text COLLATE utf8mb4_unicode_ci,
  `user_comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `event_registration_id` bigint(20) UNSIGNED DEFAULT NULL,
  `donation_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `reference`, `transaction_id`, `amount`, `transaction_date`, `payment_method_id`, `payment_status`, `bank_name`, `cheque_no`, `cheque_date`, `cheque_amount`, `user_id`, `event_id`, `admin_comment`, `user_comment`, `created_at`, `updated_at`, `event_registration_id`, `donation_id`) VALUES
(36, 'membership', 'N/A', 1000, NULL, 2, 'Success', 'Chase Quick Pay', NULL, '2016-04-04 00:00:00', '1116', 10042, NULL, 'SRINI PEDAMALLU SENDER CAA CIE ID: T941687665	', NULL, NULL, '2017-03-04 21:36:00', NULL, NULL),
(38, 'membership', 'N/A', 1000, NULL, 2, 'Success', 'Bank Of America', '1109', '2016-04-04 00:00:00', '1116', 20092, NULL, 'CAA- One of Founder', NULL, NULL, '2017-03-18 08:26:56', NULL, NULL),
(46, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20131, NULL, NULL, NULL, NULL, '2020-01-26 14:40:02', NULL, NULL),
(49, 'membership', '84L71448XM3448513', NULL, NULL, 3, 'Success', 'Paypal', NULL, '2016-10-10 00:00:00', '500', 20134, NULL, 'Sairavi Suribhotla sent you $500.00 USD- BOD Donation. Needs to collect remaining $500 towards Life Member', 'Paid the remaining $500 on 12/26/2018.', NULL, '2019-05-31 12:44:03', NULL, NULL),
(53, 'membership', 'N/A', NULL, NULL, 2, 'Success', 'JPM Chase', NULL, '2016-03-28 00:00:00', '1116', 20138, NULL, 'Check number', NULL, NULL, '2019-03-16 20:40:27', NULL, NULL),
(59, 'membership', 'N/A', NULL, NULL, 2, 'Success', 'DCU', '121', '2022-01-22 00:00:00', '100', 20144, NULL, NULL, NULL, NULL, '2022-01-22 13:47:42', NULL, NULL),
(62, 'membership', 'N/A', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20147, NULL, NULL, 'harinimeda@gmail.com', NULL, '2022-12-11 10:52:37', NULL, NULL),
(65, 'membership', '333277504', NULL, NULL, 2, 'Success', 'Chase', NULL, NULL, NULL, 20150, NULL, '333277504 - Chase QuickPay $566', NULL, NULL, '2021-01-03 13:41:56', NULL, NULL),
(69, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20154, NULL, NULL, 'stellapragada@gmail.com', NULL, '2022-07-06 15:11:46', NULL, NULL),
(74, 'membership', 'N/A', 1000, NULL, 2, 'Success', 'Chase', '131', '2016-03-19 00:00:00', '1116', 20159, NULL, 'One if the Founder', NULL, NULL, '2017-01-28 11:34:49', NULL, NULL),
(77, 'membership', 'N/A', NULL, NULL, 2, 'Success', 'Chase', '945', '2017-03-18 00:00:00', '300', 20162, NULL, 'Remaining $700 required to collect upcoming years to consider for Life membership', NULL, NULL, '2019-03-16 20:39:22', NULL, NULL),
(85, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, ' ', NULL, NULL, 20170, NULL, NULL, NULL, NULL, '2020-02-16 19:03:25', NULL, NULL),
(88, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, 'Paypal', NULL, '97.3', 20173, NULL, NULL, NULL, NULL, '2022-11-21 08:54:45', NULL, NULL),
(89, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20174, NULL, NULL, '$100', NULL, '2022-01-07 11:05:40', NULL, NULL),
(94, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, '1270', '2018-09-29 00:00:00', '900', 20179, NULL, 'Evergreen Software Solutions Inc', NULL, NULL, '2019-03-14 18:47:25', NULL, NULL),
(117, 'membership', 'N/A', 1000, NULL, 2, 'Success', 'JPMorgan Chase', '2221', '2016-03-20 00:00:00', '1116', 20202, NULL, 'CAA- One if the Founder', NULL, NULL, '2017-03-18 08:30:31', NULL, NULL),
(118, 'membership', '4BA06131GG996163B', 80, '2023-01-29', 4, 'Success', NULL, NULL, NULL, NULL, 20203, NULL, NULL, NULL, '2022-01-08 10:33:28', '2023-01-29 15:02:33', NULL, NULL),
(119, 'membership', 'N/A', 1000, NULL, 2, 'Success', 'Old Second National Bank', '3840', '2016-06-04 00:00:00', '500', 20204, NULL, 'Still we expect $500 towards Life Member as discussed', NULL, NULL, '2017-03-17 21:21:22', NULL, NULL),
(122, 'membership', '85321764PR3418940', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20207, NULL, NULL, NULL, NULL, '2021-04-12 15:56:02', NULL, NULL),
(125, 'membership', '9M42071588109641G', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20210, NULL, NULL, NULL, NULL, '2022-11-21 08:58:21', NULL, NULL),
(140, 'membership', '7WM134005J7118602', NULL, NULL, 3, 'Success', NULL, NULL, '2017-03-18 00:00:00', '1000', 20225, NULL, 'Paid via Credit card at  at 2017 Anniversary Function', NULL, NULL, '2022-07-06 14:13:32', NULL, NULL),
(142, 'membership', 'N/A', NULL, NULL, 2, 'Success', 'DCU', '1203', '2016-05-07 00:00:00', '1116', 20227, NULL, 'One of the Founder', NULL, NULL, '2020-02-13 15:39:01', NULL, NULL),
(143, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20228, NULL, NULL, 'Paid $60', NULL, '2022-01-15 10:29:56', NULL, NULL),
(144, 'membership', '1FU5736279402351C', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20229, NULL, NULL, NULL, NULL, '2019-04-08 19:28:26', NULL, NULL),
(145, 'membership', '5647851854', 1000, NULL, 2, 'Success', 'Chase Quick Pay', 'Chase Quick Pay', '2016-09-09 00:00:00', '1000', 20230, NULL, 'ITSAJ TECH-SOL INC.', NULL, NULL, '2017-01-28 11:53:51', NULL, NULL),
(152, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20237, NULL, 'Founder-Life', NULL, NULL, '2019-07-14 11:05:02', NULL, NULL),
(156, 'membership', 'N/A', NULL, NULL, 2, 'Success', 'Chase', '7339', '2019-09-09 00:00:00', '900', 20241, NULL, NULL, 'Converted Annual membership to life membership on 9/9/19', NULL, '2019-09-14 10:07:54', NULL, NULL),
(158, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20243, NULL, NULL, '$80 Zelle payment on 1/5/2022', NULL, '2022-01-06 12:44:21', NULL, NULL),
(170, 'membership', 'N/A', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20255, NULL, NULL, NULL, NULL, '2022-01-27 09:57:31', NULL, NULL),
(173, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, '2019-11-25 00:00:00', '1116', 20258, NULL, NULL, NULL, NULL, '2020-01-31 00:33:56', NULL, NULL),
(181, 'membership', 'N/A', NULL, NULL, 3, 'Success', NULL, NULL, NULL, '97.3', 20266, NULL, NULL, NULL, NULL, '2022-07-08 19:59:35', NULL, NULL),
(182, 'membership', 'N/A', NULL, NULL, 2, 'Success', 'BOA', 'Quickpay', '2019-01-12 00:00:00', '100', 20267, NULL, NULL, NULL, NULL, '2019-06-20 22:19:09', NULL, NULL),
(184, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20269, NULL, NULL, 'Ref: PNC088052822', NULL, '2022-01-15 19:47:28', NULL, NULL),
(187, 'membership', 'N/A', NULL, NULL, 2, 'Success', 'Chase', '605', '2019-01-05 00:00:00', '100', 20272, NULL, NULL, NULL, NULL, '2019-01-20 21:29:54', NULL, NULL),
(191, 'membership', 'N/A', NULL, NULL, 3, 'Success', NULL, 'Paypal', NULL, NULL, 20276, NULL, NULL, NULL, NULL, '2019-02-07 15:15:47', NULL, NULL),
(193, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20278, NULL, NULL, NULL, NULL, '2020-12-31 12:51:57', NULL, NULL),
(201, 'membership', 'N/A', NULL, NULL, 2, 'Success', 'Bank of America', '2023', '2017-01-27 00:00:00', '300', 20286, NULL, 'Remaining $700 required to collect upcoming years to consider for Life Member', NULL, NULL, '2017-06-16 20:31:07', NULL, NULL),
(204, 'membership', 'N/A', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20289, NULL, NULL, NULL, NULL, '2019-01-20 17:19:09', NULL, NULL),
(207, 'membership', '1BC29137Y04376512', 83, '2022-01-24', 3, 'Success', NULL, NULL, NULL, NULL, 20292, NULL, NULL, NULL, '2022-01-24 02:25:15', '2022-01-24 09:25:31', NULL, NULL),
(222, 'membership', '7WS50317CP1444014', 103, '2022-01-09', 3, 'Success', NULL, NULL, NULL, NULL, 20307, NULL, NULL, NULL, '2022-01-09 10:40:41', '2022-01-10 02:37:28', NULL, NULL),
(226, 'membership', 'N/A', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20311, NULL, NULL, NULL, NULL, '2019-01-20 17:34:29', NULL, NULL),
(268, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20353, NULL, NULL, '$100 paid', NULL, '2022-01-13 13:38:42', NULL, NULL),
(279, 'membership', 'BACPA94J5O6A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20364, NULL, NULL, '$10 at Chess +$90 on 3/17/22', NULL, '2022-03-17 08:52:29', NULL, NULL),
(303, 'membership', '2HF86015BK2634531', 63, '2022-01-13', 3, 'Success', NULL, NULL, NULL, NULL, 20388, NULL, NULL, NULL, '2022-01-13 06:16:43', '2022-01-13 13:16:58', NULL, NULL),
(313, 'membership', 'N/A', NULL, NULL, 2, 'Success', 'Bank of America', '1250', '2019-01-10 00:00:00', '100', 20398, NULL, NULL, NULL, NULL, '2019-01-20 17:30:07', NULL, NULL),
(321, 'membership', '64W35426AX8591007', 103, '2022-01-15', 3, 'Success', NULL, NULL, NULL, NULL, 20406, NULL, NULL, NULL, '2022-01-15 13:18:58', '2022-01-15 20:19:14', NULL, NULL),
(326, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20411, NULL, NULL, '$80 paid', NULL, '2022-11-09 18:12:05', NULL, NULL),
(332, 'membership', 'N/A', 1000, NULL, 2, 'Success', 'Chase - Cash', 'Cash', '2016-05-19 00:00:00', '1116', 20417, NULL, 'One of the founder', 'Deposited by Raghav Jatla', NULL, '2017-01-28 11:51:15', NULL, NULL),
(344, 'membership', '1N919369WR0725426', 103, '2022-02-10', 3, 'Success', NULL, NULL, NULL, NULL, 20429, NULL, NULL, NULL, '2022-02-10 15:34:56', '2022-02-10 22:35:13', NULL, NULL),
(371, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, '100', 10086, NULL, 'Check is with Sundar garu. BOD 2018-2021. Paid via PayPal with srikrishnam@hotmail.com and Tr ID: 7SV31269LJ912530U', NULL, NULL, '2022-11-02 16:58:08', NULL, NULL),
(373, 'membership', 'N/A', 1000, NULL, 2, 'Success', 'State Bank of India', NULL, '2016-03-28 00:00:00', '1116', 10032, NULL, 'One if the Founder', NULL, NULL, '2017-01-28 11:31:48', NULL, NULL),
(389, 'membership', '7WD55543YM9923225', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20101, NULL, NULL, NULL, NULL, '2021-01-15 11:46:48', NULL, NULL),
(412, 'membership', '4B836659FG9468712', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20511, NULL, NULL, NULL, NULL, '2022-04-24 07:21:30', NULL, NULL),
(415, 'membership', '1KM37435WF644272L', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20517, NULL, NULL, NULL, NULL, '2021-01-15 11:51:48', NULL, NULL),
(416, 'membership', 'N/A', 1000, NULL, 2, 'Success', 'Associated Bank', '6564', '2016-05-05 00:00:00', '1116', 20518, NULL, 'One if the Founder', NULL, NULL, '2017-01-28 11:22:27', NULL, NULL),
(418, 'membership', '82D44738AD1484010', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20520, NULL, NULL, NULL, NULL, '2021-10-31 09:46:17', NULL, NULL),
(428, 'membership', 'N/A', 1000, NULL, 2, 'Success', 'Home Star', '2322', '2016-10-01 00:00:00', '1000', 10062, NULL, NULL, NULL, NULL, '2017-03-18 08:58:35', NULL, NULL),
(434, 'membership', 'BACot30un7s3', 100, '2023-01-30', 4, 'Success', NULL, NULL, NULL, NULL, 20521, NULL, NULL, NULL, NULL, '2023-01-30 17:08:44', NULL, NULL),
(435, 'membership', 'H50158979312', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20547, NULL, NULL, 'Paid $60', NULL, '2022-01-18 13:57:18', NULL, NULL),
(436, 'membership', 'N/A', NULL, NULL, 2, 'Success', 'Chase', NULL, NULL, NULL, 20548, NULL, NULL, NULL, NULL, '2021-01-15 11:43:43', NULL, NULL),
(440, 'membership', 'N/A', NULL, NULL, 2, 'Success', 'Bank of America', '3183068', '2019-11-06 00:00:00', '1000', 20552, NULL, NULL, NULL, NULL, '2019-12-01 18:14:04', NULL, NULL),
(444, 'membership', '1DL06536UR741080U', 103, '2022-01-09', 3, 'Success', NULL, NULL, NULL, NULL, 20556, NULL, NULL, NULL, '2022-01-09 08:32:35', '2022-01-09 15:32:50', NULL, NULL),
(446, 'membership', '1EU79725BV3813040', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20558, NULL, NULL, NULL, NULL, '2020-01-03 19:59:24', NULL, NULL),
(448, 'membership', '73D04991M7486303D', NULL, NULL, 3, 'Success', 'Paypal', 'Receipt No: 0208-5793-9780-8919', '2017-12-27 00:00:00', '1000', 20560, NULL, 'INV2-UNRN-5BVP-BFQL-PVKW\n22040610RS6797610 - Rao R Baddi - $100 / Dec 27, 2017 13:47:47 CST\nTransaction ID: 73D04991M7486303D  dated 12/27/2017 $900\n \n\n\n', NULL, NULL, '2017-12-27 19:19:34', NULL, NULL),
(450, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20562, NULL, NULL, '$100 paid', NULL, '2022-01-11 15:53:22', NULL, NULL),
(454, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, '100', 20565, NULL, NULL, '$15 cash + $85 check', NULL, '2019-01-21 11:17:15', NULL, NULL),
(455, 'membership', '04L76898WH719634W', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 10067, NULL, NULL, '$100 thru Paypal', NULL, '2022-11-08 21:11:13', NULL, NULL),
(457, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20567, NULL, NULL, NULL, NULL, '2022-01-09 12:41:50', NULL, NULL),
(458, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20568, NULL, NULL, NULL, NULL, '2022-11-03 19:59:06', NULL, NULL),
(459, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20569, NULL, NULL, 'Zelle paid $103', NULL, '2022-01-08 14:59:59', NULL, NULL),
(460, 'membership', 'N/A', NULL, NULL, 2, 'Success', 'cheque', NULL, '2018-05-19 00:00:00', '100', 20570, NULL, NULL, NULL, NULL, '2018-06-04 16:36:30', NULL, NULL),
(465, 'membership', '2FA58039MY505201X', NULL, NULL, 3, 'Success', NULL, NULL, NULL, '100', 20575, NULL, NULL, NULL, NULL, '2019-04-08 14:44:42', NULL, NULL),
(469, 'membership', '2U5731177K319233T', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20579, NULL, NULL, NULL, NULL, '2020-12-31 12:18:03', NULL, NULL),
(472, 'membership', '927685696U182605Y', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20097, NULL, NULL, NULL, NULL, '2021-11-13 11:38:24', NULL, NULL),
(473, 'membership', '5K596941DK659950A', 103, '2022-01-09', 3, 'Success', NULL, NULL, NULL, NULL, 20582, NULL, NULL, NULL, '2022-01-09 11:11:49', '2022-01-09 18:12:57', NULL, NULL),
(474, 'membership', '9VT48226SP5593928', 103, '2022-01-15', 3, 'Success', NULL, NULL, NULL, NULL, 20583, NULL, NULL, NULL, '2022-01-15 03:04:32', '2022-01-15 10:04:40', NULL, NULL),
(475, 'membership', '25436506RJ726182R', 103, '2022-01-09', 3, 'Success', NULL, NULL, NULL, NULL, 20584, NULL, NULL, NULL, '2022-01-09 02:38:27', '2022-01-09 09:38:36', NULL, NULL),
(485, 'membership', '5648965393', NULL, NULL, 2, 'Success', 'Chase QuickPay', 'sreeni@snsofttech.com', '2016-09-08 00:00:00', '500', 20600, NULL, 'Still needs $500 to convert into Life Member ', NULL, NULL, '2020-01-26 14:40:56', NULL, NULL),
(486, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20603, NULL, NULL, NULL, NULL, '2019-01-20 15:25:01', NULL, NULL),
(488, 'membership', '13682683353', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20605, NULL, NULL, NULL, NULL, '2022-02-16 12:57:03', NULL, NULL),
(497, 'membership', 'N/A', NULL, NULL, 2, 'Success', 'Cash', NULL, NULL, '100', 20614, NULL, 'Paid Cash at 2019 Palle Sambaralu', NULL, NULL, '2019-02-07 15:13:30', NULL, NULL),
(499, 'membership', '5A377247M24776838', 103, '2022-01-14', 3, 'Success', NULL, NULL, NULL, NULL, 20616, NULL, NULL, NULL, '2022-01-14 09:05:01', '2022-01-14 16:05:10', NULL, NULL),
(504, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20621, NULL, NULL, 'Paid $700.00 on 11/22/2021', NULL, '2022-01-06 13:00:51', NULL, NULL),
(522, 'membership', 'N/A', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20641, NULL, NULL, NULL, NULL, '2021-11-13 11:39:05', NULL, NULL),
(545, 'membership', 'N/A', NULL, NULL, 2, 'Success', 'Chase', '1234', '2019-04-04 00:00:00', NULL, 20665, NULL, 'Paid with Chase QuickPay', NULL, NULL, '2019-04-08 09:23:10', NULL, NULL),
(546, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, '123', NULL, '1000', 20666, NULL, NULL, NULL, NULL, '2019-10-18 13:30:26', NULL, NULL),
(551, 'membership', '953440968U007793T', NULL, NULL, 3, 'Success', NULL, NULL, '2017-03-18 00:00:00', '1000', 20671, NULL, 'Invoice ID: INV2-X5XZ-EUGD-A8X4-MNBJ\n', NULL, NULL, '2017-10-14 09:09:47', NULL, NULL),
(553, 'membership', '0TS209934U837304A', 103, '2019-01-09', 3, 'Success', NULL, NULL, NULL, NULL, 20673, NULL, NULL, NULL, '2019-01-09 04:53:42', '2019-01-09 11:53:50', NULL, NULL),
(559, 'membership', 'N/A', NULL, NULL, 3, 'Success', NULL, NULL, NULL, '97.3', 20683, NULL, NULL, NULL, NULL, '2018-02-15 12:14:02', NULL, NULL),
(561, 'membership', 'N/A', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20685, NULL, NULL, NULL, NULL, '2019-02-07 15:04:49', NULL, NULL),
(562, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, '1357', '2019-01-12 00:00:00', '100', 20686, NULL, NULL, NULL, NULL, '2019-02-07 15:10:39', NULL, NULL),
(563, 'membership', 'N/A', NULL, NULL, 2, 'Success', 'Chase', '1263', NULL, NULL, 20687, NULL, NULL, NULL, NULL, '2022-07-06 15:10:53', NULL, NULL),
(564, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20688, NULL, NULL, NULL, NULL, '2019-12-08 11:55:26', NULL, NULL),
(565, 'membership', 'N/A', 1030, '2023-01-25', 2, 'Success', NULL, NULL, NULL, '1030', 20689, NULL, NULL, NULL, NULL, '2023-01-25 23:38:34', NULL, NULL),
(568, 'membership', '2KX59102PB567563V', NULL, NULL, 3, 'Success', 'Chase', NULL, NULL, NULL, 20692, NULL, NULL, 'Paid $900 with QuickPay.', NULL, '2019-10-27 13:57:16', NULL, NULL),
(571, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, '100', 20695, NULL, '$100 paid through QuickPay', NULL, NULL, '2019-02-07 16:09:20', NULL, NULL),
(572, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20696, NULL, 'Paid $100 with QuickPay', NULL, NULL, '2019-02-07 18:15:04', NULL, NULL),
(573, 'membership', 'N/A', NULL, NULL, 3, 'Success', NULL, NULL, NULL, '300', 20697, NULL, NULL, NULL, NULL, '2022-12-11 10:50:43', NULL, NULL),
(576, 'membership', '7HN12960K0692125C', 103, '2022-01-07', 3, 'Success', NULL, NULL, NULL, NULL, 20700, NULL, NULL, NULL, '2022-01-07 07:52:14', '2022-01-07 14:52:37', NULL, NULL),
(577, 'membership', 'BACCGH51NKRC', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20701, NULL, NULL, 'Zelle pay $100 on 11/29/22.', NULL, '2022-11-29 17:42:40', NULL, NULL),
(579, 'membership', 'N/A', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20703, NULL, NULL, NULL, NULL, '2021-10-03 07:40:04', NULL, NULL),
(580, 'membership', 'XNLCB91S', NULL, NULL, 3, 'Success', NULL, NULL, '2017-11-16 00:00:00', '97.3', 20704, NULL, NULL, NULL, NULL, '2019-01-20 14:28:36', NULL, NULL),
(581, 'membership', '1EF68642CR840822U', NULL, NULL, 3, 'Success', NULL, NULL, NULL, '97.3', 20705, NULL, NULL, NULL, NULL, '2018-02-19 17:18:50', NULL, NULL),
(584, 'membership', '0JM962713A754241E', NULL, NULL, 3, 'Success', NULL, NULL, NULL, '964.85', 20708, NULL, 'Paid with credit card on 10/13/18.', NULL, NULL, '2019-03-14 18:42:19', NULL, NULL),
(589, 'membership', 'N/A', NULL, NULL, 2, 'Success', 'CHASE', '1230', NULL, '80', 20713, NULL, NULL, NULL, NULL, '2022-11-08 11:12:11', NULL, NULL),
(592, 'membership', '5BH66072180947051', NULL, NULL, 3, 'Success', NULL, NULL, NULL, '97.3', 20714, NULL, NULL, NULL, NULL, '2018-02-19 17:33:12', NULL, NULL),
(599, 'membership', '4R101288HX040070E', 103, '2022-01-14', 3, 'Success', NULL, NULL, NULL, NULL, 20721, NULL, NULL, NULL, '2022-01-14 02:19:18', '2022-01-14 09:19:33', NULL, NULL),
(603, 'membership', '8AF520745Y674315N', 103, '2022-01-06', 3, 'Success', NULL, NULL, NULL, NULL, 20727, NULL, NULL, NULL, '2022-01-06 17:37:13', '2022-01-07 00:37:29', NULL, NULL),
(605, 'membership', '6HA33738G21672821', 103, '2019-01-12', 3, 'Success', NULL, NULL, NULL, NULL, 20729, NULL, NULL, NULL, '2019-01-12 08:34:50', '2019-01-12 15:35:01', NULL, NULL),
(607, 'membership', '4KH16812BY936841K', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20731, NULL, NULL, NULL, NULL, '2020-12-31 12:00:06', NULL, NULL),
(611, 'membership', '4A279185GD637942F', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20735, NULL, NULL, NULL, NULL, '2020-12-31 11:57:43', NULL, NULL),
(612, 'membership', '31818626PH584300Y', 100, '2023-01-30', 3, 'Success', NULL, 'Cash', NULL, '100', 20737, NULL, NULL, NULL, NULL, '2023-01-30 00:27:27', NULL, NULL),
(613, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20738, NULL, NULL, NULL, NULL, '2020-05-04 18:33:59', NULL, NULL),
(616, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, '100', 20743, NULL, NULL, NULL, NULL, '2022-01-09 17:23:48', NULL, NULL),
(619, 'membership', 'N/A', NULL, NULL, 2, 'Success', 'Chase', '143', '2020-01-04 00:00:00', '100', 20745, NULL, NULL, NULL, NULL, '2020-12-31 11:55:20', NULL, NULL),
(622, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20747, NULL, NULL, '$103 Paid', NULL, '2022-11-03 19:56:11', NULL, NULL),
(624, 'membership', 'N/A', NULL, NULL, 3, 'Success', 'Paypal', NULL, NULL, '97.3', 20749, NULL, 'Paid 10/13/18', NULL, NULL, '2019-06-12 16:05:20', NULL, NULL),
(632, 'membership', 'N/A', NULL, NULL, 2, 'Success', 'TCF National Banak', '1594', '2021-01-14 00:00:00', '1000', 20757, NULL, NULL, NULL, NULL, '2021-04-04 16:22:16', NULL, NULL),
(633, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, '2003', NULL, '1000', 20758, NULL, NULL, NULL, NULL, '2018-06-05 14:02:53', NULL, NULL),
(635, 'membership', '44460827HJ3955309', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20761, NULL, 'Renewed on 1/15/21 via QuickPay', NULL, NULL, '2021-01-17 13:16:38', NULL, NULL),
(639, 'membership', '9MP9657761495110K', 103, '2022-01-09', 3, 'Success', NULL, NULL, NULL, NULL, 20766, NULL, NULL, NULL, '2022-01-09 06:03:48', '2022-01-09 13:04:05', NULL, NULL),
(643, 'membership', 'Zelle USBGFPW9ICUU', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20770, NULL, NULL, NULL, NULL, '2022-05-03 09:48:41', NULL, NULL),
(644, 'membership', 'N/A', NULL, NULL, 3, 'Success', NULL, NULL, NULL, '97', 20771, NULL, 'Paid 10/13/18', NULL, NULL, '2018-10-25 19:32:56', NULL, NULL),
(645, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20772, NULL, NULL, NULL, NULL, '2021-10-03 15:10:46', NULL, NULL),
(646, 'membership', '67Y29609YU383971R', 103, '2022-01-13', 3, 'Success', NULL, NULL, NULL, NULL, 20773, NULL, NULL, NULL, '2022-01-13 05:44:01', '2022-01-13 12:44:10', NULL, NULL),
(648, 'membership', '1HS49236XG9504300', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20775, NULL, NULL, NULL, NULL, '2022-04-22 08:52:28', NULL, NULL),
(649, 'membership', '0AV58350P58793439', 103, '2022-01-09', 3, 'Success', NULL, NULL, NULL, NULL, 20776, NULL, NULL, NULL, '2022-01-09 08:45:38', '2022-01-09 15:45:54', NULL, NULL),
(650, 'membership', 'N/A', NULL, NULL, 3, 'Success', NULL, NULL, NULL, '97.3', 20777, NULL, 'Paid 10/13/18', NULL, NULL, '2018-10-25 19:02:28', NULL, NULL),
(652, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20779, NULL, NULL, '$100', NULL, '2022-01-09 15:03:18', NULL, NULL),
(653, 'membership', '91440062V2667210E', 103, '2022-01-09', 3, 'Success', NULL, NULL, NULL, NULL, 20780, NULL, NULL, NULL, '2022-01-09 08:11:22', '2022-01-09 15:11:38', NULL, NULL),
(654, 'membership', '85J20672WY111422F', 103, '2022-01-11', 3, 'Success', NULL, NULL, NULL, NULL, 20782, NULL, NULL, NULL, '2022-01-11 03:46:29', '2022-01-11 10:46:44', NULL, NULL),
(656, 'membership', '8EG27453YN081421T', 103, '2022-01-09', 3, 'Success', NULL, NULL, NULL, NULL, 20785, NULL, NULL, NULL, '2022-01-09 03:09:19', '2022-01-09 10:09:39', NULL, NULL),
(657, 'membership', '9WE05816AH965405J', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20786, NULL, NULL, NULL, NULL, '2022-12-11 10:51:17', NULL, NULL),
(659, 'membership', 'N/A', NULL, NULL, 3, 'Success', NULL, NULL, NULL, '97.3', 20784, NULL, NULL, NULL, NULL, '2019-01-10 10:48:19', NULL, NULL),
(660, 'membership', '7S761892F36020038', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20788, NULL, NULL, NULL, NULL, '2020-12-31 11:46:04', NULL, NULL),
(661, 'membership', '3D014163P16952649', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20789, NULL, NULL, NULL, NULL, '2020-12-31 11:45:16', NULL, NULL),
(662, 'membership', 'N/A', NULL, NULL, 2, 'Success', 'PNC Bank', '3248', NULL, '100', 20791, NULL, NULL, NULL, NULL, '2019-05-20 15:30:22', NULL, NULL),
(663, 'membership', '6PC87372XK782321D', 103, '2019-01-12', 3, 'Success', NULL, NULL, NULL, NULL, 20793, NULL, NULL, NULL, '2019-01-12 02:57:17', '2019-01-14 10:38:25', NULL, NULL),
(664, 'membership', '3WP40185YS5852834', 83, '2022-10-29', 3, 'Success', NULL, NULL, NULL, NULL, 20794, NULL, NULL, NULL, '2022-10-29 00:12:45', '2022-10-29 07:13:02', NULL, NULL),
(665, 'membership', '7FK727089B221914U', 103, '2019-01-12', 3, 'Success', NULL, NULL, NULL, NULL, 20796, NULL, NULL, NULL, '2019-01-12 05:12:42', '2019-01-12 12:15:06', NULL, NULL),
(666, 'membership', 'BACMTDNNAMAR', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20797, NULL, NULL, NULL, NULL, '2022-07-10 07:21:22', NULL, NULL),
(667, 'membership', '4YA76692G3152013U', 103, '2019-01-12', 3, 'Success', NULL, NULL, NULL, NULL, 20799, NULL, NULL, NULL, '2019-01-12 07:27:48', '2019-01-12 14:27:56', NULL, NULL),
(668, 'membership', '2XM30885NB715674S', 103, '2019-01-12', 3, 'Success', NULL, NULL, NULL, NULL, 20801, NULL, NULL, NULL, '2019-01-12 07:42:47', '2019-01-12 14:44:22', NULL, NULL),
(669, 'membership', '2BP131006S3443626', NULL, NULL, 3, 'Success', NULL, NULL, NULL, '100', 20802, NULL, NULL, NULL, NULL, '2019-02-10 14:42:00', NULL, NULL),
(670, 'membership', '8WK30000VX454314D', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20803, NULL, NULL, NULL, NULL, '2022-01-07 18:38:16', NULL, NULL),
(671, 'membership', '4RP04754VP432294W', 1030, '2022-07-19', 3, 'Success', NULL, NULL, NULL, NULL, 20804, NULL, NULL, NULL, '2022-07-19 01:21:34', '2022-07-19 08:21:50', NULL, NULL),
(672, 'membership', '1KT84172YD831520B', 103, '2019-01-17', 3, 'Success', NULL, NULL, NULL, NULL, 20805, NULL, NULL, NULL, '2019-01-17 07:05:02', '2019-01-17 14:05:10', NULL, NULL),
(673, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20806, NULL, NULL, NULL, NULL, '2019-02-07 17:44:58', NULL, NULL),
(674, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20807, NULL, NULL, NULL, NULL, '2019-02-02 12:57:53', NULL, NULL),
(675, 'membership', '8G8822071H1429324', 103, '2022-01-14', 3, 'Success', NULL, NULL, NULL, NULL, 20808, NULL, NULL, NULL, '2022-01-14 03:08:56', '2022-01-14 10:09:13', NULL, NULL),
(676, 'membership', '0TV08146FT840313C', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20809, NULL, NULL, NULL, NULL, '2020-12-31 11:37:25', NULL, NULL),
(677, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20810, NULL, NULL, NULL, NULL, '2019-02-07 17:44:16', NULL, NULL),
(678, 'membership', '16435794347', 100, '2023-02-01', 4, 'Success', NULL, NULL, NULL, NULL, 20811, NULL, NULL, NULL, NULL, '2023-02-01 22:04:10', NULL, NULL),
(679, 'membership', '51E183020N789204U', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20812, NULL, NULL, NULL, NULL, '2022-11-06 14:44:22', NULL, NULL),
(682, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20815, NULL, NULL, NULL, NULL, '2019-02-07 17:40:43', NULL, NULL),
(683, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20816, NULL, NULL, NULL, NULL, '2022-12-11 10:51:57', NULL, NULL),
(684, 'membership', '13549959297', NULL, NULL, 2, 'Success', NULL, NULL, '2022-01-30 00:00:00', NULL, 20817, NULL, NULL, NULL, NULL, '2022-10-10 19:01:02', NULL, NULL),
(686, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20819, NULL, NULL, NULL, NULL, '2019-02-07 17:31:13', NULL, NULL),
(687, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20820, NULL, NULL, 'QuickPay of $100 paid by PadmaRao Appalaneni 1/12/2021.', NULL, '2022-07-04 15:10:19', NULL, NULL),
(689, 'membership', '5594965430704622P', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20822, NULL, NULL, NULL, NULL, '2022-01-09 12:37:59', NULL, NULL),
(690, 'membership', '16432441062', 100, '2023-02-01', 4, 'Success', NULL, NULL, NULL, NULL, 20823, NULL, 'Renewal', '$100 paid', NULL, '2023-02-01 17:21:38', NULL, NULL),
(692, 'membership', '9SJ59127W76629630', 103, '2022-01-08', 3, 'Success', NULL, NULL, NULL, NULL, 20825, NULL, NULL, NULL, '2022-01-08 02:55:30', '2022-01-08 09:55:46', NULL, NULL),
(694, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20827, NULL, NULL, NULL, NULL, '2022-12-11 10:49:23', NULL, NULL),
(695, 'membership', '16352687792', 100, '2023-01-30', 4, 'Success', NULL, NULL, NULL, NULL, 20828, NULL, NULL, NULL, NULL, '2023-01-30 14:59:14', NULL, NULL),
(696, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20829, NULL, NULL, NULL, NULL, '2019-02-07 17:22:12', NULL, NULL),
(697, 'membership', '9GK60940VF872663S', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20830, NULL, NULL, NULL, NULL, '2020-12-31 11:31:51', NULL, NULL),
(699, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20832, NULL, NULL, '$100 QuickPay', NULL, '2022-01-07 11:09:46', NULL, NULL),
(702, 'membership', '3D543135MB9975916', 103, '2022-01-15', 3, 'Success', NULL, NULL, NULL, NULL, 20835, NULL, NULL, NULL, '2022-01-15 02:31:22', '2022-01-15 09:31:38', NULL, NULL),
(703, 'membership', 'N/A', 100, '2023-01-20', 2, 'Success', NULL, NULL, NULL, '100', 20118, NULL, 'Your account has been updated to reflect the zelle payment. Thank you', '$100 Zelle paid', NULL, '2023-01-20 14:27:50', NULL, NULL),
(704, 'membership', '8Y2400318P292921H', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20836, NULL, NULL, NULL, NULL, '2022-11-03 19:57:42', NULL, NULL),
(707, 'membership', 'N/A', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20838, NULL, NULL, NULL, NULL, '2019-02-07 17:16:12', NULL, NULL),
(708, 'membership', 'N/A', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20839, NULL, NULL, NULL, NULL, '2019-02-07 17:15:15', NULL, NULL),
(711, 'membership', 'N/A', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20842, NULL, NULL, NULL, NULL, '2019-02-07 17:12:26', NULL, NULL),
(712, 'membership', 'N/A', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20843, NULL, NULL, NULL, NULL, '2019-02-07 17:11:22', NULL, NULL),
(716, 'membership', 'BACM306J8DZK', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20847, NULL, NULL, NULL, NULL, '2022-04-24 10:00:36', NULL, NULL),
(717, 'membership', 'N/A', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20848, NULL, NULL, NULL, NULL, '2019-02-07 17:06:50', NULL, NULL),
(718, 'membership', '2P071296X0692683X', 103, '2022-10-09', 3, 'Success', NULL, NULL, NULL, NULL, 10080, NULL, NULL, NULL, '2022-10-09 11:19:12', '2022-10-09 18:19:28', NULL, NULL),
(719, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20849, NULL, NULL, '$100 paid', NULL, '2022-01-14 12:26:28', NULL, NULL),
(720, 'membership', 'N/A', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20850, NULL, NULL, NULL, NULL, '2019-02-07 17:05:20', NULL, NULL),
(721, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20851, NULL, NULL, '$103 Zelle pay', NULL, '2022-11-03 20:06:01', NULL, NULL),
(723, 'membership', 'N/A', 100, '2023-01-16', 2, 'Success', NULL, NULL, NULL, NULL, 20853, NULL, NULL, NULL, NULL, '2023-01-16 20:04:27', NULL, NULL),
(725, 'membership', '2T246898M5353092F', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20855, NULL, NULL, NULL, NULL, '2020-12-31 11:19:20', NULL, NULL),
(726, 'membership', '13832936238', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20798, NULL, NULL, '$15+$85', NULL, '2022-03-08 09:54:21', NULL, NULL),
(727, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20856, NULL, 'Cash deposited on 1/15/2019', NULL, NULL, '2019-02-07 15:32:08', NULL, NULL),
(730, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20858, NULL, NULL, 'Ref: 13460511576', NULL, '2022-01-15 17:46:18', NULL, NULL),
(736, 'membership', '1SX07297R4033220G', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20864, NULL, NULL, NULL, NULL, '2020-12-31 09:58:36', NULL, NULL),
(737, 'membership', '15726113326', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20865, NULL, NULL, 'Zelle pay', NULL, '2022-11-08 11:15:30', NULL, NULL),
(738, 'membership', '16417365368', 100, '2023-01-31', 4, 'Success', 'Chase', NULL, NULL, NULL, 20111, NULL, NULL, 'Zelle pay $103', NULL, '2023-01-31 22:51:56', NULL, NULL),
(739, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20866, NULL, NULL, NULL, NULL, '2020-01-26 14:47:21', NULL, NULL),
(740, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, '100', 20867, NULL, 'Paid through Chase QuickPay', NULL, NULL, '2019-04-05 22:28:44', NULL, NULL),
(743, 'membership', '70M96883EV654533E', 103, '2022-01-25', 3, 'Success', NULL, NULL, NULL, NULL, 20870, NULL, NULL, NULL, '2022-01-25 06:31:30', '2022-01-25 13:31:44', NULL, NULL),
(744, 'membership', '10P04692EV3703944', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20871, NULL, NULL, NULL, NULL, '2022-11-21 08:52:25', NULL, NULL),
(747, 'membership', '8X342272KP072781V', NULL, NULL, 3, 'Success', NULL, NULL, NULL, '100', 20875, NULL, NULL, NULL, NULL, '2019-04-08 13:53:21', NULL, NULL),
(748, 'membership', '3B408219RJ662052H', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20876, NULL, NULL, NULL, NULL, '2019-04-08 14:41:37', NULL, NULL),
(749, 'membership', 'BACQ4CII4N3J', 100, '2023-01-22', 4, 'Success', NULL, NULL, NULL, NULL, 20877, NULL, NULL, '$100 paid on 3/12/22', NULL, '2023-01-22 19:57:42', NULL, NULL),
(750, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20878, NULL, NULL, 'Paid $100 cash', NULL, '2022-11-09 18:13:16', NULL, NULL),
(751, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20879, NULL, 'Paid $100 cash', NULL, NULL, '2019-04-08 15:10:12', NULL, NULL),
(753, 'membership', '6YB724266B2824017', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20880, NULL, NULL, NULL, NULL, '2022-11-03 20:06:51', NULL, NULL),
(754, 'membership', '1P3209608P681980A', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20881, NULL, NULL, NULL, NULL, '2019-04-08 16:04:23', NULL, NULL),
(758, 'membership', 'N/A', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20106, NULL, 'Paid $100 with QuickPay', NULL, NULL, '2019-04-08 17:42:44', NULL, NULL),
(759, 'membership', '9PG80606GC3605432', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20885, NULL, '6C4568759B9075809', NULL, NULL, '2019-04-08 17:55:52', NULL, NULL),
(762, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20888, NULL, NULL, '$100 paid', NULL, '2022-01-14 12:29:09', NULL, NULL),
(763, 'membership', '0TH316765D948115L', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20889, NULL, NULL, NULL, NULL, '2020-12-31 11:10:34', NULL, NULL),
(767, 'membership', '4WR65296NV4381056', 103, '2019-04-11', 3, 'Success', NULL, NULL, NULL, NULL, 20893, NULL, NULL, NULL, '2019-04-11 13:56:00', '2019-04-11 20:56:13', NULL, NULL),
(771, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, '2019-02-25 00:00:00', NULL, 20897, NULL, NULL, NULL, NULL, '2019-06-20 22:58:11', NULL, NULL),
(772, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20898, NULL, NULL, NULL, NULL, '2020-12-31 09:57:54', NULL, NULL),
(773, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20899, NULL, 'QuickPay', NULL, NULL, '2020-12-31 09:57:05', NULL, NULL),
(774, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20900, NULL, NULL, NULL, NULL, '2020-12-31 09:56:37', NULL, NULL),
(775, 'membership', '2HG8989240902544C', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20901, NULL, NULL, NULL, NULL, '2019-06-21 11:27:29', NULL, NULL),
(777, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20903, NULL, NULL, 'Paid $100', NULL, '2022-11-03 19:55:35', NULL, NULL),
(781, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20908, NULL, NULL, NULL, NULL, '2022-01-09 17:26:01', NULL, NULL),
(782, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20910, NULL, NULL, 'Ref: 13421670387 - dtd:1/10/22.', NULL, '2022-01-15 13:30:15', NULL, NULL),
(783, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20911, NULL, NULL, '$100', NULL, '2022-01-09 21:20:21', NULL, NULL),
(784, 'membership', 'BACjnv4ja31n', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20912, NULL, NULL, NULL, NULL, '2022-10-31 17:00:43', NULL, NULL),
(785, 'membership', '6AU48038BB603092H', 100, '2023-01-22', 3, 'Success', NULL, NULL, NULL, NULL, 20913, NULL, NULL, 'Paid $40 cash.', NULL, '2023-01-22 21:22:07', NULL, NULL),
(786, 'membership', '55L485033K185410K', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20914, NULL, NULL, NULL, NULL, '2020-12-31 11:03:28', NULL, NULL),
(789, 'membership', '6H8105612F9626019', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20917, NULL, NULL, NULL, NULL, '2021-01-14 21:05:05', NULL, NULL),
(790, 'membership', '7KW343573L8659440', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20918, NULL, NULL, NULL, NULL, '2020-12-31 10:55:37', NULL, NULL),
(821, 'membership', '9F705619SV805430U', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20949, NULL, NULL, NULL, NULL, '2020-12-31 10:55:00', NULL, NULL),
(826, 'membership', '3R822116H0113314X', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20955, NULL, NULL, NULL, NULL, '2020-12-31 10:54:00', NULL, NULL),
(843, 'membership', '1SL618541W915542X', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20972, NULL, NULL, 'ukotha@hotmail.com', NULL, '2021-11-13 14:00:52', NULL, NULL),
(844, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20973, NULL, NULL, NULL, NULL, '2022-12-03 12:23:09', NULL, NULL),
(845, 'membership', 'N/A', NULL, NULL, 2, 'Success', 'Chase', '1010', '2020-01-11 00:00:00', '100', 20974, NULL, NULL, NULL, NULL, '2020-12-31 10:52:24', NULL, NULL),
(846, 'membership', '86P90077MW258004B', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20975, NULL, NULL, NULL, NULL, '2020-12-31 10:51:20', NULL, NULL),
(850, 'membership', '9DB395471X950005G', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20979, NULL, NULL, NULL, NULL, '2020-12-31 10:50:37', NULL, NULL),
(857, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20987, NULL, NULL, 'Paid $100 on 1/14/2022', NULL, '2022-01-14 18:32:48', NULL, NULL),
(858, 'membership', 'N/A', NULL, NULL, 2, 'Success', 'Chase', NULL, '2021-09-30 00:00:00', NULL, 20988, NULL, NULL, NULL, NULL, '2022-12-11 10:50:04', NULL, NULL),
(859, 'membership', '2JL5731406601191C', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20989, NULL, NULL, NULL, NULL, '2020-12-31 10:46:51', NULL, NULL),
(860, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20990, NULL, NULL, 'Paid $100 cash', NULL, '2021-10-01 15:43:21', NULL, NULL),
(861, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20991, NULL, NULL, '$100 paid', NULL, '2022-01-15 10:31:13', NULL, NULL),
(862, 'membership', '9PU51745EY855601S', 103, '2022-01-08', 3, 'Success', NULL, NULL, NULL, NULL, 20992, NULL, NULL, NULL, '2022-01-08 07:48:12', '2022-01-08 14:48:26', NULL, NULL),
(863, 'membership', 'N/A', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20993, NULL, NULL, 'Paid $100 on 10/2/2021', NULL, '2022-01-05 20:36:53', NULL, NULL),
(864, 'membership', 'N/A', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20994, NULL, NULL, NULL, NULL, '2021-01-17 12:57:36', NULL, NULL),
(865, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 20995, NULL, NULL, '$100 paid. Ref: BACuctvdkwyx', NULL, '2022-01-15 12:55:07', NULL, NULL),
(866, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, '12345', NULL, NULL, 20996, NULL, NULL, 'Reference: Suresh Sanakkayala', NULL, '2020-12-31 10:41:26', NULL, NULL),
(867, 'membership', '404762886V6626742', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20997, NULL, NULL, NULL, NULL, '2020-12-31 10:40:40', NULL, NULL),
(868, 'membership', '05682241BG935664L', 103, '2022-01-09', 3, 'Success', NULL, NULL, NULL, NULL, 20998, NULL, NULL, NULL, '2022-01-09 03:54:23', '2022-01-09 10:54:39', NULL, NULL),
(869, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, '1234', NULL, NULL, 20999, NULL, NULL, NULL, NULL, '2020-12-31 10:38:39', NULL, NULL),
(870, 'membership', '62F95466W70751020', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 21000, NULL, NULL, NULL, NULL, '2020-12-31 10:37:55', NULL, NULL),
(871, 'membership', '8EC61359K2241504U', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 21001, NULL, NULL, NULL, NULL, '2022-01-15 10:22:39', NULL, NULL),
(872, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, '2020-01-23 00:00:00', '100', 21002, NULL, NULL, NULL, NULL, '2020-12-31 10:36:11', NULL, NULL),
(873, 'membership', '16287976847', 100, '2023-01-30', 4, 'Success', NULL, NULL, NULL, NULL, 21003, NULL, NULL, '$103 Zelle paid on 1/6/22', NULL, '2023-01-30 16:59:24', NULL, NULL),
(874, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 21004, NULL, NULL, '$103 paid', NULL, '2022-01-08 16:55:47', NULL, NULL),
(875, 'membership', '581263614F849370G', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 21005, NULL, NULL, NULL, NULL, '2020-12-31 10:32:38', NULL, NULL),
(877, 'membership', '36453446R1543530D', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 21007, NULL, NULL, NULL, NULL, '2020-12-31 10:30:05', NULL, NULL),
(878, 'membership', '21N66815SN6933939', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 21008, NULL, NULL, NULL, NULL, '2021-01-17 13:02:50', NULL, NULL),
(879, 'membership', '4BM17110CD619731F', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 21009, NULL, NULL, NULL, NULL, '2020-12-31 10:26:19', NULL, NULL),
(880, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 21010, NULL, NULL, NULL, NULL, '2020-12-31 10:25:31', NULL, NULL),
(881, 'membership', '06U0843310602512X', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 21012, NULL, NULL, NULL, NULL, '2020-12-31 10:24:53', NULL, NULL),
(882, 'membership', '9EU62097PX952004S', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 21013, NULL, NULL, NULL, NULL, '2020-12-31 10:24:12', NULL, NULL),
(883, 'membership', '15725489857', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 21014, NULL, NULL, 'Zelle pay', NULL, '2022-11-08 11:16:52', NULL, NULL),
(884, 'membership', '8PA1365725250673S', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 21015, NULL, NULL, NULL, NULL, '2020-12-31 10:20:18', NULL, NULL),
(885, 'membership', '1X531477N74184941', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 21016, NULL, NULL, NULL, NULL, '2020-12-31 10:19:15', NULL, NULL),
(886, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 21017, NULL, NULL, '$100 paid', NULL, '2022-01-15 10:34:11', NULL, NULL),
(887, 'membership', '8X281877XS661743X', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 21018, NULL, NULL, NULL, NULL, '2020-12-31 10:15:14', NULL, NULL),
(888, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 21019, NULL, NULL, NULL, NULL, '2022-01-09 17:24:55', NULL, NULL),
(889, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 21020, NULL, NULL, NULL, NULL, '2020-12-31 10:11:57', NULL, NULL),
(890, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 21021, NULL, NULL, '$100 paid', NULL, '2022-01-14 12:32:18', NULL, NULL),
(892, 'membership', 'N/A', NULL, NULL, 2, 'Success', 'Fifth Third Bank', '104', '2020-01-25 00:00:00', '100', 21023, NULL, NULL, NULL, NULL, '2020-12-31 10:07:52', NULL, NULL),
(896, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 21031, NULL, NULL, '$100 paid', NULL, '2022-01-14 15:50:22', NULL, NULL),
(907, 'membership', 'N/A', 100, '2023-01-26', 3, 'Success', 'Chase', NULL, '2020-02-29 00:00:00', '100', 21046, NULL, NULL, NULL, NULL, '2023-01-26 02:18:26', NULL, NULL),
(908, 'membership', '5E121127413958235', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 20601, NULL, NULL, NULL, NULL, '2020-12-31 12:14:11', NULL, NULL),
(909, 'membership', '42928333BA810742F', 100, '2023-01-30', 3, 'Success', NULL, NULL, NULL, NULL, 21047, NULL, NULL, NULL, '2022-01-09 06:03:08', '2023-01-30 16:52:29', NULL, NULL),
(1125, 'membership', 'BACi93z9t5a4', 103, '2023-01-30', 4, 'Success', 'Bank of America', 'Zelle', '2022-12-29 00:00:00', '100', 21274, NULL, NULL, NULL, NULL, '2023-01-30 15:49:30', NULL, NULL),
(1126, 'membership', '4SH44520SC0543148', 103, '2022-01-14', 3, 'Success', NULL, NULL, NULL, NULL, 21275, NULL, NULL, NULL, '2022-01-14 02:12:42', '2022-01-14 09:12:59', NULL, NULL),
(1131, 'membership', '3R478672YH460872X', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 21284, NULL, NULL, NULL, NULL, '2021-01-15 11:39:23', NULL, NULL),
(1132, 'membership', 'N/A', NULL, NULL, 2, 'Success', 'BMO Harris', '5062', '2021-02-05 00:00:00', '68', 21285, NULL, NULL, NULL, NULL, '2021-04-04 16:19:30', NULL, NULL),
(1133, 'membership', '0EC312401S2821056', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 21287, NULL, NULL, NULL, NULL, '2021-01-14 16:40:46', NULL, NULL),
(1137, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 21291, NULL, NULL, NULL, NULL, '2021-01-14 16:29:30', NULL, NULL),
(1138, 'membership', '8EE04919KJ623720K', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 21292, NULL, NULL, NULL, NULL, '2021-01-14 20:54:34', NULL, NULL),
(1139, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 21293, NULL, NULL, NULL, NULL, '2021-01-14 16:13:53', NULL, NULL),
(1140, 'membership', '8GJ165593F566832G', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 21294, NULL, NULL, NULL, NULL, '2021-01-14 20:50:18', NULL, NULL),
(1142, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, '11005721034', NULL, '80', 21299, NULL, 'QP received', NULL, NULL, '2021-01-15 11:56:37', NULL, NULL),
(1143, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 21296, NULL, NULL, NULL, NULL, '2021-01-14 16:12:17', NULL, NULL),
(1144, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 21279, NULL, NULL, NULL, NULL, '2021-01-15 11:37:35', NULL, NULL),
(1145, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 21280, NULL, NULL, NULL, NULL, '2022-01-20 19:26:27', NULL, NULL),
(11355, 'membership', '0P496805A96289232', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 31509, NULL, NULL, NULL, NULL, '2021-02-18 21:03:03', NULL, NULL),
(11368, 'membership', '8R993282W2202342L', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 31522, NULL, NULL, NULL, NULL, '2021-02-18 21:00:45', NULL, NULL),
(11371, 'membership', '5TC16230S82841252', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 31525, NULL, NULL, NULL, NULL, '2021-02-18 21:02:12', NULL, NULL),
(21449, 'membership', '2SK66288PF2234348', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 41603, NULL, NULL, NULL, NULL, '2021-04-12 15:54:50', NULL, NULL),
(31540, 'membership', '5U243544VR480874H', 100, '2023-01-30', 3, 'Success', NULL, NULL, NULL, NULL, 51656, NULL, NULL, NULL, NULL, '2023-01-30 16:41:18', NULL, NULL),
(31955, 'membership', '85K26972MU097303U', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 52110, NULL, NULL, NULL, NULL, '2021-07-20 09:43:18', NULL, NULL),
(31968, 'membership', '6YB61078SK457234S', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 52123, NULL, NULL, NULL, NULL, '2021-07-20 09:42:40', NULL, NULL),
(31971, 'membership', '1N9655159S579322M', 100, '2023-01-20', 3, 'Success', NULL, NULL, NULL, NULL, 52126, NULL, 'Email has been reset as per member request', NULL, NULL, '2023-01-20 14:24:02', NULL, NULL),
(42660, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 62816, NULL, NULL, NULL, NULL, '2021-10-01 15:00:44', NULL, NULL),
(42671, 'membership', 'N/A', NULL, NULL, 2, 'Success', 'Great Plains Federal C U', '1178', NULL, '80', 52086, NULL, NULL, NULL, NULL, '2022-12-03 12:13:25', NULL, NULL),
(42676, 'membership', 'N/A', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 62831, NULL, NULL, NULL, NULL, '2022-01-26 13:50:19', NULL, NULL),
(42677, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 62832, NULL, NULL, NULL, NULL, '2021-10-03 15:34:42', NULL, NULL),
(52942, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 73097, NULL, NULL, 'Paid by Padmakar Damaraju on 1/14/2022.', NULL, '2022-01-14 18:31:41', NULL, NULL),
(52995, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 73150, NULL, NULL, NULL, NULL, '2021-11-13 10:31:14', NULL, NULL),
(52996, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 73151, NULL, NULL, NULL, NULL, '2021-11-13 11:36:36', NULL, NULL),
(52997, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 73152, NULL, NULL, NULL, NULL, '2022-12-11 10:59:45', NULL, NULL),
(63055, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 83210, NULL, NULL, NULL, NULL, '2021-12-09 18:31:29', NULL, NULL),
(63062, 'membership', '4EP9599619600621N', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 83217, NULL, NULL, NULL, NULL, '2022-11-11 13:51:05', NULL, NULL),
(63063, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 83218, NULL, NULL, '$100 Zelle pay', NULL, '2022-01-07 10:53:30', NULL, NULL),
(63064, 'membership', 'BACqdt564dui', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 83219, NULL, NULL, 'Zelle pay', NULL, '2022-11-08 11:19:14', NULL, NULL),
(63065, 'membership', '3YC869460A825383R', 103, '2022-01-08', 3, 'Success', NULL, NULL, NULL, NULL, 83220, NULL, NULL, NULL, '2022-01-08 15:42:02', '2022-01-08 22:42:18', NULL, NULL),
(63066, 'membership', 'BACm64sqycwg', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 83221, NULL, NULL, 'Zelle pay', NULL, '2022-11-08 14:25:25', NULL, NULL),
(63067, 'membership', '46C84542U08164213', 103, '2022-01-10', 3, 'Success', NULL, NULL, NULL, NULL, 83222, NULL, NULL, NULL, '2022-01-10 04:45:20', '2022-01-10 21:19:36', NULL, NULL),
(63068, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 83223, NULL, NULL, '$103', NULL, '2022-01-11 15:51:02', NULL, NULL),
(63069, 'membership', '98M87692LP016414A', 103, '2022-01-11', 3, 'Success', NULL, NULL, NULL, NULL, 83224, NULL, NULL, NULL, '2022-01-11 14:48:03', '2022-01-11 21:48:20', NULL, NULL),
(63071, 'membership', '2R9234866G568714M', 103, '2022-01-14', 3, 'Success', NULL, NULL, NULL, NULL, 83228, NULL, NULL, NULL, '2022-01-14 10:31:00', '2022-01-14 20:52:40', NULL, NULL);
INSERT INTO `transactions` (`id`, `reference`, `transaction_id`, `amount`, `transaction_date`, `payment_method_id`, `payment_status`, `bank_name`, `cheque_no`, `cheque_date`, `cheque_amount`, `user_id`, `event_id`, `admin_comment`, `user_comment`, `created_at`, `updated_at`, `event_registration_id`, `donation_id`) VALUES
(63072, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 83229, NULL, NULL, '$100 paid by Padmakar Damaraju on 1/14/2022', NULL, '2022-01-14 18:46:52', NULL, NULL),
(63073, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 83230, NULL, NULL, 'Ref: BACTJU0RUA05', NULL, '2022-01-15 17:44:50', NULL, NULL),
(63074, 'membership', '1K896872JF415205S', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 83231, NULL, NULL, NULL, NULL, '2022-01-15 15:21:01', NULL, NULL),
(63075, 'membership', '8MW954465T194263U', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 83232, NULL, NULL, NULL, NULL, '2022-01-28 11:38:07', NULL, NULL),
(63076, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 83233, NULL, NULL, 'Ref: 1TN000WV7RXZ dtd:1/14/2022', NULL, '2022-01-15 20:01:48', NULL, NULL),
(63077, 'membership', 'BACP2XRF9O95', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 83234, NULL, NULL, NULL, NULL, '2022-01-17 13:16:44', NULL, NULL),
(63078, 'membership', 'BACHA3DPX7OM', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 83235, NULL, NULL, 'Zelle pay', NULL, '2022-11-06 21:16:08', NULL, NULL),
(63138, 'membership', '13526740041', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 83296, NULL, NULL, 'Paid $100', NULL, '2022-01-26 19:29:03', NULL, NULL),
(63177, 'membership', 'BACgwquw7ue2', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 83336, NULL, NULL, '$100 paid', NULL, '2022-11-21 08:51:24', NULL, NULL),
(63189, 'membership', '6BH77831NA8400603', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 83348, NULL, NULL, NULL, NULL, '2022-01-28 17:17:21', NULL, NULL),
(63235, 'membership', '86H60801TH8827643', 63, '2023-01-31', 3, 'Success', NULL, NULL, NULL, NULL, 83394, NULL, NULL, NULL, NULL, '2023-01-31 20:07:26', NULL, NULL),
(63410, 'membership', 'N/A', NULL, NULL, 2, 'Success', 'Bankofamerica', '188', '2022-02-09 00:00:00', '100', 83299, NULL, NULL, NULL, NULL, '2022-03-25 20:32:30', NULL, NULL),
(63679, 'membership', '91F61125BB439190L', 103, '2022-03-03', 3, 'Success', NULL, NULL, NULL, NULL, 83837, NULL, NULL, NULL, '2022-03-03 14:45:26', '2022-03-03 21:45:42', NULL, NULL),
(63708, 'membership', 'BACSXKNLYMCC', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 83862, NULL, NULL, '$15+$85', NULL, '2022-03-09 20:11:19', NULL, NULL),
(63717, 'membership', 'N/A', NULL, NULL, 2, 'Success', 'Chase', NULL, NULL, '100', 83875, NULL, NULL, NULL, NULL, '2022-11-09 20:25:48', NULL, NULL),
(63724, 'membership', 'BACK8XGHU6W7', NULL, NULL, 2, 'Success', 'BOA', NULL, NULL, NULL, 83883, NULL, NULL, '$20+$80', NULL, '2022-03-14 09:01:44', NULL, NULL),
(73947, 'membership', '85R31845YA029401J', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 94107, NULL, NULL, NULL, NULL, '2022-04-14 08:46:20', NULL, NULL),
(73951, 'membership', 'PNCAA0Cuc79j', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 94113, NULL, NULL, 'Zelle pay of $80.', NULL, '2022-12-03 12:13:53', NULL, NULL),
(73952, 'membership', '14176974633', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 94114, NULL, NULL, NULL, NULL, '2022-04-22 21:27:18', NULL, NULL),
(73953, 'membership', '72930704BN1187152', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 94116, NULL, NULL, NULL, NULL, '2022-05-01 15:02:42', NULL, NULL),
(73954, 'membership', 'BAClmn1d6546', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 94117, NULL, NULL, 'Zelle pay', NULL, '2022-11-08 11:18:02', NULL, NULL),
(73955, 'membership', '0WB38837T0483722G', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 94118, NULL, NULL, NULL, NULL, '2022-04-24 07:22:34', NULL, NULL),
(73956, 'membership', '3TH98515H30044608', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 94119, NULL, NULL, NULL, NULL, '2022-11-09 18:18:51', NULL, NULL),
(73958, 'membership', '14181567971 & 14180530874', 100, '2023-01-30', 4, 'Success', NULL, NULL, NULL, NULL, 94121, NULL, NULL, '$35 + $65', NULL, '2023-01-30 00:31:10', NULL, NULL),
(73959, 'membership', 'BACnfg5k5zkk', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 94122, NULL, NULL, 'Zelle pay', NULL, '2022-11-08 14:26:45', NULL, NULL),
(73960, 'membership', 'BACOHIG5UYO5', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 94123, NULL, NULL, 'Zelle pay$103', NULL, '2022-12-11 09:30:33', NULL, NULL),
(73961, 'membership', 'N/A', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 94125, NULL, NULL, NULL, NULL, '2022-04-24 16:19:51', NULL, NULL),
(73962, 'membership', '6R136691WA730100M', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 94126, NULL, NULL, NULL, NULL, '2022-04-24 16:16:57', NULL, NULL),
(73963, 'membership', '2FV374134Y7710639', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 94124, NULL, NULL, NULL, NULL, '2022-04-24 16:20:32', NULL, NULL),
(73968, 'membership', 'PNCAA0DVV39V', 80, '2023-01-30', 4, 'Success', 'BMO Harris', '2193', '2022-05-04 00:00:00', '100', 94131, NULL, NULL, NULL, NULL, '2023-01-30 01:33:57', NULL, NULL),
(73969, 'membership', '8J723303WS2870017', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 94132, NULL, NULL, NULL, NULL, '2022-05-23 09:21:32', NULL, NULL),
(73973, 'membership', '31E76199C1270245G', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 94136, NULL, NULL, NULL, NULL, '2022-07-08 11:11:09', NULL, NULL),
(73974, 'membership', '8KS69878W32413523', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 94137, NULL, NULL, NULL, NULL, '2022-07-01 20:54:22', NULL, NULL),
(73975, 'membership', '6BK44640JP354042D', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 94138, NULL, NULL, NULL, NULL, '2022-07-08 18:14:04', NULL, NULL),
(73976, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, '60', 94139, NULL, NULL, NULL, NULL, '2022-07-10 08:09:27', NULL, NULL),
(73977, 'membership', '14775887434', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 94141, NULL, NULL, '$20 paid at picnic+ $80 Zelle pay', NULL, '2022-07-10 07:19:44', NULL, NULL),
(73978, 'membership', 'N/A', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 94142, NULL, NULL, '20+40+40', NULL, '2022-07-11 15:37:47', NULL, NULL),
(73980, 'membership', 'BACk7lrkgqj9', NULL, NULL, 2, 'Success', NULL, NULL, NULL, '150', 94145, NULL, NULL, NULL, NULL, '2022-12-11 10:48:20', NULL, NULL),
(73982, 'membership', '4N106592LN371132G', 103, '2022-10-14', 3, 'Success', NULL, NULL, NULL, NULL, 94147, NULL, NULL, NULL, '2022-10-14 02:19:14', '2022-10-14 09:19:29', NULL, NULL),
(73983, 'membership', '72W079096F0547218', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 94148, NULL, NULL, NULL, NULL, '2022-12-03 12:12:24', NULL, NULL),
(73984, 'membership', '9TV20401VC463234X', 103, '2022-10-22', 3, 'Success', NULL, NULL, NULL, NULL, 94149, NULL, NULL, NULL, '2022-10-22 06:29:54', '2022-10-22 13:30:12', NULL, NULL),
(73986, 'membership', '15504952329', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 94154, NULL, NULL, NULL, NULL, '2022-10-31 17:04:32', NULL, NULL),
(73987, 'membership', '4XN00728HP116842W', 103, '2022-10-28', 3, 'Success', NULL, NULL, NULL, NULL, 94155, NULL, NULL, NULL, '2022-10-28 11:22:03', '2022-10-28 18:24:04', NULL, NULL),
(73988, 'membership', '6XY603007H5285306', 63, '2022-10-28', 3, 'Success', NULL, NULL, NULL, NULL, 94156, NULL, NULL, NULL, '2022-10-28 11:30:14', '2022-10-28 18:32:22', NULL, NULL),
(73989, 'membership', '9UH81713PW582051Y', 103, '2022-10-28', 3, 'Success', NULL, NULL, NULL, NULL, 94157, NULL, NULL, NULL, '2022-10-28 11:32:30', '2022-10-30 21:44:40', NULL, NULL),
(73990, 'membership', '3RU70305MN5997341', 103, '2022-10-29', 3, 'Success', NULL, NULL, NULL, NULL, 94158, NULL, NULL, NULL, '2022-10-29 00:16:54', '2022-10-29 07:17:11', NULL, NULL),
(73991, 'membership', '00410656SE495892C', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 94159, NULL, NULL, NULL, NULL, '2022-10-29 21:15:41', NULL, NULL),
(73992, 'membership', '15670847345', NULL, NULL, 2, 'Success', 'Chase', 'Paid through zelle', '2022-10-31 00:00:00', '100', 94161, NULL, NULL, NULL, NULL, '2022-10-31 16:58:53', NULL, NULL),
(73993, 'membership', '74E154915X228431Y', 103, '2022-10-31', 3, 'Success', NULL, NULL, NULL, NULL, 94162, NULL, NULL, NULL, '2022-10-31 07:33:48', '2022-10-31 14:34:03', NULL, NULL),
(73994, 'membership', '8DM5186102468792M', 103, '2022-11-01', 3, 'Success', NULL, NULL, NULL, NULL, 94163, NULL, NULL, NULL, '2022-11-01 02:18:45', '2022-11-01 09:19:02', NULL, NULL),
(73995, 'membership', '45F77608BN817731D', 103, '2022-11-01', 3, 'Success', NULL, NULL, NULL, NULL, 94164, NULL, NULL, NULL, '2022-11-01 12:44:11', '2022-11-01 19:48:23', NULL, NULL),
(73996, 'membership', 'BACKBY4ZB1YC', NULL, NULL, 2, 'Success', 'Bank of America', 'Zelle Transfer', '2022-11-02 00:00:00', '120', 94166, NULL, NULL, NULL, NULL, '2022-11-02 21:48:33', NULL, NULL),
(73997, 'membership', '30489679SA830214S', 103, '2022-11-03', 3, 'Success', NULL, NULL, NULL, NULL, 94167, NULL, NULL, NULL, '2022-11-03 01:32:20', '2022-11-03 08:32:36', NULL, NULL),
(73998, 'membership', '15681818718', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 94168, NULL, NULL, 'Zelle pay $125', NULL, '2022-11-03 13:46:15', NULL, NULL),
(73999, 'membership', '3VT497128K2156648', 103, '2022-11-03', 3, 'Success', NULL, NULL, NULL, NULL, 94170, NULL, NULL, NULL, '2022-11-03 08:18:34', '2022-11-03 15:19:17', NULL, NULL),
(74000, 'membership', '4XH32705WF997452R', 103, '2022-11-03', 3, 'Success', NULL, NULL, NULL, NULL, 94171, NULL, NULL, NULL, '2022-11-03 09:29:04', '2022-11-03 16:32:08', NULL, NULL),
(74001, 'membership', 'BACMXYKJ7QAE', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 94172, NULL, NULL, 'Zelle pay $100', NULL, '2022-11-03 19:52:54', NULL, NULL),
(74002, 'membership', '6E908199GB7663428', 103, '2022-11-04', 3, 'Success', NULL, NULL, NULL, NULL, 94174, NULL, NULL, NULL, '2022-11-04 04:42:55', '2022-11-04 11:43:29', NULL, NULL),
(74003, 'membership', '0KV219699E494772A', 103, '2022-11-04', 3, 'Success', NULL, NULL, NULL, NULL, 94175, NULL, NULL, NULL, '2022-11-04 06:19:56', '2022-11-04 13:20:12', NULL, NULL),
(74004, 'membership', '15718404271', NULL, NULL, 2, 'Success', 'Chase', 'Zelle Payment', '2022-11-04 00:00:00', '100', 94176, NULL, NULL, 'Zelle pay', NULL, '2022-11-04 23:11:43', NULL, NULL),
(74005, 'membership', '5J576310MT140722S', 103, '2022-11-04', 3, 'Success', NULL, NULL, NULL, NULL, 94177, NULL, NULL, NULL, '2022-11-04 12:29:49', '2022-11-04 19:30:20', NULL, NULL),
(74006, 'membership', '2M004282MJ110770V', 103, '2022-11-04', 3, 'Success', NULL, NULL, NULL, NULL, 94178, NULL, NULL, NULL, '2022-11-04 13:28:20', '2022-11-04 20:28:35', NULL, NULL),
(74007, 'membership', '8L875487M7764134S', 103, '2022-11-04', 3, 'Success', NULL, NULL, NULL, NULL, 94179, NULL, NULL, NULL, '2022-11-04 14:46:31', '2022-11-04 21:46:47', NULL, NULL),
(74008, 'membership', '15707974307', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 94173, NULL, NULL, 'Zelle paid $120', NULL, '2022-11-05 07:49:11', NULL, NULL),
(74009, 'membership', '5TS97472NU763542R', 103, '2022-11-05', 3, 'Success', NULL, NULL, NULL, NULL, 94180, NULL, NULL, NULL, '2022-11-05 03:10:19', '2022-11-05 10:12:37', NULL, NULL),
(74010, 'membership', '41133096CL3640018', 63, '2022-11-05', 3, 'Success', NULL, NULL, NULL, NULL, 94181, NULL, NULL, NULL, '2022-11-05 06:53:10', '2022-11-05 13:53:26', NULL, NULL),
(74011, 'membership', '57844373C6634621E', 103, '2022-11-05', 3, 'Success', NULL, NULL, NULL, NULL, 94182, NULL, NULL, NULL, '2022-11-05 08:35:01', '2022-11-05 15:37:32', NULL, NULL),
(74012, 'membership', '3FM53759KU230850E', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 94183, NULL, NULL, NULL, NULL, '2022-11-06 20:32:37', NULL, NULL),
(74013, 'membership', '15724777040', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 94184, NULL, NULL, 'Zelle', NULL, '2022-11-08 20:56:47', NULL, NULL),
(74014, 'membership', '15724671073', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 94185, NULL, NULL, 'Zelle pay', NULL, '2022-11-09 10:36:29', NULL, NULL),
(74015, 'membership', 'BACn5nvkuk3i', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 94186, NULL, NULL, '$100 Zelle pay', NULL, '2022-11-10 22:00:38', NULL, NULL),
(74016, 'membership', '56J330925X699250H', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 94187, NULL, NULL, '6NL81371GJ050404K\n$50 + $75', NULL, '2022-11-11 21:31:08', NULL, NULL),
(74017, 'membership', 'BACdmjnzijf7', NULL, NULL, 2, 'Success', NULL, NULL, NULL, NULL, 94188, NULL, NULL, 'Zelle pay of $100 by Venkat Gangula', NULL, '2022-11-13 16:54:28', NULL, NULL),
(74019, 'membership', '163438356P961471A', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 94190, NULL, NULL, 'Paid $143 including event tickets', NULL, '2022-11-16 10:18:12', NULL, NULL),
(74020, 'membership', '3V685968SW5354254', NULL, NULL, 3, 'Success', NULL, NULL, '2022-11-05 00:00:00', NULL, 94191, NULL, NULL, 'Zelle pay of $50 + $75: 7E463967WX4136727', NULL, '2022-11-27 17:02:00', NULL, NULL),
(74021, 'membership', '8LP24373AP278940M', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 94192, NULL, NULL, NULL, NULL, '2022-12-06 20:51:32', NULL, NULL),
(74022, 'membership', '5TJ661811H781504M', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 94193, NULL, NULL, NULL, NULL, '2022-12-06 20:51:56', NULL, NULL),
(74024, 'membership', '4RS98992S4940741L', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 94195, NULL, NULL, NULL, NULL, '2022-12-09 14:13:31', NULL, NULL),
(74025, 'membership', '0PE49798UC3149724', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 94196, NULL, NULL, NULL, NULL, '2022-12-16 21:03:49', NULL, NULL),
(74026, 'membership', '87R081365S084394H', NULL, NULL, 3, 'Success', NULL, NULL, NULL, NULL, 94197, NULL, NULL, NULL, NULL, '2022-12-18 19:35:41', NULL, NULL),
(74032, 'eventregistration', '4VC062392P465843H', 1.03, '2023-01-11', 3, 'Success', NULL, NULL, NULL, NULL, NULL, 10136, NULL, NULL, '2023-01-11 03:25:36', '2023-01-11 03:27:33', 9, NULL),
(74033, 'eventregistration', 'ch_3MOv3rCuFwKXMCOw1RcRaZW8', 1.03, '2023-01-11', 1, 'Success', NULL, NULL, NULL, NULL, NULL, 10136, NULL, NULL, '2023-01-11 03:33:12', '2023-01-11 03:33:14', 11, NULL),
(74034, 'renewal', 'ch_3MP7SdCuFwKXMCOw1YrkHMOz', 103, '2023-01-11', 1, 'Success', NULL, NULL, NULL, NULL, 20776, NULL, NULL, NULL, '2023-01-11 16:47:36', '2023-01-11 16:47:36', NULL, NULL),
(74035, 'membership', 'quick_20230112015828RR63bf', 100, '2023-01-16', 4, 'Success', NULL, NULL, NULL, NULL, 94198, NULL, NULL, NULL, '2023-01-12 02:06:38', '2023-01-16 22:39:10', NULL, NULL),
(74036, 'membership', 'cheque_20230112022258MM63bf', 100, '2023-01-20', 2, 'Success', 'WELLSFARGO', '1010234198667', 'Jan-11-2023', '100', 20803, NULL, NULL, NULL, '2023-01-12 02:26:53', '2023-01-20 14:28:46', NULL, NULL),
(74037, 'membership', 'ch_3MPII9CuFwKXMCOw1SNlHCMH', 103, '2023-01-12', 1, 'Success', NULL, NULL, NULL, NULL, 94199, NULL, NULL, NULL, '2023-01-12 04:21:30', '2023-01-12 04:21:30', NULL, NULL),
(74038, 'membership', 'quick_20230113031826RP63c0', 100, '2023-01-16', 4, 'Success', NULL, NULL, NULL, NULL, 20832, NULL, NULL, NULL, '2023-01-13 03:22:58', '2023-01-16 22:44:41', NULL, NULL),
(74039, 'eventregistration', 'free', 0, '2023-01-13', NULL, 'Success', NULL, NULL, NULL, NULL, 20241, 10137, NULL, NULL, '2023-01-13 03:44:46', '2023-01-13 03:44:58', 12, NULL),
(74041, 'donations', NULL, 100, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-02 08:13:28', '2017-06-02 08:13:28', NULL, NULL),
(74042, 'donations', NULL, 1116, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-05 15:07:23', '2017-06-05 15:07:23', NULL, NULL),
(74043, 'donations', NULL, 10, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-04 11:38:33', '2017-07-04 11:38:33', NULL, NULL),
(74044, 'donations', '22C25456AU263382U', 25, '2017-07-11', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-11 17:38:07', '2017-07-13 20:04:50', NULL, NULL),
(74045, 'donations', '0PD3637544365925E', 20, '2017-07-12', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-12 20:51:54', '2017-07-12 20:53:08', NULL, NULL),
(74046, 'donations', '5RF45675RA503433E', 20, '2017-07-13', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-13 16:17:16', '2017-07-13 16:20:17', NULL, NULL),
(74047, 'donations', '2UN614721W974924A', 25, '2017-07-14', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-14 07:12:27', '2017-07-14 07:15:27', NULL, NULL),
(74048, 'donations', '91B48118ED857592H', 51, '2017-07-14', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-14 14:32:34', '2017-07-14 14:37:20', NULL, NULL),
(74049, 'donations', NULL, 25, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-14 16:59:03', '2017-07-14 16:59:03', NULL, NULL),
(74050, 'donations', '50F54771ET436353B', 30, '2017-07-14', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-14 17:42:47', '2017-07-14 17:49:22', NULL, NULL),
(74051, 'donations', '6VH83380S7777045E', 20, '2017-07-14', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-14 17:59:29', '2017-07-14 18:01:46', NULL, NULL),
(74052, 'donations', NULL, 12, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-17 01:22:03', '2017-07-17 01:22:03', NULL, NULL),
(74053, 'donations', NULL, 50, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-20 22:22:28', '2017-07-20 22:22:28', NULL, NULL),
(74054, 'donations', NULL, 50, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-20 22:24:00', '2017-07-20 22:24:00', NULL, NULL),
(74055, 'donations', '00X57271DS527872R', 50, '2017-10-31', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-31 19:46:56', '2017-10-31 19:49:36', NULL, NULL),
(74056, 'donations', NULL, 54202, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-05 02:26:14', '2017-11-05 02:26:14', NULL, NULL),
(74057, 'donations', '2930453917081562W', 50, '2017-11-18', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-18 09:25:47', '2017-11-18 09:28:08', NULL, NULL),
(74058, 'donations', '2AK7995178727612M', 10, '2017-11-23', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-23 12:51:06', '2017-11-23 12:53:33', NULL, NULL),
(74059, 'donations', '2EP3569575893450Y', 51, '2017-11-28', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-28 15:38:44', '2017-11-28 15:41:21', NULL, NULL),
(74060, 'donations', '7HJ76082MT6058021', 25, '2017-11-30', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-30 07:30:55', '2017-11-30 07:32:58', NULL, NULL),
(74061, 'donations', '1DL11406W88082302', 25, '2017-12-01', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-01 04:51:05', '2017-12-01 04:57:40', NULL, NULL),
(74062, 'donations', '5J796687S5072161B', 25, '2017-12-01', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-01 15:09:33', '2017-12-01 15:12:39', NULL, NULL),
(74063, 'donations', NULL, 100, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-01 17:44:26', '2017-12-01 17:44:26', NULL, NULL),
(74064, 'donations', '1JP97362057484507', 30, '2017-12-01', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-01 21:05:29', '2017-12-01 21:08:36', NULL, NULL),
(74065, 'donations', '1KT02241BL611813J', 51, '2017-12-01', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-02 01:04:23', '2017-12-02 01:09:00', NULL, NULL),
(74066, 'donations', '76G17989BN535363M', 116, '2017-12-02', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-02 09:35:44', '2017-12-02 09:36:30', NULL, NULL),
(74067, 'donations', '21046614JU158861V', 100, '2017-12-02', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-02 09:46:27', '2017-12-02 09:50:14', NULL, NULL),
(74068, 'donations', '8BB12762S5073260U', 100, '2017-12-02', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-02 10:20:39', '2017-12-02 10:23:28', NULL, NULL),
(74069, 'donations', '0LX61248X3099020Y', 25, '2017-12-02', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-02 10:42:53', '2017-12-02 10:45:07', NULL, NULL),
(74070, 'donations', '12J46368HF678642U', 50, '2017-12-02', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-02 11:05:42', '2017-12-02 11:08:32', NULL, NULL),
(74071, 'donations', '4G669288S0665102U', 51, '2017-12-02', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-02 11:30:07', '2017-12-02 11:30:58', NULL, NULL),
(74072, 'donations', '9DH88449JM1394906', 30, '2017-12-02', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-02 12:41:47', '2017-12-02 12:45:52', NULL, NULL),
(74073, 'donations', '3DG187828U187991F', 50, '2017-12-02', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-02 12:58:00', '2017-12-02 13:01:23', NULL, NULL),
(74074, 'donations', '3KH34619DP428264A', 25, '2017-12-02', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-02 18:30:35', '2017-12-02 18:33:12', NULL, NULL),
(74075, 'donations', '8RS61230PB7092125', 50, '2017-12-02', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-02 21:27:36', '2017-12-02 21:30:49', NULL, NULL),
(74076, 'donations', '16B2542270401515X', 40, '2017-12-08', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-08 16:50:20', '2017-12-08 16:54:55', NULL, NULL),
(74077, 'donations', '73D04991M7486303D', 900, '2017-12-27', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-27 14:14:43', '2017-12-27 14:17:52', NULL, NULL),
(74078, 'donations', '9FX67231822364935', 40, '2017-12-31', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-31 18:21:15', '2017-12-31 18:23:07', NULL, NULL),
(74079, 'donations', NULL, 50, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-05-01 09:09:23', '2018-05-01 09:09:23', NULL, NULL),
(74080, 'donations', NULL, 100, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-05-31 03:25:49', '2018-05-31 03:25:49', NULL, NULL),
(74081, 'donations', '3AH15975U5315874E', 50, '2018-10-13', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-10-13 10:57:45', '2018-10-13 11:01:51', NULL, NULL),
(74082, 'donations', NULL, 100, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-10-23 08:16:00', '2018-10-23 08:16:00', NULL, NULL),
(74083, 'donations', '74118806GF6010419', 100, '2018-10-23', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-10-23 08:16:04', '2018-10-23 08:16:50', NULL, NULL),
(74084, 'donations', NULL, 100, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-12 09:49:19', '2019-01-12 09:49:19', NULL, NULL),
(74085, 'donations', NULL, 100, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-12 10:36:39', '2019-01-12 10:36:39', NULL, NULL),
(74086, 'donations', NULL, 103, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-12 14:37:58', '2019-01-12 14:37:58', NULL, NULL),
(74087, 'donations', NULL, 83, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-06 13:16:40', '2019-04-06 13:16:40', NULL, NULL),
(74088, 'donations', NULL, 103, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-11 20:48:32', '2019-04-11 20:48:32', NULL, NULL),
(74089, 'donations', '9FC295714P637115Y', 230, '2019-05-10', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-10 13:10:30', '2019-05-10 13:21:25', NULL, NULL),
(74090, 'donations', '3U880832E44379939', 100, '2019-06-20', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-20 09:01:38', '2019-06-20 09:04:18', NULL, NULL),
(74091, 'donations', '77D54783C5230772L', 500, '2019-08-18', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-18 16:08:57', '2019-08-18 16:10:19', NULL, NULL),
(74092, 'donations', NULL, 60, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-19 15:55:00', '2019-10-19 15:55:00', NULL, NULL),
(74093, 'donations', NULL, 100, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-24 17:24:50', '2020-01-24 17:24:50', NULL, NULL),
(74094, 'donations', NULL, 103, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-24 21:30:51', '2020-01-24 21:30:51', NULL, NULL),
(74095, 'donations', '1XT37269E2752080B', 51, '2020-04-15', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-15 09:15:34', '2020-04-15 09:17:49', NULL, NULL),
(74096, 'donations', '60M444477M593425H', 200, '2020-04-15', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-15 11:06:51', '2020-04-15 11:07:21', NULL, NULL),
(74097, 'donations', '3XD31089NF632974H', 30, '2020-04-17', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-17 21:45:02', '2020-04-17 21:46:07', NULL, NULL),
(74098, 'donations', '8UP72557WW657172Y', 51, '2020-04-18', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-18 02:08:58', '2020-04-18 02:10:40', NULL, NULL),
(74099, 'donations', '2J493677G7182951H', 51, '2020-04-18', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-18 07:55:11', '2020-04-18 07:56:32', NULL, NULL),
(74100, 'donations', '53X70907DX280270C', 51, '2020-04-18', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-18 08:19:17', '2020-04-18 08:25:15', NULL, NULL),
(74101, 'donations', '0D892111EL2673327', 30, '2020-04-18', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-18 08:48:35', '2020-04-18 08:50:46', NULL, NULL),
(74102, 'donations', NULL, 50, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-10 22:58:20', '2020-05-10 22:58:20', NULL, NULL),
(74103, 'donations', NULL, 50, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-10 22:58:21', '2020-05-10 22:58:21', NULL, NULL),
(74104, 'donations', '9E950086GS999682H', 11, '2020-05-11', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-11 13:52:30', '2020-05-11 13:53:37', NULL, NULL),
(74105, 'donations', '680679091X4812334', 100, '2020-05-11', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-11 14:56:34', '2020-05-11 14:58:35', NULL, NULL),
(74106, 'donations', NULL, 50, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-11 17:17:23', '2020-05-11 17:17:23', NULL, NULL),
(74107, 'donations', '8U398707985114109', 50, '2020-05-11', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-11 18:50:51', '2020-05-11 18:57:15', NULL, NULL),
(74108, 'donations', '9N446631XV935683C', 50, '2020-05-12', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-12 13:46:32', '2020-05-12 13:49:46', NULL, NULL),
(74109, 'donations', '4L28423743459040U', 10, '2020-05-13', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-13 18:47:23', '2020-05-13 18:51:01', NULL, NULL),
(74110, 'donations', '43541816RB724405F', 25, '2020-05-13', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-13 20:28:41', '2020-05-13 20:29:08', NULL, NULL),
(74111, 'donations', '2KU74278K01575601', 50, '2020-05-13', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-13 21:07:59', '2020-05-13 21:11:45', NULL, NULL),
(74112, 'donations', '85655649DN937235C', 50, '2020-05-13', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-13 22:03:04', '2020-05-13 22:04:35', NULL, NULL),
(74113, 'donations', '9S026450RY620605E', 25, '2020-05-15', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-15 16:05:59', '2020-05-15 16:07:10', NULL, NULL),
(74114, 'donations', '74979906VJ6784845', 26, '2020-05-15', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-15 16:08:21', '2020-05-15 16:08:44', NULL, NULL),
(74115, 'donations', '62V41491DG6770209', 5, '2020-05-15', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-15 18:33:13', '2020-05-15 18:34:42', NULL, NULL),
(74116, 'donations', '8Y935952LT4840211', 100, '2020-05-17', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-17 14:49:26', '2020-05-17 14:51:24', NULL, NULL),
(74117, 'donations', '5DU02884PY855880P', 100, '2020-05-17', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-17 21:03:26', '2020-05-17 21:06:56', NULL, NULL),
(74118, 'donations', '3J9550275J3803741', 5, '2020-05-17', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-17 21:15:05', '2020-05-17 21:19:09', NULL, NULL),
(74119, 'donations', '5X079525PY308304R', 200, '2020-05-22', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-22 09:34:43', '2020-05-22 09:35:29', NULL, NULL),
(74120, 'donations', '82G16133JV267794W', 30, '2020-05-22', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-22 11:24:34', '2020-05-22 11:28:06', NULL, NULL),
(74121, 'donations', '589046628D011434N', 101, '2020-05-23', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-23 21:35:24', '2020-05-23 21:39:27', NULL, NULL),
(74122, 'donations', '73591537YN934680B', 6, '2020-06-05', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-05 13:23:21', '2020-06-05 13:26:35', NULL, NULL),
(74123, 'donations', NULL, 54689, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-17 16:41:38', '2020-06-17 16:41:38', NULL, NULL),
(74124, 'donations', NULL, 51, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-26 23:16:28', '2020-06-26 23:16:28', NULL, NULL),
(74125, 'donations', '1RE48203GX918192M', 51, '2020-06-27', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-27 17:34:33', '2020-06-27 17:37:10', NULL, NULL),
(74126, 'donations', NULL, 58830, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-28 14:10:38', '2020-06-28 14:10:38', NULL, NULL),
(74127, 'donations', NULL, 5828, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-20 20:05:35', '2020-07-20 20:05:35', NULL, NULL),
(74128, 'donations', '2XS77250HY866743C', 51, '2020-08-11', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-11 13:10:53', '2020-08-11 13:14:34', NULL, NULL),
(74129, 'donations', '1H43250241218682L', 20, '2020-08-18', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-18 16:16:22', '2020-08-18 16:19:00', NULL, NULL),
(74130, 'donations', '9R142287HL7712741', 11, '2020-08-20', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-20 21:35:02', '2020-08-20 21:35:57', NULL, NULL),
(74131, 'donations', '03C14134N3540310X', 11, '2020-08-21', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-21 07:29:50', '2020-08-21 07:30:22', NULL, NULL),
(74132, 'donations', '1ND94787VP2089640', 51, '2020-08-21', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-21 21:23:57', '2020-08-21 21:27:47', NULL, NULL),
(74133, 'donations', '4K994536J33091429', 11, '2020-08-22', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-22 15:37:43', '2020-08-22 15:44:30', NULL, NULL),
(74134, 'donations', NULL, 56792, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-09 03:48:56', '2020-09-09 03:48:56', NULL, NULL),
(74135, 'donations', NULL, 55116, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-23 09:24:38', '2020-09-23 09:24:38', NULL, NULL),
(74136, 'donations', NULL, 57501, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-23 16:50:54', '2020-09-23 16:50:54', NULL, NULL),
(74137, 'donations', NULL, 59518, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-28 07:41:36', '2020-09-28 07:41:36', NULL, NULL),
(74138, 'donations', NULL, 54120, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-01 22:23:54', '2020-10-01 22:23:54', NULL, NULL),
(74139, 'donations', NULL, 54667, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-06 13:51:49', '2020-10-06 13:51:49', NULL, NULL),
(74140, 'donations', NULL, 5228, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-05 14:28:49', '2020-11-05 14:28:49', NULL, NULL),
(74141, 'donations', '5H253873M48212027', 10, '2020-11-19', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-19 11:17:32', '2020-11-19 11:18:01', NULL, NULL),
(74142, 'donations', NULL, 10, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-19 11:19:24', '2020-11-19 11:19:24', NULL, NULL),
(74143, 'donations', NULL, 10, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-19 11:20:40', '2020-11-19 11:20:40', NULL, NULL),
(74144, 'donations', '31580042X56674745', 10, '2020-11-19', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-19 11:26:10', '2020-11-19 11:26:47', NULL, NULL),
(74145, 'donations', '5XM93010RJ9266456', 10, '2020-11-19', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-19 11:50:49', '2020-11-19 11:51:29', NULL, NULL),
(74146, 'donations', NULL, 59218, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-11 12:17:45', '2020-12-11 12:17:45', NULL, NULL),
(74147, 'donations', NULL, 1000, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-09 10:21:28', '2021-05-09 10:21:28', NULL, NULL),
(74148, 'donations', '5UX83993KW081921A', 100, '2021-05-09', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-09 10:21:45', '2021-05-09 10:22:31', NULL, NULL),
(74149, 'donations', NULL, 1, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-10 18:01:36', '2022-04-10 18:01:36', NULL, NULL),
(74150, 'donations', '641916455D5556500', 250, '2022-07-16', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-16 13:35:38', '2022-07-16 13:36:15', NULL, NULL),
(74151, 'donations', '8GD60756CH165354C', 100, '2022-07-16', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-16 14:43:24', '2022-07-16 14:43:53', NULL, NULL),
(74152, 'donations', '0CH36687SE008515H', 101, '2022-07-17', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-17 06:29:39', '2022-07-17 06:33:01', NULL, NULL),
(74153, 'donations', '08K53310VF6663359', 51, '2022-07-17', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-17 23:43:32', '2022-07-17 23:44:50', NULL, NULL),
(74154, 'donations', NULL, 1000, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 11:05:17', '2022-11-29 11:05:17', NULL, NULL),
(74155, 'donations', '7M046536YV561550F', 10, '2022-11-29', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 11:05:31', '2022-11-29 11:06:00', NULL, NULL),
(74156, 'donations', '0YH325405H991100R', 5, '2022-11-29', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 11:06:51', '2022-11-29 11:07:25', NULL, NULL),
(74157, 'donations', '37Y43063LB5180343', 35, '2022-11-29', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 12:19:25', '2022-11-29 12:20:11', NULL, NULL),
(74158, 'donations', '87D21349LB7561021', 150, '2022-11-29', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 12:45:31', '2022-11-29 12:46:05', NULL, NULL),
(74159, 'donations', '0VX07453CK269731V', 20, '2022-11-29', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 12:51:53', '2022-11-29 12:52:33', NULL, NULL),
(74160, 'donations', '76D68718YE408170D', 35, '2022-11-29', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 14:06:56', '2022-11-29 14:07:32', NULL, NULL),
(74161, 'donations', '06D187224R2368839', 15, '2022-11-29', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 14:09:16', '2022-11-29 14:09:39', NULL, NULL),
(74162, 'donations', '1VW27685DN6255221', 20, '2022-11-29', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 14:16:16', '2022-11-29 14:16:59', NULL, NULL),
(74163, 'donations', '61181602A1984943H', 5, '2022-11-29', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 14:18:41', '2022-11-30 02:56:32', NULL, NULL),
(74164, 'donations', '03L06434SG501672V', 25, '2022-11-29', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 14:26:46', '2022-11-29 14:28:48', NULL, NULL),
(74165, 'donations', '4AX506291L425091J', 20, '2022-11-29', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 14:40:55', '2022-11-29 14:41:26', NULL, NULL),
(74166, 'donations', '7HE14065F6747051B', 35, '2022-11-29', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 15:06:28', '2022-11-29 15:07:13', NULL, NULL),
(74167, 'donations', '2CF317322G353114B', 35, '2022-11-29', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 15:35:15', '2022-11-29 15:35:46', NULL, NULL),
(74168, 'donations', '95599942LS438910H', 20, '2022-11-29', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 15:35:45', '2022-11-29 15:37:49', NULL, NULL),
(74169, 'donations', '4EL66528VL592880A', 10, '2022-11-29', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 15:37:02', '2022-11-29 15:37:30', NULL, NULL),
(74170, 'donations', '4HP82173AW473443E', 5, '2022-11-29', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 18:47:04', '2022-11-29 18:47:38', NULL, NULL),
(74171, 'donations', '0XT333600F442145W', 25, '2022-11-29', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 19:32:10', '2022-11-29 19:35:28', NULL, NULL),
(74173, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10062, 1, NULL, NULL, '2016-05-18 10:00:12', '2016-05-18 10:00:12', 17, NULL),
(74174, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10067, 1, NULL, NULL, '2016-05-18 11:29:10', '2016-05-18 11:29:10', 21, NULL),
(74177, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20097, 1, NULL, NULL, '2016-05-19 09:13:20', '2016-05-19 09:13:20', 10039, NULL),
(74178, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20101, 1, NULL, NULL, '2016-05-19 13:31:29', '2016-05-19 13:31:29', 10041, NULL),
(74179, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20118, 1, NULL, NULL, '2016-05-20 14:46:49', '2016-05-20 14:46:49', 10048, NULL),
(74180, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10042, 1, NULL, NULL, '2016-05-20 17:23:20', '2016-05-20 17:23:20', 10049, NULL),
(74182, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20131, 1, NULL, NULL, '2016-05-21 14:12:45', '2016-05-21 14:12:45', 10055, NULL),
(74183, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20134, 1, NULL, NULL, '2016-05-22 09:16:43', '2016-05-22 09:16:43', 10058, NULL),
(74184, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20138, 1, NULL, NULL, '2016-05-22 19:56:43', '2016-05-22 19:56:43', 10060, NULL),
(74185, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20144, 1, NULL, NULL, '2016-05-23 10:23:16', '2016-05-23 10:23:16', 10063, NULL),
(74186, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20150, 1, NULL, NULL, '2016-05-23 21:50:24', '2016-05-23 21:50:24', 10070, NULL),
(74187, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10086, 1, NULL, NULL, '2016-05-24 08:40:06', '2016-05-24 11:02:39', 10071, NULL),
(74188, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20154, 1, NULL, NULL, '2016-05-24 08:48:02', '2016-05-24 08:48:02', 10072, NULL),
(74189, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20162, 1, NULL, NULL, '2016-05-25 00:24:19', '2016-05-25 00:24:19', 10076, NULL),
(74190, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20170, 1, NULL, NULL, '2016-05-25 08:42:09', '2016-05-25 08:42:09', 10080, NULL),
(74191, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20174, 1, NULL, NULL, '2016-05-25 12:25:42', '2016-05-25 12:25:42', 10081, NULL),
(74193, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10032, 1, NULL, NULL, '2016-05-26 16:47:44', '2016-05-26 16:47:44', 10088, NULL),
(74196, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20204, 1, NULL, NULL, '2016-05-30 17:25:26', '2016-05-30 17:25:26', 10101, NULL),
(74197, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20207, 1, NULL, NULL, '2016-05-30 18:36:49', '2016-05-30 18:36:49', 10103, NULL),
(74199, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20210, 1, NULL, NULL, '2016-05-30 22:38:23', '2016-05-30 22:38:23', 10105, NULL),
(74200, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20159, 1, NULL, NULL, '2016-05-31 10:08:32', '2016-05-31 10:08:32', 10106, NULL),
(74202, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20225, 1, NULL, NULL, '2016-06-01 10:31:37', '2016-06-01 10:31:37', 10113, NULL),
(74203, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20227, 1, NULL, NULL, '2016-06-01 12:19:37', '2016-06-01 12:19:37', 10114, NULL),
(74204, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20229, 1, NULL, NULL, '2016-06-01 22:20:41', '2016-06-01 22:20:41', 10115, NULL),
(74205, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20230, 1, NULL, NULL, '2016-06-02 12:39:24', '2016-06-02 12:39:24', 10117, NULL),
(74206, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20241, 1, NULL, NULL, '2016-06-03 08:54:31', '2016-06-03 08:54:31', 10126, NULL),
(74207, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20243, 1, NULL, NULL, '2016-06-03 10:22:45', '2016-06-03 10:22:45', 10128, NULL),
(74208, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20258, 1, NULL, NULL, '2016-06-03 22:33:11', '2016-06-03 22:33:11', 10135, NULL),
(74210, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20267, 1, NULL, NULL, '2016-06-04 19:52:18', '2016-06-04 19:52:18', 10140, NULL),
(74212, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20269, 1, NULL, NULL, '2016-06-05 10:12:06', '2016-06-05 10:12:06', 10142, NULL),
(74213, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20286, 1, NULL, NULL, '2016-06-06 10:06:54', '2016-06-06 10:06:54', 10149, NULL),
(74214, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20289, 1, NULL, NULL, '2016-06-06 12:02:53', '2016-06-06 12:02:53', 10151, NULL),
(74215, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20292, 1, NULL, NULL, '2016-06-06 12:57:34', '2016-06-07 11:25:45', 10156, NULL),
(74217, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20307, 1, NULL, NULL, '2016-06-07 11:01:32', '2016-06-07 11:01:32', 10168, NULL),
(74218, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20311, 1, NULL, NULL, '2016-06-07 18:41:42', '2016-06-07 18:41:42', 10174, NULL),
(74221, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20353, 1, NULL, NULL, '2016-06-09 13:41:57', '2016-06-09 13:41:57', 10206, NULL),
(74222, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20364, 1, NULL, NULL, '2016-06-09 20:18:48', '2016-06-09 20:18:48', 10213, NULL),
(74226, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20388, 1, NULL, NULL, '2016-06-11 05:53:45', '2016-06-11 05:53:45', 10231, NULL),
(74228, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10062, 11, NULL, NULL, '2016-08-04 14:52:58', '2016-08-04 14:52:58', 10244, NULL),
(74229, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20138, 11, NULL, NULL, '2016-08-06 10:39:50', '2016-08-06 10:39:50', 10245, NULL),
(74230, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20138, 11, NULL, NULL, '2016-08-06 10:43:46', '2016-08-06 10:43:46', 10246, NULL),
(74231, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10032, 16, NULL, NULL, '2016-09-27 18:33:09', '2016-09-27 18:33:09', 10252, NULL),
(74232, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20225, 16, NULL, NULL, '2016-09-27 19:06:39', '2016-09-27 19:06:39', 10253, NULL),
(74233, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10032, 16, NULL, NULL, '2016-10-02 09:52:45', '2016-10-02 09:52:45', 10254, NULL),
(74234, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10086, 16, NULL, NULL, '2016-10-04 06:30:48', '2016-10-04 06:30:48', 10257, NULL),
(74235, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10086, 16, NULL, NULL, '2016-10-04 09:42:54', '2016-10-04 09:42:54', 10260, NULL),
(74236, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10032, 16, NULL, NULL, '2016-10-06 09:43:09', '2016-10-06 09:43:09', 10262, NULL),
(74237, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10032, 34, NULL, NULL, '2017-06-06 21:09:41', '2017-06-06 21:09:41', 10318, NULL),
(74238, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20134, 34, NULL, NULL, '2017-06-06 21:53:50', '2017-06-06 21:53:50', 10319, NULL),
(74239, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20568, 34, NULL, NULL, '2017-06-07 06:15:27', '2017-06-07 06:15:27', 10321, NULL),
(74241, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20225, 34, NULL, NULL, '2017-06-07 09:52:10', '2017-06-07 09:52:10', 10326, NULL),
(74242, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20101, 34, NULL, NULL, '2017-06-07 11:08:50', '2017-06-07 11:08:50', 10328, NULL),
(74244, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10086, 34, NULL, NULL, '2017-06-08 16:00:07', '2017-06-08 16:00:07', 10339, NULL),
(74245, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20159, 34, NULL, NULL, '2017-06-08 19:54:30', '2017-06-08 19:54:30', 10341, NULL),
(74246, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10086, 34, NULL, NULL, '2017-06-09 11:44:36', '2017-06-09 11:44:36', 10345, NULL),
(74247, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20605, 34, NULL, NULL, '2017-06-11 09:27:19', '2017-06-11 09:27:19', 10358, NULL),
(74248, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20204, 34, NULL, NULL, '2017-06-11 11:40:00', '2017-06-11 11:40:00', 10360, NULL),
(74249, 'eventregistration', '87128068FB712673J', 5, '2017-06-11', 1, 'Success', NULL, NULL, NULL, NULL, 20582, 34, NULL, NULL, '2017-06-11 21:31:33', '2017-06-11 21:34:36', 10362, NULL),
(74251, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10067, 34, NULL, NULL, '2017-06-13 14:06:08', '2017-06-13 14:06:08', 10368, NULL),
(74252, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20600, 34, NULL, NULL, '2017-06-13 14:57:07', '2017-06-13 14:57:07', 10369, NULL),
(74253, 'eventregistration', '42169375K34692736', 10, '2017-06-13', 1, 'Success', NULL, NULL, NULL, NULL, 20583, 34, NULL, NULL, '2017-06-13 18:12:38', '2017-06-13 18:32:24', 10370, NULL),
(74255, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20170, 34, NULL, NULL, '2017-06-14 16:31:49', '2017-06-14 16:31:49', 10378, NULL),
(74256, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20138, 34, NULL, NULL, '2017-06-14 20:33:46', '2017-06-16 20:00:49', 10379, NULL),
(74257, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20521, 34, NULL, NULL, '2017-06-15 16:15:45', '2017-06-15 16:15:45', 10381, NULL),
(74258, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20621, 34, NULL, NULL, '2017-06-15 18:23:08', '2017-06-15 18:23:08', 10382, NULL),
(74259, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20558, 34, NULL, NULL, '2017-06-16 09:30:47', '2017-06-16 09:30:47', 10387, NULL),
(74260, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20666, 34, NULL, NULL, '2017-06-16 09:33:42', '2017-06-16 09:33:42', 10388, NULL),
(74261, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10062, 34, NULL, NULL, '2017-06-16 16:52:43', '2017-06-16 16:52:43', 10391, NULL),
(74263, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20269, 34, NULL, NULL, '2017-06-17 08:54:47', '2017-06-17 08:54:47', 10398, NULL),
(74265, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20575, 34, NULL, NULL, '2017-06-17 13:14:15', '2017-06-17 13:14:15', 10402, NULL),
(74272, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10062, 45, NULL, NULL, '2017-10-05 19:54:12', '2017-10-05 19:54:12', 10436, NULL);
INSERT INTO `transactions` (`id`, `reference`, `transaction_id`, `amount`, `transaction_date`, `payment_method_id`, `payment_status`, `bank_name`, `cheque_no`, `cheque_date`, `cheque_amount`, `user_id`, `event_id`, `admin_comment`, `user_comment`, `created_at`, `updated_at`, `event_registration_id`, `donation_id`) VALUES
(74273, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20600, 53, NULL, NULL, '2018-02-04 16:22:12', '2018-02-04 16:22:12', 10440, NULL),
(74274, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20600, 53, NULL, NULL, '2018-02-04 16:22:19', '2018-02-04 16:22:19', 10441, NULL),
(74275, 'eventregistration', NULL, 10, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10086, 55, NULL, NULL, '2018-02-11 01:19:25', '2018-02-11 01:19:25', 10452, NULL),
(74276, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20364, 55, NULL, NULL, '2018-02-11 12:00:00', '2018-02-11 12:00:00', 10454, NULL),
(74277, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20364, 53, NULL, NULL, '2018-02-11 12:03:28', '2018-02-11 12:03:28', 10455, NULL),
(74278, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10086, 53, NULL, NULL, '2018-02-13 11:39:08', '2018-02-13 11:39:08', 10456, NULL),
(74279, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10032, 53, NULL, NULL, '2018-02-16 14:18:48', '2018-02-16 14:18:48', 10462, NULL),
(74281, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20605, 55, NULL, NULL, '2018-02-17 12:17:57', '2018-02-17 12:17:57', 10465, NULL),
(74282, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10062, 55, NULL, NULL, '2018-02-21 21:33:46', '2018-02-21 21:33:46', 10467, NULL),
(74283, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20558, 55, NULL, NULL, '2018-02-27 21:28:08', '2018-02-27 21:28:08', 20467, NULL),
(74284, 'eventregistration', '6BK49710AN5947445', 10, '2018-03-15', 1, 'Success', NULL, NULL, NULL, NULL, 20727, 55, NULL, NULL, '2018-03-15 19:11:08', '2018-03-15 19:11:27', 20476, NULL),
(74285, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10062, 61, NULL, NULL, '2018-12-26 14:18:14', '2018-12-26 14:18:14', 20498, NULL),
(74286, 'eventregistration', NULL, 15, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20789, 61, NULL, NULL, '2019-01-12 13:52:51', '2019-01-12 13:52:51', 20518, NULL),
(74287, 'eventregistration', NULL, 10, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20807, 62, NULL, NULL, '2019-02-02 13:32:31', '2019-02-02 13:32:31', 20522, NULL),
(74288, 'eventregistration', '6CY205904Y3395500', 10, '2019-02-02', 1, 'Success', NULL, NULL, NULL, NULL, 20807, 62, NULL, NULL, '2019-02-02 13:32:33', '2019-02-02 13:33:06', 20523, NULL),
(74290, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20159, 63, NULL, NULL, '2019-03-12 14:46:37', '2019-03-12 14:46:37', 20525, NULL),
(74291, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10086, 63, NULL, NULL, '2019-03-12 14:48:18', '2019-03-12 14:48:18', 20527, NULL),
(74292, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10062, 63, NULL, NULL, '2019-03-12 14:53:40', '2019-03-12 14:53:40', 20528, NULL),
(74293, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20708, 63, NULL, NULL, '2019-03-14 17:25:40', '2019-03-14 17:25:40', 20533, NULL),
(74294, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20621, 63, NULL, NULL, '2019-03-16 15:10:24', '2019-03-16 15:10:24', 20538, NULL),
(74296, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20812, 63, NULL, NULL, '2019-03-17 12:06:43', '2019-03-17 12:06:43', 20549, NULL),
(74297, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20798, 63, NULL, NULL, '2019-03-17 19:57:50', '2019-03-17 19:57:50', 20555, NULL),
(74298, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20816, 63, NULL, NULL, '2019-03-22 19:07:19', '2019-03-22 19:07:19', 20570, NULL),
(74299, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20827, 63, NULL, NULL, '2019-03-23 06:44:47', '2019-03-23 06:44:47', 20573, NULL),
(74300, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10086, 64, NULL, NULL, '2019-03-23 21:07:51', '2019-03-23 21:07:51', 20575, NULL),
(74301, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20159, 64, NULL, NULL, '2019-03-23 21:10:10', '2019-03-23 21:10:10', 20577, NULL),
(74302, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20865, 64, NULL, NULL, '2019-03-24 01:38:36', '2019-03-24 01:38:36', 20578, NULL),
(74303, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10062, 64, NULL, NULL, '2019-03-24 07:54:29', '2019-03-24 07:54:29', 20579, NULL),
(74307, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20805, 64, NULL, NULL, '2019-04-05 07:53:42', '2019-04-05 07:53:42', 20590, NULL),
(74310, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20558, 64, NULL, NULL, '2019-04-05 13:20:26', '2019-04-05 13:20:26', 20597, NULL),
(74313, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10080, 64, NULL, NULL, '2019-04-06 12:58:00', '2019-04-06 12:58:00', 20610, NULL),
(74314, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20159, 69, NULL, NULL, '2019-04-21 08:35:23', '2019-04-21 08:35:23', 20611, NULL),
(74315, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10086, 69, NULL, NULL, '2019-04-24 10:55:58', '2019-04-24 10:55:58', 20613, NULL),
(74316, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10032, 69, NULL, NULL, '2019-04-25 21:34:34', '2019-04-25 21:34:34', 20620, NULL),
(74317, 'eventregistration', '2CS3853598806361M', 20, '2019-04-29', 1, 'Success', NULL, NULL, NULL, NULL, 20159, 65, NULL, NULL, '2019-04-29 19:06:08', '2019-04-29 19:07:15', 20627, NULL),
(74318, 'eventregistration', '0DW58924647159623', 10, '2019-04-30', 1, 'Success', NULL, NULL, NULL, NULL, 10062, 65, NULL, NULL, '2019-04-30 19:08:52', '2019-04-30 19:11:33', 20630, NULL),
(74319, 'eventregistration', '9JA05013TM621804G', 20, '2019-04-30', 1, 'Success', NULL, NULL, NULL, NULL, 20521, 65, NULL, NULL, '2019-04-30 19:26:58', '2019-04-30 19:28:34', 20631, NULL),
(74320, 'eventregistration', '994412605X646650C', 30, '2019-04-30', 1, 'Success', NULL, NULL, NULL, NULL, 10032, 65, NULL, NULL, '2019-04-30 20:40:18', '2019-04-30 20:43:06', 20634, NULL),
(74321, 'eventregistration', '9XB35353X4203470R', 10, '2019-05-13', 1, 'Success', NULL, NULL, NULL, NULL, 20521, 65, NULL, NULL, '2019-05-13 21:20:18', '2019-05-13 21:21:54', 20637, NULL),
(74322, 'eventregistration', '36B605894M814361D', 30, '2019-05-14', 1, 'Success', NULL, NULL, NULL, NULL, 10086, 65, NULL, NULL, '2019-05-14 10:03:14', '2019-05-14 10:06:49', 20638, NULL),
(74325, 'eventregistration', '8T550217UT2443905', 10, '2019-05-15', 1, 'Success', NULL, NULL, NULL, NULL, 20241, 65, NULL, NULL, '2019-05-15 07:04:27', '2019-05-15 07:05:38', 20641, NULL),
(74326, 'eventregistration', '9RC809029L402113G', 30, '2019-05-15', 1, 'Success', NULL, NULL, NULL, NULL, 20558, 65, NULL, NULL, '2019-05-15 14:20:07', '2019-05-15 14:21:02', 20642, NULL),
(74327, 'eventregistration', '7L464917HH027641G', 20, '2019-05-15', 1, 'Success', NULL, NULL, NULL, NULL, 20159, 65, NULL, NULL, '2019-05-15 17:48:30', '2019-05-15 17:49:05', 20643, NULL),
(74328, 'eventregistration', '5RJ69296WG2934011', 10, '2019-05-16', 1, 'Success', NULL, NULL, NULL, NULL, 20292, 65, NULL, NULL, '2019-05-16 08:42:49', '2019-05-16 08:43:26', 20644, NULL),
(74329, 'eventregistration', '33640055MF243892T', 40, '2019-05-16', 1, 'Success', NULL, NULL, NULL, NULL, 20708, 65, NULL, NULL, '2019-05-16 21:26:25', '2019-05-16 21:27:16', 20645, NULL),
(74330, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20827, 70, NULL, NULL, '2019-05-31 12:00:44', '2019-05-31 12:00:44', 20655, NULL),
(74331, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20701, 70, NULL, NULL, '2019-06-02 13:41:56', '2019-06-02 13:41:56', 20661, NULL),
(74332, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20521, 70, NULL, NULL, '2019-06-02 20:46:40', '2019-06-02 20:46:40', 20663, NULL),
(74333, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20521, 66, NULL, NULL, '2019-06-02 20:49:54', '2019-06-02 20:49:54', 20664, NULL),
(74334, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20147, 70, NULL, NULL, '2019-06-03 14:57:57', '2019-06-03 14:57:57', 20666, NULL),
(74335, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20267, 70, NULL, NULL, '2019-06-03 15:51:57', '2019-06-03 15:51:57', 20667, NULL),
(74337, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20865, 66, NULL, NULL, '2019-06-08 21:55:13', '2019-06-08 21:55:13', 20676, NULL),
(74338, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10062, 66, NULL, NULL, '2019-06-11 21:25:39', '2019-06-11 21:25:39', 20683, NULL),
(74339, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20159, 66, NULL, NULL, '2019-06-11 21:42:48', '2019-06-11 21:42:48', 20684, NULL),
(74340, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20600, 70, NULL, NULL, '2019-06-12 06:58:38', '2019-06-12 06:58:38', 20685, NULL),
(74341, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20600, 70, NULL, NULL, '2019-06-12 06:58:43', '2019-06-12 06:58:43', 20686, NULL),
(74342, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20229, 70, NULL, NULL, '2019-06-12 10:47:52', '2019-06-12 10:47:52', 20687, NULL),
(74343, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20749, 66, NULL, NULL, '2019-06-13 15:38:45', '2019-06-13 15:38:45', 20690, NULL),
(74344, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20229, 70, NULL, NULL, '2019-06-13 19:09:51', '2019-06-13 19:09:51', 20693, NULL),
(74345, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20621, 66, NULL, NULL, '2019-06-13 20:14:44', '2019-06-13 20:14:44', 20694, NULL),
(74346, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20801, 66, NULL, NULL, '2019-06-14 07:35:14', '2019-06-14 07:35:14', 20695, NULL),
(74347, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20810, 70, NULL, NULL, '2019-06-14 10:40:50', '2019-06-14 10:40:50', 20696, NULL),
(74348, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20810, 66, NULL, NULL, '2019-06-14 10:43:30', '2019-06-14 10:43:30', 20697, NULL),
(74349, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20605, 66, NULL, NULL, '2019-06-14 10:54:42', '2019-06-14 10:54:42', 20698, NULL),
(74350, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20605, 66, NULL, NULL, '2019-06-14 10:54:50', '2019-06-14 10:54:50', 20699, NULL),
(74351, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20727, 70, NULL, NULL, '2019-06-14 12:21:29', '2019-06-14 12:21:29', 20700, NULL),
(74352, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20727, 66, NULL, NULL, '2019-06-14 12:22:30', '2019-06-14 12:22:30', 20701, NULL),
(74353, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20803, 66, NULL, NULL, '2019-06-16 11:58:06', '2019-06-16 11:58:06', 20709, NULL),
(74354, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20809, 66, NULL, NULL, '2019-06-17 20:06:59', '2019-06-17 20:06:59', 20711, NULL),
(74355, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10032, 66, NULL, NULL, '2019-06-17 20:35:44', '2019-06-17 20:35:44', 20713, NULL),
(74356, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20838, 66, NULL, NULL, '2019-06-17 23:25:27', '2019-06-17 23:25:27', 20715, NULL),
(74357, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10080, 66, NULL, NULL, '2019-06-18 18:32:38', '2019-06-18 18:32:38', 20716, NULL),
(74359, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20692, 66, NULL, NULL, '2019-06-18 19:47:01', '2019-06-18 19:47:01', 20718, NULL),
(74360, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20692, 66, NULL, NULL, '2019-06-18 19:52:25', '2019-06-18 19:52:25', 20719, NULL),
(74361, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20229, 66, NULL, NULL, '2019-06-18 20:47:53', '2019-06-18 20:47:53', 20721, NULL),
(74362, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20881, 66, NULL, NULL, '2019-06-18 21:54:28', '2019-06-18 21:54:28', 20723, NULL),
(74363, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20147, 66, NULL, NULL, '2019-06-18 22:05:12', '2019-06-18 22:05:12', 20724, NULL),
(74364, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10067, 66, NULL, NULL, '2019-06-18 22:16:37', '2019-06-18 22:16:37', 20725, NULL),
(74365, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20673, 66, NULL, NULL, '2019-06-18 22:40:21', '2019-06-18 22:40:21', 20726, NULL),
(74366, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20583, 66, NULL, NULL, '2019-06-19 04:40:35', '2019-06-19 04:40:35', 20727, NULL),
(74367, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20870, 66, NULL, NULL, '2019-06-19 06:23:40', '2019-06-19 06:23:40', 20728, NULL),
(74368, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20830, 66, NULL, NULL, '2019-06-19 06:50:34', '2019-06-19 06:50:34', 20729, NULL),
(74369, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20827, 66, NULL, NULL, '2019-06-19 07:53:57', '2019-06-19 07:53:57', 20730, NULL),
(74374, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20871, 66, NULL, NULL, '2019-06-19 17:46:09', '2019-06-19 17:46:09', 20737, NULL),
(74375, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20819, 66, NULL, NULL, '2019-06-19 18:34:07', '2019-06-19 18:34:07', 20739, NULL),
(74376, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20766, 66, NULL, NULL, '2019-06-19 18:51:19', '2019-06-19 18:51:19', 20740, NULL),
(74377, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20558, 66, NULL, NULL, '2019-06-19 18:55:55', '2019-06-19 18:55:55', 20741, NULL),
(74378, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20162, 66, NULL, NULL, '2019-06-19 20:16:01', '2019-06-19 20:16:01', 20742, NULL),
(74379, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20785, 66, NULL, NULL, '2019-06-19 21:55:16', '2019-06-19 21:55:16', 20743, NULL),
(74380, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20808, 66, NULL, NULL, '2019-06-19 22:00:59', '2019-06-19 22:00:59', 20744, NULL),
(74382, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20111, 66, NULL, NULL, '2019-06-20 08:08:11', '2019-06-20 08:08:11', 20746, NULL),
(74384, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20851, 66, NULL, NULL, '2019-06-20 09:58:37', '2019-06-20 09:58:37', 20748, NULL),
(74385, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20797, 66, NULL, NULL, '2019-06-20 10:20:52', '2019-06-20 10:20:52', 20749, NULL),
(74386, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20579, 66, NULL, NULL, '2019-06-20 10:37:19', '2019-06-20 10:37:19', 20750, NULL),
(74387, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20847, 66, NULL, NULL, '2019-06-20 12:19:36', '2019-06-20 12:19:36', 20751, NULL),
(74388, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20804, 66, NULL, NULL, '2019-06-20 12:33:29', '2019-06-20 12:33:29', 20752, NULL),
(74389, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20616, 66, NULL, NULL, '2019-06-20 16:20:19', '2019-06-20 16:20:19', 20753, NULL),
(74390, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20272, 66, NULL, NULL, '2019-06-20 18:05:04', '2019-06-20 18:05:04', 20754, NULL),
(74391, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20685, 66, NULL, NULL, '2019-06-20 19:27:44', '2019-06-20 19:27:44', 20755, NULL),
(74392, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20203, 66, NULL, NULL, '2019-06-20 19:55:08', '2019-06-20 19:55:08', 20756, NULL),
(74393, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20398, 66, NULL, NULL, '2019-06-20 21:48:55', '2019-06-20 21:48:55', 20758, NULL),
(74394, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20893, 66, NULL, NULL, '2019-06-21 06:03:42', '2019-06-21 06:03:42', 20759, NULL),
(74395, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20893, 66, NULL, NULL, '2019-06-21 06:08:10', '2019-06-21 06:08:10', 20760, NULL),
(74396, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20749, 66, NULL, NULL, '2019-06-21 06:18:14', '2019-06-21 06:18:14', 20761, NULL),
(74398, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20556, 66, NULL, NULL, '2019-06-21 09:02:22', '2019-06-21 09:02:22', 20763, NULL),
(74399, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20797, 66, NULL, NULL, '2019-06-21 10:40:10', '2019-06-21 10:40:10', 20764, NULL),
(74400, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20777, 66, NULL, NULL, '2019-06-21 10:57:36', '2019-06-21 10:57:36', 20766, NULL),
(74401, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20832, 66, NULL, NULL, '2019-06-21 11:16:23', '2019-06-21 11:16:23', 20767, NULL),
(74402, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20773, 66, NULL, NULL, '2019-06-21 11:17:28', '2019-06-21 11:17:28', 20768, NULL),
(74403, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20829, 66, NULL, NULL, '2019-06-21 13:37:04', '2019-06-21 13:37:04', 20769, NULL),
(74404, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20731, 66, NULL, NULL, '2019-06-21 14:41:12', '2019-06-21 14:41:12', 20771, NULL),
(74405, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20789, 66, NULL, NULL, '2019-06-21 14:51:00', '2019-06-21 14:51:00', 20772, NULL),
(74406, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20307, 66, NULL, NULL, '2019-06-21 14:55:59', '2019-06-21 14:55:59', 20773, NULL),
(74407, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20788, 66, NULL, NULL, '2019-06-21 16:59:05', '2019-06-21 16:59:05', 20777, NULL),
(74408, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20788, 66, NULL, NULL, '2019-06-21 17:01:54', '2019-06-21 17:01:54', 20778, NULL),
(74409, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20562, 66, NULL, NULL, '2019-06-21 19:35:37', '2019-06-21 19:35:37', 20789, NULL),
(74410, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20562, 66, NULL, NULL, '2019-06-21 19:38:06', '2019-06-21 19:38:06', 20790, NULL),
(74411, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20255, 66, NULL, NULL, '2019-06-21 20:08:04', '2019-06-21 20:08:04', 20792, NULL),
(74413, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20749, 67, NULL, NULL, '2019-06-24 07:32:08', '2019-06-24 07:32:08', 20807, NULL),
(74414, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10086, 74, NULL, NULL, '2019-09-26 07:59:37', '2019-09-26 07:59:37', 20831, NULL),
(74415, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10062, 74, NULL, NULL, '2019-09-26 08:02:45', '2019-09-26 08:02:45', 20832, NULL),
(74416, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20749, 74, NULL, NULL, '2019-10-05 13:19:10', '2019-10-05 13:19:10', 20833, NULL),
(74417, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10080, 74, NULL, NULL, '2019-10-06 20:00:37', '2019-10-06 20:00:37', 20835, NULL),
(74418, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20583, 74, NULL, NULL, '2019-10-07 06:54:59', '2019-10-07 06:54:59', 20836, NULL),
(74419, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20692, 74, NULL, NULL, '2019-10-08 17:12:16', '2019-10-08 17:12:16', 20837, NULL),
(74420, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20794, 74, NULL, NULL, '2019-10-12 08:49:55', '2019-10-12 08:49:55', 20838, NULL),
(74421, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20794, 74, NULL, NULL, '2019-10-12 08:55:08', '2019-10-12 08:55:08', 20839, NULL),
(74422, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20808, 74, NULL, NULL, '2019-10-12 11:43:25', '2019-10-12 11:43:25', 20840, NULL),
(74423, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20881, 74, NULL, NULL, '2019-10-12 12:49:03', '2019-10-12 12:49:03', 20841, NULL),
(74425, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20827, 74, NULL, NULL, '2019-10-13 13:43:04', '2019-10-13 13:43:04', 20843, NULL),
(74427, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10067, 74, NULL, NULL, '2019-10-13 13:59:39', '2019-10-13 13:59:39', 20845, NULL),
(74431, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20708, 74, NULL, NULL, '2019-10-13 18:52:12', '2019-10-13 18:52:12', 20849, NULL),
(74432, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20286, 74, NULL, NULL, '2019-10-14 10:29:02', '2019-10-14 10:29:02', 20852, NULL),
(74433, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20203, 74, NULL, NULL, '2019-10-14 10:46:12', '2019-10-14 10:46:12', 20853, NULL),
(74434, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20870, 74, NULL, NULL, '2019-10-14 21:26:09', '2019-10-14 21:26:09', 20854, NULL),
(74435, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20853, 74, NULL, NULL, '2019-10-16 08:03:57', '2019-10-16 08:03:57', 20856, NULL),
(74436, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20853, 74, NULL, NULL, '2019-10-16 08:05:41', '2019-10-16 08:05:41', 20857, NULL),
(74437, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20159, 74, NULL, NULL, '2019-10-16 08:38:49', '2019-10-16 08:38:49', 20858, NULL),
(74438, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20621, 74, NULL, NULL, '2019-10-16 19:50:46', '2019-10-16 19:50:46', 20859, NULL),
(74439, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20202, 74, NULL, NULL, '2019-10-16 19:52:01', '2019-10-16 19:52:01', 20860, NULL),
(74440, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20134, 74, NULL, NULL, '2019-10-16 20:24:10', '2019-10-16 20:24:10', 20861, NULL),
(74441, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20797, 74, NULL, NULL, '2019-10-17 19:49:49', '2019-10-17 19:49:49', 20862, NULL),
(74442, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20579, 74, NULL, NULL, '2019-10-18 10:32:08', '2019-10-18 10:32:08', 20866, NULL),
(74443, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20307, 74, NULL, NULL, '2019-10-18 10:41:17', '2019-10-18 10:41:17', 20867, NULL),
(74444, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20147, 74, NULL, NULL, '2019-10-18 10:41:39', '2019-10-18 10:41:39', 20868, NULL),
(74445, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20832, 74, NULL, NULL, '2019-10-18 10:50:26', '2019-10-18 10:50:26', 20869, NULL),
(74446, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20766, 74, NULL, NULL, '2019-10-18 11:11:11', '2019-10-18 11:11:11', 20870, NULL),
(74449, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20786, 74, NULL, NULL, '2019-10-18 12:00:20', '2019-10-18 12:00:20', 20873, NULL),
(74450, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20908, 74, NULL, NULL, '2019-10-18 12:15:35', '2019-10-18 12:15:35', 20874, NULL),
(74452, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20832, 74, NULL, NULL, '2019-10-18 13:27:52', '2019-10-18 13:27:52', 20876, NULL),
(74453, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20170, 74, NULL, NULL, '2019-10-18 14:17:45', '2019-10-18 14:17:45', 20877, NULL),
(74454, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20666, 74, NULL, NULL, '2019-10-18 14:41:51', '2019-10-18 14:41:51', 20879, NULL),
(74455, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20773, 74, NULL, NULL, '2019-10-18 14:44:57', '2019-10-18 14:44:57', 20880, NULL),
(74456, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20871, 74, NULL, NULL, '2019-10-18 15:08:45', '2019-10-18 15:08:45', 20881, NULL),
(74457, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20777, 74, NULL, NULL, '2019-10-18 15:47:14', '2019-10-18 15:47:14', 20882, NULL),
(74458, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20893, 74, NULL, NULL, '2019-10-18 16:17:41', '2019-10-18 16:17:41', 20883, NULL),
(74459, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20558, 74, NULL, NULL, '2019-10-18 18:48:46', '2019-10-18 18:48:46', 20885, NULL),
(74460, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20558, 74, NULL, NULL, '2019-10-18 18:49:59', '2019-10-18 18:49:59', 20886, NULL),
(74463, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20847, 74, NULL, NULL, '2019-10-18 20:44:49', '2019-10-18 20:44:49', 20889, NULL),
(74464, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10032, 74, NULL, NULL, '2019-10-19 07:49:04', '2019-10-19 07:49:04', 20890, NULL),
(74465, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10086, 76, NULL, NULL, '2020-01-05 14:11:14', '2020-01-05 14:11:14', 20891, NULL),
(74466, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20159, 76, NULL, NULL, '2020-01-05 14:16:24', '2020-01-05 14:16:24', 20892, NULL),
(74467, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10062, 76, NULL, NULL, '2020-01-05 14:50:09', '2020-01-05 14:50:09', 20893, NULL),
(74468, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20797, 76, NULL, NULL, '2020-01-06 08:15:56', '2020-01-06 08:15:56', 20896, NULL),
(74469, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20583, 76, NULL, NULL, '2020-01-07 20:57:08', '2020-01-07 20:57:08', 20916, NULL),
(74470, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20908, 76, NULL, NULL, '2020-01-08 15:17:49', '2020-01-08 15:17:49', 20925, NULL),
(74472, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20975, 76, NULL, NULL, '2020-01-12 05:16:46', '2020-01-12 05:16:46', 20949, NULL),
(74474, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10080, 76, NULL, NULL, '2020-01-13 13:45:02', '2020-01-13 13:45:02', 20954, NULL),
(74475, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20788, 76, NULL, NULL, '2020-01-15 13:22:54', '2020-01-15 13:22:54', 20961, NULL),
(74477, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20701, 76, NULL, NULL, '2020-01-18 18:38:04', '2020-01-18 18:38:04', 20963, NULL),
(74478, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20666, 76, NULL, NULL, '2020-01-20 11:03:57', '2020-01-20 11:03:57', 20965, NULL),
(74479, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20865, 76, NULL, NULL, '2020-01-20 11:46:56', '2020-01-20 11:46:56', 20966, NULL),
(74480, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20855, 76, NULL, NULL, '2020-01-20 14:46:18', '2020-01-20 14:46:18', 20967, NULL),
(74481, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20997, 76, NULL, NULL, '2020-01-20 19:38:52', '2020-01-20 19:38:52', 20968, NULL),
(74482, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20364, 76, NULL, NULL, '2020-01-22 15:48:10', '2020-01-22 15:48:10', 20970, NULL),
(74483, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20766, 76, NULL, NULL, '2020-01-22 16:50:52', '2020-01-22 16:50:52', 20971, NULL),
(74484, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20621, 76, NULL, NULL, '2020-01-22 21:29:22', '2020-01-22 21:29:22', 20972, NULL),
(74485, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21000, 76, NULL, NULL, '2020-01-22 23:42:13', '2020-01-22 23:42:13', 20974, NULL),
(74486, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21000, 76, NULL, NULL, '2020-01-22 23:45:23', '2020-01-22 23:45:23', 20975, NULL),
(74487, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20307, 76, NULL, NULL, '2020-01-23 13:35:52', '2020-01-23 13:35:52', 20976, NULL),
(74488, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20913, 76, NULL, NULL, '2020-01-23 18:24:00', '2020-01-23 18:24:00', 20977, NULL),
(74489, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20701, 76, NULL, NULL, '2020-01-23 18:47:52', '2020-01-23 18:47:52', 20978, NULL),
(74490, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20701, 76, NULL, NULL, '2020-01-23 18:50:30', '2020-01-23 18:50:30', 20979, NULL),
(74491, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20999, 76, NULL, NULL, '2020-01-23 20:50:07', '2020-01-23 20:50:07', 20980, NULL),
(74492, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20853, 76, NULL, NULL, '2020-01-23 21:18:44', '2020-01-23 21:18:44', 20981, NULL),
(74493, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20388, 76, NULL, NULL, '2020-01-24 10:46:18', '2020-01-24 10:46:18', 20982, NULL),
(74494, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21005, 76, NULL, NULL, '2020-01-24 11:03:58', '2020-01-24 11:03:58', 20983, NULL),
(74495, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20785, 76, NULL, NULL, '2020-01-24 11:34:54', '2020-01-24 11:34:54', 20984, NULL),
(74497, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20665, 76, NULL, NULL, '2020-01-24 14:45:58', '2020-01-24 14:45:58', 20987, NULL),
(74498, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20665, 76, NULL, NULL, '2020-01-24 14:46:05', '2020-01-24 14:46:05', 20988, NULL),
(74499, 'eventregistration', '7F702346F27140838', 10, '2020-02-06', 1, 'Success', NULL, NULL, NULL, NULL, 20131, 80, NULL, NULL, '2020-02-06 17:49:21', '2020-02-06 17:49:58', 20991, NULL),
(74500, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20131, 79, NULL, NULL, '2020-02-06 17:50:27', '2020-02-06 17:50:27', 20992, NULL),
(74501, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10086, 79, NULL, NULL, '2020-02-06 17:52:21', '2020-02-06 17:52:21', 20994, NULL),
(74502, 'eventregistration', '2MY19043DS7511814', 10, '2020-02-06', 1, 'Success', NULL, NULL, NULL, NULL, 20558, 80, NULL, NULL, '2020-02-06 18:15:07', '2020-02-06 18:16:22', 20995, NULL),
(74503, 'eventregistration', '46876030U3959620D', 10, '2020-02-06', 1, 'Success', NULL, NULL, NULL, NULL, 20159, 80, NULL, NULL, '2020-02-06 18:35:40', '2020-02-06 18:36:11', 20996, NULL),
(74504, 'eventregistration', '7.35355E+16', 10, '2020-02-06', 1, 'Success', NULL, NULL, NULL, NULL, 20207, 80, NULL, NULL, '2020-02-06 20:15:14', '2020-02-06 20:15:38', 20997, NULL),
(74505, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20202, 79, NULL, NULL, '2020-02-06 21:00:53', '2020-02-06 21:00:53', 20998, NULL),
(74506, 'eventregistration', '9AH46827TK551561C', 10, '2020-02-06', 1, 'Success', NULL, NULL, NULL, NULL, 20202, 80, NULL, NULL, '2020-02-06 21:02:41', '2020-02-06 21:04:01', 20999, NULL),
(74507, 'eventregistration', '4H740344649812635', 10, '2020-02-06', 1, 'Success', NULL, NULL, NULL, NULL, 20708, 80, NULL, NULL, '2020-02-06 21:26:14', '2020-02-06 21:30:52', 21001, NULL),
(74508, 'eventregistration', '0UP625032E9575703', 10, '2020-02-06', 1, 'Success', NULL, NULL, NULL, NULL, 20687, 80, NULL, NULL, '2020-02-06 21:55:30', '2020-02-06 21:56:39', 21002, NULL),
(74509, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20111, 79, NULL, NULL, '2020-02-06 22:22:24', '2020-02-06 22:22:24', 21003, NULL),
(74510, 'eventregistration', '6TF703000V377093T', 20, '2020-02-06', 1, 'Success', NULL, NULL, NULL, NULL, 20908, 80, NULL, NULL, '2020-02-06 23:35:39', '2020-02-06 23:36:15', 21004, NULL),
(74511, 'eventregistration', '1MP101949G665211A', 10, NULL, 1, 'Success', NULL, NULL, NULL, NULL, 20568, 80, NULL, NULL, '2020-02-07 09:37:29', '2020-02-08 10:39:01', 21005, NULL),
(74512, 'eventregistration', '29L98311U7751010S', 10, '2020-02-07', 1, 'Success', NULL, NULL, NULL, NULL, 20147, 80, NULL, NULL, '2020-02-07 11:47:50', '2020-02-07 11:49:15', 21008, NULL),
(74513, 'eventregistration', '07E59982V5325191L', 10, '2020-02-07', 1, 'Success', NULL, NULL, NULL, NULL, 10062, 80, NULL, NULL, '2020-02-07 11:54:02', '2020-02-07 12:11:13', 21009, NULL),
(74514, 'eventregistration', '9KA29498M6548722J', 10, '2020-02-07', 1, 'Success', NULL, NULL, NULL, NULL, 21003, 80, NULL, NULL, '2020-02-07 12:15:00', '2020-02-07 12:18:34', 21010, NULL),
(74515, 'eventregistration', '2DK68592SK150604M', 10, '2020-02-07', 1, 'Success', NULL, NULL, NULL, NULL, 20697, 80, NULL, NULL, '2020-02-07 15:48:28', '2020-02-07 15:49:56', 21012, NULL),
(74518, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20568, 79, NULL, NULL, '2020-02-08 09:58:53', '2020-02-08 09:58:53', 21018, NULL),
(74519, 'eventregistration', '6AS78779KV515673U', 20, '2020-02-10', 1, 'Success', NULL, NULL, NULL, NULL, 20230, 80, NULL, NULL, '2020-02-10 10:34:49', '2020-02-10 10:35:30', 21024, NULL),
(74520, 'eventregistration', '9MA03485CT070860K', 10, '2020-02-10', 1, 'Success', NULL, NULL, NULL, NULL, 20162, 80, NULL, NULL, '2020-02-10 11:55:28', '2020-02-10 11:55:58', 21025, NULL),
(74521, 'eventregistration', '65J18061NR4522403', 10, '2020-02-10', 1, 'Success', NULL, NULL, NULL, NULL, 20808, 80, NULL, NULL, '2020-02-10 18:57:01', '2020-02-10 19:00:37', 21027, NULL),
(74524, 'eventregistration', '4B740810B8462784U', 20, '2020-02-11', 1, 'Success', NULL, NULL, NULL, NULL, 20808, 80, NULL, NULL, '2020-02-11 15:41:24', '2020-02-11 15:44:06', 21031, NULL),
(74525, 'eventregistration', '8F364162A48791214', 10, '2020-02-11', 1, 'Success', NULL, NULL, NULL, NULL, 20701, 80, NULL, NULL, '2020-02-11 21:52:36', '2020-02-11 21:54:00', 21033, NULL),
(74526, 'eventregistration', '22E67723EJ664931S', 10, '2020-02-12', 1, 'Success', NULL, NULL, NULL, NULL, 20241, 80, NULL, NULL, '2020-02-12 07:04:57', '2020-02-12 07:05:31', 21034, NULL),
(74527, 'eventregistration', '3JP488095P685702U', 10, '2020-02-13', 1, 'Success', NULL, NULL, NULL, NULL, 20858, 80, NULL, NULL, '2020-02-13 17:05:35', '2020-02-13 17:06:52', 21042, NULL),
(74528, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20521, 79, NULL, NULL, '2020-02-16 22:42:25', '2020-02-16 22:42:25', 21044, NULL),
(74529, 'eventregistration', '06S17217Y3203424E', 10, '2020-02-17', 1, 'Success', NULL, NULL, NULL, NULL, 20286, 80, NULL, NULL, '2020-02-17 19:06:37', '2020-02-17 19:09:01', 21048, NULL),
(74530, 'eventregistration', '6H6231066H7008936', 85, '2020-02-17', 1, 'Success', NULL, NULL, NULL, NULL, 20353, 80, NULL, NULL, '2020-02-17 22:57:15', '2020-02-17 22:59:22', 21055, NULL),
(74531, 'eventregistration', '2W312582R3755014U', 10, '2020-02-19', 1, 'Success', NULL, NULL, NULL, NULL, 20949, 80, NULL, NULL, '2020-02-19 16:14:43', '2020-02-19 16:25:55', 21057, NULL),
(74532, 'eventregistration', '5KC976150G632825D', 10, '2020-02-19', 1, 'Success', NULL, NULL, NULL, NULL, 20134, 82, NULL, NULL, '2020-02-19 23:55:43', '2020-02-19 23:56:54', 21062, NULL),
(74533, 'eventregistration', '0KE09948D43254147', 10, '2020-02-20', 1, 'Success', NULL, NULL, NULL, NULL, 20159, 82, NULL, NULL, '2020-02-20 07:16:47', '2020-02-20 07:20:45', 31062, NULL),
(74534, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20159, 79, NULL, NULL, '2020-02-20 09:02:18', '2020-02-20 09:02:18', 31063, NULL),
(74535, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20558, 79, NULL, NULL, '2020-02-20 09:23:09', '2020-02-20 09:23:09', 31064, NULL),
(74536, 'eventregistration', '9AU198200K967605V', 10, '2020-02-21', 1, 'Success', NULL, NULL, NULL, NULL, 20994, 80, NULL, NULL, '2020-02-21 07:48:47', '2020-02-21 11:57:56', 31071, NULL),
(74537, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10032, 79, NULL, NULL, '2020-02-21 10:51:22', '2020-02-21 10:51:22', 31072, NULL),
(74538, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10032, 79, NULL, NULL, '2020-02-21 10:51:30', '2020-02-21 10:51:30', 31073, NULL),
(74539, 'eventregistration', '5DE72141JJ613974A', 10, '2020-02-21', 1, 'Success', NULL, NULL, NULL, NULL, 20138, 80, NULL, NULL, '2020-02-21 11:21:48', '2020-02-21 11:25:26', 31074, NULL),
(74540, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20865, 79, NULL, NULL, '2020-02-21 11:45:25', '2020-02-21 11:45:25', 31075, NULL),
(74541, 'eventregistration', '5CS836999M0830549', 10, '2020-02-22', 1, 'Success', NULL, NULL, NULL, NULL, 20996, 80, NULL, NULL, '2020-02-22 09:15:28', '2020-02-22 09:18:35', 31076, NULL),
(74542, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20692, 79, NULL, NULL, '2020-02-22 19:15:17', '2020-02-22 19:15:17', 31081, NULL),
(74544, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20162, 79, NULL, NULL, '2020-02-22 19:29:06', '2020-02-22 19:29:06', 31083, NULL),
(74545, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20388, 79, NULL, NULL, '2020-02-23 10:53:25', '2020-02-23 10:53:25', 31087, NULL),
(74546, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20278, 79, NULL, NULL, '2020-02-23 21:25:39', '2020-02-23 21:25:39', 31091, NULL),
(74547, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20241, 79, NULL, NULL, '2020-02-24 09:48:43', '2020-02-24 09:48:43', 31097, NULL),
(74549, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20364, 79, NULL, NULL, '2020-02-24 16:47:38', '2020-02-24 16:47:38', 31110, NULL),
(74551, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10062, 79, NULL, NULL, '2020-02-25 18:28:04', '2020-02-25 18:28:04', 31114, NULL),
(74553, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20832, 79, NULL, NULL, '2020-02-27 18:41:00', '2020-02-27 18:41:00', 31120, NULL),
(74554, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20292, 79, NULL, NULL, '2020-02-27 19:20:52', '2020-02-27 19:20:52', 31121, NULL),
(74555, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20880, 79, NULL, NULL, '2020-02-28 00:29:59', '2020-02-28 00:29:59', 31122, NULL),
(74556, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20788, 79, NULL, NULL, '2020-02-28 16:54:57', '2020-02-28 16:54:57', 31129, NULL),
(74557, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20858, 79, NULL, NULL, '2020-02-28 17:16:40', '2020-02-28 17:16:40', 31130, NULL),
(74558, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10032, 79, NULL, NULL, '2020-02-28 18:16:58', '2020-02-28 18:16:58', 31131, NULL),
(74559, 'eventregistration', '3GU75632HD059710A', 10, '2020-02-28', 1, 'Success', NULL, NULL, NULL, NULL, 20995, 80, NULL, NULL, '2020-02-28 21:24:10', '2020-02-28 21:26:43', 31132, NULL),
(74560, 'eventregistration', '8DC20430AL161131A', 10, '2020-02-28', 1, 'Success', NULL, NULL, NULL, NULL, 20776, 80, NULL, NULL, '2020-02-28 21:45:20', '2020-02-28 21:50:27', 31133, NULL),
(74561, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20584, 79, NULL, NULL, '2020-02-29 10:34:42', '2020-02-29 10:34:42', 31136, NULL),
(74562, 'eventregistration', '4VY644548D556354T', 10, '2020-03-01', 1, 'Success', NULL, NULL, NULL, NULL, 20118, 80, NULL, NULL, '2020-03-01 16:20:00', '2020-03-01 16:22:12', 31137, NULL),
(74565, 'eventregistration', '2Y714259S3538970G', 25, '2020-03-06', 1, 'Success', NULL, NULL, NULL, NULL, 20788, 80, NULL, NULL, '2020-03-06 16:17:55', '2020-03-06 16:20:31', 31144, NULL),
(74566, 'eventregistration', '8W3126459B5231524', 10, '2020-03-07', 1, 'Success', NULL, NULL, NULL, NULL, 20918, 80, NULL, NULL, '2020-03-07 18:10:23', '2020-03-07 18:12:09', 31150, NULL),
(74567, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20101, 84, NULL, NULL, '2020-03-22 16:20:32', '2020-03-22 16:20:32', 31156, NULL),
(74568, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20101, 84, NULL, NULL, '2020-03-22 16:20:39', '2020-03-22 16:20:39', 31157, NULL),
(74569, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20766, 84, NULL, NULL, '2020-03-23 09:16:11', '2020-03-23 09:16:11', 31159, NULL),
(74570, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20621, 84, NULL, NULL, '2020-03-23 11:51:06', '2020-03-23 11:51:06', 31160, NULL),
(74571, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20621, 84, NULL, NULL, '2020-03-23 12:49:34', '2020-03-23 12:49:34', 31162, NULL),
(74572, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20267, 84, NULL, NULL, '2020-03-23 13:12:30', '2020-03-23 13:12:30', 31163, NULL),
(74573, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20267, 84, NULL, NULL, '2020-03-23 13:16:08', '2020-03-23 13:16:08', 31164, NULL),
(74574, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20827, 84, NULL, NULL, '2020-03-23 15:05:35', '2020-03-23 15:05:35', 31166, NULL),
(74579, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20558, 85, NULL, NULL, '2020-03-26 08:48:10', '2020-03-26 08:48:10', 31201, NULL),
(74581, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20118, 85, NULL, NULL, '2020-03-26 17:17:20', '2020-03-26 17:17:20', 31206, NULL),
(74582, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20827, 84, NULL, NULL, '2020-03-27 13:48:13', '2020-03-27 13:48:13', 31210, NULL),
(74583, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20912, 84, NULL, NULL, '2020-03-27 13:54:02', '2020-03-27 13:54:02', 31211, NULL),
(74584, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21012, 84, NULL, NULL, '2020-03-28 11:20:12', '2020-03-28 11:20:12', 31214, NULL),
(74585, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21012, 85, NULL, NULL, '2020-03-28 11:20:50', '2020-03-28 11:20:50', 31215, NULL),
(74586, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20600, 84, NULL, NULL, '2020-03-28 12:20:38', '2020-03-28 12:20:38', 31216, NULL),
(74587, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20918, 84, NULL, NULL, '2020-03-28 14:12:06', '2020-03-28 14:12:06', 31219, NULL),
(74588, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20600, 84, NULL, NULL, '2020-03-28 14:28:03', '2020-03-28 14:28:03', 31221, NULL),
(74589, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20600, 84, NULL, NULL, '2020-03-28 14:28:08', '2020-03-28 14:28:08', 31222, NULL),
(74590, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20170, 84, NULL, NULL, '2020-03-28 15:40:43', '2020-03-28 15:40:43', 31227, NULL),
(74591, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20853, 85, NULL, NULL, '2020-03-29 08:09:23', '2020-03-29 08:09:23', 31244, NULL),
(74592, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21046, 85, NULL, NULL, '2020-03-29 08:58:13', '2020-03-29 08:58:13', 31246, NULL),
(74594, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20990, 85, NULL, NULL, '2020-03-29 13:09:20', '2020-03-29 13:09:20', 31253, NULL),
(74595, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20990, 85, NULL, NULL, '2020-03-29 13:10:02', '2020-03-29 13:10:02', 31254, NULL),
(74596, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20558, 86, NULL, NULL, '2020-04-02 13:48:02', '2020-04-02 13:48:02', 31259, NULL),
(74598, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20364, 86, NULL, NULL, '2020-04-03 13:31:05', '2020-04-03 13:31:05', 31267, NULL),
(74599, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20118, 86, NULL, NULL, '2020-04-03 17:51:27', '2020-04-03 17:51:27', 31268, NULL),
(74600, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20687, 86, NULL, NULL, '2020-04-03 20:34:16', '2020-04-03 20:34:16', 31272, NULL),
(74601, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20568, 86, NULL, NULL, '2020-04-03 22:53:57', '2020-04-03 22:53:57', 31276, NULL),
(74602, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20853, 86, NULL, NULL, '2020-04-04 13:01:48', '2020-04-04 13:01:48', 31282, NULL),
(74603, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20134, 86, NULL, NULL, '2020-04-04 17:58:18', '2020-04-04 17:58:18', 31284, NULL),
(74604, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20568, 87, NULL, NULL, '2020-04-06 21:05:58', '2020-04-10 22:09:20', 31286, NULL),
(74605, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21031, 87, NULL, NULL, '2020-04-07 11:50:23', '2020-04-07 11:50:23', 31288, NULL),
(74606, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20853, 87, NULL, NULL, '2020-04-07 12:06:55', '2020-04-07 12:06:55', 31289, NULL),
(74607, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20853, 87, NULL, NULL, '2020-04-07 12:07:26', '2020-04-07 12:07:26', 31290, NULL),
(74608, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20853, 87, NULL, NULL, '2020-04-07 12:17:13', '2020-04-07 12:17:13', 31291, NULL),
(74609, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20836, 87, NULL, NULL, '2020-04-07 17:18:17', '2020-04-07 17:18:17', 31292, NULL),
(74612, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20307, 87, NULL, NULL, '2020-04-09 07:39:52', '2020-04-09 07:39:52', 31295, NULL),
(74613, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20779, 87, NULL, NULL, '2020-04-09 07:54:30', '2020-04-09 07:54:30', 31296, NULL),
(74614, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20558, 87, NULL, NULL, '2020-04-09 08:38:44', '2020-04-09 08:38:44', 31297, NULL),
(74615, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20621, 87, NULL, NULL, '2020-04-09 09:04:19', '2020-04-09 09:04:19', 31298, NULL),
(74616, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20889, 87, NULL, NULL, '2020-04-09 09:13:31', '2020-04-09 09:13:31', 31299, NULL),
(74618, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20913, 87, NULL, NULL, '2020-04-09 20:08:17', '2020-04-09 20:08:17', 31301, NULL),
(74619, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20159, 87, NULL, NULL, '2020-04-09 20:48:08', '2020-04-09 20:48:08', 31302, NULL),
(74620, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10067, 87, NULL, NULL, '2020-04-09 21:45:14', '2020-04-09 21:45:14', 31303, NULL),
(74621, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20766, 87, NULL, NULL, '2020-04-10 07:34:39', '2020-04-10 07:34:39', 31304, NULL);
INSERT INTO `transactions` (`id`, `reference`, `transaction_id`, `amount`, `transaction_date`, `payment_method_id`, `payment_status`, `bank_name`, `cheque_no`, `cheque_date`, `cheque_amount`, `user_id`, `event_id`, `admin_comment`, `user_comment`, `created_at`, `updated_at`, `event_registration_id`, `donation_id`) VALUES
(74622, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20788, 87, NULL, NULL, '2020-04-10 16:12:20', '2020-04-10 16:12:20', 31305, NULL),
(74623, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20912, 87, NULL, NULL, '2020-04-10 19:51:25', '2020-04-10 19:51:25', 31307, NULL),
(74624, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20808, 87, NULL, NULL, '2020-04-10 19:55:23', '2020-04-10 19:55:23', 31308, NULL),
(74625, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20903, 87, NULL, NULL, '2020-04-10 20:18:24', '2020-04-10 20:18:24', 31309, NULL),
(74626, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20708, 87, NULL, NULL, '2020-04-10 21:19:24', '2020-04-10 21:19:24', 31310, NULL),
(74627, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20910, 87, NULL, NULL, '2020-04-10 22:50:18', '2020-04-10 22:50:18', 31311, NULL),
(74628, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21009, 87, NULL, NULL, '2020-04-11 09:13:46', '2020-04-11 09:13:46', 31312, NULL),
(74629, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20988, 87, NULL, NULL, '2020-04-11 09:22:27', '2020-04-11 09:22:27', 31313, NULL),
(74630, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20307, 87, NULL, NULL, '2020-04-11 09:23:42', '2020-04-11 09:23:42', 31314, NULL),
(74631, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20388, 87, NULL, NULL, '2020-04-11 10:11:59', '2020-04-11 10:11:59', 31317, NULL),
(74632, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20803, 87, NULL, NULL, '2020-04-11 10:31:35', '2020-04-11 10:31:35', 31318, NULL),
(74633, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20803, 87, NULL, NULL, '2020-04-11 10:31:42', '2020-04-11 10:31:42', 31319, NULL),
(74634, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20688, 87, NULL, NULL, '2020-04-11 11:22:29', '2020-04-11 11:22:29', 31320, NULL),
(74635, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20865, 87, NULL, NULL, '2020-04-11 12:26:24', '2020-04-11 12:26:24', 31322, NULL),
(74636, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20992, 87, NULL, NULL, '2020-04-11 12:32:31', '2020-04-11 12:32:31', 31323, NULL),
(74637, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21023, 87, NULL, NULL, '2020-04-11 13:34:31', '2020-04-11 13:34:31', 31324, NULL),
(74638, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10086, 87, NULL, NULL, '2020-04-11 15:01:53', '2020-04-11 15:01:53', 31327, NULL),
(74639, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20364, 87, NULL, NULL, '2020-04-11 15:10:20', '2020-04-11 15:10:20', 31328, NULL),
(74640, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20688, 87, NULL, NULL, '2020-04-11 15:10:56', '2020-04-11 15:10:56', 31329, NULL),
(74642, 'eventregistration', '3UP00091JF675643C', 51, '2020-04-15', 1, 'Success', NULL, NULL, NULL, NULL, 10067, 88, NULL, NULL, '2020-04-15 08:56:19', '2020-04-15 08:56:50', 31336, NULL),
(74643, 'eventregistration', '2V425213DX352110V', 102, '2020-04-15', 1, 'Success', NULL, NULL, NULL, NULL, 20134, 88, NULL, NULL, '2020-04-15 10:29:55', '2020-04-15 10:31:35', 31337, NULL),
(74644, 'eventregistration', '5DP12257SS875821T', 51, '2020-04-15', 1, 'Success', NULL, NULL, NULL, NULL, 20665, 88, NULL, NULL, '2020-04-15 11:02:18', '2020-04-15 11:04:16', 31338, NULL),
(74645, 'eventregistration', '0KD176469H4010128', 51, '2020-04-15', 1, 'Success', NULL, NULL, NULL, NULL, 20241, 88, NULL, NULL, '2020-04-15 12:02:12', '2020-04-15 12:04:01', 31339, NULL),
(74646, 'eventregistration', '0CX765447X407832A', 51, '2020-04-15', 1, 'Success', NULL, NULL, NULL, NULL, 20230, 88, NULL, NULL, '2020-04-15 15:34:04', '2020-04-15 15:34:28', 31341, NULL),
(74647, 'eventregistration', '4TV33850S2194860E', 51, '2020-04-15', 1, 'Success', NULL, NULL, NULL, NULL, 20207, 88, NULL, NULL, '2020-04-15 17:28:02', '2020-04-15 17:28:39', 31343, NULL),
(74648, 'eventregistration', '43G48442Y73664010', 51, '2020-04-15', 1, 'Success', NULL, NULL, NULL, NULL, 20579, 88, NULL, NULL, '2020-04-15 21:30:19', '2020-04-15 21:32:23', 31345, NULL),
(74650, 'eventregistration', NULL, 51, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20808, 88, NULL, NULL, '2020-04-15 21:43:46', '2020-04-15 21:43:46', 31348, NULL),
(74651, 'eventregistration', '6DP0997232404354M', 51, '2020-04-16', 1, 'Success', NULL, NULL, NULL, NULL, 10032, 88, NULL, NULL, '2020-04-16 09:11:33', '2020-04-16 09:16:50', 31351, NULL),
(74652, 'eventregistration', '75U72711C3959302X', 51, '2020-04-16', 1, 'Success', NULL, NULL, NULL, NULL, 20601, 88, NULL, NULL, '2020-04-16 09:29:52', '2020-04-16 09:32:27', 31352, NULL),
(74653, 'eventregistration', '99760999GG917894X', 51, '2020-04-16', 1, 'Success', NULL, NULL, NULL, NULL, 20292, 88, NULL, NULL, '2020-04-16 09:52:54', '2020-04-16 09:55:47', 31353, NULL),
(74654, 'eventregistration', '51V14877MA623625P', 51, '2020-04-16', 1, 'Success', NULL, NULL, NULL, NULL, 20687, 88, NULL, NULL, '2020-04-16 10:00:46', '2020-04-16 10:03:42', 31354, NULL),
(74655, 'eventregistration', '1XF38307RD0985845', 51, '2020-04-16', 1, 'Success', NULL, NULL, NULL, NULL, 20912, 88, NULL, NULL, '2020-04-16 10:45:29', '2020-04-16 10:48:41', 31355, NULL),
(74656, 'eventregistration', '8F723147FM573763Y', 51, '2020-04-16', 1, 'Success', NULL, NULL, NULL, NULL, 10062, 88, NULL, NULL, '2020-04-16 10:54:18', '2020-04-16 10:55:06', 31356, NULL),
(74657, 'eventregistration', NULL, 51, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20203, 88, NULL, NULL, '2020-04-16 11:42:06', '2020-04-16 11:42:06', 31357, NULL),
(74658, 'eventregistration', '0SE04394NL497451Y', 51, '2020-04-16', 1, 'Success', NULL, NULL, NULL, NULL, 20558, 88, NULL, NULL, '2020-04-16 13:26:08', '2020-04-16 13:28:32', 31361, NULL),
(74659, 'eventregistration', '25V85398WK411921A', 51, '2020-04-16', 1, 'Success', NULL, NULL, NULL, NULL, 20568, 88, NULL, NULL, '2020-04-16 17:13:22', '2020-04-16 17:15:14', 31364, NULL),
(74660, 'eventregistration', NULL, 51, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20851, 88, NULL, NULL, '2020-04-16 18:17:28', '2020-04-16 18:17:28', 31365, NULL),
(74661, 'eventregistration', '5JK47311FC904464Y', 51, '2020-04-16', 1, 'Success', NULL, NULL, NULL, NULL, 20851, 88, NULL, NULL, '2020-04-16 18:18:03', '2020-04-17 16:25:35', 31366, NULL),
(74662, 'eventregistration', '7HJ83586X7010994B', 51, '2020-04-16', 1, 'Success', NULL, NULL, NULL, NULL, 20808, 88, NULL, NULL, '2020-04-16 18:22:53', '2020-04-16 18:26:18', 31367, NULL),
(74664, 'eventregistration', '9EK64405RB599635H', 51, '2020-04-17', 1, 'Success', NULL, NULL, NULL, NULL, 21003, 88, NULL, NULL, '2020-04-17 07:43:55', '2020-04-17 07:44:49', 31380, NULL),
(74665, 'eventregistration', '3FY233681N052392H', 51, '2020-04-17', 1, 'Success', NULL, NULL, NULL, NULL, 10086, 88, NULL, NULL, '2020-04-17 07:56:08', '2020-04-17 07:57:43', 31381, NULL),
(74666, 'eventregistration', '3UY2759505460952K', 51, '2020-04-17', 1, 'Success', NULL, NULL, NULL, NULL, 20773, 88, NULL, NULL, '2020-04-17 10:57:28', '2020-04-17 11:00:24', 31389, NULL),
(74667, 'eventregistration', '7YM27723D9356734G', 51, '2020-04-17', 1, 'Success', NULL, NULL, NULL, NULL, 21018, 88, NULL, NULL, '2020-04-17 12:36:11', '2020-04-17 12:37:46', 31392, NULL),
(74668, 'eventregistration', '6FJ59762NL567430R', 51, '2020-04-17', 1, 'Success', NULL, NULL, NULL, NULL, 20853, 88, NULL, NULL, '2020-04-17 15:25:36', '2020-04-17 15:26:10', 31394, NULL),
(74671, 'eventregistration', '8R155592L1070671Y', 51, '2020-04-17', 1, 'Success', NULL, NULL, NULL, NULL, 20721, 88, NULL, NULL, '2020-04-17 16:28:11', '2020-04-17 16:28:45', 31397, NULL),
(74672, 'eventregistration', '55U25004371584219', 51, '2020-04-17', 1, 'Success', NULL, NULL, NULL, NULL, 20708, 88, NULL, NULL, '2020-04-17 20:35:05', '2020-04-17 20:38:19', 31402, NULL),
(74673, 'eventregistration', '9TH12937810738212', 51, '2020-04-17', 1, 'Success', NULL, NULL, NULL, NULL, 20766, 88, NULL, NULL, '2020-04-18 00:17:05', '2020-04-18 00:18:57', 31409, NULL),
(74674, 'eventregistration', '135513654L890620N', 51, '2020-04-18', 1, 'Success', NULL, NULL, NULL, NULL, 20910, 88, NULL, NULL, '2020-04-18 07:54:16', '2020-04-18 07:55:01', 31414, NULL),
(74675, 'eventregistration', '0JL483621N1447934', 51, '2020-04-18', 1, 'Success', NULL, NULL, NULL, NULL, 20804, 88, NULL, NULL, '2020-04-18 08:05:34', '2020-04-18 08:09:44', 31415, NULL),
(74676, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10032, 89, NULL, NULL, '2020-04-25 10:58:45', '2020-04-25 10:58:45', 31423, NULL),
(74677, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20558, 91, NULL, NULL, '2020-04-27 13:46:30', '2020-04-27 13:46:30', 31425, NULL),
(74678, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20568, 91, NULL, NULL, '2020-04-27 13:46:39', '2020-04-27 13:46:39', 31426, NULL),
(74679, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20558, 91, NULL, NULL, '2020-04-27 13:47:31', '2020-04-27 13:47:31', 31427, NULL),
(74680, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20568, 91, NULL, NULL, '2020-04-27 13:48:21', '2020-04-27 13:48:21', 31428, NULL),
(74681, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20558, 91, NULL, NULL, '2020-04-27 13:48:49', '2020-04-27 13:48:49', 31429, NULL),
(74682, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20558, 91, NULL, NULL, '2020-04-27 13:50:13', '2020-04-27 13:50:13', 31430, NULL),
(74683, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10086, 91, NULL, NULL, '2020-04-29 11:41:15', '2020-04-29 11:41:15', 31437, NULL),
(74684, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20558, 92, NULL, NULL, '2020-04-29 12:05:25', '2020-04-29 12:05:25', 31441, NULL),
(74685, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20687, 92, NULL, NULL, '2020-04-29 12:53:09', '2020-04-29 12:53:09', 31444, NULL),
(74686, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20621, 92, NULL, NULL, '2020-04-29 15:59:03', '2020-04-29 15:59:03', 31447, NULL),
(74687, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20766, 92, NULL, NULL, '2020-04-29 19:26:13', '2020-04-29 19:26:13', 31448, NULL),
(74688, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20779, 92, NULL, NULL, '2020-04-29 19:29:51', '2020-04-29 19:29:51', 31449, NULL),
(74690, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20162, 89, NULL, NULL, '2020-04-29 20:44:27', '2020-04-29 20:44:27', 31452, NULL),
(74691, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10080, 92, NULL, NULL, '2020-04-30 14:56:32', '2020-04-30 14:56:32', 31458, NULL),
(74692, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10067, 89, NULL, NULL, '2020-04-30 23:51:17', '2020-04-30 23:51:17', 31459, NULL),
(74693, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10067, 91, NULL, NULL, '2020-04-30 23:51:44', '2020-04-30 23:51:44', 31460, NULL),
(74694, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10067, 90, NULL, NULL, '2020-04-30 23:52:07', '2020-04-30 23:52:07', 31461, NULL),
(74695, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20558, 90, NULL, NULL, '2020-05-01 11:57:48', '2020-05-01 11:57:48', 31462, NULL),
(74696, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20992, 91, NULL, NULL, '2020-05-01 14:50:02', '2020-05-01 14:50:02', 31463, NULL),
(74697, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20992, 91, NULL, NULL, '2020-05-01 14:50:04', '2020-05-01 14:50:04', 31464, NULL),
(74698, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20992, 90, NULL, NULL, '2020-05-01 14:50:53', '2020-05-01 14:50:53', 31465, NULL),
(74700, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20853, 90, NULL, NULL, '2020-05-04 15:40:28', '2020-05-04 15:40:28', 31468, NULL),
(74701, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20738, 90, NULL, NULL, '2020-05-04 19:14:50', '2020-05-04 19:14:50', 31469, NULL),
(74702, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20827, 90, NULL, NULL, '2020-05-05 23:02:43', '2020-05-05 23:02:43', 31470, NULL),
(74703, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20600, 90, NULL, NULL, '2020-05-06 10:39:34', '2020-05-06 10:39:34', 31472, NULL),
(74704, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20568, 90, NULL, NULL, '2020-05-07 19:12:07', '2020-05-07 19:16:25', 31473, NULL),
(74705, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20697, 90, NULL, NULL, '2020-05-08 19:06:00', '2020-05-08 19:06:00', 31475, NULL),
(74706, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20708, 90, NULL, NULL, '2020-05-08 20:05:29', '2020-05-08 20:05:29', 31476, NULL),
(74707, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20708, 90, NULL, NULL, '2020-05-08 20:10:32', '2020-05-08 20:10:32', 31477, NULL),
(74709, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20912, 91, NULL, NULL, '2020-05-16 17:38:58', '2020-05-16 17:38:58', 31479, NULL),
(74710, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20207, 91, NULL, NULL, '2020-05-17 17:14:44', '2020-05-17 17:14:44', 31480, NULL),
(74711, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20134, 91, NULL, NULL, '2020-05-18 13:01:59', '2020-05-18 13:01:59', 31482, NULL),
(74712, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20738, 91, NULL, NULL, '2020-05-19 09:36:45', '2020-05-19 09:36:45', 31483, NULL),
(74713, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20207, 91, NULL, NULL, '2020-05-19 09:54:06', '2020-05-19 09:54:06', 31484, NULL),
(74714, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20207, 91, NULL, NULL, '2020-05-19 09:54:22', '2020-05-19 09:54:22', 31485, NULL),
(74715, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20241, 91, NULL, NULL, '2020-05-19 10:49:26', '2020-05-19 10:49:26', 31486, NULL),
(74716, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20779, 91, NULL, NULL, '2020-05-19 11:06:26', '2020-05-19 11:06:26', 31487, NULL),
(74717, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10067, 91, NULL, NULL, '2020-05-21 13:20:44', '2020-05-21 13:20:44', 31494, NULL),
(74719, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20708, 91, NULL, NULL, '2020-05-21 20:19:54', '2020-05-21 20:19:54', 31497, NULL),
(74720, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20118, 91, NULL, NULL, '2020-05-23 17:29:52', '2020-05-23 17:29:52', 31500, NULL),
(74721, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20568, 91, NULL, NULL, '2020-05-25 09:03:35', '2020-05-25 09:03:35', 31504, NULL),
(74722, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20697, 91, NULL, NULL, '2020-05-26 11:31:18', '2020-05-26 11:31:18', 31506, NULL),
(74723, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20697, 91, NULL, NULL, '2020-05-26 11:33:15', '2020-05-26 11:33:15', 31507, NULL),
(74724, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20174, 91, NULL, NULL, '2020-05-26 16:29:14', '2020-05-26 16:29:14', 31508, NULL),
(74725, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20174, 91, NULL, NULL, '2020-05-26 16:29:21', '2020-05-26 16:29:21', 31509, NULL),
(74726, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20174, 91, NULL, NULL, '2020-05-26 16:30:07', '2020-05-26 16:30:07', 31510, NULL),
(74727, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20687, 91, NULL, NULL, '2020-05-29 09:29:06', '2020-05-29 09:29:06', 31518, NULL),
(74728, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20979, 91, NULL, NULL, '2020-05-29 10:01:47', '2020-05-29 10:01:47', 31519, NULL),
(74730, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20880, 91, NULL, NULL, '2020-05-29 19:44:45', '2020-05-29 19:44:45', 31522, NULL),
(74731, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20836, 94, NULL, NULL, '2020-07-04 14:01:38', '2020-07-04 14:01:38', 31525, NULL),
(74732, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20836, 94, NULL, NULL, '2020-07-04 14:02:09', '2020-07-04 14:02:09', 31526, NULL),
(74733, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20836, 95, NULL, NULL, '2020-07-04 14:03:28', '2020-07-04 14:03:28', 31527, NULL),
(74734, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20836, 95, NULL, NULL, '2020-07-04 14:03:55', '2020-07-04 14:03:55', 31528, NULL),
(74735, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20558, 94, NULL, NULL, '2020-07-04 17:02:15', '2020-07-04 17:02:15', 31529, NULL),
(74736, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20558, 94, NULL, NULL, '2020-07-04 17:02:57', '2020-07-04 17:02:57', 31530, NULL),
(74737, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10067, 94, NULL, NULL, '2020-07-07 15:12:12', '2020-07-07 15:12:12', 31532, NULL),
(74738, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10067, 94, NULL, NULL, '2020-07-07 15:13:05', '2020-07-07 15:13:05', 31533, NULL),
(74739, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10067, 94, NULL, NULL, '2020-07-07 15:14:08', '2020-07-07 15:14:08', 31534, NULL),
(74740, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20162, 94, NULL, NULL, '2020-07-07 15:16:01', '2020-07-07 15:16:01', 31535, NULL),
(74741, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20162, 94, NULL, NULL, '2020-07-07 15:16:21', '2020-07-07 15:16:21', 31536, NULL),
(74742, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10067, 95, NULL, NULL, '2020-07-07 15:25:40', '2020-07-07 15:25:40', 31537, NULL),
(74743, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20568, 95, NULL, NULL, '2020-07-07 15:49:04', '2020-07-07 15:49:04', 31538, NULL),
(74744, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20568, 94, NULL, NULL, '2020-07-07 15:55:19', '2020-07-07 15:55:19', 31539, NULL),
(74745, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10086, 95, NULL, NULL, '2020-07-07 15:56:59', '2020-07-07 15:56:59', 31540, NULL),
(74746, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21001, 96, NULL, NULL, '2020-07-07 22:09:30', '2020-07-07 22:09:30', 31545, NULL),
(74747, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21001, 96, NULL, NULL, '2020-07-07 22:10:24', '2020-07-07 22:10:24', 31546, NULL),
(74748, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21001, 96, NULL, NULL, '2020-07-07 22:11:42', '2020-07-07 22:11:42', 31547, NULL),
(74749, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21001, 96, NULL, NULL, '2020-07-07 22:16:53', '2020-07-07 22:16:53', 31548, NULL),
(74750, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21001, 94, NULL, NULL, '2020-07-07 22:18:44', '2020-07-07 22:18:44', 31549, NULL),
(74751, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20147, 94, NULL, NULL, '2020-07-08 08:43:52', '2020-07-08 08:43:52', 31555, NULL),
(74752, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20568, 94, NULL, NULL, '2020-07-08 09:18:34', '2020-07-08 09:18:34', 31556, NULL),
(74753, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20568, 96, NULL, NULL, '2020-07-08 09:19:04', '2020-07-08 09:19:04', 31557, NULL),
(74754, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20836, 94, NULL, NULL, '2020-07-08 10:08:35', '2020-07-08 10:08:35', 31559, NULL),
(74755, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21001, 96, NULL, NULL, '2020-07-09 10:28:11', '2020-07-09 10:28:11', 31574, NULL),
(74756, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21001, 94, NULL, NULL, '2020-07-09 11:04:16', '2020-07-09 11:04:16', 31575, NULL),
(74757, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10086, 96, NULL, NULL, '2020-07-14 09:02:06', '2020-07-14 09:02:06', 31578, NULL),
(74758, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20521, 96, NULL, NULL, '2020-07-15 08:56:16', '2020-07-15 08:56:16', 31579, NULL),
(74759, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20147, 96, NULL, NULL, '2020-07-15 10:10:41', '2020-07-15 10:10:41', 31580, NULL),
(74760, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10067, 96, NULL, NULL, '2020-07-15 10:14:21', '2020-07-15 10:14:21', 31581, NULL),
(74762, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20836, 95, NULL, NULL, '2020-07-19 09:11:56', '2020-07-19 09:11:56', 31586, NULL),
(74763, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20836, 95, NULL, NULL, '2020-07-19 09:12:20', '2020-07-19 09:12:20', 31587, NULL),
(74764, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20836, 95, NULL, NULL, '2020-07-19 09:12:21', '2020-07-19 09:12:21', 31588, NULL),
(74765, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20836, 95, NULL, NULL, '2020-07-19 09:12:35', '2020-07-19 09:12:35', 31589, NULL),
(74766, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20836, 95, NULL, NULL, '2020-07-19 09:25:47', '2020-07-19 09:25:47', 31590, NULL),
(74767, 'eventregistration', '9VC50280587263513', 11, '2020-07-26', 1, 'Success', NULL, NULL, NULL, NULL, 20101, 97, NULL, NULL, '2020-07-26 10:06:24', '2020-07-26 10:06:44', 31592, NULL),
(74768, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20708, 98, NULL, NULL, '2020-07-30 19:51:56', '2020-07-30 19:51:56', 31595, NULL),
(74769, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20912, 98, NULL, NULL, '2020-07-31 14:15:42', '2020-07-31 14:15:42', 31596, NULL),
(74770, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20912, 98, NULL, NULL, '2020-07-31 14:15:48', '2020-07-31 14:15:48', 31597, NULL),
(74771, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20918, 98, NULL, NULL, '2020-08-01 11:32:44', '2020-08-01 11:32:44', 31598, NULL),
(74772, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10067, 98, NULL, NULL, '2020-08-01 12:14:55', '2020-08-01 12:14:55', 31600, NULL),
(74773, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20621, 98, NULL, NULL, '2020-08-01 12:16:28', '2020-08-01 12:16:28', 31601, NULL),
(74774, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20738, 98, NULL, NULL, '2020-08-01 12:28:51', '2020-08-01 12:28:51', 31602, NULL),
(74775, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20558, 98, NULL, NULL, '2020-08-01 17:51:06', '2020-08-01 17:51:06', 31605, NULL),
(74776, 'eventregistration', '3DR39691X1859223J', 22, '2020-08-04', 1, 'Success', NULL, NULL, NULL, NULL, 20567, 97, NULL, NULL, '2020-08-04 08:42:45', '2020-08-04 08:46:05', 31612, NULL),
(74777, 'eventregistration', '8CH18777EW177601G', 11, '2020-08-04', 1, 'Success', NULL, NULL, NULL, NULL, 10032, 97, NULL, NULL, '2020-08-04 12:04:23', '2020-08-04 12:06:59', 31613, NULL),
(74778, 'eventregistration', '1U598355W7653551C', 11, '2020-08-16', 1, 'Success', NULL, NULL, NULL, NULL, 20202, 97, NULL, NULL, '2020-08-16 15:10:00', '2020-08-16 15:10:48', 31620, NULL),
(74779, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10086, 97, NULL, NULL, '2020-08-17 16:46:36', '2020-08-17 16:46:36', 31624, NULL),
(74780, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20853, 99, NULL, NULL, '2020-08-18 14:06:06', '2020-08-18 14:06:06', 31626, NULL),
(74781, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20241, 97, NULL, NULL, '2020-08-19 17:35:31', '2020-08-19 17:35:31', 31638, NULL),
(74782, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20779, 97, NULL, NULL, '2020-08-20 08:35:46', '2020-08-20 08:35:46', 31639, NULL),
(74783, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20779, 99, NULL, NULL, '2020-08-20 08:37:42', '2020-08-20 08:37:42', 31640, NULL),
(74784, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20912, 97, NULL, NULL, '2020-08-20 10:16:40', '2020-08-20 10:16:40', 31641, NULL),
(74785, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20972, 99, NULL, NULL, '2020-08-20 16:09:52', '2020-08-20 16:09:52', 31642, NULL),
(74786, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20097, 97, NULL, NULL, '2020-08-20 21:23:44', '2020-08-20 21:23:44', 31646, NULL),
(74787, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10086, 99, NULL, NULL, '2020-08-21 00:04:28', '2020-08-21 00:04:28', 31648, NULL),
(74788, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10086, 97, NULL, NULL, '2020-08-21 00:05:10', '2020-08-21 00:05:10', 31649, NULL),
(74789, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20286, 97, NULL, NULL, '2020-08-21 18:27:36', '2020-08-21 18:27:36', 31661, NULL),
(74790, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20701, 97, NULL, NULL, '2020-08-21 21:19:10', '2020-08-21 21:19:10', 31663, NULL),
(74791, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20988, 97, NULL, NULL, '2020-08-22 07:24:23', '2020-08-22 07:24:23', 31664, NULL),
(74792, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20583, 100, NULL, NULL, '2020-09-08 10:38:20', '2020-09-08 10:38:20', 31666, NULL),
(74793, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20521, 100, NULL, NULL, '2020-09-09 14:14:44', '2020-09-09 14:14:44', 31667, NULL),
(74794, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20202, 100, NULL, NULL, '2020-09-12 11:29:37', '2020-09-12 11:29:37', 31668, NULL),
(74795, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20159, 100, NULL, NULL, '2020-09-13 15:19:08', '2020-09-13 15:19:08', 31669, NULL),
(74796, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20708, 100, NULL, NULL, '2020-09-13 16:59:11', '2020-09-13 16:59:11', 31670, NULL),
(74797, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20766, 100, NULL, NULL, '2020-09-13 23:15:23', '2020-09-13 23:15:23', 31671, NULL),
(74798, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20988, 100, NULL, NULL, '2020-09-14 13:21:18', '2020-09-14 13:21:18', 31673, NULL),
(74799, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21003, 100, NULL, NULL, '2020-09-14 20:31:40', '2020-09-14 20:31:40', 31674, NULL),
(74800, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20600, 100, NULL, NULL, '2020-09-15 13:14:04', '2020-09-15 13:14:04', 31675, NULL),
(74801, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20600, 100, NULL, NULL, '2020-09-15 13:30:35', '2020-09-15 13:30:35', 31676, NULL),
(74804, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20147, 100, NULL, NULL, '2020-09-17 13:35:46', '2020-09-17 13:35:46', 31684, NULL),
(74805, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20988, 100, NULL, NULL, '2020-09-18 12:06:44', '2020-09-18 12:06:44', 31685, NULL),
(74806, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20701, 100, NULL, NULL, '2020-09-19 12:51:33', '2020-09-19 12:51:33', 31689, NULL),
(74807, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20794, 100, NULL, NULL, '2020-09-19 18:11:37', '2020-09-19 18:11:37', 31692, NULL),
(74808, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20207, 101, NULL, NULL, '2020-09-20 09:33:03', '2020-09-20 09:33:03', 31693, NULL),
(74809, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20708, 101, NULL, NULL, '2020-09-20 10:11:06', '2020-09-20 10:11:06', 31694, NULL),
(74810, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10032, 101, NULL, NULL, '2020-09-21 09:46:39', '2020-09-21 09:46:39', 31697, NULL),
(74811, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20988, 101, NULL, NULL, '2020-09-21 11:12:12', '2020-09-21 11:12:12', 31698, NULL),
(74812, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20955, 101, NULL, NULL, '2020-09-22 09:18:07', '2020-09-22 09:18:07', 31699, NULL),
(74813, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20292, 101, NULL, NULL, '2020-09-22 10:53:43', '2020-09-22 10:53:43', 31700, NULL),
(74815, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20692, 101, NULL, NULL, '2020-09-24 07:37:19', '2020-09-24 07:37:19', 31704, NULL),
(74817, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20692, 101, NULL, NULL, '2020-10-01 07:00:45', '2020-10-01 07:00:45', 31712, NULL),
(74818, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20692, 101, NULL, NULL, '2020-10-01 07:00:55', '2020-10-01 07:00:55', 31713, NULL),
(74819, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20692, 101, NULL, NULL, '2020-10-01 07:03:23', '2020-10-01 07:03:23', 31714, NULL),
(74820, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20992, 101, NULL, NULL, '2020-10-02 07:16:43', '2020-10-02 07:16:43', 31718, NULL),
(74821, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20827, 101, NULL, NULL, '2020-10-02 07:19:44', '2020-10-02 07:19:44', 31719, NULL),
(74822, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20749, 101, NULL, NULL, '2020-10-02 13:37:33', '2020-10-02 13:37:33', 31720, NULL),
(74823, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20803, 101, NULL, NULL, '2020-10-02 16:53:37', '2020-10-02 16:53:37', 31721, NULL),
(74824, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20853, 106, NULL, NULL, '2020-12-25 19:40:12', '2020-12-25 19:40:12', 31732, NULL),
(74825, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20162, 106, NULL, NULL, '2020-12-26 18:22:00', '2020-12-26 18:22:00', 31733, NULL),
(74826, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20697, 106, NULL, NULL, '2020-12-27 17:25:36', '2020-12-27 17:25:36', 31736, NULL),
(74827, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21275, 106, NULL, NULL, '2020-12-27 21:28:39', '2020-12-27 21:28:39', 31737, NULL),
(74828, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21275, 106, NULL, NULL, '2020-12-27 21:28:42', '2020-12-27 21:28:42', 31738, NULL),
(74829, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21031, 106, NULL, NULL, '2020-12-30 21:07:39', '2020-12-30 21:07:39', 31740, NULL),
(74830, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20241, 106, NULL, NULL, '2020-12-31 09:14:32', '2020-12-31 09:14:32', 31741, NULL),
(74831, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20836, 106, NULL, NULL, '2021-01-01 08:08:24', '2021-01-01 08:08:24', 31742, NULL),
(74832, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20600, 106, NULL, NULL, '2021-01-01 17:26:19', '2021-01-01 17:26:19', 31743, NULL),
(74833, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10042, 106, NULL, NULL, '2021-01-01 21:14:47', '2021-01-01 21:14:47', 31744, NULL),
(74834, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20803, 104, NULL, NULL, '2021-01-09 18:50:55', '2021-01-09 18:50:55', 31747, NULL),
(74835, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20803, 104, NULL, NULL, '2021-01-09 18:51:02', '2021-01-09 18:51:02', 31748, NULL),
(74836, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10067, 107, NULL, NULL, '2021-02-04 16:42:16', '2021-02-04 16:42:16', 31753, NULL),
(74837, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20162, 107, NULL, NULL, '2021-02-04 16:53:29', '2021-02-04 16:53:29', 31754, NULL),
(74838, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20159, 107, NULL, NULL, '2021-02-04 21:12:47', '2021-02-04 21:12:47', 31772, NULL),
(74839, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21284, 107, NULL, NULL, '2021-02-05 08:50:32', '2021-02-05 08:50:32', 31785, NULL),
(74840, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21284, 107, NULL, NULL, '2021-02-05 08:50:49', '2021-02-05 08:50:49', 31786, NULL),
(74841, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21284, 107, NULL, NULL, '2021-02-05 08:51:08', '2021-02-05 08:51:08', 31787, NULL),
(74842, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20697, 107, NULL, NULL, '2021-02-05 10:21:02', '2021-02-05 10:21:02', 31790, NULL),
(74843, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20697, 107, NULL, NULL, '2021-02-05 10:21:30', '2021-02-05 10:21:30', 31791, NULL),
(74844, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20697, 107, NULL, NULL, '2021-02-05 10:21:59', '2021-02-05 10:21:59', 31792, NULL),
(74845, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20697, 107, NULL, NULL, '2021-02-05 10:24:15', '2021-02-05 10:24:15', 31793, NULL),
(74846, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20558, 107, NULL, NULL, '2021-02-06 11:39:59', '2021-02-06 11:39:59', 31804, NULL),
(74847, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20600, 107, NULL, NULL, '2021-02-08 10:37:33', '2021-02-08 10:37:33', 31809, NULL),
(74848, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20600, 107, NULL, NULL, '2021-02-08 10:37:35', '2021-02-08 10:37:35', 31810, NULL),
(74849, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20147, 107, NULL, NULL, '2021-02-10 11:26:17', '2021-02-10 11:26:17', 31824, NULL),
(74850, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20708, 107, NULL, NULL, '2021-02-10 11:33:50', '2021-02-10 11:33:50', 31825, NULL),
(74851, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20708, 107, NULL, NULL, '2021-02-10 11:34:06', '2021-02-10 11:34:06', 31826, NULL),
(74852, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20708, 107, NULL, NULL, '2021-02-10 11:34:45', '2021-02-10 11:34:45', 31827, NULL),
(74853, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20708, 107, NULL, NULL, '2021-02-10 11:35:37', '2021-02-10 11:35:37', 31828, NULL),
(74854, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20708, 107, NULL, NULL, '2021-02-10 11:41:19', '2021-02-10 11:41:19', 31829, NULL),
(74855, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20708, 107, NULL, NULL, '2021-02-10 17:53:07', '2021-02-10 17:53:07', 31830, NULL),
(74856, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20241, 107, NULL, NULL, '2021-02-10 18:49:26', '2021-02-10 18:49:26', 31831, NULL),
(74857, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20241, 107, NULL, NULL, '2021-02-10 20:22:11', '2021-02-10 20:22:11', 31832, NULL),
(74858, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20992, 107, NULL, NULL, '2021-02-11 14:32:01', '2021-02-11 14:32:01', 31835, NULL),
(74859, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20992, 107, NULL, NULL, '2021-02-11 14:32:18', '2021-02-11 14:32:18', 31836, NULL),
(74860, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20621, 107, NULL, NULL, '2021-02-12 09:19:21', '2021-02-12 09:19:21', 31863, NULL),
(74861, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20621, 107, NULL, NULL, '2021-02-12 09:21:04', '2021-02-12 09:21:04', 31864, NULL),
(74862, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20162, 10109, NULL, NULL, '2021-03-16 12:37:23', '2021-03-16 12:37:23', 41953, NULL),
(74863, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20162, 10109, NULL, NULL, '2021-03-16 12:38:39', '2021-03-16 12:38:39', 41954, NULL),
(74864, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20568, 10109, NULL, NULL, '2021-03-16 14:19:41', '2021-03-16 14:19:41', 41955, NULL),
(74865, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20692, 10109, NULL, NULL, '2021-03-17 00:29:03', '2021-03-17 00:29:03', 41959, NULL),
(74866, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20996, 10109, NULL, NULL, '2021-03-17 03:03:33', '2021-03-17 03:03:33', 41962, NULL),
(74867, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20521, 10109, NULL, NULL, '2021-03-17 05:28:39', '2021-03-17 05:28:39', 41964, NULL),
(74868, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21012, 10109, NULL, NULL, '2021-03-17 06:31:53', '2021-03-17 06:31:53', 41965, NULL),
(74869, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20865, 10109, NULL, NULL, '2021-03-17 07:43:07', '2021-03-17 07:43:07', 41967, NULL),
(74870, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20601, 10109, NULL, NULL, '2021-03-17 08:38:14', '2021-03-17 08:38:14', 41969, NULL),
(74871, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20998, 10109, NULL, NULL, '2021-03-17 11:12:10', '2021-03-17 11:12:10', 41974, NULL),
(74873, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20816, 10109, NULL, NULL, '2021-03-20 10:26:29', '2021-03-20 10:26:29', 42002, NULL),
(74874, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20816, 10109, NULL, NULL, '2021-03-20 10:26:34', '2021-03-20 10:26:34', 42003, NULL),
(74875, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20568, 10114, NULL, NULL, '2021-05-03 17:56:25', '2021-05-03 17:56:25', 42029, NULL),
(74876, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20568, 10114, NULL, NULL, '2021-05-03 18:00:31', '2021-05-03 18:00:31', 42030, NULL),
(74877, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20568, 10114, NULL, NULL, '2021-05-03 18:05:13', '2021-05-03 18:05:13', 42031, NULL),
(74878, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20159, 10114, NULL, NULL, '2021-05-03 19:04:56', '2021-05-03 19:04:56', 42032, NULL),
(74879, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20162, 10115, NULL, NULL, '2021-06-15 16:08:19', '2021-06-15 16:08:19', 42033, NULL),
(74880, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20568, 10115, NULL, NULL, '2021-06-15 17:34:16', '2021-06-15 17:34:16', 42035, NULL),
(74881, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20159, 10115, NULL, NULL, '2021-06-17 09:15:09', '2021-06-17 09:15:09', 42040, NULL),
(74882, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20692, 10115, NULL, NULL, '2021-06-17 14:00:08', '2021-06-17 14:00:08', 42042, NULL),
(74883, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20853, 10115, NULL, NULL, '2021-06-17 14:16:43', '2021-06-17 14:16:43', 42043, NULL),
(74884, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10080, 10115, NULL, NULL, '2021-06-17 17:05:55', '2021-06-17 17:05:55', 42044, NULL),
(74885, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10062, 10115, NULL, NULL, '2021-06-17 18:16:43', '2021-06-17 18:16:43', 42045, NULL),
(74887, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20118, 10115, NULL, NULL, '2021-06-18 07:37:29', '2021-06-18 07:37:29', 42047, NULL),
(74888, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 51656, 10115, NULL, NULL, '2021-06-20 08:21:53', '2021-06-20 08:21:53', 42049, NULL),
(74889, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20870, 10115, NULL, NULL, '2021-06-20 16:58:39', '2021-06-20 16:58:39', 42050, NULL),
(74890, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21274, 10115, NULL, NULL, '2021-06-22 16:50:58', '2021-06-22 16:50:58', 42055, NULL),
(74891, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10032, 10115, NULL, NULL, '2021-06-30 09:49:27', '2021-06-30 09:49:27', 42086, NULL),
(74892, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20992, 10115, NULL, NULL, '2021-06-30 14:04:41', '2021-06-30 14:04:41', 42092, NULL),
(74893, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20708, 10115, NULL, NULL, '2021-06-30 15:20:05', '2021-06-30 15:20:05', 42094, NULL),
(74894, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10086, 10115, NULL, NULL, '2021-07-01 00:48:44', '2021-07-01 00:48:44', 42101, NULL),
(74895, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20836, 10115, NULL, NULL, '2021-07-02 12:55:11', '2021-07-02 12:55:11', 42122, NULL),
(74896, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 41603, 10115, NULL, NULL, '2021-07-02 16:59:57', '2021-07-02 16:59:57', 42134, NULL),
(74897, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20701, 10115, NULL, NULL, '2021-07-03 12:26:11', '2021-07-03 12:26:11', 42139, NULL),
(74898, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21001, 10115, NULL, NULL, '2021-07-03 15:41:58', '2021-07-03 15:41:58', 42141, NULL),
(74899, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20747, 10115, NULL, NULL, '2021-07-03 15:49:28', '2021-07-03 15:49:28', 42143, NULL),
(74900, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20766, 10115, NULL, NULL, '2021-07-03 16:35:41', '2021-07-03 16:35:41', 42145, NULL),
(74901, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20600, 10115, NULL, NULL, '2021-07-03 16:51:44', '2021-07-03 16:51:44', 42147, NULL),
(74902, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20568, 10115, NULL, NULL, '2021-07-03 17:07:28', '2021-07-03 17:07:28', 42148, NULL),
(74903, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20101, 10115, NULL, NULL, '2021-07-03 17:21:08', '2021-07-03 17:21:08', 42149, NULL),
(74904, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20816, 10115, NULL, NULL, '2021-07-03 17:47:28', '2021-07-03 17:47:28', 42152, NULL),
(74905, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20286, 10115, NULL, NULL, '2021-07-03 18:11:48', '2021-07-03 18:11:48', 42153, NULL),
(74906, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20203, 10115, NULL, NULL, '2021-07-03 18:46:03', '2021-07-03 18:46:03', 42154, NULL),
(74908, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20521, 10115, NULL, NULL, '2021-07-03 19:22:20', '2021-07-03 19:22:20', 42156, NULL),
(74909, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20207, 10115, NULL, NULL, '2021-07-03 19:33:38', '2021-07-03 19:33:38', 42157, NULL),
(74911, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20797, 10115, NULL, NULL, '2021-07-03 19:51:24', '2021-07-04 08:56:15', 42159, NULL),
(74912, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20621, 10115, NULL, NULL, '2021-07-03 20:13:39', '2021-07-03 20:13:39', 42160, NULL),
(74913, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20858, 10115, NULL, NULL, '2021-07-03 20:23:59', '2021-07-03 20:23:59', 42161, NULL),
(74914, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20803, 10115, NULL, NULL, '2021-07-03 20:36:26', '2021-07-03 20:36:26', 42162, NULL),
(74915, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20865, 10115, NULL, NULL, '2021-07-03 21:37:39', '2021-07-03 21:37:39', 42163, NULL),
(74917, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20202, 10115, NULL, NULL, '2021-07-04 09:45:02', '2021-07-04 09:45:02', 42166, NULL),
(74918, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20562, 10115, NULL, NULL, '2021-07-04 10:00:02', '2021-07-04 10:00:02', 42167, NULL),
(74919, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20210, 10115, NULL, NULL, '2021-07-04 10:35:56', '2021-07-04 10:35:56', 42169, NULL),
(74920, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20388, 10115, NULL, NULL, '2021-07-04 10:48:39', '2021-07-04 10:48:39', 42171, NULL),
(74921, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20988, 10115, NULL, NULL, '2021-07-04 10:52:37', '2021-07-04 10:52:37', 42172, NULL),
(74922, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20998, 10115, NULL, NULL, '2021-07-04 11:31:47', '2021-07-04 11:31:47', 42173, NULL),
(74923, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21279, 10115, NULL, NULL, '2021-07-04 11:56:53', '2021-07-04 11:56:53', 42174, NULL),
(74924, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20147, 10115, NULL, NULL, '2021-07-04 13:46:25', '2021-07-04 13:46:25', 42178, NULL),
(74925, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20353, 10115, NULL, NULL, '2021-07-04 14:24:12', '2021-07-04 14:24:12', 42180, NULL),
(74926, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20889, 10115, NULL, NULL, '2021-07-04 14:28:40', '2021-07-04 14:28:40', 42181, NULL),
(74929, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20174, 10115, NULL, NULL, '2021-07-04 20:49:21', '2021-07-04 20:49:21', 42189, NULL),
(74931, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20913, 10115, NULL, NULL, '2021-07-04 22:38:51', '2021-07-04 22:38:51', 42191, NULL),
(74932, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21008, 10115, NULL, NULL, '2021-07-05 07:52:26', '2021-07-05 07:52:26', 42193, NULL),
(74933, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20228, 10115, NULL, NULL, '2021-07-05 09:06:33', '2021-07-05 09:06:33', 42194, NULL),
(74934, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20889, 10115, NULL, NULL, '2021-07-05 11:20:39', '2021-07-05 11:20:39', 42197, NULL),
(74935, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20179, 10115, NULL, NULL, '2021-07-05 11:21:40', '2021-07-05 11:21:40', 42198, NULL),
(74936, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20758, 10115, NULL, NULL, '2021-07-05 14:27:22', '2021-07-05 14:27:22', 42203, NULL),
(74937, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20758, 10115, NULL, NULL, '2021-07-05 14:27:28', '2021-07-05 14:27:28', 42204, NULL);
INSERT INTO `transactions` (`id`, `reference`, `transaction_id`, `amount`, `transaction_date`, `payment_method_id`, `payment_status`, `bank_name`, `cheque_no`, `cheque_date`, `cheque_amount`, `user_id`, `event_id`, `admin_comment`, `user_comment`, `created_at`, `updated_at`, `event_registration_id`, `donation_id`) VALUES
(74938, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20605, 10115, NULL, NULL, '2021-07-06 07:07:22', '2021-07-06 07:07:22', 42212, NULL),
(74939, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20517, 10115, NULL, NULL, '2021-07-06 23:39:38', '2021-07-06 23:39:38', 42228, NULL),
(74940, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21046, 10115, NULL, NULL, '2021-07-07 16:49:56', '2021-07-07 16:49:56', 42231, NULL),
(74941, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20583, 10115, NULL, NULL, '2021-07-08 15:27:06', '2021-07-08 15:27:06', 42234, NULL),
(74942, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20794, 10115, NULL, NULL, '2021-07-08 15:30:28', '2021-07-08 15:30:28', 42235, NULL),
(74943, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 52110, 10115, NULL, NULL, '2021-07-08 15:31:44', '2021-07-08 15:31:44', 42236, NULL),
(74944, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20794, 10115, NULL, NULL, '2021-07-08 15:33:57', '2021-07-08 15:33:57', 42237, NULL),
(74945, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 52110, 10115, NULL, NULL, '2021-07-08 15:47:03', '2021-07-08 15:47:03', 42238, NULL),
(74946, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20738, 10115, NULL, NULL, '2021-07-08 19:42:41', '2021-07-08 19:42:41', 42241, NULL),
(74947, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20154, 10115, NULL, NULL, '2021-07-09 08:47:17', '2021-07-09 08:47:17', 42247, NULL),
(74948, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20170, 10115, NULL, NULL, '2021-07-09 09:40:44', '2021-07-09 09:40:44', 42250, NULL),
(74949, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20170, 10115, NULL, NULL, '2021-07-09 09:40:46', '2021-07-09 09:40:46', 42251, NULL),
(74950, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21019, 10115, NULL, NULL, '2021-07-09 15:23:36', '2021-07-09 15:23:36', 42253, NULL),
(74951, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21019, 10115, NULL, NULL, '2021-07-09 15:23:42', '2021-07-09 15:23:42', 42254, NULL),
(74953, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20567, 10115, NULL, NULL, '2021-07-09 20:48:33', '2021-07-09 20:48:33', 42256, NULL),
(74954, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20731, 10115, NULL, NULL, '2021-07-09 22:17:37', '2021-07-09 22:17:37', 42257, NULL),
(74955, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20871, 10115, NULL, NULL, '2021-07-09 22:30:35', '2021-07-09 22:30:35', 42258, NULL),
(74956, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20975, 10115, NULL, NULL, '2021-07-10 22:19:35', '2021-07-10 22:19:35', 42261, NULL),
(74957, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20975, 10115, NULL, NULL, '2021-07-10 23:11:28', '2021-07-10 23:11:28', 42262, NULL),
(74958, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 52123, 10115, NULL, NULL, '2021-07-11 01:23:49', '2021-07-11 01:23:49', 42263, NULL),
(74959, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 52123, 10115, NULL, NULL, '2021-07-11 01:23:51', '2021-07-11 01:23:51', 42264, NULL),
(74960, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20803, 10117, NULL, NULL, '2021-09-17 08:47:11', '2021-09-17 08:47:11', 42404, NULL),
(74961, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20162, 10117, NULL, NULL, '2021-09-17 08:55:03', '2021-09-17 08:55:03', 42405, NULL),
(74962, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20918, 10117, NULL, NULL, '2021-09-17 09:07:24', '2021-09-17 09:07:24', 42407, NULL),
(74963, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10032, 10117, NULL, NULL, '2021-09-17 10:04:20', '2021-09-17 10:04:20', 42408, NULL),
(74964, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20692, 10117, NULL, NULL, '2021-09-17 10:28:37', '2021-09-17 10:28:37', 42409, NULL),
(74965, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20621, 10117, NULL, NULL, '2021-09-17 10:55:30', '2021-09-17 10:55:30', 42410, NULL),
(74966, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20827, 10117, NULL, NULL, '2021-09-17 10:58:35', '2021-09-17 10:58:35', 42411, NULL),
(74967, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20411, 10117, NULL, NULL, '2021-09-17 15:03:33', '2021-09-17 15:03:33', 42413, NULL),
(74968, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20159, 10117, NULL, NULL, '2021-09-17 15:29:31', '2021-09-17 15:29:31', 42414, NULL),
(74969, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20210, 10117, NULL, NULL, '2021-09-18 07:06:47', '2021-09-18 07:06:47', 42415, NULL),
(74970, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21046, 10117, NULL, NULL, '2021-09-18 07:54:44', '2021-09-18 07:54:44', 42416, NULL),
(74971, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21046, 10117, NULL, NULL, '2021-09-18 07:57:35', '2021-09-18 07:57:35', 42417, NULL),
(74973, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10086, 10117, NULL, NULL, '2021-09-19 13:55:04', '2021-09-19 13:55:04', 42429, NULL),
(74974, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 31522, 10117, NULL, NULL, '2021-09-20 18:03:02', '2021-09-20 18:03:02', 42447, NULL),
(74975, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21014, 10117, NULL, NULL, '2021-09-20 19:32:56', '2021-09-20 19:32:56', 42448, NULL),
(74976, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21009, 10117, NULL, NULL, '2021-09-20 20:03:21', '2021-09-20 20:03:21', 42452, NULL),
(74977, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 52110, 10117, NULL, NULL, '2021-09-21 12:17:54', '2021-09-21 12:17:54', 42465, NULL),
(74978, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20853, 10117, NULL, NULL, '2021-09-21 12:24:15', '2021-09-21 12:24:15', 42466, NULL),
(74979, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10062, 10117, NULL, NULL, '2021-09-21 12:31:30', '2021-09-21 12:31:30', 42467, NULL),
(74980, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20988, 10117, NULL, NULL, '2021-09-21 17:05:13', '2021-09-21 17:05:13', 42471, NULL),
(74981, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20865, 10117, NULL, NULL, '2021-09-21 18:08:23', '2021-09-21 18:08:23', 42474, NULL),
(74982, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20995, 10117, NULL, NULL, '2021-09-21 18:18:48', '2021-09-21 18:18:48', 42475, NULL),
(74983, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20992, 10117, NULL, NULL, '2021-09-21 19:22:42', '2021-09-21 19:22:42', 42480, NULL),
(74984, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10080, 10117, NULL, NULL, '2021-09-21 20:02:34', '2021-09-21 20:02:34', 42483, NULL),
(74985, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20870, 10117, NULL, NULL, '2021-09-22 05:40:41', '2021-09-22 05:40:41', 42486, NULL),
(74986, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20998, 10117, NULL, NULL, '2021-09-22 07:53:16', '2021-09-22 07:53:16', 42487, NULL),
(74987, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21020, 10117, NULL, NULL, '2021-09-22 16:03:25', '2021-09-22 16:03:25', 42492, NULL),
(74988, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20568, 10117, NULL, NULL, '2021-09-22 16:48:45', '2021-09-22 16:48:45', 42494, NULL),
(74989, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21274, 10117, NULL, NULL, '2021-09-22 17:14:41', '2021-09-22 17:14:41', 42495, NULL),
(74990, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20738, 10117, NULL, NULL, '2021-09-22 17:23:41', '2021-09-22 17:23:41', 42496, NULL),
(74991, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20147, 10117, NULL, NULL, '2021-09-22 17:39:58', '2021-09-22 17:39:58', 42497, NULL),
(74992, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10067, 10117, NULL, NULL, '2021-09-22 18:17:56', '2021-09-22 18:17:56', 42499, NULL),
(74993, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20766, 10117, NULL, NULL, '2021-09-22 18:48:03', '2021-09-22 18:48:03', 42500, NULL),
(74994, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20747, 10117, NULL, NULL, '2021-09-22 19:11:23', '2021-09-22 19:11:23', 42501, NULL),
(74995, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21023, 10117, NULL, NULL, '2021-09-22 19:31:29', '2021-09-22 19:31:29', 42502, NULL),
(74996, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20836, 10117, NULL, NULL, '2021-09-22 19:36:24', '2021-09-22 19:36:24', 42503, NULL),
(74997, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21284, 10117, NULL, NULL, '2021-09-22 20:22:57', '2021-09-22 20:22:57', 42504, NULL),
(74998, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10042, 10117, NULL, NULL, '2021-09-22 21:12:14', '2021-09-22 21:12:14', 42507, NULL),
(74999, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20708, 10117, NULL, NULL, '2021-09-22 21:48:46', '2021-09-22 21:48:46', 42508, NULL),
(75000, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20994, 10117, NULL, NULL, '2021-09-23 07:37:45', '2021-09-23 07:37:45', 52509, NULL),
(75001, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20388, 10117, NULL, NULL, '2021-09-23 12:24:23', '2021-09-23 12:24:23', 52510, NULL),
(75002, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21001, 10117, NULL, NULL, '2021-09-23 17:14:56', '2021-09-23 17:14:56', 52512, NULL),
(75003, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20230, 10117, NULL, NULL, '2021-09-23 17:15:27', '2021-09-23 17:15:27', 52513, NULL),
(75004, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10042, 10117, NULL, NULL, '2021-09-23 17:17:34', '2021-09-23 17:17:34', 52514, NULL),
(75005, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21279, 10117, NULL, NULL, '2021-09-23 18:40:31', '2021-09-23 18:40:31', 52518, NULL),
(75007, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20697, 10117, NULL, NULL, '2021-09-24 10:10:30', '2021-09-24 10:10:30', 52531, NULL),
(75008, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20118, 10117, NULL, NULL, '2021-09-24 10:39:33', '2021-09-24 10:39:33', 52532, NULL),
(75009, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20521, 10117, NULL, NULL, '2021-09-24 14:34:31', '2021-09-24 14:34:31', 52535, NULL),
(75010, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20665, 10117, NULL, NULL, '2021-09-24 14:53:13', '2021-09-24 14:53:13', 52536, NULL),
(75011, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20101, 10117, NULL, NULL, '2021-09-24 14:55:30', '2021-09-24 14:55:30', 52537, NULL),
(75012, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20701, 10117, NULL, NULL, '2021-09-24 20:16:51', '2021-09-24 20:16:51', 52548, NULL),
(75014, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21008, 10117, NULL, NULL, '2021-09-25 13:16:27', '2021-09-25 13:16:27', 52554, NULL),
(75016, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21031, 10117, NULL, NULL, '2021-09-26 16:37:05', '2021-09-26 16:37:05', 52563, NULL),
(75017, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20353, 10117, NULL, NULL, '2021-09-26 16:48:24', '2021-09-26 16:48:24', 52566, NULL),
(75018, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20111, 10117, NULL, NULL, '2021-09-26 17:20:21', '2021-09-26 17:20:21', 52567, NULL),
(75019, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20286, 10117, NULL, NULL, '2021-09-26 18:21:46', '2021-09-26 18:21:46', 52570, NULL),
(75020, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21014, 10117, NULL, NULL, '2021-09-27 09:04:06', '2021-09-27 09:04:06', 52578, NULL),
(75021, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21280, 10117, NULL, NULL, '2021-09-27 14:07:26', '2021-09-27 14:07:26', 52580, NULL),
(75022, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20131, 10117, NULL, NULL, '2021-09-27 14:52:07', '2021-09-27 14:52:07', 52581, NULL),
(75023, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20788, 10117, NULL, NULL, '2021-09-27 14:52:37', '2021-09-27 14:52:37', 52582, NULL),
(75024, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20558, 10117, NULL, NULL, '2021-09-27 17:34:34', '2021-09-27 17:34:34', 52583, NULL),
(75025, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20138, 10117, NULL, NULL, '2021-09-27 18:00:50', '2021-09-27 18:00:50', 52584, NULL),
(75026, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20207, 10117, NULL, NULL, '2021-09-27 18:41:48', '2021-09-27 18:41:48', 52585, NULL),
(75027, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20808, 10117, NULL, NULL, '2021-09-27 19:51:11', '2021-09-27 19:51:11', 52587, NULL),
(75028, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20913, 10117, NULL, NULL, '2021-09-27 20:03:21', '2021-09-27 20:03:21', 52588, NULL),
(75029, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20910, 10117, NULL, NULL, '2021-09-27 21:58:01', '2021-09-27 21:58:01', 52589, NULL),
(75030, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20828, 10117, NULL, NULL, '2021-09-28 06:07:22', '2021-09-28 06:07:22', 52596, NULL),
(75031, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21019, 10117, NULL, NULL, '2021-09-28 07:15:00', '2021-09-28 07:15:00', 52597, NULL),
(75032, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20203, 10117, NULL, NULL, '2021-09-28 09:47:50', '2021-09-28 09:47:50', 52599, NULL),
(75033, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20912, 10117, NULL, NULL, '2021-09-28 10:17:41', '2021-09-28 10:17:41', 52601, NULL),
(75034, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20567, 10117, NULL, NULL, '2021-09-28 12:14:22', '2021-09-28 12:14:22', 52602, NULL),
(75035, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20972, 10117, NULL, NULL, '2021-09-29 07:02:38', '2021-09-29 07:02:38', 52606, NULL),
(75036, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20903, 10117, NULL, NULL, '2021-09-29 10:08:28', '2021-09-29 10:08:28', 52607, NULL),
(75037, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20949, 10117, NULL, NULL, '2021-09-29 17:51:34', '2021-09-29 17:51:34', 52609, NULL),
(75038, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 62816, 10117, NULL, NULL, '2021-09-29 18:42:59', '2021-09-29 18:42:59', 52610, NULL),
(75039, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20851, 10117, NULL, NULL, '2021-09-29 19:57:14', '2021-09-29 19:57:14', 52613, NULL),
(75040, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20816, 10117, NULL, NULL, '2021-09-29 20:15:54', '2021-09-29 20:15:54', 52614, NULL),
(75041, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20788, 10117, NULL, NULL, '2021-09-29 20:31:10', '2021-09-29 20:31:10', 52615, NULL),
(75042, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 52123, 10117, NULL, NULL, '2021-09-29 21:31:36', '2021-09-29 21:31:36', 52616, NULL),
(75043, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21046, 10117, NULL, NULL, '2021-10-01 14:58:52', '2021-10-01 14:58:52', 52622, NULL),
(75044, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20547, 10117, NULL, NULL, '2021-10-01 21:48:35', '2021-10-01 21:48:35', 52626, NULL),
(75045, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20269, 10117, NULL, NULL, '2021-10-02 06:42:26', '2021-10-02 06:42:26', 52628, NULL),
(75046, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20134, 10117, NULL, NULL, '2021-10-02 08:51:44', '2021-10-02 08:51:44', 52629, NULL),
(75047, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 51656, 10117, NULL, NULL, '2021-10-02 11:33:46', '2021-10-02 11:33:46', 52631, NULL),
(75048, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21046, 10119, NULL, NULL, '2021-10-21 16:06:25', '2021-10-21 16:06:25', 52636, NULL),
(75049, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 51656, 10119, NULL, NULL, '2021-12-05 08:53:13', '2021-12-05 08:53:13', 52638, NULL),
(75050, 'eventregistration', NULL, 10, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20568, 10122, NULL, NULL, '2021-12-19 23:25:38', '2021-12-19 23:25:38', 52640, NULL),
(75051, 'eventregistration', NULL, 50, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20568, 10122, NULL, NULL, '2021-12-19 23:28:47', '2021-12-19 23:28:47', 52641, NULL),
(75052, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20766, 10122, NULL, NULL, '2022-01-09 13:23:27', '2022-01-09 13:23:27', 52642, NULL),
(75053, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20808, 10122, NULL, NULL, '2022-01-14 10:10:45', '2022-01-14 10:10:45', 52645, NULL),
(75054, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21047, 10122, NULL, NULL, '2022-01-14 11:12:28', '2022-01-14 11:12:28', 52646, NULL),
(75055, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20910, 10127, NULL, NULL, '2022-02-07 17:13:11', '2022-02-07 17:13:11', 52652, NULL),
(75057, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83296, 10127, NULL, NULL, '2022-02-07 18:54:51', '2022-02-07 18:54:51', 52659, NULL),
(75058, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20992, 10127, NULL, NULL, '2022-02-07 20:04:42', '2022-02-07 20:04:42', 52660, NULL),
(75059, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83235, 10127, NULL, NULL, '2022-02-07 20:43:08', '2022-02-07 20:43:08', 52661, NULL),
(75060, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20568, 10127, NULL, NULL, '2022-02-07 21:05:36', '2022-02-07 21:05:36', 52664, NULL),
(75061, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20411, 10127, NULL, NULL, '2022-02-07 21:17:27', '2022-02-07 21:17:27', 52666, NULL),
(75062, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20803, 10127, NULL, NULL, '2022-02-08 12:15:03', '2022-02-08 12:15:03', 52677, NULL),
(75063, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 41603, 10127, NULL, NULL, '2022-02-08 14:19:58', '2022-02-08 14:19:58', 52678, NULL),
(75064, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 41603, 10127, NULL, NULL, '2022-02-08 14:20:05', '2022-02-08 14:20:05', 52679, NULL),
(75065, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20210, 10127, NULL, NULL, '2022-02-08 18:40:06', '2022-02-08 18:40:06', 52688, NULL),
(75066, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83217, 10127, NULL, NULL, '2022-02-09 15:25:34', '2022-02-09 15:25:34', 52691, NULL),
(75067, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83210, 10127, NULL, NULL, '2022-02-09 17:50:23', '2022-02-09 17:50:23', 52692, NULL),
(75068, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20822, 10127, NULL, NULL, '2022-02-09 18:26:44', '2022-02-09 18:26:44', 52693, NULL),
(75069, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20903, 10127, NULL, NULL, '2022-02-09 19:18:22', '2022-02-09 19:18:22', 52694, NULL),
(75070, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21019, 10127, NULL, NULL, '2022-02-09 19:28:21', '2022-02-09 19:28:21', 52695, NULL),
(75071, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20692, 10127, NULL, NULL, '2022-02-09 19:28:27', '2022-02-09 19:28:27', 52696, NULL),
(75072, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20583, 10127, NULL, NULL, '2022-02-10 06:51:35', '2022-02-10 06:51:35', 52702, NULL),
(75073, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20583, 10127, NULL, NULL, '2022-02-10 06:52:49', '2022-02-10 06:52:49', 52703, NULL),
(75074, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20241, 10127, NULL, NULL, '2022-02-10 08:02:36', '2022-02-10 08:02:36', 52704, NULL),
(75075, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20988, 10127, NULL, NULL, '2022-02-10 09:50:23', '2022-02-10 09:50:23', 52705, NULL),
(75076, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20521, 10127, NULL, NULL, '2022-02-10 11:56:18', '2022-02-10 11:56:18', 52706, NULL),
(75077, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20641, 10127, NULL, NULL, '2022-02-10 12:21:45', '2022-02-10 12:21:45', 52707, NULL),
(75078, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21047, 10127, NULL, NULL, '2022-02-10 17:40:42', '2022-02-10 17:40:42', 52708, NULL),
(75079, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20202, 10127, NULL, NULL, '2022-02-10 20:07:10', '2022-02-10 20:07:10', 52709, NULL),
(75080, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20202, 10127, NULL, NULL, '2022-02-10 20:07:12', '2022-02-10 20:07:12', 52710, NULL),
(75081, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20757, 10127, NULL, NULL, '2022-02-10 20:58:28', '2022-02-10 20:58:28', 52712, NULL),
(75082, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83231, 10127, NULL, NULL, '2022-02-10 21:09:48', '2022-02-10 21:09:48', 52713, NULL),
(75083, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20836, 10127, NULL, NULL, '2022-02-11 18:39:16', '2022-02-11 18:39:16', 52714, NULL),
(75084, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20547, 10127, NULL, NULL, '2022-02-12 11:44:36', '2022-02-12 11:44:36', 52715, NULL),
(75085, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20616, 10127, NULL, NULL, '2022-02-13 16:51:17', '2022-02-13 16:51:17', 52716, NULL),
(75086, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20616, 10127, NULL, NULL, '2022-02-13 17:06:44', '2022-02-13 17:06:44', 52717, NULL),
(75087, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21280, 10127, NULL, NULL, '2022-02-14 18:19:06', '2022-02-14 18:19:06', 52726, NULL),
(75088, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20708, 10127, NULL, NULL, '2022-02-14 18:32:17', '2022-02-14 18:32:17', 52727, NULL),
(75089, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20865, 10127, NULL, NULL, '2022-02-14 22:00:15', '2022-02-14 22:00:15', 52729, NULL),
(75090, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20853, 10127, NULL, NULL, '2022-02-15 15:12:10', '2022-02-15 15:12:10', 52742, NULL),
(75091, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20307, 10127, NULL, NULL, '2022-02-15 15:15:43', '2022-02-15 15:15:43', 52743, NULL),
(75092, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20880, 10127, NULL, NULL, '2022-02-15 17:08:44', '2022-02-15 17:08:44', 52748, NULL),
(75093, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20880, 10127, NULL, NULL, '2022-02-15 17:09:25', '2022-02-15 17:09:25', 52749, NULL),
(75094, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20552, 10127, NULL, NULL, '2022-02-15 17:34:55', '2022-02-15 17:34:55', 52751, NULL),
(75095, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20903, 10127, NULL, NULL, '2022-02-15 20:05:26', '2022-02-15 20:05:26', 52756, NULL),
(75096, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20621, 10130, NULL, NULL, '2022-02-18 09:17:43', '2022-02-18 09:17:43', 52838, NULL),
(75097, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20621, 10129, NULL, NULL, '2022-02-18 09:19:45', '2022-02-18 09:19:45', 52839, NULL),
(75098, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83228, 10127, NULL, NULL, '2022-02-18 18:40:37', '2022-02-18 18:40:37', 52857, NULL),
(75099, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20558, 10128, NULL, NULL, '2022-02-18 18:44:28', '2022-02-18 18:44:28', 52858, NULL),
(75100, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20568, 10127, NULL, NULL, '2022-02-19 07:09:36', '2022-02-19 07:09:36', 52863, NULL),
(75102, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 62832, 10128, NULL, NULL, '2022-02-20 18:41:29', '2022-02-20 18:41:29', 52877, NULL),
(75103, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 62832, 10129, NULL, NULL, '2022-02-20 18:41:58', '2022-02-20 18:41:58', 52878, NULL),
(75104, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20992, 10129, NULL, NULL, '2022-02-21 08:55:18', '2022-02-21 08:55:18', 52883, NULL),
(75105, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20568, 10130, NULL, NULL, '2022-02-21 09:57:19', '2022-02-21 09:57:19', 52884, NULL),
(75106, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20803, 10129, NULL, NULL, '2022-02-21 21:53:00', '2022-02-21 21:53:00', 52906, NULL),
(75107, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83234, 10128, NULL, NULL, '2022-02-21 22:25:27', '2022-02-21 22:25:27', 52907, NULL),
(75108, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83296, 10128, NULL, NULL, '2022-02-23 11:18:55', '2022-02-23 11:18:55', 52915, NULL),
(75109, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83296, 10129, NULL, NULL, '2022-02-23 11:20:30', '2022-02-23 11:20:30', 52916, NULL),
(75110, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83296, 10128, NULL, NULL, '2022-02-23 11:22:37', '2022-02-23 11:22:37', 52917, NULL),
(75111, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83296, 10129, NULL, NULL, '2022-02-23 11:23:36', '2022-02-23 11:23:36', 52918, NULL),
(75112, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20701, 10128, NULL, NULL, '2022-02-23 21:09:41', '2022-02-23 21:09:41', 52919, NULL),
(75113, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20827, 10128, NULL, NULL, '2022-02-27 11:36:48', '2022-02-27 11:36:48', 52927, NULL),
(75114, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83220, 10128, NULL, NULL, '2022-02-27 20:45:57', '2022-02-27 20:45:57', 52930, NULL),
(75115, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83220, 10130, NULL, NULL, '2022-02-27 20:47:03', '2022-02-27 20:47:03', 52931, NULL),
(75116, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20903, 10129, NULL, NULL, '2022-03-01 11:32:12', '2022-03-01 11:32:12', 52936, NULL),
(75117, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10067, 10128, NULL, NULL, '2022-03-02 21:19:03', '2022-03-02 21:19:03', 52949, NULL),
(75118, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10086, 10129, NULL, NULL, '2022-03-07 14:24:27', '2022-03-07 14:24:27', 52964, NULL),
(75119, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20162, 10130, NULL, NULL, '2022-03-07 16:32:29', '2022-03-07 16:32:29', 52969, NULL),
(75122, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20364, 10128, NULL, NULL, '2022-03-08 16:56:43', '2022-03-08 16:56:43', 52979, NULL),
(75123, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20737, 10128, NULL, NULL, '2022-03-08 16:59:17', '2022-03-08 16:59:17', 52981, NULL),
(75124, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20737, 10130, NULL, NULL, '2022-03-08 17:00:45', '2022-03-08 17:00:45', 52982, NULL),
(75125, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21031, 10128, NULL, NULL, '2022-03-08 20:23:42', '2022-03-08 20:23:42', 52987, NULL),
(75126, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21031, 10128, NULL, NULL, '2022-03-08 20:23:50', '2022-03-08 20:30:59', 52988, NULL),
(75127, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20908, 10128, NULL, NULL, '2022-03-08 22:04:28', '2022-03-08 22:04:28', 52990, NULL),
(75128, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20101, 10128, NULL, NULL, '2022-03-09 12:39:55', '2022-03-09 12:39:55', 52993, NULL),
(75129, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20836, 10128, NULL, NULL, '2022-03-11 21:32:48', '2022-03-11 21:32:48', 52996, NULL),
(75130, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20568, 10131, NULL, NULL, '2022-03-16 20:12:09', '2022-03-16 20:12:09', 52998, NULL),
(75131, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20621, 10131, NULL, NULL, '2022-03-16 22:08:56', '2022-03-16 22:08:56', 53004, NULL),
(75132, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20241, 10131, NULL, NULL, '2022-03-16 22:48:54', '2022-03-16 22:48:54', 53005, NULL),
(75133, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20853, 10131, NULL, NULL, '2022-03-17 08:01:45', '2022-03-17 08:01:45', 63007, NULL),
(75134, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21001, 10131, NULL, NULL, '2022-03-17 08:16:18', '2022-03-17 08:16:18', 63008, NULL),
(75135, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21274, 10131, NULL, NULL, '2022-03-17 08:40:51', '2022-03-17 08:40:51', 63010, NULL),
(75136, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21014, 10131, NULL, NULL, '2022-03-17 10:48:15', '2022-03-17 10:48:15', 63013, NULL),
(75138, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83217, 10131, NULL, NULL, '2022-03-17 11:37:22', '2022-03-17 11:37:22', 63015, NULL),
(75140, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83235, 10131, NULL, NULL, '2022-03-17 12:09:23', '2022-03-17 12:09:23', 63017, NULL),
(75141, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83875, 10131, NULL, NULL, '2022-03-17 16:54:59', '2022-03-17 16:54:59', 63026, NULL),
(75142, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20988, 10131, NULL, NULL, '2022-03-17 17:37:44', '2022-03-17 17:37:44', 63027, NULL),
(75143, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83220, 10131, NULL, NULL, '2022-03-18 05:57:35', '2022-03-18 05:57:35', 63034, NULL),
(75144, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20816, 10131, NULL, NULL, '2022-03-18 16:52:23', '2022-03-18 16:52:23', 63043, NULL),
(75145, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83210, 10131, NULL, NULL, '2022-03-19 08:52:02', '2022-03-19 08:52:02', 63044, NULL),
(75146, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20159, 10131, NULL, NULL, '2022-03-23 09:20:38', '2022-03-23 09:20:38', 63063, NULL),
(75147, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83296, 10131, NULL, NULL, '2022-03-23 10:56:30', '2022-03-23 10:56:30', 63066, NULL),
(75148, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83883, 10131, NULL, NULL, '2022-03-25 13:06:40', '2022-03-25 13:06:40', 63092, NULL),
(75150, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10062, 10131, NULL, NULL, '2022-03-26 19:59:23', '2022-03-26 19:59:23', 63094, NULL),
(75151, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21019, 10131, NULL, NULL, '2022-03-27 08:34:28', '2022-03-27 08:34:28', 63095, NULL),
(75152, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83235, 10131, NULL, NULL, '2022-03-29 21:23:02', '2022-03-29 21:23:02', 63111, NULL),
(75153, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 51656, 10131, NULL, NULL, '2022-03-30 17:10:13', '2022-03-30 17:10:13', 63112, NULL),
(75154, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20147, 10131, NULL, NULL, '2022-04-02 15:04:10', '2022-04-02 15:04:10', 63123, NULL),
(75155, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20708, 10131, NULL, NULL, '2022-04-02 15:07:53', '2022-04-02 15:07:53', 63124, NULL),
(75156, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10086, 10131, NULL, NULL, '2022-04-05 22:48:32', '2022-04-05 22:48:32', 63139, NULL),
(75157, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20877, 10131, NULL, NULL, '2022-04-08 18:29:15', '2022-04-09 11:35:20', 63140, NULL),
(75158, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20998, 10131, NULL, NULL, '2022-04-09 07:24:03', '2022-04-09 07:24:03', 63141, NULL),
(75159, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20992, 10131, NULL, NULL, '2022-04-09 07:32:28', '2022-04-09 07:32:28', 63142, NULL),
(75161, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83221, 10131, NULL, NULL, '2022-04-09 09:03:05', '2022-04-09 09:03:05', 63146, NULL),
(75162, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20228, 10131, NULL, NULL, '2022-04-09 10:32:14', '2022-04-09 10:32:14', 63147, NULL),
(75163, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20665, 10131, NULL, NULL, '2022-04-09 13:43:15', '2022-04-09 13:43:15', 63148, NULL),
(75164, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20692, 10131, NULL, NULL, '2022-04-09 14:52:58', '2022-04-09 14:52:58', 63150, NULL),
(75165, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20836, 10131, NULL, NULL, '2022-04-09 15:44:50', '2022-04-09 15:44:50', 63153, NULL),
(75166, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20101, 10131, NULL, NULL, '2022-04-09 17:01:40', '2022-04-09 17:01:40', 63154, NULL),
(75167, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20118, 10131, NULL, NULL, '2022-04-09 19:24:16', '2022-04-09 19:24:16', 63155, NULL),
(75168, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83336, 10131, NULL, NULL, '2022-04-09 22:21:09', '2022-04-09 22:21:09', 63156, NULL),
(75169, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20701, 10131, NULL, NULL, '2022-04-10 10:51:25', '2022-04-10 10:51:25', 63157, NULL),
(75170, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20785, 10117, NULL, NULL, '2022-04-10 11:14:01', '2022-04-10 11:14:01', 63158, NULL),
(75171, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83296, 10131, NULL, NULL, '2022-04-10 17:39:05', '2022-04-10 17:39:05', 63160, NULL),
(75172, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 52110, 10131, NULL, NULL, '2022-04-10 18:25:45', '2022-04-10 18:25:45', 63161, NULL),
(75173, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21047, 10131, NULL, NULL, '2022-04-10 21:08:41', '2022-04-10 21:08:41', 63163, NULL),
(75174, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20547, 10131, NULL, NULL, '2022-04-11 06:26:59', '2022-04-11 06:26:59', 63164, NULL),
(75175, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20697, 10131, NULL, NULL, '2022-04-11 10:16:58', '2022-04-11 10:16:58', 63166, NULL),
(75176, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20766, 10131, NULL, NULL, '2022-04-11 14:34:42', '2022-04-11 14:34:42', 63167, NULL),
(75177, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20567, 10131, NULL, NULL, '2022-04-11 21:48:20', '2022-04-11 21:48:20', 63169, NULL),
(75178, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20600, 10131, NULL, NULL, '2022-04-12 09:20:32', '2022-04-12 09:20:32', 63170, NULL),
(75179, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20286, 10131, NULL, NULL, '2022-04-12 10:28:02', '2022-04-12 10:28:02', 63171, NULL),
(75180, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83220, 10131, NULL, NULL, '2022-04-12 10:58:10', '2022-04-12 10:58:10', 63173, NULL),
(75181, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 52086, 10131, NULL, NULL, '2022-04-12 13:21:20', '2022-04-12 13:21:20', 63174, NULL),
(75182, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 41603, 10131, NULL, NULL, '2022-04-12 13:51:13', '2022-04-12 13:51:13', 63178, NULL),
(75183, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 73097, 10131, NULL, NULL, '2022-04-12 15:10:04', '2022-04-12 15:10:04', 63179, NULL),
(75184, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20880, 10131, NULL, NULL, '2022-04-13 18:22:12', '2022-04-13 18:22:12', 63181, NULL),
(75185, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20757, 10131, NULL, NULL, '2022-04-13 18:58:27', '2022-04-13 18:58:27', 63183, NULL),
(75186, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83228, 10131, NULL, NULL, '2022-04-13 23:27:22', '2022-04-13 23:27:22', 63184, NULL),
(75187, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10067, 10131, NULL, NULL, '2022-04-14 07:10:57', '2022-04-14 07:10:57', 63186, NULL),
(75188, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83883, 10131, NULL, NULL, '2022-04-14 11:15:17', '2022-04-14 11:15:17', 63187, NULL),
(75189, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 62816, 10131, NULL, NULL, '2022-04-14 11:28:57', '2022-04-14 11:28:57', 63188, NULL),
(75190, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20773, 10131, NULL, NULL, '2022-04-14 12:50:34', '2022-04-14 12:50:34', 63189, NULL),
(75191, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20411, 10131, NULL, NULL, '2022-04-14 14:15:50', '2022-04-14 14:15:50', 63190, NULL),
(75192, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20687, 10131, NULL, NULL, '2022-04-14 18:31:49', '2022-04-14 18:31:49', 63191, NULL),
(75193, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94107, 10131, NULL, NULL, '2022-04-14 18:49:32', '2022-04-14 18:49:32', 63192, NULL),
(75195, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20808, 10131, NULL, NULL, '2022-04-14 20:44:13', '2022-04-14 20:44:13', 63196, NULL),
(75196, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20992, 10131, NULL, NULL, '2022-04-16 17:28:05', '2022-04-16 17:28:05', 63197, NULL),
(75197, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83232, 10131, NULL, NULL, '2022-04-17 08:21:26', '2022-04-17 08:21:26', 63201, NULL),
(75198, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20388, 10131, NULL, NULL, '2022-04-17 09:41:26', '2022-04-17 09:41:26', 63202, NULL),
(75199, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 62816, 10131, NULL, NULL, '2022-04-17 15:09:20', '2022-04-17 15:09:20', 63203, NULL),
(75200, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20851, 10131, NULL, NULL, '2022-04-17 15:16:56', '2022-04-17 15:16:56', 63204, NULL),
(75201, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20871, 10131, NULL, NULL, '2022-04-18 11:25:26', '2022-04-18 11:25:26', 63205, NULL),
(75202, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20851, 10131, NULL, NULL, '2022-04-18 13:42:19', '2022-04-18 13:42:19', 63208, NULL),
(75203, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20203, 10131, NULL, NULL, '2022-04-19 20:50:10', '2022-04-19 20:50:10', 63213, NULL),
(75204, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10086, 10131, NULL, NULL, '2022-04-19 23:36:16', '2022-04-19 23:36:16', 63214, NULL),
(75205, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20903, 10131, NULL, NULL, '2022-04-20 11:37:53', '2022-04-20 11:37:53', 63215, NULL),
(75206, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20162, 10131, NULL, NULL, '2022-04-20 16:12:59', '2022-04-20 16:12:59', 63217, NULL),
(75207, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20266, 10131, NULL, NULL, '2022-04-20 20:00:54', '2022-04-20 20:00:54', 63220, NULL),
(75208, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21280, 10131, NULL, NULL, '2022-04-20 20:15:59', '2022-04-20 20:15:59', 63221, NULL),
(75209, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20230, 10131, NULL, NULL, '2022-04-21 07:38:27', '2022-04-21 07:38:27', 73223, NULL),
(75210, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20747, 10131, NULL, NULL, '2022-04-21 08:41:13', '2022-04-21 08:41:13', 73224, NULL),
(75211, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20521, 10131, NULL, NULL, '2022-04-21 09:47:07', '2022-04-21 09:47:07', 73225, NULL),
(75212, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20988, 10131, NULL, NULL, '2022-04-21 13:45:45', '2022-04-21 13:45:45', 73228, NULL),
(75213, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20666, 10131, NULL, NULL, '2022-04-21 13:50:03', '2022-04-21 13:50:03', 73229, NULL),
(75214, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20666, 10131, NULL, NULL, '2022-04-21 13:50:11', '2022-04-21 13:50:11', 73230, NULL),
(75215, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20241, 10131, NULL, NULL, '2022-04-21 16:23:44', '2022-04-21 16:23:44', 73231, NULL),
(75216, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20780, 10131, NULL, NULL, '2022-04-21 18:30:42', '2022-04-21 18:30:42', 73235, NULL),
(75218, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20827, 10131, NULL, NULL, '2022-04-21 19:01:50', '2022-04-21 19:01:50', 73238, NULL),
(75219, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10032, 10131, NULL, NULL, '2022-04-21 19:03:29', '2022-04-21 19:03:29', 73239, NULL),
(75221, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20832, 10131, NULL, NULL, '2022-04-21 19:14:25', '2022-04-21 19:14:25', 73242, NULL),
(75222, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 62832, 10131, NULL, NULL, '2022-04-21 19:17:39', '2022-04-21 19:17:39', 73243, NULL),
(75224, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20202, 10131, NULL, NULL, '2022-04-21 19:41:30', '2022-04-21 19:41:30', 73245, NULL),
(75225, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20836, 10131, NULL, NULL, '2022-04-21 19:44:47', '2022-04-21 19:44:47', 73246, NULL),
(75227, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20583, 10131, NULL, NULL, '2022-04-21 19:58:55', '2022-04-21 19:58:55', 73251, NULL),
(75228, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20773, 10131, NULL, NULL, '2022-04-21 20:36:42', '2022-04-21 20:36:42', 73254, NULL),
(75229, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20877, 10131, NULL, NULL, '2022-04-21 22:51:09', '2022-04-21 22:51:09', 73259, NULL),
(75230, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21294, 10131, NULL, NULL, '2022-04-21 23:28:33', '2022-04-21 23:28:33', 73261, NULL),
(75231, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20991, 10131, NULL, NULL, '2022-04-22 06:24:10', '2022-04-22 06:24:10', 73264, NULL),
(75232, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20775, 10131, NULL, NULL, '2022-04-22 08:56:33', '2022-04-22 08:56:33', 73270, NULL),
(75234, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20973, 10131, NULL, NULL, '2022-04-22 10:26:26', '2022-04-22 10:26:26', 73276, NULL),
(75235, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20865, 10131, NULL, NULL, '2022-04-22 10:54:43', '2022-04-22 10:54:43', 73277, NULL),
(75236, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83837, 10131, NULL, NULL, '2022-04-22 11:19:39', '2022-04-22 11:19:39', 73278, NULL),
(75237, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83231, 10131, NULL, NULL, '2022-04-22 11:38:06', '2022-04-22 11:38:06', 73279, NULL),
(75239, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20798, 10131, NULL, NULL, '2022-04-22 11:46:20', '2022-04-22 11:46:20', 73282, NULL),
(75240, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20870, 10131, NULL, NULL, '2022-04-22 12:18:18', '2022-04-22 12:18:18', 73283, NULL),
(75241, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20689, 10131, NULL, NULL, '2022-04-22 13:16:12', '2022-04-22 13:16:12', 73284, NULL),
(75242, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21046, 10131, NULL, NULL, '2022-04-22 17:46:05', '2022-04-22 17:46:05', 73287, NULL),
(75243, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20992, 10131, NULL, NULL, '2022-04-22 17:46:55', '2022-04-22 17:46:55', 73288, NULL),
(75244, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 52110, 10131, NULL, NULL, '2022-04-22 18:04:22', '2022-04-22 18:04:22', 73289, NULL),
(75245, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94113, 10131, NULL, NULL, '2022-04-22 20:45:07', '2022-04-22 20:45:07', 73293, NULL),
(75246, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20118, 10131, NULL, NULL, '2022-04-23 07:43:08', '2022-04-23 07:43:08', 73300, NULL),
(75247, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20558, 10131, NULL, NULL, '2022-04-23 08:02:48', '2022-04-23 08:02:48', 73301, NULL),
(75248, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94116, 10131, NULL, NULL, '2022-04-23 08:29:21', '2022-04-23 08:29:21', 73302, NULL),
(75249, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20364, 10131, NULL, NULL, '2022-04-23 09:37:31', '2022-04-23 09:37:31', 73304, NULL),
(75250, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94116, 10131, NULL, NULL, '2022-04-23 09:51:23', '2022-04-23 09:51:23', 73309, NULL);
INSERT INTO `transactions` (`id`, `reference`, `transaction_id`, `amount`, `transaction_date`, `payment_method_id`, `payment_status`, `bank_name`, `cheque_no`, `cheque_date`, `cheque_amount`, `user_id`, `event_id`, `admin_comment`, `user_comment`, `created_at`, `updated_at`, `event_registration_id`, `donation_id`) VALUES
(75251, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20556, 10131, NULL, NULL, '2022-04-23 10:36:12', '2022-04-23 10:36:12', 73310, NULL),
(75252, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20836, 10121, NULL, NULL, '2022-05-08 20:48:43', '2022-05-08 20:48:43', 73318, NULL),
(75253, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 41603, 10121, NULL, NULL, '2022-05-09 11:11:52', '2022-05-09 11:11:52', 73319, NULL),
(75254, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20241, 10121, NULL, NULL, '2022-05-09 18:58:08', '2022-05-09 18:58:08', 73321, NULL),
(75255, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20827, 10121, NULL, NULL, '2022-05-09 20:42:46', '2022-05-09 20:42:46', 73323, NULL),
(75256, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20708, 10121, NULL, NULL, '2022-05-10 06:38:07', '2022-05-10 06:38:07', 73324, NULL),
(75257, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20147, 10121, NULL, NULL, '2022-05-10 09:01:11', '2022-05-10 09:01:11', 73325, NULL),
(75258, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83221, 10121, NULL, NULL, '2022-05-10 18:01:36', '2022-05-10 18:01:36', 73326, NULL),
(75259, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20159, 10121, NULL, NULL, '2022-05-11 12:12:17', '2022-05-11 12:12:17', 73331, NULL),
(75260, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20558, 10121, NULL, NULL, '2022-05-11 19:34:29', '2022-05-11 19:34:29', 73332, NULL),
(75261, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20521, 10121, NULL, NULL, '2022-05-13 08:07:55', '2022-05-13 08:07:55', 73333, NULL),
(75262, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20307, 10121, NULL, NULL, '2022-05-13 14:31:37', '2022-05-13 14:31:37', 73334, NULL),
(75263, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20411, 10121, NULL, NULL, '2022-05-14 13:18:34', '2022-05-14 13:18:34', 73335, NULL),
(75264, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21014, 10121, NULL, NULL, '2022-05-14 15:21:54', '2022-05-14 15:21:54', 73336, NULL),
(75265, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10032, 10121, NULL, NULL, '2022-05-16 09:53:15', '2022-05-16 09:53:15', 73337, NULL),
(75266, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20973, 10121, NULL, NULL, '2022-05-17 12:17:03', '2022-05-17 12:17:03', 73339, NULL),
(75267, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83217, 10121, NULL, NULL, '2022-05-17 12:55:57', '2022-05-17 12:55:57', 73340, NULL),
(75268, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20817, 10121, NULL, NULL, '2022-05-17 14:39:03', '2022-05-17 14:39:03', 73341, NULL),
(75269, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20641, 10121, NULL, NULL, '2022-05-17 21:25:05', '2022-05-17 21:25:05', 73344, NULL),
(75270, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21008, 10121, NULL, NULL, '2022-05-17 22:27:42', '2022-05-17 22:27:42', 73347, NULL),
(75271, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21008, 10121, NULL, NULL, '2022-05-17 22:34:53', '2022-05-17 22:34:53', 73348, NULL),
(75272, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20621, 10121, NULL, NULL, '2022-05-18 09:24:08', '2022-05-18 09:24:08', 73349, NULL),
(75273, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83296, 10121, NULL, NULL, '2022-05-18 18:22:04', '2022-05-18 18:22:04', 73350, NULL),
(75274, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20517, 10121, NULL, NULL, '2022-05-18 21:44:46', '2022-05-18 21:44:46', 73351, NULL),
(75275, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20738, 10121, NULL, NULL, '2022-05-19 11:06:17', '2022-05-19 11:06:17', 83351, NULL),
(75276, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20547, 10121, NULL, NULL, '2022-05-19 11:37:33', '2022-05-19 11:37:33', 83353, NULL),
(75277, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20817, 10121, NULL, NULL, '2022-05-19 13:35:36', '2022-05-19 13:35:36', 83354, NULL),
(75278, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20162, 10121, NULL, NULL, '2022-05-19 14:08:56', '2022-05-19 14:08:56', 83355, NULL),
(75279, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20816, 10121, NULL, NULL, '2022-05-19 16:40:07', '2022-05-19 16:40:07', 83357, NULL),
(75280, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20364, 10121, NULL, NULL, '2022-05-19 20:44:36', '2022-05-19 20:44:36', 83359, NULL),
(75281, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20134, 10121, NULL, NULL, '2022-05-19 22:25:34', '2022-05-19 22:25:34', 83360, NULL),
(75282, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20992, 10126, NULL, NULL, '2022-06-03 07:35:04', '2022-06-03 07:35:04', 83363, NULL),
(75283, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20738, 10126, NULL, NULL, '2022-06-03 18:44:44', '2022-06-03 18:44:44', 83364, NULL),
(75284, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20147, 10126, NULL, NULL, '2022-06-09 17:58:20', '2022-06-09 17:58:20', 83366, NULL),
(75285, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20816, 10126, NULL, NULL, '2022-06-10 12:00:04', '2022-06-10 12:00:04', 83367, NULL),
(75286, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20766, 10126, NULL, NULL, '2022-06-11 17:12:51', '2022-06-11 17:12:51', 83368, NULL),
(75287, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94117, 10126, NULL, NULL, '2022-06-12 20:24:30', '2022-06-12 20:24:30', 83369, NULL),
(75288, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20159, 10125, NULL, NULL, '2022-06-24 10:25:32', '2022-06-24 10:25:32', 83375, NULL),
(75289, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20766, 10125, NULL, NULL, '2022-06-24 13:40:15', '2022-06-24 13:40:15', 83381, NULL),
(75290, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20605, 10125, NULL, NULL, '2022-06-24 15:10:44', '2022-06-24 15:10:44', 83382, NULL),
(75291, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21014, 107, NULL, NULL, '2022-06-24 18:16:41', '2022-06-24 18:16:41', 83383, NULL),
(75292, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21014, 107, NULL, NULL, '2022-06-24 18:17:01', '2022-06-24 18:17:01', 83384, NULL),
(75293, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21014, 107, NULL, NULL, '2022-06-24 18:17:20', '2022-06-24 18:17:20', 83385, NULL),
(75294, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21014, 107, NULL, NULL, '2022-06-24 18:17:38', '2022-06-24 18:17:38', 83386, NULL),
(75295, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21014, 10125, NULL, NULL, '2022-06-24 18:21:28', '2022-06-24 18:21:28', 83387, NULL),
(75296, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21001, 10125, NULL, NULL, '2022-06-25 21:02:17', '2022-06-25 21:02:17', 83389, NULL),
(75297, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20241, 10125, NULL, NULL, '2022-06-26 07:55:00', '2022-06-26 07:55:00', 83390, NULL),
(75298, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20692, 10125, NULL, NULL, '2022-06-26 08:01:21', '2022-06-26 08:01:21', 83391, NULL),
(75300, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20827, 10125, NULL, NULL, '2022-06-26 08:55:40', '2022-06-26 08:55:40', 83394, NULL),
(75301, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94121, 10125, NULL, NULL, '2022-06-26 09:03:45', '2022-06-26 09:03:45', 83395, NULL),
(75302, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20708, 10125, NULL, NULL, '2022-06-26 09:13:00', '2022-06-26 09:13:00', 83396, NULL),
(75303, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20307, 10125, NULL, NULL, '2022-06-26 09:13:38', '2022-06-26 09:13:38', 83397, NULL),
(75304, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94117, 10125, NULL, NULL, '2022-06-26 09:33:35', '2022-06-26 09:33:35', 83398, NULL),
(75305, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10086, 10125, NULL, NULL, '2022-06-26 09:45:41', '2022-06-26 09:45:41', 83399, NULL),
(75306, 'eventregistration', NULL, 10, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20406, 10125, NULL, NULL, '2022-06-26 20:23:52', '2022-06-26 20:23:52', 83400, NULL),
(75307, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20738, 10125, NULL, NULL, '2022-06-27 16:18:14', '2022-06-27 16:18:14', 83410, NULL),
(75308, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20228, 10125, NULL, NULL, '2022-06-28 07:18:12', '2022-06-28 07:18:12', 83411, NULL),
(75309, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20910, 10125, NULL, NULL, '2022-06-28 15:09:53', '2022-06-28 15:09:53', 83414, NULL),
(75310, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20202, 10125, NULL, NULL, '2022-06-28 21:05:26', '2022-06-28 21:05:26', 83415, NULL),
(75311, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20202, 10125, NULL, NULL, '2022-06-28 21:05:30', '2022-06-28 21:05:30', 83416, NULL),
(75312, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20992, 10125, NULL, NULL, '2022-06-28 21:32:57', '2022-06-28 21:32:57', 83418, NULL),
(75313, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 41603, 10125, NULL, NULL, '2022-06-28 21:48:03', '2022-06-28 21:48:03', 83420, NULL),
(75314, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20134, 10125, NULL, NULL, '2022-06-28 22:04:23', '2022-06-28 22:04:23', 83421, NULL),
(75315, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20908, 10125, NULL, NULL, '2022-06-29 06:14:21', '2022-06-29 06:14:21', 83422, NULL),
(75316, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 52086, 10125, NULL, NULL, '2022-06-29 08:04:47', '2022-06-29 08:04:47', 83423, NULL),
(75317, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83883, 10125, NULL, NULL, '2022-06-29 09:59:42', '2022-06-29 09:59:42', 83424, NULL),
(75318, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20973, 10125, NULL, NULL, '2022-06-29 10:03:04', '2022-06-29 10:03:04', 83425, NULL),
(75319, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20803, 10125, NULL, NULL, '2022-06-29 11:24:07', '2022-06-29 11:24:07', 83427, NULL),
(75320, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94124, 10125, NULL, NULL, '2022-06-29 12:42:33', '2022-06-29 12:42:33', 83428, NULL),
(75321, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83883, 10125, NULL, NULL, '2022-06-29 12:52:52', '2022-06-29 12:52:52', 83429, NULL),
(75322, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83228, 10125, NULL, NULL, '2022-06-30 07:56:37', '2022-06-30 07:56:37', 83431, NULL),
(75323, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20816, 10125, NULL, NULL, '2022-06-30 08:03:59', '2022-06-30 08:03:59', 83432, NULL),
(75324, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83296, 10125, NULL, NULL, '2022-06-30 08:19:55', '2022-06-30 08:19:55', 83433, NULL),
(75325, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20988, 10125, NULL, NULL, '2022-06-30 08:20:17', '2022-06-30 08:20:17', 83434, NULL),
(75326, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20808, 10125, NULL, NULL, '2022-06-30 08:26:08', '2022-06-30 08:26:08', 83435, NULL),
(75327, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94132, 10125, NULL, NULL, '2022-06-30 08:28:13', '2022-06-30 08:28:13', 83436, NULL),
(75328, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20364, 10125, NULL, NULL, '2022-06-30 08:41:58', '2022-06-30 08:41:58', 83437, NULL),
(75329, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10067, 10125, NULL, NULL, '2022-06-30 08:44:02', '2022-06-30 08:44:02', 83438, NULL),
(75330, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20775, 10125, NULL, NULL, '2022-06-30 08:58:21', '2022-06-30 08:58:21', 83439, NULL),
(75331, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20286, 10125, NULL, NULL, '2022-06-30 08:58:37', '2022-06-30 08:58:37', 83440, NULL),
(75332, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 52110, 10125, NULL, NULL, '2022-06-30 09:01:03', '2022-06-30 09:01:03', 83441, NULL),
(75333, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20388, 10125, NULL, NULL, '2022-06-30 09:23:48', '2022-06-30 09:23:48', 83442, NULL),
(75334, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21019, 10125, NULL, NULL, '2022-06-30 09:27:09', '2022-06-30 09:27:09', 83445, NULL),
(75335, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20517, 10125, NULL, NULL, '2022-06-30 09:58:00', '2022-06-30 09:58:00', 83447, NULL),
(75336, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20118, 10125, NULL, NULL, '2022-06-30 10:42:02', '2022-06-30 10:42:02', 83449, NULL),
(75337, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20836, 10125, NULL, NULL, '2022-06-30 11:28:15', '2022-06-30 11:28:15', 83450, NULL),
(75338, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20847, 10125, NULL, NULL, '2022-06-30 12:06:00', '2022-06-30 12:06:00', 83452, NULL),
(75339, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 52110, 10125, NULL, NULL, '2022-06-30 13:38:01', '2022-06-30 13:38:01', 83453, NULL),
(75340, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21047, 10125, NULL, NULL, '2022-06-30 13:56:38', '2022-06-30 13:56:38', 83454, NULL),
(75341, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94123, 10125, NULL, NULL, '2022-07-01 10:42:51', '2022-07-01 10:42:51', 83459, NULL),
(75342, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21285, 10125, NULL, NULL, '2022-07-01 11:57:38', '2022-07-01 11:57:38', 83461, NULL),
(75343, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83224, 10125, NULL, NULL, '2022-07-01 15:54:51', '2022-07-01 15:54:51', 83462, NULL),
(75344, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94137, 10125, NULL, NULL, '2022-07-01 20:13:26', '2022-07-01 20:13:26', 83463, NULL),
(75345, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20822, 10125, NULL, NULL, '2022-07-02 09:15:53', '2022-07-02 09:15:53', 83465, NULL),
(75346, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20203, 10125, NULL, NULL, '2022-07-03 07:17:40', '2022-07-03 07:17:40', 83466, NULL),
(75347, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20671, 10125, NULL, NULL, '2022-07-03 08:11:13', '2022-07-03 08:11:13', 83469, NULL),
(75348, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20567, 10125, NULL, NULL, '2022-07-03 08:26:49', '2022-07-03 08:26:49', 83470, NULL),
(75349, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21031, 10125, NULL, NULL, '2022-07-03 13:24:23', '2022-07-03 13:24:23', 83473, NULL),
(75350, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20411, 10125, NULL, NULL, '2022-07-04 06:29:35', '2022-07-04 06:29:35', 83475, NULL),
(75351, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83232, 10125, NULL, NULL, '2022-07-04 12:08:51', '2022-07-04 12:08:51', 83477, NULL),
(75352, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94118, 10125, NULL, NULL, '2022-07-04 15:52:33', '2022-07-04 15:52:33', 83481, NULL),
(75353, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20820, 10125, NULL, NULL, '2022-07-04 16:34:19', '2022-07-04 16:34:19', 83483, NULL),
(75354, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20558, 10125, NULL, NULL, '2022-07-04 18:24:59', '2022-07-04 18:24:59', 83484, NULL),
(75355, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20583, 10125, NULL, NULL, '2022-07-05 19:18:10', '2022-07-05 19:18:10', 83488, NULL),
(75356, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20992, 10125, NULL, NULL, '2022-07-06 05:24:07', '2022-07-06 05:24:07', 83491, NULL),
(75357, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20207, 10125, NULL, NULL, '2022-07-06 07:51:19', '2022-07-06 07:51:19', 83492, NULL),
(75358, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83875, 10125, NULL, NULL, '2022-07-06 16:57:31', '2022-07-06 16:57:31', 83494, NULL),
(75359, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 52110, 10125, NULL, NULL, '2022-07-06 17:17:11', '2022-07-06 17:17:11', 83497, NULL),
(75360, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20836, 10125, NULL, NULL, '2022-07-06 17:23:49', '2022-07-06 17:23:49', 83498, NULL),
(75361, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83336, 10125, NULL, NULL, '2022-07-06 17:57:29', '2022-07-06 17:57:29', 83499, NULL),
(75362, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20903, 10125, NULL, NULL, '2022-07-06 18:11:28', '2022-07-06 18:11:28', 83500, NULL),
(75363, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21274, 10125, NULL, NULL, '2022-07-06 19:06:29', '2022-07-06 19:06:29', 83501, NULL),
(75364, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20560, 10125, NULL, NULL, '2022-07-06 19:14:36', '2022-07-06 19:14:36', 83502, NULL),
(75365, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20154, 10125, NULL, NULL, '2022-07-06 20:22:53', '2022-07-06 20:22:53', 83503, NULL),
(75366, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21019, 10125, NULL, NULL, '2022-07-07 06:58:07', '2022-07-07 06:58:07', 83506, NULL),
(75367, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20779, 10125, NULL, NULL, '2022-07-07 10:52:22', '2022-07-07 10:52:22', 83508, NULL),
(75368, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21279, 10125, NULL, NULL, '2022-07-07 11:07:06', '2022-07-07 11:07:06', 83511, NULL),
(75369, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20727, 10125, NULL, NULL, '2022-07-07 11:09:27', '2022-07-07 11:09:27', 83512, NULL),
(75370, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20776, 10125, NULL, NULL, '2022-07-07 13:26:50', '2022-07-07 13:26:50', 83519, NULL),
(75371, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20737, 10125, NULL, NULL, '2022-07-07 14:12:23', '2022-07-07 14:12:23', 83520, NULL),
(75372, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20995, 10125, NULL, NULL, '2022-07-07 14:49:26', '2022-07-07 14:49:26', 83521, NULL),
(75373, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20880, 10125, NULL, NULL, '2022-07-07 15:13:33', '2022-07-07 15:13:33', 83522, NULL),
(75374, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94119, 10125, NULL, NULL, '2022-07-07 16:25:24', '2022-07-07 16:25:24', 83524, NULL),
(75375, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20307, 10125, NULL, NULL, '2022-07-07 16:59:52', '2022-07-07 16:59:52', 83525, NULL),
(75376, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83224, 10125, NULL, NULL, '2022-07-07 17:03:16', '2022-07-07 17:03:16', 83526, NULL),
(75377, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20521, 10125, NULL, NULL, '2022-07-07 22:16:20', '2022-07-07 22:16:20', 83528, NULL),
(75378, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20230, 10125, NULL, NULL, '2022-07-08 08:15:26', '2022-07-08 08:15:26', 83529, NULL),
(75379, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21004, 10125, NULL, NULL, '2022-07-08 10:38:13', '2022-07-08 10:38:13', 83530, NULL),
(75380, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21004, 10125, NULL, NULL, '2022-07-08 10:39:27', '2022-07-08 10:39:27', 83531, NULL),
(75381, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20621, 10125, NULL, NULL, '2022-07-08 14:29:23', '2022-07-08 14:29:23', 83532, NULL),
(75382, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20761, 10125, NULL, NULL, '2022-07-08 17:54:59', '2022-07-08 17:54:59', 83538, NULL),
(75383, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94138, 10125, NULL, NULL, '2022-07-08 18:06:32', '2022-07-08 18:06:32', 83539, NULL),
(75384, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94136, 10125, NULL, NULL, '2022-07-08 20:17:43', '2022-07-08 20:17:43', 83545, NULL),
(75385, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94136, 10125, NULL, NULL, '2022-07-08 20:25:13', '2022-07-08 20:25:13', 83547, NULL),
(75386, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20600, 10125, NULL, NULL, '2022-07-09 08:46:32', '2022-07-09 08:46:32', 83557, NULL),
(75387, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94136, 10125, NULL, NULL, '2022-07-09 10:49:15', '2022-07-09 10:49:15', 83560, NULL),
(75388, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20568, 10133, NULL, NULL, '2022-08-20 11:29:17', '2022-08-20 11:29:17', 83564, NULL),
(75389, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20241, 10133, NULL, NULL, '2022-08-20 11:44:56', '2022-08-20 11:44:56', 83566, NULL),
(75390, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20992, 10133, NULL, NULL, '2022-08-20 12:02:40', '2022-08-20 12:02:40', 83567, NULL),
(75391, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20877, 10133, NULL, NULL, '2022-08-20 12:02:54', '2022-08-20 12:02:54', 83568, NULL),
(75392, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83296, 10133, NULL, NULL, '2022-08-20 12:19:16', '2022-08-20 12:19:16', 83569, NULL),
(75393, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20827, 10133, NULL, NULL, '2022-08-20 12:40:54', '2022-08-20 12:40:54', 83570, NULL),
(75394, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20973, 10133, NULL, NULL, '2022-08-20 13:00:10', '2022-08-20 13:00:10', 83571, NULL),
(75395, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20853, 10133, NULL, NULL, '2022-08-20 13:51:30', '2022-08-20 13:51:30', 83573, NULL),
(75396, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20836, 10133, NULL, NULL, '2022-08-20 15:28:50', '2022-08-20 15:28:50', 83574, NULL),
(75397, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10067, 10133, NULL, NULL, '2022-08-20 15:55:43', '2022-08-20 15:55:43', 83575, NULL),
(75398, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20621, 10133, NULL, NULL, '2022-08-20 19:12:32', '2022-08-20 19:12:32', 83576, NULL),
(75399, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20621, 10133, NULL, NULL, '2022-08-20 19:12:36', '2022-08-20 19:12:36', 83577, NULL),
(75400, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20797, 10133, NULL, NULL, '2022-08-20 19:25:56', '2022-08-20 19:25:56', 83578, NULL),
(75401, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20708, 10133, NULL, NULL, '2022-08-20 20:52:12', '2022-08-20 20:52:12', 83579, NULL),
(75402, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20988, 10133, NULL, NULL, '2022-08-21 06:32:05', '2022-08-21 06:32:05', 83580, NULL),
(75403, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94142, 10133, NULL, NULL, '2022-08-21 08:10:39', '2022-08-21 08:10:39', 83581, NULL),
(75404, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94118, 10133, NULL, NULL, '2022-08-21 08:14:52', '2022-08-21 08:14:52', 83582, NULL),
(75405, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20584, 10133, NULL, NULL, '2022-08-21 09:48:08', '2022-08-21 09:48:08', 83583, NULL),
(75406, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20583, 10133, NULL, NULL, '2022-08-22 07:57:00', '2022-08-22 07:57:00', 83584, NULL),
(75407, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20766, 10133, NULL, NULL, '2022-08-22 08:07:56', '2022-08-22 08:07:56', 83585, NULL),
(75408, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21001, 10133, NULL, NULL, '2022-08-22 11:35:50', '2022-08-22 11:35:50', 83586, NULL),
(75409, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83217, 10133, NULL, NULL, '2022-08-22 15:09:05', '2022-08-22 15:09:05', 83587, NULL),
(75410, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20779, 10133, NULL, NULL, '2022-08-22 20:57:01', '2022-08-22 20:57:01', 83588, NULL),
(75411, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20836, 10133, NULL, NULL, '2022-08-23 15:09:08', '2022-08-23 15:09:08', 83591, NULL),
(75412, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83336, 10133, NULL, NULL, '2022-08-23 15:09:38', '2022-08-23 15:09:38', 83592, NULL),
(75413, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83296, 10133, NULL, NULL, '2022-08-23 15:35:35', '2022-08-23 15:35:35', 83593, NULL),
(75414, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20738, 10133, NULL, NULL, '2022-08-23 19:26:22', '2022-08-23 19:26:22', 83595, NULL),
(75415, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20727, 10133, NULL, NULL, '2022-08-24 07:11:24', '2022-08-24 07:11:24', 83600, NULL),
(75416, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20835, 10133, NULL, NULL, '2022-08-24 10:33:29', '2022-08-24 10:33:29', 83601, NULL),
(75417, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 73097, 10133, NULL, NULL, '2022-08-24 10:52:40', '2022-08-24 10:52:40', 83602, NULL),
(75418, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 73097, 10133, NULL, NULL, '2022-08-24 17:44:36', '2022-08-24 17:44:36', 83603, NULL),
(75419, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20865, 10133, NULL, NULL, '2022-08-24 19:37:38', '2022-08-24 19:37:38', 83604, NULL),
(75420, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94124, 10133, NULL, NULL, '2022-08-24 19:53:50', '2022-08-24 19:53:50', 83605, NULL),
(75421, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94124, 10133, NULL, NULL, '2022-08-24 20:13:26', '2022-08-24 20:13:26', 83606, NULL),
(75422, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21046, 10133, NULL, NULL, '2022-08-25 13:47:36', '2022-08-25 13:47:36', 83607, NULL),
(75423, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83883, 10133, NULL, NULL, '2022-08-25 15:01:24', '2022-08-25 15:01:24', 83608, NULL),
(75424, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20880, 10133, NULL, NULL, '2022-08-25 21:09:45', '2022-08-25 21:09:45', 83611, NULL),
(75425, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94123, 10133, NULL, NULL, '2022-08-25 21:35:25', '2022-08-25 21:35:25', 83612, NULL),
(75426, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94141, 10133, NULL, NULL, '2022-08-25 21:58:17', '2022-08-25 21:58:17', 83613, NULL),
(75427, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20808, 10133, NULL, NULL, '2022-08-26 07:44:46', '2022-08-26 07:44:46', 83614, NULL),
(75428, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20162, 10133, NULL, NULL, '2022-08-26 08:21:10', '2022-08-26 08:21:10', 83615, NULL),
(75429, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20803, 10133, NULL, NULL, '2022-08-26 14:56:54', '2022-08-26 14:56:54', 83618, NULL),
(75430, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20877, 10133, NULL, NULL, '2022-08-26 14:58:45', '2022-08-26 14:58:45', 83619, NULL),
(75431, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20584, 10133, NULL, NULL, '2022-08-26 15:00:35', '2022-08-26 15:00:35', 83620, NULL),
(75432, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20779, 10133, NULL, NULL, '2022-08-26 15:24:06', '2022-08-26 15:24:06', 83621, NULL),
(75433, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21274, 10133, NULL, NULL, '2022-08-26 15:41:25', '2022-08-26 15:41:25', 83622, NULL),
(75434, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21274, 10133, NULL, NULL, '2022-08-26 15:41:27', '2022-08-26 15:41:27', 83623, NULL),
(75435, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83232, 10133, NULL, NULL, '2022-08-26 16:15:51', '2022-08-26 16:15:51', 83624, NULL),
(75436, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83232, 10133, NULL, NULL, '2022-08-26 16:20:14', '2022-08-26 16:20:14', 83625, NULL),
(75437, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83220, 10133, NULL, NULL, '2022-08-26 16:20:21', '2022-08-26 16:20:21', 83626, NULL),
(75438, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20908, 10133, NULL, NULL, '2022-08-26 16:21:37', '2022-08-26 16:21:37', 83627, NULL),
(75439, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20903, 10133, NULL, NULL, '2022-08-26 17:53:32', '2022-08-26 17:53:32', 83628, NULL),
(75440, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20558, 10133, NULL, NULL, '2022-08-26 18:00:42', '2022-08-26 18:00:42', 83629, NULL),
(75441, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20665, 10133, NULL, NULL, '2022-08-26 19:36:29', '2022-08-26 19:36:29', 83630, NULL),
(75442, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20776, 10133, NULL, NULL, '2022-08-26 20:24:20', '2022-08-26 20:24:20', 83631, NULL),
(75443, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20118, 10133, NULL, NULL, '2022-08-27 05:38:37', '2022-08-27 05:38:37', 83632, NULL),
(75444, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20816, 10133, NULL, NULL, '2022-08-28 13:47:24', '2022-08-28 13:47:24', 83637, NULL),
(75445, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10086, 58, NULL, NULL, '2022-10-08 22:19:02', '2022-10-08 22:19:02', 84050, NULL),
(75446, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20568, 58, NULL, NULL, '2022-10-09 06:15:40', '2022-11-03 21:12:49', 84055, NULL),
(75447, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 73097, 58, NULL, NULL, '2022-10-09 14:43:37', '2022-10-09 14:43:37', 84060, NULL),
(75448, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20159, 58, NULL, NULL, '2022-10-09 15:24:37', '2022-10-09 15:24:37', 84061, NULL),
(75449, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10080, 58, NULL, NULL, '2022-10-09 18:21:17', '2022-10-09 18:21:17', 84066, NULL),
(75450, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83217, 58, NULL, NULL, '2022-10-09 18:58:02', '2022-10-09 18:58:02', 84067, NULL),
(75451, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20816, 58, NULL, NULL, '2022-10-09 20:37:33', '2022-10-09 20:37:33', 84068, NULL),
(75452, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83228, 58, NULL, NULL, '2022-10-09 23:06:04', '2022-10-09 23:06:04', 84069, NULL),
(75453, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20832, 58, NULL, NULL, '2022-10-10 06:37:22', '2022-10-10 06:37:22', 84075, NULL),
(75454, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83221, 58, NULL, NULL, '2022-10-10 09:40:39', '2022-10-10 09:40:39', 84081, NULL),
(75455, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20865, 58, NULL, NULL, '2022-10-10 12:21:12', '2022-10-10 12:21:12', 84084, NULL),
(75456, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20411, 58, NULL, NULL, '2022-10-10 17:00:48', '2022-10-10 17:00:48', 84094, NULL),
(75457, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20988, 58, NULL, NULL, '2022-10-12 11:16:50', '2022-10-12 11:16:50', 84141, NULL),
(75458, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20241, 58, NULL, NULL, '2022-10-12 20:04:56', '2022-10-12 20:04:56', 84150, NULL),
(75459, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20738, 58, NULL, NULL, '2022-10-12 20:06:32', '2022-10-12 20:06:32', 84151, NULL),
(75460, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20558, 58, NULL, NULL, '2022-10-13 08:50:11', '2022-10-13 08:50:11', 84169, NULL),
(75461, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20738, 58, NULL, NULL, '2022-10-13 10:15:14', '2022-10-13 10:15:14', 84173, NULL),
(75462, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20871, 58, NULL, NULL, '2022-10-13 13:35:57', '2022-10-13 13:35:57', 84182, NULL),
(75463, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20992, 58, NULL, NULL, '2022-10-13 17:21:35', '2022-10-13 17:21:35', 84193, NULL),
(75464, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94118, 58, NULL, NULL, '2022-10-13 17:23:03', '2022-10-13 17:23:03', 84194, NULL),
(75465, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20147, 58, NULL, NULL, '2022-10-13 19:42:13', '2022-10-13 19:42:13', 84200, NULL),
(75466, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83336, 58, NULL, NULL, '2022-10-14 16:35:46', '2022-10-14 16:35:46', 84217, NULL),
(75467, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94141, 58, NULL, NULL, '2022-10-16 07:20:54', '2022-10-16 07:20:54', 84245, NULL),
(75468, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 52110, 58, NULL, NULL, '2022-10-16 07:29:35', '2022-10-16 07:29:35', 84246, NULL),
(75469, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21001, 58, NULL, NULL, '2022-10-16 09:00:16', '2022-10-16 09:00:16', 84248, NULL),
(75470, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94132, 58, NULL, NULL, '2022-10-16 10:48:41', '2022-10-16 10:48:41', 84251, NULL),
(75471, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20853, 58, NULL, NULL, '2022-10-16 12:47:46', '2022-10-16 12:47:46', 84254, NULL),
(75472, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10067, 58, NULL, NULL, '2022-10-17 13:15:03', '2022-10-17 13:15:03', 84278, NULL),
(75473, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10062, 58, NULL, NULL, '2022-10-18 08:26:40', '2022-10-18 08:26:40', 84297, NULL),
(75474, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20827, 58, NULL, NULL, '2022-10-18 21:51:25', '2022-10-18 21:51:25', 84324, NULL),
(75475, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20708, 58, NULL, NULL, '2022-10-19 18:26:20', '2022-10-19 18:26:20', 84348, NULL),
(75476, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20973, 58, NULL, NULL, '2022-10-20 09:36:28', '2022-10-20 09:36:28', 84360, NULL),
(75477, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20851, 58, NULL, NULL, '2022-10-20 12:54:49', '2022-10-20 12:54:49', 84362, NULL),
(75478, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21014, 58, NULL, NULL, '2022-10-22 08:27:23', '2022-10-22 08:27:23', 84397, NULL),
(75479, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94149, 58, NULL, NULL, '2022-10-22 13:44:04', '2022-10-22 13:44:04', 84409, NULL),
(75480, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83210, 58, NULL, NULL, '2022-10-22 21:34:38', '2022-10-22 21:34:38', 84416, NULL),
(75481, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20766, 58, NULL, NULL, '2022-10-24 22:46:56', '2022-10-24 22:46:56', 84461, NULL),
(75482, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20621, 58, NULL, NULL, '2022-10-26 20:18:20', '2022-10-26 20:18:20', 84509, NULL),
(75483, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20600, 58, NULL, NULL, '2022-10-26 20:21:27', '2022-10-26 20:21:27', 84510, NULL),
(75484, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94123, 58, NULL, NULL, '2022-10-26 21:15:51', '2022-10-26 21:15:51', 84513, NULL),
(75485, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20162, 58, NULL, NULL, '2022-10-27 22:09:59', '2022-10-27 22:09:59', 84550, NULL),
(75486, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20701, 58, NULL, NULL, '2022-10-27 22:22:00', '2022-10-27 22:22:00', 84551, NULL),
(75487, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20692, 58, NULL, NULL, '2022-10-27 22:24:14', '2022-10-27 22:24:14', 84552, NULL),
(75488, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20364, 58, NULL, NULL, '2022-10-27 22:48:44', '2022-10-27 22:48:44', 84553, NULL),
(75490, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20847, 58, NULL, NULL, '2022-10-28 04:12:52', '2022-10-28 04:12:52', 84562, NULL),
(75491, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83235, 58, NULL, NULL, '2022-10-28 05:14:20', '2022-10-28 05:14:20', 84563, NULL),
(75492, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83235, 58, NULL, NULL, '2022-10-28 05:14:26', '2022-10-28 05:14:26', 84564, NULL),
(75493, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20353, 58, NULL, NULL, '2022-10-28 07:08:53', '2022-10-28 07:08:53', 84570, NULL),
(75494, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94138, 58, NULL, NULL, '2022-10-28 07:21:08', '2022-10-28 07:21:08', 84571, NULL),
(75495, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94142, 58, NULL, NULL, '2022-10-28 08:47:59', '2022-10-28 08:47:59', 84574, NULL),
(75496, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21019, 58, NULL, NULL, '2022-10-28 08:54:20', '2022-10-28 08:54:20', 84575, NULL),
(75497, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21047, 58, NULL, NULL, '2022-10-28 09:06:40', '2022-10-28 09:06:40', 84577, NULL),
(75498, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20803, 58, NULL, NULL, '2022-10-28 09:17:55', '2022-10-28 09:17:55', 84578, NULL),
(75499, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20779, 58, NULL, NULL, '2022-10-28 10:01:48', '2022-10-28 10:01:48', 84582, NULL),
(75500, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83232, 58, NULL, NULL, '2022-10-28 10:43:21', '2022-10-28 10:43:21', 84586, NULL),
(75501, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20912, 58, NULL, NULL, '2022-10-28 12:23:01', '2022-10-28 12:23:01', 84594, NULL),
(75502, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20877, 58, NULL, NULL, '2022-10-28 12:26:25', '2022-10-28 12:26:25', 84596, NULL),
(75503, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20138, 58, NULL, NULL, '2022-10-28 17:28:46', '2022-10-28 17:28:46', 84608, NULL),
(75504, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94138, 58, NULL, NULL, '2022-10-28 19:13:11', '2022-10-28 19:13:11', 84613, NULL),
(75505, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 52086, 58, NULL, NULL, '2022-10-28 20:07:29', '2022-10-28 20:07:29', 84615, NULL),
(75507, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20521, 58, NULL, NULL, '2022-10-29 03:17:39', '2022-10-29 03:17:39', 84621, NULL),
(75508, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20583, 58, NULL, NULL, '2022-10-29 07:08:08', '2022-10-29 07:08:08', 84624, NULL),
(75509, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20794, 58, NULL, NULL, '2022-10-29 07:13:45', '2022-10-29 07:13:45', 84625, NULL),
(75510, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 41603, 58, NULL, NULL, '2022-10-29 12:45:43', '2022-10-29 12:45:43', 84637, NULL),
(75511, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20747, 58, NULL, NULL, '2022-10-29 16:19:53', '2022-10-29 16:19:53', 84641, NULL),
(75512, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94159, 58, NULL, NULL, '2022-10-30 07:13:33', '2022-10-30 07:13:33', 84655, NULL),
(75513, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20207, 58, NULL, NULL, '2022-10-30 08:52:13', '2022-10-30 08:52:13', 84659, NULL),
(75514, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21274, 58, NULL, NULL, '2022-10-30 10:06:35', '2022-10-30 10:06:35', 84662, NULL),
(75515, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94132, 58, NULL, NULL, '2022-10-30 11:00:55', '2022-10-30 11:00:55', 84665, NULL),
(75516, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20757, 58, NULL, NULL, '2022-10-30 15:43:46', '2022-10-30 15:43:46', 84673, NULL),
(75517, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94116, 58, NULL, NULL, '2022-10-30 16:38:42', '2022-10-30 16:38:42', 84674, NULL),
(75518, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94116, 58, NULL, NULL, '2022-10-30 16:39:15', '2022-10-30 16:39:15', 84675, NULL),
(75519, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20808, 58, NULL, NULL, '2022-10-30 17:31:19', '2022-10-30 17:31:19', 84676, NULL),
(75520, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20803, 58, NULL, NULL, '2022-10-30 18:01:04', '2022-10-30 18:01:04', 84678, NULL),
(75521, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20292, 58, NULL, NULL, '2022-10-31 08:46:38', '2022-10-31 08:46:38', 84690, NULL),
(75522, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20666, 58, NULL, NULL, '2022-10-31 08:52:27', '2022-10-31 08:52:27', 84691, NULL),
(75523, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 73097, 58, NULL, NULL, '2022-10-31 09:34:07', '2022-10-31 09:34:07', 84692, NULL),
(75524, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83232, 58, NULL, NULL, '2022-10-31 10:07:21', '2022-10-31 10:07:21', 84694, NULL),
(75525, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94162, 58, NULL, NULL, '2022-10-31 14:39:18', '2022-10-31 14:39:18', 84698, NULL),
(75526, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94155, 58, NULL, NULL, '2022-10-31 15:02:47', '2022-10-31 15:02:47', 84699, NULL),
(75527, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20775, 58, NULL, NULL, '2022-10-31 15:54:40', '2022-10-31 15:54:40', 84702, NULL),
(75528, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 62816, 58, NULL, NULL, '2022-10-31 16:06:49', '2022-10-31 16:06:49', 84704, NULL),
(75529, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20202, 58, NULL, NULL, '2022-10-31 18:27:14', '2022-10-31 18:27:14', 84708, NULL),
(75530, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21017, 58, NULL, NULL, '2022-10-31 19:35:34', '2022-10-31 19:35:34', 84710, NULL),
(75531, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83862, 58, NULL, NULL, '2022-10-31 19:57:33', '2022-10-31 19:57:33', 84711, NULL),
(75532, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94139, 58, NULL, NULL, '2022-10-31 20:11:19', '2022-10-31 20:11:19', 84712, NULL),
(75533, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20836, 58, NULL, NULL, '2022-10-31 21:22:22', '2022-10-31 21:22:22', 84715, NULL),
(75534, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20880, 58, NULL, NULL, '2022-10-31 22:23:31', '2022-10-31 22:23:31', 84717, NULL),
(75535, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20766, 58, NULL, NULL, '2022-10-31 23:35:33', '2022-10-31 23:35:33', 84718, NULL),
(75536, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94156, 58, NULL, NULL, '2022-11-01 08:15:42', '2022-11-01 08:15:42', 84731, NULL),
(75537, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94157, 58, NULL, NULL, '2022-11-01 08:16:22', '2022-11-01 08:16:22', 84732, NULL),
(75538, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20286, 58, NULL, NULL, '2022-11-01 08:31:31', '2022-11-01 08:31:31', 84733, NULL),
(75539, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94157, 58, NULL, NULL, '2022-11-01 09:33:52', '2022-11-01 09:33:52', 84736, NULL),
(75540, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20822, 58, NULL, NULL, '2022-11-01 12:03:01', '2022-11-01 12:03:01', 84744, NULL),
(75541, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20880, 58, NULL, NULL, '2022-11-01 12:20:13', '2022-11-01 12:20:13', 84746, NULL),
(75542, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20820, 58, NULL, NULL, '2022-11-01 12:33:23', '2022-11-01 12:33:23', 84747, NULL),
(75543, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94163, 58, NULL, NULL, '2022-11-01 18:46:41', '2022-11-01 18:46:41', 84770, NULL),
(75544, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94164, 58, NULL, NULL, '2022-11-01 19:51:22', '2022-11-01 19:51:22', 84772, NULL),
(75545, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20880, 58, NULL, NULL, '2022-11-01 20:27:15', '2022-11-01 20:27:15', 84773, NULL),
(75546, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94159, 58, NULL, NULL, '2022-11-01 21:45:50', '2022-11-01 21:45:50', 84776, NULL),
(75547, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20118, 58, NULL, NULL, '2022-11-02 13:55:41', '2022-11-02 13:55:41', 84791, NULL),
(75548, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20816, 58, NULL, NULL, '2022-11-02 16:06:55', '2022-11-02 16:06:55', 84796, NULL);
INSERT INTO `transactions` (`id`, `reference`, `transaction_id`, `amount`, `transaction_date`, `payment_method_id`, `payment_status`, `bank_name`, `cheque_no`, `cheque_date`, `cheque_amount`, `user_id`, `event_id`, `admin_comment`, `user_comment`, `created_at`, `updated_at`, `event_registration_id`, `donation_id`) VALUES
(75549, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94166, 58, NULL, NULL, '2022-11-02 16:53:36', '2022-11-02 16:53:36', 84797, NULL),
(75550, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10086, 58, NULL, NULL, '2022-11-02 16:54:39', '2022-11-02 16:54:39', 84798, NULL),
(75551, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 10086, 58, NULL, NULL, '2022-11-02 16:59:47', '2022-11-02 16:59:47', 84799, NULL),
(75552, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20111, 58, NULL, NULL, '2022-11-02 18:39:20', '2022-11-02 18:39:20', 84800, NULL),
(75553, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20517, 58, NULL, NULL, '2022-11-02 20:40:56', '2022-11-02 20:40:56', 84807, NULL),
(75554, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94147, 58, NULL, NULL, '2022-11-02 21:38:48', '2022-11-02 21:38:48', 84810, NULL),
(75555, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94156, 58, NULL, NULL, '2022-11-03 06:47:10', '2022-11-03 06:47:10', 84813, NULL),
(75556, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20600, 58, NULL, NULL, '2022-11-03 06:53:17', '2022-11-03 06:53:17', 84814, NULL),
(75557, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20134, 58, NULL, NULL, '2022-11-03 07:02:03', '2022-11-03 07:02:03', 84815, NULL),
(75558, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20779, 58, NULL, NULL, '2022-11-03 07:06:23', '2022-11-03 07:06:23', 84818, NULL),
(75559, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20779, 58, NULL, NULL, '2022-11-03 07:07:03', '2022-11-03 07:07:03', 84819, NULL),
(75560, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20665, 58, NULL, NULL, '2022-11-03 07:11:25', '2022-11-03 07:11:25', 84821, NULL),
(75561, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20665, 58, NULL, NULL, '2022-11-03 07:11:51', '2022-11-03 07:11:51', 84822, NULL),
(75562, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20737, 58, NULL, NULL, '2022-11-03 07:31:38', '2022-11-03 07:31:38', 84823, NULL),
(75563, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20173, 58, NULL, NULL, '2022-11-03 07:52:21', '2022-11-03 07:52:21', 84825, NULL),
(75564, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94162, 58, NULL, NULL, '2022-11-03 07:55:31', '2022-11-03 07:55:31', 84826, NULL),
(75565, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20230, 58, NULL, NULL, '2022-11-03 07:59:04', '2022-11-03 07:59:04', 84827, NULL),
(75566, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 21279, 58, NULL, NULL, '2022-11-03 08:28:10', '2022-11-03 08:28:10', 84828, NULL),
(75567, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94167, 58, NULL, NULL, '2022-11-03 08:34:24', '2022-11-03 08:34:24', 84830, NULL),
(75568, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94119, 58, NULL, NULL, '2022-11-03 09:03:00', '2022-11-03 09:03:00', 84832, NULL),
(75569, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94119, 58, NULL, NULL, '2022-11-03 09:05:54', '2022-11-03 09:05:54', 84833, NULL),
(75570, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20761, 58, NULL, NULL, '2022-11-03 09:30:33', '2022-11-03 09:30:33', 84834, NULL),
(75571, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20174, 58, NULL, NULL, '2022-11-03 09:44:18', '2022-11-03 09:44:18', 84837, NULL),
(75572, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20583, 58, NULL, NULL, '2022-11-03 11:45:22', '2022-11-03 11:45:22', 84840, NULL),
(75573, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20794, 58, NULL, NULL, '2022-11-03 11:47:13', '2022-11-03 11:47:13', 84841, NULL),
(75574, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94158, 58, NULL, NULL, '2022-11-03 11:48:02', '2022-11-03 11:48:02', 84842, NULL),
(75575, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20908, 58, NULL, NULL, '2022-11-03 13:31:32', '2022-11-03 13:31:32', 84850, NULL),
(75576, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94170, 58, NULL, NULL, '2022-11-03 15:21:03', '2022-11-03 15:21:03', 84859, NULL),
(75577, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94170, 58, NULL, NULL, '2022-11-03 15:25:18', '2022-11-03 15:25:18', 84860, NULL),
(75578, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94171, 58, NULL, NULL, '2022-11-03 16:33:43', '2022-11-03 16:33:43', 84863, NULL),
(75579, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20727, 58, NULL, NULL, '2022-11-03 16:50:30', '2022-11-03 16:50:30', 84864, NULL),
(75580, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94172, 58, NULL, NULL, '2022-11-03 17:02:06', '2022-11-03 17:02:06', 84865, NULL),
(75581, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94172, 58, NULL, NULL, '2022-11-03 17:05:08', '2022-11-03 17:05:08', 84866, NULL),
(75582, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94147, 58, NULL, NULL, '2022-11-03 17:05:21', '2022-11-03 17:05:21', 84867, NULL),
(75583, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20972, 58, NULL, NULL, '2022-11-03 17:16:15', '2022-11-03 17:16:15', 84869, NULL),
(75584, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20228, 58, NULL, NULL, '2022-11-03 19:13:17', '2022-11-03 19:13:17', 84876, NULL),
(75585, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20776, 58, NULL, NULL, '2022-11-03 19:48:33', '2022-11-03 19:48:33', 84878, NULL),
(75586, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20179, 58, NULL, NULL, '2022-11-04 06:48:49', '2022-11-04 06:48:49', 84887, NULL),
(75587, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 83837, 58, NULL, NULL, '2022-11-04 13:20:22', '2022-11-04 13:20:22', 84893, NULL),
(75588, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94177, 58, NULL, NULL, '2022-11-04 19:31:35', '2022-11-04 19:31:35', 84902, NULL),
(75589, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94174, 58, NULL, NULL, '2022-11-05 10:20:02', '2022-11-05 10:20:02', 84915, NULL),
(75590, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 94174, 58, NULL, NULL, '2022-11-05 13:03:40', '2022-11-05 13:03:40', 84921, NULL),
(75591, 'eventregistration', NULL, 0, NULL, NULL, 'Success', NULL, NULL, NULL, NULL, 20118, 58, NULL, NULL, '2022-11-05 13:31:28', '2022-11-05 13:31:28', 84922, NULL),
(75595, 'donations', NULL, 100, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-02 08:13:28', '2017-06-02 08:13:28', NULL, 173),
(75596, 'donations', NULL, 1116, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-05 15:07:23', '2017-06-05 15:07:23', NULL, 174),
(75597, 'donations', NULL, 10, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-04 11:38:33', '2017-07-04 11:38:33', NULL, 175),
(75598, 'donations', '22C25456AU263382U', 25, '2017-07-11', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-11 17:38:07', '2017-07-13 20:04:50', NULL, 176),
(75599, 'donations', '0PD3637544365925E', 20, '2017-07-12', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-12 20:51:54', '2017-07-12 20:53:08', NULL, 177),
(75600, 'donations', '5RF45675RA503433E', 20, '2017-07-13', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-13 16:17:16', '2017-07-13 16:20:17', NULL, 178),
(75601, 'donations', '2UN614721W974924A', 25, '2017-07-14', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-14 07:12:27', '2017-07-14 07:15:27', NULL, 179),
(75602, 'donations', '91B48118ED857592H', 51, '2017-07-14', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-14 14:32:34', '2017-07-14 14:37:20', NULL, 180),
(75603, 'donations', NULL, 25, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-14 16:59:03', '2017-07-14 16:59:03', NULL, 181),
(75604, 'donations', '50F54771ET436353B', 30, '2017-07-14', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-14 17:42:47', '2017-07-14 17:49:22', NULL, 182),
(75605, 'donations', '6VH83380S7777045E', 20, '2017-07-14', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-14 17:59:29', '2017-07-14 18:01:46', NULL, 183),
(75606, 'donations', NULL, 12, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-17 01:22:03', '2017-07-17 01:22:03', NULL, 184),
(75607, 'donations', NULL, 50, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-20 22:22:28', '2017-07-20 22:22:28', NULL, 185),
(75608, 'donations', NULL, 50, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-20 22:24:00', '2017-07-20 22:24:00', NULL, 186),
(75609, 'donations', '00X57271DS527872R', 50, '2017-10-31', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-31 19:46:56', '2017-10-31 19:49:36', NULL, 187),
(75610, 'donations', NULL, 54202, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-05 02:26:14', '2017-11-05 02:26:14', NULL, 188),
(75611, 'donations', '2930453917081562W', 50, '2017-11-18', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-18 09:25:47', '2017-11-18 09:28:08', NULL, 189),
(75612, 'donations', '2AK7995178727612M', 10, '2017-11-23', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-23 12:51:06', '2017-11-23 12:53:33', NULL, 190),
(75613, 'donations', '2EP3569575893450Y', 51, '2017-11-28', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-28 15:38:44', '2017-11-28 15:41:21', NULL, 191),
(75614, 'donations', '7HJ76082MT6058021', 25, '2017-11-30', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-30 07:30:55', '2017-11-30 07:32:58', NULL, 192),
(75615, 'donations', '1DL11406W88082302', 25, '2017-12-01', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-01 04:51:05', '2017-12-01 04:57:40', NULL, 193),
(75616, 'donations', '5J796687S5072161B', 25, '2017-12-01', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-01 15:09:33', '2017-12-01 15:12:39', NULL, 194),
(75617, 'donations', NULL, 100, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-01 17:44:26', '2017-12-01 17:44:26', NULL, 195),
(75618, 'donations', '1JP97362057484507', 30, '2017-12-01', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-01 21:05:29', '2017-12-01 21:08:36', NULL, 196),
(75619, 'donations', '1KT02241BL611813J', 51, '2017-12-01', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-02 01:04:23', '2017-12-02 01:09:00', NULL, 197),
(75620, 'donations', '76G17989BN535363M', 116, '2017-12-02', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-02 09:35:44', '2017-12-02 09:36:30', NULL, 198),
(75621, 'donations', '21046614JU158861V', 100, '2017-12-02', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-02 09:46:27', '2017-12-02 09:50:14', NULL, 199),
(75622, 'donations', '8BB12762S5073260U', 100, '2017-12-02', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-02 10:20:39', '2017-12-02 10:23:28', NULL, 200),
(75623, 'donations', '0LX61248X3099020Y', 25, '2017-12-02', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-02 10:42:53', '2017-12-02 10:45:07', NULL, 201),
(75624, 'donations', '12J46368HF678642U', 50, '2017-12-02', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-02 11:05:42', '2017-12-02 11:08:32', NULL, 202),
(75625, 'donations', '4G669288S0665102U', 51, '2017-12-02', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-02 11:30:07', '2017-12-02 11:30:58', NULL, 203),
(75626, 'donations', '9DH88449JM1394906', 30, '2017-12-02', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-02 12:41:47', '2017-12-02 12:45:52', NULL, 204),
(75627, 'donations', '3DG187828U187991F', 50, '2017-12-02', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-02 12:58:00', '2017-12-02 13:01:23', NULL, 205),
(75628, 'donations', '3KH34619DP428264A', 25, '2017-12-02', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-02 18:30:35', '2017-12-02 18:33:12', NULL, 206),
(75629, 'donations', '8RS61230PB7092125', 50, '2017-12-02', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-02 21:27:36', '2017-12-02 21:30:49', NULL, 207),
(75630, 'donations', '16B2542270401515X', 40, '2017-12-08', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-08 16:50:20', '2017-12-08 16:54:55', NULL, 208),
(75631, 'donations', '73D04991M7486303D', 900, '2017-12-27', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-27 14:14:43', '2017-12-27 14:17:52', NULL, 209),
(75632, 'donations', '9FX67231822364935', 40, '2017-12-31', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-31 18:21:15', '2017-12-31 18:23:07', NULL, 210),
(75633, 'donations', NULL, 50, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-05-01 09:09:23', '2018-05-01 09:09:23', NULL, 211),
(75634, 'donations', NULL, 100, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-05-31 03:25:49', '2018-05-31 03:25:49', NULL, 212),
(75635, 'donations', '3AH15975U5315874E', 50, '2018-10-13', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-10-13 10:57:45', '2018-10-13 11:01:51', NULL, 213),
(75636, 'donations', NULL, 100, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-10-23 08:16:00', '2018-10-23 08:16:00', NULL, 214),
(75637, 'donations', '74118806GF6010419', 100, '2018-10-23', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-10-23 08:16:04', '2018-10-23 08:16:50', NULL, 215),
(75638, 'donations', NULL, 100, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-12 09:49:19', '2019-01-12 09:49:19', NULL, 216),
(75639, 'donations', NULL, 100, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-12 10:36:39', '2019-01-12 10:36:39', NULL, 217),
(75640, 'donations', NULL, 103, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-12 14:37:58', '2019-01-12 14:37:58', NULL, 218),
(75641, 'donations', NULL, 83, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-06 13:16:40', '2019-04-06 13:16:40', NULL, 219),
(75642, 'donations', NULL, 103, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-11 20:48:32', '2019-04-11 20:48:32', NULL, 220),
(75643, 'donations', '9FC295714P637115Y', 230, '2019-05-10', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-10 13:10:30', '2019-05-10 13:21:25', NULL, 221),
(75644, 'donations', '3U880832E44379939', 100, '2019-06-20', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-20 09:01:38', '2019-06-20 09:04:18', NULL, 222),
(75645, 'donations', '77D54783C5230772L', 500, '2019-08-18', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-18 16:08:57', '2019-08-18 16:10:19', NULL, 223),
(75646, 'donations', NULL, 60, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-19 15:55:00', '2019-10-19 15:55:00', NULL, 224),
(75647, 'donations', NULL, 100, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-24 17:24:50', '2020-01-24 17:24:50', NULL, 225),
(75648, 'donations', NULL, 103, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-24 21:30:51', '2020-01-24 21:30:51', NULL, 226),
(75649, 'donations', '1XT37269E2752080B', 51, '2020-04-15', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-15 09:15:34', '2020-04-15 09:17:49', NULL, 227),
(75650, 'donations', '60M444477M593425H', 200, '2020-04-15', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-15 11:06:51', '2020-04-15 11:07:21', NULL, 228),
(75651, 'donations', '3XD31089NF632974H', 30, '2020-04-17', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-17 21:45:02', '2020-04-17 21:46:07', NULL, 229),
(75652, 'donations', '8UP72557WW657172Y', 51, '2020-04-18', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-18 02:08:58', '2020-04-18 02:10:40', NULL, 230),
(75653, 'donations', '2J493677G7182951H', 51, '2020-04-18', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-18 07:55:11', '2020-04-18 07:56:32', NULL, 231),
(75654, 'donations', '53X70907DX280270C', 51, '2020-04-18', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-18 08:19:17', '2020-04-18 08:25:15', NULL, 232),
(75655, 'donations', '0D892111EL2673327', 30, '2020-04-18', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-18 08:48:35', '2020-04-18 08:50:46', NULL, 233),
(75656, 'donations', NULL, 50, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-10 22:58:20', '2020-05-10 22:58:20', NULL, 234),
(75657, 'donations', NULL, 50, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-10 22:58:21', '2020-05-10 22:58:21', NULL, 235),
(75658, 'donations', '9E950086GS999682H', 11, '2020-05-11', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-11 13:52:30', '2020-05-11 13:53:37', NULL, 236),
(75659, 'donations', '680679091X4812334', 100, '2020-05-11', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-11 14:56:34', '2020-05-11 14:58:35', NULL, 237),
(75660, 'donations', NULL, 50, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-11 17:17:23', '2020-05-11 17:17:23', NULL, 238),
(75661, 'donations', '8U398707985114109', 50, '2020-05-11', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-11 18:50:51', '2020-05-11 18:57:15', NULL, 239),
(75662, 'donations', '9N446631XV935683C', 50, '2020-05-12', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-12 13:46:32', '2020-05-12 13:49:46', NULL, 240),
(75663, 'donations', '4L28423743459040U', 10, '2020-05-13', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-13 18:47:23', '2020-05-13 18:51:01', NULL, 241),
(75664, 'donations', '43541816RB724405F', 25, '2020-05-13', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-13 20:28:41', '2020-05-13 20:29:08', NULL, 242),
(75665, 'donations', '2KU74278K01575601', 50, '2020-05-13', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-13 21:07:59', '2020-05-13 21:11:45', NULL, 243),
(75666, 'donations', '85655649DN937235C', 50, '2020-05-13', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-13 22:03:04', '2020-05-13 22:04:35', NULL, 244),
(75667, 'donations', '9S026450RY620605E', 25, '2020-05-15', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-15 16:05:59', '2020-05-15 16:07:10', NULL, 245),
(75668, 'donations', '74979906VJ6784845', 26, '2020-05-15', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-15 16:08:21', '2020-05-15 16:08:44', NULL, 246),
(75669, 'donations', '62V41491DG6770209', 5, '2020-05-15', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-15 18:33:13', '2020-05-15 18:34:42', NULL, 247),
(75670, 'donations', '8Y935952LT4840211', 100, '2020-05-17', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-17 14:49:26', '2020-05-17 14:51:24', NULL, 248),
(75671, 'donations', '5DU02884PY855880P', 100, '2020-05-17', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-17 21:03:26', '2020-05-17 21:06:56', NULL, 249),
(75672, 'donations', '3J9550275J3803741', 5, '2020-05-17', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-17 21:15:05', '2020-05-17 21:19:09', NULL, 250),
(75673, 'donations', '5X079525PY308304R', 200, '2020-05-22', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-22 09:34:43', '2020-05-22 09:35:29', NULL, 251),
(75674, 'donations', '82G16133JV267794W', 30, '2020-05-22', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-22 11:24:34', '2020-05-22 11:28:06', NULL, 252),
(75675, 'donations', '589046628D011434N', 101, '2020-05-23', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-23 21:35:24', '2020-05-23 21:39:27', NULL, 253),
(75676, 'donations', '73591537YN934680B', 6, '2020-06-05', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-05 13:23:21', '2020-06-05 13:26:35', NULL, 254),
(75677, 'donations', NULL, 54689, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-17 16:41:38', '2020-06-17 16:41:38', NULL, 255),
(75678, 'donations', NULL, 51, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-26 23:16:28', '2020-06-26 23:16:28', NULL, 256),
(75679, 'donations', '1RE48203GX918192M', 51, '2020-06-27', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-27 17:34:33', '2020-06-27 17:37:10', NULL, 257),
(75680, 'donations', NULL, 58830, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-28 14:10:38', '2020-06-28 14:10:38', NULL, 258),
(75681, 'donations', NULL, 5828, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-20 20:05:35', '2020-07-20 20:05:35', NULL, 259),
(75682, 'donations', '2XS77250HY866743C', 51, '2020-08-11', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-11 13:10:53', '2020-08-11 13:14:34', NULL, 260),
(75683, 'donations', '1H43250241218682L', 20, '2020-08-18', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-18 16:16:22', '2020-08-18 16:19:00', NULL, 261),
(75684, 'donations', '9R142287HL7712741', 11, '2020-08-20', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-20 21:35:02', '2020-08-20 21:35:57', NULL, 262),
(75685, 'donations', '03C14134N3540310X', 11, '2020-08-21', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-21 07:29:50', '2020-08-21 07:30:22', NULL, 263),
(75686, 'donations', '1ND94787VP2089640', 51, '2020-08-21', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-21 21:23:57', '2020-08-21 21:27:47', NULL, 264),
(75687, 'donations', '4K994536J33091429', 11, '2020-08-22', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-22 15:37:43', '2020-08-22 15:44:30', NULL, 265),
(75688, 'donations', NULL, 56792, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-09 03:48:56', '2020-09-09 03:48:56', NULL, 266),
(75689, 'donations', NULL, 55116, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-23 09:24:38', '2020-09-23 09:24:38', NULL, 267),
(75690, 'donations', NULL, 57501, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-23 16:50:54', '2020-09-23 16:50:54', NULL, 268),
(75691, 'donations', NULL, 59518, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-28 07:41:36', '2020-09-28 07:41:36', NULL, 269),
(75692, 'donations', NULL, 54120, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-01 22:23:54', '2020-10-01 22:23:54', NULL, 270),
(75693, 'donations', NULL, 54667, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-06 13:51:49', '2020-10-06 13:51:49', NULL, 271),
(75694, 'donations', NULL, 5228, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-05 14:28:49', '2020-11-05 14:28:49', NULL, 272),
(75695, 'donations', '5H253873M48212027', 10, '2020-11-19', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-19 11:17:32', '2020-11-19 11:18:01', NULL, 273),
(75696, 'donations', NULL, 10, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-19 11:19:24', '2020-11-19 11:19:24', NULL, 274),
(75697, 'donations', NULL, 10, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-19 11:20:40', '2020-11-19 11:20:40', NULL, 275),
(75698, 'donations', '31580042X56674745', 10, '2020-11-19', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-19 11:26:10', '2020-11-19 11:26:47', NULL, 276),
(75699, 'donations', '5XM93010RJ9266456', 10, '2020-11-19', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-19 11:50:49', '2020-11-19 11:51:29', NULL, 277),
(75700, 'donations', NULL, 59218, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-11 12:17:45', '2020-12-11 12:17:45', NULL, 278),
(75701, 'donations', NULL, 1000, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-09 10:21:28', '2021-05-09 10:21:28', NULL, 279),
(75702, 'donations', '5UX83993KW081921A', 100, '2021-05-09', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-09 10:21:45', '2021-05-09 10:22:31', NULL, 280),
(75703, 'donations', NULL, 1, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-10 18:01:36', '2022-04-10 18:01:36', NULL, 281),
(75704, 'donations', '641916455D5556500', 250, '2022-07-16', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-16 13:35:38', '2022-07-16 13:36:15', NULL, 282),
(75705, 'donations', '8GD60756CH165354C', 100, '2022-07-16', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-16 14:43:24', '2022-07-16 14:43:53', NULL, 283),
(75706, 'donations', '0CH36687SE008515H', 101, '2022-07-17', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-17 06:29:39', '2022-07-17 06:33:01', NULL, 284),
(75707, 'donations', '08K53310VF6663359', 51, '2022-07-17', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-17 23:43:32', '2022-07-17 23:44:50', NULL, 285),
(75708, 'donations', NULL, 1000, NULL, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 11:05:17', '2022-11-29 11:05:17', NULL, 286),
(75709, 'donations', '7M046536YV561550F', 10, '2022-11-29', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 11:05:31', '2022-11-29 11:06:00', NULL, 287),
(75710, 'donations', '0YH325405H991100R', 5, '2022-11-29', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 11:06:51', '2022-11-29 11:07:25', NULL, 288),
(75711, 'donations', '37Y43063LB5180343', 35, '2022-11-29', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 12:19:25', '2022-11-29 12:20:11', NULL, 289),
(75712, 'donations', '87D21349LB7561021', 150, '2022-11-29', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 12:45:31', '2022-11-29 12:46:05', NULL, 290),
(75713, 'donations', '0VX07453CK269731V', 20, '2022-11-29', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 12:51:53', '2022-11-29 12:52:33', NULL, 291),
(75714, 'donations', '76D68718YE408170D', 35, '2022-11-29', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 14:06:56', '2022-11-29 14:07:32', NULL, 292),
(75715, 'donations', '06D187224R2368839', 15, '2022-11-29', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 14:09:16', '2022-11-29 14:09:39', NULL, 293),
(75716, 'donations', '1VW27685DN6255221', 20, '2022-11-29', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 14:16:16', '2022-11-29 14:16:59', NULL, 294),
(75717, 'donations', '61181602A1984943H', 5, '2022-11-29', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 14:18:41', '2022-11-30 02:56:32', NULL, 295),
(75718, 'donations', '03L06434SG501672V', 25, '2022-11-29', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 14:26:46', '2022-11-29 14:28:48', NULL, 296),
(75719, 'donations', '4AX506291L425091J', 20, '2022-11-29', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 14:40:55', '2022-11-29 14:41:26', NULL, 297),
(75720, 'donations', '7HE14065F6747051B', 35, '2022-11-29', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 15:06:28', '2022-11-29 15:07:13', NULL, 298),
(75721, 'donations', '2CF317322G353114B', 35, '2022-11-29', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 15:35:15', '2022-11-29 15:35:46', NULL, 299),
(75722, 'donations', '95599942LS438910H', 20, '2022-11-29', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 15:35:45', '2022-11-29 15:37:49', NULL, 300),
(75723, 'donations', '4EL66528VL592880A', 10, '2022-11-29', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 15:37:02', '2022-11-29 15:37:30', NULL, 301),
(75724, 'donations', '4HP82173AW473443E', 5, '2022-11-29', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 18:47:04', '2022-11-29 18:47:38', NULL, 302),
(75725, 'donation', '0XT333600F442145W', NULL, '2023-01-13', 1, 'Success', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 19:32:10', '2023-01-13 07:16:45', NULL, 303),
(75726, 'membership', 'ch_3MPoCJCuFwKXMCOw1uyeXlSV', 103, '2023-01-13', 1, 'Success', NULL, NULL, NULL, NULL, 94202, NULL, NULL, NULL, '2023-01-13 14:25:37', '2023-01-13 14:25:37', NULL, NULL),
(75728, 'membership', 'cheque_20230113184724GK63c1', 100, '2023-01-16', 2, 'Success', 'JP Morgan Chase', '449', 'Jan-08-2023', '100', 94204, NULL, NULL, NULL, '2023-01-13 18:52:28', '2023-01-16 22:38:36', NULL, NULL),
(75729, 'membership', 'quick_20230113184511VN63c1', 100, '2023-01-13', 4, 'Pending', NULL, NULL, NULL, NULL, 94205, NULL, NULL, NULL, '2023-01-13 19:00:57', '2023-01-13 19:00:57', NULL, NULL),
(75730, 'membership', 'quick_20230113190601VN63c1', 100, '2023-01-16', 4, 'Success', NULL, NULL, NULL, NULL, 94205, NULL, NULL, NULL, '2023-01-13 19:09:05', '2023-01-16 22:37:49', NULL, NULL),
(75731, 'eventregistration', 'free', 0, '2023-01-13', NULL, 'Success', NULL, NULL, NULL, NULL, 94205, 10137, NULL, NULL, '2023-01-13 19:11:31', '2023-01-13 19:11:33', 95522, NULL),
(75732, 'eventregistration', 'free', 0, '2023-01-14', NULL, 'Success', NULL, NULL, NULL, NULL, 10062, 10137, NULL, NULL, '2023-01-14 17:16:01', '2023-01-14 17:16:03', 95523, NULL),
(75733, 'eventregistration', 'free', 0, '2023-01-14', NULL, 'Success', NULL, NULL, NULL, NULL, 10080, 10137, NULL, NULL, '2023-01-14 17:22:36', '2023-01-14 17:22:38', 95524, NULL),
(75734, 'membership', 'quick_20230114191326JD63c2', 100, '2023-01-16', 4, 'Success', NULL, NULL, NULL, NULL, 20584, NULL, NULL, NULL, '2023-01-14 19:13:54', '2023-01-16 22:43:15', NULL, NULL),
(75735, 'eventregistration', 'free', 0, '2023-01-14', NULL, 'Success', NULL, NULL, NULL, NULL, 20988, 10137, NULL, NULL, '2023-01-14 20:45:29', '2023-01-14 20:45:31', 95525, NULL),
(75736, 'eventregistration', 'free', 0, '2023-01-14', NULL, 'Success', NULL, NULL, NULL, NULL, 20568, 10137, NULL, NULL, '2023-01-14 22:52:43', '2023-01-14 22:52:45', 95526, NULL),
(75737, 'membership', 'quick_20230115004356LA63c3', 100, '2023-01-16', 4, 'Success', NULL, NULL, NULL, NULL, 94209, NULL, NULL, NULL, '2023-01-15 01:02:36', '2023-01-16 22:37:11', NULL, NULL),
(75738, 'eventregistration', 'free', 0, '2023-01-15', NULL, 'Success', NULL, NULL, NULL, NULL, 94191, 10137, NULL, NULL, '2023-01-15 14:03:51', '2023-01-15 14:03:52', 95527, NULL),
(75739, 'renewal', 'ch_3MQZNzCuFwKXMCOw1kysJ8aa', 103, '2023-01-15', 1, 'Success', NULL, NULL, NULL, NULL, 94132, NULL, NULL, NULL, '2023-01-15 16:48:48', '2023-01-15 16:48:48', NULL, NULL),
(75740, 'renewal', 'ch_3MQbohCuFwKXMCOw08Um0DbO', 103, '2023-01-15', 1, 'Success', NULL, NULL, NULL, NULL, 94141, NULL, NULL, NULL, '2023-01-15 19:24:33', '2023-01-15 19:24:33', NULL, NULL),
(75741, 'renewal', '8MV652537B1689215', 103, '2023-01-15', 3, 'Success', NULL, NULL, NULL, NULL, 83228, NULL, NULL, NULL, '2023-01-15 20:22:30', '2023-01-15 20:23:17', NULL, NULL),
(75742, 'eventregistration', 'free', 0, '2023-01-15', NULL, 'Success', NULL, NULL, NULL, NULL, 83228, 10137, NULL, NULL, '2023-01-15 20:28:08', '2023-01-15 20:28:10', 95528, NULL),
(75743, 'membership', 'cheque_20230115220059VM63c4', 100, '2023-01-19', 2, 'Success', 'Chase', '456', 'Jan-16-2023', '100', 20998, NULL, NULL, NULL, '2023-01-15 22:02:27', '2023-01-19 13:16:08', NULL, NULL),
(75744, 'eventregistration', 'free', 0, '2023-01-15', NULL, 'Success', NULL, NULL, NULL, NULL, 20998, 10137, NULL, NULL, '2023-01-15 22:35:47', '2023-01-15 22:35:49', 95529, NULL),
(75745, 'membership', 'ch_3MQfsGCuFwKXMCOw15T2yZiR', 103, '2023-01-15', 1, 'Success', NULL, NULL, NULL, NULL, 94212, NULL, NULL, NULL, '2023-01-15 23:44:29', '2023-01-15 23:44:29', NULL, NULL),
(75746, 'membership', 'quick_20230116003542HT63c4', 300, '2023-01-30', 4, 'Success', NULL, NULL, NULL, NULL, 20353, NULL, 'Elected BOD for 2023-\'25. Membership valid until Dec-31-2025. Zelle transaction IDs: BACb4r2vuekw & BACkcx2fm4xf', NULL, '2023-01-16 00:39:55', '2023-01-30 18:46:11', NULL, NULL),
(75747, 'eventregistration', 'free', 0, '2023-01-16', NULL, 'Success', NULL, NULL, NULL, NULL, 94162, 10137, NULL, NULL, '2023-01-16 00:58:42', '2023-01-16 00:58:44', 95530, NULL),
(75748, 'renewal', '9KJ68824SN328344Y', 103, '2023-01-16', 3, 'Success', NULL, NULL, NULL, NULL, 83232, NULL, NULL, NULL, '2023-01-16 03:42:27', '2023-01-16 03:42:55', NULL, NULL),
(75749, 'eventregistration', 'free', 0, '2023-01-16', NULL, 'Success', NULL, NULL, NULL, NULL, 83232, 10137, NULL, NULL, '2023-01-16 03:44:11', '2023-01-16 03:44:13', 95531, NULL),
(75750, 'membership', 'quick_20230116034657ST63c4', 100, '2023-01-16', 4, 'Success', NULL, NULL, NULL, NULL, 83296, NULL, NULL, NULL, '2023-01-16 03:48:45', '2023-01-16 22:39:44', NULL, NULL),
(75751, 'eventregistration', 'free', 0, '2023-01-16', NULL, 'Success', NULL, NULL, NULL, NULL, 20159, 10137, NULL, NULL, '2023-01-16 16:08:14', '2023-01-16 16:08:17', 95532, NULL),
(75752, 'membership', 'quick_20230116164347RN63c5', 100, '2023-01-16', 4, 'Success', NULL, NULL, NULL, NULL, 52110, NULL, NULL, NULL, '2023-01-16 16:47:51', '2023-01-16 22:40:51', NULL, NULL),
(75753, 'eventregistration', 'free', 0, '2023-01-16', NULL, 'Success', NULL, NULL, NULL, NULL, 52110, 10137, NULL, NULL, '2023-01-16 16:51:02', '2023-01-16 16:51:04', 95533, NULL),
(75754, 'renewal', 'ch_3MQxmWCuFwKXMCOw0zqHmE9h', 61.8, '2023-01-16', 1, 'Success', NULL, NULL, NULL, NULL, 20822, NULL, NULL, NULL, '2023-01-16 18:51:46', '2023-01-16 18:51:46', NULL, NULL),
(75755, 'eventregistration', 'free', 0, '2023-01-16', NULL, 'Success', NULL, NULL, NULL, NULL, 20822, 10137, NULL, NULL, '2023-01-16 18:53:10', '2023-01-16 18:53:12', 95534, NULL),
(75756, 'renewal', '19F867748S323342X', 103, '2023-01-16', 3, 'Success', NULL, NULL, NULL, NULL, 20870, NULL, NULL, NULL, '2023-01-16 19:59:15', '2023-01-16 19:59:27', NULL, NULL),
(75757, 'eventregistration', 'free', 0, '2023-01-16', NULL, 'Success', NULL, NULL, NULL, NULL, 20870, 10137, NULL, NULL, '2023-01-16 20:00:05', '2023-01-16 20:00:07', 95535, NULL),
(75758, 'membership', 'quick_20230116200554SD63c5', 100, '2023-01-16', 4, 'Success', NULL, NULL, NULL, NULL, 20853, NULL, NULL, NULL, '2023-01-16 20:07:01', '2023-01-16 20:09:46', NULL, NULL),
(75759, 'eventregistration', 'free', 0, '2023-01-16', NULL, 'Success', NULL, NULL, NULL, NULL, 20853, 10137, NULL, NULL, '2023-01-16 20:07:51', '2023-01-16 20:07:53', 95536, NULL),
(75760, 'membership', '92A1665399800572G', 103, '2023-01-16', 3, 'Success', NULL, NULL, NULL, NULL, 94214, NULL, NULL, NULL, '2023-01-16 21:05:44', '2023-01-16 21:05:54', NULL, NULL),
(75761, 'membership', 'quick_20230117000602SY63c5', 100, '2023-01-27', 4, 'Success', NULL, NULL, NULL, NULL, 20278, NULL, NULL, NULL, '2023-01-17 00:40:44', '2023-01-27 16:11:10', NULL, NULL),
(75762, 'membership', 'quick_20230117145231PV63c6', 100, '2023-01-26', 4, 'Success', NULL, NULL, NULL, NULL, 20583, NULL, NULL, NULL, '2023-01-17 14:56:37', '2023-01-26 03:36:12', NULL, NULL),
(75763, 'eventregistration', 'free', 0, '2023-01-17', NULL, 'Success', NULL, NULL, NULL, NULL, 20583, 10137, NULL, NULL, '2023-01-17 14:57:35', '2023-01-17 14:57:37', 95537, NULL),
(75764, 'renewal', '4NY07841E0638842G', 103, '2023-01-17', 3, 'Success', NULL, NULL, NULL, NULL, 62832, NULL, NULL, NULL, '2023-01-17 15:06:03', '2023-01-17 15:06:15', NULL, NULL),
(75765, 'eventregistration', 'free', 0, '2023-01-17', NULL, 'Success', NULL, NULL, NULL, NULL, 20794, 10137, NULL, NULL, '2023-01-17 16:40:48', '2023-01-17 16:40:49', 95538, NULL),
(75766, 'membership', 'quick_20230117173456SV63c6', 100, '2023-01-26', 4, 'Success', NULL, NULL, NULL, NULL, 20992, NULL, NULL, NULL, '2023-01-17 17:40:55', '2023-01-26 03:41:23', NULL, NULL),
(75767, 'eventregistration', 'free', 0, '2023-01-18', NULL, 'Success', NULL, NULL, NULL, NULL, 20973, 10137, NULL, NULL, '2023-01-18 01:41:23', '2023-01-18 01:41:25', 95539, NULL),
(75768, 'eventregistration', 'free', 0, '2023-01-18', NULL, 'Success', NULL, NULL, NULL, NULL, 94196, 10137, NULL, NULL, '2023-01-18 01:52:14', '2023-01-18 01:52:15', 95540, NULL),
(75770, 'eventregistration', 'free', 0, '2023-01-18', NULL, 'Success', NULL, NULL, NULL, NULL, 10086, 10137, NULL, NULL, '2023-01-18 02:36:54', '2023-01-18 02:36:56', 95541, NULL),
(75771, 'eventregistration', 'free', 0, '2023-01-18', NULL, 'Success', NULL, NULL, NULL, NULL, 20411, 10137, NULL, NULL, '2023-01-18 02:47:50', '2023-01-18 02:47:51', 95542, NULL),
(75772, 'renewal', 'ch_3MRRogCuFwKXMCOw1lMPkOiS', 103, '2023-01-18', 1, 'Success', NULL, NULL, NULL, NULL, 20995, NULL, NULL, NULL, '2023-01-18 02:55:59', '2023-01-18 02:55:59', NULL, NULL),
(75773, 'eventregistration', 'free', 0, '2023-01-18', NULL, 'Success', NULL, NULL, NULL, NULL, 83296, 10137, NULL, NULL, '2023-01-18 02:57:55', '2023-01-18 02:57:58', 95543, NULL),
(75774, 'eventregistration', 'free', 0, '2023-01-18', NULL, 'Success', NULL, NULL, NULL, NULL, 10067, 10137, NULL, NULL, '2023-01-18 03:00:30', '2023-01-18 03:00:32', 95544, NULL),
(75775, 'renewal', 'ch_3MRSjdCuFwKXMCOw0hJAFauG', 103, '2023-01-18', 1, 'Success', NULL, NULL, NULL, NULL, 94116, NULL, NULL, NULL, '2023-01-18 03:54:50', '2023-01-18 03:54:50', NULL, NULL),
(75776, 'eventregistration', 'free', 0, '2023-01-18', NULL, 'Success', NULL, NULL, NULL, NULL, 20992, 10137, NULL, NULL, '2023-01-18 04:01:10', '2023-01-18 04:01:12', 95545, NULL),
(75777, 'eventregistration', 'free', 0, '2023-01-18', NULL, 'Success', NULL, NULL, NULL, NULL, 94116, 10137, NULL, NULL, '2023-01-18 04:10:34', '2023-01-18 04:10:36', 95546, NULL),
(75778, 'eventregistration', 'free', 0, '2023-01-18', NULL, 'Success', NULL, NULL, NULL, NULL, 94168, 10137, NULL, NULL, '2023-01-18 05:08:28', '2023-01-18 05:08:30', 95547, NULL),
(75779, 'membership', 'ch_3MRZVNCuFwKXMCOw1FU9tQMn', 103, '2023-01-18', 1, 'Success', NULL, NULL, NULL, NULL, 94216, NULL, NULL, NULL, '2023-01-18 11:08:34', '2023-01-18 11:08:34', NULL, NULL),
(75780, 'eventregistration', 'free', 0, '2023-01-18', NULL, 'Success', NULL, NULL, NULL, NULL, 94216, 10137, NULL, NULL, '2023-01-18 12:56:57', '2023-01-18 12:56:59', 95548, NULL),
(75781, 'membership', 'quick_20230118153418MC63c8', 100, '2023-01-27', 4, 'Success', NULL, NULL, NULL, NULL, 83210, NULL, NULL, NULL, '2023-01-18 15:42:05', '2023-01-27 16:04:02', NULL, NULL),
(75782, 'eventregistration', 'free', 0, '2023-01-18', NULL, 'Success', NULL, NULL, NULL, NULL, 83210, 10137, NULL, NULL, '2023-01-18 15:42:48', '2023-01-18 15:42:50', 95549, NULL),
(75783, 'membership', 'quick_20230118221323SY63c8', 100, '2023-01-26', 4, 'Success', NULL, NULL, NULL, NULL, 31522, NULL, NULL, NULL, '2023-01-18 22:20:09', '2023-01-26 03:43:56', NULL, NULL),
(75784, 'eventregistration', 'free', 0, '2023-01-18', NULL, 'Success', NULL, NULL, NULL, NULL, 31522, 10137, NULL, NULL, '2023-01-18 22:31:42', '2023-01-18 22:31:44', 95550, NULL),
(75785, 'membership', 'quick_20230119022210NG63c8', 100, '2023-01-26', 4, 'Success', NULL, NULL, NULL, NULL, 21287, NULL, NULL, NULL, '2023-01-19 02:31:41', '2023-01-26 03:43:23', NULL, NULL),
(75786, 'renewal', 'ch_3MS36NCuFwKXMCOw03tbI1Vq', 103, '2023-01-19', 1, 'Success', NULL, NULL, NULL, NULL, 20773, NULL, NULL, NULL, '2023-01-19 18:44:45', '2023-01-19 18:44:45', NULL, NULL),
(75787, 'eventregistration', 'free', 0, '2023-01-19', NULL, 'Success', NULL, NULL, NULL, NULL, 20773, 10137, NULL, NULL, '2023-01-19 18:47:44', '2023-01-19 18:47:46', 95551, NULL),
(75788, 'membership', 'quick_20230119195511SK63c9', 100, '2023-01-26', 4, 'Success', NULL, NULL, NULL, NULL, 94219, NULL, NULL, NULL, '2023-01-19 20:05:03', '2023-01-26 03:50:34', NULL, NULL),
(75789, 'renewal', '17C33275EU845264J', 103, '2023-01-20', 3, 'Success', NULL, NULL, NULL, NULL, 83348, NULL, NULL, NULL, '2023-01-20 04:07:20', '2023-01-20 04:08:25', NULL, NULL),
(75790, 'eventregistration', 'free', 0, '2023-01-20', NULL, 'Success', NULL, NULL, NULL, NULL, 94181, 10137, NULL, NULL, '2023-01-20 14:11:17', '2023-01-20 14:11:19', 95552, NULL),
(75791, 'eventregistration', 'free', 0, '2023-01-20', NULL, 'Success', NULL, NULL, NULL, NULL, 21274, 10137, NULL, NULL, '2023-01-20 14:11:53', '2023-01-20 14:11:55', 95553, NULL),
(75792, 'membership', '2XE15934GP0780707', 103, '2023-01-20', 3, 'Success', NULL, NULL, NULL, NULL, 94220, NULL, NULL, NULL, '2023-01-20 14:56:48', '2023-01-20 14:57:03', NULL, NULL),
(75793, 'eventregistration', 'free', 0, '2023-01-20', NULL, 'Success', NULL, NULL, NULL, NULL, 94220, 10137, NULL, NULL, '2023-01-20 14:59:55', '2023-01-20 14:59:57', 95554, NULL),
(75794, 'eventregistration', 'free', 0, '2023-01-20', NULL, 'Success', NULL, NULL, NULL, NULL, 94132, 10137, NULL, NULL, '2023-01-20 15:18:07', '2023-01-20 15:18:09', 95555, NULL),
(75795, 'eventregistration', 'free', 0, '2023-01-20', NULL, 'Success', NULL, NULL, NULL, NULL, 52086, 10137, NULL, NULL, '2023-01-20 15:41:30', '2023-01-20 15:41:33', 95556, NULL),
(75796, 'eventregistration', 'free', 0, '2023-01-20', NULL, 'Success', NULL, NULL, NULL, NULL, 52086, 10137, NULL, NULL, '2023-01-20 15:41:30', '2023-01-20 15:41:32', 95557, NULL),
(75797, 'eventregistration', 'free', 0, '2023-01-20', NULL, 'Success', NULL, NULL, NULL, NULL, 20584, 10137, NULL, NULL, '2023-01-20 16:11:16', '2023-01-20 16:11:18', 95558, NULL),
(75798, 'eventregistration', 'free', 0, '2023-01-20', NULL, 'Success', NULL, NULL, NULL, NULL, 94184, 10137, NULL, NULL, '2023-01-20 16:33:54', '2023-01-20 16:33:56', 95559, NULL),
(75799, 'eventregistration', 'free', 0, '2023-01-20', NULL, 'Success', NULL, NULL, NULL, NULL, 94158, 10137, NULL, NULL, '2023-01-20 18:09:48', '2023-01-20 18:09:50', 95560, NULL),
(75800, 'membership', 'quick_20230120194014SA63ca', 100, '2023-01-26', 4, 'Success', NULL, NULL, NULL, NULL, 94221, NULL, NULL, NULL, '2023-01-20 19:47:09', '2023-01-26 03:51:01', NULL, NULL),
(75801, 'eventregistration', 'free', 0, '2023-01-20', NULL, 'Success', NULL, NULL, NULL, NULL, 20912, 10137, NULL, NULL, '2023-01-20 21:00:32', '2023-01-20 21:00:34', 95561, NULL),
(75802, 'membership', '5NPg0g21SB458210A', 100, '2023-01-20', 4, 'Success', NULL, NULL, NULL, NULL, 94222, NULL, 'Member created as per the request.', NULL, '2023-01-20 21:53:53', '2023-01-20 21:53:53', NULL, NULL),
(75803, 'membership', 'quick_20230120231850JM63cb', 100, '2023-01-26', 4, 'Success', NULL, NULL, NULL, NULL, 94223, NULL, NULL, NULL, '2023-01-20 23:24:22', '2023-01-26 03:51:31', NULL, NULL),
(75804, 'eventregistration', 'free', 0, '2023-01-21', NULL, 'Success', NULL, NULL, NULL, NULL, 94197, 10137, NULL, NULL, '2023-01-21 02:35:42', '2023-01-21 02:35:44', 95562, NULL),
(75805, 'eventregistration', 'free', 0, '2023-01-21', NULL, 'Success', NULL, NULL, NULL, NULL, 94186, 10137, NULL, NULL, '2023-01-21 05:08:32', '2023-01-21 05:08:34', 95563, NULL),
(75806, 'membership', 'quick_20230121060432LM63cb', 100, '2023-01-26', 4, 'Success', NULL, NULL, NULL, NULL, 94224, NULL, NULL, NULL, '2023-01-21 06:16:58', '2023-01-26 03:51:58', NULL, NULL),
(75807, 'eventregistration', 'free', 0, '2023-01-21', NULL, 'Success', NULL, NULL, NULL, NULL, 94224, 10137, NULL, NULL, '2023-01-21 06:21:50', '2023-01-21 06:21:52', 95564, NULL),
(75808, 'eventregistration', 'free', 0, '2023-01-21', NULL, 'Success', NULL, NULL, NULL, NULL, 83221, 10137, NULL, NULL, '2023-01-21 12:29:08', '2023-01-21 12:29:10', 95565, NULL),
(75809, 'membership', 'quick_20230121163825SG63cc', 100, '2023-01-27', 4, 'Success', NULL, NULL, NULL, NULL, 83234, NULL, NULL, NULL, '2023-01-21 16:40:54', '2023-01-27 16:02:50', NULL, NULL),
(75810, 'eventregistration', 'free', 0, '2023-01-21', NULL, 'Success', NULL, NULL, NULL, NULL, 83234, 10137, NULL, NULL, '2023-01-21 16:41:37', '2023-01-21 16:41:38', 95566, NULL),
(75811, 'eventregistration', 'free', 0, '2023-01-21', NULL, 'Success', NULL, NULL, NULL, NULL, 52126, 10137, NULL, NULL, '2023-01-21 22:00:07', '2023-01-21 22:00:09', 95567, NULL),
(75812, 'membership', 'quick_20230121225713VM63cc', 100, '2023-01-27', 4, 'Success', NULL, NULL, NULL, NULL, 94227, NULL, NULL, NULL, '2023-01-21 23:06:14', '2023-01-27 14:03:43', NULL, NULL),
(75813, 'eventregistration', 'free', 0, '2023-01-21', NULL, 'Success', NULL, NULL, NULL, NULL, 94227, 10137, NULL, NULL, '2023-01-21 23:10:20', '2023-01-21 23:10:21', 95568, NULL),
(75814, 'eventregistration', 'ch_3MSrJnCuFwKXMCOw0nFDFncu', 30.9, '2023-01-22', 1, 'Success', NULL, NULL, NULL, NULL, NULL, 10137, NULL, NULL, '2023-01-22 00:21:56', '2023-01-22 00:21:58', 95569, NULL),
(75815, 'eventregistration', 'free', 0, '2023-01-22', NULL, 'Success', NULL, NULL, NULL, NULL, 94147, 10137, NULL, NULL, '2023-01-22 02:02:08', '2023-01-22 02:02:10', 95570, NULL),
(75816, 'eventregistration', 'free', 0, '2023-01-22', NULL, 'Success', NULL, NULL, NULL, NULL, 94195, 10137, NULL, NULL, '2023-01-22 02:13:36', '2023-01-22 02:13:38', 95571, NULL),
(75817, 'membership', 'quick_20230122050451CK63cc', 100, '2023-01-22', 4, 'Pending', NULL, NULL, NULL, NULL, 94228, NULL, NULL, NULL, '2023-01-22 05:11:16', '2023-01-22 05:11:16', NULL, NULL),
(75818, 'eventregistration', 'free', 0, '2023-01-22', NULL, 'Success', NULL, NULL, NULL, NULL, 94228, 10137, NULL, NULL, '2023-01-22 05:23:10', '2023-01-22 05:23:12', 95572, NULL),
(75819, 'membership', 'quick_20230122052418CK63cc', 100, '2023-01-26', 4, 'Success', NULL, NULL, NULL, NULL, 94228, NULL, NULL, NULL, '2023-01-22 05:25:33', '2023-01-26 03:53:59', NULL, NULL),
(75820, 'renewal', 'ch_3MT3x9CuFwKXMCOw0mGWUW2X', 103, '2023-01-22', 1, 'Success', NULL, NULL, NULL, NULL, 83224, NULL, NULL, NULL, '2023-01-22 13:51:24', '2023-01-22 13:51:24', NULL, NULL),
(75821, 'eventregistration', 'free', 0, '2023-01-22', NULL, 'Success', NULL, NULL, NULL, NULL, 83224, 10137, NULL, NULL, '2023-01-22 13:52:58', '2023-01-22 13:53:00', 95573, NULL),
(75822, 'eventregistration', 'free', 0, '2023-01-22', NULL, 'Success', NULL, NULL, NULL, NULL, 94170, 10137, NULL, NULL, '2023-01-22 13:55:12', '2023-01-22 13:55:14', 95574, NULL),
(75823, 'eventregistration', 'free', 0, '2023-01-22', NULL, 'Success', NULL, NULL, NULL, NULL, 94117, 10137, NULL, NULL, '2023-01-22 14:02:46', '2023-01-22 14:02:48', 95575, NULL),
(75824, 'eventregistration', 'free', 0, '2023-01-22', NULL, 'Success', NULL, NULL, NULL, NULL, 94173, 10137, NULL, NULL, '2023-01-22 14:47:42', '2023-01-22 14:47:43', 95576, NULL),
(75825, 'eventregistration', 'free', 0, '2023-01-22', NULL, 'Success', NULL, NULL, NULL, NULL, 94167, 10137, NULL, NULL, '2023-01-22 16:07:28', '2023-01-22 16:07:30', 95577, NULL),
(75826, 'membership', 'ch_3MT7EBCuFwKXMCOw0HwXlQ1s', 103, '2023-01-30', 1, 'Success', NULL, NULL, NULL, NULL, 94229, NULL, NULL, NULL, '2023-01-22 17:21:13', '2023-01-30 15:33:05', NULL, NULL),
(75827, 'eventregistration', 'free', 0, '2023-01-22', NULL, 'Success', NULL, NULL, NULL, NULL, 20757, 10137, NULL, NULL, '2023-01-22 18:11:32', '2023-01-22 18:11:34', 95578, NULL),
(75828, 'eventregistration', 'free', 0, '2023-01-22', NULL, 'Success', NULL, NULL, NULL, NULL, 20147, 10137, NULL, NULL, '2023-01-22 18:14:04', '2023-01-22 18:14:06', 95579, NULL),
(75829, 'renewal', 'ch_3MT9mICuFwKXMCOw0j5ZkzEW', 103, '2023-01-22', 1, 'Success', NULL, NULL, NULL, NULL, 20785, NULL, NULL, NULL, '2023-01-22 20:04:36', '2023-01-22 20:04:36', NULL, NULL),
(75830, 'eventregistration', 'free', 0, '2023-01-22', NULL, 'Success', NULL, NULL, NULL, NULL, 20785, 10137, NULL, NULL, '2023-01-22 20:23:22', '2023-01-22 20:23:24', 95580, NULL),
(75831, 'eventregistration', 'free', 0, '2023-01-22', NULL, 'Success', NULL, NULL, NULL, NULL, 20836, 10137, NULL, NULL, '2023-01-22 20:23:38', '2023-01-22 20:23:40', 95581, NULL),
(75832, 'membership', 'quick_20230122210131RB63cd', 100, '2023-01-26', 4, 'Success', NULL, NULL, NULL, NULL, 83220, NULL, NULL, NULL, '2023-01-22 21:04:14', '2023-01-26 03:46:03', NULL, NULL),
(75833, 'eventregistration', 'free', 0, '2023-01-22', NULL, 'Success', NULL, NULL, NULL, NULL, 20913, 10137, NULL, NULL, '2023-01-22 21:53:41', '2023-01-22 21:53:43', 95582, NULL),
(75834, 'eventregistration', 'free', 0, '2023-01-22', NULL, 'Success', NULL, NULL, NULL, NULL, 94190, 10137, NULL, NULL, '2023-01-22 22:06:29', '2023-01-22 22:06:32', 95583, NULL);
INSERT INTO `transactions` (`id`, `reference`, `transaction_id`, `amount`, `transaction_date`, `payment_method_id`, `payment_status`, `bank_name`, `cheque_no`, `cheque_date`, `cheque_amount`, `user_id`, `event_id`, `admin_comment`, `user_comment`, `created_at`, `updated_at`, `event_registration_id`, `donation_id`) VALUES
(75835, 'eventregistration', 'free', 0, '2023-01-22', NULL, 'Success', NULL, NULL, NULL, NULL, 94190, 10137, NULL, NULL, '2023-01-22 22:06:30', '2023-01-22 22:06:32', 95584, NULL),
(75836, 'eventregistration', 'free', 0, '2023-01-22', NULL, 'Success', NULL, NULL, NULL, NULL, 94190, 10137, NULL, NULL, '2023-01-22 22:06:32', '2023-01-22 22:06:34', 95585, NULL),
(75837, 'eventregistration', 'ch_3MTBjaCuFwKXMCOw1SDckHXN', 15.45, '2023-01-22', 1, 'Success', NULL, NULL, NULL, NULL, NULL, 10137, NULL, NULL, '2023-01-22 22:09:56', '2023-01-22 22:09:57', 95586, NULL),
(75838, 'eventregistration', 'ch_3MTDFXCuFwKXMCOw0SDhxlgW', 30.9, '2023-01-22', 1, 'Success', NULL, NULL, NULL, NULL, NULL, 10137, NULL, NULL, '2023-01-22 23:47:01', '2023-01-22 23:47:03', 95587, NULL),
(75839, 'eventregistration', 'free', 0, '2023-01-23', NULL, 'Success', NULL, NULL, NULL, NULL, 94175, 10137, NULL, NULL, '2023-01-23 00:41:00', '2023-01-23 00:41:02', 95588, NULL),
(75840, 'eventregistration', 'free', 0, '2023-01-23', NULL, 'Success', NULL, NULL, NULL, NULL, 94123, 10137, NULL, NULL, '2023-01-23 01:08:31', '2023-01-23 01:08:33', 95589, NULL),
(75841, 'membership', 'quick_20230123023402SN63cd', 100, '2023-01-26', 4, 'Success', NULL, NULL, NULL, NULL, 20908, NULL, NULL, NULL, '2023-01-23 02:34:38', '2023-01-26 03:39:04', NULL, NULL),
(75842, 'eventregistration', 'free', 0, '2023-01-23', NULL, 'Success', NULL, NULL, NULL, NULL, 20908, 10137, NULL, NULL, '2023-01-23 02:35:40', '2023-01-23 02:35:42', 95590, NULL),
(75843, 'eventregistration', 'free', 0, '2023-01-23', NULL, 'Success', NULL, NULL, NULL, NULL, 94177, 10137, NULL, NULL, '2023-01-23 04:36:35', '2023-01-23 04:36:37', 95591, NULL),
(75844, 'membership', 'quick_20230123124904tt63ce', 100, '2023-01-26', 4, 'Pending', NULL, NULL, NULL, NULL, 94230, NULL, NULL, NULL, '2023-01-23 12:53:47', '2023-01-26 02:37:24', NULL, NULL),
(75845, 'eventregistration', 'free', 0, '2023-01-23', NULL, 'Success', NULL, NULL, NULL, NULL, 10032, 10137, NULL, NULL, '2023-01-23 15:49:10', '2023-01-23 15:49:13', 95592, NULL),
(75846, 'membership', 'quick_20230123195251SM63ce', 100, '2023-01-26', 4, 'Success', NULL, NULL, NULL, NULL, 94232, NULL, 'Payment marked as paid', NULL, '2023-01-23 20:09:46', '2023-01-26 02:03:36', NULL, NULL),
(75847, 'eventregistration', 'free', 0, '2023-01-23', NULL, 'Success', NULL, NULL, NULL, NULL, 94232, 10137, NULL, NULL, '2023-01-23 20:13:12', '2023-01-23 20:13:14', 95593, NULL),
(75848, 'eventregistration', '241194033H0751026', 15.45, '2023-01-23', 3, 'Success', NULL, NULL, NULL, NULL, NULL, 10137, NULL, NULL, '2023-01-23 21:38:33', '2023-01-23 21:41:05', 95594, NULL),
(75849, 'renewal', 'ch_3MTqZLCuFwKXMCOw0eZ0VtQF', 103, '2023-01-24', 1, 'Success', NULL, NULL, NULL, NULL, 83231, NULL, NULL, NULL, '2023-01-24 17:46:04', '2023-01-24 17:46:04', NULL, NULL),
(75850, 'membership', 'quick_20230124175705MK63d0', 100, '2023-01-27', 4, 'Success', NULL, NULL, NULL, NULL, 20766, NULL, NULL, NULL, '2023-01-24 17:57:26', '2023-01-27 16:06:00', NULL, NULL),
(75851, 'eventregistration', 'free', 0, '2023-01-24', NULL, 'Success', NULL, NULL, NULL, NULL, 20766, 10137, NULL, NULL, '2023-01-24 18:01:37', '2023-01-24 18:01:40', 95595, NULL),
(75852, 'eventregistration', 'free', 0, '2023-01-25', NULL, 'Success', NULL, NULL, NULL, NULL, 94198, 10137, NULL, NULL, '2023-01-25 00:45:20', '2023-01-25 00:45:22', 95596, NULL),
(75853, 'membership', 'quick_20230125172637RM63d1', 100, '2023-01-30', 4, 'Success', NULL, NULL, NULL, NULL, 94236, NULL, NULL, NULL, '2023-01-25 17:29:02', '2023-01-30 23:05:24', NULL, NULL),
(75854, 'eventregistration', 'ch_3MUYY8CuFwKXMCOw0HkUrGik', 61.8, '2023-01-26', 1, 'Success', NULL, NULL, NULL, NULL, NULL, 10137, NULL, NULL, '2023-01-26 16:43:45', '2023-01-26 16:43:47', 95597, NULL),
(75855, 'eventregistration', 'free', 0, '2023-01-26', NULL, 'Success', NULL, NULL, NULL, NULL, 21046, 10137, NULL, NULL, '2023-01-26 18:05:27', '2023-01-26 18:05:29', 95598, NULL),
(75856, 'membership', 'quick_20230126191858NA63d2', 100, '2023-01-27', 4, 'Success', NULL, NULL, NULL, NULL, 94238, NULL, NULL, NULL, '2023-01-26 19:25:45', '2023-01-27 15:59:41', NULL, NULL),
(75857, 'membership', 'quick_20230127010254BB63d3', 100, '2023-01-27', 4, 'Success', NULL, NULL, NULL, NULL, 20364, NULL, NULL, NULL, '2023-01-27 01:11:28', '2023-01-27 16:10:27', NULL, NULL),
(75858, 'eventregistration', 'free', 0, '2023-01-27', NULL, 'Success', NULL, NULL, NULL, NULL, 20364, 10137, NULL, NULL, '2023-01-27 01:14:39', '2023-01-27 01:14:41', 95599, NULL),
(75859, 'eventregistration', 'ch_3MUhEHCuFwKXMCOw0AMFXc7R', 30.9, '2023-01-27', 1, 'Success', NULL, NULL, NULL, NULL, NULL, 10137, NULL, NULL, '2023-01-27 01:59:50', '2023-01-27 01:59:52', 95601, NULL),
(75860, 'eventregistration', 'free', 0, '2023-01-27', NULL, 'Success', NULL, NULL, NULL, NULL, 94141, 10137, NULL, NULL, '2023-01-27 17:09:57', '2023-01-27 17:09:59', 95602, NULL),
(75861, 'renewal', 'token', 103, '2023-01-27', 3, 'Pending', NULL, NULL, NULL, NULL, 21275, NULL, NULL, NULL, '2023-01-27 20:02:38', '2023-01-27 20:02:38', NULL, NULL),
(75862, 'membership', 'quick_20230127224724NN63d4', 100, '2023-01-27', 4, 'Success', NULL, NULL, NULL, NULL, 94241, NULL, NULL, NULL, '2023-01-27 23:02:00', '2023-01-27 23:36:16', NULL, NULL),
(75863, 'eventregistration', 'ch_3MV5voCuFwKXMCOw0U5XpsqG', 30.9, '2023-01-28', 1, 'Success', NULL, NULL, NULL, NULL, NULL, 10137, NULL, NULL, '2023-01-28 04:22:25', '2023-01-28 04:22:28', 95603, NULL),
(75864, 'membership', 'ch_3MVI7YCuFwKXMCOw1Oqydx8b', 103, '2023-01-28', 1, 'Success', NULL, NULL, NULL, NULL, 94242, NULL, NULL, NULL, '2023-01-28 17:23:22', '2023-01-28 17:23:22', NULL, NULL),
(75865, 'membership', '1FV78962FN704041D', 103, '2023-01-28', 3, 'Success', NULL, NULL, NULL, NULL, 94243, NULL, NULL, NULL, '2023-01-28 18:32:29', '2023-01-28 18:32:58', NULL, NULL),
(75866, 'eventregistration', 'ch_3MVKSoCuFwKXMCOw0X2BW5X3', 15.45, '2023-01-28', 1, 'Success', NULL, NULL, NULL, NULL, NULL, 10137, NULL, NULL, '2023-01-28 19:53:27', '2023-01-28 19:53:29', 95604, NULL),
(75867, 'membership', 'quick_20230128203008NC63d5', 100, '2023-01-29', 4, 'Success', NULL, NULL, NULL, NULL, 94244, NULL, NULL, NULL, '2023-01-28 20:45:43', '2023-01-29 14:51:19', NULL, NULL),
(75868, 'membership', '9YF533340B957510U', 103, '2023-01-29', 3, 'Success', NULL, NULL, NULL, NULL, 94247, NULL, NULL, NULL, '2023-01-29 05:37:22', '2023-01-29 05:37:58', NULL, NULL),
(75869, 'eventregistration', '4M6384492C317324W', 30.9, '2023-01-29', 3, 'Success', NULL, NULL, NULL, NULL, 94247, 10137, NULL, NULL, '2023-01-29 05:41:12', '2023-01-29 05:41:26', 95605, NULL),
(75870, 'eventregistration', 'quick_20230129150811sk63d6', 75, '2023-01-29', 4, 'Pending', NULL, NULL, NULL, NULL, NULL, 10137, NULL, NULL, '2023-01-29 15:14:12', '2023-01-29 15:14:13', 95606, NULL),
(75871, 'eventregistration', 'free', 0, '2023-01-29', NULL, 'Success', NULL, NULL, NULL, NULL, 20138, 10137, NULL, NULL, '2023-01-29 16:59:07', '2023-01-29 16:59:09', 95607, NULL),
(75872, 'eventregistration', 'free', 0, '2023-01-29', NULL, 'Success', NULL, NULL, NULL, NULL, NULL, 10137, NULL, NULL, '2023-01-29 17:11:51', '2023-01-29 17:11:52', 95608, NULL),
(75873, 'renewal', 'ch_3MVewKCuFwKXMCOw0kL7PO0B', 103, '2023-01-29', 1, 'Success', NULL, NULL, NULL, NULL, 94118, NULL, NULL, NULL, '2023-01-29 17:45:17', '2023-01-29 17:45:17', NULL, NULL),
(75874, 'eventregistration', 'free', 0, '2023-01-29', NULL, 'Success', NULL, NULL, NULL, NULL, 94118, 10137, NULL, NULL, '2023-01-29 17:46:26', '2023-01-29 17:46:27', 95609, NULL),
(75875, 'eventregistration', 'free', 0, '2023-01-29', NULL, 'Success', NULL, NULL, NULL, NULL, 83336, 10137, NULL, NULL, '2023-01-29 17:49:23', '2023-01-29 17:49:25', 95610, NULL),
(75876, 'renewal', 'ch_3MVf50CuFwKXMCOw1jhAOiDk', 103, '2023-01-29', 1, 'Success', NULL, NULL, NULL, NULL, 20517, NULL, NULL, NULL, '2023-01-29 17:54:16', '2023-01-29 17:54:16', NULL, NULL),
(75877, 'membership', '16165749847', 100, '2023-01-30', 4, 'Success', NULL, NULL, NULL, '100', 94251, NULL, NULL, NULL, '2023-01-29 22:30:40', '2023-01-30 15:47:42', NULL, NULL),
(75878, 'eventregistration', 'token', 46.35, '2023-01-29', 3, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-29 23:39:57', '2023-01-29 23:39:57', NULL, NULL),
(75879, 'membership', 'ch_3MVkXbCuFwKXMCOw0E7XSL1S', 103, '2023-01-29', 1, 'Success', NULL, NULL, NULL, NULL, 94252, NULL, NULL, NULL, '2023-01-29 23:44:08', '2023-01-29 23:44:08', NULL, NULL),
(75880, 'eventregistration', 'free', 0, '2023-01-30', NULL, 'Success', NULL, NULL, NULL, NULL, 20737, 10137, NULL, NULL, '2023-01-30 00:30:00', '2023-01-30 00:30:02', 95612, NULL),
(75881, 'eventregistration', 'ch_3MVlUYCuFwKXMCOw0jRAGcsM', 30.9, '2023-01-30', 1, 'Success', NULL, NULL, NULL, NULL, NULL, 10137, NULL, NULL, '2023-01-30 00:45:04', '2023-01-30 00:45:06', 95613, NULL),
(75882, 'eventregistration', 'free', 0, '2023-01-30', NULL, 'Success', NULL, NULL, NULL, NULL, 94192, 10137, NULL, NULL, '2023-01-30 01:25:13', '2023-01-30 01:25:15', 95614, NULL),
(75883, 'eventregistration', 'free', 0, '2023-01-30', NULL, 'Success', NULL, NULL, NULL, NULL, 21014, 10137, NULL, NULL, '2023-01-30 01:27:49', '2023-01-30 01:27:51', 95615, NULL),
(75884, 'eventregistration', 'free', 0, '2023-01-30', NULL, 'Success', NULL, NULL, NULL, NULL, 94178, 10137, NULL, NULL, '2023-01-30 01:35:44', '2023-01-30 01:35:46', 95616, NULL),
(75885, 'eventregistration', 'free', 0, '2023-01-30', NULL, 'Success', NULL, NULL, NULL, NULL, 20776, 10137, NULL, NULL, '2023-01-30 01:38:53', '2023-01-30 01:38:55', 95617, NULL),
(75887, 'eventregistration', 'free', 0, '2023-01-30', NULL, 'Success', NULL, NULL, NULL, NULL, 94223, 10137, NULL, NULL, '2023-01-30 01:59:33', '2023-01-30 01:59:35', 95619, NULL),
(75888, 'eventregistration', 'free', 0, '2023-01-30', NULL, 'Success', NULL, NULL, NULL, NULL, 20665, 10137, NULL, NULL, '2023-01-30 02:16:22', '2023-01-30 02:16:24', 95620, NULL),
(75889, 'eventregistration', 'token', 30.9, '2023-01-30', 3, 'Pending', NULL, NULL, NULL, NULL, 94212, NULL, NULL, NULL, '2023-01-30 02:31:05', '2023-01-30 02:31:05', NULL, NULL),
(75890, 'eventregistration', 'free', 0, '2023-01-30', NULL, 'Success', NULL, NULL, NULL, NULL, 20877, 10137, NULL, NULL, '2023-01-30 02:39:32', '2023-01-30 02:39:35', 95622, NULL),
(75891, 'eventregistration', 'free', 0, '2023-01-30', NULL, 'Success', NULL, NULL, NULL, NULL, 20803, 10137, NULL, NULL, '2023-01-30 03:20:20', '2023-01-30 03:20:22', 95623, NULL),
(75893, 'eventregistration', '9YP54023Y6134932V', 30.9, '2023-01-30', 3, 'Success', NULL, NULL, NULL, NULL, NULL, 10137, NULL, NULL, '2023-01-30 03:50:02', '2023-01-30 03:50:59', 95625, NULL),
(75894, 'eventregistration', 'free', 0, '2023-01-30', NULL, 'Success', NULL, NULL, NULL, NULL, 94229, 10137, NULL, NULL, '2023-01-30 15:39:15', '2023-01-30 15:39:17', 95626, NULL),
(75895, 'eventregistration', 'free', 0, '2023-01-30', NULL, 'Success', NULL, NULL, NULL, NULL, 83220, 10137, NULL, NULL, '2023-01-30 16:46:54', '2023-01-30 16:46:56', 95627, NULL),
(75896, 'eventregistration', 'free', 0, '2023-01-30', NULL, 'Success', NULL, NULL, NULL, NULL, 83875, 10137, NULL, NULL, '2023-01-30 17:15:09', '2023-01-30 17:15:11', 95628, NULL),
(75897, 'renewal', 'ch_3MW15sCuFwKXMCOw1nATbhWi', 61.8, '2023-01-30', 1, 'Success', NULL, NULL, NULL, NULL, 20641, NULL, NULL, NULL, '2023-01-30 17:24:38', '2023-01-30 17:24:38', NULL, NULL),
(75898, 'eventregistration', 'free', 0, '2023-01-30', NULL, 'Success', NULL, NULL, NULL, NULL, 21047, 10137, NULL, NULL, '2023-01-30 19:27:59', '2023-01-30 19:28:00', 95629, NULL),
(75899, 'membership', 'quick_20230130193559LB63d8', 100, '2023-01-30', 4, 'Success', NULL, NULL, NULL, NULL, 94256, NULL, NULL, NULL, '2023-01-30 19:43:21', '2023-01-30 19:58:09', NULL, NULL),
(75900, 'eventregistration', 'free', 0, '2023-01-30', NULL, 'Success', NULL, NULL, NULL, NULL, 94121, 10137, NULL, NULL, '2023-01-30 20:16:51', '2023-01-30 20:16:55', 95630, NULL),
(75901, 'renewal', 'ch_3MW3znCuFwKXMCOw0Sknkx7L', 103, '2023-01-30', 1, 'Success', NULL, NULL, NULL, NULL, 83862, NULL, NULL, NULL, '2023-01-30 20:30:33', '2023-01-30 20:30:33', NULL, NULL),
(75902, 'renewal', 'ch_3MW4O8CuFwKXMCOw0joInt0i', 103, '2023-01-30', 1, 'Success', NULL, NULL, NULL, NULL, 20703, NULL, NULL, NULL, '2023-01-30 20:55:42', '2023-01-30 20:55:42', NULL, NULL),
(75903, 'renewal', 'ch_3MW4vyCuFwKXMCOw0PMaHsp7', 61.8, '2023-01-30', 1, 'Success', NULL, NULL, NULL, NULL, 20547, NULL, NULL, NULL, '2023-01-30 21:30:40', '2023-01-30 21:30:40', NULL, NULL),
(75904, 'eventregistration', 'free', 0, '2023-01-30', NULL, 'Success', NULL, NULL, NULL, NULL, 20547, 10137, NULL, NULL, '2023-01-30 21:32:45', '2023-01-30 21:32:47', 95631, NULL),
(75905, 'renewal', 'ch_3MW55VCuFwKXMCOw1ov91udy', 103, '2023-01-30', 1, 'Success', NULL, NULL, NULL, NULL, 20721, NULL, NULL, NULL, '2023-01-30 21:40:30', '2023-01-30 21:40:30', NULL, NULL),
(75906, 'eventregistration', 'free', 0, '2023-01-30', NULL, 'Success', NULL, NULL, NULL, NULL, 20689, 10137, NULL, NULL, '2023-01-30 23:13:26', '2023-01-30 23:13:27', 95632, NULL),
(75907, 'membership', '35A36701CG731432N', 103, '2023-01-31', 3, 'Success', NULL, NULL, NULL, NULL, 94257, NULL, NULL, NULL, '2023-01-31 00:03:20', '2023-01-31 00:04:55', NULL, NULL),
(75908, 'eventregistration', '9AS2169901458512G', 15.45, '2023-01-31', 3, 'Success', NULL, NULL, NULL, NULL, NULL, 10137, NULL, NULL, '2023-01-31 00:17:24', '2023-01-31 00:17:46', 95633, NULL),
(75909, 'renewal', 'ch_3MW8LiCuFwKXMCOw1v1lYP1l', 103, '2023-01-31', 1, 'Success', NULL, NULL, NULL, NULL, 21004, NULL, NULL, NULL, '2023-01-31 01:09:27', '2023-01-31 01:09:27', NULL, NULL),
(75910, 'renewal', 'ch_3MW8QzCuFwKXMCOw1teVoMKe', 61.8, '2023-01-31', 1, 'Success', NULL, NULL, NULL, NULL, 20228, NULL, NULL, NULL, '2023-01-31 01:14:55', '2023-01-31 01:14:55', NULL, NULL),
(75911, 'renewal', 'ch_3MW8XdCuFwKXMCOw02uEnwEn', 103, '2023-01-31', 1, 'Success', NULL, NULL, NULL, NULL, 20207, NULL, NULL, NULL, '2023-01-31 01:21:46', '2023-01-31 01:21:46', NULL, NULL),
(75912, 'eventregistration', 'free', 0, '2023-01-31', NULL, 'Success', NULL, NULL, NULL, NULL, 94236, 10137, NULL, NULL, '2023-01-31 01:22:40', '2023-01-31 01:22:41', 95634, NULL),
(75913, 'eventregistration', 'free', 0, '2023-01-31', NULL, 'Success', NULL, NULL, NULL, NULL, 20207, 10137, NULL, NULL, '2023-01-31 01:27:31', '2023-01-31 01:27:33', 95635, NULL),
(75914, 'renewal', 'ch_3MW929CuFwKXMCOw12co8mrL', 103, '2023-01-31', 1, 'Success', NULL, NULL, NULL, NULL, 20097, NULL, NULL, NULL, '2023-01-31 01:53:18', '2023-01-31 01:53:18', NULL, NULL),
(75915, 'eventregistration', '0NC64556NV3748130', 30.9, '2023-01-31', 3, 'Success', NULL, NULL, NULL, NULL, NULL, 10137, NULL, NULL, '2023-01-31 02:06:11', '2023-01-31 02:07:09', 95636, NULL),
(75916, 'eventregistration', 'ch_3MW9ifCuFwKXMCOw0YJ0e8ro', 15.45, '2023-01-31', 1, 'Success', NULL, NULL, NULL, NULL, NULL, 10137, NULL, NULL, '2023-01-31 02:37:15', '2023-01-31 02:37:16', 95637, NULL),
(75917, 'eventregistration', 'free', 0, '2023-01-31', NULL, 'Success', NULL, NULL, NULL, NULL, 51656, 10137, NULL, NULL, '2023-01-31 02:38:55', '2023-01-31 02:38:57', 95638, NULL),
(75918, 'renewal', '0FH06179TK894311V', 103, '2023-01-31', 3, 'Success', NULL, NULL, NULL, NULL, 20775, NULL, NULL, NULL, '2023-01-31 02:53:43', '2023-01-31 02:54:22', NULL, NULL),
(75919, 'eventregistration', 'ch_3MWALVCuFwKXMCOw0ZtQZQes', 30.9, '2023-01-31', 1, 'Success', NULL, NULL, NULL, NULL, NULL, 10137, NULL, NULL, '2023-01-31 03:17:22', '2023-01-31 03:17:24', 95640, NULL),
(75920, 'membership', 'ch_3MWAUjCuFwKXMCOw026msbg5', 103, '2023-01-31', 1, 'Success', NULL, NULL, NULL, NULL, 94258, NULL, NULL, NULL, '2023-01-31 03:26:55', '2023-01-31 03:26:55', NULL, NULL),
(75921, 'eventregistration', 'free', 0, '2023-01-31', NULL, 'Success', NULL, NULL, NULL, NULL, 94258, 10137, NULL, NULL, '2023-01-31 03:28:21', '2023-01-31 03:28:23', 95641, NULL),
(75922, 'renewal', 'ch_3MWAvVCuFwKXMCOw0QjyMt4C', 103, '2023-01-31', 1, 'Success', NULL, NULL, NULL, NULL, 20743, NULL, NULL, NULL, '2023-01-31 03:54:35', '2023-01-31 03:54:35', NULL, NULL),
(75923, 'eventregistration', 'free', 0, '2023-01-31', NULL, 'Success', NULL, NULL, NULL, NULL, 20743, 10137, NULL, NULL, '2023-01-31 03:57:28', '2023-01-31 03:57:30', 95642, NULL),
(75924, 'eventregistration', 'free', 0, '2023-01-31', NULL, 'Success', NULL, NULL, NULL, NULL, 20832, 10137, NULL, NULL, '2023-01-31 13:17:44', '2023-01-31 13:17:46', 95643, NULL),
(75925, 'renewal', 'ch_3MWK4NCuFwKXMCOw0nA6xc0i', 103, '2023-01-31', 1, 'Success', NULL, NULL, NULL, NULL, 20771, NULL, NULL, NULL, '2023-01-31 13:40:20', '2023-01-31 13:40:20', NULL, NULL),
(75926, 'eventregistration', 'free', 0, '2023-01-31', NULL, 'Success', NULL, NULL, NULL, NULL, 20816, 10137, NULL, NULL, '2023-01-31 14:09:10', '2023-01-31 14:09:12', 95644, NULL),
(75927, 'eventregistration', 'free', 0, '2023-01-31', NULL, 'Success', NULL, NULL, NULL, NULL, 20203, 10137, NULL, NULL, '2023-01-31 14:16:04', '2023-01-31 14:16:06', 95645, NULL),
(75928, 'eventregistration', 'free', 0, '2023-01-31', NULL, 'Success', NULL, NULL, NULL, NULL, 20558, 10137, NULL, NULL, '2023-01-31 14:25:48', '2023-01-31 14:25:50', 95646, NULL),
(75929, 'eventregistration', 'free', 0, '2023-01-31', NULL, 'Success', NULL, NULL, NULL, NULL, 20621, 10137, NULL, NULL, '2023-01-31 15:24:12', '2023-01-31 15:24:14', 95647, NULL),
(75930, 'eventregistration', 'free', 0, '2023-01-31', NULL, 'Success', NULL, NULL, NULL, NULL, 20687, 10137, NULL, NULL, '2023-01-31 21:32:46', '2023-01-31 21:32:48', 95648, NULL),
(75931, 'membership', 'quick_20230131215507tp63d9', 60, '2023-01-31', 4, 'Pending', NULL, NULL, NULL, NULL, 94260, NULL, NULL, NULL, '2023-01-31 21:59:18', '2023-01-31 21:59:18', NULL, NULL),
(75932, 'eventregistration', 'free', 0, '2023-01-31', NULL, 'Success', NULL, NULL, NULL, NULL, 94221, 10137, NULL, NULL, '2023-01-31 22:12:27', '2023-01-31 22:12:29', 95649, NULL),
(75933, 'membership', 'ch_3MWS4YCuFwKXMCOw01a5rcls', 103, '2023-01-31', 1, 'Success', NULL, NULL, NULL, NULL, 94261, NULL, NULL, NULL, '2023-01-31 22:13:03', '2023-01-31 22:13:03', NULL, NULL),
(75934, 'eventregistration', '0G66717375646835R', 30.9, '2023-02-01', 3, 'Success', NULL, NULL, NULL, NULL, NULL, 10137, NULL, NULL, '2023-02-01 01:58:43', '2023-02-01 01:59:48', 95650, NULL),
(75935, 'membership', 'quick_2023020116426528073 4PG63d9', 100, '2023-02-01', 4, 'Success', NULL, NULL, NULL, NULL, 94142, NULL, NULL, NULL, '2023-02-01 02:36:18', '2023-02-01 17:23:09', NULL, NULL),
(75936, 'eventregistration', 'free', 0, '2023-02-01', NULL, 'Success', NULL, NULL, NULL, NULL, 94142, 10137, NULL, NULL, '2023-02-01 02:37:38', '2023-02-01 02:37:40', 95651, NULL),
(75937, 'eventregistration', 'free', 0, '2023-02-01', NULL, 'Success', NULL, NULL, NULL, NULL, 94238, 10137, NULL, NULL, '2023-02-01 02:37:48', '2023-02-01 02:37:49', 95652, NULL),
(75938, 'eventregistration', 'ch_3MWXCxCuFwKXMCOw1UPjWSjz', 46.35, '2023-02-01', 1, 'Success', NULL, NULL, NULL, NULL, NULL, 10137, NULL, NULL, '2023-02-01 03:42:04', '2023-02-01 03:42:06', 95653, NULL),
(75939, 'membership', 'ch_3MWjJpCuFwKXMCOw0sTQo8pD', 103, '2023-02-01', 1, 'Success', NULL, NULL, NULL, NULL, 94263, NULL, NULL, NULL, '2023-02-01 16:37:58', '2023-02-01 16:37:58', NULL, NULL),
(75940, 'eventregistration', 'free', 0, '2023-02-01', NULL, 'Success', NULL, NULL, NULL, NULL, 94263, 10137, NULL, NULL, '2023-02-01 16:42:11', '2023-02-01 16:42:13', 95654, NULL),
(75941, 'eventregistration', 'free', 0, '2023-02-01', NULL, 'Success', NULL, NULL, NULL, NULL, 94242, 10137, NULL, NULL, '2023-02-01 16:47:58', '2023-02-01 16:48:00', 95655, NULL),
(75942, 'membership', 'quick_2023020117145 BACE6E0D5JQI 9SM63da', 100, '2023-02-01', 4, 'Success', NULL, NULL, NULL, NULL, 83883, NULL, NULL, NULL, '2023-02-01 17:21:28', '2023-02-01 21:59:59', NULL, NULL),
(75943, 'membership', 'quick_2023020117141 BACFZXBME6FM 9AA63da', 100, '2023-02-01', 4, 'Success', NULL, NULL, NULL, NULL, 94264, NULL, NULL, 'spouse ph- 630-854-2839', '2023-02-01 17:21:43', '2023-02-01 22:08:03', NULL, NULL),
(75944, 'eventregistration', 'free', 0, '2023-02-01', NULL, 'Success', NULL, NULL, NULL, NULL, 83883, 10137, NULL, NULL, '2023-02-01 17:23:16', '2023-02-01 17:23:18', 95656, NULL),
(75945, 'eventregistration', 'free', 0, '2023-02-01', NULL, 'Success', NULL, NULL, NULL, NULL, 94222, 10137, NULL, NULL, '2023-02-01 18:25:12', '2023-02-01 18:25:14', 95657, NULL),
(75946, 'eventregistration', 'free', 0, '2023-02-01', NULL, 'Success', NULL, NULL, NULL, NULL, 94163, 10137, NULL, NULL, '2023-02-01 19:53:26', '2023-02-01 19:53:28', 95658, NULL),
(75947, 'eventregistration', 'free', 0, '2023-02-01', NULL, 'Success', NULL, NULL, NULL, NULL, 94180, 10137, NULL, NULL, '2023-02-01 23:34:46', '2023-02-01 23:34:48', 95659, NULL),
(75948, 'eventregistration', 'free', 0, '2023-02-02', NULL, 'Success', NULL, NULL, NULL, NULL, 94214, 10137, NULL, NULL, '2023-02-02 00:11:58', '2023-02-02 00:12:00', 95660, NULL),
(75949, 'eventregistration', 'ch_3MWqezCuFwKXMCOw1p18xAOg', 30.9, '2023-02-02', 1, 'Success', NULL, NULL, NULL, NULL, NULL, 10137, NULL, NULL, '2023-02-02 00:28:18', '2023-02-02 00:28:21', 95661, NULL),
(75950, 'renewal', '29224835U8882422J', 103, '2023-02-02', 3, 'Success', NULL, NULL, NULL, NULL, 20727, NULL, NULL, NULL, '2023-02-02 01:09:35', '2023-02-02 01:09:52', NULL, NULL),
(75951, 'eventregistration', 'free', 0, '2023-02-02', NULL, 'Success', NULL, NULL, NULL, NULL, 94252, 10137, NULL, NULL, '2023-02-02 01:42:09', '2023-02-02 01:42:12', 95662, NULL),
(75952, 'renewal', 'ch_3MWsz6CuFwKXMCOw1v2yktbE', 103, '2023-02-02', 1, 'Success', NULL, NULL, NULL, NULL, 41603, NULL, NULL, NULL, '2023-02-02 02:57:13', '2023-02-02 02:57:13', NULL, NULL),
(75953, 'eventregistration', 'free', 0, '2023-02-02', NULL, 'Success', NULL, NULL, NULL, NULL, 41603, 10137, NULL, NULL, '2023-02-02 03:05:46', '2023-02-02 03:05:47', 95663, NULL),
(75954, 'eventregistration', 'free', 0, '2023-02-02', NULL, 'Success', NULL, NULL, NULL, NULL, 20880, 10137, NULL, NULL, '2023-02-02 04:09:24', '2023-02-02 04:09:26', 95664, NULL),
(75955, 'eventregistration', 'free', 0, '2023-02-02', NULL, 'Success', NULL, NULL, NULL, NULL, 20154, 10137, NULL, NULL, '2023-02-02 04:12:07', '2023-02-02 04:12:09', 95665, NULL),
(75956, 'eventregistration', 'free', 0, '2023-02-02', NULL, 'Success', NULL, NULL, NULL, NULL, 94219, 10137, NULL, NULL, '2023-02-02 04:42:20', '2023-02-02 04:42:22', 95666, NULL),
(75957, 'renewal', 'ch_3MWuwuCuFwKXMCOw12CJ72xJ', 103, '2023-02-02', 1, 'Success', NULL, NULL, NULL, NULL, 21019, NULL, NULL, NULL, '2023-02-02 05:03:05', '2023-02-02 05:03:05', NULL, NULL),
(75958, 'eventregistration', 'free', 0, '2023-02-02', NULL, 'Success', NULL, NULL, NULL, NULL, 21019, 10137, NULL, NULL, '2023-02-02 05:04:51', '2023-02-02 05:04:52', 95667, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` tinyint(4) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `mailsent` tinyint(4) NOT NULL DEFAULT '0',
  `renewal_success_mail_sent` tinyint(4) DEFAULT NULL,
  `renewal_reminder_mail_sent` tinyint(4) DEFAULT NULL,
  `renewal_reminder_mail_sent_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video_galleries`
--

CREATE TABLE `video_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_gallery_category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `publish` tinyint(4) NOT NULL DEFAULT '1',
  `position` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_galleries`
--

INSERT INTO `video_galleries` (`id`, `video_gallery_category_id`, `title`, `video_url`, `description`, `created_at`, `updated_at`, `publish`, `position`) VALUES
(1, 1, NULL, 'https://youtu.be/Z6aLaIj8rWo', NULL, '2023-04-27 22:38:31', '2023-04-28 04:19:56', 1, 0),
(2, 1, NULL, 'https://youtu.be/ld2DfkWjpwk', NULL, '2023-04-27 22:39:46', '2023-04-28 04:20:03', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `video_gallery_categories`
--

CREATE TABLE `video_gallery_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) DEFAULT NULL,
  `publish` tinyint(4) NOT NULL DEFAULT '1',
  `position` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_gallery_categories`
--

INSERT INTO `video_gallery_categories` (`id`, `name`, `year`, `publish`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Video Gallery', NULL, 1, 0, '2023-04-27 22:37:59', '2023-04-28 04:26:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `application_settings`
--
ALTER TABLE `application_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `application_settings_category_id_foreign` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_details`
--
ALTER TABLE `child_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `child_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `committee_categories`
--
ALTER TABLE `committee_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `committee_categories_committee_category_type_id_foreign` (`committee_category_type_id`);

--
-- Indexes for table `committee_category_types`
--
ALTER TABLE `committee_category_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `committee_members`
--
ALTER TABLE `committee_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `committee_member_active_lists`
--
ALTER TABLE `committee_member_active_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `communication_details`
--
ALTER TABLE `communication_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `communication_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donations_user_id_foreign` (`user_id`),
  ADD KEY `donations_donation_category_id_foreign` (`donation_category_id`);

--
-- Indexes for table `donation_categories`
--
ALTER TABLE `donation_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_event_category_id_foreign` (`event_category_id`);

--
-- Indexes for table `event_categories`
--
ALTER TABLE `event_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_registrations`
--
ALTER TABLE `event_registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_registrations_event_id_foreign` (`event_id`),
  ADD KEY `event_registrations_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `mail_templates`
--
ALTER TABLE `mail_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership_types`
--
ALTER TABLE `membership_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_interests`
--
ALTER TABLE `member_interests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_coverages`
--
ALTER TABLE `news_coverages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_coverages_news_coverage_category_id_foreign` (`news_coverage_category_id`);

--
-- Indexes for table `news_coverage_categories`
--
ALTER TABLE `news_coverage_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `personal_details`
--
ALTER TABLE `personal_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personal_details_user_id_foreign` (`user_id`),
  ADD KEY `personal_details_membership_type_id_foreign` (`membership_type_id`);

--
-- Indexes for table `photo_galleries`
--
ALTER TABLE `photo_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photo_galleries_photo_gallery_category_id_foreign` (`photo_gallery_category_id`);

--
-- Indexes for table `photo_gallery_categories`
--
ALTER TABLE `photo_gallery_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_service_category_id_foreign` (`service_category_id`);

--
-- Indexes for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sponsors_sponsor_category_id_foreign` (`sponsor_category_id`);

--
-- Indexes for table `sponsor_categories`
--
ALTER TABLE `sponsor_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_payment_method_id_foreign` (`payment_method_id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_event_id_foreign` (`event_id`),
  ADD KEY `transactions_event_registration_id_foreign` (`event_registration_id`),
  ADD KEY `transactions_donation_id_foreign` (`donation_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `video_galleries`
--
ALTER TABLE `video_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `video_galleries_video_gallery_category_id_foreign` (`video_gallery_category_id`);

--
-- Indexes for table `video_gallery_categories`
--
ALTER TABLE `video_gallery_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `application_settings`
--
ALTER TABLE `application_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `child_details`
--
ALTER TABLE `child_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `committee_categories`
--
ALTER TABLE `committee_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `committee_category_types`
--
ALTER TABLE `committee_category_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `committee_members`
--
ALTER TABLE `committee_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `committee_member_active_lists`
--
ALTER TABLE `committee_member_active_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `communication_details`
--
ALTER TABLE `communication_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=562;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donation_categories`
--
ALTER TABLE `donation_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10026;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event_categories`
--
ALTER TABLE `event_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event_registrations`
--
ALTER TABLE `event_registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mail_templates`
--
ALTER TABLE `mail_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `membership_types`
--
ALTER TABLE `membership_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `member_interests`
--
ALTER TABLE `member_interests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_coverages`
--
ALTER TABLE `news_coverages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_coverage_categories`
--
ALTER TABLE `news_coverage_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_details`
--
ALTER TABLE `personal_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photo_galleries`
--
ALTER TABLE `photo_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `photo_gallery_categories`
--
ALTER TABLE `photo_gallery_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sponsor_categories`
--
ALTER TABLE `sponsor_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75959;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `video_galleries`
--
ALTER TABLE `video_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `video_gallery_categories`
--
ALTER TABLE `video_gallery_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application_settings`
--
ALTER TABLE `application_settings`
  ADD CONSTRAINT `application_settings_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `child_details`
--
ALTER TABLE `child_details`
  ADD CONSTRAINT `child_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `committee_categories`
--
ALTER TABLE `committee_categories`
  ADD CONSTRAINT `committee_categories_committee_category_type_id_foreign` FOREIGN KEY (`committee_category_type_id`) REFERENCES `committee_category_types` (`id`);

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donations_donation_category_id_foreign` FOREIGN KEY (`donation_category_id`) REFERENCES `donation_categories` (`id`),
  ADD CONSTRAINT `donations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_service_category_id_foreign` FOREIGN KEY (`service_category_id`) REFERENCES `service_categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
