create table catastro.p_juridicas (
  id serial not null,
  rsocial varchar(100) not null,
  domicilio varchar(200) not null,
  cuit varchar(13) not null unique,
  CONSTRAINT p_juridica_pk PRIMARY KEY (id)
);
