<?php

class Storage_db {
	private $db;

	public function __construct(){
		// Instantiate new Database object
		$this->db = new Database;

		// Set handler to overide SESSION
		session_set_save_handler(
			array($this, "_open"),
			array($this, "_close"),
			array($this, "_read"),
			array($this, "_write"),
			array($this, "_destroy"),
			array($this, "_gc")
		);

		session_start();
	}
	public function _open(){
		
		if($this->db)
		{
			return true;
		}
		return false;
	}
	public function _close(){
		
		if($this->db->close())
		{
			return true;
		}
		return false;
	}
	public function _read($id){
		
		$this->db->query('SELECT data FROM sessions2 WHERE id = :id');
		// Binding the Id
		$this->db->bind(':id', $id);
		
		if($this->db->execute())
		{
			if($this->db->rowCount() > 0)
			{
				$row = $this->db->single();
				
				return $row['data'];
			}
		}
		
		return '';
	}
	public function _write($id, $data){
		//  time stamp
		$access = time();
		 
		$this->db->query('REPLACE INTO sessions2 VALUES (:id, :access, :data)');
		
		$this->db->bind(':id', $id);
		$this->db->bind(':access', $access);  
		$this->db->bind(':data', $data);
		
		if($this->db->execute())
		{
			return true;
		}
		
		return false;
	}
	public function _destroy($id){
		
		$this->db->query('DELETE FROM sessions2 WHERE id = :id');
		
		$this->db->bind(':id', $id);
		
		if($this->db->execute())
		{
			return true;
		}
		
		return false;
	} 
	public function _gc($max){
		// Calculate what is to be deemed old
		$old = time() - $max;
		
		$this->db->query('DELETE FROM sessions2 WHERE access < :old');
		
		$this->db->bind(':old', $old);
		
		if($this->db->execute())
		{
			
			return true;
		}
		
		return false;
	}
}