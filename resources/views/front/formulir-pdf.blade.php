<html>
<head>
  <title>Formulir Pendaftaran</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css">
  <style>
    body{
      font-family: arial;
    }
    @page{
      size: A4;
    }
    @media screen {
      .sheet {
        margin: 5mm auto;
      }
    }
    h2,h3,h4{
      margin-top: 3mm;
      margin-bottom: 0;
    }
    b.sub{
      margin-top: 3mm;
      display: block;
    }
  </style>
</head>
<body class="A4"> 
  <section class="sheet padding-10mm">
    <article>
  
    <h2 align="center">FORMULIR PENDAFTARAN</h2>
    <h2 align="center"> @if($setting) {{strtoupper($setting->nama_sekolah)}} @endif</h2>

    <table width="100%">
      <tr><td colspan="2"> <h3>A. Data Pribadi</h3></td></tr>

      <tr><td width="30%"> No. Pendaftar </td><td>: {{ $pendaftar->periode->tahun.substr('0000'.$pendaftar->no_pendaftar,-4)}}</td></tr>
      <tr><td> Nama </td><td>: {{$pendaftar->nama }}</td></tr>
      <tr><td> NISN </td><td>: {{$pendaftar->nisn }}</td></tr>
      <tr><td> Tempat dan Tanggal Lahir </td><td>: {{$pendaftar->tempat_lahir }}, {{Carbon\Carbon::parse($pendaftar->tanggal_lahir)->isoFormat('D MMMM Y')}}</td></tr>
      <tr><td> Jenis Kelamin </td><td>: @if($pendaftar->jenis_kelamin=='L') Laki-laki @else Perempuan @endif</td></tr>
      <tr><td> Anak Ke </td><td>: {{$pendaftar->anak_ke }}</td></tr>
      <tr><td> Hobi </td><td>: {{$pendaftar->hobi }}</td></tr>
      <tr><td> Cita-cita </td><td>: {{$pendaftar->cita_cita }}</td></tr>
    
      <tr><td colspan="2"> <h3>B. Data Tempat Tinggal</h3></td></tr>

      <tr><td> Alamat </td><td>: {{$pendaftar->alamat }}</td></tr>
      <tr><td> Desa </td><td>: {{$pendaftar->desa }}</td></tr>
      <tr><td> Jumlah Saudara </td><td>: {{$pendaftar->jumlah_saudara }}</td></tr>
      <tr><td> Anak Ke </td><td>: {{$pendaftar->anak_ke }}</td></tr>
      <tr><td> Propinsi </td><td>: {{$pendaftar->propinsi }}</td></tr>
      <tr><td> RT </td><td>: {{$pendaftar->rt }}</td></tr>
      <tr><td> RW </td><td>: {{$pendaftar->rw }}</td></tr>
      <tr><td> Kode Pos </td><td>: {{$pendaftar->kode_pos }}</td></tr>
      <tr><td> Jarak </td><td>: {{$pendaftar->jarak }}</td></tr>
      <tr><td> Transportasi </td><td>: {{$pendaftar->transportasi }}</td></tr>
      
      <tr><td colspan="2"> <h3>C. Data Keluarga</h3></td></tr>

      <tr><td colspan="2"> <b class="sub">1. Kepala Keluarga</b></td></tr>
      <tr><td> No KK </td><td>: {{$pendaftar->no_kk }}</td></tr>
      <tr><td> Nama KK </td><td>: {{$pendaftar->nama_kk }}</td></tr>   
    
      <tr><td colspan="2"> <b class="sub">2. Ayah</b></td></tr>
      <tr><td> Nama Ayah </td><td>: {{$pendaftar->nama_ayah }}</td></tr>
      <tr><td> NIK Ayah </td><td>: {{$pendaftar->nik_ayah }}</td></tr>
      <tr><td> Tahun Lahir Ayah </td><td>: {{$pendaftar->tahun_lahir_ayah }}</td></tr>
      <tr><td> Status Ayah </td><td>: {{$pendaftar->status_ayah }}</td></tr>
      <tr><td> Pekerjaan Ayah </td><td>: {{$pendaftar->pekerjaan_ayah }}</td></tr>
      <tr><td> Penghasilan Ayah </td><td>: {{$pendaftar->penghasilan_ayah }}</td></tr>
      <tr><td> Pendidikan Ayah </td><td>: {{$pendaftar->pendidikan_ayah }}</td></tr>
    
    
      <tr><td colspan="2"> <b class="sub">3. Ibu</b></td></tr>
      <tr><td> Nama Ibu </td><td>: {{$pendaftar->nama_ibu }}</td></tr>
      <tr><td> NIK Ibu </td><td>: {{$pendaftar->nik_ibu }}</td></tr>
      <tr><td> Tahun Lahir Ibu </td><td>: {{$pendaftar->tahun_lahir_ibu }}</td></tr>
      <tr><td> Status Ibu </td><td>: {{$pendaftar->status_ibu }}</td></tr>
      <tr><td> Pekerjaan Ibu </td><td>: {{$pendaftar->pekerjaan_ibu }}</td></tr>
      <tr><td> Penghasilan Ibu </td><td>: {{$pendaftar->penghasilan_ibu }}</td></tr>
      <tr><td> Pendidikan Ibu </td><td>: {{$pendaftar->pendidikan_ibu }}</td></tr>
    </table>

    </article>
  </section>
  <section class="sheet padding-10mm">
    <article>

    <table width="100%">
      <tr><td colspan="2"> <b class="sub">4. Wali</b></td></tr>
      <tr><td width="30%"> Nama Wali </td><td>: {{$pendaftar->nama_wali }}</td></tr>
      <tr><td> NIK Wali </td><td>: {{$pendaftar->nik_wali }}</td></tr>
      <tr><td> Tahun Lahir Wali </td><td>: {{$pendaftar->tahun_lahir_wali }}</td></tr>
      <tr><td> Status Wali </td><td>: {{$pendaftar->status_wali }}</td></tr>
      <tr><td> Pekerjaan Wali </td><td>: {{$pendaftar->pekerjaan_wali }}</td></tr>
      <tr><td> Penghasilan Wali </td><td>: {{$pendaftar->penghasilan_wali }}</td></tr>
      <tr><td> Pendidikan Wali </td><td>: {{$pendaftar->pendidikan_wali }}</td></tr>
      <tr><td> HP Wali </td><td>: {{$pendaftar->hp_wali }}</td></tr>
      
      <tr><td colspan="2"> <b class="sub">5. Kepemilikan Kartu</b></td></tr>
      <tr><td> No KKS </td><td>: {{$pendaftar->no_kks }}</td></tr>
      <tr><td> No PKH </td><td>: {{$pendaftar->no_pkh }}</td></tr>
      <tr><td> No KIP </td><td>: {{$pendaftar->no_kip }}</td></tr>

      <tr><td colspan="2"> <h3>D. Data Sekolah</h3></td></tr>

      <tr><td> Nama Sekolah </td><td>: {{$pendaftar->nama_sekolah }}</td></tr>
      <tr><td> Jenjang Sekolah </td><td>: {{$pendaftar->jenjang_sekolah }}</td></tr>
      <tr><td> Status Sekolah </td><td>: {{$pendaftar->status_sekolah }}</td></tr>
      <tr><td> Lokasi Sekolah </td><td>: {{$pendaftar->lokasi_sekolah }}</td></tr>
      <tr><td> Tahun Lulus </td><td>: {{$pendaftar->tahun_lulus }}</td></tr>
      <tr><td> No UN </td><td>: {{$pendaftar->no_un }}</td></tr>
      <tr><td> Prestasi </td><td>: {{$pendaftar->prestasi }}</td></tr>
    </table>

    <br><br><br><br><br>

    <table width="100%"> 
      <tr>
        <td width="70%">&nbsp;</td>
        <td width="30%" align="center">
          Pendaftar<br><br><br><br>

          <b class="sub">{{$pendaftar->nama}}</b>
        </td>
      </tr>
    </table>

    </article>
  </section>
</body>
</html>