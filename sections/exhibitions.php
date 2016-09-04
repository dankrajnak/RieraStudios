<?php
class Exhibitions extends Section{
	public function Index(){
		$this->displayPage(true, $this->subsection, $this->id);
	}
}
?>