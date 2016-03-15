<?php if (!empty($results)) {
    foreach ($results as $result) {?>
<form method="post" action="#" enctype="multipart/form-data">
    <?php $groups = getGroup(); 
        $name = explode(" ",$result['fullname']);
        $address = explode("|",$result['address']);
    ?>
    <table>
        <tr>
            <td>
                Group:
            </td>
            <td>
                <select name="address_id">
            <?php foreach ($groups as $group): ?>
                <option 
                    <?php if($result['address_group_id'] == $group['address_group_id']):?>
                    selected="selected"
                    <?php endif; ?>
                    value="<?php echo $group['address_group_id']; ?>">
                    <?php echo $group['address_group']; ?>
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
                <input type="text" value="<?php if(!empty($name[0])){echo $name[0];}?>" name="firstname"/>
            </td>
        </tr>
        <tr>
            <td>
                Last Name:
            </td>
            <td>
                <input type="text" value="<?php if(!empty($name[1])){echo $name[1];}?>" name="lastname"/>
            </td>
        </tr>
        <tr>
            <td>
                Email:
            </td>
            <td>
                <input type="text" value="<?php if(!empty($result['email'])){echo $result['email'];}?>" name="email"/>
            </td>
        </tr>
        <tr>
            <td>
                Telephone:
            </td>
            <td>
                <input type="tel" value="<?php if(!empty($result['phone'])){echo $result['phone'];}?>" name="telephone"/>
            </td>
        </tr>
        <tr>
            <td>
                Street Address:
            </td>
            <td>
                <input type="text" value="<?php if(!empty($address[0])){echo $address[0];}?>" name="street"/>
            </td>
        </tr>
        <tr>
            <td>
                Town:
            </td>
            <td>
                <input type="text" value="<?php if(!empty($address[1])){echo $address[1];}?>" name="town"/>
            </td>
        </tr>
        <tr>
            <td>
                State:
            </td>
            <td>
                <input type="text" value="<?php if(!empty($address[2])){echo $address[2];}?>" name="state"/>
            </td>
        </tr>
        <tr>
            <td>
                Zipcode:
            </td>
            <td>
                <input type="text" value="<?php if(!empty($address[3])){echo $address[3];}?>" name="zip"/>
            </td>
        </tr>
        <tr>
            <td>
                Website:
            </td>
            <td>
                <input type="text" value="<?php if(!empty($result['website'])){echo $result['website'];}?>" name="website"/>
            </td>
        </tr>
        <tr>
            <td>
                Birthday:
            </td>
            <td>
                <input type="date" value="<?php if(!empty($result['birthday'])){echo date("Y-m-d",  strtotime($result['birthday']));}?>" name="birthday"/>
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
    <input type="submit" value="Update"/>
    <a href="index.php">Go back</a>
</form>
<?php
if(isset($message)&&$message == true){
    echo $message;
}}
} else {
    echo "Data not available";
}