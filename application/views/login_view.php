<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
    <h3>Login</h3>
    <?php
      echo validation_errors();
      echo form_open('member/login2');
      echo 'Username:'.form_input('user', set_value('user')).'<br/>';
      echo 'Password:'.form_password('pass').'<br/>';
      echo form_submit('mysubmit', 'Submit');
      echo form_reset('myreset', 'Reset');
      echo form_close();
    ?>
  </body>
</html>
