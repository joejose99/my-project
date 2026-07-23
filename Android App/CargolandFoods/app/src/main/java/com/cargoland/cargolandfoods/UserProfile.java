package com.cargoland.cargolandfoods;

import android.annotation.SuppressLint;
import android.content.Context;
import android.content.Intent;
import android.database.Cursor;
import android.database.sqlite.SQLiteException;
import android.graphics.Bitmap;
import android.graphics.Color;
import android.graphics.drawable.ColorDrawable;
import android.net.Uri;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.view.menu.MenuBuilder;
import androidx.appcompat.widget.ShareActionProvider;
import androidx.appcompat.widget.Toolbar;
import androidx.coordinatorlayout.widget.CoordinatorLayout;
import androidx.navigation.ui.AppBarConfiguration;

import com.cargoland.cargolandfoods.Activity.CartListActivity;
import com.cargoland.cargolandfoods.Domain.FoodDomain;
import com.cargoland.cargolandfoods.Helper.ManagementCart;
import com.cargoland.cargolandfoods.Interface.ChangeNumberItemsListener;
import com.cargoland.cargolandfoods.databinding.ActivityUserProfileBinding;
//import com.winners.lfc.helper.BottomNavigationBehavior;
import com.google.android.material.bottomnavigation.BottomNavigationView;
import com.google.android.material.bottomsheet.BottomSheetDialog;
import com.google.android.material.floatingactionbutton.FloatingActionButton;
import com.google.android.material.navigation.NavigationBarView;
//import com.cargoland.cargolandfoods.helper.BottomNavigationBehavior;

import java.io.File;
import java.io.FileOutputStream;
import java.util.ArrayList;

public class UserProfile extends AppCompatActivity {

    private AppBarConfiguration appBarConfiguration;
    private ActivityUserProfileBinding binding;

    private ShareActionProvider shareActionProvider;
    private ManagementCart managementCart;

    ImageView viewToBitmap=null;
    EditText ed1, ed2, ed3, ed4, ed5, ed6,ed7,ed8,ed9,ed11, ed01,ed02,ed03;
    TextView vw1;
    //TextInputEditText ed1, ed2, ed3, ed4, ed5, ed6,ed7,ed8,ed9;;
    Context context;
    private  String txt1, txt2, txt3, txt4, txt5,txt6, txt7, txt8,txt9,txt10,txt11,txt01,txt02,txt1103;
    DBHelper  mydb = new DBHelper(this);
    private Toolbar mTopToolbar;
    TextView txt_company_name,txt_company_phone,txt_logout,txt_exit;
    Button but;

