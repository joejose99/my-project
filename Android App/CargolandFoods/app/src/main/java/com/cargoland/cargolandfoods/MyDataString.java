package com.cargoland.cargolandfoods;

import java.util.ArrayList;
import java.util.Date;
import java.util.List;

public class MyDataString {
    public static String  strMyData;
    public static String dates;
    public static String taxRate;
    public static String deliveryRate;
    public static String category_title;
    public static int category_type;

    public static ArrayList<String> list = new ArrayList<String>();

    public void setMyData(String str){
        this.strMyData=str;
    }

    public void setTaxRate(String str){
        this.taxRate=str;
    }
    public void setDeliveryRate(String str){
        this.deliveryRate=str;
    }

    public void setDates(String str){
        this.dates=str;
    }

    public void clearDates(){
        this.dates="";
    }
    public String getStrMyData(){
        return this.strMyData;
    }


    public String getMyDates(){
        return this.dates;
    }
    public String getTaxRate(){
        return this.taxRate;
    }

    public String getDeliveryRate(){
        return this.deliveryRate;
    }

    public void setSearch(String lst) {
        this.list.add(lst);
    }

    public String getCategory_Title(){
        return this.category_title;
    }

    public void setCategory_title(String lst) {
        this.category_title=lst;
    }


    public Integer getCategory_Type(){
        return this.category_type;
    }

    public void setCategory_Type(int lst) {
        this.category_type=lst;
    }




    public ArrayList<String> getSearch_list() {
        return this.list;
    }
    public void clearList(){
        this.list.clear();
    }


}
