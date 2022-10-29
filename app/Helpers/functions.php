<?php

use App\Models\Category;
use App\Models\Post;

    function fetch_category($id) {
        $category = Category::where('id', $id)->get()->first();
        return $category;
    }

    function get_number_of_category_posts($id) {
        $count = Post::where('post_category', $id)->count();
        return number_format($count);
    }
    
?>