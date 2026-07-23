package com.cargoland.cargolandfoods.Activity;

import android.annotation.SuppressLint;
import android.app.PendingIntent;
import android.app.ProgressDialog;
import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import android.content.IntentFilter;
import android.content.res.Resources;
import android.database.Cursor;
import android.graphics.Bitmap;
import android.graphics.Canvas;
import android.graphics.Color;
import android.graphics.Rect;
import android.graphics.drawable.ColorDrawable;
import android.graphics.drawable.Drawable;
import android.net.Uri;
import android.os.AsyncTask;
import android.os.Build;
import android.os.Bundle;
import android.os.Handler;
import android.os.Parcelable;
import android.text.Editable;
import android.text.Html;
import android.text.TextWatcher;
import android.util.Log;
import android.util.TypedValue;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MotionEvent;
import android.view.View;
import android.view.ViewGroup;
import android.view.Window;
import android.view.WindowManager;
import android.view.inputmethod.InputMethodManager;
import android.widget.Adapter;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.ListView;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.ShareActionProvider;
import androidx.appcompat.widget.Toolbar;
import androidx.core.content.ContextCompat;
import androidx.localbroadcastmanager.content.LocalBroadcastManager;
import androidx.navigation.ui.AppBarConfiguration;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.LinearSmoothScroller;
import androidx.recyclerview.widget.RecyclerView;

import com.bumptech.glide.Glide;
import com.cargoland.cargolandfoods.Activity.CartListActivity;
import com.cargoland.cargolandfoods.Activity.ShowCategoryActivity;
import com.cargoland.cargolandfoods.Activity.ShowDetailActivity;
import com.cargoland.cargolandfoods.Adapter.CategoryAdapter;
import com.cargoland.cargolandfoods.Adapter.PopularAdapter;
import com.cargoland.cargolandfoods.Adapter.RestaurantAaptor;
import com.cargoland.cargolandfoods.DBHelper;
import com.cargoland.cargolandfoods.Domain.CategoryDomain;
import com.cargoland.cargolandfoods.Domain.FoodDomain;
import com.cargoland.cargolandfoods.Domain.RetaurantDomain;
import com.cargoland.cargolandfoods.Helper.ManagementCart;
import com.cargoland.cargolandfoods.HttpParse;
import com.cargoland.cargolandfoods.Interface.ChangeNumberItemsListener;
import com.cargoland.cargolandfoods.MenuActivity;
import com.cargoland.cargolandfoods.MyDataString;
import com.cargoland.cargolandfoods.StaticClass.RestaurantMenu;
import com.cargoland.cargolandfoods.UserLogin;
import com.cargoland.cargolandfoods.UserProfile;
import com.cargoland.cargolandfoods.databinding.ActivityRestuarantBinding;
import com.google.android.gms.maps.model.BitmapDescriptor;
import com.google.android.gms.maps.model.BitmapDescriptorFactory;
import com.google.android.material.bottomsheet.BottomSheetDialog;
import com.google.android.material.floatingactionbutton.FloatingActionButton;
import com.sanojpunchihewa.updatemanager.UpdateManager;
import com.sanojpunchihewa.updatemanager.UpdateManagerConstant;

import com.cargoland.cargolandfoods.NetworkUtil;

import net.bohush.geometricprogressview.GeometricProgressView;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.net.MalformedURLException;
import java.net.UnknownHostException;
import java.text.DecimalFormat;
import java.text.NumberFormat;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.Date;
import java.util.List;


import java.util.ArrayList;
import java.util.List;

import android.widget.AdapterView.OnItemSelectedListener;
import android.widget.RadioGroup.OnCheckedChangeListener;
import com.cargoland.cargolandfoods.Helper.ManagementCart;

import com.cargoland.cargolandfoods.R;

public class RestuarantActivity extends AppCompatActivity implements OnItemSelectedListener {

    private AppBarConfiguration appBarConfiguration;
    private ActivityRestuarantBinding binding;

    private Spinner spinnerLGA;

    private String txtSpinner3;


    private RecyclerView recyclerView;
    private RecyclerView recyclerViewPopularList;
    private ManagementCart managementCart;


    // private StoreAdapter mAdapter;
    private List<String> list = new ArrayList<String>();
    private List<String> listCat = new ArrayList<String>();



