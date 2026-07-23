package com.cargoland.cargolandfoods;

import android.content.Intent;
import android.database.Cursor;
import android.graphics.Color;
import android.os.Bundle;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.widget.Button;


import android.app.ProgressDialog;


import android.annotation.SuppressLint;


import java.text.*;
import java.util.Date;

import android.telephony.TelephonyManager;

import android.content.Context;

import android.content.pm.PackageManager;


import android.Manifest;

import android.widget.ArrayAdapter;

import android.widget.Toast;


import android.util.Log;


import android.os.AsyncTask;
import android.widget.EditText;

import org.json.JSONObject;


import java.util.ArrayList;
import java.util.List;
import java.util.Objects;


import androidx.core.app.ActivityCompat;
import androidx.core.content.ContextCompat;
import androidx.navigation.ui.AppBarConfiguration;

import com.cargoland.cargolandfoods.databinding.ActivityRegisterReviewBinding;
import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.messaging.FirebaseMessaging;

public class register_review  extends AppCompatActivity {

    private AppBarConfiguration appBarConfiguration;
    private ActivityRegisterReviewBinding binding;

    private String finalResult, rst, result;

    private String tokenNo =null;

    private static final int MY_PERMISSIONS_REQUEST_ACCOUNTS = 1;
    private static final int MY_PERMISSIONS_REQUEST_CAMERA = 1;
    private static final int MY_PERMISSIONS_REQUEST_State = 1;

    ProgressDialog progressDialog;

    Context context;
    Intent intent;

    //String HttpURL="https://www.cargoland.shiptodoor.com/cargoland/registration.php";
     private String HttpURL = "https://www.cargoland.shiptodoor.com/registration-foods";



    private Button butAddress = null;
    private Button butBack = null;
    private Button btn_rev_kg = null;
    private Button btn_rev_price = null;
    private Button btn_rev_pickup = null;
    private Button btn_others = null;



    private Toolbar mTopToolbar;

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

    private String txtProfession;
    private String txtBus_Stop;
    private int unit_id ;
    private String txtUnit;

    private String txtMember_status;

    private  String txtTitle;

    private String txtReferral;
    private int txtselected_Id;

    private ArrayList<String> country_list = new ArrayList<>();
    private ArrayList<String> lga_list = new ArrayList<>();
    private ArrayList<String> unit_list = new ArrayList<>();

    private int genderLenth;
    private String userId;
    private int txtselected_country_Id;
    private  int  churchStatus_length=0;
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
    private  String txt1, txt2, txt3, txt4, txt5,txt6, txt7, txt8,txt9;
    ArrayAdapter adapter;
    EditText ed1, ed2, ed3, ed4, ed5, ed6,ed7,ed8,ed9;
    private Boolean CheckEditText;

    private String txtBranch;
    private int branch_id=0;
    private ArrayList<String> branch_list = new ArrayList<>();


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        try{


            setContentView(R.layout.activity_register_review);
            //Toolbar toolbar = findViewById(R.id.toolbar);
            //setSupportActionBar(toolbar);


            Window window = getWindow();

            /* Change status bar color to the black */
            if(true){
                View view =getWindow().getDecorView() ;
                view.setSystemUiVisibility(view.getSystemUiVisibility() | view.SYSTEM_UI_FLAG_LIGHT_STATUS_BAR);
            }else{
                View view =getWindow().getDecorView() ;
                view.setSystemUiVisibility(view.getSystemUiVisibility() & ~view.SYSTEM_UI_FLAG_LIGHT_STATUS_BAR);
            }

            /* Change status bar background color to white */
            window.clearFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN);

            window.addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS);

            int colorCodeLight = Color.parseColor("#ffffff");
            window.setStatusBarColor(colorCodeLight);
/*
            getSupportActionBar().setDisplayShowHomeEnabled(true);
            //getSupportActionBar().setLogo(R.drawable.logo5);
            getSupportActionBar().setDisplayUseLogoEnabled(true);
            getSupportActionBar().setTitle("   Sign up");

           // mTopToolbar=(Toolbar) findViewById(R.id.toolbar);
           // setSupportActionBar(mTopToolbar);

 */


            getToken_subscrib();

            butAddress = findViewById(R.id.butReg);

            butBack = findViewById(R.id.button2);

            btn_rev_kg = findViewById(R.id.btn_rev_kg);

            btn_rev_price = findViewById(R.id.btn_rev_price);
            btn_rev_pickup = findViewById(R.id.btn_rev_pickup);

            btn_others= findViewById(R.id.btn_others);

