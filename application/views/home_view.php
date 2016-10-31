<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Member</title>
  </head>
  <body>
    <h3>Member</h3>
    <?php
      echo anchor('member/index', 'Home').'|';
      echo anchor('member/update', 'Edit').'|';
      echo anchor('member/changepassword', 'Change Password').'|';
      echo anchor('member/logout', 'Logout').'<br/>';
      echo "Home";
    ?>
  </body>
</html>
