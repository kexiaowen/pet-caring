<?php
 $db     = pg_connect("host=localhost port=5432 dbname=CS2102-Group8 user=postgres password=cs2102")
                  or die('Could not connect: ' . pg_last_error($db));
?>