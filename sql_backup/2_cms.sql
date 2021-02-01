-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 01, 2021 at 11:19 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(3) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'Bootstrap'),
(2, 'Javascript'),
(3, 'PHP'),
(4, 'JAVA'),
(5, 'Python'),
(9, 'C'),
(10, 'C++'),
(11, 'OOP'),
(13, 'GET');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(8) NOT NULL,
  `post_id` int(3) NOT NULL,
  `author` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `email`, `content`, `status`, `date`) VALUES
(2, 1, 'Thomas', 'tom@mail.com', 'lol', 'approved', '2021-01-27'),
(3, 3, 'Ed', 'ed@mail.com', 'Haha', 'not_approved', '2021-01-27'),
(4, 1, 'John', 'johnsmith@mail.com', 'lmao', 'approved', '2021-01-27'),
(5, 1, 'Sum Big', 'sum@mail.com', 'noob', 'not_approved', '2021-01-27'),
(6, 1, 'Lomo', 'lomo@mail.com', 'lomo', 'not_approved', '2021-01-27'),
(9, 3, 'Hatto', 'hatto@mail.com', 'haachama chama', 'not_approved', '2021-01-27');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(3) NOT NULL,
  `category_id` int(3) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `image` text NOT NULL,
  `content` text NOT NULL,
  `tags` varchar(255) NOT NULL,
  `comment_count` int(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `title`, `author`, `date`, `image`, `content`, `tags`, `comment_count`, `status`) VALUES
(1, 4, 'Hello World', 'John Smith', '2021-01-19', 'demo.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam est ligula, varius finibus vestibulum quis, gravida eget lectus. Donec et ex sed dui iaculis accumsan. Nullam sit amet rhoncus massa. Praesent pulvinar massa quis lorem consequat, at ultrices felis venenatis. Etiam volutpat posuere lobortis. Cras et dapibus purus, vitae eleifend nisi. Nunc hendrerit sed est a lobortis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Donec lacinia dui mauris, nec pharetra urna varius nec. Pellentesque vitae justo eget lorem varius maximus convallis a nisi. In blandit ligula non nulla euismod auctor. Morbi sed orci at urna suscipit condimentum sit amet in ligula. Proin porta porta quam, eget rutrum sem dictum at. Proin arcu felis, efficitur sit amet quam vel, tristique posuere nisl.                        ', 'john, smith, javascript', 4, 'published'),
(3, 1, 'New Hello World', 'Sum Big', '2021-01-26', '7kQVq8ZXRdmUYeqZ0dfz_bliss.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam quis arcu odio. Cras sed felis vel felis tristique pretium in vel felis. Suspendisse sodales lorem semper neque malesuada, eget facilisis metus sagittis. Donec ullamcorper fringilla leo, non placerat risus luctus at. Nulla lacus felis, pharetra ac tortor eu, semper rutrum tortor. Donec sodales eu sem id cursus. Vivamus in finibus velit. Nullam vel volutpat sapien.        ', 'hello, world, new', 2, 'draft'),
(4, 1, 'Other stuffs 2', 'Big Sur', '2021-01-26', 'w6hb4pwm0fz31.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nisi tellus, pulvinar a lacinia ut, bibendum sit amet ipsum. Etiam id rhoncus lectus. In tempor sollicitudin faucibus. Nam tempus odio at hendrerit ultricies. Mauris accumsan mi at tincidunt faucibus. Vestibulum dui leo, dictum eget congue at, vehicula nec arcu. In arcu urna, pharetra at libero sed, gravida tincidunt metus. Maecenas eu sodales orci. Sed dui diam, accumsan sed magna vitae, condimentum ultrices orci.</p>', 'others, stuff', 0, 'published');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `image`, `role`, `randSalt`) VALUES
(1, 'john', 'johnsmith', 'John Junior', 'Smith', 'john@mail.com', '', 'admin', ''),
(2, 'tomcat', 'tomcat', 'Tom', 'Cat', 'tomcat@mail.com', '', 'subscriber', ''),
(4, 'jerrymouse', 'jerrymouse', 'Jerry', 'Moust', 'jerrymouse@mail.com', '', 'subscriber', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
