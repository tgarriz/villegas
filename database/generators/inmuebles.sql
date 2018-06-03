create table catastro.inmuebles (
  id serial not null,
  circ varchar(2),
  secc varchar(2),
  chac_n varchar(4),
  chac_l varchar(4),
  quin_n varchar(4),
  quin_l varchar(4),
  frac_n varchar(4),
  frac_l varchar(4),
  manz_n varchar(4),
  manz_l varchar(4),
  parc_n varchar(4),
  parc_l varchar(4),
  subp varchar(4),
  superficie integer not null,
  nro_puerta varchar(10),
  p_municipal varchar(10) not null,
  domicilio varchar(200),
  barrio varchar(200),
  tipo varchar(2) not null,
  frente integer,
  uso integer not null,
  nomenclatura varchar(42),
  nomenclatura_sp varchar(42),
  CONSTRAINT inmuebles_pk PRIMARY KEY (id),
  CONSTRAINT fk_uso_inmueble FOREIGN KEY (uso)
  REFERENCES catastro.uso_inmueble(id) MATCH FULL ON DELETE RESTRICT ON UPDATE CASCADE
);
