package com.eciels.android.INEC;

import static java.lang.Integer.parseInt;

import android.Manifest;
import android.annotation.SuppressLint;
import android.app.Activity;
import android.content.pm.PackageManager;
import android.os.Build;
import android.os.Bundle;

import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.ActivityCompat;
import androidx.core.content.ContextCompat;


import android.app.ProgressDialog;
import android.telephony.TelephonyManager;
//import android.support.v7.app.AppCompatActivity;
import android.util.Log;

import org.json.JSONObject;

//import com.androidbegin.jsonspinnertutorial.MainActivity;
//import com.androidbegin.jsonspinnertutorial.R;


//import com.androidbegin.jsonspinnertutorial.MainActivity;


import android.provider.Settings;
import android.os.AsyncTask;

//import com.javacodegeeks.android.androidspinnerexample.R;


import android.content.Context;
import android.content.Intent;

import android.view.View;
import android.view.inputmethod.InputMethodManager;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.List;


import android.content.SharedPreferences;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;


public class VotersRegistration extends AppCompatActivity {

    boolean castVote=true;
    boolean rejectVote=true;
    boolean validVote=true;

	private static final int MY_PERMISSIONS_REQUEST_CAMERA = 1;
	boolean totalRegs=true;
	boolean totalAccre=true;

	String UserNameHolder, LoginPasswordHolder, IMEIHolder, MessageResp;

	String TotalRegHolder, TotalAccrediteddHolder, TotalCastHolder, TotalRejectedHolder, TotalValidHolder;

	String totalVote ;

	String spinner1, spinner2, spinner3, spinner4, spinner5, spinner6, msg;

	Boolean CheckEditText;
	ProgressDialog progressDialog;
	String finalResult, rst;


	//String HttpURL = "https://evcs.ng/exam/appLogin";
	//String HttpURL = "https://www.evcs.ng/project/sendResult.php";

	String HttpURL = "https://evcs.ng/project/sendResult.php";

	//String HttpURL = "http://www.dealsforyourtrip.com/app/index.php";


	//HashMap<String,String> hashMap = new HashMap();

	//HashMap<String,String> hashMap = new HashMap<>();


	HttpParse httpParse = new HttpParse();


	public static final String UserEmail = "";
	     
	     /*public static final String UserEmail = "";
	     
	     public static final String UserEmail = "";
	     
	     public static final String UserEmail = "";
	     public static final String UserEmail = ""; */

	String deviceUniqueIdentifier = null;


	// JSON Node names
	private static final String TAG_SUCCESS = "success";


	Button b1, b2;


