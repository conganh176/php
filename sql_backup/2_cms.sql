-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 10, 2021 at 03:37 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

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
(6, 1, 'Lomo', 'lomo@mail.com', 'lomo', 'approved', '2021-01-27'),
(9, 3, 'Hatto', 'hatto@mail.com', 'haachama chama', 'not_approved', '2021-01-27'),
(10, 8, 'asd', 'zxc', 'qwe', 'not_approved', '2021-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `online`
--

CREATE TABLE `online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `online`
--

INSERT INTO `online` (`id`, `session`, `time`) VALUES
(1, 'tudbsh3ndff495567pcdevp06d', 1612387121),
(2, '6konpa5bfiggm9b3rbcoacds7q', 1612386113),
(3, 'a7r70v4lk376ohrcuq97bue53g', 1612685824);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(3) NOT NULL,
  `category_id` int(3) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `image` text NOT NULL,
  `content` text NOT NULL,
  `tags` varchar(255) NOT NULL,
  `comment_count` int(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'draft',
  `views` int(16) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `title`, `author`, `user`, `date`, `image`, `content`, `tags`, `comment_count`, `status`, `views`) VALUES
(1, 4, 'Hello World', 'John Smith', '', '2021-01-19', 'demo.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam est ligula, varius finibus vestibulum quis, gravida eget lectus. Donec et ex sed dui iaculis accumsan. Nullam sit amet rhoncus massa. Praesent pulvinar massa quis lorem consequat, at ultrices felis venenatis. Etiam volutpat posuere lobortis. Cras et dapibus purus, vitae eleifend nisi. Nunc hendrerit sed est a lobortis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Donec lacinia dui mauris, nec pharetra urna varius nec. Pellentesque vitae justo eget lorem varius maximus convallis a nisi. In blandit ligula non nulla euismod auctor. Morbi sed orci at urna suscipit condimentum sit amet in ligula. Proin porta porta quam, eget rutrum sem dictum at. Proin arcu felis, efficitur sit amet quam vel, tristique posuere nisl.                        ', 'john, smith, javascript', 3, 'published', 4),
(4, 1, 'Other stuffs 2', 'Big Sur', '', '2021-01-26', 'w6hb4pwm0fz31.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nisi tellus, pulvinar a lacinia ut, bibendum sit amet ipsum. Etiam id rhoncus lectus. In tempor sollicitudin faucibus. Nam tempus odio at hendrerit ultricies. Mauris accumsan mi at tincidunt faucibus. Vestibulum dui leo, dictum eget congue at, vehicula nec arcu. In arcu urna, pharetra at libero sed, gravida tincidunt metus. Maecenas eu sodales orci. Sed dui diam, accumsan sed magna vitae, condimentum ultrices orci.</p>', 'others, stuff', 0, 'published', 0),
(5, 11, 'Damn World', 'Joe Mama', '', '2021-02-02', 'palm tree.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dapibus mauris sed mi interdum, sit amet rhoncus nisl sollicitudin. Cras a massa eu lorem ultrices accumsan et ut tortor. Etiam aliquet sed erat commodo sollicitudin. Curabitur mollis erat felis, tincidunt aliquam metus sagittis a. Nulla congue ante non ex sagittis lobortis. In fringilla neque ut venenatis porttitor. Vivamus tincidunt nunc ut sapien tincidunt, quis ultrices nisl ultrices. In nec nisi auctor libero hendrerit euismod sit amet et dui. Integer eu tortor sagittis, lacinia risus non, facilisis ipsum. Suspendisse commodo, neque et placerat hendrerit, turpis sapien dapibus augue, ac scelerisque nisi dolor et justo. Nunc porta ultricies mollis. Nullam rhoncus porta lorem ut vehicula. Vestibulum fermentum magna cursus pretium consequat.</p>', 'oop, joe, mama, damn, world', 0, 'draft', 0),
(7, 1, 'LOL', 'Barbossa', '', '2021-02-02', 'duck.jpg', '<p>Morbi fringilla congue risus, faucibus aliquam nisi imperdiet eu. Duis sed orci quam. Phasellus in venenatis enim, et consectetur lectus. Vestibulum scelerisque lorem lectus, et facilisis nisi iaculis eu. Sed ultricies vestibulum magna non ullamcorper. Donec aliquam congue orci, sed commodo nulla commodo ut. Sed non nulla porta risus accumsan cursus. Pellentesque viverra elit nec sapien varius, eu gravida lectus auctor. Cras vestibulum justo vel placerat porta.</p>', 'lol, oop', 0, 'published', 0),
(8, 1, 'Hannah', 'Barbossa', '', '2021-02-02', 'dirt bike.jpg', '<p>Praesent ligula sapien, dapibus vitae egestas non, auctor ut eros. In efficitur volutpat blandit. Duis ex elit, blandit sed faucibus ac, pretium semper eros. Maecenas eget nisl in mauris ornare euismod nec pretium turpis. Integer quis risus massa. Donec fringilla est a sodales sollicitudin. Suspendisse potenti. Nunc libero odio, varius eget viverra iaculis, feugiat sit amet libero. Proin sed orci vel velit mattis iaculis.</p>', 'hannah, java', 1, 'published', 1),
(9, 13, 'Testing', 'Polo', '', '2021-02-02', 'airplane.jpg', '<p>Nulla ornare, urna eu fringilla commodo, enim diam faucibus sapien, quis blandit nisl erat eleifend purus. Vestibulum bibendum eget ligula ac pretium. Pellentesque in laoreet tortor, at euismod mauris. Donec congue malesuada maximus. Praesent venenatis ex purus, vitae condimentum leo tincidunt vitae. Phasellus bibendum maximus porta. Nunc pretium cursus neque dignissim fringilla. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec tincidunt viverra dui sed cursus. Aliquam nec ultrices orci. Nulla aliquam laoreet velit vitae malesuada.</p>', 'get', 0, 'draft', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL DEFAULT '',
  `lastname` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL,
  `image` text NOT NULL DEFAULT '',
  `role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$twentytwocharacterslol'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `image`, `role`, `randSalt`) VALUES
(1, 'john', '$2y$10$twentytwocharactersloeCm7bvtPOjy/xVuVZr0KUFmwbWeyv5o.', 'John Junior', 'Smith', 'john@mail.com', '', 'admin', '$2y$10$twentytwocharacterslol'),
(2, 'tomcat', 'tomcat', 'Tom', 'Cat', 'tomcat@mail.com', '', 'subscriber', '$2y$10$twentytwocharacterslol'),
(4, 'jerrymouse', 'jerrymouse', 'Jerry', 'Moust', 'jerrymouse@mail.com', '', 'subscriber', '$2y$10$twentytwocharacterslol'),
(5, 'asd', '$2y$10$twentytwocharactersloenmUMfz0rgxGkFJo1Bf8B.yjkvOwbqgq', '', '', 'asd@mail.com', '', 'subscriber', '$2y$10$twentytwocharacterslol'),
(6, 'joemama', '$2y$10$twentytwocharactersloeeEX/jPJEHMyVYruBplMHtDhFaMfS0qK', '', '', 'joemama@mail.com', '', 'admin', '$2y$10$twentytwocharacterslol'),
(7, 'JoeJoe', '$2y$10$twentytwocharactersloeOsHdoPJ2JvKuK646Scl5vgDldOxRaJu', '', '', 'joejoe@mail.com', '', 'subscriber', '$2y$10$twentytwocharacterslol'),
(9, 'joesmith', '$2y$12$NzjHlPodwPTSU.unTFOhMekPeS2s61ifGc.lhlMJVWE8LWrKED4uG', '', '', 'joesmith@mail.com', '', 'admin', '$2y$10$twentytwocharacterslol'),
(10, 'newadmin', '$2y$12$uNrYZqGpcBgJpiKjMYRciOXX3CIgdyTwYQEuZ36mdC6EDkYXL6zVG', 'Admin', 'New', 'newadmin@mail.com', '', 'admin', '');

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
-- Indexes for table `online`
--
ALTER TABLE `online`
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
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `online`
--
ALTER TABLE `online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
