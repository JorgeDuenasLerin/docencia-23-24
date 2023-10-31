<?php

require_once('../config/db.php');

class DBConnection
{
    public function echo()
    {
        global $db_name;
        echo $db_name;
    }
}

?>
