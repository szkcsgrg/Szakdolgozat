-- MySQL dump 10.13  Distrib 8.0.27, for macos11 (x86_64)
--
-- Host: localhost    Database: konyvtar
-- ------------------------------------------------------
-- Server version	8.0.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `konyvek`
--

DROP TABLE IF EXISTS `konyvek`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `konyvek` (
  `konyvID` int NOT NULL AUTO_INCREMENT,
  `cim` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `iro` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `kiado` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `tema` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `leiras` text CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `terjedelem` int NOT NULL,
  `kiadasDatuma` varchar(45) COLLATE utf8mb4_hungarian_ci DEFAULT NULL,
  `borito` varchar(200) COLLATE utf8mb4_hungarian_ci DEFAULT NULL,
  PRIMARY KEY (`konyvID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `konyvek`
--

LOCK TABLES `konyvek` WRITE;
/*!40000 ALTER TABLE `konyvek` DISABLE KEYS */;
INSERT INTO `konyvek` VALUES (5,'A kőszívű ember fiai','Jókai Mór',' Holló és Társa','Irodalom, Szépirodalom, Regény, Novella, Elbeszélés, Kötelező olvasmányok, Felső tagozat','A császárpárti Baradlay Kázmér özvegye, szembeszegülve férje végakaratával, jó magyarnak, boldog embernek szeretné látni a fiait. Hazahívja legidősebb fiát, Ödönt Pétervárról, Richardot és Jenőt Bécsből. Kitört a forradalom. A forradalmár lelkületű Baradlayné biztatására fiai apjuk végakarata ellenére, 1848 ügye mellé állnak. A leggyengébbnek tűnő, fényes pálya előtt álló Jenő a szabadságharc leverése után az életét is feláldozza bátyjaiért.',541,NULL,'https://d3cke8tg6hiyfg.cloudfront.net/images/350x540/resize/jokai-mor-a-koszivu-ember-fiai-8_dlcwj5sk.jpg?v=2'),(11,'Kárpáthy Zoltán','Jókai Mór',' Szépirodalmi Könyvkiadó','  Irodalom szépirodalom regény, novella, elbeszélés','Apja halála után Kárpáthy Zoltán Szentirmayék házában nő fel. Szerelmes lesz leányukba, Katinkába, de gyámapja elküldi őt otthonukból 18. születésnapján. E lépésre az a szennyes per készteti, amelyet előbb Kárpáthy Abellinó folytat János úr örökségéért, majd Kőcserepy, aki üzletet lát ebben. Zoltán utóbb rájön: mi készteti nevelőapját erre a megmagyarázhatatlannak tűnő lépésre. Nem Katinkát akarja tőle elválasztani, hanem Abellinóék aljas manőverét óhajtja megelőzni. Amint ez nyilvánvalóvá válik, Zoltán lemond az örökségéről, hogy anyja nevét és Rudolf személyét megkímélje a gyanúsítgatásoktól.',383,NULL,'https://d3cke8tg6hiyfg.cloudfront.net/images/350x540/resize/jokai-mor-karpathy-zoltan-5_jykhqlec.jpg?v=2'),(12,'A lőcsei fehér asszony','Jókai Mór','Szépirodalmi Könyvkiadó','  Irodalom szépirodalom regény, novella, elbeszélés','„Azt beszélik – közelít Jókai regényének hősnőjéhez – hogy ez a nő elárulta nemzetét. Az első és egyetlen nőalak a magyar történelemben, aki nemzetáruló volt. És ugyanez a Ghéczy Juliánna később, mint önfeláldozó vértanúja a magyar szabadság ügyének, tűnik el a láthatáron. Jön, mint egy üstökös, leszáll, mint egy csillag… Hol a megoldás, ez ég-pokol különbségű ellentmondás egy nő jellemében? Két lelke volt-e ez asszonynak?… A múltnak árnyait csak a költőnek van joga felidézni: mit tettek, miért tették? A lőcsei asszony majd megfelel arra.” Megfelel-e valójában? S az igazsághoz híven?',532,NULL,'https://d3cke8tg6hiyfg.cloudfront.net/images/350x540/resize/jokai-mor-a-locsei-feher-asszony_6mdoo618.jpg?v=2'),(13,'És mégis mozog a Föld','Jókai Mór','Szépirodalmi Könyvkiadó','  Irodalom szépirodalom regény, novella, elbeszélés','A regény cselekménye öt debreceni diákot álít elénk: Jenőy Kálmánt, Barkó Palit, Bíróczi Sándort, Borcsay Mihályt és Csuka Ferit. A rebellis szellemű \"csittvári krónika\" szerkesztéséért kicsapják őket a kollégiumból, s az öt fiú elindul \"abba a végtelen semmibe, aminek világ a neve\". Innentől kezdve Jenőy Kálmán sorsa kerül a történet középpontjába. A többiekre akkor vetődik fény, amikor vele találkoznak, útját keresztezik vagy kibontakozását segítik. Kálmán költő akar lenni. Nagy tervei elé azonban szüntelen akadályok gördülnek. Nem a megélhetés nehézségei, hiszen dúsgazdag nagyanyja mindennel ellátná, s fényes közéleti pálya lehetőségeit csillogtatja előtte. Ám a veszély éppen ezekben rejlik, félő, hogy a könnyebbik megoldás felé hajlik majd. Először egy kacér fiatalasszony, Katinka feledteti vele a célt, aztán Decséry főispánék szolgálatában az érvényesülés vágya érinti meg. A drámáját fogadó közöny is arra ösztökéli, hogy hagyjon fel próbálkozásaival. A végső kísértés a legnagyobb: festeni kezd, és szép sikert ér el. Emiatt még nem kellene szakítania sem nagyanyjával sem eddigi életmódjával. De színészbarátai nyomorúságát hallva Kálmán hazajön olaszországi festő-körútjáról. Végleg az írásnak szenteli magát és vállalja nagyanyja sírig tartó haragját.',636,NULL,'https://d3cke8tg6hiyfg.cloudfront.net/images/350x450/resize/jokai-mor-es-megis-mozog-a-fold_hylum216.jpg?v=2'),(14,'Szép Mikhál / Egy hírhedett kalandor a XVII. századból','Jókai Mór','Szépirodalmi Könyvkiadó','  Irodalom szépirodalom regény, novella, elbeszélés','Mikhál, a paplány és Henrik, a hóhér házassága, majd Mikhál menekülése a hóhér házából és szerelmének beteljesülése Kalondai Bálinttal, Kassa bírójával egy szélsőségesen romantikus elemekkel megrajzolt tragikus végű szerelem története. A romantikus meseszövés lehetőséget nyújt Jókainak, hogy ezt a véres szerelmi drámát egy izgalmas, fordulatos kalandregény keretében mondja el. A történet hátterében II. Rákóczi György kora, a törökök elleni portyázó harcok, Kassa város mindennapi életének apró eseményei állnak. A felvidéki hegyek között megbújó rablók, a török fogságok és fogolycserék, a városi farsangi mulatság és a bíróválasztás ceremóniája, a korabeli háztartás apró műhelytitkai, a boszorkányos kuruzslás és varázslat misztikus hókuszpókuszai megdöbbentő helyismerettel, csillagászati, növénytani jártassággal, maradandó történeti, kultúrtörténeti, etnográfiai anyaggal lepi meg az olvasót, és teszi emlékezetessé a regényt. Nagy mesemondónk ebben a kalandregényben a Seherezádé, Münchausen, Háry véghetetlen és megunhatatlan mesevilágát varázsolja az olvasó elé. A kalandorságra mindig kapható, kalandjaiban messze világokig sodródó Hugó \"Konstábler\", vagyis tüzértiszt annyi mindenen megy keresztül, hogy a fele is sok lenne egy emberéletre. A képzelet és valóságos esemény leírása Jókai fantáziájának műve. Az író maga is élvezi a játékos meseszövést, mindig ki tud találni valami hihetetlenül elképesztőt, s a mese és a valóság vegyítésével, lebilincselően szórakoztató pikareszk regényt írt. Az események a forgandó szerencse változatai - a hős megjárja a lélek és a test mennyét és poklát, ám végzete végül is eléri, a várhatónál kegyelmesebben.',590,NULL,'https://d3cke8tg6hiyfg.cloudfront.net/images/350x540/resize/jokai-mor-szep-mikhal-egy-hirhedett-kalandor-a-xvii-szazadbol_779zpa4c.jpg?v=2'),(15,'Kelet Királynéja','Jókai Mór','Szépirodalmi Könyvkiadó','  Irodalom szépirodalom regény, novella, elbeszélés','  „Jókai ​száz kötete – írja Krúdy Gyula – a magyar nemzet levelesládája, amelyben írott emléke van minden tündéri álmunknak, bús bánatunknak, csengő kedvünknek és hervadtságában is andalító szerelmünknek. Jókai mindenkinek írt: az ifjúnak, aki ideált keresett, a pünkösdi leányzónak, aki a szerelmet még nem ismerte, és az öregnek, aki mindig csak arra szeret gondolni, ami ötven esztendő előtt történt vele. Jókai nem egy ember, hanem az egész tizenkilencedik század, regényességével, érzelmességével és hóbortosságával…” Kosztolányi Dezső így jellemzi: „Ő a mesterfejedelem, az álmok országának királya. Ez a kék szemű, szikár férfi, akit ismerősei gyöngének, ingatagnak, erélytelennek neveznek, a tizenkilencedik század fordulójánál úgy áll regényes, eddig elképzelhetetlen termékenységével, mint egy Herkules, az írás Herkulese… Nem volt a szó hétköznapi értelmében \"megfigyelő”. Jókai csak a távolság ködéből tudott ihletet meríteni. Kínába, Oroszországba rándult, vagy messzebb, az időbe, visszafelé, a törökverő harcokba, a táblabírák, regényes nábobok, debreceni diákok közé, s előre a huszadik századba, melyet kísérteties érzékkel sejtett meg. Csak a szertelen, a borzalmas, a csodás vonzotta. Ennek a mesevilágnak saját lélektani törvényei vannak. Ellentétekben gondolkodott, mint a gyermekek és ősnépek, melyek a Fény és a Sötétség, a Nap s az Éj, a Jó és a Rossz szellemeiről, Íziszről és Oziriszról, Ormuzdról és Ahrimánról beszélnek. Nála is Hősök és Gyávák tusakszanak egymással. Angyalok és Ördögök, Szentek és Démonok. Két kedvenc színe: a fehér s a fekete. Egy keleti regét álmodott vissza.\" Kosztolányi szavai minden bizonnyal Jókai történelmi mondáira, regéire találnak a legjobban, azokra a beszélyekre, amelyeknek javát ebben a kötetben olvashatjuk. Varga Katalin Jókai Mór nem-magyar tárgyú történeti elbeszéléseit – vagy inkább meséit – gyűjtötte össze itt: csupa színes és fordulatos írás hűségről és árulásról, jóságról és gonoszságról, szeretetről és gyűlöletről, forró életről és jéggé dermesztő erőszakos halálról – a történeti mag, az egyiptomi, görög, római, kínai, középkori, orosz vagy dél-amerikai háttér csak kiindulópont, ugródeszka, mely messzire röpíti az író képzeletét, felajzza mesélőkedvét, hogy az merészebbnél merészebb ötletekkel, új és új arabeszkekkel dúsítsa azt a keveset, amit múltunkról, az emberiség múltjáról tudunk.',534,NULL,'https://d3cke8tg6hiyfg.cloudfront.net/images/350x540/resize/jokai-mor-kelet-kiralyneja-1_rt09ztwj.jpg?v=2'),(16,'Egri csillagok','Gárdonyi Géza','Móra Könyvkiadó','  Irodalom szépirodalom regény, novella, elbeszélés Irodalom szépirodalom gyermek- és ifjúsági irodalom regények Irodalom Kötelező olvasmányok Felső tagozat','  A XVI. század derekán az egykor dicsőséges Magyar Királyság végnapjait éli. A mohácsi vészt követően az ismétlődő török hadjáratok sorra veszik be a végvárakat: Buda, Pécs, Esztergom, Szeged után elvész Temesvár és Szolnok is. Az Oszmán Birodalom ékként hatol az ország belsejébe, de Eger vára, a Felvidék védelmezője áll még, ahol kétezernél is kevesebb várvédő néz szembe kétszázezernyi törökkel. Gárdonyi eredetileg Bornemissza Gergely élettörténetét kívánta megírni, ám végül azon a ponton fejezte be regényét, amikor főhőse katonai pályájának csúcsára jut, és a török sereget visszaverő, győztes Dobó után őt nevezik ki Eger várkapitányává. Sorsának közeli, szomorú vége csak fölsejlik a regény első felének kalandjaiban... Bátorság, meg nem alkuvás és hűség a reménytelennek tetsző küzdelemben - ez Gárdonyi históriájának üzenete, melyet első megjelenése után több mint száz évvel, 2005-ben, a Nagy Könyv versenyen a legnépszerűbb magyar regénynek választottak az olvasók.',608,NULL,'https://d3cke8tg6hiyfg.cloudfront.net/images/350x540/resize/gardonyi-geza-egri-csillagok-4_wk5pvds5.jpg?v=2');
/*!40000 ALTER TABLE `konyvek` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-22 10:50:17