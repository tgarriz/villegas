create table catastro.destinatario_tasa (
  id serial not null,
  inmueble integer not null,
  pfisica integer,
  pjuridica integer,
  domicilio varchar(200) not null,
  CONSTRAINT destinatario_tasa_pk PRIMARY KEY (id),
  CONSTRAINT fk_inmueble FOREIGN KEY (inmueble)
  REFERENCES catastro.inmuebles(id) MATCH FULL ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT fk_pfisica FOREIGN KEY (pfisica)
  REFERENCES catastro.p_fisicas(id) MATCH FULL ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT fk_pjuridica FOREIGN KEY (pjuridica)
  REFERENCES catastro.p_juridicas(id) MATCH FULL ON DELETE RESTRICT ON UPDATE CASCADE
)
