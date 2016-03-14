<?php
$results = allData($_SESSION['id']);
if ($results != false || $results != null) {
    ?>
    <table>
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
                    <a href="index.php?view=view&id=<?php echo $row['address_id']; ?>">Read</a>
                </td>
                <td>
                    <a href="index.php?view=update&id=<?php echo $row['address_id']; ?>">Update</a>
                </td>
                <td>
                    <a href="index.php?view=deleteS&id=<?php echo $row['address_id']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        endforeach;
    }else {
        echo "No data yet.";
    }
    ?>
</table>