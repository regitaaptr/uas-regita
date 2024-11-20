<?php

if (isset($_POST['proses'])) {
    $no = $_POST['no'];
    $nama = $_POST['nama'];
    $unitp = $_POST['unit'];
    $tgl = $_POST['tanggal'];
    $jabatan = $_POST['jabatan'];
    $lk = $_POST['lama'];
    $statusk = $_POST['status'];
    $bpjsp = $_POST['bpjs'];
    $pinjamanp = $_POST['pinjaman'];
    $tabunganp = $_POST['tabungan'];
    $infaq = $_POST['infaq'];

    switch ($jabatan) {
    case 'Kepala Sekolah':
        $gaji = 10000000;
        break;

    case 'Wakasek':
        $gaji = 7500000;
        break;

    case 'Guru':
        $gaji = 5000000;
        break;

    case 'OB':
        $gaji = 2500000;
        break;

    default:
        $gaji = 0;
        break;
}

    if ($lk > 5) {
        $tunjangan = 1000000;
    } else {
        $tunjangan = 0;
    }

    if ($statusk == 'Tetap') {
        $bonus = 500000;
    } else {
        $bonus = 0;
}

$gb = $gaji  + $bonus;

$gb2 = $bpjsp + $pinjamanp + $tabunganp + $infaq;

$gajibersih = $gb - $gb2;


    class Data{
        public function pct($no, $nama, $unitp, $tgl){
            echo "
            <!doctype html>
            <html lang='en'>
            <head>
                <!-- Required meta tags -->
                <meta charset='utf-8' >
                <meta name='viewport' content='width=device-width, initial-scale=1'>
                <!-- Bootstrap CSS -->
                <link rel='stylesheet' href='p.css'>
                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
                <div class='card mx-auto mt-5  shadow-lg' style='width: 30rem;'>
            <div class='card-header text-center'>
            <i class='text-center'>STRUK GAJI</i>
            </div>
            <div class='card-body'>
                <table align='center'>
                    <tr>
                        <td>No</td>
                        <td>: </td>
                        <td> $no </td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td> $nama </td>
                    </tr><tr>
                        <td>Unit Pendidikan</td>
                        <td>:</td>
                        <td> $unitp </td>
                    </tr><tr>
                        <td>Tanggal Gaji</td>
                        <td>:</td>
                        <td> $tgl </td>
                    </tr>
            ";
        }
        public function Gaji($jabatan, $gaji, $lk, $statusk, $bonus){
            echo "
                <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td> $jabatan</td>
                </tr>
                <tr>
                    <td>Gaji</td>
                    <td>:</td>
                    <td> $gaji</td>
                </tr>
                <tr>
                    <td>Lama Kerja</td>
                    <td>:</td>
                    <td> $lk</td>
                </tr>
                <tr>
                    <td>Status Kerja</td>
                    <td>:</td>
                    <td> $statusk</td>
                </tr>
                <tr>
                    <td>Bonus</td>
                    <td>:</td>
                    <td> $bonus</td>
                </tr>
            ";
        }
        public function potongan($bpjsp, $pinjamanp, $tabunganp, $infaq){
            echo "
                <tr>
                    <td>BPJS</td>
                    <td>:</td>
                    <td> $bpjsp </td>
                </tr>
                <tr>
                    <td>Pinjaman</td>
                    <td>:</td>
                    <td> $pinjamanp </td>
                </tr><tr>
                    <td>Cicilan</td>
                    <td>:</td>
                    <td> $tabunganp </td>
                </tr>
                <tr>
                    <td>Infaq</td>
                    <td>:</td>
                    <td> $infaq  </td>
            </table>
            ";
        }
        public function total($gajibersih){
            echo "
                    <table align='center'>
                        <tr>
                            <td><br></td>
                            <td><h5><b>Gaji Bersih</b></h5></td>
                            <td>:</td>
                            <td> $gajibersih </td>
                        </tr>
                    </table>
                </div>
            </div>
            ";
        }
}

?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p' crossorigin='anonymous'></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js' integrity='sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB' crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js' integrity='sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13' crossorigin='anonymous'></script>
    -->
  </body> 
</html>

<?php
}

$cetak = new Data();

echo $cetak->pct($no, $nama, $unitp, $tgl);
echo $cetak->Gaji($jabatan, $gaji, $lk, $tunjangan, $statusk, $bonus);
echo $cetak->potongan($bpjsp, $pinjamanp, $tabunganp, $infaq);
echo $cetak->total($gajibersih);

?>

