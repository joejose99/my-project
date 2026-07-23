package com.shiptodoor.shiptodoor;

import android.database.Cursor;
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

import com.google.android.material.bottomnavigation.BottomNavigationView;


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
import android.widget.RadioButton;
import android.widget.RadioGroup;
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

import org.json.JSONArray;
import org.json.JSONException;
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
import androidx.coordinatorlayout.widget.CoordinatorLayout;
import com.google.android.material.bottomnavigation.BottomNavigationView;

import com.shiptodoor.shiptodoor.helper.BottomNavigationBehavior;



public class HelpActivity extends AppCompatActivity {

    private Button butPay = null;
    private Button butBack = null;
    private Button butReg= null;
    private Toolbar  mTopToolbar;

    private String HttpURL = "https://www.cargoland.shiptodoor.com/cargoland/email.php";


    HttpParse httpParse = new HttpParse();
    String IMEI_Number_Holder;
    TelephonyManager telephonyManager;

    private boolean CheckEditText =false;
    DBHelper  mydb = new DBHelper(this);

    ArrayAdapter adapter;
    EditText ed1, ed2, ed3, ed4, ed5, ed6,ed7,ed8;
    private  String txt1, txt2, txt3, txt4, txt5,txt6, txt7, txt8;


    String finalResult, rst, result;

    TextView tv1, tv2, tv3, tv4, tv5;
    ProgressDialog progressDialog;

