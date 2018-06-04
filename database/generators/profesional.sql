create table catastro.profesional (
  id serial not null,
  nombre varchar(100) not null,
  apellido varchar(100) not null,
  tipo_doc varchar(3) not null,
  nro_doc integer not null,
  domicilio varchar(200) not null,
  matricula integer not null,
  profesion varchar(100) not null,
  mail varchar(100) not null,
  celular varchar(20) not null,
  CONSTRAINT profesional_pk PRIMARY KEY (id)
);
