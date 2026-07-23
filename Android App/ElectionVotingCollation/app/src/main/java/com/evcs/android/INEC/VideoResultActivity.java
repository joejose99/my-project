package com.eciels.android.INEC;

import android.Manifest;
import android.annotation.SuppressLint;
import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.graphics.Color;
import android.os.AsyncTask;
import android.os.Build;
import android.os.Bundle;
import android.provider.Settings;
import android.telephony.TelephonyManager;
import android.text.TextUtils;
import android.util.Log;
import android.view.View;
import android.view.inputmethod.InputMethodManager;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemSelectedListener;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.ActivityCompat;
import androidx.core.content.ContextCompat;
import androidx.navigation.ui.AppBarConfiguration;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.eciels.android.INEC.Adapter.PopularAdapter;
import com.eciels.android.INEC.Adapter.VideoAdapter;
import com.eciels.android.INEC.FoodDomain.VideoDomain;
import com.eciels.android.INEC.databinding.ActivityVideoResultBinding;
import com.github.mikephil.charting.charts.BarChart;
import com.github.mikephil.charting.components.XAxis;
import com.github.mikephil.charting.data.BarData;
import com.github.mikephil.charting.data.BarDataSet;
import com.github.mikephil.charting.data.BarEntry;
import com.github.mikephil.charting.formatter.IndexAxisValueFormatter;
import com.github.mikephil.charting.utils.ColorTemplate;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

//import android.support.v7.app.AppCompatActivity;
//import com.androidbegin.jsonspinnertutorial.MainActivity;
//import com.androidbegin.jsonspinnertutorial.R;
//import com.androidbegin.jsonspinnertutorial.MainActivity;
//import com.javacodegeeks.android.androidspinnerexample.R;

public class VideoResultActivity extends AppCompatActivity  implements OnItemSelectedListener {

    private AppBarConfiguration appBarConfiguration;
    private ActivityVideoResultBinding binding;



        private Spinner spinner1, spinner2, spinner3, spinner4, spinner5, spinner6;
        private Button button;

        ArrayAdapter adapter;

        Button b1, b2;
        EditText ed1, edMessage;

        TextView tx1, Message;
        String deviceUniqueIdentifier = null;

        String UserNameHolder, LoginPasswordHolder, IMEIHolder, MessageResp;
        String spanner1Holder, spanner2Holder, spanner3Holder, spanner4Holder, spanner5Holder, spanner6Holder;

        String txtSpanner1, txtSpanner2, txtSpanner3, txtSpanner4, txtSpanner5, txtSpanner6, txtSpinnerPop, txtSpinnerPop3, txtSpinnerPop4;

        Boolean CheckEditText;
        ProgressDialog progressDialog;
        String finalResult, rst;

        /*
        String HttpURL = "https://www.evcs.ng/project/sms_election.php";

        String HttpURL_LGA = "https://www.evcs.ng/project/populateSpinner.php";

        String HttpURL_WARDS = "https://www.evcs.ng/project/populateSpinnerWards.php";

        String HttpURL_POLUNIT = "https://www.evcs.ng/project/populateSpinnerPolUnit.php";


         */

    String HttpURL = "https://evcs.ng/project/sms_election.php";

    String HttpURL_LGA = "https://evcs.ng/project/populateSpinner.php";

    String HttpURL_WARDS = "https://evcs.ng/project/populateSpinnerWards.php";

    String HttpURL_POLUNIT = "https://evcs.ng/project/populateSpinnerPolUnit.php";


    String Errors;

        List<String> list = new ArrayList<String>();

        HttpParse httpParse = new HttpParse();
        public JSONObject postData;


        private static final int MY_PERMISSIONS_REQUEST_CAMERA = 1;

