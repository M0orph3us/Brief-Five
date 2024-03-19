#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

#------------------------------------------------------------
# Table: users
#------------------------------------------------------------

CREATE TABLE users (
    id Int Auto_increment NOT NULL, firstname Varchar(50) NOT NULL, lastname Varchar(50) NOT NULL, mail Varchar(255) NOT NULL, password Varchar(255) NOT NULL, role Varchar(20) DEFAULT('user') NOT NULL, created_at Date DEFAULT(CURRENT_DATE) NOT NULL, CONSTRAINT PK_users PRIMARY KEY (id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: reservations
#------------------------------------------------------------

CREATE TABLE reservations(
        id                Int  Auto_increment  NOT NULL ,
        number_of_persons Integer NOT NULL ,
        baby_chair        Bool NOT NULL ,
        reserved_on       Date NOT NULL ,
        id_users          Int NOT NULL
	,CONSTRAINT PK_reservations PRIMARY KEY (id)


	,CONSTRAINT FK_reservations_users FOREIGN KEY (id_users) REFERENCES users(id)
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: available_tables
#------------------------------------------------------------

CREATE TABLE availableTables (
    id Int Auto_increment NOT NULL, quantity_tables Integer NOT NULL, CONSTRAINT PK_available_tables PRIMARY KEY (id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: opening
#------------------------------------------------------------

CREATE TABLE opening (
    id Int Auto_increment NOT NULL, opening_day Date NOT NULL, opening_hour Time NOT NULL, CONSTRAINT PK_opening PRIMARY KEY (id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: teams
#------------------------------------------------------------

CREATE TABLE teams (
    id Int Auto_increment NOT NULL, firstname Varchar(50) NOT NULL, lastname Varchar(50) NOT NULL, CONSTRAINT PK_teams PRIMARY KEY (id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: toAssign
#------------------------------------------------------------

CREATE TABLE toAssign(
        id_teams        Int NOT NULL ,
        id_reservations Int NOT NULL 
	,CONSTRAINT PK_toAssign PRIMARY KEY (id_teams,id_reservations)


	,CONSTRAINT FK_toAssign_teams FOREIGN KEY (id_teams) REFERENCES teams(id)
	,CONSTRAINT FK_toAssign_reservations0 FOREIGN KEY (id_reservations) REFERENCES reservations(id)
)ENGINE=InnoDB;