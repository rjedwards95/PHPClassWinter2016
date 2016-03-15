<?php
if (!empty($results)) {
    foreach ($results as $result) {
        ?>
        <table class='table-condensed'>
            <tr>
                <td>

                </td>
                <td>
                    <img src="../images/<?php
                    if ($result['image'] !== NULL) {
                        echo $result['image'];
                    } else {
                        echo "blank-profile.jpg";
                    }
                    ?>" height="150" width="140"/>
                </td>
            </tr>
            <tr>
                <td>
                    Name: 
                </td>
                <td>
                    <?php echo " " . $result['fullname']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Email:
                </td>
                <td>
                    <a href="mailto:<?php echo $result['email'] ?>"><?php echo $result['email'] ?></a>
                </td>
            </tr>
            <tr>
                <td>
                    Address:
                </td>
                <td>
                    <a href="https://www.google.com/maps/dir/Current+Location/<?php echo preg_replace('/\s+/', '+', $result['address']); ?>"><?php echo$result['address'] ?></a>
                </td>
            </tr>
            <tr>
                <td>
                    Phone:
                </td>
                <td>
                    <a href="tel:+1<?php echo $result['phone']; ?>">Call: <?php echo $result['phone']; ?></a>
                </td>
            </tr>
            <?php if (!empty($result['website'])): ?>
                <tr>
                    <td>
                        Website:
                    </td>
                    <td>
                        <a href='<?php echo $result['website']; ?>'>Go To: <?php echo $result['website']; ?></a>
                    </td>
                </tr>
            <?php endif; ?>
            <tr>
                <td>
                    Birthday:
                </td>
                <td>
                    <?php echo date("m-d-Y", strtotime($result['birthday'])); ?>
                </td>
            </tr>
            <tr>
                <td>
                Group:
                </td>
                <td>
                    <?php echo $result['address_group'];?>
                </td>
            </tr>
        </table>
        <br/>
        <a class ="btn btn-primary" href="index.php?view=update&id=<?php echo $result['address_id']; ?>">Update</a>
        <a class="btn btn-warning" href="index.php?view=delete&id=<?php echo $result['address_id']; ?>">Delete</a>
        <?php
    }
} else {
    echo "Data not available";
}?>