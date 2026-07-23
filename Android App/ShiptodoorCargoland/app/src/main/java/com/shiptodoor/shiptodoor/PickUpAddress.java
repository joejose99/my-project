package com.shiptodoor.shiptodoor;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.database.Cursor;
import android.graphics.Color;
import android.graphics.Rect;
import android.os.AsyncTask;
import android.os.Bundle;
import android.telephony.TelephonyManager;
import android.text.TextUtils;
import android.util.Log;
import android.view.MotionEvent;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.view.inputmethod.InputMethodManager;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;


import com.chivorn.smartmaterialspinner.SmartMaterialSpinner;


public class PickUpAddress extends AppCompatActivity implements AdapterView.OnItemSelectedListener {

    private Button butReg = null;
    private Button butBack = null;
    private Toolbar  mTopToolbar;

    private String HttpURL_LGA = "https://www.cargoland.shiptodoor.com/cargoland/lga.php";
    StateList lst = new StateList();

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
    private  String txt1, txt2, txt3, txt4, txt5,txt6, txt7, txt8,txt9;


    String finalResult, rst, result;

    TextView tv1, tv2, tv3, tv4, tv5;




    /*  THIS VERABLE EBABLE CHECK ON BACK BUTTON FOR LGA UPDATE */
    private int lga_Int= 0;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        try{


        setContentView(R.layout.activity_pick_up_address);
        Toolbar toolbar = findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

            Window window = getWindow();

            /* Change status bar background color to white */
            window.clearFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN);

