<?php
$category=$_POST['category'];

switch($category){	
	case 'certificate_program':
	echo"
	<option value=''>-select study area-</option>
	<option value='Arts_and_Design'>Arts and Design</option>
	<option value='Business'>Business</option>
	<option value='Criminal_Justice'>Criminal Justice</option>
	<option value='Culinary_and_Hospitality'>Culinary and Hospitality</option>
	<option value='Education'>Education</option>
	<option value='Graduate_Admission_Tests'>Graduate Admission Tests</option>
	<option value='Health_Care_and_Fitness'>Health Care and Fitness</option>
	<option value='Legal_Certification'>Legal Certification</option>
	<option value='Skilled_Trade'>Skilled Trade</option>
	<option value='Social_Services'>Social Services</option>
	";
	break;

	case 'degree_program':
	echo"
	<option value=''>-select study area-</option>
	<option value='Agriculture'>Agriculture</option>
	<option value='Architecture'>Architecture</option>
	<option value='Biological_and_Biomedical_Sciences'>Biological and Biomedical Sciences</option>
	<option value='Business'>Business</option>
	<option value='Communications_and_Journalism'>Communications and Journalism</option>
	<option value='Computer_Sciences'>Computer Sciences</option>
	<option value='Culinary_Arts_and_Personal_Services'>Culinary Arts and Personal Services</option>
	<option value='Education'>Education</option>
	<option value='Engineering'>Engineering</option>
	<option value='Legal'>Legal</option>
	<option value='Liberal_Arts_and_Humanities'>Liberal Arts and Humanities</option>
	<option value='Mechanic_and_Repair_Technologies'>Mechanic and Repair Technologies</option>
	<option value='Medical_and_Health_Professions'>Medical and Health Professions</option>
	<option value='Physical_Sciences'>Physical Sciences</option>
	<option value='Psychology'>Psychology</option>
	<option value='Transportation_and_Distribution'>Transportation and Distribution</option>
	<option value='Visual_and_Performing_Arts'>Visual and Performing Arts</option>
	";
	break;

	case 'vocational_program':
	echo"
	<option value=''>-select study area-</option>
	<option value='Auto_Servicing'>Auto Servicing</option>
	<option value='Computer_and_IT_Support'>Computer and IT Support</option>
	<option value='Construction_Industry'>Construction Industry</option>
	<option value='Cosmetology_and_Hair_Stylist'>Cosmetology and Hair Stylist</option>
	<option value='Food_Service'>Food Service</option>
	<option value='Healthcare_and_Social_Assistance'>Healthcare and Social Assistance</option>
	<option value='Manufacturing_Sector'>Manufacturing Sector</option>
	<option value='Trucking_and_Transportation_Industry'>Trucking and Transportation Industry</option>
	";
	break;
	
	default:
	echo"
	<option value=''>-select category first-</option>
	";
	break;
}
?>