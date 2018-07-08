<section class="bar pt-0">
            <div class="row">
              <div class="col-md-12">
                <div class="heading text-center">
                  <h2>Student Language Profile form</h2>
                </div>
              </div>
			  </div>
			  <div class="row">

                  <?php if (isset($error) && !empty($error)){?>
                      <div class="container">
                          <div class="row">
                              <ul>
                                  <?php foreach ($error as $e){ ?>
                                      <li class="list-group-item btn-danger">
                                          <?php echo $e ?>
                                      </li>
                                  <?php } ?>
                              </ul>
                          </div>
                      </div>
                  <?php } ?>

<div class="container">
<div class="row">
<form action="languageprofile.php" method="post" class="col-lg-12 mx-auto">
				<div class="col-lg-6">
                      <div class="form-group">
                        <label for="examtype">Exam Type</label><br>
                        <input type="radio" name="exam_type" value="IELTS"
                            <?php isset($exam_type) && $exam_type =='IELTS' ? print 'checked' : print '' ?>> IELTS<br>
						<input type="radio" name="exam_type" value="TOEFL"
                            <?php isset($exam_type) && $exam_type =='TOEFL' ? print 'checked' : print '' ?>> TOEFL<br>
						<input type="radio" name="exam_type" value="CAMBRIDGE FCE"
                            <?php isset($exam_type) && $exam_type =='CAMBRIDGE FCE' ? print 'checked' : print '' ?>> CAMBRIDGE FCE<br>
						<input type="radio" name="exam_type" value="CAMBRIDGE CAE"
                            <?php isset($exam_type) && $exam_type =='CAMBRIDGE CAE' ? print 'checked' : print '' ?>> CAMBRIDGE CAE<br>
						<input type="radio" name="exam_type" value="CAMBRIDGE CPE"
                            <?php isset($exam_type) && $exam_type =='CAMBRIDGE CPE' ? print 'checked' : print '' ?>> CAMBRIDGE CPE<br>
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="listening">Listening</label>
                        <input id="listening" name="Listening"
                               value="<?php isset($Listening) ?  print $Listening : print "" ?>" type="number" min="0" class="form-control">
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="reading">Reading</label>
                        <input id="reading" name="Reading"
                               value="<?php isset($Reading) ?  print $Reading : print "" ?>" type="number" min="0" class="form-control">
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="writing">Writing</label>
                        <input id="writing" name="writing"
                               value="<?php isset($writing) ?  print $writing : print "" ?>" type="number" min="0" class="form-control">
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="speaking">Speaking</label>
                        <input id="speaking" name="speaking"
                               value="<?php isset($speaking) ?  print $speaking : print "" ?>" type="number" min="0" class="form-control">
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="oband">Overal Band</label>
                        <input id="oband" name="overal_band"
                               value="<?php isset($overal_band) ?  print $overal_band : print "" ?>" type="number" min="0" class="form-control">
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="certificatedate">Certificate Date</label>
                        <input id="certificatedate" name="certificate_date"
                               value="<?php isset($certificate_date) ?  print $certificate_date : print "" ?>" type="date" class="form-control">
                      </div>
                 </div>
<!--				 <div class="col-lg-6">-->
<!--                      <div class="form-group">-->
<!--                        <label for="languagedoc">Language Doc</label>-->
<!--                        <input id="languagedoc" name="languagedoc" type="file" class="form-control">-->
<!--                      </div>-->
               
				 <div class="col-md-6">
                      <div class="form-group">
                        
                        <input  type="Submit" name="languageProfile" class="form-control">
                      </div>
                 </div>
				 

</form>
</div>
</div>
</div>
</section>
