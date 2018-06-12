create table catastro.plano_o_inm (
  id serial not null,
  plano_obra integer not null,
  inmueble integer not null,
  CONSTRAINT plano_o_inm_pk PRIMARY KEY (id),
  CONSTRAINT planos_obra_fk FOREIGN KEY (plano_obra)
  REFERENCES catastro.planos_obra(id) MATCH FULL ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT inmuebles_fk FOREIGN KEY (inmueble)
  REFERENCES catastro.inmuebles(id) MATCH FULL ON DELETE RESTRICT ON UPDATE CASCADE
)
