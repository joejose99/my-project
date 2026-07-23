package com.cargoland.cargolandfoods;

import android.os.Bundle;

import com.google.android.material.snackbar.Snackbar;

import androidx.appcompat.app.AppCompatActivity;

import android.view.View;

import androidx.navigation.NavController;
import androidx.navigation.Navigation;
import androidx.navigation.ui.AppBarConfiguration;
import androidx.navigation.ui.NavigationUI;



import android.graphics.Color;
import android.graphics.Rect;
import android.os.Bundle;



import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import android.text.TextUtils;
import android.view.MotionEvent;
import android.view.View;

import android.content.Intent;
import android.view.Window;
import android.view.WindowManager;
import android.widget.Button;


import android.content.Context;


import android.app.Activity;

import android.widget.Toast;
import android.view.inputmethod.InputMethodManager;


import android.widget.EditText;


import java.util.ArrayList;


import com.cargoland.cargolandfoods.databinding.ActivityEmailBinding;

public class email extends AppCompatActivity {

    private AppBarConfiguration appBarConfiguration;
    private ActivityEmailBinding binding;


    private Button butEmail = null;
    private Button butBack = null;
    private Toolbar  mTopToolbar;
    private String txtFname="";
    private String txtSurname="";
    private String txtGender="";
    private String txtEmail="";
    private int selected_Id= 0;

    private String txtPassword="";
    private ArrayList<String> country_list = new ArrayList<>();
    private ArrayList<String> lga_list = new ArrayList<>();
    private ArrayList<String> unit_list = new ArrayList<>();


    private String txtBranch;
    private int branch_id=0;
    private ArrayList<String> branch_list = new ArrayList<>();



    private String txtAddress;
    private String txtCity;
    private String txtPostCode;
    private String txtCountry;
    private String txtMobile;


    private String txtProfession;
    private String txtBus_Stop;
    private int unit_id ;
    private String txtUnit;
    private String txtMember_status;
    private int   churchStatus_length;


    private String txtReferral;

    private  String txtTitle;

    private int txtselected_country_Id;
    private int genderLenth;
    private int txtselected_Id;

    private String txtSenderState;
    private String txtSenderlga;

    private int lga_id ;
    private int state_id ;


    private  String txt1, txt2;
    EditText ed1, ed2;
    private Boolean CheckEditText;

