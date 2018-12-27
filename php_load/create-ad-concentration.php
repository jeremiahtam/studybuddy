<?php
$category = $_POST['category'];
$study_area = $_POST['study_area'];

switch($category){	
  case 'certificate_program':
	if($study_area=='Arts_and_Design'){
	  echo"
	  <option value=''>-select concentration-</option>
	  <option value='Animation_Certificate'>Animation</option>
	  <option value='Design_Animation'>Design Animation</option>
	  <option value='Film_and_Video'>Film and Video</option>
	  <option value='Photography'>Photography</option>
	  ";
	  }else
	if($study_area=='Business'){
	  echo"
	  <option value=''>-select concentration-</option>
	  <option value='Assistant'>Assistant</option>
	  <option value='Finance_and_Accounting'>Finance and Accounting</option>
	  <option value='E_-_Commerce'>E-Commerce</option>
	  <option value='Management_and_Entrepreneural'>Management and Entrepreneural</option>
	  ";
	  }else
	if($study_area=='Criminal_Justice'){
	  echo"
	  <option value=''>-select concentration-</option>
	  <option value='Criminal_Justice'>Criminal Justice</option>
	  <option value='Forensic_Science'>Forensic Science</option>
	  <option value='Security'>Security</option>
	  <option value='Corrections'>Corrections</option>
	  ";
	  }else
	if($study_area=='Culinary_and_Hospitality'){
	  echo"
	  <option value=''>-select concentration-</option>
	  <option value='Hospitality_Management'>Hospitality Management</option>
	  <option value='Restaurant'>Restaurant</option>
	  <option value='Travel_Service'>Travel Service</option>
	  ";
	  }else
	if($study_area=='Education'){
	  echo"
	  <option value=''>-select concentration-</option>
	  <option value='Early_Childhood_Education'>Early Childhood Education</option>
	  <option value='Teacher_Assistant'>Teacher Assistant</option>
	  <option value='Teacher_Education'>Teacher Education</option>
	  ";
	  }else
	if($study_area=='Healthcare_and_Fitness'){
	  echo"
	  <option value=''>-select concentration-</option>
	  <option value='Health_and_Physical_Education/Fitness'>Health and Physical Education/Fitness</option>
	  <option value='Sport_Psychology'>Sport Psychology</option>
	  <option value='Kinesiology'>Kinesiology</option>
	  <option value='Sports_and_Fitness_Administration'>Sports and Fitness Administration</option>
	  ";
	  }else
	if($study_area=='Legal_Certification'){
	  echo"
	  <option value=''>-select concentration-</option>
	  <option value='Court_Reporting'>Court Reporting</option>
	  <option value='Legal_Administrative_Assistant'>Legal Administrative Assistant</option>
	  <option value='Legal_Assistant/Paralegal'>Legal Assistant/Paralegal</option>
	  <option value='Legal_Studies'>Legal Studies</option>
	  ";
	  }else
	if($study_area=='Skilled_Trade'){
	  echo"
	  <option value=''>-select concentration-</option>
	  <option value='mechanical'>Mechanical</option>
	  <option value='construction'>Construction</option>
	  <option value='precision_production_trade'>Precision Production Trade</option>
	  ";
	  }else
	if($study_area=='Social_Services'){
	  echo"
	  <option value=''>-select concentration-</option>
	  <option value='Social_Work'>Social Work</option>
	  <option value='Youth_Service'>Youth Service</option>
	  <option value='Public_Policy_and_Public_Administration'>Public Policy and Public Administration</option>
	  ";
	  }
  break;//end case:'certificate_program'


  case 'degree_program':
	if($study_area=='Agriculture'){
	  echo"
	  <option value=''>-select concentration-</option>
	  <option value='Agricultural_Business'>Agricultural Business</option>
	  <option value='Agriculture_Production'>Agriculture Production</option>
	  <option value='Animal_Services'>Animal Services</option>
	  <option value='Food_Science_and_Technology'>Food Science and Technology</option>
	  ";
	  }else
	if($study_area=='Architecture'){
	  echo"
	  <option value=''>-select concentration-</option>
	  <option value='Architectural_History'>Architectural History</option>
	  <option value='Architectural_Technology'>Architectural Technology</option>
	  <option value='Environmental_Design'>Environmental Design</option>
	  <option value='Interior_Architecture'>Interior Architecture</option>
	  <option value='Landscape_Architecture'>Landscape Architecture</option>
	  <option value='Urban_and_Regional_Planning'>Urban and Regional Planning</option>
	  ";
	  }else
	if($study_area=='Biological_and_Biomedical_Sciences'){
	  echo"
	  <option value=''>-select concentration-</option>
	  <option value='Bioinformatics'>Bioinformatics</option>
	  <option value='Botany'>Botany</option>
	  <option value='Cellular_Biology_and_Anatomical_Science'>Cellular Biology And Anatomical Science</option>
	  <option value='Ecology_and_Evolutionary_Biology'>Ecology and Evolutionary Biology</option>
	  <option value='General_Biology'>General Biology</option>
	  <option value='Genetics'>Genetics</option>
	  <option value='Microbiology_and_Immunology'>Microbiology and Immunology</option>
	  <option value='Molecular_Biology,Biochemistry_and_Biophysics'>Molecular Biology,Biochemistry and Biophysics</option>
	  <option value='Pharmacology_and_Toxicology'>Pharmacology and Toxicology</option>
	  <option value='Physiology_and_Related_Science'>Physiology and Related Science</option>
	  <option value='Zoology'>Zoology</option>
	  ";
	  }else
	if($study_area=='Business'){
	  echo"
	  <option value=''>-select concentration-</option>
	  <option value='Accounting_and_Bookkeeping'>Accounting and Bookkeeping</option>
	  <option value='Business_Economics'>Business Economics</option>
	  <option value='Business_Finance'>Business Finance</option>
	  <option value='Business_Management_and_Operations'>Business Management and Operations</option>
	  <option value='Business_Marketing'>Business Marketing</option>
	  <option value='Business_Support_and_Administrative_Services'>Business Support and Administrative Services</option>
	  <option value='Entrepreneurship_and_Small_Business_Development'>Entrepreneurship and Small Business Development</option>
	  <option value='Hospitality_Management'>Hospitality Management</option>
	  <option value='Human_Resource_Management'>Human Resource Management</option>
	  <option value='Information_System_Management'>Information System Management</option>
	  <option value='Sales_and_Merchandising'>Sales and Merchandising</option>
	  <option value='Specialized_Sales'>Specialized Sales</option>
	  ";
	  }else
	if($study_area=='Communications_and_Journalism'){
	  echo"
	  <option value=''>-select concentration-</option>
	  <option value='American_Sign_Language_-_ASL'>American Sign Language - ASL</option>
	  <option value='Communication_Studies'>Communication Studies</option>
	  <option value='Communication_Technology'>Communication Technology</option>
	  <option value='Comparative_Language_Studies_and_Services'>Comparative Language Studies and Services</option>
	  <option value='Digital,_Radio,_and_Television_Communication'>Digital, Radio, and Television Communication</option>
	  <option value='English_Composition'>English Composition</option>
	  <option value='English_Language_and_Literature'>English Language and Literature</option>
	  <option value='Foreign_Language_and_Literature'>Foreign Language and Literature</option>
	  <option value='Graphic_Communications'>Communication Technology</option>
	  <option value='Journalism'>Journalism</option>
	  <option value='Public_Relations_and_Advertising'>Public Relations and Advertising</option>
	  <option value='Publishing'>Publishing</option>
	  ";
	  }else
	if($study_area=='Computer_Sciences'){
	  echo"
	  <option value=''>-select concentration-</option>
	  <option value='Computer_and_Information_Sciences,_General'>Computer and Information Sciences, General</option>
	  <option value='Computer_Programming'>Computer Programming</option>
	  <option value='Computer_Systems_Analysis'>Computer Systems Analysis</option>
	  <option value='Data_Entry_Processing'>Data Entry Processing</option>
	  <option value='Information_Technology_Management'>Information Technology Management</option>
	  <option value='Networking_and_Telecommunications'>Networking and Telecommunications</option>
	  <option value='Software_and_Computer_Media_Applications'>Software and Computer Media Applications</option>
	  ";
	  }else
	if($study_area=='Culinary_Arts_and_Personal_Services'){
	  echo"
	  <option value=''>-select concentration-</option>
	  <option value='Cosmetology_and_Related_Services'>Cosmetology and Related Services</option>
	  <option value='Culinary Arts_and_Culinary_Services'>Culinary Arts and Culinary Services</option>
	  <option value='Funeral_Related_Services'>Funeral Related Services</option>
	  ";
	  }else
	if($study_area=='Education'){
	  echo"
	  <option value=''>-select concentration-</option>
	  <option value='Counseling_and_Guidance'>Counseling and Guidance</option>
	  <option value='Curriculum_and_Instruction'>Curriculum and Instruction</option>
	  <option value='Educational_Administration_and_Supervision'>Educational Administration and Supervision</option>
	  <option value='ESL_Teaching'>ESL Teaching</option>
	  <option value='International_and_Comparative_Education'>International and Comparative Education</option>
	  <option value='Library Science_and_Related_Professions'>Library Science and Related Professions</option>
	  <option value='Philosophical_Foundations_of_Education'>Philosophical Foundations of Education</option>
	  <option value='Special_Education'>Special Education</option>
	  <option value='Special_Education'>Special Educationh</option>
	  <option value='Teacher_Education_for_Specific_Subject_Areas'>Teacher Education for Specific Subject Areas</option>
	  <option value='Teaching_Assistant'>Teaching_Assistant</option>
	  ";
	  }else
	if($study_area=='Engineering'){
	  echo"
	  <option value=''>-select concentration-</option>
	  <option value='Aeronautical_and_Astronautical_Engineering'>Aeronautical and Astronautical Engineering</option>
	  <option value='Biological_and_Agricultural_Engineering'>Biological and Agricultural Engineering</option>
	  <option value='Biomedical_and_Medical_Engineering'>Biomedical and Medical Engineering</option>
	  <option value='Ceramic_Sciences'>Ceramic Sciences</option>
	  <option value='Chemical_Engineering'>Chemical Engineering</option>
	  <option value='Civil_Engineering'>Civil Engineering</option>
	  <option value='Computer_Engineering'>Computer Engineering</option>
	  <option value='Drafting_and_Design_Engineering'>Drafting and Design Engineering</option>
	  <option value='Electrical_Engineering_and_Electronics'>Electrical Engineering and Electronics</option>
	  <option value='Engineering_-_Architectural'>Engineering - Architectural</option>
	  <option value='Engineering_Mechanics'>Engineering Mechanics</option>
	  <option value='Engineering_Physics'>Engineering Physics</option>
	  <option value='Environmental_Engineering'>Environmental Engineering</option>
	  <option value='Forest_Engineering'>Forest_Engineering</option>
	  <option value='Geological_Engineering'>Geological Engineering</option>
	  <option value='Industrial_Engineering'>Industrial Engineering</option>
	  <option value='Manufacturing_Engineering'>Manufacturing Engineering</option>
	  <option value='Materials_Engineering'>Materials Engineering</option>
	  <option value='Math'>Math</option>
	  <option value='Mechanical_Engineering'>Mechanical Engineering</option>
	  <option value='Metallurgical_Engineering'>Metallurgical Engineering</option>
	  <option value='Mining_Engineering'>Mining Engineering</option>
	  <option value='Naval_Architecture_and_Marine_Engineering'>Naval Architecture and Marine Engineering</option>
	  <option value='Nuclear_Engineering'>Nuclear Engineering</option>
	  <option value='Ocean_Engineering'>Ocean Engineering</option>
	  <option value='Petroleum_Engineering'>Petroleum Engineering</option>
	  <option value='Surveying'>Surveying</option>
	  <option value='Systems_Engineering'>Systems Engineering</option>
	  <option value='Textile_Technologies'>Textile Technologies</option>
	  ";
	  }else
	if($study_area=='Legal'){
	  echo"
	  <option value=''>-select concentration-</option>
	  <option value='Criminal_Justice,_Law_Enforcement,_and_Corrections'>Criminal Justice, Law Enforcement, and Corrections</option>
	  <option value='Fire_Safety_and_Protection'>Fire Safety and Protection</option>
	  <option value='Legal_Research_and_Professional_Studies'>Legal Research and Professional Studies</option>
	  <option value='Legal_Support_Services'>Legal Support Services</option>
	  ";
	  }else
	if($study_area=='Liberal_Arts_and_Humanities'){
	  echo"
	  <option value=''>-select concentration-</option>
	  <option value='Cultural_Studies'>Cultural Studies</option>
	  <option value='Ethnic_and_Gender_Studies'>Ethnic and Gender Studies</option>
	  <option value='Geography_and_Cartography'>Geography and Cartography</option>
	  <option value='Human_and_Consumer_Sciences'>Human and Consumer Sciences</option>
	  <option value='Human_and_Social_Services'>Human and Social Services</option>
	  <option value='Liberal_Arts,_Humanities,_and_General_Studies'>Liberal Arts, Humanities, and General Studies</option>
	  <option value='Military_Studies'>Military Studies</option>
	  <option value='Parks,_Recreation_and_Leisure_Studies'>Public Policy and Public Administration</option>
	  <option value='Philosophy'>Philosophy</option>
	  <option value='Political_Science'>Political Science</option>
	  <option value='Public_Administration'>Public Administration</option>
	  <option value='Religious_Studies'>Religious Studies</option>
	  <option value='Social_Science_and_Studies'>Social Science and Studies</option>
	  <option value='Social_Studies_and_History'>Social Studies and History</option>
	  <option value='Theological,_Religious,_and_Ministerial_Studies'>Theological, Religious, and Ministerial Studies</option>
	  ";
	  }else
	if($study_area=='Medical_and_Health_Professions'){
	  echo"
	  <option value=''>-select concentration-</option>
	  <option value='Alternative_Medicine'>Alternative Medicine</option>
	  <option value='Chiropractor'>Chiropractor</option>
	  <option value='Clinical_Laboratory_Science_Professions'>Clinical Laboratory Science Professions</option>
	  <option value='Communication_Disorders_Sciences'>Communication Disorders Sciences</option>
	  <option value='Dental'>Dental</option>
	  <option value='Health_and_Fitness'>Health and Fitness</option>
	  <option value='Massage_and_Related_Therapeutic_Professions'>Massage and Related Therapeutic Professions</option>
	  <option value='Medical_Administrative_Services'>Medical Administrative Services</option>	  
	  <option value='Medical_and_Health_Preparatory_Sciences'>Medical and Health Preparatory Sciences</option>
	  <option value='Medical_Assisting'>Medical Assisting</option>
	  <option value='Medical_Diagnostic_and_Treatment_Professions'>Medical Diagnostic and Treatment Professions</option>
	  <option value='Medical_Ethics_and_Bioethics'>Medical Ethics and Bioethics</option>
	  <option value='Medical_Informatics_and_Illustration'>Medical Administrative Services</option>
	  <option value='Medical_Residency_Programs'>Medical Residency Programs</option>
	  <option value='Mental_Health_Services'>Mental Health Services</option>
	  <option value='Nursing_Professions'>Nursing Professions</option>
	  <option value='Nutrition_Services'>Nutrition Services</option>
	  <option value='Optometric_and_Ophthalmic_Services'>Optometric and Ophthalmic Services</option>
	  <option value='Osteopathic_Medicine_-_DO'>Osteopathic Medicine - DO</option>
	  <option value='Pharmaceutical_Sciences_and_Administration'>Pharmaceutical Sciences and Administration</option>
	  <option value='Podiatry_-_DPM'>Podiatry - DPM</option>
	  <option value='Public_Health_and_Safety'>Public Health and Safety</option>
	  <option value='Therapeutic_and_Rehabilitation_Professions'>Therapeutic and Rehabilitation Professions</option>
	  <option value='Veterinary_Medicine_and_Clinical_Sciences'>Veterinary Medicine and Clinical Sciences</option>
	  ";
	  }else
	if($study_area=='Mechanic_and_Repair_Technologies'){
	  echo"
	  <option value=''>-select concentration-</option>
	  <option value='Construction_Management_and_Trades'>Construction Management and Trades</option>
	  <option value='Electrical_Repair_and_Maintenance'>Electrical Repair and Maintenance</option>
	  <option value='Heating,_Air_Conditioning,_Ventilation,_and_Refrigeration_Maintenance'>Heating, Air Conditioning, Ventilation, and Refrigeration Maintenance</option>
	  <option value='Heavy_Equipment_Maintenance'>Heavy Equipment Maintenance</option>
	  <option value='Leatherworking_and_Upholstery'>Leatherworking and Upholstery</option>
	  <option value='Precision_Metal_Working'>Precision Metal Working</option>
	  <option value='Precision_Systems_Maintenance'>Precision Systems Maintenance</option>
	  <option value='Vehicle Repair and Maintenance'>Vehicle Repair and Maintenance</option>
	  ";
	  }else
	if($study_area=='Physical_Sciences'){
	  echo"
	  <option value=''>-select concentration-</option>
	  <option value='Chemistry_Sciences'>Chemistry Sciences</option>
	  <option value='Forestry_and_Wildlands_Management'>Forestry and Wildlands Management</option>
	  <option value='Natural_Resources_Conservation'>Natural Resources Conservation</option>
	  <option value='Natural_Resources_Management'>Natural Resources Management</option>
	  <option value='Physical_and_Environmental_Science'>Physical and Environmental Science</option>
	  <option value='Physics'>Physics</option>
	  ";
	  }else
	if($study_area=='Psychology'){
	  echo"
	  <option value=''>-select concentration-</option>
	  <option value='Developmental_Psychology'>Developmental Psychology</option>
	  <option value='Psychology_and_Human_Behavior'>Psychology and Human Behavior</option>
	  <option value='School_Psychology'>School Psychology</option>
	  ";
	  }else
	if($study_area=='Transportation_and_Distribution'){
	  echo"
	  <option value=''>-select concentration-</option>
	  <option value='Air_Transportation_and_Distribution'>Air Transportation and Distribution</option>
	  <option value='Ground_Transportation'>Ground Transportation</option>
	  <option value='Marine_Transportation'>Marine Transportation</option>
	  ";
	  }else
	if($study_area=='Visual_and_Performing_Arts'){
	  echo"
	  <option value=''>-select concentration-</option>
	  <option value='Dance'>Dance</option>
	  <option value='Design_and_Applied_Arts'>Design and Applied Arts</option>
	  <option value='Drama_and_Theatre_Arts'>Drama and Theatre Arts</option>
	  <option value='Fine_Arts_and_Studio_Art'>Fine Arts and Studio Art</option>
	  <option value='Musical_Arts'>Musical Arts</option>
	  <option value='Photography,_Film,_and_Video'>Photography, Film, and Video</option>
	  ";
	  }
  break;//end case:'degree_program'


  case 'vocational_program':
	if($study_area=='Auto_Servicing'){
	  echo"
	  <option value=''>-select concentration-</option>
	  <option value='Animation_Certificate'>Animation</option>
	  <option value='Aesign_Animation'>Design Animation</option>
	  <option value='Film_and_Video'>Film and Video</option>
	  <option value='Photography'>Photography</option>
	  ";
	  }else
	if($study_area=='Computer_and_IT_Support'){
	  echo"
	  <option value=''>-select concentration-</option>
	  <option value='Assistant'>Assistant</option>
	  <option value='Finance_and_Accounting'>Finance and Accounting</option>
	  <option value='E_-_commerce'>E-Commerce</option>
	  <option value='Management_and_Entrepreneural'>Management and Entrepreneural</option>
	  ";
	  }else
	if($study_area=='Construction_Industry'){
	  echo"
	  <option value=''>-select concentration-</option>
	  <option value='Criminal_Justice'>Criminal Justice</option>
	  <option value='Forensic_Science'>Forensic Science</option>
	  <option value='Security'>Security</option>
	  <option value='Corrections'>Corrections</option>
	  ";
	  }else
	if($study_area=='Cosmetology_and_Hair_Stylist'){
	  echo"
	  <option value=''>-select concentration-</option>
	  <option value='Hospitality_Management'>Hospitality Management</option>
	  <option value='Restaurant'>Restaurant</option>
	  <option value='Travel_Service'>Travel Service</option>
	  ";
	  }else
	if($study_area=='Healthcare_and_Social_Assistance'){
	  echo"
	  <option value=''>-select concentration-</option>
	  <option value='GMAT'>GMAT</option>
	  <option value='IELTS'>IELTS</option>
	  <option value='TOEFL'>TOEFL</option>
	  ";
	  }else
	if($study_area=='Manufacturing_Sector'){
	  echo"
	  <option value=''>-select concentration-</option>
	  <option value='Health_and_Physical_Education/Fitness'>Health and Physical Education/Fitness</option>
	  <option value='Sport_Psychology'>Sport Psychology</option>
	  <option value='Kinesiology'>Kinesiology</option>
	  <option value='Sports_and_Fitness_Administration'>Sports and Fitness Administration</option>
	  ";
	  }else
	if($study_area=='Trucking_and_Transportation_Industry'){
	  echo"
	  <option value=''>-select concentration-</option>
	  <option value='Court_Reporting'>Court Reporting</option>
	  <option value='Legal_Administrative_Assistant'>Legal Administrative Assistant</option>
	  <option value='Legal_Assistant/Paralegal'>Legal Assistant/Paralegal</option>
	  <option value='Legal_Studies'>Legal Studies</option>
	  ";
	  }
  break;//end case:'vocational_program'

  default:
  echo"
  <option value=''>-select study area first-</option>
  ";
  break;

}
?>