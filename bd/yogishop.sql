#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Person
#------------------------------------------------------------

CREATE TABLE Person(
        IdPerson       int (11) Auto_increment  NOT NULL ,
        Prenom         Varchar (40) ,
        Nom            Varchar (40) ,
        Tel            Varchar (25) ,
        DateNais       Date ,
        CodePostal     Varchar (100) ,
        Ville          Varchar (40) ,
        Rue            Varchar (50) ,
        email          Varchar (40) ,
        Profession     Varchar (30) ,
        Password       Varchar (40) ,
        Token          Varchar (100) ,
        EstCoach       Bool ,
        Douleurs       Text ,
        DateExpiration Datetime ,
        NbSeances      Int ,
        EstAdmin       Bool ,
        PRIMARY KEY (IdPerson )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Abonnement
#------------------------------------------------------------

CREATE TABLE Abonnement(
        IdAbonnement int (11) Auto_increment  NOT NULL ,
        Libelle      Varchar (25) ,
        Tarif        Float ,
        Description  Text ,
        PRIMARY KEY (IdAbonnement )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ALaCarte
#------------------------------------------------------------

CREATE TABLE ALaCarte(
        NbSeance     Int ,
        IdAbonnement Int NOT NULL ,
        PRIMARY KEY (IdAbonnement )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Temporel
#------------------------------------------------------------

CREATE TABLE Temporel(
        Duree        Int ,
        IdAbonnement Int NOT NULL ,
        PRIMARY KEY (IdAbonnement )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Seance
#------------------------------------------------------------

CREATE TABLE Seance(
        IdSeance   int (11) Auto_increment  NOT NULL ,
        DateD      Datetime ,
        DateF      Datetime ,
        PlaceDispo Int ,
        PRIMARY KEY (IdSeance )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: souscrire
#------------------------------------------------------------

CREATE TABLE souscrire(
        DateSouscription Date ,
        IdAbonnement     Int NOT NULL ,
        IdPerson         Int NOT NULL ,
        PRIMARY KEY (IdAbonnement ,IdPerson )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: s'incrire
#------------------------------------------------------------

CREATE TABLE s_incrire(
        Present  Bool ,
        IdSeance Int NOT NULL ,
        IdPerson Int NOT NULL ,
        PRIMARY KEY (IdSeance ,IdPerson )
)ENGINE=InnoDB;

ALTER TABLE ALaCarte ADD CONSTRAINT FK_ALaCarte_IdAbonnement FOREIGN KEY (IdAbonnement) REFERENCES Abonnement(IdAbonnement);
ALTER TABLE Temporel ADD CONSTRAINT FK_Temporel_IdAbonnement FOREIGN KEY (IdAbonnement) REFERENCES Abonnement(IdAbonnement);
ALTER TABLE souscrire ADD CONSTRAINT FK_souscrire_IdAbonnement FOREIGN KEY (IdAbonnement) REFERENCES Abonnement(IdAbonnement);
ALTER TABLE souscrire ADD CONSTRAINT FK_souscrire_IdPerson FOREIGN KEY (IdPerson) REFERENCES Person(IdPerson);
ALTER TABLE s_incrire ADD CONSTRAINT FK_s_incrire_IdSeance FOREIGN KEY (IdSeance) REFERENCES Seance(IdSeance);
ALTER TABLE s_incrire ADD CONSTRAINT FK_s_incrire_IdPerson FOREIGN KEY (IdPerson) REFERENCES Person(IdPerson);
