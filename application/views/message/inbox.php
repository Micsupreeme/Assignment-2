<h1>Announcements</h1>
<?php if ($announcements->num_rows() > 0){ ?>
<table>
    <thead>
        <tr>
            <th>Subject</th>
            <th>Date</th>
            <th></th>
        </tr>
    </thead>
    <?php foreach ($announcements->result_array() as $row): { ?>
        <tr>
            <td><?php echo $row['msg_subject'];?></td>
            <td><?php echo $row['msg_date'];?></td>
            <td><a href="<?php echo  base_url('index.php/message/viewannouncement/' .  $row['msg_id']) ?>">View</a> </td>
        </tr>
        <?php } endforeach; ?>
</table>
<?php }else{
echo "You have no announcements!";
} ?>
<h1>Messages</h1>
<a href="<?php echo  base_url('index.php/message/newmessage/') ?>">New Message</a> <br>
<?php if ($messages->num_rows() > 0){ ?>
<table>
    <thead>
        <tr>
            <th>From</th>
            <th>Subject</th>
            <th>Date</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <?php foreach ($messages->result_array() as $row): { ?>
        <tr>
            <td><?php echo $row['msg_author'];?></td>
            <td><?php echo $row['msg_subject'];?></td>
            <td><?php echo $row['msg_date'];?></td>
            <td><a href="<?php echo  base_url('index.php/message/viewmessage/' .  $row['msg_id']) ?>">View</a> </td>
            <td><a href="<?php echo $_SERVER['PHP_SELF'] . '?delete=' . $row['msg_id'] ?>">Delete</a></td>
        </tr>
    <?php } endforeach; ?>

</table>
<?php }else{
    echo "You have no messages!";
}?>