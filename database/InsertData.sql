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
('00000H0','NATALE','000000C');

INSERT INTO `utente`(`IDuser`, `email`, `password`, `nome`, `cognome`, `admin`, `salt`) VALUES 
('7025032', 'albertspayu@gmail.com', '8ab994691eb4fa8d3c952aa8bece4fde446890ccbaffdbe9e5cb32f0c0d240d1f1c989735efa1df2882caa56715f390cf64af46791d4b21a5dca0d9599aea592', 'Albi', 'Spahiu', 1,'673a6ec2902d6754fd753a186d76e37b540999ab689e61d19cc1ad0396f58acb5fccaf9990a70b89306e89f83bac694e87d40dc32bdc7cd1b87cd622bb260b2d'),
('8965371', 'sofiaponi99@gmail.com', '3b271fa35b66a572c5943b6e20753a0633dadcf84d92c9670b2096e913885d6e1379f6c58bd53e7743a2481520f7530a28c5494f4a802a9cda2b6f4d6879c225', 'Sofia', 'Poni', 1), '20a3428df1188b5764833894f483646b23f89ddd5459728f37c6a8875301474b545f29bf2146edb3dc630a5fd648ba22404519b413fba78f712bd03474852892',
('1515543','angelopar@gmail.com','dc7c80f874e84e409060d54fa0298de6899b6429db35ab1d9352cc46ac917591d20578129c3693e2e01481ef2121de5c69e84d5324fc732eaf034895a1f4417e','Angelo','Parrinello', 0, '1037742538cf30585fc8cced4f1724b470c7189477e5c1212a906aa2420af125166a624b4a5d1434a9ff87b46d7642171607282120be085e7fd6623f6643fd36'),
('3079171','lucaponi@gmail.com','17312f507286d69aeff84e55aecfe9c475801bb23e59507dd19650ecc069064fdef4c15771fd84bfbec6d519c9cc3e7c4ebac15373659f31a0c46aa6a152393d','Angelo','Parrinello', 0, '583327a1f2ed2121a7223dc09130d341092782c0dddd9c545953a2efb2de430080b7346fa3a74aafa0e53443422764d5a021aa39f42ae44ece1c58b0e1a9a4c8')
;

INSERT INTO `prodotto`(`IDprodotto`, `titolo`, `prezzo`, `quantita_scorta`, `descrizione`, `taglia`, `eta`, `immagine`, `sesso`) VALUES 
('01A0000', 'Bici bimbo 16” Avengers', 119.00, 8, 'BICI BIMBO MISURA 16” – AVENGERS – 2 FRENI – ruote in acciaio – gomme Gonfiabili – Ruota libera

Articolo voluminoso che non usufruisce delle spese di spedizione gratuite: le spese, ad eccezione che per la consegna al punto vendita, verranno addebitate', 'U', 5, 'bici.jpg', 'M'),

('02A0000', 'Cassa Barbie', 35.00, 8, 'Il registratore di cassa di Barbie ha tanti accessori ed effetti sonori: giocare a fare shopping con le tue amiche non è mai stato così divertente!', 'U', 5, 'cassa.jpg', 'F'),

('03A0000', 'Barbie Bambola', 28.00, 5, 'Crea stili spumeggianti e colorati per i capelli di questa bambola Barbie!
I giovani stilisti adesso possono creare tantissimi look alla moda con la bambola Barbie Capelli Arcobaleno, dai capelli biondi, lunghi addirittura 19 cm!', 'U', 5, 'barbie.jpg', 'F'),


('04A0000', 'Elsa classic', 17.00, 5, 'costume di ottima qualità, curato nei dettagli, sarai la più bella, una vera e propria principessa.', 'U', 4, 'elsa.jpg', 'F'),

('05A0000', 'Costume Elsa e Anna', 63.00, 4, ' Questo cofanetto regalo di Frozen 2 è composto da due costumi di Elsa e Anna per bambina in licenza ufficiale. Il costume di anna è composto da un vestito con cintura e mantello (scarpe e parrucca non incluse). 

Il costume di Elsa è composto da un vestito azzurro ed un mantello trasparente. Sarà un confanetto regalo di Frozen 2 perfetto per carnevale o per una festa di compleanno a tema Frozen!', 'U', 4, 'cofanetto.png', 'F');

INSERT INTO `appartenenza`(`IDprodotto`, `IDsottocategoria`) VALUES
('01A0000','00000D0'),
('02A0000','00000B0'),
('03A0000','00000B0'),
('03A0000','00000E0'),
('04A0000','00000F0'),
('04A0000','00000G0'),
('05A0000','00000G0'),
('05A0000','00000H0');

INSERT INTO `notifica`(`IDnotifica`, `titolo`, `messaggio`, `data`) VALUES
('000N100','ORDINE EFFETTUATO', "L'ordine è stato effettuato. Stiamo preparando la spedizione.", "2021-01-19"),
('000N400','PRODOTTO TERMINATO', "Le scorte del prodotto sono terminate. Provvedi a un nuovo rifornimento", "2021-01-9"),
('BENVENU','BENVENUTO', "Grazie per esserti unito a noi!", "2000-01-01");


INSERT INTO `ricezione`(`IDuser`, `IDnotifica`, `visualizzato`) VALUES
('AN00000','BENVENU', 1),
('AN00000','000N100', 1),
('S000000','000N400', 0),
('AN00000','000N100', 0);