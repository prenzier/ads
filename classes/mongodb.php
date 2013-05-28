<?php

// connect localhost
$m = new MongoClient();
// select a database
$db = $m->advertising;

// select a collection (analogous to a relational database's table)
$briefing = $db->briefing;

// select a collection (analogous to a relational database's table)
$executivos = $db->executivos;


#// add a record
#$document = array( "title" => "Calvin and Hobbes", "author" => "Bill Watterson" );
#$briefing->insert($document);

?>
