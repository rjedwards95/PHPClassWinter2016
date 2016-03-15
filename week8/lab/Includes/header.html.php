<div class ="header">
    <?php if($_SESSION['login'] == true):?>
    <h1>
        <?php echo $title . " page"; ?> 
    </h1>
    <table>
        <tr>
            <td>
                <a class ="btn btn-default" href="?view=home">Home</a>
            </td>
            <td>
                <a class ="btn btn-default" href="?view=add">Add</a>
            </td>
            <td>
                <a class ="btn btn-default" href="?view=logout">Logout</a>
            </td>
        </tr>
    </table>
    <?php else:?>
    <h4>
        Please Log in
    </h4>
    <?php if(!isset($view)){
        echo '<a href="?view=login"> Login</a>';
    }?>
    
    <?php endif;?>
</div>