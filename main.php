<html>
<head>
<title>My friend book</title>
</head>
<body>
<?php
include('header.html');
?>

<form action="main.php" method="post">
Name: <input type="text" name="name">
<input type="submit">
</form>

<?php
echo "<h1>My best friends: </h1>";




$filename = 'friends.txt';

$file = fopen( $filename, "a+" );
if( $file != false ) 
{
    while(!feof($file)) 
    {
        if(isset($_POST['nameFilter']))
        {
            $line=null;
            
            $nameFilter = $_POST['nameFilter'];
            $string=fgets($file);
            if(isset($_POST['startingWith']))
            {
                $pos=strpos($string,$nameFilter);
                if($pos==0)
                {
                    $line = strstr($string,$nameFilter);
                }

            }
            else{
                $line = strstr($string,$nameFilter);
            }

        }
        else{
            $line = fgets($file);

        }
        
        if($line)
        {
            echo "<li>$line</li>";

        }
       
    }
    if(isset($_POST['name']))
    {
        $name = $_POST['name'];
        echo "<li><b>$name</b><br></li>";
        fwrite( $file, "$name\n" );

    }

 fclose( $file );
}


?>

<form action="main.php" method="post">
<?php if(isset($_POST['nameFilter'])){$nameFilter = $_POST['nameFilter'];}?>
<input type="text" name="nameFilter" >
<?php if(isset($_POST['startingWith'])){$startingWith = $_POST['startingWith'];}?>
<input type="checkbox" name="startingWith" value="TRUE"  > Only names starting with</input>
<input type="submit" value ="filter">
</form>


<?php include('footer.html');?>

</body>
</html>





<style>
form
{
    margin-top:20px;        
}
/* Style the header */
header {
 background-color: #666;
 padding: 30px;
 text-align: center;
 font-size: 35px;
 color: white;
}
/* Style the footer */
footer {
 background-color: #777;
 padding: 10px;
 text-align: center;
 color: white;
}
</style>

