create table catastro.phs (
  id serial not null,
  profesional integer not null,
  objetos text not null,
  secuencia integer not null,
  anio integer not null,
  codigo varchar(255),
  CONSTRAINT plano_ph_pk PRIMARY KEY (id),
  CONSTRAINT fk_plano_ph_prof FOREIGN KEY (profesional)
  REFERENCES catastro.profesionales(id) MATCH FULL ON DELETE RESTRICT ON UPDATE CASCADE
)
