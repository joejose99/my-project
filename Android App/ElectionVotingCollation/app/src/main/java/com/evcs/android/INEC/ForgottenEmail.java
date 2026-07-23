package com.eciels.android.INEC;

import android.app.ProgressDialog;
import android.content.Intent;
import android.graphics.Color;
import android.os.AsyncTask;
import android.os.Bundle;
import android.text.TextUtils;
import android.util.Log;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import org.json.JSONObject;

public class ForgottenEmail extends AppCompatActivity {

    private ProgressBar pb =null;
    Button butBack,butLogin;
    HttpParse httpParse = new HttpParse();
    EditText ed1,ed2,UserName,Password;
    //private String HttpURL = "https://www.cargoland.shiptodoor.com/cargoland/forgotten_email.php";
    //private String HttpURL = "https://www.evcs.ng/inventory/forgotten_email.php";
    //String HttpURL="https://www.admin.lfcasaba.org/forgotten-email";
    //private String HttpURL = "https://www.cargoland.shiptodoor.com/cargoland/forgotten_email.php";

    //String HttpURL="https://www.evcs.ng/project/forgotten-email.php";


    String HttpURL="https://evcs.ng/project/forgotten-email.php";


    ProgressDialog progressDialog;
    private String txt1;
    private boolean CheckEditText ;
    Toolbar toolbar;
    String finalResult, rst, result;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_forgotten_email);


        toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);


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

        getSupportActionBar().setDisplayShowHomeEnabled(true);
        //getSupportActionBar().setLogo(R.drawable.logo5c);
        getSupportActionBar().setDisplayUseLogoEnabled(true);



        ed1 = (EditText)findViewById(R.id.txtName);
        butLogin = findViewById(R.id.button);
        butBack = findViewById(R.id.button2);

        butBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Log.d(TAG, "Subscribing to weather topic");
                Intent intent = new Intent(ForgottenEmail.this,LoginUsers.class);
                startActivity(intent);
                finish();
            }
        });

        toolbar.setNavigationOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Intent intent = new Intent(ForgottenEmail.this,LoginUsers.class);
                startActivity(intent);
                finish();


            }
        });


        butLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                ValidateText();
                boolean em=  isValid(ed1.getText().toString());
                if(em && CheckEditText){
                    UploadPage(ed1.getText().toString(),"Inventory");
                }else{
                    Toast.makeText(ForgottenEmail.this,"Kindly verify your email address",Toast.LENGTH_LONG).show();
                    return;
                }

            }
        });

    }



    public void UploadPage(final String email, final String cargoland){

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
                progressDialog = ProgressDialog.show(ForgottenEmail.this,"Forgot", "Please wait...",false,false);
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
                    /*
                    String[] strsplit=httpResponseMsg.split("_");
                    httpResponseMsg =strsplit[0];

                    MessageResp = httpResponseMsg.toString().replaceAll("\"","");

                    String userid = strsplit[1].toString().replaceAll("\"","");


                    httpResponseMsg=MessageResp;

*/
                    httpResponseMsg = httpResponseMsg.toString().replaceAll("\"","");
                    int msg= Integer.parseInt(httpResponseMsg);

                    //if(httpResponseMsg.trim().equalsIgnoreCase("Success")){
                    if(msg==1){

                        Toast.makeText(ForgottenEmail.this,"Email Sent".toString(), Toast.LENGTH_LONG).show();

                    }




                    else{

                        Toast.makeText(ForgottenEmail.this,"Email not Sent, Kindly verify your email address",Toast.LENGTH_LONG).show();
                        // Log.w("myApp", "no networks");

                        Log.w("Message", httpResponseMsg);

                    }
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


                    postDataParams.put("txtEmail", ed1.getText());
                    postDataParams.put("inventory", "inventory");




                    Log.e("params",postDataParams.toString());

                    finalResult = httpParse.postRequest(postDataParams, HttpURL);



                } catch (Exception e) {
                    e.printStackTrace();
                }



                return finalResult;
            }
        }

        LoginClass logClass = new LoginClass();

        logClass.execute(email,cargoland);
    }




    public static boolean isValid(String email) {
        String regex = "^[\\w-_\\.+]*[\\w-_\\.]\\@([\\w]+\\.)+[\\w]+[\\w]$";
        return email.matches(regex);
    }




    public void ValidateText(){

        txt1 = ed1.getText().toString();




        if( TextUtils.isEmpty(txt1) )
        {

            CheckEditText = false;

        }
        else {

            CheckEditText = true ;

        }


    }

}