package com.shiptodoor.shiptodoor;


import android.graphics.Color;
import android.graphics.Rect;
import android.os.Bundle;



import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import android.text.TextUtils;
import android.view.MotionEvent;
import android.view.View;

import android.content.Intent;
import android.view.Window;
import android.view.WindowManager;
import android.widget.Button;



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

import com.chivorn.smartmaterialspinner.SmartMaterialSpinner;



public class ReceiverActivity extends AppCompatActivity implements AdapterView.OnItemSelectedListener {
    private Button butBack = null;
    private Toolbar  mTopToolbar;
    private Button butpay = null;


    private String spannerHolder, spanner1Holder, spanner2Holder, spanner3Holder, spanner4Holder, spanner5Holder, spanner6Holder,spannerDurexHolder,spanner7Holder, spanner8Holder, spanner9Holder,panner10Holder, IMEIHolder;

    private String txtSpinner1, txtSpinner3, txtSpinner2, txtSpinner4, txtSpinner5, txtSpinner6, txtSpinnerPop, txtSpinnerPop3, txtSpinnerPop4;

    Spinner spinner2, spinner1, spinner6, spinner3, spinner4, spinner5,spinnerCountry,spinnerState,spinnerLGA,spinnerKg,spinnerType;

    private ArrayList<String> country_list = new ArrayList<>();
    private ArrayList<String> state_list = new ArrayList<>();
    private ArrayList<String> lga_list = new ArrayList<>();
    private ArrayList<String> ship_list = new ArrayList<>();
    private ArrayList<String> kg_list = new ArrayList<>();


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

    private  int state_pickup_id;
    private int lga_pickup_id;

    private int state_sender_id;
    private int lga_sender_id;


    private boolean CheckEditText ;

    private RadioGroup radioStatusGroup;
    private RadioButton radioStatusButton;

    private  String  txtDecision;
    private  int  intDecision_id=0;

    HttpParse httpParse = new HttpParse();
    String IMEI_Number_Holder;
    TelephonyManager telephonyManager;

    DBHelper  mydb = new DBHelper(this);

    ArrayAdapter adapter;
    EditText ed1, ed2, ed3, ed4, ed5, ed6,ed7,ed8;
    private  String txt1, txt2, txt3, txt4, txt5,txt6, txt7, txt8;


    String finalResult, rst, result;

    TextView tv1, tv2, tv3, tv4, tv5;

