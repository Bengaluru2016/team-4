package in.indetech.cfg_samriddhi;

import android.app.DatePickerDialog;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.RadioGroup;

public class StudentDetailsOne extends AppCompatActivity {

    public static StudentData studentdata;

    EditText studentNameEditText,ageEditText,noOfSiblingsEditText
            ,motherTongueEditText,educationLevelEditText,previousOccupationEditText
            ,reasonEditText;

    RadioGroup radioGroup;

    String gender = "not available";
    String dob;

    Button DOB;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_student_details);

        studentdata = new StudentData();



        init();

    }

    private void init() {

        studentNameEditText = (EditText) findViewById(R.id.studentNameEditText);
        ageEditText = (EditText) findViewById(R.id.ageEditText);
        noOfSiblingsEditText = (EditText) findViewById(R.id.noOfSibEditText);
        motherTongueEditText= (EditText) findViewById(R.id.motherTongueEditText);
        educationLevelEditText = (EditText) findViewById(R.id.educationLevelEditText);
        previousOccupationEditText = (EditText) findViewById(R.id.previousOccupationEditText);
        reasonEditText = (EditText) findViewById(R.id.reasonEditText);

        //

        radioGroup = (RadioGroup) findViewById(R.id.radGroup);

        radioGroup.setOnCheckedChangeListener(new RadioGroup.OnCheckedChangeListener() {
            @Override
            public void onCheckedChanged(RadioGroup radioGroup, int i) {
                if (i==0){
                    gender = "male";
                }else{
                    gender = "female";
                }
            }
        });

        DOB = (Button) findViewById(R.id.datePicker);

        DOB.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                new DatePickerDialog(StudentDetailsOne.this, new DatePickerDialog.OnDateSetListener() {
                    @Override
                    public void onDateSet(DatePicker datePicker, int i, int i1, int i2) {
                        dob = i+"-"+i1+"-"+i2;
                    }
                }, 2016, 7, 10).show();

            }
        });

    }

    public void next(View view) {

        studentdata.setStudent_name(studentNameEditText.getText().toString());
        studentdata.setAge(ageEditText.getText().toString());
        studentdata.setNo_of_siblings(noOfSiblingsEditText.getText().toString());
        studentdata.setMother_tongue(motherTongueEditText.getText().toString());
        studentdata.setEducation_level(educationLevelEditText.getText().toString());
        studentdata.setPrevious_occupation(previousOccupationEditText.getText().toString());
        studentdata.setReason(reasonEditText.getText().toString());
        studentdata.setGender(gender);
        studentdata.setDob(dob);

        startActivity(new Intent(StudentDetailsOne.this,StudentDetailsTwo.class));




    }
}
