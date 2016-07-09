package in.indetech.cfg_samriddhi;

import android.content.Intent;
import android.content.SharedPreferences;
import android.preference.PreferenceManager;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;

public class SplashScreen extends AppCompatActivity {

    SharedPreferences mPreferences;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.splash_screen);

        mPreferences = PreferenceManager.getDefaultSharedPreferences(SplashScreen.this);

        Thread mThread = new Thread(new Runnable() {
            @Override
            public void run() {
                try {
                    Thread.sleep(1250);
                    if(mPreferences.getBoolean(Constants.LOGIN_SHARED_PREFERENCE,false))
                    {
                        startActivity(new Intent(SplashScreen.this,Login.class));
                    }else{
                        startActivity(new Intent(SplashScreen.this,StudentDetails.class));
                    }
                } catch (InterruptedException e) {
                    e.printStackTrace();
                }
            }
        });

        mThread.start();

    }
}
