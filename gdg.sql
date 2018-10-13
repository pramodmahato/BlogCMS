-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2018 at 12:14 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gdg`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `C_ID` int(11) NOT NULL,
  `content` varchar(400) NOT NULL,
  `author` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `Post_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`C_ID`, `content`, `author`, `date`, `Post_ID`) VALUES
(20, 'Sikkim', 'abhi@gmail.com', '2018-09-27 23:33:54', '28'),
(21, 'Test Comment', 'abhi@gmail.com', '2018-09-27 23:35:37', '29'),
(25, 'Test Comment', 'prainfosysa@gmail.com', '2018-09-28 22:32:48', '28'),
(26, 'Test Comment', 'prainfosysa@gmail.com', '2018-09-30 13:28:59', '26');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `Post_ID` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `featured` varchar(200) NOT NULL,
  `category` varchar(30) NOT NULL,
  `author` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(10) NOT NULL,
  `visitors` int(5) NOT NULL,
  `scheduledate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`Post_ID`, `title`, `description`, `featured`, `category`, `author`, `date`, `status`, `visitors`, `scheduledate`) VALUES
(24, 'CarPlay and Android Auto will soon be available in Jaguar and Land Rover cars', 'Just days after it was reported that Toyota would finally add Android Auto support in its cars, Jaguar Land Rover has announced similar plans to add CarPlay and Android Auto to its vehicles, as reported by MacRumors. A spokesperson confirmed that CarPlay and Android Auto will be available in all 2019 Jaguar and Land Rover vehicles equipped with InControl Touch Pro or Touch Pro Duo infotainment systems, as well as on older models through retroactive updates.\r\n\r\nCarPlay and Android Auto will be available with an optional smartphone connectivity package, which will start at $280 and go up depending on the vehicle model. Thereâ€™s no set date for when these features and retroactive updates will be available in the US, but rollout appears to have started in the UK.\r\n\r\nTHE MORE OPTIONS, THE BETTER\r\nItâ€™s good, if not belated news, and Land Rover and Jaguar owners should be able to get a lot out of their newly equipped infotainment systems. With third-party mapping services added to Appleâ€™s CarPlay in iOS 12, drivers now have the option to use whatever navigation app they prefer, like Google Maps.', 'car.jpg', 'Technology', 'prainfosysa@gmail.com', '2018-09-27 01:25:26', 'publish', 4, '0000-00-00'),
(25, 'Bowling Karega Ya Bowler Change Karein MS Dhoni Gives A Mouthful To Kuldeep Yadav', 'Putting their England debacle to rest the Indian cricket team has undoubtedly been in sublime form in the 2018 Asia Cup. The fact that Team India became the first team to secure their berth in the final with one Super Four match still left to playa goes on to show how convincing they have been in the tournament.\r\n\r\nThusa when it came to their last Super Four clash against Afghanistan on 25th Septembera there was no surprise to see India resting as many as five of their regular players which included last gameas centurions Rohit Sharma and Shikhar Dhawan. The game was full surprisesa quite literally.\r\n\r\nFirst upa was the sight of MS Dhoni at the toss as he came out to lead the Indian side for the 200th time in ODIs. Thena there was Mohammad Shahzadas sparkling knock of 124 runsa which was brilliantly followed up with Mohammad Nabis gritty fifty. \r\n\r\nLatera it was KL Rahul and Ambati Rayuduas classy fifty to give India a flying start. And finallya Rashid Khanas brilliance to defend six runs in the final over to snatch a tie for Afghanistan. \r\n\r\nButa amidst all thata there was a rare moment of Dhonias typical inimitable style that was captured on the stump mic. During Afghanistanas inningsa Kuldeep Yadav was getting ready for his run-up when he took a glance at the field. Not happy with the field settinga the Indian chinaman pressed for a change but to no avail.', 'msd.jpg', 'Sports', 'prainfosysa@gmail.com', '2018-09-27 12:19:27', 'publish', 5, '0000-00-00'),
(26, 'How To Set Up A Workout Schedule That Isnt Boring And Monotonous', 'Most people have this complaint that their training schedule is too boring or too hard. In fact  one of the major reasons why people discontinue going to the gym is because they do not find their training schedule realistic or sustainable. More often than not  the fault lies with the trainers. They put everyone who walks through the gym door on the same generic one body part a day cookie cutter plan without taking into consideration a client s lifestyle  goals and preferences.\r\nThe first thing that should to be considered when you are charting out your training routine is your schedule and time frame. Everyone starts working out with a goal or a target in mind and your workout schedule be planned in such a way that it helps you achieve that goal. For example  if you are a competitive bodybuilder or a physique athlete and are planning to compete in 12 weeks  your plan should be realistic enough to help you achieve the physique that you would like to present on stage. Even if you go to the gym  just to look good in general or lose some fat and gain muscle  you should still plan ahead. A correctly set up optimum training plan which you can realistically follow in a consistent manner can greatly augment your results and vice versa.\r\n\r\nAlthough this may sound really simple and obvious but most people get it wrong. People look up the internet for a workout schedule and download a generic 8 or 12 week cookie cutter plan. However  this plan does not suit your needs  nor has it taken into account various factors like:\r\n\r\n1. Health Markers\r\n\r\n2. Fitness Goals\r\n\r\n3. Training Preferences\r\n\r\n4. Time Dedicated Towards Fitness\r\n\r\n5. Training Age  \r\n\r\nNow  let me get this very clear. The person you might idolize on IG is a full time fitness professional. You aren t. You have a family and a regular job. That means you can t stay shredded 365 days a year and can work out twice a day. You should be realistic about how much time will you be able to dedicated in the gym on a day to day or week to week basis. Remember that optimal is not necessarily the same thing as realistic. You need to begin with what you can do  before you choose what you ought to do.\r\n', 'body.jpg', 'Health', 'prainfosysa@gmail.com', '2018-09-27 12:39:09', 'publish', 35, '0000-00-00'),
(27, 'Here Are 8 Cool On-Screen Dads In Bollywood Who Are The Harbingers Of Feminism In Indian Cinema', 'We have come a long way since the times of Chaudhary Baldev Singh in  Dilwale Dulhania Le Jayenge  to the Bhashkor Banerjee in  Piku . During this time  the father figures of Indian cinema gradually but consistently  underwent subtle transformations that were to change Bollywood s concept of cool dads  that the GenY would be able to appreciate and relate to.\r\n\r\nA lot of this change must be credited to the feminist movement that has been gaining pace and active recognition across the country  over the past few years.\r\n\r\nThe feminist movement  at the very core of its existence  thrives on the need for gender equality for all  as well as equal avenue and exposure for the sexes. \r\n\r\nFeminism s another powerful fight is against the de-humanisation of men  who are carved out as stoic authoritarians  as per patriarchal ideologies.\r\n\r\nOver the past few years  Indian cinema has witnessed a gradual evolution in the father figures. These dads are not authoritarians and dictators but instead  hold the ability to be friendly  nurturing and forthcoming with their feelings towards their children and family. They are everything India is fighting for and its darn good!\r\n\r\n1. Dattatreya -  102 Not Out \r\nHere Are 8 Cool OnScreen Dads In Bollywood Who Are The Harbingers Of Feminism In Indian Cinema\r\nSPE Films India\r\n\r\nDattatreya is the new age super dad who cares for his son s health and welfare like a mother would  while he dons the father s hat. He goes out of his way to watch out for his son and enables him to face the world by his own might. He is fearless  unapologetic and openly expresses his feelings to his son.\r\n\r\n2. Mr. Joshi -  Shubh Mangal Saavdhan \r\nHere Are 8 Cool OnScreen Dads In Bollywood Who Are The Harbingers Of Feminism In Indian Cinema\r\nColour Yellow Procductions', 'amitabh.jpg', 'Entertainment', 'prainfosysa@gmail.com', '2018-09-27 12:42:48', 'publish', 22, '0000-00-00'),
(28, 'Yes  You Can Fly To Sikkim. But  Here is 15 More Reasons Why You Should Visit The State', 'Sikkim recently got its first airport which will be operational very soon. This means that you can take a direct flight to Gangtok and explore the wilderness of the state. \r\n\r\nWhether you are looking for a break  taking in the extravaganza of natureâ€™s beauty or seeking a fun-filled adventurous holiday  Sikkim will not disappoint you.\r\nHere are 15 reasons why Sikkim should be your next getaway.\r\n\r\n1. The picturesque landscape and scenery of the state will take your breath away.\r\n\r\nSource: Quora\r\n \r\n\r\nYou can also take a ride on the ropeway. The cable ride starts from the Deorali Market and takes you to highest point of Gangtok  Tashiling. Providing you with the birdâ€™s eye view of the Gangtok city and the surrounding Himalayan peaks\r\n\r\n\r\nSource: STDC\r\n \r\n\r\n\r\nSource: Youtube\r\n \r\n\r\n2. The towering mountains that soar high above the sky will make you feel on the top of the world.\r\n\r\nSource: piyushidhir\r\n \r\n\r\n\r\nSource: International Traveller\r\n \r\n\r\n3. The traditional Sikkimese delicacies cater to the taste buds of any adventurous foodie.\r\nThe cuisine of Northeast is quite different than the rest of the country. From momos and Syabhaleys to steaming bowls of Thukpa and Piro Aloo Dum you will get a wide variety of dishes here.', 'shimla.jpg', 'Travel', 'prainfosysa@gmail.com', '2018-09-27 12:45:53', 'publish', 87, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UID`, `Name`, `Email`, `Password`, `Created`) VALUES
(1, 'Pramod', 'prainfosys@gmail.com', '1824e8e0307cbfdd1993511ab040075c', '2018-09-23'),
(2, 'Pramod Mahato', 'prainfosysa@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2018-09-24'),
(3, 'Abhijeet', 'abhi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2018-09-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`C_ID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`Post_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `C_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `Post_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
