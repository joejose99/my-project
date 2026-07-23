package com.shiptodoor.shiptodoor;

import android.content.Intent;
import android.database.Cursor;
import android.graphics.Color;
import android.graphics.Rect;
import android.os.Bundle;

import com.google.android.material.floatingactionbutton.FloatingActionButton;
import com.google.android.material.snackbar.Snackbar;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import android.text.TextUtils;
import android.view.MotionEvent;
import android.view.View;
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


public class SenderActivity extends AppCompatActivity  implements AdapterView.OnItemSelectedListener{

    private Button butBack = null;
    private Toolbar  mTopToolbar;
    private Button butpay = null;
    private String HttpURL_LGA = "https://www.cargoland.shiptodoor.com/cargoland/lga.php";


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
    private String txtSenderMobile;
    private String txtSenderState;
    private String txtSenderlga;
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
    private String txtPickupMobile;
    private String txtPickupState;
    private String txtPickuplga;
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


    HttpParse httpParse = new HttpParse();
    String IMEI_Number_Holder;
    TelephonyManager telephonyManager;

    DBHelper  mydb = new DBHelper(this);

    ArrayAdapter adapter;
    EditText ed1, ed2, ed3, ed4, ed5, ed6,ed7,ed8,ed10;
    private  String txt1, txt2, txt3, txt4, txt5,txt6, txt7, txt8,txt9,txt10;

    private String  price_vat_pickup_charge_delivery_charge;

    String finalResult, rst, result;

    TextView tv1, tv2, tv3, tv4, tv5;

    private  int state_pickup_id;
    private int lga_pickup_id;

    private int state_sender_id;
    private int lga_sender_id;

    StateList lst = new StateList();
    /*  THIS VERABLE EBABLE CHECK ON BACK BUTTON FOR LGA UPDATE */
    private int lga_Int= 0;

    private int errorType =0;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        try{


        setContentView(R.layout.activity_sender);
        Toolbar toolbar = findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);


            Window window = getWindow();

