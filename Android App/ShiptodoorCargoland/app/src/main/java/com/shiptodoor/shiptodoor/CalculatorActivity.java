package com.shiptodoor.shiptodoor;


import android.annotation.SuppressLint;
import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.database.Cursor;
import android.graphics.Color;
import android.net.Uri;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
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

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.view.menu.MenuBuilder;
import androidx.appcompat.widget.Toolbar;

import com.google.android.material.bottomnavigation.BottomNavigationView;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Currency;
import java.util.Date;
import java.util.List;
import java.util.Locale;

import me.abhinay.input.CurrencyEditText;
import me.abhinay.input.CurrencySymbols;

public class CalculatorActivity extends AppCompatActivity implements AdapterView.OnItemSelectedListener {

    private Button butBack = null;
    private Button but_drop = null;
    private Button but_signatory  = null;
    private Toolbar  mTopToolbar;
    private Button butPay = null;


    ProgressDialog progressDialog;


    /* ****** Sender */

    private String txtSenderCountry;
    private String txtSenderState;
    private String txtSenderlga;
    private String txtSenderMobile;



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


     // private String txtEmail="";


    private int  txtSelected_Id_kg_dest= 0;
    private int txtSelected_Id_lga_dest;
    private  int  txtSelected_state_dest=0;
    private int txtselected_Type_dest;
    private int txtselected_Country_dest;


    private int selected_Id_kg =0;

    /* Destination */
    private String txtDestCountry="";
    private String txtKg ="";

    private String txtShippingType ="";

    private String txtDestination=null;
    private String choice_id;




    Context context;
    Intent intent;

    HttpParse httpParse = new HttpParse();


    String[] heroes_accronyms ;

    String Errors;




    private String HttpURL = "https://www.cargoland.shiptodoor.com/cargoland/price.php";


    private String HttpURL_WEIGHT = "https://www.cargoland.shiptodoor.com/cargoland/weight.php";

    private String HttpURL_STATE = "https://www.cargoland.shiptodoor.com/cargoland/state.php";

    private String HttpURL_COUNTRY = "https://www.cargoland.shiptodoor.com/cargoland/country.php";

    private String HttpURL_LGA = "https://www.cargoland.shiptodoor.com/cargoland/lga.php";

    private String HttpURL_SHIPMENT = "https://www.cargoland.shiptodoor.com/cargoland/shipment_category.php";



    private String spannerHolder, spanner1Holder, spanner2Holder, spanner3Holder, spanner4Holder, spanner5Holder, spanner6Holder,spannerDurexHolder,spanner7Holder, spanner8Holder, spanner9Holder,panner10Holder, IMEIHolder;

     private String txtSpinner1, txtSpinner3, txtSpinner2, txtSpinner4, txtSpinner5, txtSpinner6, txtSpinnerPop, txtSpinnerPop3, txtSpinnerPop4;

    Spinner spinner2, spinner1, spinner6, spinner3, spinner4, spinner5,spinnerCountry,spinnerState,spinnerLGA,spinnerKg,spinnerType;

    private  String txt1, txt2, txt3, txt4, txt5,txt6, txt7, txt8;
    private boolean CheckEditText =false;




    private ArrayList<String> country_list = new ArrayList<>();
    private ArrayList<String> state_list = new ArrayList<>();
    private ArrayList<String> lga_list = new ArrayList<>();
    private ArrayList<String> ship_list = new ArrayList<>();
    private ArrayList<String> kg_list = new ArrayList<>();

    private String tot_price_sig;
    private String tot_price_drop;


    private RadioGroup radioStatusGroup;
    private RadioButton radioStatusButton;



    // List<String> list = new ArrayList<String>();


    List<String> listParty = new ArrayList<String>();


    public JSONObject postData;

    String  select="Select";

    private  int state_pickup_id;
    private int lga_pickup_id;

    private int state_sender_id;
    private int lga_sender_id;

    private int lga_Int=0;



    ArrayAdapter adapter;
    EditText ed1, ed2, ed3, ed4, ed5, ed6,ed7,ed8;
    String finalResult, rst, result;

    TextView tv1, tv2, tv3, tv4, tv5;

    CurrencyEditText etInput,etInput_amt;
    private String nairaSymbole;
    private String nairaCode ;
    /* ****** Sender */

