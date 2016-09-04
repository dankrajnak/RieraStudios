<?php
class About extends Section{
	public function Index(){
		$this->displayPage(true, $this->subsection, $this->id);
	}
}
?>