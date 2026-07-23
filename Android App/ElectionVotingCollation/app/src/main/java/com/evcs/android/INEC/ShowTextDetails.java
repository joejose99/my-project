package com.eciels.android.INEC;

import android.os.Bundle;

import com.eciels.android.INEC.FoodDomain.VotingTextDomain;
import com.google.android.material.snackbar.Snackbar;

import androidx.appcompat.app.AppCompatActivity;

import android.text.Spannable;
import android.text.SpannableString;
import android.text.style.ForegroundColorSpan;
import android.view.View;

import androidx.navigation.NavController;
import androidx.navigation.Navigation;
import androidx.navigation.ui.AppBarConfiguration;
import androidx.navigation.ui.NavigationUI;


import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.graphics.Color;
import android.graphics.drawable.Drawable;
import android.os.Build;
import android.os.Bundle;
import android.text.Html;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.appcompat.app.AppCompatActivity;

import com.bumptech.glide.Glide;
/*
import com.cargoland.cargolandfoods.Domain.FoodDomain;
import com.cargoland.cargolandfoods.Helper.ManagementCart;
import com.cargoland.cargolandfoods.MenuActivity;
import com.cargoland.cargolandfoods.MyDataString;
import com.cargoland.cargolandfoods.R;
import com.cargoland.cargolandfoods.UserProfile;

 */
import com.eciels.android.INEC.FoodDomain.FoodDomain;
import com.eciels.android.INEC.ZoomableImageView.ZoomableImageView;
import com.squareup.picasso.Picasso;
import com.squareup.picasso.Target;

import java.io.IOException;
import java.io.NotSerializableException;
import java.text.DecimalFormat;
import java.text.NumberFormat;
import java.util.Locale;

import com.eciels.android.INEC.databinding.ActivityShowTextDetailsBinding;

import com.eciels.android.INEC.FormatResult;

