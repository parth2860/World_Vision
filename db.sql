-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2021 at 03:32 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `id` int(20) NOT NULL,
  `heading` varchar(100) NOT NULL,
  `text` varchar(500) NOT NULL,
  `text2` varchar(500) NOT NULL,
  `text3` varchar(500) NOT NULL,
  `image` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id`, `heading`, `text`, `text2`, `text3`, `image`) VALUES
(1, 'the social news  sites', 'This is one of the biggest Social News Website available and covers a huge variety of topics like technology, entertainment and general news. There’s also a picture section.', 'This Social News Site includes a variety of topics including politics, technology and more.', 'While this site heavily covers technology news, it also has a wide range of topics like politics, games, entertainment and more. and more of, in that users, submit stories to be approved by editors. This site can generate a lot of traffic', 'Cyberpunk_2077_website_1617083795450.webp'),
(18, 'the social news sites', 'This is one of the biggest Social News Website available and covers a huge variety of topics like technology, entertainment and general news. There’s also a picture section of each category.', 'This Social News Site includes a variety of topics including politics, technology and more.', 'While this site heavily covers technology news, it also has a wide range of topics like politics, games, entertainment and more. and more of, in that users, submit stories to be approved by editors. This site can generate a lot of traffic		\r\n', '181126_Blog_Feature_Vision_Statement.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(10) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `username`, `password`) VALUES
(1, 'ADMIN', 'world');

-- --------------------------------------------------------

--
-- Table structure for table `category_mst`
--

CREATE TABLE `category_mst` (
  `category_id` int(5) NOT NULL,
  `category_name` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_mst`
--

