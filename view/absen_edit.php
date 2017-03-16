 <!-- Content -->
<div class="grid fluid container">
    <div class="row">
        <div class="span12">
            <h1>
                <a href="./"><i class="icon-arrow-left-3 fg-darker smaller"></i></a>
                Rekap<small class="on-right">Absensi / Tambah Keterangan</small>
            </h1>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="span12">
            <?php
                if (!empty($_GET['id'])) {
                    $absen_id = $_GET['id'];
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
                            WHERE no = $absen_id
                            ORDER BY jam_masuk ASC";
                    // $page_title = "Data absensi tanggal ".$date_d." ".$bulan." 20".$date_y;
                }

                if (isset($_POST['btn_submit'])) {
                    $keterangan = $_POST['keterangan'];
                    $query = mysql_query("UPDATE absen SET keterangan ='$keterangan' WHERE no ='$absen_id'");
                    if ($query) {
                        header("Refresh: 0.1; url=?ref=absen_edit&id=$absen_id"); 
                    }
                }
                   
                   $res = mysql_query($sql,koneksi_db());
                   if(mysql_num_rows($res) != 0)
                   {
                       echo "<h1><small>".$page_title."</small></h1>";                       
                       echo"<table class='table bordered'>
                            <thead align='center'>
                                <tr>
                                <td><strong>TANGGAL</strong></td>
                                <td><strong>HARI</strong></td>
                                <td><strong>NAMA</strong></td>
                                <td><strong>JAM MASUK</strong></td>
                                <td><strong>JAM KELUAR</strong></td>
                                <td><strong>FOTO MASUK</strong></td>
                                <td><strong>FOTO KELUAR</strong></td>
                                <td><strong>KETERANGAN</strong></td>
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
                                   echo"
                                    <td>".$data_history['tanggal']."</td>
                                    <td>".$data_history['hari']."</td>
                                    <td>".$data_history['nama']."</td>
                                    <td>".$data_history['jam_masuk']."</td>
                                    <td>".$data_history['jam_keluar']."</td>
                                    <td>".$fotomasuk."</td>
                                    <td>".$fotokeluar."</td>
                                    <td>".$data_history['keterangan']."</td>
                                    ";
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
    <div class="row">
        <form method="post">
            <div class="span6">
                <div class="panel">
                    <div class="panel-header bg-lightBlue fg-white">
                        Tambah Keterangan
                    </div>
                    <div class="panel-content">
                        <p>Silahkan tambahkan keterangan untuk keterlambatan karyawan pada kolom di sebelah kanan.</p>
                        <p>Berikut contoh hal-hal yang mungkin dapat menyebabkan keterlambatan :</p>
                        <ul>
                            <li>Kuliah</li>
                            <li>Rapat di LSKK</li>
                            <li>Keperluan kantor</li>
                            <li>Keperluan pribadi</li>
                            <li>Dan lain lain</li>
                        </ul>
                        <p><strong>Catatan :</strong></p>
                        <p>Jika terlambat tanpa keterangan, kolom dikosongkan saja.</p>
                    </div>
                </div>
            </div>
            <div class="span6">
                <div class="input-control textarea">
                    <textarea name="keterangan"></textarea>
                    <button type="submit" name="btn_submit" value="show" style="margin-top: 15px; float: right;">Simpan</button>
                </div>
            </div>
        </form>
    </div>
    <hr>