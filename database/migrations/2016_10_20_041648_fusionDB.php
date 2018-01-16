<?php
// create database name 'IIITDMJFUSION'
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class FusionDB extends Migration

      {
      /**
       * Run the migrations.
       *
       * @return void
       */
      public function up() 

            {
            // NAMAN LAL
            Schema::create('All_Student', function (Blueprint $table)
                  {
                  $table->string('student_id', 100);
                  $table->primary('student_id');
                  $table->string('avatar', 100);
                  $table->integer('roll_no');
                  $table->string('email', 100);
                  $table->string('name', 100);
                  $table->date('DOB');
                  $table->string('fathers_name', 100);
                  $table->string('mothers_name', 100);
                  $table->string('permanent_address', 500);
                  $table->string('hometown', 50);
                  $table->string('state', 50);
                  $table->string('correspondence_address', 500);
                  $table->string('sex', 10);
                  $table->string('category', 10);
                  $table->string('blood_group', 5)->nullable();
                  $table->string('health_insurance_id', 100)->nullable();
                  $table->string('guardian', 100);
                  $table->bigInteger('student_phone_no');
                  $table->bigInteger('fathers_phone_no');
                  $table->bigInteger('guardian_phone_no');
                  $table->integer('batch');
                  $table->string('programme');
                  $table->string('branch', 50);
                  $table->integer('semester');
                  $table->double('cpi');
                  $table->string('room_no', 10);
                  $table->string('hall_no', 5);
                  $table->string('fathers_email_id', 50);
                  $table->bigInteger('allah_account_no')->nullable();
                  $table->timestamps();
                  });
            Schema::create('Student', function (Blueprint $table)
                  {
                  $table->string('student_id', 100);
                  $table->primary('student_id');
                  $table->string('avatar');
                  $table->integer('roll_no');
                  $table->string('email', 100);
                  $table->string('name', 100);
                  $table->date('DOB');
                  $table->string('fathers_name', 100);
                  $table->string('mothers_name', 100);
                  $table->string('permanent_address', 500);
                  $table->string('hometown', 50);
                  $table->string('state', 50);
                  $table->string('correspondence_address', 500);
                  $table->string('sex', 10);
                  $table->string('category', 10);
                  $table->string('blood_group', 5)->nullable();
                  $table->string('health_insurance_id', 100)->nullable();
                  $table->string('guardian', 100);
                  $table->bigInteger('student_phone_no');
                  $table->bigInteger('fathers_phone_no');
                  $table->bigInteger('guardian_phone_no');
                  $table->integer('batch');
                  $table->string('programme');
                  $table->string('branch', 50);
                  $table->integer('semester');
                  $table->double('cpi');
                  $table->string('room_no', 10);
                  $table->string('hall_no', 5);
                  $table->string('fathers_email_id', 50);
                  $table->bigInteger('allah_account_no')->nullable();
                  $table->timestamps();
                  });
            Schema::create('Faculty', function (Blueprint $table)
                  {
                  $table->string('faculty_id', 50);
                  $table->primary('faculty_id');
                  $table->string('name');
                  $table->string('sex', 5);
                  $table->string('address', 500);
                  $table->string('email', 100);
                  $table->string('department');
                  $table->bigInteger('mobile_no');
                  $table->date('DOB');
                  $table->string('blood_group');
                  $table->string('alternate_email'); //Other than college mail or personal email-Id
                  $table->string('photo_url');
                  $table->string('signature_url');
                  $table->string('designation');
                  $table->string('about_me');
                  $table->date('start_date');
                  $table->date('end_date');
                  $table->timestamps();
                  });
            Schema::create('Course', function (Blueprint $table)
                  {
                  $table->string('course_id', 50);
                  $table->string('department', 100);
                  $table->string('course_name', 200);
                  $table->integer('sem');
                  $table->integer('credits');
                  $table->string('programme', 50);
                  $table->string('syllabus_url', 500);
                  $table->integer('total_classes');
                  $table->timestamps();
                  $table->primary('course_id');
                  });
                   Schema::create('Class_Rooms', function (Blueprint $table)
                  {
                  $table->string('room_id', 100);
                  $table->integer('strength');
                  $table->string('room_type', 100);
                  $table->primary('room_id');
                  $table->timestamps();
                  });
            Schema::create('Medals_Awards_Scholarship', function (Blueprint $table)
                  {
                  $table->string('scholarship_id', 100);
                  $table->string('title', 100);
                  $table->string('type', 50);
                  $table->string('description', 100);
                  $table->date('start_date');
                  $table->date('end_date');
                  $table->primary('scholarship_id');
                  $table->timestamps();
                  });
            Schema::create('Non_Academic_Events', function (Blueprint $table) //Venue---------------------------Relation
                  {
                  $table->increments('event_id');
                  $table->string('event_name', 100);
                  $table->string('description', 500);
                  $table->string('result', 200)->nullable();
                  $table->string('club_name', 100);
                  $table->integer('capacity');
                  $table->timestamp('start_timestamp')->nullable();
                  $table->timestamp('end_timestamp')->nullable();
                  $table->string('room_id',100);
                  $table->foreign('room_id')->references('room_id')->on('Class_Rooms')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();

                  });
            Schema::create('Menu', function (Blueprint $table)
                  {
                  $table->string('mess_id', 20);
                  $table->string('day', 20);
                  $table->string('meal', 100);
                  $table->string('item_name', 100);
                  $table->primary(['mess_id', 'day', 'meal', 'item_name']);
                  $table->date('effective_from');
                  $table->timestamps();
                  });
            Schema::create('Inventory', function (Blueprint $table)
                  {
                  $table->integer('item_id');
                  $table->string('item_category');
                  $table->string('item_name', 100);
                  $table->string('item_description', 100);
                  $table->string('supplier_id', 100);
                  $table->integer('cost_price');
                  $table->integer('sale_price');
                  $table->integer('purchase_rate');
                  $table->integer('items_consumed');
                  $table->integer('item_in_hand');
                  $table->primary('item_id');
                  $table->timestamps();
                  });
            Schema::create('Faculty_Roles', function (Blueprint $table)
                  {
                  $table->string('faculty_id', 100);
                  $table->string('roles', 100);
                  $table->string('department', 100);
                  $table->timestamps();
                  $table->primary(['faculty_id', 'roles']);
                  $table->foreign('faculty_id')->references('faculty_id')->on('Faculty')->onDelete('cascade')->onUpdate('cascade');
                  });
            Schema::create('Employee_Approve_Reimb', function (Blueprint $table) //Check this table
                  {
                  $table->string('emp_id', 100);
                  $table->string('emp_type', 100);
                  $table->integer('approve_amt');
                  $table->timestamps();
                  $table->primary(['emp_id', 'emp_type']);
                  });
            Schema::create('Employee_Leave', function (Blueprint $table)
                  {
                  $table->string('user_id', 100);
                  $table->string('user_type', 100);
                  $table->integer('app_id');
                  $table->integer('status');
                  $table->string('leave_type', 100);
                  $table->date('from');
                  $table->date('to');
                  $table->string('purpose', 100);
                  $table->string('comments', 100);
                  $table->string('leave_granting_officer', 100);
                  $table->timestamps();
                  $table->primary(['user_id', 'user_type', 'leave_type', 'from', 'to']);
                  });
            Schema::create('Employee_request_reimb', function (Blueprint $table) //Check this table
                  {
                  $table->string('emp_id', 100);
                  $table->string('docs_url', 100);
                  $table->string('emp_type', 100);
                  $table->timestamps();
                  $table->primary(['emp_id', 'emp_type']);
                  });
            
            Schema::create('CC_Complaint', function (Blueprint $table)
                  {
                  $table->string('complaint_id', 100);
                  $table->string('user_id', 100);
                  $table->string('user_type', 100);
                  $table->string('category', 100);
                  $table->string('sub_category', 100);
                  $table->string('pc_no', 100);
                  $table->integer('status');
                  $table->integer('cc_no');
                  $table->primary('complaint_id');
                  $table->timestamps();
                  });
            Schema::create('Booking', function (Blueprint $table)
                  {
                  $table->increments('id');
                  $table->string('room_no', 100);
                  $table->string('bookers_id', 100);
                  $table->string('category', 5);
                  $table->date('arrival_date');
                  $table->date('departure_date');
                  $table->time('departure_time');
                  $table->time('arrival_time');
                  $table->string('name', 50);
                  $table->string('address', 100);
                  $table->string('organization', 50);
                  $table->string('nationality', 50);
                  $table->string('purpose_of_visit', 50);
                  $table->string('email_id', 50);
                  $table->boolean('food');
                  $table->integer('no_of_rooms')->default(0); //just give a if condition as not assigned if value is 0
                  $table->biginteger('phone_no');
                  $table->integer('no_of_person');
                  $table->string('bill_settle_by', 20);
                  $table->integer('status');
                  $table->double('fine')->default(null)->nullable();
                  $table->double('bill')->default(null)->nullable();
                  $table->timestamps();
                  });
            Schema::create('Bus', function (Blueprint $table)
                  {
                  $table->integer('bus_id');
                  $table->integer('status');
                  $table->integer('capacity');
                  $table->integer('ticket_price');
                  $table->primary('bus_id');
                  $table->timestamps();
                  });
            Schema::create('Appointment_Doctor', function (Blueprint $table) //Changes
                  {
                  $table->integer('appointment_id')->unique();
                  $table->string('user_id', 15);
                  $table->string('user_type', 15);
                  $table->string('date', 20);
                  $table->string('doctor_id', 10);
                  $table->primary(['user_id', 'user_type', 'date', 'doctor_id']);
                  $table->timestamps();
                  });
            Schema::create('Activity_Description', function (Blueprint $table)
                  {
                  $table->string('activity_name', 100);
                  $table->string('description', 500);
                  $table->string('doc_url', 100);
                  $table->date('tentative_date')->nullable();
                  $table->date('actual_date')->nullable();
                  $table->primary(['activity_name', 'tentative_date']);
                  $table->timestamps();
                  });
            Schema::create('Administrators', function (Blueprint $table)
                  {
                  $table->string('admin_id', 100);
                  $table->string('email', 100);
                  $table->string('name', 100);
                  $table->string('department', 100);
                  $table->string('sub_department', 100);
                  $table->string('post', 100);
                  $table->primary('admin_id');
                  $table->timestamps();
                  });
            Schema::create('Answer', function (Blueprint $table)
                  {
                  $table->increments('id');
                  $table->string('question_id', 100);
                  $table->string('answer_user_id', 500);
                  $table->string('answer_user_type', 10);
                  $table->string('answer', 500);
                  $table->timestamps();
                  });
            Schema::create('Company', function (Blueprint $table)
                  {
                  $table->string('company_id', 100)->unique();
                  $table->string('name', 100);
                  $table->string('min_qualification', 100);
                  $table->string('eligibility_criteria', 100);
                  $table->string('company_type', 10);
                  $table->float('package', 10, 2);
                  $table->date('arrival_date')->nullable();
                  $table->timestamps();
                  $table->primary('company_id');
                  });
            Schema::create('Academic_Events', function (Blueprint $table)
                  {
                  $table->increments('event_id');
                  $table->string('event_name', 50);
                  $table->string('description', 500);
                  $table->string('booked_by', 100);
                  $table->integer('capacity');
                  $table->string('result', 200)->nullable();
                  $table->timestamp('start_timestamp')->nullable();
                  $table->timestamp('end_timestamp')->nullable();
                  $table->string('room_id',100);
                  $table->foreign('room_id')->references('room_id')->on('Class_Rooms')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
                  
            Schema::create('Booking_Rooms', function (Blueprint $table)
                  {
                  $table->integer('booking_id');
                  $table->string('room_no', 5);
                  $table->primary(['booking_id','room_no']);
                  });
            
            Schema::create('Balance_leaves', function (Blueprint $table)
                  {
                  $table->string('user_id', 100);
                  $table->string('user_type', 100);
                  $table->integer('casual');
                  $table->integer('special_casual');
                  $table->integer('half_pay');
                  $table->integer('commuted');
                  $table->integer('earned');
                  $table->integer('maternity');
                  $table->integer('paternity');
                  $table->integer('study');
                  $table->integer('sabbatical');
                  $table->integer('leave_not_due');
		  $table->integer('restricted_holiday');
                  $table->integer('foreign_service_short');
                  $table->integer('foreign_service_long');
                  $table->primary(['user_id', 'user_type']);
                  $table->timestamps();
                  });
            Schema::create('Staff', function (Blueprint $table)
                  {
                  $table->string('staff_id', 100);
                  $table->string('name', 100);
                  $table->string('email', 100);
                  $table->string('address', 500);
                  $table->string('department', 100);
                  $table->string('sub_department', 100);
                  $table->string('post', 100);
                  $table->string('sex', 10);
                  $table->primary('staff_id');
                  $table->timestamps();
                  });
            Schema::create('Room_Booking_Request', function (Blueprint $table)
                  {
                  $table->increments('req_id', 100);
                  $table->string('room_id', 100);
                  $table->string('requester_id', 100);
                  $table->string('requester_type', 100);
                  $table->integer('status');
                  $table->string('purpose', 1000);
                  $table->integer('expected_no_of_students');
                  $table->date('date')->nullable();
                  $table->time('start_time');
                  $table->time('end_time');
                  $table->timestamps();
                  });
            Schema::create('Salary', function (Blueprint $table)
                  {
                  $table->string('emp_id', 100);
                  $table->string('emp_type', 100);
                  $table->integer('sal_amount');
                  $table->integer('allowances');
                  $table->integer('bonuses');
                  $table->primary(['emp_id', 'emp_type']);
                  $table->timestamps();
                  });
            Schema::create('Scheduled_Activity', function (Blueprint $table)
                  {
                  $table->string('activity_name', 100)->default('');
                  $table->string('club_name', 100);
                  $table->primary('activity_name');
                  $table->timestamps();
                  });
            Schema::create('Question', function (Blueprint $table)
                  {
                  $table->string('user_id', 100);
                  $table->string('question_id', 100);
                  $table->string('course_id', 100);
                  $table->string('question', 500);
                  $table->date('timestamp')->nullable();
                  $table->primary('question_id');
                  $table->foreign('course_id')->references('course_id')->on('Course')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Project_by_Gymkhana', function (Blueprint $table)
                  {
                  $table->string('project_name', 100);
                  $table->string('project_description', 100);
                  $table->string('proposed_by', 100);
                  $table->date('date_of_proposal');
                  $table->primary('project_name');
                  $table->timestamps();
                  });
            /* Schema::create('Proposed_Events', function(Blueprint $table) {
            $table->string('event_id', 100);
            $table->string('description', 500);
            $table->string('club_name', 100);
            $table->primary('event_id');
            $table->timestamps();
            });*/
            Schema::create('Question_Of_Semester_Feedback', function (Blueprint $table)
                  {
                  $table->integer('question_id');
                  $table->string('question', 500);
                  $table->primary('question_id');
                  $table->timestamps();
                  });
            Schema::create('Record_Hospital', function (Blueprint $table)
                  {
                  $table->integer('appointment_id');
                  $table->string('prescription', 500);
                  $table->primary('appointment_id');
                  $table->timestamps();
                  });
            /*Schema::create('Requested_Events', function(Blueprint $table) {
            $table->string('event_id', 100);
            $table->string('club_name', 100);
            $table->string('description', 500);
            $table->integer('status');
            $table->string('student_id', 100);
            $table->primary('event_id');
            $table->timestamps();
            });*/
            Schema::create('Semester_Feedback', function (Blueprint $table)
                  {
                  $table->increments('id');
                  $table->string('faculty_id', 100);
                  $table->string('course_id', 100);
                  $table->integer('question_id');
                  $table->integer('excellent');
                  $table->integer('good');
                  $table->integer('average');
                  $table->integer('poor');
                  // $table->primary(['faculty_id', 'course_id', 'question_id']);
                  $table->foreign('course_id')->references('course_id')->on('Course')->onDelete('cascade')->onUpdate('cascade');
                  $table->foreign('faculty_id')->references('faculty_id')->on('Faculty')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Senate_Meeting', function (Blueprint $table)
                  {
                  $table->string('agenda', 100);
                  $table->string('minutes', 100);
                  $table->timestamp('timestamp');
                  $table->primary('timestamp');
                  $table->timestamps();
                  });
            Schema::create('Student_Committee', function (Blueprint $table)
                  {
                  $table->string('committee_name', 100);
                  $table->bigInteger('budget');
                  $table->string('description', 100);
                  $table->primary('committee_name');
                  $table->timestamps();
                  });
            Schema::create('Supplier_Info', function (Blueprint $table)
                  {
                  $table->string('supplier_id', 100);
                  $table->string('name', 100);
                  $table->string('company', 100);
                  $table->bigInteger('contact');
                  $table->string('address', 100);
                  $table->primary('supplier_id');
                  $table->timestamps();
                  });
            Schema::create('VH_Rooms', function (Blueprint $table)
                  {
                  $table->string('room_no', 20);
                  $table->string('room_type', 20);
                  $table->boolean('checked_in');
                  $table->boolean('availability');
                  $table->primary('room_no');
                  $table->timestamps();
                  });
            Schema::create('Visitors_Complaint', function (Blueprint $table)
                  {
                  $table->increments('complaint_no');
                  $table->integer('booking_id');
                  $table->integer('fine')->nullable()->default(0);
                  $table->string('description', 500);
                  $table->timestamps();
                  });
            Schema::create('Ward', function (Blueprint $table)
                  {
                  $table->string('ward_id', 100);
                  $table->string('bed_id', 100);
                  $table->integer('status');
                  $table->primary(['ward_id', 'bed_id']);
                  $table->timestamps();
                  });
            Schema::create('Login', function (Blueprint $table)
                  {
                  $table->string('username', 100);
                  $table->string('user_type', 100);
                  $table->string('password', 100);
                  $table->primary('username');
		  $table->rememberToken();
                  //$table->foreign('username')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  // $table->foreign('username')->references('faculty_id')->on('Faculty')->onDelete('cascade')->onUpdate('cascade');
                  // $table->foreign('username')->references('staff_id')->on('Staff')->onDelete('cascade')->onUpdate('cascade');
                  // $table->foreign('username')->references('admin_id')->on('Administrators')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Patient', function (Blueprint $table)
                  {
                  $table->string('patient_id', 100);
                  $table->string('patient_type', 100);
                  $table->string('category', 100);
                  $table->string('ward_id', 100);
                  $table->string('bed_id', 100);
                  $table->primary(['patient_id', 'patient_type']);
                  $table->timestamps();
                  });
            Schema::create('Academic_Result', function (Blueprint $table)
                  {
                  $table->string('student_id', 100);
                  $table->string('course_id', 100);
                  $table->string('grade', 5);
                  $table->integer('semester');
                  $table->primary(['student_id', 'course_id']);
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->foreign('course_id')->references('course_id')->on('Course')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Application_Counselling', function (Blueprint $table)
                  {
                  $table->string('student_id', 100);
                  $table->primary('student_id');
                  /*
                  Fill all the form attributes here
                  */
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Application_documents', function (Blueprint $table)
                  {
                  $table->string('scholarship_id', 100);
                  $table->string('student_id', 100);
                  $table->string('docs_url', 100);
                  $table->primary(['scholarship_id', 'student_id']);
                  $table->foreign('scholarship_id')->references('scholarship_id')->on('Medals_Awards_Scholarship')->onDelete('cascade')->onUpdate('cascade');
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Application_Student_Guide', function (Blueprint $table)
                  {
                  $table->string('student_id', 100);
                  $table->string('reason', 100);
                  $table->primary('student_id');
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Applied_For_Company', function (Blueprint $table)
                  {
                  $table->string('student_id', 100);
                  $table->string('company_id', 100);
                  $table->integer('status_of_placement');
                  $table->integer('test_result');
                  $table->primary(['student_id', 'company_id']);
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->foreign('company_id')->references('company_id')->on('Company')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Applied_For_TA', function (Blueprint $table)
                  {
                  $table->string('student_id', 100);
                  $table->string('course_id', 100);
                  $table->integer('preference_no');
                  $table->primary(['student_id', 'course_id']);
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->foreign('course_id')->references('course_id')->on('Course')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Assistant_Coordinator', function (Blueprint $table)
                  {
                  $table->string('stuguide_id', 100);
                  $table->string('assist_id', 100);
                  $table->primary('stuguide_id');
                  $table->foreign('stuguide_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->foreign('assist_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Awards_Applications', function (Blueprint $table)
                  {
                  $table->string('scholarship_id', 100);
                  $table->string('student_id', 100);
                  $table->timestamp('submitted_timestamp')->nullable();
                  $table->double('tot_an_inc_p', 8, 2);
                  $table->string('brother_name', 50);
                  $table->string('sister_name', 50);
                  $table->string('p_occupation', 100);
                  $table->string('b_occupation', 100);
                  $table->string('s_occupation', 100);
                  $table->string('service_type', 100);
                  $table->string('firm_name', 100);
                  $table->string('firm_address', 200);
                  $table->string('nature_of_business', 100);
                  $table->string('registration_no', 100);
                  $table->string('tax_reg_no', 100);
                  $table->integer('status');
                  $table->primary(['student_id', 'scholarship_id']);
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->foreign('scholarship_id')->references('scholarship_id')->on('Medals_Awards_Scholarship')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Awards_Achievement', function (Blueprint $table)
                  {
                  $table->increments('sa_id');
                  $table->string('student_id', 100);
                  $table->string('name', 100);
                  $table->string('awardiing_authority', 100);
                  $table->string('p_time_period', 100);
                  $table->bigInteger('amount');
                  $table->string('doc-url', 100);
                  $table->timestamps();
                  });
            Schema::create('Bonafide', function (Blueprint $table)
                  {
                  $table->increments('receipt_no');
                  $table->string('student_id', 100);
                  $table->string('purpose', 500);
                  $table->integer('status');
                  $table->unique(array(
                        'student_id',
                        'receipt_no'
                  ));
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Achievements', function (Blueprint $table)
                  {
                  $table->increments('id');
                  $table->string('student_id', 100);
                  $table->string('ach_type', 100);
                  $table->string('description', 500);
                  $table->string('docs_url', 100);
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Bus_Booking', function (Blueprint $table)
                  {
                  $table->increments('booking_id');
                  $table->integer('bus_id');
                  $table->string('user_id', 100);
                  $table->string('user_type', 100);
                  $table->timestamp('timestamp')->nullable();
                  $table->unique(array(
                        'bus_id',
                        'user_id',
                        'user_type',
                        'timestamp'
                  ));
                  $table->foreign('bus_id')->references('bus_id')->on('Bus')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Bus_Feedback', function (Blueprint $table)
                  {
                  $table->increments('feedback_id');
                  $table->string('description', 1000);
                  $table->timestamps();
                  });
            Schema::create('Bus_Schedule', function (Blueprint $table)
                  {
                  $table->time('timestamp')->nullable();
                  $table->string('source', 300);
                  $table->string('destination', 300);
                  $table->integer('bus_id');
                  $table->primary(['bus_id', 'timestamp']);
                  $table->foreign('bus_id')->references('bus_id')->on('Bus')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Candidate_Witness', function (Blueprint $table)
                  {
                  $table->string('student_id', 100);
                  $table->string('witness_student_id', 100);
                  $table->primary(['student_id', 'witness_student_id']);
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->foreign('witness_student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Classroom_Slots', function (Blueprint $table)
                  {
                  $table->string('room_id', 100);
                  $table->string('course_id', 100);
                  $table->string('day', 20);
                  $table->time('from_time');
                  $table->time('to_time');
                  $table->primary(['room_id', 'course_id', 'day']);
                  $table->timestamps();
                  $table->foreign('course_id')->references('course_id')->on('Course')->onDelete('cascade')->onUpdate('cascade');
                  $table->foreign('room_id')->references('room_id')->on('Class_Rooms')->onDelete('cascade')->onUpdate('cascade');
                  });
            // ROHIT RAJWANI
            Schema::create('Gymkhana_Club_Cocoordinator', function (Blueprint $table)
                  {
                  $table->string('club_name', 100);
                  $table->string('coco_student_id', 100);
                  $table->timestamps();
                  $table->primary(['club_name', 'coco_student_id']);
                  $table->foreign('coco_student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  });
            Schema::create('Gymkhana_Club_Coordinator', function (Blueprint $table)
                  {
                  $table->string('club_name', 100);
                  $table->string('coordinator_student_id', 100);
                  $table->integer('budget');
                  $table->string('website', 100);
                  $table->string('type', 11);
                  $table->timestamps();
                  $table->primary('club_name');
                  $table->foreign('coordinator_student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  });
            Schema::create('Club_Members', function (Blueprint $table)
                  {
                  $table->string('club_name', 100);
                  $table->string('student_id', 100);
                  $table->primary(['club_name', 'student_id']);
                  $table->foreign('club_name')->references('club_name')->on('Gymkhana_Club_Coordinator')->onDelete('cascade')->onUpdate('cascade');
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Course_Taken_By', function (Blueprint $table)
                  {
                  $table->string('course_id', 100);
                  $table->string('faculty_id', 100);
                  $table->timestamps();
                  $table->primary(['course_id', 'faculty_id']);
                  $table->foreign('faculty_id')->references('faculty_id')->on('Faculty')->onDelete('cascade')->onUpdate('cascade');
                  $table->foreign('course_id')->references('course_id')->on('Course')->onDelete('cascade')->onUpdate('cascade');
                  });
            Schema::create('Doctor', function (Blueprint $table)
                  {
                  $table->string('staff_id', 100);
                  $table->string('specialization', 500);
                  $table->timestamps();
                  $table->primary('staff_id');
                  $table->foreign('staff_id')->references('staff_id')->on('Staff')->onDelete('cascade')->onUpdate('cascade');
                  });
            Schema::create('Evaluation_Of_Phd', function (Blueprint $table)
                  {
                  $table->string('student_id', 100);
                  $table->string('phd_roll_no', 20);
                  $table->string('course_id', 50);
                  $table->string('grade', 5);
                  $table->timestamps();
                  $table->primary(['student_id', 'phd_roll_no', 'course_id']);
                  $table->foreign('course_id')->references('course_id')->on('Course')->onDelete('cascade')->onUpdate('cascade');
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->foreign('phd_roll_no')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  });
            Schema::create('Faculty_Phone_No', function (Blueprint $table)
                  {
                  $table->string('faculty_id', 100);
                  $table->integer('faculty_phone_no');
                  $table->timestamps();
                  $table->primary(['faculty_id', 'faculty_phone_no']);
                  $table->foreign('faculty_id')->references('faculty_id')->on('Faculty')->onDelete('cascade')->onUpdate('cascade');
                  });
            /*
            Schema::create('Faculty_Takes_Course',function (Blueprint $table)
            {
            $table->string('course_id', 100);
            $table->string('faculty_id', 100);
            $table->timestamps();
            $table->primary(['course_id', 'faculty_id']);
            $table->foreign('course_id')->references('course_id')->on('Course')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('faculty_id')->references('faculty_id')->on('Faculty')->onDelete('cascade')->onUpdate('cascade');
            });*/
            Schema::create('Hostel_Complaint', function (Blueprint $table)
                  {
                  $table->increments('complaint_id');
                  $table->string('category', 50);
                  $table->string('sub_category', 50);
                  $table->string('student_id', 100);
                  $table->string('room_no', 20);
                  $table->string('hall_no', 10);
                  $table->string('description', 500);
                  $table->string('status', 10)->default('Unsolved');
                  $table->timestamps();
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  });
            Schema::create('Mess_Committee', function (Blueprint $table)
                  {
                  $table->string('student_id', 100);
                  $table->string('mess_id', 20);
                  $table->primary('student_id');
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Mess_Feedback', function (Blueprint $table)
                  {
                  $table->string('student_id', 100);
                  $table->increments('feedback_id');
                  $table->string('description', 200);
                  $table->timestamp('timestamp')->nullable();
                  $table->string('cleanliness', 10);
                  $table->string('service', 10);
                  $table->string('behaviour', 10);
                  $table->string('food_quality', 10);
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Mess_Order', function (Blueprint $table)
                  {
                  $table->increments('order_id', 100);
                  $table->string('student_id', 100);
                  $table->string('lunch', 10);
                  $table->string('breakfast', 10);
                  $table->string('dinner', 10);
                  $table->date('begin_date');
                  $table->date('end_date');
                  $table->foreign('student_id')->references('student_id')->on('Mess_Committee')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Mess_Leave_Application', function (Blueprint $table)
                  {
                  $table->integer('application_no');
                  $table->string('student_id', 100);
                  $table->date('from_date')->nullable();
                  $table->date('till_date')->nullable();
                  $table->string('reason', 500);
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            // GAURAV
            Schema::create('Mess_Registration', function (Blueprint $table)
                  {
                  $table->string('student_id', 100);
                  $table->string('mess_id', 20);
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Notification', function (Blueprint $table)
                  {
                  $table->string('user_id', 100)->default('');
                  $table->string('user_type', 100)->default('');
                  $table->string('notification', 1000);
                  $table->timestamps();
                  });
            /*Schema::create('Polling', function(Blueprint $table) {
            $table->string('event_id', 100);
            $table->string('student_id', 100);
            $table->string('opinion', 100);
            $table->primary(['event_id','student_id']);
            $table->foreign('student_id')->references('student_id')->on('Student');
            $table->timestamps();
            });*/
            Schema::create('Student_Guide_Assign', function (Blueprint $table)
                  {
                  $table->string('student_id', 100);
                  $table->string('stuguide_id', 100);
                  $table->primary(['student_id', 'stuguide_id']);
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->foreign('stuguide_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Problem', function (Blueprint $table)
                  {
                  $table->string('prob_id', 100)->unique();
                  $table->string('student_id', 100);
                  $table->string('stuguide_id', 100);
                  $table->integer('frwd_prob');
                  $table->string('description', 500);
                  $table->string('solution', 500);
                  $table->primary('prob_id');
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->foreign('stuguide_id')->references('stuguide_id')->on('Student_Guide_Assign')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Public_Post', function (Blueprint $table)
                  {
                  $table->increments('id');
                  $table->string('student_id', 100);
                  $table->string('description', 500);
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Register_Course', function (Blueprint $table)
                  {
                  $table->string('course_id', 100);
                  $table->string('student_id', 100);
                  $table->primary(['course_id', 'student_id']);
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Review', function (Blueprint $table)
                  {
                  $table->integer('event_id')->unsigned();
                  $table->string('student_id', 100);
                  $table->string('description', 500);
                  $table->primary(['event_id', 'student_id']);
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->foreign('event_id')->references('event_id')->on('Non_Academic_Events')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            // SAURABH
            Schema::create('Senate_Member', function (Blueprint $table)
                  {
                  $table->string('student_id', 100);
                  $table->string('responsibility', 100);
                  $table->primary('student_id');
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Staff_Phone_No', function (Blueprint $table)
                  {
                  $table->string('staff_id', 100);
                  $table->bigInteger('staff_phone_no');
                  $table->primary(['staff_id', 'staff_phone_no']);
                  $table->foreign('staff_id')->references('staff_id')->on('Staff')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Student_Attendance', function (Blueprint $table)
                  {
                  $table->string('student_id', 100);
                  $table->string('course_id', 100);
                  $table->date('date')->nullable();
                  $table->integer('status');
                  $table->primary(['student_id', 'course_id', 'date']);
                  $table->foreign('course_id')->references('course_id')->on('Course')->onDelete('cascade')->onUpdate('cascade');
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Student_Committee_Members', function (Blueprint $table)
                  {
                  $table->string('committee_name', 100);
                  $table->string('student_id', 100);
                  $table->primary(['committee_name', 'student_id']);
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Student_Counselling', function (Blueprint $table)
                  {
                  $table->string('student_id', 100);
                  $table->string('responsibility', 100);
                  $table->primary('student_id');
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Student_Leave_Application', function (Blueprint $table)
                  {
                  $table->string('leave_no', 100);
                  $table->string('student_id', 100);
                  $table->date('from_date')->nullable();
                  $table->date('till_date')->nullable();
                  $table->string('subject', 500);
                  $table->integer('status');
                  $table->primary(['leave_no', 'student_id']);
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Study_Material', function (Blueprint $table)
                  {
                  $table->string('student_id', 100);
                  $table->string('course_id', 100);
                  $table->string('description', 500);
                  $table->string('url', 500);
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->foreign('course_id')->references('course_id')->on('Course')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Suggestions_By_Students', function (Blueprint $table)
                  {
                  $table->increments('id');
                  $table->string('faculty_id', 100);
                  $table->string('course_id', 100);
                  $table->string('suggestion', 500);
                  $table->foreign('course_id')->references('course_id')->on('Course')->onDelete('cascade')->onUpdate('cascade');
                  // $table->primary(['faculty_id', 'course_id']);
                  $table->foreign('faculty_id')->references('faculty_id')->on('Faculty')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Ta', function (Blueprint $table)
                  {
                  $table->string('student_id', 100);
                  $table->string('course_id', 100);
                  $table->string('batch', 15);
                  $table->integer('default_stipend');
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->foreign('course_id')->references('course_id')->on('Course')->onDelete('cascade')->onUpdate('cascade');
                  $table->primary(['student_id']);
                  $table->timestamps();
                  });
            Schema::create('Ta_Attendance', function (Blueprint $table)
                  {
                  $table->string('student_id', 100);
                  $table->date('date')->nullable();
                  $table->integer('attendance_status');
                  $table->primary(['student_id', 'date']);
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Ta_Claim', function (Blueprint $table)
                  {
                  $table->string('student_id', 100);
                  $table->integer('month');
                  $table->bigInteger('bank_acc_no');
                  $table->string('applicability',20);
                  $table->integer('status');
                  $table->string('ta_sup_comment', 100);
                  $table->integer('stipend');
                  $table->primary(['student_id','month']);
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Ta_Post_Openings', function (Blueprint $table)
                  {
                  $table->string('course_id', 100);
                  $table->integer('no_of_openings');
                  $table->integer('no_of_batches');
                  $table->primary('course_id');
                  $table->foreign('course_id')->references('course_id')->on('Course')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Ta_feedback', function (Blueprint $table)
                  {
                  $table->string('student_id', 100);
                  $table->string('description',500);
                  $table->integer('rating');
                  $table->primary('student_id');
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Teaching_Credit', function (Blueprint $table)
                  {
                  $table->string('phd_roll_no', 100);
                  $table->string('course_id', 100);
                  $table->integer('classes_taken');
                  $table->primary(['phd_roll_no', 'course_id']);
                  $table->foreign('course_id')->references('course_id')->on('Course')->onDelete('cascade')->onUpdate('cascade');
                  $table->foreign('phd_roll_no')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Pbi', function (Blueprint $table)
                  {
                  $table->string('pbi_id', 100);
                  $table->string('type', 50);
                  $table->string('fa_id', 100);
                  $table->string('student_id', 100);
                  $table->string('topic_name', 500);
                  $table->string('reference', 600);
                  $table->primary('pbi_id');
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->foreign('fa_id')->references('faculty_id')->on('Faculty')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Pbi_Reports', function (Blueprint $table)
                  {
                  $table->string('report_id', 100);
                  $table->string('student_id', 100);
                  $table->string('type', 50);
                  $table->string('pbi_id', 100);
                  $table->primary('report_id');
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->foreign('pbi_id')->references('pbi_id')->on('Pbi')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Pbi_Applied_For', function (Blueprint $table)
                  {
                  $table->string('student_id', 100);
                  $table->string('pbi_id', 100);
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->foreign('pbi_id')->references('pbi_id')->on('Pbi')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Assignment', function (Blueprint $table)
                  {
                  $table->increments('assign_id');
                  $table->string('course_id', 100);
                  $table->timestamp('upload_time')->nullable();
                  $table->timestamp('deadline')->nullable();
                  $table->string('url_assign', 100);
                  $table->foreign('course_id')->references('course_id')->on('Course')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Solves_Assignment', function (Blueprint $table)
                  {
                  $table->integer('assign_id')->unsigned();
                  $table->string('student_id', 100);
                  $table->string('course_id', 100);
                  $table->timestamp('deadline')->nullable();
                  $table->string('url_sol', 100);
                  $table->primary(['assign_id', 'student_id', 'course_id'])->onDelete('cascade')->onUpdate('cascade');
                  $table->foreign('assign_id')->references('assign_id')->on('Assignment')->onDelete('cascade')->onUpdate('cascade');
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->foreign('course_id')->references('course_id')->on('Course')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Mess_Bill', function (Blueprint $table)
                  {
                  $table->string('student_id', 100);
                  $table->string('month', 15);
                  $table->integer('amount');
                  $table->primary(['month', 'student_id']);
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Application_Assistant_Coordinator', function (Blueprint $table)
                  {
                  $table->string('student_id', 100);
                  $table->string('reason', 100);
                  $table->primary('student_id');
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Rules_and_Reg', function (Blueprint $table)
                  {
                  $table->increments('id');
                  $table->string('rule', 100);
                  $table->timestamps();
                  });
            
            Schema::create('Spi', function (Blueprint $table)
                  {
                  $table->string('student_id', 100);
                  $table->integer('semester');
                  $table->double('spi');
                  $table->timestamps();
                  });
            Schema::create('Cpi', function (Blueprint $table)
                  {
                  $table->string('student_id', 100);
                  $table->integer('semester');
                  $table->double('cpi');
                  $table->timestamps();
                  });
            Schema::create('Procurement_form', function (Blueprint $table)
                  {
                  $table->string('f_id', 100);
                  $table->string('name', 50);
                  $table->string('desgn', 100);
                  $table->string('nature', 50);
                  $table->integer('consumable');
                  $table->integer('availability');
                  $table->string('new', 50);
                  $table->string('replace_details', 100);
                  $table->string('budgetary_head', 100);
                  $table->string('inspect_authority', 100);
                  $table->integer('delivery_period');
                  $table->string('supply_sources', 100);
                  $table->string('specific_t&c', 200);
                  $table->string('accept', 100);
                  $table->string('approve', 100);
                  $table->primary('f_id');
                  $table->timestamps();
                  });
            Schema::create('Procurement_item', function (Blueprint $table)
                  {
                  $table->string('f_id', 100);
                  $table->string('name', 50);
                  $table->bigInteger('qty');
                  $table->bigInteger('p_stock');
                  $table->integer('estimated_cost');
                  $table->string('purpose', 200);
                  $table->string('tech_spec', 100);
                  $table->primary(['f_id', 'name']);
                  $table->timestamps();
                  });
            Schema::create('Tender', function (Blueprint $table)
                  {
                  $table->string('t_id', 100);
                  $table->string('f_id', 100);
                  $table->date('opening_date');
                  $table->date('closing_date');
                  $table->bigInteger('estimated_total_cost');
                  $table->string('type', 100);
                  $table->string('advertisement', 100);
                  $table->string('active', 100);
                  $table->primary('t_id');
                  $table->timestamps();
                  });
            Schema::create('Registration', function (Blueprint $table)
                  {
                  $table->string('r_id', 100);
                  $table->string('firm_name', 100);
                  $table->string('firm_type', 100);
                  $table->integer('TAN_No');
                  $table->bigInteger('contact_no');
                  $table->string('email', 100);
                  $table->string('address', 500);
                  $table->integer('year_of_establish');
                  $table->string('supplier', 100);
                  $table->primary('r_id');
                  $table->timestamps();
                  });
            Schema::create('Supplier', function (Blueprint $table)
                  {
                  $table->string('r_id', 100);
                  $table->string('username', 100);
                  $table->string('password', 10);
                  $table->primary('username');
                  $table->timestamps();
                  });
            Schema::create('Bid', function (Blueprint $table)
                  {
                  $table->string('b_id', 100);
                  $table->string('t_id', 100);
                  $table->string('r_id', 100);
                  $table->bigInteger('cost');
                  $table->date('date');
                  $table->string('eligible', 100);
                  $table->string('item', 100);
                  $table->string('t_spec', 100);
                  $table->primary('b_id');
                  $table->timestamps();
                  });
            Schema::create('Finalized_bid', function (Blueprint $table)
                  {
                  $table->string('b_id', 100);
                  $table->string('t_id', 100);
                  $table->primary(['b_id', 't_id']);
                  $table->timestamps();
                  });
            Schema::create('Order', function (Blueprint $table)
                  {
                  $table->string('o_id', 100);
                  $table->string('b_id', 100);
                  $table->date('date');
                  $table->date('closing_date');
                  $table->primary('o_id');
                  $table->timestamps();
                  });
            Schema::create('T&C', function (Blueprint $table)
                  {
                  $table->integer('s_no');
                  $table->string('point', 200);
                  $table->primary('s_no');
                  $table->timestamps();
                  });
            Schema::create('Indenter', function (Blueprint $table)
                  {
                  $table->string('i_id', 100);
                  $table->string('desgn', 100);
                  $table->string('department', 100);
                  $table->bigInteger('phone_no');
                  $table->string('email', 100);
                  $table->primary('i_id');
                  $table->timestamps();
                  });
            Schema::create('Purchase_dept', function (Blueprint $table)
                  {
                  $table->string('e_id', 100);
                  $table->string('desgn', 100);
                  $table->string('dept', 100);
                  $table->primary('e_id');
                  $table->timestamps();
                  });
            Schema::create('Ce_Committee', function (Blueprint $table)
                  {
                  $table->string('student_id', 100);
                  $table->string('title', 100);
                  $table->string('cm1', 100);
                  $table->string('cm2', 100);
                  $table->string('cm3', 100);
                  $table->string('cm4', 100);
                  $table->string('cm5', 100);
                  $table->integer('approved_by');
                  $table->primary('student_id');
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->foreign('cm1')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->foreign('cm2')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->foreign('cm3')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->foreign('cm4')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->foreign('cm5')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Seminar_Committee', function (Blueprint $table)
                  {
                  $table->string('student_id', 100);
                  $table->string('title', 100);
                  $table->string('pcm1', 100);
                  $table->string('pcm2', 100);
                  $table->string('pcm3', 100);
                  $table->string('pcm4', 100);
                  $table->string('pcm5', 100);
                  $table->integer('approved');
                  $table->primary('student_id');
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->foreign('pcm1')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->foreign('pcm2')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->foreign('pcm3')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->foreign('pcm4')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->foreign('pcm5')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('Supervisor', function (Blueprint $table)
                  {
                  $table->string('student_id', 100);
                  $table->string('faculty_id', 100);
                  $table->primary('student_id');
                  $table->integer('status');
                  $table->timestamps();
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->foreign('faculty_id')->references('faculty_id')->on('Faculty')->onDelete('cascade')->onUpdate('cascade');
                  });
            Schema::create('Seminar_Report', function (Blueprint $table)
                  {
                  $table->string('student_id', 100);
                  $table->string('theme', 100);
                  $table->string('contribution', 100);
                  $table->integer('approved');
                  $table->timestamps();
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  });
            Schema::create('Branch_Change', function (Blueprint $table)
                  {
                  $table->string('student_id', 100);
                  $table->string('current_branch', 10);
                  $table->string('expected_branch', 10);
                  $table->double('current_cpi');
                  $table->integer('category');
                  $table->primary('student_id');
                  $table->timestamps();
                  $table->integer('status');
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  });
            Schema::create('questions', function (Blueprint $table)
                  {
                  $table->increments('id');
                  $table->integer('quiz_id');
                  $table->string('body');
                  $table->timestamps();
                  });
            Schema::create('options', function (Blueprint $table)
                  {
                  $table->increments('id');
                  $table->integer('question_id');
                  $table->string('body');
                  $table->integer('correctness');
                  $table->timestamps();
                  });
            Schema::create('response', function (Blueprint $table)
                  {
                  $table->increments('id');
                  $table->string('student_id');
                  $table->integer('question_id');
                  $table->timestamps();
                  });
            Schema::create('response_option', function (Blueprint $table)
                  {
                  $table->increments('id');
                  $table->integer('response_id');
                  $table->integer('option_id');
                  $table->timestamps();
                  });
	    Schema::create('quiz', function (Blueprint $table) {
	    $table->increments('id');
	    $table->string('course_id');
	    $table->string('quiz_name');
	    $table->date('date');
	    $table->time('start_time');
	    $table->time('end_time');
	    $table->timestamps();
		});
	    
	    Schema::create('Score', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_id');
            $table->integer('quiz_id');
            $table->integer('marks');
            $table->timestamps();
        	});
            Schema::create('Assessment', function (Blueprint $table)
                  {
                  $table->integer('assessment_id');
                  $table->string('student_id', 100);
                  $table->string('student_id1', 100)->default(null)->nullable();
                  $table->float('marks1', 8, 2)->default(null)->nullable();
                  $table->string('student_id2', 100)->default(null)->nullable();
                  $table->float('marks2', 8, 2)->default(null)->nullable();
                  $table->string('student_id3', 100)->default(null)->nullable();
                  $table->float('marks3', 8, 2)->default(null)->nullable();
                  $table->float('average', 8, 2)->default(null)->nullable();
                  $table->primary(['assessment_id', 'student_id']);
                  $table->foreign('student_id')->references('student_id')->on('Student');
                  $table->foreign('student_id1')->references('student_id')->on('Student');
                  $table->foreign('student_id2')->references('student_id')->on('Student');
                  $table->foreign('student_id3')->references('student_id')->on('Student');
                  $table->timestamps();
                  });
            Schema::create('Document', function (Blueprint $table)
                  {
                  $table->increments('doc_id');
                  $table->string('doc_url', 20);
                  $table->timestamp('upload_time')->nullable();
                  $table->string('course_id', 50);
                  $table->foreign('course_id')->references('course_id')->on('Course');
                  $table->timestamps();
                  });
            Schema::create('Qualification_Details', function (Blueprint $table)
                  {
                  $table->increments('id');
                  $table->string('e_id', 100);
                  $table->string('degree', 20);
                  $table->string('university', 70);
                  $table->integer('degree_year');
                  $table->integer('cgpa');
                  $table->timestamps();
                  });
            Schema::create('Experience_Details', function (Blueprint $table)
                  {
                  $table->increments('id');
                  $table->string('e_id', 100);
                  $table->string('expr', 1000);
                  $table->timestamps();
                  });
            Schema::create('Dependents_Details', function (Blueprint $table)
                  {
                  $table->increments('id');
                  $table->string('e_id', 100);
                  $table->string('d_name', 20);
                  $table->string('d_dob', 10);
                  $table->integer('d_age');
                  $table->string('d_relation', 20);
                  $table->string('d_marital', 10);
                  $table->string('d_pwd', 10);
                  $table->date('end_date');
                  $table->timestamps();
                  });
            Schema::create('Employee_Achievements', function (Blueprint $table)
                  {
                  $table->increments('id');
                  $table->string('e_id', 100);
                  $table->string('achievement', 250);
                  $table->string('a_details', 500);
                  $table->string('date', 10);
                  $table->timestamps();
                  });
            Schema::create('Research_projects', function (Blueprint $table)
                  {
                  $table->increments('id');
                  $table->string('e_id', 100);
                  $table->integer('p_id');
                  $table->string('p_title', 50);
                  $table->string('f_agency', 30);
                  $table->string('p_details', 100);
                  $table->string('status', 20);
                  $table->timestamps();
                  });
            Schema::create('Research_Journal', function (Blueprint $table)
                  {
                  $table->increments('id');
                  $table->string('e_id', 100);
                  $table->string('author', 20);
                  $table->string('title', 50);
                  $table->string('journal_name', 50);
                  $table->string('j_publisher', 50);
                  $table->date('pub_date');
                  $table->timestamps();
                  });
            Schema::create('Cons_Project', function (Blueprint $table)
                  {
                  $table->increments('id');
                  $table->string('e_id', 100);
                  $table->string('consultant', 30);
                  $table->string('c_title', 50);
                  $table->string('client', 30);
                  $table->integer('fin_outlay');
                  $table->string('duration', 25);
                  $table->timestamps();
                  });
            Schema::create('Patents', function (Blueprint $table)
                  {
                  $table->increments('id');
                  $table->string('e_id', 100);
                  $table->integer('p_no');
                  $table->string('pt_title', 50);
                  $table->string('earnings', 10);
                  $table->string('pt_status', 10);
                  $table->string('pt_year', 4);
                  $table->timestamps();
                  });
            Schema::create('Publications', function (Blueprint $table)
                  {
                  $table->increments('id');
                  $table->string('e_id', 100);
                  $table->string('pub_title', 50);
                  $table->string('pub_publisher', 50);
                  $table->string('pub_copublisher', 50);
                  $table->string('pub_year', 10);
                  $table->string('pub_file_path', 50);
                  $table->timestamps();
                  });
            Schema::create('Thesis', function (Blueprint $table)
                  {
                  $table->increments('id');
                  $table->string('e_id', 100);
                  $table->string('t_title', 50);
                  $table->string('stu_names', 30);
                  $table->string('t_supervisors', 30);
                  $table->string('t_year', 10);
                  $table->timestamps();
                  });
            Schema::create('Conferences', function (Blueprint $table)
                  {
                  $table->increments('id');
                  $table->string('e_id', 100);
                  $table->string('c_author', 30);
                  $table->string('c_title', 40);
                  $table->string('c_details', 50);
                  $table->string('c_place', 30);
                  $table->integer('t_year');
                  $table->timestamps();
                  });
            Schema::create('Lectures', function (Blueprint $table)
                  {
                  $table->increments('id');
                  $table->string('e_id', 100);
                  $table->string('i_title', 40);
                  $table->string('i_place', 30);
                  $table->string('i_year', 6);
                  $table->timestamps();
                  });
            Schema::create('Keynote', function (Blueprint $table)
                  {
                  $table->increments('id');
                  $table->string('e_id', 100);
                  $table->string('k_title', 40);
                  $table->string('k_details', 50);
                  $table->string('k_place', 30);
                  $table->string('k_year', 6);
                  $table->timestamps();
                  });
            Schema::create('Indian_Visits', function (Blueprint $table)
                  {
                  $table->increments('id');
                  $table->string('e_id', 100);
                  $table->string('iv_place', 30);
                  $table->string('iv_purpose', 50);
                  $table->string('iv_date', 10);
                  $table->timestamps();
                  });
            Schema::create('Foreign_Visits', function (Blueprint $table)
                  {
                  $table->increments('id');
                  $table->string('e_id', 100);
                  $table->string('fv_country', 15);
                  $table->string('fv_place', 30);
                  $table->string('fv_purpose', 50);
                  $table->string('fv_date', 10);
                  $table->timestamps();
                  });
            Schema::create('St_Achievement', function (Blueprint $table)
                  {
                  $table->string('student_id');
                  $table->string('org', 100);
                  $table->string('event_name', 10);
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('St_Cert', function (Blueprint $table)
                  {
                  $table->string('student_id');
                  $table->string('cert', 100);
                  $table->string('auth', 500);
                  $table->string('licen', 100);
                  $table->string('url', 1000);
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('St_Courses', function (Blueprint $table)
                  {
                  $table->string('student_id');
                  $table->string('course', 10);
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('St_Education', function (Blueprint $table)
                  {
                  $table->string('student_id');
                  $table->string('qualification', 100);
                  $table->string('institute', 500);
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('St_Interest', function (Blueprint $table)
                  {
                  $table->string('student_id');
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('St_Internship', function (Blueprint $table)
                  {
                  $table->string('student_id');
                  $table->string('profile', 500);
                  $table->string('org', 100);
                  $table->string('location', 10);
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('St_Objective', function (Blueprint $table)
                  {
                  $table->string('student_id');
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('St_Patent', function (Blueprint $table)
                  {
                  $table->string('student_id');
                  $table->string('patent_office', 5);
                  $table->integer('application_no');
                  $table->string('title', 100);
                  $table->string('inventors', 100);
                  $table->string('pat_url', 500);
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('St_Pos_Of_Resp', function (Blueprint $table)
                  {
                  $table->string('student_id');
                  $table->string('org', 100);
                  $table->string('role', 100);
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('St_Projects', function (Blueprint $table)
                  {
                  $table->string('student_id');
                  $table->string('name', 100);
                  $table->string('url', 1000);
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('St_Publications', function (Blueprint $table)
                  {
                  $table->string('student_id');
                  $table->string('title', 100);
                  $table->string('public', 100);
                  $table->string('url', 500);
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('St_Skills', function (Blueprint $table)
                  {
                  $table->string('student_id');
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
            Schema::create('St_Training', function (Blueprint $table)
                  {
                  $table->string('student_id');
                  $table->string('training_name', 100);
                  $table->string('org', 100);
                  $table->string('location', 10);
                  $table->foreign('student_id')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
                  $table->timestamps();
                  });
              Schema::create('Request', function (Blueprint $table)
                  {
                  $table->string('req_id', 100);
                  $table->string('user_id', 100);
                  $table->string('req_to', 100);
                  $table->string('item_id',15);
                  $table->integer('quantity');
                  $table->string('status',100);
                  $table->primary('req_id');
                  $table->timestamps();
                  });
              Schema::create('leave_granting_officer', function (Blueprint $table)
			{
			$table->string('user_id');
			$table->primary('user_id');
			$table->string('user_type', 100);
			$table->string('lgo_id', 100);
			$table->timestamps();
			});
            }
      /**
       * Reverse the
       migrations.
       *
       * @return void
       */
      public function down()

            {
            Schema::drop('Academic_Events');
            Schema::drop('Academic_Result');
            Schema::drop('Achievements');
            Schema::drop('Activity_Description');
            Schema::drop('Administrators');
            Schema::drop('All_Student');
            Schema::drop('Answer');
            Schema::drop('Application_Assistant_Coordinator');
            Schema::drop('Application_Counselling');
            Schema::drop('Application_documents');
            Schema::drop('Application_Student_Guide');
            Schema::drop('Applied_For_Company');
            Schema::drop('Applied_For_TA');
            Schema::drop('Appointment_Doctor');
            Schema::drop('Assessment');
            Schema::drop('Assignment');
            Schema::drop('Assistant_Coordinator');
            Schema::drop('Awards_Achievement');
            Schema::drop('Awards_Applications');
            Schema::drop('Balance_leaves');
            Schema::drop('Bid');
            Schema::drop('Bonafide');
            Schema::drop('Booking');
            Schema::drop('Booking_Rooms');
            Schema::drop('Branch_Change');
            Schema::drop('Bus');
            Schema::drop('Bus_Booking');
            Schema::drop('Bus_Feedback');
            Schema::drop('Bus_Schedule');
            Schema::drop('Candidate_Witness');
            Schema::drop('CC_Complaint');
            Schema::drop('Ce_Committee');
            Schema::drop('Classroom_Slots');
            Schema::drop('Class_Rooms');
            Schema::drop('Club_Members');
            Schema::drop('Company');
            Schema::drop('Conferences');
            Schema::drop('Cons_Project');
            Schema::drop('Course');
            Schema::drop('Course_Taken_By');
            Schema::drop('Cpi');
            Schema::drop('Dependents_Details');
            Schema::drop('Doctor');
            Schema::drop('Document');
            Schema::drop('Employee_Achievements');
            Schema::drop('Employee_Approve_Reimb');
            Schema::drop('Employee_Leave');
            Schema::drop('Employee_request_reimb');
            Schema::drop('Evaluation_Of_Phd');
            Schema::drop('Experience_Details');
            Schema::drop('Faculty');
            Schema::drop('Faculty_Phone_No');
            Schema::drop('Faculty_Roles');
            Schema::drop('Finalized_bid');
            Schema::drop('Foreign_Visits');
            Schema::drop('Gymkhana_Club_Cocoordinator');
            Schema::drop('Gymkhana_Club_Coordinator');
            Schema::drop('Hostel_Complaint');
            Schema::drop('Indenter');
            Schema::drop('Indian_Visits');
            Schema::drop('Inventory');
            Schema::drop('Keynote');
            Schema::drop('Lectures');
            Schema::drop('Login');
            Schema::drop('Medals_Awards_Scholarship');
            Schema::drop('Menu');
            Schema::drop('Mess_Bill');
            Schema::drop('Mess_Committee');
            Schema::drop('Mess_Feedback');
            Schema::drop('Mess_Leave_Application');
            Schema::drop('Mess_Order');
            Schema::drop('Mess_Registration');
            Schema::drop('migrations');
            Schema::drop('Non_Academic_Events');
            Schema::drop('Notification');
            Schema::drop('options');
            Schema::drop('Order');
            Schema::drop('Patents');
            Schema::drop('Patient');
            Schema::drop('Pbi');
            Schema::drop('Pbi_Applied_For');
            Schema::drop('Pbi_Reports');
            Schema::drop('Problem');
            Schema::drop('Procurement_form');
            Schema::drop('Procurement_item');
            Schema::drop('Project_by_Gymkhana');
            Schema::drop('Publications');
            Schema::drop('Public_Post');
            Schema::drop('Purchase_dept');
            Schema::drop('Qualification_Details');
            Schema::drop('Question');
            Schema::drop('questions');
            Schema::drop('Question_Of_Semester_Feedback');
            Schema::drop('quiz');
            Schema::drop('Record_Hospital');
            Schema::drop('Register_Course');
            Schema::drop('Registration');
            Schema::drop('Request');
            Schema::drop('Research_Journal');
            Schema::drop('Research_projects');
            Schema::drop('response');
            Schema::drop('response_option');
            Schema::drop('Review');
            Schema::drop('Room_Booking_Request');
            Schema::drop('Rules_and_Reg');
            Schema::drop('Salary');
            Schema::drop('Scheduled_Activity');
            Schema::drop('Semester_Feedback');
            Schema::drop('Seminar_Committee');
            Schema::drop('Seminar_Report');
            Schema::drop('Senate_Meeting');
            Schema::drop('Senate_Member');
            Schema::drop('Solves_Assignment');
            Schema::drop('Spi');
            Schema::drop('Staff');
            Schema::drop('Staff_Phone_No');
            Schema::drop('Student');
            Schema::drop('Student_Attendance');
            Schema::drop('Student_Committee');
            Schema::drop('Student_Committee_Members');
            Schema::drop('Student_Counselling');
            Schema::drop('Student_Guide_Assign');
            Schema::drop('Student_Leave_Application');
            Schema::drop('Study_Material');
            Schema::drop('St_Achievement');
            Schema::drop('St_Cert');
            Schema::drop('St_Courses');
            Schema::drop('St_Education');
            Schema::drop('St_Interest');
            Schema::drop('St_Internship');
            Schema::drop('St_Objective');
            Schema::drop('St_Patent');
            Schema::drop('St_Pos_Of_Resp');
            Schema::drop('St_Projects');
            Schema::drop('St_Publications');
            Schema::drop('St_Skills');
            Schema::drop('St_Training');
            Schema::drop('Suggestions_By_Students');
            Schema::drop('Supervisor');
            Schema::drop('Supplier');
            Schema::drop('Supplier_Info');
            Schema::drop('T&C');
            Schema::drop('Ta');
            Schema::drop('Ta_Attendance');
            Schema::drop('Ta_Claim');
            Schema::drop('Ta_feedback');
            Schema::drop('Ta_Post_Openings');
            Schema::drop('Teaching_Credit');
            Schema::drop('Tender');
            Schema::drop('Thesis');
            Schema::drop('VH_Rooms');
            Schema::drop('Visitors_Complaint');
            Schema::drop('Ward');
            
            }
      }
