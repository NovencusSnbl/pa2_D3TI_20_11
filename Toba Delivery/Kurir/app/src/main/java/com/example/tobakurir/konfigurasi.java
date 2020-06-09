package com.example.tobakurir;

public class konfigurasi {
    //Dibawah ini merupakan Pengalamatan dimana Lokasi Skrip CRUD PHP disimpan
    //Pada tutorial Kali ini, karena kita membuat localhost maka alamatnya tertuju ke IP komputer
    //dimana File PHP tersebut berada
    //PENTING! JANGAN LUPA GANTI IP SESUAI DENGAN IP KOMPUTER DIMANA DATA PHP BERADA
    public static final String URL_ADD="http://169.254.168.218:8080/Proyek%20Akhir%202/Toba%20Delivery/Web/tambahPgw.php";
    public static final String URL_GET_ALL = "http://169.254.168.218:8080/Proyek%20Akhir%202/Toba%20Delivery/Web/tampilSemuaPesanan.php";
    public static final String URL_GET_PEMESANAN = "http://169.254.168.218:8080/Proyek%20Akhir%202/Toba%20Delivery/Web/tampilPemesananKurir.php?idpemesanan=";
    public static final String URL_UPDATE_PEMESANAN= "http://169.254.168.218:8080/Proyek%20Akhir%202/Toba%20Delivery/Web/updatePemesananKurir.php";
    public static final String URL_DELETE_PEMESANAN = "http://169.254.168.218:8080/Proyek%20Akhir%202/Toba%20Delivery/Web/hapusPemesanan.php?id=";

    //Dibawah ini merupakan Kunci yang akan digunakan untuk mengirim permintaan ke Skrip PHP
    public static final String KEY_PEMESANAN_ID = "idpemesanan";
    public static final String KEY_PEMESANN_ASAL = "asal";
    public static final String KEY_PEMESANAN_TUJUAN = "tujuan"; //desg itu variabel untuk posisi
    public static final String KEY_PEMESANAN_IDPRODUK = "idproduk"; //salary itu variabel untuk gajih
    public static final String KEY_PEMESANAN_IDCOSTUMER = "idproduk"; //salary itu variabel untuk gajih

    //JSON Tags
    public static final String TAG_JSON_ARRAY="result";
    public static final String TAG_ID = "idpemesanan";
    public static final String TAG_ASAL = "asal";
    public static final String TAG_TUJUAN = "tujuan";
    public static final String TAG_IDPRODUK = "idproduk";
    public static final String TAG_IDCOSTUMER = "idcostumer";

    //ID karyawan
    //emp itu singkatan dari Employee
    public static final String PEMESANAN_ID = "idpemesanan";
}
