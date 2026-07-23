package com.cargoland.cargolandfoods.Domain;

import android.graphics.Bitmap;

import java.io.Serializable;

import android.graphics.drawable.Drawable;

import com.squareup.picasso.Picasso;
import com.squareup.picasso.Target;

import java.io.Serializable;


public class RetaurantDomain implements Serializable {

    private String business_name;
    private String pic;
    private String town;
    private String open_hour;
    private String close_hour;
    private String businessId;
    Bitmap bitmaps;

    public RetaurantDomain(String businessId,String business_name,String town,String open_hour, String close_hour, String pic) {
        this.business_name = business_name;
        this.pic = pic;
        this.town = town;
        this.open_hour = open_hour;
        this.close_hour=close_hour;
        this.pic=pic;
        this.businessId=businessId;
        //Picasso.get().load(pic).into(target);
    }

    public String getBusinessId() {
        return businessId;
    }

    public void setBusinessId(String businessId) {
        this.businessId = businessId;
    }

    public String getBusiness_name() {
        return business_name;
    }

    public void setBusiness_name(String business_name) {
        this.business_name = business_name;
    }

    public String getTown() {
        return town;
    }

    public void setTown(String town) {
        this.town = town;
    }


    public String getOpen_hour() {
        return open_hour;
    }

    public void setOpen_hour(String open_hour) {
        this.open_hour = open_hour;
    }

    public String getClose_hour() {
        return close_hour;
    }

    public void setClose_hour(String close_hour) {
        this.close_hour = close_hour;
    }


    public String getPic() {
        return pic;
    }

    public void setPic(String pic) {
        this.pic = pic;
    }
}
