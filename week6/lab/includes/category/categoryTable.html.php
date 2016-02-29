<table border="1" class="table table-striped">
    <tr>
        <th>Category</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    <?php foreach ($results as $row): ?>
        <tr>
            <td><?php echo $row['category']; ?></td>
            <td><a class ="btn btn-default" href = "update.php?id=<?php echo $row['category_id']; ?>">Update</a></td>
            <td><a class="btn btn-warning" href = "delete.php?id=<?php echo $row['category_id']; ?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>
</table>