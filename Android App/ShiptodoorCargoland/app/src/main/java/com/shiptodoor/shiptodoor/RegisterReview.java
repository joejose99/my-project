package com.shiptodoor.shiptodoor;

import android.content.ContentValues;
import android.content.Intent;
import android.graphics.Color;
import android.os.Bundle;

import com.google.android.material.floatingactionbutton.FloatingActionButton;
import com.google.android.material.snackbar.Snackbar;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import android.view.View;
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
import android.widget.RadioButton;
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

import androidx.core.app.ActivityCompat;
import androidx.core.content.ContextCompat;


import android.widget.TextView;
import android.widget.ProgressBar;
import android.widget.ListView;


public class RegisterReview extends AppCompatActivity {

    private String finalResult, rst, result;

    private static final int MY_PERMISSIONS_REQUEST_ACCOUNTS = 1;
    private static final int MY_PERMISSIONS_REQUEST_CAMERA = 1;
    private static final int MY_PERMISSIONS_REQUEST_State = 1;

    ProgressDialog progressDialog;

    Context context;
    Intent intent;

    String HttpURL="https://www.cargoland.shiptodoor.com/cargoland/registration.php";

    private Button butAddress = null;
    private Button butBack = null;
    private Button btn_rev_kg = null;
    private Button btn_rev_price = null;
    private Button btn_rev_pickup = null;


    private Toolbar  mTopToolbar;

    private String txtFname="";
    private String txtSurname="";
    private String txtGender="";
    private String txtEmail="";
    private String txtPassword;
    private String txtAddress;
    private String txtCity;
    private String txtPostCode;
    private String txtCountry;
    private String txtMobile;
    private  String txtTitle;
    private int txtselected_Id;

    private ArrayList<String> country_list = new ArrayList<>();
    private int genderLenth;

    private int txtselected_country_Id;

    private String txtSenderState;
    private String txtSenderlga;

    private int lga_id ;
    private int state_id ;

    private String user_id;
    private int selected_Id= 0;

    private  String  txtDecision;
    private  int  intDecision_id=0;

    HttpParse httpParse = new HttpParse();
    String IMEI_Number_Holder;
    TelephonyManager telephonyManager;

    DBHelper  mydb = new DBHelper(this);
    private  String txt1, txt2, txt3, txt4, txt5,txt6, txt7, txt8;
    ArrayAdapter adapter;
    EditText ed1, ed2, ed3, ed4, ed5, ed6,ed7,ed8;
    private Boolean CheckEditText;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        try{


        setContentView(R.layout.activity_register_review);
        Toolbar toolbar = findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);


            Window window = getWindow();

