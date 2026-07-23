package com.shiptodoor.shiptodoor;

import android.annotation.SuppressLint;
import android.content.Context;
import android.content.Intent;
import android.database.Cursor;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.graphics.Color;
import android.net.Uri;
import android.os.Bundle;

import com.google.android.material.bottomnavigation.BottomNavigationView;
import com.google.android.material.snackbar.Snackbar;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.widget.EditText;
import android.widget.ImageView;


import androidx.appcompat.view.menu.MenuBuilder;
import androidx.appcompat.widget.ShareActionProvider;
import androidx.appcompat.widget.Toolbar;
import androidx.coordinatorlayout.widget.CoordinatorLayout;
import androidx.core.content.FileProvider;
import androidx.core.view.MenuItemCompat;
import androidx.navigation.NavController;
import androidx.navigation.Navigation;
import androidx.navigation.ui.AppBarConfiguration;
import androidx.navigation.ui.NavigationUI;

import com.google.android.material.textfield.TextInputEditText;
import com.google.android.material.textfield.TextInputLayout;
import com.shiptodoor.shiptodoor.databinding.ActivityUserProfileBinding;
import com.shiptodoor.shiptodoor.helper.BottomNavigationBehavior;

import java.io.File;
import java.io.FileOutputStream;

public class UserProfile extends AppCompatActivity {
    private ShareActionProvider  shareActionProvider;
    private AppBarConfiguration appBarConfiguration;
    private ActivityUserProfileBinding binding;
    ImageView viewToBitmap=null;
    EditText ed1, ed2, ed3, ed4, ed5, ed6,ed7,ed8,ed9;
    //TextInputEditText ed1, ed2, ed3, ed4, ed5, ed6,ed7,ed8,ed9;;
    Context context;
    private  String txt1, txt2, txt3, txt4, txt5,txt6, txt7, txt8,txt9;
    DBHelper  mydb = new DBHelper(this);
    private Toolbar  mTopToolbar;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_user_profile);


        Toolbar toolbar = findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        Window window = getWindow();

        /* Change status bar background color to white */
        window.clearFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN);

        window.addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS);

        int colorCodeLight = Color.parseColor("#ffffff");
        window.setStatusBarColor(colorCodeLight);



        setSupportActionBar(toolbar);

        getSupportActionBar().setDisplayShowHomeEnabled(true);
        //getSupportActionBar().setLogo(R.drawable.logo5);
        getSupportActionBar().setDisplayUseLogoEnabled(true);
        getSupportActionBar().setTitle("   User Profile");

        mTopToolbar=(Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(mTopToolbar);


        ed1=(EditText)findViewById(R.id.txtfname);
        ed2=(EditText)findViewById(R.id.txtsurname);
        ed3=(EditText)findViewById(R.id.txtaddress);
        ed4=(EditText)findViewById(R.id.txtcity);
        ed5=(EditText)findViewById(R.id.txtmobile);
        ed6=(EditText)findViewById(R.id.txtemail);
        ed7=(EditText)findViewById(R.id.txtlga);
        ed8=(EditText)findViewById(R.id.txtstate);
        ed9=(EditText)findViewById(R.id.txtcountry);



        BottomNavigationView bottomNavigationView = (BottomNavigationView) findViewById(R.id.nav_view);



        bottomNavigationView.setOnNavigationItemSelectedListener(new BottomNavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem item) {
                switch (item.getItemId()) {
                    case R.id.navigation_home:
                        //Toast.makeText(MenuActivity.this, "Home", Toast.LENGTH_SHORT).show();
                        Intent intent = new Intent(UserProfile.this,MenuActivity.class);
                        startActivity(intent);
                        finish();
                        break;

                    case R.id.navigation_send:
                        //Toast.makeText(MenuActivity.this, "Send", Toast.LENGTH_SHORT).show();
                        Intent intent1 = new Intent(UserProfile.this,ParcelLetterActivity.class);
                        startActivity(intent1);
                        finish();
                        break;
                    case R.id.navigation_track:
                        //Toast.makeText(MenuActivity.this, "Tracking", Toast.LENGTH_SHORT).show();
                        Intent intent2 = new Intent(UserProfile.this,TrackingActivity.class);
                        startActivity(intent2);
                        finish();
                        break;
                    case R.id.navigation_help:
                        //Toast.makeText(MenuActivity.this, "Help", Toast.LENGTH_SHORT).show();
                        Intent intent3 = new Intent(UserProfile.this,HelpActivity.class);
                        startActivity(intent3);
                        finish();
                        break;

                    case R.id.navigation_logout:
                        Intent intent4 = new Intent(UserProfile.this,UserHistory.class);
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




        getProfile();




    }

     private void getProfile(){
Log.i("Data","Im in mysqlite************");
         Cursor res= mydb.getUsers(1);
         if(res.moveToFirst()){



             res.moveToFirst();
             txt1    =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_FIRSTNAME));
             txt2=   res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_SURNAME));
             String title =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_TITLES));
             txt4    =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_City));

             String email =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_EMAIL));
             txt3    =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_ADDRESS));
             txt5   = res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_POSTCODE));
             txt9  = res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_COUNTRY));
             txt5    =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_MOBILENO));

             txt8    =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_STATE));
             txt7    =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_LGA));


             ed1.setText(txt1.toString());

             ed2.setText(txt2.toString());

             ed3.setText(txt3.toString());

             ed4.setText(txt4.toString());

             ed6.setText(email.toString());

             ed5.setText(txt5.toString());

             ed7.setText(txt7.toString());

             ed8.setText(txt8.toString());

             ed9.setText(txt9.toString());


         }

         }

    //R.menu.menu_main, menu
    @SuppressLint("RestrictedApi")
    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        // getMenuInflater().inflate(R.menu.menu_main,menu);
        getMenuInflater().inflate(R.menu.logout, menu);
        //shareActionProvider = (ShareActionProvider)menu.findItem(R.id.action_share);
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
            Intent intent3 = new Intent(UserProfile.this,HelpActivity.class);
            startActivity(intent3);



            finish();
            return true;

        }

        if (id == R.id.action_profile) {
            // Toast.makeText(UserLogin.this, "Action clicked", Toast.LENGTH_LONG).show();
            Intent intent = new Intent(UserProfile.this,UserProfile.class);
            startActivity(intent);


            finish();
            return true;

        }
        if (id == R.id.action_logout) {
            // Toast.makeText(UserLogin.this, "Action clicked", Toast.LENGTH_LONG).show();
            Intent intent = new Intent(UserProfile.this,UserLogin.class);
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


        if (id == R.id.action_share) {
            // Toast.makeText(UserLogin.this, "Action clicked", Toast.LENGTH_LONG).show();

            shareActionProvider=(ShareActionProvider) MenuItemCompat.getActionProvider(item);
/*
            Bitmap bitmap = BitmapFactory.decodeResource(this.getResources(),R.drawable.cargoland_menu);
            shareImage(bitmap,"facebook.com/cargoland");

 */
            return true;

        }



        return super.onOptionsItemSelected(item);


    }


    private void setShareActionProvider(Intent shareIntent){
        if(shareActionProvider != null){



//Bitmap bitmap = (Bitmap) viewToBitmap.setImageURI(Uri.parse("android.resource://" + getPackageName() + "/" +
  //      R.drawable.cargoland_menu));



            Bitmap bitmap = BitmapFactory.decodeResource(this.getResources(),R.drawable.cargoland_menu);
           // shareImage(bitmap,"facebook.com/cargoland");

            shareIntent.setType("text/plain");
            String message="Cargoland \n\r Kindly download the app for your logistics needs";
            //shareIntent.putExtra("Cargoland","Cargoland");
            //shareIntent.putExtra("details","Kindly download the app for your logistics needs");
            shareIntent.putExtra(Intent.EXTRA_TEXT,message);

            shareActionProvider.setShareIntent(shareIntent);
            startActivity(Intent.createChooser(shareIntent,"Cargoland App"));




        }
    }

 public void shareImage(Bitmap bitmap,String packageName){
        try{
            String message="Cargoland \n\r Kindly download the app for your logistics needs";
            File file = new File(this.getExternalCacheDir(),"cargoland_menu.jpg");
            FileOutputStream fileOutputStream = new FileOutputStream(file);
            bitmap.compress(Bitmap.CompressFormat.JPEG,95,fileOutputStream);
            fileOutputStream.flush();
            fileOutputStream.close();
            file.setReadable(true,false);

             final Intent intent = new Intent(Intent.ACTION_SEND);
             intent.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK);

/*
            Uri apkURI = FileProvider.getUriForFile(
                    context,
                    context.getApplicationContext()
                            .getPackageName() + ".provider", file);
            intent.setDataAndType(apkURI, "jepeg");
            intent.addFlags(Intent.FLAG_GRANT_READ_URI_PERMISSION);
// End New Approach
             context.startActivity(intent);


 */


             intent.putExtra(Intent.EXTRA_STREAM,Uri.fromFile(file));
             intent.putExtra("message",message);
             intent.setType("images/*");
             intent.setPackage(packageName);

             startActivity(Intent.createChooser(intent,"Share Cargoland App on facebook"));

        }catch (Exception e){
            e.printStackTrace();
        }
 }


    private void ExitApp(){

        android.os.Process.killProcess(android.os.Process.myPid());
        System.exit(1);
    }




}