package com.shiptodoor.shiptodoor;

import android.app.ProgressDialog;
import android.content.Intent;
import android.database.Cursor;
import android.graphics.Color;
import android.os.Bundle;

import com.google.android.material.floatingactionbutton.FloatingActionButton;
import com.google.android.material.snackbar.Snackbar;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import android.text.Html;
import android.text.TextUtils;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.widget.Button;


import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import android.view.View;


import android.annotation.SuppressLint;



import android.os.Environment;

import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.InputStreamReader;
import java.util.Locale;
import java.text.*;
import java.util.Date;

import android.content.pm.ResolveInfo;

import android.telephony.TelephonyManager;

import android.content.Context;

import android.content.pm.PackageInfo;
import android.content.pm.PackageManager;


import android.app.Activity;
import android.Manifest;
import android.content.Intent;

import android.view.Menu;
import android.view.MenuItem;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;

import android.widget.ImageView;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Spinner;
import android.widget.Toast;
import android.view.inputmethod.InputMethodManager;

import java.net.HttpURLConnection;
import java.net.URL;

import android.content.ActivityNotFoundException;


import android.content.ClipData;






import androidx.annotation.NonNull;


import android.util.Log;
import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.iid.FirebaseInstanceId;
import com.google.firebase.iid.InstanceIdResult;
import com.google.firebase.messaging.FirebaseMessaging;


import android.os.AsyncTask;
import android.widget.EditText;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;
import org.w3c.dom.Text;


import java.util.ArrayList;
import java.util.List;

import java.io.IOException;



import android.provider.MediaStore;
import android.provider.Settings;




import android.app.AlertDialog;
import android.content.ContentResolver;

import android.content.DialogInterface;

import android.location.Address;
import android.location.Geocoder;
import android.location.Location;
import android.location.LocationListener;
import android.location.LocationManager;

import androidx.core.content.ContextCompat;


import android.widget.TextView;
import android.widget.ProgressBar;
import android.widget.ListView;

import me.abhinay.input.CurrencyEditText;
import me.abhinay.input.CurrencySymbols;

import java.util.Currency;
import java.util.Locale;


public class PriceActivity extends AppCompatActivity {

    private Button butReg = null;
    private Button butBack = null;

    private Button but_drop,but_resfresh= null;
    private Button but_signatory = null;

    ProgressDialog progressDialog;

    private Toolbar  mTopToolbar;

     private String HttpURL = "https://www.cargoland.shiptodoor.com/cargoland/price.php";
    //private String HttpURL = "https://www.eciesl.com/cargoland/price.php";


    private String spannerHolder, spanner1Holder, spanner2Holder, spanner3Holder, spanner4Holder, spanner5Holder, spanner6Holder,spannerDurexHolder,spanner7Holder, spanner8Holder, spanner9Holder,panner10Holder, IMEIHolder;

    private String txtSpinner1,txtUserId, txtSpinner3, txtSpinner2, txtSpinner4, txtSpinner5, txtSpinner6, txtSpinnerPop, txtSpinnerPop3, txtSpinnerPop4;

    Spinner spinner2, spinner1, spinner6, spinner3, spinner4, spinner5,spinnerCountry,spinnerState,spinnerLGA,spinnerKg,spinnerType;

    private ArrayList<String> country_list = new ArrayList<>();
    private ArrayList<String> state_list = new ArrayList<>();
    private ArrayList<String> lga_list = new ArrayList<>();
    private ArrayList<String> ship_list = new ArrayList<>();
    private ArrayList<String> kg_list = new ArrayList<>();

   private String tot_price_sig;
    private String tot_price_drop;

    private String  price_vat_pickup_charge_delivery_charge;
    /* ****** Sender */


    private String txtSenderFname="";
    private String txtSenderSurname="";
    private String txtSenderAnswer=null;
    private String txtEmail="";

    private String txtSenderAddress;
    private String txtSenderCity;
    private String txtSenderPostCode;
    private String txtSenderCountry;
    private String txtSenderState;
    private String txtSenderlga;
    private String txtSenderMobile;
    private int  selected_IdSender= 0;
    private int txtselected_IdSender;
    private  int  noLenthSender=0;
    private int txtselected_country_IdSender;




    /* ****** Receiver */


    private String txtReceiverFname="";
    private String txtReceiverSurname="";
    private String txtReceiverAnswer=null;
    // private String txtEmail="";

    private String txtReceiverAddress;
    private String txtReceiverCity;
    private String txtReceiverPostCode;
    private String txtReceiverCountry;
    private String txtReceiverMobile;
    private int  selected_IdReceiver= 0;
    private int txtselected_IdReceiver;
    private  int  noLenthReceiver=0;
    private int txtselected_country_IdReceiver;




