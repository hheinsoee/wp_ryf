<form role="search" method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="input-group">
            <input 
            type="search" 
            class="form-control flex-fill" 
            name="s"  
            placeholder="Search"
            value="<?php echo get_search_query(); ?>"
            required
            />
        <button type="submit" class="btn btn-primary">
            <span class="bi bi-search">&nbsp;Search</span>
        </button>
    </div>
</form>