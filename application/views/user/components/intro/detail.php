<?php
    $page_id = $this->uri->segment(2);
    $page = $this->intro_model->get_intro_by_id($page_id);
?>
<div class="breadcrumb clearfix">
    <ul>
        <li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="home">
            <a title="Đến trang chủ" href="<?php echo base_url("index.html"); ?>" itemprop="url"><span itemprop="title">Trang chủ</span></a>
        </li>
        <li class="icon-li"><strong><?php echo $page->name; ?></strong> </li>
    </ul>
</div>
<script type="text/javascript">
    $(".link-site-more").hover(function () { $(this).find(".s-c-n").show(); }, function () { $(this).find(".s-c-n").hide(); });
</script>
<style type="text/css">
    .introduction
    {
        font-size: 15px;
    }
    .image-intro
    {
        width: 570px;
        height: 360px;
    }
</style>
<section class="product-content clearfix">
    <h1 class="title clearfix"><span><?php echo $page->name; ?></span></h1>
    <div class="introduction">
        <p><b><?php echo $page->content; ?></b></p>
    </div>
</section>