    /* ****** Pickup */


    private String txtPickupFname="";
    private String txtPickupSurname="";
    private String txtPickupAnswer=null;
    // private String txtEmail="";


    private String txtPickupAddress;
    private String txtPickupCity;
    private String txtPickupPostCode;
    private String txtPickupCountry;
    private String txtPickupState;
    private String txtPickuplga;
    private String txtPickupMobile;
    private int  selected_IdPickup= 0;
    private int txtselected_Id;
    private  int  noLenth=0;
    private  int  noLenth_Pickup=0;


    private int selected_Id_kg =0;

    /* Destination */
    private String txtDestCountry="";
    private String txtKg ="";
    private String  txtDestState ="";
    private String txtDestLGA ="";
    private String txtShippingType ="";
    private String txtdescription ="";
    private String txtPrice;
    private String txtDestination=null;
    private String choice_id;


    private int  txtSelected_Id_kg_dest= 0;
    private int txtSelected_Id_lga_dest;
    private  int  txtSelected_state_dest=0;
    private int txtselected_Type_dest;
    private int txtselected_Country_dest;


    private  String  txtDecision;
    private  int  intDecision_id=0;

    private boolean CheckEditText ;

    private RadioGroup radioStatusGroup;
    private RadioButton radioStatusButton;

    private  int state_pickup_id;
    private int lga_pickup_id;

    private int state_sender_id;
    private int lga_sender_id;

   private String nairaSymbole;
private String nairaCode ;

    HttpParse httpParse = new HttpParse();
    String IMEI_Number_Holder;
    TelephonyManager telephonyManager;

    DBHelper  mydb = new DBHelper(this);

    ArrayAdapter adapter;
    EditText ed1, ed2, ed3, ed4, ed5, ed6,ed7,ed8;
    private  String txt1, txt2, txt3, txt4, txt5,txt6, txt7, txt8;


    String finalResult, rst, result;

    TextView tv1, tv2, tv3, tv4, tv5;

    CurrencyEditText etInput,etInput_amt;

    private double amount;
    private double tAmount;
    private int errorNo=0;

    public  String nairaSymboles;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        try{

        setContentView(R.layout.activity_price);
        Toolbar toolbar = findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

            Window window = getWindow();

            /* Change status bar background color to white */
            window.clearFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN);

