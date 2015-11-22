<?php

//Represents a petition object for a single session

class Petition {

	public $author;
	public $text;
	public $backers;

	public function __construct($ath, $txt){
		$this->backers = Array();
		$this->author = $ath;
		$this->text = $txt;
	}

	public function addBacker($backerID){
		array_push($this->backers, $backerID);
	}

	public function getAuthor(){
		return $this->author;
	}

	public function getText(){
		return $this->text;
	}

	public function getBackers(){
		return $this->backers;
	}
}
?>
