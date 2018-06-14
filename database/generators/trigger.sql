CREATE OR REPLACE FUNCTION catastro.crear_nomencla_tri()
  RETURNS trigger AS
$BODY$
  DECLARE
  BEGIN
   NEW.nomenclatura:= trim(to_char(NEW.partido,'000'))||trim(to_char(NEW.circuns,'00'))||lpad(trim(NEW.seccion),2,'0')||
                      lpad(trim(NEW.chacra_n),4,'0')||lpad(trim(NEW.chacra_l),3,'0')||
                      lpad(trim(NEW.quinta_n),4,'0')||lpad(trim(NEW.quinta_l),3,'0')||
                      lpad(trim(NEW.fraccion_n),4,'0')||lpad(trim(NEW.fraccion_l),3,'0')||
                      lpad(trim(NEW.manzana_n),4,'0')||lpad(trim(NEW.manzana_l),3,'0')||
                      lpad(trim(NEW.parcela_n),4,'0')||lpad(trim(NEW.parcela_l),3,'0');
   NEW.nomenclatura_sp:= NEW.nomenclatura||lpad(trim(NEW.subparcela),6,'0');
   RETURN NEW;
  END;
  $BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION catastro.crear_nomencla()
  OWNER TO postgres;

CREATE TRIGGER crear_nomencla BEFORE INSERT OR UPDATE
    ON catastro.inmuebles FOR EACH ROW
    EXECUTE PROCEDURE catastro.crear_nomencla_tri();


/*Leer y fijarse bien*/

    CREATE OR REPLACE FUNCTION catastro.verificador_mensuras()
      RETURNS trigger AS $verificador_mensuras$
    declare
    BEGIN
    	NEW.verificador := to_char(NEW.plano_m,'9') || '-' || to_char(NEW.inmueble,'9');
    RETURN NEW;
    END;
    $verificador_mensuras$ LANGUAGE plpgsql;

    CREATE TRIGGER verificador_mensuras
  BEFORE INSERT OR UPDATE
  ON catastro.plano_m_inm
  FOR EACH ROW
  EXECUTE PROCEDURE catastro.verificador_mensuras();
