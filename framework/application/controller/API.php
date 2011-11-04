<?php
namespace Controller;
use Model\Person;

class API {
	public function members($id=false, $verb=false) {
		if ($id != false && Person::Exists($id)) {
			$p = new Person($id);
			if ($verb == false && $_SERVER['REQUEST_METHOD'] == "PUT") {
				$p->setAttributes(json_decode(file_get_contents("php://input")));
				return;
			} elseif ($verb == "achievements") {
				$out = array();
				foreach ($p->getAchievements() as $a) {
					unset($a->className);
					unset($a->DB);
					$out[] = $a;
				}
				echo json_encode($out);
				return;
			}
		}
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
		
		$c = \Model\Person::getAll();
		$cN = array_slice($c, $start, $end-$start+1);
		foreach ($cN as $key=>$data) {
			unset($data->DB);
			unset($data->className);
			$cN[$key] = $data;
		}
		header("Content-Range: items ".$start."-".($start+count($cN))."/".(count($c)-1));
		echo json_encode($cN);
	}
}