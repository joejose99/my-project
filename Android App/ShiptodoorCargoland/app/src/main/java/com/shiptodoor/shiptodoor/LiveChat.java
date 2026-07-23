package com.shiptodoor.shiptodoor;

import android.os.Bundle;

import com.google.android.material.snackbar.Snackbar;

import androidx.appcompat.app.AppCompatActivity;

import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.Button;
import android.widget.EditText;

import androidx.navigation.NavController;
import androidx.navigation.Navigation;
import androidx.navigation.ui.AppBarConfiguration;
import androidx.navigation.ui.NavigationUI;

import android.view.Window;
import android.view.WindowManager;

import com.shiptodoor.shiptodoor.databinding.ActivityLiveChatBinding;

public class LiveChat extends AppCompatActivity {
    Button b1;
    EditText ed1;
    private AppBarConfiguration appBarConfiguration;
    private ActivityLiveChatBinding binding;
     private String urls="https://tawk.to/chat/60b7cf63de99a4282a1b0bc0/1f77047de";
     //private String urls="https://tawk.to";
     //private String urls="https://eciesl.com";
private WebView webview;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        setContentView(R.layout.activity_live_chat);
        Window window = getWindow();
        window.setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN,WindowManager.LayoutParams.FLAG_FULLSCREEN);


        b1=(Button)findViewById(R.id.button);
        ed1=(EditText)findViewById(R.id.editText);

        webview=(WebView)findViewById(R.id.webview);
        webview.setWebViewClient(new MyBrowser());

        webview.getSettings().setLoadsImagesAutomatically(true);
        webview.getSettings().setJavaScriptEnabled(true);
        webview.getSettings().setAllowContentAccess(true);
        webview.getSettings().setAllowFileAccessFromFileURLs(true);
        webview.getSettings().setBlockNetworkLoads(false);
        webview.getSettings().setDatabaseEnabled(true);
        webview.getSettings().setBlockNetworkImage(false);
        webview.setScrollBarStyle(View.SCROLLBARS_INSIDE_OVERLAY);
        webview.loadUrl(urls);

        b1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String url = ed1.getText().toString();

                webview.getSettings().setLoadsImagesAutomatically(true);
                webview.getSettings().setJavaScriptEnabled(true);
                webview.setScrollBarStyle(View.SCROLLBARS_INSIDE_OVERLAY);
                webview.loadUrl(url);
            }
        });
    }


private class MyBrowser extends WebViewClient{
        @Override
    public boolean shouldOverrideUrlLoading(WebView webview,String url){
            webview.loadUrl(url);
            return true;

        }
}

}