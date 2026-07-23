package com.shiptodoor.shiptodoor;

import android.graphics.Color;
import android.graphics.Matrix;
import android.media.ExifInterface;
import android.os.Build;
import android.os.Bundle;

import com.google.android.material.floatingactionbutton.FloatingActionButton;
import com.google.android.material.snackbar.Snackbar;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import android.text.TextUtils;
import android.view.View;

import android.os.Environment;

import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.util.Locale;
import java.text.*;
import java.util.Date;

import android.content.pm.ResolveInfo;

import android.telephony.TelephonyManager;

import android.content.Context;
import android.content.Intent;
import android.content.pm.PackageInfo;
import android.content.pm.PackageManager;


import android.app.Activity;
import android.Manifest;
import android.content.Intent;

import android.view.Menu;
import android.view.MenuItem;
import android.view.Window;
import android.view.WindowManager;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;
import android.view.inputmethod.InputMethodManager;

import java.net.HttpURLConnection;
import java.net.URL;

import android.content.ActivityNotFoundException;


import android.content.ClipData;















//import java.net.HttpURLConnction;
import android.graphics.Bitmap;
import android.os.Bundle;
import android.view.View;
import android.view.inputmethod.InputMethodManager;
import android.app.ProgressDialog;
import android.os.AsyncTask;
import android.widget.EditText;
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
import android.provider.Settings;

import java.io.BufferedReader;
import java.net.URLEncoder;
import java.io.UnsupportedEncodingException;

import android.util.Base64;
import android.util.Log;

import android.graphics.BitmapFactory;








import java.io.IOException;
import java.util.ArrayList;
import java.util.List;
import java.util.Locale;

import android.Manifest;
import android.annotation.SuppressLint;
import android.app.Activity;
import android.app.AlertDialog;
import android.content.ContentResolver;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.pm.ActivityInfo;
import android.content.pm.PackageManager;
import android.location.Address;
import android.location.Geocoder;
import android.location.Location;
import android.location.LocationListener;
import android.location.LocationManager;
import android.os.Bundle;
import android.provider.Settings;

import androidx.annotation.NonNull;
import androidx.annotation.RequiresApi;
import androidx.core.app.ActivityCompat;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.content.FileProvider;
import androidx.core.content.ContextCompat;



import android.util.Log;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.Toast;
import android.view.Menu;
import android.view.MenuInflater;


import android.view.MenuItem;

import androidx.annotation.NonNull;
import androidx.annotation.RequiresApi;
import androidx.core.app.ActivityCompat;
import androidx.appcompat.app.AppCompatActivity;
//import androidx.core.content.FileProvider;
import androidx.core.content.ContextCompat;




import android.os.Bundle;

import com.google.android.material.floatingactionbutton.FloatingActionButton;
import com.google.android.material.snackbar.Snackbar;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;
import android.app.ActionBar;

import android.view.View;

import android.content.Intent;


public class MyPhotoActivity extends AppCompatActivity {

    public static final String UPLOAD_KEY = "image";

    private ImageView imageView;


    private  String encodedImage;
    private   String imageFilePath ="";




    String imageFileName;

    HttpParse httpParse = new HttpParse();

    Button CaptureImageFromCamera, UploadImageToServer, butCancel,butLoc;

    ImageView ImageViewHolder;

    private int targetW = 0;
    private int targetH = 0;

    //EditText imageName;
    private String spannerHolder, spanner1Holder, spanner2Holder, spanner3Holder, spanner4Holder, spanner5Holder, spanner6Holder,spannerDurexHolder,spanner7Holder, spanner8Holder, spanner9Holder,panner10Holder, IMEIHolder;

    ProgressDialog progressDialog;

    Intent intent;

    public static final int RequestPermissionCode = 1;

    private static final int MY_CAMERA_REQUEST_CODE = 100;

    private static final int REQUEST_CAPTURE_IMAGE = 7;

    public static final int MEDIA_TYPE_PICTURE = 7;

    private static final int MY_PERMISSIONS_REQUEST_ACCOUNTS = 1;
    private static final int MY_PERMISSIONS_REQUEST_CAMERA = 1;





    File mediaFile;
    File mediaFilePath;
    private String selectedPath;
    static String strFileName = "";

    static String strSDCardPathName = Environment.getExternalStorageDirectory() + "/temp_Image" + "/";


    private Uri fileUri;

    public static final int MEDIA_TYPE_VIDEO = 2;



    String finalResult, rst, result;
    private Uri filePath;


    Bitmap bitmap;

    boolean check = true;

    private  String GetImageNameFromEditText;

    private String ImageNameFieldOnServer = "image_name";

    private String ImagePathFieldOnServer = "image";


    private String HttpURL = "https://www.cargoland.shiptodoor.com/cargoland/imageUpload.php";

    Uri uri;

    Button butReg;


    private ProgressBar pb =null;

    private static final String TAG = "Debug";
    private Boolean flag = false;

    File photoFile,photoFile2 = null;
    static final int CAPTURE_IMAGE_REQUEST = 7;


    private String mCurrentPhotoPath;
    private static final String IMAGE_DIRECTORY_NAME = "Cargoland";

