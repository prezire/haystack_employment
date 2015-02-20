<section id="search">
    <?php echo form_open('main/search'); ?>
      <div class="row">
        <div class="small-9 medium-10 large-11 columns">
          <input type="text" 
                name="keywords" 
                placeholder="Search internships e.g. Information Technology">
        </div>
        <div class="small-3 medium-2 large-1 columns">
          <button class="tiny radius">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>
</section>