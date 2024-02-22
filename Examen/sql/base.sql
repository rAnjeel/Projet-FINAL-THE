create database db_p16_ETU002603;
use db_p16_ETU002603;

create table admin(
    idAdmin int primary key auto_increment,
    nomAdmin varchar(100),
    email varchar(100),
    pwd varchar(50),
    statut varchar(50)
);

create table variete(
    idVariete int primary key auto_increment,
    nomVariete varchar(50),
    occupation decimal(10,2),
    rendement decimal(10,2),
    prixVente decimal(10,2)
);

create table the(
    idThe int primary key auto_increment,
    nomThe varchar(50),
    idVariete int,
    foreign key(idVariete) references variete(idVariete) 
);

create table parcelle(
    idParcelle int primary key auto_increment,
    surface decimal(20,2),
    idVariete int,
    foreign key(idVariete) references variete(idVariete)
);

create table cueilleur(
    idCueilleur int primary key auto_increment,
    nomCueilleur varchar(50),
    genre varchar(50),
    dateDeNaissance date,
    poidsMin decimal(10,2)
);

create table categDepense(
    idCateg int primary key auto_increment,
    nomCateg varchar(50)
);

create table depense(
    idDepense int primary key auto_increment,
    idCateg int, 
    dateDepense date,
    montant decimal(10,2),
    foreign key(idCateg) references categDepense(idCateg)
);

create table cueillette(
    idCueillette int primary key auto_increment,
    dateCueillette date,
    idCueilleur int,
    idParcelle int,
    poids decimal(10,2),
    foreign key(idCueilleur) references cueilleur(idCueilleur),
    foreign key(idParcelle) references parcelle(idParcelle)
);

create table salaire(
    idSalaire int primary key auto_increment,
    idCueilleur int,
    salaire decimal(10,2),
    foreign key(idCueilleur) REFERENCES cueilleur(idCueilleur)
);

create table regeneration(
    idRegeneration int primary key auto_increment,
    idMois int,
    idThe int,
    foreign key(idThe) references the(idThe)
);

create table pointCueilleur(
    idPoint int primary key auto_increment,
    bonus decimal(10,2),
    malus decimal(10,2)
);

create table paiement(
    idPaiement int primary key auto_increment,
    idCueilleur int,
    datePaiement date,
    poids decimal(10,2),
    bonus decimal(10,2),
    malus decimal(10,2),
    montant decimal(10,2),
    foreign key(idCueilleur) REFERENCES cueilleur(idCueilleur)
);

insert into admin values ('null','Thomis', 'thomis@gmail.com', '1234', 'admin');
insert into admin values ('null','Angelo', 'angelo@gmail.com', '1234', 'user');

insert into variete values('null', 'the vert', '3', '10', '1500');
insert into variete values('null', 'the noir', '3', '10', '1500');
insert into variete values('null', 'the poivré', '2', '7', '2000');

insert into the values('null', 'ravinstara', '1');
insert into the values('null', 'matcha', '1');
insert into the values('null', 'camellia', '2');
insert into the values('null', 'theier dassam', '2');

insert into cueilleur values('null', 'justin', 'homme', '1980-03-02', '10');
insert into cueilleur values('null', 'marie', 'femme', '1985-03-02', '10');
insert into cueilleur values ('null','Tsanta','femme','1-1-2000', '10');

insert into parcelle values('null', '25', '1');
insert into parcelle values('null', '10', '2');

insert into cueillette values('null', '2023-12-25', '1', '1', '1');
insert into cueillette values('null', '2023-12-26', '1', '1', '2');

insert into categDepense values('null', 'engrais');
insert into categDepense values('null', 'logistique');
insert into categDepense values('null', 'transport');
insert into categDepense values('null', 'essence');

insert into depense values('null', '1', '2023-12-25', '25000');
insert into depense values('null', '2', '2023-12-28', '50000');
insert into depense values('null', '2', '2024-01-02', '74000');
insert into depense values('null', '3', '2024-01-02', '100000');
insert into depense values('null', '4', '2024-02-12', '80000');

insert into cueillette values ('null', '2023-12-24', '1', '1', '2000');
insert into cueillette values ('null', '2023-12-24', '2', '2', '800');
insert into cueillette values ('null', '2024-01-05', '1', '1', '1800');
insert into cueillette values ('null', '2024-01-24', '3', '2', '590');
insert into cueillette values ('null', '2023-02-12', '2', '1', '40');

insert into salaire values ('null', '1', '26000');
insert into salaire values ('null', '2', '18640');
insert into salaire values ('null', '3', '25000');

insert regeneration values('null', '1', '1');
insert regeneration values('null', '12', '1');
insert regeneration values('null', '7', '4');
insert regeneration values('null', '10', '3');
insert regeneration values('null', '3', '2');

insert into pointCueilleur values('null', '16', '30');




