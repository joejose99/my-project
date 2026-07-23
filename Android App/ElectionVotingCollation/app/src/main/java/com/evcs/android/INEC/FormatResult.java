package com.eciels.android.INEC;

import java.text.NumberFormat;
import java.util.Locale;

public class FormatResult {

    private  String result;
    public FormatResult(int  rst) {


        NumberFormat formatter = NumberFormat.getNumberInstance(Locale.getDefault());
        this.result =formatter.format(rst);


    }

    public String getResult() {


        return result;
    }
}
