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
		$foundIt = false;
		$subtitlesPath = "notfound";
		while($subtitlesPath === "notfound" && false !== ($entry = $d->read())){
			if(is_dir($d->path.'/'.$entry) && strpos($entry, '.') !== 0){
				$subtitlesPath = $this->findSubtitles($d->path.'/'.$entry);
			}
			
			else if($subtitlesPath === "notfound" && substr($entry, strpos($entry, '.')) === '.txt' 
				&& false !== stripos($entry, 'subtitles')){
				$subtitlesPath = $d->path.'/'.$entry;
			}
		}
		return $subtitlesPath;
	}

	private function parseSubtitles($subtitlesPath){
		$subtitles = array();
		$subtitlesStream = fopen($subtitlesPath, "r+b");
		while(false !== ($subtitle = fgets($subtitlesStream))){
		$subtitle = trim($subtitle);
			if($i<10){
				$subtitle = substr($subtitle, 3);
				$subtitle = trim($subtitle);
			}
			else{
				substr($subtitle, 4);
				$subtitle = trim($subtitle);
			}
			$subtitles[] = $subtitle;
		}
		return $subtitles;
	}



	protected function createArtistPage($subsection){
		
		$directoryPath;
		if(get_class($this)==="ArtbrutArtists"){
			$directoryPath = "../Riera/views/artbrutartists/".$subsection;
			if(!file_exists($directoryPath))
			mkdir($directoryPath, 0755, true);
		}
		else if (get_class($this)==="OutsiderArtArtists"){
			$directoryPath = "../Riera/views/oustsiderartartists/".$subsection;
			if(!file_exists($directoryPath))
			mkdir($directoryPath);
		}
		else{
			return;
		}
	
		//Find all pictures for this artist.
		$pictures = $this->findPictures("../Riera/assets/artbrutassets/".$subsection);
		$pictures = $this->sortPictures($pictures);

		//Get subtitles (captions) path
		$subtitlesPath = $this->findSubtitles("../Riera/assets/artbrutassets/".$subsection);
		
		//Get subtitles (captions)
		$subtitles = $this->parseSubtitles($this->findSubtitles("../Riera/assets/artbrutassets/".$subsection));

		
		$indexStream = fopen($directoryPath."/index.php", 'w+b');
		
		fwrite($indexStream, "<div class=\"section\" id=\"artistsection\">
			<div style=\"margin-top: 40px\">
			<div id=\"ninja-slider\">
			<div>
			<div class =\"slider-inner\">
			<ul>");
		
		
		if(count($pictures)>0){
			//-1 for the personal picture
			for($i=0; $i<count($pictures)-1; $i++){
				fwrite($indexStream, "<li><a class=\"ns-img\" href=\"".$pictures[i]."\"></a>\n");
				if(!is_null($subtitles[i]))
				fwrite($indexStream, "<span class = \"caption\">".$subtitles[i]."</span>\n</li>\n");
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
				<li><img src=\"/Riera/assets/artbrutassets/".$subsection."/personalphoto.jpg\" width=\"150\" height=\"150\" style=\"opacity: .8;\"></img></li>");
		


		fwrite($indexStream, "
			</ul>
			</div>
			<div class=\"sectiontext\" id=\"artistsectiontext\">
			<div class=\"sectiontitle\" id=\"artistssectiontitle\">");
		

		$artistBio = explode("\n", file_get_contents('../Riera/assets/artbrutassets/'.$subsection.'/bio.txt'));
		$artistBioIndex = 0;

		fwrite($indexStream, $artistBio[$artistBioIndex++]."\n");

		fwrite($indexStream, "
			</div>
		<div class=\"sectionsubtitle\" id=\"artistssubsection\">");
		
		fwrite($indexStream, $artistBio[$artistBioIndex++]."\n");

		fwrite($indexStream, "
			</div>
			<div class=\"sectionbody\" id=\"artistsectionbody\">
			<p>");

		fscanf($artistInfo, "%[ -~]", $artistBio);
		fwrite($indexStream, $artistBio);
		fwrite($indexStream, "<br/></p>\n");


		if(!feof($artistInfo)){
			fwrite($indexStream, "<span style=\"font-weight: bold\">\n");
			fscanf($artistInfo, '%[ -~]', $artistExhibitions);
			fwrite($indexStream, $artistExhibitions);
			fwrite($indexStream, "</span>");
			fwrite($indexStream, "<ul>");
			
			while(!feof($artistInfo)){
				fscanf($artistInfo, '%[ -~]', $artistExhibitions);
				fwrite($indexStream, '<li>'.$artistExhibitions."</li>\n");
			}
			fwrite($indexStream, "</ul>");
		}

		fwrite($indexStream, "
			</div>
			</div>
			</div>");
		fflush($indexStream);

		
		fclose($artistInfo);
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
			if(!file_exists($view))
			$this->createArtistPage($subsection);
			require($view);

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