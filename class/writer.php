<?php
 class Writer {

	public $file;
	public $data;
	public $open;
	
	public function __construct($file){
		$this->file = $file;

		return true;
	}
	
	
	public function openFile(){
	
		$this->open = fopen($this->file, "w") or die("Unable to open file!");
		return $this->open;
	}
	
	public function writeFile($data){
		fwrite($this->open, $data) or die ("unable to write data");
	
	}
	
	public function closeFile() {
		fclose($this->open)or die("Unable to close file!");
		
	}
	
}

?>