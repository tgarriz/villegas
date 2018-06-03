create table catastro.uso_inmueble (
  id serial not null,
  descripcion varchar(150) not null,
  CONSTRAINT uso_inmueble_pk PRIMARY KEY (id)
)
