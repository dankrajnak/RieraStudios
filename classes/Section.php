<?php
abstract class Section{
	protected $request;
	protected $id;
	protected $subsection;

	public function __construct($subsection, $id, $request){
		$this->request = $request;
		$this->subsection = $subsection;
		$this->id = $id;
	}


	private function findPictures($workingDirectory){
		$d = dir($workingDirectory);
		$pictures = array();
		while(false !== ($entry = $d->read())){
			if(is_dir($d->path.'/'.$entry) && strpos($entry, '.') !== 0){
				$pictures = array_merge($pictures, $this->findPictures($d->path.'/'.$entry));
			}
			else if(substr($entry, strpos($entry, '.')) === '.jpg'){
				$pictures[] = $d->path.'/'.$entry;
			}
		}
		return $pictures;
	}

	private function sortPictures($pictures){
		$sortedPictures = array();
		foreach($pictures as $picture){
			if(false !== stripos($picture, 'personal')){
				$sortedPictures[personal] = $picture;
			}
			else if(false !== ($number = filter_var($picture, FILTER_SANITIZE_NUMBER_INT))){
				$sortedPictures[str_replace('-','', $number)] = $picture;
			}
		}
		ksort($sortedPictures);
		return $sortedPictures;

	}

	private function findSubtitles($workingDirectory){
		$d = dir($workingDirectory);
		$subtitlesPath = "notfound";
		while($subtitlesPath === "notfound" && false !== ($entry = $d->read())){
			if(is_dir($d->path.'/'.$entry) && strpos($entry, '.') !== 0){
				$subtitlesPath = $this->findSubtitles($d->path.'/'.$entry);
			}
			
			else if($subtitlesPath === "notfound" && substr($entry, strpos($entry, '.')) === '.txt' 
				&& false !== stripos($entry, 'subtitle')){
				$subtitlesPath = $d->path.'/'.$entry;
			}
		}
		return $subtitlesPath;
	}

	private function parseSubtitles($subtitlesPath){
		$subtitles = explode("\n", file_get_contents($subtitlesPath));
		for($i=0; $i<count($subtitles); $i++){
			trim($subtitles[$i]);
			//Trim off leading numbers.  Less than 9 because when the number becomes two digits, 
			//have to trim off the extra digit.
			if($i<9){
				$subtitles[$i] = substr($subtitles[$i], 2);
				$subtitles[$i] = trim($subtitles[$i]);
			}
			else{
				$subtitles[$i] = substr($subtitles[$i], 3);
				trim($subtitles[$i]);
			}
		}
		return $subtitles;
	}

	private function findBio($workingDirectory){
		$d = dir($workingDirectory);
		$bioPath = "notfound";
		while($bioPath === "notfound" && false !== ($entry = $d->read())){
			if(is_dir($d->path.'/'.$entry) && strpos($entry, '.') !== 0){
				$bioPath = $this->findBio($d->path.'/'.$entry);
			}
			
			else if($bioPath === "notfound" && substr($entry, strpos($entry, '.')) === '.txt' 
				&& false !== stripos($entry, 'bio')){
				$bioPath = $d->path.'/'.$entry;
			}
		}
		return $bioPath;
	}

	private function parseBio($bioPath){
		$bio = explode("\n", file_get_contents($bioPath));
		foreach($bio as $key=>$entry){
			if(trim($entry) == '')
				unset($bio[$key]);
		}
		return $bio;
	}
	



