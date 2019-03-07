-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 07, 2018 at 07:02 PM
-- Server version: 5.6.39-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salesscript`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `idanswer` int(5) NOT NULL,
  `texts` varchar(16000) NOT NULL,
  `questionId` int(5) NOT NULL,
  `nextQuestionId` int(5) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`idanswer`, `texts`, `questionId`, `nextQuestionId`) VALUES
(1, 'mkmk', 1, 00002),
(2, 'kmkmkm', 2, NULL),
(182, 'Iphone 7 or above', 98, NULL),
(181, 'Iphone 6 or below', 98, NULL),
(180, 'Who do you work for', 97, NULL),
(179, 'No i am not', 97, 00098),
(178, 'Yes i am', 97, NULL),
(177, 'We currently arnt advertising', 96, NULL),
(176, 'Print & Online', 96, NULL),
(175, 'Print only', 96, NULL),
(174, 'Online only', 96, NULL),
(173, 'We already have a marketing team', 95, NULL),
(172, 'Yes i do.', 95, 00096),
(171, 'No i do not', 95, NULL),
(170, 'Why are you asking?', 94, NULL),
(169, 'Below $5000', 94, NULL),
(168, 'Above $5000', 94, NULL),
(167, 'I do not want to share that', 94, NULL),
(166, 'Who do you work for?', 93, 00099),
(165, 'Yes i would love to', 93, NULL),
(164, 'Good bye.', 93, 00094),
(163, 'gonna', 92, NULL),
(162, 'you ', 92, NULL),
(161, 'aare ', 92, NULL),
(160, 'what', 92, NULL),
(159, 'Sounds promising, could you please tell me about pricing', 91, NULL),
(158, 'Could you please send me through some statistics', 91, NULL),
(157, 'Tell me more please', 91, NULL),
(156, 'who are you?', 90, NULL),
(155, 'Mmmmh, go on.', 90, 00091),
(154, 'Yes, that is my goal', 90, NULL),
(153, 'No', 90, NULL),
(152, 'We already have a marketing team', 89, NULL),
(151, 'No', 89, NULL),
(150, 'Yes', 89, NULL),
(149, 'im sorry, im not interested', 88, NULL),
(84, 'Sorry I am not interested.', 72, 00076),
(85, 'yes go on', 72, 00077),
(86, 'I am already happy with the Recruiters that we currently use', 72, 00078),
(87, 'We have always gone with taking on candidates ourselves', 72, 00079),
(88, 'Yes ', 73, NULL),
(89, 'Honestly I donâ€™t have the time to deal with recruiters.', 73, NULL),
(90, 'So tell me how are you going to help my business ?', 73, NULL),
(91, 'If you have some good candidates shoot them through to me and I will have a look', 73, NULL),
(92, 'Your better off just sending me through some info', 73, NULL),
(148, 'im okay', 88, NULL),
(147, 'im good', 88, 00089),
(96, 'Yes ', 76, 00080),
(97, 'Honestly I donâ€™t have the time to deal with recruiters.', 76, 00081),
(98, 'So tell me how are you going to help my business ', 76, NULL),
(99, 'If you have some good candidates shoot them through to me and I will have a look', 76, NULL),
(100, 'Your better off just sending me through some info', 76, NULL),
(101, 'Sounds good shoot me through their CV and I will have a look at them.', 77, NULL),
(102, 'We are in the second stage of our interview process.', 77, NULL),
(103, 'Can you explain to me your Terms', 77, NULL),
(140, 'ahah', 86, 01000),
(104, 'I havent used recruiters before can you explain how you operate', 77, NULL),
(105, 'What qualification do they have ?', 77, NULL),
(106, 'Look we have had some problems with our recruiters before.', 78, NULL),
(107, 'I think we will stay with our current recruiters if it aint broke donâ€™t fix it.', 78, NULL),
(108, 'We are more focused on developing a relationship rather than just doing business online', 78, NULL),
(109, 'There is an application process that you need to go through if you want to be on our list of recruiters.', 78, NULL),
(110, 'No, thank you.', 78, NULL),
(111, 'Great otherwise we would have gone for recruiters!', 79, NULL),
(112, 'Sometimes it hasnâ€™t worked out why what can you offer that others canâ€™t', 79, NULL),
(113, 'Send through your company brief and follow up with me in a week.', 79, NULL),
(114, 'Your better off sending through your details and if we are interested we will give you a call.', 79, NULL),
(115, 'Yes that is true.', 80, NULL),
(116, 'Look I am really busy can you call me some other time.', 80, NULL),
(117, 'Ok I will hear you out.', 81, 00082),
(118, 'I am sure this candidate might be ok but we donâ€™t have the resources at the moment to use recruiterâ€™s thankyou', 81, NULL),
(119, 'Can you send me something so I can have a look at your company?', 81, NULL),
(120, 'We know the industry very well and we know whats out there ', 81, NULL),
(121, 'What qualification do they have?', 82, NULL),
(122, 'Can you explain to me your Terms', 82, NULL),
(123, 'Sounds good shoot me through their CV and I will have a look.', 82, 00083),
(124, 'I havnt used recruiters before can you explain how you operate', 82, NULL),
(125, 'Donâ€™t you trust our company to do the right thing ?', 83, NULL),
(126, 'Ok letâ€™s negotiate.', 83, 00084),
(138, 'whats', 86, 01000),
(127, 'Just describe the candidate that you have please', 83, NULL),
(128, 'I am sorry we donâ€™t do business this way other Recruiters havent had a problem with this', 83, NULL),
(139, 'up', 86, 01000),
(129, 'I am sure this candidate might be ok but we donâ€™t have the resources', 84, NULL),
(130, 'Can you send me something so I can have a look at your company?', 84, NULL),
(131, 'Ok tell me more', 84, 00085),
(137, 'hi', 86, 01000),
(132, 'Sorry but I have to stay with our company policy', 85, NULL),
(133, 'Tell me about the candidate', 85, NULL),
(134, 'Ok send me through your Terms and I will have a look at them', 85, NULL),
(135, 'You can talk to my boss if you like and see what they say', 85, NULL),
(136, 'There is a problem of crossing over candidates and there are only a certain amount of candidates.', 85, NULL),
(183, 'I do not own an iphone', 98, NULL),
(184, 'Tell me more', 99, NULL),
(185, 'Sorry, im not interested', 99, NULL),
(186, 'Good', 100, NULL),
(187, 'Im okay', 100, NULL),
(188, 'Bad', 100, NULL),
(189, 'Who are you', 100, 00101),
(190, 'Tell me more please', 101, NULL),
(191, 'Sorry, im not interested', 101, NULL),
(192, 'how did you get my number', 101, NULL),
(193, 'im good', 102, 00103),
(194, 'not to bad', 102, NULL),
(195, 'goodbye', 102, NULL),
(196, 'We already have a marketing team', 103, NULL),
(197, 'this is working', 103, NULL),
(198, 'Im to busy to deal with this', 103, NULL),
(199, 'I am good', 104, NULL),
(200, 'Not today', 97, NULL),
(201, 'Maybe in the future', 97, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `itemid` int(255) DEFAULT NULL,
  `scriptid` int(255) DEFAULT NULL,
  `scriptname` varchar(255) DEFAULT NULL,
  `price` decimal(65,0) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `createddateofscript` datetime(6) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `paypalemail` varchar(255) DEFAULT NULL,
  `custname` varchar(255) DEFAULT NULL,
  `custaddress` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`itemid`, `scriptid`, `scriptname`, `price`, `category`, `createddateofscript`, `username`, `paypalemail`, `custname`, `custaddress`, `phone`, `email`) VALUES
(1, 1, 'techscript', '2', 'tech', '2018-10-17 03:08:00.000000', 'val1989', 'val1989@outlook.com', 'valerie', '15,wow st,Wowza,NSW,2747', '0459839189', 'NA'),
(2, 2, 'accountingscript', '5', 'acc', '2018-10-24 01:23:00.000000', 'bal1991', 'ballor191@hotmail.com', 'Balor', '45,storn st,perfectoo,NSW,2734', '0435892567', 'NA');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `questionId` int(5) NOT NULL,
  `texts` varchar(16000) NOT NULL,
  `scriptId` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`questionId`, `texts`, `scriptId`) VALUES
(1, 'mkkmkmmk\n', 1),
(2, 'jujuju\n', 1),
(98, 'Before you go, what version Iphone do you have?!\n', 69),
(97, 'Hello, are you looking to purchase an iphone?\n', 69),
(96, 'How are you currently advertising your business?\n', 68),
(95, 'Hello, My name is George. Do you have time to speak about your businesses advertising strategies?\n', 68),
(94, 'Before you go, what is your expected tax return above or below $5000\n', 67),
(93, 'Hello, my name is Bobby. Are you looking to maximise your tax return?\n', 67),
(92, '\n', 66),
(91, 'We are the number one company in grow tech start ups, we currently are growing 10 start ups and they have all improved their public exposure by 100% since starting with us\n', 65),
(90, 'hello, are you looking to be the number one tech start up in the world?\n', 65),
(89, 'Thats good to hear, Are you looking to spread the awareness of your company\n', 64),
(88, 'Hellow, How are you today? My name is John Smith\n', 64),
(72, 'Hi My Name is Paul Miller I am from Sales Stream how are you today.Â \n', 61),
(73, 'before you hang up listen we dont know each other from a bar of soap right. I dont have any preconceivedÂ agenda I am wanting to make money by helping your business Â and you are wanting to make the right decision for your business would I be right in saying that ?\n', 61),
(76, 'before you hang up listen we dont know each other from a bar of soap right. I dont have any preconcievedÂ agenda I am wanting to make money by helping your business Â and you are wanting to make the right decision for your business would I be right in saying that ?\n', 61),
(77, 'This candidate has over four years experience working for one of your competitors in the same Territory so they already have contacts that they can take over for the role. Prior to this they worked for 5 years in a customer service role for an Equip Hire company. They have a proven track record of success and hitting targets KPIs for their current company. Their reason for leaving is that they want to work for a bigger company with greater security and more opportunity for progression does that sound like the sort of candidate that you would be looking for ?\n', 61),
(78, 'What if i were to say to you that not only can we provide a better service than other recruiters and you be so confident in using us that you wont ever have to worry about the Recruiting side of your business. You probably think that all recruiters are the same well they provide the same service but there is a massive difference in quality of service. We have been in the industry for over 30 years and we wouldnâ€™t be able to survive that long unless we were worth our salt at the end of the day business is business right and if you can get the edge by using a better Recruiter you would take it right ?\n', 61),
(79, 'Let me ask how has that worked out for you in the past\n', 61),
(80, 'From a business perspective hiring the right person for you is just as important for us as it is for you. because if we dont get the right person for you then we loose business would I be right in saying that\n', 61),
(81, 'Look just hear me out this Candidate that we have for you will save you hours in Resume services and interviews. You can compare what we have with the other candidates you have interviewed if you like what we have to offer great if you donâ€™t you can go away knowing that your on the right track with your Recruiting and all you have spent is 10 15mins doing so to gain this insight.\n', 61),
(82, 'This candidate has over four years experience working for one of your compeditors in the same Territory so they already have contacts that they can take over for the role. Prior to this they worked for 5 years in a customer service role for an Equip Hire company. They have a proven track record of success and hitting targets KPIs for their current company. Their reason for leaving is that they want to work for a bigger company with greater security and more opportunity for progression does that sound like the sort of candidate that you would be looking for ?\n', 61),
(83, 'We cant just shoot through candidates through to you unless we have signed Terms if we could negotiate a price and I send you our agreement with the price discussed and you sign the Terms I can send you through the details of the candidate that we have or any other candidates that we might have for this role.\n', 61),
(84, 'Look just hear me out this Candidate that we have for you will save you hours in Resume services and interviews. You can compare what we have with the other candidates you have interviewed if you like what we have to offer great if you donâ€™t you can go away knowing that your on the right track with your Recruiting and all you have spent is 10 15mins doing so to gain this insight.\n', 61),
(85, 'I appreciate that way of doing business it shows that your company has good stability. I donâ€™t want to change your business and the way it works but I guess if you are looking for candidates for this role and you want to get a really good idea whats out there and you sign our Terms and look at the candidates that we send you it will cost you nothing only 10 or 15mins and if you donâ€™t like any of the candidates that we send you your getting a good idea of the market if you do then your obviously benefiting by getting a good candidateÂ \n', 61),
(86, '\n', 62),
(99, 'We work for the number 1 accounting firm in Sydney, AccountantsPlus\n', 67),
(100, 'Hello, how are you today?\n', 70),
(101, 'My name is Dylan, i work for salesExperts.\n', 70),
(102, 'Hello my name is justin, how are you today\n', 71),
(103, 'are you looking to give your business greater exposure within the market?\n', 71),
(104, 'Hello, how are you! \n', 72);

-- --------------------------------------------------------

--
-- Table structure for table `Rating`
--

CREATE TABLE `Rating` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `scriptID` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Rating`
--

