package com.cargoland.cargolandfoods.StaticClass;

import java.util.ArrayList;

public class RestaurantMenu {
    public static ArrayList<String> list_title = new ArrayList<String>() ;
    public static ArrayList<String> list_pic = new ArrayList<String>();
    public static ArrayList<String> list_description = new ArrayList<String>();
    public static ArrayList<Double> list_fee = new ArrayList<Double>();
    public static ArrayList<String> list_prodId = new ArrayList<String>();
    public static ArrayList<String> list_item_name = new ArrayList<String>();
    public static ArrayList<String> list_businesId = new ArrayList<String>();


    public void setList_businesId(String list_businesId) {
        this.list_businesId.add(list_businesId);
    }
    public ArrayList<String> getList_businesId() {
        return this.list_businesId;
    }

    public void set_title(String list_title) {
        this.list_title.add(list_title);
    }
    public ArrayList<String> getList_title() {
        return this.list_title;
    }

    public void set_pic(String lst) {
        this.list_pic.add(lst);
    }
    public ArrayList<String> getList_pic() {
        return this.list_pic;
    }

    public void set_description(String lst) {
        this.list_description.add(lst);
    }
    public ArrayList<String> getList_description() {
        return this.list_description;
    }

    public void set_fee(double lst) {
        this.list_fee.add(lst);
    }
    public ArrayList<Double> getList_fee() {
        return this.list_fee;
    }

    public void set_prodId(String lst) {
        this.list_prodId.add(lst);
    }
    public ArrayList<String> getList_prodId() {
        return this.list_prodId;
    }

    public void set_item_name_list(String lst) {
        this.list_item_name.add(lst);
    }
    public ArrayList<String> getList_item_name() {
        return this.list_item_name;
    }

    public void clearRstMenu(){
        this.list_businesId.clear();
        this.list_title.clear();
        this.list_pic.clear();
        this.list_description.clear();
        this.list_fee.clear();
        this.list_prodId.clear();
        this.list_item_name.clear();
    }


}
