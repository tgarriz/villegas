create table catastro.plano_m_inm (
  id serial not null,
  plano_m integer not null,
  inmueble integer not null,
  CONSTRAINT plano_m_inm_pk PRIMARY KEY (id),
  CONSTRAINT planos_m_fk FOREIGN KEY (plano_m)
  REFERENCES catastro.planos_obra(id) MATCH FULL ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT inmuebles_fk FOREIGN KEY (inmueble)
  REFERENCES catastro.inmuebles(id) MATCH FULL ON DELETE RESTRICT ON UPDATE CASCADE
)
