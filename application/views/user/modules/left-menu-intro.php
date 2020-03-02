<div class="menu-product">
    <h3>
        <span>
            <i class="fa fa-bars"></i>
            Giới thiệu
        </span>
    </h3>
    <?php
        $page = $this->intro_model->show_intro();
        foreach ($page as $pg):
    ?>
    <ul class='level0'>
        <li><span><a href="<?php echo base_url("chi-tiet-trang/$pg->id.html"); ?>"><i class='fa fa-arrow-circle-o-right'></i><?php echo $pg->name; ?></a></span></li>
    </ul>
    <?php endforeach; ?>
</div>
<script type="text/javascript">
    $(document).ready(function () {
    $('.menu-product li.child .open-close').on('click', function () {
    $(this).removeAttr('href');
    var element = $(this).parent('li');
    if (element.hasClass('open')) {
    element.removeClass('open');
    element.children('ul').slideUp();
    }
    else {
    element.addClass('open');
    element.children('ul').slideDown();
    }
    });
    });
</script>