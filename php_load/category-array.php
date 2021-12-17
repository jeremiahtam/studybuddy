<?php
//set arrays
$category_array = array('Certificate_Program', 'Degree_Program', 'Vocational_Program', 'Graduate_Admission_Tests');

$certificate_array =
	array(
		array(
			'Arts_and_Design',
			'Animation', 'Design_Animation', 'Film_and_Video', 'Photography'
		),
		array(
			'Business',
			'Assistant', 'Finance_and_Accounting', 'E_-_Commerce', 'Management_and_Entrepreneural'
		),
		array(
			'Criminal_Justice',
			'Criminal_Justice', 'Forensic_Science', 'Security', 'Corrections'
		),
		array(
			'Culinary_and_Hospitality',
			'Hospitality_Management', 'Restaurant', 'Travel_Service'
		),
		array(
			'Education',
			'Early_Childhood_Education', 'Teacher_Assistant', 'Teacher_Education'
		),
		array(
			'Healthcare_and_Fitness',
			'Health_and_Physical_Education', 'Sport_Psychology', 'Kinesiology', 'Sports_and_Fitness_Administration'
		),
		array(
			'Legal_Certification',
			'Court_Reporting', 'Legal_Administrative_Assistant', 'Legal_Assistant', 'Legal_Studies'
		),
		array(
			'Skilled_Trade',
			'Mechanical', 'Construction', 'Precision_Production_Trade'
		),
		array(
			'Social_Services',
			'Social_Work', 'Youth_Service', 'Public_Policy_and_Public_Administration'
		)
	); //end certificate_array