    private String  price_vat_pickup_charge_delivery_charge;

private int errorType=0;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);


        try{


        setContentView(R.layout.activity_receiver);
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

            txtReceiverFname="";

        mTopToolbar=(Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(mTopToolbar);
        butBack = findViewById(R.id.button2);


        ed1=(EditText)findViewById(R.id.txtFname);
        ed2=(EditText)findViewById(R.id.txtSurname);
        ed3=(EditText)findViewById(R.id.txtAddress);
        ed4=(EditText)findViewById(R.id.txtCity);
        ed5=(EditText)findViewById(R.id.txtPostcode);
        ed6=(EditText)findViewById(R.id.txtMobileNo);

        spinner3 = (Spinner) findViewById(R.id.spinner3);





        butBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Log.d(TAG, "Subscribing to weather topic");
                Intent intent = new Intent(ReceiverActivity.this,PriceActivity.class);

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
                intent.putExtra("txtSenderlga",txtSenderlga);
                intent.putExtra("txtSenderState",txtSenderState);
                intent.putExtra("spanner3Holder",spanner3Holder);
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
        });


        butpay = findViewById(R.id.butReg);


        butpay.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Log.d(TAG, "Subscribing to weather topic");

                try{
                Intent intent = new Intent(ReceiverActivity.this,SenderActivity.class);

                ValidateText();


                if(CheckEditText){




                    txt1 = ed1.getText().toString();
                    txt2 = ed2.getText().toString();
                    txt3 = ed3.getText().toString();
                    txt4 = ed4.getText().toString();
                    txt5= ed5.getText().toString();
                    txt6 = ed6.getText().toString();

                    intent.putExtra("txtdescription",txtdescription);
                    intent.putExtra("txtDestCountry",txtDestCountry);
                    intent.putExtra("txtDestination",txtDestination);
                    intent.putExtra("txtDestState",txtDestState);
                    intent.putExtra("txtDestLGA",txtDestLGA);
                    intent.putExtra("txtKg",txtKg);
                    intent.putExtra("txtShippingType",txtShippingType);
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

                    intent.putExtra("txtReceiverFname",txt1);
                    intent.putExtra("txtReceiverSurname",txt2);
                    intent.putExtra("txtReceiverAnswer",txtReceiverAnswer);
                    intent.putExtra("txtReceiverAddress",txt3);
                    intent.putExtra("txtReceiverCity",txt4);
                    intent.putExtra("txtReceiverPostCode",txt5);
                    intent.putExtra("txtReceiverCountry",txtReceiverCountry);

                    intent.putExtra("spanner3Holder",spanner3Holder);

                    intent.putExtra("txtReceiverMobile",txt6);
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
                else {
                    if(errorType==1)  {
                        Toast.makeText(ReceiverActivity.this, "Please choose right Freight Type.", Toast.LENGTH_LONG).show();
                        return;
                    }
                     if(errorType==2)  {
                        Toast.makeText(ReceiverActivity.this, "pickup and Receiver's address can not be the same.", Toast.LENGTH_LONG).show();
                         errorType=0;
                        return;
                    }
                     else if(errorType==9)  {
                         Toast.makeText(ReceiverActivity.this, "Intra-State Freight is Only Available in Lagos State for now .", Toast.LENGTH_LONG).show();
                         errorType=0;
                         return;
                     }
                     else if(errorType==15)  {
                         Toast.makeText(ReceiverActivity.this, "Please use Inter-State Freight Type .", Toast.LENGTH_LONG).show();
                         errorType=0;
                         return;
                     }


                     else if(errorType==3)  {
                         Toast.makeText(ReceiverActivity.this, "Please use Intra-State Freight Type.", Toast.LENGTH_LONG).show();
                         return;
                     }

                    if(errorType==4)  {
                        Toast.makeText(ReceiverActivity.this, "Please use Inter-State  Freight Type.", Toast.LENGTH_LONG).show();
                        return;
                    }
                     else{
                         Toast.makeText(ReceiverActivity.this, "Please fill all form fields.", Toast.LENGTH_LONG).show();

                     }
                         }

                }catch(NullPointerException e){
                    e.printStackTrace();
                }
                catch (NumberFormatException el){
                    el.printStackTrace();
                }



            }
        });

            addItemsOnSpinner3();

            addListenerOnSpinnerItemSelectionTitle();

        update_Text();
            addItemsOnSpinner2();

        ed1.setOnFocusChangeListener(new View.OnFocusChangeListener() {
            @Override
            public void onFocusChange(View v, boolean hasFocus) {
                if (!hasFocus) {
                    hideKeyboard(v);
                }
            }
        });

        ed2.setOnFocusChangeListener(new View.OnFocusChangeListener() {
            @Override
            public void onFocusChange(View v, boolean hasFocus) {
                if (!hasFocus) {
                    hideKeyboard(v);
                }
            }
        });

        ed3.setOnFocusChangeListener(new View.OnFocusChangeListener() {
            @Override
            public void onFocusChange(View v, boolean hasFocus) {
                if (!hasFocus) {
                    hideKeyboard(v);
                }
            }
        });

        ed4.setOnFocusChangeListener(new View.OnFocusChangeListener() {
            @Override
            public void onFocusChange(View v, boolean hasFocus) {
                if (!hasFocus) {
                    hideKeyboard(v);
                }
            }
        });
        ed5.setOnFocusChangeListener(new View.OnFocusChangeListener() {
            @Override
            public void onFocusChange(View v, boolean hasFocus) {
                if (!hasFocus) {
                    hideKeyboard(v);
                }
            }
        });

        ed6.setOnFocusChangeListener(new View.OnFocusChangeListener() {
            @Override
            public void onFocusChange(View v, boolean hasFocus) {
                if (!hasFocus) {
                    hideKeyboard(v);
                }
            }
        });





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



    /*CALLING METHOD THAT HELP TO HIDE KEYBOARD  WHEN TOUCH BODY */
    public void hideKeyboard(View view) {
        InputMethodManager inputMethodManager =(InputMethodManager)getSystemService(Activity.INPUT_METHOD_SERVICE);
        inputMethodManager.hideSoftInputFromWindow(view.getWindowToken(), 0);


    }
    public void addItemsOnSpinner2() {

        spinnerState = (Spinner) findViewById(R.id.spinnerState);
        List<String> list = new ArrayList<String>();


        list.add("Select");

        list.add("Abia");
        list.add("Adamawa");
        list.add("Akwa Ibom");
        list.add("Anambra");
        list.add("Bauchi");
        list.add("Bayelsa");
        list.add("Benue");
        list.add("Borno");
        list.add("Cross River<");
        list.add("Delta");
        list.add("Ebonyi");
        list.add("Edo");
        list.add("Ekiti");
        list.add("Enugu");
        list.add("Imo");
        list.add("Gombe");
        list.add("Jigawa");
        list.add("Kaduna");
        list.add("Kano");
        list.add("Katsina");
        list.add("Kebbi");
        list.add("Kogi");
        list.add("Kwara");
        list.add("Lagos");
        list.add("Nassarawa");
        list.add("Niger");
        list.add("Ogun");
        list.add("Ondo");
        list.add("Osun");
        list.add("Oyo");
        list.add("Plateau");
        list.add("Rivers");
        list.add("Sokoto");
        list.add("Taraba");
        list.add("Yobe");
        list.add("Zamfara");
        list.add("FCT");



        ArrayAdapter<String> dataAdapter6 = new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1, list);
        dataAdapter6.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerState.setAdapter(dataAdapter6);
    }

    public void addItemsOnSpinner3() {

        spinner3 = (Spinner) findViewById(R.id.spinner3);
        List<String> list = new ArrayList<String>();
        list.add("Select");
        list.add("Mr");
        list.add("Mrs");
        list.add("Miss");
        list.add("Chief");
        ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1, list);
        dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinner3.setAdapter(dataAdapter);
    }


