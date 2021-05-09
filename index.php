<?php require 'config.php' ?>
<!DOCTYPE html>
<html lang="tr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="wrapper">
      <div class="left">
        Ürünler
        <table>
          <thead>
            <tr>
              <td>Ürün Adı</td>
              <td>Fiyatı</td>
              <td>İşlem</td>
            </tr>
          </thead>
          <tbody>
            <?php
              $query = $db->prepare('select * from urunler');
              $query->execute();
              foreach ($query as $row) {
            ?>
            <tr>
              <td> <?= $row['urunAdi'] ?> </td>
              <td> <?= $row['urunFiyati'] ?> TL</td>
              <td> <input type="text" name="urunAdet<?= $row['urunId'] ?>" value="" placeholder="Adet"> <button urunId='<?= $row['urunId'] ?>' type="button" name="sepeteEkle">Sepete Ekle</button> </td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
      <div class="right">
        <h3>Sepetiniz</h3>

        <ul>
          <?php
            $query2 = $db->prepare('select * from sepet s
                                    inner join urunler u on u.urunId = s.urunId
                                    where kullaniciId = :kullaniciId');
            $query2->execute(array(
              'kullaniciId' => 1
            ));
            $toplam = 0;
            foreach ($query2 as $row2) {
              $toplam += $row2['urunFiyati']*$row2['urunAdet'];
          ?>
          <li><?= $row2["urunAdi"] ?> - <?= $row2['urunFiyati'] ?> TL (<?= $row2['urunAdet'] ?> Adet)</li>
          <?php
            }
          ?>

          <!-- <li>Kedi Maması - 7.95 TL (1 Adet)</li> -->
        </ul>

        <div class="toplam">
          Genel Toplam: <?= $toplam ?> TL
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="main.js"></script>
  </body>
</html>