            window.addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS);

            int colorCodeLight = Color.parseColor("#ffffff");
            window.setStatusBarColor(colorCodeLight);



        setSupportActionBar(toolbar);

        getSupportActionBar().setDisplayShowHomeEnabled(true);
        //getSupportActionBar().setLogo(R.drawable.logo5);
        getSupportActionBar().setDisplayUseLogoEnabled(true);
        getSupportActionBar().setTitle("   Send Items");

        mTopToolbar=(Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(mTopToolbar);
        butBack =  (Button)findViewById(R.id.button2);

        butReg =  (Button) findViewById(R.id.butReg);

        ed1=(EditText)findViewById(R.id.txtFname);
        ed2=(EditText)findViewById(R.id.txtSurname);
        ed3=(EditText)findViewById(R.id.txtAddress);
        ed4=(EditText)findViewById(R.id.txtCity);
        ed5=(EditText)findViewById(R.id.txtPostcode);
        ed6=(EditText)findViewById(R.id.txtMobileNo);



        spinnerCountry = (Spinner) findViewById(R.id.spinner3);
        spinnerLGA = (Spinner) findViewById(R.id.spinnerLGA);
        spinnerState = (Spinner) findViewById(R.id.spinnerState);

        radioStatusGroup=(RadioGroup) findViewById(R.id.radio_status);

        int selectedId =radioStatusGroup.getCheckedRadioButtonId();
        radioStatusButton=(RadioButton) findViewById(selectedId);


        choice_id=radioStatusButton.getText().toString();


        tv1= (TextView) findViewById(R.id.txtTitle);

        tv3= (TextView) findViewById(R.id.txvState);
        tv4= (TextView) findViewById(R.id.txvLGA);


        ed1.setText("");
        ed2.setText("");
        ed3.setText("");

        //txtEmail = intent3.getStringExtra("txtEmail");





        butBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Log.d(TAG, "Subscribing to weather topic");

                Intent intent = new Intent(PickUpAddress.this,PickUpDecisionActivity.class);

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


        butReg.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Log.d(TAG, "Subscribing to weather topic");
                try{
                ValidateText();


                if(CheckEditText){

                    String dest =radioStatusButton.getText().toString();
                    noLenth_Pickup = dest.length();
                    Intent intent = new Intent(PickUpAddress.this,PriceActivity.class);

                    spanner1Holder =String.valueOf(spinnerCountry.getSelectedItem());

                    txtSpinner2 =String.valueOf(spinnerState.getSelectedItem());
                    txtSpinner3 =String.valueOf(spinnerLGA.getSelectedItem());

                    lga_pickup_id=  spinnerLGA.getSelectedItemPosition();
                    state_pickup_id=  spinnerState.getSelectedItemPosition();

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




                    /* pick up section */

                    intent.putExtra("txtPickupFname",txt1);
                    intent.putExtra("txtPickupSurname",txt2);
                    intent.putExtra("txtPickupAnswer",radioStatusButton.getText().toString());
                    intent.putExtra("txtPickupAddress",txt3);
                    intent.putExtra("txtPickupCity",txt4);
                    intent.putExtra("txtPickupPostCode",txt5);
                    intent.putExtra("txtPickupCountry",spanner1Holder);
                    intent.putExtra("txtPickuplga",txtSpinner3);
                    intent.putExtra("txtPickupState",txtSpinner2);
                    intent.putExtra("txtPickupMobile",txt6);
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
                    Toast.makeText(PickUpAddress.this, "Please fill all form fields.", Toast.LENGTH_LONG).show();
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

                radioStatusGroup=(RadioGroup) findViewById(R.id.radio_status);

                int selectedId =radioStatusGroup.getCheckedRadioButtonId();
                selected_Id_kg=selectedId;
                radioStatusButton=(RadioButton) findViewById(selectedId);

                String dest =radioStatusButton.getText().toString();
                noLenth_Pickup = dest.length();

                String choice =radioStatusButton.getText().toString();
                choice_id=radioStatusButton.getText().toString();

                txtPrice ="";

                if(choice.equals("Yes") ){
                    //radioStatusGroup.check(R.id.radioPositive);

                    Cursor res= mydb.getUsers(1);
                    if(res.moveToFirst()){



                        res.moveToFirst();
                        txt1    =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_FIRSTNAME));
                        txt2=   res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_SURNAME));
                        String title =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_TITLES));
                        txt4    =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_City));

                        String email =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_EMAIL));
                        txt3    =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_ADDRESS));
                        txt5   = res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_POSTCODE));
                        txt7  = res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_COUNTRY));
                        txt6    =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_MOBILENO));

                        txt8    =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_STATE));
                        txt9    =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_LGA));


                        ed1.setText(txt1.toString());
                        ed2.setText(txt2.toString());
                        ed3.setText(txt3.toString());
                        ed4.setText(txt4.toString());
                        ed5.setText(txt5.toString());
                        ed6.setText(txt6.toString());

                        txtDecision="Yes";
                        intDecision_id = 3;
                        //int spinPosition = adapter.getPosition(txt7);





                        int  spinPosition =country_list.indexOf(txt7);
                        spinnerCountry.setSelection(spinPosition);


                       // int Position_state= lst.get_listState(txt8.toString());
                        int  Position_state =state_list.indexOf(txt8);

                        spinnerState = (Spinner) findViewById(R.id.spinnerState);
                        // int  Position_state =state_list.indexOf(txt8.toString());
                        spinnerState.setSelection(Position_state);

                         Log.e("State Position: ",String.valueOf(Position_state).toString());





                        spanner3Holder=txt7;
                        // spinnerCountry.setSelection(0);

                        Log.e("End: ","*********** end of sqlite");


                    }

                }

                if(choice.equals("No") ){
                    //radioStatusGroup.check(R.id.radioPositive);
                    ed1.setText("");
                    ed2.setText("");
                    ed3.setText("");
                    ed4.setText("");
                    ed5.setText("");
                    ed6.setText("");
                    spanner3Holder="";

                    if(spinnerLGA.getSelectedItem() != null && !spinnerLGA.getSelectedItem().toString().trim().equals("Select")){
                        spinnerLGA.setSelection(0);
                    }
                    if(spinnerState.getSelectedItem() != null && !spinnerState.getSelectedItem().toString().trim().equals("Select")){
                        spinnerState.setSelection(0);
                    }

                    if( spinnerCountry.getSelectedItem()!= null && !spinnerCountry.getSelectedItem().toString().trim().equals("Select")){
                        spinnerCountry.setSelection(0);
                    }

                    /*
                    spinnerCountry.setSelection(0);
                    spinnerState.setSelection(0);
                    spinnerLGA.setSelection(0);

                     */

                    txtDecision="No";
                    intDecision_id = 2;
                }





            }


        });



        addItemsOnSpinner3();
            addItemsOnSpinner2();
        addItemsOnSpinner4();
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



        state_list.add(list.toString());

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
        catch (Exception e) {
        e.printStackTrace();
    }


    }


    public void onNothingSelected(AdapterView<?> parent) {


    }

    public void update_Text(){

        try{
        Intent intent3 = getIntent();

Log.i("Message","************ Update text ");
        country_list = (ArrayList<String>) getIntent().getSerializableExtra("key");


        lga_list = (ArrayList<String>) getIntent().getSerializableExtra("key_lga");
        ship_list = (ArrayList<String>) getIntent().getSerializableExtra("key_ship");
        kg_list = (ArrayList<String>) getIntent().getSerializableExtra("key_kg");

            Log.i("Message","************ country   "+country_list.toString());
            Log.i("Message","************ lga_list   "+lga_list.toString());
            Log.i("Message","************ ship_list   "+ship_list.toString());
            Log.i("Message","************ kg_list   "+kg_list.toString());

            state_list = (ArrayList<String>) getIntent().getSerializableExtra("key_state");
            Log.i("Message","************ state   "+state_list.toString());


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



        if(noLenth_Pickup == 3){
            radioStatusGroup.check(R.id.radio_yes);
        }


        if(txtKg != null){

            ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1, country_list);
            dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
            spinnerCountry.setAdapter(dataAdapter);

        }

            if(txtKg != null){

                ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1, state_list);
                dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
                spinnerState.setAdapter(dataAdapter);

            }

            if(txtPickupFname != null){
            ArrayAdapter<String> dataAdapter3= new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1, lga_list);
            dataAdapter3.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
            spinnerLGA.setAdapter(dataAdapter3);



        }

        if(txtPickupFname  !=  null ){

            ed1.setText(txtPickupFname.toString());
            ed2.setText(txtPickupSurname.toString());
            ed3.setText(txtPickupAddress.toString());
            ed4.setText(txtPickupCity.toString());
            ed5.setText(txtPickupPostCode.toString());
            ed6.setText(txtPickupMobile.toString());



        }
