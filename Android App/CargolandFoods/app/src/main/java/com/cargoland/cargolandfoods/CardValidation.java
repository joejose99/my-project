package com.cargoland.cargolandfoods;

import java.util.regex.Matcher;
import java.util.regex.Pattern;

public class CardValidation {

    public static  boolean isValidMasterCardNo(String str)
    {

        // Regex to check valid
        // Master Card number.
        String regex = "^5[1-5][0-9]{14}|"
                + "^(222[1-9]|22[3-9]\\d|"
                + "2[3-6]\\d{2}|27[0-1]\\d|"
                + "2720)[0-9]{12}$";

        // Compile the ReGex
        Pattern p
                = Pattern.compile(regex);

        // If the string is empty
        // return false
        if (str == null) {
            return false;
        }

        // Find match between given string
        // and regular expression
        // using Pattern.matcher()
        Matcher m = p.matcher(str);

        // Return if the string
        // matched the ReGex
        return m.matches();
    }


    public static boolean isValidVisaCardNo(String str)
    {

        // Regex to check valid
        // Master Card number.
        String regex = "^4[0-9]{12}(?:[0-9]{3})?$";

        // Compile the ReGex
        Pattern p
                = Pattern.compile(regex);

        // If the string is empty
        // return false
        if (str == null) {
            return false;
        }

        // Find match between given string
        // and regular expression
        // using Pattern.matcher()
        Matcher m = p.matcher(str);

        // Return if the string
        // matched the ReGex
        return m.matches();
    }

    public static boolean isValidVervCardNo(String str)
    {

        // Regex to check valid
        // Master Card number.
        String regex = "^((506(0|1))|(507(8|9))|(6500))[0-9]{12,15}$";

        // Compile the ReGex
        Pattern p
                = Pattern.compile(regex);

        // If the string is empty
        // return false
        if (str == null) {
            return false;
        }

        // Find match between given string
        // and regular expression
        // using Pattern.matcher()
        Matcher m = p.matcher(str);

        // Return if the string
        // matched the ReGex
        return m.matches();
    }
}
