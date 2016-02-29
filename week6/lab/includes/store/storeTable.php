<table class=' table-bordered'>
    <tr>
        <?php foreach ($results as $row): ?>
            <td>
                <table class='table'>
                    <tr>
                        <td>
                            <img width="45" height ="65" src="includes/products/uploads/<?php echo $row['image']; ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $row['product']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>$ <?php echo$row['price']; ?></td>
                        <td><form method="post" action ="#">
                                <input type ="hidden" name="product_id" value="<?php echo $row['product_id']; ?>"/>
                                <input type="Submit" value="Add"/>
                            </form></td>
                    </tr>
                </table>
            </td>
        <?php endforeach; ?>
    </tr>
</table>