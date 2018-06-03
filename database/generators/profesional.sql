create table catastro.profesional (
  id serial not null,
  persona integer,
  matricula varchar(10) not null,
  profesion varchar(100) not null,
  mail varchar(100) not null,
  celular varchar(20) not null,
  CONSTRAINT profesional_pk PRIMARY KEY (id),
  CONSTRAINT fk_pfisica FOREIGN KEY (persona)
  REFERENCES catastro.p_fisicas(id) MATCH FULL ON DELETE RESTRICT ON UPDATE CASCADE
);
