CREATE TABLE Kayttaja (
	kayttajaID serial primary key,		
	kayttajatunnus varchar(30) not null,
	salasana varchar(30) not null,
	sahkoposti varchar(255) not null
);

CREATE TABLE Resepti (
	reseptiID serial primary key,		
	nimi varchar(100) not null,				
	kuvaus varchar(500),				
	raakaaineluokitus varchar(100) not null,				
	kayttotilanneluokitus varchar(100) not null,				
	annosmaara integer not null,				
	kuva varchar(500),				
-- 	laatija varchar(30) not null,
        kayttajaID serial,
        foreign key (kayttajaID) references Kayttaja
);

CREATE TABLE Ateriakokonaisuus (
	ateriakokonaisuusID serial primary key,
	nimi varchar(255) not null,
	ohjeet varchar(500)
);

CREATE TABLE Ateriakokonaisuudet (
	ateriakokonaisuusID serial,
	reseptiID serial,
        primary key (ateriakokonaisuusID, reseptiID),
        foreign key (ateriakokonaisuusID) references Ateriakokonaisuus,
        foreign key (reseptiID) references Resepti
);

CREATE TABLE Raakaaine (
        raakaaineID serial primary key,
	nimi varchar(100) not null,				
        yksikkohinta integer,
        energiaa integer,
        proteiinia integer,
        hyvaaRasvaa integer,
        pahaaRasvaa integer,
        hiilihydraatteja integer,
        joistaSokereita integer,
        joistaLaktoosia integer,
        ravintokuitua integer,
        suolaa integer
);

CREATE TABLE Valmistusvaihe (
        reseptiID serial,
        jarjestysnumero integer not null,
        primary key (reseptiID, jarjestysnumero),
	nimi varchar(100) not null,				
	ohjeet varchar(500),
	kuva varchar(500),
        foreign key (reseptiID) references Resepti				
);

CREATE TABLE Maarat (
        reseptiID serial,
        vaihenumero integer not null,
        raakaaineID serial,
        primary key (reseptiID, vaihenumero, raakaaineID),
        maara integer not null,
        mittayksikko varchar(20) not null,
        foreign key (reseptiID) references Resepti,
        foreign key (raakaaineID) references Raakaaine,
        foreign key (reseptiID, vaihenumero) references Valmistusvaihe (reseptiID, jarjestysnumero)
);
