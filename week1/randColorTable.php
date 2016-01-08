<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP Color Grid</title>
    </head>
    <body>

        <?php
        //Including the rand_color() from the randColor.php doc.
        include_once './randColor.php';
        //Initializing collumn count and row count as 0.
        $colCount = 0;
        $rowCount = 0;
        ?>
        <table>
            <?php
            //Loops the table generation until collumn count and row count is done.

            do {
                ?>
                <tr>
                    <?php
                    //Loops collumn generation until number is met and runs rand_color() function.

                    do {
                        $color = rand_color();
                        ?>
                        <td style="background-color: <?php echo '#' . $color; ?> ">
        <?php echo $color; ?>
                            </br>
                            <span style="color:#FFF"> <?php echo $color; ?> </span>
                        </td>

                        <?php
                        //Adds 1 to rowCount and checks do/while condition.

                        $colCount++;
                    } while ($colCount < 10);
                    ?>
                </tr>
                <?php
                //Resets rowCount and adds 1 to colCount and checks row do/while condition.
                $rowCount++;
                $colCount = 0;
            } while ($rowCount < 10);
            ?>
        </table>
    </body>
</html>
