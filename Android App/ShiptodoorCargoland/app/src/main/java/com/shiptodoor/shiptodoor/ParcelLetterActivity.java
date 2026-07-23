package com.shiptodoor.shiptodoor;


import android.graphics.Color;
import android.graphics.Rect;
import android.os.Bundle;



import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import android.text.Html;
import android.text.TextUtils;
import android.view.MotionEvent;
import android.view.View;

import android.content.Intent;
import android.view.Window;
import android.view.WindowManager;
import android.widget.Button;

import com.google.android.material.bottomnavigation.BottomNavigationView;


import com.google.android.material.button.MaterialButton;
import com.google.android.material.floatingactionbutton.FloatingActionButton;
import com.google.android.material.snackbar.Snackbar;

import android.app.NotificationChannel;
import android.app.NotificationManager;
import android.app.ProgressDialog;
import android.net.Uri;



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

import android.widget.CompoundButton;
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

import android.widget.AdapterView.OnItemSelectedListener;
import android.widget.RadioGroup.OnCheckedChangeListener;















import android.widget.TextView;




public class ParcelLetterActivity extends AppCompatActivity implements OnItemSelectedListener   {

    private Button butReg = null;
    private Button butBack = null;

    private Toolbar  mTopToolbar;


    private Button send_restriction = null;





    private String HttpURL = "https://www.cargoland.shiptodoor.com/cargoland/weight.php";

    private String HttpURL_STATE = "https://www.cargoland.shiptodoor.com/cargoland/state.php";

    private String HttpURL_COUNTRY = "https://www.cargoland.shiptodoor.com/cargoland/country.php";

    private String HttpURL_LGA = "https://www.cargoland.shiptodoor.com/cargoland/lga.php";

    private String HttpURL_SHIPMENT = "https://www.cargoland.shiptodoor.com/cargoland/shipment_category.php";



    private String spannerHolder, spanner1Holder, spanner2Holder, spanner3Holder, spanner4Holder, spanner5Holder, spanner6Holder,spannerDurexHolder,spanner7Holder, spanner8Holder, spanner9Holder,panner10Holder, IMEIHolder;

    private String txtSpinner1, txtSpinner3, txtSpinner2, txtSpinner4, txtSpinner5, txtSpinner6, txtSpinnerPop, txtSpinnerPop3, txtSpinnerPop4;

    Spinner spinner2, spinner1, spinner6, spinner3, spinner4, spinner5,spinnerCountry,spinnerState,spinnerLGA,spinnerKg,spinnerType;

    private  String txt1, txt2, txt3, txt4, txt5,txt6, txt7, txt8;
    private boolean CheckEditText =false;

    private RadioGroup radioStatusGroup;
    private RadioButton radioStatusButton;



    ArrayAdapter adapter;
    EditText ed1, ed2, ed3, ed4, ed5, ed6,ed7,ed8;
    String finalResult, rst, result;

    TextView tv1, tv2, tv3, tv4, tv5;





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
    private int txtselected_country_IdPickup;
    private  int  noLenth_Pickup=0;



    private int selected_Id_kg =0;

    /* Destination */
    private String txtDestCountry="";
    private String txtKg =null;
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

    Context context;
    Intent intent;

    HttpParse httpParse = new HttpParse();


    String[] heroes_accronyms ;

    String Errors;

    // List<String> list = new ArrayList<String>();


    List<String> listParty = new ArrayList<String>();

    private ArrayList<String> country_list = new ArrayList<>();
    private ArrayList<String> state_list = new ArrayList<>();
    private ArrayList<String> lga_list = new ArrayList<>();
    private ArrayList<String> ship_list = new ArrayList<>();
    private ArrayList<String> kg_list = new ArrayList<>();

    public JSONObject postData;

    String  select="Select";

    private  int state_pickup_id;
    private int lga_pickup_id;

    private int state_sender_id;
    private int lga_sender_id;

    private int lga_Int=0;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        try{
            setContentView(R.layout.activity_parcel_letter);
            Toolbar toolbar = findViewById(R.id.toolbar);
            setSupportActionBar(toolbar);

            getSupportActionBar().setDisplayShowHomeEnabled(true);
            //getSupportActionBar().setLogo(R.drawable.logo5);
            getSupportActionBar().setDisplayUseLogoEnabled(true);
            getSupportActionBar().setTitle("   Send Items");




            mTopToolbar=(Toolbar) findViewById(R.id.toolbar);
            setSupportActionBar(mTopToolbar);


            Window window = getWindow();

            /* Change status bar background color to white */
            window.clearFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN);

