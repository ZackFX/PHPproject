<html>
<head>
    <title> Friend Book </title>
    <header style='text-align: center;'> <h1> Friend Book <h1></header>
    </head>
<body>

<form action="index.php" method="post">
Name: <input type="text" name="name">
<input type="submit">
</form><br><br><br>


<?php 
$filename = 'friends.txt';

$file = fopen( $filename, "a+" );

if (isset($_POST["name"]) && $_POST["name"]!="")
    fwrite( $file, PHP_EOL.$_POST["name"] );

rewind($file);

echo "<ol>";
while (!feof($file)) {
    echo "<li>".fgets($file)."</li>"."<br>";
} 
echo "</ol>";

rewind($file);
?>

<form action='index.php' method='post'>
Filter: <input type='text' name='nameFilter' value="<?=$nameFilter?>">
<input type="checkbox" name="startingWith" <?php if ($startingWith=='TRUE') echo "checked"?> value="TRUE">only names starting whit
<input type='submit'>
</form><br><br>

<?php
if (isset($_POST["nameFilter"])){
    $tab = array();

    while (!feof($file)) {
        $file2=fgets($file);
        $RESULT=stristr($file2,$_POST["nameFilter"]);
        if (($RESULT==$file2)) {
            array_push($tab,$RESULT);
           
        }
        
    } 
    echo "<ol>";
    foreach($tab as $friend){
        echo "<li>".$friend."</li>";

    }
    echo "</ol>";
}

fclose($file);
?>

<br><br>

<h1 style='text-align: center;' > Footer </h1> 
</body>
</html>