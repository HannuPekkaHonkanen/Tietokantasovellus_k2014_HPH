CREATE TABLE Resepti (
	reseptiID varchar(20) not null primary key,		
	nimi varchar(120) not null,				
	lisaamisajankohta date not null, 			
	esivalmisteluaika integer,				
	kokkausaika integer,					
	annostenmaara integer,					 									
	vaikeus integer,					
	laatija varchar(20) not null,				
	paaraaka_aine varchar(50),										
	kuvaus varchar(1000),					
	valmistustapa varchar(50)			
);
