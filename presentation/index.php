<?php
  // TODO: Look into autowiring the page to the controller so no container is needed on the page
  $container = require_once('../Container.php');
  $controller = $container->getIndexController();
  $model = $controller->index();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Index</title>
</head>
<body>
  <h1>Index</h1>
  
  <table>
  <thead>
    <tr>
	<th>Id</th>
	<th>First Name</th>
	<th>Last Name</th>
	</tr>
  </thead>
  <tbody>
    <?php foreach ($model as $person) { ?>
	<tr>
	  <td><?=$person->id?></td>
	  <td><?=$person->firstName?></td>
	  <td><?=$person->lastName?></td>
	</tr>
	<?php } ?>
  </tbody>
  </table>
  
</body>
</html>