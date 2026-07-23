package com.shiptodoor.shiptodoor;


import android.graphics.Color;
import android.graphics.Rect;
import android.os.Bundle;



import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import android.text.TextUtils;
import android.view.MotionEvent;
import android.view.View;

import android.content.Intent;
import android.view.Window;
import android.view.WindowManager;
import android.widget.Button;



import com.google.android.material.floatingactionbutton.FloatingActionButton;
import com.google.android.material.snackbar.Snackbar;

import android.app.NotificationChannel;
import android.app.NotificationManager;
import android.app.ProgressDialog;
import android.net.Uri;



import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import android.view.View;


import android.annotation.SuppressLint;



import android.os.Environment;

import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.InputStreamReader;
import java.util.Locale;
import java.text.*;
import java.util.Date;

import android.content.pm.ResolveInfo;

import android.telephony.TelephonyManager;

import android.content.Context;

import android.content.pm.PackageInfo;
import android.content.pm.PackageManager;


import android.app.Activity;
import android.Manifest;
import android.content.Intent;

import android.view.Menu;
import android.view.MenuItem;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;

import android.widget.ImageView;
import android.widget.Spinner;
import android.widget.Toast;
import android.view.inputmethod.InputMethodManager;

import java.net.HttpURLConnection;
import java.net.URL;

import android.content.ActivityNotFoundException;


import android.content.ClipData;






import androidx.annotation.NonNull;


import android.util.Log;
import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.iid.FirebaseInstanceId;
import com.google.firebase.iid.InstanceIdResult;
import com.google.firebase.messaging.FirebaseMessaging;


import android.os.AsyncTask;
import android.widget.EditText;

import org.json.JSONObject;
import org.w3c.dom.Text;


import java.util.ArrayList;
import java.util.List;

import java.io.IOException;



import android.provider.MediaStore;
import android.provider.Settings;




import android.app.AlertDialog;
import android.content.ContentResolver;

import android.content.DialogInterface;

import android.location.Address;
import android.location.Geocoder;
import android.location.Location;
import android.location.LocationListener;
import android.location.LocationManager;

import androidx.core.content.ContextCompat;


import android.widget.TextView;
import android.widget.ProgressBar;
import android.widget.ListView;





public class PasswordActivity extends AppCompatActivity {

    private Button butBack = null;
    private Toolbar  mTopToolbar;
    private Button butPwd = null;

    private ArrayList<String> country_list = new ArrayList<>();

    private String txtFname="";
    private String txtSurname="";
    private String txtGender="";
    private String txtEmail="";


    private String txtPassword="";

    private String txtAddress;
    private String txtCity;
    private String txtPostCode;
    private String txtCountry;
    private String txtMobile;


    private String txtSenderState;
    private String txtSenderlga;

    private int lga_id ;
    private int state_id ;

    private int selected_Id= 0;

    private  String txt1, txt2;
    EditText ed1, ed2;
    private Boolean CheckEditText;

    private String txtTitle;
    private int txtselected_Id;
    private int genderLenth;

    private int txtselected_country_Id;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        try{

        setContentView(R.layout.activity_password);
        Toolbar toolbar = findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

            Window window = getWindow();

            /* Change status bar background color to white */
            window.clearFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN);

            window.addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS);

            int colorCodeLight = Color.parseColor("#ffffff");
            window.setStatusBarColor(colorCodeLight);


        butPwd = findViewById(R.id.butReg);

        butBack = findViewById(R.id.button2);

        getSupportActionBar().setDisplayShowHomeEnabled(true);
        //getSupportActionBar().setLogo(R.drawable.logo5);
        getSupportActionBar().setDisplayUseLogoEnabled(true);
        getSupportActionBar().setTitle("   Sign up");

        mTopToolbar=(Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(mTopToolbar);

        ed1 = (EditText) findViewById(R.id.txtPassword);
        ed2 = (EditText) findViewById(R.id.txtConPassword);


        Intent intent3 = getIntent();
        txtFname = intent3.getStringExtra("txtFname");
        txtSurname = intent3.getStringExtra("txtSurname");
        txtGender = intent3.getStringExtra("txtGender");
        txtEmail = intent3.getStringExtra("txtEmail");



        update_Text();

        butBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Log.d(TAG, "Subscribing to weather topic");
                try{
                Intent intent = new Intent(PasswordActivity.this,EmailActivity.class);

                txtPassword = ed1.getText().toString();

                intent.putExtra("txtEmail",txtEmail);
                intent.putExtra("txtFname",txtFname);
                intent.putExtra("txtSurname",txtSurname);
                intent.putExtra("txtGender",txtGender);
                intent.putExtra("txtPassword",txtPassword);
                intent.putExtra("txtAddress",txtAddress);
                intent.putExtra("txtCity",txtCity);
                intent.putExtra("txtPostCode",txtPostCode);
                intent.putExtra("txtMobile",txtMobile);
                intent.putExtra("txtCountry",txtCountry);
                intent.putExtra("txtTitle",txtTitle);
                intent.putExtra("txtselected_Id",txtselected_Id);
                intent.putExtra("txtselected_country_Id",txtselected_country_Id);
                intent.putExtra("genderLenth",genderLenth);
                intent.putExtra("key", country_list);
                intent.putExtra("txtSenderState",txtSenderState);
                intent.putExtra("txtSenderlga",txtSenderlga);

                intent.putExtra("state_id",state_id);
                intent.putExtra("lga_id",lga_id);

                startActivity(intent);
                finish();

                }catch(NullPointerException e){
                    e.printStackTrace();
                }
            }
        });

        butPwd.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Log.d(TAG, "Subscribing to weather topic");
