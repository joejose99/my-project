package com.cargoland.cargolandfoods.Helper;

import android.content.Context;
import android.util.Log;
import android.widget.Toast;

import com.cargoland.cargolandfoods.Domain.FoodDomain;
import com.cargoland.cargolandfoods.Interface.ChangeNumberItemsListener;

import java.util.ArrayList;

public class ManagementCart {
    private Context context;
    private TinyDB tinyDB;

    public ManagementCart(Context context) {
        this.context = context;
        this.tinyDB = new TinyDB(context);
    }

    public void insertFood(FoodDomain item) {
        ArrayList<FoodDomain> listFood = getListCard();

        boolean existAlready = false;
        int n = 0;
        for (int i = 0; i < listFood.size(); i++) {
           // if (listFood.get(i).getTitle().equals(item.getTitle())) {
Log.i("listData","size of listFoo "+listFood.size());
            if (listFood.get(i).getProductId().equals(item.getProductId())) {
                existAlready = true;
                n =i;
                break;
            }
        }

        if (existAlready) {
            //listFood.get(n).setNumberInCart(item.getNumberInCart()+1);
            listFood.get(n).setNumberInCart(item.getNumberInCart());
           // Log.i("data","im here ************ "+n);
        } else {
            listFood.add(item);
            //Log.i("data","im added ************ "+item);
        }

        tinyDB.putListObject("CardList", listFood);
        Toast.makeText(context, "New Item Added to the Cart", Toast.LENGTH_SHORT).show();

    }

    public ArrayList<FoodDomain> getListCard() {
        return tinyDB.getListObject("CardList");
    }



    public void plusNumberFood(ArrayList<FoodDomain> listfood, int position, ChangeNumberItemsListener changeNumberItemsListener) {
        listfood.get(position).setNumberInCart(listfood.get(position).getNumberInCart() + 1);
        tinyDB.putListObject("CardList", listfood);
        changeNumberItemsListener.changed();
    }

    public void MinusNumerFood(ArrayList<FoodDomain> listfood, int position, ChangeNumberItemsListener changeNumberItemsListener) {
        if (listfood.get(position).getNumberInCart() == 1) {
            listfood.remove(position);

        } else {
            listfood.get(position).setNumberInCart(listfood.get(position).getNumberInCart() - 1);

        }
        tinyDB.putListObject("CardList", listfood);
        changeNumberItemsListener.changed();
    }

    public Double getTotalFee() {
        ArrayList<FoodDomain> listFood2 = getListCard();
        double fee = 0;
        for (int i = 0; i < listFood2.size(); i++) {
            fee = fee + (listFood2.get(i).getFee() * listFood2.get(i).getNumberInCart());
        }
        return fee;
    }



    /* clear List Food */

    public void ClearCart(ArrayList<FoodDomain> listfood, int position, Context context, ChangeNumberItemsListener changeNumberItemsListener) {

            listfood.clear();


        tinyDB.putListObject("CardList", listfood);
        changeNumberItemsListener.changed();
    }




}
