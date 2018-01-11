--
USE olfatibank;

--

DELETE FROM operations;
DELETE FROM comptes;
DELETE FROM clients;
DELETE FROM agences;
DELETE FROM type_compte;
DELETE FROM operations;

--




INSERT INTO clients (id_client,civilite,nom,prenom,nationalite,numero_voie,nom_voie,nom_voie_2,code_postal,ville,telephone,email,password) VALUES (00000000001,'Mr','LAGAFFE','Gaston','FRA','1','rue Bubulle','','75016','Paris','0678542312','g.lagaffe@dauphine.eu','Spirou');
INSERT INTO clients (id_client,civilite,nom,prenom,nationalite,numero_voie,nom_voie,nom_voie_2,code_postal,ville,telephone,email,password) VALUES (00000000002,'Mme','GRAVE','Sophie','FRA','2','rue Paul Doumer','Appt 45','75001','Paris','0678674567','s.grave@dauphine.eu','Grave');

--

INSERT INTO type_compte (type_compte,libelle,autorisation_decouvert) values ('LIV','Compte sur livret',0);
INSERT INTO type_compte (type_compte,libelle,autorisation_decouvert) values ('CHQ','Compte Ch&egrave;que',500);
INSERT INTO type_compte (type_compte,libelle,autorisation_decouvert) values ('LDD','Livret D&eacute;veloppement Durable',0);
INSERT INTO type_compte (type_compte,libelle,autorisation_decouvert) values ('PEL','Plan Epargne Logement',0);

----

INSERT INTO agences (libelle,pays_banque,cle_controle,code_banque,code_guichet) VALUES ('Agence Paris Le Louvre','FR',76,12002,65900);
INSERT INTO agences (libelle,pays_banque,cle_controle,code_banque,code_guichet) VALUES ('Agence Paris Ternes','FR',76,12002,65901);
INSERT INTO agences (libelle,pays_banque,cle_controle,code_banque,code_guichet) VALUES ('Agence Bordeaux Centre','FR',76,12002,65902);
INSERT INTO agences (libelle,pays_banque,cle_controle,code_banque,code_guichet) VALUES ('Agence Marseille St Charles','FR',76,12002,65903);
INSERT INTO agences (libelle,pays_banque,cle_controle,code_banque,code_guichet) VALUES ('Agence Lyon Pardieu','FR',76,12002,65904);
INSERT INTO agences (libelle,pays_banque,cle_controle,code_banque,code_guichet) VALUES ('Agence Lille Euralille','FR',76,12002,65905);


--

INSERT INTO comptes (id_agence,id_client,type_compte,autorisation_decouvert) VALUES (1,00000000001,'CHQ',500);
INSERT INTO comptes (id_agence,id_client,type_compte,autorisation_decouvert) VALUES (1,00000000001,'LIV',0);
INSERT INTO comptes (id_agence,id_client,type_compte,autorisation_decouvert) VALUES (1,00000000001,'LDD',0);
INSERT INTO comptes (id_agence,id_client,type_compte,autorisation_decouvert) VALUES (1,00000000002,'CHQ',500);


--

INSERT INTO operations (id_compte,type_operation,libelle,date,valeur) VALUES (00000000001 , 'VIR' , 'VIREMENT SALAIRE 10/2017'    , '2017-10-28 03:15:00',5000);
INSERT INTO operations (id_compte,type_operation,libelle,date,valeur) VALUES (00000000001 , 'PLV' , 'PRELEVEMENT EDF 11/2017'     , '2017-11-02 05:17:00',-176);
INSERT INTO operations (id_compte,type_operation,libelle,date,valeur) VALUES (00000000001 , 'PLV' , 'PRELEVEMENT LOYER 11/2017'   , '2017-11-03 00:21:00',-1500);
INSERT INTO operations (id_compte,type_operation,libelle,date,valeur) VALUES (00000000001 , 'CB'  , 'ACHAT CARTE - PLANET SUCHI'  , '2017-11-05 19:36:00',-35);
INSERT INTO operations (id_compte,type_operation,libelle,date,valeur) VALUES (00000000001 , 'CB'  , 'ACHAT CARTE - PARKING VINCI' , '2017-11-07 15:15:00',-5.99);
INSERT INTO operations (id_compte,type_operation,libelle,date,valeur) VALUES (00000000001 , 'CB'  , 'ACHAT CARTE - LEVIS'         , '2017-11-11 17:00:00',-99.99);
INSERT INTO operations (id_compte,type_operation,libelle,date,valeur) VALUES (00000000001 , 'VIR' , 'VIREMENT OCCASIONNEL'    , '2017-10-28 03:15:00',600);
INSERT INTO operations (id_compte,type_operation,libelle,date,valeur) VALUES (00000000002 , 'VIR' , 'VIREMENT OCCASIONNEL'    , '2017-10-31 12:15:00',1000);

	