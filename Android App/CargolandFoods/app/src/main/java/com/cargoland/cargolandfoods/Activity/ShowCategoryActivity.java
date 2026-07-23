package com.cargoland.cargolandfoods.Activity;

import android.annotation.SuppressLint;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.database.Cursor;
import android.graphics.Color;
import android.graphics.drawable.ColorDrawable;
import android.net.Uri;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.widget.LinearLayout;
import android.widget.TextView;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.cargoland.cargolandfoods.Adapter.PopularAdapter;
import com.cargoland.cargolandfoods.Adapter.PopulateCategoryAdapter;
import com.cargoland.cargolandfoods.DBHelper;
import com.cargoland.cargolandfoods.Helper.ManagementCart;
import com.cargoland.cargolandfoods.HttpParse;
import com.cargoland.cargolandfoods.Interface.ChangeNumberItemsListener;
import com.cargoland.cargolandfoods.MenuActivity;
import com.cargoland.cargolandfoods.MyDataString;
import com.cargoland.cargolandfoods.R;
import com.cargoland.cargolandfoods.UserLogin;
import com.cargoland.cargolandfoods.UserProfile;
import com.google.android.material.bottomsheet.BottomSheetDialog;
import com.google.android.material.floatingactionbutton.FloatingActionButton;

import com.cargoland.cargolandfoods.Adapter.CategoryAdapter;
import com.cargoland.cargolandfoods.Adapter.PopularAdapter;
import com.cargoland.cargolandfoods.Domain.CategoryDomain;
import com.cargoland.cargolandfoods.Domain.FoodDomain;
import com.cargoland.cargolandfoods.MenuActivity;
import com.cargoland.cargolandfoods.Helper.ManagementCart;

import net.bohush.geometricprogressview.GeometricProgressView;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;
import java.util.ArrayList;

public class ShowCategoryActivity extends AppCompatActivity {
    private RecyclerView.Adapter adapter, adapter2;
    private RecyclerView recyclerViewCategoryList, recyclerViewPopularList;
    PopulateCategoryAdapter adpt;
    FoodDomain object;

    //CategoryDomain obj;
    String obj;
    Context context;
    ArrayList<FoodDomain> lst2;
    MenuActivity menuactivity;
    FoodDomain foodDomains;
    ArrayList<FoodDomain> foodlist = new ArrayList<>();
    ArrayList<FoodDomain> foodlist2 = new ArrayList<>();
    String HttpURL="https://cargoland.shiptodoor.com/category-foods-search";
    HttpParse httpParse = new HttpParse();
    private String userId;
    ProgressDialog progressDialog;
    private String finalResult;
    DBHelper  mydb = new DBHelper(this);

    TextView textView10;

    private RecyclerView.Adapter adapter3;
    TextView txt_company_name,txt_company_phone,txt_logout,txt_exit;
    GeometricProgressView progressCoupon ;
    private ManagementCart managementCart;
private String strData;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_category_list);

        //recyclerViewCategory();
