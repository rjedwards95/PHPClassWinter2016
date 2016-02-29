<?php if (isset($_SESSION['isValidUser']) && $_SESSION['isValidUser'] == true): ?>
    <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/c/c0/Lock_open.png"/>
<?php else: ?>
    <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/9/96/Lock.png"/>
<?php endif;