<?php 

class Sqlite{

	public function execute($database,$query)
	{	
		try {
	        // connect to your database
	        $db = new SQLite3($database);   

		
		    $tablesquery = $db->query($query);
		    // $tablesquery = $db->query("SELECT name FROM sqlite_master WHERE type='table';");
		    $tables = $tablesquery->fetchArray(SQLITE3_ASSOC);
		     // print_r($tables);
		    // foreach($tables as $name){
		    //    echo $name.'<br />';
		    // }

		    $data=array();

		    if (!empty($tables)) {
		    	while ($row = $tablesquery->fetchArray(SQLITE3_ASSOC)) {
				   $data[]=(object)$row;
				}
		    }
		    
		}
	    catch (Exception $exception) {
	        // sqlite3 throws an exception when it is unable to connect
	            $data="No existe registro";
	    }

		$data=(object) $data;
		

		//objects
		//
		//placa
		//fecLoc,dir(0-360),vel
		//lat,lon
		//ack estate transmition

		return $data;

		
	}

}
