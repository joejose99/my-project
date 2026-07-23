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

public class AddressActivity extends AppCompatActivity implements AdapterView.OnItemSelectedListener {

    private Button butReg = null;
    private Button butBack = null;
    private Toolbar  mTopToolbar;

    private String spannerHolder, spanner1Holder, spanner2Holder, spanner3Holder, spanner4Holder, spanner5Holder, spanner6Holder,spannerDurexHolder,spanner7Holder, spanner8Holder, spanner9Holder,panner10Holder, IMEIHolder;

    private String txtSpinner1, txtSpinner3, txtSpinner2, txtSpinner4, txtSpinner5, txtSpinner6, txtSpinnerPop, txtSpinnerPop3, txtSpinnerPop4;

    Spinner spinner2, spinner1, spinner6, spinner3, spinner4, spinner5,spinnerCountry,spinnerState,spinnerLGA,spinnerKg,spinnerType;

    private ArrayList<String> country_list = new ArrayList<>();
    private ArrayList<String> state_list = new ArrayList<>();
    private ArrayList<String> lga_list = new ArrayList<>();
    private ArrayList<String> ship_list = new ArrayList<>();
    private ArrayList<String> kg_list = new ArrayList<>();

    private String HttpURL_COUNTRY = "https://www.cargoland.shiptodoor.com/cargoland/country.php";


    private String HttpURL_LGA = "https://www.cargoland.shiptodoor.com/cargoland/lga.php";



    private Button butPwd = null;

    private String txtFname="";
    private String txtSurname="";
    private String txtGender="";
    private String txtEmail="";


    private String txtPassword="";

    private String txtAddress;
    private String txtCity;
    private String txtPostCode;
    private String txtCountry;
    private String txtMobile;

    private int selected_Id= 0;


    private Boolean CheckEditText;

    private String txtTitle;
    private int txtselected_Id;
    private int genderLenth;

    private int txtselected_country_Id;
    private String txtSenderState;
    private String txtSenderlga;

