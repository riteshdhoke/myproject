-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2019 at 07:29 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` int(11) NOT NULL,
  `agent_group` int(11) NOT NULL COMMENT 'agent group id',
  `full_name` varchar(500) NOT NULL,
  `short_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `telephone_1` varchar(255) NOT NULL,
  `telephone_2` varchar(255) NOT NULL,
  `fax_1` varchar(255) NOT NULL,
  `fax_2` varchar(255) NOT NULL,
  `contact_1` varchar(255) NOT NULL,
  `contact_2` varchar(255) NOT NULL,
  `email_1` varchar(255) NOT NULL,
  `email_2` varchar(255) NOT NULL,
  `country` int(11) NOT NULL COMMENT 'country id',
  `port` int(11) NOT NULL COMMENT 'port id',
  `remark` text NOT NULL,
  `uei_no` varchar(255) NOT NULL,
  `cust_acc` varchar(255) NOT NULL,
  `credit_limit` varchar(255) NOT NULL,
  `term` int(11) NOT NULL COMMENT 'term id',
  `currency` int(11) NOT NULL COMMENT 'currency id',
  `user_id` int(11) NOT NULL COMMENT 'user id',
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `last_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `agent_group`, `full_name`, `short_name`, `address`, `telephone_1`, `telephone_2`, `fax_1`, `fax_2`, `contact_1`, `contact_2`, `email_1`, `email_2`, `country`, `port`, `remark`, `uei_no`, `cust_acc`, `credit_limit`, `term`, `currency`, `user_id`, `date_added`, `last_updated`) VALUES
(2, 2, 'MILIND PANDURANG DHOLE', 'asd', 'PLOT 39 GUT 95\r\nPESHWE NAGAR SATARA PARISAR BEED BY PASS', '08087252347', '', '', '', '', '', 'rdriteshdhoke@gmail.com', '', 2, 2, '', '', '', '', 1, 1, 1, '2019-09-29 22:09:58', '2019-09-29 22:15:20'),
(3, 2, 'Rahul', 'R', 'panaji', '08275381650', '08275381650', '82753', '', '', '', 'satirahul10@gmail.com', 'satirahul10@gmail.com', 2, 2, '', '', '', '', 1, 1, 1, '2019-10-04 15:16:08', '2019-10-04 15:16:08');

-- --------------------------------------------------------

--
-- Table structure for table `agent_group`
--

CREATE TABLE `agent_group` (
  `id` int(11) NOT NULL,
  `group_id` varchar(255) NOT NULL COMMENT 'short group name',
  `name` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `last_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agent_group`
--

INSERT INTO `agent_group` (`id`, `group_id`, `name`, `date_added`, `last_updated`) VALUES
(2, 'GRP 2', 'group two', '2019-09-29 17:27:31', '2019-09-29 17:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `country_code` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `last_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country_name`, `country_code`, `date_added`, `last_updated`) VALUES
(2, 'Country 1', 'Country One', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Mustang', 'WCG3', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Mustang', 'SDPV', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `credit`
--

CREATE TABLE `credit` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL COMMENT 'short name',
  `name` varchar(255) NOT NULL COMMENT 'name',
  `credit_day` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `last_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `currency_code` varchar(255) NOT NULL COMMENT 'like IN',
  `name` varchar(255) NOT NULL COMMENT 'like INDIA',
  `rate` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `last_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `currency_code`, `name`, `rate`, `date_added`, `last_updated`) VALUES
(1, 'IN', 'India', '99', '2019-09-26 22:08:59', '2019-09-29 16:46:27'),
(2, 'SG', 'Singapore', '11', '2019-10-04 16:47:51', '2019-10-04 17:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `short_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `telephone_1` varchar(255) NOT NULL,
  `telephone_2` varchar(255) NOT NULL,
  `fax_1` varchar(255) NOT NULL,
  `fax_2` varchar(255) NOT NULL,
  `contact_1` varchar(255) NOT NULL,
  `contact_2` varchar(255) NOT NULL,
  `email_1` varchar(255) NOT NULL,
  `email_2` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  `salesman` varchar(255) NOT NULL,
  `remark` text NOT NULL,
  `uei_no` varchar(255) NOT NULL,
  `cust_acc` varchar(255) NOT NULL,
  `cred_limit` varchar(255) NOT NULL,
  `term_id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `last_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `group_id`, `full_name`, `short_name`, `address`, `telephone_1`, `telephone_2`, `fax_1`, `fax_2`, `contact_1`, `contact_2`, `email_1`, `email_2`, `country_id`, `salesman`, `remark`, `uei_no`, `cust_acc`, `cred_limit`, `term_id`, `currency_id`, `userid`, `last_updated`, `date_added`) VALUES
