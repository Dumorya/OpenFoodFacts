create schema open_food_facts;

--Creer les tables

create table open_food_facts.produit(
id_produit serial not null,
code bigint,
url character varying(500),
createur character varying(50) not null,
date_creation date,
date_modification date,
nom_produit character varying(500),

marque character varying(100),
poids character varying(100),
note_nutritionnelle character,

energie decimal,
graisse decimal,
graisse_sature decimal,
carbohydrate decimal,
sucres decimal,
fibres decimal,
proteines decimal,
sel decimal,
sodium decimal,
vitamin_a decimal,
vitamin_c decimal,
calcium decimal,
fer decimal,
nutrition_score int,
ingredients character varying(20000),
CONSTRAINT produit_pk PRIMARY KEY (id_produit));

create table open_food_facts.pays_data(
nom character varying(200) not null);

create table open_food_facts.possede_pays_data(
id_produit integer,
pays varchar(500) );

--Inserer les donnees

--table produit
\copy open_food_facts.produit (code, url, createur, date_creation, date_modification, nom_produit, marque, poids, note_nutritionnelle, energie, graisse, graisse_sature ,carbohydrate , sucres,fibres,proteines ,sel , sodium ,vitamin_a ,vitamin_c,calcium ,fer ,nutrition_score, ingredients) from '~/WEB/OpenFoodFacts-dev/data/table_produit.csv' delimiter ';' header csv ;

--table pays_data
\copy open_food_facts.pays_data from '~/WEB/OpenFoodFacts-dev/data/table_pays.csv' delimiter ';';

--table pays
SELECT distinct replace(s.token,'"','') as nom
into open_food_facts.pays
FROM open_food_facts.pays_data t, unnest(string_to_array(nom, ',')) s(token);

ALTER TABLE open_food_facts.pays
ADD occurence integer,
ADD id_pays serial,
ADD constraint pays_pk primary key (id_pays);

alter table open_food_facts.pays alter column id_pays set default nextval('open_food_facts.pays_id_pays_seq'::regclass);

--table possede_pays
\copy open_food_facts.possede_pays_data (id_produit, pays) from '~/WEB/OpenFoodFacts-dev/data/table_produit_possede_pays.csv' delimiter ';';

SELECT id_pays, id_produit
into open_food_facts.possede_pays
FROM   open_food_facts.possede_pays_data t, unnest(string_to_array(t.pays, ',')) s(token) inner join open_food_facts.pays p on s.token = p.nom;

ALTER TABLE open_food_facts.possede_pays
ADD CONSTRAINT p_pays_pk PRIMARY KEY (id_produit, id_pays),
add constraint vente_fk1 foreign key (id_produit) references open_food_facts.produit (id_produit),
add constraint vente_fk2 foreign key (id_pays) references open_food_facts.pays (id_pays);

--mise à jour l'occurence dans pays

update open_food_facts.pays
set occurence = (
select count(*)
from open_food_facts.possede_pays
    where open_food_facts.possede_pays.id_pays = open_food_facts.pays.id_pays
group by id_pays order by id_pays);

--Remplir la table filtre

select column_name as nom
into open_food_facts.filtre
from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='produit' AND TABLE_SCHEMA='open_food_facts';

ALTER TABLE open_food_facts.filtre
ADD utilise integer;

update open_food_facts.filtre
set utilise =0
where nom = 'id_produit';
update open_food_facts.filtre
set utilise =0
where nom = 'code';
update open_food_facts.filtre
set utilise =0
where nom = 'url';
update open_food_facts.filtre
set utilise =1
where nom = 'createur';
update open_food_facts.filtre
set utilise =0
where nom = 'date_creation';
update open_food_facts.filtre
set utilise =0
where nom = 'date_modification';
update open_food_facts.filtre
set utilise =0
where nom = 'nom_produit';
update open_food_facts.filtre
set utilise =1
where nom = 'marque';
update open_food_facts.filtre
set utilise =0
where nom = 'poids';
update open_food_facts.filtre
set utilise =1
where nom = 'note_nutritionnelle';
update open_food_facts.filtre
set utilise =0
where nom = 'energie';
update open_food_facts.filtre
set utilise =0
where nom = 'graisse';
update open_food_facts.filtre
set utilise =0
where nom = 'graisse_sature';
update open_food_facts.filtre
set utilise =0
where nom = 'carbohydrate';
update open_food_facts.filtre
set utilise =0
where nom = 'sucres';
update open_food_facts.filtre
set utilise =0
where nom = 'fibres';
update open_food_facts.filtre
set utilise =0
where nom = 'proteines';
update open_food_facts.filtre
set utilise =0
where nom = 'sel';
update open_food_facts.filtre
set utilise =0
where nom = 'sodium';
update open_food_facts.filtre
set utilise =0
where nom = 'vitamin_a';
update open_food_facts.filtre
set utilise =0
where nom = 'vitamin_c';
update open_food_facts.filtre
set utilise =0
where nom = 'calcium';
update open_food_facts.filtre
set utilise =0
where nom = 'fer';
update open_food_facts.filtre
set utilise =0
where nom = 'nutrition_score';
update open_food_facts.filtre
set utilise =1
where nom = 'ingredients';










