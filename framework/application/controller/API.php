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
			//FIXME can I request? (Permissions)
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
					
				}
				echo json_encode($out);
				return;
			} elseif ($verb = "emergency_contacts") {
				if (($AchId = Router::getArgument(2)) != false) {
					if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
						if (\Model\EmergencyContact::Exists($AchId)) {
							$p = new \Model\EmergencyContact($AchId);
							$p->Delete();
						}
					}
					return;
				}
				$out = array();
				foreach ($p->getEmergencyContacts() as $a) {
					$o['id'] = $a->id;
					$o['first_name'] = $a->first_name;
					$o['last_name'] = $a->last_name;
					$o['full_name'] = $a->last_name.", ".$a->first_name;
					$o['email'] = $a->email;
					$o['house_name'] = $a->house_name;
					$o['house_number'] = $a->house_number;
					$o['address_1'] = $a->address_1;
					$o['address_2'] = $a->address_2;
					$o['address_3'] = $a->address_3;
					$o['county'] = $a->county;
					$o['country'] = $a->country;
					$o['postal_code'] = $a->postal_code;
					$o['full_address'] = "";
					$ar = array("house_name","house_number","address_1", "address_2", "address_3", "county", "country", "postal_code");
					foreach ($ar as $com) {
						if ($a->$com != "") {
							$o['full_address'] .= $a->$com.", ";
						}
					}
					$o['full_address'] = substr($o['full_address'], 0, -2);
					$o['telephone'] = $a->telephone;
					$o['mobile_telephone'] = $a->mobile_telephone;
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
