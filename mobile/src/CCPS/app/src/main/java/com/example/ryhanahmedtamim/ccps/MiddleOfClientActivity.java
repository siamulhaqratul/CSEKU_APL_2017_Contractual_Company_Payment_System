package com.example.ryhanahmedtamim.ccps;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

public class MiddleOfClientActivity extends AppCompatActivity {

    Button pendingButton ;
    Button approvedButton;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_middle_of_client);

        final String contractId = getIntent().getStringExtra("id");


        pendingButton = (Button) findViewById(R.id.pendingDutyButton);
        approvedButton = (Button) findViewById(R.id.ApprovedDutyButton);

        approvedButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Intent intent = new Intent(MiddleOfClientActivity.this,ApprovedDutyOfClientActivity.class);
                intent.putExtra("id", contractId);
                startActivity(intent);


            }
        });

        pendingButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Intent intent = new Intent(MiddleOfClientActivity.this,PendingActivityClient.class);
                intent.putExtra("id", contractId);
                startActivity(intent);





            }
        });
    }
}
