package com.eciels.android.INEC.Adapter;


import android.annotation.SuppressLint;
import android.content.Intent;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;


import com.eciels.android.INEC.FoodDomain.VotingTextDomain;
import com.eciels.android.INEC.FormatResult;
import com.eciels.android.INEC.R;
import com.eciels.android.INEC.ShowDetailActivity;
import com.eciels.android.INEC.ShowTextDetails;

import java.util.ArrayList;

import java.text.NumberFormat;
import java.util.Locale;
public class VotingTextAdapter extends RecyclerView.Adapter<VotingTextAdapter.ViewHolder> {
    ArrayList<VotingTextDomain> votingTextDomains;

    public VotingTextAdapter(ArrayList<VotingTextDomain> VotingTextDomains) {
        this.votingTextDomains = VotingTextDomains;
    }


    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View inflate = LayoutInflater.from(parent.getContext()).inflate(R.layout.viewholder_voting_text, parent, false);

        return new ViewHolder(inflate);
    }

    @Override
    public void onBindViewHolder(@NonNull ViewHolder holder, @SuppressLint("RecyclerView") int position) {
try{


        holder.category.setText(votingTextDomains.get(position).getWard());
        String titles=votingTextDomains.get(position).getPollingunit();
        if(titles.length()>12){
            titles=titles.substring(0,12);
            titles=titles+"..";
        }

        //holder.title.setText(foodDomains.get(position).getItemName());
        holder.title.setText(titles);
if(votingTextDomains.get(position).getParty_pdp().trim().equals("PDP")){

    int numbPDP= Integer.parseInt(votingTextDomains.get(position).getResult_pdp());
    //NumberFormat formatter = NumberFormat.getNumberInstance(Locale.getDefault());
    //String stPDP =formatter.format(numbPDP);
    FormatResult formatResult = new  FormatResult(numbPDP);

    holder.fee_2.setText(formatResult.getResult());

    //holder.fee_2.setText(votingTextDomains.get(position).getResult_pdp());


    holder.lbl_pdp.setText(votingTextDomains.get(position).getParty_pdp() );
  //  Log.i("Data", "My Party print "+votingTextDomains.get(position).getParty_pdp());
}

        if(votingTextDomains.get(position).getParty_apc().trim().equals("APC")){

            int numbAPC= Integer.parseInt(votingTextDomains.get(position).getResult_apc());

            FormatResult   formatResult = new  FormatResult(numbAPC);

            holder.fee_1.setText(formatResult.getResult());
           // holder.fee_1.setText(votingTextDomains.get(position).getResult_apc());
            holder.lbl_apc.setText(votingTextDomains.get(position).getParty_apc() );
           // Log.i("Data", "My Party print "+votingTextDomains.get(position).getParty_apc());
        }


        if(votingTextDomains.get(position).getParty_others().trim().equals("OTHERS")){
            //Log.i("Data", "My Party print "+votingTextDomains.get(position).getParty_others());

            int numbOHTERS= Integer.parseInt(votingTextDomains.get(position).getResult_others());

            FormatResult   formatResult = new  FormatResult(numbOHTERS);

            holder.fee_0.setText(formatResult.getResult());
           // holder.fee_0.setText(votingTextDomains.get(position).getResult_others());
            holder.lbl_others.setText(votingTextDomains.get(position).getParty_others());

        }

    if(votingTextDomains.get(position).getParty_lp().trim().equals("NDC")){
        //Log.i("Data", "My Party print "+votingTextDomains.get(position).getParty_others());

        int numbNDC= Integer.parseInt(votingTextDomains.get(position).getResult_lp());

        FormatResult   formatResult = new  FormatResult(numbNDC);

        holder.fee_10.setText(formatResult.getResult());
        //holder.fee_10.setText(votingTextDomains.get(position).getResult_lp());
        holder.lbl_lp.setText(votingTextDomains.get(position).getParty_lp());

    }

    if(votingTextDomains.get(position).getParty_adc().trim().equals("ADC")){

        int numbADC= Integer.parseInt(votingTextDomains.get(position).getResult_adc());


        FormatResult   formatResult = new  FormatResult(numbADC);

        //Log.i("Data", "My Party print "+votingTextDomains.get(position).getParty_others());
        holder.fee_adc.setText(formatResult.getResult());
        //holder.fee_adc.setText(votingTextDomains.get(position).getResult_adc());
        holder.lbl_adc.setText(votingTextDomains.get(position).getParty_adc());

    }

    int numb1=0;
    int numb2=0;
    int numb3=0;
    int numb4=0;
    int numb5=0;
    int intTotal=0;
         numb1= Integer.parseInt(votingTextDomains.get(position).getResult_pdp());
     numb2= Integer.parseInt(votingTextDomains.get(position).getResult_apc());

     numb3= Integer.parseInt(votingTextDomains.get(position).getResult_others());

    numb5= Integer.parseInt(votingTextDomains.get(position).getResult_adc());

    if(votingTextDomains.get(position).getParty_lp().trim().equals("NDC")) {
        numb4 = Integer.parseInt(votingTextDomains.get(position).getResult_lp());
        intTotal= numb1 + numb2 + numb3 +numb4 +numb5;
    }
else {
        intTotal= numb1 + numb2 + numb3 ;
    }

    holder.lbl_total.setText("Total: ");

    NumberFormat formatter = NumberFormat.getNumberInstance(Locale.getDefault());
    holder.lbltotal.setText(formatter.format(intTotal));

    //holder.lbltotal.setText(String.valueOf(intTotal));




        //Picasso.get().load(VotingTextDomain.get(position).getPic()).into(holder.pic);

        //MyDataString myDataString = new MyDataString();
        holder.addBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {


                // Log.i("Data","INN Popular Click ************** "+myDataString.getCategory_Type());
                Intent intent = new Intent(holder.itemView.getContext(), ShowTextDetails.class);
                intent.putExtra("object", votingTextDomains.get(position));


                holder.itemView.getContext().startActivity(intent);





            }
        });

}catch (NullPointerException e){
    e.printStackTrace();
}catch(Exception e){
    e.printStackTrace();
}
    }


    @Override
    public int getItemCount() {
        return votingTextDomains.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {
        TextView title, fee,symboles,fee_2,category,fee_1,fee_0,lbl_pdp,lbl_apc,lbl_lp,lbl_others,lbl_adc,fee_adc,lbltotal,lbl_total,fee_10;
        ImageView pic;
        TextView addBtn;


        public ViewHolder(@NonNull View itemView) {
            super(itemView);
            title = itemView.findViewById(R.id.title);
            fee = itemView.findViewById(R.id.fee);
            fee_2 = itemView.findViewById(R.id.fee_2);
            fee_1 = itemView.findViewById(R.id.fee_1);
            fee_0 = itemView.findViewById(R.id.fee_0);
            fee_10= itemView.findViewById(R.id.fee_10);
            lbltotal = itemView.findViewById(R.id.lbltotal);
            lbl_total = itemView.findViewById(R.id.textView11);
            category = itemView.findViewById(R.id.category);
            fee_adc=itemView.findViewById(R.id.fee_adc);

            lbl_pdp= itemView.findViewById(R.id.textView14);
            lbl_apc= itemView.findViewById(R.id.textView13);
            lbl_others= itemView.findViewById(R.id.textView12);
            lbl_adc= itemView.findViewById(R.id.textViewADC);
            lbl_lp=itemView.findViewById(R.id.textView16);
            pic = itemView.findViewById(R.id.pic);
            addBtn = itemView.findViewById(R.id.addBtn);
            symboles = itemView.findViewById(R.id.textView14);



        }
    }

}
