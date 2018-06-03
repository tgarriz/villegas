create table catastro.plano_mh_inmueble (
  id serial not null,
  plano integer,
  inmueble integer,
  tipo_nomencla varchar(1),
  CONSTRAINT plano_mh_inmueble_pk PRIMARY KEY (id),
  CONSTRAINT fk_plano_mh_inm_plano FOREIGN KEY (plano)
  REFERENCES catastro.planos_mens_ph(id) MATCH FULL ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT fk_plano_mh_inm_inm FOREIGN KEY (inmueble)
  REFERENCES catastro.inmuebles(id) MATCH FULL ON DELETE RESTRICT ON UPDATE CASCADE
)
