package com.cargoland.cargolandfoods.Activity;

import android.content.Context;
import android.content.Intent;
import android.graphics.Color;
import android.graphics.drawable.ColorDrawable;
import android.net.Uri;
import android.os.Build;
import android.os.Bundle;
import android.text.Html;
import android.util.Log;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.LinearLayout;
import android.widget.ScrollView;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.cargoland.cargolandfoods.Adapter.CartListAdapter;
import com.cargoland.cargolandfoods.DeliveryAddressActivity;
import com.cargoland.cargolandfoods.Domain.FoodDomain;
import com.cargoland.cargolandfoods.Helper.ManagementCart;
import com.cargoland.cargolandfoods.Interface.ChangeNumberItemsListener;
import com.cargoland.cargolandfoods.MenuActivity;
import com.cargoland.cargolandfoods.MyDataString;
import com.cargoland.cargolandfoods.R;
import com.cargoland.cargolandfoods.UserLogin;
import com.cargoland.cargolandfoods.UserProfile;
import com.google.android.material.bottomsheet.BottomSheetDialog;
import com.google.android.material.floatingactionbutton.FloatingActionButton;

import java.text.DecimalFormat;
import java.text.NumberFormat;
import java.util.ArrayList;

public class CartListActivity extends AppCompatActivity {
    private RecyclerView.Adapter adapter;
    private RecyclerView recyclerViewList;
    private ManagementCart managementCart;
    private TextView totalFeeTxt, taxTxt, deliveryTxt, totalTxt, emptyTxt,totalTxt_2,textView16;
    private double tax;
    private ScrollView scrollView;
    FoodDomain fooddomain;
    TextView txt_company_name,txt_company_phone,txt_logout,txt_exit;
    Context context;
   // Button textView16;
    MyDataString myDataString = new MyDataString();
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        try{
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_card_list);

        myDataString.setCategory_Type(1);
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


        managementCart = new ManagementCart(this);

        initView();
        initList();
        calculateCard();
        bottomNavigation();



        textView16.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Log.d(TAG, "Subscribing to weather topic");

                Intent intent = new Intent(CartListActivity.this, DeliveryAddressActivity.class);
                startActivity(intent);
                finish();


