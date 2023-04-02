DROP TABLE kategorije;

CREATE TABLE `kategorije` (
  `kategorijaID` int(11) NOT NULL AUTO_INCREMENT,
  `nazivKategorije` varchar(255) NOT NULL,
  PRIMARY KEY (`kategorijaID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO kategorije VALUES("3", "nesto drugo");INSERT INTO kategorije VALUES("5", "Menagement");INSERT INTO kategorije VALUES("6", "sjeverni pol");INSERT INTO kategorije VALUES("7", "racunovodstvo");INSERT INTO kategorije VALUES("8", "webbb");DROP TABLE konfiguracija;

CREATE TABLE `konfiguracija` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO konfiguracija VALUES("1", "Page number", "5");INSERT INTO konfiguracija VALUES("2", "Cookie time", "3");DROP TABLE osoba;

CREATE TABLE `osoba` (
  `osobaID` int(11) NOT NULL AUTO_INCREMENT,
  `redniBr` int(11) NOT NULL,
  `ime` varchar(255) NOT NULL,
  `prezime` varchar(255) NOT NULL,
  `oib` int(11) NOT NULL,
  `godRod` varchar(255) NOT NULL,
  `strSprema` varchar(255) NOT NULL,
  `godIsk` varchar(255) NOT NULL,
  `katPoslova` varchar(255) NOT NULL,
  `zivotopis` varchar(255) NOT NULL,
  PRIMARY KEY (`osobaID`),
  UNIQUE KEY `redniBr` (`redniBr`),
  UNIQUE KEY `oib` (`oib`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4;

INSERT INTO osoba VALUES("86", "1", "ante", "antic", "242132", "19.11.2000", "vss", "2", "web", "nesto o anti");INSERT INTO osoba VALUES("87", "2", "ivo", "ivic", "2147483647", "12.21.120", "vss", "3", "menagement", "ovo je moj zivotopis");INSERT INTO osoba VALUES("88", "3", "jure", "juric", "423431532", "21.12.2011", "ss", "4", "racun", "fkaifjeioeghoeige");INSERT INTO osoba VALUES("89", "4", "ana", "anic", "424231432", "4214214", "421412", "4214214", "4214214", "4214124321");DROP TABLE sistemstatistics;

CREATE TABLE `sistemstatistics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `LoginUnix` int(11) DEFAULT NULL,
  `LoginDateTime` datetime DEFAULT NULL,
  `LogoutUnix` int(11) DEFAULT NULL,
  `LogoutDateTime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

INSERT INTO sistemstatistics VALUES("7", "admin", "1674799300", "2023-01-27 07:01:40", "", "");INSERT INTO sistemstatistics VALUES("8", "admin", "1674799484", "2023-01-27 07:04:44", "", "");INSERT INTO sistemstatistics VALUES("9", "admin", "1674800012", "2023-01-27 07:13:32", "", "");INSERT INTO sistemstatistics VALUES("10", "admin", "1674827733", "2023-01-27 14:55:33", "", "");INSERT INTO sistemstatistics VALUES("11", "admin", "1674828097", "2023-01-27 15:01:37", "", "");INSERT INTO sistemstatistics VALUES("12", "admin", "1674828132", "2023-01-27 15:02:12", "", "");INSERT INTO sistemstatistics VALUES("13", "admin", "1674828169", "2023-01-27 15:02:49", "", "");INSERT INTO sistemstatistics VALUES("14", "admin", "1674828475", "2023-01-27 15:07:55", "", "");INSERT INTO sistemstatistics VALUES("15", "admin", "1674828837", "2023-01-27 15:13:57", "", "");INSERT INTO sistemstatistics VALUES("16", "admin", "1674833238", "2023-01-27 16:27:18", "", "");INSERT INTO sistemstatistics VALUES("17", "punn", "1674833666", "2023-01-27 16:34:26", "", "");INSERT INTO sistemstatistics VALUES("18", "admin", "1674833758", "2023-01-27 16:35:58", "", "");INSERT INTO sistemstatistics VALUES("19", "punn", "1674833826", "2023-01-27 16:37:06", "", "");INSERT INTO sistemstatistics VALUES("20", "punn", "1674833832", "2023-01-27 16:37:12", "", "");INSERT INTO sistemstatistics VALUES("21", "admin", "1674833839", "2023-01-27 16:37:19", "", "");INSERT INTO sistemstatistics VALUES("22", "admin", "1674835138", "2023-01-27 16:58:58", "", "");INSERT INTO sistemstatistics VALUES("23", "admin", "1675537468", "2023-02-04 20:04:28", "", "");INSERT INTO sistemstatistics VALUES("24", "admin", "1679509158", "2023-03-22 19:19:18", "", "");INSERT INTO sistemstatistics VALUES("25", "admin", "1680447909", "2023-04-02 17:05:09", "", "");DROP TABLE users;

CREATE TABLE `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(225) NOT NULL,
  `userEmail` varchar(225) NOT NULL,
  `userUid` varchar(225) NOT NULL,
  `userPwd` varchar(225) NOT NULL,
  `dateTime` timestamp NULL DEFAULT current_timestamp(),
  `userStatus` int(11) NOT NULL DEFAULT 1,
  `type` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

INSERT INTO users VALUES("12", "jere", "bjelovuk53@gmail.com", "panda", "$2y$10$z68FEsuanwegUtvsa2TudOIvQZsRV.Q0Bpv5bSI7.zHCwQVEXG6Gu", "2023-01-24 05:56:22", "1", "0");INSERT INTO users VALUES("19", "jerko", "admin@gmail.com", "admin", "$2y$10$JUNnxuHFCKHej2rSn31FgOsuQhT5V8ZsHGod54Orwx3Fdb5Mg4JM2", "2023-01-24 05:56:22", "1", "1");INSERT INTO users VALUES("22", "pun", "abcd@gmai.com", "punn", "$2y$10$lslflU/JYbtCpiq8zdO4AOMdJOxi5w6xgs37291P2HMwTuClvGX8O", "2023-01-24 06:44:42", "0", "0");