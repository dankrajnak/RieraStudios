<?php
class FourOFour extends Section{
	public function Index(){

		//Display 404 page.
		$this->displayPage(true, $this->subsection, $this->id);
	}
}
?>