    private String fname;
    private String email;
    private String mobile;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_help);
        Toolbar toolbar = findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);


        Window window = getWindow();

        /* Change status bar background color to white */
        window.clearFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN);

        window.addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS);

        int colorCodeLight = Color.parseColor("#ffffff");
        window.setStatusBarColor(colorCodeLight);



        butPay = findViewById(R.id.button2);

        butBack = findViewById(R.id.button2);

        butReg = findViewById(R.id.butReg);
        ed1=(EditText) findViewById(R.id.txtMsg);;
        ed2=(EditText) findViewById(R.id.txtTitle);;

        getSupportActionBar().setDisplayShowHomeEnabled(true);
        //getSupportActionBar().setLogo(R.drawable.logo5);
        getSupportActionBar().setDisplayUseLogoEnabled(true);
        getSupportActionBar().setTitle("   Help");

        mTopToolbar=(Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(mTopToolbar);

        butBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Log.d(TAG, "Subscribing to weather topic");
                Intent intent = new Intent(HelpActivity.this,MenuActivity.class);
                startActivity(intent);
                finish();
            }
        });


        butPay.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Log.d(TAG, "Subscribing to weather topic");
                Intent intent = new Intent(HelpActivity.this,MenuActivity.class);
                startActivity(intent);


                finish();


            }
        });


        /* Bottom Navigation start here */
        BottomNavigationView navView = findViewById(R.id.nav_view);
        // Passing each menu ID as a set of Ids because each
        // menu should be considered as top level destinations
        /*
        AppBarConfiguration appBarConfiguration = new AppBarConfiguration.Builder(
                R.id.navigation_home, R.id.navigation_send, R.id.navigation_track,R.id.navigation_help,R.id.navigation_logout)
                .build();


        NavController navController = Navigation.findNavController(this, R.id.nav_host_fragment);
        NavigationUI.setupActionBarWithNavController(this, navController, appBarConfiguration);
        NavigationUI.setupWithNavController(navView, navController);


         */
        BottomNavigationView bottomNavigationView = (BottomNavigationView) findViewById(R.id.nav_view);
        bottomNavigationView.setOnNavigationItemSelectedListener(new BottomNavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem item) {
                switch (item.getItemId()) {
                    case R.id.navigation_home:
                        //Toast.makeText(MenuActivity.this, "Home", Toast.LENGTH_SHORT).show();
                        Intent intent = new Intent(HelpActivity.this,MenuActivity.class);
                        startActivity(intent);
                        finish();
                        break;

                    case R.id.navigation_send:
                        //Toast.makeText(MenuActivity.this, "Send", Toast.LENGTH_SHORT).show();
                        Intent intent1 = new Intent(HelpActivity.this,ParcelLetterActivity.class);
                        startActivity(intent1);
                        finish();
                        break;
                    case R.id.navigation_track:
                        //Toast.makeText(MenuActivity.this, "Tracking", Toast.LENGTH_SHORT).show();
                        Intent intent2 = new Intent(HelpActivity.this,TrackingActivity.class);
                        startActivity(intent2);
                        finish();
                        break;
                    case R.id.navigation_help:
                        //Toast.makeText(MenuActivity.this, "Help", Toast.LENGTH_SHORT).show();
                        Intent intent3 = new Intent(HelpActivity.this,HelpActivity.class);
                        startActivity(intent3);
                        finish();
                        break;

                    case R.id.navigation_logout:
                        Intent intent4 = new Intent(HelpActivity.this,UserHistory.class);
                        startActivity(intent4);
                        finish();
                        //Toast.makeText(MenuActivity.this, "Log out", Toast.LENGTH_SHORT).show();
                        break;
                }
                return true;
            }
        });

        CoordinatorLayout.LayoutParams layoutParams = (CoordinatorLayout.LayoutParams) bottomNavigationView.getLayoutParams();
        layoutParams.setBehavior(new BottomNavigationBehavior());

        getDetails();



        butReg.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                ValidateText();

                txt1 = ed1.getText().toString();
                txt2 = ed2.getText().toString();

                ed1.clearFocus();
                ed2.clearFocus();
                if(CheckEditText)
                {

                    SendEmail(txt1);
                }
                else {
                    Toast.makeText(HelpActivity.this, "Please fill all form fields.", Toast.LENGTH_LONG).show();
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

    }




    //R.menu.menu_main, menu
    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        // getMenuInflater().inflate(R.menu.menu_main,menu);
        getMenuInflater().inflate(R.menu.logout, menu);
        return true;
    }




    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_logout) {
            // Toast.makeText(UserLogin.this, "Action clicked", Toast.LENGTH_LONG).show();
            Intent intent = new Intent(HelpActivity.this,UserLogin.class);
            startActivity(intent);


            finish();
            return true;

        }

        if (id == R.id.action_exit) {
            // Toast.makeText(Merchandizer.this, "Action clicked", Toast.LENGTH_LONG).show();
            // getLocations();

            // RegApp();
            ExitApp();


            return true;


        }





        return super.onOptionsItemSelected(item);
    }







    private void ExitApp(){

        android.os.Process.killProcess(android.os.Process.myPid());
        System.exit(1);
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


    public void hideKeyboard(View view) {
        InputMethodManager inputMethodManager =(InputMethodManager)getSystemService(Activity.INPUT_METHOD_SERVICE);
        inputMethodManager.hideSoftInputFromWindow(view.getWindowToken(), 0);


    }
   private void getDetails (){

       Cursor res= mydb.getUsers(1);
       if(res.moveToFirst()){



           res.moveToFirst();
           fname    =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_FIRSTNAME));

            email =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_EMAIL));

           mobile    =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_MOBILENO));



       }
   }






    public void SendEmail(final String Spanner1 ){

        class LagClass extends AsyncTask<String,Void,String> {
            @Override
            protected void onPreExecute() {
                super.onPreExecute();

                progressDialog = ProgressDialog.show(HelpActivity.this,"Wait Email is been sent ....",null,false,false);
            }

            @Override
            protected void onPostExecute(String httpResponseMsg) {

                super.onPostExecute(httpResponseMsg);
                progressDialog.dismiss();
                String err ,err1;
                String str = httpResponseMsg.toString().replaceAll("\"","");

                Log.i("sucess: ", str.toString());
                if(str.trim().equals("Success")){
                    Toast.makeText(HelpActivity.this,"Success ",Toast.LENGTH_LONG).show();

                    ed1.setText("");
                    ed2.setText("");

                }else{

                    Toast.makeText(HelpActivity.this,"Oh something went wrong!!",Toast.LENGTH_LONG).show();
                }




            }

            @Override
            protected String doInBackground(String... params) {

                try {



                    txt1 = ed1.getText().toString();
                    txt2 = ed2.getText().toString();

                    JSONObject postDataParams = new JSONObject();


                    postDataParams.put("fname", fname);
                    postDataParams.put("email", email);
                    postDataParams.put("mobile", mobile);
                    postDataParams.put("message", txt1);
                    postDataParams.put("title", txt2);

                    Log.e("params",postDataParams.toString());

                    finalResult = httpParse.postRequest(postDataParams, HttpURL);


                } catch (Exception e) {
                    e.printStackTrace();
                }



                return finalResult;
            }
        }
        LagClass lgaObj = new LagClass();

        lgaObj.execute(Spanner1);
    }






    public void ValidateText(){

        txt1 = ed1.getText().toString();
      txt2 = ed2.getText().toString();

        String sel="Select";
          if( TextUtils.isEmpty(txt1)||  TextUtils.isEmpty(txt2))
        {

            CheckEditText = false;

        }
        else {

            CheckEditText = true ;

        }


    }


    }