-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 21, 2025 at 04:31 PM
-- Server version: 10.11.10-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u939280429_na_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `content`, `category_id`, `created_at`, `image_path`) VALUES
(15, 'Offences against a person', '<p><span style=\"color: #1f1f1f; font-family: consolas, \'lucida console\', \'courier new\', monospace; font-size: 12px; white-space-collapse: preserve; background-color: #ffffff;\">Offences against a person</span></p>', 4, '2025-03-17 04:11:03', '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`) VALUES
(4, 'Offences against a person', 'Offences against a person', '2025-02-23 12:07:07');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `document_name` varchar(255) NOT NULL,
  `document_path` varchar(255) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `category`, `created_at`, `updated_at`) VALUES
(10, 'What is Criminal Law?', 'Criminal law that primarily defines the types of crime, determines the degree of crimes and respective punishment, and lastly also explains the procedure to punish a perpetrator, is well defined and codified law. Likewise, if someone commits a crime, then under the criminal law provision, he or she is penalize based on the degree of the committed crime. Normally, accordingly to the procedure, first he is arrested, put on trial, and, if found guilty, then finally punished. Analysis of the definitions of particular crimes as well as the universal rules that govern all crimes is known as substantive criminal law. On the other hand, an examination of the legal guidelines controlling the tracking down, looking into, and prosecution come under the procedural criminal law.', '', '2025-03-17 04:14:37', '2025-03-17 04:14:37'),
(11, 'What is the Purpose for Criminal Law\'s Development in Society?', 'It emerged as a tool for social control within a culture. Humans are naturally feeble. As a result, they are prone to wrongdoing, and criminal law was developed to prevent such criminal acts. Disputes in the society are another common characteristic that more often take a serious form and turn into criminal offenses. If there is no defined restraint for such an act, it will result in a chaotic situation; thus, the enactment of criminal law is required to maintain law and order in society and to promote welfare in society.', '', '2025-03-17 04:15:34', '2025-03-17 04:15:34'),
(12, 'What is Definitions of Criminal Law?', 'Criminal law can be concluded as − a) To outlaw and restrain behavior that unjustifiably endangers or seriously harms a person, others’ lives, or the public goods. Respect for life and property is demanded. b) To put under public supervision those whose actions may amount to criminal offense. For instance, a 4−year sentence is intended to prevent a person from committing other crimes; in other words, it serves as a deterrent to other criminals. c) Assess the nature of the behavior that has been deemed illegal fairly; for example, it would be unfair to punish someone for behavior they are unaware of. Thus, it establishes what is and is not illegal. To inform persons of actions that could result in criminal charges as well as the seriousness of that punishment.', '', '2025-03-17 04:48:29', '2025-03-17 04:48:29'),
(13, 'How does Criminal Law Work?', 'A person, who violates the law, considered as the offender, so, as per the criminal law, he will be taken into custody, put on trial, and, if found guilty, punishment is awarded. The defined punishment will be imposed by court of law. However, if crime is trivial (petty crime) in nature, then judge or magistrate may issue a warning to the defendant with small amount of fine. But if he repeats it, then he will be punished.', '', '2025-03-17 04:49:16', '2025-03-17 04:49:16'),
(14, 'What Justifies the Use of the Concept of Punishment?', 'The basic purpose behind giving punishment to the offenders is to discourage him not to repeat such offensive behavior; to protect the society from such offenders; and, also to create a deterrent condition, as because of such punishment, other person who might thinking to commit crime, may get frighten. In other words, he will be afraid of doing any punishable act. This concept defines deterrent theory. Another theory that define the purpose of punishment is Preventive theory. According to this theory, punishment aims to stop or incapacitate the offender from repeating the offense. Lastly, there is reformative or rehabilitation theory, which states that a criminal may occasionally receive punishment in order to undergo reformation.', '', '2025-03-17 04:49:53', '2025-03-17 04:49:53'),
(15, 'What are the Characteristics of Crime?', 'It includes − a) The act or omission must be against a community. b) The behavior must be prohibited and a punishable offence. One can distinguish between technically wrong action, such as wrongful parking, which is referred to as mala prohibitam, and evil sorts of conduct, such as murder, which is referred to as male inse.', '', '2025-03-17 04:50:57', '2025-03-17 04:50:57'),
(16, 'What is the main purpose of criminal law?', 'The criminal law prohibits conduct that causes or threatens the public interest; defines and warns people of the acts that are subject to criminal punishment; distinguishes between serious and minor offenses; and imposes punishment to protect society and to satisfy the demands for retribution and rehabilitation.', '', '2025-03-17 04:52:00', '2025-03-17 04:52:00'),
(17, 'What is criminal law punishment?', 'Criminal punishments are sanctions and punishment imposed on persons convicted of criminal acts by the competitive court. Usually, it is in the form of fine or imprisonment or both.', '', '2025-03-17 04:52:45', '2025-03-17 04:52:45'),
(18, 'What is the highest form of punishment?', 'Capital punishment refers to the process of sentencing convicted offenders to death for the most serious crimes (capital crimes) and carrying out that sentence.', '', '2025-03-17 04:53:40', '2025-03-17 04:53:40'),
(19, 'What are the two sides of criminal law?', 'Usually, there are two sides of criminal law− defense (from the accused’s side) and prosecution (from the plaintiff’s side). Both sides can be seen during the trial of the case inside the court.', '', '2025-03-17 04:54:18', '2025-03-17 04:54:18'),
(20, 'What are the main branches of criminal law?', 'Prima facie, the first branch of criminal law is the police, who arrest the accused, investigate the case, and file a charge sheet in court. Secondly, the lawyers (both prosecutor and defense) who argue the case try to prove guilty (prosecutor) and not guilty (defense). Finally, there is the judiciary (the judge), who sentences if found guilty and frees if found not guilty.', '', '2025-03-17 04:54:55', '2025-03-17 04:54:55');

