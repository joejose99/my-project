package com.shiptodoor.shiptodoor;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;

import android.graphics.Color;
import android.view.View;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemSelectedListener;
import android.widget.Toast;

public class MyOnItemSelectedListener implements OnItemSelectedListener {

    @Override
    public void onItemSelected(AdapterView<?> parent, View view, int pos, long id) {


        String s = parent.getSelectedItem().toString();

        //parent.setBackgroundColor(Color.GREEN);

        // Toast.makeText(parent.getContext(),	"Selected State : " + parent.getItemAtPosition(pos).toString(), Toast.LENGTH_SHORT).show();

        String str =parent.getItemAtPosition(pos).toString();
        s="Delta";

		/*  if(s != "Select" || str != "Select")
		{
			MainActivity pop =	new MainActivity();

			 pop.PopulateLGA(s);
		}  */

    }

    @Override
    public void onNothingSelected(AdapterView<?> parent) {

    }

}
