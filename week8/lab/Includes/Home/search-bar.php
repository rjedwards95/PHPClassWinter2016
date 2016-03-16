<table>
    <tr>
        <td>
            <form method="POST" action="#">
                Select Group: 
                <select name="address_group_id">
            <?php
            $groups = getGroup();
            foreach ($groups as $group): ?>
                <option 
                    <?php if(!empty($selectedGroup) && $selectedGroup == $group['address_group_id']):?>
                    selected="selected"
                    <?php endif; ?>
                    value="<?php echo $group['address_group_id']; ?>">
                    <?php echo $group['address_group']; ?>
                </option>
            <?php endforeach; ?>
            </select>
                <input type="submit" value="Sort"/>
            </form>
        </td>
        <td>
            <form method="POST" action="#">
                Enter Name:
                <input type="text" value="<?php if(isset($searchq)){echo $searchq;}?>" name="searchq"/>
                <select name="col">
            <?php
            $cols = colName();
            foreach ($cols as $col): 
                if($col != "user_id"&&$col != "address_group_id"&&$col != "address_id"&&$col != "image"){?>
                <option 
                    <?php if(!empty($selectedCol) && $selectedCol == $col):?>
                    selected="selected"
                    <?php endif; ?>
                    value="<?php echo $col; ?>">
                    <?php echo $col; ?>
                </option>
                <?php }endforeach; ?>
            </select>
                <input type="submit" value="Search"/>
            </form>
        </td>
    </tr>
</table>