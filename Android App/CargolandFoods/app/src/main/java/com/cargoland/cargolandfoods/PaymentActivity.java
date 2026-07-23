package com.cargoland.cargolandfoods;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.graphics.Color;
import android.graphics.Rect;
import android.os.AsyncTask;
import android.os.Build;
import android.os.Bundle;
import android.text.Editable;
import android.text.Html;
import android.text.InputFilter;
import android.text.TextUtils;
import android.text.TextWatcher;
import android.util.Log;
import android.view.MotionEvent;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.view.inputmethod.InputMethodManager;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import org.json.JSONObject;

import java.text.DecimalFormat;
import java.text.NumberFormat;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;

import co.paystack.android.Paystack;
import co.paystack.android.PaystackSdk;
import co.paystack.android.Transaction;
import co.paystack.android.model.Card;
import co.paystack.android.model.Charge;

/* SEARC TEXT */


public class PaymentActivity extends AppCompatActivity {

    String UserNameHolder, LoginPasswordHolder, IMEIHolder, MessageResp;
    Boolean CheckEditText ;
    ProgressDialog progressDialog;
    String finalResult ,rst;
    //String HttpURL="https://www.cargoland.shiptodoor.com/cargoland/payment.php";
    String HttpURL="https://www.cargoland.shiptodoor.com/cargoland-foods-payment";

   String httpurl_payment="https://api.paygateplus.ng";


    String httpurl_testing="https://www.cargoland.shiptodoor.com/cargoland-foods-payment-test";

    HttpParse httpParse = new HttpParse();

    HttpParsePayment httpParsePayment = new HttpParsePayment();
    /* CARD NUMBER TEXT CHANGE */

    private   int TOTAL_SYMBOLS = 19; // size of pattern 0000-0000-0000-0000
    private   int TOTAL_DIGITS = 16; // max numbers of digits in pattern: 0000 x 4
    private static final int TOTAL_DIGITS_VERVE = 19; // max numbers of digits in pattern: 0000 x 4
    private static final int DIVIDER_MODULO = 5; // means divider position is every 5th symbol beginning with 1
    private static final int DIVIDER_POSITION = DIVIDER_MODULO - 1; // means divider position is every 4th symbol beginning with 0
    private static final char DIVIDER = '-';

    /* TEXT CHANGE END */



    private String cardType=null;
    private Button butPay = null;
    private Button butBack = null;
    private Toolbar  mTopToolbar;
    private String txtPrice;
    private String transaction_Id;


    private String txtSenderFname="";
    private String txtSenderSurname="";

    private String txtEmail="";

    private String txtSenderAddress;
    private String txtSenderCity;
    private String txtSenderPostCode;
    private String txtSenderCountry;
    private String txtSenderMobile;

    private String txtKg;
    private String txtDestination;
private String food_transId;
    private int txtDollar;

    private String transaction_message="Network";

    private int cardlength=16;

    EditText ed1, ed2, ed3, ed4, ed5, ed6,ed7,ed8;
    //String finalResult, rst, result;

    TextView tv1, tv2, tv3, tv4, tv5;


    private String spannerHolder, spanner1Holder, spanner2Holder, spanner3Holder, spanner4Holder, spanner5Holder, spanner6Holder,spannerDurexHolder,spanner7Holder, spanner8Holder, spanner9Holder,panner10Holder;

    private String txtSpinner1,txtUserId, txtSpinner3,txtPaymentType, txtSpinner2, txtSpinner4, txtSpinner5, txtSpinner6, txtSpinnerPop, txtSpinnerPop3, txtSpinnerPop4;

    Spinner spinner2, spinner1, spinner6, spinner3, spinner4, spinner5,spinnerCountry,spinnerState,spinnerLGA,spinnerKg,spinnerType;

    private  String txt1, txt2, txt3, txt4, txt5,txt6, txt7, txt8;
    // private boolean CheckEditText =false;
    private int error =0;
    boolean card_state=false;

    private RadioGroup radioStatusGroup;
    private RadioButton radioStatusButton;
    CardValidation cardValidation ;

    ImageView imageView4,imageView3,imageView5;
    //PriceActivity priceActivity;
private String signature;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        try {


            setContentView(R.layout.activity_payment);
            Toolbar toolbar = findViewById(R.id.toolbar);
            setSupportActionBar(toolbar);

            Window window = getWindow();

            /* Change status bar background color to white */
            window.clearFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN);

