CREATE TABLE Kayttaja (
	kayttajaid serial primary key,		
	kayttajatunnus varchar(30) not null unique,
	salasana varchar(30) not null,
	sahkoposti varchar(255) not null
);

CREATE TABLE Resepti (
	reseptiid serial primary key,		
	nimi varchar(100) not null,				
	kuvaus varchar(500),				
	raakaaineluokitus varchar(100) not null,				
	kayttotilanneluokitus varchar(100) not null,				
	annosmaara integer not null,				
	kuva varchar(500),				
        kayttajaid integer,
        foreign key (kayttajaid) references Kayttaja
);

CREATE TABLE Ateriakokonaisuus (
	ateriakokonaisuusid serial primary key,
	nimi varchar(255) not null,
	ohjeet varchar(500)
);

CREATE TABLE Ateriakokonaisuudet (
	ateriakokonaisuusid integer,
	reseptiid integer,
        primary key (ateriakokonaisuusid, reseptiid),
        foreign key (ateriakokonaisuusid) references Ateriakokonaisuus,
        foreign key (reseptiid) references Resepti
);

CREATE TABLE Raakaaine (
        raakaaineid serial primary key,
	nimi varchar(100) not null unique,				
        yksikkohinta real
--         tilavuuspaino real,
--         kappalepaino real,
--         energiaa real,
--         proteiinia real,
--         hyvaaRasvaa real,
--         pahaaRasvaa real,
--         hiilihydraatteja real,
--         joistaSokereita real,
--         joistaLaktoosia real,
--         ravintokuitua real,
--         suolaa real
);

CREATE TABLE Valmistusvaihe (
        reseptiid integer,
        vaihenumero serial,
        primary key (reseptiid, vaihenumero),
	nimi varchar(100) not null,				
	ohjeet varchar(500),
	kuva varchar(500),
        foreign key (reseptiid) references Resepti				
);

CREATE TABLE Maara (
        reseptiid integer,
        vaihenumero integer,
        raakaaineid integer,
        primary key (reseptiid, vaihenumero, raakaaineid),
        maara real not null,
        mittayksikko varchar(20) not null,
        foreign key (reseptiid) references Resepti,
        foreign key (raakaaineid) references Raakaaine,
        foreign key (reseptiid, vaihenumero) references Valmistusvaihe (reseptiid, vaihenumero)
);
