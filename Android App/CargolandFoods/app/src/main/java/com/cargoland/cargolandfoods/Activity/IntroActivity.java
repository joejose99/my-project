package com.cargoland.cargolandfoods.Activity;

import android.annotation.SuppressLint;
import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.database.Cursor;
import android.graphics.Color;
import android.os.AsyncTask;
import android.os.Bundle;
import android.os.Handler;
import android.util.Log;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.widget.ArrayAdapter;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;
import androidx.constraintlayout.widget.ConstraintLayout;
import androidx.recyclerview.widget.LinearLayoutManager;

import com.cargoland.cargolandfoods.Adapter.CategoryAdapter;
import com.cargoland.cargolandfoods.Adapter.PopularAdapter;
import com.cargoland.cargolandfoods.DBHelper;
import com.cargoland.cargolandfoods.Domain.CategoryDomain;
import com.cargoland.cargolandfoods.Domain.FoodDomain;
import com.cargoland.cargolandfoods.HttpParse;
import com.cargoland.cargolandfoods.MenuActivity;
import com.cargoland.cargolandfoods.MyDataString;
import com.cargoland.cargolandfoods.NetworkUtil;
import com.cargoland.cargolandfoods.R;
import com.cargoland.cargolandfoods.UserLogin;
import com.cargoland.cargolandfoods.video_splash;




import net.bohush.geometricprogressview.GeometricProgressView;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.net.UnknownHostException;
import java.text.SimpleDateFormat;
import java.time.LocalDateTime;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.Date;
import java.util.List;


public class IntroActivity extends AppCompatActivity  {
    private ConstraintLayout startBtn;
    GeometricProgressView progressCoupon ;
    ProgressDialog progressDialog;
    private String finalResult;

    private List<String> listData = new ArrayList<String>();
    JSONArray result;

    String HttpURL="https://cargoland.shiptodoor.com/category-foods";
    HttpParse httpParse = new HttpParse();

    private static int SPLASH_TIME_OUT = 10000;

    private String imageweb =null;

    private String userId;
private int int_no;
    Context context;

    //DBHelper  mydb;
    DBHelper mydb = new DBHelper(this);
MyDataString myDataString;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
         setContentView(R.layout.activity_intro);

         try{
        Window window = getWindow();

        if(true){
            View view =getWindow().getDecorView() ;
            view.setSystemUiVisibility(view.getSystemUiVisibility() | view.SYSTEM_UI_FLAG_LIGHT_STATUS_BAR);
        }else{
            View view =getWindow().getDecorView() ;
            view.setSystemUiVisibility(view.getSystemUiVisibility() & ~view.SYSTEM_UI_FLAG_LIGHT_STATUS_BAR);
        }






        window.clearFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN);

        window.addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS);

        int colorCodeLight = Color.parseColor("#ffffff");
        window.setStatusBarColor(colorCodeLight);

        progressCoupon = (GeometricProgressView)findViewById(R.id.progress_coupon);
        progressCoupon.setVisibility(View.VISIBLE);

        startBtn=findViewById(R.id.startbtn);




        startBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                CheckInternet();
                if(!listData.isEmpty()){
                    startActivity(new Intent(IntroActivity.this, MenuActivity.class));
                }else {
                    Toast.makeText(IntroActivity.this,"Wait Data is loading", Toast.LENGTH_LONG).show();

                    MenuPage( "cargoland");
                }


            }
        });

        /*
             NetworkUtil.checkNetworkInfo(this, new NetworkUtil.OnConnectionStatusChange() {
                 @Override
                 public void onChange(boolean type) {

                     if(type){
                         //Toast.makeText(MenuActivity.this, "Connection Available", Toast.LENGTH_SHORT).show();
                         int_no=1;
                     }else {
                         //Toast.makeText(MenuActivity.this, "NO Connection", Toast.LENGTH_SHORT).show();
                         androidx.appcompat.app.AlertDialog.Builder builder = new androidx.appcompat.app.AlertDialog.Builder(IntroActivity.this);
                         builder.setTitle("Network Error")

                                 .setMessage("Check your Internet Connection")
                                 .setPositiveButton("ok",null).create().show();

                         //but.setBackgroundResource(R.drawable.ic_baseline_person_pin_circle_24);

                     }
                 }
             });

         */



//if(int_no==1){
    MenuPage( "cargoland");
//}





/*
             new Handler().postDelayed(new Runnable() {

                 /*
                  * Showing splash screen with a timer. This will be useful when you
                  * want to show case your app logo / company
                  */
