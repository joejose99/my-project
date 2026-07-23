package com.cargoland.cargolandfoods;

import android.content.Context;
import android.content.Intent;
import android.graphics.Color;
import android.os.Bundle;

import com.cargoland.cargolandfoods.Domain.FoodDomain;
import com.cargoland.cargolandfoods.Helper.ManagementCart;
import com.cargoland.cargolandfoods.Interface.ChangeNumberItemsListener;
import com.google.android.material.snackbar.Snackbar;

import androidx.appcompat.app.AppCompatActivity;

import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.widget.Button;

import androidx.appcompat.widget.Toolbar;
import androidx.navigation.NavController;
import androidx.navigation.Navigation;
import androidx.navigation.ui.AppBarConfiguration;
import androidx.navigation.ui.NavigationUI;

import com.cargoland.cargolandfoods.databinding.ActivityPaymentThankBinding;

import java.util.ArrayList;

public class PaymentThankActivity extends AppCompatActivity {

    private Toolbar mTopToolbar;
    private Button butPay = null;
    ManagementCart managementCart ;
    Context context;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_payment_thank);
        Toolbar toolbar = findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);


        Window window = getWindow();

        /* Change status bar background color to white */
        window.clearFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN);

        window.addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS);

        int colorCodeLight = Color.parseColor("#ffffff");
        window.setStatusBarColor(colorCodeLight);

        managementCart = new ManagementCart(this);

        getSupportActionBar().setDisplayShowHomeEnabled(true);
        //getSupportActionBar().setLogo(R.drawable.logo5);
        getSupportActionBar().setDisplayUseLogoEnabled(true);
        getSupportActionBar().setTitle("   ");

        mTopToolbar=(Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(mTopToolbar);

        butPay = findViewById(R.id.butReg);




        butPay.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                ArrayList<FoodDomain> foodlist = new ArrayList<>();
                foodlist.add(new FoodDomain("1","1","item","Pepperoni pizza", "pizza1", "slices pepperoni ,mozzarella cheese, fresh oregano,  ground black pepper, pizza sauce", 9.76));
                //foodlist.add(new FoodDomain(fooddomain.getProductId(),fooddomain.getTitle(),fooddomain.getPic(),fooddomain.getDescription(),fooddomain.getFee()));
                managementCart.ClearCart(foodlist, 1, context, new ChangeNumberItemsListener() {
                    @Override
                    public void changed() {
                        //calculateCard();
                    }
                }) ;
               // MyDataString myDataString = new MyDataString();
                //myDataString.clearDates();


                // Log.d(TAG, "Subscribing to weather topic");
                Intent intent = new Intent(PaymentThankActivity.this,MenuActivity.class);
                startActivity(intent);


                finish();


            }
        });
    }

}