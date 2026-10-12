CREATE TABLE `game_accounts` (
  `AccID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `GameName` varchar(50) NOT NULL,
  `ServerRegion` varchar(20) NOT NULL,
  `AccountLevel` int(3) NOT NULL,
  `Characters` text NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Status` enum('AVAILABLE', 'SOLD') NOT NULL DEFAULT 'AVAILABLE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `game_accounts` (`GameName`, `ServerRegion`, `AccountLevel`, `Characters`, `Price`) VALUES
('Genshin Impact', 'Asia', 60, 'C6 Furina, C2 Raiden, Yelan + ธนูประจำตัว', 8500.00),
('Honkai: Star Rail', 'Asia', 70, 'E2 Acheron, Firefly, Ruan Mei ครบทีม', 5000.00),
('Blue Archive', 'Global', 85, 'Mika, S.Hoshino, Wakamo (UE50 ทั้งหมด)', 3200.00),
('Epic Seven', 'Global', 70, 'ML Luna, ML Yufine, สปีดสูงสุด 300', 4500.00);