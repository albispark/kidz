INSERT INTO `categoria`(`IDcategoria`, `nome`) VALUES 
('000000A', 'MARCHE'),
('000000B', 'PERSONAGGI'),
('000000C', 'COSTUMI'),
('000000D', 'GIOCHI'),
('000000E', 'NOVITA');

INSERT INTO `sottocategoria`(`IDsottocategoria`, `nome`, `IDcategoria`) VALUES 
('00000A0','LEGO','000000A'),
('00000B0','BARBIE','000000A'),
('00000C0', 'LOL','000000A'),
('00000D0','AVENGERS','000000A'),
('00000E0','BAMBOLE','000000D'),
('00000F0','CARNEVALE','000000C'),
('00000G0','FROZEN','000000B'),
('00000H0','NATALE','000000C');

INSERT INTO `utente`(`IDuser`, `email`, `password`, `nome`, `cognome`, `admin`) VALUES 
('A000000', 'albispark@gmail.com', 'albi98', 'Albi', 'Spahiu', 1),
('S000000', 'sofiaponi@gmail.com', 'sofia99', 'Sofia', 'Poni', 1),
('AN00000','angelopar@gmail.com','angelo','Angelo','Parrinello', 0);

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
('000N100','ORDINE SPEDITO', "L'ordine #456694 è stato spedito.", "2021-01-19"),
('000N200','PRODOTTO DISPONIBILE', "L'articolo che volevi è tornato disponibile.", "2021-01-11"),
('000N300','SALDI', "Approfitta degli sconti! Tantissimi prodotti a prezzi convenienti", "2020-12-24");

INSERT INTO `ricezione`(`IDuser`, `IDnotifica`, `visualizzato`) VALUES
('AN00000','000N300', 1),
('AN00000','000N100', 1),
('AN00000','000N200', 0);