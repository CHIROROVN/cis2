-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 08 Novembre 2017 à 07:12
-- Version du serveur :  10.1.16-MariaDB
-- Version de PHP :  5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cisdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `m_dept`
--

CREATE TABLE `m_dept` (
  `dept_id` int(10) UNSIGNED NOT NULL,
  `dept_name` text NOT NULL,
  `dept_parent_id` int(4) NOT NULL,
  `dept_sort` int(4) NOT NULL,
  `dept_dspl_flag` int(2) NOT NULL,
  `dept_free1` text NOT NULL,
  `dept_free2` text NOT NULL,
  `dept_free3` text NOT NULL,
  `dept_free4` text NOT NULL,
  `dept_free5` text NOT NULL,
  `last_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_kind` int(2) NOT NULL,
  `last_ipadrs` text NOT NULL,
  `last_user` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `m_faculty`
--

CREATE TABLE `m_faculty` (
  `faculty_id` int(10) UNSIGNED NOT NULL,
  `faculty_name` text NOT NULL,
  `faculty_sort` int(4) NOT NULL,
  `faculty_dspl_flag` int(2) NOT NULL,
  `faculty_free1` text NOT NULL,
  `faculty_free2` text NOT NULL,
  `faculty_free3` text NOT NULL,
  `faculty_free4` text NOT NULL,
  `faculty_free5` text NOT NULL,
  `last_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_kind` int(2) NOT NULL,
  `last_ipadrs` text NOT NULL,
  `last_user` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `m_research`
--

CREATE TABLE `m_research` (
  `research_id` int(10) UNSIGNED NOT NULL,
  `research_name` text NOT NULL,
  `research_parent_id` int(10) NOT NULL,
  `research_sort` int(4) NOT NULL,
  `research_dspl_flag` int(2) NOT NULL,
  `research_free1` text NOT NULL,
  `research_free2` text NOT NULL,
  `research_free3` text NOT NULL,
  `research_free4` text NOT NULL,
  `research_free5` text NOT NULL,
  `last_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_kind` int(2) NOT NULL,
  `last_ipadrs` text NOT NULL,
  `last_user` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `m_user`
--

CREATE TABLE `m_user` (
  `u_id` int(10) UNSIGNED NOT NULL,
  `u_name` text NOT NULL,
  `u_login` varchar(11) NOT NULL,
  `u_passwd` text NOT NULL,
  `u_power01` int(5) NOT NULL,
  `u_power02` int(5) NOT NULL,
  `u_free1` text NOT NULL,
  `u_free2` text NOT NULL,
  `u_free3` text NOT NULL,
  `u_free4` text NOT NULL,
  `u_free5` text NOT NULL,
  `remember_token` text NOT NULL,
  `last_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_kind` int(2) NOT NULL,
  `last_ipadrs` text NOT NULL,
  `last_user` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Structure de la table `t_teacher`
--

CREATE TABLE `t_teacher` (
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `teacher_dept1` int(10) NOT NULL,
  `teacher_dept2` int(10) NOT NULL,
  `teacher_title` int(2) NOT NULL,
  `teacher_name1f` text NOT NULL,
  `teacher_name1g` text NOT NULL,
  `teacher_name2f` text NOT NULL,
  `teacher_name2g` text NOT NULL,
  `teacher_name3f` text NOT NULL,
  `teacher_name3g` text NOT NULL,
  `teacher_photo` text NOT NULL,
  `teacher_url` text NOT NULL,
  `teacher_research` text NOT NULL,
  `teacher_degree` text NOT NULL,
  `teacher_getplace` text NOT NULL,
  `teacher_getyear` text NOT NULL,
  `teacher_getmonth` text NOT NULL,
  `teacher_keyword1` text NOT NULL,
  `teacher_keyword2` text NOT NULL,
  `teacher_keyword3` text NOT NULL,
  `teacher_keyword4` text NOT NULL,
  `teacher_keyword5` text NOT NULL,
  `teacher_keyword6` text NOT NULL,
  `teacher_keyword7` text NOT NULL,
  `teacher_keyword8` text NOT NULL,
  `teacher_keyword9` text NOT NULL,
  `teacher_keyword10` text NOT NULL,
  `teacher_dspl_flag` int(2) NOT NULL,
  `teacher_free1` text NOT NULL,
  `teacher_free2` text NOT NULL,
  `teacher_free3` text NOT NULL,
  `teacher_free4` text NOT NULL,
  `teacher_free5` text NOT NULL,
  `teacher_free6` text NOT NULL,
  `teacher_free7` text NOT NULL,
  `teacher_free8` text NOT NULL,
  `teacher_free9` text NOT NULL,
  `teacher_free10` text NOT NULL,
  `last_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_kind` int(2) NOT NULL,
  `last_ipadrs` text NOT NULL,
  `last_user` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `m_dept`
--
ALTER TABLE `m_dept`
  ADD PRIMARY KEY (`dept_id`);

--
-- Index pour la table `m_faculty`
--
ALTER TABLE `m_faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Index pour la table `m_research`
--
ALTER TABLE `m_research`
  ADD PRIMARY KEY (`research_id`);

--
-- Index pour la table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `u_login` (`u_login`);

--
-- Index pour la table `t_teacher`
--
ALTER TABLE `t_teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `m_dept`
--
ALTER TABLE `m_dept`
  MODIFY `dept_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `m_faculty`
--
ALTER TABLE `m_faculty`
  MODIFY `faculty_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `m_research`
--
ALTER TABLE `m_research`
  MODIFY `research_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `u_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT pour la table `t_teacher`
--
ALTER TABLE `t_teacher`
  MODIFY `teacher_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
