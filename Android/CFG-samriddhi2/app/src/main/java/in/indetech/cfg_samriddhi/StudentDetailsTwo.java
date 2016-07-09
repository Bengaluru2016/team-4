package in.indetech.cfg_samriddhi;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.EditText;

public class StudentDetailsTwo extends AppCompatActivity {


    EditText fatherName, fatherOccupation, fatherIncome, fatherMobile;
    EditText motherName, motherOccupation, motherIncome, motherMobile;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_student_details_two);

        init();

    }

    private void init() {

        fatherName = (EditText) findViewById(R.id.fatherNameEditText);
        fatherOccupation = (EditText) findViewById(R.id.fatherOccupationEditText);
        fatherIncome = (EditText) findViewById(R.id.fatherIncomeEditText);
        fatherMobile = (EditText) findViewById(R.id.fatherMobileNumber);

        motherName = (EditText) findViewById(R.id.motherNameEditText);
        motherOccupation = (EditText) findViewById(R.id.motherOccupationEditText);
        motherIncome = (EditText) findViewById(R.id.motherIncomeEditText);
        motherMobile = (EditText) findViewById(R.id.motherMobileNumber);


    }

    public void next(View view) {

        StudentDetailsOne.studentdata.setFather_name(fatherName.getText().toString());
        StudentDetailsOne.studentdata.setFather_occupation(fatherOccupation.getText().toString());
        StudentDetailsOne.studentdata.setFather_income(fatherIncome.getText().toString());
        StudentDetailsOne.studentdata.setFather_number(fatherMobile.getText().toString());

        StudentDetailsOne.studentdata.setMother_name(motherName.getText().toString());
        StudentDetailsOne.studentdata.setMother_occupation(motherOccupation.getText().toString());
        StudentDetailsOne.studentdata.setMother_income(motherIncome.getText().toString());
        StudentDetailsOne.studentdata.setMother_number(motherMobile.getText().toString());


        startActivity(new Intent(StudentDetailsTwo.this,StudentDetailsThree.class));

    }
}
