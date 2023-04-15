$(document).ready(function(){
  $('.slideshow').slick({
     slidesToShow: 1,
     slidesToScroll: 1,
     arrows: false,
     fade: true,
  });
  $('.slick-criteria').slick({
     slidesToShow: 4,
     slidesToScroll: 1,
     arrows: false,
     fade: false,
  });
  $('.slick-advertise').slick({
     slidesToShow: 2,
     slidesToScroll: 1,
     arrows: true,
     fade: false,
  });
  $('.slick-bestseller').slick({
     slidesToShow: 6,
     slidesToScroll: 1,
     arrows: true,
     fade: false,
  });
  $('.slick-product').slick({
     slidesToShow: 6,
     slidesToScroll: 1,
     arrows: true,
     fade: false,
  });
  $('.slick-brand').slick({
     slidesToShow: 6,
     slidesToScroll: 1,
     arrows: false,
     fade: false,
  });
  $('.slick-pro-thumb').slick({
     slidesToShow: 4,
     slidesToScroll: 1,
     arrows: false,
     fade: false,
  });
  $('.slick-news').slick({
   slidesToShow: 4,
   slidesToScroll: 1,
   arrows: false,
   fade: false,
   });

  loadPaging("api/product.php?perpage=8",'.paging-product');
  $(".paging-product-category").each(function(){
    var list = $(this).data("list");
    loadPaging("api/product.php?perpage=8&idList="+list,'.paging-product-category-'+list);
  })
});

