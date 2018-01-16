<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'ug_student',
            'display_name' => 'UG Student'
        ]);
        DB::table('roles')->insert([
            'name' => 'student_guide',
            'display_name' => 'Student Guide'
        ]);
        DB::table('roles')->insert([
            'name' => 'ass_coordinator',
            'display_name' => 'Assistant Coordinator'
        ]);
        DB::table('roles')->insert([
            'name' => 'couns_coordinator',
            'display_name' => 'Counselling Coordinator'
        ]);
        DB::table('roles')->insert([
            'name' => 'sport_convenor',
            'display_name' => 'Sport Convenor'
        ]);
        DB::table('roles')->insert([
            'name' => 'cult_convenor',
            'display_name' => 'Cultural Convenor'
        ]);
        DB::table('roles')->insert([
            'name' => 'tech_convenor',
            'display_name' => 'Technical Convenor'
        ]);
        DB::table('roles')->insert([
            'name' => 'sen_convenor',
            'display_name' => 'Senate Convenor'
        ]);
        DB::table('roles')->insert([
            'name' => 'club_co',
            'display_name' => 'Culb Coordinator'
        ]);
        DB::table('roles')->insert([
            'name' => 'cilb_coco',
            'display_name' => 'Club Co-Coordinator'
        ]);
        DB::table('roles')->insert([
            'name' => 'pg_student',
            'display_name' => 'PG Student'
        ]);
        DB::table('roles')->insert([
            'name' => 'faculty',
            'display_name' => 'Faculty'
        ]);
        DB::table('roles')->insert([
            'name' => 'couns_head',
            'display_name' => 'Counselling Head'
        ]);
        DB::table('roles')->insert([
            'name' => 'hod_cse',
            'display_name' => 'HOD'
        ]);
        DB::table('roles')->insert([
            'name' => 'hod_ece',
            'display_name' => 'HOD'
        ]);
        DB::table('roles')->insert([
            'name' => 'hod_mech',
            'display_name' => 'HOD'
        ]);
        DB::table('roles')->insert([
            'name' => 'hod_design',
            'display_name' => 'HOD'
        ]);
        DB::table('roles')->insert([
            'name' => 'spacs_conv',
            'display_name' => 'SPACS Convenor'
        ]);
        DB::table('roles')->insert([
            'name' => 'pbi_chairman',
            'display_name' => 'PBI Chairman'
        ]);
        DB::table('roles')->insert([
            'name' => 'vh_incharge',
            'display_name' => 'VH Incharge'
        ]);
        DB::table('roles')->insert([
            'name' => 'hostel_warden',
            'display_name' => 'Hostel Warden'
        ]);
        DB::table('roles')->insert([
            'name' => 'stock_keeper',
            'display_name' => 'Stock Keeper'
        ]);
        DB::table('roles')->insert([
            'name' => 'Acad_staff',
            'display_name' => 'Academic Staff'
        ]);
        DB::table('roles')->insert([
            'name' => 'caretaker',
            'display_name' => 'Caretaker'
        ]);
        DB::table('roles')->insert([
            'name' => 'doctor',
            'display_name' => 'Doctor'
        ]);
        DB::table('roles')->insert([
            'name' => 'compounder',
            'display_name' => 'Compounder'
        ]);
        DB::table('roles')->insert([
            'name' => 'tpo',
            'display_name' => 'TPO'
        ]);
        DB::table('roles')->insert([
            'name' => 'vh_caretaker',
            'display_name' => 'VH Caretaker'
        ]);
        DB::table('roles')->insert([
            'name' => 'cc_staff',
            'display_name' => 'CC Staff'
        ]);
        DB::table('roles')->insert([
            'name' => 'ta',
            'display_name' => 'TA'
        ]);
        DB::table('roles')->insert([
            'name' => 'elec_comm',
            'display_name' => 'Election Commisoner'
        ]);
        DB::table('roles')->insert([
            'name' => 'dean_s',
            'display_name' => 'Dean Student'
        ]);
        DB::table('roles')->insert([
            'name' => 'dean_acad',
            'display_name' => 'Dean Acadmics'
        ]);
        DB::table('roles')->insert([
            'name' => 'mess_admin',
            'display_name' => 'Mess Admin'
        ]);
        DB::table('roles')->insert([
            'name' => 'bus_admin',
            'display_name' => 'Bus Admin'
        ]);
        DB::table('roles')->insert([
            'name' => 'spacscom_dir_gm',
            'display_name' => 'Spacscom Dir GM'
        ]);
        DB::table('roles')->insert([
            'name' => 'spacscom_dir_sc',
            'display_name' => 'Spacscom Dir SC'
        ]);
        DB::table('roles')->insert([
            'name' => 'spacscom_dir_sg',
            'display_name' => 'Spacscom Dir SG'
        ]);
        DB::table('roles')->insert([
            'name' => 'spacscom_dm_gm',
            'display_name' => 'Spacscom DM GM'
        ]);
        DB::table('roles')->insert([
            'name' => 'spacscom_iiitdmj_prof',
            'display_name' => 'Spacscom IIITDMJ Prof'
        ]);
    }
}