            window.addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS);

            int colorCodeLight = Color.parseColor("#ffffff");
            window.setStatusBarColor(colorCodeLight);



            if(true){
                View view =getWindow().getDecorView() ;
                view.setSystemUiVisibility(view.getSystemUiVisibility() | view.SYSTEM_UI_FLAG_LIGHT_STATUS_BAR);
            }else{
                View view =getWindow().getDecorView() ;
                view.setSystemUiVisibility(view.getSystemUiVisibility() & ~view.SYSTEM_UI_FLAG_LIGHT_STATUS_BAR);
            }






            window.clearFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN);

            window.addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS);

            colorCodeLight =Color.parseColor("#ffffff");
            window.setStatusBarColor(colorCodeLight);

            getSupportActionBar().setDisplayShowHomeEnabled(true);
            //getSupportActionBar().setLogo(R.drawable.logo5);
            getSupportActionBar().setDisplayUseLogoEnabled(true);
            getSupportActionBar().setTitle("   Send Items");

            //mTopToolbar=(Toolbar) findViewById(R.id.toolbar);
           // setSupportActionBar(mTopToolbar);
            butBack = findViewById(R.id.button2);



            tv1 = findViewById(R.id.lblAmount);
            ed1 = (EditText) findViewById(R.id.txtCard);
            ed2=findViewById(R.id.txtCVV);

            radioStatusGroup=(RadioGroup) findViewById(R.id.radio_status);
            int selectedId =radioStatusGroup.getCheckedRadioButtonId();
            radioStatusButton=(RadioButton) findViewById(selectedId);

            Intent intent3 = getIntent();
            transaction_Id =intent3.getStringExtra("transaction_Id");
           double prz= intent3.getDoubleExtra("txtPrice",0);
            txtPrice =String.valueOf(prz);
            txtSenderFname =intent3.getStringExtra("txtSenderFname");
            txtSenderSurname =intent3.getStringExtra("txtSenderSurname");
            txtSenderMobile =intent3.getStringExtra("txtSenderMobile");
            txtEmail =intent3.getStringExtra("txtEmail");
            txtUserId=intent3.getStringExtra("txtUserId");

            food_transId =intent3.getStringExtra("food_transId");

            imageView3= (ImageView) findViewById(R.id.imageView3);
            imageView4= (ImageView) findViewById(R.id.imageView4);
            imageView5= (ImageView) findViewById(R.id.imageView5);
           // txtKg=intent3.getStringExtra("txtKg");


            //tv1.setText("Amount Charge: "+txtPrice.toString());

            double amtv= Double.parseDouble(txtPrice.toString());

            if(Build.VERSION.SDK_INT >= Build.VERSION_CODES.N){
                tv1.setText("Amount Charge:" +Html.fromHtml("&#8358;",Html.FROM_HTML_MODE_COMPACT)+ formateCur(amtv)  );
            }else{
                tv1.setText("Amount Charge:" +Html.fromHtml("&#8358;") + formateCur(amtv)  );
            }



            getYear();
            addItemsOnSpinner3();

            addListenerOnSpinnerItemSelectionTitle();
            addListenerOnSpinnerItemSelectionYear();

            butBack.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    // Log.d(TAG, "Subscribing to weather topic");
                    Intent intent = new Intent(PaymentActivity.this,MenuActivity.class);
                    startActivity(intent);
                    finish();
                }
            });


            butPay = findViewById(R.id.butReg);

            double amntPr= Double.parseDouble(txtPrice.toString());

            if(Build.VERSION.SDK_INT >= Build.VERSION_CODES.N){
                butPay.setText(Html.fromHtml("&#8358;",Html.FROM_HTML_MODE_COMPACT)+ formateCur(amntPr) + " Pay Now" );
            }else{
                butPay.setText(Html.fromHtml("&#8358;") + formateCur(amntPr) + " Pay Now" );
            }
            //butPay.setText(formateCur(amntPr) + " Pay Now" );


            butPay.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {

                    try{



                        ValidateText();
                        // Log.d(TAG, "Subscribing to weather topic");
                        String CardNo =ed1.getText().toString();
                        Log.i(CardNo,"CardNo: "+CardNo);

                        if(cardType.equals("Master")){
                            card_state= cardValidation.isValidMasterCardNo(CardNo);
                            Log.i("CardType","Card Type: "+cardType);
                            //card_state=true;
                        }
                        if(cardType.equals("Visa")){
                            card_state= cardValidation.isValidVisaCardNo(CardNo);
                            Log.i("CardType","Card Type: "+cardType);
                        }

                        if(cardType.equals("Verve")){
                            card_state= cardValidation.isValidVervCardNo(CardNo);
                            Log.i("CardType","Card Type: "+cardType);
                        }
                        Log.i("card","card State: "+card_state);
                        if(card_state == false){
                            error=6;
                        }
                        if(transaction_message != null && !transaction_message.trim().equals("Network")){
                            Log.i("Network","************ im in faild network ******");
     /*
     This code is called when payment is successful and updating user record failed due to network
     failure or no network.
      */
                            UploadPage(transaction_message,txtUserId);
                            return;
                        }

                        if(CheckEditText || card_state)
                        {

                            performCharge();


/*
                    Intent intent = new Intent(PaymentActivity.this,PaymentThankActivity.class);
                startActivity(intent);

                finish();

 */

                        }
                        else {
                            if(error == 1){
                                Toast.makeText(PaymentActivity.this, "Debit/Credit Card has Expired.", Toast.LENGTH_LONG).show();
                                error = 0;
                                return;

                            }
                            if(error ==5){
                                Toast.makeText(PaymentActivity.this, "Minimum Card Number should be 15 digits.", Toast.LENGTH_LONG).show();
                                error = 0;
                                return;
                            }
                            if(error ==6){
                                Toast.makeText(PaymentActivity.this, "Card mismatch."+ cardType, Toast.LENGTH_LONG).show();
                                error = 0;
                                return;
                            }
                            else{
                                Toast.makeText(PaymentActivity.this, "Please fill all form fields.", Toast.LENGTH_LONG).show();

                            }
                        }
                    }catch (NullPointerException e){
                        e.printStackTrace();
                    }
                }


            });



            RadioGroup radioGroup = (RadioGroup) findViewById(R.id.radio_status);
            radioGroup.setOnCheckedChangeListener(new RadioGroup.OnCheckedChangeListener(){
                @Override
                public void onCheckedChanged(RadioGroup group, int checkedId) {


                    radioStatusGroup=(RadioGroup) findViewById(R.id.radio_status);

                    int selectedId =radioStatusGroup.getCheckedRadioButtonId();

                    radioStatusButton=(RadioButton) findViewById(selectedId);

                    Log.e("Id_RadioButton: ",radioStatusButton.toString());

                    Log.e("Id_Value: ",String.valueOf(selectedId).toString());

                    if(radioGroup.getCheckedRadioButtonId()== findViewById(R.id.radioNegative).getId()){
                        //masters
                        cardType="Master";
                        TOTAL_DIGITS=16 ;
                        TOTAL_SYMBOLS=19;
                    }
                    if(radioGroup.getCheckedRadioButtonId()== findViewById(R.id.radioPositive).getId()){
                        //visa
                        cardType="Visa";

                        TOTAL_DIGITS=16 ;
                        TOTAL_SYMBOLS=19;

                    }
                    if(radioGroup.getCheckedRadioButtonId()== findViewById(R.id.radioPending).getId()){
                        //verv
                        cardType="Verve";
                        TOTAL_DIGITS=19 ;
                        TOTAL_SYMBOLS=23;
                    }
                    Log.i("Card","----Card Type:"+cardType);

                    String choice =radioStatusButton.getText().toString();
                    //if(choice.equals("radioPending") )
                    //if(selectedId==2131296660){
                    if(cardType.equals("Verve")){
                        ed1.setText("");
                        //Verve Card
                        cardlength=23;

                    }
                    if(cardType.equals("Master")){
                        ed1.setText("");
                        //Verve Card
                        cardlength=19;

                    }
                    //if(choice.equals("radioPositive") || choice.equals("radioNegative") ){
                    if(cardType.equals("Visa")){
                        ed1.setText("");
                        //Verve Card
                        cardlength=19;

                    }



                }




            });

            ed1.addTextChangedListener(new TextWatcher() {
                @Override
                public void beforeTextChanged(CharSequence s, int start, int count, int after) {


                    InputFilter[] fArray = new InputFilter[1];
                    fArray[0] = new InputFilter.LengthFilter(cardlength);
                    ed1.setFilters(fArray);



                }

                @Override
                public void onTextChanged(CharSequence s, int start, int before, int count) {

                }

            /*
            @Override
            public void afterTextChanged(Editable s) {

            }

             */


                @Override
                public void afterTextChanged(Editable s) {

                    if (!isInputCorrect(s, TOTAL_SYMBOLS, DIVIDER_MODULO, DIVIDER)) {
                        s.replace(0, s.length(), buildCorrectString(getDigitArray(s, TOTAL_DIGITS), DIVIDER_POSITION, DIVIDER));
                    }
                }

                private boolean isInputCorrect(Editable s, int totalSymbols, int dividerModulo, char divider) {
                    boolean isCorrect = s.length() <= totalSymbols; // check size of entered string
                    for (int i = 0; i < s.length(); i++) { // check that every element is right
                        if (i > 0 && (i + 1) % dividerModulo == 0) {
                            isCorrect &= divider == s.charAt(i);
                        } else {
                            isCorrect &= Character.isDigit(s.charAt(i));
                        }
                    }
                    return isCorrect;
                }

                private String buildCorrectString(char[] digits, int dividerPosition, char divider) {
                    final StringBuilder formatted = new StringBuilder();

                    for (int i = 0; i < digits.length; i++) {
                        if (digits[i] != 0) {
                            formatted.append(digits[i]);
                            if ((i > 0) && (i < (digits.length - 1)) && (((i + 1) % dividerPosition) == 0)) {
                                formatted.append(divider);
                            }
                        }
                    }

                    return formatted.toString();
                }



                private char[] getDigitArray(final Editable s, final int size) {
                    char[] digits = new char[size];
                    int index = 0;
                    for (int i = 0; i < s.length() && index < size; i++) {
                        char current = s.charAt(i);
                        if (Character.isDigit(current)) {
                            digits[index] = current;
                            index++;
                        }
                    }
                    return digits;
                }




            });




            imageView3.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    //startActivity(new Intent(MenuActivity.this, MenuActivity.class));
             RadioButton    radioNeg =(RadioButton)  findViewById(R.id.radioNegative);
                        //masters
                    Log.i("data","Im in Master *************");
                    radioNeg.setChecked(true);
                        cardType="Master";
                        TOTAL_DIGITS=16 ;
                        TOTAL_SYMBOLS=19;

                }
            });


            imageView4.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    //startActivity(new Intent(MenuActivity.this, MenuActivity.class));
                    Log.i("data","Im in Visa");
                    RadioButton    radioPositive =(RadioButton)  findViewById(R.id.radioPositive);
                    radioPositive.setChecked(true);

                    cardType="Visa";

                    TOTAL_DIGITS=16 ;
                    TOTAL_SYMBOLS=19;



                }
            });


            imageView5.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    //startActivity(new Intent(MenuActivity.this, MenuActivity.class));
