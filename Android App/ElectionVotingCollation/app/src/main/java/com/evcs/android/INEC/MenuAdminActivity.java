package com.eciels.android.INEC;

import android.Manifest;
import android.annotation.SuppressLint;
import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.IntentSender;
import android.content.pm.PackageManager;
import android.content.res.Resources;
import android.database.Cursor;
import android.graphics.Bitmap;
import android.graphics.Canvas;
import android.graphics.Rect;
import android.graphics.drawable.ColorDrawable;
import android.graphics.drawable.Drawable;
import android.net.Uri;
import android.os.Build;
import android.os.Parcelable;
import android.provider.Settings;

import com.bumptech.glide.Glide;
import com.eciels.android.INEC.FoodDomain.FoodDomain;
import com.eciels.android.INEC.R;
import com.google.android.gms.maps.model.BitmapDescriptor;
import com.google.android.gms.maps.model.BitmapDescriptorFactory;
//import com.google.android.material.bottomnavigation.BottomNavigationView;
import com.google.android.material.bottomsheet.BottomSheetDialog;
import com.google.android.material.floatingactionbutton.FloatingActionButton;
import com.google.android.material.navigation.NavigationBarView;
import com.google.android.play.core.appupdate.AppUpdateInfo;
import com.google.android.play.core.appupdate.AppUpdateManager;
import com.google.android.play.core.install.model.AppUpdateType;
import com.google.android.play.core.install.model.UpdateAvailability;

/*
import com.google.android.play.core.tasks.Task;
import com.sanojpunchihewa.updatemanager.UpdateManager;
import com.sanojpunchihewa.updatemanager.UpdateManagerConstant;

 */

import com.google.android.play.core.appupdate.AppUpdateManagerFactory;

//import com.google.android.play.core.tasks.Task;

//import com.google.android.play.core.tasks.Task;
import com.google.android.gms.tasks.Task;



import android.app.ProgressDialog;

import android.content.Intent;
import android.graphics.Color;
import android.os.Bundle;


import android.telephony.TelephonyManager;
import android.text.method.ScrollingMovementMethod;
import android.util.Log;
import android.util.TypedValue;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.view.Window;
import android.view.WindowManager;
import android.view.inputmethod.InputMethodManager;
import android.widget.AdapterView;


import android.widget.ArrayAdapter;
import android.widget.Button;


import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.PopupMenu;
import android.widget.RelativeLayout;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.view.menu.MenuBuilder;
import androidx.appcompat.view.menu.MenuPopupHelper;
import androidx.appcompat.widget.ShareActionProvider;
import androidx.appcompat.widget.Toolbar;
import androidx.cardview.widget.CardView;
import androidx.coordinatorlayout.widget.CoordinatorLayout;
import androidx.core.app.ActivityCompat;
import androidx.core.content.ContextCompat;
import androidx.recyclerview.widget.DefaultItemAnimator;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import java.util.ArrayList;
import java.util.List;

//import eu.dkaratzas.android.inapp.update.InAppUpdateManager;
public class MenuAdminActivity extends AppCompatActivity {


    Button b1,b2,b3,b4, b5,b6,b7;
    ProgressDialog progressDialog;

    String  IMEIHolder ;
    private static final int MY_PERMISSIONS_REQUEST_CAMERA = 1;

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




    private Button butParcel = null;
    private Button butCal = null;
    private Button butTrack = null;
    private Button butHelp = null;
    private Toolbar mTopToolbar;

    //private androidx.appcompat.widget.ShareActionProvider  shareActionProvider;
    private ShareActionProvider shareActionProvider;
    private static  Bundle mBundleRecyclerViewState;
    private final String KEY_RECYCLER_STATE="recycler_state";

    private RecyclerView recyclerView;
    private MenuAdminActivity.StoreAdapter mAdapter;


    Context context;
    TextView txtfname;
    TextView txt_company_name,txt_company_phone,txt_logout,txt_exit,textView4,textView6,textView10,textView9;

    private List<String> list = new ArrayList<String>();

