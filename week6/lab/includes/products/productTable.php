<table border="1" class="table table-striped">
    <tr>
        <th>Product</th>
        <th>Category</th>
        <th>Price</th>
        <th>Image</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    <?php foreach ($results as $row): ?>
        <tr>
            <td><?php echo $row['product']; ?></td>
            <td><?php echo $row['category_id'] . " - " . $row['category']; ?></td>
            <td><?php echo '$ ' . number_format($row['price'], 2); ?></td>
            <td><img src="../../includes/products/uploads/<?php echo $row['image'];?>" height="45" width="45"></td>
            <td><a class ="btn btn-default" href = "update.php?id=<?php echo $row['product_id']; ?>">Update</a></td>
            <td><a class="btn btn-warning" href = "delete.php?id=<?php echo $row['product_id']; ?>&img=../../includes/products/uploads/<?php echo $row['image'];?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>
</table>