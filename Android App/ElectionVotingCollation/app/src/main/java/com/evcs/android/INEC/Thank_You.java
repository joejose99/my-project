package com.eciels.android.INEC;

import android.annotation.SuppressLint;
import android.content.Intent;
import android.database.Cursor;
import android.graphics.Color;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.widget.Button;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;


public class Thank_You extends AppCompatActivity {

    private Toolbar mTopToolbar;
    private Button butThank = null;
    DBHelper  mydb = new DBHelper(this);
    private String userId;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_thank_you);


        Window window = getWindow();
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

        // Window window = getWindow();
        window.setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN,WindowManager.LayoutParams.FLAG_FULLSCREEN);



        butThank = findViewById(R.id.butReg);

        //getSupportActionBar().setTitle("   ");
        // getSupportActionBar().setDisplayShowHomeEnabled(false);

        //getSupportActionBar().setLogo(R.drawable.logo5);
        //getSupportActionBar().setDisplayUseLogoEnabled(true);

/*
        mTopToolbar=(Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(mTopToolbar);

*/

        butThank.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Log.d(TAG, "Subscribing to weather topic");
               // if(getUserId().equals(null)){
                    Intent intent = new Intent(Thank_You.this,LoginUsers.class);
                    startActivity(intent);


                    finish();
                    /*
                }else{
                    Intent intent = new Intent(Thank_You.this, Menu_app_election.class);
                    startActivity(intent);


                    finish();
                }


                     */


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