    private Toolbar  mTopToolbar;






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

    private  String  txtDecision;
    private  int  intDecision_id=0;


    private boolean CheckEditText ;

    private RadioGroup radioStatusGroup;
    private RadioButton radioStatusButton;


    String IMEI_Number_Holder;
    TelephonyManager telephonyManager;

    DBHelper  mydb = new DBHelper(this);

    ArrayAdapter adapter;





    private  int state_pickup_id;
    private int lga_pickup_id;

    private int state_sender_id;
    private int lga_sender_id;

    Button btn_rev_price ,btn_rev_kg ,btn_rev_pickup,btn_rev_receiver,btn_rev_sender ,butBack;

    private String  price_vat_pickup_charge_delivery_charge;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        try{

        setContentView(R.layout.activity_my_photo);
        Toolbar toolbar = findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        getSupportActionBar().setDisplayShowHomeEnabled(true);
        //getSupportActionBar().setLogo(R.drawable.logo5);
        getSupportActionBar().setDisplayUseLogoEnabled(true);
        getSupportActionBar().setTitle("   Send Items");


            Window window = getWindow();

            /* Change status bar background color to white */
            window.clearFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN);

            window.addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS);

            int colorCodeLight = Color.parseColor("#ffffff");
            window.setStatusBarColor(colorCodeLight);



            CaptureImageFromCamera = (Button) findViewById(R.id.btn_camera);
        ImageViewHolder = (ImageView) findViewById(R.id.imageView2);
        UploadImageToServer = (Button) findViewById(R.id.butReg);
        butBack = (Button) findViewById(R.id.button2);

        update_Text();

        CaptureImageFromCamera.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                intent = new Intent(android.provider.MediaStore.ACTION_IMAGE_CAPTURE);
                if (intent.resolveActivity(getPackageManager()) != null) {

                    Log.e("Level" , "-----" + "Leve 1");
                    if (Build.VERSION.SDK_INT >= 23) {

                        Log.e("Level" , "-----" + "Leve 2");

                        //if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.LOLLIPOP) {
                        //if (checkAndRequestPermissions()) {
                        checkAndRequestPermissions();
                            Log.e("Level" , "-----" + "Leve 3");
                            captureImage();
                       // }
                    } else {
                        Log.e("Level" , "-----" + "Leve 4");
                        captureImage2();
                    }


                    //openCameraIntent();


                }

            }
        });


















        butBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Log.d(TAG, "Subscribing to weather topic");
                Intent intent = new Intent(MyPhotoActivity.this,SenderReview.class);


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
                intent.putExtra("spanner3Holder",spanner3Holder);


                intent.putExtra("price_vat_pickup_charge_delivery_charge",price_vat_pickup_charge_delivery_charge);


                /* pick up section */

                intent.putExtra("txtPickupFname",txtPickupFname);
                intent.putExtra("txtPickupSurname",txtPickupSurname);
                intent.putExtra("txtPickupAnswer",txtPickupAnswer);
                intent.putExtra("txtPickupAddress",txtPickupAddress);
                intent.putExtra("txtPickupCity",txtPickupCity);
                intent.putExtra("txtPickupPostCode",txtPickupPostCode);
                intent.putExtra("txtPickupCountry",txtPickupCountry);
                intent.putExtra("txtPickuplga",txtPickuplga);
                intent.putExtra("txtPickupState",txtPickupState);


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
        });





        UploadImageToServer.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                //GetImageNameFromEditText = imageName.getText().toString();
                try{
                ValidateText();


                if(CheckEditText){

                    ImageUploadToServerFunction();
                }
                else {

                    // If EditText is empty then this block will execute .
                    Toast.makeText(MyPhotoActivity.this, "Please  Photo is required.", Toast.LENGTH_LONG).show();
                }

                }catch(NullPointerException e){
                    e.printStackTrace();
                }

            }
        });



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




        /*  ******** END OF ONCREATE  *******  */




    }



    public void ValidateText(){
        if(ImageViewHolder.getDrawable() == null){
            CheckEditText=false;
        }
        else{
            CheckEditText=true;
        }
    }



