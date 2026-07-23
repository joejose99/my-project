package com.cargoland.cargolandfoods.Adapter;

import android.content.Intent;
import android.os.Build;
import android.text.Html;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.cargoland.cargolandfoods.Activity.ShowDetailActivity;
import com.cargoland.cargolandfoods.Domain.FoodDomain;
import com.cargoland.cargolandfoods.R;
import com.squareup.picasso.Picasso;

import org.jetbrains.annotations.NotNull;

import java.text.DecimalFormat;
import java.text.NumberFormat;
import java.util.ArrayList;

public class PopulateCategoryAdapter  extends RecyclerView.Adapter<PopulateCategoryAdapter.ViewHolder> {
    ArrayList<FoodDomain> foodDomains;

    public PopulateCategoryAdapter(ArrayList<FoodDomain> FoodDomains) {
        this.foodDomains = FoodDomains;
    }



    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View inflate = LayoutInflater.from(parent.getContext()).inflate(R.layout.viewholder_popular, parent, false);

        return new ViewHolder(inflate);
    }

    @Override
    public void onBindViewHolder(@NonNull PopulateCategoryAdapter.ViewHolder holder, int position) {
        holder.title.setText(foodDomains.get(position).getTitle());

        holder.category.setText(foodDomains.get(position).getTitle());
        holder.fee.setText(String.valueOf(foodDomains.get(position).getFee()));

        if(Build.VERSION.SDK_INT >= Build.VERSION_CODES.N){
            holder.symboles.setText(Html.fromHtml("&#8358;",Html.FROM_HTML_MODE_COMPACT) );
        }else{
            holder.symboles.setText(Html.fromHtml("&#8358;") );
        }

        foodDomains.get(position).getFee();
        NumberFormat format  = new DecimalFormat("#,###");
        double myNumb= foodDomains.get(position).getFee();
        String formattedNo = format.format(myNumb);
        holder.fee_2.setText(formattedNo);
/*
        int drawableResourceId = holder.itemView.getContext().getResources().getIdentifier(foodDomains.get(position).getPic(), "drawable", holder.itemView.getContext().getPackageName());

        Glide.with(holder.itemView.getContext())
                .load(drawableResourceId)
                .into(holder.pic);

 */

        Picasso.get().load(foodDomains.get(position).getPic()).into(holder.pic);
        //Picasso.get().load("https://cargoland.shiptodoor.com/image/beef.jpg").into(holder.pic);


        holder.addBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(holder.itemView.getContext(), ShowDetailActivity.class);
                intent.putExtra("object", foodDomains.get(position));
                holder.itemView.getContext().startActivity(intent);
            }
        });

    }


    @Override
    public int getItemCount() {
        return foodDomains.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {
        TextView title, fee,symboles,fee_2,category;
        ImageView pic;
        TextView addBtn;


        public ViewHolder(@NonNull View itemView) {
            super(itemView);
            title = itemView.findViewById(R.id.title);
            fee = itemView.findViewById(R.id.fee);
            fee_2 = itemView.findViewById(R.id.fee_2);
            category = itemView.findViewById(R.id.category);
            pic = itemView.findViewById(R.id.pic);
            addBtn = itemView.findViewById(R.id.addBtn);
            symboles = itemView.findViewById(R.id.textView14);



        }
    }


    public ArrayList<FoodDomain> getAddress_list() {
        return this.foodDomains;
    }

}
