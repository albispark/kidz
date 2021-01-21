-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.1              
-- * Generator date: Dec  4 2018              
-- * Generation date: Mon Jan 18 14:57:07 2021 
-- * LUN file: C:\Users\Spark\Desktop\kidz\database\KIDZ.lun 
-- * Schema: KIDZ/1 
-- ********************************************* 


-- Database Section
-- ________________ 

create database KIDZ;
use KIDZ;


-- Tables Section
-- _____________ 

create table appartenenza (
     IDprodotto char(7) not null,
     IDsottocategoria char(7) not null,
     constraint IDappartenenza primary key (IDprodotto, IDsottocategoria));

create table CATEGORIA (
     IDcategoria char(7) not null,
     nome char(30) not null,
     constraint IDCATEGORIA primary key (IDcategoria));

create table IN_CARRELLO (
     IDprodotto char(7) not null,
     IDuser char(7) not null,
     quantita int not null,
     constraint IDIN_CARRELLO primary key (IDprodotto, IDuser));

create table IN_WISHLIST (
     IDprodotto char(7) not null,
     IDuser char(7) not null,
     constraint IDIN_WISHLIST primary key (IDuser, IDprodotto));

create table NOTIFICA (
     IDnotifica char(7) not null,
     titolo char(40) not null,
     messaggio varchar(150) not null,
     data date not null,
     constraint IDNOTIFICA_C_ID primary key (IDnotifica));

create table PRODOTTO (
     IDprodotto char(7) not null,
     titolo char(25) not null,
     prezzo decimal(5,2) not null,
     quantita_scorta int not null,
     descrizione varchar(500) not null,
     taglia char(10) not null,
     eta int not null,
     immagine char(25) not null,
     sesso char(1) not null,
     constraint IDPRODOTTO_ID primary key (IDprodotto));

create table ricezione (
     IDuser char(7) not null,
     IDnotifica char(7) not null,
     constraint IDricezione primary key (IDuser, IDnotifica));

create table riferimento (
     IDprodotto char(7) not null,
     IDnotifica char(7) not null,
     constraint IDriferimento primary key (IDnotifica, IDprodotto));

create table SOTTOCATEGORIA (
     IDsottocategoria char(7) not null,
     nome char(30) not null,
     IDcategoria char(7) not null,
     constraint IDCATEGORIA primary key (IDsottocategoria));

create table UTENTE (
     IDuser char(7) not null,
     email char(30) not null,
     password char(30) not null,
     nome char(20) not null,
     cognome char(20) not null,
     admin tinyint(1) not null,
     constraint IDCLIENTE primary key (IDuser),
     constraint IDCLIENTE_1 unique (email));


-- Constraints Section
-- ___________________ 

alter table appartenenza add constraint FKapp_SOT
     foreign key (IDsottocategoria)
     references SOTTOCATEGORIA (IDsottocategoria);

alter table appartenenza add constraint FKapp_PRO
     foreign key (IDprodotto)
     references PRODOTTO (IDprodotto);

alter table IN_CARRELLO add constraint FKINCAR__UTE
     foreign key (IDuser)
     references UTENTE (IDuser);

alter table IN_CARRELLO add constraint FKINCAR__PRO
     foreign key (IDprodotto)
     references PRODOTTO (IDprodotto);

alter table IN_WISHLIST add constraint FKINWISH__UTE
     foreign key (IDuser)
     references UTENTE (IDuser);

alter table IN_WISHLIST add constraint FKINWISH__PRO
     foreign key (IDprodotto)
     references PRODOTTO (IDprodotto);

-- Not implemented
-- alter table NOTIFICA add constraint IDNOTIFICA_C_CHK
--     check(exists(select * from ricezione
--                  where ricezione.IDnotifica = IDnotifica)); 

-- Not implemented
-- alter table PRODOTTO add constraint IDPRODOTTO_CHK
--     check(exists(select * from appartenenza
--                  where appartenenza.IDprodotto = IDprodotto)); 

alter table ricezione add constraint FKric_NOT
     foreign key (IDnotifica)
     references NOTIFICA (IDnotifica);

alter table ricezione add constraint FKric_UTE
     foreign key (IDuser)
     references UTENTE (IDuser);

alter table riferimento add constraint FKrif_NOT
     foreign key (IDnotifica)
     references NOTIFICA (IDnotifica);

alter table riferimento add constraint FKrif_PRO
     foreign key (IDprodotto)
     references PRODOTTO (IDprodotto);

alter table SOTTOCATEGORIA add constraint FKdi_tipo
     foreign key (IDcategoria)
     references CATEGORIA (IDcategoria);


-- Index Section
-- _____________ 

