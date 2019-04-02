<h1>New Message</h1>
<form method="post" action="">
    <label>To:</label>
    <input type="email" name="newMsgEmail" value="" placeholder="Recipient Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">

    <?php if ($this->session->userdata('authLevel') > 0){?>
        <a href="<?php echo  base_url('index.php/message/createannouncement/') ?>">Create Announcement</a> <br>
    <?php }?><br>

    <label>Subject:</label>
    <input type="text" name="newMsgSubject" placeholder="Message Subject"><br>
    <label>Message Body:</label><br>
    <textarea name="newMsgTxtArea" placeholder="Your Message" rows="4" cols="50"></textarea><br>
    <input type="submit" name="newMsgSubmit" value="Submit">
    <input type="reset" name="newMsgClear" value="Clear">
</form>