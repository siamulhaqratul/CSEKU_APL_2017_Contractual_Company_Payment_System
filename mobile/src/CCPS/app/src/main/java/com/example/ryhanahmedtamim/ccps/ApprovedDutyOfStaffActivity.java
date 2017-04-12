package com.example.ryhanahmedtamim.ccps;

import android.os.Build;
import android.os.StrictMode;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.ArrayAdapter;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.HttpVersion;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.params.BasicHttpParams;
import org.apache.http.params.CoreProtocolPNames;
import org.apache.http.params.HttpParams;
import org.apache.http.util.EntityUtils;
import org.json.JSONArray;
import org.json.JSONObject;

import java.util.ArrayList;

public class ApprovedDutyOfStaffActivity extends AppCompatActivity {

    ListView approvedDuties;

    MainUrl mainUrl = new  MainUrl();

    String mainurl = mainUrl.getUrl();
    JSONObject jsonObject1 = new JSONObject();
    ArrayList<String> contract;

    String url =mainurl+"contractualcompanypaymentsystem/public/api/all/pendingdutys";


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_approved_duty_of_staff);


        approvedDuties = (ListView) findViewById(R.id.approvedDutiesListView);


        String dutyId = getIntent().getStringExtra("id");

        contract = new ArrayList<String>();


        String massage = "ERROR";

        String URL = url;

        if(Build.VERSION.SDK_INT>=  10){

            StrictMode.ThreadPolicy policy = StrictMode.ThreadPolicy.LAX;

            StrictMode.setThreadPolicy(policy);
        }


        try {

            HttpParams httpParams = new BasicHttpParams();
            httpParams.setParameter(CoreProtocolPNames.PROTOCOL_VERSION, HttpVersion.HTTP_1_0);

            HttpClient httpClient = new DefaultHttpClient(httpParams);
            HttpGet httpGet = new HttpGet(URL);

            HttpResponse httpResponse = httpClient.execute(httpGet);

            HttpEntity httpEntity = httpResponse.getEntity();

            String json_string = EntityUtils.toString(httpResponse.getEntity());

            JSONArray jsonArray = new JSONArray(json_string);

            for(int i=0; i<jsonArray.length(); i++)
            {

                String s =  jsonArray.getJSONObject(i).toString();

                jsonObject1 = new  JSONObject (s);

                if(dutyId.equals(jsonObject1.getString("contract_id")) && (jsonObject1.getString("approved_by_client").equals("1"))){
                    contract.add("Contract Id No: "+jsonObject1.getString("contract_id")+" Duty Date : " + jsonObject1.getString("duty_date"));

                }

            }

            ListAdapter listAdapter = new ArrayAdapter<String>(this,R.layout.support_simple_spinner_dropdown_item,contract);
            approvedDuties.setAdapter(listAdapter);

        }catch (Exception e){

            Toast.makeText(getApplicationContext(),massage,Toast.LENGTH_SHORT);

        }
    }
}
