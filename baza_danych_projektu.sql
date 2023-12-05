-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2023 at 06:26 PM
-- Wersja serwera: 11.1.2-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `park` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `title`, `park`, `date`, `description`, `user_id`) VALUES
(1, 'Zwiedzanie za pół ceny', 2, '2024-07-12', 'W związku z trwającymi wakacjami, chcemy zachęcić do zwiedzenia naszego parku. Z tej okazji obniżamy ceny o połowę. Serdecznie zapraszamy!', 3),
(2, 'Przywitanie nowego zwierzaka', 9, '2024-05-20', 'Do naszego Rezerwatu zostanie przywieziony Orzeł. Zachęcamy wszystkich do przybycia i poszukania tego cudownego stworzenia', 2),
(3, 'Spotkanie z kulturą', 4, '2023-11-24', 'Zapraszamy na cykl spotkań, w których będziemy prezentować słynne dzieła naszych pisarzy.', 3),
(4, 'Przywitanie łabędzi', 5, '2024-03-13', 'Do naszego Rezerwatu jak co rok wracają łabędzie. Zachęcamy do odwiedzenia nas i przywitania tych ptaków, oraz dowiedzenia się trochę na ich temat', 1),
(6, 'Dolina zimą', 12, '2023-12-20', 'Zapraszamy na spacer po dolinie, w której będzie otwarty ogród świateł. ', 3),
(7, 'Sadzenie drzew', 8, '2023-08-08', 'Zapraszamy na akcję charytatywną sadzenia drzew', 1),
(8, 'Zimowy spacer', 10, '2023-12-31', 'W sylwestrową noc zapraszamy na spacer ścieżkami naszego parku, w którym rozdamy sztuczne ognie i razem przywitamy nadchodzący rok', 1),
(9, 'Nowy Rok', 13, '2024-01-01', 'Chodźcie na imprezę noworoczną!!!', 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`) VALUES
(1, 'Warszawa'),
(2, 'Płock'),
(3, 'Nowy Dwór Mazowiecki'),
(4, 'Siedlce'),
(5, 'Radom'),
(6, 'Ostrołęka'),
(7, 'Maków Mazowiecki'),
(8, 'Ciechanów');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `opinie`
--

CREATE TABLE `opinie` (
  `id` int(11) NOT NULL,
  `id_park` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `opinia` text NOT NULL,
  `user` text DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `opinie`
--

INSERT INTO `opinie` (`id`, `id_park`, `id_user`, `opinia`, `user`, `date`) VALUES
(1, 1, NULL, 'Tak bardzo fajny jest ten park', NULL, '2023-11-21 16:19:02'),
(2, 4, NULL, 'Ten trochę też', NULL, '2023-11-21 16:20:04'),
(3, 13, NULL, 'AAAAAAAAAAAA\r\n\r\n\r\nWWWWW', NULL, '2023-11-21 16:20:14'),
(4, 1, 5, 'czy nie powinno być przypadkiem \"kampinoWski\"???', NULL, '2023-12-04 16:18:26');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `park`
--

CREATE TABLE `park` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` int(11) NOT NULL,
  `surface` decimal(10,2) NOT NULL,
  `creation_date` date DEFAULT NULL,
  `attractions` text NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `pet_friendly` int(11) DEFAULT NULL,
  `suitable_for_children` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `park`
--

INSERT INTO `park` (`id`, `name`, `city`, `surface`, `creation_date`, `attractions`, `link`, `pet_friendly`, `suitable_for_children`) VALUES
(1, 'Kampinoski Park Narodowy', 1, 38544.00, '1959-03-09', 'Park ma urozmaicony krajobraz, dominują dwa kontrastujące ze sobą elementy - wydmy i bagna. Przeważającym typem ekosystemu KPN jest ekosystem leśny. Urozmaicona rzeźba terenu parku wraz z mozaiką siedlisk - od bagiennych po skrajnie suche - decyduje o dużym bogactwie szaty roślinnej. Posiada 38 544 hektary zalesionego parku z zabytkami oraz trasami rowerowymi, pieszymi i konnymi.\r\n\r\n', 'https://www.kampinoski-pn.gov.pl', NULL, 1),
(2, 'Chojnowski Park Krajobrazowy', 1, 6796.00, '1993-06-01', 'Park obejmuje obszar 6796 hektarów. Granice Parku mają nieregularny przebieg i otaczają najważniejsze kompleksy leśne (uroczyska: Chojnów, Biele, Łoś, Uwieliny, Łbiska, Pęchery, Obory, Jadwisin i kilka mniejszych) oraz dolinę rzeki Jeziorki.\r\nLeśny szlak przyrodniczy, łowienie pstrągów w rzekach i gniazda bocianów czarnych na terenie rezerwatu przyrody.\r\n\r\nW ofercie leśny szlak przyrodniczy, łowienie pstrągów w rzekach i gniazda bocianów czarnych na terenie rezerwatu przyrody.', 'https://piaseczno.pl/chojnowski-park-krajobrazowy/', 1, 1),
(3, 'Dolina Wkry', 3, 24.37, '1991-08-21', 'Dolina cechuje się unikatowymi walorami przyrodniczymi. Są to zbiorowiska łęgu jesionowo-olszowego z domieszką wiązu szypułkowego i świerka, boru sosnowego, brzozy brodawkowatej i olszy czarnej. Występuje tutaj wiele gatunków ptaków a brzegi zamieszkują chronione ssaki-bóbr i wydra. \r\nPosiada wieżę widokową, z umieszczonymi lornetkami do obserwacji ptaków, łąkę motyli, na którą po pierwsze chcemy „ściągnąć” lokalne motyle, wabiąc je posadzonymi roślinami, które szczególnie lubią, po drugie – stoją trójwymiarowe rzeźby odzwierciedlające motyle w skali 50:1. Znaleźć można też stanowisko edukacyjne obrazujące życie zwierząt kopiących nory, z zaprojektowanym labiryntem, do którego doprowadzą tropy zwierząt, a także pomost widokowy nad nowo powstałą odnogą Wkry. Prawdziwą wisienką na torcie jest możliwość podniebnego spaceru, wśród koron drzew. Na blisko 10 ha zaprojektowano trasy do spacerów, poprowadzone tak, by chronić bogactwo fauny i flory.', 'https://dolinawkry.pomiechowek.pl', 1, 1),
(4, 'Rezerwat przyrody Stawy Broszkowskie', 4, 268.13, '1984-08-01', 'Rezerwat znajduje się w Siedlecko-Węgrowskim Obszarze Chronionego Krajobrazu. Różnorodność biotopów sprawia, że obszar rezerwatu i jego najbliższe okolice stanowią znakomitą bazę żerową i lęgową dla wielu gatunków ptaków. Awifauna reprezentowana jest przez gatunki związane z ekosystemami wodnymi oraz z ekosystemami łąkowymi i leśnymi (podmokłe olsy, wilgotne lasy, niewielkie fragmenty borowe). Na terenie rezerwatu występuje około 100 gatunków ptaków lęgowych i przelotnych, w tym wiele chronionych i rzadkich. Jest to jedno z największych miejsc lęgowych w środkowowschodniej części Polski.', 'https://pl.wikipedia.org/wiki/Rezerwat_przyrody_Stawy_Broszkowskie', NULL, 1),
(5, 'Rezerwat Przyrody Stawy Siedleckie', 4, 242.30, '2008-11-29', 'Faunistyczny rezerwat przyrody o powierzchni 224 ha, utworzony w 2008 r. Swoim zasięgiem obejmuje kompleks 11 stawów oddzielonych groblami. Celem rezerwatu jest ochrona cennego biotopu lęgowego, żerowisk i miejsc odpoczynku rzadkich gatunków ptaków oraz siedlisk rzadkich gatunków roślin chronionych i bezkręgowców.', 'https://pl.wikipedia.org/wiki/Rezerwat_przyrody_Stawy_Siedleckie', NULL, NULL),
(6, 'Kozienicki Park Krajobrazowy', 5, 26233.83, '1983-06-28', 'Walory przyrodnicze terenu stwarzają możliwość rozwoju specjalistycznych form turystyki, organizowania zielonych szkół, obozów badawczych dla dzieci i młodzieży, obozów treningowych dla sportowców. Położenie miasta przy Puszczy Kozienickiej umożliwiło wytyczenie szlaków leśnej turystyki pieszej i rowerowej z licznymi walorami turystyczno-krajobrazowymi. Bogata szata roślinna, niepowtarzalne krajobrazy przyciągają uwagę znawców turystyki. Na terenie miasta jest szlak turystyki pieszej żółty 24 km przez Puszczę Kozienicką.', 'http://www.kozienickipk.com', 1, 1),
(7, 'Park Kościuszki', 5, 7.66, '1867-07-01', 'Park znajduje się w śródmieściu Radomia, naprzeciwko gmachu Urzędu Miejskiego i otoczony jest zwartą zabudową – stanowi enklawę zieleni w centrum miasta.', 'https://pl.wikipedia.org/wiki/Park_im._Tadeusza_Kościuszki_w_Radomiu', 1, 1),
(8, 'Dolina Dolnej Narwii', 6, 26527.92, '2007-10-13', 'Obszar Dolina Dolnej Narwi zlokalizowany jest na terenie Niziny Północnomazowieckiej, pomiędzy Łomżą a Pułtuskiem. Niemal na całym, około 140 km odcinku, rzeka silnie meandruje, charakteryzując się jednocześnie występowaniem licznych wypłyceń, łach oraz starorzeczy.', 'https://pl.wikipedia.org/wiki/Dolina_Dolnej_Narwi', 1, NULL),
(9, 'Rezerwat przyrody Las Bielański', 1, 132.60, '1973-03-10', 'Terasa zalewowy jest najniżej położona, dawniej (przed zbudowaniem wałów przeciwpowodziowych) był to teren bagienny i łąkowy, zalewany okresowo wodami Wisły, obecnie jest porośnięty olszami i lubiącymi wilgoć krzewami. Przez taras zalewowy przepływa rzeczka Rudawka. W drzewostanie poza olszą spotkamy dęby, wiązy szypułkowe, jesion wyniosły, klon jawor i klon zwyczajny. W runie występuje zawilec żółty, ziarnopłon wiosenny, gajowiec żółty i jaskier kosmaty, najbardziej wilgotne miejsca porasta gwiazdnica gajowa.\r\n\r\nStare, często dziuplaste drzewa tworzą dobre warunki do gniazdowania ptaków – naliczono ponad 40 gatunków, pośród nich dzięcioła czarnego. Z ssaków występują sarny, dziki, lisy, zające, wiewiórki, kuny, czasem docierają z Puszczy Kampinoskiej łosie.', 'https://crfop.gdos.gov.pl/CRFOP/widok/viewrezerwatprzyrody.jsf?fop=PL.ZIPOP.1393.RP.295', NULL, 1),
(10, 'Park Sapera', 7, 5.50, NULL, 'Park, powstał na łąkach w starorzeczu rzeki Orzyc. Rzeka stanowi jednocześnie jego zachodnią i południową granicę. Ze względu na położenie, teren parku ze wszystkich stron otoczony jest wałami ziemnymi. Od północy Park ogranicza tranzytowy szlak komunikacyjny (wschód-zachód). Wschodnią granicą jest skarpa tarasu zalewowego z zabudowaniami domów jednorodzinnych. Przy południowo-wschodniej części parku mieści się mogiła ‘Pod górami’ pamiątka po egzekucji wykonanej 1 września 1941 roku przez hitlerowców na 20 mieszkańcach Makowa.', NULL, 1, 1),
(11, 'Rezerwat przyrody Modła', 8, 9.36, '1979-05-15', 'Rezerwat Modła położony jest w Uroczysku Lekowo, w Leśnictwie Lekowo. Obejmuje fragment starodrzewu sosnowo-dębowego oraz niewielki zbiornik wodny o łącznej powierzchni 9,36 ha. Rezerwat został utworzony w kwietniu 1979 roku w celu ochrony starodrzewu sosnowo-dębowego oraz miejsca lęgowego bociana czarnego. Od kilku lat bocian czarny w rezerwacie nie był obserwowany, a gniazdo uległo zniszczeniu. ', 'https://pl.wikipedia.org/wiki/Rezerwat_przyrody_Modła', NULL, 1),
(12, 'Dolina Rzeki Łydyni', 8, 57.63, '2004-05-07', 'Teren ten urozmaicają łąki i niewielkie zagajniki, a także liczne stawy, z których największy zw. Torfami zajmuje około 5ha. Obszar ten to raj dla ornitologów. Zamieszkują tu około 62 gatunki ptaków (min. błotniaki stawowe, myszołowy, mewy śmieszki, bociany, derkacze, kosy, sowy, bażanty, pustułki, różne gatunki kaczek oraz inne), a także ssaki wodne (bobry, wydry). Niedostępność terenu oraz bogata różnorodność roślin stanowi dla tych zwierząt doskonałe warunki do życia.\r\n', 'https://crfop.gdos.gov.pl/CRFOP/widok/viewzespolprzyrodniczokrajobrazowy.jsf?fop=PL.ZIPOP.1393.ZPK.88', 1, 1),
(13, 'Gostynińsko-Włocławski Park Krajobrazowy', 2, 38950.00, '1979-04-05', 'Leśny park krajobrazowy z wydmami śródlądowymi, jeziorami, w których latem można się kąpać, i mokradłami znanymi z ptactwa. Na terenie parku znajduje się wiele obiektów chronionych, np. dąb Jan, którego wiek szacuje się na 300 lat.', 'https://parki.kujawsko-pomorskie.pl/gwpk', 1, 1),
(14, 'Brudzeński Park Krajobrazowy', 2, 3171.00, '1988-06-09', 'Leży na prawym brzegu Wisły na północny zachód od Płocka i obejmuje przyujściowy (dolny) odcinek Skrwy Prawej oraz przylegające do niego kompleksy leśne.\r\nNa terenie Brudzeńskiego Parku Krajobrazowego znajdują się 3 rezerwaty przyrody:\r\n• Rezerwat krajobrazowy „Sikórz” o powierzchni 215,87 ha, obejmujący 12- kilometrowy odcinek doliny Skrwy od miejscowości Sikórz do wsi Radotki ;\r\n• Rezerwat krajobrazowy-leśny „Brwilno” o powierzchni 65,68 ha, położony w południowej części Parku, na wschód od ujścia Skrwy Prawej;\r\n• Rezerwat krajobrazowy „Brudzeńskie Jary” o powierzchni 39,10 ha, obejmuje uroczysko leśne Brudzeń w północnej części Parku.', 'http://brudzen.pl/strona/brudzenski-park-krajobrazowy', 1, 1),
(15, 'Rezerwat przyrody Dąbrowa Łącka', 2, 304.83, '1990-08-29', 'Celem ochrony rezerwatu jest zachowanie licznych zbiorowisk roślinnych o charakterze naturalnym, obejmującym bory mieszane, grądy, łęgi, olsy, jak też obszar jeziora Łąckiego Małego oraz urozmaiconą rzeźbę terenu. Przedmiotem ochrony są rkosystemy leśne, bagienne i jeziorowe.', 'https://pl.wikipedia.org/wiki/Rezerwat_przyrody_Dąbrowa_Łącka', NULL, 1),
(16, 'park testowy', 1, 0.00, '2023-12-04', 'park testowy', 'https://php.net/', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `is_admin` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `email`, `password`, `is_admin`) VALUES
(1, 'Jan', 'Kowalski', 'jan.kowalski@example.com', '123456', b'1'),
(2, 'Anna', 'Nowak', 'anna.nowak@example.com', 'password', b'0'),
(3, 'Adam', 'Nowakowski', 'adam@wp.pl', 'Mazowiecka123!@', b'0'),
(4, 'Adam', 'Nowak', 'adam.nowak@gmail.com', '123456', b'0'),
(5, 'Alicja', 'Buk', 'ala123@wp.pl', 'qwerty', b'0');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `park` (`park`),
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indeksy dla tabeli `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `opinie`
--
ALTER TABLE `opinie`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `park`
--
ALTER TABLE `park`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city` (`city`);

--
-- Indeksy dla tabeli `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `opinie`
--
ALTER TABLE `opinie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `park`
--
ALTER TABLE `park`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `announcement_ibfk_1` FOREIGN KEY (`park`) REFERENCES `park` (`id`),
  ADD CONSTRAINT `announcement_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `park`
--
ALTER TABLE `park`
  ADD CONSTRAINT `park_ibfk_1` FOREIGN KEY (`city`) REFERENCES `city` (`id`);

--
-- Constraints for table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
