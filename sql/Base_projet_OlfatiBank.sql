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
	nationalite		VARCHAR (3)	,
	numero_voie		INT(5)					NOT NULL,
	Nom_voie		VARCHAR (50)			NOT NULL,
	Nom_voie_2		VARCHAR (50)			NOT NULL,
	code_postal		INT (5)					NOT NULL,
	ville			VARCHAR (40)			NOT NULL,
	telephone		VARCHAR (10) 			NOT NULL,
	email			VARCHAR (30)			NOT NULL,
	password		VARCHAR (30)			NOT NULL,
	--
	limite_virement		FLOAT						DEFAULT 1000,
	--
	PRIMARY KEY (id_client)
	--
)
ENGINE=INNODB CHARACTER SET utf8;

--

CREATE TABLE type_compte
(
	type_compte		VARCHAR(3) 			NOT NULL,
	libelle			VARCHAR(64)			NOT NULL,
	--
	autorisation_decouvert	FLOAT						DEFAULT 0,
	--
	PRIMARY KEY (type_compte)
)
ENGINE=INNODB CHARACTER SET utf8;

--

CREATE TABLE agences
(
	id_agence		INT				NOT NULL	AUTO_INCREMENT,
	libelle			VARCHAR (64)			NOT NULL,
	pays_banque		VARCHAR(2)			NOT NULL,
	cle_controle		INT(2)		ZEROFILL	NOT NULL,
	code_banque		INT(5)		ZEROFILL	NOT NULL,
	code_guichet		INT(5)		ZEROFILL	NOT NULL,
	--
	PRIMARY KEY (id_agence),
	--
	CONSTRAINT UC_agence UNIQUE (pays_banque,cle_controle,code_banque,code_guichet)
)
ENGINE=INNODB CHARACTER SET utf8;

--

CREATE TABLE comptes
(	
	id_compte		INT(11)		ZEROFILL			AUTO_INCREMENT,
	id_agence		INT(11)				NOT NULL,
	id_client		INT(11)		ZEROFILL	NOT NULL,
	type_compte		VARCHAR(3)			NOT NULL,
	cle_rib			INT (2)		ZEROFILL	NOT NULL	DEFAULT '99',
	autorisation_decouvert	FLOAT						DEFAULT 0,
	--
	PRIMARY KEY (id_compte),
	--
	FOREIGN KEY (id_client) REFERENCES clients (id_client),
	FOREIGN KEY (type_compte) REFERENCES type_compte (type_compte),
	FOREIGN KEY (id_agence) REFERENCES agences (id_agence)
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
CREATE TABLE virements
(
	id_virement		INT(11)		ZEROFILL			AUTO_INCREMENT,
	id_compte_deb		INT(11)		ZEROFILL	NOT NULL,
	id_compte_cred		INT(11)		ZEROFILL	NOT NULL,
	date			TIMESTAMP			NOT NULL,
	montant			FLOAT				NOT NULL,
	--
	PRIMARY KEY (id_virement),
	--
	FOREIGN KEY (id_compte_deb) REFERENCES comptes (id_compte),
	FOREIGN KEY (id_compte_cred) REFERENCES comptes (id_compte)

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


