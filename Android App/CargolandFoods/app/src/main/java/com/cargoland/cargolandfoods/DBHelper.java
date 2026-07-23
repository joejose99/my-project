package com.cargoland.cargolandfoods;


import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Date;
import java.util.HashMap;

import android.annotation.SuppressLint;
import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.DatabaseUtils;
import android.database.sqlite.SQLiteOpenHelper;
import android.database.sqlite.SQLiteDatabase;
public class DBHelper extends SQLiteOpenHelper  {

    public static final String DATABASE_NAME = "MyMessage.db";

    public static final String CONTACTS_TABLE_NAME = "messages";
    public static final String CONTACTS_COLUMN_ID = "id";
    public static final String CONTACTS_COLUMN_TITLE= "title";
    public static final String CONTACTS_COLUMN_MESSAGE = "message";

    public static final String USERNAME_TABLE_NAME = "users";
    public static final String USER_COLUMN_ID = "id";
    public static final String USER_COLUMN_TITLES = "title";

    public static final String USER_COLUMN_FIRSTNAME = "firstName";
    public static final String USER_COLUMN_SURNAME = "surname";
    public static final String USER_COLUMN_EMAIL = "email";
    public static final String USER_COLUMN_MOBILENO = "mobileNo";
    public static final String USER_COLUMN_ADDRESS = "address";
    public static final String USER_COLUMN_City = "city";


    public static final String USER_COLUMN_BIRTH_DAY = "birthDay";
    public static final String USER_COLUMN_MEMBER_STATUS = "memberStatus";
    public static final String USER_COLUMN_BUS_STOP = "busStop";
    public static final String USER_COLUMN_PROFESSION = "profession";
    public static final String USER_COLUMN_CHURCH_UNIT = "churchUnit";
    public static final String USER_COLUMN_COUNTRY = "country";
    public static final String USER_COLUMN_STATE = "state";
    public static final String USER_COLUMN_LGA = "lga";

    public static final String USER_COLUMN_REFERRAL = "referral";


    public static final String LOGIN_TABLE_NAME = "login";
    public static final String  LOGIN_COLUMN_ID = "id";
    public static final String LOGIN_COLUMN_MOBILE = "mobileNo";
    public static final String LOGIN_COLUMN_USER_ID = "userid";


    public static final String ATTENDANCE_TABLE_NAME = "attendance";
    public static final String  ATTENDANCE_COLUMN_ID = "id";
    public static final String ATTENDANCE_COLUMN_DATE_TIME = "datetime";

    /*
        public static final String BLUETOOTH_CHAT_TABLE_NAME = "bluetooth_chat";
        public static final String BLUETOOTH_CHAT_COLUMN_ID = "id";
        public static final String BLUETOOTH_CHAT_COLUMN_MOBILENO = "mobileNo";
        public static final String BLUETOOTH_CHAT_COLUMN_DATE = "strDate";
        public static final String BLUETOOTH_CHAT_COLUMN_TOKEN = "token";


        public static final String DATE_UPDATE_COLUMN_ID = "id";
        public static final String DATE_UPDATE_COLUMN_DATE = "strDate";
    */
    Context context;
    public static final String DATE_UPDATE_TABLE_NAME = "date_db_update";


    private HashMap hp;

    Date date = new Date();
    SimpleDateFormat formatter = new SimpleDateFormat("dd-MM-yyyy HH:mm:ss");


    String strDate = formatter.format(date);


    public DBHelper(Context context) {
        super(context, DATABASE_NAME , null, 3);
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        // TODO Auto-generated method stub


        db.execSQL(
                "create table messages " +
                        "(id integer primary key, title text,message text)"
        );

        db.execSQL(
                "create table users"+
                        "(id integer primary key,  title text, firstName text, surname text,  email text, mobileNo text, address text,   city text,memberStatus text, birthDay text,busStop text,profession text,churchUnit text,country text, state text, lga text, referral text)"
        );


        db.execSQL(
                "create table login " +
                        "(id integer primary key, mobileNo text,userid text)"
        );
        db.execSQL(
                "create table attendance " +
                        "(id integer primary key, datetime text)"
        );


/*
        db.execSQL(
                "create table "+ BLUETOOTH_CHAT_TABLE_NAME +
                        "(id integer primary key, token text,mobileNo text,strDate text)"
        );

        db.execSQL(
                "create table "+ DATE_UPDATE_TABLE_NAME +
                        "(id integer primary key, token text,mobileNo text,strDate text)"
        ); */
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        // TODO Auto-generated method stub
        db.execSQL("DROP TABLE IF EXISTS login");
        onCreate(db);

        db.execSQL("DROP TABLE IF EXISTS messages");
        onCreate(db);

        db.execSQL("DROP TABLE IF EXISTS users");
        onCreate(db);

        db.execSQL("DROP TABLE IF EXISTS attendance");
        onCreate(db);


/*
        db.execSQL("DROP TABLE IF EXISTS bluetooth_chat");
        onCreate(db);

        db.execSQL("DROP TABLE IF EXISTS date_db_update");
        onCreate(db);

 */
    }