    ArrayAdapter adapter;
    TextView txtScrollText;
    ImageView imgViews;
    DBHelper  mydb = new DBHelper(this);
    private ImageView imgActivity;
    Bundle bundle;
    //private String curVersion;
    // VersionChecker versionChecker = new VersionChecker();

    private AppUpdateManager appUpdateManager;
    private static final int REQ_CODE_VERSION_UPDATE = 21;
    private static final int IMMEDIATE_APP_UPDATE_REQ_CODE=21;
    private static final String TAG = "Cargoland Update";
   // private InAppUpdateManager inAppUpdateManager;

    Menu menu;
    private TextView txtView1;

   // UpdateManager updateManager;
    ArrayList<FoodDomain> foodlist = new ArrayList<>();


    @Override
    protected void onCreate(Bundle savedInstanceState) {

        super.onCreate(savedInstanceState);

        try{
            setContentView(R.layout.activity_menu_admin);



            b1 = (Button)findViewById(R.id.button);
            b2 = (Button)findViewById(R.id.butSMS);
            b3 = (Button)findViewById(R.id.butPhoto);


            b4 = (Button)findViewById(R.id.butVideo);

            b5 = (Button)findViewById(R.id.butFile);
            b6=(Button)findViewById(R.id.butBrowseVideo);


            b7=(Button)findViewById(R.id.butCorrection);

            Intent intent2 = getIntent();
            IMEIHolder = intent2.getStringExtra("IMEIHolder");

            //IMEIHolder=getDeviceIMEI();
            if(checkAndRequestPermissions()){
                IMEIHolder=getDeviceIMEI();
            }

/*
		b1.setOnClickListener(new View.OnClickListener() {
	         @Override
	         public void onClick(View v) {

	        	 progressB();


	        	 finish();

	        	  overridePendingTransition(R.anim.slide_in, R.anim.slide_out);

                 Intent intent = new Intent(Menu_app_election.this, MainActivity.class);
                 progressDialog.dismiss();

				 intent.putExtra("IMEIHolder",IMEIHolder);
                 startActivity(intent);

	         }
	      });

		 b2.setOnClickListener(new View.OnClickListener() {
	         @Override
	         public void onClick(View v) {

	        	 progressB();
	        	 progressDialog.dismiss();

	        	 finish();
	        	  overridePendingTransition(R.anim.slide_in, R.anim.slide_out);

                 Intent intent01 = new Intent(Menu_app_election.this, SMS.class);

				 intent01.putExtra("IMEIHolder",IMEIHolder);
                 startActivity(intent01);

	         }
	      });


		 b3.setOnClickListener(new View.OnClickListener() {
	         @Override
	         public void onClick(View v) {

	        	 progressB();
	        	 progressDialog.dismiss();

	        	 finish();
	        	  overridePendingTransition(R.anim.slide_in, R.anim.slide_out);

                 Intent intent02 = new Intent(Menu_app_election.this, CameraCapture.class);

				 intent02.putExtra("IMEIHolder",IMEIHolder);
                 startActivity(intent02);

	         }
	      });



		 b4.setOnClickListener(new View.OnClickListener() {
	         @Override
	         public void onClick(View v) {

	        	 progressB();
	        	 progressDialog.dismiss();

	        	 finish();
	        	  overridePendingTransition(R.anim.slide_in, R.anim.slide_out);

                 Intent intent03 = new Intent(Menu_app_election.this, Video.class);

				 intent03.putExtra("IMEIHolder",IMEIHolder);
                 startActivity(intent03);

	         }
	      });



		 b5.setOnClickListener(new View.OnClickListener() {
	         @Override
	         public void onClick(View v) {

	        	 progressB();
	        	 progressDialog.dismiss();

	        	 finish();
	        	  overridePendingTransition(R.anim.slide_in, R.anim.slide_out);

                 Intent intent04 = new Intent(Menu_app_election.this, BrouseImage.class);

				 intent04.putExtra("IMEIHolder",IMEIHolder);
                 startActivity(intent04);

	         }
	      });


		 b6.setOnClickListener(new View.OnClickListener() {
	         @Override
	         public void onClick(View v) {

	        	 progressB();
	        	 progressDialog.dismiss();

	        	 finish();
	        	  overridePendingTransition(R.anim.slide_in, R.anim.slide_out);

                 Intent intent05 = new Intent(Menu_app_election.this, BrowseVideoUpload.class);

				 intent05.putExtra("IMEIHolder",IMEIHolder);
                 startActivity(intent05);

	         }
	      });



		 b7.setOnClickListener(new View.OnClickListener() {
	         @Override
	         public void onClick(View v) {

	        	 progressB();
	        	 progressDialog.dismiss();

	        	 finish();
	        	  overridePendingTransition(R.anim.slide_in, R.anim.slide_out);

                 Intent intent06 = new Intent(MenuAdminActivity.this, Correction.class);

				 intent06.putExtra("IMEIHolder",IMEIHolder);
                 startActivity(intent06);

	         }
	      });

 */


            NetworkUtil.checkNetworkInfo(this, new NetworkUtil.OnConnectionStatusChange() {
                @Override
                public void onChange(boolean type) {

                    if(type){
                        //Toast.makeText(MenuActivity.this, "Connection Available", Toast.LENGTH_SHORT).show();
                    }else {
                        //Toast.makeText(MenuActivity.this, "NO Connection", Toast.LENGTH_SHORT).show();
                        androidx.appcompat.app.AlertDialog.Builder builder = new androidx.appcompat.app.AlertDialog.Builder(MenuAdminActivity.this);
                        builder.setTitle("Network Error")

                                .setMessage("Check your Internet Connection")
                                .setPositiveButton("ok",null).create().show();

                        //but.setBackgroundResource(R.drawable.ic_baseline_person_pin_circle_24);

                    }

                }
            });

            /* ******************   NEW CODE STARTS HERE ****************************/






            Window window = getWindow();
            /* Change status bar color to the black */
            if(true){
                View view =getWindow().getDecorView() ;
                view.setSystemUiVisibility(view.getSystemUiVisibility() | view.SYSTEM_UI_FLAG_LIGHT_STATUS_BAR);
            }else{
                View view =getWindow().getDecorView() ;
                view.setSystemUiVisibility(view.getSystemUiVisibility() & ~view.SYSTEM_UI_FLAG_LIGHT_STATUS_BAR);
            }


            // curVersion = this.getPackageManager().getPackageInfo(BuildConfig.APPLICATION_ID, 0).versionName;

            /* Change status bar background color to white */

            window.clearFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN);

            window.addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS);

