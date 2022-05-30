-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Listage de la structure de la table galeriedubastion. admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Listage des données de la table galeriedubastion.admins : ~2 rows (environ)
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` (`id`, `firstname`, `lastname`, `mdp`, `email`, `created_at`, `role`) VALUES
	(1, 'Alan', 'Dauphin', '$2y$10$eZ1CFAD4StljXqiIJxIwyuqFrH037txcHgApzpyFA3zaADXvDPicO', 'alandauphin@hotmail.fr', '2022-03-31 10:35:42', 1),
	(2, 'John', 'Doe', '$2y$10$h1yju8rahkWE27wKLpOj3.ElasgxBSbvlMRpzxoN7kGDVminChkXq', 'jane@contact.fr', '2022-03-31 10:36:37', 1);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

-- Listage de la structure de la table galeriedubastion. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `confirm_mdp` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Listage des données de la table galeriedubastion.users : ~6 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `firstname`, `lastname`, `pseudo`, `mdp`, `confirm_mdp`, `email`, `created_at`) VALUES
	(6, 'Nellie', 'Bly', 'Nellie', '$2y$10$bvjhFNwL6hsKQqe5y.rdq..Moyatv8nGd0399zjuH8aWuBZ0FzLR.', '$2y$10$vJWYTy4mYkI.2ex.NJDdZOYOwFrhrVZ5MgwwpVLGTjm9nNq4djZz.', 'bly@contact.com', '2022-04-11 15:58:53'),
	(9, 'Muriel', 'Knokar', 'Mumu', '$2y$10$RJGeEPLrEqMqykKFqu6eX.nMV.ooQuLeb9sXdbJ/DRQfXZbcRmgyu', '$2y$10$hB9VVvdlEYnu/9QfA7DI5edUNrDfWPPQWhMlT8hh1RloxHkhapcIe', 'mumu@contact.fr', '2022-04-15 14:23:48'),
	(10, 'Alex', 'Honnold', 'Koala', '$2y$10$fZ/UHzIkge1x9N0rlsfHouNasHTAWRg0u/RFYHg0372WTwqH3NeOa', '$2y$10$Cqcs4DDpxO7X5Sk2oyyqyuVMjRqMjOUWA6AF7IUMpwvyr67.NRJae', 'lex@gmail.com', '2022-05-11 20:59:20'),
	(11, 'Heather', 'Anderson', 'Hiky girl', '$2y$10$mkZuP8dSCzJ6wZ7LRc46sujmKNmT8DoQei3kMCAeei8V5rXUt8tYO', '$2y$10$9JNlI6KGUKDtxZnv8xEjP.lSSeEFO9KpxcgMQyOL95WgjVPzGxtVm', 'kyky@contact.com', '2022-05-11 21:15:26'),
	(12, 'Zangerl', 'Babsi', 'Zangy', '$2y$10$Jh8u.bOULXhF6u5P696aa.2nlz4FQ6FO12M0QnpW2eGId89cbsPBK', '$2y$10$Z0c6IbedB3pG93OlyG.YSOsythfxzjN9WIWL/0DcEYM7b0G47NXt6', 'zaza@contact.com', '2022-05-13 11:19:46'),
	(13, 'Jack', 'London', 'Frisco', '$2y$10$nk2QjdxawJ.uVBj5p26QH.n5dJNe0utji1.WfllXj7PT93/6tEYKG', '$2y$10$AMjVYVQVBl/bmrUbyz3JfOiTHjOkmWRVVgyxwO.4D.bzUrzX/Akdi', 'london@contact.com', '2022-05-13 12:08:35');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Listage de la structure de la table galeriedubastion. blogposts
CREATE TABLE IF NOT EXISTS `blogposts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `category` varchar(50) NOT NULL,
  `alt` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- Listage des données de la table galeriedubastion.blogposts : ~4 rows (environ)