    private ArrayList<String> lsts = new ArrayList<>();

    Context context;
    TextView txtfname;
    TextView txt_company_name,txt_company_phone,txt_logout,txt_exit,textView4,textView6,textView10,textView9;


    ArrayAdapter adapter;
    TextView txtScrollText;
    ImageView imgViews;
    DBHelper mydb = new DBHelper(this);
    private ImageView imgActivity;
    Bundle bundle;
    //private String curVersion;
    // VersionChecker versionChecker = new VersionChecker();
    private ArrayList<String> kg_list = new ArrayList<>();

    Menu menu;
    private TextView txtView1;

    UpdateManager updateManager;
    private RecyclerView.Adapter adapter3, adapter2,adapters;
    ListView listView;
    EditText etSearch;
    ArrayAdapter<String> arrayAdapter;


    private RecyclerView recyclerViewCategoryList;
    private String userId;
    ProgressDialog progressDialog;
    private String finalResult;

    GeometricProgressView progressCoupon ;

    String HttpURL="https://cargoland.shiptodoor.com/restaurant-foods";
    HttpParse httpParse = new HttpParse();
    private   ArrayList<CategoryDomain> categoryList = new ArrayList<>();
    ArrayList<FoodDomain> foodlist = new ArrayList<>();
    public ArrayList<FoodDomain> foodlist2 = new ArrayList<>();
    ArrayList<RetaurantDomain> restaurantlist = new ArrayList<>();


    RestaurantMenu restaurantM =new   RestaurantMenu();
    RestaurantMenu restaurantMenu =new   RestaurantMenu();

    private int lgth_start_popular;

    MyDataString myDataString;

