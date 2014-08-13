<?php



class DTO {

	public $dto_entity;
	public $dto_filename;
	PUBLIC $dto_attribute;
	
	
	public function __construct($entity,$attributes){
	
		$this->dto_entity = $entity;
		$this->dto_attribute = $attributes;
		return true;
	
	}
	
	public function opendata(){
		
	
		$opendata = "\npublic class ".$this->dto_entity." implements Serializable { \n\n\n";

		return $opendata;
	}
	
	
	
	
	public function attributeData($index){
		
		
			$data = "\nprivate ".$index['type']." ".$index['name'].";\n\n";
			
			return $data;
		
	
	}
	
	public function closeData() {
		$data = "\n\n}";
		
		return $data;
	}
	
	
	public function writeData() {
		$this->dto_filename = $this->dto_entity.'DTO.java';
		
		$write = new Writer($this->dto_filename);
		$write->openFile();
		$write->writeFile($this->opendata());
		
		foreach ($this->dto_attribute as $attr){
			$write->writeFile($this->attributeData($attr));
		}	
		$write->writeFile($this->closeData());
		$write->closeFile();
		
		return true;
	}

}


?>