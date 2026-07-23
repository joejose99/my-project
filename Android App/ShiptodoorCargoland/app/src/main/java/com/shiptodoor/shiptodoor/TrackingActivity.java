package com.shiptodoor.shiptodoor;


import android.graphics.Color;
import android.graphics.Rect;
import android.os.Bundle;



import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.view.menu.MenuBuilder;
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

import androidx.coordinatorlayout.widget.CoordinatorLayout;
import com.google.android.material.bottomnavigation.BottomNavigationView;

import com.shiptodoor.shiptodoor.helper.BottomNavigationBehavior;


import androidx.core.content.ContextCompat;


import android.widget.TextView;
import android.widget.ProgressBar;
import android.widget.ListView;

import android.widget.Toast;
import androidx.annotation.NonNull;



public class TrackingActivity extends AppCompatActivity {

    private Button butThank = null;
    Button butReg;

    ArrayAdapter adapter;
    EditText ed1, ed2, ed3,ed4, ed5, ed6,ed7,ed8;

    TextView txtview;
    TextView txtView;
    ListView lstview;
    //private String HttpURL = "https://www.cargoland.shiptodoor.com/cargoland/tracking.php";

    private String HttpURL = "https://cargoland.shiptodoor.com/track/tracking.php";



    private String txt1;

    private ArrayList<String> lga_list = new ArrayList<>();
    String finalResult, rst, result;
    private Toolbar  mTopToolbar;
    HttpParse httpParse = new HttpParse();
    Uri uri;
    ProgressDialog progressDialog;
    private ListView obj;
    private boolean CheckEditText ;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_tracking);
        Toolbar toolbar = findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);


        Window window = getWindow();

        /* Change status bar background color to white */
        window.clearFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN);

        window.addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS);

        int colorCodeLight = Color.parseColor("#ffffff");
        window.setStatusBarColor(colorCodeLight);

       // butThank = findViewById(R.id.button2);

        butReg = findViewById(R.id.butReg);
        lstview=(ListView) findViewById(R.id.messages_view);
        ed1 =(EditText) findViewById(R.id.txtTracking);

        getSupportActionBar().setDisplayShowHomeEnabled(true);
        //getSupportActionBar().setLogo(R.drawable.logo5);
        getSupportActionBar().setDisplayUseLogoEnabled(true);
        getSupportActionBar().setTitle("   Tracking");

        String $track =ed1.getText().toString();



        butReg.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Log.d(TAG, "Subscribing to weather topic");
                try{
                ValidateText();

                ed1.clearFocus();
                if(CheckEditText){
                    Log.e( "Line","line one");
                    PopulateLGA(txt1.toString());
                } else {
                    Toast.makeText(TrackingActivity.this, "Tracking No textField can not be Empty.", Toast.LENGTH_LONG).show();
                }
                }catch(NullPointerException e){
                    e.printStackTrace();
                }
            }
        });



/*

        butThank.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Log.d(TAG, "Subscribing to weather topic");
                Intent intent = new Intent(TrackingActivity.this,MenuActivity.class);
                startActivity(intent);


                finish();


            }
        });


 */


        BottomNavigationView navView = findViewById(R.id.nav_view);
        BottomNavigationView navigation = (BottomNavigationView) findViewById(R.id.nav_view);

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



        //BottomNavigationView navigation = (BottomNavigationView) findViewById(R.id.nav_view);
        BottomNavigationView bottomNavigationView = (BottomNavigationView) findViewById(R.id.nav_view);
       // bottomNavigationView.setOnNavigationItemSelectedListener(mOnNavigationItemSelectedListener);

        Log.i("level","Level 2B");













        bottomNavigationView.setOnNavigationItemSelectedListener(new BottomNavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem item) {
                switch (item.getItemId()) {
                    case R.id.navigation_home:
                        //Toast.makeText(MenuActivity.this, "Home", Toast.LENGTH_SHORT).show();
                        Intent intent = new Intent(TrackingActivity.this,MenuActivity.class);
                        startActivity(intent);
                        finish();
                        break;

                    case R.id.navigation_send:
                        //Toast.makeText(MenuActivity.this, "Send", Toast.LENGTH_SHORT).show();
                        Intent intent1 = new Intent(TrackingActivity.this,ParcelLetterActivity.class);
                        startActivity(intent1);
                        finish();
                        break;
                    case R.id.navigation_track:
                        //Toast.makeText(MenuActivity.this, "Tracking", Toast.LENGTH_SHORT).show();
                        Intent intent2 = new Intent(TrackingActivity.this,TrackingActivity.class);
                        startActivity(intent2);
                        finish();
                        break;
                    case R.id.navigation_help:
                        //Toast.makeText(MenuActivity.this, "Help", Toast.LENGTH_SHORT).show();
                       /*
                        Intent intent3 = new Intent(TrackingActivity.this,HelpActivity.class);
                        startActivity(intent3);

                        */
                        Intent  browserIntent  = new Intent(Intent.ACTION_VIEW, Uri.parse("https://tawk.to/chat/60b7cf63de99a4282a1b0bc0/1f77047de"));
                        startActivity(browserIntent);
                        finish();
                        break;

                    case R.id.navigation_logout:
                        Intent intent4 = new Intent(TrackingActivity.this,UserHistory.class);
                        startActivity(intent4);
                        finish();
                        //Toast.makeText(MenuActivity.this, "Log out", Toast.LENGTH_SHORT).show();
                        break;
                }
                return true;
            }
        });

