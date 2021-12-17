<?php
include("./php_load/category-array.php");
?>
    <section class="footer">
      <div class="container">
        <div class="row">

          <div class="col-sm-4 col-md-2">
            <ul>
              <h5><a href="view-ads-by-category/Certificate_Program">Certificate Program</a></h5>
              <?php
			  $i = 0;
			  while($i < count($certificate_array)){
				 echo"<li><a href='view-ads-by-category/Certificate_Program/".$certificate_array[$i][0]."'>".str_replace('_',' ',$certificate_array[$i][0])."</a></li>"; 
				 $i++;
				}
			  ?>
            </ul><!--end ul-->
          </div><!--end col-3-->

          <div class="col-sm-4 col-md-2">
            <ul>
              <h5><a href="view-ads-by-category/Degree_Program">Degree Program</a></h5>
              <?php
			  $i = 0;
			  while($i < count($degree_array)){
				 echo"<li><a href='view-ads-by-category/Degree_Program/".$degree_array[$i][0]."'>".str_replace('_',' ',$degree_array[$i][0])."</a></li>"; 
				 $i++;
				}
			  ?>
            </ul><!--end ul-->
          </div><!--end col-3-->
          <div class="col-sm-4 col-md-2">
            <ul>
              <h5><a href="view-ads-by-category/Vocational_Program">Vocational Program</a></h5>
              <?php
			  $i = 0;
			  while($i < count($vocational_array)){
				 echo"<li><a href='view-ads-by-category/Vocational_Program/".$vocational_array[$i][0]."'>".str_replace('_',' ',$vocational_array[$i][0])."</a></li>"; 
				 $i++;
				}
			  ?>
            </ul><!--end ul-->
          </div><!--end col-3-->
          <div class="col-sm-4 col-md-2">
            <ul>
              <h5><a href="view-ads-by-category/Graduate_Admission_Tests">Graduate Admission Tests</a></h5>
              <?php
			  $i = 0;
			  while($i < count($GAT_array)){
				 echo"<li><a href='view-ads-by-category/Graduate_Admission_Tests/".$GAT_array[$i][0]."'>".str_replace('_',' ',$GAT_array[$i][0])."</a></li>"; 
				 $i++;
				}
			  ?>
            </ul><!--end ul-->
          </div><!--end col-3-->
          <div class="col-sm-4 col-md-2">
            <ul>
              <h5>Further Info</h5>
              <li><a>How it works</a></li>
              <li><a>FAQ's</a></li>
              <li><a>Contact Us</a></li>
              <li><a>About Us</a></li>
            </ul><!--end ul-->
          </div><!--end col-3-->
          <div class="col-sm-4 col-md-2">
            <ul>
              <h5>Media</h5>
              <li>
                <div class="footer-social-media">
                  <a class="email"><span class="ion-ios-email-outline"></span></a>
                  <a class="facebook"><span class="ion-social-facebook"></span></a>
                  <a class="twitter"><span class="ion-social-twitter"></span></a>
                </div>
              </li>
            </ul><!--end ul-->
          </div><!--end col-3-->
        </div><!--end row-->
      </div><!--end container-->
      <div class="footer-copyright">
        <div class="container">
          <p>&copy; 2018 An oncliqsupport production.</p>
        </div><!--end container-->
      </div>
    </section><!--end footer-->