            window.addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS);

            int colorCodeLight = Color.parseColor("#ffffff");
            window.setStatusBarColor(colorCodeLight);





            butBack = findViewById(R.id.button2);

            butReg = findViewById(R.id.butReg);
            send_restriction = findViewById(R.id.send_restriction);

            String htmlString ="<u> See our Sending Restrictions</u>";
            send_restriction.setText(Html.fromHtml(htmlString));

            ed1 = (EditText) findViewById(R.id.txtDescription);
            tv1= (TextView) findViewById(R.id.txvCountry);
            tv2= (TextView) findViewById(R.id.txvState);
            tv3= (TextView) findViewById(R.id.txvState);
            tv4= (TextView) findViewById(R.id.txvLGA);


            radioStatusGroup=(RadioGroup) findViewById(R.id.radio_status);

            int selectedId =radioStatusGroup.getCheckedRadioButtonId();
            radioStatusButton=(RadioButton) findViewById(selectedId);


            choice_id=radioStatusButton.getText().toString();



            spinnerCountry = (Spinner) findViewById(R.id.spinner3);
            spinnerLGA = (Spinner) findViewById(R.id.spinnerLGA);
            spinnerState = (Spinner) findViewById(R.id.spinnerState);
            spinnerKg = (Spinner) findViewById(R.id.spinner4);
            spinnerType = (Spinner) findViewById(R.id.spinnerCategory);




            addItemsOnSpinner1();

            addItemsOnSpinner2();
            addItemsOnSpinner3();
            addItemsOnSpinner4();
            addItemsOnSpinner5();


            //spinner2.setOnItemSelectedListener((OnItemSelectedListener) this);


            spinnerCountry.setOnItemSelectedListener(this);
            spinnerState.setOnItemSelectedListener(this);


            //spinnerLGA.setOnItemSelectedListener(this);
            spinnerType.setOnItemSelectedListener(this);
            // spinnerKg.setOnItemSelectedListener(this);




            Intent intent3 = getIntent();

            txtKg=  intent3.getStringExtra("txtKg") ;
            txtDestination=  intent3.getStringExtra("txtDestination") ;
            txtSelected_state_dest = intent3.getIntExtra("txtSelected_state_dest",0);
            txtSelected_Id_lga_dest = intent3.getIntExtra("txtSelected_Id_lga_dest",0);
            txtselected_Type_dest = intent3.getIntExtra("txtselected_Type_dest",0);
            txtSelected_Id_kg_dest = intent3.getIntExtra("txtSelected_Id_kg_dest",0);




            // int selectedId =radioStatusGroup.getCheckedRadioButtonId();
            //radioStatusButton=(RadioButton) findViewById(selectedId);
            RadioGroup radioGroup = (RadioGroup) findViewById(R.id.radio_status);
            radioGroup.setOnCheckedChangeListener(new OnCheckedChangeListener(){
                @Override
                public void onCheckedChanged(RadioGroup group, int checkedId) {

                    radioStatusGroup=(RadioGroup) findViewById(R.id.radio_status);

                    int selectedId =radioStatusGroup.getCheckedRadioButtonId();
                    selected_Id_kg=selectedId;
                    radioStatusButton=(RadioButton) findViewById(selectedId);
                    String choice =radioStatusButton.getText().toString();
                    choice_id=radioStatusButton.getText().toString();

                    spinnerLGA = (Spinner) findViewById(R.id.spinnerLGA);
                    spinnerState = (Spinner) findViewById(R.id.spinnerState);

                    spinnerKg = (Spinner) findViewById(R.id.spinner4);
                    spinnerType = (Spinner) findViewById(R.id.spinnerCategory);

                    Log.e("Freight Type: ","Im in Check type".toString());


                    if(choice.equals("Inter-State") ){

                        txtShippingType="";

                        //radioStatusGroup.check(R.id.radioPositive);
                        Log.i("cateory","******************  im in Inter State *************** ");
                        spinnerState.setVisibility(View.VISIBLE);
                        spinnerLGA.setVisibility(View.VISIBLE);
                        spinnerCountry.setVisibility(View.GONE);
                        tv2.setVisibility(View.VISIBLE);
                        tv3.setVisibility(View.VISIBLE);
                        tv4.setVisibility(View.VISIBLE);
                        tv1.setVisibility(View.GONE);

                       // Log.i("cateory","******************  im in Inter State *************** ");

                        if(spinnerLGA.getSelectedItem() != null && !spinnerLGA.getSelectedItem().toString().trim().equals("Select")){
                            spinnerLGA.setSelection(0);
                        }
                        if(spinnerState.getSelectedItem() != null && !spinnerState.getSelectedItem().toString().trim().equals("Select")){
                            spinnerState.setSelection(0);
                        }

                        if( spinnerKg.getSelectedItem()!= null && !spinnerKg.getSelectedItem().toString().trim().equals("Select")){
                            spinnerKg.setSelection(0);
                        }
                        if(spinnerType.getSelectedItem() != null && !spinnerType.getSelectedItem().toString().trim().equals("Select")){
                            spinnerType.setSelection(0);
                        }






                    }

                    if(choice.equals("Intra-State") ){
                        //radioStatusGroup.check(R.id.radioPositive);
                        txtShippingType="";
                        spinnerState.setVisibility(View.VISIBLE);
                        spinnerLGA.setVisibility(View.VISIBLE);
                        spinnerCountry.setVisibility(View.GONE);
                        tv2.setVisibility(View.VISIBLE);
                        tv3.setVisibility(View.VISIBLE);
                        tv4.setVisibility(View.VISIBLE);
                        tv1.setVisibility(View.GONE);


                        if(spinnerLGA.getSelectedItem() != null && !spinnerLGA.getSelectedItem().toString().trim().equals("Select")){
                            spinnerLGA.setSelection(0);
                        }
                        if(spinnerState.getSelectedItem() != null && !spinnerState.getSelectedItem().toString().trim().equals("Select")){
                            spinnerState.setSelection(0);
                        }

                        if( spinnerKg.getSelectedItem()!= null && !spinnerKg.getSelectedItem().toString().trim().equals("Select")){
                            spinnerKg.setSelection(0);
                        }
                        if(spinnerType.getSelectedItem() != null && !spinnerType.getSelectedItem().toString().trim().equals("Select")){
                            spinnerType.setSelection(0);
                        }




                    }

                    if(choice.equals("International") ){
                        txtShippingType="";

                        spinnerState.setVisibility(View.GONE);
                        spinnerLGA.setVisibility(View.GONE);
                        spinnerCountry.setVisibility(View.VISIBLE);
                        tv1.setVisibility(View.VISIBLE);
                        tv2.setVisibility(View.GONE);
                        tv3.setVisibility(View.GONE);
                        tv4.setVisibility(View.GONE);

/*
                        spinnerCountry.setSelection(0);

                        spinnerKg.setSelection(0);
                        spinnerType.setSelection(0);


 */



                        if(spinnerCountry.getSelectedItem() != null && !spinnerCountry.getSelectedItem().toString().trim().equals("Select")){
                            spinnerCountry.setSelection(0);
                        }


                        if( spinnerKg.getSelectedItem()!= null && !spinnerKg.getSelectedItem().toString().trim().equals("Select")){
                            spinnerKg.setSelection(0);
                        }
                        if(spinnerType.getSelectedItem() != null && !spinnerType.getSelectedItem().toString().trim().equals("Select")){
                            spinnerType.setSelection(0);
                        }


                    }

Log.i("cateory","******************  im in category *************** "+choice);


                    PopulateCategory(choice);
                    Log.i("cateory","******************  im in category 2 *************** "+choice);

                }


            });

            butBack.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    // Log.d(TAG, "Subscribing to weather topic");
                    Intent intent = new Intent(ParcelLetterActivity.this,MenuActivity.class);
                    startActivity(intent);
                    finish();
                }
            });


            send_restriction.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    // Log.d(TAG, "Subscribing to weather topic");
                    Intent intent = new Intent(ParcelLetterActivity.this,sendingRestrictionActivity.class);
                    txt1 = ed1.getText().toString();
                    String dest =radioStatusButton.getText().toString();
                    noLenth = dest.length();
                    int loc=1;

                    spanner1Holder =String.valueOf(spinnerCountry.getSelectedItem());
                    spanner2Holder =String.valueOf(spinnerState.getSelectedItem());
                    spanner3Holder =String.valueOf(spinnerLGA.getSelectedItem());
                    spanner4Holder =String.valueOf(spinnerKg.getSelectedItem());
                    spanner5Holder =String.valueOf(spinnerType.getSelectedItem());

                    Log.i("Spanner",spanner1Holder);
                    Log.i("Spanner2",spanner2Holder);
                    Log.i("Spanner3",spanner3Holder);
                    Log.i("Spanner4",spanner4Holder);
                    Log.i("Spanner5",spanner5Holder);


                    intent.putExtra("loc",loc);
                    intent.putExtra("txtdescription",txt1);
                    intent.putExtra("txtDestCountry",spanner1Holder);
                    intent.putExtra("txtDestination",radioStatusButton.getText().toString());
                    intent.putExtra("txtDestState",spanner2Holder);
                    intent.putExtra("txtDestLGA",spanner3Holder);
                    intent.putExtra("txtKg",spanner4Holder);
                    intent.putExtra("txtShippingType",spanner5Holder);
                    intent.putExtra("txtPrice",txtPrice);

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

                    intent.putExtra("spanner3Holder",spanner3Holder);

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
                    intent.putExtra("noLenth",noLenth);
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
                    intent.putExtra("txtSenderlga",txtSenderlga);
                    intent.putExtra("txtSenderState",txtSenderState);
                    intent.putExtra("txtSenderPostCode",txtSenderPostCode);
                    intent.putExtra("txtSenderCountry",txtSenderCountry);

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
                    try{
                        ValidateText();
                        if(CheckEditText)
                        {

                            Intent intent = new Intent(ParcelLetterActivity.this,PickUpDecisionActivity.class);
                            String dest =radioStatusButton.getText().toString();
                            noLenth = dest.length();
                            txt1 = ed1.getText().toString();

                            spanner1Holder =String.valueOf(spinnerCountry.getSelectedItem());
                            spanner2Holder =String.valueOf(spinnerState.getSelectedItem());
                            spanner3Holder =String.valueOf(spinnerLGA.getSelectedItem());
                            spanner4Holder =String.valueOf(spinnerKg.getSelectedItem());
                            spanner5Holder =String.valueOf(spinnerType.getSelectedItem());


                            txtselected_Country_dest=  spinnerCountry.getSelectedItemPosition();
                            txtSelected_state_dest=  spinnerState.getSelectedItemPosition();
                            txtSelected_Id_lga_dest=  spinnerLGA.getSelectedItemPosition();
                            txtSelected_Id_kg_dest=  spinnerKg.getSelectedItemPosition();
                            txtselected_Type_dest=  spinnerType.getSelectedItemPosition();

                            Log.e(" Ship_Position: ",String.valueOf(txtselected_Type_dest).toString());

                            Log.i("State",state_list.toString());

                            intent.putExtra("key", country_list);
                            intent.putExtra("key_state", state_list);
                            intent.putExtra("key_lga", lga_list);
                            intent.putExtra("key_kg", kg_list);
                            intent.putExtra("key_ship", ship_list);

                            intent.putExtra("txtdescription",txt1);
                            intent.putExtra("txtDestCountry",spanner1Holder);
                            intent.putExtra("txtDestination",radioStatusButton.getText().toString());
                            intent.putExtra("txtDestState",spanner2Holder);
                            intent.putExtra("txtDestLGA",spanner3Holder);
                            intent.putExtra("txtKg",spanner4Holder);
                            intent.putExtra("txtShippingType",spanner5Holder);
                            intent.putExtra("txtPrice",txtPrice);
                            intent.putExtra("noLenth",noLenth);


                            intent.putExtra("txtselected_Country_dest",txtselected_Country_dest);
                            intent.putExtra("txtSelected_state_dest",txtSelected_state_dest);
                            intent.putExtra("txtSelected_Id_lga_dest",txtSelected_Id_lga_dest);
                            intent.putExtra("txtselected_Type_dest",txtselected_Type_dest);
                            intent.putExtra("txtSelected_Id_kg_dest",txtSelected_Id_kg_dest);



                            /* pick up section */

                            intent.putExtra("txtPickupFname",txtPickupFname);
                            intent.putExtra("txtPickupSurname",txtPickupSurname);
                            intent.putExtra("txtPickupAnswer",txtPickupAnswer);
                            intent.putExtra("txtPickupAddress",txtPickupAddress);
                            intent.putExtra("txtPickupCity",txtPickupCity);
                            intent.putExtra("txtPickupPostCode",txtPickupPostCode);
                            intent.putExtra("txtPickupCountry",txtPickupCountry);

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
                            Toast.makeText(ParcelLetterActivity.this, "Please fill all form fields.", Toast.LENGTH_LONG).show();
                        }


                    } catch (Exception e) {
                        e.printStackTrace();
                    }
                /*
                catch (NullPointerException e) {
                    e.printStackTrace();
                }
                catch (IndexOutOfBoundsException el) {
                    el.printStackTrace();
                }

                catch (JSONException e) {
                    e.printStackTrace();
                }

                 */
                }

            });



