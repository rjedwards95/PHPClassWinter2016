<?php
$searchCol = "";
$colName = colName("corps");


if (isGetRequest()) {
    $search = filter_input(INPUT_GET, 'search');
    $column = filter_input(INPUT_GET, 'column');
}
?>


<form action="#" method="GET">
    <table>
        <tr>
            <td>
                Search for: 
            </td>
            <td>
                <input type="text" name="search" value="<?php if (isset($search)) {echo $search;} ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                Which Column:
            </td>
            <td>
                <select name="column">
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
    <input type="hidden" name="action" value="search"/>
    <input type="submit" value="Submit"/>
    <input type="reset" value="Reset"/>
</form>