public class ShowTextDetails extends AppCompatActivity {
    private TextView addToCardBtn;
    private TextView titleTxt, feeTxt, descriptionTxt, numberOrderTxt,feeTxt_2,txtTotal,txtPDP,txtAPC,txtOthers,txtLP,txtWard,txtADC;
    private ImageView plusBtn, minusBtn, picFood;
    private VotingTextDomain object;
    private int numberOrder = 1;
    Bitmap bitmap;
    ZoomableImageView touch;
    //private ManagementCart managementCart;
    Button btnBack,butInfo;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_show_text_details);

        Window window = getWindow();


        /* Change status bar color to the black */



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

        // managementCart = new ManagementCart(this);

        initView();
        getBundle();


    }





    private void getBundle() {
        try{

            txtPDP = findViewById(R.id.txtPDP);
            txtAPC = findViewById(R.id.txtAPC);
            txtOthers = findViewById(R.id.txtOthers);
            txtTotal = findViewById(R.id.txtTotal);
            txtWard = findViewById(R.id.textView1);
            txtADC = findViewById(R.id.txtADC);
            txtLP = findViewById(R.id.txtLP);
            object = (VotingTextDomain) getIntent().getSerializableExtra("object");
            String wrd=getIntent().getStringExtra("ward");
            String pdp=getIntent().getStringExtra("pdp");
            String pdp_rst=getIntent().getStringExtra("pdp_rst");

String strFont="<font color='#FE6E17'> ";

String strFont2="</font>";

            txtWard.setText(object.getWard());
            titleTxt.setText(object.getPollingunit());
            //txtWard.setText(wrd);


            /*
            txtPDP.setText(object.getParty_pdp() +":"+object.getResult_pdp());
            txtAPC.setText(object.getParty_apc() +":"+object.getResult_apc());
            txtOthers.setText(object.getParty_others() +":"+object.getResult_others());

             */

            int numbPDP= Integer.parseInt(object.getResult_pdp());

            FormatResult formatResult = new  FormatResult(numbPDP);


            String str1=object.getParty_pdp()+":"+ Html.fromHtml("<font color='#FE6E17'>" +formatResult.getResult() +"</font>" );

            //String str1=object.getParty_pdp()+":"+ Html.fromHtml("<font color='#FE6E17'>" +object.getResult_pdp() +"</font>" );
            txtPDP.setText(str1);

            int numbAPC= Integer.parseInt(object.getResult_apc());

             formatResult = new  FormatResult(numbAPC);

            String str2=object.getParty_apc()+":"+  Html.fromHtml("<font color='#FE6E17'>" + formatResult.getResult() +"</font>");

           // String str2=object.getParty_apc()+":"+  Html.fromHtml("<font color='#FE6E17'>" + object.getResult_apc() +"</font>");
            txtAPC.setText(str2);


            int numbLP= Integer.parseInt(object.getResult_lp());

             formatResult = new  FormatResult(numbLP);

            //String str4=object.getParty_lp()+":"+  Html.fromHtml("<font color='#FE6E17'>" +object.getResult_lp() +"</font>");
            String str4=object.getParty_lp()+":"+  Html.fromHtml("<font color='#FE6E17'>" + formatResult.getResult() +"</font>");

            txtLP.setText(str4);


            int numbLADC = Integer.parseInt(object.getResult_adc());

             formatResult = new  FormatResult(numbLADC);

            String str5=object.getParty_adc()+":"+  Html.fromHtml("<font color='#FE6E17'>" + formatResult.getResult() +"</font>");


            //String str5=object.getParty_adc()+":"+  Html.fromHtml("<font color='#FE6E17'>" +object.getResult_adc() +"</font>");
            txtADC.setText(str5);


            int numbOHTERS= Integer.parseInt(object.getResult_others());

            formatResult = new  FormatResult(numbOHTERS);

            String str3=object.getParty_others()+":"+  Html.fromHtml("<font color='#FE6E17'>" + formatResult.getResult() +"</font>");

            //String str3=object.getParty_others()+":"+  Html.fromHtml("<font color='#FE6E17'>" +object.getResult_others() +"</font>");
            txtOthers.setText(str3);



            int numb1=0;
            int numb2=0;
            int numb3=0;
            int numb4=0;
            int numb5=0;
            int intTotal=0;
            numb1= Integer.parseInt(object.getResult_pdp());
            numb2= Integer.parseInt(object.getResult_apc());


            numb3= Integer.parseInt(object.getResult_others());

            numb4= Integer.parseInt(object.getResult_lp());

            numb5= Integer.parseInt(object.getResult_adc());

            intTotal= numb1 + numb2 + numb3 + numb4+numb5;



            formatResult = new  FormatResult(intTotal);

            str2="Total: "+String.valueOf(formatResult.getResult());
           txtTotal.setText(str2);


/*
            Spannable spannable = new SpannableString(String.valueOf(numb1)) ;
            spannable.setSpan( new ForegroundColorSpan(Color.rgb(#FE6E17)),5,13,Spannable.SPAN_EXCLUSIVE_EXCLUSIVE);

            Spannable spannable2 = new SpannableString(String.valueOf(numb2)) ;
            spannable.setSpan( new ForegroundColorSpan(Color.CYAN),5,13,Spannable.SPAN_EXCLUSIVE_EXCLUSIVE);

            Spannable spannable3 = new SpannableString(String.valueOf(numb3)) ;
            spannable.setSpan( new ForegroundColorSpan(Color.CYAN),5,13,Spannable.SPAN_EXCLUSIVE_EXCLUSIVE);

            str2=object.getParty_pdp()+":"+ spannable;
            txtPDP.setText(str2);

            str2=object.getParty_apc()+":"+ spannable2;
            txtAPC.setText(str2);

            str2=object.getParty_others()+":"+ spannable3;
            txtAPC.setText(str2);

 */









            butInfo.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {

                    androidx.appcompat.app.AlertDialog.Builder builder = new androidx.appcompat.app.AlertDialog.Builder(ShowTextDetails.this);
                    builder.setTitle("Info")

                            .setMessage("Adding to cart will override the previous item of this product, kindly use cart plus to  increase item number.")
                            .setPositiveButton("ok",null).create().show();


                }
            });


/*
        addToCardBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                object.setNumberInCart(numberOrder);
                managementCart.insertFood(object);
            }
        });

 */

        }catch(NullPointerException e){
            e.printStackTrace();
        }catch(Exception e){
            e.printStackTrace();
        }

    }

    private void initView() {
        addToCardBtn = findViewById(R.id.addToCardBtn);
        titleTxt = findViewById(R.id.titleTxt);



        txtPDP = findViewById(R.id.txtPDP);
        txtAPC = findViewById(R.id.txtAPC);
        txtOthers = findViewById(R.id.txtOthers);
        txtTotal = findViewById(R.id.txtTotal);
        txtWard = findViewById(R.id.textView1);
        txtLP=findViewById(R.id.txtLP);

        txtADC=findViewById(R.id.txtADC);

        picFood = findViewById(R.id.foodPic);
        btnBack= findViewById(R.id.button2);
        butInfo= findViewById(R.id.butInfo);




    }




}