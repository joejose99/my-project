package com.eciels.android.INEC;
 
  


import android.annotation.SuppressLint;
import android.graphics.Matrix;
import android.media.ExifInterface;
import android.os.Build;

import androidx.annotation.RequiresApi;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.ActivityCompat;

import android.os.Environment;
import java.util.Locale;
import java.text.*;
import java.util.Date;
import androidx.core.content.FileProvider;

//import android.support.v7.app.AppCompatActivity;
 import android.content.Context;
import android.content.Intent;
import android.content.pm.PackageManager;

import android.app.Activity;
import android.Manifest;
import android.provider.Settings;
import android.telephony.TelephonyManager;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.Spinner;
import android.widget.Toast;

import java.net.HttpURLConnection;
import java.net.URL;

import androidx.core.content.ContextCompat;
//import androidx.multidex.BuildConfig;


//import java.net.HttpURLConnction;
 import android.graphics.Bitmap;
import android.os.Bundle;
import android.view.View;
import android.view.inputmethod.InputMethodManager;
import android.app.ProgressDialog;
import android.os.AsyncTask;
import android.widget.AdapterView.OnItemSelectedListener;
import android.net.Uri;


import java.io.File;
import java.io.InputStreamReader;
import java.io.OutputStream;

import javax.net.ssl.HttpsURLConnection;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedWriter;
import java.util.ArrayList;
import java.util.List;
import java.util.Map;
import java.io.ByteArrayOutputStream;
import java.io.IOException;
import java.util.HashMap;
import java.io.OutputStreamWriter;
//import java.net.URL;

import android.provider.MediaStore;

import java.io.BufferedReader;
import java.net.URLEncoder;
import java.io.UnsupportedEncodingException;

import android.util.Base64;
import android.util.Log;

import android.graphics.BitmapFactory;


import android.content.SharedPreferences;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;


