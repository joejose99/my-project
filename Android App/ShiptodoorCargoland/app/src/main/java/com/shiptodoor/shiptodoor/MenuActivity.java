package com.shiptodoor.shiptodoor;


import android.annotation.SuppressLint;
import android.content.Context;
import android.content.Intent;
import android.content.res.Resources;
import android.database.Cursor;
import android.graphics.Bitmap;
import android.graphics.Canvas;
import android.graphics.Color;
import android.graphics.Rect;
import android.graphics.drawable.Drawable;
import android.net.Uri;
import android.os.Bundle;
import android.os.Parcelable;
import android.util.Log;
import android.util.TypedValue;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.view.Window;
import android.view.WindowManager;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ImageView;

import androidx.appcompat.view.menu.MenuBuilder;
import androidx.core.view.MenuItemCompat;
//import android.widget.ShareActionProvider;
import androidx.appcompat.widget.ShareActionProvider;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;
import androidx.coordinatorlayout.widget.CoordinatorLayout;
import androidx.core.content.ContextCompat;
import androidx.recyclerview.widget.DefaultItemAnimator;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.bumptech.glide.Glide;
import com.google.android.gms.maps.model.BitmapDescriptor;
import com.google.android.gms.maps.model.BitmapDescriptorFactory;
import com.google.android.material.bottomnavigation.BottomNavigationView;
import com.shiptodoor.shiptodoor.helper.BottomNavigationBehavior;

import java.util.ArrayList;
import java.util.List;

//import com.ceylonlabs.imageviewpopup.ImagePopup;
/* import */
/*
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;

 */


public class MenuActivity extends AppCompatActivity {

    private Button butParcel = null;
    private Button butCal = null;
    private Button butTrack = null;
    private Button butHelp = null;
    private Toolbar  mTopToolbar;

    //private androidx.appcompat.widget.ShareActionProvider  shareActionProvider;
    private ShareActionProvider  shareActionProvider;
private static  Bundle mBundleRecyclerViewState;
private final String KEY_RECYCLER_STATE="recycler_state";

    private RecyclerView recyclerView;
    private StoreAdapter mAdapter;
    private List<String> list = new ArrayList<String>();
    Context context;
TextView txtfname;
    ArrayAdapter adapter;

    DBHelper  mydb = new DBHelper(this);
    private ImageView imgActivity;
    Bundle bundle;

    @Override
    protected void onCreate(Bundle savedInstanceState) {

        try{
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_menu);

        Toolbar toolbar = findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

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

        int colorCodeLight =Color.parseColor("#ffffff");
        window.setStatusBarColor(colorCodeLight);




list.add("New Shipment,add_shipment_bg");
list.add("Track Shipment,add_track_shipment");
list.add("Calculate Shipment,add_calculator_shipment");
list.add("Shipment History,add_history");
        list.add("Pending Bill,add_outstanding_payment");
list.add("Help,add_help");

        recyclerView = (RecyclerView)findViewById(R.id.recycler_view);
        mAdapter = new StoreAdapter(MenuActivity.this, list);

        RecyclerView.LayoutManager mLayoutManager = new GridLayoutManager(MenuActivity.this, 3);
        recyclerView.setLayoutManager(mLayoutManager);
        recyclerView.addItemDecoration(new GridSpacingItemDecoration(3, dpToPx(8), true));
        recyclerView.setItemAnimator(new DefaultItemAnimator());
        recyclerView.setAdapter(mAdapter);
        recyclerView.setNestedScrollingEnabled(true);

        txtfname= (TextView)findViewById(R.id.txtFname);

        getSupportActionBar().setDisplayShowHomeEnabled(true);
        //getSupportActionBar().setLogo(R.drawable.logo5);
        //getSupportActionBar().setDisplayUseLogoEnabled(true);
       /// getSupportActionBar().setTitle("   ");
         getSupportActionBar().setTitle(" Home");
        mTopToolbar=(Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(mTopToolbar);

  //BottomNavigationActivity bottomnav;




        BottomNavigationView navView = findViewById(R.id.nav_view);

        // Passing each menu ID as a set of Ids because each
        // menu should be considered as top level destinations
        /*
        AppBarConfiguration appBarConfiguration = new AppBarConfiguration.Builder(
                R.id.navigation_home, R.id.navigation_send, R.id.navigation_track,R.id.navigation_help,R.id.navigation_logout)
                .build();


        NavController navController = Navigation.findNavController(this, R.id.nav_host_fragment);
        NavigationUI.setupActionBarWithNavController(this, navController, appBarConfiguration);
        NavigationUI.setupWithNavController(navView, navController);


         */
        BottomNavigationView bottomNavigationView = (BottomNavigationView) findViewById(R.id.nav_view);

// attaching bottom sheet behaviour - hide / show on scroll
        CoordinatorLayout.LayoutParams layoutParams = (CoordinatorLayout.LayoutParams) bottomNavigationView.getLayoutParams();
        layoutParams.setBehavior(new BottomNavigationBehavior());

        //CoordinatorLayout.LayoutParams layoutParams = (CoordinatorLayout.LayoutParams) bottomNavigationView.getLayoutParams();
        //layoutParams.setBehavior(new BottomNavigationBehavior());



        bottomNavigationView.setOnNavigationItemSelectedListener(new BottomNavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem item) {
                switch (item.getItemId()) {
                    case R.id.navigation_home:
                        //Toast.makeText(MenuActivity.this, "Home", Toast.LENGTH_SHORT).show();
                        Intent intent = new Intent(MenuActivity.this,MenuActivity.class);
                        startActivity(intent);
                        finish();
                        break;

                    case R.id.navigation_send:
                        //Toast.makeText(MenuActivity.this, "Send", Toast.LENGTH_SHORT).show();
                        Intent intent1 = new Intent(MenuActivity.this,ParcelLetterActivity.class);
                        startActivity(intent1);
                        finish();
                        break;
                    case R.id.navigation_track:
                        //Toast.makeText(MenuActivity.this, "Tracking", Toast.LENGTH_SHORT).show();
                        Intent intent2 = new Intent(MenuActivity.this,TrackingActivity.class);
                        startActivity(intent2);
                        finish();
                        break;
                    case R.id.navigation_help:
                        //Toast.makeText(MenuActivity.this, "Help", Toast.LENGTH_SHORT).show();
                      /*
                        Intent intent3 = new Intent(MenuActivity.this,HelpActivity.class);
                        startActivity(intent3);

                       */
                        Intent  browserIntent  = new Intent(Intent.ACTION_VIEW, Uri.parse("https://tawk.to/chat/60b7cf63de99a4282a1b0bc0/1f77047de"));
                        startActivity(browserIntent);



                        break;

                    case R.id.navigation_logout:
                        Intent intent4 = new Intent(MenuActivity.this,UserHistory.class);
                        startActivity(intent4);
                        finish();
                        //Toast.makeText(MenuActivity.this, "Log out", Toast.LENGTH_SHORT).show();
                        break;
                }
                return true;
            }
        });

