<?php
namespace Controller\Ajax\Import;

use Model\Person;

class DofE {
	public function form() {
		\System\Core\Router::loadView("import/dofe_form");
	}
	
	public function upload() {
		$insert = array();
		var_dump($_FILES['dofe_upload']['tmp_name']);
		$f = fopen($_FILES['dofe_upload']['tmp_name'], "r");
		fgetcsv($f);
		while ($row = fgetcsv($f)) {
			foreach ($insert as $id) {
				if ($row[0] == $id)
					continue 2;
			}
			$insert[] = $row[0];
			Person::Create(array(
				"first_name"=>$row[1],
				"last_name"=>$row[2],
				"dob"=>strtotime($row[3]),
				"house_number"=>$row[7],
				"house_name"=>$row[8],
				"street_name"=>$row[9],
				"address_2"=>$row[10],
				"address_3"=>$row[11],
				"address_4"=>$row[12],
				"county"=>$row[13],
				"country"=>$row[14],
				"postal_code"=>$row[15]
			));
		}
		fclose($f);
		echo "Import Successful";
	}
}