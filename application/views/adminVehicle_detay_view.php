<html>
    <head>
        <base href="<?=base_url()?>"/>
        <title>Ana Sayfa</title>
        <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
        <style>
            .bosluk {
                margin-top: 15px;
                margin-bottom: 15px
            }
        </style>
    </head>
    <body>
        <div class="jumbotron">
            <h1 class="text-center">Sakarya Bip Oto</h1>
        </div>
        <div class="container-fluid bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <a class="btn btn-link text-light">Ana Sayfa</a>
                        <a class="btn btn-link text-light">Şifre Değiştir</a>
                        <a class="btn btn-link text-light">Oturumu Kapat</a>
                    </div>

                    <div class="col-md-6 text-right">                        
                        <a class="btn btn-link text-light" href="adminVehicle">Araçlar</a>
                        <a class="btn btn-link text-light">Rezervasyonlar</a>
                        <a class="btn btn-link text-light">Kullanıcılar</a>
                        <
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row bosluk">
                <div class="col-md-9">
                    <h3>Araç Bilgileri</h3>
                    <table class="table">
                        <tr>
                            <th>ARAÇ ID</th>
                            <td><?=$arac->arac_id?></td>
                        </tr>
                        <tr>
                            <th>MARKA</th>
                            <td><?=$arac->marka?></td>
                        </tr>
                        <tr>
                            <th>MODEL</th>
                            <td><?=$arac->model?></td>
                        </tr>
                        <tr>
                            <th>MODEL YILI</th>
                            <td><?=$arac->model_yili?></td>
                        </tr>
                        <tr>
                            <th>YAKIT</th>
                            <td><?=$arac->yakit?></td>
                        </tr>
                        <tr>
                            <th>VİTES</th>
                            <td><?=$arac->vites?></td>
                        </tr>
                        <tr>
                            <th>MÜSAİT Mİ</th>
                            <td><?=$arac->musait_mi?></td>
                        </tr>
                        <tr>
                            <th>FİYAT (Günlük)</th>
                            <td><?=$arac->gunluk_fiyat?> TL</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-3">
                    <img src="kucuk_resimler/preview_img.png" class="img-fluid">
                </div>
            </div>
        </div>

        <div class="container-fluid bg-dark text-light">
            <div class="row">
                <div class="col-md-12 text-center">
                    Bu site Sakarya MYO Bilgisayar Programcılığı
                    Bahar Dönemi İnternet Programcılığı 1 dersi için
                    örnek olarak geliştirilmiştir. <br> Tüm hakları saklıdır (c) 2025
                </div>
            </div>
        </div>
        
    </body>
</html>