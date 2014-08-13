<?php

$entity = ucfirst($_POST['entity']);
$table = $_POST['table'];



$attribute = $_POST['attname'];
$datatype= $_POST['datatype'];


echo $entity."<br/>".$table."<br/>";

print_r($attribute);


$myfile = fopen("$entity.java", "w") or die("Unable to open file!");

$wentity = "@Entity\n";
fwrite($myfile, $wentity);

$wtable = "@Table(name=".'"'.$table.'"'.")\n";
fwrite($myfile, $wtable);

$opener = "public class ".$entity." implements Serializable { \n\n\n";
fwrite($myfile, $opener);

foreach($attribute as $attribute) {

$wattr = "@Column(name=".'"'.$attribute.'"'.")\n";
fwrite($myfile, $wattr);
$data = "private $datatype $attribute;\n";
fwrite($myfile, $data);

}



$closer = " \n\n\n } ";
fwrite($myfile, $closer);



fclose($myfile);




?>