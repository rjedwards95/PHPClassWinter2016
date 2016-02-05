<form action="#" method="POST">
    Select from dropdown:   <select>
        <?php foreach ($columns as $column): ?>
            <option<?php if ($column['site_id'] == $site_id): ?> selected="selected"<?php endif; ?> value ="<?php echo $column['site_id']; ?>"><?php echo $column['site']; ?> </option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value ="Submit"/>
</form>