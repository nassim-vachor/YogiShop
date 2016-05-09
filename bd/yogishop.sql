#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

-- Database : 'yogishop'
#------------------------------------------------------------
# Table: Client
#------------------------------------------------------------

CREATE TABLE Client(
        IdClient          int (11) Auto_increment  NOT NULL ,
        Prenom            Varchar (40) ,
        Nom               Varchar (40) ,
        Tel               Varchar (25) ,
        DateNais          Date ,
        CodePostal        Varchar (100) ,
        Ville             Varchar (40) ,
        Rue               Varchar (50) ,
        email             Varchar (40) ,
        Profession        Varchar (30) ,
        Douleurs          Text ,
        Password          Varchar (40) ,
        Token             Varchar (100) ,
        DateExpiration    Datetime ,
        NbSeanceRestantes Int ,
        PRIMARY KEY (IdClient )
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
        IdClient         Int NOT NULL ,
        IdAbonnement     Int NOT NULL ,
        PRIMARY KEY (IdClient ,IdAbonnement )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: inscrire
#------------------------------------------------------------

CREATE TABLE inscrire(
        Present  Bool ,
        IdClient Int NOT NULL ,
        IdSeance Int NOT NULL ,
        PRIMARY KEY (IdClient ,IdSeance )
)ENGINE=InnoDB;

ALTER TABLE ALaCarte ADD CONSTRAINT FK_ALaCarte_IdAbonnement FOREIGN KEY (IdAbonnement) REFERENCES Abonnement(IdAbonnement);
ALTER TABLE Temporel ADD CONSTRAINT FK_Temporel_IdAbonnement FOREIGN KEY (IdAbonnement) REFERENCES Abonnement(IdAbonnement);
ALTER TABLE souscrire ADD CONSTRAINT FK_souscrire_IdClient FOREIGN KEY (IdClient) REFERENCES Client(IdClient);
ALTER TABLE souscrire ADD CONSTRAINT FK_souscrire_IdAbonnement FOREIGN KEY (IdAbonnement) REFERENCES Abonnement(IdAbonnement);
ALTER TABLE inscrire ADD CONSTRAINT FK_inscrire_IdClient FOREIGN KEY (IdClient) REFERENCES Client(IdClient);
ALTER TABLE inscrire ADD CONSTRAINT FK_inscrire_IdSeance FOREIGN KEY (IdSeance) REFERENCES Seance(IdSeance);
