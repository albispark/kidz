-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.1              
-- * Generator date: Dec  4 2018              
-- * Generation date: Thu Jan 14 18:37:32 2021 
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
     IDcategoria char(7) not null,
     IDprodotto char(7) not null,
     constraint IDappartenenza primary key (IDprodotto, IDcategoria));

create table CATEGORIA (
     IDcategoria char(7) not null,
     nome char(30) not null,
     constraint IDCATEGORIA primary key (IDcategoria));

create table incarrello (
     IDprodotto char(7) not null,
     IDuser char(7) not null,
     quantita int not null,
     constraint IDINCARRELLO primary key (IDprodotto, IDuser));

create table inwishlist (
     IDprodotto char(7) not null,
     IDuser char(7) not null,
     constraint IDINWISHLIST primary key (IDuser, IDprodotto));

create table NOTIFICA (
     IDnotifica char(7) not null,
     titolo char(40) not null,
     messaggio char(150) not null,
     data date not null,
     letto char not null,
     constraint IDNOTIFICA_C_ID primary key (IDnotifica));

create table PRODOTTO (
     IDprodotto char(7) not null,
     titolo char(30) not null,
     prezzo decimal(5,2) not null,
     quantita_scorta int not null,
     descrizione varchar(500) not null,
     taglia char(10) not null,
     eta int not null,
     constraint IDPRODOTTO_ID primary key (IDprodotto));

create table ricezione (
     IDnotifica char(7) not null,
     IDuser char(7) not null,
     constraint IDricezione primary key (IDuser, IDnotifica));

create table riferimento (
     IDprodotto char(7) not null,
     IDnotifica char(7) not null,
     constraint IDriferimento primary key (IDnotifica, IDprodotto));

create table UTENTE (
     IDuser char(7) not null,
     email char(30) not null,
     password char(30) not null,
     nome char(20) not null,
     cognome char(20) not null,
     admin char not null,
     constraint IDCLIENTE primary key (IDuser),
     constraint IDCLIENTE_1 unique (email));


-- Constraints Section
-- ___________________ 

alter table appartenenza add constraint FKapp_PRO
     foreign key (IDprodotto)
     references PRODOTTO (IDprodotto);

alter table appartenenza add constraint FKapp_CAT
     foreign key (IDcategoria)
     references CATEGORIA (IDcategoria);

alter table incarrello add constraint FKIN_USEC
     foreign key (IDuser)
     references UTENTE (IDuser);

alter table incarrello add constraint FKIN_PROC
     foreign key (IDprodotto)
     references PRODOTTO (IDprodotto);

alter table inwishlist add constraint FKIN_USEW
     foreign key (IDuser)
     references UTENTE (IDuser);

alter table inwishlist add constraint FKIN_PROW
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

alter table ricezione add constraint FKric_USE
     foreign key (IDuser)
     references UTENTE (IDuser);

alter table ricezione add constraint FKric_NOT
     foreign key (IDnotifica)
     references NOTIFICA (IDnotifica);

alter table riferimento add constraint FKrif_NOT
     foreign key (IDnotifica)
     references NOTIFICA (IDnotifica);

alter table riferimento add constraint FKrif_PRO
     foreign key (IDprodotto)
     references PRODOTTO (IDprodotto);


-- Index Section
-- _____________ 

