<div class="row panel">
  <div class="fields small-12 medium-12 large-8 columns">
    <label>Fields:</label>
    <div>
      <input type="checkbox" name="industries" id="fieldIndustries" /> <label for="fieldIndustries">Industries</label>
      <input type="checkbox" name="positions" id="fieldPositions" /> <label for="fieldPositions">Positions</label>
      <input type="checkbox" name="countries" id="fieldWorkedCountries" /> <label for="fieldWorkedCountries">Worked Countries</label>
      <input type="checkbox" name="employerViews" id="fieldEmployerViews" /> <label for="fieldEmployerViews">Employer Views</label>
      <input type="checkbox" name="viewedPositions" id="fieldViewedPositions" /> <label for="fieldViewedPositions">Viewed Positions</label>
      <input type="checkbox" name="appliedPositions" id="fieldAppliedPositions" /> <label for="fieldAppliedPositions">Applied Positions</label>
    </div>
  </div>
  <div class="small-12 medium-12 large-4 columns">
    <label>Course*:</label>
    <select class="course">
      <option>Please select</option>
    </select>
  </div>
  <div class="small-12 medium-12 large-12 columns">
    <button roleName="<?php echo getRoleName(); ?>" 
            class="tiny btnGenerate">
            Generate Report
    </button>
  </div>
  <div class="small-12 medium-12 large-12 columns graph panel"><!-- --></div>
</div>