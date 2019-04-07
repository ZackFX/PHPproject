<?php 
$filename = 'friends.txt';
if(isset($_POST["name"]))
{	if($_POST["name"]!=""){
	$file = fopen( $filename, "a" );
	fwrite( $file, PHP_EOL.$_POST["name"] );
	fclose($file);
}
}
?>


<form action="index.php" method="post">
	Name: <input type="text" name="name">
	<input type="submit">
</form>

<?php
$file = fopen( $filename, "r" );
while (!feof($file)) {
	$word=fgets($file);
	if(isset($_GET["nameFilter"]))
	{
		if (isset($_GET["startingWith"]))
		{
			$pos = strpos(strtolower ($word), strtolower ($_GET["nameFilter"]));
			if ($pos !== false) 
			{
				if($pos===0)
				echo "<li>".$word."</li>";
			}
			
		}
		else
		{
			if(strstr(strtolower ($word),strtolower ($_GET["nameFilter"])))
				{echo "<li>".$word."</li>";}
		}
	}
	else
	{
		echo "<li>".$word."</li>";
	}
}
fclose($file);
?>

<form action="index.php" method="get">
	Filter: <input type="text" name="nameFilter">
	<input type="checkbox" name="startingWith">Only names starting with</input>
	<input type="submit">
</form>