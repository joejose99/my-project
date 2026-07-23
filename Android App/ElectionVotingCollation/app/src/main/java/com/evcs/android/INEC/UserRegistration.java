package com.eciels.android.INEC;

import android.Manifest;
import android.annotation.SuppressLint;
import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.os.AsyncTask;
import android.os.Build;
import android.os.Bundle;

import com.chivorn.smartmaterialspinner.SmartMaterialSpinner;
import com.google.android.material.snackbar.Snackbar;

import androidx.annotation.NonNull;
import androidx.annotation.RequiresApi;
import androidx.appcompat.app.AppCompatActivity;

import android.telephony.TelephonyManager;
import android.text.TextUtils;
import android.util.Log;
import android.view.View;
import android.view.inputmethod.InputMethodManager;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import androidx.core.app.ActivityCompat;
import androidx.navigation.NavController;
import androidx.navigation.Navigation;
import androidx.navigation.ui.AppBarConfiguration;
import androidx.navigation.ui.NavigationUI;

import com.eciels.android.INEC.databinding.ActivityUserRegistrationBinding;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class UserRegistration extends AppCompatActivity implements AdapterView.OnItemSelectedListener {

    private Spinner spinner1, spinner2,spinner3, spinner4,spinner5,spinner6;
    private Button button;

    ArrayAdapter adapter;

    Button b1,b2,butBack;
    EditText ed1,edMessage,txtPwd,txtMobileNo,txtEmails,txtRePwd;

    TextView tx1,Message;
    String UserNameHolder,SurnameHolder,Re_LoginPasswordHolder, LoginPasswordHolder, IMEIHolder,MobileNoHolder, MessageResp,EmailHolder;
    String  spanner1Holder,spanner2Holder,spanner3Holder,spanner4Holder,spanner5Holder,spanner6Holder;

    String  txtSpanner1, txtSpanner2 , txtSpanner3 , txtSpanner4 , txtSpanner5 , txtSpanner6,txtSpinnerPop,txtSpinnerPop3,txtSpinnerPop4;

    Boolean CheckEditText ;
    ProgressDialog progressDialog;
    String finalResult ,rst;

    /*
    String HttpURL="https://www.evcs.ng/project/UserRegElection.php";

    String HttpURL_LGA="https://www.evcs.ng/project/populateSpinner.php";

    String HttpURL_WARDS="https://www.evcs.ng/project/populateSpinnerWards.php";

    String HttpURL_POLUNIT="https://www.evcs.ng/project/populateSpinnerPolUnit.php";


     */

    String HttpURL="https://evcs.ng/project/UserRegElection.php";

    String HttpURL_LGA="https://evcs.ng/project/populateSpinner.php";

    String HttpURL_WARDS="https://evcs.ng/project/populateSpinnerWards.php";

    String HttpURL_POLUNIT="https://evcs.ng/project/populateSpinnerPolUnit.php";




    String Errors;

    List<String> list = new ArrayList<String>();

    HttpParse httpParse = new HttpParse();
    public JSONObject postData;

    String  select="Select";



    String deviceUniqueIdentifier = null;
    String mobileNo =null;
    String phoneType =null;

    String IMEI=deviceUniqueIdentifier;
    // JSON Node names
    private static final String TAG_SUCCESS = "success";
    private static final int MY_PERMISSIONS_REQUEST_READ_PHONE_STATE = 0;


    private Button butEmail = null;

    private String txtPassword;
    private String txtFname="";
    private String txtSurname="";
    private String txtGender="";
    private String txtEmail="";
    private String txtMobile="";
    private String txtState;

    private ArrayList<String> state_list = new ArrayList<>();
    //private ArrayList<String> lga_list = new ArrayList<>();
    private ArrayList<String> ward_list = new ArrayList<>();
    private ArrayList<String> poll_unit_list = new ArrayList<>();

    private  int poll_unit_id;
    private int ward_id;
    private String txtPollUnit;
    private String txtTitle;



    private String txtWard ;

    private String  txtLGA;

    private ArrayList<String> lga_list = new ArrayList<>();

    private int lga_id ;
    private int state_id ;
    private int genderLenth;

    private SmartMaterialSpinner<String> spState;
    private SmartMaterialSpinner<String>spLGA;
    private SmartMaterialSpinner<String>spWard;

    private SmartMaterialSpinner<String>sPoll;
    private SmartMaterialSpinner<String>spTitle;

    @Override
    public void onCreate(Bundle savedInstanceState) {
        try{
            super.onCreate(savedInstanceState);
            setContentView(R.layout.activity_user_registration);

            b1 = (Button)findViewById(R.id.button);
            // b2 = (Button)findViewById(R.id.butCancel);

            butBack= (Button)findViewById(R.id.button2);



            spinner2 = (Spinner) findViewById(R.id.spinner2);
            spinner3 = (Spinner) findViewById(R.id.spinner3);
            spinner4 = (Spinner) findViewById(R.id.spinner4);
            spinner5 = (Spinner) findViewById(R.id.spinner5);




            button = (Button) findViewById(R.id.button);





            //addListenerOnButton();




            Intent intent3 = getIntent();
            txtFname = intent3.getStringExtra("txtFname");
            txtSurname = intent3.getStringExtra("txtSurname");
            txtGender = intent3.getStringExtra("txtGender");
            txtEmail = intent3.getStringExtra("txtEmail");
            txtMobile = intent3.getStringExtra("txtMobile");
            txtPassword = intent3.getStringExtra("txtPassword");
            txtTitle= intent3.getStringExtra("txtTitle");



            loadIMEI();




            button.setOnClickListener(new View.OnClickListener() {

                @Override
                public void onClick(View v) {





                    CheckEditTextIsEmptyOrNot();

                    if(CheckEditText){



                        spanner2Holder =String.valueOf(spinner2.getSelectedItem());
                        spanner3Holder =String.valueOf(spinner3.getSelectedItem());
                        spanner4Holder =String.valueOf(spinner4.getSelectedItem());
                        spanner5Holder =String.valueOf(spinner5.getSelectedItem());


                        txtPollUnit=spanner5Holder;
                        txtWard=spanner4Holder;
                        txtLGA=spanner3Holder;
                        txtState= spanner2Holder;
                        Intent intent = new Intent(UserRegistration.this, register_review.class);


                        intent.putExtra("spanner2Holder",spanner2Holder);
                        intent.putExtra("spanner3Holder",spanner3Holder);
                        intent.putExtra("spanner4Holder",spanner4Holder);
                        intent.putExtra("spanner5Holder",spanner5Holder);


                        intent.putExtra("txtEmail",txtEmail);
                        intent.putExtra("txtFname",txtFname);
                        intent.putExtra("txtSurname",txtSurname);
                        intent.putExtra("txtGender",txtGender);
                        intent.putExtra("txtPassword",txtPassword);
                        intent.putExtra("txtMobile",txtMobile);
                        intent.putExtra("IMEIHolder",IMEIHolder);



                        startActivity(intent);
                        finish();




                    }
                    else {

                        // If EditText is empty then this block will execute .
                        Toast.makeText(UserRegistration.this, "Please fill all form fields.and Check Password Mis-match", Toast.LENGTH_LONG).show();

                    }
                }

            });


/*

            b2.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {






                    Intent intent1 = new Intent(RegistrationActivity.this, LoginUsers.class);

                    // intent.putExtra("IMEIHolder",IMEIHolder);

                    startActivity(intent1);
                    finish();

                }

            });

 */




            butBack.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    // Log.d(TAG, "Subscribing to weather topic");
                    try{
                        Intent intent = new Intent(UserRegistration.this,password.class);




                        intent.putExtra("txtEmail",txtEmail);
                        intent.putExtra("txtFname",txtFname);
                        intent.putExtra("txtSurname",txtSurname);
                        intent.putExtra("txtGender",txtGender);
                        intent.putExtra("txtPassword",txtPassword);

                        intent.putExtra("txtMobile",txtMobile);

                        intent.putExtra("txtPollUnit",txtPollUnit);
                        intent.putExtra("txtWard",txtWard);
                        intent.putExtra("txtEmail",txtEmail);
                        intent.putExtra("txtLGA",txtLGA);
                        intent.putExtra("txtTitle",txtTitle);


                        intent.putExtra("genderLenth",genderLenth);
                        intent.putExtra("lga_id",lga_id);
                        intent.putExtra("state_id",state_id);
                        intent.putExtra("txtLGA",txtLGA);
                        intent.putExtra("poll_unit_id",poll_unit_id);
                        intent.putExtra("ward_id",ward_id);


                        intent.putExtra("key_poll_unit", poll_unit_list);
                        intent.putExtra("key_state", ward_list);
                        intent.putExtra("key_lga", lga_list);
                        intent.putExtra("key_state", state_list);


                        startActivity(intent);
                        finish();

                    }catch(NullPointerException e){
                        e.printStackTrace();
                    }
                }
            });


            addListenerOnSpinnerItemSelection();
            addItemsOnSpinner2();

            addItemsOnSpinner3();
            addItemsOnSpinner4();
            addItemsOnSpinner5();


            spinner4.setOnItemSelectedListener(this);
            spinner3.setOnItemSelectedListener(this);
            spinner2.setOnItemSelectedListener(this);





            update_Text();
        }catch (IndexOutOfBoundsException e){
            e.printStackTrace();
        }

        catch(NullPointerException e){
            e.printStackTrace();
        }catch(Exception e){
            e.printStackTrace();
        }
    }

    // add items into spinner dynamically



    public void addItemsOnSpinner2() {

        spinner2 = (Spinner) findViewById(R.id.spinner2);

        spState= findViewById(R.id.spinner2);

        List<String> list = new ArrayList<String>();
        list.clear();
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
        list.add("Nasarawa");
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

        spState.setItem(list);

        /*
        ArrayAdapter<String> dataAdapter2 = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, list);
        dataAdapter2.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinner2.setAdapter(dataAdapter2);

         */


/*

        spState.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
                Toast.makeText(RegistrationActivity.this,list.get(position),Toast.LENGTH_LONG).show();
            }

            @Override
            public void onNothingSelected(AdapterView<?> parent) {

            }
        });

 */



    }







    public void addItemsOnSpinner3() {

        spinner3 = (Spinner) findViewById(R.id.spinner3);

        spLGA=findViewById(R.id.spinner3);
        List<String> list = new ArrayList<String>();

        list.add("Select");
	/*list.add("Aniocha North");
	list.add("Aniocha South");
	list.add("Bomadi");
	list.add("Burutu");
	list.add("Ethiope East");
	list.add("Ethiope West");
	list.add("Ika North East");
	list.add("Ika South");
	list.add("Isoko North");
	list.add("Isoko South");
	list.add("Ndokwa East");
	list.add("Ndokwa West");
	list.add("Okpe");
	list.add("Oshimili North");
	list.add("Oshimili South");
	list.add("Patani");
	list.add("Sapele");
	list.add("Udu");
	list.add("Ughelli North");
	list.add("Ughelli South");
	list.add("Ukwani");
	list.add("Ovwie");
	list.add("Warri North");
	list.add("Warri South");
	list.add("warri South West");*/

        spLGA.setItem(list);
        ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, list);
        dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinner3.setAdapter(dataAdapter);
    }




    public void addItemsOnSpinner4() {

        spinner4 = (Spinner) findViewById(R.id.spinner4);
        spWard=findViewById(R.id.spinner4);
        List<String> list = new ArrayList<String>();
        list.add("Select");
		/*
		list.add("ABBI I");
		list.add("ABBI II");
		list.add("OGUME I");
		list.add("OGUME II");
		list.add("UTAGBA OGBE");
		list.add("UTAGBA UNO I");
		list.add("UTAGBA UNO II"); */
        spWard.setItem(list);

        ArrayAdapter<String> dataAdapter4 = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, list);
        dataAdapter4.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinner4.setAdapter(dataAdapter4);
    }

    public void addItemsOnSpinner5() {

        spinner5 = (Spinner) findViewById(R.id.spinner5);
        sPoll=findViewById(R.id.spinner5);
        List<String> list = new ArrayList<String>();
        list.add("Select");
		/*
		list.add("EZEDOGUME PRIMARY SCHOOL - OGBE INOTU OGUME");
		list.add("EZEDOGUME PRIMARY SCHOOL - OGBE INOTU OGUME");
		list.add("EZEDOGUME PRIMARY SCHOOL - OGBE UKU");
		list.add("DISPENSARY - OGBE ODUA/ODOLU");
		list.add("OLD TOWN HALL - OGBE ANOKA/ACHI");
		list.add("OBIOGWA - OGBE ASHAKA/ACHI");
		list.add("IGBE PRIMARY SCHOOL - OGBE OKOH, OLILE & AWAEKA");
		list.add("ISHIENI PRIMARY SCHOOL - OGBE OFU UTUE/ONICHA");
		list.add("IGBE PRIMARY SCHOOL - OGBE OKOH/OLILE/AWAEKE");
		*/
        sPoll.setItem(list);
        ArrayAdapter<String> dataAdapter5 = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, list);
        dataAdapter5.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinner5.setAdapter(dataAdapter5);
    }










    public void addListenerOnSpinnerItemSelection() {
        spinner2 = (Spinner) findViewById(R.id.spinner2);
        //spinner2.setOnItemSelectedListener(new MyOnItemSelectedListener());

        txtSpinnerPop=(String) spinner2.getSelectedItem();

    }

    public void addListenerOnSpinnerItemSelectionLGA() {
        spinner3 = (Spinner) findViewById(R.id.spinner3);
        //spinner2.setOnItemSelectedListener(new MyOnItemSelectedListener());
        txtSpinnerPop3=(String) spinner3.getSelectedItem();
    }



    public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {

        txtSpinnerPop=(String) spinner2.getSelectedItem();

        txtSpinnerPop3=(String) spinner3.getSelectedItem();

        txtSpinnerPop4=(String) spinner4.getSelectedItem();


        String sp1= String.valueOf(spinner2.getSelectedItem());
        String sp3= String.valueOf(spinner3.getSelectedItem());

        String sp4= String.valueOf(spinner4.getSelectedItem());




        int ids = parent.getId();




        if (ids == R.id.spinner2) {

            // PopulateLGA(txtSpinnerPop);
            PopulateLGA(txtSpinnerPop);

        } else if (ids == R.id.spinner3) {

            PopulateWARDS(txtSpinnerPop, txtSpinnerPop3);

        } else if (ids == R.id.spinner4) {

            txtSpinnerPop4 = (String) spinner4.getSelectedItem();

            PopulatePOLUNIT(txtSpinnerPop, txtSpinnerPop3, sp4);
        }


    }



    public void onNothingSelected(AdapterView<?> parent) {


    }


    /*CALLING METHOD THAT HELP TO HIDE KEYBOARD  WHEN TOUCH BODY */
    public void hideKeyboard(View view) {
        InputMethodManager inputMethodManager =(InputMethodManager)getSystemService(Activity.INPUT_METHOD_SERVICE);
        inputMethodManager.hideSoftInputFromWindow(view.getWindowToken(), 0);




    }










    public void loadIMEI() {
        // Check if the READ_PHONE_STATE permission is already available.
        if (ActivityCompat.checkSelfPermission(this, Manifest.permission.READ_PHONE_STATE)
                != PackageManager.PERMISSION_GRANTED) {
            if (ActivityCompat.shouldShowRequestPermissionRationale(this,
                    Manifest.permission.READ_PHONE_STATE)) {
//                get_imei_data();
            } else {
                ActivityCompat.requestPermissions(this, new String[]{Manifest.permission.READ_PHONE_STATE},
                        MY_PERMISSIONS_REQUEST_READ_PHONE_STATE);
            }
        } else {
            //MY_PERMISSIONS_REQUEST_READ_PHONE_STATE

            TelephonyManager mngr = (TelephonyManager)getSystemService(Context.TELEPHONY_SERVICE);

            if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.O) {
                deviceUniqueIdentifier = mngr.getImei();
                //mobileNo = mngr.getLine1Number();



                //phoneType = mngr.getNetworkOperatorName();
            } else {
                deviceUniqueIdentifier = mngr.getDeviceId();

                // mobileNo = mngr.getLine1Number();
                //Log.e("Mobile No: ",mobileNo.toString());
            }
            //deviceUniqueIdentifier = mngr.getDeviceId();

			/*device_unique_id = Settings.Secure.getString(this.getContentResolver(),
					Settings.Secure.ANDROID_ID);
			textView.setText(device_unique_id+"----"+mngr.getDeviceId()); */
            // READ_PHONE_STATE permission is already been granted.
            //Toast.makeText(this,"Alredy granted",Toast.LENGTH_SHORT).show();
        }
    }
    @SuppressLint("MissingPermission")
    @Override
    @RequiresApi(api = Build.VERSION_CODES.O)

    public void onRequestPermissionsResult(int requestCode, @NonNull String[] permissions, @NonNull int[] grantResults) {

        super.onRequestPermissionsResult(requestCode, permissions, grantResults);
        if (requestCode == MY_PERMISSIONS_REQUEST_READ_PHONE_STATE) {

            if (grantResults.length == 1 && grantResults[0] == PackageManager.PERMISSION_GRANTED) {

//                Toast.makeText(this,"Alredy DONE",Toast.LENGTH_SHORT).show();

                TelephonyManager mngr = (TelephonyManager) getSystemService(Context.TELEPHONY_SERVICE);
                //deviceUniqueIdentifier = mngr.getDeviceId();

                if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.O) {
                    deviceUniqueIdentifier = mngr.getImei();


                    Log.e("Mobile No: ", mobileNo.toString());
                } else {
                    deviceUniqueIdentifier = mngr.getDeviceId();
                    // mobileNo = mngr.getLine1Number();

                    //Log.e("Mobile No: ",mobileNo.toString());
                }
				/*
				device_unique_id = Settings.Secure.getString(this.getContentResolver(),Settings.Secure.ANDROID_ID);
				textView.setText(device_unique_id+"----"+mngr.getDeviceId()); */

            } else {
                Toast.makeText(this, "ehgehfg", Toast.LENGTH_SHORT).show();
            }
        }
    }





