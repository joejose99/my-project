package com.cargoland.cargolandfoods;

public class MyDataRegistration {
    public static String  fname;
    public static String surname;
    public static String address;
    public static String email;
    public static String city;
    public static String mobile;
    public static String state;
    public static String lga;
    public static String bus_stop;

    public void setFname(String str){
        this.fname=str;
    }
    public String getFname(){
            return this.fname;
    }

    public void setSurname(String str){
        this.surname=str;
    }
    public String getSurname(){
        return this.surname;
    }

    public void setAddress(String str){
        this.address=str;
    }
    public String getAddress(){
        return this.address;
    }
    public void setEmail(String str){
        this.email=str;
    }
    public String getEmail(){
        return this.email;
    }
    public void setCity(String str){
        this.city=str;
    }
    public String getCity(){
        return this.city;
    }
    public void setMobile(String str){
        this.mobile=str;
    }
    public String getMobile(){
        return this.mobile;
    }
    public void setState(String str){
        this.state=str;
    }
    public String getState(){
        return this.state;
    }
    public void setLga(String str){
        this.lga=str;
    }

    public String getLga(){
        return this.lga;
    }

    public void setBus_stop(String str){
        this.bus_stop=str;
    }

    public String getBus_stop(){
        return this.bus_stop;
    }

    public String getClear(){
        this.fname="";
        this.surname="";
        this.address="";
        this.email="";
        this.city="";
        this.mobile="";
        this.lga="";
        return this.state="";
    }


}
