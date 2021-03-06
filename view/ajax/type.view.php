<?php foreach ($data['products'] as $product) : ?>
<li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6 type-product-<?=$product->id_type?>">
    <div class="product-item">
    <div class="item-inner">
        <div class="product-thumbnail">
        <?php if ($product->promotion_price != 0) : ?>
            <div class="icon-sale-label sale-left">Sale</div>
        <?php endif ?>
        <?php if ($product->new == 1) : ?>
            <div class="icon-new-label new-right">New</div>
        <?php endif ?>
        <div class="pr-img-area">
            <a title="<?= $product->name ?>" 
            href="<?= $product->id . '-' . $product->url ?>.html">
            <figure>
                <img class="first-img" src="public/source/images/products-images/<?= $product->image ?>" alt="html template" height="270px">
                <img class="hover-img" src="public/source/images/products-images/<?= $product->image ?>" alt="html template">
            </figure>
            </a>
            <button type="button" class="add-to-cart-mt" data-id="<?=$product->id?>">
            <i class="fa fa-shopping-cart"></i>
            <span> Add to Cart</span>
            </button>
        </div>
        </div>
        <div class="item-info">
        <div class="info-inner">
            <div class="item-title">
            <a title="<?= $product->name ?>" href="<?= $product->id . '-' . $product->url ?>.html"><?= $product->name ?></a>
            </div>
            <div class="item-content">
            <div class="item-price">
                <div class="price-box">
                <?php if ($product->promotion_price != 0) : ?>
                <p class="special-price">
                    <span class="price"> <?= number_format($product->promotion_price) ?> </span>
                </p>
                <p class="old-price">
                    <span class="price"> <?= number_format($product->price) ?> </span>
                </p>
                <?php else : ?>
                <p class="special-price">
                    <span class="price"> <?= number_format($product->price) ?> </span>
                </p>
                <?php endif ?>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</li>
<?php endforeach ?>

<style>
.swal-title{
    font-size:15px!important
}
</style>
  <!-- jquery js -->
  <script type="text/javascript" src="public/source/js/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script>
  $(document).ready(function(){
    $('.add-to-cart-mt').click(function(){
      var idSP = $(this).attr('data-id')
      $.ajax({
        url:'cart.php',
        data:{
          idSP
        },
        type: 'POST',
        dataType: 'json',
        success:function(res){
            $('.cart-total').html(res.data)
            swal(res.message,'',"success");
        },
        error:function(e){
          console.log(e)
        }
      })
    })
  })
  </script>