Log.i("data","Im in verve");
                    RadioButton    radioPending =(RadioButton)  findViewById(R.id.radioPending);
                    //verv
                    radioPending.setChecked(true);
                        cardType="Verve";
                        TOTAL_DIGITS=19 ;
                        TOTAL_SYMBOLS=23;


                }
            });



            payment("89966699", "1")   ;

            /* SEARCH TEXT */


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
        catch (Exception e) {
            e.printStackTrace();
        }



    }


    private String formateCur(double dbl){
        NumberFormat format  = new DecimalFormat("#,###.##");
        double myNumb= dbl;
        String formattedNo = format.format(myNumb);
        return formattedNo;
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

        list.add("01");
        list.add("02");
        list.add("03");
        list.add("04");
        list.add("05");
        list.add("06");
        list.add("07");
        list.add("08");
        list.add("09");
        list.add("10");
        list.add("11");
        list.add("12");
        //Toast.makeText(getApplicationContext(), "Im inside ", Toast.LENGTH_SHORT).show();

        ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1, list);
        dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinner3.setAdapter(dataAdapter);
    }


    public void addItemsOnSpinner4() {

        spinner4 = (Spinner) findViewById(R.id.spinner4);
        List<String> list = new ArrayList<String>();
        list.add("Select");

        ArrayAdapter<String> dataAdapter6 = new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1, list);
        dataAdapter6.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinner4.setAdapter(dataAdapter6);
    }




    /*CALLING METHOD THAT HELP TO HIDE KEYBOARD  WHEN TOUCH BODY */
    public void hideKeyboard(View view) {
        InputMethodManager inputMethodManager =(InputMethodManager)getSystemService(Activity.INPUT_METHOD_SERVICE);
        inputMethodManager.hideSoftInputFromWindow(view.getWindowToken(), 0);


    }


    public void addListenerOnSpinnerItemSelectionTitle() {
        spinner3 = (Spinner) findViewById(R.id.spinner3);
        //spinner2.setOnItemSelectedListener(new MyOnItemSelectedListener());
        txtSpinner3=(String) spinner3.getSelectedItem();
    }



    public void addListenerOnSpinnerItemSelectionYear() {
        spinner4 = (Spinner) findViewById(R.id.spinner4);
        //spinner2.setOnItemSelectedListener(new MyOnItemSelectedListener());

        txtSpinner4=(String) spinner4.getSelectedItem();

    }








    public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {

        txtSpinner3=(String) spinner3.getSelectedItem();

        txtSpinner4=(String) spinner4.getSelectedItem();





    }


    public void onNothingSelected(AdapterView<?> parent) {


    }


    private int getCurrentYear(){

        Date date = new Date();
        SimpleDateFormat  formatter = new SimpleDateFormat("dd-MM-yyyy HH:mm:ss");
        String strDate = formatter.format(date);
        SimpleDateFormat df = new SimpleDateFormat("yy");
        // String s =Integer.toString(i);
        String  stryear =df.format(date);
        int intYear = Integer.parseInt(stryear.toString());

        return intYear;
    }

    private int getCurrentMonth(){

        Date date = new Date();
        SimpleDateFormat  formatter = new SimpleDateFormat("dd-MM-yyyy HH:mm:ss");
        String strDate = formatter.format(date);
        SimpleDateFormat df = new SimpleDateFormat("MM");
        // String s =Integer.toString(i);
        String  stryear =df.format(date);
        int intMonth = Integer.parseInt(stryear.toString());

        return intMonth;
    }


    private  void getYear(){

        Date date = new Date();
        SimpleDateFormat  formatter = new SimpleDateFormat("dd-MM-yyyy HH:mm:ss");
        String strDate = formatter.format(date);
        SimpleDateFormat df = new SimpleDateFormat("yy");
        // String s =Integer.toString(i);
        String  stryear =df.format(date);
        int intYear = Integer.parseInt(stryear.toString());
        int i =0;
        spinner4 = (Spinner) findViewById(R.id.spinner4);
        List<String> list = new ArrayList<String>();

        list.add("Select");

        while( i <= 4){

            String s =Integer.toString(intYear);
            list.add(s);
            intYear += 1;
            i++;
        }

        ArrayAdapter<String> dataAdapter6 = new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1, list);
        dataAdapter6.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinner4.setAdapter(dataAdapter6);


    }


    public void ValidateText(){

        txt1 = ed1.getText().toString();
        txt2 = ed2.getText().toString();



        txtSpinner3 =String.valueOf(spinner3.getSelectedItem());
        txtSpinner4 =String.valueOf(spinner4.getSelectedItem());

        radioStatusGroup=(RadioGroup) findViewById(R.id.radio_status);
        int selectedId = radioStatusGroup.getCheckedRadioButtonId();


        if(selectedId <0){

            Log.e("Id_Value: ",String.valueOf(selectedId).toString());

            CheckEditText = false;
            return;
        }

        if(txt1.length() < 14){
            CheckEditText = false;
            error=5;
            return;
        }



        radioStatusButton= (RadioButton) findViewById(selectedId);
       /*
        Log.e("Choice: ",radioStatusButton.toString());
        Log.e("Card: ",txt1.toString());
        Log.e("CVV: ",txt2.toString());
        Log.e("Month: ",txtSpinner3.toString());
        Log.e("Year: ",txtSpinner4.toString());

        */


        String choice = radioStatusButton.getText().toString();
        String sel="Select";


        int curYear =getCurrentYear();
        int curMonth =getCurrentMonth();
        int selMonth =Integer.parseInt(txtSpinner3.toString());
        int selYear =Integer.parseInt(txtSpinner4.toString());

        Log.e("CurrentYear: ",String.valueOf(curYear));
        Log.e("CurrentMonth: ",String.valueOf(curMonth));
        Log.e("SelectedMonth: ",String.valueOf(selMonth));
        Log.e("SelectedYear: ",String.valueOf(selYear));



        if(curYear == selYear && selMonth < curMonth ){
            error=1;
            CheckEditText = false;

            return;
        }

        //choice.trim().equals("")||
        if( TextUtils.isEmpty(txt1)|| TextUtils.isEmpty(txt2)||  txtSpinner3.trim().equals(sel) ||  txtSpinner4.trim().equals(sel) )
        {

            CheckEditText = false;
            return;
        }
        else {

            CheckEditText = true ;
            return;
        }

    }


    private void initializePaystack() {
        PaystackSdk.initialize(getApplicationContext());
        //PaystackSdk.setPublicKey(BuildConfig.PSTK_PUBLIC_KEY);
         PaystackSdk.setPublicKey("pk_test_adf378fd05e75ef93e035dd5f2bcbb4b4ab6ab1a");

    }

    private String splitCurrency(String cur1,String cur){

        String[] amt = cur1.split(cur);
        //return cur;
        String amt1=amt[1];
        String[] amt2=amt1.split(",");
        String amounts=amt2[0].concat(amt2[1]);




        return  amounts.trim();

    }
    private void performCharge() {
        try{


            initializePaystack();
        /*
        Intent intent = getIntent();
        String cardNumber = mCardNumber.getEditText().getText().toString();
        String cardExpiry = mCardExpiry.getEditText().getText().toString();
        String cvv = mCardCVV.getEditText().getText().toString();
        String[] cardExpiryArray = cardExpiry.split("/");
        int expiryMonth = Integer.parseInt(cardExpiryArray[0]);
        int expiryYear = Integer.parseInt(cardExpiryArray[1]);

         */



            int expiryMonth =Integer.parseInt(txtSpinner3.toString());
            int expiryYear =Integer.parseInt(txtSpinner4.toString());

            Intent intent3 = getIntent();
            transaction_Id =intent3.getStringExtra("transaction_Id");
            double prz= intent3.getDoubleExtra("txtPrice",0);
            txtPrice =String.valueOf(prz);
           // txtPrice =intent3.getStringExtra("txtPrice");
            txtSenderFname =intent3.getStringExtra("txtSenderFname");
            txtSenderSurname =intent3.getStringExtra("txtSenderSurname");
            txtSenderMobile =intent3.getStringExtra("txtSenderMobile");
            txtEmail =intent3.getStringExtra("txtEmail");
            txtUserId=intent3.getStringExtra("txtUserId");
            food_transId =intent3.getStringExtra("food_transId");
            signature=intent3.getStringExtra("signature");

          //  txtPaymentType = intent3.getStringExtra("txtPaymentType");

            String cardNumber = ed1.getText().toString();
            String    cardNumber_=  replaceString(cardNumber);
            cardNumber =cardNumber_.trim();

            String cvv = ed2.getText().toString();

            int amount=0;

            Log.i("Amount","Amount: "+txtPrice);

            /*
            Log.i("Data","Substring Data: "+txtPrice.substring(0,1).trim());
            Log.i("Data","Substring Data: "+txtPrice.substring(1,1).trim());



            if(txtPrice.substring(0,3).trim().equals("NGN")){
                //String strAmount=splitCurrency(txtPrice,"NGN");
                String strAmount=txtPrice.replaceAll("[^\\d.]","");
                amount =Integer.parseInt(strAmount);
                Log.i("Data","Im in Naira: "+amount);
            }
            if(txtPrice.substring(0,1).trim().equals("$")){
                // amount =Integer.parseInt(splitCurrency(txtPrice,"$"));
                // String strAmount=splitCurrency(txtPrice,"$");
                String strAmount=txtPrice.replaceAll("[^\\d.]","");
                amount =Integer.parseInt(strAmount);
                amount =amount*txtDollar;

                Log.i("Data","Im in dolla: "+amount);
            }

            else{
                // amount =Integer.parseInt(splitCurrency(txtPrice,"$"));
                // String currencySybole =priceActivity.getNairaSymbole();

                Log.i("Amount","Amount: "+txtPrice);
                String strAmount=txtPrice.replaceAll("[^\\d.]","");
                //String strAmount=splitCurrency(txtPrice,currencySybole);
                Log.i("Amount","Currency Symbole: "+strAmount);


            }

             */
Log.i("Data","im before amount");

                //amount =Integer.parseInt(txtPrice);
                amount =(int) prz;

                // amount =amount*txtDollar;
            Log.i("Data","im After amount");


            Log.i("Amount","Amounts: "+amount);
            Log.i("Transactionid","Transaction Id: "+transaction_Id);
            Log.i("Email","Email: "+txtEmail);

            //int amount = intent.getIntExtra(getString(R.string.meal_name), 0);
            amount *= 100;
            // String strAmount=String.valueOf(amount);
            Log.i("Amount","Amount  "+amount);
            // int amounts=Integer.parseInt(strAmount.toString());
            Card card = new Card(cardNumber, expiryMonth, expiryYear, cvv);

            Log.i("Amount","Amount  "+amount);
            Log.i("level","Level 1");

            Charge charge = new Charge();
            Log.i("level","Level 2");
            charge.setAmount(amount);
            Log.i("level","Level 3");
            charge.setEmail(txtEmail);
            Log.i("level","Level 4");
            charge.setCard(card);
            Log.i("level","Level 5");
            charge.setReference(transaction_Id);
            Log.i("level","Level 6");
            charge.setCurrency("NGN");

            Log.i("Amount","-------Amount: "+amount);


            PaystackSdk.chargeCard(this, charge, new Paystack.TransactionCallback() {
                @Override
                public void onSuccess(Transaction transaction) {
                    parseResponse(transaction.getReference());

                }
                @Override
                public void beforeValidate(Transaction transaction) {
                    Log.d("Main Activity", "beforeValidate: " + transaction.getReference());
                }
                @Override
                public void onError(Throwable error, Transaction transaction) {
                    Log.d("Main Activity", "onError: " + error.getLocalizedMessage());
                    Log.d("Main Activity", "onError: " + error);
                    Toast.makeText(PaymentActivity.this,error.getLocalizedMessage(),Toast.LENGTH_LONG).show();

                }
            });

        }
        catch (NumberFormatException e){
            e.printStackTrace();
        } catch (NullPointerException e){
            e.printStackTrace();

        } catch (Exception e){
            e.printStackTrace();
        }
    }

    private void parseResponse(String transactionReference) {
        String message = "Payment Successful  " + transactionReference;
        //Toast.makeText(this, message, Toast.LENGTH_LONG).show();
        Log.i("Transaction",message);
        transaction_message=transactionReference;
        UploadPage(transactionReference,txtUserId);
    }

    private String replaceString(String str1){
        String cards =str1.replace("-","");

        Log.i("CardNo","Card Numb Replace: " +cards);
        return cards;

    }


    public void UploadPage(final String transactionid, final String userid){

        class LoginClass extends AsyncTask<String,Void,String> {

            @Override
            protected void onPreExecute() {
                super.onPreExecute();

/*
                if(latitude_s>0) {
                    locationManager.removeUpdates(locationListener);
                    locationManager = null;
                }*/
                // progressDialog = ProgressDialog.show(LoginUsers.this,"Login ....",null,true,true);
                progressDialog =ProgressDialog.show(PaymentActivity.this,"Payment", "Please wait...",false,false);
                //progressDialog = ProgressDialog.show(UserReg.this,"Sending ....",null,true,true);
            }

            @Override
            protected void onPostExecute(String httpResponseMsg) {
                try{
                    super.onPostExecute(httpResponseMsg);

                    progressDialog.dismiss();
                    Log.e("line ",httpResponseMsg.toString());
                    // Toast.makeText(UserLogin.this,httpResponseMsg.toString(), Toast.LENGTH_LONG).show();

                    // MessageResp = httpResponseMsg.replaceAll("^\"|\"$", "");
                    /*
                    String[] strsplit=httpResponseMsg.split("_");
                    httpResponseMsg =strsplit[0];

                    MessageResp = httpResponseMsg.toString().replaceAll("\"","");

                    String userid = strsplit[1].toString().replaceAll("\"","");


                    httpResponseMsg=MessageResp;

*/
                    int msg= Integer.parseInt(httpResponseMsg);

                    //if(httpResponseMsg.trim().equalsIgnoreCase("Success")){
                    if(msg==1){

                        Intent intent = new Intent(PaymentActivity.this,PaymentThankActivity.class);
                        startActivity(intent);

                        finish();

                    }




                    else{

                        Toast.makeText(PaymentActivity.this,httpResponseMsg,Toast.LENGTH_LONG).show();
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


                    JSONObject postDataParams = new JSONObject();


                    postDataParams.put("transactionId", params[0]);
                    postDataParams.put("userId", params[1]);
                    postDataParams.put("txtSenderFname", txtSenderFname);
                    postDataParams.put("txtSenderSurname", txtSenderSurname);
                    postDataParams.put("txtSenderMobile", txtSenderMobile);
                    postDataParams.put("food_transId", food_transId);





                    Log.e("params",postDataParams.toString());

                    finalResult = httpParse.postRequest(postDataParams, HttpURL);



                } catch (Exception e) {
                    e.printStackTrace();
                }



                return finalResult;
            }
        }

        LoginClass logClass = new LoginClass();

        logClass.execute(transactionid,userid);
    }






   /* TESTING NEW PAYMENT SYSTEM */

    public void payment(final String transactionid, final String userid){

        class LoginClass extends AsyncTask<String,Void,String> {

            @Override
            protected void onPreExecute() {
                super.onPreExecute();

/*
                if(latitude_s>0) {
                    locationManager.removeUpdates(locationListener);
                    locationManager = null;
                }*/
                // progressDialog = ProgressDialog.show(LoginUsers.this,"Login ....",null,true,true);
                progressDialog =ProgressDialog.show(PaymentActivity.this,"Payment", "Please wait...",false,false);
                //progressDialog = ProgressDialog.show(UserReg.this,"Sending ....",null,true,true);
            }

            @Override
            protected void onPostExecute(String httpResponseMsg) {
                try{
                    super.onPostExecute(httpResponseMsg);

                    progressDialog.dismiss();
                    Log.e("line ",httpResponseMsg.toString());
                    // Toast.makeText(UserLogin.this,httpResponseMsg.toString(), Toast.LENGTH_LONG).show();

                    // MessageResp = httpResponseMsg.replaceAll("^\"|\"$", "");
                    /*
                    String[] strsplit=httpResponseMsg.split("_");
                    httpResponseMsg =strsplit[0];

                    MessageResp = httpResponseMsg.toString().replaceAll("\"","");

                    String userid = strsplit[1].toString().replaceAll("\"","");


                    httpResponseMsg=MessageResp;

*/


                    /*
                    int msg= Integer.parseInt(httpResponseMsg);
                    if(msg==1){

                        Intent intent = new Intent(PaymentActivity.this,PaymentThankActivity.class);
                        startActivity(intent);

                        finish();

                    }




                    else{

                        Toast.makeText(PaymentActivity.this,httpResponseMsg,Toast.LENGTH_LONG).show();
                        // Log.w("myApp", "no networks");

                        Log.w("Message", httpResponseMsg);

                    }

                     */
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


                    Intent intent3 = getIntent();
                    transaction_Id =intent3.getStringExtra("transaction_Id");
                    double prz= intent3.getDoubleExtra("txtPrice",0);
                    txtPrice =String.valueOf(prz);
                    txtPrice ="300000";
                      //txtPrice =intent3.getStringExtra("txtPrice");
                    txtSenderFname =intent3.getStringExtra("txtSenderFname");
                    txtSenderSurname =intent3.getStringExtra("txtSenderSurname");
                    txtSenderMobile =intent3.getStringExtra("txtSenderMobile");
                    txtEmail =intent3.getStringExtra("txtEmail");
                    txtUserId=intent3.getStringExtra("txtUserId");
                    food_transId =intent3.getStringExtra("food_transId");
                    signature=intent3.getStringExtra("signature");


                    JSONObject postDataParams = new JSONObject();


                    postDataParams.put("transactionId", transaction_Id);
                    postDataParams.put("userId", params[1]);
                    postDataParams.put("txtSenderFname", txtSenderFname);
                    postDataParams.put("txtSenderSurname", txtSenderSurname);
                    postDataParams.put("txtSenderMobile", txtSenderMobile);
                    postDataParams.put("food_transId", food_transId);
                    postDataParams.put("mock_mode", "Inspect");

                    postDataParams.put("txtPrice", txtPrice);
                    postDataParams.put("signature", signature);
                    postDataParams.put("txtEmail", txtEmail);


                    Log.e("params",postDataParams.toString());

                    //finalResult = httpParsePayment.postRequest(postDataParams, httpurl_testing,signature);
                    finalResult = httpParse.postRequest(postDataParams, httpurl_testing);















                } catch (Exception e) {
                    e.printStackTrace();
                }



                return finalResult;
            }
        }

        LoginClass logClass = new LoginClass();

        logClass.execute(transactionid,userid);
    }





}