/*
    public void addListenerOnSpinnerItemSelectionState() {
        spinnerState = (Spinner) findViewById(R.id.spinnerState);
        //spinner2.setOnItemSelectedListener(new MyOnItemSelectedListener());
        txtSpinner2=(String) spinnerState.getSelectedItem();

    }

 */
  public void addListenerOnSpinnerItemSelectionTitle() {

        spinner3 = (Spinner) findViewById(R.id.spinner3);
        //spinner2.setOnItemSelectedListener(new MyOnItemSelectedListener());

        txtSpinner3=(String) spinner3.getSelectedItem();

    }




    public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
try{
        txtSpinner3=(String) spinner3.getSelectedItem();


} catch (NullPointerException e) {
    e.printStackTrace();
}

    }


    public void onNothingSelected(AdapterView<?> parent) {


    }





    public void update_Text(){

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

        price_vat_pickup_charge_delivery_charge =intent3.getStringExtra("price_vat_pickup_charge_delivery_charge");


        /* pick up section */

        txtPickupFname =intent3.getStringExtra("txtPickupFname");
        txtPickupSurname =intent3.getStringExtra("txtPickupSurname");
        txtPickupAnswer =intent3.getStringExtra("txtPickupAnswer");
        txtPickupAddress =intent3.getStringExtra("txtPickupAddress");
        txtPickupCity =intent3.getStringExtra("txtPickupCity");
        txtPickuplga  =intent3.getStringExtra("txtPickuplga");
        txtPickupState=intent3.getStringExtra("txtPickupState");
        txtSenderlga =intent3.getStringExtra("txtSenderlga");
        txtSenderState =intent3.getStringExtra("txtSenderState");


        txtPickupPostCode =intent3.getStringExtra("txtPickupPostCode");
        txtPickupCountry =intent3.getStringExtra("txtPickupCountry");
        txtPickupMobile =intent3.getStringExtra("txtPickupMobile");

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

        spanner3Holder =intent3.getStringExtra("spanner3Holder");


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




        if(txtReceiverFname  !=  null && !txtReceiverFname.equals("")){



            ed1.setText(txtReceiverFname.toString());
            ed2.setText(txtReceiverSurname.toString());
            ed3.setText(txtReceiverAddress.toString());
            ed4.setText(txtReceiverCity.toString());
            ed5.setText(txtReceiverPostCode.toString());
            ed6.setText(txtReceiverMobile.toString());
        }

    }




    public void ValidateText(){

        txt1 = ed1.getText().toString();
        txt2 = ed2.getText().toString();

        txt3= ed3.getText().toString();
        txt4 = ed4.getText().toString();

        txt5 = ed5.getText().toString();
        txt6 = ed6.getText().toString();


        spanner3Holder =String.valueOf(spinner3.getSelectedItem());
        selected_IdReceiver=  spinner3.getSelectedItemPosition();



        Log.e("line","First line".toString());

        //itemPosition =parseStr(int_index);

        String sel="Select";

          if( !txtDestination.trim().equals("International") && TextUtils.isEmpty(txt1)|| TextUtils.isEmpty(txt2)  ||  TextUtils.isEmpty(txt3)|| TextUtils.isEmpty(txt4) || TextUtils.isEmpty(txt6)  || spanner3Holder.trim().equals(sel.toString()) || spanner3Holder == null )
        {
            Log.e("States !: ","Inter State/ Intra State Freight Section".toString());
            CheckEditText = false;
            return;

        }
            else if(txtDestination.trim().equals("International")  && TextUtils.isEmpty(txt1)|| TextUtils.isEmpty(txt2)  ||  TextUtils.isEmpty(txt3)|| TextUtils.isEmpty(txt4) || TextUtils.isEmpty(txt6)   )
        {
            CheckEditText = false;
            Log.e("International !: ","International Freight Section".toString());
            return;
        }
       else if(txtSenderCountry.trim().equals("Nigeria") && txtDestination.trim().equals("International") && txtDestCountry.trim().equals("Nigeria"))
        {
            CheckEditText = false;
            Log.e("International !: ","International Freight Section".toString());
            errorType=15;
            return;
        }
          else if(txtDestination.trim().equals("International") && TextUtils.isEmpty(txt5) && !txtDestCountry.trim().equals("Nigeria") )
          {
              CheckEditText = false;
              Log.e("International2 !: ","International Freight Section".toString());
              return;
          }


          else if(txtDestination.trim().equals("Intra-State") && !txtDestState.trim().equals("Lagos")    )
          {
              Log.e("line","Second line".toString());
              errorType=9;
              CheckEditText = false;
              return;
          }

else if( intDecision_id == 3 && !txtDestination.trim().equals("International")){

              Log.e("line","Decision line".toString());
              checkTextAgain();
          }





        else {

            CheckEditText = true ;
              Log.e("True !: ","True Section".toString());
              return;

        }

    }


   private void checkTextAgain(){

       Log.e("line","Third line".toString());
       if(txt3.trim().equals(txtPickupAddress.trim().toString())  ){

           Log.e("line","Forth line".toString());
           CheckEditText = false;
           errorType=2;
           return;

       }

       else  if(txtDestination.trim().equals("Intra-State") && !txtPickupState.trim().equals(txtDestState)  ){

           Log.e("Intra-State : ","Intra State Freight".toString());
           errorType=4;

           return;
       }


       else  if(txtDestination.trim().equals("Inter-State") && !txtPickupState.trim().equals(txtDestState)   ){
           CheckEditText = true;

           Log.e("Inter-State !: ","Inter State Freight".toString());
           // return;
           // errorType=3;

       }

       else{
           CheckEditText = true;
       }

   }



    @Override
    public void onResume(){
        super.onResume();
        if(txtPickupFname !=  null ){

                spinner3 = (Spinner) findViewById(R.id.spinner3);
                spinner3.setSelection(selected_IdReceiver);
        }

    }




}