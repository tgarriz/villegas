create table catastro.propietarios (
  id serial not null,
  inmueble integer not null,
  pfisica integer default null,
  pjuridica integer default null,
  procentaje decimal(2,2) not null,
  f_alta date,
  f_baja date,
  CONSTRAINT propietarios_pk PRIMARY KEY (id),
  CONSTRAINT fk_inmueble FOREIGN KEY (inmueble)
  REFERENCES catastro.inmuebles(id) MATCH FULL ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT fk_pfisica FOREIGN KEY (pfisica)
  REFERENCES catastro.p_fisicas(id) MATCH FULL ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT fk_juridica FOREIGN KEY (pjuridica)
  REFERENCES catastro.p_juridicas(id) MATCH FULL ON DELETE RESTRICT ON UPDATE CASCADE
)
