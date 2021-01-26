INSERT INTO `categoria`(`IDcategoria`, `nome`) VALUES 
('000000A', 'Marche'),
('000000B', 'Personaggi'),
('000000C', 'Costumi'),
('000000D', 'Giochi');

INSERT INTO `sottocategoria`(`IDsottocategoria`, `nome`, `IDcategoria`) VALUES 
('00000A0','LEGO','000000A'),
('00000B0','BARBIE','000000A'),
('00000C0', 'LOL','000000A'),
('00000D0','AVENGERS','000000A'),
('00000E0','BAMBOLE','000000D'),
('00000F0','CARNEVALE','000000C'),
('00000G0','FROZEN','000000B'),
('00000H0','NATALE','000000C'),
('00000I0','STAR WARS','000000B');

INSERT INTO `utente`(`IDuser`, `email`, `password`, `nome`, `cognome`, `admin`, `salt`) VALUES 
('7025032', 'albertspayu@gmail.com', '8ab994691eb4fa8d3c952aa8bece4fde446890ccbaffdbe9e5cb32f0c0d240d1f1c989735efa1df2882caa56715f390cf64af46791d4b21a5dca0d9599aea592', 'Albi', 'Spahiu', 1,'673a6ec2902d6754fd753a186d76e37b540999ab689e61d19cc1ad0396f58acb5fccaf9990a70b89306e89f83bac694e87d40dc32bdc7cd1b87cd622bb260b2d'),
('8965371', 'sofiaponi99@gmail.com', '3b271fa35b66a572c5943b6e20753a0633dadcf84d92c9670b2096e913885d6e1379f6c58bd53e7743a2481520f7530a28c5494f4a802a9cda2b6f4d6879c225', 'Sofia', 'Poni', 1,'20a3428df1188b5764833894f483646b23f89ddd5459728f37c6a8875301474b545f29bf2146edb3dc630a5fd648ba22404519b413fba78f712bd03474852892'),
('1515543','angelopar@gmail.com','dc7c80f874e84e409060d54fa0298de6899b6429db35ab1d9352cc46ac917591d20578129c3693e2e01481ef2121de5c69e84d5324fc732eaf034895a1f4417e','Angelo','Parrinello', 0, '1037742538cf30585fc8cced4f1724b470c7189477e5c1212a906aa2420af125166a624b4a5d1434a9ff87b46d7642171607282120be085e7fd6623f6643fd36'),
('3079171','lucaponi@gmail.com','17312f507286d69aeff84e55aecfe9c475801bb23e59507dd19650ecc069064fdef4c15771fd84bfbec6d519c9cc3e7c4ebac15373659f31a0c46aa6a152393d','Angelo','Parrinello', 0, '583327a1f2ed2121a7223dc09130d341092782c0dddd9c545953a2efb2de430080b7346fa3a74aafa0e53443422764d5a021aa39f42ae44ece1c58b0e1a9a4c8');

INSERT INTO `prodotto`(`IDprodotto`, `titolo`, `prezzo`, `quantita_scorta`, `descrizione`, `taglia`, `eta`, `immagine`, `sesso`) VALUES

('02A0000', 'Cassa Barbie', 35.00, 8, 'Il registratore di cassa di Barbie ha tanti accessori ed effetti sonori: giocare a fare shopping con le tue amiche non è mai stato così divertente!', 'U', 5, 'cassa.jpg', 'F'),