INSERT INTO `category_mst` (`category_id`, `category_name`, `description`) VALUES
(1, 'global ', ''),
(2, 'local ', ''),
(3, 'sports ', ''),
(4, 'tech ', ''),
(5, 'entertainment ', ''),
(6, 'politics/regional ', ''),
(7, 'games ', '');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `username`, `name`, `email`, `subject`, `msg`) VALUES
(1, 'p123', 'patel', 'hehtrhr', 'thtrh', 'tsrhrttr'),
(6, 'parth', '', 'parth7689@gmail.com', 'first', 'vrgrgrg'),
(7, 'rohan', '', 'j98@gmail.com', 'jjy', 'jyrjy'),
(9, 'hhjftjfj', '', 'hrt@gmail.com', ',ug,yuf', 'utg,tttfuikjfytu'),
(10, 'hhjftjfj', '', 'hrt@gmail.com', ',ug,yuf', 'utg,tttfuikjfytu'),
(11, 'vasu', '', 'vasupatel0064@gmail.com', 'Improve site management', 'jhghihb');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `feed` text NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `username`, `email`, `topic`, `feed`, `status`) VALUES
(1, 'yrjyjd', 'parth7689@gmail.com', 'rdjrdj', 'rtjdrjdjr', 1),
(2, 'parth', 'parth7689@gmail.com', 'theme', 'need less bright color\r\nmeans give dark theme', 1),
(3, 'eryhrtu', 'vasupatel0064@gmail.com', 'thrrh', 'rthrh', 1),
(4, 'phthoiy', 'vasupatel0064@gmail.com', 'uiouou9o', 'uiouyouoyuoyyōotōṭoo.7rō7.ō7.ōt.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `group1`
--

CREATE TABLE `group1` (
  `id` int(50) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `time` date NOT NULL DEFAULT current_timestamp(),
  `username` varchar(50) NOT NULL,
  `gname` varchar(100) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group1`
--

INSERT INTO `group1` (`id`, `name`, `text`, `image`, `time`, `username`, `gname`, `status`) VALUES
(24, 'bike', 'bike', 'Norse_Kratos.png', '2021-06-16', 'vasu0064@', 'huskverna', 1),
(26, '', '', 'images.jfif', '2021-06-17', 'vasu0064@', 'vitpillen', 1),
(28, 'first', 'second', 'yt1s.com - Iron Man WhatsApp statusIron man MarvelAvenger.mp4', '2021-06-17', 'vasu0064@', 'vitpillen', 1),
(29, 'new oppournity', 'new vision', 'vision.jpg', '2021-06-17', 'vasu0064@', 'vitpillen', 1),
(39, 'JOINT MILITARY COMMAND ', 'The amalgamation of 19 military commands into a cohesive joint or theatre command will be India\'s biggest defence reform. The challenge will be to take everyone along. The ongoing Ladakh stand-off with China has taught us one thing – a unified military approach along with diplomatic and economic measures is the way forward', 'CDS_Bipin_Rwat_Three_Armed_Forces_Chiefs.jpg', '2021-06-20', 'ka098', 'indian Defence', 1),
(40, 'MIG-21 BISON WILL BE PHASED OUT IN A PLANNED MANNER', ' Amidst the controversy towering over the MiG-21 Bison, following a recent crash -- third in this year, the Chief of Air Staff, Air Chief Marshal RKS Bhadauria said that there is a plan to phase out the ageing fleet and substituting them with modern fighter jets.', 'MiG-21_Fighter.jpg', '2021-06-20', 'ka098', 'indian Defence', 1),
(42, 'PEACE WITH INDIA', 'There is a sense of division within the military on where Pakistan should stand regarding peace with India', 'download (1).jfif', '2021-06-20', 'ra1234', 'indian Defence', 1),
(43, 'spiderman 3', 'With Sony’s Spider-Man: No Way Home set to release later this year, Disney and Sony will once again come together to bring the friendly neighborhood Spider-Man to the big screen. In a talk with The Hollywood Reporter, Walt Disney Studios marketing president Asad Ayaz spoke about the collaboration between both studios and how it helps everyone. ', 'download (2).jfif', '2021-06-20', 'ra1234', 'marvel', 1),
(44, 'Rdj', 'genus \r\ncreator of superhits series and marvel universe', 'yt1s.com - Ironman WhatsApp status marvel.mp4', '2021-06-20', 'ra1234', 'marvel', 1),
(45, 'new storyline', 'Marvel Regrets The Avengers\' Most Controversial Story\r\nMarvel apologized for the Avengers\' most controversial storyline, as even the editor-in-chief called out the \"heinous\" comic.', 'Avengers-MArvel-Comics.jpg', '2021-06-20', 'jay67', 'marvel', 1),
(46, 'bmw', 'still one of th ebest car\r\nhistory\r\nThe BMW E46 M3 GTR came to life in February 2001 and was the first M3 in the history of the company to feature a V8 engine. ... To fulfill this rule, BMW put 10 road going M3 GTR models on sale after the 2001 season, for €250,000 each', 'EKQCiabX0AE2-7U.jpg', '2021-06-20', 'jay67', 'hyper cars', 1),
(47, 'Aston Martin debriefs', 'Despite his struggles at Ferrari, the team opted to replace Sergio Perez with Vettel at the end of last year in the hope that his experience and knowledge would make them a top team.\r\n\r\nIt’s too soon to say whether that will be the case, but he’s certainly delivering when it comes to providing in-depth insights, with Szafnauer saying that the German has made the debriefs far longer.\r\n\r\n“Well, they [the debriefs] are more detailed than they used to be before, and because of the detail, they are definitely longer,” the Aston Martin team boss said.', 'victor.jpg', '2021-06-20', 'jay67', 'hyper cars', 1),
(48, 'konigzegg regera', 'fastest car in world', 'Need For Speed __ Whatsapp Status.mp4', '2021-06-20', 'jay67', 'hyper cars', 1),
(62, 'djbd', ' mndbd', 'WhatsApp Image 2021-06-21 at 8.16.06 AM.jpeg', '2021-06-21', 'vasu0064@', 'Tech', 1),
(63, 'Vsjbs', 'ndnmdwn d', 'WhatsApp Image 2021-06-21 at 8.50.27 AM.jpeg', '2021-06-21', 'vasu0064@', 'hyper cars', 1),
(64, 'ENdkj', 'djbdb', 'WhatsApp Image 2021-06-21 at 8.50.19 AM.jpeg', '2021-06-21', 'vasu0064@', 'hyper cars', 1);

-- --------------------------------------------------------

--
-- Table structure for table `group_mst`
--

CREATE TABLE `group_mst` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `text` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_mst`
--

INSERT INTO `group_mst` (`id`, `name`, `text`, `image`, `username`) VALUES
(1, 'huskverna', 'all bikes', 'images.jfif', 'parth284'),
(2, 'vitpillen', 'fgeygfu uirhgruighuierhguirhg', 'Rinnegan-Sasuke-Wallpaper.jpg', 'vasu0064@'),
(11, 'indian Defence', 'defence ,security &aerospace', '1.jfif', 'ka098'),
(12, 'marvel', 'just a superhero stuff', 'unnamed (1).jpg', 'ra1234'),
(13, 'hyper cars', 'nos,tubo,v8 & v12 &   v16', 'NFSNL_Koenigsegg_Regera_Carlist.jpg', 'jay67'),
(15, 'Tech', 'Tech01', 'WhatsApp Image 2021-06-21 at 8.15.54 AM.jpeg', 'vasu0064@');

-- --------------------------------------------------------

--
-- Table structure for table `headline`
--

CREATE TABLE `headline` (
  `id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `text` varchar(300) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `headline`
--

INSERT INTO `headline` (`id`, `title`, `text`, `image`) VALUES
(8, 'Covishield', 'Covishield produced more antibodies than Covaxin, claims study\r\nThe exact percentage of seropositivity rates between Covishield and Covaxin recipients will only be determined in a head-to-head trial, said the authors of the study.', 'poli2.jpg'),
(15, 'third wave', 'third wave', '912728520211631393HEALTHGOVTHOSPITALMEDICALOXYGENSUPPORTICUWARDPATIEJPG.jfif'),
(30, 'cuberpunk', 'company faces loss after game release', 'Cyberpunk_2077_website_1617083795450.webp');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`like_id`, `uid`, `pid`) VALUES
(4, 1, 64);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `time` date NOT NULL DEFAULT current_timestamp(),
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `username`, `user_id`, `title`, `content`, `category`, `image`, `time`, `status`) VALUES
(31, 'ADMIN', 1, 'spain', 'Spain flu 1920, the situation was similar  as per now but no vaccine is provided everything cued by natural remedies', 'global ', 'Cyberpunk_2077_website_1617083795450.webp', '2021-05-27', 1),
(34, 'ADMIN', 1, 'spacex ', 'SpaceChain to Deploy Commercial Blockchain Tech With SpaceX Launches in June', 'global ', 'spacex-falcon-heavy-elon-musk-china-europe-esa-nasa-mars-sls-boeing.jpg', '2021-05-28', 1),
(35, 'ADMIN', 1, 'cyclone effect', ' Indian mango  market  and vegetable market is highly affected, after cyclone hits', 'local ', 'grow-mango-seeds-1902625-hero-f222c4c0a3ad4b24a70948ddcec9e5e6.jpg', '2021-05-28', 1),
(37, 'parth284', 2, 'high price but powerful', 'their lots of buzz over the new gaming laptop of Asus \r\npreviously company suffering loss over inaccurate display of their computers', 'tech ', 'rog-scar-15-2020.jpg', '2021-05-28', 1),
(38, 'vasu0064@', 1, 'new marvel universe0', 'after releasing the trailer of marvels eternal\r\n.fans start a discussion over tony stark presence in the 2017 spiderman movie.\r\nin which there was a scene where tony stark operate his remote-controlled ai power suit to save spiderman\r\nhere the main question was whose wedding tony stark attend that moment ', 'entertainment ', '_142fcb3e-c1cd-11ea-bed6-81066a26d6e8.webp', '2021-05-28', 1),
(39, 'amit05@', 3, 'the question still remined', 'What scientists now say on Covid origin in Wuhan lab and what they dismissed prematurely\r\nWuhan lab researchers created new viruses by using reverse genetics on bat coronaviruses. Some of this research was funded by the US.', 'politics/regional ', 'cef77f10-476c-11ea-aeb3-955839e06441.jfif', '2021-05-28', 1),
(40, 'jay67', 4, 'the big diasters', 'Cyberpunk 2077 - Most Awaited Game In History Costs $1 Billion Loss To Founders Within A Week\r\nCD Projekt SA is struggling to cope up with the technical glitches that have been plaguing its latest game Cyberpunk 2077. Arguably the most awaited game this year, Cyberpunk 2077 launched to the public last week and has attracted a lot of criticism for its countless bugs ever since.\r\n\r\nA new report now highlights that the founders of the company have collectively suffered a loss of US $1 billion since the launch of the game.', 'games ', '934102-twitter-6.jpg', '2021-05-28', 1),
(44, 'jay67', 4, 'vise', 'video', 'games ', 'yt1s.com - Ironman WhatsApp status marvel.mp4', '2021-06-05', 1),
(49, 'vasu0064@', 1, 'ff9', 'fastest car', 'tech ', 'Need For Speed __ Whatsapp Status.mp4', '2021-06-05', 1),
(51, 'ADMIN', 1, 'election', 'AHMEDABAD: Over 60 per cent voter turnout was recorded in the elections to Gujarat\'s 81 municipalities, 31 district panchayats and 231 taluka panchayats that were held in a largely peaceful manner on Sunday, barring an incident of booth capturing and reports of clash as well as snags in EVMs at some places, officials said.', 'politics/regional ', 'poli5.jpg', '2021-06-07', 1),
(52, 'ADMIN', 1, 'corona and election', 'Yogi Adityanath remains an unchallenged leader of BJP in UP.\r\nWest Bengal election 2021 in 8 Phases from march 27 , counting on May 2', 'politics/regional ', 'poli9.jpg', '2021-06-07', 1),
(53, 'ADMIN', 1, '', 'Clash of Clans is a freemium mobile strategy video game developed and published by Finnish game developer Supercell. The game was released for iOS platforms on August 2, 2012, and on Google Play for Android on October 7, 2013.', 'games ', 'game3.jpg', '2021-06-07', 1),
(54, 'parth284', 2, '', 'Forty-one years, 1,097 wins and five national championships ago, Mike Krzyzewski became Duke men’s basketball’s head coach. One remarkable career later, the man is more commonly known as “Coach K” is now set to step down from his post after the 2021-22 season, Stadium\'s Jeff Goodman reported Wednesday afternoon, and the college basketball community has been quick to sing the praises of the legendary coach.', 'sports ', 'spo2.png', '2021-06-07', 1),
(55, 'parth284', 2, 'fast 9', 'Fast & Furious 9 — being released as F9 in some markets — has leaked onto torrent sites and other networks that enable piracy, in differing versions of quality and file size (from 900MB to 1.99GB). While most copies are arguably genuine, given the attached screenshots and user comments attesting to their legitimacy, some are fraudulent and merely exist as a trap to load viruses, malware, and whatnot onto the computers of unsuspecting individuals. But even with those genuine cases, the illegal Fast & Furious 9 copies are of remarkably poor quality, feature hard-coded subtitles, and/ or are filled with advertisements. Gadgets 360 does not condone illegal file-sharing. It is against the law and filmmakers deserve to be paid for the content they create', 'entertainment ', 'NFSNL_Koenigsegg_Regera_Carlist.jpg', '2021-06-07', 1),
(56, 'amit05@', 3, 'lockdown', ' The lockdown should be eased only after the test positivity rate (TPR) falls below 5 per cent and daily infections slide below 5,000, the Covid-19 technical advisory committee has told the state government. It suggests that strict restrictions should continue for two more weeks after June 7, the last day of the current lockdown, unless the case fatality rate (CFR) becomes less than 1 per cent.\r\n[9:31 PM, 6/6/2021] Amit Rofel: With COVID-19 now reported in almost all Gavi-eligible countries, the Vaccine Alliance is providing immediate funding to health systems, enabling countries to protect health care workers, perform vital surveillance and training, and purchase diagnostic tests.', 'local ', 'local4.jpg', '2021-06-07', 1),
(57, 'amit05@', 3, 'new trend', ': Garena Free Fire is one of the biggest players in the battle royale market, with Battlegrounds Mobile India likely to be its biggest competition going forward. The game has millions of fans enjoying the title on a daily basis. Free Fire offers compatibility on low-end devices, which has allowed it to reach a vast gaming audience.\r\n Unite in adventure and laughter in the action-packed game of Jumanji, the ultimate challenge for those who seek to leave their world behind. Play split-screen or with AI teammates, and combine the unique abilities of Dr Bravestone, Ruby, Mouse and Prof. Oberon to defeat your foes and save the day!', 'games ', 'game2.jpg', '2021-06-07', 1),
(58, 'amit05@', 3, 'final', 'Despite producing top-quality performances on the international stage, an ICC title has eluded New Zealand cricket for over two decades now. New Zealand\'s only ICC crown came in the form of the Champions Trophy which they won beating India in 2000. They have made the summit clashes of the last two ODI World Cups - 2015 and 2019 - but failed to cross the final hurdle.\r\n\r\nThe upcoming World Test Championship final against India in Southampton offers another chance for the Black Caps to win a major title. In a chat with TOI, former New Zealand coach Mike Hesson spoke on the WTC final, how the two teams are placed, and more. ', 'sports ', 'photo.jpg', '2021-06-07', 1),
(59, 'amit05@', 3, '', 'While it might look like a gaming laptop, and even carry the ROG badge, the Flow X13 is anything but just a gaming laptop. Surprisingly, that’s a good thing. Powered by a powerful 8-core GPU and a passable-for-gaming Nvidia GTX 1650 Max-Q GPU, the Asus ROG Flow X13 will not hold up to any kind of heavy gaming load. Light games like The Division 2 and Horizon: Zero Dawn don’t even hit 60 fps at 1080p low settings.\r\nWhile it might look like a gaming laptop, and even carry the ROG badge, the Flow X13 is anything but just a gaming laptop. Surprisingly, that’s a good thing. Powered by a powerful 8-core GPU and a passable-for-gaming Nvidia GTX 1650 Max-Q GPU, the Asus ROG Flow X13 will not hold up to any kind of heavy gaming load. Light games like The Division 2 and Horizon: Zero Dawn don’t even hit 60 fps at 1080p low settings.', 'tech ', 'G733QS-HG056TS-Asus-ROG-Strix-Scar-17.png', '2021-06-07', 1),
(60, 'jay67', 4, '', 'Bloomberg highlights that the number of firms concerned about rising input costs is the highest in a decade. The gap between PPI and CPI is towards the highest since the early 1990s. The WSJ says that, buffeted by the rising costs, some manufacturers are refusing to accept orders or are even considering shutting down operations temporarily, moves that could put more strain on global supply chains.\r\n\r\n\"If input cost pressure persists, more manufacturers in China will either be forced to ha ..\r\n\r\n', 'global ', 'poli7.jpg', '2021-06-07', 1),
(61, 'jay67', 4, '', 'After blood clots in the arteries of limbs, heart and brain, Covid patients are coming with intestinal clots and gangrene. Across city hospitals, nearly a dozen cases have been treated by physicians and surgeons, who caution that complaints of excruciating and unexplained stomach pain should be investigated.', 'local ', 'poli2.jpg', '2021-06-07', 1),
(62, 'jay67', 4, '', 'With COVID-19 now reported in almost all Gavi-eligible countries, the Vaccine Alliance is providing immediate funding to health systems, enabling countries to protect health care workers, perform vital surveillance and training, and purchase diagnostic tests.', 'local ', 'local3.webp', '2021-06-07', 1),
(63, 'jay67', 4, 'gpu demand', ' will you go to buy a new PC graphics card? Edward Arciga was desperate enough to camp outside the Best Buy in West Los Angeles to try and secure one. \r\n\r\n“You gotta make that sacrifice,” he said after spending a cold night outside the store’s entrance, trying to sleep in a foldable chair.   \r\n\r\nArciga wasn’t alone. Dozens of other people also camped through the night at the same Best Buy in the hopes of snagging Nvidia’s RTX 3080 Ti on launch day.', 'tech ', 'shop-2080-ti-1070@2x.jpg', '2021-06-07', 1),
(64, 'jay67', 4, 'all', 'One of the biggest news that came out of this year’s Computex event was Samsung and AMD detailing their upcoming mobile GPU that both companies have been working on since 2019. As AMD CEO Dr. Lisa Su revealed during the keynote, the next-gen Exynos will feature AMD’s RDNA 2 GPU along with support for ray tracing and variable rate shading. While you might have expected NVIDIA to make a similar announcement this year, it looks like AMD’s rival won’t be joining the mobile GPU party anytime soon.\r\n\r\nNVIDIA is in the middle of acquiring ARM, and there have been speculations that the acquisition will open up the door for NVIDIA to bring its GeForce lineup of GPUs to Android smartphones. But that won’t happen anytime in the near future, as per NVIDIA’s CEO Jensen Huang (via ZDNet). According to Huang, now isn’t the right time for the company to bring ray tracing games to smartphones.\r\n\r\n“Ray tracing games are quite large, to be honest. The data set is quite large, and there’ll be a time for it. When the time is right, we might consider it,” said Huang during a press conference on Wednesday.\r\n\r\nHuang added that the current best route to reach mobile gamers is through NVIDIA’s GeForce Now cloud gaming service, which currently offers 1,000+ titles and boasts of over 10 million users across 70 countries.', 'tech ', 'download.jfif', '2021-06-07', 1),
(70, 'jay67', 4, 'India vs New Zealand, WTC final, Southampton, 3rd day', 'This has definitely been New Zealand\'s session. They took out the last three Indian wickets for just six runs, and then their openers have batted out the testing period to tea for no loss. India haven\'t let them run away, conceding just 36 runs in 21 overs. They came close to getting a wicket, especially Mohammed Shami, who took the shoulder of the bat only for the ball to sail over the cordon. New Zealand\'s control percentage is 83, which means they have survived 22 false responses without losing a wicket. India were bowled out in 108 of those.\r\nNew Zealand trail by 181 runs, and if light stays good we are in for another humdinger of a session. Quite a long one too: possibly more than three hours.', 'sports ', '323535.jpg', '2021-06-20', 1),
(71, 'ka098', 20, 'loki', 'Although not stated directly, Orwell heavily suggests Big Brother is not a real person, but rather a manifestation of an evil, tyrannical dictatorship. Loki is very probably planning something similar with its Time-Keepers and, unlike 1984, the MCU will actually have to reveal the truth sooner or later. Echoing Big Brother, the Time-Keepers could be a concept, rather than actual living beings.', 'entertainment ', 'Tom-Hiddleston-as-Loki-and-Time-Keeper-statue.jpg', '2021-06-20', 1),
(72, 'ka098', 20, 'COVID-19 treatment protocols and management', 'As a preparedness measure to counter a third wave of COVID-19, Tamil Nadu is ramping up infrastructure in paediatric wards and sensitising paediatricians to COVID-19 treatment protocols and management.\r\n\r\nWhile whether the third wave of infections will largely affect children is still being debated, health officials and experts in the State are of the view that Tamil Nadu needs to be prepared, keeping in mind the experiences from the last two waves.', 'global ', '912728520211631393HEALTHGOVTHOSPITALMEDICALOXYGENSUPPORTICUWARDPATIEJPG.jfif', '2021-06-20', 1),
(73, 'ra1234', 19, 'Countries With “ZERO” Tax – Wanna Immigrate?', 'UAE – A federation of seven emirates, UAE comprises Abu Dhabi, Dubai, Sharjah, Umm Al Quwain, Ajman, Fujairah, and Ras Al Khaimah. One of the best things about UAE is that citizens don’t have to pay any income tax. So, how does the government generate revenue? Well, funds for the government are generated through corporate tax imposed on foreign banks and oil companies. UAE also levies excise tax on certain goods that are considered harmful to health and environment. Another income source for government is Value Added Tax (VAT), which is imposed on most goods and services.\r\n\r\nBrunei – Located in Southeast Asia, Brunei is governed by a mix of Islamic practices, sharia law and English common law. There is no personal taxation for individuals. This rule applies to both residents and non-residents. However, individuals do have to contribute 5% of their salary income to Tabung Amanah Perkerja (TAP), ', 'global ', 'txfre-768x439.jpg', '2021-06-20', 1),
(75, 'ra1234', 19, 'Earn less than $75,000? You may pay nothing in federal income taxes for 2021', 'If your income falls below $75,000 for 2021, there’s a chance you’ll end up paying no income taxes on it.\r\n\r\nOn average, taxpayers in that category will have no tax liability after accounting for deductions and credits when they file their 2021 tax returns next spring, according to recent estimates from the nonpartisan Joint Committee on Taxation. Those households also may get money back from the IRS.\r\n\r\nEven for taxpayers earning $75,000 to $100,000 in 2021, the average income tax rate paid will be 1.8%.', 'global ', 'states-without-an-income-tax-3193345-01-41573651b8a540cd84509ffb3052580c.png', '2021-06-20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(200) DEFAULT NULL,
  `lname` varchar(200) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `dp` varchar(100) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` varchar(30) DEFAULT NULL,
  `mno` varchar(10) DEFAULT NULL,
  `regdt` timestamp NULL DEFAULT current_timestamp(),
  `pass` varchar(30) DEFAULT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `dp`, `email`, `gender`, `dob`, `mno`, `regdt`, `pass`, `status`) VALUES
(1, 'vasu', 'patel', 'vasu0064@', 'download.jfif', 'vasupatel0064@gmail.com', 'Male', '2000-06-14', '7069228846', '2021-04-09 05:26:12', '123', 1),
(2, 'parth', 'patel', 'parth284', '35df1cef6b596381b6bdcdd79b45bb0c.jpg', 'parth7689@gmail.com', 'Male', '2000-05-20', '8200125438', '2021-04-09 05:26:43', '987', 1),
(3, 'amit', 'vadhiya', 'amit05@', 'unnamed.jpg', 'amit05@gmail.com', 'Male', '2001-02-28', '0090854585', '2021-04-09 05:27:35', '456', 1),
(4, 'patel', 'jay', 'jay67', '3625340.jpg', 'j98@gmail.com', 'male', '2021-06-19', '753962186', '2021-05-11 05:12:21', '951', 1),
(19, 'rohan', 'patel', 'ra1234', '935629-vk2.jpg', 'ra@gmail.com', 'Male', '1995-06-26', '7539684120', '2021-06-01 06:52:08', '098', 1),
(20, 'karan', 'patel', 'ka098', 'ente4.jpg', 'karan@gmail.com', 'Male', '1998-06-08', '7539518631', '2021-06-07 04:41:39', '789', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_mst`
--
ALTER TABLE `category_mst`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group1`
--
ALTER TABLE `group1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_mst`
--
ALTER TABLE `group_mst`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `headline`
--
ALTER TABLE `headline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category_mst`
--
ALTER TABLE `category_mst`
  MODIFY `category_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `group1`
--
ALTER TABLE `group1`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `group_mst`
--
ALTER TABLE `group_mst`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `headline`
--
ALTER TABLE `headline`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
