package com.cargoland.cargolandfoods.Adapter;

import android.content.Context;
import android.graphics.Bitmap;
import android.graphics.drawable.Drawable;
import android.os.Build;
import android.text.Html;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.bumptech.glide.Glide;
import com.cargoland.cargolandfoods.Domain.FoodDomain;
import com.cargoland.cargolandfoods.Helper.ManagementCart;
import com.cargoland.cargolandfoods.Interface.ChangeNumberItemsListener;
import com.cargoland.cargolandfoods.R;
import com.squareup.picasso.Picasso;
import com.squareup.picasso.Target;

import java.text.DecimalFormat;
import java.text.NumberFormat;
import java.util.ArrayList;

public class CartListAdapter extends RecyclerView.Adapter<CartListAdapter.ViewHolder> {
    private ArrayList<FoodDomain> foodDomains;
    private ManagementCart managementCart;
    private ChangeNumberItemsListener changeNumberItemsListener;
    Bitmap bitmaps;

    public CartListAdapter(ArrayList<FoodDomain> FoodDomains, Context context, ChangeNumberItemsListener changeNumberItemsListener) {

        this.foodDomains = FoodDomains;
        managementCart = new ManagementCart(context);
        this.changeNumberItemsListener = changeNumberItemsListener;
    }



    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View inflate = LayoutInflater.from(parent.getContext()).inflate(R.layout.viewholder_card, parent, false);

        return new ViewHolder(inflate);
    }

    @Override
    public void onBindViewHolder(@NonNull ViewHolder holder, int position) {
        holder.title.setText(foodDomains.get(position).getTitle());

        holder.feeEachItem.setText(String.valueOf( formateCur(foodDomains.get(position).getFee())));
        holder.totalEachItem.setText(String.valueOf(formateCur(Math.round((foodDomains.get(position).getNumberInCart() * foodDomains.get(position).getFee()) * 100.0) / 100.0)));
        holder.num.setText(String.valueOf(foodDomains.get(position).getNumberInCart()));


        if(Build.VERSION.SDK_INT >= Build.VERSION_CODES.N){
            holder.textView21.setText(Html.fromHtml("&#8358;",Html.FROM_HTML_MODE_COMPACT) );
        }else{
            holder.textView21.setText(Html.fromHtml("&#8358;") );
        }

        if(Build.VERSION.SDK_INT >= Build.VERSION_CODES.N){
            holder.textView19.setText(Html.fromHtml("&#8358;",Html.FROM_HTML_MODE_COMPACT) );
        }else{
            holder.textView19.setText(Html.fromHtml("&#8358;") );
        }

/*
        int drawableResourceId = holder.itemView.getContext().getResources().getIdentifier(foodDomains.get(position).getPic(), "drawable", holder.itemView.getContext().getPackageName());

        Glide.with(holder.itemView.getContext())
                .load(drawableResourceId)
                .into(holder.pic);


Log.i("data",foodDomains.get(position).getPic());

 */

        //Picasso.get().load(foodDomains.get(position).getPic()).into(holder.pic);

        Picasso.get().load(foodDomains.get(position).getPic()).into(holder.pic);
        //Picasso.get().load("https://cargoland.shiptodoor.com/image/beef.jpg").into(holder.pic);


        holder.plusItem.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                managementCart.plusNumberFood(foodDomains, position, new ChangeNumberItemsListener() {
                    @Override
                    public void changed() {
                        notifyDataSetChanged();
                        changeNumberItemsListener.changed();
                    }
                });
            }
        });

        holder.minusItem.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                managementCart.MinusNumerFood(foodDomains, position, new ChangeNumberItemsListener() {
                    @Override
                    public void changed() {
                        notifyDataSetChanged();
                        changeNumberItemsListener.changed();
                    }
                });
            }
        });





    }



    private String formateCur(double dbl){
        NumberFormat format  = new DecimalFormat("#,###.##");
        double myNumb= dbl;
        String formattedNo = format.format(myNumb);
        return formattedNo;
    }






    @Override
    public int getItemCount() {
        return foodDomains.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {
        TextView title, feeEachItem,textView21,textView19;
        ImageView pic, plusItem, minusItem;
        TextView totalEachItem, num;


        public ViewHolder(@NonNull View itemView) {
            super(itemView);
            title = itemView.findViewById(R.id.title2Txt);
            feeEachItem = itemView.findViewById(R.id.feeEachItem);
            pic = itemView.findViewById(R.id.picCard);
            totalEachItem = itemView.findViewById(R.id.totalEachItem);
            num = itemView.findViewById(R.id.numberItemTxt);
            plusItem = itemView.findViewById(R.id.plusCardBtn);
            minusItem = itemView.findViewById(R.id.minusCardBtn);
            textView21=itemView.findViewById(R.id.textView21);
            textView19=itemView.findViewById(R.id.textView19);
        }
    }
}
