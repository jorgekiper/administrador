<?php

if(isset($ambiente) && !empty($ambiente)){
    
    switch ($ambiente){
        case "Developer":
            define( 'DATABASE', 'db_intranet' );
            define( 'USERNAME', 'root' );
            define( 'SECRET', '' );
            define( 'HOSTNAME', 'localhost' );
            break;
        
        case "Testing":
            define( 'DATABASE', 'db_festival_amapro' );
            define( 'USERNAME', 'des_axis18' );
            define( 'SECRET', 'd3s4rro110__' );
            define( 'HOSTNAME', 'mysql.axisdigital.com.mx' );
            break;
        
        case "Production":
            define( 'DATABASE', 'db_festival_amapro' );
            define( 'USERNAME', 'root' );
            define( 'SECRET', '' );
            define( 'HOSTNAME', 'localhost' );
            break;

        default:
            echo "<h1>No se encontro la configuración para el sistema</h1>"; exit;
    
    }
    
    
    
    /** Database Charset to use in creating database tables. */
    define( 'DB_CHARSET', 'utf8mb4' );

    /** The Database Collate type. Don't change this if in doubt. */
    define( 'DB_COLLATE', '' );
    
}
else{
    echo "<h1>No se encontro la configuración para el sistema</h1>"; exit;
}
    
    
?>