// attaching bottom sheet behaviour - hide / show on scroll
        CoordinatorLayout.LayoutParams layoutParams = (CoordinatorLayout.LayoutParams) bottomNavigationView.getLayoutParams();
        layoutParams.setBehavior(new BottomNavigationBehavior());




        ed1.setOnFocusChangeListener(new View.OnFocusChangeListener() {
            @Override
            public void onFocusChange(View v, boolean hasFocus) {
                if (!hasFocus) {
                    hideKeyboard(v);
                }
            }
        });

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

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_live_chat) {
            // Toast.makeText(UserLogin.this, "Action clicked", Toast.LENGTH_LONG).show();
            //Intent intent = new Intent(MenuActivity.this,LiveChat.class);
          /*
            Intent  browserIntent  = new Intent(Intent.ACTION_VIEW, Uri.parse("https://tawk.to/chat/60b7cf63de99a4282a1b0bc0/1f77047de"));
            startActivity(browserIntent);

           */
            Intent intent3 = new Intent(TrackingActivity.this,HelpActivity.class);
            startActivity(intent3);



            finish();
            return true;

        }
        if (id == R.id.action_logout) {
            // Toast.makeText(UserLogin.this, "Action clicked", Toast.LENGTH_LONG).show();
            Intent intent = new Intent(TrackingActivity.this,UserLogin.class);
            startActivity(intent);


            finish();
            return true;

        }
        if (id == R.id.action_profile) {
            // Toast.makeText(UserLogin.this, "Action clicked", Toast.LENGTH_LONG).show();
            Intent intent = new Intent(TrackingActivity.this,UserProfile.class);
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







    /* POPULATING LGA */

    public void PopulateLGA(final String Spanner1 ){

        class LagClass extends AsyncTask<String,Void,String> {
            @Override
            protected void onPreExecute() {
                super.onPreExecute();

                 progressDialog = ProgressDialog.show(TrackingActivity.this,"Tracking","Loading details please wait ....",false,false);
            }

            @Override
            protected void onPostExecute(String httpResponseMsg) {

                super.onPostExecute(httpResponseMsg);

                String err ,err1;
                progressDialog.dismiss();


                try {


                String strMsg= String.valueOf(httpResponseMsg);
                    Log.e("params", "Second line".toString());
 Log.i("Tracking","Tracking No: "+httpResponseMsg.toString());
if(strMsg.equals("500")){
    Toast.makeText(TrackingActivity.this, "Sorry Item not available yet", Toast.LENGTH_SHORT).show();
    lstview.setAdapter(null);
    return;
}
//else{
    loadIntoPolUnit(httpResponseMsg);
//}


                    Log.e("params", "Third line".toString());





                } catch (JSONException e) {
                    e.printStackTrace();
                }









            }

            @Override
            protected String doInBackground(String... params) {

                try {



                    txt1= ed1.getText().toString();

                    JSONObject postDataParams = new JSONObject();


                    postDataParams.put("track_no", txt1);
                    postDataParams.put("cargoland", "cargoland");


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



    private void loadIntoPolUnit(String json) throws JSONException {

       // Log.e("params", json.toString());

        JSONArray jsonArray = new JSONArray(json);





        String[] heroes = new String[jsonArray.length()];

        int ctr =0;

        lga_list.clear();

        Log.e("Length",  String.valueOf(jsonArray.length()));

        Log.e("params", "Eight line".toString());
        for (int i = 0; i < jsonArray.length(); i++) {

            String names =jsonArray.getString(i);
            Log.i("Names", names);
            Log.e("params", "Nine line".toString());

            String[] split =names.split("@");


            lga_list.add(split[3] + System.lineSeparator()+ '\n'+split[0]+ System.lineSeparator()+ '\n'+split[1] + System.lineSeparator()+'\n'+split[2]);


             Log.i("tracking",split[0]+ System.lineSeparator()+split[1] + System.lineSeparator() +'\n'+ split[2]);
/*
            Log.i("tracking0", split[0]);
            Log.i("tracking1", split[1]);
            Log.i("tracking2", split[2]);
            Log.i("tracking3", split[3]);

 */

            ctr++;

        }

        String counters ;
        counters  = String.valueOf(ctr);

        Log.e("Counters", counters.toString());

        if(ctr ==0)
        {
            Toast.makeText(TrackingActivity.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
            ctr=0;
        }

         if(lga_list.size() != 0)
        {
            CustomAdapter customAdapter = new CustomAdapter(this, lga_list);
            Log.d("SQLITE Data: ",lga_list.toString());
            //setListAdapter(myAdapter);
            //myAdapter.notifyDataSetChanged();

            lstview.setAdapter(customAdapter);

            lstview.setSelection(0);
            lstview.smoothScrollToPosition(0);
        }



/*


        ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, $heroes);
        dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerLGA.setAdapter(dataAdapter);
*/
    }


    public void addItems(View v){
       // lstview.setAdapter(adapter);

        if(lga_list.size() != 0)
        {
            CustomAdapter customAdapter = new CustomAdapter(this, lga_list);
            Log.d("SQLITE Data: ",lga_list.toString());
            //setListAdapter(myAdapter);
            //myAdapter.notifyDataSetChanged();

            lstview.setAdapter(customAdapter);

        }
        adapter.notifyDataSetChanged();
    }









    public void ValidateText(){
        txt1 = ed1.getText().toString();

   if( TextUtils.isEmpty(txt1) )
        {

            CheckEditText = false;
            return;

        }
   else{
       CheckEditText =true;
   }

    }





}