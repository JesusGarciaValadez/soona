<?php
try {
    
    $dbh = new PDO( 'mysql:host=localhost;dbname=666316_prestashop_soona', '666316_s00n4', '2Y=kru9j#aZ4tXe3=PznV}' );
    $dbh->exec("SET CHARACTER SET utf8");
} catch ( PDOException $e ){
    
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}