            /* Change status bar background color to white */
            window.clearFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN);

            window.addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS);

            int colorCodeLight = Color.parseColor("#ffffff");
            window.setStatusBarColor(colorCodeLight);


        butAddress = findViewById(R.id.butReg);

        butBack = findViewById(R.id.button2);

        btn_rev_kg = findViewById(R.id.btn_rev_kg);

        btn_rev_price = findViewById(R.id.btn_rev_price);
        btn_rev_pickup = findViewById(R.id.btn_rev_pickup);




        getSupportActionBar().setDisplayShowHomeEnabled(true);
        //getSupportActionBar().setLogo(R.drawable.logo5);
        getSupportActionBar().setDisplayUseLogoEnabled(true);
        getSupportActionBar().setTitle("   Sign up");

        mTopToolbar=(Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(mTopToolbar);

        HttpParse httpParse = new HttpParse();
        Intent intent = getIntent();
        txtFname = intent.getStringExtra("txtFname");
        txtSurname = intent.getStringExtra("txtSurname");
        txtGender = intent.getStringExtra("txtGender");
        txtEmail = intent.getStringExtra("txtEmail");
        txtPassword = intent.getStringExtra("txtPassword");

        txtAddress = intent.getStringExtra("txtAddress");
        txtCity = intent.getStringExtra("txtCity");
        txtPostCode = intent.getStringExtra("txtPostCode");
        txtMobile = intent.getStringExtra("txtMobile");
        txtCountry = intent.getStringExtra("txtCountry");

        genderLenth = intent.getIntExtra("genderLenth",0);
        txtTitle = intent.getStringExtra("txtTitle");


        txtselected_Id = intent.getIntExtra("txtselected_Id",0);
        txtselected_country_Id = intent.getIntExtra("txtselected_country_Id",0);

        txtSenderlga  =intent.getStringExtra("txtSenderlga");
        txtSenderState=intent.getStringExtra("txtSenderState");





        country_list = (ArrayList<String>) getIntent().getSerializableExtra("key");

        lga_id = intent.getIntExtra("lga_id",0);
        state_id = intent.getIntExtra("state_id",0);



        btn_rev_kg.setText("\n** Name (edit) ** \n \n Title: " + txtTitle +" \n First Name: " + txtFname +" \n Surname: "+ txtSurname +" \n Gender: "+txtGender+"\n " );

        btn_rev_price.setText("\n** Email (edit) **  \n \n Email: "  + txtEmail );

        if(txtCountry.trim().equals("Nigeria")){

            btn_rev_pickup.setText("\n** Address (edit) **  \n  \n City/Town: "+ txtCity +"  \n Postcode: "+ txtPostCode +" \n Country: "+ txtCountry  + "\n State: "+ txtSenderState  +"\n LGA: "+ txtSenderlga  +"\n Mobile No: "+ txtMobile +" \n St Address:  "+ txtAddress+"\n ");

        }else{
            btn_rev_pickup.setText("\n** Address (edit) **  \n  \n City/Town: "+ txtCity +"  \n Postcode: "+ txtPostCode +" \n Country: "+ txtCountry  +" \n Mobile No: "+ txtMobile +" \n St Address:  "+ txtAddress +"\n ");

        }


        //"** Name (edit) ** \n \n First Name: \n Surname: \n Gender: \n

        butBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Log.d(TAG, "Subscribing to weather topic");
                try{
                Intent intent = new Intent(RegisterReview.this,AddressActivity.class);

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

        butAddress.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {


                /*
                Intent intent = new Intent(RegisterReview.this,ThankYouActivity.class);
                startActivity(intent);


                finish(); */

                ImageUploadToServerFunction();


            }
        });


        btn_rev_price.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Log.d(TAG, "Subscribing to weather topic");

                try{
                Intent intent = new Intent(RegisterReview.this,EmailActivity.class);


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


        btn_rev_pickup.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Log.d(TAG, "Subscribing to weather topic");
                try{
                Intent intent = new Intent(RegisterReview.this,AddressActivity.class);

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


        btn_rev_kg.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Log.d(TAG, "Subscribing to weather topic");

try{
                // Toast.makeText(RegisterReview.this, "Name: ."+ txtFname +" "+txtSurname, Toast.LENGTH_LONG).show();


                Intent intent = new Intent(RegisterReview.this,Name.class);

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


        ImeiNo();


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


    @SuppressLint({"MissingPermission", "HardwareIds"})
    public void ImeiNo()
    {
        // if(checkAndRequestPermissions()){
        if (ActivityCompat.checkSelfPermission(this, android.Manifest.permission.READ_PHONE_STATE) == PackageManager.PERMISSION_GRANTED) {


            telephonyManager = (TelephonyManager) this.getSystemService(Context.TELEPHONY_SERVICE);
            IMEI_Number_Holder = telephonyManager.getDeviceId();
        }

    }




    public void ImageUploadToServerFunction(){



        class AsyncTaskUploadClass extends AsyncTask<Void,Void,String> {

            @Override
            protected void onPreExecute() {
                super.onPreExecute();

                // Showing progress dialog at image upload time.
                progressDialog = ProgressDialog.show(RegisterReview.this,"Saving Data", "Please wait...",false,false);


            }

            @Override
            protected void onPostExecute(String string1) {

                super.onPostExecute(string1);

                // Dismiss the progress dialog after done uploading.
                progressDialog.dismiss();

                //Toast.makeText(Registration.this,string1,Toast.LENGTH_LONG).show();

                // Toast.makeText(RegisterReview.this,string1,Toast.LENGTH_LONG).show();




                mydb.deleteAll_users();


                String str2 ="\"Success\"";
                if(mydb.insert_users(txtTitle,txtFname,txtSurname, txtEmail , txtMobile,txtAddress ,txtCity, txtPostCode,txtCountry,txtSenderState,txtSenderlga )){

                    // Toast.makeText(getApplicationContext(), "Data Saved", Toast.LENGTH_SHORT).show();
                    Log.e("Successful: ",string1.toString());


                }


                if(string1.trim().equalsIgnoreCase(str2)){

                    // mydb.deleteAll_users();




                    Log.e("Successful: ",string1.toString());
                    String str= str2.replace("\"","\"");


                    // Toast.makeText(RegisterReview.this,"Success",Toast.LENGTH_LONG).show();

                    //mobileNo=ed3.getText().toString();







                    Intent intent = new Intent(RegisterReview.this,ThankYouActivity.class);
                    //intent.putExtra("mobile",ed3.getText().toString());
                    //intent.putExtra("user_id",user_id);
                    startActivity(intent);


                    finish();

                }

                else{
                    Toast.makeText(RegisterReview.this,"Something Went Wrong ",Toast.LENGTH_LONG).show();
                }
            }

            @Override
            protected String doInBackground(Void... params) {

                try{

/*
                        location = new MainActivity();

                        string address = location.getAddress();
                        string city = location.getCity();
                        string state = location.getState();*/








                    Date date = new Date();
                    SimpleDateFormat  formatter = new SimpleDateFormat("dd-MM-yyyy HH:mm:ss");


                    String strDate = formatter.format(date);

                    //MEIHolder = deviceUniqueIdentifier.toString();
                    Log.e("Upload starts here","9th");
                    JSONObject postDataParams = new JSONObject();









                    postDataParams.put("IMEI", IMEI_Number_Holder);

                    postDataParams.put("email", txtEmail);
                    postDataParams.put("fname", txtFname);
                    postDataParams.put("strDate", strDate);
                    postDataParams.put("surname", txtSurname);
                    postDataParams.put("gender", txtGender);
                    postDataParams.put("password", txtPassword);
                    postDataParams.put("address", txtAddress);
                    postDataParams.put("city", txtCity);
                    postDataParams.put("postcode", txtPostCode);
                    postDataParams.put("mobile", txtMobile);
                    postDataParams.put("country", txtCountry);
                    postDataParams.put("title", txtTitle);
                    postDataParams.put("state", txtSenderState);
                    postDataParams.put("lga", txtSenderlga);


                    Log.e("params Data: ",postDataParams.toString());


                    result = httpParse.postRequest(postDataParams, HttpURL );

                    Log.e("params: ",result.toString());

                } catch (Exception e) {
                    e.printStackTrace();
                }
                return  result;

            }
        }


        AsyncTaskUploadClass AsyncTaskUploadClassOBJ = new AsyncTaskUploadClass();

        AsyncTaskUploadClassOBJ.execute();






    }




    private boolean checkAndRequestPermissions() {


        int loc = ContextCompat.checkSelfPermission(this, Manifest.permission.ACCESS_COARSE_LOCATION);

        int loc2 = ContextCompat.checkSelfPermission(this,Manifest.permission.ACCESS_FINE_LOCATION);

        int loc3 = ContextCompat.checkSelfPermission(this, Manifest.permission.READ_PHONE_STATE);

        int internet = ContextCompat.checkSelfPermission(this,Manifest.permission.INTERNET);


        List<String> listPermissionsNeeded = new ArrayList<>();


        if (loc != PackageManager.PERMISSION_GRANTED) {
            listPermissionsNeeded.add(Manifest.permission.ACCESS_COARSE_LOCATION);
        }
        if (loc2 != PackageManager.PERMISSION_GRANTED) {
            listPermissionsNeeded.add(Manifest.permission.ACCESS_FINE_LOCATION);


        }
        if (loc3 != PackageManager.PERMISSION_GRANTED) {
            listPermissionsNeeded.add(Manifest.permission.READ_PHONE_STATE);


        }

        if (internet != PackageManager.PERMISSION_GRANTED) {
            listPermissionsNeeded.add(Manifest.permission.INTERNET);
        }

        if (!listPermissionsNeeded.isEmpty()) {
            ActivityCompat.requestPermissions(this,


                    listPermissionsNeeded.toArray(new String[listPermissionsNeeded.size()]), MY_PERMISSIONS_REQUEST_CAMERA);
            return false;
        }

        return true;
    }

}