    DBHelper  mydb = new DBHelper(this);

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        try{

        setContentView(R.layout.activity_calculator);
        Toolbar toolbar = findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
            txtSpinner4="Select";

            but_signatory = findViewById(R.id.but_signatory);

        but_drop = findViewById(R.id.but_drop);

        butBack = findViewById(R.id.button2);
            but_drop.setText("");
            but_signatory.setText("");

        getSupportActionBar().setDisplayShowHomeEnabled(true);
        //getSupportActionBar().setLogo(R.drawable.logo5);
        getSupportActionBar().setDisplayUseLogoEnabled(true);
        getSupportActionBar().setTitle("   Calculator");

        mTopToolbar=(Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(mTopToolbar);




            Window window = getWindow();

            /* Change status bar background color to white */
            window.clearFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN);

            window.addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS);

            int colorCodeLight = Color.parseColor("#ffffff");
            window.setStatusBarColor(colorCodeLight);



        butBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Log.d(TAG, "Subscribing to weather topic");
                Intent intent = new Intent(CalculatorActivity.this,MenuActivity.class);
                startActivity(intent);
                finish();
            }
        });


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


            Locale local =  Locale.getDefault();
            Log.e("Line : ","First Line".toString());


            Locale nigLocal = new Locale("en","NG");
            Currency curr=  Currency.getInstance(nigLocal);
            nairaCode = curr.getCurrencyCode();
            nairaSymbole =curr.getSymbol();
            Log.e("Line : ","Second Line".toString());



            etInput_amt = (CurrencyEditText) findViewById(R.id.etInput);
            // etInput.setCurrency(CurrencySymbols.USA);

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
         spinnerKg.setOnItemSelectedListener(this);


            //radioStatusButton=(RadioButton) findViewById(selectedId);
        RadioGroup radioGroup = (RadioGroup) findViewById(R.id.radio_status);
        radioGroup.setOnCheckedChangeListener(new RadioGroup.OnCheckedChangeListener(){
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

                but_drop.setText("");
                but_signatory.setText("");

                if(choice.equals("Inter-State") ){
                    //radioStatusGroup.check(R.id.radioPositive);

                    spinnerState.setVisibility(View.VISIBLE);
                    spinnerLGA.setVisibility(View.VISIBLE);
                    spinnerCountry.setVisibility(View.GONE);
                    tv2.setVisibility(View.VISIBLE);
                    tv3.setVisibility(View.VISIBLE);
                    tv4.setVisibility(View.VISIBLE);
                    tv1.setVisibility(View.GONE);


                    spinnerLGA.setSelection(0);
                    spinnerState.setSelection(0);

                    spinnerKg.setSelection(0);
                    spinnerType.setSelection(0);





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


                    spinnerLGA.setSelection(0);
                    spinnerState.setSelection(0);

                    spinnerKg.setSelection(0);
                    spinnerType.setSelection(0);


                }

                if(choice.equals("International") ){

                    spinnerState.setVisibility(View.GONE);
                    spinnerLGA.setVisibility(View.GONE);
                    spinnerCountry.setVisibility(View.VISIBLE);
                    tv1.setVisibility(View.VISIBLE);
                    tv2.setVisibility(View.GONE);
                    tv3.setVisibility(View.GONE);
                    tv4.setVisibility(View.GONE);


                    spinnerCountry.setSelection(0);

                    spinnerKg.setSelection(0);
                    spinnerType.setSelection(0);

                }


                PopulateCategory(choice);


            }


        });




        BottomNavigationView navView = findViewById(R.id.nav_view);
        // Passing each menu ID as a set of Ids because each
        // menu should be considered as top level destinations
        /*
        AppBarConfiguration appBarConfiguration = new AppBarConfiguration.Builder(
                R.id.navigation_home, R.id.navigation_send, R.id.navigation_track,R.id.navigation_help,R.id.navigation_logout)
                .build();


        NavController navController = Navigation.findNavController(this, R.id.nav_host_fragment);
        NavigationUI.setupActionBarWithNavController(this, navController, appBarConfiguration);
        NavigationUI.setupWithNavController(navView, navController);


         */
        BottomNavigationView bottomNavigationView = (BottomNavigationView) findViewById(R.id.nav_view);
        bottomNavigationView.setOnNavigationItemSelectedListener(new BottomNavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem item) {
                switch (item.getItemId()) {
                    case R.id.navigation_home:
                        //Toast.makeText(MenuActivity.this, "Home", Toast.LENGTH_SHORT).show();
                        Intent intent = new Intent(CalculatorActivity.this,MenuActivity.class);
                        startActivity(intent);
                        finish();
                        break;

                    case R.id.navigation_send:
                        //Toast.makeText(MenuActivity.this, "Send", Toast.LENGTH_SHORT).show();
                        Intent intent1 = new Intent(CalculatorActivity.this,ParcelLetterActivity.class);
                        startActivity(intent1);
                        finish();
                        break;
                    case R.id.navigation_track:
                        //Toast.makeText(MenuActivity.this, "Tracking", Toast.LENGTH_SHORT).show();
                        Intent intent2 = new Intent(CalculatorActivity.this,TrackingActivity.class);
                        startActivity(intent2);
                        finish();
                        break;
                    case R.id.navigation_help:
                        //Toast.makeText(MenuActivity.this, "Help", Toast.LENGTH_SHORT).show();
                       /* Intent intent3 = new Intent(CalculatorActivity.this,HelpActivity.class);
                        startActivity(intent3);*/
                        Intent  browserIntent  = new Intent(Intent.ACTION_VIEW, Uri.parse("https://tawk.to/chat/60b7cf63de99a4282a1b0bc0/1f77047de"));
                        startActivity(browserIntent);
                        finish();
                        break;

                    case R.id.navigation_logout:
                        Intent intent4 = new Intent(CalculatorActivity.this,UserHistory.class);
                        startActivity(intent4);
                        finish();
                        //Toast.makeText(MenuActivity.this, "Log out", Toast.LENGTH_SHORT).show();
                        break;
                }
                return true;
            }
        });





            radioStatusGroup=(RadioGroup) findViewById(R.id.radio_status);

            selectedId =radioStatusGroup.getCheckedRadioButtonId();
            radioStatusButton=(RadioButton) findViewById(selectedId);
            String choice =radioStatusButton.getText().toString();





            // txtDestination=choice;

            //int  spinPosition =country_list.indexOf(txt7);


            ///int  spincontry =country_list.indexOf(txtDestCountry);
            Log.i("weight","*************** i here ************");

            txtSpinner4=(String) spinnerKg.getSelectedItem();
            Log.i("weight","*************** After Spinner 4 ************");
            Log.i("weight","Spinner 4: "+txtSpinner4);
            if(txtSpinner4== null)
            {
                Log.i("weight","*************** im in ************");
                PopulateCountry(choice);
                PopulateCategory(choice);

            }



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




    //R.menu.menu_main, menu
    @SuppressLint("RestrictedApi")
    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        // getMenuInflater().inflate(R.menu.menu_main,menu);
        getMenuInflater().inflate(R.menu.logout, menu);

        if(menu instanceof MenuBuilder){
            MenuBuilder m =(MenuBuilder)menu;
            m.setOptionalIconsVisible(true);
        }

        return true;
    }




    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_live_chat) {
            // Toast.makeText(UserLogin.this, "Action clicked", Toast.LENGTH_LONG).show();
            //Intent intent = new Intent(MenuActivity.this,LiveChat.class);
          /*
            Intent  browserIntent  = new Intent(Intent.ACTION_VIEW, Uri.parse("https://tawk.to/chat/60b7cf63de99a4282a1b0bc0/1f77047de"));
            startActivity(browserIntent);

           */
            Intent intent3 = new Intent(CalculatorActivity.this,HelpActivity.class);
            startActivity(intent3);



            finish();
            return true;

        }
        if (id == R.id.action_profile) {
            // Toast.makeText(UserLogin.this, "Action clicked", Toast.LENGTH_LONG).show();
            Intent intent = new Intent(CalculatorActivity.this,UserProfile.class);
            startActivity(intent);


            finish();
            return true;

        }
        if (id == R.id.action_logout) {
            // Toast.makeText(UserLogin.this, "Action clicked", Toast.LENGTH_LONG).show();
            Intent intent = new Intent(CalculatorActivity.this,UserLogin.class);
            startActivity(intent);


            finish();
            return true;

        }

        if (id == R.id.action_exit) {
            // Toast.makeText(Merchandizer.this, "Action clicked", Toast.LENGTH_LONG).show();
            // getLocations();

            // RegApp();
            ExitApp();


            return true;


        }





        return super.onOptionsItemSelected(item);
    }







    private void ExitApp(){

        android.os.Process.killProcess(android.os.Process.myPid());
        System.exit(1);
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
            list.add("Cross River");
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


        String[] myState=getResources().getStringArray(R.array.state_array);
//list.add(myState.toString());

        Log.i("State","My state "+myState.toString());





        ArrayAdapter<String> dataAdapter6 = new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1, list);
        dataAdapter6.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerState.setAdapter(dataAdapter6);
    }

    public void addItemsOnSpinner4() {

        spinnerLGA = (Spinner) findViewById(R.id.spinnerLGA);
        List<String> list = new ArrayList<String>();
        list.add("Select");

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
            case R.id.spinner4:
                {
                    if(!txtSpinner4.trim().equals("Select") ){
                        txtSpinner4=(String) spinnerKg.getSelectedItem();



                        getPrice(txtSpinner4 );
                    }

                }


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

                    if(txtDestination != null){
                        spinnerLGA.setSelection(txtSelected_Id_lga_dest);


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



        if(ctr ==1)
        {
            Toast.makeText(CalculatorActivity.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
            ctr=0;
        }

        ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, $heroes);
        dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerLGA.setAdapter(dataAdapter);
        }catch(NullPointerException e){
            e.printStackTrace();
        }
        catch(IndexOutOfBoundsException e){
            e.printStackTrace();
        }
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
                    if(txtDestination != null){


                        spinnerKg.setSelection(txtSelected_Id_kg_dest);

                        Log.e("Weight : ", "Kg "+ txtSelected_Id_kg_dest);



                    }




                    //Toast.makeText(ParcelLetterActivity.this,"Freight Category: "+ httpResponseMsg,Toast.LENGTH_LONG).show();

                } catch (JSONException e) {
                    e.printStackTrace();
                }

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



                    finalResult = httpParse.postRequest(postDataParams, HttpURL_WEIGHT);

                    Log.i("Second Line: ",postDataParams.toString());


                } catch (Exception e) {
                    e.printStackTrace();
                }



                return finalResult;
            }
        }
        WeightKgClass  kgWeightclass = new WeightKgClass();

        kgWeightclass.execute(choice);
    }



    private void loadIntokG(String json) throws JSONException {

        try{
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
            Toast.makeText(CalculatorActivity.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
            ctr=0;
        }

        ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, heroes_kg);
        dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerKg.setAdapter(dataAdapter);


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


                    loadIntoShipment(httpResponseMsg);

                    if(txtDestination != null){



                        spinnerType.setSelection(txtselected_Type_dest);




                        spinnerType = (Spinner) findViewById(R.id.spinnerCategory);


                        Log.e("Select Type Dest Pos: ",String.valueOf(txtselected_Type_dest).toString());


                        Log.e("Shiping Type: ", "Shiping Type".toString());



                    }


                } catch (JSONException e) {
                    e.printStackTrace();
                }

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

                    JSONObject postDataParams = new JSONObject();


                    postDataParams.put("choice", choice);


                    Log.i("params",postDataParams.toString());

                    Log.i("First Line: ",postDataParams.toString());

                    finalResult = httpParse.postRequest(postDataParams, HttpURL_SHIPMENT);

                    Log.i("Second Line: ",postDataParams.toString());


                } catch (Exception e) {
                    e.printStackTrace();
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
            Toast.makeText(CalculatorActivity.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
            ctr=0;
        }

        ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, $heroes_category);
        dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerType.setAdapter(dataAdapter);

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


                    if(txtDestination != null){



                        spinnerCountry.setSelection(txtselected_Country_dest);
                    }

                    loadCountry(httpResponseMsg);






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
            Toast.makeText(CalculatorActivity.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
            ctr=0;
        }

        ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, $heroes);
        dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerCountry.setAdapter(dataAdapter);



        //  spinnerCountry.setPadding(4,4,4,4);

    }






    /******** GET PRICE ********/

    public void getPrice(final String Spanner1 ){

        class LagClass extends AsyncTask<String,Void,String> {
            @Override
            protected void onPreExecute() {
                super.onPreExecute();

                progressDialog = ProgressDialog.show(CalculatorActivity.this,"LOADING Your Price ....",null,true,true);
            }

            @Override
            protected void onPostExecute(String string1) {

                super.onPostExecute(string1);
                progressDialog.dismiss();
                try{
                    Log.i("Lines: ","First Line");

                    String txtResident =getCountry();

                    Log.e("lINE:", "Return Value "+string1.toString());
                    txtDestination= radioStatusButton.getText().toString();
                    Log.e("lINE:", "FIRST LINE");
                    Log.e("lINE:", "Resident "+txtResident.toString());

                    Log.e("lINE:", "SECOND LINE".toString());

                    Log.e("String_Result:", string1.toString());


                    String str = string1.toString().replaceAll("\"","");

                    Log.e("String_Result:", str.toString());

                    String [] rst_total = str.split(":");

                    if(txtResident != null)
                    {
                        if(txtResident.trim().equals("Nigeria"))
                        {

                            etInput_amt.setCurrency(nairaSymbole);
                        }
                        /*
                        if(txtResident.trim().equals("Nigeria") && txtDestination.trim().equals("International"))
                        {

                            etInput_amt.setCurrency(CurrencySymbols.USA);
                        }

                         */
                        if(!txtResident.trim().equals("Nigeria")){

                            etInput_amt.setCurrency(CurrencySymbols.USA);
                        }

                        if(rst_total[6].toString().trim().equals("Inbound")){
                            etInput_amt.setCurrency(CurrencySymbols.USA);
                        }

                    }

                    etInput_amt.setDelimiter(false);
                    etInput_amt.setSpacing(false);
                    etInput_amt.setDecimals(false);

                    etInput_amt.setSpacing(true);

                    etInput_amt.setDelimiter(false);
                    etInput_amt.setSpacing(false);
                    etInput_amt.setDecimals(false);

                    etInput_amt.setSpacing(true);












                    etInput_amt.setText(rst_total[1].toString());

                    String pr =etInput_amt.getText().toString();
                    etInput_amt.setText(rst_total[2].toString());

                    String vat =etInput_amt.getText().toString();

                    etInput_amt.setText(rst_total[3].toString());

                    String pickup =etInput_amt.getText().toString();

                    etInput_amt.setText(rst_total[4].toString());

                    String deliv =etInput_amt.getText().toString();
                    etInput_amt.setText(rst_total[0].toString());

                    String tot =etInput_amt.getText().toString();

                    but_signatory.setText("\n Full Tracking plus signature on delivery inlcuding Optional Pickup charges \n \n Price: " + pr.toString()  +" \n VAT: " + vat.toString() +" \n Pickup Charge: "+ pickup.toString() +" \n Signature on delivery: "+deliv.toString() +" \n\n G.Total: "+tot.toString()+"\n "  );

                    // but_signatory.setText("Full Tracking plus signature on delivery \n \n Price: " + rst_total[1].toString()  +" \n VAT: " + rst_total[2].toString() +" \n Pickup Charge: "+ rst_total[3].toString() +" \n Signature on delivery: "+rst_total[4].toString() +" \n\n G.Total: "+rst_total[0].toString()  );

                    tot_price_sig=rst_total[0].toString();

                    tot_price_drop=rst_total[5].toString();

                    etInput_amt.setText(rst_total[5].toString());

                    String droptTot =etInput_amt.getText().toString();

                    //but_drop.setText("Full Tracking plus drop on delivery \n \n Price: " + rst_total[1].toString()  +" \n VAT: " + rst_total[2].toString() +" \n Pickup Charge: "+ rst_total[3].toString()   +" \n\n G.Total: "+rst_total[5].toString()  );
                    but_drop.setText("\n Full Tracking plus drop on delivery inlcuding Optional Pickup charges \n \n  Price: " + pr.toString()  +" \n VAT: " + vat.toString() +" \n Pickup Charge: "+ pickup.toString()  +" \n\n G.Total: "+droptTot.toString() +"\n " );



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


                    txtSpinner1=(String) spinnerCountry.getSelectedItem();

                    txtSpinner2=(String) spinnerState.getSelectedItem();

                    txtSpinner3=(String) spinnerLGA.getSelectedItem();

                    txtSenderCountry= getCountry();

                    txtSpinner4=(String) spinnerKg.getSelectedItem();
                    txtSpinner5=(String) spinnerType.getSelectedItem();



                        txtSenderMobile= getMobile();



                    JSONObject postDataParams = new JSONObject();


                    postDataParams.put("txtDestCountry", txtSpinner1);
                    postDataParams.put("txtDestination",radioStatusButton.getText().toString());
                    postDataParams.put("txtPickuplga", txtSpinner3);
                    postDataParams.put("txtPickupState", txtSpinner2);
                    postDataParams.put("txtPickuplga", txtSpinner3);
                    postDataParams.put("txtDestState", txtSpinner2);
                    postDataParams.put("txtDestLGA", txtSpinner3);
                    postDataParams.put("txtKg", txtSpinner4);
                    postDataParams.put("txtShippingType", txtSpinner5);
                    postDataParams.put("txtSenderMobile", txtSenderMobile);
                    postDataParams.put("txtSenderCountry", txtSenderCountry);
                    postDataParams.put("txtDecision", "Yes");

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



    private void loadPrice(String json) throws JSONException {

        try{
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
            Toast.makeText(CalculatorActivity.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
            ctr=0;
        }

        /*
        ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, $heroes);
        dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerLGA.setAdapter(dataAdapter);


         */
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


    private String getMobile(){

        Cursor res= mydb.getUsers(1);
        if(res.moveToFirst()){

            res.moveToFirst();

            txtSenderMobile  = res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_MOBILENO));

        }
        return  txtSenderMobile;
    }

}