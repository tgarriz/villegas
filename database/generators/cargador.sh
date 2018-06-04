#!/bin/bash
psql -d villegasdb -f p_fisicas.sql
psql -d villegasdb -f p_juridicas.sql
psql -d villegasdb -f uso_inmueble.sql
psql -d villegasdb -f profesional.sql
psql -d villegasdb -f inmuebles.sql
psql -d villegasdb -f plano_obra.sql
psql -d villegasdb -f plano_mensura_ph.sql
psql -d villegasdb -f destinatario_tasa.sql
psql -d villegasdb -f propietarios.sql
psql -d villegasdb -f plano_mh_inmueble.sql
psql -d villegasdb -f plano_o_inmueble.sql