        //CoordinatorLayout.LayoutParams layoutParams = (CoordinatorLayout.LayoutParams) bottomNavigationView.getLayoutParams();
        //layoutParams.setBehavior(new BottomNavigationBehavior());

        Log.i("Level","Level 1");
        getName();
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
           String  txt1    =res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_FIRSTNAME));
          String  txt2=   res.getString(res.getColumnIndex(DBHelper.USER_COLUMN_SURNAME));

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
    class StoreAdapter extends RecyclerView.Adapter<StoreAdapter.MyViewHolder> {


        private Context context;
        //private List<Movie> movieList;
        private List<String> list;



        public class MyViewHolder extends RecyclerView.ViewHolder {
            public TextView name, price,address,fname;
            public ImageView thumbnail;

            public MyViewHolder(View view) {
                super(view);
                //name = view.findViewById(R.id.title);
               // price = view.findViewById(R.id.price);
                thumbnail = view.findViewById(R.id.thumbnail);
                address = view.findViewById(R.id.address);
               // fname = view.findViewById(R.id.custName);


            }
        }


        public StoreAdapter(Context context, List<String> movieList) {
            this.context = context;
            this.list = movieList;
        }

        @Override
        public MyViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
            View itemView = LayoutInflater.from(parent.getContext())
                    .inflate(R.layout.store_item_row, parent, false);

            return new MyViewHolder(itemView);
        }

        @Override
        public void onBindViewHolder(MyViewHolder holder, final int position) {
            //final Movie movie = list.get(position);


            final String movie = list.get(position);


             String[] split = movie.split(",");

             //holder.address.setText(movie.toString());

            //Log.i("Split", "Split 4: "+split[4]);
            holder.address.setText(split[0]);
                holder.address.setTextColor(Color.parseColor("#3C1214"));


            Glide.with(context)
                   // .load(movie.getImage())
                    .load(getImage(split[1]))
                    .into(holder.thumbnail);



            try{

                holder.thumbnail.setOnClickListener(new View.OnClickListener(){

                    @Override
                    public  void onClick(View view){

                        //Toast.makeText(view.getContext(),"Item clicked "+ movie.toString(),Toast.LENGTH_LONG).show();



 if(split[0].equals("New Shipment")){
     Intent intent = new Intent(MenuActivity.this,ParcelLetterActivity.class);
     startActivity(intent);
     finish();
 }

                        if(split[0].trim().equals("Track Shipment")){
                            Intent intent = new Intent(MenuActivity.this,TrackingActivity.class);
                            startActivity(intent);
                            finish();
                        }

                        if(split[0].trim().equals("Calculate Shipment")){
                            Intent intent = new Intent(MenuActivity.this,CalculatorActivity.class);
                            startActivity(intent);
                            finish();
                        }
                        if(split[0].trim().equals("Shipment History")){
                            Intent intent = new Intent(MenuActivity.this,UserHistory.class);
                            startActivity(intent);
                            finish();
                        }


                        if(split[0].trim().equals("Pending Bill")){
                            Intent intent = new Intent(MenuActivity.this,OutstandingPayment.class);
                            startActivity(intent);
                            finish();
                        }

                        if(split[0].trim().equals("Help")){
                           /*
                            Intent intent = new Intent(MenuActivity.this,HelpActivity.class);
                            startActivity(intent);

                            */
                            Intent  browserIntent  = new Intent(Intent.ACTION_VIEW, Uri.parse("https://tawk.to/chat/60b7cf63de99a4282a1b0bc0/1f77047de"));
                            startActivity(browserIntent);

                            finish();
                        }




                    }
                }) ;


                holder.address.setOnClickListener(new View.OnClickListener(){

                    @Override
                    public  void onClick(View view){


                       // Toast.makeText(view.getContext(),"Item clicked "+ movie.toString(),Toast.LENGTH_LONG).show();


                        if(split[0].equals("New Shipment")){
                            Intent intent = new Intent(MenuActivity.this,ParcelLetterActivity.class);
                            startActivity(intent);
                            finish();
                        }

                        if(split[0].equals("Track Shipment")){
                            Intent intent = new Intent(MenuActivity.this,TrackingActivity.class);
                            startActivity(intent);
                            finish();
                        }

                        if(split[0].equals("Calculate Shipment")){
                            Intent intent = new Intent(MenuActivity.this,CalculatorActivity.class);
                            startActivity(intent);
                            finish();
                        }
                        if(split[0].equals("Shipment History")){
                            Intent intent = new Intent(MenuActivity.this,UserHistory.class);
                            startActivity(intent);
                            finish();
                        }

                        if(split[0].equals("Pending Bill")){
                            Intent intent = new Intent(MenuActivity.this,OutstandingPayment.class);
                            startActivity(intent);
                            finish();
                        }


                        if(split[0].equals("Help")){
                          /*
                            Intent intent = new Intent(MenuActivity.this,HelpActivity.class);
                            startActivity(intent);
                            finish();

                           */
                            Intent  browserIntent  = new Intent(Intent.ACTION_VIEW, Uri.parse("https://tawk.to/chat/60b7cf63de99a4282a1b0bc0/1f77047de"));
                            startActivity(browserIntent);

                            finish();
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






















    //R.menu.menu_main, menu
    @SuppressLint("RestrictedApi")
    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        // getMenuInflater().inflate(R.menu.menu_main,menu);
        getMenuInflater().inflate(R.menu.logout, menu);
        // shareActionProvider = (ShareActionProvider)menu.findItem(R.id.action_share);
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

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_live_chat) {
            // Toast.makeText(UserLogin.this, "Action clicked", Toast.LENGTH_LONG).show();
            //Intent intent = new Intent(MenuActivity.this,LiveChat.class);
          /*
            Intent  browserIntent  = new Intent(Intent.ACTION_VIEW, Uri.parse("https://tawk.to/chat/60b7cf63de99a4282a1b0bc0/1f77047de"));
            startActivity(browserIntent);

           */
            Intent intent3 = new Intent(MenuActivity.this,HelpActivity.class);
            startActivity(intent3);



            finish();
            return true;

        }

        if (id == R.id.action_profile) {
            // Toast.makeText(UserLogin.this, "Action clicked", Toast.LENGTH_LONG).show();
            Intent intent = new Intent(MenuActivity.this,UserProfile.class);
            startActivity(intent);


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


        if (id == R.id.action_share) {
            // Toast.makeText(UserLogin.this, "Action clicked", Toast.LENGTH_LONG).show();

            shareActionProvider=(ShareActionProvider)MenuItemCompat.getActionProvider(item);


            return true;

        }



        return super.onOptionsItemSelected(item);


    }


private void setShareActionProvider(Intent shareIntent){
        if(shareActionProvider != null){
            shareIntent.setType("text/plain");
            String message="Cargoland \n\r Kindly download the app for your logistics needs";
            //shareIntent.putExtra("Cargoland","Cargoland");
            //shareIntent.putExtra("details","Kindly download the app for your logistics needs");
            shareIntent.putExtra(Intent.EXTRA_TEXT,message);

            shareActionProvider.setShareIntent(shareIntent);
            startActivity(Intent.createChooser(shareIntent,"Cargoland App"));
        }
}




    private void ExitApp(){

        android.os.Process.killProcess(android.os.Process.myPid());
        System.exit(1);
    }


@Override
protected void onPause(){
        super.onPause();
    //recyclerView.
    mBundleRecyclerViewState= new Bundle();
    Parcelable listState = recyclerView.getLayoutManager().onSaveInstanceState();
    //KEY_RECYCLER_STATE
    mBundleRecyclerViewState.putParcelable(KEY_RECYCLER_STATE,listState);



}
@Override
    protected void onResume(){
        super.onResume();
        if(mBundleRecyclerViewState != null){
            Parcelable listState = mBundleRecyclerViewState.getParcelable(KEY_RECYCLER_STATE);
            recyclerView.getLayoutManager().onRestoreInstanceState(listState);
        }
}
}