        private String[] appPermissions={
                Manifest.permission.CAMERA,
                Manifest.permission.WRITE_EXTERNAL_STORAGE,
                Manifest.permission.BLUETOOTH,
                Manifest.permission.BLUETOOTH_ADMIN,
                Manifest.permission.INTERNET,
                Manifest.permission.READ_PHONE_STATE,
                Manifest.permission.READ_PHONE_NUMBERS,
                Manifest.permission.READ_EXTERNAL_STORAGE,
                Manifest.permission.ACCESS_COARSE_LOCATION,
                Manifest.permission.ACCESS_FINE_LOCATION,
                Manifest.permission.WAKE_LOCK,
                Manifest.permission.ACCESS_WIFI_STATE,
                Manifest.permission.READ_EXTERNAL_STORAGE,
                Manifest.permission.ACCESS_FINE_LOCATION,
                Manifest.permission.VIBRATE,
                Manifest.permission.ACTIVITY_RECOGNITION
        };

        String select = "Select";

    private RecyclerView recyclerView;
    private List<String> listPic = new ArrayList<String>();
    private List<String> listParty = new ArrayList<String>();

    List<String> listPol = new ArrayList<String>();

    LinearLayoutManager linearLayoutManager = new LinearLayoutManager(this, LinearLayoutManager.HORIZONTAL, false);
    ArrayList<VideoDomain> videoList = new ArrayList<>();

    BarChart barChart;

    // variable for our bar data.
    BarData barData;

    // variable for our bar data set.
    BarDataSet barDataSet;



    // array list for storing entries.
    ArrayList barEntriesArrayList;

    @Override
        public void onCreate(Bundle savedInstanceState) {
            super.onCreate(savedInstanceState);

            try{
                setContentView(R.layout.activity_video_result);
                //setContentView(R.layout.main);

               // b1 = (Button) findViewById(R.id.button);
                b2 = (Button) findViewById(R.id.btnBack);

                //ed1 = (EditText) findViewById(R.id.txtMsg);

                //edMessage = (EditText) findViewById(R.id.txtMsg);
                //edMessage.setText("");


                //getDeviceIMEI();

                Intent intent2 = getIntent();
                IMEIHolder = intent2.getStringExtra("IMEIHolder");
                deviceUniqueIdentifier =intent2.getStringExtra("IMEIHolder");

                //if(checkAndRequestPermissions()){
                IMEIHolder=getDeviceIMEI();
                //}



                addItemsOnSpinner1();
                addItemsOnSpinner6();
                addListenerOnButton();
                addListenerOnSpinnerItemSelection();
                addItemsOnSpinner2();
                addItemsOnSpinner3();
                addItemsOnSpinner4();
                addItemsOnSpinner5();
                //spinner2.setOnItemSelectedListener((OnItemSelectedListener) this);


                spinner4.setOnItemSelectedListener(this);
                spinner3.setOnItemSelectedListener(this);
                spinner2.setOnItemSelectedListener(this);


                //PopulateLGA(select);

                /* HIDDEN KEYBOARD  WHEN TOUCH BODY */
                /*
                ed1.setOnFocusChangeListener(new View.OnFocusChangeListener() {
                    @Override
                    public void onFocusChange(View v, boolean hasFocus) {
                        if (!hasFocus) {
                            hideKeyboard(v);
                        }
                    }
                });

                 */

            }catch(NullPointerException e){
                e.printStackTrace();
            }
            catch(ArrayIndexOutOfBoundsException e){
                e.printStackTrace();
            }
            catch(Exception e){
                Log.e("Error", e.getLocalizedMessage());
            }


        }




        private boolean checkAndRequestPermissions() {
            int permissionCAMERA = ContextCompat.checkSelfPermission(this,
                    Manifest.permission.CAMERA);


            int storagePermission = ContextCompat.checkSelfPermission(this,


                    Manifest.permission.READ_EXTERNAL_STORAGE);


            int storageWritePermission = ContextCompat.checkSelfPermission(this,


                    Manifest.permission.WRITE_EXTERNAL_STORAGE);



            List<String> listPermissionsNeeded = new ArrayList<>();

            if (storageWritePermission != PackageManager.PERMISSION_GRANTED) {
                listPermissionsNeeded.add(Manifest.permission.WRITE_EXTERNAL_STORAGE);
            }
            if (storagePermission != PackageManager.PERMISSION_GRANTED) {
                listPermissionsNeeded.add(Manifest.permission.READ_EXTERNAL_STORAGE);
            }
            if (permissionCAMERA != PackageManager.PERMISSION_GRANTED) {
                listPermissionsNeeded.add(Manifest.permission.CAMERA);
            }
            if (!listPermissionsNeeded.isEmpty()) {
                ActivityCompat.requestPermissions(this,


                        listPermissionsNeeded.toArray(new String[listPermissionsNeeded.size()]), MY_PERMISSIONS_REQUEST_CAMERA);
                return false;
            }

            return true;
        }




