CREATE OR REPLACE FUNCTION catastro.crear_nomencla_tri()
  RETURNS trigger AS
$BODY$
  DECLARE
  BEGIN
   NEW.nomencla:= trim(to_char(NEW.partido,'000'))||trim(to_char(NEW.circ,'00'))||lpad(trim(NEW.secc),2,'0')||
                      lpad(trim(NEW.chac_n),4,'0')||lpad(trim(NEW.chac_l),3,'0')||
                      lpad(trim(NEW.quin_n),4,'0')||lpad(trim(NEW.quin_l),3,'0')||
                      lpad(trim(NEW.frac_n),4,'0')||lpad(trim(NEW.frac_l),3,'0')||
                      lpad(trim(NEW.manz_n),4,'0')||lpad(trim(NEW.manz_l),3,'0')||
                      lpad(trim(NEW.parc_n),4,'0')||lpad(trim(NEW.parc_l),3,'0');
   NEW.nomencla_sp:= NEW.nomencla||lpad(trim(NEW.subp),6,'0');
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
