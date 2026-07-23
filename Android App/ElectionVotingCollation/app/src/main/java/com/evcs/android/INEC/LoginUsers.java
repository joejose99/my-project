package com.eciels.android.INEC;




import android.app.ProgressDialog;
//import android.support.v7.app.AppCompatActivity;
import android.graphics.Color;
import android.os.Process;
import android.provider.Settings;
import android.text.TextUtils;

import org.json.JSONObject;

import android.content.pm.PackageManager ;
import android.Manifest;
import androidx.annotation.NonNull;

import android.annotation.SuppressLint;
import android.content.Context;
 import android.os.Build;
import androidx.annotation.RequiresApi;


import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.AsyncTask;

import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.ActivityCompat;
import androidx.core.content.ContextCompat;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.telephony.TelephonyManager;
import android.util.Log;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.view.inputmethod.InputMethodManager;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.messaging.FirebaseMessaging;

import java.util.ArrayList;
import java.util.List;
import java.util.Objects;


//import android.support.v7.app.AppCompatActivity;


public class LoginUsers extends AppCompatActivity {


	 String UserNameHolder, LoginPasswordHolder, IMEIHolder, MessageResp;
	Boolean CheckEditText ;
    ProgressDialog progressDialog;
    String finalResult ,rst;

    String MobileNo =null;

	private static final int MY_PERMISSIONS_REQUEST_CAMERA = 1;

	private String tokenNo;

   //String HttpURL = "https://evcs.ng/exam/appLogin";
    // String HttpURL="https://www.evcs.ng/project/loginApp.php";

	String HttpURL="https://evcs.ng/project/loginApp.php";


    //String HttpURL = "http://www.dealsforyourtrip.com/app/index.php";


     //HashMap<String,String> hashMap = new HashMap();

     //HashMap<String,String> hashMap = new HashMap<>();



      HttpParse httpParse = new HttpParse();

	DBHelper  mydb = new DBHelper(this);


     public static final String UserEmail = "";

	 String deviceUniqueIdentifier = null;

	     String IMEI=deviceUniqueIdentifier;
	    // JSON Node names
	    private static final String TAG_SUCCESS = "success";
	private static final int MY_PERMISSIONS_REQUEST_READ_PHONE_STATE = 0;

	Button b1,b2,b3;
	   EditText ed1,ed2,UserName,Password;

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



	@SuppressLint("MissingPermission")

	@RequiresApi(api = Build.VERSION_CODES.O)
	@Override

	   protected void onCreate(Bundle savedInstanceState) {
	      super.onCreate(savedInstanceState);

try{
	      setContentView(R.layout.activity_user_login);


		Window window = getWindow();

		/* Change status bar color to the black */
		if(true){
			View view =getWindow().getDecorView() ;
			view.setSystemUiVisibility(view.getSystemUiVisibility() | view.SYSTEM_UI_FLAG_LIGHT_STATUS_BAR);
		}else{
			View view =getWindow().getDecorView() ;
			view.setSystemUiVisibility(view.getSystemUiVisibility() & ~view.SYSTEM_UI_FLAG_LIGHT_STATUS_BAR);
		}

		/* Change status bar background color to white */
		window.clearFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN);

		window.addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS);

		int colorCodeLight = Color.parseColor("#8ADC76");
		window.setStatusBarColor(colorCodeLight);


	      b1 = (Button)findViewById(R.id.button);
	      b2 = (Button)findViewById(R.id.butFog);

		   b3 = (Button)findViewById(R.id.butReg);


	      ed1 = (EditText)findViewById(R.id.txtName);
	      ed2 = (EditText)findViewById(R.id.txtPassword);

	      UserName = (EditText)findViewById(R.id.txtName);
	      Password = (EditText)findViewById(R.id.txtPassword);
		getToken_subscrib();

           //loadIMEI();


          // getDeviceIMEI();

	      b1.setOnClickListener(new View.OnClickListener() {
	         @Override
	         public void onClick(View v) {



	        	 CheckEditTextIsEmptyOrNot();

	        	 if(CheckEditText){


	        		 UserLoginPage(UserNameHolder,LoginPasswordHolder,IMEIHolder);


	                }
	                else {

	                    // If EditText is empty then this block will execute .
	                    Toast.makeText(LoginUsers.this, "Please fill all form fields.", Toast.LENGTH_LONG).show();

	                }


	        	 //haveNetworkConnection();
	         }
	      });