       MyDataString myDataString;
    private String strData;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        try{
            super.onCreate(savedInstanceState);
            setContentView(R.layout.activity_user_profile);

            managementCart = new ManagementCart(this);
           // Toolbar toolbar = findViewById(R.id.toolbar);
           // setSupportActionBar(toolbar);


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

            int colorCodeLight = Color.parseColor("#ffffff");
            window.setStatusBarColor(colorCodeLight);


            Intent intent = getIntent();
            strData = intent.getStringExtra("data");

            bottomNavigation();

            //setSupportActionBar(toolbar);
/*
            getSupportActionBar().setDisplayShowHomeEnabled(true);
            //getSupportActionBar().setLogo(R.drawable.logo5);
            getSupportActionBar().setDisplayUseLogoEnabled(true);
            getSupportActionBar().setTitle("   User Profile");

            mTopToolbar=(Toolbar) findViewById(R.id.toolbar);
            setSupportActionBar(mTopToolbar);

 */

            but=(Button)findViewById(R.id.button2);
            ed1=(EditText)findViewById(R.id.txtfname);
            ed2=(EditText)findViewById(R.id.txtsurname);
            ed3=(EditText)findViewById(R.id.txtaddress);
            ed4=(EditText)findViewById(R.id.txtcity);
            ed5=(EditText)findViewById(R.id.txtmobile);
            ed6=(EditText)findViewById(R.id.txtemail);
            ed7=(EditText)findViewById(R.id.txtlga);
            ed8=(EditText)findViewById(R.id.txtstate);
            ed9=(EditText)findViewById(R.id.txtcountry);



            //vw1=(TextView) findViewById(R.id.txtReferral);

            ed11=(EditText)findViewById(R.id.txtPostcode);
            ed01=(EditText)findViewById(R.id.txtBirth_day);
            ed02=(EditText)findViewById(R.id.txtUnit);

            Log.i("Level","***********Level 2A");
            getProfile();

            //BottomNavigationView bottomNavigationView = (BottomNavigationView) findViewById(R.id.nav_view);

            Log.i("Level","***********Level 2");
// attaching bottom sheet behaviour - hide / show on scroll

            //CoordinatorLayout.LayoutParams layoutParams = (CoordinatorLayout.LayoutParams) bottomNavigationView.getLayoutParams();
            //layoutParams.setBehavior(new BottomNavigationBehavior());



            but.setOnClickListener(new View.OnClickListener() {
                @SuppressLint("WrongConstant")
                @Override
                public void onClick(View v) {
 /*
                String shareReferral ="Share this code with others and earn shipping bonus ";
                 Toast toast= Toast.makeText(getApplicationContext(),shareReferral,Toast.LENGTH_LONG);


                toast.setGravity(Gravity.CENTER_VERTICAL ,0,0);
                 toast.show();

  */



                    AlertDialog.Builder builder = new AlertDialog.Builder(UserProfile.this);
                    builder.setTitle("Referral")

                            .setMessage("Share this code with others and earn shipping bonus")
                            .setPositiveButton("ok",null).create().show();

                }
            });


            myDataString.setCategory_Type(1);

        }catch(IllegalArgumentException e){
            e.printStackTrace();
        }catch(IndexOutOfBoundsException e){
            e.printStackTrace();
        }
        catch(Exception e){
            e.printStackTrace();
        }





    }




    private void bottomNavigation() {

        LinearLayout homeBtn = findViewById(R.id.homeBtn);
        LinearLayout profileBtn = findViewById(R.id.profileBtn);
        LinearLayout supportBtn = findViewById(R.id.supportBtn);
        LinearLayout settingBtn = findViewById(R.id.settingBtn);


        homeBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Intent intent = new Intent(UserProfile.this,MenuActivity.class);

                MyDataString myDataString = new MyDataString();



                intent.putExtra("data", myDataString.getStrMyData());
               // intent.putExtra("data", strData);
                intent.putExtra("int_data", 1);

                startActivity(intent);
                finish();
                //startActivity(new Intent(UserProfile.this, MenuActivity.class));
            }
        });

        profileBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //startActivity(new Intent(UserProfile.this, UserProfile.class));

                Intent intent = new Intent(UserProfile.this,UserProfile.class);

                intent.putExtra("data", strData);
                intent.putExtra("int_data", 1);

                startActivity(intent);
                finish();
            }
        });

        settingBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                showProfileBottomSheet( context, true);

            }
        });
        supportBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent  browserIntent  = new Intent(Intent.ACTION_VIEW, Uri.parse("https://tawk.to/chat/60b7cf63de99a4282a1b0bc0/1f77047de"));
                startActivity(browserIntent);





            }
        });

    }










    @SuppressLint("Range")
    private void getProfile(){
        try{


            Log.i("Data","Im in mysqlite************");
            Cursor res= mydb.getUsers(1);
            if(res.moveToFirst()){
                Log.i("Data","Im in mysqlite************ 1A");


                res.moveToFirst();

                txt1    =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_FIRSTNAME));

                txt2=   res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_SURNAME));
                String title =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_TITLES));
                txt4    =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_City));

                String email =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_EMAIL));
                txt3    =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_ADDRESS));

                txt9   = res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_MEMBER_STATUS));
                // txt9  = res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_COUNTRY));
                txt5    =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_MOBILENO));
                txt01=res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_BIRTH_DAY));
                txt02=res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_CHURCH_UNIT));
                txt11 =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_PROFESSION));

                txt8    =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_STATE));
                txt7    =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_LGA));

                txt10    =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_REFERRAL));


                ed1.setText(txt1.toString());

                ed2.setText(txt2.toString());

                ed3.setText(txt3.toString());

                ed4.setText(txt4.toString());

                ed6.setText(email.toString());

                ed5.setText(txt5.toString());

                ed7.setText(txt7.toString());

                ed8.setText(txt8.toString());

                //ed9.setText(txt9.toString());
                //String ref="Referral Code: " +txt10.toString();
                //vw1.setText(ref.toString());

                ed01.setText(txt01.toString());
                ed02.setText(txt02.toString());
                ed11.setText(txt11.toString());


            }
        }catch (SQLiteException e){
            e.printStackTrace();
        }
        catch (Exception e){
            e.printStackTrace();
        }

    }

    /*


    //R.menu.menu_main, menu
    @SuppressLint("RestrictedApi")
    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        // getMenuInflater().inflate(R.menu.menu_main,menu);
        getMenuInflater().inflate(R.menu.menu_main, menu);
        //shareActionProvider = (ShareActionProvider)menu.findItem(R.id.action_share);
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



        if (id == R.id.action_profile) {
            // Toast.makeText(UserLogin.this, "Action clicked", Toast.LENGTH_LONG).show();
            Intent intent = new Intent(UserProfile.this,UserProfile.class);
            startActivity(intent);


            finish();
            return true;

        }
        if (id == R.id.action_logout) {
            // Toast.makeText(UserLogin.this, "Action clicked", Toast.LENGTH_LONG).show();
            Intent intent = new Intent(UserProfile.this,UserLogin.class);
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


     */



    public void shareImage(Bitmap bitmap,String packageName){
        try{
            String message="Cargoland \n\r Kindly download the app for your logistics needs";
            File file = new File(this.getExternalCacheDir(),"cargoland_menu.jpg");
            FileOutputStream fileOutputStream = new FileOutputStream(file);
            bitmap.compress(Bitmap.CompressFormat.JPEG,95,fileOutputStream);
            fileOutputStream.flush();
            fileOutputStream.close();
            file.setReadable(true,false);

            final Intent intent = new Intent(Intent.ACTION_SEND);
            intent.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK);

/*
            Uri apkURI = FileProvider.getUriForFile(
                    context,
                    context.getApplicationContext()
                            .getPackageName() + ".provider", file);
            intent.setDataAndType(apkURI, "jepeg");
            intent.addFlags(Intent.FLAG_GRANT_READ_URI_PERMISSION);
// End New Approach
             context.startActivity(intent);


 */


            intent.putExtra(Intent.EXTRA_STREAM,Uri.fromFile(file));
            intent.putExtra("message",message);
            intent.setType("images/*");
            intent.setPackage(packageName);

            startActivity(Intent.createChooser(intent,"Share Cargoland App on facebook"));

        }catch (Exception e){
            e.printStackTrace();
        }
    }


    private void ExitApp(){

        android.os.Process.killProcess(android.os.Process.myPid());
        System.exit(1);
    }



    /* POPUP MENU STARTS HERE ***************************** */


    private void showProfileBottomSheet(final Context context, boolean isName) {

        int layout = 0;

        if (isName) {
            layout = R.layout.settings;
        }



        final View view = getLayoutInflater().inflate(layout, null);
        Log.i("bottom","Bottom sheet");

        final BottomSheetDialog bottomSheetDialog = new BottomSheetDialog(this);
        bottomSheetDialog.setContentView(view);

        bottomSheetDialog.getWindow().setBackgroundDrawable(new ColorDrawable(Color.TRANSPARENT));
        bottomSheetDialog.show();



        if (isName) {

            txt_company_name =(TextView) view.findViewById(R.id.txt_company_name);
            txt_company_phone =(TextView) view.findViewById(R.id.txt_company_phone);
            txt_logout =(TextView) view.findViewById(R.id.txt_logout);
            txt_exit =(TextView) view.findViewById(R.id.txt_exit);




            txt_company_name.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {

                    Intent intent = new Intent(UserProfile.this,UserProfile.class);

                    intent.putExtra("data", strData);
                    intent.putExtra("int_data", 1);
                    startActivity(intent);
                    finish();

                }
            });



            txt_company_phone.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    Intent intent = new Intent();
                    intent.setAction(Intent.ACTION_SEND);
                    intent.setType("text/plain");
                    String urlShare="https://play.google.com/store/apps/details?id=com.shiptodor.shiptodor&gl=GB";
                    String message="Cargoland foods \n\r Kindly download the app for your foods supply";

                    String urlShare_now =message+"\n\r"+urlShare;

                    intent.putExtra(Intent.EXTRA_TEXT,urlShare_now);
