package com.example.tobadelivery;

import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.RadioButton;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.DefaultRetryPolicy;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.rengwuxian.materialedittext.MaterialEditText;

import java.util.HashMap;
import java.util.Map;

public class TambahPemesanan extends AppCompatActivity {
    MaterialEditText idproduk,asal,tujuan;
    Button pesan;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_tambah_pemesanan);

        idproduk = (MaterialEditText) findViewById(R.id.idproduk);
        asal = (MaterialEditText) findViewById(R.id.asal);
        tujuan = (MaterialEditText) findViewById(R.id.tujuan);
        pesan = (Button) findViewById(R.id.pesan);

        pesan.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String txtid = idproduk.getText().toString();
                String txtasal = asal.getText().toString();
                String txttujuan = tujuan.getText().toString();

                if (TextUtils.isEmpty(txtid) ||
                        TextUtils.isEmpty(txtasal)||
                        TextUtils.isEmpty(txttujuan)){
                    Toast.makeText(TambahPemesanan.this,"All fields required",Toast.LENGTH_SHORT).show();
                }
                else {
                        tambahPemesanan(txtid,txtasal,txttujuan);
                }
            }
        });
    }

    private void tambahPemesanan(final String idproduk , final String asal, final String tujuan) {
        final ProgressDialog progressDialog = new ProgressDialog(TambahPemesanan.this);
        progressDialog.setCancelable(false);
        progressDialog.setIndeterminate(false);
        progressDialog.setTitle("Melakukan Pemesanan");
        progressDialog.show();
        String uRL = "http://169.254.168.218:8080/Proyek Akhir 2/Toba Delivery/Web/tambahPemesanan.php";

        StringRequest request = new StringRequest(Request.Method.POST, uRL, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                if (response.equals("Sukses Memesan!")){
                    progressDialog.dismiss();
                    Toast.makeText(TambahPemesanan.this,response,Toast.LENGTH_SHORT).show();
                    startActivity(new Intent(TambahPemesanan.this, DaftarProduk.class));
                    finish();
                }

                else{
                    progressDialog.dismiss();
                    Toast.makeText(TambahPemesanan.this, response, Toast.LENGTH_SHORT).show();
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                progressDialog.dismiss();
                Toast.makeText(TambahPemesanan.this, error.toString(), Toast.LENGTH_SHORT).show();
            }
        }){
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                HashMap<String, String> param  = new HashMap<>();
                param.put("asal",asal);
                param.put("tujuan",tujuan);
                param.put("idproduk",idproduk);
                return  param;
            }
        };

        request.setRetryPolicy(new DefaultRetryPolicy(30000,DefaultRetryPolicy.DEFAULT_MAX_RETRIES,DefaultRetryPolicy.DEFAULT_BACKOFF_MULT));
        MySingleton.getInstance(TambahPemesanan.this).addToRequeestQueue(request);
    }
}
