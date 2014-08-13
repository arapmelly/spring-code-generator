<?php

include 'class/entity.php';

$entity = $_POST['entity'];
$table = $_POST['table'];
$package=$_POST['package'];
$attributes = $_POST['attributes'];

echo '<pre>';
print_r($attributes);


/***
$attribute = array (
	0 => array(
		'name'=>'account',
		'type'=>'string',
		'column'=>'first_name',
		'mapping'=>'none'
	),
	1=>array(
		'name'=>'surName',
		'type'=>'string',
		'column'=>'sur_name',
		'mapping'=>'none'
	),
	2=>array(
		'name'=>'otherName',
		'type'=>'string',
		'column'=>'other_name',
		'mapping'=>'none'
	)
	);
	
	****/
	
//$write = new Entity($entity, $table , $attribute );

//$write->writeData();


?>