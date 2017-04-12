package com.example.ryhanahmedtamim.ccps;

import android.content.Intent;
import android.os.Build;
import android.os.StrictMode;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.HttpVersion;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpGet;
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

public class ClientActivity extends AppCompatActivity {



    MainUrl Url = new MainUrl();
    String mainUrl = Url.getUrl();


    Button submitButton;
    TextView textView;





    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_client);

        submitButton = (Button) findViewById(R.id.clientSubmitButton);
        textView = (TextView) findViewById(R.id.textView4);
//        String date1 =  (new SimpleDateFormat("dd-MM-yyyy").format(Calendar.getInstance().getTime())) ;
//
//        textView.setText(date1);


        submitButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {




                String date =  (new SimpleDateFormat("dd-MM-yyyy").format(Calendar.getInstance().getTime()));


                String id = getIntent().getStringExtra("id");

                String dutyId = getIntent().getStringExtra("dutyId");

                String posturl = mainUrl +"contractualcompanypaymentsystem/public/api/stuff_duty/store/client/"+dutyId;




                InputStream inputStream = null;
                String massage = "erro";

                if(Build.VERSION.SDK_INT>=  10){

                    StrictMode.ThreadPolicy policy = StrictMode.ThreadPolicy.LAX;

                    StrictMode.setThreadPolicy(policy);
                }

                try {


                    HttpParams params = new BasicHttpParams();

                        params.setParameter(CoreProtocolPNames.PROTOCOL_VERSION, HttpVersion.HTTP_1_0);

                        HttpClient httpClient = new DefaultHttpClient(params);

                        HttpGet httpGet1 = new HttpGet(posturl);

                        HttpResponse response = httpClient.execute(httpGet1);

                        HttpEntity httpEntity = response.getEntity();

                        String message = EntityUtils.toString(response.getEntity());

                        Toast.makeText(getApplicationContext(),message,Toast.LENGTH_SHORT).show();


                    Intent intent = new Intent(ClientActivity.this,PendingActivityClient.class);
                    intent.putExtra("id", id);
                    startActivity(intent);

                } catch (Exception e) {

                    Toast.makeText(getApplicationContext(),"Connection Error",Toast.LENGTH_LONG).show();

                }


            }
        });
    }
}
