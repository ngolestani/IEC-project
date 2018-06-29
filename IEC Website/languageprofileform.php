<section class="bar pt-0">
            <div class="row">
              <div class="col-md-12">
                <div class="heading text-center">
                  <h2>Student Language Profile form</h2>
                </div>
              </div>
			  </div>
			  <div class="row">
<div class="container">
<div class="row">
<form action="personalprofile.php" method="post" class="col-lg-12 mx-auto">
				<div class="col-lg-6">
                      <div class="form-group">
                        <label for="sid">Student ID</label>
                        <input id="sid" name="sid" type="text" class="form-control">
                      </div>
                 </div>
				<div class="col-lg-6">
                      <div class="form-group">
                        <label for="examtype">Exam Type</label><br>
                        <input type="radio" name="examtype" value="IELTS" checked> IELTS<br>
						<input type="radio" name="examtype" value="TOEFL"> TOEFL<br>
						<input type="radio" name="examtype" value="FCE"> CAMBRIDGE FCE<br>
						<input type="radio" name="examtype" value="CAE"> CAMBRIDGE CAE<br>
						<input type="radio" name="examtype" value="CPE"> CAMBRIDGE CPE<br>
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="listening">Listening</label>
                        <input id="listening" name="listening" type="number" min="0"class="form-control">
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="reading">Reading</label>
                        <input id="reading" name="reading" type="number" min="0"class="form-control">
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="writing">Writing</label>
                        <input id="writing" name="writing" type="number" min="0" class="form-control">
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="speaking">Speaking</label>
                        <input id="speaking" name="speaking" type="number" min="0" class="form-control">
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="oband">Overal Band</label>
                        <input id="oband" name="oband" type="number" min="0" class="form-control">
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="certificatedate">Certificate Date</label>
                        <input id="certificatedate" name="certificatedate " type="date" class="form-control">
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="languagedoc">Language Doc</label>
                        <input id="languagedoc" name="languagedoc" type="file" class="form-control">
                      </div>
               
				 <div class="col-md-6">
                      <div class="form-group">
                        
                        <input  type="Submit" class="form-control">
                      </div>
                 </div>
				 

<input type="submit">
</form>
</div>
</div>
</div>
</section>
