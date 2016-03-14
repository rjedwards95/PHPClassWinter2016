<form method="post" action="#" enctype="multipart/form-data">
    <?php $results = getGroup(); ?>
    <table>
        <tr>
            <td>
                Group:
            </td>
            <td>
                <select name="address_id">
            <?php foreach ($results as $row): ?>
                <option value="<?php echo $row['address_group_id']; ?>">
                    <?php echo $row['address_group']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            </td>
        </tr>
        <tr>
            <td>
                First Name:
            </td>
            <td>
                <input type="text" value="" name="firstname"/>
            </td>
        </tr>
        <tr>
            <td>
                Last Name:
            </td>
            <td>
                <input type="text" value="" name="lastname"/>
            </td>
        </tr>
        <tr>
            <td>
                Email:
            </td>
            <td>
                <input type="text" value="" name="email"/>
            </td>
        </tr>
        <tr>
            <td>
                Telephone:
            </td>
            <td>
                <input type="tel" value="" name="telephone"/>
            </td>
        </tr>
        <tr>
            <td>
                Street Address:
            </td>
            <td>
                <input type="text" value="" name="street"/>
            </td>
        </tr>
        <tr>
            <td>
                Town:
            </td>
            <td>
                <input type="text" value="" name="town"/>
            </td>
        </tr>
        <tr>
            <td>
                State:
            </td>
            <td>
                <input type="text" value="" name="state"/>
            </td>
        </tr>
        <tr>
            <td>
                Zipcode:
            </td>
            <td>
                <input type="text" value="" name="zip"/>
            </td>
        </tr>
        <tr>
            <td>
                Website:
            </td>
            <td>
                <input type="text" value="" name="website"/>
            </td>
        </tr>
        <tr>
            <td>
                Birthday:
            </td>
            <td>
                <input type="date" value="" name="birthday"/>
            </td>
        </tr>
        <tr>
            <td>
                Image:
            </td>
            <td>
                <input type="file" name="upfile"/>
            </td>
        </tr>
    </table>
    <input type="submit" value="Add"/>
    <a href="index.php">Go back</a>
    <?php echo $message;?>
</form>