Log.i("end","Update text end");

        }catch(NullPointerException e){
            e.printStackTrace();
        } catch(IndexOutOfBoundsException e){
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
        if(txtPickupFname !=  null ){


            if(txtDestination.trim().equals("International")){
                int  spinPosition =country_list.indexOf(txtPickupCountry);
                spinnerCountry = (Spinner) findViewById(R.id.spinner3);
                spinnerCountry.setSelection(selected_IdPickup);

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

        lga_pickup_id=  spinnerLGA.getSelectedItemPosition();
        state_pickup_id=  spinnerState.getSelectedItemPosition();






        //itemPosition =parseStr(int_index);

        String sel="Select";

        if(txtDestination.trim().equals("International") && txtSpinner1.trim().equals(sel) )
        {
            CheckEditText = false;
            return;
        }

        if(txtDestination.trim().equals("International") &&  TextUtils.isEmpty(txt5) && !spanner3Holder.trim().equals("Nigeria") )
        {
            CheckEditText = false;
            return;
        }

        else if(txtDestination.trim().equals("Inter-State") && txtSpinner2.trim().equals(sel)   || txtDestination.trim().equals("Inter-State") && txtSpinner3.trim().equals(sel) )
        {
            CheckEditText = false;
            return;
        }

        else if(txtDestination.trim().equals("Inter-State") && txtSpinner2.trim().equals(sel)   || txtDestination.trim().equals("Inter-State") && txtSpinner3 == null )
        {
            CheckEditText = false;
            return;
        }



        else if(txtDestination.trim().equals("Intra-State") && txtSpinner2.trim().equals(sel)   || txtDestination.trim().equals("Intra-State") && txtSpinner3.trim().equals(sel) )
        {
            CheckEditText = false;
            return;
        }

        else if(txtDestination.trim().equals("Intra-State") && txtSpinner2.trim().equals(sel)   || txtDestination.trim().equals("Intra-State") && txtSpinner3==null )
        {
            CheckEditText = false;
            return;
        }



        else  if( TextUtils.isEmpty(txt1)|| TextUtils.isEmpty(txt2)  ||  TextUtils.isEmpty(txt3)|| TextUtils.isEmpty(txt4) || TextUtils.isEmpty(txt6)  )
        {

            CheckEditText = false;
            return;

        }
        else {

            CheckEditText = true ;
            return;

        }

    }


    public void ValidateFreight(){

        if(txtDestination.equals("Inter-State") ){
            //radioStatusGroup.check(R.id.radioPositive);

            spinnerState.setVisibility(View.VISIBLE);
            spinnerLGA.setVisibility(View.VISIBLE);
            spinnerCountry.setVisibility(View.GONE);

            tv3.setVisibility(View.VISIBLE);
            tv4.setVisibility(View.VISIBLE);
            tv1.setVisibility(View.GONE);

/*
            spinnerLGA.setSelection(0);
            spinnerState.setSelection(0);

 */

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

/*
            spinnerLGA.setSelection(0);
            spinnerState.setSelection(0);

 */

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


            if(spinnerCountry.getSelectedItem() != null && !spinnerCountry.getSelectedItem().toString().trim().equals("Select")){
                spinnerCountry.setSelection(0);
            }


            //spinnerCountry.setSelection(0);


        }


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

                    if(noLenth_Pickup == 3){
                        int  Position_lga =lga_list.indexOf(txt9.toString());


                        spinnerLGA.setSelection(Position_lga);

                        Log.e("lga Position: ",String.valueOf(Position_lga).toString());

                        Log.e("lga : ",txt9.toString());


                    }

                    if(lga_Int == 1){


                        spinnerLGA = (Spinner) findViewById(R.id.spinnerLGA);
                        spinnerLGA.setSelection(lga_pickup_id);

                        lga_Int=0;
                    }






                } catch (NullPointerException e) {
                    e.printStackTrace();
                }

            catch (Exception e) {
                e.printStackTrace();
            }
                /*
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

        try{
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
            Toast.makeText(PickUpAddress.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
            ctr=0;
        }

        ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, $heroes);
        dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerLGA.setAdapter(dataAdapter);

        } catch (NullPointerException e) {
            e.printStackTrace();
        }

        catch (Exception e) {
            e.printStackTrace();
        }

    }








}