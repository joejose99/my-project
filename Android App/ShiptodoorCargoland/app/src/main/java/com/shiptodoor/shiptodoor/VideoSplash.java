package com.shiptodoor.shiptodoor;

import android.database.Cursor;
import android.graphics.Bitmap;
import android.graphics.drawable.Drawable;
import android.os.AsyncTask;
import android.os.Bundle;

import com.google.android.material.floatingactionbutton.FloatingActionButton;
import com.google.android.material.snackbar.Snackbar;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import android.view.View;

import android.content.Intent;
import android.media.MediaPlayer;
import android.net.Uri;
import android.os.Bundle;
import android.os.Handler;
import android.util.Log;
import android.view.Window;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.MediaController;
import android.widget.Toast;
import android.widget.VideoView;
import com.shiptodoor.shiptodoor.UserLogin;
import com.squareup.picasso.Picasso;
import com.squareup.picasso.Target;

import androidx.appcompat.app.AppCompatActivity;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

public class VideoSplash extends AppCompatActivity {

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

    HttpGetImage httpGetImage = new HttpGetImage();


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_video_splash);
        VideoView videoView = findViewById(R.id.videoView);

        Window window = getWindow();
        window.setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN,WindowManager.LayoutParams.FLAG_FULLSCREEN);
        GetImage("cargoland", "imei") ;

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

                    Intent i = new Intent(VideoSplash.this, SplashScreen.class);
                    i.putExtra("image",imageweb);
                    i.putExtra("bitmap",bitmaps);

                    startActivity(i);

                    // close this activity
                    finish();
                }else{

                    Intent i = new Intent(VideoSplash.this, UserLogin.class);
                    startActivity(i);

                    // close this activity
                    finish();
                }

            }
        }, SPLASH_TIME_OUT);

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
            Toast.makeText(VideoSplash.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
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





}