	protected function createArtistPage($subsection){
		
		$directoryPath;
		if(get_class($this)==="ArtbrutArtists"){
			$directoryPath = "../Riera/views/artbrutartists/".$subsection;
			if(!file_exists($directoryPath))
			mkdir($directoryPath, 0755, true);
		}
		else if (get_class($this)==="OutsiderArtArtists"){
			$directoryPath = "../Riera/views/outsiderartartists/".$subsection;
			if(!file_exists($directoryPath))
			mkdir($directoryPath);
		}
		else{
			return;
		}

		//--------- Find pictures, subtitles, and create slider -----------
		//Find all pictures for this artist.
		if(get_class($this)==="ArtbrutArtists"){
		$pictures = $this->findPictures("../Riera/assets/artbrutassets/".$subsection);
		$pictures = $this->sortPictures($pictures);

		//Get subtitles (captions) path
		$subtitlesPath = $this->findSubtitles("../Riera/assets/artbrutassets/".$subsection);
		
		//Get subtitles (captions)
		$subtitles = $this->parseSubtitles($this->findSubtitles("../Riera/assets/artbrutassets/".$subsection));
		}
		// Outsider Artist
		else{
			$pictures = $this->findPictures("../Riera/assets/outsiderartassets/".$subsection);
			$pictures = $this->sortPictures($pictures);

			//Get subtitles (captions) path
			$subtitlesPath = $this->findSubtitles("../Riera/assets/outsiderartassets/".$subsection);
		
			//Get subtitles (captions)
			$subtitles = $this->parseSubtitles($this->findSubtitles("../Riera/assets/outsiderartassets/".$subsection));
		}
		
		$indexStream = fopen($directoryPath."/index.php", 'w+b');
		
		fwrite($indexStream, "<div class=\"section\" id=\"artistsection\">
			<div style=\"margin-top: 40px\">
			<div id=\"ninja-slider\">
			<div>
			<div class =\"slider-inner\">
			<ul>\n");
		
		if(count($pictures)>0){
			//-1 for the personal picture
			for($i=1; $i<count($pictures); $i++){
				fwrite($indexStream, "<li><a class=\"ns-img\" href=\"".substr($pictures[$i], 2)."\"></a>\n");
				if(!is_null($subtitles[$i-1]))
				fwrite($indexStream, "<span class = \"caption\">".$subtitles[$i-1]."</span>\n</li>\n");
			}
		}


		fwrite($indexStream, "
			</ul>
			<div class=\"fs-icon\" title=\"Expand/Close\"></div>
		</div>
		</div>
		</div>
		</div>
		<div class=\"sectionmenu\" id=\"artistsectionmenu\">
		<ul>");

		fwrite($indexStream, "
				<li><img src=\"".substr($pictures['personal'], 2)."\" width=\"150\" height=\"150\" style=\"opacity: .8;\"></img></li>");
		


		//--------- Find and Write Bio -----------
		//Find Bio
		if(get_class($this)==="ArtbrutArtists")
			$artistBio = $this->parseBio($this->findBio("../Riera/assets/artbrutassets/".$subsection));
		else
			$artistBio = $this->parseBio($this->findBio("../Riera/assets/outsiderartassets/".$subsection));
		$artistBioIndex = 0;
	

		//Title of Bio (includes name)
		fwrite($indexStream, "
			</ul>
			</div>
			<div class=\"sectiontext\" id=\"artistsectiontext\">
			<div class=\"sectiontitle\" id=\"artistssectiontitle\">");
		fwrite($indexStream, $artistBio[$artistBioIndex++]."\n");

		//Subtitle (includes DOB)
		fwrite($indexStream, "
			</div>
		<div class=\"sectionsubtitle\" id=\"artistssubsection\">");
		fwrite($indexStream, $artistBio[$artistBioIndex++]."\n");

		//Write the bio
		fwrite($indexStream, "
			</div>
			<div class=\"sectionbody\" id=\"artistsectionbody\">
			<p>");
		while($artistBioIndex<count($artistBio) && strtolower($artistBio[$artistBioIndex]) !== "exhibitions"){
		fwrite($indexStream, $artistBio[$artistBioIndex]);
		fwrite($indexStream, "<br/></p>\n");
		$artistBioIndex++;
		}
		
		//Test to see if there's an exhibition section
		if($artistBioIndex < count($artistBio)){
			//write exhibitions title and skip "exhibitions" element in array
			$artistBioIndex++;
			
			fwrite($indexStream, "<span style=\"font-weight: bold\">Exhibitions</span>\n<ul>");
			while($artistBioIndex<count($artistBio)){
				fwrite($indexStream, '<li>'.$artistBio[$artistBioIndex]."</li>\n");
				$artistBioIndex++;
			}
			fwrite($indexStream, "</ul>");
		}
		
		fwrite($indexStream, "
			</div>
			</div>
			</div>");
		fflush($indexStream);

		fclose($indexStream);
	}

	protected function displayPage($fullview, $subsection, $id){
		if($subsection && $id){
			$view = 'views/'.get_class($this).'/'.$subsection.'/'.$id.'.php';
		}
		else if($subsection){
			if(file_exists('views/'.get_class($this).'/'.$subsection.'/index.php')){
				$view = 'views/'.get_class($this).'/'.$subsection.'/index.php';
			}
			else{
				$view = 'views/'.get_class($this).'/'.$subsection.'.php';
			}
		}
		else{
			$view = 'views/'.get_class($this).'/index.php';
		}
		if($fullview){
			if($subsection && (get_class($this)==="ArtbrutArtists" || get_class($this)==="OutsiderArtArtists"  || get_class($this)==="Exhibitions") && file_exists('views/'.get_class($this).'/artistcustomheader.php')){
				require('views/'.get_class($this).'/artistcustomheader.php');
			}
			else if(file_exists('views/'.get_class($this).'/'.$subsection.'customheader.php')){
				require('views/'.get_class($this).'/'.$subsection.'customheader.php');
			}
			else{
				require('standardElements/standardHeader.php');
			}
			
			echo "\n<body>\n";
			
			require('standardElements/standardNavBar.php');
			echo "\n<div class=\"navbarscroll\"></div>";
			echo "\n<div class=\"bodycontent\">\n";
			//if(!file_exists($view))
			{
				if($subsection)
			$this->createArtistPage($subsection);
			require($view);
			}

			echo "\n</div>\n";
			echo "<div class=\"footer\">\n";
			require('standardElements/standardFooter.php');
			echo "\n</div>\n";
			echo "</body>\n";
			echo "</html>\n";
		}
		else{
			require($view);
		}
	}
}