/*!40000 ALTER TABLE `blogposts` DISABLE KEYS */;
INSERT INTO `blogposts` (`id`, `title`, `picture`, `content`, `category`, `alt`, `created_at`) VALUES
	(23, '      Quinze jours au Pérou', '6264ff90281c62.57557706.webp', '<p><strong>Terminal international de Tacna, P&eacute;rou</strong>. &Ccedil;a grouille de partout, je sors de l&agrave; et je me rends directement &agrave; mon h&ocirc;tel. J&rsquo;y passe trois nuits. C&rsquo;est beaucoup car en fait il n&rsquo;y a pas grand chose &agrave; faire ici. J&rsquo;ai comme l&rsquo; impression d&rsquo;&ecirc;tre le seul touriste &agrave; me promener dans la ville. Mais j&rsquo;aime bien ces moments de transitions, hors du flux mondialis&eacute;, qui me permettent de &laquo; sentir &raquo; l&rsquo;atmosph&egrave;re de ce nouveau pays. Je me r&eacute;gale dans les petits restaurants du coin. Motiv&eacute;, je repars en bus <strong>direction Arequipa!</strong></p>\r\n<p>&nbsp;</p>\r\n<p>&Ccedil;a change vraiment !! Le centre est super joli et l&rsquo;auberge vraiment cool, tenue par mama Silvia, son papa tout gentil et sa fille toute mignonne. On peut acc&eacute;der au toit et avoir une superbe vue &agrave; 360 degr&eacute;s. La vie n&rsquo;est pas cher (pour un voyageur), de quoi se laisser tenter par les nombreux restaurants (les p&eacute;ruviens sont des as de la cuisine): v&eacute;g&eacute;tariens, mexicains, turques, p&eacute;ruviens bien sur, chinois&hellip; Je trouve aussi rapidement le bon plan petit d&eacute;jeuner: une association franco-p&eacute;ruvienne, Rayo del sol, vend des croissants et des pains au chocolats. L&rsquo;argent r&eacute;colt&eacute; sert &agrave; scolariser les enfants vivant dans les quartiers d&eacute;favoris&eacute;s &agrave; l&rsquo;ext&eacute;rieur de la ville. C&rsquo;est un boulanger fran&ccedil;ais aux fourneaux et c&rsquo;est super bon! Avec Silvia je n&eacute;gocie pour aller au<span style="color: rgb(224, 62, 45);"> <strong>Colca canyon</strong></span>&nbsp;(profond de 3400 m&egrave;tres!). Je prends la formule deux jours. Un mini bus passe me prendre t&ocirc;t le matin.</p>', 'amerique du sud', 'perou randonnee machu picchu', '2022-04-25 11:31:53'),
	(25, '   Californie : de Monterey à San Francisco', '62664d353d9bf0.83316290.webp', '<p>Toujours &agrave; errer dans <span style="color: rgb(53, 152, 219);"><strong>Monterey</strong></span> , j&rsquo;assiste &agrave; une arrestation, comme dans les films. Le gars est d&eacute;j&agrave; assis par terre, mains menott&eacute;es dans le dos, contre un lampadaire et autour de lui , une bonne dizaine de policiers (besoin d&rsquo;autant?!).</p>\r\n<p>&nbsp;</p>\r\n<p>Je fais un jour mes petites courses au Trader Joe&rsquo;s. La caissi&egrave;re grille mon accent et me demande d&rsquo;o&ugrave; je viens, blah blah blah , et si j&rsquo;ai &eacute;t&eacute; visiter l&rsquo;attraction phare de la ville: Le<strong> <span style="color: rgb(53, 152, 219);">Monterey Bay Aquarium</span></strong>. Class&eacute; Top 1 des choses &agrave; faire ou &agrave; voir d&rsquo;apr&egrave;s Trip Advisor. Je lui dis que je suis une sale pince et que du coup ce n&rsquo;&eacute;tait pas dans mes projets, sans m&ecirc;me avoir consult&eacute; les tarifs. Elle me dit de repasser le lendemain matin car elle a un pass &agrave; me pr&ecirc;ter et je pourrais aller voir les animaux sauvages, moins sauvages en boites, gratuitement, wahouuuu! Win, won, winner! La vie est pleine de (bonnes) surprises!</p>\r\n<p>&nbsp;</p>\r\n<p>D&rsquo;ici la sortie en classe verte: tisane aux oignons, pain, douche, pluie. Et un peu de musique fran&ccedil;aise: les voisines am&eacute;ricaines en van &eacute;coutent les chansons du film<span style="color: rgb(45, 194, 107);"> <strong><em>Am&eacute;lie Poulain</em></strong></span>, douceur du soir. Ce film a eu un succ&egrave;s incroyable! Apr&egrave;s un bon dodo, je descends de ma colline et je rejoins <strong>le Trader Joe&rsquo;s</strong> o&ugrave; je trouve l&rsquo;employ&eacute;e du mois qui me donne le pr&eacute;cieux s&eacute;same! Je file &agrave; l&rsquo;aquarium en suivant le chemin c&ocirc;tier r&eacute;serv&eacute; aux cyclos et aux pi&eacute;tons, c&rsquo;est beau et agr&eacute;able. J&rsquo;arrive vers les dix heures et je passe par l&rsquo;entr&eacute;e &laquo;&nbsp;members&nbsp;&raquo;, &eacute;vitant ainsi la file d&rsquo;attente. Pour info, les tarifs 2018: 49,95 dollars, soit environ 43 euros. L&rsquo;affaire! Je suis<span style="color: rgb(132, 63, 161);"><strong> pas du tout un fan des aquariums, zoos</strong></span>&hellip; mais l&rsquo;occasion est trop belle. A l&rsquo;int&eacute;rieur, c&rsquo;est joliment agenc&eacute; et il y a du monde. L&rsquo;aquarium a ouvert ses portes en 1984. Pour r&eacute;sumer, j&rsquo;ai beaucoup aim&eacute; les bancs de sardines et les m&eacute;duses, pour le reste c&rsquo;est du d&eacute;j&agrave; vu, #oc&eacute;anopolis. &nbsp;</p>', 'californie', 'phare californie', '2022-04-25 09:40:55'),
	(26, '     La Suède à vélo', '62665265d49402.04544335.webp', '<p><strong>&Agrave; moi la Su&egrave;de! </strong>Sur le navire, j&rsquo;observais d&eacute;j&agrave; les magnifiques rivi&egrave;res bord&eacute;es de pins et les belles maisons scandinaves. A terre, je gal&egrave;re pour rejoindre Stockholm, il y a peu de routes et le peu qui existent sont interdites au v&eacute;lo. Il me faudrait donc faire un grand d&eacute;tour. Non merci! J&rsquo;abandonne l&rsquo;id&eacute;e de passer par la capitale et rejoindre Malm&ouml; o&ugrave; je devais retrouver Camilla rencontr&eacute; en Albanie. Une prochaine fois! Du coup je file <span style="color: rgb(22, 145, 121);"><strong>tout droit jusqu&rsquo;&agrave; G&ouml;teborg. </strong></span></p>\r\n<p>&nbsp;</p>\r\n<p>C&rsquo;est un peu vallonn&eacute;, les passages sur les ponts au dessus des rivi&egrave;res sont beaux. Mais je suis maintenant lass&eacute; de toutes ces <span style="color: rgb(53, 152, 219);">for&ecirc;ts de r&eacute;sineux qui bordent ma route depuis la Pologne</span>. Je fais des bivouacs sauvages un peu partout: bord de fjord, aire de repos et m&ecirc;me &eacute;cole maternelle. Bon, je croyais &ecirc;tre tranquille pensant que c&rsquo;&eacute;tait les vacances. Jusqu&rsquo;&agrave; ce que je me fasse r&eacute;veiller &agrave; 6h15 par la directrice, probablement. Allez salut!&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Sinon ce n&rsquo;est pas une l&eacute;gende, les <span style="background-color: rgb(131, 246, 140); color: rgb(0, 0, 0);"><strong>Su&eacute;dois parlent parfaitement l&rsquo;anglais</strong></span>, jeunes ou vieux! Ils sont d&rsquo;ailleurs tr&egrave;s sympa et viennent facilement vers vous pour savoir si vous avez besoin d&rsquo;aide. Une fois, je consultais le gps, un ancien viens me voir. On papote en anglais. Au bout de deux minutes je lui dit que je suis fran&ccedil;ais et il me dit: &laquo;&nbsp;oh! Vous &ecirc;tes fran&ccedil;ais et vous savez parler anglais!&nbsp;&raquo; Voila la r&eacute;putation qu&rsquo;on se tra&icirc;ne un peu partout: les fran&ccedil;ais ne parle pas d&rsquo;autres langues que la leur. Et les anglais, am&eacute;ricains, australiens et j&rsquo;en passe?!! Ah ah!</p>', 'voyage a velo', 'velo suede voyage', '2022-04-25 10:13:16'),
	(27, '  Un mois au Japon', '62665509464a13.49092920.webp', '<p>Arriv&eacute;e &agrave; l&rsquo;a&eacute;roport de Narita (Tokyo) &agrave; six heures du matin. Visa, empruntes digitales et tout le toutim. Bon premier probl&egrave;me, mon vieux t&eacute;l&eacute;phone ne fonctionne pas au <span style="color: rgb(53, 152, 219);"><strong>Japon</strong></span> car il faut imp&eacute;rativement un mobile 3g ou 4g, vive la modernit&eacute;. C&rsquo;est un chou&iuml;a emb&ecirc;tant car je dois retrouver un ami qui habite dans la capitale et je n&rsquo;ai pas l&rsquo;adresse exacte, seulement un point de rendez-vous sans heure pr&eacute;cise. Deuxi&egrave;me probl&egrave;me: le distributeur automatique ne veut pas me cracher de billets. Trop polie s&ucirc;rement. Hallelujah, il me reste un ultime billet de cinquante euros. Le pr&eacute;cieuuux! Je vais au bureau de change et la premi&egrave;re grosse diff&eacute;rence avec l&rsquo;Indon&eacute;sie : la paperasse ! Je dois remplir un papier avec la somme que je veux changer, nom, pr&eacute;nom, num&eacute;ro de passeport, de t&eacute;l&eacute;phone et adresse au Japon. On ne sait jamais ! N&rsquo;oublions pas que nous sommes dans un des pays les plus s&ucirc;rs du monde. Bon du coup j&rsquo;ai un petit peu d&rsquo;argent. N&rsquo;oublions pas que nous sommes dans un des pays les plus chers du monde. C&rsquo;est quelques yens en poche me permettent de<span style="color: rgb(53, 152, 219);"><strong> prendre le bus pour Tokyo</strong></span> &agrave; environ soixante kilom&egrave;tres.</p>\r\n<p>&nbsp;</p>\r\n<p><strong> Avant de quitter l&rsquo;a&eacute;roport</strong>, je profite de la wifi gratuite pour pouvoir faire un virement sur mon compte pour retirer des sous plus tard. Prendre le bus au Japon, l&agrave; aussi &ccedil;a change! D&rsquo;abord tout le monde (on est dix environ) attend &agrave; la queue-leu-leu le long d&rsquo;un marquage pr&eacute;vu &agrave; cet effet et au bon num&eacute;ro d&rsquo;arr&ecirc;t. Ensuite le bus arrive et un assistant pose des &eacute;tiquettes sur chaque bagage puis nous donne l&rsquo;autre partie du coupon, comme pour prendre l&rsquo;avion quoi. &Eacute;videmment le car est super confort. On roule sur une route d&eacute;serte de tout v&eacute;hicule, m&ecirc;me dans Tokyo!</p>\r\n<p>&nbsp;</p>\r\n<p>Huit heures, dimanche, je troc mon coupon contre mon sac &agrave; dos, <span style="color: rgb(53, 152, 219);"><strong>en avant Guingamp</strong></span> ! Quelque chose me surprend, je suis dans la plus grande m&eacute;galopole du monde et il n&rsquo;y a pas un chat. Je me dirige vers le m&eacute;tro. Je vais pas tout expliquer le syst&egrave;me de rail au Japon mais en gros c&rsquo;est assez complexe car il existe plusieurs compagnies &agrave; se partager les tunnels, que se soit en train ou en m&eacute;tro. Pas de monopole comme pour SNCF et RATP. Heureusement les indications sont &eacute;crites en rōmaji: transcription de l&rsquo;alphabet japonais pour les occidentaux. Je peux donc suivre facilement mon plan du m&eacute;tro et rejoindre la sortie o&ugrave; je dois retrouver Gautier. Les sous-sols sont &eacute;normes, on y trouve de nombreux commerces et des toilettes gratuites. &Agrave; la borne de tickets, je ne trouve pas le pass trois jours que je voulais prendre, alors je me rabats sur un ticket unique. La tarification du m&eacute;tro japonais se fait en fonction de la distance &agrave; parcourir. Tout est assez simple au final. Dans la rame, passer un appel est interdit. Au fond de la voiture, une japonaise est habill&eacute;e traditionnellement, en kimono. Entre deux lignes je trouve un distributeur o&ugrave; je peux enfin retirer plus de monnaie.</p>\r\n<p>&nbsp;</p>\r\n<p>Et puis je refais surface, il fait beau! Par contre ce n&rsquo;est plus les chaleurs qu&rsquo;il y avait en Indon&eacute;sie, je retrouve les saisons et c&rsquo;est l&rsquo;automne. Miracle, pr&egrave;s d&rsquo;un b&acirc;timent je capte une connexion internet gratuite et je peux pr&eacute;venir Gautier. Il arrive cinq minutes plus tard. Toujours un plaisir de revoir des t&ecirc;tes connues pendant un long voyage surtout qu&rsquo;on ne s&rsquo;&eacute;tait pas vu depuis longtemps. Nos parents sont amis de longue date. Gautier s&rsquo;est <strong>expatri&eacute; au Japon</strong> il y a sept ans environ. Il y vit avec sa femme japonaise qu&rsquo;il a rencontr&eacute; lors de ses &eacute;tudes, en France. On arrive &agrave; l&rsquo;appartement. La cl&eacute; pour ouvrir est une carte perfor&eacute;e. On retire les chaussures &agrave; l&rsquo;entr&eacute;e selon les us et coutumes. &Agrave; l&rsquo;int&eacute;rieur, tout est bien pens&eacute; pour caser le maximum de choses dans un minimum de place. &laquo; Minimaliste &raquo; ils disent, les vendeurs d&rsquo;immobilier. Je dis bonjour &agrave; Kayoko et je file sous la douche. Pour l&rsquo;Europ&eacute;en que je suis, c&rsquo;est rigolo de voir une salle de bain Yamaha et des toilettes de l&rsquo;espace Panasonic. Ensuite je prends des forces avec un bol de c&eacute;r&eacute;ales et on sort pour trouver mon <span style="color: rgb(53, 152, 219);"><strong>futur compagnon de voyage : un v&eacute;lo</strong></span>!</p>', 'japon', 'japon voyage nuit', '2022-04-25 10:09:45');
