<?php
$menuLocations = get_nav_menu_locations();
$menuID = $menuLocations['primary'];
$primaryNav = wp_get_nav_menu_items($menuID);

?>

<html>
<meta http-equiv="refresh" content="0; url=<?= $primaryNav[0]->url ?>">

</html>