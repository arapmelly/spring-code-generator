<?php

class Dao {
	
	public $dao_entity;
	public $dao_filename;
	public $id_entity;
	
	public function __construct($entity, $id){
	
		$this->dao_entity = $entity;
		$this->id_entity = $id;
		return true;
	}
	
	public function writeData(){
	
		$this->dao_filename = $this->dao_entity.'DAO.java';
		
		$write = new Writer($this->dao_filename);
		$write->openFile();
		$write->writeFile($this->opendata());
		$write->writeFile($this->sessionData());
		$write->writeFile($this->createData());
		$write->writeFile($this->getData());
		$write->writeFile($this->deleteData());
		$write->writeFile($this->listData());
		$write->writeFile($this->closeData());
		$write->closeFile();
		
		return true;
	}
	
	
	public function opendata(){
	
		$opendata = "\n@Repository\npublic class ".$this->dao_entity."DAO\t{\n";
		return $opendata;
	}
	
	public function sessionData(){
	
		$data = "\n\n@Autowired\nprivate sessionFactory sessionFactory;\n\n private Session session(){\n\n\treturn sessionFactory.getCurrentSession();\n\n\t}\n";
		return $data;
	}
	
	
	
	public function createData(){
	
		$data = "\n\npublic void create".$this->dao_entity."(".$this->dao_entity." ".lcfirst($this->dao_entity)."){\n\n\tsession().save(".lcfirst($this->dao_entity).");\n\n\t}\n";
		return $data;
	}
	
	public function getData(){
	
		$data="\n\npublic ".$this->dao_entity." get".$this->dao_entity."(".$this->id_entity['type'] ." ".$this->id_entity['name']."){\n\n
		".$this->dao_entity." ".lcfirst($this->dao_entity)."Object = (".$this->dao_entity.") session().get(".$this->dao_entity.".class, ".$this->id_entity['name'].");\n
		return ".lcfirst($this->dao_entity)."Object;\n\n\t}\n";
		
		return $data;
	}
	
	
	
	public function deleteData(){
		$data = "\npublic void delete".$this->dao_entity."(".$this->id_entity['type'] ." ".$this->id_entity['name']."){\n\n".$this->dao_entity." ".lcfirst($this->dao_entity)." = get".$this->dao_entity."(".$this->id_entity['name'].");\n
					if(".lcfirst($this->dao_entity)." != null)\n\t\t\t session().delete(".lcfirst($this->dao_entity).");\n\n\t}\n";
		return $data;
	
	}
	
	public function listData(){
		$data = "\npublic List&lt;".$this->dao_entity."&gt; get".$this->dao_entity."() {\n\nreturn session().createQuery(".'"from '.$this->dao_entity.'"'.").list();\n\n\t}\n";
		return $data;
	
	}
	
	public function closeData() {
		$data = "\n\n}";
		
		return $data;
	}
	
}

?>