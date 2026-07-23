package com.shiptodoor.shiptodoor;

import android.graphics.Paint;
import android.os.Bundle;

import com.google.android.material.floatingactionbutton.FloatingActionButton;
import com.google.android.material.snackbar.Snackbar;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.view.menu.MenuBuilder;
import androidx.appcompat.widget.Toolbar;

import android.view.Gravity;
import android.view.View;


import android.content.Intent;
import android.content.res.Resources;
import android.database.Cursor;
import android.graphics.Color;
import android.graphics.drawable.Drawable;
import android.os.Bundle;

import com.google.android.material.floatingactionbutton.FloatingActionButton;
import com.google.android.material.snackbar.Snackbar;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import android.view.Menu;
import android.view.MenuItem;
import android.view.View;


import androidx.coordinatorlayout.widget.CoordinatorLayout;

import com.google.android.material.bottomnavigation.BottomNavigationView;
import com.shiptodoor.shiptodoor.helper.BottomNavigationBehavior;

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
import java.util.Currency;
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
import android.view.ViewGroup;
import android.view.Window;
import android.view.WindowManager;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;

import android.widget.ImageView;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Spinner;
import android.widget.TableLayout;
import android.widget.TableRow;
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
import androidx.core.content.res.ResourcesCompat;


import android.widget.TextView;
import android.widget.ProgressBar;
import android.widget.ListView;

import android.database.Cursor;


public class OutstandingPayment extends AppCompatActivity {

    DBHelper  mydb = new DBHelper(this);
    String HttpURL="https://www.cargoland.shiptodoor.com/cargoland/outstanding_bill.php";

    private String userId;
    private int usrIds;
    ProgressDialog progressDialog;
    String finalResult ,rst;
    TableLayout tableLayout;

    private TableLayout.LayoutParams params=null;
    TableRow tableRow;
    TextView textView;
    private TextView txtName;
    HttpParse httpParse = new HttpParse();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_outstanding_payment);
        Toolbar toolbar = findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        tableLayout =(TableLayout)findViewById(R.id.table1);
        txtName=findViewById(R.id.txtName);

        getSupportActionBar().setDisplayShowHomeEnabled(true);
        //getSupportActionBar().setLogo(R.drawable.logo5);
        getSupportActionBar().setDisplayUseLogoEnabled(true);
        getSupportActionBar().setTitle("   Pending Bill");



        Window window = getWindow();

        /* Change status bar background color to white */
        window.clearFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN);

        window.addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS);

        int colorCodeLight = Color.parseColor("#ffffff");
        window.setStatusBarColor(colorCodeLight);

/*
        String strnum1 ="NGN5004$";
        String strnum2 ="NGN5004";
        String strnum3 ="$5004";
        String strnum4 ="$500.4";

        Log.i("Data","Format strnum1: "+ strnum1.replaceAll("[^\\d.]",""));
        Log.i("Data","Format strnum2: "+ strnum2.replaceAll("[^\\d.]",""));
        Log.i("Data","Format strnum3:  "+ strnum3.replaceAll("[^\\d.]",""));
        Log.i("Data","Format strnum4: "+ strnum4.replaceAll("[^\\d.]",""));

 */