    /* INSERT CONTACT  KEEPS THE RECORDS OF MESSAGE RECIEVED*/
    public boolean insertContact (String title, String message) {

        SQLiteDatabase db = this.getWritableDatabase();
        ContentValues contentValues = new ContentValues();
        contentValues.put("title", title);
        contentValues.put("message", message);
        db.insert("messages", null, contentValues);
        return true;
    }



    /* INSERT DATE UPDATE INTO DATABASE*/
    public boolean insert_date_db_update (String strDate) {

        SQLiteDatabase dbs = this.getReadableDatabase();
        int numRows = (int) DatabaseUtils.queryNumEntries(dbs, DATE_UPDATE_TABLE_NAME);
        if( numRows > 0)
        {
            int id =1;
            SQLiteDatabase db = this.getWritableDatabase();
            ContentValues contentValues = new ContentValues();
            contentValues.put("strDate", strDate);
            db.update("date_db_update", contentValues, "id = ? ", new String[] { Integer.toString(id) } );
            return true;
        }
        else{

            SQLiteDatabase db = this.getWritableDatabase();
            ContentValues contentValues = new ContentValues();


            contentValues.put("strDate", strDate);
            db.insert("date_db_update", null, contentValues);
            return true;
        }

    }


    /*  INSERT CHART TABLE KEEPS THE RECORD OF BLUETOOTH CHAT CONNECTION
     *
     * */

    public boolean insertChat (String token, String mobileNo) {

        SQLiteDatabase db = this.getWritableDatabase();
        ContentValues contentValues = new ContentValues();
        contentValues.put("token", token);
        contentValues.put("mobileNo", mobileNo);
        contentValues.put("strDate", strDate);
        db.insert("bluetooth_chat", null, contentValues);
        return true;
    }
    /*  INSERT MOBILE NO  TABLE KEEPS THE RECORD
     * OF USER PHONE NUMBER
     * */
/*
    public boolean insertMobileNo (String token, String mobileNo,int id) {

        SQLiteDatabase dbs = this.getReadableDatabase();
        int numRows = (int) DatabaseUtils.queryNumEntries(dbs, BLUETOOTH_TABLE_NAME);
        if( numRows > 0)
        {
            SQLiteDatabase db = this.getWritableDatabase();
            ContentValues contentValues = new ContentValues();
            contentValues.put("token", token);
            contentValues.put("mobileNo", mobileNo);
            db.update("bluetooth", contentValues, "id = ? ", new String[] { Integer.toString(id) } );
            return true;
        }
        else{

            SQLiteDatabase db = this.getWritableDatabase();
            ContentValues contentValues = new ContentValues();


            contentValues.put("token", token);
            contentValues.put("mobileNo", mobileNo);
            db.insert("bluetooth", null, contentValues);
            return true;
        }

    }

    *
 */

    public Cursor getData(int id) {
        SQLiteDatabase db = this.getReadableDatabase();
        Cursor res =  db.rawQuery( "select * from messages where id="+id+"", null );
        return res;
    }


    public Cursor getDataBluetooth(int id) {
        SQLiteDatabase db = this.getReadableDatabase();
        Cursor res =  db.rawQuery( "select * from bluetooth where id="+id+"", null );



        return res ;
    }

    public int numberOfRows(){
        SQLiteDatabase db = this.getReadableDatabase();
        int numRows = (int) DatabaseUtils.queryNumEntries(db, CONTACTS_TABLE_NAME);
        return numRows;
    }

    /* DATE TIME */
    public Cursor getDateTime(int id) {
        SQLiteDatabase db = this.getReadableDatabase();
        Cursor res =  db.rawQuery( "select * from attendance where id="+id+"", null );
        return res;
    }

/*
    public boolean updateContact (Integer id, String name, String phone, String email, String street,String place) {
        SQLiteDatabase db = this.getWritableDatabase();
        ContentValues contentValues = new ContentValues();
        contentValues.put("name", name);
        contentValues.put("phone", phone);
        contentValues.put("email", email);
        contentValues.put("street", street);
        contentValues.put("place", place);
        db.update("contacts", contentValues, "id = ? ", new String[] { Integer.toString(id) } );
        return true;
    } */

    public Integer deleteContact (Integer id) {
        SQLiteDatabase db = this.getWritableDatabase();
        return db.delete("messages",
                "id = ? ",
                new String[] { Integer.toString(id) });
    }

    public void deleteAll() {
        SQLiteDatabase db = this.getWritableDatabase();
        db.execSQL("delete from  messages");

    }

    public void deleteDateTime() {
        SQLiteDatabase db = this.getWritableDatabase();
        db.execSQL("delete from  attendance");

    }

    /* USERS STARTS HERE */


