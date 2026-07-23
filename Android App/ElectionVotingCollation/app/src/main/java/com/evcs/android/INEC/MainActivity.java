package com.eciels.android.INEC;

import java.util.ArrayList;
import java.util.List;

import  com.eciels.android.INEC.R;


import android.annotation.SuppressLint;
import android.app.ProgressDialog;
//import android.support.v7.app.AppCompatActivity;
import android.text.TextUtils;
import android.util.Log;

import java.util.HashMap;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

//import com.androidbegin.jsonspinnertutorial.MainActivity;
//import com.androidbegin.jsonspinnertutorial.R;

 
//import com.androidbegin.jsonspinnertutorial.MainActivity;

import android.provider.Settings;

import android.os.AsyncTask;
 
 //import com.javacodegeeks.android.androidspinnerexample.R;
 

import android.app.Activity;
import android.content.Intent;
import android.graphics.Color;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.View.OnClickListener;
import android.view.Window;
import android.view.WindowManager;
import android.view.inputmethod.InputMethodManager;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemSelectedListener;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.ScrollView;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

//import android.support.v7.app.AppCompatActivity;
 
public class MainActivity extends AppCompatActivity implements
OnItemSelectedListener {
 
  private Spinner spinner1, spinner2,spinner3, spinner4,spinner5,spinner6;
  private Button button;

  private String totalVote;
  ArrayAdapter adapter;
 
  Button b1,b2;

CheckBox checkbox;

  EditText ed1,edMessage;

  TextView tx1,Message,msgMessage;
  String UserNameHolder, LoginPasswordHolder, IMEIHolder, MessageResp;
  String  spanner1Holder,spanner2Holder,spanner3Holder,spanner4Holder,spanner5Holder,spanner6Holder;
  
  String  txtSpanner1, txtSpanner2 , txtSpanner3 , txtSpanner4 , txtSpanner5 , txtSpanner6,txtSpinnerPop,txtSpinnerPop3,txtSpinnerPop4;
  
	Boolean CheckEditText ;
  ProgressDialog progressDialog;
  String finalResult ,rst;

  /*
  String HttpURL="https://www.evcs.ng/project/sendResult.php";
  
  String HttpURL_LGA="https://www.evcs.ng/project/populateSpinner.php";
  
   String HttpURL_WARDS="https://www.evcs.ng/project/populateSpinnerWards.php";

  
 String HttpURL_POLUNIT="https://www.evcs.ng/project/populateSpinnerPolUnit.php";

    String HttpURL_Accronym="https://www.evcs.ng/project/populateTextbox.php";


   */

    String HttpURL="https://evcs.ng/project/sendResult.php";

    String HttpURL_LGA="https://evcs.ng/project/populateSpinner.php";

    String HttpURL_WARDS="https://evcs.ng/project/populateSpinnerWards.php";


    String HttpURL_POLUNIT="https://evcs.ng/project/populateSpinnerPolUnit.php";

    String HttpURL_Accronym="https://evcs.ng/project/populateTextbox.php";



    String[] heroes_accronyms ;
  
  String Errors;
  
  List<String> list = new ArrayList<String>();


    List<String> listParty = new ArrayList<String>();
  
  HttpParse httpParse = new HttpParse();
public JSONObject postData;



  String  select="Select";
  @Override
  public void onCreate(Bundle savedInstanceState) {
	super.onCreate(savedInstanceState);
	setContentView(R.layout.main);


      getWindow().setSoftInputMode(
              WindowManager.LayoutParams.SOFT_INPUT_ADJUST_RESIZE
      );



	b1 = (Button)findViewById(R.id.button);
	b2 = (Button)findViewById(R.id.btnBack);

    ed1 = (EditText)findViewById(R.id.txtMsg);

      checkbox=(CheckBox)findViewById(R.id.checkBox);

    edMessage= (EditText)findViewById(R.id.txtMsg);

      msgMessage= (EditText)findViewById(R.id.txtMsg);




 
	addItemsOnSpinner1();
	addItemsOnSpinner6();
	addListenerOnButton();
	addListenerOnSpinnerItemSelection();

      addItemsOnSpinner2();
	addItemsOnSpinner3();
	addItemsOnSpinner4();
	addItemsOnSpinner5();
	//spinner2.setOnItemSelectedListener((OnItemSelectedListener) this);

      spinner1.setOnItemSelectedListener(this);
      spinner6.setOnItemSelectedListener(this);



	spinner4.setOnItemSelectedListener(this);
	 spinner3.setOnItemSelectedListener(this);
	spinner2.setOnItemSelectedListener(this);


      Intent intent3 = getIntent();

      IMEIHolder = intent3.getStringExtra("IMEIHolder");


	//PopulateLGA(select);
	
	/* HIDDEN KEYBOARD  WHEN TOUCH BODY */
    ed1.setOnFocusChangeListener(new View.OnFocusChangeListener() {
        @Override
        public void onFocusChange(View v, boolean hasFocus) {
            if (!hasFocus) {
                hideKeyboard(v);
            }
        }
    });
	
	
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
  // add items into spinner dynamically


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





    public void addListenerOnSpinnerItemSelectionSpanal1() {
        spinner2 = (Spinner) findViewById(R.id.spinner2);
        //spinner2.setOnItemSelectedListener(new MyOnItemSelectedListener());

        txtSpanner1=(String) spinner1.getSelectedItem();

    }

    public void addListenerOnSpinnerItemSelectionSpanal6() {
        spinner6 = (Spinner) findViewById(R.id.spinner6);
        //spinner2.setOnItemSelectedListener(new MyOnItemSelectedListener());

        txtSpanner6=(String) spinner6.getSelectedItem();

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

         txtSpanner1=(String) spinner1.getSelectedItem();

         txtSpanner6=(String) spinner6.getSelectedItem();
	  
	 
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


      checkbox=(CheckBox)findViewById(R.id.checkBox);
      checkbox.setOnClickListener(new View.OnClickListener() {
            @Override
          public void onClick(View v) {


                edMessage.setText("");
                if(checkbox.isChecked()){
                    PopulateTexbox(txtSpanner1,txtSpanner6);
                }

                /*


                for (int i = 0; i < listParty.size(); i++) {
                    listParty.add((heroes_accronyms[i] + ":" + "   " + ","));
                    edMessage.append(listParty.get(i));


                }*/
          }




      });


	
	button = (Button) findViewById(R.id.button);
 
	button.setOnClickListener(new OnClickListener() {
 
	  @Override
	  public void onClick(View v) {
 
		  /*
	    Toast.makeText(MainActivity.this,
		"Result : " + 
                "\nSpinner 1 : "+ String.valueOf(spinner1.getSelectedItem()) + 
                "\nSpinner 2 : "+ String.valueOf(spinner2.getSelectedItem())+
                "\nSpinner 31 : "+ String.valueOf(spinner3.getSelectedItem()) +
                "\nSpinner 4 : "+ String.valueOf(spinner4.getSelectedItem()) ,
			Toast.LENGTH_SHORT).show();


	    */
		  txtSpanner1=(String) spinner1.getSelectedItem();
		  
		  
	    
	    CheckEditTextIsEmptyOrNot();
		  
		 if(CheckEditText){

	           
			// SendMessagePage(MessageResp,spanner1Holder,spanner2Holder,spanner3Holder,spanner4Holder,spanner5Holder,spanner6Holder);



             String msgContents="";
             String msgNew ="";
             String errorMsg="";
			 //UserNameHolder = ed1.getText().toString();
            Boolean numbError;
             edMessage.append(","+"\r\n");


             UserNameHolder = edMessage.getText().toString().trim();

             Log.e("Message Parameter", UserNameHolder.toString());

             TotalVote results = new TotalVote(UserNameHolder);

             results.setTotalValidVote() ;

             numbError=results.getNumberError() ;
              errorMsg =results.getErrorMsg();


             if(numbError == false) {
                // Toast.makeText(MainActivity.this, "Party Result Should be Number.", Toast.LENGTH_LONG).show();
                 Toast.makeText(MainActivity.this, errorMsg, Toast.LENGTH_LONG).show();

                 msgNew = edMessage.getText().toString().trim();
                  msgContents = msgNew.substring(0,msgNew.length()-1);

                 Log.e("Message Contents: ", msgContents.toString());

                 edMessage.setText(msgContents);


             }

             /*
             if(errorMsg.trim().equals("Please Try Again")) {

                 msgNew = edMessage.getText().toString().trim();
                 msgContents = msgNew.substring(0,msgNew.length()-1);

                 Log.e("ErrorMessage Contents: ", msgContents.toString());

                 edMessage.setText(msgContents);
             } */

             if(numbError != false) {
                 totalVote = Integer.toString(results.getTotalValidVote());

                 Intent intent = new Intent(MainActivity.this, VotersRegistration.class);

                 //startActivity(new Intent(LoginUsers.this, MainActivity.class));
                 //intent.putExtra(UserName,ed1);

                 finish();
		       
		      spanner1Holder =String.valueOf(spinner1.getSelectedItem());
		      spanner2Holder =String.valueOf(spinner2.getSelectedItem());
		      spanner3Holder =String.valueOf(spinner3.getSelectedItem());
		      spanner4Holder =String.valueOf(spinner4.getSelectedItem());
		      spanner5Holder =String.valueOf(spinner5.getSelectedItem());
		      spanner6Holder =String.valueOf(spinner6.getSelectedItem());
		      
			 
			 
			 intent.putExtra("UserNameHolder",UserNameHolder);
			 
			 intent.putExtra("spinner1",spanner1Holder);
			 intent.putExtra("spinner2",spanner2Holder);
			 intent.putExtra("spinner3",spanner3Holder);
			 intent.putExtra("spinner4",spanner4Holder);
			 intent.putExtra("spinner5",spanner5Holder);
			 intent.putExtra("spinner6",spanner6Holder);

             intent.putExtra("IMEIHolder",IMEIHolder);

             intent.putExtra("totalVote",totalVote);

             startActivity(intent);
/*
            if(numbError == true) {
                startActivity(intent);
            } */
             }

	            
	       }
	       else {

	           // If EditText is empty then this block will execute .
	           Toast.makeText(MainActivity.this, "Please fill all form fields.", Toast.LENGTH_LONG).show();

	       }
	  }
 
	});
	
	
	
	b2.setOnClickListener(new View.OnClickListener() {
        @Override
        public void onClick(View v) {
       	 
       	 
       	 
               
                finish();

                 Intent intent = new Intent(MainActivity.this, Menu_app_election.class);

            intent.putExtra("IMEIHolder",IMEIHolder);

                    startActivity(intent);
       	 
        }
	
        });
	
	
  }







  
  /* SENDING MESSAGE CLASS */
  public void SendMessagePage(final String Message, final String Spanner1, final String Spanner2 , final String Spanner3, final String Spanner4 , final String Spanner5, final String Spanner6){

      class MessageClass extends AsyncTask<String,Void,String> {

          @Override
          protected void onPreExecute() {
              super.onPreExecute();

              progressDialog = ProgressDialog.show(MainActivity.this,"Sending ....",null,true,true);
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
            	  
                  
                  Toast.makeText(MainActivity.this,httpResponseMsg,Toast.LENGTH_LONG).show();
                  ed1.setText("") ;
              }
              else{

                  Toast.makeText(MainActivity.this,httpResponseMsg,Toast.LENGTH_LONG).show();
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
                 
                   
                 
                
          		postDataParams.put("spanner2", Spanner2);
          		postDataParams.put("spanner3", Spanner3);
          		postDataParams.put("spanner4", Spanner4);
                 
          		postDataParams.put("spanner5", Spanner5);
          		postDataParams.put("spanner6", Spanner6);
                 
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
    	  Toast.makeText(MainActivity.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
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
      //heroes_accronyms = new String[jsonArray.length()];

       int ctr=0;
      
      for (int i = 0; i < jsonArray.length(); i++) {
          JSONObject obj = jsonArray.getJSONObject(i);
          heroes_wrd[i] = obj.getString("ward");

          //heroes_accronyms[i] = obj.getString("acronymName");
          Log.e("params", heroes_wrd[i].toString());

          //Log.e("params Accronyms", heroes_accronyms[i].toString());
          ctr++;
      }

      if(ctr ==1)
      {
    	  Toast.makeText(MainActivity.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
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
     * PUPLATING TextBox  STARTS HERE
     *
     *
     * */


    public void PopulateTexbox(final String Spanner1,final String Spanner6){

        class AccronymsClass extends AsyncTask<String,Void,String> {
            @Override
            protected void onPreExecute() {
                super.onPreExecute();

                //progressDialog = ProgressDialog.show(MainActivity.this,"LOADING LGA ....",null,true,true);
            }

            @Override
            protected void onPostExecute(String httpResponseMsg) {

                super.onPostExecute(httpResponseMsg);







                try {
                    loadIntoAccronyms(httpResponseMsg);
                } catch (JSONException e) {
                    e.printStackTrace();
                }







            }

            @Override
            protected String doInBackground(String... params) {

                try {





                    JSONObject postDataParams = new JSONObject();


                    postDataParams.put("spanner1", Spanner1);
                    postDataParams.put("spanner6", Spanner6);

                    Log.e("params",postDataParams.toString());

                    finalResult = httpParse.postRequest(postDataParams, HttpURL_Accronym);


                } catch (Exception e) {
                    e.printStackTrace();
                }



                return finalResult;
            }
        }
        AccronymsClass accrClass = new AccronymsClass();

        accrClass.execute(Spanner1,Spanner6);
    }


    private void loadIntoAccronyms(String json) throws JSONException {
        //spinner4 = (Spinner) findViewById(R.id.spinner4);

        try{
        edMessage= (EditText)findViewById(R.id.txtMsg);
        JSONArray jsonArray = new JSONArray(json);

        edMessage.setText("");
        String[] heroes_accronyms = new String[jsonArray.length()];
        //heroes_accronyms = new String[jsonArray.length()];

        int ctr=0;

        for (int i = 0; i < jsonArray.length(); i++) {
            JSONObject obj = jsonArray.getJSONObject(i);
            heroes_accronyms[i] = obj.getString("acronymName");


            //edMessage.append(heroes_accronyms[i] + ":" +"   "+","+"\r\n");

            if(i ==0) {
            edMessage.append(heroes_accronyms[i] + ":"+ "  " + "\r\n");
            }


            if(i >0 ) {
                edMessage.append("," + heroes_accronyms[i] + ":" + "  " + "\r\n");
            }
            //listParty.add((heroes_accronyms[i] + ":" +"   "+","));


            Log.e("params", heroes_accronyms[i].toString());


            ctr++; Log.e("params", heroes_accronyms[i].toString());
        }

        if(ctr ==1)
        {
            Toast.makeText(MainActivity.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
            ctr=0;
        }

       // adapter = new ArrayAdapter<String>(PlayListActivity.this,
               // android.R.layout.simple_list_item_1, array);
/*
      ArrayAdapter<String> dataAdapterAccronyms = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, heroes_accronyms);
         dataAdapterAccronyms.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinner4.setAdapter(dataAdapterAccronyms);
*/
        //edMessage.setText(setAdapter(dataAdapterAccronyms));


        }


                catch (NullPointerException e) {
                    e.printStackTrace();
                }
                catch (IndexOutOfBoundsException el) {
                    el.printStackTrace();
                }

                catch (JSONException e) {
                    e.printStackTrace();
                }
        catch (Exception e) {
            e.printStackTrace();
        }


    }





    /*
     *
     * POPULATING TEXTBOX ENDS HERE
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
    	  Toast.makeText(MainActivity.this,"Data Not Found!!",Toast.LENGTH_LONG).show();
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

      //UserNameHolder = ed1.getText().toString();
      
      UserNameHolder = edMessage.getText().toString();
      
      
       
      spanner1Holder =String.valueOf(spinner1.getSelectedItem());
      spanner2Holder =String.valueOf(spinner2.getSelectedItem());
      spanner3Holder =String.valueOf(spinner3.getSelectedItem());
      spanner4Holder =String.valueOf(spinner4.getSelectedItem());
      spanner5Holder =String.valueOf(spinner5.getSelectedItem());
      spanner6Holder =String.valueOf(spinner6.getSelectedItem());
      
      //Log.e("Spinner 5: ",spanner5Holder.toString());

      //if(TextUtils.isEmpty(UserNameHolder) || spanner1Holder.trim() == "Select"  || spanner2Holder.trim()  == "Select"  || spanner3Holder.trim()  == "Select" || spanner4Holder.trim()  == "Select"  || spanner5Holder.trim()  == "Select" || spanner6Holder.trim()  == "Select")
       
      if(TextUtils.isEmpty(UserNameHolder) || spanner1Holder.trim().equals("Select")  || spanner2Holder.trim().equals("Select")  || spanner3Holder.trim().equals("Select") || spanner4Holder.trim().equals("Select")  || spanner5Holder.trim().equals("Select") || spanner6Holder.trim().equals("Select"))
    	    
      {

          CheckEditText = false;

      }
      else {

          CheckEditText = true ;
      }

  }
  
  
   
}