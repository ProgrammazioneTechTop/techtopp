<?php

function my_autoloader($className) {

        $firstLetter = $className[0];
        switch ($firstLetter) {
            case 'E':
                include_once( 'ENTITY/'. $className . '.php' );
                break;

            case 'F':
                include_once( 'FOUNDATION/'. $className . '.php' );
                break;

            case 'V':
                include_once( 'VIEW/'. $className . '.php' );
                break;

            case 'C':
                include_once( 'CONTROL/'. $className . '.php' );
                break;

            case 'I':
                include_once( $className . '.php' );
                break;

            case 'U':
                include_once ('FOUNDATION/Utility/'. $className. '.php');
                break;

    }
}

spl_autoload_register('my_autoloader');

?>