try{
        Window window = getWindow();

    progressCoupon = (GeometricProgressView)findViewById(R.id.progress_coupon);
    progressCoupon.setVisibility(View.VISIBLE);

    textView10 =(TextView)findViewById(R.id.textView10);
    Log.i("data", "level 2 Menu ************* ");
obj =  getIntent().getStringExtra("object");

    Intent intent = getIntent();
    strData = intent.getStringExtra("data");




    Log.i("data", "level 2 Menu ************* " +obj);

    textView10.setText("category -> "+ obj);

    managementCart = new ManagementCart(this);

        if(true){
            View view =getWindow().getDecorView() ;
            view.setSystemUiVisibility(view.getSystemUiVisibility() | view.SYSTEM_UI_FLAG_LIGHT_STATUS_BAR);
        }else{
            View view =getWindow().getDecorView() ;
            view.setSystemUiVisibility(view.getSystemUiVisibility() & ~view.SYSTEM_UI_FLAG_LIGHT_STATUS_BAR);
        }



        window.clearFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN);

        window.addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS);

        int colorCodeLight = Color.parseColor("#ffffff");
        window.setStatusBarColor(colorCodeLight);

    Log.i("data", "level 2 *************");

    MyDataString myDataString = new MyDataString();


    Log.i("Data","My Data String String ************* "+ myDataString.getStrMyData());
    if(myDataString.getStrMyData().isEmpty() || myDataString.getStrMyData() ==null){
        MenuPage(getUserId());
    }else{
        try{

            Log.i("Datas","Im loading *******************");
        loadDataString(myDataString.getStrMyData());
            progressCoupon.setVisibility(View.GONE);
    }catch (JSONException e){
            e.printStackTrace();
        }
    }




       // recyclerViewPopular();

        Log.i("data", "level 3 *************");
        bottomNavigation();

}catch (ClassCastException e){
    e.printStackTrace();
}
    }


    @SuppressLint("Range")
    public String getUserId(){
        mydb = new DBHelper(this);
        Log.i("level","Level 3B");
        // Cursor res= mydb.getLoginUsers(1);
        Cursor res;
        res= mydb.getLoginUsers(1);
        int usrIds;
        String MobileNo=null;
        if(res.moveToFirst()){

            res.moveToFirst();

            userId    =res.getString(res.getColumnIndex(DBHelper.LOGIN_COLUMN_USER_ID));
            Log.i("level","Level 3F");
            return userId;
        }
        return userId;
    }

    private void bottomNavigation() {
        FloatingActionButton floatingActionButton = findViewById(R.id.card_btn);
        LinearLayout homeBtn = findViewById(R.id.homeBtn);
        LinearLayout profileBtn = findViewById(R.id.profileBtn);
        LinearLayout supportBtn = findViewById(R.id.supportBtn);
        LinearLayout settingBtn = findViewById(R.id.settingBtn);

        floatingActionButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(ShowCategoryActivity.this, CartListActivity.class));
            }
        });

        homeBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {


                MyDataString  myDataString = new MyDataString();



                Intent intent1 = getIntent();
                strData = intent1.getStringExtra("data");
                Log.i("data","Category: **************** " +strData);

                Intent intent = new Intent(ShowCategoryActivity.this, MenuActivity.class);
                intent.putExtra("data",  myDataString.getStrMyData());
                intent.putExtra("int_data", 1);
                startActivity(intent);
                finish();
               // startActivity(new Intent(ShowCategoryActivity.this, MenuActivity.class));
            }
        });

        settingBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                showProfileBottomSheet( context, true);

            }
        });

        profileBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //startActivity(new Intent(ShowCategoryActivity.this, UserProfile.class));
                MyDataString  myDataString = new MyDataString();


               // Log.i("Data","My Data String String ************* "+ myDataString.getStrMyData());
                Intent intent = new Intent(ShowCategoryActivity.this, UserProfile.class);
                intent.putExtra("data", myDataString.getStrMyData());
                intent.putExtra("int_data", 1);
                startActivity(intent);
                finish();
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

    private void recyclerViewPopular() {
try{
    /*
        LinearLayoutManager linearLayoutManager = new LinearLayoutManager(this, LinearLayoutManager.HORIZONTAL, false);
        recyclerViewPopularList = findViewById(R.id.recyclerView);
        recyclerViewPopularList.setLayoutManager(linearLayoutManager);


    PopulateCategoryAdapter domanlist=null;
    domanlist.get_Domainlist();

    Log.i("Array","food list 21 "+domanlist.get_Domainlist());

    foodlist2 =((MenuActivity)context).getAddress_list();
    Log.i("Array","food list 1 "+foodlist2);

    this.foodlist2=menuactivity.foodlist2;
    Log.i("Array","food list 2 "+foodlist2);
    //new FoodDomain().getFee();

        for (int i = 0; i < foodlist2.size(); i++){
           if(foodlist2.get(i).getTitle().equals(obj)) {
               lst2.add(foodlist2.get(i)) ;
           }

        }


        ArrayList<FoodDomain> foodlist = new ArrayList<>();
        foodlist.add(new FoodDomain("Pepperoni pizza", "pizza1", "slices pepperoni ,mozzarella cheese, fresh oregano,  ground black pepper, pizza sauce", 9.76));
        foodlist.add(new FoodDomain("Cheese Burger", "burger", "beef, Gouda Cheese, Special sauce, Lettuce, tomato ", 8.79));
        foodlist.add(new FoodDomain("Vegetable pizza", "pizza2", " olive oil, Vegetable oil, pitted Kalamata, cherry tomatoes, fresh oregano, basil", 8.5));
         adapter2 = new PopularAdapter(lst2);

        recyclerViewPopularList.setAdapter(adapter2);
**/


    }catch (ClassCastException e){
    e.printStackTrace();
    }catch(NullPointerException e){
            e.printStackTrace();
        }
    }





    /* Menu STARTS HERE */

    public void MenuPage( final String Spanner1){

        class CountryClass extends AsyncTask<String,Void,String> {
            @Override
            protected void onPreExecute() {
                super.onPreExecute();

               // progressDialog = ProgressDialog.show(ShowCategoryActivity.this,"loading  ....",null,true,true);
            }

            @Override
            protected void onPostExecute(String httpResponseMsg) {

                super.onPostExecute(httpResponseMsg);

                String err ,err1;

                Log.i("Data"," *************  "+httpResponseMsg);

                try {

                    // Toast.makeText(ParcelLetterActivity.this,"Country: "+ httpResponseMsg,Toast.LENGTH_LONG).show();


                    //progressDialog.dismiss();
                    progressCoupon.setVisibility(View.GONE);
                    loadCountry(httpResponseMsg);






                } catch (JSONException e) {
                    e.printStackTrace();
                }









            }

            @Override
            protected String doInBackground(String... params) {

                try {





                    JSONObject postDataParams = new JSONObject();


                    postDataParams.put("user_id", getUserId());

                    postDataParams.put("category", getIntent().getStringExtra("object"));
                    Log.e("params",postDataParams.toString());

                    finalResult = httpParse.postRequest(postDataParams, HttpURL);


                } catch (Exception e) {
                    e.printStackTrace();
                }



                return finalResult;
            }
        }
        CountryClass countryObject = new CountryClass();

        countryObject.execute(Spanner1);
    }



    private void loadCountry(String json) throws JSONException {
        try{


            //spinnerCountry = (Spinner) findViewById(R.id.spinner3);
 /*
            LinearLayoutManager linearLayoutManager = new LinearLayoutManager(this, LinearLayoutManager.HORIZONTAL, false);
            recyclerViewCategoryList = findViewById(R.id.recycler_View);
            recyclerViewCategoryList.setLayoutManager(linearLayoutManager);


  */


            JSONArray jsonArray = new JSONArray(json);

            Log.i("Array",jsonArray.toString());

            String[] $heroes = new String[jsonArray.length()];

            int ctr =0;
            int ctr_popular =0;

/*
        JSONObject jsonObject =new JSONObject(json);
        JSONArray result = jsonObject.getJSONArray(config.JSON_ARRAY);
        for(int x=0;x<result.length()-1;x++) {

            JSONObject collegeData = result.getJSONObject(x);
            //collecting present object in json
            ClassList.add(new totalClassObject(collegeData.getString("date"),collegeData.getString("day_name")));
            RefreshListVIew();

        }

 */
            /* Popular starts First here */
            Log.i("Datas","Joe is here 1111 *******************");
            JSONArray results = jsonArray.getJSONArray(0);
            Log.i("Datas","List of Popular  *******" + results );
            foodlist2.clear();
            for(int i=0;i<results.length();i++) {

                JSONObject collegeData = results.getJSONObject(i);
                JSONObject obj2=collegeData.getJSONObject("Category");



                String   Strimg= obj2.getString("img_path").trim();
                Log.e("data", "image list **** "+Strimg);
//if(obj2.getString("category").trim().equals(obj)){
                foodlist2.add(new FoodDomain(obj2.getString("id"),obj2.getString("business_id"),obj2.getString("item_name"),obj2.getString("category"),obj2.getString("img_path"),obj2.getString("description"),obj2.getDouble("price_quantity")));

//}

            }








            /* Popular starts here */
            Log.i("Datas","Im here 222222 *******************");
            JSONArray results1 = jsonArray.getJSONArray(1);
            Log.i("Datas","List of Popular  *******" + results1 );
            foodlist.clear();
            for(int i=0;i<results1.length();i++) {

                JSONObject collegeData = results1.getJSONObject(i);
                JSONObject obj2=collegeData.getJSONObject("popular");



                String   Strimg= obj2.getString("img_path").trim();
                Log.e("data", "image list **** "+Strimg);
//if(obj2.getString("category").trim().equals(obj)){
    foodlist.add(new FoodDomain(obj2.getString("id"),obj2.getString("business_id"),obj2.getString("item_name"),obj2.getString("category"),obj2.getString("img_path"),obj2.getString("description"),obj2.getDouble("price_quantity")));

//}

            }

            Log.i("Datas","GoodBye *******************");



            /* CHARGES STARTS HERE */
            //results = jsonArray.getJSONArray(2);

            //Log.i("Datas","List of charges  *******" + jsonArray.getJSONArray(2) );
            //int charg =jsonArray.length()-1;
           // String str = jsonArray.getString(charg);

            JSONObject obj=jsonArray.getJSONObject(2);
            String strCharges=obj.getString("charges");
            //Log.i("Datas","List of charges  *******" + obj.getString("charges") );

            //Log.i("Datas","List of charges String *******" + str );





            String counters ;
            counters  = String.valueOf(ctr);

            /* Menu CATEGORIES */

            //ArrayList<CategoryDomain> categoryList = new ArrayList<>();


            //adapter2 = new CategoryAdapter(categoryList);
            //recyclerViewCategoryList.setAdapter(adapter2);


            /* POPULAR STARTS HERE */

            LinearLayoutManager linearLayoutManager2 = new LinearLayoutManager(this, LinearLayoutManager.HORIZONTAL, false);
            recyclerViewPopularList = findViewById(R.id.recycler_View);
            recyclerViewPopularList.setLayoutManager(linearLayoutManager2);
            ;
            adapter2 = new PopularAdapter(foodlist2);
            recyclerViewPopularList.setAdapter(adapter2);
            //Log.e("data", "foods list **** "+adapter2);
            //this.setAddress_list(foodlist);

            Log.e("Counters", counters.toString());




            /* POPULAR STARTS HERE */

            LinearLayoutManager linearLayoutManager1 = new LinearLayoutManager(this, LinearLayoutManager.HORIZONTAL, false);
            recyclerViewPopularList = findViewById(R.id.recyclerView);
            recyclerViewPopularList.setLayoutManager(linearLayoutManager1);
            ;
            adapter3 = new PopularAdapter(foodlist);
            recyclerViewPopularList.setAdapter(adapter3);
            //Log.e("data", "foods list **** "+adapter2);
            //this.setAddress_list(foodlist);

            Log.e("Counters", counters.toString());




            //  spinnerCountry.setPadding(4,4,4,4);
        }catch (JSONException e){
            e.printStackTrace();
        }catch (IndexOutOfBoundsException e){
            e.printStackTrace();
        }
        catch (Exception e){
            e.printStackTrace();
        }
    }


