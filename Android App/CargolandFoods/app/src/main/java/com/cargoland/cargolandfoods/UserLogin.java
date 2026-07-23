package com.cargoland.cargolandfoods;



import android.app.NotificationChannel;
import android.app.NotificationManager;
import android.graphics.Color;
import android.graphics.Rect;
import android.graphics.drawable.Drawable;
import android.os.Bundle;



import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import android.view.MotionEvent;
import android.view.View;

import android.content.Intent;
import android.view.Window;
import android.view.WindowManager;
import android.widget.Button;


import android.app.ProgressDialog;


import androidx.annotation.NonNull;


import android.annotation.SuppressLint;


import java.util.Locale;
import java.text.*;
import java.util.Date;

import android.telephony.TelephonyManager;

import android.content.Context;

import android.content.pm.PackageManager;


import android.app.Activity;
import android.Manifest;

import android.widget.Toast;
import android.view.inputmethod.InputMethodManager;


import android.util.Log;


import android.os.AsyncTask;
import android.widget.EditText;

import org.json.JSONObject;


import java.util.ArrayList;
import java.util.List;

import java.io.IOException;
import java.util.Objects;


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


import android.text.TextUtils;
import android.os.Build;


//import android.support.v7.app.AppCompatActivity;


//import java.net.HttpURLConnction;
import android.graphics.Bitmap;


import org.json.JSONArray;
import org.json.JSONException;

//import java.net.URL;


//import android.support.v4.app.ActivityCompat;

//import android.support.annotation.NonNull;
//import android.support.annotation.NonNull;
//import androidx.support.annotation.RequiresApi;


//import android.support.v4.content.FileProvider;
//import android.support.v4.content.ContextCompat;
//import android.support.v4.app.ActivityCompat;

import androidx.annotation.RequiresApi;
import androidx.core.app.ActivityCompat;


import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.messaging.FirebaseMessaging;
import com.squareup.picasso.Picasso;
import com.squareup.picasso.Target;


public class UserLogin extends AppCompatActivity {

    private String tokenNo;
    private Button butLogin = null;
    private Toolbar  mTopToolbar;
    private Button butBack = null;

    private Button butFog = null;

    String UserNameHolder, LoginPasswordHolder, IMEIHolder, MessageResp;
    Boolean CheckEditText ;
    ProgressDialog progressDialog;
    String finalResult ,rst;

    String MobileNo =null;

    private String Qrimage;

    private Bitmap bmp;


    private double latitude_s;
    private double longitude_s;

    private String subCity,nearCity;
    private static final int MY_PERMISSIONS_REQUEST_CAMERA = 1;

    private String cityName=null;
    private String subThroughFare=null;
    private String neighborhood=null;
    private String premise =null;
    private String streetAddress=null;
    private String longitudes;
    private String latitudes;

    private String street_Address;

    private String mobileNo;

    private String imageweb =null;

    //DBHelper  mydb;
    DBHelper  mydb = new DBHelper(this);

    Bitmap bitmaps;

    private String[] appPermissions={
            Manifest.permission.CAMERA,
            Manifest.permission.WRITE_EXTERNAL_STORAGE,
            Manifest.permission.BLUETOOTH,
            Manifest.permission.BLUETOOTH_ADMIN,
            Manifest.permission.INTERNET,
            Manifest.permission.READ_PHONE_STATE,
            Manifest.permission.READ_PHONE_NUMBERS,
            Manifest.permission.READ_EXTERNAL_STORAGE,
            Manifest.permission.ACCESS_COARSE_LOCATION,
            Manifest.permission.ACCESS_FINE_LOCATION,
            Manifest.permission.WAKE_LOCK,
            Manifest.permission.ACCESS_WIFI_STATE,
            Manifest.permission.READ_EXTERNAL_STORAGE,
            Manifest.permission.ACCESS_FINE_LOCATION,
            Manifest.permission.VIBRATE,
            Manifest.permission.ACTIVITY_RECOGNITION
    };

    private LocationManager locationManager=null;
    private LocationListener locationListener=null;

    //String HttpURL = "https://eciesl.com/exam/appLogin";
    //String HttpURL="https://www.admin.lfcasaba.org/login-app-foods";
    String HttpURL="https://www.cargoland.shiptodoor.com/login-app-foods";

