<?php if (is_category()) {
  $this_category = get_category($cat);
  if (get_category_children($this_category->cat_ID) != "") {
    // This is the Template for Category level 1
    include('template-maincat.php');
  }
  else  {
    // This is the Template for Category level 2
    include('template-subcat.php');
  }
}?>
