CREATE TABLE catastro.plano_m_inm
(
  id serial NOT NULL,
  plano integer NOT NULL,
  inmueble integer NOT NULL,
  CONSTRAINT plano_m_inm_pk PRIMARY KEY (id),
  CONSTRAINT inmuebles_fk FOREIGN KEY (inmueble)
      REFERENCES catastro.inmuebles (id) MATCH FULL
      ON UPDATE CASCADE ON DELETE RESTRICT,
  CONSTRAINT planos_m_fk FOREIGN KEY (plano_m)
      REFERENCES catastro.planos_obra (id) MATCH FULL
      ON UPDATE CASCADE ON DELETE RESTRICT,
  CONSTRAINT plano_m_inm_verificador_key UNIQUE (plano_m,inmueble)
)