/*

    protected void onSaveInstanceState(Bundle outState) {
        super.onSaveInstanceState(outState);


        //putParcelable
        outState.putString(SurnameHolder, SurnameHolder);
        outState.putString(UserNameHolder, UserNameHolder);
        outState.putString(LoginPasswordHolder, LoginPasswordHolder);
        outState.putString(Re_LoginPasswordHolder, Re_LoginPasswordHolder);

        outState.putString(MobileNoHolder, MobileNoHolder);

        outState.putString(MessageResp, MessageResp);

        outState.putString(EmailHolder, EmailHolder);


        outState.putString(spanner1Holder, spanner1Holder);
        outState.putString(spanner2Holder, spanner2Holder);
        outState.putString(spanner3Holder, spanner3Holder);
        outState.putString(spanner4Holder, spanner4Holder);
        outState.putString(spanner5Holder, spanner5Holder);
        outState.putString(spanner6Holder, spanner6Holder);



    }
*/
/*
    @Override
    protected void onRestoreInstanceState(Bundle savedInstanceState) {
        super.onRestoreInstanceState(savedInstanceState);

        if(savedInstanceState != null)
        {
            // get the file url
            //uri = savedInstanceState.getParcelable("file_uri");



            UserNameHolder = savedInstanceState.getString(UserNameHolder);
            LoginPasswordHolder = savedInstanceState.getString(LoginPasswordHolder);
            SurnameHolder = savedInstanceState.getString(SurnameHolder);

            Re_LoginPasswordHolder = savedInstanceState.getString(Re_LoginPasswordHolder);

            MobileNoHolder = savedInstanceState.getString(MobileNoHolder);
            MessageResp = savedInstanceState.getString(MessageResp);
            EmailHolder = savedInstanceState.getString(EmailHolder);

            spanner1Holder = savedInstanceState.getString(spanner1Holder);

            spanner2Holder = savedInstanceState.getString(spanner2Holder);
            spanner3Holder = savedInstanceState.getString(spanner3Holder);
            spanner4Holder = savedInstanceState.getString(spanner4Holder);
            spanner5Holder = savedInstanceState.getString(spanner5Holder);
            spanner6Holder = savedInstanceState.getString(spanner6Holder);

            ed1.setText(SurnameHolder);
            txtPwd.setText(LoginPasswordHolder);
            txtRePwd.setText(Re_LoginPasswordHolder);
            edMessage.setText(MessageResp);
            txtMobileNo.setText(MobileNoHolder);
            txtEmail.setText(EmailHolder);




            IMEIHolder = savedInstanceState.getString(IMEIHolder);



        }
    }

*/






    /* SENDING MESSAGE CLASS */
    public void SendMessagePage(final String FName, final String Surname,final String  Pwd, final String Spanner2 , final String Spanner3, final String Spanner4 , final String Spanner5,final String MobNo, final String Email,final String IMEI){

        class MessageClass extends AsyncTask<String,Void,String> {

            @Override
            protected void onPreExecute() {
                super.onPreExecute();

                progressDialog = ProgressDialog.show(UserRegistration.this,"Sending ....",null,false,false);
            }

            @Override
            protected void onPostExecute(String httpResponseMsg) {

                super.onPostExecute(httpResponseMsg);

                progressDialog.dismiss();

                //Toast.makeText(LoginUsers.this,httpResponseMsg.toString(), Toast.LENGTH_LONG).show();

                MessageResp = httpResponseMsg.replaceAll("^\"|\"$", "");

                httpResponseMsg=MessageResp;

                if(httpResponseMsg.trim().equalsIgnoreCase("Success")){

                    finish();

                    Intent intent5 = new Intent(UserRegistration.this, LoginUsers.class);

                    //intent.putExtra("MobileNo",MobileNoHolder);

                    startActivity(intent5);


                    Toast.makeText(UserRegistration.this,httpResponseMsg,Toast.LENGTH_LONG).show();
                    ed1.setText("") ;

                    finish();
                }
                else{

                    Toast.makeText(UserRegistration.this,httpResponseMsg,Toast.LENGTH_LONG).show();
                    // Log.w("myApp", "no networks");

                    Log.w("Message", httpResponseMsg);

                }



            }

            @Override
            protected String doInBackground(String... params) {

                try {

                    Intent intent3 = getIntent();
                    txtFname = intent3.getStringExtra("txtFname");
                    txtSurname = intent3.getStringExtra("txtSurname");
                    txtGender = intent3.getStringExtra("txtGender");
                    txtEmail = intent3.getStringExtra("txtEmail");
                    txtMobile = intent3.getStringExtra("txtMobile");
                    txtPassword = intent3.getStringExtra("txtPassword");


                    JSONObject postDataParams = new JSONObject();

                    //postDataParams.put("Message", params[0]);
                    postDataParams.put("FirstName", txtFname);

                    postDataParams.put("Surname", txtSurname);

                    postDataParams.put("txtGender", txtGender);

                    postDataParams.put("Password", txtPassword);




                    postDataParams.put("spanner2", Spanner2);
                    postDataParams.put("spanner3", Spanner3);
                    postDataParams.put("spanner4", Spanner4);

                    postDataParams.put("spanner5", Spanner5);

                    postDataParams.put("MobileNo", txtMobile);

                    postDataParams.put("Email", txtEmail);

                    postDataParams.put("IMEI", params[9]);

                    Log.e("params",postDataParams.toString());

                    finalResult = httpParse.postRequest(postDataParams, HttpURL);


                } catch (Exception e) {
                    e.printStackTrace();
                }



                return finalResult;
            }
        }

        MessageClass msgClass = new MessageClass();

        msgClass.execute(FName, Surname,Pwd,Spanner2,Spanner3,Spanner4,Spanner5,MobNo,Email,IMEI);
    }












    /*POPULATING LGA SPINNER */
    public void PopulateLGA( final String Spanner2 ){

        class LGAClass extends AsyncTask<String,Void,String> {
            @Override
            protected void onPreExecute() {
                super.onPreExecute();

                //progressDialog = ProgressDialog.show(MainActivity.this,"LOADING LGA ....",null,true,true);
            }

            @Override
            protected void onPostExecute(String httpResponseMsg) {

                super.onPostExecute(httpResponseMsg);






                try {
                    loadIntoListView(httpResponseMsg);
                } catch (JSONException e) {
                    e.printStackTrace();
                }








            }

            @Override
            protected String doInBackground(String... params) {

                try {





                    JSONObject postDataParams = new JSONObject();



                    postDataParams.put("spanner2", Spanner2);


                    Log.e("params",postDataParams.toString());

                    finalResult = httpParse.postRequest(postDataParams, HttpURL_LGA);


                } catch (Exception e) {
                    e.printStackTrace();
                }



                return finalResult;
            }
        }
        LGAClass lgalass = new LGAClass();

        lgalass.execute(Spanner2);
    }


    private void loadIntoListView(String json) throws JSONException {
        spinner3 = (Spinner) findViewById(R.id.spinner3);
        spLGA =  findViewById(R.id.spinner3);
        list.clear();
        JSONArray jsonArray = new JSONArray(json);


        String[] heroes = new String[jsonArray.length()];

        int ctr=0;

        for (int i = 0; i < jsonArray.length(); i++) {
            JSONObject obj = jsonArray.getJSONObject(i);
            heroes[i] = obj.getString("lga");
            list.add(obj.getString("lga"));
            Log.e("params", heroes[i].toString());

            ctr++;
        }


        if(ctr ==1)
        {
            Toast.makeText(UserRegistration.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
            ctr=0;
        }

        spLGA.setItem(list);

        ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, heroes);
        dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinner3.setAdapter(dataAdapter);











    }






    /*
     * PUPLATING WARDS SPINNER STARTS HERE
     *
     *
     * */


    public void PopulateWARDS(final String Spanner2, final String Spanner3 ){

        class WardsClass extends AsyncTask<String,Void,String> {
            @Override
            protected void onPreExecute() {
                super.onPreExecute();

                //progressDialog = ProgressDialog.show(MainActivity.this,"LOADING LGA ....",null,true,true);
            }

            @Override
            protected void onPostExecute(String httpResponseMsg) {

                super.onPostExecute(httpResponseMsg);







                try {
                    loadIntoWARDS(httpResponseMsg);
                } catch (JSONException e) {
                    e.printStackTrace();
                }







            }

            @Override
            protected String doInBackground(String... params) {

                try {





                    JSONObject postDataParams = new JSONObject();

                    postDataParams.put("spanner2", Spanner2);
                    postDataParams.put("spanner3", Spanner3);


                    Log.e("params",postDataParams.toString());

                    finalResult = httpParse.postRequest(postDataParams, HttpURL_WARDS);


                } catch (Exception e) {
                    e.printStackTrace();
                }



                return finalResult;
            }
        }
        WardsClass wrdClass = new WardsClass();

        wrdClass.execute(Spanner2,Spanner3);
    }


    private void loadIntoWARDS(String json) throws JSONException {
        spinner4 = (Spinner) findViewById(R.id.spinner4);
        spWard =   findViewById(R.id.spinner4);
        list.clear();
        JSONArray jsonArray = new JSONArray(json);


        String[] heroes_wrd = new String[jsonArray.length()];

        int ctr=0;

        for (int i = 0; i < jsonArray.length(); i++) {
            JSONObject obj = jsonArray.getJSONObject(i);
            heroes_wrd[i] = obj.getString("ward");
            list.add(obj.getString("ward"));
            Log.e("params", heroes_wrd[i].toString());

            ctr++;
        }

        if(ctr ==1)
        {
            Toast.makeText(UserRegistration.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
            ctr=0;
        }

        spWard.setItem(list);
        ArrayAdapter<String> dataAdapterWrd = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, heroes_wrd);
        dataAdapterWrd.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinner4.setAdapter(dataAdapterWrd);

    }





    /*
     *
     * POPULATING WARDS ENDS HERE
     *
     * */












    /*
     * PUPLATING POLLING UNIT SPINNER STARTS HERE
     *
     *
     * */


    public void PopulatePOLUNIT(final String Spanner2, final String Spanner3, final String Spanner4 ){

        class PolUnitClass extends AsyncTask<String,Void,String> {
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


                    postDataParams.put("spanner2", Spanner2);
                    postDataParams.put("spanner3", Spanner3);
                    postDataParams.put("spanner4", Spanner4);


                    Log.e("params",postDataParams.toString());

                    finalResult = httpParse.postRequest(postDataParams, HttpURL_POLUNIT);


                } catch (Exception e) {
                    e.printStackTrace();
                }



                return finalResult;
            }
        }
        PolUnitClass polUnitclass = new PolUnitClass();

        polUnitclass.execute(Spanner2, Spanner3,Spanner4);
    }


    private void loadIntoPolUnit(String json) throws JSONException {
        spinner5 = (Spinner) findViewById(R.id.spinner5);
        sPoll =   findViewById(R.id.spinner5);
        list.clear();
        JSONArray jsonArray = new JSONArray(json);


        String[] heroes_pol = new String[jsonArray.length()];

        int ctr =0;

        for (int i = 0; i < jsonArray.length(); i++) {
            JSONObject obj = jsonArray.getJSONObject(i);




            heroes_pol[i] = obj.getString("pollingUnit");
            list.add(obj.getString("pollingUnit"));
            Log.e("params", heroes_pol[i].toString());


            ctr++;

        }

        String counters ;
        counters  = String.valueOf(ctr);

        Log.e("Counters", counters.toString());

        if(ctr ==1)
        {
            Toast.makeText(UserRegistration.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
            ctr=0;
        }

        sPoll.setItem(list);
        ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, heroes_pol);
        dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinner5.setAdapter(dataAdapter);

    }





    /*
     *
     * POPULATING POLLING UNIT ENDS HERE
     *
     * */











    public void CheckEditTextIsEmptyOrNot(){

        //UserNameHolder = ed1.getText().toString();

        // UserNameHolder = edMessage.getText().toString();


        IMEIHolder = deviceUniqueIdentifier.toString();

        //LoginPasswordHolder = txtPwd.getText().toString();


        // SurnameHolder = ed1.getText().toString();

        //Log.e("SURNAME: ",SurnameHolder.toString());


        // spanner1Holder =String.valueOf(spinner1.getSelectedItem());
        spanner2Holder =String.valueOf(spinner2.getSelectedItem());
        spanner3Holder =String.valueOf(spinner3.getSelectedItem());
        spanner4Holder =String.valueOf(spinner4.getSelectedItem());
        spanner5Holder =String.valueOf(spinner5.getSelectedItem());
        // spanner6Holder =String.valueOf(spinner6.getSelectedItem());

        Log.e("Spinner 5: ",spanner5Holder.toString());

        // MobileNoHolder =txtMobileNo.getText().toString();

        //Re_LoginPasswordHolder=txtRePwd.getText().toString();

        Log.e("Mobile No: ",MobileNoHolder.toString());

        //EmailHolder =txtEmail.getText().toString();

        Intent intent3 = getIntent();
        UserNameHolder = intent3.getStringExtra("txtFname");
        SurnameHolder = intent3.getStringExtra("txtSurname");
        txtGender = intent3.getStringExtra("txtGender");
        EmailHolder = intent3.getStringExtra("txtEmail");
        MobileNoHolder= intent3.getStringExtra("txtMobile");
        LoginPasswordHolder = intent3.getStringExtra("txtPassword");
        Re_LoginPasswordHolder=LoginPasswordHolder;



        //Log.e("Spinner 5: ",spanner5Holder.toString());

        //if(TextUtils.isEmpty(UserNameHolder) || spanner1Holder.trim() == "Select"  || spanner2Holder.trim()  == "Select"  || spanner3Holder.trim()  == "Select" || spanner4Holder.trim()  == "Select"  || spanner5Holder.trim()  == "Select" || spanner6Holder.trim()  == "Select")

        if(TextUtils.isEmpty(UserNameHolder) || TextUtils.isEmpty(LoginPasswordHolder)|| TextUtils.isEmpty(SurnameHolder) || !Re_LoginPasswordHolder.trim().equals(LoginPasswordHolder.trim())  || spanner2Holder.trim().equals("Select")  || spanner3Holder.trim().equals("Select") || spanner4Holder.trim().equals("Select")  || spanner5Holder.trim().equals("Select")  || TextUtils.isEmpty(EmailHolder) || TextUtils.isEmpty(IMEIHolder))

        {

            CheckEditText = false;

        }
        else {

            CheckEditText = true ;
        }




    }



    public void update_Text(){

        try{
            Intent intent4 = getIntent();

            txtWard = intent4.getStringExtra("txtWard");

            if(txtWard != null)
            {
                ward_list = (ArrayList<String>) getIntent().getSerializableExtra("key_ward");
                lga_list = (ArrayList<String>) getIntent().getSerializableExtra("key_lga");

                poll_unit_list  = (ArrayList<String>) getIntent().getSerializableExtra("key_poll_unit");

                state_list = (ArrayList<String>) getIntent().getSerializableExtra("key_state");


            }



            txtFname = intent4.getStringExtra("txtFname");
            txtSurname = intent4.getStringExtra("txtSurname");
            txtGender = intent4.getStringExtra("txtGender");
            txtEmail = intent4.getStringExtra("txtEmail");
            txtPassword = intent4.getStringExtra("txtPassword");
            txtMobile = intent4.getStringExtra("txtMobile");
            txtTitle= intent4.getStringExtra("txtTitle");



            txtState= intent4.getStringExtra("txtState");
            txtPollUnit= intent4.getStringExtra("txtUnit");

            txtWard = intent4.getStringExtra("txtWard");

            txtLGA = intent4.getStringExtra("txtLGA");


            genderLenth = intent4.getIntExtra("genderLenth",0);
            genderLenth = intent4.getIntExtra("genderLenth",0);




            lga_id = intent4.getIntExtra("lga_id",0);
            state_id = intent4.getIntExtra("state_id",0);
            poll_unit_id = intent4.getIntExtra("poll_unit_id",0);
            ward_id = intent4.getIntExtra("ward_id",0);


            spinner2.setSelection(state_id);
            if(lga_id != 0){


                ArrayAdapter<String> dataAdapter3= new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1, lga_list);
                dataAdapter3.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
                spinner3.setAdapter(dataAdapter3);
                spinner3.setSelection(lga_id);
            }

            if(ward_id != 0){

                ArrayAdapter<String> dataAdapter4= new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1, ward_list);
                dataAdapter4.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
                spinner4.setAdapter(dataAdapter4);
                spinner4.setSelection(ward_id);
            }

            if(poll_unit_id  != 0){

                ArrayAdapter<String> dataAdapter4= new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1, poll_unit_list);
                dataAdapter4.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
                spinner5.setAdapter(dataAdapter4);
                spinner5.setSelection(poll_unit_id);
            }




            //String.valueOf(spinner3.getSelectedItem());
        }catch(NullPointerException e){
            e.printStackTrace();
        }

    }


}
