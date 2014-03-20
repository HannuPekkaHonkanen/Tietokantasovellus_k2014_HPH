/*
Taulu Resepti sisältää yksittäisten reseptien tietoja
*/
CREATE TABLE Resepti (
	reseptiID varchar(20) not null primary key,		// reseptille generoitu tunnus
	nimi varchar(120) not null,				// reseptin nimi
	lisaamisajankohta date not null, 			// aika, jolloin resepti on lisätty
	esivalmisteluaika integer,				// esivalmisteluun kuluva aika minuuteissa
	kokkausaika integer,					// varsinaiseen kokkaukseen kuluva aika
								// minuuteissa
	annostenmaara integer,					// kuinka monelle henkilölle resepti on 									// tarkoitettu
	vaikeus integer,						// reseptin vaikeustaso
	laatija varchar(20) not null,				// kuka on lisännyt reseptin arkistoon
	paaraaka-aine varchar(50)	,			// mikä on reseptin pääraaka-aine (liha, kala, 								// peruna, jne.)
	kuvaus varchar(1000),					// käyttäjän kirjoittama reseptin kuvaus
	valmistustapa varchar(50)	,			// paistetaanko, keitetäänkö jne.
	foreign key (laatija) references Kayttaja,
	foreign key (paaraaka-aine) references Paaraaka_aine
);
/*
Sisältää reseptien pääraaka-ainevaihtoehdot
*/
CREATE TABLE Paaraaka-aine (
paaraaka-aineID varchar(50) not null primary key	// Pääraaka-aineen nimi
);


/*
Sisältää palveluun rekisteröityneiden asiakkaiden tietoja
*/
CREATE TABLE Kayttaja (
kayttajaTunnus varchar(20) not null primary key,	// käyttäjän valitsema nimi
suosikitnakyy boolean not null,				// näkyvätkö käyttäjän suosikit
sahkoposti varchar(80) not null,				// käyttäjän sähköpostiosoite
salasana varchar(18) not null				// käyttäjän salasana
);


/*
Sisältää käyttäjien arviot resepteistä
*/
CREATE TABLE Arvostelu (
primary key(arvostelija, reseptiID),
arvostelija varchar(20) not null,
reseptiID varchar(20) not null,		
tahtimaara integer not null,				// paljonko annettiin tähtiä
foreign key(arvostelija) references Kayttaja,		// arvostelun tekijä
foreign key(reseptiID) references Resepti		// mitä reseptiä arvosteltiin
);


/*
Pitää kirjaa käyttäjien suosikkiresepteistä
*/
CREATE TABLE Suosikki (
primary key(kayttaja, reseptiID),
kayttaja varchar(20) not null,				// Kenen suosikki
reseptiID varchar(20) not null,				// Mikä resepti on suosikki
foreign key(kayttaja) references Kayttaja,	
foreign key(reseptiID) references Resepti		
);


/*
Kertoo reseptin raaka-aineiden määrät ja mittayksiköt
*/
CREATE TABLE Maarat (
primary key(reseptiID,  vaiheNro,  raaka-aineID),
maara integer,						// numeerinen arvo
mittayksikko varchar(15),				// mitä yksikköä käytetään
reseptiID varchar(20) not null,				// mihin reseptiin liittyy
raaka-aineID varchar(20) not null,			// minkä raaka-aineen määrä
vaiheNro integer not null,				// mihin vaiheeseen liittyy
foreign key(reseptiID) references Resepti,				
foreign key(raaka-aineID) references Raaka-aine,			
foreign key(reseptiID, vaiheNro) references Valmistusvaihe	
);

/*
Sisältää tietoja raaka-aineista
*/
CREATE TABLE Raaka-aine (
raaka-aineID varchar(20) not null primary key,		// raaka-aineen generoitu tunnus
kuvaus varchar(200)					// vapaamuotoinen kuvaus
);


/*
Abstrakti taulu, joka toimii taulujen Kuva ja Video
yliluokkana
*/
CREATE TABLE Media (
reseptiID varchar(20),					// mihin reseptiin kuuluu
jarjestysnumero integer,					// mihin valmistusvaiheeseen media liittyy
URL varchar(1000) not null primary key,			// median URL
foreign key(reseptiID) references Resepti,					
foreign key(reseptiID, jarjestysnumero) references Valmistusvaihe	
);


/*
Kaikki mm. resepteihin liitetyt videot
*/
CREATE TABLE Video (
URL varchar(1000) not null primary key,			// videon URL
foreign key(URL) references Media	
);


/*
Kaikki mm. raaka-aineisiin liitetyt kuvat
*/
CREATE TABLE Kuva (
URL varchar(1000) not null primary key,			// kuvan URL
raaka-aineID varchar(20),				// mihin raaka-aineeseen liittyy
foreign key(URL) references Media,			
foreign key(raaka-aineID) references Raaka-aine
);


/*
Resepteihin liittyviä valmistusvaihteita järjestyksessä
*/
CREATE TABLE Valmistusvaihe (
primary key(reseptiID, jarjestysnumero),
nimi varchar (120),
reseptiID varchar(20) not null,				// minkä reseptin valmistusvaihe
kuvaus varchar(3000),					// valmistusvaiheen tekstikuvaus
jarjestysnumero integer not null,				// tällä pidetään yllä valmistusvaiheiden 									// järjestystä
foreign key(reseptiID) references Resepti		
);

/*
Aputaulu, jolla kootaan tiettyyn ateriakokonaisuuteen liittyvät reseptit
*/
CREATE TABLE Ateriakokonaisuudet(
primary key(ateriakokonaisuusID, reseptiID),
ateriakokonaisuusID varchar(20) not null,		// mihin ateriakokonaisuuteen liittyy
reseptiID varchar(20) not null,				// mikä resepti liitetään
foreign key(ateriakokonaisuusID) references Ateriakokonaisuus,
foreign key(reseptiID) references Resepti				
);


/*
Resepteistä koostuvien ateriakokonaisuuksien nimiä
*/
CREATE TABLE Ateriakokonaisuus (
ateriakokonaisuusID varchar(20) not null primary key,	// ateriakokonaisuudelle generoitu tunnus
nimi varchar(120) not null				// ateriakokonaisuuden nimi
);


/*
Aputaulu, jolla mahdollistetaan reseptin kuuluminen yhteen tai
useampaan käyttötilanteeseen (= välipala, jälkiruoka, jne.)
*/
CREATE TABLE Kayttotilanteet (
primary key(kayttotilanneID, reseptiID),
kayttotilanneID varchar(120) not null,			// mihin käyttötilanteeseen liitetään
reseptiID varchar(20) not null,				// mikä resepti liitetään
foreign key(kayttotilanneID) references Kayttotilanne,
foreign key(reseptiID) references Resepti

);


/*
Sisältää eri käyttötilanteiden nimiä  (= välipala, jälkiruoka, jne.)
*/
CREATE TABLE Kayttotilanne (
kayttotilanneID varchar(120) not null as primary key	// käyttötilanteen nimi
);
