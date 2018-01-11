-- Supprimer la base si elle existe
DROP DATABASE IF EXISTS OlfatiBank;

-- Créer la base
CREATE DATABASE OlfatiBank;

-- Utiliser la base
USE OlfatiBank;

-- Création des tables

CREATE TABLE clients
(	id_client		INT(11)		ZEROFILL	NOT NULL AUTO_INCREMENT,
	civilite		VARCHAR (3)				NOT NULL,
	nom				VARCHAR (50)			NOT NULL,	
	prenom			VARCHAR (50)			NOT NULL,
	datenaiss		DATE					NOT NULL,
	nationalite		VARCHAR (3)	,
	numero_voie		INT(5)					NOT NULL,
	Nom_voie		VARCHAR (50)			NOT NULL,
	Nom_voie_2		VARCHAR (50)			NOT NULL,
	code_postal		INT (5)					NOT NULL,
	ville			VARCHAR (40)			NOT NULL,
	numtelmob		VARCHAR (10),
	numtelfixe		VARCHAR (10) 			NOT NULL,
	email			VARCHAR (30)			NOT NULL,
	password		VARCHAR (30)			NOT NULL,
	--
	PRIMARY KEY (id_client)
	--
)
ENGINE=INNODB CHARACTER SET utf8;

---
CREATE TABLE type_compte
(
	id			INT(3)		ZEROFILL	NOT NULL 	AUTO_INCREMENT, 
	id_compte	VARCHAR (15)			NOT NULL	UNIQUE,
	typecpt		VARCHAR (4)				NOT NULL,
	libelle		VARCHAR (30)			NOT NULL,
	--
	PRIMARY KEY (id)
)
ENGINE = INNODB CHARACTER SET utf8;

--
CREATE TABLE agences
(	
	id_agence		INT(11)	ZEROFILL	AUTO_INCREMENT,
	code_guichet	INT(5)	ZEROFILL	NOT NULL,
	libelle			VARCHAR(64)			NOT NULL,
	--
	PRIMARY KEY (id_agence)
)
ENGINE=INNODB CHARACTER SET utf8;

--
CREATE TABLE comptes
(	
	id_compte		INT(11)		ZEROFILL	AUTO_INCREMENT,
	id_client		INT(11)		ZEROFILL	NOT NULL,
	id_type			INT(3)					NOT NULL,
	type_compte		VARCHAR(15)				NOT NULL,
	IBAN			VARCHAR(27)				NOT NULL,
	pays_banque		VARCHAR(2)				NOT NULL,
	cle_controle	INT(2)		ZEROFILL	NOT NULL,
	code_banque		INT(5)		ZEROFILL	NOT NULL,
	code_guichet	INT(5)		ZEROFILL	NOT NULL,
	cle_rib			INT (2)					NOT NULL,
	autorisation_decouvert	FLOAT 			NOT NULL,
	limite_virement		FLOAT,
	--
	PRIMARY KEY (id_compte),
	--
	FOREIGN KEY (id_client) REFERENCES clients (id_client)
)
ENGINE=INNODB CHARACTER SET utf8;

--
CREATE TABLE operations
(	
	id_operation	INT(11)		ZEROFILL	AUTO_INCREMENT,
	id_compte		INT(11)		ZEROFILL	NOT NULL,
	type_operation	VARCHAR (64)			NOT NULL,
	libelle			VARCHAR (64)			NOT NULL,
	date			TIMESTAMP				NOT NULL,
	valeur			FLOAT					NOT NULL,	
	--
	PRIMARY KEY (id_operation),
	--
	FOREIGN KEY (id_compte) REFERENCES comptes (id_compte)
)
ENGINE=INNODB CHARACTER SET utf8;

--
CREATE TABLE beneficiaires
(	
	id_beneficiaire	INT(11)		ZEROFILL	AUTO_INCREMENT,
	id_client		INT(11)		ZEROFILL	NOT NULL,
	id_client_benef	INT(11)		ZEROFILL	NOT NULL,
	id_compte		INT(11)		ZEROFILL	NOT NULL,
	--
	PRIMARY KEY (id_beneficiaire),
	--
	FOREIGN KEY (id_client) REFERENCES clients (id_client),
	FOREIGN KEY (id_compte) REFERENCES comptes (id_compte)
)
ENGINE=INNODB CHARACTER SET utf8;

--

CREATE TABLE commandes
(	
	id_commande		INT(11)		ZEROFILL	AUTO_INCREMENT,
	id_compte		INT(11)		ZEROFILL	NOT NULL,
	date			TIMESTAMP				NOT NULL,
	--
	PRIMARY KEY (id_commande),
	--
	FOREIGN KEY (id_compte) REFERENCES comptes (id_compte)
)
ENGINE=INNODB CHARACTER SET utf8;

--