	      b2.setOnClickListener(new View.OnClickListener() {
		         @Override
		         public void onClick(View arg0)
		         {
					 Intent intent1 = new Intent(LoginUsers.this, ForgottenEmail.class);



					 startActivity(intent1);
					 finish();
		         }
		         });





		   b3.setOnClickListener(new View.OnClickListener() {
			   @Override
			   public void onClick(View arg0)
			   {
				   Intent intent1 = new Intent(LoginUsers.this, NameActivity.class);



				   startActivity(intent1);
                   finish();

			   }
		   });


	      /* HIDDEN KEYBOARD  WHEN TOUCH BODY */
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


		NetworkUtil.checkNetworkInfo(this, new NetworkUtil.OnConnectionStatusChange() {
			@Override
			public void onChange(boolean type) {

				if(type){
					//Toast.makeText(MenuActivity.this, "Connection Available", Toast.LENGTH_SHORT).show();
				}else {
					//Toast.makeText(MenuActivity.this, "NO Connection", Toast.LENGTH_SHORT).show();
					androidx.appcompat.app.AlertDialog.Builder builder = new androidx.appcompat.app.AlertDialog.Builder(LoginUsers.this);
					builder.setTitle("Network Error")

							.setMessage("Check your Internet Connection")
							.setPositiveButton("ok",null).create().show();

					//but.setBackgroundResource(R.drawable.ic_baseline_person_pin_circle_24);

				}

			}
		});


	if(checkAndRequestPermissions()) {
		IMEIHolder = getDeviceIMEI();
	}

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



	   private boolean haveNetworkConnection() {
		    boolean haveConnectedWifi = false;
		    boolean haveConnectedMobile = false;

		    ConnectivityManager cm = (ConnectivityManager) getSystemService(Context.CONNECTIVITY_SERVICE);
		    @SuppressWarnings("deprecation")
			NetworkInfo[] netInfo = cm.getAllNetworkInfo();
		    for (NetworkInfo ni : netInfo) {
		        if (ni.getTypeName().equalsIgnoreCase("WIFI"))
		            if (ni.isConnected())
		                haveConnectedWifi = true;
		        if (ni.getTypeName().equalsIgnoreCase("MOBILE"))
		            if (ni.isConnected())
		                haveConnectedMobile = true;
		    }
		    return haveConnectedWifi || haveConnectedMobile;
		}



	   /*CALLING METHOD THAT HELP TO HIDE KEYBOARD  WHEN TOUCH BODY */
	   public void hideKeyboard(View view) {
	        InputMethodManager inputMethodManager =(InputMethodManager)getSystemService(Activity.INPUT_METHOD_SERVICE);
	        inputMethodManager.hideSoftInputFromWindow(view.getWindowToken(), 0);


		}

		/*
public void checkVersion() {

	if (android.os.Build.VERSION.SDK_INT >= 26)
	{
		loadIMEI();
	}

	else {
		getDeviceIMEI();
	}
} */



	/* GETTING DEVICE IMEI NO */
	/*
	@RequiresApi(api = Build.VERSION_CODES.O)
	 public String getDeviceIMEI() {
		deviceUniqueIdentifier = null;
		TelephonyManager tm = (TelephonyManager) this.getSystemService(Context.TELEPHONY_SERVICE);
		if (null != tm) {
			deviceUniqueIdentifier = tm.getDeviceId();
		}
		if (null == deviceUniqueIdentifier || 0 == deviceUniqueIdentifier.length()) {
			deviceUniqueIdentifier = Settings.Secure.getString(this.getContentResolver(), Settings.Secure.ANDROID_ID);
		}
		return deviceUniqueIdentifier;
	} */

/*
    @RequiresApi(api = Build.VERSION_CODES.O)
    public String getDeviceIMEI() {
        String IMEINumber = "";
        if (ActivityCompat.checkSelfPermission(this, android.Manifest.permission.READ_PHONE_STATE) == PackageManager.PERMISSION_GRANTED) {
            TelephonyManager telephonyMgr = (TelephonyManager) getSystemService(TELEPHONY_SERVICE);
            if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.O) {
                deviceUniqueIdentifier = telephonyMgr.getImei();
            } else {
                deviceUniqueIdentifier = telephonyMgr.getDeviceId();
            }
        }
        return deviceUniqueIdentifier;
    } */






    /* START ANDROID VERSION 6 AND ABOVE  CHECK HERE  */


