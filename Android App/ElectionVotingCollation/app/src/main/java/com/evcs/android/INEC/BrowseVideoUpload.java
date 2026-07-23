/**
 *
 */
package com.eciels.android.INEC;

import android.Manifest;
import android.annotation.SuppressLint;
import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.database.Cursor;
import android.net.Uri;
import android.os.AsyncTask;
import android.os.Build;
import android.provider.MediaStore;
import android.provider.Settings;

import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.ActivityCompat;
import androidx.core.content.ContextCompat;

import android.os.Bundle;
import android.telephony.TelephonyManager;
import android.text.TextUtils;
import android.util.Log;
import android.view.View;
import android.view.inputmethod.InputMethodManager;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.MediaController;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;
import android.widget.VideoView;


import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;


import java.io.File;
import java.io.IOException;
import java.util.ArrayList;
import java.util.List;

import android.widget.AdapterView.OnItemSelectedListener;


import java.io.FileOutputStream;
import java.io.InputStream;
import java.io.IOException;


import android.content.SharedPreferences;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;

/**
 * @author Joshua
 *
 */
public class BrowseVideoUpload extends AppCompatActivity implements OnItemSelectedListener {


    private Button buttonChoose;
    private Button buttonUpload;
    private Button butCancel;
    private TextView textView;
    private TextView textViewResponse;

    private static final int SELECT_VIDEO = 3;

    private String selectedPath;


    String strUrl, spannerHolder, spanner1Holder, spanner2Holder, spanner3Holder, spanner4Holder, spanner5Holder, spanner6Holder, IMEIHolder;

    String txtSpanner1, txtSpanner3, txtSpanner2, txtSpanner4, txtSpanner5, txtSpanner6, txtSpinnerPop, txtSpinnerPop3, txtSpinnerPop4;

    private Spinner spinner2, spinner1, spinner6, spinner3, spinner4, spinner5;

    String deviceUniqueIdentifier = null;



    String HttpURL = "https://evcs.ng/project/sendResult.php";

    String HttpURL_LGA = "https://evcs.ng/project/populateSpinner.php";

    String HttpURL_WARDS = "https://evcs.ng/project/populateSpinnerWards.php";

    String HttpURL_POLUNIT = "https://evcs.ng/project/populateSpinnerPolUnit.php";

    public static final String UPLOAD_URL = "https://evcs.ng/project/upload_video.php";


    HttpParse httpParse = new HttpParse();

    // MultipartUtility multiHTTP = new MultipartUtility();

    Boolean CheckEditText;

    Uri selectedImageUri;

    ArrayAdapter adapter;


    private VideoView videoView;

    private ImageView imageView;


    String finalResult, rst, result;
    private Uri filePath;
    private static final int MY_PERMISSIONS_REQUEST_CAMERA = 101;

    private String[] appPermissions={
            Manifest.permission.CAMERA,
            Manifest.permission.WRITE_EXTERNAL_STORAGE,
            Manifest.permission.BLUETOOTH,
            Manifest.permission.BLUETOOTH_ADMIN,
            Manifest.permission.INTERNET,
            Manifest.permission.READ_PHONE_STATE,
            Manifest.permission.READ_PHONE_NUMBERS,
            Manifest.permission.READ_MEDIA_VIDEO,
            Manifest.permission.ACCESS_COARSE_LOCATION,
            Manifest.permission.ACCESS_FINE_LOCATION,
            Manifest.permission.WAKE_LOCK,
            Manifest.permission.ACCESS_WIFI_STATE,
           // Manifest.permission.READ_EXTERNAL_STORAGE,
            Manifest.permission.ACCESS_FINE_LOCATION,
            Manifest.permission.VIBRATE,
            Manifest.permission.ACTIVITY_RECOGNITION
    };