//import com.eciels.android.INEC.BuildConfig;

   	  public class CameraCapture extends AppCompatActivity implements
   	OnItemSelectedListener {



          public static final String UPLOAD_URL = "https://evcs.ng/project/imageUpload.php";
          public static final String UPLOAD_KEY = "image";


          String deviceUniqueIdentifier = null;
          String HttpURL = "https://evcs.ng/project/sendResult.php";

          String HttpURL_LGA = "https://evcs.ng/project/populateSpinner.php";

          String HttpURL_WARDS = "https://evcs.ng/project/populateSpinnerWards.php";

          String HttpURL_POLUNIT = "https://evcs.ng/project/populateSpinnerPolUnit.php";

          String encodedImage;
          String imageFilePath ="";


          String imageFileName;

          HttpParse httpParse = new HttpParse();

          Button CaptureImageFromCamera, UploadImageToServer, butCancel;

          ImageView ImageViewHolder;

         private int targetW = 0;
          private int targetH = 0;

          //EditText imageName;

          ProgressDialog progressDialog;

          Intent intent;

          public static final int RequestPermissionCode = 1;

          private static final int MY_CAMERA_REQUEST_CODE = 100;

          private static final int REQUEST_CAPTURE_IMAGE = 7;

          public static final int MEDIA_TYPE_PICTURE = 7;

          private static final int MY_PERMISSIONS_REQUEST_ACCOUNTS = 101;
          private static final int MY_PERMISSIONS_REQUEST_CAMERA = 100;

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


          String spannerHolder, spanner1Holder, spanner2Holder, spanner3Holder, spanner4Holder, spanner5Holder, spanner6Holder, IMEIHolder;

          String txtSpanner1, txtSpanner3, txtSpanner2, txtSpanner4, txtSpanner5, txtSpanner6, txtSpinnerPop, txtSpinnerPop3, txtSpinnerPop4;

          private Spinner spinner2, spinner1, spinner6, spinner3, spinner4, spinner5;


          Boolean CheckEditText;

          ArrayAdapter adapter;


          //private static final String PHOTOS = "photos";

          private ImageView imageView;


          File mediaFile;
          File mediaFilePath;
          private String selectedPath;
          static String strFileName = "";

          static String strSDCardPathName = Environment.getExternalStorageDirectory() + "/temp_Image" + "/";


          private Uri fileUri;

          public static final int MEDIA_TYPE_VIDEO = 2;



          String finalResult, rst, result;
          private Uri filePath;

ImageView imageView1;
          Bitmap bitmap;
          Bitmap scaled_bitmap;
          boolean check = true;

          String GetImageNameFromEditText;

          String ImageNameFieldOnServer = "image_name";

          String ImagePathFieldOnServer = "image";

          String ImageUploadPathOnSever = "https://www.evcs.ng/project/imageUpload.php";

          Uri uri;




          File photoFile = null;
          static final int CAPTURE_IMAGE_REQUEST = 7;


          String mCurrentPhotoPath;
          private static final String IMAGE_DIRECTORY_NAME = "PDP";



          private   String ConvertImage;

          @SuppressLint("MissingPermission")

          @RequiresApi(api = Build.VERSION_CODES.O)
          @Override
          protected void onCreate(Bundle savedInstanceState) {
              super.onCreate(savedInstanceState);
              try{
              setContentView(R.layout.activity_camera_capture);

                  uploadPendingData();

               CaptureImageFromCamera = (Button) findViewById(R.id.button);
              ImageViewHolder = (ImageView) findViewById(R.id.imageView2);
              UploadImageToServer = (Button) findViewById(R.id.button2);


//imageView1= (ImageView) findViewById(R.id.imageView1);
              butCancel = (Button) findViewById(R.id.btnBack);



              Intent intent2 = getIntent();
              IMEIHolder = intent2.getStringExtra("IMEIHolder");
              deviceUniqueIdentifier = intent2.getStringExtra("IMEIHolder");



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



















              CaptureImageFromCamera.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                intent = new Intent(android.provider.MediaStore.ACTION_IMAGE_CAPTURE);
                if (intent.resolveActivity(getPackageManager()) != null) {


                    if (Build.VERSION.SDK_INT >= 23) {

                        //if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.LOLLIPOP) {
                        if (checkAndRequestPermissions()) {
                            captureImage();
                        }
                    } else {
                        captureImage2();
                    }


                    //openCameraIntent();


                }

            }
        });


        butCancel.setOnClickListener(new View.OnClickListener() {
	        @Override
	        public void onClick(View v) {
	       	 
	       	 
	       	 
	               
	                finish();

	                 Intent intent = new Intent(CameraCapture.this, Menu_app_election.class);

                intent.putExtra("IMEIHolder",IMEIHolder);
	                    startActivity(intent);
	       	 
	        }
		
	        });
        
        
        
        UploadImageToServer.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                //GetImageNameFromEditText = imageName.getText().toString();
            	
            	
            	CheckEditTextIsEmptyOrNot();
		    	 if(CheckEditText){
		    		 
		    		 ImageUploadToServerFunction();
		    	 }
		    	 else {

			           // If EditText is empty then this block will execute .
			           Toast.makeText(CameraCapture.this, "Please fill all form fields.", Toast.LENGTH_LONG).show();
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









          /* Capture Image function for 4.4.4 and lower. Not tested for Android Version 3 and 2 */
          private void captureImage2() {

              try {
                  Intent cameraIntent = new Intent(android.provider.MediaStore.ACTION_IMAGE_CAPTURE);
                  photoFile = createImageFile4();
                  if(photoFile!=null)
                  {

                       Uri photoURI  = Uri.fromFile(photoFile);

                      cameraIntent.putExtra(MediaStore.EXTRA_OUTPUT, photoURI);
                      startActivityForResult(cameraIntent, CAPTURE_IMAGE_REQUEST);
                  }
              }
              catch (Exception e)
              {
                  displayMessage(getBaseContext(),"Camera is not available."+e.toString());
              }
          }






          private void captureImage()
          {


                  Intent takePictureIntent = new Intent(MediaStore.ACTION_IMAGE_CAPTURE);
                  if (takePictureIntent.resolveActivity(this.getPackageManager()) != null) {

                      // Create the File where the photo should go
                      try {





                         photoFile = createImageFile4();


                          if (photoFile != null) {

                              Uri photoURI = FileProvider.getUriForFile(
                                      CameraCapture.this,
                                      "com.eciels.android.INEC.provider",
                                      photoFile);

                                //Uri photoURI = FileProvider.getUriForFile(CameraCapture.this, BuildConfig.APPLICATION_ID + ".provider",photoFile);

                              takePictureIntent.putExtra(MediaStore.EXTRA_OUTPUT, photoURI);
                              startActivityForResult(takePictureIntent, CAPTURE_IMAGE_REQUEST);




                              //Log.i("Mayank",photoFile.getAbsolutePath());
                          }
                      } catch (Exception ex) {
                          // Error occurred while creating the File
                          displayMessage(getBaseContext(),ex.getMessage().toString());
                      }


                  }else
                  {
                      displayMessage(getBaseContext(),"Nullll");
                  }
              }













          private File createImageFile4()
          {



              File mediaStorageDir = new File(Environment.getExternalStoragePublicDirectory(Environment.DIRECTORY_PICTURES),"");


              Log.e("Level" , "-----" + "Leve 7A");
              String timeStamp = new SimpleDateFormat("yyyyMMdd_HHmmss",
                      Locale.getDefault()).format(new Date());


              String filenames="IMG_" + timeStamp + ".jpg";



              File mediaFile = new File(mediaStorageDir.getPath() + File.separator
                      + filenames);

              Log.e("Level" , "-----" + "Leve 7B");
              return mediaFile;




          }

          private File createImageFile() throws IOException {
              // Create an image file name
              String timeStamp = new SimpleDateFormat("yyyyMMdd_HHmmss").format(new Date());
              String imageFileName = "JPEG_" + timeStamp + "_";
              File storageDir = getExternalFilesDir(Environment.DIRECTORY_PICTURES);
             // String strSDCardPathName = Environment.getExternalStorageDirectory() + "/temp_Image" + "/";
              File image = File.createTempFile(
                      imageFileName,  /* prefix */
                      ".jpg",         /* suffix */
                      storageDir      /* directory */
              );

              // Save a file: path for use with ACTION_VIEW intents

              mCurrentPhotoPath = image.getAbsolutePath();
              return image;
          }


          public static Bitmap rotate(Bitmap bitmap, int degree) {
              int w = bitmap.getWidth();
              int h = bitmap.getHeight();

              Matrix mtx = new Matrix();
              //       mtx.postRotate(degree);
              mtx.setRotate(degree);

              return Bitmap.createBitmap(bitmap, 0, 0, w, h, mtx, true);
          }


          private void displayMessage(Context context, String message)
          {
              Toast.makeText(context,message,Toast.LENGTH_LONG).show();
          }








          protected void onSaveInstanceState(Bundle outState) {
          super.onSaveInstanceState(outState);


          outState.putParcelable("file_uri", uri);
      }
	  
	    @Override
	    protected void onRestoreInstanceState(Bundle savedInstanceState) {
	        super.onRestoreInstanceState(savedInstanceState);
	  
	        if(savedInstanceState != null)
	        {
	        // get the file url
	        	uri = savedInstanceState.getParcelable("file_uri");
	        
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
                          getSharedPreferences("Capture_PENDING_UPLOADS", MODE_PRIVATE);

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
                      getSharedPreferences("Capture_PENDING_UPLOADS", MODE_PRIVATE);

              return prefs.getString("UPLOAD_DATA", null);
          }

          private void clearPendingUpload() {

              SharedPreferences prefs =
                      getSharedPreferences("Capture_PENDING_UPLOADS", MODE_PRIVATE);

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


              new CameraCapture.RetryUploadTask().execute(jsonData);
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















          public static int calculateInSampleSize(
                  BitmapFactory.Options options, int reqWidth, int reqHeight) {
              // Raw height and width of image
              final int height = options.outHeight;
              final int width = options.outWidth;
              int inSampleSize = 1;

              if (height > reqHeight || width > reqWidth) {

                  final int halfHeight = height / 2;
                  final int halfWidth = width / 2;

                  // Calculate the largest inSampleSize value that is a power of 2 and keeps both
                  // height and width larger than the requested height and width.
                  while ((halfHeight / inSampleSize) >= reqHeight
                          && (halfWidth / inSampleSize) >= reqWidth) {
                      inSampleSize *= 2;
                  }
              }

              return inSampleSize;
          }

          /* END OF IMAGE RESIZE CODE *****************/



          /*CALLING METHOD THAT HELP TO HIDE KEYBOARD  WHEN TOUCH BODY */





          @Override
	// Star activity for result method to Set captured image on image view after click.
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {

        super.onActivityResult(requestCode, resultCode, data);

              String rstCode =  Integer.toString(resultCode);


              if (requestCode == CAPTURE_IMAGE_REQUEST && resultCode == RESULT_OK) {


                  final BitmapFactory.Options options = new BitmapFactory.Options();
                  options.inJustDecodeBounds = true;

                  Log.e("msg", "level 22B of code" +rstCode);
                  //BitmapFactory.decodeResource(res, resId, options);
                  BitmapFactory.decodeFile(photoFile.getAbsolutePath(), options);





                  if (Build.VERSION.SDK_INT >= 21) {
                      targetW = 300;
                      targetH = 400;
                  }
                  else{
                      targetW = 300;
                      targetH = 300;
                  }

                  options.inSampleSize = calculateInSampleSize(options, targetW, targetH);
                  options.inJustDecodeBounds = false;

                  /* NEW CODE */

                  Bitmap bitmap = BitmapFactory.decodeFile(photoFile.getAbsolutePath(), options);















                  try
                  {


                      ExifInterface exif=new ExifInterface(photoFile.getAbsolutePath());


                      int rotate = 0;
                      //ExifInterface exif;
                      //exif = new ExifInterface(path);
                      int orientation = exif.getAttributeInt(ExifInterface.TAG_ORIENTATION,
                              ExifInterface.ORIENTATION_NORMAL);
                      switch (orientation) {
                          case ExifInterface.ORIENTATION_ROTATE_270:
                              rotate = 270;
                              Log.i("Rotate","I in 270 Degree ************");
                              break;
                          case ExifInterface.ORIENTATION_ROTATE_180:
                              rotate = 180;
                              Log.i("Rotate","I in 180 Degree *******");
                              break;
                          case ExifInterface.ORIENTATION_ROTATE_90:
                              rotate = 90;
                              Log.i("Rotate","I in 90 Degree ***********");
                              break;
                      }
                      Matrix matrix = new Matrix();
                      matrix.postRotate(rotate);

                      bitmap=  Bitmap.createBitmap(bitmap, 0, 0, bitmap.getWidth(),
                              bitmap.getHeight(), matrix, true);
                      scaled_bitmap =bitmap;



                  }catch(NullPointerException e){
                      e.printStackTrace();
                  }
                  catch(ArrayIndexOutOfBoundsException e){
                      e.printStackTrace();
                  }
                  catch(IOException e){
                      Log.e("Error", e.getLocalizedMessage());
                  }



                  ImageViewHolder.setImageBitmap(bitmap);


                  // ImageViewHolder.setRotation(90);


              }


              else
              {
                  // getBaseContext()
                  //displayMessage(this.getBaseContext(),"Request cancelled or something went wrong.");
                  displayMessage(getBaseContext(),"Request cancelled or something went wrong");
                  photoFile=null;
              }


          }
          /* NEW IMAGE RESIZE CONDE *************/

    // Requesting runtime permission to access camera.







          private boolean checkAndRequestPermissions() {

              if (ContextCompat.checkSelfPermission(
                      this,
                      Manifest.permission.CAMERA)
                      != PackageManager.PERMISSION_GRANTED) {

                  ActivityCompat.requestPermissions(
                          this,
                          new String[]{Manifest.permission.CAMERA},
                          MY_PERMISSIONS_REQUEST_CAMERA);

                  return false;
              }

              return true;
          }



@Override
public void onRequestPermissionsResult(int requestCode,
                                       String[] permissions,
                                       int[] grantResults) {
    super.onRequestPermissionsResult(requestCode, permissions, grantResults);

    if (requestCode == MY_PERMISSIONS_REQUEST_CAMERA) {

        if (grantResults.length > 0
                && grantResults[0] == PackageManager.PERMISSION_GRANTED) {

            captureImage();

        } else {

            Toast.makeText(this,
                    "Camera permission denied",
                    Toast.LENGTH_LONG).show();
        }
    }
}















    
    
   

   
    
    
   

    
    
    // Upload captured image online on server function.
    public void ImageUploadToServerFunction(){





        ByteArrayOutputStream byteArrayOutputStreamObject ;

        byteArrayOutputStreamObject = new ByteArrayOutputStream();

        // Converting bitmap image to jpeg format, so by default image will upload in jpeg format.
        scaled_bitmap.compress(Bitmap.CompressFormat.JPEG, 100, byteArrayOutputStreamObject);

        byte[] byteArrayVar = byteArrayOutputStreamObject.toByteArray();

        // String ConvertImage = Base64.encodeToString(byteArrayVar, Base64.DEFAULT);
        ConvertImage = Base64.encodeToString(byteArrayVar, Base64.DEFAULT);

        //Log.e("String Image conv", "-----" + ConvertImage);




          class AsyncTaskUploadClass extends AsyncTask<Void,Void,String> {

        	 @Override
	            protected void onPreExecute() {
	                super.onPreExecute();

                // Showing progress dialog at image upload time.
                progressDialog = ProgressDialog.show(CameraCapture.this,"Uploading File", "Please wait...",false,false);
                 
            
            }

            @Override
            protected void onPostExecute(String string1) {

                super.onPostExecute(string1);

                // Dismiss the progress dialog after done uploading.
                progressDialog.dismiss();

                String	MessageResp = string1.replaceAll("^\"|\"$", "");

                string1 = MessageResp.toString().replaceAll("\"","");
                // Printing uploading success message coming from server on android app.
                Toast.makeText(CameraCapture.this,string1,Toast.LENGTH_LONG).show();



            }

            @Override
            protected String doInBackground(Void... params) {
            	
            	try{

            		 
            		
            		 
                    
            		
            		
            		spanner2Holder =String.valueOf(spinner2.getSelectedItem());
	                spanner1Holder =String.valueOf(spinner1.getSelectedItem());
	                spanner6Holder =String.valueOf(spinner6.getSelectedItem());
	                
	                spanner3Holder =String.valueOf(spinner3.getSelectedItem());
	                spanner4Holder =String.valueOf(spinner4.getSelectedItem());
	                spanner5Holder =String.valueOf(spinner5.getSelectedItem());
            		
	                IMEIHolder =getDeviceIMEI();
            		
            	JSONObject postDataParams = new JSONObject();
                

                postDataParams.put("image_name", spanner2Holder);
                postDataParams.put("spanner1", spanner1Holder);
                postDataParams.put("spanner6", spanner6Holder);
                
                  
                postDataParams.put("spanner3", spanner3Holder);
                postDataParams.put("spanner4", spanner4Holder);
                postDataParams.put("spanner5", spanner5Holder); 
                
                postDataParams.put("fileType", "Photo");
                
                postDataParams.put("IMEI", IMEIHolder);
                    postDataParams.put("image", ConvertImage);

                    savePendingUpload(postDataParams.toString());

                //result = httpParse.postRequest(postDataParams, UPLOAD_URL);
                    if(isNetworkAvailable())
                    {
                        result =
                                httpParse.postRequest(postDataParams, UPLOAD_URL);

                    }
                    else
                    {
                        result =
                                "No Internet. Saved for upload.";
                    }


                    Log.e("params: ",result.toString());
                
            } catch (Exception e) {
                e.printStackTrace();
            } 
           return  result; 
                
            }
        }
       
        
        AsyncTaskUploadClass AsyncTaskUploadClassOBJ = new AsyncTaskUploadClass();

        AsyncTaskUploadClassOBJ.execute();
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
                                  CameraCapture.this,
                                  "Pending upload successful",
                                  Toast.LENGTH_LONG
                          ).show();

                          Log.e("OFFLINE_UPLOAD",
                                  "Pending upload cleared");
                      }
                  }
              }
          }






          public class ImageProcessClass{

        public String ImageHttpRequest(String requestURL,HashMap<String, String> PData) {

            StringBuilder stringBuilder = new StringBuilder();

            try {

                URL url;
                HttpURLConnection httpURLConnectionObject ;
                OutputStream OutPutStream;
                BufferedWriter bufferedWriterObject ;
                BufferedReader bufferedReaderObject ;
                int RC ;

                url = new URL(requestURL);

                httpURLConnectionObject = (HttpURLConnection) url.openConnection();

                httpURLConnectionObject.setReadTimeout(19000);

                httpURLConnectionObject.setConnectTimeout(19000);

                httpURLConnectionObject.setRequestMethod("POST");

                httpURLConnectionObject.setDoInput(true);

                httpURLConnectionObject.setDoOutput(true);

                OutPutStream = httpURLConnectionObject.getOutputStream();

                bufferedWriterObject = new BufferedWriter(

                        new OutputStreamWriter(OutPutStream, "UTF-8"));

                bufferedWriterObject.write(bufferedWriterDataFN(PData));

                bufferedWriterObject.flush();

                bufferedWriterObject.close();

                OutPutStream.close();

                RC = httpURLConnectionObject.getResponseCode();

                if (RC == HttpsURLConnection.HTTP_OK) {

                    bufferedReaderObject = new BufferedReader(new InputStreamReader(httpURLConnectionObject.getInputStream()));

                    stringBuilder = new StringBuilder();

                    String RC2;

                    while ((RC2 = bufferedReaderObject.readLine()) != null){

                        stringBuilder.append(RC2);
                    }
                }

            } catch (Exception e) {
                e.printStackTrace();
            }
            return stringBuilder.toString();
        }

        private String bufferedWriterDataFN(HashMap<String, String> HashMapParams) throws UnsupportedEncodingException {

            StringBuilder stringBuilderObject;

            stringBuilderObject = new StringBuilder();

            for (Map.Entry<String, String> KEY : HashMapParams.entrySet()) {

                if (check)

                    check = false;
                else
                    stringBuilderObject.append("&");

                stringBuilderObject.append(URLEncoder.encode(KEY.getKey(), "UTF-8"));

                stringBuilderObject.append("=");

                stringBuilderObject.append(URLEncoder.encode(KEY.getValue(), "UTF-8"));
            }

            return stringBuilderObject.toString();
        }

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
   	  Toast.makeText(CameraCapture.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
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
   	  Toast.makeText(CameraCapture.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
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
   	  Toast.makeText(CameraCapture.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
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

     bitmap = BitmapFactory.decodeFile(photoFile.getAbsolutePath());


     if(bitmap == null ||spanner1Holder.trim().equals(sel)  || spanner2Holder.trim().equals(sel) || spanner3Holder.trim().equals(sel) || spanner4Holder.trim().equals(sel) || spanner5Holder.trim().equals(sel) || spanner6Holder.trim().equals(sel) )
     
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






      }
 
