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
				$pictures[] = substr($d->path.'/'.$entry, stripos($d->path, ROOT_PATH."assets"));
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
			else if(false !== ($number = filter_var(substr($picture, strripos($picture, "/")), FILTER_SANITIZE_NUMBER_INT))){
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
			if(trim($entry) == ''){
				unset($bio[$key]);
			}
			$bio[$key] = htmlentities($entry);
		}

		return $bio;
	}
	
	private function findExhibitionInfo($workingDirectory){
		$d = dir($workingDirectory);
		$infoPath = "notfound";
		while($infoPath === "notfound" && false !== ($entry = $d->read())){
			if(is_dir($d->path.'/'.$entry) && strpos($entry, '.') !== 0){
				$infoPath = $this->findExhibitionInfo($d->path.'/'.$entry);
			}
			
			else if($infoPath === "notfound" && substr($entry, strpos($entry, '.')) === '.txt' 
				&& false !== stripos($entry, 'info')){
				$infoPath = $d->path.'/'.$entry;
			}
		}
		return $infoPath;
	}

	/*An artist page is pulled from a bio, slider pictures, subtitles, and a personal photo.
	*The bio is structured artist name, DOB, biography, ["Exhibitions", list of exhibitions,] EOF
	*/
	protected function createArtistPage($subsection){
		
		$directoryPath;
		if(get_class($this)==="ArtbrutArtists"){
			$directoryPath = dirname(__DIR__)."/views/artbrutartists/".$subsection;
			if(!file_exists($directoryPath))
			{}
			//mkdir($directoryPath, 0755, true);
		}
		else if (get_class($this)==="OutsiderArtArtists"){
			$directoryPath = dirname(__DIR__)."/views/outsiderartartists/".$subsection;
			if(!file_exists($directoryPath)){}
			//mkdir($directoryPath);
		}
		else{
			return;
		}

		//--------- Find pictures, subtitles, and create slider -----------
		//Find all pictures for this artist.
		if(get_class($this)==="ArtbrutArtists"){
			$assetPath = dirname(__DIR__)."/assets/artbrutassets/".$subsection;
		}
		else{
			$assetPath = dirname(__DIR__)."/assets/outsiderartassets/".$subsection;
		}
		$pictures = $this->findPictures($assetPath);
		$pictures = $this->sortPictures($pictures);

		//Get subtitles (captions) path
		$subtitlesPath = $this->findSubtitles($assetPath);
		
		//Get subtitles (captions)
		$subtitles = $this->parseSubtitles($this->findSubtitles($assetPath));

		

		//Begin Writing to index file.
		$indexStream = fopen($directoryPath."/index.php", 'w+b');
		
		fwrite($indexStream, "<div class=\"section\" id=\"artistsection\">
			<div id=\"ninja-slider\">
			<div>
			<div class =\"slider-inner\">
			<ul>\n");
		
		if(count($pictures)>0){
			//-1 for the personal picture
			for($i=1; $i<count($pictures); $i++){
				fwrite($indexStream, "<li><a class=\"ns-img\" href=\"".$pictures[$i]."\"></a>\n");
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
		<div class=\"sectionmenu\" id=\"artistsectionmenu\">
		<ul>");

		//Artist personal photo
		fwrite($indexStream, "
				<li id=\"backbutton\"><a href=\"javascript:history.back(1)\"><span>&lt</span> Back</a></li>");
		fwrite($indexStream," <li><img src=\"".$pictures['personal']."\" width=\"150\" height=\"150\" style=\"opacity: .8;\"></img></li>");
		


		//--------- Find and Write Bio -----------
		//Find Bio

		$artistBio = $this->parseBio($this->findBio($assetPath));
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
		fwrite($indexStream, "<br/>\n");
		$artistBioIndex++;
		}
		fwrite($indexStream, "</p>\n");

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
	/*An exhibition table is made from slider pictures, subtitles, and a bio text file
	*the text file is sturctured exhibition name, dates, "Artists", list of artists, ["Words on Catalogue...", information about
	*exhibition,] EOF
	*/
	protected function createExhibitionPage($subsection){
		$directoryPath = dirname(__DIR__)."/views/exhibitions/".$subsection;
		$assetPath = dirname(__DIR__)."/assets/exhibitions/".$subsection;
		if(!file_exists($directoryPath))
			mkdir($directoryPath);
		
		//--------- Find pictures, subtitles, and create slider -----------
		//Find all pictures for this exhibition
		$pictures = $this->findPictures($assetPath);
		$pictures = $this->sortPictures($pictures);
		

		//--------- Find Exhibition info and parse info ---------------
		//Find Info
		$exhibitionInfo = $this->parseBio($this->findExhibitionInfo($assetPath));
		$exhibitionInfoIndex = 0;

	
		//Get exhibition title and date.
		$exhibitionTitle = $exhibitionInfo[$exhibitionInfoIndex++];
		$exhibitionDate = $exhibitionInfo[$exhibitionInfoIndex++];

		//skip "Artist"
		$exhibitionInfoIndex++;
		
		//Get all artists
		$artistIndex = 0;
		$artists = array();
		while(false === stripos(strtolower($exhibitionInfo[$exhibitionInfoIndex]), 'words on catalogue') and $exhibitionInfoIndex <=count($exhibitionInfo)){
			$artists[$artistIndex++] = $exhibitionInfo[$exhibitionInfoIndex++];
		}
		//Get words on catalogue line
		$exhibitionWordsOnCatalogue = $exhibitionInfo[$exhibitionInfoIndex++];
		
		//Get exhibition text
		$exhibitionText = array();
		$exhibitionTextIndex = 0;
		while($exhibitionInfoIndex < count($exhibitionInfo) and 0 !== stripos(strtolower($exhibitionInfo[$exhibitionInfoIndex]), '*'))
			$exhibitionText[$exhibitionTextIndex++] = $exhibitionInfo[$exhibitionInfoIndex++];

		//Get footnote if it exists
		$footnote = false;
		if($exhibitionInfoIndex != count($exhibitionInfo))
			$footnote = $exhibitionInfo[$exhibitionInfoIndex];

		//--------------------------------------------------------------


		//Begin Writing to index file.
		$indexStream = fopen($directoryPath."/index.php", 'w+b');
		

		fwrite($indexStream, "<div class=\"section\" id=\"exhibitionsection\">
			<div id=\"ninja-slider\">
			<div>
			<div class =\"slider-inner\">
			<ul>\n");
		
		if(count($pictures)>0){
			for($i=1; $i<=count($pictures); $i++){
				fwrite($indexStream, "<li><a class=\"ns-img\" href=\"".$pictures[$i]."\"></a></li>\n");
			}
		}


		fwrite($indexStream, "
			</ul>
			<div class=\"fs-icon\" title=\"Expand/Close\"></div>
		</div>
		</div>
		</div>
		</div>
		<div class=\"sectionmenu\" id=\"exhibitionsectionmenu\">
		<ul>");

		fwrite($indexStream, "
				<li id=\"backbutton\"><a href=\"".$_SERVER['HTTP_REFERER']."\"><span>&lt</span> Back</a></li>\n");
		fwrite($indexStream, "<li><strong style=\"color: #DE483F; font-size: 20px;\">Artists</strong></li>\n");

		//Get all artists
		$artBrutArtistDirectory = new DirectoryIterator(dirname(__DIR__)."/views/artbrutartists");
		$allArtBrutArtists = array(); 
		foreach($artBrutArtistDirectory as $element){
			if($element->isDir())
			array_push($allArtBrutArtists, $element->getBaseName());
		}

		$outsiderArtArtistDirectory = new DirectoryIterator(dirname(__DIR__)."/views/outsiderartartists");
		$allOutsiderArtArtists = array();
		foreach($outsiderArtArtistDirectory as $element){
			if($element->isDir())
			array_push($allArtBrutArtists, $element->getBaseName());
		}

		//Find the artist with the smallest levenshtein distance for every artist as the name of the artist listed in the
		//exhibition can vary a little from the name of the artist in the artists section.  Weigh false positives and negatives
		//approrpiately.   
		foreach($artists as $artist){
			//Format the artist to loook like the views
			$temp = str_replace(' ','-', $artist);
			$temp = str_replace('.','', $temp);
			$temp = str_replace('&acute','', $temp);
			$temp = strtolower($temp);
			
			$minDistance = levenshtein($temp, $allArtBrutArtists[0]);
			$closestMatch = $allArtBrutArtists[0];

			foreach($allArtBrutArtists as $artBrutArtist){
				if($minDistance > levenshtein($temp, strtolower($artBrutArtist))){
					$minDistance = levenshtein($temp, strtolower($artBrutArtist));
					$closestMatch =  $artBrutArtist;
				}
			}

			foreach($allOutsiderArtArtists as $outsiderArtArtist){
				if($minDistance > levenshtein($temp, strtolower($outsiderartArtist))){
					$minDistance = levenshtein($temp, strtolower($outsiderArtArtist));
					$closestMatch =  $outsiderArtArtist;
				}
			}

			
			//See if this closest match is a good one and make a link if it is
			if(($minDistance / (float) strlen($closestMatch)) <= .7){
				if(file_exists(dirname(__DIR__)."/views/artbrutartists/".$closestMatch."/index.php")){
					fwrite($indexStream, "<li><a href=\"".ROOT_PATH."artbrutartists/".$closestMatch."\"> ".$artist."</a></li>\n");
				} 
				elseif(file_exists(ROOT_PATH."views/outsiderartartists/".$closestMatch)){
					fwrite($indexStream, "<li><a href=\"".ROOT_PATH."views/outsiderartartists/".$closestMatch."\"> ".$artist."</a></li>\n");
				}
			}
			else{
				fwrite($indexStream, "<li>".$artist."</li>\n");	
			}
		}
		fwrite($indexStream, "</ul>\n");

		//Title of Exhibition
		fwrite($indexStream, "
			</div>
			<div class=\"sectiontext\" id=\"exhibitionsectiontext\">
			<div class=\"sectiontitle\" id=\"exhibitionsectiontitle\">");
		fwrite($indexStream, $exhibitionTitle."\n");

		//Date of Exhibition
		fwrite($indexStream, "
			</div>
		<div class=\"sectionsubtitle\" id=\"exhibitionsubtitle\">\n");
		fwrite($indexStream, $exhibitionDate."\n</div>\n");

		

		//Exhibition text
		fwrite($indexStream, "<div class=\"sectionbody\" id=\"exhibitionsectionbody\">\n");

		fwrite($indexStream, "<span> ".$exhibitionWordsOnCatalogue."</span>\n");
		foreach($exhibitionText as $paragraph)
			fwrite($indexStream, "<p>".$paragraph."</p>\n");
		
		//Footnote
		if($footnote){
			fwrite($indexStream, "<span>".$footnote."</span>");
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
			$view = 'views/'.strtolower(get_class($this)).'/'.$subsection.'/'.$id.'.php';
		}
		else if($subsection){
			if(file_exists('views/'.strtolower(get_class($this)).'/'.$subsection.'/index.php')){
				$view = 'views/'.strtolower(get_class($this)).'/'.$subsection.'/index.php';
			}
			else{
				$view = 'views/'.strtolower(get_class($this)).'/'.$subsection.'.php';
			}
		}
		else{
			$view = 'views/'.strtolower(get_class($this)).'/index.php';
		}
		if($fullview){
			if($subsection && (get_class($this)==="ArtbrutArtists" || get_class($this)==="OutsiderArtArtists"  || get_class($this)==="Exhibitions") && file_exists('views/'.strtolower(get_class($this)).'/artistcustomheader.php')){
				require('views/'.strtolower(get_class($this)).'/artistcustomheader.php');
			}
			else if(file_exists('views/'.strtolower(get_class($this)).'/'.$subsection.'customheader.php')){
				require('views/'.strtolower(get_class($this)).'/'.$subsection.'customheader.php');
			}
			else{
				require('standardElements/standardHeader.php');
			}
			
			echo "\n<body>\n";
			
			require('standardElements/standardNavBar.php');
			echo "\n<div class=\"navbarscroll\"></div>";
			echo "\n<div class=\"bodycontent\">\n";
			
			/*if(!file_exists($view))
			{
				if($subsection && get_class($this)=="Exhibitions"){
					$this->createExhibitionPage($subsection);
				}
				else if($subsection){
					$this->createArtistPage($subsection);
				}
			}*/

			if(file_exists($view)){
				require($view);
			}else{
				require("views/fourofour/index.php");
			}

			echo "\n</div>\n";
			echo "<div class=\"footer\">\n";
			require('standardElements/standardFooter.php');
			echo "\n</div>\n";
			echo "</body>\n";
			echo "</html>\n";
		}
		else{
			if(file_exists($view)){
				require($view);
			}else{
				require("views/fourofour/index.php");
			}
		}
	}
}