    /* END ANDROID VERSION 6 AND ABOVE HERE */

/*
public void  getPhoneState(){
	if (ActivityCompat.checkSelfPermission(this, Manifest.permission.READ_PHONE_STATE)) {

		getDeviceIMEI();
	}
	else {
				ActivityCompat.requestPermissions(this, new String[]{Manifest.permission.READ_PHONE_STATE},
						MY_PERMISSIONS_REQUEST_READ_PHONE_STATE);
			}
		}

 */





	/*
    @Override
	protected void onSaveInstanceState(Bundle outState) {
		super.onSaveInstanceState(outState);

		//outState.putString("User_NameHolder", UserNameHolder);
		//putParcelable
		 outState.putString("User_NameHolder", ed1.getText().toString());
		 outState.putString("Login_PasswordHolder", ed2.getText().toString());
		outState.putString("IMEI_Holder", IMEIHolder);

        outState.putString("device_UniqueIdentifier", deviceUniqueIdentifier);

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



			 UserNameHolder = savedInstanceState.getString("User_NameHolder");
			 LoginPasswordHolder = savedInstanceState.getString("Login_PasswordHolder");

            IMEIHolder = savedInstanceState.getString("IMEI_Holder");

            deviceUniqueIdentifier= savedInstanceState.getString("device_UniqueIdentifier");

			 ed1.setText(UserNameHolder);
			 ed2.setText(LoginPasswordHolder);







		}
	}

*/






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


