 <!-- Content -->
<div class="grid fluid container">
    <div class="row">
        <div class="span12">
            <h1>
                <a href="./"><i class="icon-arrow-left-3 fg-darker smaller"></i></a>
                Statistik<small class="on-right"></small>
            </h1>
            <hr>
        </div>
    </div>
    <div class="row">
        <form method="post">
            <div class="span4">
                <div class="input-control select">
                    <select name="employee" onchange="document.getElementById('text_content').value=this.options[this.selectedIndex].text">
                        <option value="">Nama Karyawan</option>
                        <?php
                            $peg = mysql_query("SELECT * FROM pegawai ORDER BY nama ASC");
                            if ($peg) {
                                while ($data_peg = mysql_fetch_array($peg)) {
                                    $id_peg = $data_peg['id'];
                                    $nama_peg = $data_peg['nama'];
                                    echo "<option value='$id_peg'>$nama_peg</option>";
                                }
                            }
                        ?>
                    </select>
                    <input type="hidden" name="peg_text" id="text_content" value="" />
                </div>
            </div>
            <div class="span2">
                <div class="input-control select">
                    <select name="month">
                        <option value="">Bulan</option>
                        <option value="01">Januari</option><option value="02">Februari</option><option value="03">Maret</option><option value="04">April</option>
                        <option value="05">Mei</option><option value="06">Juni</option><option value="07">Juli</option><option value="08">Agustus</option>
                        <option value="09">September</option><option value="10">Oktober</option><option value="11">November</option><option value="12">Desember</option>
                    </select>
                </div>
            </div>
            <div class="span2">
                <div class="input-control select">
                    <select name="year">
                        <option value="">Tahun</option>
                        <option value="14">2014</option><option value="15">2015</option><option value="16">2016</option><option value="17">2017</option>
                        <option value="18">2018</option><option value="19">2019</option><option value="20">2020</option>
                    </select>
                </div>
            </div>
            <div class="span1">
                <button type="submit" name="btn_submit1" value="show">Tampilkan</button>
            </div>
            <div class="span3">
                <button type="submit" name="btn_submit2" value="show">Tampilkan Statistik Bulan Ini</button>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="span12">
            <?php      
                if (isset($_POST['btn_submit1'])) {
                    $month = $_POST['month'];
                    $year = $_POST['year'];
                    $employee = $_POST['employee'];
                    $nama = $_POST['peg_text'];

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

                    if ($employee == NULL || $month == NULL || $year == NULL) {
                        echo "<div class='span12'>
                                <div class='notice marker-on-top bg-amber fg-white'>
                                Silahkan pilih nama karyawan, bulan dan tahun.
                                </div>
                                </div>";
                        $page_title = "Terjadi kesalahan";
                    }
                    else {
                        $page_title = $bulan." 20".$year;
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
                                WHERE pegawai.id = $employee
                                AND SUBSTRING(tanggal,4,2) = $month
                                AND SUBSTRING(tanggal,7,2) = $year
                                ORDER BY tanggal ASC"; 
                    }
                    
                }

                if (isset($_POST['btn_submit2'])) {
                    $employee = $_POST['employee'];
                    $nama = $_POST['peg_text'];

                    if ($employee == NULL) {
                        echo "<div class='span12'>
                                <div class='notice marker-on-top bg-amber fg-white'>
                                Silahkan pilih nama karyawan.
                                </div>
                                </div>";
                        $page_title = "Terjadi kesalahan";
                    }
                    else {
                        // $curdate = date(d);
                        $sqlmonth = date(n);
                        $sqlyear = date(y);
                        $curmonth = dateID(date(n));
                        $curyear = date(Y);
                        $page_title = $curmonth." ".$curyear;
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
                                WHERE pegawai.id = $employee
                                AND SUBSTRING(tanggal,4,2) = $sqlmonth
                                AND SUBSTRING(tanggal,7,2) = $sqlyear
                                ORDER BY tanggal ASC"; 
                    }
                    
                }

                else {
                    // $curdate = date(d);
                    // $curmonth = dateID(date(n));
                    // $curyear = date(Y);
                    // $page_title = "Data absensi hari ini, ".$curdate." ".$curmonth." ".$curyear;
                    // $sql =   "SELECt * FROM absen 
                    //          WHERE SUBSTRING(tanggal,1,2) = $curdate
                    //          ORDER BY jam_masuk ASC";    
                }

                   
                   $res = mysql_query($sql,koneksi_db());
                   if(mysql_num_rows($res) != 0)
                   {
                       $i=1;
                       echo "<h1><small>".$nama." / ".$page_title."</small></h1>";
                       echo "<div id='lineLegend'></div>";
                       echo "<canvas id='canvas' height='200' width='600' style='margin-bottom: 30px;'></canvas>";                      
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
                            $tgl[] = substr($data_history['tanggal'],0,5);
                            
                            //Jam Masuk
                            $jm0 = $data_history['jam_masuk'];
                            if ($jm0 == 'empty' || $jm0 == NULL || $jm0 == '') {
                                $jm0 = "00:00:00";
                            }
                            $jm1 = substr($jm0,0,2);
                            $jm2 = substr($jm0,3,2);
                            $jm[] = $jm1.".".$jm2;                            

                            //Jam Keluar
                            $jk0 = $data_history['jam_keluar'];
                            if ($jk0 == 'empty' || $jk0 == NULL || $jk0 == '') {
                                $jk0 = "24:00:00";
                            }
                            $jk1 = substr($jk0,0,2);
                            $jk2 = substr($jk0,3,2);
                            $jk[] = $jk1.".".$jk2;

                            $id = $data_history['no'];
                            $fm = $data_history['foto_masuk'];
                            $fk = $data_history['foto_keluar'];

                            if ($fm == 'empty' || $fm == NULL || $fm == '') {
                                $fotomasuk = "<img src='images/nophoto.jpg' />";
                            }
                            else {
                                $fotomasuk_dec = base64_decode($data_history['foto_masuk']);
                                $fotomasuk = "<img  src='data:image/jpeg;base64,".$fotomasuk_dec."' />";
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
                    echo "Data absensi ".$nama." tidak ditemukan.";
                }
            ?>
        </div>
    </div>
    <hr>
    <script>
        var tgl = <?php echo '["' . implode('","', $tgl) . '"]' ?>;
        var jm = <?php echo '["' . implode('","', $jm) . '"]' ?>;
        var jk = <?php echo '["' . implode('","', $jk) . '"]' ?>;
        var lineChartData = {
            labels : tgl,
            datasets : [
                {
                    label: "Jam Masuk",
                    fillColor : "rgba(135,211,124,0.2)",
                    strokeColor : "rgba(135,211,124,1)",
                    pointColor : "rgba(135,211,124,1)",
                    pointStrokeColor : "#fff",
                    pointHighlightFill : "#fff",
                    pointHighlightStroke : "rgba(135,211,124,1)",
                    data : jm
                },
                {
                    label: "Jam Keluar",
                    fillColor : "rgba(241,169,160,0.2)",
                    strokeColor : "rgba(241,169,160,1)",
                    pointColor : "rgba(241,169,160,1)",
                    pointStrokeColor : "#fff",
                    pointHighlightFill : "#fff",
                    pointHighlightStroke : "rgba(241,169,160,1)",
                    data : jk
                }
            ]
        }

    window.onload = function(){
        var steps = 6;
        var max = 24;
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myLine = new Chart(ctx).Line(lineChartData, {
            responsive: true,
            scaleOverride: true,
            scaleSteps: steps,
            scaleStepWidth: Math.ceil(max / steps),
            scaleStartValue: 0
        });
        legend(document.getElementById("lineLegend"), lineChartData);
    }
    </script>