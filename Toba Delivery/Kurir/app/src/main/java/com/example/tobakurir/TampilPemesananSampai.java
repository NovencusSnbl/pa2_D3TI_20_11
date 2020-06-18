package com.example.tobakurir;

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

public class TampilPemesananSampai extends AppCompatActivity implements View.OnClickListener{

    private TextView TextViewId2;
    private TextView TextViewAsal2;
    private TextView TextViewTujuan2;
    private TextView TextViewProduk2;
    private TextView TextViewPemesan2;

    private Button buttonUpdate2;

    private String id;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_tampil_pemesanan_sampai);

        Intent intent = getIntent();

        id = intent.getStringExtra(konfigurasi.PEMESANAN_ID);

        TextViewId2 = (TextView) findViewById(R.id.TextViewId);
        TextViewAsal2 = (TextView) findViewById(R.id.TextViewAsal2);
        TextViewTujuan2 = (TextView) findViewById(R.id.TextViewTujuan2);
        TextViewProduk2 = (TextView) findViewById(R.id.TextViewIDProduk2);
        TextViewPemesan2 = (TextView) findViewById(R.id.TextViewIDPemesan2);

        buttonUpdate2 = (Button) findViewById(R.id.buttonUpdate2);




        buttonUpdate2.setOnClickListener(this);

        TextViewId2.setText(id);

        getPesananBayar();


    }

    private void getPesananBayar(){
        class GetEmployee2 extends AsyncTask<Void,Void,String>{
            ProgressDialog loading;
            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(TampilPemesananSampai.this,"Fetching...","Wait...",false,false);
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
                String s = rh.sendGetRequestParam(konfigurasi.URL_GET_PEMESANAN_SAMPAI,id);
                return s;
            }
        }
        GetEmployee2 ge = new GetEmployee2();
        ge.execute();
    }

    private void showPemesanan(String json){
        try {
            JSONObject jsonObject = new JSONObject(json);
            JSONArray result = jsonObject.getJSONArray(konfigurasi.TAG_JSON_ARRAY);
            JSONObject c = result.getJSONObject(0);
            String asal2 = c.getString(konfigurasi.TAG_ASAL);
            String tujuan2 = c.getString(konfigurasi.TAG_TUJUAN);
            String produk2 = c.getString(konfigurasi.TAG_IDPRODUK);
            String pemesan2 = c.getString(konfigurasi.TAG_IDCOSTUMER);

            TextViewAsal2.setText(asal2);
            TextViewTujuan2.setText(tujuan2);
            TextViewProduk2.setText(produk2);
            TextViewPemesan2.setText(pemesan2);

        } catch (JSONException e) {
            e.printStackTrace();
        }
    }


    private void TerimaPesanan(){
        final String asal = TextViewAsal2.getText().toString().trim();
        final String tujuan = TextViewTujuan2.getText().toString().trim();
        final String produk = TextViewPemesan2.getText().toString().trim();

        class UpdateEmployee2 extends AsyncTask<Void,Void,String>{
            ProgressDialog loading;
            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(TampilPemesananSampai.this,"Memproses...","Wait...",false,false);
            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);
                loading.dismiss();
                Toast.makeText(TampilPemesananSampai.this,s,Toast.LENGTH_LONG).show();
            }

            @Override
            protected String doInBackground(Void... params) {
                HashMap<String,String> hashMap = new HashMap<>();
                hashMap.put(konfigurasi.KEY_PEMESANAN_ID,id);
                hashMap.put(konfigurasi.KEY_PEMESANN_ASAL,asal);
                hashMap.put(konfigurasi.KEY_PEMESANAN_TUJUAN,tujuan);
                hashMap.put(konfigurasi.KEY_PEMESANAN_IDPRODUK,produk);

                RequestHandler rh = new RequestHandler();

                String s = rh.sendPostRequest(konfigurasi.URL_UPDATE_PEMESANAN_SAMPAI,hashMap);

                return s;
            }
        }

        UpdateEmployee2 ue = new UpdateEmployee2();
        ue.execute();
    }


    @Override
    public void onClick(View v) {
        if(v == buttonUpdate2){
            TerimaPesanan();
        }


    }

}