            /* Change status bar background color to white */
            window.clearFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN);

            window.addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS);

            int colorCodeLight = Color.parseColor("#ffffff");
            window.setStatusBarColor(colorCodeLight);

            txt9="";

        ed1=(EditText)findViewById(R.id.txtFname);
        ed2=(EditText)findViewById(R.id.txtSurname);
        ed3=(EditText)findViewById(R.id.txtAddress);
        ed4=(EditText)findViewById(R.id.txtCity);
        ed5=(EditText)findViewById(R.id.txtPostcode);
        ed6=(EditText)findViewById(R.id.txtMobileNo);


        spinnerCountry = (Spinner) findViewById(R.id.spinner3);
        spinnerLGA = (Spinner) findViewById(R.id.spinnerLGA);
        spinnerState = (Spinner) findViewById(R.id.spinnerState);


        tv1= (TextView) findViewById(R.id.txtTitle);

        tv3= (TextView) findViewById(R.id.txvState);
        tv4= (TextView) findViewById(R.id.txvLGA);

        radioStatusGroup=(RadioGroup) findViewById(R.id.radio_status);
        int selectedId =radioStatusGroup.getCheckedRadioButtonId();
        radioStatusButton=(RadioButton) findViewById(selectedId);

        choice_id=radioStatusButton.getText().toString();



            Cursor res= mydb.getUsers(1);
            Log.e("seventh line", "seventh line".toString());
            if(res.moveToFirst()){

                res.moveToFirst();
                txt10=res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_EMAIL));
                txtEmail =txt10;
            }



        getSupportActionBar().setDisplayShowHomeEnabled(true);
        //getSupportActionBar().setLogo(R.drawable.logo5);
        getSupportActionBar().setDisplayUseLogoEnabled(true);
        getSupportActionBar().setTitle("   Send Items");

        mTopToolbar=(Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(mTopToolbar);
        butBack = findViewById(R.id.button2);
        butBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Log.d(TAG, "Subscribing to weather topic");
                Intent intent = new Intent(SenderActivity.this,ReceiverActivity.class);


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


        butpay = findViewById(R.id.butReg);


        butpay.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Log.d(TAG, "Subscribing to weather topic");
try{
                ValidateText();
                Intent intent = new Intent(SenderActivity.this,SenderReview.class);




                ValidateText();
                ValidateDestination();

                if(CheckEditText){

                    String dest =radioStatusButton.getText().toString();
                    noLenthSender = dest.length();

                    spanner1Holder =String.valueOf(spinnerCountry.getSelectedItem());

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
                    intent.putExtra("txtPickupAnswer",radioStatusButton.getText().toString());
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




                    /* Sender section */

                    intent.putExtra("txtSenderFname",txt1);
                    intent.putExtra("txtSenderSurname",txt2);
                    intent.putExtra("txtSenderAnswer",radioStatusButton.getText().toString());

                    intent.putExtra("txtEmail",txtEmail);
                    intent.putExtra("txtSenderAddress",txt3);
                    intent.putExtra("txtSenderCity",txt4);
                    intent.putExtra("txtSenderPostCode",txt5);
                    intent.putExtra("txtSenderCountry",spanner1Holder);
                    intent.putExtra("txtSenderlga",txtSpinner3);
                    intent.putExtra("txtSenderState",txtSpinner2);

                    intent.putExtra("txtSenderMobile",txt6);
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

                    Log.e("Destination State : ",txtDestState.toString());

                    Log.e("Sender State : ",txtSpinner2.toString());



                    if(errorType==1)  {
                        Toast.makeText(SenderActivity.this, "Please choose right Freight Type.", Toast.LENGTH_LONG).show();
                        return;
                    }

                             else if(errorType==9)  {
                        Toast.makeText(SenderActivity.this, "Intra-State Freight is Only Available in Lagos State for now .", Toast.LENGTH_LONG).show();
                        errorType=0;
                        return;
                    }

                    else if(errorType==2)  {
                        Toast.makeText(SenderActivity.this, "pickup and Receiver's address can not be the same.", Toast.LENGTH_LONG).show();
                        errorType=0;
                        return;
                    }
                    else if(errorType==3)  {
                        Toast.makeText(SenderActivity.this, "Please use Intra-State Freight Type.", Toast.LENGTH_LONG).show();
                        return;
                    }

                    if(errorType==4)  {
                        Toast.makeText(SenderActivity.this, "Please use Inter-State  Freight Type.", Toast.LENGTH_LONG).show();
                        return;
                    }

                    else{
                        Toast.makeText(SenderActivity.this, "Please fill all form fields.", Toast.LENGTH_LONG).show();
                    }

                }


}catch(NullPointerException e){
    e.printStackTrace();
}



            }
        });




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







        /*  GET PICKUP DETAILS FROM THE REGISTER USERS*/
        RadioGroup radioGroup = (RadioGroup) findViewById(R.id.radio_status);
        radioGroup.setOnCheckedChangeListener(new RadioGroup.OnCheckedChangeListener(){
            @Override
            public void onCheckedChanged(RadioGroup group, int checkedId) {

                CheckStatus();



            }


        });






        addItemsOnSpinner3();
            addItemsOnSpinner2();
        spinnerCountry.setOnItemSelectedListener(this);
        // spinnerLGA.setOnItemSelectedListener(this);
        spinnerState.setOnItemSelectedListener(this);

        update_Text();


        ValidateFreight();



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


    private void CheckStatus(){
try{



        radioStatusGroup=(RadioGroup) findViewById(R.id.radio_status);

        int selectedId =radioStatusGroup.getCheckedRadioButtonId();
        selected_Id_kg=selectedId;
        radioStatusButton=(RadioButton) findViewById(selectedId);

        String dest =radioStatusButton.getText().toString();
        noLenthSender = dest.length();

        String choice =radioStatusButton.getText().toString();
        choice_id=radioStatusButton.getText().toString();



        if(choice.equals("Yes") ){
            //radioStatusGroup.check(R.id.radioPositive);
            Log.e("Sixth line", "Sixth line".toString());

            Cursor res= mydb.getUsers(1);
            Log.e("seventh line", "seventh line 77".toString());
            if(res.moveToFirst()){



                res.moveToFirst();
                txt1    =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_FIRSTNAME));
                txt2=   res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_SURNAME));
                String title =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_TITLES));
                txt4    =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_City));

                String email =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_EMAIL));
                txt10=res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_EMAIL));
                txtEmail =txt10;
                txt3    =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_ADDRESS));
                txt5   = res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_POSTCODE));
                txt7  = res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_COUNTRY));
                txt6    =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_MOBILENO));




                txt8    =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_STATE));
                txt9    =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_LGA));

                //Log.i("Data","LGA Text Id ",txt9);

                ed1.setText(txt1.toString());
                ed2.setText(txt2.toString());
                ed3.setText(txt3.toString());
                ed4.setText(txt4.toString());
                ed5.setText(txt5.toString());
                ed6.setText(txt6.toString());


                int  spinPosition =country_list.indexOf(txt7);
                spinnerCountry.setSelection(spinPosition);


                //int Position_state= lst.get_listState(txt8.toString());
                int Position_state= state_list.indexOf(txt8);

                spinnerState = (Spinner) findViewById(R.id.spinnerState);
                // int  Position_state =state_list.indexOf(txt8.toString());
                spinnerState.setSelection(Position_state);

                Log.e("State Position: ",String.valueOf(Position_state).toString());


                spanner3Holder=txt7;
                // spinnerCountry.setSelection(0);




            }

        }

        if(choice.equals("No") ){
            //radioStatusGroup.check(R.id.radioPositive);


            Cursor res= mydb.getUsers(1);
            Log.e("seventh line", "seventh line".toString());
            if(res.moveToFirst()){

                res.moveToFirst();
                txt10=res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_EMAIL));
                txtEmail =txt10;
            }









                ed1.setText("");
            ed2.setText("");
            ed3.setText("");
            ed4.setText("");
            ed5.setText("");
            ed6.setText("");
            spanner3Holder="";
