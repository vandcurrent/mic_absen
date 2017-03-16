 <!-- Content -->
<div class="grid fluid container">
    <div class="row">
        <div class="span12">
            <h1>
                <a href="./"><i class="icon-arrow-left-3 fg-darker smaller"></i></a>
                Rekap<small class="on-right">Absensi</small>
            </h1>
            <hr>
        </div>
    </div>
    <div class="row">
        <form method="post">
            <div class="span3">
                <div class="input-control text" data-role="datepicker" data-week-start="1">
                    <input type="text" placeholder="Tanggal" name="date">
                    <button class="btn-date"></button>
                </div>
            </div>
            <div class="span3">
                <div class="input-control select">
                    <select name="month">
                        <option value="">Bulan</option>
                        <option value="01">Januari</option><option value="02">Februari</option><option value="03">Maret</option><option value="04">April</option>
                        <option value="05">Mei</option><option value="06">Juni</option><option value="07">Juli</option><option value="08">Agustus</option>
                        <option value="09">September</option><option value="10">Oktober</option><option value="11">November</option><option value="12">Desember</option>
                    </select>
                </div>
            </div>
            <div class="span3">
                <div class="input-control select">
                    <select name="year">
                        <option value="14">2014</option><option value="15">2015</option><option value="16">2016</option><option value="17">2017</option>
                        <option value="18">2018</option><option value="19">2019</option><option value="20">2020</option>
                    </select>
                </div>
            </div>
            <div class="span3">
                <button type="submit" name="btn_submit" value="show">Tampilkan</button>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="span12">
            <?php
                
                if (isset($_POST['btn_submit'])) {
                    $date_d = substr($_POST['date'],0,2);
                    $date_m = substr($_POST['date'],3,2);
                    $date_y = substr($_POST['date'],8,2);
                    $month = $_POST['month'];
                    $year = $_POST['year'];

                    switch ($date_m) {
                        case '01':
                            $bulan = 'Januari';
                            break;
                        case '02':
                            $bulan = 'Februari';
                            break;
                        case '03':
                            $bulan = 'Maret';
                            break;
                        case '04':
                            $bulan = 'April';
                            break;
                        case '05':
                            $bulan = 'Mei';
                            break;
                        case '06':
                            $bulan = 'Juni';
                            break;
                        case '07':
                            $bulan = 'Juli';
                            break;
                        case '08':
                            $bulan = 'Agustus';
                            break;
                        case '09':
                            $bulan = 'September';
                            break;
                        case '10':
                            $bulan = 'Oktober';
                            break;
                        case '11':
                            $bulan = 'November';
                            break;
                        case '12':
                            $bulan = 'Desember';
                            break;
                        default:
                            break;
                    }

                    switch ($month) {
                        case '01':
                            $bulan = 'Januari';
                            break;
                        case '02':
                            $bulan = 'Februari';
                            break;
                        case '03':
                            $bulan = 'Maret';
                            break;
                        case '04':
                            $bulan = 'April';
                            break;
                        case '05':
                            $bulan = 'Mei';
                            break;
                        case '06':
                            $bulan = 'Juni';
                            break;
                        case '07':
                            $bulan = 'Juli';
                            break;
                        case '08':
                            $bulan = 'Agustus';
                            break;
                        case '09':
                            $bulan = 'September';
                            break;
                        case '10':
                            $bulan = 'Oktober';
                            break;
                        case '11':
                            $bulan = 'November';
                            break;
                        case '12':
                            $bulan = 'Desember';
                            break;
                        default:
                            break;
                    }

                    if ($month == NULL && $date_d == NULL) {
                        $page_title = "Data absensi tahun 20".$year;
                        $sql =  "SELECT
                    			absen.no,
                    			absen.tanggal,
                    			absen.hari,
                    			absen.id,
                    			absen.jam_masuk,
                    			absen.jam_keluar,
                    			absen.foto_masuk,
                    			absen.foto_keluar,
                    			absen.keterangan,
                    			pegawai.nama 
                        		FROM absen JOIN pegawai
                        		ON absen.id = pegawai.id
                        		ON absen.id = pegawai.id
                                WHERE SUBSTRING(tanggal,7,2) = $year
                                ORDER BY tanggal, jam_masuk ASC";
                    }
                    elseif ($date_d == NULL) {
                        $page_title = "Data absensi bulan ".$bulan." 20".$year;
                        $sql =  "SELECT
                    			absen.no,
                    			absen.tanggal,
                    			absen.hari,
                    			absen.id,
                    			absen.jam_masuk,
                    			absen.jam_keluar,
                    			absen.foto_masuk,
                    			absen.foto_keluar,
                    			absen.keterangan,
                    			pegawai.nama
                        		FROM absen JOIN pegawai
                        		ON absen.id = pegawai.id 
                                WHERE SUBSTRING(tanggal,4,2) = $month
                                AND SUBSTRING(tanggal,7,2) = $year
                                ORDER BY tanggal, jam_masuk ASC";
                    }
                    else {
                       $page_title = "Data absensi tanggal ".$date_d." ".$bulan." 20".$date_y;
                       $sql =   "SELECT
                    			absen.no,
                    			absen.tanggal,
                    			absen.hari,
                    			absen.id,
                    			absen.jam_masuk,
                    			absen.jam_keluar,
                    			absen.foto_masuk,
                    			absen.foto_keluar,
                    			absen.keterangan,
                    			pegawai.nama
                        		FROM absen JOIN pegawai
                        		ON absen.id = pegawai.id 
                                WHERE SUBSTRING(tanggal,1,2) = $date_d
                                AND SUBSTRING(tanggal,4,2) = $date_m
                                AND SUBSTRING(tanggal,7,2) = $date_y
                                ORDER BY jam_masuk ASC"; 
                    }
                    
                }
                else {
                    $curdate = date(d);
                    $curmonth = dateID(date(n));
                    $curyear = date(Y);
                    $page_title = "Data absensi hari ini, ".$curdate." ".$curmonth." ".$curyear;
                    $sql =  "SELECT
                			absen.no,
                			absen.tanggal,
                			absen.hari,
                			absen.id,
                			absen.jam_masuk,
                			absen.jam_keluar,
                			absen.foto_masuk,
                			absen.foto_keluar,
                			absen.keterangan,
                			pegawai.nama 
                    		FROM absen JOIN pegawai
                    		ON absen.id = pegawai.id 
                            WHERE SUBSTRING(tanggal,1,2) = $curdate
                            ORDER BY jam_masuk ASC";    
                }

                   
                   $res = mysql_query($sql,koneksi_db());
                   if(mysql_num_rows($res) != 0)
                   {
                       $i=1;
                       echo "<h1><small>".$page_title."</small></h1>";                       
                       echo"<table class='table bordered'>
                            <thead align='center'>
                                <tr>
                                <td><strong>NO</strong></td>
                                <td><strong>TANGGAL</strong></td>
                                <td><strong>HARI</strong></td>
                                <td><strong>NAMA</strong></td>
                                <td><strong>JAM MASUK</strong></td>
                                <td><strong>JAM KELUAR</strong></td>
                                <td><strong>FOTO MASUK</strong></td>
                                <td><strong>FOTO KELUAR</strong></td>
                                <td><strong>KETERANGAN</strong></td>
                                <td><strong>ACTION</strong></td>
                                </tr>
                            </thead>
                            <tbody>";
                        while($data_history=mysql_fetch_array($res))
                        {
                            $id = $data_history['no'];
                            $fm = $data_history['foto_masuk'];
                            $fk = $data_history['foto_keluar'];

                            if ($fm == 'empty' || $fm == NULL || $fm == '') {
                                $fotomasuk = "<img src='images/nophoto.jpg' />";
                            }
                            else {
                                $fotomasuk_dec = base64_decode($data_history['foto_masuk']);
                                $fotomasuk = "<img src='data:image/jpeg;base64,".$fotomasuk_dec."' />";
                            }

                            if ($fk == 'empty' || $fk == NULL || $fk == '') {
                                $fotokeluar = "<img src='images/nophoto.jpg' />";
                            }
                            else {
                                $fotokeluar_dec = base64_decode($data_history['foto_keluar']);
                                $fotokeluar = "<img  src='data:image/jpeg;base64,".$fotokeluar_dec."' />";
                            }

                            
                            $fotokeluar_dec = base64_decode($data_history['foto_keluar']);
                             if($i%2==0){ 
                                echo"<tr>";} else { echo"<tr>";} 
                                   echo" <td>".$i."</td>
                                    <td>".$data_history['tanggal']."</td>
                                    <td>".$data_history['hari']."</td>
                                    <td>".$data_history['nama']."</td>
                                    <td>".$data_history['jam_masuk']."</td>
                                    <td>".$data_history['jam_keluar']."</td>
                                    <td>".$fotomasuk."</td>
                                    <td>".$fotokeluar."</td>
                                    <td>".$data_history['keterangan']."</td>
                                    <td><a href='?ref=absen_edit&id=$id' title='Tambah Keterangan'><i class='icon icon-pencil'></i></a></td>
                                    ";
                                    
                            $i++;
                        }
                       echo"</tbody></table>";
                }
                else
                {
                    echo "<h1><small>".$page_title."</small></h1>";
                    echo "Data absensi tidak ditemukan.";
                }
            ?>
        </div>
    </div>
    <hr>