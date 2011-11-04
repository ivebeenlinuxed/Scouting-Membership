<?php
namespace Model;

use Library\Database\LinqDB;

abstract class DBObject extends \System\Model\DBObject {
	public static function getDB() {
		return LinqDB::getDB("localhost", "onesocialworld", "onesocialworldpasswd123=", "onesocialworld");
	}
}