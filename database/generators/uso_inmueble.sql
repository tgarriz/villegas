create table catastro.uso_inmueble (
  id serial not null,
  descripcion varchar(150) not null,
  CONSTRAINT uso_inmueble_pk PRIMARY KEY (id)
);
insert into catastro.uso_inmueble (descripcion) values('comercial');
insert into catastro.uso_inmueble (descripcion) values('residencial');
insert into catastro.uso_inmueble (descripcion) values('industrial');
insert into catastro.uso_inmueble (descripcion) values('rural');