    private int sel=0;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        try{

            setContentView(R.layout.activity_email);
            Toolbar toolbar = findViewById(R.id.toolbar);
            setSupportActionBar(toolbar);

            butEmail = findViewById(R.id.butReg);

            butBack = findViewById(R.id.button2);

            getSupportActionBar().setDisplayShowHomeEnabled(true);
            //getSupportActionBar().setLogo(R.drawable.logo5);
            getSupportActionBar().setDisplayUseLogoEnabled(true);
            getSupportActionBar().setTitle("   Sign up");

            mTopToolbar=(Toolbar) findViewById(R.id.toolbar);
            setSupportActionBar(mTopToolbar);


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

            getSupportActionBar().setDisplayShowHomeEnabled(true);
            //getSupportActionBar().setLogo(R.drawable.logo5c);
            getSupportActionBar().setDisplayUseLogoEnabled(true);
            getSupportActionBar().setTitle("   Sign up");

            ed1 = (EditText) findViewById(R.id.txtEmail);
            ed2 = (EditText) findViewById(R.id.txtConEmail);

            Intent intent3 = getIntent();
            txtFname = intent3.getStringExtra("txtFname");
            txtSurname = intent3.getStringExtra("txtSurname");
            txtGender = intent3.getStringExtra("txtGender");
            // txtEmail = intent3.getStringExtra("txtEmail");


            update_Text();


            butBack.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    // Log.d(TAG, "Subscribing to weather topic");
                    try{
                        Intent intent = new Intent(email.this,name.class);

                        txtEmail = ed1.getText().toString();


                        intent.putExtra("txtEmail",txtEmail);
                        intent.putExtra("txtFname",txtFname);
                        intent.putExtra("txtSurname",txtSurname);
                        intent.putExtra("txtGender",txtGender);
                        intent.putExtra("txtPassword",txtPassword);
                        intent.putExtra("txtAddress",txtAddress);
                        intent.putExtra("txtCity",txtCity);
                        intent.putExtra("txtPostCode",txtPostCode);
                        intent.putExtra("txtMobile",txtMobile);

                        intent.putExtra("txtBus_Stop",txtBus_Stop);
                        intent.putExtra("txtProfession",txtProfession);
                        intent.putExtra("txtUnit",txtUnit);
                        intent.putExtra("unit_id",unit_id);
                        intent.putExtra("txtMember_status", txtMember_status);

                        intent.putExtra("key_unit", unit_list);
                        intent.putExtra("churchStatus_length",churchStatus_length);

                        intent.putExtra("txtBranch",txtBranch);
                        intent.putExtra("key_branch", branch_list);
                        intent.putExtra("branch_id",branch_id);

                        intent.putExtra("txtReferral",txtReferral);
                        intent.putExtra("txtCountry",txtCountry);
                        intent.putExtra("txtTitle",txtTitle);
                        intent.putExtra("txtselected_Id",txtselected_Id);
                        intent.putExtra("txtselected_country_Id",txtselected_country_Id);
                        intent.putExtra("genderLenth",genderLenth);
                        intent.putExtra("key", country_list);
                        intent.putExtra("key_lga", lga_list);
                        intent.putExtra("txtSenderState",txtSenderState);
                        intent.putExtra("txtSenderlga",txtSenderlga);

                        intent.putExtra("state_id",state_id);
                        intent.putExtra("lga_id",lga_id);




                        startActivity(intent);
                        finish();

                    }catch(NullPointerException e){
                        e.printStackTrace();
                    }
                }
            });

            butEmail.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {

                    try{
                        // Log.d(TAG, "Subscribing to weather topic");
                        ValidateText();
                        boolean email_compare= isMatches(txt1.trim(),txt2.trim());

                        boolean email_check= isValid(txt1);
                        if(email_check && CheckEditText && email_compare)
                        {
                            Intent intent = new Intent(email.this,password.class);

                            intent.putExtra("txtEmail",txt1);
                            intent.putExtra("txtFname",txtFname);
                            intent.putExtra("txtSurname",txtSurname);
                            intent.putExtra("txtGender",txtGender);


                            intent.putExtra("txtPassword",txtPassword);
                            intent.putExtra("txtAddress",txtAddress);
                            intent.putExtra("txtCity",txtCity);
                            intent.putExtra("txtPostCode",txtPostCode);
                            intent.putExtra("txtMobile",txtMobile);

                            intent.putExtra("txtBus_Stop",txtBus_Stop);
                            intent.putExtra("txtProfession",txtProfession);
                            intent.putExtra("txtUnit",txtUnit);
                            intent.putExtra("unit_id",unit_id);
                            intent.putExtra("txtMember_status", txtMember_status);

                            intent.putExtra("txtBranch",txtBranch);
                            intent.putExtra("key_branch", branch_list);
                            intent.putExtra("branch_id",branch_id);



                            intent.putExtra("key_unit", unit_list);

                            intent.putExtra("txtReferral",txtReferral);

                            intent.putExtra("txtCountry",txtCountry);
                            intent.putExtra("txtTitle",txtTitle);
                            intent.putExtra("txtselected_Id",txtselected_Id);
                            intent.putExtra("txtselected_country_Id",txtselected_country_Id);
                            intent.putExtra("genderLenth",genderLenth);
                            intent.putExtra("churchStatus_length",churchStatus_length);


                            intent.putExtra("key", country_list);
                            intent.putExtra("key_lga", lga_list);
                            intent.putExtra("txtSenderState",txtSenderState);
                            intent.putExtra("txtSenderlga",txtSenderlga);

                            intent.putExtra("state_id",state_id);
                            intent.putExtra("lga_id",lga_id);

                            startActivity(intent);
                            finish();
                        }
                        else{
                            Toast.makeText(email.this, "Please fill all form fields Correctly.", Toast.LENGTH_LONG).show();
                        }

                    }catch(NullPointerException e){
                        e.printStackTrace();
                    }


                }
            });


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


    public void hideKeyboard(View view) {
        InputMethodManager inputMethodManager =(InputMethodManager)getSystemService(Activity.INPUT_METHOD_SERVICE);
        inputMethodManager.hideSoftInputFromWindow(view.getWindowToken(), 0);


    }


    public static boolean isValid(String email) {
        String regex = "^[\\w-_\\.+]*[\\w-_\\.]\\@([\\w]+\\.)+[\\w]+[\\w]$";
        return email.matches(regex);
    }

    public static boolean  isMatches(String email, String conEmail){
        return email.matches(conEmail);
    }


    public void ValidateText(){

        txt1 = ed1.getText().toString();
        txt2 = ed2.getText().toString();



        if( TextUtils.isEmpty(txt1)|| TextUtils.isEmpty(txt2)  )
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

            txtAddress = intent4.getStringExtra("txtAddress");
            txtBranch = intent4.getStringExtra("txtBranch");
            if(txtAddress != null)
            {
                country_list = (ArrayList<String>) getIntent().getSerializableExtra("key");
                lga_list = (ArrayList<String>) getIntent().getSerializableExtra("key_lga");

                unit_list  = (ArrayList<String>) getIntent().getSerializableExtra("key_unit");

                branch_list = (ArrayList<String>) getIntent().getSerializableExtra("key_branch");


            }

            if(txtBranch != null)
            {
                branch_list = (ArrayList<String>) getIntent().getSerializableExtra("key_branch");

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

            txtBranch = intent4.getStringExtra("txtBranch");
            branch_id = intent4.getIntExtra("branch_id",0);


            txtBus_Stop = intent4.getStringExtra("txtBus_Stop");
            txtProfession= intent4.getStringExtra("txtProfession");
            txtUnit= intent4.getStringExtra("txtUnit");
            txtMember_status= intent4.getStringExtra("txtMember_status");
            unit_id = intent4.getIntExtra("unit_id",0);

            churchStatus_length = intent4.getIntExtra("churchStatus_length",0);




            txtReferral = intent4.getStringExtra("txtReferral");

            txtCountry = intent4.getStringExtra("txtCountry");

            txtTitle = intent4.getStringExtra("txtTitle");

            txtselected_Id = intent4.getIntExtra("txtselected_Id",0);
            txtselected_country_Id = intent4.getIntExtra("txtselected_country_Id",0);

            genderLenth = intent4.getIntExtra("genderLenth",0);
            genderLenth = intent4.getIntExtra("genderLenth",0);

            ed1.setText(txtEmail);
            ed2.setText(txtEmail);


            txtSenderlga  =intent4.getStringExtra("txtSenderlga");
            txtSenderState=intent4.getStringExtra("txtSenderState");

            lga_id = intent4.getIntExtra("lga_id",0);
            state_id = intent4.getIntExtra("state_id",0);
            txtselected_country_Id = intent4.getIntExtra("txtselected_country_Id",0);


            //String.valueOf(spinner3.getSelectedItem());
        }catch(NullPointerException e){
            e.printStackTrace();
        }

    }





}