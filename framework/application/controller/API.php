<?php
namespace Controller;
use Model\PersonAchievement;

use Core\Router;

use Model\Person;
use Model\Achievement;

class API {
	public function achievements($id=false) {
		if ($id != false && Achievement::Exists($id)) {

		} else {



			$c = Achievement::getAll();
			$count = count($c);
			if (isset($SERVER['HTTP_RANGE'])) {
				$range = substr($_SERVER['HTTP_RANGE'], 6);
				$aRange = explode("-", $range);
				$start = $aRange[0];
				$end = $aRange[1];
				if ($start < 0 || $start == null) {
					$start = 0;
				}

				if ($end < $start) {
					$sstart = $start;
					$start = $end;
					$end = $sstart;
				}

				if ($end-$start > 100) {
					$end = $start+100;
				}
				$c = array_slice($c, $start, $end-$start+1);
			}

			foreach ($c as $key=>$data) {
				unset($data->DB);
				unset($data->className);
				$c[$key] = $data;
			}
			header("Content-Range: items ".$start."-".($start+count($c))."/".($count-1));
			echo json_encode($c);
		}
	}


	public function members($id=false, $verb=false) {
		if ($id != false && Person::Exists($id)) {
			$p = new Person($id);
			if ($verb == false && $_SERVER['REQUEST_METHOD'] == "PUT") {
				$p->setAttributes(json_decode(file_get_contents("php://input")));
				return;
			} elseif ($verb == "achievements") {
				if (($AchId = Router::getArgument(2)) != false) {
					if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
						if (PersonAchievement::Exists($AchId)) {
							$p = new PersonAchievement($AchId);
							$p->Delete();
						}
					}
					return;
				}
				$out = array();
				foreach ($p->getAchievements() as $a) {
					$o = array();
					$o['id'] = $a->id;
					$o['comment'] = $a->comment;
					$ach = $a->getAchievement();
					$o['achievement_name'] = $ach->name;
					$o['achievement_id'] = $ach->id;
					$o['person_id'] = $a->person;
					$o['date'] = date("d/m/Y", $a->date);
					$awd = $a->getAwarder();
					$o['awarder_name'] = $awd->last_name.", ".$awd->first_name;
					$o['awarder_id'] = $awd->id;


					$o['value'] = $ach->type == 1? "Received" : $a->value;
					$out[] = $o;
				}
				echo json_encode($out);
				return;
			}
		}
		$c = \Model\Person::getAll();
		$count = count($c);
		if (!isset($_SERVER['HTTP_RANGE'])) {
			$start = 0;
			$end = 100;
		} else {
			$range = substr($_SERVER['HTTP_RANGE'], 6);
			$aRange = explode("-", $range);
			$start = $aRange[0];
			$end = $aRange[1];

			if ($start < 0 || $start == null) {
				$start = 0;
			}

			if ($end < $start) {
				$sstart = $start;
				$start = $end;
				$end = $sstart;
			}

			if ($end-$start > 100) {
				$end = $start+100;
			}
		}
		$c = array_slice($c, $start, $end-$start+1);

			
		foreach ($c as $key=>$data) {
			unset($data->DB);
			unset($data->className);
			$c[$key] = $data;
		}
		header("Content-Range: items ".$start."-".($start+count($c))."/".($count-1));
		echo json_encode($c);
	}
}
