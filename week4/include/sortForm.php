<?php
$order = "";
$column = "";
$colName = colName("corps");

if (isGetRequest()) {
    $order = filter_input(INPUT_GET, 'order');
    $column = filter_input(INPUT_GET, 'columnSort');
}
?>


<form action="#" method="GET">
    <table>
        <tr>
            <td>
                Ascending 
            </td>
            <td>
                <input type="radio" name="order" <?php if ($order === 'ASC'): ?>checked="checked" <?php endif; ?>value="ASC"/>
            </td>
        </tr>
        <tr>
            <td>
                Descending 
            </td>
            <td>
                <input type="radio" name="order" <?php if ($order === 'DESC'): ?>checked="checked" <?php endif; ?>value="DESC"/>
            </td>
        </tr>
        <tr>
            <td>
                Order by:
            </td>
            <td>
                <select name="columnSort">
                    <?php foreach ($colName as $cols): ?>
                        <option 
                            value="<?php echo $cols; ?>"
                            <?php if ($column === $cols): ?>
                                selected="selected"
                            <?php endif; ?>
                            >   <?php echo $cols ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
    </table>
        <input type="hidden" name="action" value="sort"/>
        <input type="submit" value="Submit"/>
        <input type="reset" value="Reset"/>
    
</form>