            window.addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS);

            int colorCodeLight = Color.parseColor("#ffffff");
            window.setStatusBarColor(colorCodeLight);


        getSupportActionBar().setDisplayShowHomeEnabled(true);
        //getSupportActionBar().setLogo(R.drawable.logo5);
        getSupportActionBar().setDisplayUseLogoEnabled(true);
        getSupportActionBar().setTitle("   Send Items");

        mTopToolbar=(Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(mTopToolbar);
        butBack = findViewById(R.id.button2);


        but_signatory = (Button)findViewById(R.id.but_signatory);
        but_drop =  (Button) findViewById(R.id.but_drop);
            but_resfresh = (Button) findViewById(R.id.but_resfresh);

            String htmlString ="<u> Refresh </u>";
            but_resfresh.setText(Html.fromHtml(htmlString));

        butReg =  (Button) findViewById(R.id.butReg);

        but_signatory.setText("");
        but_drop.setText("");
        //ed1=(EditText)findViewById(R.id.txtPrice);

        Locale local =  Locale.getDefault();
        Log.e("Line : ","First Line".toString());


        Locale nigLocal = new Locale("en","NG");
        Currency curr=  Currency.getInstance(nigLocal);
        nairaCode = curr.getCurrencyCode();
        nairaSymbole =curr.getSymbol();
            nairaSymboles =curr.getSymbol();
            Log.i("Naira","Naira Symboles "+ nairaSymbole);
        Log.e("Line : ","Second Line".toString());

        etInput= (CurrencyEditText) findViewById(R.id.etInput);

            //etInput.setText("");

        etInput_amt = (CurrencyEditText) findViewById(R.id.etInput_amt);
       // etInput.setCurrency(CurrencySymbols.USA);


        but_drop.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

try{
                String price =tot_price_drop;
                etInput.setText(price.toString());
                Log.e("Drop Devlivery : ","Deliver on Drop".toString());

} catch (NullPointerException e) {
    e.printStackTrace();
}
catch (IndexOutOfBoundsException el) {
    el.printStackTrace();
}
catch (RuntimeException el) {
    el.printStackTrace();
}
            }

        });

        but_signatory.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                try{
             String price =tot_price_sig;
                etInput.setText(price.toString());

                Log.e("Signature : ","Deliver on Signatory".toString());

                } catch (NullPointerException e) {
                    e.printStackTrace();
                }
                catch (IndexOutOfBoundsException el) {
                    el.printStackTrace();
                }
                catch (RuntimeException el) {
                    el.printStackTrace();
                }
            }

        });

        but_drop.setOnFocusChangeListener(new View.OnFocusChangeListener(){
            public void onFocusChange(View v, boolean hasFocus){
                if(hasFocus){
                    v.performClick();
                }
            }
        });


        but_signatory.setOnFocusChangeListener(new View.OnFocusChangeListener(){
            public void onFocusChange(View v, boolean hasFocus){
                if(hasFocus){
                    v.performClick();
                }
            }
        });




            but_resfresh.setOnClickListener(new View.OnClickListener() {
                                           @Override
                                           public void onClick(View v) {

                                               try {
                                               String price ="amount";
                                               getPrice(price) ;

                                               } catch (NullPointerException e) {
                                                   e.printStackTrace();
                                               }
                                               catch (IndexOutOfBoundsException el) {
                                                   el.printStackTrace();
                                               }
                                               catch (RuntimeException el) {
                                                   el.printStackTrace();
                                               }

                                           }
            });


        butBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Log.d(TAG, "Subscribing to weather topic");
                Intent intent = new Intent(PriceActivity.this,PickUpAddress.class);

                intent.putExtra("key", country_list);
                intent.putExtra("key_state", state_list);
                intent.putExtra("key_lga", lga_list);
                intent.putExtra("key_kg", kg_list);
                intent.putExtra("key_ship", ship_list);

                intent.putExtra("txtdescription",txtdescription);
                intent.putExtra("txtDestCountry",txtDestCountry);
                intent.putExtra("txtDestination",txtDestination);
                intent.putExtra("txtDestState",txtDestState);
                intent.putExtra("txtDestLGA",txtDestLGA);
                intent.putExtra("txtKg",txtKg);
                intent.putExtra("txtShippingType",txtShippingType);
                intent.putExtra("txtPrice",txtPrice);
                intent.putExtra("spanner3Holder",spanner3Holder);

                intent.putExtra("txtselected_Country_dest",txtselected_Country_dest);
                intent.putExtra("txtSelected_state_dest",txtSelected_state_dest);
                intent.putExtra("txtSelected_Id_lga_dest",txtSelected_Id_lga_dest);
                intent.putExtra("txtselected_Type_dest",txtselected_Type_dest);
                intent.putExtra("txtSelected_Id_kg_dest",txtSelected_Id_kg_dest);


                intent.putExtra("price_vat_pickup_charge_delivery_charge",price_vat_pickup_charge_delivery_charge);



                /* pick up section */

                intent.putExtra("txtPickupFname",txtPickupFname);
                intent.putExtra("txtPickupSurname",txtPickupSurname);
                intent.putExtra("txtPickupAnswer",txtPickupAnswer);
                intent.putExtra("txtPickupAddress",txtPickupAddress);
                intent.putExtra("txtPickupCity",txtPickupCity);
                intent.putExtra("txtPickupPostCode",txtPickupPostCode);
                intent.putExtra("txtPickupCountry",txtPickupCountry);
                intent.putExtra("txtPickuplga",txtPickuplga);
                intent.putExtra("txtPickupState",txtPickupState);

                intent.putExtra("txtPickupMobile",txtPickupMobile);
                intent.putExtra("selected_IdPickup",selected_IdPickup);
                intent.putExtra("txtselected_Id",txtselected_Id);
                intent.putExtra("noLenth_Pickup",noLenth_Pickup);
                intent.putExtra("state_pickup_id",state_pickup_id);
                intent.putExtra("lga_pickup_id",lga_pickup_id);

                intent.putExtra("txtDecision",txtDecision);
                intent.putExtra("intDecision_id",intDecision_id);

                /* Receiver section */

                intent.putExtra("txtReceiverFname",txtReceiverFname);
                intent.putExtra("txtReceiverSurname",txtReceiverSurname);
                intent.putExtra("txtReceiverAnswer",txtReceiverAnswer);
                intent.putExtra("txtReceiverAddress",txtReceiverAddress);
                intent.putExtra("txtReceiverCity",txtReceiverCity);
                intent.putExtra("txtReceiverPostCode",txtReceiverPostCode);
                intent.putExtra("txtReceiverCountry",txtReceiverCountry);

                intent.putExtra("txtReceiverMobile",txtReceiverMobile);
                intent.putExtra("selected_IdReceiver",selected_IdReceiver);
                intent.putExtra("txtselected_IdReceiver",txtselected_IdReceiver);
                intent.putExtra("noLenthReceiver",noLenthReceiver);

                intent.putExtra("txtselected_country_IdReceiver",txtselected_country_IdReceiver);



                /* Sender section */

                intent.putExtra("txtSenderFname",txtSenderFname);
                intent.putExtra("txtSenderSurname",txtSenderSurname);
                intent.putExtra("txtSenderAnswer",txtSenderAnswer);

                intent.putExtra("txtEmail",txtEmail);
                intent.putExtra("txtSenderAddress",txtSenderAddress);
                intent.putExtra("txtSenderCity",txtSenderCity);
                intent.putExtra("txtSenderPostCode",txtSenderPostCode);
                intent.putExtra("txtSenderCountry",txtSenderCountry);
                intent.putExtra("txtSenderlga",txtSenderlga);
                intent.putExtra("txtSenderState",txtSenderState);

                intent.putExtra("txtSenderMobile",txtSenderMobile);
                intent.putExtra("selected_IdSender",selected_IdSender);
                intent.putExtra("txtselected_IdSender",txtselected_IdSender);
                intent.putExtra("noLenthSender",noLenthSender);

                intent.putExtra("txtselected_country_IdSender",txtselected_country_IdSender);

                intent.putExtra("state_sender_id",state_sender_id);
                intent.putExtra("lga_sender_id",lga_sender_id);

                startActivity(intent);
                finish();
            }
        });


        butReg.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Log.d(TAG, "Subscribing to weather topic");


                Intent intent = new Intent(PriceActivity.this,ReceiverActivity.class);

                ValidateText();


                if(CheckEditText){



                   // spanner1Holder =String.valueOf(spinnerCountry.getSelectedItem());

                    txt1 = etInput.getText().toString();


                    intent.putExtra("txtdescription",txtdescription);
                    intent.putExtra("txtDestCountry",txtDestCountry);
                    intent.putExtra("txtDestination",txtDestination);
                    intent.putExtra("txtDestState",txtDestState);
                    intent.putExtra("txtDestLGA",txtDestLGA);
                    intent.putExtra("txtKg",txtKg);
                    intent.putExtra("txtShippingType",txtShippingType);
                    intent.putExtra("txtPrice",txt1);

                    intent.putExtra("key", country_list);
                    intent.putExtra("key_state", state_list);
                    intent.putExtra("key_lga", lga_list);
                    intent.putExtra("key_kg", kg_list);
                    intent.putExtra("key_ship", ship_list);

                    intent.putExtra("txtselected_Country_dest",txtselected_Country_dest);
                    intent.putExtra("txtSelected_state_dest",txtSelected_state_dest);
                    intent.putExtra("txtSelected_Id_lga_dest",txtSelected_Id_lga_dest);
                    intent.putExtra("txtselected_Type_dest",txtselected_Type_dest);
                    intent.putExtra("txtSelected_Id_kg_dest",txtSelected_Id_kg_dest);


                    intent.putExtra("price_vat_pickup_charge_delivery_charge",price_vat_pickup_charge_delivery_charge);


                    /* pick up section */

                    intent.putExtra("txtPickupFname",txtPickupFname);
                    intent.putExtra("txtPickupSurname",txtPickupSurname);
                    intent.putExtra("txtPickupAnswer",txtPickupAnswer);
                    intent.putExtra("txtPickupAddress",txtPickupAddress);
                    intent.putExtra("txtPickupCity",txtPickupCity);
                    intent.putExtra("txtPickupPostCode",txtPickupPostCode);
                    intent.putExtra("txtPickupCountry",txtPickupCountry);
                    intent.putExtra("txtPickuplga",txtPickuplga);
                    intent.putExtra("txtPickupState",txtPickupState);
                    intent.putExtra("txtPickupMobile",txtPickupMobile);
                    intent.putExtra("selected_IdPickup",selected_IdPickup);
                    intent.putExtra("txtselected_Id",txtselected_Id);
                    intent.putExtra("selected_IdPickup",selected_IdPickup);
                    intent.putExtra("noLenth_Pickup",noLenth_Pickup);

                    intent.putExtra("state_pickup_id",state_pickup_id);
                    intent.putExtra("lga_pickup_id",lga_pickup_id);

                    intent.putExtra("txtDecision",txtDecision);
                    intent.putExtra("intDecision_id",intDecision_id);


                    /* Receiver section */

                    intent.putExtra("txtReceiverFname",txtReceiverFname);
                    intent.putExtra("txtReceiverSurname",txtReceiverSurname);
                    intent.putExtra("txtReceiverAnswer",txtReceiverAnswer);
                    intent.putExtra("txtReceiverAddress",txtReceiverAddress);
                    intent.putExtra("txtReceiverCity",txtReceiverCity);
                    intent.putExtra("txtReceiverPostCode",txtReceiverPostCode);
                    intent.putExtra("txtReceiverCountry",txtReceiverCountry);

                    intent.putExtra("txtReceiverMobile",txtReceiverMobile);
                    intent.putExtra("selected_IdReceiver",selected_IdReceiver);
                    intent.putExtra("txtselected_IdReceiver",txtselected_IdReceiver);
                    intent.putExtra("noLenthReceiver",noLenthReceiver);

                    intent.putExtra("txtselected_country_IdReceiver",txtselected_country_IdReceiver);

                    intent.putExtra("spanner3Holder",spanner3Holder);

                    /* Sender section */

                    intent.putExtra("txtSenderFname",txtSenderFname);
                    intent.putExtra("txtSenderSurname",txtSenderSurname);
                    intent.putExtra("txtSenderAnswer",txtSenderAnswer);

                    intent.putExtra("txtEmail",txtEmail);
                    intent.putExtra("txtSenderAddress",txtSenderAddress);
                    intent.putExtra("txtSenderCity",txtSenderCity);
                    intent.putExtra("txtSenderPostCode",txtSenderPostCode);
                    intent.putExtra("txtSenderCountry",txtSenderCountry);
                    intent.putExtra("txtSenderlga",txtSenderlga);
                    intent.putExtra("txtSenderState",txtSenderState);

                    intent.putExtra("txtSenderMobile",txtSenderMobile);
                    intent.putExtra("selected_IdSender",selected_IdSender);
                    intent.putExtra("txtselected_IdSender",txtselected_IdSender);
                    intent.putExtra("noLenthSender",noLenthSender);

                    intent.putExtra("txtselected_country_IdSender",txtselected_country_IdSender);
                    intent.putExtra("state_sender_id",state_sender_id);
                    intent.putExtra("lga_sender_id",lga_sender_id);


                    startActivity(intent);


                    finish();



                }
                else {
                    if(errorNo ==1){
                        Toast.makeText(PriceActivity.this, "Please Refresh to get the right price.", Toast.LENGTH_LONG).show();
                        errorNo=0;
                        return;
                    }else{
                        Toast.makeText(PriceActivity.this, "Please fill all form fields.", Toast.LENGTH_LONG).show();

                    }
                        }






            }
        });


            etInput.setDelimiter(false);
            etInput.setSpacing(false);
            etInput.setDecimals(false);

            etInput.setSpacing(true);

            etInput_amt.setDelimiter(false);
            etInput_amt.setSpacing(false);
            etInput_amt.setDecimals(false);

            etInput_amt.setSpacing(true);

        update_Text();

        String txtResident =getCountry();

        if(txtResident != null)
        {
           /*
            if(txtResident.trim().equals("Nigeria") && txtDestination.trim().equals("International"))
            {
                etInput.setCurrency(CurrencySymbols.USA);
                etInput_amt.setCurrency(CurrencySymbols.USA);
            }

            */
            if(txtResident.trim().equals("Nigeria"))
            {
                etInput.setCurrency(nairaSymbole);
                etInput_amt.setCurrency(nairaSymbole);
            }

            if(!txtResident.trim().equals("Nigeria")){
                etInput.setCurrency(CurrencySymbols.USA);
                etInput_amt.setCurrency(CurrencySymbols.USA);
            }

        }





        //etInput.setSeparator(".");
        Log.e("Line : ",txtResident.toString());

        //Make sure that Decimals is set as false if a custom Separator is used
        //





        String price ="amount";