                //Toast.makeText(CartListActivity.this, "Payment not Available  yet.", Toast.LENGTH_LONG).show();


            }
        });

        }catch(NullPointerException e){
            e.printStackTrace();
        }catch (Exception e){
            e.printStackTrace();
        }
    }




    private void ExitApp(){

        android.os.Process.killProcess(android.os.Process.myPid());
        System.exit(1);
    }



    private void bottomNavigation() {
        //FloatingActionButton floatingActionButton = findViewById(R.id.card_btn);
        FloatingActionButton floatingActionButton = findViewById(R.id.card_btn);
        LinearLayout homeBtn = findViewById(R.id.homeBtn);
        LinearLayout profileBtn = findViewById(R.id.profileBtn);
        LinearLayout supportBtn = findViewById(R.id.supportBtn);
        LinearLayout settingBtn = findViewById(R.id.settingBtn);

        floatingActionButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(CartListActivity.this, CartListActivity.class));
            }
        });

        homeBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                MyDataString  myDataString = new MyDataString();

                Intent intent1 = getIntent();


                Intent intent = new Intent(CartListActivity.this, MenuActivity.class);
                intent.putExtra("data", myDataString.getStrMyData());
                intent.putExtra("int_data", 1);
                startActivity(intent);
                finish();


                //Log.i("Data","My Data String String ************* "+ myDataString.getStrMyData());
                //startActivity(new Intent(CartListActivity.this, MenuActivity.class));
            }
        });

        profileBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                MyDataString  myDataString = new MyDataString();



                Intent intent = new Intent(CartListActivity.this, UserProfile.class);
                intent.putExtra("data", myDataString.getStrMyData());
                intent.putExtra("int_data", 1);
                startActivity(intent);
                finish();
                //startActivity(new Intent(CartListActivity.this, UserProfile.class));
            }
        });



        settingBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                showProfileBottomSheet( context, true);

            }
        });


        supportBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent  browserIntent  = new Intent(Intent.ACTION_VIEW, Uri.parse("https://tawk.to/chat/60b7cf63de99a4282a1b0bc0/1f77047de"));
                startActivity(browserIntent);





            }
        });

    }








    private void initList() {
        LinearLayoutManager linearLayoutManager = new LinearLayoutManager(this, LinearLayoutManager.VERTICAL, false);
        recyclerViewList.setLayoutManager(linearLayoutManager);
        adapter = new CartListAdapter(managementCart.getListCard(), this, new ChangeNumberItemsListener() {
            @Override
            public void changed() {
                calculateCard();
            }
        });

        recyclerViewList.setAdapter(adapter);
        if (managementCart.getListCard().isEmpty()) {
            emptyTxt.setVisibility(View.VISIBLE);
            scrollView.setVisibility(View.GONE);
        } else {
            emptyTxt.setVisibility(View.GONE);
            scrollView.setVisibility(View.VISIBLE);
        }
    }

    private void calculateCard() {
        try{


       MyDataString myDataString = new MyDataString();

        //double percentTax = 0.075;
        //double delivery = 10;
        double percentTax = Double.parseDouble(myDataString.getTaxRate());
        double delivery = Double.parseDouble(myDataString.getDeliveryRate());


        tax = Math.round((managementCart.getTotalFee() * percentTax) * 100.0) / 100.0;
        double total = Math.round((managementCart.getTotalFee() + Math.round(tax) + delivery) * 100.0) / 100.0;
        double itemTotal = Math.round(managementCart.getTotalFee() * 100.0) / 100.0;
/*
        totalFeeTxt.setText("NGN" + itemTotal);
        taxTxt.setText("NGN" + tax);
        deliveryTxt.setText("NGN" + delivery);
        totalTxt.setText("NGN" + total);

 */



        if(Build.VERSION.SDK_INT >= Build.VERSION_CODES.N){
            totalFeeTxt.setText(Html.fromHtml("&#8358;",Html.FROM_HTML_MODE_COMPACT) +formateCur(itemTotal) );
        }else{
            totalFeeTxt.setText(Html.fromHtml("&#8358;") +formateCur(itemTotal));
        }

        if(Build.VERSION.SDK_INT >= Build.VERSION_CODES.N){
            taxTxt.setText(Html.fromHtml("&#8358;",Html.FROM_HTML_MODE_COMPACT) +formateCur( Math.round(tax)) );
        }else{
            taxTxt.setText(Html.fromHtml("&#8358;") +formateCur( Math.round(tax)));
        }

        if(Build.VERSION.SDK_INT >= Build.VERSION_CODES.N){
            deliveryTxt.setText(Html.fromHtml("&#8358;",Html.FROM_HTML_MODE_COMPACT) +formateCur(delivery) );
        }else{
            deliveryTxt.setText(Html.fromHtml("&#8358;") +formateCur(delivery));
        }

        if(Build.VERSION.SDK_INT >= Build.VERSION_CODES.N){
            totalTxt_2.setText(Html.fromHtml("&#8358;",Html.FROM_HTML_MODE_COMPACT) +formateCur(total) );
        }else{
            totalTxt_2.setText(Html.fromHtml("&#8358;") +formateCur(total));
        }
        }catch(NullPointerException e){
            e.printStackTrace();
        }catch (Exception e){
            e.printStackTrace();
        }
    }

    private void initView() {
        recyclerViewList = findViewById(R.id.recyclerview);
        totalFeeTxt = findViewById(R.id.totalFeeTxt);
        totalTxt_2 = findViewById(R.id.totalTxt_2);
        taxTxt = findViewById(R.id.taxTxt);
        deliveryTxt = findViewById(R.id.deliveryTxt);
        totalTxt = findViewById(R.id.totalTxt);
        emptyTxt = findViewById(R.id.emptyTxt);
        scrollView = findViewById(R.id.scrollView4);
        textView16= (TextView)findViewById(R.id.textView16);


    }


    /*
     textView16.setOnClickListener(new View.OnClickListener() {
        @Override
        public void onClick(View v) {
            Intent  browserIntent  = new Intent(Intent.ACTION_VIEW, Uri.parse("https://tawk.to/chat/60b7cf63de99a4282a1b0bc0/1f77047de"));
            startActivity(browserIntent);





        }
    });

     */




    private String formateCur(double dbl){
        NumberFormat format  = new DecimalFormat("#,###.##");
        double myNumb= dbl;
        String formattedNo = format.format(myNumb);
        return formattedNo;
    }



    /* POPUP MENU STARTS HERE ***************************** */


    private void showProfileBottomSheet(final Context context, boolean isName) {

        int layout = 0;

        if (isName) {
            layout = R.layout.settings;
        }



        final View view = getLayoutInflater().inflate(layout, null);
        Log.i("bottom","Bottom sheet");

        final BottomSheetDialog bottomSheetDialog = new BottomSheetDialog(this);
        bottomSheetDialog.setContentView(view);

        bottomSheetDialog.getWindow().setBackgroundDrawable(new ColorDrawable(Color.TRANSPARENT));
        bottomSheetDialog.show();



        if (isName) {

            txt_company_name =(TextView) view.findViewById(R.id.txt_company_name);
            txt_company_phone =(TextView) view.findViewById(R.id.txt_company_phone);
            txt_logout =(TextView) view.findViewById(R.id.txt_logout);
            txt_exit =(TextView) view.findViewById(R.id.txt_exit);




            txt_company_name.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {

                    MyDataString  myDataString = new MyDataString();

                    Intent intent = new Intent(CartListActivity.this, UserProfile.class);
                    intent.putExtra("data", myDataString.getStrMyData());
                    intent.putExtra("int_data", 1);
                    startActivity(intent);
                    finish();
/*
                    Intent intent = new Intent(CartListActivity.this,UserProfile.class);

                    startActivity(intent);
                    finish();

 */

                }
            });



            txt_company_phone.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    Intent intent = new Intent();
                    intent.setAction(Intent.ACTION_SEND);
                    intent.setType("text/plain");
                    String urlShare="https://play.google.com/store/apps/details?id=com.shiptodor.shiptodor&gl=GB";
                    String message="Cargoland foods \n\r Kindly download the app for your foods supply";

                    String urlShare_now =message+"\n\r"+urlShare;

                    intent.putExtra(Intent.EXTRA_TEXT,urlShare_now);
//intent.putExtra(Intent.EXTRA_TEXT,message);
                    //intent.putExtra(Intent.EXTRA_PROCESS_TEXT,message);
                    startActivity(Intent.createChooser(intent,"Share"));



                }


            });


            txt_logout.setOnClickListener(new View.OnClickListener() {
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






                        Intent intent = new Intent(CartListActivity.this, UserLogin.class);

                    startActivity(intent);
                    finish();

                }
            });

            txt_exit.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {

                    ArrayList<FoodDomain> foodlist = new ArrayList<>();
                    foodlist.add(new FoodDomain("1","1","item","Pepperoni pizza", "pizza1", "slices pepperoni ,mozzarella cheese, fresh oregano,  ground black pepper, pizza sauce", 9.76));
                       managementCart.ClearCart(foodlist, 1, context, new ChangeNumberItemsListener() {
                        @Override
                        public void changed() {
                            //calculateCard();
                        }
                    }) ;

                    ExitApp();

                }
            });




        }





    }

}