	EditText ed1, ed2, ed3, ed4, ed5, ed6;
	TextView tx1;
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

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);

		try{
		setContentView(R.layout.activity_voters_registration);

			uploadPendingData();

		b1 = (Button) findViewById(R.id.button);
		b2 = (Button) findViewById(R.id.btnBack);


		ed6 = (EditText) findViewById(R.id.txtVoteReg);
		ed2 = (EditText) findViewById(R.id.txtVoteAccredited);
		ed3 = (EditText) findViewById(R.id.txtVoteCast);
		ed4 = (EditText) findViewById(R.id.txtVoteRejected);
		ed5 = (EditText) findViewById(R.id.txtTvalidVote);


		//getDeviceIMEI();

		/*  RETRIEVE DATA FROM OLD INTENT */

		Intent intent2 = getIntent();

		msg = intent2.getStringExtra("UserNameHolder");



		IMEIHolder = intent2.getStringExtra("IMEIHolder");

		deviceUniqueIdentifier = intent2.getStringExtra("IMEIHolder");

		//if(checkAndRequestPermissions()){
			getDeviceIMEI();
		//}


		spinner1 = intent2.getStringExtra("spinner1");
		spinner2 = intent2.getStringExtra("spinner2");
		spinner3 = intent2.getStringExtra("spinner3");
		spinner4 = intent2.getStringExtra("spinner4");
		spinner5 = intent2.getStringExtra("spinner5");
		spinner6 = intent2.getStringExtra("spinner6");

		totalVote=intent2.getStringExtra("totalVote");

		ed5.setText(totalVote);
		//Toast.makeText(VotersRegistration.this,MessageResp,Toast.LENGTH_LONG).show();


		b1.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View v) {


				CheckEditTextIsEmptyOrNot();

				int enters=0;

				if (CheckEditText) {


					SendMessagePage(msg, TotalRegHolder, TotalAccrediteddHolder, TotalCastHolder, TotalRejectedHolder, TotalValidHolder, spinner1, spinner2, spinner3, spinner4, spinner5, spinner6);


				} else {





                    if(castVote == false)
                    {
                        Toast.makeText(VotersRegistration.this, "Total Valid Vote Plus Rejected Vote should Equal Total Vote Cast .", Toast.LENGTH_LONG).show();
                        enters=2;
                    }
                    if(validVote == false)
                    {
                        Toast.makeText(VotersRegistration.this, "Total Valid Vote Can not be greater than Total Vote Cast.", Toast.LENGTH_LONG).show();
                        enters=1;

                    }
					//totalAccre=results.getTotalAccredition();
					//totalRegs=results.getTotalReg();

					if(totalAccre == false)
					{
						Toast.makeText(VotersRegistration.this, "T.Vote cast  Can not be greater than T.Accredited Vote .", Toast.LENGTH_LONG).show();
						enters=3;

					}

					if(totalRegs == false)
					{
						Toast.makeText(VotersRegistration.this, "T.Accredited Voters  Can not be greater than Total Register Voters .", Toast.LENGTH_LONG).show();
						enters=4;

					}



                    if(enters == 0) {

                        Toast.makeText(VotersRegistration.this, "Please fill all form fields.", Toast.LENGTH_LONG).show();
                    }
                    //Toast.makeText(VotersRegistration.this, "Please fill all form fields.", Toast.LENGTH_LONG).show();

					enters=0;

				}
			}
		});


		b2.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View v) {


				ed2.setText("");
				ed3.setText("");
				ed4.setText("");
				ed5.setText("");
				ed6.setText("");

				finish();

				Intent intent = new Intent(VotersRegistration.this, MainActivity.class);

				intent.putExtra("IMEIHolder",IMEIHolder);

				startActivity(intent);

			}

		});




		/* HIDDEN KEYBOARD  WHEN TOUCH BODY */
		ed6.setOnFocusChangeListener(new View.OnFocusChangeListener() {
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


			ed3.setOnFocusChangeListener(new View.OnFocusChangeListener() {
				@Override
				public void onFocusChange(View v, boolean hasFocus) {

					if (!hasFocus) { // Lost focus

						String value1 = ed3.getText().toString().trim();
						String value2 = ed5.getText().toString().trim();

						if (!value1.isEmpty() && !value2.isEmpty()) {

							int numb1 = Integer.parseInt(value1);
							int numb2 = Integer.parseInt(value2);

							int numb3 = numb1 - numb2;
if(numb3 >= 0){
								ed4.setText(String.valueOf(numb3));
							}
						}
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
		   
		   /*CALLING METHOD THAT HELP TO HIDE KEYBOARD  WHEN TOUCH BODY */
		   public void hideKeyboard(View view) {
		        InputMethodManager inputMethodManager =(InputMethodManager)getSystemService(Activity.INPUT_METHOD_SERVICE);
		        inputMethodManager.hideSoftInputFromWindow(view.getWindowToken(), 0);
		    
			
			}



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
					getSharedPreferences("PENDING_UPLOADS", MODE_PRIVATE);

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
				getSharedPreferences("PENDING_UPLOADS", MODE_PRIVATE);

		return prefs.getString("UPLOAD_DATA", null);
	}

	private void clearPendingUpload() {

		SharedPreferences prefs =
				getSharedPreferences("PENDING_UPLOADS", MODE_PRIVATE);

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


		new RetryUploadTask().execute(jsonData);
	}


		   
		  
		   
		   

/* SENDING MESSAGE CLASS */
public void SendMessagePage(final String totReg,final String totAccr,final String totCast,final String totRej,final String Message,final String totVal, final String Spanner1, final String Spanner2 , final String Spanner3, final String Spanner4 , final String Spanner5, final String Spanner6){

    class MessageClass extends AsyncTask<String,Void,String> {

        @Override
        protected void onPreExecute() {
            super.onPreExecute();

             //progressDialog = ProgressDialog.show(VotersRegistration.this,"Sending ....",null,true,true);
            
            // progressDialog =ProgressDialog.show(VotersRegistration.this,"Sending", "Please wait...",false,false);

            progressDialog =ProgressDialog.show(VotersRegistration.this,"Sending", "Please wait...",false,false);
            
        }

        @Override
        protected void onPostExecute(String httpResponseMsg) {

            super.onPostExecute(httpResponseMsg);

            progressDialog.dismiss();

            //Toast.makeText(LoginUsers.this,httpResponseMsg.toString(), Toast.LENGTH_LONG).show();

            MessageResp = httpResponseMsg.replaceAll("^\"|\"$", "");


			MessageResp = MessageResp.toString().replaceAll("\"","");


			httpResponseMsg=MessageResp;
            
            if(httpResponseMsg.trim().equalsIgnoreCase("Success")){



					clearPendingUpload();


                
                Toast.makeText(VotersRegistration.this,httpResponseMsg,Toast.LENGTH_LONG).show();
                //ed1.setText("") ;
                
                ed2.setText("") ;
                ed3.setText("") ;
                ed4.setText("") ;
                ed5.setText("") ;
                ed6.setText("") ;
                
                 finish();

                  Intent intent = new Intent(VotersRegistration.this, MainActivity.class);

				intent.putExtra("IMEIHolder",IMEIHolder);

                     startActivity(intent);
            }
            else{

                Toast.makeText(VotersRegistration.this,httpResponseMsg,Toast.LENGTH_LONG).show();
               // Log.w("myApp", "no networks");
                
                Log.w("Message", httpResponseMsg);
                
            }

            
            
        }

        @Override
        protected String doInBackground(String... params) {

        	 try {
        		 
        		 
        		  JSONObject postDataParams = new JSONObject();

                
        		//postDataParams.put("Message", params[0]);
        		  
        		  postDataParams.put("voteRegistration", ed6.getText());
        		  postDataParams.put("accreditedVote", ed2.getText());
        		  postDataParams.put("totalVoteCast", ed3.getText());
        		  postDataParams.put("rejected_vote", ed4.getText());
        		  postDataParams.put("totalValidVote", ed5.getText());
        		  
        		  
        		  IMEIHolder = getDeviceIMEI();
        		  
        		 postDataParams.put("Message", msg);
        		 
               
        		postDataParams.put("spanner1", Spanner1);
                postDataParams.put("spanner2", Spanner2);
        		postDataParams.put("spanner3", Spanner3);
        		postDataParams.put("spanner4", Spanner4);
               
        		postDataParams.put("spanner5", Spanner5);
        		postDataParams.put("spanner6", Spanner6);
        		
        		 postDataParams.put("IMEI", IMEIHolder);

				 savePendingUpload(postDataParams.toString());
               
               Log.e("params",postDataParams.toString());
               
               Log.e("Message",msg.toString());
               
             
             //finalResult = httpParse.postRequest(postDataParams, HttpURL);

				 if(isNetworkAvailable())
				 {
					 finalResult =
							 httpParse.postRequest(
									 postDataParams,
									 HttpURL);
				 }
				 else
				 {
					 finalResult =
							 "No Internet. Saved for upload.";
				 }
             
             
        	 } catch (Exception e) {
                 e.printStackTrace();
             } 
            
            

            return finalResult;
        }
    }

    MessageClass msgClass = new MessageClass();

     
     
    msgClass.execute(totReg,totAccr,totCast,totRej,totVal,Message, Spanner1,Spanner2,Spanner3,Spanner4,Spanner5,Spanner6);


/* second  Asynm ***************** */





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
					HttpURL);

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
						VotersRegistration.this,
						"Pending upload successful",
						Toast.LENGTH_LONG
				).show();

				Log.e("OFFLINE_UPLOAD",
						"Pending upload cleared");
			}
		}
	}
}

		   
		   
		   
		   
		   
		   
		   
		   
