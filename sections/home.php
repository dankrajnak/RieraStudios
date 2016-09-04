<?php
class Home extends Section{
	public function Index(){
		$this->displayPage(false, $this->subsection, $this->id);
	}
}
?>