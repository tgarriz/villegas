create table catastro.planos_obra (
  id serial not null,
  profesional integer,
  sup_cubierta integer not null,
  sup_semicub integer,
  sup_demoler integer,
  codigo varchar (100),
  CONSTRAINT plano_obra_pk PRIMARY KEY (id),
  CONSTRAINT fk_plano_obra_prof FOREIGN KEY (profesional)
  REFERENCES catastro.profesionales(id) MATCH FULL ON DELETE RESTRICT ON UPDATE CASCADE
)