/*
        BottomNavigationView navView = findViewById(R.id.nav_view);



        BottomNavigationView bottomNavigationView = (BottomNavigationView) findViewById(R.id.nav_view);
        bottomNavigationView.setOnNavigationItemSelectedListener(new BottomNavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem item) {
                switch (item.getItemId()) {
                    case R.id.navigation_home:
                        //Toast.makeText(MenuActivity.this, "Home", Toast.LENGTH_SHORT).show();
                        Intent intent = new Intent(ParcelLetterActivity.this,MenuActivity.class);
                        startActivity(intent);
                        finish();
                        break;

                    case R.id.navigation_send:
                        //Toast.makeText(MenuActivity.this, "Send", Toast.LENGTH_SHORT).show();
                        Intent intent1 = new Intent(ParcelLetterActivity.this,ParcelLetterActivity.class);
                        startActivity(intent1);
                        finish();
                        break;
                    case R.id.navigation_track:
                        //Toast.makeText(MenuActivity.this, "Tracking", Toast.LENGTH_SHORT).show();
                        Intent intent2 = new Intent(ParcelLetterActivity.this,TrackingActivity.class);
                        startActivity(intent2);
                        finish();
                        break;
                    case R.id.navigation_help:
                        //Toast.makeText(MenuActivity.this, "Help", Toast.LENGTH_SHORT).show();
                        Intent intent3 = new Intent(ParcelLetterActivity.this,HelpActivity.class);
                        startActivity(intent3);
                        finish();
                        break;

                    case R.id.navigation_logout:
                        Intent intent4 = new Intent(ParcelLetterActivity.this,UserLogin.class);
                        startActivity(intent4);
                        finish();
                        //Toast.makeText(MenuActivity.this, "Log out", Toast.LENGTH_SHORT).show();
                        break;
                }
                return true;
            }
        });


 */

            radioStatusGroup=(RadioGroup) findViewById(R.id.radio_status);

            selectedId =radioStatusGroup.getCheckedRadioButtonId();
            radioStatusButton=(RadioButton) findViewById(selectedId);
            String choice =radioStatusButton.getText().toString();



            Log.i("weight","*************** im here ************");


            Log.i("weight","Spinner kg: "+txtKg);

            // txtDestination=choice;

            //int  spinPosition =country_list.indexOf(txt7);

            update_Text();
            Log.i ("weight","After update text *********: ");
            Log.i ("Country","Country: *********: "+ country_list.toString());
            Log.i ("state","state: *********: "+ state_list.toString());
            Log.i ("lga","lga: *********: "+ lga_list.toString());
            Log.i ("kg","kg: *********: "+ kg_list.toString());
            Log.i ("category","category: *********: "+ ship_list.toString());
            Log.i("weight","Spinner kg: "+txtKg);

            ///int  spincontry =country_list.indexOf(txtDestCountry);
            if(txtKg == null)
            {
                Log.i ("weight","im in weight 1 *********: ");
                PopulateCountry(choice);
                Log.i ("weight","im in weight 2 *********: ");
                PopulateCategory(choice);
                Log.i("weight","After category in weight *********: "+txtKg);
            }

            update_Text();

            /* error */

        } catch (Exception e) {
            e.printStackTrace();
        }
                /*
                catch (NullPointerException e) {
                    e.printStackTrace();
                }
                catch (IndexOutOfBoundsException el) {
                    el.printStackTrace();
                }

                catch (JSONException e) {
                    e.printStackTrace();
                }

                 */



    }


    @Override
    public boolean dispatchTouchEvent(MotionEvent event) {
        if (event.getAction() == MotionEvent.ACTION_DOWN) {
            View v = getCurrentFocus();
            if ( v instanceof EditText) {
                Rect outRect = new Rect();
                v.getGlobalVisibleRect(outRect);
                if (!outRect.contains((int)event.getRawX(), (int)event.getRawY())) {
                    v.clearFocus();
                    InputMethodManager imm = (InputMethodManager) getSystemService(Context.INPUT_METHOD_SERVICE);
                    imm.hideSoftInputFromWindow(v.getWindowToken(), 0);
                }
            }
        }
        return super.dispatchTouchEvent( event );
    }



    public void addItemsOnSpinner3() {

        spinnerType = (Spinner) findViewById(R.id.spinnerCategory);
        List<String> list = new ArrayList<String>();
        list.add("Select");
        /*
        list.add("Door to Door");
        list.add("Airport to Airport");

         */
        //Toast.makeText(getApplicationContext(), "Im inside ", Toast.LENGTH_SHORT).show();

        ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1, list);
        dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerType.setAdapter(dataAdapter);
    }


    public void addItemsOnSpinner1() {

        spinnerCountry = (Spinner) findViewById(R.id.spinner3);
        List<String> list = new ArrayList<String>();
        list.add("Select");

        ArrayAdapter<String> dataAdapter6 = new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1, list);
        dataAdapter6.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerCountry.setAdapter(dataAdapter6);
    }

    public void addItemsOnSpinner2() {

        spinnerState = (Spinner) findViewById(R.id.spinnerState);
       // List<String> list = new ArrayList<String>();
        state_list.clear();
        state_list.add("Select");
        state_list.add("Abia");
        state_list.add("Adamawa");
        state_list.add("Akwa Ibom");
        state_list.add("Anambra");
        state_list.add("Bauchi");
        state_list.add("Bayelsa");
        state_list.add("Benue");
        state_list.add("Borno");
        state_list.add("Cross River");
        state_list.add("Delta");
        state_list.add("Ebonyi");
        state_list.add("Edo");
        state_list.add("Ekiti");
        state_list.add("Enugu");
        state_list.add("Imo");
        state_list.add("Gombe");
        state_list.add("Jigawa");
        state_list.add("Kaduna");
        state_list.add("Kano");
        state_list.add("Katsina");
        state_list.add("Kebbi");
        state_list.add("Kogi");
        state_list.add("Kwara");
        state_list.add("Lagos");
        state_list.add("Nasarawa");
        state_list.add("Niger");
        state_list.add("Ogun");
        state_list.add("Ondo");
        state_list.add("Osun");
        state_list.add("Oyo");
        state_list.add("Plateau");
        state_list.add("Rivers");
        state_list.add("Sokoto");
        state_list.add("Taraba");
        state_list.add("Yobe");
        state_list.add("Zamfara");
        state_list.add("FCT");


        Log.i("State","My state list "+state_list.toString());
        // String[] myState=getResources().getStringArray(R.array.state_array);
        //state_list.add(myState.toString());
        //state_list.add(list.toString());

        ArrayAdapter<String> dataAdapter6 = new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1, state_list);
        dataAdapter6.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerState.setAdapter(dataAdapter6);
    }

    public void addItemsOnSpinner4() {

        spinnerLGA = (Spinner) findViewById(R.id.spinnerLGA);
        List<String> list = new ArrayList<String>();


        ArrayAdapter<String> dataAdapter6 = new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1, list);
        dataAdapter6.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerLGA.setAdapter(dataAdapter6);
    }


    public void addItemsOnSpinner5() {

        spinnerKg = (Spinner) findViewById(R.id.spinner4);
        List<String> list = new ArrayList<String>();
        list.add("Select");

        ArrayAdapter<String> dataAdapter6 = new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1, list);
        dataAdapter6.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerKg.setAdapter(dataAdapter6);
    }





    /*CALLING METHOD THAT HELP TO HIDE KEYBOARD  WHEN TOUCH BODY */
    public void hideKeyboard(View view) {
        InputMethodManager inputMethodManager =(InputMethodManager)getSystemService(Activity.INPUT_METHOD_SERVICE);
        inputMethodManager.hideSoftInputFromWindow(view.getWindowToken(), 0);


    }


    public void addListenerOnSpinnerItemSelectionTitle() {
        spinnerType = (Spinner) findViewById(R.id.spinnerCategory);
        //spinner2.setOnItemSelectedListener(new MyOnItemSelectedListener());
        txtSpinner5=(String) spinnerType.getSelectedItem();
    }



    public void addListenerOnSpinnerItemSelectionCountry() {
        spinnerCountry = (Spinner) findViewById(R.id.spinner3);
        //spinner2.setOnItemSelectedListener(new MyOnItemSelectedListener());

        txtSpinner1=(String) spinnerCountry.getSelectedItem();

    }

    public void addListenerOnSpinnerItemSelectionState() {
        spinnerState = (Spinner) findViewById(R.id.spinnerState);
        //spinner2.setOnItemSelectedListener(new MyOnItemSelectedListener());
        txtSpinner2=(String) spinnerState.getSelectedItem();

    }


    public void addListenerOnSpinnerItemSelectionLGA() {
        spinnerLGA = (Spinner) findViewById(R.id.spinnerLGA);
        //spinner2.setOnItemSelectedListener(new MyOnItemSelectedListener());
        txtSpinner3=(String) spinnerLGA.getSelectedItem();
    }

    public void addListenerOnSpinnerItemSelectionKg() {
        spinnerKg = (Spinner) findViewById(R.id.spinner4);
        //spinner2.setOnItemSelectedListener(new MyOnItemSelectedListener());
        txtSpinner4=(String) spinnerKg.getSelectedItem();
    }




    public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
