create table catastro.p_fisicas (
  id serial not null,
  nombre varchar(100) not null,
  apellido varchar(100)  not null,
  tipo_doc varchar(3)  not null,
  nro_doc varchar(9)  not null,
  domicilio varchar(200)  not null,
  cuit varchar(13)  not null,
  CONSTRAINT p_fisicas_pk PRIMARY KEY (id)
);