/*
            spinnerCountry.setSelection(0);
            spinnerState.setSelection(0);
            spinnerLGA.setSelection(0);

 */

            if(spinnerLGA.getSelectedItem() != null && !spinnerLGA.getSelectedItem().toString().trim().equals("Select")){
                spinnerLGA.setSelection(0);
            }
            if(spinnerState.getSelectedItem() != null && !spinnerState.getSelectedItem().toString().trim().equals("Select")){
                spinnerState.setSelection(0);
            }

            if( spinnerCountry.getSelectedItem()!= null && !spinnerCountry.getSelectedItem().toString().trim().equals("Select")){
                spinnerCountry.setSelection(0);
            }


        }




}catch(Exception e){
    e.printStackTrace();
}



    }


    /*CALLING METHOD THAT HELP TO HIDE KEYBOARD  WHEN TOUCH BODY */
    public void hideKeyboard(View view) {
        InputMethodManager inputMethodManager =(InputMethodManager)getSystemService(Activity.INPUT_METHOD_SERVICE);
        inputMethodManager.hideSoftInputFromWindow(view.getWindowToken(), 0);


    }


    public void addItemsOnSpinner3() {

        spinnerCountry = (Spinner) findViewById(R.id.spinner3);
        List<String> list = new ArrayList<String>();
        //list.add("Select");
        /*
        list.add("Door to Door");
        list.add("Airport to Airport");

         */

        ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1, country_list);
        dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerCountry.setAdapter(dataAdapter);
    }


    public void addItemsOnSpinner2() {

        spinnerState = (Spinner) findViewById(R.id.spinnerState);
        List<String> list = new ArrayList<String>();



        state_list.add("Select");

        state_list.add("Abia");
        state_list.add("Adamawa");
        state_list.add("Akwa Ibom");
        state_list.add("Anambra");
        state_list.add("Bauchi");
        state_list.add("Bayelsa");
        state_list.add("Benue");
        state_list.add("Borno");
        state_list.add("Cross River<");
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
        state_list.add("Nassarawa");
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
list=state_list;

        ArrayAdapter<String> dataAdapter6 = new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1, list);
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

    public void addListenerOnSpinnerItemSelectionLGA() {
        spinnerLGA = (Spinner) findViewById(R.id.spinnerLGA);
        //spinner2.setOnItemSelectedListener(new MyOnItemSelectedListener());
        txtSpinner3=(String) spinnerLGA.getSelectedItem();
    }

    public void addListenerOnSpinnerItemSelectionState() {
        spinnerState = (Spinner) findViewById(R.id.spinnerState);
        //spinner2.setOnItemSelectedListener(new MyOnItemSelectedListener());
        txtSpinner2=(String) spinnerState.getSelectedItem();

    }



    public void addListenerOnSpinnerItemSelectionCountry() {
        spinnerCountry = (Spinner) findViewById(R.id.spinner3);
        //spinner2.setOnItemSelectedListener(new MyOnItemSelectedListener());

        txtSpinner1=(String) spinnerCountry.getSelectedItem();

    }




    public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
        try{


        txtSpinner1=(String) spinnerCountry.getSelectedItem();

        txtSpinner2=(String) spinnerState.getSelectedItem();

        txtSpinner3=(String) spinnerLGA.getSelectedItem();


        //String sp1= String.valueOf(spinner2.getSelectedItem());
        //String sp3= String.valueOf(spinner3.getSelectedItem());

        // String sp4= String.valueOf(spinner4.getSelectedItem());
        //txtSpinner4=(String) spinnerKg.getSelectedItem();
        //txtSpinner5=(String) spinnerType.getSelectedItem();




        int ids = parent.getId();



        switch(ids)
        {
            case R.id.spinnerState:

                PopulateLGA(txtSpinner2);


                break;




        }

    } catch (NullPointerException e) {
        e.printStackTrace();
    }
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

                    if(noLenth_Pickup == 3 && !txt9.equals("")){

                        Log.i("Lga","im here ************");
                        int  Position_lga =lga_list.indexOf(txt9.toString());

                        Log.e("lga Position: ",String.valueOf(Position_lga).toString());
                        spinnerLGA.setSelection(Position_lga);

                        Log.e("lga Position: ",String.valueOf(Position_lga).toString());

                        Log.e("lga : ",txt9.toString());


                    }

                    if(lga_Int == 1){


                        spinnerLGA = (Spinner) findViewById(R.id.spinnerLGA);
                        spinnerLGA.setSelection(lga_pickup_id);

                        lga_Int=0;
                    }






                } catch (JSONException e) {
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

        Log.e("Counters", counters.toString());

        if(ctr ==1)
        {
            Toast.makeText(SenderActivity.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
            ctr=0;
        }

        ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, $heroes);
        dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerLGA.setAdapter(dataAdapter);

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

            price_vat_pickup_charge_delivery_charge =intent3.getStringExtra("price_vat_pickup_charge_delivery_charge");


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



        if(noLenthSender == 3){
            radioStatusGroup.check(R.id.radio_yes);
            CheckStatus();
        }



            if(txtReceiverFname != null){


                ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1, country_list);
                dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
                spinnerCountry.setAdapter(dataAdapter);
            }

        if(txtSenderFname != null){

            ArrayAdapter<String> dataAdapter1 = new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1, state_list);
            dataAdapter1.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
            spinnerState.setAdapter(dataAdapter1);

            ArrayAdapter<String> dataAdapter3= new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1, lga_list);
            dataAdapter3.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
            spinnerLGA.setAdapter(dataAdapter3);



            if(txtDestination.equals("International")){
                int  spinPosition =country_list.indexOf(txtSenderCountry);
                spinnerCountry.setSelection(spinPosition);

            }

            Log.i("Level","Level 20");
            if(txtDestination.equals("Inter-State") || txtDestination.equals("Intra-State")){
                Log.i("Level","Level 20B");
                int  spinPosition =state_list.indexOf(txtSenderState);
                spinnerState.setSelection(spinPosition);
                Log.i("Level","Level 20c");
                int spinPo =lga_list.indexOf(txtSenderlga);
                spinnerLGA.setSelection(spinPo);
                Log.i("Level","Level 20D");
            }

        }


        if(txtSenderFname  !=  null && !txtSenderFname.equals("")){

            Log.i("Level","Level 20E");

            ed1.setText(txtSenderFname.toString());
            ed2.setText(txtSenderSurname.toString());
            ed3.setText(txtSenderAddress.toString());
            ed4.setText(txtSenderCity.toString());
            ed5.setText(txtSenderPostCode.toString());
            ed6.setText(txtSenderMobile.toString());

            Log.i("Level","Level 20F");

        }

        }catch(NullPointerException e){
            e.printStackTrace();
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


    private void selectValue(Spinner spinner3, Object value ){


    }

    @Override
    public void onResume(){
        super.onResume();
        if(txtSenderFname !=  null || !txtSenderFname.equals("")){


            if(txtDestination.trim().equals("International")){
                int  spinPosition =country_list.indexOf(txtPickupCountry);
               // spinnerCountry.setSelection(selected_IdPickup);

                   spinPosition =country_list.indexOf(txtSenderCountry);
                spinnerCountry.setSelection(spinPosition);
            }
            if(txtDestination.trim().equals("Inter-State") || txtDestination.trim().equals("Intra-State")){


                spinnerState = (Spinner) findViewById(R.id.spinnerState);
                spinnerState.setSelection(state_pickup_id);

                lga_Int=1;
                spinnerLGA = (Spinner) findViewById(R.id.spinnerLGA);
                spinnerLGA.setSelection(lga_pickup_id);

            }
        }
    }





    public void ValidateDestination(){

        txt3= ed3.getText().toString();
        txtSpinner2 =String.valueOf(spinnerState.getSelectedItem());
        //if(txtSpinner2.trim().equals(txtPickupState.toString())){


        if(txt3.trim().equals(txtReceiverAddress.toString())){
            CheckEditText = false;
            errorType=2;
            return;
        }

        else  if(txtDestination.trim().equals("Intra-State") && txtSpinner2.trim().equals(txtDestState) ){

            Log.e("Intra-State : ","Intra State Freight".toString());

            CheckEditText = true;
            ValidateText();
            return;
        }

        else  if(txtDestination.trim().equals("Intra-State") && !txtSpinner2.trim().equals(txtDestState) ){

            Log.e("Intra-State : ","Intra State Freight".toString());
            CheckEditText =false;
            errorType=4;


            return;
        }


        else  if(txtDestination.trim().equals("Inter-State") && !txtSpinner2.trim().equals(txtDestState) ){
            CheckEditText = true;

            Log.e("Inter-State !: ","Inter State Freight".toString());
            ValidateText();
            return;
            // errorType=3;

        }

        else  if(txtDestination.trim().equals("Inter-State") && txtSpinner2.trim().equals(txtDestState) ){
            CheckEditText = false;

            Log.e("Inter-State : ","Inter State Freight".toString());

            errorType=3;
            return;

        }

        else  if(txtDestination.trim().equals("International") ){

            CheckEditText = true;
            ValidateText();
            Log.e("International : ","International Freight".toString());
            return;



        }
        else {
            CheckEditText = false;
            ValidateText();
            Log.e("Error : ","Error One".toString());
            errorType=1;
            return;
        }
    }







    public void ValidateText(){

        txt1 = ed1.getText().toString();
        txt2 = ed2.getText().toString();

        txt3= ed3.getText().toString();
        txt4 = ed4.getText().toString();

        txt5 = ed5.getText().toString();
        txt6 = ed6.getText().toString();



        spanner3Holder =String.valueOf(spinnerCountry.getSelectedItem());
        txtSpinner2 =String.valueOf(spinnerState.getSelectedItem());
        txtSpinner3 =String.valueOf(spinnerLGA.getSelectedItem());
        selected_IdPickup=  spinnerCountry.getSelectedItemPosition();






        //itemPosition =parseStr(int_index);

        String sel="Select";

        if(txtDestination.trim().equals("International") && txtSpinner1.trim().equals(sel) )
        {
            CheckEditText = false;
            return;
        }




        else if(txtDestination.trim().equals("Inter-State") && txtSpinner2.trim().equals(sel)   || txtDestination.trim().equals("Inter-State") && txtSpinner3.trim().equals(sel) )
        {
            CheckEditText = false;
            return;
        }



        else if(txtDestination.trim().equals("Intra-State") && txtSpinner2.trim().equals(sel)   || txtDestination.trim().equals("Intra-State") && txtSpinner3.trim().equals(sel) )
        {
            CheckEditText = false;
            return;
        }
/*
        else if(txtDestination.trim().equals("Intra-State") && !txtSpinner2.trim().equals("Lagos")    )
        {
            errorType=9;
            CheckEditText = false;
            return;
        }
*/

        else  if( TextUtils.isEmpty(txt1)|| TextUtils.isEmpty(txt2)  ||  TextUtils.isEmpty(txt3)|| TextUtils.isEmpty(txt4) ||  TextUtils.isEmpty(txt6)  )
        {

            CheckEditText = false;

            return;

        }

        else   if(txt3.trim().equals(txtReceiverAddress.toString()) && txt3.trim().equals(txtPickupAddress)){
            CheckEditText = false;
            errorType=2;
            return;

        }

        else  if(txtDestination.trim().equals("Intra-State") && txtSpinner2.trim().equals(txtDestState) ){

            Log.e("Intra-State : ","Intra State Freight".toString());

            //ValidateText();
            //return;
        }
/*
        else  if(txtDestination.trim().equals("Intra-State") && !txtSpinner2.trim().equals(txtDestState) ){

            Log.e("Intra-State : ","Intra State Freight".toString());
            errorType=4;

            return;
        }


        else  if(txtDestination.trim().equals("Inter-State") && !txtSpinner2.trim().equals(txtDestState) ){
            CheckEditText = true;

            Log.e("Inter-State !: ","Inter State Freight".toString());
            // return;
            // errorType=3;

        }


 */


        else {

            CheckEditText = true ;

        }

    }


    public void ValidateFreight(){

        if(txtDestination != null){


            if(txtDestination.equals("Inter-State") ){
                //radioStatusGroup.check(R.id.radioPositive);

                spinnerState.setVisibility(View.VISIBLE);
                spinnerLGA.setVisibility(View.VISIBLE);
                spinnerCountry.setVisibility(View.GONE);

                tv3.setVisibility(View.VISIBLE);
                tv4.setVisibility(View.VISIBLE);
                tv1.setVisibility(View.GONE);


                //spinnerLGA.setSelection(0);
                //spinnerState.setSelection(0);

                if(spinnerLGA.getSelectedItem() != null && !spinnerLGA.getSelectedItem().toString().trim().equals("Select")){
                    spinnerLGA.setSelection(0);
                }
                if(spinnerState.getSelectedItem() != null && !spinnerState.getSelectedItem().toString().trim().equals("Select")){
                    spinnerState.setSelection(0);
                }



            }

            if(txtDestination.equals("Intra-State") ){
                //radioStatusGroup.check(R.id.radioPositive);

                spinnerState.setVisibility(View.VISIBLE);
                spinnerLGA.setVisibility(View.VISIBLE);
                spinnerCountry.setVisibility(View.GONE);

                tv3.setVisibility(View.VISIBLE);
                tv4.setVisibility(View.VISIBLE);
                tv1.setVisibility(View.GONE);


                //spinnerLGA.setSelection(0);
                //spinnerState.setSelection(0);

                if(spinnerLGA.getSelectedItem() != null && !spinnerLGA.getSelectedItem().toString().trim().equals("Select")){
                    spinnerLGA.setSelection(0);
                }
                if(spinnerState.getSelectedItem() != null && !spinnerState.getSelectedItem().toString().trim().equals("Select")){
                    spinnerState.setSelection(0);
                }




            }

            if(txtDestination.equals("International") ){

                spinnerState.setVisibility(View.GONE);
                spinnerLGA.setVisibility(View.GONE);
                spinnerCountry.setVisibility(View.VISIBLE);
                tv1.setVisibility(View.VISIBLE);

                tv3.setVisibility(View.GONE);
                tv4.setVisibility(View.GONE);

                if( spinnerCountry.getSelectedItem()!= null && !spinnerCountry.getSelectedItem().toString().trim().equals("Select")){
                    spinnerCountry.setSelection(0);
                }
               // spinnerCountry.setSelection(0);



            }
        }


    }











}