('03A0000', 'Barbie Bambola', 28.00, 5, 'Crea stili spumeggianti e colorati per i capelli di questa bambola Barbie!
I giovani stilisti adesso possono creare tantissimi look alla moda con la bambola Barbie Capelli Arcobaleno, dai capelli biondi, lunghi addirittura 19 cm!', 'U', 5, 'barbie.jpg', 'F'),


('04A0000', 'Elsa classic', 17.00, 5, 'costume di ottima qualità, curato nei dettagli, sarai la più bella, una vera e propria principessa.', 'U', 4, 'elsa.jpg', 'F'),

('05A0000', 'Costume Elsa e Anna', 63.00, 4, ' Questo cofanetto regalo di Frozen 2 è composto da due costumi di Elsa e Anna per bambina in licenza ufficiale. Il costume di anna è composto da un vestito con cintura e mantello (scarpe e parrucca non incluse). 

Il costume di Elsa è composto da un vestito azzurro ed un mantello trasparente. Sarà un confanetto regalo di Frozen 2 perfetto per carnevale o per una festa di compleanno a tema Frozen!', 'U', 4, 'cofanetto.png', 'F'),

('06A0000', 'Casco Stormtrooper', 64.00, 10, 'Ricrea ogni dettaglio iconico di un casco Stormtrooper con questo modello da esposizione in mattoncini, che fa parte di una serie LEGO® Star Wars™ da collezione per adulti.', 'U', 18, 'stormtrooper.jpg', 'U'),

('07A0000', 'Casco Boba Fett', 64.00, 15, 'Crea un fantastico casco Boba Fett, parte di una serie di modelli da costruire ed esporre Star Wars™ di realizzati con mattoncini LEGO® per adulti e qualsiasi costruttore avanzato.', 'U', 18, 'boba.jpg', 'U'),

('08A0000', 'Yoda', 109.00, 3, 'Partecipa ad avvincenti battaglie Star Wars™ con il Maestro Jedi Yoda costruibile! Sarà anche fatto di mattoncini LEGO®, ma con la sua potente spada laser questo grande personaggio LEGO di Yoda è una forza da non sottovalutare. Muovi la testa, le sopracciglia, le dita delle mani e dei piedi per metterlo in una vera posa da Maestro Jedi! Questo set contiene anche un espositore e una piccola minifigure di Yoda con spada laser.', 'U', 18, 'yoda.jpg', 'U'),

('09A0000', 'Barbie Pizzaiola', 39.00, 5, 'Barbie pizzaiola è pronta a divertirsi nella sua piccola pizzeria, con la pasta da modellare in tre colori e gli accessori per far preparare ai bimbi tante gustose mini-pizze per le loro bambole! Le piccole appassionate di cucina possono inserire la pasta da modellare nella pressa, aggiungere la “salsa” e la “mozzarella”, tagliare la pizza a fette e servirla — dopo aver fatto pagare il conto alla cassa naturalmente! Include Barbie con completo da pizzaiola e accessori, pizzeria con postazioni e funzioni attivabili, pasta da modellare in tre colori diversi ed accessori a tema che includono utensili e registratore di cassa.', 'U', 3, 'barbie-pizzaiola.jpg', 'F'),

('10A0000', 'Monopattino LOL', 29.00, 7, 'Monopattino supercolorato personalizzato con le bamboline più alla moda di sempre! sali sopra la pedana antiscivolo, afferra le morbide manopole e via! dotato di freno posteriore per viaggiare in tutta sicurezza e pratica chiusura compatta per portarlo sempre con te! inclusi nella confezione gli esclusivi sticker surprise!', 'U', 5, 'monopattino-lol.jpg', 'F'),

('11A0000', 'Braccialetti LOL', 7.00, 10, 'Un prezioso kit per realizzare bracciali delle lol.con tanti braccialetti in plastica colorata da decorare con polvere glitter, gemmine e adesivi personalizzati… per uno stile unico!stimola la manualità e la creatività delle bambine.', 'U', 3, 'braccialetti-lol.jpg', 'F'),

('12A0000', 'Scudo Cap. America', 16.00, 5, 'Ideale per trasformarti nel tuo super eroe preferito. Prodotto in poliestere.', 'U', 6, 'scudo-cap.jpg', 'M'),

('13A0000', 'Cicciobello Olaf', 69.00, 15, 'Direttamente dal film Frozen II Cicciobello in versione OLAF! Con il simpatico vestito è pronto per il freddo inverno. Senza il suo ciuccio piange.', 'U', 3, 'cicciobello-olaf.jpg', 'F'),

('14A0000', 'Portagioie di Elsa', 39.00, 143, 'Realizza il tuo bellissimo Portagioielli Frozen II ispirato al castello di ghiaccio di Elsa e custodisci tutti i tuoi tesori! Ruota la piattaforma e osserva Elsa e il Nokk, un mitico spirito acquatico, girare intorno allo specchio. Solleva la speciale chiusura per aprire il cassetto e riporre i tuoi gioielli: ci sono 2 nuovi anelli LEGO® al suo interno da aggiungere alla tua collezione!', 'U', 6, 'gioielli-elsa-lego.jpg', 'F'),

('15A0000', 'Elsa fronte gigantesca', 59.00, 65, 'Rivivi le avventure di Frozen con Elsa alta 90 cm! Il suo vestito impreziosito di fiocchi di neve luccicanti è proprio come quello del film Disney Frozen.', 'U', 3, 'elsa-fronte-gigante.jpg', 'F'),

('16A0000', 'Bing Bunny', 24.00, 38, 'Costume da coniglio per bambino 6-9 anni', 'U', 6, 'bing-bunny.jpg', 'M');

INSERT INTO `appartenenza`(`IDprodotto`, `IDsottocategoria`) VALUES
('02A0000','00000B0'),
('03A0000','00000B0'),
('03A0000','00000E0'),
('04A0000','00000F0'),
('04A0000','00000G0'),
('05A0000','00000G0'),
('05A0000','00000H0'),
('06A0000','00000I0'),
('06A0000','00000A0'),
('07A0000','00000I0'),
('07A0000','00000A0'),
('08A0000','00000I0'),
('08A0000','00000A0'),
('09A0000','00000E0'),
('09A0000','00000B0'),
('10A0000','00000C0'),
('11A0000','00000C0'),
('12A0000','00000D0'),
('13A0000','00000E0'),
('13A0000','00000G0'),
('14A0000','00000G0'),
('14A0000','00000A0'),
('15A0000','00000G0'),
('15A0000','00000E0'),
('16A0000','00000F0');


INSERT INTO `notifica`(`IDnotifica`, `titolo`, `messaggio`, `data`) VALUES
('000N100','ORDINE EFFETTUATO', "L'ordine è stato effettuato. Stiamo preparando la spedizione.", "2021-01-19"),
('000N400','PRODOTTO TERMINATO', "Le scorte del prodotto sono terminate. Provvedi a un nuovo rifornimento", "2021-01-9"),
('BENVENU','BENVENUTO', "Grazie per esserti unito a noi!", "2000-01-01");


INSERT INTO `ricezione`(`IDuser`, `IDnotifica`, `visualizzato`) VALUES
('1515543','BENVENU', 1),
('1515543','000N100', 1),
('1515543','000N400', 0);