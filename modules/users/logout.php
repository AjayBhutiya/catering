<?php
mustlogin();
Session::destroy();
redirect('users');
?>  