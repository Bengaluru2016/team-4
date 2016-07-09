package in.indetech.cfg_samriddhi;

import android.net.Uri;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.EditText;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;

public class StudentDetailsThree extends AppCompatActivity {

    EditText nativeState, nativeDistrict, nativeAddress, nativeContact;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_student_details_three);

        nativeState = (EditText) findViewById(R.id.nativeState);
        nativeDistrict = (EditText) findViewById(R.id.nativeDistrict);
        nativeAddress = (EditText) findViewById(R.id.nativeAddress);
        nativeContact = (EditText) findViewById(R.id.nativeContact);

    }

    public void submit(View view) {

        StudentDetailsOne.studentdata.setState(nativeState.getText().toString());
        StudentDetailsOne.studentdata.setDistrict(nativeDistrict.getText().toString());
        StudentDetailsOne.studentdata.setAddress(nativeAddress.getText().toString());
        StudentDetailsOne.studentdata.setNative_contact(nativeContact.getText().toString());

        addData();

    }

    private void addData() {

        new AsyncTask<Void, Void, Void>() {

            String Response = "";

            @Override
            protected Void doInBackground(Void... voids) {

                BufferedReader mBufferedInputStream;

                try {
                    URL url = new URL(Constants.URL + "/test_survey.php");

                    HttpURLConnection httpURLConnection = (HttpURLConnection) url.openConnection();

                    httpURLConnection.setConnectTimeout(15000);
                    httpURLConnection.setReadTimeout(10000);
                    httpURLConnection.setDoInput(true);
                    httpURLConnection.setDoOutput(true);


                    Uri.Builder builder = new Uri.Builder()
                            .appendQueryParameter("suveryer_name", StudentDetailsOne.studentdata.getSurveyer_name())
                            .appendQueryParameter("survey_locality", StudentDetailsOne.studentdata.getLocality_name())
                            .appendQueryParameter("student_name", StudentDetailsOne.studentdata.getStudent_name())
                            .appendQueryParameter("dob", StudentDetailsOne.studentdata.getDob())
                            .appendQueryParameter("age", StudentDetailsOne.studentdata.getAge())
                            .appendQueryParameter("gender", StudentDetailsOne.studentdata.getGender())
                            .appendQueryParameter("no_of_siblings", StudentDetailsOne.studentdata.getNo_of_siblings())
                            .appendQueryParameter("Mother_tongue", StudentDetailsOne.studentdata.getMother_tongue())
                            .appendQueryParameter("education_level", StudentDetailsOne.studentdata.getEducation_level())
                            .appendQueryParameter("previous_occupation", StudentDetailsOne.studentdata.getPrevious_occupation())
                            .appendQueryParameter("reason", StudentDetailsOne.studentdata.getReason())
                            .appendQueryParameter("fatname", StudentDetailsOne.studentdata.getFather_name())
                            .appendQueryParameter("fatocc", StudentDetailsOne.studentdata.getFather_occupation())
                            .appendQueryParameter("fatinc", StudentDetailsOne.studentdata.getFather_income())
                            .appendQueryParameter("fatmobno", StudentDetailsOne.studentdata.getFather_number())
                            .appendQueryParameter("motname", StudentDetailsOne.studentdata.getMother_name())
                            .appendQueryParameter("motocc", StudentDetailsOne.studentdata.getMother_occupation())
                            .appendQueryParameter("motmobno", StudentDetailsOne.studentdata.getMother_number())
                            .appendQueryParameter("natstate", StudentDetailsOne.studentdata.getState())
                            .appendQueryParameter("natdist", StudentDetailsOne.studentdata.getDistrict())
                            .appendQueryParameter("nataddr", StudentDetailsOne.studentdata.getAddress())
                            .appendQueryParameter("contno", StudentDetailsOne.studentdata.getNative_contact());

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
    }

    .

    execute();

}
}
