<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Change password</title>
  </head>
  <body>
    <h3>Change password</h3>
    <?php
      echo validation_errors();
      echo form_open('member/changepassword2');
      echo 'Old password:'.form_password('oldpass').'<br/>';
      echo 'New password:'.form_password('newpass').'<br/>';
      echo 'Confirm password:'.form_password('confpass').'<br/>';
      echo form_submit('mysubmit', 'Submit');
      echo form_reset('myreset', 'Reset');
      echo form_close();
    ?>
  </body>
</html>