/*
        FloatingActionButton fab = findViewById(R.id.fab);
        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Snackbar.make(view, "Replace with your own action", Snackbar.LENGTH_LONG)
                        .setAction("Action", null).show();
            }
        });

 */
        mydb = new DBHelper(this);
        Log.i("level","Level 3B");
        // Cursor res= mydb.getLoginUsers(1);
        Cursor res;
        res= mydb.getLoginUsers(1);
        String MobileNo=null;
        if(res.moveToFirst()){

            res.moveToFirst();
            usrIds=res.getInt(res.getColumnIndex(DBHelper.LOGIN_COLUMN_ID));
            MobileNo    =res.getString(res.getColumnIndex(DBHelper.LOGIN_COLUMN_MOBILE));
            userId    =res.getString(res.getColumnIndex(DBHelper.LOGIN_COLUMN_USER_ID));
            Log.i("level","Level 3F");
        }

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
                        Intent intent = new Intent(OutstandingPayment.this,MenuActivity.class);
                        startActivity(intent);
                        finish();
                        break;

                    case R.id.navigation_send:
                        //Toast.makeText(MenuActivity.this, "Send", Toast.LENGTH_SHORT).show();
                        Intent intent1 = new Intent(OutstandingPayment.this,ParcelLetterActivity.class);
                        startActivity(intent1);
                        finish();
                        break;
                    case R.id.navigation_track:
                        //Toast.makeText(MenuActivity.this, "Tracking", Toast.LENGTH_SHORT).show();
                        Intent intent2 = new Intent(OutstandingPayment.this,TrackingActivity.class);
                        startActivity(intent2);
                        finish();
                        break;
                    case R.id.navigation_help:
                        //Toast.makeText(MenuActivity.this, "Help", Toast.LENGTH_SHORT).show();
                     /*
                        Intent intent3 = new Intent(OutstandingPayment.this,HelpActivity.class);
                        startActivity(intent3);

                      */
                        Intent  browserIntent  = new Intent(Intent.ACTION_VIEW, Uri.parse("https://tawk.to/chat/60b7cf63de99a4282a1b0bc0/1f77047de"));
                        startActivity(browserIntent);
                        finish();
                        break;

                    case R.id.navigation_logout:
                        Intent intent4 = new Intent(OutstandingPayment.this,UserHistory.class);
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


        PopulateLGA( userId );

    }

    //R.menu.menu_main, menu
    @SuppressLint("RestrictedApi")
    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        // getMenuInflater().inflate(R.menu.menu_main,menu);
        getMenuInflater().inflate(R.menu.logout, menu);
        if(menu instanceof MenuBuilder){
            MenuBuilder m =(MenuBuilder)menu;
            m.setOptionalIconsVisible(true);
        }
        return true;
    }




    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();
        if (id == R.id.action_live_chat) {
            // Toast.makeText(UserLogin.this, "Action clicked", Toast.LENGTH_LONG).show();
            //Intent intent = new Intent(MenuActivity.this,LiveChat.class);
          /*
            Intent  browserIntent  = new Intent(Intent.ACTION_VIEW, Uri.parse("https://tawk.to/chat/60b7cf63de99a4282a1b0bc0/1f77047de"));
            startActivity(browserIntent);

           */
            Intent intent3 = new Intent(OutstandingPayment.this,HelpActivity.class);
            startActivity(intent3);



            finish();
            return true;

        }
        //noinspection SimplifiableIfStatement
        if (id == R.id.action_logout) {
            // Toast.makeText(UserLogin.this, "Action clicked", Toast.LENGTH_LONG).show();
            Intent intent = new Intent(OutstandingPayment.this,UserLogin.class);
            startActivity(intent);


            finish();
            return true;

        }
        if (id == R.id.action_profile) {
            // Toast.makeText(UserLogin.this, "Action clicked", Toast.LENGTH_LONG).show();
            Intent intent = new Intent(OutstandingPayment.this,UserProfile.class);
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



    /* POPULATING LGA */

    public void PopulateLGA(final String userid ){

        class LagClass extends AsyncTask<String,Void,String> {
            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                //progressDialog =ProgressDialog.show(UserHistory.this,"Login", "Please wait...",false,false);

                progressDialog = ProgressDialog.show(OutstandingPayment.this,"Loading","Outstanding Bill ....",true,true);
            }

            @Override
            protected void onPostExecute(String httpResponseMsg) {

                super.onPostExecute(httpResponseMsg);

                String err ,err1;
                progressDialog.dismiss();


                try {

                    // Log.e("Messages  ",httpResponseMsg);



                    loadIntoPolUnit(httpResponseMsg);



                } catch (JSONException e) {
                    e.printStackTrace();
                }









            }

            @Override
            protected String doInBackground(String... params) {

                try {





                    JSONObject postDataParams = new JSONObject();


                    postDataParams.put("user_id", userId);
                    postDataParams.put("cargoland", "Cargoland");


                    Log.e("params",postDataParams.toString());

                    finalResult = httpParse.postRequest(postDataParams, HttpURL);


                } catch (Exception e) {
                    e.printStackTrace();
                }



                return finalResult;
            }
        }
        LagClass lgaObj = new LagClass();

        lgaObj.execute(userid);
    }



    private void loadIntoPolUnit(String json) throws JSONException {
        //spinnerLGA = (Spinner) findViewById(R.id.spinnerLGA);
        try{

            int ctr =0;

            JSONArray jsonArray = new JSONArray(json);


            tableLayout.removeAllViews();

            tableRow = new TableRow(getApplicationContext());
            tableRow.setBackgroundColor(Color.parseColor("#3700B3"));
            tableRow.setWeightSum(1);
            tableRow.setPadding(20,20,20,10);


            /* BEGINING OF HEADER TALE */

            TextView textView3 = new TextView(getApplicationContext());
            textView3.setText("Date");
            textView3.setPadding(20,10,20,10);
            textView3.setGravity(Gravity.LEFT);
            textView3.setTextColor(Color.parseColor("#ffffff"));

            tableRow.addView(textView3);




            TextView   textView4 = new TextView(getApplicationContext());
            textView4.setText("Description");
            textView4.setTextColor(Color.parseColor("#ffffff"));
            //textView4.setPadding(50,10,50,10);
            textView4.setPadding(30,10,30,10);
            textView4.setGravity(Gravity.CENTER);
            tableRow.addView(textView4);



            TextView   textView5= new TextView(getApplicationContext());
            textView5.setPadding(20,10,10,10);
            textView5.setGravity(Gravity.RIGHT);

            textView5.setText("Amount");

            textView5.setTextColor(Color.parseColor("#ffffff"));
            textView5.setGravity(Gravity.LEFT);
            tableRow.addView(textView5);

            tableLayout.addView(tableRow);
            /* END OF HEADER */
            /* DRAW LINE */
            tableRow = new TableRow(getApplicationContext());
            tableRow.setBackgroundColor(Color.parseColor("#3700B3"));
            tableRow.setWeightSum(1);
            tableRow.setPadding(0,1,0,0);
            tableRow.setBackgroundResource(R.drawable.drawline);
            tableLayout.addView(tableRow);
            /* END OF LINE */






            Log.i("Level","Level 6E");
            for (int i = 0; i < jsonArray.length(); i++) {

                String payment =jsonArray.getString(i);

                Log.i("Level","Level 7");

                String[] split =payment.split("_");

                tableRow = new TableRow(getApplicationContext());
                tableRow.setBackgroundColor(Color.parseColor("#3700B3"));
                tableRow.setWeightSum(1);
                tableRow.setPadding(20,20,20,10);

                params= new TableLayout.LayoutParams(TableLayout.LayoutParams.MATCH_PARENT, ViewGroup.LayoutParams.MATCH_PARENT);


                for (int it= 0; it < 2; it++) {
                    /*
                    if(it ==1){
                        Log.i("Level","Level 7 "+it);

                        // tableRow = new TableRow(getApplicationContext());
                        textView = new TextView(getApplicationContext());

                        textView.setText("Outstanding Bill");
                        textView.setTextColor(Color.parseColor("#ffffff"));
                        textView.setPadding(60,10,0,10);
                        tableRow.addView(textView);
                        // tableLayout.addView(tableRow);
                    }

                     */
                    Log.i("Level","Level 8 "+it);

                    textView = new TextView(getApplicationContext());
                    if(it==0){
                       // textView.setText(split[it].substring(0,10));
                        //textView.setPadding(20,10,20,10);

                        TextView textView2 = new TextView(getApplicationContext());
                        textView2.setText(split[it].substring(0,10));
                        textView2.setPadding(20,10,20,10);
                        textView2.setGravity(Gravity.LEFT);
                        textView2.setTextColor(Color.parseColor("#ffffff"));

                        tableRow.addView(textView2);


                    }if(it==1){



                        TextView   textView1 = new TextView(getApplicationContext());
                        textView1.setText("Outstanding Bill");
                        textView1.setTextColor(Color.parseColor("#ffffff"));
                        textView1.setPadding(30,10,30,10);
                        textView1.setGravity(Gravity.CENTER);
                        tableRow.addView(textView1);



                        textView = new TextView(getApplicationContext());
                        textView.setPadding(20,10,10,10);
                        textView.setGravity(Gravity.RIGHT);

                        textView.setText(split[it].trim());

                        textView.setTextColor(Color.parseColor("#ffffff"));
                        textView.setGravity(Gravity.LEFT);
                        tableRow.addView(textView);






                       // textView.setText(split[it]);
                       // textView.setPadding(100,10,20,10);
                    }

                    //tableRow.addView(textView);
                    // tableLayout.addView(tableRow);



                }



                tableRow.setOnClickListener(new View.OnClickListener(){

                    @Override
                    public  void onClick(View view){


                        Intent intent = new Intent(OutstandingPayment.this,PaymentActivity.class);

                        String strDollar = split[5].toString().replaceAll("\"","");
                        String transactionId = split[7].toString().replaceAll("\"","");
                        intent.putExtra("txtPrice",split[1]);
                        intent.putExtra("txtSenderFname",split[3]);
                        intent.putExtra("txtSenderSurname",split[3]);
                        intent.putExtra("txtSenderMobile","");
                        intent.putExtra("txtEmail",split[4]);
                        intent.putExtra("transaction_Id",split[7]);
                        intent.putExtra("txtUserId",split[6]);
                        intent.putExtra("txtDollar",strDollar);
                        intent.putExtra("txtPaymentType","2");
                        //intent.putExtra("txtDollar",strDollar);
                        intent.putExtra("txtUser_Id",userId);

                        startActivity(intent);
                        finish();



                    }



                }) ;




                tableLayout.addView(tableRow);

                Log.e("price ","price  ********************* " +split[1]);
                Log.e("Data ","created_at  ********************* " +split[0]);
                Log.e("Data ","track no:  ********************* " +split[2]);
                Log.e("Data ","Name:  ********************* " +split[3]);
                Log.e("Data ","Eail:  ********************* " +split[4]);
                Log.e("Data ","Dollar:  ********************* " +split[5]);
                Log.e("Data ","User trans:  ********************* " +split[6]);
                Log.e("Data ","Transaction Id:  ********************* " +split[7]);

                txtName.setText(split[3].toString());

                //$heroes[i] = obj.getString("address");



                /* clickable row */
//textView.setPaintFlags(textView.getPaintFlags()| Paint.UNDERLINE_TEXT_FLAG);
                textView.setOnClickListener(new View.OnClickListener(){

                    @Override
                    public  void onClick(View view){


                            Intent intent = new Intent(OutstandingPayment.this,PaymentActivity.class);

                        String strDollar = split[5].toString().replaceAll("\"","");
                        String transactionId = split[7].toString().replaceAll("\"","");
                        intent.putExtra("txtPrice",split[1]);
                        intent.putExtra("txtSenderFname",split[3]);
                        intent.putExtra("txtSenderSurname",split[3]);
                        intent.putExtra("txtSenderMobile","");
                        intent.putExtra("txtEmail",split[4]);
                        intent.putExtra("transaction_Id",split[7]);
                        intent.putExtra("txtUserId",split[6]);
                        intent.putExtra("txtDollar",strDollar);
                        intent.putExtra("txtPaymentType","2");
                        //intent.putExtra("txtDollar",strDollar);
                        intent.putExtra("txtUser_Id",userId);

                            startActivity(intent);
                            finish();



                    }



                }) ;

                /* end of clickable rows */








                if(ctr==0){

                    // address_list.add("Select");
                }
                //address_list.add(split[0]+"-"+split[2]);

                //address_list2.add(obj.getString("address"));
                //address_list2.add(split[0]+" "+split[2] +" "+split[1]+" "+split[3]);

                // Log.e("Address: ", $heroes[i].toString());

                //Log.e("Level ","Level  ********************* " +ctr);


                ctr++;

            }
//setContentView(tableLayout);
            String counters ;
            counters  = String.valueOf(ctr);

            //callBroadcast();
            if(ctr ==1)
            {
               // Toast.makeText(OutstandingPayment.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
                ctr=0;
            }
/*
        ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, $heroes);
        dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerLGA.setAdapter(dataAdapter);

 */

        }catch(NullPointerException e){
            e.printStackTrace();
        }catch(IndexOutOfBoundsException e){
            e.printStackTrace();
        }catch(Exception e){
            e.printStackTrace();
        }


    }




}