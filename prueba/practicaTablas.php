<?php

echo "<table>";
foreach ($_SERVER as $key => $value) {
    $style = $key == 'HTTP_USER_AGENT' ? "style='color: red'" : '';
    echo "<tr " . $style . "><td style='border: 1px solid black;'> " . $key . "</td><td style='border: 1px solid black;'> " . $value . "</td></tr>";
}
echo "</table>";
