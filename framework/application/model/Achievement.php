<?php
namespace Model;

class Achievement extends DBObject {
	public static function getTable($read=true) {return "achievement";}
	public static function getPrimaryKey() {return array("id");}
	
}