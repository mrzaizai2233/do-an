<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wordpress";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// opening csv
$fp = fopen('cate.csv','r');

// creating a blank string to store values of fields of first row, to be used in query
$col_ins = '';

// creating a blank string to store values of fields after first row, to be used in query
$data_ins = '';

// read first line and get the name of fields
$data = fgetcsv($fp);
//chuyển title thành tiếng việt không dấu
// while($data=fgetcsv($fp)){
//     echo $data[0].'<br>';
// 	if ($conn->query($data[0]) === TRUE) {
//     echo "New record created successfully <br>";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }
// }
// die;
// for($field=0;$field< count($data);$field++){
//     // $col_ins = "'" . $data[$field] . "' , " . $col_ins;
//     echo $data[$field].'<br>';
// }
// echo $col_ins;
// reading next lines and insert into dB
//  for($field=0;$field<count($data);$field++){
//  	if($field>=count($data)-1)
//  		$data_ins .= "'" . $data[$field]. "'";
//  	else
//         $data_ins .= "'" . $data[$field] . "' , ";
//     }
//     echo $data_ins;
//     die;

while($data=fgetcsv($fp)){
    $data_ins=null;
    for($field=0;$field<count($data);$field++){
             if($field>=count($data)-1)
                 $data_ins .= "'" . $data[$field]. "'";
             else
                $data_ins .= "'" . $data[$field] . "' , ";
    }

    echo $sql = "INSERT INTO `wp_terms` (name,term_group,slug) VALUES(".$data_ins.")";
//     if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "<br>Error: " . $sql . "<br>" . $conn->error;
// }

}    

?>