/*!40000 ALTER TABLE `blogposts` ENABLE KEYS */;

-- Listage de la structure de la table galeriedubastion. comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `blogpost_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_comments_blogposts` (`blogpost_id`),
  KEY `FK_comments_users` (`user_id`),
  CONSTRAINT `FK_comments_blogposts` FOREIGN KEY (`blogpost_id`) REFERENCES `blogposts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_comments_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

-- Listage des données de la table galeriedubastion.comments : ~6 rows (environ)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `blogpost_id`, `user_id`, `content`, `created_at`) VALUES
	(57, 27, 10, 'J&#039;en rêve ! Pourvu que je puisse y aller un jour !', '2022-05-11 21:10:15'),
	(60, 25, 10, 'Le pont de San Francisco , un incontournable :)', '2022-05-11 21:12:00'),
	(61, 26, 6, 'De si belles régions si proche de chez nous finalement, merci de nous partager votre regard au travers de votre plume raffinée !', '2022-05-11 21:13:50'),
	(62, 26, 11, 'Ma prochaine destination pour des randonnées dans le nord du pays ! Merci pour les infos utiles.', '2022-05-11 21:16:31'),
	(63, 23, 11, 'Costaude la montée du Machu Picchu, bravo!', '2022-05-11 21:17:04'),
	(72, 27, 12, 'Quelle ambiance, merci de donner un aperçu bien différent de la vision classique du &quot;Japon , entre tradition et modernité&quot;. Le Japon est bien plus que ça :)', '2022-05-13 11:55:11');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Listage de la structure de la table galeriedubastion. contacts
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `objet` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Listage des données de la table galeriedubastion.contacts : ~0 rows (environ)
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` (`id`, `fullname`, `mail`, `phone`, `objet`, `content`, `created_at`) VALUES
	(7, 'Yvon Chouinard', 'chouinard@gmail.com', '+339089', 'Commande Patagonia', 'Avez vous reçu le bon de commande?', '2022-04-09 15:11:39');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;

