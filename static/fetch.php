
<?php
include('database.php');

$output = '';
if(isset($_POST["query"]))
{
    $search = mysqli_real_escape_string($connection, $_POST["query"]);
    $query = "
    SELECT * FROM topic 
    WHERE title LIKE '%".$search."%' 
    ";


    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) > 0)
    {
        $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
        foreach($rows as $row){
            $output .= '
            <table class="table table-hover table-responsive">     
                <tr><td><strong>'.$row["title"].'</strong></td></tr>
            ';
        }
        echo $output;
    }
}

?>

