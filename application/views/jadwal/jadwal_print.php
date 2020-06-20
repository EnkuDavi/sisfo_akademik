<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            font-family: sans-serif;
        }

        .container{
            width: 100%;
            height: 153px;
            display: flex;
            justify-content: space-between;
            flex-wrap : wrap;
        }

        .container div{
            margin : 10px;
        }

        .table1 td{
            font-size: 10pt;
            text-align: left;
            padding: 5px;
        }

        .container div.judul{
            text-align: center;
            margin-right : 20px;
        }

        .table2 {
            font-family: sans-serif;
            font-size: 10pt;
            color: #444;
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #f2f5f7;
        }

        .table2 tr th{
            background: limegreen;
            color: #fff;
            font-weight: normal;
        }

        .table2, th, td {
            padding: 8px 20px;
            text-align: center;
        }

        .table2 tr:hover {
            background-color: #f5f5f5;
        }

        .table2 tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        
    </style>
</head>
<body>
    <div class="container">
        <div class="gambar">
        <img src="<?php echo $_SERVER['DOCUMENT_ROOT'].'/sisfo_akademik/assets/dist/img/pgri.jpg' ;?>" alt="">
        </div>
        <div class="judul">
            <h4>YAYASAN PEMBINA LEMBAGA PENDIDIKAN</h4>
            <h4>SMK PGRI 4 KARAWANG</h4>
            <p style="font-size:10pt;">Jl.R.Ali Muchtar No.34 Adiarsa Barat, Karawang 41313</p>
        </div>
    </div>
        <hr>
        <h4 style="text-align: center;">Jadwal Pelajaran</h4>
    <div class="konten">
        <div class="tabel">
           <table class="table1">
               <tr>
                   <td stle="width:30px;">Kelas</td>
                   <td>: MIF</td>
               </tr>
               <tr>
                   <td>Semester</td>
                   <td>: Ganjil</td>
               </tr>
               <tr>
                   <td>Tahun Ajaran</td>
                   <td>: 2021</td>
               </tr>
           </table>
        </div>
        <table class="table2">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Hari/Tanggal</th>
                    <th>Pelajaran</th>
                    <th>Pengajar</th>
                    <th>Kelas</th>
                    <th>Jam</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1 ;?>
                    <?php foreach($jadwal->result() as $j) :?>
                    <tr>
                    <td><?= $no ;?></td>
                    <td><?= $j->date ;?></td>
                    <td><?= $j->pelajaran_nama ;?></td>
                    <td><?= $j->nama_guru ;?></td>
                    <td><?= $j->nama_kelas ;?></td>
                    <td><?= $j->jam ;?></td>
                    </tr>
                <?php $no++ ;?>
                <?php endforeach ;?>
            </tbody>
        </table>
    </div>
</body>
</html>




