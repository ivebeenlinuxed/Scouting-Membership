<?php
namespace Controller\Ajax;


use Model\Achievement;

class Person {
	public function details($id) {
		\Core\Router::loadView("ajax/person_details", array("person"=>new \Model\Person($id)));
	}
	
	public function addAchievementDlg() {
		\Core\Router::loadView("ajax/achievement_dlg");
	}
	
	public function addAchievement() {
		$date = strtotime($_POST['date']);
		$achievement = $_POST['achievement'];
		$value = $_POST['value'];
		$person = $_POST['person'];
		$comment = $_POST['comment'];
		
		if (!Achievement::Exists($achievement) || !\Model\Person::Exists($person)) {
			return;
		}
		
		$p = new \Model\Person($person);
		$p->awardAchievement(new Achievement($achievement), $_SESSION['user_id'], $date, $value, $comment);
		
		
		
	}
}