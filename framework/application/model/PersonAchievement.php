<?php
namespace Model;

class PersonAchievement extends DBObject {
	public static function getTable($read=true) {return "contact_achievement";}
	public static function getPrimaryKey() {return array("id");}
	
	public static function getByPerson(Person $p) {
		return self::getByAttribute("person", $p->id);
	}
	
	public function getPerson() {
		return new Person($this->person);
	}
	
	public function getAwarder() {
		return new Person($this->awarder);
	}
	
	public function getAchievement() {
		return new Achievement($this->achievement);
	}
	
	public static function Award(Person $p, Achievement $a, $user=false, $date=false, $value=false, $comment="") {
		if ($date === false) {
			$date = time();
		}
		if ($user == false) {
			$user = $_SESSION['user_id'];
		}
		self::Create(array(
			"person"=>$p->id,
			"achievement"=>$a->id,
			"date"=>$date,
			"value"=>$value,
			"awarder"=>$user,
			"comment"=>$comment
		));
	}
}