            int colorCodeLight = Color.parseColor("#FE6E17");
            window.setStatusBarColor(colorCodeLight);



/*
            list.add("Voting Results,ic_baseline_how_to_vote_24");
            list.add("SMS,ic_baseline_textsms_24");
            list.add("Photo ,ic_baseline_camera2_alt_24");
            list.add("Video,ic_baseline_videocam_24");
            list.add("Browse Picture,ic_baseline_image2_24");
            list.add("Browse Video,ic_baseline_video_library_24");
            list.add("Correction (Results),ic_baseline_error_24");

 */

            list.add("Voting Result,ic_baseline_text_snippet_24");
            list.add("Photo Result,ic_baseline_image2_24");
            list.add("Video Result,ic_baseline_videocam_24");
            list.add("SMS,ic_baseline_textsms_24");
            recyclerView = (RecyclerView)findViewById(R.id.recycler_view);
            //mAdapter = new MenuAdminActivity.StoreAdapter(MenuAdminActivity.this, list);

            mAdapter = new MenuAdminActivity.StoreAdapter(MenuAdminActivity.this, list);


            RecyclerView.LayoutManager mLayoutManager = new GridLayoutManager(MenuAdminActivity.this, 3);
            recyclerView.setLayoutManager(mLayoutManager);
            recyclerView.addItemDecoration(new MenuAdminActivity.GridSpacingItemDecoration(3, dpToPx(11), true));
            recyclerView.setItemAnimator(new DefaultItemAnimator());
            recyclerView.setAdapter(mAdapter);
            recyclerView.setNestedScrollingEnabled(true);

