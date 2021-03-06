create table catastro.plano_ph_inm (
  id serial not null,
  plano integer not null,
  inmueble integer not null,
  CONSTRAINT plano_ph_inm_pk PRIMARY KEY (id),
  CONSTRAINT planos_ph_fk FOREIGN KEY (plano)
  REFERENCES catastro.phs(id) MATCH FULL ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT inmuebles_fk FOREIGN KEY (inmueble)
  REFERENCES catastro.inmuebles(id) MATCH FULL ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT plano_ph_inm_verificador_key UNIQUE (plano,inmueble)
)
