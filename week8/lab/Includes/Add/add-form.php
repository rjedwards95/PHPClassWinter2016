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
                <input type="text" value="<?php if(!empty($firstName)){echo $firstName;}?>" name="firstname"/>
            </td>
        </tr>
        <tr>
            <td>
                Last Name:
            </td>
            <td>
                <input type="text" value="<?php if(!empty($lastName)){echo $lastName;}?>" name="lastname"/>
            </td>
        </tr>
        <tr>
            <td>
                Email:
            </td>
            <td>
                <input type="text" value="<?php if(!empty($email)){echo $email;}?>" name="email"/>
            </td>
        </tr>
        <tr>
            <td>
                Telephone:
            </td>
            <td>
                <input type="tel" value="<?php if(!empty($tell)){echo $tell;}?>" name="telephone"/>
            </td>
        </tr>
        <tr>
            <td>
                Street Address:
            </td>
            <td>
                <input type="text" value="<?php if(!empty($street)){echo $street;}?>" name="street"/>
            </td>
        </tr>
        <tr>
            <td>
                Town:
            </td>
            <td>
                <input type="text" value="<?php if(!empty($town)){echo $town;}?>" name="town"/>
            </td>
        </tr>
        <tr>
            <td>
                State:
            </td>
            <td>
                <input type="text" value="<?php if(!empty($state)){echo $state;}?>" name="state"/>
            </td>
        </tr>
        <tr>
            <td>
                Zipcode:
            </td>
            <td>
                <input type="text" value="<?php if(!empty($zipcode)){echo $zipcode;}?>" name="zip"/>
            </td>
        </tr>
        <tr>
            <td>
                Website:
            </td>
            <td>
                <input type="text" value="<?php if(!empty($website)){echo $website;}?>" name="website"/>
            </td>
        </tr>
        <tr>
            <td>
                Birthday:
            </td>
            <td>
                <input type="date" value="<?php if(!empty($birthday)){echo date("Y-m-d",  strtotime($birthday));}?>" name="birthday"/>
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
</form>
<?php
if(isset($message)&&$message == true){
    echo $message;
}