        /* GETTING DEVICE IMEI NO */
        @SuppressLint("HardwareIds")
        public String getDeviceIMEI() {

            String deviceUniqueIdentifier = null;
            Context context = null;
            try{
                //if(checkAndRequestPermissions()){


                if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.Q)
                {
                    //Log.i("level","Im In for SDK Version");

                    deviceUniqueIdentifier =  Settings.Secure.getString(getBaseContext().getContentResolver(), Settings.Secure.ANDROID_ID);

                    //Log.e("device Id","******** Device Id******* "+deviceUniqueIdentifier);
                    return deviceUniqueIdentifier;
                    // deviceUniqueIdentifier =UUID.randomUUID().toString();
                    //Log.e("device Id","******** Device Id******* "+deviceUniqueIdentifier);

                }else{
                    // Log.i("IMei","IMEI Device**************");
                    TelephonyManager tm = (TelephonyManager) this.getSystemService(Context.TELEPHONY_SERVICE);
                    if (null != tm) {
                        deviceUniqueIdentifier = tm.getDeviceId();
                    }
                    if (null == deviceUniqueIdentifier || 0 == deviceUniqueIdentifier.length()) {
                        return deviceUniqueIdentifier = Settings.Secure.getString(this.getContentResolver(), Settings.Secure.ANDROID_ID);
                    }
                    // Log.i("IMei","IMEI Device**************" +deviceUniqueIdentifier);
                    return deviceUniqueIdentifier;
                }
            }catch(NullPointerException e){
                e.printStackTrace();
            }
            return deviceUniqueIdentifier;

        }


        public void addItemsOnSpinner1() {

            spinner1 = (Spinner) findViewById(R.id.spinner1);
            List<String> list = new ArrayList<String>();

            list.add("Select");
            list.add("Bye-Election");
            list.add("General");
            list.add("Re-run");
            list.add("Supplementary");
            ArrayAdapter<String> dataAdapter1 = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, list);
            dataAdapter1.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
            spinner1.setAdapter(dataAdapter1);
        }


        public void addItemsOnSpinner2() {

            spinner2 = (Spinner) findViewById(R.id.spinner2);


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




            ArrayAdapter<String> dataAdapter2 = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, list);
            dataAdapter2.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
            spinner2.setAdapter(dataAdapter2);


        }

        // add items into spinner dynamically
        public void addItemsOnSpinner3() {

            spinner3 = (Spinner) findViewById(R.id.spinner3);
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

            ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, list);
            dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
            spinner3.setAdapter(dataAdapter);
        }




        public void addItemsOnSpinner4() {

            spinner4 = (Spinner) findViewById(R.id.spinner4);
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
            ArrayAdapter<String> dataAdapter4 = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, list);
            dataAdapter4.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
            spinner4.setAdapter(dataAdapter4);
        }

        public void addItemsOnSpinner5() {

            spinner5 = (Spinner) findViewById(R.id.spinner5);
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
            ArrayAdapter<String> dataAdapter5 = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, list);
            dataAdapter5.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
            spinner5.setAdapter(dataAdapter5);
        }


        public void addItemsOnSpinner6() {

            spinner6 = (Spinner) findViewById(R.id.spinner6);
            List<String> list = new ArrayList<String>();
            list.add("Select");
            list.add("Presidential");
            list.add("Gubernatorial");
            list.add("Senatorial");
            list.add("House Of Representatives");
            list.add("State House of Assembly");
            list.add("Chairmanship");
            ArrayAdapter<String> dataAdapter6 = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, list);
            dataAdapter6.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
            spinner6.setAdapter(dataAdapter6);
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