    private File copyUriToTempFile(Uri uri) throws IOException {

        File tempFile = new File(
                getCacheDir(),
                "upload_" + System.currentTimeMillis() + ".mp4"
        );

        InputStream inputStream =
                getContentResolver().openInputStream(uri);

        FileOutputStream outputStream =
                new FileOutputStream(tempFile);

        byte[] buffer = new byte[8192];
        int bytesRead;

        while ((bytesRead = inputStream.read(buffer)) != -1) {
            outputStream.write(buffer, 0, bytesRead);
        }

        outputStream.flush();
        outputStream.close();
        inputStream.close();

        return tempFile;
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        try{
        setContentView(R.layout.browsevideoupload);

            uploadPendingData();

        buttonChoose = (Button) findViewById(R.id.buttonChoose);
        buttonUpload = (Button) findViewById(R.id.buttonUpload);

        butCancel = (Button) findViewById(R.id.btnBack);

        textView = (TextView) findViewById(R.id.textView);
        textViewResponse = (TextView) findViewById(R.id.textViewResponse);

        videoView = (VideoView) findViewById(R.id.vdoView);


        //getDeviceIMEI();
        Intent intent = getIntent();
        IMEIHolder = intent.getStringExtra("IMEIHolder");
        deviceUniqueIdentifier =intent.getStringExtra("IMEIHolder");


       // if(checkAndRequestPermissions()){
            IMEIHolder=getDeviceIMEI();
       // }

        addListenerOnSpinnerItemSelection();

        //spinner2.setOnItemSelectedListener(this);


        spinner6 = (Spinner) findViewById(R.id.spinner6);
        spinner1 = (Spinner) findViewById(R.id.spinner1);
        spinner2 = (Spinner) findViewById(R.id.spinner2);
        spinner3 = (Spinner) findViewById(R.id.spinner3);
        spinner4 = (Spinner) findViewById(R.id.spinner4);
        spinner5 = (Spinner) findViewById(R.id.spinner5);


        addItemsOnSpinner1();
        addItemsOnSpinner6();


        //addListenerOnButton();
        addListenerOnSpinnerItemSelection();

        addItemsOnSpinner2();
        addItemsOnSpinner3();
        addItemsOnSpinner4();
        addItemsOnSpinner5();


        spinner4.setOnItemSelectedListener(this);
        spinner3.setOnItemSelectedListener(this);
        spinner2.setOnItemSelectedListener(this);


        butCancel.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {


                finish();

                Intent intent = new Intent(BrowseVideoUpload.this, Menu_app_election.class);

                intent.putExtra("IMEIHolder",IMEIHolder);

                startActivity(intent);

            }
        });


        buttonChoose.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {


                chooseVideo();

            }
        });


        buttonUpload.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {


                CheckEditTextIsEmptyOrNot();
                if (CheckEditText) {

                    uploadVideo();
                } else {

                    // If EditText is empty then this block will execute .
                    Toast.makeText(BrowseVideoUpload.this, "Please fill all form fields.", Toast.LENGTH_LONG).show();
                }


            }
        });


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


    /**
     *
     * Pending post
     * @return
     */




    /* Check for Internet Connections */
    private boolean isNetworkAvailable() {

        try {

            ConnectivityManager cm =
                    (ConnectivityManager)getSystemService(Context.CONNECTIVITY_SERVICE);

            NetworkInfo activeNetwork = cm.getActiveNetworkInfo();

            return activeNetwork != null &&
                    activeNetwork.isConnected();

        }
        catch (Exception e)
        {
            e.printStackTrace();
        }

        return false;
    }



    private void savePendingUpload(String jsonData) {

        try {

            SharedPreferences prefs =
                    getSharedPreferences("BROWSE_Video_PENDING_UPLOADS", MODE_PRIVATE);

            prefs.edit()
                    .putString("UPLOAD_DATA", jsonData)
                    .apply();

            Log.e("OFFLINE_UPLOAD","Data saved locally");

        }
        catch(Exception e)
        {
            e.printStackTrace();

        }
    }


    private String getPendingUpload() {

        SharedPreferences prefs =
                getSharedPreferences("BROWSE_Video_PENDING_UPLOADS", MODE_PRIVATE);

        return prefs.getString("UPLOAD_DATA", null);
    }

    private void clearPendingUpload() {

        SharedPreferences prefs =
                getSharedPreferences("BROWSE_Video_PENDING_UPLOADS", MODE_PRIVATE);

        prefs.edit()
                .remove("UPLOAD_DATA")
                .apply();
    }

    private void uploadPendingData() {

        if(!isNetworkAvailable())
        {
            return;
        }

        String jsonData = getPendingUpload();

        if(jsonData == null)
        {
            return;
        }


        new BrowseVideoUpload.RetryUploadTask().execute(jsonData);
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

                requestPermissions(
                        new String[]{Manifest.permission.READ_MEDIA_VIDEO},
                        100
                );

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





    protected void onSaveInstanceState(Bundle outState) {
        super.onSaveInstanceState(outState);
  
        // save file url in bundle as it will be null on screen orientation
        // changes
        outState.putParcelable("file_uri", selectedImageUri);
    }
  
    @Override
    protected void onRestoreInstanceState(Bundle savedInstanceState) {
        super.onRestoreInstanceState(savedInstanceState);
  
        if(savedInstanceState != null)
        {
        // get the file url
        	selectedImageUri = savedInstanceState.getParcelable("file_uri");
        	
        	
        
        }
    }

    
    
    
    
    
 
    private void chooseVideo() {
        Intent intent = new Intent();
        intent.setType("video/*");
        intent.setAction(Intent.ACTION_GET_CONTENT);
        startActivityForResult(Intent.createChooser(intent, "Select a Video "), SELECT_VIDEO);
    }
 
    @Override
    public void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if (resultCode == RESULT_OK) {
            if (requestCode == SELECT_VIDEO) {
                System.out.println("SELECT_VIDEO");
                //Uri selectedImageUri = data.getData();
                selectedImageUri = data.getData();
               // selectedPath = getPath(selectedImageUri);


                textView.setText(data.getData().getPath());
                selectedPath =data.getData().getPath();



                //textView.setText(selectedPath);
                videoView.setVideoURI(selectedImageUri);
                videoView.setMediaController(new MediaController(this));
                videoView.requestFocus();
                videoView.start();

            }
        }
    }






