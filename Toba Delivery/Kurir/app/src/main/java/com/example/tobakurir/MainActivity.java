package com.example.tobakurir;

import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.ActivityCompat;
import androidx.core.content.ContextCompat;

import android.Manifest;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.pm.PackageManager;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;



public class MainActivity extends AppCompatActivity {
    Button logout,arah;
    TextView Pengguna;
    String email;
    String KEY_NAMA = "email";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        // Here, thisActivity is the current activity q
//        Pengguna = (TextView) findViewById(R.id.pengguna);
//        Bundle extra = getIntent().getExtras();
//        email = extra.getString(KEY_NAMA);
//        Pengguna.setText("Selamat datang "+email);
        arah = findViewById(R.id.arah);
        arah.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(MainActivity.this,MainMaps.class));
            }
        });
        final SharedPreferences sharedPreferences = getSharedPreferences("UserInfo",MODE_PRIVATE);

        logout = findViewById(R.id.logout);
        logout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                SharedPreferences.Editor editor = sharedPreferences.edit();
                editor.putString(getResources().getString(R.string.prefLoginState),"loggedout");
                editor.apply();
                startActivity(new Intent(MainActivity.this,LoginActivity.class));
            }
        });
    }


    public void DaftarPesanan(View view) {
        startActivity(new Intent(this, TampilSemuaPemesanan.class));
    }

    public void DaftarProduk(View view) {
        startActivity(new Intent(this, DaftarProduk.class));
    }


    public void DaftarBayar(View view) {
        startActivity(new Intent(this, TampilSemuaPesananSampai.class));
    }


}