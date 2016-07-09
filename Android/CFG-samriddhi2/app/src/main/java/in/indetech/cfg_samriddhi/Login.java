package in.indetech.cfg_samriddhi;

import android.app.ProgressDialog;
import android.content.Intent;
import android.content.SharedPreferences;
import android.net.Uri;
import android.os.AsyncTask;
import android.os.Bundle;
import android.preference.PreferenceManager;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;

public class Login extends AppCompatActivity {

    EditText username, password;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        init();
    }

    private void init() {

        username = (EditText) findViewById(R.id.username);
        password = (EditText) findViewById(R.id.password);

    }

    public void login_method(View view) {

        String user_name = username.getText().toString();
        String pass_word = password.getText().toString();

        authenticate(user_name, pass_word);

    }

    private void authenticate(final String user_name, final String pass_word) {

        new AsyncTask<Void, Void, Void>() {

            String Response = "";
            ProgressDialog mProgressDialog;


            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                mProgressDialog = new ProgressDialog(Login.this);
                mProgressDialog.setMessage("Loading...");
                mProgressDialog.setIndeterminate(true);
                mProgressDialog.show();
            }

            @Override
            protected void onPostExecute(Void aVoid) {
                super.onPostExecute(aVoid);
                if(Response.equals("success")){
                    mProgressDialog.dismiss();
                    SharedPreferences mSharedPreferences = PreferenceManager.getDefaultSharedPreferences(Login.this);
                    mSharedPreferences.edit().putBoolean(Constants.LOGIN_SHARED_PREFERENCE,true).apply();
                    startActivity(new Intent(Login.this,StudentDetails.class));
                    finish();
                }else{
                    mProgressDialog.dismiss();
                    Toast.makeText(Login.this, "Login failed , please try again!", Toast.LENGTH_SHORT).show();
                }
            }

            @Override
            protected Void doInBackground(Void... voids) {

                BufferedReader mBufferedInputStream;

                    try {
                        URL url = new URL(Constants.URL+"/login.php");

                        HttpURLConnection httpURLConnection = (HttpURLConnection) url.openConnection();

                        httpURLConnection.setConnectTimeout(15000);
                        httpURLConnection.setReadTimeout(10000);
                        httpURLConnection.setDoInput(true);
                        httpURLConnection.setDoOutput(true);


                        Uri.Builder builder = new Uri.Builder()
                                .appendQueryParameter("username", user_name)
                                .appendQueryParameter("password", pass_word);

                        String query = builder.build().getEncodedQuery();

                        OutputStream os = httpURLConnection.getOutputStream();

                        BufferedWriter mBufferedWriter = new BufferedWriter(new OutputStreamWriter(os, "UTF-8"));
                        mBufferedWriter.write(query);
                        mBufferedWriter.flush();
                        mBufferedWriter.close();
                        os.close();

                        httpURLConnection.connect();

                        Log.d("DARSHAN", "response code " + httpURLConnection.getResponseCode());

                        if (httpURLConnection.getResponseCode() == HttpURLConnection.HTTP_OK) {

                            mBufferedInputStream = new BufferedReader(new InputStreamReader(httpURLConnection.getInputStream()));
                            String inline;
                            while ((inline = mBufferedInputStream.readLine()) != null) {
                                Response += inline;
                            }
                            mBufferedInputStream.close();
                            Log.d("DARSHAN", "sent the msg successfully");

                            Log.d("DARSHAN", Response);

                        } else {
                            Log.d("darshan", "something wrong");

                        }

                    } catch (MalformedURLException e) {
                        e.printStackTrace();
                    } catch (IOException e) {
                        e.printStackTrace();
                    }

                    return null;


            }

        }.execute();


        }
    }