            txtfname= (TextView)findViewById(R.id.txtFname);
			/*
			 imgViews= (ImageView)findViewById(R.id.imageView1);
			txtView1=(TextView)findViewById(R.id.txtView1);
			txtScrollText=(TextView)findViewById(R.id.txtscroll);

			 */

            //getSupportActionBar().setDisplayShowHomeEnabled(true);
            //getSupportActionBar().setLogo(R.drawable.logo5);
            //getSupportActionBar().setDisplayUseLogoEnabled(true);
            /// getSupportActionBar().setTitle("   ");

			/*
			getSupportActionBar().setTitle(" Home");
			mTopToolbar=(Toolbar) findViewById(R.id.toolbar);
			setSupportActionBar(mTopToolbar);

			 */



            // BottomNavigationActivity bottomnav;




            //BottomNavigationView navView = findViewById(R.id.nav_view);

            // Passing each menu ID as a set of Ids because each
            // menu should be considered as top level destinations
        /*
        AppBarConfiguration appBarConfiguration = new AppBarConfiguration.Builder(
                R.id.navigation_home, R.id.navigation_send, R.id.navigation_track,R.id.navigation_help,R.id.navigation_logout)
                .build();


        NavController navController = Navigation.findNavController(this, R.id.nav_host_fragment);
        NavigationUI.setupActionBarWithNavController(this, navController, appBarConfiguration);
        NavigationUI.setupWithNavController(navView, navController);
getName();



         */

			/*
			txtScrollText.setMovementMethod(new ScrollingMovementMethod());

			imgViews.setOnClickListener(new View.OnClickListener() {
				@Override
				public void onClick(View v) {

					Log.e("Click","You Click Me");
					show_Menu(v);
					//show_Menu_popup(v);

					//return true;


				}
			});

			 */
            /*
            txtView1.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    Log.e("Click","You Click Me");

                    show_Menu(v);
                    //show_Menu_popup(v);

                    //return true;


                }
            });

             */



            Log.i("Level","Level 1");
            getName();

            // BottomNavigationView bottomNavigationView = (BottomNavigationView) findViewById(R.id.nav_view);

            bottomNavigation();

/*
            updateManager= UpdateManager.Builder(this).mode(UpdateManagerConstant.FLEXIBLE);
            updateManager.start();

 */
            appUpdateManager = AppUpdateManagerFactory.create(this);
            checkUpdate();


/*
            NetworkUtil.checkNetworkInfo(this, new NetworkUtil.OnConnectionStatusChange() {
                @Override
                public void onChange(boolean type) {

                    if(type){
                        //Toast.makeText(MenuActivity.this, "Connection Available", Toast.LENGTH_SHORT).show();
                    }else {
                        //Toast.makeText(MenuActivity.this, "NO Connection", Toast.LENGTH_SHORT).show();
                        androidx.appcompat.app.AlertDialog.Builder builder = new androidx.appcompat.app.AlertDialog.Builder(MenuAdminActivity.this);
                        builder.setTitle("Network Error")

                                .setMessage("Check your Internet Connection")
                                .setPositiveButton("ok",null).create().show();

                        //but.setBackgroundResource(R.drawable.ic_baseline_person_pin_circle_24);

                    }

                }
            });

 */




