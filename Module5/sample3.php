<form method="post">
  <input type="text" name="email">
  <button type="submit">Submit</button>
</form>
<?php
echo $_POST['email'] ?? '';
?>