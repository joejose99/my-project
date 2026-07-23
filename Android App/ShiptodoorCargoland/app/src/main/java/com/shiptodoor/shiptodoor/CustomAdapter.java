package com.shiptodoor.shiptodoor;
import android.content.Context;
import android.database.DataSetObserver;
import android.graphics.Typeface;
import android.text.*;
import android.text.style.ForegroundColorSpan;
import android.text.style.RelativeSizeSpan;
import android.text.style.StyleSpan;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.ListAdapter;
import android.widget.TextView;

import android.graphics.Color;
import android.graphics.drawable.*;
import android.graphics.drawable.GradientDrawable;

//import com.squareup.picasso.Picasso;
import java.util.ArrayList;
class CustomAdapter implements ListAdapter {

    SpannableStringBuilder builder  =new SpannableStringBuilder();
    /*ArrayList<SubjectData> arrayList;
    Context context;
    public CustomAdapter(Context context, ArrayList<SubjectData> arrayList) {
        this.arrayList=arrayList;
        this.context=context;
    }*/

    ArrayList array_list;
    private String[] data;
    //private String[] data2;
    private Context context;

    public CustomAdapter(Context context, ArrayList array_lst) {
        super();
        this.array_list = array_lst;
        //this.data2 = data2;
        this.context = context;

        Log.d("SQLITE Data Array 1 : ",array_lst.toString());
    }





    @Override
    public boolean areAllItemsEnabled() {
        return false;
    }
    @Override
    public boolean isEnabled(int position) {
        return true;
    }
    @Override
    public void registerDataSetObserver(DataSetObserver observer) {
    }
    @Override
    public void unregisterDataSetObserver(DataSetObserver observer) {
    }
    @Override
    public int getCount() {
        return array_list.size();
        // return data.length;
    }
    @Override
    public Object getItem(int position) {
        return position;
    }
    @Override
    public long getItemId(int position) {
        return position;
    }
    @Override
    public boolean hasStableIds() {
        return false;
    }
    @Override
    public View getView(int position, View convertView, ViewGroup parent) {

        View rowView = LayoutInflater.from(context).
                inflate(R.layout.track_details, parent, false);

        // SubjectData subjectData=arrayList.get(position);
        // if(rowView==null) {
            /*
            LayoutInflater layoutInflater = LayoutInflater.from(context);
            convertView=layoutInflater.inflate(R.layout.their_message, null);

 */
        rowView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
            }
        });




        View avater=rowView.findViewById(R.id.avatar);
        TextView msgbody=rowView.findViewById(R.id.message_body);





        String blueTitle= array_list.get(position).toString();

        Log.i("Text","--------- Blue Title "+blueTitle);

        Log.i("Location","--------- Location length "+getLength("Location"));
        int intLenght = getLength("Location");
        int intpos =getPos(blueTitle,"Location");
        int intEndPos =getDiff(intLenght,intpos);

        Log.i("LocalDiff","--------- Location Diff "+getDiff(intLenght,intpos));

        SpannableString blueTSpannable = new SpannableString(blueTitle);

        blueTSpannable.setSpan(new ForegroundColorSpan(context.getResources().getColor(R.color.colorTitle)),0,5,blueTSpannable.SPAN_EXCLUSIVE_EXCLUSIVE);
         blueTSpannable.setSpan(new RelativeSizeSpan(1.1f),0,5,0);
      blueTSpannable.setSpan(new StyleSpan(Typeface.BOLD),0,5,0);
        builder.append(blueTSpannable);

        msgbody.setText(builder, TextView.BufferType.SPANNABLE);

        builder.clear();









        /* LOCATION SECTION STARTS HERE */

        blueTSpannable.setSpan(new ForegroundColorSpan(context.getResources().getColor(R.color.colorTitle)),intpos,intEndPos,blueTSpannable.SPAN_EXCLUSIVE_EXCLUSIVE);

          blueTSpannable.setSpan(new RelativeSizeSpan(1.1f),intpos,intEndPos,0);
        blueTSpannable.setSpan(new StyleSpan(Typeface.BOLD),intpos,intEndPos,0);

        builder.append(blueTSpannable);
     msgbody.setText(builder, TextView.BufferType.SPANNABLE);

        builder.clear();

      /* DESCRIPTION SECTION STARTS HERE */
        intLenght = getLength("Description");
         intpos =getPos(blueTitle,"Description");
         intEndPos =getDiff(intLenght,intpos);

        blueTSpannable.setSpan(new ForegroundColorSpan(context.getResources().getColor(R.color.colorTitle)),intpos,intEndPos,blueTSpannable.SPAN_EXCLUSIVE_EXCLUSIVE);

        blueTSpannable.setSpan(new RelativeSizeSpan(1.1f),intpos,intEndPos,0);
        blueTSpannable.setSpan(new StyleSpan(Typeface.BOLD),intpos,intEndPos,0);
        builder.append(blueTSpannable);


        msgbody.setText(builder, TextView.BufferType.SPANNABLE);

        builder.clear();




        /* STATUS SECTION STARTS HERE */


        intLenght = getLength("Status");
        intpos =getPos(blueTitle,"Status");
        intEndPos =getDiff(intLenght,intpos);

        blueTSpannable.setSpan(new ForegroundColorSpan(context.getResources().getColor(R.color.colorTitle)),intpos,intEndPos,blueTSpannable.SPAN_EXCLUSIVE_EXCLUSIVE);

        blueTSpannable.setSpan(new RelativeSizeSpan(1.0f),intpos,intEndPos,0);
        //blueTSpannable.setSpan(new StyleSpan(Typeface.BOLD),intpos,intEndPos,0);
        builder.append(blueTSpannable);


        msgbody.setText(builder, TextView.BufferType.SPANNABLE);


        builder.clear();




        GradientDrawable drawable = (GradientDrawable) avater.getBackground();



        // holder.avatar = (View) convertView.findViewById(R.id.avatar);
        // holder.name = (TextView) convertView.findViewById(R.id.name);

        //tittle.setText(subjectData.SubjectName);
        //Picasso.with(context).load(subjectData.Image).into(imag);
        //}
        return rowView;
    }
    @Override
    public int getItemViewType(int position) {
        return position;
    }
    @Override
    public int getViewTypeCount() {
        //return data.length;
        return array_list.size();
    }
    @Override
    public boolean isEmpty() {
        return false;
    }


//GET THE LENGTH TEXT
    private int getLength(String strlength){

        int intString = strlength.length();
        return intString;
    }

    //GET THE THE POSITION OF TEXT FROM THE STRING
    private int getPos(String strfull, String strfind){

        int intPos = strfull.indexOf(strfind);
        return intPos;
    }
private int getDiff(int len,int pos){
        return pos+len+1;
}

}