						listPermissionsNeeded.toArray(new String[listPermissionsNeeded.size()]), MY_PERMISSIONS_REQUEST_READ_PHONE_STATE);


				// requestPermissions(new String[] {Manifest.permission.CAMERA},MY_PERMISSIONS_REQUEST_CAMERA);


				return true;
			}





		}catch (Exception e){
			e.printStackTrace();
		}

		return true;
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









	public void UserLoginPage(final String UserName, final String Password, final String IMEI){

	        class LoginClass extends AsyncTask<String,Void,String> {

	            @Override
	            protected void onPreExecute() {
	                super.onPreExecute();

	               // progressDialog = ProgressDialog.show(LoginUsers.this,"Login ....",null,true,true);
	                progressDialog =ProgressDialog.show(LoginUsers.this,"Login", "Please wait...",false,false);
					//progressDialog = ProgressDialog.show(UserReg.this,"Sending ....",null,true,true);
	            }

	            @Override
	            protected void onPostExecute(String httpResponseMsg) {

	                super.onPostExecute(httpResponseMsg);
try{
	                progressDialog.dismiss();

	                //Toast.makeText(LoginUsers.this,httpResponseMsg.toString(), Toast.LENGTH_LONG).show();

	                MessageResp = httpResponseMsg.replaceAll("^\"|\"$", "");
	                
	                httpResponseMsg=MessageResp;
	                /*
	                if(httpResponseMsg.trim().equalsIgnoreCase("Success")){

	                    finish();


	                Intent intent = new Intent(LoginUsers.this, Menu_app_election.class);

						IMEIHolder = deviceUniqueIdentifier.toString();
						intent.putExtra("IMEIHolder",IMEIHolder);

	                    startActivity(intent);
	                    
	                    //Log.w("myApp", "There's network");
                        finish();
	                }

	                 */

					Log.e("line ",httpResponseMsg.toString());

					// Toast.makeText(UserLogin.this,httpResponseMsg.toString(), Toast.LENGTH_LONG).show();

					// MessageResp = httpResponseMsg.replaceAll("^\"|\"$", "");
					String[] strsplit=httpResponseMsg.split("_");
					httpResponseMsg =strsplit[0];

					MessageResp = httpResponseMsg.toString().replaceAll("\"","");

					String userid = strsplit[16].toString().replaceAll("\"","");

					String referrals = strsplit[17].toString().replaceAll("\"","");
					httpResponseMsg=MessageResp;

					if(httpResponseMsg.trim().equalsIgnoreCase("Success")){

						UserNameHolder = ed1.getText().toString();
						LoginPasswordHolder = ed2.getText().toString();

						// Log.w("myApp", "no networks");
						mydb = new DBHelper(getBaseContext());

						mydb.deleteAll_loginusers();
						mydb.insert_loginusers(UserNameHolder,userid);


						mydb.deleteAll_users();


						String str2 ="\"Success\"";
/*,strsplit[10],strsplit[11],strsplit[12]
this are member_status,bus_stop,birthday,profession and church_unit
 */

						if(mydb.insert_users(strsplit[1],strsplit[2],strsplit[3], strsplit[4] , strsplit[5],strsplit[6] ,strsplit[7], strsplit[8],strsplit[9],strsplit[10],strsplit[11],strsplit[12],strsplit[13],strsplit[14],strsplit[15],referrals )){

							// Toast.makeText(getApplicationContext(), "Data Saved", Toast.LENGTH_SHORT).show();
							Log.e("Successful: ",strsplit[1].toString());


						}



						Intent intent = new Intent(LoginUsers.this,Menu_app_election.class);

						//IMEIHolder = deviceUniqueIdentifier.toString();
						intent.putExtra("IMEIHolder",IMEIHolder);
						;
						startActivity(intent);


						finish();
					}
	                else{

	                    Toast.makeText(LoginUsers.this,httpResponseMsg,Toast.LENGTH_LONG).show();
	                   // Log.w("myApp", "no networks");
	                    
	                    Log.w("Message", httpResponseMsg);
	                    
	                }

}catch(IndexOutOfBoundsException e){
	e.printStackTrace();
}
catch(Exception e){
	e.printStackTrace();
}
	                
	            }

	            @Override
	            protected String doInBackground(String... params) {

	            	 try {
	            		 
	            	 /*
	            	hashMap.put("UserName",params[0]);

	                hashMap.put("Password",params[1]);

	                hashMap.put("IMEI",params[2]);

	               */
	                 
	                 
	                 
	                 JSONObject postDataParams = new JSONObject();

						// postDataParams.put("UserName", ed1.getText().toString());
						 //postDataParams.put("Password", ed2.getText().toString());

	                 postDataParams.put("UserName", params[0]);
	                 postDataParams.put("Password", params[1]);
	                 postDataParams.put("IMEI", params[2]);
						 postDataParams.put("token", getToken());
	                 
	                 Log.e("params",postDataParams.toString());
	                 
	                 finalResult = httpParse.postRequest(postDataParams, HttpURL);
	                 
	                 
	            	 } catch (Exception e) {
	                     e.printStackTrace();
	                 } 
	                
	               

	                return finalResult;
	            }
	        }

	        LoginClass logClass = new LoginClass();

	        logClass.execute(UserName,Password,IMEI);
	    }


	    public void CheckEditTextIsEmptyOrNot(){
	    	
          // ed1.setText("pdp@gmail.com");
           //ed2.setText("pdpPDP");

			ed1.getText();

			ed2.getText();
           
	        UserNameHolder = ed1.getText().toString();
	        LoginPasswordHolder = ed2.getText().toString();
	        //IMEIHolder = deviceUniqueIdentifier.toString();

				//IMEIHolder=getDeviceIMEI();

			if(checkAndRequestPermissions()) {
				IMEIHolder = getDeviceIMEI();
			}


Log.i("data","**************** "+IMEIHolder);

			if(TextUtils.isEmpty(UserNameHolder) || TextUtils.isEmpty(LoginPasswordHolder) || TextUtils.isEmpty(IMEIHolder))
	        {

	            CheckEditText = false;

	        }
	        else {

	            CheckEditText = true ;
	        }

	    }

	private  void getToken_subscrib(){

		try{





			FirebaseMessaging.getInstance().subscribeToTopic("Activity")
					.addOnCompleteListener(new OnCompleteListener<Void>() {
						@Override
						public void onComplete(@NonNull Task<Void> task) {
							String msg = getString(R.string.msg_subscribed);
							if (!task.isSuccessful()) {
								msg = getString(R.string.msg_subscribe_failed);
							}
							//Log.d(TAG, msg);
							//Toast.makeText(UserLogin.this, msg, Toast.LENGTH_SHORT).show();
						}
					});


			getFirebaseMessagingToken();

		}
		catch(Error e){
			Log.e("","Error on Firebase Messaing Serivece "+Log.getStackTraceString(e));
		}
	}



	public void getFirebaseMessagingToken(){
		FirebaseMessaging.getInstance().getToken().addOnCompleteListener(task ->{
			if(!task.isSuccessful()){
				return;
			}
			if( null != task.getResult()){
				tokenNo= Objects.requireNonNull(task.getResult());

				setToken(tokenNo);
				Log.e("Token","******* Token No "+tokenNo);

			}
		});
	}

	private void setToken(String tok){
		tokenNo=tok;
	}

	private String getToken(){
		return tokenNo;
	}

}



 

 





