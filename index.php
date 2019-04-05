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

$file = fopen( $filename, "a" );
fwrite( $file, PHP_EOL.$_POST["name"] );

$file = fopen( $filename, "r" );
while (!feof($file)) {

   echo "<li>".fgets($file)."</li>"."<br>";
} 


?>


<h1 style='text-align: center;' >  Footer </h1> 

</body>
</html>