/*
           // getSupportActionBar().setDisplayShowHomeEnabled(true);
            //getSupportActionBar().setLogo(R.drawable.logo5);
            getSupportActionBar().setDisplayUseLogoEnabled(true);
            getSupportActionBar().setTitle("   Sign up");

            mTopToolbar=(Toolbar) findViewById(R.id.toolbar);
            setSupportActionBar(mTopToolbar);

 */

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
            txtReferral = intent.getStringExtra("txtReferral");


            txtBranch = intent.getStringExtra("txtBranch");



            txtBus_Stop = intent.getStringExtra("txtBus_Stop");
            txtProfession = intent.getStringExtra("txtProfession");
            txtMember_status = intent.getStringExtra("txtMember_status");
            txtUnit= intent.getStringExtra("txtUnit");

            unit_list = (ArrayList<String>) getIntent().getSerializableExtra("key_unit");


            txtCountry = intent.getStringExtra("txtCountry");

            genderLenth = intent.getIntExtra("genderLenth",0);
            txtTitle = intent.getStringExtra("txtTitle");


            txtselected_Id = intent.getIntExtra("txtselected_Id",0);
            txtselected_country_Id = intent.getIntExtra("txtselected_country_Id",0);

            txtSenderlga  =intent.getStringExtra("txtSenderlga");
            txtSenderState=intent.getStringExtra("txtSenderState");


            churchStatus_length = intent.getIntExtra("churchStatus_length",0);





            // country_list = (ArrayList<String>) getIntent().getSerializableExtra("key");

            lga_list = (ArrayList<String>) getIntent().getSerializableExtra("key_lga");

            branch_list = (ArrayList<String>) getIntent().getSerializableExtra("key_branch");
            branch_id = intent.getIntExtra("branch_id",0);

            lga_id = intent.getIntExtra("lga_id",0);
            state_id = intent.getIntExtra("state_id",0);

            unit_id = intent.getIntExtra("unit_id",0);

            btn_rev_kg.setText("\n** Name (edit) ** \n \n Title: " + txtTitle +" \n First Name: " + txtFname +" \n Surname: "+ txtSurname +" \n Gender: "+txtGender+"\n");

            btn_rev_price.setText("\n** Email (edit) **  \n \n Email: "  + txtEmail );

            //if(txtCountry.trim().equals("Nigeria")){

            btn_rev_pickup.setText("\n** Address (edit) **  \n  \n City/Town: "+ txtCity +"  \n  State: "+ txtSenderState  +"\n LGA: "+ txtSenderlga  +"\n Mobile No: "+ txtMobile +" \n  Bus Stop:  "+ txtBus_Stop+"\n St Address: "+txtAddress+"\n");

            btn_others.setText("\n** Others (edit) **  \n  \n Bus Stop: "+ txtBus_Stop +"  \n Birth-Day : "+ txtPostCode  +"\n Member Status: "+ txtMember_status  +"\n Profession: "+ txtProfession +" \n  St Church Unit:  "+ txtUnit+"\n ");



            //}else{
            //btn_rev_pickup.setText("\n** Address (edit) **  \n  \n City/Town: "+ txtCity +"  \n Postcode: "+ txtPostCode +" \n Country: "+ txtCountry  +" \n Mobile No: "+ txtMobile +" \n Referral Code:  "+ txtReferral +" \n St Address:  "+ txtAddress +"\n ");

            //}


            //"** Name (edit) ** \n \n First Name: \n Surname: \n Gender: \n

            butBack.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    // Log.d(TAG, "Subscribing to weather topic");
                    try{
                        Intent intent = new Intent(register_review.this,address.class);

                        intent.putExtra("txtEmail",txtEmail);
                        intent.putExtra("txtFname",txtFname);
                        intent.putExtra("txtSurname",txtSurname);
                        intent.putExtra("txtGender",txtGender);
                        intent.putExtra("txtPassword",txtPassword);
                        intent.putExtra("txtAddress",txtAddress);
                        intent.putExtra("txtCity",txtCity);
                        intent.putExtra("txtPostCode",txtPostCode);
                        intent.putExtra("txtMobile",txtMobile);
                        intent.putExtra("txtReferral",txtReferral);

                        intent.putExtra("txtBranch",txtBranch);
                        intent.putExtra("key_branch", branch_list);
                        intent.putExtra("branch_id",branch_id);

                        intent.putExtra("txtBus_Stop",txtBus_Stop);
                        intent.putExtra("txtProfession",txtProfession);
                        intent.putExtra("txtUnit",txtUnit);
                        intent.putExtra("txtMember_status",txtMember_status);
                        intent.putExtra("unit_id",unit_id);
                        intent.putExtra("key_unit", unit_list);
                        intent.putExtra("churchStatus_length", churchStatus_length);


                        intent.putExtra("txtCountry",txtCountry);
                        intent.putExtra("txtTitle",txtTitle);
                        intent.putExtra("txtselected_Id",txtselected_Id);
                        intent.putExtra("txtselected_country_Id",txtselected_country_Id);
                        intent.putExtra("genderLenth",genderLenth);

                        intent.putExtra("key", country_list);
                        intent.putExtra("key_lga", lga_list);
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
                        Intent intent = new Intent(register_review.this,email.class);


                        intent.putExtra("txtEmail",txtEmail);
                        intent.putExtra("txtFname",txtFname);
                        intent.putExtra("txtSurname",txtSurname);
                        intent.putExtra("txtGender",txtGender);
                        intent.putExtra("txtPassword",txtPassword);
                        intent.putExtra("txtAddress",txtAddress);
                        intent.putExtra("txtCity",txtCity);
                        intent.putExtra("txtPostCode",txtPostCode);
                        intent.putExtra("txtMobile",txtMobile);
                        intent.putExtra("txtReferral",txtReferral);

                        intent.putExtra("txtBus_Stop",txtBus_Stop);
                        intent.putExtra("txtProfession",txtProfession);
                        intent.putExtra("txtUnit",txtUnit);
                        intent.putExtra("unit_id",unit_id);
                        intent.putExtra("key_unit", unit_list);
                        intent.putExtra("txtMember_status", txtMember_status);
                        intent.putExtra("churchStatus_length", churchStatus_length);


                        intent.putExtra("txtBranch",txtBranch);
                        intent.putExtra("key_branch", branch_list);
                        intent.putExtra("branch_id",branch_id);


                        intent.putExtra("txtCountry",txtCountry);
                        intent.putExtra("txtTitle",txtTitle);
                        intent.putExtra("txtselected_Id",txtselected_Id);
                        intent.putExtra("txtselected_country_Id",txtselected_country_Id);
                        intent.putExtra("genderLenth",genderLenth);

                        intent.putExtra("key", country_list);
                        intent.putExtra("key_lga", lga_list);
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
                        Intent intent = new Intent(register_review.this,address.class);

                        intent.putExtra("txtEmail",txtEmail);
                        intent.putExtra("txtFname",txtFname);
                        intent.putExtra("txtSurname",txtSurname);
                        intent.putExtra("txtGender",txtGender);
                        intent.putExtra("txtPassword",txtPassword);
                        intent.putExtra("txtAddress",txtAddress);
                        intent.putExtra("txtCity",txtCity);
                        intent.putExtra("txtPostCode",txtPostCode);
                        intent.putExtra("txtMobile",txtMobile);
                        intent.putExtra("txtReferral",txtReferral);

                        intent.putExtra("txtBranch",txtBranch);
                        intent.putExtra("key_branch", branch_list);
                        intent.putExtra("branch_id",branch_id);

                        intent.putExtra("txtBus_Stop",txtBus_Stop);
                        intent.putExtra("txtProfession",txtProfession);
                        intent.putExtra("txtUnit",txtUnit);
                        intent.putExtra("unit_id",unit_id);
                        intent.putExtra("key_unit", unit_list);
                        intent.putExtra("txtMember_status", txtMember_status);
                        intent.putExtra("churchStatus_length", churchStatus_length);


                        intent.putExtra("txtCountry",txtCountry);
                        intent.putExtra("txtTitle",txtTitle);
                        intent.putExtra("txtselected_Id",txtselected_Id);


                        intent.putExtra("txtselected_country_Id",txtselected_country_Id);
                        intent.putExtra("genderLenth",genderLenth);

                        intent.putExtra("key", country_list);
                        intent.putExtra("key_lga", lga_list);
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


/*

            btn_others.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    // Log.d(TAG, "Subscribing to weather topic");
                    try{
                        Intent intent = new Intent(register_review.this,Others.class);

                        intent.putExtra("txtEmail",txtEmail);
                        intent.putExtra("txtFname",txtFname);
                        intent.putExtra("txtSurname",txtSurname);
                        intent.putExtra("txtGender",txtGender);
                        intent.putExtra("txtPassword",txtPassword);
                        intent.putExtra("txtAddress",txtAddress);
                        intent.putExtra("txtCity",txtCity);
                        intent.putExtra("txtPostCode",txtPostCode);
                        intent.putExtra("txtMobile",txtMobile);
                        intent.putExtra("txtReferral",txtReferral);

                        intent.putExtra("txtBranch",txtBranch);
                        intent.putExtra("key_branch", branch_list);
                        intent.putExtra("branch_id",branch_id);

                        intent.putExtra("txtBus_Stop",txtBus_Stop);
                        intent.putExtra("txtProfession",txtProfession);
                        intent.putExtra("txtUnit",txtUnit);
                        intent.putExtra("unit_id",unit_id);
                        intent.putExtra("key_unit", unit_list);
                        intent.putExtra("txtMember_status", txtMember_status);
                        intent.putExtra("churchStatus_length", churchStatus_length);


                        intent.putExtra("txtCountry",txtCountry);
                        intent.putExtra("txtTitle",txtTitle);
                        intent.putExtra("txtselected_Id",txtselected_Id);


                        intent.putExtra("txtselected_country_Id",txtselected_country_Id);
                        intent.putExtra("genderLenth",genderLenth);

                        intent.putExtra("key", country_list);
                        intent.putExtra("key_lga", lga_list);
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

 */



            btn_rev_kg.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    // Log.d(TAG, "Subscribing to weather topic");

                    try{
                        // Toast.makeText(RegisterReview.this, "Name: ."+ txtFname +" "+txtSurname, Toast.LENGTH_LONG).show();


                        Intent intent = new Intent(register_review.this,name.class);

                        intent.putExtra("txtEmail",txtEmail);
                        intent.putExtra("txtFname",txtFname);
                        intent.putExtra("txtSurname",txtSurname);
                        intent.putExtra("txtGender",txtGender);
                        intent.putExtra("txtPassword",txtPassword);
                        intent.putExtra("txtAddress",txtAddress);
                        intent.putExtra("txtCity",txtCity);
                        intent.putExtra("txtPostCode",txtPostCode);
                        intent.putExtra("txtMobile",txtMobile);

                        intent.putExtra("txtBranch",txtBranch);
                        intent.putExtra("key_branch", branch_list);
                        intent.putExtra("branch_id",branch_id);

                        intent.putExtra("txtBus_Stop",txtBus_Stop);
                        intent.putExtra("txtProfession",txtProfession);
                        intent.putExtra("txtUnit",txtUnit);
                        intent.putExtra("unit_id",unit_id);
                        intent.putExtra("key_unit", unit_list);
                        intent.putExtra("txtMember_status", txtMember_status);
                        intent.putExtra("churchStatus_length", churchStatus_length);


                        intent.putExtra("txtReferral",txtReferral);
                        intent.putExtra("txtCountry",txtCountry);
                        intent.putExtra("txtTitle",txtTitle);
                        intent.putExtra("txtselected_Id",txtselected_Id);
                        intent.putExtra("txtselected_country_Id",txtselected_country_Id);
                        intent.putExtra("genderLenth",genderLenth);

                        intent.putExtra("key", country_list);
                        intent.putExtra("key_lga", lga_list);
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






            Log.i("Country","****   Selected "+txtCountry);
            Log.i("LGA","****   Selected "+txtSenderlga);

            ImeiNo();
            // getPhoneNo();

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
    /*
public void getPhoneNo(){

    if (ActivityCompat.checkSelfPermission(this, android.Manifest.permission.READ_PHONE_STATE) == PackageManager.PERMISSION_GRANTED) {
        @SuppressLint("ServiceCast")
        TelephonyManager tMgr= (TelephonyManager)this.getSystemService(Context.TELECOM_SERVICE);
        String mphoneNo= tMgr.getLine1Number();


    }



    }

     */

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
                progressDialog = ProgressDialog.show(register_review.this,"Saving Data", "Please wait...",false,false);


            }

            @Override
            protected void onPostExecute(String string1) {
                try{
                    super.onPostExecute(string1);

                    // Dismiss the progress dialog after done uploading.
                    progressDialog.dismiss();

                    //Toast.makeText(Registration.this,string1,Toast.LENGTH_LONG).show();

                    // Toast.makeText(RegisterReview.this,string1,Toast.LENGTH_LONG).show();

                    Log.e("Data: ","Registration ***************** "+string1.toString());

                    user_id=getUserId();


                    mydb = new DBHelper(getBaseContext());






                    //String str2 ="\"Success\"";
                    string1 = string1.toString().replaceAll("\"","");
                    String[] strsplit=string1.split("_");
                    string1 =strsplit[0];

                    string1 = string1.toString().replaceAll("\"","");


                    int msg= Integer.parseInt(string1);

                    if(msg==2){
                        Toast.makeText(register_review.this,"Mobile Number Existed already",Toast.LENGTH_LONG).show();
                        return;
                    }


                    String string2 =strsplit[1];

                    string2 = string2.toString().replaceAll("\"","");
                    int useId= Integer.parseInt(string2);

                    mydb.deleteAll_loginusers();
                    mydb.insert_loginusers(txtMobile,string2);





                    //if(httpResponseMsg.trim().equalsIgnoreCase("Success")){
                    if(msg==1 && user_id.equals(null)){

                        mydb.deleteAll_users();
                        if(mydb.insert_users(txtTitle,txtFname,txtSurname, txtEmail , txtMobile,txtAddress ,txtCity, txtMember_status,txtBus_Stop,txtPostCode,txtProfession,txtUnit, txtCountry,txtSenderState,txtSenderlga ,txtReferral)){


                            // Toast.makeText(getApplicationContext(), "Data Saved", Toast.LENGTH_SHORT).show();
                            Log.e("Successful: ",string1.toString());


                        }






                        Log.e("Successful: ",string1.toString());



                        Intent intent = new Intent(register_review.this,Thank_You.class);
                        //intent.putExtra("mobile",ed3.getText().toString());
                        //intent.putExtra("user_id",user_id);
                        startActivity(intent);


                        finish();

                    }
                    if(msg==1){
                        Intent intent = new Intent(register_review.this,Thank_You.class);

                        startActivity(intent);


                        finish();
                    }
                    if(msg==0){
                        Toast.makeText(register_review.this,"Something Went Wrong ",Toast.LENGTH_LONG).show();
                    }

                } catch (NumberFormatException e) {
                    e.printStackTrace();
                }
                catch (NullPointerException e) {
                    e.printStackTrace();
                }
                catch (IndexOutOfBoundsException e) {
                    e.printStackTrace();
                }
                catch (IllegalArgumentException e) {
                    e.printStackTrace();
                }
                catch (Exception e) {
                    e.printStackTrace();
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
                    SimpleDateFormat formatter = new SimpleDateFormat("dd-MM-yyyy HH:mm:ss");


                    String strDate = formatter.format(date);

                    //MEIHolder = deviceUniqueIdentifier.toString();
                    Log.e("Upload starts here","9th");
                    JSONObject postDataParams = new JSONObject();



/*
                        if(!txtCountry.trim().equals("Nigeria")){
                            txtSenderlga=null;
                        }

 */


                    postDataParams.put("token", tokenNo);

                    postDataParams.put("IMEI", IMEI_Number_Holder);

                    postDataParams.put("email", txtEmail);
                    postDataParams.put("fname", txtFname);
                    postDataParams.put("strDate", strDate);
                    postDataParams.put("surname", txtSurname);
                    postDataParams.put("gender", txtGender);
                    postDataParams.put("password", txtPassword);
                    postDataParams.put("address", txtAddress);
                    postDataParams.put("city", txtCity);
                    postDataParams.put("birth_day", txtPostCode);
                    postDataParams.put("mobile", txtMobile);
                    postDataParams.put("referral", txtReferral);
                    postDataParams.put("txtBranch", txtBranch);

                    postDataParams.put("bus_stop", txtBus_Stop);
                    postDataParams.put("profession", txtProfession);
                    postDataParams.put("unit_list", unit_list);
                    postDataParams.put("status", txtMember_status);





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

                Log.e("Token","******* Token No "+tokenNo);

            }
        });
    }




    @SuppressLint("Range")
    public String getUserId(){
        mydb = new DBHelper(this);
        Log.i("level","Level 3B");
        // Cursor res= mydb.getLoginUsers(1);
        Cursor res;
        res= mydb.getLoginUsers(1);
        int usrIds;
        String MobileNo=null;
        if(res.moveToFirst()){

            res.moveToFirst();
            usrIds=res.getInt(res.getColumnIndex(DBHelper.LOGIN_COLUMN_ID));
            MobileNo    =res.getString(res.getColumnIndex(DBHelper.LOGIN_COLUMN_MOBILE));
            userId    =res.getString(res.getColumnIndex(DBHelper.LOGIN_COLUMN_USER_ID));
            Log.i("level","Level 3F");
            return userId;
        }
        return userId;
    }

}

