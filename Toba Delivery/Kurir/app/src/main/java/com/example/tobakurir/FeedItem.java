package com.example.tobakurir;



class FeedItem {
    private String title;
    private String thumbnail;
    String alamat;
    String nama_toko;
    double harga;
    int id_produk;

    public String getAlamat() {
        return alamat;
    }

    public String getNama_toko() {
        return nama_toko;
    }

    public double getHarga() {
        return harga;
    }

    public int getId_produk() {
        return id_produk;
    }

    public void setAlamat(String alamat) {
        this.alamat = alamat;
    }

    public void setNama_toko(String nama_toko) {
        this.nama_toko = nama_toko;
    }

    public void setHarga(double harga) {
        this.harga = harga;
    }

    public void setId_produk(int id_produk) {
        this.id_produk = id_produk;
    }




    public String getTitle() {
        return title;
    }
    public void setTitle(String title) {
        this.title = title;
    }
    public String getThumbnail() {
        return thumbnail;
    }
    public void setThumbnail(String thumbnail) {
        this.thumbnail = thumbnail;
    }
}
