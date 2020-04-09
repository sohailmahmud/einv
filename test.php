<?php
backup_tables('localhost','root','','deped');

/* backup the db OR just a table */
require_once('database/Database.php');
$db = new Database();
function backup_tables($host,$user,$pass,$name,$tables = '*')
{

// $link = mysql_connect($host,$user,$pass);
// mysql_select_db($name,$link);

//get all of the tables
if($tables == '*')
{
$tables = array();
$result = $db->insertRow('SHOW TABLES');
while($row = mysql_fetch_row($result))
{
$tables[] = $row[0];
}
}
else
{
$tables = is_array($tables) ? $tables : explode(',',$tables);
}
foreach($tables as $table)
{
$result = mysql_query("SELECT * FROM $table");
$num_fields = mysql_num_fields($result);

$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
$return.= "\n\n".$row2[1].";\n\n";

for ($i = 0; $i < $num_fields; $i++)
{
while($row = mysql_fetch_row($result))
{
$return.= 'INSERT INTO '.$table.' VALUES(';
for($j=0; $j<$num_fields; $j++)
{
$row[$j] = addslashes($row[$j]);
if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
if ($j<($num_fields-1)) { $return.= ','; }
}
$return.= ");\n";
}
}
$return.="\n\n\n";
}


}