/*
Post data to server to calculate the price for the chosen shipment type and and wight

 */
        getPrice(price);

        Log.e("Line : "," Line 5".toString());
/*
        etInput.setOnFocusChangeListener(new View.OnFocusChangeListener() {
            @Override
            public void onFocusChange(View v, boolean hasFocus) {
                if (!hasFocus) {
                    hideKeyboard(v);
                }
            }
        });

 */

        Log.e("Line : "," Line 6".toString());



            /* error */

        } catch (NullPointerException e) {
            e.printStackTrace();
        }
        catch (IndexOutOfBoundsException el) {
            el.printStackTrace();
        }
        catch (RuntimeException el) {
            el.printStackTrace();
        }





    }


    /*CALLING METHOD THAT HELP TO HIDE KEYBOARD  WHEN TOUCH BODY */
    public void hideKeyboard(View view) {
        InputMethodManager inputMethodManager =(InputMethodManager)getSystemService(Activity.INPUT_METHOD_SERVICE);
        inputMethodManager.hideSoftInputFromWindow(view.getWindowToken(), 0);


    }

    public void update_Text(){
try{
        Intent intent3 = getIntent();
        country_list = (ArrayList<String>) getIntent().getSerializableExtra("key");

        state_list = (ArrayList<String>) getIntent().getSerializableExtra("key_state");
        lga_list = (ArrayList<String>) getIntent().getSerializableExtra("key_lga");
        ship_list = (ArrayList<String>) getIntent().getSerializableExtra("key_ship");
        kg_list = (ArrayList<String>) getIntent().getSerializableExtra("key_kg");

        // txtFname = intent3.getStringExtra("txtFname");

        txtdescription =intent3.getStringExtra("txtdescription");
        txtDestCountry =intent3.getStringExtra("txtDestCountry");
        txtDestination =intent3.getStringExtra("txtDestination");
        txtDestState =intent3.getStringExtra("txtDestState");
        txtDestLGA =intent3.getStringExtra("txtDestLGA");
        txtKg =intent3.getStringExtra("txtKg");
        txtShippingType =intent3.getStringExtra("txtShippingType");
        txtPrice =intent3.getStringExtra("txtPrice");

        /* pick up section */

        txtPickupFname =intent3.getStringExtra("txtPickupFname");
        txtPickupSurname =intent3.getStringExtra("txtPickupSurname");
        txtPickupAnswer =intent3.getStringExtra("txtPickupAnswer");
        txtPickupAddress =intent3.getStringExtra("txtPickupAddress");
        txtPickupCity =intent3.getStringExtra("txtPickupCity");
        txtPickupPostCode =intent3.getStringExtra("txtPickupPostCode");
        txtPickupCountry =intent3.getStringExtra("txtPickupCountry");
        txtPickupMobile =intent3.getStringExtra("txtPickupMobile");
        txtPickuplga  =intent3.getStringExtra("txtPickuplga");
        txtPickupState=intent3.getStringExtra("txtPickupState");


        selected_IdPickup = intent3.getIntExtra("txtselected_country_Id_Pickup",0);
        txtselected_Id = intent3.getIntExtra("txtselected_Id",0);
        noLenth_Pickup = intent3.getIntExtra("noLenth_Pickup",0);

    txtDecision=intent3.getStringExtra("txtDecision");
    intDecision_id = intent3.getIntExtra("intDecision_id",0);
        /* Receiver section */


        txtReceiverFname =intent3.getStringExtra("txtReceiverFname");
        txtReceiverSurname =intent3.getStringExtra("txtReceiverSurname");
        txtReceiverAnswer =intent3.getStringExtra("txtReceiverAnswer");
        txtReceiverAddress =intent3.getStringExtra("txtReceiverAddress");
        txtReceiverCity =intent3.getStringExtra("txtReceiverCity");
        txtReceiverPostCode =intent3.getStringExtra("txtReceiverPostCode");
        txtReceiverCountry =intent3.getStringExtra("txtReceiverCountry");
        txtReceiverMobile =intent3.getStringExtra("txtReceiverMobile");
            spanner3Holder =intent3.getStringExtra("spanner3Holder");


        selected_IdReceiver = intent3.getIntExtra("selected_IdReceiver",0);
        txtselected_IdReceiver = intent3.getIntExtra("txtselected_IdReceiver",0);
        noLenthReceiver = intent3.getIntExtra("noLenthReceiver",0);
        txtselected_country_IdReceiver = intent3.getIntExtra("txtselected_country_IdReceiver",0);

        /* Sender section */

        txtSenderFname =intent3.getStringExtra("txtSenderFname");
        txtSenderSurname =intent3.getStringExtra("txtSenderSurname");
        txtSenderAnswer =intent3.getStringExtra("txtSenderAnswer");
        txtEmail =intent3.getStringExtra("txtEmail");
        txtSenderAddress =intent3.getStringExtra("txtSenderAddress");
        txtSenderCity =intent3.getStringExtra("txtSenderCity");
        txtSenderPostCode =intent3.getStringExtra("txtSenderPostCode");
        txtSenderCountry =intent3.getStringExtra("txtSenderCountry");
        txtSenderMobile =intent3.getStringExtra("txtSenderMobile");
        txtSenderlga =intent3.getStringExtra("txtSenderlga");
        txtSenderState =intent3.getStringExtra("txtSenderState");

    //price_vat_pickup_charge_delivery_charge =intent3.getStringExtra("price_vat_pickup_charge_delivery_charge");

        selected_IdSender = intent3.getIntExtra("selected_IdSender",0);
        txtselected_IdSender = intent3.getIntExtra("txtselected_IdSender",0);
        noLenthSender = intent3.getIntExtra("noLenthSender",0);
        txtselected_country_IdSender = intent3.getIntExtra("txtselected_country_IdSender",0);


        txtselected_Country_dest = intent3.getIntExtra("txtselected_Country_dest",0);
        txtSelected_state_dest = intent3.getIntExtra("txtSelected_state_dest",0);
        txtSelected_Id_lga_dest = intent3.getIntExtra("txtSelected_Id_lga_dest",0);
        txtselected_Type_dest = intent3.getIntExtra("txtselected_Type_dest",0);
        txtSelected_Id_kg_dest = intent3.getIntExtra("txtSelected_Id_kg_dest",0);

        state_sender_id = intent3.getIntExtra("state_sender_id",0);
        lga_sender_id = intent3.getIntExtra("lga_sender_id",0);
        state_pickup_id = intent3.getIntExtra("state_pickup_id",0);
        lga_pickup_id = intent3.getIntExtra("lga_pickup_id",0);



        if(txtPrice != null){



            etInput_amt.setText(txtPrice.toString());

            String deliv =etInput_amt.getText().toString();
            String txtResident =getCountry();

            if(txtResident != null)
            {
                if(txtResident.trim().equals("Nigeria"))
                {
                    etInput.setCurrency(nairaSymbole);
                    etInput_amt.setCurrency(nairaSymbole);
                }
                else{
                    etInput.setCurrency(CurrencySymbols.USA);
                    etInput_amt.setCurrency(CurrencySymbols.USA);
                }
            }

            etInput.setText(deliv.toString());

}
    if(txtPickuplga == null || txtPickuplga.equals("Select") || txtPickuplga.equals("") ){
        txtPickuplga= getlga();
        Log.e("Select_LGA : ","LGA Line".toString());

    }

} catch (NullPointerException e) {
    e.printStackTrace();
}
catch (IndexOutOfBoundsException el) {
    el.printStackTrace();
}
catch (RuntimeException el) {
    el.printStackTrace();
}



    }


    public void ValidateText(){
 amount =getMaount();
        tAmount =getMaountTotal();
        txt1 = etInput.getText().toString();
        if(amount ==0 || amount == 0.0){
            errorNo=1;
            CheckEditText = false;
            return;
        }
else if(tAmount < 1.0 ){
            errorNo=1;
            CheckEditText = false;
            return;
        }
 else if( TextUtils.isEmpty(txt1) || txt1 == null )
        {

            CheckEditText = false;

        }
        else {

            CheckEditText = true ;

        }

    }



    /* POPULATING LGA */

    public void getPrice(final String Spanner1 ){

        class LagClass extends AsyncTask<String,Void,String> {
            @Override
            protected void onPreExecute() {
                super.onPreExecute();

                progressDialog = ProgressDialog.show(PriceActivity.this,"Price","LOADING Your Price ....",false,false);
            }

            @Override
            protected void onPostExecute(String string1) {

                super.onPostExecute(string1);
                progressDialog.dismiss();
try{
                Log.i("Lines: ","First Line");

               String str = string1.toString().replaceAll("\"","");

                Log.e("String_Result:", str.toString());

                String [] rst_total = str.split(":");

              /* GET RIGT CURRENCY SYMBOLES   */
    String txtResident =getCountry();
    if(txtResident.trim().equals("Nigeria"))
    {
        etInput.setCurrency(nairaSymbole);
        etInput_amt.setCurrency(nairaSymbole);
    }

    if(!txtResident.trim().equals("Nigeria")){
        etInput.setCurrency(CurrencySymbols.USA);
        etInput_amt.setCurrency(CurrencySymbols.USA);
    }

    if(rst_total[6].toString().trim().equals("Inbound")){
        etInput.setCurrency(CurrencySymbols.USA);
        etInput_amt.setCurrency(CurrencySymbols.USA);
    }



                /* CHECKING THE PRICE AMOUNT */
    amount= Double.parseDouble(rst_total[1].toString());
    setAmount(amount);

                  etInput_amt.setText(rst_total[1].toString());

                  String pr =etInput_amt.getText().toString();
                etInput_amt.setText(rst_total[2].toString());

                String vat =etInput_amt.getText().toString();

    etInput_amt.setText(rst_total[3].toString());

    String pickup =etInput_amt.getText().toString();

    etInput_amt.setText(rst_total[4].toString());

    String deliv =etInput_amt.getText().toString();
    etInput_amt.setText(rst_total[0].toString());

    tAmount=  Double.parseDouble(rst_total[0].toString());
    setAmountTotal(tAmount);
    String tot =etInput_amt.getText().toString();

    price_vat_pickup_charge_delivery_charge=pr+":"+vat+":"+pickup +":"+ deliv;

    but_signatory.setText("\nFull Tracking plus signature on delivery \n \n Price: " + pr.toString()  +" \n VAT: " + vat.toString() +" \n Pickup Charge: "+ pickup.toString() +" \n Signature on delivery: "+deliv.toString() +" \n\n G.Total: "+tot.toString()+"\n"  );

    // but_signatory.setText("Full Tracking plus signature on delivery \n \n Price: " + rst_total[1].toString()  +" \n VAT: " + rst_total[2].toString() +" \n Pickup Charge: "+ rst_total[3].toString() +" \n Signature on delivery: "+rst_total[4].toString() +" \n\n G.Total: "+rst_total[0].toString()  );

tot_price_sig=rst_total[0].toString();

    tot_price_drop=rst_total[5].toString();

    etInput_amt.setText(rst_total[5].toString());

    String droptTot =etInput_amt.getText().toString();

   //but_drop.setText("Full Tracking plus drop on delivery \n \n Price: " + rst_total[1].toString()  +" \n VAT: " + rst_total[2].toString() +" \n Pickup Charge: "+ rst_total[3].toString()   +" \n\n G.Total: "+rst_total[5].toString()  );
    but_drop.setText("\nFull Tracking plus drop on delivery \n \n  Price: " + pr.toString()  +" \n VAT: " + vat.toString() +" \n Pickup Charge: "+ pickup.toString()  +" \n\n G.Total: "+droptTot.toString()+"\n"  );



    Log.e("Split_Result:", rst_total[1].toString());

} catch (NullPointerException e) {
    e.printStackTrace();
}
catch (IndexOutOfBoundsException el) {
    el.printStackTrace();
}
catch (RuntimeException el) {
    el.printStackTrace();
}





            }

            @Override
            protected String doInBackground(String... params) {

                try {



                    if(txtPickuplga == null || txtPickuplga.equals("Select") || txtPickuplga.equals("") ){
                        txtPickuplga= getlga();
                        Log.e("Select_LGA : ","LGA Line".toString());

                    }
if(txtSenderCountry == null){
    txtSenderCountry= getCountry();
}
if(txtSenderMobile == null){
    txtSenderMobile= getMobile();
}
                    JSONObject postDataParams = new JSONObject();


                    postDataParams.put("txtDestCountry", txtDestCountry);
                    postDataParams.put("txtDestination", txtDestination);
                    postDataParams.put("txtPickuplga", txtPickuplga);
                    postDataParams.put("txtPickupState", txtPickupState);
                    postDataParams.put("txtDestState", txtDestState);
                    postDataParams.put("txtDestLGA", txtDestLGA);
                    postDataParams.put("txtKg", txtKg);
                    postDataParams.put("txtShippingType", txtShippingType);
                    postDataParams.put("txtSenderMobile", txtSenderMobile);
                    postDataParams.put("txtSenderCountry", txtSenderCountry);
                    postDataParams.put("txtDecision", txtDecision);
                    postDataParams.put("txtPickupCountry", txtPickupCountry);



                    Log.e("params",postDataParams.toString());

                    finalResult = httpParse.postRequest(postDataParams, HttpURL);


                } catch (Exception e) {
                    e.printStackTrace();
                }



                return finalResult;
            }
        }
        LagClass lgaObj = new LagClass();

        lgaObj.execute(Spanner1);
    }



    private void loadIntoPolUnit(String json) throws JSONException {

        JSONArray jsonArray = new JSONArray(json);


        String[] $heroes = new String[jsonArray.length()];

        int ctr =0;


        for (int i = 0; i < jsonArray.length(); i++) {
            JSONObject obj = jsonArray.getJSONObject(i);




           // $heroes[i] = obj.getString("lga");



            Log.e("params", $heroes[i].toString());


            ctr++;

        }

        String counters ;
        counters  = String.valueOf(ctr);



        if(ctr ==1)
        {
            Toast.makeText(PriceActivity.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
            ctr=0;
        }

        /*
        ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, $heroes);
        dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerLGA.setAdapter(dataAdapter);


         */

    }


    private String getMobile(){

        Cursor res= mydb.getUsers(1);
        if(res.moveToFirst()){

            res.moveToFirst();

            txtSenderMobile  = res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_MOBILENO));

        }
        return  txtSenderMobile;
    }

 private String getCountry(){

     Cursor res= mydb.getUsers(1);
     if(res.moveToFirst()){

         res.moveToFirst();

         txt7  = res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_COUNTRY));

 }
     return  txt7;
 }

    private String getlga(){

        Cursor res= mydb.getUsers(1);
        if(res.moveToFirst()){

            res.moveToFirst();

            txt7  = res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_LGA));

        }
        return  txt7;
    }


    private void setAmount(double am){
        amount=am;

    }
 private double getMaount(){
        return amount;
 }

    private void setAmountTotal(double am){
        tAmount=am;

    }
    private double getMaountTotal(){
        return tAmount;
    }


    public String getNairaSymbole(){
        return nairaSymboles;
    }

}