    private int lga_id ;
    private int state_id ;

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


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_address);
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
        getSupportActionBar().setTitle("   Sign up");

        mTopToolbar=(Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(mTopToolbar);
        butBack = findViewById(R.id.button2);

        butReg = findViewById(R.id.butReg);

       // ed1=(EditText)findViewById(R.id.txtFname);
        //ed2=(EditText)findViewById(R.id.txtSurname);
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


        Intent intent3 = getIntent();
        txtAddress = intent3.getStringExtra("txtAddress");

        if(txtAddress == null)
      {
          PopulateCountry(txtCountry);
      }




        butBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Log.d(TAG, "Subscribing to weather topic");
                Intent intent = new Intent(AddressActivity.this,PasswordActivity.class);

               // txtPassword = ed1.getText().toString();

                intent.putExtra("txtEmail",txtEmail);
                intent.putExtra("txtFname",txtFname);
                intent.putExtra("txtSurname",txtSurname);
                intent.putExtra("txtGender",txtGender);
                intent.putExtra("txtPassword",txtPassword);
                intent.putExtra("txtAddress",txtAddress);
                intent.putExtra("txtCity",txtCity);
                intent.putExtra("txtPostCode",txtPostCode);
                intent.putExtra("txtMobile",txtMobile);
                intent.putExtra("txtCountry",txtCountry);
                intent.putExtra("txtTitle",txtTitle);
                intent.putExtra("txtselected_Id",txtselected_Id);
                intent.putExtra("txtselected_country_Id",txtselected_country_Id);
                intent.putExtra("genderLenth",genderLenth);
                intent.putExtra("key", country_list);
                intent.putExtra("txtSenderState",txtSenderState);
                intent.putExtra("txtSenderlga",txtSenderlga);

                intent.putExtra("state_id",state_id);
                intent.putExtra("lga_id",lga_id);
                startActivity(intent);
                finish();
            }
        });


        butReg.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Log.d(TAG, "Subscribing to weather topic");
                ValidateText();


                if(CheckEditText){


                Intent intent = new Intent(AddressActivity.this,RegisterReview.class);

                spanner1Holder =String.valueOf(spinnerCountry.getSelectedItem());

                    txtSpinner2 =String.valueOf(spinnerState.getSelectedItem());
                    txtSpinner3 =String.valueOf(spinnerLGA.getSelectedItem());

                //txt1 = ed1.getText().toString();
               // txt2 = ed2.getText().toString();
                txt3 = ed3.getText().toString();
                txt4 = ed4.getText().toString();
                txt5= ed5.getText().toString();
                txt6 = ed6.getText().toString();

                    intent.putExtra("txtEmail",txtEmail);
                    intent.putExtra("txtFname",txtFname);
                    intent.putExtra("txtSurname",txtSurname);
                    intent.putExtra("txtGender",txtGender);
                    intent.putExtra("txtPassword",txtPassword);
                    intent.putExtra("txtAddress",txt3);
                    intent.putExtra("txtCity",txt4);
                    intent.putExtra("txtPostCode",txt5);
                    intent.putExtra("txtMobile",txt6);
                    intent.putExtra("txtCountry",spanner1Holder);
                    intent.putExtra("txtTitle",txtTitle);
                    intent.putExtra("txtselected_Id",txtselected_Id);
                    intent.putExtra("txtselected_country_Id",txtselected_country_Id);
                    intent.putExtra("genderLenth",genderLenth);
                    intent.putExtra("key", country_list);
                    intent.putExtra("txtSenderState",txtSpinner2);
                    intent.putExtra("txtSenderlga",txtSpinner3);
                    intent.putExtra("state_id",state_id);
                    intent.putExtra("lga_id",lga_id);
                    startActivity(intent);


                startActivity(intent);


                finish();



            }
                else {
                    Toast.makeText(AddressActivity.this, "Please fill all form fields.", Toast.LENGTH_LONG).show();
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




        addItemsOnSpinner3();
        addItemsOnSpinner2();
        spinnerCountry.setOnItemSelectedListener(this);
        //spinnerLGA.setOnItemSelectedListener(this);
        spinnerState.setOnItemSelectedListener(this);


        update_Text();

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

        txtSpinner1=(String) spinnerCountry.getSelectedItem();

        txtSpinner2=(String) spinnerState.getSelectedItem();
        txtSpinner3=(String) spinnerLGA.getSelectedItem();


if(txtSpinner1.trim().equals("Nigeria")){

    spinnerState.setVisibility(View.VISIBLE);
    spinnerLGA.setVisibility(View.VISIBLE);


    tv3.setVisibility(View.VISIBLE);
    tv4.setVisibility(View.VISIBLE);
}
else{
    spinnerState.setVisibility(View.GONE);
    spinnerLGA.setVisibility(View.GONE);
    spinnerState.setSelection(0);
    spinnerLGA.setSelection(0);


    tv3.setVisibility(View.GONE);
    tv4.setVisibility(View.GONE);
}


        int ids = parent.getId();



        switch(ids)
        {
            case R.id.spinnerState:

                PopulateLGA(txtSpinner2);


                break;



        }



    }


    public void onNothingSelected(AdapterView<?> parent) {


    }






        public void update_Text(){



            Intent intent4 = getIntent();

            txtAddress = intent4.getStringExtra("txtAddress");
            if(txtAddress != null)
            {
                country_list = (ArrayList<String>) getIntent().getSerializableExtra("key");



            }



            txtFname = intent4.getStringExtra("txtFname");
            txtSurname = intent4.getStringExtra("txtSurname");
            txtGender = intent4.getStringExtra("txtGender");
            txtEmail = intent4.getStringExtra("txtEmail");
            txtPassword = intent4.getStringExtra("txtPassword");

            txtAddress = intent4.getStringExtra("txtAddress");
            txtCity = intent4.getStringExtra("txtCity");
            txtPostCode = intent4.getStringExtra("txtPostCode");
            txtMobile = intent4.getStringExtra("txtMobile");
           txtCountry = intent4.getStringExtra("txtCountry");
            txtselected_Id = intent4.getIntExtra("txtselected_Id",0);
            txtselected_country_Id = intent4.getIntExtra("txtselected_country_Id",0);

            txtTitle = intent4.getStringExtra("txtTitle");
            genderLenth = intent4.getIntExtra("genderLenth",0);

            txtSenderlga  =intent4.getStringExtra("txtSenderlga");
            txtSenderState=intent4.getStringExtra("txtSenderState");

            lga_id = intent4.getIntExtra("lga_id",0);
            state_id = intent4.getIntExtra("state_id",0);
            txtselected_country_Id = intent4.getIntExtra("txtselected_country_Id",0);


            if(txtAddress != null){
                addItemsOnSpinner3();
                /*
                ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1, country_list);
                dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
                spinnerCountry.setAdapter(dataAdapter);


                 */


                if(state_id !=0){

                    spinnerState.setVisibility(View.VISIBLE);
                    spinnerLGA.setVisibility(View.VISIBLE);


                    tv3.setVisibility(View.VISIBLE);
                    tv4.setVisibility(View.VISIBLE);


                    spinnerCountry.setSelection(txtselected_country_Id);



                }



            }








            if(txtAddress  !=  null){

           // ed1.setText(txtFname.toString());
            //ed2.setText(txtSurname.toString());
            ed3.setText(txtAddress.toString());
            ed4.setText(txtCity.toString());
            ed5.setText(txtPostCode.toString());
            ed6.setText(txtMobile.toString());


                spinnerState.setSelection(state_id);

                spinnerLGA.setSelection(lga_id);
                //int  spinPosition =country_list.indexOf(txtCountry);


            }




    }


    private void selectValue(Spinner spinner3, Object value ){


    }





    public void ValidateText(){

        //txt1 = ed1.getText().toString();
       // txt2 = ed2.getText().toString();

        txt3= ed3.getText().toString();
        txt4 = ed4.getText().toString();

        txt5 = ed5.getText().toString();
        txt6 = ed6.getText().toString();



        spanner3Holder =String.valueOf(spinnerCountry.getSelectedItem());
        txtSpinner2 =String.valueOf(spinnerState.getSelectedItem());
        txtSpinner3 =String.valueOf(spinnerLGA.getSelectedItem());




        txtselected_country_Id=  spinnerCountry.getSelectedItemPosition();
        state_id=  spinnerState.getSelectedItemPosition();
       lga_id=  spinnerLGA.getSelectedItemPosition();

        String sel="Select";




          if(txtSpinner3.trim().equals(sel) && spanner3Holder.trim().equals("Nigeria") )
        {
            CheckEditText = false;
        }
          else if(txtSpinner2.trim().equals(sel) && spanner3Holder.trim().equals("Nigeria") )
          {
              CheckEditText = false;
          }
          else if(!spanner3Holder.trim().equals("Nigeria")  && TextUtils.isEmpty(txt5))
          {
              CheckEditText = false;
          }
       else if(spanner3Holder.trim().equals(sel) )
        {
            CheckEditText = false;
        }

          /*
          else if(TextUtils.isEmpty(txt5)  ||  txt4 ==null &&  spanner3Holder.trim().equals("Nigeria")){

              CheckEditText = true;
          }



           */

          else  if(TextUtils.isEmpty(txt3)|| TextUtils.isEmpty(txt4) ||    TextUtils.isEmpty(txt6)  )
        {

            CheckEditText = false;

        }


        else {

            CheckEditText = true ;

        }

    }




    /* COUNTRY STARTS HERE */

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
            Toast.makeText(AddressActivity.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
            ctr=0;
        }

        ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, $heroes);
        dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerCountry.setAdapter(dataAdapter);



        //  spinnerCountry.setPadding(4,4,4,4);

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
            Toast.makeText(AddressActivity.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
            ctr=0;
        }

        ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, $heroes);
        dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerLGA.setAdapter(dataAdapter);






    }








}