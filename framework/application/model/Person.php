<?php
namespace Model;

class Person extends DBObject {
	public static function getTable($read=true) {return "contact";}
	public static function getPrimaryKey() {return "id";}
	
	public function getAchievements() {
		return PersonAchievement::getByPerson($this);
	}
	
	public function awardAchievement(Achievement $a, $user=false, $date=false, $value=false, $comment="") {
		
		
		PersonAchievement::Award($this, $a, $user, $date, $value, $comment);
	}
	
	public function getEmergencyContacts() {
		return EmergencyContact::getByPerson($this);
	}
}