<!-- <div>
<?php
// List up all results.
foreach ($results as $val)
{
echo $val['friend_name'];
}
?>
</div> -->
 <html>
 <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- <script src="main.js"></script> -->
</head>
<body>
    <div class="container">
 
        <h1>Search Results </h1>
 
        <table>
            <tr>
                <!-- <th>#</th> -->
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Actions</th>
            </tr>
            <?php
foreach ($results as $row) {
?>
<tr>
<td>
<?php echo $row['friend_name']; ?>
</td>
<td>
<?php echo $row['friend_age']; ?>
</td>
<td>
<?php echo $row['friend_gender']; ?>
</td>
</tr>
<?php
}
 
?>
        </table>
 
    </div>
</body>
</html>