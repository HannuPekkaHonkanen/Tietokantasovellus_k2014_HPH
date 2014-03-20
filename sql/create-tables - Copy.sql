/*
Taulu Resepti sis�lt�� yksitt�isten reseptien tietoja
*/
CREATE TABLE Resepti (
	reseptiID varchar(20) not null primary key,		// reseptille generoitu tunnus
	nimi varchar(120) not null,				// reseptin nimi
	lisaamisajankohta date not null, 			// aika, jolloin resepti on lis�tty
	esivalmisteluaika integer,				// esivalmisteluun kuluva aika minuuteissa
	kokkausaika integer,					// varsinaiseen kokkaukseen kuluva aika
								// minuuteissa
	annostenmaara integer,					// kuinka monelle henkil�lle resepti on 									// tarkoitettu
	vaikeus integer,						// reseptin vaikeustaso
	laatija varchar(20) not null,				// kuka on lis�nnyt reseptin arkistoon
	paaraaka-aine varchar(50)	,			// mik� on reseptin p��raaka-aine (liha, kala, 								// peruna, jne.)
	kuvaus varchar(1000),					// k�ytt�j�n kirjoittama reseptin kuvaus
	valmistustapa varchar(50)	,			// paistetaanko, keitet��nk� jne.
	foreign key (laatija) references Kayttaja,
	foreign key (paaraaka-aine) references Paaraaka_aine
);
/*
Sis�lt�� reseptien p��raaka-ainevaihtoehdot
*/
CREATE TABLE Paaraaka-aine (
paaraaka-aineID varchar(50) not null primary key	// P��raaka-aineen nimi
);


/*
Sis�lt�� palveluun rekister�ityneiden asiakkaiden tietoja
*/
CREATE TABLE Kayttaja (
kayttajaTunnus varchar(20) not null primary key,	// k�ytt�j�n valitsema nimi
suosikitnakyy boolean not null,				// n�kyv�tk� k�ytt�j�n suosikit
sahkoposti varchar(80) not null,				// k�ytt�j�n s�hk�postiosoite
salasana varchar(18) not null				// k�ytt�j�n salasana
);


/*
Sis�lt�� k�ytt�jien arviot resepteist�
*/
CREATE TABLE Arvostelu (
primary key(arvostelija, reseptiID),
arvostelija varchar(20) not null,
reseptiID varchar(20) not null,		
tahtimaara integer not null,				// paljonko annettiin t�hti�
foreign key(arvostelija) references Kayttaja,		// arvostelun tekij�
foreign key(reseptiID) references Resepti		// mit� resepti� arvosteltiin
);


/*
Pit�� kirjaa k�ytt�jien suosikkiresepteist�
*/
CREATE TABLE Suosikki (
primary key(kayttaja, reseptiID),
kayttaja varchar(20) not null,				// Kenen suosikki
reseptiID varchar(20) not null,				// Mik� resepti on suosikki
foreign key(kayttaja) references Kayttaja,	
foreign key(reseptiID) references Resepti		
);


/*
Kertoo reseptin raaka-aineiden m��r�t ja mittayksik�t
*/
CREATE TABLE Maarat (
primary key(reseptiID,  vaiheNro,  raaka-aineID),
maara integer,						// numeerinen arvo
mittayksikko varchar(15),				// mit� yksikk�� k�ytet��n
reseptiID varchar(20) not null,				// mihin reseptiin liittyy
raaka-aineID varchar(20) not null,			// mink� raaka-aineen m��r�
vaiheNro integer not null,				// mihin vaiheeseen liittyy
foreign key(reseptiID) references Resepti,				
foreign key(raaka-aineID) references Raaka-aine,			
foreign key(reseptiID, vaiheNro) references Valmistusvaihe	
);

/*
Sis�lt�� tietoja raaka-aineista
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
Resepteihin liittyvi� valmistusvaihteita j�rjestyksess�
*/
CREATE TABLE Valmistusvaihe (
primary key(reseptiID, jarjestysnumero),
nimi varchar (120),
reseptiID varchar(20) not null,				// mink� reseptin valmistusvaihe
kuvaus varchar(3000),					// valmistusvaiheen tekstikuvaus
jarjestysnumero integer not null,				// t�ll� pidet��n yll� valmistusvaiheiden 									// j�rjestyst�
foreign key(reseptiID) references Resepti		
);

/*
Aputaulu, jolla kootaan tiettyyn ateriakokonaisuuteen liittyv�t reseptit
*/
CREATE TABLE Ateriakokonaisuudet(
primary key(ateriakokonaisuusID, reseptiID),
ateriakokonaisuusID varchar(20) not null,		// mihin ateriakokonaisuuteen liittyy
reseptiID varchar(20) not null,				// mik� resepti liitet��n
foreign key(ateriakokonaisuusID) references Ateriakokonaisuus,
foreign key(reseptiID) references Resepti				
);


/*
Resepteist� koostuvien ateriakokonaisuuksien nimi�
*/
CREATE TABLE Ateriakokonaisuus (
ateriakokonaisuusID varchar(20) not null primary key,	// ateriakokonaisuudelle generoitu tunnus
nimi varchar(120) not null				// ateriakokonaisuuden nimi
);


/*
Aputaulu, jolla mahdollistetaan reseptin kuuluminen yhteen tai
useampaan k�ytt�tilanteeseen (= v�lipala, j�lkiruoka, jne.)
*/
CREATE TABLE Kayttotilanteet (
primary key(kayttotilanneID, reseptiID),
kayttotilanneID varchar(120) not null,			// mihin k�ytt�tilanteeseen liitet��n
reseptiID varchar(20) not null,				// mik� resepti liitet��n
foreign key(kayttotilanneID) references Kayttotilanne,
foreign key(reseptiID) references Resepti

);


/*
Sis�lt�� eri k�ytt�tilanteiden nimi�  (= v�lipala, j�lkiruoka, jne.)
*/
CREATE TABLE Kayttotilanne (
kayttotilanneID varchar(120) not null as primary key	// k�ytt�tilanteen nimi
);