try{
                txt1 = ed1.getText().toString();
                txt2 = ed2.getText().toString();


                boolean pwd_compare= isMatches(txt1.trim(),txt2.trim());
                ValidateText();

                if(CheckEditText && pwd_compare)
                {
                    Intent intent = new Intent(PasswordActivity.this,AddressActivity.class);

                    intent.putExtra("txtEmail",txtEmail);
                    intent.putExtra("txtFname",txtFname);
                    intent.putExtra("txtSurname",txtSurname);
                    intent.putExtra("txtGender",txtGender);
                    intent.putExtra("txtPassword",txt1);

                    intent.putExtra("txtAddress",txtAddress);
                    intent.putExtra("txtCity",txtCity);
                    intent.putExtra("txtPostCode",txtPostCode);
                    intent.putExtra("txtMobile",txtMobile);
                    intent.putExtra("txtCountry",txtCountry);
                    intent.putExtra("txtTitle",txtTitle);
                    intent.putExtra("txtselected_Id",txtselected_Id);
                    intent.putExtra("txtselected_country_Id",txtselected_country_Id);
                    intent.putExtra("genderLenth",genderLenth);
                    intent.putExtra("key", country_list);
                    intent.putExtra("txtSenderState",txtSenderState);
                    intent.putExtra("txtSenderlga",txtSenderlga);

                    intent.putExtra("state_id",state_id);
                    intent.putExtra("lga_id",lga_id);

                    startActivity(intent);
                    finish();
                }
                else{
                    Toast.makeText(PasswordActivity.this, "Please fill all form fields Correctly.", Toast.LENGTH_LONG).show();
                }

}catch(NullPointerException e){
    e.printStackTrace();
}

            }
        });


        ed1.setOnFocusChangeListener(new View.OnFocusChangeListener() {
            @Override
            public void onFocusChange(View v, boolean hasFocus) {
                if (!hasFocus) {
                    hideKeyboard(v);
                }
            }
        });

        ed2.setOnFocusChangeListener(new View.OnFocusChangeListener() {
            @Override
            public void onFocusChange(View v, boolean hasFocus) {
                if (!hasFocus) {
                    hideKeyboard(v);
                }
            }
        });


            /* error */

        } catch (NullPointerException e) {
            e.printStackTrace();
        }
        catch (IndexOutOfBoundsException el) {
            el.printStackTrace();
        }
        catch (RuntimeException el) {
            el.printStackTrace();
        }



    }



    public void hideKeyboard(View view) {
        InputMethodManager inputMethodManager =(InputMethodManager)getSystemService(Activity.INPUT_METHOD_SERVICE);
        inputMethodManager.hideSoftInputFromWindow(view.getWindowToken(), 0);


    }



    public static boolean  isMatches(String password, String conPassword){
        return password.matches(conPassword);
    }
    public void ValidateText(){

        txt1 = ed1.getText().toString();
        txt2 = ed2.getText().toString();
        if( TextUtils.isEmpty(txt1)|| TextUtils.isEmpty(txt2) || txt1.length()  < 6  )
        {

            CheckEditText = false;

        }
        else {

            CheckEditText = true ;

        }


    }


    public void update_Text(){


try{
            Intent intent4 = getIntent();
        txtAddress = intent4.getStringExtra("txtAddress");
        if(txtAddress != null)
        {
            country_list = (ArrayList<String>) getIntent().getSerializableExtra("key");
        }
            txtFname = intent4.getStringExtra("txtFname");
            txtSurname = intent4.getStringExtra("txtSurname");
            txtGender = intent4.getStringExtra("txtGender");
            txtEmail = intent4.getStringExtra("txtEmail");
            txtPassword = intent4.getStringExtra("txtPassword");

            txtAddress = intent4.getStringExtra("txtAddress");
            txtCity = intent4.getStringExtra("txtCity");
            txtPostCode = intent4.getStringExtra("txtPostCode");
            txtMobile = intent4.getStringExtra("txtMobile");
            txtCountry = intent4.getStringExtra("txtCountry");
        txtselected_Id = intent4.getIntExtra("txtselected_Id",0);
        txtselected_country_Id = intent4.getIntExtra("txtselected_country_Id",0);

        txtTitle = intent4.getStringExtra("txtTitle");
        genderLenth = intent4.getIntExtra("genderLenth",0);

        txtSenderlga  =intent4.getStringExtra("txtSenderlga");
        txtSenderState=intent4.getStringExtra("txtSenderState");

        lga_id = intent4.getIntExtra("lga_id",0);
        state_id = intent4.getIntExtra("state_id",0);
        txtselected_country_Id = intent4.getIntExtra("txtselected_country_Id",0);



        ed1.setText(txtPassword);
        ed2.setText(txtPassword);




        //String.valueOf(spinner3.getSelectedItem());

}catch(NullPointerException e){
    e.printStackTrace();
}
    }


    @Override
    public boolean dispatchTouchEvent(MotionEvent event) {
        if (event.getAction() == MotionEvent.ACTION_DOWN) {
            View v = getCurrentFocus();
            if ( v instanceof EditText) {
                Rect outRect = new Rect();
                v.getGlobalVisibleRect(outRect);
                if (!outRect.contains((int)event.getRawX(), (int)event.getRawY())) {
                    v.clearFocus();
                    InputMethodManager imm = (InputMethodManager) getSystemService(Context.INPUT_METHOD_SERVICE);
                    imm.hideSoftInputFromWindow(v.getWindowToken(), 0);
                }
            }
        }
        return super.dispatchTouchEvent( event );
    }


}