    //String HttpURL = "http://www.dealsforyourtrip.com/app/index.php";
    String HttpURL_Advert="https://admin.lfcasaba.org/splash";

    //HashMap<String,String> hashMap = new HashMap();

    //HashMap<String,String> hashMap = new HashMap<>();



    HttpParse httpParse = new HttpParse();

    HttpGetImage httpGetImage = new HttpGetImage();




    public static final String UserEmail = "";

    String deviceUniqueIdentifier = null;

    String IMEI=deviceUniqueIdentifier;
    // JSON Node names
    private static final String TAG_SUCCESS = "success";
    private static final int MY_PERMISSIONS_REQUEST_READ_PHONE_STATE = 0;

    private static final int MY_PERMISSIONS_REQUEST_ACCOUNTS = 1;

    Button b1,b2,b3 ,butReg;
    EditText ed1,ed2,UserName,Password;
    Context context;
    TextView tx1;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_user_login);
        //Toolbar toolbar = findViewById(R.id.toolbar);
        // setSupportActionBar(toolbar);
        checkAndRequestPermissions();

        butBack = findViewById(R.id.button2);
        butLogin = findViewById(R.id.button);
        butReg = findViewById(R.id.butReg);


        butFog = findViewById(R.id.butFog);
        getToken_subscrib();
        Window window = getWindow();



        /* Reset status bar color to the default */
        window.clearFlags(View.SYSTEM_UI_FLAG_LIGHT_STATUS_BAR);
        View view =getWindow().getDecorView() ;
        view.setSystemUiVisibility(0);

        /* changing status bar background color */
        window.clearFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN);

        window.addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS);

        int colorCodeLight =Color.parseColor("#000000");
        window.setStatusBarColor(colorCodeLight);


        //window.setStatusBarColor(ContextCompat.getColor(this,R.color.colorMenu));

        /*
        getSupportActionBar().setDisplayShowHomeEnabled(true);
        //getSupportActionBar().setLogo(R.drawable.logo5);
        getSupportActionBar().setDisplayUseLogoEnabled(true);
        getSupportActionBar().setTitle("  Login   ");

        mTopToolbar=(Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(mTopToolbar);
*/

        ed1 = (EditText)findViewById(R.id.txtName);
        ed2 = (EditText)findViewById(R.id.txtPassword);

        UserName = (EditText)findViewById(R.id.txtName);
        Password = (EditText)findViewById(R.id.txtPassword);

        locationManager = (LocationManager)
                getSystemService(Context.LOCATION_SERVICE);
        //loadIMEI();

        // getDeviceIMEI();

        if(checkAndRequestPermissions()){
            getDeviceIMEI();
        }


        mydb= new DBHelper(this);

        getLocations();


        butFog.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Log.d(TAG, "Subscribing to weather topic");
                Intent intent = new Intent(UserLogin.this,ForgottenEmail.class);
                startActivity(intent);
                finish();
            }
        });

        butBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Log.d(TAG, "Subscribing to weather topic");
                Intent intent = new Intent(UserLogin.this,MainActivity.class);
                startActivity(intent);
                finish();
            }
        });

        butLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                try{
                    // Log.d(TAG, "Subscribing to weather topic");
                    //Intent intent = new Intent(UserLogin.this,MenuActivity.class);
                    //startActivity(intent);


                    //finish();

                    ed1.clearFocus();
                    ed2.clearFocus();
                    CheckEditTextIsEmptyOrNot();

                    if(CheckEditText){

                        getLocations();
/*
                    if(latitude_s == 0)
                    {
                        Toast.makeText(UserLogin.this,"Please Enable Location",Toast.LENGTH_LONG).show();

                    }

                    if(latitude_s > 0)
                    {
                        UserLoginPage(UserNameHolder,LoginPasswordHolder,IMEIHolder);
                    }


 */
                        UserLoginPage(UserNameHolder,LoginPasswordHolder,IMEIHolder);

                    }
                    else {

                        // If EditText is empty then this block will execute .
                        Toast.makeText(UserLogin.this, "Please fill all form fields.", Toast.LENGTH_LONG).show();

                    }


                }catch(IndexOutOfBoundsException e){
                    e.printStackTrace();
                }
                catch(Exception e){
                    e.printStackTrace();
                }
            }


        });



        butReg.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Log.d(TAG, "Subscribing to weather topic");
                Intent intent = new Intent(UserLogin.this,name.class);
                startActivity(intent);


                finish();


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




        // GetImage("cargoland", "imei") ;




        if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.O) {
            // Create channel to show notifications.
            String channelId  = getString(R.string.default_notification_channel_id);
            String channelName = getString(R.string.default_notification_channel_name);
            NotificationManager notificationManager =(NotificationManager)
                    getSystemService(NotificationManager.class);
            notificationManager.createNotificationChannel(new NotificationChannel(channelId,
                    channelName, NotificationManager.IMPORTANCE_LOW));
        }


    }



    protected void onSaveInstanceState(Bundle outState) {
        super.onSaveInstanceState(outState);


        //outState.putParcelable("file_uri", uri);
    }

    @Override
    protected void onRestoreInstanceState(Bundle savedInstanceState) {
        super.onRestoreInstanceState(savedInstanceState);

        if(savedInstanceState != null)
        {
            // get the file url
            // uri = savedInstanceState.getParcelable("file_uri");

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

    /*----Method to Check GPS is enable or disable ----- */
    private Boolean displayGpsStatus() {
        ContentResolver contentResolver = getBaseContext()
                .getContentResolver();
        boolean gpsStatus = Settings.Secure
                .isLocationProviderEnabled(contentResolver,
                        LocationManager.GPS_PROVIDER);
        if (gpsStatus) {
            return true;

        } else {
            return false;
        }
    }

    /*----------Method to create an AlertBox ------------- */
    protected void alertbox(String title, String mymessage) {
        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        builder.setMessage("Your Device's GPS is Disable")
                .setCancelable(false)
                .setTitle("** Gps Status **")
                .setPositiveButton("Gps On",
                        new DialogInterface.OnClickListener() {
                            public void onClick(DialogInterface dialog, int id) {
                                // finish the current activity
                                // AlertBoxAdvance.this.finish();
                                Intent myIntent = new Intent(
                                        Settings.ACTION_SECURITY_SETTINGS);
                                startActivity(myIntent);
                                dialog.cancel();
                            }
                        })
                .setNegativeButton("Cancel",
                        new DialogInterface.OnClickListener() {
                            public void onClick(DialogInterface dialog, int id) {
                                // cancel the dialog box
                                dialog.cancel();
                            }
                        });
        AlertDialog alert = builder.create();
        alert.show();
    }








    /*CALLING METHOD THAT HELP TO HIDE KEYBOARD  WHEN TOUCH BODY */
    public void hideKeyboard(View view) {
        InputMethodManager inputMethodManager =(InputMethodManager)getSystemService(Activity.INPUT_METHOD_SERVICE);
        inputMethodManager.hideSoftInputFromWindow(view.getWindowToken(), 0);


    }


    private boolean checkAndRequestPermissions() {

        try{

            List<String> listPermissionsNeeded = new ArrayList<>();


            for(String perm:appPermissions)
            {

                if(ContextCompat.checkSelfPermission(this,perm) != PackageManager.PERMISSION_GRANTED)

                {
                    listPermissionsNeeded.add(perm);

                }
            }


            if (!listPermissionsNeeded.isEmpty()) {

                ActivityCompat.requestPermissions(this,


                        listPermissionsNeeded.toArray(new String[listPermissionsNeeded.size()]), MY_PERMISSIONS_REQUEST_CAMERA);


                // requestPermissions(new String[] {Manifest.permission.CAMERA},MY_PERMISSIONS_REQUEST_CAMERA);


                return false;
            }





        }catch (Exception e){
            e.printStackTrace();
        }

        return true;
    }


/*
    private boolean checkAndRequestPermissions() {


        int loc = ContextCompat.checkSelfPermission(this,


                Manifest.permission.ACCESS_COARSE_LOCATION);

int loc3 = ContextCompat.checkSelfPermission(this,


                Manifest.permission.READ_PHONE_STATE);



        int loc2 = ContextCompat.checkSelfPermission(this,


                Manifest.permission.ACCESS_FINE_LOCATION);
        int internet = ContextCompat.checkSelfPermission(this,
                Manifest.permission.INTERNET);


        List<String> listPermissionsNeeded = new ArrayList<>();



        if (loc != PackageManager.PERMISSION_GRANTED) {
            listPermissionsNeeded.add(Manifest.permission.ACCESS_COARSE_LOCATION);
        }

        if (loc3 != PackageManager.PERMISSION_GRANTED) {
            listPermissionsNeeded.add(Manifest.permission.READ_PHONE_STATE);
        }

        if (loc2 != PackageManager.PERMISSION_GRANTED) {
            listPermissionsNeeded.add(Manifest.permission.ACCESS_FINE_LOCATION);


        }

        if (internet != PackageManager.PERMISSION_GRANTED) {
            listPermissionsNeeded.add(Manifest.permission.INTERNET);
        }


        if (!listPermissionsNeeded.isEmpty()) {
            ActivityCompat.requestPermissions(this,

                    listPermissionsNeeded.toArray(new String[listPermissionsNeeded.size()]), MY_PERMISSIONS_REQUEST_ACCOUNTS);

            return false;
        }

        return true;
    }



 */






/*

    @SuppressLint("MissingPermission")
    @Override
    @RequiresApi(api = Build.VERSION_CODES.Q)

    public void onRequestPermissionsResult(int requestCode, @NonNull String[] permissions,@NonNull int[] grantResults) {

        if (requestCode == MY_PERMISSIONS_REQUEST_READ_PHONE_STATE) {

            if (grantResults.length == 1 && grantResults[0] == PackageManager.PERMISSION_GRANTED) {

//                Toast.makeText(this,"Alredy DONE",Toast.LENGTH_SHORT).show();

                TelephonyManager mngr = (TelephonyManager)getSystemService(Context.TELEPHONY_SERVICE);
                //deviceUniqueIdentifier = mngr.getDeviceId();

                if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.O) {
                    deviceUniqueIdentifier = mngr.getImei();
                } else {
                    deviceUniqueIdentifier = mngr.getDeviceId();
                }
				/*
				device_unique_id = Settings.Secure.getString(this.getContentResolver(),Settings.Secure.ANDROID_ID);
				textView.setText(device_unique_id+"----"+mngr.getDeviceId()); */
/*
            } else {
                Toast.makeText(this,"ehgehfg",Toast.LENGTH_SHORT).show();
            }
        }
    }


 */



    @SuppressLint("MissingPermission")
    public String getDeviceIMEI() {

        String deviceUniqueIdentifier = null;
        Context context = null;
        try{
            //if(checkAndRequestPermissions()){


            if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.Q)
            {
                //Log.i("level","Im In for SDK Version");

                deviceUniqueIdentifier =  Settings.Secure.getString(getBaseContext().getContentResolver(), Settings.Secure.ANDROID_ID);

                //Log.e("device Id","******** Device Id******* "+deviceUniqueIdentifier);
                return deviceUniqueIdentifier;
                // deviceUniqueIdentifier =UUID.randomUUID().toString();
                //Log.e("device Id","******** Device Id******* "+deviceUniqueIdentifier);

            }else{
                // Log.i("IMei","IMEI Device**************");
                TelephonyManager tm = (TelephonyManager) this.getSystemService(Context.TELEPHONY_SERVICE);
                if (null != tm) {
                    deviceUniqueIdentifier = tm.getDeviceId();
                }
                if (null == deviceUniqueIdentifier || 0 == deviceUniqueIdentifier.length()) {
                    return deviceUniqueIdentifier = Settings.Secure.getString(this.getContentResolver(), Settings.Secure.ANDROID_ID);
                }
                // Log.i("IMei","IMEI Device**************" +deviceUniqueIdentifier);
                return deviceUniqueIdentifier;
            }
        }catch(NullPointerException e){
            e.printStackTrace();
        }
        return deviceUniqueIdentifier;

    }







    @SuppressLint("MissingPermission")
    private void getLocations()
    {

        if (checkAndRequestPermissions()) {

            locationListener = new UserLogin.MyLocationListener();

            int loc = ContextCompat.checkSelfPermission(this, Manifest.permission.ACCESS_COARSE_LOCATION);

            int loc2 = ContextCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION);


            locationManager.requestLocationUpdates(LocationManager.GPS_PROVIDER, 5000, 10, locationListener);
            //locationManager.requestLocationUpdates(LocationManager.NETWORK_PROVIDER, 5000, 10, locationListener);


            //locationManager.removeUpdates(locationListener, PhoneStateListener.LISTEN_NONE);

        }

    }




    public void UserLoginPage(final String UserName, final String Password, final String IMEI){

        class LoginClass extends AsyncTask<String,Void,String> {

            @Override
            protected void onPreExecute() {
                super.onPreExecute();

/*
                if(latitude_s>0) {
                    locationManager.removeUpdates(locationListener);
                    locationManager = null;
                }*/
                // progressDialog = ProgressDialog.show(LoginUsers.this,"Login ....",null,true,true);
                progressDialog =ProgressDialog.show(UserLogin.this,"Login", "Please wait...",false,false);
                //progressDialog = ProgressDialog.show(UserReg.this,"Sending ....",null,true,true);
            }

            @Override
            protected void onPostExecute(String httpResponseMsg) {
                try{
                    super.onPostExecute(httpResponseMsg);

                    progressDialog.dismiss();
                    Log.e("line ",httpResponseMsg.toString());

                    // Toast.makeText(UserLogin.this,httpResponseMsg.toString(), Toast.LENGTH_LONG).show();

                    // MessageResp = httpResponseMsg.replaceAll("^\"|\"$", "");
                    String[] strsplit=httpResponseMsg.split("_");
                    httpResponseMsg =strsplit[0];

                    MessageResp = httpResponseMsg.toString().replaceAll("\"","");

                    String userid = strsplit[16].toString().replaceAll("\"","");

                    String referrals = strsplit[17].toString().replaceAll("\"","");
                    httpResponseMsg=MessageResp;

                    if(httpResponseMsg.trim().equalsIgnoreCase("Success")){

                        UserNameHolder = ed1.getText().toString();
                        LoginPasswordHolder = ed2.getText().toString();

                        // Log.w("myApp", "no networks");
                        mydb = new DBHelper(getBaseContext());

                        mydb.deleteAll_loginusers();
                        mydb.insert_loginusers(UserNameHolder,userid);


                        mydb.deleteAll_users();


                        String str2 ="\"Success\"";
/*,strsplit[10],strsplit[11],strsplit[12]
this are member_status,bus_stop,birthday,profession and church_unit
 */
                         
                        if(mydb.insert_users(strsplit[1],strsplit[2],strsplit[3], strsplit[4] , strsplit[5],strsplit[6] ,strsplit[7], strsplit[8],strsplit[9],strsplit[10],strsplit[11],strsplit[12],strsplit[13],strsplit[14],strsplit[15],referrals )){

                            // Toast.makeText(getApplicationContext(), "Data Saved", Toast.LENGTH_SHORT).show();
                            Log.e("Successful: ",strsplit[1].toString());


                        }



                        Intent intent = new Intent(UserLogin.this,MenuActivity.class);

                        intent.putExtra("image",imageweb);
                        intent.putExtra("bitmap",bitmaps);
                        startActivity(intent);


                        finish();
                    }




                    else{

                        Toast.makeText(UserLogin.this,httpResponseMsg,Toast.LENGTH_LONG).show();
                        // Log.w("myApp", "no networks");

                        Log.w("Message", httpResponseMsg);

                    }
                }catch(IndexOutOfBoundsException e){
                    e.printStackTrace();
                }
 catch(NullPointerException e){
                e.printStackTrace();
            }
                catch(Exception e){
                    e.printStackTrace();
                }



            }

            @Override
            protected String doInBackground(String... params) {

                try {

	            	 /*
	            	hashMap.put("UserName",params[0]);

	                hashMap.put("Password",params[1]);

	                hashMap.put("IMEI",params[2]);

	               */

                    Date date = new Date();
                    SimpleDateFormat  formatter = new SimpleDateFormat("dd-MM-yyyy HH:mm:ss");


                    String strDate = formatter.format(date);

                    JSONObject postDataParams = new JSONObject();

                    // postDataParams.put("UserName", ed1.getText().toString());
                    //postDataParams.put("Password", ed2.getText().toString());
                    postDataParams.put("token", getToken());
                    postDataParams.put("UserName", params[0]);
                    postDataParams.put("password", params[1]);

                    MobileNo=params[0];


                    postDataParams.put("IMEI", getDeviceIMEI());

                    Log.i("Imei","Imei+++++++ "+getDeviceIMEI());


                    postDataParams.put("cityName", cityName);
                    postDataParams.put("subCity", subCity);
                    postDataParams.put("premise", premise);
                    postDataParams.put("subAdminArea", streetAddress) ;
                    postDataParams.put("street_Address",street_Address) ;

                    postDataParams.put("longitudes", longitude_s);
                    postDataParams.put("latitudes", latitude_s);
                    postDataParams.put("loginDate", strDate);
                    Log.e("Token",getToken());

                    Log.e("params",postDataParams.toString());

                    finalResult = httpParse.postRequest(postDataParams, HttpURL);


                } catch (Exception e) {
                    e.printStackTrace();
                }



                return finalResult;
            }
        }

        LoginClass logClass = new LoginClass();

        logClass.execute(UserName,Password,IMEI);
    }


    public void CheckEditTextIsEmptyOrNot(){



        // ed1.getText();

        // ed2.getText();

        UserNameHolder = ed1.getText().toString();
        LoginPasswordHolder = ed2.getText().toString();
        //IMEIHolder = deviceUniqueIdentifier.toString();

        if(TextUtils.isEmpty(UserNameHolder) || TextUtils.isEmpty(LoginPasswordHolder) )
        {

            CheckEditText = false;

        }
        else {

            CheckEditText = true ;
        }

    }




    /*----------Listener class to get coordinates ------------- */
    private class MyLocationListener implements LocationListener {
        @Override
        public void onLocationChanged(Location loc) {

            //editLocation.setText("");
            //pb.setVisibility(View.INVISIBLE);


            //Toast.makeText(getBaseContext(),"Location changed : Lat: " +
            //loc.getLatitude()+ " Lng: " + loc.getLongitude(),
            //Toast.LENGTH_SHORT).show();
            String longitude = "Longitude: " +loc.getLongitude();
            //Log.v(TAG, longitude);
            String latitude = "Latitude: " +loc.getLatitude();

            latitude_s=loc.getLatitude();
            longitude_s=loc.getLongitude();

            latitudes=latitude;
            longitudes=longitude;
            //Log.v(TAG, latitude);

            /*----------to get City-Name from coordinates ------------- */
            /*
            String cityName=null;
            String subThroughFare=null;
            String neighborhood=null;
            String premise =null;
            String streetAddress=null;*/

            Geocoder gcd = new Geocoder(getBaseContext(),
                    Locale.getDefault());



            List<Address>  addresses;
            try {
                addresses = gcd.getFromLocation(loc.getLatitude(), loc.getLongitude(), 1);




                if (addresses.size() > 0)
                    System.out.println(addresses.get(0).getLocality());
                cityName=addresses.get(0).getLocality();

                subCity =addresses.get(0).getSubLocality();
                nearCity =addresses.get(0).getAdminArea();

                subThroughFare =addresses.get(0).getSubThoroughfare();
                neighborhood =addresses.get(0).getFeatureName();
                premise =addresses.get(0).getPremises();
                streetAddress=addresses.get(0).getSubAdminArea();
                street_Address =addresses.get(0).getAddressLine(0);


            } catch (IOException e) {
                e.printStackTrace();
            }

            String s = longitude+"\n"+latitude +
                    "\n\nMy Currrent City is: "+cityName +"\n\nMy Sub City is: "+ subCity +"\n\nMy Near City is: "+nearCity
                    +"\n\nMy Sub Through Fare is: "+subThroughFare
                    +"\n\nMy Feature Name is: "+neighborhood
                    +"\n\nMy Premise is: "+premise
                    +"\n\nMy Sub Admin Area is: "+streetAddress;
            //editLocation.setText(s);

            //Toast.makeText(UserLogin.this,s,Toast.LENGTH_LONG).show();
        }

        @Override
        public void onProviderDisabled(String provider) {
            // TODO Auto-generated method stub


        }

        @Override
        public void onProviderEnabled(String provider) {
            // TODO Auto-generated method stub
        }

        @Override
        public void onStatusChanged(String provider,
                                    int status, Bundle extras) {
            // TODO Auto-generated method stub
        }
    }


    /******* GET IMAGE ADVERT ****************/


    public void GetImage(final String cargoland, final String IMEI){

        class LoginClass extends AsyncTask<String,Void,String> {

            @Override
            protected void onPreExecute() {
                super.onPreExecute();



                // progressDialog =ProgressDialog.show(UserLogin.this,"Login", "Please wait...",false,false);

            }

            @Override
            protected void onPostExecute(String httpResponseMsg) {
                try{
                    super.onPostExecute(httpResponseMsg);


                    Log.i("Image",httpResponseMsg);
                    loadIntoShipment(httpResponseMsg);




                }catch(IndexOutOfBoundsException e){
                    e.printStackTrace();
                }
                catch(Exception e){
                    e.printStackTrace();
                }



            }

            @Override
            protected String doInBackground(String... params) {

                try {



                    JSONObject postDataParams = new JSONObject();



                    //postDataParams.put("cagoland","cagoland");
                    //finalResult = httpGetImage.postRequest(postDataParams, HttpURL_Advert);
                    finalResult =  httpGetImage.postRequest(HttpURL_Advert);


                } catch (Exception e) {
                    e.printStackTrace();
                }



                return finalResult;
            }
        }

        LoginClass logClass = new LoginClass();

        logClass.execute(cargoland,IMEI);
    }



    /* loading image */


    private void loadIntoShipment(String json) throws JSONException {

        JSONArray jsonArray = new JSONArray(json);


        // String[] $heroes_category = new String[jsonArray.length()];

        int ctr =0;


        for (int i = 0; i < jsonArray.length(); i++) {
            JSONObject obj = jsonArray.getJSONObject(i);

            String img =obj.getString("link");
            imageweb=obj.getString("link");



            ctr++;

        }



        String counters ;
        counters  = String.valueOf(ctr);

        Log.e("Counters", counters.toString());

        if(ctr ==0)
        {
            Toast.makeText(UserLogin.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
            ctr=0;
        }






        Target target = new Target(){
            @Override
            public void onBitmapLoaded(Bitmap bitmap, Picasso.LoadedFrom from) {

            }

            @Override
            public void onBitmapFailed(Exception e, Drawable errorDrawable) {

            }

            @Override
            public void onPrepareLoad(Drawable placeHolderDrawable) {

            }


            public void OnBitmapLoaded(final Bitmap bitmap, Picasso.LoadedFrom from) {
                bitmaps=bitmap;
            }

        };


        Picasso.get().load(imageweb).into(target);


    }


    private  void getToken_subscrib(){

        try{





            FirebaseMessaging.getInstance().subscribeToTopic("Activity")
                    .addOnCompleteListener(new OnCompleteListener<Void>() {
                        @Override
                        public void onComplete(@NonNull Task<Void> task) {
                            String msg = getString(R.string.msg_subscribed);
                            if (!task.isSuccessful()) {
                                msg = getString(R.string.msg_subscribe_failed);
                            }
                            //Log.d(TAG, msg);
                            //Toast.makeText(UserLogin.this, msg, Toast.LENGTH_SHORT).show();
                        }
                    });


            getFirebaseMessagingToken();

        }
        catch(Error e){
            Log.e("","Error on Firebase Messaing Serivece "+Log.getStackTraceString(e));
        }
    }



    public void getFirebaseMessagingToken(){
        FirebaseMessaging.getInstance().getToken().addOnCompleteListener(task ->{
            if(!task.isSuccessful()){
                return;
            }
            if( null != task.getResult()){
                tokenNo= Objects.requireNonNull(task.getResult());

                setToken(tokenNo);
                Log.e("Token","******* Token No "+tokenNo);

            }
        });
    }

    private void setToken(String tok){
        tokenNo=tok;
    }

    private String getToken(){
        return tokenNo;
    }


}