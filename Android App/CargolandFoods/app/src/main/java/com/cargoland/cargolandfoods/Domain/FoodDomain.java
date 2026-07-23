package com.cargoland.cargolandfoods.Domain;

import android.graphics.Bitmap;
import android.graphics.drawable.Drawable;

import com.squareup.picasso.Picasso;
import com.squareup.picasso.Target;

import java.io.Serializable;

public class FoodDomain implements Serializable {
    private String title;
    private String pic;
    private String description;
    private Double fee;
    private int numberInCart;
    private String prodId;
    private String item_name;
    private int clearCart;
    private String businessId;
    Bitmap bitmaps;

    public FoodDomain(String prodId,String businessId,String item_name,String title, String pic, String description, Double fee) {
        this.title = title;
        this.pic = pic;
        this.description = description;
        this.fee = fee;
        this.prodId=prodId;
        this.item_name=item_name;
        this.businessId=businessId;
        //Picasso.get().load(pic).into(target);
    }

    public FoodDomain(String prodId,String businessId,String item_name,String title, String pic, String description, Double fee, int numberInCart) {
        this.title = title;
        this.pic = pic;
        this.description = description;
        this.fee = fee;
        this.numberInCart = numberInCart;
        this.prodId=prodId;
        this.item_name=item_name;
        this.businessId=businessId;
       // Picasso.get().load(pic).into(target);
    }

    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public String getProductId() {
        return prodId;
    }

    public void setProductId(String prodId) {
        this.prodId = prodId;
    }

    public String getBusinessIdId() {
        return businessId;
    }

    public void setBusinessId(String businessId) {
        this.businessId = businessId;
    }


    public String getItemName() {
        return item_name;
    }

    public void setItemName(String item_name) {
        this.item_name = item_name;
    }


    public String getPic() {
        return pic;
    }

    public void setPic(String pic) {
        this.pic = pic;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public Double getFee() {
        return fee;
    }

    public void setFee(Double fee) {
        this.fee = fee;
    }

    public int getNumberInCart() {
        return numberInCart;
    }

    public void setNumberInCart(int numberInCart) {
        this.numberInCart = numberInCart;
    }

    /* Delete Cart */
public String getCartToEmpty(){
        return this.prodId;
}

/*
    Target target = new Target(){
        @Override
        public void onBitmapLoaded(Bitmap bitmap, Picasso.LoadedFrom from) {

        }

        @Override
        public void onBitmapFailed(Exception e, Drawable errorDrawable) {

        }

        @Override
        public void onPrepareLoad(Drawable placeHolderDrawable) {

        }


        public void OnBitmapLoaded(final Bitmap bitmap, Picasso.LoadedFrom from) {
            bitmaps=bitmap;
        }

    };

 */



}
