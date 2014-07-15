<?php
/* @var $this SiteController */
/* @var $result Result */
/* @var $usersScore PostUser[] */
?>

<div class='container'>
    <div class="row text-center">
        <h1 style='line-height: 0.6'>
            Kawal Suara Online<br/>
            <small>
                oleh Lab. Riset IR - Fasilkom UI
            </small>
        </h1>
        <div class="progress">
            <div class="progress-bar progress-bar-success" style="width: <?= $result->percentage_prabowo * 100 ?>%">
                <span class="sr-only"><?= $result->percentage_prabowo * 100 ?>% Prabowo</span>
            </div>
            <div class="progress-bar progress-bar-info progress-bar-striped" style="width: <?= $result->percentage_jokowi * 100 ?>%">
                <span class="sr-only"><?= $result->percentage_jokowi * 100 ?>% Jokowi</span>
            </div>
        </div>
        <div class="row">
            <div class='col-md-6'>
                perolehan suara untuk Prabowo
                <?= $result->percentage_prabowo * 100 ?>%<br/>
                (<?= number_format($result->count_prabowo) ?>)

            </div>
            <div class='col-md-6'>
                perolehan suara untuk Jokowi
                <?= $result->percentage_jokowi * 100 ?>%<br/>
                (<?= number_format($result->count_jokowi) ?>)
            </div>
        </div>
        <br/>
        <br/>
        <div class='row text-left padded-vertical-most'>
            <div class='col-md-6'>
                <p>
                    Sistem ini mendukung data entry terhadap hasil scan formulir C1 Pilpres 2014 dari KPU secara keroyokan (atau bahasa kerennya, crowdsourcing), dan dirancang berdasarkan prinsip accountability, verifiability, dan… fun :-)
                    Harapannya, dengan menyelesaikan pekerjaan ini, kita dapat menghasilkan suatu basis data yang dapat dimanfaatkan oleh masyarakat maupun KPU untuk melakukan verifikasi dan validasi terhadap hasil perhitungan resmi yang mereka lakukan.
                    Kami butuh bantuan anda! Berapapun waktu yang dapat anda sisihkan: 5 menit, setengah jam, atau seharian penuh, bantuan anda sangat berarti untuk mengawal penghitungan suara KPU supaya kita semua mendapatkan hasil Pilpres 2014 yang absah! Mari registrasi atau sign-in dengan Facebook dan mulai membantu mengerjakan data entry.
                    Mohon juga bisa men-share informasi mengenai sistem ini ke sahabat-sahabat anda!
                </p>  
            </div>
            <div class='col-md-6'>
                <h3>
                    Daftar 10 Pejuang Paling Tangguh
                </h3>
                <table class='table table-bordered table-condensed table-hover table-responsive'>
                    <thead>
                        <tr>
                            <td>
                                Nama
                            </td>
                            <td>
                                Skor
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usersScore as $userScore): ?>
                            <tr>
                                <td>
                                    <?= $userScore->fname ?> 
                                    <?= $userScore->lname ?> 
                                </td>
                                <td>
                                    <?= $userScore->total_post ?> 
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>