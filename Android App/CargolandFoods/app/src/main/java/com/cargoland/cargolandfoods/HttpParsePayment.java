package com.cargoland.cargolandfoods;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.URL;
import java.net.URLEncoder;
import java.util.Iterator;

import org.json.JSONObject;

public class HttpParsePayment {
    String FinalHttpData = "";
    String Result ;
    BufferedWriter bufferedWriter ;
    OutputStream outputStream ;
    BufferedReader bufferedReader ;
    StringBuilder stringBuilder = new StringBuilder();
    URL url;

    //public String postRequest(HashMap<String, String> Data, String HttpUrlHolder)

    public String postRequest(JSONObject params,String HttpUrlHolder,String signature) throws Exception {{

        try {
            url = new URL(HttpUrlHolder);

            HttpURLConnection httpURLConnection = (HttpURLConnection) url.openConnection();




            //httpURLConnection.setHeader("Content-type: application/json", "json.toString()");


            httpURLConnection.setReadTimeout(14000);

            httpURLConnection.setConnectTimeout(15000);

            httpURLConnection.setRequestMethod("POST");


            httpURLConnection.setDoInput(true);

            httpURLConnection.setDoOutput(true);

            httpURLConnection.setRequestProperty("Content-type: application/json", "json.toString()");

            //httpURLConnection.setRequestProperty("Signature","b28Yb7tNrBCoWv2J");
            httpURLConnection.setRequestProperty("Signature",signature);

            httpURLConnection.setRequestProperty("authorization","aZmyAcziUKY52u9Nph5F_17e1d102dd1e49b2a27c7600d70623cf");
            httpURLConnection.setUseCaches(false);


            outputStream = httpURLConnection.getOutputStream();


            bufferedWriter = new BufferedWriter(new OutputStreamWriter(outputStream,"UTF-8"));

            bufferedWriter.write(FinalDataParse(params));



            if(bufferedWriter != null)
            {
                bufferedWriter.flush();

                bufferedWriter.close();

            }

            if(outputStream != null)
                outputStream.close();

            if (httpURLConnection.getResponseCode() == HttpURLConnection.HTTP_OK) {

                bufferedReader = new BufferedReader(  new InputStreamReader( httpURLConnection.getInputStream()) );

                FinalHttpData = bufferedReader.readLine();
                System.out.println("************************* Data Success **************");
                System.out.println(FinalHttpData);


            }
            else
            {
                //FinalHttpData = "Something Went Wrong";
                FinalHttpData=String.valueOf(httpURLConnection.getResponseCode());
            }

            if(bufferedReader != null)

                bufferedReader.close();
        }
        catch (Exception e) {
            e.printStackTrace();
        }

        return FinalHttpData;
    }

    }

    /* public String FinalDataParse(HashMap<String,String> hashMap2) throws UnsupportedEncodingException {

         for(Map.Entry<String,String> map_entry : hashMap2.entrySet()){

             stringBuilder.append("&");

             stringBuilder.append(URLEncoder.encode(map_entry.getKey(), "UTF-8"));

             stringBuilder.append("=");

             stringBuilder.append(URLEncoder.encode(map_entry.getValue(), "UTF-8"));

         }

         Result = stringBuilder.toString();
       //Log.w("Result", Result);


         return Result ;
     }

     */
    public String FinalDataParse(JSONObject params) throws Exception {

        StringBuilder result = new StringBuilder();
        boolean first = true;

        Iterator<String> itr = params.keys();

        while(itr.hasNext()){

            String key= itr.next();
            Object value = params.get(key);

            if (first)
                first = false;
            else
                result.append("&");

            result.append(URLEncoder.encode(key, "UTF-8"));
            result.append("=");
            result.append(URLEncoder.encode(value.toString(), "UTF-8"));

        }
        return result.toString();
    }



}
