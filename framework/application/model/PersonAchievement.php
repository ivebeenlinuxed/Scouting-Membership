<?php
namespace Model;

class PersonAchievement extends DBObject {
	public static function getTable($read=true) {return "contact_achievement";}
	public static function getPrimaryKey() {return array("person", "achievement");}
	
	public static function getByPerson(Person $p) {
		
	}
}