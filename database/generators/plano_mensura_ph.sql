create table catastro.planos_mens_ph (
  id serial not null,
  profesional integer not null,
  objetos text not null,
  tipo varchar(4) not null,
  secuencia integer not null,
  anio integer not null,
  codigo varchar(255),
  CONSTRAINT plano_mens_ph_pk PRIMARY KEY (id),
  CONSTRAINT fk_plano_mens_ph_prof FOREIGN KEY (profesional)
  REFERENCES catastro.profesionales(id) MATCH FULL ON DELETE RESTRICT ON UPDATE CASCADE
)
