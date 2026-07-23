package com.cargoland.cargolandfoods.Adapter;

import android.content.Context;
import android.content.Intent;
import android.os.Build;
import android.text.Html;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.localbroadcastmanager.content.LocalBroadcastManager;
import androidx.recyclerview.widget.RecyclerView;

import com.cargoland.cargolandfoods.Activity.RestuarantActivity;
import com.cargoland.cargolandfoods.Activity.ShowDetailActivity;
import com.cargoland.cargolandfoods.Domain.RetaurantDomain;
import com.cargoland.cargolandfoods.Domain.RetaurantDomain;
import com.cargoland.cargolandfoods.MyDataString;
import com.cargoland.cargolandfoods.R;
import com.cargoland.cargolandfoods.StaticClass.RestaurantMenu;
import com.squareup.picasso.Picasso;

import org.jetbrains.annotations.NotNull;

import java.text.DecimalFormat;
import java.text.NumberFormat;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Date;

public class RestaurantAaptor extends RecyclerView.Adapter<RestaurantAaptor.ViewHolder> {
    ArrayList<RetaurantDomain> retaurantDomains;
     RestuarantActivity restuarantActivity;
    Context context;

    public RestaurantAaptor(ArrayList<RetaurantDomain> retaurantDomains) {
        this.retaurantDomains = retaurantDomains;
    }

    @NonNull
    @Override
    public RestaurantAaptor.ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View inflate = LayoutInflater.from(parent.getContext()).inflate(R.layout.viewholer_restaurant, parent, false);

