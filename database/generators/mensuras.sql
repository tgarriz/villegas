create table catastro.mensuras (
  id serial not null,
  profesional integer not null,
  objetos varchar(255) not null,
  secuencia integer not null,
  anio integer not null,
  codigo varchar(255),
  CONSTRAINT plano_mens_pk PRIMARY KEY (id),
  CONSTRAINT fk_plano_mens_prof FOREIGN KEY (profesional)
  REFERENCES catastro.profesionales(id) MATCH FULL ON DELETE RESTRICT ON UPDATE CASCADE
)