/* MY DATA STRING  LOAD STARTS FROM HERE *************/

    private void loadDataString(String json) throws JSONException {
        try{


            //spinnerCountry = (Spinner) findViewById(R.id.spinner3);
 /*
            LinearLayoutManager linearLayoutManager = new LinearLayoutManager(this, LinearLayoutManager.HORIZONTAL, false);
            recyclerViewCategoryList = findViewById(R.id.recycler_View);
            recyclerViewCategoryList.setLayoutManager(linearLayoutManager);


  */


            JSONArray jsonArray = new JSONArray(json);

            Log.i("Array",jsonArray.toString());

            String[] $heroes = new String[jsonArray.length()];

            int ctr =0;
            int ctr_popular =0;

/*
        JSONObject jsonObject =new JSONObject(json);
        JSONArray result = jsonObject.getJSONArray(config.JSON_ARRAY);
        for(int x=0;x<result.length()-1;x++) {

            JSONObject collegeData = result.getJSONObject(x);
            //collecting present object in json
            ClassList.add(new totalClassObject(collegeData.getString("date"),collegeData.getString("day_name")));
            RefreshListVIew();

        }

 */
            /* Popular starts First here */

            JSONArray results = jsonArray.getJSONArray(1);
            Log.i("Datas","List of Popular  *******" + results );
            foodlist2.clear();
            for(int i=0;i<results.length();i++) {

                JSONObject collegeData = results.getJSONObject(i);
                JSONObject obj2=collegeData.getJSONObject("popular");


               String title= obj2.getString("category").trim();
                String   Strimg= obj2.getString("img_path").trim();
                Log.e("data", "image list **** "+Strimg);
//if(obj2.getString("category").trim().equals(obj)){
                if(!obj.trim().equals(title.trim())){
                    Log.e("data", "Title list **** "+title);

                    foodlist2.add(new FoodDomain(obj2.getString("id"),obj2.getString("business_id"),obj2.getString("item_name"),obj2.getString("category"),obj2.getString("img_path"),obj2.getString("description"),obj2.getDouble("price_quantity")));

                }

//}

            }








            /* Popular starts here */

            JSONArray results1 = jsonArray.getJSONArray(1);
            Log.i("Datas","List of Popular  *******" + results1 );
            foodlist.clear();
            for(int i=0;i<results1.length();i++) {

                JSONObject collegeData = results1.getJSONObject(i);
                JSONObject obj2=collegeData.getJSONObject("popular");



                String   Strimg= obj2.getString("img_path").trim();
                Log.e("data", "image list **** "+Strimg);
                String title= obj2.getString("category").trim();
                if(obj.trim().equals(title.trim())){
                foodlist.add(new FoodDomain(obj2.getString("id"),obj2.getString("business_id"),obj2.getString("item_name"),obj2.getString("category"),obj2.getString("img_path"),obj2.getString("description"),obj2.getDouble("price_quantity")));

 }

            }





            /* CHARGES STARTS HERE */
            //results = jsonArray.getJSONArray(2);

            //Log.i("Datas","List of charges  *******" + jsonArray.getJSONArray(2) );
            //int charg =jsonArray.length()-1;
            // String str = jsonArray.getString(charg);

            JSONObject obj=jsonArray.getJSONObject(3);
            String strCharges=obj.getString("charges");
            //Log.i("Datas","List of charges  *******" + obj.getString("charges") );

            //Log.i("Datas","List of charges String *******" + str );





            String counters ;
            counters  = String.valueOf(ctr);

            /* Menu CATEGORIES */

            //ArrayList<CategoryDomain> categoryList = new ArrayList<>();


            //adapter2 = new CategoryAdapter(categoryList);
            //recyclerViewCategoryList.setAdapter(adapter2);


            /* POPULAR STARTS HERE */

            LinearLayoutManager linearLayoutManager2 = new LinearLayoutManager(this, LinearLayoutManager.HORIZONTAL, false);
            recyclerViewPopularList = findViewById(R.id.recycler_View);
            recyclerViewPopularList.setLayoutManager(linearLayoutManager2);
            ;
            adapter2 = new PopularAdapter(foodlist2);
            recyclerViewPopularList.setAdapter(adapter2);
            //Log.e("data", "foods list **** "+adapter2);
            //this.setAddress_list(foodlist);

            Log.e("Counters", counters.toString());




            /* POPULAR STARTS HERE */

            LinearLayoutManager linearLayoutManager1 = new LinearLayoutManager(this, LinearLayoutManager.HORIZONTAL, false);
            recyclerViewPopularList = findViewById(R.id.recyclerView);
            recyclerViewPopularList.setLayoutManager(linearLayoutManager1);
            ;
            adapter3 = new PopularAdapter(foodlist);
            recyclerViewPopularList.setAdapter(adapter3);
            //Log.e("data", "foods list **** "+adapter2);
            //this.setAddress_list(foodlist);

            Log.e("Counters", counters.toString());




            //  spinnerCountry.setPadding(4,4,4,4);
        }catch (JSONException e){
            e.printStackTrace();
        }catch (IndexOutOfBoundsException e){
            e.printStackTrace();
        }
        catch (Exception e){
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

                    MyDataString  myDataString = new MyDataString();

                    myDataString = new MyDataString();



                    Intent intent = new Intent(ShowCategoryActivity.this, UserProfile.class);
                    intent.putExtra("data", myDataString.getStrMyData());
                    intent.putExtra("int_data", 1);
                    startActivity(intent);
                    finish();

                    //Intent intent = new Intent(ShowCategoryActivity.this,UserProfile.class);



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

                    Intent intent = new Intent(ShowCategoryActivity.this, UserLogin.class);

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