-- Listage de la structure de la table galeriedubastion. portfolios
CREATE TABLE IF NOT EXISTS `portfolios` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `picture` varchar(500) NOT NULL,
  `title` varchar(500) NOT NULL,
  `category` varchar(500) NOT NULL,
  `alt` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- Listage des données de la table galeriedubastion.portfolios : ~9 rows (environ)
/*!40000 ALTER TABLE `portfolios` DISABLE KEYS */;
INSERT INTO `portfolios` (`id`, `picture`, `title`, `category`, `alt`, `created_at`) VALUES
	(19, 'jonatan-pie-EvKBHBGgaUo-unsplash.jpg', 'Nuances de vert 1/2', 'Paysage', 'landscape photography, aurores boreales, scandinavie', '2022-04-04 14:56:37'),
	(20, 'rebecca-orlov-epic-playdate-HGVtA1zSHo4-unsplash.jpg', 'Nuances de vert 2/2', 'Textures', 'textures vertes', '2022-04-04 14:57:12'),
	(21, 'daniel-frank-IT1KYLmKrnk-unsplash.jpg', 'Les pieds dans l\'eau', 'Paysage', 'village bord lac montagnes', '2022-04-19 18:44:15'),
	(22, 'steffi-harms-Cj0tPzC5Uic-unsplash.jpg', 'Nuances de bleu 1/2', 'Textures', 'vagues mer ocean bleu', '2022-04-19 18:44:39'),
	(23, 'solen-feyissa-thT613pglmM-unsplash.jpg', 'Nuances de bleu 2/2', 'Textures', 'sable bleu texture', '2022-04-19 18:44:46'),
	(24, '6264e0498bb246.34346567.jpg', 'Tournesols', 'Nature', 'tournesol jaune plantes', '2022-04-24 07:29:45'),
	(25, '6264e07e788fc4.79741862.jpg', 'Street poetry', 'architecture', 'street architecture building', '2022-04-24 07:30:38'),
	(26, '6264e0b915eff1.98387571.jpg', 'Portrait d&#039;Emilia', 'portrait', 'portrait femme de profil', '2022-04-24 07:31:37'),
	(27, '627691a652edc9.38020528.jpg', 'Collines d&#039;Asie', 'nature', 'nature collines', '2022-05-07 17:35:02');
/*!40000 ALTER TABLE `portfolios` ENABLE KEYS */;



/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
