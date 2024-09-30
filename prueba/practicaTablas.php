<?php

echo "<table>";
foreach ($_SERVER as $key => $value) {
    echo "<tr " . ($key == 'HTTP_USER_AGENT' ? "style='color: red'" : '') . "><td style='border: 1px solid black;'> " . $key . "</td><td style='border: 1px solid black;'> " . $value . "</td></tr>";
}
echo "</table>";
