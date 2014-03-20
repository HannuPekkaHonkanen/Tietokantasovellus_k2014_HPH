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
