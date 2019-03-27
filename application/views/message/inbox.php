<?php if ($query->num_rows() > 0){ ?>
<table>
    <thead>
        <tr>
            <td>From</td>
            <td>Subject</td>
            <td>Date</td>
        </tr>
    </thead>
    <?php foreach ($query->result_array() as $row): { ?>
        <tr>
            <td><?php echo $row['msg_author'];?></td>
            <td><?php echo $row['msg_subject'];?></td>
            <td><?php echo $row['msg_date'];?></td>
        </tr>
    <?php } endforeach; ?>

</table>
<?php }else{
    echo "You have no messages!";
}