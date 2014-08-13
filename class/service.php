<?php

class Service {


	public $serv_entity;
	public $dao;
	public $ent;
	public $id_entity;
	
	public function __construct($entity, $id){
		$this->serv_entity = $entity."Service";
		$this->dao = $entity."DAO";
		$this->ent = $entity;
		$this->id_entity = $id;
	}
	
	public function writeData(){
	
		$this->serv_filename = $this->serv_entity.'.java';
		
		$write = new Writer($this->serv_filename);
		$write->openFile();
		$write->writeFile($this->opendata());
		$write->writeFile($this->createData());
		$write->writeFile($this->getData());
		$write->writeFile($this->deleteData());
		$write->writeFile($this->listData());
		$write->writeFile($this->closeData());
		$write->closeFile();
		
		return true;
	}
	
	public function opendata(){
		$data = "\n@Service\n@Transactional\npublic class ".$this->serv_entity." {\n\n@Autowired\n".$this->dao." ".lcfirst($this->dao).";\n\n";
		
		return $data;
	}
	
	
	public function createData(){
	
		$data = "\n\npublic void create".$this->ent."(".$this->ent." ".lcfirst($this->ent)."){\n\n\t".lcfirst($this->dao).".create".$this->ent."(".lcfirst($this->ent).");\n\n\t}\n";
		return $data;
	}
	
	public function getData(){
	
		$data="\n\npublic ".$this->ent." get".$this->ent."(".$this->id_entity['type'] ." ".$this->id_entity['name']."){\n\n\treturn ".lcfirst($this->dao).".get".$this->ent."(".$this->id_entity['name'].");\n\n\t}\n";
		
		
		return $data;
	}
	
	
	
	public function deleteData(){
		$data="\n\npublic void delete".$this->ent."(".$this->id_entity['type'] ." ".$this->id_entity['name']."){\n\n\t".lcfirst($this->dao).".delete".$this->ent."(".$this->id_entity['name'].");\n\n\t}\n";
		
		return $data;
	
	}
	
	public function listData(){
	$spr = "<";
		$data="\n\npublic List&lt;".$this->ent."&gt; get".$this->ent."(){\n\n\treturn ".lcfirst($this->dao).".get".$this->ent."();\n\n\t}\n";
		
		return $data;
	
	}
	
	public function closeData() {
		$data = "\n\n}";
		
		return $data;
	}
}

?>