-- --------------------------------------------------------

--
-- Table structure for table `practice_area`
--

CREATE TABLE `practice_area` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `practice_area`
--

INSERT INTO `practice_area` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(3, 'Civil and Commercial Disputes', 'Our Civil and Commercial Disputes Team represents multiple individual and corporate Clients before the Courts across the country in complex litigations. At the firm, we advise companies and other institutions on a diverse spectrum of commercial issues. The firm’s commercial disputes team comprises of several specialist teams to advise and assist the clients and companies on every stage of the dispute resultion pertaining to Civil, Commercial as well as Insolvency litigation before various Trial Courts as well as the High Court of Gujarat. We also have a thriving Arbitration practice and have represented leading Companies before Arbitral Tribunals across the country.', '2025-03-17 03:42:50', '2025-03-17 03:42:50'),
(4, 'Labour & Industrial Disputes', 'Our Labour and Industrial Disputes practice is one of the most comprehensive across the country. We provide advisory as well as litigation services on all forms of matters related to employment, labour, compensation and other industrial disputes. Our firm has, through the years, provided solutions to employers as well as the employees tackling complicated challenges and issues faced in the modern workplace.', '2025-03-17 03:43:26', '2025-03-19 07:05:15'),
(5, 'Taxation', 'The taxation team at our firm offers a wide range of Direct as well as Indirect Tax services including tax planning, restructuring, advisory, and litigation solutions. We regularly represent Clients in litigations before Authorities, Tribunals and Courts.', '2025-03-17 03:43:47', '2025-03-17 03:43:47'),
(6, 'Criminal Law', 'The Firm has a budding litigation practice in Criminal Law and Service Law. With recent additions to our team, we now have a team of proficient lawyers having a vast experience of representing our Clients before various courts and forums across the country. We specialize in Criminal Law, providing strategic defense in high-profile cases. Our expertise spans from challenging obscenity charges to navigating complex financial crimes, ensuring our clients receive the best possible outcome in every legal battle.', '2025-03-17 03:44:14', '2025-03-18 15:15:52'),
(7, 'Real Estate', 'The Real Estate Team at our firm consists of a specialist team of lawyers who understand the nuances of issues pertaining to the sector, particularly in Gujarat. The team regularly advises Clients on conducting title due diligence, stamp duty procedures, transactions and other construction and allied contracts. The Team undertakes conveyancing work and provides a one stop solution to all Real Estate issues, including litigations before RERA, Revenue Authorities as well as the High Court.', '2025-03-17 03:44:44', '2025-03-19 07:03:51'),
(8, 'Mediation', 'Mediation is an effective alternate method of dispute resolution. Mediation has been present in various forms in India, like the \"Lok Adalats,\" etc., but it has found its roots, more formally, with mandatory pre-institutional mediation in certain classes of Commercial Suits and the more recent Mediation Act 2023.\r\nThe Firm is actively interested in mediated settlements, where feasible, and has mediated several disputes among high-net-worth individuals and corporate houses. Mediation also provides for a confidential and speedy process, being voluntary, of dispute resolution and is less susceptible to legal challenges.', '2025-03-18 15:11:43', '2025-03-18 15:11:43'),
(10, 'Arbitration', 'From pioneering decisions on the impact of arbitration on non-signatories to influencing the grounds for setting aside arbitral awards, our Firm is at the forefront of navigating complex and high-stakes arbitration disputes across various sectors.', '2025-03-18 15:17:06', '2025-03-18 15:17:06'),
(12, 'Constitutional Law', 'Our work spans crucial legal battles that uphold constitutional rights and challenge legislative overreach, ensuring the integrity of India\'s legal system.', '2025-03-18 15:19:57', '2025-03-18 15:19:57'),
(13, 'Land and Revenue', 'Our firm provides a muti disciplinary approach in the cases relating to lands, property transaction and land use regulations with a dynamic approach towards the subject with our team of legal practitioners with bring legal help and solutions for our esteemed cliental.     ', '2025-03-19 07:01:00', '2025-03-19 07:01:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `practice_area`
--
ALTER TABLE `practice_area`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `practice_area`
--
ALTER TABLE `practice_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