            Log.i("Level","***********Level 2");





        }catch(IllegalArgumentException e){
            e.printStackTrace();
        }catch(IndexOutOfBoundsException e){
            e.printStackTrace();
        }
        catch(Exception e){
            e.printStackTrace();
        }

    }


    protected void onSaveInstanceState(Bundle outState) {
        super.onSaveInstanceState(outState);


        //outState.putParcelable("file_uri", uri);
    }

    @Override
    protected void onRestoreInstanceState(Bundle savedInstanceState) {
        super.onRestoreInstanceState(savedInstanceState);

        if(savedInstanceState != null)
        {
            // get the file url
            // uri = savedInstanceState.getParcelable("file_uri");

        }


    }



    private void getName(){
        try{
            mydb = new DBHelper(getBaseContext());
            Log.i("Level","Level 2");
            Cursor res= mydb.getUsers(1);
            Log.i("Level","Level 3");
            if(res.moveToFirst()){
                Log.i("Level","Level 4");

                Log.i("data","Inside sqlite");

                res.moveToFirst();
                @SuppressLint("Range") String  txt1    =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_FIRSTNAME));
                @SuppressLint("Range") String  txt2=   res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_SURNAME));

                Log.i("name",txt1.toString());
                Log.i("name",txt2.toString());
                String txt3 =txt1.toString()+" "+txt2.toString();

                txtfname.setText(txt3.toString());

            }
        }catch (NullPointerException e) {
            e.printStackTrace();
        }
    }


    /* My new code */



    public class GridSpacingItemDecoration extends RecyclerView.ItemDecoration {

        private int spanCount;
        private int spacing;
        private boolean includeEdge;

        public GridSpacingItemDecoration(int spanCount, int spacing, boolean includeEdge) {
            this.spanCount = spanCount;
            this.spacing = spacing;
            this.includeEdge = includeEdge;
        }

        @Override
        public void getItemOffsets(Rect outRect, View view, RecyclerView parent, RecyclerView.State state) {
            int position = parent.getChildAdapterPosition(view); // item position
            int column = position % spanCount; // item column

            if (includeEdge) {
                outRect.left = spacing - column * spacing / spanCount; // spacing - column * ((1f / spanCount) * spacing)
                outRect.right = (column + 1) * spacing / spanCount; // (column + 1) * ((1f / spanCount) * spacing)

                if (position < spanCount) { // top edge
                    outRect.top = spacing;
                }
                outRect.bottom = spacing; // item bottom
            } else {
                outRect.left = column * spacing / spanCount; // column * ((1f / spanCount) * spacing)
                outRect.right = spacing - (column + 1) * spacing / spanCount; // spacing - (column + 1) * ((1f /    spanCount) * spacing)
                if (position >= spanCount) {
                    outRect.top = spacing; // item top
                }
            }
        }
    }

    /**
     * Converting dp to pixel
     */
    private int dpToPx(int dp) {
        Resources r = getResources();
        return Math.round(TypedValue.applyDimension(TypedValue.COMPLEX_UNIT_DIP, dp, r.getDisplayMetrics()));
    }


    /**
     * RecyclerView adapter class to render items
     * This class can go into another separate class, but for simplicity
     */
    class StoreAdapter extends RecyclerView.Adapter<MenuAdminActivity.StoreAdapter.MyViewHolder> {


        private Context context;
        //private List<Movie> movieList;
        private List<String> list;



        public class MyViewHolder extends RecyclerView.ViewHolder {
            public TextView name, price,address,fname;
            public ImageView thumbnail;

            public RelativeLayout relativeLayout1;
            public LinearLayout linearLayout;


            public MyViewHolder(View view) {
                super(view);
                //name = view.findViewById(R.id.title);
                // price = view.findViewById(R.id.price);
                thumbnail = view.findViewById(R.id.thumbnail);
                address = view.findViewById(R.id.address);

                linearLayout=view.findViewById(R.id.linearLayout1);

                relativeLayout1=view.findViewById(R.id.relativeLayout1);

                // fname = view.findViewById(R.id.custName);


            }
        }


        public StoreAdapter(Context context, List<String> movieList) {
            this.context = context;
            this.list = movieList;
        }

        @Override
        public MenuAdminActivity.StoreAdapter.MyViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
            View itemView = LayoutInflater.from(parent.getContext())
                    .inflate(R.layout.store_item_row, parent, false);

            return new MenuAdminActivity.StoreAdapter.MyViewHolder(itemView);
        }

        @Override
        public void onBindViewHolder(MenuAdminActivity.StoreAdapter.MyViewHolder holder, final int position) {
            //final Movie movie = list.get(position);


            final String movie = list.get(position);


            String[] split = movie.split(",");

            //holder.address.setText(movie.toString());

            //Log.i("Split", "Split 4: "+split[4]);
            holder.address.setText(split[0]);
            holder.address.setTextColor(Color.parseColor("#3C1214"));


/*
			if(split[0].trim().equals("Correction (Results)")){
				holder.relativeLayout2.setBackground(ContextCompat.getDrawable(holder.itemView.getContext(), R.drawable.category_background4));

			}

 */






            Glide.with(context)
                    // .load(movie.getImage())
                    .load(getImage(split[1]))
                    .into(holder.thumbnail);

            /*
            if(split[0].equals("Voting Results")){
                holder.relativeLayout1.setBackground(ContextCompat.getDrawable(holder.itemView.getContext(), R.drawable.category_background1));



            }

            if(split[0].trim().equals("SMS")){
                holder.relativeLayout1.setBackground(ContextCompat.getDrawable(holder.itemView.getContext(), R.drawable.category_background2));

            }

            if(split[0].trim().equals("Photo")){
                holder.relativeLayout1.setBackground(ContextCompat.getDrawable(holder.itemView.getContext(), R.drawable.category_background3));


            }

            if(split[0].trim().equals("Video")){

                holder.relativeLayout1.setBackground(ContextCompat.getDrawable(holder.itemView.getContext(), R.drawable.category_background7));


            }
            if(split[0].trim().equals("Browse Picture")){

                holder.relativeLayout1.setBackground(ContextCompat.getDrawable(holder.itemView.getContext(), R.drawable.category_background5));


            }
            if(split[0].trim().equals("Browse Video")){

                holder.relativeLayout1.setBackground(ContextCompat.getDrawable(holder.itemView.getContext(), R.drawable.category_background6));


            }

            if(split[0].trim().equals("Correction (Results)")){
                holder.relativeLayout1.setBackground(ContextCompat.getDrawable(holder.itemView.getContext(), R.drawable.category_background4));

            }


             */

            if(split[0].trim().equals("Voting Result")){
               // holder.relativeLayout1.setBackground(ContextCompat.getDrawable(holder.itemView.getContext(), R.drawable.category_background8));
                holder.relativeLayout1.setBackground(ContextCompat.getDrawable(holder.itemView.getContext(), R.drawable.category_background7));

            }


            if(split[0].trim().equals("Photo Result")){
                holder.relativeLayout1.setBackground(ContextCompat.getDrawable(holder.itemView.getContext(), R.drawable.category_background9));

            }

            if(split[0].trim().equals("Video Result")){
                holder.relativeLayout1.setBackground(ContextCompat.getDrawable(holder.itemView.getContext(), R.drawable.category_background10));

            }

            if(split[0].trim().equals("SMS")){
                holder.relativeLayout1.setBackground(ContextCompat.getDrawable(holder.itemView.getContext(), R.drawable.category_background2));

            }








            try{

                holder.thumbnail.setOnClickListener(new View.OnClickListener(){

                    @Override
                    public  void onClick(View view){

                        //Toast.makeText(view.getContext(),"Item clicked "+ movie.toString(),Toast.LENGTH_LONG).show();



                        if(split[0].equals("Voting Result")){
                            Intent intent = new Intent(MenuAdminActivity.this,VotingResultActivity.class);
                            startActivity(intent);
                            //finish();
                        }



                        if(split[0].trim().equals("Photo Result")){
                            Intent intent = new Intent(MenuAdminActivity.this,PictureResultActivity.class);
                            startActivity(intent);
                            //finish();
                        }

                        if(split[0].trim().equals("Video Result")){
                            Intent intent = new Intent(MenuAdminActivity.this,VideoResultActivity.class);
                            startActivity(intent);
                            //finish();
                        }


                        if(split[0].trim().equals("SMS")){
                            Intent intent = new Intent(MenuAdminActivity.this,SMSAdminActivity.class);
                            startActivity(intent);
                            //finish();
                        }




                    }
                }) ;


                holder.address.setOnClickListener(new View.OnClickListener(){

                    @Override
                    public  void onClick(View view){


                        // Toast.makeText(view.getContext(),"Item clicked "+ movie.toString(),Toast.LENGTH_LONG).show();

                        if(split[0].equals("Voting Result")){
                            Intent intent = new Intent(MenuAdminActivity.this,VotingResultActivity.class);
                            startActivity(intent);
                           // finish();
                        }



                        if(split[0].trim().equals("Photo Result")){
                            Intent intent = new Intent(MenuAdminActivity.this,PictureResultActivity.class);
                            startActivity(intent);
                           //finish();
                        }

                        if(split[0].trim().equals("Video Result")){
                            Intent intent = new Intent(MenuAdminActivity.this,VideoResultActivity.class);
                            startActivity(intent);
                           // finish();
                        }


                        if(split[0].trim().equals("SMS")){
                            Intent intent = new Intent(MenuAdminActivity.this,SMSAdminActivity.class);
                            startActivity(intent);
                            //finish();
                        }
/*
                        Intent intent = new Intent(MenuActivity.this,ParcelLetterActivity.class);
                        startActivity(intent);
                        finish();

 */

                    }
                }) ;




            }catch (NullPointerException e) {
                e.printStackTrace();
            }




        }



        private int getImage(String imageName){
            int drawableResourceId = context.getResources().getIdentifier(imageName ,"drawable",context.getPackageName());
            return drawableResourceId;
        }




        @Override
        public int getItemCount() {
            //return movieList.size();
            return list.size();
        }
    }



    private BitmapDescriptor BitmapFromVector(Context context, int vectorResId){
        Drawable vectorDrawable =ContextCompat.getDrawable(context,vectorResId);
        vectorDrawable.setBounds(0,0,vectorDrawable.getIntrinsicWidth(),vectorDrawable.getIntrinsicHeight());
        Bitmap bitmap= Bitmap.createBitmap(vectorDrawable.getIntrinsicWidth(),vectorDrawable.getIntrinsicHeight(),Bitmap.Config.ARGB_8888);
        Canvas canvas= new Canvas(bitmap);
        vectorDrawable.draw(canvas);
        return BitmapDescriptorFactory.fromBitmap(bitmap);

    }


