            <table border="1">
                <tr>
                    <th>
                        Links Found on Page
                    </th>
                </tr>
                <?php foreach ($links as $row): ?>
                    <tr>
                        <td>
                            <?php echo $row['link']; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>