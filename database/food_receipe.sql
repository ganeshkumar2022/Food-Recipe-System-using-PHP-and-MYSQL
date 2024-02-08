-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2024 at 06:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_receipe`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `reading_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `reading_time`) VALUES
(1, 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2024-02-07 15:21:04');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `cid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Waiting for Approval',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cid`, `name`, `email`, `message`, `recipe_id`, `status`, `created_at`) VALUES
(1, 'swetha', 'swetha@gmail.com', 'your recipe is very helpful to me', 4, 'Approved', '2024-02-08 16:25:42'),
(2, 'samantha', 'samantha@gmail.com', 'hi', 4, 'Rejected', '2024-02-08 16:15:56'),
(3, 'naveen', 'naveen@gmail.com', 'hi this is my message', 7, 'Waiting for Approval', '2024-02-08 17:18:46');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `reading_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`, `reading_time`) VALUES
(1, 'ganesh', 'ganesh@gmail.com', 'this is my subject', 'this is my message', '2024-01-22 01:07:11'),
(2, 'mayas', 'maya@gmail.com', 'mayas subject', 'mayas message', '2024-01-22 01:53:39'),
(3, 'kajal', 'kajal@gmail.com', 'this is my subject', 'this is my message', '2024-01-22 01:56:12'),
(4, 'xcvbn', 'xcvbn@gmail.com', 'this is my subject', 'this is my message', '2024-01-22 01:57:38'),
(5, 'simran', 'simran@gmail.com', 'this is subject', 'this is simran', '2024-01-22 01:59:18'),
(6, 'priyadharshini', 'priyadharshini@gmail.com', 'this is my subject', 'this is my message', '2024-02-08 17:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

CREATE TABLE `ingredient` (
  `in_id` int(11) NOT NULL,
  `ingredient_name` text NOT NULL,
  `recipe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingredient`
--

INSERT INTO `ingredient` (`in_id`, `ingredient_name`, `recipe_id`) VALUES
(76, '500g chicken cut into pieces', 2),
(77, ' 1 cup yogurt', 2),
(78, ' 2 tablespoons ginger-garlic paste', 2),
(79, ' 1 teaspoon chili powder', 2),
(80, ' 1 teaspoon turmeric powder', 2),
(81, ' Salt to taste', 2),
(82, ' Juice of 1 lemon\r\n', 2),
(83, '100g boneless chicken', 4),
(84, ' cut into bite-sized pieces', 4),
(85, '2 tablespoons yogurt', 4),
(86, '1 tablespoon ginger-garlic paste', 4),
(87, '1 teaspoon red chili powder', 4),
(88, '1 teaspoon Kashmiri red chili powder (for color)', 4),
(89, '1/2 teaspoon turmeric powder', 4),
(90, 'Parboiled rice (also known as idli rice or idli rava)', 7),
(91, 'Urad dal (black gram dal)', 7),
(92, 'Fenugreek seeds (optional, but commonly used for fermentation)', 7),
(93, 'Salt', 7),
(94, 'Water', 7),
(95, '1 cup raw rice', 8),
(96, '1 cup parboiled rice (also known as idli rice or idli rava)', 8),
(97, '1/2 cup urad dal (black gram dal)', 8),
(98, '1/4 teaspoon fenugreek seeds', 8),
(99, 'Salt, to taste', 8),
(100, 'Water', 8),
(112, '1 tablespoon semolina (optional', 9),
(113, ' for extra crispiness)', 9),
(114, '1/4 teaspoon salt', 9),
(115, '1 cup whole wheat flour (atta)', 9),
(116, '1/2 cup warm water (adjust as needed)', 9),
(117, 'Oil for deep frying', 9),
(119, '2 cups rice flour', 11),
(120, 'Salt to taste', 11),
(121, 'Oil (for greasing)', 11),
(122, '1 1/2 to 2 cups water', 11);

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `rid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recipe_title` varchar(50) NOT NULL,
  `prepare_time` varchar(50) NOT NULL,
  `cook_time` varchar(50) NOT NULL,
  `yields` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `pictures` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`rid`, `user_id`, `recipe_title`, `prepare_time`, `cook_time`, `yields`, `description`, `pictures`, `created_at`) VALUES
(2, 4, 'Chicken Biriyani', '20', '50', '10', 'Marinate the chicken: In a bowl, mix together yogurt, ginger-garlic paste, turmeric powder, red chili powder, biryani masala powder, and salt. Add the chicken pieces to the marinade, ensuring they are well coated. Let it marinate for at least 1 hour, preferably longer, in the refrigerator.\r\n\r\nCook the rice: In a large pot, bring water to a boil. Add the soaked and drained rice along with bay leaf, cloves, cardamom pods, cinnamon stick, and salt. Cook the rice until it is 70-80% done, about 8-10 minutes. Drain the rice and set aside.\r\n\r\nHeat ghee or oil in a large heavy-bottomed pan or pot. Add the sliced onions and sauté until golden brown.\r\n\r\nAdd the marinated chicken to the pan along with chopped tomatoes and slit green chilies. Cook for 8-10 minutes until the chicken is partially cooked and the tomatoes are soft.\r\n\r\nLayering: Spread half of the cooked rice over the chicken in the pan. Sprinkle half of the chopped mint leaves and cilantro leaves on top of the rice. Repeat the layers with the remaining rice, mint leaves, and cilantro leaves. If using saffron, pour the saffron milk over the top layer of rice.\r\n\r\nCover the pan tightly with a lid and cook on low heat for about 20-25 minutes, until the chicken is cooked through and the rice is fully cooked and aromatic.\r\n\r\nOnce done, gently fluff the biryani with a fork, ensuring the layers remain intact. Garnish with fried onions, if using.\r\n\r\nServe hot with raita (yogurt-based side dish) and salad.\r\n\r\nEnjoy your delicious homemade chicken biryani!', 'foods/chick.jpg', '2024-02-06 14:48:25'),
(4, 4, 'Chicken 65', '10', '40', '2', 'Marinate the chicken: In a bowl, combine chicken pieces with yogurt, ginger-garlic paste, red chili powder, Kashmiri red chili powder, turmeric powder, garam masala powder, lemon juice, and salt. Mix well to coat the chicken pieces evenly. Marinate for at least 30 minutes, or refrigerate for a couple of hours for better flavor.\r\n\r\nPrepare the batter: In another bowl, mix all-purpose flour, cornflour, rice flour (if using), and salt. Gradually add water to make a smooth batter of medium consistency. The batter should coat the back of a spoon.\r\n\r\nHeat vegetable oil for deep frying in a pan or kadhai over medium-high heat.\r\n\r\nDip each marinated chicken piece into the batter, ensuring its well coated, and then carefully drop it into the hot oil. Fry the chicken in batches until golden brown and crispy. Remove and drain excess oil on paper towels.\r\n\r\nIn a separate pan, heat 2 tablespoons of oil for tempering. Add curry leaves, slit green chilies, chopped garlic, and chopped ginger. Sauté for a minute until fragrant.\r\n\r\nAdd thinly sliced onions and saute until they turn translucent.\r\n\r\nStir in red chili powder, tomato ketchup, soy sauce, vinegar, and salt. Mix well.\r\n\r\nAdd the fried chicken pieces to the pan and toss until they are well coated with the sauce.\r\n\r\nGarnish with fresh cilantro leaves and serve hot as an appetizer or snack.\r\n\r\nEnjoy your crispy and flavorful Chicken 65!', 'foods/chicken65.jpg', '2024-02-06 14:48:29'),
(7, 5, 'idly', '30', '50', '3', 'Idli is a popular South Indian dish made from fermented rice and urad dal (black gram dal) batter.', 'foods/Idly_Wada.jpg', '2024-02-06 15:06:03'),
(8, 5, 'Dosai', '20', '30', '2', 'Dosa, also spelled as dosai, is a popular South Indian savory crepe made from fermented rice and lentil batter. Here a basic recipe to make dosa batter and dosas:', 'foods/Dosai.png', '2024-02-06 15:06:10'),
(9, 5, 'Puri', '30', '40', '2', 'Puri, also poori, is a type of deep-fried bread, made from unleavened whole-wheat flour, originated from the Indian subcontinent. Puris are most commonly served as breakfast and snacks', 'foods/poori-masala-1.jpg', '2024-02-06 15:06:15'),
(11, 6, 'Idiyappam', '20', '30', '2', 'Idiyappam, also known as string hopper, indiappa, noolputtu, noolappam, or ottu shavige, is a string hopper dish originating from southern India. It consists of rice flour pressed into noodles, laid into a flat disc-like shape and steamed.', 'foods/idiyappam.jpg', '2024-02-08 15:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` char(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `password`, `created_at`) VALUES
(3, 'ganesh s', 'ganeshs@gmail.com', '8789857887', '$2y$10$hriOPj/34rpNbO90im9Mfen07BMjrb3Q8iVefCXKxiB6lAq4ysPVG', '2024-01-27 01:23:29'),
(4, 'nishithas', 'nishitha@gmail.com', '9878545454', '$2y$10$VzdaHv9XGPsTsSS4JYl1wuo.VkQgDCCNixIe94CpyJN96e89NKCNi', '2024-01-28 04:42:38'),
(5, 'mayas', 'maya@gmail.com', '9789912344', '$2y$10$mjYQzzBzVjaQGao9SBe5e.uNn4ZyLGSWqhqxkCLq4vjPNDzYGj/xm', '2024-02-06 14:49:16'),
(6, 'mahas', 'maha@gmail.com', '8978912345', '$2y$10$CUd/X8Ojqdw6IDQ1bjyXsus6Ixp/tGWdbCZc7ZoBt4obmYksAF39G', '2024-02-08 15:47:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`in_id`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `in_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