    private String strData=null;
    private int intComp;
    private String curDateTeme;
private String obj;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_restuarant);
try{
        textView4=(TextView) findViewById(R.id.textView44);

        textView6=(TextView) findViewById(R.id.textView6);
        listView =(ListView) findViewById(R.id.listView);
        etSearch=(EditText)findViewById(R.id.editTextTextPersonName_old);
        spinnerLGA = (Spinner) findViewById(R.id.editTextTextPersonName);
        textView10=(TextView) findViewById(R.id.textView10);
        textView9=(TextView) findViewById(R.id.textView9);

    spinnerLGA = (Spinner) findViewById(R.id.editTextTextPersonName);

        Window window = getWindow();
        progressCoupon = (GeometricProgressView)findViewById(R.id.progress_coupon);
        //progressCoupon.setVisibility(View.VISIBLE);

        /* Change status bar color to the black */



        if(true){
            View view =getWindow().getDecorView() ;
            view.setSystemUiVisibility(view.getSystemUiVisibility() | view.SYSTEM_UI_FLAG_LIGHT_STATUS_BAR);
        }else{
            View view =getWindow().getDecorView() ;
            view.setSystemUiVisibility(view.getSystemUiVisibility() & ~view.SYSTEM_UI_FLAG_LIGHT_STATUS_BAR);
        }






        window.clearFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN);

        window.addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS);

        int colorCodeLight =Color.parseColor("#ffffff");
        window.setStatusBarColor(colorCodeLight);


    obj =  getIntent().getStringExtra("object");


        bottomNavigation();
    addItemsOnSpinner4();
    spinnerLGA.setOnItemSelectedListener(this);

} catch (IndexOutOfBoundsException e) {
    e.printStackTrace();
}catch (Exception e) {
    e.printStackTrace();
}

    }

 public void clearAdapter(){





     foodlist.clear();

     //adapter2 = new PopularAdapter(foodlist);
     //recyclerViewPopularList.setAdapter(adapter2);
     //adapter2.notifyDataSetChanged();


     //adapter2.notify();
     Log.i("Data", "Empty star **********");

     //adapters= new Adapter(lst);

     //recyclerViewPopularList.removeAllViewsInLayout();

    }






    /*
public BroadcastReceiver mMessageReceiver = new BroadcastReceiver() {
    @Override
    public void onReceive(Context context, Intent intent) {


        String prodId=intent.getStringExtra("prodid");
        String businessId=intent.getStringExtra("busId");
        String item_name=intent.getStringExtra("item");
        String category=intent.getStringExtra("title");
        String img_path=intent.getStringExtra("pics");
        String description=intent.getStringExtra("des");
        double price_quantity=intent.getDoubleExtra("fees",0);
        recyclerViewMenu(prodId,businessId,item_name,category,img_path,description,price_quantity);
    }
};
   // LocalBroadcastManager.getInstance(this).registerReceiver(Selected,new IntentFilter("Selected"));

     */






    public void recyclerViewMenu(String prodId,String businessId,String item_name,String category,String img_path, String description,double price_quantity,String businessN) {
try{

     LinearLayoutManager linearLayoutManager = new LinearLayoutManager(this, LinearLayoutManager.HORIZONTAL, false);
        recyclerViewPopularList = findViewById(R.id.recyclerView);
        recyclerViewPopularList.setLayoutManager(linearLayoutManager);
        //ArrayList<FoodDomain> foodlist = new ArrayList<>();
         foodlist.add(new FoodDomain(prodId,businessId, item_name, category, img_path,  description, price_quantity) );


        //foodlist.add(new FoodDomain("Cheese Burger", "burger", "beef, Gouda Cheese, Special sauce, Lettuce, tomato ", 8.79));
       // foodlist.add(new FoodDomain("Vegetable pizza", "pizza2", " olive oil, Vegetable oil, pitted Kalamata, cherry tomatoes, fresh oregano, basil", 8.5));


        adapter2 = new PopularAdapter(foodlist);
        recyclerViewPopularList.setAdapter(adapter2);


    textView10.setText("Menu -> "+businessN);

}catch (IndexOutOfBoundsException e){
    e.printStackTrace();
}catch(Exception e){
    e.printStackTrace();
}

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
                startActivity(new Intent(RestuarantActivity.this, CartListActivity.class));
            }
        });

        homeBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //startActivity(new Intent(MenuActivity.this, MenuActivity.class));

                Intent intent = new Intent(RestuarantActivity.this,MenuActivity.class);

                myDataString = new MyDataString();



                intent.putExtra("data", myDataString.getStrMyData());
                intent.putExtra("int_data", 1);
                startActivity(intent);
                finish();
            }
        });

        profileBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Intent intent = new Intent(RestuarantActivity.this, UserProfile.class);

                intent.putExtra("data", strData);
                intent.putExtra("int_data", 1);
                startActivity(intent);
                finish();

                //startActivity(new Intent(MenuActivity.this, UserProfile.class));
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



    public void addItemsOnSpinner4() {

        spinnerLGA = (Spinner) findViewById(R.id.editTextTextPersonName);
        List<String> list = new ArrayList<String>();
        MyDataString myDataString = new MyDataString();

            list=myDataString.getSearch_list();
        ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, list);
        dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerLGA.setAdapter(dataAdapter);

    }


    public void addListenerOnSpinnerItemSelectionLGA() {
        spinnerLGA = (Spinner) findViewById(R.id.editTextTextPersonName);

    }





    public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
        try{


            txtSpinner3=(String) spinnerLGA.getSelectedItem();
            Log.i("Data","Selected Item  **************** "+txtSpinner3);

            //int ids = parent.getId();


            progressCoupon.setVisibility(View.VISIBLE);




            txtSpinner3=(String) spinnerLGA.getSelectedItem();

            //MyDataString myDataString = new MyDataString();
            DisplayRestaurant(txtSpinner3);




        } catch (Exception e) {
            e.printStackTrace();
        }

    }


    public void onNothingSelected(AdapterView<?> parent) {


    }




    /* Menu STARTS HERE */

    public void DisplayRestaurant( final String Spanner1){

        class CountryClass extends AsyncTask<String,Void,String> {
            @Override
            protected void onPreExecute() {
                super.onPreExecute();

                //progressDialog = ProgressDialog.show(MenuActivity.this,"loading  ....",null,true,true);
            }

            @Override
            protected void onPostExecute(String httpResponseMsg) {

                super.onPostExecute(httpResponseMsg);

                String err ,err1;

                Log.i("Data"," *************  "+httpResponseMsg);

                try {

                    // Toast.makeText(ParcelLetterActivity.this,"Country: "+ httpResponseMsg,Toast.LENGTH_LONG).show();


                    // progressDialog.dismiss();

                    progressCoupon.setVisibility(View.GONE);
                    textView10.setVisibility(View.VISIBLE);
                    textView9.setVisibility(View.VISIBLE);

                    loadCountry(httpResponseMsg);






                } catch (JSONException e) {
                    e.printStackTrace();
                }









            }

            @Override
            protected String doInBackground(String... params) {

                try {


                    obj =  getIntent().getStringExtra("object");

                    MyDataString myDataString = new MyDataString();
                    JSONObject postDataParams = new JSONObject();
                    Log.e("params","category "+myDataString.getCategory_Title());

                    postDataParams.put("category", myDataString.getCategory_Title());
                    postDataParams.put("user_id", getUserId());
                    postDataParams.put("location", txtSpinner3);


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

            ArrayAdapter   arrayAdapter;
            //spinnerCountry = (Spinner) findViewById(R.id.spinner3);

            progressCoupon.setVisibility(View.GONE);
            textView10.setVisibility(View.VISIBLE);
            textView9.setVisibility(View.VISIBLE);



            MyDataString myDataString = new MyDataString();

           // RestaurantMenu restaurantM =new   RestaurantMenu();
           // RestaurantMenu restaurantMenu =new   RestaurantMenu();
            myDataString.setCategory_Type(2);


            restaurantMenu.clearRstMenu();

            LinearLayoutManager linearLayoutManager = new LinearLayoutManager(this, LinearLayoutManager.HORIZONTAL, false);






            recyclerViewCategoryList = findViewById(R.id.recycler_view);
            recyclerViewCategoryList.setLayoutManager(linearLayoutManager);

            JSONArray jsonArray = new JSONArray(json);

            Log.i("Array",jsonArray.toString());

            String[] $heroes = new String[jsonArray.length()];

            int ctr =0;
            int ctr_popular =0;


            //Log.i("Lengths","json Length ******* "+jsonArray.length() );
            /* DISPLAY BUSINESS WITHIN TOWN */
            JSONArray result = jsonArray.getJSONArray(0);
            // Log.i("Datas","List of Categories  *******" + result );
            restaurantlist.clear();
            for(int x=0;x<result.length();x++) {

                JSONObject collegeData = result.getJSONObject(x);
                JSONObject obj3=collegeData.getJSONObject("Town");

                //Log.i("Datas","List of Categories Object 3  *******" + obj3 );
                //collecting present object in json
                String StrCategory = obj3.getString("town");
                restaurantlist.add(new RetaurantDomain(obj3.getString("id"),obj3.getString("business_name"),obj3.getString("town"),obj3.getString("opening_hour"),obj3.getString("closing_hour"),obj3.getString("logo_path")));



                lsts.add(StrCategory);
                //String   strPop= obj.getString("popular");

                Log.i("category",",list "+ lsts.toString());
            }

            /* Popular starts here */
            /* DISPLAY BUSINESS WITHIN lGA */
            JSONArray results = jsonArray.getJSONArray(1);
            Log.i("Datas","List of Popular  *******" + results );


            for(int i=0;i<results.length();i++) {

                JSONObject collegeData = results.getJSONObject(i);
                JSONObject obj2=collegeData.getJSONObject("LGA");

                String   Strimg= obj2.getString("logo_path").trim();
                Log.e("data", "image list **** "+Strimg);
                restaurantlist.add(new RetaurantDomain(obj2.getString("id"),obj2.getString("business_name"),obj2.getString("town"),obj2.getString("opening_hour"),obj2.getString("closing_hour"),obj2.getString("logo_path")));


            }



            /* DISPLAY BUSINESS WITHIN lGA */
            JSONArray rst = jsonArray.getJSONArray(2);
            Log.i("Datas","List of Popular  *******" + rst );

           // RestaurantMenu restaurantMenu =new   RestaurantMenu();
            for(int i=0;i<rst.length();i++) {

                JSONObject collegeData = rst.getJSONObject(i);
                JSONObject obj4=collegeData.getJSONObject("menuTown");

                restaurantMenu.set_prodId(obj4.getString("id"));
                restaurantMenu.setList_businesId(obj4.getString("business_id"));
                restaurantMenu.set_item_name_list(obj4.getString("item_name"));
                restaurantMenu.set_description(obj4.getString("description"));
                restaurantMenu.set_title(obj4.getString("category"));
                restaurantMenu.set_pic(obj4.getString("img_path"));
                restaurantMenu.set_fee(obj4.getDouble("price_quantity"));

                String   Strimg= obj4.getString("img_path").trim();
                Log.e("data", "image list **** "+Strimg);


            }



            /* DISPLAY BUSINESS WITHIN lGA */
             rst = jsonArray.getJSONArray(3);
            Log.i("Datas","List of Popular  *******" + rst );




            //restaurantM.clearRstMenu();

            for(int i=0;i<rst.length();i++) {

                JSONObject collegeDatas = rst.getJSONObject(i);
                JSONObject obj5=collegeDatas.getJSONObject("menuLGA");

                Log.e("data", "Category Name LGA **** "+obj5.getString("category"));
                /*
                restaurantM.set_prodId(obj2.getString("id"));
                restaurantM.setList_businesId(obj2.getString("business_id"));
                restaurantM.set_item_name_list(obj2.getString("item_name"));
                restaurantM.set_description(obj2.getString("description"));
                restaurantM.set_title(obj2.getString("category"));
                restaurantM.set_pic(obj2.getString("img_path"));
                restaurantM.set_fee(obj2.getDouble("price_quantity"));

                 */

                restaurantMenu.set_prodId(obj5.getString("id"));
                restaurantMenu.setList_businesId(obj5.getString("business_id"));
                restaurantMenu.set_item_name_list(obj5.getString("item_name"));
                restaurantMenu.set_description(obj5.getString("description"));
                restaurantMenu.set_title(obj5.getString("category"));
                restaurantMenu.set_pic(obj5.getString("img_path"));
                restaurantMenu.set_fee(obj5.getDouble("price_quantity"));

                String   Strimg= obj5.getString("img_path").trim();
                Log.e("data", "image list **** "+Strimg);


            }





            String counters ;
            counters  = String.valueOf(ctr);

            /* Menu CATEGORIES */

            //ArrayList<CategoryDomain> categoryList = new ArrayList<>();

/*
            adapter2 = new CategoryAdapter(categoryList);
            recyclerViewCategoryList.setAdapter(adapter2);
*/


            /* Search Menu call */
            //setMenu_list(lsts);
            //SearchText();
/*
            ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item, lsts);
            dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
            spinnerLGA.setAdapter(dataAdapter);


 */


            //spinnerState.setAdapter(dataAdapter6);


            /* POPULAR STARTS HERE */
            /*
            if(adapter3.getItemCount() >0){
                int siz=restaurantlist.size();
                adapter3.notifyItemRangeRemoved(0,siz);
            }

             */

            LinearLayoutManager linearLayoutManager1 = new LinearLayoutManager(this, LinearLayoutManager.HORIZONTAL, false);
           // recyclerViewPopularList = findViewById(R.id.recycler_view);
            //recyclerViewPopularList.setLayoutManager(linearLayoutManager1);

            adapter3 = new RestaurantAaptor(restaurantlist);
           // recyclerViewPopularList.setAdapter(adapter3);
            recyclerViewCategoryList.setAdapter(adapter3);

            //Log.e("data", "foods list **** "+adapter2);
            //this.setAddress_list(foodlist);

            Log.e("Counters", counters.toString());

            Log.e("Address", restaurantlist.toString());
            // autoScroll();

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

                    Intent intent = new Intent(RestuarantActivity.this,UserProfile.class);

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


                    Intent intent = new Intent(RestuarantActivity.this, UserLogin.class);

                    startActivity(intent);
                    finish();

                }
            });

            txt_exit.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {

                    ArrayList<FoodDomain> foodlist = new ArrayList<>();
                    foodlist.add(new FoodDomain("1","1","item","Pepperoni pizza", "pizza1", "slices pepperoni ,mozzarella cheese, fresh oregano,  ground black pepper, pizza sauce", 9.76));
                    managementCart.ClearCart(foodlist, 1, context, new ChangeNumberItemsListener() {
                        @Override
                        public void changed() {
                            //calculateCard();
                        }
                    }) ;

                    //ExitApp();

                }
            });




        }





    }







}