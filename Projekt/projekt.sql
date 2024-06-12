-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 08:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
CREATE DATABASE IF NOT EXISTS `projekt` DEFAULT CHARACTER SET latin2 COLLATE latin2_croatian_ci;
USE `projekt`;

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) NOT NULL,
  `prezime` varchar(32) NOT NULL,
  `korisnicko_ime` varchar(32) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_croatian_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(1, 'Anja', 'Cibula', 'acibula', '$2y$10$xLwOYJKtIyL9LxhewgBYk.cSuWD31TXLm8OrhHfEWx/uuF6tule.a', 1),
(2, 'Ana', 'Anić', 'aanic', '$2y$10$IMrIHAmz3nHBqvrIkHi4e.n7nu2nrW6MkrAuAqqJ.6znfTlgj9PWm', 0),
(4, 'Ana', 'Horvat', 'ahorvat', '$2y$10$14nEgJR.DkV7.NMveXE3lu0vAV8TRLEZTy9uEfWR8mHx3mW6EdooW', 0),
(5, 'Ivan', 'Horvat', 'ihorvat', '$2y$10$02L.4xWXhXU7TvYlZWKJj.PhXvFki80IkiUuCDxFreIunBpFQ7rdK', 0),
(7, 'Ana', 'Anić', 'anaanic', '$2y$10$hOkr9Z68VNodlN3P615pUu20icDC2KqNO6xtacLlRww3higvV4BXm', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) NOT NULL,
  `naslov` varchar(64) NOT NULL,
  `sazetak` text NOT NULL,
  `sadrzaj` text NOT NULL,
  `slika` varchar(64) NOT NULL,
  `kategorija` varchar(64) NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_croatian_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `sadrzaj`, `slika`, `kategorija`, `arhiva`) VALUES
