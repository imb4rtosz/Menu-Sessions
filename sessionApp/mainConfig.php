<?php

    include("connect.db.class.php");	
	include("db.session.class.php");	
	include("file.session.class.php");





    //  Chose where you want to save session data.
	// Set $storageType to "db" if you want to save
	// session data in database, or set $storageType to
	// "file" if you want to save data in files.


	
	// $storageType = "dataBase";      // comment out $storageType that you 
	$storageType = "file";             // don't want to use





	class Session {
		
		public $db;
		public $files;

		public function setDB ($key, $value){

			$this->db = new Storage_db();
			$_SESSION[$key] = $value;
			echo $_SESSION[$key];
			

		}

	

		 public function setFile ($key, $value){
			
		 
			$this->files = new Storage_file();

		 	$this->files->set($key, $value);
			
			echo ($this->files->get($key)) ;
		 }



	}
    // depends on whether $storageType is "db" or "file save session 
	// data in database or files.
	
	if($storageType == "dataBase"){
		$session = new Session;
		$session->setDB('dbID', 'dbSessionData'); 
		
	    
		
	}else{
		$session = new Session;
		$session->setFile('fileID', 'fileSessionData');
		
	}

	