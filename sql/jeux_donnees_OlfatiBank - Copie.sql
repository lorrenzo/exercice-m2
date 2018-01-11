--
USE MabanqueWeb;

--

DELETE FROM operations;
DELETE FROM comptes;
DELETE FROM clients;
DELETE FROM login;
DELETE FROM agences;

--




INSERT INTO clients (id_client,civilite,nom,prenom,datenaiss,nationalite,numero_voie,nom_voie,nom_voie_2,code_postal,ville,numtelmob,numtelfixe,email,password) VALUES (00000000001,'Mr','LAGAFFE','Gaston','1940-12-16','FRA','1','rue Bubulle','','75016','Paris','0678674567','0123546732','g.lagaffe@dauphine.eu','Spirou');
INSERT INTO clients (id_client,civilite,nom,prenom,datenaiss,nationalite,numero_voie,nom_voie,nom_voie_2,code_postal,ville,numtelmob,numtelfixe,email,password) VALUES (00000000002,'Mme','GRAVE','Sophie','1978-01-14','FRA','2','rue Paul Doumer','Appt 45','75001','Paris','0678674567','0123546732','s.grave@dauphine.eu','Grave');

--

INSERT INTO type_compte (id,id_compte,typecpt,libelle) VALUES (001,'Compte Courant','CC','Compte Courant individuel');
INSERT INTO type_compte (id,id_compte,typecpt,libelle) VALUES (002,'Livret A','CNE','Livret A');
INSERT INTO type_compte (id,id_compte,typecpt,libelle) VALUES (003,'LDD','CNE','Livret Developpement Durable ');

----

INSERT INTO agences (code_guichet,libelle) VALUES ('65896','Agence Paris Le Louvre');
INSERT INTO agences (code_guichet,libelle) VALUES ('65897','Agence Paris Ternes');
INSERT INTO agences (code_guichet,libelle) VALUES ('65898','Agence Bordeaux Centre');
INSERT INTO agences (code_guichet,libelle) VALUES ('65899','Agence Marseille St Charles');
INSERT INTO agences (code_guichet,libelle) VALUES ('65900','Agence Lyon Pardieu');
INSERT INTO agences (code_guichet,libelle) VALUES ('65900','Agence Lille Euralille');

--

INSERT INTO comptes (id_client,id_type,type_compte,iban,pays_banque,cle_controle,code_banque,code_guichet,cle_rib,autorisation_decouvert,limite_virement) VALUES (00000000001,001,'Compte Courant','FR7612002658960000000000176','FR','76','12002','65896','76',1500,1000);
INSERT INTO comptes (id_client,id_type,type_compte,iban,pays_banque,cle_controle,code_banque,code_guichet,cle_rib,autorisation_decouvert,limite_virement) VALUES (00000000001,002,'Livret A','FR7612002658960000000000242','FR','76','12002','65896','42',1500,1000);
INSERT INTO comptes (id_client,id_type,type_compte,iban,pays_banque,cle_controle,code_banque,code_guichet,cle_rib,autorisation_decouvert,limite_virement) VALUES (00000000001,003,'LDD','FR7612002658960000000000342','FR','76','12002','65896','42',1500,1000);
INSERT INTO comptes (id_client,id_type,type_compte,iban,pays_banque,cle_controle,code_banque,code_guichet,cle_rib,autorisation_decouvert,limite_virement) VALUES (00000000002,001,'Compte Courant','FR7612002658960000000000176','FR','76','12002','65896','76',1500,1000);

--

INSERT INTO operations (id_compte,type_operation,libelle,date,valeur) VALUES (00000000001 , 'VIR' , 'VIREMENT SALAIRE 10/2017'    , '2017-10-28 03:15:00',5000);
INSERT INTO operations (id_compte,type_operation,libelle,date,valeur) VALUES (00000000001 , 'PLV' , 'PRELEVEMENT EDF 11/2017'     , '2017-11-02 05:17:00',-176);
INSERT INTO operations (id_compte,type_operation,libelle,date,valeur) VALUES (00000000001 , 'PLV' , 'PRELEVEMENT LOYER 11/2017'   , '2017-11-03 00:21:00',-1500);
INSERT INTO operations (id_compte,type_operation,libelle,date,valeur) VALUES (00000000001 , 'CB'  , 'ACHAT CARTE - PLANET SUCHI'  , '2017-11-05 19:36:00',-35);
INSERT INTO operations (id_compte,type_operation,libelle,date,valeur) VALUES (00000000001 , 'CB'  , 'ACHAT CARTE - PARKING VINCI' , '2017-11-07 15:15:00',-5.99);
INSERT INTO operations (id_compte,type_operation,libelle,date,valeur) VALUES (00000000001 , 'CB'  , 'ACHAT CARTE - LEVIS'         , '2017-11-11 17:00:00',-99.99);
INSERT INTO operations (id_compte,type_operation,libelle,date,valeur) VALUES (00000000001 , 'VIR' , 'VIREMENT OCCASIONNEL'    , '2017-10-28 03:15:00',600);
INSERT INTO operations (id_compte,type_operation,libelle,date,valeur) VALUES (00000000002 , 'VIR' , 'VIREMENT OCCASIONNEL'    , '2017-10-31 12:15:00',1000);

	