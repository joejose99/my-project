package com.eciels.android.INEC;

import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;

import com.eciels.android.INEC.FoodDomain.VideoDomain;
import com.eciels.android.INEC.FoodDomain.VotingTextDomain;
import com.google.android.material.snackbar.Snackbar;

import androidx.appcompat.app.AppCompatActivity;

import android.provider.MediaStore;
import android.view.View;
import android.widget.Button;
import android.widget.MediaController;
import android.widget.TextView;
import android.widget.VideoView;

import androidx.navigation.NavController;
import androidx.navigation.Navigation;
import androidx.navigation.ui.AppBarConfiguration;
import androidx.navigation.ui.NavigationUI;

import com.eciels.android.INEC.databinding.ActivityShowVideoDetailsBinding;

public class ShowVideoDetails extends AppCompatActivity {

    private AppBarConfiguration appBarConfiguration;
    private ActivityShowVideoDetailsBinding binding;

    private VideoView videoView ;
    Button btnPlay;
    TextView textView,titleTxt,textView1;
    VideoDomain object;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        binding = ActivityShowVideoDetailsBinding.inflate(getLayoutInflater());
        setContentView(R.layout.activity_show_video_details);

       // buttonChoose = (Button) findViewById(R.id.buttonChoose);
        //buttonUpload = (Button) findViewById(R.id.buttonUpload);

        //butCancel = (Button) findViewById(R.id.btnBack);
        btnPlay=  (Button) findViewById(R.id.btnPlay);

        textView = (TextView) findViewById(R.id.textView);

        textView1=(TextView) findViewById(R.id.textView1);
        titleTxt=(TextView) findViewById(R.id.titleTxt);

        videoView = (VideoView) findViewById(R.id.vdoView);


        btnPlay.setVisibility(View.VISIBLE);

        // Perform action on click
        btnPlay.setEnabled(true);


        object = (VideoDomain) getIntent().getSerializableExtra("object");
        titleTxt.setText(object.getTitle());
        textView1.setText(object.getWard());
         Uri uri = Uri.parse(object.getPic());
        videoView.setVideoURI(uri);

        MediaController mediaController = new MediaController(this);

        // sets the anchor view
        // anchor view for the videoView
        mediaController.setAnchorView(videoView);

        // sets the media player to the videoView
        mediaController.setMediaPlayer(videoView);

        // sets the media controller to the videoView
        videoView.setMediaController(mediaController);

        // starts the video
        videoView.start();

        btnPlay.setOnClickListener(new View.OnClickListener() {

        public void onClick(View v) {


                Intent data= new Intent(MediaStore.ACTION_VIDEO_CAPTURE);

            Uri uri = Uri.parse(object.getPic());

                if(uri != null)


            // starts the video
            videoView.start();
            }

        });
    }


}