/*


    public void ValidateText(){

        txt1 = ed1.getText().toString();
        String sel="Select";
        spanner3Holder =String.valueOf(spinner3.getSelectedItem());

        spanner2Holder =String.valueOf(spinner2.getSelectedItem());
        if(ImageViewHolder.getDrawable() == null){
            CheckEditText=false;
        }


        if( TextUtils.isEmpty(txt1)|| spanner3Holder.trim().equals(sel) )
        {

            CheckEditText = false;

        }

        if( TextUtils.isEmpty(txt1)|| spanner2Holder.trim().equals(sel) )
        {

            CheckEditText = false;

        }

        else{
            CheckEditText=true;
        }
    }

*/


    private void captureImage2() {

        try {
            Intent cameraIntent = new Intent(android.provider.MediaStore.ACTION_IMAGE_CAPTURE);
            photoFile = createImageFile4();
            photoFile2=photoFile;
            if(photoFile!=null)
            {
                //displayMessage(getBaseContext(),photoFile.getAbsolutePath());
                //Log.i("Mayank",photoFile.getAbsolutePath());

                Uri photoURI  = Uri.fromFile(photoFile);
                //uri  = Uri.fromFile(photoFile);
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
        Log.e("Level" , "-----" + "Leve 5A");
        //if (takePictureIntent.resolveActivity(this.getActivity().getPackageManager()) != null) {
        if (takePictureIntent.resolveActivity(this.getPackageManager()) != null) {
            // Create the File where the photo should go
            try {

                Log.e("Level" , "-----" + "Leve 5");
                photoFile = createImageFile4();

                //photoFile = createImageFile();

                // displayMessage(getBaseContext(),photoFile.getAbsolutePath());
                // Log.i("Mayank",photoFile.getAbsolutePath());
                photoFile2=photoFile;
                Log.e("Level" , "-----" + "Leve 5A");
                // Continue only if the File was successfully created
                if(photoFile != null) {

                    Log.e("Level" , "-----" + "Leve 5B");

                    // Uri photoURI = FileProvider.getUriForFile(MyPhotoActivity.this,"com.shiptodoor.shiptodoor.fileprovider",photoFile);
                    // Uri photoURI = FileProvider.getUriForFile(MyPhotoActivity.this, BuildConfig.APPLICATION_ID + ".provider",photoFile);



                    Uri photoURI  =FileProvider.getUriForFile(MyPhotoActivity.this , BuildConfig.APPLICATION_ID +".provider",photoFile);
                    // Uri photoURI  =FileProvider.getUriForFile(MyPhotoActivity.this, BuildConfig.APPLICATION_ID +".provider",photoFile);



                    takePictureIntent.putExtra(MediaStore.EXTRA_OUTPUT, photoURI);

                    startActivityForResult(takePictureIntent, CAPTURE_IMAGE_REQUEST);


                    Log.i("MyPhoto: ",photoFile.getAbsolutePath());
                }

            }catch(NullPointerException e){
                e.printStackTrace();
            }
            catch (Exception ex) {
                // Error occurred while creating the File
                //getBaseContext()
                displayMessage(getBaseContext(),ex.getMessage().toString());
            }



        }else
        {
            Log.e("Level" , "-----" + "Leve 6A");
            displayMessage(getBaseContext(),"Nullll");
        }
    }



    private File createImageFile4()
    {
        // External sdcard location
/*
        if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.Q) {


        }

         File mediaStorageDir = new File(Environment.getExternalStoragePublicDirectory(Environment.DIRECTORY_PICTURES),IMAGE_DIRECTORY_NAME);

        if(!mediaStorageDir.exists()) {

            mediaStorageDir.mkdirs();

        }
        else  if(mediaStorageDir.exists()) {
            Log.e("Directory" , "-----" + "Directory Exist");
        }
        else{

            displayMessage(context,"Unable to create directory.");

            return null;
        }


 */

        File mediaStorageDir = new File(Environment.getExternalStoragePublicDirectory(Environment.DIRECTORY_PICTURES),"");


        Log.e("Level" , "-----" + "Leve 7A");
        String timeStamp = new SimpleDateFormat("yyyyMMdd_HHmmss",
                Locale.getDefault()).format(new Date());

        String filenames="IMG_" + timeStamp + ".jpg";

        //ExifInterface exifInterface;






        File mediaFile = new File(mediaStorageDir.getPath() + File.separator
                + filenames);
        photoFile2=mediaFile;
        Log.e("Level" , "-----" + "Leve 7B");
        return mediaFile;

    }


    private File createImageFile() throws IOException {
        // Create an image file name
        String timeStamp = new SimpleDateFormat("yyyyMMdd_HHmmss").format(new Date());
        String imageFileName = "JPEG_" + timeStamp + "_";
        File storageDir = this.getExternalFilesDir(Environment.DIRECTORY_PICTURES);
        // String strSDCardPathName = Environment.getExternalStorageDirectory() + "/temp_Image" + "/";
        File image = File.createTempFile(
                imageFileName,  /* prefix */
                ".jpg",         /* suffix */
                storageDir      /* directory */
        );



        mCurrentPhotoPath = image.getAbsolutePath();


        return image;
    }





    public void onSaveInstanceState(Bundle outState) {
        super.onSaveInstanceState(outState);


        outState.putParcelable("file_uri", uri);



    }
/*
    @Override
    public void onRestoreInstanceState(Bundle savedInstanceState) {
        super.onRestoreInstanceState(savedInstanceState);

        if(savedInstanceState != null)
        {
            // get the file url
            uri = savedInstanceState.getParcelable("file_uri");

        }


    }
*/








    @Override
    // Star activity for result method to Set captured image on image view after click.
    public void onActivityResult(int requestCode, int resultCode, Intent data) {

        super.onActivityResult(requestCode, resultCode, data);

        String rstCode =  Integer.toString(resultCode);



        //uri = data.getData();
        //if ( requestCode == CAPTURE_IMAGE_REQUEST && resultCode == Activity.RESULT_OK  ) {
        if (requestCode == CAPTURE_IMAGE_REQUEST && resultCode == Activity.RESULT_OK) {

            Log.e("msg", "level 22 of code" +rstCode);
/*
            if (Build.VERSION.SDK_INT >= 21) {
                targetW = 500;
                targetH = 650;
            }
            else{
                targetW = 300;
                targetH = 300;
            }

            // Get the dimensions of the bitmap
            BitmapFactory.Options bmOptions = new BitmapFactory.Options();
            bmOptions.inJustDecodeBounds = true;
            BitmapFactory.decodeFile(photoFile.getAbsolutePath(), bmOptions);
            int photoW = bmOptions.outWidth;
            int photoH = bmOptions.outHeight;

            // Determine how much to scale down the image
            int scaleFactor = Math.min(photoW/targetW, photoH/targetH);

            // Decode the image file into a Bitmap sized to fill the View
            bmOptions.inJustDecodeBounds = false;
            bmOptions.inSampleSize = scaleFactor;
            bmOptions.inPurgeable = true;

            Log.e("msg", "level 23 of Photo Height" +photoH);


 */

            /* NEW CODE */

            final BitmapFactory.Options options = new BitmapFactory.Options();
            options.inJustDecodeBounds = true;




            //BitmapFactory.decodeResource(res, resId, options);
            BitmapFactory.decodeFile(photoFile.getAbsolutePath(), options);

            Log.e("msg", "iMAGE PAATH: " +photoFile.getAbsolutePath());
            //BitmapFactory.decodeResource(getResources(), R.id.imageView2, options);

            // Calculate inSampleSize
            options.inSampleSize = calculateInSampleSize(options, 500, 650);
            options.inJustDecodeBounds = false;

            /* NEW CODE */

            Bitmap bitmap = BitmapFactory.decodeFile(photoFile.getAbsolutePath(), options);

           // Bitmap bitmap = BitmapFactory.decodeFile(photoFile.getAbsolutePath(), bmOptions);
            //ImageViewHolder.setImageBitmap(bitmap);





   /*
            Bitmap bitmaps = BitmapFactory.decodeFile(photoFile.getAbsolutePath());

            Bitmap bitmap = Bitmap.createScaledBitmap(bitmaps,390,450,true);
*/


            try
            {
                //ExifInterface exifInterface =new ExifInterface(photoFile.getAbsolutePath());


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




/*
                Log.d("EXIF value", exif.getAttribute(ExifInterface.TAG_ORIENTATION));
                if(exif.getAttribute(ExifInterface.TAG_ORIENTATION).equalsIgnoreCase("6")){
                    bitmap= rotate(bitmap, 90);
                } else if(exif.getAttribute(ExifInterface.TAG_ORIENTATION).equalsIgnoreCase("8")){
                    bitmap= rotate(bitmap, 270);
                } else if(exif.getAttribute(ExifInterface.TAG_ORIENTATION).equalsIgnoreCase("3")){
                    bitmap= rotate(bitmap, 180);
                } else if(exif.getAttribute(ExifInterface.TAG_ORIENTATION).equalsIgnoreCase("0")){
                    bitmap= rotate(bitmap, 90);
                }


 */


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
        Toast.makeText(getBaseContext(),message,Toast.LENGTH_LONG).show();
    }
    // Requesting runtime permission to access camera.





/*
    private void captureImage2() {

        try {
            Intent cameraIntent = new Intent(android.provider.MediaStore.ACTION_IMAGE_CAPTURE);
            photoFile = createImageFile4();
            photoFile2=photoFile;
            if(photoFile!=null)
            {
                //displayMessage(getBaseContext(),photoFile.getAbsolutePath());
                //Log.i("Mayank",photoFile.getAbsolutePath());

                Uri photoURI  = Uri.fromFile(photoFile);
                //uri  = Uri.fromFile(photoFile);
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
        if (takePictureIntent.resolveActivity(getPackageManager()) != null) {
            // Create the File where the photo should go
            try {

                Log.e("Level" , "-----" + "Leve 5");
                photoFile = createImageFile4();

                //photoFile = createImageFile();

                // displayMessage(getBaseContext(),photoFile.getAbsolutePath());
                // Log.i("Mayank",photoFile.getAbsolutePath());
                photoFile2=photoFile;

                // Continue only if the File was successfully created
                if(photoFile != null) {



                    // Uri photoURI = FileProvider.getUriForFile(MyPhotoActivity.this,"com.shiptodoor.shiptodoor.fileprovider",photoFile);
                    // Uri photoURI = FileProvider.getUriForFile(MyPhotoActivity.this, BuildConfig.APPLICATION_ID + ".provider",photoFile);



                     Uri photoURI  =FileProvider.getUriForFile(MyPhotoActivity.this, BuildConfig.APPLICATION_ID +".provider",photoFile);
                    takePictureIntent.putExtra(MediaStore.EXTRA_OUTPUT, photoURI);
                    startActivityForResult(takePictureIntent, CAPTURE_IMAGE_REQUEST);
                    Log.i("MyPhoto: ",photoFile.getAbsolutePath());
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
        // External sdcard location
        File mediaStorageDir = new File(
                Environment
                        .getExternalStoragePublicDirectory(Environment.DIRECTORY_PICTURES),
                IMAGE_DIRECTORY_NAME);
        // Create the storage directory if it does not exist

        Log.e("Level" , "-----" + "Leve 6");
        if (!mediaStorageDir.exists()) {
            if (!mediaStorageDir.mkdirs()) {
                displayMessage(getBaseContext(),"Unable to create directory.");
                Log.e("Level" , "-----" + "Leve 7");
                return null;
            }
        }

        String timeStamp = new SimpleDateFormat("yyyyMMdd_HHmmss",
                Locale.getDefault()).format(new Date());

        String filenames="IMG_" + timeStamp + ".jpg";

        //ExifInterface exifInterface;






        File mediaFile = new File(mediaStorageDir.getPath() + File.separator
                + filenames);
        photoFile2=mediaFile;
        return mediaFile;

    }


    private File createImageFile() throws IOException {
        // Create an image file name
        String timeStamp = new SimpleDateFormat("yyyyMMdd_HHmmss").format(new Date());
        String imageFileName = "JPEG_" + timeStamp + "_";
        File storageDir = getExternalFilesDir(Environment.DIRECTORY_PICTURES);
        // String strSDCardPathName = Environment.getExternalStorageDirectory() + "/temp_Image" + "/";
        File image = File.createTempFile(
                imageFileName,
                ".jpg",
                storageDir
        );



        mCurrentPhotoPath = image.getAbsolutePath();


        return image;
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









    @Override
    // Star activity for result method to Set captured image on image view after click.
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {

        super.onActivityResult(requestCode, resultCode, data);

        String rstCode =  Integer.toString(resultCode);

        //uri = data.getData();
        //if ( requestCode == CAPTURE_IMAGE_REQUEST && resultCode == Activity.RESULT_OK  ) {
        if (requestCode == CAPTURE_IMAGE_REQUEST && resultCode == RESULT_OK) {



            if (Build.VERSION.SDK_INT >= 21) {
                targetW = 500;
                targetH = 650;
            }
            else{
                targetW = 300;
                targetH = 300;
            }

            // Get the dimensions of the bitmap
            BitmapFactory.Options bmOptions = new BitmapFactory.Options();
            bmOptions.inJustDecodeBounds = true;
            BitmapFactory.decodeFile(photoFile.getAbsolutePath(), bmOptions);
            int photoW = bmOptions.outWidth;
            int photoH = bmOptions.outHeight;

            // Determine how much to scale down the image
            int scaleFactor = Math.min(photoW/targetW, photoH/targetH);

            // Decode the image file into a Bitmap sized to fill the View
            bmOptions.inJustDecodeBounds = false;
            bmOptions.inSampleSize = scaleFactor;
            bmOptions.inPurgeable = true;

            Bitmap bitmap = BitmapFactory.decodeFile(photoFile.getAbsolutePath(), bmOptions);
            //ImageViewHolder.setImageBitmap(bitmap);








            try
            {
                //ExifInterface exifInterface =new ExifInterface(photoFile.getAbsolutePath());


                ExifInterface exif=new ExifInterface(photoFile.getAbsolutePath());

                Log.d("EXIF value", exif.getAttribute(ExifInterface.TAG_ORIENTATION));
                if(exif.getAttribute(ExifInterface.TAG_ORIENTATION).equalsIgnoreCase("6")){
                    bitmap= rotate(bitmap, 90);
                } else if(exif.getAttribute(ExifInterface.TAG_ORIENTATION).equalsIgnoreCase("8")){
                    bitmap= rotate(bitmap, 270);
                } else if(exif.getAttribute(ExifInterface.TAG_ORIENTATION).equalsIgnoreCase("3")){
                    bitmap= rotate(bitmap, 180);
                } else if(exif.getAttribute(ExifInterface.TAG_ORIENTATION).equalsIgnoreCase("0")){
                    bitmap= rotate(bitmap, 90);
                }
            }
            catch(IOException e){
                Log.e("Error", e.getLocalizedMessage());
            }



            ImageViewHolder.setImageBitmap(bitmap);


            // ImageViewHolder.setRotation(90);


        }


        else
        {
            displayMessage(getBaseContext(),"Request cancelled or something went wrong.");
            photoFile=null;
        }


    }


    public static Bitmap rotate(Bitmap bitmap, int degree) {
        int w = bitmap.getWidth();
        int h = bitmap.getHeight();

        Matrix mtx = new Matrix();
        //       mtx.postRotate(degree);
        mtx.setRotate(degree);

        return Bitmap.createBitmap(bitmap, 0, 0, w, h, mtx, true);
    }



    */





   /*
    private void displayMessage(Context context, String message)
    {
        Toast.makeText(context,message,Toast.LENGTH_LONG).show();
    }

    */
    // Requesting runtime permission to access camera.






    private boolean checkAndRequestPermissions() {
        int permissionCAMERA = ContextCompat.checkSelfPermission(this,
                Manifest.permission.CAMERA);




        int storagePermission = ContextCompat.checkSelfPermission(this,


                Manifest.permission.READ_EXTERNAL_STORAGE);


        int storageWritePermission = ContextCompat.checkSelfPermission(this,


                Manifest.permission.WRITE_EXTERNAL_STORAGE);



        int loc = ContextCompat.checkSelfPermission(this,


                Manifest.permission.ACCESS_COARSE_LOCATION);

        int loc2 = ContextCompat.checkSelfPermission(this,


                Manifest.permission.ACCESS_FINE_LOCATION);
        int internet = ContextCompat.checkSelfPermission(this,
                Manifest.permission.INTERNET);


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

        if (loc != PackageManager.PERMISSION_GRANTED) {
            listPermissionsNeeded.add(Manifest.permission.ACCESS_COARSE_LOCATION);
        }
        if (loc2 != PackageManager.PERMISSION_GRANTED) {
            listPermissionsNeeded.add(Manifest.permission.ACCESS_FINE_LOCATION);


        }

        if (internet != PackageManager.PERMISSION_GRANTED) {
            listPermissionsNeeded.add(Manifest.permission.INTERNET);
        }

        if (!listPermissionsNeeded.isEmpty()) {
            ActivityCompat.requestPermissions(this,


                    listPermissionsNeeded.toArray(new String[listPermissionsNeeded.size()]), MY_PERMISSIONS_REQUEST_CAMERA);
            return false;
        }

        return true;
    }




    @Override    public void onRequestPermissionsResult(int requestCode, String permissions[], int[] grantResults) {
        switch (requestCode) {
            case MY_PERMISSIONS_REQUEST_ACCOUNTS:
                if (grantResults.length > 0 && grantResults[0] == PackageManager.PERMISSION_GRANTED) {
                    captureImage();

                    //Permission Granted Successfully. Write working code here.
                } else {
                    //You did not accept the request can not use the functionality.
                }
                break;
        }
    }








    // Upload captured image online on server function.
    public void ImageUploadToServerFunction(){




       /*
         bitmap = BitmapFactory.decodeFile(photoFile.getAbsolutePath());


        int nh = (int) ( bitmap.getHeight() * (512.0 / bitmap.getWidth()) );
        Bitmap scaled_bitmap = Bitmap.createScaledBitmap(bitmap, 512, nh, true);
*/
        //String uploadImage = getStringImage(scaled);



     /* Close for the new code
        Log.e("Upload starts here","First Time");

        if (Build.VERSION.SDK_INT >= 21) {
            targetW = 400;
            targetH = 450;
        }
        else{
            targetW = 500;
            targetH = 350;
        }


        Log.e("Upload starts here","Second Time");

        // Get the dimensions of the bitmap
        BitmapFactory.Options bmOptions = new BitmapFactory.Options();

        Log.e("Upload starts here","Third Time");

        bmOptions.inJustDecodeBounds = true;
        BitmapFactory.decodeFile(photoFile.getAbsolutePath(), bmOptions);
        int photoW = bmOptions.outWidth;
        int photoH = bmOptions.outHeight;
        Log.e("Upload starts here","Fourth Time");


        if (Build.VERSION.SDK_INT <= 20) {
            if(photoW > photoH)
            {
                targetW = 260;
            }

        }



        // Determine how much to scale down the image
        int scaleFactor = Math.min(photoW/targetW, photoH/targetH);

        // Decode the image file into a Bitmap sized to fill the View
        bmOptions.inJustDecodeBounds = false;
        bmOptions.inSampleSize = scaleFactor;
        //bmOptions.inPurgeable = true;
        bmOptions.inScaled= true;
        Bitmap scaled_bitmap = BitmapFactory.decodeFile(photoFile.getAbsolutePath(), bmOptions);





        ByteArrayOutputStream byteArrayOutputStreamObject ;

        byteArrayOutputStreamObject = new ByteArrayOutputStream();

        // Converting bitmap image to jpeg format, so by default image will upload in jpeg format.
        scaled_bitmap.compress(Bitmap.CompressFormat.JPEG, 100, byteArrayOutputStreamObject);

        byte[] byteArrayVar = byteArrayOutputStreamObject.toByteArray();

        final String ConvertImage = Base64.encodeToString(byteArrayVar, Base64.DEFAULT);

        Log.e("String Image conv", "-----" + ConvertImage);



      */

        /* ****  NEW CODE START */


        if (Build.VERSION.SDK_INT >= 21) {
            targetW = 400;
            targetH = 450;
        }
        else{
            targetW = 500;
            targetH = 350;
        }


        //Log.e("Upload starts here","Second Time");

        // Get the dimensions of the bitmap
        BitmapFactory.Options bmOptions = new BitmapFactory.Options();

        //Log.e("Upload starts here","Third Time");

        bmOptions.inJustDecodeBounds = true;
        BitmapFactory.decodeFile(photoFile.getAbsolutePath(), bmOptions);
        int photoW = bmOptions.outWidth;
        int photoH = bmOptions.outHeight;
        // Log.e("Upload starts here","Fourth Time");


        if (Build.VERSION.SDK_INT <= 20) {
            if(photoW > photoH)
            {
                targetW = 260;
            }

        }

        /*
        if (Build.VERSION.SDK_INT >= 21) {

            if(photoW > photoH)
            {
                targetW = 260;
                targetH = 300;
            }

        }*/

        // Determine how much to scale down the image
        int scaleFactor = Math.min(photoW/targetW, photoH/targetH);

        // Decode the image file into a Bitmap sized to fill the View
        bmOptions.inJustDecodeBounds = false;
        bmOptions.inSampleSize = scaleFactor;
        //bmOptions.inPurgeable = true;
        bmOptions.inScaled= true;
        Bitmap scaled_bitmap = BitmapFactory.decodeFile(photoFile.getAbsolutePath(), bmOptions);





        ByteArrayOutputStream byteArrayOutputStreamObject ;

        byteArrayOutputStreamObject = new ByteArrayOutputStream();

        // Converting bitmap image to jpeg format, so by default image will upload in jpeg format.
        scaled_bitmap.compress(Bitmap.CompressFormat.JPEG, 100, byteArrayOutputStreamObject);

        byte[] byteArrayVar = byteArrayOutputStreamObject.toByteArray();

        final String ConvertImage = Base64.encodeToString(byteArrayVar, Base64.DEFAULT);

        //Log.e("String Image conv", "-----" + ConvertImage);






        class AsyncTaskUploadClass extends AsyncTask<Void,Void,String> {

            @Override
            protected void onPreExecute() {
                super.onPreExecute();

                // Showing progress dialog at image upload time.
                progressDialog = ProgressDialog.show(MyPhotoActivity.this,"Redirecting", "Redirecting to our payment platform Please wait...",false,false);


            }

            @Override
            protected void onPostExecute(String string1) {

                super.onPostExecute(string1);

                // Dismiss the progress dialog after done uploading.
                progressDialog.dismiss();
try{


String[] strsplit=string1.split("_");
                string1=strsplit[0];

                String str2 ="\"Success\"";


               // if(string1.trim().equalsIgnoreCase(str2)){
                    String errors ="Error";
                    //String str= string1.replace("\"","\"");
                String str = string1.toString().replaceAll("\"","");
                String strDollar = strsplit[4].toString().replaceAll("\"","");

                Log.i("data","Exchange Rate: "+strDollar);
                //Toast.makeText(MyPhotoActivity.this,str,Toast.LENGTH_LONG).show();

                if(str.trim().equals("Success")){
                    Log.e("TransactionId",str.toString());
                    Intent intent = new Intent(MyPhotoActivity.this,PaymentActivity.class);
                    intent.putExtra("transaction_Id",strsplit[1]);
                    intent.putExtra("txtPrice",txtPrice);
                    intent.putExtra("txtSenderFname",txtSenderFname);
                    intent.putExtra("txtSenderSurname",txtSenderSurname);
                    intent.putExtra("txtSenderMobile",txtSenderMobile);
                    intent.putExtra("txtEmail",strsplit[3]);
                    intent.putExtra("txtDollar",strDollar);
                    intent.putExtra("txtUserId",strsplit[2]);
                    intent.putExtra("txtPaymentType","1");

                    startActivity(intent);
                    finish();
                    }
                    else {
                    Toast.makeText(MyPhotoActivity.this,str,Toast.LENGTH_LONG).show();
                    }



} catch(ArrayIndexOutOfBoundsException e){
    e.printStackTrace();
}
       catch(Exception e){
                e.printStackTrace();
            }
            }


            @Override
            protected String doInBackground(Void... params) {

                try{

/*
                        location = new MainActivity();

                        string address = location.getAddress();
                        string city = location.getCity();
                        string state = location.getState();*/


                    Log.e("Upload starts here","sixth");

                    /*
                    spanner2Holder =String.valueOf(spinner2.getSelectedItem());
                    //spanner1Holder =String.valueOf(spinner1.getSelectedItem());
                    //spanner6Holder =String.valueOf(spinner6.getSelectedItem());

                    spanner3Holder =String.valueOf(spinner3.getSelectedItem());
                    spanner4Holder =String.valueOf(spinner4.getSelectedItem());
                    spanner5Holder =String.valueOf(spinner5.getSelectedItem());
                    Log.e("Upload starts here","seventh");

                    spanner6Holder =String.valueOf(spinnerDurex.getSelectedItem());
                    spanner7Holder =String.valueOf(spinnerPrice.getSelectedItem());
                    //spanner8Holder =String.valueOf(spinnerComp.getSelectedItem());
                    spanner9Holder =String.valueOf(spinnerProm.getSelectedItem());

*/



                    Log.e("Upload starts here","8th");
                   /*
                    txt1 = ed1.getText().toString();
                    txt2 = ed2.getText().toString();
                    txt3 = ed3.getText().toString();
                    txt4 = ed4.getText().toString();
                    txt5 = ed5.getText().toString();



                    txt6 = ed6.getText().toString();
                    txt7 = ed7.getText().toString();
                    txt8 = ed8.getText().toString();

*/






                    Date date = new Date();
                    SimpleDateFormat  formatter = new SimpleDateFormat("dd-MM-yyyy HH:mm:ss");


                    String strDate = formatter.format(date);

                    //MEIHolder = deviceUniqueIdentifier.toString();
                    Log.e("Upload starts here","9th");
                    JSONObject postDataParams = new JSONObject();



                    /*  RECEIVER STARTS HERE */


                    //  postDataParams.put("image_name", spanner2Holder);




                    postDataParams.put("txtDecision", txtDecision);
                    postDataParams.put("txtRecevier_description", txtdescription);
                    postDataParams.put("txtDestCountry", txtDestCountry);
                    Log.e("Upload starts here","10th");

                    postDataParams.put("txtDestination", txtDestination);
                    postDataParams.put("txtDestState", txtDestState);
                    postDataParams.put("txtDestLGA", txtDestLGA);

                    postDataParams.put("txtKg", txtKg);
                    postDataParams.put("txtShippingType", txtShippingType);
                    // postDataParams.put("competitive", spanner8Holder);
                    postDataParams.put("txtPrice", txtPrice);

                    postDataParams.put("paymentType", "1");

                    postDataParams.put("fileType", "Photo");

                    //    postDataParams.put("IMEI", IMEIHolder);

                    postDataParams.put("txtReceiverFname", txtReceiverFname);
                    postDataParams.put("txtReceiverSurname", txtReceiverSurname);
                    postDataParams.put("txtReceiverAddress", txtReceiverAddress);
                    postDataParams.put("txtReceiverCity", txtReceiverCity);
                    postDataParams.put("txtReceiverPostCode", txtReceiverPostCode);
                    postDataParams.put("txtReceiverCountry", txtReceiverCountry);
                    postDataParams.put("txtReceiverMobile", txtReceiverMobile);

                    intent.putExtra("txtReceiverTitle",spanner3Holder);
                    /* ******  SENDER DETAISL STARTS HERE */



                    postDataParams.put("txtSenderFname", txtSenderFname);

                    postDataParams.put("txtSenderSurname", txtSenderSurname);
                    postDataParams.put("txtEmail", txtEmail);
                    postDataParams.put("txtSenderAddress", txtSenderAddress);
                    postDataParams.put("txtSenderCity",txtSenderCity) ;
                    postDataParams.put("txtSenderPostCode",txtSenderPostCode) ;

                    postDataParams.put("txtSenderCountry",txtSenderCountry) ;
                    postDataParams.put("txtSenderState",txtSenderState) ;
                    postDataParams.put("txtSenderlga",txtSenderlga) ;

                    postDataParams.put("txtSenderMobile", txtSenderMobile) ;


                    /* ******  PICKUP DETAISL STARTS HERE */

                    postDataParams.put("txtPickupFname", txtPickupFname);
                    postDataParams.put("txtPickupSurname", txtPickupSurname);
                    postDataParams.put("txtPickupAddress", txtPickupAddress);
                    postDataParams.put("txtPickupCity", txtPickupCity);
                    postDataParams.put("txtPickupPostCode",txtPickupPostCode) ;
                    postDataParams.put("txtPickupCountry",txtPickupCountry) ;
                    postDataParams.put("txtPickupState",txtPickupState) ;
                    postDataParams.put("txtPickuplga",txtPickuplga) ;
                    postDataParams.put("txtPickupMobile", txtPickupMobile) ;

                    postDataParams.put("price_vat_pickup_charge_delivery_charge", price_vat_pickup_charge_delivery_charge) ;


                    postDataParams.put("image", ConvertImage);


                    postDataParams.put("loginDate", strDate);


                       /* postDataParams.put("address", address);
                        postDataParams.put("city", city);
                        postDataParams.put("state", state);*/
                    Log.e("params Data: ",postDataParams.toString());


                    result = httpParse.postRequest(postDataParams, HttpURL);
                } catch(ArrayIndexOutOfBoundsException e){
                    e.printStackTrace();
                } catch (Exception e) {
                    e.printStackTrace();
                }
                return  result;

            }
        }


        AsyncTaskUploadClass AsyncTaskUploadClassOBJ = new AsyncTaskUploadClass();

        AsyncTaskUploadClassOBJ.execute();

                    Log.e("params: ",result.toString());





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






    public void update_Text(){

        Intent intent3 = getIntent();
        country_list = (ArrayList<String>) getIntent().getSerializableExtra("key");

        state_list = (ArrayList<String>) getIntent().getSerializableExtra("key_state");
        lga_list = (ArrayList<String>) getIntent().getSerializableExtra("key_lga");
        ship_list = (ArrayList<String>) getIntent().getSerializableExtra("key_ship");
        kg_list = (ArrayList<String>) getIntent().getSerializableExtra("key_kg");

        // txtFname = intent3.getStringExtra("txtFname");

        txtdescription =intent3.getStringExtra("txtdescription");
        txtDestCountry =intent3.getStringExtra("txtDestCountry");
        txtDestination =intent3.getStringExtra("txtDestination");
        txtDestState =intent3.getStringExtra("txtDestState");
        txtDestLGA =intent3.getStringExtra("txtDestLGA");
        txtKg =intent3.getStringExtra("txtKg");
        txtShippingType =intent3.getStringExtra("txtShippingType");
        txtPrice =intent3.getStringExtra("txtPrice");

        price_vat_pickup_charge_delivery_charge =intent3.getStringExtra("price_vat_pickup_charge_delivery_charge");


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









    }






}