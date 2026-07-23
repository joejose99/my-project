package com.cargoland.cargolandfoods.Adapter;

import android.content.Intent;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.constraintlayout.widget.ConstraintLayout;
import androidx.core.content.ContextCompat;
import androidx.recyclerview.widget.RecyclerView;

import com.bumptech.glide.Glide;
import com.cargoland.cargolandfoods.Activity.RestuarantActivity;
import com.cargoland.cargolandfoods.Activity.ShowCategoryActivity;
import com.cargoland.cargolandfoods.Activity.ShowDetailActivity;
import com.cargoland.cargolandfoods.Domain.CategoryDomain;

import com.cargoland.cargolandfoods.MyDataString;
import com.cargoland.cargolandfoods.R;

import java.util.ArrayList;

public class CategoryAdapter extends RecyclerView.Adapter<CategoryAdapter.ViewHolder> {
    ArrayList<CategoryDomain> categoryDomains;
MyDataString myDataString;
    public CategoryAdapter(ArrayList<CategoryDomain> categoryDomains) {
        this.categoryDomains = categoryDomains;
    }

    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View inflate = LayoutInflater.from(parent.getContext()).inflate(R.layout.viewholder_cat, parent, false);

        return new ViewHolder(inflate);
    }

    @Override
    public void onBindViewHolder(@NonNull ViewHolder holder, int position) {
        holder.categoryName.setText(categoryDomains.get(position).getTitle());
        String picUrl = "";
        switch (position) {
            case 0: {
                picUrl = "cat_1";
                holder.mainLayout.setBackground(ContextCompat.getDrawable(holder.itemView.getContext(), R.drawable.category_background1));
                break;
            }
            case 1: {
                picUrl = "cat_2";
                holder.mainLayout.setBackground(ContextCompat.getDrawable(holder.itemView.getContext(), R.drawable.category_background2));
                break;
            }
            case 2: {
                picUrl = "cat_3";
                holder.mainLayout.setBackground(ContextCompat.getDrawable(holder.itemView.getContext(), R.drawable.category_background3));
                break;
            }
            case 3: {
                picUrl = "cat_4";
                holder.mainLayout.setBackground(ContextCompat.getDrawable(holder.itemView.getContext(), R.drawable.category_background4));
                break;
            }
            case 4: {
                picUrl = "cat_5";
                holder.mainLayout.setBackground(ContextCompat.getDrawable(holder.itemView.getContext(), R.drawable.category_background5));
                break;
            }
            case 5: {
                picUrl = "cat_6";
                holder.mainLayout.setBackground(ContextCompat.getDrawable(holder.itemView.getContext(), R.drawable.category_background3));
                break;
            }
        }
       // int drawableResourceId = holder.itemView.getContext().getResources().getIdentifier(picUrl, "drawable", holder.itemView.getContext().getPackageName());

        int drawableResourceId = holder.itemView.getContext().getResources().getIdentifier(categoryDomains.get(position).getPic(), "drawable", holder.itemView.getContext().getPackageName());


        Glide.with(holder.itemView.getContext())
                .load(drawableResourceId)
                .into(holder.categoryPic);


        /* LINK STARTS HERE */

        try{

            holder.categoryPic.setOnClickListener(new View.OnClickListener(){

                @Override
                public  void onClick(View view){

                    //Toast.makeText(view.getContext(),"Item clicked "+ movie.toString(),Toast.LENGTH_LONG).show();

                    myDataString = new MyDataString();


                    Log.i("Data","My Data String String ************* "+ myDataString.getStrMyData());

                    Log.i("data","My Title "+categoryDomains.get(position).getTitle());
                    if(myDataString.getCategory_Type()==2){

                        Intent intent = new Intent(holder.itemView.getContext(), ShowCategoryActivity.class);
                        intent.putExtra("object", categoryDomains.get(position).getTitle());
                        holder.itemView.getContext().startActivity(intent);


                    }
                    else if(categoryDomains.get(position).getTitle().trim().equals("Food")){

                        Log.i("data",categoryDomains.get(position).getTitle());

                        Intent intent = new Intent(holder.itemView.getContext(), RestuarantActivity.class);
                        intent.putExtra("object", categoryDomains.get(position).getTitle());
                        intent.putExtra("data", myDataString.getStrMyData());
                        holder.itemView.getContext().startActivity(intent);
                        myDataString.setCategory_title(categoryDomains.get(position).getTitle());

                    }else {

                        Log.i("data",categoryDomains.get(position).getTitle());

                        Intent intent = new Intent(holder.itemView.getContext(), ShowCategoryActivity.class);
                        intent.putExtra("object", categoryDomains.get(position).getTitle());
                        intent.putExtra("data", myDataString.getStrMyData());
                        holder.itemView.getContext().startActivity(intent);
                    }




                }
            }) ;


            holder.categoryName.setOnClickListener(new View.OnClickListener(){

                @Override
                public  void onClick(View view){


                    // Toast.makeText(view.getContext(),"Item clicked "+ movie.toString(),Toast.LENGTH_LONG).show();
Log.i("data",categoryDomains.get(position).getTitle());
MyDataString myDataString = new MyDataString();

if(myDataString.getCategory_Type()==2){

        Intent intent = new Intent(holder.itemView.getContext(), ShowCategoryActivity.class);
        intent.putExtra("object", categoryDomains.get(position).getTitle());
        holder.itemView.getContext().startActivity(intent);


}
else if(categoryDomains.get(position).getTitle().trim().equals("Food")){
    myDataString.setCategory_title(categoryDomains.get(position).getTitle());

    Intent intent = new Intent(holder.itemView.getContext(), RestuarantActivity.class);
    intent.putExtra("object", categoryDomains.get(position).getTitle());
    holder.itemView.getContext().startActivity(intent);

}else{

    Intent intent = new Intent(holder.itemView.getContext(), ShowCategoryActivity.class);
    intent.putExtra("object", categoryDomains.get(position).getTitle());
    holder.itemView.getContext().startActivity(intent);

}



                }
            }) ;




        }catch (NullPointerException e) {
            e.printStackTrace();
        }






    }


    @Override
    public int getItemCount() {
        return categoryDomains.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {
        TextView categoryName;
        ImageView categoryPic;
        ConstraintLayout mainLayout;

        public ViewHolder(@NonNull View itemView) {
            super(itemView);
            categoryName = itemView.findViewById(R.id.categoryName);
            categoryPic = itemView.findViewById(R.id.categoryPic);
            mainLayout = itemView.findViewById(R.id.mainLayout);
        }
    }
}
