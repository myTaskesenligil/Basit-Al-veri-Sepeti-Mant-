<?php

try {
  $db = new PDO('mysql:host=localhost;dbname=alisveris','root','');
} catch (\Exception $e) {
  print_r($e);
}
