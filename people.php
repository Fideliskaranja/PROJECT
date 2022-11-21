<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `users` WHERE CONCAT(`id`, `fname`, `lname`, `age`, `profession`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `users`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "people");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Professionals Directoy</title>
        <meta name="description" content="An interactive getting started guide for Brackets.">
        <link rel="stylesheet" href="people.css">
        <link rel="stylesheet" href="script.js">
    </head>
    <body>
        <div class="container">
            <div class="menu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="people.php">People</a></li>
                    <li><a href="about.php">Contact Us</a></li>
                </ul>
            </div>
            <div class="peopletext">
                <h1>Professionals Directory</h1>
                <p>Here at Lt Creatives, you will find a list of directories that will aid you connect to other like minded individuals.</p><br>
                <p>The serch bar below will aid you find them. As instructed, search them by their profession.</p>
            </div>
            <div class="fcont">
                <form action="people.php" method="post">
                    <input type="text" name="valueToSearch" placeholder="Search By Profession"><br><br>
                    <input type="submit" name="search" value="Filter"><br><br>

                    <table>
                        <tr>
                            <th>Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Age</th>
                            <th>Profession</th>
                            <th>Email</th>
                        </tr>

              <!-- populate table from mysql database -->
                        <?php while($row = mysqli_fetch_array($search_result)):?>
                        <tr>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['fname'];?></td>
                            <td><?php echo $row['lname'];?></td>
                            <td><?php echo $row['age'];?></td>
                            <td><?php echo $row['profession'];?></td>
                            <td><?php echo $row['email'];?></td>
                        </tr>
                        <?php endwhile;?>
                    </table>
                </form>
            </div>
        </div>
</body>
</html>
