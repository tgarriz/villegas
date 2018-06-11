CREATE SEQUENCE catastro.personas_id_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 4
  CACHE 1;
ALTER TABLE catastro.personas_id_seq
  OWNER TO postgres;
create table catastro.p_fisicas2 (
  id integer DEFAULT nextval('catastro.personas_id_seq'::regclass),
  nombre varchar(100) not null,
  apellido varchar(100)  not null,
  tipo_doc varchar(3)  not null,
  nro_doc integer  not null,
  domicilio varchar(200)  not null,
  cuit varchar(13) not null unique,
  CONSTRAINT p_fisicas2_pk PRIMARY KEY (id)
);
