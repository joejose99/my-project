package com.cargoland.cargolandfoods;

import android.os.Bundle;

import com.google.android.material.snackbar.Snackbar;

import androidx.appcompat.app.AppCompatActivity;

import android.view.View;

import androidx.navigation.NavController;
import androidx.navigation.Navigation;
import androidx.navigation.ui.AppBarConfiguration;
import androidx.navigation.ui.NavigationUI;

import com.cargoland.cargolandfoods.databinding.ActivityVideoSplashBinding;

import android.content.Intent;
import android.database.Cursor;
import android.graphics.Bitmap;
import android.media.MediaPlayer;
import android.net.Uri;
import android.os.Bundle;
import android.os.Handler;
import android.util.Log;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.MediaController;
import android.widget.VideoView;

import androidx.appcompat.app.AppCompatActivity;
import androidx.navigation.ui.AppBarConfiguration;


public class video_splash extends AppCompatActivity {

    private AppBarConfiguration appBarConfiguration;
    private ActivityVideoSplashBinding binding;

    private Button butReg = null;
    private Button butLogin = null;
    //private Toolbar  mTopToolbar;
    private static int SPLASH_TIME_OUT = 5000;
    String finalResult ,rst;
    private String imageweb =null;

    //DBHelper  mydb;
    DBHelper  mydb = new DBHelper(this);

    Bitmap bitmaps;

    String HttpURL_Advert="https://cargoland.shiptodoor.com/splash";

    HttpParse httpParse = new HttpParse();

    //HttpGetImage httpGetImage = new HttpGetImage();


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_video_splash);
        VideoView videoView = findViewById(R.id.videoView);

        Window window = getWindow();
        window.setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN,WindowManager.LayoutParams.FLAG_FULLSCREEN);
        //GetImage("cargoland", "imei") ;
        try{


            MediaController mediaController = new MediaController(this);
            mediaController.setAnchorView(videoView);
            videoView.setMediaController(mediaController);
            mediaController.setVisibility(View.GONE);
  /*
        videoView.setVideoURI(Uri.parse("android.resources://".concat(getPackageName()).concat("/raw").concat("R.raw.video_logo")));
    */
            videoView.setVideoURI(Uri.parse("android.resource://" + getPackageName() + "/" +
                    R.raw.video_logo));
/*
        videoView.setVideoURI(Uri.parse("android.resource://" + getPackageName() + "/" +
                R.raw.video_logo));

 */



        /*

        videoView.setVideoPath("https://cargoland.shiptodoor.com/cargoland/video/video_logo.mp4");

         */

            videoView.setOnPreparedListener(new MediaPlayer.OnPreparedListener() {
                @Override
                public void onPrepared(MediaPlayer mp) {
                    videoView.start();
                }
            });

            Log.i("video","Video Started");



            new Handler().postDelayed(new Runnable() {

                /*
                 * Showing splash screen with a timer. This will be useful when you
                 * want to show case your app logo / company
                 */

                @Override
                public void run() {
                    // This method will be executed once the timer is over
                    // Start your app main activity

                    Cursor res= mydb.getLoginUsers(1);
                    if(res.moveToFirst()){

                        Intent i = new Intent(video_splash.this, MenuActivity.class);
                        // i.putExtra("image",imageweb);
                        //i.putExtra("bitmap",bitmaps);

                        startActivity(i);

                        // close this activity
                        finish();
                    }else{

                        Intent i = new Intent(video_splash.this, UserLogin.class);
                        startActivity(i);

                        // close this activity
                        finish();
                    }

                }
            }, SPLASH_TIME_OUT);

        }catch(NullPointerException e){
            e.printStackTrace();
        }catch (Exception e){
            e.printStackTrace();
        }

    }





/*
    @Override
    public boolean onSupportNavigateUp() {
        NavController navController = Navigation.findNavController(this, R.id.nav_host_fragment_content_video_splash);
        return NavigationUI.navigateUp(navController, appBarConfiguration)
                || super.onSupportNavigateUp();
    }

 */
}