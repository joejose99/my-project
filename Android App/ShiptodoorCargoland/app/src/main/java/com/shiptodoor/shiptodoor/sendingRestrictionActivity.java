package com.shiptodoor.shiptodoor;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.graphics.Color;
import android.os.AsyncTask;
import android.os.Bundle;

import com.google.android.material.floatingactionbutton.FloatingActionButton;
import com.google.android.material.snackbar.Snackbar;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import android.util.Log;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Spinner;
import android.widget.Toast;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class sendingRestrictionActivity extends AppCompatActivity {

    private String HttpURL = "https://www.cargoland.shiptodoor.com/cargoland/policy.php";

    private String spannerHolder, spanner1Holder, spanner2Holder, spanner3Holder, spanner4Holder, spanner5Holder, spanner6Holder,spannerDurexHolder,spanner7Holder, spanner8Holder, spanner9Holder,panner10Holder, IMEIHolder;

    private String txtSpinner1, txtSpinner3, txtSpinner2, txtSpinner4, txtSpinner5, txtSpinner6, txtSpinnerPop, txtSpinnerPop3, txtSpinnerPop4;

    Spinner spinner2, spinner1, spinner6, spinner3, spinner4, spinner5,spinnerCountry,spinnerState,spinnerLGA,spinnerKg,spinnerType;

    private  String txt1, txt2, txt3, txt4, txt5,txt6, txt7, txt8;
    private boolean CheckEditText =false;

    private RadioGroup radioStatusGroup;
    private RadioButton radioStatusButton;


    private Button butBack = null;
    private Toolbar  mTopToolbar;
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



    String finalResult, rst, result;
    /* ****** Pickup */


    private String txtPickupFname="";
    private String txtPickupSurname="";
    private String txtPickupAnswer=null;
    // private String txtEmail="";
    ProgressDialog progressDialog;

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


    private int loc =0;

    Context context;
    Intent intent;

    HttpParse httpParse = new HttpParse();


    String[] heroes_accronyms ;

    String Errors;

    // List<String> list = new ArrayList<String>();

EditText txtTracking;
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

    private  String  txtDecision;
    private  int  intDecision_id=0;

    private String txtFname;
    private String txtSurname;
    private String txtGender;

    private int lga_Int=0;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        try{
        setContentView(R.layout.activity_sending_restriction);
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

        txtTracking=findViewById(R.id.txtTracking);
        update_Text();
Log.i("Data","Ship List"+ship_list);

        butBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Log.d(TAG, "Subscribing to weather topic");
                if(loc ==1){

                    Intent intent = new Intent(sendingRestrictionActivity.this,ParcelLetterActivity.class);


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
                }else{
                    Intent intent = new Intent(sendingRestrictionActivity.this,Name.class);

                    intent.putExtra("txtFname",txtFname);
                    intent.putExtra("txtSurname",txtSurname);
                    intent.putExtra("txtGender",txtGender);


                    startActivity(intent);
                    finish();
                }

            }
        });

String policy ="Policy";
        SendEmail(policy);

        }catch(NullPointerException e){
            e.printStackTrace();
        }
        catch (IndexOutOfBoundsException el){
            el.printStackTrace();
        }

    }



    public void update_Text(){

        try{
        Intent intent3 = getIntent();

        if( intent3.getStringExtra("txtKg") != null)
        {
            country_list = (ArrayList<String>) getIntent().getSerializableExtra("key");

            state_list = (ArrayList<String>) getIntent().getSerializableExtra("key_state");
            lga_list = (ArrayList<String>) getIntent().getSerializableExtra("key_lga");
            ship_list = (ArrayList<String>) getIntent().getSerializableExtra("key_ship");
            kg_list = (ArrayList<String>) getIntent().getSerializableExtra("key_kg");

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

            Log.i("Spanner",txtDestCountry);
            Log.i("Spanner2",txtDestState);
            Log.i("Spanner3",txtDestLGA);
            Log.i("Spanner4",txtKg);
            Log.i("Spanner5",txtShippingType);


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

        loc= intent3.getIntExtra("loc",0);




                txtFname =intent3.getStringExtra("txtFname");
        txtSurname =intent3.getStringExtra("txtSurname");
        txtGender =intent3.getStringExtra("txtGender");

        }catch(NullPointerException e){
            e.printStackTrace();
        }
    }



    public void SendEmail(final String Spanner1 ){

        class LagClass extends AsyncTask<String,Void,String> {
            @Override
            protected void onPreExecute() {
                super.onPreExecute();

                progressDialog = ProgressDialog.show(sendingRestrictionActivity.this,"Policy","Loading policy please wait ....",false,false);
            }

            @Override
            protected void onPostExecute(String httpResponseMsg) {

                super.onPostExecute(httpResponseMsg);
                progressDialog.dismiss();
                String err ,err1;
                String str = httpResponseMsg.toString().replaceAll("\"","");

                Log.i("sucess: ", str.toString());
try{

                JSONArray jsonArray = new JSONArray(httpResponseMsg);


                String[] $heroes_category = new String[jsonArray.length()];

                int ctr =0;
                txtTracking.setText("");

                 String strTrack ="";
                for (int i = 0; i < jsonArray.length(); i++) {
                    JSONObject obj = jsonArray.getJSONObject(i);




                    $heroes_category[i] = obj.getString("policy");
                    strTrack=obj.getString("policy");

                txtTracking.append(strTrack.toString());

                    Log.e("params", $heroes_category[i].toString());


                    ctr++;

                }

                if(ctr == 0){
                    Toast.makeText(sendingRestrictionActivity.this,"Data Not Found!!",Toast.LENGTH_LONG).show();

                }


}
catch (JSONException e){
     e.printStackTrace();
}



            }

            @Override
            protected String doInBackground(String... params) {

                try {



                    txt1 = txtTracking.getText().toString();


                    JSONObject postDataParams = new JSONObject();



                    postDataParams.put("policy", txt1);


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


}