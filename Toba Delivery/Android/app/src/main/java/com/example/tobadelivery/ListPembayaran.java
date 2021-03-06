package com.example.tobadelivery;


import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.SimpleAdapter;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;

/**
 * Created by muhammadyusuf on 01/19/2017.
 * kodingindonesia
 */

public class ListPembayaran extends AppCompatActivity implements ListView.OnItemClickListener{

    private ListView listView2;

    private String JSON_STRING2;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_list_pembayaran);
        listView2 = (ListView) findViewById(R.id.listView2);
        listView2.setOnItemClickListener(this);
        getJSON2();
    }


    private void showPembayaran(){
        JSONObject jsonObject = null;
        ArrayList<HashMap<String,String>> list = new ArrayList<HashMap<String, String>>();
        try {
            jsonObject = new JSONObject(JSON_STRING2);
            JSONArray result = jsonObject.getJSONArray(konfigurasi.TAG_JSON_ARRAY);

            for(int i = 0; i<result.length(); i++){
                JSONObject jo = result.getJSONObject(i);
                String id2 = jo.getString(konfigurasi.TAG_ID);
                String asal2 = jo.getString(konfigurasi.TAG_ASAL);
                String tujuan2 = jo.getString(konfigurasi.TAG_TUJUAN);
                String idproduk2 = jo.getString(konfigurasi.TAG_IDPRODUK);
                String pembayaran = jo.getString(konfigurasi.TAG_HARGA);

                HashMap<String,String >pesanan = new HashMap<>();
                pesanan.put(konfigurasi.TAG_ID,id2);
                pesanan.put(konfigurasi.TAG_ASAL,asal2);
                pesanan.put(konfigurasi.TAG_TUJUAN,tujuan2);
                pesanan.put(konfigurasi.TAG_IDPRODUK,idproduk2);
                pesanan.put(konfigurasi.TAG_HARGA,pembayaran);
                list.add(pesanan);
            }

        } catch (JSONException e) {
            e.printStackTrace();
        }

        ListAdapter adapter = new SimpleAdapter(
                ListPembayaran.this, list, R.layout.list_item_pembayaran,
                new String[]{konfigurasi.TAG_ID,konfigurasi.TAG_ASAL,konfigurasi.TAG_TUJUAN,konfigurasi.TAG_IDPRODUK},
                new int[]{R.id.idpemesanan2, R.id.asal2, R.id.tujuan2, R.id.idproduk2});

        listView2.setAdapter(adapter);
    }

    private void getJSON2(){
        class GetJSON2 extends AsyncTask<Void,Void,String>{

            ProgressDialog loading;
            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(ListPembayaran.this,"Mengambil Data","Mohon Tunggu...",false,false);
            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);
                loading.dismiss();
                JSON_STRING2 = s;
                showPembayaran();
            }

            @Override
            protected String doInBackground(Void... params) {
                RequestHandler rh = new RequestHandler();
                String s1 = rh.sendGetRequest(konfigurasi.URL_GET_ALL_PEMBAYARAN);
                return s1;
            }
        }
        GetJSON2 gj2 = new GetJSON2();
        gj2.execute();
    }

    @Override
    public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
        Intent intent = new Intent(this, ActivityPembayaran.class);
        HashMap<String,String> map =(HashMap)parent.getItemAtPosition(position);
        String empId = map.get(konfigurasi.TAG_ID).toString();
        intent.putExtra(konfigurasi.PEMESANAN_ID,empId);
        startActivity(intent);
    }
}