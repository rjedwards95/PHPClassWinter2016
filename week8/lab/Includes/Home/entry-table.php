<?php
if(isset($_SESSION['id'])){
$results = allData($_SESSION['id']);
if ($results != false || $results != null) {
    ?>
    <table class="table table-bordered">
        <tr>
            <th>
                Name
            </th>
            <th>
                Read
            </th>
            <th>
                Update
            </th>
            <th>
                Delete
            </th>
        </tr>
        <?php foreach ($results as $row): ?>
            <tr>
                <td>
                    <?php echo $row['fullname']; ?>
                </td>
                <td>
                    <a class ="btn btn-default" href="index.php?view=view&id=<?php echo $row['address_id']; ?>">Read</a>
                </td>
                <td>
                    <a class ="btn btn-primary" href="index.php?view=update&id=<?php echo $row['address_id']; ?>">Update</a>
                </td>
                <td>
                    <a class="btn btn-warning" href="index.php?view=delete&id=<?php echo $row['address_id']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        endforeach;
    }else {
        echo "No data yet.";
    }
}
    ?>
</table>