(2, 1, 'Ritesh', 'asdasd', 'Sector 5 ghansoli', '0808 725 2347', '', '', '', '', '', '', '', 2, '1', '', '', '', '', 1, 1, 1, '2019-10-05 22:43:35', '2019-10-05 22:43:35');

-- --------------------------------------------------------

--
-- Table structure for table `customer_group`
--

CREATE TABLE `customer_group` (
  `id` int(11) NOT NULL,
  `group_id` varchar(255) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `last_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_group`
--

INSERT INTO `customer_group` (`id`, `group_id`, `group_name`, `last_updated`, `date_added`) VALUES
(1, '101', 'Ireland', '2019-10-05 22:11:22', '2019-10-05 16:36:21'),
(2, '111', 'Ritesh', '2019-10-05 16:41:07', '2019-10-05 16:41:07');

-- --------------------------------------------------------

--
-- Table structure for table `import_info`
--

CREATE TABLE `import_info` (
  `id` int(11) NOT NULL,
  `import_ref_no` varchar(255) NOT NULL,
  `hbl_no` varchar(255) NOT NULL,
  `customer` int(11) NOT NULL COMMENT 'customer id',
  `express_bl` varchar(255) NOT NULL,
  `fowarding` int(11) NOT NULL COMMENT 'agent id',
  `trucking` varchar(255) NOT NULL,
  `shipper` varchar(255) NOT NULL,
  `do_ready` varchar(255) NOT NULL,
  `consignee` varchar(255) NOT NULL,
  `delivery_date` varchar(255) NOT NULL,
  `do_release_to` varchar(255) NOT NULL,
  `fr_collect` varchar(255) NOT NULL,
  `collect_from` int(11) NOT NULL COMMENT 'vendor id',
  `delivery_to` int(11) NOT NULL COMMENT 'customer id',
  `currency` int(11) NOT NULL COMMENT 'currency id',
  `weight` varchar(255) NOT NULL,
  `volume` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `package_type` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL,
  `cfs_forklift` varchar(255) NOT NULL,
  `cfs_warehouse` varchar(255) NOT NULL,
  `cfs_processing` varchar(255) NOT NULL,
  `cfs_admin` varchar(255) NOT NULL,
  `cfs_tracing` varchar(255) NOT NULL,
  `nomination` varchar(255) NOT NULL,
  `last_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `import_ref`
--

CREATE TABLE `import_ref` (
  `id` int(11) NOT NULL,
  `ref_no` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `job_type` varchar(255) NOT NULL,
  `job_date` varchar(255) NOT NULL,
  `agent` int(11) NOT NULL COMMENT 'agent id',
  `eta` varchar(255) NOT NULL,
  `vessel` varchar(255) NOT NULL,
  `voyage` varchar(255) NOT NULL,
  `edt` varchar(255) NOT NULL,
  `pol` int(11) NOT NULL COMMENT 'port id',
  `pod` int(11) NOT NULL COMMENT 'port id',
  `ocean_bl` varchar(255) NOT NULL,
  `cr_agent` int(11) NOT NULL COMMENT 'vendor id',
  `cr_booking_no` int(11) NOT NULL COMMENT 'vendor_id',
  `nvocc_agent` int(11) NOT NULL COMMENT 'vendor_id',
  `nvocc_bl` int(11) NOT NULL COMMENT 'vendor_id',
  `warehouse` int(11) NOT NULL COMMENT 'vendor_id',
  `total_m3` varchar(255) NOT NULL,
  `forword_agent` int(11) NOT NULL COMMENT 'agent_id',
  `total_wt` varchar(255) NOT NULL,
  `transport` int(11) NOT NULL COMMENT 'vendor id',
  `total_packages` varchar(255) NOT NULL,
  `ref_currency` int(11) NOT NULL COMMENT 'currency_id',
  `pkg_types` varchar(255) NOT NULL,
  `remark` text NOT NULL,
  `user` int(11) DEFAULT NULL COMMENT 'user id',
  `last_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `import_ref`
--

INSERT INTO `import_ref` (`id`, `ref_no`, `status`, `job_type`, `job_date`, `agent`, `eta`, `vessel`, `voyage`, `edt`, `pol`, `pod`, `ocean_bl`, `cr_agent`, `cr_booking_no`, `nvocc_agent`, `nvocc_bl`, `warehouse`, `total_m3`, `forword_agent`, `total_wt`, `transport`, `total_packages`, `ref_currency`, `pkg_types`, `remark`, `user`, `last_updated`, `date_added`) VALUES
(2, '1570468837', 'open', 'lcl', '10/29/2019', 3, '', '', '', '', 4, 0, '', 0, 0, 0, 0, 0, '', 3, '', 0, '', 2, '', 'adasd', 1, '2019-10-07 23:05:40', '2019-10-07 22:50:37');

-- --------------------------------------------------------

--
-- Table structure for table `import_shipper`
--

CREATE TABLE `import_shipper` (
  `id` int(11) NOT NULL,
  `shipper_shipper_id` int(11) NOT NULL,
  `shipper_consignee_id` int(11) NOT NULL,
  `shipper_notify_party_id` int(11) NOT NULL,
  `shipper_agent_id` int(11) NOT NULL,
  `last_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `import_shipper`
--

INSERT INTO `import_shipper` (`id`, `shipper_shipper_id`, `shipper_consignee_id`, `shipper_notify_party_id`, `shipper_agent_id`, `last_updated`, `date_added`) VALUES
(1, 2, 0, 3, 0, '2019-10-07 22:50:37', '2019-10-07 22:50:37');

-- --------------------------------------------------------

--
-- Table structure for table `job_import_shipper`
--

CREATE TABLE `job_import_shipper` (
  `id` int(11) NOT NULL,
  `shipper_shipper_id` int(11) NOT NULL,
  `shipper_consignee_id` int(11) NOT NULL,
  `shipper_notify_party_id` int(11) NOT NULL,
  `shipper_agent_id` int(11) NOT NULL,
  `last_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_import_shipper`
--

INSERT INTO `job_import_shipper` (`id`, `shipper_shipper_id`, `shipper_consignee_id`, `shipper_notify_party_id`, `shipper_agent_id`, `last_updated`, `date_added`) VALUES
(1, 2, 0, 3, 0, '2019-10-07 22:50:37', '2019-10-07 22:50:37');

-- --------------------------------------------------------

--
-- Table structure for table `port`
--

CREATE TABLE `port` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `port`
--

INSERT INTO `port` (`id`, `code`, `name`, `date_added`, `last_updated`) VALUES
(4, 'SDPV', 'Rahul', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '122', 'FF', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `hp` varchar(255) NOT NULL,
  `last_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `code`, `name`, `hp`, `last_updated`, `date_added`) VALUES
(1, 'code2', 'name2', '', '2019-10-05 22:30:48', '2019-10-05 22:30:48');

-- --------------------------------------------------------

--
-- Table structure for table `sea_import_job_master`
--

CREATE TABLE `sea_import_job_master` (
  `id` int(11) NOT NULL,
  `import_job_export` int(11) NOT NULL,
  `trans_shipment` int(11) NOT NULL,
  `shipper_info` int(11) NOT NULL,
  `last_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sea_import_shipment_master`
--

CREATE TABLE `sea_import_shipment_master` (
  `id` int(11) NOT NULL,
  `import_ref_id` int(11) NOT NULL,
  `shipper_id` int(11) NOT NULL,
  `container_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `payable_id` int(11) NOT NULL,
  `costing_id` int(11) NOT NULL,
  `attachment_id` int(11) NOT NULL,
  `added_by_id` int(11) NOT NULL,
  `last_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sea_import_shipment_master`
--

INSERT INTO `sea_import_shipment_master` (`id`, `import_ref_id`, `shipper_id`, `container_id`, `invoice_id`, `payable_id`, `costing_id`, `attachment_id`, `added_by_id`, `last_updated`, `date_added`) VALUES
(1, 2, 1, 0, 0, 0, 0, 0, 0, '2019-10-07 22:50:37', '2019-10-07 22:50:37');

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `credit_day` int(11) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_added` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`id`, `code`, `name`, `credit_day`, `last_updated`, `date_added`) VALUES
(1, 'trm 1', 'Term one', 10, '2019-09-29 12:23:46', '2019-09-29 12:23:46'),
(2, 'trm 2', 'Term 2', 30, '2019-09-29 12:23:46', '2019-09-29 12:23:46');

-- --------------------------------------------------------

--
-- Table structure for table `trans_shipment_info`
--

CREATE TABLE `trans_shipment_info` (
  `id` int(11) NOT NULL,
  `tranship` varchar(255) NOT NULL,
  `port_disc` int(11) NOT NULL COMMENT 'port id',
  `final_dest` int(11) NOT NULL COMMENT 'port id',
  `agent` int(11) NOT NULL COMMENT 'agent id',
  `booking_no` varchar(255) NOT NULL,
  `export_no` varchar(255) NOT NULL,
  `exp_ref_no` varchar(255) NOT NULL,
  `vessel` varchar(255) NOT NULL,
  `voyage` varchar(255) NOT NULL,
  `edt` varchar(255) NOT NULL,
  `coloader` text NOT NULL,
  `eta_dest` varchar(255) NOT NULL,
  `remark` text NOT NULL,
  `ag_rates` varchar(255) NOT NULL,
  `total_ag_rates` varchar(255) NOT NULL,
  `imp_rates` varchar(255) NOT NULL,
  `total_imp_rates` varchar(255) NOT NULL,
  `permit` text NOT NULL,
  `last_updated` datetime NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'ritesh', '$2y$10$8vQO6jsuDqFZJTkHR6vIeulZ97W9B2AfqT8AgpbCDKeUjywE4.vM.');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(11) NOT NULL,
  `vendor_group` int(11) NOT NULL COMMENT 'vendor group id',
  `full_name` varchar(500) NOT NULL,
  `short_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `telephone_1` varchar(255) NOT NULL,
  `telephone_2` varchar(255) NOT NULL,
  `fax_1` varchar(255) NOT NULL,
  `fax_2` varchar(255) NOT NULL,
  `contact_1` varchar(255) NOT NULL,
  `contact_2` varchar(255) NOT NULL,
  `email_1` varchar(255) NOT NULL,
  `email_2` varchar(255) NOT NULL,
  `country` int(11) NOT NULL COMMENT 'country id',
  `remark` text NOT NULL,
  `uen_cr_no` varchar(255) NOT NULL,
  `acc_no` varchar(255) NOT NULL,
  `credit_limit` varchar(255) NOT NULL,
  `term` int(11) NOT NULL COMMENT 'term id',
  `currency` int(11) NOT NULL COMMENT 'currency id',
  `is_bank_ind` int(11) NOT NULL,
  `is_gst_reg` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'user id',
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `last_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_this_curr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `vendor_group`, `full_name`, `short_name`, `address`, `telephone_1`, `telephone_2`, `fax_1`, `fax_2`, `contact_1`, `contact_2`, `email_1`, `email_2`, `country`, `remark`, `uen_cr_no`, `acc_no`, `credit_limit`, `term`, `currency`, `is_bank_ind`, `is_gst_reg`, `user_id`, `date_added`, `last_updated`, `is_this_curr`) VALUES
(1, 0, 'Name 1', 'name', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, '2019-10-06 13:30:27', '2019-10-06 13:30:27', 0),
(2, 0, 'Name 2', 'name2', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, '2019-10-06 13:30:27', '2019-10-06 13:30:27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vendors_group`
--

CREATE TABLE `vendors_group` (
  `id` int(11) NOT NULL,
  `group_id` varchar(255) NOT NULL COMMENT 'short group name',
  `name` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `last_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors_group`
--

INSERT INTO `vendors_group` (`id`, `group_id`, `name`, `date_added`, `last_updated`) VALUES
(2, 'GRP 2', 'group two', '2019-09-29 17:27:31', '2019-09-29 17:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `website_settings`
--

CREATE TABLE `website_settings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `fevicon` varchar(255) NOT NULL,
  `smtp_host` varchar(255) NOT NULL,
  `smtp_port` varchar(255) NOT NULL,
  `smtp_username` varchar(255) NOT NULL,
  `smtp_password` varchar(255) NOT NULL,
  `contact_address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `last_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `website_settings`
--

INSERT INTO `website_settings` (`id`, `name`, `logo`, `fevicon`, `smtp_host`, `smtp_port`, `smtp_username`, `smtp_password`, `contact_address`, `email`, `contact_number`, `last_updated`, `date_added`) VALUES
(1, 'Rahul1', 'logo.png', 'Desert.jpg', 'pp', '100', 'satirahul10@gmail.com', '', 'panaji', 'satirahul10@gmail.com', '08275381650', '2019-10-06 18:00:12', '2019-10-03 11:47:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent_group`
--
ALTER TABLE `agent_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit`
--
ALTER TABLE `credit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_group`
--
ALTER TABLE `customer_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `import_info`
--
ALTER TABLE `import_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `import_ref`
--
ALTER TABLE `import_ref`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `import_shipper`
--
ALTER TABLE `import_shipper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_import_shipper`
--
ALTER TABLE `job_import_shipper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `port`
--
ALTER TABLE `port`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sea_import_job_master`
--
ALTER TABLE `sea_import_job_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sea_import_shipment_master`
--
ALTER TABLE `sea_import_shipment_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_shipment_info`
--
ALTER TABLE `trans_shipment_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors_group`
--
ALTER TABLE `vendors_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_settings`
--
ALTER TABLE `website_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `agent_group`
--
ALTER TABLE `agent_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `credit`
--
ALTER TABLE `credit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_group`
--
ALTER TABLE `customer_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `import_info`
--
ALTER TABLE `import_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `import_ref`
--
ALTER TABLE `import_ref`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `import_shipper`
--
ALTER TABLE `import_shipper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_import_shipper`
--
ALTER TABLE `job_import_shipper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `port`
--
ALTER TABLE `port`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sea_import_job_master`
--
ALTER TABLE `sea_import_job_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sea_import_shipment_master`
--
ALTER TABLE `sea_import_shipment_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trans_shipment_info`
--
ALTER TABLE `trans_shipment_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendors_group`
--
ALTER TABLE `vendors_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `website_settings`
--
ALTER TABLE `website_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
