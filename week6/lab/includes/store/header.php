<table>
    <tr>
    <h1>Shop.now</h1>
</tr>
<tr>
    <td>
        <form method="GET" action="#">
            Select Category:
            <select name="category_id">
                <?php foreach ($categories as $catRow): ?>
                    <option <?php
                    if ($catRow['category_id'] == $id) {
                        echo "selected = 'selected'";
                    }
                    ?> value="<?php echo $catRow['category_id']; ?>">
                            <?php echo $catRow['category']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Search"/>
        </form>
    </td>
        <?php if(count($_SESSION['cart']) > 0):?>
    <td><a href="cart.php" >Click here to checkout:</a> <a href="cart.php" > Cart</a> (<?php echo count($_SESSION['cart']); ?>)</td>
       <?php endif;?>
</tr>
</table>