        return new RestaurantAaptor.ViewHolder(inflate);
    }



    @Override
    public void onBindViewHolder(@NonNull RestaurantAaptor.ViewHolder holder, int position) {
        /*
        holder.category.setText(retaurantDomains.get(position).getTitle());
        String titles=retaurantDomains.get(position).getItemName();
        if(titles.length()>12){
            titles=titles.substring(0,12);
            titles=titles+"..";
        }

         */


        Date date = new Date();
        SimpleDateFormat formatter = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");


        String curDateTeme = formatter.format(date.getTime());

        int cur_hr=formateHour(curDateTeme);
        //int cur_min=formateMin(curDateTeme);

        String  strOpen_hr =retaurantDomains.get(position).getOpen_hour();
        String strCloseHour  =retaurantDomains.get(position).getClose_hour();


        int open_hr=formateMin(strOpen_hr);
        int close_hr =formateMin(strCloseHour);
        //int past_min=formateMin(strDate);

        Log.i("Data","My Current Hour ************* "+cur_hr);
        Log.i("Data","My Close Hour ************* "+close_hr);
        Log.i("Data","My Open Hour ************* "+open_hr);

        //if(cur_hr >= open_hr &&  close_hr >= cur_hr  ){
        if(cur_hr < open_hr ||  close_hr <= cur_hr  ){
            holder.txt_close.setVisibility(View.VISIBLE);

        }






         holder.title.setText(retaurantDomains.get(position).getBusiness_name());


        holder.town.setText(String.valueOf(retaurantDomains.get(position).getTown()));

        holder.town.setText(String.valueOf(retaurantDomains.get(position).getTown()));
        holder.txtHour.setText(String.valueOf(retaurantDomains.get(position).getOpen_hour()+ " - "+ retaurantDomains.get(position).getClose_hour()));
/*
        int drawableResourceId = holder.itemView.getContext().getResources().getIdentifier(foodDomains.get(position).getPic(), "drawable", holder.itemView.getContext().getPackageName());

        Glide.with(holder.itemView.getContext())
                .load(drawableResourceId)
                .into(holder.pic);

 */

        Picasso.get().load(retaurantDomains.get(position).getPic()).into(holder.pic);
        //Picasso.get().load("https://cargoland.shiptodoor.com/image/beef.jpg").into(holder.pic);


        holder.addBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                try{



                /*
                Intent intent = new Intent(holder.itemView.getContext(), ShowDetailActivity.class);
                intent.putExtra("object", retaurantDomains.get(position));
                holder.itemView.getContext().startActivity(intent);

                 */

                    int int_businessIds=Integer.parseInt(retaurantDomains.get(position).getBusinessId());

                    Log.i("Data","Business ************* "+int_businessIds);
                    ArrayList<String> bussIds = new ArrayList<String>();

                    //if(cur_hr >= open_hr &&  close_hr >= cur_hr  ){
                    if(cur_hr < open_hr ||  close_hr <= cur_hr  ){

                        Log.i("Data","My Current Hour ************* "+cur_hr);
                        Log.i("Data","My Close Hour ************* "+close_hr);
                        Log.i("Data","My Open Hour ************* "+open_hr);
                        holder.txt_close.setVisibility(View.VISIBLE);
                        Toast.makeText(v.getContext(), "we have closed", Toast.LENGTH_LONG).show();
                    }




                   else {


//if(int_businessIds <= 0 ){
    ((RestuarantActivity)v.getContext()).clearAdapter();

//}


                ArrayList<String> bussId = new ArrayList<String>();



                RestaurantMenu restaurantMenu= new RestaurantMenu() ;
                bussId= restaurantMenu.getList_businesId() ;
                Log.i("data","Business Id: "+bussId);
                Log.i("data","Price: "+restaurantMenu.getList_fee());
                String businessName =retaurantDomains.get(position).getBusiness_name();
                for(int x=0;x<bussId.size();x++) {
                    int intBusinessId = Integer.parseInt(bussId.get(x));
                    int int_businessId=Integer.parseInt(retaurantDomains.get(position).getBusinessId());

                    Log.i("data","Static Business Id: "+int_businessId) ;
               // if(bussId.get(x).equals(retaurantDomains.get(position).getBusinessId())){
                    if(intBusinessId==int_businessId){
                       Log.i("data","Static Business Id: "+int_businessId) ;
                        Log.i("data","Loop Business Id: "+intBusinessId) ;

                   // Log.i("data","Item Name: "+restaurantMenu.getList_item_name().get(x));
                   // Log.i("data","Item Price: "+restaurantMenu.getList_fee().get(x));

                String prodid=    restaurantMenu.getList_prodId().get(x);
                   String busId=restaurantMenu.getList_businesId().get(x);
                    String item= restaurantMenu.getList_item_name().get(x);
                   String tit= restaurantMenu.getList_title().get(x);
                    String pics=  restaurantMenu.getList_pic().get(x);
                    String des= restaurantMenu.getList_description().get(x);
                    double fees_ =restaurantMenu.getList_fee().get(x);



                    ((RestuarantActivity)v.getContext()).recyclerViewMenu(prodid, busId,item, tit,pics,des,fees_,businessName);





                    }


                    /*
                    Intent intent = new Intent("Selected");
                    intent.putExtra("prodid",prodid);
                    intent.putExtra("busId",busId);
                    intent.putExtra("item",item);
                    intent.putExtra("title",tit);
                    intent.putExtra("pics",pics);
                    intent.putExtra("des",des);
                    intent.putExtra("fees",fees_);

 */

                    //LocalBroadcastManager.getInstance(v.getContext()).sendBroadcast(intent);

                }


                }
            }catch (IndexOutOfBoundsException e) {
                    e.printStackTrace();
                }catch (NullPointerException e){
                    e.printStackTrace();
                }
                catch (Exception e){
                    e.printStackTrace();
                }
            }
        });

    }


    @Override
    public int getItemCount() {
        return retaurantDomains.size();
    }


    private int formateHour(String str){

        String[] strsplit=str.split(" ");
        String  times =strsplit[1];
        String[] strsplit2=times.split(":");
        int hr= Integer.parseInt(strsplit2[0].toString());
        return hr;
    }

    private int formateMin(String str){
/*
        String[] strsplit=str.split(" ");
        String  times =strsplit[1];
        String[] strsplit2=times.split(":");
        int min= Integer.parseInt(strsplit2[1].toString());

 */
        String  times =str;
        String[] strsplit2=times.split(":");
        int min= Integer.parseInt(strsplit2[0].toString());
        return min;
    }



    public class ViewHolder extends RecyclerView.ViewHolder {
        TextView title, txtHour,town,txtDelivery,category,txt_close;
        ImageView pic;
        TextView addBtn;


        public ViewHolder(@NonNull View itemView) {
            super(itemView);
            txtHour = itemView.findViewById(R.id.txtHour);
            title = itemView.findViewById(R.id.title);
            town = itemView.findViewById(R.id.fee_2);
            category = itemView.findViewById(R.id.category);

            pic = itemView.findViewById(R.id.pic);
            addBtn = itemView.findViewById(R.id.addBtn);
            txtDelivery = itemView.findViewById(R.id.txtDelivery);
            txt_close = itemView.findViewById(R.id.txt_close);


        }
    }
}
