#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

#------------------------------------------------------------
# Table: users
#------------------------------------------------------------

CREATE TABLE users (
    id binary(16) DEFAULT(UUID_TO_BIN(UUID(), 1)) NOT NULL UNIQUE, firstname Varchar(50) NOT NULL, lastname Varchar(50) NOT NULL, mail Varchar(255) NOT NULL UNIQUE, password Varchar(255) NOT NULL, createdAt Date NOT NULL, CONSTRAINT PK_users PRIMARY KEY (id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: lunch_services
#------------------------------------------------------------

CREATE TABLE lunch_services (
    id Int Auto_increment NOT NULL, first_time_slot Time NOT NULL, second_time_slot Time NOT NULL, CONSTRAINT PK_lunch_services PRIMARY KEY (id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: evening_services
#------------------------------------------------------------

CREATE TABLE evening_services (
    id Int Auto_increment NOT NULL, first_time_slot Time NOT NULL, second_time_slot Time NOT NULL, CONSTRAINT PK_evening_services PRIMARY KEY (id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: available_tables
#------------------------------------------------------------

CREATE TABLE available_tables (
    id Int Auto_increment NOT NULL, available_tables Integer NOT NULL, CONSTRAINT PK_available_tables PRIMARY KEY (id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: opening_dates
#------------------------------------------------------------

CREATE TABLE opening_dates (
    id Int Auto_increment NOT NULL, opening_date Date NOT NULL, CONSTRAINT PK_opening_dates PRIMARY KEY (id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: reservations
#------------------------------------------------------------

CREATE TABLE reservations(
        id_users          binary(16) NOT NULL ,
        id                Int NOT NULL ,
        number_of_persons Integer NOT NULL ,
        baby_chair        Bool NOT NULL ,
        reservedAt        Date NOT NULL ,
        id_opening_dates  Int NOT NULL
	,CONSTRAINT PK_reservations PRIMARY KEY (id_users,id)


	,CONSTRAINT FK_reservations_users FOREIGN KEY (id_users) REFERENCES users(id)
	,CONSTRAINT FK_reservations_opening_dates0 FOREIGN KEY (id_opening_dates) REFERENCES opening_dates(id)
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: toSchedule
#------------------------------------------------------------

CREATE TABLE toSchedule(
        id                  Int NOT NULL ,
        id_lunch_services   Int NOT NULL ,
        id_evening_services Int NOT NULL
	,CONSTRAINT PK_toSchedule PRIMARY KEY (id,id_lunch_services,id_evening_services)


	,CONSTRAINT FK_toSchedule_opening_dates FOREIGN KEY (id) REFERENCES opening_dates(id)
	,CONSTRAINT FK_toSchedule_lunch_services0 FOREIGN KEY (id_lunch_services) REFERENCES lunch_services(id)
	,CONSTRAINT FK_toSchedule_evening_services1 FOREIGN KEY (id_evening_services) REFERENCES evening_services(id)
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: toAvailable
#------------------------------------------------------------

CREATE TABLE toAvailable(
        id                    Int NOT NULL ,
        id_users_reservations binary(16) NOT NULL ,
        id_reservations       Int NOT NULL
	,CONSTRAINT PK_toAvailable PRIMARY KEY (id,id_users_reservations,id_reservations)


	,CONSTRAINT FK_toAvailable_available_tables FOREIGN KEY (id) REFERENCES available_tables(id)
	,CONSTRAINT FK_toAvailable_reservations0 FOREIGN KEY (id_users_reservations,id_reservations) REFERENCES reservations(id_users,id)
)ENGINE=InnoDB;