$degree_array =
	array(
		array(
			'Agriculture',
			'Agricultural_Business', 'Agriculture_Production', 'Animal_Services', 'Food_Science_and_Technology'
		),
		array(
			'Architecture',
			'Architectural_History', 'Architectural_Technology', 'Environmental_Design', 'Interior_Architecture', 'Landscape_Architecture', 'Urban_and_Regional_Planning'
		),
		array(
			'Biological_and_Biomedical_Sciences',
			'Bioinformatics', 'Botany', 'Cellular_Biology_and_Anatomical_Science', 'Ecology_and_Evolutionary_Biology', 'General_Biology', 'Genetics', 'Microbiology_and_Immunology', 'Molecular_Biology,Biochemistry_and_Biophysics', 'Pharmacology_and_Toxicology', 'Physiology_and_Related_Science', 'Zoology'
		),
		array(
			'Business',
			'Accounting_and_Bookkeeping', 'Business_Economics', 'Business_Finance', 'Business_Management_and_Operations', 'Business_Marketing', 'Business_Support_and_Administrative_Services', 'Entrepreneurship_and_Small_Business_Development', 'Hospitality_Management', 'Human_Resource_Management', 'Information_System_Management', 'Sales_and_Merchandising', 'Specialized_Sales'
		),
		array(
			'Communications_and_Journalism',
			'American_Sign_Language_-_ASL', 'Communication_Studies', 'Communication_Technology', 'Comparative_Language_Studies_and_Services', 'Digital,_Radio,_and_Television_Communication', 'English_Composition', 'English_Language_and_Literature', 'Foreign_Language_and_Literature', 'Graphic_Communications', 'Journalism', 'Public_Relations_and_Advertising', 'Publishing'
		),
		array(
			'Computer_Sciences',
			'Computer_and_Information_Sciences,_General', 'Computer_Programming', 'Computer_Systems_Analysis', 'Data_Entry_Processing', 'Information_Technology_Management', 'Networking_and_Telecommunications', 'Software_and_Computer_Media_Applications'
		),
		array(
			'Culinary_Arts_and_Personal_Services',
			'Cosmetology_and_Related_Services', 'Culinary Arts_and_Culinary_Services', 'Funeral_Related_Services'
		),
		array(
			'Education',
			'Counseling_and_Guidance', 'Curriculum_and_Instruction', 'Educational_Administration_and_Supervision', 'ESL_Teaching', 'International_and_Comparative_Education', 'Library Science_and_Related_Professions', 'Philosophical_Foundations_of_Education', 'Special_Education', 'Special_Education', 'Teacher_Education_for_Specific_Subject_Areas', 'Teaching_Assistant'
		),
		array(
			'Engineering',
			'Aeronautical_and_Astronautical_Engineering', 'Biological_and_Agricultural_Engineering', 'Biomedical_and_Medical_Engineering', 'Ceramic_Sciences', 'Chemical_Engineering', 'Civil_Engineering', 'Computer_Engineering', 'Drafting_and_Design_Engineering', 'Electrical_Engineering_and_Electronics', 'Engineering_-_Architectural', 'Engineering_Mechanics', 'Engineering_Physics', 'Environmental_Engineering', 'Forest_Engineering', 'Geological_Engineering', 'Industrial_Engineering', 'Manufacturing_Engineering', 'Materials_Engineering', 'Math', 'Mechanical_Engineering', 'Metallurgical_Engineering', 'Mining_Engineering', 'Naval_Architecture_and_Marine_Engineering', 'Nuclear_Engineering', 'Ocean_Engineering', 'Petroleum_Engineering', 'Surveying', 'Systems_Engineering', 'Textile_Technologies'
		),
		array(
			'Legal',
			'Cultural_Studies', 'Ethnic_and_Gender_Studies', 'Geography_and_Cartography', 'Human_and_Consumer_Sciences', 'Human_and_Social_Services', 'Liberal_Arts,_Humanities,_and_General_Studies', 'Military_Studies', 'Parks,_Recreation_and_Leisure_Studies', 'Philosophy', 'Political_Science', 'Public_Administration', 'Religious_Studies', 'Social_Science_and_Studies', 'Social_Studies_and_History', 'Theological,_Religious,_and_Ministerial_Studies'
		),
		array(
			'Medical_and_Health_Professions',
			'Alternative_Medicine', 'Chiropractor', 'Clinical_Laboratory_Science_Professions', 'Communication_Disorders_Sciences', 'Dental', 'Health_and_Fitness', 'Massage_and_Related_Therapeutic_Professions', 'Medical_Administrative_Services', 'Medical_and_Health_Preparatory_Sciences', 'Medical_Assisting', 'Medical_Diagnostic_and_Treatment_Professions', 'Medical_Ethics_and_Bioethics', 'Medical_Informatics_and_Illustration', 'Medical_Residency_Programs', 'Mental_Health_Services', 'Nursing_Professions', 'Nutrition_Services', 'Optometric_and_Ophthalmic_Services', 'Osteopathic_Medicine_-_DO', 'Pharmaceutical_Sciences_and_Administration', 'Podiatry_-_DPM', 'Public_Health_and_Safety', 'Therapeutic_and_Rehabilitation_Professions', 'Veterinary_Medicine_and_Clinical_Sciences'
		),
		array(
			'Mechanic_and_Repair_Technologies',
			'Construction_Management_and_Trades', 'Electrical_Repair_and_Maintenance', 'Heating,_Air_Conditioning,_Ventilation,_and_Refrigeration_Maintenance', 'Heavy_Equipment_Maintenance', 'Leatherworking_and_Upholstery', 'Precision_Metal_Working', 'Precision_Systems_Maintenance', 'Vehicle Repair and Maintenance'
		),
		array(
			'Physical_Sciences',
			'Chemistry_Sciences', 'Forestry_and_Wildlands_Management', 'Natural_Resources_Conservation', 'Natural_Resources_Management', 'Physical_and_Environmental_Science', 'Physics'
		),
		array(
			'Psychology',
			'Developmental_Psychology', 'Psychology_and_Human_Behavior', 'School_Psychology'
		),
		array(
			'Transportation_and_Distribution',
			'Air_Transportation_and_Distribution', 'Ground_Transportation', 'Marine_Transportation'
		),
		array(
			'Visual_and_Performing_Arts',
			'Dance', 'Design_and_Applied_Arts', 'Drama_and_Theatre_Arts', 'Fine_Arts_and_Studio_Art', 'Musical_Arts', 'Photography,_Film,_and_Video'
		)
	); //end degre_array

$vocational_array =
	array(
		array(
			'Auto_Servicing',
			'Auto_Servicing'
		),
		array(
			'Computer_and_IT_Support',
			'Computer_and_IT_Support'
		),
		array(
			'Construction_Industry',
			'Construction_Industry'
		),
		array(
			'Cosmetology_and_Hair_Stylist',
			'Cosmetology_and_Hair_Stylist'
		),
		array(
			'Food_Service',
			'Food_Service'
		),
		array(
			'Healthcare_and_Social_Assistance',
			'Healthcare_and_Social_Assistance'
		),
		array(
			'Manufacturing_Sector',
			'Manufacturing_Sector'
		),
		array(
			'Trucking_and_Transportation_Industry',
			'Trucking_and_Transportation_Industry'
		)
	); //end degre_array

$GAT_array =
	array(
		array(
			'GMAT',
			'GMAT'
		),
		array(
			'IELTS',
			'IELTS'
		),
		array(
			'SAT',
			'SAT'
		)
	);