public void CheckEditTextIsEmptyOrNot(){



	TotalRegHolder = ed6.getText().toString();

	TotalAccrediteddHolder = ed2.getText().toString();
	TotalCastHolder = ed3.getText().toString();
	TotalRejectedHolder = ed4.getText().toString();
	TotalValidHolder = ed5.getText().toString();






  // if( TextUtils.isEmpty(TotalCastHolder)  || TextUtils.isEmpty(TotalRejectedHolder) || TextUtils.isEmpty(TotalValidHolder))
	if( TotalCastHolder.length()  ==0 || TotalRejectedHolder.length()  ==0|| TotalValidHolder.length()  ==0)

	{
        CheckEditText = false;
    }
    else {
        ValidateVote results = new ValidateVote();


        results.setValidateVote(TotalRegHolder,TotalAccrediteddHolder,TotalCastHolder, TotalRejectedHolder, TotalValidHolder);


        castVote = results.getVoteCast();


        validVote = results.getVoteValid();



		totalAccre=results.getTotalAccredition();
		totalRegs=results.getTotalReg();

    }



    //if(TextUtils.isEmpty(TotalRegHolder) || TextUtils.isEmpty(TotalAccrediteddHolder)  || TextUtils.isEmpty(TotalCastHolder)  || TextUtils.isEmpty(TotalRejectedHolder) || TextUtils.isEmpty(TotalValidHolder) || castVote==false  || validVote == false )
	if(TotalRegHolder.length()  ==0 || TotalAccrediteddHolder.length()  ==0  || TotalCastHolder.length()  ==0  || TotalRejectedHolder.length()  ==0 || TotalValidHolder.length()  ==0 || totalRegs==false || totalAccre==false || castVote==false  || validVote == false )

	{

          CheckEditText = false;

      }
      else {

          CheckEditText = true ;
      }

  }





	private boolean checkAndRequestPermissions() {

		try{

			List<String> listPermissionsNeeded = new ArrayList<>();


			for(String perm:appPermissions)
			{

				if(ContextCompat.checkSelfPermission(this,perm) != PackageManager.PERMISSION_GRANTED)

				{
					listPermissionsNeeded.add(perm);

				}
			}


			if (!listPermissionsNeeded.isEmpty()) {

				ActivityCompat.requestPermissions(this,


						listPermissionsNeeded.toArray(new String[listPermissionsNeeded.size()]), MY_PERMISSIONS_REQUEST_CAMERA);


				// requestPermissions(new String[] {Manifest.permission.CAMERA},MY_PERMISSIONS_REQUEST_CAMERA);


				return false;
			}





		}catch (Exception e){
			e.printStackTrace();
		}

		return true;
	}
		   
		    

		     
	}
