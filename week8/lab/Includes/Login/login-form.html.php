<!--Form for Login -->
<h3>Please login.</h3>
<form action="#" method="post">
    <table>
        <tr>
            <td>
                User:
            </td>
            <td>
                <input type="text" name="user"/>
            </td>
        </tr>
        <tr>
            <td>
                Password:
            </td>
            <td>
              <input type ="password" name="password"/>  
            </td>
        </tr>
    </table>
    <br/>
    <input type="submit" value="Submit" />
</form><br/>
<a href="?view=new">Create Account</a>
<?php if(isset($_SESSION['message'])){
    echo "<br/>" . $_SESSION['message'];
}