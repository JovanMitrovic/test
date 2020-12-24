SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `test_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `test_db`;

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `message` varchar(255) CHARACTER SET utf8 NOT NULL,
  `comment_sender_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `comment_sender_email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `approve` enum('y','n') CHARACTER SET utf8 NOT NULL DEFAULT 'n',
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `comments` (`id`, `message`, `comment_sender_name`, `comment_sender_email`, `approve`, `time`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas velit dolor, feugiat nec lacus non, gravida ornare sem. Sed sagittis ultrices libero sit amet ultricies. Nunc dictum, quam quis blandit lacinia, libero felis dignissim odio, vel facilisis m', 'Jovan Mitrovic', 'jovan.mitrovic92@hotmail.com', 'y', 1608769614),
(2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas velit dolor, feugiat nec lacus non, gravida ornare sem. Sed sagittis ultrices libero sit amet ultricies. Nunc dictum, quam quis blandit lacinia, libero felis dignissim odio, vel facilisis m', 'Goran Vesic', 'goran.vesic@yahoo.com', 'y', 1608769641),
(4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas velit dolor, feugiat nec lacus non, gravida ornare sem. Sed sagittis ultrices libero sit amet ultricies. Nunc dictum, quam quis blandit lacinia, libero felis dignissim odio, vel facilisis m', 'test', 'test@test.com', 'y', 1608769662),
(5, 'Leegendarno!!!', 'Milan', 'stojan@gmail.com', 'y', 1608769744),
(6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas velit dolor, feugiat nec lacus non, gravida ornare sem. Sed sagittis ultrices libero sit amet ultricies. Nunc dictum, quam quis blandit lacinia, libero felis dignissim odio, vel facilisis m', 'Jovan Mitrovic', 'jovan.mitrovic92@hotmail.com', 'y', 1608769767),
(7, 'OVO SE NE PRIKAZUJE!!', 'test', 'test@test.com', 'n', 1608769800),
(11, 'fdsfdsfdfsd', 'user', 'jovan.mitrovic92@hotmail.com', 'y', 1608769881),
(12, 'gfdgfdgfgd', 'Jovan Mitrovic', 'jovan.mitrovic92@hotmail.com', 'y', 1608769927),
(13, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas velit dolor, feugiat nec lacus non, gravida ornare sem. Sed sagittis ultrices libero sit amet ultricies. Nunc dictum, quam quis blandit lacinia, libero felis dignissim odio, vel facilisis m', 'Jovan Mitrovic', 'jovan.mitrovic92@hotmail.com', 'y', 1608769940);

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `image` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `products` (`id`, `name`, `description`, `image`) VALUES
(1, 'Orange', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas velit dolor, feugiat nec lacus non, gravida ornare sem. Sed sagittis ultrices libero sit amet ultricies. Nunc dictum, quam quis blandit lacinia, libero felis dignissim odio, vel facilisis m', 'orange1608768196.jpg'),
(3, 'Citrus aurantiifolia', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'Limeta-Citrus1608768445.jpg'),
(4, 'Citrus clementina', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'clementina1608768547.jpg'),
(5, 'Mandarin Orange', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'Mandarin 1608768629.jpg'),
(6, 'Grapefruit', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'Grapefruit1608768675.jpg'),
(7, 'Meyer Lemon', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'Lemon1608768730.jpg'),
(8, 'Kaffir Lime', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'kaffir-lime-seeds-citrus-hystrix1608768783.jpg'),
(9, 'Kumquat', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas velit dolor, feugiat nec lacus non, gravida ornare sem. Sed sagittis ultrices libero sit amet ultricies. Nunc dictum, quam quis blandit lacinia, libero felis dignissim odio, vel facilisis m', 'Kumquat1608768845.jpg'),
(10, 'Persian Lime', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'Limette1608768898.jpg'),
(11, 'Pomelo', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'pomelo1608768963.jpg'),
(12, 'Yuzu', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'Yuzu1608769036.jpg'),
(13, 'Finger Lime', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'inger-lime-rooted-cutting1608769146.jpg');

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `fullName`, `email`, `password`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$tQ.e6bUuoqSRtKlmzh2LfOK.KBpbbcjVhuRSwlKIGgbim5ei081L2');

ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