public String getPath(Uri uri) {
    Cursor cursor = getContentResolver().query(uri, null, null, null, null);

    if (cursor == null) {
        return null;
    }

    try {
        if (!cursor.moveToFirst()) {
            return null;
        }

        int idx = cursor.getColumnIndex(MediaStore.Video.Media.DATA);
        if (idx >= 0) {
            return cursor.getString(idx);
        }

        return null;
    } finally {
        cursor.close();
    }
}


    private void uploadVideo() {
        class Upload_Video extends AsyncTask<Void, Void, String> {
 
            ProgressDialog uploading;
 
            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                uploading = ProgressDialog.show(BrowseVideoUpload.this, "Uploading File", "Please wait...", false, false);
            }
 
            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);
                uploading.dismiss();

                String	MessageResp = s.replaceAll("^\"|\"$", "");

                s = MessageResp.toString().replaceAll("\"","");
                
                Toast.makeText(BrowseVideoUpload.this,s,Toast.LENGTH_LONG).show();
            }
 
            @Override
            protected String doInBackground(Void... params) {
               
                
                try {
                     
     
                    HttpVideo u = new HttpVideo();
                    
                   
                     
                    
                     
                    JSONObject postDataParams = new JSONObject();
                       
                    spanner2Holder =String.valueOf(spinner2.getSelectedItem());
                    spanner1Holder =String.valueOf(spinner1.getSelectedItem());
                    spanner6Holder =String.valueOf(spinner6.getSelectedItem());
                    
                    spanner3Holder =String.valueOf(spinner3.getSelectedItem());
                    spanner4Holder =String.valueOf(spinner4.getSelectedItem());
                    spanner5Holder =String.valueOf(spinner5.getSelectedItem());
                    
                    
                    IMEIHolder = getDeviceIMEI();
                    
                    String charset = "UTF-8";
	                
	                
	                File uploadFile1;
	       		  

                     uploadFile1 = copyUriToTempFile(selectedImageUri);

                    Log.e("UPLOAD", "temp file = " + uploadFile1.getAbsolutePath());
                    Log.e("UPLOAD", "exists = " + uploadFile1.exists());
                    Log.e("UPLOAD", "length = " + uploadFile1.length());



	                MultipartUtility multipart = new MultipartUtility(UPLOAD_URL, charset);

 
	                
	                multipart.addFormField("spinner1", spanner1Holder);
	                multipart.addFormField("spinner2", spanner2Holder);
	                multipart.addFormField("spinner3", spanner3Holder);
	                multipart.addFormField("spinner4", spanner4Holder);
	                multipart.addFormField("spinner5", spanner5Holder);
	                multipart.addFormField("spinner6", spanner6Holder);
	                
	                multipart.addFormField("IMEI",IMEIHolder);
	                
	                //multipart.addFormField("fileType", "Video"); 
                    
	                //multipart.addFormField("file_name", pathToVideoFile); 
                    


                    savePendingUpload(multipart.toString());

                    // result = httpParse.postRequest(postDataParams, UPLOAD_URL);

                    if(isNetworkAvailable())
                    {

                        multipart.addFilePart("uploadedfile", uploadFile1);
                        List<String> response = multipart.finish();
                        for (String line : response) {
                            Log.v("right", "Line : "+line);
                            result =line;

                        }

                    }
                    else
                    {
                        result =
                                "No Internet. Saved for upload.";
                    }








	                Log.v("right", "SERVER REPLIED:");





                    
                    
                    
                     Log.e("param: ",result.toString());
                     
     
                	 } catch (Exception e) {
                         e.printStackTrace();
                     } 
                    return  result;
                
                    //return msg;
                
                
                
                
                
            }
        }
         Upload_Video uv = new Upload_Video();
         uv.execute();
    }



    private class RetryUploadTask
            extends AsyncTask<String, Void, String> {

        @Override
        protected String doInBackground(String... params) {

            try {

                JSONObject pendingObject =
                        new JSONObject(params[0]);

                return httpParse.postRequest(
                        pendingObject,
                        UPLOAD_URL);

            }
            catch (Exception e) {

                e.printStackTrace();

                return null;
            }
        }

        @Override
        protected void onPostExecute(String response) {

            super.onPostExecute(response);

            Log.e("OFFLINE_UPLOAD",
                    "Server Response = " + response);






            if(response != null)
            {
                response =
                        response.replace("\"","");

                if(response.trim()
                        .equalsIgnoreCase("Success"))
                {

                    clearPendingUpload();

                    Toast.makeText(
                            BrowseVideoUpload.this,
                            "Pending upload successful",
                            Toast.LENGTH_LONG
                    ).show();

                    Log.e("OFFLINE_UPLOAD",
                            "Pending upload cleared");
                }
            }
        }
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
    
    
    /*CALLING METHOD THAT HELP TO HIDE KEYBOARD  WHEN TOUCH BODY */
	   public void hideKeyboard(View view) {
	        InputMethodManager inputMethodManager =(InputMethodManager)getSystemService(Activity.INPUT_METHOD_SERVICE);
	        inputMethodManager.hideSoftInputFromWindow(view.getWindowToken(), 0);
	    
		
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
	   
	   
	   public void addItemsOnSpinner3() {
		   
			spinner3 = (Spinner) findViewById(R.id.spinner3);
			List<String> list = new ArrayList<String>();
			 
			list.add("Select");
			 
			
			ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, list);
			dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
			spinner3.setAdapter(dataAdapter);
		  } 
		 
		  
		  
		  
		  public void addItemsOnSpinner4() {
			  
				spinner4 = (Spinner) findViewById(R.id.spinner4);
				List<String> list = new ArrayList<String>();
				list.add("Select");
				 
				ArrayAdapter<String> dataAdapter4 = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, list);
				dataAdapter4.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
				spinner4.setAdapter(dataAdapter4);
			  }
		  
		  public void addItemsOnSpinner5() {
			  
				spinner5 = (Spinner) findViewById(R.id.spinner5);
				List<String> list = new ArrayList<String>();
				list.add("Select");
				 
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
      	  Toast.makeText(BrowseVideoUpload.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
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
      	  Toast.makeText(BrowseVideoUpload.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
      	  ctr=0;
        }
   
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
        JSONArray jsonArray = new JSONArray(json);
        
        
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
      	  Toast.makeText(BrowseVideoUpload.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
      	  ctr=0;
        }
   
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

        
         
        
        //spanner2Holder =String.valueOf(spinner2.getSelectedItem());
         String sel="Select";
        spanner2Holder =String.valueOf(spinner2.getSelectedItem());
        spanner1Holder =String.valueOf(spinner1.getSelectedItem());
        spanner2Holder =String.valueOf(spinner2.getSelectedItem());
        spanner3Holder =String.valueOf(spinner3.getSelectedItem());
        spanner4Holder =String.valueOf(spinner4.getSelectedItem());
        spanner5Holder =String.valueOf(spinner5.getSelectedItem());
        spanner6Holder =String.valueOf(spinner6.getSelectedItem());
        
          strUrl =textView.getText().toString();
        
        if(TextUtils.isEmpty(strUrl) ||spanner1Holder.trim().equals(sel)  || spanner2Holder.trim().equals(sel) || spanner3Holder.trim().equals(sel) || spanner4Holder.trim().equals(sel) || spanner5Holder.trim().equals(sel) || spanner6Holder.trim().equals(sel) )
        
       // if(spanner2Holder.trim().equals(sel))
        {

            CheckEditText = false;
            
             
            
            Log.e("Check State in False: ",spanner2Holder.toString());

        }
        else {

            CheckEditText = true ;
            Log.e("Check State in True: ",spanner2Holder.toString());
        }

    } 
    
    
    
    
    
}