/*
                 @Override
                 public void run() {
                     // This method will be executed once the timer is over
                     // Start your app main activity

                     Cursor res= mydb.getLoginUsers(1);
                     if(res.moveToFirst()){

                         Intent i = new Intent(IntroActivity.this, MenuActivity.class);
                         // i.putExtra("image",imageweb);
                         //i.putExtra("bitmap",bitmaps);

                         startActivity(i);

                         // close this activity
                         finish();
                     }else{

                         Intent i = new Intent(IntroActivity.this, UserLogin.class);
                         startActivity(i);

                         // close this activity
                         finish();
                     }

                 }
             }, SPLASH_TIME_OUT);
*/
         }catch(IllegalArgumentException e){
             e.printStackTrace();
         }catch(IndexOutOfBoundsException e){
             e.printStackTrace();
         }catch (WindowManager.BadTokenException e){
             e.printStackTrace();
         }
         catch(Exception e){
             e.printStackTrace();
         }

    }




    private void CheckInternet(){

        NetworkUtil.checkNetworkInfo(this, new NetworkUtil.OnConnectionStatusChange() {
            @Override
            public void onChange(boolean type) {

                if(type){
                    //Toast.makeText(MenuActivity.this, "Connection Available", Toast.LENGTH_SHORT).show();
                    int_no=1;
                }else {
                    //Toast.makeText(MenuActivity.this, "NO Connection", Toast.LENGTH_SHORT).show();
                    androidx.appcompat.app.AlertDialog.Builder builder = new androidx.appcompat.app.AlertDialog.Builder(IntroActivity.this);
                    builder.setTitle("Network Error")

                            .setMessage("Check your Internet Connection")
                            .setPositiveButton("ok",null).create().show();

                    //but.setBackgroundResource(R.drawable.ic_baseline_person_pin_circle_24);

                }
            }
        });
    }



    /* CHECK IF INTERNET IS CONNECTED */
    private boolean isInternetAvailable(Context context){
        try{
            //  InetAddress inetAddress=InetAddress.getByName("www.google.com");
            // return !inetAddress.equals("");
            String command="ping -c 1 google.com";
            return Runtime.getRuntime().exec(command).waitFor()==0;
        }catch (UnknownHostException e){
            e.printStackTrace();
        }catch (WindowManager.BadTokenException e){
            e.printStackTrace();
        }catch (Exception e){
            e.printStackTrace();
        }
        return false;
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

            userId    =res.getString(res.getColumnIndex(DBHelper.LOGIN_COLUMN_USER_ID));
            Log.i("level","Level 3F");
            return userId;
        }
        return userId;
    }

    /* Menu STARTS HERE */

    public void MenuPage( final String Spanner1){

        class CountryClass extends AsyncTask<String,Void,String> {
            @Override
            protected void onPreExecute() {
                super.onPreExecute();

                //progressDialog = ProgressDialog.show(MenuActivity.this,"loading  ....",null,true,true);
            }

            @Override
            protected void onPostExecute(String httpResponseMsg) {

                super.onPostExecute(httpResponseMsg);

                String err ,err1;

                Log.i("Data"," *************  "+httpResponseMsg);

                try {

                    // Toast.makeText(ParcelLetterActivity.this,"Country: "+ httpResponseMsg,Toast.LENGTH_LONG).show();

                    listData.add(httpResponseMsg);
                    // progressDialog.dismiss();
                    Log.i("Data","Before My Data String *************  "+httpResponseMsg);
                    MyDataString myDataString = new MyDataString();
                    myDataString.setMyData(httpResponseMsg);
//String curDateTeme= new SimpleDateFormat("yyyy-MM-dd HH:mm:ss").format(Calendar.getInstance().getTime());
                    Date date = new Date();
                    SimpleDateFormat  formatter = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");


                    String curDateTeme = formatter.format(date.getTime());



                    myDataString.setDates(curDateTeme);


Log.i("Data","My Data Date ************* "+ myDataString.getMyDates());


                    Log.i("Data"," After my Data Strin *************  "+httpResponseMsg);

                    progressCoupon.setVisibility(View.GONE);

                    Cursor res= mydb.getLoginUsers(1);
                    if(res.moveToFirst()){
                        Intent intent = new Intent(IntroActivity.this,MenuActivity.class);

                        //intent.putExtra("key_data", listData.toString());
                        intent.putExtra("data", httpResponseMsg);
                        intent.putExtra("int_data", 1);

                        startActivity(intent);


                        finish();

                    }else{

                        Intent intent = new Intent(IntroActivity.this,UserLogin.class);

                        //intent.putExtra("key_data", listData.toString());
                        intent.putExtra("data", httpResponseMsg);
                        intent.putExtra("int_data", 1);

                        startActivity(intent);


                        finish();

                    }







                } catch (Exception e) {
                    e.printStackTrace();
                }









            }

            @Override
            protected String doInBackground(String... params) {

                try {





                    JSONObject postDataParams = new JSONObject();


                    postDataParams.put("user_id", getUserId());


                    Log.e("params",postDataParams.toString());

                    finalResult = httpParse.postRequest(postDataParams, HttpURL);


                } catch (Exception e) {
                    e.printStackTrace();
                }



                return finalResult;
            }
        }
        CountryClass countryObject = new CountryClass();

        countryObject.execute(Spanner1);
    }




    }




