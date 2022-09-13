# PHP ile Kolay Resim İşlemleri
<br /><br />
## Örnek
### php
```php
<?php
include("lib/class.image.php");

$resim = new Image();

// İçine Sığdır
$resim->load("img/test.jpg");
$resim->cover(150, 150);
$resim->save("img/test_cover.jpg", 60);

// Dışına Sığdır
$resim->load("img/test.jpg");
$resim->contain(150, 150);
$resim->save("img/test_contain.jpg", 60);

// Yüzde Olarak Değiştir
$resim->load("img/test.jpg");
$resim->scale(150);
$resim->save("img/test_scale.jpg", 60);

// Yatay Olarak Değiştir
$resim->load("img/test.jpg");
$resim->resizeW(300);
$resim->save("img/test_resizeW.jpg", 60);

// Dikey Olarak Değiştir
$resim->load("img/test.jpg");
$resim->resizeH(300);
$resim->save("img/test_resizeH.jpg", 60);

// Tam Değer Olarak Değiştir
$resim->load("img/test.jpg");
$resim->resize(450, 450);
$resim->save("img/test_resize.jpg", 60);

?>
```