(21, '01.06.2024.', 'Kako pronaći svoj ljetni miris', 'Savjeti za pronalazak savršenog ljetnog parfema.', 'Pronaći idealni ljetni miris može biti izazov, ali uz nekoliko smjernica, potraga postaje jednostavnija. Ljetni parfemi trebaju biti lagani i osvježavajući, s naglaskom na citrusne, cvjetne ili vodene note koje pružaju osjećaj svježine i lakoće.\r\n\r\nPrvo, obratite pažnju na note parfema. Citrusi poput limuna, naranče i bergamota idealni su za ljeto jer pružaju energičnu svježinu. Cvjetne note poput jasmina, lavande i ruže dodaju nježnost i eleganciju. Vodene note, koje podsjećaju na more ili svježe voće, također su odličan izbor.\r\n\r\nDrugo, isprobajte parfem prije kupnje. Koža svakoga od nas različito reagira na parfeme, pa je važno testirati miris na koži kako biste vidjeli kako se razvija tijekom dana.\r\n\r\nTreće, birajte laganije koncentracije poput toaletnih voda (Eau de Toilette) umjesto parfemskih voda (Eau de Parfum), jer su manje intenzivne i prikladnije za toplije vrijeme.\r\n\r\nNa kraju, razmislite o praktičnosti. Putna pakiranja i roll-on aplikatori odlični su za osvježenje tijekom dana.\r\nNeki od najpoznatijih ljetnih mirisa generalno su:  Dior Miss Dior,  Mugler Angel Nova, Burberry Her, Marc Jacobs Daisy ...\r\nUz ove savjete, pronaći idealni ljetni miris postaje ugodno iskustvo, omogućavajući vam da uživate u ljetu uz savršen mirisni dodatak.', 'kozmetika1.jpg', 'ljepota', 0),
(22, '01.06.2024.', 'Njega lica: korejska kozmetika', 'Korejska je kozmetika hit u njezi lica zahvaljujući inovativnim sastojcima.', 'Korejska kozmetika osvojila je svijet njege lica svojim inovativnim pristupom, visokokvalitetnim sastojcima i učinkovitim proizvodima. Popularnost korejskih proizvoda temelji se na filozofiji koja naglašava temeljitu njegu kože, preventivnu njegu i prirodne sastojke.\r\n\r\nJedan od najpoznatijih aspekata korejske kozmetike je 10-korak rutina njege kože, koja uključuje dvostruko čišćenje, eksfolijaciju, toniranje, esencije, serume, maske, kreme za oči, hidrataciju, zaštitu od sunca i specijalizirane tretmane. Ova rutina potiče korisnike da pažljivo i dosljedno njeguju svoju kožu, što rezultira zdravijim i blistavijim tenom.\r\n\r\nKorejski proizvodi često sadrže jedinstvene i prirodne sastojke poput puževe sluzi, pčelinjeg otrova, ekstrakta zelenog čaja, hijaluronske kiseline i fermentiranih sastojaka. Ovi sastojci su poznati po svojim hidratantnim, anti-age i regenerativnim svojstvima.\r\n\r\nMask sheet maske su još jedan hit u korejskoj kozmetici, omogućujući jednostavan i učinkovit način za dubinsku hidrataciju i njegu kože. Popularnost ovih maski proširila se diljem svijeta, s raznim formulacijama prilagođenim različitim tipovima kože i potrebama.\r\n\r\nOsim kvalitete proizvoda, korejska kozmetika privlači kupce i zbog atraktivnog dizajna ambalaže, pristupačnih cijena i stalnih inovacija u industriji. Korejski brendovi kao što su Laneige, Innisfree, Etude House i Cosrx postali su međunarodno prepoznatljivi i cijenjeni.\r\n\r\nKorejska kozmetika postala je nezaobilazna u svijetu njege lica, pružajući učinkovite i pristupačne proizvode koji osvajaju srca korisnika diljem svijeta. Njezina popularnost nastavlja rasti, a korisnici sve više prepoznaju prednosti temeljite i preventivne njege kože inspirirane korejskom filozofijom.', 'kozmetika5.png', 'ljepota', 0),
(23, '01.06.2024.', 'Novi sol de Janeiro sprejevi', 'Dolaze najnoviji mirisi poznatih Sol de Janeiro sprejeva za tijelo!', 'Sol de Janeiro, poznati brend inspiriran brazilskom ljepotom i egzotičnim mirisima, lansirao je najnovije mirise svojih popularnih sprejeva za tijelo. Ovi novi mirisi obećavaju da će osvježiti i očarati sve ljubitelje senzualnih i živopisnih aroma koje podsjećaju na sunčane plaže i veseli duh Brazila.\r\n\r\nNoviteti uključuju nekoliko novih mirisnih kompozicija:\r\n\r\nRio Radiance - Kombinira note kokosa, suncem okupane gardenije i tropskog ananasa. Ovaj miris priziva osjećaj opuštanja na sunčanoj plaži uz lagani povjetarac.\r\n\r\nTropical Night - Mješavina egzotičnih cvjetova, svježeg manga i bogate vanilije. Ovaj senzualni miris savršen je za večernje izlaske ili romantične trenutke pod zvjezdanim nebom.\r\n\r\nSummer Bliss - Osvježavajući spoj citrusa, morskih nota i sočne breskve. Idealan je za svakodnevnu upotrebu, pružajući osjećaj svježine i energije tijekom cijelog dana.\r\n\r\nSol de Janeiro je poznat po svojoj pažnji prema detaljima, pa su i novi mirisi upakirani u elegantne bočice jarkih boja koje evociraju radost i ljepotu brazilskih pejzaža. Osim što pružaju dugotrajan miris, ovi sprejevi također njeguju kožu zahvaljujući dodanim hidratantnim sastojcima poput ulja acai i vitamina E.\r\n\r\nOvi novi mirisi već su dostupni u trgovinama i online, te su savršeni za sve one koji žele unijeti dašak egzotike i neodoljive svježine u svoju svakodnevicu. Bilo da tražite novi omiljeni miris za ljeto ili želite razveseliti nekoga posebnog, Sol de Janeiro sprejevi za tijelo su nepogrešiv izbor.', 'kozmetika4.png', 'ljepota', 0),
(24, '01.06.2024.', 'The Ordinary serumi za lice', 'The Ordinary serumi za lice: Benefiti i za koga su namijenjeni', 'The Ordinary je postao sinonim za pristupačnu i učinkovitu njegu kože, a njihovi serumi za lice su neki od najprodavanijih proizvoda. Svaki serum nudi specifične benefite i prilagođen je određenim potrebama kože.\r\n\r\nNiacinamide 10% + Zinc 1% - Ovaj serum pomaže u smanjenju proizvodnje sebuma, sužava pore i smanjuje crvenilo. Idealno je rješenje za one s masnom ili problematičnom kožom.\r\n\r\nHyaluronic Acid 2% + B5 - Sadrži hijaluronsku kiselinu koja hidratizira kožu, čineći je mekom i podatnom. Savršen je za suhu ili dehidriranu kožu kojoj je potrebna intenzivna hidratacija.\r\n\r\nBuffet - Ovaj serum sadrži mješavinu peptida koji potiču obnovu kože, smanjuju fine linije i bore te potiču čvrstoću kože. Pogodan je za sve tipove kože i idealan za one koji žele anti-age njegu.\r\n\r\nAlpha Arbutin 2% + HA - Cilja na hiperpigmentaciju i nepravilnosti u tonu kože, pomažući u postizanju svjetlije i ujednačenije kože. Idealno je za osobe koje se bore s mrljama od sunca ili aknama.\r\n\r\nVitamin C Suspension 23% + HA Spheres 2% - Bogat vitaminom C, ovaj serum pruža antioksidativnu zaštitu, posvjetljuje kožu i potiče proizvodnju kolagena. Savršen je za one koji žele sjajnu i blistavu kožu.\r\n\r\nNavedeni serumi imaju različite namjene i ciljeve, ali zajedničko im je to što pružaju učinkovitu njegu po pristupačnim cijenama. Bez obzira na tip kože ili specifične potrebe, The Ordinary nudi širok raspon proizvoda koji mogu zadovoljiti različite potrebe i pružiti rezultate koje mnogi korisnici cijene i preporučuju.', 'kozmetika6.jpg', 'ljepota', 0),
(25, '01.06.2024.', 'Hailey i Justin Bieber trudni', 'Hailey Bieber objavila trudnoću, a Selena Gomez odgovor', 'Hailey i Justin Bieber iznenadili su svijet svojom objavom da očekuju prinovu, dok se istovremeno Selena Gomez pojavila na društvenim mrežama s novim dečkom Bennyjem Blancom. Ova neočekivana serija događaja potaknula je brojne spekulacije i reakcije fanova diljem svijeta.\r\n\r\nNa Instagramu, Hailey je podijelila sliku s Justinom, pokazujući njihovu sreću i uzbuđenje zbog dolaska bebe. Justin je potvrdio vijest objavom iste slike, izrazivši zahvalnost i ljubav prema svojoj supruzi. Obožavatelji su brzo preplavili društvene mreže čestitkama i iskrenim željama za sreću ovog mladog para.\r\n\r\nMeđutim, istovremeno, Selena Gomez je aktivno dijelila slike s Bennyjem Blancou, potičući razne spekulacije i pitanja o njezinoj reakciji na vijest o trudnoći bivšeg partnera. Njezine objave s Bennyjem, praćene srdačnim komentarima i emotikonima zaljubljenih, sugeriraju da je fokusirana na svoj novi odnos i sretna u svojoj trenutačnoj vezi.\r\n\r\nReakcije fanova bile su raznolike. Dok su neki izrazili radost zbog trudnoće Hailey i Justina te im pružili podršku, drugi su analizirali Selenine objave i pokušali tumačiti njezinu reakciju na vijest. Neki su se divili njezinoj zrelosti i fokusu na osobni život, dok su drugi bili zabrinuti za njezino emocionalno stanje u kontekstu prošlih veza s Justinom.\r\n', 'poznati3.png', 'slavni', 0),
(41, '09.06.2024.', 'AI slike zavarale medije', 'Kako Su Lažne Fotografije Postale Viralni Hit', 'Svijet mode i zabave ostao je zapanjen kada su se na društvenim mrežama pojavile slike Katy Perry i Rihanne s ovogodišnje Met Gale. Međutim, ubrzo se ispostavilo da su ove slike rezultat napredne umjetne inteligencije (AI) koja je zavarala medije i obožavatelje diljem svijeta.\r\n\r\nSlike su prikazivale Katy Perry i Rihannu u ekstravagantnim i nevjerojatno detaljnim kreacijama koje su savršeno odgovarale ovogodišnjoj temi \"Kraljevska ekstravagancija\". Fotografije su brzo postale viralne, prikazujući ikone stila u fantastičnim odjevnim kombinacijama koje su mnogi smatrali remek-djelima mode.\r\n\r\nMeđutim, uskoro je otkriveno da su slike generirane pomoću naprednih algoritama umjetne inteligencije. Tehnologija koja stoji iza ovih slika koristi duboko učenje i složene neuronske mreže kako bi stvorila hiperrealistične slike koje su gotovo nemoguće razlikovati od stvarnih fotografija. AI slike su bile toliko uvjerljive da su čak i iskusni novinari i modni stručnjaci bili prevareni.\r\n\r\nMediji su brzo prenijeli slike kao autentične, a mnogi su hvalili dizajnere i stiliste zbog njihovih \"kreacija\". Tek nakon što su neki stručnjaci za tehnologiju i modni insajderi počeli postavljati pitanja o autentičnosti slika, postalo je jasno da je riječ o AI generiranim fotografijama.', 'poznati4.png', 'slavni', 0),
(42, '09.06.2024.', 'Skandal na Euroviziji', 'Kontroverze ovogodišnje Eurovizije', 'Ovogodišnja Eurovizija nije prošla bez skandala. Joostov incident izazvao je brojne reakcije kada je optužen za neprimjereno ponašanje iza pozornice. Njegov skandal bacilo je sjenu na natjecanje, te se puno više govorilo o njegovom ponašanju nego o njegovoj pjesmi.\r\n\r\nNastup Irske također je izazvao kontroverze. Kritičari su tvrdili da izvedba nije bila na razini koju se očekuje na Euroviziji, a tehnički problemi tijekom izvedbe samo su dodatno pogoršali situaciju. Mnogi su komentirali da je nastup bio razočaravajući i da nije ispunio očekivanja publike.\r\n\r\nDodatne kontroverze su se pojavile zbog sudjelovanja Izraela. Političke tenzije i protesti pratili su njihovo sudjelovanje, što je izazvalo polarizirane reakcije među gledateljima i natjecateljima. Unatoč tome, Izrael je ostvario solidan plasman, što je dodatno podijelilo mišljenja javnosti.\r\n\r\nOve kontroverze obilježile su ovogodišnju Euroviziju, pokazujući kako glazbeno natjecanje može biti pogođeno političkim i društvenim pitanjima, ali i osobnim skandalima koji odvlače pažnju od same glazbe.', 'poznati5.jpg', 'slavni', 0),
(46, '09.06.2024.', 'aaaaaaaa', 'aaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaa', 'kozmetika5.png', 'ljepota', 0),
(47, '09.06.2024.', 'aaaaaaaaa', 'aaaaaaaaaaaa', 'aaaaaaaaaaaa', 'kozmetika6.jpg', 'ljepota', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
