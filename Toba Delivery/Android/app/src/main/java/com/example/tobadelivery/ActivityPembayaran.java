package com.example.tobadelivery;


import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;

/**
 * Created by muhammadyusuf on 01/19/2017.
 * kodingindonesia
 */

public class ActivityPembayaran extends AppCompatActivity implements View.OnClickListener{

    private TextView editTextId;
    private TextView editTextAsal;
    private TextView editTextTujuan;
    private TextView editTextProduk;
    private TextView editTextHarga;

    private Button buttonUpdate;
    private Button daftarproduk;

    private String id;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_pembayaran);

        Intent intent = getIntent();

        id = intent.getStringExtra(konfigurasi.PEMESANAN_ID);

        editTextId = (TextView) findViewById(R.id.editTextId2);
        editTextAsal = (TextView) findViewById(R.id.editTextAsal2);
        editTextTujuan = (TextView) findViewById(R.id.editTextTujuan2);
        editTextProduk = (TextView) findViewById(R.id.editTextIDProduk2);
        editTextHarga = (TextView) findViewById(R.id.editTextHarga);

        buttonUpdate = (Button) findViewById(R.id.buttonUpdate);




        buttonUpdate.setOnClickListener(this);

        editTextId.setText(id);

        getPesanan();


    }

    private void getPesanan(){
        class GetEmployee extends AsyncTask<Void,Void,String>{
            ProgressDialog loading;
            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(ActivityPembayaran.this,"Fetching...","Wait...",false,false);
            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);
                loading.dismiss();
                showPemesanan(s);
            }

            @Override
            protected String doInBackground(Void... params) {
                RequestHandler rh = new RequestHandler();
                String s = rh.sendGetRequestParam(konfigurasi.URL_GET_PEMBAYARAN,id);
                return s;
            }
        }
        GetEmployee ge = new GetEmployee();
        ge.execute();
    }

    private void showPemesanan(String json){
        try {
            JSONObject jsonObject = new JSONObject(json);
            JSONArray result = jsonObject.getJSONArray(konfigurasi.TAG_JSON_ARRAY);
            JSONObject c = result.getJSONObject(0);
            String asal = c.getString(konfigurasi.TAG_ASAL);
            String tujuan = c.getString(konfigurasi.TAG_TUJUAN);
            String produk = c.getString(konfigurasi.TAG_IDPRODUK);
            String pemesan = c.getString(konfigurasi.TAG_HARGA);

            editTextAsal.setText(asal);
            editTextTujuan.setText(tujuan);
            editTextProduk.setText(produk);
            editTextHarga.setText(pemesan);

        } catch (JSONException e) {
            e.printStackTrace();
        }
    }


    private void TerimaPesanan(){
        final String name = editTextAsal.getText().toString().trim();
        final String desg = editTextTujuan.getText().toString().trim();
        final String salary = editTextProduk.getText().toString().trim();

        final String harga = editTextHarga.getText().toString().trim();

        class UpdateEmployee extends AsyncTask<Void,Void,String>{
            ProgressDialog loading;
            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(ActivityPembayaran.this,"Updating...","Wait...",false,false);
            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);
                loading.dismiss();
                Toast.makeText(ActivityPembayaran.this,s,Toast.LENGTH_LONG).show();
            }

            @Override
            protected String doInBackground(Void... params) {
                HashMap<String,String> hashMap = new HashMap<>();
                hashMap.put(konfigurasi.KEY_PEMESANAN_ID,id);
                hashMap.put(konfigurasi.KEY_PEMESANN_ASAL,name);
                hashMap.put(konfigurasi.KEY_PEMESANAN_TUJUAN,desg);
                hashMap.put(konfigurasi.KEY_PEMESANAN_IDPRODUK,salary);
                hashMap.put(konfigurasi.KEY_PEMESANAN_HARGA,harga);

                RequestHandler rh = new RequestHandler();

                String s = rh.sendPostRequest(konfigurasi.URL_UPDATE_PEMBAYARAN,hashMap);

                return s;
            }
        }

        UpdateEmployee ue = new UpdateEmployee();
        ue.execute();
    }





    @Override
    public void onClick(View v) {
        if(v == buttonUpdate){
            TerimaPesanan();
        }


    }

}