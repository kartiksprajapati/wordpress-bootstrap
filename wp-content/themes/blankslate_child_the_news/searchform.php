<form role="search" method="get" id="search-form" action="<?php echo esc_url(home_url('/')); ?>"
    class="input-group mb-3">
    <div class="input-group d-flex align-items-center rounded p-2  bg-primary text-secondary ">
        <div class="input-group-prepend">
            <span class="input-group-text p-0">
                <i class="fas fa-search text-muted"></i>
            </span>
        </div>
        <input type="search" class="form-control border-0" placeholder="Search" aria-label="search nico" name="s"
            id="search-input" value="<?php echo esc_attr(get_search_query()); ?>">
    </div>
</form>