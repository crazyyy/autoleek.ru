<div class="search-box">
  <form role="search" method="get" id="searchform" action="<?php echo home_url() ; ?>/">
    <input type="text" value="<?php echo esc_html($s, 1); ?>" name="s" id="s" maxlength="33" class="form-control pull-left" placeholder="Поиск" />
    <input type="submit" id="searchsubmit" value="Поиск" class="btn">
  </form>
</div>
