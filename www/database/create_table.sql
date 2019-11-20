DROP TABLE IF EXISTS Traitement_Medicament;
DROP TABLE IF EXISTS Traitement;
DROP TABLE IF EXISTS Rendez_vous;
DROP TABLE IF EXISTS Med_correspond_Ani;
DROP TABLE IF EXISTS Medicament_Effet;
DROP TABLE IF EXISTS Medicament;
DROP TABLE IF EXISTS Effets_secondaires;
DROP TABLE IF EXISTS Animal;
DROP TABLE IF EXISTS Espece;
DROP TABLE IF EXISTS Assistant;
DROP TABLE IF EXISTS Veterinaire;
DROP TABLE IF EXISTS Classe_animal;
DROP TABLE IF EXISTS Client;


Create table Client (
	ID_Client INT PRIMARY KEY AUTO_INCREMENT,
	Nom varchar(30) NOT NULL,
	Prenom varchar(30) NOT NULL,
	Date_de_naissance date NOT NULL,
	Addresse varchar(100) NOT NULL,
	Numero_de_telephone varchar(10) NOT NULL
);

Create table Classe_animal (
	Nom varchar(30) NOT NULL PRIMARY KEY
);

Create table Veterinaire (
	ID_personnel INT PRIMARY KEY AUTO_INCREMENT,
	Nom varchar(30) NOT NULL,
	prenom varchar(30) NOT NULL,
	Date_de_naissance date NOT NULL,
	Addresse varchar(100) NOT NULL,
	Numero_de_telephone varchar(30) NOT NULL,
	Specialite varchar(30), 
    foreign key (Specialite) references Classe_animal(Nom)
);

Create table Assistant (
	ID_personnel INT PRIMARY KEY AUTO_INCREMENT,
	Nom varchar(30) NOT NULL,
	prenom varchar(30) NOT NULL,
	Date_de_naissance date NOT NULL,
	Addresse varchar(100) NOT NULL,
	Numero_de_telephone varchar(30) NOT NULL,
	Specialite varchar(30),
    foreign key (Specialite) references Classe_animal(Nom)
);

Create table Espece (
	Nom varchar(30) NOT NULL,
	Classe varchar(30), 
    foreign key(Classe) references Classe_animal(Nom),
    PRIMARY KEY(Nom, Classe)
);

/*Ici on suppose que il reste des animaux qui ont même nom*/
Create table Animal (
	ID_Animal INT PRIMARY KEY AUTO_INCREMENT,
	Nom varchar(30) NOT NULL,
	Poids FLOAT NOT NULL,
	Taille FLOAT NOT NULL,
	Date_de_naissance date,
	Espece varchar(30), 
    foreign key(Espece) references Espece(Nom),
	ID_Client INT, 
    foreign key(ID_Client) references Client(ID_Client)
);

Create table Effets_secondaires (
	ID_effet_secondaire INT PRIMARY KEY AUTO_INCREMENT,
	Effets varchar(100) NOT NULL
);

Create table Medicament (
	Nom_de_molecule varchar(30) PRIMARY KEY,
	Description varchar(100) NOT NULL
);

/*C'est une classe d'association*/
Create table Medicament_Effet (
	Medicament varchar(30), 
    foreign key(Medicament) references Medicament(Nom_de_molecule),
	Effets_secondaires INT, 
    foreign key(Effets_secondaires) references Effets_secondaires(ID_effet_secondaire),
    PRIMARY KEY(Medicament,Effets_secondaires)
);

/*C'est une classe d'association*/
Create table Med_correspond_Ani (
	Medicament varchar(30), 
    foreign key(Medicament) references Medicament(Nom_de_molecule),
	Espece varchar(30), 
    foreign key(Espece) references Espece(Nom),
    PRIMARY KEY(Medicament,Espece)
);

Create table Rendez_vous (
	No_ref INT PRIMARY KEY AUTO_INCREMENT,
	Pet INT,
	Vet INT,
	Date_rdv date not null,
	Time_rdv time not null,
	FOREIGN KEY (Pet) REFERENCES Animal(ID_Animal),
	FOREIGN KEY (Vet) REFERENCES Veterinaire(ID_personnel)
);

Create table Traitement (
	ID_Traitement INT PRIMARY KEY AUTO_INCREMENT,
	Rdv INT,
	foreign key (Rdv) REFERENCES Rendez_vous(No_ref),
	Duree TIME NOT NULL,
	Nom varchar(30) NOT NULL
);

/*C'est une classe d'association*/
Create table Traitement_Medicament (
	Traitement INT, 
    foreign key(Traitement) references Traitement(ID_Traitement),
	Medicament VARCHAR(30), 
    foreign key(Medicament) references Medicament(Nom_de_molecule),
	Quantite_medicaments_pj INT NOT NULL,
	PRIMARY KEY(Traitement,Medicament)
);

