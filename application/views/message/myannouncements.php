<h1>My Announcements</h1>
<a href="<?php echo  base_url('index.php/message/createannouncement/') ?>">New Announcement</a> <br>
<?php if ($announcements->num_rows() > 0){ ?>
    <table>
        <thead>
        <tr>
            <td>Subject</td>
            <td>Date</td>
            <td></td>
            <td></td>
        </tr>
        </thead>
        <?php foreach ($announcements->result_array() as $row): { ?>
            <tr>
                <td><?php echo $row['msg_subject'];?></td>
                <td><?php echo $row['msg_date'];?></td>
                <td><a href="<?php echo  base_url('index.php/message/viewannouncement/' .  $row['msg_id']) ?>">View</a> </td>
                <td><a href="<?php echo $_SERVER['PHP_SELF'] . '?delete=' . $row['msg_id'] ?>">Delete</a></td>
            </tr>
        <?php } endforeach; ?>
    </table>
<?php }else{
    echo "You have no announcements!";
} ?>