    public int numberOfRows_users(){
        SQLiteDatabase db = this.getReadableDatabase();
        int numRows = (int) DatabaseUtils.queryNumEntries(db, CONTACTS_TABLE_NAME);
        return numRows;
    }

    public void deleteAll_users() {
        SQLiteDatabase db = this.getWritableDatabase();
        db.execSQL("delete from  users");

    }


    public Cursor getUsers(int id) {
        SQLiteDatabase db = this.getReadableDatabase();
        Cursor res =  db.rawQuery( "select * from users where id="+id+"", null );

        return res;
    }





    public boolean insert_users(String title,String firstname, String surname, String email, String mobileNo, String address, String city,String status,String bus_stop,String birth_day, String profession, String church_unit, String country, String state, String lga, String referral) {

        SQLiteDatabase db = this.getWritableDatabase();
        ContentValues contentValues = new ContentValues();
        contentValues.put("title", title);
        contentValues.put("firstName", firstname);
        contentValues.put("surname", surname);
        contentValues.put("email", email);
        contentValues.put("mobileNo", mobileNo);
        contentValues.put("address", address);
        contentValues.put("city", city);
        contentValues.put("memberStatus", status);
        contentValues.put("birthDay", birth_day);
        contentValues.put("busStop", bus_stop);
        contentValues.put("profession", profession);
        contentValues.put("churchUnit", church_unit);
        contentValues.put("country", country);
        contentValues.put("state", state);
        contentValues.put("lga", lga);
        contentValues.put("referral", referral);



        db.insert("users", null, contentValues);
        return true;
    }


    /* END OF USERS  */


    public boolean insert_date_time(String dateTime) {

        SQLiteDatabase db = this.getWritableDatabase();
        ContentValues contentValues = new ContentValues();
        contentValues.put("datetime", dateTime);

        db.insert("attendance", null, contentValues);
        return true;
    }



    /* RETRIVING ALL THE MESSAGES IN CONTACT
     *
     *  */

    public ArrayList<String> getAllCotacts() {
        ArrayList<String> array_list = new ArrayList<String>();

        //hp = new HashMap();
        SQLiteDatabase db = this.getReadableDatabase();
        Cursor res =  db.rawQuery( "select * from messages", null );
        res.moveToFirst();

        //String contents = remoteMessage.getNotification().getTitle() +"  "+ strDate +"\n\n" + remoteMessage.getNotification().getBody();

        while(res.isAfterLast() == false){
            @SuppressLint("Range") String   contents =res.getString(res.getColumnIndex(CONTACTS_COLUMN_TITLE));
            @SuppressLint("Range") String   contents_msg=res.getString(res.getColumnIndex(CONTACTS_COLUMN_MESSAGE));
            //array_list.add(res.getString(res.getColumnIndex(CONTACTS_COLUMN_TITLE)));
            //array_list.add(res.getString(res.getColumnIndex(CONTACTS_COLUMN_MESSAGE)));
            array_list.add(contents +"\n\n"+ contents_msg);
            res.moveToNext();
        }
        return array_list;
    }


    /* LOGING USERS STARTS HERE */

    public void deleteAll_loginusers() {
        SQLiteDatabase db = this.getWritableDatabase();
        db.execSQL("delete from  login");

    }


    public Cursor getLoginUsers(int id) {
        SQLiteDatabase db = this.getReadableDatabase();
        Cursor res =  db.rawQuery( "select * from login where id="+id+"", null );

        return res;
    }





    public boolean insert_loginusers(String mobileNo,String userId) {

        SQLiteDatabase db = this.getWritableDatabase();
        ContentValues contentValues = new ContentValues();
        contentValues.put("mobileNo", mobileNo);
        contentValues.put("userid", userId);




        db.insert("login", null, contentValues);
        return true;
    }





    /* GET ALL THE BLUETOOTH CHAT MOBILE NUMBER SAVED.
     * THIS WILL ENABLE US TO UPLOAD IT TO SERVER
     * */

    /*
    public ArrayList<String> getAllBluetoothChat() {
        ArrayList<String> array_list = new ArrayList<String>();

        //hp = new HashMap();
        SQLiteDatabase db = this.getReadableDatabase();
        Cursor res =  db.rawQuery( "select * from messages", null );
        res.moveToFirst();

        //String contents = remoteMessage.getNotification().getTitle() +"  "+ strDate +"\n\n" + remoteMessage.getNotification().getBody();

        while(res.isAfterLast() == false){
            String   contents =res.getString(res.getColumnIndex(BLUETOOTH_CHAT_COLUMN_MOBILENO));
            String   contents_msg=res.getString(res.getColumnIndex(BLUETOOTH_CHAT_COLUMN_TOKEN));
            String   contents_date=res.getString(res.getColumnIndex(BLUETOOTH_CHAT_COLUMN_DATE));

            array_list.add(contents +"\n\n"+ contents_msg+"\n\n"+ contents_date);
            res.moveToNext();
        }
        return array_list;
    }

     */


}

