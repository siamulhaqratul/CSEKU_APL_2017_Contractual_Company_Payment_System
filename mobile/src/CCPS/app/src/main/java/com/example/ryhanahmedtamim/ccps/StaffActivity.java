package com.example.ryhanahmedtamim.ccps;

import android.app.DatePickerDialog;
import android.app.Dialog;
import android.content.Intent;
import android.os.Build;
import android.os.StrictMode;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.MotionEvent;
import android.view.View;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.Toast;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.HttpVersion;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.entity.StringEntity;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.params.BasicHttpParams;
import org.apache.http.params.CoreProtocolPNames;
import org.apache.http.params.HttpParams;
import org.apache.http.util.EntityUtils;
import org.json.JSONObject;

import java.io.InputStream;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Date;

public class StaffActivity extends AppCompatActivity {

    EditText approximateNextDate;
    Button submitButton;

    MainUrl Url = new MainUrl();
    String mainUrl = Url.getUrl();

    int Eyear,Emonth,Eday;
    static final int dialogId = 0;



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_staff);

        approximateNextDate = (EditText) findViewById(R.id.nextDate);
        submitButton = (Button) findViewById(R.id.staffSubmitButton);

        final Calendar calendar = Calendar.getInstance();
        Eyear = calendar.get(Calendar.YEAR);
        Emonth = calendar.get(Calendar.MONTH);
        Eday = calendar.get(Calendar.DAY_OF_MONTH);

        approximateNextDate.setOnTouchListener(new View.OnTouchListener() {
            @Override
            public boolean onTouch(View v, MotionEvent event) {

                showDialog(dialogId);


                return false;
            }
        });





        //approximateNextDate.setText(id);

        submitButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                String date =  (new SimpleDateFormat("MM/dd/yyyy").format(Calendar.getInstance().getTime())) ;

                String id = getIntent().getStringExtra("id");

                String URL = mainUrl+"contractualcompanypaymentsystem/public/api/stuff_duty/store";


                String loginURL = URL;

                InputStream inputStream = null;
                String massage = "ERROR";

                if(Build.VERSION.SDK_INT>=  10){

                    StrictMode.ThreadPolicy policy = StrictMode.ThreadPolicy.LAX;

                    StrictMode.setThreadPolicy(policy);
                }

                try {


                    HttpParams params = new BasicHttpParams();

                    params.setParameter(CoreProtocolPNames.PROTOCOL_VERSION, HttpVersion.HTTP_1_0);

                    HttpClient httpClient = new DefaultHttpClient(params);

                    HttpPost httpPost = new HttpPost(loginURL);

                    JSONObject jsonObject = new JSONObject();

                    jsonObject.accumulate("contract_id", id);

                    jsonObject.accumulate("duty_date", date);

                    jsonObject.accumulate("next_date",approximateNextDate.getText().toString());

                    String json = jsonObject.toString();

                    StringEntity se = new StringEntity(json);

                    // 6. set httpPost Entity
                    httpPost.setEntity(se);


                    // httpPost.setEntity();
                    httpPost.setHeader("Content-type", "application/json");


                    HttpResponse response = httpClient.execute(httpPost);

                    HttpEntity httpEntity = response.getEntity();


                    String json_string = EntityUtils.toString(response.getEntity());

                    Toast.makeText(getApplicationContext(),json_string,Toast.LENGTH_SHORT).show();

//                    JSONObject jsonObject1 = new JSONObject(json_string);
//
//                    String massage1 = jsonObject1.toString();
//
//                    Toast.makeText(getApplicationContext(),massage1,Toast.LENGTH_LONG).show();



                } catch (Exception e) {

                }

            }
        });


    }

    @Override
    protected Dialog onCreateDialog(int id){

        if(id == dialogId){
            return new DatePickerDialog(this, datepickerListener,Eyear,Emonth,Eday);
        }

        return null;
    }

    private DatePickerDialog.OnDateSetListener datepickerListener = new DatePickerDialog.OnDateSetListener() {
        @Override
        public void onDateSet(DatePicker view, int year, int monthOfYear, int dayOfMonth) {
            Eyear = year;
            Emonth = monthOfYear+1;
            Eday = dayOfMonth;

            approximateNextDate.setText(Eday+"/"+Emonth+"/"+Eyear);
        }
    };

    public void showDilog(int id){

    }
}
