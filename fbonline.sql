-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 09, 2020 at 01:45 AM
-- Server version: 5.6.46-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fbonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `cashout`
--

CREATE TABLE `cashout` (
  `id` int(11) NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `product` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(175) COLLATE utf8_unicode_ci NOT NULL,
  `product` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `unit` int(11) NOT NULL,
  `totalbill` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`) VALUES
(24, 'theresaobamwonyi@gmail.com', '31419bcc96c205a4b94cd30365194fa7304416b5cf9be818da4994f3fb2d47971b05bfc842c45ce5fe0f7878c2692fc634e8'),
(25, 'theresaobamwonyi@gmail.com', '91228d34aeac678239576ce4c6ad3b2dc5deaf55d4918372650abcc4f3ce3cff9c8a8baa9bfa30f25298fc673214803d65dc'),
(26, 'theresaobamwonyi@gmail.com', 'f8ca8e32dda81fbd42a2e1f95ccf60695190c12bad9988ad770aa590200535f9284b5b2248f9d44285d64454e04cdb7e339f'),
(27, 'theresaobamwonyi@gmail.com', 'b77828ebf7f827211dfc78e80312b5604be354c13183d42e929623acac513e2f8b9597140c5daa6fcffdfc00639bb1a33ba7'),
(28, 'theresaobamwonyi@gmail.com', '8f1f11544c6b5c7f23454a4814308bd668c4bbda5141b6e74d867a7f2871f1abc51877ddd661167212f4f0f9e6d981b0689a'),
(29, 'theresaobamwonyi@gmail.com', '8b0128462a2f25c17ef58181a3f1a4551abc9746c30df53d0ef9d41a46007a957746112d5d38afc72327cf2cd6884a23d345'),
(30, 'theresaobamwonyi@gmail.com', 'a23eeba2a1b63a9d1da1182121da46d34e085bb36798136f5f3d924a74229a67b858f8f833eb3b2ea676865d1268f1573fbd'),
(31, 'theresaobamwonyi@gmail.com', '318781dec8868565bdc02659ece53a10a7570dbb7411200e4c8d7c824ebc6bd0b42080b7a4c6cb6af8ba0d1ad83ba4e0cdd1'),
(32, 'ochuko.ikogho@gmail.com', 'c42019172be19dccec1e02b46965a5024649a510333103c51c07839bf4ece2f492367296962b8f3284740fcccdb97014ab40');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `unit` int(11) NOT NULL,
  `totalbill` int(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `token` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `name`, `email`, `product`, `unit`, `totalbill`, `date_created`, `token`) VALUES
(32, 'Jumia', 'fb@gmail.com', '20000', 4, 8000000, '2019-08-08 18:42:20', 1),
(33, 'Theresa Obamwonyi', 'theresaobamwonyi@gmail.com', '10000', 2, 2000000, '2019-08-08 18:42:20', 1),
(61, 'Theresa Obamwonyi', 'theresaobamwonyi@gmail.com', '15000', 3, 4500000, '2019-09-06 13:06:00', 1),
(62, 'Theresa Obamwonyi', 'theresaobamwonyi@gmail.com', '10000', 15, 15000000, '2019-09-06 21:28:03', 1),
(63, 'Theresa Obamwonyi', 'theresaobamwonyi@gmail.com', '7500', 12, 9000000, '2019-09-06 21:46:39', 1),
(64, 'ast', 'ast@gmail.com', '15000', 4, 6000000, '2019-09-07 15:58:17', 0),
(65, 'teq', 'teq@gmail.com', '7500', 8, 6000000, '2019-09-18 09:43:57', 0),
(66, 'teq', 'teq@gmail.com', '15000', 2, 3000000, '2019-09-19 09:38:06', 0),
(67, 'Ochuko Ikogho', 'ochuko.ikogho@gmail.com', '15000', 5, 7500000, '2019-09-21 02:47:25', 0),
(68, 'Abacus', 'ab@gmail.com', '15000', 6, 9000000, '2019-09-21 02:49:06', 0),
(69, 'Jumia Kings', 'jk@gmail.com', '15000', 4, 6000000, '2019-09-23 10:28:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `signupform`
--

CREATE TABLE `signupform` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `signupform`
--

INSERT INTO `signupform` (`id`, `name`, `email`, `password`, `token`) VALUES
(99, 'Temi Friday', 'tfri@gmail.com', '$2y$10$55n7rbVJGh6pX7cV/S6LqumFa5hJVvmzTDYntSc6mIFrRwopCRAPa', ''),
(100, 'Emma King', 'mking@gmail.com', '$2y$10$b9pzkGYPNU3qmuTTpiYFkO11YTzug96BmUc.LpZLA5hf.k8aFvZG2', ''),
(101, 'Ochuko Ikogho', 'ochuko.ikogho@gmail.com', '$2y$10$hA5yoSzCfp4NbV1boo235eVZNhswBdzKDnusHSGJK29y2/6ZYPJI2', '3b3b1e343e9fe9d2768b4bd9ce7c8392c1059608818cd5f9040be069c5c5f8a838c4c717e652c54e43b9b9ff62128a262ff5'),
(102, 'Test', 'test@gmail.com', '$2y$10$/VdFZ579isFO7YcNa8xxnOxL4urzdTES99dMkGY51ITIXWAqR8XqW', ''),
(103, 'Jumia', 'fb@gmail.com', '$2y$10$AndEDJ.LZPzYNlj/kYOhHu4luEfk4kdW1ULylKLrekOG9rGKYCn2G', ''),
(104, 'O', 'o@gmail.com', '$2y$10$RVXqblb5xtr9dI6c3xgXGu.E5e4E2/f1WBJq5utIBqfknmRdMWl3a', ''),
(105, 'Tester', 't@gmail.com', '$2y$10$iczB8Ay.wqzlTJYbFtyWNOifODoVwLDBM5R1xPtnWTafHCz7aV/aK', ''),
(106, 'teq', 'teq@gmail.com', '$2y$10$W6UpN0/sdW7/pM2IyxWNS.RrTzaXrC4EYBtdp6kC2RUNDS4xhnp32', ''),
(107, 'Theresa Obamwonyi', 'theresaobamwonyi@gmail.com', '$2y$10$WNl2cYh099db2SmyzDEtx.MmOWH9VaG6jjdgJ2kaUrUh/uXOLcd5u', ''),
(108, 'Ochu', 'oi@gmail.com', '$2y$10$n9c7MnC6iLscvD8kachNTOB9GI8mY0UcF.tA5swLawaZRQxxrl6pa', ''),
(109, 'dddd', 'dd@gmail.com', '$2y$10$H8MISUSr.Tg67Qr65TzZw.ozGkVdp8D10xH1Xjttp3NCOsIXd.P1q', ''),
(110, 'Qwerty', 'q@gmail.com', '$2y$10$0oM/4E/oBv4GnLIXUrTCYO9kOdCB88iF.ioRpynGsJA1Th4wRiK2y', ''),
(111, 'Rrr', 'teqw@gmail.com', '$2y$10$9fvQMBbDzoLGGx./QXhscONdqzWvEg/uf8aVhJAjzSgA6UKTChkTS', ''),
(112, 'ddddddd', 'dxx@gmail.com', '$2y$10$KHgEgZyDd3nJjXXIgiq83ecOEAOPn4GP.N6YtJGTgNRHwPhGQrYB.', ''),
(113, 'ast', 'ast@gmail.com', '$2y$10$IlKzl31lkmKZ/nQ4zjNtQ.R/oZ0t91ILTEOIBq9pASrYcndnsh8Da', ''),
(115, 'Abacus', 'ab@gmail.com', '$2y$10$puA/7ZTDebXmyeX6SAusEODNQoZT51spMZ/j0wK8ijEu44XkwqEG.', ''),
(116, 'Jumia Kings', 'jk@gmail.com', '$2y$10$uFGvhPiISF8pSwmTaN99o.ecP48LNrz.q6NO0mYeorwWXuSFe9Wey', ''),
(117, 'Alvinmip', 'inbox256@glmux.com', '$2y$10$VQEoL90YAjnbwwrd.2aa2uuBoHI5H0JL6pdTkh4pwn15ev8b5vdd6', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`) VALUES
(4, 'teq', 'teq@gmail.com', './img/users-img/932720190803_184137.jpg'),
(5, 'teq', 'teq@gmail.com', './img/users-img/2578adeolu-eletu-omKdUQ9R3Zo-unsplash.jpg'),
(6, 'Theresa Obamwonyi', 'theresaobamwonyi@gmail.com', './img/users-img/63992578adeolu-eletu-omKdUQ9R3Zo-unsplash.jpg'),
(7, 'Theresa Obamwonyi', 'theresaobamwonyi@gmail.com', './img/users-img/9274sh4.jpg'),
(8, 'Theresa Obamwonyi', 'theresaobamwonyi@gmail.com', './img/users-img/2183IMG_20190916_121751_4.jpg'),
(9, 'Theresa Obamwonyi', 'theresaobamwonyi@gmail.com', './img/users-img/8655Screenshot_20190907-174305.png'),
(10, 'Theresa Obamwonyi', 'theresaobamwonyi@gmail.com', './img/users-img/26932578adeolu-eletu-omKdUQ9R3Zo-unsplash.jpg'),
(11, 'teq', 'teq@gmail.com', './img/users-img/3041ovayo-ntlabati-f_WTk4JqwiM-unsplash.jpg'),
(12, 'teq', 'teq@gmail.com', './img/users-img/7749photo-1528791067602-aee628b626fb.jpeg'),
(13, 'Ochuko Ikogho', 'ochuko.ikogho@gmail.com', './img/users-img/6505swish.jpg'),
(14, 'Ochuko Ikogho', 'ochuko.ikogho@gmail.com', './img/users-img/1823IMG-20190920-WA0013.jpg'),
(15, 'Ochuko Ikogho', 'ochuko.ikogho@gmail.com', './img/users-img/6837christian-smith-v78IqB4bysc-unsplash.jpg'),
(16, 'Abacus', 'ab@gmail.com', './img/users-img/8653IMG-20190920-WA0004.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cashout`
--
ALTER TABLE `cashout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signupform`
--
ALTER TABLE `signupform`
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
-- AUTO_INCREMENT for table `cashout`
--
ALTER TABLE `cashout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `signupform`
--
ALTER TABLE `signupform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
