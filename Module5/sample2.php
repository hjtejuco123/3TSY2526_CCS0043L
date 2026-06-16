<form method="get">
  <input type="text" name="name">
  <button type="submit">Submit</button>
</form>
<?php
echo $_GET['name'] ?? '';
?>