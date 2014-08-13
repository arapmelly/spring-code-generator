<?php



class Entity {

	public $en_entity;
	public $table;
	public $attribute;
	public $id;
	public $filename;
	
	public function __construct($entity,$table,$attribute,$id){
	
		$this->en_entity = $entity;
		$this->table = $table;
		$this->attribute = $attribute;
		$this->id = $id;
		return true;
	
	}
	
	public function opendata(){
		
	
		$opendata = "\n@Entity\n@Table(name=".'"'.$this->table.'"'.")\npublic class ".$this->en_entity." implements Serializable { \n\n\n";

		return $opendata;
	}
	
	
	public function idData(){
	
		$data = "\n@Id\n@GeneratedValue (strategy = GenerationType.".$this->id['generation'].")\n@Column(name=".'"'.$this->id['column'].'"'.")\nprivate ".$this->id['type']." ".$this->id['name'].";\n\n";
		return $data;
	}
	
	public function attributeData($index){
		
		
			$data = "@Column(name=".'"'.$index['column'].'"'.")\nprivate ".$index['type']." ".$index['name'].";\n\n";
			
			return $data;
		
	
	}
	
	public function closeData() {
		$data = "\n\n}";
		
		return $data;
	}
	
	
	public function writeData() {
		$this->filename = $this->en_entity.'.java';
		
		$write = new Writer($this->filename);
		$write->openFile();
		$write->writeFile($this->opendata());
		$write->writeFile($this->idData());
		foreach ($this->attribute as $attr){
			$write->writeFile($this->attributeData($attr));
		}	
		$write->writeFile($this->closeData());
		$write->closeFile();
		
		return true;
	}

}


?>