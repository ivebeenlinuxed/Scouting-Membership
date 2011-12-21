<?php
namespace Model;

class EmergencyContact extends DBObject {
	public static function getTable($read=true) {return "emergency_contact";}
	public static function getPrimaryKey() {return "id";}
	public static function getByPerson(Person $p) {
		return self::getByAttribute("person", $p->id);
	}
}