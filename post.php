<?php

require 'config.php';

$return = array();

$query = $db->prepare('insert into sepet (kullaniciId, urunId, urunAdet)
                       values (:kullaniciId, :urunId, :urunAdet)');

$query->execute(array(
  'kullaniciId' => 1,
  'urunId' => $_POST['urunId'],
  'urunAdet' => $_POST['urunAdet']
));

if($query->rowCount()){
  $return['mesaj'] = 'işlem başarılı';
}else{
  $return['mesaj'] = 'işlem başarısız oldu';
}

echo json_encode($return);