/*
    private void loadFragment(Fragment fragment) {

        mapLineViewModel= new ViewModelProvider(this).get(MapLineViewModel.class);
        // load fragment
        if(label != null){
            Bundle bundle= new Bundle();
            bundle.putString("txtActivity",txtActivity.getText().toString());
            bundle.putString("confidence",txtConfidence.getText().toString());
            fragment.setArguments(bundle);
        }


        FragmentManager fragmentManager=((AppCompatActivity)getActivity()).getSupportFragmentManager();

        FragmentTransaction transaction = fragmentManager.beginTransaction();
        transaction.replace(R.id.nav_host_fragment, fragment,null);

        transaction.addToBackStack(null);
        transaction.commit();


    }

 */
















/*
@SuppressLint("RestrictedApi")
public void show_Menu_popup(View v){
    PopupMenu popup = new PopupMenu(MenuActivity.this,v);

    popup.inflate(R.menu.menu_main);

     MenuPopupHelper menuPopupHelper = new MenuPopupHelper(this.getApplicationContext(), (MenuBuilder)popup.getMenu(),v);

    menuPopupHelper.setForceShowIcon(true);

    menuPopupHelper.show();

    popup.setOnMenuItemClickListener(new PopupMenu.OnMenuItemClickListener() {
        @Override
        public boolean onMenuItemClick(MenuItem item) {
            int id = item.getItemId();

            //noinspection SimplifiableIfStatement
            if (id == R.id.action_profile) {

                Intent intent3 = new Intent(MenuActivity.this,UserProfile.class);
                startActivity(intent3);



                finish();
                return true;

            }



            if (id == R.id.action_logout) {
                // Toast.makeText(UserLogin.this, "Action clicked", Toast.LENGTH_LONG).show();
                Intent intent = new Intent(MenuActivity.this,UserLogin.class);
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

            return false;

        }
    });


}
*/















    private void checkUpdate() {

        Task<AppUpdateInfo> appUpdateInfoTask = appUpdateManager.getAppUpdateInfo();

        appUpdateInfoTask.addOnSuccessListener(appUpdateInfo -> {
            if (appUpdateInfo.updateAvailability() == UpdateAvailability.UPDATE_AVAILABLE
                    && appUpdateInfo.isUpdateTypeAllowed(AppUpdateType.IMMEDIATE)) {
                startUpdateFlow(appUpdateInfo);
            } else if  (appUpdateInfo.updateAvailability() == UpdateAvailability.DEVELOPER_TRIGGERED_UPDATE_IN_PROGRESS){
                startUpdateFlow(appUpdateInfo);
            }
        });
    }

    private void startUpdateFlow(AppUpdateInfo appUpdateInfo) {
        try {
            appUpdateManager.startUpdateFlowForResult(appUpdateInfo, AppUpdateType.IMMEDIATE, this, MenuAdminActivity.IMMEDIATE_APP_UPDATE_REQ_CODE);
        } catch (IntentSender.SendIntentException e) {
            e.printStackTrace();
        }
    }

    @Override
    public void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if (requestCode == IMMEDIATE_APP_UPDATE_REQ_CODE) {
            if (resultCode == RESULT_CANCELED) {
                Toast.makeText(getApplicationContext(), "Update canceled by user! Result Code: " + resultCode, Toast.LENGTH_LONG).show();
            } else if (resultCode == RESULT_OK) {
                Toast.makeText(getApplicationContext(), "Update success! Result Code: " + resultCode, Toast.LENGTH_LONG).show();
            } else {
                Toast.makeText(getApplicationContext(), "Update Failed! Result Code: " + resultCode, Toast.LENGTH_LONG).show();
                checkUpdate();
            }
        }
    }






    /* END OF NEW CODE *************/


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

    public void progressB()
    {

        progressDialog = ProgressDialog.show(MenuAdminActivity.this,"Loading ....",null,true,true);


    }



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


                        listPermissionsNeeded.toArray(new String[listPermissionsNeeded.size()]), MY_PERMISSIONS_REQUEST_CAMERA);


                // requestPermissions(new String[] {Manifest.permission.CAMERA},MY_PERMISSIONS_REQUEST_CAMERA);


                return false;
            }





        }catch (Exception e){
            e.printStackTrace();
        }

        return true;
    }





    private void bottomNavigation() {
        FloatingActionButton floatingActionButton = findViewById(R.id.card_btn);
        LinearLayout homeBtn = findViewById(R.id.homeBtn);
        LinearLayout profileBtn = findViewById(R.id.profileBtn);
        LinearLayout supportBtn = findViewById(R.id.supportBtn);
        LinearLayout settingBtn = findViewById(R.id.settingBtn);

        Log.i("Data","IM here for you ****************");

        floatingActionButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(MenuAdminActivity.this, MainActivity.class));
            }
        });

        homeBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //startActivity(new Intent(MenuActivity.this, MenuActivity.class));

                Intent intent = new Intent(MenuAdminActivity.this,Menu_app_election.class);

                startActivity(intent);
               // finish();
            }
        });

        profileBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Intent intent = new Intent(MenuAdminActivity.this,CameraCapture.class);


                startActivity(intent);
               // finish();

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
                Intent intent = new Intent(MenuAdminActivity.this,Correction.class);


                startActivity(intent);
               // finish();




            }
        });

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




			txt_company_phone.setOnClickListener(new View.OnClickListener() {
				@Override
				public void onClick(View v) {

					Intent intent = new Intent(MenuAdminActivity.this,MenuAdminActivity.class);

					//intent.putExtra("data", strData);
					//intent.putExtra("int_data", 1);

					startActivity(intent);
					//finish();

				}
			});






            txt_logout.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {




                    Intent intent = new Intent(MenuAdminActivity.this,LoginUsers.class);

                    startActivity(intent);
                    finish();

                }
            });






        }





    }





}