//intent.putExtra(Intent.EXTRA_TEXT,message);
                    //intent.putExtra(Intent.EXTRA_PROCESS_TEXT,message);
                    startActivity(Intent.createChooser(intent,"Share"));



                }


            });


            txt_logout.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {

                    ArrayList<FoodDomain> foodlist = new ArrayList<>();
                    foodlist.add(new FoodDomain("1","1","item","Pepperoni pizza", "pizza1", "slices pepperoni ,mozzarella cheese, fresh oregano,  ground black pepper, pizza sauce", 9.76));
                    //foodlist.add(new FoodDomain(fooddomain.getProductId(),fooddomain.getTitle(),fooddomain.getPic(),fooddomain.getDescription(),fooddomain.getFee()));
                    managementCart.ClearCart(foodlist, 1, context, new ChangeNumberItemsListener() {
                        @Override
                        public void changed() {
                            //calculateCard();
                        }
                    }) ;

                    Intent intent = new Intent(UserProfile.this,UserLogin.class);

                    startActivity(intent);
                    finish();

                }
            });

            txt_exit.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {

                    ArrayList<FoodDomain> foodlist = new ArrayList<>();
                    foodlist.add(new FoodDomain("1","1","item","Pepperoni pizza", "pizza1", "slices pepperoni ,mozzarella cheese, fresh oregano,  ground black pepper, pizza sauce", 9.76));
                    //foodlist.add(new FoodDomain(fooddomain.getProductId(),fooddomain.getTitle(),fooddomain.getPic(),fooddomain.getDescription(),fooddomain.getFee()));
                    managementCart.ClearCart(foodlist, 1, context, new ChangeNumberItemsListener() {
                        @Override
                        public void changed() {
                            //calculateCard();
                        }
                    }) ;

                    ExitApp();

                }
            });




        }





    }



}