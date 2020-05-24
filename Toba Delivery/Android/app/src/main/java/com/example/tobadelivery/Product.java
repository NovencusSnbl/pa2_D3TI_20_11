package com.example.tobadelivery;


public class Product {
     int id_produk;
     String nama_produk;
     String alamat;
     String nama_toko;
     double harga;
     String gambar;

    public Product(int id_produk, String nama_produk, String alamat, String nama_toko, double harga, String gambar) {
        this.id_produk = id_produk;
        this.nama_produk = nama_produk;
        this.alamat = alamat;
        this.nama_toko = nama_toko;
        this.harga = harga;
        this.gambar = gambar;
    }

    public Product() {

    }

    public int getId_produk() {
        return id_produk;
    }

    public String getNama_produk() {
        return nama_produk;
    }

    public String getAlamat() {
        return alamat;
    }

    public String getNama_toko() {
        return nama_toko;
    }

    public double getHarga() {
        return harga;
    }

    public String getGambar() {
        return gambar;
    }
}