try{


        txtSpinner1=(String) spinnerCountry.getSelectedItem();
        if(txtSpinner1 != null && txtSpinner1.trim().equals("Nigeria")){


            spinnerState.setVisibility(View.VISIBLE);
            spinnerLGA.setVisibility(View.VISIBLE);
            //spinnerCountry.setVisibility(View.GONE);
            tv2.setVisibility(View.VISIBLE);
            tv3.setVisibility(View.VISIBLE);
            tv4.setVisibility(View.VISIBLE);
        }

        else{


            spinnerState.setVisibility(View.GONE);
            spinnerLGA.setVisibility(View.GONE);
            //spinnerCountry.setVisibility(View.GONE);
            tv2.setVisibility(View.GONE);
            tv3.setVisibility(View.GONE);
            tv4.setVisibility(View.GONE);
        }

        String choice =radioStatusButton.getText().toString();

        if(choice.equals("Inter-State") ){
            //radioStatusGroup.check(R.id.radioPositive);

            spinnerState.setVisibility(View.VISIBLE);
            spinnerLGA.setVisibility(View.VISIBLE);
            spinnerCountry.setVisibility(View.GONE);
            tv2.setVisibility(View.VISIBLE);
            tv3.setVisibility(View.VISIBLE);
            tv4.setVisibility(View.VISIBLE);
            tv1.setVisibility(View.GONE);



        }

        if(choice.equals("Intra-State") ){
            //radioStatusGroup.check(R.id.radioPositive);

            spinnerState.setVisibility(View.VISIBLE);
            spinnerLGA.setVisibility(View.VISIBLE);
            spinnerCountry.setVisibility(View.GONE);
            tv2.setVisibility(View.VISIBLE);
            tv3.setVisibility(View.VISIBLE);
            tv4.setVisibility(View.VISIBLE);
            tv1.setVisibility(View.GONE);




        }





        txtSpinner2=(String) spinnerState.getSelectedItem();

        txtSpinner3=(String) spinnerLGA.getSelectedItem();


        //String sp1= String.valueOf(spinner2.getSelectedItem());
        //String sp3= String.valueOf(spinner3.getSelectedItem());

        // String sp4= String.valueOf(spinner4.getSelectedItem());
        txtSpinner4=(String) spinnerKg.getSelectedItem();
        txtSpinner5=(String) spinnerType.getSelectedItem();




        int ids = parent.getId();



        switch(ids)
        {
            case R.id.spinnerState:

                PopulateLGA(txtSpinner2);


                break;

            case R.id.spinnerCategory:
                if(txtSpinner5.trim().equals("Door to Door") || txtSpinner5.trim().equals("Airport to Airport")  )
                {
                    PopulateKG(choice_id);
                }




                break;

        }
} catch (Exception e) {
    e.printStackTrace();
}
                /*
                catch (NullPointerException e) {
                    e.printStackTrace();
                }
                catch (IndexOutOfBoundsException el) {
                    el.printStackTrace();
                }

                catch (JSONException e) {
                    e.printStackTrace();
                }

                 */
    }


    public void onNothingSelected(AdapterView<?> parent) {


    }




    /* POPULATING LGA */

    public void PopulateLGA(final String Spanner1 ){

        class LagClass extends AsyncTask<String,Void,String> {
            @Override
            protected void onPreExecute() {
                super.onPreExecute();

                //progressDialog = ProgressDialog.show(MainActivity.this,"LOADING LGA ....",null,true,true);
            }

            @Override
            protected void onPostExecute(String httpResponseMsg) {

                super.onPostExecute(httpResponseMsg);

                String err ,err1;



                try {




                    loadIntoPolUnit(httpResponseMsg);

                    if(txtDestination != null){
                        spinnerLGA.setSelection(txtSelected_Id_lga_dest);


                    }





                }
                catch (Exception e ) {
                    e.printStackTrace();
                }




            }

            @Override
            protected String doInBackground(String... params) {

                try {





                    JSONObject postDataParams = new JSONObject();


                    postDataParams.put("spanner1", Spanner1);


                    Log.e("params",postDataParams.toString());

                    finalResult = httpParse.postRequest(postDataParams, HttpURL_LGA);


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

        spinnerLGA = (Spinner) findViewById(R.id.spinnerLGA);
        JSONArray jsonArray = new JSONArray(json);


        String[] $heroes = new String[jsonArray.length()];

        int ctr =0;
        lga_list.clear();

        for (int i = 0; i < jsonArray.length(); i++) {
            JSONObject obj = jsonArray.getJSONObject(i);




            $heroes[i] = obj.getString("lga");

            lga_list.add(obj.getString("lga"));

            Log.e("params", $heroes[i].toString());


            ctr++;

        }

        String counters ;
        counters  = String.valueOf(ctr);



        if(ctr ==1)
        {
            Toast.makeText(ParcelLetterActivity.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
            ctr=0;
        }

        ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, $heroes);
        dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerLGA.setAdapter(dataAdapter);

    }







    /* POPULATING  WEIGHT KG */

    public void PopulateKG(final String choice ){

        class WeightKgClass extends AsyncTask<String,Void,String> {
            @Override
            protected void onPreExecute() {
                super.onPreExecute();

                //progressDialog = ProgressDialog.show(MainActivity.this,"LOADING LGA ....",null,true,true);
            }

            @Override
            protected void onPostExecute(String httpResponseMsg) {

                super.onPostExecute(httpResponseMsg);

                String err ,err1;



                try {


                    loadIntokG(httpResponseMsg);
                    txtPrice="";
                    if(txtDestination != null){


                        spinnerKg.setSelection(txtSelected_Id_kg_dest);

                        Log.e("Weight : ", "Kg "+ txtSelected_Id_kg_dest);



                    }




                    //Toast.makeText(ParcelLetterActivity.this,"Freight Category: "+ httpResponseMsg,Toast.LENGTH_LONG).show();

                }
                catch (Exception e) {
                    e.printStackTrace();
                }
                /*
                catch (NullPointerException e) {
                    e.printStackTrace();
                }
                catch (IndexOutOfBoundsException el) {
                    el.printStackTrace();
                }

                catch (JSONException e) {
                    e.printStackTrace();
                }

                 */

            }

            @Override
            protected String doInBackground(String... params) {

                try {

                    Date date = new Date();
                    SimpleDateFormat  formatter = new SimpleDateFormat("dd-MM-yyyy HH:mm:ss");


                    String strDate = formatter.format(date);

                    //MEIHolder = deviceUniqueIdentifier.toString();


                    JSONObject postDataParams = new JSONObject();

                    postDataParams.put("choice", choice);



                    finalResult = httpParse.postRequest(postDataParams, HttpURL);

                    Log.i("Second Line: ",postDataParams.toString());


                } catch (Exception e) {
                    e.printStackTrace();
                }
                /*
                catch (NullPointerException e) {
                    e.printStackTrace();
                }
                catch (IndexOutOfBoundsException el) {
                    el.printStackTrace();
                }

                catch (JSONException e) {
                    e.printStackTrace();
                }

                 */



                return finalResult;
            }
        }
        WeightKgClass  kgWeightclass = new WeightKgClass();

        kgWeightclass.execute(choice);
    }



    private void loadIntokG(String json) throws JSONException {
        spinnerKg = (Spinner) findViewById(R.id.spinner4);
        JSONArray jsonArray = new JSONArray(json);


        String[] heroes_kg = new String[jsonArray.length()];

        int ctr =0;

        kg_list.clear();
        for (int i = 0; i < jsonArray.length(); i++) {
            JSONObject obj = jsonArray.getJSONObject(i);




            heroes_kg[i] = obj.getString("kg");

            kg_list.add(obj.getString("kg"));

            Log.e("params", heroes_kg[i].toString());


            ctr++;

        }

        String counters ;
        counters  = String.valueOf(ctr);

        Log.e("Counters", counters.toString());

        if(ctr ==1)
        {
            Toast.makeText(ParcelLetterActivity.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
            ctr=0;
        }

        ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, heroes_kg);
        dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerKg.setAdapter(dataAdapter);




    }



    /**** SHIPMENT CATEGORY STARTS HERE******/


    public void PopulateCategory(final String choice ){

        class ShipmentClass extends AsyncTask<String,Void,String> {
            @Override
            protected void onPreExecute() {
                super.onPreExecute();

                //progressDialog = ProgressDialog.show(MainActivity.this,"LOADING LGA ....",null,true,true);
            }

            @Override
            protected void onPostExecute(String httpResponseMsg) {

                super.onPostExecute(httpResponseMsg);

                String err ,err1;
                try {

Log.i("Message","Return Value "+httpResponseMsg.toString());
                    loadIntoShipment(httpResponseMsg);

                    if(txtShippingType != null && !txtShippingType.equals("")){


                        spinnerType = (Spinner) findViewById(R.id.spinnerCategory);

                         spinnerType.setSelection(txtselected_Type_dest);






                        Log.e("Select Type Dest Pos: ",String.valueOf(txtselected_Type_dest).toString());


                        Log.e("Shiping Type: ", "Shiping Type".toString());



                    }


                }
                catch (JSONException e) {
                    e.printStackTrace();
                }catch (NullPointerException e) {
                    e.printStackTrace();
                }
                /*
                catch (IndexOutOfBoundsException el) {
                    el.printStackTrace();
                }

                 */

            }

            @Override
            protected String doInBackground(String... params) {

                try {



                    Date date = new Date();
                    SimpleDateFormat  formatter = new SimpleDateFormat("dd-MM-yyyy HH:mm:ss");


                    String strDate = formatter.format(date);

                    //MEIHolder = deviceUniqueIdentifier.toString();


                    radioStatusGroup=(RadioGroup) findViewById(R.id.radio_status);
                    int selectedId = radioStatusGroup.getCheckedRadioButtonId();
                    radioStatusButton= (RadioButton) findViewById(selectedId);

                    String choice = radioStatusButton.getText().toString();

                    Log.i("Choice","Here is :"+choice);


                    JSONObject postDataParams = new JSONObject();


                    postDataParams.put("choice", choice);


                    Log.i("params",postDataParams.toString());

                   // Log.i("First Line: ",postDataParams.toString());

                    finalResult = httpParse.postRequest(postDataParams, HttpURL_SHIPMENT);

                    Log.i("Second Line: ",postDataParams.toString());



                } catch (Exception e) {
                   // e.printStackTrace();
                }



                return finalResult;
            }
        }
        ShipmentClass  shipment = new ShipmentClass();

        shipment.execute(choice);
    }



    private void loadIntoShipment(String json) throws JSONException {
        spinnerType = (Spinner) findViewById(R.id.spinnerCategory);
        JSONArray jsonArray = new JSONArray(json);


        String[] $heroes_category = new String[jsonArray.length()];

        int ctr =0;

        ship_list.clear();
        for (int i = 0; i < jsonArray.length(); i++) {
            JSONObject obj = jsonArray.getJSONObject(i);




            $heroes_category[i] = obj.getString("type");
            ship_list.add(obj.getString("type"));



            Log.e("params", $heroes_category[i].toString());


            ctr++;

        }

        String counters ;
        counters  = String.valueOf(ctr);

        Log.e("Counters", counters.toString());

        if(ctr ==1)
        {
            Toast.makeText(ParcelLetterActivity.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
            ctr=0;
        }
        if(txtShippingType == null || txtShippingType.equals("")|| txtShippingType.equals("Select")){
        ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, $heroes_category);
        dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerType.setAdapter(dataAdapter);

        }
    }






    /*******  COUNTRY STARTS HERE ************ */




    public void PopulateCountry( final String Spanner1){

        class CountryClass extends AsyncTask<String,Void,String> {
            @Override
            protected void onPreExecute() {
                super.onPreExecute();

                //progressDialog = ProgressDialog.show(MainActivity.this,"LOADING LGA ....",null,true,true);
            }

            @Override
            protected void onPostExecute(String httpResponseMsg) {

                super.onPostExecute(httpResponseMsg);

                String err ,err1;



                try {

                    // Toast.makeText(ParcelLetterActivity.this,"Country: "+ httpResponseMsg,Toast.LENGTH_LONG).show();




                    loadCountry(httpResponseMsg);

                    if(txtDestination != null){



                        spinnerCountry.setSelection(txtselected_Country_dest);
                    }




                }  catch (Exception e) {
                    e.printStackTrace();
                }
                /*
                catch (NullPointerException e) {
                    e.printStackTrace();
                }
                catch (IndexOutOfBoundsException el) {
                    el.printStackTrace();
                }

                catch (JSONException e) {
                    e.printStackTrace();
                }

                 */









            }

            @Override
            protected String doInBackground(String... params) {

                try {





                    JSONObject postDataParams = new JSONObject();


                    postDataParams.put("spanner1", Spanner1);


                    Log.e("params",postDataParams.toString());

                    finalResult = httpParse.postRequest(postDataParams, HttpURL_COUNTRY);


                } catch (Exception e) {
                    e.printStackTrace();
                }



                return finalResult;
            }
        }
        CountryClass countryObject = new CountryClass();

        countryObject.execute(Spanner1);
    }



    private void loadCountry(String json) throws JSONException {
        spinnerCountry = (Spinner) findViewById(R.id.spinner3);
        JSONArray jsonArray = new JSONArray(json);


        String[] $heroes = new String[jsonArray.length()];

        int ctr =0;
        country_list.clear();
        for (int i = 0; i < jsonArray.length(); i++) {
            JSONObject obj = jsonArray.getJSONObject(i);




            $heroes[i] = obj.getString("country");

            country_list.add(obj.getString("country"));

            Log.e("params", $heroes[i].toString());


            ctr++;

        }

        String counters ;
        counters  = String.valueOf(ctr);

        Log.e("Counters", counters.toString());

        if(ctr ==1)
        {
            Toast.makeText(ParcelLetterActivity.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
            ctr=0;
        }

        ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, $heroes);
        dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerCountry.setAdapter(dataAdapter);



        //  spinnerCountry.setPadding(4,4,4,4);

    }







    public void ValidateText(){

        txt1 = ed1.getText().toString();


        txtSpinner1 =String.valueOf(spinnerCountry.getSelectedItem());
        txtSpinner2 =String.valueOf(spinnerState.getSelectedItem());
        txtSpinner3 =String.valueOf(spinnerLGA.getSelectedItem());
        txtSpinner4 =String.valueOf(spinnerKg.getSelectedItem());
        txtSpinner5 =String.valueOf(spinnerType.getSelectedItem());

        radioStatusGroup=(RadioGroup) findViewById(R.id.radio_status);
        int selectedId = radioStatusGroup.getCheckedRadioButtonId();
        radioStatusButton= (RadioButton) findViewById(selectedId);

        String choice = radioStatusButton.getText().toString();

        txtselected_Country_dest=  spinnerCountry.getSelectedItemPosition();
        txtSelected_state_dest=  spinnerState.getSelectedItemPosition();
        txtSelected_Id_lga_dest=  spinnerLGA.getSelectedItemPosition();
        txtSelected_Id_kg_dest=  spinnerKg.getSelectedItemPosition();
        txtselected_Type_dest=  spinnerType.getSelectedItemPosition();




        String sel="Select";
        if(choice.trim().equals("International") && txtSpinner1.trim().equals(sel) )
        {
            CheckEditText = false;
        }

        else if(choice.trim().equals("International") && txtSpinner1.trim().equals("Nigeria") && txtSpinner2.trim().equals(sel) )
        {
            CheckEditText = false;
            return;
        }

        else if(choice.trim().equals("International") && txtSpinner1.trim().equals("Nigeria") && txtSpinner3.trim().equals(sel) )
        {
            CheckEditText = false;
            return;
        }


        else if(choice.trim().equals("Inter-State") && txtSpinner2.trim().equals(sel)   || choice.trim().equals("Inter-State") && txtSpinner3.trim().equals(sel) )
        {
            CheckEditText = false;
        }



        else if(choice.trim().equals("Intra-State") && txtSpinner2.trim().equals(sel)   || choice.trim().equals("Intra-State") && txtSpinner3.trim().equals(sel) )
        {
            CheckEditText = false;
        }


        else if( TextUtils.isEmpty(txt1)||  txtSpinner5.trim().equals(sel) ||  txtSpinner4.trim().equals(sel) )
        {

            CheckEditText = false;

        }
        else {

            CheckEditText = true ;

        }

    }



    public void update_Text(){

        try{
            Intent intent3 = getIntent();
String kg=intent3.getStringExtra("txtKg").trim();

            if(intent3.getStringExtra("txtKg") != null &&   !kg.equals("")   )
            {
                country_list = (ArrayList<String>) getIntent().getSerializableExtra("key");

                state_list = (ArrayList<String>) getIntent().getSerializableExtra("key_state");
                lga_list = (ArrayList<String>) getIntent().getSerializableExtra("key_lga");
                ship_list = (ArrayList<String>) getIntent().getSerializableExtra("key_ship");
                kg_list = (ArrayList<String>) getIntent().getSerializableExtra("key_kg");

                Log.i("Kgweight","Weight Array***** "+kg_list.toString());


            }
            // txtFname = intent3.getStringExtra("txtFname");

            txtdescription =intent3.getStringExtra("txtdescription");
            txtDestCountry =intent3.getStringExtra("txtDestCountry");
            txtDestination =intent3.getStringExtra("txtDestination");
            txtDestState =intent3.getStringExtra("txtDestState");
            txtDestLGA =intent3.getStringExtra("txtDestLGA");
            txtKg =intent3.getStringExtra("txtKg");
            txtShippingType =intent3.getStringExtra("txtShippingType");
            txtPrice =intent3.getStringExtra("txtPrice");
            noLenth = intent3.getIntExtra("noLenth",0);

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

            txtDecision=intent3.getStringExtra("txtDecision");
            intDecision_id = intent3.getIntExtra("intDecision_id",0);

            selected_IdPickup = intent3.getIntExtra("txtselected_country_Id_Pickup",0);
            txtselected_Id = intent3.getIntExtra("txtselected_Id",0);
            noLenth_Pickup = intent3.getIntExtra("noLenth_Pickup",0);


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





            if(txtDestination  !=  null && !txtDestination.equals("")){

                if(txtDestination.trim().equals("Inter-State")){
                    radioStatusGroup.check(R.id.radioPositive);
                }
                if(txtDestination.trim().equals("Intra-State")){
                    radioStatusGroup.check(R.id.radioIntra_state);
                }


                if(txtDestination.trim().equals("International") && txtDestCountry.equals("Nigeria")){

                    spinnerState.setVisibility(View.VISIBLE);
                    spinnerLGA.setVisibility(View.VISIBLE);
                    //spinnerCountry.setVisibility(View.GONE);
                    tv2.setVisibility(View.VISIBLE);
                    tv3.setVisibility(View.VISIBLE);
                    tv4.setVisibility(View.VISIBLE);

                }


                ed1.setText(txtdescription.toString());

                ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1, country_list);
                dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
                spinnerCountry.setAdapter(dataAdapter);

            ArrayAdapter<String> dataAdapter1 = new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1, state_list);
            dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
            spinnerState.setAdapter(dataAdapter1);

                ArrayAdapter<String> dataAdapter3= new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1, lga_list);
                dataAdapter3.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
                spinnerLGA.setAdapter(dataAdapter3);

                ArrayAdapter<String> dataAdapter4 = new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1, ship_list);
                dataAdapter4.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
                spinnerType.setAdapter(dataAdapter4);



                ArrayAdapter<String> dataAdapter5 = new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1, kg_list);
                dataAdapter5.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
                spinnerKg.setAdapter(dataAdapter5);





                spinnerCountry.setSelection(txtselected_Country_dest);




                spinnerState.setSelection(txtSelected_state_dest);
                spinnerLGA.setSelection(txtSelected_Id_lga_dest);
                spinnerKg.setSelection(txtSelected_Id_kg_dest);

                Log.i("Data","Im update after kg " +txtselected_Type_dest);
               // spinnerType.setSelection(txtselected_Type_dest);

                Log.i("Data","Im update after spinnerType " +txtselected_Type_dest);

                if(txtDestination.trim().equals("International") && txtDestCountry.equals("Nigeria")){


                    spinnerState.setVisibility(View.VISIBLE);
                    spinnerLGA.setVisibility(View.VISIBLE);
                    //spinnerCountry.setVisibility(View.GONE);
                    tv2.setVisibility(View.VISIBLE);
                    tv3.setVisibility(View.VISIBLE);
                    tv4.setVisibility(View.VISIBLE);

                }



            }
        } catch (Exception e) {
            e.printStackTrace();
        }
                /*
                catch (NullPointerException e) {
                    e.printStackTrace();
                }
                catch (IndexOutOfBoundsException el) {
                    el.printStackTrace();
                }

                catch (JSONException e) {
                    e.printStackTrace();
                }

                 */
    }



    @Override
    public void onResume(){
        super.onResume();
        if(txtDestination !=  null  && !txtDestination.equals("")){

            spinnerKg.setSelection(txtSelected_Id_kg_dest);
            spinnerType.setSelection(txtselected_Type_dest);

            if(txtDestination.trim().equals("International")){

                spinnerCountry.setSelection(txtselected_Country_dest);

            }



            if(txtDestination.trim().equals("Inter-State") || txtDestination.trim().equals("Intra-State")){





                spinnerState = (Spinner) findViewById(R.id.spinnerState);
                spinnerState.setSelection(txtSelected_state_dest);

                lga_Int=1;
                spinnerLGA = (Spinner) findViewById(R.id.spinnerLGA);
                spinnerLGA.setSelection(txtSelected_Id_lga_dest);

            }
        }
    }





}