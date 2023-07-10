<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data-Project</title>
    <link rel="stylesheet" href="style.css">
    <style>
        th,
td{
    border: 1px double #000;
    padding: 5px;
}
    </style>
</head>
<body>
    <h1>Display data</h1>
    <a href="index.php">Back</a>
    
    <?php
      $display_data=mysqli_query($conn,"Select * from `phpcrud`");
      $num=1;
    if (mysqli_num_rows($display_data)>0){
        echo "<table>
        <thead>
            <th>Sl No</th>
            <th>Username</th>
            <th>Email</th>
            <th>Mobile Number</th>
            <th>Address</th>
            <th>Operation</th>
        </thead>
        <tbody>";
      while($row=mysqli_fetch_assoc($display_data)){
        
        ?>
         <tr>
                <td><?php  echo $num;?>  </td>
                <td><?php  echo $row['username']?></td>
                <td><?php  echo $row['email']?></td>
                <td><?php  echo $row['mobile']?></td>
                <td><?php  echo $row['address']?></td>
                <td>
                    <a href="delete.php?delete=<?php  echo $row
                    ['id']?> " onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                    <a href="update.php?edit=<?php  echo $row
                    ['id']?>">Edit</a>
                </td>
            </tr>

       <?php
       $num++;
      }
       
    }
    else{
        echo "<h2> No data<h2/>";
    }
    
    ?>
           
        </tbody>
    </table>
    
</body>
</html>