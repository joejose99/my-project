package com.eciels.android.INEC.Adapter;

import android.content.Intent;
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

/*
import com.cargoland.cargolandfoods.Activity.RestuarantActivity;
import com.cargoland.cargolandfoods.Activity.ShowDetailActivity;
import com.cargoland.cargolandfoods.MyDataString;
import com.cargoland.cargolandfoods.R;

 */



import com.eciels.android.INEC.FoodDomain.FoodDomain;
import com.eciels.android.INEC.R;
import com.eciels.android.INEC.ShowDetailActivity;
import com.squareup.picasso.Picasso;

import java.text.DecimalFormat;
import java.text.NumberFormat;
import java.util.ArrayList;

public class PopularAdapter extends RecyclerView.Adapter<PopularAdapter.ViewHolder> {
    ArrayList<FoodDomain> foodDomains;

    public PopularAdapter(ArrayList<FoodDomain> FoodDomains) {
        this.foodDomains = FoodDomains;
    }

    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View inflate = LayoutInflater.from(parent.getContext()).inflate(R.layout.viewholder_popular, parent, false);

        return new ViewHolder(inflate);
    }

    @Override
    public void onBindViewHolder(@NonNull ViewHolder holder, int position) {
        holder.category.setText(foodDomains.get(position).getWard());
        String titles=foodDomains.get(position).getTitle();
        if(titles.length()>12){
            titles=titles.substring(0,12);
            titles=titles+"..";
        }

        //holder.title.setText(foodDomains.get(position).getItemName());
holder.title.setText(titles);

       /*
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

        */
/*
        int drawableResourceId = holder.itemView.getContext().getResources().getIdentifier(foodDomains.get(position).getPic(), "drawable", holder.itemView.getContext().getPackageName());

        Glide.with(holder.itemView.getContext())
                .load(drawableResourceId)
                .into(holder.pic);

 */

        Picasso.get().load(foodDomains.get(position).getPic()).into(holder.pic);
        //Picasso.get().load("https://cargoland.shiptodoor.com/image/beef.jpg").into(holder.pic);

        //MyDataString myDataString = new MyDataString();
        holder.addBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {


                   // Log.i("Data","INN Popular Click ************** "+myDataString.getCategory_Type());
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
}
