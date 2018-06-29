<section class="bar pt-0">
            <div class="row">
              <div class="col-md-12">
                <div class="heading text-center">
                  <h2>Student Academic Profile form</h2>
                </div>
              </div>
			  </div>
			  <div class="row">
<div class="container">
<div class="row">
<form action="personalprofile.php" method="post" class="col-lg-12 mx-auto">
				<div class="col-lg-6">
                      <div class="form-group">
                        <label for="sid"><strong>Student ID</strong></label>
                        <input id="sid" name="sid" type="text" class="form-control">
                      </div>
                 </div>
				<div class="col-lg-6">
                      <div class="form-group">
                        <label for="qname"><strong>Qualification Name</strong></label><br>
                        <input type="radio" name="qname" value="primary" checked>Primary<br>
						<input type="radio" name="qname" value="secondary">Secondary<br>
						<input type="radio" name="qname" value="diploma">Diploma<br>
						<input type="radio" name="qname" value="bachelor">Bachelor<br>
						<input type="radio" name="qname" value="masters">Masters<br>
                      </div>
					  
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="qlanguage">Qualification Language</label><br>
                        <input type="radio" name="qlanguage" value="farsi" checked>Farsi<br>
						<input type="radio" name="qlanguage" value="arabic">Arabic<br>
						<input type="radio" name="qlanguage" value="french">French<br>
						<input type="radio" name="qlanguage" value="russian">Russian<br>
						<input type="radio" name="qlanguage" value="spanish">Spanish<br>
						<input type="radio" name="qlanguage" value="portoguese">Portoguese<br>
						<input type="radio" name="qlanguage" value="italian">Italian<br>
						<input type="radio" name="qlanguage" value="german">German<br><input type="radio" name="qlanguage" value="english">English<br>
						<input type="radio" name="qlanguage" value="other">Other<br>
						
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="qcountry">Qualification Country</label>
                        <input id="qcountry" name="qcountry" type="country" class="form-control">
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="gpa">GPA(%)</label>
                        <input id="gpa" name="gpa" type="number" min="0" max="100" class="form-control">
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="qinstitute">Qualification Institute</label>
                        <input id="qinstitute" name="qinstitute" type="text" class="form-control">
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="qcomment">Qualification Comment</label>
                        <input id="qcomment" name="qcomment" type="text" class="form-control">
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="qdate">Qualification Date</label>
                        <input id="qdate" name="qdate" type="date" class="form-control">
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="qdoc">Qualification Doc</label>
                        <input id="qdoc" name="qdoc" type="file" class="form-control">
                      </div>
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
