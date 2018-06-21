CREATE TRIGGER crear_nomencla
  BEFORE INSERT OR UPDATE
  ON catastro.inmuebles
  FOR EACH ROW
  EXECUTE PROCEDURE catastro.crear_nomencla();



CREATE OR REPLACE FUNCTION catastro.crear_nomencla()
  RETURNS trigger AS $crear_nomencla$
  DECLARE
  BEGIN
   NEW.nomencla:= '050'||lpad(trim(NEW.circ),2,'0'))||lpad(trim(NEW.secc),2,'0')||
                      lpad(trim(NEW.chac_n),4,'0')||lpad(trim(NEW.chac_l),3,'0')||
                      lpad(trim(NEW.quin_n),4,'0')||lpad(trim(NEW.quin_l),3,'0')||
                      lpad(trim(NEW.frac_n),4,'0')||lpad(trim(NEW.frac_l),3,'0')||
                      lpad(trim(NEW.manz_n),4,'0')||lpad(trim(NEW.manz_l),3,'0')||
                      lpad(trim(NEW.parc_n),4,'0')||lpad(trim(NEW.parc_l),3,'0');
   NEW.nomencla_sp:= NEW.nomencla||lpad(trim(NEW.subp),6,'0');
   RETURN NEW;
  END;
  $crear_nomencla$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION catastro.crear_nomencla()
  OWNER TO postgres

    CREATE OR REPLACE FUNCTION rellenar_codigo() RETURNS TRIGGER AS $rellenar_codigo$
      DECLARE
      BEGIN

       NEW.codigo := NEW.secuencia || '-' || NEW.anio;

       RETURN NEW;
      END;
    $rellenar_codigo$ LANGUAGE plpgsql;

    CREATE TRIGGER rellenar_codigo BEFORE INSERT OR UPDATE
        ON catastro.mensuras FOR EACH ROW
        EXECUTE PROCEDURE rellenar_codigo();

    CREATE TRIGGER rellenar_codigo BEFORE INSERT OR UPDATE
        ON catastro.phs FOR EACH ROW
        EXECUTE PROCEDURE rellenar_codigo();

    CREATE TRIGGER rellenar_codigo BEFORE INSERT OR UPDATE
        ON catastro.planos_obra FOR EACH ROW
        EXECUTE PROCEDURE rellenar_codigo();