/*
            switch(ids)
            {
                case R.id.spinner2:



                    PopulateLGA(txtSpinnerPop);


                    break;
                case R.id.spinner3:



                    PopulateWARDS(txtSpinnerPop,txtSpinnerPop3);


                    break;

                case R.id.spinner4:

                    txtSpinnerPop4=(String) spinner4.getSelectedItem();


                    PopulatePOLUNIT(txtSpinnerPop,txtSpinnerPop3,sp4);


                    break;

            }


        }

 */

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





        public void addListenerOnButton() {

            spinner6 = (Spinner) findViewById(R.id.spinner6);
            spinner1 = (Spinner) findViewById(R.id.spinner1);
            spinner2 = (Spinner) findViewById(R.id.spinner2);
            spinner3 = (Spinner) findViewById(R.id.spinner3);
            spinner4 = (Spinner) findViewById(R.id.spinner4);
            spinner5 = (Spinner) findViewById(R.id.spinner5);



/*
            button = (Button) findViewById(R.id.button);

            button.setOnClickListener(new OnClickListener() {

                @Override
                public void onClick(View v) {


                    txtSpanner1=(String) spinner1.getSelectedItem();



                    CheckEditTextIsEmptyOrNot();

                    if(CheckEditText){


                        SendMessagePage(MessageResp,spanner1Holder,spanner2Holder,spanner3Holder,spanner4Holder,spanner5Holder,spanner6Holder);



                        //UserNameHolder = ed1.getText().toString();



                    }
                    else {

                        // If EditText is empty then this block will execute .
                        Toast.makeText(SMS.this, "Please fill all form fields.", Toast.LENGTH_LONG).show();

                    }
                }

            });

*/


            b2.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {






                    Intent intent = new Intent(VideoResultActivity.this, MenuAdminActivity.class);

                    intent.putExtra("IMEIHolder",IMEIHolder);

                    startActivity(intent);

                }

            });
        }








        /* SENDING MESSAGE CLASS */
    /*
        public void SendMessagePage(final String Message, final String Spanner1, final String Spanner2 , final String Spanner3, final String Spanner4 , final String Spanner5, final String Spanner6){

            class MessageClass extends AsyncTask<String,Void,String> {

                @Override
                protected void onPreExecute() {
                    super.onPreExecute();

                    progressDialog = ProgressDialog.show(SMS.this,"Sending ....",null,true,true);
                }

                @Override
                protected void onPostExecute(String httpResponseMsg) {

                    super.onPostExecute(httpResponseMsg);

                    progressDialog.dismiss();

                    //Toast.makeText(LoginUsers.this,httpResponseMsg.toString(), Toast.LENGTH_LONG).show();

                    MessageResp = httpResponseMsg.replaceAll("^\"|\"$", "");

                    httpResponseMsg=MessageResp;

                    if(httpResponseMsg.trim().equalsIgnoreCase("Success")){

                        //finish();

                        // Intent intent = new Intent(LoginUsers.this, MainActivity.class);

                        // startActivity(intent);


                        Toast.makeText(SMS.this,httpResponseMsg,Toast.LENGTH_LONG).show();
                        ed1.setText("") ;
                    }
                    else{

                        Toast.makeText(SMS.this,httpResponseMsg,Toast.LENGTH_LONG).show();
                        // Log.w("myApp", "no networks");

                        Log.w("Message", httpResponseMsg);

                    }



                }

                @Override
                protected String doInBackground(String... params) {

                    try {


                        JSONObject postDataParams = new JSONObject();

                        //postDataParams.put("Message", params[0]);
                        postDataParams.put("Message", ed1.getText());

                        postDataParams.put("spanner1", Spanner1);

                        IMEIHolder = getDeviceIMEI();


                        postDataParams.put("spanner2", Spanner2);
                        postDataParams.put("spanner3", Spanner3);
                        postDataParams.put("spanner4", Spanner4);

                        postDataParams.put("spanner5", Spanner5);
                        postDataParams.put("spanner6", Spanner6);

                        postDataParams.put("IMEI",IMEIHolder);

                        Log.e("params",postDataParams.toString());

                        finalResult = httpParse.postRequest(postDataParams, HttpURL);


                    } catch (Exception e) {
                        e.printStackTrace();
                    }



                    return finalResult;
                }
            }

            MessageClass msgClass = new MessageClass();

            msgClass.execute(Message, Spanner1,Spanner2,Spanner3,Spanner4,Spanner5,Spanner6);
        }

*/






















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
            JSONArray jsonArray = new JSONArray(json);


            String[] heroes = new String[jsonArray.length()];

            int ctr=0;

            for (int i = 0; i < jsonArray.length(); i++) {
                JSONObject obj = jsonArray.getJSONObject(i);
                heroes[i] = obj.getString("lga");

                Log.e("params", heroes[i].toString());

                ctr++;
            }


            if(ctr ==1)
            {
                Toast.makeText(VideoResultActivity.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
                ctr=0;
            }



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
                        String strSpinner1=(String) spinner1.getSelectedItem();
                        String strSpinner6=(String) spinner6.getSelectedItem();


                        postDataParams.put("spanner1", strSpinner1);
                        postDataParams.put("spanner6", strSpinner6);

                        postDataParams.put("spanner2", Spanner2);
                        postDataParams.put("spanner3", Spanner3);

                        postDataParams.put("result", "result");
                        postDataParams.put("status", "video");

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

           /*
            JSONArray jsonArray = new JSONArray(json);


            String[] heroes_wrd = new String[jsonArray.length()];

            int ctr=0;

            for (int i = 0; i < jsonArray.length(); i++) {
                JSONObject obj = jsonArray.getJSONObject(i);
                heroes_wrd[i] = obj.getString("ward");

                Log.e("params", heroes_wrd[i].toString());

                ctr++;
            }

            if(ctr ==1)
            {
                Toast.makeText(VideoResultActivity.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
                ctr=0;
            }

            ArrayAdapter<String> dataAdapterWrd = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, heroes_wrd);
            dataAdapterWrd.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
            spinner4.setAdapter(dataAdapterWrd);

            */

            recyclerView = findViewById(R.id.recycler_view);

            recyclerView.setLayoutManager(linearLayoutManager);
            list.clear();
            listPic.clear();
            listParty.clear();
            videoList.clear();
            JSONArray jsonArray = new JSONArray(json);

            int ctr=0;
            JSONArray result = jsonArray.getJSONArray(1);
            Log.i("Datas","List of Categories  *******" + result );
            videoList.clear();
            for(int x=0;x<result.length();x++) {

                JSONObject collegeData = result.getJSONObject(x);
                JSONObject obj3=collegeData.getJSONObject("wardPics");


                String image_path = obj3.getString("image_path");
                String pollingUnit = obj3.getString("pollingUnit");
                String ward = obj3.getString("ward");
                listPic.add(image_path);
                listPic.add(pollingUnit);
                listPic.add(ward);

                videoList.add(new VideoDomain(obj3.getString("pollingUnit"),obj3.getString("ward"),obj3.getString("pollingUnit"),obj3.getString("image_path")));

                //String   strPop= obj.getString("popular");

                Log.i("category",",list "+ listPic.toString());
                ctr++;
            }
            Log.i("CTR",",Ctr ******** "+ ctr);

            if(ctr == 0){

                Toast.makeText(VideoResultActivity.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
                ctr=0;

            }


            ctr=0;
            JSONArray result2 = jsonArray.getJSONArray(0);
            // Log.i("Datas","List of Categories  *******" + result );
            for(int x=0;x<result2.length();x++) {

                JSONObject collegeData = result2.getJSONObject(x);
                JSONObject obj3=collegeData.getJSONObject("ward");

                //Log.i("Datas","List of Categories Object 3  *******" + obj3 );
                //collecting present object in json
                String ward = obj3.getString("ward");

                list.add(ward);

                //String   strPop= obj.getString("popular");

                Log.i("category",",list "+ list.toString());
                ctr++;
            }









            if(ctr ==1 || ctr==0)
            {
                Toast.makeText(VideoResultActivity.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
                ctr=0;
            }

            ArrayAdapter<String> dataAdapterWrd = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, list);
            dataAdapterWrd.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
            spinner4.setAdapter(dataAdapterWrd);




            JSONArray data = jsonArray.getJSONArray(2);

            for (int i = 0; i < data.length(); i++) {

                Log.i("data","collections  *********** "+data);
                // JSONObject obj = data.getJSONObject(i);



                JSONArray innerArray = data.optJSONArray(i);
                for (int j = 0; j < innerArray.length(); j++) {
                    JSONObject  obj = innerArray.getJSONObject(j);


                    Log.i("data","collections  *********** "+obj);

                    String rstParty = obj.getString("Party");
                    Log.i("data","rstParty is *********** "+rstParty);

                    String rst = obj.getString("result");
                    Log.i("data","result is *********** "+rst);

                    listParty.add(rstParty+"_"+rst);
                    // listParty.add(rst);


                    Log.i("category",",list "+ listParty.toString());
                    ctr++;
                }



            }

            if(listParty.size() >= 0){
                showChart();
            }
            if(ctr== 0){
                Toast.makeText(VideoResultActivity.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
                ctr=0;
            }

            /* Voting picture */
            /* POPULAR STARTS HERE */

            LinearLayoutManager linearLayoutManager1 = new LinearLayoutManager(this, LinearLayoutManager.HORIZONTAL, false);
            recyclerView = findViewById(R.id.recycler_view);
            recyclerView.setLayoutManager(linearLayoutManager1);

            VideoAdapter adapter3 = new VideoAdapter(videoList);
            recyclerView.setAdapter(adapter3);
            //Log.e("data", "foods list **** "+adapter2);
            //this.setAddress_list(foodlist);

            // Log.e("Counters", counters.toString());

            Log.e("Address", videoList.toString());




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



                        String strSpinner1=(String) spinner1.getSelectedItem();
                        String strSpinner6=(String) spinner6.getSelectedItem();

                        JSONObject postDataParams = new JSONObject();

                        postDataParams.put("spanner1", strSpinner1);
                        postDataParams.put("spanner6", strSpinner6);

                        postDataParams.put("spanner2", Spanner2);
                        postDataParams.put("spanner3", Spanner3);
                        postDataParams.put("spanner4", Spanner4);
                        postDataParams.put("result", "result");
                        postDataParams.put("status", "video");
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
            JSONArray jsonArray = new JSONArray(json);

            listParty.clear();
            listPic.clear();
            videoList.clear();

            /*
            String[] heroes_pol = new String[jsonArray.length()];

            int ctr =0;

            for (int i = 0; i < jsonArray.length(); i++) {
                JSONObject obj = jsonArray.getJSONObject(i);




                heroes_pol[i] = obj.getString("pollingUnit");

                Log.e("params", heroes_pol[i].toString());


                ctr++;

            }

            String counters ;
            counters  = String.valueOf(ctr);

            Log.e("Counters", counters.toString());

            if(ctr ==1)
            {
                Toast.makeText(VideoResultActivity.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
                ctr=0;
            }

            ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, heroes_pol);
            dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
            spinner5.setAdapter(dataAdapter);

             */

            recyclerView = findViewById(R.id.recycler_view);

            recyclerView.setLayoutManager(linearLayoutManager);
            listPol.clear();

            // JSONArray jsonArray = new JSONArray(json);



            int ctr=0;
            JSONArray result2 = jsonArray.getJSONArray(0);
            Log.i("Datas","List of Categories  *******" + result2 );
            for(int x=0;x<result2.length();x++) {

                JSONObject collegeData = result2.getJSONObject(x);
                JSONObject obj3=collegeData.getJSONObject("ward");

                //Log.i("Datas","List of Categories Object 3  *******" + obj3 );
                //collecting present object in json
                String PollingUnit = obj3.getString("pollingUnit");

                listPol.add(PollingUnit);

                //String   strPop= obj.getString("popular");

                Log.i("category",",list "+ list.toString());
                ctr++;
            }


            if(ctr ==1 || ctr==0)
            {
                Toast.makeText(VideoResultActivity.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
                ctr=0;
            }

            ArrayAdapter<String> dataAdapterWrd = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, listPol);
            dataAdapterWrd.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
            spinner5.setAdapter(dataAdapterWrd);













            JSONArray result = jsonArray.getJSONArray(1);
            Log.i("Datas","List of Categories  *******" + result );
            for(int x=0;x<result.length();x++) {

                JSONObject collegeData = result.getJSONObject(x);
                JSONObject obj3=collegeData.getJSONObject("wardPics");


                String image_path = obj3.getString("image_path");
                String pollingUnit = obj3.getString("pollingUnit");
                String ward = obj3.getString("ward");
                listPic.add(image_path);
                listPic.add(pollingUnit);
                listPic.add(ward);

                videoList.add(new VideoDomain(obj3.getString("pollingUnit"),obj3.getString("ward"),obj3.getString("pollingUnit"),obj3.getString("image_path")));

                //String   strPop= obj.getString("popular");

                Log.i("category",",list "+ listPic.toString());
                ctr++;
            }

            if(ctr ==0)
            {
                Toast.makeText(VideoResultActivity.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
                ctr=0;
            }






            JSONArray data = jsonArray.getJSONArray(2);
            Log.i("data","collections for Chart *********** "+data);

            for (int i = 0; i < data.length(); i++) {

                Log.i("data","collections Bar Chart *********** "+data);
                // JSONObject obj = data.getJSONObject(i);



                JSONArray innerArray = data.optJSONArray(i);
                for (int j = 0; j < innerArray.length(); j++) {
                    JSONObject  obj = innerArray.getJSONObject(j);


                    Log.i("data","collections Chart 3  *********** "+obj);

                    String rstParty = obj.getString("Party");
                    Log.i("data","rstParty is *********** "+rstParty);

                    String rst = obj.getString("result");
                    Log.i("data","result is *********** "+rst);

                    listParty.add(rstParty+"_"+rst);
                    // listParty.add(rst);


                    Log.i("category",",list "+ listParty.toString());
                    ctr++;
                }

            }

            if(listParty.size() >= 0){
                showChart();
            }

            if(ctr ==0)
            {
                Toast.makeText(VideoResultActivity.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
                ctr=0;
            }




            /* Voting picture */
            /* POPULAR STARTS HERE */

            LinearLayoutManager linearLayoutManager1 = new LinearLayoutManager(this, LinearLayoutManager.HORIZONTAL, false);
            recyclerView = findViewById(R.id.recycler_view);
            recyclerView.setLayoutManager(linearLayoutManager1);

            VideoAdapter adapter3 = new VideoAdapter(videoList);
            recyclerView.setAdapter(adapter3);
            //Log.e("data", "foods list **** "+adapter2);
            //this.setAddress_list(foodlist);

            // Log.e("Counters", counters.toString());

            Log.e("Address", videoList.toString());


        }





        /*
         *
         * POPULATING POLLING UNIT ENDS HERE
         *
         * */











        public void CheckEditTextIsEmptyOrNot(){

            //UserNameHolder = ed1.getText().toString();

            UserNameHolder = edMessage.getText().toString();



            spanner1Holder =String.valueOf(spinner1.getSelectedItem());
            spanner2Holder =String.valueOf(spinner2.getSelectedItem());
            spanner3Holder =String.valueOf(spinner3.getSelectedItem());
            spanner4Holder =String.valueOf(spinner4.getSelectedItem());
            spanner5Holder =String.valueOf(spinner5.getSelectedItem());
            spanner6Holder =String.valueOf(spinner6.getSelectedItem());


            if(TextUtils.isEmpty(UserNameHolder) || spanner1Holder.equals("Select")  || spanner2Holder.equals("Select")  || spanner3Holder.equals("Select") || spanner4Holder.equals("Select")  || spanner5Holder.equals("Select") || spanner6Holder.equals("Select"))
            {

                CheckEditText = false;

            }
            else {

                CheckEditText = true ;
            }

        }


    public List<String> getChat_list() {
        return listParty;
    }

    private void showChart() {
        try{

            barChart = findViewById(R.id.idBarChart);


            List<String> listParty3 = new ArrayList<String>();
            barEntriesArrayList = new ArrayList<>();
            listParty3= this.getChat_list();


            int ctr=1;
            String part_1="";
            String part_2="";
            String part_3="";
            String part_4="";
            String part_5="";

            for(int i =0;i<listParty3.size();i++){
                String str1 =listParty3.get(i);

                Log.i("data"," Array Item "+listParty3.get(i));



                String[] strData=str1.split("_");
                str1 =strData[0];
                int numb=Integer.parseInt(strData[1]);
                Log.i("data"," Split Array Item "+strData[0]);
                Log.i("data"," Split Array Item "+strData[1]);
                if(i==0){
                    if(strData[0].length()>4){
                        part_1=strData[0].substring(0,3);
                        part_1=part_1+"..";
                    }
                    if(strData[0].length()<4){
                        part_1=strData[0];
                    }

                    Log.i("","Im in");
                    barEntriesArrayList.add(new BarEntry(1f, numb));
                }
                if(i==1){
                    if(strData[0].length()>4){
                        part_1=strData[0].substring(0,3);
                        part_2=part_2+"..";
                    }
                    if(strData[0].length()<4){
                        part_2=strData[0];
                    }

                    Log.i("","Im in 2");
                    barEntriesArrayList.add(new BarEntry(2f, numb));
                }
                if(i==2){
                    if(strData[0].length()>4){
                        part_3=strData[0].substring(0,3);
                        part_3=part_3+"..";
                    }
                    if(strData[0].length()<4){
                        part_3=strData[0];
                    }

                    Log.i("","Im in 3");
                    barEntriesArrayList.add(new BarEntry(3f, numb));
                }

                if(i==3){
                    if(strData[0].length()>4){
                        part_4=strData[0].substring(0,3);
                        part_4=part_4+"..";
                    }
                    if(strData[0].length()<4){
                        part_4=strData[0];
                    }

                    Log.i("","Im in 4");
                    barEntriesArrayList.add(new BarEntry(4f, numb));
                }

                if(i==4){
                    if(strData[0].length()>4){
                        part_5=strData[0].substring(0,3);
                        part_5=part_5+"..";
                    }
                    if(strData[0].length()<4){
                        part_5=strData[0];
                    }

                    Log.i("","Im in 5");
                    barEntriesArrayList.add(new BarEntry(5f, numb));
                }



            }

/*
    ArrayList<String> labels = new ArrayList<String>();
    labels.add("APC");
    labels.add("Others");
    labels.add("PDP");

 */
            barDataSet = new BarDataSet(barEntriesArrayList, "Nigerian Election");






            BarData data = new BarData(barDataSet);
            data.setBarWidth(0.9f); // set custom bar width
            barChart.setData(data);


            barChart.setFitBars(true); // make the x-axis fit exactly all bars
            barChart.invalidate(); // refresh

            barDataSet.setColors(ColorTemplate.MATERIAL_COLORS);

            // setting text color.
            barDataSet.setValueTextColor(Color.BLACK);

            // setting text size
            barDataSet.setValueTextSize(19f);
            barChart.getDescription().setEnabled(false);
            barChart.getDescription().setTextSize(25f);

            //final String[] labels = new String[] {"","APC", "Others", "PDP" };

            final String[] labels = new String[] {"",part_1,part_2, part_3, part_4 ,part_5,};


            XAxis xAxis = barChart.getXAxis();
            xAxis.setPosition(XAxis.XAxisPosition.BOTTOM_INSIDE);
            xAxis.setValueFormatter(new IndexAxisValueFormatter(labels));
            xAxis.setGranularity(1f);
            xAxis.setGranularityEnabled(true);
            xAxis.setGridColor(Color.RED);
            xAxis.setTextSize(19f);



        }catch(NullPointerException e){
            e.printStackTrace();
        }catch(Exception e){
            e.printStackTrace();
        }

    }


}

