package com.cargoland.cargolandfoods.Activity;

import android.content.Intent;
import android.graphics.Color;
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
import com.cargoland.cargolandfoods.Domain.FoodDomain;
import com.cargoland.cargolandfoods.Helper.ManagementCart;
import com.cargoland.cargolandfoods.MenuActivity;
import com.cargoland.cargolandfoods.MyDataString;
import com.cargoland.cargolandfoods.R;
import com.cargoland.cargolandfoods.UserProfile;
import com.squareup.picasso.Picasso;

import java.io.IOException;
import java.io.NotSerializableException;
import java.text.DecimalFormat;
import java.text.NumberFormat;

public class ShowDetailActivity extends AppCompatActivity {
    private TextView addToCardBtn;
    private TextView titleTxt, feeTxt, descriptionTxt, numberOrderTxt,feeTxt_2;
    private ImageView plusBtn, minusBtn, picFood;
    private FoodDomain object;
    private int numberOrder = 1;
    private ManagementCart managementCart;
Button btnBack,butInfo;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_show_detail);

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

        managementCart = new ManagementCart(this);

        initView();
        getBundle();
    }

    private void getBundle() {



        object = (FoodDomain) getIntent().getSerializableExtra("object");
/*
        int drawableResourceId = this.getResources().getIdentifier(object.getPic(), "drawable", this.getPackageName());

        Glide.with(this)
                .load(drawableResourceId)
                .into(picFood);

 */

        Picasso.get().load(object.getPic()).into(picFood);

        //titleTxt.setText(object.getTitle());
        titleTxt.setText(object.getItemName());
        feeTxt.setText("NGN" + object.getFee());
        descriptionTxt.setText(object.getDescription());
        numberOrderTxt.setText(String.valueOf(numberOrder));

        NumberFormat format  = new DecimalFormat("#,###");
        double myNumb= object.getFee();;
        String formattedNo = format.format(myNumb);
        //holder.fee_2.setText(formattedNo);

        if(Build.VERSION.SDK_INT >= Build.VERSION_CODES.N){
            feeTxt_2.setText(Html.fromHtml("&#8358;",Html.FROM_HTML_MODE_COMPACT) + formattedNo);
        }else{
            feeTxt_2.setText(Html.fromHtml("&#8358;") + formattedNo );
        }





        btnBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                MyDataString myDataString = new MyDataString();



                Intent intent = new Intent(ShowDetailActivity.this, MenuActivity.class);
                intent.putExtra("data", myDataString.getStrMyData());
                intent.putExtra("int_data", 1);
                startActivity(intent);
                finish();


            }
        });



        butInfo.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                androidx.appcompat.app.AlertDialog.Builder builder = new androidx.appcompat.app.AlertDialog.Builder(ShowDetailActivity.this);
                builder.setTitle("Info")

                        .setMessage("Adding to cart will override the previous item of this product, kindly use cart plus to  increase item number.")
                        .setPositiveButton("ok",null).create().show();


            }
        });

        plusBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                numberOrder = numberOrder + 1;
                numberOrderTxt.setText(String.valueOf(numberOrder));
            }
        });

        minusBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (numberOrder > 1) {
                    numberOrder = numberOrder - 1;
                }
                numberOrderTxt.setText(String.valueOf(numberOrder));
            }
        });

        addToCardBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                object.setNumberInCart(numberOrder);
                managementCart.insertFood(object);
            }
        });



    }

    private void initView() {
        addToCardBtn = findViewById(R.id.addToCardBtn);
        titleTxt = findViewById(R.id.titleTxt);
        feeTxt = findViewById(R.id.priceTxt);
        feeTxt_2 = findViewById(R.id.priceTxt_2);

        descriptionTxt = findViewById(R.id.descriptionTxt);
        numberOrderTxt = findViewById(R.id.numberOrderTxt);
        plusBtn = findViewById(R.id.plusBtn);
        minusBtn = findViewById(R.id.minusBtn);
        picFood = findViewById(R.id.foodPic);
       btnBack= findViewById(R.id.button2);
        butInfo= findViewById(R.id.butInfo);
    }




}