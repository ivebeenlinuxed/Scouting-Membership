<?php
namespace Model;

class Person extends DBObject {
	public static function getTable($read=true) {return "contact";}
	public static function getPrimaryKey() {return "id";}
	
	public function getAchievements() {
		
	}
}