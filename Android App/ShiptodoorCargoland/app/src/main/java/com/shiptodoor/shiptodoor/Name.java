package com.shiptodoor.shiptodoor;


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

import android.widget.AdapterView;
import android.widget.ArrayAdapter;

import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Spinner;
import android.widget.Toast;
import android.view.inputmethod.InputMethodManager;


import android.widget.EditText;


import java.util.ArrayList;
import java.util.List;


public class Name extends AppCompatActivity implements AdapterView.OnItemSelectedListener  {


   // AdapterView.OnItemSelectedListener

    private Toolbar  mTopToolbar;
    private Button butBack = null;

    private Button butName = null;
    private Button send_restriction= null;

    private ArrayList<String> country_list = new ArrayList<>();

    private String spannerHolder, spanner1Holder, spanner2Holder, spanner3Holder, spanner4Holder, spanner5Holder, spanner6Holder,spannerDurexHolder,spanner7Holder, spanner8Holder, spanner9Holder,panner10Holder, IMEIHolder;

    private String txtSpanner1, txtSpanner3, txtSpanner2, txtSpanner4, txtSpanner5, txtSpanner6, txtSpinnerPop, txtSpinnerPop3, txtSpinnerPop4;

    Spinner spinner2, spinner1, spinner6, spinner3, spinner4, spinner5,spinnerDurex,spinnerPrice,spinnerComp,spinnerProm;

    private  String txt1, txt2, txt3, txt4, txt5,txt6, txt7, txt8;
    private Boolean CheckEditText;

    private  RadioGroup radioStatusGroup;
    private RadioButton radioStatusButton;

    ArrayAdapter adapter;
    EditText ed1, ed2, ed3, ed4, ed5, ed6,ed7,ed8;

    private String txtFname="";
    private String txtSurname="";
    private String txtGender=null;
    private String txtEmail="";

    private String txtTitle="";

    private String txtPassword="";

    private String txtAddress;
    private String txtCity;
    private String txtPostCode;
    private String txtCountry;
    private String txtMobile;
    private int selected_Id= 0;
     private int txtselected_Id;
private  int  genderLenth=0;
    private int txtselected_country_Id;


    private String txtSenderState;
    private String txtSenderlga;

    private int lga_id ;
    private int state_id ;


    Context context;
    Intent intent;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        try{
        setContentView(R.layout.activity_name);
        Toolbar toolbar = findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);


            Window window = getWindow();