INSERT INTO `Rating` (`id`, `username`, `scriptID`, `rating`) VALUES
(3, NULL, 1, 4),
(7, NULL, 1, 4),
(35, NULL, 72, 1),
(34, NULL, 70, 4),
(19, NULL, 1, 4),
(33, NULL, 69, 4),
(32, NULL, 68, 4),
(31, NULL, 67, 4),
(30, NULL, 1, 1),
(29, NULL, 65, 4),
(28, NULL, 64, 3),
(26, NULL, 16, 1),
(27, NULL, 62, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `saleid` int(11) NOT NULL,
  `scriptid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `curuserid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `useremail` varchar(100) DEFAULT NULL,
  `script` varchar(255) NOT NULL,
  `transactionid` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `paypalemail` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `zip` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `datepurchased` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `datephp` varchar(50) DEFAULT NULL,
  `paymentstatus` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`saleid`, `scriptid`, `userid`, `curuserid`, `storeid`, `username`, `useremail`, `script`, `transactionid`, `category`, `price`, `paypalemail`, `fname`, `lname`, `address`, `city`, `state`, `zip`, `country`, `phone`, `datepurchased`, `datephp`, `paymentstatus`) VALUES
(2, 1, 1, 1, 1, 'tester1', 'test@test.com', 'tester', '46U82238M7486002L', 'Technology', 0.01, 'info@wewebweavers.com', 'Ernest', 'T Martinez', '', '', '', '', '', '', '2018-11-03 20:48:08', 'Saturday 3rd of November 2018 08:48:08 PM', 'Completed'),
(4, 62, 1, 1, 11, 'tester1', 'test@test.com', 'asda', '1SW85348RM745512N', 'ADMIN', 1.21, 'avishka96@icloud.com', 'Avishka', 'Gajanayake', '', '', '', '', '', '', '2018-11-06 07:45:09', 'Tuesday 6th of November 2018 07:45:09 AM', 'Completed'),
(5, 66, 1, 1, 14, 'tester1', 'test@test.com', 'kalos', '89R12107CB782003H', 'BANKING', 1.21, 'avishka96@icloud.com', 'Avishka', 'Gajanayake', '', '', '', '', '', '', '2018-11-07 03:11:19', 'Wednesday 7th of November 2018 03:11:19 AM', 'Completed'),
(6, 66, 1, 1, 14, 'tester1', 'test@test.com', 'kalos', '92R73243SA036360R', 'BANKING', 1.21, '18418125@student.westernsydney.edu.au', 'Avishka', 'Gajanayake', '', '', '', '', '', '', '2018-11-07 03:12:56', 'Wednesday 7th of November 2018 03:12:56 AM', 'Completed'),
(7, 1, 1, 1, 1, 'tester1', 'test@test.com', 'tester', '7AE63254JA6477004', 'TECH', 0.01, 'srilanka1996@outlook.com', 'Avishka', 'Gajanayake', '', '', '', '', '', '', '2018-11-07 03:14:04', 'Wednesday 7th of November 2018 03:14:04 AM', 'Completed'),
(8, 1, 1, 1, 1, 'tester1', 'test@test.com', 'tester', '6H450818ER243664N', 'TECH', 0.01, '128@aol.com', 'Avishka', 'Gajanayake', '', '', '', '', '', '', '2018-11-07 08:44:05', 'Wednesday 7th of November 2018 08:44:05 AM', 'Completed'),
(9, 13, 1, 1, 8, 'tester1', 'test@test.com', 'yeye1111', '6A512600TU195614M', 'TECH', 2.4, 'avishka96@icloud.com', 'Avishka', 'Gajanayake', '', '', '', '', '', '', '2018-11-07 08:49:19', 'Wednesday 7th of November 2018 08:49:19 AM', 'Completed'),
(10, 48, 1, 1, 10, 'tester1', 'test@test.com', 'hellotest', '7KG37657FR235642B', 'MARKETING', 1.21, 'avishka96@icloud.com', 'Avishka', 'Gajanayake', '', '', '', '', '', '', '2018-11-07 08:53:46', 'Wednesday 7th of November 2018 08:53:46 AM', 'Completed'),
(11, 16, 1, 1, 7, 'tester1', 'test@test.com', 'jnjniji', '6E209322WX7281601', 'TECH', 9, '18418125@student.westernsydney.edu.au', 'Avishka', 'Gajanayake', '', '', '', '', '', '', '2018-11-07 09:00:48', 'Wednesday 7th of November 2018 09:00:48 AM', 'Completed'),
(12, 67, 1, 5, 15, 'justink', 'justin@gmail.com', 'tax return', '2R7653136U382925E', 'ACCOUNTING', 1.4, '18418125@student.westernsydney.edu.au', 'Avishka', 'Gajanayake', '', '', '', '', '', '', '2018-11-08 00:49:44', 'Thursday 8th of November 2018 12:49:44 AM', 'Completed'),
(13, 72, 5, 5, 20, 'justink', 'justin@gmail.com', 'construction', '1XV08525XE508693F', 'CONSTRUCTION', 1.22, '18418125@student.westernsydney.edu.au', 'Avishka', 'Gajanayake', '', '', '', '', '', '', '2018-11-08 01:03:05', 'Thursday 8th of November 2018 01:03:05 AM', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `script`
--

CREATE TABLE `script` (
  `scriptId` int(5) NOT NULL,
  `userId` int(5) NOT NULL,
  `scriptName` text NOT NULL,
  `category` text NOT NULL,
  `firstQuestionId` int(5) UNSIGNED ZEROFILL DEFAULT NULL,
  `purchased` enum('Y','N') NOT NULL DEFAULT 'N',
  `example` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `script`
--

INSERT INTO `script` (`scriptId`, `userId`, `scriptName`, `category`, `firstQuestionId`, `purchased`, `example`) VALUES
(68, 1, 'advertising', 'marketing', 00095, 'N', 'N'),
(72, 5, 'construction', 'construction', 00104, 'Y', 'N'),
(71, 5, 'px', 'technology', 00102, 'N', 'N'),
(70, 1, 'Sales', 'telemarketing', 00100, 'N', 'N'),
(69, 1, 'iphones', 'telemarketing', 00097, 'N', 'N'),
(67, 1, 'taxreturn', 'accounting', 00093, 'N', 'N'),
(65, 1, 'technologyexposure', 'technology', 00090, 'N', 'N'),
(64, 1, 'clientGrowth', 'Marketing', 00088, 'N', 'N'),
(61, 1, 'recruitmenttesting', 'recruitment', 00072, 'N', 'Y'),
(62, 1, 'asda', 'admin', 00086, 'Y', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `storeID` int(5) NOT NULL,
  `userID` int(5) NOT NULL,
  `scriptID` int(5) NOT NULL,
  `scriptName` varchar(45) NOT NULL,
  `price` float NOT NULL,
  `uploadDate` text NOT NULL,
  `category` varchar(45) NOT NULL,
  `rating` float NOT NULL,
  `question` int(5) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`storeID`, `userID`, `scriptID`, `scriptName`, `price`, `uploadDate`, `category`, `rating`, `question`, `description`) VALUES
(17, 1, 69, 'Iphones', 3, '07/11/2018 13:41:59', 'Telemarketing', 0, 97, 'Sell iphones to anyone'),
(16, 1, 68, 'Advertising', 3, '07/11/2018 13:36:54', 'Marketing', 0, 95, 'advertising r us'),
(19, 5, 71, 'px', 2, '08/11/2018 00:39:46', 'technology', 0, 102, 'this is the number one script in marketing'),
(18, 1, 70, 'Sales', 7, '07/11/2018 23:17:23', 'telemarketing', 0, 100, 'Best way to increase sales in 2018'),
(15, 1, 67, 'tax return', 1.4, '07/11/2018 11:59:36', 'accounting', 0, 93, 'Targets customers who wish to better their tax return'),
(13, 1, 65, 'TechnologyExposure', 4, '06/11/2018 13:53:39', 'Technology', 0, 90, 'Number 1 in growing technology start ups'),
(12, 1, 64, 'clientGrowth', 2, '06/11/2018 11:24:22', 'Marketing', 0, 88, 'The best client growth script around'),
(20, 5, 72, 'construction', 1.22, '08/11/2018 01:00:37', 'construction', 0, 104, 'construction');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `username` varchar(30) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `admin` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `firstname`, `lastname`, `email`, `password`, `admin`) VALUES
(1, 'tester1', 'Justin', 'testing', 'test@test.com', 'password', 'N'),
(2, 'admin', 'admin', 'admins', 'admin@gmail.com', 'password', 'Y'),
(5, 'justink', 'bob', 'korner', 'bobby@gmail.com', 'Password', 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`idanswer`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD UNIQUE KEY `itemid` (`itemid`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`questionId`),
  ADD KEY `scriptId` (`scriptId`);

--
-- Indexes for table `Rating`
--
ALTER TABLE `Rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`saleid`);

--
-- Indexes for table `script`
--
ALTER TABLE `script`
  ADD PRIMARY KEY (`scriptId`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`storeID`),
  ADD UNIQUE KEY `question` (`question`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `idanswer` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `questionId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `Rating`
--
ALTER TABLE `Rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `saleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `script`
--
ALTER TABLE `script`
  MODIFY `scriptId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `storeID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
