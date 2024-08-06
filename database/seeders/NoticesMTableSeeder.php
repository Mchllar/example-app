<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class NoticesMTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('notices')->insert([
            [
                'user_id' => '1000',
                'thesis_title' => 'In-host Mathematical Modeling of Genes Predictive of Resistance to 
                Human Immunodeficiency Virus Acquisition',
                'proposed_date' => '2025-01-01',//standard
                'created_at' => '2021-03-05',
                'updated_at' => '2021-03-05'
            ],
            [
                'user_id' => '1001',
                'thesis_title' => 'Leading During a Crisis: Leadership Styles, Fear of COVID-19 and Employee 
                Pyschological Capital as Antecedents of Organizational Resilience of Small And Medium Sized Enterprises in Kenya',
                'proposed_date' => '2025-01-01',
                'created_at' => '2022-08-30',
                'updated_at' => '2022-08-30'
            ],
            [
                'user_id' => '1002',
                'thesis_title' => 'Building a Resilient Sustainable Economy through Green Closed-Loop Supply 
                Chains Based Circular Economy: A Sub-Saharan African Manufacturing Context',
                'proposed_date' => '2025-01-01',
                'created_at' => '2021-09-22',
                'updated_at' => '2021-09-22'
            ],
            [
                'user_id' => '1003',
                'thesis_title' => 'The Influence of Social Media Use and Intrinsic Motivation on Job 
                Performance among Faculty in Kenyan Private Universities',
                'proposed_date' => '2025-01-01',
                'created_at' => '2022-07-02',
                'updated_at' => '2022-07-02'
            ],
            [
                'user_id' => '1004',
                'thesis_title' => 'An Empirical Examination of the Impact of Changes In Interest 
                Rate Regulation on Bank Performance and Lending Behaviour in Kenya',
                'proposed_date' => '2025-01-01',
                'created_at' => '2023-01-09',
                'updated_at' => '2023-01-09'
            ],
            [
                'user_id' => '1005',
                'thesis_title' => 'The Role of Organizational Capability on Organizational 
                Performance in the Financial Services Sector in Kenya: The Mediating Role of Effective Leadership',
                'proposed_date' => '2025-01-01',
                'created_at' => '2023-03-08',
                'updated_at' => '2023-03-08'
            ],
            [
                'user_id' => '1006',
                'thesis_title' => 'Examining the Influence of Public Financial Management 
                Practices on the Efficiency of County Health Systems in Kenya',
                'proposed_date' => '2025-01-01',
                'created_at' => '2023-05-06',
                'updated_at' => '2023-05-06'
            ],
            [
                'user_id' => '1007',
                'thesis_title' => 'An Investigation on Pythagorean Triple System',
                'proposed_date' => '2025-01-01',
                'created_at' => '2023-02-09',
                'updated_at' => '2023-02-09'
            ],
            [
                'user_id' => '1008',
                'thesis_title' => 'Spiritual Leadership and Employee Meaningful Work: The 
                Role of Employee Intrinsic Motivation, Supervisor’s Developmental Feedback, and Employees’ Perception of Supportive Organizational Culture',
                'proposed_date' => '2025-01-01',
                'created_at' => '2023-08-01',
                'updated_at' => '2023-08-01'
            ],
            [
                'user_id' => '1009',
                'thesis_title' => 'A Human-Centred Infrastructure Policy Design and 
                Implementation Framework for Mitigating Culture-Mediated Managerial Social Learning Complexity 
                Determinants of Herding Behaviour, Information Cascading, and Sovereign Risk Spillover Susceptibility: 
                A Case of Kenyan Infrastructure Projects',
                'proposed_date' => '2025-01-01',
                'created_at' => '2023-11-06',
                'updated_at' => '2023-11-06'
            ],
            [
                'user_id' => '1010',
                'thesis_title' => 'Information Sharing, Social Capital and Sustainable Supply 
                Chain Performance in the Agri-food Supply Chain: An Empirical Study of the Meat Supply Chain in Kenya',
                'proposed_date' => '2025-01-01',
                'created_at' => '2023-04-18',
                'updated_at' => '2023-04-18'
            ],
            [
                'user_id' => '1011',
                'thesis_title' => 'Examining the role of socio-behavioral constructs and 
                nudges in influencing childhood vaccination in the urban informal settlements of Nairobi, Kenya',
                'proposed_date' => '2025-01-01',
                'created_at' => '2023-09-04',
                'updated_at' => '2023-09-04'
            ],
            [
                'user_id' => '1012',
                'thesis_title' => 'A Neural Network Model for Determination of Safe Food 
                for Type 2 Diabetic Patient Based on Biomarkers and the Nutritional Values of Food',
                'proposed_date' => '2025-01-01',
                'created_at' => '2023-02-15',
                'updated_at' => '2023-02-15'
            ],
            [
                'user_id' => '1013',
                'thesis_title' => 'Health System Factors Affecting Cervical Cancer Services 
                Delivery at Primary, Secondary, and Tertiary Levels in Addis Ababa, Ethiopia',
                'proposed_date' => '2025-01-01',
                'created_at' => '2023-08-28',
                'updated_at' => '2023-08-28'
            ],
            [
                'user_id' => '1014',
                'thesis_title' => 'Predictive Modeling of COVID-19 Pandemic Progression in Kenya',
                'proposed_date' => '2025-01-01',
                'created_at' => '2022-09-01',
                'updated_at' => '2022-09-01'
            ],
            [
                'user_id' => '1015',
                'thesis_title' => 'Thesis not Submitted yet',
                'proposed_date' => '2025-01-01',
                'created_at' => '2022-09-12',
                'updated_at' => '2022-09-12'
            ],
            [
                'user_id' => '1016',
                'thesis_title' => 'Evaluating the link between Orphans and Vulnerable
                Children Programming and HIV prevention and treatment outcomes for adolescents Impacted by HIV and AIDS in Nimule Town, South Sudan',
                'proposed_date' => '2025-01-01',
                'created_at' => '2022-09-01',
                'updated_at' => '2022-09-01'
            ],
            [
                'user_id' => '1017',
                'thesis_title' => 'Thesis not Submitted yet',
                'proposed_date' => '2025-01-01',
                'created_at' => '2023-02-28',
                'updated_at' => '2023-02-28'
            ],
            [
                'user_id' => '1018',
                'thesis_title' => 'Thesis not Submitted yet',
                'proposed_date' => '2025-01-01',
                'created_at' => '2023-06-22',
                'updated_at' => '2023-06-22'
            ],
            [
                'user_id' => '1019',
                'thesis_title' => 'Thesis not Submitted yet',
                'proposed_date' => '2025-01-01',
                'created_at' => '2023-12-01',
                'updated_at' => '2023-12-01'
            ],
            [
                'user_id' => '1020',
                'thesis_title' => 'Thesis not Submitted yet',
                'proposed_date' => '2025-01-01',
                'created_at' => '2024-01-02',
                'updated_at' => '2024-01-02'
            ],
            [
                'user_id' => '1021',
                'thesis_title' => 'Thesis not Submitted yet',
                'proposed_date' => '2025-01-01',
                'created_at' => '2024-02-02',
                'updated_at' => '2024-02-02'
            ],
        ]);
    
    }
}
