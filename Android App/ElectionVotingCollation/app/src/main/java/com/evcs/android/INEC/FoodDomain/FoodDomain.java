package com.eciels.android.INEC.FoodDomain;

import android.graphics.Bitmap;

import java.io.Serializable;

public class FoodDomain implements Serializable {
    private String title;
    private String pic;
    private String pollingunit;
    private String ward;

     private int numberInCart;

    public FoodDomain(String pollingunit, String ward,  String title, String pic) {
        this.title = title;
        this.pic = pic;
        this.pollingunit = pollingunit;
        this.ward = ward;

    }

    public FoodDomain(String pollingunit, String ward,  String title, String pic , int numberInCart) {
        this.title = title;
        this.pic = pic;
        this.pollingunit = pollingunit;
        this.ward = ward;
        this.numberInCart = numberInCart;

    }

    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public String getPollingunit() {
        return pollingunit;
    }

    public void setPollingunit(String prodId) {
        this.pollingunit = pollingunit;
    }

    public String getWard() {
        return ward;
    }

    public void setWard(String businessId) {
        this.ward = ward;
    }




    public String getPic() {
        return pic;
    }

    public void setPic(String pic) {
        this.pic = pic;
    }



    public int getNumberInCart() {
        return numberInCart;
    }

    public void setNumberInCart(int numberInCart) {
        this.numberInCart = numberInCart;
    }




}
