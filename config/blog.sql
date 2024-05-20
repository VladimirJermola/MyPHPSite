-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 08, 2024 at 07:14 PM
-- Server version: 8.0.36-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogs`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int NOT NULL,
  `name` varchar(127) COLLATE utf8mb4_general_ci NOT NULL,
  `text` text COLLATE utf8mb4_general_ci NOT NULL,
  `picture` text COLLATE utf8mb4_general_ci NOT NULL,
  `added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `name`, `text`, `picture`, `added`) VALUES
(1, 'Rapla Maarja-Magdaleena kirik', 'Rapla kirik on ainuke kahe torniga maakirik Eestis. Praegune 1901. a. pühitsetud uusroomaani stiilis hoone on valminud baltisaksa arhitekti Rudolf von Engelhardti projekti järgi ja on selle stiili ehedamaid näiteid Eestis. Huvitav teada: *Kantsel ja altar on valminud Christian Ackermanni ja Quirinnius Rabe töökodades. *Rapla kirikust sai alguse Rapla Kirikumuusika Festival. *Kirikus saad kuulda Eesti tuntud orelimeistrite vendade Kriisade orelit. *Paekivist hoone mahutab 3000 inimest. *Kirikuaias näed 17. saj pärinevaid rõngasriste ja Eesti skulptor Jaan Koorti kavandatud Vabadussõja monumenti.', 'https://i0.wp.com/visitraplamaa.ee/wp-content/uploads/4b8f8955d620875c3c6e4ccad5ff0b12.jpg', '2024-04-25 18:19:57'),
(2, 'Paldiski loojang', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A officiis maiores aut ipsum, libero fuga nesciunt, temporibus, ducimus magnam officia hic vero harum deserunt iste cumque sequi! Sed, libero quisquam.        Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio, ad omnis ipsam possimus sapiente et repudiandae cumque perspiciatis aperiam molestias iste! Laboriosam fuga veniam et adipisci, accusantium facere consequatur maiores.', 'img/Raba.JPG', '2024-04-25 18:21:44'),
(3, 'Narva Jõesuu', 'Narva-Jõesuu on kuulus ainulaadse looduskeskkonna poolest. Omapärase männimetsaga ääristatud peene liivaga Narva-Jõesuu rand on Eesti üks pikimaid mererandasid, kulgedes 9,5 km ulatuses mööda Soome lahe lõunakallast. Mööda mereranda kulgeva puidust rannapromenaadi äärde jäävad ka istumiskohad ning osad neist lõkkekohtadega.  Vetelpäästega rannas on rannavolleplats, atraktsioonid lastele, riietuskabiinid ja välidušš.', 'https://static.visitestonia.com/images/3969659/Narva-Jõesuu+beach_rannajoon2+ida-virumaa+Priidu+Saart%282%29_.jpg', '2024-04-25 15:27:27'),
(11, 'Silver Kass', 'Veel', 'img/Admiral.JPG', '2024-04-28 14:39:37'),
(12, 'Vladimir', 'Admiral', 'img/Admiral.JPG', '2024-04-28 14:42:25'),
(15, 'Pärnu Tallinn gate', 'Tallinn gate is the only surviving 17th century gate with an embankment in the Baltic Countries; until 1710, it was known as Carl Gustav (the King\'s) Gate. From the gate, a bridge led across the trench to a postal road to Tallinn.', 'https://cdn.getyourguide.com/img/tour/fdc9587a9bebfef557f01c67d51ab896270ba6d6812d208858fc64d88417f3de.jpg/145.jpg', '2024-04-28 14:48:53'),
(16, 'Pärnu rand', 'Pärnu rand asub kesklinnast vaid veerandtunnise jalutuskäigu kaugusel. Tänu madalaveelisele ning kiiresti soojenevale lahele on Pärnu rand suurepärane supluskoht. Soojadel suvepäevadel võib veetemperatuur Pärnu rannas tõusta isegi kuni 30 kraadini.', 'https://visitparnu.com/wp-content/uploads/2023/01/Parnu-rand.jpg', '2024-04-28 14:50:54'),
(18, 'Tartu Ahhaa keskus', 'Tahad end üllatada? Teaduskeskus AHHAA pakub nii teadust, põnevaid tegevusi, seiklusi kui ka mõnusat ajaviidet lastele ja täiskasvanutele. Meie keskusest leiad atraktiivse õpikeskkonna ning omandad uusi teadmisi.  Kõik näitused on üles ehitatud \"käed-külge\"-meetodil, see tähendab, et sul on võimalus kõike ise tunnetada ja proovida. Olgu selleks siis planetaarium, koolilabori õppematerjalide loomine, põnevad tehnikaseadmed või teadusteater.  Tule veeda meiega üks eriti lõbus ja hariv päev! Lisaks saad AHHAAs ka enda sünnipäeva tähistada.', 'https://media-cdn.tripadvisor.com/media/photo-s/1b/d3/13/88/ahhaa-science-centre.jpg', '2024-04-28 18:26:35'),
(19, 'Viljandi kirik', 'When the town of Viljandi started to grow in the middle of the 19th century the only church in town became too small for the people. The Viljandi estate owner baron Ungern-Stenberg gave the community a part of his estate as building ground for the church. Interesting to know: · The architect of the sanctuary that was consecrated in 1866 was Matthias von Holst. · During the construction of the building so called Tudor Gothic elements were used as they were fashionable at that time. · The author of the altar painting \"Christ on the Cross\" is Karl Christian Andreae. · Since 1866 a G. Knauf organ fills the church with music, the biggest still functional organ of its kind in Estonia.', 'https://static.visitestonia.com/images/3894328/600_400_false_false_31307415d99ca6a6c6e182a47de9f408.jpg', '2024-04-28 18:36:32'),
(21, 'Rakvere linnus', 'Rakveres asuv linnus pakub kogu perele palju põnevat!  Linnusesse tulles satud 16. sajandi linnuse elu-olu kujutavasse teemaparki, kus nii väikesed kui suured saavad veeta põneva päeva, kehastuda ümber rüütliteks ja sõjameesteks, lahutada meelt ning õppida ühtteist kesk- ja varauusaegsete inimeste elu kohta.  Avatud on ka piinakamber, surmatuba ja põrgu, Punaste laternate tänav, keskaegne pordumaja, habemeajaja töötuba ning alkeemiku töötuba!  Linnuses asuv Schenkenbergi kõrts pakub keskaegsete retseptide järgi valmistatud toite! Avatud on ka väliköök!', 'https://static.visitestonia.com/images/3707720/600_400_false_false_fe804698ee057c0cb300e05c25e44673.jpg', '2024-04-28 18:57:45'),
(22, 'Otepä', 'Otepää is Estonia\'s top destination for winter sports. Estonians love active outdoor holidays, especially in the winter when the options are endless. South Estonia\'s natural environment — rolling hills, deep green forests, and picturesque lakes — offer the perfect backdrop for skiing, kick sledging, hiking, and ice skating. ', 'https://f10.pmo.ee/jOh8LpIlJTDEfvuWbqIADy60qQc=/1442x0/filters:focal(2574x1223:3110x1653)/nginx/o/2024/04/28/16035379t1h9398.jpg', '2024-04-28 18:59:55'),
(23, 'Pärnu punane torn', 'Algselt oli torn neljakorruseline kuuemeetrine maa-alune korrusega. 1780. aastal ehitati see ümber ja sellest sai kolmekorruseline hoone. Sellisel kujul on see säilinud tänapäevani.  Aastatel 1893–1908 asus tornis linna arhiiv. Edaspidi oli torni määratus mitmesugune. Aastatel 1973-1980 hoone restaureeriti.  Alates 2015. aastast Punane torn on Pärnu Muuseumi üks osa. Ekspositsioon asub torni esimesel ja teisel korrusel. Ta tutvustab linna keskaegset ajalugu. Panoraamkinos näidatakse 10-minutilist animafilmi „Armutu ja armulik ajalugu. Punases tornis läbi 15 000 aasta“.', 'https://muuseumikaart.ee/wp-content/uploads/2023/01/Punane-torn_vaade-kirdest_Autor-Marie-Rosalie-Hanni-1-1320x880.jpg', '2024-05-02 19:13:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
