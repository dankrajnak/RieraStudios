<?php
class Bootstrap{
	private $section;
	private $subsection;
	private $id;
	private $request;

	public function __construct($request){
		$this->request = $request;
		if($this->request['section'] == ""){
			$this->section = 'home';
		}else{
			$this->section = $this->request['section'];

		}
		$this->subsection = $request['subsection'];
		$this->id = $request['id'];

	}
	
	public function createSection(){
		// Check Class
		if(class_exists($this->section)){
			$parents = class_parents($this->section);
			//Check Extend
			if(in_array("Section", $parents)){
				return new $this->section($this->subsection, $this->id, $this->request);
			} else{
				//Base Section not extended
				$this->section = "FourOFour";
				return new $this->section($this->subsection, $this->id, $this->request);
			}
		} else{
			//Section Class does not exist
			$this->section = "FourOFour";
			return new $this->section($this->subsection, $this->id, $this->request);
		}
	
	}
}

?>


