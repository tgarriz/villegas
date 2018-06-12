#!/bin/bash
createdb villegasdb
psql -d villegasdb -c "create schema catastro;"
psql -d villegasdb -f /var/www/html/villegas/database/generators/p_fisicas.sql
psql -d villegasdb -f /var/www/html/villegas/database/generators/p_juridicas.sql
psql -d villegasdb -f /var/www/html/villegas/database/generators/uso_inmueble.sql
psql -d villegasdb -f /var/www/html/villegas/database/generators/profesional.sql
psql -d villegasdb -f /var/www/html/villegas/database/generators/inmuebles.sql
psql -d villegasdb -f /var/www/html/villegas/database/generators/plano_obra.sql
psql -d villegasdb -f /var/www/html/villegas/database/generators/mensuras.sql
psql -d villegasdb -f /var/www/html/villegas/database/generators/phs.sql
psql -d villegasdb -f /var/www/html/villegas/database/generators/propietarios.sql
psql -d villegasdb -f /var/www/html/villegas/database/generators/destinatario_tasa.sql
psql -d villegasdb -f /var/www/html/villegas/database/generators/plano_m_inm.sql
psql -d villegasdb -f /var/www/html/villegas/database/generators/plano_o_inm.psql
psql -d villegasdb -f /var/www/html/villegas/database/generators/plano_ph_inm.sql
