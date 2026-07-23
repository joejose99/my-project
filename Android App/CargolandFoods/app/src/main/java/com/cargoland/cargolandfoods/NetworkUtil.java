package com.cargoland.cargolandfoods;
import android.content.Context;
import android.net.ConnectivityManager;
import android.net.Network;
import android.net.NetworkCapabilities;
import android.net.NetworkInfo;
import android.os.Build;
import android.util.Log;
import android.view.WindowManager;

import androidx.annotation.NonNull;

public class NetworkUtil {

    public static void checkNetworkInfo(Context context, final OnConnectionStatusChange onConnectionStatusChange){
try{
        ConnectivityManager connectivityManager = (ConnectivityManager) context.getSystemService(Context.CONNECTIVITY_SERVICE);
        if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.N) {

            NetworkCapabilities capabilities = connectivityManager.getNetworkCapabilities(connectivityManager.getActiveNetwork());
            if (capabilities == null){
                onConnectionStatusChange.onChange(false);

            }
            connectivityManager.registerDefaultNetworkCallback(new ConnectivityManager.NetworkCallback(){
                @Override
                public void onAvailable(@NonNull Network network) {
                    onConnectionStatusChange.onChange(true);

                }
                @Override
                public void onLost(@NonNull Network network) {
                    try{


                    onConnectionStatusChange.onChange(false);
                    }catch (WindowManager.BadTokenException e){
                        e.printStackTrace();
                    }catch (Exception e){
                        e.printStackTrace();
                    }

                }
            });

        }
        //for android version below Nougat api 24
        else {

            NetworkInfo networkInfo = connectivityManager.getActiveNetworkInfo();
            onConnectionStatusChange.onChange(networkInfo!= null && networkInfo.isConnectedOrConnecting());
        }
}catch (WindowManager.BadTokenException e){
    e.printStackTrace();
} catch (Exception e){
    e.printStackTrace();
}
    }

    public interface OnConnectionStatusChange{

        void onChange(boolean type);
    }


}