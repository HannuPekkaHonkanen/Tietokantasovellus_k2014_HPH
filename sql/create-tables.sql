CREATE TABLE Kayttaja (
	kayttajatunnus varchar(30) not null primary key,
	sahkoposti varchar(255) not null,
	salasana varchar(30) not null
);

CREATE TABLE Resepti (
	reseptiID varchar(20) not null primary key,		
	nimi varchar(100) not null,				
	kuvaus varchar(500),				
	raakaaineluokitus varchar(100) not null,				
	kayttotilanneluokitus varchar(100) not null,				
	annosmaara integer not null,				
	kuva varchar(500),				
	laatija varchar(30) not null,
        foreign key (laatija) references Kayttaja
);

CREATE TABLE Ateriakokonaisuus (
	ateriakokonaisuusID varchar(20) not null primary key,
	nimi varchar(255) not null,
	ohjeet varchar(500)
);

CREATE TABLE Ateriakokonaisuudet (
	ateriakokonaisuusID varchar(20) not null,
	reseptiID varchar(20) not null,
        primary key (ateriakokonaisuusID, reseptiID),
        foreign key (ateriakokonaisuusID) references Ateriakokonaisuus,
        foreign key (reseptiID) references Resepti
);

CREATE TABLE Raakaaine (
        raakaaineID varchar(20) not null primary key,
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
        reseptiID varchar(20) not null,
        jarjestysnumero integer not null,
        primary key (reseptiID, jarjestysnumero),
	nimi varchar(100) not null,				
	ohjeet varchar(500),
	kuva varchar(500),
        foreign key (reseptiID) references Resepti				
);

CREATE TABLE Maarat (
        reseptiID varchar(20) not null,
        vaihenumero integer not null,
        raakaaineID varchar(20) not null,
        primary key (reseptiID, vaihenumero, raakaaineID),
        maara integer not null,
        mittayksikko varchar(20) not null,
        foreign key (reseptiID) references Resepti,
        foreign key (raakaaineID) references Raakaaine,
        foreign key (reseptiID, vaihenumero) references Valmistusvaihe (reseptiID, jarjestysnumero)
--         foreign key () references Valmistusvaihe ()
);
