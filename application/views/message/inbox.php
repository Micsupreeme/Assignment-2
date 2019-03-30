<a href="<?php echo  base_url('/message/newmessage/') ?>">New Message</a> <br>
<h1><?php echo $this->session->userdata('firstName')?>'s Messages</h1>

<?php if ($query->num_rows() > 0){ ?>
<table>
    <thead>
        <tr>
            <td>From</td>
            <td>Subject</td>
            <td>Date</td>
            <td></td>
            <td></td>
        </tr>
    </thead>
    <?php foreach ($query->result_array() as $row): { ?>
        <tr>
            <td><?php echo $row['msg_author'];?></td>
            <td><?php echo $row['msg_subject'];?></td>
            <td><?php echo $row['msg_date'];?></td>
            <td><a href="<?php echo  base_url('/message/viewmessage/' .  $row['msg_id']) ?>">View</a> </td>
            <td><a href="<?php echo $_SERVER['PHP_SELF'] . '?delete=' . $row['msg_id'] ?>">Delete</a></td>
        </tr>
    <?php } endforeach; ?>

</table>
<?php }else{
    echo "You have no messages!";
}