            /* Change status bar background color to white */
            window.clearFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN);

            window.addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS);

            int colorCodeLight = Color.parseColor("#ffffff");
            window.setStatusBarColor(colorCodeLight);



        butName = findViewById(R.id.butReg);
        butBack = findViewById(R.id.button2);
        send_restriction=findViewById(R.id.send_restriction);

        radioStatusGroup=(RadioGroup) findViewById(R.id.radio_status);

        ed1 = (EditText) findViewById(R.id.txtFname);
        ed2 = (EditText) findViewById(R.id.txtSurname);

        int selectedId =radioStatusGroup.getCheckedRadioButtonId();
        radioStatusButton=(RadioButton) findViewById(selectedId);

        update_Text();





        getSupportActionBar().setDisplayShowHomeEnabled(true);
        //getSupportActionBar().setLogo(R.drawable.logo5);
          getSupportActionBar().setDisplayUseLogoEnabled(true);
        getSupportActionBar().setTitle("   Sign up");

        mTopToolbar=(Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(mTopToolbar);


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

        send_restriction.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    // Log.d(TAG, "Subscribing to weather topic");

                    try{
                    Intent intent = new Intent(Name.this,sendingRestrictionActivity.class);


                    int loc=2;
                    intent.putExtra("loc",loc);
                    intent.putExtra("txtFname",txt1);
                    intent.putExtra("txtSurname",txt2);
                    intent.putExtra("txtGender",radioStatusButton.getText().toString());

                    startActivity(intent);
                    finish();
                    }catch(NullPointerException e){
                        e.printStackTrace();
                    }
                }
            });

        butBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Log.d(TAG, "Subscribing to weather topic");
                try{
                Intent intent = new Intent(Name.this,UserLogin.class);

                intent.putExtra("txtEmail",txtEmail);
                intent.putExtra("txtFname",txtFname);
                intent.putExtra("txtSurname",txtSurname);
                intent.putExtra("txtGender",txtGender);
                intent.putExtra("txtPassword",txtPassword);
                intent.putExtra("txtAddress",txt1);
                intent.putExtra("txtCity",txt2);
                intent.putExtra("txtPostCode",txtPostCode);
                intent.putExtra("txtMobile",txtMobile);
                intent.putExtra("txtCountry",txtCountry);
                intent.putExtra("txtTitle",spanner3Holder);
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

                }catch(NullPointerException e){
                    e.printStackTrace();
                }
            }
        });


        butName.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Log.d(TAG, "Subscribing to weather topic");

                try{
                ValidateText();
                if(CheckEditText)
                {
                    int selectedId =radioStatusGroup.getCheckedRadioButtonId();
                    radioStatusButton=(RadioButton) findViewById(selectedId);

                    //Toast.makeText(Name.this, "Data: "+selectedId +" "+ " "+radioStatusButton.getText().toString(), Toast.LENGTH_LONG).show();

String genders =radioStatusButton.getText().toString();

                    //Toast.makeText(Name.this, "Data: "+txt1 +" "+txt2 + " "+radioStatusButton.getText().toString(), Toast.LENGTH_LONG).show();
                    genderLenth = genders.length();

                    Intent intent = new Intent(Name.this,EmailActivity.class);

                    intent.putExtra("txtFname",txt1);
                    intent.putExtra("txtSurname",txt2);
                    intent.putExtra("txtGender",radioStatusButton.getText().toString());
                    intent.putExtra("txtEmail",txtEmail);
                    intent.putExtra("txtPassword",txtPassword);
                    intent.putExtra("txtAddress",txtAddress);
                    intent.putExtra("txtCity",txtCity);
                    intent.putExtra("txtPostCode",txtPostCode);
                    intent.putExtra("txtMobile",txtMobile);
                    intent.putExtra("txtCountry",txtCountry);
                    intent.putExtra("txtTitle",spanner3Holder);
                    intent.putExtra("txtselected_Id",selected_Id);
                    intent.putExtra("txtselected_Id",selected_Id);
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
                else {
                    Toast.makeText(Name.this, "Please fill all form fields.", Toast.LENGTH_LONG).show();
                }


                }catch(NullPointerException e){
                    e.printStackTrace();
                }

            }
        });

        butBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Log.d(TAG, "Subscribing to weather topic");
                Intent intent = new Intent(Name.this,UserLogin.class);
                startActivity(intent);
                finish();


            }
        });

        addItemsOnSpinner3();
        spinner3.setOnItemSelectedListener(this);
        spinner3.setOnItemSelectedListener(this);



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


    public void addItemsOnSpinner3() {

        spinner3 = (Spinner) findViewById(R.id.spinner3);
        List<String> list = new ArrayList<String>();
        list.add("Select");
        list.add("Mr");
        list.add("Mrs");
        list.add("Miss");
        list.add("Chief");

        ArrayAdapter<String> dataAdapter6 = new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1, list);
        dataAdapter6.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinner3.setAdapter(dataAdapter6);
    }


    /*CALLING METHOD THAT HELP TO HIDE KEYBOARD  WHEN TOUCH BODY */
    public void hideKeyboard(View view) {
        InputMethodManager inputMethodManager =(InputMethodManager)getSystemService(Activity.INPUT_METHOD_SERVICE);
        inputMethodManager.hideSoftInputFromWindow(view.getWindowToken(), 0);


    }


    public void addListenerOnSpinnerItemSelectionTitle() {
        spinner3 = (Spinner) findViewById(R.id.spinner3);
        //spinner2.setOnItemSelectedListener(new MyOnItemSelectedListener());
        txtSpinnerPop3=(String) spinner3.getSelectedItem();
    }




    @Override
    public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {

try{


        txtSpinnerPop3=(String) spinner3.getSelectedItem();

}catch (NullPointerException e){
    e.printStackTrace();
}
    }


    public void onNothingSelected(AdapterView<?> parent) {


    }





    public void ValidateText(){

        txt1 = ed1.getText().toString();
        txt2 = ed2.getText().toString();
        spanner3Holder =String.valueOf(spinner3.getSelectedItem());
        selected_Id=  spinner3.getSelectedItemPosition();
        //itemPosition =parseStr(int_index);

        String sel="Select";

        if( TextUtils.isEmpty(txt1)|| TextUtils.isEmpty(txt2) ||  spanner3Holder.trim().equals(sel) )
        {

            CheckEditText = false;

        }
        else {

            CheckEditText = true ;

        }

    }


    public void update_Text(){

        try{
        Intent intent = getIntent();

        txtAddress = intent.getStringExtra("txtAddress");
        if(txtAddress != null)
        {
            country_list = (ArrayList<String>) getIntent().getSerializableExtra("key");
        }
        txtFname = intent.getStringExtra("txtFname");
        txtSurname = intent.getStringExtra("txtSurname");
        txtGender = intent.getStringExtra("txtGender");
        txtEmail = intent.getStringExtra("txtEmail");
        txtPassword = intent.getStringExtra("txtPassword");

        txtTitle = intent.getStringExtra("txtTitle");

        txtAddress = intent.getStringExtra("txtAddress");
        txtCity = intent.getStringExtra("txtCity");
        txtPostCode = intent.getStringExtra("txtPostCode");
        txtMobile = intent.getStringExtra("txtMobile");
        txtCountry = intent.getStringExtra("txtCountry");

        txtTitle = intent.getStringExtra("txtTitle");
        txtselected_Id = intent.getIntExtra("txtselected_Id",0);

        txtselected_country_Id = intent.getIntExtra("txtselected_country_Id",0);

        genderLenth = intent.getIntExtra("genderLenth",0);


        txtSenderlga  =intent.getStringExtra("txtSenderlga");
        txtSenderState=intent.getStringExtra("txtSenderState");

        lga_id = intent.getIntExtra("lga_id",0);
        state_id = intent.getIntExtra("state_id",0);
        txtselected_country_Id = intent.getIntExtra("txtselected_country_Id",0);


        ed1.setText(txtFname);
        ed2.setText(txtSurname);


        if(genderLenth == 6){
            radioStatusGroup.check(R.id.radioPositive);
        }

         //Toast.makeText(Name.this, "Data: "+txtGender.length()  , Toast.LENGTH_LONG).show();

/*
 String str ="Female";

        if(txtGender.equals("Female")) {

            //radioStatusGroup=(RadioGroup) findViewById(R.id.radio_status);
            radioStatusGroup.check(R.id.radioPositive);

        }



 */







        if(txtselected_Id != 0 ){
            spinner3 = (Spinner) findViewById(R.id.spinner3);
            spinner3.setSelection(txtselected_Id);
        }

        //Toast.makeText(Name.this, "Name: ."+ txtFname, Toast.LENGTH_LONG).show();


        // radioStatusButton=(RadioButton) findViewById(selected_Id);


        //String.valueOf(spinner3.getSelectedItem());
        }catch(NullPointerException e){
            e.printStackTrace();
        }

    }

private void selectValue(Spinner spinner3, Object value ){


}

@Override
public void onResume(){
       super.onResume();
    if(txtselected_Id != 0 ){
        spinner3 = (Spinner) findViewById(R.id.spinner3);
        spinner3.setSelection(txtselected_Id);
    }



}

}