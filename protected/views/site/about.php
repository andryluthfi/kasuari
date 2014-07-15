<?php
/* @var $this SiteController */
?>

<div class='container'>
    <br/>
    <br/>
    <h1>
        Tentang Sistem
    </h1>
    <div class='row text-left padded-vertical-most'>
        <p>
            Sistem ini dirancang untuk melakukan data entry terhadap hasil scan 
            formulir C1 Pilpres 2014 yang disediakan oleh KPU secara keroyokan 
            (atau bahasa kerennya, crowdsourcing). Harapannya, dengan 
            menyelesaikan pekerjaan ini, kita dapat menghasilkan suatu basis 
            data yang dapat dimanfaatkan oleh masyarakat maupun KPU untuk 
            melakukan verifikasi dan validasi terhadap hasil perhitungan resmi 
            yang mereka lakukan.
        </p>
        <p>
            Sistem ini dikembangkan dan digunakan oleh tim yang terdiri dari 
            pendukung kedua calon presiden, dan tujuan kami sama: membantu 
            mengawal proses perhitungan suara yang dilakukan KPU supaya kita 
            semua mendapatkan hasil Pilpres 2014 yang absah.
        </p>
        <p>
            Saat ini sudah ada beberapa inisiatif serupa yang sangat bagus, di 
            antaranya 
            <a href='http://www.kawalpemilu.org'>
                http://www.kawalpemilu.org
            </a>, 
            <a href='http://www.kawalpemilu.org'>
                http://kawal-suara.appspot.com
            </a>, dan 
            <a href='http://solusirfid.com/pemiluc1'>
                http://solusirfid.com/pemiluc1
            </a>, dan kami mendukung semua inisiatif tersebut. 
            Mengapa perlu ada sistem lain? Karena kami berpendapat bahwa 
            semakin banyak pengamat independen yang mengolah data KPU ini,
            suara kita semua semakin aman dikawal.
        </p>
        <p>
            Sistem ini merupakan pengembangan lanjut dari 
            <a href='http://realcount.heroku.com'>
                http://realcount.heroku.com
            </a> yang merupakan suatu eksperimen kolaborasi kilat melalui 
            jejaring sosial: dalam selang waktu hanya 15 jam sistem tersebut 
            dirancang dan diimplementasikan oleh orang-orang yang belum 
            pernah bertemu sebelumnya, dan dimanfaatkan oleh komunitas yang 
            berhasil mengerjakan data untuk >10.000 TPS yang merepresentasikan 
            hampir 3 juta suara pemilih. Semua hasil pekerjaan itu dimanfaatkan 
            pada sistem ini, dan semua user yang sempat terdaftar pada sistem 
            tersebut bisa langsung login ke sistem ini dan melanjutkan proses 
            entry data.
        </p>
        <p>
            Prinsip-prinsip dasar rancangan sistem ini adalah accountability, 
            verifiability, dan… fun :-) Bagaimana sistem ini menerapkan 
            verifiability? Intinya adalah dengan memastikan bahwa pada akhirnya, 
            setiap form C1 akan di-entry datanya oleh lebih dari satu user, 
            dan data tersebut baru dianggap sah kalau ternyata user-user 
            tersebut memasukkan data yang sama. Kalau tertarik untuk membaca 
            dokumen rancangan awal dari sistem ini, silahkan mengunjungi 
            <a href='http://bit.ly/1mCtArV'>
                http://bit.ly/1mCtArV
            </a>
        </p>
    </div>
</div