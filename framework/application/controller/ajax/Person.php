<?php
namespace Controller\Ajax;

class Person {
	public function details($id) {
		\Core\Router::loadView("ajax/person_details", array("person"=>new \Model\Person($id)));
	}
}