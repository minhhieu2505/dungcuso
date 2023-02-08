<?php
    /* Sản phẩm */
    $nametype = "san-pham";
    $config['product'][$nametype]['title_main'] = "Sản Phẩm";
    $config['product'][$nametype]['dropdown'] = false;
    $config['product'][$nametype]['list'] = false;
    $config['product'][$nametype]['cat'] = false;
    $config['product'][$nametype]['item'] = false;
    $config['product'][$nametype]['sub'] = false;
    $config['product'][$nametype]['brand'] = false;
    $config['product'][$nametype]['color'] = true;
    $config['product'][$nametype]['size'] = true;
    $config['product'][$nametype]['tags'] = false;
    $config['product'][$nametype]['import'] = false;
    $config['product'][$nametype]['export'] = false;
    $config['product'][$nametype]['view'] = true;
    $config['product'][$nametype]['copy'] = true;
    $config['product'][$nametype]['copy_image'] = true;
    $config['product'][$nametype]['comment'] = true;
    $config['product'][$nametype]['slug'] = true;
    $config['product'][$nametype]['check'] = array("noibat" => "Nổi bật", "hienthi" => "Hiển thị");
    $config['product'][$nametype]['images'] = true;
    $config['product'][$nametype]['show_images'] = true;
    $config['product'][$nametype]['gallery'] = array
    (
        $nametype => array
        (
            "title_main_photo" => "Hình ảnh sản phẩm",
            "title_sub_photo" => "Hình ảnh",
            "check_photo" => array("hienthi" => "Hiển thị"),
            "number_photo" => 3,
            "images_photo" => true,
            "cart_photo" => true,
            "avatar_photo" => true,
            "name_photo" => true,
            "width_photo" => 540,
            "height_photo" => 540,
            "thumb_photo" => '100x100x1',
            "img_type_photo" => '.jpg|.gif|.png|.jpeg|.gif'
        )
    );
    $config['product'][$nametype]['code'] = true;
    $config['product'][$nametype]['regular_price'] = true;
    $config['product'][$nametype]['sale_price'] = true;
    $config['product'][$nametype]['discount'] = true;
    $config['product'][$nametype]['desc'] = true;
    $config['product'][$nametype]['desc_cke'] = true;
    $config['product'][$nametype]['content'] = true;
    $config['product'][$nametype]['content_cke'] = true;
    $config['product'][$nametype]['seo'] = true;
    $config['product'][$nametype]['schema'] = true;
    $config['product'][$nametype]['width'] = 270;
    $config['product'][$nametype]['height'] = 270;
    $config['product'][$nametype]['thumb'] = '100x100x1';
    $config['product'][$nametype]['img_type'] = '.jpg|.gif|.png|.jpeg|.gif';

    /* Sản phẩm (Size) */
    $config['product'][$nametype]['check_size'] = array("hienthi" => "Hiển thị");

    /* Sản phẩm (Color) */
    $config['product'][$nametype]['check_color'] = array("hienthi" => "Hiển thị");
    $config['product'][$nametype]['color_images'] = true;
    $config['product'][$nametype]['color_code'] = true;
    $config['product'][$nametype]['color_type'] = true;
    $config['product'][$nametype]['width_color'] = 30;
    $config['product'][$nametype]['height_color'] = 30;
    $config['product'][$nametype]['thumb_color'] = '100x100x1';
    $config['product'][$nametype]['img_type_color'] = '.jpg|.gif|.png|.jpeg|.gif';

?>