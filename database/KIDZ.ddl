-- *********************************************
-- * SQL MySQL generation
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.1
-- * Generator date: Dec  4 2018
-- * Generation date: Sun Dec 27 10:28:29 2020
-- * LUN file: C:\Users\Spark\Desktop\kidz\database\KIDZ.lun
-- * Schema: kidz/1
-- *********************************************


-- Database Section
-- ________________

create database kidz;
use kidz;


-- Tables Section
-- _____________

create table ADMIN (
     IDadmin char(7) not null,
     username char(10) not null,
     password char(30) not null,
     constraint IDADMIN primary key (IDadmin));

create table appartenenza (
     IDcategoria char(7) not null,
     IDprodotto char(7) not null,
     constraint IDappartenenza primary key (IDprodotto, IDcategoria));

create table CARRELLO (
     IDcarrello char(7) not null,
     IDcliente char(7) not null,
     constraint IDCARRELLO primary key (IDcarrello),
     constraint FKacquisto_ID unique (IDcliente));

create table CATEGORIA (
     IDcategoria char(7) not null,
     nome char(30) not null,
     constraint IDCATEGORIA primary key (IDcategoria));

create table CLIENTE (
     IDcliente char(7) not null,
     email char(30) not null,
     password char(30) not null,
     nome char(20) not null,
     cognome char(20) not null,
     constraint IDCLIENTE_ID primary key (IDcliente),
     constraint IDCLIENTE_1 unique (email));

create table composizione_acquisto (
     IDprodotto char(7) not null,
     IDcarrello char(7) not null,
     quantita int not null,
     constraint IDcomposizione_acquisto primary key (IDprodotto, IDcarrello));

create table composizione_desideri (
     IDprodotto char(7) not null,
     IDwishlist char(7) not null,
     constraint IDcomposizione_desideri primary key (IDwishlist, IDprodotto));

create table NOTIFICA_C (
     IDnotifica char(7) not null,
     titolo char(40) not null,
     messaggio char(150) not null,
     data date not null,
     constraint IDNOTIFICA_C_ID primary key (IDnotifica));

create table NOTIFICA_V (
     IDnotifica char(7) not null,
     titolo char(40) not null,
     messaggio char(150) not null,
     data date not null,
     IDprodotto char(7) not null,
     constraint IDNOTIFICA_V_ID primary key (IDnotifica));

create table PAROLA (
     termine char(20) not null,
     constraint IDPAROLA primary key (termine));

create table PRODOTTO (
     IDprodotto char(7) not null,
     titolo char(30) not null,
     prezzo decimal(5,2) not null,
     quantita_scorta int not null,
     descrizione varchar(500) not null,
     taglia char(10) not null,
     eta int not null,
     constraint IDPRODOTTO_ID primary key (IDprodotto));

create table ricerca (
     IDprodotto char(7) not null,
     termine char(20) not null,
     constraint IDricerca primary key (IDprodotto, termine));

create table ricezione_cliente (
     IDnotifica char(7) not null,
     IDcliente char(7) not null,
     constraint IDricezione_cliente primary key (IDcliente, IDnotifica));

create table ricezione_v (
     IDadmin char(7) not null,
     IDnotifica char(7) not null,
     constraint IDricezione_v primary key (IDnotifica, IDadmin));

create table riferimento (
     IDprodotto char(7) not null,
     IDnotifica char(7) not null,
     constraint IDriferimento primary key (IDnotifica, IDprodotto));

create table WISHLIST (
     IDwishlist char(7) not null,
     IDcliente char(7) not null,
     constraint IDWISHLIST primary key (IDwishlist),
     constraint FKdesideri_ID unique (IDcliente));


-- Constraints Section
-- ___________________

alter table appartenenza add constraint FKapp_PRO
     foreign key (IDprodotto)
     references PRODOTTO (IDprodotto);

alter table appartenenza add constraint FKapp_CAT
     foreign key (IDcategoria)
     references CATEGORIA (IDcategoria);

alter table CARRELLO add constraint FKacquisto_FK
     foreign key (IDcliente)
     references CLIENTE (IDcliente);

alter table composizione_acquisto add constraint FKcom_CAR
     foreign key (IDcarrello)
     references CARRELLO (IDcarrello);

alter table composizione_acquisto add constraint FKcom_a_PRO
     foreign key (IDprodotto)
     references PRODOTTO (IDprodotto);

alter table composizione_desideri add constraint FKcom_WIS
     foreign key (IDwishlist)
     references WISHLIST (IDwishlist);

alter table composizione_desideri add constraint FKcom_d_PRO
     foreign key (IDprodotto)
     references PRODOTTO (IDprodotto);

alter table NOTIFICA_V add constraint FKriferimento_v
     foreign key (IDprodotto)
     references PRODOTTO (IDprodotto);

alter table ricerca add constraint FKric_PAR
     foreign key (termine)
     references PAROLA (termine);

alter table ricerca add constraint FKric_PRO
     foreign key (IDprodotto)
     references PRODOTTO (IDprodotto);

alter table ricezione_cliente add constraint FKIDcliente
     foreign key (IDcliente)
     references CLIENTE (IDcliente);

alter table ricezione_cliente add constraint FKIDnotifica
     foreign key (IDnotifica)
     references NOTIFICA_C (IDnotifica);

alter table ricezione_v add constraint FKric_NOT
     foreign key (IDnotifica)
     references NOTIFICA_V (IDnotifica);

alter table ricezione_v add constraint FKric_ADM
     foreign key (IDadmin)
     references ADMIN (IDadmin);

alter table riferimento add constraint FKrif_NOT
     foreign key (IDnotifica)
     references NOTIFICA_C (IDnotifica);

alter table riferimento add constraint FKrif_PRO
     foreign key (IDprodotto)
     references PRODOTTO (IDprodotto);

alter table WISHLIST add constraint FKdesideri_FK
     foreign key (IDcliente)
     references CLIENTE (IDcliente);


-- Index Section
-- _____________
